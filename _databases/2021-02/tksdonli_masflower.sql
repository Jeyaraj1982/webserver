/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - tksdonli_masflower
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tksdonli_masflower` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tksdonli_masflower`;

/*Table structure for table `_tbl_sales_admin` */

DROP TABLE IF EXISTS `_tbl_sales_admin`;

CREATE TABLE `_tbl_sales_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminCode` varchar(255) DEFAULT NULL,
  `AdminName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsAdmin` int(11) DEFAULT '0',
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sales_admin` */

insert  into `_tbl_sales_admin`(`AdminID`,`AdminCode`,`AdminName`,`UserName`,`Password`,`CreatedOn`,`IsAdmin`,`IsActive`) values (1,NULL,'Test','admin@sales.com','123456',NULL,1,1);
insert  into `_tbl_sales_admin`(`AdminID`,`AdminCode`,`AdminName`,`UserName`,`Password`,`CreatedOn`,`IsAdmin`,`IsActive`) values (2,'ADS00002','SYED IBRAHIM','MAS','MAS7373','2020-09-07 10:23:14',0,1);
insert  into `_tbl_sales_admin`(`AdminID`,`AdminCode`,`AdminName`,`UserName`,`Password`,`CreatedOn`,`IsAdmin`,`IsActive`) values (3,'ADS00003','GANESAN','GANESAN','GAN123','2020-09-07 10:23:57',0,1);
insert  into `_tbl_sales_admin`(`AdminID`,`AdminCode`,`AdminName`,`UserName`,`Password`,`CreatedOn`,`IsAdmin`,`IsActive`) values (4,'ADS00004','Jeyaraj','Jeyaraj','123456789','2020-09-07 19:41:01',0,1);
insert  into `_tbl_sales_admin`(`AdminID`,`AdminCode`,`AdminName`,`UserName`,`Password`,`CreatedOn`,`IsAdmin`,`IsActive`) values (5,'ADS00005','MANI','MANI','MANI123','2020-09-08 10:24:04',0,1);
insert  into `_tbl_sales_admin`(`AdminID`,`AdminCode`,`AdminName`,`UserName`,`Password`,`CreatedOn`,`IsAdmin`,`IsActive`) values (6,'ADS00006','DHARIK','DHARIK','DHARIK123','2020-09-08 10:24:22',0,1);

/*Table structure for table `_tbl_sales_customers` */

DROP TABLE IF EXISTS `_tbl_sales_customers`;

CREATE TABLE `_tbl_sales_customers` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerCode` varchar(255) DEFAULT NULL,
  `CustomerName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CustomerNameTamil` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ShopName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ShopNameTamil` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `MaximumCreditLimit` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `AddressLine2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `AddressLine3` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedOn` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sales_customers` */

insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (15,'CSTR00735','ANBUDAN','அன்புடன்','ANBUDAN','அன்புடன்','8220086967','','0','KARAIKUDI','','','2020-10-26 22:44:34',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (16,'CSTR00016','S ARUMUGAM','S ஆறுமுகம் ','S ARUMUGAM','S ஆறுமுகம் ','8888888888','','0','9443850694','','','2020-11-02 16:22:08',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (17,'CSTR00017','CASH','கேஷ் ','CASH','கேஷ் ','9003638869','','0','KARAIKUDI','','','2020-11-02 19:50:49',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (18,'CSTR00018','K SUBRAMANI','K சுப்பிரமணி ','K SUBRAMANI','கே சுப்பிரமணி ','9999999988','','0','OPP SIVAM THEATRE, KARAIKUDI','','','2020-11-03 16:41:18',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (19,'CSTR00019','NAGARAJAN','நாகராஜன் ','NAGARAJAN','நாகராஜன் ','9999999987','','0','PWD OFF NEAR, KARAIKUDI','','','2020-11-03 16:41:54',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (20,'CSTR00020','C RAVI','C ரவி ','C RAVI','C ரவி ','9999999858','','0','PWD OFF NEAR, KARAIKUDI','','','2020-11-03 16:43:25',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (21,'CSTR00021','SENTHIL','செந்தில் ','SENTHIL','செந்தில் ','9999999856','','0','KARAIKUDI','','','2020-11-03 16:43:50',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (22,'CSTR00022','SUGUMAR','சுகுமார் ','SUGUMAR','சுகுமார் ','9999999855','','0','KARAIKUDI','','','2020-11-03 16:44:17',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (23,'CSTR00023','SPR','SPR','SPR','SPR','9999999854','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 16:45:40',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (24,'CSTR00024','V GANESAN','V கணேசன் ','V GANESAN','V கணேசன் ','9999999853','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 16:46:08',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (25,'CSTR00025','MEENAKSHI SUNDARAM','மீனாட்சி  சுந்தரம்','MEENAKSHI SUNDARAM','மீனாட்சி  சுந்தரம் ','9999999842','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 16:47:38',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (26,'CSTR00026','SUBRA','சுப்ரா','SUBRA','சுப்ரா ','9999555822','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 16:48:08',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (27,'CSTR00027','SARATH KUMAR','சரத் குமார்','SARATH KUMAR','சரத் குமார் ','8888888887','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 16:48:39',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (28,'CSTR00028','SOANIMUTHU','சோனைமுத்து ','SOANIMUTHU','சோனைமுத்து ','9999999857','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 16:49:06',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (29,'CSTR00029','BALAN','பாலன் ','BALAN','பாலன் ','9999232422','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 16:49:44',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (30,'CSTR00030','SAKTHI','சக்தி ','SAKTHI','சக்தி ','8877777787','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 16:50:26',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (31,'CSTR00031','NANDHINI','நந்தினி ','NANDHINI','நந்தினி ','8877777777','','0','MUTHUMARIYAMMAN KOVIL, KARAIKUDI','','','2020-11-03 16:51:18',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (32,'CSTR00032','KALAIYARASI','கலையரசி ','KALAIYARASI','கலையரசி ','9645645634','','0','MUTHUMARIYAMMAN KOVIL, KARAIKUDI','','','2020-11-03 16:51:42',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (33,'CSTR00033','SOLAI','சோலை ','SOLAI','சோலை ','6456456854','','0','MUTHUMARIYAMMAN KOVIL, KARAIKUDI','','','2020-11-03 16:52:04',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (34,'CSTR00034','EB KAVITHA','EB  கவிதா ','EB KAVITHA','EB கவிதா ','9534888888','','0','MUTHUMARIYAMMAN KOVIL, KARAIKUDI','','','2020-11-03 16:53:56',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (35,'CSTR00035','THANGARASU','தங்கராசு ','THANGARASU','தங்கராசு ','9994599854','','0','MUTHUMARIYAMMAN KOVIL, KARAIKUDI','','','2020-11-03 16:54:24',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (36,'CSTR00036','PANDI','பாண்டி ','PANDI','பாண்டி ','9878865645','','0','MUTHUMARIYAMMAN KOVIL, KARAIKUDI','','','2020-11-03 16:55:06',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (37,'CSTR00037','OM SAKTHI','ஓம்  சக்தி ','OM SAKTHI ','ஓம்  சக்தி ','6757436523','','0','MUTHUMARIYAMMAN KOVIL, KARAIKUDI','','','2020-11-03 16:55:40',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (38,'CSTR00038','JEEVA','ஜீவா ','JEEVA','ஜீவா ','8532523536','','0','MUTHUMARIYAMMAN KOVIL, KARAIKUDI','','','2020-11-03 16:56:01',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (39,'CSTR00039','KAVITHA','கவிதா ','KAVITHA','கவிதா ','8656743563','','0','OPP MULTICARE HOSPITAL, KARAIKUDI','','','2020-11-03 16:56:37',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (40,'CSTR00040','SUBRAMANI','சுப்பிரமணி ','SUBRAMANI','சுப்பிரமணி ','9345635353','','0','IN FRONT OF CORNER BAKERY, KARAIKUDI','','','2020-11-03 16:57:26',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (41,'CSTR00041','SURESH','சுரேஷ் ','SURESH','சுரேஷ் ','9875645756','','0','MANAGIRI','','','2020-11-03 16:57:47',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (42,'CSTR00042','A KANNAN','A கண்ணன் ','A KANNAN',' A கண்ணன் ','9863423454','','0','PILLAIYARPATTI','','','2020-11-03 16:58:13',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (43,'CSTR00043','VAIRAVAN','வைரவன் ','VAIRAVAN','வைரவன் ','9824234534','','0','PILLAIYARPATTI','','','2020-11-03 16:58:34',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (44,'CSTR00044','SS DEVAKOTTAI','SS தேவகோட்டை ','SS DEVAKOTTAI','SS தேவகோட்டை ','9834534523','','0','DEVAKOTTAI','','','2020-11-03 16:59:06',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (45,'CSTR00045','DASS','தாஸ் ','DASS','தாஸ் ','9867234234','','0','5 LAMPS, KARAIKUDI','','','2020-11-03 16:59:36',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (46,'CSTR00046','SM IYAPPAN','SM ஐயப்பன் ','SM IYAPPAN','SM ஐயப்பன் ','9834534654','','0','2ND BEAT KARAIKUDI','','','2020-11-03 17:01:35',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (47,'CSTR00047','PRASANTH','பிரசாந்த் ','PRASANTH','பிரசாந்த் ','9756756745','','0','KOTTAIYUR','','','2020-11-03 17:02:25',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (48,'CSTR00048','SELLAPPAN','செல்லப்பன் ','SELLAPPAN','செல்லப்பன் ','9834563462','','0','KANDANOOR','','','2020-11-03 17:03:03',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (49,'CSTR00049','SAKTHI','சக்தி ','SAKTHI','சக்தி ','9854364563','','0','KOTTAIYUR','','','2020-11-03 17:03:59',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (50,'CSTR00050','PALANI','பழனி ','PALANI','பழனி ','9834536345','','0','IDAIYAR THERU, KARAIKUDI','','','2020-11-03 17:04:28',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (51,'CSTR00051','SELVAM','செல்வம் ','SELVAM','செல்வம் ','9876745346','','0','KALLUKATTI KARAIKUDI','','','2020-11-03 17:04:52',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (52,'CSTR00052','SUBRAMANI 1ST BEAT','சுப்பிரமணி  1ST பீட் ','SUBRAMANI 1ST BEAT ','சுப்பிரமணி  1ST பீட் ','9845634563','','0','1ST BEAT KARAIKUDI','','','2020-11-03 17:06:09',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (53,'CSTR00053','MARIMUTHU','மாரிமுத்து ','MARIMUTHU','மாரிமுத்து ','9853456345','','0','MELAMADAM KARAIKUDI','','','2020-11-03 17:06:38',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (54,'CSTR00054','SANKAR','சங்கர் ','SANKAR','சங்கர் ','9845234647','','0','MELAMADAM KARAIKUDI','','','2020-11-03 17:11:23',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (55,'CSTR00055','A PALANIYAPPAN','A பழனியப்பன் ','A PALANIYAPPAN','A பழனியப்பன் ','9787585031','','0','SENJAI KARAIKUDI','','','2020-11-03 17:12:03',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (56,'CSTR00056','SANTHI','சாந்தி ','SANTHI','சாந்தி ','9852651254','','0','AATHANGUDI','','','2020-11-03 17:12:37',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (57,'CSTR00057','CHINNAIYA','சின்னையா ','CHINNAIYA','சின்னையா ','9845634634','','0','AATHANGUDI','','','2020-11-03 17:13:03',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (58,'CSTR00058','SHANMUGAVALLI','சண்முகவள்ளி ','SHANMUGAVALLI','சண்முகவள்ளி ','9765674573','','0','PERIYAR SILAI KARAIKUDI','','','2020-11-03 17:14:27',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (59,'CSTR00059','MUTHU','முத்து ','MUTHU','முத்து ','9832353234','','0','PERIYAR SILAI KARAIKUDI','','','2020-11-03 17:15:02',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (60,'CSTR00060','JEYAM','ஜெயம் ','JEYAM','ஜெயம் ','9745634575','','0','OPP TRS EVENT SHOP, PERIYAR SILAI, KARAIKUDI','','','2020-11-03 17:15:40',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (61,'CSTR00061','NAGARAJAN RK','நாகராஜன்  RK','NAGARAJAN RK','நாகராஜன்  RK','9057457546','','0','SEKKALAI BAKREY KARAIKUDI','','','2020-11-03 17:16:22',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (62,'CSTR00062','MUTHUSAMY','முத்துசாமி ','MUTHUSAMY','முத்துசாமி ','9056745678','','0','SEKKALAI BAKREY KARAIKUDI','','','2020-11-03 17:16:51',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (63,'CSTR00063','HITLAR','ஹிட்லர் ','HITLAR','ஹிட்லர் ','9056745687','','0','WATER TANK KARAIKUDI','','','2020-11-03 17:17:17',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (64,'CSTR00064','BALAJI','பாலாஜி ','BALAJI','பாலாஜி ','9965603944','','0','PAPPA OORANI KARAIKUDI','','','2020-11-03 17:17:49',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (65,'CSTR00065','KUMAR','குமார் ','KUMAR','குமார் ','8978847574','','0','OPP SIVAM THEATRE, KARAIKUDI','','','2020-11-03 17:18:42',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (66,'CSTR00066','KUMAR DEVAKOTTAI','குமார்  தேவகோட்டை ','KUMAR DEVAKOTTAI','குமார்  தேவகோட்டை ','9055745745','','0','DEVAKOTTAI','','','2020-11-03 17:19:09',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (67,'CSTR00067','C MANI','C மணி ','C MANI','C மணி ','9087456745','','0','KARAIKUDI','','','2020-11-03 17:19:41',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (68,'CSTR00068','MANI PERUVAKOTTAI','மணி பெருவாகோட்டை ','MANI PERUVAKOTTAI','மணி பெருவாகோட்டை ','9057457456','','0','PERUVAKOTTAI','','','2020-11-03 17:29:52',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (69,'CSTR00069','GANESAN O SIRUVAYAL','கணேசன் ஓ சிறுவயல் ','GANESAN O SIRUVAYAL','கணேசன் ஓ சிறுவயல் ','9906847734','','0','O SIRUVAYAL','','','2020-11-03 17:30:58',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (70,'CSTR00070','VASANTHA O SIRUVAYAL','வசந்தா  ஓ  சிறுவயல் ','VASANTHA O SIRUVAYAL','வசந்தா  ஓ  சிறுவயல் ','9057435745','','0','O SIRUVAYAL','','','2020-11-03 17:31:48',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (71,'CSTR00071','SOUNDARAM O SIRUVAYAL','சௌந்தரம்  ஓ  சிறுவயல் ','SOUNDARAM O SIRUVAYAL','சௌந்தரம்  ஓ  சிறுவயல் ','9056745674','','0','O SIRUVAYAL','','','2020-11-03 17:32:31',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (72,'CSTR00072','IMRAN','இம்ரான் ','IMRAN','இம்ரான் ','9056845674','','0','KANDRAMANICKAM','','','2020-11-03 17:33:27',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (73,'CSTR00073','ARUMUGAM O SIRUVAYAL','ஆறுமுகம்  ஓ  சிறுவயல் ','ARUMUGAM O SIRUVAYAL','ARUMUGAM  ஓ  சிறுவயல் ','9046234674','','0','O SIRUVAYAL','','','2020-11-03 17:34:04',1);
insert  into `_tbl_sales_customers`(`CustomerID`,`CustomerCode`,`CustomerName`,`CustomerNameTamil`,`ShopName`,`ShopNameTamil`,`MobileNumber`,`EmailID`,`MaximumCreditLimit`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`CreatedOn`,`IsActive`) values (74,'CSTR00074','GNANAM','ஞானம் ','GNANAM','ஞானம் ','8675423242','','0','KARAIKUDI','','','2020-11-03 17:35:42',1);

/*Table structure for table `_tbl_sales_products` */

DROP TABLE IF EXISTS `_tbl_sales_products`;

CREATE TABLE `_tbl_sales_products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductCode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `BarCode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ProductName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ProductNameTamil` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ProductUnitID` int(11) DEFAULT NULL,
  `ProductUnitName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ProductUnitFullName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ProductPrice` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  `IsPublish` int(11) DEFAULT '1',
  `Isdelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sales_products` */

insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (1,'MAS00001','1234','SAMMANKI POO','சம்மங்கி பூ',1,'KG','Kilogram','100','','2020-09-05 21:03:20',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (6,'MAS00004','','Mallikai Poo','மல்லிகை பூ ',1,'KG','Kilogram','100','','2020-09-07 11:13:17',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (7,'MAS00005','','Roja Poo','ரோஜா பூ',1,'KG','Kilogram','100','','2020-09-07 11:15:42',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (25,'MAS00004','','Kozhunthu','கொழுந்து ',1,'KG','Kilogram','100','','2020-09-07 18:36:08',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (27,'MAS00006','','Thulasi','துளசி ',1,'KG','Kilogram','100','','2020-09-07 18:38:50',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (28,'MAS00007','','Sevvanthi','செவ்வந்தி பூ ',1,'KG','Kilogram','100','','2020-09-07 18:39:19',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (29,'MAS00008','','Sendi Poo','செண்டி பூ ',1,'KG','Kilogram','100','','2020-09-07 18:39:38',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (30,'MAS00009','','Sivappu Buton Rose','சிவப்பு பட்டன் ரோஸ் ',1,'KG','Kilogram','100','','2020-09-07 18:40:20',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (31,'MAS00010','','Manjal Button Rose','மஞ்சள் பட்டன் ரோஸ் ',1,'KG','Kilogram','100','','2020-09-07 18:41:04',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (32,'MAS00011','','Kanakaamparam','கனகாம்பரம் ',1,'KG','Kilogram','100','','2020-09-11 19:28:07',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (33,'MAS00012','','Naar','நார் ',1,'KG','Kilogram','100','','2020-09-18 17:12:55',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (34,'MAS00013','','Thakkaali','தக்காளி ',1,'KG','Kilogram','100','','2020-09-18 17:14:47',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (35,'MAS00014','','PICHCHI POO','பிச்சி பூ',1,'KG','Kilogram','100','','2020-10-26 22:47:46',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (36,'MAS00015','','MULLAI POO','முல்லை பூ',1,'KG','Kilogram','100','','2020-10-26 22:48:05',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (37,'MAS00016','','HYBRID SAMMANKI','ஹைபிரிட் சம்மங்கி',1,'KG','Kilogram','100','','2020-10-26 22:50:02',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (38,'MAS00017','','KOZHI','கோழி',1,'KG','Kilogram','100','','2020-10-26 22:50:37',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (39,'MAS00018','','ARALI','அரளி',1,'KG','Kilogram','100','','2020-10-26 22:51:17',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (40,'MAS00019','','LUGGAGE','லக்கேஜ்',1,'KG','Kilogram','100','','2020-10-26 22:51:45',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (41,'MAS00020','','TAJMAHAL','தாஜ்மஹால்',1,'KG','Kilogram','100','','2020-10-26 22:52:07',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (42,'MAS00021','','VELLAI SEVVANTHI','வெள்ளை செவ்வந்தி',1,'KG','Kilogram','100','','2020-10-26 22:52:51',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (43,'MAS00022','','PATTU ROSE','பட்டு ரோஸ்',1,'KG','Kilogram','100','','2020-10-26 23:37:46',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (44,'MAS00023','','AGNI NAAR','அக்னி நார்',1,'KG','Kilogram','100','','2020-10-26 23:38:26',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (45,'MAS00024','','fanta BOX','பாண்ட பாக்ஸ்',1,'KG','Kilogram','100','','2020-10-26 23:39:21',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (46,'MAS00025','','PACHCHAI','பச்சை முடி',1,'KG','Kilogram','100','','2020-10-26 23:40:30',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (47,'MAS00047','','manjal box','மஞ்சள் பாக்ஸ் ',1,'KG','Kilogram','100','','2020-10-31 10:50:30',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (48,'MAS00048','','MUN PAAKKI','முன்  பாக்கி ',1,'KG','Kilogram','100','','2020-11-03 17:42:01',1,0);
insert  into `_tbl_sales_products`(`ProductID`,`ProductCode`,`BarCode`,`ProductName`,`ProductNameTamil`,`ProductUnitID`,`ProductUnitName`,`ProductUnitFullName`,`ProductPrice`,`Description`,`AddedOn`,`IsPublish`,`Isdelete`) values (49,'MAS00049','','SAVUKKU','சவுக்கு ',1,'KG','Kilogram','100','','2020-11-03 17:50:35',1,0);

/*Table structure for table `_tbl_units` */

DROP TABLE IF EXISTS `_tbl_units`;

CREATE TABLE `_tbl_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unitname` varchar(255) DEFAULT NULL,
  `unitfullname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_units` */

insert  into `_tbl_units`(`id`,`unitname`,`unitfullname`) values (1,'KG','Kilogram');

/*Table structure for table `_tbl_wallet` */

DROP TABLE IF EXISTS `_tbl_wallet`;

CREATE TABLE `_tbl_wallet` (
  `RefillID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT '0',
  `Credits` varchar(255) DEFAULT NULL,
  `Debits` varchar(255) DEFAULT NULL,
  `AvailableBalance` varchar(255) DEFAULT NULL,
  `TransactionID` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `AdminID` int(11) DEFAULT '0',
  `RefillOn` datetime DEFAULT NULL,
  PRIMARY KEY (`RefillID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_wallet` */

insert  into `_tbl_wallet`(`RefillID`,`CustomerID`,`Credits`,`Debits`,`AvailableBalance`,`TransactionID`,`Remarks`,`AdminID`,`RefillOn`) values (1,16,'100','0','100','123','vv',1,'2020-11-06 17:41:38');
insert  into `_tbl_wallet`(`RefillID`,`CustomerID`,`Credits`,`Debits`,`AvailableBalance`,`TransactionID`,`Remarks`,`AdminID`,`RefillOn`) values (2,16,'100','0','200','123','bb',1,'2020-11-06 17:42:10');

/*Table structure for table `invoice_order` */

DROP TABLE IF EXISTS `invoice_order`;

CREATE TABLE `invoice_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_name_tamil` varchar(255) DEFAULT NULL,
  `order_receiver_address` text NOT NULL,
  `order_total_after_tax` double(10,2) NOT NULL,
  `order_amount_paid` decimal(10,2) NOT NULL,
  `order_total_amount_due` decimal(10,2) NOT NULL,
  `note` text NOT NULL,
  `receipt_id` int(11) DEFAULT '0',
  `receipt_date` datetime DEFAULT NULL,
  `TransactionMode` varchar(255) DEFAULT NULL,
  `CashTwoThousand` varchar(255) DEFAULT '0',
  `CashFiveHundred` int(11) DEFAULT '0',
  `CashTwoHundred` int(11) DEFAULT '0',
  `CashOneHundred` int(11) DEFAULT '0',
  `CashFiftyRupees` int(11) DEFAULT '0',
  `CashTwentyRupees` int(11) DEFAULT '0',
  `CashTenRupees` int(11) DEFAULT '0',
  `Coins` int(11) DEFAULT '0',
  `TotalCashReceived` varchar(255) DEFAULT '0',
  `ReturnCashToCustomer` varchar(255) DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `invoice_order` */

insert  into `invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_name_tamil`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`) values (2,'IN00940',25,'2020-11-03 18:05:45','MEENAKSHI SUNDARAM',NULL,'KALLUKATTI KARAIKUDI,,',6460.00,'0.00','6460.00','',2,'2020-11-03 18:05:45','Credit','0',0,0,0,0,0,0,0,'0','0');
insert  into `invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_name_tamil`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`) values (3,'IN00003',25,'2020-11-03 18:09:57','MEENAKSHI SUNDARAM',NULL,'KALLUKATTI KARAIKUDI,,',600.00,'0.00','600.00','',3,'2020-11-03 18:09:57','Credit','0',0,0,0,0,0,0,0,'0','0');
insert  into `invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_name_tamil`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`) values (18,'IN00018',42,'2020-11-06 15:39:02','A KANNAN',NULL,'PILLAIYARPATTI,,',125.00,'125.00','0.00','',18,'2020-11-06 15:39:02','Cash','0',0,0,0,0,0,0,0,'125','0');
insert  into `invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_name_tamil`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`) values (19,'IN00019',15,'2020-11-08 11:53:52','ANBUDAN',NULL,'KARAIKUDI,,',205.00,'0.00','205.00','',19,'2020-11-08 11:53:52','Credit','0',0,0,0,0,0,0,0,'0','0');
insert  into `invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_name_tamil`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`) values (20,'IN00020',15,'2020-11-09 10:41:44','ANBUDAN',NULL,'KARAIKUDI,,',892.00,'0.00','892.00','',20,'2020-11-09 10:41:44','Credit','0',0,0,0,0,0,0,0,'0','0');
insert  into `invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_name_tamil`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`) values (21,'IN00021',15,'2020-11-09 10:42:20','ANBUDAN',NULL,'KARAIKUDI,,',200.00,'0.00','200.00','',21,'2020-11-09 10:42:20','Credit','0',0,0,0,0,0,0,0,'0','0');
insert  into `invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_name_tamil`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`) values (22,'IN00022',60,'2020-11-09 11:12:03','JEYAM','ஜெயம் ','OPP TRS EVENT SHOP, PERIYAR SILAI, KARAIKUDI,,',100.00,'100.00','0.00','',27,'2020-11-09 11:12:03','Cash','0',0,0,0,0,0,0,0,'100','0');

/*Table structure for table `invoice_order_item` */

DROP TABLE IF EXISTS `invoice_order_item`;

CREATE TABLE `invoice_order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_code` varchar(250) CHARACTER SET utf8 NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `invoice_order_item` */

insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (4,2,'46','பச்சை முடி','50.00','12.00','600.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (5,2,'1','சம்மங்கி பூ','5.00','120.00','600.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (6,2,'39','அரளி','3.00','120.00','360.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (7,2,'34','தக்காளி ','3.00','200.00','600.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (8,2,'28','செவ்வந்தி பூ ','5.00','120.00','600.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (9,2,'41','தாஜ்மஹால்','5.00','450.00','2250.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (10,2,'49','சவுக்கு ','1.00','100.00','100.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (11,2,'46','பச்சை முடி','30.00','12.00','360.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (12,2,'6','மல்லிகை பூ ','2.00','300.00','600.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (13,2,'46','பச்சை முடி','30.00','13.00','390.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (14,3,'1','சம்மங்கி பூ','5.00','120.00','600.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (36,18,'7','ரோஜா பூ','2.00','100.00','200.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (37,18,'35','பிச்சி பூ','5.00','25.00','125.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (38,19,'36','முல்லை பூ','1.00','55.00','55.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (39,19,'47','மஞ்சள் பாக்ஸ் ','1.00','150.00','150.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (40,20,'46','பச்சை முடி','41.00','12.00','492.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (41,20,'47','மஞ்சள் பாக்ஸ் ','1.00','400.00','400.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (42,21,'36','முல்லை பூ','1.00','200.00','200.00');
insert  into `invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`) values (43,22,'7','ரோஜா பூ','1.00','100.00','100.00');

/*Table structure for table `receipt` */

DROP TABLE IF EXISTS `receipt`;

CREATE TABLE `receipt` (
  `ReceiptID` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_code` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT '0',
  `order_date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `receipt_amount` varchar(255) DEFAULT NULL,
  `invoice_due_amount` varchar(255) DEFAULT NULL,
  `receipt_date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ReceiptID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `receipt` */

insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (1,'RT00001',1,'2020-10-31 10:59:33',15,'100','570.00','2020-10-31 10:59:33',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (2,'RT00940',2,'2020-11-03 18:05:45',25,'0.00','6,460.00','2020-11-03 18:05:45',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (3,'RT00003',3,'2020-11-03 18:09:57',25,'0','600.00','2020-11-03 18:09:57',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (4,'RT00573',4,'2020-11-05 13:22:14',60,'0.00','100.00','2020-11-05 13:22:14',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (5,'RT00005',5,'2020-11-05 13:36:30',60,'100','100.00','2020-11-05 13:36:30',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (6,'RT00006',6,'2020-11-05 13:37:07',60,'100','100.00','2020-11-05 13:37:07',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (7,'RT00007',7,'2020-11-05 13:37:32',60,'100','100.00','2020-11-05 13:37:32',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (8,'RT00008',8,'2020-11-05 13:39:18',60,'100','0.00','2020-11-05 13:39:18',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (9,'RT00009',9,'2020-11-05 13:46:32',60,'100','0.00','2020-11-05 13:46:32',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (10,'RT00010',10,'2020-11-05 13:54:11',60,'200','0.00','2020-11-05 13:54:11',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (11,'RT00011',11,'2020-11-05 14:00:59',60,'100','0.00','2020-11-05 14:00:59',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (12,'RT00012',12,'2020-11-05 14:06:53',60,'200','0.00','2020-11-05 14:06:53',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (13,'RT00013',13,'2020-11-05 15:07:33',60,'100.00','0.00','2020-11-05 15:07:33',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (14,'RT00014',14,'2020-11-05 15:14:02',60,'100.00','0.00','2020-11-05 15:14:02',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (15,'RT00015',15,'2020-11-06 12:14:08',60,'200','0.00','2020-11-06 12:14:08',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (16,'RT00016',16,'2020-11-06 12:50:48',60,'200','0.00','2020-11-06 12:50:48',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (17,'RT00017',17,'2020-11-06 12:51:48',60,'100','0.00','2020-11-06 12:51:48',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (18,'RT00018',18,'2020-11-06 15:39:02',42,'125.00','0.00','2020-11-06 15:39:02',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (19,'RT00019',19,'2020-11-08 11:53:52',15,'0','205.00','2020-11-08 11:53:52',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (20,'RT00020',20,'2020-11-09 10:41:44',15,'0','892.00','2020-11-09 10:41:44',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (21,'RT00021',21,'2020-11-09 10:42:20',15,'0','200.00','2020-11-09 10:42:20',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (22,'RT00022',NULL,'2020-11-09 11:05:56',60,'100','0.00','2020-11-09 11:05:56',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (23,'RT00023',NULL,'2020-11-09 11:06:15',60,'100','0.00','2020-11-09 11:06:15',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (24,'RT00024',NULL,'2020-11-09 11:07:00',60,'100','0.00','2020-11-09 11:07:00',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (25,'RT00025',NULL,'2020-11-09 11:07:53',60,'100','0.00','2020-11-09 11:07:53',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (26,'RT00026',NULL,'2020-11-09 11:10:09',60,'100','0.00','2020-11-09 11:10:09',NULL);
insert  into `receipt`(`ReceiptID`,`receipt_code`,`order_id`,`order_date`,`user_id`,`receipt_amount`,`invoice_due_amount`,`receipt_date`,`description`) values (27,'RT00027',22,'2020-11-09 11:12:03',60,'100','0.00','2020-11-09 11:12:03',NULL);

/*Table structure for table `save_invoice_order` */

DROP TABLE IF EXISTS `save_invoice_order`;

CREATE TABLE `save_invoice_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_receiver_name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `order_receiver_address` text CHARACTER SET utf8 NOT NULL,
  `order_total_after_tax` double(10,2) NOT NULL,
  `order_amount_paid` decimal(10,2) NOT NULL,
  `order_total_amount_due` decimal(10,2) NOT NULL,
  `note` text CHARACTER SET utf8 NOT NULL,
  `receipt_id` int(11) DEFAULT '0',
  `receipt_date` datetime DEFAULT NULL,
  `TransactionMode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CashTwoThousand` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `CashFiveHundred` int(11) DEFAULT '0',
  `CashTwoHundred` int(11) DEFAULT '0',
  `CashOneHundred` int(11) DEFAULT '0',
  `CashFiftyRupees` int(11) DEFAULT '0',
  `CashTwentyRupees` int(11) DEFAULT '0',
  `CashTenRupees` int(11) DEFAULT '0',
  `Coins` int(11) DEFAULT '0',
  `TotalCashReceived` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `ReturnCashToCustomer` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `SavedByID` int(11) DEFAULT '0',
  `LastUpdatedOn` datetime DEFAULT NULL,
  `LastModifiedBy` int(11) DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `save_invoice_order` */

insert  into `save_invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`,`SavedByID`,`LastUpdatedOn`,`LastModifiedBy`) values (5,'IN00005',60,'2020-11-09 10:02:17','JEYAM','OPP TRS EVENT SHOP, PERIYAR SILAI, KARAIKUDI,,',500.00,'0.00','500.00','',0,NULL,NULL,'0',0,0,0,0,0,0,0,'0','0',4,'2020-11-09 10:02:17',4);
insert  into `save_invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`,`SavedByID`,`LastUpdatedOn`,`LastModifiedBy`) values (8,'IN00008',60,'2020-11-09 10:11:03','JEYAM','OPP TRS EVENT SHOP, PERIYAR SILAI, KARAIKUDI,,',100.00,'0.00','100.00','',0,NULL,NULL,'0',0,0,0,0,0,0,0,'0','0',4,'2020-11-09 10:11:03',4);
insert  into `save_invoice_order`(`order_id`,`order_code`,`user_id`,`order_date`,`order_receiver_name`,`order_receiver_address`,`order_total_after_tax`,`order_amount_paid`,`order_total_amount_due`,`note`,`receipt_id`,`receipt_date`,`TransactionMode`,`CashTwoThousand`,`CashFiveHundred`,`CashTwoHundred`,`CashOneHundred`,`CashFiftyRupees`,`CashTwentyRupees`,`CashTenRupees`,`Coins`,`TotalCashReceived`,`ReturnCashToCustomer`,`SavedByID`,`LastUpdatedOn`,`LastModifiedBy`) values (9,'IN00009',67,'2020-11-09 12:02:44','C MANI','KARAIKUDI,,',8400.00,'0.00','8400.00','',0,NULL,NULL,'0',0,0,0,0,0,0,0,'0','0',4,'2020-11-09 12:02:44',4);

/*Table structure for table `save_invoice_order_item` */

DROP TABLE IF EXISTS `save_invoice_order_item`;

CREATE TABLE `save_invoice_order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_code` varchar(250) CHARACTER SET utf8 NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL,
  `SavedByID` int(11) NOT NULL DEFAULT '0',
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `save_invoice_order_item` */

insert  into `save_invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`,`SavedByID`,`AddedOn`) values (10,5,'7','ரோஜா பூ','1.00','100.00','100.00',4,'2020-11-09 10:02:17');
insert  into `save_invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`,`SavedByID`,`AddedOn`) values (11,5,'6','மல்லிகை பூ ','1.00','100.00','100.00',4,'2020-11-09 10:02:17');
insert  into `save_invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`,`SavedByID`,`AddedOn`) values (12,5,'47','மஞ்சள் பாக்ஸ் ','1.00','100.00','100.00',4,'2020-11-09 10:02:17');
insert  into `save_invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`,`SavedByID`,`AddedOn`) values (13,5,'43','பட்டு ரோஸ்','1.00','200.00','200.00',4,'2020-11-09 10:02:17');
insert  into `save_invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`,`SavedByID`,`AddedOn`) values (19,8,'7','ரோஜா பூ','1.00','100.00','100.00',4,'2020-11-09 10:11:03');
insert  into `save_invoice_order_item`(`order_item_id`,`order_id`,`item_code`,`item_name`,`order_item_quantity`,`order_item_price`,`order_item_final_amount`,`SavedByID`,`AddedOn`) values (20,9,'7','ரோஜா பூ','56.00','150.00','8400.00',4,'2020-11-09 12:02:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
