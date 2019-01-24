-- MySQL dump 10.13  Distrib 5.6.42, for osx10.14 (x86_64)
--
-- Host: localhost    Database: e
-- ------------------------------------------------------
-- Server version	5.7.24-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `api_token`
--

DROP TABLE IF EXISTS `api_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_token` (
  `apt_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apt_usr_id` int(10) unsigned NOT NULL,
  `apt_created` datetime NOT NULL,
  `apt_status` varchar(10) NOT NULL DEFAULT 'active',
  `apt_token` varchar(32) NOT NULL,
  PRIMARY KEY (`apt_id`),
  KEY `apt_usr_id` (`apt_usr_id`,`apt_status`),
  KEY `apt_token` (`apt_token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `attachment_chunk`
--

DROP TABLE IF EXISTS `attachment_chunk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachment_chunk` (
  `path_id` mediumint(8) unsigned NOT NULL,
  `chunk_no` smallint(5) unsigned NOT NULL,
  `content` mediumblob NOT NULL,
  PRIMARY KEY (`path_id`,`chunk_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `attachment_path`
--

DROP TABLE IF EXISTS `attachment_path`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachment_path` (
  `path_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('dir','file') NOT NULL,
  `path` varchar(255) NOT NULL,
  `mimetype` varchar(255) CHARACTER SET ascii DEFAULT NULL,
  `visibility` varchar(25) DEFAULT '',
  `size` int(11) unsigned DEFAULT NULL,
  `is_compressed` tinyint(4) NOT NULL DEFAULT '1',
  `update_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`path_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `columns_to_display`
--

DROP TABLE IF EXISTS `columns_to_display`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `columns_to_display` (
  `ctd_prj_id` int(11) unsigned NOT NULL,
  `ctd_page` varchar(20) NOT NULL,
  `ctd_field` varchar(30) NOT NULL,
  `ctd_min_role` tinyint(1) NOT NULL DEFAULT '0',
  `ctd_rank` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ctd_prj_id`,`ctd_page`,`ctd_field`),
  KEY `ctd_prj_id` (`ctd_prj_id`,`ctd_page`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `commit`
--

DROP TABLE IF EXISTS `commit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commit` (
  `com_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `com_scm_name` varchar(255) NOT NULL DEFAULT 'default',
  `com_project_name` varchar(255) DEFAULT NULL,
  `com_changeset` varchar(40) NOT NULL,
  `com_branch` varchar(255) DEFAULT NULL,
  `com_author_email` varchar(255) DEFAULT NULL,
  `com_author_name` varchar(255) DEFAULT NULL,
  `com_usr_id` int(11) DEFAULT NULL,
  `com_commit_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `com_message` mediumtext,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `commit_file`
--

DROP TABLE IF EXISTS `commit_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commit_file` (
  `cof_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cof_com_id` int(10) unsigned NOT NULL,
  `cof_filename` varchar(255) NOT NULL DEFAULT '',
  `cof_added` tinyint(1) NOT NULL DEFAULT '0',
  `cof_modified` tinyint(1) NOT NULL DEFAULT '0',
  `cof_removed` tinyint(1) NOT NULL DEFAULT '0',
  `cof_old_version` varchar(40) DEFAULT NULL,
  `cof_new_version` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cof_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `custom_field`
--

DROP TABLE IF EXISTS `custom_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custom_field` (
  `fld_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fld_title` varchar(32) NOT NULL DEFAULT '',
  `fld_description` varchar(64) DEFAULT NULL,
  `fld_type` varchar(8) NOT NULL DEFAULT 'text',
  `fld_report_form` int(1) NOT NULL DEFAULT '1',
  `fld_report_form_required` int(1) NOT NULL DEFAULT '0',
  `fld_anonymous_form` int(1) NOT NULL DEFAULT '1',
  `fld_anonymous_form_required` int(1) NOT NULL DEFAULT '0',
  `fld_close_form` tinyint(1) NOT NULL DEFAULT '0',
  `fld_close_form_required` tinyint(1) NOT NULL DEFAULT '0',
  `fld_edit_form_required` tinyint(1) NOT NULL DEFAULT '0',
  `fld_list_display` tinyint(1) NOT NULL DEFAULT '0',
  `fld_min_role` tinyint(1) NOT NULL DEFAULT '0',
  `fld_min_role_edit` tinyint(1) NOT NULL DEFAULT '0',
  `fld_rank` smallint(6) NOT NULL DEFAULT '0',
  `fld_backend` varchar(255) CHARACTER SET ascii DEFAULT NULL,
  `fld_order_by` varchar(20) NOT NULL DEFAULT 'cfo_id ASC',
  PRIMARY KEY (`fld_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `custom_field_option`
--

DROP TABLE IF EXISTS `custom_field_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custom_field_option` (
  `cfo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cfo_fld_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfo_rank` int(10) unsigned NOT NULL DEFAULT '0',
  `cfo_value` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`cfo_id`),
  KEY `icf_fld_id` (`cfo_fld_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `custom_filter`
--

DROP TABLE IF EXISTS `custom_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `custom_filter` (
  `cst_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cst_usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cst_prj_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cst_title` varchar(64) NOT NULL DEFAULT '',
  `cst_priorities` varchar(255) DEFAULT NULL,
  `cst_severities` varchar(255) DEFAULT NULL,
  `cst_keywords` varchar(64) DEFAULT NULL,
  `cst_users` varchar(255) DEFAULT NULL,
  `cst_reporters` varchar(255) DEFAULT NULL,
  `cst_categories` varchar(255) DEFAULT NULL,
  `cst_statuses` varchar(255) DEFAULT NULL,
  `cst_releases` varchar(255) DEFAULT NULL,
  `cst_products` varchar(255) DEFAULT NULL,
  `cst_show_authorized` char(3) DEFAULT '',
  `cst_show_notification_list` char(3) DEFAULT '',
  `cst_created_date` date DEFAULT NULL,
  `cst_created_date_filter_type` varchar(7) DEFAULT NULL,
  `cst_created_date_time_period` smallint(6) DEFAULT NULL,
  `cst_created_date_end` date DEFAULT NULL,
  `cst_updated_date` date DEFAULT NULL,
  `cst_updated_date_filter_type` varchar(7) DEFAULT NULL,
  `cst_updated_date_time_period` smallint(6) DEFAULT NULL,
  `cst_updated_date_end` date DEFAULT NULL,
  `cst_last_response_date` date DEFAULT NULL,
  `cst_last_response_date_filter_type` varchar(7) DEFAULT NULL,
  `cst_last_response_date_time_period` smallint(6) DEFAULT NULL,
  `cst_last_response_date_end` date DEFAULT NULL,
  `cst_first_response_date` date DEFAULT NULL,
  `cst_first_response_date_filter_type` varchar(7) DEFAULT NULL,
  `cst_first_response_date_time_period` smallint(6) DEFAULT NULL,
  `cst_first_response_date_end` date DEFAULT NULL,
  `cst_closed_date` date DEFAULT NULL,
  `cst_closed_date_filter_type` varchar(7) DEFAULT NULL,
  `cst_closed_date_time_period` smallint(6) DEFAULT NULL,
  `cst_closed_date_end` date DEFAULT NULL,
  `cst_rows` char(3) DEFAULT NULL,
  `cst_sort_by` varchar(32) DEFAULT NULL,
  `cst_sort_order` varchar(4) DEFAULT NULL,
  `cst_hide_closed` int(1) DEFAULT NULL,
  `cst_is_global` int(1) DEFAULT '0',
  `cst_search_type` varchar(15) NOT NULL DEFAULT 'customer',
  `cst_custom_field` text,
  PRIMARY KEY (`cst_id`),
  KEY `cst_usr_id` (`cst_usr_id`,`cst_prj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customer_account_manager`
--

DROP TABLE IF EXISTS `customer_account_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_account_manager` (
  `cam_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cam_prj_id` int(11) unsigned NOT NULL,
  `cam_customer_id` varchar(128) NOT NULL,
  `cam_usr_id` int(11) unsigned NOT NULL,
  `cam_type` varchar(7) NOT NULL,
  PRIMARY KEY (`cam_id`),
  UNIQUE KEY `cam_manager` (`cam_prj_id`,`cam_customer_id`,`cam_usr_id`),
  KEY `cam_customer_id` (`cam_customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customer_note`
--

DROP TABLE IF EXISTS `customer_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_note` (
  `cno_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cno_prj_id` int(11) unsigned NOT NULL,
  `cno_customer_id` varchar(128) NOT NULL,
  `cno_created_date` datetime NOT NULL,
  `cno_updated_date` datetime DEFAULT NULL,
  `cno_note` text,
  PRIMARY KEY (`cno_id`),
  UNIQUE KEY `cno_prj_id` (`cno_prj_id`,`cno_customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `email_account`
--

DROP TABLE IF EXISTS `email_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_account` (
  `ema_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ema_prj_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ema_type` varchar(32) NOT NULL DEFAULT '',
  `ema_folder` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ema_hostname` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `ema_port` varchar(5) NOT NULL DEFAULT '',
  `ema_username` varchar(64) NOT NULL DEFAULT '',
  `ema_password` varchar(255) NOT NULL DEFAULT '',
  `ema_get_only_new` int(1) NOT NULL DEFAULT '0',
  `ema_leave_copy` int(1) NOT NULL DEFAULT '0',
  `ema_issue_auto_creation` varchar(8) NOT NULL DEFAULT 'disabled',
  `ema_issue_auto_creation_options` text,
  `ema_use_routing` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`ema_id`),
  UNIQUE KEY `ema_username` (`ema_username`,`ema_hostname`,`ema_folder`),
  KEY `ema_prj_id` (`ema_prj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `email_draft`
--

DROP TABLE IF EXISTS `email_draft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_draft` (
  `emd_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `emd_usr_id` int(11) unsigned NOT NULL,
  `emd_iss_id` int(11) unsigned NOT NULL,
  `emd_sup_id` int(11) unsigned DEFAULT NULL,
  `emd_status` enum('pending','edited','sent') NOT NULL DEFAULT 'pending',
  `emd_updated_date` datetime NOT NULL,
  `emd_subject` varchar(255) NOT NULL,
  `emd_body` longtext NOT NULL,
  `emd_unknown_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `email_draft_recipient`
--

DROP TABLE IF EXISTS `email_draft_recipient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_draft_recipient` (
  `edr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `edr_emd_id` int(11) unsigned NOT NULL,
  `edr_is_cc` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `edr_email` varchar(255) NOT NULL,
  PRIMARY KEY (`edr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `email_response`
--

DROP TABLE IF EXISTS `email_response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_response` (
  `ere_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ere_title` varchar(64) NOT NULL,
  `ere_response_body` text NOT NULL,
  PRIMARY KEY (`ere_id`),
  UNIQUE KEY `ere_title` (`ere_title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `faq_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `faq_prj_id` int(11) unsigned NOT NULL,
  `faq_usr_id` int(11) unsigned NOT NULL,
  `faq_created_date` datetime NOT NULL,
  `faq_updated_date` datetime DEFAULT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_message` longtext NOT NULL,
  `faq_rank` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`faq_id`),
  UNIQUE KEY `faq_title` (`faq_title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `faq_support_level`
--

DROP TABLE IF EXISTS `faq_support_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_support_level` (
  `fsl_faq_id` int(11) unsigned NOT NULL,
  `fsl_support_level_id` varchar(50) NOT NULL,
  PRIMARY KEY (`fsl_faq_id`,`fsl_support_level_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `grp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `grp_name` varchar(100) NOT NULL,
  `grp_description` varchar(255) DEFAULT NULL,
  `grp_manager_usr_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`grp_id`),
  UNIQUE KEY `grp_name` (`grp_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `history_type`
--

DROP TABLE IF EXISTS `history_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_type` (
  `htt_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `htt_name` varchar(25) NOT NULL,
  `htt_role` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`htt_id`),
  UNIQUE KEY `htt_name` (`htt_name`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `irc_notice`
--

DROP TABLE IF EXISTS `irc_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `irc_notice` (
  `ino_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ino_prj_id` int(11) NOT NULL,
  `ino_iss_id` int(11) unsigned NOT NULL,
  `ino_created_date` datetime NOT NULL,
  `ino_message` varchar(255) NOT NULL,
  `ino_status` varchar(8) NOT NULL DEFAULT 'pending',
  `ino_target_usr_id` int(11) unsigned DEFAULT NULL,
  `ino_category` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ino_id`),
  KEY `ino_status` (`ino_status`,`ino_prj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue`
--

DROP TABLE IF EXISTS `issue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue` (
  `iss_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iss_customer_id` varchar(128) DEFAULT NULL,
  `iss_customer_contact_id` varchar(128) DEFAULT NULL,
  `iss_customer_contract_id` varchar(50) DEFAULT NULL,
  `iss_usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `iss_grp_id` int(11) unsigned DEFAULT NULL,
  `iss_prj_id` int(11) unsigned NOT NULL DEFAULT '0',
  `iss_prc_id` int(11) unsigned NOT NULL DEFAULT '0',
  `iss_pre_id` int(10) unsigned NOT NULL DEFAULT '0',
  `iss_pri_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `iss_sev_id` int(11) unsigned NOT NULL DEFAULT '0',
  `iss_sta_id` tinyint(1) NOT NULL DEFAULT '0',
  `iss_res_id` int(10) unsigned DEFAULT NULL,
  `iss_duplicated_iss_id` int(11) unsigned DEFAULT NULL,
  `iss_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iss_updated_date` datetime DEFAULT NULL,
  `iss_last_response_date` datetime DEFAULT NULL,
  `iss_first_response_date` datetime DEFAULT NULL,
  `iss_closed_date` datetime DEFAULT NULL,
  `iss_last_customer_action_date` datetime DEFAULT NULL,
  `iss_expected_resolution_date` date DEFAULT NULL,
  `iss_summary` varchar(128) NOT NULL DEFAULT '',
  `iss_description` text NOT NULL,
  `iss_dev_time` float DEFAULT NULL,
  `iss_developer_est_time` float DEFAULT NULL,
  `iss_contact_person_lname` varchar(64) DEFAULT NULL,
  `iss_contact_person_fname` varchar(64) DEFAULT NULL,
  `iss_contact_email` varchar(255) DEFAULT NULL,
  `iss_contact_phone` varchar(32) DEFAULT NULL,
  `iss_contact_timezone` varchar(64) DEFAULT NULL,
  `iss_trigger_reminders` tinyint(1) DEFAULT '1',
  `iss_last_public_action_date` datetime DEFAULT NULL,
  `iss_last_public_action_type` varchar(20) DEFAULT NULL,
  `iss_last_internal_action_date` datetime DEFAULT NULL,
  `iss_last_internal_action_type` varchar(20) DEFAULT NULL,
  `iss_status_change_date` datetime DEFAULT NULL,
  `iss_percent_complete` tinyint(3) unsigned DEFAULT '0',
  `iss_root_message_id` varchar(255) DEFAULT NULL,
  `iss_access_level` varchar(150) NOT NULL DEFAULT 'normal',
  PRIMARY KEY (`iss_id`),
  KEY `iss_prj_id` (`iss_prj_id`),
  KEY `iss_prc_id` (`iss_prc_id`),
  KEY `iss_res_id` (`iss_res_id`),
  KEY `iss_grp_id` (`iss_grp_id`),
  KEY `iss_duplicated_iss_id` (`iss_duplicated_iss_id`),
  FULLTEXT KEY `ft_issue` (`iss_summary`,`iss_description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_access_list`
--

DROP TABLE IF EXISTS `issue_access_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_access_list` (
  `ial_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ial_iss_id` int(10) unsigned NOT NULL,
  `ial_usr_id` int(10) unsigned NOT NULL,
  `ial_created` datetime NOT NULL,
  PRIMARY KEY (`ial_id`),
  KEY `ial_iss_id` (`ial_iss_id`,`ial_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_access_log`
--

DROP TABLE IF EXISTS `issue_access_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_access_log` (
  `alg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alg_iss_id` int(10) unsigned NOT NULL,
  `alg_usr_id` int(10) unsigned NOT NULL,
  `alg_failed` tinyint(1) NOT NULL DEFAULT '0',
  `alg_item_id` int(10) unsigned DEFAULT NULL,
  `alg_created` datetime NOT NULL,
  `alg_ip_address` varchar(15) DEFAULT NULL,
  `alg_item` varchar(10) DEFAULT NULL,
  `alg_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`alg_id`),
  KEY `alg_iss_id` (`alg_iss_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_association`
--

DROP TABLE IF EXISTS `issue_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_association` (
  `isa_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `isa_issue_id` int(10) unsigned NOT NULL DEFAULT '0',
  `isa_associated_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`isa_id`),
  UNIQUE KEY `isa_issue_id` (`isa_issue_id`,`isa_associated_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_attachment`
--

DROP TABLE IF EXISTS `issue_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_attachment` (
  `iat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iat_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `iat_usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `iat_min_role` int(1) unsigned NOT NULL DEFAULT '1',
  `iat_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iat_description` text,
  `iat_unknown_user` varchar(255) DEFAULT NULL,
  `iat_not_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`iat_id`),
  KEY `iat_iss_id` (`iat_iss_id`,`iat_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_attachment_file`
--

DROP TABLE IF EXISTS `issue_attachment_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_attachment_file` (
  `iaf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iaf_iat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `iaf_file` longblob,
  `iaf_filename` varchar(255) NOT NULL DEFAULT '',
  `iaf_filetype` varchar(255) DEFAULT NULL,
  `iaf_filesize` varchar(32) NOT NULL DEFAULT '',
  `iaf_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`iaf_id`),
  KEY `iaf_iat_id` (`iaf_iat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_attachment_file_path`
--

DROP TABLE IF EXISTS `issue_attachment_file_path`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_attachment_file_path` (
  `iap_iaf_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `iap_flysystem_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iap_iaf_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_checkin`
--

DROP TABLE IF EXISTS `issue_checkin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_checkin` (
  `isc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `isc_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `isc_commitid` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `isc_reponame` varchar(255) NOT NULL DEFAULT '',
  `isc_module` varchar(255) NOT NULL DEFAULT '',
  `isc_filename` varchar(255) NOT NULL DEFAULT '',
  `isc_old_version` varchar(40) DEFAULT NULL,
  `isc_new_version` varchar(40) DEFAULT NULL,
  `isc_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isc_username` varchar(32) NOT NULL DEFAULT '',
  `isc_commit_msg` text,
  PRIMARY KEY (`isc_id`),
  KEY `isc_iss_id` (`isc_iss_id`),
  KEY `isc_commitid` (`isc_commitid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_commit`
--

DROP TABLE IF EXISTS `issue_commit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_commit` (
  `isc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `isc_iss_id` int(10) unsigned NOT NULL,
  `isc_com_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`isc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_custom_field`
--

DROP TABLE IF EXISTS `issue_custom_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_custom_field` (
  `icf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `icf_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `icf_fld_id` int(10) unsigned NOT NULL DEFAULT '0',
  `icf_value` text,
  `icf_value_integer` int(11) DEFAULT NULL,
  `icf_value_date` date DEFAULT NULL,
  PRIMARY KEY (`icf_id`),
  KEY `icf_iss_id` (`icf_iss_id`),
  KEY `icf_fld_id` (`icf_fld_id`),
  FULLTEXT KEY `ft_icf_value` (`icf_value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_history`
--

DROP TABLE IF EXISTS `issue_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_history` (
  `his_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `his_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `his_usr_id` int(11) unsigned NOT NULL DEFAULT '0',
  `his_htt_id` tinyint(4) NOT NULL DEFAULT '0',
  `his_is_hidden` tinyint(1) NOT NULL DEFAULT '0',
  `his_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `his_summary` text NOT NULL,
  `his_context` mediumtext NOT NULL,
  `his_min_role` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`his_id`),
  KEY `his_id` (`his_id`),
  KEY `his_iss_id` (`his_iss_id`),
  KEY `his_created_date` (`his_created_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_partner`
--

DROP TABLE IF EXISTS `issue_partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_partner` (
  `ipa_iss_id` int(11) unsigned NOT NULL,
  `ipa_par_code` varchar(255) CHARACTER SET ascii NOT NULL,
  `ipa_created_date` datetime NOT NULL,
  PRIMARY KEY (`ipa_iss_id`,`ipa_par_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_product_version`
--

DROP TABLE IF EXISTS `issue_product_version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_product_version` (
  `ipv_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ipv_iss_id` int(11) unsigned NOT NULL,
  `ipv_pro_id` int(11) unsigned NOT NULL,
  `ipv_version` varchar(255) NOT NULL,
  PRIMARY KEY (`ipv_id`),
  KEY `ipv_iss_id` (`ipv_iss_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_quarantine`
--

DROP TABLE IF EXISTS `issue_quarantine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_quarantine` (
  `iqu_iss_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iqu_expiration` datetime DEFAULT NULL,
  `iqu_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`iqu_iss_id`),
  KEY `iqu_expiration` (`iqu_expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_user`
--

DROP TABLE IF EXISTS `issue_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_user` (
  `isu_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `isu_usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `isu_assigned_date` datetime DEFAULT NULL,
  `isu_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`isu_iss_id`,`isu_usr_id`),
  KEY `isu_order` (`isu_order`),
  KEY `isu_usr_id` (`isu_usr_id`),
  KEY `isu_iss_id` (`isu_iss_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issue_user_replier`
--

DROP TABLE IF EXISTS `issue_user_replier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_user_replier` (
  `iur_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iur_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `iur_usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `iur_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iur_id`),
  KEY `iur_usr_id` (`iur_usr_id`),
  KEY `iur_iss_id` (`iur_iss_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `link_filter`
--

DROP TABLE IF EXISTS `link_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link_filter` (
  `lfi_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lfi_pattern` varchar(255) NOT NULL,
  `lfi_replacement` varchar(255) NOT NULL,
  `lfi_usr_role` tinyint(4) NOT NULL DEFAULT '0',
  `lfi_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lfi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mail_queue`
--

DROP TABLE IF EXISTS `mail_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_queue` (
  `maq_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `maq_iss_id` int(11) unsigned DEFAULT NULL,
  `maq_queued_date` datetime NOT NULL,
  `maq_status` varchar(8) NOT NULL DEFAULT 'pending',
  `maq_save_copy` tinyint(1) NOT NULL DEFAULT '1',
  `maq_sender_ip_address` varchar(15) NOT NULL,
  `maq_recipient` varchar(255) NOT NULL,
  `maq_subject` varchar(255) NOT NULL,
  `maq_message_id` varchar(255) DEFAULT NULL,
  `maq_headers` text NOT NULL,
  `maq_body` longblob NOT NULL,
  `maq_type` varchar(30) DEFAULT NULL,
  `maq_usr_id` int(11) unsigned DEFAULT NULL,
  `maq_type_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`maq_id`),
  KEY `maq_status` (`maq_status`),
  KEY `maq_iss_id` (`maq_iss_id`),
  KEY `maq_type` (`maq_type`,`maq_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mail_queue_log`
--

DROP TABLE IF EXISTS `mail_queue_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_queue_log` (
  `mql_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mql_maq_id` int(11) unsigned NOT NULL,
  `mql_created_date` datetime NOT NULL,
  `mql_status` varchar(8) NOT NULL DEFAULT 'error',
  `mql_server_message` text,
  PRIMARY KEY (`mql_id`),
  KEY `mql_maq_id` (`mql_maq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `nws_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nws_usr_id` int(11) unsigned NOT NULL,
  `nws_created_date` datetime NOT NULL,
  `nws_title` varchar(255) NOT NULL,
  `nws_message` text NOT NULL,
  `nws_status` varchar(8) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`nws_id`),
  UNIQUE KEY `nws_title` (`nws_title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `note` (
  `not_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `not_iss_id` int(11) unsigned NOT NULL DEFAULT '0',
  `not_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `not_usr_id` int(11) unsigned NOT NULL DEFAULT '0',
  `not_title` varchar(255) NOT NULL,
  `not_note` longtext NOT NULL,
  `not_full_message` longblob,
  `not_parent_id` int(11) unsigned DEFAULT NULL,
  `not_unknown_user` varchar(255) DEFAULT NULL,
  `not_has_attachment` tinyint(1) NOT NULL DEFAULT '0',
  `not_message_id` varchar(255) DEFAULT NULL,
  `not_removed` tinyint(1) NOT NULL DEFAULT '0',
  `not_is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`not_id`),
  KEY `not_bug_id` (`not_iss_id`,`not_usr_id`),
  KEY `not_message_id` (`not_message_id`),
  KEY `not_parent_id` (`not_parent_id`),
  FULLTEXT KEY `ft_note` (`not_title`,`not_note`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_project`
--

DROP TABLE IF EXISTS `partner_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_project` (
  `pap_prj_id` int(11) unsigned NOT NULL,
  `pap_par_code` varchar(255) CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`pap_prj_id`,`pap_par_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `phone_support`
--

DROP TABLE IF EXISTS `phone_support`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone_support` (
  `phs_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phs_usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `phs_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `phs_ttr_id` int(10) unsigned DEFAULT NULL,
  `phs_call_from_lname` varchar(64) DEFAULT NULL,
  `phs_call_from_fname` varchar(64) DEFAULT NULL,
  `phs_call_to_lname` varchar(64) DEFAULT NULL,
  `phs_call_to_fname` varchar(64) DEFAULT NULL,
  `phs_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `phs_type` enum('incoming','outgoing') NOT NULL DEFAULT 'incoming',
  `phs_phone_number` varchar(32) NOT NULL DEFAULT '',
  `phs_phone_type` varchar(6) NOT NULL,
  `phs_phc_id` int(11) unsigned NOT NULL,
  `phs_description` text NOT NULL,
  PRIMARY KEY (`phs_id`),
  KEY `phs_iss_id` (`phs_iss_id`),
  KEY `phs_usr_id` (`phs_usr_id`),
  FULLTEXT KEY `ft_phone_support` (`phs_description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `pro_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pro_title` varchar(255) NOT NULL,
  `pro_version_howto` varchar(255) NOT NULL,
  `pro_rank` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `pro_removed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pro_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `pro_rank` (`pro_rank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `prj_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `prj_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `prj_title` varchar(64) NOT NULL DEFAULT '',
  `prj_status` set('active','archived') NOT NULL DEFAULT 'active',
  `prj_lead_usr_id` int(11) unsigned NOT NULL DEFAULT '0',
  `prj_initial_sta_id` int(10) unsigned NOT NULL DEFAULT '0',
  `prj_remote_invocation` varchar(8) NOT NULL DEFAULT 'disabled',
  `prj_anonymous_post` varchar(8) NOT NULL DEFAULT 'disabled',
  `prj_anonymous_post_options` text,
  `prj_outgoing_sender_name` varchar(255) NOT NULL,
  `prj_outgoing_sender_email` varchar(255) NOT NULL,
  `prj_sender_flag` varchar(255) DEFAULT NULL,
  `prj_sender_flag_location` varchar(6) DEFAULT NULL,
  `prj_mail_aliases` varchar(255) DEFAULT NULL,
  `prj_customer_backend` varchar(255) CHARACTER SET ascii DEFAULT NULL,
  `prj_workflow_backend` varchar(255) CHARACTER SET ascii DEFAULT NULL,
  `prj_segregate_reporter` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`prj_id`),
  UNIQUE KEY `prj_title` (`prj_title`),
  KEY `prj_lead_usr_id` (`prj_lead_usr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_category`
--

DROP TABLE IF EXISTS `project_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_category` (
  `prc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `prc_prj_id` int(11) unsigned NOT NULL DEFAULT '0',
  `prc_title` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`prc_id`),
  UNIQUE KEY `uniq_category` (`prc_prj_id`,`prc_title`),
  KEY `prc_prj_id` (`prc_prj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_custom_field`
--

DROP TABLE IF EXISTS `project_custom_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_custom_field` (
  `pcf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pcf_prj_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pcf_fld_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pcf_id`),
  KEY `pcf_prj_id` (`pcf_prj_id`),
  KEY `pcf_fld_id` (`pcf_fld_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_email_response`
--

DROP TABLE IF EXISTS `project_email_response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_email_response` (
  `per_prj_id` int(11) unsigned NOT NULL,
  `per_ere_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`per_prj_id`,`per_ere_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_field_display`
--

DROP TABLE IF EXISTS `project_field_display`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_field_display` (
  `pfd_prj_id` int(11) unsigned NOT NULL,
  `pfd_field` varchar(20) NOT NULL,
  `pfd_min_role` tinyint(1) NOT NULL DEFAULT '0',
  `pfd_required` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pfd_prj_id`,`pfd_field`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_group`
--

DROP TABLE IF EXISTS `project_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_group` (
  `pgr_prj_id` int(11) unsigned NOT NULL,
  `pgr_grp_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pgr_prj_id`,`pgr_grp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_link_filter`
--

DROP TABLE IF EXISTS `project_link_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_link_filter` (
  `plf_prj_id` int(11) NOT NULL,
  `plf_lfi_id` int(11) NOT NULL,
  PRIMARY KEY (`plf_prj_id`,`plf_lfi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_news`
--

DROP TABLE IF EXISTS `project_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_news` (
  `prn_nws_id` int(11) unsigned NOT NULL,
  `prn_prj_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`prn_prj_id`,`prn_nws_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_phone_category`
--

DROP TABLE IF EXISTS `project_phone_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_phone_category` (
  `phc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phc_prj_id` int(11) unsigned NOT NULL DEFAULT '0',
  `phc_title` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`phc_id`),
  UNIQUE KEY `uniq_category` (`phc_prj_id`,`phc_title`),
  KEY `phc_prj_id` (`phc_prj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_priority`
--

DROP TABLE IF EXISTS `project_priority`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_priority` (
  `pri_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pri_prj_id` int(11) unsigned NOT NULL,
  `pri_title` varchar(64) NOT NULL DEFAULT '',
  `pri_rank` tinyint(1) NOT NULL,
  `pri_icon` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pri_id`),
  UNIQUE KEY `pri_title` (`pri_title`,`pri_prj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_release`
--

DROP TABLE IF EXISTS `project_release`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_release` (
  `pre_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pre_prj_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pre_title` varchar(128) NOT NULL DEFAULT '',
  `pre_scheduled_date` date NOT NULL DEFAULT '0000-00-00',
  `pre_status` enum('available','unavailable') NOT NULL DEFAULT 'available',
  PRIMARY KEY (`pre_id`),
  UNIQUE KEY `pre_title` (`pre_prj_id`,`pre_title`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_round_robin`
--

DROP TABLE IF EXISTS `project_round_robin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_round_robin` (
  `prr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `prr_prj_id` int(11) unsigned NOT NULL,
  `prr_blackout_start` time NOT NULL,
  `prr_blackout_end` time NOT NULL,
  PRIMARY KEY (`prr_id`),
  UNIQUE KEY `prr_prj_id` (`prr_prj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_severity`
--

DROP TABLE IF EXISTS `project_severity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_severity` (
  `sev_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `sev_prj_id` int(11) unsigned NOT NULL,
  `sev_title` varchar(64) NOT NULL DEFAULT '',
  `sev_description` varchar(255) DEFAULT NULL,
  `sev_rank` tinyint(1) NOT NULL,
  PRIMARY KEY (`sev_id`),
  UNIQUE KEY `sev_title` (`sev_title`,`sev_prj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_status`
--

DROP TABLE IF EXISTS `project_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_status` (
  `prs_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prs_prj_id` int(10) unsigned NOT NULL,
  `prs_sta_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`prs_id`),
  KEY `prs_prj_id` (`prs_prj_id`,`prs_sta_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_status_date`
--

DROP TABLE IF EXISTS `project_status_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_status_date` (
  `psd_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `psd_prj_id` int(11) unsigned NOT NULL,
  `psd_sta_id` int(10) unsigned NOT NULL,
  `psd_date_field` varchar(64) NOT NULL,
  `psd_label` varchar(32) NOT NULL,
  PRIMARY KEY (`psd_id`),
  UNIQUE KEY `psd_prj_id` (`psd_prj_id`,`psd_sta_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_user` (
  `pru_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pru_prj_id` int(11) unsigned NOT NULL DEFAULT '0',
  `pru_usr_id` int(11) unsigned NOT NULL DEFAULT '0',
  `pru_role` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`pru_id`),
  UNIQUE KEY `pru_prj_id` (`pru_prj_id`,`pru_usr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_action`
--

DROP TABLE IF EXISTS `reminder_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_action` (
  `rma_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rma_rem_id` int(11) unsigned NOT NULL,
  `rma_rmt_id` tinyint(3) unsigned NOT NULL,
  `rma_created_date` datetime NOT NULL,
  `rma_last_updated_date` datetime DEFAULT NULL,
  `rma_title` varchar(64) NOT NULL,
  `rma_rank` tinyint(3) unsigned NOT NULL,
  `rma_alert_irc` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rma_alert_group_leader` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rma_boilerplate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rma_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_action_type`
--

DROP TABLE IF EXISTS `reminder_action_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_action_type` (
  `rmt_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rmt_type` varchar(32) NOT NULL,
  `rmt_title` varchar(64) NOT NULL,
  PRIMARY KEY (`rmt_id`),
  UNIQUE KEY `rmt_type` (`rmt_type`),
  UNIQUE KEY `rmt_title` (`rmt_title`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_field`
--

DROP TABLE IF EXISTS `reminder_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_field` (
  `rmf_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rmf_title` varchar(128) NOT NULL,
  `rmf_sql_field` varchar(32) NOT NULL,
  `rmf_sql_representation` varchar(255) NOT NULL,
  `rmf_allow_column_compare` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rmf_id`),
  UNIQUE KEY `rmf_title` (`rmf_title`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_history`
--

DROP TABLE IF EXISTS `reminder_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_history` (
  `rmh_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rmh_iss_id` int(11) NOT NULL,
  `rmh_rma_id` int(11) NOT NULL,
  `rmh_created_date` datetime NOT NULL,
  PRIMARY KEY (`rmh_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_level`
--

DROP TABLE IF EXISTS `reminder_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_level` (
  `rem_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rem_created_date` datetime NOT NULL,
  `rem_rank` tinyint(1) NOT NULL,
  `rem_last_updated_date` datetime DEFAULT NULL,
  `rem_title` varchar(64) NOT NULL,
  `rem_prj_id` int(11) unsigned NOT NULL,
  `rem_skip_weekend` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_level_condition`
--

DROP TABLE IF EXISTS `reminder_level_condition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_level_condition` (
  `rlc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rlc_rma_id` int(11) unsigned NOT NULL,
  `rlc_rmf_id` tinyint(3) unsigned NOT NULL,
  `rlc_rmo_id` tinyint(1) unsigned NOT NULL,
  `rlc_created_date` datetime NOT NULL,
  `rlc_last_updated_date` datetime DEFAULT NULL,
  `rlc_value` varchar(64) NOT NULL,
  `rlc_comparison_rmf_id` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`rlc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_operator`
--

DROP TABLE IF EXISTS `reminder_operator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_operator` (
  `rmo_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rmo_title` varchar(32) DEFAULT NULL,
  `rmo_sql_representation` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`rmo_id`),
  UNIQUE KEY `rmo_title` (`rmo_title`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_priority`
--

DROP TABLE IF EXISTS `reminder_priority`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_priority` (
  `rep_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rep_rem_id` int(11) unsigned NOT NULL,
  `rep_pri_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_product`
--

DROP TABLE IF EXISTS `reminder_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_product` (
  `rpr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rpr_rem_id` int(11) unsigned NOT NULL,
  `rpr_pro_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`rpr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_requirement`
--

DROP TABLE IF EXISTS `reminder_requirement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_requirement` (
  `rer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rer_rem_id` int(11) unsigned NOT NULL,
  `rer_iss_id` int(11) unsigned DEFAULT NULL,
  `rer_support_level_id` int(11) unsigned DEFAULT NULL,
  `rer_customer_id` varchar(128) DEFAULT NULL,
  `rer_trigger_all_issues` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_severity`
--

DROP TABLE IF EXISTS `reminder_severity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_severity` (
  `rms_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rms_rem_id` int(11) unsigned NOT NULL,
  `rms_sev_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`rms_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reminder_triggered_action`
--

DROP TABLE IF EXISTS `reminder_triggered_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminder_triggered_action` (
  `rta_iss_id` int(11) unsigned NOT NULL,
  `rta_rma_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`rta_iss_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `remote_link`
--

DROP TABLE IF EXISTS `remote_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remote_link` (
  `rel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rel_gid` varchar(255) CHARACTER SET ascii DEFAULT NULL COMMENT 'Global Id',
  `rel_relationship` varchar(255) CHARACTER SET ascii NOT NULL COMMENT 'Link relationship type',
  `rel_url` text CHARACTER SET ascii NOT NULL,
  `rel_title` varchar(255) NOT NULL,
  PRIMARY KEY (`rel_id`),
  KEY `rel_id` (`rel_id`,`rel_gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `resolution`
--

DROP TABLE IF EXISTS `resolution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resolution` (
  `res_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `res_title` varchar(64) NOT NULL DEFAULT '',
  `res_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `res_rank` int(2) NOT NULL,
  PRIMARY KEY (`res_id`),
  UNIQUE KEY `res_title` (`res_title`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `search_profile`
--

DROP TABLE IF EXISTS `search_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `search_profile` (
  `sep_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sep_usr_id` int(11) unsigned NOT NULL,
  `sep_prj_id` int(11) unsigned NOT NULL,
  `sep_type` char(5) NOT NULL,
  `sep_user_profile` blob NOT NULL,
  PRIMARY KEY (`sep_id`),
  UNIQUE KEY `sep_usr_id` (`sep_usr_id`,`sep_prj_id`,`sep_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `sta_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sta_title` varchar(64) NOT NULL DEFAULT '',
  `sta_abbreviation` char(3) NOT NULL,
  `sta_rank` int(2) NOT NULL,
  `sta_color` varchar(7) NOT NULL DEFAULT '',
  `sta_is_closed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sta_id`),
  UNIQUE KEY `sta_abbreviation` (`sta_abbreviation`),
  KEY `sta_rank` (`sta_rank`),
  KEY `sta_is_closed` (`sta_is_closed`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `sub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sub_usr_id` int(10) unsigned DEFAULT NULL,
  `sub_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sub_level` varchar(10) NOT NULL DEFAULT 'user',
  `sub_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `sub_iss_id` (`sub_iss_id`,`sub_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subscription_type`
--

DROP TABLE IF EXISTS `subscription_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_type` (
  `sbt_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sbt_sub_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sbt_type` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`sbt_id`),
  KEY `sbt_sub_id` (`sbt_sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `support_email`
--

DROP TABLE IF EXISTS `support_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_email` (
  `sup_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sup_ema_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sup_parent_id` int(11) unsigned NOT NULL DEFAULT '0',
  `sup_iss_id` int(11) unsigned DEFAULT '0',
  `sup_usr_id` int(11) unsigned DEFAULT NULL,
  `sup_customer_id` varchar(128) DEFAULT NULL,
  `sup_message_id` varchar(255) NOT NULL DEFAULT '',
  `sup_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sup_from` varchar(4096) NOT NULL DEFAULT '',
  `sup_to` varchar(4096) NOT NULL DEFAULT '',
  `sup_cc` varchar(4096) NOT NULL DEFAULT '',
  `sup_subject` varchar(4096) NOT NULL DEFAULT '',
  `sup_has_attachment` tinyint(1) NOT NULL DEFAULT '0',
  `sup_removed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sup_id`),
  KEY `sup_parent_id` (`sup_parent_id`),
  KEY `sup_ema_id` (`sup_ema_id`),
  KEY `sup_removed` (`sup_removed`),
  KEY `sup_removed_2` (`sup_removed`,`sup_ema_id`,`sup_iss_id`),
  KEY `sup_removed_3` (`sup_removed`,`sup_ema_id`,`sup_date`),
  KEY `sup_usr_id` (`sup_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `support_email_body`
--

DROP TABLE IF EXISTS `support_email_body`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_email_body` (
  `seb_sup_id` int(11) unsigned NOT NULL,
  `seb_body` longtext NOT NULL,
  `seb_full_email` longblob NOT NULL,
  PRIMARY KEY (`seb_sup_id`),
  FULLTEXT KEY `ft_support_email` (`seb_body`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `time_tracking`
--

DROP TABLE IF EXISTS `time_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_tracking` (
  `ttr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ttr_ttc_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ttr_iss_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ttr_usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ttr_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ttr_time_spent` int(11) unsigned NOT NULL DEFAULT '0',
  `ttr_summary` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ttr_id`),
  KEY `ttr_ttc_id` (`ttr_ttc_id`,`ttr_iss_id`,`ttr_usr_id`),
  KEY `ttr_iss_id` (`ttr_iss_id`),
  FULLTEXT KEY `ft_time_tracking` (`ttr_summary`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `time_tracking_category`
--

DROP TABLE IF EXISTS `time_tracking_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_tracking_category` (
  `ttc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ttc_prj_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ttc_title` varchar(128) NOT NULL DEFAULT '',
  `ttc_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ttc_id`),
  KEY `ttc_title` (`ttc_prj_id`,`ttc_title`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `usr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usr_customer_id` varchar(128) DEFAULT NULL,
  `usr_customer_contact_id` varchar(128) DEFAULT NULL,
  `usr_created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usr_status` varchar(8) NOT NULL DEFAULT 'active',
  `usr_password` varchar(255) NOT NULL DEFAULT '',
  `usr_full_name` varchar(255) NOT NULL DEFAULT '',
  `usr_email` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `usr_sms_email` varchar(255) DEFAULT NULL,
  `usr_clocked_in` tinyint(1) DEFAULT '0',
  `usr_lang` varchar(5) DEFAULT NULL,
  `usr_external_id` varchar(255) DEFAULT NULL,
  `usr_last_login` datetime DEFAULT NULL,
  `usr_last_failed_login` datetime DEFAULT NULL,
  `usr_failed_logins` int(11) unsigned NOT NULL DEFAULT '0',
  `usr_par_code` varchar(255) CHARACTER SET ascii DEFAULT NULL,
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `usr_email` (`usr_email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `ugr_usr_id` int(10) unsigned NOT NULL,
  `ugr_grp_id` int(10) unsigned NOT NULL,
  `ugr_created` datetime NOT NULL,
  PRIMARY KEY (`ugr_usr_id`,`ugr_grp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_logins`
--

DROP TABLE IF EXISTS `user_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_preference`
--

DROP TABLE IF EXISTS `user_preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_preference` (
  `upr_usr_id` int(11) unsigned NOT NULL,
  `upr_timezone` varchar(100) NOT NULL,
  `upr_week_firstday` tinyint(1) NOT NULL DEFAULT '0',
  `upr_list_refresh_rate` int(5) DEFAULT '5',
  `upr_email_refresh_rate` int(5) DEFAULT '5',
  `upr_email_signature` longtext,
  `upr_auto_append_email_sig` tinyint(1) DEFAULT '0',
  `upr_auto_append_note_sig` tinyint(1) DEFAULT '0',
  `upr_auto_close_popup_window` tinyint(1) DEFAULT '0',
  `upr_relative_date` tinyint(1) DEFAULT '1',
  `upr_collapsed_emails` tinyint(1) DEFAULT '1',
  `upr_markdown` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`upr_usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_project_preference`
--

DROP TABLE IF EXISTS `user_project_preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_project_preference` (
  `upp_usr_id` int(11) unsigned NOT NULL,
  `upp_prj_id` int(11) unsigned NOT NULL,
  `upp_receive_assigned_email` tinyint(1) DEFAULT '1',
  `upp_receive_new_issue_email` tinyint(1) DEFAULT '0',
  `upp_receive_copy_of_own_action` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`upp_usr_id`,`upp_prj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-24 22:01:36
