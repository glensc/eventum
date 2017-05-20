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

namespace Eventum\Mail\Address;

use Email\Parse;
use InvalidArgumentException;
use Zend\Mail\Address;
use Zend\Mail\AddressList;
use Zend\Mail\Header\HeaderWrap;

class Parser
{
    /** @var Parse */
    private $parser;

    public function __construct($parser = null)
    {
        $this->parser = $parser ?: Parse::getInstance();
    }

    /**
     * @param string $emails
     * @param AddressList $addressList
     */
    public function parseAddresses($emails, $addressList = null)
    {
        $res = $this->parser->parse($emails);
        if (!$res['success']) {
            throw new InvalidArgumentException($res['reason']);
        }

        foreach ($res['email_addresses'] as $email) {
            $name = HeaderWrap::mimeDecodeValue($email['name']);

            $address = new Address($email['simple_address'], $name ?: null);
            $addressList->add($address);
        }
    }
}
