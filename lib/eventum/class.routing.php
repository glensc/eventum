<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 encoding=utf-8: */
// +----------------------------------------------------------------------+
// | Eventum - Issue Tracking System                                      |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 - 2008 MySQL AB                                   |
// | Copyright (c) 2008 - 2010 Sun Microsystem Inc.                       |
// | Copyright (c) 2011 - 2015 Eventum Team.                              |
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
// | Authors: Bryan Alsdorf <bryan@mysql.com>                             |
// | Authors: Elan Ruusamäe <glen@delfi.ee>                               |
// +----------------------------------------------------------------------+
//

/**
 * Class to handle all routing functionality
 */
class Routing
{
    /** data format error */
    const EX_DATAERR = 65;

    /** cannot open input */
    const EX_NOINPUT = 66;

    /** addressee unknown */
    const EX_NOUSER = 67;

    /** permission denied */
    const EX_NOPERM = 77;

    /** configuration error */
    const EX_CONFIG = 78;

    /**
     * Route all mail kinds: emails, notes, drafts (in that order) processing "To:" and "Cc:" headers
     *
     * @param string &$full_message
     * @return array|bool
     */
    public static function route(&$full_message)
    {
        $structure = Mime_Helper::decode($full_message, false, true);

        $addresses = array();
        if (isset($structure->headers['to'])) {
            $addresses[] = $structure->headers['to'];
        }
        if (isset($structure->headers['cc'])) {
            $addresses[] = $structure->headers['cc'];
        }
        // free memory
        unset($structure);

        $types = array('email', 'note', 'draft');
        foreach ($addresses as $address) {
            foreach ($types as $type) {
                if (Routing::getMatchingIssueIDs($address, $type) === false) {
                    continue;
                }
                $method = "route_{$type}s";
                $return = Routing::$method($full_message);
                if ($return === true || is_array($return)) {
                    return $return;
                }
            }
        }

        // did not handle anything
        return false;
    }

