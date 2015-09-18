<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 encoding=utf-8: */
// +----------------------------------------------------------------------+
// | Eventum - Issue Tracking System                                      |
// +----------------------------------------------------------------------+
// | Copyright (c) 2015 Eventum Team.                                     |
// |                                                                      |
// | This program is free software; you can redistribute it and/or modify |
// | it under the terms of the GNU General Public License as published by |
// | the Free Software Foundation; either version 2 of the License, or    |
// | (at your option) any later version.                                  |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to:                           |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 51 Franklin Street, Suite 330                                        |
// | Boston, MA 02110-1301, USA.                                          |
// +----------------------------------------------------------------------+
// | Authors: Elan Ruusamäe <glen@delfi.ee>                               |
// +----------------------------------------------------------------------+

use Zend\Mail\Storage\Message;
use Zend\Mail\Headers;
use Zend\Mail\Header\AbstractAddressList;

class MailMessage extends Message
{
    /**
     * Public constructor
     *
     * Generates MessageId header in case it is missing:
     *
     * @param array $params
     */
    public function __construct(array $params)
    {
        parent::__construct($params);

        // set messageId if that is missing
        // FIXME: do not set this for "child" messages (attachments)
        if (!$this->headers->has('Message-Id')) {
            /** @var string|Headers $headers */
            if ($params['headers'] instanceof Headers) {
                $headers = $params['headers']->toString();
            } else {
                // use reference. maybe saves memory
                $headers = &$params['headers'];
            }
            $messageId = Mail_Helper::generateMessageID($headers, $params['content']);
            $header = new Zend\Mail\Header\MessageId();
            $this->headers->addHeader($header->setId(trim($messageId, "<>")));
        }
    }

    /**
     * Create Mail object from raw email message.
     *
     * @param string $raw The full email message
     * @return MailMessage
     */
    public static function createFromString($raw)
    {
        $message = new self(array('raw' => $raw));
        return $message;
    }

    /**
     * Method to read email from imap extension and return Zend Mail Message object.
     *
     * This is bridge while migrating to Zend Mail package supporting reading from imap extension functions.
     *
     * @param resource $mbox
     * @param integer $num
     * @return MailMessage
     */
    public static function createFromImap($mbox, $num)
    {
        // check if the current message was already seen
        list($overview) = imap_fetch_overview($mbox, $num);

        $header = imap_fetchheader($mbox, $num);
        $content = imap_body($mbox, $num);

        // fill with "\Seen", "\Deleted", "\Answered", ... etc
        $knownFlags = array(
            'recent' => Zend\Mail\Storage::FLAG_RECENT,
            'flagged' => Zend\Mail\Storage::FLAG_FLAGGED,
            'answered' => Zend\Mail\Storage::FLAG_ANSWERED,
            'deleted' => Zend\Mail\Storage::FLAG_DELETED,
            'seen' => Zend\Mail\Storage::FLAG_SEEN,
            'draft' => Zend\Mail\Storage::FLAG_DRAFT,
        );
        $flags = array();
        foreach ($knownFlags as $flag => $value) {
            if ($overview->$flag) {
                $flags[] = $value;
            }
        }

        $message = new self(array('headers' => $header, 'content' => $content, 'flags' => $flags));

        return $message;
    }

    /**
     * Return Message-Id Value
     *
     * @return string
     */
    public function getMessageId()
    {
        return $this->getHeader('Message-Id')->getFieldValue();
    }

    /**
     * Assemble email into raw format.
     *
     * @return string
     */
    public function getRawContent()
    {
        return $this->headers->toString() . Headers::EOL . $this->getContent();
    }

    /**
     * Return true if mail has attachments
     *
     * @return  boolean
     */
    public function hasAttachments()
    {
        return $this->isMultipart() && $this->countParts() > 0;
    }

    /**
     * Returns the referenced message-id for a given reply.
     *
     * @return string|null
     */
    public function getReferenceMessageId()
    {
        if ($this->headers->has('In-Reply-To')) {
            return $this->headers->get('In-Reply-To')->getFieldValue();
        }

        if (!$this->headers->has('References')) {
            return null;
        }

        $references = explode(' ', $this->headers->get('References')->getFieldValue());

        // return the first message-id in the list of references
        return trim($references[0]);
    }

    /**
     * Get email addresses from To: and Cc: headers.
     *
     * @return string[]
     */
    public function getAddresses()
    {
        $addresses = array();
        foreach (array('To', 'Cc') as $header) {
            if (!$this->headers->has($header)) {
                continue;
            }

            /** @var AbstractAddressList $addresslist */
            $addresslist = $this->headers->get($header);
            foreach ($addresslist->getAddressList() as $address) {
                $addresses[] = $address->getEmail();
            }
        }

        return array_unique($addresses);
    }

    /**
     * Return true if message is \Seen, \Deleted or \Answered
     *
     * @return bool
     */
    public function isSeen()
    {
        return
            $this->hasFlag(Zend\Mail\Storage::FLAG_SEEN) ||
            $this->hasFlag(Zend\Mail\Storage::FLAG_DELETED) ||
            $this->hasFlag(Zend\Mail\Storage::FLAG_ANSWERED);
    }
}