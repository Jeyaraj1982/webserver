/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - raiyancl_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`raiyancl_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `raiyancl_database`;

/*Table structure for table `_brandname` */

DROP TABLE IF EXISTS `_brandname`;

CREATE TABLE `_brandname` (
  `brandid` int(11) NOT NULL AUTO_INCREMENT,
  `brandname` varchar(255) DEFAULT NULL,
  `addedon` datetime DEFAULT NULL,
  PRIMARY KEY (`brandid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `_brandname` */

insert  into `_brandname`(`brandid`,`brandname`,`addedon`) values (1,'Williams Executives','2016-10-31 01:36:50');
insert  into `_brandname`(`brandid`,`brandname`,`addedon`) values (6,'OTTO','2016-11-02 19:13:00');

/*Table structure for table `_maincategories` */

DROP TABLE IF EXISTS `_maincategories`;

CREATE TABLE `_maincategories` (
  `maincategoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`maincategoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_maincategories` */

insert  into `_maincategories`(`maincategoryid`,`categoryname`) values (1,'Kids');
insert  into `_maincategories`(`maincategoryid`,`categoryname`) values (2,'Mens');
insert  into `_maincategories`(`maincategoryid`,`categoryname`) values (3,'Womens');

/*Table structure for table `_productimages` */

DROP TABLE IF EXISTS `_productimages`;

CREATE TABLE `_productimages` (
  `productimageid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `addedon` datetime DEFAULT NULL,
  PRIMARY KEY (`productimageid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `_productimages` */

insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (7,1,'718dN78XgdL._UY500_.jpg','2016-11-02 19:20:42');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (5,1,'2.jpg','2016-11-02 19:20:19');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (6,1,'81RSs2vU8OL._UY500_.jpg','2016-11-02 19:20:30');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (8,2,'2.jpg','2016-11-02 19:36:41');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (9,2,'5.jpg','2016-11-02 19:36:47');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (10,2,'61tgkNvY4lL._UL1500_.jpg','2016-11-02 19:36:57');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (11,2,'71b3u85wCxL._UL1500_.jpg','2016-11-02 19:37:02');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (12,3,'91bee0reovL._UL1500_.jpg','2016-11-02 19:42:57');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (13,3,'71pR0dWNTHL._UL1500_.jpg','2016-11-02 19:43:03');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (14,3,'91nl29ABgZL._UL1500_.jpg','2016-11-02 19:43:11');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (15,3,'519mSMYliaL.jpg','2016-11-02 19:43:20');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (16,4,'81ciMdQr7RL._UL1500_.jpg','2016-11-02 19:46:37');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (17,4,'81hyJXf05HL._UL1500_.jpg','2016-11-02 19:46:42');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (18,4,'81RGMETkQ9L._UL1500_.jpg','2016-11-02 19:46:46');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (19,4,'81T3QJSpB5L._UL1500_.jpg','2016-11-02 19:46:52');
insert  into `_productimages`(`productimageid`,`productid`,`filename`,`addedon`) values (20,4,'813IOJ4LAHL._UL1500_.jpg','2016-11-02 19:46:59');

/*Table structure for table `_productprice` */

DROP TABLE IF EXISTS `_productprice`;

CREATE TABLE `_productprice` (
  `priceid` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) DEFAULT NULL,
  `productsize` varchar(255) DEFAULT NULL,
  `productmrp` varchar(255) DEFAULT NULL,
  `addedon` datetime DEFAULT NULL,
  PRIMARY KEY (`priceid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `_productprice` */

insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (1,1,'15','200','2016-11-01 03:45:20');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (4,1,'0','500','2016-11-02 19:21:05');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (5,1,'0','1250','2016-11-02 19:21:18');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (6,2,'38','550','2016-11-02 19:37:12');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (7,2,'40','580','2016-11-02 19:37:18');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (8,3,'38','450','2016-11-02 19:43:27');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (9,3,'40','500','2016-11-02 19:43:33');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (10,3,'42','600','2016-11-02 19:43:38');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (11,4,'42','780','2016-11-02 19:47:05');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (12,4,'40','650','2016-11-02 19:47:15');
insert  into `_productprice`(`priceid`,`productid`,`productsize`,`productmrp`,`addedon`) values (13,4,'44','600','2016-11-02 19:47:24');

/*Table structure for table `_products` */

DROP TABLE IF EXISTS `_products`;

CREATE TABLE `_products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `maincategoryid` int(11) DEFAULT NULL,
  `subcategoryid` int(11) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `productdescription` text,
  `brandid` int(11) DEFAULT NULL,
  `addedon` datetime DEFAULT NULL,
  `ispublished` int(11) DEFAULT '1',
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_products` */

insert  into `_products`(`productid`,`maincategoryid`,`subcategoryid`,`productname`,`productdescription`,`brandid`,`addedon`,`ispublished`) values (1,2,41,'Magson Formal Shirt','<ul class=\"a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-top: 0px; margin-right: 0px; margin-left: 18px; color: rgb(148, 148, 148); padding: 0px; font-family: Arial, sans-serif; background-color: rgb(255, 255, 255); margin-bottom: 0px !important;\"><li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); word-wrap: break-word; display: block;\">Material : Cotton Blend</span></li><li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); word-wrap: break-word; display: block;\">Premium Fabric</span></li><li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); word-wrap: break-word; display: block;\">Full sleeve formal shirt</span></li><li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); word-wrap: break-word; display: block;\">Made in India</span></li><li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); word-wrap: break-word; display: block;\">Disclaimer : Product color may slightly vary due to photographic lighting sources or your monitor settings.</span></li><li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); word-wrap: break-word; display: block;\">Package contents : 1-Piece Full sleeve formal shirt</span></li></ul>                                                                                ',NULL,'2016-10-31 13:54:23',1);
insert  into `_products`(`productid`,`maincategoryid`,`subcategoryid`,`productname`,`productdescription`,`brandid`,`addedon`,`ispublished`) values (2,2,41,'Otto New Model','<div><ul class=\"a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin-top: 0px; margin-right: 0px; margin-left: 18px; color: rgb(148, 148, 148); padding: 0px; font-family: Arial, sans-serif; background-color: rgb(255, 255, 255); margin-bottom: 0px !important;\"><li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); word-wrap: break-word; display: block;\">Disclaimer : Product color may slightly vary due to photographic lighting sources or your monitor settings.</span></li><li style=\"box-sizing: border-box; list-style: disc; word-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); word-wrap: break-word; display: block;\">Package contents : 1-Piece Full sleeve formal shirt</span></li></ul></div>                ',NULL,'2016-11-02 19:34:17',1);
insert  into `_products`(`productid`,`maincategoryid`,`subcategoryid`,`productname`,`productdescription`,`brandid`,`addedon`,`ispublished`) values (3,1,41,'Koolpals  Formal Shirt','<span style=\"color: rgb(51, 51, 51); font-family: verdana, arial, helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Formals by Koolpals-Cotton Blend Shirt White Vertical Stripes on Purple</span>',NULL,'2016-11-02 19:42:40',1);
insert  into `_products`(`productid`,`maincategoryid`,`subcategoryid`,`productname`,`productdescription`,`brandid`,`addedon`,`ispublished`) values (4,2,41,'Full sleeve Casual Shirt','                <span style=\"color: rgb(51, 51, 51); font-family: verdana, arial, helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Check out this shirt from Rapphael that is a must-have for modern men. Featuring different colour, this FULL-sleeved shirt will lend you a smart look. Show off your love for smart dressing as you wear this formal shirt from the house of Botticelli. Fashioned using the ultimate material for comfort-cotton.</span>                ',NULL,'2016-11-02 19:45:33',1);

/*Table structure for table `_subcategories` */

DROP TABLE IF EXISTS `_subcategories`;

CREATE TABLE `_subcategories` (
  `subcategoryid` int(11) NOT NULL AUTO_INCREMENT,
  `maincategoryid` int(11) DEFAULT NULL,
  `subcategoryname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`subcategoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `_subcategories` */

insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (1,1,'Girls - Frocks');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (2,1,'Girls - Ethnic');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (3,1,'Girls - Tops & Tees Shirts');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (4,1,'Girls - Top & Bottom Sets');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (5,1,'Girls - Bottomwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (6,1,'Girls - Innerwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (7,1,'Girls - Nightwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (8,1,'Girls - WinterWear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (9,1,'Girls - Shool Uniform');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (10,1,'Boys - Top Wear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (11,1,'Boys - Ethnic Wear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (12,1,'Boys - Tops & Bottoms');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (13,1,'Boys - Bottom Wear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (14,1,'Boys - Innerwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (15,1,'Boys - Nightwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (16,1,'Boys - School Uniform');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (17,1,'Boys - Winter Wear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (18,1,'Baby - Frocks & Skirts');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (19,1,'Baby - Shirts & T-Shirts');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (20,1,'Baby - Rompers');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (21,1,'Baby - Body Suits');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (22,1,'Baby - Ethnic Wear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (23,1,'Baby - Top & Bottom Sets');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (24,1,'Baby - Bottom Wear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (25,1,'Baby - Baby Gift Set (2)');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (26,1,'Baby - Caps & Cocks');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (27,1,'Baby - Nightwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (28,1,'Baby - Winterwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (29,3,'Sarees');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (30,3,'Salwar Suits');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (31,3,'Kurtas & Kurtis');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (32,3,'Churidhars');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (33,3,'Lehengas');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (34,3,'Dupattas');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (35,3,'Burqas');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (36,3,'Wedding Sarees');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (37,3,'Silk Sarees');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (38,3,'Cotton Sarees');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (39,3,'Designed Sarees');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (40,2,'T-Shirts & Polos');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (41,2,'Shirts');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (48,1,'Jeans');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (43,2,'Trousers & Chinos');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (44,2,'Innerwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (45,2,'Sleepwear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (46,2,'Sports Wear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (47,2,'Rain Wear');
insert  into `_subcategories`(`subcategoryid`,`maincategoryid`,`subcategoryname`) values (50,1,'Model');

/*Table structure for table `_tblbanner` */

DROP TABLE IF EXISTS `_tblbanner`;

CREATE TABLE `_tblbanner` (
  `bannerid` int(11) NOT NULL AUTO_INCREMENT,
  `bannerpath` varchar(255) DEFAULT NULL,
  `ispublish` int(11) DEFAULT '1',
  `addedon` datetime DEFAULT NULL,
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`bannerid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `_tblbanner` */

insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (1,'01-img.jpg',0,'2016-10-31 14:59:23',0);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (2,'1.jpg',0,'2016-10-31 14:59:39',0);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (3,'02-img.jpg',1,'2016-10-31 14:59:51',2);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (4,'03-img.jpg',1,'2016-10-31 15:00:00',5);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (5,'3.jpg',1,'2016-10-31 15:00:08',6);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (6,'04-img.jpg',0,'2016-10-31 15:00:17',0);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (7,'05-img.jpg',1,'2016-10-31 15:00:27',3);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (11,'banner.jpg',0,'2016-12-08 18:03:10',4);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (12,'independance.jpg',0,'2017-08-12 12:54:41',1);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (14,'raiyan-banner1.jpg',0,'2017-10-16 18:18:07',1);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (13,'aniversary.jpg',0,'2017-08-12 12:57:16',1);
insert  into `_tblbanner`(`bannerid`,`bannerpath`,`ispublish`,`addedon`,`displayorder`) values (15,'raiyan-banner2.jpg',0,'2017-10-16 18:18:38',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
