/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - aaranju_projectmanagement
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aaranju_projectmanagement` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `aaranju_projectmanagement`;

/*Table structure for table `_tblAttachment` */

DROP TABLE IF EXISTS `_tblAttachment`;

CREATE TABLE `_tblAttachment` (
  `AttachmentID` int(11) NOT NULL AUTO_INCREMENT,
  `IssueID` int(11) DEFAULT '0',
  `prototypeID` int(11) DEFAULT '0',
  `StakeHolderID` int(11) DEFAULT '0',
  `ProjectID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `FileName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `IsDirect` int(11) DEFAULT NULL,
  PRIMARY KEY (`AttachmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `_tblAttachment` */

insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (1,0,NULL,2,3,24,'_1606712750c5f6a4c7-93b9-4b40-9071-d464dbb491c6.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (2,0,NULL,5,3,24,'_1606713021capture.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (3,0,NULL,6,3,24,'_1606713108capture1.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (4,18,0,0,3,24,'_1606713330c5f6a4c7-93b9-4b40-9071-d464dbb491c6.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (5,22,0,0,3,24,'_1606713407capture.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (6,23,0,0,3,24,'_1606713441capture1.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (7,25,0,0,2,23,'_1607073901screenshot_20201204-144501.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (8,25,0,0,2,23,'_1607073901screenshot_20201204-144511.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (9,26,0,0,2,23,'_1607147149screenshot_20201205-104427.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (10,27,0,0,2,23,'_16071475982.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (11,28,0,0,2,23,'_16071482041.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (12,29,0,0,2,23,'_16071487943.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (13,30,0,0,2,23,'_16071693434.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (14,34,0,0,1,23,'_16073228875.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (15,35,0,0,2,23,'_16074045867.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (16,37,0,0,2,23,'_1607405946screenshot_20201208-105503.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (17,37,0,0,2,23,'WhatsApp Image 2020-12-08 at 11.25.17 AM.jpeg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (18,37,0,0,2,23,'WhatsApp Image 2020-12-08 at 11.24.07 AM.jpeg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (19,38,0,0,2,23,'_16074082028.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (20,39,0,0,1,23,'_16074095349.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (21,40,0,0,1,23,'_160741124310.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (22,41,0,0,17,23,'_1607502986jewellery work 1.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (23,42,0,0,17,23,'_1607506481jewellery work.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (24,43,0,0,17,23,'_16075075465.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (25,44,0,0,17,23,'_16075078475.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (26,45,0,0,17,23,'_16075083666.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (27,46,0,0,17,23,'_16075089687.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (28,49,0,0,17,23,'_16075146688.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (29,52,0,0,1,23,'_16075794039.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (30,53,0,0,17,23,'_16075796029.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (31,54,0,0,17,23,'_160758357310.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (32,55,0,0,17,23,'_160758436711.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (33,56,0,0,17,23,'_160758563813.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (34,57,0,0,17,23,'_160758622414.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (35,58,0,0,17,23,'_160758693815.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (36,59,0,0,17,23,'_160758720116.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (37,60,0,0,17,23,'_160759928317.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (38,65,0,0,1,23,'_1608861843whatsapp image 2020-12-24 at 11.37.33 am.jpeg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (39,66,0,0,1,23,'_1608861897123.jpeg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (40,67,0,0,1,23,'_1608862017333.jpeg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (41,72,0,0,1,23,'_1609309384untitled.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (42,75,0,0,2,23,'_161094984718-01-2021.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (43,76,0,0,2,23,'_161095214718-01-2021.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (44,78,0,0,18,23,'_1611292208rating.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (45,80,0,0,6,26,'_1611900898laksherror.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (46,85,0,0,6,26,'_1612333394lakshwebsite.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (47,87,0,0,6,26,'_1612505757laksh admin panel dashboard customers.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (48,87,0,0,6,26,'_1612505757laksh admin panel invoice.jpg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (49,88,0,0,2,23,'_1612953117whatsapp image 2021-02-10 at 15.40.45.jpeg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (50,89,0,0,2,23,'_161295343910-02-2021.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (51,92,0,0,6,26,'_1612954671invoice error.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (52,93,0,0,6,26,'_1612958217same mobile  number while.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (53,94,0,0,6,26,'_1612958449size error.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (54,95,0,0,2,23,'_1613024414whatsapp image 2021-02-11 at 11.48.27.jpeg',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (55,98,0,0,6,26,'_1613107047admin panel invoice print error no details,price  and products.png',1);
insert  into `_tblAttachment`(`AttachmentID`,`IssueID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (56,107,0,0,19,23,'_161422943825-02-2021.png',1);

/*Table structure for table `_tblAttachmentReply` */

DROP TABLE IF EXISTS `_tblAttachmentReply`;

CREATE TABLE `_tblAttachmentReply` (
  `AttachmentID` int(11) NOT NULL AUTO_INCREMENT,
  `IssueID` int(11) DEFAULT '0',
  `ReplyID` int(11) DEFAULT '0',
  `prototypeID` int(11) DEFAULT '0',
  `StakeHolderID` int(11) DEFAULT '0',
  `ProjectID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `FileName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `IsDirect` int(11) DEFAULT NULL,
  PRIMARY KEY (`AttachmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `_tblAttachmentReply` */

insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (13,26,0,0,0,2,3,'_1607165338issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (14,26,0,0,0,2,3,'_1607166290issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (15,26,0,0,0,2,3,'_1607166393issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (16,26,0,0,0,2,3,'_1607166719issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (17,26,0,0,0,2,3,'_1607166817issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (18,26,0,0,0,2,3,'_1607167169issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (19,26,0,0,0,2,3,'_1607167197issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (20,26,0,0,0,2,3,'_1607167239issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (21,26,0,0,0,2,3,'_1607167324issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (22,26,0,0,0,2,3,'_1607167358issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (23,26,0,0,0,2,3,'_1607167417issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (24,26,0,0,0,2,3,'_1607167982issue_26.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (25,27,0,0,0,2,3,'_1607182157issue_27_1.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (26,28,0,0,0,2,3,'_1607187858issue_28.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (27,28,0,0,0,2,3,'_1607187858issue_28_1.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (28,36,0,0,0,2,3,'_1607406366issue_36.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (29,42,0,0,0,17,3,'_1607510010issue_42.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (30,45,0,0,0,17,3,'_1607615310issue_45.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (31,67,0,0,0,1,3,'_1608862369issue_67.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (32,63,0,0,0,1,3,'_1608978246screenshot_2020-12-26 single tour(1).png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (33,63,0,0,0,1,3,'_1608978246screenshot_2020-12-26 single tour.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (34,66,0,0,0,1,3,'_1608989621screenshot_2020-12-26 single tour.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (35,76,0,0,0,2,3,'_1611299669issue76.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (36,75,0,0,0,2,3,'_1611302730issue75.png',1);
insert  into `_tblAttachmentReply`(`AttachmentID`,`IssueID`,`ReplyID`,`prototypeID`,`StakeHolderID`,`ProjectID`,`UserID`,`FileName`,`IsDirect`) values (37,72,0,0,0,1,3,'_1611303463issue72.png',1);

/*Table structure for table `_tblIssues` */

DROP TABLE IF EXISTS `_tblIssues`;

CREATE TABLE `_tblIssues` (
  `IssueID` int(11) NOT NULL AUTO_INCREMENT,
  `IssuePostedBy` int(11) DEFAULT NULL,
  `IssuePostedByName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `IssueCreatedOn` datetime DEFAULT NULL,
  `IssueStatus` int(11) DEFAULT NULL COMMENT '1-Open 2 Close',
  `ProjectID` int(11) DEFAULT NULL,
  `ProjectName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `IssueTitle` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `IssueDescription` text COLLATE latin1_general_ci,
  `IssueAssignedBy` int(2) DEFAULT NULL,
  `IssueAssingedByName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `DeveloperID` int(11) DEFAULT NULL,
  `DeveloperName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ClosedOn` datetime DEFAULT NULL,
  `VerifyAID` int(11) DEFAULT '0',
  `VerifiedA` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `VerifiedAOn` datetime DEFAULT NULL,
  `VerifyBID` int(11) DEFAULT NULL,
  `VerifiedB` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `VerifiedBOn` datetime DEFAULT NULL,
  PRIMARY KEY (`IssueID`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `_tblIssues` */

insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (1,23,'Vickneswari ','2020-11-27 19:20:59',2,1,'Trip78-Web','Need DELETE option in main category','',1,'Jeyaraj',3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (2,23,'Vickneswari ','2020-11-27 19:21:09',2,1,'Trip78-Web','All sub tours contain the same packages when we create a new sub tour before adding packages in each sub tour.','',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (3,23,'Vickneswari ','2020-11-27 19:21:18',2,1,'Trip78-Web','Sub tour -> Add package ->Price -> need (,) separated option to enter price.','',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (4,23,'Vickneswari ','2020-11-27 19:21:26',2,1,'Trip78-Web','Sub tour -> Add package -> Package Name  ->  Need Repetition','',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (5,23,'Vickneswari ','2020-11-27 19:21:33',2,1,'Trip78-Web','International Tours ->Cambodia -> 5n 6d Cambodia -> Sub category -> Need Days option.','',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (6,23,'Vickneswari ','2020-11-27 19:21:40',2,1,'Trip78-Web','When trying to delete a sub tour, the processing box is loading for a long time.','',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (7,23,'Vickneswari ','2020-11-27 19:21:47',2,1,'Trip78-Web','Tours -> Manage Package -> New Package -> image changes than the one we selected','',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (8,23,'Vickneswari ','2020-11-27 19:21:55',2,1,'Trip78-Web','Packages -> View -> Add day & event -> Event description -> sometimes not visible (Column is empty).','',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (9,23,'Vickneswari ','2020-11-27 19:22:13',2,1,'Trip78-Web','Address Change','Plot No: 15 , Devdas Nagar,South ByePass Road,Near Passport Office(PSK),Tirunelveli-627005\r\n	9626687878',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (10,23,'Vickneswari ','2020-11-27 19:22:45',2,1,'Trip78-Web','Enquiry Form Update','no of infant (below 2 yr)\r\nno of children (age 3-12)',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (11,23,'Vickneswari ','2020-11-27 19:22:52',2,1,'Trip78-Web','Enquiry - Logo in empty space','',NULL,NULL,3,'Jayanthi','2020-11-28 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (12,23,'Vickneswari ','2020-11-27 19:23:32',2,1,'Trip78-Web','Booking mail ','Every Booking Inquiry send to trip78nellai@gmail.com',NULL,NULL,3,'Jayanthi','2020-12-29 07:11:52',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (13,23,'Vickneswari ','2020-11-27 19:23:38',2,1,'Trip78-Web','search option ','',NULL,NULL,3,'Jayanthi','2020-12-29 11:27:27',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (14,23,'Vickneswari ','2020-11-27 19:23:59',1,2,'Trip78-Mobile','APK: Price does not visible in APK but it is visible in website','',NULL,NULL,3,'Jayanthi',NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (15,23,'Vickneswari ','2020-11-27 19:24:07',1,2,'Trip78-Mobile','APK: Few main Categories only displays in APK.','',NULL,NULL,3,'Jayanthi',NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (16,23,'Vickneswari ','2020-11-27 19:24:17',1,2,'Trip78-Mobile','APK: Search bar','',NULL,NULL,3,'Jayanthi',NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (17,24,'tksd','2020-11-30 10:44:56',1,4,'abj-MobileWeb','telegram integaration','need to update\r\n\r\n1) wallet credit/debit\r\n2) bill payment update/reverse ',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (18,24,'tksd','2020-11-30 10:45:30',1,3,'tksd-MobileWeb','telegram integaration wrong notification to client','one client received other clients notifications when Tn-police bill payment done ',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (19,24,'tksd','2020-11-30 10:45:47',1,3,'tksd-MobileWeb','agent list link need to change','https://tksdonlineservice.in/admin/app/dashboard.php?action=Agents/List (wrong on dashboard icon press)\r\n\r\ninstead of below link\r\n\r\nhttps://tksdonlineservice.in/admin/app/dashboard.php?action=Users/List (correct)',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (20,24,'tksd','2020-11-30 10:46:16',1,3,'tksd-MobileWeb','reverse remarks printed on client side txn','when bills are reversed the reason need to print ',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (21,24,'tksd','2020-11-30 10:46:28',1,4,'abj-MobileWeb','reverse remarks printed on client side txn','when bills are reversed the reason need to print ',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (22,24,'tksd','2020-11-30 10:46:47',1,3,'tksd-MobileWeb','mark as credit','remove nick name from wallet credit both admin and dealer on credit sales. Take the client name as a nick name. ',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (23,24,'tksd','2020-11-30 10:47:21',1,3,'tksd-MobileWeb','delete option there. but not working in credit sales from admin side','unable delete wallet refill credit sales only on admin side. Dealer side working.',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (24,23,'Vickneswari ','2020-12-04 14:33:45',2,2,'Trip78-MobileWeb','INTERNATIONAL TOURS - VIEW ALL','While opening view all in International tours, Specialty tours, Indian tours etc...(All tours), Indian tours packages are listed',NULL,NULL,3,'Jayanthi','2020-12-05 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (25,23,'Vickneswari ','2020-12-04 14:55:01',2,2,'Trip78-MobileWeb','corrections done only on themes..','adding of days, leaving place, joining place have not done on any other tours except destination by themes...',NULL,NULL,3,'Jayanthi','2020-12-05 00:00:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (26,23,'Vickneswari ','2020-12-05 11:15:49',2,2,'Trip78-MobileWeb','Adding Package prices in all tours','Package ( for ex: Australia package) -> view details -> Please add price for each packages\r\n',NULL,NULL,3,'Jayanthi','2020-12-05 17:03:01',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (27,23,'Vickneswari ','2020-12-05 11:23:18',2,2,'Trip78-MobileWeb','ADMIN PANEL - Add package - INCLUSION & EXCLUSION field','please add a new field in ADD PACKAGE form, for entering inclusion & exclusion...adding this feature is useful for the next task..\r\n\r\nI have enclosed a reference image ',NULL,NULL,3,'Jayanthi','2020-12-05 20:59:15',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (28,23,'Vickneswari ','2020-12-05 11:33:24',2,2,'Trip78-MobileWeb','Views of each packages','When opening each package (Australia package) -> view details -> please add 3 separate columns after joining place & leaving place. And remove the remaining things. Instead please insert the following..\r\n\r\n3 columns are as follows..\r\n\r\n1) ITINERARY 2) ENQUIRY 3) INCLUSION & EXCLUSION\r\nI have enclosed a reference image..\r\n\r\n1) by default all ITINERARY contents will have to be displayed..\r\n2) like wise when I click enquiry, enquiry form has to be displayed \r\n3) for Inclusion & Exclusion, recover the fields from db ( admin panel - add package ) and post here..\r\n',NULL,NULL,3,'Jayanthi','2020-12-05 22:34:17',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (29,23,'Vickneswari ','2020-12-05 11:43:14',1,2,'Trip78-MobileWeb','Manual search & Voice Search','while working on manual search option please insert voice search also',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (30,23,'Vickneswari ','2020-12-05 17:25:43',2,2,'Trip78-MobileWeb','Package name - case sensitive ','Please look at the below attachment, the package title should be as same as the one indicated below in the attachment..',NULL,NULL,3,'Jayanthi','2020-12-05 20:46:17',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (31,23,'Vickneswari ','2020-12-07 10:37:44',2,2,'Trip78-MobileWeb','Error in Inclusion & Exclusion field','Data given under this field not getting saved.',NULL,NULL,3,'Jayanthi','2020-12-29 07:11:33',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (32,23,'Vickneswari ','2020-12-07 10:52:50',2,1,'Trip78-Web','BACK button not goes back to the exact previous page','International Package -> View sub tours -> Australia Package -> View -> Back ( Not goes back to the exact previous page )\r\nInternational Package -> View sub tours -> Australia Package -> View Package -> 6N 7D Australia -> View -> Back ( Not goes back to the exact previous page )',NULL,NULL,3,'Jayanthi','2020-12-26 19:23:37',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (33,23,'Vickneswari ','2020-12-07 12:01:29',1,2,'Trip78-MobileWeb','ui','',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (34,23,'Vickneswari ','2020-12-07 12:04:47',1,1,'Trip78-Web','UI','Please go through the attachment and work on it..\r\n\r\nI have given a sample image for home page ( how all the tours have to be displayed )..\r\nFor Destination by themes, all subcategories have to displayed in Home page itself...\r\nAll other tours have to be displayed as like (Indian tours, World tours, Specialty tours etc....)\r\n\r\nplease ping me if you have any doubts....\r\n\r\n',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (35,23,'Vickneswari ','2020-12-08 10:46:26',1,2,'Trip78-MobileWeb','MENU BAR','The side bar has to be as shown in image',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (36,23,'Vickneswari ','2020-12-08 10:53:43',2,2,'Trip78-MobileWeb','MENU BAR - links for social media','Facebook  - https://www.facebook.com/trip.seveneight.3\r\nTwitter      - https://twitter.com/Trip784\r\nPinterest  - https://in.pinterest.com/trip78mail/_saved/\r\nInstagram -https://www.instagram.com/trip_seveneight/\r\nTumblr       - http://trip78.tumblr.com/',NULL,NULL,3,'Jayanthi','2020-12-08 11:16:05',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (37,23,'Vickneswari ','2020-12-08 11:09:06',2,2,'Trip78-MobileWeb','ITINERARY - order','Order mismatches ..\r\n( Indian tour -> Pelling -> 9N 10D Gangtok )',NULL,NULL,3,'Jayanthi','2020-12-08 11:31:11',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (38,23,'Vickneswari ','2020-12-08 11:46:42',2,2,'Trip78-MobileWeb','INTERCHANGING OF DAYS | NIGHTS to NIGHTS |  DAYS ','Please interchange days | nights to nights | days....',NULL,NULL,3,'Jayanthi','2021-01-22 16:47:35',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (39,23,'Vickneswari ','2020-12-08 12:08:54',2,1,'Trip78-Web','admin panel - edit package','In edit package, dropdown box of days, nights only contains 10 numbers.... Please make it up to 20...',NULL,NULL,3,'Jayanthi','2020-12-26 19:17:31',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (40,23,'Vickneswari ','2020-12-08 12:37:23',1,1,'Trip78-Web','Admin panel - Agent - Manage Agent','Please make it visible ( here it shows only the total count, not each and individual enquiries ) all the enquiries assigned to each of the agents...IN DETAIL \r\n\r\nfor ex: Agent named Marathi has 6 enquiries, I want to see all the enquiries in detailed manner..',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (41,23,'Vickneswari ','2020-12-09 14:06:26',2,17,'Jewell-app','Exception','Exception occurs after login',NULL,NULL,3,'Jayanthi','2020-12-10 21:22:16',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (42,23,'Vickneswari ','2020-12-09 15:04:41',2,17,'Jewell-app','Main Menu - admin login','1) 2 menu bars shows at the top\r\n2) Need to change Imax software into Nexify software\r\n3) Need to change the customer care number to 9442461549\r\n4) Real time date and time is not working',NULL,NULL,3,'Jayanthi','2020-12-09 16:03:29',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (43,23,'Vickneswari ','2020-12-09 15:22:26',1,17,'Jewell-app','Companies -> New ( New company creation )','1) Please make Company Name, Financial yearF, Financial yearT as Mandatory Fields...\r\n2) Please add 3 new columns , Mobile Number, Print Name, Short Name\r\n',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (44,23,'Vickneswari ','2020-12-09 15:27:27',1,17,'Jewell-app',' New company creation - Ph validation','1) Please do validation for Phone number and Mobile Number',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (45,23,'Vickneswari ','2020-12-09 15:36:06',2,17,'Jewell-app','Listing of companies ','please add the following columns in listing of all companies,,,\r\n\r\n1) Branch code\r\n2) Address\r\n3) Phone Number\r\n4) Financial yearF\r\n5) Financial yearT',NULL,NULL,3,'Jayanthi','2020-12-10 21:18:29',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (46,23,'Vickneswari ','2020-12-09 15:46:08',1,17,'Jewell-app','Edit Company','When try to update company information, the error message is showing..',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (47,23,'Vickneswari ','2020-12-09 16:14:11',1,17,'Jewell-app','Delete company','When try to delete a company after a user has assigned, the company gets deleted..',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (48,23,'Vickneswari ','2020-12-09 16:43:14',2,2,'Trip78-MobileWeb','Email id ','trip78otp@gmail.com (for otp purpose)\r\n( super admin e-mail ) trip78mail@gmail.com - This email is for sending a parallel notification for every enquiry to super admin',NULL,NULL,3,'Jayanthi','2021-01-22 16:47:29',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (49,23,'Vickneswari ','2020-12-09 17:21:08',1,17,'Jewell-app','Companies, Users ','There is a small gap b/w the menu and list of companies & users\r\n',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (50,23,'Vickneswari ','2020-12-10 10:46:25',1,17,'Jewell-app','Unhandled exception ','Unhandled exception occurs when opening the following tabs masters..\r\n\r\n1) Item master\r\n2) Country\r\n3) State \r\n4) HSN\r\n5) Groups\r\n6) Product Type\r\n7) Ledger\r\n8) Groups',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (51,23,'Vickneswari ','2020-12-10 11:02:59',1,17,'Jewell-app','Masters -> ','',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (52,23,'Vickneswari ','2020-12-10 11:20:03',1,1,'Trip78-Web','Country master','Country master refused to save the data..error occurs while saving',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (53,23,'Vickneswari ','2020-12-10 11:23:22',1,17,'Jewell-app','Country master','Country master refused to save the data...error occurs when saving ',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (54,23,'Vickneswari ','2020-12-10 12:29:33',2,17,'Jewell-app','HSN/SAC MASTER','please make the HSN/SAC column as a mandatory field and indicate by using * ',NULL,NULL,3,'Jayanthi','2020-12-10 16:48:58',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (55,23,'Vickneswari ','2020-12-10 12:42:47',2,17,'Jewell-app','Group name','please make group name as unique ',NULL,NULL,3,'Jayanthi','2020-12-10 16:50:46',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (56,23,'Vickneswari ','2020-12-10 13:03:58',1,17,'Jewell-app','delete master','After a new item master is created, when try to delete Product Type, HSN/SAC,  Groups, it gets deleted....',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (57,23,'Vickneswari ','2020-12-10 13:13:44',2,17,'Jewell-app','Account Group','Account group already exists alert message shows like Country code already exists..',NULL,NULL,3,'Jayanthi','2020-12-10 21:08:47',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (58,23,'Vickneswari ','2020-12-10 13:25:38',2,17,'Jewell-app','State Name ','State -> Edit -> country name ->  shows the same country name but given 3 different countries in country master',NULL,NULL,3,'Jayanthi','2020-12-10 21:07:33',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (59,23,'Vickneswari ','2020-12-10 13:30:01',2,17,'Jewell-app','Adding New State - ','same country name is repeating while entering new state ',NULL,NULL,3,'Jayanthi','2020-12-10 21:05:34',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (60,23,'Vickneswari ','2020-12-10 16:51:23',2,17,'Jewell-app','Spelling mistake ','Inventory groups -> new ',NULL,NULL,3,'Jayanthi','2020-12-10 20:54:04',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (61,23,'Vickneswari ','2020-12-11 12:20:42',2,18,'Trip78-Webadmin','Emails and Passwords','trip78otp@gmail.com\r\nPass : Check2020\r\n\r\ntrip78mail@gmail.com\r\nPass: Mail2020',NULL,NULL,3,'Jayanthi','2020-12-29 11:29:34',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (62,23,'Vickneswari ','2020-12-24 11:38:57',1,1,'Trip78-Web','booking now concept','Please make the enquiries form and also send the enquires to appropriate agent and admin',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (63,23,'Vickneswari ','2020-12-24 11:59:17',2,1,'Trip78-Web','login and registration form','Please make ready the login and register form\r\n\r\nRegistration form:\r\nName\r\nGender\r\nUsername(Mobile No)\r\nPassword\r\nAddress \r\nPincode\r\n\r\nLogin form:\r\nUsername:\r\nPassword\r\n\r\n',NULL,NULL,3,'Jayanthi','2020-12-26 15:54:05',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (64,23,'Vickneswari ','2020-12-24 12:00:39',2,1,'Trip78-Web','Customer Reviews  ','Please make the customer reviews as dynamic',NULL,NULL,3,'Jayanthi','2020-12-26 19:01:11',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (65,23,'Vickneswari ','2020-12-25 07:34:03',2,1,'Trip78-Web','file not found for each packages like honeymoon, family...','file not found for each packages like honeymoon, family...',NULL,NULL,3,'Jayanthi','2020-12-25 13:47:32',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (66,23,'Vickneswari ','2020-12-25 07:34:57',2,1,'Trip78-Web','please remove the latest post .... and make the reviews also dynamic','please remove the latest post .... and make the reviews also dynamic',NULL,NULL,3,'Jayanthi','2020-12-26 19:03:40',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (67,23,'Vickneswari ','2020-12-25 07:36:57',2,1,'Trip78-Web','Manage slider - add slider not working','Manage slider - add slider not working',NULL,NULL,3,'Jayanthi','2020-12-25 07:42:48',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (68,23,'Vickneswari ','2020-12-25 07:37:31',2,1,'Trip78-Web','Multiple Upload Image Finished -- Each Package','Multiple Upload Image Finished-- Each Package',NULL,NULL,3,'Jayanthi','2020-12-25 07:38:12',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (69,23,'Vickneswari ','2020-12-27 20:28:52',2,1,'Trip78-Web',' when opening Website home page image large size then reduced',' when opening Website home page image large size then reduced',NULL,NULL,3,'Jayanthi','2020-12-27 20:29:13',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (70,23,'Vickneswari ','2020-12-28 09:28:46',2,18,'Trip78-Webadmin','Customer Review : Admin Side Add/Edit/Delete/List','Customer Review : Admin Side Add/Edit/Delete/List',NULL,NULL,3,'Jayanthi','2020-12-28 09:32:04',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (71,23,'Vickneswari ','2020-12-29 07:10:45',2,1,'Trip78-Web','Gallery Concept : Dyanmic website & admin ','Gallery Concept\r\n\r\nBoth admin and Website',NULL,NULL,3,'Jayanthi','2020-12-29 07:11:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (72,23,'Vickneswari ','2020-12-30 11:53:04',2,1,'Trip78-Web','Removing background image','Please remove the background image in Center Achievements',NULL,NULL,3,'Jayanthi','2021-01-22 13:47:42',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (73,23,'Vickneswari ','2021-01-12 14:20:53',1,2,'Trip78-MobileWeb','footer for all pages  in mobileapp','please enable footer for all pages ',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (74,23,'Vickneswari ','2021-01-18 11:25:45',2,2,'Trip78-MobileWeb','validation for enquiry form','Please make the children, infant, description fields as optional and the remaining fields as mandatory fields\r\n',NULL,NULL,3,'Jayanthi','2021-01-22 16:35:41',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (75,23,'Vickneswari ','2021-01-18 11:34:07',2,2,'Trip78-MobileWeb','top bar','please change the background color to yellow and the text to black color',NULL,NULL,3,'Jayanthi','2021-01-22 13:35:28',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (76,23,'Vickneswari ','2021-01-18 12:12:27',2,2,'Trip78-MobileWeb','Inclusion & Exclusion','Please make visible the inclusion and exclusion title',NULL,NULL,3,'Jayanthi','2021-01-22 12:44:27',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (77,23,'Vickneswari ','2021-01-20 12:39:13',2,18,'Trip78-Webadmin','Sort order','Please enable sort order for main tours',NULL,NULL,3,'Jayanthi','2021-01-22 14:10:01',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (78,23,'Vickneswari ','2021-01-22 10:40:08',2,18,'Trip78-Webadmin','Package rating changes in Edit','Package rating automatically change to 1 in Edit menu',NULL,NULL,3,'Jayanthi','2021-01-22 12:21:45',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (79,23,'Vickneswari ','2021-01-22 10:40:59',2,18,'Trip78-Webadmin','Package order is also now working in admin','Package order not working',NULL,NULL,3,'Jayanthi','2021-01-22 12:08:01',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (80,26,'Abdul','2021-01-29 11:44:58',2,6,'lakshtex-ecomm','commision issue','after adding 11 th referal commission is not change from 8% to 12% and card also not changed .\r\nThe Commission summary shows only 8% is credited after 11 th referral is purchased',NULL,NULL,3,'Jayanthi','2021-01-29 12:53:17',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (81,23,'Vickneswari ','2021-01-29 13:26:05',2,18,'Trip78-Webadmin','Error adding Subtour','Error occurs while adding subtours',NULL,NULL,3,'Jayanthi','2021-01-29 14:21:30',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (82,23,'Vickneswari ','2021-01-29 13:27:05',2,18,'Trip78-Webadmin','Notifications for new enquiry','Please do some notifications for new enquiries in admin panel',NULL,NULL,3,'Jayanthi','2021-02-14 08:48:40',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (83,23,'Vickneswari ','2021-01-29 14:27:03',2,1,'Trip78-Web','Enquiry form validation in website','Please enable enquiry form validation in website also',NULL,NULL,3,'Jayanthi','2021-02-14 08:48:37',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (84,26,'Abdul','2021-02-01 16:57:33',2,6,'lakshtex-ecomm','Admin dashboard the new orders and other issues','in the admin panel new orders,confirm orders,dispatched orders ,delievered and paid orders notification count is not showing in the dashboard.',NULL,NULL,3,'Jayanthi','2021-02-04 11:14:06',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (85,26,'Abdul','2021-02-03 11:53:14',2,6,'lakshtex-ecomm','Lakshtex website responsive error','lakshtex website is proper view only 1600*900 resolution but in the remaining resolution it showing like this below image so change the website responsive.',NULL,NULL,3,'Jayanthi','2021-02-04 11:08:56',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (86,26,'Abdul','2021-02-04 11:31:03',2,6,'lakshtex-ecomm','Print Order Page : Content Missing Admin Side','Print Order Page : Content Missing Admin Side',NULL,NULL,3,'Jayanthi','2021-02-04 11:31:19',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (87,26,'Abdul','2021-02-05 11:45:57',2,6,'lakshtex-ecomm','Admin dashboard the customer button on click no details and Admin panel invoice From and To date invoice is not showing','Admin dashboard the customer notification button when click no details and Admin panel  invoice manage is  From and To date invoice is not showing any invoice',NULL,NULL,3,'Jayanthi','2021-02-12 10:37:12',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (88,23,'Vickneswari ','2021-02-10 16:01:57',2,2,'Trip78-MobileWeb','Scroll not working in itenerary','Please enable scroll able view. Some part of content is hidden',NULL,NULL,3,'Jayanthi','2021-02-14 08:48:35',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (89,23,'Vickneswari ','2021-02-10 16:07:19',2,2,'Trip78-MobileWeb','Remove Seasonal Tours &  Budjet Tours from Menu','Please Remove seasonal tours, Budjet Tours from menu',NULL,NULL,3,'Jayanthi','2021-02-11 11:24:33',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (90,23,'Vickneswari ','2021-02-10 16:09:01',2,18,'Trip78-Webadmin','Sort order not reflecting in mobileweb','Sorting of package order does not works in mobile web, but it works fine in website',NULL,NULL,3,'Jayanthi','2021-02-11 11:07:49',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (91,26,'Abdul','2021-02-10 16:27:19',2,6,'lakshtex-ecomm','Invoice Error','',NULL,NULL,3,'Jayanthi','2021-02-12 10:59:44',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (92,26,'Abdul','2021-02-10 16:27:51',2,6,'lakshtex-ecomm','Invoice Print Error','Invoice   Print  Error',NULL,NULL,3,'Jayanthi','2021-02-12 11:41:20',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (93,26,'Abdul','2021-02-10 17:26:57',2,6,'lakshtex-ecomm','website register mobile number field is to be unique','same mobile number is used while registering please change to unique in SQL',NULL,NULL,3,'Jayanthi','2021-02-12 11:44:33',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (94,26,'Abdul','2021-02-10 17:30:49',2,6,'lakshtex-ecomm','Please change the select field by only one age size and size while adding to cart','Please change the select field by only one age size and size  while adding to cart',NULL,NULL,3,'Jayanthi','2021-02-12 12:36:43',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (95,23,'Vickneswari ','2021-02-11 11:50:14',2,2,'Trip78-MobileWeb','Search Engine','Please check the search engine',NULL,NULL,3,'Jayanthi','2021-02-15 10:33:23',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (96,26,'Abdul','2021-02-11 15:40:45',2,6,'lakshtex-ecomm','Add the withdraw and wallet transfer in the website and in the admin panel is of the withdrawal request and wallet amount reduction also','Add the withdraw and wallet transfer in the website and in the admin panel is of the withdrawal request and wallet amount reduction also',NULL,NULL,3,'Jayanthi','2021-02-12 18:04:38',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (97,26,'Abdul','2021-02-12 10:47:03',2,6,'lakshtex-ecomm','Admin panel invoice print error while giving to print it shows details are empty like product,price and customer details','',NULL,NULL,3,'Jayanthi','2021-02-12 11:44:59',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (98,26,'Abdul','2021-02-12 10:47:27',2,6,'lakshtex-ecomm','Admin panel invoice print error while giving to print it shows details are empty like product,price and customer details','Admin panel invoice print error while giving to print it shows details are empty like product,price and customer details',NULL,NULL,3,'Jayanthi','2021-02-12 11:45:09',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (99,23,'Vickneswari ','2021-02-16 14:49:50',2,1,'Trip78-Web','Enquiry Form : mandatory ','Please make the children, infant, description fields as optional and the remaining fields as mandatory fields\r\ndescription field , infant, children are not mandatory,\r\nbut description is mandatory now',NULL,NULL,3,'Jayanthi','2021-02-16 14:54:08',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (100,23,'Vickneswari ','2021-02-16 14:52:36',2,18,'Trip78-Webadmin','In Agent Login Side : need enquiry notifications ','In Agent Login Side : need enquiry notifications based on assigned pincodes',NULL,NULL,3,'Jayanthi','2021-02-16 14:54:18',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (101,23,'Vickneswari ','2021-02-16 14:53:30',1,18,'Trip78-Webadmin','Duplicate Pincodes : Solutions','If already assigned pincode deleted by admin\r\nthen create again, not added.,\r\n\r\nneed solutions',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (102,23,'Vickneswari ','2021-02-17 18:51:51',2,1,'Trip78-Web','Search based on given keywords/tags from admin panel each backage.','Search based on given keywords/tags from admin panel each backage.',NULL,NULL,3,'Jayanthi','2021-02-17 18:52:05',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (103,23,'Vickneswari ','2021-02-19 14:57:35',2,1,'Trip78-Web','Need Master State Name and District Names','Need Master State Name and District Names',NULL,NULL,3,'Jayanthi','2021-02-19 16:53:50',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (104,23,'Vickneswari ','2021-02-19 14:58:31',1,18,'Trip78-Webadmin','Enquiry log, viewed enquiry by admin/agent','Enquiry log, viewed enquiry by admin/agent',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (105,23,'Vickneswari ','2021-02-20 21:48:21',2,19,'Pedalscycle','Development - Need Admin Panel & manage Products','Development - Need Admin Panel & manage Products\r\n1. Admin panel\r\n2. Manage Products (Add/Edit/List/View/Delete)\r\n3. Manage Sliders (Add/Edit/View/List/Delete)\r\n4. Manage Reviews (Add/Edit/View/List/Delete)\r\n5. Manage Enquires from Contact Page (List, View)\r\n6. Mange Gallery for Gallery Page.\r\n\r\n',NULL,NULL,3,'Jayanthi','2021-02-21 15:56:35',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (106,23,'Vickneswari ','2021-02-24 18:25:44',2,19,'Pedalscycle','Events : in homage page',' new for each upcoming cycles should contain\r\n\r\n1. Starting Point\r\n2. Finishing Point\r\n3. Route\r\n4. Share button to share the url of the current page\r\n5. n Number of Images  to add',NULL,NULL,3,'Jayanthi','2021-02-24 19:03:00',0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (107,23,'Vickneswari ','2021-02-25 10:33:58',1,19,'Pedalscycle','Need Share Option','Need Share Button to share current news and events page link.',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (108,23,'Vickneswari ','2021-02-25 10:34:59',1,19,'Pedalscycle','Upload Image Option','Please allow several images to upload in each and every news and events\r\n',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
insert  into `_tblIssues`(`IssueID`,`IssuePostedBy`,`IssuePostedByName`,`IssueCreatedOn`,`IssueStatus`,`ProjectID`,`ProjectName`,`IssueTitle`,`IssueDescription`,`IssueAssignedBy`,`IssueAssingedByName`,`DeveloperID`,`DeveloperName`,`ClosedOn`,`VerifyAID`,`VerifiedA`,`VerifiedAOn`,`VerifyBID`,`VerifiedB`,`VerifiedBOn`) values (109,23,'Vickneswari ','2021-02-25 10:35:41',1,19,'Pedalscycle','Rename Upcoming Cycles ','Rename upcoming cycles to News & Events',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `_tblIssues_reply` */

DROP TABLE IF EXISTS `_tblIssues_reply`;

CREATE TABLE `_tblIssues_reply` (
  `ReplyID` int(11) NOT NULL AUTO_INCREMENT,
  `ReplyDateTime` datetime DEFAULT NULL,
  `IssueID` int(11) DEFAULT NULL,
  `Description` text,
  `PostedBy` int(11) DEFAULT NULL,
  `PostedByName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ReplyID`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `_tblIssues_reply` */

insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (1,'2020-12-05 16:18:58',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (2,'2020-12-05 16:21:22',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (3,'2020-12-05 16:27:06',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (4,'2020-12-05 16:32:19',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (5,'2020-12-05 16:34:49',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (6,'2020-12-05 16:36:32',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (7,'2020-12-05 16:39:32',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (8,'2020-12-05 16:41:58',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (9,'2020-12-05 16:43:36',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (10,'2020-12-05 16:49:28',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (11,'2020-12-05 16:49:55',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (12,'2020-12-05 16:50:38',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (13,'2020-12-05 16:52:03',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (14,'2020-12-05 16:52:37',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (15,'2020-12-05 16:53:35',26,'Issue Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (16,'2020-12-05 17:03:01',26,'Issue Fixed',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (17,'2020-12-05 18:05:31',30,'Fixed.\r\nView Packages & View Package.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (18,'2020-12-05 20:46:17',30,'Issue Fixed',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (19,'2020-12-05 20:59:15',27,'Issue Fixed\r\nAdmin Side Added Functionality\r\n\r\nAlso displayed Web & Mobile App\r\n\r\nif INCLUSION & EXCLUSION Stored, it displays \r\n',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (20,'2020-12-05 22:34:17',28,'Issue fixed both web and mobile.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (21,'2020-12-08 11:16:05',36,'Url Link added.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (22,'2020-12-08 11:31:11',37,'Fixed\r\nMobile View\r\nWebsite View',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (23,'2020-12-09 16:03:29',42,'Completed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (24,'2020-12-10 16:48:58',54,'Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (25,'2020-12-10 16:50:46',55,'Not allow Duplicate\r\nAdd Group, Edit Group',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (26,'2020-12-10 20:54:04',60,'Updated Edit and New Form',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (27,'2020-12-10 21:05:34',59,'Old app it allows, but new app not allows',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (28,'2020-12-10 21:07:33',58,'Fixed',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (29,'2020-12-10 21:08:47',57,'Fixed New and Edit Form',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (30,'2020-12-10 21:18:29',45,'Updated.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (31,'2020-12-10 21:22:16',41,'Fixed ',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (32,'2020-12-25 07:38:12',68,'Finished,',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (33,'2020-12-25 07:42:48',67,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (34,'2020-12-25 13:47:32',65,'Fixed and opened new page ',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (35,'2020-12-26 15:54:05',63,'Completed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (36,'2020-12-26 19:01:11',64,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (37,'2020-12-26 19:03:40',66,'Completed',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (38,'2020-12-26 19:17:31',39,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (39,'2020-12-26 19:23:37',32,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (40,'2020-12-27 20:29:13',69,'Fixed with preloader',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (41,'2020-12-28 09:32:04',70,'Completed',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (42,'2020-12-29 07:11:00',71,'Completed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (43,'2020-12-29 07:11:33',31,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (44,'2020-12-29 07:11:52',12,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (45,'2020-12-29 11:27:27',13,'Website Search Option fixed',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (46,'2020-12-29 11:29:34',61,'no issues found',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (47,'2021-01-22 12:08:01',79,'Completed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (48,'2021-01-22 12:21:45',78,'Completed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (49,'2021-01-22 12:44:27',76,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (50,'2021-01-22 13:35:28',75,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (51,'2021-01-22 13:47:42',72,'Completed\r\n',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (52,'2021-01-22 14:10:01',77,'Completed',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (53,'2021-01-22 16:35:41',74,'Completed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (54,'2021-01-22 16:47:29',48,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (55,'2021-01-22 16:47:35',38,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (56,'2021-01-29 12:53:17',80,'Abdul\r\ncalculation : \r\n1 to 5 => (5)\r\n6 to 15 => (10)\r\n.\r\n.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (57,'2021-01-29 14:21:30',81,'Completed.\r\nDisk Full : over flow issue',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (58,'2021-02-04 11:08:56',85,'Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (59,'2021-02-04 11:14:06',84,'Counting issue fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (60,'2021-02-04 11:31:19',86,'Fixed.',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (61,'2021-02-11 11:07:49',90,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (62,'2021-02-11 11:24:33',89,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (63,'2021-02-12 10:37:12',87,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (64,'2021-02-12 10:59:44',91,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (65,'2021-02-12 11:41:20',92,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (66,'2021-02-12 11:44:33',93,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (67,'2021-02-12 11:44:59',97,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (68,'2021-02-12 11:45:09',98,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (69,'2021-02-12 12:36:43',94,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (70,'2021-02-12 18:04:38',96,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (71,'2021-02-14 08:48:35',88,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (72,'2021-02-14 08:48:37',83,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (73,'2021-02-14 08:48:40',82,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (74,'2021-02-15 10:33:23',95,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (75,'2021-02-16 14:54:08',99,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (76,'2021-02-16 14:54:18',100,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (77,'2021-02-17 18:52:05',102,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (78,'2021-02-19 16:53:50',103,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (79,'2021-02-21 15:56:35',105,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (80,'2021-02-24 18:26:36',106,'',3,'Jayanthi');
insert  into `_tblIssues_reply`(`ReplyID`,`ReplyDateTime`,`IssueID`,`Description`,`PostedBy`,`PostedByName`) values (81,'2021-02-24 19:03:00',106,'',3,'Jayanthi');

/*Table structure for table `_tblPStakeHolderTask` */

DROP TABLE IF EXISTS `_tblPStakeHolderTask`;

CREATE TABLE `_tblPStakeHolderTask` (
  `TaskID` int(11) NOT NULL AUTO_INCREMENT,
  `TaskPostedBy` int(11) DEFAULT NULL,
  `TaskPostedByName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `TaskCreatedOn` datetime DEFAULT NULL,
  `TaskStatus` int(11) DEFAULT NULL COMMENT '1-Open 2 Close',
  `ProjectID` int(11) DEFAULT NULL,
  `ProjectName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `TaskTitle` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `TaskDescription` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `CompletedOn` datetime DEFAULT NULL,
  `CompletedByID` int(11) DEFAULT NULL,
  `CompletedByName` varchar(255) DEFAULT NULL,
  `LastUpdatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`TaskID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `_tblPStakeHolderTask` */

insert  into `_tblPStakeHolderTask`(`TaskID`,`TaskPostedBy`,`TaskPostedByName`,`TaskCreatedOn`,`TaskStatus`,`ProjectID`,`ProjectName`,`TaskTitle`,`TaskDescription`,`CompletedOn`,`CompletedByID`,`CompletedByName`,`LastUpdatedOn`) values (7,25,'Subbu','2020-11-30 09:22:29',1,1,'Trip78-Web','Agent Concept in Admin Area','1. Create Agent\r\n2. Edit Agent\r\n3. List Agents\r\n4. View Agent + Add/Remove Pin-codes\r\n5. Agent Login\r\n\r\n6. Agent Login (active agents allow to login)\r\n6.1 My Profile\r\n6.2 Change Password\r\n6.3 My Enquires-> View\r\n6.4 Dashboard : Count my enquires based on assigned pincodes\r\n',NULL,NULL,NULL,NULL);

/*Table structure for table `_tblPStakeHolderTaskItems` */

DROP TABLE IF EXISTS `_tblPStakeHolderTaskItems`;

CREATE TABLE `_tblPStakeHolderTaskItems` (
  `TaskItemID` int(11) NOT NULL AUTO_INCREMENT,
  `TaskID` int(11) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `TaskDescription` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `Hrs` int(11) DEFAULT NULL,
  `Mins` int(11) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `Deactivated` datetime DEFAULT NULL,
  PRIMARY KEY (`TaskItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `_tblPStakeHolderTaskItems` */

/*Table structure for table `_tblProjectAssign` */

DROP TABLE IF EXISTS `_tblProjectAssign`;

CREATE TABLE `_tblProjectAssign` (
  `AssignID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AssignID`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `_tblProjectAssign` */

insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (1,23,1,'2020-11-28 00:00:00');
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (2,23,2,'2020-11-28 00:00:00');
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (3,1,1,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (4,1,1,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (5,3,1,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (6,3,2,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (7,1,3,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (8,1,4,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (9,1,5,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (10,3,3,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (11,3,4,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (12,3,5,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (13,25,3,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (14,25,4,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (15,25,5,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (16,25,1,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (17,25,2,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (18,24,3,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (19,24,4,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (20,24,5,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (21,26,6,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (47,3,6,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (23,25,6,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (48,1,19,'2021-02-20 00:00:00');
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (25,27,8,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (26,27,9,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (27,27,10,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (28,27,11,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (29,27,12,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (30,27,13,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (31,27,14,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (32,27,15,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (33,27,16,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (37,28,17,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (36,23,17,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (38,28,1,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (39,28,2,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (40,27,17,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (41,23,18,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (42,27,18,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (43,28,18,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (44,1,17,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (45,3,17,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (46,3,18,NULL);
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (49,3,19,'2021-02-20 00:00:00');
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (50,23,19,'2021-02-20 00:00:00');
insert  into `_tblProjectAssign`(`AssignID`,`UserID`,`ProjectID`,`AddedOn`) values (51,28,19,'2021-02-20 00:00:00');

/*Table structure for table `_tblProjects` */

DROP TABLE IF EXISTS `_tblProjects`;

CREATE TABLE `_tblProjects` (
  `ProjectID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`ProjectID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `_tblProjects` */

insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (1,'Trip78-Web');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (2,'Trip78-MobileWeb');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (3,'tksd-MobileWeb');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (4,'abj-MobileWeb');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (5,'masflower-webapp');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (6,'lakshtex-ecomm');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (19,'Pedalscycle');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (8,'klx.co.in');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (9,'klxmart.com');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (10,'kasupanamthuttu.com');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (11,'rhole.in');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (12,'nammamarriage.com');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (13,'cinemanewfaces');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (14,'digitalmaking');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (15,'kingfish');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (16,'shippingtech');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (17,'Jewell-app');
insert  into `_tblProjects`(`ProjectID`,`ProjectName`) values (18,'Trip78-Webadmin');

/*Table structure for table `_tblPrototype` */

DROP TABLE IF EXISTS `_tblPrototype`;

CREATE TABLE `_tblPrototype` (
  `PrototypeID` int(11) NOT NULL AUTO_INCREMENT,
  `PrototypePostedBy` int(11) DEFAULT NULL,
  `PrototypePostedByName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `PrototypeCreatedOn` datetime DEFAULT NULL,
  `PrototypeStatus` int(11) DEFAULT NULL COMMENT '1-Open 2 Close',
  `ProjectID` int(11) DEFAULT NULL,
  `ProjectName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `PrototypeTitle` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `PrototypeDescription` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `CompletedOn` date DEFAULT NULL,
  `CompletedByID` int(11) DEFAULT NULL,
  `CompletedByName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PrototypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `_tblPrototype` */

/*Table structure for table `_tblTaskConversation` */

DROP TABLE IF EXISTS `_tblTaskConversation`;

CREATE TABLE `_tblTaskConversation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DeveloperID` int(11) DEFAULT NULL,
  `DeveloperName` varchar(255) DEFAULT NULL,
  `ConversationDate` datetime DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tblTaskConversation` */

/*Table structure for table `_tblUser` */

DROP TABLE IF EXISTS `_tblUser`;

CREATE TABLE `_tblUser` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `EmployeeName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `EmailAddress` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsAdmin` int(11) DEFAULT '0',
  `IsTester` int(11) DEFAULT '0',
  `IsDeveloper` int(11) DEFAULT '0',
  `IsStakeHolder` int(11) DEFAULT '0',
  `telegramid` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `OrgAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `_tblUser` */

insert  into `_tblUser`(`UserID`,`EmployeeName`,`EmailAddress`,`Password`,`CreatedOn`,`IsAdmin`,`IsTester`,`IsDeveloper`,`IsStakeHolder`,`telegramid`,`CreatedBy`,`OrgAdmin`) values (1,'Jeyaraj','jeyaraj_123@yahoo.com','02021982','2018-03-12 00:00:00',1,0,0,0,NULL,NULL,NULL);
insert  into `_tblUser`(`UserID`,`EmployeeName`,`EmailAddress`,`Password`,`CreatedOn`,`IsAdmin`,`IsTester`,`IsDeveloper`,`IsStakeHolder`,`telegramid`,`CreatedBy`,`OrgAdmin`) values (3,'Jayanthi','Jayanthi','123456',NULL,0,0,1,0,NULL,NULL,NULL);
insert  into `_tblUser`(`UserID`,`EmployeeName`,`EmailAddress`,`Password`,`CreatedOn`,`IsAdmin`,`IsTester`,`IsDeveloper`,`IsStakeHolder`,`telegramid`,`CreatedBy`,`OrgAdmin`) values (23,'Vickneswari ','vickneswari ','vickneswari ','2020-11-28 00:00:00',0,1,0,0,'',28,0);
insert  into `_tblUser`(`UserID`,`EmployeeName`,`EmailAddress`,`Password`,`CreatedOn`,`IsAdmin`,`IsTester`,`IsDeveloper`,`IsStakeHolder`,`telegramid`,`CreatedBy`,`OrgAdmin`) values (24,'tksd','maajidmultimart@gmail.com','tksd@786','2020-11-30 00:00:00',0,1,0,0,NULL,NULL,NULL);
insert  into `_tblUser`(`UserID`,`EmployeeName`,`EmailAddress`,`Password`,`CreatedOn`,`IsAdmin`,`IsTester`,`IsDeveloper`,`IsStakeHolder`,`telegramid`,`CreatedBy`,`OrgAdmin`) values (25,'Subbu','subbu@j2jsoftwaresolutio','subbu@2020','2020-11-30 00:00:00',0,0,1,0,NULL,NULL,NULL);
insert  into `_tblUser`(`UserID`,`EmployeeName`,`EmailAddress`,`Password`,`CreatedOn`,`IsAdmin`,`IsTester`,`IsDeveloper`,`IsStakeHolder`,`telegramid`,`CreatedBy`,`OrgAdmin`) values (28,'Raja','raja','raja','0000-00-00 00:00:00',0,1,0,0,'685405236',1,1);
insert  into `_tblUser`(`UserID`,`EmployeeName`,`EmailAddress`,`Password`,`CreatedOn`,`IsAdmin`,`IsTester`,`IsDeveloper`,`IsStakeHolder`,`telegramid`,`CreatedBy`,`OrgAdmin`) values (26,'Abdul','Abdul','Abdul','2020-11-30 00:00:00',0,1,0,0,NULL,28,0);
insert  into `_tblUser`(`UserID`,`EmployeeName`,`EmailAddress`,`Password`,`CreatedOn`,`IsAdmin`,`IsTester`,`IsDeveloper`,`IsStakeHolder`,`telegramid`,`CreatedBy`,`OrgAdmin`) values (27,'keju','keju','nagercoil123','2020-11-30 00:00:00',0,1,0,0,NULL,NULL,NULL);

/*Table structure for table `_tbltasklist` */

DROP TABLE IF EXISTS `_tbltasklist`;

CREATE TABLE `_tbltasklist` (
  `TaskID` int(11) NOT NULL AUTO_INCREMENT,
  `TaskPostedBy` int(11) DEFAULT NULL,
  `TaskPostedByName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `TaskCreatedOn` datetime DEFAULT NULL,
  `TaskAssignedTo` int(11) DEFAULT NULL,
  `TaskAssignedByName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `TaskAssignedOn` datetime DEFAULT NULL,
  `TaskStatus` int(11) DEFAULT NULL COMMENT '1-Open 2 Close',
  `ProjectID` int(11) DEFAULT NULL,
  `ProjectName` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `TaskTitle` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `TaskDescription` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `CompletedOn` date DEFAULT NULL,
  `CompletedByID` int(11) DEFAULT NULL,
  `CompletedByName` varchar(255) DEFAULT NULL,
  `EstimatedHours` varchar(255) DEFAULT NULL,
  `CompletedHours` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TaskID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `_tbltasklist` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
