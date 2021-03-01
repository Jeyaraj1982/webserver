/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.7.33 : Database - rhole_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rhole_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rhole_database`;

/*Table structure for table `_JModels` */

DROP TABLE IF EXISTS `_JModels`;

CREATE TABLE `_JModels` (
  `ModelID` int(11) NOT NULL AUTO_INCREMENT,
  `categid` int(11) DEFAULT NULL,
  `subcateid` int(11) DEFAULT NULL,
  `brandid` int(11) DEFAULT '0',
  `model` varchar(255) DEFAULT NULL,
  `isactive` int(11) DEFAULT '1',
  `iscustom` int(11) DEFAULT '0',
  PRIMARY KEY (`ModelID`)
) ENGINE=InnoDB AUTO_INCREMENT=985 DEFAULT CHARSET=utf8;

/*Data for the table `_JModels` */

insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (1,NULL,NULL,3,'Baleno Rs',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (2,NULL,NULL,3,'Celerio X',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (3,NULL,NULL,3,'Ciaz S',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (4,NULL,NULL,3,'S Cross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (5,NULL,NULL,3,'S-PressO',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (6,NULL,NULL,3,'Swift Dzire Tour',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (7,NULL,NULL,3,'1000',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (8,NULL,NULL,3,'800',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (9,NULL,NULL,3,'A-Star',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (10,NULL,NULL,3,'Alto',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (11,NULL,NULL,3,'Alto 800',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (12,NULL,NULL,3,'Alto K10',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (13,NULL,NULL,3,'Baleno',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (14,NULL,NULL,3,'Celerio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (15,NULL,NULL,3,'Ciaz',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (16,NULL,NULL,3,'Eeco',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (17,NULL,NULL,3,'Ertiga',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (18,NULL,NULL,3,'Esteem',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (19,NULL,NULL,3,'Estilo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (20,NULL,NULL,3,'Grand Vitara',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (21,NULL,NULL,3,'Gypsy',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (22,NULL,NULL,3,'Kizashi',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (23,NULL,NULL,3,'Omni',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (24,NULL,NULL,3,'Ritz',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (25,NULL,NULL,3,'S-Cross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (26,NULL,NULL,3,'S-Presso (Future S)',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (27,NULL,NULL,3,'Stingray',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (28,NULL,NULL,3,'Swift',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (29,NULL,NULL,3,'Swift Dzire',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (30,NULL,NULL,3,'SX4',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (31,NULL,NULL,3,'Versa',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (32,NULL,NULL,3,'Vitara Brezza',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (33,NULL,NULL,3,'Wagon RR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (34,NULL,NULL,3,'Wagon R 1.0',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (35,NULL,NULL,3,'Wagon Duo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (36,NULL,NULL,3,'Wagon R Electric',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (37,NULL,NULL,3,'Wagon R Stingray',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (38,NULL,NULL,3,'XL6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (39,NULL,NULL,3,'Zen',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (40,NULL,NULL,3,'Zen Estilo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (41,NULL,NULL,3,'S. cross petrol',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (42,NULL,NULL,3,'Futuro-E',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (43,NULL,NULL,3,'Wagon R EV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (44,NULL,NULL,3,'Jimny',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (45,NULL,NULL,3,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (46,NULL,NULL,79,'Avenger',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (47,NULL,NULL,79,'CT 100',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (48,NULL,NULL,79,'Discover',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (49,NULL,NULL,79,'Platina',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (50,NULL,NULL,79,'Pulsar',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (51,NULL,NULL,79,'Dominar 400',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (52,NULL,NULL,79,'Avenger street 160',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (53,NULL,NULL,79,'Chetak',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (54,NULL,NULL,79,'Dominar 250',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (55,NULL,NULL,79,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (56,NULL,NULL,80,'Achiever',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (57,NULL,NULL,80,'Ambition',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (58,NULL,NULL,80,'CBZ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (59,NULL,NULL,80,'CD 100',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (60,NULL,NULL,80,'CD Dawn',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (61,NULL,NULL,80,'CD Deluxe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (62,NULL,NULL,80,'Dawn',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (63,NULL,NULL,80,'Deluxe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (64,NULL,NULL,80,'Glamour',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (65,NULL,NULL,80,'Hunk',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (66,NULL,NULL,80,'HX 250 R',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (67,NULL,NULL,80,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (68,NULL,NULL,81,'Achiever',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (69,NULL,NULL,81,'Ambition',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (70,NULL,NULL,81,'CD 100',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (71,NULL,NULL,81,'CD Dawn',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (72,NULL,NULL,81,'CD Deluxe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (73,NULL,NULL,81,'Dawn',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (74,NULL,NULL,81,'Deluxe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (75,NULL,NULL,81,'Glamour',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (76,NULL,NULL,81,'Hunk',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (77,NULL,NULL,81,'HX 250 R',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (78,NULL,NULL,81,'gnitor',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (79,NULL,NULL,81,'Impulse',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (80,NULL,NULL,81,'Joy',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (81,NULL,NULL,81,'Karizma',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (82,NULL,NULL,81,'Passion',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (83,NULL,NULL,81,'Sleek',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (84,NULL,NULL,81,'Splendor',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (85,NULL,NULL,81,'SUPER Splendor',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (86,NULL,NULL,81,'Passion pro i3S',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (87,NULL,NULL,81,'Xtreme 160 R',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (88,NULL,NULL,81,'HF Deluxe i3S',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (89,NULL,NULL,81,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (90,NULL,NULL,82,'CB',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (91,NULL,NULL,82,'CBF Stunner',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (92,NULL,NULL,82,'CBR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (93,NULL,NULL,82,'CD 110 Dream',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (94,NULL,NULL,82,'Dream Yuga',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (95,NULL,NULL,82,'Goldwing GL 1800',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (96,NULL,NULL,82,'VFR 1200F',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (97,NULL,NULL,83,'390 Duke ABS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (98,NULL,NULL,83,'Duke 200',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (99,NULL,NULL,83,'RC',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (100,NULL,NULL,83,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (101,NULL,NULL,84,'Bullet',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (102,NULL,NULL,84,'Classic',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (103,NULL,NULL,84,'Continental GT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (104,NULL,NULL,84,'Thunderbird',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (105,NULL,NULL,84,'Himalayan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (106,NULL,NULL,84,'Continental GT 650',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (107,NULL,NULL,84,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (108,NULL,NULL,85,'Bandit',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (109,NULL,NULL,85,'Gixxer',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (110,NULL,NULL,85,'GS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (111,NULL,NULL,85,'GSX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (112,NULL,NULL,85,'Hayabusa',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (113,NULL,NULL,85,'Hayate',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (114,NULL,NULL,85,'Inazuma',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (115,NULL,NULL,85,'M1800 R',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (116,NULL,NULL,85,'M800',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (117,NULL,NULL,85,'Slingshot',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (119,NULL,NULL,85,'Gixxer 250',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (120,NULL,NULL,85,'Gixxer SF 250',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (121,NULL,NULL,85,'Intruder',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (122,NULL,NULL,85,'Burgman street',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (123,NULL,NULL,85,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (124,NULL,NULL,86,'Apache RTR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (125,NULL,NULL,86,'Heavy Duty Super XL',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (126,NULL,NULL,86,'Phoenix',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (127,NULL,NULL,86,'Star City Plus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (128,NULL,NULL,86,'Star Sport',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (130,NULL,NULL,86,'Apache RR310',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (131,NULL,NULL,87,'Crux',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (132,NULL,NULL,87,'Fazer',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (133,NULL,NULL,87,'FZ\r\n',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (134,NULL,NULL,87,'FZS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (135,NULL,NULL,87,'Saluto',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (136,NULL,NULL,87,'SS 125',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (137,NULL,NULL,87,'SZ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (138,NULL,NULL,87,'Vmax',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (139,NULL,NULL,87,'YBR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (140,NULL,NULL,87,'YZFR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (141,NULL,NULL,87,'Fascino 125',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (142,NULL,NULL,87,'FZS-F1 V3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (143,NULL,NULL,87,'MT 15',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (144,NULL,NULL,87,'YZF R 15 V3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (145,NULL,NULL,87,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (148,NULL,NULL,85,'Access',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (149,NULL,NULL,85,'Lets',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (151,NULL,NULL,89,'Centuro',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (152,NULL,NULL,89,'Mojo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (153,NULL,NULL,89,'Centuro Rockstar',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (154,NULL,NULL,89,'Mojo 300 ABS BS6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (155,NULL,NULL,89,'Mojo UT300',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (156,NULL,NULL,89,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (157,NULL,NULL,88,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (158,NULL,NULL,86,'Apache RTR 180',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (159,NULL,NULL,86,'Apache RTR 200 4V',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (160,NULL,NULL,86,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (161,NULL,NULL,82,'VT 1300 CX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (162,NULL,NULL,82,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (163,NULL,NULL,4,'Avante',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (164,NULL,NULL,4,'Grand i10 Nios',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (165,NULL,NULL,4,'Kona Electric',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (166,NULL,NULL,4,'Small Car',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (167,NULL,NULL,4,'Accent',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (168,NULL,NULL,4,'Accent Viva',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (169,NULL,NULL,4,'Carlino',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (170,NULL,NULL,4,'Creta',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (171,NULL,NULL,4,'Elantra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (172,NULL,NULL,4,'Elite i20',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (173,NULL,NULL,4,'EON',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (174,NULL,NULL,4,'Fluidic Verna',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (175,NULL,NULL,4,'Getz',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (176,NULL,NULL,4,'Getz Prime',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (177,NULL,NULL,4,'Grand I 10',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (178,NULL,NULL,4,'Grand i10',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (179,NULL,NULL,4,'i10',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (180,NULL,NULL,4,'i20 Active',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (181,NULL,NULL,4,'Kona',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (182,NULL,NULL,4,'NEW Elantra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (183,NULL,NULL,4,'Loniq',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (184,NULL,NULL,4,'Palisade',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (185,NULL,NULL,4,'QXI',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (186,NULL,NULL,4,'Santa Fe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (187,NULL,NULL,4,'Santro',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (188,NULL,NULL,4,'Santro Xing',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (189,NULL,NULL,4,'Sonata',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (190,NULL,NULL,4,'Sonata Embera',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (191,NULL,NULL,4,'Sonata Transform',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (192,NULL,NULL,4,'Terracan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (193,NULL,NULL,4,'Tucson',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (194,NULL,NULL,4,'Venue',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (195,NULL,NULL,4,'Verna',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (196,NULL,NULL,4,'Xcent',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (197,NULL,NULL,4,'Elite i20',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (198,NULL,NULL,4,'Creta seven-seater',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (199,NULL,NULL,4,'NEW Elandra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (200,NULL,NULL,4,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (201,NULL,NULL,89,'Mojo XT300',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (202,NULL,NULL,89,'Gusto',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (203,NULL,NULL,89,'Gusto 125',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (204,NULL,NULL,11,'H5X',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (205,NULL,NULL,11,'Spacio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (206,NULL,NULL,11,'Tiago JTP',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (207,NULL,NULL,11,'Tigor EV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (208,NULL,NULL,11,' Tigor JTP',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (209,NULL,NULL,11,'Altroz',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (210,NULL,NULL,11,'Altroz EV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (211,NULL,NULL,11,'Aria',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (212,NULL,NULL,11,'Bolt',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (213,NULL,NULL,11,'Buzzard',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (214,NULL,NULL,11,'Estate',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (215,NULL,NULL,11,'Evision Electric',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (216,NULL,NULL,11,'Grande Dicor',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (217,NULL,NULL,11,'H2X',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (218,NULL,NULL,11,'H7X',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (219,NULL,NULL,11,'Harrier',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (220,NULL,NULL,11,'Hexa',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (226,NULL,NULL,11,'Indica',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (227,NULL,NULL,11,'Indica E V2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (228,NULL,NULL,11,'Indica Ev2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (229,NULL,NULL,11,'Indica V2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (230,NULL,NULL,11,'Indica V2 Turbo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (231,NULL,NULL,11,'Indica V2 Xeta',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (232,NULL,NULL,11,'Indica Vista',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (233,NULL,NULL,11,'Indicab',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (234,NULL,NULL,11,'Indigo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (235,NULL,NULL,11,'Indigo CS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (236,NULL,NULL,11,'Indigo Ecs',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (237,NULL,NULL,11,'Indigo Marina',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (238,NULL,NULL,11,'Indigo XL',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (239,NULL,NULL,11,'Manza',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (240,NULL,NULL,11,'Movus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (241,NULL,NULL,11,'Nand',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (242,NULL,NULL,11,'Nano GenX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (243,NULL,NULL,11,'Nexon',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (244,NULL,NULL,11,'Nexon EV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (245,NULL,NULL,11,'Safari',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (246,NULL,NULL,11,'Safari Storme',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (247,NULL,NULL,11,'Sierra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (248,NULL,NULL,11,'Sumo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (249,NULL,NULL,11,'Sumo Gold',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (250,NULL,NULL,11,'Sumo Grande',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (251,NULL,NULL,11,'Sumo Grande MK II',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (252,NULL,NULL,11,'Sumo Spacio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (253,NULL,NULL,11,'Sumo Victa',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (254,NULL,NULL,11,'Tiago',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (255,NULL,NULL,11,'Tiago EV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (256,NULL,NULL,11,'Tiago NRG',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (257,NULL,NULL,11,'Tigor',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (258,NULL,NULL,11,'T',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (259,NULL,NULL,11,'Venture',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (260,NULL,NULL,11,'Vista',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (261,NULL,NULL,11,'Vista Tech',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (262,NULL,NULL,11,'Winger',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (263,NULL,NULL,11,'Xenon XTT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (264,NULL,NULL,11,'Zest',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (265,NULL,NULL,11,'HBX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (266,NULL,NULL,5,'Supro',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (267,NULL,NULL,5,'TUV 300 Plus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (268,NULL,NULL,5,'U321 MPV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (269,NULL,NULL,5,'Verito Vibe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (270,NULL,NULL,5,'Willys',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (271,NULL,NULL,5,'e20 plus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (272,NULL,NULL,5,'Alturas G4',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (273,NULL,NULL,5,'Armada',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (274,NULL,NULL,5,'Bolero',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (275,NULL,NULL,5,'e20',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (276,NULL,NULL,5,'eKUV100',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (277,NULL,NULL,5,'Bolero Pik-Up',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (278,NULL,NULL,5,'Bolero Power Plus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (279,NULL,NULL,5,'E Verito',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (280,NULL,NULL,5,'Inferno',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (281,NULL,NULL,5,'Ingenio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (282,NULL,NULL,5,'Jeep',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (283,NULL,NULL,5,'Logan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (284,NULL,NULL,5,'Marshal',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (285,NULL,NULL,5,'Rexton',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (286,NULL,NULL,5,'S 201',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (287,NULL,NULL,5,'Ssangyong Rexton',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (288,NULL,NULL,5,'KUV 100',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (289,NULL,NULL,5,'Marazzo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (290,NULL,NULL,5,'NuvoSport',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (291,NULL,NULL,5,'Quanto',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (292,NULL,NULL,5,'REVA',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (293,NULL,NULL,5,'Scorpio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (294,NULL,NULL,5,'Scorpio Getaway',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (295,NULL,NULL,5,'Thar',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (296,NULL,NULL,5,'TUV 300',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (297,NULL,NULL,5,'Verito',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (298,NULL,NULL,5,'Verito Vibe Cs',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (299,NULL,NULL,5,'Voyeger',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (300,NULL,NULL,5,'XUV Aero',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (301,NULL,NULL,5,'XUV300',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (302,NULL,NULL,5,'XUV300 Electric',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (303,NULL,NULL,5,'XUV500',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (304,NULL,NULL,5,'Xylo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (305,NULL,NULL,5,'E20 NEXT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (306,NULL,NULL,5,'NEW THAR BS6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (307,NULL,NULL,5,'TUV300 PLUS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (308,NULL,NULL,5,'FACELIFT BS6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (309,NULL,NULL,5,'NEW SCORPIO',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (310,NULL,NULL,5,'MARAZZO BS6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (311,NULL,NULL,5,'NEW XUV500',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (312,NULL,NULL,5,'NEW TUV300 BS6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (313,NULL,NULL,5,'EKUV100',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (314,NULL,NULL,5,'S204',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (315,NULL,NULL,5,'EXUV300',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (316,NULL,NULL,5,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (317,NULL,NULL,14,'New Accord',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (318,NULL,NULL,14,'Accord',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (319,NULL,NULL,14,'Amaze',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (320,NULL,NULL,14,'Brio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (321,NULL,NULL,14,'BR-V',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (322,NULL,NULL,14,'City',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (323,NULL,NULL,14,'City ZX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (324,NULL,NULL,14,'Civic',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (325,NULL,NULL,14,'Civic Hybrid',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (326,NULL,NULL,14,'CR-V',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (327,NULL,NULL,14,'HR-V',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (328,NULL,NULL,14,'Jazz',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (329,NULL,NULL,14,'Mobilio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (330,NULL,NULL,14,'Vezel',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (331,NULL,NULL,14,'WR-V',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (332,NULL,NULL,14,'Jazz BS6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (333,NULL,NULL,14,'HR-V',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (334,NULL,NULL,14,'New Jazz',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (335,NULL,NULL,14,'Amaze Facelift',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (336,NULL,NULL,14,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (337,NULL,NULL,13,'Alphard',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (338,NULL,NULL,13,'Commuter',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (339,NULL,NULL,13,'Corona',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (340,NULL,NULL,13,'Crown',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (341,NULL,NULL,13,'Cynos',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (342,NULL,NULL,13,'Estima Emina',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (343,NULL,NULL,13,'Glanza',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (344,NULL,NULL,13,'MR2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (345,NULL,NULL,13,'Majesta',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (346,NULL,NULL,13,'Platinum Etios',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (347,NULL,NULL,13,'Premio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (348,NULL,NULL,13,'Previa',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (349,NULL,NULL,13,'Sera',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (350,NULL,NULL,13,'Starlet',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (351,NULL,NULL,13,'Tercel',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (352,NULL,NULL,13,'prado',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (353,NULL,NULL,13,'C-HR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (354,NULL,NULL,13,'Camry',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (355,NULL,NULL,13,'Corolla',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (356,NULL,NULL,13,'Corolla Altis',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (357,NULL,NULL,13,'Etios',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (358,NULL,NULL,13,'Etios Cross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (359,NULL,NULL,13,'Etios Liva',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (360,NULL,NULL,13,'Fortuner',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (361,NULL,NULL,13,'Innova',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (362,NULL,NULL,13,'Innova Crysta',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (363,NULL,NULL,13,'Land Cruiser',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (364,NULL,NULL,13,'Land Cruiser Prado',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (365,NULL,NULL,13,'Prius',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (366,NULL,NULL,13,'Qualis',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (367,NULL,NULL,13,'Rush',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (368,NULL,NULL,13,'Vellfire',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (369,NULL,NULL,13,'Yaris',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (370,NULL,NULL,13,'Urban Cruiser',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (371,NULL,NULL,13,'Fortuner Facelift',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (372,NULL,NULL,13,'Yaris cross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (373,NULL,NULL,13,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (374,NULL,NULL,110,'Maestro',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (375,NULL,NULL,110,'Pleasure',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (376,NULL,NULL,110,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (377,NULL,NULL,111,'Activa',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (378,NULL,NULL,111,'Aviator',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (379,NULL,NULL,111,'Dio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (380,NULL,NULL,111,'Grazia BS6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (381,NULL,NULL,111,'Activa 6 G',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (382,NULL,NULL,111,'Activa 125',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (383,NULL,NULL,111,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (384,NULL,NULL,114,'Jupiter',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (385,NULL,NULL,114,'Scooty',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (386,NULL,NULL,114,'Wego',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (387,NULL,NULL,114,'Zest',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (388,NULL,NULL,114,'XL 100',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (389,NULL,NULL,114,'NTORQ 125',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (390,NULL,NULL,114,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (391,NULL,NULL,113,'Access',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (392,NULL,NULL,113,'Swish',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (393,NULL,NULL,113,'Lets',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (394,NULL,NULL,113,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (395,NULL,NULL,112,'Duro',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (396,NULL,NULL,112,'Gusto',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (397,NULL,NULL,112,'Kine',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (398,NULL,NULL,112,'Rodeo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (399,NULL,NULL,112,'Sym Flyte\r\n',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (400,NULL,NULL,112,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (402,1,66,124,'Ashok Leyland',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (403,1,66,124,'Force Motors Ltd',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (404,1,66,124,'Hindustan Motors',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (405,1,66,124,'Piaggio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (406,1,66,124,'TATA Motors',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (407,1,66,124,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (408,1,66,126,'Toyota',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (409,1,66,126,'Maruti Suzuki',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (410,1,66,126,'Honda',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (411,1,66,126,'Hyundai',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (412,1,66,126,'Renault',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (413,1,66,126,'Mahindra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (414,1,66,126,'Nissan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (415,1,66,126,'Ford',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (416,1,66,126,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (417,1,66,127,'Eimco',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (418,1,66,127,'Force',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (419,1,66,127,'Hindustan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (420,1,66,127,'HMT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (421,1,66,127,'Indofarm',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (422,1,66,127,'MF',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (423,1,66,127,'MGTI',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (424,1,66,127,'NH',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (425,1,66,127,'Preet',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (426,1,66,127,'Same',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (427,1,66,127,'Standard',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (428,1,66,127,'Force Motors',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (429,1,66,127,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (431,1,60,30,'RS7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (432,1,60,30,'S4',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (433,1,60,30,'S5',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (434,1,60,30,'A3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (435,1,60,30,'A3 cabriolet ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (436,1,60,30,'A4',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (437,1,60,30,'A5',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (438,1,60,30,'A6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (439,1,60,30,'A7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (440,1,60,30,'A8',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (441,1,60,30,'A8L',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (442,1,60,30,'A8i',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (443,1,60,30,'Tron',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (444,1,60,30,'Q2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (445,1,60,30,'Q3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (446,1,60,30,'Q5',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (447,1,60,30,'Q7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (448,1,60,30,'Q8',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (449,1,60,30,'R8',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (450,1,60,30,'RS7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (451,1,60,30,'RS5',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (452,1,60,30,'RS6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (453,1,60,30,'RS6 AVANT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (454,1,60,30,'RS7 sport back',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (455,1,60,30,'S6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (456,1,60,30,'TT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (457,1,60,32,'M series',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (458,1,60,32,'1 series',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (459,1,60,32,'3 series ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (460,1,60,32,'3 series GT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (461,1,60,32,'4 series ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (462,1,60,32,'5 series',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (463,1,60,32,'5 series GT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (464,1,60,32,'6 series ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (465,1,60,32,'7 series ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (466,1,60,32,'8 series ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (467,1,60,32,'I3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (468,1,60,32,'I8',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (469,1,60,32,'M2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (470,1,60,32,'M3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (471,1,60,32,'M5',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (472,1,60,32,'M6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (473,1,60,32,'X1',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (474,1,60,32,'X2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (475,1,60,32,'X3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (476,1,60,32,'X4',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (477,1,60,32,'X5',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (478,1,60,32,'X5m',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (479,1,60,32,'X6',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (480,1,60,32,'X6m',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (481,1,60,32,'X7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (482,1,60,32,'Z4',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (483,1,60,32,'Mini',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (484,1,60,32,'Gran Turismo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (485,1,60,35,'Corvette',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (486,1,60,35,'Silverado',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (487,1,60,35,'Tavera Neo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (488,1,60,35,'Trailblazer',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (489,1,60,35,'Aveo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (490,1,60,35,'Aveo U-VA',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (491,1,60,35,'Beat',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (492,1,60,35,'Captiva',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (493,1,60,35,'Cruze',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (495,1,60,35,'Enjoy',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (496,1,60,35,'Forester',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (497,1,60,35,'Enjoy 7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (498,1,60,35,'Optra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (499,1,60,35,'Optra Magnum',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (500,1,60,35,'OptraSRV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (501,1,60,35,'Sail',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (502,1,60,35,'Tavera',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (503,1,60,35,'Spark',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (504,1,60,35,'Sail U-VA',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (505,1,60,35,'Sail Hatchback',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (506,1,60,35,'Sail',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (507,1,60,44,'B Max',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (508,1,60,44,'Falcon',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (509,1,60,44,'Aspire',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (510,1,60,44,'Classic',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (511,1,60,44,'Ecosport',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (512,1,60,44,'Endeavour',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (513,1,60,44,'Escort',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (514,1,60,44,'Fiesta',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (515,1,60,44,'Figo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (516,1,60,44,'Fiesta Classic',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (517,1,60,44,'Figo Aspire',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (518,1,60,44,'Freestyle',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (519,1,60,44,'Fusion',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (520,1,60,44,'Ikon',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (521,1,60,44,'Mondeo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (522,1,60,44,'Mustang',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (523,1,60,44,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (524,1,60,51,'F-Pace',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (525,1,60,51,'E Pace',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (526,1,60,51,'F Type',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (528,1,60,51,'XE',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (529,1,60,51,'XJ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (530,1,60,51,'XK',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (531,1,60,51,'XF',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (532,1,60,51,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (533,1,60,69,'Arkana',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (534,1,60,69,'Captur',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (535,1,60,69,'Duster',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (536,1,60,69,'Fluence',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (537,1,60,69,'HBC',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (538,1,60,69,'Koleos',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (539,1,60,69,'KWID',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (540,1,60,69,'Kwid EV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (541,1,60,69,'Lodgy',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (542,1,60,69,'Modus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (543,1,60,69,'Pulse',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (544,1,60,69,'Scala 7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (545,1,60,69,'Triber',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (546,1,60,69,'Zoe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (547,1,60,69,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (548,1,60,65,'350Z',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (549,1,60,65,'GTR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (550,1,60,65,'Gloria',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (551,1,60,65,'Jonga',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (552,1,60,65,'Primera',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (553,1,60,65,'Urvan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (554,1,60,65,'370z',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (555,1,60,65,'Datsun Redi Go',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (556,1,60,65,'Evalia',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (557,1,60,65,'GT-R',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (558,1,60,65,'Kicks',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (559,1,60,65,'Leaf',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (560,1,60,65,'Micra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (561,1,60,65,'Micra Active',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (562,1,60,65,'Note e Power',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (563,1,60,65,'Note e Power',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (564,1,60,65,'Sunny',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (565,1,60,65,'Teana',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (566,1,60,65,'Terra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (567,1,60,65,'Terrano',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (568,1,60,65,'X Trail',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (569,1,60,65,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (570,1,60,16,'6E 60 ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (571,1,60,16,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (572,1,60,17,'CTS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (573,1,60,17,'STS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (574,1,60,17,'ESCALADE',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (575,1,60,17,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (576,1,60,18,'Avenger ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (577,1,60,18,'300',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (578,1,60,18,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (579,1,60,19,'Evade',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (580,1,60,19,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (581,1,60,15,'Mk1',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (582,1,60,15,'Mk2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (583,1,60,15,'Mk3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (584,1,60,15,'Mk4',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (585,1,60,15,'Nova',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (586,1,60,15,'Grand',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (587,1,60,15,'Classic',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (588,1,60,15,'Avigo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (589,1,60,33,'Chiron',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (590,1,60,33,'Divo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (591,1,60,33,'Veyron',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (592,1,60,33,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (593,1,60,34,'7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (594,1,60,34,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (595,1,60,36,'C5 aircross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (596,1,60,36,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (597,1,60,37,'Cielo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (598,1,60,37,'Matiz',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (599,1,60,37,'Nexio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (600,1,60,37,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (601,1,60,38,'Redi go',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (602,1,60,38,'Go',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (603,1,60,38,'Go plus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (604,1,60,38,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (605,1,60,39,'Avanti ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (606,1,60,39,'Tca',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (607,1,60,39,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (608,1,60,20,'Nitro',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (609,1,60,20,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (610,1,60,21,'FX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (611,1,60,21,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (612,1,60,22,'57S',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (613,1,60,22,'62S',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (614,1,60,22,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (615,1,60,23,'Miata',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (616,1,60,23,'RX8',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (617,1,60,23,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (618,1,60,25,'Montego',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (619,1,60,25,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (620,1,60,26,'Fortwo ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (621,1,60,26,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (622,1,60,27,'Impreza',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (623,1,60,27,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (625,1,60,75,'Model S',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (626,1,60,75,'Model X',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (627,1,60,75,'Model Y',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (628,1,60,75,'Model 3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (629,1,60,49,'Extreme',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (630,1,60,49,'Rhino Rx',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (631,1,60,49,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (632,1,60,29,'DB11',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (633,1,60,29,'One 77',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (634,1,60,29,'Vantage',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (635,1,60,29,'Virage',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (636,1,60,29,'DB9',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (637,1,60,29,'DBS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (638,1,60,29,'DBS Superleggera',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (639,1,60,29,'DBX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (640,1,60,29,'Rapide',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (641,1,60,29,'V12 Vantage',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (642,1,60,29,'v8 Vantage',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (643,1,60,29,'Vanquish',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (644,1,60,29,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (645,1,60,31,'Arnage',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (646,1,60,31,'Azure',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (647,1,60,31,'Bentayga',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (648,1,60,31,'Continental',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (649,1,60,31,'Brookland',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (650,1,60,31,'Flying Spur',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (651,1,60,31,'Continental GT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (652,1,60,31,'Continental GTC',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (653,1,60,31,'Mulsanne',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (654,1,60,31,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (655,1,60,40,'Multix',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (656,1,60,40,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (657,1,60,41,'458 Italia',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (658,1,60,41,'458 Speciale',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (659,1,60,41,'458 Spider',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (660,1,60,41,'488 GTB',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (661,1,60,41,'612',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (662,1,60,41,'575 Superamerica',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (663,1,60,41,'812 SuperFast',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (664,1,60,41,'Enzo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (665,1,60,41,'F12berlinetta',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (666,1,60,41,'F430',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (667,1,60,41,'F620 GT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (668,1,60,41,'GTC4Lusso',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (669,1,60,41,'GTC4Lusso',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (670,1,60,41,'Portofino',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (671,1,60,41,'599 GTB Fiorano',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (672,1,60,41,'California',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (673,1,60,41,'FF',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (674,1,60,41,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (675,1,60,52,'Compass Trail hawk',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (676,1,60,52,'Kaiser',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (677,1,60,52,'Compass',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (678,1,60,52,'Grand Cherokee',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (679,1,60,52,'Renegade',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (680,1,60,52,'Wrangler',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (681,1,60,52,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (682,1,60,50,'D-Max',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (683,1,60,50,'MU7',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (684,1,60,50,'D-Max V-Cross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (685,1,60,50,'MU-X',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (686,1,60,50,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (687,1,60,43,'Trax',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (688,1,60,43,'Cruiser',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (689,1,60,43,'Force one',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (690,1,60,43,'Gurkha',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (691,1,60,43,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (692,1,60,72,'Karoq',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (693,1,60,72,'Kodiaq',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (694,1,60,72,'Laura',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (695,1,60,72,'Octavia',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (696,1,60,72,'Octavia Combi',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (697,1,60,72,'Rapid',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (698,1,60,72,'Scala',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (699,1,60,72,'Superb',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (700,1,60,72,'Vision X',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (701,1,60,72,'Yeti',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (702,1,60,72,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (703,1,60,42,'1100',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (704,1,60,42,'Abarth Avventura',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (705,1,60,42,'Aventura Urban Cross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (706,1,60,42,'Ducato',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (709,1,60,42,'Grande Punto',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (710,1,60,42,'Millicento',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (711,1,60,42,'Premier Padmini',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (712,1,60,42,'Punto Abarth',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (713,1,60,42,'Punto Pure',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (714,1,60,42,'500',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (715,1,60,42,'Abarth 595',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (716,1,60,42,'Linea Classic',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (717,1,60,42,'Palio D',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (718,1,60,42,'Palio NV',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (719,1,60,42,'Palio Stile',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (720,1,60,42,'Petra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (721,1,60,42,'Petra D',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (722,1,60,42,'Punto',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (723,1,60,42,'Punto EO',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (724,1,60,42,'Siena',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (725,1,60,42,'Siena Weekend',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (726,1,60,42,'Uno',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (727,1,60,42,'Avventura',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (728,1,60,42,'Cronos',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (729,1,60,42,'Grand Punto',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (730,1,60,42,'Linea',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (731,1,60,45,'Avigo 1800 ISZ MPFI',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (732,1,60,45,'Avigo 2000 DSZ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (733,1,60,45,'Classic 1800 ISZ AC CNG',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (734,1,60,45,'Classic 1800 ISZ CNG',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (735,1,60,45,'Classic 1800 ISZ MPFI AC PS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (736,1,60,45,'Classic 1800 ISZ MPFI AC',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (737,1,60,45,'Classic 1800 ISZ MPFI PS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (738,1,60,45,'Classic 1800 ISZ MPFI',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (739,1,60,45,'Classic 2000 DSZ AC PS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (740,1,60,45,'Classic 2000 DSZ AC',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (741,1,60,45,'Classic 2000 DSZ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (742,1,60,56,'GS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (743,1,60,56,'LM',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (744,1,60,56,'ES',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (745,1,60,56,'LS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (746,1,60,56,'LX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (747,1,60,56,'NX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (748,1,60,56,'RX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (749,1,60,56,'UX',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (750,1,60,56,'LC 500h',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (751,1,60,64,'FTO',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (752,1,60,64,'Cedia',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (753,1,60,64,'Challenger',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (754,1,60,64,'Eclipse Cross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (755,1,60,64,'Lancer',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (756,1,60,64,'Lancer Evolution',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (757,1,60,64,'Montero',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (758,1,60,64,'Pajero',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (759,1,60,64,'Pajero Sport',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (760,1,60,64,'Xpander',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (761,1,60,77,'Jetta',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (762,1,60,77,'Passat',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (763,1,60,77,'Passat',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (764,1,60,77,'Phaeton',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (765,1,60,77,'Polo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (766,1,60,77,'T-Cross',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (767,1,60,77,'T-ROC',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (768,1,60,77,'Tiguan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (769,1,60,77,'Touareg',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (770,1,60,77,'Vento',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (771,1,60,77,'Virtus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (772,1,60,77,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (773,1,60,78,'XC 90',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (774,1,60,78,'XC40',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (775,1,60,78,'S60',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (776,1,60,78,'S80',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (777,1,60,78,'V 60',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (778,1,60,78,'V 90',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (779,1,60,78,'V40',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (780,1,60,78,'V40 Cross Country',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (781,1,60,78,'XC60',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (782,1,60,78,'XC90',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (783,1,60,78,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (784,1,60,47,'H1',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (785,1,60,47,'H2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (786,1,60,47,'H3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (787,1,60,47,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (788,1,60,58,'Logan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (789,1,60,58,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (790,1,60,66,'Astra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (791,1,60,66,'Corsa',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (792,1,60,66,'Vectra',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (793,1,60,66,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (794,1,60,24,'309',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (795,1,60,24,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (796,1,60,68,'118 NE',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (797,1,60,68,'138 D',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (798,1,60,68,'NE 118',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (799,1,60,68,'Padmini ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (800,1,60,68,'Rio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (801,1,60,68,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (802,1,60,71,'Motors storm',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (803,1,60,71,'Storm',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (804,1,60,71,'Storm 1.2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (805,1,60,71,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (806,1,60,73,'Rexton',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (807,1,60,73,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (808,1,60,54,'Huracan EVO',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (809,1,60,54,'Urus',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (810,1,60,54,'Aventador',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (811,1,60,54,'Gallardo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (812,1,60,54,'Huracan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (813,1,60,54,'Murcielago',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (814,1,60,54,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (815,1,60,53,'Carnival',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (816,1,60,53,'Ceed',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (817,1,60,53,'Seltos',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (818,1,60,53,'Soul',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (819,1,60,53,'Sportage',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (820,1,60,53,'Stonic',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (821,1,60,53,'Rio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (822,1,60,53,'Stinger',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (823,1,60,53,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (824,1,60,60,'Levante',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (825,1,60,60,'Ghibli',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (826,1,60,60,'Gran Cabrio',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (827,1,60,60,'Gran Turismo',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (828,1,60,60,'Quattroporte',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (829,1,60,60,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (830,1,60,62,'Baojun 530',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (831,1,60,62,'Hector',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (832,1,60,62,'Baojun 510',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (833,1,60,62,'ERX5',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (834,1,60,62,'ezS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (835,1,60,62,'GS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (836,1,60,62,'RX5',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (837,1,60,62,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (838,1,60,55,'Discovery Sport',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (839,1,60,55,'Defender',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (840,1,60,55,'Discovery',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (841,1,60,55,'Discovery 3',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (842,1,60,55,'Discovery4',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (843,1,60,55,'Freelander 2',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (844,1,60,55,'Range Rover',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (845,1,60,55,'Range Rover Evoque',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (846,1,60,55,'Range Rover LWB',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (847,1,60,55,'Range Rover Sport',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (848,1,60,55,'Range Rover Velar',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (849,1,60,55,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (850,1,60,61,'AMG GT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (851,1,60,61,'CL-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (852,1,60,61,'CLK Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (853,1,60,61,'GLA',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (854,1,60,61,'G',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (855,1,60,61,'MB-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (856,1,60,61,'S-Class Cabriolet',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (857,1,60,61,'E-Class Cabriolet',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (858,1,60,61,'SLC',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (859,1,60,61,'A class ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (860,1,60,61,'B class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (861,1,60,61,'CLA',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (862,1,60,61,'Cls',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (863,1,60,61,'New C-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (864,1,60,61,'CLS-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (865,1,60,61,'E-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (866,1,60,61,'EQC',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (867,1,60,61,'G Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (868,1,60,61,'GL-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (869,1,60,61,'GLA Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (870,1,60,61,'GLB',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (871,1,60,61,'GLC Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (872,1,60,61,'GLE COUPE',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (873,1,60,61,'GLS',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (874,1,60,61,'M-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (875,1,60,61,'MI Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (876,1,60,61,'R-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (877,1,60,61,'S-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (878,1,60,61,'S-Coupe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (879,1,60,61,'Sdl',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (880,1,60,61,'SL-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (881,1,60,61,'SLK-Class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (882,1,60,61,'SLS AMG',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (883,1,60,63,'3 DOOR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (884,1,60,63,'5 DOOR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (885,1,60,63,'Cooper 3 DOOR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (886,1,60,63,'Cooper 5 DOOR',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (887,1,60,63,'Cooper Clubman',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (888,1,60,63,'Clubman',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (889,1,60,63,'Cooper',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (890,1,60,63,'Cooper Convertible',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (891,1,60,63,'Cooper S',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (892,1,60,63,'Cooper Countryman',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (893,1,60,63,'JCW',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (894,1,60,67,'718',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (895,1,60,67,'Carrera GT',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (896,1,60,67,'911',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (897,1,60,67,'Boxster',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (898,1,60,67,'Cayenne',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (899,1,60,67,'Cayenne Coupe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (900,1,60,67,'Cayman',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (901,1,60,67,'Macan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (902,1,60,67,'Panamera',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (903,1,60,67,'Tycan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (904,1,60,67,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (905,1,60,61,'Sls class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (906,1,60,61,'V-class',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (907,1,60,61,'Viano',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (908,1,60,61,'Others ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (909,1,60,70,'Cullinan',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (910,1,60,70,'Dawn',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (911,1,60,70,'Drophead',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (912,1,60,70,'Wraith',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (913,1,60,70,'Drophead Coupe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (914,1,60,70,'Ghost',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (915,1,60,70,'Ghost Series II',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (916,1,60,70,'Phantom',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (917,1,60,70,'Phantom Coupe',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (918,1,60,70,'Others',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (919,1,60,16,'Qute petrol 216',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (920,1,60,16,'New 216 cc ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (921,1,61,84,'Royal enfield ',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (922,1,65,109,'Chetak',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (924,NULL,NULL,85,'V Storm',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (928,NULL,NULL,85,'Swiss',1,0);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (929,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (930,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (932,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (933,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (934,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (935,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (936,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (937,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (938,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (939,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (940,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (941,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (942,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (943,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (944,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (945,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (946,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (947,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (948,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (949,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (950,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (951,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (952,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (953,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (954,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (955,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (956,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (957,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (958,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (959,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (960,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (961,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (962,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (963,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (964,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (965,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (966,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (967,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (968,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (969,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (970,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (971,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (972,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (973,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (974,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (975,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (976,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (977,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (978,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (979,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (980,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (981,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (982,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (983,NULL,NULL,0,'',1,1);
insert  into `_JModels`(`ModelID`,`categid`,`subcateid`,`brandid`,`model`,`isactive`,`iscustom`) values (984,NULL,NULL,0,'',1,1);

/*Table structure for table `_JVariants` */

DROP TABLE IF EXISTS `_JVariants`;

CREATE TABLE `_JVariants` (
  `VarID` int(11) NOT NULL AUTO_INCREMENT,
  `modelid` int(11) DEFAULT '0',
  `variant` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`VarID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `_JVariants` */

