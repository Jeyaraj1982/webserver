/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33-cll-lve : Database - pedalscy_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pedalscy_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pedalscy_database`;

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

insert  into `_tbl_admin`(`AdminID`,`AdminName`,`UserName`,`Password`,`CreatedOn`) values (1,'Test','admin@pedalscycle.com','123456',NULL);

/*Table structure for table `_tbl_contactus` */

DROP TABLE IF EXISTS `_tbl_contactus`;

CREATE TABLE `_tbl_contactus` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `ContactName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ContactID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_contactus` */

insert  into `_tbl_contactus`(`ContactID`,`ContactName`,`Email`,`MobileNumber`,`Subject`,`Description`,`AddedOn`) values (1,'asdgadg','sagasg@gmail.com','9944872965','asdgasgh','sahgsahash','2021-02-24 09:24:28');
insert  into `_tbl_contactus`(`ContactID`,`ContactName`,`Email`,`MobileNumber`,`Subject`,`Description`,`AddedOn`) values (2,'asdgadg','sagasg@gmail.com','9944872965','asdgasgh','sahgsahash','2021-02-24 09:50:34');
insert  into `_tbl_contactus`(`ContactID`,`ContactName`,`Email`,`MobileNumber`,`Subject`,`Description`,`AddedOn`) values (3,'nexify','nexify@gmail.com','9638527410','demo','demo','2021-02-24 11:35:51');

/*Table structure for table `_tbl_customer_reviews` */

DROP TABLE IF EXISTS `_tbl_customer_reviews`;

CREATE TABLE `_tbl_customer_reviews` (
  `CustomerReviewID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(255) DEFAULT NULL,
  `CustomerThumb` varchar(255) DEFAULT NULL,
  `CustomerRating` int(11) DEFAULT '1',
  `CustomerSubject` varchar(255) DEFAULT NULL,
  `CustomerDescription` text,
  `AddedOn` datetime DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`CustomerReviewID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_customer_reviews` */

insert  into `_tbl_customer_reviews`(`CustomerReviewID`,`CustomerName`,`CustomerThumb`,`CustomerRating`,`CustomerSubject`,`CustomerDescription`,`AddedOn`,`IsActive`) values (1,'David Smith','Screenshot_2021-02-23 passport size photo - Google Search(1).png',1,' I am still studying secondary school. So I used to go to school in cycle everyday, which has style, and may features, so i choose PEDALS Cycle Gallery which has given me all the needs I want.',' I am still studying secondary school. So I used to go to school in cycle everyday, which has style, and may features, so i choose PEDALS Cycle Gallery which has given me all the needs I want.','2021-02-23 11:19:35',1);
insert  into `_tbl_customer_reviews`(`CustomerReviewID`,`CustomerName`,`CustomerThumb`,`CustomerRating`,`CustomerSubject`,`CustomerDescription`,`AddedOn`,`IsActive`) values (2,'John Rock','Screenshot_2021-02-23 passport size photo - Google Search(2).png',3,'It was quite good and riding performance is absolutely fine and the braking is also good so, overall it suits for all the purposes and moreover for long rides.','It was quite good and riding performance is absolutely fine and the braking is also good so, overall it suits for all the purposes and moreover for long rides.','2021-02-23 11:20:50',1);
insert  into `_tbl_customer_reviews`(`CustomerReviewID`,`CustomerName`,`CustomerThumb`,`CustomerRating`,`CustomerSubject`,`CustomerDescription`,`AddedOn`,`IsActive`) values (3,'demo customer ','person1.jpg',5,'I am still studying secondary school. So I used to go to school in cycle everyday, which has style, and may features, so i choose PEDALS Cycle Gallery which has given me all the needs I want.',' I am still studying secondary school. So I used to go to school in cycle everyday, which has style, and may features, so i choose PEDALS Cycle Gallery which has given me all the needs I want.','2021-02-23 11:58:40',0);

/*Table structure for table `_tbl_events` */

DROP TABLE IF EXISTS `_tbl_events`;

