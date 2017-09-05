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
-- Table structure for table `tbcanton`
--

DROP TABLE IF EXISTS `tbcanton`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcanton` (
  `idcanton` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `nombrecanton` varchar(100) NOT NULL,
  PRIMARY KEY (`idcanton`),
  KEY `idprovincia` (`idprovincia`),
  CONSTRAINT `fk_provincia` FOREIGN KEY (`idprovincia`) REFERENCES `tbprovincia` (`idprovincia`),
  CONSTRAINT `tbcanton_ibfk_1` FOREIGN KEY (`idprovincia`) REFERENCES `tbprovincia` (`idprovincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcanton`
--

LOCK TABLES `tbcanton` WRITE;
/*!40000 ALTER TABLE `tbcanton` DISABLE KEYS */;
INSERT INTO `tbcanton` VALUES (1,1,'Pococi');
/*!40000 ALTER TABLE `tbcanton` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbdistrito`
--

DROP TABLE IF EXISTS `tbdistrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbdistrito` (
  `iddistrito` int(11) NOT NULL AUTO_INCREMENT,
  `idcanton` int(11) NOT NULL,
  `nombredistrito` varchar(100) NOT NULL,
  PRIMARY KEY (`iddistrito`),
  KEY `idcanton` (`idcanton`),
  CONSTRAINT `tbdistrito_ibfk_1` FOREIGN KEY (`idcanton`) REFERENCES `tbcanton` (`idcanton`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbdistrito`
--

LOCK TABLES `tbdistrito` WRITE;
/*!40000 ALTER TABLE `tbdistrito` DISABLE KEYS */;
INSERT INTO `tbdistrito` VALUES (1,1,'Guapiles');
/*!40000 ALTER TABLE `tbdistrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbfamilia`
--

DROP TABLE IF EXISTS `tbfamilia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbfamilia` (
  `idfamilia` int(11) NOT NULL AUTO_INCREMENT,
  `adultosmayoresfamilia` int(11) NOT NULL,
  `adultosfamilia` int(11) NOT NULL,
  `adolecentesfamilia` int(11) NOT NULL,
  `ninosfamilia` int(11) NOT NULL,
  PRIMARY KEY (`idfamilia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbfamilia`
--

LOCK TABLES `tbfamilia` WRITE;
/*!40000 ALTER TABLE `tbfamilia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbfamilia` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbhabitacion`
--

LOCK TABLES `tbhabitacion` WRITE;
/*!40000 ALTER TABLE `tbhabitacion` DISABLE KEYS */;
INSERT INTO `tbhabitacion` VALUES (2,'deluxe','4mb-8mb','+150 canales',1,1),(3,'individual','no disponible','no disponible',0,0);
/*!40000 ALTER TABLE `tbhabitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbprovincia`
--

DROP TABLE IF EXISTS `tbprovincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbprovincia` (
  `idprovincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombreprovincia` varchar(100) NOT NULL,
  PRIMARY KEY (`idprovincia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbprovincia`
--

LOCK TABLES `tbprovincia` WRITE;
/*!40000 ALTER TABLE `tbprovincia` DISABLE KEYS */;
INSERT INTO `tbprovincia` VALUES (1,'Limon'),(2,'San Jose');
/*!40000 ALTER TABLE `tbprovincia` ENABLE KEYS */;
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
INSERT INTO `tbrequisitos` VALUES (2,454,'dfsdfsds','fdsdsffd','dfssssssss','fsddsffds');
/*!40000 ALTER TABLE `tbrequisitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbserviciodealimentacion`
--

DROP TABLE IF EXISTS `tbserviciodealimentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbserviciodealimentacion` (
  `idalimentacion` int(11) NOT NULL AUTO_INCREMENT,
  `tiempocomidas` varchar(50) NOT NULL,
  `descripcionalimentacion` varchar(1000) NOT NULL,
  `precio` varchar(250) NOT NULL,
  `adicionales` varchar(500) NOT NULL,
  `alimentacionllevar` varchar(10) NOT NULL,
  PRIMARY KEY (`idalimentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbserviciodealimentacion`
--

LOCK TABLES `tbserviciodealimentacion` WRITE;
/*!40000 ALTER TABLE `tbserviciodealimentacion` DISABLE KEYS */;
INSERT INTO `tbserviciodealimentacion` VALUES (1,'tiempos','sdasad','dds3333','dsasda','dsasaddas');
/*!40000 ALTER TABLE `tbserviciodealimentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbserviciotrasporte`
--

DROP TABLE IF EXISTS `tbserviciotrasporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbserviciotrasporte` (
  `idserviciotransporte` int(11) NOT NULL AUTO_INCREMENT,
  `origen` varchar(500) NOT NULL,
  `destino` varchar(500) NOT NULL,
  `kilometros` int(11) NOT NULL,
  `tipocarretera` varchar(50) NOT NULL,
  `tipovehiculo` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidadpersonas` int(11) NOT NULL,
  PRIMARY KEY (`idserviciotransporte`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbserviciotrasporte`
--

LOCK TABLES `tbserviciotrasporte` WRITE;
/*!40000 ALTER TABLE `tbserviciotrasporte` DISABLE KEYS */;
INSERT INTO `tbserviciotrasporte` VALUES (1,'casa','casa2',2222,'ddassda','sadsadsad',222,22);
/*!40000 ALTER TABLE `tbserviciotrasporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbsitioturistico`
--

DROP TABLE IF EXISTS `tbsitioturistico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbsitioturistico` (
  `idsitioturistico` int(11) NOT NULL,
  `nombrecomercial` varchar(250) NOT NULL,
  `nombreresponsable` varchar(50) NOT NULL,
  `telefonositio` varchar(50) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idcanton` int(11) NOT NULL,
  `iddistrito` int(11) NOT NULL,
  `direccionexacta` varchar(1000) NOT NULL,
  `idactividadturistica` int(11) NOT NULL,
  `idservicioalimentacion` int(11) NOT NULL,
  `idserviciohospedaje` int(11) NOT NULL,
  `idserviciotransporte` int(11) NOT NULL,
  `idtrabajocomunal` int(11) NOT NULL,
  PRIMARY KEY (`idsitioturistico`),
  KEY `idprovincia` (`idprovincia`),
  KEY `idcanton` (`idcanton`),
  KEY `iddistrito` (`iddistrito`),
  KEY `idactividadturistica` (`idactividadturistica`),
  KEY `idservicioalimentacion` (`idservicioalimentacion`),
  KEY `idserviciohospedaje` (`idserviciohospedaje`),
  KEY `idserviciotransporte` (`idserviciotransporte`),
  KEY `idtrabajocomunal` (`idtrabajocomunal`),
  CONSTRAINT `tbsitioturistico_ibfk_1` FOREIGN KEY (`idprovincia`) REFERENCES `tbprovincia` (`idprovincia`),
  CONSTRAINT `tbsitioturistico_ibfk_2` FOREIGN KEY (`idcanton`) REFERENCES `tbcanton` (`idcanton`),
  CONSTRAINT `tbsitioturistico_ibfk_3` FOREIGN KEY (`iddistrito`) REFERENCES `tbdistrito` (`iddistrito`),
  CONSTRAINT `tbsitioturistico_ibfk_4` FOREIGN KEY (`idactividadturistica`) REFERENCES `tbtipoactividad` (`idtipoactividad`),
  CONSTRAINT `tbsitioturistico_ibfk_5` FOREIGN KEY (`idservicioalimentacion`) REFERENCES `tbserviciodealimentacion` (`idalimentacion`),
  CONSTRAINT `tbsitioturistico_ibfk_6` FOREIGN KEY (`idserviciohospedaje`) REFERENCES `tbhabitacion` (`idhabitacion`),
  CONSTRAINT `tbsitioturistico_ibfk_7` FOREIGN KEY (`idserviciotransporte`) REFERENCES `tbserviciotrasporte` (`idserviciotransporte`),
  CONSTRAINT `tbsitioturistico_ibfk_8` FOREIGN KEY (`idtrabajocomunal`) REFERENCES `tbtrabajocomunal` (`idtrabajocomunal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbsitioturistico`
--

LOCK TABLES `tbsitioturistico` WRITE;
/*!40000 ALTER TABLE `tbsitioturistico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbsitioturistico` ENABLE KEYS */;
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
  `cantidadpersonas` int(11) NOT NULL,
  `lugaractividad` varchar(500) NOT NULL,
  `distanciahospedaje` varchar(100) NOT NULL,
  `habilidadesactividad` varchar(1000) NOT NULL,
  `horarioactividad` varchar(2000) NOT NULL,
  PRIMARY KEY (`idtipoactividad`),
  UNIQUE KEY `idtipoactividad` (`idtipoactividad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtipoactividad`
--

LOCK TABLES `tbtipoactividad` WRITE;
/*!40000 ALTER TABLE `tbtipoactividad` DISABLE KEYS */;
INSERT INTO `tbtipoactividad` VALUES (1,'caminatas','caminar bien',0,50,'montaÃ±a rio frio','100 kilometros','caminar,jugar','de 7am a 9 am');
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
INSERT INTO `tbtrabajocomunal` VALUES (1,'dssadsda','dsadassda','dassad','dsaasd','dsasda');
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

-- Dump completed on 2017-08-29  2:43:53
