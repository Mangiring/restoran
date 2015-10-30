CREATE DATABASE  IF NOT EXISTS `restoran_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `restoran_db`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: restoran_db
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `access_tab`
--

DROP TABLE IF EXISTS `access_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_tab` (
  `aid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `agid` int(4) unsigned NOT NULL,
  `apid` int(10) DEFAULT NULL,
  `aaccess` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_tab`
--

LOCK TABLES `access_tab` WRITE;
/*!40000 ALTER TABLE `access_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_tab`
--

DROP TABLE IF EXISTS `branch_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_tab` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `bname` varchar(150) DEFAULT NULL,
  `baddr` text,
  `bphone` varchar(20) DEFAULT NULL,
  `bstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_tab`
--

LOCK TABLES `branch_tab` WRITE;
/*!40000 ALTER TABLE `branch_tab` DISABLE KEYS */;
INSERT INTO `branch_tab` VALUES (1,'Green Lake','Green Lake','08121313',1);
/*!40000 ALTER TABLE `branch_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_tab`
--

DROP TABLE IF EXISTS `categories_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `ctype` tinyint(1) DEFAULT '1',
  `cname` varchar(150) DEFAULT NULL,
  `cdesc` varchar(350) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_tab`
--

LOCK TABLES `categories_tab` WRITE;
/*!40000 ALTER TABLE `categories_tab` DISABLE KEYS */;
INSERT INTO `categories_tab` VALUES (1,1,'Makanan','Minuman',1),(2,1,'Minuman Baku','Minuman Baku',1),(3,2,'Lantai I','Lantai I',1),(4,2,'Lantai II','Lantai II',1);
/*!40000 ALTER TABLE `categories_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups_tab`
--

DROP TABLE IF EXISTS `groups_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups_tab` (
  `gid` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL,
  `gdesc` text NOT NULL,
  `gstatus` int(1) DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups_tab`
--

LOCK TABLES `groups_tab` WRITE;
/*!40000 ALTER TABLE `groups_tab` DISABLE KEYS */;
INSERT INTO `groups_tab` VALUES (1,'root','Root',1),(2,'Kitchen','Kitchen',1);
/*!40000 ALTER TABLE `groups_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_tab`
--

DROP TABLE IF EXISTS `inventory_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_tab` (
  `iid` int(10) NOT NULL AUTO_INCREMENT,
  `irid` int(10) DEFAULT '0',
  `istockbegining` int(10) DEFAULT '0',
  `istockin` int(10) DEFAULT '0',
  `istockout` int(10) DEFAULT '0',
  `istockretur` int(10) DEFAULT '0',
  `istock` int(10) DEFAULT '0',
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_tab`
--

LOCK TABLES `inventory_tab` WRITE;
/*!40000 ALTER TABLE `inventory_tab` DISABLE KEYS */;
INSERT INTO `inventory_tab` VALUES (1,1,5,10,3,1,9),(2,2,0,0,0,0,4);
/*!40000 ALTER TABLE `inventory_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus_tab`
--

DROP TABLE IF EXISTS `menus_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus_tab` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `mcid` int(10) DEFAULT NULL,
  `mname` varchar(300) DEFAULT NULL,
  `mdesc` varchar(300) DEFAULT NULL,
  `mdisc` int(10) DEFAULT NULL,
  `mharga` int(10) DEFAULT NULL,
  `mstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_tab`
--

LOCK TABLES `menus_tab` WRITE;
/*!40000 ALTER TABLE `menus_tab` DISABLE KEYS */;
INSERT INTO `menus_tab` VALUES (1,1,'Nasi Goreng Pedas Asam Manis Bumbu Cabe','Nasi Goreng Pedas Asam Manis Bumbu Cabe',10,150000,1);
/*!40000 ALTER TABLE `menus_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opname_tab`
--

DROP TABLE IF EXISTS `opname_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opname_tab` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oidid` int(10) DEFAULT NULL,
  `odate` int(10) DEFAULT NULL,
  `ostockbegining` int(10) DEFAULT NULL,
  `ostockin` int(10) DEFAULT NULL,
  `ostockout` int(10) DEFAULT NULL,
  `ostockretur` int(10) DEFAULT NULL,
  `ostock` int(10) DEFAULT NULL,
  `oadjustmin` int(10) DEFAULT NULL,
  `oadjustplus` int(10) DEFAULT NULL,
  `odesc` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opname_tab`
--

LOCK TABLES `opname_tab` WRITE;
/*!40000 ALTER TABLE `opname_tab` DISABLE KEYS */;
INSERT INTO `opname_tab` VALUES (1,2,1446178856,0,0,0,0,0,0,4,'iseng aja'),(2,1,1446179370,5,10,3,1,10,1,0,'iseng lagi');
/*!40000 ALTER TABLE `opname_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_tab`
--

DROP TABLE IF EXISTS `permission_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(45) DEFAULT NULL,
  `pdesc` varchar(150) DEFAULT NULL,
  `purl` varchar(45) DEFAULT NULL,
  `pparent` int(10) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_tab`
--

LOCK TABLES `permission_tab` WRITE;
/*!40000 ALTER TABLE `permission_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peticash_tab`
--

DROP TABLE IF EXISTS `peticash_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peticash_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `ptype` tinyint(1) DEFAULT '1',
  `pdate` int(10) DEFAULT NULL,
  `pdesc` text,
  `pnominal` int(10) DEFAULT NULL,
  `psaldo` int(10) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peticash_tab`
--

LOCK TABLES `peticash_tab` WRITE;
/*!40000 ALTER TABLE `peticash_tab` DISABLE KEYS */;
INSERT INTO `peticash_tab` VALUES (1,1,1445585399,'beli cat',100000,100000,1),(3,1,1445586419,'masuk lagi',1000000,1100000,1),(4,2,1445586445,'beli garam',5000,1095000,1);
/*!40000 ALTER TABLE `peticash_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raw_material_tab`
--

DROP TABLE IF EXISTS `raw_material_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raw_material_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rname` varchar(150) DEFAULT NULL,
  `rdesc` varchar(350) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raw_material_tab`
--

LOCK TABLES `raw_material_tab` WRITE;
/*!40000 ALTER TABLE `raw_material_tab` DISABLE KEYS */;
INSERT INTO `raw_material_tab` VALUES (1,'Ayam Kampung','Ayam Kampung',1),(2,'Bebek','Bebek',1);
/*!40000 ALTER TABLE `raw_material_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `raw_material_tab_AINS` AFTER INSERT ON `raw_material_tab`
FOR EACH ROW
	INSERT INTO inventory_tab (irid) VALUES (NEW.rid); */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tables_tab`
--

DROP TABLE IF EXISTS `tables_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tcid` int(10) DEFAULT NULL,
  `tname` varchar(150) DEFAULT NULL,
  `tdesc` varchar(350) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables_tab`
