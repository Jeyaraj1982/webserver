/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.34 : Database - klxgroup_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klxgroup_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klxgroup_database`;

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

insert  into `_tbl_admin`(`AdminID`,`AdminName`,`UserName`,`Password`,`CreatedOn`) values (2,'Admin','admin@klxgroups.com','123456',NULL);

/*Table structure for table `_tbl_booking_food` */

DROP TABLE IF EXISTS `_tbl_booking_food`;

CREATE TABLE `_tbl_booking_food` (
  `FoodOrderID` int(11) NOT NULL AUTO_INCREMENT,
  `Orderon` datetime DEFAULT NULL,
  `CustomerName` varchar(255) DEFAULT NULL,
  `CustomerMobileNumber` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) DEFAULT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `CustomerDetails` text,
  `OrderValue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`FoodOrderID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_booking_food` */

insert  into `_tbl_booking_food`(`FoodOrderID`,`Orderon`,`CustomerName`,`CustomerMobileNumber`,`AddressLine1`,`AddressLine2`,`CustomerDetails`,`OrderValue`) values (1,'2021-02-17 17:21:01','Nagercoil','9944872965','','Chennai','sgasgsahg','2001');

/*Table structure for table `_tbl_booking_food_items` */

DROP TABLE IF EXISTS `_tbl_booking_food_items`;

