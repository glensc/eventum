DROP TABLE IF EXISTS eventum_project_round_robin;
CREATE TABLE eventum_project_round_robin (
  prr_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  prr_prj_id INT(11) UNSIGNED NOT NULL,
  prr_blackout_start TIME NOT NULL,
  prr_blackout_end TIME NOT NULL,
  PRIMARY KEY (prr_id),
  UNIQUE KEY prr_prj_id (prr_prj_id)
);

DROP TABLE IF EXISTS eventum_round_robin_user;
CREATE TABLE eventum_round_robin_user (
  rru_prr_id INT(11) UNSIGNED NOT NULL,
  rru_usr_id INT(11) UNSIGNED NOT NULL,
  rru_next TINYINT(1) UNSIGNED NULL
);

ALTER TABLE eventum_support_email DROP COLUMN sup_draft_response;

CREATE TABLE eventum_email_draft (
  emd_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  emd_usr_id INT(11) UNSIGNED NOT NULL,
  emd_iss_id INT(11) unsigned NOT NULL,
  emd_sup_id INT(11) UNSIGNED NULL DEFAULT NULL,
  emd_updated_date DATETIME NOT NULL,
  emd_subject VARCHAR(255) NOT NULL,
  emd_body LONGTEXT NOT NULL,
  PRIMARY KEY(emd_id)
);

CREATE TABLE eventum_email_draft_recipient (
  edr_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  edr_emd_id INT(11) UNSIGNED NOT NULL,
  edr_is_cc TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
  edr_email VARCHAR(255) NOT NULL,
  PRIMARY KEY(edr_id)
);

ALTER TABLE eventum_note ADD COLUMN not_blocked_message longtext NULL;

# february 24

ALTER TABLE eventum_email_account ADD COLUMN ema_get_only_new int(1) NOT NULL DEFAULT 0;
ALTER TABLE eventum_email_account ADD COLUMN ema_leave_copy int(1) NOT NULL DEFAULT 0;

# march 1

ALTER TABLE eventum_news ADD COLUMN nws_status varchar(8) NOT NULL default 'active';

ALTER TABLE eventum_note ADD COLUMN not_title varchar(255) NOT NULL;
ALTER TABLE eventum_note ADD COLUMN not_parent_id int(11) unsigned NULL;

# march 8

ALTER TABLE eventum_reminder_level ADD COLUMN rem_rank TINYINT(1) NOT NULL;
INSERT INTO eventum_reminder_field (rmf_title, rmf_sql_field, rmf_sql_representation) VALUES ('Category', 'iss_prc_id', 'iss_prc_id');
ALTER TABLE eventum_issue ADD COLUMN iss_expected_resolution_date date default NULL;
ALTER TABLE eventum_status ADD COLUMN sta_abbreviation char(3) NOT NULL;
ALTER TABLE eventum_status ADD UNIQUE KEY sta_abbreviation (sta_abbreviation);

# march 15

DROP TABLE IF EXISTS eventum_reminder_action_list;
CREATE TABLE eventum_reminder_action_list (
  ral_rma_id INT(11) UNSIGNED NOT NULL,
  ral_email VARCHAR(255) NOT NULL,
  ral_usr_id INT(11) UNSIGNED NOT NULL
);

INSERT INTO eventum_reminder_action_type (rmt_type, rmt_title) VALUES ('email_list', 'Send Email Alert To...');
INSERT INTO eventum_reminder_action_type (rmt_type, rmt_title) VALUES ('sms_list', 'Send SMS Alert To...');

DROP TABLE IF EXISTS eventum_irc_notice;
CREATE TABLE eventum_irc_notice (
  ino_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  ino_prj_id INT(11) UNSIGNED NOT NULL,
  ino_created_date DATETIME NOT NULL,
  ino_message VARCHAR(255) NOT NULL,
  ino_status VARCHAR(8) NOT NULL DEFAULT 'pending',
  PRIMARY KEY(ino_id)
);



