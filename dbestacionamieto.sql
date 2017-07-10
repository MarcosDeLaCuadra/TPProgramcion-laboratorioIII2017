-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2017 a las 05:21:28
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

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
  `id` int(50) NOT NULL,
  `numCochera` varchar(20) NOT NULL,
  `esDisca` varchar(20) NOT NULL,
  `ocupada` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `patente` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `hsingreso` varchar(50) NOT NULL,
  `fechaingreso` date NOT NULL,
  `empingreso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cocheras`
--

INSERT INTO `cocheras` (`id`, `numCochera`, `esDisca`, `ocupada`, `marca`, `patente`, `color`, `hsingreso`, `fechaingreso`, `empingreso`) VALUES
(118, '2_2', 'no', 'si', 'bmw', 'test', 'verde', '05:39', '2017-07-08', 'empleado1'),
(119, '3_3', 'no', 'si', 'dos', 'dos', 'dos', '05:39', '2017-07-08', 'empleado1'),
(120, '3_1', 'si', 'si', 'asd', 'asd', 'asd', '06:05', '2017-07-08', 'empleado1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `turno` varchar(20) DEFAULT NULL,
  `clave` varchar(20) NOT NULL,
  `suspendido` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `rol`, `usuario`, `turno`, `clave`, `suspendido`) VALUES
(2, 'admin', 'admin', 'noche', '1234', 'no'),
(3, 'empleado', 'empleado1', 'Mañana', '1234', 'no'),
(4, 'empleado', 'empleado2', 'Tarde', '1234', 'no'),
(5, 'empleado', 'empleado3', 'Noche', '1234', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `numCochera` varchar(20) NOT NULL,
  `esDisca` varchar(20) NOT NULL,
  `ocupada` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `patente` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `hsingreso` varchar(30) NOT NULL,
  `fechaingreso` date NOT NULL,
  `empingreso` varchar(30) NOT NULL,
  `hssalida` varchar(30) NOT NULL,
  `empsalida` varchar(30) NOT NULL,
  `fechasalida` date NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`numCochera`, `esDisca`, `ocupada`, `marca`, `patente`, `color`, `hsingreso`, `fechaingreso`, `empingreso`, `hssalida`, `empsalida`, `fechasalida`, `importe`) VALUES
