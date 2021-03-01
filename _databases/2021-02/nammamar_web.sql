/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - nammamar_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nammamar_web` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `nammamar_web`;

/*Table structure for table `_jalbum` */

DROP TABLE IF EXISTS `_jalbum`;

CREATE TABLE `_jalbum` (
  `albumid` int(11) NOT NULL AUTO_INCREMENT,
  `albumtit` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `albumdesc` text CHARACTER SET latin1,
  `filepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ispublish` int(2) NOT NULL DEFAULT '0',
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`albumid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jalbum` */

/*Table structure for table `_japp` */

DROP TABLE IF EXISTS `_japp`;

CREATE TABLE `_japp` (
  `appid` int(11) NOT NULL AUTO_INCREMENT,
  `hostname` varchar(255) DEFAULT NULL,
  `datadir` varchar(255) DEFAULT NULL,
  `dbname` varchar(255) DEFAULT NULL,
  `dateofcreation` datetime DEFAULT NULL,
  `licenceto` varchar(255) DEFAULT NULL,
  `hosturl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_japp` */

insert  into `_japp`(`appid`,`hostname`,`datadir`,`dbname`,`dateofcreation`,`licenceto`,`hosturl`) values (1,'nammamarriage.com','data','nammamar_web','2019-12-10 00:00:00','nammamarriage.com/','nammamarriage.com');

/*Table structure for table `_jcontact` */

DROP TABLE IF EXISTS `_jcontact`;

CREATE TABLE `_jcontact` (
  `contactid` int(11) NOT NULL AUTO_INCREMENT,
  `contacttitle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `contactdescription` text CHARACTER SET latin1,
  `contactmobile` int(11) NOT NULL,
  `contactemail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jcontact` */

/*Table structure for table `_jcontactus` */

DROP TABLE IF EXISTS `_jcontactus`;

