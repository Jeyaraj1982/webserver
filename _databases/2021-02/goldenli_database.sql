/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - goldenli_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`goldenli_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `goldenli_database`;

/*Table structure for table `_tbl_Log_MobileSMS` */

DROP TABLE IF EXISTS `_tbl_Log_MobileSMS`;

CREATE TABLE `_tbl_Log_MobileSMS` (
  `SMSID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `Membercode` varchar(255) DEFAULT NULL,
  `SmsTo` varchar(255) DEFAULT NULL,
  `Message` text,
  `MessagedOn` datetime DEFAULT NULL,
  `APIResponse` text,
  `url` text,
  PRIMARY KEY (`SMSID`)
) ENGINE=InnoDB AUTO_INCREMENT=590 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_Log_MobileSMS` */

insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (553,1297,'1H100002000030001','9944872965','Dear Product, Your account has been created. Login Details: Member Code: 1H100002000030001, Password=123123, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-01-08 13:41:37','{\"response\":{\"status\":\"SUCCESS\",\"transid\":\"S.197785 S.294617 \"}}','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9944872965&message=Dear+Product%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+1H100002000030001%2C+Password%3D123123%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=553');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (554,1298,'5H100002000030146','8675826276','Dear P.MANIKAM, Your account has been created. Login Details: Member Code: 5H100002000030146, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-02-16 20:34:58','','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=8675826276&message=Dear+P.MANIKAM%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030146%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=554');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (555,1298,'','9944872965','Dear Jeyaraj, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-16 22:49:07','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9944872965&amp;message=Dear+Jeyaraj%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=555\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9944872965&message=Dear+Jeyaraj%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=555');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (556,1299,'','9944872965','Dear Jeyaraj, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-16 22:50:39','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9944872965&amp;message=Dear+Jeyaraj%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=556\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9944872965&message=Dear+Jeyaraj%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=556');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (557,1300,'5H100002000030002','9944872965','Dear Jeyaraj, Your account has been created. Login Details: Member Code: 5H100002000030002, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-16 22:52:21','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9944872965&amp;message=Dear+Jeyaraj%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030002%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=557\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9944872965&message=Dear+Jeyaraj%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030002%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=557');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (558,1301,'','9443957148','Dear Vijayakumar, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-17 12:51:25','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=558\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=558');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (559,1302,'','9443957148','Dear Vijayakumar, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-17 12:52:43','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=559\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=559');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (560,1303,'','9443957148','Dear Vijayakumar, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-17 12:53:32','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=560\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=560');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (561,1304,'5H100002000030002','9000000000','Dear M. Manikandan, Your account has been created. Login Details: Member Code: 5H100002000030002, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-18 19:05:26','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9000000000&amp;message=Dear+M.+Manikandan%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030002%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=561\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9000000000&message=Dear+M.+Manikandan%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030002%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=561');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (562,1305,'5H100002000030003','9000000000','Dear V. NIRMALAKUMARI,, Your account has been created. Login Details: Member Code: 5H100002000030003, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-18 19:07:31','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9000000000&amp;message=Dear+V.+NIRMALAKUMARI%2C%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030003%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=562\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9000000000&message=Dear+V.+NIRMALAKUMARI%2C%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030003%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=562');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (563,1306,'5H100002000030004','9000000000','Dear BREMAVATHY.R , Your account has been created. Login Details: Member Code: 5H100002000030004, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-18 19:09:17','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9000000000&amp;message=Dear+BREMAVATHY.R+%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030004%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=563\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9000000000&message=Dear+BREMAVATHY.R+%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030004%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=563');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (564,1307,'5H100002000030005','9000000000','Dear KARUNAKARAN. P, , Your account has been created. Login Details: Member Code: 5H100002000030005, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-18 19:10:57','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9000000000&amp;message=Dear+KARUNAKARAN.+P%2C+%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030005%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=564\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9000000000&message=Dear+KARUNAKARAN.+P%2C+%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030005%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=564');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (565,1308,'5H100002000030006','9000000000','Dear K. DHAMARAJ, Your account has been created. Login Details: Member Code: 5H100002000030006, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-18 19:13:12','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9000000000&amp;message=Dear+K.+DHAMARAJ%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030006%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=565\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9000000000&message=Dear+K.+DHAMARAJ%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030006%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=565');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (566,1309,'5H100002000030007','9000000000','Dear K. VIJAYA, Your account has been created. Login Details: Member Code: 5H100002000030007, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-18 19:15:11','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9000000000&amp;message=Dear+K.+VIJAYA%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030007%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=566\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9000000000&message=Dear+K.+VIJAYA%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030007%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=566');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (567,1310,'5H100002000030008','9000000000','Dear Pravinkumar, Your account has been created. Login Details: Member Code: 5H100002000030008, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-18 19:16:40','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9000000000&amp;message=Dear+Pravinkumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030008%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=567\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9000000000&message=Dear+Pravinkumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030008%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=567');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (568,1311,'','9443957148','Dear CANARA, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-19 07:44:06','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+CANARA%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=568\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+CANARA%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=568');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (569,1312,'','7373968485','Dear Auditor Expn, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-19 07:47:20','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=7373968485&amp;message=Dear+Auditor+Expn%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=569\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=7373968485&message=Dear+Auditor+Expn%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=569');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (570,1313,'','7373968485','Dear Auditor 01, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-19 07:48:18','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=7373968485&amp;message=Dear+Auditor+01%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=570\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=7373968485&message=Dear+Auditor+01%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=570');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (571,1314,'','7373968485','Dear Auditor, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-19 07:49:38','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=7373968485&amp;message=Dear+Auditor%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=571\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=7373968485&message=Dear+Auditor%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=571');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (572,1315,'','7373968485','Dear Auditor 05, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-19 07:51:13','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=7373968485&amp;message=Dear+Auditor+05%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=572\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=7373968485&message=Dear+Auditor+05%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=572');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (573,1316,'','7373968485','Dear Auditor 06, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-19 07:52:10','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=7373968485&amp;message=Dear+Auditor+06%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=573\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=7373968485&message=Dear+Auditor+06%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=573');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (574,1317,'5H100002000030009','9340167168','Dear Vijayakumar, Your account has been created. Login Details: Member Code: 5H100002000030009, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-19 07:54:04','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9340167168&amp;message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030009%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=574\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9340167168&message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030009%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=574');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (575,1318,'','7373968485','Dear Auditor, Your account has been created. Login Details: Member Code: , Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-19 07:56:37','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=7373968485&amp;message=Dear+Auditor%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=575\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=7373968485&message=Dear+Auditor%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=575');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (576,1319,'5H100002000030017','9443957148','Dear Vijayakumar.K 666, Your account has been created. Login Details: Member Code: 5H100002000030017, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-09-28 14:06:28','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar.K+666%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030017%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=576\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar.K+666%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030017%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=576');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (577,1320,'5H100002000030018','9443957148','Dear R RAMAR 00202112, Your account has been created. Login Details: Member Code: 5H100002000030018, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 09:47:23','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+R+RAMAR+00202112%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030018%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=577\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+R+RAMAR+00202112%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030018%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=577');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (578,1321,'5H100002000030019','9443957148','Dear R RAMAR1212, Your account has been created. Login Details: Member Code: 5H100002000030019, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 09:50:26','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+R+RAMAR1212%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030019%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=578\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+R+RAMAR1212%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030019%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=578');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (579,1322,'5H100002000030020','9443957148','Dear R RAMAR134144, Your account has been created. Login Details: Member Code: 5H100002000030020, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 09:53:36','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+R+RAMAR134144%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030020%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=579\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+R+RAMAR134144%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030020%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=579');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (580,1323,'5H100002000030021','9443957148','Dear Vijayakumar, Your account has been created. Login Details: Member Code: 5H100002000030021, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 09:55:46','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030021%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=580\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030021%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=580');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (581,1324,'5H100002000030022','9443957148','Dear Vijayakumar, Your account has been created. Login Details: Member Code: 5H100002000030022, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 09:57:50','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030022%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=581\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030022%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=581');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (582,1325,'5H100002000030023','9443957148','Dear Vijayakumar, Your account has been created. Login Details: Member Code: 5H100002000030023, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 09:59:59','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030023%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=582\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030023%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=582');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (583,1326,'5H100002000030024','9443957148','Dear Vijayakumar 24, Your account has been created. Login Details: Member Code: 5H100002000030024, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 10:01:45','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar+24%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030024%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=583\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar+24%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030024%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=583');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (584,1327,'5H100002000030025','9443957148','Dear Vijayakumar 24, Your account has been created. Login Details: Member Code: 5H100002000030025, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 10:03:17','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar+24%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030025%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=584\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar+24%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030025%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=584');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (585,1328,'5H100002000030026','9443957148','Dear Vijayakumar 26, Your account has been created. Login Details: Member Code: 5H100002000030026, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 10:04:53','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar+26%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030026%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=585\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar+26%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030026%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=585');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (586,1329,'5H100002000030027','9443957148','Dear Vijayakumar 27, Your account has been created. Login Details: Member Code: 5H100002000030027, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 10:06:34','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar+27%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030027%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=586\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar+27%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030027%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=586');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (587,1330,'5H100002000030028','9443957148','Dear Vijayakumar 28, Your account has been created. Login Details: Member Code: 5H100002000030028, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 10:07:54','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar+28%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030028%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=587\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar+28%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030028%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=587');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (588,1331,'5H100002000030029','9443957148','Dear Vijayakumar 29, Your account has been created. Login Details: Member Code: 5H100002000030029, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 10:09:18','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar+29%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030029%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=588\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar+29%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030029%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=588');
insert  into `_tbl_Log_MobileSMS`(`SMSID`,`MemberID`,`Membercode`,`SmsTo`,`Message`,`MessagedOn`,`APIResponse`,`url`) values (589,1332,'5H100002000030030','9443957148','Dear Vijayakumar 30, Your account has been created. Login Details: Member Code: 5H100002000030030, Password=123456, Url: http://www.goldenlifesociety.co.in - Thanks GLS Team','2020-10-16 10:10:34','<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>301 Moved Permanently</title>\n</head><body>\n<h1>Moved Permanently</h1>\n<p>The document has moved <a href=\"https://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&amp;apipassword=lsLmNvbQ==&amp;sender=GOLDLS&amp;&amp;number=9443957148&amp;message=Dear+Vijayakumar+30%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030030%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&amp;uid=589\">here</a>.</p>\n</body></html>\n','http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&&number=9443957148&message=Dear+Vijayakumar+30%2C+Your+account+has+been+created.+Login+Details%3A+Member+Code%3A+5H100002000030030%2C+Password%3D123456%2C+Url%3A+http%3A%2F%2Fwww.goldenlifesociety.co.in+-+Thanks+GLS+Team&uid=589');

/*Table structure for table `_tbl_Settings_Packages` */

DROP TABLE IF EXISTS `_tbl_Settings_Packages`;

CREATE TABLE `_tbl_Settings_Packages` (
  `PackageID` int(11) NOT NULL AUTO_INCREMENT,
  `PackageName` varchar(255) DEFAULT NULL,
  `ProductSKU` varchar(255) DEFAULT NULL,
  `PackageAmount` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`PackageID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_Settings_Packages` */

insert  into `_tbl_Settings_Packages`(`PackageID`,`PackageName`,`ProductSKU`,`PackageAmount`,`CreatedOn`,`IsActive`) values (1,'Joining Package','Joining Package','500',NULL,NULL);

/*Table structure for table `_tbl_Settings_Params` */

DROP TABLE IF EXISTS `_tbl_Settings_Params`;

CREATE TABLE `_tbl_Settings_Params` (
  `ParamID` int(11) NOT NULL AUTO_INCREMENT,
  `ParamCode` varchar(255) DEFAULT NULL,
  `ParamLabel` varchar(255) DEFAULT NULL,
  `ParamValue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ParamID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_Settings_Params` */

insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (1,'MinWithdrawal','Minimum withdrawal amount (Rs)','10');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (2,'MaxWithdrawal','Maximum withdrawal amount (%)','1000');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (3,'PayoutMode','Payout ','1');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (4,'MinPayout','Minimum payout amount (Rs)','1000');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (5,'PayoutCharges','Payout charges (%)','15');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (6,'MemberCodePrefix','Member Prefix','5H');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (7,'MemberCodeLength','Member Code Length','16');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (8,'EpinPrefix','E-Pin Prefix','GLS');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (9,'EpinLength','E-Pin Length','8');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (10,'EpinPwdLength','E-Pin Password Length','8');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (11,'DefaultPackageID','Default Package ',NULL);
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (12,'PayoutCutOff','Maximum Payout CutOff','-1');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (13,'MobileSMSSendAPI',NULL,'http://www.aaranju.in/sms/api.php?apiusername=a3VtYXJtMTQ5QGdtYW&apipassword=lsLmNvbQ==&sender=GOLDLS&');
insert  into `_tbl_Settings_Params`(`ParamID`,`ParamCode`,`ParamLabel`,`ParamValue`) values (14,'MobileSMSBalanceAPI','Mobile SMS Balance API',NULL);

/*Table structure for table `_tbl_accounts` */

DROP TABLE IF EXISTS `_tbl_accounts`;

CREATE TABLE `_tbl_accounts` (
  `AcTxnID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `TxnDate` datetime DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `Credit` varchar(255) DEFAULT NULL,
  `Debit` varchar(255) DEFAULT NULL,
  `Balance` varchar(255) DEFAULT NULL,
  `VoucherID` int(11) DEFAULT NULL,
  `VoucherName` varchar(255) DEFAULT NULL,
  `ToFrom` int(11) DEFAULT NULL,
  `ToFromCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AcTxnID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_accounts` */

