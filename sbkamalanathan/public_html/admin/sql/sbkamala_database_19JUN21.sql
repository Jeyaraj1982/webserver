/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.34 : Database - aaranju_lawoffice
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aaranju_lawoffice` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `aaranju_lawoffice`;

/*Table structure for table `_tbl_admin` */

DROP TABLE IF EXISTS `_tbl_admin`;

CREATE TABLE `_tbl_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `LoginName` varchar(255) DEFAULT NULL,
  `LoginPassword` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `IsSuperAdmin` int(11) DEFAULT '0',
  `IsAdmin` int(11) DEFAULT '0',
  `IsStaff` int(11) DEFAULT '0',
  `CreatedOn` datetime DEFAULT NULL,
  `AdminMobileNumber` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_admin` */

insert  into `_tbl_admin`(`AdminID`,`AdminName`,`Email`,`LoginName`,`LoginPassword`,`IsActive`,`IsSuperAdmin`,`IsAdmin`,`IsStaff`,`CreatedOn`,`AdminMobileNumber`,`Remarks`,`DeletedOn`) values (1,'SuperAdmin','superadmin@gmail.com','superadmin@gmail.com','123456',1,1,0,0,NULL,NULL,NULL,NULL),(2,'Jeyaraj','no_need_no_need_no_need_jeyaraj_123@yahoo.com',NULL,'no_need_no_need_no_need_123456',2,0,1,0,'2021-05-29 19:27:52','no_need_no_need_no_need_9944872965','1234','2021-05-29 20:44:59'),(3,'Raja','raja@gmail.com','raja','123456',1,0,1,0,'2021-05-31 13:00:27','9442461549','123456',NULL),(4,'Sunder','sunder@gmail.com','sunder','sunder',1,0,1,0,'2021-05-31 17:32:44','9442461548','',NULL);

/*Table structure for table `_tbl_cases_assigned_advocates` */

DROP TABLE IF EXISTS `_tbl_cases_assigned_advocates`;

CREATE TABLE `_tbl_cases_assigned_advocates` (
  `CaseAdvocateID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `AdvocateID` int(11) DEFAULT '0',
  `AssignedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`CaseAdvocateID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_assigned_advocates` */

insert  into `_tbl_cases_assigned_advocates`(`CaseAdvocateID`,`CaseID`,`AdvocateID`,`AssignedOn`,`IsActive`) values (1,1,3,'2021-06-17 11:52:42',1),(2,2,2,'2021-06-17 11:54:54',1),(3,3,1,'2021-06-17 11:57:20',1),(4,4,3,'2021-06-17 11:58:44',1),(5,5,2,'2021-06-17 12:01:02',1),(6,6,1,'2021-06-17 12:03:09',1),(7,7,3,'2021-06-17 12:05:31',1),(8,8,2,'2021-06-17 12:07:33',1),(9,9,1,'2021-06-17 12:09:44',1),(10,10,3,'2021-06-17 12:22:23',1),(11,11,1,'2021-06-17 12:24:36',1),(12,12,2,'2021-06-17 12:25:34',1),(13,13,3,'2021-06-17 12:26:55',1),(14,14,2,'2021-06-17 12:28:52',1),(15,15,1,'2021-06-17 12:29:47',1),(16,16,2,'2021-06-17 12:38:47',1),(17,17,3,'2021-06-17 12:39:45',1),(18,18,1,'2021-06-17 12:40:36',1),(19,19,2,'2021-06-17 12:49:45',1),(20,20,1,'2021-06-17 12:51:19',1),(21,21,3,'2021-06-17 12:52:33',1),(22,22,1,'2021-06-17 12:53:46',1),(23,23,2,'2021-06-17 12:55:16',1),(24,24,3,'2021-06-17 12:58:29',1),(25,25,1,'2021-06-17 12:59:29',1),(26,26,2,'2021-06-17 13:00:32',1),(27,27,3,'2021-06-17 13:02:04',1),(28,28,2,'2021-06-17 13:03:18',1),(29,29,1,'2021-06-17 13:04:50',1),(30,30,3,'2021-06-17 13:06:03',1),(31,31,3,'2021-06-17 13:08:51',1),(32,32,3,'2021-06-17 13:10:52',1),(33,33,2,'2021-06-17 13:11:42',1),(34,34,1,'2021-06-17 13:12:48',1),(35,35,3,'2021-06-17 13:13:43',1),(36,36,3,'2021-06-17 13:15:12',1),(37,37,2,'2021-06-17 13:16:00',1),(38,38,2,'2021-06-17 13:16:51',1),(39,39,2,'2021-06-17 13:18:18',1),(40,40,1,'2021-06-17 13:18:58',1),(41,41,3,'2021-06-17 13:21:02',1),(42,42,2,'2021-06-17 13:24:13',1),(43,43,3,'2021-06-17 13:36:10',1),(44,44,2,'2021-06-17 13:36:47',1),(45,45,2,'2021-06-17 13:38:41',1),(46,46,3,'2021-06-17 19:05:47',1),(47,47,3,'2021-06-17 20:57:13',1),(48,48,3,'2021-06-17 21:00:57',1);

/*Table structure for table `_tbl_cases_assigned_opponents` */

DROP TABLE IF EXISTS `_tbl_cases_assigned_opponents`;

CREATE TABLE `_tbl_cases_assigned_opponents` (
  `OpponentID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `FullName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`OpponentID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_assigned_opponents` */

insert  into `_tbl_cases_assigned_opponents`(`OpponentID`,`CaseID`,`FullName`,`Email`,`MobileNumber`,`CreatedOn`,`IsActive`) values (1,1,'','','','2021-06-17 11:52:42',1),(2,2,'','','','2021-06-17 11:54:54',1),(3,3,'','','','2021-06-17 11:57:20',1),(4,4,'','','','2021-06-17 11:58:44',1),(5,5,'','','','2021-06-17 12:01:02',1),(6,6,'','','','2021-06-17 12:03:09',1),(7,7,'','','','2021-06-17 12:05:31',1),(8,8,'','','','2021-06-17 12:07:33',1),(9,9,'','','','2021-06-17 12:09:44',1),(10,10,'','','','2021-06-17 12:22:23',1),(11,11,'','','','2021-06-17 12:24:36',1),(12,12,'','','','2021-06-17 12:25:34',1),(13,13,'','','','2021-06-17 12:26:55',1),(14,14,'','','','2021-06-17 12:28:52',1),(15,15,'','','','2021-06-17 12:29:47',1),(16,16,'','','','2021-06-17 12:38:47',1),(17,17,'','','','2021-06-17 12:39:45',1),(18,18,'','','','2021-06-17 12:40:36',1),(19,19,'','','','2021-06-17 12:49:45',1),(20,20,'','','','2021-06-17 12:51:19',1),(21,21,'','','','2021-06-17 12:52:33',1),(22,22,'','','','2021-06-17 12:53:46',1),(23,23,'','','','2021-06-17 12:55:16',1),(24,24,'','','','2021-06-17 12:58:29',1),(25,25,'','','','2021-06-17 12:59:29',1),(26,26,'','','','2021-06-17 13:00:32',1),(27,27,'','','','2021-06-17 13:02:04',1),(28,28,'','','','2021-06-17 13:03:18',1),(29,29,'','','','2021-06-17 13:04:50',1),(30,30,'','','','2021-06-17 13:06:03',1),(31,31,'','','','2021-06-17 13:08:51',1),(32,32,'','','','2021-06-17 13:10:52',1),(33,33,'','','','2021-06-17 13:11:42',1),(34,34,'','','','2021-06-17 13:12:48',1),(35,35,'','','','2021-06-17 13:13:43',1),(36,36,'','','','2021-06-17 13:15:12',1),(37,37,'','','','2021-06-17 13:16:00',1),(38,38,'','','','2021-06-17 13:16:51',1),(39,39,'','','','2021-06-17 13:18:18',1),(40,40,'','','','2021-06-17 13:18:58',1),(41,41,'','','','2021-06-17 13:21:02',1),(42,42,'','','','2021-06-17 13:24:13',1),(43,43,'','','','2021-06-17 13:36:10',1),(44,44,'','','','2021-06-17 13:36:47',1),(45,45,'','','','2021-06-17 13:38:41',1),(46,46,'','','','2021-06-17 19:05:47',1),(47,47,'','','','2021-06-17 20:57:13',1),(48,48,'','','','2021-06-17 21:00:57',1);

/*Table structure for table `_tbl_cases_assigned_opponents_advocates` */

DROP TABLE IF EXISTS `_tbl_cases_assigned_opponents_advocates`;

CREATE TABLE `_tbl_cases_assigned_opponents_advocates` (
  `OpponentAdvocateID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `FullName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`OpponentAdvocateID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_assigned_opponents_advocates` */

insert  into `_tbl_cases_assigned_opponents_advocates`(`OpponentAdvocateID`,`CaseID`,`FullName`,`Email`,`MobileNumber`,`CreatedOn`,`IsActive`) values (1,1,'','','','2021-06-17 11:52:42',1),(2,2,'','','','2021-06-17 11:54:54',1),(3,3,'','','','2021-06-17 11:57:20',1),(4,4,'','','','2021-06-17 11:58:44',1),(5,5,'','','','2021-06-17 12:01:02',1),(6,6,'','','','2021-06-17 12:03:09',1),(7,7,'','','','2021-06-17 12:05:31',1),(8,8,'','','','2021-06-17 12:07:33',1),(9,9,'','','','2021-06-17 12:09:44',1),(10,10,'','','','2021-06-17 12:22:23',1),(11,11,'','','','2021-06-17 12:24:36',1),(12,12,'','','','2021-06-17 12:25:34',1),(13,13,'','','','2021-06-17 12:26:55',1),(14,14,'','','','2021-06-17 12:28:52',1),(15,15,'','','','2021-06-17 12:29:47',1),(16,16,'','','','2021-06-17 12:38:47',1),(17,17,'','','','2021-06-17 12:39:45',1),(18,18,'','','','2021-06-17 12:40:36',1),(19,19,'','','','2021-06-17 12:49:45',1),(20,20,'','','','2021-06-17 12:51:19',1),(21,21,'','','','2021-06-17 12:52:33',1),(22,22,'','','','2021-06-17 12:53:46',1),(23,23,'','','','2021-06-17 12:55:16',1),(24,24,'','','','2021-06-17 12:58:29',1),(25,25,'','','','2021-06-17 12:59:29',1),(26,26,'','','','2021-06-17 13:00:32',1),(27,27,'','','','2021-06-17 13:02:04',1),(28,28,'','','','2021-06-17 13:03:18',1),(29,29,'','','','2021-06-17 13:04:50',1),(30,30,'','','','2021-06-17 13:06:03',1),(31,31,'','','','2021-06-17 13:08:51',1),(32,32,'','','','2021-06-17 13:10:52',1),(33,33,'','','','2021-06-17 13:11:42',1),(34,34,'','','','2021-06-17 13:12:48',1),(35,35,'','','','2021-06-17 13:13:43',1),(36,36,'','','','2021-06-17 13:15:12',1),(37,37,'','','','2021-06-17 13:16:00',1),(38,38,'','','','2021-06-17 13:16:51',1),(39,39,'','','','2021-06-17 13:18:18',1),(40,40,'','','','2021-06-17 13:18:58',1),(41,41,'','','','2021-06-17 13:21:02',1),(42,42,'','','','2021-06-17 13:24:13',1),(43,43,'','','','2021-06-17 13:36:10',1),(44,44,'','','','2021-06-17 13:36:47',1),(45,45,'','','','2021-06-17 13:38:41',1),(46,46,'','','','2021-06-17 19:05:47',1),(47,47,'','','','2021-06-17 20:57:13',1),(48,48,'','','','2021-06-17 21:00:57',1);

/*Table structure for table `_tbl_cases_attachments` */

DROP TABLE IF EXISTS `_tbl_cases_attachments`;

CREATE TABLE `_tbl_cases_attachments` (
  `AttachmentID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT NULL,
  `AttachmentFor` varchar(255) DEFAULT NULL,
  `RecordID` int(11) DEFAULT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `AttachmentFile` text,
  `IsActive` int(11) DEFAULT NULL COMMENT '1 for active, 2 delete',
  `AttachedOn` datetime DEFAULT NULL,
  `AttachedByAdminID` int(11) DEFAULT NULL,
  `AttachedByAdminName` varchar(255) DEFAULT NULL,
  `AttachedByStaffID` int(11) DEFAULT NULL,
  `AttachedByStaffName` varchar(255) DEFAULT NULL,
  `AttachedByAdvocateID` int(11) DEFAULT NULL,
  `AttachedByAdvocateName` varchar(255) DEFAULT NULL,
  `DeletedOn` int(11) DEFAULT NULL,
  `DeletedByAdminID` int(11) DEFAULT NULL,
  `DeletedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedByStaffID` int(11) DEFAULT NULL,
  `DeletedByStaffName` varchar(255) DEFAULT NULL,
  `DeletedByAdvocateID` int(11) DEFAULT NULL,
  `DeletedByAdvocateName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AttachmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_attachments` */

