-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2023 a las 20:24:36
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
  `speciality_id` int(11) DEFAULT NULL,
  `professional_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` enum('available','occupied') DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `appointments`
--

INSERT INTO `appointments` (`id`, `speciality_id`, `professional_id`, `date`, `time`, `status`, `users_id`) VALUES
(24, 2, 1, '2023-10-12', '10:00:00', 'occupied', 1),
(26, 1, 3, '2023-11-01', '10:30:00', 'occupied', 1),
(28, 1, 3, '2023-11-01', '11:00:00', 'occupied', 1),
(30, 1, 3, '2023-11-01', '11:30:00', 'occupied', 1),
(31, 1, 3, '2023-11-01', '14:00:00', 'occupied', 1),
(35, 1, 3, '2023-12-13', '13:30:00', 'occupied', 1),
(36, 2, 1, '2023-12-21', '14:30:00', 'occupied', 1),
(37, 1, 3, '2023-12-20', '14:30:00', 'occupied', 19),
(38, 2, 2, '2023-12-19', '14:00:00', 'occupied', 19),
(39, 1, 3, '2023-12-27', '13:00:00', 'occupied', 1),
(40, 2, 1, '2023-12-28', '14:00:00', 'occupied', 19);

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
  ADD KEY `speciality_id` (`speciality_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`professional_id`) REFERENCES `professional` (`id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

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
