-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: onlinedesktop
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `serial`
--

DROP TABLE IF EXISTS `serial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serial` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `SerialCode` varchar(255) DEFAULT '00-00-00',
  `Stat` varchar(255) DEFAULT 'non-active',
  `ActivationDate` varchar(255) DEFAULT '01/01/2000',
  `IPAddress` varchar(255) DEFAULT '127.0.0.1',
  `geolocation` varchar(255) DEFAULT 'internet',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1076 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serial`
--

LOCK TABLES `serial` WRITE;
/*!40000 ALTER TABLE `serial` DISABLE KEYS */;
INSERT INTO `serial` VALUES (1060,'55-55-55-55','non-active','01/01/2000','105.103.12.6','internet');
INSERT INTO `serial` VALUES (1061,'66-66-66-66','non-active','01/01/2000','41.220.159.100','internet');
INSERT INTO `serial` VALUES (1062,'77-77-77-77','non-active','01/01/2000','192.52.232.150','internet');
INSERT INTO `serial` VALUES (1063,'88-88-88-88','non-active','01/01/2000','192.52.232.200','internet');
INSERT INTO `serial` VALUES (1064,'22-22-22-22','non-active','01/01/2000','105.103.12.7','internet');
INSERT INTO `serial` VALUES (1065,'99-99-99-99','non-active','01/01/2000','193.251.169.10','internet');
INSERT INTO `serial` VALUES (1066,'12-12-12-12','non-active','01/01/2000','195.24.80.30','internet');
INSERT INTO `serial` VALUES (1067,'13-13-13-13','non-active','01/01/2000','193.251.169.75','internet');
INSERT INTO `serial` VALUES (1068,'11-11-11-11','non-active','01/01/2000','105.103.12.8','internet');
INSERT INTO `serial` VALUES (1069,'14-14-14-14','non-active','01/01/2000','195.24.80.120','internet');
INSERT INTO `serial` VALUES (1070,'15-15-15-15','non-active','01/01/2000','196.20.64.35','internet');
INSERT INTO `serial` VALUES (1071,'16-16-16-16','non-active','01/01/2000','105.103.12.15','internet');
INSERT INTO `serial` VALUES (1072,'17-17-17-17','non-active','01/01/2000','197.200.0.15','internet');
INSERT INTO `serial` VALUES (1073,'18-18-18-18','non-active','01/01/2000','197.200.0.95','internet');
INSERT INTO `serial` VALUES (1074,'13-13-13-13','non-active','01/01/2000','193.251.169.75','internet');
INSERT INTO `serial` VALUES (1075,'77-77-77-77','non-active','01/01/2000','192.52.232.150','internet');
/*!40000 ALTER TABLE `serial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'onlinedesktop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-26 11:45:58