CREATE TABLE `_jcontactus` (
  `contid` int(11) NOT NULL AUTO_INCREMENT,
  `contmob` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `contemail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `personname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `convtime` varchar(255) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`contid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jcontactus` */

/*Table structure for table `_jdayevent` */

DROP TABLE IF EXISTS `_jdayevent`;

CREATE TABLE `_jdayevent` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `edate` datetime DEFAULT NULL,
  `descT` text CHARACTER SET latin1,
  `descE` text CHARACTER SET latin1,
  `descM` text CHARACTER SET latin1,
  `eventcate` int(11) NOT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jdayevent` */

/*Table structure for table `_jdownalbum` */

DROP TABLE IF EXISTS `_jdownalbum`;

CREATE TABLE `_jdownalbum` (
  `dalbumid` int(11) NOT NULL AUTO_INCREMENT,
  `albumtit` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `albumdesc` text CHARACTER SET latin1,
  `filepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ispublish` int(11) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`dalbumid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jdownalbum` */

/*Table structure for table `_jdownloads` */

DROP TABLE IF EXISTS `_jdownloads`;

CREATE TABLE `_jdownloads` (
  `downloadid` int(11) NOT NULL AUTO_INCREMENT,
  `downloadtitle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `downloaddescription` text CHARACTER SET latin1,
  `downloadfilepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ispublished` int(11) NOT NULL,
  `albumid` int(11) DEFAULT NULL,
  `thumbfile` varchar(255) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`downloadid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jdownloads` */

/*Table structure for table `_jfaq` */

DROP TABLE IF EXISTS `_jfaq`;

CREATE TABLE `_jfaq` (
  `faqid` int(11) NOT NULL AUTO_INCREMENT,
  `faqquestion` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `faqanswer` text CHARACTER SET latin1,
  `ispublished` int(11) NOT NULL,
  `postedon` datetime DEFAULT NULL,
  `isusefulY` int(5) DEFAULT '1',
  `isusefulN` int(5) DEFAULT '0',
  PRIMARY KEY (`faqid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `_jfaq` */

insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (2,'How can I register on nammamarriage.com ?','Registering in our wedlink matrimony site is a simple process, you can register by filling the online registration that runs for 3 pages or use the Quick registration form, a shorter and simpler process available. You can also call our customer support staff  and can register over mobile phone also from 10.00 am to 6.30 pm. ',1,'2019-10-29 10:21:36',3,1);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (3,'I did my registration, but my profile does not show up online ?','Every new profile will be validated by our ADMIN (Backend Team) and upon activation, your profile will be visible to all ! Verification of profiles is done manually. Our support team checks each and every profile carefully for any invalid or incorrect information and also candidates are contacted over the phone for confirmation of authority. You will get a notification once the profile is active !',1,'2019-10-29 10:21:49',2,0);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (4,' Can I upload my photograph?','You have the option of uploading your photograph on My Profile Page. You can upload a maximum of three photographs.',1,'2019-10-29 10:22:05',2,0);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (5,'How do I upload Horoscope ?','We have an exclusive interface to key in your horoscope details. Login to your Matrimony account and click Manage Horoscope',1,'2019-10-29 10:22:21',2,0);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (6,'Can I edit all my details ?','At any time, you can update your profile by clicking Modify My Profile button .',1,'2019-10-29 10:22:35',2,0);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (7,'I see a tab called MY MATCHES, Whatâ€™s the use of it ?','My Matches fetches the profiles matching your partner preferences that you keyed in while registering your profile. Its dynamically updated',1,'2019-10-29 10:22:48',1,0);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (8,'Can I shortlist/bookmark a Profile ?','Yes, you can ! Its an useful feature to make a note of the interested profiles. You need to be logged in to use the shortlist feature.',1,'2019-10-29 10:23:03',1,0);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (9,'How do I delete Shortlisted profiles?','Login using your matrimonial \"User ID\" and \"Password\". Click on the \"Shortlisted Profiles\". You could view and delete the Bookmarked members !',1,'2019-10-29 10:23:16',1,0);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (10,'Is my personal information safe?','Please read our privacy policy displayed seperately',1,'2019-10-29 10:23:31',1,0);
insert  into `_jfaq`(`faqid`,`faqquestion`,`faqanswer`,`ispublished`,`postedon`,`isusefulY`,`isusefulN`) values (11,'Why should I choose your paid membership package ?','A paid membership have various packages and options to help you access advanced features of nammamarriage.com. Its Benefits : Search suitable profile through our matrimonial Website Contact suitable matches via contact number, personalized messages, and customer service. Send and receive personalized messages. Customer care support. Paid Matrimonial Members get top services and benefits that are not available to members who choose a free membership. Paid Matrimonial Members can express interest and write messages to other members of nammamarriage.com',1,'2019-10-29 10:24:07',1,0);

/*Table structure for table `_jfeature` */

DROP TABLE IF EXISTS `_jfeature`;

CREATE TABLE `_jfeature` (
  `featureid` int(11) NOT NULL AUTO_INCREMENT,
  `featurename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`featureid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `_jfeature` */

insert  into `_jfeature`(`featureid`,`featurename`) values (1,'Brand Name');

/*Table structure for table `_jfonts` */

DROP TABLE IF EXISTS `_jfonts`;

CREATE TABLE `_jfonts` (
  `fontid` int(11) NOT NULL AUTO_INCREMENT,
  `fontname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `fontpath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`fontid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `_jfonts` */

insert  into `_jfonts`(`fontid`,`fontname`,`fontpath`) values (1,'Oswald','http://fonts.googleapis.com/css?family=Oswald');
insert  into `_jfonts`(`fontid`,`fontname`,`fontpath`) values (2,'Droid Sans','http://fonts.googleapis.com/css?family=Droid+Sans');

/*Table structure for table `_jitemcategory` */

DROP TABLE IF EXISTS `_jitemcategory`;

CREATE TABLE `_jitemcategory` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `_jitemcategory` */

insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (10,'Cotton');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (11,'Cotton Kurti');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (12,'Cotton Synthetic Chudi');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (13,'Cotton Synthetic');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (14,'Cotton Synthetic Saree');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (15,'Cotton Nighty');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (16,'Cotton Shirts');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (17,'Silk Cotton Saree');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (18,'Cotton Saree');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (19,'Fancy Cotton');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (20,'Cotton Chudithar Material');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (21,'Batik Special');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (22,'Karachi Style');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (23,'Blouse Material');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (24,'Stiched Kurti');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (25,'Unstiched Kurti');
insert  into `_jitemcategory`(`categoryid`,`categoryname`) values (26,'Silk Cotton Chudi');

/*Table structure for table `_jlisting` */

DROP TABLE IF EXISTS `_jlisting`;

CREATE TABLE `_jlisting` (
  `itemid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) NOT NULL DEFAULT '0',
  `itemname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `itemdesc` text CHARACTER SET latin1,
  `itemprice` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `ispublished` int(11) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  `itemfilename` varchar(255) DEFAULT NULL,
  `shortdescription` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

/*Data for the table `_jlisting` */

insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (43,10,'Aarvi Fashions ','<p>cotton</p>','20','_1504527464_kkk_copy.png',1,'2017-09-04 12:12:12','aarvi-fashions','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (44,11,'Me Style','<p>cotton</p>','10','1504603070787de4d38ad008b01e4fe98f341cd472.png',1,'2017-09-05 09:17:55','me-style','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (45,18,'Bagalpori Mercrised Cotten','<p>cotton</p>','22','_1504855210_67.png',1,'2017-09-05 09:27:00','bagalpori-mercrised-cotten','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (46,12,'Cotton Chudi ','<p>cotton</p>','25','_1504780179_111.png',1,'2017-09-05 09:51:39','cotton-chudi','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (47,17,'Silk Cotton','<p>cotton</p>','100','1504605904d58ecf97bf17509290e60d80bdaa1a5d.png',1,'2017-09-05 10:05:12','silk-cotton','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (48,12,'Angroop Mokshaa','<p>chudi</p>','150','150460636094d42922eadf104f6899d22d40cdfd73.png',1,'2017-09-05 10:12:46','angroop-mokshaa','chudi','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (49,14,'Baalar Pari','<p>cotton</p>','390','1504607813dd45c1dc32d2f6a7a7a0964d07175224.png',1,'2017-09-05 10:36:58','baalar-pari','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (50,20,'Gogars ','<p>chudi</p>','400','15046082414a753b73edfd855a9d831b7775347ffc.png',1,'2017-09-05 10:44:06','gogars','chudi','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (51,22,'Aarvi Roop Mohini','<p>chudi</p>','56','_1504609302_mo_copy.png',1,'2017-09-05 10:56:22','aarvi-roop-mohini','chudi ','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (52,24,'Angroop Dairy Milk','<p>kurti</p>','44','1504612507a6353b8a53d2392b2d8a331663249bb6.png',1,'2017-09-05 11:55:12','angroop-dairy-milk','kurti','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (53,21,'Aarvi Batik Spcial','<p>batik</p>','300','15047615797cc97f464a27cbc5d41cef4973dbe6db.png',1,'2017-09-07 05:19:45','aarvi-batik-spcial','batik','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (54,10,'Aarvi Prachi ','<p>cotton</p>','39','15047628551a4e0e6fe555ef32e005cc9420d08d53.png',1,'2017-09-07 05:41:03','aarvi-prachi','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (55,19,'Aarvi Mahi Vol 2 Patiyala','<p>patiyala</p>','40','1504763496a50a37ea199ed374a7726da2769e1c7e.png',1,'2017-09-07 05:51:40','aarvi-mahi-vol-2-patiyala','patiyala','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (56,19,'Aarvi Rangoli','<p>rangoli</p>','500','1504764160c8794bfad1ea6b11725ef7a15432b4f5.png',1,'2017-09-07 06:02:44','aarvi-rangoli','rangoli','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (57,20,'Aarvi Madhubani','<p>madhubani</p>','500','15047645280387f1a49b444fc20d000c81be0f8252.png',1,'2017-09-07 06:08:52','aarvi-madhubani','madhubani','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (58,13,'Aarvi Bandhej','<p>cotton</p>','600','1504765094d7dae310d9979aeca564e73c9059fa6c.png',1,'2017-09-07 06:18:19','aarvi-bandhej','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (59,13,'Aarvi Odhani','<p>cotton</p>','300','1504765514f61656bebb0d05ee84ace59e8e253f49.png',1,'2017-09-07 06:25:19','aarvi-odhani','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (60,14,'Deeptex Mother India Vol 21','<p>deeptex</p>','500','1504766535bbca760a565298e274c912811d81bc4b.png',1,'2017-09-07 06:42:19','deeptex-mother-india-vol-21','Deeptex','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (61,20,'Pranjul Priyanka Patiyala Spl 9','<p>cotton</p>','300','15047692102972bf23bea0c24454f2df3f661f3e2d.png',1,'2017-09-07 07:27:04','pranjul-priyanka-patiyala-spl-9','cotton','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (62,24,'Pranjul Pankhuri Kurti Fabrics Vol 4','<p>kurti</p>','1000','15047721262d14bef1d456ded29a7d527d6d4786d6.png',1,'2017-09-07 08:15:33','pranjul-pankhuri-kurti-fabrics-vol-4','kurti','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (63,26,'Baalar Collection','<p>chudi</p>','500','150484986037e04b80586b9e68ca23e204b855fdde.png',1,'2017-09-08 05:51:05','baalar-collection','chudi','');
insert  into `_jlisting`(`itemid`,`categoryid`,`itemname`,`itemdesc`,`itemprice`,`filename`,`ispublished`,`postedon`,`itemfilename`,`shortdescription`,`keywords`) values (64,26,'Baalar Premium Collection','<p>chudi</p>','2000','1504852905eaa4ec2fd091a8a75bb648a51f7c8353.png',1,'2017-09-08 06:41:50','baalar-premium-collection','chudi','');

/*Table structure for table `_jlistingfeature` */

DROP TABLE IF EXISTS `_jlistingfeature`;

CREATE TABLE `_jlistingfeature` (
  `itemfeatureid` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) DEFAULT NULL,
  `featureid` int(11) DEFAULT NULL,
  `itemvalue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`itemfeatureid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `_jlistingfeature` */

/*Table structure for table `_jlistingimg` */

DROP TABLE IF EXISTS `_jlistingimg`;

CREATE TABLE `_jlistingimg` (
  `itemimgid` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL DEFAULT '0',
  `filename` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ispublished` int(11) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`itemimgid`)
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=utf8;

/*Data for the table `_jlistingimg` */

insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (165,18,'_1501563979_white.jpg',1,'2017-08-01 05:06:19');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (166,18,'_1501563994_53b1618198a9299e9b625a1213da01a3_large.jpg',1,'2017-08-01 05:06:34');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (167,18,'_1501564094_2003-tata-indigo-gls---75-000-kms-driven-in-old-navy-nagar-vb201705171774173-ak_lwbp480413606-1500485918_gv.jpeg',1,'2017-08-01 05:08:14');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (168,34,'_1501564579_amba.jpg',1,'2017-08-01 05:16:19');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (169,34,'_1501564602_ambassador-car-and-goat-fort-kochi-india.jpg',1,'2017-08-01 05:16:42');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (170,34,'_1501564637_ambassador-car.jpg',1,'2017-08-01 05:17:17');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (171,34,'_1501564665__1501137337_real_sweet_ambassador!.jpg',1,'2017-08-01 05:17:45');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (172,31,'_1502952590_loyu.jpg',1,'2017-08-17 06:49:50');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (173,31,'_1502952603_loyjki.jpg',0,'2017-08-17 06:50:03');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (174,31,'_1502952616_loyu2.jpg',1,'2017-08-17 06:50:16');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (175,31,'_1502952628_loyukl.jpg',1,'2017-08-17 06:50:28');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (176,31,'_1502952676_loyu2.jpg',1,'2017-08-17 06:51:16');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (179,43,'_1504595602_amr_copy.png',1,'2017-09-05 07:13:22');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (180,43,'_1504595857_sd_copy.png',1,'2017-09-05 07:17:37');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (181,43,'_1504596083_aop_copy.png',1,'2017-09-05 07:21:23');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (182,43,'_1504596395_mu_copy.png',1,'2017-09-05 07:26:35');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (183,43,'_1504596589_yyy_copy.png',1,'2017-09-05 07:29:49');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (184,43,'_1504596786_nf_copy.png',1,'2017-09-05 07:33:06');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (185,43,'_1504596908_do_copy.png',1,'2017-09-05 07:35:08');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (186,43,'_1504600822_ff_copy.png',1,'2017-09-05 08:40:22');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (187,44,'_1504603121_pa_copy.png',1,'2017-09-05 09:18:41');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (188,51,'_1504611165_1.png',1,'2017-09-05 11:32:45');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (189,51,'_1504611182_2.png',1,'2017-09-05 11:33:02');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (190,51,'_1504611198_3.png',1,'2017-09-05 11:33:18');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (191,51,'_1504611217_4.png',1,'2017-09-05 11:33:37');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (192,51,'_1504611241_5.png',1,'2017-09-05 11:34:01');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (193,51,'_1504611269_6.png',1,'2017-09-05 11:34:29');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (194,51,'_1504611297_7.png',1,'2017-09-05 11:34:57');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (195,51,'_1504611318_8.png',1,'2017-09-05 11:35:18');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (196,51,'_1504611340_9.png',1,'2017-09-05 11:35:40');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (197,51,'_1504611360_10.png',1,'2017-09-05 11:36:00');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (198,52,'_1504612539_2.png',1,'2017-09-05 11:55:39');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (199,52,'_1504612574_3.png',1,'2017-09-05 11:56:14');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (200,52,'_1504612590_4.png',1,'2017-09-05 11:56:30');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (201,52,'_1504612604_5.png',1,'2017-09-05 11:56:44');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (202,52,'_1504612633_7.png',1,'2017-09-05 11:57:13');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (203,52,'_1504613034_8.png',1,'2017-09-05 12:03:54');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (204,53,'_1504761718_2.png',1,'2017-09-07 05:21:58');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (205,54,'_1504762895_1.png',1,'2017-09-07 05:41:35');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (206,55,'_1504763631_3.png',1,'2017-09-07 05:53:51');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (207,56,'_1504764193_2.png',1,'2017-09-07 06:03:13');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (208,58,'_1504765128_2.png',1,'2017-09-07 06:18:48');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (209,59,'_1504765655_odahni_2.png',1,'2017-09-07 06:27:35');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (210,59,'_1504765780_odahani_3.png',1,'2017-09-07 06:29:40');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (211,60,'_1504766574_2.png',1,'2017-09-07 06:42:54');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (212,60,'_1504766987_3.png',1,'2017-09-07 06:49:47');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (213,60,'_1504767014_4.png',1,'2017-09-07 06:50:14');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (214,60,'_1504767063_6.png',1,'2017-09-07 06:51:03');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (215,60,'_1504767098_5.png',1,'2017-09-07 06:51:38');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (216,61,'_1504771300_2.png',1,'2017-09-07 08:01:40');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (217,61,'_1504771321_3.png',1,'2017-09-07 08:02:01');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (218,61,'_1504771340_4.png',1,'2017-09-07 08:02:20');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (219,61,'_1504771593_5.png',1,'2017-09-07 08:06:33');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (220,61,'_1504771608_6.png',1,'2017-09-07 08:06:48');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (221,62,'_1504772559_2.png',1,'2017-09-07 08:22:39');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (222,62,'_1504772575_3.png',1,'2017-09-07 08:22:55');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (223,62,'_1504772592_4.png',1,'2017-09-07 08:23:12');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (224,62,'_1504772612_5.png',1,'2017-09-07 08:23:32');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (225,62,'_1504772632_7.png',1,'2017-09-07 08:23:52');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (226,48,'_1504773031_1.png',1,'2017-09-07 08:30:31');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (227,48,'_1504773541_2.png',1,'2017-09-07 08:39:01');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (228,48,'_1504773558_3.png',1,'2017-09-07 08:39:18');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (229,58,'_1504774248_4.png',1,'2017-09-07 08:50:48');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (230,58,'_1504774265_5.png',1,'2017-09-07 08:51:05');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (231,58,'_1504774279_6.png',1,'2017-09-07 08:51:19');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (232,58,'_1504774293_7.png',1,'2017-09-07 08:51:33');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (233,58,'_1504774310_8.png',1,'2017-09-07 08:51:50');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (234,56,'_1504774820_3.png',1,'2017-09-07 09:00:20');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (235,56,'_1504774840_4.png',1,'2017-09-07 09:00:40');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (236,56,'_1504774856_5.png',1,'2017-09-07 09:00:56');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (237,56,'_1504774875_6.png',1,'2017-09-07 09:01:15');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (241,55,'_1504775656_4.png',1,'2017-09-07 09:14:16');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (242,55,'_1504775672_5.png',1,'2017-09-07 09:14:32');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (243,55,'_1504775691_6.png',1,'2017-09-07 09:14:51');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (244,55,'_1504775707_7.png',1,'2017-09-07 09:15:07');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (245,54,'_1504776130_8.png',1,'2017-09-07 09:22:10');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (246,54,'_1504776149_9.png',1,'2017-09-07 09:22:29');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (247,54,'_1504776210_10.png',1,'2017-09-07 09:23:30');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (248,53,'_1504776687_67.png',1,'2017-09-07 09:31:27');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (249,53,'_1504776707_68.png',1,'2017-09-07 09:31:47');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (250,53,'_1504776732_69.png',1,'2017-09-07 09:32:12');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (251,50,'_1504777563_3.png',1,'2017-09-07 09:46:03');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (252,50,'_1504777596_4.png',1,'2017-09-07 09:46:36');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (253,50,'_1504777616_5.png',1,'2017-09-07 09:46:56');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (254,50,'_1504777636_6.png',1,'2017-09-07 09:47:16');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (255,50,'_1504777654_7.png',1,'2017-09-07 09:47:34');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (256,49,'_1504778774_10.png',1,'2017-09-07 10:06:14');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (257,49,'_1504778789_11.png',1,'2017-09-07 10:06:29');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (258,49,'_1504778806_12.png',1,'2017-09-07 10:06:46');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (259,49,'_1504778822_13.png',1,'2017-09-07 10:07:02');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (260,49,'_1504778841_14.png',1,'2017-09-07 10:07:21');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (261,47,'_1504779257_16.png',1,'2017-09-07 10:14:17');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (262,47,'_1504779276_17.png',1,'2017-09-07 10:14:36');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (263,47,'_1504779367_18.png',1,'2017-09-07 10:16:07');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (264,47,'_1504779484_19.png',1,'2017-09-07 10:18:04');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (265,46,'_1504779978_24.png',1,'2017-09-07 10:26:18');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (266,46,'_1504779996_25.png',1,'2017-09-07 10:26:36');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (267,46,'_1504780022_22.png',1,'2017-09-07 10:27:02');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (268,46,'_1504780036_23.png',1,'2017-09-07 10:27:16');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (276,44,'_1504785865_108.png',1,'2017-09-07 12:04:25');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (277,44,'_1504785898_109.png',1,'2017-09-07 12:04:58');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (278,44,'_1504785928_110.png',1,'2017-09-07 12:05:28');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (279,63,'_1504849941_35.png',1,'2017-09-08 05:52:21');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (280,63,'_1504849958_36.png',1,'2017-09-08 05:52:38');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (281,63,'_1504849973_37.png',1,'2017-09-08 05:52:53');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (282,63,'_1504849987_38.png',1,'2017-09-08 05:53:07');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (283,63,'_1504850007_39.png',1,'2017-09-08 05:53:27');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (284,63,'_1504850718_41.png',1,'2017-09-08 06:05:18');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (285,63,'_1504850756_42.png',1,'2017-09-08 06:05:56');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (286,63,'_1504850776_43.png',1,'2017-09-08 06:06:16');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (287,63,'_1504850798_44.png',1,'2017-09-08 06:06:38');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (288,63,'_1504850817_45.png',1,'2017-09-08 06:06:57');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (289,63,'_1504850834_46.png',1,'2017-09-08 06:07:14');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (290,63,'_1504851453_47.png',1,'2017-09-08 06:17:33');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (291,63,'_1504851488_48.png',1,'2017-09-08 06:18:08');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (292,63,'_1504851508_49.png',1,'2017-09-08 06:18:28');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (293,63,'_1504851529_50.png',1,'2017-09-08 06:18:49');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (294,63,'_1504851547_51.png',1,'2017-09-08 06:19:07');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (296,63,'_1504851618_52.png',1,'2017-09-08 06:20:18');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (297,64,'_1504852946_53.png',1,'2017-09-08 06:42:26');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (298,64,'_1504852981_54.png',1,'2017-09-08 06:43:01');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (299,64,'_1504853000_55.png',1,'2017-09-08 06:43:20');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (300,64,'_1504853018_56.png',1,'2017-09-08 06:43:38');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (301,64,'_1504853038_57.png',1,'2017-09-08 06:43:58');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (302,64,'_1504853061_58.png',1,'2017-09-08 06:44:21');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (303,64,'_1504853779_60.png',1,'2017-09-08 06:56:19');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (304,64,'_1504853801_61.png',1,'2017-09-08 06:56:41');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (305,64,'_1504853821_62.png',1,'2017-09-08 06:57:01');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (307,64,'_1504853884_63.png',1,'2017-09-08 06:58:04');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (308,64,'_1504853904_64.png',1,'2017-09-08 06:58:24');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (309,64,'_1504853928_65.png',1,'2017-09-08 06:58:48');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (310,64,'_1504853962_66.png',1,'2017-09-08 06:59:22');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (311,45,'_1504855284_69.png',1,'2017-09-08 07:21:24');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (312,45,'_1504855321_70.png',1,'2017-09-08 07:22:01');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (313,45,'_1504855355_68.png',1,'2017-09-08 07:22:35');
insert  into `_jlistingimg`(`itemimgid`,`itemid`,`filename`,`ispublished`,`postedon`) values (314,45,'_1504855380_71.png',1,'2017-09-08 07:23:00');

/*Table structure for table `_jmaincateproduct` */

DROP TABLE IF EXISTS `_jmaincateproduct`;

CREATE TABLE `_jmaincateproduct` (
  `maincateid` int(11) NOT NULL AUTO_INCREMENT,
  `maincatename` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`maincateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jmaincateproduct` */

/*Table structure for table `_jmap` */

DROP TABLE IF EXISTS `_jmap`;

CREATE TABLE `_jmap` (
  `mapid` int(11) NOT NULL AUTO_INCREMENT,
  `mapcoding` text CHARACTER SET latin1,
  PRIMARY KEY (`mapid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jmap` */

/*Table structure for table `_jmenu` */

DROP TABLE IF EXISTS `_jmenu`;

CREATE TABLE `_jmenu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `pageid` int(11) DEFAULT '0',
  `orderf` int(2) DEFAULT '0',
  `isheader` int(2) DEFAULT '1',
  `target` int(2) DEFAULT '0',
  `customurl` varchar(255) DEFAULT NULL,
  `linkedto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

/*Data for the table `_jmenu` */

insert  into `_jmenu`(`menuid`,`menuname`,`pageid`,`orderf`,`isheader`,`target`,`customurl`,`linkedto`) values (110,'About Us',1,1,1,0,'','frmpage');
insert  into `_jmenu`(`menuid`,`menuname`,`pageid`,`orderf`,`isheader`,`target`,`customurl`,`linkedto`) values (113,'Contact Us',7,4,1,0,'','frmpage');
insert  into `_jmenu`(`menuid`,`menuname`,`pageid`,`orderf`,`isheader`,`target`,`customurl`,`linkedto`) values (114,'Search',NULL,3,1,0,'nammamarriage.com/search','exturl');
insert  into `_jmenu`(`menuid`,`menuname`,`pageid`,`orderf`,`isheader`,`target`,`customurl`,`linkedto`) values (115,'Plan',2,2,1,0,'','frmpage');

/*Table structure for table `_jmusics` */

DROP TABLE IF EXISTS `_jmusics`;

CREATE TABLE `_jmusics` (
  `musicid` int(11) NOT NULL AUTO_INCREMENT,
  `musictitle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `musicdescription` text CHARACTER SET latin1,
  `musicfilepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ispublished` int(11) NOT NULL,
  `albumid` int(11) DEFAULT NULL,
  `thumbfile` varchar(255) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`musicid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jmusics` */

/*Table structure for table `_jpages` */

DROP TABLE IF EXISTS `_jpages`;

CREATE TABLE `_jpages` (
  `pageid` int(11) NOT NULL AUTO_INCREMENT,
  `pagetitle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pagedescription` text CHARACTER SET latin1,
  `pagetype` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `filepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL,
  `ispublish` int(2) DEFAULT '0',
  `eventtime` date DEFAULT '0000-00-00',
  `ishomepage` int(2) DEFAULT '0',
  `noofvisit` int(11) DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `pagefilename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pageid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `_jpages` */

insert  into `_jpages`(`pageid`,`pagetitle`,`pagedescription`,`pagetype`,`filepath`,`postedon`,`lastmodified`,`ispublish`,`eventtime`,`ishomepage`,`noofvisit`,`keywords`,`description`,`pagefilename`) values (1,'About Us','<p><strong>Popular and Economical Plans for you. GET REGISTERED-GET MARRIED Happily. MARRIAGE MATRIMONY</strong> from nammamarriage a trusted and honest matrimony site for marriage alliances. We are a Chennai based mainly a tamil matrimony/marriage website .</p>\r\n<p><span> Matrimony- Time comes in the life of every person when he/she want to marry and settle in life.&nbsp; YES. &nbsp;Marriage is believed to be such an occasion, when one feels he/she is settled or started settling in life.</span></p>\r\n<p>It is generally said that matrimony alliances and&nbsp; marriages are made in Heaven. &nbsp;It literally means that for every person, his life partner has already been born and living somewhere, waiting for the great occasion. Many a times it is expressed by the parents that &lsquo;evanukunu / evalukunu oruthy/oruthan &nbsp;enkio porunthirukanum&rsquo;.</p>\r\n<p>Naturally the process of finding the life partner, who is already waiting, if you are a believer of destiny, has to be initiated and taken forward through many stages.</p>\r\n<p><strong>The General stages are:</strong></p>\r\n<p><strong> </strong>He / She has to decide that the time has come to initiate the search for LIFE PARTNER.</p>\r\n<p><span> </span>Deciding on factors like Education, Status, Employment, Family Setup etc.,&nbsp;and expectation from the LIFE PARTNER.</p>\r\n<p><span> </span>Make public the intention to marry and expectations of how the LIFE PARTNER should be.</p>\r\n<p><span> </span>In the earlier days not much thought were given to carry out the above process in a structured way and these were done in an informal way for many reasons like strong family ties, finding match with in the family circle of relatives, parents deciding &nbsp;marriages &nbsp;at the time of the birth of the child etc.</p>\r\n<p><strong>Matrimonial sites:</strong></p>\r\n<p>However in the last few years many changes have taken place in the mind set of the people and the emphasis of finding the partner within a small circle of family or place or community has given way to a more liberalised setup of allowing one to lookout for his / her partner who suits more for their mind and soul, whims and fancies, tastes and thoughts and looks etc.</p>\r\n<p><br />While one need not go into the merits of the different practices, it is generally felt that the process of marriage / choosing a life partner in matrimony is more complicated and has to be attended in great detail. &nbsp;Moreover the concept of Small family has evolved in the Indian context and with only one or two children; the parents wants to give their best &nbsp;efforts in this direction to find a suitable match, rather they feel a great responsibility in this regard.</p>\r\n<p>Generally it is said creativity needs inventions. &nbsp;In the context of changed scenario, in the marriages also, a gap was felt in finding a suitable marriage&nbsp; match as per the expectations. Changes taking place in the technology front has brought in the concept Online Matrimony Sites.</p>\r\n<p><br />With changes taking place, the concept of finding a life partner through online matrimonial sites has become an accepted practice in India and more and more people are finding their best life partner successfully through this process.</p>\r\n<p><br />While many online matrimony sites have come up and doing their might, &nbsp;it is felt &nbsp;that there is still a place and need for a dedicated matrimonial site taking up the issue more as a social cause and play a true bridge in establishing the contact between the Bride, Groom and their families.</p>\r\n<p>With these noble thoughts nammamarriage.COM has come up and our aim and objective is to provide a proper and committed platform to find their life partner forever in life.<br />Marriages in Indian context, is still a onetime event in one&rsquo;s life and we ensure that utmost care is taken.</p>\r\n<p><strong>Background of the promoters:</strong></p>\r\n<p><strong> </strong>www.nammamarriage.com&nbsp; site has been promoted because of the urge to do and take up some social causes in the minds of the two Ex-Bankers, Sri. R. Sridharan and Sri. C. Sundararajan who retired recently from their active service. Both are well known in the Banking circles for their long stint in their Trade union activities and served at the helm of affairs as top leaders for Bank officers Association in various parts of the country. The initiation of the matrimonial website nammamarriage.com is the first step in the above direction and free registration is allowed. In addition provision is made for Paid Membership with plans and providing host of benefits according to the plans available in the site. Contact information of Member\'s profile will display only to paid members.</p>\r\n<p><strong>We welcome more people to register in our matrimonial site www.nammamarriage.com&nbsp; and have a HAPPY MARRIAGE of two families.</strong></p>','P','','2020-02-29 05:27:47','2020-02-29 05:29:48',1,NULL,0,0,'','','about-us');
insert  into `_jpages`(`pageid`,`pagetitle`,`pagedescription`,`pagetype`,`filepath`,`postedon`,`lastmodified`,`ispublish`,`eventtime`,`ishomepage`,`noofvisit`,`keywords`,`description`,`pagefilename`) values (2,'Plan','<table align=\"center\" cellspacing=\"3\" cellpadding=\"2\" border=\"1\">\r\n        <tbody><tr class=\"greenbg1\">\r\n          <td class=\"ui-corner-top\"><h4>Features</h4></td>\r\n                    <td><h4>Plan 1</h4></td>\r\n                    <td><h4>Plan 2</h4></td>\r\n                    <td><h4>Plan 3</h4></td>\r\n                    <td><h4>Plan 4</h4></td>\r\n                  </tr>\r\n        <tr>\r\n          <td class=\"greybg2\">Package Cost </td>\r\n                    <td class=\"greybg2\">Rs. 499</td>\r\n                    <td class=\"greybg2\">Rs. 700</td>\r\n                    <td class=\"greybg2\">Rs. 1000</td>\r\n                    <td class=\"greybg2\">Rs. 5000</td>\r\n                  </tr>\r\n        <tr>\r\n          <td class=\"greybg3\">Validity</td>\r\n                    <td class=\"greybg3\">180 Days</td>\r\n                    <td class=\"greybg3\">270 Days</td>\r\n                    <td class=\"greybg3\">360 Days</td>\r\n                    <td class=\"greybg3\">360 Days</td>\r\n                  </tr>\r\n         \r\n        <tr>\r\n          <td class=\"greybg2\">Maximum number of contacts allowed</td>\r\n                    <td class=\"greybg2\">40          </td>\r\n                    <td class=\"greybg2\">50          </td>\r\n                    <td class=\"greybg2\">80          </td>\r\n                    <td class=\"greybg2\">50          </td>\r\n                  </tr>\r\n        <tr>\r\n          <td class=\"greybg3\">Maximum number of Express Interests allowed</td>\r\n                    <td class=\"greybg3\">40          </td>\r\n                    <td class=\"greybg3\">50          </td>\r\n                    <td class=\"greybg3\">80          </td>\r\n                    <td class=\"greybg3\">50          </td>\r\n                  </tr>\r\n    \r\n                \r\n      </tbody></table>','P','','2020-03-07 04:13:45','2020-03-07 04:13:45',1,NULL,0,0,'','','plan');
insert  into `_jpages`(`pageid`,`pagetitle`,`pagedescription`,`pagetype`,`filepath`,`postedon`,`lastmodified`,`ispublish`,`eventtime`,`ishomepage`,`noofvisit`,`keywords`,`description`,`pagefilename`) values (3,'Terms of Conditions','<p class=\"small\"><strong>Terms and Conditions governing usage of Nammamarriage. Com sites [Applicable for All Services]</strong></p>\r\n<p class=\"small\">Dear user, Welcome to Nammamarriage. Com your personal matchmaking advertiser. Nammamarriage. Com is an advertising platform providing targeted advertising services for matchmaking alliances and replaces the traditional newspaper classified. Our  services to you are subject to the following terms and conditions. On your visit or signing up at Nammamarriage. Com you consciously accept the terms and conditions as set out herein below. Please read the various services provided before making any payment in respect of any service.</p>\r\n<p class=\"small\">The Users availing services  shall be deemed to have read, understood and expressly accepted and agreed to the terms and conditions hereof and this agreement shall govern the relationship between you and sNammamarriage. Com  and all transactions or services shall be unconditionally binding between the parties without any reservation. All rights, privileges, obligations and liabilities with respect to any transactions or services by, with or in connection with Nammamarriage. Com for all purposes shall be governed by this agreement. The terms and conditions may be changed and/or altered by Nammamarriage. Com from time to time at its sole discretion. Your continued use of the Site pursuant to such change will constitute deemed acceptance of such changes</p>\r\n<p class=\"small\">The Nammamarriage.com Site is for the personal use of individual members only, and may not be used in connection with any commercial endeavours. You are not permitted to create multiple profiles. You shall use the Services only to market and promote your profile and to reach out to other Members for the purpose of seeking acceptance from relevant matches.</p>\r\n<p class=\"small\">You understand and hereby agree that all information, data, text, photographs, graphics, communications, tags, or other Content whether publicly posted or privately transmitted or otherwise made available to Nammamarriage.com or it’s members, are the sole responsibility of the person from whom such Content originated and shall be at the member\'s/person\'s sole risks and consequences. This means that you are solely responsible for all Content that you upload, post, email, transmit or otherwise make available via the service.</p>\r\n<p class=\"small\">Nammamarriage. Com does not control the content posted via the service and, as such, does not guarantee the accuracy, integrity or quality of such Content. Under no circumstances will Nammamarriage.com be liable in any way for any content, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of any content posted, emailed, transmitted or otherwise made available via the service.</p>\r\n<p class=\"small\">Nammamarriage.com reserves the right to verify the authenticity of content posted on the Site. In exercising this right, Nammamarriage. Com may ask you to provide any documentary or other form of evidence supporting the content you post on the Site. If you fail to produce such evidence, Nammamarriage.com may, in its sole discretion, terminate your Membership without a refund.</p>\r\n<p class=\"small\">Nammamarriage.com reserves the right to screen communications/advertisements that you may send to other Member(s) and also regulate the same by deleting unwarranted/obscene communications/advertisements at any time at its sole discretion without prior notice to any Member.  You are prohibited from displays of pornographic or sexually explicit material of any kind</p>\r\n<p class=\"small\">Nammamarriage.com shall act on the basis of the information that may be submitted by you, believing the same to be true and accurate even if the information is provided during the registration by your family, friends, relatives on your behalf under your express consent and is under no obligation to verify the accuracy or genuineness of the information submitted by you.</p>\r\n<p class=\"small\">We expect that you would complete the registration process with fairness and honesty while furnishing your personal information. You would appreciate that efficient and effective match making depend upon yourself furnishing true, accurate, current and complete information. You further undertake that you alone shall be responsible or liable for any information provided in this process.</p>\r\n<p class=\"small\">The minimum age for registering in is 18 years for women and 21 years for men and the maximum age limit is 50 years. You represent and warrant that you have the right, authority and legal capability to enter into this Agreement and that you are neither prohibited nor disabled by any law in force from entering into a contract.</p>\r\n<p class=\"small\">Members are requested not to include key details of the profile like phone number. E-mail or address in field other than the applicable field. Contact information of member\'s profile will display only to paid membership as per plans from their effective dates. Free membership is allowed for a limited time and Nammamarriage.com reserves the right to discontinue free membership at any time. </p>\r\n<p class=\"small\">You hereby confirm that as on date of this registration, you do not have any objection to receiving emails, messages and calls from Nammamarriage.com and members of Nammamarriage.com as long as you are a registered member of and undertake that this invitation and solicitation shall supersede any preferences set by you with any organisation/profile.</p>\r\n<p class=\"small\">It is understood that you have gone through the Terms and Conditions and agree to be bound by them .In case of any misrepresentation, Nammamarriage.comhereby reserves the right to forthwith terminate your membership and/or your right to use the services without any refund of any monies paid. You may terminate your membership at any time, for any reason by informing Nammamarriage.com in writing to terminate your Membership. In the event you terminate your membership, you will not be entitled to a refund of any unutilized subscription fees.</p>\r\n<p class=\"small\">You also unconditionally agree to indemnify Nammamarriage.com against all losses, damages, penalties, costs or consequences whether direct or indirect, that may arise out of any breach or violation of the aforesaid representation, commitment and undertaking.</p>','P','','2020-03-07 04:15:23','2020-03-07 04:15:23',1,NULL,0,0,'','','terms-of-conditions');
insert  into `_jpages`(`pageid`,`pagetitle`,`pagedescription`,`pagetype`,`filepath`,`postedon`,`lastmodified`,`ispublish`,`eventtime`,`ishomepage`,`noofvisit`,`keywords`,`description`,`pagefilename`) values (4,'Privacy Policy','<span class=\"small\">Please read and comprehend our Privacy Policy, which also governs your visit to Nammamarriage.com, to understand our practices. Members agree that their profile(s) may be crawled and indexed by search engines, and Nammamarriage.com shall not be responsible for such activities of other search engines. Nammamarriage.com is not responsible for any errors, omissions or representations on any of its pages or on any links or on any of the linked website pages and does not endorse any advertiser on its web pages in any manner and you are requested to verify the accuracy of all information on your own before undertaking any reliance on such information. Nammamarriage.com has the right to change its features and services from time to time as per policy of the company. As a registered user you are responsible for maintaining the confidentiality of your account and password provided. You also hereby expressly agree that the information provided by you is available to the other users of Nammamarriage.com also and that Nammamarriage.com neither has any control nor any responsibility or accountability if information is misused, exploited or abused by any third party. Nammamarriage.com reserve the right to refuse service, terminate accounts, remove or edit content, or cancel subscription at their sole discretion. Except for the purpose of promoting/advertising your profile for matchmaking purposes, you cannot engage in advertising to, or solicitation of, other Members to buy or sell any products or services through the Service. You understand and agree that Nammamarriage.com cannot monitor the conduct of its members off the Site. You will not transmit any chain letters or junk email to other Members. It is also a violation of these rules to use any information obtained from other members in order to harass, abuse, or harm another person, or in order to contact, advertise to, solicit, or sell to any Member without their prior explicit consent. Nammamarriage.com owns and retains all proprietary rights, including without limitation, all intellectual property rights in the nammamarriage.com Site. You may not use any automated processes, including IRC Bots, EXE\'s, CGI or any other programs/scripts to view content on or communicate/contact/respond/interact with Nammamarriage .com and/or its Members. Contact information of member’s profile will display only to paid members. Free membership is for limited time only.Nammamarriage.com reserves right to discontinue free membership at any time. Nammamarriage.com shall not be responsible for any loss or damage to any individual arising out of, or subsequent to, relations established pursuant to the use of the service.nammamarriage. co.in cannot guarantee and does not promise any specific results from use of the Site and/or the service. Except in jurisdictions where such provisions are restricted, in no event will Nammamarriage. co.in be liable to you or any third person for any indirect, consequential, exemplary, incidental, special or punitive damages, including lost profits arising from your use of the Site or the service, and regardless of the form of the action, will at all times be limited to the amount paid, if any, by you to Nammamarriage. co.in for the Service during the term of membership.</span>','P','','2020-03-07 04:15:45','2020-03-07 04:15:45',1,NULL,0,0,'','','privacy-policy');
insert  into `_jpages`(`pageid`,`pagetitle`,`pagedescription`,`pagetype`,`filepath`,`postedon`,`lastmodified`,`ispublish`,`eventtime`,`ishomepage`,`noofvisit`,`keywords`,`description`,`pagefilename`) values (5,'refund policy','<p>refund-policy</p>','P','','2020-03-07 04:16:12','2020-03-07 04:16:12',1,NULL,0,0,'','','refund-policy');
insert  into `_jpages`(`pageid`,`pagetitle`,`pagedescription`,`pagetype`,`filepath`,`postedon`,`lastmodified`,`ispublish`,`eventtime`,`ishomepage`,`noofvisit`,`keywords`,`description`,`pagefilename`) values (6,'Success Stories','<p>success-stories</p>','P','','2020-03-07 04:52:54','2020-03-07 04:52:54',1,NULL,0,0,'','','success-stories');
insert  into `_jpages`(`pageid`,`pagetitle`,`pagedescription`,`pagetype`,`filepath`,`postedon`,`lastmodified`,`ispublish`,`eventtime`,`ishomepage`,`noofvisit`,`keywords`,`description`,`pagefilename`) values (7,'Contact Us','<br><span><strong>Head Office:</strong></span><br>\r\nRoyapetai, Chennai&nbsp;<br>\r\nContact : 7598074291<br>\r\nEmail : support@nammamarriage.com<br>\r\n<p>&nbsp;</p>\r\n<span><strong>Branch Offices:</strong><br>\r\nNagercoil,&nbsp; Kanyakumari','P','','2020-03-09 04:05:41','2020-03-09 04:08:57',1,NULL,0,0,'','','contact-us');

/*Table structure for table `_jphotogallery` */

DROP TABLE IF EXISTS `_jphotogallery`;

CREATE TABLE `_jphotogallery` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `groupdescription` text CHARACTER SET latin1,
  `ispublished` int(11) NOT NULL,
  `filepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jphotogallery` */

/*Table structure for table `_jphotos` */

DROP TABLE IF EXISTS `_jphotos`;

CREATE TABLE `_jphotos` (
  `photoid` int(11) NOT NULL AUTO_INCREMENT,
  `phototitle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `photodescription` text CHARACTER SET latin1,
  `photofilepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ispublished` int(2) NOT NULL,
  `groupid` int(3) NOT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`photoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jphotos` */

/*Table structure for table `_jproduct` */

DROP TABLE IF EXISTS `_jproduct`;

CREATE TABLE `_jproduct` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `maincateid` int(11) NOT NULL DEFAULT '0',
  `subcateid` int(11) NOT NULL DEFAULT '0',
  `itemname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `itemdesc` text CHARACTER SET latin1,
  `itemprice` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ispublished` int(11) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jproduct` */

/*Table structure for table `_jreading` */

DROP TABLE IF EXISTS `_jreading`;

CREATE TABLE `_jreading` (
  `readingid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` text,
  `title_t` text,
  `details_t` text,
  PRIMARY KEY (`readingid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_jreading` */

/*Table structure for table `_jsitemap` */

DROP TABLE IF EXISTS `_jsitemap`;

CREATE TABLE `_jsitemap` (
  `sitemapid` int(11) NOT NULL AUTO_INCREMENT,
  `postedon` datetime DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`sitemapid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_jsitemap` */

/*Table structure for table `_jsitesettings` */

DROP TABLE IF EXISTS `_jsitesettings`;

CREATE TABLE `_jsitesettings` (
  `settingsid` int(11) NOT NULL AUTO_INCREMENT,
  `param` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `paramvalue` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`settingsid`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

/*Data for the table `_jsitesettings` */

insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (1,'sitetitle','nammamarriage');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (2,'sitename','nammamarriage');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (3,'backgroundimage','_1583555666__1583471232_background.png');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (4,'backgroundcolor','F1F1F1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (5,'favoriteicon','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (6,'isenablevideo','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (7,'isenablephoto','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (8,'isenablemusic','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (9,'isenabledownloads','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (10,'isenablefaq','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (11,'isenablesuccessstory','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (12,'isenabletestimonial','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (13,'isenablesubscriber','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (14,'isenablenews','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (15,'isenableevents','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (16,'facebookurl','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (17,'twitterurl','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (18,'youtubeurl','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (19,'googleplusurl','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (20,'sharepage','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (21,'googletranslator','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (22,'metatag','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (23,'metadescription','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (24,'menubackgroundimage','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (25,'logo','_1582795601_logo.png');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (26,'isenableproduct','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (27,'isenablecontact','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (28,'isenablemap','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (29,'mapcoding','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (30,'noimg','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (31,'newsperpage','5');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (32,'eventsperpage','5');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (33,'storyperpage','20');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (34,'testmperpage','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (35,'menufontcolor','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (36,'menufont','2');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (37,'menufontsize','15');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (38,'footerbgimage','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (39,'footerbgcolor','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (40,'footerfontcolor','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (41,'footerfont','2');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (42,'footerfontsize','18');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (43,'menubgcolor','BD181F');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (44,'layout','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (45,'menu_hover_font_color','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (46,'footerhover','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (47,'linkedpage','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (48,'emailto','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (49,'sitebgposition','repeat-x');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (50,'sharesize','small');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (51,'siteurl','https://www.nammamarriage.com');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (52,'seometadesc','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (53,'seometakey','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (54,'seometacontent','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (55,'footerbanner','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (56,'displaycontactusonhome','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (57,'displaycontactus','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (58,'headerbgimg','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (59,'headerbgcolor','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (60,'sliderhideicon','none');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (61,'headernoimagenocolor','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (62,'headerheight','50');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (63,'showheader','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (64,'menu_font_bold','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (65,'menu_font_italic','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (66,'menu_font_underline','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (67,'menu_hover_font_bold','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (68,'menu_hover_font_italic','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (69,'menu_hover_font_underline','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (70,'menu_hover_backgroundcolor','669900');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (71,'menu_border_left_size','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (72,'menu_border_right_size','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (73,'menu_border_top_size','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (74,'menu_border_bottom_size','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (75,'menu_border_left_style','solid');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (76,'menu_border_right_style','solid');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (77,'menu_border_top_style','solid');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (78,'menu_border_bottom_style','solid');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (79,'menu_border_left_color','000000');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (80,'menu_border_right_color','000000');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (81,'menu_border_top_color','000000');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (82,'menu_border_bottom_color','000000');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (83,'menu_radius_left_top','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (84,'menu_radius_right_top','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (85,'menu_radius_left_bottom','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (86,'menu_radius_right_bottom','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (87,'menu_radius_left_top_scale','px');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (88,'menu_radius_right_top_scale','px');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (89,'menu_radius_left_bottom_scale','px');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (90,'menu_radius_right_bottom_scale','px');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (91,'menu_height','39');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (92,'need_menu_hover_backgroundcolor','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (93,'menu_text_padding_left','20');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (94,'menu_text_padding_right','20');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (95,'menu_text_padding_top','9');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (96,'menu_text_padding_bottom','9');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (97,'menu_background_image_color_noneed','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (98,'menu_seperator_need','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (99,'menu_seperator_size','2');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (100,'menu_seperator_color','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (101,'slider_border_top_size','2');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (102,'slider_border_bottom_size','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (103,'slider_border_left_size','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (104,'slider_border_right_size','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (105,'slider_border_top_color','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (106,'slider_border_bottom_color','C1C2BC');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (107,'slider_border_left_color','484094');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (108,'slider_border_right_color','FA2121');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (109,'slider_top_space','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (110,'slider_bottom_space','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (111,'menu_text_transform','none');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (112,'menu_text_hover_transform','none');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (113,'slider_border_radius_left_top','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (114,'slider_border_radius_right_top','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (115,'slider_border_radius_left_bottom','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (116,'slider_border_radius_right_bottom','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (117,'showslider','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (118,'slider_height','300');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (119,'slider_top_space_need_color','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (120,'slider_top_space_color','F1F1F1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (121,'slider_bottom_space_need_color','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (122,'slider_bottom_space_color','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (123,'video_page_video_height','320');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (124,'video_page_video_width','369');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (125,'video_page_video_layout',NULL);
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (126,'video_page_clicktoplay','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (127,'video_page_details_open_neworself','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (128,'video_page_content',NULL);
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (129,'header_logo_padding_right','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (130,'header_logo_padding_left','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (131,'header_logo_padding_top','10');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (132,'header_logo_padding_bottom','10');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (133,'header_background_repeat ','no-repeat');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (134,'currencysymbol','Rs.');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (135,'copyright_text','nammamarriage.com');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (136,'copyright_url','nammamarriage');

/*Table structure for table `_jslider` */

DROP TABLE IF EXISTS `_jslider`;

CREATE TABLE `_jslider` (
  `sliderid` int(11) NOT NULL AUTO_INCREMENT,
  `slidertitle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `sliderdescription` text CHARACTER SET latin1,
  `filepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ispublished` int(11) NOT NULL,
  `postedon` datetime DEFAULT NULL,
  `sliderorder` int(2) DEFAULT NULL,
  PRIMARY KEY (`sliderid`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

/*Data for the table `_jslider` */

insert  into `_jslider`(`sliderid`,`slidertitle`,`sliderdescription`,`filepath`,`ispublished`,`postedon`,`sliderorder`) values (78,'banner1','banner','_1583645445_untitled-1_copy.png',1,'2020-03-08 05:30:45',2);
insert  into `_jslider`(`sliderid`,`slidertitle`,`sliderdescription`,`filepath`,`ispublished`,`postedon`,`sliderorder`) values (81,'banner2','banner-02.png copy.png','_1583723911_banner-02.png_copy.png',1,'2020-03-09 03:18:31',2);
insert  into `_jslider`(`sliderid`,`slidertitle`,`sliderdescription`,`filepath`,`ispublished`,`postedon`,`sliderorder`) values (82,'banner3','banner 3','_1583725039_banner-03.png_copy.png',1,'2020-03-09 03:37:19',3);

/*Table structure for table `_jsubcategoryproduct` */

DROP TABLE IF EXISTS `_jsubcategoryproduct`;

CREATE TABLE `_jsubcategoryproduct` (
  `subcateid` int(11) NOT NULL AUTO_INCREMENT,
  `maincateid` int(11) DEFAULT '0',
  `subcatename` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`subcateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jsubcategoryproduct` */

/*Table structure for table `_jsubscriber` */

DROP TABLE IF EXISTS `_jsubscriber`;

CREATE TABLE `_jsubscriber` (
  `subscriberid` int(11) NOT NULL AUTO_INCREMENT,
  `subscribername` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subscriberemail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subscribermobile` varchar(11) CHARACTER SET latin1 NOT NULL,
  `others` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`subscriberid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jsubscriber` */

/*Table structure for table `_jsuccessstory` */

DROP TABLE IF EXISTS `_jsuccessstory`;

CREATE TABLE `_jsuccessstory` (
  `storyid` int(11) NOT NULL AUTO_INCREMENT,
  `storytitle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `storydescription` text CHARACTER SET latin1,
  `storyname` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `mobileno` varchar(11) CHARACTER SET latin1 NOT NULL,
  `storytype` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `filepath` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL,
  `ispublish` int(11) NOT NULL,
  PRIMARY KEY (`storyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jsuccessstory` */

/*Table structure for table `_jusertable` */

DROP TABLE IF EXISTS `_jusertable`;

CREATE TABLE `_jusertable` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `personname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `uname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pwd` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  `isadmin` int(11) DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `_jusertable` */

insert  into `_jusertable`(`userid`,`personname`,`uname`,`pwd`,`createdon`,`isactive`,`isadmin`) values (1,'admin','admin','password','2017-09-04 14:02:19',1,1);

/*Table structure for table `_jvideo` */

DROP TABLE IF EXISTS `_jvideo`;

CREATE TABLE `_jvideo` (
  `videoid` int(11) NOT NULL AUTO_INCREMENT,
  `videotitle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `videodescription` text CHARACTER SET latin1,
  `videourl` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL,
  PRIMARY KEY (`videoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jvideo` */

/*Table structure for table `_nicus_enquiry` */

DROP TABLE IF EXISTS `_nicus_enquiry`;

CREATE TABLE `_nicus_enquiry` (
  `enquiryid` int(11) NOT NULL AUTO_INCREMENT,
  `orgname` varchar(255) DEFAULT NULL,
  `custname` varchar(255) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `mobilenumber` varchar(255) DEFAULT NULL,
  `landline` varchar(255) DEFAULT NULL,
  `shortdescription` varchar(255) DEFAULT NULL,
  `detaildescription` text,
  `enquiredon` datetime DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`enquiryid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `_nicus_enquiry` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