# April 8th, Issue #408, bryan
ALTER TABLE eventum_email_draft ADD COLUMN emd_unknown_user VARCHAR(255) NULL DEFAULT NULL;

ALTER TABLE eventum_note ADD COLUMN not_unknown_user VARCHAR(255) NULL DEFAULT NULL;

ALTER TABLE eventum_issue_attachment ADD column iat_unknown_user varchar(255) NULL DEFAULT NULL;

ALTER TABLE eventum_email_draft ADD COLUMN emd_updated_date DATETIME NOT NULL;

# after cancun

ALTER TABLE eventum_irc_notice ADD COLUMN ino_iss_id INT(11) UNSIGNED NOT NULL;
ALTER TABLE eventum_irc_notice DROP COLUMN ino_prj_id;
UPDATE eventum_irc_notice SET ino_iss_id=substring(ino_message, LOCATE('#', ino_message)+1, 4);


CREATE TABLE eventum_issue_user_replier (
  iur_iss_id int(10) unsigned NOT NULL default '0',
  iur_usr_id int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (iur_iss_id,iur_usr_id),
  KEY iur_usr_id (iur_usr_id),
  KEY iur_iss_id (iur_iss_id)
);

ALTER TABLE eventum_custom_filter ADD COLUMN cst_show_authorized char(3) default '';
ALTER TABLE eventum_custom_filter ADD COLUMN cst_show_notification_list char(3) default '';


# Issue 158, weekly reports. This issue turned into changing the history system.    
# please run script misc/runonce/set_history_type.php after applying these changes.

# lookup table for history type
CREATE TABLE eventum_history_type (
    htt_id tinyint(2) unsigned NOT NULL auto_increment,
    htt_name varchar(25) NOT NULL,
    PRIMARY KEY(htt_id),
    UNIQUE (htt_name)
);
INSERT INTO eventum_history_type SET htt_name = 'attachment_removed';
INSERT INTO eventum_history_type SET htt_name = 'attachment_added';
INSERT INTO eventum_history_type SET htt_name = 'custom_field_updated';
INSERT INTO eventum_history_type SET htt_name = 'draft_added';
INSERT INTO eventum_history_type SET htt_name = 'draft_updated';
INSERT INTO eventum_history_type SET htt_name = 'impact_analysis_added';
INSERT INTO eventum_history_type SET htt_name = 'impact_analysis_updated';
INSERT INTO eventum_history_type SET htt_name = 'impact_analysis_removed';
INSERT INTO eventum_history_type SET htt_name = 'status_changed';
INSERT INTO eventum_history_type SET htt_name = 'remote_locked';
INSERT INTO eventum_history_type SET htt_name = 'remote_status_change';
INSERT INTO eventum_history_type SET htt_name = 'remote_unlock';
INSERT INTO eventum_history_type SET htt_name = 'remote_assigned';
INSERT INTO eventum_history_type SET htt_name = 'remote_replier_added';
INSERT INTO eventum_history_type SET htt_name = 'details_updated';
INSERT INTO eventum_history_type SET htt_name = 'issue_opened';
INSERT INTO eventum_history_type SET htt_name = 'issue_auto_assigned';
INSERT INTO eventum_history_type SET htt_name = 'rr_issue_assigned';
INSERT INTO eventum_history_type SET htt_name = 'issue_locked';
INSERT INTO eventum_history_type SET htt_name = 'issue_unlocked';
INSERT INTO eventum_history_type SET htt_name = 'duplicate_update';
INSERT INTO eventum_history_type SET htt_name = 'duplicate_removed';
INSERT INTO eventum_history_type SET htt_name = 'duplicate_added';
INSERT INTO eventum_history_type SET htt_name = 'issue_opened_anon';
INSERT INTO eventum_history_type SET htt_name = 'remote_issue_created';
INSERT INTO eventum_history_type SET htt_name = 'issue_closed';
INSERT INTO eventum_history_type SET htt_name = 'issue_updated';
INSERT INTO eventum_history_type SET htt_name = 'user_associated';
INSERT INTO eventum_history_type SET htt_name = 'user_all_unassociated';
INSERT INTO eventum_history_type SET htt_name = 'replier_added';
INSERT INTO eventum_history_type SET htt_name = 'remote_note_added';
INSERT INTO eventum_history_type SET htt_name = 'note_added';
INSERT INTO eventum_history_type SET htt_name = 'note_removed';
INSERT INTO eventum_history_type SET htt_name = 'note_converted_draft';
INSERT INTO eventum_history_type SET htt_name = 'note_converted_email';
INSERT INTO eventum_history_type SET htt_name = 'notification_removed';
INSERT INTO eventum_history_type SET htt_name = 'notification_added';
INSERT INTO eventum_history_type SET htt_name = 'notification_updated';
INSERT INTO eventum_history_type SET htt_name = 'phone_entry_added';
INSERT INTO eventum_history_type SET htt_name = 'phone_entry_removed';
INSERT INTO eventum_history_type SET htt_name = 'scm_checkin_removed';
INSERT INTO eventum_history_type SET htt_name = 'email_associated';
INSERT INTO eventum_history_type SET htt_name = 'email_disassociated';
INSERT INTO eventum_history_type SET htt_name = 'email_sent';
INSERT INTO eventum_history_type SET htt_name = 'time_added';
INSERT INTO eventum_history_type SET htt_name = 'time_removed';
INSERT INTO eventum_history_type SET htt_name = 'remote_time_added';
INSERT INTO eventum_history_type SET htt_name = 'email_blocked';
INSERT INTO eventum_history_type SET htt_name = 'email_routed';
INSERT INTO eventum_history_type SET htt_name = 'note_routed';