CREATE TABLE `_tbl_events` (
  `EventID` int(11) NOT NULL AUTO_INCREMENT,
  `EventTitle` varchar(255) DEFAULT NULL,
  `EventDate` varchar(255) DEFAULT NULL,
  `StartingPoint` varchar(255) DEFAULT NULL,
  `EndingPoint` varchar(255) DEFAULT NULL,
  `Description` text,
  `Routes` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `IsPublish` int(11) DEFAULT '1',
  PRIMARY KEY (`EventID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_events` */

insert  into `_tbl_events`(`EventID`,`EventTitle`,`EventDate`,`StartingPoint`,`EndingPoint`,`Description`,`Routes`,`AddedOn`,`IsPublish`) values (1,'On Road Ride','2021-3-1','Parvathipuram','Chettikulam','Parvathipuram, kavalkinaru,kanyakumari, manakudi, chettikulam','Parvathipuram, kavalkinaru,kanyakumari, manakudi, chettikulam','2021-02-24 15:38:14',1);
insert  into `_tbl_events`(`EventID`,`EventTitle`,`EventDate`,`StartingPoint`,`EndingPoint`,`Description`,`Routes`,`AddedOn`,`IsPublish`) values (2,'Demo','2021-8-4','Tirunelveli','Tirunelveli','dhfkjjdfhdjfhdjskfhjdshfjdhfjdhfjdhfkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjkjdhakjshfdkjashfdkjashfdsfdf','melapalayam, ','2021-02-25 10:29:12',1);

/*Table structure for table `_tbl_events_images` */

DROP TABLE IF EXISTS `_tbl_events_images`;

CREATE TABLE `_tbl_events_images` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `EventID` int(11) DEFAULT NULL,
  `ImageName` varchar(255) DEFAULT NULL,
  `ImageOrder` int(11) DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_events_images` */

insert  into `_tbl_events_images`(`ImageID`,`EventID`,`ImageName`,`ImageOrder`,`IsDelete`) values (1,1,'1614177632_whatsapp image 2021-02-23 at 10.50.50 am.jpeg',1,0);
insert  into `_tbl_events_images`(`ImageID`,`EventID`,`ImageName`,`ImageOrder`,`IsDelete`) values (2,2,'1614229169_photo-1544923408-75c5cef46f141.bmp',1,0);
insert  into `_tbl_events_images`(`ImageID`,`EventID`,`ImageName`,`ImageOrder`,`IsDelete`) values (3,1,'1614229569_download.jpg',1,1);
insert  into `_tbl_events_images`(`ImageID`,`EventID`,`ImageName`,`ImageOrder`,`IsDelete`) values (4,1,'1614248204_world_tour.jpg',1,1);

/*Table structure for table `_tbl_gallery_images` */

DROP TABLE IF EXISTS `_tbl_gallery_images`;

CREATE TABLE `_tbl_gallery_images` (
  `GalleryImageID` int(11) NOT NULL AUTO_INCREMENT,
  `GalleryID` int(11) DEFAULT NULL,
  `GalleryTitle` varchar(255) DEFAULT NULL,
  `GalleryImage` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`GalleryImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_gallery_images` */

insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (1,2,'','1614131428_bike1.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (2,2,'','1614131451_bike2.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (3,2,'','1614131462_bike3.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (4,2,'','1614131473_bike4.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (5,2,'','1614131487_bike5.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (6,2,'','1614131499_bike6.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (7,2,'','1614131511_bike7.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (8,2,'','1614131523_bike8.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (9,2,'','1614131536_bike9.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (10,2,'','1614131549_bike10.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (11,2,'','1614131560_bike11.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (12,2,'','1614131571_bike12.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (13,2,'','1614131583_bike13.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (14,2,'','1614131595_bike14.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (15,2,'','1614131605_bike15.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (16,2,'','1614131622_bike16.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (17,2,'','1614131631_bike17.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (18,2,'','1614131642_bike18.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (19,2,'','1614131652_bike19.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (20,2,'','1614131663_bike20.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (21,2,'','1614131676_bike21.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (22,2,'','1614131687_bike22.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (23,2,'','1614131696_bike23.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (24,2,'','1614131708_bike24.jpg',1);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (25,2,'','1614146494_world_tour.jpg',0);
insert  into `_tbl_gallery_images`(`GalleryImageID`,`GalleryID`,`GalleryTitle`,`GalleryImage`,`IsActive`) values (26,3,'','1614146532_location-thailand-malaysia-singapore.jpg',0);

/*Table structure for table `_tbl_gallery_names` */

DROP TABLE IF EXISTS `_tbl_gallery_names`;

CREATE TABLE `_tbl_gallery_names` (
  `GalleryID` int(11) NOT NULL AUTO_INCREMENT,
  `GalleryName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`GalleryID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_gallery_names` */

insert  into `_tbl_gallery_names`(`GalleryID`,`GalleryName`,`IsActive`) values (1,'featured cycles',0);
insert  into `_tbl_gallery_names`(`GalleryID`,`GalleryName`,`IsActive`) values (2,'Cycles',1);
insert  into `_tbl_gallery_names`(`GalleryID`,`GalleryName`,`IsActive`) values (3,'demo',0);

/*Table structure for table `_tbl_logs_email` */

DROP TABLE IF EXISTS `_tbl_logs_email`;

CREATE TABLE `_tbl_logs_email` (
  `EmailLogID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT '0',
  `EmailTo` varchar(255) DEFAULT NULL,
  `EmaildFor` varchar(255) DEFAULT NULL,
  `EmailSubject` text,
  `EmailContent` text,
  `EmailRequestedOn` datetime DEFAULT NULL,
  `IsSuccess` int(11) DEFAULT '0',
  `IsFailure` int(11) DEFAULT '0',
  `FailureMessage` text,
  `IsAttachment` int(11) DEFAULT '0',
  `AttachmentFile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EmailLogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_logs_email` */

/*Table structure for table `_tbl_products` */

DROP TABLE IF EXISTS `_tbl_products`;

CREATE TABLE `_tbl_products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductPrice` varchar(255) DEFAULT NULL,
  `OfferPrice` varchar(255) DEFAULT NULL,
  `Description` text,
  `AddedOn` datetime DEFAULT NULL,
  `IsPublish` int(11) DEFAULT '1',
  `ProductRating` int(11) DEFAULT '1',
  `ShortDescription` varchar(255) DEFAULT NULL,
  `SearchTags` text,
  `IsFeatured` int(11) DEFAULT '0',
  `IsNew` int(11) DEFAULT '0',
  `IsUpcomming` int(11) DEFAULT '0',
  `IsPopular` int(11) DEFAULT '0',
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_products` */

insert  into `_tbl_products`(`ProductID`,`ProductName`,`ProductPrice`,`OfferPrice`,`Description`,`AddedOn`,`IsPublish`,`ProductRating`,`ShortDescription`,`SearchTags`,`IsFeatured`,`IsNew`,`IsUpcomming`,`IsPopular`) values (1,'Polygon Bend RV - Gravel / Cyclocross Disc Bike','0','0','','2021-02-22 17:52:38',1,5,'','',1,1,1,1);
insert  into `_tbl_products`(`ProductID`,`ProductName`,`ProductPrice`,`OfferPrice`,`Description`,`AddedOn`,`IsPublish`,`ProductRating`,`ShortDescription`,`SearchTags`,`IsFeatured`,`IsNew`,`IsUpcomming`,`IsPopular`) values (2,'2020 Marin Four Corners Touring Disc Road Bike','0.00','0.00','','2021-02-22 17:53:26',1,5,'','',1,1,1,1);
insert  into `_tbl_products`(`ProductID`,`ProductName`,`ProductPrice`,`OfferPrice`,`Description`,`AddedOn`,`IsPublish`,`ProductRating`,`ShortDescription`,`SearchTags`,`IsFeatured`,`IsNew`,`IsUpcomming`,`IsPopular`) values (3,'Diamondback Bicycles Podium Vitesse Disc Brake Road Bike','0.00','0.00','','2021-02-22 17:53:49',1,5,'','',1,1,1,1);
insert  into `_tbl_products`(`ProductID`,`ProductName`,`ProductPrice`,`OfferPrice`,`Description`,`AddedOn`,`IsPublish`,`ProductRating`,`ShortDescription`,`SearchTags`,`IsFeatured`,`IsNew`,`IsUpcomming`,`IsPopular`) values (4,'Diamondback Bicycles 2020 Haanjo Road Bike','0.00','0.00','','2021-02-22 17:54:04',1,5,'','',1,1,1,1);
insert  into `_tbl_products`(`ProductID`,`ProductName`,`ProductPrice`,`OfferPrice`,`Description`,`AddedOn`,`IsPublish`,`ProductRating`,`ShortDescription`,`SearchTags`,`IsFeatured`,`IsNew`,`IsUpcomming`,`IsPopular`) values (5,'Diamondback Bicycles Trace Dual Sport Bike, Blue','0.00','0.00','','2021-02-22 17:54:16',1,5,'','',1,1,1,1);
insert  into `_tbl_products`(`ProductID`,`ProductName`,`ProductPrice`,`OfferPrice`,`Description`,`AddedOn`,`IsPublish`,`ProductRating`,`ShortDescription`,`SearchTags`,`IsFeatured`,`IsNew`,`IsUpcomming`,`IsPopular`) values (6,'Vilano Blackjack 29er Mountain Bike MTB with 29-Inch Wheels','0.00','0.00','','2021-02-22 17:54:35',1,5,'','',1,1,1,1);
insert  into `_tbl_products`(`ProductID`,`ProductName`,`ProductPrice`,`OfferPrice`,`Description`,`AddedOn`,`IsPublish`,`ProductRating`,`ShortDescription`,`SearchTags`,`IsFeatured`,`IsNew`,`IsUpcomming`,`IsPopular`) values (7,'demoproduct','4200','3700',NULL,'2021-02-23 10:35:20',1,1,NULL,NULL,0,0,0,0);
insert  into `_tbl_products`(`ProductID`,`ProductName`,`ProductPrice`,`OfferPrice`,`Description`,`AddedOn`,`IsPublish`,`ProductRating`,`ShortDescription`,`SearchTags`,`IsFeatured`,`IsNew`,`IsUpcomming`,`IsPopular`) values (8,'demoproduct1','5000','4100','demo product added successfully','2021-02-23 10:36:35',1,4,'demo product added successfully','',0,0,0,0);

/*Table structure for table `_tbl_products_images` */

DROP TABLE IF EXISTS `_tbl_products_images`;

CREATE TABLE `_tbl_products_images` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) DEFAULT NULL,
  `ImageName` varchar(255) DEFAULT NULL,
  `ImageOrder` int(11) DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_products_images` */

insert  into `_tbl_products_images`(`ImageID`,`ProductID`,`ImageName`,`ImageOrder`,`IsDelete`) values (1,1,'1613997261_new-product1.jpg',1,0);
insert  into `_tbl_products_images`(`ImageID`,`ProductID`,`ImageName`,`ImageOrder`,`IsDelete`) values (2,2,'1613997332_new-product2.jpg',1,0);
insert  into `_tbl_products_images`(`ImageID`,`ProductID`,`ImageName`,`ImageOrder`,`IsDelete`) values (3,3,'1613997389_new-product3.jpg',1,0);
insert  into `_tbl_products_images`(`ImageID`,`ProductID`,`ImageName`,`ImageOrder`,`IsDelete`) values (4,4,'1613997465_new-product4.jpg',1,0);
insert  into `_tbl_products_images`(`ImageID`,`ProductID`,`ImageName`,`ImageOrder`,`IsDelete`) values (5,5,'1613997501_new-product5.jpg',1,0);
insert  into `_tbl_products_images`(`ImageID`,`ProductID`,`ImageName`,`ImageOrder`,`IsDelete`) values (6,6,'1613997566_new-product6.jpg',1,0);
insert  into `_tbl_products_images`(`ImageID`,`ProductID`,`ImageName`,`ImageOrder`,`IsDelete`) values (7,7,'1614056743_photo-1544923408-75c5cef46f141.bmp',1,0);
insert  into `_tbl_products_images`(`ImageID`,`ProductID`,`ImageName`,`ImageOrder`,`IsDelete`) values (8,8,'1614056807_photo-1544923408-75c5cef46f14.bmp',1,0);

/*Table structure for table `_tbl_sliders` */

DROP TABLE IF EXISTS `_tbl_sliders`;

CREATE TABLE `_tbl_sliders` (
  `SliderID` int(11) NOT NULL AUTO_INCREMENT,
  `SliderImage` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `AddedOn` datetime DEFAULT NULL,
  `SliderTitle` varchar(255) DEFAULT NULL,
  `SliderDescription` varchar(500) DEFAULT NULL,
  `ButtonName` varchar(255) DEFAULT NULL,
  `ButtonLink` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SliderID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sliders` */

insert  into `_tbl_sliders`(`SliderID`,`SliderImage`,`IsActive`,`AddedOn`,`SliderTitle`,`SliderDescription`,`ButtonName`,`ButtonLink`) values (1,'home-bg-1.jpg',1,'2021-02-23 09:31:07','Every time you miss your childhood?, Ride on a Bicycle!','Every time you miss your childhood?, Ride on a Bicycle!!','Get Started','index.php');
insert  into `_tbl_sliders`(`SliderID`,`SliderImage`,`IsActive`,`AddedOn`,`SliderTitle`,`SliderDescription`,`ButtonName`,`ButtonLink`) values (2,'home-bg-2.jpg',1,'2021-02-23 09:33:56','Life is like Riding a Bicycle','Life is like Riding a Bicycle','Get Started','index.php');
insert  into `_tbl_sliders`(`SliderID`,`SliderImage`,`IsActive`,`AddedOn`,`SliderTitle`,`SliderDescription`,`ButtonName`,`ButtonLink`) values (3,'home-bg-3.jpg',1,'2021-02-23 09:34:35','Life is like Riding a Bicycle','Life is like Riding a Bicycle','Get Started','index.php');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
