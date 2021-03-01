/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - digitalm_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`digitalm_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `digitalm_database`;

/*Table structure for table `_counter` */

DROP TABLE IF EXISTS `_counter`;

CREATE TABLE `_counter` (
  `dayid` int(11) NOT NULL AUTO_INCREMENT,
  `web_date` date DEFAULT NULL,
  `count_1` int(11) DEFAULT NULL,
  `count_2` int(11) DEFAULT NULL,
  `count_3` int(11) DEFAULT NULL,
  `count_4` int(11) DEFAULT NULL,
  PRIMARY KEY (`dayid`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

/*Data for the table `_counter` */

insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (1,'2020-10-04',2520,6720,7250,155);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (2,'2020-10-05',2526,6725,7260,155);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (4,'2020-10-06',2540,6732,7270,156);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (5,'2020-10-07',2551,6736,7273,157);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (6,'2020-10-08',2564,6740,7283,157);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (7,'2020-10-09',2569,6749,7293,157);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (8,'2020-10-10',2582,6750,7295,159);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (9,'2020-10-11',2590,6754,7297,159);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (10,'2020-10-12',2599,6757,7306,160);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (11,'2020-10-13',2606,6767,7313,162);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (12,'2020-10-14',2617,6776,7314,162);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (13,'2020-10-15',2626,6777,7323,162);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (14,'2020-10-16',2631,6784,7329,164);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (15,'2020-10-17',2640,6789,7333,166);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (16,'2020-10-18',2654,6795,7337,167);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (17,'2020-10-19',2659,6799,7339,169);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (18,'2020-10-20',2672,6803,7340,170);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (19,'2020-10-21',2677,6805,7347,172);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (20,'2020-10-22',2685,6812,7350,173);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (21,'2020-10-23',2699,6819,7356,173);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (22,'2020-10-24',2713,6824,7359,174);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (23,'2020-10-25',2718,6831,7362,174);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (24,'2020-10-26',2730,6841,7365,174);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (25,'2020-10-27',2741,6848,7375,174);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (26,'2020-10-28',2754,6852,7378,176);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (27,'2020-10-29',2764,6853,7379,177);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (28,'2020-11-04',2776,6860,7382,179);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (29,'2020-11-05',2788,6864,7384,181);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (30,'2020-11-06',2800,6867,7391,182);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (31,'2020-11-08',2805,6875,7397,182);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (32,'2020-11-09',2820,6883,7400,183);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (33,'2020-11-10',2834,6888,7408,185);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (34,'2020-11-11',2846,6889,7409,186);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (35,'2020-11-12',2859,6892,7410,187);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (36,'2020-11-15',2869,6900,7412,189);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (37,'2020-11-16',2876,6908,7413,189);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (38,'2020-11-19',2885,6912,7423,189);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (39,'2020-11-20',2891,6919,7426,189);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (40,'2020-11-21',2896,6925,7432,190);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (41,'2020-11-23',2902,6935,7441,191);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (42,'2020-11-24',2913,6943,7451,191);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (43,'2020-11-25',2926,6953,7452,192);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (44,'2020-11-26',2932,6959,7457,192);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (45,'2020-11-27',2943,6963,7458,193);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (46,'2020-12-06',2951,6967,7463,194);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (47,'2020-12-08',2964,6971,7466,195);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (48,'2020-12-09',2971,6972,7468,195);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (49,'2020-12-10',2979,6981,7471,195);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (50,'2020-12-13',2991,6985,7481,195);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (51,'2020-12-15',3000,6994,7489,196);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (52,'2020-12-16',3011,7003,7491,197);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (53,'2020-12-17',3022,7005,7500,197);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (54,'2020-12-19',3031,7013,7510,198);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (55,'2020-12-20',3043,7021,7512,200);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (56,'2020-12-23',3057,7024,7520,202);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (57,'2020-12-24',3069,7025,7525,203);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (58,'2020-12-25',3084,7035,7532,204);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (59,'2020-12-26',3097,7044,7538,204);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (60,'2020-12-27',3102,7045,7539,206);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (61,'2020-12-28',3117,7049,7542,208);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (62,'2020-12-31',3129,7059,7551,210);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (63,'2021-01-01',3137,7065,7557,211);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (64,'2021-01-03',3148,7070,7559,213);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (65,'2021-01-04',3160,7079,7560,214);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (66,'2021-01-05',3175,7089,7567,216);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (67,'2021-01-06',3185,7098,7570,216);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (68,'2021-01-07',3195,7104,7578,217);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (69,'2021-01-08',3209,7114,7583,218);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (70,'2021-01-09',3216,7122,7587,218);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (71,'2021-01-10',3231,7123,7589,219);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (72,'2021-01-11',3239,7124,7590,220);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (73,'2021-01-12',3250,7128,7598,221);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (74,'2021-01-13',3263,7131,7600,221);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (75,'2021-01-14',3278,7136,7601,221);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (76,'2021-01-15',3292,7141,7609,221);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (77,'2021-01-16',3303,7142,7614,222);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (78,'2021-01-17',3310,7149,7616,223);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (79,'2021-01-18',3317,7157,7617,225);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (80,'2021-01-19',3327,7163,7622,226);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (81,'2021-01-22',3339,7171,7627,226);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (82,'2021-01-23',3353,7175,7635,226);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (83,'2021-01-25',3366,7180,7642,227);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (84,'2021-01-26',3376,7182,7652,227);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (85,'2021-01-28',3388,7188,7660,229);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (86,'2021-01-29',3399,7198,7665,230);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (87,'2021-01-30',3405,7203,7672,231);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (88,'2021-01-31',3413,7209,7680,231);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (89,'2021-02-01',3422,7211,7684,232);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (90,'2021-02-02',3429,7219,7690,233);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (91,'2021-02-03',3442,7227,7693,235);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (92,'2021-02-06',3452,7233,7695,237);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (93,'2021-02-07',3464,7241,7705,237);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (94,'2021-02-10',3470,7242,7713,238);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (95,'2021-02-11',3479,7250,7723,238);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (96,'2021-02-12',3491,7253,7729,238);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (97,'2021-02-14',3503,7259,7733,240);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (98,'2021-02-15',3512,7264,7739,242);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (99,'2021-02-16',3519,7270,7744,242);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (100,'2021-02-17',3530,7279,7745,242);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (101,'2021-02-18',3537,7284,7748,244);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (102,'2021-02-19',3547,7288,7757,245);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (103,'2021-02-20',3559,7296,7764,245);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (104,'2021-02-21',3564,7298,7768,245);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (105,'2021-02-22',3573,7299,7776,246);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (106,'2021-02-23',3581,7306,7786,248);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (107,'2021-02-24',3592,7308,7790,248);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (108,'2021-02-25',3601,7312,7792,249);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (109,'2021-02-26',3606,7320,7798,250);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (110,'2021-02-27',3612,7327,7805,251);
insert  into `_counter`(`dayid`,`web_date`,`count_1`,`count_2`,`count_3`,`count_4`) values (111,'2021-02-28',3624,7337,7812,251);

/*Table structure for table `_tbl_Contacts` */

DROP TABLE IF EXISTS `_tbl_Contacts`;

CREATE TABLE `_tbl_Contacts` (
  `ContactID` int(11) NOT NULL AUTO_INCREMENT,
  `ReferneceName` varchar(255) DEFAULT NULL,
  `ContactImage` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ContactID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_Contacts` */

insert  into `_tbl_Contacts`(`ContactID`,`ReferneceName`,`ContactImage`,`CreatedOn`,`IsDelete`) values (1,'eeee','project4.jpeg','2020-10-19 12:03:52',1);
insert  into `_tbl_Contacts`(`ContactID`,`ReferneceName`,`ContactImage`,`CreatedOn`,`IsDelete`) values (2,'Sample','sample.jpeg','2020-10-19 12:09:27',1);
insert  into `_tbl_Contacts`(`ContactID`,`ReferneceName`,`ContactImage`,`CreatedOn`,`IsDelete`) values (3,'chennai','sample.jpeg','2020-10-19 15:48:09',1);
insert  into `_tbl_Contacts`(`ContactID`,`ReferneceName`,`ContactImage`,`CreatedOn`,`IsDelete`) values (4,'Maheswari ','Screenshot_2020_1019_113255.png','2020-10-19 15:51:24',0);

/*Table structure for table `_tbl_card_general_info` */

DROP TABLE IF EXISTS `_tbl_card_general_info`;