--

LOCK TABLES `tables_tab` WRITE;
/*!40000 ALTER TABLE `tables_tab` DISABLE KEYS */;
INSERT INTO `tables_tab` VALUES (1,3,'Table I','Table I',3),(2,3,'Table II','Table II',3),(3,3,'Table III','Table III',3),(4,3,'Table IV','Table IV',3),(5,4,'Table I','Table I',1),(6,4,'Table II','Table II',3);
/*!40000 ALTER TABLE `tables_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_tab`
--

DROP TABLE IF EXISTS `users_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_tab` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `ugid` int(10) DEFAULT NULL,
  `ubid` int(10) DEFAULT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `ulastlogin` varchar(21) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tab`
--

LOCK TABLES `users_tab` WRITE;
/*!40000 ALTER TABLE `users_tab` DISABLE KEYS */;
INSERT INTO `users_tab` VALUES (1,1,1,'root@restoran.com','e89591ee9b8e7018511649a2146ae279','*1446176138',1),(2,1,1,'palma@restoran.com','e89591ee9b8e7018511649a2146ae279',NULL,1);
/*!40000 ALTER TABLE `users_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist_detail_tab`
--

DROP TABLE IF EXISTS `wishlist_detail_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlist_detail_tab` (
  `wdid` int(11) NOT NULL AUTO_INCREMENT,
  `wid` int(11) NOT NULL,
  `wmid` int(11) NOT NULL,
  `wqty` int(11) NOT NULL,
  `wdisc` double DEFAULT NULL,
  `wharga` double DEFAULT NULL,
  `wstatus` int(11) NOT NULL,
  PRIMARY KEY (`wdid`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist_detail_tab`
--

LOCK TABLES `wishlist_detail_tab` WRITE;
/*!40000 ALTER TABLE `wishlist_detail_tab` DISABLE KEYS */;
INSERT INTO `wishlist_detail_tab` VALUES (65,41,9,2,0,2500,1),(66,41,8,4,0,2000,1),(67,41,1,2,10,25000,1),(68,41,4,2,10,25000,1),(69,42,8,1,0,2000,1),(70,42,1,2,10,25000,1),(71,43,5,2,0,2000,1),(72,43,2,3,15,24000,1),(73,43,1,3,10,25000,1),(74,44,1,7,10,150000,1),(75,45,1,2,10,150000,1),(76,46,1,3,10,150000,1),(77,47,1,3,10,150000,1),(78,48,1,3,10,150000,1),(79,49,1,0,10,150000,1);
/*!40000 ALTER TABLE `wishlist_detail_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist_tab`
--

DROP TABLE IF EXISTS `wishlist_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlist_tab` (
  `wid` int(11) NOT NULL AUTO_INCREMENT,
  `wname` varchar(50) DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `wtid` int(11) NOT NULL,
  `wtotal` double NOT NULL,
  `wppn` double DEFAULT NULL,
  `wdis` double NOT NULL,
  `wtotalall` double NOT NULL,
  `wdate` datetime DEFAULT NULL,
  `wstatus` int(11) NOT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist_tab`
--

LOCK TABLES `wishlist_tab` WRITE;
/*!40000 ALTER TABLE `wishlist_tab` DISABLE KEYS */;
INSERT INTO `wishlist_tab` VALUES (44,'Mona',2,4,945000,0,0,945000,'2015-10-23 00:00:00',3),(45,'Mona',2,1,270000,10,10,216000,'2015-10-23 00:00:00',3),(46,'Mona',3,1,150000,NULL,0,150000,'2015-10-23 00:00:00',3),(47,'Mona',3,4,405000,3,10,352350,'2015-10-23 00:00:00',3),(48,'Mona',2,4,150000,NULL,0,150000,'2015-10-23 00:00:00',3),(49,'Mona',2,4,150000,NULL,0,150000,'2015-10-23 00:00:00',1),(50,'',NULL,3,0,NULL,0,0,'2015-10-29 00:00:00',1),(51,'',NULL,2,0,NULL,0,0,'2015-10-29 00:00:00',1),(52,'',NULL,1,0,NULL,0,0,'2015-10-29 00:00:00',1),(53,'',NULL,6,0,NULL,0,0,'2015-10-29 00:00:00',1);
/*!40000 ALTER TABLE `wishlist_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-30 12:02:46
