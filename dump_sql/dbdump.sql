-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ef_manufacture
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `Barang`
--

DROP TABLE IF EXISTS `Barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Barang` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(255) NOT NULL,
  `Nama` varchar(511) NOT NULL,
  `Tanggal_Masuk` date NOT NULL,
  `R_diperiksa_Hasil` text NOT NULL,
  `R_diperiksa_Tanggal` date NOT NULL,
  `R_diperiksa_Data_QC` varchar(511) NOT NULL,
  `R_diperiksa_Keterangan` text NOT NULL,
  `E_Pegawai_ID` int(11) NOT NULL,
  `E_Pengambilan_ID` int(11) NOT NULL,
  `E_Jenis_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Barang`
--

LOCK TABLES `Barang` WRITE;
/*!40000 ALTER TABLE `Barang` DISABLE KEYS */;
INSERT INTO `Barang` VALUES (12,'0','aaa','2017-04-11','Tidak Lulus','0000-00-00','public/9abe447f5bd3bb5a31c4f5ceb0d3a6ef.png','ttttt',1,19,1),(13,'1','Arduino','2017-04-12','Lulus','0000-00-00','','lorem ipsum dolor sit amet consectetur adipiscing',1,19,1),(14,'0','Buku Tulis','2017-04-13','','0000-00-00','','',1,19,1),(15,'0','Pensil','2017-04-12','','0000-00-00','','',1,19,1),(16,'0','aaaa','2017-04-12','','0000-00-00','','',1,19,1);
/*!40000 ALTER TABLE `Barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Jenis`
--

DROP TABLE IF EXISTS `Jenis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Jenis` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(511) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Jenis`
--

LOCK TABLES `Jenis` WRITE;
/*!40000 ALTER TABLE `Jenis` DISABLE KEYS */;
INSERT INTO `Jenis` VALUES (1,'Elektronik');
/*!40000 ALTER TABLE `Jenis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pegawai`
--

DROP TABLE IF EXISTS `Pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pegawai` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(511) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pegawai`
--

LOCK TABLES `Pegawai` WRITE;
/*!40000 ALTER TABLE `Pegawai` DISABLE KEYS */;
INSERT INTO `Pegawai` VALUES (1,'John Smith');
/*!40000 ALTER TABLE `Pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pengambilan`
--

DROP TABLE IF EXISTS `Pengambilan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pengambilan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `E_Pegawai_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pengambilan`
--

LOCK TABLES `Pengambilan` WRITE;
/*!40000 ALTER TABLE `Pengambilan` DISABLE KEYS */;
INSERT INTO `Pengambilan` VALUES (1,'2017-04-11 17:26:51',0),(2,'2017-04-11 17:27:52',0),(3,'2017-04-11 17:28:54',0),(4,'2017-04-11 17:30:12',0),(5,'2017-04-11 17:30:45',0),(6,'2017-04-11 17:31:14',0),(7,'2017-04-11 17:32:41',0),(8,'2017-04-11 17:33:57',0),(9,'2017-04-11 17:34:52',0),(10,'2017-04-11 17:35:53',0),(11,'2017-04-11 17:36:34',0),(12,'2017-04-11 17:37:03',0),(13,'2017-04-11 17:37:14',0),(14,'2017-04-11 17:44:55',0),(15,'2017-04-11 17:45:10',0),(16,'2017-04-11 17:45:40',0),(17,'2017-04-11 17:46:37',0),(18,'2017-04-11 17:47:09',0),(19,'2017-04-11 17:47:58',1);
/*!40000 ALTER TABLE `Pengambilan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-12 13:12:28