CREATE TABLE `_tbl_booking_food_items` (
  `OrderItemID` int(11) NOT NULL AUTO_INCREMENT,
  `FoodOrderID` int(11) DEFAULT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `Qty` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `OfferPrice` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`OrderItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_booking_food_items` */

insert  into `_tbl_booking_food_items`(`OrderItemID`,`FoodOrderID`,`HotelID`,`ProductID`,`ProductName`,`Qty`,`Price`,`OfferPrice`,`Amount`) values (1,1,6,7,'briyani1','1','3001','2001','2001');

/*Table structure for table `_tbl_booking_hotel` */

DROP TABLE IF EXISTS `_tbl_booking_hotel`;

CREATE TABLE `_tbl_booking_hotel` (
  `HotelBookingID` int(11) NOT NULL AUTO_INCREMENT,
  `RequestedOn` datetime DEFAULT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `PackageID` int(11) DEFAULT NULL,
  `CheckInDate` date DEFAULT NULL,
  `NumberOfDays` int(11) DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `PickupLocation` varchar(255) DEFAULT NULL,
  `CustomerName` varchar(255) DEFAULT NULL,
  `CustomerMobileNumber` varchar(255) DEFAULT NULL,
  `CustomerDetails` text,
  PRIMARY KEY (`HotelBookingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_booking_hotel` */

/*Table structure for table `_tbl_booking_taxi` */

DROP TABLE IF EXISTS `_tbl_booking_taxi`;

CREATE TABLE `_tbl_booking_taxi` (
  `TaxiBookingID` int(11) NOT NULL AUTO_INCREMENT,
  `RequestedOn` datetime DEFAULT NULL,
  `FromPlaceName` varchar(255) DEFAULT NULL,
  `ToPlaceName` varchar(255) DEFAULT NULL,
  `NumberOfPerson` varchar(255) DEFAULT NULL,
  `TaxiType` varchar(255) DEFAULT NULL,
  `CustomerName` varchar(255) DEFAULT NULL,
  `CustomerMobileNumber` varchar(255) DEFAULT NULL,
  `CustomerDetails` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TaxiBookingID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_booking_taxi` */

insert  into `_tbl_booking_taxi`(`TaxiBookingID`,`RequestedOn`,`FromPlaceName`,`ToPlaceName`,`NumberOfPerson`,`TaxiType`,`CustomerName`,`CustomerMobileNumber`,`CustomerDetails`) values (1,'2021-02-10 22:33:13','Nagercoil','Madurai','1','11','Jeyaraj','9944872965','Need Details');

/*Table structure for table `_tbl_foods_citynames` */

DROP TABLE IF EXISTS `_tbl_foods_citynames`;

CREATE TABLE `_tbl_foods_citynames` (
  `HotelCityNameID` int(11) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`HotelCityNameID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_foods_citynames` */

insert  into `_tbl_foods_citynames`(`HotelCityNameID`,`CityName`,`IsActive`) values (5,'Nagercoil',1),(6,'Kanya Kumari',1),(7,'Monday Market',1),(8,'Muttom',0);

/*Table structure for table `_tbl_foods_hotels` */

DROP TABLE IF EXISTS `_tbl_foods_hotels`;

CREATE TABLE `_tbl_foods_hotels` (
  `HotelID` int(11) NOT NULL AUTO_INCREMENT,
  `HotelCityNameID` int(11) DEFAULT NULL,
  `HotelName` varchar(255) DEFAULT NULL,
  `HotelThumb` varchar(255) DEFAULT NULL,
  `HotelDescription` text,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`HotelID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_foods_hotels` */

insert  into `_tbl_foods_hotels`(`HotelID`,`HotelCityNameID`,`HotelName`,`HotelThumb`,`HotelDescription`,`IsActive`) values (6,5,'Maajid Food Cabin','Pepper Residency.png','Veg, Non-Veg',1);

/*Table structure for table `_tbl_foods_items` */

DROP TABLE IF EXISTS `_tbl_foods_items`;

CREATE TABLE `_tbl_foods_items` (
  `FoodID` int(11) NOT NULL AUTO_INCREMENT,
  `FoodHotelCityNameID` int(11) DEFAULT NULL,
  `FoodHotelID` int(11) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `OfferPrice` varchar(255) DEFAULT NULL,
  `Description` text,
  `FoodThumb` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`FoodID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_foods_items` */

insert  into `_tbl_foods_items`(`FoodID`,`FoodHotelCityNameID`,`FoodHotelID`,`ProductName`,`Price`,`OfferPrice`,`Description`,`FoodThumb`,`IsActive`) values (7,5,6,'briyani1','3001','2001','Briyani 1','Biryani_Home.jpg',1);

/*Table structure for table `_tbl_from_places` */

DROP TABLE IF EXISTS `_tbl_from_places`;

CREATE TABLE `_tbl_from_places` (
  `FromPlaceID` int(11) NOT NULL AUTO_INCREMENT,
  `FromPlaceName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`FromPlaceID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_from_places` */

insert  into `_tbl_from_places`(`FromPlaceID`,`FromPlaceName`) values (1,'Marthandam'),(2,'Thuckalay'),(3,'Kulasekharam');

/*Table structure for table `_tbl_hotel_citynames` */

DROP TABLE IF EXISTS `_tbl_hotel_citynames`;

CREATE TABLE `_tbl_hotel_citynames` (
  `HotelCityNameID` int(11) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`HotelCityNameID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_hotel_citynames` */

insert  into `_tbl_hotel_citynames`(`HotelCityNameID`,`CityName`,`IsActive`) values (1,'Marthandam',1),(2,'Nagercoil',1),(3,'Kanyakumari',1),(4,'Chennai',0);

/*Table structure for table `_tbl_hotels` */

DROP TABLE IF EXISTS `_tbl_hotels`;

CREATE TABLE `_tbl_hotels` (
  `HotelID` int(11) NOT NULL AUTO_INCREMENT,
  `HotelCityNameID` int(11) DEFAULT NULL,
  `HotelName` varchar(255) DEFAULT NULL,
  `HotelThumb` varchar(255) DEFAULT NULL,
  `HotelDescription` text,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`HotelID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_hotels` */

insert  into `_tbl_hotels`(`HotelID`,`HotelCityNameID`,`HotelName`,`HotelThumb`,`HotelDescription`,`IsActive`) values (1,2,'Pepper Residency','Pepper Residency.png','Best Hotels in nagercoil',1),(2,2,'Hotel Ganga Tamilnadu','ganga.jpg',NULL,1),(3,2,'Hotel Ramraj Regency','Hotel Ramraj Regency.jpg',NULL,1),(4,2,'SGS Lodgings International','sgs.jpg',NULL,1),(5,1,'GSSS 123','Pepper Residency.png','sadfgsagsag456',0);

/*Table structure for table `_tbl_hotels_packages` */

DROP TABLE IF EXISTS `_tbl_hotels_packages`;

CREATE TABLE `_tbl_hotels_packages` (
  `HotelPackageID` int(11) NOT NULL AUTO_INCREMENT,
  `HotelCityNameID` int(11) DEFAULT NULL,
  `HotelID` int(11) DEFAULT NULL,
  `PackageName` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `OfferPrice` varchar(255) DEFAULT NULL,
  `Description` text,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`HotelPackageID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_hotels_packages` */

insert  into `_tbl_hotels_packages`(`HotelPackageID`,`HotelCityNameID`,`HotelID`,`PackageName`,`Price`,`OfferPrice`,`Description`,`IsActive`) values (1,2,1,'Single Bed Rome AC','850','800',NULL,1),(2,2,1,'Single Bed Room Non-AC','700','650',NULL,1),(3,2,1,'Double Bed Room AC','1500','1400',NULL,1),(4,2,1,'Double Bed Room Non-AC','1800','1700',NULL,1),(5,2,1,'Triple Bed A/C','3333','2222','Triple Bed A/C',1),(6,2,1,'package single room','1500','1300','Details',0);

/*Table structure for table `_tbl_taxi` */

DROP TABLE IF EXISTS `_tbl_taxi`;

CREATE TABLE `_tbl_taxi` (
  `TaxiTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `TaxiName` varchar(255) DEFAULT NULL,
  `Description` text,
  `TaxiThumb` varchar(255) DEFAULT NULL,
  `taxi_order` int(11) DEFAULT '0',
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`TaxiTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_taxi` */

insert  into `_tbl_taxi`(`TaxiTypeID`,`TaxiName`,`Description`,`TaxiThumb`,`taxi_order`,`IsActive`) values (1,'Auto',NULL,'auto.png',1,1),(2,'Maruthi Ertiga',NULL,'ertiga.png',2,1),(3,'Innova',NULL,'inova.png',3,1),(4,'Mahindra Van',NULL,'mahindravan.png',4,1),(5,'Maruthi Swift',NULL,'swift.png',5,1),(6,'Tempo Traveller',NULL,'temp_traveller.png',6,1),(7,'etios.png',NULL,'tyotaets.png',7,1),(8,'Indica V2',NULL,'tataindigo.png',8,1),(9,'Fortuine',NULL,'toya_for.png',9,1),(10,'Polo',NULL,'polo.png',10,1),(11,'Xylo','Rs. 15 per km','mahindra-xylo-car-500x500.png',11,1),(12,'sdsad','asdasd','up.php',0,1);

/*Table structure for table `_tbl_to_places` */

DROP TABLE IF EXISTS `_tbl_to_places`;

CREATE TABLE `_tbl_to_places` (
  `ToPlaceID` int(11) NOT NULL AUTO_INCREMENT,
  `ToPlaceName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ToPlaceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_to_places` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
