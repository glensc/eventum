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

namespace Eventum\Auth\Adapter;

use Auth;
use Eventum\Auth\AuthException;
use Eventum\Auth\Ldap\LdapConnection;
use Eventum\Auth\Ldap\UserEntry;
use Eventum\Auth\UserSync;
use Eventum\Monolog\Logger;
use Generator;
use Setup;
use Symfony\Component\Ldap\Entry;
use Symfony\Component\Ldap\Exception\ConnectionException;
use User;

/**
 * This auth backend integrates with an LDAP server and if set to, will create
 * a local user with the specified name and email. The user will be
 * authenticated against the LDAP server on each login.
 */
class LdapAdapter implements AdapterInterface
{
    public const displayName = 'LDAP authentication adapter';

    /** @var bool */
    public $create_users;

    /** @var \Monolog\Logger */
    private $logger;

    /** @var LdapConnection */
    private $ldap;

    /**
     * DN under what Active users are stored
     *
     * @var string
     */
    public $active_dn;

    /**
     * DN under what Inactive users are stored
     *
     * @var string
     */
    public $inactive_dn;

    /**
     * configures LDAP
     *
     * @throws AuthException if failed LDAP bind failed
     */
    public function __construct()
    {
        $config = Setup::get()['ldap'];
        $this->logger = Logger::auth();
        $this->ldap = new LdapConnection($config);
        $this->active_dn = $config['active_dn'];
        $this->inactive_dn = $config['inactive_dn'];
        $this->create_users = (bool)$config['create_users'];

        if (!$this->active_dn || !$this->inactive_dn) {
            throw new AuthException('LDAP Adapter not configured');
        }
    }

    /**
     * Get all users from LDAP server.
     *
     * @param string $dn
     * @return Generator|UserEntry[]
     * @internal Public for use by LdapSyncCommand
     */
    public function getUserListing(string $dn): Generator
    {
        yield from $this->ldap->listUsers($dn);
    }

    private function validatePassword(string $uid, string $password): bool
    {
        $errors = $this->ldap->checkAuthentication($uid, $password);
        if ($errors === true) {
            return $errors;
        }

        foreach ($errors as $e) {
            Auth::saveLoginAttempt($uid, 'failure', $e->getMessage());
        }

        return false;
    }

    /**
     * Retrieve information from LDAP
     *
     * @param string $uid login or email
     * @return UserEntry|null
     * @internal Public for use by LdapSyncCommand
     */
    public function getLdapUser(string $uid): ?UserEntry
    {
        return $this->ldap->findUser($uid);
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
     * Disable account by external id.
     *
     * @param string $uid
     * @throws AuthException if the account was not active
     * @return bool
     * @internal Public for use by LdapSyncCommand
     */
    public function disableAccount(string $uid): bool
    {
        $usr_id = User::getUserIDByExternalID($uid);
        if ($usr_id <= 0) {
            return false;
        }

        if ($this->accountActive($uid) !== true) {
            throw new AuthException("User[usr_id=$usr_id; external_id=$uid] status is not active");
        }

        return User::changeStatus($usr_id, User::USER_STATUS_INACTIVE);
    }

    /**
     * Return true if external uid is locally active user,
     * returns NULL if local user not found.
     *
     * @param string $uid external_id
     * @return null|bool
     * @internal Public for use by LdapSyncCommand
     */
    public function accountActive(string $uid): ?bool
    {
        $usr_id = User::getUserIDByExternalID($uid);
        if ($usr_id <= 0) {
            return null;
        }

        $details = User::getDetails($usr_id);
        $status = $details['usr_status'];

        return $status === User::USER_STATUS_ACTIVE;
    }

    /**
     * Creates or updates local user entry for the specified ID.
     *
     * @param string $login The login or email of the user to create or update
     * @return int the user id that was created or updated, null otherwise
     */
    public function updateLocalUserFromBackend(string $login): ?int
    {
        $remote = $this->getLdapUser($login);
        if (!$remote) {
            return null;
        }

        $defaultRole = Setup::get()->ldap->default_role;
        $sync = new UserSync($this->create_users, $defaultRole);

        return $sync->sync($login, $remote);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserId(string $login): ?int
    {
        $usr_id = User::getUserIDByEmail($login, true);
        if (!$usr_id) {
            // the login is not a local email address, try external id
            $usr_id = User::getUserIDByExternalID($login);
        }

        if ($usr_id) {
            $local_user_info = User::getDetails($usr_id);
        }

        if (!empty($local_user_info) && empty($local_user_info['usr_external_id'])) {
            // local user exists and is not associated with LDAP, don't try to update.
            return $usr_id;
        }

        // try to create or update local user from ldap info
        return $this->updateLocalUserFromBackend($login);
    }

    /**
     * {@inheritdoc}
     */
    public function userExists(string $login): bool
    {
        try {
            $usr_id = $this->getUserId($login);
        } catch (ConnectionException $e) {
            $this->logger->critical($e->getMessage(), ['exception' => $e]);

            return false;
        }

        return $usr_id > 0;
    }

    private function hasExternalId(int $usr_id): bool
    {
        $external_id = User::getExternalID($usr_id) ?: null;

        return $external_id !== null;
    }

    /**
     * {@inheritdoc}
     */
    public function verifyPassword(string $login, string $password): bool
    {
        // check if this is an ldap or internal
        $usr_id = $this->getUserId($login);
        $external_id = User::getExternalID($usr_id) ?: null;

        if (!$external_id) {
            return false;
        }

        return $this->validatePassword($external_id, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function canUserUpdateName(int $usr_id): bool
    {
        return $this->hasExternalId($usr_id);
    }

    /**
     * {@inheritdoc}
     */
    public function canUserUpdateEmail(int $usr_id): bool
    {
        return $this->hasExternalId($usr_id);
    }

    /**
     * {@inheritdoc}
     */
    public function canUserUpdatePassword(int $usr_id): bool
    {
        return $this->hasExternalId($usr_id);
    }

    /**
     * {@inheritdoc}
     */
    public function updatePassword(int $usr_id, string $password): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getExternalLoginURL(): ?string
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function checkAuthentication(): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function logout(): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function autoRedirectToExternalLogin(): bool
    {
        return false;
    }
}
