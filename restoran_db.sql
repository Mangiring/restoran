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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_tab`
--

LOCK TABLES `categories_tab` WRITE;
/*!40000 ALTER TABLE `categories_tab` DISABLE KEYS */;
INSERT INTO `categories_tab` VALUES (1,1,'Makanan','Minuman',1),(2,1,'Minuman Baku','Minuman Baku',1),(3,2,'PT.GRAMEDIA ASRI MEDIA  CIBINONG CITY MALL1','wwwwwwwwwwwwww',1);
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
  `mstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_tab`
--

LOCK TABLES `menus_tab` WRITE;
/*!40000 ALTER TABLE `menus_tab` DISABLE KEYS */;
INSERT INTO `menus_tab` VALUES (1,1,'Nasi Goreng Pedas Asam Manis Bumbu Cabe','Nasi Goreng Pedas Asam Manis Bumbu Cabe',10,1);
/*!40000 ALTER TABLE `menus_tab` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raw_material_tab`
--

LOCK TABLES `raw_material_tab` WRITE;
/*!40000 ALTER TABLE `raw_material_tab` DISABLE KEYS */;
INSERT INTO `raw_material_tab` VALUES (1,'Ayam Kampung','Ayam Kampung',1);
/*!40000 ALTER TABLE `raw_material_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables_tab`
--

DROP TABLE IF EXISTS `tables_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables_tab` (
  `tid` int(10) NOT NULL,
  `tcid` int(10) DEFAULT NULL,
  `tname` varchar(150) DEFAULT NULL,
  `tdesc` varchar(350) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables_tab`
--

LOCK TABLES `tables_tab` WRITE;
/*!40000 ALTER TABLE `tables_tab` DISABLE KEYS */;
INSERT INTO `tables_tab` VALUES (0,3,'Gratcy Palma P Hutapea','aaaaaaaaaa',1);
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
INSERT INTO `users_tab` VALUES (1,1,1,'root@restoran.com','e89591ee9b8e7018511649a2146ae279','*1445190681',1),(2,1,1,'palma@restoran.com','e89591ee9b8e7018511649a2146ae279',NULL,1);
/*!40000 ALTER TABLE `users_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-19  1:20:14