ALTER TABLE eventum_issue_history ADD COLUMN his_usr_id int(11) UNSIGNED NOT NULL AFTER his_iss_id;
ALTER TABLE eventum_issue_history ADD COLUMN his_htt_id varchar(20) NOT NULL;





# Allowing authorized repliers not be real users
ALTER TABLE eventum_issue_user_replier DROP PRIMARY KEY;
ALTER TABLE eventum_issue_user_replier ADD column iur_id int(11) unsigned NOT NULL auto_increment FIRST, ADD PRIMARY KEY(iur_id);
ALTER TABLE eventum_issue_user_replier ADD COLUMN iur_email varchar(255) NULL;


INSERT INTO eventum_history_type SET htt_name = 'replier_removed';
INSERT INTO eventum_history_type SET htt_name = 'replier_other_added';

# mail_queue changes
CREATE TABLE eventum_mail_queue (
  maq_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  maq_queued_date DATETIME NOT NULL,
  maq_status VARCHAR(8) NOT NULL DEFAULT 'pending',
  maq_save_copy TINYINT(1) NOT NULL DEFAULT 1,
  maq_sender_ip_address VARCHAR(15) NOT NULL,
  maq_recipient VARCHAR(255) NOT NULL,
  maq_headers TEXT NOT NULL,
  maq_body LONGTEXT NOT NULL,
  KEY maq_status (maq_status),
  PRIMARY KEY(maq_id)
);

CREATE TABLE eventum_mail_queue_log (
  mql_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  mql_maq_id INT(11) UNSIGNED NOT NULL,
  mql_created_date DATETIME NOT NULL,
  mql_status VARCHAR(8) NOT NULL DEFAULT 'error',
  mql_server_message TEXT NULL,
  KEY mql_maq_id (mql_maq_id),
  PRIMARY KEY(mql_id)
);

INSERT INTO eventum_history_type SET htt_name = 'issue_associated';
INSERT INTO eventum_history_type SET htt_name = 'issue_all_unassociated';

# more weekly report related items
ALTER TABLE eventum_issue_history ADD COLUMN his_is_hidden tinyint(1) NOT NULL DEFAULT 0;

ALTER TABLE eventum_issue_user ADD COLUMN isu_assigned_date datetime;

INSERT INTO eventum_history_type SET htt_name = 'user_unassociated';
INSERT INTO eventum_history_type SET htt_name = 'issue_unassociated';

# may 25

