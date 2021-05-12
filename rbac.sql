-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: rbac
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `account_type` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'000000000000',1,17,'world','2021-05-05 19:13:32','2021-05-05 23:48:25'),(2,'0000000000001',65,3,'checking','2021-05-05 19:13:32','2021-05-05 23:48:30'),(3,'00000000000011',65,0,'checking','2021-05-05 19:08:09','2021-05-05 23:48:37');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_transaction`
--

DROP TABLE IF EXISTS `bank_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src_account_id` int(11) NOT NULL,
  `destination_account_id` int(11) NOT NULL,
  `balance_change` double NOT NULL DEFAULT '0',
  `expected_total` double NOT NULL DEFAULT '0',
  `transaction_type` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `memo` varchar(512) NOT NULL DEFAULT '',
  `transaction_number` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_transaction`
--

LOCK TABLES `bank_transaction` WRITE;
/*!40000 ALTER TABLE `bank_transaction` DISABLE KEYS */;
INSERT INTO `bank_transaction` VALUES (1,1,2,5,20,'transfer','2021-05-05 18:48:30','','1','credit'),(2,2,1,5,5,'transfer','2021-05-05 18:48:31','','1','debit'),(3,1,3,5,15,'transfer','2021-05-05 18:48:37','','2','credit'),(4,3,1,5,5,'transfer','2021-05-05 18:48:37','','2','debit'),(5,1,3,1222,-1207,'transfer','2021-05-05 19:07:19','','3','credit'),(6,3,1,1222,1227,'transfer','2021-05-05 19:07:19','','3','debit'),(7,1,2,10,5,'transfer','2021-05-05 19:08:23','','4','credit'),(8,2,1,10,15,'transfer','2021-05-05 19:08:23','','4','debit'),(9,2,1,12,3,'transfer','2021-05-05 19:13:31','','5','credit'),(10,1,2,12,17,'transfer','2021-05-05 19:13:32','','5','debit');
/*!40000 ALTER TABLE `bank_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_role` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'system@gmail.com','no-password','Sysytem User',0),(57,'admin@email.com','ee11cbb19052e40b07aac0ca060c23ee','Muhammad Farid',1),(58,'user@email.com','ee11cbb19052e40b07aac0ca060c23ee','Muhammad Farid',2),(59,'accountant@email.com','ee11cbb19052e40b07aac0ca060c23ee','Muhammad Farid',3),(60,'rzwanilyas@gmail.com','e19d5cd5af0378da05f63f891c7467af','abcd1234',2),(61,'rzwnilyas@gmail.com','e19d5cd5af0378da05f63f891c7467af','abcd1234',2),(62,'waqas.ilyas@gmail.com','e19d5cd5af0378da05f63f891c7467af','abcd1234',2),(63,'reeee@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',2),(64,'asher@gmail.com','e19d5cd5af0378da05f63f891c7467af','abcd1234',2),(65,'irfan.ilyas@gmail.com','e19d5cd5af0378da05f63f891c7467af','Irfan Ali',2);
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

-- Dump completed on 2021-05-06  0:18:34