/*Table structure for table `_tbl_admin` */

DROP TABLE IF EXISTS `_tbl_admin`;

CREATE TABLE `_tbl_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminCode` varchar(255) DEFAULT NULL,
  `AdminName` varchar(255) DEFAULT NULL,
  `AdminEmailID` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_admin` */

insert  into `_tbl_admin`(`AdminID`,`AdminCode`,`AdminName`,`AdminEmailID`,`AdminPassword`,`IsActive`) values (1,'AD0001','DemoAdmin','DemoAdmin@gmail.com','123456',1);

/*Table structure for table `_tbl_bank_details` */

DROP TABLE IF EXISTS `_tbl_bank_details`;

CREATE TABLE `_tbl_bank_details` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` int(11) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_bank_details` */

/*Table structure for table `_tbl_earnings` */

DROP TABLE IF EXISTS `_tbl_earnings`;

CREATE TABLE `_tbl_earnings` (
  `EarningId` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `LevelNumber` varchar(255) DEFAULT NULL,
  `LevelIncome` varchar(255) DEFAULT NULL,
  `PlacedMemberID` int(11) DEFAULT NULL,
  `PlacedMemberCode` varchar(255) DEFAULT NULL,
  `PlacedMemberName` varchar(255) DEFAULT NULL,
  `PlacedByMemberID` int(11) DEFAULT NULL,
  `PlacedByMemberCode` varchar(255) DEFAULT NULL,
  `PlacedByMemberName` varchar(255) DEFAULT NULL,
  `PlacedOn` datetime DEFAULT NULL,
  `FromWeb` int(11) DEFAULT NULL,
  `FromPortal` int(11) DEFAULT NULL,
  PRIMARY KEY (`EarningId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_earnings` */

/*Table structure for table `_tbl_epin_package` */

DROP TABLE IF EXISTS `_tbl_epin_package`;

CREATE TABLE `_tbl_epin_package` (
  `packageid` int(10) NOT NULL AUTO_INCREMENT,
  `PackageName` varchar(255) DEFAULT NULL,
  `PackageValue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`packageid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_epin_package` */

