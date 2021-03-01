/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - ecfast_hybrid
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ecfast_hybrid` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ecfast_hybrid`;

/*Table structure for table `_operators` */

DROP TABLE IF EXISTS `_operators`;

CREATE TABLE `_operators` (
  `opid` int(11) NOT NULL AUTO_INCREMENT,
  `operatorname` varchar(255) DEFAULT NULL,
  `optorder` int(11) DEFAULT NULL,
  `optgroup` int(11) DEFAULT NULL,
  `onoff` int(11) DEFAULT NULL,
  `lapucode` varchar(255) DEFAULT NULL,
  `j2jcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`opid`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `_operators` */

insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (1,'AIRTEL',1,1,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (3,'BSNL',3,1,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (5,'IDEA',5,1,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (8,'VODAFONE',8,1,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (10,'AIRTELDIGITALTV',10,2,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (11,'DISHTV',11,2,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (12,'RELIANCEBIGTV',12,2,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (13,'SUNDIRECT',13,2,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (14,'TATASKY',14,2,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (15,'VIDEOCOND2H',15,2,1,NULL,NULL);
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (50,'JIO',25,1,1,'JIO','401');
insert  into `_operators`(`opid`,`operatorname`,`optorder`,`optgroup`,`onoff`,`lapucode`,`j2jcode`) values (26,'BUS_TICKET_BOOKING',NULL,4,1,NULL,NULL);

/*Table structure for table `_tbltransaction` */

DROP TABLE IF EXISTS `_tbltransaction`;

CREATE TABLE `_tbltransaction` (
  `txnid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `txnon` datetime DEFAULT NULL,
  `rechargeno` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `rechargeamt` int(11) DEFAULT NULL,
  `operatorid` varchar(255) DEFAULT NULL,
  `apiresponse` varchar(255) DEFAULT NULL,
  `remarks` text,
  `oldbalance` varchar(255) DEFAULT NULL,
  `newbalance` varchar(255) DEFAULT NULL,
  `txnstatus` varchar(255) DEFAULT NULL,
  `apiurl` text,
  `revtxnid` varchar(255) DEFAULT '0',
  `creditamt` varchar(255) DEFAULT '0',
  `debitamt` varchar(255) DEFAULT '0',
  `usertxnid` varchar(255) DEFAULT ' ',
  `vtxnid` int(11) DEFAULT '0',
  `txnuserid` int(11) DEFAULT NULL,
  `txnusername` varchar(255) DEFAULT NULL,
  `callbackurl` varchar(255) DEFAULT NULL,
  `callbackresponse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`txnid`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

/*Data for the table `_tbltransaction` */

insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (3,2,'2020-01-18 15:31:41','BALANCEUPDATE','AIRTEL',10000,'Airtel','CREDIT From Admin','','0.00','10000','SUCCESS',' ',' ','10000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (5,9,'2020-02-29 16:14:13','9944872965','AIRTEL',10,'0','',' ','990000','989990','SUCCESS','apiurl','0','0','10','17',17,2,'admin@ggcash.in',NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (6,9,'2020-02-29 16:14:47','9944872965','AIRTEL',10,'0','',' ','990000','989990','SUCCESS','apiurl','0','0','10','18',18,2,'admin@ggcash.in',NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (7,9,'2020-02-29 16:18:23','9944872965','AIRTEL',10,'0','',' ','990000','989990','SUCCESS','apiurl','0','0','10','19',19,2,'admin@ggcash.in',NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (18,2,'2020-02-29 18:41:20','BALANCEUPDATE','BUS_TICKET_BOOKING',27500,'Bus Ticket','CREDIT From Admin','','0.00','27500','SUCCESS',' ',' ','27500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (19,2,'2020-02-29 18:42:12','BALANCEUPDATE','IDEA',28500,'Idea','CREDIT From Admin','','0.00','28500','SUCCESS',' ',' ','28500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (20,2,'2020-02-29 18:42:56','BALANCEUPDATE','AIRTEL',19000,'','CREDIT From Admin','Airtel','10000','29000','SUCCESS',' ',' ','19000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (21,2,'2020-02-29 18:48:42','BALANCEUPDATE','VODAFONE',19000,'','CREDIT From Admin','Vodafone','0.00','19000','SUCCESS',' ',' ','19000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (22,2,'2020-02-29 18:48:56','BALANCEUPDATE','AIRTELDIGITALTV',24500,'','CREDIT From Admin','','0.00','24500','SUCCESS',' ',' ','24500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (23,2,'2020-02-29 18:50:10','BALANCEUPDATE','DISHTV',27500,'','CREDIT From Admin','','0.00','27500','SUCCESS',' ',' ','27500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (24,2,'2020-02-29 18:50:20','BALANCEUPDATE','RELIANCEBIGTV',24500,'','CREDIT From Admin','','0.00','24500','SUCCESS',' ',' ','24500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (25,2,'2020-02-29 18:51:14','BALANCEUPDATE','SUNDIRECT',19500,'','CREDIT From Admin','','0.00','19500','SUCCESS',' ',' ','19500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (26,2,'2020-02-29 18:51:22','BALANCEUPDATE','TATASKY',14000,'','CREDIT From Admin','','0.00','14000','SUCCESS',' ',' ','14000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (27,2,'2020-02-29 18:51:30','BALANCEUPDATE','VIDEOCOND2H',25600,'','CREDIT From Admin','','0.00','25600','SUCCESS',' ',' ','25600','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (28,2,'2020-02-29 18:52:19','BALANCEUPDATE','JIO',10000,'','CREDIT From Admin','','0.00','10000','SUCCESS',' ',' ','10000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (29,2,'2020-02-29 18:52:39','BALANCEUPDATE','BSNL',10000,'','CREDIT From Admin','','0.00','10000','SUCCESS',' ',' ','10000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (30,2,'2020-02-29 19:14:26','9442461549','BSNL',100,'5384409244','{\"response\":{\"status\":\"SUCCESS\",\"transid\":\"604\",\"uid\":\"30\",\"txnid\":\"604\"}}',' ','10000','9900','SUCCESS','apiurl','0','0','100','42',42,2,'admin@ggcash.in',NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (31,2,'2020-05-18 14:40:09','BALANCEUPDATE','BUS_TICKET_BOOKING',-5000,'','CREDIT From Admin','','27500','22500','SUCCESS',' ',' ','-5000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (32,2,'2020-05-18 14:40:44','BALANCEUPDATE','BUS_TICKET_BOOKING',47000,'','CREDIT From Admin','','22500','69500','SUCCESS',' ',' ','47000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (33,2,'2020-05-18 14:41:04','BALANCEUPDATE','AIRTEL',-19000,'','CREDIT From Admin','','29000','10000','SUCCESS',' ',' ','-19000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (34,2,'2020-05-18 14:41:16','BALANCEUPDATE','BUS_TICKET_BOOKING',-8500,'','CREDIT From Admin','','69500','61000','SUCCESS',' ',' ','-8500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (35,2,'2020-05-18 14:42:13','BALANCEUPDATE','IDEA',-18500,'','CREDIT From Admin','','28500','10000','SUCCESS',' ',' ','-18500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (36,2,'2020-05-18 14:42:35','BALANCEUPDATE','AIRTELDIGITALTV',-14500,'','CREDIT From Admin','','24500','10000','SUCCESS',' ',' ','-14500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (37,2,'2020-05-18 14:43:14','BALANCEUPDATE','RELIANCEBIGTV',-14500,'','CREDIT From Admin','','24500','10000','SUCCESS',' ',' ','-14500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (38,2,'2020-05-18 14:44:33','BALANCEUPDATE','DISHTV',17500,'','CREDIT From Admin','','27500','45000','SUCCESS',' ',' ','17500','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (39,2,'2020-05-18 14:44:57','BALANCEUPDATE','DISHTV',-35000,'','CREDIT From Admin','','45000','10000','SUCCESS',' ',' ','-35000','0',NULL,0,NULL,NULL,NULL,NULL);
insert  into `_tbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`vtxnid`,`txnuserid`,`txnusername`,`callbackurl`,`callbackresponse`) values (40,2,'2020-05-18 14:46:22','BALANCEUPDATE','SUNDIRECT',-9500,'','CREDIT From Admin','','19500','10000','SUCCESS',' ',' ','-9500','0',NULL,0,NULL,NULL,NULL,NULL);

