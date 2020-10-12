-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: wintoget_database
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `_DirectReferals`
--

DROP TABLE IF EXISTS `_DirectReferals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_DirectReferals` (
  `DirectID` int(11) DEFAULT NULL,
  `PlacementID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_DirectReferals`
--

LOCK TABLES `_DirectReferals` WRITE;
/*!40000 ALTER TABLE `_DirectReferals` DISABLE KEYS */;
INSERT INTO `_DirectReferals` VALUES (NULL,1),(NULL,2),(NULL,3),(NULL,4),(NULL,5),(NULL,6),(NULL,7),(NULL,8),(NULL,9),(NULL,10),(NULL,11),(NULL,12),(NULL,13),(NULL,14),(NULL,15),(NULL,16),(NULL,17),(NULL,18),(NULL,19),(NULL,20),(NULL,21),(NULL,22),(NULL,23),(NULL,24),(NULL,25),(NULL,26),(NULL,27),(NULL,28),(NULL,29),(NULL,30),(NULL,31),(NULL,32),(NULL,33),(NULL,34),(NULL,35),(NULL,36),(NULL,37),(NULL,38),(NULL,39),(NULL,40),(NULL,41),(NULL,42),(NULL,43),(NULL,44),(NULL,45);
/*!40000 ALTER TABLE `_DirectReferals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_StockTable`
--

DROP TABLE IF EXISTS `_StockTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_StockTable` (
  `StockiestProductsID` int(11) NOT NULL AUTO_INCREMENT,
  `StockiestID` int(11) DEFAULT NULL,
  `StockiestCode` varchar(255) DEFAULT NULL,
  `StockiestName` varchar(255) DEFAULT NULL,
  `ProductCode` varchar(255) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductPV` varchar(255) DEFAULT NULL,
  `ProductPrive` varchar(255) DEFAULT NULL,
  `PurchaseQty` varchar(255) DEFAULT NULL,
  `SoldQty` varchar(255) DEFAULT NULL,
  `RemainingQty` varchar(255) DEFAULT NULL,
  `PurchasePrice` varchar(255) DEFAULT NULL,
  `SoldPrice` varchar(255) DEFAULT NULL,
  `TxnDate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`StockiestProductsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_StockTable`
--

LOCK TABLES `_StockTable` WRITE;
/*!40000 ALTER TABLE `_StockTable` DISABLE KEYS */;
/*!40000 ALTER TABLE `_StockTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_audit_tblEpins`
--

DROP TABLE IF EXISTS `_audit_tblEpins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_audit_tblEpins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EPINID` int(11) DEFAULT NULL,
  `EPIN` varchar(255) DEFAULT NULL,
  `PINPassword` varchar(255) DEFAULT NULL,
  `CreatedByID` int(11) DEFAULT NULL,
  `CreatedByName` varchar(255) DEFAULT NULL,
  `CreatedByCode` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `SoldToID` int(11) DEFAULT NULL,
  `SoldToName` varchar(255) DEFAULT NULL,
  `SoldToCode` varchar(255) DEFAULT NULL,
  `SoldOn` datetime DEFAULT NULL,
  `OwnToID` int(11) DEFAULT NULL,
  `OwnToName` varchar(255) DEFAULT NULL,
  `OwnToCode` varchar(255) DEFAULT NULL,
  `OwnedOn` datetime DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  `UsedOn` datetime DEFAULT NULL,
  `UsedForID` int(11) DEFAULT NULL,
  `UserForCode` varchar(255) DEFAULT NULL,
  `UsedForName` varchar(255) DEFAULT NULL,
  `PinValue` varchar(255) DEFAULT NULL,
  `PackageID` varchar(255) DEFAULT NULL,
  `PackageName` varchar(255) DEFAULT NULL,
  `PackagePV` varchar(255) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  `changedat` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_audit_tblEpins`
--

LOCK TABLES `_audit_tblEpins` WRITE;
/*!40000 ALTER TABLE `_audit_tblEpins` DISABLE KEYS */;
/*!40000 ALTER TABLE `_audit_tblEpins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tblEpins`
--

DROP TABLE IF EXISTS `_tblEpins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tblEpins` (
  `EPINID` int(11) NOT NULL AUTO_INCREMENT,
  `EPIN` varchar(255) DEFAULT NULL,
  `PINPassword` varchar(255) DEFAULT NULL,
  `CreatedByID` int(11) DEFAULT NULL,
  `CreatedByName` varchar(255) DEFAULT NULL,
  `CreatedByCode` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `SoldToID` int(11) DEFAULT NULL,
  `SoldToName` varchar(255) DEFAULT NULL,
  `SoldToCode` varchar(255) DEFAULT NULL,
  `SoldOn` datetime DEFAULT NULL,
  `OwnToID` int(11) DEFAULT NULL,
  `OwnToName` varchar(255) DEFAULT NULL,
  `OwnToCode` varchar(255) DEFAULT NULL,
  `OwnedOn` datetime DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  `UsedOn` datetime DEFAULT NULL,
  `UsedForID` int(11) DEFAULT NULL,
  `UserForCode` varchar(255) DEFAULT NULL,
  `UsedForName` varchar(255) DEFAULT NULL,
  `PinValue` varchar(255) DEFAULT NULL,
  `PackageID` varchar(255) DEFAULT NULL,
  `PackageName` varchar(255) DEFAULT NULL,
  `PackagePV` varchar(255) DEFAULT NULL,
  `CreatedBy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EPINID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tblEpins`
--

LOCK TABLES `_tblEpins` WRITE;
/*!40000 ALTER TABLE `_tblEpins` DISABLE KEYS */;
INSERT INTO `_tblEpins` VALUES (1,'WTBb68eb211','a712b6b8',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',1,'2020-09-14 14:24:16',185,'WTSTE00002','Stephen 1','1999','1','WTBasic','50','Admin'),(2,'WTB8c4e7561','3ecde5c0',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',1,'2020-09-14 14:27:48',186,'WTSTE00003','Stephen2','1999','1','WTBasic','50','Admin'),(3,'WTBf60db8e4','ebbc9de1',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(4,'WTB4cf1055e','01c03610',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(5,'WTBaa3c0cfc','63324697',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(6,'WTB71faa153','c09fb935',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(7,'WTBde5a353f','b4bd0c6c',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(8,'WTB6a63d301','c895b33e',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(9,'WTBab1d1bf6','30f68d66',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(10,'WTB77d91d2f','af075204',2,'AD0001','Stephen','2020-09-14 14:06:31',0,'0','0',NULL,1,'Stephen','WT000001','2020-09-14 14:06:31',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(11,'WTB284f33de','2bba3006',2,'AD0001','Stephen','2020-09-14 14:29:48',0,'0','0',NULL,185,'Stephen 1','WTSTE00002','2020-09-14 14:29:48',1,'2020-09-14 14:30:53',187,'WTSTE00004','Stephen 3','1999','1','WTBasic','50','Admin'),(12,'WTB9604b8ee','d6385c2b',2,'AD0001','Stephen','2020-09-14 14:29:48',0,'0','0',NULL,185,'Stephen 1','WTSTE00002','2020-09-14 14:29:48',1,'2020-09-14 14:32:13',188,'WTSTE00005','Stephen 4','1999','1','WTBasic','50','Admin'),(13,'WTB3d5c8c2b','e5cc19c7',2,'AD0001','Stephen','2020-09-14 14:35:54',0,'0','0',NULL,186,'Stephen2','WTSTE00003','2020-09-14 14:35:54',1,'2020-09-14 14:37:23',189,'WTSTE00006','Stephen6','1999','1','WTBasic','50','Admin'),(14,'WTBf2dc562c','b87da874',2,'AD0001','Stephen','2020-09-14 14:35:54',0,'0','0',NULL,186,'Stephen2','WTSTE00003','2020-09-14 14:35:54',1,'2020-09-14 14:38:51',190,'WTSTE00007','Stephen 6','1999','1','WTBasic','50','Admin'),(15,'WTB99b68e6f','1e8ec365',2,'AD0001','Stephen','2020-09-14 14:45:31',0,'0','0',NULL,187,'Stephen 3','WTSTE00004','2020-09-14 14:45:31',1,'2020-09-14 14:48:02',191,'WTSHE00008','Sherin 1','1999','1','WTBasic','50','Admin'),(16,'WTB54ab1d73','59d2dd34',2,'AD0001','Stephen','2020-09-14 14:45:31',0,'0','0',NULL,187,'Stephen 3','WTSTE00004','2020-09-14 14:45:31',1,'2020-09-14 14:49:23',192,'WTSHE00009','Sherin2','1999','1','WTBasic','50','Admin'),(17,'WTB6a05dfdf','cb67c5a1',2,'AD0001','Stephen','2020-09-14 15:09:57',0,'0','0',NULL,188,'Stephen 4','WTSTE00005','2020-09-14 15:09:57',1,'2020-09-14 15:11:26',193,'WTSHE00010','Sherin3','1999','1','WTBasic','50','Admin'),(18,'WTBb90f8023','d74a6528',2,'AD0001','Stephen','2020-09-14 15:09:57',0,'0','0',NULL,188,'Stephen 4','WTSTE00005','2020-09-14 15:09:57',1,'2020-09-14 15:12:32',194,'WTSHE00011','Sherin 4','1999','1','WTBasic','50','Admin'),(19,'WTB382da185','c218047e',2,'AD0001','Stephen','2020-09-14 15:13:39',0,'0','0',NULL,189,'Stephen6','WTSTE00006','2020-09-14 15:13:39',1,'2020-09-14 15:18:25',195,'WTSHE00012','Sherin 5','1999','1','WTBasic','50','Admin'),(20,'WTB08ce10fd','8765aedf',2,'AD0001','Stephen','2020-09-14 15:13:39',0,'0','0',NULL,189,'Stephen6','WTSTE00006','2020-09-14 15:13:39',1,'2020-09-14 15:19:33',196,'WTSHE00013','Sherin 6','1999','1','WTBasic','50','Admin'),(21,'WTB193d1c1b','2055a4d3',2,'AD0001','Stephen','2020-09-14 15:29:02',0,'0','0',NULL,190,'Stephen 6','WTSTE00007','2020-09-14 15:29:02',1,'2020-09-14 15:32:50',197,'WTSHE00014','Sherin 7','1999','1','WTBasic','50','Admin'),(22,'WTB6bda4242','d01bdb05',2,'AD0001','Stephen','2020-09-14 15:29:02',0,'0','0',NULL,190,'Stephen 6','WTSTE00007','2020-09-14 15:29:02',1,'2020-09-14 15:37:57',198,'WTSHE00015','Sherin 8','1999','1','WTBasic','50','Admin'),(23,'WTBf54e41e6','d1cf58c3',2,'AD0001','Stephen','2020-09-14 15:50:16',0,'0','0',NULL,191,'Sherin 1','WTSHE00008','2020-09-14 15:50:16',1,'2020-09-14 15:52:20',199,'WTPRE00016','Presita1','1999','1','WTBasic','50','Admin'),(24,'WTBe3e5f72f','79394230',2,'AD0001','Stephen','2020-09-14 15:50:16',0,'0','0',NULL,191,'Sherin 1','WTSHE00008','2020-09-14 15:50:16',1,'2020-09-14 15:53:20',200,'WTPRE00017','Presita 2','1999','1','WTBasic','50','Admin'),(25,'WTB4d95dc3e','907ed923',2,'AD0001','Stephen','2020-09-14 15:50:44',0,'0','0',NULL,192,'Sherin2','WTSHE00009','2020-09-14 15:50:44',1,'2020-09-14 15:54:53',201,'WTPRE00018','Presita 3','1999','1','WTBasic','50','Admin'),(26,'WTB6b20f1c5','4f72b3c6',2,'AD0001','Stephen','2020-09-14 15:50:44',0,'0','0',NULL,192,'Sherin2','WTSHE00009','2020-09-14 15:50:44',1,'2020-09-14 15:56:12',202,'WTPRE00019','Presita 4','1999','1','WTBasic','50','Admin'),(27,'WTB7e5182e1','0b92411a',2,'AD0001','Stephen','2020-09-14 15:57:44',0,'0','0',NULL,193,'Sherin3','WTSHE00010','2020-09-14 15:57:44',1,'2020-09-14 16:04:09',203,'WTPRE00020','Presita 5','1999','1','WTBasic','50','Admin'),(28,'WTB513c7595','0aea0448',2,'AD0001','Stephen','2020-09-14 15:57:44',0,'0','0',NULL,193,'Sherin3','WTSHE00010','2020-09-14 15:57:44',1,'2020-09-14 16:05:05',204,'WTPRE00021','Presita 6','1999','1','WTBasic','50','Admin'),(29,'WTB455ffccc','900d0cbf',2,'AD0001','Stephen','2020-09-14 15:58:22',0,'0','0',NULL,194,'Sherin 4','WTSHE00011','2020-09-14 15:58:22',1,'2020-09-14 16:06:18',205,'WTPRE00022','Presita 7','1999','1','WTBasic','50','Admin'),(30,'WTB580319f3','fec062fc',2,'AD0001','Stephen','2020-09-14 15:58:22',0,'0','0',NULL,194,'Sherin 4','WTSHE00011','2020-09-14 15:58:22',1,'2020-09-14 16:07:11',206,'WTPRE00023','Presita 8','1999','1','WTBasic','50','Admin'),(31,'WTBca7a6521','5ff55923',2,'AD0001','Stephen','2020-09-14 15:58:51',0,'0','0',NULL,195,'Sherin 5','WTSHE00012','2020-09-14 15:58:51',1,'2020-09-14 16:09:10',207,'WTPRE00024','Presha 1','1999','1','WTBasic','50','Admin'),(32,'WTB2d2179c1','1d00df72',2,'AD0001','Stephen','2020-09-14 15:58:51',0,'0','0',NULL,195,'Sherin 5','WTSHE00012','2020-09-14 15:58:51',1,'2020-09-14 16:10:35',208,'WTPRE00025','Presha 2','1999','1','WTBasic','50','Admin'),(33,'WTB07062746','6ac7d8e3',2,'AD0001','Stephen','2020-09-14 15:59:28',0,'0','0',NULL,196,'Sherin 6','WTSHE00013','2020-09-14 15:59:28',1,'2020-09-14 16:12:32',209,'WTPRE00026','Presha 3','1999','1','WTBasic','50','Admin'),(34,'WTBd8416d60','177bfa61',2,'AD0001','Stephen','2020-09-14 15:59:28',0,'0','0',NULL,196,'Sherin 6','WTSHE00013','2020-09-14 15:59:28',1,'2020-09-14 16:13:30',210,'WTPRE00027','Presha 4','1999','1','WTBasic','50','Admin'),(35,'WTBa875104a','68d1f05c',2,'AD0001','Stephen','2020-09-14 15:59:56',0,'0','0',NULL,197,'Sherin 7','WTSHE00014','2020-09-14 15:59:56',1,'2020-09-14 16:14:48',211,'WTPRE00028','Presha 5','1999','1','WTBasic','50','Admin'),(36,'WTBa987da54','3fba6ed0',2,'AD0001','Stephen','2020-09-14 15:59:56',0,'0','0',NULL,197,'Sherin 7','WTSHE00014','2020-09-14 15:59:56',1,'2020-09-14 16:15:33',212,'WTPRE00029','Presha 6','1999','1','WTBasic','50','Admin'),(37,'WTBf811661d','d7897884',2,'AD0001','Stephen','2020-09-14 16:00:53',0,'0','0',NULL,198,'Sherin 8','WTSHE00015','2020-09-14 16:00:53',1,'2020-09-14 16:16:45',213,'WTPRE00030','Presha 6','1999','1','WTBasic','50','Admin'),(38,'WTB7468570d','34f17692',2,'AD0001','Stephen','2020-09-14 16:00:53',0,'0','0',NULL,198,'Sherin 8','WTSHE00015','2020-09-14 16:00:53',1,'2020-09-14 16:17:34',214,'WTPRE00031','Presha 8','1999','1','WTBasic','50','Admin'),(39,'WTB4a4ad36d','a70895b1',2,'AD0001','Stephen','2020-09-14 16:44:27',0,'0','0',NULL,199,'Presita1','WTPRE00016','2020-09-14 16:44:27',1,'2020-09-14 17:02:55',215,'WTFAT00032','Fathima BI ','1999','1','WTBasic','50','Admin'),(40,'WTB3561fa1b','42f9a961',2,'AD0001','Stephen','2020-09-14 16:44:27',0,'0','0',NULL,199,'Presita1','WTPRE00016','2020-09-14 16:44:27',1,'2020-09-14 17:14:09',216,'WTKEM00033','Kempanna. P. Myagadi','1999','1','WTBasic','50','Admin'),(41,'WTB04385b4f','30835768',2,'AD0001','Stephen','2020-09-14 17:17:02',0,'0','0',NULL,215,'Fathima BI ','WTFAT00032','2020-09-14 17:17:02',1,'2020-09-14 17:19:35',217,'WTFAT00034','Fathima BI ','1999','1','WTBasic','50','Admin'),(42,'WTB40ba8cd3','c1a8154a',2,'AD0001','Stephen','2020-09-14 17:17:02',0,'0','0',NULL,215,'Fathima BI ','WTFAT00032','2020-09-14 17:17:02',1,'2020-09-14 17:22:24',218,'WTFAT00035','Fathima BI ','1999','1','WTBasic','50','Admin'),(43,'WTBfbb1e408','16ef73bf',2,'AD0001','Stephen','2020-09-14 17:26:24',0,'0','0',NULL,217,'Fathima BI ','WTFAT00034','2020-09-14 17:26:24',1,'2020-09-14 17:31:13',219,'WTNOO00036','Noore Mohammadi','1999','1','WTBasic','50','Admin'),(44,'WTB6bba677e','66f58c13',2,'AD0001','Stephen','2020-09-14 17:49:13',0,'0','0',NULL,216,'Kempanna. P. Myagadi','WTKEM00033','2020-09-14 17:49:13',1,'2020-09-14 17:50:50',220,'WTKEM00037','Kempanna. P. Myagadi','1999','1','WTBasic','50','Admin'),(45,'WTB08c75dc1','86b8681d',2,'AD0001','Stephen','2020-09-14 17:49:13',0,'0','0',NULL,216,'Kempanna. P. Myagadi','WTKEM00033','2020-09-14 17:49:13',1,'2020-09-14 17:52:17',221,'WTKEM00038','Kempanna. P. Myagadi','1999','1','WTBasic','50','Admin'),(46,'WTB55018494','9b724e58',2,'AD0001','Stephen','2020-09-15 17:42:55',0,'0','0',NULL,214,'Presha 8','WTPRE00031','2020-09-15 17:42:55',1,'2020-09-15 18:19:01',222,'WTSEL00039','Selvi','1999','1','WTBasic','50','Admin'),(47,'WTB1847b7b7','25bf00d2',2,'AD0001','Stephen','2020-09-15 17:42:55',0,'0','0',NULL,214,'Presha 8','WTPRE00031','2020-09-15 17:42:55',1,'2020-09-16 11:34:25',228,'WTCAT00045','Catherine','1999','1','WTBasic','50','Admin'),(48,'WTBe52560f0','40d5acc1',2,'AD0001','Stephen','2020-09-15 18:21:38',0,'0','0',NULL,222,'Selvi','WTSEL00039','2020-09-15 18:21:38',1,'2020-09-15 18:23:50',223,'WTSEE00040','Seetha','1999','1','WTBasic','50','Admin'),(49,'WTBd09eb57d','3594e131',2,'AD0001','Stephen','2020-09-15 18:21:38',0,'0','0',NULL,222,'Selvi','WTSEL00039','2020-09-15 18:21:38',1,'2020-09-15 18:26:02',224,'WTMUR00041','Murali','1999','1','WTBasic','50','Admin'),(50,'WTBba442c7d','06f9cf0e',2,'AD0001','Stephen','2020-09-15 18:34:23',0,'0','0',NULL,185,'Stephen 1','WTSTE00002','2020-09-15 18:34:23',1,'2020-09-15 18:38:11',225,'WTRAJ00042','Rajamani','1999','1','WTBasic','50','Admin'),(51,'WTBb1e1307c','d43fadb9',2,'AD0001','Stephen','2020-09-15 18:41:47',0,'0','0',NULL,225,'Rajamani','WTRAJ00042','2020-09-15 18:41:47',1,'2020-09-15 18:44:18',226,'WTEBI00043','Ebi Samuel','1999','1','WTBasic','50','Admin'),(52,'WTBd04bad9c','76a081e2',2,'AD0001','Stephen','2020-09-15 18:41:47',0,'0','0',NULL,225,'Rajamani','WTRAJ00042','2020-09-15 18:41:47',1,'2020-09-15 18:46:53',227,'WTRAM00044','Ramani Kannan','1999','1','WTBasic','50','Admin'),(53,'WTBba98282a','c026d89a',2,'AD0001','Stephen','2020-09-16 11:30:51',0,'0','0',NULL,214,'Presha 8','WTPRE00031','2020-09-16 11:30:51',0,NULL,0,'0','0','1999','1','WTBasic','50','Admin'),(54,'WTBc37a9107','d1df4508',2,'AD0001','Stephen','2020-09-16 12:20:52',0,'0','0',NULL,200,'Presita 2','WTPRE00017','2020-09-16 12:20:52',1,'2020-09-16 12:24:44',229,'WTVAS00046','Vasantha','1999','1','WTBasic','50','Admin');
/*!40000 ALTER TABLE `_tblEpins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tblPlacements`
--

DROP TABLE IF EXISTS `_tblPlacements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tblPlacements` (
  `PlacementID` int(11) NOT NULL AUTO_INCREMENT,
  `ParentID` int(11) DEFAULT NULL,
  `ParentCode` varchar(255) DEFAULT NULL,
  `ParentName` varchar(255) DEFAULT NULL,
  `ChildID` int(11) DEFAULT NULL,
  `ChildCode` varchar(255) DEFAULT NULL,
  `ChildName` varchar(255) DEFAULT NULL,
  `PlacedByID` int(11) DEFAULT NULL,
  `PlacedByCode` varchar(255) DEFAULT NULL,
  `PlacedByName` varchar(255) DEFAULT NULL,
  `PlacedOn` datetime DEFAULT NULL,
  `UsedEPin` varchar(255) DEFAULT NULL,
  `Position` varbinary(255) DEFAULT NULL COMMENT 'L,R',
  `PlacedFrom` varchar(255) DEFAULT 'portal',
  `Paid` int(11) DEFAULT '0',
  `PV` varchar(255) DEFAULT NULL,
  `BV` varbinary(255) DEFAULT NULL,
  `PackageID` int(11) DEFAULT '0',
  `DirectPV` int(11) DEFAULT NULL,
  PRIMARY KEY (`PlacementID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tblPlacements`
--

LOCK TABLES `_tblPlacements` WRITE;
/*!40000 ALTER TABLE `_tblPlacements` DISABLE KEYS */;
INSERT INTO `_tblPlacements` VALUES (1,1,'WT000001','Stephen',185,'WTSTE00002','Stephen 1',1,'WT000001','Stephen','2020-09-14 14:24:16','',_binary 'L','portal',0,'50',NULL,1,50),(2,1,'WT000001','Stephen',186,'WTSTE00003','Stephen2',1,'WT000001','Stephen','2020-09-14 14:27:48','',_binary 'R','portal',0,'50',NULL,1,50),(3,185,'WTSTE00002','Stephen 1',187,'WTSTE00004','Stephen 3',185,'WTSTE00002','Stephen 1','2020-09-14 14:30:53','',_binary 'L','portal',0,'50',NULL,1,50),(4,185,'WTSTE00002','Stephen 1',188,'WTSTE00005','Stephen 4',185,'WTSTE00002','Stephen 1','2020-09-14 14:32:13','',_binary 'R','portal',0,'50',NULL,1,50),(5,186,'WTSTE00003','Stephen2',189,'WTSTE00006','Stephen6',186,'WTSTE00003','Stephen2','2020-09-14 14:37:23','',_binary 'L','portal',0,'50',NULL,1,50),(6,186,'WTSTE00003','Stephen2',190,'WTSTE00007','Stephen 6',186,'WTSTE00003','Stephen2','2020-09-14 14:38:51','',_binary 'R','portal',0,'50',NULL,1,50),(7,187,'WTSTE00004','Stephen 3',191,'WTSHE00008','Sherin 1',187,'WTSTE00004','Stephen 3','2020-09-14 14:48:02','',_binary 'L','portal',0,'50',NULL,1,50),(8,187,'WTSTE00004','Stephen 3',192,'WTSHE00009','Sherin2',187,'WTSTE00004','Stephen 3','2020-09-14 14:49:23','',_binary 'R','portal',0,'50',NULL,1,50),(9,188,'WTSTE00005','Stephen 4',193,'WTSHE00010','Sherin3',188,'WTSTE00005','Stephen 4','2020-09-14 15:11:26','',_binary 'L','portal',0,'50',NULL,1,50),(10,188,'WTSTE00005','Stephen 4',194,'WTSHE00011','Sherin 4',188,'WTSTE00005','Stephen 4','2020-09-14 15:12:32','',_binary 'R','portal',0,'50',NULL,1,50),(11,189,'WTSTE00006','Stephen6',195,'WTSHE00012','Sherin 5',189,'WTSTE00006','Stephen6','2020-09-14 15:18:25','',_binary 'L','portal',0,'50',NULL,1,50),(12,189,'WTSTE00006','Stephen6',196,'WTSHE00013','Sherin 6',189,'WTSTE00006','Stephen6','2020-09-14 15:19:33','',_binary 'R','portal',0,'50',NULL,1,50),(13,190,'WTSTE00007','Stephen 6',197,'WTSHE00014','Sherin 7',190,'WTSTE00007','Stephen 6','2020-09-14 15:32:50','',_binary 'L','portal',0,'50',NULL,1,50),(14,190,'WTSTE00007','Stephen 6',198,'WTSHE00015','Sherin 8',190,'WTSTE00007','Stephen 6','2020-09-14 15:37:57','',_binary 'R','portal',0,'50',NULL,1,50),(15,191,'WTSHE00008','Sherin 1',199,'WTPRE00016','Presita1',191,'WTSHE00008','Sherin 1','2020-09-14 15:52:20','',_binary 'L','portal',0,'50',NULL,1,50),(16,191,'WTSHE00008','Sherin 1',200,'WTPRE00017','Presita 2',191,'WTSHE00008','Sherin 1','2020-09-14 15:53:20','',_binary 'R','portal',0,'50',NULL,1,50),(17,192,'WTSHE00009','Sherin2',201,'WTPRE00018','Presita 3',192,'WTSHE00009','Sherin2','2020-09-14 15:54:53','',_binary 'L','portal',0,'50',NULL,1,50),(18,192,'WTSHE00009','Sherin2',202,'WTPRE00019','Presita 4',192,'WTSHE00009','Sherin2','2020-09-14 15:56:12','',_binary 'R','portal',0,'50',NULL,1,50),(19,193,'WTSHE00010','Sherin3',203,'WTPRE00020','Presita 5',193,'WTSHE00010','Sherin3','2020-09-14 16:04:09','',_binary 'L','portal',0,'50',NULL,1,50),(20,193,'WTSHE00010','Sherin3',204,'WTPRE00021','Presita 6',193,'WTSHE00010','Sherin3','2020-09-14 16:05:05','',_binary 'R','portal',0,'50',NULL,1,50),(21,194,'WTSHE00011','Sherin 4',205,'WTPRE00022','Presita 7',194,'WTSHE00011','Sherin 4','2020-09-14 16:06:18','',_binary 'L','portal',0,'50',NULL,1,50),(22,194,'WTSHE00011','Sherin 4',206,'WTPRE00023','Presita 8',194,'WTSHE00011','Sherin 4','2020-09-14 16:07:11','',_binary 'R','portal',0,'50',NULL,1,50),(23,195,'WTSHE00012','Sherin 5',207,'WTPRE00024','Presha 1',195,'WTSHE00012','Sherin 5','2020-09-14 16:09:10','',_binary 'L','portal',0,'50',NULL,1,50),(24,195,'WTSHE00012','Sherin 5',208,'WTPRE00025','Presha 2',195,'WTSHE00012','Sherin 5','2020-09-14 16:10:35','',_binary 'R','portal',0,'50',NULL,1,50),(25,196,'WTSHE00013','Sherin 6',209,'WTPRE00026','Presha 3',196,'WTSHE00013','Sherin 6','2020-09-14 16:12:32','',_binary 'L','portal',0,'50',NULL,1,50),(26,196,'WTSHE00013','Sherin 6',210,'WTPRE00027','Presha 4',196,'WTSHE00013','Sherin 6','2020-09-14 16:13:30','',_binary 'R','portal',0,'50',NULL,1,50),(27,197,'WTSHE00014','Sherin 7',211,'WTPRE00028','Presha 5',197,'WTSHE00014','Sherin 7','2020-09-14 16:14:48','',_binary 'L','portal',0,'50',NULL,1,50),(28,197,'WTSHE00014','Sherin 7',212,'WTPRE00029','Presha 6',197,'WTSHE00014','Sherin 7','2020-09-14 16:15:33','',_binary 'R','portal',0,'50',NULL,1,50),(29,198,'WTSHE00015','Sherin 8',213,'WTPRE00030','Presha 6',198,'WTSHE00015','Sherin 8','2020-09-14 16:16:45','',_binary 'L','portal',0,'50',NULL,1,50),(30,198,'WTSHE00015','Sherin 8',214,'WTPRE00031','Presha 8',198,'WTSHE00015','Sherin 8','2020-09-14 16:17:34','',_binary 'R','portal',0,'50',NULL,1,50),(31,199,'WTPRE00016','Presita1',215,'WTFAT00032','Fathima BI ',199,'WTPRE00016','Presita1','2020-09-14 17:02:55','',_binary 'L','portal',0,'50',NULL,1,50),(32,199,'WTPRE00016','Presita1',216,'WTKEM00033','Kempanna. P. Myagadi',199,'WTPRE00016','Presita1','2020-09-14 17:14:09','',_binary 'R','portal',0,'50',NULL,1,50),(33,215,'WTFAT00032','Fathima BI ',217,'WTFAT00034','Fathima BI ',215,'WTFAT00032','Fathima BI ','2020-09-14 17:19:35','',_binary 'L','portal',0,'50',NULL,1,50),(34,215,'WTFAT00032','Fathima BI ',218,'WTFAT00035','Fathima BI ',215,'WTFAT00032','Fathima BI ','2020-09-14 17:22:24','',_binary 'R','portal',0,'50',NULL,1,50),(35,217,'WTFAT00034','Fathima BI ',219,'WTNOO00036','Noore Mohammadi',217,'WTFAT00034','Fathima BI ','2020-09-14 17:31:13','',_binary 'L','portal',0,'50',NULL,1,50),(36,216,'WTKEM00033','Kempanna. P. Myagadi',220,'WTKEM00037','Kempanna. P. Myagadi',216,'WTKEM00033','Kempanna. P. Myagadi','2020-09-14 17:50:50','',_binary 'L','portal',0,'50',NULL,1,50),(37,216,'WTKEM00033','Kempanna. P. Myagadi',221,'WTKEM00038','Kempanna. P. Myagadi',216,'WTKEM00033','Kempanna. P. Myagadi','2020-09-14 17:52:17','',_binary 'R','portal',0,'50',NULL,1,50),(38,214,'WTPRE00031','Presha 8',222,'WTSEL00039','Selvi',214,'WTPRE00031','Presha 8','2020-09-15 18:19:01','',_binary 'R','portal',0,'50',NULL,1,50),(39,222,'WTSEL00039','Selvi',223,'WTSEE00040','Seetha',222,'WTSEL00039','Selvi','2020-09-15 18:23:50','',_binary 'L','portal',0,'50',NULL,1,50),(40,222,'WTSEL00039','Selvi',224,'WTMUR00041','Murali',222,'WTSEL00039','Selvi','2020-09-15 18:26:02','',_binary 'R','portal',0,'50',NULL,1,50),(41,220,'WTKEM00037','Kempanna. P. Myagadi',225,'WTRAJ00042','Rajamani',185,'WTSTE00002','Stephen 1','2020-09-15 18:38:11','',_binary 'L','portal',0,'50',NULL,1,50),(42,225,'WTRAJ00042','Rajamani',226,'WTEBI00043','Ebi Samuel',225,'WTRAJ00042','Rajamani','2020-09-15 18:44:18','',_binary 'L','portal',0,'50',NULL,1,50),(43,225,'WTRAJ00042','Rajamani',227,'WTRAM00044','Ramani Kannan',225,'WTRAJ00042','Rajamani','2020-09-15 18:46:53','',_binary 'R','portal',0,'50',NULL,1,50),(44,214,'WTPRE00031','Presha 8',228,'WTCAT00045','Catherine',214,'WTPRE00031','Presha 8','2020-09-16 11:34:25','',_binary 'L','portal',0,'50',NULL,1,50),(45,200,'WTPRE00017','Presita 2',229,'WTVAS00046','Vasantha',200,'WTPRE00017','Presita 2','2020-09-16 12:24:44','',_binary 'L','portal',0,'50',NULL,1,50);
/*!40000 ALTER TABLE `_tblPlacements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_Log_MobileSMS`
--

DROP TABLE IF EXISTS `_tbl_Log_MobileSMS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_Log_MobileSMS`
--

LOCK TABLES `_tbl_Log_MobileSMS` WRITE;
/*!40000 ALTER TABLE `_tbl_Log_MobileSMS` DISABLE KEYS */;
INSERT INTO `_tbl_Log_MobileSMS` VALUES (1,2,'AD0001','9000000000','Your EPINs generation code is 47970','2020-09-14 14:06:13','','&number=9000000000&message=Your+EPINs+generation+code+is+47970&uid=1'),(2,185,'WTSTE00002','','Dear Stephen 1, Your account has been created. Your Member ID: WTSTE00002 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 14:24:16','','&number=&message=Dear+Stephen+1%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSTE00002+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=2'),(3,186,'WTSTE00003','9900044327','Dear Stephen2, Your account has been created. Your Member ID: WTSTE00003 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 14:27:48','','&number=9900044327&message=Dear+Stephen2%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSTE00003+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=3'),(4,2,'AD0001','9000000000','Your EPINs generation code is 70742','2020-09-14 14:29:36','','&number=9000000000&message=Your+EPINs+generation+code+is+70742&uid=4'),(5,187,'WTSTE00004','9900044327','Dear Stephen 3, Your account has been created. Your Member ID: WTSTE00004 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 14:30:53','','&number=9900044327&message=Dear+Stephen+3%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSTE00004+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=5'),(6,188,'WTSTE00005','8073488190','Dear Stephen 4, Your account has been created. Your Member ID: WTSTE00005 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 14:32:13','','&number=8073488190&message=Dear+Stephen+4%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSTE00005+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=6'),(7,2,'AD0001','9000000000','Your EPINs generation code is 50587','2020-09-14 14:35:42','','&number=9000000000&message=Your+EPINs+generation+code+is+50587&uid=7'),(8,189,'WTSTE00006','8073488190','Dear Stephen6, Your account has been created. Your Member ID: WTSTE00006 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 14:37:23','','&number=8073488190&message=Dear+Stephen6%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSTE00006+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=8'),(9,190,'WTSTE00007','8073488190','Dear Stephen 6, Your account has been created. Your Member ID: WTSTE00007 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 14:38:51','','&number=8073488190&message=Dear+Stephen+6%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSTE00007+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=9'),(10,2,'AD0001','9000000000','Your EPINs generation code is 65670','2020-09-14 14:45:21','','&number=9000000000&message=Your+EPINs+generation+code+is+65670&uid=10'),(11,191,'WTSHE00008','9945307177','Dear Sherin 1, Your account has been created. Your Member ID: WTSHE00008 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 14:48:02','','&number=9945307177&message=Dear+Sherin+1%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSHE00008+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=11'),(12,192,'WTSHE00009','9945307177','Dear Sherin2, Your account has been created. Your Member ID: WTSHE00009 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 14:49:23','','&number=9945307177&message=Dear+Sherin2%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSHE00009+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=12'),(13,2,'AD0001','9000000000','Your EPINs generation code is 67660','2020-09-14 15:09:45','','&number=9000000000&message=Your+EPINs+generation+code+is+67660&uid=13'),(14,193,'WTSHE00010','','Dear Sherin3, Your account has been created. Your Member ID: WTSHE00010 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:11:26','','&number=&message=Dear+Sherin3%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSHE00010+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=14'),(15,194,'WTSHE00011','9945307177','Dear Sherin 4, Your account has been created. Your Member ID: WTSHE00011 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:12:32','','&number=9945307177&message=Dear+Sherin+4%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSHE00011+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=15'),(16,2,'AD0001','9000000000','Your EPINs generation code is 55715','2020-09-14 15:13:28','','&number=9000000000&message=Your+EPINs+generation+code+is+55715&uid=16'),(17,195,'WTSHE00012','9900418269','Dear Sherin 5, Your account has been created. Your Member ID: WTSHE00012 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:18:25','','&number=9900418269&message=Dear+Sherin+5%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSHE00012+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=17'),(18,196,'WTSHE00013','9900044327','Dear Sherin 6, Your account has been created. Your Member ID: WTSHE00013 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:19:33','','&number=9900044327&message=Dear+Sherin+6%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSHE00013+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=18'),(19,1,'WT000001','9000000000','Your Epin Tranfer OTP is 99389','2020-09-14 15:21:56','','&number=9000000000&message=Your+Epin+Tranfer+OTP+is+99389&uid=19'),(20,2,'AD0001','9000000000','Your EPINs generation code is 65829','2020-09-14 15:28:42','','&number=9000000000&message=Your+EPINs+generation+code+is+65829&uid=20'),(21,197,'WTSHE00014','9900418269','Dear Sherin 7, Your account has been created. Your Member ID: WTSHE00014 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:32:50','','&number=9900418269&message=Dear+Sherin+7%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSHE00014+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=21'),(22,198,'WTSHE00015','9900418269','Dear Sherin 8, Your account has been created. Your Member ID: WTSHE00015 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:37:57','','&number=9900418269&message=Dear+Sherin+8%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSHE00015+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=22'),(23,2,'AD0001','9000000000','Your EPINs generation code is 57883','2020-09-14 15:50:03','','&number=9000000000&message=Your+EPINs+generation+code+is+57883&uid=23'),(24,2,'AD0001','9000000000','Your EPINs generation code is 34906','2020-09-14 15:50:35','','&number=9000000000&message=Your+EPINs+generation+code+is+34906&uid=24'),(25,199,'WTPRE00016','9632260703','Dear Presita1, Your account has been created. Your Member ID: WTPRE00016 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:52:20','','&number=9632260703&message=Dear+Presita1%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00016+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=25'),(26,200,'WTPRE00017','9632270703','Dear Presita 2, Your account has been created. Your Member ID: WTPRE00017 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:53:20','','&number=9632270703&message=Dear+Presita+2%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00017+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=26'),(27,201,'WTPRE00018','9632260703','Dear Presita 3, Your account has been created. Your Member ID: WTPRE00018 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:54:53','','&number=9632260703&message=Dear+Presita+3%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00018+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=27'),(28,202,'WTPRE00019','','Dear Presita 4, Your account has been created. Your Member ID: WTPRE00019 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 15:56:12','','&number=&message=Dear+Presita+4%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00019+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=28'),(29,2,'AD0001','9000000000','Your EPINs generation code is 87059','2020-09-14 15:57:34','','&number=9000000000&message=Your+EPINs+generation+code+is+87059&uid=29'),(30,2,'AD0001','9000000000','Your EPINs generation code is 80352','2020-09-14 15:58:08','','&number=9000000000&message=Your+EPINs+generation+code+is+80352&uid=30'),(31,2,'AD0001','9000000000','Your EPINs generation code is 71500','2020-09-14 15:58:42','','&number=9000000000&message=Your+EPINs+generation+code+is+71500&uid=31'),(32,2,'AD0001','9000000000','Your EPINs generation code is 71086','2020-09-14 15:59:17','','&number=9000000000&message=Your+EPINs+generation+code+is+71086&uid=32'),(33,2,'AD0001','9000000000','Your EPINs generation code is 10288','2020-09-14 15:59:47','','&number=9000000000&message=Your+EPINs+generation+code+is+10288&uid=33'),(34,2,'AD0001','9000000000','Your EPINs generation code is 63675','2020-09-14 16:00:44','','&number=9000000000&message=Your+EPINs+generation+code+is+63675&uid=34'),(35,203,'WTPRE00020','','Dear Presita 5, Your account has been created. Your Member ID: WTPRE00020 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:04:09','','&number=&message=Dear+Presita+5%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00020+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=35'),(36,204,'WTPRE00021','','Dear Presita 6, Your account has been created. Your Member ID: WTPRE00021 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:05:05','','&number=&message=Dear+Presita+6%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00021+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=36'),(37,205,'WTPRE00022','','Dear Presita 7, Your account has been created. Your Member ID: WTPRE00022 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:06:18','','&number=&message=Dear+Presita+7%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00022+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=37'),(38,206,'WTPRE00023','','Dear Presita 8, Your account has been created. Your Member ID: WTPRE00023 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:07:11','','&number=&message=Dear+Presita+8%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00023+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=38'),(39,207,'WTPRE00024','8050085197','Dear Presha 1, Your account has been created. Your Member ID: WTPRE00024 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:09:10','','&number=8050085197&message=Dear+Presha+1%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00024+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=39'),(40,208,'WTPRE00025','8050085197','Dear Presha 2, Your account has been created. Your Member ID: WTPRE00025 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:10:35','','&number=8050085197&message=Dear+Presha+2%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00025+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=40'),(41,209,'WTPRE00026','8050085197','Dear Presha 3, Your account has been created. Your Member ID: WTPRE00026 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:12:32','','&number=8050085197&message=Dear+Presha+3%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00026+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=41'),(42,210,'WTPRE00027','','Dear Presha 4, Your account has been created. Your Member ID: WTPRE00027 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:13:30','','&number=&message=Dear+Presha+4%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00027+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=42'),(43,211,'WTPRE00028','','Dear Presha 5, Your account has been created. Your Member ID: WTPRE00028 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:14:48','','&number=&message=Dear+Presha+5%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00028+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=43'),(44,212,'WTPRE00029','','Dear Presha 6, Your account has been created. Your Member ID: WTPRE00029 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:15:33','','&number=&message=Dear+Presha+6%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00029+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=44'),(45,213,'WTPRE00030','','Dear Presha 6, Your account has been created. Your Member ID: WTPRE00030 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:16:45','','&number=&message=Dear+Presha+6%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00030+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=45'),(46,214,'WTPRE00031','','Dear Presha 8, Your account has been created. Your Member ID: WTPRE00031 and Password: 111111 on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 16:17:34','','&number=&message=Dear+Presha+8%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTPRE00031+and+Password%3A+111111+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=46'),(47,1,'WT000001','9900044327','Your Epin Tranfer OTP is 77646','2020-09-14 16:37:01','','&number=9900044327&message=Your+Epin+Tranfer+OTP+is+77646&uid=47'),(48,2,'AD0001','9000000000','Your EPINs generation code is 76511','2020-09-14 16:44:17','','&number=9000000000&message=Your+EPINs+generation+code+is+76511&uid=48'),(49,215,'WTFAT00032','9535115424','Dear Fathima BI , Your account has been created. Your Member ID: WTFAT00032 and Password: WTGMPL on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 17:02:55','','&number=9535115424&message=Dear+Fathima+BI+%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTFAT00032+and+Password%3A+WTGMPL+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=49'),(50,216,'WTKEM00033','9902704574','Dear Kempanna. P. Myagadi, Your account has been created. Your Member ID: WTKEM00033 and Password: WTGMPL on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 17:14:09','','&number=9902704574&message=Dear+Kempanna.+P.+Myagadi%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTKEM00033+and+Password%3A+WTGMPL+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=50'),(51,2,'AD0001','9000000000','Your EPINs generation code is 45074','2020-09-14 17:16:35','','&number=9000000000&message=Your+EPINs+generation+code+is+45074&uid=51'),(52,217,'WTFAT00034','9535115424','Dear Fathima BI , Your account has been created. Your Member ID: WTFAT00034 and Password: WTGMPL on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 17:19:35','','&number=9535115424&message=Dear+Fathima+BI+%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTFAT00034+and+Password%3A+WTGMPL+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=52'),(53,218,'WTFAT00035','9535115424','Dear Fathima BI , Your account has been created. Your Member ID: WTFAT00035 and Password: WTGMPL on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 17:22:24','','&number=9535115424&message=Dear+Fathima+BI+%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTFAT00035+and+Password%3A+WTGMPL+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=53'),(54,2,'AD0001','9000000000','Your EPINs generation code is 47183','2020-09-14 17:26:13','','&number=9000000000&message=Your+EPINs+generation+code+is+47183&uid=54'),(55,219,'WTNOO00036','9632705220','Dear Noore Mohammadi, Your account has been created. Your Member ID: WTNOO00036 and Password: wtgmpl on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 17:31:13','','&number=9632705220&message=Dear+Noore+Mohammadi%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTNOO00036+and+Password%3A+wtgmpl+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=55'),(56,2,'AD0001','9000000000','Your EPINs generation code is 99330','2020-09-14 17:49:03','','&number=9000000000&message=Your+EPINs+generation+code+is+99330&uid=56'),(57,220,'WTKEM00037','9902704574','Dear Kempanna. P. Myagadi, Your account has been created. Your Member ID: WTKEM00037 and Password: WTGMPL on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 17:50:50','','&number=9902704574&message=Dear+Kempanna.+P.+Myagadi%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTKEM00037+and+Password%3A+WTGMPL+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=57'),(58,221,'WTKEM00038','9902704574','Dear Kempanna. P. Myagadi, Your account has been created. Your Member ID: WTKEM00038 and Password: WTGMPL on Sep 14, 2020. Login Url: http://WinTogether2.com/login','2020-09-14 17:52:17','','&number=9902704574&message=Dear+Kempanna.+P.+Myagadi%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTKEM00038+and+Password%3A+WTGMPL+on+Sep+14%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=58'),(59,2,'AD0001','9000000000','Your EPINs generation code is 22301','2020-09-15 17:42:46','','&number=9000000000&message=Your+EPINs+generation+code+is+22301&uid=59'),(60,222,'WTSEL00039','9731900406','Dear Selvi, Your account has been created. Your Member ID: WTSEL00039 and Password: wtgmpl on Sep 15, 2020. Login Url: http://WinTogether2.com/login','2020-09-15 18:19:01','','&number=9731900406&message=Dear+Selvi%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSEL00039+and+Password%3A+wtgmpl+on+Sep+15%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=60'),(61,2,'AD0001','9000000000','Your EPINs generation code is 27452','2020-09-15 18:21:27','','&number=9000000000&message=Your+EPINs+generation+code+is+27452&uid=61'),(62,223,'WTSEE00040','9986244997','Dear Seetha, Your account has been created. Your Member ID: WTSEE00040 and Password: wtgmpl on Sep 15, 2020. Login Url: http://WinTogether2.com/login','2020-09-15 18:23:50','','&number=9986244997&message=Dear+Seetha%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTSEE00040+and+Password%3A+wtgmpl+on+Sep+15%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=62'),(63,224,'WTMUR00041','9731900406','Dear Murali, Your account has been created. Your Member ID: WTMUR00041 and Password: wtgmpl on Sep 15, 2020. Login Url: http://WinTogether2.com/login','2020-09-15 18:26:02','','&number=9731900406&message=Dear+Murali%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTMUR00041+and+Password%3A+wtgmpl+on+Sep+15%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=63'),(64,2,'AD0001','9000000000','Your EPINs generation code is 58179','2020-09-15 18:34:12','','&number=9000000000&message=Your+EPINs+generation+code+is+58179&uid=64'),(65,225,'WTRAJ00042','9884342842','Dear Rajamani, Your account has been created. Your Member ID: WTRAJ00042 and Password: wtgmpl on Sep 15, 2020. Login Url: http://WinTogether2.com/login','2020-09-15 18:38:11','','&number=9884342842&message=Dear+Rajamani%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTRAJ00042+and+Password%3A+wtgmpl+on+Sep+15%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=65'),(66,2,'AD0001','9000000000','Your EPINs generation code is 28764','2020-09-15 18:41:36','','&number=9000000000&message=Your+EPINs+generation+code+is+28764&uid=66'),(67,226,'WTEBI00043','9940499931','Dear Ebi Samuel, Your account has been created. Your Member ID: WTEBI00043 and Password: wtgmpl on Sep 15, 2020. Login Url: http://WinTogether2.com/login','2020-09-15 18:44:18','','&number=9940499931&message=Dear+Ebi+Samuel%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTEBI00043+and+Password%3A+wtgmpl+on+Sep+15%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=67'),(68,227,'WTRAM00044','9444411248','Dear Ramani Kannan, Your account has been created. Your Member ID: WTRAM00044 and Password: wtgmpl on Sep 15, 2020. Login Url: http://WinTogether2.com/login','2020-09-15 18:46:53','','&number=9444411248&message=Dear+Ramani+Kannan%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTRAM00044+and+Password%3A+wtgmpl+on+Sep+15%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=68'),(69,2,'AD0001','9000000000','Your EPINs generation code is 87395','2020-09-16 11:30:39','','&number=9000000000&message=Your+EPINs+generation+code+is+87395&uid=69'),(70,228,'WTCAT00045','8095537089','Dear Catherine, Your account has been created. Your Member ID: WTCAT00045 and Password: wtgmpl on Sep 16, 2020. Login Url: http://WinTogether2.com/login','2020-09-16 11:34:25','','&number=8095537089&message=Dear+Catherine%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTCAT00045+and+Password%3A+wtgmpl+on+Sep+16%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=70'),(71,2,'AD0001','9000000000','Your EPINs generation code is 50613','2020-09-16 12:20:41','','&number=9000000000&message=Your+EPINs+generation+code+is+50613&uid=71'),(72,229,'WTVAS00046','9663279927','Dear Vasantha, Your account has been created. Your Member ID: WTVAS00046 and Password: wtgmpl on Sep 16, 2020. Login Url: http://WinTogether2.com/login','2020-09-16 12:24:44','','&number=9663279927&message=Dear+Vasantha%2C+Your+account+has+been+created.+Your+Member+ID%3A+WTVAS00046+and+Password%3A+wtgmpl+on+Sep+16%2C+2020.+Login+Url%3A+http%3A%2F%2FWinTogether2.com%2Flogin&uid=72');
/*!40000 ALTER TABLE `_tbl_Log_MobileSMS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_Members`
--

DROP TABLE IF EXISTS `_tbl_Members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_Members` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberCode` varchar(255) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `DateofBirth` date DEFAULT NULL,
  `Sex` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `MemberEmail` varchar(255) DEFAULT NULL,
  `MemberPassword` varchar(255) DEFAULT NULL,
  `MemberTxnPassword` varchar(255) DEFAULT NULL,
  `FatherName` varchar(255) DEFAULT NULL,
  `PanCard` varchar(255) DEFAULT NULL,
  `AdhaarCard` varchar(255) DEFAULT NULL,
  `AddressLine1` varchar(255) DEFAULT NULL,
  `AddressLine2` varchar(255) DEFAULT NULL,
  `CountryName` varchar(255) DEFAULT NULL,
  `StateNameID` int(11) DEFAULT '0',
  `StateName` varchar(255) DEFAULT NULL,
  `DistrictNameID` int(11) DEFAULT '0',
  `DistrictName` varchar(255) DEFAULT NULL,
  `PinCode` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `CreatedOn` datetime DEFAULT NULL,
  `SponsorCode` varchar(255) DEFAULT NULL,
  `SponsorID` varchar(255) DEFAULT NULL,
  `SponsorName` varchar(255) DEFAULT NULL,
  `UplineID` int(11) DEFAULT NULL,
  `UplineCode` varchar(255) DEFAULT NULL,
  `UplineName` varchar(255) DEFAULT NULL,
  `IsClub` int(11) DEFAULT '0',
  `ClubID` varchar(255) DEFAULT NULL,
  `ClubUpdated` datetime DEFAULT NULL,
  `Thumb` varchar(255) DEFAULT NULL,
  `KYCVerified` int(11) DEFAULT NULL,
  `KYCVerifiedOn` datetime DEFAULT NULL,
  `PanCardFile` varchar(255) DEFAULT NULL,
  `CurrentPackageID` int(11) DEFAULT NULL,
  `CurrentPackageName` varchar(255) DEFAULT NULL,
  `RequireMobileOtpLogin` int(1) DEFAULT '0',
  `IsBinaryEligible` int(11) DEFAULT '0',
  `IsPayoutEligible` int(11) DEFAULT '0',
  `DirectLeft` int(11) DEFAULT '0',
  `DirectRight` int(11) DEFAULT '0',
  `Status` int(11) DEFAULT '0',
  `StatusOn` date DEFAULT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_Members`
--

LOCK TABLES `_tbl_Members` WRITE;
/*!40000 ALTER TABLE `_tbl_Members` DISABLE KEYS */;
INSERT INTO `_tbl_Members` VALUES (1,'WT000001','Stephen','1972-07-02','Male','9900044327','admin@gmail.com','12345678','123456789','','123456789','','No 69, Pillanna Garden, Ist stage 4th Cross St,','Thomas Town Post,','India',2,'Karnataka',39,'Bengaluru Urban','560084',1,'2020-09-06 00:00:00','0','0','0',1,'0','0',0,'0','0000-00-00 00:00:00','1600147372_index.jpg',NULL,NULL,'1600147367_rose.jpg',1,'WTBasic',0,1,1,1,1,0,'0000-00-00'),(185,'WTSTE00002','Stephen 1','1970-01-01','Male','','','111111','presitasharon','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 14:24:16','WT000001','1','Stephen',1,'WT000001','Stephen',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,2,1,0,NULL),(186,'WTSTE00003','Stephen2','1970-01-01','Male','9900044327','','111111','','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 14:27:48','WT000001','1','Stephen',1,'WT000001','Stephen',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(187,'WTSTE00004','Stephen 3','1970-01-01','Male','9900044327','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 14:30:53','WTSTE00002','185','Stephen 1',185,'WTSTE00002','Stephen 1',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(188,'WTSTE00005','Stephen 4','1970-01-01','Male','8073488190','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 14:32:13','WTSTE00002','185','Stephen 1',185,'WTSTE00002','Stephen 1',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(189,'WTSTE00006','Stephen6','1972-07-02','Male','8073488190','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 14:37:23','WTSTE00003','186','Stephen2',186,'WTSTE00003','Stephen2',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(190,'WTSTE00007','Stephen 6','1972-07-02','Male','8073488190','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 14:38:51','WTSTE00003','186','Stephen2',186,'WTSTE00003','Stephen2',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(191,'WTSHE00008','Sherin 1','1979-09-17','Female','9945307177','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 14:48:02','WTSTE00004','187','Stephen 3',187,'WTSTE00004','Stephen 3',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(192,'WTSHE00009','Sherin2','1979-09-17','Female','9945307177','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 14:49:23','WTSTE00004','187','Stephen 3',187,'WTSTE00004','Stephen 3',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(193,'WTSHE00010','Sherin3','1979-09-17','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:11:26','WTSTE00005','188','Stephen 4',188,'WTSTE00005','Stephen 4',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(194,'WTSHE00011','Sherin 4','1979-09-17','Female','9945307177','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:12:32','WTSTE00005','188','Stephen 4',188,'WTSTE00005','Stephen 4',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(195,'WTSHE00012','Sherin 5','1970-01-01','Male','9900418269','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:18:25','WTSTE00006','189','Stephen6',189,'WTSTE00006','Stephen6',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(196,'WTSHE00013','Sherin 6','1979-09-17','Female','9900044327','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:19:33','WTSTE00006','189','Stephen6',189,'WTSTE00006','Stephen6',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(197,'WTSHE00014','Sherin 7','1979-09-17','Female','9900418269','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:32:50','WTSTE00007','190','Stephen 6',190,'WTSTE00007','Stephen 6',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(198,'WTSHE00015','Sherin 8','1979-09-17','Female','9900418269','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:37:57','WTSTE00007','190','Stephen 6',190,'WTSTE00007','Stephen 6',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(199,'WTPRE00016','Presita1','1998-11-14','Female','9632260703','','22222222','presitasharon','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:52:20','WTSHE00008','191','Sherin 1',191,'WTSHE00008','Sherin 1',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(200,'WTPRE00017','Presita 2','1998-11-14','Female','9632270703','','111111','presitasharon','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:53:20','WTSHE00008','191','Sherin 1',191,'WTSHE00008','Sherin 1',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,1,0,0,NULL),(201,'WTPRE00018','Presita 3','1998-11-14','Female','9632260703','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:54:53','WTSHE00009','192','Sherin2',192,'WTSHE00009','Sherin2',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(202,'WTPRE00019','Presita 4','1998-11-14','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 15:56:12','WTSHE00009','192','Sherin2',192,'WTSHE00009','Sherin2',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(203,'WTPRE00020','Presita 5','1998-11-14','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:04:09','WTSHE00010','193','Sherin3',193,'WTSHE00010','Sherin3',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(204,'WTPRE00021','Presita 6','1998-11-14','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:05:05','WTSHE00010','193','Sherin3',193,'WTSHE00010','Sherin3',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(205,'WTPRE00022','Presita 7','1998-11-14','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:06:18','WTSHE00011','194','Sherin 4',194,'WTSHE00011','Sherin 4',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(206,'WTPRE00023','Presita 8','1998-11-14','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:07:11','WTSHE00011','194','Sherin 4',194,'WTSHE00011','Sherin 4',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(207,'WTPRE00024','Presha 1','2002-06-18','Female','8050085197','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:09:10','WTSHE00012','195','Sherin 5',195,'WTSHE00012','Sherin 5',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(208,'WTPRE00025','Presha 2','2002-06-18','Female','8050085197','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:10:35','WTSHE00012','195','Sherin 5',195,'WTSHE00012','Sherin 5',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(209,'WTPRE00026','Presha 3','2002-06-18','Female','8050085197','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:12:32','WTSHE00013','196','Sherin 6',196,'WTSHE00013','Sherin 6',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(210,'WTPRE00027','Presha 4','2002-06-18','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:13:30','WTSHE00013','196','Sherin 6',196,'WTSHE00013','Sherin 6',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(211,'WTPRE00028','Presha 5','2002-06-18','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:14:48','WTSHE00014','197','Sherin 7',197,'WTSHE00014','Sherin 7',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(212,'WTPRE00029','Presha 6','1970-01-01','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:15:33','WTSHE00014','197','Sherin 7',197,'WTSHE00014','Sherin 7',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(213,'WTPRE00030','Presha 6','2002-06-18','Female','','','111111',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:16:45','WTSHE00015','198','Sherin 8',198,'WTSHE00015','Sherin 8',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(214,'WTPRE00031','Presha 8','2002-06-18','Female','','','111111','presitasharon','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 16:17:34','WTSHE00015','198','Sherin 8',198,'WTSHE00015','Sherin 8',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(215,'WTFAT00032','Fathima BI ','1970-01-01','Male','9535115424','','WTGMPL','12345786','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 17:02:55','WTPRE00016','199','Presita1',199,'WTPRE00016','Presita1',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(216,'WTKEM00033','Kempanna. P. Myagadi','1970-01-01','Male','9902704574','','WTGMPL','presitasharon','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 17:14:09','WTPRE00016','199','Presita1',199,'WTPRE00016','Presita1',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(217,'WTFAT00034','Fathima BI ','1970-01-01','Female','9535115424','','WTGMPL',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 17:19:35','WTFAT00032','215','Fathima BI ',215,'WTFAT00032','Fathima BI ',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,1,0,0,NULL),(218,'WTFAT00035','Fathima BI ','1970-01-01','Female','9535115424','','WTGMPL',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 17:22:24','WTFAT00032','215','Fathima BI ',215,'WTFAT00032','Fathima BI ',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(219,'WTNOO00036','Noore Mohammadi','1970-01-01','Female','9632705220','','wtgmpl',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 17:31:13','WTFAT00034','217','Fathima BI ',217,'WTFAT00034','Fathima BI ',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(220,'WTKEM00037','Kempanna. P. Myagadi','1970-01-01','Male','9902704574','','WTGMPL','presitasharon','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 17:50:50','WTKEM00033','216','Kempanna. P. Myagadi',216,'WTKEM00033','Kempanna. P. Myagadi',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(221,'WTKEM00038','Kempanna. P. Myagadi','1970-01-01','Male','9902704574','','WTGMPL',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-14 17:52:17','WTKEM00033','216','Kempanna. P. Myagadi',216,'WTKEM00033','Kempanna. P. Myagadi',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(222,'WTSEL00039','Selvi','1970-01-01','Female','9731900406','','wtgmpl','presitasharon','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-15 18:19:01','WTPRE00031','214','Presha 8',214,'WTPRE00031','Presha 8',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(223,'WTSEE00040','Seetha','1970-01-01','Female','9986244997','','wtgmpl',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-15 18:23:50','WTSEL00039','222','Selvi',222,'WTSEL00039','Selvi',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(224,'WTMUR00041','Murali','1970-01-01','Male','9731900406','','wtgmpl',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-15 18:26:02','WTSEL00039','222','Selvi',222,'WTSEL00039','Selvi',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(225,'WTRAJ00042','Rajamani','1970-01-01','Female','9884342842','','wtgmpl','presitasharon','','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-15 18:38:11','WTSTE00002','185','Stephen 1',220,'WTKEM00037','Kempanna. P. Myagadi',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,1,1,1,1,0,NULL),(226,'WTEBI00043','Ebi Samuel','1970-01-01','Male','9940499931','','wtgmpl',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-15 18:44:18','WTRAJ00042','225','Rajamani',225,'WTRAJ00042','Rajamani',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(227,'WTRAM00044','Ramani Kannan','1970-01-01','Male','9444411248','','wtgmpl',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-15 18:46:53','WTRAJ00042','225','Rajamani',225,'WTRAJ00042','Rajamani',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(228,'WTCAT00045','Catherine','1970-01-01','Female','8095537089','','wtgmpl',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-16 11:34:25','WTPRE00031','214','Presha 8',214,'WTPRE00031','Presha 8',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL),(229,'WTVAS00046','Vasantha','1970-01-01','Female','9663279927','','wtgmpl',NULL,'','','','','',NULL,0,NULL,0,NULL,'',1,'2020-09-16 12:24:44','WTPRE00017','200','Presita 2',200,'WTPRE00017','Presita 2',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'WTBasic',0,0,0,0,0,0,NULL);
/*!40000 ALTER TABLE `_tbl_Members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_Members_Package_Elegible`
--

DROP TABLE IF EXISTS `_tbl_Members_Package_Elegible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_Members_Package_Elegible` (
  `PackageEligibleID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `MemberName` varchar(255) DEFAULT NULL,
  `EligibledOn` datetime DEFAULT NULL,
  `PayoutType` int(2) DEFAULT '0' COMMENT '0.  1. Cash 2. Package 3. Coupon',
  `Description` text,
  `UplodatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`PackageEligibleID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_Members_Package_Elegible`
--

LOCK TABLES `_tbl_Members_Package_Elegible` WRITE;
/*!40000 ALTER TABLE `_tbl_Members_Package_Elegible` DISABLE KEYS */;
INSERT INTO `_tbl_Members_Package_Elegible` VALUES (1,1,'WT000001','Stephen','2020-09-15 11:35:40',0,'','0000-00-00 00:00:00'),(2,185,'WTSTE00002','Stephen 1','2020-09-15 11:35:40',0,'','0000-00-00 00:00:00'),(3,186,'WTSTE00003','Stephen2','2020-09-15 11:35:40',0,'','0000-00-00 00:00:00'),(4,187,'WTSTE00004','Stephen 3','2020-09-15 11:35:40',0,NULL,NULL),(5,188,'WTSTE00005','Stephen 4','2020-09-15 11:35:40',0,NULL,NULL),(6,189,'WTSTE00006','Stephen6','2020-09-15 11:35:40',0,NULL,NULL),(7,190,'WTSTE00007','Stephen 6','2020-09-15 11:35:40',0,NULL,NULL),(8,191,'WTSHE00008','Sherin 1','2020-09-15 11:35:40',0,NULL,NULL),(9,192,'WTSHE00009','Sherin2','2020-09-15 11:35:40',0,NULL,NULL),(10,193,'WTSHE00010','Sherin3','2020-09-15 11:35:40',0,NULL,NULL),(11,194,'WTSHE00011','Sherin 4','2020-09-15 11:35:40',0,NULL,NULL),(12,195,'WTSHE00012','Sherin 5','2020-09-15 11:35:40',0,NULL,NULL),(13,196,'WTSHE00013','Sherin 6','2020-09-15 11:35:40',0,NULL,NULL),(14,197,'WTSHE00014','Sherin 7','2020-09-15 11:35:40',0,NULL,NULL),(15,198,'WTSHE00015','Sherin 8','2020-09-15 11:35:40',0,NULL,NULL),(16,199,'WTPRE00016','Presita1','2020-09-15 11:35:40',0,NULL,NULL),(17,215,'WTFAT00032','Fathima BI ','2020-09-15 11:35:40',0,NULL,NULL),(18,216,'WTKEM00033','Kempanna. P. Myagadi','2020-09-15 11:35:40',0,NULL,NULL),(19,222,'WTSEL00039','Selvi','2020-09-16 08:13:55',0,NULL,NULL),(20,225,'WTRAJ00042','Rajamani','2020-09-16 08:13:55',0,NULL,NULL),(21,214,'WTPRE00031','Presha 8','2020-09-17 15:43:20',0,NULL,NULL);
/*!40000 ALTER TABLE `_tbl_Members_Package_Elegible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_Settings_Packages`
--

DROP TABLE IF EXISTS `_tbl_Settings_Packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_Settings_Packages` (
  `PackageID` int(11) NOT NULL AUTO_INCREMENT,
  `PackageName` varchar(255) DEFAULT NULL,
  `PV` varchar(255) DEFAULT NULL,
  `PackageAmount` varchar(255) DEFAULT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `Prefix` varchar(255) DEFAULT NULL,
  `CutOffPV` varchar(255) DEFAULT NULL,
  `PVAmount` varchar(255) DEFAULT NULL,
  `DirectReferalCommission` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PackageID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_Settings_Packages`
--

LOCK TABLES `_tbl_Settings_Packages` WRITE;
/*!40000 ALTER TABLE `_tbl_Settings_Packages` DISABLE KEYS */;
INSERT INTO `_tbl_Settings_Packages` VALUES (1,'WTBasic','50','1999','silver.png','WTB','1000','1','50');
/*!40000 ALTER TABLE `_tbl_Settings_Packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_Settings_Params`
--

DROP TABLE IF EXISTS `_tbl_Settings_Params`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_Settings_Params` (
  `ParamID` int(11) NOT NULL AUTO_INCREMENT,
  `ParamCode` varchar(255) DEFAULT NULL,
  `ParamLabel` varchar(255) DEFAULT NULL,
  `ParamValue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ParamID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_Settings_Params`
--

LOCK TABLES `_tbl_Settings_Params` WRITE;
/*!40000 ALTER TABLE `_tbl_Settings_Params` DISABLE KEYS */;
INSERT INTO `_tbl_Settings_Params` VALUES (1,'MinWithdrawal','Minimum withdrawal amount (Rs)','1999'),(2,'MaxWithdrawal','Maximum withdrawal amount (%)','100'),(3,'PayoutMode','Payout ','2'),(4,'MinPayout','Minimum payout amount (Rs)','1000'),(5,'PayoutCharges','Payout charges (%)','10'),(6,'MemberCodePrefix','Member Prefix','WT'),(7,'MemberCodeLength','Member Code Length','5'),(8,'EpinPrefix','E-Pin Prefix','epin'),(9,'EpinLength','E-Pin Length','8'),(10,'EpinPwdLength','E-Pin Password Length','8'),(11,'DefaultPackageID','Default Package ','1'),(12,'PayoutCutOff','Maximum Payout CutOff','1000'),(13,'InitialBusTicket','Initial BusTicket API','300000'),(14,'InitialRecharge','Initial Recharge API','800000'),(15,'MaxPayout','Maximum Payout (Rs)','10000'),(16,'MobileSMSSendAPI','Mobile SMS Send API',''),(17,'MobileSMSBalanceAPI','Mobile SMS Balance API',''),(18,'MaximumLevels','Maximum Downline','10'),(19,'EnableSendSMS','Send Mobile SMS','0'),(20,'AllowDuplicateMobile','Is allow duplicate Mobile Number?','3'),(21,'IsMobileIsMandatory','Is Mobile Number mandatory?','0'),(22,'AllowDuplicatePanCard','Is allow duplicate PanCard?','0'),(23,'IsPanCardIsMandatory','Is PanCard mandatory?','0'),(24,'AllowDuplicateEmail','Is allow duplicate Email? ','0'),(25,'IsEmailMandatory','Is Email mandatory?','0'),(26,'MemberPasswordLength','Member password length','6'),(27,'AdminLoginMobileOTPRequired','Is enable send Mobile SMS OTP When Admin Login','0'),(28,'AdminLoginEmailOTPRequired','Is enable send Email OTP When Admin Login','0'),(29,'MemberLoginMobileOTPRequired','Is enable send Mobile SMS OTP When Member Login','0'),(30,'MemberLoginEmailOTPRequired','Is enable send EMail OTP When Member Login','0'),(31,'SMTP_HostUrl','SMTP Host Name','mail.wintogether2.com'),(32,'SMTP_UserName','SMTP User Name','support@wintogether2.com'),(33,'SMTP_Password','SMTP Password','Welcome@@82'),(34,'SMTP_Port','SMTP Port Number','465'),(35,'SMTP_Secure','SMTP Protocal','ssl'),(36,'SMTP_SenderName','Sender Name','WinTogether'),(37,'EnableEMail','Is enable Email Service','1'),(38,'WhatsappSendAPI','Mobile SMS Send API',''),(39,'WhatsappBalanceAPI','Mobile SMS Balance API',''),(40,'WhatsappSendSMS','Send Whatsapp SMS','0'),(42,'MemberLoginWhatsappOTPRequired','Is enable send Whatsapp SMS OTP When Member Login','0'),(43,'AdminLoginWhatsappOTPRequired','Is enable send Whatsapp SMS OTP When Admin Login','0');
/*!40000 ALTER TABLE `_tbl_Settings_Params` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_admin`
--

DROP TABLE IF EXISTS `_tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminCode` varchar(255) DEFAULT NULL,
  `AdminName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `AdminEmail` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `DateofBirth` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `StateName` varchar(255) DEFAULT NULL,
  `CountryName` varchar(255) DEFAULT NULL,
  `DistrictName` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_admin`
--

LOCK TABLES `_tbl_admin` WRITE;
/*!40000 ALTER TABLE `_tbl_admin` DISABLE KEYS */;
INSERT INTO `_tbl_admin` VALUES (2,'AD0001','Stephen','9000000000','stephen@wintogether2.com','password','','','','','','','','','','2020-09-06 00:00:00');
/*!40000 ALTER TABLE `_tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_admin_bank_details`
--

DROP TABLE IF EXISTS `_tbl_admin_bank_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_admin_bank_details` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `BankName` varchar(255) DEFAULT NULL,
  `AccountHolderName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_admin_bank_details`
--

LOCK TABLES `_tbl_admin_bank_details` WRITE;
/*!40000 ALTER TABLE `_tbl_admin_bank_details` DISABLE KEYS */;
INSERT INTO `_tbl_admin_bank_details` VALUES (1,'WinTogehterWallet','WinTogether','WinTogether','WinTogether','2020-09-06 00:00:00');
/*!40000 ALTER TABLE `_tbl_admin_bank_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_admin_login_logs`
--

DROP TABLE IF EXISTS `_tbl_admin_login_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_admin_login_logs` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` int(11) DEFAULT NULL,
  `LoginOn` datetime DEFAULT NULL,
  `IsSuccess` int(11) DEFAULT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_admin_login_logs`
--

LOCK TABLES `_tbl_admin_login_logs` WRITE;
/*!40000 ALTER TABLE `_tbl_admin_login_logs` DISABLE KEYS */;
INSERT INTO `_tbl_admin_login_logs` VALUES (1,2,'2020-09-14 10:02:24',1),(2,2,'2020-09-14 14:03:58',1),(3,2,'2020-09-14 14:04:56',1),(4,2,'2020-09-14 14:21:21',1),(5,2,'2020-09-14 15:41:59',1),(6,2,'2020-09-14 16:03:20',1),(7,2,'2020-09-14 16:43:46',1),(8,2,'2020-09-14 17:16:13',1),(9,2,'2020-09-14 17:20:23',1),(10,2,'2020-09-14 18:10:56',1),(11,2,'2020-09-15 10:08:10',1),(12,2,'2020-09-15 10:27:54',1),(13,2,'2020-09-15 13:44:03',1),(14,2,'2020-09-15 13:46:15',1),(15,2,'2020-09-15 13:47:19',1),(16,2,'2020-09-15 14:40:50',1),(17,2,'2020-09-15 14:40:57',1),(18,2,'2020-09-15 15:00:25',1),(19,2,'2020-09-15 15:09:34',1),(20,2,'2020-09-15 15:11:18',1),(21,2,'2020-09-15 15:27:48',1),(22,2,'2020-09-15 16:32:27',1),(23,2,'2020-09-15 17:41:37',1),(24,2,'2020-09-15 18:20:58',1),(25,2,'2020-09-16 10:24:33',1),(26,2,'2020-09-16 10:32:05',1),(27,2,'2020-09-16 11:30:04',1),(28,2,'2020-09-16 12:20:18',1),(29,2,'2020-09-17 11:34:17',1);
/*!40000 ALTER TABLE `_tbl_admin_login_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_bank_names`
--

DROP TABLE IF EXISTS `_tbl_bank_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_bank_names` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `BankName` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  PRIMARY KEY (`BankID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_bank_names`
--

LOCK TABLES `_tbl_bank_names` WRITE;
/*!40000 ALTER TABLE `_tbl_bank_names` DISABLE KEYS */;
INSERT INTO `_tbl_bank_names` VALUES (1,'Indian Overseas Bank',1),(2,'State Bank of India',1),(3,'Bank of Baroda ',1),(4,'Bank of India',1),(5,'Bank of Maharashtra ',1),(6,'Canara Bank ',1),(7,'Central Bank of India ',1),(8,'Indian Bank',1),(9,'Punjab AND Sind Bank',1),(10,'Punjab NATIONAL Bank ',1),(11,'UCO Bank ',1),(12,'UNION Bank of India ',1),(13,'Axis Bank',1),(14,'Bandhan Bank',1),(15,'Catholic Syrian Bank',1),(16,'City UNION Bank',1),(17,'DCB Bank',1),(18,'Dhanlaxmi Bank',1),(19,'Federal Bank',1),(20,'HDFC Bank',1),(21,'ICICI Bank',1),(22,'IDBI Bank',1),(23,'IDFC FIRST Bank',1),(24,'IndusInd Bank',1),(25,'Jammu & Kashmir Bank',1),(26,'Karnataka Bank',1),(27,'Karur Vysya Bank',1),(28,'Kotak Mahindra Bank',1),(29,'Lakshmi Vilas Bank',1),(30,'Nainital Bank',1),(31,'RBL Bank',1),(32,'South Indian Bank',1),(33,'Tamilnad Mercantile Bank Limited',1),(34,'Yes Bank',1);
/*!40000 ALTER TABLE `_tbl_bank_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_business_supporting_center`
--

DROP TABLE IF EXISTS `_tbl_business_supporting_center`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_business_supporting_center` (
  `SupportingCenterAdminID` int(11) NOT NULL AUTO_INCREMENT,
  `SupportingCenterAdminName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `AdminEmail` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `PanCard` varchar(255) DEFAULT NULL,
  `AdhaarCard` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `SupportingCenterName` varchar(255) DEFAULT NULL,
  `SupportingCenterAddressLine1` varchar(255) DEFAULT NULL,
  `SupportingCenterAddressLine2` varchar(255) DEFAULT NULL,
  `SupportingCenterCityName` varchar(255) DEFAULT NULL,
  `Landmark` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `StateID` int(11) DEFAULT '0',
  `State` varchar(255) DEFAULT NULL,
  `DistrictID` int(11) DEFAULT '0',
  `District` varchar(255) DEFAULT NULL,
  `PinCode` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile` varchar(255) DEFAULT NULL,
  `WebsiteName` varchar(255) DEFAULT NULL,
  `MapUrl` varchar(255) DEFAULT NULL,
  `PanCardNumber` varchar(255) DEFAULT NULL,
  `GSTIN` varchar(255) DEFAULT NULL,
  `StoreTypeID` int(11) DEFAULT NULL,
  `StoreTypeName` varchar(255) DEFAULT NULL,
  `ShopLogo` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `IsSuperSupportingCenter` int(11) DEFAULT '0',
  `ShortDescription` text,
  `InputCommission` int(11) DEFAULT NULL,
  `OutputCommission` int(11) DEFAULT NULL,
  `PurchaseAbove` int(11) DEFAULT NULL,
  PRIMARY KEY (`SupportingCenterAdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_business_supporting_center`
--

LOCK TABLES `_tbl_business_supporting_center` WRITE;
/*!40000 ALTER TABLE `_tbl_business_supporting_center` DISABLE KEYS */;
INSERT INTO `_tbl_business_supporting_center` VALUES (4,'Wintogether2','8073488190','stephen@wintogether2.com','password','Male','','','No 69 Pillana Garden 1st Stage 4th cross','','560084','2020-09-11 17:38:14','ZARAS ETHNIC WEAR','No 23, Hennur Main Road Lingarajpuram','No 23, Hennur Main Road Lingarajpuram','Bangalore','Opp SBI Bank ','India',2,'Karnataka',39,'Bengaluru Urban','560084','stephen@wintogether2.com','8073488190','','','','',3,'Gadgets','1600157803index.jpg',1,0,'',11,7,2000),(7,'Prince','7200009696','prince@gmail.com','123456','Male','','','# 1468/1 Sri Vinayaka Street ,Ramaswamy Palya,','kammanahali Main Road,','560033','2020-09-12 15:31:45','Prince Fashion Retail','# 1468/1 Sri Vinayaka Street ,Ramaswamy Palya,','kammanahali Main Road,',' Banalore','','India',2,'Karnataka',40,'Bengaluru Rural','560033','prince@gmail.com','7200009696, 8553902522','','','','',2,'Garments','',1,0,NULL,10,5,NULL);
/*!40000 ALTER TABLE `_tbl_business_supporting_center` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_direct_referal`
--

DROP TABLE IF EXISTS `_tbl_direct_referal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_direct_referal` (
  `DirectReferal` int(11) NOT NULL AUTO_INCREMENT,
  `TxnDate` date DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `ReferedMember` varchar(255) DEFAULT NULL,
  `PlanID` int(11) DEFAULT NULL,
  `Earning` varchar(255) DEFAULT NULL,
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`DirectReferal`)
) ENGINE=InnoDB AUTO_INCREMENT=422 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_direct_referal`
--

LOCK TABLES `_tbl_direct_referal` WRITE;
/*!40000 ALTER TABLE `_tbl_direct_referal` DISABLE KEYS */;
INSERT INTO `_tbl_direct_referal` VALUES (1,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 10:12:56'),(2,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 10:12:56'),(3,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 10:12:56'),(4,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 10:12:56'),(5,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 10:12:56'),(6,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 10:12:56'),(7,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 10:12:56'),(8,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 10:12:56'),(9,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 10:12:56'),(10,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 10:12:56'),(11,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 10:12:56'),(12,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 10:12:56'),(13,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 10:12:56'),(14,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 10:12:56'),(15,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 10:12:56'),(16,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 10:12:56'),(17,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 10:12:56'),(18,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 10:12:56'),(19,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 10:12:56'),(20,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 10:12:56'),(21,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 10:12:56'),(22,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 10:12:56'),(23,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 10:12:56'),(24,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 10:12:56'),(25,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 10:12:56'),(26,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 10:12:56'),(27,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 10:12:56'),(28,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 10:12:56'),(29,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 10:12:56'),(30,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 10:12:56'),(31,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 10:12:56'),(32,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 10:12:56'),(33,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 10:12:56'),(34,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 10:12:56'),(35,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 10:12:56'),(36,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 10:12:56'),(37,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 10:12:56'),(38,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 10:49:39'),(39,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 10:49:39'),(40,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 10:49:39'),(41,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 10:49:39'),(42,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 10:49:39'),(43,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 10:49:39'),(44,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 10:49:39'),(45,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 10:49:39'),(46,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 10:49:39'),(47,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 10:49:39'),(48,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 10:49:39'),(49,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 10:49:39'),(50,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 10:49:39'),(51,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 10:49:39'),(52,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 10:49:39'),(53,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 10:49:39'),(54,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 10:49:39'),(55,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 10:49:39'),(56,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 10:49:39'),(57,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 10:49:39'),(58,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 10:49:39'),(59,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 10:49:39'),(60,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 10:49:39'),(61,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 10:49:39'),(62,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 10:49:39'),(63,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 10:49:39'),(64,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 10:49:39'),(65,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 10:49:39'),(66,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 10:49:39'),(67,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 10:49:39'),(68,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 10:49:39'),(69,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 10:49:39'),(70,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 10:49:39'),(71,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 10:49:39'),(72,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 10:49:39'),(73,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 10:49:39'),(74,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 10:49:39'),(75,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 10:54:10'),(76,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 10:54:10'),(77,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 10:54:10'),(78,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 10:54:10'),(79,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 10:54:10'),(80,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 10:54:10'),(81,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 10:54:10'),(82,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 10:54:10'),(83,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 10:54:10'),(84,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 10:54:10'),(85,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 10:54:10'),(86,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 10:54:10'),(87,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 10:54:10'),(88,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 10:54:10'),(89,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 10:54:10'),(90,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 10:54:10'),(91,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 10:54:10'),(92,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 10:54:10'),(93,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 10:54:10'),(94,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 10:54:10'),(95,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 10:54:10'),(96,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 10:54:10'),(97,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 10:54:10'),(98,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 10:54:10'),(99,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 10:54:10'),(100,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 10:54:10'),(101,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 10:54:10'),(102,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 10:54:10'),(103,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 10:54:10'),(104,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 10:54:10'),(105,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 10:54:10'),(106,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 10:54:10'),(107,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 10:54:10'),(108,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 10:54:10'),(109,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 10:54:10'),(110,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 10:54:10'),(111,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 10:54:10'),(112,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 10:56:12'),(113,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 10:56:12'),(114,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 10:56:12'),(115,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 10:56:12'),(116,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 10:56:12'),(117,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 10:56:12'),(118,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 10:56:12'),(119,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 10:56:12'),(120,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 10:56:12'),(121,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 10:56:12'),(122,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 10:56:12'),(123,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 10:56:12'),(124,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 10:56:12'),(125,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 10:56:12'),(126,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 10:56:12'),(127,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 10:56:13'),(128,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 10:56:13'),(129,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 10:56:13'),(130,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 10:56:13'),(131,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 10:56:13'),(132,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 10:56:13'),(133,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 10:56:13'),(134,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 10:56:13'),(135,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 10:56:13'),(136,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 10:56:13'),(137,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 10:56:13'),(138,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 10:56:13'),(139,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 10:56:13'),(140,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 10:56:13'),(141,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 10:56:13'),(142,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 10:56:13'),(143,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 10:56:13'),(144,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 10:56:13'),(145,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 10:56:13'),(146,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 10:56:13'),(147,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 10:56:13'),(148,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 10:56:13'),(149,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 10:58:21'),(150,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 10:58:21'),(151,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 10:58:21'),(152,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 10:58:21'),(153,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 10:58:21'),(154,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 10:58:21'),(155,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 10:58:21'),(156,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 10:58:21'),(157,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 10:58:21'),(158,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 10:58:21'),(159,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 10:58:21'),(160,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 10:58:21'),(161,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 10:58:21'),(162,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 10:58:21'),(163,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 10:58:21'),(164,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 10:58:21'),(165,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 10:58:21'),(166,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 10:58:21'),(167,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 10:58:21'),(168,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 10:58:21'),(169,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 10:58:21'),(170,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 10:58:21'),(171,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 10:58:21'),(172,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 10:58:21'),(173,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 10:58:21'),(174,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 10:58:21'),(175,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 10:58:21'),(176,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 10:58:21'),(177,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 10:58:21'),(178,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 10:58:21'),(179,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 10:58:21'),(180,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 10:58:21'),(181,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 10:58:21'),(182,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 10:58:21'),(183,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 10:58:21'),(184,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 10:58:21'),(185,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 10:58:21'),(186,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 10:58:48'),(187,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 10:58:48'),(188,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 10:58:48'),(189,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 10:58:48'),(190,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 10:58:48'),(191,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 10:58:48'),(192,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 10:58:48'),(193,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 10:58:48'),(194,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 10:58:48'),(195,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 10:58:48'),(196,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 10:58:48'),(197,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 10:58:48'),(198,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 10:58:48'),(199,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 10:58:48'),(200,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 10:58:48'),(201,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 10:58:48'),(202,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 10:58:48'),(203,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 10:58:48'),(204,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 10:58:48'),(205,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 10:58:48'),(206,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 10:58:48'),(207,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 10:58:48'),(208,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 10:58:48'),(209,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 10:58:48'),(210,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 10:58:48'),(211,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 10:58:48'),(212,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 10:58:48'),(213,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 10:58:48'),(214,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 10:58:48'),(215,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 10:58:48'),(216,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 10:58:48'),(217,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 10:58:48'),(218,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 10:58:48'),(219,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 10:58:48'),(220,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 10:58:48'),(221,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 10:58:48'),(222,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 10:58:48'),(223,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 10:59:30'),(224,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 10:59:30'),(225,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 10:59:30'),(226,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 10:59:30'),(227,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 10:59:30'),(228,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 10:59:30'),(229,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 10:59:30'),(230,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 10:59:30'),(231,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 10:59:30'),(232,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 10:59:30'),(233,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 10:59:30'),(234,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 10:59:30'),(235,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 10:59:30'),(236,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 10:59:30'),(237,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 10:59:30'),(238,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 10:59:30'),(239,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 10:59:30'),(240,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 10:59:30'),(241,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 10:59:30'),(242,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 10:59:30'),(243,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 10:59:30'),(244,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 10:59:30'),(245,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 10:59:30'),(246,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 10:59:30'),(247,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 10:59:30'),(248,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 10:59:30'),(249,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 10:59:30'),(250,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 10:59:30'),(251,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 10:59:30'),(252,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 10:59:30'),(253,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 10:59:30'),(254,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 10:59:30'),(255,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 10:59:30'),(256,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 10:59:30'),(257,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 10:59:30'),(258,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 10:59:30'),(259,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 10:59:30'),(260,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 11:01:02'),(261,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 11:01:02'),(262,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 11:01:02'),(263,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 11:01:02'),(264,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 11:01:02'),(265,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 11:01:02'),(266,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 11:01:02'),(267,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 11:01:02'),(268,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 11:01:02'),(269,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 11:01:02'),(270,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 11:01:02'),(271,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 11:01:02'),(272,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 11:01:02'),(273,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 11:01:02'),(274,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 11:01:02'),(275,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 11:01:02'),(276,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 11:01:02'),(277,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 11:01:02'),(278,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 11:01:02'),(279,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 11:01:02'),(280,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 11:01:02'),(281,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 11:01:02'),(282,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 11:01:02'),(283,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 11:01:02'),(284,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 11:01:02'),(285,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 11:01:02'),(286,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 11:01:02'),(287,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 11:01:02'),(288,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 11:01:02'),(289,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 11:01:02'),(290,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 11:01:02'),(291,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 11:01:02'),(292,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 11:01:02'),(293,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 11:01:02'),(294,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 11:01:02'),(295,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 11:01:02'),(296,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 11:01:02'),(297,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 11:30:35'),(298,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 11:30:35'),(299,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 11:30:35'),(300,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 11:30:35'),(301,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 11:30:35'),(302,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 11:30:35'),(303,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 11:30:35'),(304,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 11:30:35'),(305,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 11:30:35'),(306,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 11:30:35'),(307,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 11:30:35'),(308,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 11:30:35'),(309,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 11:30:35'),(310,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 11:30:35'),(311,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 11:30:35'),(312,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 11:30:35'),(313,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 11:30:35'),(314,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 11:30:35'),(315,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 11:30:35'),(316,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 11:30:35'),(317,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 11:30:35'),(318,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 11:30:35'),(319,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 11:30:35'),(320,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 11:30:35'),(321,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 11:30:35'),(322,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 11:30:35'),(323,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 11:30:35'),(324,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 11:30:35'),(325,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 11:30:35'),(326,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 11:30:35'),(327,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 11:30:35'),(328,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 11:30:35'),(329,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 11:30:35'),(330,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 11:30:35'),(331,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 11:30:35'),(332,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 11:30:35'),(333,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 11:30:35'),(334,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 11:33:54'),(335,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 11:33:54'),(336,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 11:33:54'),(337,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 11:33:54'),(338,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 11:33:54'),(339,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 11:33:54'),(340,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 11:33:54'),(341,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 11:33:54'),(342,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 11:33:54'),(343,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 11:33:54'),(344,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 11:33:54'),(345,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 11:33:54'),(346,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 11:33:54'),(347,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 11:33:54'),(348,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 11:33:54'),(349,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 11:33:54'),(350,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 11:33:54'),(351,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 11:33:54'),(352,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 11:33:54'),(353,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 11:33:54'),(354,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 11:33:54'),(355,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 11:33:54'),(356,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 11:33:54'),(357,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 11:33:54'),(358,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 11:33:54'),(359,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 11:33:54'),(360,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 11:33:54'),(361,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 11:33:54'),(362,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 11:33:54'),(363,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 11:33:54'),(364,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 11:33:54'),(365,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 11:33:54'),(366,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 11:33:54'),(367,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 11:33:54'),(368,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 11:33:54'),(369,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 11:33:54'),(370,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 11:33:54'),(371,'2020-09-14','WT000001','WTSTE00002',1,'50','2020-09-15 11:35:40'),(372,'2020-09-14','WT000001','WTSTE00003',1,'50','2020-09-15 11:35:40'),(373,'2020-09-14','WTFAT00032','WTFAT00034',1,'50','2020-09-15 11:35:40'),(374,'2020-09-14','WTFAT00032','WTFAT00035',1,'50','2020-09-15 11:35:40'),(375,'2020-09-14','WTFAT00034','WTNOO00036',1,'50','2020-09-15 11:35:40'),(376,'2020-09-14','WTKEM00033','WTKEM00037',1,'50','2020-09-15 11:35:40'),(377,'2020-09-14','WTKEM00033','WTKEM00038',1,'50','2020-09-15 11:35:40'),(378,'2020-09-14','WTPRE00016','WTFAT00032',1,'50','2020-09-15 11:35:40'),(379,'2020-09-14','WTPRE00016','WTKEM00033',1,'50','2020-09-15 11:35:40'),(380,'2020-09-14','WTSHE00008','WTPRE00016',1,'50','2020-09-15 11:35:40'),(381,'2020-09-14','WTSHE00008','WTPRE00017',1,'50','2020-09-15 11:35:40'),(382,'2020-09-14','WTSHE00009','WTPRE00018',1,'50','2020-09-15 11:35:40'),(383,'2020-09-14','WTSHE00009','WTPRE00019',1,'50','2020-09-15 11:35:40'),(384,'2020-09-14','WTSHE00010','WTPRE00020',1,'50','2020-09-15 11:35:40'),(385,'2020-09-14','WTSHE00010','WTPRE00021',1,'50','2020-09-15 11:35:40'),(386,'2020-09-14','WTSHE00011','WTPRE00022',1,'50','2020-09-15 11:35:40'),(387,'2020-09-14','WTSHE00011','WTPRE00023',1,'50','2020-09-15 11:35:40'),(388,'2020-09-14','WTSHE00012','WTPRE00024',1,'50','2020-09-15 11:35:40'),(389,'2020-09-14','WTSHE00012','WTPRE00025',1,'50','2020-09-15 11:35:40'),(390,'2020-09-14','WTSHE00013','WTPRE00026',1,'50','2020-09-15 11:35:40'),(391,'2020-09-14','WTSHE00013','WTPRE00027',1,'50','2020-09-15 11:35:40'),(392,'2020-09-14','WTSHE00014','WTPRE00028',1,'50','2020-09-15 11:35:40'),(393,'2020-09-14','WTSHE00014','WTPRE00029',1,'50','2020-09-15 11:35:40'),(394,'2020-09-14','WTSHE00015','WTPRE00030',1,'50','2020-09-15 11:35:40'),(395,'2020-09-14','WTSHE00015','WTPRE00031',1,'50','2020-09-15 11:35:40'),(396,'2020-09-14','WTSTE00002','WTSTE00004',1,'50','2020-09-15 11:35:40'),(397,'2020-09-14','WTSTE00002','WTSTE00005',1,'50','2020-09-15 11:35:40'),(398,'2020-09-14','WTSTE00003','WTSTE00006',1,'50','2020-09-15 11:35:40'),(399,'2020-09-14','WTSTE00003','WTSTE00007',1,'50','2020-09-15 11:35:40'),(400,'2020-09-14','WTSTE00004','WTSHE00008',1,'50','2020-09-15 11:35:40'),(401,'2020-09-14','WTSTE00004','WTSHE00009',1,'50','2020-09-15 11:35:40'),(402,'2020-09-14','WTSTE00005','WTSHE00010',1,'50','2020-09-15 11:35:40'),(403,'2020-09-14','WTSTE00005','WTSHE00011',1,'50','2020-09-15 11:35:40'),(404,'2020-09-14','WTSTE00006','WTSHE00012',1,'50','2020-09-15 11:35:40'),(405,'2020-09-14','WTSTE00006','WTSHE00013',1,'50','2020-09-15 11:35:40'),(406,'2020-09-14','WTSTE00007','WTSHE00014',1,'50','2020-09-15 11:35:40'),(407,'2020-09-14','WTSTE00007','WTSHE00015',1,'50','2020-09-15 11:35:40'),(408,'2020-09-15','WTPRE00031','WTSEL00039',1,'50','2020-09-16 08:13:55'),(409,'2020-09-15','WTRAJ00042','WTEBI00043',1,'50','2020-09-16 08:13:55'),(410,'2020-09-15','WTRAJ00042','WTRAM00044',1,'50','2020-09-16 08:13:55'),(411,'2020-09-15','WTSEL00039','WTSEE00040',1,'50','2020-09-16 08:13:55'),(412,'2020-09-15','WTSEL00039','WTMUR00041',1,'50','2020-09-16 08:13:55'),(413,'2020-09-15','WTSTE00002','WTRAJ00042',1,'50','2020-09-16 08:13:55'),(414,'2020-09-15','WTPRE00031','WTSEL00039',1,'50','2020-09-16 23:30:02'),(415,'2020-09-15','WTRAJ00042','WTEBI00043',1,'50','2020-09-16 23:30:02'),(416,'2020-09-15','WTRAJ00042','WTRAM00044',1,'50','2020-09-16 23:30:02'),(417,'2020-09-15','WTSEL00039','WTSEE00040',1,'50','2020-09-16 23:30:02'),(418,'2020-09-15','WTSEL00039','WTMUR00041',1,'50','2020-09-16 23:30:02'),(419,'2020-09-15','WTSTE00002','WTRAJ00042',1,'50','2020-09-16 23:30:02'),(420,'2020-09-16','WTPRE00017','WTVAS00046',1,'50','2020-09-17 15:43:20'),(421,'2020-09-16','WTPRE00031','WTCAT00045',1,'50','2020-09-17 15:43:20');
/*!40000 ALTER TABLE `_tbl_direct_referal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_favorite_stores`
--

DROP TABLE IF EXISTS `_tbl_favorite_stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_favorite_stores` (
  `FavoriteID` int(11) NOT NULL AUTO_INCREMENT,
  `StoreID` int(11) DEFAULT '0',
  `MemberID` int(11) DEFAULT '0',
  `FavoriteOn` datetime DEFAULT NULL,
  PRIMARY KEY (`FavoriteID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_favorite_stores`
--

LOCK TABLES `_tbl_favorite_stores` WRITE;
/*!40000 ALTER TABLE `_tbl_favorite_stores` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_favorite_stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_logs_email`
--

DROP TABLE IF EXISTS `_tbl_logs_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_logs_email` (
  `EmailLogID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT '0',
  `FranchiseeID` int(11) DEFAULT '0',
  `AdminID` int(11) DEFAULT '0',
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
  PRIMARY KEY (`EmailLogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_logs_email`
--

LOCK TABLES `_tbl_logs_email` WRITE;
/*!40000 ALTER TABLE `_tbl_logs_email` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_logs_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_master_districtnames`
--

DROP TABLE IF EXISTS `_tbl_master_districtnames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_master_districtnames` (
  `DistrictNameID` int(11) NOT NULL AUTO_INCREMENT,
  `StateID` int(11) DEFAULT NULL,
  `DistrictName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`DistrictNameID`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_master_districtnames`
--

LOCK TABLES `_tbl_master_districtnames` WRITE;
/*!40000 ALTER TABLE `_tbl_master_districtnames` DISABLE KEYS */;
INSERT INTO `_tbl_master_districtnames` VALUES (1,1,'Chennai'),(2,1,'Cuddalore'),(3,1,'Kanchipuram'),(4,1,'Chengalpattu'),(5,1,'Tiruvallur'),(6,1,'Tiruvannamalai'),(7,1,'Vellore'),(8,1,'Viluppuram'),(9,1,'Kallakurichi'),(10,1,'Ranipet'),(11,1,'Thirupattur'),(12,1,'Ariyalur'),(13,1,'Karur'),(14,1,'Nagappattinam'),(15,1,'Perambalur'),(16,1,'Pudukkottai'),(17,1,'Thanjavur'),(18,1,'Tiruchirappalli'),(19,1,'Tiruvarur'),(20,1,'Dharmapuri'),(21,1,'Coimbatore'),(22,1,'Erode'),(23,1,'Krishnagiri'),(24,1,'Namakkal'),(25,1,'Nilgiris'),(26,1,'Salem'),(27,1,'Tiruppur'),(28,1,'Dindigul'),(29,1,'Kanyakumari'),(30,1,'Madurai'),(31,1,'Ramanathapuram'),(32,1,'Sivagangai'),(33,1,'Thoothukudi'),(34,1,'Theni'),(35,1,'Tirunelveli'),(36,1,'Virudhunagar'),(37,1,'Tenkasi'),(38,2,'Bagalkot'),(39,2,'Bengaluru Urban'),(40,2,'Bengaluru Rural'),(41,2,'Belagavi'),(42,2,'Bellary'),(43,2,'Bidar'),(44,2,'Vijayapura'),(45,2,'Chamarajanagar'),(46,2,'Chikballapur'),(47,2,'Chikkamagaluru'),(48,2,'Chitradurga'),(49,2,'Dakshina Kannada'),(50,2,'Davanagere'),(51,2,'Dharwad'),(52,2,'Gadag'),(53,2,'Kalaburagi'),(54,2,'Hassan'),(55,2,'Haveri'),(56,2,'Kodagu'),(57,2,'Kolar'),(58,2,'Koppal'),(59,2,'Mandya'),(60,2,'Mysuru'),(61,2,'Raichur'),(62,2,'Ramanagara'),(63,2,'Shivamogga'),(64,2,'Tumakuru'),(65,2,'Udupi'),(66,2,'Uttara Kannada'),(67,2,'Yadgir');
/*!40000 ALTER TABLE `_tbl_master_districtnames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_master_statenames`
--

DROP TABLE IF EXISTS `_tbl_master_statenames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_master_statenames` (
  `StateID` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`StateID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_master_statenames`
--

LOCK TABLES `_tbl_master_statenames` WRITE;
/*!40000 ALTER TABLE `_tbl_master_statenames` DISABLE KEYS */;
INSERT INTO `_tbl_master_statenames` VALUES (1,'Tamil Nadu'),(2,'Karnataka');
/*!40000 ALTER TABLE `_tbl_master_statenames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_member_bank_details`
--

DROP TABLE IF EXISTS `_tbl_member_bank_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_member_bank_details` (
  `BankID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`BankID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_member_bank_details`
--

LOCK TABLES `_tbl_member_bank_details` WRITE;
/*!40000 ALTER TABLE `_tbl_member_bank_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_member_bank_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_member_nominee_details`
--

DROP TABLE IF EXISTS `_tbl_member_nominee_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_member_nominee_details` (
  `NomineeID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `NomineeName` varchar(255) DEFAULT NULL,
  `NomineeGender` varchar(255) DEFAULT NULL,
  `NomineeRelation` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`NomineeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_member_nominee_details`
--

LOCK TABLES `_tbl_member_nominee_details` WRITE;
/*!40000 ALTER TABLE `_tbl_member_nominee_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_member_nominee_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_member_verify_log`
--

DROP TABLE IF EXISTS `_tbl_member_verify_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_member_verify_log` (
  `VerifyID` int(11) NOT NULL AUTO_INCREMENT,
  `VerifyByID` int(11) DEFAULT '0',
  `TypedMemberID` varchar(255) DEFAULT NULL,
  `VerifiedOn` datetime DEFAULT NULL,
  `IsValid` int(11) DEFAULT '0',
  PRIMARY KEY (`VerifyID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_member_verify_log`
--

LOCK TABLES `_tbl_member_verify_log` WRITE;
/*!40000 ALTER TABLE `_tbl_member_verify_log` DISABLE KEYS */;
INSERT INTO `_tbl_member_verify_log` VALUES (1,7,'WTPRE00016','2020-09-15 15:29:21',1);
/*!40000 ALTER TABLE `_tbl_member_verify_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_members_login_logs`
--

DROP TABLE IF EXISTS `_tbl_members_login_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_members_login_logs` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `LoginOn` datetime DEFAULT NULL,
  `IsSuccess` int(11) DEFAULT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_members_login_logs`
--

LOCK TABLES `_tbl_members_login_logs` WRITE;
/*!40000 ALTER TABLE `_tbl_members_login_logs` DISABLE KEYS */;
INSERT INTO `_tbl_members_login_logs` VALUES (1,1,'2020-09-14 13:55:11',1),(2,1,'2020-09-14 14:00:43',1),(3,1,'2020-09-14 14:12:38',1),(4,1,'2020-09-14 14:20:49',1),(5,185,'2020-09-14 14:28:57',1),(6,1,'2020-09-14 14:33:50',1),(7,186,'2020-09-14 14:36:26',1),(8,1,'2020-09-14 14:39:42',1),(9,189,'2020-09-14 14:40:31',1),(10,187,'2020-09-14 14:46:01',1),(11,188,'2020-09-14 15:10:30',1),(12,1,'2020-09-14 15:14:40',1),(13,189,'2020-09-14 15:15:43',1),(14,1,'2020-09-14 15:20:36',1),(15,190,'2020-09-14 15:30:39',1),(16,191,'2020-09-14 15:51:10',1),(17,192,'2020-09-14 15:53:52',1),(18,193,'2020-09-14 16:03:09',1),(19,194,'2020-09-14 16:05:32',1),(20,195,'2020-09-14 16:07:52',1),(21,196,'2020-09-14 16:11:23',1),(22,197,'2020-09-14 16:14:03',1),(23,1,'2020-09-14 16:15:42',1),(24,198,'2020-09-14 16:16:05',1),(25,1,'2020-09-14 16:18:05',1),(26,1,'2020-09-14 16:22:52',1),(27,1,'2020-09-14 16:35:56',1),(28,199,'2020-09-14 16:45:19',1),(29,199,'2020-09-14 16:52:16',1),(30,199,'2020-09-14 16:56:09',0),(31,199,'2020-09-14 16:56:24',1),(32,199,'2020-09-14 17:00:05',1),(33,186,'2020-09-14 17:14:03',1),(34,215,'2020-09-14 17:17:37',1),(35,217,'2020-09-14 17:26:50',1),(36,216,'2020-09-14 17:49:47',1),(37,1,'2020-09-14 18:09:00',1),(38,215,'2020-09-14 18:12:56',1),(39,215,'2020-09-14 18:27:15',1),(40,215,'2020-09-14 18:28:41',1),(41,215,'2020-09-14 18:45:44',1),(42,215,'2020-09-14 18:50:32',1),(43,215,'2020-09-14 18:52:13',1),(44,217,'2020-09-14 18:55:31',1),(45,215,'2020-09-14 20:25:10',1),(46,185,'2020-09-15 07:57:55',1),(47,1,'2020-09-15 10:10:56',1),(48,199,'2020-09-15 10:29:20',1),(49,1,'2020-09-15 11:10:10',1),(50,1,'2020-09-15 11:15:33',1),(51,1,'2020-09-15 11:16:58',1),(52,1,'2020-09-15 11:22:34',1),(53,1,'2020-09-15 13:50:00',1),(54,1,'2020-09-15 13:53:05',1),(55,215,'2020-09-15 13:59:28',1),(56,1,'2020-09-15 14:23:20',1),(57,199,'2020-09-15 14:32:05',1),(58,1,'2020-09-15 14:33:14',1),(59,1,'2020-09-15 14:33:31',1),(60,1,'2020-09-15 14:50:41',1),(61,1,'2020-09-15 14:55:03',1),(62,1,'2020-09-15 15:09:15',1),(63,199,'2020-09-15 15:16:47',1),(64,199,'2020-09-15 15:17:43',1),(65,1,'2020-09-15 15:22:32',1),(66,1,'2020-09-15 15:28:03',1),(67,1,'2020-09-15 15:39:56',1),(68,1,'2020-09-15 15:43:37',1),(69,214,'2020-09-15 17:43:15',1),(70,214,'2020-09-15 17:43:46',1),(71,214,'2020-09-15 17:44:15',1),(72,1,'2020-09-15 17:45:53',1),(73,214,'2020-09-15 17:49:14',1),(74,199,'2020-09-15 17:50:04',1),(75,214,'2020-09-15 18:16:22',1),(76,222,'2020-09-15 18:22:02',1),(77,214,'2020-09-15 18:28:42',1),(78,185,'2020-09-15 18:34:42',1),(79,185,'2020-09-15 18:39:06',0),(80,185,'2020-09-15 18:39:16',0),(81,216,'2020-09-15 18:39:31',1),(82,185,'2020-09-15 18:40:27',1),(83,225,'2020-09-15 18:42:11',1),(84,214,'2020-09-15 19:33:15',1),(85,1,'2020-09-16 08:27:08',1),(86,215,'2020-09-16 10:31:47',1),(87,1,'2020-09-16 10:32:34',1),(88,1,'2020-09-16 10:34:07',0),(89,185,'2020-09-16 10:34:12',1),(90,216,'2020-09-16 10:58:09',1),(91,185,'2020-09-16 11:06:18',1),(92,185,'2020-09-16 11:08:57',1),(93,214,'2020-09-16 11:32:06',1),(94,214,'2020-09-16 11:38:24',1),(95,220,'2020-09-16 11:44:47',1),(96,216,'2020-09-16 12:18:22',1),(97,200,'2020-09-16 12:21:10',1),(98,215,'2020-09-16 12:52:02',1),(99,215,'2020-09-16 12:55:02',1),(100,215,'2020-09-16 12:55:50',1),(101,1,'2020-09-16 17:50:43',1),(102,185,'2020-09-16 18:16:04',1),(103,185,'2020-09-17 11:32:05',1),(104,1,'2020-09-17 12:13:03',1),(105,1,'2020-09-17 12:20:58',1),(106,185,'2020-09-17 12:21:29',1),(107,1,'2020-09-17 13:45:42',1),(108,1,'2020-09-17 15:31:28',1),(109,185,'2020-09-17 15:49:35',1),(110,1,'2020-09-17 18:05:05',1),(111,1,'2020-09-17 18:27:03',1),(112,185,'2020-09-18 13:55:55',1);
/*!40000 ALTER TABLE `_tbl_members_login_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_payout_log`
--

DROP TABLE IF EXISTS `_tbl_payout_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_payout_log` (
  `PayoutLogID` int(11) NOT NULL AUTO_INCREMENT,
  `PayoutDate` date DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `EndedOn` datetime DEFAULT NULL,
  `FileName` varchar(255) DEFAULT NULL,
  `CompanyCollectedPV` varchar(255) DEFAULT NULL,
  `TotalPayoutAmount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PayoutLogID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_payout_log`
--

LOCK TABLES `_tbl_payout_log` WRITE;
/*!40000 ALTER TABLE `_tbl_payout_log` DISABLE KEYS */;
INSERT INTO `_tbl_payout_log` VALUES (1,'2020-09-14','2020-09-15 11:35:40','2020-09-15 11:35:40','temp_payout_2020_09_15_11_35_40.txt','0','0'),(2,'2020-09-15','2020-09-16 08:13:55','2020-09-16 08:13:55','temp_payout_2020_09_16_08_13_55.txt','0','0'),(4,'2020-09-16','2020-09-17 15:43:20','2020-09-17 15:43:20','temp_payout_2020_09_17_15_43_20.txt','0','0'),(5,'2020-09-17','2020-09-17 23:30:01','2020-09-17 23:30:02','temp_payout_2020_09_17_23_30_01.txt','0','0'),(6,'2020-09-18','2020-09-18 23:30:01','2020-09-18 23:30:02','temp_payout_2020_09_18_23_30_01.txt','0','0');
/*!40000 ALTER TABLE `_tbl_payout_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_payout_request_earnings`
--

DROP TABLE IF EXISTS `_tbl_payout_request_earnings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_payout_request_earnings` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `AccountName` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `RequestedOn` datetime DEFAULT NULL,
  `Admin_TxnID` varchar(255) DEFAULT NULL,
  `Admin_FromBank` varchar(255) DEFAULT NULL,
  `Admin_AccountNumber` varchar(255) DEFAULT NULL,
  `Admin_IFSCode` varchar(255) DEFAULT NULL,
  `Admin_TxnDate` datetime DEFAULT NULL,
  `Admin_TxnMode` varchar(255) DEFAULT NULL,
  `IsApproved` int(11) DEFAULT '0',
  `IsApprovedOn` datetime DEFAULT NULL,
  `WalletTransactionID` int(11) DEFAULT '0',
  `IsRejected` int(11) DEFAULT '0',
  `IsRejectedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`RequestID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_payout_request_earnings`
--

LOCK TABLES `_tbl_payout_request_earnings` WRITE;
/*!40000 ALTER TABLE `_tbl_payout_request_earnings` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_payout_request_earnings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_payoutsummary`
--

DROP TABLE IF EXISTS `_tbl_payoutsummary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_payoutsummary` (
  `PayoutID` int(11) NOT NULL AUTO_INCREMENT,
  `PayoutProcessDate` datetime DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `TotalLeft` varchar(11) DEFAULT NULL,
  `TodayLeft` varchar(11) DEFAULT NULL,
  `TotalRight` varchar(11) DEFAULT NULL,
  `TodayRight` varchar(11) DEFAULT NULL,
  `DebitLeft` varchar(11) DEFAULT NULL,
  `DebitRight` varchar(11) DEFAULT NULL,
  `AvailableLeft` varchar(11) DEFAULT NULL,
  `AvailableRight` varchar(11) DEFAULT NULL,
  `TodayPayoutPV` varchar(11) DEFAULT NULL,
  `RemainingLeft` varchar(11) DEFAULT NULL,
  `RemainingRight` varchar(11) DEFAULT NULL,
  `PackageName` varchar(255) DEFAULT NULL,
  `PackageID` varchar(11) DEFAULT NULL,
  `EligibleMinimumPayoutPV` varchar(11) DEFAULT NULL,
  `EligibleMaximumPayoutPV` varchar(11) DEFAULT NULL,
  `PayablePV` varchar(11) DEFAULT NULL,
  `PayableAmount` varchar(11) DEFAULT NULL,
  `Charges` varchar(255) DEFAULT NULL,
  `ChargeAmount` varchar(255) DEFAULT NULL,
  `PayableAmountDebitCharge` varchar(255) DEFAULT NULL,
  `CompanyLeft` varchar(11) DEFAULT NULL,
  `CompanyRight` varchar(11) DEFAULT NULL,
  `processedon` datetime DEFAULT NULL,
  `IsPayoutEligible` int(11) DEFAULT '0',
  PRIMARY KEY (`PayoutID`)
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_payoutsummary`
--

LOCK TABLES `_tbl_payoutsummary` WRITE;
/*!40000 ALTER TABLE `_tbl_payoutsummary` DISABLE KEYS */;
INSERT INTO `_tbl_payoutsummary` VALUES (1,'2020-09-14 00:00:00',1,'WT000001','1100','1100','750','750','750','750','1100','750','700','350','0','WTBasic','1',NULL,'1000','700','700','20%','140','560','0','0','2020-09-15 11:35:40',1),(2,'2020-09-14 00:00:00',185,'WTSTE00002','700','700','350','350','350','350','700','350','300','350','0','WTBasic','1',NULL,'1000','300','300','20%','60','240','0','0','2020-09-15 11:35:40',1),(3,'2020-09-14 00:00:00',186,'WTSTE00003','350','350','350','350','350','350','350','350','300','0','0','WTBasic','1',NULL,'1000','300','300','20%','60','240','0','0','2020-09-15 11:35:40',1),(4,'2020-09-14 00:00:00',187,'WTSTE00004','500','500','150','150','150','150','500','150','100','350','0','WTBasic','1',NULL,'1000','100','100','20%','20','80','0','0','2020-09-15 11:35:40',1),(5,'2020-09-14 00:00:00',188,'WTSTE00005','150','150','150','150','150','150','150','150','100','0','0','WTBasic','1',NULL,'1000','100','100','20%','20','80','0','0','2020-09-15 11:35:40',1),(6,'2020-09-14 00:00:00',189,'WTSTE00006','150','150','150','150','150','150','150','150','100','0','0','WTBasic','1',NULL,'1000','100','100','20%','20','80','0','0','2020-09-15 11:35:40',1),(7,'2020-09-14 00:00:00',190,'WTSTE00007','150','150','150','150','150','150','150','150','100','0','0','WTBasic','1',NULL,'1000','100','100','20%','20','80','0','0','2020-09-15 11:35:40',1),(8,'2020-09-14 00:00:00',191,'WTSHE00008','400','400','50','50','50','50','400','50','0','350','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(9,'2020-09-14 00:00:00',192,'WTSHE00009','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(10,'2020-09-14 00:00:00',193,'WTSHE00010','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(11,'2020-09-14 00:00:00',194,'WTSHE00011','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(12,'2020-09-14 00:00:00',195,'WTSHE00012','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(13,'2020-09-14 00:00:00',196,'WTSHE00013','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(14,'2020-09-14 00:00:00',197,'WTSHE00014','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(15,'2020-09-14 00:00:00',198,'WTSHE00015','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(16,'2020-09-14 00:00:00',199,'WTPRE00016','200','200','150','150','150','150','200','150','100','50','0','WTBasic','1',NULL,'1000','100','100','20%','20','80','0','0','2020-09-15 11:35:40',1),(17,'2020-09-14 00:00:00',200,'WTPRE00017','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(18,'2020-09-14 00:00:00',201,'WTPRE00018','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(19,'2020-09-14 00:00:00',202,'WTPRE00019','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(20,'2020-09-14 00:00:00',203,'WTPRE00020','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(21,'2020-09-14 00:00:00',204,'WTPRE00021','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(22,'2020-09-14 00:00:00',205,'WTPRE00022','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(23,'2020-09-14 00:00:00',206,'WTPRE00023','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(24,'2020-09-14 00:00:00',207,'WTPRE00024','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(25,'2020-09-14 00:00:00',208,'WTPRE00025','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(26,'2020-09-14 00:00:00',209,'WTPRE00026','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(27,'2020-09-14 00:00:00',210,'WTPRE00027','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(28,'2020-09-14 00:00:00',211,'WTPRE00028','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(29,'2020-09-14 00:00:00',212,'WTPRE00029','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(30,'2020-09-14 00:00:00',213,'WTPRE00030','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(31,'2020-09-14 00:00:00',214,'WTPRE00031','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(32,'2020-09-14 00:00:00',215,'WTFAT00032','100','100','50','50','50','50','100','50','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(33,'2020-09-14 00:00:00',216,'WTKEM00033','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',1),(34,'2020-09-14 00:00:00',217,'WTFAT00034','50','50','0','0','0','0','50','0','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(35,'2020-09-14 00:00:00',218,'WTFAT00035','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(36,'2020-09-14 00:00:00',219,'WTNOO00036','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(37,'2020-09-14 00:00:00',220,'WTKEM00037','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(38,'2020-09-14 00:00:00',221,'WTKEM00038','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-15 11:35:40',0),(39,'2020-09-15 00:00:00',1,'WT000001','1250','150','900','150','150','150','500','150','150','350','0','WTBasic','1',NULL,'1000','150','150','20%','30','120','0','0','2020-09-16 08:13:55',1),(40,'2020-09-15 00:00:00',185,'WTSTE00002','850','150','350','0','0','0','850','0','0','850','350','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(41,'2020-09-15 00:00:00',186,'WTSTE00003','350','0','500','150','0','0','350','0','0','350','500','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(42,'2020-09-15 00:00:00',187,'WTSTE00004','650','150','150','0','0','0','650','0','0','650','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(43,'2020-09-15 00:00:00',188,'WTSTE00005','150','0','150','0','0','0','150','0','0','150','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(44,'2020-09-15 00:00:00',189,'WTSTE00006','150','0','150','0','0','0','150','0','0','150','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(45,'2020-09-15 00:00:00',190,'WTSTE00007','150','0','300','150','0','0','150','0','0','150','300','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(46,'2020-09-15 00:00:00',191,'WTSHE00008','550','150','50','0','0','0','550','0','0','550','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(47,'2020-09-15 00:00:00',192,'WTSHE00009','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(48,'2020-09-15 00:00:00',193,'WTSHE00010','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(49,'2020-09-15 00:00:00',194,'WTSHE00011','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(50,'2020-09-15 00:00:00',195,'WTSHE00012','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(51,'2020-09-15 00:00:00',196,'WTSHE00013','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(52,'2020-09-15 00:00:00',197,'WTSHE00014','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(53,'2020-09-15 00:00:00',198,'WTSHE00015','50','0','200','150','0','0','50','0','0','50','200','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(54,'2020-09-15 00:00:00',199,'WTPRE00016','200','0','300','150','50','50','50','150','50','0','100','WTBasic','1',NULL,'1000','50','50','20%','10','40','0','0','2020-09-16 08:13:55',1),(55,'2020-09-15 00:00:00',200,'WTPRE00017','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(56,'2020-09-15 00:00:00',201,'WTPRE00018','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(57,'2020-09-15 00:00:00',202,'WTPRE00019','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(58,'2020-09-15 00:00:00',203,'WTPRE00020','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(59,'2020-09-15 00:00:00',204,'WTPRE00021','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(60,'2020-09-15 00:00:00',205,'WTPRE00022','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(61,'2020-09-15 00:00:00',206,'WTPRE00023','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(62,'2020-09-15 00:00:00',207,'WTPRE00024','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(63,'2020-09-15 00:00:00',208,'WTPRE00025','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(64,'2020-09-15 00:00:00',209,'WTPRE00026','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(65,'2020-09-15 00:00:00',210,'WTPRE00027','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(66,'2020-09-15 00:00:00',211,'WTPRE00028','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(67,'2020-09-15 00:00:00',212,'WTPRE00029','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(68,'2020-09-15 00:00:00',213,'WTPRE00030','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(69,'2020-09-15 00:00:00',214,'WTPRE00031','0','0','150','150','0','0','0','150','0','0','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(70,'2020-09-15 00:00:00',215,'WTFAT00032','100','0','50','0','0','0','100','0','0','100','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(71,'2020-09-15 00:00:00',216,'WTKEM00033','200','150','50','0','0','0','200','0','0','200','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(72,'2020-09-15 00:00:00',217,'WTFAT00034','50','0','0','0','0','0','50','0','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(73,'2020-09-15 00:00:00',218,'WTFAT00035','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(74,'2020-09-15 00:00:00',219,'WTNOO00036','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(75,'2020-09-15 00:00:00',220,'WTKEM00037','150','150','0','0','0','0','150','0','0','150','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(76,'2020-09-15 00:00:00',221,'WTKEM00038','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(77,'2020-09-15 00:00:00',222,'WTSEL00039','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(78,'2020-09-15 00:00:00',223,'WTSEE00040','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(79,'2020-09-15 00:00:00',224,'WTMUR00041','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(80,'2020-09-15 00:00:00',225,'WTRAJ00042','50','50','50','50','50','50','50','50','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',1),(81,'2020-09-15 00:00:00',226,'WTEBI00043','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(82,'2020-09-15 00:00:00',227,'WTRAM00044','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-16 08:13:55',0),(127,'2020-09-16 00:00:00',1,'WT000001','1300','50','950','50','50','50','400','50','50','350','0','WTBasic','1',NULL,'1000','50','50','20%','10','40','0','0','2020-09-17 15:43:20',1),(128,'2020-09-16 00:00:00',185,'WTSTE00002','900','50','350','0','0','0','900','0','0','900','350','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(129,'2020-09-16 00:00:00',186,'WTSTE00003','350','0','550','50','0','0','350','0','0','350','550','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(130,'2020-09-16 00:00:00',187,'WTSTE00004','700','50','150','0','0','0','700','0','0','700','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(131,'2020-09-16 00:00:00',188,'WTSTE00005','150','0','150','0','0','0','150','0','0','150','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(132,'2020-09-16 00:00:00',189,'WTSTE00006','150','0','150','0','0','0','150','0','0','150','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(133,'2020-09-16 00:00:00',190,'WTSTE00007','150','0','350','50','0','0','150','0','0','150','350','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(134,'2020-09-16 00:00:00',191,'WTSHE00008','550','0','100','50','50','50','500','50','50','450','0','WTBasic','1',NULL,'1000','50','50','20%','10','40','0','0','2020-09-17 15:43:20',1),(135,'2020-09-16 00:00:00',192,'WTSHE00009','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(136,'2020-09-16 00:00:00',193,'WTSHE00010','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(137,'2020-09-16 00:00:00',194,'WTSHE00011','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(138,'2020-09-16 00:00:00',195,'WTSHE00012','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(139,'2020-09-16 00:00:00',196,'WTSHE00013','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(140,'2020-09-16 00:00:00',197,'WTSHE00014','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(141,'2020-09-16 00:00:00',198,'WTSHE00015','50','0','250','50','0','0','50','0','0','50','250','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(142,'2020-09-16 00:00:00',199,'WTPRE00016','200','0','300','0','0','0','200','0','0','200','300','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(143,'2020-09-16 00:00:00',200,'WTPRE00017','50','50','0','0','0','0','50','0','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(144,'2020-09-16 00:00:00',201,'WTPRE00018','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(145,'2020-09-16 00:00:00',202,'WTPRE00019','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(146,'2020-09-16 00:00:00',203,'WTPRE00020','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(147,'2020-09-16 00:00:00',204,'WTPRE00021','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(148,'2020-09-16 00:00:00',205,'WTPRE00022','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(149,'2020-09-16 00:00:00',206,'WTPRE00023','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(150,'2020-09-16 00:00:00',207,'WTPRE00024','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(151,'2020-09-16 00:00:00',208,'WTPRE00025','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(152,'2020-09-16 00:00:00',209,'WTPRE00026','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(153,'2020-09-16 00:00:00',210,'WTPRE00027','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(154,'2020-09-16 00:00:00',211,'WTPRE00028','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(155,'2020-09-16 00:00:00',212,'WTPRE00029','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(156,'2020-09-16 00:00:00',213,'WTPRE00030','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(157,'2020-09-16 00:00:00',214,'WTPRE00031','50','50','150','0','50','50','50','150','0','0','100','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(158,'2020-09-16 00:00:00',215,'WTFAT00032','100','0','50','0','0','0','100','0','0','100','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(159,'2020-09-16 00:00:00',216,'WTKEM00033','200','0','50','0','0','0','200','0','0','200','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(160,'2020-09-16 00:00:00',217,'WTFAT00034','50','0','0','0','0','0','50','0','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(161,'2020-09-16 00:00:00',218,'WTFAT00035','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(162,'2020-09-16 00:00:00',219,'WTNOO00036','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(163,'2020-09-16 00:00:00',220,'WTKEM00037','150','0','0','0','0','0','150','0','0','150','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(164,'2020-09-16 00:00:00',221,'WTKEM00038','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(165,'2020-09-16 00:00:00',222,'WTSEL00039','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(166,'2020-09-16 00:00:00',223,'WTSEE00040','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(167,'2020-09-16 00:00:00',224,'WTMUR00041','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(168,'2020-09-16 00:00:00',225,'WTRAJ00042','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',1),(169,'2020-09-16 00:00:00',226,'WTEBI00043','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(170,'2020-09-16 00:00:00',227,'WTRAM00044','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(171,'2020-09-16 00:00:00',228,'WTCAT00045','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(172,'2020-09-16 00:00:00',229,'WTVAS00046','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 15:43:20',0),(173,'2020-09-17 00:00:00',1,'WT000001','1300','0','950','0','0','0','1300','0','0','1300','950','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(174,'2020-09-17 00:00:00',185,'WTSTE00002','900','0','350','0','0','0','900','0','0','900','350','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(175,'2020-09-17 00:00:00',186,'WTSTE00003','350','0','550','0','0','0','350','0','0','350','550','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(176,'2020-09-17 00:00:00',187,'WTSTE00004','700','0','150','0','0','0','700','0','0','700','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(177,'2020-09-17 00:00:00',188,'WTSTE00005','150','0','150','0','0','0','150','0','0','150','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(178,'2020-09-17 00:00:00',189,'WTSTE00006','150','0','150','0','0','0','150','0','0','150','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(179,'2020-09-17 00:00:00',190,'WTSTE00007','150','0','350','0','0','0','150','0','0','150','350','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(180,'2020-09-17 00:00:00',191,'WTSHE00008','550','0','100','0','0','0','550','0','0','550','100','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(181,'2020-09-17 00:00:00',192,'WTSHE00009','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(182,'2020-09-17 00:00:00',193,'WTSHE00010','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(183,'2020-09-17 00:00:00',194,'WTSHE00011','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(184,'2020-09-17 00:00:00',195,'WTSHE00012','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(185,'2020-09-17 00:00:00',196,'WTSHE00013','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(186,'2020-09-17 00:00:00',197,'WTSHE00014','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(187,'2020-09-17 00:00:00',198,'WTSHE00015','50','0','250','0','0','0','50','0','0','50','250','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(188,'2020-09-17 00:00:00',199,'WTPRE00016','200','0','300','0','0','0','200','0','0','200','300','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(189,'2020-09-17 00:00:00',200,'WTPRE00017','50','0','0','0','0','0','50','0','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(190,'2020-09-17 00:00:00',201,'WTPRE00018','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(191,'2020-09-17 00:00:00',202,'WTPRE00019','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(192,'2020-09-17 00:00:00',203,'WTPRE00020','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(193,'2020-09-17 00:00:00',204,'WTPRE00021','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(194,'2020-09-17 00:00:00',205,'WTPRE00022','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(195,'2020-09-17 00:00:00',206,'WTPRE00023','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(196,'2020-09-17 00:00:00',207,'WTPRE00024','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(197,'2020-09-17 00:00:00',208,'WTPRE00025','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(198,'2020-09-17 00:00:00',209,'WTPRE00026','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(199,'2020-09-17 00:00:00',210,'WTPRE00027','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(200,'2020-09-17 00:00:00',211,'WTPRE00028','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(201,'2020-09-17 00:00:00',212,'WTPRE00029','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(202,'2020-09-17 00:00:00',213,'WTPRE00030','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(203,'2020-09-17 00:00:00',214,'WTPRE00031','50','0','150','0','0','0','50','0','0','50','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(204,'2020-09-17 00:00:00',215,'WTFAT00032','100','0','50','0','0','0','100','0','0','100','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(205,'2020-09-17 00:00:00',216,'WTKEM00033','200','0','50','0','0','0','200','0','0','200','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(206,'2020-09-17 00:00:00',217,'WTFAT00034','50','0','0','0','0','0','50','0','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(207,'2020-09-17 00:00:00',218,'WTFAT00035','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(208,'2020-09-17 00:00:00',219,'WTNOO00036','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(209,'2020-09-17 00:00:00',220,'WTKEM00037','150','0','0','0','0','0','150','0','0','150','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(210,'2020-09-17 00:00:00',221,'WTKEM00038','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(211,'2020-09-17 00:00:00',222,'WTSEL00039','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(212,'2020-09-17 00:00:00',223,'WTSEE00040','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(213,'2020-09-17 00:00:00',224,'WTMUR00041','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(214,'2020-09-17 00:00:00',225,'WTRAJ00042','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',1),(215,'2020-09-17 00:00:00',226,'WTEBI00043','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(216,'2020-09-17 00:00:00',227,'WTRAM00044','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(217,'2020-09-17 00:00:00',228,'WTCAT00045','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(218,'2020-09-17 00:00:00',229,'WTVAS00046','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-17 23:30:02',0),(219,'2020-09-18 00:00:00',1,'WT000001','1300','0','950','0','0','0','1300','0','0','1300','950','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(220,'2020-09-18 00:00:00',185,'WTSTE00002','900','0','350','0','0','0','900','0','0','900','350','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(221,'2020-09-18 00:00:00',186,'WTSTE00003','350','0','550','0','0','0','350','0','0','350','550','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(222,'2020-09-18 00:00:00',187,'WTSTE00004','700','0','150','0','0','0','700','0','0','700','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(223,'2020-09-18 00:00:00',188,'WTSTE00005','150','0','150','0','0','0','150','0','0','150','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(224,'2020-09-18 00:00:00',189,'WTSTE00006','150','0','150','0','0','0','150','0','0','150','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(225,'2020-09-18 00:00:00',190,'WTSTE00007','150','0','350','0','0','0','150','0','0','150','350','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(226,'2020-09-18 00:00:00',191,'WTSHE00008','550','0','100','0','0','0','550','0','0','550','100','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(227,'2020-09-18 00:00:00',192,'WTSHE00009','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(228,'2020-09-18 00:00:00',193,'WTSHE00010','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(229,'2020-09-18 00:00:00',194,'WTSHE00011','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(230,'2020-09-18 00:00:00',195,'WTSHE00012','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(231,'2020-09-18 00:00:00',196,'WTSHE00013','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:01',1),(232,'2020-09-18 00:00:00',197,'WTSHE00014','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',1),(233,'2020-09-18 00:00:00',198,'WTSHE00015','50','0','250','0','0','0','50','0','0','50','250','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',1),(234,'2020-09-18 00:00:00',199,'WTPRE00016','200','0','300','0','0','0','200','0','0','200','300','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',1),(235,'2020-09-18 00:00:00',200,'WTPRE00017','50','0','0','0','0','0','50','0','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(236,'2020-09-18 00:00:00',201,'WTPRE00018','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(237,'2020-09-18 00:00:00',202,'WTPRE00019','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(238,'2020-09-18 00:00:00',203,'WTPRE00020','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(239,'2020-09-18 00:00:00',204,'WTPRE00021','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(240,'2020-09-18 00:00:00',205,'WTPRE00022','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(241,'2020-09-18 00:00:00',206,'WTPRE00023','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(242,'2020-09-18 00:00:00',207,'WTPRE00024','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(243,'2020-09-18 00:00:00',208,'WTPRE00025','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(244,'2020-09-18 00:00:00',209,'WTPRE00026','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(245,'2020-09-18 00:00:00',210,'WTPRE00027','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(246,'2020-09-18 00:00:00',211,'WTPRE00028','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(247,'2020-09-18 00:00:00',212,'WTPRE00029','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(248,'2020-09-18 00:00:00',213,'WTPRE00030','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(249,'2020-09-18 00:00:00',214,'WTPRE00031','50','0','150','0','0','0','50','0','0','50','150','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',1),(250,'2020-09-18 00:00:00',215,'WTFAT00032','100','0','50','0','0','0','100','0','0','100','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',1),(251,'2020-09-18 00:00:00',216,'WTKEM00033','200','0','50','0','0','0','200','0','0','200','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',1),(252,'2020-09-18 00:00:00',217,'WTFAT00034','50','0','0','0','0','0','50','0','0','50','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(253,'2020-09-18 00:00:00',218,'WTFAT00035','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(254,'2020-09-18 00:00:00',219,'WTNOO00036','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(255,'2020-09-18 00:00:00',220,'WTKEM00037','150','0','0','0','0','0','150','0','0','150','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(256,'2020-09-18 00:00:00',221,'WTKEM00038','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(257,'2020-09-18 00:00:00',222,'WTSEL00039','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',1),(258,'2020-09-18 00:00:00',223,'WTSEE00040','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(259,'2020-09-18 00:00:00',224,'WTMUR00041','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(260,'2020-09-18 00:00:00',225,'WTRAJ00042','50','0','50','0','0','0','50','0','0','50','50','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',1),(261,'2020-09-18 00:00:00',226,'WTEBI00043','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(262,'2020-09-18 00:00:00',227,'WTRAM00044','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(263,'2020-09-18 00:00:00',228,'WTCAT00045','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0),(264,'2020-09-18 00:00:00',229,'WTVAS00046','0','0','0','0','0','0','0','0','0','0','0','WTBasic','1',NULL,'1000','0','0','20%','0','0','0','0','2020-09-18 23:30:02',0);
/*!40000 ALTER TABLE `_tbl_payoutsummary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_requests`
--

DROP TABLE IF EXISTS `_tbl_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_requests` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `ReqType` varchar(255) DEFAULT NULL,
  `ReqOn` datetime DEFAULT NULL,
  `Param` text,
  `MemberID` int(11) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL,
  PRIMARY KEY (`RequestID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_requests`
--

LOCK TABLES `_tbl_requests` WRITE;
/*!40000 ALTER TABLE `_tbl_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_shopping_categories`
--

DROP TABLE IF EXISTS `_tbl_shopping_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_shopping_categories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryCode` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `CategoryImage` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `IsActive` int(1) DEFAULT '1',
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_shopping_categories`
--

LOCK TABLES `_tbl_shopping_categories` WRITE;
/*!40000 ALTER TABLE `_tbl_shopping_categories` DISABLE KEYS */;
INSERT INTO `_tbl_shopping_categories` VALUES (1,'C0001','FASHION','1581924377img_20200217_125428.jpg','FASHION',1,'2020-02-17 12:56:17');
/*!40000 ALTER TABLE `_tbl_shopping_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_shopping_products`
--

DROP TABLE IF EXISTS `_tbl_shopping_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_shopping_products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) DEFAULT NULL,
  `CategoryCode` varchar(255) DEFAULT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  `SubCategoryCode` varchar(255) DEFAULT NULL,
  `ProductCode` varchar(255) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductShortDesc` varchar(255) DEFAULT NULL,
  `ProductLongDesc` varchar(255) DEFAULT NULL,
  `ProductImage` varchar(255) DEFAULT NULL,
  `ProductMRP` varchar(255) DEFAULT NULL,
  `ProductPrice` varchar(255) DEFAULT NULL,
  `ProductBV` varchar(255) DEFAULT NULL,
  `IsActive` varchar(255) DEFAULT NULL,
  `AddedOn` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_shopping_products`
--

LOCK TABLES `_tbl_shopping_products` WRITE;
/*!40000 ALTER TABLE `_tbl_shopping_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_shopping_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_shopping_subcategories`
--

DROP TABLE IF EXISTS `_tbl_shopping_subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_shopping_subcategories` (
  `SubCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryCode` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `SubCategoryCode` varchar(255) DEFAULT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  `SubCategoryImage` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `IsActive` int(1) DEFAULT '1',
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`SubCategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_shopping_subcategories`
--

LOCK TABLES `_tbl_shopping_subcategories` WRITE;
/*!40000 ALTER TABLE `_tbl_shopping_subcategories` DISABLE KEYS */;
INSERT INTO `_tbl_shopping_subcategories` VALUES (1,'C0001','FASHION','SC0001','SAREE','1581924474img_20200217_125428.jpg','SAREE',1,'2020-02-17 12:57:54');
/*!40000 ALTER TABLE `_tbl_shopping_subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_stock_admin`
--

DROP TABLE IF EXISTS `_tbl_stock_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_stock_admin` (
  `StockAdminID` int(11) NOT NULL AUTO_INCREMENT,
  `StockAdminName` varchar(255) DEFAULT NULL,
  `MobileNumber` varchar(255) DEFAULT NULL,
  `AdminEmail` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `PanCard` varchar(255) DEFAULT NULL,
  `AdhaarCard` varchar(255) DEFAULT NULL,
  `Address1` varchar(255) DEFAULT NULL,
  `Address2` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(255) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  `StockPointName` varchar(255) DEFAULT NULL,
  `StockPointAddressLine1` varchar(255) DEFAULT NULL,
  `StockPointAddressLine2` varchar(255) DEFAULT NULL,
  `StockPointCityName` varchar(255) DEFAULT NULL,
  `Landmark` varchar(255) DEFAULT NULL,
  `StockPointCountry` varchar(255) DEFAULT NULL,
  `StockPointState` varchar(255) DEFAULT NULL,
  `StockPointDistrict` varchar(255) DEFAULT NULL,
  `StockPointPinCode` varchar(255) DEFAULT NULL,
  `StockPointEmail` varchar(255) DEFAULT NULL,
  `StockPointMobile` varchar(255) DEFAULT NULL,
  `IsActive` int(11) DEFAULT '1',
  `IsSuperStockiest` int(11) DEFAULT '0',
  PRIMARY KEY (`StockAdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_stock_admin`
--

LOCK TABLES `_tbl_stock_admin` WRITE;
/*!40000 ALTER TABLE `_tbl_stock_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_stock_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_stock_admin_login_logs`
--

DROP TABLE IF EXISTS `_tbl_stock_admin_login_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_stock_admin_login_logs` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` int(11) DEFAULT NULL,
  `LoginOn` datetime DEFAULT NULL,
  `IsSuccess` int(11) DEFAULT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_stock_admin_login_logs`
--

LOCK TABLES `_tbl_stock_admin_login_logs` WRITE;
/*!40000 ALTER TABLE `_tbl_stock_admin_login_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_stock_admin_login_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_store_types`
--

DROP TABLE IF EXISTS `_tbl_store_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_store_types` (
  `StoreTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `StoreTypeName` varchar(255) DEFAULT NULL,
  `StoreTypeImage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`StoreTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_store_types`
--

LOCK TABLES `_tbl_store_types` WRITE;
/*!40000 ALTER TABLE `_tbl_store_types` DISABLE KEYS */;
INSERT INTO `_tbl_store_types` VALUES (1,'Grocery','grocery.jpg'),(2,'Garments','garments.jpg'),(3,'Gadgets','gadgets.jpg');
/*!40000 ALTER TABLE `_tbl_store_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_supporting_center_login_logs`
--

DROP TABLE IF EXISTS `_tbl_supporting_center_login_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_supporting_center_login_logs` (
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminID` int(11) DEFAULT NULL,
  `LoginOn` datetime DEFAULT NULL,
  `IsSuccess` int(11) DEFAULT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_supporting_center_login_logs`
--

LOCK TABLES `_tbl_supporting_center_login_logs` WRITE;
/*!40000 ALTER TABLE `_tbl_supporting_center_login_logs` DISABLE KEYS */;
INSERT INTO `_tbl_supporting_center_login_logs` VALUES (1,4,'2020-09-15 13:02:46',1),(2,4,'2020-09-15 13:45:11',1),(3,4,'2020-09-15 13:46:56',1),(4,4,'2020-09-15 13:47:45',1),(5,4,'2020-09-15 13:53:20',1),(6,7,'2020-09-15 15:26:54',1),(7,7,'2020-09-15 15:27:16',1),(8,7,'2020-09-15 15:28:56',1);
/*!40000 ALTER TABLE `_tbl_supporting_center_login_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_transferpin`
--

DROP TABLE IF EXISTS `_tbl_transferpin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_transferpin` (
  `TransferPinID` int(11) NOT NULL AUTO_INCREMENT,
  `TransferredOn` datetime DEFAULT NULL,
  `TransferFrom` int(11) DEFAULT NULL,
  `TransferTo` int(11) DEFAULT NULL,
  `IsMember` int(11) DEFAULT NULL,
  `IsAdmin` int(11) DEFAULT NULL,
  `PinID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TransferPinID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_transferpin`
--

LOCK TABLES `_tbl_transferpin` WRITE;
/*!40000 ALTER TABLE `_tbl_transferpin` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_transferpin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_wallet_earnings`
--

DROP TABLE IF EXISTS `_tbl_wallet_earnings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_wallet_earnings` (
  `EarningID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `MemberCode` varchar(255) DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `TxnDate` datetime DEFAULT NULL,
  `Credits` varchar(255) DEFAULT NULL,
  `Debits` varchar(255) DEFAULT NULL,
  `AvailableBalance` varchar(255) DEFAULT NULL,
  `details` text,
  `Ledger` int(11) DEFAULT '0',
  PRIMARY KEY (`EarningID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_wallet_earnings`
--

LOCK TABLES `_tbl_wallet_earnings` WRITE;
/*!40000 ALTER TABLE `_tbl_wallet_earnings` DISABLE KEYS */;
INSERT INTO `_tbl_wallet_earnings` VALUES (1,1,'WT000001','Payout process on 2020-09-14, Txn ID: 1','2020-09-14 23:30:01','700','0','700','',3),(2,1,'WT000001','Charges 20% Payout process on 2020-09-14, Txn ID: 1','2020-09-14 23:30:01','0','140','560','',30001),(3,185,'WTSTE00002','Payout process on 2020-09-14, Txn ID: 2','2020-09-14 23:30:01','300','0','300','',3),(4,185,'WTSTE00002','Charges 20% Payout process on 2020-09-14, Txn ID: 2','2020-09-14 23:30:01','0','60','240','',30001),(5,186,'WTSTE00003','Payout process on 2020-09-14, Txn ID: 3','2020-09-14 23:30:01','300','0','300','',3),(6,186,'WTSTE00003','Charges 20% Payout process on 2020-09-14, Txn ID: 3','2020-09-14 23:30:01','0','60','240','',30001),(7,187,'WTSTE00004','Payout process on 2020-09-14, Txn ID: 4','2020-09-14 23:30:01','100','0','100','',3),(8,187,'WTSTE00004','Charges 20% Payout process on 2020-09-14, Txn ID: 4','2020-09-14 23:30:01','0','20','80','',30001),(9,188,'WTSTE00005','Payout process on 2020-09-14, Txn ID: 5','2020-09-14 23:30:01','100','0','100','',3),(10,188,'WTSTE00005','Charges 20% Payout process on 2020-09-14, Txn ID: 5','2020-09-14 23:30:01','0','20','80','',30001),(11,189,'WTSTE00006','Payout process on 2020-09-14, Txn ID: 6','2020-09-14 23:30:01','100','0','100','',3),(12,189,'WTSTE00006','Charges 20% Payout process on 2020-09-14, Txn ID: 6','2020-09-14 23:30:01','0','20','80','',30001),(13,190,'WTSTE00007','Payout process on 2020-09-14, Txn ID: 7','2020-09-14 23:30:01','100','0','100','',3),(14,190,'WTSTE00007','Charges 20% Payout process on 2020-09-14, Txn ID: 7','2020-09-14 23:30:01','0','20','80','',30001),(15,199,'WTPRE00016','Payout process on 2020-09-14, Txn ID: 16','2020-09-14 23:30:01','100','0','100','',3),(16,199,'WTPRE00016','Charges 20% Payout process on 2020-09-14, Txn ID: 16','2020-09-14 23:30:01','0','20','80','',30001),(17,217,'WTFAT00034','Direct Referal Payout process on 2020-09-14','2020-09-14 23:30:01','50','0','50','',2),(18,217,'WTFAT00034','Charges 20% Direct Referal Payout process on 2020-09-14','2020-09-14 23:30:01','0','10','40','',20001),(19,1,'WT000001','Payout process on 2020-09-15, Txn ID: 39','2020-09-15 23:30:02','150','0','710','',3),(20,1,'WT000001','Charges 20% Payout process on 2020-09-15, Txn ID: 39','2020-09-15 23:30:02','0','30','680','',30001),(21,199,'WTPRE00016','Payout process on 2020-09-15, Txn ID: 54','2020-09-15 23:30:02','50','0','130','',3),(22,199,'WTPRE00016','Charges 20% Payout process on 2020-09-15, Txn ID: 54','2020-09-15 23:30:02','0','10','120','',30001),(23,214,'WTPRE00031','Direct Referal Payout process on 2020-09-15','2020-09-15 23:30:02','50','0','50','',2),(24,214,'WTPRE00031','Charges 20% Direct Referal Payout process on 2020-09-15','2020-09-15 23:30:02','0','10','40','',20001),(25,185,'WTSTE00002','Direct Referal Payout process on 2020-09-15','2020-09-15 23:30:02','50','0','290','',2),(26,185,'WTSTE00002','Charges 20% Direct Referal Payout process on 2020-09-15','2020-09-15 23:30:02','0','10','280','',20001),(35,1,'WT000001','Payout process on 2020-09-16, Txn ID: 127','2020-09-16 23:30:01','50','0','610','',3),(36,1,'WT000001','Charges 20% Payout process on 2020-09-16, Txn ID: 127','2020-09-16 23:30:01','0','10','600','',30001),(37,191,'WTSHE00008','Payout process on 2020-09-16, Txn ID: 134','2020-09-16 23:30:01','50','0','50','',3),(38,191,'WTSHE00008','Charges 20% Payout process on 2020-09-16, Txn ID: 134','2020-09-16 23:30:01','0','10','40','',30001),(39,200,'WTPRE00017','Direct Referal Payout process on 2020-09-16','2020-09-16 23:30:01','50','0','50','',2),(40,200,'WTPRE00017','Charges 20% Direct Referal Payout process on 2020-09-16','2020-09-16 23:30:01','0','10','40','',20001);
/*!40000 ALTER TABLE `_tbl_wallet_earnings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_wallet_request_utility`
--

DROP TABLE IF EXISTS `_tbl_wallet_request_utility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_wallet_request_utility` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `RequestedOn` datetime DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `AccountNumber` varchar(255) DEFAULT NULL,
  `IFSCode` varchar(255) DEFAULT NULL,
  `Mode` varchar(255) DEFAULT NULL,
  `TransactionNumber` varchar(255) DEFAULT NULL,
  `TransferDate` datetime DEFAULT NULL,
  `WalletTransactionID` int(11) DEFAULT NULL,
  `TransactionOn` datetime DEFAULT NULL,
  `IsApproved` int(11) DEFAULT '0',
  `IsApprovedOn` datetime DEFAULT NULL,
  `IsRejected` int(11) DEFAULT '0',
  `IsRejectedOn` datetime DEFAULT NULL,
  `WithdrawRequestID` int(11) DEFAULT NULL,
  `OldBalance` varchar(255) DEFAULT NULL,
  `NewBalance` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`RequestID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_wallet_request_utility`
--

LOCK TABLES `_tbl_wallet_request_utility` WRITE;
/*!40000 ALTER TABLE `_tbl_wallet_request_utility` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_wallet_request_utility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_tbl_wallet_utility`
--

DROP TABLE IF EXISTS `_tbl_wallet_utility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_tbl_wallet_utility` (
  `TxnID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) DEFAULT NULL,
  `TxnDate` datetime DEFAULT NULL,
  `Particulars` varchar(255) DEFAULT NULL,
  `Credits` float DEFAULT '0',
  `Debits` float DEFAULT '0',
  `AvailableBalance` float DEFAULT '0',
  `RequestID` int(11) DEFAULT '0',
  `WithDrawRequestID` int(11) DEFAULT '0',
  `RechargeTransactionID` int(11) DEFAULT '0',
  PRIMARY KEY (`TxnID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_tbl_wallet_utility`
--

LOCK TABLES `_tbl_wallet_utility` WRITE;
/*!40000 ALTER TABLE `_tbl_wallet_utility` DISABLE KEYS */;
/*!40000 ALTER TABLE `_tbl_wallet_utility` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-19 23:30:01
