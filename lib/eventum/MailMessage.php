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

use Zend\Mail\Message;
use Zend\Mail\Headers;
use Zend\Mail\Header\AbstractAddressList;
use Zend\Mail\Header\HeaderInterface;
use Zend\Mail\Address;
use Zend\Mail\AddressList;
use Zend\Mail\Header\Subject;
use Zend\Mail\Header\ContentType;
use Zend\Mail\Header\ContentTransferEncoding;
use Zend\Mail\Header\To;
use Zend\Mail\Header\GenericHeader;
use Zend\Mail\Header\MessageId;
use Zend\Mime;
use Zend\Stdlib\ErrorHandler;

class MailMessage extends Message
{
    /**
     * Create Mail object from raw email message.
     *
     * @param string $raw The full email message
     * @return MailMessage
     */
    public static function createFromString($raw)
    {
        $message = static::fromString($raw);

        return $message;
    }

    /**
     * Create Mail object from specified filename
     *
     * @param string $filename Path to the file to read in
     * @return MailMessage
     */
    public static function createFromFile($filename)
    {
        ErrorHandler::start();
        $raw = file_get_contents($filename);
        $error = ErrorHandler::stop();
        if ($raw === false) {
            throw new RuntimeException('could not open file', 0, $error);
        }
        return static::createFromString($raw);
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
     * Compose headers
     *
     * @param Headers $headers
     * @return $this
     */
    public function setHeaders(Headers $headers)
    {
        // same as parent method. except forcing of setHeaders to ALL HEADERS. WTF DUDES?!
        $this->headers = $headers;

        // trigger MessageId generation
        $this->getMessageId();

        return $this;
    }

    /**
     * Return Message-Id Value
     *
     * @return string
     */
    public function getMessageId()
    {
        // set messageId if that is missing
        if (!$this->headers->has('Message-Id')) {
            $headers = rtrim($this->headers->toString(), Headers::EOL);
            $messageId = Mail_Helper::generateMessageID($headers, $this->getBodyText());
            $header = new MessageId();
            $this->headers->addHeader($header->setId(trim($messageId, "<>")));
        }

        return $this->headers->get('Message-Id')->getFieldValue();
    }

    /**
     * Assemble email into raw format.
     *
     * @return string
     */
    public function getRawContent()
    {
        return $this->headers->toString() . Headers::EOL . $this->getBodyText();
    }

    /**
     * Return true if mail has attachments
     *
     * @return  boolean
     */
    public function hasAttachments()
    {
        if (!$this->body instanceof Mime\Message) {
            return false;
        }

        return $this->body->isMultipart();
    }

    /**
     * Get attachments with 'filename', 'cid', 'filetype', 'blob' array elements
     *
     * @return array
     */
    public function getAttachments()
    {
        if (!$this->hasAttachments()) {
            throw new InvalidArgumentException("Message has no attachments");
        }

        $attachments = array();

        /** @var Mime\Part $attachment */
        foreach ($this->body->getParts() as $attachment) {
            // the 'type' is raw field, not split to parts. sigh, parse ourselves.
            $mime_type = Mime\Decode::splitHeaderField($attachment->type, null, null);

            // attempt to extract filename
            // 1. try filename property
            // 1. try Content-Type: name parameter
            // 2. try Content-Disposition: filename parameter
            // 3. as last resort use Untitled with extension from mime-type subpart
            $filename = $attachment->filename
                ?: Mime\Decode::splitHeaderField($attachment->type, 'name')
                    ?: Mime\Decode::splitHeaderField($attachment->disposition, 'filename')
                        ?: ev_gettext('Untitled.%s', end(explode('/', $mime_type)));

            $attachments[] = array(
                'filename' => $filename,
                'cid' => "<{$attachment->id}>",
                'filetype' => $mime_type,
                'blob' => $attachment->getRawContent(),
            );
        }

        return $attachments;
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
     * Get email addresses from specified headers, default from "To:" and "Cc:".
     *
     * @param array $headers
     * @return string[]
     */
    public function getAddresses($headers = array('To', 'Cc'))
    {
        if (!$headers) {
            throw new InvalidArgumentException('No header field specified');
        }

        $addresses = array();
        foreach ((array)$headers as $header) {
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
     * Shortcut to get lowercased mail sender email address.
     *
     * @return string
     */
    public function getSender()
    {
        return strtolower($this->getFromHeader()->getEmail());
    }

    /**
     * Get From header. In case multiple headers present, return just first one.
     *
     * @return Address
     */
    public function getFromHeader()
    {
        if (!$this->headers->has('From')) {
            return null;
        }

        // return first item from the AddressList
        $header = $this->getFrom();
        $header = iterator_to_array($header);
        return current($header);
    }

    /**
     * Get Subject header object.
     *
     * @return Subject
     */
    public function getSubject()
    {
        return $this->headers->get('Subject');
    }

    /**
     * Check if the message is a multipart message
     *
     * @return bool if part is multipart
     */
    public function isMultipart()
    {
        $header = $this->headers->get('Content-Type');
        if (!$header) {
            return false;
        }
        $contentType = $header->getFieldValue();
        return stripos($contentType, 'multipart/') === 0;
    }

    /**
     * Set the message body
     *
     * @param  null|string|\Zend\Mime\Message|object $body
     * @throws InvalidArgumentException
     * @return Message
     */
    public function setBody($body)
    {
        /**
         * Convert to Mime\Message first
         * @see Zend\Mail\Storage\Part::_cacheContent
         */
        if ($body !== null && is_string($body)) {
            if ($this->isMultipart()) {
                /** @var ContentType $contentTypeHeader */
                $contentTypeHeader = $this->headers->get('Content-Type');
                $contentTypeValue = $contentTypeHeader->getType();
                $boundary = Mime\Decode::splitHeaderField($contentTypeHeader->getFieldValue(), 'boundary');
                if (!$boundary) {
                    throw new RuntimeException('no boundary found in content type to split message');
                }

                $body = Mime\Message::createFromMessage($body, $boundary);
                $body->setMime(new Mime\Mime($boundary));
            }
        }

        parent::setBody($body);

        // restore $contentType which parent forced to 'multipart/mixed'. WTF.
        if (isset($contentTypeHeader) && isset($contentTypeValue)) {
            $contentTypeHeader->setType($contentTypeValue);
        }
    }

    /**
     * Set To: header
     *
     * @param string $value
     */
    public function setTo($value)
    {
        $this->setAddressListHeader('To', $value);
    }

    /**
     * Set From: header
     *
     * @param string $value
     */
    public function setFrom($value)
    {
        $this->setAddressListHeader('From', $value);
    }

    /**
     * Set AddressList type header a value
     *
     * @param string $name
     * @param string $value
     */
    public function setAddressListHeader($name, $value)
    {
        /** @var AbstractAddressList $header */
        $header = $this->getHeader($name);
        $addresslist = new AddressList();
        $addresslist->addFromString($value);
        $header->setAddressList($addresslist);
    }

    /**
     * Set many headers at once
     *
     * Expects an array (or Traversable object) of name/value pairs.
     *
     * @param array|Traversable $headerlist
     */
    public function setHeaders_(array $headerlist)
    {
        // NOTE: could use addHeaders() but that blows if value is not mime encoded. wtf
        //$this->headers->addHeaders($headerlist);

        $headers = $this->headers;
        foreach ($headerlist as $name => $value) {
            /** @var $header GenericHeader */
            if ($headers->has($name)) {
                $header = $headers->get($name);
                $header->setFieldValue($value);
            } else {
                $header = new GenericHeader($name, $value);
                $this->headers->addHeader($header);
            }
        }
    }

    /**
     * Convenience method to remove address from $header AddressList.
     *
     * @param string $header A header name, like 'To', or 'Cc'.
     * @param string $address An email address to remove
     * @return bool
     */
    public function removeFromAddressList($header, $address)
    {
        if (!$this->headers->has($header)) {
            return false;
        }

        /** @var AbstractAddressList $h */
        $h = $this->headers->get($header);
        $addressList = $h->getAddressList();

        return $addressList->delete($address);
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

    /**
     * Checks whether the given headers are from a vacation auto-responder message or not.
     *
     * @return bool
     */
    public function isVacationAutoResponder()
    {
        // has 'auto-submitted' header?
        if ($this->headers->has('auto-submitted')) {
            return true;
        }

        // return true if 'x-vacationmessage' is set and not empty
        if (!$this->headers->has('x-vacationmessage')) {
            return false;
        }

        return $this->headers->get('x-vacationmessage') != '';
    }

    /**
     * Method used to check whether the current sender of the email is the
     * mailer daemon responsible for dealing with bounces.
     *
     * @return bool
     */
    public function isBounceMessage()
    {
        $email = $this->getSender();

        return substr($email, 0, 14) == 'mailer-daemon@';
    }

    /**
     * Strips out email headers that should not be sent over to the recipient
     * of the routed email. The 'Received:' header was sometimes being used to
     * validate the sender of the message, and because of that some emails were
     * not being delivered correctly.
     *
     * FIXME: think of better method name
     * @see Mail_Helper::stripHeaders
     */
    public function stripHeaders()
    {
        $headers = $this->headers;

        // process exact matches
        $ignore_headers = array(
            'to',
            'cc',
            'bcc',
            'return-path',
            'received',
            'Disposition-Notification-To',
        );
        foreach ($ignore_headers as $name) {
            if ($headers->has($name)) {
                $headers->removeHeader($name);
            }
        }

        // process patterns
        array_walk($headers->toArray(), function ($value, $name) use ($headers) {
            if (preg_match('/^resent.*/i', $name)) {
                $headers->removeHeader($name);
            }
        });
    }

    /**
     * Set Body of a message.
     *
     * IMPORTANT: it should not contain any multipart changes,
     * as then everything will blow up as it is not parsed again.
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Deep clone handling.
     *
     * Zend Does not handle this, do it ourselves.
     */
    public function __clone()
    {
        $this->headers = clone $this->headers;
    }
}