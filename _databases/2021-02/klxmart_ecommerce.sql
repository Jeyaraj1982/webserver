/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - klxmart_ecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`klxmart_ecommerce` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `klxmart_ecommerce`;

/*Table structure for table `_tbl_admin` */

DROP TABLE IF EXISTS `_tbl_admin`;

CREATE TABLE `_tbl_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminCode` varchar(255) DEFAULT NULL,
  `AdminName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `AdminEmail` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `DateofBirth` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `StateNameID` int(11) DEFAULT '0',
  `StateName` varchar(255) DEFAULT NULL,
  `CountryNameID` int(11) DEFAULT '0',
  `CountryName` varchar(255) DEFAULT NULL,
  `DistrictNameID` int(11) DEFAULT '0',
  `DistrictName` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_admin` */

insert  into `_tbl_admin`(`AdminID`,`AdminCode`,`AdminName`,`MobileNumber`,`AdminEmail`,`Password`,`Gender`,`DateofBirth`,`Address1`,`Address2`,`PostalCode`,`City`,`StateNameID`,`StateName`,`CountryNameID`,`CountryName`,`DistrictNameID`,`DistrictName`,`CreatedOn`) values (1,'AD0001','ecommerceadmin','9000000000','admin@klxmart.com','123456','Male','1996-3-10','aaaaaaaaaaaaa','nnnnnnnnnnnnnnnnnnnnn','6789876',NULL,1,'Tamil Nadu',1,'India',15,'Perambalur',NULL);

/*Table structure for table `_tbl_admin_login_logs` */

DROP TABLE IF EXISTS `_tbl_admin_login_logs`;

CREATE TABLE `_tbl_admin_login_logs` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` int(11) DEFAULT NULL,
  `LoginOn` datetime DEFAULT NULL,
  `IsSuccess` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userpassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_admin_login_logs` */

/*Table structure for table `_tbl_brands` */

DROP TABLE IF EXISTS `_tbl_brands`;

