-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 172.24.6.102    Database: ulm
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `act`
--

DROP TABLE IF EXISTS `act`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `act` (
  `actid` int NOT NULL AUTO_INCREMENT,
  `castid` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tgi` int DEFAULT NULL,
  `tht` int DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `executive` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `associate` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `product` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `billed` varchar(50) DEFAULT NULL,
  `sr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `requirement` varchar(50) DEFAULT NULL,
  `fm` varchar(50) DEFAULT NULL,
  `advance` varchar(50) DEFAULT NULL,
  `orderst` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `walkout` varchar(50) DEFAULT NULL,
  `reason` TEXT DEFAULT NULL,
  `conversion` varchar(50) DEFAULT NULL,
  `remarks` TEXT DEFAULT NULL,
  `intime` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `time` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`actid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `act`
--

LOCK TABLES `act` WRITE;
/*!40000 ALTER TABLE `act` DISABLE KEYS */;
/*!40000 ALTER TABLE `act` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(10) DEFAULT NULL,
  `fun` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `additional_info` text,
  `uid` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associate`
--

DROP TABLE IF EXISTS `associate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `associate` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associate`
--

LOCK TABLES `associate` WRITE;
/*!40000 ALTER TABLE `associate` DISABLE KEYS */;
INSERT INTO `associate` VALUES (1,'N/A','1'),(2,'Shanker','1'),(3,'Mirza','1'),(4,'Ashok','1'),(5,'Rajesh','1'),(6,'Mahender','1'),(7,'P.Prasad','1'),(8,'Mahipal','1'),(9,'K.Mahesh','1'),(10,'Manju','1'),(11,'Amareshwari','1'),(12,'Anusha','1'),(13,'Kajal','1'),(14,'Jr.Khaja','1'),(15,'Jalender','1'),(16,'Bhavani','1'),(17,'Omer','1'),(18,'Abhilash/Gyani','1'),(19,'D.Mahesh','1'),(20,'SR.Khaja','1'),(21,'Veerender','1'),(22,'Kiran','1'),(23,'Gowtham','1'),(24,'Sai','1'),(25,'M.Nagesh','1'),(26,'Naveen','1'),(27,'Mamatha','1'),(28,'Hema','1'),(29,'Priyanka','1'),(30,'Prashanth','1'),(31,'Kranthi','1'),(32,'Shanker','1'),(33,'Mirza','1'),(34,'Ashok','1'),(35,'Rajesh ','1'),(36,'Mahender','1'),(37,'P.Prasad','1'),(38,'Mahipal','1'),(39,'K.Mahesh','1'),(40,'Manju','1'),(41,'Anusha','1'),(42,'Kajal','1'),(43,'JR.Khaja','1'),(44,'Rajkumar','1'),(45,'Laxmi','1'),(46,'Nikhil','1'),(47,'Vivek','1');
/*!40000 ALTER TABLE `associate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `castin`
--

DROP TABLE IF EXISTS `castin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `castin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mob` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgi` int DEFAULT '0',
  `thc` int DEFAULT '0',
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `time` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cou_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `castin`
--

LOCK TABLES `castin` WRITE;
/*!40000 ALTER TABLE `castin` DISABLE KEYS */;
/*!40000 ALTER TABLE `castin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coustomeradd`
--

DROP TABLE IF EXISTS `coustomeradd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coustomeradd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cou_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `DND` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coustomeradd`
--

LOCK TABLES `coustomeradd` WRITE;
/*!40000 ALTER TABLE `coustomeradd` DISABLE KEYS */;
INSERT INTO `coustomeradd` VALUES (1,'pushpavathi','Hyderabad','8121813388',NULL,NULL,NULL,'No');
/*!40000 ALTER TABLE `coustomeradd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `executive`
--

DROP TABLE IF EXISTS `executive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `executive` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `executive`
--

LOCK TABLES `executive` WRITE;
/*!40000 ALTER TABLE `executive` DISABLE KEYS */;
INSERT INTO `executive` VALUES (1,'Shanker',0),(2,'Mirza',0),(3,'Ashok',1),(4,'Rajesh',1),(5,'Mahender',1),(6,'P.Prasad',1),(7,'Mahipal',1),(8,'K.Mahesh',0),(9,'Manju',1),(10,'Amareshwari',1),(11,'Anusha',1),(12,'Kajal',0),(13,'Jr.Khaja',0),(14,'Jalender',1),(15,'Bhavani',1),(16,'Omer',1),(17,'Abhilash/Gyani',1),(18,'D.Mahesh',1),(19,'SR.Khaja',1),(20,'Veerender',1),(21,'Kiran',1),(22,'Gowtham',1),(23,'Sai',1),(24,'M.Nagesh',0),(25,'Naveen',1),(26,'Mamatha',1),(27,'Hema',1),(28,'Priyanka',1),(29,'Prashanth',1),(30,'Kranthi',1),(31,'Shanker',0),(32,'Mirza',0),(33,'Ashok',0),(34,'Rajesh ',1),(35,'Mahender',1),(36,'P.Prasad',1),(37,'Mahipal',1),(38,'K.Mahesh',1),(39,'Manju',1),(40,'Anusha',1),(41,'Kajal',1),(42,'JR.Khaja',0),(43,'Rajkumar',1),(44,'Laxmi',1),(45,'Nikhil',1),(46,'Vivek',1);
/*!40000 ALTER TABLE `executive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followup`
--

DROP TABLE IF EXISTS `followup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `followup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `castid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `castname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cast_mob` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `remarks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updated_by` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1',
  `date` timestamp NULL DEFAULT NULL,
  `remarks_his` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `createdby` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `createdat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lastact` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followup`
--

LOCK TABLES `followup` WRITE;
/*!40000 ALTER TABLE `followup` DISABLE KEYS */;
/*!40000 ALTER TABLE `followup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `msg_id` int NOT NULL,
  `incoming_msg_id` int DEFAULT NULL,
  `outgoing_msg_id` int DEFAULT NULL,
  `msg` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `exptime` timestamp NULL DEFAULT NULL,
  `sub` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `msg` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ack` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fromuser` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Tikka(Papidibilla)',1),(2,'Tikka(Papidibilla)',1),(3,'Bore(Mathapatti)',1),(4,'Mati(Matilu)',1),(5,'Earrings(Kammalu)',1),(6,'Nath(Mukkupudaka)',1),(7,'Nosepin',1),(8,'Jada(Jadalu)',1),(9,'Hair Pin(Jadabilla)',1),(10,'Choker',1),(11,'Necklace',1),(12,'Haram',1),(13,'Black Beads',1),(14,'Kante',1),(15,'Chain',1),(16,'Sutram Chain',1),(17,'Finger Ring',1),(18,'Ring With Bracelet',1),(19,'Bracelet',1),(20,'Armlet(Bhajuban)',1),(21,'Oddiyanam',1),(22,'Vanky',1),(23,'Kandholi',1),(24,'Bangles',1),(25,'Kadda(Kadiyam)',1),(26,'Pendant(Pathakam)',1),(27,'Brooch',1),(28,'Anklet(Pattilu)',1),(29,'NKL/Earrings',1),(30,'BB/PNDT',1),(31,'Chain/PNDT',1),(32,'BANG/FRNG',1),(33,'Haram/CHK',1),(34,'Mathapatti/Tikka',1),(35,'Earrings/Mattis ',1),(36,'Others',1),(37,'SET',1),(38,'N/A',1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ptype`
--

DROP TABLE IF EXISTS `ptype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ptype` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ptype`
--

LOCK TABLES `ptype` WRITE;
/*!40000 ALTER TABLE `ptype` DISABLE KEYS */;
/*!40000 ALTER TABLE `ptype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `page` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin',''),(2,'C.M.R','ajax.php,addcus.php,in.php,out.php,fup.php,update.php,activity.php,mess.php'),(3,'FM','ajax.php,fup.php,update.php,fm_index.php,activity.php,mess.php');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` int DEFAULT NULL,
  `mob` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  `fname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `onstatus` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$DE8XFFa.9f4E4Pe6FPJyd.2yxR/EqngPCizob.D.PgfkSClj..psC','2023-02-21 00:14:44',1,'',1,'admin','user',1),(2,'karuna@vdr','$2y$10$IgSe8LxLV48SaoZTiMyI/.bTMbKEifbXxIwT0wic80.KbHoJfAPei','2023-04-05 11:26:35',2,NULL,1,'Karuna','Mekalollu',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


CREATE INDEX idx_coustomeradd
ON coustomeradd (id, mobile_no);
CREATE INDEX idx_act_cast
ON act (actid, castid);

CREATE INDEX idx_act_exe
ON act (actid, executive);



--
-- Dumping routines for database 'ulm'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-06  2:24:08
