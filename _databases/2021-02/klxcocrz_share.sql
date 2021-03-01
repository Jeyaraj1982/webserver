/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.23-23 : Database - klxcocrz_share
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klxcocrz_share` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `klxcocrz_share`;

/*Table structure for table `_tbl_resume_admin` */

DROP TABLE IF EXISTS `_tbl_resume_admin`;

CREATE TABLE `_tbl_resume_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_admin` */

insert  into `_tbl_resume_admin`(`AdminID`,`AdminName`,`UserName`,`Password`,`CreatedOn`) values (1,'DemoAdmin','admin@resume.com','123456',NULL);

/*Table structure for table `_tbl_resume_education` */

DROP TABLE IF EXISTS `_tbl_resume_education`;

CREATE TABLE `_tbl_resume_education` (
  `EducationID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `AcademicYear` varchar(255) DEFAULT NULL,
  `Course` varchar(255) DEFAULT NULL,
  `Institute` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`EducationID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_education` */

insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Institute`,`Description`,`CreatedOn`) values (6,3,'2015-2018','ece','gptc','aaaaaaa','2020-09-18 10:29:01');
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Institute`,`Description`,`CreatedOn`) values (7,4,'2020-2021','SSLC','ss','','2020-09-18 11:10:35');

/*Table structure for table `_tbl_resume_experience` */

DROP TABLE IF EXISTS `_tbl_resume_experience`;

CREATE TABLE `_tbl_resume_experience` (
  `ExperienceID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `Year` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `NameofCompany` varchar(255) DEFAULT NULL,
  `WorkingPlace` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ExperienceID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_experience` */

insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`Year`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`) values (4,3,'2018-2020',NULL,'job',NULL,'jjjjjjj','kkkk','2020-09-18 10:29:26');
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`Year`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`) values (5,4,'5',NULL,'To',NULL,'NAgercoiol','','2020-09-18 11:13:11');
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`Year`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`) values (6,4,'2020-2023','desssssss','jobbbb tttttt','aaaaaaaaaaaaa','bbbbbbbbb','jobb dessscccc','2020-09-18 11:43:14');

/*Table structure for table `_tbl_resume_general_info` */

DROP TABLE IF EXISTS `_tbl_resume_general_info`;

CREATE TABLE `_tbl_resume_general_info` (
  `ResumeID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `WhatsappNumber` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `WebsiteName` varchar(255) DEFAULT NULL,
  `Proffession` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) DEFAULT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `AddressLine3` varchar(255) DEFAULT NULL,
  `ProfilePhoto` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` varchar(255) DEFAULT NULL,
  `Profession` varchar(255) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ResumeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_general_info` */

insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`CreatedOn`,`Profession`,`Website`) values (3,'Jeyaraj. S','9944872965','9944872965','sales@j2jsoftwaresolutions.com',NULL,NULL,'Ozhinasery,','Nagercoil,','Tamilnadu','grocery.jpg','demo resume','2020-09-18 10:25:56','Software Engineer','J2JSoftwareSolutions.com');
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`CreatedOn`,`Profession`,`Website`) values (4,'Jeyaraj','9944872965',NULL,'jeyaraj_123@yahoo.com',NULL,NULL,'Nagercoil','Nagercoil','Nagercoil','grocery.jpg','Short Description','2020-09-18 11:09:05',NULL,NULL);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`CreatedOn`,`Profession`,`Website`) values (5,'Demo','9000000000','9111111111','demo@gmail.com','testwebsiteyyyyy','Data Entryyyyy','ngl','kk','tn','index.jpg','zddf','2020-09-21 14:20:24',NULL,NULL);

/*Table structure for table `_tbl_resume_hobbies` */

DROP TABLE IF EXISTS `_tbl_resume_hobbies`;

CREATE TABLE `_tbl_resume_hobbies` (
  `HobbiesID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`HobbiesID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_hobbies` */

insert  into `_tbl_resume_hobbies`(`HobbiesID`,`ResumeID`,`Title`,`Description`,`CreatedOn`) values (1,3,'hobbiees one','aaaaaaaaaaaa','2020-09-18 10:42:29');

/*Table structure for table `_tbl_resume_skills` */

DROP TABLE IF EXISTS `_tbl_resume_skills`;

CREATE TABLE `_tbl_resume_skills` (
  `SkillsID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SkillsID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_skills` */

insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`Description`,`CreatedOn`) values (1,3,'skills oneeeeeeeeeeeeeee','skillllsss oneeeee','2020-09-18 10:28:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