/*Table structure for table `_users` */

DROP TABLE IF EXISTS `_users`;

CREATE TABLE `_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `customername` varchar(255) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isuser` int(11) DEFAULT '0',
  `isreseller` int(11) DEFAULT '0',
  `isadmin` int(11) DEFAULT '0',
  `isunder` int(11) DEFAULT '0',
  `balance` int(11) DEFAULT '1' COMMENT '0 for normal, 1 for virutal',
  `phoneno` varchar(255) DEFAULT NULL,
  `domainname` varchar(255) DEFAULT NULL,
  `reverseurl` varchar(255) DEFAULT NULL,
  `isactive` int(11) DEFAULT '1',
  `isapiblock` int(11) DEFAULT '0',
  `j2japiusername` varchar(255) DEFAULT NULL,
  `j2japipassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `_users` */

insert  into `_users`(`userid`,`customername`,`emailid`,`password`,`isuser`,`isreseller`,`isadmin`,`isunder`,`balance`,`phoneno`,`domainname`,`reverseurl`,`isactive`,`isapiblock`,`j2japiusername`,`j2japipassword`) values (2,'ggcash','admin@ggcash.in','123456',1,0,0,9,0,NULL,'ecfast.in',NULL,1,0,'be79b5b9481eeee8b9018cd63716f228ac6f148a','32ab562e5f95fa0e1cecfa565bb4de8ed637e4af');
insert  into `_users`(`userid`,`customername`,`emailid`,`password`,`isuser`,`isreseller`,`isadmin`,`isunder`,`balance`,`phoneno`,`domainname`,`reverseurl`,`isactive`,`isapiblock`,`j2japiusername`,`j2japipassword`) values (1,NULL,'raja@admin.com2','raja@admin',0,0,1,0,0,NULL,NULL,NULL,1,0,NULL,NULL);
insert  into `_users`(`userid`,`customername`,`emailid`,`password`,`isuser`,`isreseller`,`isadmin`,`isunder`,`balance`,`phoneno`,`domainname`,`reverseurl`,`isactive`,`isapiblock`,`j2japiusername`,`j2japipassword`) values (3,'tnbills.com','tnbills24x7@gmail.com','bill@24',1,0,0,2,1,'9789400716','hybrid.tnbills.com','http://www.tnbills.com/updatetxn.php',1,0,NULL,NULL);
insert  into `_users`(`userid`,`customername`,`emailid`,`password`,`isuser`,`isreseller`,`isadmin`,`isunder`,`balance`,`phoneno`,`domainname`,`reverseurl`,`isactive`,`isapiblock`,`j2japiusername`,`j2japipassword`) values (4,'','maajidmultimart','123123',1,0,0,2,1,NULL,NULL,'http://maajidmultimart.maajidmultimart.com/updatetxn.php',1,0,NULL,NULL);
insert  into `_users`(`userid`,`customername`,`emailid`,`password`,`isuser`,`isreseller`,`isadmin`,`isunder`,`balance`,`phoneno`,`domainname`,`reverseurl`,`isactive`,`isapiblock`,`j2japiusername`,`j2japipassword`) values (5,'sanatell.in','sanamovies2015@gmail.com','vls@india',1,0,0,2,1,'7200041122','hybrid.sanatell.in','http://www.sanatell.in/updatetxn.php',1,1,NULL,NULL);
insert  into `_users`(`userid`,`customername`,`emailid`,`password`,`isuser`,`isreseller`,`isadmin`,`isunder`,`balance`,`phoneno`,`domainname`,`reverseurl`,`isactive`,`isapiblock`,`j2japiusername`,`j2japipassword`) values (6,'akbarmobile.com','akbaralisg@yahoo.com','z2a@tn',1,0,0,1,0,NULL,'hybrid.onlinej2j.com','http://www.akbarmobile.com/updatetxn.php',1,0,'23e86ece8323d92223c20c4a0a573f69962433e4','411e8c9fc4e0483130aff506b658528f5944780e');
insert  into `_users`(`userid`,`customername`,`emailid`,`password`,`isuser`,`isreseller`,`isadmin`,`isunder`,`balance`,`phoneno`,`domainname`,`reverseurl`,`isactive`,`isapiblock`,`j2japiusername`,`j2japipassword`) values (7,'ashok','grashok6@gmail.com','vls@india',1,0,0,2,1,'9626544516','hybrid.alldthrecharge.com','http://www.alldthrecharge.com/updatetxn.php',1,0,NULL,NULL);
insert  into `_users`(`userid`,`customername`,`emailid`,`password`,`isuser`,`isreseller`,`isadmin`,`isunder`,`balance`,`phoneno`,`domainname`,`reverseurl`,`isactive`,`isapiblock`,`j2japiusername`,`j2japipassword`) values (9,'raja','raja@admin.com','raja@admin',0,1,0,1,1,NULL,'ecfast.in',NULL,1,0,NULL,NULL);

/*Table structure for table `_virtualtbltransaction` */

DROP TABLE IF EXISTS `_virtualtbltransaction`;

CREATE TABLE `_virtualtbltransaction` (
  `txnid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `txnon` datetime NOT NULL,
  `rechargeno` varchar(255) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `rechargeamt` int(11) NOT NULL,
  `operatorid` varchar(255) NOT NULL,
  `apiresponse` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `oldbalance` varchar(255) DEFAULT NULL,
  `newbalance` varchar(255) DEFAULT NULL,
  `txnstatus` varchar(255) DEFAULT NULL,
  `apiurl` text,
  `revtxnid` varchar(255) DEFAULT '0',
  `creditamt` varchar(255) DEFAULT '0',
  `debitamt` varchar(255) DEFAULT '0',
  `usertxnid` varchar(255) DEFAULT ' ',
  `callbackurl` varchar(255) DEFAULT NULL,
  `callbackresponse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`txnid`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

/*Data for the table `_virtualtbltransaction` */

insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (1,9,'2020-01-15 00:00:00','1','AIRTEL',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (2,9,'2020-01-15 00:00:00','1','BSNL',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (3,9,'2020-01-15 00:00:00','1','IDEA',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (4,9,'2020-01-15 00:00:00','1','VODAFONE',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (5,9,'2020-01-15 00:00:00','1','JIO',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (6,9,'2020-01-15 00:00:00','1','AIRTELDIGITALTV',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (7,9,'2020-01-15 00:00:00','1','DISHTV',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (8,9,'2020-01-15 00:00:00','1','RELIANCEBIGTV',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (9,9,'2020-01-15 00:00:00','1','SUNDIRECT',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (10,9,'2020-01-15 00:00:00','1','TATASKY',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (11,9,'2020-01-15 00:00:00','1','VIDEOCOND2H',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (12,9,'2020-01-15 00:00:00','1','BUS_TICKET_BOOKING',1000000,'1','1',' ','0','1000000','SUCCESS',NULL,'0','1000000','0',' ',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (15,9,'2020-01-18 15:31:41','BALANCEUPDATE','AIRTEL',10000,'Airtel','CREDIT To admin@ggcash.in','','12000000','11990000','SUCCESS',' ',' ','0','10000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (16,2,'2020-02-29 16:12:09','9944872965','AIRTEL',10,'0','',' ','10000','9990','SUCCESS','apiurl','0','0','10','9',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (17,2,'2020-02-29 16:14:13','9944872965','AIRTEL',10,'0','',' ','10000','9990','SUCCESS','apiurl','0','0','10','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (18,2,'2020-02-29 16:14:47','9944872965','AIRTEL',10,'0','',' ','10000','9990','SUCCESS','apiurl','0','0','10','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (19,2,'2020-02-29 16:18:23','9944872965','AIRTEL',10,'0','',' ','10000','9990','SUCCESS','apiurl','0','0','10','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (20,2,'2020-02-29 16:18:32','9944872965','AIRTEL',10,'0','',' ','10000','9990','SUCCESS','apiurl','0','0','10','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (21,2,'2020-02-29 16:18:47','9944872965','AIRTEL',10,'0','',' ','10000','9990','SUCCESS','apiurl','0','0','10','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (22,2,'2020-02-29 16:20:03','9944872965','AIRTEL',10,'0','',' ','10000','9990','SUCCESS','apiurl','0','0','10','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (23,2,'2020-02-29 16:20:08','9944872965','AIRTEL',10,'0','',' ','10000','9990','SUCCESS','apiurl','0','0','10','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (24,2,'2020-02-29 16:22:32','9944872965','AIRTEL',10,'0','{\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}',' ','10000','10000','FAILURE','apiurl','0','0','0','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (25,2,'2020-02-29 16:23:02','9944872965','AIRTEL',10,'0','{\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}',' ','10000','10000','FAILURE','apiurl','0','0','0','10',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (26,2,'2020-02-29 16:23:07','9944872965','AIRTEL',10,'0','{\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}',' ','10000','10000','FAILURE','apiurl','0','0','0','11',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (27,2,'2020-02-29 16:25:02','9944872965','AIRTEL',10,'0','{\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}',' ','10000','10000','FAILURE','apiurl','0','0','0','12',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (28,2,'2020-02-29 16:27:27','9944872965','AIRTEL',10,'0','{\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}',' ','10000','10000','FAILURE','apiurl','0','0','0','13',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (29,2,'2020-02-29 16:28:23','9944872965','AIRTEL',10,'0','{\"response\":{\"status\":\"FAILURE\",\"error\":\"Invalid login\"}}',' ','10000','10000','FAILURE','apiurl','0','0','0','14',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (30,9,'2020-02-29 18:41:20','BALANCEUPDATE','BUS_TICKET_BOOKING',27500,'Bus Ticket','CREDIT To admin@ggcash.in','','11990000','11962500','SUCCESS',' ',' ','0','27500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (31,9,'2020-02-29 18:42:12','BALANCEUPDATE','IDEA',28500,'Idea','CREDIT To admin@ggcash.in','','11962500','11934000','SUCCESS',' ',' ','0','28500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (32,9,'2020-02-29 18:42:56','BALANCEUPDATE','AIRTEL',19000,'','CREDIT To admin@ggcash.in','Airtel','11934000','11915000','SUCCESS',' ',' ','0','19000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (33,9,'2020-02-29 18:48:42','BALANCEUPDATE','VODAFONE',19000,'','CREDIT To admin@ggcash.in','Vodafone','11915000','11896000','SUCCESS',' ',' ','0','19000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (34,9,'2020-02-29 18:48:56','BALANCEUPDATE','AIRTELDIGITALTV',24500,'','CREDIT To admin@ggcash.in','','11896000','11871500','SUCCESS',' ',' ','0','24500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (35,9,'2020-02-29 18:50:10','BALANCEUPDATE','DISHTV',27500,'','CREDIT To admin@ggcash.in','','11871500','11844000','SUCCESS',' ',' ','0','27500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (36,9,'2020-02-29 18:50:20','BALANCEUPDATE','RELIANCEBIGTV',24500,'','CREDIT To admin@ggcash.in','','11844000','11819500','SUCCESS',' ',' ','0','24500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (37,9,'2020-02-29 18:51:14','BALANCEUPDATE','SUNDIRECT',19500,'','CREDIT To admin@ggcash.in','','11819500','11800000','SUCCESS',' ',' ','0','19500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (38,9,'2020-02-29 18:51:22','BALANCEUPDATE','TATASKY',14000,'','CREDIT To admin@ggcash.in','','11800000','11786000','SUCCESS',' ',' ','0','14000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (39,9,'2020-02-29 18:51:30','BALANCEUPDATE','VIDEOCOND2H',25600,'','CREDIT To admin@ggcash.in','','11786000','11760400','SUCCESS',' ',' ','0','25600',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (40,9,'2020-02-29 18:52:19','BALANCEUPDATE','JIO',10000,'','CREDIT To admin@ggcash.in','','11760400','11750400','SUCCESS',' ',' ','0','10000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (41,9,'2020-02-29 18:52:39','BALANCEUPDATE','BSNL',10000,'','CREDIT To admin@ggcash.in','','11750400','11740400','SUCCESS',' ',' ','0','10000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (42,2,'2020-02-29 19:14:26','9442461549','BSNL',100,'0','{\"response\":{\"status\":\"SUCCESS\",\"transid\":\"604\",\"uid\":\"30\",\"txnid\":\"604\"}}',' ','10000','9900','SUCCESS','apiurl','0','0','100','17',NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (43,9,'2020-05-18 14:40:09','BALANCEUPDATE','BUS_TICKET_BOOKING',-5000,'','CREDIT To admin@ggcash.in','','11740400','11745400','SUCCESS',' ',' ','0','-5000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (44,9,'2020-05-18 14:40:44','BALANCEUPDATE','BUS_TICKET_BOOKING',47000,'','CREDIT To admin@ggcash.in','','11745400','11698400','SUCCESS',' ',' ','0','47000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (45,9,'2020-05-18 14:41:04','BALANCEUPDATE','AIRTEL',-19000,'','CREDIT To admin@ggcash.in','','11698400','11717400','SUCCESS',' ',' ','0','-19000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (46,9,'2020-05-18 14:41:16','BALANCEUPDATE','BUS_TICKET_BOOKING',-8500,'','CREDIT To admin@ggcash.in','','11717400','11725900','SUCCESS',' ',' ','0','-8500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (47,9,'2020-05-18 14:42:13','BALANCEUPDATE','IDEA',-18500,'','CREDIT To admin@ggcash.in','','11725900','11744400','SUCCESS',' ',' ','0','-18500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (48,9,'2020-05-18 14:42:35','BALANCEUPDATE','AIRTELDIGITALTV',-14500,'','CREDIT To admin@ggcash.in','','11744400','11758900','SUCCESS',' ',' ','0','-14500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (49,9,'2020-05-18 14:43:14','BALANCEUPDATE','RELIANCEBIGTV',-14500,'','CREDIT To admin@ggcash.in','','11758900','11773400','SUCCESS',' ',' ','0','-14500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (50,9,'2020-05-18 14:44:33','BALANCEUPDATE','DISHTV',17500,'','CREDIT To admin@ggcash.in','','11773400','11755900','SUCCESS',' ',' ','0','17500',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (51,9,'2020-05-18 14:44:57','BALANCEUPDATE','DISHTV',-35000,'','CREDIT To admin@ggcash.in','','11755900','11790900','SUCCESS',' ',' ','0','-35000',NULL,NULL,NULL);
insert  into `_virtualtbltransaction`(`txnid`,`userid`,`txnon`,`rechargeno`,`operator`,`rechargeamt`,`operatorid`,`apiresponse`,`remarks`,`oldbalance`,`newbalance`,`txnstatus`,`apiurl`,`revtxnid`,`creditamt`,`debitamt`,`usertxnid`,`callbackurl`,`callbackresponse`) values (52,9,'2020-05-18 14:46:22','BALANCEUPDATE','SUNDIRECT',-9500,'','CREDIT To admin@ggcash.in','','11790900','11800400','SUCCESS',' ',' ','0','-9500',NULL,NULL,NULL);

/*Table structure for table `_walletupdaterequest` */

DROP TABLE IF EXISTS `_walletupdaterequest`;

CREATE TABLE `_walletupdaterequest` (
  `requestid` int(11) NOT NULL AUTO_INCREMENT,
  `requestedon` datetime DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `dateofpayment` date DEFAULT NULL,
  `opid` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `bankrefno` varchar(255) DEFAULT NULL,
  `approvedon` datetime DEFAULT NULL,
  `rejectedon` datetime DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `txnid` int(11) DEFAULT NULL,
  `credited` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`requestid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `_walletupdaterequest` */

insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (1,'2020-01-15 07:48:40',9,'2020-01-15',1,'1000000','','2020-01-15 00:00:00',NULL,'1000000',1,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (2,'2020-01-15 07:48:50',9,'2020-01-15',3,'1000000','','2020-01-15 00:00:00',NULL,'1000000',2,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (3,'2020-01-15 07:49:39',9,'2020-01-15',5,'1000000','','2020-01-15 00:00:00',NULL,'1000000',3,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (4,'2020-01-15 07:49:51',9,'2020-01-15',8,'1000000','','2020-01-15 00:00:00',NULL,'1000000',4,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (5,'2020-01-15 07:50:16',9,'2020-01-15',10,'1000000','','2020-01-15 00:00:00',NULL,'1000000',5,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (6,'2020-01-15 07:50:27',9,'2020-01-15',11,'1000000','','2020-01-15 00:00:00',NULL,'1000000',6,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (7,'2020-01-15 07:50:32',9,'2020-01-15',12,'1000000','','2020-01-15 00:00:00',NULL,'1000000',7,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (8,'2020-01-15 07:50:37',9,'2020-01-15',13,'1000000','','2020-01-15 00:00:00',NULL,'1000000',8,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (9,'2020-01-15 07:50:47',9,'2020-01-15',14,'1000000','','2020-01-15 00:00:00',NULL,'1000000',9,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (10,'2020-01-15 07:50:55',9,'2020-01-15',15,'1000000','','2020-01-15 00:00:00',NULL,'1000000',10,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (11,'2020-01-15 07:51:07',9,'2020-01-15',50,'1000000','','2020-01-15 00:00:00',NULL,'1000000',11,'1000000');
insert  into `_walletupdaterequest`(`requestid`,`requestedon`,`userid`,`dateofpayment`,`opid`,`amount`,`bankrefno`,`approvedon`,`rejectedon`,`balance`,`txnid`,`credited`) values (14,'2020-01-15 07:52:37',9,'2020-01-15',26,'1000000','','2020-01-15 00:00:00',NULL,'1000000',12,'1000000');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
