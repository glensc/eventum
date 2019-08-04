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

namespace Eventum\Auth\Ldap;

use InvalidArgumentException;
use Misc;
use Symfony\Component\Ldap\Entry;
use Zend\Config\Config;

class UserEntry
{
    /** @var string */
    private $dn;
    /** @var string */
    private $uid;
    /** @var string */
    private $full_name;
    /** @var string[] */
    private $emails;
    /** @var int */
    private $customer_id;
    /** @var int */
    private $contact_id;

    /**
     * @param Entry $entry
     * @param Config $config
     */
    public function __construct(Entry $entry, $config)
    {
        $customer_id = $this->getAttributeValue($entry, $config['customer_id_attribute']);
        $contact_id = $this->getAttributeValue($entry, $config['contact_id_attribute']);
        $emails = $entry->getAttribute('mail');

        $this->dn = $entry->getDn();
        $this->uid = $this->getAttributeValue($entry, $config['user_id_attribute'] ?: 'uid');
        $this->full_name = $this->getAttributeValue($entry, 'cn');
        $this->emails = Misc::trim(Misc::lowercase($emails));
        $this->customer_id = Misc::trim($customer_id) ?: null;
        $this->contact_id = Misc::trim($contact_id) ?: null;
    }

    public function getDn(): string
    {
        return $this->dn;
    }

    public function setDn(string $dn): self
    {
        $this->dn = $dn;

        return $this;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function setUid(string $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): self
    {
        $this->full_name = $full_name;

        return $this;
    }

    public function getEmails(): array
    {
        return $this->emails;
    }

    /**
     * @param string[] $emails
     * @return UserEntry
     */
    public function setEmails(array $emails): self
    {
        $this->emails = $emails;

        return $this;
    }

    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    public function setCustomerId(?int $customer_id): self
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getContactId(): ?int
    {
        return $this->contact_id;
    }

    public function setContactId(?int $contact_id): self
    {
        $this->contact_id = $contact_id;

        return $this;
    }

    /**
     * Fetches a attribute value from an LDAP entry.
     */
    private function getAttributeValue(Entry $entry, string $attribute): ?string
    {
        if (!$entry->hasAttribute($attribute)) {
            return null;
        }

        $values = $entry->getAttribute($attribute);

        if (1 !== count($values)) {
            throw new InvalidArgumentException(sprintf('Attribute "%s" has multiple values.', $attribute));
        }

        return $values[0];
    }

    public function __toString()
    {
        return sprintf('%s(%s)', __CLASS__, $this->getDn());
    }
}
