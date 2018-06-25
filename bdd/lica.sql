CREATE DATABASE  IF NOT EXISTS `lica` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `lica`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lica
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alien`
--

DROP TABLE IF EXISTS `alien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `race` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nutrition` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attack` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `threat` int(11) NOT NULL,
  `description_card` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trait` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `win` int(11) NOT NULL,
  `defeat` int(11) NOT NULL,
  `health_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adopted` tinyint(1) NOT NULL,
  `rating` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E606C249A76ED395` (`user_id`),
  CONSTRAINT `FK_E606C249A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alien`
--

LOCK TABLES `alien` WRITE;
/*!40000 ALTER TABLE `alien` DISABLE KEYS */;
INSERT INTO `alien` VALUES (1,NULL,'Toto',2,2,'f','nutruk','fd',1,1,1,1,'fds','sdf',1,1,'fdsf',0,1,1,''),(2,2,'fdf',1,1,'fd','fd','sdf',1,1,1,1,'sdfs','fdsf',1,1,'sdf',1,2,2,'fsd');
/*!40000 ALTER TABLE `alien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fight`
--

DROP TABLE IF EXISTS `fight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `alien1_id` int(11) DEFAULT NULL,
  `alien2_id` int(11) DEFAULT NULL,
  `bet` int(11) NOT NULL,
  `odd_fighter1` int(11) NOT NULL,
  `odd_fighter2` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_21AA445656AE248B` (`user1_id`),
  KEY `IDX_21AA4456441B8B65` (`user2_id`),
  KEY `IDX_21AA44569BD7E9A8` (`alien1_id`),
  KEY `IDX_21AA445689624646` (`alien2_id`),
  CONSTRAINT `FK_21AA4456441B8B65` FOREIGN KEY (`user2_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_21AA445656AE248B` FOREIGN KEY (`user1_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_21AA445689624646` FOREIGN KEY (`alien2_id`) REFERENCES `alien` (`id`),
  CONSTRAINT `FK_21AA44569BD7E9A8` FOREIGN KEY (`alien1_id`) REFERENCES `alien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fight`
--

LOCK TABLES `fight` WRITE;
/*!40000 ALTER TABLE `fight` DISABLE KEYS */;
INSERT INTO `fight` VALUES (1,3,2,1,2,2,2,2,'2013-01-01 00:00:00',0);
/*!40000 ALTER TABLE `fight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20180623143609'),('20180623144225'),('20180623145532'),('20180623181621'),('20180624084244'),('20180624200146');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credi_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_credit` int(11) DEFAULT '0',
  `win` int(11) NOT NULL,
  `defeat` int(11) NOT NULL,
  `pending_fight` tinyint(1) NOT NULL,
  `rating` int(11) NOT NULL,
  `img_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'toto','titi','gsdl','g','2013-01-01','tsd@gmail.com',NULL,43,7,10,0,9,NULL),(3,'sdfd','fsdf','sdfsdf','f','2013-01-01','fdffs@dfsdf.fr',NULL,NULL,1,1,0,19,NULL);
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

-- Dump completed on 2018-06-25 16:16:40
