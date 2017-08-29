-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2017 a las 08:51:19
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
-- Estructura de tabla para la tabla `tbfamilia`
--

CREATE TABLE `tbfamilia` (
  `idfamilia` int(11) NOT NULL,
  `adultosmayoresfamilia` int(11) NOT NULL,
  `adultosfamilia` int(11) NOT NULL,
  `adolecentesfamilia` int(11) NOT NULL,
  `ninosfamilia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfamilia`
--

INSERT INTO `tbfamilia` (`idfamilia`, `adultosmayoresfamilia`, `adultosfamilia`, `adolecentesfamilia`, `ninosfamilia`) VALUES
(1, 1, 1, 3, 2),
(2, 1, 1, 2, 2),
(3, 4, 3, 2, 3),
(4, 1, 1, 1, 2),
(5, 1, 1, 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbfamilia`
--
ALTER TABLE `tbfamilia`
  ADD PRIMARY KEY (`idfamilia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbfamilia`
--
ALTER TABLE `tbfamilia`
  MODIFY `idfamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
