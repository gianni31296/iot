-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: IotDatabase
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clienti` (
  `codCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(20) NOT NULL,
  `cognomeCliente` varchar(20) NOT NULL,
  `sessoCliente` enum('m','f') DEFAULT NULL,
  `indirizzoCliente` varchar(20) DEFAULT NULL,
  `residenzaCliente` varchar(20) DEFAULT NULL,
  `emailCliente` varchar(25) DEFAULT NULL,
  `telefonoCliente` varchar(10) DEFAULT NULL,
  `passwordCliente` varchar(32) DEFAULT NULL,
  `accessoCliente` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`codCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES (1,'Nicola Michele','Alberga','m','Via Bari, 25','Gioia del Colle','alberga@gmail.com','3286767836','30f1bd007108458456b918060665781e',1),(2,'Maria','Berti','f','Via Nicolai, 45','Gioia del Colle','berti@gmail.com','347783748','5c061a60b4c6c9994bb57d2ce4310b79',1),(3,'Alberto','Rossi','m','Via Piemonte, 56','Gioia del Colle','rossi@gmail.com','3677878989','2bf65275cb7f5dc95febd7d46cd7d0af',1),(4,'Alberto','Di Napoli','m','Via Piemonte, 56','Gioia del Colle','dinapoli@libero.it','328676575','fa417d1425c83a31426fc2f509416cc5',1),(5,'Francesco','Collodi','m','Via Napoli, 25','Gioia del Colle','francesco@collodi.org','3447466985','38eae8c495b4f96201c7e774f5402614',1),(6,'Giuseppe','Andriano','m','Via chiancaro, 12','Gioia del Colle','giuseppe.ancr@libero.it','3927834297','dc52fca6596ef269adba0b2f2ba2e438',1);
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `errori`
--

DROP TABLE IF EXISTS `errori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `errori` (
  `codErrore` int(11) NOT NULL AUTO_INCREMENT,
  `descrizioneE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codErrore`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `errori`
--

LOCK TABLES `errori` WRITE;
/*!40000 ALTER TABLE `errori` DISABLE KEYS */;
INSERT INTO `errori` VALUES (1,'errore 1'),(2,'errore 2'),(3,'errore 3'),(4,'errore 4'),(5,'errore 5');
/*!40000 ALTER TABLE `errori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rilevazioni`
--

DROP TABLE IF EXISTS `rilevazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rilevazioni` (
  `codRilevazione` int(11) NOT NULL AUTO_INCREMENT,
  `stringa` varchar(50) NOT NULL,
  `descrizione` varchar(100) DEFAULT NULL,
  `stato` tinyint(1) DEFAULT '1',
  `sensoreR` int(11) NOT NULL,
  `erroreR` int(11) DEFAULT NULL,
  PRIMARY KEY (`codRilevazione`),
  KEY `sensoreR` (`sensoreR`),
  KEY `erroreR` (`erroreR`),
  CONSTRAINT `rilevazioni_ibfk_1` FOREIGN KEY (`sensoreR`) REFERENCES `sensori` (`codSensore`) ON DELETE CASCADE,
  CONSTRAINT `rilevazioni_ibfk_2` FOREIGN KEY (`erroreR`) REFERENCES `errori` (`codErrore`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rilevazioni`
--

LOCK TABLES `rilevazioni` WRITE;
/*!40000 ALTER TABLE `rilevazioni` DISABLE KEYS */;
/*!40000 ALTER TABLE `rilevazioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensori`
--

DROP TABLE IF EXISTS `sensori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensori` (
  `codSensore` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(20) NOT NULL,
  `clienteS` int(11) NOT NULL,
  PRIMARY KEY (`codSensore`),
  KEY `clienteS` (`clienteS`),
  CONSTRAINT `sensori_ibfk_1` FOREIGN KEY (`clienteS`) REFERENCES `clienti` (`codCliente`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensori`
--

LOCK TABLES `sensori` WRITE;
/*!40000 ALTER TABLE `sensori` DISABLE KEYS */;
INSERT INTO `sensori` VALUES (1,'MINECRAFT',1),(2,'Sony',1);
/*!40000 ALTER TABLE `sensori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensori_tipi`
--

DROP TABLE IF EXISTS `sensori_tipi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensori_tipi` (
  `cod_sensore_rt` int(11) NOT NULL,
  `cod_tipo_rt` int(11) NOT NULL,
  `inizio` int(11) NOT NULL,
  `lunghezza` int(11) DEFAULT NULL,
  `dimensione` int(11) DEFAULT NULL,
  `descrizione_t` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_sensore_rt`,`cod_tipo_rt`,`inizio`),
  KEY `cod_tipo_rt` (`cod_tipo_rt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensori_tipi`
--

LOCK TABLES `sensori_tipi` WRITE;
/*!40000 ALTER TABLE `sensori_tipi` DISABLE KEYS */;
INSERT INTO `sensori_tipi` VALUES (1,2,20,3,NULL,'temperatura'),(1,3,1,5,NULL,'errore'),(1,4,6,8,NULL,'data'),(1,5,14,6,NULL,'ora'),(2,2,20,3,NULL,'temperatura'),(2,3,1,5,NULL,'errore'),(2,4,6,8,NULL,'data'),(2,5,14,6,NULL,'ora');
/*!40000 ALTER TABLE `sensori_tipi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terzeparti`
--

DROP TABLE IF EXISTS `terzeparti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terzeparti` (
  `codTP` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTP` varchar(20) NOT NULL,
  `cognomeTP` varchar(20) NOT NULL,
  `sessoTP` enum('m','f') DEFAULT NULL,
  `indirizzoTP` varchar(20) DEFAULT NULL,
  `residenzaTP` varchar(20) DEFAULT NULL,
  `emailTP` varchar(25) NOT NULL,
  `telefonoTP` varchar(10) DEFAULT NULL,
  `passwordTP` varchar(32) NOT NULL,
  `accessoTP` tinyint(1) DEFAULT 1,
  `clienteTP` int(11) NOT NULL,
  PRIMARY KEY (`codTP`),
  KEY `clienteTP` (`clienteTP`),
  CONSTRAINT `terzeparti_ibfk_1` FOREIGN KEY (`clienteTP`) REFERENCES `clienti` (`codCliente`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terzeparti`
--

LOCK TABLES `terzeparti` WRITE;
/*!40000 ALTER TABLE `terzeparti` DISABLE KEYS */;
INSERT INTO `terzeparti` VALUES (1,'gianni','mastrovito','m',NULL,NULL,'gianni@gmail.com',NULL,'1bc42179cc24bcc5eeff1b1b2d03657c',1,1),(2,'','','m','','','gianni@g','','1bc42179cc24bcc5eeff1b1b2d03657c',1,1),(3,'','','m','','','gianni@g','','1bc42179cc24bcc5eeff1b1b2d03657c',1,1),(4,'','','m','','','gianni@g','','1bc42179cc24bcc5eeff1b1b2d03657c',1,1),(5,'','','m','','','gianni@g','','d41d8cd98f00b204e9800998ecf8427e',1,1);
/*!40000 ALTER TABLE `terzeparti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipi`
--

DROP TABLE IF EXISTS `tipi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipi` (
  `cod_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_dato` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipi`
--

LOCK TABLES `tipi` WRITE;
/*!40000 ALTER TABLE `tipi` DISABLE KEYS */;
INSERT INTO `tipi` VALUES (1,'intero'),(2,'decimale'),(3,'stringa'),(4,'data'),(5,'ora');
/*!40000 ALTER TABLE `tipi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-16 17:54:30
