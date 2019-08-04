<?php

/*
 * This file is part of the Eventum (Issue Tracking System) package.
 *
 * @copyright (c) Eventum Team
 * @license GNU General Public License, version 2 or later (GPL-2+)
 *
 * For the full copyright and license information,
 * please see the COPYING and AUTHORS files
 * that were distributed with this source code.
 */

namespace Eventum\Auth;

use Eventum\Auth\Ldap\UserEntry;
use Eventum\Monolog\Logger;
use User;

class UserSync
{
    /** @var \Monolog\Logger */
    private $logger;
    /** @var bool */
    private $create_users;
    /** @var array */
    private $defaultRole;

    public function __construct(bool $createUsers, array $defaultRole)
    {
        $this->logger = Logger::auth();
        $this->create_users = $createUsers;
        $this->defaultRole = $defaultRole;
    }

    public function sync(string $login, UserEntry $remote): ?int
    {
        $usr_id = $this->getLocalUserId($login, $remote->getEmails());

        $data = [
            // do not add 'password' field here.
            // it maybe be set locally before ldap
            // and we don't want to store it in mysql at all
            'full_name' => $remote->getFullName(),
            'external_id' => $remote->getUid(),
            'customer_id' => $remote->getCustomerId(),
            'contact_id' => $remote->getContactId(),
        ];

        // if local user found, update it and return usr id
        if ($usr_id) {
            $emails = $this->sortEmails($usr_id, $remote->getEmails());
            if (!$emails) {
                throw new AuthException('E-mail is required');
            }
            // use first email as primary from sorted list
            $data['email'] = array_shift($emails);

            // do not clear full name if for some reason it is empty
            if (empty($data['full_name'])) {
                unset($data['full_name']);
            }

            // read in details, and make modification only if data has changed
            $user_details = User::getDetails($usr_id);
            $aliases = User::getAliases($usr_id);
            $stored_data = [
                'full_name' => $user_details['usr_full_name'],
                'external_id' => $user_details['usr_external_id'],
                'customer_id' => $user_details['usr_customer_id'],
                'contact_id' => $user_details['usr_customer_contact_id'],
                'email' => $user_details['usr_email'],
            ];
            $remove_aliases = [];

            $diff = array_diff_assoc($data, $stored_data);
            if ($diff) {
                $diff = array_diff_assoc($data, $stored_data);
                // if email is about to be updated, move current one to aliases
                if (isset($diff['email'], $stored_data['email'])) {
                    $this->logger->debug("add alias:{$stored_data['email']}");

                    $emails[] = $stored_data['email'];

                    // if new email is present in aliases remove it from there
                    if (($key = array_search($data['email'], $aliases, true)) !== false) {
                        $this->logger->debug("remove alias:{$aliases[$key]}");
                        $remove_aliases[] = $aliases[$key];
                    }
                }

                $fdiff = json_encode($diff, JSON_UNESCAPED_UNICODE);
                $this->logger->debug("update data: $usr_id: $fdiff");

                User::update($usr_id, $data, false);
            }

            // as we are only adding aliases (never removing)
            // check only one way
            if (array_diff($emails, $aliases)) {
                $diff = implode(',', array_diff($aliases, $emails));
                $this->logger->debug("update aliases: $usr_id: $diff");

                $res = $this->updateAliases($usr_id, $emails);
                if (!$res) {
                    $this->logger->error('aliases update failed');
                }
            }

            if ($remove_aliases) {
                $this->logger->debug('remove aliases: ' . implode(',', $remove_aliases));
                foreach ($remove_aliases as $email) {
                    User::removeAlias($usr_id, $email);
                }
            }

            return $usr_id;
        }

        if (!$this->create_users) {
            return null;
        }

        return $this->createUser($remote);
    }

    /**
     * Create new local user.
     *
     * @param UserEntry $remote
     * @throws AuthException
     * @return int usr_id
     */
    private function createUser(UserEntry $remote): int
    {
        $emails = $remote->getEmails();
        if (!$emails) {
            throw new AuthException('E-mail is required');
        }

        $data = [
            'full_name' => $remote->getFullName(),
            'external_id' => $remote->getUid(),
            'customer_id' => $remote->getCustomerId(),
            'contact_id' => $remote->getContactId(),
        ];

        // set first email as default
        $data['email'] = array_shift($emails);
        $data['role'] = $this->defaultRole;

        if (!empty($data['customer_id']) && !empty($data['contact_id'])) {
            foreach ($data['role'] as $prj_id => $role) {
                if ($role > 0) {
                    $data['role'][$prj_id] = User::ROLE_CUSTOMER;
                }
            }
        }

        $usr_id = User::insert($data);
        if ($usr_id > 0 && $emails) {
            $this->updateAliases($usr_id, $emails);
        }

        return $usr_id;
    }

    /**
     * Get local user by login or by emails
     *
     * @param string $login
     * @param string[] $emails
     * @return int|null
     * @internal Public for use by LdapSyncCommand
     */
    public function getLocalUserId(string $login, array $emails): ?int
    {
        // try by login name
        $usr_id = User::getUserIDByExternalID($login);
        if ($usr_id) {
            return $usr_id;
        }

        // find local user by email by ALL aliases from remote system
        foreach ($emails as $email) {
            $usr_id = User::getUserIDByEmail($email, true);
            if ($usr_id) {
                return $usr_id;
            }
        }

        return null;
    }

    /**
     * @param int $usr_id
     * @return bool returns true if all aliases were added
     */
    private function updateAliases(int $usr_id, array $aliases): bool
    {
        $updated = 0;
        foreach ($aliases as $alias) {
            $res = User::addAlias($usr_id, $alias);
            if (!$res) {
                $this->logger->error("updating $alias failed");
            } else {
                $updated++;
            }
        }

        return $updated === count($aliases);
    }

    /**
     * Sort user emails so that primary is what Eventum has as primary
     * Perspective what is main address and what is alias may be different in ldap and in Eventum.
     *
     * @param int $usr_id
     * @param array $emails
     * @return string[]
     */
    private function sortEmails(int $usr_id, array $emails): array
    {
        // find user primary email
        $email = User::getEmail($usr_id);

        // if email was found, ensure it's first item
        if (($key = array_search($email, $emails, true)) !== false) {
            unset($emails[$key]);
            array_unshift($emails, $email);
        }

        return $emails;
    }
}