insert  into `_JVariants`(`VarID`,`modelid`,`variant`) values (1,1,'Red');
insert  into `_JVariants`(`VarID`,`modelid`,`variant`) values (2,1,'White');
insert  into `_JVariants`(`VarID`,`modelid`,`variant`) values (3,2,'Blue');

/*Table structure for table `_chat_initiate` */

DROP TABLE IF EXISTS `_chat_initiate`;

CREATE TABLE `_chat_initiate` (
  `ChatID` int(11) NOT NULL AUTO_INCREMENT,
  `adID` int(11) DEFAULT NULL,
  `adPosted` int(11) DEFAULT NULL,
  `adViewed` int(11) DEFAULT NULL,
  `ChatInit` datetime DEFAULT NULL,
  PRIMARY KEY (`ChatID`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8;

/*Data for the table `_chat_initiate` */

insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (1,4082,2851,2852,'2020-07-11 14:59:13');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (2,4035,10,477,'2020-07-11 16:17:33');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (3,4080,2850,10,'2020-07-11 16:37:13');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (4,1787,1599,2862,'2020-07-12 09:04:47');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (5,4094,2866,10,'2020-07-12 14:10:23');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (6,69,13,2817,'2020-07-16 01:44:11');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (7,4120,2965,2817,'2020-07-17 11:38:31');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (8,4119,2964,2817,'2020-07-17 11:39:24');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (9,4118,2963,2817,'2020-07-17 11:40:00');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (10,4117,2962,2817,'2020-07-17 11:40:48');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (11,4116,2961,2817,'2020-07-17 11:41:42');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (12,4126,2973,477,'2020-07-18 06:33:39');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (13,4129,2981,1,'2020-07-19 09:29:30');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (14,4156,3062,3090,'2020-07-21 01:18:24');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (15,2561,2375,3091,'2020-07-21 05:18:52');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (16,4165,410,3099,'2020-07-21 11:00:17');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (17,4138,3015,3105,'2020-07-21 12:04:46');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (18,4176,3111,3111,'2020-07-21 12:58:02');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (19,2561,2375,3129,'2020-07-21 15:08:24');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (20,4120,2965,3140,'2020-07-21 16:29:29');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (21,1841,1654,3141,'2020-07-21 16:36:30');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (22,1623,1436,3171,'2020-07-22 09:12:36');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (23,4048,2837,3170,'2020-07-22 09:19:16');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (24,2680,2494,3186,'2020-07-22 12:44:09');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (25,4160,3066,3189,'2020-07-22 14:33:15');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (26,4088,2859,3198,'2020-07-22 17:56:32');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (27,2563,2377,3202,'2020-07-22 19:22:42');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (28,4127,2979,3203,'2020-07-22 19:45:50');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (29,841,655,3210,'2020-07-22 21:10:39');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (30,2563,2377,3226,'2020-07-23 02:32:45');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (31,4117,2962,3227,'2020-07-23 05:07:54');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (32,54,11,3237,'2020-07-23 08:55:15');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (33,4239,2972,3266,'2020-07-23 16:25:14');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (34,336,147,3270,'2020-07-23 17:16:32');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (35,804,618,3270,'2020-07-23 17:19:52');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (36,4048,2837,3284,'2020-07-23 20:06:49');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (37,514,324,3141,'2020-07-23 20:52:00');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (38,4246,3290,3296,'2020-07-24 07:42:06');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (39,2829,2643,3301,'2020-07-24 09:31:54');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (40,852,666,3314,'2020-07-24 12:25:30');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (41,4248,3290,3314,'2020-07-24 12:28:57');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (42,4261,3325,3314,'2020-07-24 20:14:25');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (43,71,13,3330,'2020-07-24 20:59:47');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (44,109,13,3330,'2020-07-24 21:00:39');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (45,1783,1595,3342,'2020-07-25 07:13:55');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (46,2679,2493,3344,'2020-07-25 09:07:28');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (47,4255,3307,3361,'2020-07-25 13:40:10');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (48,2414,2226,3366,'2020-07-25 18:21:42');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (49,4246,3290,3371,'2020-07-25 22:27:32');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (50,121,13,3378,'2020-07-26 08:21:59');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (51,841,655,3393,'2020-07-26 12:36:35');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (52,2561,2375,3398,'2020-07-26 15:32:11');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (53,4300,3394,3361,'2020-07-26 16:28:23');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (54,2678,2492,3403,'2020-07-26 17:09:41');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (55,4298,3394,3119,'2020-07-26 19:55:39');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (56,126,13,3378,'2020-07-26 20:23:20');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (57,2561,2375,3413,'2020-07-26 22:36:17');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (58,4019,2785,3459,'2020-07-28 00:06:02');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (59,4331,3474,10,'2020-07-28 13:10:59');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (60,4328,3457,3191,'2020-07-29 09:57:51');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (61,4347,3490,11,'2020-07-29 15:48:24');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (62,4345,3489,11,'2020-07-29 15:50:08');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (63,4347,3490,3513,'2020-07-29 23:55:43');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (64,4335,3476,3513,'2020-07-29 23:57:40');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (65,4332,3476,3513,'2020-07-30 00:06:03');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (66,4043,2828,3521,'2020-07-30 10:08:04');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (67,4365,3469,3506,'2020-07-31 09:57:43');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (68,4328,3457,3542,'2020-07-31 16:19:44');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (69,4365,3469,3361,'2020-07-31 20:08:38');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (70,4329,3459,3361,'2020-07-31 20:09:39');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (71,4372,410,3554,'2020-08-01 02:41:25');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (72,4372,410,3557,'2020-08-01 05:35:54');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (73,4260,3314,3557,'2020-08-01 05:37:43');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (74,4127,2979,3557,'2020-08-01 05:40:26');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (75,4356,3188,11,'2020-08-01 20:45:55');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (76,385,196,3573,'2020-08-02 08:21:10');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (77,4386,10,3595,'2020-08-02 20:37:31');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (78,4246,3290,3469,'2020-08-04 06:46:28');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (79,4336,3476,3614,'2020-08-04 08:27:58');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (80,4415,3614,10,'2020-08-04 08:37:27');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (81,1623,1436,3607,'2020-08-04 14:56:44');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (82,4420,3618,3084,'2020-08-04 19:46:33');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (83,4395,3605,3634,'2020-08-05 15:43:24');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (84,4369,3548,3314,'2020-08-05 22:55:19');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (85,4347,3490,3314,'2020-08-05 22:56:49');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (86,4335,3476,3314,'2020-08-05 22:57:43');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (87,4391,3590,3314,'2020-08-05 23:02:25');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (88,397,208,3639,'2020-08-06 11:43:00');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (89,2499,2313,3639,'2020-08-06 11:46:24');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (90,559,368,3640,'2020-08-06 17:34:35');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (91,4488,10,410,'2020-08-08 16:11:47');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (92,4483,10,410,'2020-08-10 15:54:48');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (93,4320,3432,410,'2020-08-10 17:21:12');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (94,4090,2861,3672,'2020-08-10 21:48:35');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (95,4480,477,3672,'2020-08-10 21:50:45');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (96,273,84,3674,'2020-08-11 11:34:30');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (97,4520,10,410,'2020-08-11 11:37:06');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (98,906,720,3680,'2020-08-12 02:50:41');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (99,347,158,3680,'2020-08-12 02:54:34');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (100,4517,10,3680,'2020-08-12 03:00:48');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (101,4326,3450,3526,'2020-08-13 16:29:07');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (102,4565,10,3685,'2020-08-14 15:42:39');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (103,2368,2180,3692,'2020-08-14 22:37:08');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (104,21,11,11,'2020-08-15 16:55:13');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (105,2561,2375,3700,'2020-08-15 19:29:26');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (106,2367,2179,3700,'2020-08-15 19:35:14');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (107,4585,10,11,'2020-08-15 20:03:31');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (108,4524,10,11,'2020-08-15 20:05:29');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (109,4582,10,11,'2020-08-15 20:08:21');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (110,4584,10,11,'2020-08-15 20:16:18');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (111,4585,10,410,'2020-08-16 08:40:05');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (112,4587,3702,11,'2020-08-16 10:46:48');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (113,4588,410,11,'2020-08-16 10:50:17');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (114,4593,3707,3707,'2020-08-16 13:24:45');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (115,4246,3290,3658,'2020-08-16 18:30:07');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (116,4561,10,3717,'2020-08-17 13:58:37');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (117,2561,2375,3717,'2020-08-17 14:01:01');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (118,4509,2668,3720,'2020-08-17 22:20:42');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (119,4423,3026,3720,'2020-08-17 22:22:07');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (120,687,503,3719,'2020-08-18 18:01:35');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (121,4259,3312,3719,'2020-08-18 18:03:46');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (122,4631,3733,3733,'2020-08-19 10:48:13');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (123,4600,10,3734,'2020-08-19 12:37:10');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (124,968,782,3734,'2020-08-19 12:44:08');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (125,4587,3702,3739,'2020-08-19 15:07:24');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (126,4623,10,3634,'2020-08-20 00:08:59');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (127,4133,2985,3742,'2020-08-20 18:12:04');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (128,4516,10,3742,'2020-08-20 18:16:00');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (129,1778,1590,3743,'2020-08-21 06:30:04');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (130,78,13,3743,'2020-08-21 06:37:42');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (131,2299,2111,3747,'2020-08-21 08:02:56');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (132,2362,2174,3750,'2020-08-21 15:47:43');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (133,4480,477,3752,'2020-08-21 16:08:42');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (134,1046,860,3758,'2020-08-22 11:54:14');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (135,633,444,3758,'2020-08-22 12:06:38');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (136,4655,3391,11,'2020-08-22 15:44:22');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (137,852,666,3759,'2020-08-22 17:31:00');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (138,4155,3061,3760,'2020-08-22 23:01:03');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (139,4413,10,3760,'2020-08-22 23:03:34');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (140,4484,10,3761,'2020-08-23 01:08:17');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (141,4682,3764,3764,'2020-08-23 14:43:41');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (142,4332,3476,3764,'2020-08-23 14:45:09');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (143,4384,3584,3764,'2020-08-23 14:47:36');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (144,2385,2197,3771,'2020-08-23 20:32:51');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (145,4673,10,3771,'2020-08-23 21:15:02');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (146,4687,10,3778,'2020-08-25 00:08:40');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (147,4120,2965,3777,'2020-08-25 11:36:08');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (148,2672,2486,3781,'2020-08-25 21:48:00');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (149,427,238,3785,'2020-08-26 11:59:57');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (150,1901,1714,3785,'2020-08-26 12:09:52');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (151,2504,2318,3785,'2020-08-26 12:17:21');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (152,4260,3314,3731,'2020-08-26 22:09:22');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (153,4082,2851,3731,'2020-08-26 22:11:05');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (154,4122,2967,3710,'2020-08-26 23:41:51');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (155,2367,2179,3710,'2020-08-26 23:45:18');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (156,4590,10,3793,'2020-08-27 22:37:21');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (157,4587,3702,3795,'2020-08-28 15:32:31');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (158,4561,10,3800,'2020-08-31 00:16:21');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (159,4120,2965,11,'2020-08-31 07:42:25');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (160,4779,3808,3808,'2020-08-31 17:45:12');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (161,4492,3656,3809,'2020-08-31 17:51:58');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (162,66,10,3815,'2020-09-01 13:17:58');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (163,4834,2668,3853,'2020-09-06 10:59:03');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (164,4825,2668,3854,'2020-09-06 15:26:08');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (165,4824,2668,3854,'2020-09-06 15:28:45');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (166,436,247,3856,'2020-09-06 23:48:14');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (167,435,246,3856,'2020-09-06 23:49:31');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (168,4851,10,3861,'2020-09-07 15:18:39');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (169,4260,3314,3849,'2020-09-07 15:21:06');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (170,4829,2668,3862,'2020-09-08 00:07:37');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (171,4417,10,3864,'2020-09-08 09:03:45');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (172,4830,2668,3864,'2020-09-08 09:06:40');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (173,4830,2668,3877,'2020-09-11 13:23:40');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (174,4733,10,3879,'2020-09-12 12:51:40');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (175,4516,10,3879,'2020-09-12 13:06:59');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (176,4796,10,3882,'2020-09-12 23:28:27');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (177,4794,10,3495,'2020-09-13 23:35:38');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (178,2367,2179,3495,'2020-09-13 23:41:44');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (179,960,774,3495,'2020-09-14 00:02:17');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (180,4669,3760,3889,'2020-09-15 11:12:47');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (181,2561,2375,3891,'2020-09-15 16:22:49');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (182,4831,2668,3876,'2020-09-15 21:36:20');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (183,2810,2624,3876,'2020-09-15 22:03:41');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (184,4904,3885,3862,'2020-09-15 22:08:33');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (185,4942,3901,2668,'2020-09-16 23:00:57');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (186,902,716,3908,'2020-09-17 06:18:31');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (187,4246,3290,3912,'2020-09-17 07:32:17');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (188,4940,3848,3848,'2020-09-17 12:16:09');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (189,4246,3290,3922,'2020-09-18 07:30:35');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (190,4906,10,3094,'2020-09-22 00:24:34');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (191,4993,10,3942,'2020-09-22 08:37:52');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (192,4482,3646,0,'2020-09-23 00:24:49');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (193,4952,10,0,'2020-09-24 16:21:46');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (194,672,486,3982,'2020-09-24 16:31:16');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (195,4956,3881,0,'2020-09-24 17:36:34');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (196,4871,10,0,'2020-09-24 18:52:21');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (197,4874,10,0,'2020-09-24 20:08:08');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (198,4939,10,0,'2020-09-24 21:23:56');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (199,4987,10,4040,'2020-10-02 14:16:52');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (200,5082,10,4033,'2020-10-02 22:23:11');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (201,4915,3881,4033,'2020-10-02 22:40:56');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (202,5182,477,3927,'2020-10-04 10:26:24');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (203,5195,478,3330,'2020-10-04 16:12:33');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (204,5213,478,3611,'2020-10-04 20:57:33');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (205,5226,478,4054,'2020-10-05 10:25:25');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (206,5222,478,4054,'2020-10-05 10:26:54');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (207,5221,478,4054,'2020-10-05 10:28:50');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (208,5267,477,4062,'2020-10-07 07:31:21');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (209,5275,477,4063,'2020-10-07 07:39:20');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (210,349,160,4069,'2020-10-07 18:38:53');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (211,4082,2851,4069,'2020-10-07 18:43:59');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (212,5294,478,4078,'2020-10-08 09:22:26');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (213,5296,478,4078,'2020-10-08 09:22:52');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (214,5311,478,4108,'2020-10-11 13:47:53');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (215,5756,477,4153,'2020-10-21 18:36:11');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (216,5903,410,4168,'2020-10-25 16:14:21');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (217,5873,477,4171,'2020-10-25 23:30:11');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (218,5896,477,4172,'2020-10-26 08:06:08');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (219,4899,2668,3815,'2020-10-31 00:08:29');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (220,5939,478,0,'2020-10-31 08:42:23');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (221,6005,4193,4192,'2020-10-31 11:26:37');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (222,6004,4192,4193,'2020-10-31 11:33:08');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (223,6005,4193,4193,'2020-10-31 11:34:35');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (224,6004,4192,4192,'2020-10-31 11:34:37');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (225,2306,2118,0,'2020-11-01 05:20:15');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (226,5288,478,4190,'2020-11-01 12:52:40');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (227,3855,0,0,'2020-11-01 13:14:10');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (228,4919,10,3948,'2020-11-02 01:30:58');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (229,2715,2529,0,'2020-11-02 20:48:22');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (230,2913,2725,0,'2020-11-03 19:01:44');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (231,6088,477,0,'2020-11-04 08:36:14');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (232,6090,477,0,'2020-11-04 08:42:49');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (233,2391,2203,0,'2020-11-04 13:53:29');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (234,6099,4039,0,'2020-11-04 17:57:25');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (235,4997,10,0,'2020-11-05 19:30:23');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (236,6107,4216,0,'2020-11-05 22:18:47');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (237,6099,4039,4229,'2020-11-06 09:07:38');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (238,5403,478,4229,'2020-11-06 09:11:14');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (239,2367,2179,4229,'2020-11-06 09:19:04');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (240,633,444,4229,'2020-11-06 09:44:28');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (241,5092,2795,4231,'2020-11-06 17:36:49');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (242,5269,478,4231,'2020-11-06 17:37:55');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (243,6146,477,0,'2020-11-07 07:19:15');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (244,5012,10,0,'2020-11-07 10:05:42');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (245,5005,10,0,'2020-11-07 11:01:45');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (246,4926,3892,0,'2020-11-07 11:09:56');
insert  into `_chat_initiate`(`ChatID`,`adID`,`adPosted`,`adViewed`,`ChatInit`) values (247,6149,478,0,'2020-11-07 16:00:01');

/*Table structure for table `_jbrandnames` */

DROP TABLE IF EXISTS `_jbrandnames`;

CREATE TABLE `_jbrandnames` (
  `brandid` int(11) NOT NULL AUTO_INCREMENT,
  `subcateid` int(11) DEFAULT NULL,
  `categid` int(11) DEFAULT NULL,
  `brandname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;

/*Data for the table `_jbrandnames` */

insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (1,2,2,'iPhone');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (2,2,2,'Samsung');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (3,60,1,'Maruti Suzuki');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (4,60,1,'Hyundai');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (5,60,1,'Mahindra');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (8,96,1,'Other Brands');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (11,60,1,'Tata');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (13,60,1,'Toyota');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (14,60,1,'Honda');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (15,60,1,'Ambassador');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (16,60,1,'Bajaj');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (17,60,1,'Cadillac');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (18,60,1,'Chrysler');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (19,60,1,'Conquest');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (20,60,1,'Dodge');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (21,60,1,'Infiniti');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (22,60,1,'Maybach');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (23,60,1,'Mazda');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (24,60,1,'Peugeot');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (25,60,1,'Sipani');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (26,60,1,'Smart');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (27,60,1,'Subaru');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (29,60,1,'Aston Martin');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (30,60,1,'Audi');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (31,60,1,'Bentley');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (32,60,1,'BMW');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (33,60,1,'Bugatti');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (34,60,1,'Caterham');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (35,60,1,'Chevrolet');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (36,60,1,'Citroen');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (37,60,1,'Daewoo');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (38,60,1,'Datsun');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (39,60,1,'Dc');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (40,60,1,'Eicher Polaris');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (41,60,1,'Ferrari');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (42,60,1,'Fiat');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (43,60,1,'Force Motors');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (44,60,1,'Ford');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (45,60,1,'Hindustan Motors');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (47,60,1,'Hummer');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (49,60,1,'ICML');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (50,60,1,'Isuzu');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (51,60,1,'Jaguar');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (52,60,1,'Jeep');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (53,60,1,'Kia');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (54,60,1,'Lamborghini');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (55,60,1,'Land Rover');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (56,60,1,'Lexus');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (58,60,1,'Mahindra Renault');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (60,60,1,'Maserati');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (61,60,1,'Mercedes-Benz');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (62,60,1,'MG');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (63,60,1,'Mini');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (64,60,1,'Mitsubishi');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (65,60,1,'Nissan');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (66,60,1,'Opel');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (67,60,1,'Porsche');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (68,60,1,'Premier');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (69,60,1,'Renault');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (70,60,1,'Rolls-Royce');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (71,60,1,'San');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (72,60,1,'Skoda');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (73,60,1,'Ssangyong');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (75,60,1,'Tesla');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (77,60,1,'Volkswagen');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (78,60,1,'Volvo');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (79,61,1,'Bajaj');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (80,61,1,'Hero');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (81,61,1,'Hero Honda');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (82,61,1,'Honda');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (83,61,1,'KTM');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (84,61,1,'Royal Enfield');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (85,61,1,'Suzuki');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (86,61,1,'TVS');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (87,61,1,'Yamaha');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (88,61,1,'Other Brands');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (89,61,1,'Mahindra');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (90,60,1,'Others');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (91,4,1,NULL);
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (92,123,NULL,'Ashok Leyland');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (93,123,NULL,'Eicher');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (94,123,NULL,'FORCE Motors Ltd');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (95,123,NULL,'SML');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (96,123,NULL,'TATA Motors');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (97,123,NULL,'Others');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (98,123,NULL,'Scania ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (99,123,NULL,'Volvo');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (100,124,NULL,'Ashok Leyland');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (101,124,NULL,'Bhart Benz');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (102,124,NULL,'FORCE Motors Ltd');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (103,124,NULL,'Mahindra');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (104,124,NULL,'SML');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (105,124,NULL,'Eicher');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (106,124,NULL,'Tata Motors');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (107,124,NULL,'Asia Motor Works (AMW)');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (108,124,NULL,'Others');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (109,65,1,'Bajaj');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (110,65,1,'Hero');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (111,65,1,'Honda');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (112,65,1,'Mahindra');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (113,65,1,'Suzuki');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (114,65,1,'TVS');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (115,65,1,'Other');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (122,66,1,'Heavy Machinery');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (123,66,1,'Modified Jeeps');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (124,66,1,'Pick-up vans/ Pick-up trucks');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (125,66,1,'Scrap Cars');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (126,66,1,'Taxi Cabs');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (127,66,1,'Tractors');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (128,66,1,'Others');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (129,2,2,'Nokia');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (130,2,2,'Vivo');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (131,2,2,'Mi ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (132,2,2,'Oppo');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (133,2,2,'Realme');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (134,2,2,'Asus');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (135,2,2,'BlackBerry');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (136,2,2,'Gionee');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (137,2,2,'Google Pixel');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (141,2,2,'Infinix');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (142,2,2,'Intex');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (143,2,2,'Karbonn');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (144,2,2,'Lava');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (145,2,2,'Lenovo');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (146,2,2,'Micromax');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (147,2,2,'LG');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (148,2,2,'Sony ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (149,2,2,'Motorola');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (150,2,2,'One Plus');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (151,2,2,'Techno');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (152,2,2,'Apple ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (153,2,2,'Honor');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (154,2,2,'Asus');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (155,2,2,'Poco');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (156,2,2,'Nubia');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (157,2,2,'Comio');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (158,2,2,'Lyf');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (159,2,2,'Panasonic ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (160,2,2,'Huawei ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (161,2,2,'Coolpad');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (162,2,2,'Infocus');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (163,2,2,'i ball');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (165,2,2,'Spice');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (166,2,2,'HTC');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (167,2,2,'Meizu');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (168,2,2,'Vodafone ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (169,2,2,'Swipe');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (170,33,7,'Spoken English ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (171,36,7,'Spoken  English ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (172,89,2,'Samsung ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (173,89,2,'Lenova');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (174,89,2,'i kall');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (175,89,2,'Honor ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (176,89,2,'Apple');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (177,89,2,'Acer');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (178,89,2,'Others');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (179,2,2,'Others ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (180,14,2,'Mobiles');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (181,14,2,'Tablets');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (182,84,3,'LG');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (183,84,3,'Samsung ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (184,84,3,'Whirl pool');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (185,84,3,'Videocon ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (186,84,3,'Godrej');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (187,84,3,'Haier');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (188,84,3,'Panasonic ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (189,84,3,'Kelvinator ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (190,84,3,'Bosch');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (191,84,3,'Hitachi ');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (192,84,3,'Others');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (194,96,1,'Hercules');
insert  into `_jbrandnames`(`brandid`,`subcateid`,`categid`,`brandname`) values (195,96,1,'Hero');

/*Table structure for table `_jcategory` */

DROP TABLE IF EXISTS `_jcategory`;

CREATE TABLE `_jcategory` (
  `categid` int(11) NOT NULL AUTO_INCREMENT,
  `categname` varchar(255) DEFAULT NULL,
  `imagepath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`categid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `_jcategory` */

insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (1,'Automobiles','assets/icons/car.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (2,'Mobiles & Tablets','assets/icons/smartphone.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (3,'Electronics & Appliances','assets/icons/outlet.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (4,'Real Estate','assets/icons/building.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (5,'Jobs','assets/icons/elearning.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (6,'Fashion','assets/icons/fashion.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (7,'Food Items','assets/icons/food.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (8,'Services & Agricultures','assets/icons/solution.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (12,'Entertainment','assets/icons/entertainment.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (13,'Pets','assets/icons/pets.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (14,'Furniture','assets/icons/couch.png');
insert  into `_jcategory`(`categid`,`categname`,`imagepath`) values (15,'My Needs','assets/icons/myneeds.png');

/*Table structure for table `_jcitynames` */

DROP TABLE IF EXISTS `_jcitynames`;

CREATE TABLE `_jcitynames` (
  `citynameid` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) DEFAULT NULL,
  `countryname` varchar(255) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `statename` varchar(255) DEFAULT NULL,
  `distcid` int(11) DEFAULT NULL,
  `districtname` varchar(255) DEFAULT NULL,
  `cityname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`citynameid`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

/*Data for the table `_jcitynames` */

insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (1,1,'India',31,'TamilNadu',55,'Cuddalore','Annamalai Nagar');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (2,1,'India',31,'TamilNadu',55,'Cuddalore','Bhuvanagiri');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (3,1,'India',31,'TamilNadu',55,'Cuddalore','Chidambaram');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (4,1,'India',31,'TamilNadu',55,'Cuddalore','Cuddalore');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (5,1,'India',31,'TamilNadu',55,'Cuddalore','Kattumannarkoil');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (6,1,'India',31,'TamilNadu',55,'Cuddalore','Killai');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (7,1,'India',31,'TamilNadu',55,'Cuddalore','Kurinjipadi');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (8,1,'India',31,'TamilNadu',55,'Cuddalore','Lalpet');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (9,1,'India',31,'TamilNadu',55,'Cuddalore','Mangalampet');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (10,1,'India',31,'TamilNadu',55,'Cuddalore','Melpattampakkam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (11,1,'India',31,'TamilNadu',55,'Cuddalore','Nellikuppam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (12,1,'India',31,'TamilNadu',55,'Cuddalore','Neyveli');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (13,1,'India',31,'TamilNadu',55,'Cuddalore','Panruti');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (14,1,'India',31,'TamilNadu',55,'Cuddalore','Parangipettai');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (15,1,'India',31,'TamilNadu',55,'Cuddalore','Pennadam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (16,1,'India',31,'TamilNadu',55,'Cuddalore','Sethiathoppu');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (17,1,'India',31,'TamilNadu',55,'Cuddalore','Sethiathoppu');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (18,1,'India',31,'TamilNadu',55,'Cuddalore','Thirupathiripuliyur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (19,1,'India',31,'TamilNadu',55,'Cuddalore','Tittakudi');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (20,1,'India',31,'TamilNadu',55,'Cuddalore','Vadalur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (21,1,'India',31,'TamilNadu',55,'Cuddalore','Virudhachalam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (22,1,'India',31,'TamilNadu',56,'Villuppuram','Ananthapuram');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (23,1,'India',31,'TamilNadu',56,'Villuppuram','Arakandanallur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (24,1,'India',31,'TamilNadu',56,'Villuppuram','Auroville');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (25,1,'India',31,'TamilNadu',56,'Villuppuram','Gingee');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (26,1,'India',31,'TamilNadu',56,'Villuppuram','Kiliyanur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (27,1,'India',31,'TamilNadu',56,'Villuppuram','Kottakuppam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (28,1,'India',31,'TamilNadu',56,'Villuppuram','Marakkanam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (29,1,'India',31,'TamilNadu',56,'Villuppuram','Melmalayanur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (30,1,'India',31,'TamilNadu',56,'Villuppuram','Melmaruvathur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (31,1,'India',31,'TamilNadu',56,'Villuppuram','Olakur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (32,1,'India',31,'TamilNadu',56,'Villuppuram','Pombur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (33,1,'India',31,'TamilNadu',56,'Villuppuram','Thennamadevi');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (34,1,'India',31,'TamilNadu',56,'Villuppuram','Thiruvennainallur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (35,1,'India',31,'TamilNadu',56,'Villuppuram','Tindivanam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (36,1,'India',31,'TamilNadu',56,'Villuppuram','Valavanur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (37,1,'India',31,'TamilNadu',56,'Villuppuram','Veerabayangaram');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (38,1,'India',31,'TamilNadu',56,'Villuppuram','Veerapondi');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (39,1,'India',31,'TamilNadu',56,'Villuppuram','Vikravandi');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (40,1,'India',31,'TamilNadu',56,'Villuppuram','Viluppuram');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (41,1,'India',131,'Pondicherry',1164,'Karaikal','Karaikal');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (42,1,'India',131,'Pondicherry',1164,'Karaikal','Nedungadu');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (43,1,'India',131,'Pondicherry',1164,'Karaikal','Neravy');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (44,1,'India',131,'Pondicherry',1164,'Karaikal','Thirunallar');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (45,1,'India',131,'Pondicherry',1164,'Karaikal','Tirumalairayanpattinam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (46,1,'India',131,'Pondicherry',1166,'Puduchery','Pondicherry');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (47,1,'India',131,'Pondicherry',1166,'Puduchery','Ariyankuppam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (48,1,'India',131,'Pondicherry',1166,'Puduchery','Bahour');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (49,1,'India',131,'Pondicherry',1166,'Puduchery','Dharmapuri');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (50,1,'India',131,'Pondicherry',1166,'Puduchery','Kalapet');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (51,1,'India',131,'Pondicherry',1166,'Puduchery','Kamaraj Nagar');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (52,1,'India',131,'Pondicherry',1166,'Puduchery','Kurumbapet');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (53,1,'India',131,'Pondicherry',1166,'Puduchery','Lawspet');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (54,1,'India',131,'Pondicherry',1166,'Puduchery','Manavely');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (55,1,'India',131,'Pondicherry',1166,'Puduchery','Muthialpet');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (56,1,'India',131,'Pondicherry',1166,'Puduchery','Ozhukarai');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (57,1,'India',131,'Pondicherry',1166,'Puduchery','Villianur');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (58,1,'India',131,'Pondicherry',1167,'Yanam','Yanam');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (59,1,'India',131,'Pondicherry',1165,'Mahe','Mahe');
insert  into `_jcitynames`(`citynameid`,`countryid`,`countryname`,`stateid`,`statename`,`distcid`,`districtname`,`cityname`) values (60,1,'India',131,'Pondicherry',1165,'Mahe','Pandakkal');

/*Table structure for table `_jcontactus` */

DROP TABLE IF EXISTS `_jcontactus`;

CREATE TABLE `_jcontactus` (
  `contid` int(11) NOT NULL AUTO_INCREMENT,
  `contmob` varchar(255) DEFAULT NULL,
  `contemail` varchar(255) DEFAULT NULL,
  `personname` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `convtime` varchar(100) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`contid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `_jcontactus` */

insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (1,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:49:37');
insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (2,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:49:43');
insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (3,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:49:53');
insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (4,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:51:04');
insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (5,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:51:10');
insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (6,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:58:25');
insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (7,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:58:49');
insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (8,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:58:54');
insert  into `_jcontactus`(`contid`,`contmob`,`contemail`,`personname`,`subject`,`content`,`convtime`,`postedon`) values (9,'9843448795','rholeadpost@gmail.com','rhole','Regarding package upgrade','To mail or contact this details','8 to 6','2020-11-13 06:59:01');

/*Table structure for table `_jcountrynames` */

DROP TABLE IF EXISTS `_jcountrynames`;

CREATE TABLE `_jcountrynames` (
  `countryid` int(11) NOT NULL AUTO_INCREMENT,
  `countryname` varchar(255) DEFAULT NULL,
  `countrycode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`countryid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_jcountrynames` */

insert  into `_jcountrynames`(`countryid`,`countryname`,`countrycode`) values (1,'India','in');

/*Table structure for table `_jdistrictnames` */

DROP TABLE IF EXISTS `_jdistrictnames`;

CREATE TABLE `_jdistrictnames` (
  `distcid` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) DEFAULT NULL,
  `countryname` varchar(255) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `statename` varchar(255) DEFAULT NULL,
  `districtname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`distcid`)
) ENGINE=InnoDB AUTO_INCREMENT=1168 DEFAULT CHARSET=latin1;

/*Data for the table `_jdistrictnames` */

insert  into `_jdistrictnames`(`distcid`,`countryid`,`countryname`,`stateid`,`statename`,`districtname`) values (55,1,'India',31,'TamilNadu','Cuddalore');
insert  into `_jdistrictnames`(`distcid`,`countryid`,`countryname`,`stateid`,`statename`,`districtname`) values (56,1,'India',31,'TamilNadu','Villuppuram');
insert  into `_jdistrictnames`(`distcid`,`countryid`,`countryname`,`stateid`,`statename`,`districtname`) values (1164,1,'India',131,'Pondicherry ','Karaikal');
insert  into `_jdistrictnames`(`distcid`,`countryid`,`countryname`,`stateid`,`statename`,`districtname`) values (1165,1,'India',131,'Pondicherry ','Mahe');
insert  into `_jdistrictnames`(`distcid`,`countryid`,`countryname`,`stateid`,`statename`,`districtname`) values (1166,1,'India',131,'Pondicherry ','Puduchery');
insert  into `_jdistrictnames`(`distcid`,`countryid`,`countryname`,`stateid`,`statename`,`districtname`) values (1167,1,'India',131,'Pondicherry ','Yanam');

/*Table structure for table `_jfaq` */

DROP TABLE IF EXISTS `_jfaq`;

CREATE TABLE `_jfaq` (
  `faqid` int(11) NOT NULL AUTO_INCREMENT,
  `faqques` varchar(255) DEFAULT NULL,
  `faqans` text,
  `ispublished` int(2) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  `isusefulY` int(5) DEFAULT '1',
  `isusefulN` int(5) DEFAULT '0',
  PRIMARY KEY (`faqid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_jfaq` */

/*Table structure for table `_jfavorites` */

DROP TABLE IF EXISTS `_jfavorites`;

CREATE TABLE `_jfavorites` (
  `favadid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `adid` int(11) DEFAULT NULL,
  `addedon` datetime DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`favadid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jfavorites` */

/*Table structure for table `_jfeatures_likedcontact` */

DROP TABLE IF EXISTS `_jfeatures_likedcontact`;

CREATE TABLE `_jfeatures_likedcontact` (
  `likedcontactid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `adid` int(11) DEFAULT NULL,
  `viewedon` datetime DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`likedcontactid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_jfeatures_likedcontact` */

/*Table structure for table `_jfonts` */

DROP TABLE IF EXISTS `_jfonts`;

CREATE TABLE `_jfonts` (
  `fontid` int(11) NOT NULL AUTO_INCREMENT,
  `fontname` varchar(255) DEFAULT NULL,
  `fontpath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fontid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `_jfonts` */

insert  into `_jfonts`(`fontid`,`fontname`,`fontpath`) values (1,'oswald','http://fonts.googleapis.com/css?family=Oswald');
insert  into `_jfonts`(`fontid`,`fontname`,`fontpath`) values (2,'Droid Sans','http://fonts.googleapis.com/css?family=Droid+Sans');

/*Table structure for table `_jmenu` */

DROP TABLE IF EXISTS `_jmenu`;

CREATE TABLE `_jmenu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `pageid` int(11) DEFAULT NULL,
  `orderf` int(2) DEFAULT '0',
  `isheader` int(2) DEFAULT '1',
  `target` int(2) DEFAULT '0',
  `customurl` varchar(255) DEFAULT NULL,
  `linkedto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `_jmenu` */

insert  into `_jmenu`(`menuid`,`menuname`,`pageid`,`orderf`,`isheader`,`target`,`customurl`,`linkedto`) values (1,'test menu',1,1,1,0,'','frmpage');
insert  into `_jmenu`(`menuid`,`menuname`,`pageid`,`orderf`,`isheader`,`target`,`customurl`,`linkedto`) values (2,'Postnewad',1,2,1,0,'','frmpostad');
insert  into `_jmenu`(`menuid`,`menuname`,`pageid`,`orderf`,`isheader`,`target`,`customurl`,`linkedto`) values (3,'privacy',1,1,0,0,'','frmpage');

/*Table structure for table `_jpages` */

DROP TABLE IF EXISTS `_jpages`;

CREATE TABLE `_jpages` (
  `pageid` int(11) NOT NULL AUTO_INCREMENT,
  `pagetitle` varchar(255) DEFAULT NULL,
  `pagedescription` text,
  `pagetype` varchar(2) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL,
  `ispublish` int(2) DEFAULT NULL,
  `ishomepage` int(2) DEFAULT NULL,
  `noofvisit` int(11) DEFAULT '0',
  PRIMARY KEY (`pageid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_jpages` */

/*Table structure for table `_jpostads` */

DROP TABLE IF EXISTS `_jpostads`;

CREATE TABLE `_jpostads` (
  `postadid` int(11) NOT NULL AUTO_INCREMENT,
  `categid` int(11) DEFAULT NULL,
  `subcateid` int(11) DEFAULT NULL,
  `title` text,
  `content` text,
  `postedon` datetime DEFAULT NULL,
  `visitors` int(11) DEFAULT '0',
  `isactive` int(2) DEFAULT '1',
  `isdelete` int(2) DEFAULT '0',
  `postedby` int(11) DEFAULT NULL,
  `adtype` int(3) DEFAULT NULL,
  `stateid` int(3) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `distcid` int(5) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `brandid` int(11) DEFAULT '0',
  `Mtype` varchar(255) DEFAULT '0',
  `SalaryPeriod` varchar(255) DEFAULT '0',
  `PositionType` varchar(255) DEFAULT '0',
  `SalaryFrom` varchar(255) DEFAULT '0',
  `salaryTo` varchar(255) DEFAULT '0',
  `Year` varchar(255) DEFAULT '0',
  `Fuel` varchar(255) DEFAULT '0',
  `Transmission` varchar(255) DEFAULT '0',
  `KMDriven` varchar(255) DEFAULT '0',
  `NoofOwners` varchar(255) DEFAULT '0',
  `BedRooms` varchar(100) DEFAULT '0',
  `BathRooms` varchar(100) DEFAULT '0',
  `Furnishing` varchar(100) DEFAULT '0',
  `ListedBy` varchar(100) DEFAULT '0',
  `SuperBuildUpArea` varchar(255) DEFAULT '0',
  `CarpetArea` varchar(255) DEFAULT '0',
  `BachelorsAllowed` varchar(100) DEFAULT '0',
  `Maintenance` varchar(255) DEFAULT '0',
  `TotalFloors` int(11) DEFAULT '0',
  `FloorNo` int(11) DEFAULT '0',
  `CarParking` varchar(100) DEFAULT '0',
  `Facing` varchar(200) DEFAULT '0',
  `ProjectName` varchar(255) DEFAULT '0',
  `ConstructionStatus` varchar(100) DEFAULT '0',
  `Washrooms` varchar(100) DEFAULT '0',
  `PlotArea` varchar(100) DEFAULT '0',
  `Length` varchar(100) DEFAULT '0',
  `Breadth` varchar(100) DEFAULT '0',
  `MealsIncluded` varchar(100) DEFAULT '0',
  `ispublish` int(3) DEFAULT '1',
  `expiredon` datetime DEFAULT NULL,
  `filepath1` varchar(255) DEFAULT NULL,
  `filepath2` varchar(255) DEFAULT NULL,
  `filepath3` varchar(255) DEFAULT NULL,
  `filepath4` varchar(255) DEFAULT NULL,
  `filepath5` varchar(255) DEFAULT NULL,
  `filepath6` varchar(255) DEFAULT NULL,
  `ispaid` int(2) DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `isdeleted` int(11) DEFAULT '0',
  `deletedon` datetime DEFAULT NULL,
  `pposted` int(11) DEFAULT NULL,
  `AdPackageID` int(11) DEFAULT '0',
  `UserPackageID` int(11) DEFAULT '0',
  `DateFrom` datetime DEFAULT NULL,
  `DateTo` datetime DEFAULT NULL,
  `Model` int(11) DEFAULT '0',
  `Variant` int(11) DEFAULT '0',
  `CustomerName` varchar(255) DEFAULT NULL,
  `CustomerMobileNumber` varchar(100) DEFAULT NULL,
  `CustomerEmailID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`postadid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `_jpostads` */

insert  into `_jpostads`(`postadid`,`categid`,`subcateid`,`title`,`content`,`postedon`,`visitors`,`isactive`,`isdelete`,`postedby`,`adtype`,`stateid`,`countryid`,`distcid`,`cityid`,`brandid`,`Mtype`,`SalaryPeriod`,`PositionType`,`SalaryFrom`,`salaryTo`,`Year`,`Fuel`,`Transmission`,`KMDriven`,`NoofOwners`,`BedRooms`,`BathRooms`,`Furnishing`,`ListedBy`,`SuperBuildUpArea`,`CarpetArea`,`BachelorsAllowed`,`Maintenance`,`TotalFloors`,`FloorNo`,`CarParking`,`Facing`,`ProjectName`,`ConstructionStatus`,`Washrooms`,`PlotArea`,`Length`,`Breadth`,`MealsIncluded`,`ispublish`,`expiredon`,`filepath1`,`filepath2`,`filepath3`,`filepath4`,`filepath5`,`filepath6`,`ispaid`,`location`,`amount`,`isdeleted`,`deletedon`,`pposted`,`AdPackageID`,`UserPackageID`,`DateFrom`,`DateTo`,`Model`,`Variant`,`CustomerName`,`CustomerMobileNumber`,`CustomerEmailID`) values (1,8,126,'Urgent sale new piece 3 burner automatic stove','Urgent sale new piece 3 burner automatic stove','2020-11-11 20:56:23',0,1,0,3,NULL,31,1,55,6,0,'0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',0,0,'0','0','0','0','0','0','0','0','0',1,NULL,'_16051083061605108306_119980399scr10214794707761495621334.jpg','','','','','',0,NULL,'1999',0,NULL,NULL,0,0,NULL,NULL,0,0,'Jaikanth','9655764576','jkmagi8@gmail.com');
insert  into `_jpostads`(`postadid`,`categid`,`subcateid`,`title`,`content`,`postedon`,`visitors`,`isactive`,`isdelete`,`postedby`,`adtype`,`stateid`,`countryid`,`distcid`,`cityid`,`brandid`,`Mtype`,`SalaryPeriod`,`PositionType`,`SalaryFrom`,`salaryTo`,`Year`,`Fuel`,`Transmission`,`KMDriven`,`NoofOwners`,`BedRooms`,`BathRooms`,`Furnishing`,`ListedBy`,`SuperBuildUpArea`,`CarpetArea`,`BachelorsAllowed`,`Maintenance`,`TotalFloors`,`FloorNo`,`CarParking`,`Facing`,`ProjectName`,`ConstructionStatus`,`Washrooms`,`PlotArea`,`Length`,`Breadth`,`MealsIncluded`,`ispublish`,`expiredon`,`filepath1`,`filepath2`,`filepath3`,`filepath4`,`filepath5`,`filepath6`,`ispaid`,`location`,`amount`,`isdeleted`,`deletedon`,`pposted`,`AdPackageID`,`UserPackageID`,`DateFrom`,`DateTo`,`Model`,`Variant`,`CustomerName`,`CustomerMobileNumber`,`CustomerEmailID`) values (2,3,15,'ZEBRONICS KEYBOARD COMBO ','ZEBRONICS KEYBOARD COMBO 500/-\r\nGENTER WIRELESS KEYBOARD COMBO 800\r\nZEBRONICS USB MOUSE \r\nALEX  & RISE 200/-\r\nDAZZLE  WIRELESS MOUSE ₹ 300\r\nCall me 9868970587 , 8383992885','2021-02-18 07:34:08',0,1,0,4,NULL,31,1,55,9,0,'0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',0,0,'0','0','0','0','0','0','0','0','0',1,NULL,'_16136138051613613805_fb_img_1613546935549.jpg','_16136138151613613815_fb_img_1613546923060.jpg','_16136138271613613827_fb_img_1613543657230.jpg','_16136138351613613835_fb_img_1613543652480.jpg','_16136138351613613835_fb_img_1613543649379.jpg','',0,NULL,'300',0,NULL,NULL,0,0,NULL,NULL,0,0,'Param ','9868970587','singhtechcommunication@gmail.com');

/*Table structure for table `_jpostads_deleted` */

DROP TABLE IF EXISTS `_jpostads_deleted`;

CREATE TABLE `_jpostads_deleted` (
  `deletedpostadid` int(11) NOT NULL AUTO_INCREMENT,
  `postadid` int(11) DEFAULT NULL,
  `categid` int(11) DEFAULT NULL,
  `subcateid` int(11) DEFAULT NULL,
  `title` text,
  `content` text,
  `postedon` datetime DEFAULT NULL,
  `visitors` int(11) DEFAULT '0',
  `isactive` int(2) DEFAULT '1',
  `isdelete` int(2) DEFAULT '0',
  `postedby` int(11) DEFAULT NULL,
  `adtype` int(3) DEFAULT NULL,
  `stateid` int(3) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `distcid` int(5) DEFAULT NULL,
  `ispublish` int(3) DEFAULT '1',
  `expiredon` datetime DEFAULT NULL,
  `filepath1` varchar(255) DEFAULT NULL,
  `filepath2` varchar(255) DEFAULT NULL,
  `ispaid` int(2) DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `isdeleted` int(11) DEFAULT '0',
  `deletedon` datetime DEFAULT NULL,
  `pposted` int(11) DEFAULT NULL,
  PRIMARY KEY (`deletedpostadid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_jpostads_deleted` */

/*Table structure for table `_jrecentlyviewed` */

DROP TABLE IF EXISTS `_jrecentlyviewed`;

CREATE TABLE `_jrecentlyviewed` (
  `viewedid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `adid` int(11) DEFAULT NULL,
  `viewedon` datetime DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`viewedid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `_jrecentlyviewed` */

insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (1,1,1,'2020-11-11 11:27:43','106.217.15.198');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (2,NULL,4129,'2020-11-11 11:39:58','106.217.15.198');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (3,NULL,4129,'2020-11-11 11:40:04','106.217.15.198');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (4,2,0,'2020-11-11 12:42:26','42.106.184.40');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (5,NULL,1,'2020-11-11 23:59:44','42.106.185.3');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (6,2,1,'2020-11-12 00:00:46','42.106.185.3');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (7,2,1,'2020-11-12 00:02:38','42.106.185.3');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (8,NULL,1,'2020-11-12 19:39:24','117.251.40.204');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (9,NULL,1,'2020-11-13 18:45:25','106.217.15.240');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (10,2,0,'2020-11-16 17:43:37','42.106.184.188');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (11,2,0,'2020-11-16 17:44:01','42.106.184.188');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (12,NULL,1,'2020-11-18 22:19:13','106.217.15.199');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (13,NULL,1,'2020-11-18 22:19:13','106.217.15.199');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (14,NULL,1,'2020-11-19 12:19:35','108.177.7.81');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (15,NULL,1,'2020-11-19 12:20:06','108.177.7.81');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (16,NULL,1,'2020-11-19 12:20:11','108.177.7.81');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (17,NULL,1,'2020-11-22 08:44:55','66.249.71.5');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (18,NULL,1,'2020-11-24 16:57:24','103.54.220.78');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (19,NULL,1,'2020-12-05 22:33:58','66.249.73.62');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (20,NULL,1,'2020-12-06 07:03:37','66.249.73.32');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (21,NULL,1,'2020-12-17 15:53:38','66.249.65.220');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (22,NULL,1,'2020-12-26 01:20:45','66.249.68.26');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (23,NULL,1,'2020-12-27 13:42:45','66.249.68.28');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (24,NULL,1,'2021-01-08 03:53:29','66.249.65.221');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (25,NULL,1,'2021-01-18 10:01:13','66.249.65.220');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (26,NULL,1,'2021-01-19 03:57:30','66.249.65.220');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (27,NULL,1,'2021-01-24 08:30:57','66.249.65.220');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (28,NULL,1,'2021-01-26 06:59:37','66.249.66.222');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (29,NULL,1,'2021-02-01 15:20:37','199.192.115.18');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (30,NULL,1,'2021-02-15 16:38:55','66.249.68.30');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (31,NULL,1,'2021-02-19 00:02:28','66.249.68.30');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (32,NULL,2,'2021-02-19 00:05:27','66.249.68.30');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (33,NULL,2,'2021-02-19 00:19:58','66.249.68.26');
insert  into `_jrecentlyviewed`(`viewedid`,`userid`,`adid`,`viewedon`,`ip`) values (34,NULL,2,'2021-02-19 03:33:49','66.249.68.30');

/*Table structure for table `_jsitesettings` */

DROP TABLE IF EXISTS `_jsitesettings`;

CREATE TABLE `_jsitesettings` (
  `settingsid` int(11) NOT NULL AUTO_INCREMENT,
  `param` varchar(255) DEFAULT NULL,
  `paramvalue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`settingsid`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `_jsitesettings` */

insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (1,'sitetitle','rhole.in');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (2,'sitename','rhole.in');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (3,'siteurl','http://www.rhole.in');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (4,'logo','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (5,'favicon',NULL);
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (6,'backgroundimg','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (7,'sitebgposition','no-repeat');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (8,'backgroundcolor','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (9,'menubgimage','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (10,'menubgcolor','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (11,'menufont','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (12,'menufontcolor','FF0000');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (13,'menuhover','222222');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (14,'menufontsize','20');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (15,'footerbgimage','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (16,'footerbgcolor','F0FFE3');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (17,'footerfont','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (18,'footerfontcolor','7D548F');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (19,'footerhover','B8EEFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (20,'footerfontsize','11');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (21,'footerbanner','DFDBFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (22,'noimage','_1420013424_noimg.jpg');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (23,'isenablecontact','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (24,'linkedpage','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (25,'emailto','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (26,'isenablefaq','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (27,'isenablestory','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (28,'isenabletestimonial','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (29,'isenableadpost','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (30,'isenablesupport','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (31,'twitterurl','www.twitter.com');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (32,'youtubeurl','www.youtube.com');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (33,'googleplusurl','www.googleplus.com');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (34,'facebookurl','www.facebook.com');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (35,'sharepage','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (36,'sharesize','small');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (37,'postadperpage','10');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (38,'storyperpage','3');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (39,'testmperpage','4');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (40,'displaycontactushome','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (41,'displaycontact','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (42,'layout','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (43,'isenableproduct','1');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (44,'isenablesubscriber','0');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (45,'headerbgimg','');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (46,'headerbgcolor','FFFFFF');
insert  into `_jsitesettings`(`settingsid`,`param`,`paramvalue`) values (47,'sliderhideicon','none');

/*Table structure for table `_jslider` */

DROP TABLE IF EXISTS `_jslider`;

CREATE TABLE `_jslider` (
  `sliderid` int(11) NOT NULL AUTO_INCREMENT,
  `slidertitle` varchar(255) DEFAULT NULL,
  `sliderdesc` text,
  `filepath` varchar(255) DEFAULT NULL,
  `ispublished` int(2) DEFAULT '0',
  `postedon` datetime DEFAULT NULL,
  `sliderorder` int(2) DEFAULT NULL,
  PRIMARY KEY (`sliderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_jslider` */

/*Table structure for table `_jstatenames` */

DROP TABLE IF EXISTS `_jstatenames`;

CREATE TABLE `_jstatenames` (
  `stateid` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) DEFAULT NULL,
  `statenames` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`stateid`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

/*Data for the table `_jstatenames` */

insert  into `_jstatenames`(`stateid`,`countryid`,`statenames`) values (31,1,'TamilNadu');
insert  into `_jstatenames`(`stateid`,`countryid`,`statenames`) values (131,1,'Pondicherry ');

/*Table structure for table `_jsubcategory` */

DROP TABLE IF EXISTS `_jsubcategory`;

CREATE TABLE `_jsubcategory` (
  `subcateid` int(11) NOT NULL AUTO_INCREMENT,
  `categid` int(11) DEFAULT NULL,
  `subcatename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`subcateid`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

/*Data for the table `_jsubcategory` */

insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (2,2,'Mobile Phones');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (4,4,'For Sale: Houses & Apartments');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (14,2,'Accessories');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (15,3,'Computer & Laptops');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (20,4,'For Rent Houses & Apartments');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (21,4,'For Rent: Shops & Offices');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (22,4,'For Sale: Shops & Offices');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (23,4,'PG & Guest Houses');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (24,4,'Lands & Plots');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (25,5,'Supervisor & manager');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (26,5,'BPO & Telecaller');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (27,5,'IT Engineer & Developer');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (28,5,'Dealer & Distributors');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (29,6,'Gym & Fitness');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (30,6,'Others');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (31,6,'Mens wears');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (32,6,'Women wears');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (33,7,'Fruits');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (34,7,'Vegetables');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (35,7,'Pickles');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (36,7,'Nuts');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (37,7,'Other foods');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (38,8,'Astrology');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (42,9,'Dog');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (43,9,'Bird');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (44,9,'Cat');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (45,9,'Fish');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (46,10,'Charity');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (47,10,'Announcement');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (48,10,'Tender');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (49,10,'Lost');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (50,11,'Grooms');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (51,11,'Brides');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (52,11,'Wedding Planners');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (53,12,'Books');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (54,12,'Hobbies');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (55,12,'Actor');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (56,12,'Acting Schools');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (57,12,'Makeup');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (58,12,'Directors');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (59,NULL,'Hotels & Resorts');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (60,1,'Cars');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (61,1,'Bikes');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (62,1,'Commerical Vehicles');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (63,1,'Spare Parts');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (65,1,'Scooters');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (66,1,'Other Vehicles');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (67,5,'Data Entry & Back Office');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (68,5,'Sales & Marketing');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (69,5,'Driver');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (70,5,'Office Assistant & Helper');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (71,5,'Delivery & Collection');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (72,5,'Hospital Jobs');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (73,5,'Cook & Maid');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (74,5,'Receptionist & Admin');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (75,5,'Operator & Technician');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (76,5,'Electrician & Plumber');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (77,0,'Accountant');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (78,5,'Designer');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (79,5,'Other Jobs');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (80,3,'TVs Video & Audio');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (81,3,'Kitchen & Other Applicances');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (83,3,'Cameras & Lenses');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (84,3,'Fridges');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (85,3,'Washing Machines');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (86,3,'Airconditioners & Coolers');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (88,NULL,'Water Heaters');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (89,2,'Tablets');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (90,NULL,'efilling ');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (91,NULL,'Kids wear');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (94,12,'Kids & Toys');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (95,5,'Part Time Jobs');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (96,1,'Bicycles');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (97,6,'Kids wears');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (98,8,'Drivers & Taxi');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (99,8,'Health & Beauty');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (100,8,'Other Services');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (101,8,'Electronics & Computer');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (102,8,'Education & Classes');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (103,13,'Fishes & Aquarium');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (104,13,'Pet Food & Accessories');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (105,13,'Dogs');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (106,13,'Other Pets');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (107,14,'Sofa & Dining');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (108,14,'Beds & Cod');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (109,14,'Home Decor & Garden');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (110,14,'Kids Furniture');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (111,14,'Other Household Items');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (112,15,'Jobs');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (113,0,'Gym & Fitness');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (114,12,'Musical Instruments');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (115,12,'Sports Equipment');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (116,15,'Others Needs');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (117,14,'Office Furniture');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (118,14,'Chairs & Wardrobes ');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (119,3,'Spare parts');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (120,5,'Agriculture Jobs');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (123,NULL,'Bus');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (124,NULL,'Truck');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (125,NULL,'Others');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (126,8,'Home Services');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (127,8,'Event Services');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (128,8,'Travel Services');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (129,8,'Financial Services');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (130,8,'Business Opportunities');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (131,NULL,'Office assistant & Helper');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (132,NULL,'Accountant and Finance');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (133,5,'Accountant and Finance');
insert  into `_jsubcategory`(`subcateid`,`categid`,`subcatename`) values (134,5,'Teacher & Hr ');

/*Table structure for table `_jsubscriber` */

DROP TABLE IF EXISTS `_jsubscriber`;

CREATE TABLE `_jsubscriber` (
  `subscribid` int(11) NOT NULL AUTO_INCREMENT,
  `subscribname` varchar(255) DEFAULT NULL,
  `subscribemail` varchar(255) DEFAULT NULL,
  `subscribmob` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  PRIMARY KEY (`subscribid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_jsubscriber` */

/*Table structure for table `_jsuccessstory` */

DROP TABLE IF EXISTS `_jsuccessstory`;

CREATE TABLE `_jsuccessstory` (
  `storyid` int(11) NOT NULL AUTO_INCREMENT,
  `storytitle` varchar(255) DEFAULT NULL,
  `storydesc` varchar(255) DEFAULT NULL,
  `storyname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `storytype` varchar(100) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `postedon` datetime DEFAULT NULL,
  `lastmodified` datetime DEFAULT NULL,
  `ispublish` int(2) DEFAULT '0',
  PRIMARY KEY (`storyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_jsuccessstory` */

/*Table structure for table `_jusertable` */

DROP TABLE IF EXISTS `_jusertable`;

CREATE TABLE `_jusertable` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `personname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `isadmin` int(2) DEFAULT '0',
  `isstaff` int(11) DEFAULT '0',
  `mobile` varchar(255) DEFAULT NULL,
  `ismobileverified` int(11) DEFAULT '0',
  `mobileverifiedon` datetime DEFAULT NULL,
  `isemailverified` int(11) DEFAULT '0',
  `emailverifiedon` datetime DEFAULT NULL,
  `countryid` int(11) DEFAULT '0',
  `countryname` varchar(255) DEFAULT NULL,
  `stateid` int(11) DEFAULT '0',
  `statename` varchar(255) DEFAULT NULL,
  `districtid` int(11) DEFAULT '0',
  `districtname` varchar(255) DEFAULT NULL,
  `AllowtoSellProduct` int(11) DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `_jusertable` */

insert  into `_jusertable`(`userid`,`personname`,`email`,`pwd`,`createdon`,`isadmin`,`isstaff`,`mobile`,`ismobileverified`,`mobileverifiedon`,`isemailverified`,`emailverifiedon`,`countryid`,`countryname`,`stateid`,`statename`,`districtid`,`districtname`,`AllowtoSellProduct`) values (1,'Admin','admin@rhole.in','9514239096','2020-11-11 09:01:44',1,0,'9988776655',1,NULL,1,'2020-11-11 09:55:14',1,NULL,31,'TamilNadu',56,'Villuppuram',0);
insert  into `_jusertable`(`userid`,`personname`,`email`,`pwd`,`createdon`,`isadmin`,`isstaff`,`mobile`,`ismobileverified`,`mobileverifiedon`,`isemailverified`,`emailverifiedon`,`countryid`,`countryname`,`stateid`,`statename`,`districtid`,`districtname`,`AllowtoSellProduct`) values (2,'Arunkani','arunrmech2020@gmail.com','qwerty123','2020-11-11 12:40:22',0,0,'9843448795',0,NULL,1,'2020-11-11 12:41:10',1,NULL,131,'Pondicherry ',1166,'Pondicherry',0);
insert  into `_jusertable`(`userid`,`personname`,`email`,`pwd`,`createdon`,`isadmin`,`isstaff`,`mobile`,`ismobileverified`,`mobileverifiedon`,`isemailverified`,`emailverifiedon`,`countryid`,`countryname`,`stateid`,`statename`,`districtid`,`districtname`,`AllowtoSellProduct`) values (3,'Jaikanth','jkmagi8@gmail.com','987654321','2020-11-11 19:24:12',0,0,'9655764576',0,NULL,1,'2020-11-11 19:24:41',1,NULL,31,'TamilNadu',55,'Cuddalore',0);
insert  into `_jusertable`(`userid`,`personname`,`email`,`pwd`,`createdon`,`isadmin`,`isstaff`,`mobile`,`ismobileverified`,`mobileverifiedon`,`isemailverified`,`emailverifiedon`,`countryid`,`countryname`,`stateid`,`statename`,`districtid`,`districtname`,`AllowtoSellProduct`) values (4,'Param ','singhtechcommunication@gmail.com','9868970587','2021-01-29 22:25:40',0,0,'9868970587',0,NULL,0,NULL,1,NULL,0,NULL,0,NULL,0);

/*Table structure for table `_jviewedcontact` */

DROP TABLE IF EXISTS `_jviewedcontact`;

CREATE TABLE `_jviewedcontact` (
  `viewedcontactid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `adid` int(11) DEFAULT NULL,
  `viewedon` datetime DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`viewedcontactid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `_jviewedcontact` */

insert  into `_jviewedcontact`(`viewedcontactid`,`userid`,`adid`,`viewedon`,`ip`) values (1,2,1,'2020-11-12 00:01:16','42.106.185.3');

/*Table structure for table `_tblPayments` */

DROP TABLE IF EXISTS `_tblPayments`;

CREATE TABLE `_tblPayments` (
  `PaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `TxnDate` datetime DEFAULT NULL,
  `TxnAmount` varchar(255) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `APIResposne` text,
  `TxnStatus` varchar(255) DEFAULT NULL,
  `ErrorMessage` varchar(255) DEFAULT NULL,
  `PaymentFor` varchar(255) DEFAULT NULL,
  `PaymentReqID` varchar(255) DEFAULT NULL,
  `PaymentResponse` text,
  `IsProcessed` int(11) DEFAULT '0',
  `PaymentFrom` varchar(255) DEFAULT NULL,
  `PlanID` int(11) DEFAULT '0',
  `AdID` int(11) DEFAULT '0',
  `Days` int(11) DEFAULT '0',
  `CategoryID` int(11) DEFAULT '0',
  PRIMARY KEY (`PaymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tblPayments` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_Log_MobileSMS` */

/*Table structure for table `_tbl_accounts` */

DROP TABLE IF EXISTS `_tbl_accounts`;

CREATE TABLE `_tbl_accounts` (
  `AccountID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FranchiseeID` int(11) DEFAULT NULL,
  `TxnDate` datetime DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `TxnValue` varchar(255) DEFAULT NULL,
  `Credit` varchar(255) DEFAULT NULL,
  `Debit` varchar(255) DEFAULT NULL,
  `Balance` varchar(255) DEFAULT NULL,
  `TxnID` int(11) DEFAULT NULL,
  PRIMARY KEY (`AccountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_accounts` */

/*Table structure for table `_tbl_adsPackage` */

DROP TABLE IF EXISTS `_tbl_adsPackage`;

CREATE TABLE `_tbl_adsPackage` (
  `AdPackageID` int(11) NOT NULL AUTO_INCREMENT,
  `PackageTitle` varchar(255) DEFAULT NULL,
  `AdsCount` int(11) DEFAULT NULL,
  `PackageCost` int(11) DEFAULT NULL,
  `Validity` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `SellingPrice` int(11) DEFAULT NULL,
  `Categories` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AdPackageID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_adsPackage` */

insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (1,'5 Ads for 7 Days',5,400,7,0,400,'');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (2,'5 Ads for 30 Days',5,1200,30,0,1200,'');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (3,'20 Ads for 1 Month',20,8000,30,NULL,800,'-4-,-1-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (4,'50 Ads for 1 Month',50,15000,30,NULL,1500,'-4-,-1-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (5,'100 Ads for 2 Months',100,25000,60,NULL,2500,'-4-,-1-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (6,'20 Ads for 1 Month',20,5000,30,NULL,500,'-2-,-5-,-7-,-8-,-12-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (7,'50 Ads for 1 Month',50,10000,30,NULL,1000,'-2-,-5-,-7-,-8-,-12-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (8,'100 Ads for 2 Months',100,15000,60,NULL,1500,'-2-,-5-,-7-,-8-,-12-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (9,'20 Ads for 1 Month',20,4000,30,NULL,400,'-3-,-6-,-9-,-14-,-13-,-15-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (10,'50 Ads for 1 Month',50,7000,30,NULL,700,'-3-,-6-,-9-,-14-,-13-,-15-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (11,'100 Ads for 2 Months',100,12000,60,NULL,1200,'-3-,-6-,-9-,-14-,-13-,-15-');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (12,'1 Ads for 30 Days',1,299,30,0,299,'');
insert  into `_tbl_adsPackage`(`AdPackageID`,`PackageTitle`,`AdsCount`,`PackageCost`,`Validity`,`CategoryID`,`SellingPrice`,`Categories`) values (13,'1 Ads for 7 Days',1,100,30,0,100,'');

/*Table structure for table `_tbl_favourite_add_logs` */

DROP TABLE IF EXISTS `_tbl_favourite_add_logs`;

CREATE TABLE `_tbl_favourite_add_logs` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `AddID` int(11) DEFAULT NULL,
  `AddByUserID` varchar(255) DEFAULT NULL,
  `LikedByUserID` int(11) DEFAULT '0',
  `ViewedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_favourite_add_logs` */

/*Table structure for table `_tbl_featured` */

DROP TABLE IF EXISTS `_tbl_featured`;

CREATE TABLE `_tbl_featured` (
  `featureadid` int(11) NOT NULL AUTO_INCREMENT,
  `adid` int(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `countryname` varchar(255) DEFAULT NULL,
  `stateid` int(11) DEFAULT NULL,
  `statename` varchar(255) DEFAULT NULL,
  `districtid` int(11) DEFAULT NULL,
  `districtname` varchar(255) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `categoryname` varchar(255) DEFAULT NULL,
  `subcategoryid` int(11) DEFAULT NULL,
  `subcategoryname` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `faamount` varchar(255) DEFAULT NULL,
  `ispublish` int(11) DEFAULT '1',
  `paymentid` int(11) DEFAULT NULL,
  `fromuserpackageid` int(11) DEFAULT '0',
  PRIMARY KEY (`featureadid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_featured` */

/*Table structure for table `_tbl_franchisee` */

DROP TABLE IF EXISTS `_tbl_franchisee`;

CREATE TABLE `_tbl_franchisee` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `FranchiseeID` int(11) DEFAULT NULL,
  `FranchiseeName` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `CountryID` int(11) DEFAULT NULL,
  `CountryName` varchar(255) DEFAULT NULL,
  `StateID` int(11) DEFAULT NULL,
  `StateName` varchar(255) DEFAULT NULL,
  `DistrictID` int(11) DEFAULT NULL,
  `DistrictName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_franchisee` */

/*Table structure for table `_tbl_franchisee_bank_details` */

DROP TABLE IF EXISTS `_tbl_franchisee_bank_details`;

CREATE TABLE `_tbl_franchisee_bank_details` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `FranchiseeID` int(11) DEFAULT '0',
  `BankName` varchar(255) DEFAULT NULL,
  `BranchName` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `District` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_franchisee_bank_details` */

insert  into `_tbl_franchisee_bank_details`(`BankID`,`FranchiseeID`,`BankName`,`BranchName`,`City`,`District`,`State`,`AccountName`,`AccountNumber`,`IFSCode`,`Remarks`,`IsActive`,`CreatedOn`) values (1,65,'','','','','','SUJI','35136960671','SBIN0011942',NULL,1,'2020-11-02 22:26:29');
insert  into `_tbl_franchisee_bank_details`(`BankID`,`FranchiseeID`,`BankName`,`BranchName`,`City`,`District`,`State`,`AccountName`,`AccountNumber`,`IFSCode`,`Remarks`,`IsActive`,`CreatedOn`) values (2,67,'','','','','','Kanisolai','6864886172','IDIB000V062',NULL,1,'2020-11-07 12:09:46');
insert  into `_tbl_franchisee_bank_details`(`BankID`,`FranchiseeID`,`BankName`,`BranchName`,`City`,`District`,`State`,`AccountName`,`AccountNumber`,`IFSCode`,`Remarks`,`IsActive`,`CreatedOn`) values (3,70,'','','','','','Kanisolai','6864886172','IDIB000V062',NULL,1,'2020-11-07 15:05:56');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `_tbl_franchisee_credits` */

/*Table structure for table `_tbl_franchisee_wallet` */

DROP TABLE IF EXISTS `_tbl_franchisee_wallet`;

CREATE TABLE `_tbl_franchisee_wallet` (
  `TxnID` int(11) NOT NULL AUTO_INCREMENT,
  `TxnDate` datetime DEFAULT NULL,
  `FranchiseeID` int(11) DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `Credits` varchar(255) DEFAULT NULL,
  `Debits` varchar(255) DEFAULT NULL,
  `Balance` varchar(255) DEFAULT NULL,
  `PaymentID` int(11) DEFAULT NULL,
  `WithdrwaID` int(11) DEFAULT NULL,
  `FranchiseeRemarks` varchar(255) DEFAULT NULL,
  `AdminRemarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TxnID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_franchisee_wallet` */

/*Table structure for table `_tbl_ifsc_log` */

DROP TABLE IF EXISTS `_tbl_ifsc_log`;

CREATE TABLE `_tbl_ifsc_log` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `OutPut` text,
  `TxnOn` datetime DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_ifsc_log` */

/*Table structure for table `_tbl_logs_email` */

DROP TABLE IF EXISTS `_tbl_logs_email`;

CREATE TABLE `_tbl_logs_email` (
  `EmailLogID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT '0',
  `EmailTo` varchar(255) DEFAULT NULL,
  `EmaildFor` varchar(255) DEFAULT NULL,
  `EmailSubject` text,
  `EmailContent` text,
  `EmailRequestedOn` datetime DEFAULT NULL,
  `EmailAPIID` int(11) DEFAULT '0',
  `APIRequestedOn` datetime DEFAULT NULL,
  `APIResponse` text,
  `IsSuccess` int(11) DEFAULT '0',
  `IsFailure` int(11) DEFAULT '0',
  `FailureMessage` text,
  `IsAttachment` int(11) DEFAULT '0',
  `AttachmentFile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EmailLogID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_logs_email` */

insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (1,1,'Jeyaraj_123@yahoo.com','','Rhole.in :) Email Verification','<div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;\">\n                        <div style=\"text-align:center;padding-bottom:20px;\">\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\n                        </div>\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\n                            Hello,\n                            <br><br>\n                            Your email verification Code is 46505\n                            <br><br>\n                            <br> \n                            Thanks <br>\n                            Support Team\n                        </div>\n                    </div>','2020-11-11 09:52:22',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (2,1,'Jeyaraj_123@yahoo.com','','KLX :) Your ad is now live!','\r\n                    <div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;\">\r\n                        <div style=\"text-align:center;padding-bottom:20px;\">\r\n                            <img src=\"https://www.klx.co.in/assets/cms/klx_log.png\" style=\"height:30px;\">&nbsp;&nbsp;\r\n                            <img src=\"https://www.klx.co.in/assets/img/in.png\" style=\"height:24px;border:1px solid #eee;border-radius:3px;\">\r\n                        </div>\r\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\r\n                            Hello,\r\n                            <br><br>\r\n                            Your ad is live, share it with friends to sell faster:\r\n                            <br><br>\r\n                            <p style=\"text-align:center\">\r\n                                <a href=\"https://www.rhole.in/in/v1-3333\" style=\"font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block\">VIEW AD</a>\r\n                            </p>               \r\n                            <br> \r\n                            Thanks <br>\r\n                            KLX Team\r\n                        </div>\r\n                        <p style=\"color:#888;padding:10px;text-align:center\">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>\r\n                    </div>','2020-11-11 11:27:10',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (3,1,'Jeyaraj_123@yahoo.com','','KLX :) Your ad is viewed by Jeyaraj','\n                    <div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;\">\n                        <div style=\"text-align:center;padding-bottom:20px;\">\n                            <img src=\"https://www.klx.co.in/assets/cms/klx_log.png\" style=\"height:30px;\">&nbsp;&nbsp;\n                            <img src=\"https://www.klx.co.in/assets/img/in.png\" style=\"height:24px;border:1px solid #eee;border-radius:3px;\">\n                        </div>\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\n                            Hello,\n                            <br><br>\n                            Your ad is viewed by Jeyaraj\n                            <br><br>\n                            <table>\n                                <tr>\n                                    <td>\n                                        <div style=\"border:1px solid #ccc;padding:20px;text-align:center;width: 100px;height: 100px;\">\n                                            <img src=\"https://www.rhole.in/assets/cms/demo/thumb/_16050741651605074165_3-login-page-screen.jpg\" style=\"width: 100px;height: 100px;\"><br><br>\n                                            <b><span style=\"font-size:15px;\">AD : 1</span></b><br>\n                                        </div><br><br>\n                                            Viewed By : <br>\n                                            Jeyaraj<br>\n                                            9988776655<br>\n                                            Jeyaraj_123@yahoo.com<br><br><br>\n                                    </td>\n                                    <td style=\"vertical-align:top;padding-left:10px\">\n                                        <b><span style=\"font-size:20px;\">3333</span></b><br>\n                                        33...\n                                    </td>\n                                </tr>\n                            </table>\n                            <p style=\"text-align:center\">\n                                <a href=\"https://www.rhole.in/in/v1-3333\" style=\"font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block\">VIEW AD</a>&nbsp;&nbsp;\n                            </p>             \n                            <br> \n                            Thanks <br>\n                            KLX Team\n                        </div>\n                    </div>','2020-11-11 11:27:43',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (4,2,'arunrmech2020@gmail.com','','Rhole.in :) Email Verification','<div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;\">\n                        <div style=\"text-align:center;padding-bottom:20px;\">\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\n                        </div>\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\n                            Hello,\n                            <br><br>\n                            Your email verification Code is 16287\n                            <br><br>\n                            <br> \n                            Thanks <br>\n                            Support Team\n                        </div>\n                    </div>','2020-11-11 12:40:28',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (5,3,'jkmagi8@gmail.com','','Rhole.in :) Email Verification','<div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;\">\n                        <div style=\"text-align:center;padding-bottom:20px;\">\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\n                        </div>\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\n                            Hello,\n                            <br><br>\n                            Your email verification Code is 36246\n                            <br><br>\n                            <br> \n                            Thanks <br>\n                            Support Team\n                        </div>\n                    </div>','2020-11-11 19:24:16',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (6,3,'jkmagi8@gmail.com','','Rhole.in :) Your ad is now live!','\r\n                    <div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;\">\r\n                        <div style=\"text-align:center;padding-bottom:20px;\">\r\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\r\n                        </div>\r\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\r\n                            Hello,\r\n                            <br><br>\r\n                            Your ad is live, share it with friends to sell faster:\r\n                            <br><br>\r\n                            <p style=\"text-align:center\">\r\n                                <a href=\"https://www.rhole.in/in/v1-Urgent sale new piece 3 burner automatic stove\" style=\"font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block\">VIEW AD</a>\r\n                            </p>               \r\n                            <br> \r\n                            Thanks <br>\r\n                            Support Team\r\n                        </div>\r\n                        <p style=\"color:#888;padding:10px;text-align:center\">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>\r\n                    </div>','2020-11-11 20:56:23',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (7,3,'jkmagi8@gmail.com','','Rhole.in :) Your ad is viewed by unknown person','\n                    <div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;\">\n                        <div style=\"text-align:center;padding-bottom:20px;\">\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\n                        </div>\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\n                            Hello,\n                            <br><br>\n                            Your ad is viewed by unknown person:\n                            <br><br>\n                            \n                            <table>\n                                <tr>\n                                    <td>\n                                        <div style=\"border:1px solid #ccc;padding:20px;text-align:center;width: 100px;height: 100px;\">\n                                            <img src=\"https://www.rhole.in/assets/cms/demo/thumb/_16051083061605108306_119980399scr10214794707761495621334.jpg\" style=\"width: 100px;height: 100px;\"><br><br>\n                                            <b><span style=\"font-size:15px;\">AD : 1</span></b>\n                                        </div>\n                                    </td>\n                                    <td style=\"vertical-align:top;padding-left:10px\">\n                                        <b><span style=\"font-size:20px;\">Urgent sale new piece 3 burner automatic stove</span></b><br>\n                                        Urgent sale new piece 3 burner automatic stove...\n                                    </td>\n                                </tr>\n                            </table>\n                            <p style=\"text-align:center\">\n                                <a href=\"https://www.rhole.in/in/v1-Urgent sale new piece 3 burner automatic stove\" style=\"font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block\">VIEW AD</a>\n                            </p>               \n                            <br> \n                            Thanks <br>\n                            Support Team\n                        </div>\n                    </div>','2020-11-11 23:59:44',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (8,3,'jkmagi8@gmail.com','','Rhole.in :) Your ad is viewed by Arunkani','\n                    <div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;\">\n                        <div style=\"text-align:center;padding-bottom:20px;\">\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\n                        </div>\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\n                            Hello,\n                            <br><br>\n                            Your ad is viewed by Arunkani\n                            <br><br>\n                            <table>\n                                <tr>\n                                    <td>\n                                        <div style=\"border:1px solid #ccc;padding:20px;text-align:center;width: 100px;height: 100px;\">\n                                            <img src=\"https://www.rhole.in/assets/cms/demo/thumb/_16051083061605108306_119980399scr10214794707761495621334.jpg\" style=\"width: 100px;height: 100px;\"><br><br>\n                                            <b><span style=\"font-size:15px;\">AD : 1</span></b><br>\n                                        </div><br><br>\n                                            Viewed By : <br>\n                                            Arunkani<br>\n                                            9843448795<br>\n                                            arunrmech2020@gmail.com<br><br><br>\n                                    </td>\n                                    <td style=\"vertical-align:top;padding-left:10px\">\n                                        <b><span style=\"font-size:20px;\">Urgent sale new piece 3 burner automatic stove</span></b><br>\n                                        Urgent sale new piece 3 burner automatic stove...\n                                    </td>\n                                </tr>\n                            </table>\n                            <p style=\"text-align:center\">\n                                <a href=\"https://www.rhole.in/in/v1-Urgent sale new piece 3 burner automatic stove\" style=\"font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block\">VIEW AD</a>&nbsp;&nbsp;\n                            </p>             \n                            <br> \n                            Thanks <br>\n                            Support Team\n                        </div>\n                    </div>','2020-11-12 00:00:46',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (9,4,'singhtechcommunication@gmail.com','','Rhole.in :) Email Verification','<div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;\">\n                        <div style=\"text-align:center;padding-bottom:20px;\">\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\n                        </div>\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\n                            Hello,\n                            <br><br>\n                            Your email verification Code is 33678\n                            <br><br>\n                            <br> \n                            Thanks <br>\n                            Support Team\n                        </div>\n                    </div>','2021-01-29 22:25:45',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (10,4,'singhtechcommunication@gmail.com','','Rhole.in :) Your ad is now live!','\r\n                    <div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;\">\r\n                        <div style=\"text-align:center;padding-bottom:20px;\">\r\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\r\n                        </div>\r\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\r\n                            Hello,\r\n                            <br><br>\r\n                            Your ad is live, share it with friends to sell faster:\r\n                            <br><br>\r\n                            <p style=\"text-align:center\">\r\n                                <a href=\"https://www.rhole.in/in/v2-ZEBRONICS KEYBOARD COMBO \" style=\"font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block\">VIEW AD</a>\r\n                            </p>               \r\n                            <br> \r\n                            Thanks <br>\r\n                            Support Team\r\n                        </div>\r\n                        <p style=\"color:#888;padding:10px;text-align:center\">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>\r\n                    </div>','2021-02-18 07:34:08',0,NULL,NULL,1,0,NULL,0,NULL);
insert  into `_tbl_logs_email`(`EmailLogID`,`MemberID`,`EmailTo`,`EmaildFor`,`EmailSubject`,`EmailContent`,`EmailRequestedOn`,`EmailAPIID`,`APIRequestedOn`,`APIResponse`,`IsSuccess`,`IsFailure`,`FailureMessage`,`IsAttachment`,`AttachmentFile`) values (11,4,'singhtechcommunication@gmail.com','','Rhole.in :) Your ad is viewed by unknown person','\n                    <div style=\"padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;\">\n                        <div style=\"text-align:center;padding-bottom:20px;\">\n                            <img src=\"https://www.rhole.in/assets/logo.png\" style=\"height:30px;\">&nbsp;&nbsp;\n                        </div>\n                        <div style=\"border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;\">\n                            Hello,\n                            <br><br>\n                            Your ad is viewed by unknown person:\n                            <br><br>\n                            \n                            <table>\n                                <tr>\n                                    <td>\n                                        <div style=\"border:1px solid #ccc;padding:20px;text-align:center;width: 100px;height: 100px;\">\n                                            <img src=\"https://www.rhole.in/assets/cms/demo/thumb/_16136138051613613805_fb_img_1613546935549.jpg\" style=\"width: 100px;height: 100px;\"><br><br>\n                                            <b><span style=\"font-size:15px;\">AD : 2</span></b>\n                                        </div>\n                                    </td>\n                                    <td style=\"vertical-align:top;padding-left:10px\">\n                                        <b><span style=\"font-size:20px;\">ZEBRONICS KEYBOARD COMBO </span></b><br>\n                                        ZEBRONICS KEYBOARD COMBO 500/-\r\nGENTER WIRELESS KEYBOARD COMBO 800\r\nZEBRONICS USB MOUSE \r\nALEX  & RISE 200/-\r\nDAZZLE  WIRELESS MOUSE ₹ 300\r\nCall me 9868970587 , 8383992885...\n                                    </td>\n                                </tr>\n                            </table>\n                            <p style=\"text-align:center\">\n                                <a href=\"https://www.rhole.in/in/v2-ZEBRONICS KEYBOARD COMBO \" style=\"font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block\">VIEW AD</a>\n                            </p>               \n                            <br> \n                            Thanks <br>\n                            Support Team\n                        </div>\n                    </div>','2021-02-19 00:05:27',0,NULL,NULL,1,0,NULL,0,NULL);

/*Table structure for table `_tbl_user_packages` */

DROP TABLE IF EXISTS `_tbl_user_packages`;

CREATE TABLE `_tbl_user_packages` (
  `UserPackageID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `PackageID` int(11) DEFAULT NULL,
  `ActivatedOn` datetime DEFAULT NULL,
  `PaymentID` int(11) DEFAULT NULL,
  `PackageFrom` date DEFAULT NULL,
  `PackageTo` date DEFAULT NULL,
  `NumberOfAds` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `PostedAds` int(11) DEFAULT NULL,
  `RemainingAds` int(11) DEFAULT NULL,
  `IsExpired` int(11) DEFAULT NULL,
  `Days` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserPackageID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_user_packages` */

insert  into `_tbl_user_packages`(`UserPackageID`,`UserID`,`PackageID`,`ActivatedOn`,`PaymentID`,`PackageFrom`,`PackageTo`,`NumberOfAds`,`CategoryID`,`CategoryName`,`PostedAds`,`RemainingAds`,`IsExpired`,`Days`) values (44,4243,7,'2020-11-08 11:56:53',0,'2020-11-08','2020-12-08',50,5,'Jobs',0,50,0,30);

/*Table structure for table `_tbl_verification_code` */

DROP TABLE IF EXISTS `_tbl_verification_code`;

CREATE TABLE `_tbl_verification_code` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT '0',
  `RequestSentOn` datetime DEFAULT NULL,
  `SecurityCode` varchar(255) DEFAULT NULL,
  `messagedon` datetime DEFAULT NULL,
  `EmailTo` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_verification_code` */

insert  into `_tbl_verification_code`(`ID`,`UserID`,`RequestSentOn`,`SecurityCode`,`messagedon`,`EmailTo`,`Type`) values (104,3697,'2020-11-02 20:16:19','2232','2020-11-02 08:16:19','lakshivan27@gmail.com','Forget Password');
insert  into `_tbl_verification_code`(`ID`,`UserID`,`RequestSentOn`,`SecurityCode`,`messagedon`,`EmailTo`,`Type`) values (105,4214,'2020-11-05 07:08:26','6014','2020-11-05 07:08:26','tamilselvan.1198@gmail.com','Forget Password');
insert  into `_tbl_verification_code`(`ID`,`UserID`,`RequestSentOn`,`SecurityCode`,`messagedon`,`EmailTo`,`Type`) values (106,3997,'2020-11-07 17:17:46','9187','2020-11-07 05:17:46','mohamedamanulla.ias@gmail.com','Forget Password');
insert  into `_tbl_verification_code`(`ID`,`UserID`,`RequestSentOn`,`SecurityCode`,`messagedon`,`EmailTo`,`Type`) values (107,2898,'2020-11-07 22:11:58','9633','2020-11-07 10:11:58','mmohammedismail56@gmail.com','Forget Password');
insert  into `_tbl_verification_code`(`ID`,`UserID`,`RequestSentOn`,`SecurityCode`,`messagedon`,`EmailTo`,`Type`) values (108,3935,'2020-11-08 23:50:40','5269','2020-11-08 11:50:40','anbupushparaj2018@gmail.com','Forget Password');
insert  into `_tbl_verification_code`(`ID`,`UserID`,`RequestSentOn`,`SecurityCode`,`messagedon`,`EmailTo`,`Type`) values (109,2898,'2020-11-09 15:49:19','6127','2020-11-09 03:49:19','mmohammedismail56@gmail.com','Forget Password');
insert  into `_tbl_verification_code`(`ID`,`UserID`,`RequestSentOn`,`SecurityCode`,`messagedon`,`EmailTo`,`Type`) values (110,1,'2020-11-11 09:14:00','6249','2020-11-11 09:14:00','Jeyaraj_123@yahoo.com','Forget Password');

/*Table structure for table `_tbl_view_add_logs` */

DROP TABLE IF EXISTS `_tbl_view_add_logs`;

CREATE TABLE `_tbl_view_add_logs` (
  `LogID` int(11) NOT NULL AUTO_INCREMENT,
  `AddID` int(11) DEFAULT NULL,
  `AddByUserID` varchar(255) DEFAULT NULL,
  `ViewedByUserID` int(11) DEFAULT '0',
  `ViewedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`LogID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_view_add_logs` */

insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (1,1,'1',1,'2020-11-11 11:27:43');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (2,1,'3',0,'2020-11-11 23:59:44');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (3,1,'3',2,'2020-11-12 00:00:46');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (4,1,'3',2,'2020-11-12 00:02:38');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (5,1,'3',0,'2020-11-12 19:39:24');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (6,1,'3',0,'2020-11-13 18:45:25');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (7,1,'3',0,'2020-11-18 22:19:13');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (8,1,'3',0,'2020-11-18 22:19:13');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (9,1,'3',0,'2020-11-19 12:19:35');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (10,1,'3',0,'2020-11-19 12:20:06');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (11,1,'3',0,'2020-11-19 12:20:11');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (12,1,'3',0,'2020-11-22 08:44:55');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (13,1,'3',0,'2020-11-24 16:57:24');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (14,1,'3',0,'2020-12-05 22:33:58');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (15,1,'3',0,'2020-12-06 07:03:37');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (16,1,'3',0,'2020-12-26 01:20:45');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (17,1,'3',0,'2020-12-27 13:42:45');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (18,1,'3',0,'2021-01-08 03:53:29');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (19,1,'3',0,'2021-01-19 03:57:30');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (20,1,'3',0,'2021-01-24 08:30:57');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (21,1,'3',0,'2021-02-01 15:20:37');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (22,1,'3',0,'2021-02-15 16:38:55');
insert  into `_tbl_view_add_logs`(`LogID`,`AddID`,`AddByUserID`,`ViewedByUserID`,`ViewedOn`) values (23,2,'4',0,'2021-02-19 00:05:27');

/*Table structure for table `_tbl_wallet_request` */

DROP TABLE IF EXISTS `_tbl_wallet_request`;

CREATE TABLE `_tbl_wallet_request` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `FranchiseeID` int(11) DEFAULT NULL,
  `TransferTo` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `TransferMode` varchar(255) DEFAULT NULL,
  `TxnDate` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT '0',
  `StatusOn` datetime DEFAULT NULL,
  `ApprovedOn` datetime DEFAULT NULL,
  `RejectedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`RequestID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_wallet_request` */

/*Table structure for table `_tbl_withdrawal_request` */

DROP TABLE IF EXISTS `_tbl_withdrawal_request`;

CREATE TABLE `_tbl_withdrawal_request` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `FranchiseeID` int(11) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `TxnOn` datetime DEFAULT NULL,
  `Status` int(11) DEFAULT '0',
  `StatusOn` datetime DEFAULT NULL,
  `ApprovedOn` datetime DEFAULT NULL,
  `RejectedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`RequestID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tbl_withdrawal_request` */

/*Table structure for table `_tblmessages` */

DROP TABLE IF EXISTS `_tblmessages`;

CREATE TABLE `_tblmessages` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `chatroomid` int(11) DEFAULT NULL,
  `adpostedid` int(11) DEFAULT NULL,
  `adviewedid` int(11) DEFAULT NULL,
  `fromadid` int(11) DEFAULT NULL,
  `toadid` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `messagedon` datetime DEFAULT NULL,
  `isread` int(11) DEFAULT '1',
  `fromuserid` int(11) DEFAULT NULL,
  `touserid` int(11) DEFAULT NULL,
  `sentby` int(11) DEFAULT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `_tblmessages` */

/*Table structure for table `tbl_admin_bank_details` */

DROP TABLE IF EXISTS `tbl_admin_bank_details`;

CREATE TABLE `tbl_admin_bank_details` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `BankName` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_admin_bank_details` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
