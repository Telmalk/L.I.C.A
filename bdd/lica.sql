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
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'admin','admin','ROLE_ADMIN');
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
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E606C249A76ED395` (`user_id`),
  CONSTRAINT `FK_E606C249A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alien`
--

LOCK TABLES `alien` WRITE;
/*!40000 ALTER TABLE `alien` DISABLE KEYS */;
INSERT INTO `alien` VALUES (3,NULL,'Titi',1,1,'f','f','f',1,1,1,1,'sdffds','fd',1,1,'fine',0,1,1000,'assets/imgs/alien/alien1.gif','titi'),(4,24,'llk',1,1,'f','f','f',2,2,2,2,'d','f',1,1,'fine',1,1,500,'assets/imgs/alien/alien2.png','popo'),(5,24,'kl',1,1,'f','fd','df',1,1,1,1,'fd','fd',1,1,'ddf',1,1,1,'assets/imgs/alien/alien3.png','df'),(6,NULL,'sfgsdfsdf',1,1,'f','fds','fsd',1,1,1,1,'fd','fd',1,1,'fie n',0,1,1,'assets/imgs/alien/alien2.png','rzefd');
/*!40000 ALTER TABLE `alien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bet`
--

DROP TABLE IF EXISTS `bet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_id` int(11) NOT NULL,
  `id_fight_id` int(11) NOT NULL,
  `bet_target` int(11) NOT NULL,
  `wager` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FBF0EC9B79F37AE5` (`id_user_id`),
  KEY `IDX_FBF0EC9BFCBDBB71` (`id_fight_id`),
  CONSTRAINT `FK_FBF0EC9B79F37AE5` FOREIGN KEY (`id_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_FBF0EC9BFCBDBB71` FOREIGN KEY (`id_fight_id`) REFERENCES `fight` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bet`
--

LOCK TABLES `bet` WRITE;
/*!40000 ALTER TABLE `bet` DISABLE KEYS */;
INSERT INTO `bet` VALUES (7,24,2,1,334),(10,24,2,1,343),(11,24,3,2,432),(12,24,2,1,13412),(13,24,2,1,4342),(14,24,2,1,5000),(15,24,3,1,2),(16,24,2,1,434),(17,24,2,1,1);
/*!40000 ALTER TABLE `bet` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fight`
--

LOCK TABLES `fight` WRITE;
/*!40000 ALTER TABLE `fight` DISABLE KEYS */;
INSERT INTO `fight` VALUES (2,24,25,3,5,423,23,22,'2013-01-01 00:00:00',1),(3,25,24,4,3,534520,423,43,'2013-01-01 00:00:00',1),(7,24,NULL,3,NULL,1,1,1,'2478-01-01 00:00:00',0);
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
INSERT INTO `migration_versions` VALUES ('20180623143609'),('20180623144225'),('20180623145532'),('20180623181621'),('20180624084244'),('20180624200146'),('20180626182202'),('20180627092502'),('20180627100237'),('20180627122227'),('20180627123203'),('20180627124155'),('20180627125224'),('20180627125804'),('20180627150839'),('20180628085149'),('20180628090041'),('20180628092042'),('20180628092530');
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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credi_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_credit` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `defeat` int(11) NOT NULL,
  `pending_fight` tinyint(1) NOT NULL,
  `rating` int(11) NOT NULL,
  `img_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64986CC499D` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (24,'Wesh','oui','$2y$13$CkMYdP5wBoUZzzPjCM2v/u0PGc5KJqqIY7CaBX8qvNtb4URX6zU.m','JUL','2478-01-01','oui@oui','non',62,0,0,0,0,NULL,'a:1:{i:0;s:9:\"ROLE_USER\";}','Wesh alors ? Wesh alors ! Wesh alors.'),(25,'Mael','Mael','$2y$13$/YsyHVda9tyFeRDXfeQHsOpVvhU61HjXHfREAZcUr2DA1dUUbtNmK','Mael','2421-01-01','Mael@ho.fr',NULL,1200,0,0,0,0,NULL,'a:1:{i:0;s:9:\"ROLE_USER\";}','Aime Le Gros Chibre de Telmalk ! <======8');
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

-- Dump completed on 2018-06-29 11:37:58
