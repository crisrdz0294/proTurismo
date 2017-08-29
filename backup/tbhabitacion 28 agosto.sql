-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2017 a las 08:51:01
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
-- Estructura de tabla para la tabla `tbhabitacion`
--

CREATE TABLE `tbhabitacion` (
  `idhabitacion` int(11) NOT NULL,
  `camahabitacion` varchar(25) DEFAULT NULL,
  `internethabitacion` tinyint(1) NOT NULL,
  `cablehabitacion` tinyint(1) NOT NULL,
  `aireacondicionadohabitacion` tinyint(1) NOT NULL,
  `ventiladorhabitacion` tinyint(4) NOT NULL DEFAULT '0',
  `cantidadcamashabitacion` int(11) NOT NULL,
  `cantidadpersonashabitacion` int(11) NOT NULL,
  `vistahabitacion` varchar(1000) NOT NULL,
  `banoshabitacion` tinyint(1) NOT NULL,
  `accesibilidadhabitacion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbhabitacion`
--

INSERT INTO `tbhabitacion` (`idhabitacion`, `camahabitacion`, `internethabitacion`, `cablehabitacion`, `aireacondicionadohabitacion`, `ventiladorhabitacion`, `cantidadcamashabitacion`, `cantidadpersonashabitacion`, `vistahabitacion`, `banoshabitacion`, `accesibilidadhabitacion`) VALUES
(1, 'camarote', 1, 1, 1, 0, 7, 1, '', 0, 0),
(2, 'individual', 1, 0, 0, 0, 33, 2, 'DSASDA', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbhabitacion`
--
ALTER TABLE `tbhabitacion`
  ADD PRIMARY KEY (`idhabitacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbhabitacion`
--
ALTER TABLE `tbhabitacion`
  MODIFY `idhabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
