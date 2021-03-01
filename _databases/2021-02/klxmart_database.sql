/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - klxmart_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klxmart_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klxmart_database`;

/*Table structure for table `_tbl_admin` */

DROP TABLE IF EXISTS `_tbl_admin`;

CREATE TABLE `_tbl_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_admin` */

insert  into `_tbl_admin`(`AdminID`,`AdminName`,`UserName`,`Password`,`CreatedOn`) values (1,'Test','admin@klxmart.com','1234567',NULL);

/*Table structure for table `_tbl_product_categories` */

DROP TABLE IF EXISTS `_tbl_product_categories`;

CREATE TABLE `_tbl_product_categories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_product_categories` */

insert  into `_tbl_product_categories`(`CategoryID`,`CategoryName`) values (2,'மற்றவைகள் ');
insert  into `_tbl_product_categories`(`CategoryID`,`CategoryName`) values (3,'பழங்கள் மற்றும் காய்கறிகள்');
insert  into `_tbl_product_categories`(`CategoryID`,`CategoryName`) values (4,'மற்ற உணவுகள்');

/*Table structure for table `_tbl_products` */

DROP TABLE IF EXISTS `_tbl_products`;

CREATE TABLE `_tbl_products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) DEFAULT '0',
  `CategoryName` varchar(255) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductPrice` varchar(255) DEFAULT NULL,
  `filepath1` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `IsPublish` int(11) DEFAULT '1',
  `Isdelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_products` */

insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (3,2,'','சீலா ','300/kg','Screenshot_2020_0806_185207.png','','2020-08-18 19:14:54',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (7,3,'','Apple','100 / kg','Dazzle-PNG-Clean-e1553556745330.png','','2020-08-18 20:10:15',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (8,3,'','ஆரஞ்சு ','60 /kg','50913eeb04768a5b1fa9985c16704d96.jpg','','2020-08-18 20:12:51',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (9,3,'','திராட்ச்சை ','40 /kg','grapes-new.jpg','','2020-08-18 20:17:15',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (10,3,'','மாதுளம் ','120 /kg','fresh-pomegranate-250x250.jpg','','2020-08-18 20:18:16',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (11,3,'','கொய்யா பழம் ','90 /kg','koyya-pazham-red-guava-fruits.png','','2020-08-18 20:20:07',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (12,3,'','சீதா பழம் ','70 / kg','product-500x500.jpeg','','2020-08-18 20:29:43',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (13,3,'','முள் சீத்தா பழம் ','','41qV-hdwPHL._SX466_.jpg','','2020-08-18 20:30:09',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (14,3,'','பேரிக்காய் ','60 / kg','mm6.jpg','','2020-08-18 20:30:53',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (15,3,'','சப்போட்டா பழம் ','50 / kg','sapota-benefits.jpg','','2020-08-18 20:31:59',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (16,3,'','அன்னாசி பழம் ','30 / kg','pineapple-500x500.jpg','','2020-08-18 20:33:32',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (17,3,'','கேரட் ','60 / kg','carrots.jpg','','2020-08-18 20:35:08',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (18,3,'','பீன்ஸ் ','60 /kg','27f16-gfgd-492x308.jpg','','2020-08-18 20:35:44',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (19,3,'','வெண்டைக்காய் ','50 / kg','fresh-lady-finger-vendakkai-500x500.png','','2020-08-18 20:37:11',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (20,3,'','கோவைக்காய் ','60 / kg','GHERKIN-IVY-GOURD_05ad795b-1a74-4da1-aad7-a5e00ed2e2be_1200x1200.jpg','','2020-08-18 20:37:46',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (21,3,'','முருங்கைக்காய் ','30 / kg','625.0.560.350.160.300.053.800.668.160.90.jpg','','2020-08-18 20:38:47',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (22,3,'','கத்திரிக்காய் ','40 / kg','fresh-brinjal-500x500.jpg','','2020-08-18 20:39:28',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (23,3,'','வெள்ளிரிக்காய் ','40 / kg','image_710x400xt.jpg','','2020-08-18 20:40:22',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (24,3,'','பீட்ரூட் ','50 / kg','Screenshot_2020_0818_204144.png','','2020-08-18 20:42:48',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (25,3,'','பூண்டு ','60 / kg','vellai-poondu-garlic-500x500.png','','2020-08-18 20:43:46',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (26,3,'','இஞ்சி ','40/ kg','Screenshot_2020_0818_204429.png','','2020-08-18 20:45:34',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (27,4,'','மீன் ஊறுகாய் ','250 / kg','Screenshot_2020_0818_205510.png','','2020-08-18 21:03:54',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (28,4,'','இறால் ஊறுகாய் ','350 / kg','Screenshot_2020_0818_210122.png','','2020-08-18 21:04:34',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (29,4,'','லெமன் ஊறுகாய் ','60 /kg','Screenshot_2020_0818_205723.png','','2020-08-18 21:05:14',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (30,4,'','மாங்காய் ஊறுகாய் ','70 /kg','Screenshot_2020_0818_205918.png','','2020-08-18 21:05:53',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (31,4,'','இஞ்சி ஊறுகாய் ','80 /kg','Screenshot_2020_0818_205806.png','','2020-08-18 21:06:38',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (32,4,'','பூண்டு ஊறுகாய் ','80 / kg','Screenshot_2020_0818_210728.png','','2020-08-18 21:08:47',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (33,4,'','நார்த்தங்காய் ஊறுகாய் ','50 / kg','Screenshot_2020_0818_205612.png','','2020-08-18 21:10:03',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (34,4,'','முந்திரி ','800 / kg','Screenshot_2020_0818_204646.png','','2020-08-18 21:10:33',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (35,4,'','பாதாம் ','850 / kg','Screenshot_2020_0818_204835.png','','2020-08-18 21:11:10',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (36,4,'','பேரிச்சம் பழம் ','200 / kg','1442822305-1486.jpg','','2020-08-18 21:12:56',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (37,2,'','சூர  மீன் ','200 / kg','Screenshot_2020_0818_211740.png','','2020-08-18 21:20:01',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (38,2,'','அயிலை மீன் ','120 /kg','indian-mackerel-2f-bangda-fish-500x500.png','','2020-08-18 21:21:17',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (39,2,'','வாழ மீன் ','150/kg','Screenshot_2020_0806_185043.png','','2020-08-18 21:22:46',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (40,2,'','வௌ மீன் ','200 /kg','emperor_fish-500x300.jpg','','2020-08-18 21:23:31',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (41,2,'','மத்தி / சாள  ','80/ kg','Screenshot_2020_0806_180656.png','','2020-08-18 21:25:10',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (42,2,'','வஞ்சரம் மீன் ','350/ kg','Screenshot_2020_0806_183621.png','','2020-08-18 21:26:46',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (43,2,'','சங்கரா மீன் ','140/ kg','Screenshot_2020_0806_185512.png','','2020-08-18 21:35:12',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (44,2,'','வௌவால் மீன் ','450 / kg','BLACK-POMFRET.jpg','Pomrrt','2020-09-01 23:23:57',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (45,2,'','நெத்திலி ','100/kg','416kWXO5vlL._SX425_.jpg','Nothili ','2020-09-01 23:25:58',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (46,2,'','இறால் ','250/ kg','Screenshot_2020_0806_182909.png','Eral ','2020-09-01 23:27:23',1,0);
insert  into `_tbl_products`(`ProductID`,`CategoryID`,`CategoryName`,`ProductName`,`ProductPrice`,`filepath1`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (47,2,'','Klx chips','40/200g','IMG-20201014-WA0074.jpg','Used sunflower oil','2020-09-01 23:28:40',1,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
