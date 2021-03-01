/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - j2jsoftw_hamiec
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`j2jsoftw_hamiec` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `j2jsoftw_hamiec`;

/*Table structure for table `_tblAPI` */

DROP TABLE IF EXISTS `_tblAPI`;

CREATE TABLE `_tblAPI` (
  `APIID` int(11) NOT NULL AUTO_INCREMENT,
  `APIName` varchar(255) DEFAULT NULL,
  `APIFile` varchar(255) DEFAULT NULL,
  `APIUsername` varchar(255) DEFAULT NULL,
  `APIPassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`APIID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `_tblAPI` */

insert  into `_tblAPI`(`APIID`,`APIName`,`APIFile`,`APIUsername`,`APIPassword`) values (1,'MRobotics',NULL,NULL,NULL);
insert  into `_tblAPI`(`APIID`,`APIName`,`APIFile`,`APIUsername`,`APIPassword`) values (2,'Ezytm',NULL,NULL,NULL);
insert  into `_tblAPI`(`APIID`,`APIName`,`APIFile`,`APIUsername`,`APIPassword`) values (3,'RealRobo',NULL,NULL,NULL);
insert  into `_tblAPI`(`APIID`,`APIName`,`APIFile`,`APIUsername`,`APIPassword`) values (4,'J2J Multi',NULL,NULL,NULL);
insert  into `_tblAPI`(`APIID`,`APIName`,`APIFile`,`APIUsername`,`APIPassword`) values (5,'ManualRecharge',NULL,NULL,NULL);
insert  into `_tblAPI`(`APIID`,`APIName`,`APIFile`,`APIUsername`,`APIPassword`) values (6,'AnnaiEService',NULL,NULL,NULL);
insert  into `_tblAPI`(`APIID`,`APIName`,`APIFile`,`APIUsername`,`APIPassword`) values (7,'aaranju',NULL,NULL,NULL);

/*Table structure for table `_tbl_Log_MobileSMS` */

DROP TABLE IF EXISTS `_tbl_Log_MobileSMS`;

CREATE TABLE `_tbl_Log_MobileSMS` (
  `SMSID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `SmsTo` varchar(255) DEFAULT NULL,
  `Message` text,
  `MessagedOn` datetime DEFAULT NULL,
  `APIResponse` text,
  `url` text,
  PRIMARY KEY (`SMSID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_Log_MobileSMS` */

insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (1,NULL,'9000000001','Dear Dealer, Your account created. Your username: 9000000001 and Password: 123456, Login Url: https://www.saralservices.in  Thanks Saral Services','2021-01-19 10:26:24',' {\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}','https://www.aaranju.in/sms/api.php?apiusername=a2x4Lmn2cvLmluI&apipassword=IGhhcHB==&sender=TRPSON&number=9000000001&message=Dear+Dealer%2C+Your+account+created.+Your+username%3A+9000000001+and+Password%3A+123456%2C+Login+Url%3A+https%3A%2F%2Fwww.saralservices.in++Thanks+Saral+Services&uid=1');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (2,2,'9000000001','Dear Dealer, Your account created. Your username: 9000000001 and Password: 123456, Login Url: https://www.saralservices.in  Thanks Saral Services','2021-01-19 10:28:15',' {\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}','https://www.aaranju.in/sms/api.php?apiusername=a2x4Lmn2cvLmluI&apipassword=IGhhcHB==&sender=TRPSON&number=9000000001&message=Dear+Dealer%2C+Your+account+created.+Your+username%3A+9000000001+and+Password%3A+123456%2C+Login+Url%3A+https%3A%2F%2Fwww.saralservices.in++Thanks+Saral+Services&uid=2');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (3,NULL,'9944872965','Dear Retailer, Your account created. Your username: 9944872965 and Password: 123456, Login Url: https://www.saralservices.in  Thanks Saral Services','2021-01-19 13:23:41',' {\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}','https://www.aaranju.in/sms/api.php?apiusername=a2x4Lmn2cvLmluI&apipassword=IGhhcHB==&sender=TRPSON&number=9944872965&message=Dear+Retailer%2C+Your+account+created.+Your+username%3A+9944872965+and+Password%3A+123456%2C+Login+Url%3A+https%3A%2F%2Fwww.saralservices.in++Thanks+Saral+Services&uid=3');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (4,3,'9944872965','Dear Retailer, Your account created. Your username: 9944872965 and Password: 123456, Login Url: https://www.saralservices.in  Thanks Saral Services','2021-01-19 13:25:11',' {\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}','https://www.aaranju.in/sms/api.php?apiusername=a2x4Lmn2cvLmluI&apipassword=IGhhcHB==&sender=TRPSON&number=9944872965&message=Dear+Retailer%2C+Your+account+created.+Your+username%3A+9944872965+and+Password%3A+123456%2C+Login+Url%3A+https%3A%2F%2Fwww.saralservices.in++Thanks+Saral+Services&uid=4');

/*Table structure for table `_tbl_accounts` */

DROP TABLE IF EXISTS `_tbl_accounts`;

CREATE TABLE `_tbl_accounts` (
  `AccountID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `TxnDate` datetime DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `TxnValue` varchar(255) DEFAULT NULL,
  `Credit` varchar(255) DEFAULT NULL,
  `Debit` varchar(255) DEFAULT NULL,
  `Balance` varchar(255) DEFAULT NULL,
  `Voucher` varchar(255) DEFAULT NULL,
  `TxnID` int(11) DEFAULT NULL,
  `TxnDoneBy` int(11) DEFAULT NULL,
  `CreditTo` varchar(255) DEFAULT '0',
  `DebitFrom` varchar(255) DEFAULT '0',
  `CreditFrom` varchar(255) DEFAULT '0',
  `DebitTo` varchar(255) DEFAULT '0',
  PRIMARY KEY (`AccountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_accounts` */

/*Table structure for table `_tbl_ifsc_log` */

DROP TABLE IF EXISTS `_tbl_ifsc_log`;

CREATE TABLE `_tbl_ifsc_log` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `OutPut` text,
  `TxnOn` datetime DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_ifsc_log` */

/*Table structure for table `_tbl_logs_email` */

DROP TABLE IF EXISTS `_tbl_logs_email`;

CREATE TABLE `_tbl_logs_email` (
  `EmailLogID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT '0',
  `EmailTo` varchar(255) DEFAULT NULL,
  `EmaildFor` varchar(255) DEFAULT NULL,
  `EmailSubject` text,
  `EmailContent` text,
  `EmailRequestedOn` datetime DEFAULT NULL,
  `EmailAPIID` int(11) DEFAULT '0',
  `APIRequestedOn` datetime DEFAULT NULL,
  `APIResponse` text,
  `IsSuccess` int(11) DEFAULT '0',
  `IsFailure` int(11) DEFAULT '0',
  `FailureMessage` text,
  `IsAttachment` int(11) DEFAULT '0',
  `AttachmentFile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EmailLogID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_logs_email` */

insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (1,NULL,'hamiec@gmail.com','','Dealer Registration Completed','Dear Dealer, Your account created. Your username: 9000000001 and Password: 123456, Login Url: https://www.saralservices.in  Thanks Saral Services','2021-01-19 10:26:24',0,NULL,NULL,0,1,'SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting',0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (2,2,'hamiec@gmail.com','','Dealer Registration Completed','Dear Dealer, Your account created. Your username: 9000000001 and Password: 123456, Login Url: https://www.saralservices.in  Thanks Saral Services','2021-01-19 10:28:15',0,NULL,NULL,0,1,'SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting',0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (3,NULL,'','','Retailer Registration Completed','Dear Retailer, Your account created. Your username: 9944872965 and Password: 123456, Login Url: https://www.saralservices.in  Thanks Saral Services','2021-01-19 13:23:41',0,NULL,NULL,0,1,'You must provide at least one recipient email address.',0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (4,3,'','','Retailer Registration Completed','Dear Retailer, Your account created. Your username: 9944872965 and Password: 123456, Login Url: https://www.saralservices.in  Thanks Saral Services','2021-01-19 13:25:11',0,NULL,NULL,0,1,'You must provide at least one recipient email address.',0,NULL);

/*Table structure for table `_tbl_logs_logins` */

DROP TABLE IF EXISTS `_tbl_logs_logins`;

CREATE TABLE `_tbl_logs_logins` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `Device` varchar(255) DEFAULT NULL,
  `LoginFrom` varchar(255) DEFAULT NULL,
  `MemberID` int(11) DEFAULT '0',
  `MemberCode` varchar(255) DEFAULT NULL,
  `AdminID` int(11) DEFAULT '0',
  `AdminStaffID` int(11) DEFAULT '0',
  `MobileNumber` varchar(255) DEFAULT NULL,
  `LoginPassword` varchar(255) DEFAULT NULL,
  `LoginStatus` int(11) DEFAULT '0',
  `LoginOn` datetime DEFAULT NULL,
  `BrowserIp` varchar(255) DEFAULT NULL,
  `CountryName` varchar(255) DEFAULT NULL,
  `BrowserName` varchar(255) DEFAULT NULL,
  `Platform` varchar(255) DEFAULT NULL,
  `UserLogout` datetime DEFAULT NULL,
  `Params` varchar(255) DEFAULT NULL,
  `ReqFrom` varchar(255) DEFAULT NULL,
  `APIResponse` text,
  `LastAccessOn` datetime DEFAULT NULL,
  `AgentID` int(11) DEFAULT '0',
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_logs_logins` */

insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (1,'','Web',1,'',0,0,'9000000000','123456789',1,'2021-01-18 14:13:49','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (2,'','Web',1,'',0,0,'9000000000','123456789',1,'2021-01-18 14:15:14','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (3,'','Web',1,'',0,0,'9000000000','123456789',1,'2021-01-18 14:15:42','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (4,'','Web',1,'',0,0,'9000000000','123456789',1,'2021-01-19 10:24:43','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (5,'','Web',2,'',0,0,'9000000001','123456',1,'2021-01-19 13:23:03','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (6,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-19 13:26:34','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (7,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-19 13:29:17','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (8,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-19 15:42:52','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (9,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-19 18:04:45','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (10,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-19 20:02:28','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (11,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-20 11:22:05','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (12,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-20 17:23:12','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (13,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-20 19:50:46','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (14,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-21 07:28:13','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (15,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-23 09:02:51','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (16,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-23 10:56:04','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (17,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-23 13:16:25','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (18,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-23 15:34:30','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (19,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-23 16:31:08','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (20,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-23 18:26:02','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (21,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-24 11:09:13','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (22,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-24 17:26:59','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (23,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-24 19:19:15','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (24,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-24 22:02:32','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (25,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-25 09:24:07','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (26,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-26 06:54:04','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (27,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-26 09:49:00','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (28,'','Web',1,'',0,0,'9000000000','123456789',1,'2021-01-29 15:39:34','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (29,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-29 15:46:51','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (30,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 10:44:21','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (31,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 14:30:44','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (32,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 17:45:21','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (33,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 18:08:18','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (34,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 18:12:48','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (35,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 18:57:29','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (36,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 19:35:16','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (37,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 21:20:04','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (38,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-30 22:04:23','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (39,'','Web',3,'',0,0,'9944872965','123456',1,'2021-01-31 10:39:12','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (40,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-04 07:53:37','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (41,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-04 07:54:25','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (42,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-05 08:19:25','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (43,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-05 09:13:17','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (44,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-05 21:18:48','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (45,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-05 21:19:54','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (46,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-06 07:55:02','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (47,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-06 18:03:03','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (48,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-12 23:01:34','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);
insert  into `_tbl_logs_logins`(`LoginID`,`Device`,`LoginFrom`,`MemberID`,`MemberCode`,`AdminID`,`AdminStaffID`,`MobileNumber`,`LoginPassword`,`LoginStatus`,`LoginOn`,`BrowserIp`,`CountryName`,`BrowserName`,`Platform`,`UserLogout`,`Params`,`ReqFrom`,`APIResponse`,`LastAccessOn`,`AgentID`) values (49,'','Web',3,'',0,0,'9944872965','123456',1,'2021-02-12 23:08:52','','','',NULL,NULL,NULL,NULL,'{\"Device\":\"\",\"country\":\"\",\"UserAgent\":\"\"}',NULL,0);

/*Table structure for table `_tbl_members` */

DROP TABLE IF EXISTS `_tbl_members`;

CREATE TABLE `_tbl_members` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `PersonName` varchar(255) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `MemberPassword` varchar(255) DEFAULT NULL,
  `MemberPin` varchar(255) DEFAULT NULL,
  `RegionID` varchar(255) DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `TNEBRegion` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsAdmin` int(1) DEFAULT '0',
  `IsDistributor` int(1) DEFAULT '0',
  `IsDealer` int(1) DEFAULT '0',
  `IsMember` int(1) DEFAULT '0',
  `IsActive` int(1) DEFAULT '0',
  `IsDeactiveOn` datetime DEFAULT NULL,
  `IsAPI` int(1) DEFAULT '0',
  `Gender` varchar(255) DEFAULT NULL,
  `PanCard` varchar(255) DEFAULT NULL,
  `AdhaarCard` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `MapedTo` varchar(255) DEFAULT NULL,
  `MapedToName` varchar(255) DEFAULT NULL,
  `GSTIN` varchar(255) DEFAULT NULL,
  `BillCharge` int(1) DEFAULT '1',
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_members` */

insert  into `_tbl_members`(`MemberID`,`PersonName`,`MemberName`,`MobileNumber`,`EmailID`,`MemberPassword`,`MemberPin`,`RegionID`,`Region`,`TNEBRegion`,`CreatedOn`,`IsAdmin`,`IsDistributor`,`IsDealer`,`IsMember`,`IsActive`,`IsDeactiveOn`,`IsAPI`,`Gender`,`PanCard`,`AdhaarCard`,`Address1`,`Address2`,`PostalCode`,`MapedTo`,`MapedToName`,`GSTIN`,`BillCharge`) values (1,NULL,'Admin','9000000000','admin@admin.com','123456789','1234',NULL,NULL,NULL,'2020-05-01 00:00:00',1,0,0,0,1,NULL,0,'Male','0000','0000','00001','00002','00004','0','0','00003',1);
insert  into `_tbl_members`(`MemberID`,`PersonName`,`MemberName`,`MobileNumber`,`EmailID`,`MemberPassword`,`MemberPin`,`RegionID`,`Region`,`TNEBRegion`,`CreatedOn`,`IsAdmin`,`IsDistributor`,`IsDealer`,`IsMember`,`IsActive`,`IsDeactiveOn`,`IsAPI`,`Gender`,`PanCard`,`AdhaarCard`,`Address1`,`Address2`,`PostalCode`,`MapedTo`,`MapedToName`,`GSTIN`,`BillCharge`) values (2,NULL,'hamiec','9000000001','hamiec@gmail.com','123456',NULL,NULL,NULL,NULL,'2021-01-19 10:28:15',0,0,1,0,1,NULL,0,NULL,NULL,NULL,'','','','1','Admin','9000000000',1);
insert  into `_tbl_members`(`MemberID`,`PersonName`,`MemberName`,`MobileNumber`,`EmailID`,`MemberPassword`,`MemberPin`,`RegionID`,`Region`,`TNEBRegion`,`CreatedOn`,`IsAdmin`,`IsDistributor`,`IsDealer`,`IsMember`,`IsActive`,`IsDeactiveOn`,`IsAPI`,`Gender`,`PanCard`,`AdhaarCard`,`Address1`,`Address2`,`PostalCode`,`MapedTo`,`MapedToName`,`GSTIN`,`BillCharge`) values (3,NULL,'JRetailer','9944872965','','123456','1982',NULL,NULL,NULL,'2021-01-19 13:25:11',0,0,0,1,1,NULL,0,NULL,NULL,NULL,'','','','2','hamiec','9000000000',1);

/*Table structure for table `_tbl_mobile_operator_log` */

DROP TABLE IF EXISTS `_tbl_mobile_operator_log`;

CREATE TABLE `_tbl_mobile_operator_log` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `Operator` varchar(255) DEFAULT NULL,
  `Output` text,
  `LogOn` datetime DEFAULT NULL,
  `RequestFrom` varchar(255) DEFAULT NULL,
  `Plan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_mobile_operator_log` */

/*Table structure for table `_tbl_mobile_plan_log` */

DROP TABLE IF EXISTS `_tbl_mobile_plan_log`;

CREATE TABLE `_tbl_mobile_plan_log` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `SMobileNumber` varchar(255) DEFAULT NULL,
  `Operator` varchar(255) DEFAULT NULL,
  `Output` text,
  `LogOn` datetime DEFAULT NULL,
  `RequestFrom` varchar(255) DEFAULT NULL,
  `Plan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_mobile_plan_log` */

/*Table structure for table `_tbl_my_contact` */

DROP TABLE IF EXISTS `_tbl_my_contact`;

CREATE TABLE `_tbl_my_contact` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `ContactName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `MobileOperator` varchar(255) DEFAULT NULL,
  `DTHNumber` varchar(255) DEFAULT NULL,
  `DTHOperator` varchar(255) DEFAULT NULL,
  `TNEBRegion` varchar(255) DEFAULT NULL,
  `TNEBNumber` varchar(255) DEFAULT NULL,
  `CreatedOn` varchar(255) DEFAULT NULL,
  `IsActive` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ContactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_my_contact` */

/*Table structure for table `_tbl_news` */

DROP TABLE IF EXISTS `_tbl_news`;

CREATE TABLE `_tbl_news` (
  `NewsID` int(11) NOT NULL AUTO_INCREMENT,
  `NewsTitle` varchar(500) DEFAULT NULL,
  `NewsDescription` text,
  `CreatedOn` datetime DEFAULT NULL,
  `IsPublish` int(11) DEFAULT NULL,
  `NewsFor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NewsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_news` */

/*Table structure for table `_tbl_news_log` */

DROP TABLE IF EXISTS `_tbl_news_log`;

CREATE TABLE `_tbl_news_log` (
  `NewsViewedID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `NewsID` int(11) DEFAULT NULL,
  `ViewedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`NewsViewedID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_news_log` */

/*Table structure for table `_tbl_operators` */

DROP TABLE IF EXISTS `_tbl_operators`;

CREATE TABLE `_tbl_operators` (
  `OperatorID` int(11) NOT NULL AUTO_INCREMENT,
  `OperatorName` varchar(255) DEFAULT NULL,
  `OperatorCode` varchar(255) DEFAULT NULL,
  `APIID` int(11) DEFAULT '0',
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`OperatorID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_operators` */

insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (1,'Prepaid Airtel','RA',6,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (2,'Prepaid BSNL','RB',3,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (3,'Prepaid Idea','RI',5,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (4,'Prepaid Jio','RJ',5,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (5,'Prepaid Vodafone-Idea','VI',5,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (6,'DTH SunDirect','DS',3,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (7,'DTH RelianceBig','DB',1,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (8,'DTH Tatasky','DT',3,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (9,'DTH Videocond2h','DV',3,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (10,'DTH Dish','DD',3,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (11,'DTH Airtel Digital TV','DA',5,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (13,'Money Transfer','MTB',0,1);
insert  into `_tbl_operators`(`OperatorID`,`OperatorName`,`OperatorCode`,`APIID`,`IsActive`) values (15,'VodafoneIDEA','VI',0,1);

/*Table structure for table `_tbl_orders` */

DROP TABLE IF EXISTS `_tbl_orders`;

CREATE TABLE `_tbl_orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderDate` datetime DEFAULT NULL,
  `OrderNumber` varchar(255) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `MemberMobileNumber` varchar(255) DEFAULT NULL,
  `MemeberEmail` varchar(255) DEFAULT NULL,
  `MemberAddressLine1` varchar(255) DEFAULT NULL,
  `MemberAddressLine2` varchar(255) DEFAULT NULL,
  `razorpay_orderid` varchar(255) DEFAULT NULL,
  `IsPaid` int(11) DEFAULT '0',
  `PaymentID` int(11) DEFAULT '0',
  `PaymentOn` datetime DEFAULT NULL,
  `OrderValue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_orders` */

/*Table structure for table `_tbl_orders_items` */

DROP TABLE IF EXISTS `_tbl_orders_items`;

CREATE TABLE `_tbl_orders_items` (
  `OrderItemID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `SubAmount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`OrderItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_orders_items` */

/*Table structure for table `_tbl_pre_members` */

DROP TABLE IF EXISTS `_tbl_pre_members`;

CREATE TABLE `_tbl_pre_members` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `PersonName` varchar(255) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `MemberPassword` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsAdmin` int(1) DEFAULT '0',
  `IsDistributor` int(1) DEFAULT '0',
  `IsDealer` int(1) DEFAULT '0',
  `IsMember` int(1) DEFAULT '0',
  `IsActive` int(1) DEFAULT '0',
  `IsDeactiveOn` datetime DEFAULT NULL,
  `IsAPI` int(1) DEFAULT '0',
  `MapedTo` varchar(255) DEFAULT NULL,
  `MapedToName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_pre_members` */

insert  into `_tbl_pre_members`(`MemberID`,`PersonName`,`MemberName`,`MobileNumber`,`MemberPassword`,`CreatedOn`,`IsAdmin`,`IsDistributor`,`IsDealer`,`IsMember`,`IsActive`,`IsDeactiveOn`,`IsAPI`,`MapedTo`,`MapedToName`) values (2,NULL,'','9000000000','123456789','2021-01-18 14:43:33',0,0,0,1,0,NULL,0,'1','Admin');
insert  into `_tbl_pre_members`(`MemberID`,`PersonName`,`MemberName`,`MobileNumber`,`MemberPassword`,`CreatedOn`,`IsAdmin`,`IsDistributor`,`IsDealer`,`IsMember`,`IsActive`,`IsDeactiveOn`,`IsAPI`,`MapedTo`,`MapedToName`) values (3,NULL,'Jeyaraj','9000000000','123456789','2021-01-18 14:45:39',0,0,0,1,0,NULL,0,'1','Admin');

/*Table structure for table `_tbl_region` */

DROP TABLE IF EXISTS `_tbl_region`;

CREATE TABLE `_tbl_region` (
  `RegionID` int(11) NOT NULL AUTO_INCREMENT,
  `Region` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  PRIMARY KEY (`RegionID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_region` */

insert  into `_tbl_region`(`RegionID`,`Region`,`IsActive`) values (1,'TamilNadu',1);

/*Table structure for table `_tbl_transactions` */

DROP TABLE IF EXISTS `_tbl_transactions`;

CREATE TABLE `_tbl_transactions` (
  `txnid` int(11) NOT NULL AUTO_INCREMENT,
  `txndate` varchar(255) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `operatorcode` varchar(255) DEFAULT NULL,
  `operatorstring` varchar(255) DEFAULT NULL,
  `rcnumber` varchar(255) DEFAULT NULL,
  `rcamount` varchar(255) DEFAULT NULL,
  `cashback` varchar(255) DEFAULT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `OperatorNumber` varchar(255) DEFAULT NULL,
  `OperatorDate` varchar(255) DEFAULT NULL,
  `TxnStatus` varchar(255) DEFAULT NULL,
  `ACtxnid` int(11) DEFAULT NULL,
  `calledurl` varchar(500) DEFAULT NULL,
  `urlresponse` varchar(500) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `lapurefno` varchar(255) DEFAULT NULL,
  `Cashback_ACtxnid` int(11) DEFAULT NULL,
  `reverseResponse` text,
  `revDate` varchar(255) DEFAULT NULL,
  `CustomerMobileNumber` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsCreditSale` int(1) DEFAULT '0',
  `Credit_noteid` varchar(255) DEFAULT NULL,
  `AdminRemarks` varchar(255) DEFAULT NULL,
  `BillString` text,
  `BillDate` datetime DEFAULT NULL,
  `ReversedOn` datetime DEFAULT NULL,
  `APIID` int(11) DEFAULT NULL,
  `APIName` varchar(255) DEFAULT NULL,
  `whatsappRequired` int(11) DEFAULT '0',
  `ACtxnid_CommBack` varchar(255) DEFAULT NULL,
  `ACtxnid_Charge` varchar(255) DEFAULT NULL,
  `ACtxnid_Reverse` int(11) DEFAULT '0',
  `ACtxnid_CommBack_Reverse` int(11) DEFAULT '0',
  `ACtxnid_Charge_Reverse` int(11) DEFAULT '0',
  PRIMARY KEY (`txnid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_transactions` */

/*Table structure for table `_tbl_verification_code` */

DROP TABLE IF EXISTS `_tbl_verification_code`;

CREATE TABLE `_tbl_verification_code` (
  `ReqID` int(11) NOT NULL AUTO_INCREMENT,
  `RequestSentOn` datetime DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `SecurityCode` varchar(255) DEFAULT NULL,
  `SMSTo` varchar(255) DEFAULT NULL,
  `OldPassword` varchar(255) DEFAULT NULL,
  `NewPassword` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ReqID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_verification_code` */

/*Table structure for table `_tbl_wallet_request` */

DROP TABLE IF EXISTS `_tbl_wallet_request`;

CREATE TABLE `_tbl_wallet_request` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `TransferTo` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `TransferMode` varchar(255) DEFAULT NULL,
  `TxnDate` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT '0',
  `StatusOn` datetime DEFAULT NULL,
  `ApprovedOn` datetime DEFAULT NULL,
  `RejectedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`RequestID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_wallet_request` */

/*Table structure for table `tbl_admin_bank_details` */

DROP TABLE IF EXISTS `tbl_admin_bank_details`;

CREATE TABLE `tbl_admin_bank_details` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `BankName` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  `is_dmt` int(11) DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin_bank_details` */

insert  into `tbl_admin_bank_details`(`BankID`,`BankName`,`AccountName`,`AccountNumber`,`IFSCode`,`IsActive`,`CreatedOn`,`is_dmt`) values (1,'Tamilnadu Mercendile Bank (TMB)','J2J Software Solutions','269150050800064','TMBL0000269',1,'2020-06-26 15:23:38',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