insert  into `_tbl_epin_package`(`packageid`,`PackageName`,`PackageValue`) values (1,'GLS-500','500');

/*Table structure for table `_tbl_epins` */

DROP TABLE IF EXISTS `_tbl_epins`;

CREATE TABLE `_tbl_epins` (
  `PinID` int(11) NOT NULL AUTO_INCREMENT,
  `PinCode` varchar(255) DEFAULT NULL,
  `EPinPassword` varchar(255) DEFAULT NULL,
  `GeneratedByID` varchar(255) DEFAULT NULL,
  `GeneratedByName` varchar(255) DEFAULT NULL,
  `CreatedByCode` varchar(255) DEFAULT NULL,
  `GeneratedOn` datetime DEFAULT NULL,
  `PinValue` varchar(255) DEFAULT NULL,
  `IsSold` int(11) DEFAULT '0',
  `SoldMemberID` int(11) DEFAULT NULL,
  `SoldMemberCode` varchar(255) DEFAULT NULL,
  `SoldMemberName` varchar(255) DEFAULT NULL,
  `SoldOn` datetime DEFAULT NULL,
  `IsUsed` int(11) DEFAULT '0',
  `UsedToMemberID` int(11) DEFAULT NULL,
  `UsedMemberCode` varchar(255) DEFAULT NULL,
  `UsedMemberName` varchar(255) DEFAULT NULL,
  `UsedOn` datetime DEFAULT NULL,
  `PinPackageName` varchar(255) DEFAULT NULL,
  `PinPackageID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PinID`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_epins` */

insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (1,'297FEE9846','0fa745','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (2,'510B930AD9','235741','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (3,'B6ED5E218C','f90414','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (4,'5AA8A9800A','f06a13','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',1,1310,'5H100002000030008','Pravinkumar','2020-09-18 19:16:40','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (5,'BDB3592BA7','689ab2','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',1,1309,'5H100002000030007','K. VIJAYA','2020-09-18 19:15:11','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (6,'32D7B2D97E','a6d0ec','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-18 19:13:12','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (7,'B20378E4F9','fd16cd','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-18 19:10:57','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (8,'E2CAF05E55','f3d24f','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-18 19:09:17','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (9,'6B7F132A09','945cfa','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-18 19:07:31','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (10,'E44813EE4E','45a3f9','1','Admin',NULL,'2020-09-18 13:31:11','500',1,1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 13:31:11',1,1304,'5H100002000030002','M. Manikandan','2020-09-18 19:05:26','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (11,'2C782F5FBD','fdbda0','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (12,'2F82B0170C','ef20f1','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-09-28 14:06:28','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (13,'0A4755F16B','bf5b64','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1318,'','Auditor','2020-09-19 07:56:37','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (14,'AE374C9060','9705b5','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1317,'5H100002000030009','Vijayakumar','2020-09-19 07:54:04','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (15,'AFB3AE6149','ea19fa','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1316,'','Auditor 06','2020-09-19 07:52:10','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (16,'6F5588A44F','c7ccd4','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1315,'','Auditor 05','2020-09-19 07:51:13','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (17,'CD3A6BF08E','07a045','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1314,'','Auditor','2020-09-19 07:49:38','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (18,'AE3C6A6558','4eaa49','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1313,'','Auditor 01','2020-09-19 07:48:18','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (19,'1E0A0177BC','34275e','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1312,'','Auditor Expn','2020-09-19 07:47:20','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (20,'41B87C501E','74c597','','Admin',NULL,'2020-09-19 07:30:18','500',1,1304,'5H100002000030002','M. Manikandan','2020-09-19 07:30:18',1,1311,'','CANARA','2020-09-19 07:44:06','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (21,'2C20A91297','3cf446','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (22,'F8E4DE79DB','44f078','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (23,'D0D256D202','3a7291','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (24,'BE9ED723E6','e9357f','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (25,'1DF9CB0A51','81ccfb','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (26,'C2B162FA38','5fe52a','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (27,'B4B792500B','57dd0e','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (28,'3CFE7DFFFE','1fe362','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (29,'DFF9EE1BCA','facf9b','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (30,'292E078CA4','35d24c','','Admin',NULL,'2020-09-19 07:31:19','500',1,1305,'5H100002000030003','V. NIRMALAKUMARI,','2020-09-19 07:31:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (31,'D19D06AB7D','22512e','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (32,'91E4B6DFB4','17db6f','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (33,'C144D18D4A','2b943c','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (34,'EC76756F4E','892311','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (35,'251B8CFEF0','da71eb','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (36,'4E25F1CDF8','d1e7c8','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (37,'622A390916','f52567','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (38,'8B46A267A4','9998ec','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (39,'733A78FD7A','f6f50a','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (40,'7F6624D061','aaea5a','','Admin',NULL,'2020-09-19 07:32:19','500',1,1306,'5H100002000030004','BREMAVATHY.R','2020-09-19 07:32:19',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (41,'9E9A520FE3','b8cd78','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (42,'69506C7A2F','a93c78','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (43,'E546F43152','87fd7b','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (44,'F5BAA327A3','9fb982','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (45,'009A05D635','a0677f','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (46,'DB9DA07D2D','89c8b7','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (47,'E6241706C0','63a372','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (48,'D75DB625A1','9d1c49','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (49,'4404C3A2CF','a6ac50','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (50,'B5BD47353A','bbba5d','','Admin',NULL,'2020-09-19 07:33:42','500',1,1307,'5H100002000030005','KARUNAKARAN. P,','2020-09-19 07:33:42',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (51,'68070A4CCE','f3c052','','Admin',NULL,'2020-09-19 07:34:49','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:34:49',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (52,'D9FFC72190','2b7366','','Admin',NULL,'2020-09-19 07:34:49','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:34:49',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (53,'26B646FA49','378736','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (54,'00D6878A10','2e250c','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (55,'29667A9831','90488e','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (56,'229C6FE34F','e769f1','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (57,'E76559A9A1','80d02e','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (58,'645480ED13','99061e','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (59,'39DB3BD47F','4a6b88','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (60,'6F14D70C05','22b3d7','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (61,'7735B4C4BE','2c2de5','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (62,'5C2E587DF1','f453d4','','Admin',NULL,'2020-09-19 07:37:27','500',1,1308,'5H100002000030006','K. DHAMARAJ','2020-09-19 07:37:27',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (63,'15E608AE1D','de1a09','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (64,'8E4D7A8A3A','630cd9','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (65,'CC8116AC54','712658','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (66,'E653FA1E10','17936a','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (67,'CB96F58756','17b05b','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (68,'657D6CD6D5','809633','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (69,'708A498684','99f35a','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (70,'C01A5FAB0E','828e7c','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (71,'BB67DCA13E','734d57','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (72,'A929E4B4C3','1bb932','','Admin',NULL,'2020-09-19 07:39:37','500',1,1309,'5H100002000030007','K. VIJAYA','2020-09-19 07:39:37',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (73,'A453221E1F','cbc55a','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (74,'D1DF2A0A34','7dec87','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (75,'009F6E1618','66de78','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (76,'28DE790C8B','df6dd6','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (77,'1D9D387708','7a4c0f','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (78,'ED7D603FB8','27d161','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (79,'FF02EEB555','a6a9ea','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (80,'81B200379F','e852d1','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (81,'27BE6727C9','8b905b','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (82,'4F9147DA7D','9137d0','','Admin',NULL,'2020-09-19 07:40:51','500',1,1310,'5H100002000030008','Pravinkumar','2020-09-19 07:40:51',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (83,'B5966A7F71','8b1a83','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (84,'FDF41BB9A2','19ffa6','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (85,'595EDA6191','b21dcf','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (86,'92EE510FBF','3d2dc4','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (87,'6F0D33575A','51682e','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (88,'6BEF4D85FD','c6a78b','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (89,'575B1BF573','875dc2','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (90,'611D976C2D','797a8f','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (91,'07B8BDCE6C','13bc83','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (92,'A551ED11B0','bcb79a','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (93,'FF4942EFAD','fee1e0','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (94,'883F849190','3dc2eb','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (95,'4DD12A518F','fa64bb','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (96,'869A524B92','0c71d9','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',0,NULL,NULL,NULL,NULL,'GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (97,'5E587CC1BF','cc2cdf','1','Admin',NULL,'2020-10-16 09:40:32','500',1,1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:40:32',1,1320,'5H100002000030018','R RAMAR 00202112','2020-10-16 09:47:23','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (98,'30F2DBE0C4','9ad563','1','Admin',NULL,'2020-10-16 09:48:12','500',1,1320,'5H100002000030018','R RAMAR 00202112','2020-10-16 09:48:12',1,1321,'5H100002000030019','R RAMAR1212','2020-10-16 09:50:26','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (99,'E20F6A3E5A','b2bf42','1','Admin',NULL,'2020-10-16 09:50:53','500',1,1321,'5H100002000030019','R RAMAR1212','2020-10-16 09:50:53',1,1322,'5H100002000030020','R RAMAR134144','2020-10-16 09:53:36','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (100,'87E8D40E93','8eedcc','1','Admin',NULL,'2020-10-16 09:54:48','500',1,1322,'5H100002000030020','R RAMAR134144','2020-10-16 09:54:48',1,1323,'5H100002000030021','Vijayakumar','2020-10-16 09:55:46','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (101,'C650922C81','62751b','1','Admin',NULL,'2020-10-16 09:56:45','500',1,1323,'5H100002000030021','Vijayakumar','2020-10-16 09:56:45',1,1324,'5H100002000030022','Vijayakumar','2020-10-16 09:57:50','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (102,'E49E2A7A69','e1dab2','1','Admin',NULL,'2020-10-16 09:58:16','500',1,1324,'5H100002000030022','Vijayakumar','2020-10-16 09:58:16',1,1325,'5H100002000030023','Vijayakumar','2020-10-16 09:59:59','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (103,'3497E5E187','51e16c','1','Admin',NULL,'2020-10-16 10:00:26','500',1,1325,'5H100002000030023','Vijayakumar','2020-10-16 10:00:26',1,1326,'5H100002000030024','Vijayakumar 24','2020-10-16 10:01:45','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (104,'4891F03E39','7aabc2','1','Admin',NULL,'2020-10-16 10:02:05','500',1,1326,'5H100002000030024','Vijayakumar 24','2020-10-16 10:02:05',1,1327,'5H100002000030025','Vijayakumar 24','2020-10-16 10:03:17','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (105,'CAEB99C98D','875280','1','Admin',NULL,'2020-10-16 10:03:33','500',1,1327,'5H100002000030025','Vijayakumar 24','2020-10-16 10:03:33',1,1328,'5H100002000030026','Vijayakumar 26','2020-10-16 10:04:53','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (106,'3D2F2B409E','0bc168','1','Admin',NULL,'2020-10-16 10:05:21','500',1,1328,'5H100002000030026','Vijayakumar 26','2020-10-16 10:05:21',1,1329,'5H100002000030027','Vijayakumar 27','2020-10-16 10:06:34','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (107,'CD4CCB0EC2','f6770c','1','Admin',NULL,'2020-10-16 10:07:12','500',1,1329,'5H100002000030027','Vijayakumar 27','2020-10-16 10:07:12',1,1330,'5H100002000030028','Vijayakumar 28','2020-10-16 10:07:54','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (108,'9094959FC4','84c6f9','1','Admin',NULL,'2020-10-16 10:08:10','500',1,1330,'5H100002000030028','Vijayakumar 28','2020-10-16 10:08:10',1,1331,'5H100002000030029','Vijayakumar 29','2020-10-16 10:09:18','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (109,'45F6B261E4','b23c1b','1','Admin',NULL,'2020-10-16 10:09:36','500',1,1331,'5H100002000030029','Vijayakumar 29','2020-10-16 10:09:36',1,1332,'5H100002000030030','Vijayakumar 30','2020-10-16 10:10:34','GLS-500','1');
insert  into `_tbl_epins`(`PinID`,`PinCode`,`EPinPassword`,`GeneratedByID`,`GeneratedByName`,`CreatedByCode`,`GeneratedOn`,`PinValue`,`IsSold`,`SoldMemberID`,`SoldMemberCode`,`SoldMemberName`,`SoldOn`,`IsUsed`,`UsedToMemberID`,`UsedMemberCode`,`UsedMemberName`,`UsedOn`,`PinPackageName`,`PinPackageID`) values (110,'5A57C126B9','cc325b','1','Admin',NULL,'2020-10-16 10:10:50','500',1,1332,'5H100002000030030','Vijayakumar 30','2020-10-16 10:10:50',0,NULL,NULL,NULL,NULL,'GLS-500','1');

/*Table structure for table `_tbl_free_member` */

DROP TABLE IF EXISTS `_tbl_free_member`;

CREATE TABLE `_tbl_free_member` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberCode` varchar(255) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `MemberSurname` varchar(255) DEFAULT NULL,
  `MemberMobileNumber` varchar(255) DEFAULT NULL,
  `MemberPassword` varchar(255) DEFAULT NULL,
  `SponsorID` int(11) DEFAULT NULL,
  `SponsorCode` varchar(255) DEFAULT NULL,
  `SponsorName` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) DEFAULT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `AddressLine3` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `PinCode` varchar(255) DEFAULT NULL,
  `AadhaarNumber` varchar(255) DEFAULT NULL,
  `PancardNumber` varchar(255) DEFAULT NULL,
  `VoterIDNumber` varchar(255) DEFAULT NULL,
  `AccountHolderName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `AccountType` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `NominiName` varchar(255) DEFAULT NULL,
  `NominiRelation` varchar(255) DEFAULT NULL,
  `NominiDateOfBirth` date DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `EduDetails` varchar(255) DEFAULT NULL,
  `KycVerified` int(11) DEFAULT '0',
  `KycVerifiedOn` datetime DEFAULT NULL,
  `NomineeVerified` int(11) DEFAULT '0',
  `NomineeVerifiedOn` datetime DEFAULT NULL,
  `BankAccountVerified` int(11) DEFAULT '0',
  `BankAccountVerifiedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_free_member` */

insert  into `_tbl_free_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`AccountHolderName`,`AccountNumber`,`AccountType`,`BankName`,`IFSCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`) values (1,'5H100002000030010','5H300002000010001','Expn 01','7373968485','123456',NULL,NULL,NULL,'2020-09-19 08:02:41',NULL,'kumarm149@gmail.com',NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'600009','12mnjn245012','0456152','','5H100002000030002','2809101018306','Savings','','CNRB0002809','Auditor Expn Expn','','1984-12-20','Male','2002-01-01','',0,NULL,0,NULL,0,NULL);

