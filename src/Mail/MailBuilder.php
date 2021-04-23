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

namespace Eventum\Mail;

use Eventum\Attachment\Attachment;
use Laminas\Mail\Address;
use Symfony\Component\Mime\Email;

/**
 * Helper use Symfony MIME to build messages and convert to MailMessage
 */
class MailBuilder
{
    /** @var Email */
    private $email;

    public function __construct()
    {
        $this->email = new Email();
    }

    /**
     * @deprecated this method does nothing
     */
    public function getMessage(): self
    {
        return $this;
    }

    public function setFrom($from): self
    {
        if ($from instanceof Address) {
            $this->email->from($from->toString());
        } else {
            $this->email->from($from);
        }

        return $this;
    }

    public function setTo($to): self
    {
        if ($to instanceof Address) {
            $this->email->to($to->toString());
        } else {
            $this->email->to($to);
        }

        return $this;
    }

    public function addCc($address): self
    {
        $this->message->addCc($address);

        return $this;
    }

    public function setSubject(string $subject): self
    {
        $this->email->subject($subject);

        return $this;
    }

    /**
     * Add inline text part to message
     */
    public function addTextPart(string $text): self
    {
        $this->email->text($text);

        return $this;
    }

    /**
     * Add $attachment object as attachment to message
     */
    public function addAttachment(Attachment $attachment): self
    {
        $this->email->attach(
            $attachment->getFileContents(),
            $attachment->filename,
            $attachment->filetype,
        );

        return $this;
    }

    /**
     * Convert to MailMessage.
     *
     * it's not recommended to call this message more than once on same object,
     * the behavior is undefined.
     */
    public function toMailMessage(): MailMessage
    {
        $content = $this->email->toString();

        return MailMessage::createFromString($content);
    }
}