/*Table structure for table `_tbl_cases_documents` */

DROP TABLE IF EXISTS `_tbl_cases_documents`;

CREATE TABLE `_tbl_cases_documents` (
  `CaseDocumentID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `AttachmentFile` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `AttachedByStaffID` int(11) DEFAULT '0',
  `AttachedByStaffName` varchar(255) DEFAULT NULL,
  `AttachedByAdvocateID` int(11) DEFAULT '0',
  `AttachedByAdvocateName` varchar(255) DEFAULT NULL,
  `AttachedByAdminID` int(11) DEFAULT '0',
  `AttachedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedByStatffID` int(11) DEFAULT '0',
  `DeletedByAdvocateID` int(11) DEFAULT '0',
  `DeletedByAdminID` int(11) DEFAULT '0',
  `DeletedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CaseDocumentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_documents` */

/*Table structure for table `_tbl_cases_expenses` */

DROP TABLE IF EXISTS `_tbl_cases_expenses`;

CREATE TABLE `_tbl_cases_expenses` (
  `CaseExpenseID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `TxnDate` date DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `AttachedByStaffID` int(11) DEFAULT '0',
  `AttachedByStaffName` varchar(255) DEFAULT NULL,
  `AttachedByAdvocateID` int(11) DEFAULT '0',
  `AttachedByAdvocateName` varchar(255) DEFAULT NULL,
  `AttachedByAdminID` int(11) DEFAULT '0',
  `AttachedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedByStatffID` int(11) DEFAULT '0',
  `DeletedByAdvocateID` int(11) DEFAULT '0',
  `DeletedByAdminID` int(11) DEFAULT '0',
  `DeletedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CaseExpenseID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_expenses` */

insert  into `_tbl_cases_expenses`(`CaseExpenseID`,`CaseID`,`TxnDate`,`Description`,`Amount`,`CreatedOn`,`IsActive`,`AttachedByStaffID`,`AttachedByStaffName`,`AttachedByAdvocateID`,`AttachedByAdvocateName`,`AttachedByAdminID`,`AttachedByAdminName`,`DeletedByStatffID`,`DeletedByAdvocateID`,`DeletedByAdminID`,`DeletedByAdminName`,`DeletedOn`) values (1,44,'2021-06-18','This is consulting charges for advocate fees','500,000','2021-06-18 22:51:13',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL);

/*Table structure for table `_tbl_cases_hirings` */

DROP TABLE IF EXISTS `_tbl_cases_hirings`;

CREATE TABLE `_tbl_cases_hirings` (
  `CaseHiringID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `CaseAttendDate` date DEFAULT NULL,
  `NextHiringDate` date DEFAULT NULL,
  `CaseAttendAdvocateBy` int(11) DEFAULT '0',
  `CaseAttendAdvocateName` varchar(255) DEFAULT NULL,
  `IANumber` varchar(255) DEFAULT NULL,
  `OtherSideApear` int(11) DEFAULT '0',
  `OtherSideAdvocateName` varchar(255) DEFAULT NULL,
  `JudgeName` varchar(255) DEFAULT NULL,
  `StateOfCase` text,
  `BreifOfStage` text,
  `PointsOfDefense` text,
  `OtherDetails` text,
  `AttachmentFile` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `AttachedByStaffID` int(11) DEFAULT '0',
  `AttachedByStaffName` varchar(255) DEFAULT NULL,
  `AttachedByAdvocateID` int(11) DEFAULT '0',
  `AttachedByAdvocateName` varchar(255) DEFAULT NULL,
  `AttachedByAdminID` int(11) DEFAULT '0',
  `AttachedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedByStatffID` int(11) DEFAULT '0',
  `DeletedByAdvocateID` int(11) DEFAULT '0',
  `DeletedByAdminID` int(11) DEFAULT '0',
  `DeletedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CaseHiringID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_hirings` */

insert  into `_tbl_cases_hirings`(`CaseHiringID`,`CaseID`,`CaseAttendDate`,`NextHiringDate`,`CaseAttendAdvocateBy`,`CaseAttendAdvocateName`,`IANumber`,`OtherSideApear`,`OtherSideAdvocateName`,`JudgeName`,`StateOfCase`,`BreifOfStage`,`PointsOfDefense`,`OtherDetails`,`AttachmentFile`,`CreatedOn`,`IsActive`,`AttachedByStaffID`,`AttachedByStaffName`,`AttachedByAdvocateID`,`AttachedByAdvocateName`,`AttachedByAdminID`,`AttachedByAdminName`,`DeletedByStatffID`,`DeletedByAdvocateID`,`DeletedByAdminID`,`DeletedByAdminName`,`DeletedOn`) values (1,2,'2021-06-18','2021-06-30',2,'','5151',0,'','','covin 19 issue postpone','','','',NULL,'2021-06-18 15:28:39',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(2,4,'2021-03-09','2021-06-18',3,'','',0,'','','Finishing Stage','','','',NULL,'2021-06-18 15:41:24',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(3,5,'2021-04-05','2021-06-08',2,'','',0,'','','Finished','','','',NULL,'2021-06-18 15:42:17',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(4,6,'2013-04-10','2014-04-10',1,'','',0,'','','Big Case','','','',NULL,'2021-06-18 15:44:56',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(5,6,'2014-04-10','2015-04-10',1,'','',0,'','','Two Years','','','',NULL,'2021-06-18 15:46:08',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(6,6,'2015-04-10','2016-04-11',1,'','',0,'','','Three Years','','','',NULL,'2021-06-18 15:47:08',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(7,6,'2016-04-11','2017-04-10',1,'','',0,'','','Finished Case Positive','','','',NULL,'2021-06-18 15:48:06',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(8,7,'2020-05-13','2021-06-02',3,'','',0,'','','Case late due to Covid','','','',NULL,'2021-06-18 15:49:06',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(9,7,'2020-08-27','2021-06-23',3,'','',0,'','','last hearing','','','',NULL,'2021-06-18 15:50:21',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(10,21,'2021-01-05','2021-02-16',3,'','',0,'','','Case Difficult','','','',NULL,'2021-06-18 15:51:14',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(11,21,'2021-04-14','2021-05-26',3,'','',0,'','','New case','','','',NULL,'2021-06-18 15:52:56',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(12,22,'2014-08-13','2015-08-13',1,'','',0,'','','case','','','',NULL,'2021-06-18 15:54:35',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(13,23,'2014-06-30','2015-07-30',2,'','',0,'','','In Between stage','','','',NULL,'2021-06-18 16:37:56',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(14,24,'2021-04-20','2021-04-29',3,'','',1,'Kumar','','Legal','','','',NULL,'2021-06-18 16:41:00',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(15,25,'2021-01-04','2021-02-17',1,'','',1,'','','New type','','','',NULL,'2021-06-18 16:42:01',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(16,33,'1990-05-01','1995-05-16',2,'','',1,'Anbu','','Pettitioner not interested','','','',NULL,'2021-06-18 16:47:17',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(17,39,'2020-11-27','2020-12-21',2,'','',1,'Ramesh','','Going Fast','','','',NULL,'2021-06-18 16:49:08',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(18,39,'2021-02-09','2021-03-17',2,'','',1,'','','Normal','','','',NULL,'2021-06-18 16:50:00',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(19,39,'2021-04-01','2021-05-03',2,'','',1,'Anbu','','Critical','','','',NULL,'2021-06-18 16:52:37',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(20,44,'2021-05-04','2021-05-26',2,'','',1,'Ramesh','','Important','','','',NULL,'2021-06-18 16:53:23',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(21,44,'2021-06-01','2021-06-16',2,'','',0,'','','Normal','','','',NULL,'2021-06-18 16:53:43',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(22,18,'2019-05-08','2020-01-02',1,'','',0,'','','Land Pblm','','','',NULL,'2021-06-18 16:55:26',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(23,18,'2020-08-26','2021-06-22',1,'','646464',1,'Kumar','','Very Important Case','','','',NULL,'2021-06-18 16:56:12',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(24,28,'2010-01-05','2011-01-05',2,'','',0,'','','Normal','','','',NULL,'2021-06-18 16:57:06',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(25,28,'2011-01-05','2012-01-04',2,'','',0,'','','Case','','','',NULL,'2021-06-18 16:57:33',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(26,28,'2012-01-04','2013-01-02',2,'','',0,'','','Very Rare','','','',NULL,'2021-06-18 16:58:09',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(27,28,'2013-01-09','2014-01-08',2,'','',0,'','','new','','','',NULL,'2021-06-18 17:00:08',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(28,28,'2014-01-08','2015-01-07',2,'','',0,'','','','','','',NULL,'2021-06-18 17:00:31',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(29,28,'2015-01-07','2016-01-06',2,'','',0,'','','','','','',NULL,'2021-06-18 17:00:59',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(30,28,'2016-01-06','2017-01-05',2,'','251646',1,'Kumar','Indra','Normal','','','',NULL,'2021-06-18 17:01:35',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(31,28,'2018-01-10','2020-01-02',2,'','',0,'','','Case Disposed','','','',NULL,'2021-06-18 17:03:58',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(32,8,'2020-01-08','2021-02-10',2,'','',0,'','','Critical','','','',NULL,'2021-06-18 17:05:33',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(33,8,'2021-05-12','2021-06-08',2,'','',0,'','','case','','','',NULL,'2021-06-18 17:07:24',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(34,26,'2021-05-11','2021-06-02',2,'','',1,'Ramesh','','Stage by stage','','','',NULL,'2021-06-18 17:11:43',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(35,26,'2021-05-04','2021-05-19',2,'','',0,'','','','','','',NULL,'2021-06-18 17:13:34',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(36,17,'2017-10-23','2018-10-23',3,'','',1,'Kumar','','Normal','','','',NULL,'2021-06-18 17:14:38',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(37,17,'2018-10-23','2018-11-20',3,'','',0,'','','','','','',NULL,'2021-06-18 17:15:10',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(38,17,'2018-12-27','2019-12-30',3,'','',0,'','','','','','',NULL,'2021-06-18 17:15:40',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(39,17,'2019-12-31','2020-01-07',3,'','',0,'','','','','','',NULL,'2021-06-18 17:16:03',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(40,16,'2000-02-02','2001-02-01',2,'','',0,'','','','','','',NULL,'2021-06-18 17:18:49',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(41,16,'2002-02-04','2003-02-03',2,'','',0,'','','','','','',NULL,'2021-06-18 17:19:18',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(42,16,'2003-02-03','2004-02-02',2,'','',0,'','','','','','',NULL,'2021-06-18 17:19:44',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(43,16,'2005-02-02','2006-02-02',2,'','',0,'','','','','','',NULL,'2021-06-18 17:21:42',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(44,16,'2017-02-02','2018-02-07',2,'','',0,'','','','','','',NULL,'2021-06-18 17:23:16',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL),(45,25,'2021-06-18','2021-06-30',1,'','14',0,'Murugan','Makesh','Postponed','Main Stage','','',NULL,'2021-06-18 20:27:57',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL);

/*Table structure for table `_tbl_cases_notes` */

DROP TABLE IF EXISTS `_tbl_cases_notes`;

CREATE TABLE `_tbl_cases_notes` (
  `CaseNoteID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `AttachedByStaffID` int(11) DEFAULT '0',
  `AttachedByStaffName` varchar(255) DEFAULT NULL,
  `AttachedByAdvocateID` int(11) DEFAULT '0',
  `AttachedByAdvocateName` varchar(255) DEFAULT NULL,
  `AttachedByAdminID` int(11) DEFAULT '0',
  `AttachedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedByStatffID` int(11) DEFAULT '0',
  `DeletedByAdvocateID` int(11) DEFAULT '0',
  `DeletedByAdminID` int(11) DEFAULT '0',
  `DeletedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CaseNoteID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_notes` */

/*Table structure for table `_tbl_cases_receviedpayments` */

DROP TABLE IF EXISTS `_tbl_cases_receviedpayments`;

CREATE TABLE `_tbl_cases_receviedpayments` (
  `CasePaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `TxnDate` date DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `CreatedOn` datetime DEFAULT NULL,
  `AttachedByStaffID` int(11) DEFAULT '0',
  `AttachedByStaffName` varchar(255) DEFAULT NULL,
  `AttachedByAdvocateID` int(11) DEFAULT '0',
  `AttachedByAdvocateName` varchar(255) DEFAULT NULL,
  `AttachedByAdminID` int(11) DEFAULT '0',
  `AttachedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedByAdminID` int(11) DEFAULT '0',
  `DeletedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CasePaymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_receviedpayments` */

/*Table structure for table `_tbl_cases_register` */

DROP TABLE IF EXISTS `_tbl_cases_register`;

CREATE TABLE `_tbl_cases_register` (
  `CaseID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientID` int(11) DEFAULT NULL,
  `ClientName` varchar(255) DEFAULT NULL,
  `CourtID` int(11) DEFAULT '0',
  `CourtName` varchar(255) DEFAULT NULL,
  `DairyNumber` varchar(255) DEFAULT NULL,
  `DairyYear` varchar(255) DEFAULT NULL,
  `HighCourtID` int(11) DEFAULT NULL,
  `HighCourtName` varchar(255) DEFAULT NULL,
  `HighCourtBenchtID` int(11) DEFAULT NULL,
  `HighCourtBenchtName` varchar(255) DEFAULT NULL,
  `DistrctCourtStateNameID` int(11) DEFAULT NULL,
  `DistrctCourtStateName` varchar(255) DEFAULT NULL,
  `DistrctCourtDistrictNameID` int(11) DEFAULT NULL,
  `DistrctCourtDistrictName` varchar(255) DEFAULT NULL,
  `DistrctCourtPlaceNameID` int(11) DEFAULT NULL,
  `DistrctCourtPlaceName` varchar(255) DEFAULT NULL,
  `DistrictCourtTypeID` int(11) DEFAULT NULL,
  `DistrictCourtTypeName` varchar(255) DEFAULT NULL,
  `TribunalsID` int(11) DEFAULT NULL,
  `TribunalsName` varchar(255) DEFAULT NULL,
  `TribunalNote` varchar(255) DEFAULT NULL,
  `RevenueCourtStateID` int(11) DEFAULT NULL,
  `RevenueCourtStateName` varchar(255) DEFAULT NULL,
  `ConsumerForumID` int(11) DEFAULT NULL,
  `ConsumerForumName` varchar(255) DEFAULT NULL,
  `ConsumerDistrctStateID` int(11) DEFAULT NULL,
  `ConsumerDistrctStateName` varchar(255) DEFAULT NULL,
  `ConsumerDistrctID` int(11) DEFAULT NULL,
  `ConsumerDistrctName` varchar(255) DEFAULT NULL,
  `ConsumerForumNational` varchar(255) DEFAULT NULL,
  `ConsumerStateID` int(11) DEFAULT NULL,
  `ConsumerStateName` varchar(255) DEFAULT NULL,
  `Commissionerate` varchar(255) DEFAULT NULL,
  `CommissionerateStateID` int(11) DEFAULT NULL,
  `CommissionerateStateName` varchar(255) DEFAULT NULL,
  `CommissionerateAuthorityID` int(11) DEFAULT NULL,
  `CommissionerateAuthorityName` varchar(255) DEFAULT NULL,
  `CaseNumber` varchar(255) DEFAULT NULL,
  `CaseYear` varchar(255) DEFAULT NULL,
  `HaveCNR` varchar(255) DEFAULT NULL,
  `CNRNumber` varchar(255) DEFAULT NULL,
  `AppearingModelID` int(11) DEFAULT '0',
  `AppearingModelName` varchar(255) DEFAULT NULL,
  `AppearingAs` varchar(255) DEFAULT NULL,
  `Appear_1` varchar(255) DEFAULT NULL,
  `Appear_2` varchar(255) DEFAULT NULL,
  `AppearNumber` varchar(255) DEFAULT NULL,
  `SelectedAppear` varchar(255) DEFAULT NULL,
  `OldCaseNumber` varchar(255) DEFAULT NULL,
  `OldCaseYear` varchar(255) DEFAULT NULL,
  `DateOfFirstAppearance` varchar(255) DEFAULT NULL,
  `CaseTypeID` int(11) DEFAULT NULL,
  `CaseTypeName` varchar(255) DEFAULT NULL,
  `DateOfFilling` varchar(255) DEFAULT NULL,
  `CourtHallNumber` varchar(255) DEFAULT NULL,
  `FloorNumber` varchar(255) DEFAULT NULL,
  `Clarification` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` text,
  `BeforeJudge` varchar(255) DEFAULT NULL,
  `ReferredBy` varchar(255) DEFAULT NULL,
  `SectionCategory` varchar(255) DEFAULT NULL,
  `PriorityID` int(11) DEFAULT '0',
  `PriorityName` varchar(255) DEFAULT NULL,
  `AffidavitFilled` varchar(255) DEFAULT NULL,
  `AffdavitDate` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(1) DEFAULT '1',
  PRIMARY KEY (`CaseID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_register` */

insert  into `_tbl_cases_register`(`CaseID`,`ClientID`,`ClientName`,`CourtID`,`CourtName`,`DairyNumber`,`DairyYear`,`HighCourtID`,`HighCourtName`,`HighCourtBenchtID`,`HighCourtBenchtName`,`DistrctCourtStateNameID`,`DistrctCourtStateName`,`DistrctCourtDistrictNameID`,`DistrctCourtDistrictName`,`DistrctCourtPlaceNameID`,`DistrctCourtPlaceName`,`DistrictCourtTypeID`,`DistrictCourtTypeName`,`TribunalsID`,`TribunalsName`,`TribunalNote`,`RevenueCourtStateID`,`RevenueCourtStateName`,`ConsumerForumID`,`ConsumerForumName`,`ConsumerDistrctStateID`,`ConsumerDistrctStateName`,`ConsumerDistrctID`,`ConsumerDistrctName`,`ConsumerForumNational`,`ConsumerStateID`,`ConsumerStateName`,`Commissionerate`,`CommissionerateStateID`,`CommissionerateStateName`,`CommissionerateAuthorityID`,`CommissionerateAuthorityName`,`CaseNumber`,`CaseYear`,`HaveCNR`,`CNRNumber`,`AppearingModelID`,`AppearingModelName`,`AppearingAs`,`Appear_1`,`Appear_2`,`AppearNumber`,`SelectedAppear`,`OldCaseNumber`,`OldCaseYear`,`DateOfFirstAppearance`,`CaseTypeID`,`CaseTypeName`,`DateOfFilling`,`CourtHallNumber`,`FloorNumber`,`Clarification`,`Title`,`Description`,`BeforeJudge`,`ReferredBy`,`SectionCategory`,`PriorityID`,`PriorityName`,`AffidavitFilled`,`AffdavitDate`,`Remarks`,`CreatedOn`,`IsActive`) values (1,1,'Arun',1,'Supreme Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','51587787','2011','','',17,'Applicant - Respondent',NULL,'Applicant','Respondent','','','',NULL,'',13,'TAXATION','','','','','Tax','','','','',4,'Normal','1','','','2021-06-17 11:52:42',1),(2,3,'Abi',1,'Supreme Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','54949494','2010','','',17,'Applicant - Respondent',NULL,'Applicant','Respondent','','','',NULL,'',18,'EPINOSCASE','','','','','Property','','','','',3,'Important','1','','','2021-06-17 11:54:54',1),(3,4,'Adarsh',2,'High Court','','0',10,'',1,'Chennai',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','549494',14,'Complainant - Accused',NULL,'Complainant','Accused','','','',NULL,'',3,'CC Case','','','','','Land','','','','',3,'Important','1','','','2021-06-17 11:57:20',1),(4,6,'Akash',2,'High Court','','0',10,'',1,'Chennai',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','5468994',16,'Complainant - Opposite Party',NULL,'Complainant','Opposite Party','','','',NULL,'',1,'OS Case','','','','','Tax','','','','',2,'Critical','1','','','2021-06-17 11:58:44',1),(5,7,'Akil',3,'District Court','','0',0,'',0,'',1,'Tamilnadu',1,'Kanyakumari',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','688656',15,'Decree-Holder - Judgement-Debtor',NULL,'Decree','Holder','','','',NULL,'',2,'Appeal Case','','','','','Land','','','','',3,'Important','1','','','2021-06-17 12:01:02',1),(6,8,'Ajmal',3,'District Court','','0',0,'',0,'',3,'Karanakata',9,'Cochin',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','6154848',3,'Claimant - Respondent',NULL,'Claimant','Respondent','','','',NULL,'',8,'MCOP Case','','','','','Tax','','','','',4,'Normal','1','','','2021-06-17 12:03:09',1),(7,9,'Ahilesh',3,'District Court','','0',0,'',0,'',2,'Kerala',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','5185168',19,'Complainant - Respondent',NULL,'Complainant','Respondent','','','',NULL,'',10,'RCOP Case','','','','','Land','','','','',3,'Important','1','','','2021-06-17 12:05:31',1),(8,11,'Anbu',4,'Commissions (Consumer Forum)','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',1,'',4,'Telgana',0,'','',0,'','',0,'',0,'','186154151','2015','','',9,'Impleeding Applicant - Plaintiff',NULL,'Impleeding Applicant','Plaintiff','','','',NULL,'',7,'HMCA Case','','','','','Shop','','','','',3,'Important','1','','','2021-06-17 12:07:33',1),(9,13,'Babu',4,'Commissions (Consumer Forum)','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',2,'',0,'',0,'','',0,'','',0,'',0,'','616646131','2017','','',18,'FIRST Party - SECOND Party',NULL,'FIRST Party','SECOND Party','','','',NULL,'',11,'CMA Case','','','','','Land','','','','',3,'Important','1','','','2021-06-17 12:09:44',1),(10,14,'Bala',5,'Tribunals AND Authorities','','0',0,'',0,'',0,'',0,'',0,'0',0,'',12,'Company Law Board','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','5484228','2015','','',5,'Legal Representative - Petitioner',NULL,'Legal Representative','Petitioner','','','',NULL,'',17,'HMCOP','','','','','Land','','','','',3,'Important','1','','','2021-06-17 12:22:23',1),(11,16,'Beno',6,'Revenue Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','649189425','0','','',18,'FIRST Party - SECOND Party',NULL,'FIRST Party','SECOND Party','','','',NULL,'',13,'TAXATION','','','','','Tax','','','','',1,'Super Critical','1','','','2021-06-17 12:24:36',1),(12,17,'Bakirsha',5,'Tribunals AND Authorities','','0',0,'',0,'',0,'',0,'',0,'0',0,'',12,'Company Law Board','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','64796649','2007','','',5,'Legal Representative - Petitioner',NULL,'Legal Representative','Petitioner','','','',NULL,'',9,'HRCE Case','','','','','law','','','','',2,'Critical','1','','','2021-06-17 12:25:34',1),(13,18,'Elango',6,'Revenue Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','795616','0','','',13,'Impleeding Respondent - Defendant',NULL,'Impleeding Respondent','Defendant','','','',NULL,'',13,'TAXATION','','','','','Tax','','','','',3,'Important','1','','','2021-06-17 12:26:55',1),(14,19,'Esther',4,'Commissions (Consumer Forum)','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',3,'',0,'',0,'','',1,'Tamilnadu','',0,'',0,'','79194966','2014','','',10,'Impleeding Applicant - Defendant',NULL,'Impleeding Applicant','Defendant','','','',NULL,'',13,'TAXATION','','','','','Tax','','','','',4,'Normal','1','','','2021-06-17 12:28:52',1),(15,20,'Emudeen',5,'Tribunals AND Authorities','','0',0,'',0,'',0,'',0,'',0,'0',0,'',15,'Copyright Board','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','7979946','0','','',1,'Petitioner - Respondent',NULL,'Petitioner','Respondent','','','',NULL,'',6,'IDOP Case','','','','','Tax','','','','',3,'Important','1','','','2021-06-17 12:29:47',1),(16,22,'Lavanya',7,'Commissionerate','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',8,'Professional Tax Officer','9461149','2008','','',9,'Impleeding Applicant - Plaintiff',NULL,'Impleeding Applicant','Plaintiff','','','',NULL,'',5,'HMOP Case','','','','','Tax','','','','',3,'Important','1','','','2021-06-17 12:38:47',1),(17,23,'Kamal',7,'Commissionerate','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',1,'Tamilnadu',0,'','47564962','2013','','',10,'Impleeding Applicant - Defendant',NULL,'Impleeding Applicant','Defendant','','','',NULL,'',12,'GWOP Case','','','','','Shop','','','','',1,'Super Critical','1','','','2021-06-17 12:39:45',1),(18,24,'Masha',4,'Commissions (Consumer Forum)','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',2,'',0,'',0,'','',0,'','',0,'',0,'','1591694616','2009','','',5,'Legal Representative - Petitioner',NULL,'Legal Representative','Petitioner','','','',NULL,'',20,'RCA CASE','','','','','Land','','','','',2,'Critical','1','','','2021-06-17 12:40:36',1),(19,2,'Pavitra',1,'Supreme Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','97*94956','0','','',13,'Impleeding Respondent - Defendant',NULL,'Impleeding Respondent','Defendant','','','',NULL,'',20,'RCA CASE','','','','','Land','','','','',4,'Normal','1','','','2021-06-17 12:49:45',1),(20,5,'Devi',1,'Supreme Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','486969','0','','',6,'Legal Representative - Respondent',NULL,'Legal Representative','Respondent','','','',NULL,'',10,'RCOP Case','','','','','law','','','','',3,'Important','1','','','2021-06-17 12:51:19',1),(21,10,'Jerina',2,'High Court','','0',10,'',1,'Chennai',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','49799949',9,'Impleeding Applicant - Plaintiff',NULL,'Impleeding Applicant','Plaintiff','','','',NULL,'',7,'HMCA Case','','','','','Shop','','','','',4,'Normal','1','','','2021-06-17 12:52:33',1),(22,12,'Sankari',2,'High Court','','0',10,'',2,'Madurai',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','949494949',13,'Impleeding Respondent - Defendant',NULL,'Impleeding Respondent','Defendant','','','',NULL,'',17,'HMCOP','','','','','law','','','','',1,'Super Critical','1','','','2021-06-17 12:53:46',1),(23,15,'Divyaa',3,'District Court','','0',0,'',0,'',3,'Karanakata',9,'Cochin',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','546946',5,'Legal Representative - Petitioner',NULL,'Legal Representative','Petitioner','','','',NULL,'',9,'HRCE Case','','','','','Tax','','','','',1,'Super Critical','1','','','2021-06-17 12:55:16',1),(24,21,'Thanapaul',3,'District Court','','0',0,'',0,'',2,'Kerala',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','19466946161',16,'Complainant - Opposite Party',NULL,'Complainant','Opposite Party','','','',NULL,'',11,'CMA Case','','','','','Shop','','','','',3,'Important','1','','','2021-06-17 12:58:29',1),(25,25,'Ram',3,'District Court','','0',0,'',0,'',1,'Tamilnadu',3,'Madurai',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','48751451',14,'Complainant - Accused',NULL,'Complainant','Accused','','','',NULL,'',9,'HRCE Case','','','','','law','','','','',4,'Normal','1','','','2021-06-17 12:59:29',1),(26,26,'Fathima',4,'Commissions (Consumer Forum)','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',1,'',3,'Karanakata',9,'Cochin','',0,'','',0,'',0,'','449416616','2014','','',10,'Impleeding Applicant - Defendant',NULL,'Impleeding Applicant','Defendant','','','',NULL,'',12,'GWOP Case','','','','','Tax','','','','',3,'Important','1','','','2021-06-17 13:00:32',1),(27,27,'Krithick',4,'Commissions (Consumer Forum)','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',2,'',0,'',0,'','',0,'','',0,'',0,'','5128562','2008','','',6,'Legal Representative - Respondent',NULL,'Legal Representative','Respondent','','','',NULL,'',16,'AS','','','','','Shop','','','','',1,'Super Critical','1','','','2021-06-17 13:02:04',1),(28,28,'Priya',4,'Commissions (Consumer Forum)','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',3,'',0,'',0,'','',4,'Telangana','',0,'',0,'','18515515','2010','','',5,'Legal Representative - Petitioner',NULL,'Legal Representative','Petitioner','','','',NULL,'',20,'RCA CASE','','','','','Land','','','','',3,'Important','1','','','2021-06-17 13:03:18',1),(29,29,'Ranga',7,'Commissionerate','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',4,'Telangana',0,'','482696466','2014','','',1,'Petitioner - Respondent',NULL,'Petitioner','Respondent','','','',NULL,'',15,'AROP','','','','','Shop','','','','',1,'Super Critical','1','','','2021-06-17 13:04:50',1),(30,30,'Siva',5,'Tribunals AND Authorities','','0',0,'',0,'',0,'',0,'',0,'0',0,'',13,'Competition Appellate Tribunal (CAT)','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','8797946','1999','','',4,'Legal Representative - Respondent/Petitioner',NULL,'Legal Representative','Respondent/Petitioner','','','',NULL,'',14,'TROP','','','','','Tax','','','','',3,'Important','1','','','2021-06-17 13:06:03',1),(31,31,'Nathiya',7,'Commissionerate','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',8,'Professional Tax Officer','7979799','2008','','',7,'Plaintiff - Defendant',NULL,'Plaintiff','Defendant','','','',NULL,'',13,'TAXATION','','','','','Tax','','','','',1,'Super Critical','1','','','2021-06-17 13:08:51',1),(32,21,'Thanapaul',1,'Supreme Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','84946848','0','','',14,'Complainant - Accused',NULL,'Complainant','Accused','','','',NULL,'',15,'AROP','','','','','law','','','','',3,'Important','1','','','2021-06-17 13:10:52',1),(33,21,'Thanapaul',2,'High Court','','0',10,'',1,'Chennai',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','79496161',7,'Plaintiff - Defendant',NULL,'Plaintiff','Defendant','','','',NULL,'',17,'HMCOP','','','','','Tax','','','','',2,'Critical','1','','','2021-06-17 13:11:42',1),(34,21,'Thanapaul',4,'Commissions (Consumer Forum)','','0',0,'',0,'',3,'Karnataka',8,'Thiruvananthapuram',0,'0',0,'',0,'','',0,'',1,'',3,'Karnataka',8,'Thiruvananthapuram','',0,'','',0,'',0,'','15441846','0','1','',19,'Complainant - Respondent',NULL,'Complainant','Respondent','','','',NULL,'',15,'AROP','','','','','Shop','','','','',1,'Super Critical','1','','','2021-06-17 13:12:48',1),(35,21,'Thanapaul',5,'Tribunals AND Authorities','','0',0,'',0,'',0,'',0,'',0,'0',0,'',12,'Company Law Board','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','47651265251','0','','',7,'Plaintiff - Defendant',NULL,'Plaintiff','Defendant','','','',NULL,'',6,'IDOP Case','','','','','Land','','','','',4,'Normal','1','','','2021-06-17 13:13:43',1),(36,21,'Thanapaul',6,'Revenue Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','5445184','0','','',4,'Legal Representative - Respondent/Petitioner',NULL,'Legal Representative','Respondent/Petitioner','','','',NULL,'',4,'STC Case','','','','','law','','','','',2,'Critical','1','','','2021-06-17 13:15:12',1),(37,21,'Thanapaul',7,'Commissionerate','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',8,'Professional Tax Officer','79491603','0','','',5,'Legal Representative - Petitioner',NULL,'Legal Representative','Petitioner','','','',NULL,'',9,'HRCE Case','','','','','Shop','','','','',1,'Super Critical','1','','','2021-06-17 13:16:00',1),(38,25,'Ram',1,'Supreme Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','1494949','0','','',11,'Impleeding Respondent - Plaintiff/Defendant',NULL,'Impleeding Respondent','Plaintiff/Defendant','','','',NULL,'',9,'HRCE Case','','','','','Shop','','','','',1,'Super Critical','1','','','2021-06-17 13:16:51',1),(39,25,'Ram',2,'High Court','','0',10,'',1,'Chennai',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','4841585',1,'Petitioner - Respondent',NULL,'Petitioner','Respondent','','','',NULL,'',1,'OS Case','','','','','Shop','','','','',3,'Important','1','','','2021-06-17 13:18:18',1),(40,25,'Ram',4,'Commissions (Consumer Forum)','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',2,'',0,'',0,'','',0,'','',0,'',0,'','484949','2012','','',7,'Plaintiff - Defendant',NULL,'Plaintiff','Defendant','','','',NULL,'',8,'MCOP Case','','','','','Land','','','','',1,'Super Critical','1','','','2021-06-17 13:18:58',1),(41,25,'Ram',5,'Tribunals AND Authorities','','0',0,'',0,'',0,'',0,'',0,'0',0,'',17,'Cyber Appellate Tribunal','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','4949494','0','','',5,'Legal Representative - Petitioner',NULL,'Legal Representative','Petitioner','','','',NULL,'',6,'IDOP Case','','','','','Tax','','','','',3,'Important','1','','','2021-06-17 13:21:02',1),(42,25,'Ram',6,'Revenue Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','456188262','0','','',1,'Petitioner - Respondent',NULL,'Petitioner','Respondent','','','',NULL,'',11,'CMA Case','','','','','Shop','','','','',1,'Super Critical','1','','','2021-06-17 13:24:13',1),(43,29,'Ranga',1,'Supreme Court','946169496','2015',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','','',11,'Impleeding Respondent - Plaintiff/Defendant',NULL,'Impleeding Respondent','Plaintiff/Defendant','','','',NULL,'',16,'AS','','','','','Shop','','','','',4,'Normal','1','','','2021-06-17 13:36:10',1),(44,29,'Ranga',2,'High Court','','0',10,'',1,'Chennai',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','151618116',9,'Impleeding Applicant - Plaintiff',NULL,'Impleeding Applicant','Plaintiff','','','',NULL,'',3,'CC Case','','','','','Land','','','','',3,'Important','1','','','2021-06-17 13:36:47',1),(45,29,'Ranga',2,'High Court','','0',10,'',1,'Chennai',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','','0','1','151618116',9,'Impleeding Applicant - Plaintiff',NULL,'Impleeding Applicant','Plaintiff','','','',NULL,'',3,'CC Case','','','','','Land','','','','',3,'Important','1','','','2021-06-17 13:38:41',1),(46,10,'Jerina',6,'Revenue Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','546','0','','',4,'Legal Representative - Respondent/Petitioner',NULL,'Legal Representative','Respondent/Petitioner','5645','','232342',NULL,'2021-06-24',4,'STC Case','2021-06-17','','','','Main Case','','','','',4,'Normal','1','','','2021-06-17 19:05:47',1),(47,25,'Ram',6,'Revenue Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',0,'',0,'',0,'',0,'','',0,'','',0,'',0,'','1515','0','','',4,'Legal Representative - Respondent/Petitioner',NULL,'Legal Representative','Respondent/Petitioner','232','','23423',NULL,'2021-06-15',20,'RCA CASE','2021-06-16','151','2','Main Road','Main Case','','','','',3,'Important','1','','','2021-06-17 20:57:13',1),(48,25,'Ram',6,'Revenue Court','','0',0,'',0,'',0,'',0,'',0,'0',0,'',0,'','',1,'Tamilnadu',0,'',0,'',0,'','',0,'','',0,'',0,'','23432','2010','','',4,'Legal Representative - Respondent/Petitioner',NULL,'Legal Representative','Respondent/Petitioner','234','','2432432',NULL,'2021-06-24',19,'SOP CASE','2021-06-18','1123','12','Main Road','Document Case','Main Matter','','','',4,'Normal','1','','','2021-06-17 21:00:57',1);

/*Table structure for table `_tbl_cases_timesheet` */

DROP TABLE IF EXISTS `_tbl_cases_timesheet`;

CREATE TABLE `_tbl_cases_timesheet` (
  `CaseTimeSheetID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseID` int(11) DEFAULT '0',
  `EventTime` date DEFAULT NULL,
  `Particulars` text,
  `AttachmentFile` varchar(255) DEFAULT NULL,
  `EventType` varchar(255) DEFAULT NULL,
  `SpentHours` varchar(255) DEFAULT NULL,
  `SpentMins` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `AttachedByStaffID` int(11) DEFAULT '0',
  `AttachedByStaffName` varchar(255) DEFAULT NULL,
  `AttachedByAdvocateID` int(11) DEFAULT '0',
  `AttachedByAdvocateName` varchar(255) DEFAULT NULL,
  `AttachedByAdminID` int(11) DEFAULT '0',
  `AttachedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedByStatffID` int(11) DEFAULT '0',
  `DeletedByAdvocateID` int(11) DEFAULT '0',
  `DeletedByAdminID` int(11) DEFAULT '0',
  `DeletedByAdminName` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CaseTimeSheetID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_cases_timesheet` */

insert  into `_tbl_cases_timesheet`(`CaseTimeSheetID`,`CaseID`,`EventTime`,`Particulars`,`AttachmentFile`,`EventType`,`SpentHours`,`SpentMins`,`CreatedOn`,`IsActive`,`AttachedByStaffID`,`AttachedByStaffName`,`AttachedByAdvocateID`,`AttachedByAdvocateName`,`AttachedByAdminID`,`AttachedByAdminName`,`DeletedByStatffID`,`DeletedByAdvocateID`,`DeletedByAdminID`,`DeletedByAdminName`,`DeletedOn`) values (1,44,'2021-06-19','This case related to discussions on the based on communication based',NULL,'','01','20','2021-06-18 22:50:18',1,NULL,'',NULL,'',1,'superadmin: SuperAdmin',0,0,0,NULL,NULL);

/*Table structure for table `_tbl_logs_logins` */

DROP TABLE IF EXISTS `_tbl_logs_logins`;

CREATE TABLE `_tbl_logs_logins` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` int(11) DEFAULT '0',
  `StaffID` int(11) DEFAULT '0',
  `AdvocateID` int(11) DEFAULT '0',
  `LoginDateTime` datetime DEFAULT NULL,
  `IPAddress` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_logs_logins` */

insert  into `_tbl_logs_logins`(`LoginID`,`AdminID`,`StaffID`,`AdvocateID`,`LoginDateTime`,`IPAddress`) values (1,1,0,0,'2021-06-17 18:08:27','106.217.15.233'),(2,1,0,0,'2021-06-17 18:08:33','106.217.15.233'),(3,1,0,0,'2021-06-17 18:41:33','106.217.15.233'),(4,1,0,0,'2021-06-17 18:43:32','106.217.15.233'),(5,1,0,0,'2021-06-17 19:00:26','202.53.4.51'),(6,1,0,0,'2021-06-17 20:21:10','202.53.4.51'),(7,1,0,0,'2021-06-17 21:23:55','202.53.4.51'),(8,1,0,0,'2021-06-17 23:14:33','202.53.4.46'),(9,1,0,0,'2021-06-18 09:45:51','106.217.15.233'),(10,1,0,0,'2021-06-18 09:55:34','106.217.15.233'),(11,1,0,0,'2021-06-18 11:35:10','202.53.4.41'),(12,1,0,0,'2021-06-18 11:36:36','202.53.4.41'),(13,1,0,0,'2021-06-18 12:03:42','106.217.15.233'),(14,1,0,0,'2021-06-18 12:12:01','202.53.4.41'),(15,1,0,0,'2021-06-18 12:25:40','202.53.4.41'),(16,1,0,0,'2021-06-18 12:52:21','202.53.4.41'),(17,1,0,0,'2021-06-18 13:08:05','106.217.15.233'),(18,1,0,0,'2021-06-18 13:27:28','202.53.4.41'),(19,1,0,0,'2021-06-18 13:33:30','202.53.4.41'),(20,1,0,0,'2021-06-18 14:06:56','202.53.4.41'),(21,1,0,0,'2021-06-18 15:07:17','202.53.4.46'),(22,1,0,0,'2021-06-18 15:26:53','202.53.4.46'),(23,1,0,0,'2021-06-18 15:36:13','202.53.4.46'),(24,1,0,0,'2021-06-18 16:13:48','106.217.15.233'),(25,1,0,0,'2021-06-18 16:43:05','106.217.15.233'),(26,1,0,0,'2021-06-18 16:56:07','202.53.4.46'),(27,1,0,0,'2021-06-18 17:03:11','202.53.4.46'),(28,1,0,0,'2021-06-18 17:27:13','202.53.4.46'),(29,1,0,0,'2021-06-18 17:27:38','202.53.4.46'),(30,1,0,0,'2021-06-18 17:44:18','202.53.4.41'),(31,1,0,0,'2021-06-18 17:46:06','202.53.4.41'),(32,1,0,0,'2021-06-18 18:10:28','202.53.4.41'),(33,1,0,0,'2021-06-18 18:12:43','202.53.4.41'),(34,1,0,0,'2021-06-18 18:55:39','202.53.4.46'),(35,1,0,0,'2021-06-18 18:57:37','202.53.4.41'),(36,1,0,0,'2021-06-18 19:18:19','202.53.4.41'),(37,1,0,0,'2021-06-18 19:41:16','202.53.4.41'),(38,1,0,0,'2021-06-18 19:41:29','202.53.4.41'),(39,1,0,0,'2021-06-18 20:29:55','202.53.4.41'),(40,1,0,0,'2021-06-18 21:57:15','202.53.4.46'),(41,1,0,0,'2021-06-18 22:43:22','202.53.4.46'),(42,1,0,0,'2021-06-19 08:00:28','106.217.15.233');

/*Table structure for table `_tbl_master_advocates` */

DROP TABLE IF EXISTS `_tbl_master_advocates`;

CREATE TABLE `_tbl_master_advocates` (
  `AdvocateID` int(11) NOT NULL AUTO_INCREMENT,
  `AdvocateName` varchar(255) DEFAULT NULL,
  `Gender` varchar(5) DEFAULT NULL,
  `YearOfBirth` int(11) DEFAULT '0',
  `Qualification` varchar(255) DEFAULT NULL,
  `RatePerHour` varchar(255) DEFAULT NULL,
  `PersonalPanCardNumber` varchar(20) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `AddressLine` varchar(255) DEFAULT NULL,
  `StateNameID` int(11) DEFAULT '0',
  `StateName` varchar(255) DEFAULT NULL,
  `DistrictNameID` int(11) DEFAULT '0',
  `DistrictName` varchar(255) DEFAULT NULL,
  `PlaceName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `PhoneNumber1` varchar(255) DEFAULT NULL,
  `PhoneNumber2` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `WhatsappNumber` varchar(255) DEFAULT NULL,
  `TelegramID` varchar(255) DEFAULT NULL,
  `ProfilePhoto` varchar(255) DEFAULT NULL,
  `Attachment1` varchar(255) DEFAULT NULL,
  `Attachment2` varchar(255) DEFAULT NULL,
  `LoginName` varchar(255) DEFAULT NULL,
  `LoginPassword` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `CompanyGSTIN` varchar(50) DEFAULT NULL,
  `CompanyPAN` varchar(50) DEFAULT NULL,
  `CompanyAddress` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `CreatedOn` datetime DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdvocateID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_advocates` */

insert  into `_tbl_master_advocates`(`AdvocateID`,`AdvocateName`,`Gender`,`YearOfBirth`,`Qualification`,`RatePerHour`,`PersonalPanCardNumber`,`Category`,`AddressLine`,`StateNameID`,`StateName`,`DistrictNameID`,`DistrictName`,`PlaceName`,`MobileNumber`,`PhoneNumber1`,`PhoneNumber2`,`EmailID`,`WhatsappNumber`,`TelegramID`,`ProfilePhoto`,`Attachment1`,`Attachment2`,`LoginName`,`LoginPassword`,`CompanyName`,`CompanyGSTIN`,`CompanyPAN`,`CompanyAddress`,`IsActive`,`CreatedOn`,`Remarks`,`DeletedOn`) values (1,'Kamalanathan','Male',1970,'BL','100','UITIOHPI','Criminal','Main ROad',1,'',3,'Madurai','Thoothukudi','9876543210','','','pavi3@gmail.com','','','assets/uploads/advocates/1623909543_profile_person4.png','','','abcdef','abcdef','','','','',1,'2021-06-17 11:29:03','',NULL),(2,'Bala','Male',1970,'BL','100','UITIOHPI','Criminal','Main ROad',1,'',4,'Thenkasi','Thoothukudi','8201563479','','','pavi12@gmail.com','','','assets/uploads/advocates/1623909777_profile_person2.png','','','abcdefg','abcdefg','','','','',1,'2021-06-17 11:32:57','',NULL),(3,'Ajith','Male',1979,'ML','100','OJL2465','Criminal','Main ROad',1,'',2,'Tirunelveli','Madurai','9589641370','','','pavitradevi222@gmail.com','','','assets/uploads/advocates/1623910012_profile_person8.png','','','abc123','abc123','','','','',1,'2021-06-17 11:36:52','',NULL),(4,'Arun','Male',1950,'BL','150','','','Main Road',1,'',2,'Tirunelveli','Town','9552233669','','9552233669','','9552233669','','','','','arun123','arun123','','','','',1,'2021-06-17 21:04:12','',NULL);

/*Table structure for table `_tbl_master_advocates_subadvocates` */

DROP TABLE IF EXISTS `_tbl_master_advocates_subadvocates`;

CREATE TABLE `_tbl_master_advocates_subadvocates` (
  `SubAdvocateID` int(11) NOT NULL AUTO_INCREMENT,
  `AdvocateID` varchar(255) DEFAULT NULL,
  `AdvocateName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `WhatsappNumber` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SubAdvocateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_advocates_subadvocates` */

/*Table structure for table `_tbl_master_appearingmodels` */

DROP TABLE IF EXISTS `_tbl_master_appearingmodels`;

CREATE TABLE `_tbl_master_appearingmodels` (
  `AppearingModelID` int(11) NOT NULL AUTO_INCREMENT,
  `AppearingModelName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`AppearingModelID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_appearingmodels` */

insert  into `_tbl_master_appearingmodels`(`AppearingModelID`,`AppearingModelName`,`IsActive`) values (1,'Petitioner - Respondent',1),(2,'Appellant - Respondent',1),(3,'Claimant - Respondent',1),(4,'Legal Representative - Respondent/Petitioner',1),(5,'Legal Representative - Petitioner',1),(6,'Legal Representative - Respondent',1),(7,'Plaintiff - Defendant',1),(8,'Impleeding Applicant - Plaintiff/Defendant',1),(9,'Impleeding Applicant - Plaintiff',1),(10,'Impleeding Applicant - Defendant',1),(11,'Impleeding Respondent - Plaintiff/Defendant',1),(12,'Impleeding Respondent - Plaintiff',1),(13,'Impleeding Respondent - Defendant',1),(14,'Complainant - Accused',1),(15,'Decree-Holder - Judgement-Debtor',1),(16,'Complainant - Opposite Party',1),(17,'Applicant - Respondent',1),(18,'FIRST Party - SECOND Party',1),(19,'Complainant - Respondent',1);

/*Table structure for table `_tbl_master_casetypes` */

DROP TABLE IF EXISTS `_tbl_master_casetypes`;

CREATE TABLE `_tbl_master_casetypes` (
  `CaseTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `CaseTypeName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CaseTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_casetypes` */

insert  into `_tbl_master_casetypes`(`CaseTypeID`,`CaseTypeName`,`Remarks`,`IsActive`,`DeletedOn`) values (1,'OS Case','',1,NULL),(2,'Appeal Case','',1,NULL),(3,'CC Case','',1,NULL),(4,'STC Case','',1,NULL),(5,'HMOP Case','',1,NULL),(6,'IDOP Case','',1,NULL),(7,'HMCA Case','',1,NULL),(8,'MCOP Case','',1,NULL),(9,'HRCE Case','',1,NULL),(10,'RCOP Case','',1,NULL),(11,'CMA Case','',1,NULL),(12,'GWOP Case','',1,NULL),(13,'TAXATION','',1,NULL),(14,'TROP','',1,NULL),(15,'AROP','',1,NULL),(16,'AS','',1,NULL),(17,'HMCOP','',1,NULL),(18,'EPINOSCASE','',1,NULL),(19,'SOP CASE','',1,NULL),(20,'RCA CASE','',1,NULL);

/*Table structure for table `_tbl_master_clients` */

DROP TABLE IF EXISTS `_tbl_master_clients`;

CREATE TABLE `_tbl_master_clients` (
  `ClientID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ClientTypeID` int(11) DEFAULT '0',
  `ClientTypeName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `FatherName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Gender` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `DateOfBirth` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `EmailID` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `MobileNumber` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `PersonalAlternativeNumbers` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `WhatsappNumber` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ProfilePhoto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ReligionNameID` int(11) DEFAULT '0',
  `ReligionName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `NationalityID` int(11) DEFAULT '0',
  `NationalityName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `PersonalRemarks` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ContactAddressLine1` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ContactAddressLine2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ContactAddressLine3` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ContactPincode` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ContactAdditonalNumbers` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ContactRemarks` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `OfficeAddressLine1` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `OfficeAddressLine2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `OfficeAddressLine3` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `OfficePincode` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `OfficeAdditonalNumbers` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `OfficeRemarks` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ClientID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_master_clients` */

insert  into `_tbl_master_clients`(`ClientID`,`ClientName`,`ClientTypeID`,`ClientTypeName`,`FatherName`,`Gender`,`DateOfBirth`,`EmailID`,`MobileNumber`,`PersonalAlternativeNumbers`,`WhatsappNumber`,`ProfilePhoto`,`ReligionNameID`,`ReligionName`,`NationalityID`,`NationalityName`,`PersonalRemarks`,`ContactAddressLine1`,`ContactAddressLine2`,`ContactAddressLine3`,`ContactPincode`,`ContactAdditonalNumbers`,`ContactRemarks`,`OfficeAddressLine1`,`OfficeAddressLine2`,`OfficeAddressLine3`,`OfficePincode`,`OfficeAdditonalNumbers`,`OfficeRemarks`,`IsActive`,`CreatedOn`,`DeletedOn`) values (1,'Arun',2,'Individual','Samuel','Male','20-10-1998','arun12@gmail.com','9552233669','','9552233669','',2,'Christian',1,'Indian','','14A','Mayon Nagar','Nagerkoil','629001','','','','','','','','',1,'2021-06-17 10:30:53',NULL),(2,'Pavitra',1,'Company','Nagaraj','Female','03/09/1996','pavitradevi22922@gmail.com','8667782511','','8463210720','',1,'Hindu',1,'Indian','','1','Main Road','Tirunelveli','627007','','','','','','','','',2,'2021-06-17 10:31:04','2021-06-18 18:56:52'),(3,'Abi',2,'Individual','Muthu','Female','10-06-1989','abi12@gmail.com','9741236547','','9741236547','',1,'Hindu',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:32:18',NULL),(4,'Adarsh',2,'Individual','Nazeem','Male','14-05-1987','adarsh34@gmail.com','9654123654','','9654123654','',3,'Muslim',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:33:34',NULL),(5,'Devi',2,'Individual','Raja','Female','03/09/1996','pavi1@gmail.com','9876543210','','9876543210','',1,'Hindu',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:34:32',NULL),(6,'Akash',1,'Company','Karthick','Male','14-02-1995','akash12@gmail.com','9632587411','','9632587411','',1,'Hindu',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:34:32',NULL),(7,'Akil',1,'Company','Raja','Male','16-05-1997','akil15@gmail.com','9854126325','','9854126325','',2,'Christian',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:35:30',NULL),(8,'Ajmal',1,'Company','Akbar','Male','17-08-1996','ajmal98@gmail.com','9423657894','','9423657894','',3,'Muslim',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:36:51',NULL),(9,'Ahilesh',2,'Individual','Bala','Male','18-06-0994','ahilesh17@gmail.com','9423654789','','9423654789','assets/uploads/clients/1624018559_profile_person1.jpg',1,'Hindu',3,'Russian','','','','','','','','','','','','','',1,'2021-06-17 10:38:09',NULL),(10,'Jerina',1,'Company','Selvaraj','Female','06/22/1996','pavi2@gmail.com','9876543211','','9876543211','assets/uploads/clients/1623942978_profile_ia master details.jpg',2,'Christian',2,'UAE','','2','Nehru Street','Thoothukudi','628005','','','','','','','','',1,'2021-06-17 10:38:16',NULL),(11,'Anbu',2,'Individual','Samarasam','Male','15-03-1991','anbu98@gmail.com','9489631524','','9489631524','',2,'Christian',3,'Russian','','','','','','','','','','','','','',1,'2021-06-17 10:39:11',NULL),(12,'Sankari',1,'Company','Maharaja','Female','01/22/1996','pavi3@gmail.com','7539514568','','8741250695','',1,'Hindu',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:40:05',NULL),(13,'Babu',2,'Individual','Mohhamad','Male','14-11-1985','babu34@gmail.com','9723648932','','9723648932','',3,'Muslim',3,'Russian','','','','','','','','','','','','','',1,'2021-06-17 10:40:09',NULL),(14,'Bala',1,'Company','Sudalai','Male','03-11-1997','bala56@gmail.com','9032145697','','9032145697','',1,'Hindu',3,'Russian','','','','','','','','','','','','','',1,'2021-06-17 10:41:12',NULL),(15,'Divyaa',2,'Individual','Shunmugam','Female','08/13/1993','pavi4@gmail.com','8547693210','','9745821036','',1,'Hindu',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:42:01',NULL),(16,'Beno',1,'Company','Mossis','Male','10-01-1990','beno28@gmail.com','9321456987','','9321456987','',2,'Christian',3,'Russian','','','','','','','','','','','','','',1,'2021-06-17 10:42:13',NULL),(17,'Bakirsha',1,'Company','Azar','Male','14-04-1992','bakirsha3@gmail.com','9520367895','','9520367895','',3,'Muslim',3,'Russian','','','','','','','','','','','','','',1,'2021-06-17 10:43:07',NULL),(18,'Elango',2,'Individual','Murugan','Male','15-03-1997','elango90@gmail.com','9632145879','','9632145879','',1,'Hindu',2,'UAE','','','','','','','','','','','','','',1,'2021-06-17 10:44:37',NULL),(19,'Esther',2,'Individual','John','Female','14-12-1985','esther12@gmail.com','9201367924','','9201367924','',2,'Christian',2,'UAE','','No1.John Street','Church Street','Tirunelveli','627004','','','','','','','','',1,'2021-06-17 10:46:34',NULL),(20,'Emudeen',2,'Individual','Faizal','Female','12-12-1995','emudeen15@gmail.com','9230645698','','9230645698','',3,'Muslim',2,'UAE','','15A,Middle Street','Pallivasal','Thoothukudi','628002','','','','','','','','',1,'2021-06-17 10:48:56',NULL),(21,'Thanapaul',2,'Individual','Madasamy','Male','05/08/1985','pavi5@gmail.com','9632587410','','8667782511','',1,'Hindu',2,'UAE','','','','','','','','','','','','','',1,'2021-06-17 10:49:31',NULL),(22,'Lavanya',1,'Company','Raja','Female','17-06-1982','lavanya78@gmail.com','9510347894','','9510347894','',1,'Hindu',2,'UAE','','','','','','','','','','','','','',1,'2021-06-17 10:51:03',NULL),(23,'Kamal',1,'Company','Weslin','Male','14-03-1984','kamal14@gmail.com','9147896325','','9147896325','',2,'Christian',2,'UAE','','19/244-3,Shanthi Nagar','Nagarcoil','','629003','','','','','','','','',1,'2021-06-17 10:52:41',NULL),(24,'Masha',1,'Company','Akarullah','Female','15-04-1988','masha14@gmail.com','9632145876','','9632145876','',3,'Muslim',2,'UAE','','14A/743','Kurukku Street','Koivilpatti','628044','','','18A,Koilpillai Street','Thoothukudi','','628005','','',1,'2021-06-17 10:55:55',NULL),(25,'Ram',1,'Company','Guru','Male','10/25/1975','pavi6@gmail.com','9852364170','','7631984264','',1,'Hindu',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 10:57:15',NULL),(26,'Fathima',1,'Company','Muhammad','Female','11/15/1972','pavi7@gmail.com','8463210720','','9632587410','',3,'Muslim',2,'UAE','','','','','','','','','','','','','',1,'2021-06-17 11:00:56',NULL),(27,'Krithick',2,'Individual','Boopathi','Male','06/03/1980','pavi9@gmail.com','8741205636','','7539514568','',1,'Hindu',1,'Indian','','3','Gandhi Street','Madurai','627007','','','','','','','','',1,'2021-06-17 11:09:42',NULL),(28,'Priya',1,'Company','Sathyaram','Female','03/07/1991','pavi10@gmail.com','8741250695','','8302149752','',2,'Christian',1,'Indian','','','','','','','','','','','','','',1,'2021-06-17 11:11:27',NULL),(29,'Ranga',2,'Individual','Vel','Male','01/29/1983','pavi11@gmail.com','7631984264','','9852364170','',1,'Hindu',2,'UAE','','','','','','','','','','','','','',1,'2021-06-17 11:13:15',NULL),(30,'Siva',2,'Individual','Ram','Male','09/30/1993','pavi8@gmail.com','9745821036','','6521478920','',1,'Hindu',4,'USA','','','','','','','','','','','','','',1,'2021-06-17 11:15:44',NULL),(31,'Nathiya',1,'Company','Suriya','Female','02/02/1990','pavi12@gmail.com','6521478920','','9021458732','',2,'Christian',1,'Indian','','5','RR Nagar','Tiruchendur','627007','','','','','','','','',1,'2021-06-17 11:18:52',NULL),(32,'KanniSelvi',2,'Individual','Palani','Female','05/05/1970','pavi13@gmail.com','8302149752','','8547693210','',1,'Hindu',2,'UAE','','','','','','','','','','','','','',1,'2021-06-17 12:58:24',NULL),(33,'Abraham',1,'Company','John','Male','04/20/1999','pavi14@gmail.com','9021458732','','8741205636','',2,'Christian',1,'Indian','','4','John Street','Coimbatore','','','','','','','','','',1,'2021-06-17 12:59:42',NULL);

/*Table structure for table `_tbl_master_clienttypes` */

DROP TABLE IF EXISTS `_tbl_master_clienttypes`;

CREATE TABLE `_tbl_master_clienttypes` (
  `ClientTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `ClientTypeName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ClientTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_clienttypes` */

insert  into `_tbl_master_clienttypes`(`ClientTypeID`,`ClientTypeName`,`Remarks`,`IsActive`,`CreatedOn`,`DeletedOn`) values (1,'Company','',1,NULL,'2021-06-06 12:22:39'),(2,'Individual',NULL,1,NULL,'2021-06-07 14:14:04');

/*Table structure for table `_tbl_master_commissionerateauthority` */

DROP TABLE IF EXISTS `_tbl_master_commissionerateauthority`;

CREATE TABLE `_tbl_master_commissionerateauthority` (
  `CommissionerateAuthorityID` int(11) NOT NULL AUTO_INCREMENT,
  `CommissionerateAuthorityName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `Remarks` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CommissionerateAuthorityID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_commissionerateauthority` */

insert  into `_tbl_master_commissionerateauthority`(`CommissionerateAuthorityID`,`CommissionerateAuthorityName`,`IsActive`,`Remarks`,`CreatedOn`,`DeletedOn`) values (1,'Additional Commissioner of Commercial Taxes',1,NULL,NULL,NULL),(2,'Assistant Commissioner of Commercial Taxes',1,NULL,NULL,NULL),(3,'Commercial Tax Officer',1,NULL,NULL,NULL),(4,'Commissioner of Commercial Taxes',1,NULL,NULL,NULL),(5,'Deputy Commissioner of Commercial Taxes',1,NULL,NULL,NULL),(6,'Joint Commissioner of Commercial Taxes',1,NULL,NULL,NULL),(7,'LOCAL Goods AND Service Tax Officer',1,NULL,NULL,NULL),(8,'Professional Tax Officer',1,NULL,NULL,NULL);

/*Table structure for table `_tbl_master_consumerfourm` */

DROP TABLE IF EXISTS `_tbl_master_consumerfourm`;

CREATE TABLE `_tbl_master_consumerfourm` (
  `ConsumerForumID` int(11) NOT NULL AUTO_INCREMENT,
  `ForumName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ConsumerForumID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_consumerfourm` */

insert  into `_tbl_master_consumerfourm`(`ConsumerForumID`,`ForumName`,`Remarks`,`IsActive`,`DeletedOn`) values (1,'District Forum',NULL,1,NULL),(2,'National Commission - NCDRC',NULL,1,NULL),(3,'State Commission',NULL,1,NULL);

/*Table structure for table `_tbl_master_courts` */

DROP TABLE IF EXISTS `_tbl_master_courts`;

CREATE TABLE `_tbl_master_courts` (
  `CourtID` int(11) NOT NULL AUTO_INCREMENT,
  `CourtCode` varchar(255) DEFAULT NULL,
  `CourtName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  `ListOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`CourtID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_courts` */

insert  into `_tbl_master_courts`(`CourtID`,`CourtCode`,`CourtName`,`Address`,`Remarks`,`IsActive`,`DeletedOn`,`ListOrder`) values (1,NULL,'Supreme Court','Madurai 123','no remarks',1,'2021-05-30 07:58:38',1),(2,NULL,'High Court','Madurai','',1,NULL,2),(3,NULL,'District Court','Chennai','',1,'2021-06-15 16:50:53',3),(4,NULL,'Commissions (Consumer Forum)',NULL,NULL,1,NULL,4),(5,NULL,'Tribunals AND Authorities',NULL,NULL,1,NULL,5),(6,NULL,'Revenue Court',NULL,NULL,1,NULL,6),(7,NULL,'Commissionerate',NULL,NULL,1,NULL,7),(9,NULL,'Others',NULL,NULL,1,NULL,8);

/*Table structure for table `_tbl_master_districtcourttypes` */

DROP TABLE IF EXISTS `_tbl_master_districtcourttypes`;

CREATE TABLE `_tbl_master_districtcourttypes` (
  `DistrictCourtTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `DistrictCourtTypeName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`DistrictCourtTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_districtcourttypes` */

insert  into `_tbl_master_districtcourttypes`(`DistrictCourtTypeID`,`DistrictCourtTypeName`,`Remarks`,`IsActive`,`DeletedOn`) values (1,'ADJ-1','',1,NULL),(2,'ADJ-2','',1,NULL),(3,'ASJ-1','',1,NULL),(4,'ASJ-2','',1,NULL),(5,'PDM','',1,NULL),(6,'ADM-1','',1,NULL),(7,'ADM-2','',1,NULL),(8,'ADJ-3','',1,NULL),(9,'RDO','',1,NULL),(10,'DRO','',1,NULL),(11,'CONSUMER','',1,NULL),(12,'HR And CE','',1,NULL),(13,'TAXATION','',1,NULL),(14,'CJM','',1,NULL),(15,'JM-1','',1,NULL),(16,'TAHSILDAR','',1,NULL),(17,'MADURAI REVENUE COURT','',1,NULL),(18,'FAMILY COURT','',1,NULL),(19,'LABOUR COURT','',1,NULL),(20,'DMC','',1,NULL);

/*Table structure for table `_tbl_master_districtnames` */

DROP TABLE IF EXISTS `_tbl_master_districtnames`;

CREATE TABLE `_tbl_master_districtnames` (
  `DistrictNameID` int(11) NOT NULL AUTO_INCREMENT,
  `StateNameID` int(11) DEFAULT NULL,
  `StateName` varchar(255) DEFAULT NULL,
  `DistrictName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`DistrictNameID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_districtnames` */

insert  into `_tbl_master_districtnames`(`DistrictNameID`,`StateNameID`,`StateName`,`DistrictName`,`Remarks`,`IsActive`,`CreatedOn`,`DeletedOn`) values (1,1,'TamilNadu','Kanyakumari',NULL,1,NULL,NULL),(2,1,'TamilNadu','Tirunelveli',NULL,1,NULL,NULL),(3,1,'TamilNadu','Madurai',NULL,2,NULL,'2021-06-17 13:30:49'),(4,1,'TamilNadu','Thenkasi',NULL,1,NULL,NULL),(5,1,'TamilNadu','Trichy2','2222',2,'2021-06-02 22:08:39','2021-06-02 22:18:28'),(6,1,'TamilNadu','Tirupur','',1,'2021-06-06 12:27:13',NULL),(7,1,'TamilNadu','Coimbatore','Current Account',2,'2021-06-06 12:27:24','2021-06-16 10:17:16'),(8,2,'Kerala','Thiruvananthapuram','',2,'2021-06-15 15:50:26','2021-06-17 13:40:06'),(9,2,'Kerala','Cochin','',1,'2021-06-15 15:50:46',NULL),(10,1,'TamilNadu','Thoothukudi','',2,'2021-06-15 15:50:57','2021-06-15 16:46:43'),(11,1,'Tamilnadu','Salem','',1,'2021-06-17 09:08:57',NULL);

/*Table structure for table `_tbl_master_highcourts` */

DROP TABLE IF EXISTS `_tbl_master_highcourts`;

CREATE TABLE `_tbl_master_highcourts` (
  `HighCourtID` int(11) NOT NULL AUTO_INCREMENT,
  `CourtName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  `ListOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`HighCourtID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_highcourts` */

insert  into `_tbl_master_highcourts`(`HighCourtID`,`CourtName`,`Address`,`Remarks`,`IsActive`,`DeletedOn`,`ListOrder`) values (10,'Madras High Court',NULL,'',1,NULL,NULL);

/*Table structure for table `_tbl_master_highcourts_bench` */

DROP TABLE IF EXISTS `_tbl_master_highcourts_bench`;

CREATE TABLE `_tbl_master_highcourts_bench` (
  `HighCourtBenchtID` int(11) NOT NULL AUTO_INCREMENT,
  `HighCourtID` int(11) DEFAULT NULL,
  `BenchName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  `ListOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`HighCourtBenchtID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_highcourts_bench` */

insert  into `_tbl_master_highcourts_bench`(`HighCourtBenchtID`,`HighCourtID`,`BenchName`,`Remarks`,`IsActive`,`DeletedOn`,`ListOrder`) values (1,10,'Chennai',NULL,1,NULL,NULL),(2,10,'Madurai',NULL,1,NULL,NULL);

/*Table structure for table `_tbl_master_nationality` */

DROP TABLE IF EXISTS `_tbl_master_nationality`;

CREATE TABLE `_tbl_master_nationality` (
  `NationalityID` int(11) NOT NULL AUTO_INCREMENT,
  `NationalityName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`NationalityID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_nationality` */

insert  into `_tbl_master_nationality`(`NationalityID`,`NationalityName`,`Remarks`,`IsActive`,`CreatedOn`,`DeletedOn`) values (1,'Indian','',1,'2021-06-17 08:42:56',NULL),(2,'UAE','',1,'2021-06-17 08:43:03',NULL),(3,'Russian','',1,'2021-06-17 08:43:13',NULL),(4,'USA','',1,'2021-06-17 11:03:15',NULL);

/*Table structure for table `_tbl_master_placenames` */

DROP TABLE IF EXISTS `_tbl_master_placenames`;

CREATE TABLE `_tbl_master_placenames` (
  `PlaceNameID` int(11) NOT NULL AUTO_INCREMENT,
  `StateNameID` int(11) DEFAULT NULL,
  `StateName` varchar(255) DEFAULT NULL,
  `DistrictNameID` int(11) DEFAULT NULL,
  `DistrictName` varchar(255) DEFAULT NULL,
  `PlaceName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PlaceNameID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_placenames` */

insert  into `_tbl_master_placenames`(`PlaceNameID`,`StateNameID`,`StateName`,`DistrictNameID`,`DistrictName`,`PlaceName`,`Remarks`,`IsActive`,`DeletedOn`) values (1,1,'Tamilnadu',2,'Tirunelveli','Vallioor','',1,NULL),(2,1,'Tamilnadu',2,'Tirunelveli','Radhapuram','',1,NULL),(3,1,'Tamilnadu',2,'Tirunelveli','Sankaranan Kovil','',1,NULL),(4,1,'Tamilnadu',2,'Tirunelveli','Nanguneri','',1,NULL),(5,1,'Tamilnadu',2,'Tirunelveli','Thiyanvilai','',1,NULL),(6,1,'Tamilnadu',2,'Tirunelveli','Tenkasi','',1,NULL);

/*Table structure for table `_tbl_master_priorities` */

DROP TABLE IF EXISTS `_tbl_master_priorities`;

CREATE TABLE `_tbl_master_priorities` (
  `PriorityID` int(11) NOT NULL AUTO_INCREMENT,
  `PriorityName` varchar(255) DEFAULT NULL,
  `PriorityColor` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PriorityID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_priorities` */

insert  into `_tbl_master_priorities`(`PriorityID`,`PriorityName`,`PriorityColor`,`Remarks`,`IsActive`,`CreatedOn`,`DeletedOn`) values (1,'Super Critical','#faa08c','',1,NULL,NULL),(2,'Critical','#fab673','',1,NULL,NULL),(3,'Important','#c5e4ff',NULL,1,NULL,NULL),(4,'Normal','#acff96','',1,NULL,NULL),(5,'Too Low','gray','remark 1',2,'2021-06-09 07:31:16','2021-06-09 07:48:50');

/*Table structure for table `_tbl_master_religionnames` */

DROP TABLE IF EXISTS `_tbl_master_religionnames`;

CREATE TABLE `_tbl_master_religionnames` (
  `ReligionNameID` int(11) NOT NULL AUTO_INCREMENT,
  `ReligionName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ReligionNameID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_religionnames` */

insert  into `_tbl_master_religionnames`(`ReligionNameID`,`ReligionName`,`Remarks`,`IsActive`,`CreatedOn`,`DeletedOn`) values (1,'Hindu','',1,'2021-06-17 08:40:38',NULL),(2,'Christian','',1,'2021-06-17 08:41:11',NULL),(3,'Muslim','',1,'2021-06-17 08:41:55',NULL),(4,'Others','',1,'2021-06-17 08:42:01',NULL);

/*Table structure for table `_tbl_master_staffs` */

DROP TABLE IF EXISTS `_tbl_master_staffs`;

CREATE TABLE `_tbl_master_staffs` (
  `StaffID` int(11) NOT NULL AUTO_INCREMENT,
  `StaffName` varchar(255) DEFAULT NULL,
  `Qualification` varchar(255) DEFAULT NULL,
  `AddressLine` varchar(255) DEFAULT NULL,
  `DistrictNameID` int(11) DEFAULT '0',
  `DistrictName` varchar(255) DEFAULT NULL,
  `PlaceName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `PhoneNumber1` varchar(255) DEFAULT NULL,
  `PhoneNumber2` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `WhatsappNumber` varchar(255) DEFAULT NULL,
  `TelegramID` varchar(255) DEFAULT NULL,
  `ProfilePhoto` varchar(255) DEFAULT NULL,
  `Attachment1` varchar(255) DEFAULT NULL,
  `Attachment2` varchar(255) DEFAULT NULL,
  `LoginName` varchar(255) DEFAULT NULL,
  `LoginPassword` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `CreatedOn` datetime DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_staffs` */

insert  into `_tbl_master_staffs`(`StaffID`,`StaffName`,`Qualification`,`AddressLine`,`DistrictNameID`,`DistrictName`,`PlaceName`,`MobileNumber`,`PhoneNumber1`,`PhoneNumber2`,`EmailID`,`WhatsappNumber`,`TelegramID`,`ProfilePhoto`,`Attachment1`,`Attachment2`,`LoginName`,`LoginPassword`,`IsActive`,`CreatedOn`,`Remarks`,`DeletedOn`) values (1,'Makesh Kumar','BL','Main Road',2,'Tirunelveli','Town','9442461549','','','admin@ecommerce.com','','','','','','makesh','makesh',1,'2021-06-17 10:01:48','',NULL),(2,'Vinoth','BL','Main Road',2,'Tirunelveli','Tirunelveli','9442461548','','','','','','','','','Vinoth','Vinoth',1,'2021-06-17 10:03:13','',NULL);

/*Table structure for table `_tbl_master_statenames` */

DROP TABLE IF EXISTS `_tbl_master_statenames`;

CREATE TABLE `_tbl_master_statenames` (
  `StateNameID` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `Remarks` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`StateNameID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_statenames` */

insert  into `_tbl_master_statenames`(`StateNameID`,`StateName`,`IsActive`,`Remarks`,`CreatedOn`,`DeletedOn`) values (1,'Tamilnadu',1,'','2021-06-17 08:39:07',NULL),(2,'Kerala',1,'Malayam','2021-06-17 08:39:23',NULL),(3,'Karnataka',1,'Kanndam','2021-06-17 08:39:48',NULL),(4,'Telangana',1,'','2021-06-17 08:40:10',NULL);

/*Table structure for table `_tbl_master_tribunals` */

DROP TABLE IF EXISTS `_tbl_master_tribunals`;

CREATE TABLE `_tbl_master_tribunals` (
  `TribunalsID` int(11) NOT NULL AUTO_INCREMENT,
  `TribunalsName` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `DeletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`TribunalsID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_master_tribunals` */

insert  into `_tbl_master_tribunals`(`TribunalsID`,`TribunalsName`,`Remarks`,`IsActive`,`DeletedOn`) values (1,'Appellate Authority',NULL,1,NULL),(2,'Appellate Tribunal',NULL,1,NULL),(3,'Appellate Tribunal FOR Electricity (ATE)',NULL,1,NULL),(4,'Arbitration Tribunal',NULL,1,NULL),(5,'Armed FORCE Tribunal',NULL,1,NULL),(6,'Authority FOR Advance Rulings',NULL,1,NULL),(7,'Central Administrative Tribunal',NULL,1,NULL),(8,'Central Electricity Regulatory Commission (CERC)',NULL,1,NULL),(9,'Central Government Industrial Tribunal (CGIT)',NULL,1,NULL),(10,'Clinical Establishment Regulatory Commission',NULL,1,NULL),(11,'Co-Operative Ltd',NULL,1,NULL),(12,'Company Law Board',NULL,1,NULL),(13,'Competition Appellate Tribunal (CAT)',NULL,1,NULL),(14,'Competition Commission of India (CCI)',NULL,1,NULL),(15,'Copyright Board',NULL,1,NULL),(16,'Customs Excise AND Service Tax Appellate Tribunal',NULL,1,NULL),(17,'Cyber Appellate Tribunal',NULL,1,NULL),(18,'Debts Recovery Appellate Tribunal (DRAT)',NULL,1,NULL),(19,'Debts Recovery Tribunal (DRT) OR Debts Recovery Appellate Tribunal (DRAT)',NULL,1,NULL),(20,'Education Tribunals',NULL,1,NULL),(21,'Employees Provident Fund Appellate Tribunal',NULL,NULL,NULL),(22,'Film Certification Appellate Tribunal',NULL,NULL,NULL),(23,'Income Tax Appellate Tribunal',NULL,NULL,NULL),(24,'Information Commission',NULL,NULL,NULL),(25,'Insurance Regulatory AND Development Authority (IRDA)',NULL,NULL,NULL),(26,'Intellectual Property Appellate Board',NULL,NULL,NULL),(27,'Labour Courts &amp; Industrial Tribunals',NULL,NULL,NULL),(28,'Medical Council',NULL,NULL,NULL),(29,'NATIONAL Company Law Appellate Tribunal (NCLAT)',NULL,NULL,NULL),(30,'NATIONAL Company Law Tribunal (NCLT)',NULL,NULL,NULL),(31,'NATIONAL Green Tribunal',NULL,NULL,NULL),(32,'Railway Claims Tribunal',NULL,NULL,NULL),(33,'REAL Estate Regulatory Authority (RERA)',NULL,NULL,NULL),(34,'State Administrative Tribunal',NULL,NULL,NULL),(35,'Telecom Disputes Settlement &amp; Appellate Tribunal (TDSAT)',NULL,NULL,NULL),(36,'Telecom Regulatory Authority of India (TRAI)',NULL,NULL,NULL);

/*Table structure for table `_tbl_settings_application` */

DROP TABLE IF EXISTS `_tbl_settings_application`;

CREATE TABLE `_tbl_settings_application` (
  `SettingID` int(11) NOT NULL AUTO_INCREMENT,
  `Param` varchar(255) DEFAULT NULL,
  `ParamValue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SettingID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_settings_application` */

insert  into `_tbl_settings_application`(`SettingID`,`Param`,`ParamValue`) values (1,'SiteTitle','Nexify Suite : sbkamalanathan.com'),(2,'SiteURL',NULL),(3,'LoginPageLogo','logo_login.png'),(4,'DashboardLogo','logo_dashboard.png'),(5,'LicenceTo','sbkamalanathan.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