ALTER TABLE eventum_issue ADD COLUMN iss_trigger_reminders tinyint(1) default 1;

# june 2

UPDATE eventum_user SET usr_email='system-account@example.com' WHERE usr_id=1;

DROP TABLE IF EXISTS eventum_project_status_date;
CREATE TABLE eventum_project_status_date (
  psd_id INT(11) UNSIGNED NOT NULL auto_increment,
  psd_prj_id INT(11) UNSIGNED NOT NULL,
  psd_sta_id INT(10) UNSIGNED NOT NULL,
  psd_date_field VARCHAR(64) NOT NULL,
  psd_label VARCHAR(32) NOT NULL,
  PRIMARY KEY (psd_id),
  UNIQUE KEY (psd_prj_id, psd_sta_id)
);

# june 7

DROP TABLE IF EXISTS eventum_support_email_body;
CREATE TABLE eventum_support_email_body (
  seb_sup_id int(11) unsigned NOT NULL,
  seb_body longtext NOT NULL,
  seb_full_email longtext NOT NULL,
  PRIMARY KEY (seb_sup_id)
);
INSERT INTO eventum_support_email_body (SELECT sup_id, sup_body, sup_full_email FROM eventum_support_email);
# Run the next 2 lines ONLY after you have run the above line and check that eventum_support_email_body has the data correctly.
# ALTER TABLE eventum_support_email DROP COLUMN sup_body;
# ALTER TABLE eventum_support_email DROP COLUMN sup_full_email;

# june 8
ALTER TABLE eventum_support_email ADD COLUMN sup_usr_id int(11) unsigned DEFAULT NULL AFTER sup_iss_id;
ALTER TABLE eventum_support_email ADD KEY sup_usr_id(sup_usr_id);

# please run /misc/upgrade/v1.1_to_v1.2/set_support_email_usr_id.php

ALTER TABLE eventum_email_account ADD COLUMN ema_issue_auto_creation varchar(8) NOT NULL DEFAULT 'disabled';
ALTER TABLE eventum_email_account ADD COLUMN ema_issue_auto_creation_options text;




# eventum 1.3!!!!!!!!!!!!!!!!!!!!!!!!!!!!!11111111111

UPDATE eventum_user SET usr_role=usr_role+2 WHERE usr_role>3;
UPDATE eventum_user SET usr_role=4 WHERE usr_role=3;

ALTER TABLE eventum_project ADD COLUMN prj_customer_backend varchar(64) NULL;
ALTER TABLE eventum_custom_filter ADD COLUMN cst_customer_email varchar(64) default NULL;
ALTER TABLE eventum_issue ADD COLUMN iss_customer_id int(11) unsigned NULL;
ALTER TABLE eventum_issue ADD COLUMN iss_customer_contact_id int(11) unsigned NULL;
ALTER TABLE eventum_issue ADD COLUMN iss_last_customer_action_date datetime default NULL;
ALTER TABLE eventum_support_email ADD COLUMN sup_customer_id int(11) unsigned NULL;

ALTER TABLE eventum_user ADD COLUMN usr_customer_id int(11) unsigned NULL default NULL;
ALTER TABLE eventum_user ADD COLUMN usr_customer_contact_id int(11) unsigned NULL default NULL;

ALTER TABLE eventum_user ADD COLUMN usr_clocked_in tinyint(1) DEFAULT 0;

DROP TABLE IF EXISTS eventum_customer_note;
create table eventum_customer_note (
    cno_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    cno_prj_id int(11) unsigned NOT NULL,
    cno_customer_id INT(11) UNSIGNED NOT NULL,
    cno_created_date DATETIME NOT NULL,
    cno_updated_date DATETIME NULL,
    cno_note TEXT,
    primary key(cno_id),
    unique(cno_prj_id, cno_customer_id)
);