    /**
     * Routes an email to the correct issue.
     *
     * @param   MailMessage $mail The Mail object
     * @return  mixed   true or array(ERROR_CODE, ERROR_STRING) in case of failure
     * @status two issues
     */
    public static function route_emails(MailMessage $mail)
    {
        // save the full message for logging purposes
        Support::saveRoutedEmail($mail);

        // check if the email routing interface is even supposed to be enabled
        $setup = Setup::get();
        if ($setup['email_routing']['status'] != 'enabled') {
            return array(self::EX_CONFIG, ev_gettext('Error: The email routing interface is disabled.') . "\n");
        }
        if (empty($setup['email_routing']['address_prefix'])) {
            return array(self::EX_CONFIG, ev_gettext('Error: Please configure the email address prefix.') . "\n");
        }
        if (empty($setup['email_routing']['address_host'])) {
            return array(self::EX_CONFIG, ev_gettext('Error: Please configure the email address domain.') . "\n");
        }

        // associate routed emails to the internal system account
        $sys_account = User::getNameEmail(APP_SYSTEM_USER_ID);
        if (empty($sys_account['usr_email'])) {
            return array(self::EX_CONFIG, ev_gettext('Error: The associated user for the email routing interface needs to be set.') . "\n");
        }
        unset($sys_account);

        AuthCookie::setAuthCookie(APP_SYSTEM_USER_ID);

        $headers = $mail->getHeaders();

        // remove the reply-to: header
        $headers->removeHeader('Reply-To');

        // find which issue ID this email refers to
        $issue_id = null;
        if ($headers->has('To')) {
            $issue_id = self::getMatchingIssueIDs($mail->getAddresses('To'), 'email');
        }
        // we need to try the Cc header as well
        if (!$issue_id && $headers->has('Cc')) {
            $issue_id = self::getMatchingIssueIDs($mail->getAddresses('Cc'), 'email');
        }

        if (!$issue_id) {
            return array(self::EX_DATAERR, ev_gettext('Error: The routed email had no associated Eventum issue ID or had an invalid recipient address.') . "\n");
        }

        $issue_prj_id = Issue::getProjectID($issue_id);
        if (empty($issue_prj_id)) {
            return array(self::EX_DATAERR, ev_gettext('Error: The routed email had no associated Eventum issue ID or had an invalid recipient address.') . "\n");
        }

        $email_account_id = Email_Account::getEmailAccount($issue_prj_id);
        if (empty($email_account_id)) {
            return array(self::EX_CONFIG, ev_gettext('Error: Please provide the email account ID.') . "\n");
        }


        // get the sender's email address
        // FIXME: this is "From" or "From:" header?
        /** @var Zend\Mail\Address $sender_email */
        $sender_email = $mail->getFromHeader();

        // strip out the warning message sent to staff users
        if (($setup['email_routing']['status'] == 'enabled') &&
                ($setup['email_routing']['warning']['status'] == 'enabled')) {

            $content = Mail_Helper::stripWarningMessage($mail->getContent());
            // FIXME XXX: this probably will blow up. think of better way
            $mail->setContent($content);
        }

        $prj_id = Issue::getProjectID($issue_id);
        AuthCookie::setAuthCookie(APP_SYSTEM_USER_ID);
        AuthCookie::setProjectCookie($prj_id);

        // FIXME: does this need to be int?
        $has_attachments = (int)$mail->hasAttachments();

        // remove certain CC addresses
        if ($headers->has('Cc') && @$setup['smtp']['save_outgoing_email'] == 'yes') {
            $mail->removeFromAddressList('Cc', $setup['smtp']['save_address']);
        }

        // Remove excess Re's
        // Note: the method will still keep one 'Re'
        $mail->setSubject(Mail_Helper::removeExcessRe($mail->getSubject()));

        // TODO: remove all params that use $mail in some form and pass just $mail object
        // as for example content and headers could be rewritten later!
        $t = array(
            'issue_id'       => $issue_id,
            'ema_id'         => $email_account_id,
            'message_id'     => $mail->getMessageId(),
            'date'           => Date_Helper::getCurrentDateGMT(),
            'from'           => $sender_email->toString(), // FIXME: needs address or header?
            'to'             => $mail->getTo(),
            'cc'             => $mail->getCc(),
            'subject'        => $mail->getSubject(),
//            'body'           => $mail->getContent(), // FIXME: needed
//            'full_email'     => $mail->getRawContent(), // FIXME: needed?
            'has_attachment' => $has_attachments,
//            'headers'        => $headers->toString(), // FIXME: needed
            'mail'           => $mail,
        );

        // automatically associate this incoming email with a customer
        if (CRM::hasCustomerIntegration($prj_id)) {
            $crm = CRM::getInstance($prj_id);
            if ($sender_email) {
                try {
                    $contact = $crm->getContactByEmail($sender_email->toString());
                    $issue_contract = $crm->getContract(Issue::getContractID($issue_id));
                    if ($contact->canAccessContract($issue_contract)) {
                        $t['customer_id'] = $issue_contract->getCustomerID();
                    }
                } catch (CRMException $e) {
                }
            }
        }
        if (empty($t['customer_id'])) {
            $t['customer_id'] = null;
        }

        if (Support::blockEmailIfNeeded($mail, $t)) {
            return true;
        }

        // "re-write Threading headers if needed" bullshit comment should be improved:
        // FIXME: err what it does? "add to threading headers reference to $issue_id" something else?
        Mail_Helper::rewriteThreadingHeaders($mail, $issue_id, 'email');

        $res = Support::insertEmail($t, $mail, $sup_id);

        if ($res != -1) {
            Support::extractAttachments($issue_id, $mail);

            // notifications about new emails are always external
            $internal_only = false;
            $assignee_only = false;
            // special case when emails are bounced back, so we don't want a notification to customers about those
            if ($mail->isBounceMessage()) {
                // broadcast this email only to the assignees for this issue
                $internal_only = true;
                $assignee_only = true;
            }
            Notification::notifyNewEmail(Auth::getUserID(), $issue_id, $mail, $internal_only, $assignee_only, '', $sup_id);
            // try to get usr_id of sender, if not, use system account
            $usr_id = User::getUserIDByEmail($mail);
            if (!$usr_id) {
                $usr_id = APP_SYSTEM_USER_ID;
            }
            // mark this issue as updated
            if ((!empty($t['customer_id'])) && ($t['customer_id'] != null)) {
                Issue::markAsUpdated($issue_id, 'customer action');
            } else {
                if ((!empty($usr_id)) && ($usr_id != APP_SYSTEM_USER_ID) &&
                        (User::getRoleByUser($usr_id, $prj_id) > User::getRoleID('Customer'))) {
                    Issue::markAsUpdated($issue_id, 'staff response');
                } else {
                    Issue::markAsUpdated($issue_id, 'user response');
                }
            }

            // log routed email
            History::add($issue_id, $usr_id, 'email_routed', 'Email routed from {from}', array(
                'from' => $mail->getFromHeader()->toString(),
            ));
        }

        return true;
    }

