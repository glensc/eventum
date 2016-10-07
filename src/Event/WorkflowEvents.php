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

namespace Eventum\Event;

/**
 * Contains all events known in workflow.
 */
final class WorkflowEvents
{
    /**
     * Is called when an issue is updated.
     *
     * @param   integer $prj_id The project ID.
     * @param   integer $issue_id The ID of the issue.
     * @param   integer $usr_id The ID of the user.
     * @param   array $old_details The old details of the issues.
     * @param   array $changes The changes that were applied to this issue (the $_POST)
     */
    const ISSUE_UPDATED = 'issue.updated';

    /**
     * Called before an issue is updated.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue
     * @param   integer $usr_id The ID of the user changing the issue.
     * @param   array $changes
     * @return  mixed. True to continue, anything else to cancel the change and return the value
     */
    const ISSUE_PRE_UPDATED = 'issue.pre_updated';

    /**
     * Called when a file is attached to an issue..
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   integer $usr_id The id of the user who locked the issue.
     */
    const ISSUE_ATTACHED_FILE = 'issue.attached_file';

    /**
     * Determines if the attachment should be added
     *
     * @param   integer $prj_id The project ID.
     * @param   integer $issue_id The ID of the issue.
     * @param   integer $usr_id The id of the user who attached the file
     * @param   array $attachment attachment object
     * @return  boolean
     */
    const ISSUE_SHOULD_ATTACH_FILE = 'issue.should_attach_file';

    /**
     * Called when the priority of an issue changes.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   integer $usr_id The id of the user who changed the issue.
     * @param   array $old_details The old details of the issue.
     * @param   array $changes The changes that were applied to this issue (the $_POST)
     */
    const ISSUE_PRIORITY_CHANGE = 'issue.priority_change';

    /**
     * Called when the severity of an issue changes.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   integer $usr_id The id of the user who changed the issue.
     * @param   array $old_details The old details of the issue.
     * @param   array $changes The changes that were applied to this issue (the $_POST)
     */
    const ISSUE_SEVERITY_CHANGE = 'issue.severity_change';

    /**
     * Called when an email is blocked.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   array $email_details Details of the issue
     * @param   string $type What type of blocked email this is.
     */
    const EMAIL_BLOCKED = 'email.blocked';

    /**
     * Called when the assignment on an issue changes.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   integer $usr_id The id of the user who assigned the issue.
     * @param   array $issue_details The old details of the issue.
     * @param   array $new_assignees The new assignees of this issue.
     * @param   boolean $remote_assignment If this issue was remotely assigned.
     */
    const ISSUE_ASSIGNMENT_CHANGE = 'issue.assignment_change';

    /**
     * Called when a new issue is created.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   boolean $has_TAM If this issue has a technical account manager.
     * @param   boolean $has_RR If Round Robin was used to assign this issue.
     */
    const ISSUE_CREATED = 'issue.created';

    /**
     * Called when an email is received.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   object $message An object containing the new email
     * @param   array $row The array of data that was inserted into the database.
     * @param   boolean $closing If we are closing the issue.
     */
    const EMAIL_NEW = 'email.new';

    /**
     * Called when an email is manually associated with an existing issue.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     */
    const ISSUE_ASSOCIATED = 'issue.associated';

    /**
     * Called when a note is routed.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   integer $usr_id The user ID of the person posting this new note
     * @param   boolean $closing If the issue is being closed
     * @param   integer $note_id The ID of the new note
     */
    const NOTE_CREATED = 'note.created';

    /**
     * Method is called to return the list of statuses valid for a specific issue.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @return  array An associative array of statuses valid for this issue.
     */
    const STATUS_LIST = 'status.list';

    /**
     * Called when issue is closed.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   boolean $send_notification Whether to send a notification about this action or not
     * @param   integer $resolution_id The resolution ID
     * @param   integer $status_id The status ID
     * @param   string $reason The reason for closing this issue
     * @param   integer $usr_id The ID of the user closing this issue
     * @return  void
     */
    const ISSUE_CLOSED = 'issue.closed';

    /**
     * Called when custom fields are updated
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue
     * @param   array $old The custom fields before the update.
     * @param   array $new The custom fields after the update.
     * @param   array $changed An array containing what was changed.
     */
    const CUSTOM_FIELD_UPDATE = 'custom_field.update';

    /**
     * Called when an attempt is made to add a user or email address to the
     * notification list.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue.
     * @param   integer $subscriber_usr_id The ID of the user to subscribe if this is a real user (false otherwise).
     * @param   string $email The email address  to subscribe (if this is not a real user).
     * @param   array $types The action types.
     * @return  mixed An array of information or true to continue unchanged or false to prevent the user from being added.
     */
    const SUBSCRIPTION_UPDATE = 'subscription.update';
    /**
     * Called when SCM checkins are associated.
     *
     * @param   integer $prj_id The project ID.
     * @param   integer $issue_id The ID of the issue.
     * @param   array $files File list with their version numbers changes made on.
     * @param   string $username SCM user doing the checkin.
     * @param   string $commit_msg Message associated with the SCM commit.
     */
    const SCM_ADDED = 'scm.added';

    /**
     * Determines if the address should should be emailed.
     *
     * @param integer $prj_id The project ID.
     * @param string $address The email address to check
     * @param bool $issue_id
     * @param bool $type
     * @return boolean
     */
    const EMAIL_CAN_MAIL = 'email.can_mail';

    /**
     * Returns additional email addresses that should be notified for a specific event..
     *
     * @param   integer $prj_id The project ID.
     * @param   integer $issue_id The ID of the issue.
     * @param   string $event The event to return additional email addresses for. Currently only "new_issue" is supported.
     * @param   array $extra Extra information, contains different info depending on where it is called from
     * @return  array   An array of email addresses to be notified.
     */
    const EMAIL_ADDITIONAL = 'email.additional';