DROP TABLE IF EXISTS eventum_customer_account_manager;
CREATE TABLE eventum_customer_account_manager (
  cam_id int(11) unsigned NOT NULL auto_increment,
  cam_prj_id int(11) unsigned NOT NULL,
  cam_customer_id int(11) unsigned NOT NULL,
  cam_usr_id int(11) unsigned NOT NULL,
  cam_type varchar(7) NOT NULL,
  PRIMARY KEY (cam_id),
  KEY cam_customer_id (cam_customer_id),
  UNIQUE KEY cam_manager (cam_prj_id, cam_customer_id, cam_usr_id)
);


ALTER TABLE eventum_project ADD COLUMN prj_workflow_backend varchar(64) NULL DEFAULT NULL;

CREATE TABLE eventum_faq (
  faq_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  faq_prj_id INT(11) UNSIGNED NOT NULL,
  faq_usr_id INT(11) UNSIGNED NOT NULL,
  faq_created_date DATETIME NOT NULL,
  faq_updated_date DATETIME NULL,
  faq_title VARCHAR(255) NOT NULL,
  faq_message LONGTEXT NOT NULL,
  PRIMARY KEY (faq_id),
  UNIQUE KEY faq_title (faq_title)
);

CREATE TABLE eventum_faq_support_level (
  fsl_faq_id INT(11) UNSIGNED NOT NULL,
  fsl_support_level_id INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (fsl_faq_id, fsl_support_level_id)
);

ALTER TABLE eventum_reminder_requirement ADD COLUMN rer_support_level_id INT(11) UNSIGNED NULL;
ALTER TABLE eventum_reminder_requirement ADD COLUMN rer_customer_id INT(11) UNSIGNED NULL;

CREATE TABLE eventum_project_field_display (
  pfd_prj_id int(11) unsigned NOT NULL,
  pfd_field varchar(20) NOT NULL,
  pfd_min_role tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (pfd_prj_id, pfd_field)
);





# August 17
CREATE TABLE eventum_issue_quarantine (
    iqu_iss_id int(11) unsigned auto_increment,
    iqu_expiration datetime NULL,
    iqu_status tinyint(1),
    PRIMARY KEY(iqu_iss_id),
    INDEX(iqu_expiration)
);

# august 18

ALTER TABLE eventum_custom_filter ADD COLUMN cst_is_global int(1) default 0;

# August 19th
ALTER TABLE eventum_mail_queue ADD COLUMN maq_iss_id int(11) unsigned AFTER maq_id;
ALTER TABLE eventum_mail_queue ADD COLUMN maq_subject varchar(255) NOT NULL AFTER maq_recipient;
ALTER TABLE eventum_mail_queue ADD INDEX maq_iss_id (maq_iss_id);

# August 23rd
CREATE TABLE eventum_group (
    grp_id int(11) unsigned auto_increment,
    grp_name varchar(100) unique,
    grp_description varchar(255),
    grp_manager_usr_id int(11) unsigned,
    PRIMARY KEY(grp_id)
);

CREATE TABLE eventum_project_group (
    pgr_prj_id int(11)  unsigned,
    pgr_grp_id int(11) unsigned,
    index(pgr_prj_id),
    index(pgr_grp_id)
);

ALTER TABLE eventum_user ADD COLUMN usr_grp_id int(11) unsigned NULL default NULL AFTER usr_id;
ALTER TABLE eventum_user ADD INDEX(usr_grp_id);

ALTER TABLE eventum_issue ADD COLUMN iss_grp_id int(11) unsigned NULL default NULL AFTER iss_usr_id;
ALTER TABLE eventum_issue ADD INDEX(iss_grp_id);

INSERT INTO eventum_history_type SET htt_name = 'group_changed';


# august 24th
ALTER TABLE eventum_priority RENAME eventum_project_priority;
ALTER TABLE eventum_project_priority CHANGE column pri_id pri_id tinyint(1) unsigned NOT NULL default '0' auto_increment;
ALTER TABLE eventum_project_priority ADD COLUMN pri_prj_id int(11) unsigned NOT NULL;
ALTER TABLE eventum_project_priority DROP PRIMARY KEY;
ALTER TABLE eventum_project_priority ADD PRIMARY KEY(pri_id);
ALTER TABLE eventum_project_priority DROP KEY pri_id;
ALTER TABLE eventum_project_priority DROP KEY pri_id_2;
ALTER TABLE eventum_project_priority ADD KEY(pri_title);
ALTER TABLE eventum_project_priority ADD UNIQUE(pri_prj_id, pri_title);

