-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2017 a las 22:35:33
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdturismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcanton`
--

CREATE TABLE `tbcanton` (
  `idcanton` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `nombrecanton` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcanton`
--

INSERT INTO `tbcanton` (`idcanton`, `idprovincia`, `nombrecanton`) VALUES
(1, 1, 'Pococi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdistrito`
--

CREATE TABLE `tbdistrito` (
  `iddistrito` int(11) NOT NULL,
  `idcanton` int(11) NOT NULL,
  `nombredistrito` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbdistrito`
--

INSERT INTO `tbdistrito` (`iddistrito`, `idcanton`, `nombredistrito`) VALUES
(1, 1, 'Guapiles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfamilia`
--

CREATE TABLE `tbfamilia` (
  `idfamilia` int(11) NOT NULL,
  `adultosmayoresfamilia` int(11) NOT NULL,
  `adultosfamilia` int(11) NOT NULL,
  `adolescentesfamilia` int(11) NOT NULL,
  `ninosfamilia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhabitacion`
--

CREATE TABLE `tbhabitacion` (
  `idhabitacion` int(11) NOT NULL,
  `camahabitacion` varchar(30) NOT NULL,
  `internethabitacion` tinyint(1) NOT NULL,
  `cablehabitacion` tinyint(1) NOT NULL,
  `aireacondicionadohabitacion` tinyint(1) NOT NULL,
  `ventiladorhabitacion` tinyint(1) NOT NULL,
  `cantidadcamashabitacion` mediumint(10) NOT NULL,
  `cantidadpersonashabitacion` mediumint(10) NOT NULL,
  `vistahabitacion` varchar(1000) NOT NULL,
  `banoshabitacion` tinyint(1) NOT NULL,
  `accesibilidadhabitacion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbprovincia`
--

CREATE TABLE `tbprovincia` (
  `idprovincia` int(11) NOT NULL,
  `nombreprovincia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbprovincia`
--

INSERT INTO `tbprovincia` (`idprovincia`, `nombreprovincia`) VALUES
(1, 'Limon'),
(2, 'San Jose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrequisitos`
--

CREATE TABLE `tbrequisitos` (
  `idrequisitos` int(11) NOT NULL,
  `edadrequisitos` int(11) NOT NULL,
  `conocimientorequisitos` varchar(1000) NOT NULL,
  `equiporequisitos` varchar(1000) NOT NULL,
  `estadofisicorequisitos` varchar(1000) NOT NULL,
  `aptitudrequisitos` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbrequisitos`
--

INSERT INTO `tbrequisitos` (`idrequisitos`, `edadrequisitos`, `conocimientorequisitos`, `equiporequisitos`, `estadofisicorequisitos`, `aptitudrequisitos`) VALUES
(2, 454, 'dfsdfsds', 'fdsdsffd', 'dfssssssss', 'fsddsffds');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbservicioalimentacion`
--

CREATE TABLE `tbservicioalimentacion` (
  `idservicioalimentacion` int(11) NOT NULL,
  `tiemposervicioalimentacion` varchar(50) NOT NULL,
  `descripcionservicioalimentacion` varchar(1000) NOT NULL,
  `precioservicioalimentacion` varchar(250) NOT NULL,
  `adicionalservicioalimentacion` varchar(500) NOT NULL,
  `llevarservicioalimentacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbservicioalimentacion`
--

INSERT INTO `tbservicioalimentacion` (`idservicioalimentacion`, `tiemposervicioalimentacion`, `descripcionservicioalimentacion`, `precioservicioalimentacion`, `adicionalservicioalimentacion`, `llevarservicioalimentacion`) VALUES
(1, 'tiempos', 'sdasad', 'dds3333', 'dsasda', 'dsasaddas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbserviciotransporte`
--

CREATE TABLE `tbserviciotransporte` (
  `idserviciotransporte` int(11) NOT NULL,
  `origenserviciotransporte` varchar(500) NOT NULL,
  `destinoserviciotransporte` varchar(500) NOT NULL,
  `kilometroserviciotransporte` int(11) NOT NULL,
  `tipocarreteraserviciotransporte` varchar(50) NOT NULL,
  `tipovehiculoserviciotransporte` varchar(50) NOT NULL,
  `precioserviciotransporte` int(11) NOT NULL,
  `cantidadpersonasserviciotransporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbserviciotransporte`
--

INSERT INTO `tbserviciotransporte` (`idserviciotransporte`, `origenserviciotransporte`, `destinoserviciotransporte`, `kilometroserviciotransporte`, `tipocarreteraserviciotransporte`, `tipovehiculoserviciotransporte`, `precioserviciotransporte`, `cantidadpersonasserviciotransporte`) VALUES
(1, 'casa', 'casa2', 2222, 'ddassda', 'sadsadsad', 222, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsitioturistico`
--

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
  `idtrabajocomunal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoactividad`
--

CREATE TABLE `tbtipoactividad` (
  `idtipoactividad` int(11) NOT NULL,
  `nombretipoactividad` varchar(75) NOT NULL,
  `descripciontipoactividad` varchar(1000) NOT NULL,
  `estadotipoactividad` tinyint(1) NOT NULL,
  `cantidadpersonastipoctividad` int(11) NOT NULL,
  `lugartipoactividad` varchar(500) NOT NULL,
  `distanciahospedajetipoactividad` varchar(100) NOT NULL,
  `habilidadestipoactividad` varchar(1000) NOT NULL,
  `horariotipoactividad` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipoactividad`
--

INSERT INTO `tbtipoactividad` (`idtipoactividad`, `nombretipoactividad`, `descripciontipoactividad`, `estadotipoactividad`, `cantidadpersonastipoctividad`, `lugartipoactividad`, `distanciahospedajetipoactividad`, `habilidadestipoactividad`, `horariotipoactividad`) VALUES
(1, 'caminatas', 'caminar bien', 0, 50, 'montaÃ±a rio frio', '100 kilometros', 'caminar,jugar', 'de 7am a 9 am');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtrabajocomunal`
--

CREATE TABLE `tbtrabajocomunal` (
  `idtrabajocomunal` int(11) NOT NULL,
  `nombretrabajocomunal` varchar(150) DEFAULT NULL,
  `descripciontrabajocomunal` varchar(1000) DEFAULT NULL,
  `actividadestrabajocomunal` varchar(2000) DEFAULT NULL,
  `requisitostrabajocomunal` varchar(500) DEFAULT NULL,
  `direcciontrabajocomunal` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtrabajocomunal`
--

INSERT INTO `tbtrabajocomunal` (`idtrabajocomunal`, `nombretrabajocomunal`, `descripciontrabajocomunal`, `actividadestrabajocomunal`, `requisitostrabajocomunal`, `direcciontrabajocomunal`) VALUES
(1, 'dssadsda', 'dsadassda', 'dassad', 'dsaasd', 'dsasda');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcanton`
--
ALTER TABLE `tbcanton`
  ADD PRIMARY KEY (`idcanton`),
  ADD KEY `idprovincia` (`idprovincia`);

--
-- Indices de la tabla `tbdistrito`
--
ALTER TABLE `tbdistrito`
  ADD PRIMARY KEY (`iddistrito`),
  ADD KEY `idcanton` (`idcanton`);

--
-- Indices de la tabla `tbfamilia`
--
ALTER TABLE `tbfamilia`
  ADD PRIMARY KEY (`idfamilia`);

--
-- Indices de la tabla `tbhabitacion`
--
ALTER TABLE `tbhabitacion`
  ADD PRIMARY KEY (`idhabitacion`);

--
-- Indices de la tabla `tbprovincia`
--
ALTER TABLE `tbprovincia`
  ADD PRIMARY KEY (`idprovincia`);

--
-- Indices de la tabla `tbrequisitos`
--
ALTER TABLE `tbrequisitos`
  ADD PRIMARY KEY (`idrequisitos`);

--
-- Indices de la tabla `tbservicioalimentacion`
--
ALTER TABLE `tbservicioalimentacion`
  ADD PRIMARY KEY (`idservicioalimentacion`);

--
-- Indices de la tabla `tbserviciotransporte`
--
ALTER TABLE `tbserviciotransporte`
  ADD PRIMARY KEY (`idserviciotransporte`);

--
-- Indices de la tabla `tbsitioturistico`
--
ALTER TABLE `tbsitioturistico`
  ADD PRIMARY KEY (`idsitioturistico`),
  ADD KEY `idprovincia` (`idprovincia`),
  ADD KEY `idcanton` (`idcanton`),
  ADD KEY `iddistrito` (`iddistrito`),
  ADD KEY `idactividadturistica` (`idactividadturistica`),
  ADD KEY `idservicioalimentacion` (`idservicioalimentacion`),
  ADD KEY `idserviciohospedaje` (`idserviciohospedaje`),
  ADD KEY `idserviciotransporte` (`idserviciotransporte`),
  ADD KEY `idtrabajocomunal` (`idtrabajocomunal`);

--
-- Indices de la tabla `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  ADD PRIMARY KEY (`idtipoactividad`),
  ADD UNIQUE KEY `idtipoactividad` (`idtipoactividad`);

--
-- Indices de la tabla `tbtrabajocomunal`
--
ALTER TABLE `tbtrabajocomunal`
  ADD PRIMARY KEY (`idtrabajocomunal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbdistrito`
--
ALTER TABLE `tbdistrito`
  MODIFY `iddistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbfamilia`
--
ALTER TABLE `tbfamilia`
  MODIFY `idfamilia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbhabitacion`
--
ALTER TABLE `tbhabitacion`
  MODIFY `idhabitacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbprovincia`
--
ALTER TABLE `tbprovincia`
  MODIFY `idprovincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbservicioalimentacion`
--
ALTER TABLE `tbservicioalimentacion`
  MODIFY `idservicioalimentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbserviciotransporte`
--
ALTER TABLE `tbserviciotransporte`
  MODIFY `idserviciotransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbtipoactividad`
--
ALTER TABLE `tbtipoactividad`
  MODIFY `idtipoactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbtrabajocomunal`
--
ALTER TABLE `tbtrabajocomunal`
  MODIFY `idtrabajocomunal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbcanton`
--
ALTER TABLE `tbcanton`
  ADD CONSTRAINT `fk_provincia` FOREIGN KEY (`idprovincia`) REFERENCES `tbprovincia` (`idprovincia`),
  ADD CONSTRAINT `tbcanton_ibfk_1` FOREIGN KEY (`idprovincia`) REFERENCES `tbprovincia` (`idprovincia`);

--
-- Filtros para la tabla `tbdistrito`
--
ALTER TABLE `tbdistrito`
  ADD CONSTRAINT `tbdistrito_ibfk_1` FOREIGN KEY (`idcanton`) REFERENCES `tbcanton` (`idcanton`);

--
-- Filtros para la tabla `tbsitioturistico`
--
ALTER TABLE `tbsitioturistico`
  ADD CONSTRAINT `tbsitioturistico_ibfk_1` FOREIGN KEY (`idprovincia`) REFERENCES `tbprovincia` (`idprovincia`),
  ADD CONSTRAINT `tbsitioturistico_ibfk_2` FOREIGN KEY (`idcanton`) REFERENCES `tbcanton` (`idcanton`),
  ADD CONSTRAINT `tbsitioturistico_ibfk_3` FOREIGN KEY (`iddistrito`) REFERENCES `tbdistrito` (`iddistrito`),
  ADD CONSTRAINT `tbsitioturistico_ibfk_4` FOREIGN KEY (`idactividadturistica`) REFERENCES `tbtipoactividad` (`idtipoactividad`),
  ADD CONSTRAINT `tbsitioturistico_ibfk_5` FOREIGN KEY (`idservicioalimentacion`) REFERENCES `tbservicioalimentacion` (`idservicioalimentacion`),
  ADD CONSTRAINT `tbsitioturistico_ibfk_6` FOREIGN KEY (`idserviciohospedaje`) REFERENCES `tbhabitacion` (`idhabitacion`),
  ADD CONSTRAINT `tbsitioturistico_ibfk_7` FOREIGN KEY (`idserviciotransporte`) REFERENCES `tbserviciotransporte` (`idserviciotransporte`),
  ADD CONSTRAINT `tbsitioturistico_ibfk_8` FOREIGN KEY (`idtrabajocomunal`) REFERENCES `tbtrabajocomunal` (`idtrabajocomunal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
