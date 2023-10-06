-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2023 a las 06:22:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinic_project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` enum('available','occupied') DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `appointments`
--

INSERT INTO `appointments` (`id`, `professional_id`, `date`, `time`, `status`, `users_id`) VALUES
(1, NULL, NULL, NULL, 'available', 1),
(2, NULL, NULL, NULL, 'available', 1),
(3, NULL, NULL, NULL, 'available', 1),
(4, NULL, NULL, NULL, 'available', 1),
(5, NULL, NULL, NULL, 'available', 1),
(6, NULL, NULL, NULL, 'available', 1),
(7, 3, NULL, NULL, 'available', 1),
(8, 1, NULL, NULL, 'available', 1),
(9, 3, '2023-10-20', '09:30:00', 'available', 1),
(10, NULL, '2023-10-20', '09:30:00', 'available', 1),
(11, 1, '2023-10-12', '10:00:00', 'available', 1),
(12, NULL, '2023-10-12', '10:00:00', 'available', 1),
(13, 3, '2023-10-12', '11:00:00', 'available', 1),
(14, NULL, '2023-10-12', '11:00:00', 'available', 1),
(15, 3, '2023-10-20', '09:30:00', 'available', 1),
(16, 3, '2023-10-13', '10:00:00', 'available', 1),
(17, NULL, '2023-10-13', '10:00:00', 'available', 1),
(18, 1, '2023-10-17', '09:30:00', 'available', 1),
(19, NULL, '2023-10-17', '09:30:00', 'available', 1),
(20, 3, '2023-10-12', '11:30:00', 'available', 1),
(21, NULL, '2023-10-12', '11:30:00', 'available', 1),
(22, 3, '2023-10-13', '09:30:00', 'available', 1),
(23, NULL, '2023-10-13', '09:30:00', 'available', 1),
(24, 3, '2023-10-18', '11:30:00', 'available', 1),
(25, NULL, '2023-10-18', '11:30:00', 'available', 1),
(26, 3, '2023-10-19', '10:00:00', 'available', 1),
(27, NULL, '2023-10-19', '10:00:00', 'available', 1),
(28, 2, '2023-10-12', '09:00:00', 'available', 1),
(29, NULL, '2023-10-12', '09:00:00', 'available', 1),
(30, 2, '2023-10-20', '12:30:00', 'available', 1),
(31, NULL, '2023-10-20', '12:30:00', 'available', 1),
(32, 3, '2023-10-21', '11:00:00', 'available', 1),
(33, NULL, '2023-10-21', '11:00:00', 'available', 1),
(34, 3, '2023-10-17', '10:00:00', 'available', 1),
(35, NULL, '2023-10-17', '10:00:00', 'available', 1),
(36, 1, '2023-10-17', '10:00:00', 'available', 1),
(37, 1, '2023-10-12', '11:00:00', 'available', 1),
(38, NULL, '2023-10-12', '11:00:00', 'available', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `speciality_id` int(11) DEFAULT NULL,
  `day_of_week` varchar(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `availability`
--

INSERT INTO `availability` (`id`, `professional_id`, `speciality_id`, `day_of_week`, `start_time`, `end_time`) VALUES
(1, 1, 1, 'Lunes', '08:00:00', '16:00:00'),
(2, 2, 2, 'Martes', '08:00:00', '16:00:00'),
(3, 3, 1, 'Miercoles', '08:00:00', '16:00:00'),
(4, 1, 2, 'Jueves', '08:00:00', '16:00:00'),
(5, 3, 3, 'Viernes', '08:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professional`
--

CREATE TABLE `professional` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `lastName` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `professional`
--

INSERT INTO `professional` (`id`, `lastName`, `name`) VALUES
(1, 'Miller', 'María'),
(2, 'Williams', 'Luis'),
(3, 'Evans', 'Juliana'),
(4, 'Adams', 'Ana'),
(5, 'Moore', 'Carlos'),
(6, 'Taylor', 'Juana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `speciality`
--

INSERT INTO `speciality` (`id`, `name`) VALUES
(1, 'Oftalmología'),
(2, 'Optometría'),
(3, 'Cirugía Ocular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `dni` int(20) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `affiliateName` varchar(30) DEFAULT NULL,
  `affiliateNumber` varchar(50) DEFAULT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `localate` varchar(50) NOT NULL,
  `zip` int(10) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `lastName`, `name`, `birthday`, `affiliateName`, `affiliateNumber`, `phone`, `email`, `province`, `city`, `localate`, `zip`, `address`, `password`) VALUES
(1, 12345678, 'Smith', 'John', '1990-05-15', '123', 'A45678', 2147483647, 'juan@example.com', 'California', 'Los Angeles', 'Downtown', 90001, '123 Main St', '123456M.'),
(19, 34567834, 'Velez', 'Mariano', '1991-05-25', '', '', 1534567834, 'mariano@gmail.com', 'Mendoza', '500042', '50042020000', 123456, '345 dfgsdf', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professional_id` (`professional_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professional_id` (`professional_id`),
  ADD KEY `speciality_id` (`speciality_id`);

--
-- Indices de la tabla `professional`
--
ALTER TABLE `professional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `professional`
--
ALTER TABLE `professional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`professional_id`) REFERENCES `professional` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`professional_id`) REFERENCES `professional` (`id`),
  ADD CONSTRAINT `availability_ibfk_2` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