('1_1', 'si', 'si', 'coche1', 'coche1', 'coche1', '06:54', '2017-07-09', 'empleado2', '06:54', 'empleado2', '2017-07-03', 0),
('1_2', 'si', 'si', 'coche2', 'coche2', 'coche2', '06:54', '2017-07-03', 'empleado2', '06:54', 'empleado2', '2017-07-03', 0),
('1_3', 'si', 'si', 'coche3', 'coche3', 'coche3', '06:54', '2017-07-03', 'empleado2', '06:55', 'empleado2', '2017-07-03', 0),
('1_3', 'no', 'si', 'token', 'token', 'token', '04:59', '2017-07-07', '', '05:08', '', '2017-07-07', 10),
('1_1', 'si', 'si', 'asd', 'asd', 'asd', '20:36', '2017-07-07', 'empleado1', '21:25', '', '2017-07-07', 10),
('1_3', 'si', 'si', 'asd', 'asds', 'asd', '20:34', '2017-07-07', 'empleado1', '21:37', '', '2017-07-07', 10),
('2_3', 'si', 'si', 'asd', 'asdsasd', 'asd', '20:36', '2017-07-07', 'empleado1', '21:37', '', '2017-07-07', 10),
('1_1', 'si', 'si', 'asdasdasd', 'asd', 'asd', '21:38', '2017-07-07', 'empleado1', '21:38', 'empleado1', '2017-07-07', 0),
('1_1', 'si', 'si', 'lolo', 'lolo', 'lolo', '21:43', '2017-07-07', 'empleado1', '21:43', 'empleado1', '2017-07-07', 0),
('2_2', 'si', 'si', 'lolo', 'lolo', 'lolo', '21:43', '2017-07-07', 'empleado1', '21:43', 'empleado1', '2017-07-07', 0),
('1_1', 'si', 'si', 'asd', 'asds', 'asd', '21:45', '2017-07-07', 'empleado1', '21:45', 'empleado1', '2017-07-07', 0),
('2_2', 'no', 'si', 'j', 'j', 'j', '21:48', '2017-07-07', 'empleado1', '21:48', 'empleado1', '2017-07-07', 0),
('3_1', 'si', 'si', 'lp', 'lp', 'lp', '22:00', '2017-07-07', 'empleado1', '22:00', 'empleado1', '2017-07-07', 0),
('2_3', 'no', 'si', 'f', 'f', 'f', '22:01', '2017-07-07', 'empleado1', '22:01', 'empleado1', '2017-07-07', 0),
('3_2', 'no', 'si', 'l', 'l', 'l', '22:04', '2017-07-07', 'empleado1', '22:04', 'empleado1', '2017-07-07', 0),
('2_1', 'si', 'si', 'u', 'u', 'u', '22:10', '2017-07-07', 'empleado1', '22:10', 'empleado1', '2017-07-07', 0),
('1_1', 'si', 'si', 'lolo', 'lolo', 'lolo', '04:48', '2017-07-08', 'empleado1', '04:48', '', '2017-07-08', 0),
('1_1', 'si', 'si', 'lolo', 'lolo', 'lolo', '04:49', '2017-07-08', 'empleado1', '04:49', 'empleado1', '2017-07-08', 0),
('1_1', 'si', 'si', 'asd', 'asd', 'asd', '04:54', '2017-07-08', 'empleado1', '04:54', 'empleado1', '2017-07-08', 0),
('3_2', 'no', 'si', 'k', 'k', 'k', '04:55', '2017-07-08', 'empleado1', '04:55', 'empleado1', '2017-07-08', 0),
('3_2', 'no', 'si', 'o', 'o', 'o', '04:57', '2017-07-08', 'empleado1', '04:57', 'empleado1', '2017-07-08', 0),
('1_3', 'no', 'si', 'lp', 'lp', 'lp', '04:58', '2017-07-08', 'empleado1', '04:58', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 'pepe', 'pepe', 'pepe', '04:59', '2017-07-08', 'empleado1', '04:59', 'empleado1', '2017-07-08', 0),
('2_2', 'no', 'si', 'y', 'y', 'y', '05:01', '2017-07-08', 'empleado1', '05:01', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 'sa', 'sa', 'sa', '05:02', '2017-07-08', 'empleado1', '05:02', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 't', 't', 't', '05:03', '2017-07-08', 'empleado1', '05:04', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 'tr', 'tr', 'tr', '05:07', '2017-07-08', 'empleado1', '05:07', 'empleado1', '2017-07-08', 0),
('2_3', 'si', 'si', 'fg', 'fg', 'fg', '05:11', '2017-07-08', 'empleado1', '05:11', 'empleado1', '2017-07-08', 0),
('1_3', 'no', 'si', 'rt', 'rt', 'rt', '05:12', '2017-07-08', 'empleado1', '05:12', 'empleado1', '2017-07-08', 0),
('2_2', 'no', 'si', 'rrrr', 'rrrr', 'rrr', '05:14', '2017-07-08', 'empleado1', '05:14', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 'j', 'j', 'j', '05:17', '2017-07-08', 'empleado1', '05:17', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 'salsa', 'salsa', 'salsa', '05:20', '2017-07-08', 'empleado1', '05:20', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 'salsa', 'rt', 'v', '05:20', '2017-07-08', 'empleado1', '05:21', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 'g', 'g', 'g', '05:22', '2017-07-08', 'empleado1', '05:22', 'empleado1', '2017-07-08', 0),
('1_3', 'no', 'si', 'tu', 'tu', 'tu', '05:24', '2017-07-08', 'empleado1', '05:24', 'empleado1', '2017-07-08', 0),
('2_3', 'no', 'si', 'da', 'da', 'da', '05:25', '2017-07-08', 'empleado1', '05:25', 'empleado1', '2017-07-08', 0),
('1_2', 'no', 'si', 'batman', 'batman', 'batman', '05:28', '2017-07-08', 'empleado1', '05:28', 'empleado1', '2017-07-08', 0),
('1_1', 'si', 'si', 'diego', 'diego', 'diego', '05:28', '2017-07-08', 'empleado1', '05:29', '', '2017-07-08', 0),
('1_1', 'si', 'si', 'diego', 'diego', 'diego', '05:30', '2017-07-08', 'empleado1', '05:30', '', '2017-07-08', 0),
('2_3', 'no', 'si', 'o', 'o', 'o', '05:31', '2017-07-08', 'empleado1', '05:32', '', '2017-07-08', 0),
('3_3', 'no', 'si', 'o', 'o', 'o', '05:32', '2017-07-08', 'empleado1', '05:32', 'empleado1', '2017-07-08', 0),
('2_2', 'si', 'no', 'vw', 'test', 'gris', '8:40', '2017-07-08', 'empleado1', '8:50', 'empleado1', '2017-07-08', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroempleados`
--

CREATE TABLE `registroempleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaing` date NOT NULL,
  `hsing` time NOT NULL,
  `fechasal` date NOT NULL,
  `hssal` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registroempleados`
--

INSERT INTO `registroempleados` (`id`, `nombre`, `fechaing`, `hsing`, `fechasal`, `hssal`) VALUES
(8, 'empleado1', '2017-07-01', '19:51:37', '2017-07-01', '19:51:38'),
(9, 'empleado1', '2017-07-01', '19:54:38', '2017-07-01', '19:54:40'),
(10, 'empleado2', '2017-07-02', '17:46:35', '2017-07-02', '17:46:39'),
(11, 'empleado2', '2017-07-02', '18:10:02', '2017-07-02', '18:16:53'),
(12, 'empleado2', '2017-07-02', '18:17:01', '2017-07-02', '18:17:17'),
(13, 'empleado3', '2017-07-02', '18:24:43', '2017-07-02', '19:30:06'),
(14, 'empleado2', '2017-07-02', '20:44:11', '2017-07-02', '20:45:11'),
(15, 'empleado3', '2017-07-02', '20:58:53', '2017-07-02', '21:06:48'),
(16, 'empleado2', '2017-07-02', '21:38:42', '2017-07-02', '21:40:24'),
(17, 'empleado2', '2017-07-02', '22:09:41', '2017-07-02', '22:12:11'),
(18, 'empleado2', '2017-07-03', '05:45:51', '2017-07-03', '06:47:59'),
(19, 'empleado2', '2017-07-03', '06:54:13', '2017-07-03', '06:55:15'),
(20, 'empleado2', '2017-07-03', '07:23:39', '2017-07-03', '07:24:35'),
(21, 'empleado3', '2017-07-04', '20:21:09', '2017-07-04', '20:21:10'),
(22, 'empleado1', '2017-07-04', '20:21:27', '2017-07-04', '20:21:33'),
(23, 'empleado1', '2017-07-04', '21:27:38', '2017-07-04', '21:27:40'),
(24, 'empleado1', '2017-07-07', '19:49:57', '0000-00-00', '00:00:00'),
(25, 'empleado1', '2017-07-09', '22:38:50', '2017-07-09', '22:38:52'),
(26, 'empleado1', '2017-07-09', '23:09:40', '2017-07-09', '23:10:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrooperaciones`
--

CREATE TABLE `registrooperaciones` (
  `id` int(11) NOT NULL,
  `nombreempleado` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `numcochera` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registrooperaciones`
--

INSERT INTO `registrooperaciones` (`id`, `nombreempleado`, `tipo`, `fecha`, `numcochera`) VALUES
(75, 'empleado2', 'alta', '2017-07-03', '1_2'),
(76, 'empleado2', 'alta', '2017-07-03', '1_3'),
(77, 'empleado2', 'modificar', '2017-07-03', '1_3'),
(78, 'empleado2', 'mover', '2017-07-03', '3_3'),
(79, '', 'alta', '2017-07-07', '1_3'),
(80, '', 'baja', '2017-07-07', '1_3'),
(81, '', 'alta', '2017-07-07', '3_2'),
(82, 'empleado1', 'alta', '2017-07-07', '1_1'),
(83, 'empleado1', 'alta', '2017-07-07', '2_2'),
(84, 'empleado1', 'alta', '2017-07-07', '2_1'),
(85, 'empleado1', 'alta', '2017-07-07', '1_3'),
(86, 'empleado1', 'alta', '2017-07-07', '1_3'),
(87, 'empleado1', 'alta', '2017-07-07', '1_1'),
(88, 'empleado1', 'alta', '2017-07-07', '2_3'),
(89, '', 'baja', '2017-07-07', '1_1'),
(90, '', 'baja', '2017-07-07', '1_3'),
(91, '', 'baja', '2017-07-07', '2_3'),
(92, 'empleado1', 'alta', '2017-07-07', '1_1'),
(93, 'empleado1', 'baja', '2017-07-07', '1_1'),
(94, 'empleado1', 'alta', '2017-07-07', '1_1'),
(95, 'empleado1', 'baja', '2017-07-07', '1_1'),
(96, 'empleado1', 'alta', '2017-07-07', '2_2'),
(97, 'empleado1', 'baja', '2017-07-07', '2_2'),
(98, 'empleado1', 'alta', '2017-07-07', '1_1'),
(99, 'empleado1', 'baja', '2017-07-07', '1_1'),
(100, 'empleado1', 'alta', '2017-07-07', '2_2'),
(101, 'empleado1', 'baja', '2017-07-07', '2_2'),
(102, 'empleado1', 'alta', '2017-07-07', '3_1'),
(103, 'empleado1', 'baja', '2017-07-07', '3_1'),
(104, 'empleado1', 'alta', '2017-07-07', '2_3'),
(105, 'empleado1', 'baja', '2017-07-07', '2_3'),
(106, 'empleado1', 'alta', '2017-07-07', '3_2'),
(107, 'empleado1', 'baja', '2017-07-07', '3_2'),
(108, 'empleado1', 'alta', '2017-07-07', '1_3'),
(109, 'empleado1', 'baja', '2017-07-07', '1_3'),
(110, 'empleado1', 'alta', '2017-07-07', '2_1'),
(111, 'empleado1', 'baja', '2017-07-07', '2_1'),
(112, 'empleado1', 'alta', '2017-07-08', '1_1'),
(113, '', 'baja', '2017-07-08', '1_1'),
(114, 'empleado1', 'alta', '2017-07-08', '1_1'),
(115, 'empleado1', 'baja', '2017-07-08', '1_1'),
(116, 'empleado1', 'alta', '2017-07-08', '1_1'),
(117, 'empleado1', 'baja', '2017-07-08', '1_1'),
(118, 'empleado1', 'alta', '2017-07-08', '3_2'),
(119, 'empleado1', 'baja', '2017-07-08', '3_2'),
(120, 'empleado1', 'alta', '2017-07-08', '3_2'),
(121, 'empleado1', 'baja', '2017-07-08', '3_2'),
(122, 'empleado1', 'alta', '2017-07-08', '1_3'),
(123, 'empleado1', 'baja', '2017-07-08', '1_3'),
(124, 'empleado1', 'alta', '2017-07-08', '2_3'),
(125, 'empleado1', 'baja', '2017-07-08', '2_3'),
(126, 'empleado1', 'alta', '2017-07-08', '2_2'),
(127, 'empleado1', 'baja', '2017-07-08', '2_2'),
(128, 'empleado1', 'alta', '2017-07-08', '2_3'),
(129, 'empleado1', 'alta', '2017-07-08', '2_3'),
(130, 'empleado1', 'alta', '2017-07-08', '2_3'),
(131, 'empleado1', 'baja', '2017-07-08', '2_3'),
(132, 'empleado1', 'alta', '2017-07-08', '2_3'),
(133, 'empleado1', 'baja', '2017-07-08', '2_3'),
(134, 'empleado1', 'alta', '2017-07-08', '2_3'),
(135, 'empleado1', 'baja', '2017-07-08', '2_3'),
(136, 'empleado1', 'alta', '2017-07-08', '1_3'),
(137, 'empleado1', 'baja', '2017-07-08', '1_3'),
(138, 'empleado1', 'alta', '2017-07-08', '2_2'),
(139, 'empleado1', 'baja', '2017-07-08', '2_2'),
(140, 'empleado1', 'alta', '2017-07-08', '3_2'),
(141, 'empleado1', 'baja', '2017-07-08', '3_2'),
(142, 'empleado1', 'alta', '2017-07-08', '2_3'),
(143, 'empleado1', 'baja', '2017-07-08', '2_3'),
(144, 'empleado1', 'alta', '2017-07-08', '2_3'),
(145, 'empleado1', 'baja', '2017-07-08', '2_3'),
(146, 'empleado1', 'alta', '2017-07-08', '2_3'),
(147, 'empleado1', 'baja', '2017-07-08', '2_3'),
(148, 'empleado1', 'alta', '2017-07-08', '2_3'),
(149, 'empleado1', 'baja', '2017-07-08', '2_3'),
(150, 'empleado1', 'alta', '2017-07-08', '2_3'),
(151, 'empleado1', 'baja', '2017-07-08', '2_3'),
(152, 'empleado1', 'alta', '2017-07-08', '1_3'),
(153, 'empleado1', 'baja', '2017-07-08', '1_3'),
(154, 'empleado1', 'alta', '2017-07-08', '2_3'),
(155, 'empleado1', 'baja', '2017-07-08', '2_3'),
(156, 'empleado1', 'alta', '2017-07-08', '1_2'),
(157, 'empleado1', 'baja', '2017-07-08', '1_2'),
(158, 'empleado1', 'alta', '2017-07-08', '1_1'),
(159, '', 'baja', '2017-07-08', '1_1'),
(160, 'empleado1', 'alta', '2017-07-08', '1_1'),
(161, '', 'baja', '2017-07-08', '1_1'),
(162, 'empleado1', 'alta', '2017-07-08', '2_3'),
(163, '', 'baja', '2017-07-08', '2_3'),
(164, 'empleado1', 'alta', '2017-07-08', '3_3'),
(165, 'empleado1', 'baja', '2017-07-08', '3_3'),
(166, 'empleado1', 'alta', '2017-07-08', '2_2'),
(167, 'empleado1', 'alta', '2017-07-08', '3_3'),
(168, 'empleado1', 'alta', '2017-07-08', '3_1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cocheras`
--
ALTER TABLE `cocheras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registroempleados`
--
ALTER TABLE `registroempleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registrooperaciones`
--
ALTER TABLE `registrooperaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cocheras`
--
ALTER TABLE `cocheras`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `registroempleados`
--
ALTER TABLE `registroempleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `registrooperaciones`
--
ALTER TABLE `registrooperaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
