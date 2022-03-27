-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: zandl
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `bankDeposit`
--

DROP TABLE IF EXISTS `bankDeposit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bankDeposit` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `amount` int(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankDeposit`
--

LOCK TABLES `bankDeposit` WRITE;
/*!40000 ALTER TABLE `bankDeposit` DISABLE KEYS */;
INSERT INTO `bankDeposit` VALUES (1,'2018-11-08','2018-11-05','2018-11-07',3000),(2,'2018-10-17','2018-11-06','2018-11-16',5000),(3,'2018-10-29','2018-11-20','2018-11-28',7000),(4,'2018-10-17','2018-11-13','2018-11-16',300),(5,'2018-11-10','2018-11-08','2018-11-11',1070),(6,'2018-11-29','2018-11-06','2018-11-11',2000),(7,'2018-11-03','2018-11-01','2018-11-03',2100);
/*!40000 ALTER TABLE `bankDeposit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'9792502276','Akil Momin','this is test'),(2,'6789967899','Akil','this another test'),(3,'456789432','akilmomin','this is final test'),(4,'9653435941','Akil Momin','hello'),(5,'9653435941','mona mirani','hello again');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `deposit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (2,'Alif Maknojia','800 Marion Pugh Dr Apt 2102','9792502276','200'),(5,'Akil','Abc','9196534357','200'),(6,'sagar','vasia','5856789089','0');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dailyEntry`
--

