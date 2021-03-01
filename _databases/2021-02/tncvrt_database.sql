/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - tncvrt_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tncvrt_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tncvrt_database`;

/*Table structure for table `_tblHistory` */

DROP TABLE IF EXISTS `_tblHistory`;

CREATE TABLE `_tblHistory` (
  `HistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `RegisterNumber` varchar(255) DEFAULT NULL,
  `ViewedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`HistoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `_tblHistory` */

insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (1,'2018507','2019-11-06 11:59:50');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (2,'2018503','2019-11-06 12:10:16');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (3,'2018505','2019-11-07 10:58:09');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (4,'2018505','2019-11-07 10:58:39');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (5,'2018505 ','2019-11-07 11:46:30');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (6,'2018505','2019-11-07 12:58:59');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (7,'2018503','2019-11-18 10:00:47');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (8,'2018503','2019-11-18 11:15:26');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (9,'2018503','2019-11-18 11:16:44');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (10,'2018503','2019-11-18 11:29:08');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (11,'2018508','2019-11-18 12:12:05');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (12,'2018508','2019-11-18 12:14:22');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (13,'2018503','2019-11-18 18:24:44');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (14,'2018505','2019-11-20 09:44:37');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (15,'2018525','2019-11-20 13:53:34');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (16,'2018526','2019-11-20 13:54:34');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (17,'2018508','2019-11-21 09:05:29');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (18,'2018508','2019-11-21 12:14:39');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (19,'2018508','2019-11-21 13:13:17');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (20,'2018505','2019-11-30 11:34:38');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (21,'2018507','2019-12-06 14:50:36');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (22,'2018507','2019-12-06 14:54:32');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (23,'2018505','2019-12-09 13:24:47');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (24,'2018527','2019-12-17 14:47:41');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (25,'2018527','2019-12-17 14:58:56');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (26,'2018527','2019-12-17 15:02:28');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (27,'2018527','2019-12-17 15:02:50');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (28,'2018527','2019-12-17 15:06:07');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (29,'2018527','2019-12-17 19:24:35');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (30,'2018527','2019-12-17 19:24:40');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (31,'2018527','2019-12-17 19:24:57');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (32,'2018527','2019-12-17 19:24:59');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (33,'2018527','2019-12-17 19:25:01');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (34,'2018527','2019-12-17 19:25:57');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (35,'2018505','2019-12-25 11:42:37');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (36,'2018505','2019-12-25 11:44:49');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (37,'2018505','2020-01-06 17:05:00');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (38,'2018505','2020-02-17 12:57:24');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (39,'2018505','2020-11-07 15:24:18');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (40,'2018505','2020-11-07 15:25:43');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (41,'2018505','2020-11-07 15:33:23');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (42,'2018505','2020-11-07 15:34:01');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (43,'2018505','2020-11-07 15:35:06');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (44,'2018505','2020-11-07 15:35:40');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (45,'2018505','2020-11-07 15:47:54');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (46,'2018505','2020-11-07 15:51:00');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (47,'2018527','2020-11-20 16:20:08');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (48,'2018527','2020-11-20 16:22:26');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (49,'2018527','2020-11-20 16:24:17');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (50,'2018505','2020-12-25 03:00:01');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (51,'2018505','2020-12-25 03:01:18');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (52,'2018501','2020-12-28 13:03:35');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (53,'2018505','2020-12-28 13:06:07');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (54,'2014606','2021-01-11 11:40:14');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (55,'2014606','2021-01-11 11:48:57');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (56,'2014606','2021-01-11 16:55:03');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (57,'2018527','2021-01-12 22:00:15');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (58,'2018527','2021-01-12 22:01:53');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (59,'2014606','2021-01-13 15:58:39');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (60,'2O13522','2021-01-19 18:25:22');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (61,'2014606','2021-01-20 11:57:16');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (62,'2013522','2021-01-21 10:22:19');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (63,'2013522','2021-01-21 10:22:37');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (64,'2013522','2021-01-21 10:23:26');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (65,'2015607','2021-01-21 10:25:20');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (66,'2015607','2021-01-21 10:25:38');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (67,'2015607','2021-01-21 10:27:24');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (68,'2013522','2021-01-21 10:28:08');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (69,'2015607','2021-01-21 10:28:59');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (70,'2015607','2021-01-21 10:58:43');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (71,'2013522','2021-01-21 12:08:23');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (72,'2013522','2021-01-21 12:38:31');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (73,'2015607','2021-01-21 13:09:57');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (74,'2013522','2021-01-21 13:11:35');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (75,'2013522','2021-01-21 18:56:20');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (76,'2015607','2021-01-21 19:00:37');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (77,'2015607','2021-02-09 16:04:05');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (78,'2018505','2021-02-17 00:25:57');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (79,'2018505','2021-02-17 00:30:02');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (80,'2018505','2021-02-17 00:32:40');
insert  into `_tblHistory`(`HistoryID`,`RegisterNumber`,`ViewedOn`) values (81,'2018505','2021-02-17 00:34:15');