CREATE TABLE `_tbl_brands` (
  `BrandID` int(11) NOT NULL AUTO_INCREMENT,
  `BrandCode` varchar(255) DEFAULT NULL,
  `BrandName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `AddedOn` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BrandID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_brands` */

insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (4,'BRND00002','Other brand',1,'2020-10-08 14:19:30');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (5,'BRND00003','Samsung',1,'2020-10-08 14:19:45');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (6,'BRND00003','Klx',1,'2020-10-08 14:20:02');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (7,'BRND00004','Lakhsmi ',1,'2020-11-29 12:37:37');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (8,'BRND00005','Butterfly ',1,'2020-11-29 12:41:46');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (9,'BRND00006','Louis philippe',1,'2020-12-12 20:33:15');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (10,'BRND00007','Calvin klein',1,'2020-12-12 20:34:19');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (11,'BRND00008','Gucci',1,'2020-12-12 20:34:41');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (12,'BRND00009','Tommy',1,'2020-12-12 20:35:09');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (13,'BRND000010','Levis Denims',1,'2020-12-12 20:36:50');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (14,'BRND000011','Replay Denims',1,'2020-12-12 20:37:24');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (15,'BRND000012','Adidas',1,'2020-12-12 20:37:52');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (16,'BRND000013','Tommy Hilfiger',1,'2020-12-12 20:39:18');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (17,'BRND000014','Burberry',1,'2020-12-12 20:39:54');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (18,'BRND000015','Allen Solly',1,'2020-12-12 20:40:15');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (19,'BRND000016','Levis',1,'2020-12-12 20:41:47');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (20,'BRND000017','Green Chef',1,'2020-12-13 22:42:59');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (21,'BRND000018','Pigeon ',1,'2020-12-13 22:43:09');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (22,'BRND000019','Reebok',1,'2020-12-13 22:44:05');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (23,'BRND000020','Nike ',1,'2020-12-13 22:44:15');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (24,'BRND000021','Puma',1,'2020-12-13 22:44:30');

/*Table structure for table `_tbl_category` */

DROP TABLE IF EXISTS `_tbl_category`;

CREATE TABLE `_tbl_category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `AddedOn` datetime DEFAULT NULL,
  `ListOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_category` */

insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (1,'Electronics','','',1,'2020-11-29 12:24:41',10);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (2,'Furnitures','main-image-lulu.jpg','furniture',1,'2020-12-01 21:44:52',9);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (3,'Fashion And  Readymades','Indian-Wedding-Saree-Latest-Designs-Trends-Collection-2017-2018-16.jpg','fashion',1,'2020-12-01 21:55:51',14);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (4,'Home Appliances',NULL,NULL,1,NULL,7);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (5,'foods & beverages',NULL,NULL,1,NULL,6);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (6,'Groceries',NULL,NULL,1,NULL,5);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (8,'Furits and  Vegitables','','',1,NULL,8);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (12,'Earning  Package ','','Masala products',1,'2020-12-06 18:26:21',1);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (13,'Bulk purchase Only','','Bulk items',1,'2020-12-08 14:30:48',4);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (14,'Best Price ','','Free Offer',1,'2020-12-11 12:22:34',2);
insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (19,'Combo Offer Appliances ','','',1,'2020-12-18 17:01:07',2);

/*Table structure for table `_tbl_customer` */

DROP TABLE IF EXISTS `_tbl_customer`;

CREATE TABLE `_tbl_customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerCode` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `CustomerName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `EmailID` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `MobileNumber` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `AddressLine1` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `AddressLine2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `AddressLine3` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `PostalCode` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `LandMark` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  `Referral` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ManualCreate` int(11) DEFAULT '0',
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=30015 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_customer` */

insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30001,'CSTMR00001','Demo','demo@gmail.com','9111111111','123456789',NULL,NULL,NULL,NULL,NULL,1,'2020-12-01 12:32:24','njjja',0,0);
insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30002,'CSTMR00002','Jeevan','jesyajeshu@gmail.com','9791330770','marthandam123',NULL,NULL,NULL,NULL,NULL,1,'2020-12-06 10:27:24','njjjB',0,0);
insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30003,'CSTMR00003','Jeyaraj','Jeyaraj_123@yahoo.com','9944872965','123456',NULL,NULL,NULL,NULL,NULL,1,'2020-12-07 14:15:18','njjjBn',30002,0);
insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30004,'CSTMR00004','Jeya','jeya@gmail.com','9944872966','123456',NULL,NULL,NULL,NULL,NULL,1,'2020-12-08 12:23:02','',30002,0);
insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30005,'CSTMR00005','Jeya','jeya123@gmail.com','9944872967','123456',NULL,NULL,NULL,NULL,NULL,1,'2020-12-08 12:32:15','',30002,0);
insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30006,'CSTMR00006','dominoss https://wikipedia.org 172076','bartashnaason@yandex.ru','0506915322','dominoss https://wikipedia.org WoloutNot',NULL,NULL,NULL,NULL,NULL,1,'2020-12-18 00:27:06',NULL,NULL,0);
insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30012,'CSTMR000012','welcome',NULL,'9988776653','123456',NULL,NULL,NULL,NULL,NULL,1,'2020-12-19 15:26:15','njjaB',30003,0);
insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30013,'CSTMR00008','Mariya',NULL,'9677829677','nagercoil123',NULL,NULL,NULL,NULL,NULL,1,'2020-12-22 15:38:42','njjan',30002,1);
insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (30014,'CSTMR00009','JesseMig','i.oox.ve.r.t.r.i.s.@gmail.com','8218','O%3fgw8ex3D',NULL,NULL,NULL,NULL,NULL,1,'2021-01-31 21:41:26',NULL,NULL,0);

/*Table structure for table `_tbl_customer_bankinformations` */

DROP TABLE IF EXISTS `_tbl_customer_bankinformations`;

CREATE TABLE `_tbl_customer_bankinformations` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT NULL,
  `BankAccountName` varchar(255) DEFAULT NULL,
  `BankAccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_customer_bankinformations` */

/*Table structure for table `_tbl_invoices` */

DROP TABLE IF EXISTS `_tbl_invoices`;

CREATE TABLE `_tbl_invoices` (
  `InvoiceID` int(11) NOT NULL AUTO_INCREMENT,
  `InvoiceCode` varchar(255) DEFAULT NULL,
  `OrderCode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `CustomerName` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `CustomerEmailID` varchar(255) DEFAULT NULL,
  `CustomerMobileNumber` varchar(255) DEFAULT NULL,
  `BillingAddress1` varchar(255) DEFAULT NULL,
  `BillingAddress2` varchar(255) DEFAULT NULL,
  `BillingAddress3` varchar(255) DEFAULT NULL,
  `BillingPincode` varchar(100) DEFAULT NULL,
  `BillingLandMark` varchar(255) DEFAULT NULL,
  `InvoiceTotal` double(10,2) DEFAULT '0.00',
  `PaymentMode` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `InvoiceStatus` int(11) DEFAULT '1',
  `InvoiceDate` datetime DEFAULT NULL,
  PRIMARY KEY (`InvoiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_invoices` */

insert  into `_tbl_invoices`(`InvoiceID`,`InvoiceCode`,`OrderCode`,`OrderID`,`OrderDate`,`CustomerID`,`CustomerName`,`CustomerEmailID`,`CustomerMobileNumber`,`BillingAddress1`,`BillingAddress2`,`BillingAddress3`,`BillingPincode`,`BillingLandMark`,`InvoiceTotal`,`PaymentMode`,`InvoiceStatus`,`InvoiceDate`) values (1,NULL,'ORD00002',2,'2020-12-22 11:42:06',1,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,'0',1,'2020-12-22 11:34:21');
insert  into `_tbl_invoices`(`InvoiceID`,`InvoiceCode`,`OrderCode`,`OrderID`,`OrderDate`,`CustomerID`,`CustomerName`,`CustomerEmailID`,`CustomerMobileNumber`,`BillingAddress1`,`BillingAddress2`,`BillingAddress3`,`BillingPincode`,`BillingLandMark`,`InvoiceTotal`,`PaymentMode`,`InvoiceStatus`,`InvoiceDate`) values (2,NULL,'ORD00003',3,NULL,30013,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,'0',1,'2020-12-22 15:43:32');

/*Table structure for table `_tbl_invoices_items` */

DROP TABLE IF EXISTS `_tbl_invoices_items`;

CREATE TABLE `_tbl_invoices_items` (
  `InvoiceItemID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `InvoiceID` int(11) NOT NULL,
  `item_code` varchar(250) CHARACTER SET utf8 NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `item_description` varchar(255) DEFAULT NULL,
  `invoice_item_quantity` decimal(11,0) NOT NULL,
  `invoice_item_price` decimal(10,2) NOT NULL,
  `invoice_item_final_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`InvoiceItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_invoices_items` */

/*Table structure for table `_tbl_log_mobilesms` */

DROP TABLE IF EXISTS `_tbl_log_mobilesms`;

CREATE TABLE `_tbl_log_mobilesms` (
  `SMSID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `Membercode` varchar(255) DEFAULT NULL,
  `SmsTo` varchar(255) DEFAULT NULL,
  `Message` text,
  `MessagedOn` datetime DEFAULT NULL,
  `APIResponse` text,
  `url` text,
  PRIMARY KEY (`SMSID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_log_mobilesms` */

/*Table structure for table `_tbl_log_password_charge` */

DROP TABLE IF EXISTS `_tbl_log_password_charge`;

CREATE TABLE `_tbl_log_password_charge` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` int(11) DEFAULT '0',
  `OldPassword` varchar(255) DEFAULT NULL,
  `NewPassword` varchar(255) DEFAULT NULL,
  `ChangeOn` datetime DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_log_password_charge` */

insert  into `_tbl_log_password_charge`(`LogID`,`AdminID`,`OldPassword`,`NewPassword`,`ChangeOn`) values (1,2,'123456','123456789','2020-11-25 11:07:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_logs_email` */

insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (1,30003,'Jeyaraj_123@yahoo.com','','Order Placed','\n                <div  style=\"border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;\">\n                        <div class=\"invoice-header\" style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;margin-bottom: 15px;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:0px;font-weight: bold;\">Customer Details</h5>Jeyaraj<br>Nagercoil<br>PinCode: 629001<br>Email: Jeyaraj_123@yahoo.com<br>Mobile: 9944872965\n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:0px;font-weight: bold;\">Order Details</h5>\n                                    Order Number: <br>\n                                    Dec 21, 2020 07:28<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;width: 75%;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                        <h3 class=\"title\" style=\"font-size: 20px;line-height: 1.4;margin-bottom: .5rem;font-weight: 500;color: inherit;margin-top: 0;\"><strong style=\"font-weight: 600;\">Order summary</strong></h3>\n                                    </div>\n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table>\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;\">Product Name<br>&nbsp;</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;\">Price<br> ( <i class=\"fas fa-rupee-sign\"></i> )</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;\">Quantity<br>&nbsp;</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;\">Total<br> ( <i class=\"fas fa-rupee-sign\"></i> )</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;\">Buy 1500 products items get free 4 products worth 500</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;\">1,500.00</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;\">1</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;\">1,500.00</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right\">Sub Total ( <i class=\"fas fa-rupee-sign\"></i> )</td>\n                                                        <td style=\"text-align:right\">1,500.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right\">Total Amount ( <i class=\"fas fa-rupee-sign\"></i> )</td>\n                                                        <td style=\"text-align:right\">1,500.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">INR&nbsp;</span>1,500.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2020-12-21 07:28:52',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (2,30003,'Jeyaraj_123@yahoo.com','','Order Placed','\n                <div style=\"border-radius:5px;background-color: #ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;\">\n                        <div style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:0px;font-weight: bold;\">Customer Details</h5>Jeyaraj<br>Nagercoil<br>PinCode: 629001<br>Email: Jeyaraj_123@yahoo.com<br>Mobile: 9944872965\n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:0px;font-weight: bold;\">Order Details</h5>\n                                    Order Number: <br>\n                                    Dec 21, 2020 07:37<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                        <h3 class=\"title\" style=\"font-size: 20px;line-height: 1.4;margin-bottom: .5rem;font-weight: 500;color: inherit;margin-top: 0;\"><strong style=\"font-weight: 600;\">Order summary</strong></h3>\n                                    </div>\n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table>\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px\">Product Name</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px\">Price (&#8377)</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px\">Qty</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px\">Total (&#8377)</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;padding-left:0px\">Atta  500g</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right\">30.00</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right\">1</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right\">30.00</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right\">Sub Total (&#8377)</td>\n                                                        <td style=\"text-align:right\">30.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right\">Total Amount (&#8377)</td>\n                                                        <td style=\"text-align:right\">30.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">INR&nbsp;</span>30.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2020-12-21 07:37:42',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (3,30003,'Jeyaraj_123@yahoo.com','','Order Placed','\n                <div style=\"border-radius:5px;background-color:#ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;padding:20px;\">\n                        <div style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:0px;font-weight: bold;\">Customer Details</h5>Jeyaraj<br>Madurai<br>Nagercoil<br>PinCode: 629001<br>Email: Jeyaraj_123@yahoo.com<br>Mobile: 9944872965\n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:0px;font-weight: bold;\">Order Details</h5>\n                                    Order Number: ORD00005<br>\n                                    Dec 21, 2020 07:44<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                        <h3 class=\"title\" style=\"font-size: 20px;line-height: 1.4;margin-bottom: .5rem;font-weight: 500;color: inherit;margin-top: 0;\"><strong style=\"font-weight: 600;\">Order summary</strong></h3>\n                                    </div>\n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table style=\"width:100% !important;\">\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px\">Product Name</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px\">Price (&#8377)</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px\">Qty</th>\n                                                        <th style=\"font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px\">Total (&#8377)</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;padding-left:0px\">1 Ltr Pure Chekku  Nallenai </td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right !important\">320.00</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right !important\">1</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right !important\">320.00</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"2\" style=\"text-align:right\">Sub Total (&#8377)</td>\n                                                        <td style=\"text-align:right\">320.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"2\" style=\"text-align:right\">Total Amount (&#8377)</td>\n                                                        <td style=\"text-align:right\">320.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">INR&nbsp;</span>320.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2020-12-21 07:44:04',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (4,30003,'Jeyaraj_123@yahoo.com','','Order Placed','\n                <div style=\"border-radius:5px;background-color:#ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;padding:20px;\">\n                        <div style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:0px;font-weight: bold;\">Customer Details</h5>Jeyaraj<br>Madurai<br>Nagercoil<br>PinCode: 629001<br>Email: Jeyaraj_123@yahoo.com<br>Mobile: 9944872965\n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:0px;font-weight: bold;\">Order Details</h5>\n                                    Order Number: ORD00006<br>\n                                    Dec 21, 2020 07:49<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                        <h3 class=\"title\" style=\"font-size: 20px;line-height: 1.4;margin-bottom: .5rem;font-weight: 500;color: inherit;margin-top: 0;\"><strong style=\"font-weight: 600;\">Order summary</strong></h3>\n                                    </div>\n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table style=\"width:100% !important;\">\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px;\">Product Name</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px;padding-right:0px\">Price (&#8377)</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px;padding-right:0px\">Qty</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px;padding-right:0px\">Total (&#8377)</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding:5px !important;height: 60px;vertical-align: middle !important;padding-left:0px\">Chicken pickle 250 kg </td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">150.00</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">150.00</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"4\" style=\"border-bottom: 1px solid #888;\">&nbsp;</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right\">Sub Total (&#8377)</td>\n                                                        <td style=\"text-align:right !important;;padding-right:0px\">150.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right\">Total Amount (&#8377)</td>\n                                                        <td style=\"text-align:right !important;padding-right:0px;\">150.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">INR&nbsp;</span>150.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2020-12-21 07:49:19',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (5,30003,'Jeyaraj_123@yahoo.com','','Order Placed','\n                <div style=\"border-radius:5px;background-color:#ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;padding:20px;\">\n                        <div style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Customer Details</h5>Jeyaraj<br>Madurai<br>PinCode: 629001<br>Email: Jeyaraj_123@yahoo.com<br>Mobile: 9944872965\n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Order Details</h5>\n                                    Order Number: ORD00007<br>\n                                    Dec 21, 2020 07:52<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                        <h3 class=\"title\" style=\"font-size: 20px;line-height: 1.4;margin-bottom: .5rem;font-weight: 500;color: inherit;margin-top: 0;\"><strong style=\"font-weight: 600;\">Order summary</strong></h3>\n                                    </div>\n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table style=\"width:100% !important;\">\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px !important;\">Product Name</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px;padding-right:0px\">Price (&#8377)</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px;padding-right:0px\">Qty</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px;padding-right:0px\">Total (&#8377)</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;padding-left:0px\">Maidha  Flours 500g</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">28.00</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">28.00</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"4\" style=\"border-bottom: 1px solid #888;\">&nbsp;</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Sub Total (&#8377)</td>\n                                                        <td style=\"text-align:right !important;;padding-right:0px;padding:5px;\">28.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Total Amount (&#8377)</td>\n                                                        <td style=\"text-align:right !important;padding-right:0px;padding:5px;\">28.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">INR&nbsp;</span>28.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2020-12-21 07:52:34',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (6,30002,'jesyajeshu@gmail.com','','Order Placed','\n                <div style=\"border-radius:5px;background-color:#ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;padding:20px;\">\n                        <div style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Customer Details</h5>Jeevan<br>Chennai<br>Chennai<br>PinCode: 600001<br>Email: jesyajeshu@gmail.com<br>Mobile: 9791330770\n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Order Details</h5>\n                                    Order Number: ORD00001<br>\n                                    Dec 21, 2020 08:25<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                         <img src=\"LOGO_URL\" alt=\"company logo\" style=\"height:90px;\">\n                                    </div>               \n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table style=\"width:100% !important;\" cellspacing=\"0\">\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px !important;\">Product Name</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Price (&#8377)</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Qty</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Total (&#8377)</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;padding-left:0px\">Buy 1500 products items get free 4 products worth 500</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1,500.00</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1,500.00</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"4\" style=\"border-bottom: 1px solid #888;\">&nbsp;</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Sub Total (&#8377)</td>\n                                                        <td style=\"text-align:right !important;;padding-right:0px;padding:5px;\">1,500.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Total Amount (&#8377)</td>\n                                                        <td style=\"text-align:right !important;padding-right:0px;padding:5px;\">1,500.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">&#8377;&nbsp;</span>1,500.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2020-12-21 08:25:54',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (7,0,'Jeyaraj_123@yahoo.com','','Order Placed','\n                <div style=\"border-radius:5px;background-color:#ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;padding:20px;\">\n                        <div style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Customer Details</h5>Jeevan<br>Chennai<br>Chennai<br>PinCode: 600001<br>Email: jesyajeshu@gmail.com<br>Mobile: 9791330770\n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Order Details</h5>\n                                    Order Number: ORD00001<br>\n                                    Dec 21, 2020 08:25<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                         <img src=\"LOGO_URL\" alt=\"company logo\" style=\"height:90px;\">\n                                    </div>               \n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table style=\"width:100% !important;\" cellspacing=\"0\">\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px !important;\">Product Name</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Price (&#8377)</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Qty</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Total (&#8377)</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;padding-left:0px\">Buy 1500 products items get free 4 products worth 500</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1,500.00</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1,500.00</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"4\" style=\"border-bottom: 1px solid #888;\">&nbsp;</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Sub Total (&#8377)</td>\n                                                        <td style=\"text-align:right !important;;padding-right:0px;padding:5px;\">1,500.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Total Amount (&#8377)</td>\n                                                        <td style=\"text-align:right !important;padding-right:0px;padding:5px;\">1,500.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">&#8377;&nbsp;</span>1,500.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2020-12-21 08:25:54',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (8,30002,'jesyajeshu@gmail.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 18:59:41',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (9,0,'Jeyaraj_123@yahoo.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 18:59:41',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (10,30002,'jesyajeshu@gmail.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 18:59:58',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (11,0,'Jeyaraj_123@yahoo.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 18:59:58',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (12,30002,'jesyajeshu@gmail.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:00:49',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (13,0,'Jeyaraj_123@yahoo.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:00:49',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (14,30002,'jesyajeshu@gmail.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:00:59',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (15,0,'Jeyaraj_123@yahoo.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:00:59',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (16,30002,'jesyajeshu@gmail.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:01:20',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (17,0,'Jeyaraj_123@yahoo.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:01:20',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (18,30002,'jesyajeshu@gmail.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:01:51',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (19,0,'Jeyaraj_123@yahoo.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:01:51',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (20,30002,'jesyajeshu@gmail.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:02:25',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (21,0,'Jeyaraj_123@yahoo.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:02:25',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (22,30002,'jesyajeshu@gmail.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:04:14',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (23,0,'Jeyaraj_123@yahoo.com','','Order Cancelled',' Your Order ORD00001 has been cancelled','2020-12-21 19:04:14',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (24,0,'Jeyaraj_123@yahoo.com','','Your Order (ORD00002) Confirmed and Processing ...',' \n            <div style=\"padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px\">\n                <div style=\"border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;\">\n                    <div style=\"float: left;\"> \n                        <span style=\"color:#4d4b4b;font-weight: bold;font-size: 15px;\">Order Information</span>\n                        <br>\n                        <span style=\"font-size: 12px;\">#ORD00002<br>\n                        21 Dec, 2020, 17:44</span>\n                    </div>\n                    <div style=\"float: right;text-align:right\"> \n                        <h4 style=\"margin-top:0px;font-size:30px;margin-bottom:5px\"><span style=\"font-size:12px\">INR</span>&nbsp;28.00</h4>\n                    </div>\n                </div>\n            </div>\n            <br>\n            <div style=\"padding:5px;margin-left:20px;\">\n                <h4 style=\"margin-top:0px;margin-bottom:0px\">Status</h4>\n                <div style=\"margin-left: 20px;\">Your Order (ORD00002)  confirmed<br>21 Dec, 2020, 19:55</div>\n            </div>','2020-12-21 19:55:38',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (25,30012,'','','Your Order (ORD00002) Dispatched','\n                        <div style=\"padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px\">\n                            <div style=\"border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;\">\n                                <div style=\"float: left;\"> \n                                    <span style=\"color:#4d4b4b;font-weight: bold;font-size: 15px;\">Order Information</span>\n                                    <br>\n                                    <span style=\"font-size: 12px;\">#ORD00002<br>\n                                    21 Dec, 2020, 17:44</span>\n                                </div>\n                                <div style=\"float: right;text-align:right\"> \n                                    <h4 style=\"margin-top:0px;font-size:30px;margin-bottom:5px\"><span style=\"font-size:12px\">INR</span>&nbsp;28.00</h4>\n                                    <a href=\"http://japps.online/ecommerce/vieworders.php?id=d41d8cd98f00b204e9800998ecf8427e\" style=\"padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;\">View Order</a>\n                                </div>\n                            </div>\n                        </div> <br>\n                        <div style=\"padding:5px;margin-left:20px;\">\n                            <h4 style=\"margin-top:0px;margin-bottom:0px\">Status</h4>\n                            <div style=\"margin-left: 20px;\">Your Order (ORD00002) Dispatched<br>22 Dec, 2020, 11:32</div>\n                        </div>','2020-12-22 11:32:57',0,1,'You must provide at least one recipient email address.',0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (26,0,'Jeyaraj_123@yahoo.com','','Order Placed','\n                <div style=\"border-radius:5px;background-color:#ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;padding:20px;\">\n                        <div style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Customer Details</h5><br><br>PinCode: \n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Order Details</h5>\n                                    Order Number: <br>\n                                    Jan 01, 1970 05:30<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                         <img src=\"LOGO_URL\" alt=\"company logo\" style=\"height:90px;\">\n                                    </div>               \n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table style=\"width:100% !important;\" cellspacing=\"0\">\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px !important;\">Product Name</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Price (&#8377)</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Qty</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Total (&#8377)</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td colspan=\"4\" style=\"border-bottom: 1px solid #888;\">&nbsp;</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Sub Total (&#8377)</td>\n                                                        <td style=\"text-align:right !important;;padding-right:0px;padding:5px;\">0.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Total Amount (&#8377)</td>\n                                                        <td style=\"text-align:right !important;padding-right:0px;padding:5px;\">0.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">&#8377;&nbsp;</span>0.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2020-12-22 15:40:54',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (27,0,'Jeyaraj_123@yahoo.com','','Your Order (ORD00003) Confirmed and Processing ...',' \n            <div style=\"padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px\">\n                <div style=\"border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;\">\n                    <div style=\"float: left;\"> \n                        <span style=\"color:#4d4b4b;font-weight: bold;font-size: 15px;\">Order Information</span>\n                        <br>\n                        <span style=\"font-size: 12px;\">#ORD00003<br>\n                        22 Dec, 2020, 15:40</span>\n                    </div>\n                    <div style=\"float: right;text-align:right\"> \n                        <h4 style=\"margin-top:0px;font-size:30px;margin-bottom:5px\"><span style=\"font-size:12px\">INR</span>&nbsp;3180.00</h4>\n                    </div>\n                </div>\n            </div>\n            <br>\n            <div style=\"padding:5px;margin-left:20px;\">\n                <h4 style=\"margin-top:0px;margin-bottom:0px\">Status</h4>\n                <div style=\"margin-left: 20px;\">Your Order (ORD00003)  confirmed<br>22 Dec, 2020, 15:41</div>\n            </div>','2020-12-22 15:41:51',1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (28,30013,'','','Your Order (ORD00003) Dispatched','\n                        <div style=\"padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px\">\n                            <div style=\"border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;\">\n                                <div style=\"float: left;\"> \n                                    <span style=\"color:#4d4b4b;font-weight: bold;font-size: 15px;\">Order Information</span>\n                                    <br>\n                                    <span style=\"font-size: 12px;\">#ORD00003<br>\n                                    22 Dec, 2020, 15:40</span>\n                                </div>\n                                <div style=\"float: right;text-align:right\"> \n                                    <h4 style=\"margin-top:0px;font-size:30px;margin-bottom:5px\"><span style=\"font-size:12px\">INR</span>&nbsp;3180.00</h4>\n                                    <a href=\"http://japps.online/ecommerce/vieworders.php?id=d41d8cd98f00b204e9800998ecf8427e\" style=\"padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;\">View Order</a>\n                                </div>\n                            </div>\n                        </div> <br>\n                        <div style=\"padding:5px;margin-left:20px;\">\n                            <h4 style=\"margin-top:0px;margin-bottom:0px\">Status</h4>\n                            <div style=\"margin-left: 20px;\">Your Order (ORD00003) Dispatched<br>22 Dec, 2020, 15:43</div>\n                        </div>','2020-12-22 15:43:09',0,1,'You must provide at least one recipient email address.',0,NULL);

/*Table structure for table `_tbl_logs_orderstatus_change` */

DROP TABLE IF EXISTS `_tbl_logs_orderstatus_change`;

CREATE TABLE `_tbl_logs_orderstatus_change` (
  `StatusID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) DEFAULT '0',
  `OrderCode` varchar(255) DEFAULT NULL,
  `Remarks` text,
  `Status` varchar(255) DEFAULT NULL,
  `StatusOn` datetime DEFAULT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_logs_orderstatus_change` */

/*Table structure for table `_tbl_members` */

DROP TABLE IF EXISTS `_tbl_members`;

CREATE TABLE `_tbl_members` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` varchar(255) DEFAULT NULL,
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
  PRIMARY KEY (`MemberID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_members` */

insert  into `_tbl_members`(`MemberID`,`UID`,`MemberCode`,`MemberName`,`MemberFatherName`,`MemberSurname`,`MemberMobileNumber`,`MemberPassword`,`SponsorID`,`SponsorCode`,`SponsorName`,`CreatedOn`,`IsActive`,`EmailID`,`Username`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`City`,`State`,`Country`,`PinCode`,`AadhaarNumber`,`PancardNumber`,`VoterIDNumber`,`Sex`,`DateOfBirth`,`EduDetails`,`KycVerified`,`KycVerifiedOn`,`NomineeVerified`,`NomineeVerifiedOn`,`BankAccountVerified`,`BankAccountVerifiedOn`) values (1,'LAKSHTEX','LT0001','admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,0,NULL);

/*Table structure for table `_tbl_orders` */

DROP TABLE IF EXISTS `_tbl_orders`;

CREATE TABLE `_tbl_orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderCode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CustomerID` int(11) DEFAULT '0',
  `OrderDate` datetime DEFAULT NULL,
  `CustomerName` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `CustomerEmailID` varchar(255) DEFAULT NULL,
  `CustomerMobileNumber` varchar(255) DEFAULT NULL,
  `BillingAddress1` varchar(255) DEFAULT NULL,
  `BillingAddress2` varchar(255) DEFAULT NULL,
  `BillingAddress3` varchar(255) DEFAULT NULL,
  `BillingPincode` varchar(100) DEFAULT NULL,
  `BillingLandMark` varchar(255) DEFAULT NULL,
  `OrderTotal` double(10,2) DEFAULT '0.00',
  `DiscountAmount` varchar(255) DEFAULT NULL,
  `SGST` varchar(255) DEFAULT NULL,
  `CGST` varchar(255) DEFAULT NULL,
  `IGST` varchar(255) DEFAULT NULL,
  `DeliveryCharge` varchar(255) DEFAULT NULL,
  `NetPayableAmount` varchar(255) DEFAULT NULL,
  `PaymentMode` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `OrderStatus` int(11) DEFAULT '1',
  `IsPaid` int(11) DEFAULT '0',
  `InvoiceID` int(11) DEFAULT '0',
  `TotalUplevelCommission` int(11) DEFAULT '0',
  `TotalUplevelCommissionL2` int(11) DEFAULT '0',
  `TotalUplevelCommissionL3` int(11) DEFAULT '0',
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_orders` */

insert  into `_tbl_orders`(`OrderID`,`OrderCode`,`CustomerID`,`OrderDate`,`CustomerName`,`CustomerEmailID`,`CustomerMobileNumber`,`BillingAddress1`,`BillingAddress2`,`BillingAddress3`,`BillingPincode`,`BillingLandMark`,`OrderTotal`,`DiscountAmount`,`SGST`,`CGST`,`IGST`,`DeliveryCharge`,`NetPayableAmount`,`PaymentMode`,`OrderStatus`,`IsPaid`,`InvoiceID`,`TotalUplevelCommission`,`TotalUplevelCommissionL2`,`TotalUplevelCommissionL3`) values (1,'ORD00001',30002,'2020-12-21 08:25:54','Jeevan','jesyajeshu@gmail.com','9791330770','Chennai','Chennai','','600001','',1500.00,NULL,NULL,NULL,NULL,NULL,NULL,'0',2,0,0,200,0,0);
insert  into `_tbl_orders`(`OrderID`,`OrderCode`,`CustomerID`,`OrderDate`,`CustomerName`,`CustomerEmailID`,`CustomerMobileNumber`,`BillingAddress1`,`BillingAddress2`,`BillingAddress3`,`BillingPincode`,`BillingLandMark`,`OrderTotal`,`DiscountAmount`,`SGST`,`CGST`,`IGST`,`DeliveryCharge`,`NetPayableAmount`,`PaymentMode`,`OrderStatus`,`IsPaid`,`InvoiceID`,`TotalUplevelCommission`,`TotalUplevelCommissionL2`,`TotalUplevelCommissionL3`) values (2,'ORD00002',30012,'2020-12-21 17:44:57','welcome','','9988776653','Madurai','Nagercoil','','629001','',28.00,NULL,NULL,NULL,NULL,NULL,NULL,'0',5,1,1,4,0,0);
insert  into `_tbl_orders`(`OrderID`,`OrderCode`,`CustomerID`,`OrderDate`,`CustomerName`,`CustomerEmailID`,`CustomerMobileNumber`,`BillingAddress1`,`BillingAddress2`,`BillingAddress3`,`BillingPincode`,`BillingLandMark`,`OrderTotal`,`DiscountAmount`,`SGST`,`CGST`,`IGST`,`DeliveryCharge`,`NetPayableAmount`,`PaymentMode`,`OrderStatus`,`IsPaid`,`InvoiceID`,`TotalUplevelCommission`,`TotalUplevelCommissionL2`,`TotalUplevelCommissionL3`) values (3,'ORD00003',30013,'2020-12-22 15:40:54','Mariya','','9677829677','Vadchery','Nagercoil ','Near christian colege','629001','Near church ',3180.00,NULL,NULL,NULL,NULL,NULL,NULL,'0',5,1,2,524,0,0);

/*Table structure for table `_tbl_orders_items` */

DROP TABLE IF EXISTS `_tbl_orders_items`;

CREATE TABLE `_tbl_orders_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Qty` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `EarningPoints` int(11) DEFAULT '0',
  `TotalEarningPoints` int(11) DEFAULT '0',
  `ProductCommission` int(11) DEFAULT '0',
  `TotalCommission` int(11) DEFAULT '0',
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_orders_items` */

insert  into `_tbl_orders_items`(`order_item_id`,`OrderID`,`ProductID`,`ProductName`,`Description`,`Qty`,`Price`,`Amount`,`EarningPoints`,`TotalEarningPoints`,`ProductCommission`,`TotalCommission`) values (1,1,106,'Buy 1500 products items get free 4 products worth 500',NULL,1,'1500.00','1500.00',0,0,200,200);
insert  into `_tbl_orders_items`(`order_item_id`,`OrderID`,`ProductID`,`ProductName`,`Description`,`Qty`,`Price`,`Amount`,`EarningPoints`,`TotalEarningPoints`,`ProductCommission`,`TotalCommission`) values (2,2,40,'Maidha  Flours 500g',NULL,1,'28.00','28.00',0,0,4,4);
insert  into `_tbl_orders_items`(`order_item_id`,`OrderID`,`ProductID`,`ProductName`,`Description`,`Qty`,`Price`,`Amount`,`EarningPoints`,`TotalEarningPoints`,`ProductCommission`,`TotalCommission`) values (3,3,39,'Atta  500g',NULL,1,'30.00','30.00',0,0,4,4);
insert  into `_tbl_orders_items`(`order_item_id`,`OrderID`,`ProductID`,`ProductName`,`Description`,`Qty`,`Price`,`Amount`,`EarningPoints`,`TotalEarningPoints`,`ProductCommission`,`TotalCommission`) values (4,3,107,'Buy 3000  products items get free 4 products worth 1200',NULL,1,'3000.00','3000.00',0,0,500,500);
insert  into `_tbl_orders_items`(`order_item_id`,`OrderID`,`ProductID`,`ProductName`,`Description`,`Qty`,`Price`,`Amount`,`EarningPoints`,`TotalEarningPoints`,`ProductCommission`,`TotalCommission`) values (5,3,42,'Chicken pickle 250 kg ',NULL,1,'150.00','150.00',0,0,20,20);

/*Table structure for table `_tbl_orders_status` */

DROP TABLE IF EXISTS `_tbl_orders_status`;

CREATE TABLE `_tbl_orders_status` (
  `StatusID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) DEFAULT '0',
  `OrderCode` varchar(255) DEFAULT NULL,
  `Remarks` text,
  `Status` varchar(255) DEFAULT NULL,
  `StatusOn` datetime DEFAULT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_orders_status` */

insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (1,2,'ORD00002','Placed Order then Confirmed ','Order Confirmed','2020-12-21 19:45:37');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (2,2,'ORD00002','Placed Order then Confirmed ','Order Confirmed','2020-12-21 19:48:44');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (3,2,'ORD00002','Placed Order then Confirmed ','Order Confirmed','2020-12-21 19:49:30');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (4,2,'ORD00002','Placed Order then Confirmed ','Order Confirmed','2020-12-21 19:55:38');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (5,2,'ORD00002','Processing To Dispatched ','Order Dispatched','2020-12-22 11:32:57');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (6,2,'ORD00002','Dispatched To Delivered ','Order Delivered','2020-12-22 11:34:20');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (7,3,'ORD00003','','Order Placed','2020-12-22 15:40:54');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (8,3,'ORD00003','Placed Order then Confirmed ','Order Confirmed','2020-12-22 15:41:51');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (9,3,'ORD00003','Processing To Dispatched ','Order Dispatched','2020-12-22 15:43:09');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (10,3,'ORD00003','Dispatched To Delivered ','Order Delivered','2020-12-22 15:43:32');

/*Table structure for table `_tbl_product_additional_image` */

DROP TABLE IF EXISTS `_tbl_product_additional_image`;

CREATE TABLE `_tbl_product_additional_image` (
  `ProductImageID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) DEFAULT NULL,
  `ProductImage` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ProductImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_product_additional_image` */

insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (12,54,'_16077862711607786271_img-20201212-wa1096.jpg','2020-12-12 20:47:51');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (13,54,'_16077862961607786296_img-20201212-wa1098.png','2020-12-12 20:48:16');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (15,54,'_16077863701607786370_img-20201212-wa1099.jpg','2020-12-12 20:49:30');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (16,55,'_16077894671607789467_img-20201212-wa1309.jpg','2020-12-12 21:41:07');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (17,55,'_16077894831607789482_img-20201212-wa1308.jpg','2020-12-12 21:41:23');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (18,55,'_16077895041607789504_img-20201212-wa1307.jpg','2020-12-12 21:41:44');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (19,62,'_16080010031608001003_img-20201212-wa0702.jpg','2020-12-15 08:26:43');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (20,62,'_16080010231608001023_img-20201212-wa0698.jpg','2020-12-15 08:27:03');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (21,63,'_16080015821608001582_img-20201212-wa0613.jpg','2020-12-15 08:36:22');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (22,63,'_16080015971608001597_img-20201212-wa0614.jpg','2020-12-15 08:36:37');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (23,63,'_16080016091608001609_img-20201212-wa0611.jpg','2020-12-15 08:36:49');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (24,64,'_16080022081608002208_img-20201215-wa0170.jpg','2020-12-15 08:46:48');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (25,64,'_16080022191608002219_img-20201215-wa0175.jpg','2020-12-15 08:46:59');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (26,65,'_16080043471608004347_img-20201215-wa0022.jpg','2020-12-15 09:22:27');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (27,65,'_16080043771608004377_img-20201215-wa0021.jpg','2020-12-15 09:22:57');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (28,66,'_16080048391608004839_img-20201212-wa0737.jpg','2020-12-15 09:30:39');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (29,66,'_16080048501608004850_img-20201212-wa0727.jpg','2020-12-15 09:30:50');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (30,66,'_16080048721608004872_img-20201212-wa0732.jpg','2020-12-15 09:31:12');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (31,66,'_16080048951608004895_img-20201212-wa0738.jpg','2020-12-15 09:31:35');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (32,67,'_16080052591608005259_img-20201212-wa0620.jpg','2020-12-15 09:37:39');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (33,67,'_16080052801608005280_img-20201212-wa0621.jpg','2020-12-15 09:38:00');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (34,68,'_16080056271608005627_img-20201215-wa0285.jpg','2020-12-15 09:43:47');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (35,68,'_16080056371608005637_img-20201215-wa0288.jpg','2020-12-15 09:43:57');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (36,69,'_16080064031608006403_img-20201212-wa0648.jpg','2020-12-15 09:56:43');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (37,69,'_16080064201608006420_img-20201212-wa0645.jpg','2020-12-15 09:57:00');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (38,70,'_16080070611608007061_img-20201215-wa0044.jpg','2020-12-15 10:07:41');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (39,70,'_16080070991608007099_img-20201215-wa0171.jpg','2020-12-15 10:08:19');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (40,70,'_16080071321608007132_img-20201215-wa0050.jpg','2020-12-15 10:08:52');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (41,71,'_16080079091608007909_img-20201215-wa0244.jpg','2020-12-15 10:21:49');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (42,71,'_16080079311608007931_img-20201215-wa0242.jpg','2020-12-15 10:22:11');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (43,74,'_16080090251608009025_img-20201215-wa0103.jpg','2020-12-15 10:40:25');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (44,74,'_16080090401608009040_img-20201215-wa0101.jpg','2020-12-15 10:40:40');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (45,75,'_16080094061608009406_img-20201215-wa0137.jpg','2020-12-15 10:46:46');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (46,75,'_16080094231608009423_img-20201215-wa0137.jpg','2020-12-15 10:47:03');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (47,132,'_16084757021608475702_img-20201220-wa0028.jpg','2020-12-20 20:18:22');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (48,133,'_16084758271608475827_img-20201220-wa0044.jpg','2020-12-20 20:20:27');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (50,133,'_16084758711608475871_img-20201220-wa0038.jpg','2020-12-20 20:21:11');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (51,133,'_16084758951608475895_img-20201220-wa0046.jpg','2020-12-20 20:21:35');
insert  into `_tbl_product_additional_image`(`ProductImageID`,`ProductID`,`ProductImage`,`AddedOn`) values (52,133,'_16084759211608475921_img-20201220-wa0039.jpg','2020-12-20 20:22:01');

/*Table structure for table `_tbl_products` */

DROP TABLE IF EXISTS `_tbl_products`;

CREATE TABLE `_tbl_products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductCode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CategoryID` int(11) DEFAULT '0',
  `CategoryName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `SubCategoryID` int(11) DEFAULT '0',
  `SubCategoryName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `BrandID` int(11) DEFAULT '0',
  `BrandName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `BarCode` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ProductName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ProductPrice` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `SellingPrice` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ProductImage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ShortDescription` text CHARACTER SET utf8,
  `DetailDescription` text CHARACTER SET utf8,
  `StockAvailable` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `AgeGroup` text CHARACTER SET utf8,
  `BrandSize` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Ratings` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `IsNew` int(11) DEFAULT '0',
  `IsActive` int(11) DEFAULT '1',
  `AddedOn` datetime DEFAULT NULL,
  `Commission` varchar(255) DEFAULT NULL,
  `CommissionL2` varchar(255) DEFAULT NULL,
  `CommissionL3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_products` */

insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (24,'PCT000021',13,'Bulk wholesale  Price ',27,'All item',4,'Other brand',NULL,'Noosy Adapter  10 pcs','65','30','1607435679_screenshot_2020_1208_185322.png','Noosy adapter minimum order 10 pcs ','1. 4 in 1 set, with three adapters and one SIM card needle; 2.Nano Sim Adapter For Iphone 5 5s 6 6plus 3.One nano sim card in all mobile devices 4.100% brand new 5 and Durable 6.Easily change Nano sim to Micro sim and standard Sim','Yes',NULL,NULL,NULL,0,1,'2020-12-08 19:26:59','100',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (25,'PCT000022',13,'Bulk wholesale  Price ',27,'All item',4,'Other brand',NULL,'Mobile Stand  50 pcs','99','25','1607442460_screenshot_2020_1208_185805.png','Change your perspective with a simple spin\r\nFully adjustable with 360 degree rotation for viewing your device at the right position.\r\nThis model of sucker phone holder of your choice is for household and Desktop design best choice for Home and Office','','Yes',NULL,NULL,NULL,0,1,'2020-12-08 21:19:40','100',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (26,'PCT000023',13,'Bulk wholesale  Price ',27,'All item',4,'Other brand',NULL,'Plain Ear Buds 50 Pair','50','12','1607442654_screenshot_2020_1208_185231.png','','COMFORT: soft silicone ear tips ensure an easy fit for the ears\r\nUltra soft and durable made from virgin grade silicone. Suitable for all round-type earphones\r\nSound isolating AMBIENT NOISE REDUCTION: Sound-isolating design reduces ambient noise for high-intensity listening reduces ambient noise for high-intensity listening','Yes',NULL,NULL,NULL,0,1,'2020-12-08 21:23:55','100',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (27,'PCT000024',13,'Bulk wholesale  Price ',27,'All item',4,'Other brand',NULL,'Mobile plastic stand 10 pcs','69','35','1607443008_screenshot_2020_1208_185855.png','SDO Universal Portable Foldable Holder Mobile Stand The Stand is Very Light and Easy to Carry in Pocket.','','Yes',NULL,NULL,NULL,0,1,'2020-12-08 21:28:08','50',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (28,'PCT000025',13,'Bulk wholesale  Price ',27,'All item',4,'Other brand',NULL,'5 in 1 Gamepad 5 pcs ','299','180','1607443152_screenshot_2020_1208_191240.png','','when you are useing this you can fill may get hands cramps after playing hours of battle royal games with cellphone. 5 in 1 gamepad is specially designed for mobile shooting games, it extends your phone into a traditional of PS controller, more comfortable for big hands. Phone body and controller are firmly fixed through three contact points covered of rubber pads to prevent the phone sliding, and won\'t press your on off button and volume keys, or scratch your phone after it you phone will be to smartphone.','Yes',NULL,NULL,NULL,0,1,'2020-12-08 21:34:15','30',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (29,'PCT000026',13,'Bulk wholesale  Price ',27,'All item',4,'Other brand',NULL,'Basic camera tripod  345 mm 3 pcs','799','399','1607445480_screenshot_2020_1208_190021.png','Lightweight tripod for digital cameras, pocket camera, mobile phone\r\nThree-way head, can be rotated at 360 degrees','','Yes',NULL,NULL,NULL,0,1,'2020-12-08 22:11:00','100',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (31,'PCT000028',19,'Combo Offer Appliances ',35,'All items',6,'Klx',NULL,'High Power Grinder (mixi free)','4500','4200','1607664414_img-20201211-wa0113.jpg','High power grinder  1 year warranty  with quality motors  mixi free','','Yes',NULL,NULL,NULL,0,1,'2020-12-10 20:40:29','500',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (32,'PCT000029',19,'Combo Offer Appliances ',35,'All items',6,'Klx',NULL,'Tower Fan (Free Iron Box)','3500','2950','1607613045_whatsapp image 2020-12-10 at 6.26.19 pm.jpeg','Good quality  1 year warranty  and  free iron box ','','Yes',NULL,NULL,NULL,0,1,'2020-12-10 20:41:10','350',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (33,'PCT000030',19,'Combo Offer Appliances ',35,'All items',6,'Klx',NULL,'Home Theatre 5.1 (Free 3 Hot Box)','4500','3300','1607613104_whatsapp image 2020-12-10 at 6.26.19 pm(1).jpeg','1 year warranty  good quality  with free 3 hot box  ','','Yes',NULL,NULL,NULL,0,1,'2020-12-10 20:42:02','500',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (46,'PCT000024',19,'Combo Offer Appliances ',35,'All items',4,'Other brand',NULL,'4 Burner Glass Top Stove (Free Tower Fan)','7500','6200','1607674339_img-20201211-wa0107.jpg','Good quality  and free tower fan','','Yes',NULL,NULL,NULL,0,1,'2020-12-11 13:44:17','500',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (58,'PCT000031',19,'Combo Offer Appliances ',35,'All items',20,'Green Chef',NULL,'Induxon stove ( free 3 ltr pressure cooker and Nonstick tawa)','5197','2999','1607879701_img-20201213-wa0490.jpg','Good company product 1 year warranty ','','Yes',NULL,NULL,NULL,0,1,'2020-12-13 22:47:35','300',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (59,'PCT000030',19,'Combo Offer Appliances ',35,'All items',20,'Green Chef',NULL,'Glass top stove combo','5098','2999','1607880234_img-20201213-wa0488.jpg','Glass top stove with free products 1 year warrnty ','','Yes',NULL,NULL,NULL,0,1,'2020-12-13 22:55:36','300',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (61,'PCT000030',19,'Combo Offer Appliances ',35,'All items',20,'Green Chef',NULL,'Mixer grinder combo','4697','2999','1607917278_img-20201213-wa0487.jpg','Combo offer ','','Yes',NULL,NULL,NULL,0,1,'2020-12-14 09:13:27','300',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (132,'PCT000066',2,'Furnitures',14,'Sofa Set',6,'Klx',NULL,'Sofa 3 seat ','9000','8000','1608475611_img-20201220-wa0029.jpg','Good quality sofa','','Yes',NULL,NULL,NULL,0,1,'2020-12-20 20:18:02','400',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (133,'PCT000067',2,'Furnitures',14,'Sofa Set',6,'Klx',NULL,'Sofa set 5 seat ','17000','14000','1608475736_img-20201220-wa0049.jpg','Good quality ','','Yes',NULL,NULL,NULL,0,1,'2020-12-20 20:20:04','500',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (136,'PCT000070',19,'Combo Offer Appliances ',35,'All items',4,'Other brand',NULL,'32 inch smart led Tv with Free 5.1 Home Theatre','29990','15999','1608650108_screenshot_2020_1222_204231.png','32 inch smart led Tv with Free 5.1 Home Theatre','','Yes',NULL,NULL,NULL,0,1,'2020-12-22 20:45:13','500',NULL,NULL);
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (137,'PCT000018',12,'Earning  Package ',29,'All items ',6,'Klx',NULL,'10 masala packages ','700','600','1614422343_screenshot_2021_0227_160432.png','10 masala packages  1 kg red chilli powder, 1/2 kg malli thool, 1/4 kilo manjal thool, 100g sambar powder, 100g rasam powder, 100g chicken masala, 100g peper masala, 100g fish fry masala, mutton masala, garam masala. ','','Yes',NULL,NULL,NULL,0,1,'2021-02-22 10:06:50','150','50','25');
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (138,'PCT000019',12,'Earning  Package ',29,'All items ',6,'Klx',NULL,'1.5 kg Tea powder','900','600','1614423114_screenshot_2021_0227_161847.png','1.5 kg tea powder','','Yes',NULL,NULL,NULL,0,1,'2021-02-22 11:20:01','150','50','25');
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (139,'PCT000020',12,'Earning  Package ',29,'All items ',6,'Klx',NULL,'Chekku nallenai and chekku kadalai ennai ','650','600','1614422553_screenshot_2021_0227_161115.png','1 ltr Pure chekku nallenai and 1ltr  pure chekku kadalai ennai','','Yes',NULL,NULL,NULL,0,1,'2021-02-22 11:23:12','150','50','25');
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (140,'PCT000021',12,'Earning  Package ',29,'All items ',6,'Klx',NULL,'1 kg chicken pickle','850','600','1613973208_screenshot_2021_0222_074141.png','1 kg chicken pickle','','Yes',NULL,NULL,NULL,0,1,'2021-02-22 11:24:34','150','50','25');
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (141,'PCT000022',12,'Earning  Package ',29,'All items ',6,'Klx',NULL,'1 kg fish pickle','850','600','1613973289_screenshot_2021_0222_074255.png','1 kg fish pickle','','Yes',NULL,NULL,NULL,0,1,'2021-02-22 11:25:27','150','50','25');
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (143,'PCT000024',12,'Earning  Package ',29,'All items ',6,'Klx',NULL,'Masala powder and Tea powder with free 100g  perungayathool ','1200','1000','1613975247_screenshot_2021_0222_115022.png','Masala powder and Tea powder with free 100g  ','','Yes',NULL,NULL,NULL,0,1,'2021-02-22 11:58:40','200','100','50');
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (144,'PCT000025',12,'Earning  Package ',29,'All items ',6,'Klx',NULL,'Fish and  chicken pickle & Tea powder  free with 1 kg ulunthu ','2200','1500','1613975342_screenshot_2021_0222_113341.png','Fish and  chicken pickle & Tea powder  free with 1 kg ulunthu ','','Yes',NULL,NULL,NULL,0,1,'2021-02-22 12:01:26','300','150','75');
insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (146,'PCT000024',12,'Earning  Package ',29,'All items ',6,'Klx',NULL,'Masala, pickles, tea powder free with perungayathool and ulunthu','2500','2000','1614358554_screenshot_2021_0226_222459.png','Masala, pickles, tea powder free with perungayathool and ulunthu','','Yes',NULL,NULL,NULL,0,1,'2021-02-26 22:27:12','400','200','100');

/*Table structure for table `_tbl_right_sliders` */

DROP TABLE IF EXISTS `_tbl_right_sliders`;

CREATE TABLE `_tbl_right_sliders` (
  `SliderID` int(11) NOT NULL AUTO_INCREMENT,
  `SliderImage` varchar(255) DEFAULT NULL,
  `SliderOrder` int(11) DEFAULT NULL,
  `TextOne` varchar(255) DEFAULT NULL,
  `TextTwo` varchar(255) DEFAULT NULL,
  `TextThree` varchar(255) DEFAULT NULL,
  `ButtonLink` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SliderID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_right_sliders` */

insert  into `_tbl_right_sliders`(`SliderID`,`SliderImage`,`SliderOrder`,`TextOne`,`TextTwo`,`TextThree`,`ButtonLink`,`AddedOn`) values (4,'Screenshot_2020_1223_123345.png',NULL,NULL,NULL,NULL,NULL,'2020-12-23 12:41:57');
insert  into `_tbl_right_sliders`(`SliderID`,`SliderImage`,`SliderOrder`,`TextOne`,`TextTwo`,`TextThree`,`ButtonLink`,`AddedOn`) values (5,'Screenshot_2020_1223_123848.png',NULL,NULL,NULL,NULL,NULL,'2020-12-23 12:42:49');

/*Table structure for table `_tbl_sliders` */

DROP TABLE IF EXISTS `_tbl_sliders`;

CREATE TABLE `_tbl_sliders` (
  `SliderID` int(11) NOT NULL AUTO_INCREMENT,
  `SliderImage` varchar(255) DEFAULT NULL,
  `SliderOrder` int(11) DEFAULT NULL,
  `TextOne` varchar(255) DEFAULT NULL,
  `TextTwo` varchar(255) DEFAULT NULL,
  `TextThree` varchar(255) DEFAULT NULL,
  `ButtonLink` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SliderID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sliders` */

insert  into `_tbl_sliders`(`SliderID`,`SliderImage`,`SliderOrder`,`TextOne`,`TextTwo`,`TextThree`,`ButtonLink`,`AddedOn`) values (6,'IMG-20201207-WA0224.jpg',NULL,NULL,NULL,NULL,NULL,'2020-12-07 13:19:33');
insert  into `_tbl_sliders`(`SliderID`,`SliderImage`,`SliderOrder`,`TextOne`,`TextTwo`,`TextThree`,`ButtonLink`,`AddedOn`) values (7,'IMG-20201207-WA0231.jpg',NULL,NULL,NULL,NULL,NULL,'2020-12-07 14:20:51');

/*Table structure for table `_tbl_sub_category` */

DROP TABLE IF EXISTS `_tbl_sub_category`;

CREATE TABLE `_tbl_sub_category` (
  `SubCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) DEFAULT '0',
  `CategoryName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `SubCategoryName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Description` text CHARACTER SET utf8,
  `IsActive` int(11) DEFAULT '1',
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SubCategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sub_category` */

insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (1,1,'Categories','பழங்கள்','','',1,'2020-11-29 12:34:07');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (2,1,'Categories','காய்கறிகள்','','',1,'2020-11-29 12:35:08');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (3,2,'Furnitures','Executive Chair','','',1,'2020-12-04 15:36:11');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (4,2,'Furnitures','Computer Table','','',1,'2020-12-04 15:36:24');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (5,5,'foods & beverages','Pickles ','4fe6f34c826faf30b3cf7e146d42236b.jpg','Pickles',1,'2020-12-06 14:04:55');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (6,4,'Home Appliances','Stoves','Screenshot_2020_0403_142213.png','Induxon stove ',1,'2020-12-06 14:08:28');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (7,5,'foods & beverages','Chips','Screenshot_2020_1014_214321.png','Chips',1,'2020-12-06 14:11:08');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (8,8,'Furits & Vegitables','Fruits','Dazzle-PNG-Clean-e1553556745330.png','Apple',1,'2020-12-06 14:15:38');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (9,8,'Furits & Vegitables','Vegetables ','fresh-brinjal-500x500.jpg','Brijal',1,'2020-12-06 14:16:20');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (10,5,'foods & beverages','Nuts','','Nuts',1,'2020-12-06 18:08:43');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (11,5,'foods & beverages','Tea powder','','Tea powder',1,'2020-12-06 18:11:29');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (12,12,'Cleaning Products','Dishwash Gel','','Diswash Gel',1,'2020-12-06 18:28:28');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (13,12,'Cleaning Products','Washing Powder','','Washing powder',1,'2020-12-06 18:29:15');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (14,2,'Furnitures','Sofa Set','','Sofa set',1,'2020-12-06 19:14:20');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (16,2,'Furnitures','Beuiro ','','Beuiro',1,'2020-12-06 19:15:39');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (18,2,'Furnitures','Office Chair','','Office chair',1,'2020-12-06 19:21:50');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (19,4,'Home Appliances','Grinder','','Grinder',1,'2020-12-06 19:27:04');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (24,6,'Groceries','Wheet atta','','',1,'2020-12-07 11:12:45');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (27,13,'Bulk wholesale  Price ','All item','','',1,'2020-12-08 14:32:34');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (28,14,'Free Offer','All Free Items','','All free items ',1,'2020-12-11 12:24:55');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (29,12,'Family  Pack Sale','All items ','','',1,'2020-12-11 19:51:56');
insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (35,19,'Combo Offer Appliances ','All items','','',1,'2020-12-18 17:02:52');

/*Table structure for table `_tbl_verification_code` */

DROP TABLE IF EXISTS `_tbl_verification_code`;

CREATE TABLE `_tbl_verification_code` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT '0',
  `RequestSentOn` datetime DEFAULT NULL,
  `SecurityCode` varchar(255) DEFAULT NULL,
  `messagedon` datetime DEFAULT NULL,
  `EmailTo` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_verification_code` */

/*Table structure for table `_tbl_wallet` */

DROP TABLE IF EXISTS `_tbl_wallet`;

CREATE TABLE `_tbl_wallet` (
  `WalletID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT NULL,
  `TxnDate` datetime DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `Credit` varchar(255) DEFAULT NULL,
  `Debit` varchar(255) DEFAULT NULL,
  `Balance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`WalletID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_wallet` */

insert  into `_tbl_wallet`(`WalletID`,`CustomerID`,`TxnDate`,`Particulars`,`Credit`,`Debit`,`Balance`) values (1,30003,'2020-12-22 11:34:21','Commission From ORD00002','4','0','4');
insert  into `_tbl_wallet`(`WalletID`,`CustomerID`,`TxnDate`,`Particulars`,`Credit`,`Debit`,`Balance`) values (2,30002,'2020-12-22 15:43:32','Commission From ORD00003','524','0','524');

/*Table structure for table `_tbl_whishlist` */

DROP TABLE IF EXISTS `_tbl_whishlist`;

CREATE TABLE `_tbl_whishlist` (
  `WhishListID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT '0',
  `WhislistedProductID` int(11) DEFAULT '0',
  `WhishlishOn` datetime DEFAULT NULL,
  PRIMARY KEY (`WhishListID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_whishlist` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `receipt` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