    /**
     * Routes a note to the correct issue
     *
     * @param   MailMessage $mail The Mail object
     * @return  mixed   true or array(ERROR_CODE, ERROR_STRING) in case of failure
     */
    public static function route_notes(MailMessage $mail)
    {
        // save the full message for logging purposes
        Note::saveRoutedNote($mail);

        $headers = $mail->getHeaders();

        // remove the reply-to: header
        $headers->removeHeader('Reply-To');

        // check if the email routing interface is even supposed to be enabled
        $setup = Setup::get();
        if ($setup['note_routing']['status'] != 'enabled') {
            return array(self::EX_CONFIG, ev_gettext('Error: The internal note routing interface is disabled.') . "\n");
        }
        if (empty($setup['note_routing']['address_prefix'])) {
            return array(self::EX_CONFIG, ev_gettext('Error: Please configure the email address prefix.') . "\n");
        }
        if (empty($setup['note_routing']['address_host'])) {
            return array(self::EX_CONFIG, ev_gettext('Error: Please configure the email address domain.') . "\n");
        }

        // find which issue ID this email refers to
        $issue_id = null;
        if ($headers->has('To')) {
            $issue_id = self::getMatchingIssueIDs($mail->getAddresses('To'), 'note');
        }
        // we need to try the Cc header as well
        if (!$issue_id && $headers->has('Cc')) {
            $issue_id = self::getMatchingIssueIDs($mail->getAddresses('Cc'), 'note');
        }

        if (!$issue_id) {
            return array(self::EX_DATAERR, ev_gettext('Error: The routed note had no associated Eventum issue ID or had an invalid recipient address.') . "\n");
        }

        $prj_id = Issue::getProjectID($issue_id);
        // check if the sender is allowed in this issue' project and if it is an internal user
        $sender_email = strtolower(Mail_Helper::getEmailAddress($structure->headers['from']));
        $sender_usr_id = User::getUserIDByEmail($sender_email, true);
        if (((empty($sender_usr_id)) || (User::getRoleByUser($sender_usr_id, $prj_id) < User::ROLE_USER) ||
                (User::isPartner($sender_usr_id) && !Access::canViewInternalNotes($issue_id, $sender_usr_id))) &&
                ((!Workflow::canSendNote($prj_id, $issue_id, $sender_email, $structure)))) {
            return array(self::EX_NOPERM, ev_gettext("Error: The sender of this email is not allowed in the project associated with issue #$issue_id.") . "\n");
        }

        if (empty($sender_usr_id)) {
            $sender_usr_id = APP_SYSTEM_USER_ID;
            $unknown_user = $structure->headers['from'];
        } else {
            $unknown_user = false;
        }
        AuthCookie::setAuthCookie($sender_usr_id);
        AuthCookie::setProjectCookie($prj_id);

        // parse the Cc: list, if any, and add these internal users to the issue notification list
        $addresses = array();
        $to_addresses = Mail_Helper::getEmailAddresses(@$structure->headers['to']);
        if (count($to_addresses)) {
            $addresses = $to_addresses;
        }
        $cc_addresses = Mail_Helper::getEmailAddresses(@$structure->headers['cc']);
        if (count($cc_addresses)) {
            $addresses = array_merge($addresses, $cc_addresses);
        }
        $cc_users = array();
        foreach ($addresses as $email) {
            $cc_usr_id = User::getUserIDByEmail(strtolower($email), true);
            if ((!empty($cc_usr_id)) && (User::getRoleByUser($cc_usr_id, $prj_id) >= User::ROLE_USER)) {
                $cc_users[] = $cc_usr_id;
            }
        }

        $body = $structure->body;
        $reference_msg_id = Mail_Helper::getReferenceMessageID($headers);
        if (!empty($reference_msg_id)) {
            $parent_id = Note::getIDByMessageID($reference_msg_id);
        } else {
            $parent_id = false;
        }

        // insert the new note and send notification about it
        $_POST = array(
            'title'                => @$structure->headers['subject'],
            'note'                 => $body,
            'note_cc'              => $cc_users,
            'add_extra_recipients' => 'yes',
            'message_id'           => @$structure->headers['message-id'],
            'parent_id'            => $parent_id,
        );

        // add the full email to the note if there are any attachments
        // this is needed because the front end code will display attachment links
        if (Mime_Helper::hasAttachments($structure)) {
            $_POST['full_message'] = $full_message;
        }

        $usr_id = Auth::getUserID();
        $res = Note::insertFromPost($usr_id, $issue_id, $unknown_user, false);
        // need to handle attachments coming from notes as well
        if ($res != -1) {
            Support::extractAttachments($issue_id, $structure, true, $res);
        }

        // FIXME! $res == -2 is not handled
        History::add($issue_id, $usr_id, 'note_routed', 'Note routed from {user}', array(
            'user' => $structure->headers['from'],
        ));

        return true;
    }

