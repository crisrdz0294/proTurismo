-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bdturismo
-- ------------------------------------------------------
-- Server version	5.5.36

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
-- Table structure for table `tbhabitacion`
--

DROP TABLE IF EXISTS `tbhabitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbhabitacion` (
  `idhabitacion` int(11) NOT NULL AUTO_INCREMENT,
  `camahabitacion` varchar(25) DEFAULT NULL,
  `internethabitacion` varchar(25) NOT NULL,
  `cablehabitacion` varchar(30) NOT NULL,
  `aireacondicionadohabitacion` tinyint(1) NOT NULL,
  `serviciohabitacion` tinyint(1) NOT NULL,
  PRIMARY KEY (`idhabitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbhabitacion`
--

LOCK TABLES `tbhabitacion` WRITE;
/*!40000 ALTER TABLE `tbhabitacion` DISABLE KEYS */;
INSERT INTO `tbhabitacion` VALUES (1,'queen','no disponible','no disponible',0,0),(2,'deluxe','4mb-8mb','+150 canales',1,1);
/*!40000 ALTER TABLE `tbhabitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbrequisitos`
--

DROP TABLE IF EXISTS `tbrequisitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbrequisitos` (
  `idrequisitos` int(11) NOT NULL,
  `edadrequisitos` int(11) NOT NULL,
  `conocimientorequisitos` varchar(1000) NOT NULL,
  `equiporequisitos` varchar(1000) NOT NULL,
  `estadofisicorequisitos` varchar(1000) NOT NULL,
  `aptitudrequisitos` varchar(1000) NOT NULL,
  PRIMARY KEY (`idrequisitos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbrequisitos`
--

LOCK TABLES `tbrequisitos` WRITE;
/*!40000 ALTER TABLE `tbrequisitos` DISABLE KEYS */;
INSERT INTO `tbrequisitos` VALUES (1,34344343,'  Pocos y ala vez muchos','  Todosdaasdsad','Biendasdasdas','Ser un prosdadasasd');
/*!40000 ALTER TABLE `tbrequisitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbservicioalimentacion`
--

DROP TABLE IF EXISTS `tbservicioalimentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbservicioalimentacion` (
  `idalimentacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipoalimentacion` varchar(100) NOT NULL,
  `tiempocomidas` int(11) NOT NULL,
  `descripcionalimentacion` varchar(1000) NOT NULL,
  PRIMARY KEY (`idalimentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbservicioalimentacion`
--

LOCK TABLES `tbservicioalimentacion` WRITE;
/*!40000 ALTER TABLE `tbservicioalimentacion` DISABLE KEYS */;
INSERT INTO `tbservicioalimentacion` VALUES (1,'Vegana',1,'Soya');
/*!40000 ALTER TABLE `tbservicioalimentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbserviciotransporte`
--

DROP TABLE IF EXISTS `tbserviciotransporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbserviciotransporte` (
  `idserviciotransporte` int(11) NOT NULL AUTO_INCREMENT,
  `precioserviciotransporte` double NOT NULL,
  `lugarsalidaserviciotransporte` varchar(150) NOT NULL,
  `cantidadpersonasserviciotransporte` varchar(15) NOT NULL,
  PRIMARY KEY (`idserviciotransporte`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbserviciotransporte`
--

LOCK TABLES `tbserviciotransporte` WRITE;
/*!40000 ALTER TABLE `tbserviciotransporte` DISABLE KEYS */;
INSERT INTO `tbserviciotransporte` VALUES (2,344343,'5gasdsdasad','3'),(3,4,'fdsfds','1'),(4,4,'fdsdsfdsfdfs','2'),(5,44,'dsfdfsdfs','0');
/*!40000 ALTER TABLE `tbserviciotransporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtipoactividad`
--

DROP TABLE IF EXISTS `tbtipoactividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtipoactividad` (
  `idtipoactividad` int(11) NOT NULL AUTO_INCREMENT,
  `nombretipoactividad` varchar(75) NOT NULL,
  `descripciontipoactividad` varchar(1000) NOT NULL,
  `estadotipoactividad` tinyint(1) NOT NULL,
  PRIMARY KEY (`idtipoactividad`),
  UNIQUE KEY `idtipoactividad` (`idtipoactividad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtipoactividad`
--

LOCK TABLES `tbtipoactividad` WRITE;
/*!40000 ALTER TABLE `tbtipoactividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbtipoactividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtrabajocomunal`
--

DROP TABLE IF EXISTS `tbtrabajocomunal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtrabajocomunal` (
  `idtrabajocomunal` int(11) NOT NULL AUTO_INCREMENT,
  `nombretrabajocomunal` varchar(150) DEFAULT NULL,
  `descripciontrabajocomunal` varchar(1000) DEFAULT NULL,
  `actividadestrabajocomunal` varchar(2000) DEFAULT NULL,
  `requisitostrabajocomunal` varchar(500) DEFAULT NULL,
  `direcciontrabajocomunal` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idtrabajocomunal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtrabajocomunal`
--

LOCK TABLES `tbtrabajocomunal` WRITE;
/*!40000 ALTER TABLE `tbtrabajocomunal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbtrabajocomunal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-21 18:43:51
