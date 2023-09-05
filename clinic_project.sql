-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2023 a las 19:11:19
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
(2, 35957362, 'LAURA', 'ANA LAURA', '1991-01-25', '0', '546465456', 1173679577, 'analauragarcia.al@gmail.com', 'Entre Ríos', '', '30021040000', 4565, 'Blabla 123', '1231564M.'),
(4, 34566745, 'garzon', 'maria', '1991-03-04', '0', '44553423', 1156345678, 'maria@example.com', 'Buenos Aires', '060588', '06588030000', 2131, 'Blabla 12334', '3456Lalfms.3');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