/*Table structure for table `_tbl_upload_certificates` */

DROP TABLE IF EXISTS `_tbl_upload_certificates`;

CREATE TABLE `_tbl_upload_certificates` (
  `StudentID` int(11) NOT NULL AUTO_INCREMENT,
  `RegisterNumber` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `DateOfBirth` varchar(255) DEFAULT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`StudentID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_upload_certificates` */

insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (9,'2018502','SANTHOSG A','2001-03-25','1573021739SANTHOSG A.pdf','2019-11-06 11:58:59');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (2,'2018507','AMSAVELU. S','2002-05-17','1573020275AMSAVELU S.pdf','2019-11-06 11:34:35');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (3,'2018508','BARATH R','2002-06-04','1573020449BARATH R.pdf','2019-11-06 11:37:29');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (4,'2018501','JEPPIYAR M','2000-09-10','1573020675JEPPIYAR M.pdf','2019-11-06 11:41:15');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (5,'2018506','KALAIYARASAN S','2001-02-03','1573020889KALAIYARASAN S.pdf','2019-11-06 11:44:49');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (6,'2018504','KRISHNAVENI V','1999-07-05','1573021033KRISHNAVENI V.pdf','2019-11-06 11:47:13');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (7,'2018510','MANIKANDAN E','1997-03-29','1573021312MANIKANDAN E.pdf','2019-11-06 11:51:52');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (8,'2018505','RAMKUMAR. S','2002-02-10','1573021535RAMKUMAR. S.pdf','2019-11-06 11:55:35');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (10,'2018503','VIJAYALAKSHMI V','2000-05-26','1573021764VIJAYALAKSHMI V.pdf','2019-11-06 11:59:24');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (11,'2018509','SURIYA K','2001-06-12','1573021778SURIYA K.pdf','2019-11-06 11:59:38');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (12,'2018525','Latha P','1985-05-15','1574230295latha P.pdf','2019-11-20 11:41:35');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (13,'2018526','Sarala R','1982-07-10','1574230571sarala R.pdf','2019-11-20 11:46:11');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (15,'2018527','Iyappan P','1989-05-21','1576573964IYAPPANP.pdf','2019-12-17 14:42:44');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (17,'2013522','ALVIRA ISLAM A','1982-07-08','1610335320_ALVIRAISLAMA.pdf','2021-01-10 19:22:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (18,'2015607','ALVIRA ISLAM A','1982-07-08','ALVIRA_TRAVEL_TOURS.pdf','2021-01-10 19:23:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (19,'2O18524','ARUNA E','2003-05-06','1610335440_ARUNA.pdf','2021-01-10 19:24:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (20,'2O18572','ASLAM R','1998-05-12','1610335500_ASLAM.pdf','2021-01-10 19:25:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (21,'2018511','GABRIEL ALBERT M','2003-05-26','1610335560_GABRIL_ALBERT.pdf','2021-01-10 19:26:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (22,'2018521','KALAISOORIYAN G','2000-08-04','1610335620_KALISOORIYAN.pdf','2021-01-10 19:27:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (23,'2014606','MURUGAN G','1989-01-19','1610335680_MURUGAN_G.pdf','2021-01-10 19:28:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (24,'2018516','POOVARASAN C','2003-04-02','1610335740_POOVARASAN.pdf','2021-01-10 19:29:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (25,'2018512','SANTHOSH KUMAR S','1993-03-23','1610335800_SANTOSKUMAR.pdf','2021-01-10 19:30:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (26,'2018520','THENNARASU C','2001-07-07','1610335860_THENNARASU.pdf','2021-01-10 19:31:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (27,'2018519','VIGNESH M','2001-04-04','1610335920_VIGNESAH.pdf','2021-01-10 19:32:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (28,'2018514','VIKRAM R','2003-03-27','1610335980_VIKRAM.pdf','2021-01-10 19:33:00');
insert  into `_tbl_upload_certificates`(`StudentID`,`RegisterNumber`,`Name`,`DateOfBirth`,`FileName`,`AddedOn`) values (29,'2018600','TAMIL SELVAN S','1996-05-08','1610336040_TAMIL_SELVAN_S.pdf','2021-01-10 19:34:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
