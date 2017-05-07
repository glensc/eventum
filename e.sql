-- MySQL dump 10.13  Distrib 5.6.25-73.1, for Linux (x86_64)
--
-- Host: localhost    Database: e
-- ------------------------------------------------------
-- Server version	5.6.25-73.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `issue_checkin`
--

DROP TABLE IF EXISTS `issue_checkin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issue_checkin` (
  `id` int(10) unsigned NOT NULL ,
  `issue_id` int(10) unsigned NOT NULL DEFAULT '0',
  `commit_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `reponame` varchar(255) NOT NULL DEFAULT '',
  `module` varchar(255) NOT NULL DEFAULT '',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `old_version` varchar(40) DEFAULT NULL,
  `new_version` varchar(40) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(32) NOT NULL DEFAULT '',
  `commit_msg` text
,primary key (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `issue_checkin`
--

LOCK TABLES `issue_checkin` WRITE;
/*!40000 ALTER TABLE `issue_checkin` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue_checkin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-06 20:12:09