    /**
     * Indicates if the the specified email address can email the issue. Can be
     * used to disable email blocking by always returning true.
     *
     * @param   integer $prj_id The project ID.
     * @param   integer $issue_id The ID of the issue
     * @param   string $email The email address that is trying to send an email
     * @return  boolean true if the sender can email the issue, false if the sender
     *          should not email the issue and null if the default rules should be used.
     */
    const EMAIL_CAN_EMAIL_ISSUE = 'email.can_email_issue';

    /**
     * Called to check if an email address that does not have an eventum account can send notes to an issue.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The issue ID
     * @param   string $email The email address to check
     * @param $structure
     * @return  boolean True if the note should be added, false otherwise
     */
    const NOTE_CAN_SEND = 'note.can_send';

    /**
     * Called to check if an email address that does not have an eventum account can send notes to an issue.
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The issue ID
     * @param   string $usr_id The ID of the user
     * @return  boolean True if the issue can be cloned, false otherwise
     */
    const ISSUE_CAN_CLONE = 'issue.can_clone';

    /**
     * Handles when an authorized replier is added
     *
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue
     * @param   string $email The email address added
     * @return  boolean
     */
    const AUTH_REPLIER_ADDED = 'auth_replier.added';

    /**
     * Called at the begining of the email download process. If it returns -1, the
     * rest of the email code will not be executed.
     *
     * @param   integer $prj_id The project ID
     * @param   array $info An array containing the information on the email account.
     * @param   resource $mbox The imap connection resource
     * @param   integer $num The sequential email number
     * @param   string $message The complete email message
     * @param   object $email An object containing the decoded email
     * @param   object $structure An object containing the decoded email
     * @return  mixed null by default, -1 if the rest of the email script should not be processed.
     */
    const EMAIL_PRE_DOWNLOAD = 'email.pre_download';

    /**
     * Called before inserting a note. If it returns false the rest of the note code
     * will not be executed. Return null to continue as normal (possibly with changed $data)
     *
     * @param   integer $prj_id
     * @param   integer $issue_id
     * @param   array $data
     * @return  mixed   Null by default, false if the note should not be inserted
     */
    const NOTE_PRE_INSERT = 'note.pre_insert';

    /**
     * Indicates if the email addresses should automatically be added to the NL from notes and emails.
     *
     * @param   integer $prj_id The project ID.
     * @return  boolean
     */
    const NOTIFICATION_AUTO_ADD = 'notification.auto_add';

    /**
     * Returns the issue ID to associate a new email with, null to use the default logic and "new" to create
     * a new issue.
     * Can also return an array containing 'customer_id', 'contact_id' and 'contract_id', 'sev_id'
     *
     * @param   integer $prj_id The ID of the project
     * @param   array $info An array of info about the email account.
     * @param   string $headers The headers of the email.
     * @param   string $message_body The body of the message.
     * @param   string $date The date this message was sent
     * @param   string $from The name and email address of the sender.
     * @param   string $subject The subject of this message.
     * @param   array $to An array of to addresses
     * @param   array $cc An array of cc addresses
     * @return  string|array
     */
    const ISSUE_ID_FROM_EMAIL = 'issue.id_from_email';

    /**
     * Modifies the content of the message being added to the mail queue.
     *
     * @param   integer $prj_id
     * @param   string $recipient
     * @param   array $headers
     * @param   string $body
     * @param   integer $issue_id
     * @param   string $type The type of message this is.
     * @param   integer $sender_usr_id The id of the user sending this email.
     * @param   integer $type_id The ID of the event that triggered this notification (issue_id, sup_id, not_id, etc)
     */
    const MAIL_QUEUE_MODIFY = 'mail_queue.modify';

    /**
     * Called before the status changes. Parameters are passed by reference so the values can be changed.
     *
     * @param   integer $prj_id
     * @param   integer $issue_id
     * @param   integer $status_id
     * @param   boolean $notify
     * @return  boolean true to continue normal processing, anything else to cancel and return value.
     */
    const STATUS_PRE_CHANGE = 'status.pre_change';

    /**
     * Called at the start of many pages. After the includes and maybe some other code this
     * method is called to do whatever you want. Eventually this will be called on many pages.
     *
     * @param   integer $prj_id The project ID
     * @param   string $page_name The name of the page
     * @return  null
     */
    const PAGE_PRE = 'page.pre';

    /**
     * Called to determine which actions to subscribe a new user too.
     *
     * @see     Notification::getDefaultActions()
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue
     * @param   string $email The email address of the user being added
     * @param   string $source The source of this call
     * @return  array   an array of actions
     */
    const NOTIFICATION_ACTIONS = 'notification.actions';

    /**
     * Returns which "issue fields" should be displayed in a given location.
     *
     * @see     class.issue_field.php
     * @param   integer $prj_id The project ID
     * @param   integer $issue_id The ID of the issue
     * @param   string $location The location to display these fields at
     * @return  array   an array of fields to display and their associated options
     */
    const ISSUE_FIELDS_DISPLAY = 'issue.fields_display';

    /**
     * Returns an array of patterns and replacements.
     *
     * @param   integer $prj_id The ID of the project
     * @return  array An array of patterns and replacements
     */
    const LINK_FILTERS_GET = 'link_filters.get';

    /**
     * Returns if a user can update an issue. Return null to use default rules.
     */
    const ISSUE_CAN_UPDATE = 'issue.can_update';

    /**
     * Returns the ID of the group that is "active" right now.
     */
    const GROUP_GET_ACTIVE = 'group.get_active';

    const IRC_FORMAT_MESSAGE = 'irc.format_message';
}