CREATE TABLE `_tbl_card_general_info` (
  `ResumeID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `WhatsappNumber` varchar(255) DEFAULT NULL,
  `LandlineNumber` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `WebsiteName` varchar(255) DEFAULT NULL,
  `Proffession` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) DEFAULT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `AddressLine3` varchar(255) DEFAULT NULL,
  `ProfilePhoto` varchar(255) DEFAULT NULL,
  `CreatedOn` varchar(255) DEFAULT NULL,
  `Profession` varchar(255) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `CreatedByID` int(11) DEFAULT '0',
  `Url` varchar(255) DEFAULT NULL,
  `Twitter` varchar(255) DEFAULT NULL,
  `FaceBook` varchar(255) DEFAULT NULL,
  `Instagram` varchar(255) DEFAULT NULL,
  `LinkedIn` varchar(255) DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ResumeID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_card_general_info` */

insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (1,'Demo','9333333333','9333333333',NULL,'demo@gmail.com',NULL,'Data Entry','ngl','kk','tn','images.jpg','2020-09-24 10:06:23',NULL,'testwebsite','Franchisee',1,'Demo-1','twit','fb',NULL,NULL,0);
insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (2,'MARTIN','+919000000000','+919000000000','+91-44-000000','Martin@digitalmaking.in','digitalmaking.in','Business Development Executive','Unit 29 Abbey Road Ind Est.','NW10 7XF London','','profile_11 SDN_01553 copy.jpg','2020-09-24 10:13:12',NULL,'digitalmaking.in','Franchisee',1,'Martin-2','digitalmaking','digitalmaking','digitalmaking','digitalmaking',0);
insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (3,'Kegin Dict','+94766841113','+94766841113','04651345768','richmenkegin@gmail.com',NULL,'Teacher ','Jafna ','Srilanka ','','Screenshot_2020_0924_121505.png','2020-09-24 12:20:09',NULL,'','Franchisee',1,'Kegin-Dict-3','','https://www.facebook.com/kegin.dict.35','','',0);
insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (4,'Kegin Dict','+94766841113','+94766841113','04651345768','richmenkegin@gmail.com',NULL,'Teacher ','Jafna ','Srilanka ','','Screenshot_2020_0924_121505.png','2020-09-24 12:20:10',NULL,'','Franchisee',1,'Kegin-Dict-4','','https://www.facebook.com/kegin.dict.35','','',0);
insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (5,'Kegin Dict','+94767841113','+94 76 684 1113','','richmenkegin@gmail.com',NULL,'Teacher ','Arasady','Kokuvil west,  jaffna ','Srilanka ','Screenshot_2020_0924_122637.png','2020-09-24 12:39:25',NULL,'www.thrasanakademy.com','Franchisee',1,'Kegin-Dict-5','','','','',0);
insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (6,'asdasd','98789789789','8979789','','hfhfgh@gmail.com',NULL,'asdasd','fsdfsdf','','','index.jpg','2020-09-24 12:42:07',NULL,'','Franchisee',1,'asdasd-6','','','','',0);
insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (7,'Vijay','9380507658','9380507658','','Vijay34@gmil.com',NULL,'Software engineer ','Arcod road','Vadapalani ','Chennai ','Screenshot_2020_0506_203036.png','2020-09-24 22:01:03',NULL,'','Franchisee',1,'Vijay-7','','','','',0);
insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (8,'Sathiya priya','6380363530','6380363530','','sathiya040201@gmail.com',NULL,'B A English ','Kamarajapuram','Ponnagar','Trichy ','IMG-20200925-WA0062.jpg','2020-09-25 21:17:02',NULL,'','Franchisee',1,'Sathiya-priya-8','','','','',0);
insert  into `_tbl_card_general_info`(`ResumeID`,`ResumeName`,`MobileNumber`,`WhatsappNumber`,`LandlineNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`Twitter`,`FaceBook`,`Instagram`,`LinkedIn`,`IsDelete`) values (9,'SHANMUGAVEL.P','8870976294','8870976294','','sathishciv.119@gmail.com',NULL,'Civil Engineer ','No16,kamarajar street,madakulam main road, palanganatham','','','20200614_174102.jpg','2021-01-30 18:16:04',NULL,'','Franchisee',20,'SHANMUGAVEL.P-9','','','','',0);

/*Table structure for table `_tbl_franchisee` */

DROP TABLE IF EXISTS `_tbl_franchisee`;

CREATE TABLE `_tbl_franchisee` (
  `FranchiseeID` int(11) NOT NULL AUTO_INCREMENT,
  `FranchiseeName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`FranchiseeID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_franchisee` */

insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (1,'AdminFranchisee','9111111111','123456',1,'2020-09-23 15:36:03');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (2,'Noorjahan','9677451578','8938',1,'2020-09-24 18:26:08');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (3,'Jeevan','9791330770','98765',1,'2020-09-24 18:28:02');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (4,'Nazeema  begam','9361528639','Number',1,'2020-09-24 19:43:50');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (5,'Kurom','7094500891','7094500891',0,'2020-09-24 21:47:12');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (6,'Ammu','9790147108','9790147108',0,'2020-09-24 21:49:55');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (7,'Sridar','8883336980','8883336980',0,'2020-09-24 21:51:13');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (8,'Raji','admin@digitalmaking.in','123456',1,'2020-09-25 11:22:09');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (9,'Sathiya priya','6380363530','6380363530',1,'2020-09-25 18:21:16');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (10,'Mary','9965891683','9965891683',1,'2020-09-25 18:23:48');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (11,'Senpagavalli','8946090251','8946090251',1,'2020-09-26 15:02:23');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (12,'Senbagavali','9786953579','9786953579',1,'2020-09-27 17:12:28');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (13,'Keerthana','9789377375','9789377375',1,'2020-09-27 17:18:01');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (14,'Sakthivel','6381395832','6381395832',1,'2020-09-28 09:32:02');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (15,'Assu','6380104848','6380104848',1,'2020-10-13 14:21:31');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (16,'Mugunthan','8608795036','8608795036',1,'2020-10-13 18:22:52');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (17,'Maheswari ','9344261437','9344261437',1,'2020-10-15 08:56:32');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (18,'Prema','9976843179','9976843179',1,'2020-10-15 08:59:04');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (19,'Arifa banu','8098173154','8098173154',1,'2020-10-15 17:44:55');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (20,'Sathiskumar','8012920578','8012920578',1,'2020-10-18 10:19:29');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (21,'Priya','9677349652','9677349652',1,'2020-10-19 16:33:46');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (22,'Sheik abdualla ','8508340078','8508340078',1,'2020-10-19 19:29:48');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (23,'Abdul hakeem ','8870104070','Log00fraud!',1,'2020-10-20 14:28:32');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (24,'Suji','8668046650','8668046650',1,'2020-10-27 20:38:49');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (25,'Praveena','8056397092','8056397092',1,'2020-11-06 12:41:19');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (26,'Jenifer','8220410533','Vishva&Sakas',1,'2020-11-10 20:34:49');
insert  into `_tbl_franchisee`(`FranchiseeID`,`FranchiseeName`,`MobileNumber`,`Password`,`IsActive`,`CreatedOn`) values (27,'Revathi','9123588832','9123588832',1,'2020-11-19 12:30:07');

/*Table structure for table `_tbl_franchisee_credits` */

DROP TABLE IF EXISTS `_tbl_franchisee_credits`;

CREATE TABLE `_tbl_franchisee_credits` (
  `CreditsID` int(11) NOT NULL AUTO_INCREMENT,
  `FranchiseeID` int(11) DEFAULT '0',
  `Particulars` varchar(255) DEFAULT NULL,
  `Credits` varchar(255) DEFAULT '0',
  `Debits` varchar(255) DEFAULT '0',
  `Balance` varchar(255) DEFAULT '0',
  `ProfileID` int(11) DEFAULT '0',
  `RequestOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CreditsID`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_franchisee_credits` */

insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (1,1,'Add Credits From Admin','100','0','100',0,'2020-09-23 15:45:37');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (2,1,'Resume Creation','0','1','99',1,'2020-09-23 16:04:10');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (5,1,'Resume Creation / 4','0','1','98',4,'2020-09-23 18:12:13');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (6,1,'Card Creation / 1','0','1','97',1,'2020-09-24 09:51:49');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (7,1,'Card Creation / 1','0','1','96',1,'2020-09-24 10:06:23');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (8,1,'Card Creation / 2','0','1','95',2,'2020-09-24 10:13:12');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (9,1,'Card Creation / 3','0','1','94',3,'2020-09-24 12:20:09');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (10,1,'Card Creation / 4','0','1','93',4,'2020-09-24 12:20:10');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (11,1,'Card Creation / 5','0','1','92',5,'2020-09-24 12:39:25');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (12,1,'Card Creation / 6','0','1','91',6,'2020-09-24 12:42:07');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (13,1,'Resume Creation / 5','0','1','90',5,'2020-09-24 13:01:11');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (14,1,'Resume Creation / 6','0','1','89',6,'2020-09-24 14:02:04');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (15,1,'Resume Creation / 7','0','1','88',7,'2020-09-24 14:22:07');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (16,2,'Add Credits From Admin','1','0','1',0,'2020-09-24 18:29:05');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (17,4,'Add Credits From Admin','1','0','1',0,'2020-09-24 19:44:45');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (18,1,'Card Creation / 7','0','1','87',7,'2020-09-24 22:01:03');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (19,1,'Resume Creation / 8','0','1','86',8,'2020-09-25 11:31:00');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (20,1,'Resume Creation / 9','0','1','85',9,'2020-09-25 11:47:30');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (21,1,'Resume Creation / 10','0','1','84',10,'2020-09-25 12:16:14');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (22,9,'Add Credits From Admin','1','0','1',0,'2020-09-25 18:21:39');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (23,10,'Add Credits From Admin','1','0','1',0,'2020-09-25 18:24:02');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (24,1,'Card Creation / 8','0','1','83',8,'2020-09-25 21:17:02');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (25,11,'Add Credits From Admin','1','0','1',0,'2020-09-26 15:02:39');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (26,9,'Resume Creation / 11','0','1','0',11,'2020-09-26 15:41:24');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (27,9,'Add Credits From Admin','2','0','2',0,'2020-09-26 20:49:50');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (28,9,'Resume Creation / 12','0','1','1',12,'2020-09-26 21:08:22');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (29,1,'Resume Creation / 13','0','1','82',13,'2020-09-27 08:14:59');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (30,1,'Resume Creation / 14','0','1','81',14,'2020-09-27 09:32:17');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (31,12,'Add Credits From Admin','1','0','1',0,'2020-09-27 17:12:44');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (32,13,'Add Credits From Admin','1','0','1',0,'2020-09-27 17:18:12');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (33,13,'Resume Creation / 15','0','1','0',15,'2020-09-27 17:24:30');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (34,12,'Resume Creation / 16','0','1','0',16,'2020-09-27 21:09:56');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (35,11,'Resume Creation / 17','0','1','0',17,'2020-09-27 23:17:49');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (36,14,'Add Credits From Admin','2','0','2',0,'2020-09-28 09:32:19');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (37,14,'Resume Creation / 18','0','1','1',18,'2020-09-28 09:50:28');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (38,14,'Resume Creation / 19','0','1','0',19,'2020-09-28 11:12:03');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (39,13,'Add Credits From Admin','1','0','1',0,'2020-09-28 14:08:58');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (40,14,'Add Credits From Admin','1','0','1',0,'2020-09-28 14:09:23');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (41,9,'Add Credits From Admin','1','0','2',0,'2020-09-28 14:10:05');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (42,13,'Resume Creation / 20','0','1','0',20,'2020-09-28 14:29:28');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (43,13,'Add Credits From Admin','1','0','1',0,'2020-09-28 19:14:29');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (44,14,'Resume Creation / 21','0','1','0',21,'2020-09-29 18:14:17');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (45,16,'Add Credits From Admin','3','0','3',0,'2020-10-13 18:23:07');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (46,16,'Resume Creation / 22','0','1','2',22,'2020-10-14 10:21:18');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (47,16,'Resume Creation / 23','0','1','1',23,'2020-10-14 10:21:18');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (48,16,'Resume Creation / 24','0','1','0',24,'2020-10-14 21:59:44');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (49,18,'Add Credits From Admin','3','0','3',0,'2020-10-15 08:59:22');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (50,19,'Add Credits From Admin','10','0','10',0,'2020-10-15 17:45:09');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (51,19,'Resume Creation / 25','0','1','9',25,'2020-10-15 18:07:02');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (52,16,'Add Credits From Admin','2','0','2',0,'2020-10-15 19:34:49');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (53,16,'Resume Creation / 26','0','1','1',26,'2020-10-16 13:03:11');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (54,19,'Resume Creation / 27','0','1','8',27,'2020-10-16 14:16:55');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (55,17,'Add Credits From Admin','10','0','10',0,'2020-10-16 15:35:39');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (56,16,'Resume Creation / 28','0','1','0',28,'2020-10-16 17:17:52');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (57,17,'Resume Creation / 29','0','1','9',29,'2020-10-17 11:07:53');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (58,20,'Add Credits From Admin','10','0','10',0,'2020-10-18 10:19:44');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (59,20,'Resume Creation / 30','0','1','9',30,'2020-10-18 11:06:05');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (60,17,'Add Credits From Admin','1000','0','1009',0,'2020-10-18 16:12:50');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (61,20,'Resume Creation / 31','0','1','8',31,'2020-10-19 15:39:52');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (62,21,'Add Credits From Admin','6','0','6',0,'2020-10-19 16:34:25');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (63,21,'Resume Creation / 32','0','1','5',32,'2020-10-19 18:06:34');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (64,22,'Add Credits From Admin','10','0','10',0,'2020-10-19 19:40:49');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (65,21,'Resume Creation / 33','0','1','4',33,'2020-10-20 09:24:19');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (66,23,'Add Credits From Admin','1','0','1',0,'2020-10-20 14:56:07');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (67,24,'Add Credits From Admin','1','0','1',0,'2020-10-27 20:39:14');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (68,24,'Resume Creation / 34','0','1','0',34,'2020-10-28 15:00:34');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (69,22,'Resume Creation / 35','0','1','9',35,'2020-10-28 16:29:10');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (70,25,'Add Credits From Admin','10','0','10',0,'2020-11-06 12:41:36');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (71,26,'Add Credits From Admin','10','0','10',0,'2020-11-10 20:35:12');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (72,26,'Resume Creation / 36','0','1','9',36,'2020-11-11 21:36:01');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (73,26,'Resume Creation / 37','0','1','8',37,'2020-11-12 20:18:20');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (74,26,'Resume Creation / 38','0','1','7',38,'2020-11-15 10:30:37');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (75,26,'Resume Creation / 39','0','1','6',39,'2020-11-15 10:30:38');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (76,22,'Resume Creation / 40','0','1','8',40,'2020-11-16 14:13:39');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (77,27,'Add Credits From Admin','10','0','10',0,'2020-11-19 12:30:23');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (78,26,'Resume Creation / 41','0','1','5',41,'2020-11-21 21:54:44');
insert  into `_tbl_franchisee_credits`(`CreditsID`,`FranchiseeID`,`Particulars`,`Credits`,`Debits`,`Balance`,`ProfileID`,`RequestOn`) values (79,20,'Card Creation / 9','0','1','7',9,'2021-01-30 18:16:04');

/*Table structure for table `_tbl_resume_additional_info` */

DROP TABLE IF EXISTS `_tbl_resume_additional_info`;

CREATE TABLE `_tbl_resume_additional_info` (
  `AdditionalInfoID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT NULL,
  `AdditionalInfo` varchar(255) DEFAULT NULL,
  `OtherAdditionalInfo` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdditionalInfoID`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_additional_info` */

insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (1,7,'Carrier Objectives','','To secure a challenging position in a reputable organization to expand my learnings, knowledge, and skills.\r\nTo secure employment with a reputable company, where I can utilize my skills and business studies background to the maximum.','2020-09-24 14:51:17');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (2,1,'Carrier Objectives','','To secure a challenging position in a reputable organization to expand my learnings, knowledge, and skills. To secure employment with a reputable company, where I can utilize my skills and business studies background to the maximum.','2020-09-24 15:32:16');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (3,7,'Others','dfdf','sdfsdfsdf','2020-09-25 10:06:51');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (4,10,'Interests','','Finance and Gold Appraisel\r\nMobile Networking','2020-09-25 12:45:38');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (5,10,'Others','Project Undertaken','Industrial Safety Measeures System Using PLC','2020-09-25 12:47:06');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (7,10,'Others','Strength','Ability and desire to learn within a short span of time. Strong desre and will-power to work in the company and learn subjects more practically to achieve new heights','2020-09-25 14:22:42');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (8,11,'Others','','','2020-09-26 15:44:56');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (9,12,'Others','Interested in design','Fashion design','2020-09-26 21:12:38');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (10,13,'Interests','','\r\nFinance and Gold Appraisel\r\nMobile Networking','2020-09-27 08:30:12');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (11,13,'Others','Project','Industrial Safety Measeures System Using PLC','2020-09-27 08:31:16');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (12,13,'Accoumplishment','','Ability and desire to learn within a short span of time. Strong desre and will-power to work in the company and learn subjects more practically to achieve new heights','2020-09-27 08:32:12');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (13,14,'Interests','','Finance and Gold Appraisel\r\nMobile Networking','2020-09-27 09:41:17');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (14,14,'Others','Project Undertaken','Industrial Safety Measeures System Using PLC','2020-09-27 09:41:55');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (15,14,'Others','Strength ','Ability and desire to learn within a short span of time. Strong desre and will-power to work in the company and learn subjects more practically to achieve new heights','2020-09-27 09:42:39');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (16,15,'Interests','','Writing','2020-09-27 17:54:14');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (19,16,'Others','Conference Attended ','Nursing Education Program Covering Basic of Diabetes and Insulin.','2020-09-27 21:48:01');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (20,17,'Others','Conference  And CNE Attended ','Nursing Education program  covering  Basies of Diabetes and Insulin.','2020-09-27 23:27:57');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (21,18,'Others','AutoCAD 2d&3d','Act as a course in basic of autocad,2d&3d drawing, solid modeling.\r\n','2020-09-28 10:04:01');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (22,19,'Others','Formos','Formos driver','2020-09-28 11:16:22');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (23,21,'Others','MCA','palnning','2020-09-29 18:22:58');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (24,23,'Affliation','','-','2020-10-14 13:54:22');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (25,23,'AdditionalSoftwares','','','2020-10-14 13:54:31');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (26,24,'Others','Story making','I give my creativity in the stories','2020-10-14 22:03:38');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (27,25,'Interests','','Artistic activities such as painting or graphic design.\r\nTraveling.\r\nCooking or baking.\r\nExercising and healthcare.\r\nOutdoor activities.\r\nReading History.\r\nOnline Browsing\r\nMusic','2020-10-15 18:25:59');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (28,27,'AdditionalSoftwares','','Photoshop','2020-10-16 14:28:20');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (29,27,'AdditionalSoftwares','','Indesign','2020-10-16 14:29:06');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (30,27,'AdditionalSoftwares','','Flash','2020-10-16 14:29:16');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (31,28,'Others','Photo shop','','2020-10-16 17:27:02');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (32,28,'Others','InDesign','','2020-10-16 17:27:17');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (33,28,'Others','Flash','','2020-10-16 17:27:31');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (34,30,'Certifications','','Advanced excel can be used nowadays with moderate features ','2020-10-18 11:17:49');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (35,31,'Others','Football ','Having national level certificate ','2020-10-19 15:44:56');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (36,32,'Certifications','','Diplomo in computer','2020-10-19 19:29:04');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (37,32,'Certifications','','Workshop on spoken English held from 11-04-2011 to 29-05-2011','2020-10-19 19:49:38');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (38,32,'Interests','','Mobile Networking\r\nWireless Networking','2020-10-19 19:53:01');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (39,32,'Others','Project Under Taken','An open architecture to Develope a handheld device for visually impaired people','2020-10-19 19:54:35');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (40,32,'Others','Strength','Ability and desire to learn with in a short span of time.strong desire and will power to work in the company and learn subjects more practically to achieve new heights.','2020-10-19 19:57:03');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (41,32,'Others','Hobbies','Surfing Net\r\nPhilatelist\r\nNumismatist','2020-10-19 20:02:03');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (42,33,'Others','Strength &Abilities','Successfully implementing the inventory control system in the company \r\nSuccessfully control the related jobs in a smooth and descent manner\r\nPlanning of store control system in the company ','2020-10-20 09:30:19');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (44,33,'Others','Material Management ','Command complete inward/outward and movement of materials.Manage material right from the initial stage of sourcing,to negotiations good identification,storage and movement,responsible for managing scarp and observing of companies assets','2020-10-20 09:38:21');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (45,33,'Others','Logistics/supply chain Management ','Monitor flow/movement of procedures items including raw materials,consumables and finished goods.Handle logistics functions;negotiate with transporters to reach the site in time.','2020-10-20 09:41:17');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (46,33,'Others','Hobbies','Surfing Net\r\nCollect and surfing various goods','2020-10-20 09:47:17');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (47,34,'Languages','','Tamil, Malayalam, English','2020-10-28 15:12:49');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (48,34,'AdditionalSoftwares','','MS word, ppt','2020-10-28 15:13:29');
insert  into `_tbl_resume_additional_info`(`AdditionalInfoID`,`ResumeID`,`AdditionalInfo`,`OtherAdditionalInfo`,`Description`,`CreatedOn`) values (49,34,'Interests','','Drawing, painting','2020-10-28 15:13:55');

/*Table structure for table `_tbl_resume_admin` */

DROP TABLE IF EXISTS `_tbl_resume_admin`;

CREATE TABLE `_tbl_resume_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_admin` */

insert  into `_tbl_resume_admin`(`AdminID`,`AdminName`,`UserName`,`Password`,`CreatedOn`) values (1,'DemoAdmin','admin@digitalmaking.in','123456',NULL);

/*Table structure for table `_tbl_resume_education` */

DROP TABLE IF EXISTS `_tbl_resume_education`;

CREATE TABLE `_tbl_resume_education` (
  `EducationID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `AcademicYear` varchar(255) DEFAULT NULL,
  `Course` varchar(255) DEFAULT NULL,
  `Percentage` varchar(255) DEFAULT NULL,
  `Institute` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`EducationID`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_education` */

insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (1,1,'1998-2002','High School',NULL,'Tennis High School, Boston',NULL,'2020-09-23 16:25:26',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (2,1,'2002-2006','Bachelor of Arts',NULL,'Suffolk University',NULL,'2020-09-23 16:26:05',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (3,1,'2006-2008','Master of Arts in Graphic Design',NULL,'Suffolk University, Boston',NULL,'2020-09-23 16:26:58',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (4,9,'2014-2016','Bsc Mathematics',NULL,'Nother University',NULL,'2020-09-25 11:49:52',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (5,9,'2017-2018','MA in Economics',NULL,'Nother University',NULL,'2020-09-25 11:50:34',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (6,10,'2003','SSLC','90','Government Higher Secondary School, Eluratty',NULL,'2020-09-25 12:34:14',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (7,10,'2006','HSC','98','Government Higher secondary school, Eluratty',NULL,'2020-09-25 12:35:05',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (8,10,'2009','Diplomo in ECE','88','Salem Co-operative Sugarmills Polytechnic College, Mohanur',NULL,'2020-09-25 12:36:20',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (9,11,'2018','BA ENGLISH','69','College',NULL,'2020-09-26 15:42:50',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (10,12,'2018','BA ENGLISH','69','National college',NULL,'2020-09-26 21:09:21',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (11,13,'2003','SSLC','90','Government Higher Secondary School, Eluratty',NULL,'2020-09-27 08:16:40',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (12,13,'2006','HSC','93','Government Higher secondary school, Eluratty',NULL,'2020-09-27 08:20:01',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (13,13,'2009','Diploma in ECA','88','Salem Co-operative Sugarmills Polytechnic College, Mohanur',NULL,'2020-09-27 08:21:14',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (14,14,'2003','SSLC','90','Government Higher Secondary School, Eluratty',NULL,'2020-09-27 09:33:41',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (15,14,'2006','HSC','98','Government Higher secondary school, Eluratty',NULL,'2020-09-27 09:34:21',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (16,14,'2009','Diploma In ECE','97','Salem Co-operative Sugarmills Polytechnic College, Mohanur',NULL,'2020-09-27 09:35:16',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (18,15,'2010','SSLC','80','State Board',NULL,'2020-09-27 20:14:49',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (19,15,'2012','HSC','70','State Board',NULL,'2020-09-27 20:15:34',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (20,15,'2015','BA','65','Annamalai University',NULL,'2020-09-27 20:16:16',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (21,16,'2008','SSLC','60','Kannagi Govt. Girls Higher Secondary School. Villianur.',NULL,'2020-09-27 21:15:34',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (22,16,'2010','HSC','48','Kannagi Govt. Girls Higher secondary  school.villianur.',NULL,'2020-09-27 21:18:53',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (23,16,'2015','Bsc Nursing','62','College of Nursing EastCoast Institute of Medical Sciences. Puducherry.',NULL,'2020-09-27 21:20:33',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (24,17,'2008','SSLC','60','Kannagi Govt Girls Higher Secondary school  villianur. ',NULL,'2020-09-27 23:19:37',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (25,17,'2010','HSC','48','Kannagi Govt Girls Higher  Secondary school villianur. ',NULL,'2020-09-27 23:20:34',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (26,17,'2015','Bsc Nursing ','62','College of Nursing East coast institute of medical sciences .Puducherry ',NULL,'2020-09-27 23:22:09',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (27,18,'2015','SSLC','67','Thiyagaraja Higher Secondary School',NULL,'2020-09-28 09:52:48',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (28,18,'2018','DIPLOMA CIVIL','74',' Arulmigu Kalasalingam Polytechnic College',NULL,'2020-09-28 09:53:47',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (29,19,'2015','SSLC','87','Thiyagaraja Higher Secondary School',NULL,'2020-09-28 11:13:34',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (30,20,'2004','GCE A-Level','85','Winbledon high school',NULL,'2020-09-28 14:31:17',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (31,20,'2008','Bachelor degree','91','International Business oxford university',NULL,'2020-09-28 14:32:05',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (32,20,'2016','MBA','71','London business school',NULL,'2020-09-28 14:32:46',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (34,21,'2004','GCE A level','93','wimbledon high school',NULL,'2020-09-29 18:15:57',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (35,21,'2008','bachelor degree','95','international bussinees oxford univercity',NULL,'2020-09-29 18:17:19',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (36,21,'2016','mpa diploma','88','london businees school',NULL,'2020-09-29 18:18:03',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (37,23,'2018-2021','B. Com (ca)','80','THENI kammavar sangam of arts& science',NULL,'2020-10-14 13:51:07',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (40,24,'2017','SSLC','95','NAMMHSS ',NULL,'2020-10-14 22:13:19',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (41,24,'2020','HSC','85','THENI kammavar sangam of arts and science college',NULL,'2020-10-14 22:14:01',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (42,25,'2009','B.A. ENG.Litt.,','81','M.V.Muthiah Govt. Arts College For Women, Dindigul.',NULL,'2020-10-15 18:15:17',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (43,25,'2006','HSC','72','Annamalaiyar Mills Girls Higher Secondary School, Dindigul',NULL,'2020-10-15 18:22:14',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (44,25,'2004','SSLC','88','Annamalaiyar Mills Girls Higher Secondary School, Dindigul',NULL,'2020-10-15 18:22:38',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (45,26,'2004','GCE A-level','90','Wimbledon Highschool',NULL,'2020-10-16 13:05:04',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (46,26,'2008','BACHOLOR DEGREE','80','Oxford university',NULL,'2020-10-16 13:06:03',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (47,26,'2016','MBA DIPLOMA','85','London Business school',NULL,'2020-10-16 13:07:06',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (48,27,'2006-2008','Master Of Arts In Graphic Design','62','Suffolk University, Boston',NULL,'2020-10-16 14:18:19',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (49,27,'2002-2006','Bachelor Of Arts','72','Suffolk University, Boston',NULL,'2020-10-16 14:19:01',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (50,27,'1998-2002','High School','84','Tennis High School, Boston',NULL,'2020-10-16 14:19:54',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (51,30,'2007','SSLC','63','TVSHSS',NULL,'2020-10-18 11:07:23',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (52,30,'2009','HSC','75','SHSS',NULL,'2020-10-18 11:08:11',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (53,30,'2013','BTech','77','KLU',NULL,'2020-10-18 11:09:34',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (54,31,'2009','HSC','73','TVSHSS',NULL,'2020-10-19 15:40:37',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (55,32,'2009','SSLC','69','Government Higher Secondary School from Anukkur',NULL,'2020-10-19 18:12:37',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (56,32,'2011','HSC','77','Sri Ragavendra Metric Higher Secondary School from Veraganur',NULL,'2020-10-19 18:14:26',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (57,32,'2015','BE ECE','63','Shivani Engineering College from Trichy',NULL,'2020-10-19 18:15:36',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (58,33,'2009','SSLC','78','Government Higher Secondary School ',NULL,'2020-10-20 09:25:17',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (59,33,'2011','HSC','81','Government Higher Secondary School ',NULL,'2020-10-20 09:26:16',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (60,34,'2017_2020','Ba English','79','Noorul islam ',NULL,'2020-10-28 15:02:46',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (61,34,'2017_2020','noorul Islam college of arts and science ','89','Noorul islam',NULL,'2020-10-28 15:11:16',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (62,36,'2010','SSLC','72','Krta Govt Hr Sec  School  Melathayilpatti',NULL,'2020-11-11 21:41:05',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (63,36,'2012','HSC','63','Krta Govt Hr Sec  School  Melathayilpatti',NULL,'2020-11-11 21:42:00',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (64,39,'Ms ','Telecom & Network ','95','Bahria university Islamabad ',NULL,'2020-11-15 10:34:12',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (66,39,'Bs ','Information technology ','98','IBMS Agriculture university Peshawar',NULL,'2020-11-15 10:35:58',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (67,41,'2008','SSLC','71','State Board ',NULL,'2020-11-21 21:56:29',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (68,41,'2010','HSC','52','State Board ',NULL,'2020-11-21 21:57:06',0);
insert  into `_tbl_resume_education`(`EducationID`,`ResumeID`,`AcademicYear`,`Course`,`Percentage`,`Institute`,`Description`,`CreatedOn`,`IsDelete`) values (69,41,'2013','B. Sc','64','Indian Arts & Science College, Kondam.',NULL,'2020-11-21 21:58:42',0);

/*Table structure for table `_tbl_resume_experience` */

DROP TABLE IF EXISTS `_tbl_resume_experience`;

CREATE TABLE `_tbl_resume_experience` (
  `ExperienceID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `FromYear` varchar(255) DEFAULT NULL,
  `FromMonth` varchar(255) DEFAULT NULL,
  `ToYear` varchar(255) DEFAULT NULL,
  `ToMonth` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `NameofCompany` varchar(255) DEFAULT NULL,
  `WorkingPlace` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ExperienceID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_experience` */

insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (1,1,'2008','JAN','2014','FEB','Graphic Designer',NULL,'Spin design Studio','Nagercoil','Utilize large format printing for billboards and trade shows and digital photography to enhance proposed work','2020-09-23 16:29:20',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (2,1,'1990','JAN','1990','JAN','Graphic Designer',NULL,'Digital Fx Design Studio','Nagercoil','Maintained project management schedules, databases, and forecaste.','2020-09-23 16:30:43',1);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (3,9,'2019','MAY','2019','DEC','Accounting Internship',NULL,'Tire Universe','Muzaffarnager, UP,India','Daily report preparation. Target analysis and adjudication. Department meeting initiations','2020-09-25 11:53:42',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (4,9,'2020','JAN','2020','SEP','Jr Account Executive',NULL,'Joy 4 Us Toys',' Noida,UP','Collect, interpret and review financial information, Predict financial trends, Reports for management and stakeholders','2020-09-25 11:56:23',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (5,10,'2019','JAN','2019','DEC','Loan Agent',NULL,'India Bulls Finance','India','Loan Agent in india bulls from January 2019 to December 2019','2020-09-25 12:37:51',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (6,10,'2018','JAN','2018','DEC','Gold Appraiser',NULL,'Happy Future Multipurpose Co-operative Society','India','Gold Appraiser in the Happy future Multipurpose Co-operative Society from January 2018 to December 2018.','2020-09-25 12:40:26',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (7,10,'2015','NOV','2017','OCT','Supervisor',NULL,'The Bolica Light Equipments Pvt','India','Supervisor in the Bolica Light Equipments Pvt. From November 2015 to October 2017','2020-09-25 12:43:40',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (8,11,'2020','JUN','2020','SEP','Trichy',NULL,'Lic','Trichy','Telecaller','2020-09-26 15:43:55',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (9,12,'2020','JUN','2020','SEP','Trichy',NULL,'LIC','Trichy','Tellecaller','2020-09-26 21:11:05',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (10,13,'2019','JAN','2019','JAN','Loan Agent',NULL,'India Bulls Finance','Trichy','\r\n\r\nLoan Agent in india bulls from January 2019 to December 2019','2020-09-27 08:24:10',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (11,13,'2018','APR','2018','JUL','Gold Appraiser',NULL,'Happy Future Multipurpose Co-operative Society','Chennai','\r\nGold Appraiser in the Happy future Multipurpose Co-operative Society from January 2018 to December 2018','2020-09-27 08:26:23',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (12,13,'2015','JUN','2017','AUG','Supervisor ',NULL,'The Bolica Light Equipments Pvt','Chennai','Supervisor in the Bolica Light Equipments Pvt. From November 2015 to October 2017','2020-09-27 08:27:38',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (13,14,'2019','MAY','2019','JUN','Loan agent',NULL,'India Bulls Finance','Trichy','Loan Agent in india bulls from January 2019 to December 2019','2020-09-27 09:36:45',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (14,14,'2018','JAN','2018','JUL','Gold Appraiser',NULL,'Happy Future Multipurpose Co-operative Society','Chennai ','Gold Appraiser in the Happy future Multipurpose Co-operative Society from January 2018 to December 2018.','2020-09-27 09:37:57',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (15,14,'2015','JAN','2017','JAN','Supervisor ',NULL,'The Bolica Light Equipments Pvt','Chennai ','Supervisor in the Bolica Light Equipments Pvt. From November 2015 to October 2017','2020-09-27 09:39:12',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (16,18,'2019','NOV','2020','JAN','Delivery boy',NULL,'Bigbasket','5k vanagaram','2019 Nov to 2020 Jan delivery','2020-09-28 09:57:14',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (17,19,'2018','SEP','2020','AUG','Driver',NULL,'Own car','55B, madathupatti street','Acting driver','2020-09-28 11:15:11',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (18,20,'2010','AUG','2011','JAN','Marketing manager',NULL,'London','London','Lorem ipsum dolor sit amet, sint everti animal ad mea, sit nostero fierent no, nulla civibus insolens ut ius.Ea pri noster possim','2020-09-28 18:30:08',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (19,20,'2011','JAN','2016','JAN','Lorem ipsum dolor sit amet, sint everti animal ad mea, sit nostero fierent no, nulla civibus insolens ut ius.Ea pri noster possim',NULL,'London','London','Marketing manager','2020-09-28 18:32:40',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (20,20,'2016','JAN','2020','JAN','Marketing manager',NULL,'London','London','Lorem ipsum dolor sit amet, sint everti animal ad mea, sit nostero fierent no, nulla civibus insolens ut ius.','2020-09-28 18:34:00',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (21,21,'2010','JAN','2011','JAN','animals ad',NULL,'london','london','animal ad','2020-09-29 18:19:28',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (22,21,'2011','JAN','2016','JAN','sit amet',NULL,'london','london','sit amet','2020-09-29 18:20:30',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (23,21,'2016','JAN','2016','JAN','sit amet',NULL,'london','london','sit amet','2020-09-29 18:21:24',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (24,23,'2019','MAY','2019','JAN','-',NULL,'Krishna enterprises','Gandhi selai near chinnamanur THENI','','2020-10-14 13:52:58',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (25,24,'2020','JAN','2020','MAR','Collection agent',NULL,'Gokulam chits','THENI','Collection agent in gokulam chits from January 2020 to March 2020','2020-10-14 22:20:27',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (26,24,'1990','MAR','1990','NOV','Assistant director',NULL,'Aaridhra','Chennai','Assistant director in Aaridhra production from March2020 to November 2020','2020-10-14 22:28:28',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (27,25,'2014','FEB','2020','OCT','News Editor, Downloading Sites, Freelancher',NULL,'Tamil Express News','TamilExpressNews.com','Writing News Content\r\nImage Editor\r\nUploading Songs And Make Ringtones','2020-10-15 18:19:47',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (28,26,'2010','JAN','2011','JAN','Lorem ipsum dolor sit amet, sint everti animal ad mea, sit nostro fierent no, nulla cibus insolens ut ius. Ea pri noster possim. ',NULL,'-','London','•nec cibo populo cu.\r\n•possim sensibus quo ne, nam tritani suscipit intellegate id.','2020-10-16 13:22:27',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (29,26,'2011','JAN','2016','JAN','Lorem ipsum dolor sit amet, sint everti animal ad mea, sit nostro fierent no, nulla civibus insolens at ius. Ea pri noster possim . ',NULL,'-','London','•nec sibo populo cu.\r\n•possim sensibus quo ne, nam tritani suscipit intellegate id.\r\n•Ea pro probatus invenire, vix cu ciusae argumentum. ','2020-10-16 13:28:09',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (30,27,'2014','JAN','2020','OCT','Graphic Designer',NULL,'Digital FX DDesign Studio ','Digital FX DDesign Studio, Boston','Maintained Project Management Schedules, Databases And Forecast.\r\n','2020-10-16 14:23:21',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (31,27,'2008','JAN','2014','JAN','Graphic Designer',NULL,'Spin Design Studio','Spin Design Studio, Boston ','Utilize Large Format Printing For Billboards And Trade Shows And Digital Photography Proposed Work','2020-10-16 14:25:32',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (32,28,'2014','JAN','2020','JAN','Graphics designer',NULL,'Digital Fxx designe studio','British','Maintenanc project management and schedule and database &forecast','2020-10-16 17:21:09',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (33,28,'1990','JAN','1990','JAN','Graphics designer',NULL,'Spin design studio','British','Utilizes large format printing for billboard and trade show digital photography proposed work','2020-10-16 17:23:56',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (34,30,'2014','JAN','2019','DEC','Senior quality controller',NULL,'IVRCL','Hyderabad','Maintaining all records of subcontractors and their workflows under my control','2020-10-18 11:12:58',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (35,31,'2009','JAN','2015','JAN','Storekeeper',NULL,'Tata projects limited','Kalaiganagar orissa','Works in various areas like materials receipt and issues','2020-10-19 15:42:43',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (36,32,'2015','AUG','2016','AUG','Data analysis ',NULL,'HTC Global services from chennai','Chennai','Data entry ','2020-10-19 18:18:07',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (37,33,'2012','JAN','2019','JAN','Store keeper',NULL,'Flyovers & water projects','Chenni','Flyovers & water projects ','2020-10-20 09:32:50',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (38,33,'2020','JAN','1990','JAN','Senior store keeper ',NULL,'M/S Tata projects Limited','Kalinganagar,Orissa','Keeping store','2020-10-20 09:34:38',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (39,36,'2014','JUN','2015','JUL','Junior Guest Relationship Executive ',NULL,'AGS CINEMAS ','T nagar chennai tamilnadu ','Customer care ','2020-11-11 21:55:45',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (40,36,'2015','OCT','2017','NOV',' Guest Relationship Executive ',NULL,'SPI CINEMAS ','Forum vijaya mall vadapalani chennai tamilnadu ','Customer care ','2020-11-11 21:57:21',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (41,37,'1999','MAY','2007','JAN','Executive ',NULL,'Material Building ','Material Building ','Experience executive ','2020-11-12 20:22:04',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (42,37,'2007','SEP','2009','JAN','Store Keeper ',NULL,'Tata project limited ','Orissa','Senior store kepper','2020-11-12 20:24:16',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (43,39,'2014','JAN','2015','JAN','Telecom RF engineer ',NULL,'TIA GROUP OF COMPANIES ','Dubai','Telecom engineer ','2020-11-15 10:37:50',0);
insert  into `_tbl_resume_experience`(`ExperienceID`,`ResumeID`,`FromYear`,`FromMonth`,`ToYear`,`ToMonth`,`Designation`,`Title`,`NameofCompany`,`WorkingPlace`,`Description`,`CreatedOn`,`IsDelete`) values (44,41,'2017','FEB','2020','NOV','Senior Relationship Executive ',NULL,'SPI CINEMAS ','Forum vijaya mall vadapalani chennai tamilnadu ','Customer support Executive ','2020-11-21 22:02:42',0);

/*Table structure for table `_tbl_resume_general_info` */

DROP TABLE IF EXISTS `_tbl_resume_general_info`;

CREATE TABLE `_tbl_resume_general_info` (
  `ResumeID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeName` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `DateofBirth` date DEFAULT NULL,
  `FathersName` varchar(255) DEFAULT NULL,
  `Community` varchar(255) DEFAULT NULL,
  `Nationality` varchar(255) DEFAULT NULL,
  `Religion` varchar(255) DEFAULT NULL,
  `MaritalStatus` varchar(255) DEFAULT NULL,
  `Language` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `WhatsappNumber` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `WebsiteName` varchar(255) DEFAULT NULL,
  `Proffession` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) DEFAULT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `AddressLine3` varchar(255) DEFAULT NULL,
  `ProfilePhoto` varchar(255) DEFAULT NULL,
  `Description` text,
  `PersonalInfo` text,
  `CareerObjectives` text,
  `Declaration` text,
  `CreatedOn` varchar(255) DEFAULT NULL,
  `Profession` varchar(255) DEFAULT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `CreatedByID` int(11) DEFAULT '0',
  `Url` varchar(255) DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ResumeID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_general_info` */

insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (1,'TANYA MAY MARTIN','Male','2001-12-19','Martin','BC','Indian','Hindhu','Unmarried','Tamil','9000000000','9000000000','tanymay@email.com',NULL,'GRAPHIC  DESIGNER','162, Glory Road','Nashvillee','tennesseee','images.jpg','Highly creative and multitalented Graphic Designer with extensive eperience in print design, multimedia and marketing.','Working gives me a lot of skills and experience that i believe make me best suited for the job position that i beign offered with a position of Graphic Designer.   \r\n\r\nHighly creative and multitalented Graphic Designer with extensive eperience in print design.Exceptional collaborative and interpersonal skills.',NULL,NULL,'2020-09-23 16:04:10',NULL,'martdesignfolio.com','Franchisee',1,'TANYA-MAY-MARTIN-1',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (4,'Jeevan','Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'9791330770','9791330770','filmdirectorjk37@gmail.com',NULL,'Software engineer ','Nagercoil  kanyakumari ','Tamilnadu, india','Marthandam ','IMG_20200830_122433.JPG','I am software  engineer ','Age   45 \r\nLanguages known  english, tamil, ',NULL,NULL,'2020-09-23 18:12:13',NULL,'www.digitalmaking.in','Franchisee',1,'Jeevan-4',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (5,'test 2','Female','2001-12-19','fathersssv','BCv','Indianv','Hinduv','Unmarriedv','Tamilv','988888888888','9777777777','testtwo@gmail.com',NULL,'Data Entryyyyy2','ngl','kk','tn','index.jpg','asasdasd','asdasdasd',NULL,NULL,'2020-09-24 13:01:11',NULL,'dfsdfsdfsdf','Franchisee',1,'test-2-5',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (6,'Demo','Female','0000-00-00','fsdf','BC','Indianv','Hindu','Unmarriedv','Tamil','9111111111','9111111111','demo@gmail.com',NULL,'Data Entry','ngl','kk','tn','index.jpg','wqewe','qweqwe',NULL,NULL,'2020-09-24 14:02:04',NULL,'sdfsdf','Franchisee',1,'Demo-6',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (7,'fsdfs','Female','1997-11-28','dfsdf','','','','','','9111111111','9111111111','demo@gmail.com',NULL,'fsdfsd','sdfsdf','','','index.jpg','fsdfsdf','sdfsdfs',NULL,NULL,'2020-09-24 14:22:07',NULL,'sdfsdf','Franchisee',1,'fsdfs-7',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (8,'Menaga','Male','1980-03-04','Kanesh','Nadar','Indian','Christian ','Single ','Tamil, english, malaylam','9000000000','9000000000','Kanesh@gmail.com',NULL,'Teacher','Vadaplani','Chennai','Tamilnadu','311499_445838758794157_645928224_n.jpg','Highly craetive and multiphfcvbxvx\r\nFhhjvdvnjfvbnhddtujfrghheghsjsgewjgghhgjktghjggjjhfdgjjddghjudghjgf','Yfgjsjhsjsksbnsns',NULL,NULL,'2020-09-25 11:31:00',NULL,'','Franchisee',1,'Menaga-8',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (9,'ANGELA WILKINSON','Male','1997-10-08','WILKINSON','BC','Indian','Hindu','Unmarried','Tamil','895555555','895555555','angela@gmail.com',NULL,'Administrative Assistant','4397 Aron smith,Drive Harishburg. PA','','','images.jpg','Highly creative and multitalented Graphic Designer with extensive eperience in print design, multimedia and marketing.','Working gives me a lot of skills and experience that i believe make me best suited for the job position that i beign offered with a position of Graphic Designer.   \r\n\r\nHighly creative and multitalented Graphic Designer with extensive eperience in print design.Exceptional collaborative and interpersonal skills.',NULL,NULL,'2020-09-25 11:47:30',NULL,'','Franchisee',1,'ANGELA-WILKINSON-9',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (10,'M BALU','Male','1986-05-26','Mani','BC','Indian','Hindu','Married','Tamil, English','+919965666017','+919965666017','manibalu85@gmail.com',NULL,'Accountant','7/123 South Street','Eluratty(PO),Trichy (Dt) ','621215','profile_11 SDN_01553 copy.jpg','To pursue a challenging career in leading and progressive research organization offering opprtunities for utilizing my skills towards the growth of the organization.','','To pursue a challenging career in leading and progressive research organization offering opprtunities for utilizing my skills towards the growth of the organization.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-25 12:16:14',NULL,'','Franchisee',1,'M-BALU-10',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (11,'Sathiya priya','Female','2001-02-04','Sekar',NULL,'Indian','Hindu','Single','tamil','6380363530','6380363530','sathiya040201@gmail.com',NULL,'Data entry','4/2 kamarajapuram','Ponnagar','Trichy','IMG-20200922-WA0003.jpg','','','To be earn','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-26 15:41:24',NULL,'','Franchisee',9,'Sathiya-priya-11',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (12,'Sathiya priya','Female','2001-02-04','Sekar',NULL,'Indian','Hindu','Single','Tamil','6380363530','6380363530','sathiya040201@gmail.com',NULL,'Data entry','4/2 kamarajapuram','Ponnagar','Trichy','IMG-20200821-WA0038.jpg','','','To become a successful professional in the field of information technology and to work in an innovative and competitive world.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-26 21:08:22',NULL,'','Franchisee',9,'Sathiya-priya-12',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (13,'M BALU','Male','1986-05-26','Mani',NULL,'Indian','Hindu ','Single ','Tamil, English, hindi, ','+919965666017','+919965666017','manibalu85@gmail.com',NULL,'Software Engineer ','7 /123 south street','Elurapatty p o ','Trichy pin 620001','370522_100002282889215_1697175907_n.jpg','','','To pursue a challenging career in leading and progressive research organization offering opprtunities for utilizing my skills towards the growth of the organization.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-27 08:14:59',NULL,'','Franchisee',1,'M-BALU-13',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (14,'M. Balu','Male','1986-03-04','Mani',NULL,'Indian ','Hindu ','Married ','Tamil, English ','+919965666017','+919965666017','manibalu85@gmail.com',NULL,'Software Engineer ','7/123 South Street','Elurapatty (po) ','Trichy district,  621216','Screenshot_2020_0506_204046.png','','','To pursue a challenging career in leading and progressive research organization offering opprtunities for utilizing my skills towards the growth of the organization.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-27 09:32:17',NULL,'','Franchisee',1,'M.-Balu-14',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (15,'Keerthana P','Female','1995-09-26','Palanivel',NULL,'Indian','Hindu','Married','Tamil,English','9789377375','9789377375','keerthisairaj375@gmail.com',NULL,'Data entry','No 456','Thirukuripu thondar nagar','Kakuppam villupuram','IMG_20200202_103910.jpg','','','Organisation offering opportunities for utilizing my skill towards the growth of organisation','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-27 17:24:30',NULL,'','Franchisee',13,'Keerthana-P-15',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (16,'Senbagavalli.J','Female','1993-01-23','S.Natarajan',NULL,'Indian','Hindu','Married ','Tamil','8946090251','8946090251','Jayaguru.8@gmail.com',NULL,'Staff nurse','No.8, karunarakarapillai street, 2nd main road','Kosapalayam. Pondycherry.','605013','16012211679640.7810155184546853.jpg','','','Seeking challenging job where my knowledge contributes to the growth and development  of the organization as well as me.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-27 21:09:56',NULL,'','Franchisee',12,'Senbagavalli.J-16',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (17,'J.senbagavalli','Female','1993-06-23','S.Natarajan',NULL,'Indian ','Hindu','Married ','Tamil,English ','8946090251','8946090251','Jeisenbashri@gmail.com',NULL,'Staff Nurse ','No.8,karunakarapillai street,2nd main road.','Kosapalayam. Puducherry. ','605013.','2020-06-23-10-15-27-990.jpg','','','Seeking challenging job where my knowledge contributes to the growth and development  of organisations as well as me.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-27 23:17:49',NULL,'','Franchisee',11,'J.senbagavalli-17',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (18,'Sakthivel v','Male','2000-08-02','Venkatesh',NULL,'India','Hindu','Single','Tamil','6381395832','6381395832','sakthivel02082000@gmail.com',NULL,'Site supervisor','103/3, mayandipatti street','Srivilliputhur','Viruthunagar district 626125','sakthi63813-___CBzbluppy9I___-.jpg','','','To get placed in an organization where my skills and ability will be utilized to enhance my professional and organizational growth.\r\nTo mould myself through continuous learning and to apply my thoughts and efforts for the development of my organization and  nation.\r\n','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-28 09:50:28',NULL,'','Franchisee',14,'Sakthivel-v-18',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (19,'Devasahayam','Male','2000-09-16','Kirshnasamy',NULL,'Indian','Christen ','Single','Tamil, English',' 85248 30660',' 85248 30660','sakthithala618@gmail.com',NULL,'Driver','55B,madathupatti street','Srivilliputhur','Viruthunagar district 626125','20200928_110239.jpg','','','To get placed in an organization where my skills and ability will be utilized to enhance my professional and organizational growth.\r\n','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-28 11:12:03',NULL,'','Franchisee',14,'Devasahayam-19',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (20,'Helen Devis ','Female','1985-09-06','George',NULL,'Uk','Christian','Married','English','+44 (0)711234568','+44 (0)711234568','jannsen@xmail.com',NULL,'Marketing manager','Wimbledon street','London','UK','Screenshot_20200928_142648.jpg','','','Lorom ipsum dolor sit amet,fastidii mnesa rchum ei pri. Ut ubique populo isque sed, pri detracto vitupreata cu. Ad eligendi consulatu necessilatis mel,repu diare perci.possim senstiors quo ne, nam tritani suscript intelligant id. Ea pro probatus invenire, vix cu cau sae argumentum','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-28 14:29:28',NULL,'linkedin.com','Franchisee',13,'Helen-Devis--20',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (21,'janssen','Female','1997-01-01','hellen',NULL,'uk','hindu','single','tamil,english','711234568','711234568','janssen@xmail.com',NULL,'marketing','london','uk','','Screenshot_2020-09-29-18-06-36-51.png','','','To get placed in an organization where my skills and ability will be utilized to enhance my professional and organizational growth.\r\n','I hereby declare that all the above given details are true to the best of my knowledge.','2020-09-29 18:14:17',NULL,'','Franchisee',14,'janssen-21',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (22,'M. Mugundhan','Male','2001-05-01','G. Murugan',NULL,'Indian','Hindhu','','Tamil, English','8608795036','8608795036','m4095629@gmail.com',NULL,'Director','Doorno31, wardno18 vishwankulam chinnamanur, THENI','','','wallpaper.bkup','','','Director','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-14 10:21:18',NULL,'Mugu0105','Franchisee',16,'M.-Mugundhan-22',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (23,'M. Mugundhan','Male','2001-05-01','G. Murugan',NULL,'Indian','Hindhu','','Tamil, English','8608795036','8608795036','m4095629@gmail.com',NULL,'Director','Doorno31, wardno18 vishwankulam chinnamanur, THENI','','','wallpaper.bkup','','','Director','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-14 10:21:18',NULL,'Mugu0105','Franchisee',16,'M.-Mugundhan-23',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (24,'M. Mugundhan','Male','2001-05-01','G. Murugan',NULL,'Indian','Hindhu','UnMarried','Tamil, English','8608795036','8608795036','m4095629@gmail.com',NULL,'Accountant','Doorno31 wardno18 vishwankulam','Chinnamanur','THENI dirstic','IMG_20200924_130719.jpg','','','-','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-14 21:59:44',NULL,'','Franchisee',16,'M.-Mugundhan-24',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (25,'A. Arifa Banu','Female','1988-11-24','A. Abul Ansar',NULL,'Indian','Muslim','Married','Tamil, English','6382703690','8098173154','yasminbanu589@gmail.com',NULL,'News Editor','Havva Colony','Masayak Noor Nagar, Ayyampet','Thanjavur District','WhatsApp Image 2020-10-15 at 6.02.33 PM.jpeg','','','To Secure A Challenging Position Where I Can Contribute My Skills To Learn And Grow Along With The Growth Of The Organization To Prove Myself Meeting The Challenges Around Me And Shoulder The Responsibilities Assigned To Me.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-15 18:07:02',NULL,'','Franchisee',19,'A.-Arifa-Banu-25',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (26,'HELEN DAVIES','Female','1952-01-01','-',NULL,'London, uk','-','-','-','+44 (0)711234568','-','janssen@xmail.com',NULL,'Marketing manager','-','London','Uk','IMG_20201016_130201.jpg','','','','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-16 13:03:11',NULL,'LinkedIn. Com','Franchisee',16,'HELEN-DAVIES-26',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (27,'TANYA MAY MARTIN','Female','1993-06-11','Martin',NULL,'British','Christian','Married','English','012 345 6789000','012 345 6789999','tanymay@email.com',NULL,'Graphic Designer','162, Glory Road,','Nashville','Tenneessee','WhatsApp Image 2020-10-16 at 2.16.22 PM.jpeg','','','Highly Creative And Multitalented Graphic Designer With Extension Experience in Print Design, Multimedia And Marketing','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-16 14:16:55',NULL,'martdesignfolio.com','Franchisee',19,'TANYA-MAY-MARTIN-27',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (28,'TANAY MAY MARTINE','Female','1993-06-11','Martin',NULL,'British','Christian','Married','English','0123456789000','0123456789999','tanyamay@email.com',NULL,'Graphics designer','162 Glory road','Nashville Tennessee','British','IMG_20201016_171503.jpg','','','Highly creativit &multitalanted graphics designer with extension experience in printing design. Multimedia & marketing. ','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-16 17:17:52',NULL,'','Franchisee',16,'TANAY-MAY-MARTINE-28',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (29,'N.Santhosh Goud','Male','1993-01-01','Raja',NULL,'Indian','Hindu','No','English & Tamil','+919010197988','+919010197988','nsanthoshgoud@yahoo.com',NULL,'Store Keeper','NA','NA','NA','WhatsApp Image 2020-10-17 at 11.00.18 AM.jpeg','','','I step forward with my skills and abilities for an organization, where there is a potential growth and recognition to put in maximum contribution, so I can utilize my knowledge for the development and growth of the company in the field of \"STORES\".','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-17 11:07:53',NULL,'www.nsanthoshgoud.com','Franchisee',17,'N.Santhosh-Goud-29',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (30,'Sathishkumar S','Male','1992-03-18','Soundararaj T',NULL,'Indian','Hindu','Single ','Tamil English ','8012920578','8012920578','sathishciv.119@gmail.com',NULL,'Civil Engineer ','16 kamarajar street ','Madakulam road','Palanganatham ','Photo2.jpg','','','To find a position where i can use the strength and knowledge i have.i want to participate in growth and success of the company where i work for','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-18 11:06:05',NULL,'','Franchisee',20,'Sathishkumar-S-30',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (31,'N Santhosh Goud','Male','1952-01-01','Sundar t',NULL,'Indian','Hindu','Single ','Tamil English ','901097988','901097988','nsanthoshgoud@yahoo.com',NULL,'Storekeeper','HNo: 8-13','Sardhana village','Medak','IMG-20201019-WA0010.jpg','','','I step forward with my skills and abilities for an organisation, where there is a potential growth and recognition to put in maximum contribution, so i can utilise my knowledge for the development and growth of the company in the field of stores','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-19 15:39:52',NULL,'','Franchisee',20,'N-Santhosh-Goud-31',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (32,'R.Priya','Female','1994-05-11','Ramasamy',NULL,'Indian','Hindu','Married','English,Tamil','+91 9677349652','+91 9677349652','Priyaramasamy08@gmail.com',NULL,'Data Entry Operator','2/117,East street,','Anukkur,pin.no:621 217','Perambalur district ','7CDCE6B6-67B3-47C0-A417-7252FF6E6171.jpeg','','','To pursue a challenging  carrier in leading and progressive Data Operating offering opportunities for utilising my skills towards the growth of the Organization.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-19 18:06:34',NULL,'','Franchisee',21,'R.Priya-32',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (33,'N.Santhosh Goud','Male','1994-01-01','Narayanan Goud',NULL,'Indian','Hindu','Married','English and Tamil','+91 9010197988','+91 9010197988','nsanthoshgoud@yahoo.com',NULL,'Store keeper','H.No:8-13','Saradhana village','Medak','323A74A5-6044-43C8-ABB6-33DA4924BE3F.jpeg','','','I step forward with my skills and abilities for an organisation,where there is a potential growth and recognition to put in maximum contribution,so I can utilise my knowledge for the development and growth of the company in the field of “STORES”','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-20 09:24:19',NULL,'','Franchisee',21,'N.Santhosh-Goud-33',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (34,'R. Suji','Female','1999-10-02','R. Ramesh',NULL,'Indian','Christian ','Unmarried ','Tamil, English, Malayalam','8668046650','8668046650','Suji021099@gmail.com',NULL,'Ba English','4/815,amirthanager','Kottilpadu, colachel ','Kanniyakumari district ','IMG-20200605-WA0734.jpg','','','','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-28 15:00:34',NULL,'','Franchisee',24,'R.-Suji-34',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (35,'Sheik Andullah.J','Male','2001-04-28','JAKKIR HUSSAIN.K',NULL,'INDIAN ','MUSLIM','SINGLE','TAMIL','8508340078','8508340078','jsheikabdullah712@gmail.com',NULL,'MECHANICAL ENGINEER','16/32 d thangaraj nagar ,arasu colny, karur','','','16038817252912490487646160449939.jpg','','','To pursue a challenging career in leading and progressive research organization offering opprtunities for utilizing my skills towards the growth of the organization','I hereby declare that all the above given details are true to the best of my knowledge.','2020-10-28 16:29:10',NULL,'','Franchisee',22,'Sheik-Andullah.J-35',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (36,'Sathish kumar ','Male','1994-01-01','Thirumani.N',NULL,'Indian','Hindu','Single ','Tamil, English ','9551141919','9551141919','sathish11931919@gmail.com',NULL,'Guest Relationship Executive ','1/710 Pernayakanpatti','Sithurajapuram,Sattur Taluk ','Viruthunagar 626128','IMG_20201111_213532.jpg','','','Aspiring for a challenging career in that instigates creativity and enhances knowledge provides \r\nexposure to new ideas and simulates professional and personal growth.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-11-11 21:36:01',NULL,'','Franchisee',26,'Sathish-kumar--36',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (37,'N. Santhosh Goud','Male','1989-12-06','Naresh Goud ',NULL,'Indian ','Hindu ','Single ','Tamil, English ','9010197988','9010197988','nsanthoshgoud@yahoo.com',NULL,'Executive ','8-13 sardhana village ','Medak ','','IMG_20201112_201713.jpg','','','I step forward in my skills and abilities for an  organization, where there is a potential growth and recognition to put in maximum contribution, so i can utilize my knowledge for the development and growth of my company in the field of \"STORES\". ','I hereby declare that all the above given details are true to the best of my knowledge.','2020-11-12 20:18:20',NULL,'','Franchisee',26,'N.-Santhosh-Goud-37',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (38,'Tahir Hussain ','Male','1982-03-07','Hussain ',NULL,'Indian','Muslim ','Married ','Hindi English ','971559941295','971559941295','Tahir1982@live.com',NULL,'IT engineer','Dubai, UAE','','','IMG-20201115-WA0009.jpg','','','An opportunity to exploit and apply my knowledge, skills and talent as a telecom professional, it professional on behalf of growing and visionary enterprise /organization to make a solid contribution for dynamic goals and futuristic growth of success of enterprise. ','I hereby declare that all the above given details are true to the best of my knowledge.','2020-11-15 10:30:37',NULL,'','Franchisee',26,'Tahir-Hussain--38',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (39,'Tahir Hussain ','Male','1982-03-07','Hussain ',NULL,'Indian','Muslim ','Married ','Hindi English ','971559941295','971559941295','Tahir1982@live.com',NULL,'IT engineer','Dubai, UAE','','','IMG-20201115-WA0009.jpg','','','An opportunity to exploit and apply my knowledge, skills and talent as a telecom professional, it professional on behalf of growing and visionary enterprise /organization to make a solid contribution for dynamic goals and futuristic growth of success of enterprise. ','I hereby declare that all the above given details are true to the best of my knowledge.','2020-11-15 10:30:38',NULL,'','Franchisee',26,'Tahir-Hussain--39',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (40,'Tahir hussain','Male','1982-01-01','',NULL,'Dubai','MUSLIM','','','+971559941295','+971559941295','tahir1982@live.com',NULL,'Telecom ','Dubai,UAE','','','IMG-20201116-WA0017.jpg','','','An opportunity to exploit and apply my knowledge, skills and talent as a Telecom professional, IT professional on behalf of growing and visionary enterprise/ organization make a solid contribution for dynamic goals and futuristic growth of success of enterprise.','I hereby declare that all the above given details are true to the best of my knowledge.','2020-11-16 14:13:39',NULL,'','Franchisee',22,'Tahir-hussain-40',0);
insert  into `_tbl_resume_general_info`(`ResumeID`,`ResumeName`,`Gender`,`DateofBirth`,`FathersName`,`Community`,`Nationality`,`Religion`,`MaritalStatus`,`Language`,`MobileNumber`,`WhatsappNumber`,`EmailID`,`WebsiteName`,`Proffession`,`AddressLine1`,`AddressLine2`,`AddressLine3`,`ProfilePhoto`,`Description`,`PersonalInfo`,`CareerObjectives`,`Declaration`,`CreatedOn`,`Profession`,`Website`,`CreatedBy`,`CreatedByID`,`Url`,`IsDelete`) values (41,'K.KARTHIKEYAN','Male','1993-06-15','Kannan',NULL,'Indian ','Hindu ','Single ','Tamil, English ','7358083418','7358083418','padagamkk1984@gmail.com',NULL,'Customer Executive ','No.14, kattabomman street,','Gandhi nagar, Virugambakkam,','Chennai-92.','IMG-20201118-WA0008.jpg','','','Seeking Position to utilize my skills and abilities that offers\r\nprofessional growth while being resourceful, Innovative and flexible.','I hereby declare you sir that the above information furnished by me true to my\r\nknowledge and belief.','2020-11-21 21:54:44',NULL,'','Franchisee',26,'K.KARTHIKEYAN-41',0);

/*Table structure for table `_tbl_resume_hobbies` */

DROP TABLE IF EXISTS `_tbl_resume_hobbies`;

CREATE TABLE `_tbl_resume_hobbies` (
  `HobbiesID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`HobbiesID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_hobbies` */

/*Table structure for table `_tbl_resume_skills` */

DROP TABLE IF EXISTS `_tbl_resume_skills`;

CREATE TABLE `_tbl_resume_skills` (
  `SkillsID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `SkillsRange` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`SkillsID`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_resume_skills` */

insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (1,1,'Web Designing','50','','2020-09-23 16:31:05',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (2,1,'Graphic Designing','75','','2020-09-23 16:31:23',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (3,1,'Digital Art','80','','2020-09-23 16:31:42',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (4,1,'Drawing','85','','2020-09-23 16:32:01',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (5,1,'Animation','90','','2020-09-23 16:32:18',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (6,9,'Problem Solving','80','','2020-09-25 11:58:31',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (7,9,'Adaptabily','85','','2020-09-25 11:58:49',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (8,9,'Collaboration','90','','2020-09-25 11:59:13',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (9,9,'Strong Work Ethic','93','','2020-09-25 11:59:36',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (10,10,'DCA','95','','2020-09-25 12:44:41',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (11,10,'Hardware and Networking','90','','2020-09-25 12:45:00',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (12,11,'Drawing','45','Drawing well','2020-09-26 15:44:31',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (13,12,'Drawing','50','Drawing well','2020-09-26 21:11:58',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (14,13,'DCA','88','Diploma Computer Education ','2020-09-27 08:28:38',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (15,13,'Hardware Net working ','94','Hardware and Networking','2020-09-27 08:29:19',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (16,14,'DCA','98','Diploma computer education ','2020-09-27 09:40:03',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (17,14,'Hardware and Networking','98','Hardware','2020-09-27 09:40:40',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (18,16,'Training','90','Training  for Hospital Duty.','2020-09-27 21:49:49',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (19,17,'Practical knowledge ','90','Work from hospital ','2020-09-27 23:24:26',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (20,18,'DCE','74','Diploma civil engineering','2020-09-28 10:03:04',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (21,19,'SSLC','87','Acting driver','2020-09-28 11:15:41',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (22,20,'Marketing','100','Good','2020-09-28 18:34:34',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (23,20,'Stratergy','95','Good','2020-09-28 18:35:03',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (24,20,'Budget','80','Medium','2020-09-28 18:35:28',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (25,20,'Planning','85','Good','2020-09-28 18:36:01',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (26,20,'Presentation','90','Good','2020-09-28 18:36:24',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (27,21,'marketing','98','marketing','2020-09-29 18:22:05',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (28,21,'palnning','65','palnning','2020-09-29 18:22:38',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (29,23,'Direction','70','Future Flim Maker','2020-10-14 13:53:43',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (30,24,'Story making & narration','75','I give variety of narration style in making','2020-10-14 22:04:52',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (31,25,'HDCA','89','Networking, Coding','2020-10-15 18:21:05',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (33,26,'Marketing','100','-','2020-10-16 13:42:47',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (34,26,'Strategy','90','-','2020-10-16 13:43:31',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (35,26,'Budget','70','-','2020-10-16 13:43:59',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (36,26,'Planning','70','-','2020-10-16 13:44:26',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (37,26,'Presentation','80','-','2020-10-16 13:44:58',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (38,27,'Web Design','84','','2020-10-16 14:25:59',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (39,27,'Graphic Design','94','','2020-10-16 14:26:24',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (40,27,'Digital Art','87','','2020-10-16 14:26:58',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (41,27,'Drawing','80','','2020-10-16 14:27:19',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (42,27,'Animation','84','','2020-10-16 14:27:34',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (43,28,'Web design','90','-','2020-10-16 17:24:32',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (44,28,'Graphics design','100','-','2020-10-16 17:25:01',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (45,28,'Digital art','85','-','2020-10-16 17:25:44',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (46,28,'Drawing','75','-','2020-10-16 17:26:12',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (47,28,'Animation','75','','2020-10-16 17:26:32',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (48,30,'AUTOCADD ','95','Doing 2d plan drawing as per the requirements ','2020-10-18 11:14:41',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (49,30,'Stadd Pro','95','Design structure elements as per the standard codes','2020-10-18 11:15:59',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (50,31,'Strength','83','Logistics management and supply management and materials management ','2020-10-19 15:44:11',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (51,32,'DCA','90','Diplomo Computer Applicant ','2020-10-19 18:29:40',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (52,32,'MSO','95','Microsoft office and power point','2020-10-19 18:31:20',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (53,32,'MS-Excel','95','Microsoft Excel','2020-10-19 18:33:56',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (56,33,'DCA','89','Diplomo Computer Applicant ','2020-10-20 09:27:13',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (57,34,'Computer knowledge ','75','Writing, drawing,computerknowledge PPT, Ms  word, typing ','2020-10-28 15:05:34',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (58,39,'EIRP testing ','88','','2020-11-15 10:39:26',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (59,39,'Coverage testing ','89','','2020-11-15 10:40:09',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (60,39,'Functionality testing ','85','','2020-11-15 10:40:53',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (61,41,'Positive thinking to growth ','99','','2020-11-21 21:59:30',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (63,41,'Self confident ','100','','2020-11-21 22:05:39',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (64,41,'Good planning ','98','','2020-11-21 22:06:09',0);
insert  into `_tbl_resume_skills`(`SkillsID`,`ResumeID`,`Title`,`SkillsRange`,`Description`,`CreatedOn`,`IsDelete`) values (65,41,'Team work ','99','','2020-11-21 22:06:37',0);

/*Table structure for table `resume_card_visitor_log` */

DROP TABLE IF EXISTS `resume_card_visitor_log`;

CREATE TABLE `resume_card_visitor_log` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `viewed` int(11) DEFAULT '0',
  `ipaddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ViewedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `resume_card_visitor_log` */

insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (1,1,1,'122.183.170.124','2020-09-23 16:14:58');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (2,1,1,'106.217.23.171','2020-09-23 18:13:21');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (3,1,1,'117.251.52.221','2020-09-23 18:19:27');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (4,1,1,'122.174.184.64','2020-09-24 10:06:34');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (5,1,1,'122.174.190.186','2020-09-24 12:14:40');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (6,2,1,'122.174.190.186','2020-09-24 12:15:02');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (7,4,1,'117.251.42.144','2020-09-24 12:21:24');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (8,5,1,'117.251.42.144','2020-09-24 12:39:43');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (9,6,1,'122.174.190.186','2020-09-24 12:43:29');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (10,5,1,'122.174.190.186','2020-09-24 12:43:35');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (11,4,1,'122.174.190.186','2020-09-24 12:43:39');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (12,3,1,'122.174.190.186','2020-09-24 12:43:42');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (13,5,1,'45.121.91.169','2020-09-24 13:22:31');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (14,2,1,'106.217.23.171','2020-09-24 13:57:00');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (15,3,1,'106.217.23.171','2020-09-24 13:57:05');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (16,4,1,'106.217.23.171','2020-09-24 13:57:11');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (17,5,1,'106.217.23.171','2020-09-24 13:57:15');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (18,5,1,'223.181.224.120','2020-09-24 16:08:44');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (19,5,1,'42.109.144.221','2020-09-24 16:13:17');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (20,5,1,'157.50.68.64','2020-09-24 22:00:18');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (21,7,1,'117.251.42.144','2020-09-24 22:01:54');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (22,7,1,'106.217.1.61','2020-09-24 22:02:30');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (23,7,1,'106.66.191.21','2020-09-24 22:04:12');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (24,7,1,'106.211.213.189','2020-09-24 22:05:36');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (25,7,1,'117.207.70.142','2020-09-25 06:22:24');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (26,7,1,'106.197.179.192','2020-09-25 07:00:59');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (27,7,1,'157.46.69.14','2020-09-25 07:09:32');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (28,7,1,'122.178.17.42','2020-09-25 09:49:30');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (29,5,1,'42.109.131.99','2020-09-25 10:03:07');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (30,5,1,'66.220.149.18','2020-09-25 10:03:45');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (31,5,1,'106.198.30.182','2020-09-25 10:04:44');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (32,7,1,'171.61.234.7','2020-09-25 11:16:21');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (33,7,1,'106.197.181.120','2020-09-25 13:42:49');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (34,1,1,'171.61.231.25','2020-09-25 16:18:35');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (35,2,1,'171.61.231.25','2020-09-25 16:18:40');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (36,3,1,'171.61.231.25','2020-09-25 16:18:45');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (37,4,1,'171.61.231.25','2020-09-25 16:18:48');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (38,7,1,'223.181.214.239','2020-09-25 16:22:20');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (39,5,1,'171.61.231.25','2020-09-25 17:00:31');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (40,6,1,'171.61.231.25','2020-09-25 17:00:35');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (41,7,1,'171.61.231.25','2020-09-25 17:00:51');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (42,8,1,'117.207.70.142','2020-09-25 21:20:46');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (43,8,1,'157.49.223.125','2020-09-25 21:21:49');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (44,8,1,'157.50.66.114','2020-09-25 21:32:09');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (45,5,1,'173.252.87.25','2020-09-26 01:55:09');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (46,8,1,'157.49.193.251','2020-09-26 11:44:07');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (47,5,1,'117.207.73.255','2020-09-26 14:55:10');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (48,5,1,'42.111.129.116','2020-09-26 16:09:30');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (49,5,1,'66.220.149.27','2020-09-26 16:09:52');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (50,5,1,'66.220.149.7','2020-09-26 16:09:53');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (51,5,1,'106.198.113.253','2020-09-26 16:10:09');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (52,5,1,'106.217.30.110','2020-09-27 09:54:39');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (53,4,1,'106.217.30.110','2020-09-27 09:54:43');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (54,3,1,'106.217.30.110','2020-09-27 09:54:45');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (55,2,1,'106.217.30.110','2020-09-27 09:54:48');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (56,1,1,'106.217.30.110','2020-09-27 09:54:53');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (57,2,1,'117.201.15.145','2020-09-27 10:07:06');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (58,2,1,'223.182.216.226','2020-09-27 16:31:50');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (59,5,1,'31.13.103.4','2020-09-27 18:16:20');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (60,5,1,'31.13.103.112','2020-09-27 18:16:22');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (61,5,1,'31.13.103.120','2020-09-27 18:17:10');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (62,2,1,'157.49.197.83','2020-09-28 11:30:42');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (63,2,1,'27.5.229.41','2020-09-28 12:00:36');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (64,5,1,'31.13.103.7','2020-09-29 15:14:59');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (65,8,1,'117.207.75.202','2020-09-29 19:09:37');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (66,8,1,'106.217.30.84','2020-09-29 19:16:16');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (67,7,1,'117.207.75.202','2020-09-29 21:38:23');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (68,7,1,'157.50.149.240','2020-09-29 22:03:51');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (69,5,1,'103.21.165.229','2020-09-29 22:25:54');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (70,7,1,'157.46.97.51','2020-09-30 00:24:26');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (71,2,1,'106.220.254.118','2020-10-03 01:08:04');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (72,2,1,'106.217.14.92','2020-10-11 12:08:56');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (73,2,1,'42.106.185.120','2020-10-11 12:21:33');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (74,7,1,'106.66.142.69','2020-10-11 15:22:00');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (75,7,1,'42.111.129.35','2020-10-11 15:24:14');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (76,7,1,'1.38.56.27','2020-10-11 15:28:12');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (77,7,1,'106.76.15.142','2020-10-11 15:41:13');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (78,7,1,'157.49.231.191','2020-10-11 15:52:44');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (79,7,1,'1.38.56.68','2020-10-11 15:53:02');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (80,7,1,'157.50.137.133','2020-10-11 15:53:22');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (81,7,1,'106.66.141.249','2020-10-11 16:09:34');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (82,2,1,'117.207.74.181','2020-10-11 16:20:57');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (83,7,1,'157.50.137.81','2020-10-11 19:38:17');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (84,2,1,'115.96.0.200','2020-10-11 22:26:58');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (85,2,1,'49.206.125.47','2020-10-12 15:36:14');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (86,2,1,'117.98.171.166','2020-10-12 19:01:27');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (87,2,1,'157.46.84.230','2020-10-13 13:57:12');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (88,2,1,'157.49.229.138','2020-10-15 17:18:39');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (89,2,1,'117.209.148.237','2020-10-16 10:12:38');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (90,2,1,'157.51.100.105','2020-10-17 08:28:56');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (91,2,1,'42.111.160.137','2020-10-17 09:01:59');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (92,7,1,'117.207.65.151','2020-10-18 09:58:14');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (93,2,1,'117.249.221.34','2020-10-19 14:42:23');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (94,2,1,'157.51.32.6','2020-10-19 18:02:07');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (95,2,1,'157.49.239.163','2020-10-27 19:52:00');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (96,7,1,'157.51.147.241','2020-10-28 16:35:15');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (97,2,1,'106.198.28.43','2020-10-28 23:14:57');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (98,2,1,'122.167.143.138','2020-10-29 16:47:43');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (99,2,1,'185.213.155.169','2020-11-08 23:05:06');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (100,8,1,'185.220.102.250','2020-11-08 23:11:48');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (101,2,1,'192.248.178.82','2020-12-06 17:26:47');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (102,2,1,'24.133.126.196','2020-12-09 01:11:00');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (103,2,1,'66.249.79.3','2020-12-24 08:12:34');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (104,2,1,'66.249.79.7','2021-01-27 21:34:23');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (105,9,1,'106.195.36.178','2021-01-30 18:18:45');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (106,2,1,'106.195.45.97','2021-01-30 22:46:39');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (107,2,1,'66.249.79.5','2021-02-01 02:04:06');
insert  into `resume_card_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (108,2,1,'66.249.79.9','2021-02-15 09:00:12');

/*Table structure for table `resume_visitor_log` */

DROP TABLE IF EXISTS `resume_visitor_log`;

CREATE TABLE `resume_visitor_log` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `ResumeID` int(11) DEFAULT '0',
  `viewed` int(11) DEFAULT '0',
  `ipaddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ViewedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB AUTO_INCREMENT=319 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `resume_visitor_log` */

insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (1,1,1,'122.183.170.124','2020-09-23 16:14:30');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (2,1,1,'106.217.23.171','2020-09-23 18:13:16');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (3,1,1,'117.251.52.221','2020-09-23 18:18:51');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (4,4,1,'117.251.52.221','2020-09-23 21:33:10');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (5,1,1,'122.174.184.64','2020-09-24 09:25:10');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (6,1,1,'122.164.90.108','2020-09-24 15:32:33');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (7,7,1,'117.251.42.144','2020-09-24 18:17:31');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (8,7,1,'117.207.70.142','2020-09-25 11:20:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (9,8,1,'117.207.70.142','2020-09-25 11:31:19');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (10,8,1,'171.61.234.7','2020-09-25 11:35:31');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (11,8,1,'106.217.30.110','2020-09-25 12:09:36');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (12,10,1,'106.217.30.110','2020-09-25 12:16:34');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (13,10,1,'171.61.231.25','2020-09-25 12:47:57');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (14,10,1,'117.207.70.142','2020-09-25 13:32:51');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (15,10,1,'223.181.214.239','2020-09-25 16:21:53');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (16,9,1,'171.61.231.25','2020-09-25 17:01:07');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (17,10,1,'157.46.99.142','2020-09-25 18:29:09');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (18,10,1,'117.207.73.255','2020-09-26 15:08:44');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (19,10,1,'106.198.33.234','2020-09-26 15:09:00');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (20,11,1,'117.207.73.255','2020-09-26 15:50:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (21,11,1,'157.49.251.40','2020-09-26 16:45:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (22,11,1,'157.46.91.117','2020-09-26 20:43:29');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (23,10,1,'117.201.15.145','2020-09-27 07:59:14');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (24,13,1,'117.201.15.145','2020-09-27 08:34:02');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (25,14,1,'117.201.15.145','2020-09-27 09:43:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (26,10,1,'223.182.216.226','2020-09-27 16:30:22');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (27,15,1,'117.243.18.202','2020-09-27 18:45:54');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (28,15,1,'117.201.15.145','2020-09-27 19:17:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (29,15,1,'117.202.242.222','2020-09-27 20:02:39');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (30,16,1,'117.201.15.145','2020-09-27 22:16:01');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (31,16,1,'157.49.253.6','2020-09-27 23:10:56');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (32,17,1,'157.49.253.6','2020-09-28 07:37:37');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (33,18,1,'157.49.223.42','2020-09-28 10:05:42');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (34,18,1,'59.99.187.165','2020-09-28 10:05:56');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (35,10,1,'157.49.197.83','2020-09-28 11:30:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (36,10,1,'27.5.229.41','2020-09-28 11:59:53');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (37,15,1,'117.209.168.117','2020-09-28 13:18:08');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (38,10,1,'42.106.178.32','2020-09-28 13:37:05');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (39,20,1,'117.243.27.9','2020-09-28 18:37:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (40,20,1,'59.99.187.165','2020-09-28 18:43:55');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (41,14,1,'59.99.187.165','2020-09-28 19:03:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (42,14,1,'1.39.150.41','2020-09-28 19:12:22');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (43,14,1,'106.203.49.213','2020-09-28 20:53:29');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (44,13,1,'117.207.75.202','2020-09-29 14:09:53');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (45,14,1,'117.207.75.202','2020-09-29 14:10:24');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (46,14,1,'157.46.127.247','2020-09-29 14:10:56');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (47,21,1,'157.50.127.21','2020-09-29 18:23:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (48,21,1,'117.207.75.202','2020-09-29 18:24:23');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (49,14,1,'157.46.114.197','2020-09-29 20:12:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (50,14,1,'106.203.51.181','2020-09-29 20:24:05');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (51,14,1,'1.39.131.158','2020-09-29 20:33:51');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (52,14,1,'223.182.209.249','2020-09-29 20:34:44');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (53,14,1,'157.49.194.211','2020-09-29 20:37:11');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (54,14,1,'157.50.159.76','2020-09-29 20:48:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (55,14,1,'157.46.97.51','2020-09-29 20:49:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (56,14,1,'157.50.149.240','2020-09-29 22:06:34');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (57,14,1,'157.46.110.225','2020-09-29 22:46:00');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (58,14,1,'157.46.114.246','2020-09-30 09:57:44');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (59,14,1,'106.211.209.179','2020-09-30 10:10:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (60,14,1,'223.182.242.205','2020-09-30 10:10:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (61,14,1,'106.222.120.113','2020-09-30 10:14:43');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (62,14,1,'49.206.124.116','2020-09-30 11:03:23');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (63,14,1,'117.201.11.102','2020-09-30 15:33:34');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (64,14,1,'223.228.180.176','2020-09-30 15:35:48');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (65,14,1,'157.46.103.121','2020-09-30 21:11:54');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (66,14,1,'157.46.79.182','2020-10-01 16:36:54');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (67,10,1,'106.220.254.118','2020-10-03 01:07:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (68,14,1,'157.50.28.31','2020-10-04 10:00:55');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (69,14,1,'1.38.56.17','2020-10-04 22:18:38');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (70,14,1,'92.99.144.161','2020-10-04 22:19:11');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (71,14,1,'157.46.74.131','2020-10-04 22:22:38');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (72,14,1,'157.50.69.140','2020-10-07 19:26:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (73,14,1,'157.49.211.217','2020-10-07 19:26:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (74,14,1,'157.49.194.157','2020-10-07 19:26:19');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (75,14,1,'192.241.202.80','2020-10-07 19:28:17');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (76,14,1,'157.49.237.156','2020-10-07 19:35:29');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (77,14,1,'157.46.94.246','2020-10-07 19:43:15');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (78,14,1,'106.213.222.108','2020-10-07 19:43:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (79,14,1,'157.50.176.12','2020-10-07 19:47:18');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (80,14,1,'47.29.167.220','2020-10-07 20:56:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (81,14,1,'117.209.178.221','2020-10-08 13:01:10');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (82,14,1,'157.44.58.243','2020-10-09 07:32:57');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (83,10,1,'106.198.4.185','2020-10-09 17:47:23');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (84,10,1,'42.106.84.144','2020-10-10 20:29:25');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (85,10,1,'103.98.63.188','2020-10-11 12:07:25');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (86,10,1,'115.96.0.200','2020-10-11 22:27:33');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (87,10,1,'49.206.125.47','2020-10-12 15:34:51');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (88,10,1,'117.207.75.179','2020-10-12 15:36:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (89,10,1,'117.98.171.166','2020-10-12 19:01:55');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (90,10,1,'157.46.84.230','2020-10-13 13:56:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (91,23,1,'106.66.163.102','2020-10-14 13:55:35');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (92,23,1,'106.66.175.211','2020-10-14 13:56:43');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (93,10,1,'106.66.132.20','2020-10-14 14:53:22');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (94,23,1,'106.66.134.31','2020-10-14 16:41:14');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (95,23,1,'106.66.191.162','2020-10-14 18:01:41');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (96,23,1,'59.99.187.9','2020-10-14 18:15:11');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (97,24,1,'27.97.193.166','2020-10-14 22:30:57');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (98,24,1,'59.99.187.9','2020-10-14 22:34:08');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (99,10,1,'157.49.229.138','2020-10-15 17:19:15');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (100,25,1,'157.49.229.138','2020-10-15 18:28:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (101,10,1,'117.246.186.55','2020-10-15 18:36:38');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (102,25,1,'117.201.13.167','2020-10-15 18:38:08');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (103,10,1,'157.51.116.10','2020-10-16 00:34:52');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (104,25,1,'157.46.74.12','2020-10-16 12:50:55');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (105,10,1,'157.46.74.12','2020-10-16 12:51:02');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (106,26,1,'106.66.171.78','2020-10-16 13:46:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (107,25,1,'157.46.90.124','2020-10-16 14:29:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (108,27,1,'157.46.75.208','2020-10-16 14:30:03');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (109,27,1,'157.51.168.84','2020-10-16 14:30:48');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (110,27,1,'59.99.134.45','2020-10-16 15:06:14');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (111,10,1,'27.5.201.135','2020-10-16 15:34:43');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (112,27,1,'106.220.253.60','2020-10-16 17:07:24');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (113,27,1,'27.97.201.86','2020-10-16 17:07:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (114,27,1,'27.97.193.243','2020-10-16 17:08:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (115,23,1,'27.97.201.86','2020-10-16 17:08:55');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (116,28,1,'27.97.200.187','2020-10-16 17:27:57');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (117,10,1,'157.51.100.105','2020-10-17 08:26:56');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (118,10,1,'42.111.160.137','2020-10-17 08:59:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (119,10,1,'157.49.248.237','2020-10-17 10:51:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (120,10,1,'157.46.114.124','2020-10-17 13:13:12');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (121,10,1,'157.51.184.131','2020-10-17 16:10:07');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (122,10,1,'106.66.175.248','2020-10-17 16:44:09');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (123,13,1,'117.207.65.151','2020-10-18 09:58:05');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (124,14,1,'117.207.65.151','2020-10-18 09:58:18');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (125,14,1,'106.211.229.121','2020-10-18 10:00:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (126,10,1,'106.211.229.121','2020-10-18 10:55:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (127,30,1,'106.211.229.121','2020-10-18 11:22:07');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (128,30,1,'117.207.65.151','2020-10-18 11:27:28');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (129,14,1,'157.44.214.18','2020-10-18 15:22:23');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (130,14,1,'157.46.81.206','2020-10-18 17:55:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (131,14,1,'106.197.167.112','2020-10-18 17:56:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (132,14,1,'106.197.149.220','2020-10-18 18:05:34');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (133,14,1,'117.207.72.148','2020-10-19 11:38:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (134,14,1,'106.198.36.200','2020-10-19 11:39:18');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (135,14,1,'157.51.113.25','2020-10-19 12:44:30');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (136,14,1,'223.182.213.237','2020-10-19 13:17:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (137,14,1,'117.249.221.34','2020-10-19 14:37:11');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (138,10,1,'117.249.221.34','2020-10-19 14:43:24');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (139,14,1,'157.51.141.252','2020-10-19 14:44:59');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (140,31,1,'106.198.44.124','2020-10-19 15:45:54');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (141,31,1,'117.207.72.148','2020-10-19 15:47:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (142,10,1,'106.198.76.21','2020-10-19 16:50:28');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (143,14,1,'106.198.76.21','2020-10-19 17:00:00');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (144,10,1,'157.51.32.6','2020-10-19 18:01:24');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (145,14,1,'106.206.15.172','2020-10-19 18:57:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (146,14,1,'117.249.180.226','2020-10-19 19:18:35');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (147,14,1,'157.46.108.95','2020-10-19 19:22:10');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (148,14,1,'106.198.48.236','2020-10-19 19:34:46');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (149,14,1,'157.51.98.31','2020-10-19 19:55:23');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (150,32,1,'106.203.7.205','2020-10-19 20:09:44');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (151,32,1,'117.207.72.148','2020-10-19 20:10:42');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (152,14,1,'106.203.48.219','2020-10-19 20:35:25');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (153,33,1,'106.203.1.205','2020-10-20 09:48:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (154,14,1,'106.220.253.36','2020-10-20 10:59:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (155,14,1,'157.46.89.37','2020-10-20 11:19:58');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (156,14,1,'106.198.16.235','2020-10-20 14:23:19');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (157,14,1,'106.206.21.102','2020-10-20 14:29:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (158,14,1,'106.222.117.68','2020-10-20 16:07:49');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (159,14,1,'157.51.184.28','2020-10-20 16:11:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (160,14,1,'49.205.143.194','2020-10-20 16:12:39');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (161,14,1,'106.211.223.195','2020-10-20 21:37:39');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (162,14,1,'157.46.108.216','2020-10-21 07:10:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (163,14,1,'175.100.7.146','2020-10-21 09:19:15');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (164,10,1,'175.100.7.146','2020-10-21 09:23:07');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (165,14,1,'157.49.232.103','2020-10-21 09:36:49');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (166,14,1,'157.49.225.221','2020-10-21 12:30:45');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (167,14,1,'223.228.167.197','2020-10-21 16:26:10');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (168,14,1,'182.65.155.217','2020-10-21 17:20:09');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (169,14,1,'157.51.87.245','2020-10-21 20:10:25');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (170,10,1,'157.51.87.245','2020-10-21 20:13:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (171,14,1,'171.76.43.79','2020-10-22 08:35:24');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (172,14,1,'106.220.253.62','2020-10-22 16:59:29');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (173,14,1,'157.51.23.119','2020-10-22 17:01:50');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (174,14,1,'223.182.201.51','2020-10-22 17:02:26');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (175,10,1,'223.182.201.51','2020-10-22 17:04:21');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (176,14,1,'157.49.241.164','2020-10-22 17:12:22');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (177,14,1,'157.49.239.23','2020-10-23 13:23:37');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (178,14,1,'157.51.169.34','2020-10-23 15:57:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (179,14,1,'117.207.68.24','2020-10-23 16:13:55');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (180,14,1,'157.49.196.220','2020-10-23 16:15:36');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (181,14,1,'157.49.251.234','2020-10-23 17:51:37');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (182,14,1,'106.222.123.49','2020-10-24 14:14:44');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (183,14,1,'157.46.80.52','2020-10-24 14:28:16');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (184,14,1,'157.46.125.170','2020-10-24 14:28:31');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (185,14,1,'42.106.186.70','2020-10-24 14:46:05');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (186,14,1,'106.220.255.109','2020-10-24 14:47:54');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (187,14,1,'117.251.44.63','2020-10-24 14:49:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (188,14,1,'106.198.26.104','2020-10-24 19:06:33');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (189,14,1,'157.51.151.55','2020-10-24 19:16:33');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (190,14,1,'157.51.93.37','2020-10-24 20:10:42');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (191,14,1,'117.251.238.2','2020-10-24 20:28:55');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (192,14,1,'157.51.140.187','2020-10-24 20:50:52');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (193,14,1,'157.51.167.47','2020-10-24 20:55:16');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (194,14,1,'42.106.184.196','2020-10-24 21:11:51');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (195,14,1,'106.220.255.115','2020-10-24 21:57:18');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (196,14,1,'27.62.10.202','2020-10-25 15:43:15');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (197,14,1,'27.62.50.104','2020-10-25 19:16:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (198,14,1,'157.49.227.59','2020-10-26 10:04:11');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (199,14,1,'106.198.40.209','2020-10-26 12:04:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (200,14,1,'106.203.88.19','2020-10-26 12:24:09');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (201,14,1,'157.46.208.180','2020-10-26 18:06:17');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (202,14,1,'157.44.204.184','2020-10-27 09:50:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (203,14,1,'157.51.31.62','2020-10-27 10:08:37');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (204,14,1,'157.46.209.176','2020-10-27 12:26:53');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (205,14,1,'106.197.165.39','2020-10-27 19:06:48');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (206,10,1,'106.197.165.39','2020-10-27 19:15:59');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (207,14,1,'157.49.239.163','2020-10-27 19:49:38');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (208,10,1,'157.49.239.163','2020-10-27 19:51:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (209,14,1,'157.49.201.177','2020-10-27 19:56:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (210,14,1,'157.51.170.239','2020-10-27 20:13:50');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (211,14,1,'1.38.56.19','2020-10-27 20:34:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (212,14,1,'106.198.106.31','2020-10-27 20:35:39');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (213,14,1,'223.182.208.109','2020-10-27 20:36:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (214,14,1,'157.51.12.194','2020-10-28 15:10:21');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (215,14,1,'117.249.224.27','2020-10-28 16:06:41');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (216,34,1,'157.51.181.124','2020-10-28 17:22:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (217,34,1,'117.207.65.240','2020-10-28 17:27:14');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (218,14,1,'106.197.38.232','2020-10-28 23:08:25');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (219,14,1,'117.246.204.16','2020-10-28 23:11:34');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (220,10,1,'106.198.28.43','2020-10-28 23:14:40');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (221,14,1,'106.198.28.43','2020-10-28 23:15:22');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (222,14,1,'157.51.13.70','2020-10-28 23:29:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (223,14,1,'27.62.137.197','2020-10-29 03:38:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (224,14,1,'157.46.139.27','2020-10-29 07:51:16');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (225,14,1,'157.51.142.156','2020-10-29 11:01:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (226,35,1,'54.36.114.154','2020-10-29 13:03:56');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (227,14,1,'157.49.223.220','2020-10-29 15:38:08');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (228,14,1,'42.106.177.191','2020-10-29 16:16:50');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (229,10,1,'122.167.143.138','2020-10-29 16:32:24');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (230,35,1,'117.207.75.129','2020-10-29 19:26:38');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (231,14,1,'157.51.3.36','2020-10-29 19:57:18');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (232,14,1,'157.49.245.8','2020-10-29 20:17:49');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (233,14,1,'157.49.218.238','2020-10-30 08:38:08');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (234,14,1,'157.46.69.98','2020-10-30 11:44:22');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (235,14,1,'157.51.144.217','2020-10-30 16:54:50');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (236,14,1,'157.51.146.152','2020-10-31 10:41:25');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (237,14,1,'157.51.144.238','2020-10-31 10:46:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (238,14,1,'157.46.187.247','2020-10-31 18:12:23');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (239,14,1,'106.198.111.106','2020-11-01 12:18:34');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (240,14,1,'157.49.203.20','2020-11-01 13:14:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (241,14,1,'84.16.240.210','2020-11-01 18:17:25');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (242,14,1,'106.197.46.195','2020-11-01 20:26:50');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (243,14,1,'42.106.185.175','2020-11-04 14:39:02');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (244,14,1,'106.66.163.158','2020-11-04 20:10:19');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (245,14,1,'27.97.193.219','2020-11-04 20:10:43');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (246,14,1,'51.15.203.220','2020-11-05 00:19:43');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (247,14,1,'149.202.179.137','2020-11-06 01:06:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (248,14,1,'59.92.187.118','2020-11-06 06:46:50');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (249,14,1,'42.106.176.52','2020-11-06 06:55:59');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (250,14,1,'157.51.25.7','2020-11-06 06:56:13');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (251,14,1,'157.46.105.51','2020-11-06 06:59:30');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (252,14,1,'223.181.206.219','2020-11-06 07:15:38');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (253,14,1,'157.46.96.150','2020-11-06 07:47:34');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (254,10,1,'157.46.96.150','2020-11-06 07:50:49');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (255,14,1,'49.205.58.11','2020-11-06 08:23:08');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (256,14,1,'106.216.129.176','2020-11-06 09:12:29');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (257,14,1,'157.49.213.97','2020-11-06 10:51:43');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (258,14,1,'157.49.198.116','2020-11-06 10:55:35');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (259,14,1,'223.181.206.200','2020-11-06 11:02:07');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (260,14,1,'157.46.74.91','2020-11-06 12:45:06');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (261,14,1,'223.181.217.244','2020-11-06 13:13:57');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (262,14,1,'42.111.136.67','2020-11-06 13:21:17');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (263,14,1,'157.51.63.34','2020-11-06 14:19:36');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (264,14,1,'106.198.29.146','2020-11-06 20:09:01');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (265,14,1,'223.182.209.245','2020-11-06 21:17:36');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (266,14,1,'157.51.85.198','2020-11-06 21:27:39');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (267,14,1,'195.181.161.181','2020-11-07 01:37:49');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (268,14,1,'190.2.153.75','2020-11-08 01:07:50');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (269,14,1,'157.51.53.125','2020-11-08 11:29:08');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (270,10,1,'185.220.102.250','2020-11-08 23:05:18');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (271,34,1,'185.220.102.250','2020-11-08 23:09:58');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (272,32,1,'185.220.102.250','2020-11-08 23:10:26');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (273,14,1,'61.14.228.146','2020-11-09 14:14:14');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (274,14,1,'157.51.154.77','2020-11-11 12:20:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (275,36,1,'157.51.171.126','2020-11-11 22:00:26');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (276,36,1,'117.207.71.230','2020-11-11 22:00:53');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (277,36,1,'106.203.69.152','2020-11-11 22:21:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (278,36,1,'157.51.38.244','2020-11-12 07:28:42');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (279,36,1,'157.51.82.172','2020-11-12 09:52:42');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (280,37,1,'157.49.239.95','2020-11-12 20:26:04');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (281,36,1,'157.49.228.14','2020-11-13 12:51:41');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (282,39,1,'157.51.77.192','2020-11-15 10:41:38');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (283,36,1,'157.51.71.195','2020-11-15 11:35:24');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (284,36,1,'171.76.33.126','2020-11-15 11:36:11');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (285,36,1,'27.62.123.20','2020-11-15 21:11:27');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (286,40,1,'51.158.191.186','2020-11-16 14:15:48');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (287,40,1,'117.207.71.127','2020-11-16 14:17:51');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (288,14,1,'103.92.42.103','2020-11-16 17:15:11');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (289,14,1,'157.51.146.57','2020-11-18 18:56:34');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (290,14,1,'157.46.76.224','2020-11-19 13:20:31');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (291,41,1,'157.49.245.64','2020-11-21 22:08:41');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (292,36,1,'157.49.245.64','2020-11-21 22:12:32');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (293,36,1,'106.203.93.89','2020-11-21 22:12:59');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (294,41,1,'223.228.184.236','2020-11-21 23:56:05');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (295,41,1,'223.228.157.97','2020-11-22 11:02:46');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (296,41,1,'106.203.125.2','2020-11-22 22:00:59');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (297,36,1,'157.49.192.205','2020-11-23 20:15:10');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (298,41,1,'223.228.130.12','2020-11-25 23:55:23');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (299,14,1,'157.51.31.116','2020-12-04 22:32:29');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (300,36,1,'157.46.104.227','2020-12-05 15:19:48');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (301,10,1,'192.248.178.82','2020-12-06 17:26:47');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (302,10,1,'66.249.79.3','2020-12-23 01:38:43');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (303,41,1,'106.208.104.156','2020-12-31 08:01:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (304,41,1,'106.208.82.57','2021-01-14 09:21:33');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (305,10,1,'66.249.73.107','2021-01-18 19:10:19');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (306,41,1,'117.246.168.55','2021-01-24 15:12:14');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (307,41,1,'117.246.139.29','2021-01-24 19:13:24');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (308,10,1,'66.249.79.226','2021-01-29 01:03:02');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (309,10,1,'106.217.15.198','2021-01-29 17:03:46');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (310,41,1,'27.62.34.174','2021-01-30 07:08:25');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (311,14,1,'106.195.36.178','2021-01-30 18:12:36');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (312,41,1,'27.62.0.85','2021-01-31 07:35:20');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (313,41,1,'117.249.210.243','2021-02-03 12:23:44');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (314,10,1,'117.193.136.171','2021-02-03 12:30:07');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (315,14,1,'42.111.164.59','2021-02-06 16:17:43');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (316,41,1,'117.209.250.246','2021-02-13 18:59:52');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (317,41,1,'117.246.141.60','2021-02-19 14:30:38');
insert  into `resume_visitor_log`(`LogID`,`ResumeID`,`viewed`,`ipaddress`,`ViewedOn`) values (318,41,1,'117.209.229.152','2021-02-19 17:16:08');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