CREATE TABLE eventum_project_email_response (
  per_prj_id int(11) unsigned NOT NULL,
  per_ere_id int(10) unsigned NOT NULL,
  PRIMARY KEY (per_prj_id, per_ere_id)
);


CREATE TABLE eventum_project_phone_category (
  phc_id int(11) unsigned NOT NULL auto_increment,
  phc_prj_id int(11) unsigned NOT NULL default '0',
  phc_title varchar(64) NOT NULL default '',
  PRIMARY KEY  (phc_id),
  UNIQUE KEY uniq_category (phc_prj_id,phc_title),
  KEY phc_prj_id (phc_prj_id)
);
INSERT INTO eventum_project_phone_category (phc_id, phc_prj_id, phc_title) VALUES (1, 1, 'Sales Issues');
INSERT INTO eventum_project_phone_category (phc_id, phc_prj_id, phc_title) VALUES (2, 1, 'Technical Issues');
INSERT INTO eventum_project_phone_category (phc_id, phc_prj_id, phc_title) VALUES (3, 1, 'Administrative Issues');
INSERT INTO eventum_project_phone_category (phc_id, phc_prj_id, phc_title) VALUES (4, 1, 'Other');

ALTER TABLE eventum_phone_support ADD COLUMN phs_phc_id int(11) unsigned NOT NULL;

# fix old values
UPDATE eventum_phone_support SET phs_phc_id=1 WHERE phs_reason='sales';
UPDATE eventum_phone_support SET phs_phc_id=2 WHERE phs_reason='technical';
UPDATE eventum_phone_support SET phs_phc_id=3 WHERE phs_reason='administrative';
UPDATE eventum_phone_support SET phs_phc_id=4 WHERE phs_reason='other';

# check if everything is correct
# SELECT DISTINCT phs_reason, COUNT(*) total FROM eventum_phone_support GROUP BY phs_reason;
ALTER TABLE eventum_phone_support DROP COLUMN phs_reason;

ALTER TABLE eventum_reminder_action ADD COLUMN rma_alert_irc TINYINT(1) unsigned NOT NULL DEFAULT 0;


# August 31st
ALTER TABLE eventum_issue ADD COLUMN iss_last_public_action_date datetime NULL;
ALTER TABLE eventum_issue ADD COLUMN iss_last_public_action_type varchar(20) NULL;
ALTER TABLE eventum_issue ADD COLUMN iss_last_internal_action_date datetime NULL;
ALTER TABLE eventum_issue ADD COLUMN iss_last_internal_action_type varchar(20) NULL;

ALTER TABLE eventum_reminder_action ADD COLUMN rma_alert_group_leader TINYINT(1) unsigned NOT NULL DEFAULT 0;


# september 2nd
ALTER TABLE eventum_project_user DROP KEY pru_prj_id;
ALTER TABLE eventum_project_user ADD UNIQUE KEY pru_prj_id (pru_prj_id,pru_usr_id);


# september 3rd
ALTER TABLE eventum_history_type ADD COLUMN htt_role tinyint(1) DEFAULT '0';
UPDATE eventum_history_type SET htt_role = 4 WHERE htt_name IN('note_added', 'note_removed', 'note_converted_draft', 
    'note_converted_email', 'phone_entry_added', 'phone_entry_removed', 'time_added', 'time_removed', 
    'remote_time_added', 'email_blocked', 'note_routed', 'group_changed', 'draft_added', 'draft_updated');
INSERT INTO eventum_history_type SET htt_name = 'status_auto_changed', htt_role = 4;


CREATE TABLE eventum_reminder_triggered_action (
  rta_iss_id int(11) unsigned not null,
  rta_rma_id int(11) unsigned not null,
  PRIMARY KEY (rta_iss_id)
);

