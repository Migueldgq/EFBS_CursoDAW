-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2024 a las 14:17:03
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
(1, '2024-08-01 12:34:10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichajessalida`
--

CREATE TABLE `fichajessalida` (
  `id_fichajeSalida` int(11) NOT NULL,
  `hora_fichajeSalida` datetime NOT NULL DEFAULT current_timestamp(),
  `id_trabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichajessalida`
--

INSERT INTO `fichajessalida` (`id_fichajeSalida`, `hora_fichajeSalida`, `id_trabajador`) VALUES
(1, '2024-08-01 14:15:35', 1);

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
  `id_trabajador` int(11) NOT NULL,
  `archivoJustificante` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `motivo_justificaciones`, `justificada`, `fecha_incidencia`, `id_trabajador`, `archivoJustificante`) VALUES
(1, 'Atasco', 1, '2024-07-30 13:18:08', 1, NULL),
(2, 'atasco', 1, '2024-07-30 13:19:18', 1, NULL),
(3, 'Atasco', 1, '2024-07-30 13:19:29', 1, NULL),
(4, 'Atasco', 1, '2024-07-31 09:07:00', 1, NULL),
(5, 'Personal', 1, '2024-08-01 09:26:38', 1, NULL),
(6, 'Personal', 1, '2024-08-01 10:29:16', 1, NULL),
(7, 'Atasco', 1, '2024-08-01 10:38:52', 1, 'justificanteentrevista.pdf'),
(8, 'Atasco', 1, '2024-08-01 12:31:33', 1, NULL),
(9, 'Personal', 1, '2024-08-01 12:33:00', 1, NULL),
(10, 'Atasco', 1, '2024-08-01 12:33:29', 1, NULL),
(11, 'Médico', 1, '2024-08-01 12:34:10', 1, 'gru.jpg'),
(12, NULL, 0, '2024-08-01 14:00:07', 1, NULL);

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
(2, 'Edgar', 'Sanchez', '52647889J', 2),
(3, 'Marián', 'Polo', '32586897X', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fichajesentrada`
--
ALTER TABLE `fichajesentrada`
  ADD PRIMARY KEY (`id_fichajeEntrada`);

--
-- Indices de la tabla `fichajessalida`
--
ALTER TABLE `fichajessalida`
  ADD PRIMARY KEY (`id_fichajeSalida`);

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
  MODIFY `id_fichajeEntrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fichajessalida`
--
ALTER TABLE `fichajessalida`
  MODIFY `id_fichajeSalida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
