-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2017 a las 21:47:35
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbestacionamieto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocheras`
--

CREATE TABLE `cocheras` (
  `numCochera` varchar(20) NOT NULL,
  `esDisca` varchar(20) NOT NULL,
  `ocupada` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `patente` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `hsingreso` int(50) NOT NULL,
  `fechaingreso` varchar(50) NOT NULL,
  `hssalida` int(50) NOT NULL,
  `empingreso` varchar(20) NOT NULL,
  `empsalida` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cocheras`
--

INSERT INTO `cocheras` (`numCochera`, `esDisca`, `ocupada`, `marca`, `patente`, `color`, `hsingreso`, `fechaingreso`, `hssalida`, `empingreso`, `empsalida`) VALUES
('1_3', 'si', 'si', 'asdfasdf', 'adfasdf', 'werfert', 19, '31/5/2017', 0, 'empleado1', ' '),
('3_1', 'si', 'si', 'asdfasdfdfvdfv', 'dvfvdv', 'ergeg', 19, '31/5/2017', 0, 'empleado1', ' '),
('2_2', 'no', 'si', 'dfdfg', 'dfdfd', 'fg', 21, '31/5/2017', 0, 'empleado1', ' ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `turno` varchar(20) DEFAULT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `rol`, `usuario`, `turno`, `clave`) VALUES
(2, 'admin', 'admin', 'noche', '1234'),
(3, 'empleado', 'empleado1', 'Mañana', '1234'),
(4, 'empleado', 'empleado2', 'Tarde', '1234'),
(5, 'empleado', 'empleado3', 'Noche', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
