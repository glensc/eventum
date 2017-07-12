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

use Eventum\Mail\Helper\DecodePart;
use Zend\Mail;
use Zend\Mail\Header\ContentType;

class Attachment
{
    /** @var MailMessage */
    private $message;

    public function __construct(MailMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Return true if mail has attachments,
     * inline text messages are not accounted as attachments.
     *
     * @return  bool
     */
    public function hasAttachments()
    {
        $have_multipart = $this->message->isMultipart() && $this->message->countParts() > 0;
        if (!$have_multipart) {
            return false;
        }

        $has_attachments = 0;

        // check what really the attachments are
        foreach ($this->message as $part) {
            $is_attachment = 0;
            $disposition = $filename = null;

            $ctype = $part->getHeaderField('Content-Type');
            if ($part->getHeaders()->has('Content-Disposition')) {
                $disposition = $part->getHeaderField('Content-Disposition');
                $filename = $part->getHeaderField('Content-Disposition', 'filename');
                $is_attachment = $disposition == 'attachment' || $filename;
            }

            if (in_array($ctype, ['text/plain', 'text/html', 'text/enriched'])) {
                $has_attachments |= $is_attachment;
            } else {
                // avoid treating forwarded messages as attachments
                $is_attachment |= ($disposition == 'inline' && $ctype != 'message/rfc822');
                // handle inline images
                $type = current(explode('/', $ctype));
                $is_attachment |= $type == 'image';

                $has_attachments |= $is_attachment;
            }
        }

        return (bool)$has_attachments;
    }

    /**
     * Get attachments with 'filename', 'cid', 'filetype', 'blob' array elements
     *
     * @return array
     */
    public function getAttachments()
    {
        $attachments = [];

        /** @var MailMessage $attachment */
        foreach ($this->message as $attachment) {
            $headers = $attachment->getHeaders();

            $ct = $headers->get('Content-Type');
            // attempt to extract filename
            // 1. try Content-Type: name parameter
            // 2. try Content-Disposition: filename parameter
            // 3. as last resort use Untitled with extension from mime-type subpart
            /** @var ContentType $ct */
            $filename = $ct->getParameter('name');
            if (!$filename) {
                try {
                    $filename = $attachment->getHeaderField('Content-Disposition', 'filename');
                } catch (Mail\Exception\InvalidArgumentException $e) {
                }
            }
            if (!$filename) {
                $filename = ev_gettext('Untitled.%s', end(explode('/', $ct->getType())));
            }

            $cid = $headers->has('Content-Id') ? $headers->get('Content-Id')->getFieldValue() : null;

            $attachments[] = [
                'filename' => $filename,
                'cid' => $cid,
                'filetype' => $ct->getType(),
                'blob' => (new DecodePart($attachment))->decode(),
            ];
        }

        return $attachments;
    }
}
