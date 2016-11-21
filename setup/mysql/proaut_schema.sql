--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `groupid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(50) NOT NULL,
  `gid` int(5) unsigned NOT NULL,
  PRIMARY KEY (`groupid`),
  UNIQUE KYE `gid` (`gid`),
  UNIQUE KYE `groupname` (`groupname`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `quotalimits`
--

DROP TABLE IF EXISTS `quotalimits`;

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `quotatallies`
--

DROP TABLE IF EXISTS `quotatallies`;

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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `uid` int(5) DEFAULT NULL,
  `gid` int(5) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `shell` varchar(30) NOT NULL,
  `homedir` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `xfer_errors`
--

DROP TABLE IF EXISTS `xfer_errors`;

CREATE TABLE `xfer_errors` (
  `unic_id` int(32) NOT NULL AUTO_INCREMENT,
  `timestamp` int(15) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `file_and_path` tinytext NOT NULL,
  `client_name` varchar(127) NOT NULL,
  `client_IP` varchar(15) NOT NULL,
  `client_command` varchar(5) NOT NULL,
  PRIMARY KEY (`unic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `xfer_table`
--

DROP TABLE IF EXISTS `xfer_table`;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
