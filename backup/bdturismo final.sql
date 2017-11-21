-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdturismo
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
-- Table structure for table `tbactividad`
--

DROP TABLE IF EXISTS `tbactividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbactividad` (
  `idactividad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreactividad` varchar(100) NOT NULL,
  `descripcionactividad` varchar(1000) NOT NULL,
  `estadoactividad` tinyint(1) NOT NULL,
  `cantidadpersonasactividad` int(11) NOT NULL,
  `lugaractividad` varchar(500) NOT NULL,
  `distanciahospedajeactividad` varchar(250) NOT NULL,
  `habilidadesactividad` varchar(1000) NOT NULL,
  `horarioactividad` varchar(2000) NOT NULL,
  `precioactividad` int(11) NOT NULL,
  `idsitioturistico` int(11) NOT NULL,
  `idtipoactividad` int(11) NOT NULL,
  PRIMARY KEY (`idactividad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbactividad`
--

LOCK TABLES `tbactividad` WRITE;
/*!40000 ALTER TABLE `tbactividad` DISABLE KEYS */;
INSERT INTO `tbactividad` VALUES (1,'ddddd','fddfd',1,333,'dfd','fdfddf','caminar,limpiar','dffddf',3333,1,1);
/*!40000 ALTER TABLE `tbactividad` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `tbcanton` VALUES (101,1,'San Jose'),(102,1,'Escazu'),(103,1,'Desamparados'),(104,1,'Puriscal'),(105,1,'Tarrazu'),(106,1,'Aserri'),(107,1,'Mora'),(108,1,'Goicoechea'),(109,1,'Santa Ana'),(110,1,'Alajuelita'),(111,1,'Vasquez de Coronado'),(112,1,'Acosta'),(113,1,'Tibas'),(114,1,'Moravia'),(115,1,'Montes de Oca'),(116,1,'Turrubares'),(117,1,'Dota'),(118,1,'Curridabat'),(119,1,'Perez Zeledon'),(120,1,'Leon Cortes'),(201,2,'Alajuela'),(202,2,'San Ramon'),(203,2,'Grecia'),(204,2,'San Mateo'),(205,2,'Atenas'),(206,2,'Naranjo'),(207,2,'Palmares'),(208,2,'Poas'),(209,2,'Orotina'),(210,2,'San Carlos'),(211,2,'Alfaro Ruiz'),(212,2,'Valverde Vega'),(213,2,'Upala'),(214,2,'Los Chiles'),(215,2,'Guatuso'),(301,3,'Cartago'),(302,3,'Paraiso'),(303,3,'La Union'),(304,3,'Jimenez'),(305,3,'Turrialba'),(306,3,'Alvarado'),(307,3,'Oreamuno'),(308,3,'El Guarco'),(401,4,'Heredia'),(402,4,'Barva'),(403,4,'Santo Domingo'),(404,4,'Santa Barbara'),(405,4,'San Rafael'),(406,4,'San Isidro'),(407,4,'Belen'),(408,4,'Flores'),(409,4,'San Pablo'),(410,4,'Sarapiqui '),(501,5,'Liberia'),(502,5,'Nicoya'),(503,5,'Santa Cruz'),(504,5,'Bagaces'),(505,5,'Carrillo'),(506,5,'Canas'),(507,5,'Abangares'),(508,5,'Tilaran'),(509,5,'Nandayure'),(510,5,'La Cruz'),(511,5,'Hojancha'),(601,6,'Puntarenas'),(602,6,'Esparza'),(603,6,'Buenos Aires'),(604,6,'Montes de Oro'),(605,6,'Osa'),(606,6,'Aguirre'),(607,6,'Golfito'),(608,6,'Coto Brus'),(609,6,'Parrita'),(610,6,'Corredores'),(611,6,'Garabito'),(701,7,'Limon'),(702,7,'Pococi'),(703,7,'Siquirres '),(704,7,'Talamanca'),(705,7,'Matina'),(706,7,'Guácimo');
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
) ENGINE=InnoDB AUTO_INCREMENT=70606 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbdistrito`
--

LOCK TABLES `tbdistrito` WRITE;
/*!40000 ALTER TABLE `tbdistrito` DISABLE KEYS */;
INSERT INTO `tbdistrito` VALUES (10101,101,'Carmen'),(10102,101,'Merced'),(10103,101,'Hospital'),(10104,101,'Catedral'),(10105,101,'Zapote'),(10106,101,'San Francisco de Dos Ríos'),(10107,101,'Uruca'),(10108,101,'Mata Redonda'),(10109,101,'Pavas'),(10110,101,'Hatillo'),(10111,101,'San Sebastián'),(10201,102,'Escazú'),(10202,102,'San Antonio'),(10203,102,'San Rafael'),(10301,103,'Desamparados'),(10302,103,'San Miguel'),(10303,103,'San Juan de Dios'),(10304,103,'San Rafael Arriba'),(10305,103,'San Antonio'),(10306,103,'Frailes'),(10307,103,'Patarrá'),(10308,103,'San Cristóbal'),(10309,103,'Rosario'),(10310,103,'Damas'),(10311,103,'San Rafael Abajo'),(10312,103,'Gravilias'),(10313,103,'Los Guido'),(10401,104,'Santiago'),(10402,104,'Mercedes Sur'),(10403,104,'Barbacoas'),(10404,104,'Grifo Alto'),(10405,104,'San Rafael'),(10406,104,'Candelaria'),(10407,104,'Desamparaditos'),(10408,104,'San Antonio'),(10409,104,'Chires'),(10501,105,'San Marcos'),(10502,105,'San Lorenzo'),(10503,105,'San Carlos'),(10601,106,'Aserrí'),(10602,106,'Tarbaca o Praga'),(10603,106,'Vuelta de Jorco'),(10604,106,'San Gabriel'),(10605,106,'La Legua'),(10606,106,'Monterrey'),(10607,106,'Salitrillos'),(10701,107,'Colón'),(10702,107,'Guayabo'),(10703,107,'Tabarcia'),(10704,107,'Piedras Negras'),(10705,107,'Picagres'),(10801,108,'Guadalupe'),(10802,108,'San Francisco'),(10803,108,'Calle Blancos'),(10804,108,'Mata de Plátano'),(10805,108,'Ipís'),(10806,108,'Rancho Redondo'),(10807,108,'Purral'),(10901,109,'Santa Ana'),(10902,109,'Salitral'),(10903,109,'Pozos o Concepción'),(10904,109,'Uruca o San Joaquín'),(10905,109,'Piedades'),(10906,109,'Brasil'),(11001,110,'Alajuelita'),(11002,110,'San Josecito'),(11003,110,'San Antonio'),(11004,110,'Concepción'),(11005,110,'San Felipe'),(11101,111,'San Isidro'),(11102,111,'San Rafael'),(11103,111,'Dulce Nombre de Jesús'),(11104,111,'Patalillo'),(11105,111,'Cascajal'),(11201,112,'San Ignacio'),(11202,112,'Guaitil'),(11203,112,'Palmichal'),(11204,112,'Cangrejal'),(11205,112,'Sabanillas'),(11301,113,'San Juan'),(11302,113,'Cinco Esquinas'),(11303,113,'Anselmo Llorente'),(11304,113,'León XIII'),(11305,113,'Colima'),(11401,114,'San Vicente'),(11402,114,'San Jerónimo'),(11403,114,'Trinidad'),(11501,115,'San Pedro'),(11502,115,'Sabanilla'),(11503,115,'Mercedes o Betania'),(11504,115,'San Rafael'),(11601,116,'San Pablo'),(11602,116,'San Pedro'),(11603,116,'San Juan de Mata'),(11604,116,'San Luis'),(11605,116,'Cárara'),(11701,117,'Santa María'),(11702,117,'Jardín'),(11703,117,'Copey'),(11801,118,'Curridabat'),(11802,118,'Granadilla'),(11803,118,'Sánchez'),(11804,118,'Tirrases'),(11901,119,'San Isidro de el General'),(11902,119,'General'),(11903,119,'Daniel Flores'),(11904,119,'Rivas'),(11905,119,'San Pedro'),(11906,119,'Platanares'),(11907,119,'Pejibaye'),(11908,119,'Cajón'),(11909,119,'Barú'),(11910,119,'Río Nuevo'),(11911,119,'Páramo'),(12001,120,'San Pablo'),(12002,120,'San Andrés'),(12003,120,'Llano Bonito'),(12004,120,'San Isidro'),(12005,120,'Santa Cruz'),(12006,120,'San Antonio'),(20101,201,'Alajuela'),(20102,201,'San José'),(20103,201,'Carrizal'),(20104,201,'San Antonio'),(20105,201,'Guácima'),(20106,201,'San Isidro'),(20107,201,'Sabanilla'),(20108,201,'San Rafael'),(20109,201,'Río Segundo'),(20110,201,'Desamparados'),(20111,201,'Turrucares'),(20112,201,'Tambor'),(20113,201,'La Garita'),(20114,201,'Sarapiquí'),(20201,202,'San Ramón'),(20202,202,'Santiago'),(20203,202,'San Juan'),(20204,202,'Piedades Norte'),(20205,202,'Piedades Sur'),(20206,202,'San Rafael'),(20207,202,'San Isidro'),(20208,202,'Angeles'),(20209,202,'Alfaro'),(20210,202,'Volio'),(20211,202,'Concepción'),(20212,202,'Zapotal'),(20213,202,'San Isidro de Peñas Blancas'),(20301,203,'Grecia'),(20302,203,'San Isidro'),(20303,203,'San José'),(20304,203,'San Roque'),(20305,203,'Tacares'),(20306,203,'Río Cuarto'),(20307,203,'Puente Piedra'),(20308,203,'Bolívar'),(20401,204,'San Mateo'),(20402,204,'Desmonte'),(20403,204,'Jesús María'),(20501,205,'Atenas'),(20502,205,'Jesús'),(20503,205,'Mercedes'),(20504,205,'San Isidro'),(20505,205,'Concepción'),(20506,205,'San José'),(20507,205,'Santa Eulalia'),(20508,205,'Escobal'),(20601,206,'Naranjo'),(20602,206,'San Miguel'),(20603,206,'San José'),(20604,206,'Cirrí Sur'),(20605,206,'San Jerónimo'),(20606,206,'San Juan'),(20607,206,'Rosario'),(20701,207,'Palmares'),(20702,207,'Zaragoza'),(20703,207,'Buenos Aires'),(20704,207,'Santiago'),(20705,207,'Candelaria'),(20706,207,'Esquipulas'),(20707,207,'La Granja'),(20801,208,'San Pedro'),(20802,208,'San Juan'),(20803,208,'San Rafael'),(20804,208,'Carrillos'),(20805,208,'Sabana Redonda'),(20901,209,'Orotina'),(20902,209,'Mastate'),(20903,209,'Hacienda Vieja'),(20904,209,'Coyolar'),(20905,209,'Ceiba'),(21001,210,'Quesada'),(21002,210,'Florencia'),(21003,210,'Buenavista'),(21004,210,'Aguas Zarcas'),(21005,210,'Venecia'),(21006,210,'Pital'),(21007,210,'Fortuna'),(21008,210,'Tigra'),(21009,210,'Palmera'),(21010,210,'Venado'),(21011,210,'Cutris'),(21012,210,'Monterrey'),(21013,210,'Pocosol'),(21101,211,'Zarcero'),(21102,211,'Laguna'),(21103,211,'Tapezco'),(21104,211,'Guadalupe'),(21105,211,'Palmira'),(21106,211,'Zapote'),(21107,211,'Las Brisas'),(21201,212,'Sarchí Norte'),(21202,212,'Sarchí Sur'),(21203,212,'Toro Amarillo'),(21204,212,'San Pedro'),(21205,212,'Rodríguez'),(21301,213,'Upala'),(21302,213,'Aguas Claras'),(21303,213,'San José o Pizote'),(21304,213,'Bijagua'),(21305,213,'Delicias'),(21306,213,'Dos Ríos'),(21307,213,'Yolillal'),(21401,214,'Los Chiles'),(21402,214,'Caño Negro'),(21403,214,'Amparo'),(21404,214,'San Jorge'),(21501,215,'San Rafael'),(21502,215,'Buenavista'),(21503,215,'Cote'),(30101,301,'Oriental'),(30102,301,'Occidental'),(30103,301,'Carmen'),(30104,301,'San Nicolás'),(30105,301,'Aguacaliente o San Francisco'),(30106,301,'Guadalupe o Arenilla'),(30107,301,'Corralillo'),(30108,301,'Tierra Blanca'),(30109,301,'Dulce Nombre'),(30110,301,'Llano Grande'),(30111,301,'Quebradilla'),(30201,302,'Paraíso'),(30202,302,'Santiago'),(30203,302,'Orosi'),(30204,302,'Cachí'),(30205,302,'Los Llanos de Santa Lucía'),(30301,303,'Tres Ríos'),(30302,303,'San Diego'),(30303,303,'San Juan'),(30304,303,'San Rafael'),(30305,303,'Concepción'),(30306,303,'Dulce Nombre'),(30307,303,'San Ramón'),(30308,303,'Río Azul'),(30401,304,'Juan Viñas'),(30402,304,'Tucurrique'),(30403,304,'Pejibaye'),(30501,305,'Turrialba'),(30502,305,'La Suiza'),(30503,305,'Peralta'),(30504,305,'Santa Cruz'),(30505,305,'Santa Teresita'),(30506,305,'Pavones'),(30507,305,'Tuis'),(30508,305,'Tayutic'),(30509,305,'Santa Rosa'),(30510,305,'Tres Equis'),(30511,305,'La Isabel'),(30512,305,'Chirripó'),(30601,306,'Pacayas'),(30602,306,'Cervantes'),(30603,306,'Capellades'),(30701,307,'San Rafael'),(30702,307,'Cot'),(30703,307,'Potrero Cerrado'),(30704,307,'Cipreses'),(30705,307,'Santa Rosa'),(30801,308,'El Tejar'),(30802,308,'San Isidro'),(30803,308,'Tobosi'),(30804,308,'Patio de Agua'),(40101,401,'Heredia'),(40102,401,'Mercedes'),(40103,401,'San Francisco'),(40104,401,'Ulloa'),(40105,401,'Varablanca'),(40201,402,'Barva'),(40202,402,'San Pedro'),(40203,402,'San Pablo'),(40204,402,'San Roque'),(40205,402,'Santa Lucía'),(40206,402,'San José de la Montaña'),(40301,403,'Santo Domingo'),(40302,403,'San Vicente'),(40303,403,'San Miguel'),(40304,403,'Paracito'),(40305,403,'Santo Tomás'),(40306,403,'Santa Rosa'),(40307,403,'Tures'),(40308,403,'Pará'),(40401,404,'Santa Bárbara'),(40402,404,'San Pedro'),(40403,404,'San Juan'),(40404,404,'Jesús'),(40405,404,'Santo Domingo del Roble'),(40406,404,'Puraba'),(40501,405,'San Rafael'),(40502,405,'San Josecito'),(40503,405,'Santiago'),(40504,405,'Angeles'),(40505,405,'Concepción'),(40601,406,'San Isidro'),(40602,406,'San José'),(40603,406,'Concepción'),(40604,406,'San Francisco'),(40701,407,'San Antonio'),(40702,407,'La Ribera'),(40703,407,'Asunción'),(40801,408,'San Joaquín'),(40802,408,'Barrantes'),(40803,408,'Llorente'),(40901,409,'San Pablo'),(41001,410,'Puerto Viejo'),(41002,410,'La Virgen'),(41003,410,'Horquetas'),(41004,410,'Llanuras de Gaspar'),(41005,410,'Cureña'),(50101,501,'Liberia'),(50102,501,'Cañas Dulces'),(50103,501,'Mayorga'),(50104,501,'Nacascolo'),(50105,501,'Curubande'),(50201,502,'Nicoya'),(50202,502,'Mansión'),(50203,502,'San Antonio'),(50204,502,'Quebrada Honda'),(50205,502,'Sámara'),(50206,502,'Nósara'),(50207,502,'Belén de Nosarita'),(50301,503,'Santa Cruz'),(50302,503,'Bolsón'),(50303,503,'Veintisiete de Abril'),(50304,503,'Tempate'),(50305,503,'Cartagena'),(50306,503,'Cuajiniquil'),(50307,503,'Diriá'),(50308,503,'Cabo Velas'),(50309,503,'Tamarindo'),(50401,504,'Bagaces'),(50402,504,'Fortuna'),(50403,504,'Mogote'),(50404,504,'Río Naranjo'),(50501,505,'Filadelfia'),(50502,505,'Palmira'),(50503,505,'Sardinal'),(50504,505,'Belén'),(50601,506,'Cañas'),(50602,506,'Palmira'),(50603,506,'San Miguel'),(50604,506,'Bebedero'),(50605,506,'Porozal'),(50701,507,'Juntas'),(50702,507,'Sierra'),(50703,507,'San Juan'),(50704,507,'Colorado'),(50801,508,'Tilarán'),(50802,508,'Quebrada Grande'),(50803,508,'Tronadora'),(50804,508,'Santa Rosa'),(50805,508,'Líbano'),(50806,508,'Tierras Morenas'),(50807,508,'Arenal'),(50901,509,'Carmona'),(50902,509,'Santa Rita'),(50903,509,'Zapotal'),(50904,509,'San Pablo'),(50905,509,'Porvenir'),(50906,509,'Bejuco'),(51001,510,'La Cruz'),(51002,510,'Santa Cecilia'),(51003,510,'Garita'),(51004,510,'Santa Elena'),(51101,511,'Hojancha'),(51102,511,'Monte Romo'),(51103,511,'Puerto Carrillo'),(51104,511,'Huacas'),(60101,601,'Puntarenas'),(60102,601,'Pitahaya'),(60103,601,'Chomes'),(60104,601,'Lepanto'),(60105,601,'Paquera'),(60106,601,'Manzanillo'),(60107,601,'Guacimal'),(60108,601,'Barranca'),(60109,601,'Monte Verde'),(60110,601,'Isla del Coco'),(60111,601,'Cóbano'),(60112,601,'Chacarita'),(60113,601,'Chira'),(60114,601,'Acapulco'),(60115,601,'Roble'),(60116,601,'Arancibia'),(60201,602,'Espíritu Santo'),(60202,602,'San Juan Grande'),(60203,602,'Macacona'),(60204,602,'San Rafael'),(60205,602,'San Jerónimo'),(60301,603,'Buenos Aires'),(60302,603,'Volcán'),(60303,603,'Potrero Grande'),(60304,603,'Boruca'),(60305,603,'Pilas'),(60306,603,'Colinas o Bajo de Maíz'),(60307,603,'Chánguena'),(60308,603,'Bioley'),(60309,603,'Brunka'),(60401,604,'Miramar'),(60402,604,'Unión'),(60403,604,'San Isidro'),(60501,605,'Puerto Cortés'),(60502,605,'Palmar'),(60503,605,'Sierpe'),(60504,605,'Bahía Ballena'),(60505,605,'Piedras Blancas'),(60601,606,'Quepos'),(60602,606,'Savegre'),(60603,606,'Naranjito'),(60701,607,'Golfito'),(60702,607,'Puerto Jiménez'),(60703,607,'Guaycará'),(60704,607,'Pavon'),(60801,608,'San Vito'),(60802,608,'Sabalito'),(60803,608,'Agua Buena'),(60804,608,'Limoncito'),(60805,608,'Pittier'),(60901,609,'Parrita'),(61001,610,'Corredor'),(61002,610,'La Cuesta'),(61003,610,'Paso Canoas'),(61004,610,'Laurel'),(61101,611,'Jacó'),(61102,611,'Tárcoles'),(70101,701,'Limón'),(70102,701,'Valle La Estrella'),(70103,701,'Río Blanco'),(70104,701,'Matama'),(70201,702,'Guápiles'),(70202,702,'Jiménez'),(70203,702,'Rita'),(70204,702,'Roxana'),(70205,702,'Cariari'),(70206,702,'Colorado'),(70301,703,'Siquirres'),(70302,703,'Pacuarito'),(70303,703,'Florida'),(70304,703,'Germania'),(70305,703,'Cairo'),(70306,703,'Alegría'),(70401,704,'Bratsi'),(70402,704,'Sixaola'),(70403,704,'Cahuita'),(70404,704,'Telire'),(70501,705,'Matina'),(70502,705,'Batán'),(70503,705,'Carrandí'),(70601,706,'Guácimo'),(70602,706,'Mercedes'),(70603,706,'Pocora'),(70604,706,'Río Jiménez'),(70605,706,'Duacarí');
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
  `adolescentesfamilia` int(11) NOT NULL,
  `ninosfamilia` int(11) NOT NULL,
  `idresponsable` int(11) NOT NULL,
  `idsitioturistico` int(11) NOT NULL,
  PRIMARY KEY (`idfamilia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbfamilia`
--

LOCK TABLES `tbfamilia` WRITE;
/*!40000 ALTER TABLE `tbfamilia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbfamilia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbmicroempresa`
--

DROP TABLE IF EXISTS `tbmicroempresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbmicroempresa` (
  `idmicroempresa` int(11) NOT NULL,
  `cedulajuridicamicroempresa` varchar(150) NOT NULL,
  `nombremicroempresa` varchar(200) NOT NULL,
  `contactotelefonomicroempresa` varchar(50) NOT NULL,
  `emailmicroempresa` varchar(75) NOT NULL,
  `sitiowebmicroempresa` varchar(100) DEFAULT NULL,
  `idsitioturistico` int(11) NOT NULL,
  `idresponsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbmicroempresa`
--

LOCK TABLES `tbmicroempresa` WRITE;
/*!40000 ALTER TABLE `tbmicroempresa` DISABLE KEYS */;
INSERT INTO `tbmicroempresa` VALUES (1,'1222222222','casa',' 11111111','wwww@gmail.com','www.hola.com',1,2),(2,'1222111111','sasa',' 22222222','dsddsdssdsdsdsd@gmail.com','www.hola.com',1,3);
/*!40000 ALTER TABLE `tbmicroempresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpaqueteturistico`
--

DROP TABLE IF EXISTS `tbpaqueteturistico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpaqueteturistico` (
  `idpaqueteturistico` int(11) NOT NULL AUTO_INCREMENT,
  `nombrepaqueteturistico` varchar(50) NOT NULL,
  `descripcionpaqueteturistico` varchar(1000) NOT NULL,
  `cantidadpersonaspaqueteturistico` int(11) NOT NULL,
  `itinerariopaqueteturistico` text NOT NULL,
  `preciopaqueteturistico` int(11) NOT NULL,
  PRIMARY KEY (`idpaqueteturistico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpaqueteturistico`
--

LOCK TABLES `tbpaqueteturistico` WRITE;
/*!40000 ALTER TABLE `tbpaqueteturistico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbpaqueteturistico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpaqueteturisticoactividad`
--

DROP TABLE IF EXISTS `tbpaqueteturisticoactividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpaqueteturisticoactividad` (
  `idpaqueteturistico` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpaqueteturisticoactividad`
--

LOCK TABLES `tbpaqueteturisticoactividad` WRITE;
/*!40000 ALTER TABLE `tbpaqueteturisticoactividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbpaqueteturisticoactividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbpaqueteturisticoservicio`
--

DROP TABLE IF EXISTS `tbpaqueteturisticoservicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbpaqueteturisticoservicio` (
  `idpaqueteturistico` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idtiposervicio` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbpaqueteturisticoservicio`
--

LOCK TABLES `tbpaqueteturisticoservicio` WRITE;
/*!40000 ALTER TABLE `tbpaqueteturisticoservicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbpaqueteturisticoservicio` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbprovincia`
--

LOCK TABLES `tbprovincia` WRITE;
/*!40000 ALTER TABLE `tbprovincia` DISABLE KEYS */;
INSERT INTO `tbprovincia` VALUES (1,'San Jose'),(2,'Alajuela'),(3,'Cartago'),(4,'Heredia'),(5,'Guanacaste'),(6,'Puntarenas'),(7,'Limon');
/*!40000 ALTER TABLE `tbprovincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbrequisitos`
--

DROP TABLE IF EXISTS `tbrequisitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbrequisitos` (
  `idrequisitos` int(11) NOT NULL AUTO_INCREMENT,
  `edadrequisitos` varchar(100) NOT NULL,
  `conocimientorequisitos` varchar(1000) NOT NULL,
  `equiporequisitos` varchar(1000) NOT NULL,
  `estadofisicorequisitos` varchar(1000) NOT NULL,
  `aptitudrequisitos` varchar(1000) NOT NULL,
  `idactividad` int(11) NOT NULL,
  PRIMARY KEY (`idrequisitos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbrequisitos`
--

LOCK TABLES `tbrequisitos` WRITE;
/*!40000 ALTER TABLE `tbrequisitos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbrequisitos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbresponsable`
--

DROP TABLE IF EXISTS `tbresponsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbresponsable` (
  `idresponsable` int(11) NOT NULL AUTO_INCREMENT,
  `cedularesponsable` varchar(50) NOT NULL,
  `nombreresponsable` varchar(50) NOT NULL,
  `primerapellidoresponsable` varchar(50) NOT NULL,
  `segundoapellidoresponsable` varchar(50) NOT NULL,
  `telefonoresponsable` varchar(50) NOT NULL,
  `emailresponsable` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`idresponsable`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbresponsable`
--

LOCK TABLES `tbresponsable` WRITE;
/*!40000 ALTER TABLE `tbresponsable` DISABLE KEYS */;
INSERT INTO `tbresponsable` VALUES (1,'444444444','vvvvv','44444','vvvv',' 44444444','cris@gmail.com'),(2,'ttrtrtrrtrtrt','rttttttttttt','rtttttttttt','trrrrrrrrr',' 55555555','cdcdf@gmail.com'),(3,'dasasdsss','dasasdsad','dsasadsda','asdsadsad',' 22222222','sasa@gmail.com'),(4,'11111111111','11111111111','1111111111','22222',' 11111111','mail@google.com');
/*!40000 ALTER TABLE `tbresponsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbruta`
--

DROP TABLE IF EXISTS `tbruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbruta` (
  `idservicio` int(11) NOT NULL,
  `latitudlugarsalida` float(10,6) NOT NULL,
  `longitudlugarsalida` float(10,6) NOT NULL,
  `latitudlugarllegada` float(10,6) NOT NULL,
  `longitudlugarllegada` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbruta`
--

LOCK TABLES `tbruta` WRITE;
/*!40000 ALTER TABLE `tbruta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbservicioalimentacion`
--

DROP TABLE IF EXISTS `tbservicioalimentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbservicioalimentacion` (
  `idservicioalimentacion` int(11) NOT NULL AUTO_INCREMENT,
  `tiemposservicioalimentacion` varchar(200) NOT NULL,
  `descripcionservicioalimentacion` varchar(1000) NOT NULL,
  `precioservicioalimentacion` varchar(100) NOT NULL,
  `adicionalesservicioalimentacion` varchar(1000) NOT NULL,
  `llevarservicioalimentacion` tinyint(1) NOT NULL,
  `idsitioturistico` int(11) NOT NULL,
  `imagenes` text NOT NULL,
  PRIMARY KEY (`idservicioalimentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbservicioalimentacion`
--

LOCK TABLES `tbservicioalimentacion` WRITE;
/*!40000 ALTER TABLE `tbservicioalimentacion` DISABLE KEYS */;
INSERT INTO `tbservicioalimentacion` VALUES (1,'Desayuno,Almuerzo,Cena','nnnn,csdsds,dsds','2222,3333,4444','fsdfdsfdsfdsfds',1,1,''),(2,'Desayuno,Cena','saas,saasas','2222,2222','sasasasa',1,1,'');
/*!40000 ALTER TABLE `tbservicioalimentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbserviciohospedaje`
--

DROP TABLE IF EXISTS `tbserviciohospedaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbserviciohospedaje` (
  `idserviciohospedaje` int(11) NOT NULL AUTO_INCREMENT,
  `tipocamaserviciohospedaje` varchar(30) NOT NULL,
  `internetserviciohospedaje` tinyint(1) NOT NULL,
  `cableserviciohospedaje` tinyint(1) NOT NULL,
  `aireacondicionadoserviciohospedaje` tinyint(1) NOT NULL,
  `ventiladorserviciohospedaje` tinyint(1) NOT NULL,
  `cantidadcamasserviciohospedaje` int(11) NOT NULL,
  `cantidadpersonasserviciohospedaje` int(11) NOT NULL,
  `vistaserviciohospedaje` varchar(1000) NOT NULL,
  `banosserviciohospedaje` varchar(100) NOT NULL,
  `accesibilidadserviciohospedaje` tinyint(1) NOT NULL,
  `numerocuartosserviciohospedaje` int(11) NOT NULL,
  `precioserviciohospedaje` int(11) NOT NULL,
  `idsitioturistico` int(11) NOT NULL,
  `imagenes` text NOT NULL,
  PRIMARY KEY (`idserviciohospedaje`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbserviciohospedaje`
--

LOCK TABLES `tbserviciohospedaje` WRITE;
/*!40000 ALTER TABLE `tbserviciohospedaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbserviciohospedaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbserviciotransporte`
--

DROP TABLE IF EXISTS `tbserviciotransporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbserviciotransporte` (
  `idserviciotransporte` int(11) NOT NULL AUTO_INCREMENT,
  `origenserviciotransporte` varchar(500) NOT NULL,
  `destinoserviciotransporte` varchar(500) NOT NULL,
  `kilometrosserviciotransporte` int(11) NOT NULL,
  `tipocarreteraserviciotransporte` varchar(50) NOT NULL,
  `tipovehiculoserviciotransporte` varchar(50) NOT NULL,
  `precioserviciotransporte` int(11) NOT NULL,
  `cantidadpersonasserviciotransporte` int(11) NOT NULL,
  `idsitioturistico` int(11) NOT NULL,
  `imagenes` int(11) NOT NULL,
  PRIMARY KEY (`idserviciotransporte`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbserviciotransporte`
--

LOCK TABLES `tbserviciotransporte` WRITE;
/*!40000 ALTER TABLE `tbserviciotransporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbserviciotransporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbsitioturistico`
--

DROP TABLE IF EXISTS `tbsitioturistico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbsitioturistico` (
  `idsitioturistico` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecomercialsitioturistico` varchar(250) NOT NULL,
  `telefonositioturistico` varchar(50) NOT NULL,
  `idprovinciasitioturistico` int(11) NOT NULL,
  `idcantonsitioturistico` int(11) NOT NULL,
  `iddistritositioturistico` int(11) NOT NULL,
  `direccionexactasitioturistico` varchar(1000) NOT NULL,
  `sitiowebsitioturistico` varchar(250) DEFAULT NULL,
  `imagenes` text NOT NULL,
  PRIMARY KEY (`idsitioturistico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbsitioturistico`
--

LOCK TABLES `tbsitioturistico` WRITE;
/*!40000 ALTER TABLE `tbsitioturistico` DISABLE KEYS */;
INSERT INTO `tbsitioturistico` VALUES (1,'Normal',' 85068297',2,205,20505,'normal direccion','www.sitio.com','');
/*!40000 ALTER TABLE `tbsitioturistico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtipoactividadturistica`
--

DROP TABLE IF EXISTS `tbtipoactividadturistica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtipoactividadturistica` (
  `idtipoactividadturistica` int(11) NOT NULL AUTO_INCREMENT,
  `nombretipoactividadturistica` varchar(30) NOT NULL,
  `descripciontipoactividadturistica` varchar(1000) NOT NULL,
  `estadotipoactividadturistica` tinyint(4) NOT NULL,
  PRIMARY KEY (`idtipoactividadturistica`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtipoactividadturistica`
--

LOCK TABLES `tbtipoactividadturistica` WRITE;
/*!40000 ALTER TABLE `tbtipoactividadturistica` DISABLE KEYS */;
INSERT INTO `tbtipoactividadturistica` VALUES (1,'Apicultura','descripcion',0),(2,'sasasasa','casamamaperro',1);
/*!40000 ALTER TABLE `tbtipoactividadturistica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtrabajocomunal`
--

DROP TABLE IF EXISTS `tbtrabajocomunal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtrabajocomunal` (
  `idtrabajocomunal` int(11) NOT NULL AUTO_INCREMENT,
  `nombretrabajocomunal` varchar(150) NOT NULL,
  `descripciontrabajocomunal` varchar(1000) NOT NULL,
  `actividadestrabajocomunal` varchar(2000) NOT NULL,
  `requisitostrabajocomunal` varchar(500) NOT NULL,
  `direcciontrabajocomunal` varchar(200) NOT NULL,
  `idsitioturistico` int(11) NOT NULL,
  PRIMARY KEY (`idtrabajocomunal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtrabajocomunal`
--

LOCK TABLES `tbtrabajocomunal` WRITE;
/*!40000 ALTER TABLE `tbtrabajocomunal` DISABLE KEYS */;
INSERT INTO `tbtrabajocomunal` VALUES (1,'Ayuda a las personas a salir adelante','hhhhh','hhhhh','hhhhh','hhhhh',1),(2,'saas','sasasa','assasa','sasasa','sasasa',1);
/*!40000 ALTER TABLE `tbtrabajocomunal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbusuario` (
  `cedulausuario` varchar(100) NOT NULL,
  `nombreusuario` varchar(100) NOT NULL,
  `apellidosusuario` varchar(300) NOT NULL,
  `tipousuario` varchar(100) NOT NULL,
  `claveusuario` varchar(100) NOT NULL,
  `correousuario` varchar(100) NOT NULL,
  PRIMARY KEY (`correousuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES ('702270570','Cristopher','Rodriguez','administrador','12345','admin@gmail.com'),('702430805','Steven','Cespedes','usuario','54321','usuario@gmail.com');
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-20 17:28:22