/*Table structure for table `_tbl_incomes` */

DROP TABLE IF EXISTS `_tbl_incomes`;

CREATE TABLE `_tbl_incomes` (
  `IncomeID` int(11) NOT NULL AUTO_INCREMENT,
  `LevelNumber` int(11) DEFAULT NULL,
  `IncomeAmount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IncomeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_incomes` */

/*Table structure for table `_tbl_member` */

DROP TABLE IF EXISTS `_tbl_member`;

CREATE TABLE `_tbl_member` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberCode` varchar(255) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `MemberFatherName` varchar(255) DEFAULT NULL,
  `MemberSurname` varchar(255) DEFAULT NULL,
  `MemberMobileNumber` varchar(255) DEFAULT NULL,
  `MemberPassword` varchar(255) DEFAULT NULL,
  `SponsorID` int(11) DEFAULT NULL,
  `SponsorCode` varchar(255) DEFAULT NULL,
  `SponsorName` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) DEFAULT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `AddressLine3` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `PinCode` varchar(255) DEFAULT NULL,
  `AadhaarNumber` varchar(255) DEFAULT NULL,
  `PancardNumber` varchar(255) DEFAULT NULL,
  `VoterIDNumber` varchar(255) DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `EduDetails` varchar(255) DEFAULT NULL,
  `KycVerified` int(11) DEFAULT '0',
  `KycVerifiedOn` datetime DEFAULT NULL,
  `NomineeVerified` int(11) DEFAULT '0',
  `NomineeVerifiedOn` datetime DEFAULT NULL,
  `BankAccountVerified` int(11) DEFAULT '0',
  `BankAccountVerifiedOn` datetime DEFAULT NULL,
  `MOVillage` varchar(255) DEFAULT NULL,
  `MOAccount` varchar(255) DEFAULT NULL,
  `BAccount` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `BVillage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=MyISAM AUTO_INCREMENT=1333 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_member` */

insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1,'5H100002000030001','NIRMALAKUMARI.V','','W/O K.VIJAYAKUMAR','9486306418','admin',0,'Admin','Admin','2019-08-14 05:00:00',1,'kumarm149@gmail.com',NULL,'Ariveyal illam,','D-18, Manimegalai Road, Block-16',NULL,'Cuddalore','Tamil Nadu',NULL,'607 801',NULL,NULL,NULL,'Female','1967-07-01',NULL,1,'2019-09-16 12:12:47',1,'2019-09-16 12:29:13',1,'2019-09-16 12:30:50','','','','','');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1306,'5H100002000030004','BREMAVATHY.R','W/O P. ANBAZHAGAN','BREMAVATHY','9000000000','123456',1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 19:09:17',NULL,NULL,NULL,'C-6, TOPAZ LINE,','BLOCK-18,',NULL,'NEYVELI','Tamilnadu',NULL,'',NULL,NULL,NULL,NULL,'2002-01-01','Education',0,NULL,0,NULL,0,NULL,'','',NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1305,'5H100002000030003','V. NIRMALAKUMARI,','W/O K. VIJAYAKUMAR','V. NIRMALAKUMARI,','9000000000','123456',1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 19:07:31',NULL,NULL,NULL,'D-18, MANIMEGALAI ROAD,','BLOCK-16,',NULL,'NEYVELI','Tamilnadu',NULL,'607801',NULL,NULL,NULL,NULL,'2002-01-01','Education',0,NULL,0,NULL,0,NULL,'','',NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1304,'5H100002000030002','M. Manikandan','S/O Madurai','M. Manikandan','9000000000','123456',1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 19:05:26',NULL,NULL,NULL,'No:40 Reddiyar Street,','Kaspakaranai,',NULL,'Asokapuri-Post, Vikkaravandi','Tamilnadu',NULL,'',NULL,NULL,NULL,NULL,'2002-01-01','Education',0,NULL,0,NULL,0,NULL,'','',NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1307,'5H100002000030005','KARUNAKARAN. P,','S/O NAIR','KARUNAKARAN. P','9000000000','123456',1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 19:10:57',NULL,NULL,NULL,'C-52 TTK Road,','Bolck-11,',NULL,'NEYVELI','Tamilnadu',NULL,'',NULL,NULL,NULL,NULL,'2002-01-01','Education',0,NULL,0,NULL,0,NULL,'','',NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1308,'5H100002000030006','K. DHAMARAJ','S/O R. KAMALANATHAN','K. DHAMARAJ','9000000000','123456',1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 19:13:12',NULL,NULL,NULL,'No-9 Second Middle Street,','Kurinji Nager,',NULL,'Lawspet','Puducherry',NULL,'605008',NULL,NULL,NULL,NULL,'2002-01-01','Education',0,NULL,0,NULL,0,NULL,'','',NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1309,'5H100002000030007','K. VIJAYA','W/O Sounderrajan','Vijaya','9000000000','123456',1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 19:15:11',NULL,NULL,NULL,'No: 02 Daram Chanth Nager','Thindivanam',NULL,'','Tamilnadu',NULL,'',NULL,NULL,NULL,NULL,'2002-01-01','Education',0,NULL,0,NULL,0,NULL,'','',NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1310,'5H100002000030008','Pravinkumar','S/O Vasanthi','Pravinkumar','9000000000','123456',1,'5H100002000030001','NIRMALAKUMARI.V','2020-09-18 19:16:40',NULL,NULL,NULL,'No-4 Ashok Nager','Panruti',NULL,'','Tamilnadu',NULL,'',NULL,NULL,NULL,NULL,'2002-01-01','Education',0,NULL,0,NULL,0,NULL,'','',NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1311,'5H100002000030009','CANARA',NULL,'BANK','9443957148','123456',1304,'5H100002000030002','M. Manikandan','2020-09-19 07:44:06',NULL,NULL,NULL,'Ariveyal illam,','D-18, Manimegalai Road, Block-16',NULL,'Cuddalore','Tamilnadu',NULL,'607801',NULL,NULL,NULL,NULL,'1993-08-10','B.COM',0,NULL,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1312,'5H100002000030010','Auditor Expn',NULL,'Expn','7373968485','123456',1304,'5H100002000030002','M. Manikandan','2020-09-19 07:47:20',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'600009',NULL,NULL,NULL,NULL,'1990-01-01','B.COM',0,NULL,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1313,'5H100002000030011','Auditor 01',NULL,'Expn','7373968485','123456',1304,'5H100002000030002','M. Manikandan','2020-09-19 07:48:18',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'600009',NULL,NULL,NULL,NULL,'1996-01-01','B.COM',0,NULL,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1314,'5H100002000030012','Auditor',NULL,'Expn','7373968485','123456',1304,'5H100002000030002','M. Manikandan','2020-09-19 07:49:38',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'600009',NULL,NULL,NULL,NULL,'1996-01-01','B.COM',0,NULL,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1315,'5H100002000030013','Auditor 05',NULL,'Expn','7373968485','123456',1304,'5H100002000030002','M. Manikandan','2020-09-19 07:51:13',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'600009',NULL,NULL,NULL,NULL,'1990-01-01','B.COM',0,NULL,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1316,'5H100002000030015','Auditor 06',NULL,'Expn','7373968485','123456',1304,'5H100002000030002','M. Manikandan','2020-09-19 07:52:10',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'600009',NULL,NULL,NULL,NULL,'1990-01-01','SSLC',0,NULL,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1317,'5H100002000030015','Vijayakumar','NOUYJYBVJHN','M.RATHINAM','9340167168','123456',1304,'5H100002000030002','M. Manikandan','2020-09-19 07:54:04',NULL,NULL,NULL,'C-52, TTK ROAD, BLOCK-11','NEYVELI-3',NULL,'NEYVELI-TS','Tamilnadu',NULL,'607803',NULL,NULL,NULL,NULL,'1984-01-01','B.COM',0,NULL,0,NULL,0,NULL,'123456','5H100002000030002',NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1318,'5H100002000030016','Auditor',NULL,'Expn','7373968485','123456',1304,'5H100002000030002','M. Manikandan','2020-09-19 07:56:37',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'600009',NULL,NULL,NULL,NULL,'1983-01-01','B.COM',0,NULL,0,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL);
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1319,'5H100002000030017','Vijayakumar.K 666','NOUYJYBVJHN','Man','9443957148','123456',1304,'5H100002000030002','M. Manikandan','2020-09-28 14:06:28',NULL,NULL,NULL,'Ariveyal illam,','D-18, Manimegalai Road, Block-16',NULL,'Cuddalore','Tamilnadu',NULL,'607801',NULL,NULL,NULL,NULL,'1960-08-10','B.E',0,NULL,0,NULL,0,NULL,'607801','5H100002000030002','Bihuh hi','CNRB000280901','CANARA BANK');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1320,'5H100002000030018','R RAMAR 00202112','NOUYJYBVJHN','Expn','9443957148','123456',1319,'5H100002000030017','Vijayakumar.K 666','2020-10-16 09:47:23',NULL,NULL,NULL,'Ariveyal illam,','D-18, Manimegalai Road, Block-16',NULL,'Cuddalore','Tamilnadu',NULL,'607801',NULL,NULL,NULL,NULL,'1981-07-01','B.COM',0,NULL,0,NULL,0,NULL,'607801','5H100002000030002','Bihuh hi','CNRB000280901','New');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1321,'5H100002000030019','R RAMAR1212','NOUYJYBVJHN','Expn','9443957148','123456',1320,'5H100002000030018','R RAMAR 00202112','2020-10-16 09:50:26',NULL,NULL,NULL,'Ariveyal illam,','D-18, Manimegalai Road, Block-16',NULL,'Cuddalore','Tamilnadu',NULL,'607801',NULL,NULL,NULL,NULL,'1987-04-01','B.COM',0,NULL,0,NULL,0,NULL,'607801','5H100002000030002','Bihuh hi','CNRB0002809','Vaddakuvellore');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1322,'5H100002000030020','R RAMAR134144','NOUYJYBVJHN','Expn','9443957148','123456',1321,'5H100002000030019','R RAMAR1212','2020-10-16 09:53:36',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'2002-01-01','SSLC',0,NULL,0,NULL,0,NULL,'607001','04631521','Bihuh hi','CNRB0002809','5H100002000030019');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1323,'5H100002000030021','Vijayakumar','NOUYJYBVJHN','M.RATHINAM','9443957148','123456',1322,'5H100002000030020','R RAMAR134144','2020-10-16 09:55:46',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1998-01-01','B.COM',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB0002809','5H100002000030020');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1324,'5H100002000030022','Vijayakumar','NOUYJYBVJHN','Expn','9443957148','123456',1323,'5H100002000030021','Vijayakumar','2020-10-16 09:57:50',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1981-03-01','SSLC',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB000280901','5H100002000030021');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1325,'5H100002000030023','Vijayakumar','NOUYJYBVJHN','Expn','9443957148','123456',1324,'5H100002000030022','Vijayakumar','2020-10-16 09:59:59',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1982-05-01','DME (MINING)',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB0002809','5H100002000030022');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1326,'5H100002000030024','Vijayakumar 24','NOUYJYBVJHN','Expn','9443957148','123456',1325,'5H100002000030023','Vijayakumar','2020-10-16 10:01:45',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1992-09-04','B.Sc',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB0002809','5H100002000030023');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1327,'5H100002000030025','Vijayakumar 24','2413','Expn','9443957148','123456',1326,'5H100002000030024','Vijayakumar 24','2020-10-16 10:03:17',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1981-05-01','B.COM',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB0002809','5H100002000030024');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1328,'5H100002000030026','Vijayakumar 26','NOUYJYBVJHN','Expn','9443957148','123456',1327,'5H100002000030025','Vijayakumar 24','2020-10-16 10:04:53',NULL,NULL,NULL,'Ariveyal illam,','D-18, Manimegalai Road, Block-16',NULL,'Cuddalore','Tamilnadu',NULL,'607801',NULL,NULL,NULL,NULL,'1984-03-01','SSLC',0,NULL,0,NULL,0,NULL,'607801','5H100002000030002','Bihuh hi','0138218','5H100002000030025');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1329,'5H100002000030027','Vijayakumar 27','NOUYJYBVJHN','Expn','9443957148','123456',1328,'5H100002000030026','Vijayakumar 26','2020-10-16 10:06:34',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1985-01-01','B.COM',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB0002809','5H100002000030026');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1330,'5H100002000030028','Vijayakumar 28','NOUYJYBVJHN','Expn','9443957148','123456',1329,'5H100002000030027','Vijayakumar 27','2020-10-16 10:07:54',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1983-01-01','DME (MINING)',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB0002809','5H100002000030027');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1331,'5H100002000030029','Vijayakumar 29','NOUYJYBVJHN','Expn','9443957148','123456',1330,'5H100002000030028','Vijayakumar 28','2020-10-16 10:09:18',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1984-01-01','B.COM',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB0002809','5H100002000030028');
insert  into `_tbl_member`(`MemberID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`,`MOVillage`,`MOAccount`,`BAccount`,`IFSCode`,`BVillage`) values (1332,'5H100002000030030','Vijayakumar 30','NOUYJYBVJHN','Expn','9443957148','123456',1331,'5H100002000030029','Vijayakumar 29','2020-10-16 10:10:34',NULL,NULL,NULL,'cuddalore','cuddalore',NULL,'Cuddalore','Tamilnadu',NULL,'607001',NULL,NULL,NULL,NULL,'1981-01-01','SSLC',0,NULL,0,NULL,0,NULL,'607001','5H100002000030002','Bihuh hi','CNRB0002809','5H100002000030029');

/*Table structure for table `_tbl_member_bank_details` */

DROP TABLE IF EXISTS `_tbl_member_bank_details`;

CREATE TABLE `_tbl_member_bank_details` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_member_bank_details` */

/*Table structure for table `_tbl_member_banknames` */

DROP TABLE IF EXISTS `_tbl_member_banknames`;

CREATE TABLE `_tbl_member_banknames` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `AccountHolderName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `AccountType` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `Added` datetime DEFAULT NULL,
  `BankAccountVerified` int(11) DEFAULT '0',
  `BankAccountVerifiedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_member_banknames` */

/*Table structure for table `_tbl_member_kycinformation` */

DROP TABLE IF EXISTS `_tbl_member_kycinformation`;

CREATE TABLE `_tbl_member_kycinformation` (
  `KYCID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `AadhaarNumber` varchar(255) DEFAULT NULL,
  `PanCardNumber` varchar(255) DEFAULT NULL,
  `VoterIDNumber` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `KycVerified` int(11) DEFAULT '0',
  `KycVerifiedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`KYCID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_member_kycinformation` */

insert  into `_tbl_member_kycinformation`(`KYCID`,`MemberID`,`MemberCode`,`AadhaarNumber`,`PanCardNumber`,`VoterIDNumber`,`AddedOn`,`KycVerified`,`KycVerifiedOn`) values (1,1,'5H100002000030001','5126 7272 0127','CMZPM694M','LPN2522498','2019-09-17 20:18:24',NULL,NULL);

/*Table structure for table `_tbl_member_levels` */

DROP TABLE IF EXISTS `_tbl_member_levels`;

CREATE TABLE `_tbl_member_levels` (
  `MemberLevelID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `LevelNumber` int(11) DEFAULT NULL,
  `CompletedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`MemberLevelID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_member_levels` */

/*Table structure for table `_tbl_member_nominiinformation` */

DROP TABLE IF EXISTS `_tbl_member_nominiinformation`;

CREATE TABLE `_tbl_member_nominiinformation` (
  `NominationID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `NominiName` varchar(255) DEFAULT NULL,
  `NominiRelation` varchar(255) DEFAULT NULL,
  `NominiDateOfBirth` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT '0',
  `NomineeVerified` int(11) DEFAULT '0',
  `NomineeVerifiedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`NominationID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_member_nominiinformation` */

insert  into `_tbl_member_nominiinformation`(`NominationID`,`MemberID`,`MemberCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`AddedOn`,`IsActive`,`NomineeVerified`,`NomineeVerifiedOn`) values (1,1149,'5H100002000030002','K.VIJAYAKUMAR','HUSBAND','18-11-1962','2019-09-17 19:54:36',0,0,NULL);
insert  into `_tbl_member_nominiinformation`(`NominationID`,`MemberID`,`MemberCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`AddedOn`,`IsActive`,`NomineeVerified`,`NomineeVerifiedOn`) values (2,1,'5H100002000030001','K,VIJAYAKUMAR','HUSBAND','18-11-1962','2019-09-17 20:25:06',0,0,NULL);
insert  into `_tbl_member_nominiinformation`(`NominationID`,`MemberID`,`MemberCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`AddedOn`,`IsActive`,`NomineeVerified`,`NomineeVerifiedOn`) values (3,1290,'5H100002000030143','V.NIRMALAKUMARI','MOTHER','17-07-1967','2019-10-23 15:46:32',0,0,NULL);
insert  into `_tbl_member_nominiinformation`(`NominationID`,`MemberID`,`MemberCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`AddedOn`,`IsActive`,`NomineeVerified`,`NomineeVerifiedOn`) values (4,1290,'5H100002000030143','K.VIJAYAKUMAR','FATHER','18-11-1962','2019-10-23 15:51:26',0,0,NULL);
insert  into `_tbl_member_nominiinformation`(`NominationID`,`MemberID`,`MemberCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`AddedOn`,`IsActive`,`NomineeVerified`,`NomineeVerifiedOn`) values (5,1151,'5H100002000030004','VIJAYAKUMAR.K','HUSBAND','18-11-1962','2019-10-26 18:22:15',0,0,NULL);
insert  into `_tbl_member_nominiinformation`(`NominationID`,`MemberID`,`MemberCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`AddedOn`,`IsActive`,`NomineeVerified`,`NomineeVerifiedOn`) values (6,1150,'5H100002000030003','K.VIJAYAKUMAR','HUSBAND','18-11-1962','2019-10-26 18:24:55',0,0,NULL);
insert  into `_tbl_member_nominiinformation`(`NominationID`,`MemberID`,`MemberCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`AddedOn`,`IsActive`,`NomineeVerified`,`NomineeVerifiedOn`) values (7,1182,'5H100002000030035','Raja','Brother','2000-02-25','2019-11-18 20:32:26',0,1,'2019-11-18 21:02:33');
insert  into `_tbl_member_nominiinformation`(`NominationID`,`MemberID`,`MemberCode`,`NominiName`,`NominiRelation`,`NominiDateOfBirth`,`AddedOn`,`IsActive`,`NomineeVerified`,`NomineeVerifiedOn`) values (8,1272,'5H100002000030125','Muralikrishnan M','BROTHER','01/01/2000','2019-11-21 12:50:19',0,0,NULL);

