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

use Eventum\Mail\Exception\RoutingException;
use Eventum\Mail\Helper\AddressHeader;
use Eventum\Mail\MailMessage;

/**
 * Class to handle all routing functionality
 */
class Routing
{
    /**
     * Route all mail kinds: emails, notes, drafts (in that order) processing "To:" and "Cc:" headers
     *
     * @param string &$full_message
     * @throws RoutingException in case of failure
     * @return array|bool
     */
    public static function route(&$full_message)
    {
        self::removeMboxHeader($full_message);

        if (!$full_message) {
            throw RoutingException::noMessageBodyError();
        }

        $structure = Mime_Helper::decode($full_message, false, true);

        // we create addresses array so it can be reused
        $addresses = [];
        if (isset($structure->headers['to'])) {
            $addresses[] = $structure->headers['to'];
        }
        if (isset($structure->headers['cc'])) {
            $addresses[] = $structure->headers['cc'];
        }
        // free memory
        unset($structure);

        $setup = Setup::get();

        // create mapping for quickly checking if routing is enabled
        $routing = [
            'email' => $setup['email_routing']['status'] == 'enabled',
            'note' => $setup['note_routing']['status'] == 'enabled',
            'draft' => $setup['draft_routing']['status'] == 'enabled',
        ];

        $types = ['email', 'note', 'draft'];
        foreach ($addresses as $address) {
            // NOTE: $address is not individual recipients,
            // but rather raw To or Cc header containing multiple addresses

            foreach ($types as $type) {
                // route type needs to be enabled
                if (!$routing[$type]) {
                    continue;
                }

                if (self::getMatchingIssueIDs($address, $type) === false) {
                    continue;
                }

                switch ($type) {
                    case 'email':
                        $return = self::route_emails($full_message);
                        break;
                    case 'note':
                        $return = self::route_notes($full_message);
                        break;
                    case 'draft':
                        $return = self::route_drafts($full_message);
                        break;
                    default:
                        throw new LogicException("Bad type: $type");
                }

                if ($return === true) {
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
     * @param MailMessage $mail The Mail object
     * @throws RoutingException in case of failure
     * @return bool true if mail was routed
     * @return bool true if mail was routed
     */
    protected static function route_emails(MailMessage $mail)
    {
        // save the full message for logging purposes
        Support::saveRoutedEmail($mail);

        // check if the email routing interface is even supposed to be enabled
        $setup = Setup::get();
        if ($setup['email_routing']['status'] != 'enabled') {
            throw RoutingException::noEmailRouting();
        }
        if (!$setup['email_routing']['address_prefix']) {
            throw RoutingException::noEmailPrefixConfigured();
        }
        if (!$setup['email_routing']['address_host']) {
            throw RoutingException::noEmailDomainConfigured();
        }

        // associate routed emails to the internal system account
        $sys_account = User::getNameEmail(APP_SYSTEM_USER_ID);
        if (empty($sys_account['usr_email'])) {
            throw RoutingException::noAssociatedUserConfigured();
        }
        unset($sys_account);

        AuthCookie::setAuthCookie(APP_SYSTEM_USER_ID);

        $headers = $mail->getHeaders();

        // remove the reply-to: header
        $headers->removeHeader('Reply-To');

        if (Mime_Helper::hasAttachments($full_message)) {
            $has_attachments = 1;
        } else {
            $has_attachments = 0;
        }

        if (Mime_Helper::hasAttachments($full_message)) {
            $has_attachments = 1;
        } else {
            $has_attachments = 0;
        }

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
            throw RoutingException::noRecipientError();
        }

        $issue_prj_id = Issue::getProjectID($issue_id);
        if (empty($issue_prj_id)) {
            throw RoutingException::noRecipientError();
        }

        $email_account_id = Email_Account::getEmailAccount($issue_prj_id);
        if (empty($email_account_id)) {
            throw RoutingException::noEmaiAccountConfigured();
        }

        // get the sender's email address
        // FIXME: this is "From" or "From:" header?
        /** @var string $sender_email */
        $sender_email = $mail->getSender();

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
        $mail->setSubject(Mail_Helper::removeExcessRe($mail->subject));

        // TODO: remove all params that use $mail in some form and pass just $mail object
        // as for example content and headers could be rewritten later!
        $email_options = [
            'issue_id' => $issue_id,
            'ema_id' => $email_account_id,
            'message_id' => $mail->messageId,
            'date' => Date_Helper::getCurrentDateGMT(),
            'from' => $mail->from,
            'to' => $mail->to,
            'cc' => $mail->cc,
            'subject' => $mail->subject,
//            'body'           => $mail->getContent(), // FIXME: needed
//            'full_email'     => $mail->getRawContent(), // FIXME: needed?
            'has_attachment' => $has_attachments,
//            'headers'        => $headers->toString(), // FIXME: needed
            'mail' => $mail,
        ];

        // automatically associate this incoming email with a customer
        if (CRM::hasCustomerIntegration($prj_id)) {
            $crm = CRM::getInstance($prj_id);
            if ($sender_email) {
                try {
                    $contact = $crm->getContactByEmail($sender_email->toString());
                    $issue_contract = $crm->getContract(Issue::getContractID($issue_id));
                    if ($contact->canAccessContract($issue_contract)) {
                        $email_options['customer_id'] = $issue_contract->getCustomerID();
                    }
                } catch (CRMException $e) {
                }
            }
        }
        if (empty($email_options['customer_id'])) {
            $email_options['customer_id'] = null;
        }

        if (Support::blockEmailIfNeeded($email_options)) {
            return true;
        }

        // this method is weird.
        // it modifies $structure in one place, modifies $full_email in other place
        // and then inserts with $structure
        // the $mail for Support::insertEmail is used for workflow
        // probably doesn't matter much which version to use
        $mail = MailMessage::createFromString($full_message);
        Mail_Helper::rewriteThreadingHeaders($mail, $issue_id);

        $res = Support::insertEmail($email_options, $mail, $sup_id);
        if ($res != -1) {
            Support::extractAttachments($issue_id, $mail);

            // notifications about new emails are always external
            // special case when emails are bounced back, so we don't want a notification to customers about those
            // broadcast this email only to the assignees for this issue
            $is_bounce = $mail->isBounceMessage();
            $email_options['internal_only'] = $is_bounce;
            $email_options['assignee_only'] = $is_bounce;
            $email_options['sup_id'] = $sup_id;
            Notification::notifyNewEmail(Auth::getUserID(), $issue_id, $mail, $email_options);

            // try to get usr_id of sender, if not, use system account
            $usr_id = User::getUserIDByEmail($mail);
            if (!$usr_id) {
                $usr_id = APP_SYSTEM_USER_ID;
            }
            // mark this issue as updated
            if ((!empty($email_options['customer_id'])) && ($email_options['customer_id'] != null)) {
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
            History::add($issue_id, $usr_id, 'email_routed', 'Email routed from {from}', [
                'from' => $mail->from,
            ]);
        }

        return true;
    }

    /**
     * Routes a note to the correct issue
     *
     * @param MailMessage $mail The Mail object
     * @throws RoutingException in case of failure
     * @return bool true if mail was routed
     * @return bool true if mail was routed
     */
    protected static function route_notes(MailMessage $mail)
    {
        // save the full message for logging purposes
        Note::saveRoutedNote($mail);

        $headers = $mail->getHeaders();

        // remove the reply-to: header
        $headers->removeHeader('Reply-To');

        // check if the email routing interface is even supposed to be enabled
        $setup = Setup::get();
        if ($setup['note_routing']['status'] != 'enabled') {
            throw RoutingException::noEmailRouting();
        }
        if (!$setup['note_routing']['address_prefix']) {
            throw RoutingException::noEmailPrefixConfigured();
        }
        if (!$setup['note_routing']['address_host']) {
            throw RoutingException::noEmailDomainConfigured();
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
            throw RoutingException::noRecipientError();
        }

        $prj_id = Issue::getProjectID($issue_id);

        if (!$prj_id) {
            // if project id can't be fetched, the issue does not exist,
            // no point check deeper
            throw RoutingException::noIssuePermission($issue_id);
        }

        // check if the sender is allowed in this issue' project and if it is an internal user
        $sender_email = strtolower(Mail_Helper::getEmailAddress($structure->headers['from']));
        $sender_usr_id = User::getUserIDByEmail($sender_email, true);
        $usr_role_id = User::getRoleByUser($sender_usr_id, $prj_id);
        // XXX: move this ugly block to Access::can* method
        if ((!$sender_usr_id || $usr_role_id < User::ROLE_USER ||
                (User::isPartner($sender_usr_id) && !Access::canViewInternalNotes($issue_id, $sender_usr_id))) &&
                ((!Workflow::canSendNote($prj_id, $issue_id, $sender_email, $structure)))) {
            throw RoutingException::noIssuePermission($issue_id);
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
        $addresses = [];

        $to_addresses = AddressHeader::fromString(@$structure->headers['to'])->getEmails();
        if ($to_addresses) {
            $addresses = $to_addresses;
        }
        $cc_addresses = AddressHeader::fromString(@$structure->headers['cc'])->getEmails();
        if ($cc_addresses) {
            $addresses = array_merge($addresses, $cc_addresses);
        }
        $cc_users = [];
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
        $_POST = [
            'title' => @$structure->headers['subject'],
            'note' => $body,
            'note_cc' => $cc_users,
            'add_extra_recipients' => 'yes',
            'message_id' => @$structure->headers['message-id'],
            'parent_id' => $parent_id,
        ];

        // add the full email to the note if there are any attachments
        // this is needed because the front end code will display attachment links
        if ($mail->hasAttachments()) {
            $_POST['full_message'] = $full_message;
        }

        $usr_id = Auth::getUserID();
        $res = Note::insertFromPost($usr_id, $issue_id, $unknown_user, false);
        // need to handle attachments coming from notes as well
        if ($res != -1) {
            Support::extractAttachments($issue_id, $mail, true, $res);
        }

        // FIXME! $res == -2 is not handled
        History::add($issue_id, $usr_id, 'note_routed', 'Note routed from {user}', [
            'user' => $structure->headers['from'],
        ]);

        return true;
    }

    /**
     * Routes a draft to the correct issue.
     *
     * @param MailMessage $mail The Mail object
     * @throws RoutingException in case of failure
     * @return bool true if mail was routed
     * @return bool true if mail was routed
     */
    protected static function route_drafts($mail)
    {
        // save the full message for logging purposes
        Draft::saveRoutedMessage($mail);

        $headers = $mail->getHeaders();

        // remove the reply-to: header
        $headers->removeHeader('Reply-To');

        // check if the draft interface is even supposed to be enabled
        $setup = Setup::get();
        if ($setup['draft_routing']['status'] != 'enabled') {
            throw RoutingException::noDraftRouting();
        }
        if (!$setup['draft_routing']['address_prefix']) {
            throw RoutingException::noEmailPrefixConfigured();
        }
        if (!$setup['draft_routing']['address_host']) {
            throw RoutingException::noEmailDomainConfigured();
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
            throw RoutingException::noRecipientError();
        }

        $prj_id = Issue::getProjectID($issue_id);
        // check if the sender is allowed in this issue' project and if it is an internal user
        $sender_email = $mail->getSender();

        $sender_usr_id = User::getUserIDByEmail($sender_email, true);
        if (!empty($sender_usr_id)) {
            $sender_role = User::getRoleByUser($sender_usr_id, $prj_id);
            if ($sender_role < User::ROLE_USER) {
                throw RoutingException::noIssuePermission($issue_id);
            }
        }

        AuthCookie::setAuthCookie(User::getUserIDByEmail($sender_email));
        AuthCookie::setProjectCookie($prj_id);

        Draft::saveEmail($issue_id, $mail->to, $mail->cc, $mail->subject, $mail->getContent(), false, false, false);
        // XXX: need to handle attachments coming from drafts as well?
        $usr_id = Auth::getUserID();
        History::add($issue_id, $usr_id, 'draft_routed', 'Draft routed from {from}', ['from' => $mail->from]);

        return true;
    }

    /**
     * Check for $addresses for matches
     *
     * @param   string[]|string   $addresses to check
     * @param   string  $type Type of address match to find (email, note, draft)
     * @return  int|bool $issue_id in case of match otherwise false
     */
    private static function getMatchingIssueIDs($addresses, $type)
    {
        $setup = Setup::get();
        $settings = $setup["${type}_routing"];
        if (!$settings) {
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
            if (strstr($settings['host_alias'], '|')) {
                $host_aliases = explode('|', $settings['host_alias']);
            } else {
                $host_aliases = explode(' ', $settings['host_alias']);
            }
            $host_aliases = implode('|', array_map(function ($s) {
                return quotemeta($s);
            }, $host_aliases));

            $mail_domain = '(?:' . $mail_domain . '|' . $host_aliases . ')';
        }

        // everything safely escaped and checked, try matching address
        foreach ((array)$addresses as $address) {
            if (preg_match("/$prefix(\d+)@$mail_domain/i", $address, $matches)) {
                return (int) $matches[1];
            }
        }

        return false;
    }

    /**
     * Remove Mbox header from message if it is present
     *
     * @param string $message
     * @see https://github.com/eventum/eventum/issues/155
     * @internal public for testing
     */
    public static function removeMboxHeader(&$message)
    {
        if (substr($message, 0, 5) != 'From ') {
            return;
        }

        // $message can be big,
        // so the code below tries to not to allocate big buffers just to strip out first line

        // find EOL
        $i = strpos($message, "\r");
        if ($i === false) {
            $i = strpos($message, "\n");
        }
        if ($i === false) {
            throw new InvalidArgumentException('Could not find EOL');
        }

        // loop until no \r or \n
        while (in_array($message[$i], ["\r", "\n"])) {
            $i++;
        }
        $message = substr($message, $i);
    }
}
