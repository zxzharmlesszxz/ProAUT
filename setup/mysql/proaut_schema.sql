-- MySQL dump 10.13  Distrib 5.6.30, for FreeBSD10.1 (amd64)
--
-- Host: localhost    Database: proftpd
-- ------------------------------------------------------
-- Server version	5.6.30

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
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `groupid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(50) NOT NULL,
  `gid` int(5) unsigned NOT NULL,
  `members` text,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quotalimits`
--

DROP TABLE IF EXISTS `quotalimits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotalimits` (
  `quotalimitid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `quota_type` enum('user','group','class','all') NOT NULL,
  `per_session` enum('true','false') NOT NULL DEFAULT 'false',
  `limit_type` enum('soft','hard') NOT NULL DEFAULT 'hard',
  `bytes_in_avail` float NOT NULL DEFAULT '157286000',
  `bytes_out_avail` float NOT NULL DEFAULT '0',
  `bytes_xfer_avail` float NOT NULL DEFAULT '0',
  `files_in_avail` int(10) unsigned NOT NULL DEFAULT '0',
  `files_out_avail` int(10) unsigned NOT NULL DEFAULT '0',
  `files_xfer_avail` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`quotalimitid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Таблица квот';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `quotatallies`
--

DROP TABLE IF EXISTS `quotatallies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotatallies` (
  `quotatallyid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `quota_type` enum('user','group','class','all') NOT NULL,
  `bytes_in_used` float NOT NULL DEFAULT '0',
  `bytes_out_used` float NOT NULL DEFAULT '0',
  `bytes_xfer_used` float NOT NULL DEFAULT '0',
  `files_in_used` int(10) unsigned NOT NULL DEFAULT '0',
  `files_out_used` int(10) unsigned NOT NULL DEFAULT '0',
  `files_xfer_used` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`quotatallyid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Таблица значений квот';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL COMMENT 'Логин',
  `username` varchar(255) DEFAULT NULL COMMENT 'ФИО',
  `email` varchar(255) NOT NULL COMMENT 'почта',
  `uid` int(5) DEFAULT NULL,
  `gid` int(5) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL COMMENT 'пароль',
  `shell` varchar(30) NOT NULL,
  `homedir` varchar(255) NOT NULL COMMENT 'дом.каталог',
  `status` int(1) NOT NULL COMMENT 'Закрыт\\Открыт',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='Таблица пользователей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xfer_errors`
--

DROP TABLE IF EXISTS `xfer_errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xfer_errors` (
  `unic_id` int(32) NOT NULL AUTO_INCREMENT,
  `timestamp` int(15) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `file_and_path` tinytext NOT NULL,
  `client_name` varchar(127) NOT NULL,
  `client_IP` varchar(15) NOT NULL,
  `client_command` varchar(5) NOT NULL,
  PRIMARY KEY (`unic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Таблица ошибочных действий';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `xfer_table`
--

DROP TABLE IF EXISTS `xfer_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xfer_table` (
  `unic_id` int(32) NOT NULL AUTO_INCREMENT,
  `timestamp` int(15) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `file_and_path` tinytext NOT NULL,
  `bytes` int(15) NOT NULL DEFAULT '0',
  `client_name` varchar(127) NOT NULL,
  `client_IP` varchar(15) NOT NULL,
  `client_command` varchar(5) NOT NULL,
  `send_time` varchar(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`unic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Таблица оппераций с файлами';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-18  2:49:28
