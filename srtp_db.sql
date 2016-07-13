-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: srtp_db
-- ------------------------------------------------------
-- Server version	5.6.25-log

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
-- Table structure for table `achievement`
--

DROP TABLE IF EXISTS `achievement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievement` (
  `aId` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL,
  `releaseDate` date NOT NULL,
  `author` varchar(32) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`aId`),
  UNIQUE KEY `aId_UNIQUE` (`aId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievement`
--

LOCK TABLES `achievement` WRITE;
/*!40000 ALTER TABLE `achievement` DISABLE KEYS */;
INSERT INTO `achievement` VALUES (1,'123','软件创新实践班','2015-09-04','','<p>&nbsp; &nbsp; &nbsp;123</p>');
/*!40000 ALTER TABLE `achievement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `join_list`
--

DROP TABLE IF EXISTS `join_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `join_list` (
  `jId` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `studentId` int(8) NOT NULL,
  `school` varchar(32) NOT NULL,
  `address` varchar(64) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `qq` int(12) NOT NULL,
  `classes` varchar(32) NOT NULL,
  `reason` text NOT NULL,
  PRIMARY KEY (`jId`),
  UNIQUE KEY `uk_studentId` (`studentId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `join_list`
--

LOCK TABLES `join_list` WRITE;
/*!40000 ALTER TABLE `join_list` DISABLE KEYS */;
INSERT INTO `join_list` VALUES (1,'yehongjiang','男',20121933,'123','123',123,'yehongjiang2012@gmail.com',1564341462,'软件创新实践班','werwer'),(2,'ych','女',21111111,'123','123',123,'yehongjiang2012@gmail.com',1564341462,'软件创新实践班','rrr'),(3,'houyusan','女',12312311,'123','efeifeji',123123,'fsdf',123,'材料创新实践班','123'),(4,'yehongjiang','男',2323,'2321','1231231',23,'123',123,'软件创新实践班','123');
/*!40000 ALTER TABLE `join_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manager` (
  `mId` int(8) NOT NULL AUTO_INCREMENT,
  `managername` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`mId`),
  UNIQUE KEY `mId_UNIQUE` (`mId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (1,'20121931','123');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_news`
--

DROP TABLE IF EXISTS `subject_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_news` (
  `sId` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `category` varchar(32) NOT NULL,
  `releaseDate` date NOT NULL,
  `author` varchar(32) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`sId`),
  UNIQUE KEY `sId_UNIQUE` (`sId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_news`
--

LOCK TABLES `subject_news` WRITE;
/*!40000 ALTER TABLE `subject_news` DISABLE KEYS */;
INSERT INTO `subject_news` VALUES (2,'刘子谊','学科前沿','2015-06-30','hello','<p>大家好，我叫刘大爷 &nbsp; &nbsp;</p>'),(3,'123','学科前沿','2015-09-04','','<p>&nbsp; &nbsp; &nbsp;123</p>');
/*!40000 ALTER TABLE `subject_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uId` int(8) NOT NULL AUTO_INCREMENT,
  `studentId` int(8) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `class` varchar(32) DEFAULT NULL,
  `school` varchar(32) DEFAULT NULL,
  `registerDate` date NOT NULL,
  PRIMARY KEY (`uId`),
  UNIQUE KEY `studentId_UNIQUE` (`uId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,20121931,'123',NULL,'yehongjiang',NULL,NULL,'2015-12-12');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-11 12:12:04
