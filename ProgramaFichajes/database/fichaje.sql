-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2024 a las 14:05:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fichaje`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichajesentrada`
--

CREATE TABLE `fichajesentrada` (
  `id_fichajeEntrada` int(11) NOT NULL,
  `hora_fichajeEntrada` datetime NOT NULL DEFAULT current_timestamp(),
  `id_trabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichajesentrada`
--

INSERT INTO `fichajesentrada` (`id_fichajeEntrada`, `hora_fichajeEntrada`, `id_trabajador`) VALUES
(1, '2024-07-30 11:17:53', 1),
(2, '2024-07-30 11:17:57', 1),
(3, '2024-07-30 11:18:22', 1),
(4, '2024-07-30 11:18:32', 1),
(5, '2024-07-30 11:22:29', 1),
(6, '2024-07-30 11:23:23', 1),
(7, '2024-07-30 11:23:39', 1),
(8, '2024-07-30 12:14:41', 0),
(9, '2024-07-30 12:15:05', 1),
(10, '2024-07-30 12:15:12', 1),
(11, '2024-07-30 12:15:38', 1),
(12, '2024-07-30 12:16:49', 1),
(13, '2024-07-30 12:16:52', 1),
(14, '2024-07-30 12:16:54', 1),
(15, '2024-07-30 12:21:12', 1),
(16, '2024-07-30 12:36:47', 1),
(17, '2024-07-30 12:38:18', 1),
(18, '2024-07-30 12:39:15', 1),
(19, '2024-07-30 12:39:47', 1),
(20, '2024-07-30 12:41:11', 1),
(21, '2024-07-30 12:42:07', 1),
(22, '2024-07-30 12:50:18', 1),
(23, '2024-07-30 12:50:42', 1),
(24, '2024-07-30 12:50:56', 1),
(25, '2024-07-30 12:51:38', 1),
(26, '2024-07-30 12:52:04', 1),
(27, '2024-07-30 12:52:28', 1),
(28, '2024-07-30 12:54:35', 1),
(29, '2024-07-30 12:55:29', 1),
(30, '2024-07-30 12:55:59', 1),
(31, '2024-07-30 12:56:35', 1),
(32, '2024-07-30 12:56:49', 1),
(33, '2024-07-30 13:05:53', 1),
(34, '2024-07-30 13:16:09', 1),
(35, '2024-07-30 13:19:18', 1),
(36, '2024-07-30 13:19:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichajessalida`
--

CREATE TABLE `fichajessalida` (
  `id_fichajeSalida` int(11) NOT NULL,
  `hora_fichajeSalida` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `start_time`, `end_time`) VALUES
(1, '08:30:00', '14:30:00'),
(2, '15:30:00', '19:30:00'),
(3, '08:30:00', '15:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `motivo_justificaciones` varchar(120) DEFAULT NULL,
  `justificada` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_incidencia` datetime NOT NULL DEFAULT current_timestamp(),
  `id_trabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `motivo_justificaciones`, `justificada`, `fecha_incidencia`, `id_trabajador`) VALUES
(1, NULL, 0, '2024-07-30 13:18:08', 1),
(2, NULL, 0, '2024-07-30 13:19:18', 1),
(3, NULL, 0, '2024-07-30 13:19:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificaciones`
--

CREATE TABLE `justificaciones` (
  `id_justificacion` int(11) NOT NULL,
  `motivo` enum('Médico','Personal','Atasco') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_trabajador` int(11) NOT NULL,
  `nom_trab` varchar(120) NOT NULL,
  `ape_trab` varchar(120) NOT NULL,
  `dni_trab` varchar(20) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `nom_trab`, `ape_trab`, `dni_trab`, `id_horario`) VALUES
(1, 'Miguel ', 'Garcia', '32943897P', 1),
(2, 'Edgar', 'Sanchez', '52647889J', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fichajesentrada`
--
ALTER TABLE `fichajesentrada`
  ADD PRIMARY KEY (`id_fichajeEntrada`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_trabajador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fichajesentrada`
--
ALTER TABLE `fichajesentrada`
  MODIFY `id_fichajeEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