    /**
     * Routes a draft to the correct issue.
     *
     * @param   MailMessage $mail The Mail object
     * @return  mixed   true or array(ERROR_CODE, ERROR_STRING) in case of failure
     */
    public static function route_drafts($mail)
    {
        // save the full message for logging purposes
        Draft::saveRoutedMessage($mail);

        $headers = $mail->getHeaders();

        // remove the reply-to: header
        $headers->removeHeader('Reply-To');

        // check if the draft interface is even supposed to be enabled
        $setup = Setup::get();
        if ($setup['draft_routing']['status'] != 'enabled') {
            return array(self::EX_CONFIG, ev_gettext('Error: The email draft interface is disabled.') . "\n");
        }
        if (empty($setup['draft_routing']['address_prefix'])) {
            return array(self::EX_CONFIG, ev_gettext('Error: Please configure the email address prefix.') . "\n");
        }
        if (empty($setup['draft_routing']['address_host'])) {
            return array(self::EX_CONFIG, ev_gettext('Error: Please configure the email address domain.') . "\n");
        }


        // find which issue ID this email refers to
        $issue_id = null;
        if ($headers->has('To')) {
            $issue_id = self::getMatchingIssueIDs($mail->getAddresses('To'), 'note');
        }
        // we need to try the Cc header as well
        if (!$issue_id && $headers->has('Cc')) {
            $issue_id = self::getMatchingIssueIDs($mail->getAddresses('Cc'), 'note');
        }

        if (!$issue_id) {
            return array(self::EX_DATAERR, ev_gettext('Error: The routed email had no associated Eventum issue ID or had an invalid recipient address.') . "\n");
        }

        $prj_id = Issue::getProjectID($issue_id);
        // check if the sender is allowed in this issue' project and if it is an internal user
        $sender_email = $mail->getFromHeader();

        $sender_usr_id = User::getUserIDByEmail($sender_email, true);
        if (!empty($sender_usr_id)) {
            $sender_role = User::getRoleByUser($sender_usr_id, $prj_id);
            if ($sender_role < User::ROLE_USER) {
                return array(self::EX_NOPERM, ev_gettext("Error: The sender of this email is not allowed in the project associated with issue #$issue_id.") . "\n");
            }
        }

        AuthCookie::setAuthCookie(User::getUserIDByEmail($sender_email));
        AuthCookie::setProjectCookie($prj_id);

        $from = $mail->getHeaderValue('From');
        $to = $mail->getHeaderValue('To');
        $cc = $mail->getHeaderValue('Cc');

        Draft::saveEmail($issue_id, $to, $cc, $mail->getSubject(), $mail->getContent(), false, false, false);
        // XXX: need to handle attachments coming from drafts as well?
        $usr_id = Auth::getUserID();
        History::add($issue_id, $usr_id, 'draft_routed', 'Draft routed from {from}', array('from' => $from));

        return true;
    }

    /**
     * Check for $addresses for matches
     *
     * @param   string[]|string   $addresses to check
     * @param   string  $type Type of address match to find (email, note, draft)
     * @return  int|bool $issue_id in case of match otherwise false
     */
    public static function getMatchingIssueIDs($addresses, $type)
    {
        $setup = Setup::get();
        $settings = $setup["${type}_routing"];
        if (!is_array($settings)) {
            return false;
        }

        if (empty($settings['address_prefix'])) {
            return false;
        }
        // escape plus signs so 'issue+1@example.com' becomes a valid routing address
        $prefix = quotemeta($settings['address_prefix']);

        if (empty($settings['address_host'])) {
            return false;
        }

        $mail_domain = quotemeta($settings['address_host']);

        if (!empty($settings['host_alias'])) {
            // XXX: legacy split by '|' as well
            if (strchr($settings['host_alias'], '|')) {
                $host_aliases = explode('|', $settings['host_alias']);
            } else {
                $host_aliases = explode(' ', $settings['host_alias']);
            }
            $host_aliases = implode('|', array_map(function ($s) { return quotemeta($s); }, $host_aliases));

            $mail_domain = '(?:' . $mail_domain . '|' . $host_aliases . ')';
        }

        // everything safely escaped and checked, try matching address
        foreach ((array)$addresses as $address) {
            if (preg_match("/$prefix(\d*)@$mail_domain/i", $address, $matches)) {
                return (int) $matches[1];
            }
        }

        return false;
    }
}