/*Table structure for table `_tbl_member_withdraw_request` */

DROP TABLE IF EXISTS `_tbl_member_withdraw_request`;

CREATE TABLE `_tbl_member_withdraw_request` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `RequestedOn` datetime DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `IsApproved` int(11) DEFAULT '0',
  `IsApprovedOn` datetime DEFAULT NULL,
  `IsRejected` int(11) DEFAULT '0',
  `IsRejectedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`RequestID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_member_withdraw_request` */

insert  into `_tbl_member_withdraw_request`(`RequestID`,`MemberID`,`RequestedOn`,`Amount`,`BankName`,`AccountNumber`,`IFSCode`,`AccountName`,`IsApproved`,`IsApprovedOn`,`IsRejected`,`IsRejectedOn`) values (1,1,'2019-09-13 15:32:27','100','Indian Overseas Bank','5435354554','IOB0001','Member!',0,NULL,0,NULL);

/*Table structure for table `_tbl_noticeboard` */

DROP TABLE IF EXISTS `_tbl_noticeboard`;

CREATE TABLE `_tbl_noticeboard` (
  `NewsID` int(10) NOT NULL AUTO_INCREMENT,
  `NewsTitle` varchar(255) DEFAULT NULL,
  `NewsText` text,
  `CreatedOn` datetime DEFAULT NULL,
  `IsPublish` int(11) DEFAULT NULL,
  PRIMARY KEY (`NewsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_noticeboard` */

/*Table structure for table `_tbl_placements` */

DROP TABLE IF EXISTS `_tbl_placements`;

CREATE TABLE `_tbl_placements` (
  `PlacementID` int(11) NOT NULL AUTO_INCREMENT,
  `ParentMemberID` int(11) DEFAULT NULL,
  `ParentMemberCode` varchar(255) DEFAULT NULL,
  `ParentMemberName` varchar(255) DEFAULT NULL,
  `UplineMemberID` int(11) DEFAULT NULL,
  `UplineMemberCode` varchar(255) DEFAULT NULL,
  `UpilneMemberName` varchar(255) DEFAULT NULL,
  `ChildMemberID` int(11) DEFAULT NULL,
  `ChildMemberCode` varchar(255) DEFAULT NULL,
  `ChildMemberName` varchar(255) DEFAULT NULL,
  `PlacementedOn` datetime DEFAULT NULL,
  `PlacementedID` int(11) DEFAULT NULL,
  `PlacementedCode` varchar(255) DEFAULT NULL,
  `PlacementedName` varchar(255) DEFAULT NULL,
  `IsDirect` int(11) DEFAULT NULL,
  `HLevel` int(11) DEFAULT NULL,
  `UsedPinID` int(11) DEFAULT NULL,
  `IsPayable` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`PlacementID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_placements` */

/*Table structure for table `_tbl_points` */

DROP TABLE IF EXISTS `_tbl_points`;

CREATE TABLE `_tbl_points` (
  `PointID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `ProductCode` varchar(255) DEFAULT NULL,
  `Points` varchar(255) DEFAULT NULL,
  `Credits` varchar(255) DEFAULT NULL,
  `UpdatedOn` datetime DEFAULT NULL,
  `IsConverted` int(11) DEFAULT NULL,
  `ConvertedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PointID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_points` */

