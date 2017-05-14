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

namespace Eventum\Mail\Helper;

use Eventum\Mail\MailMessage;
use Issue;
use Mail_Helper;
use Note;
use Support;

class RewriteThreadingHeaders
{
    /**
     * Make sure that In-Reply-To and References headers are set and reference a message in this issue.
     * If not, set to be the root message ID of the issue. This is to ensure messages are threaded by
     * issue in mail clients.
     *
     * @param MailMessage $mail
     * @param int $issue_id
     * @param string $type
     */
    public function __invoke(MailMessage $mail, $issue_id, $type = 'email')
    {
        // check if the In-Reply-To header exists and if so,
        // does it relate to a message stored in Eventum
        // if it does not, set new In-Reply-To header

        $reference_msg_id = $mail->getReferenceMessageId();
        $reference_issue_id = null;
        if ($reference_msg_id) {
            // check if referenced msg id is associated with this issue
            if ($type == 'note') {
                $reference_issue_id = Note::getIssueByMessageID($reference_msg_id);
            } else {
                $reference_issue_id = Support::getIssueByMessageID($reference_msg_id);
            }
        }

        if (!$reference_msg_id || $reference_issue_id != $issue_id) {
            $reference_msg_id = Issue::getRootMessageID($issue_id);
        }
        $references = Mail_Helper::getReferences($issue_id, $reference_msg_id, $type);

        $mail->setInReplyTo($reference_msg_id);
        $mail->setReferences($references);
    }
}
