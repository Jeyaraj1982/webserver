/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.34 : Database - bestover_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bestover_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bestover_database`;

/*Table structure for table `_tbl_admin` */

DROP TABLE IF EXISTS `_tbl_admin`;

CREATE TABLE `_tbl_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_admin` */

insert  into `_tbl_admin`(`AdminID`,`AdminName`,`UserName`,`Password`,`CreatedOn`) values (2,'admin@admin.com','admin@admin.com','123456',NULL);

/*Table structure for table `_tbl_joboffers` */

DROP TABLE IF EXISTS `_tbl_joboffers`;

CREATE TABLE `_tbl_joboffers` (
  `JobOfferID` int(11) NOT NULL AUTO_INCREMENT,
  `JobOfferImage` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`JobOfferID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_joboffers` */

insert  into `_tbl_joboffers`(`JobOfferID`,`JobOfferImage`,`AddedOn`) values (9,'WhatsApp Image 2021-04-20 at 11.00.28 AM.jpeg','2021-04-20 12:36:17');

/*Table structure for table `_tbl_lookingfor_jobs` */

DROP TABLE IF EXISTS `_tbl_lookingfor_jobs`;

CREATE TABLE `_tbl_lookingfor_jobs` (
  `LookingForJobID` int(11) NOT NULL AUTO_INCREMENT,
  `CandidateName` varchar(255) DEFAULT NULL,
  `TelNumber` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `JobPosition1` varchar(255) DEFAULT NULL,
  `JobPosition2` varchar(255) DEFAULT NULL,
  `InterestedCountry1` varchar(255) DEFAULT NULL,
  `InterestedCountry2` varchar(255) DEFAULT NULL,
  `CVFile` varchar(255) DEFAULT NULL,
  `SubmittedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`LookingForJobID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_lookingfor_jobs` */

insert  into `_tbl_lookingfor_jobs`(`LookingForJobID`,`CandidateName`,`TelNumber`,`Email`,`JobPosition1`,`JobPosition2`,`InterestedCountry1`,`InterestedCountry2`,`CVFile`,`SubmittedOn`) values (1,'sfhsafh','fshsfah','ashfsajh','asfhafsj','ajdj','jajafjd','ajjdjdajdj','1618915271_WhatsApp Image 2021-04-20 at 11.00.28 AM.jpeg','2021-04-20 16:11:11');

/*Table structure for table `_tbl_seeking_staffs` */

DROP TABLE IF EXISTS `_tbl_seeking_staffs`;

CREATE TABLE `_tbl_seeking_staffs` (
  `SeekingStaffID` int(11) NOT NULL AUTO_INCREMENT,
  `EmployerName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `RequiredPosition` varchar(255) DEFAULT NULL,
  `RequiredNumbers` varchar(255) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL,
  `SubmittedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SeekingStaffID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_seeking_staffs` */

insert  into `_tbl_seeking_staffs`(`SeekingStaffID`,`EmployerName`,`Email`,`RequiredPosition`,`RequiredNumbers`,`Message`,`SubmittedOn`) values (1,'shsafh','sfhsfh','sfahsfah','fshsah','sahsfah','2021-04-20 12:52:09'),(2,'shsafh','sfhsfh','sfahsfah','fshsah','sahsfah','2021-04-20 12:52:40'),(3,'shsafh','sfhsfh','sfahsfah','fshsah','sahsfah','2021-04-20 12:53:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