DROP TABLE IF EXISTS `dailyEntry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dailyEntry` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `duepaid` varchar(20) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `bottle` int(3) DEFAULT NULL,
  `total` int(5) DEFAULT NULL,
  `due` int(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dailyEntry`
--

LOCK TABLES `dailyEntry` WRITE;
/*!40000 ALTER TABLE `dailyEntry` DISABLE KEYS */;
INSERT INTO `dailyEntry` VALUES (1,'2018-11-01','Apple Medical','paid',30,6,180,0),(2,'2018-11-01','ocean Medical','paid',30,3,90,0),(3,'2018-11-01','Ambaji Medical','due',30,1,30,30),(4,'2018-11-01','murad station','paid',30,5,150,0),(5,'2018-11-01','new Morad','paid',30,2,60,0),(6,'2018-12-01','Apple Medical','paid',30,5,150,0),(7,'2018-12-01','ocean Medical','paid',30,2,60,0),(8,'2018-12-01','ambaji medical','due',40,1,40,40),(9,'2018-12-01','murad station','paid',30,4,120,0),(10,'2018-12-01','new Morad','paid',30,1,30,0),(11,'2018-12-01','Dines Stattion','paid',30,1,30,0),(12,'2018-12-01','Urega shopping','due',40,1,40,40),(13,'2018-12-01','rajeshwari','paid',50,1,50,0),(14,'2018-12-01','delta D 1321','paid',50,1,50,0),(15,'2018-12-01','Delta B 1509','due',40,1,40,40),(16,'2018-12-01','Delta B 606','due',40,1,40,40),(17,'2018-12-01','Delta B 1410','paid',50,1,50,0),(18,'2018-12-01','Delta B 2111','paid',50,1,50,0),(19,'2018-12-01','Delta stylus','paid',30,2,60,0),(20,'2018-12-01','vakil office','paid',50,1,50,0),(21,'2018-12-01','chamunda fuinsh','paid',40,1,40,0),(22,'2018-12-01','The tasmiya','due',50,1,50,50),(23,'2018-12-01','Green avenue C 203','due',30,1,30,30),(24,'2018-12-01','Green avenue D 101','due',90,2,180,180),(25,'2018-12-01','unique garden C 35, 002','due',50,1,50,50),(26,'2018-12-01','Agarwal sweet','paid',30,5,150,0),(27,'2018-12-01','Dhanu C 11','paid',50,1,50,0),(28,'2018-12-01','Alibhai Office','due',40,2,80,80),(29,'2018-12-01','nyc 9 401','paid',50,1,50,0),(30,'2018-12-01','nayanagar dairy','paid',30,2,60,0),(31,'2018-12-01','unique vihar B 602','paid',50,1,50,0),(32,'2018-12-02','Apple Medical','paid',30,3,90,0),(33,'2018-12-02','Rajeshvari B 101','paid',50,2,100,0),(34,'2018-12-02','ocean Medical','paid',30,2,60,0),(35,'2018-12-02','ambaji medical','due',40,1,40,40),(36,'2018-12-02','Morad','paid',30,4,120,0),(37,'2018-12-02','New morad','paid',30,1,30,0),(38,'2018-12-02','New morad bajuma','due',30,1,30,30),(39,'2018-12-02','Salon','paid',30,1,30,0),(40,'2018-12-02','Dinesh station','paid',30,1,30,0),(41,'2018-12-02','Xerox machine b 201','paid',30,1,30,0),(42,'2018-12-02',' Monjenish cake','paid',40,1,40,0),(43,'2018-12-02','Chomputar wale','due',40,1,40,40),(44,'2018-12-02','Rohanishan b 405','due',30,1,30,30),(45,'2018-12-02','Punam r 101 503','paid',40,1,40,0),(46,'2018-12-02','Green a c 204','paid',30,1,30,0),(47,'2018-12-02','Sayru 1204','paid',30,2,60,0),(48,'2018-12-02','Punam r 98 502','paid',50,1,50,0),(49,'2018-12-02','Gerej wale','paid',30,1,30,0),(50,'2018-12-02','Mahavir d b 602','paid',40,1,40,0),(51,'2018-12-02','Machin wale','due',40,1,40,40),(52,'2018-12-02','Star net','due',40,1,40,40),(53,'2018-12-02','Delta D 228','paid',40,1,40,0),(54,'2018-12-02','Delta b 2111','paid',50,1,50,0),(55,'2018-12-02','Agarwal sweet','paid',30,5,150,0),(56,'2018-12-02','Shristi karimbhai','due',40,2,80,80),(57,'2018-12-02','Nyc 5 503','paid',50,1,50,0),(58,'2018-12-02','Suriya shopping net','paid',40,2,80,0),(59,'2018-12-02','Joseb','paid',40,4,160,0),(60,'2018-12-03','Apple','paid',30,2,90,0),(61,'2018-12-03','Ochian medical','paid',30,2,60,0),(62,'2018-12-03','Ambaji medical','due',40,1,40,40),(63,'2018-12-03','Morad steshan','paid',30,2,60,0),(64,'2018-12-03','New morad ','paid',30,1,30,0),(65,'2018-12-03','Agarwal sweet ','paid',30,3,90,0),(66,'2018-12-03','Delta a 1704','paid',50,2,100,0),(67,'2018-12-03','Delta B 1509','paid',40,1,40,0),(68,'2018-12-03','Delta b 606','paid',40,1,40,0),(69,'2018-12-03','Nyc 7 301','paid',50,1,50,0),(70,'2018-12-03','Nyc 4 104','due',50,1,50,50),(71,'2018-12-03','Nyc 1 202','due',50,1,50,50),(72,'2018-12-03','Nyc 2 603','paid',40,1,40,0),(73,'2018-12-03','Kaveri b 106','paid',50,2,100,0),(74,'2018-12-03','Krishna tower A 502','paid',40,1,40,0),(75,'2018-12-03','Alibhai office','paid',40,1,40,0),(76,'2018-12-03','Suriya sopinga A t m','paid',40,1,40,0),(77,'2018-12-03','Dunesh steshan','paid',30,1,30,0),(78,'2018-12-03','Jagir chomplex ganga b 707','paid',40,3,120,0),(79,'2018-12-03','Uniq vihar b 38 504','paid',40,1,40,0),(80,'2018-12-03','Arif daresh','paid',40,1,40,0),(81,'2018-12-03','Cake bajuma chainij vale','paid',30,1,30,0),(82,'2018-12-03','J R D office','paid',40,2,80,0),(83,'2018-12-03','J R D home b 1101','paid',40,4,160,0),(84,'2018-12-03','Star net ','due',40,1,40,40),(85,'2018-12-03','Nyc 10 304','due',40,1,40,40),(86,'2018-12-04','Apple','due',30,3,90,90);
/*!40000 ALTER TABLE `dailyEntry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `expense_type` varchar(30) DEFAULT NULL,
  `vendor` varchar(40) DEFAULT NULL,
  `expense_amount` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` VALUES (1,'2018-12-01','water-bill','aqua slim',320),(2,'2018-12-01','transport','marwadi',200),(3,'2018-12-01','miscellaneous','tea',30),(4,'2018-12-01','water-bill','bislery',150),(5,'2018-12-02','water-bill','Suraj aqua',310),(6,'2018-12-02','transport','Marwadi',200),(7,'2018-12-02','miscellaneous','Tea',10),(8,'2018-12-03','water-bill','Suraj aqua',410),(9,'2018-12-03','transport','Marvadi',250),(10,'2018-12-03','miscellaneous','Tea',10);
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthlyReport`
--

DROP TABLE IF EXISTS `monthlyReport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthlyReport` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `total_bottle` int(5) DEFAULT NULL,
  `total` int(6) DEFAULT NULL,
  `due` int(6) DEFAULT NULL,
  `cash_in_hand` int(6) DEFAULT NULL,
  `daily_cash` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthlyReport`
--

LOCK TABLES `monthlyReport` WRITE;
/*!40000 ALTER TABLE `monthlyReport` DISABLE KEYS */;
/*!40000 ALTER TABLE `monthlyReport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','a29c57c6894dee6e8251510d58c07078ee3f49bf'),('rahul','4f5f57961eae171dfdb83e259463a870687f2c10');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor`
--

LOCK TABLES `vendor` WRITE;
/*!40000 ALTER TABLE `vendor` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-04 22:17:11