/*Table structure for table `_tbl_products` */

DROP TABLE IF EXISTS `_tbl_products`;

CREATE TABLE `_tbl_products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductCode` varchar(255) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductDescription` varchar(255) DEFAULT NULL,
  `ProductPrice` varchar(255) DEFAULT NULL,
  `Credits` int(11) DEFAULT NULL,
  `Points` int(1) DEFAULT '0',
  `IsActive` int(1) DEFAULT '1',
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_products` */

/*Table structure for table `_tbl_sold_epins` */

DROP TABLE IF EXISTS `_tbl_sold_epins`;

CREATE TABLE `_tbl_sold_epins` (
  `SoldPinID` int(11) NOT NULL AUTO_INCREMENT,
  `PinID` int(11) DEFAULT NULL,
  `PinCode` varchar(255) DEFAULT NULL,
  `EPinPassword` varchar(255) DEFAULT NULL,
  `GeneratedByID` varchar(255) DEFAULT NULL,
  `GeneratedByName` varchar(255) DEFAULT NULL,
  `CreatedByCode` varchar(255) DEFAULT NULL,
  `TransferedOn` datetime DEFAULT NULL,
  `PinValue` varchar(255) DEFAULT NULL,
  `IsSold` int(11) DEFAULT '0',
  `SoldMemberID` int(11) DEFAULT NULL,
  `SoldMemberCode` varchar(255) DEFAULT NULL,
  `SoldMemberName` varchar(255) DEFAULT NULL,
  `SoldOn` datetime DEFAULT NULL,
  `SoldMemberToID` int(11) DEFAULT NULL,
  `SoldMemberToCode` varchar(255) DEFAULT NULL,
  `SoldMemberToName` varchar(255) DEFAULT NULL,
  `SoldOndateTotime` datetime DEFAULT NULL,
  PRIMARY KEY (`SoldPinID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sold_epins` */

/*Table structure for table `_tbl_stage_incomes` */

DROP TABLE IF EXISTS `_tbl_stage_incomes`;

CREATE TABLE `_tbl_stage_incomes` (
  `stageincomeid` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `StageID` int(11) DEFAULT NULL,
  `CountNo` int(11) DEFAULT NULL,
  `EarnAmount` varchar(255) DEFAULT NULL,
  `AccountTxnID` int(11) DEFAULT NULL,
  `TxnDate` datetime DEFAULT NULL,
  PRIMARY KEY (`stageincomeid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_stage_incomes` */

/*Table structure for table `_tbl_tags` */

DROP TABLE IF EXISTS `_tbl_tags`;

CREATE TABLE `_tbl_tags` (
  `LevelTagID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT '0',
  `MemberCode` varchar(255) DEFAULT NULL,
  `LevelTag` int(11) DEFAULT '0',
  `LevelLable` varchar(255) DEFAULT NULL,
  `Required` int(11) DEFAULT '0',
  `Filled` int(11) DEFAULT '0',
  `TagCreated` datetime DEFAULT NULL,
  `TagClosed` datetime DEFAULT NULL,
  `LastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`LevelTagID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_tags` */

insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (1,1,'5H100002000030001',1,'Star',5,13,'2020-09-17 12:49:55',NULL,'2020-09-18 19:16:40');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (2,1304,'5H100002000030002',1,'Star',5,9,'2020-09-19 07:44:06',NULL,'2020-09-28 14:06:28');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (3,1319,'5H100002000030017',1,'Star',5,1,'2020-10-16 09:47:23',NULL,'2020-10-16 09:47:23');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (4,1320,'5H100002000030018',1,'Star',5,1,'2020-10-16 09:50:26',NULL,'2020-10-16 09:50:26');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (5,1321,'5H100002000030019',1,'Star',5,2,'2020-10-16 09:52:40',NULL,'2020-10-16 09:53:36');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (6,1322,'5H100002000030020',1,'Star',5,1,'2020-10-16 09:55:46',NULL,'2020-10-16 09:55:46');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (7,1323,'5H100002000030021',1,'Star',5,1,'2020-10-16 09:57:50',NULL,'2020-10-16 09:57:50');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (8,1324,'5H100002000030022',1,'Star',5,1,'2020-10-16 09:59:59',NULL,'2020-10-16 09:59:59');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (9,1325,'5H100002000030023',1,'Star',5,1,'2020-10-16 10:01:45',NULL,'2020-10-16 10:01:45');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (10,1326,'5H100002000030024',1,'Star',5,1,'2020-10-16 10:03:17',NULL,'2020-10-16 10:03:17');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (11,1327,'5H100002000030025',1,'Star',5,1,'2020-10-16 10:04:53',NULL,'2020-10-16 10:04:53');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (12,1328,'5H100002000030026',1,'Star',5,1,'2020-10-16 10:06:34',NULL,'2020-10-16 10:06:34');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (13,1329,'5H100002000030027',1,'Star',5,1,'2020-10-16 10:07:54',NULL,'2020-10-16 10:07:54');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (14,1330,'5H100002000030028',1,'Star',5,1,'2020-10-16 10:09:18',NULL,'2020-10-16 10:09:18');
insert  into `_tbl_tags`(`LevelTagID`,`MemberID`,`MemberCode`,`LevelTag`,`LevelLable`,`Required`,`Filled`,`TagCreated`,`TagClosed`,`LastUpdated`) values (15,1331,'5H100002000030029',1,'Star',5,1,'2020-10-16 10:10:34',NULL,'2020-10-16 10:10:34');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
