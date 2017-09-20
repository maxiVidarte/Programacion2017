-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2017 a las 03:06:24
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `utn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `NUMERO` int(18) NOT NULL,
  `PNUMERO` int(18) NOT NULL,
  `CANTIDAD` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`NUMERO`, `PNUMERO`, `CANTIDAD`) VALUES
(100, 1, 500),
(100, 2, 1500),
(100, 3, 100),
(101, 2, 55),
(101, 3, 225),
(102, 1, 600),
(102, 3, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `PNUMERO` int(18) NOT NULL,
  `PNOMBRE` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `PRECIO` float NOT NULL,
  `TAMAÑO` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`PNUMERO`, `PNOMBRE`, `PRECIO`, `TAMAÑO`) VALUES
(1, 'CARAMELOS', 1.5, 'CHICO'),
(2, 'CIGARRILLOS', 45.89, 'MEDIANO'),
(3, 'GASEOSA', 15.8, 'GRANDE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `NUMERO` int(18) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DOMICILIO` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `LOCALIDAD` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`NUMERO`, `NOMBRE`, `DOMICILIO`, `LOCALIDAD`) VALUES
(100, 'PEREZ', 'PERON 876', 'QUILMES'),
(101, 'GIMENEZ', 'MITRE 750', 'AVELLANEDA'),
(102, 'AGUIRRE', 'BOEDO 634', 'BERNAL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`NUMERO`,`PNUMERO`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`PNUMERO`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`NUMERO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
