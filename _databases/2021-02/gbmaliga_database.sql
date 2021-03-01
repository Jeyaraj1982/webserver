/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - gbmaliga_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gbmaliga_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `gbmaliga_database`;

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

insert  into `_tbl_admin`(`AdminID`,`AdminCode`,`AdminName`,`MobileNumber`,`AdminEmail`,`Password`,`Gender`,`DateofBirth`,`Address1`,`Address2`,`PostalCode`,`City`,`StateNameID`,`StateName`,`CountryNameID`,`CountryName`,`DistrictNameID`,`DistrictName`,`CreatedOn`) values (1,'AD0001','ecommerceadmin','9000000000','admin@admin.com','123456','Male','1996-3-10','aaaaaaaaaaaaa','nnnnnnnnnnnnnnnnnnnnn','6789876',NULL,1,'Tamil Nadu',1,'India',15,'Perambalur',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_brands` */

insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (1,'BRND00001','Aachi',1,'2021-02-26 13:27:38');
insert  into `_tbl_brands`(`BrandID`,`BrandCode`,`BrandName`,`IsActive`,`AddedOn`) values (2,'BRND00002','GMJAI food products',1,'2021-02-26 21:21:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_category` */

insert  into `_tbl_category`(`CategoryID`,`CategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`,`ListOrder`) values (1,'Grocery','','grocery',1,'2021-02-26 13:25:26',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_customer` */

insert  into `_tbl_customer`(`CustomerID`,`CustomerCode`,`CustomerName`,`EmailID`,`MobileNumber`,`Password`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`PostalCode`,`LandMark`,`IsActive`,`CreatedOn`,`Referral`,`CreatedBy`,`ManualCreate`) values (1,'CSTMR00001','Jeyaraj','','9944872965','123456',NULL,NULL,NULL,NULL,NULL,1,'2021-02-26 18:08:10','a',0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_invoices` */

insert  into `_tbl_invoices`(`InvoiceID`,`InvoiceCode`,`OrderCode`,`OrderID`,`OrderDate`,`CustomerID`,`CustomerName`,`CustomerEmailID`,`CustomerMobileNumber`,`BillingAddress1`,`BillingAddress2`,`BillingAddress3`,`BillingPincode`,`BillingLandMark`,`InvoiceTotal`,`PaymentMode`,`InvoiceStatus`,`InvoiceDate`) values (1,NULL,'ORD00001',1,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,'0',1,'2021-02-26 18:20:57');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_log_password_charge` */

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_logs_email` */

insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (1,0,'Jeyaraj_123@yahoo.com','','Order Placed','\n                <div style=\"border-radius:5px;background-color:#ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;border:1px solid #666;margin-left:20px;margin-right:20px;padding:20px;\">\n                        <div style=\"display: flex;flex-direction: row;justify-content: space-between;align-items: center;\">\n                            <h3  style=\"font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;\">\n                                Order\n                            </h3>\n                        </div>\n                        <div style=\"margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;\">\n                            <div   style=\"padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Customer Details</h5>Jeyaraj<br>Chennai<br>Chennai<br>PinCode: 629001<br>Land MarkBridge Left<br>Mobile: 9944872965\n                                </div>\n                                <div  style=\"padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;\">\n                                    <h5 style=\"margin-bottom:3px;font-weight: bold;font-size:16px\">Order Details</h5>\n                                    Order Number: ORD00001<br>\n                                    Feb 26, 2021 18:08<br>\n                                    <span style=\"font-weight: bold;color:red\">Order Placed</span>\n                                </div>\n                            </div>\n                        </div>\n                        <div style=\"padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;\">\n                        <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;\"></div>\n                        <div style=\"display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;\">\n                            <div style=\"flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;\">\n                                <div style=\"width: 100%;display: block;\">\n                                    <div>\n                                         <img src=\"LOGO_URL\" alt=\"company logo\" style=\"height:90px;\">\n                                    </div>               \n                                    <div>\n                                        <div style=\"width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;\">\n                                            <table style=\"width:100% !important;\" cellspacing=\"0\">\n                                                <thead>\n                                                    <tr>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;padding-left:0px !important;\">Product Name</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Price (&#8377)</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Qty</th>\n                                                        <th style=\"font-weight: 600;border-top: 1px solid #888; !important;border-bottom: 1px solid #888; !important;font-size: 14px;padding: 5px !important;height: 60px;vertical-align: middle !important;text-align: right !important;padding-left:0px;padding-right:0px\">Total (&#8377)</th>\n                                                    </tr>\n                                                </thead>\n                                                <tbody>\n                                                    <tr>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;padding-left:0px\">Chilli Powder</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">43.00</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">1</td>\n                                                        <td style=\"border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;padding:5px !important;height: 60px;vertical-align: middle !important;text-align:right !important;padding-right:0px\">43.00</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"4\" style=\"border-bottom: 1px solid #888;\">&nbsp;</td>\n                                                    </tr>\n                                                    <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Sub Total (&#8377)</td>\n                                                        <td style=\"text-align:right !important;;padding-right:0px;padding:5px;\">0.00</td> \n                                                    </tr>\n                                                     <tr>\n                                                        <td colspan=\"3\" style=\"text-align:right;padding:5px;\">Total Amount (&#8377)</td>\n                                                        <td style=\"text-align:right !important;padding-right:0px;padding:5px;\">0.00</td> \n                                                    </tr>\n                                                </tbody>\n                                            </table>\n                                        </div>\n                                    </div>\n                                </div>    \n                                <div style=\"border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;\"></div>\n                            </div>    \n                        </div>\n                    </div>\n                        <div style=\"padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);\">\n                            <div  style=\"display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;\">\n                                <div  style=\"margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    \n                                </div>\n                                <div  style=\"text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;\">\n                                    <h5  style=\"font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;\">Total Amount</h5>\n                                    <div  style=\"font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;\"><span style=\"font-size: 14px;\">&#8377;&nbsp;</span>0.00</div>\n                                </div>\n                            </div>\n                        </div>\n                    </div>','2021-02-26 18:08:28',0,1,'SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting',0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (2,0,'Jeyaraj_123@yahoo.com','','Your Order (ORD00001) Confirmed and Processing ...',' \n            <div style=\"padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px\">\n                <div style=\"border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;\">\n                    <div style=\"float: left;\"> \n                        <span style=\"color:#4d4b4b;font-weight: bold;font-size: 15px;\">Order Information</span>\n                        <br>\n                        <span style=\"font-size: 12px;\">#ORD00001<br>\n                        26 Feb, 2021, 18:08</span>\n                    </div>\n                    <div style=\"float: right;text-align:right\"> \n                        <h4 style=\"margin-top:0px;font-size:30px;margin-bottom:5px\"><span style=\"font-size:12px\">INR</span>&nbsp;43.00</h4>\n                    </div>\n                </div>\n            </div>\n            <br>\n            <div style=\"padding:5px;margin-left:20px;\">\n                <h4 style=\"margin-top:0px;margin-bottom:0px\">Status</h4>\n                <div style=\"margin-left: 20px;\">Your Order (ORD00001)  confirmed<br>26 Feb, 2021, 18:20</div>\n            </div>','2021-02-26 18:20:32',0,1,'SMTP connect() failed. https://github.com/PHPMailer/PHPMailer/wiki/Troubleshooting',0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`CustomerID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (3,1,'','','Your Order (ORD00001) Dispatched','\n                        <div style=\"padding:5px;background:#e5e5e5;margin:20px;border-radius:10px;margin-bottom:0px\">\n                            <div style=\"border:0px solid black;text-align:left;padding:20px;background:white;border-radius:10px;min-height:60px;\">\n                                <div style=\"float: left;\"> \n                                    <span style=\"color:#4d4b4b;font-weight: bold;font-size: 15px;\">Order Information</span>\n                                    <br>\n                                    <span style=\"font-size: 12px;\">#ORD00001<br>\n                                    26 Feb, 2021, 18:08</span>\n                                </div>\n                                <div style=\"float: right;text-align:right\"> \n                                    <h4 style=\"margin-top:0px;font-size:30px;margin-bottom:5px\"><span style=\"font-size:12px\">INR</span>&nbsp;43.00</h4>\n                                    <a href=\"http://japps.online/ecommerce/vieworders.php?id=d41d8cd98f00b204e9800998ecf8427e\" style=\"padding:5px 10px 5px 10px;background:#5656e8;color:white;border:1px solid #5656e8;border-radius:5px;text-decoration: none;\">View Order</a>\n                                </div>\n                            </div>\n                        </div> <br>\n                        <div style=\"padding:5px;margin-left:20px;\">\n                            <h4 style=\"margin-top:0px;margin-bottom:0px\">Status</h4>\n                            <div style=\"margin-left: 20px;\">Your Order (ORD00001) Dispatched<br>26 Feb, 2021, 18:20</div>\n                        </div>','2021-02-26 18:20:47',0,1,'You must provide at least one recipient email address.',0,NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_members` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_orders` */

insert  into `_tbl_orders`(`OrderID`,`OrderCode`,`CustomerID`,`OrderDate`,`CustomerName`,`CustomerEmailID`,`CustomerMobileNumber`,`BillingAddress1`,`BillingAddress2`,`BillingAddress3`,`BillingPincode`,`BillingLandMark`,`OrderTotal`,`DiscountAmount`,`SGST`,`CGST`,`IGST`,`DeliveryCharge`,`NetPayableAmount`,`PaymentMode`,`OrderStatus`,`IsPaid`,`InvoiceID`,`TotalUplevelCommission`,`TotalUplevelCommissionL2`,`TotalUplevelCommissionL3`) values (1,'ORD00001',1,'2021-02-26 18:08:28','Jeyaraj','','9944872965','Chennai','Chennai','','629001','Bridge Left',43.00,NULL,NULL,NULL,NULL,NULL,NULL,'0',5,1,1,0,0,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_orders_items` */

insert  into `_tbl_orders_items`(`order_item_id`,`OrderID`,`ProductID`,`ProductName`,`Description`,`Qty`,`Price`,`Amount`,`EarningPoints`,`TotalEarningPoints`,`ProductCommission`,`TotalCommission`) values (1,1,1,'Chilli Powder',NULL,1,'43.00','43.00',0,0,0,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_orders_status` */

insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (1,1,'ORD00001','','Order Placed','2021-02-26 18:08:28');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (2,1,'ORD00001','Placed Order then Confirmed ','Order Confirmed','2021-02-26 18:20:32');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (3,1,'ORD00001','Processing To Dispatched ','Order Dispatched','2021-02-26 18:20:47');
insert  into `_tbl_orders_status`(`StatusID`,`OrderID`,`OrderCode`,`Remarks`,`Status`,`StatusOn`) values (4,1,'ORD00001','Dispatched To Delivered ','Order Delivered','2021-02-26 18:20:57');

/*Table structure for table `_tbl_product_additional_image` */

DROP TABLE IF EXISTS `_tbl_product_additional_image`;

CREATE TABLE `_tbl_product_additional_image` (
  `ProductImageID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) DEFAULT NULL,
  `ProductImage` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`ProductImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_product_additional_image` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_products` */

insert  into `_tbl_products`(`ProductID`,`ProductCode`,`CategoryID`,`CategoryName`,`SubCategoryID`,`SubCategoryName`,`BrandID`,`BrandName`,`BarCode`,`ProductName`,`ProductPrice`,`SellingPrice`,`ProductImage`,`ShortDescription`,`DetailDescription`,`StockAvailable`,`AgeGroup`,`BrandSize`,`Ratings`,`IsNew`,`IsActive`,`AddedOn`,`Commission`,`CommissionL2`,`CommissionL3`) values (1,'PCT00001',1,'Grocery',1,'Spices',1,'Aachi',NULL,'Chilli Powder','43','43','1614326369_vj3awkullieebrir83wl7722n73figerujrlgiiw.jpeg','Aachi Chilli Powder is a blend of ground, dried fruit of red and other spices. It is used to add spice to dishes. ','Aachi Chilli Powder is a blend of ground, dried fruit of red and other spices. It is used to add spice to dishes. ','Yes',NULL,NULL,NULL,0,1,'2021-02-26 13:29:34','0','0','0');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_right_sliders` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sliders` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_sub_category` */

insert  into `_tbl_sub_category`(`SubCategoryID`,`CategoryID`,`CategoryName`,`SubCategoryName`,`Image`,`Description`,`IsActive`,`AddedOn`) values (1,1,'Grocery','Spices','','',1,'2021-02-26 13:26:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_wallet` */

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
