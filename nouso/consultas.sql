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

use clinic_project;

INSERT INTO speciality (name) VALUES
  ('Oftalmología'),
  ('Optometría'),
  ('Cirugía Ocular');

CREATE TABLE professional (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    lastName VARCHAR(25) NOT NULL,        
    name VARCHAR(25) NOT NULL  
);



  INSERT INTO professional (lastName, name) VALUES
  ('Miller', 'María'),             -- Dra. María Miller - Oftalmología
  ('Williams', 'Luis'),            -- Dr. Luis Williams - Optometría
  ('Evans', 'Juliana'),            -- Dra. Juliana Evans - Cirugía Ocular
  ('Adams', 'Ana'),                -- Dra. Ana Adams - Cirugía Ocular
  ('Moore', 'Carlos'),             -- Dr. Carlos Moore - Oftalmología
  ('Taylor', 'Juana');             -- Dra. Juana Taylor - Oftalmología

  -- Crear la tabla de asociación "professional_speciality" (Professional Speciality Association)
-- CREATE TABLE professional_speciality (
--   id INT PRIMARY KEY AUTO_INCREMENT,
--   professional_id INT,
--   speciality_id INT,
--   FOREIGN KEY (professional_id) REFERENCES professional(id),
--   FOREIGN KEY (speciality_id) REFERENCES speciality(id)
-- );


-- INSERT INTO professional_speciality (professional_id, speciality_id) VALUES
--   (1, 1),  -- Dra. María Miller - Oftalmología
--   (1, 2),  -- Dra. María Miller - Optometría
--   (2, 2),  -- Dr. Luis Williams - Optometría
--   (3, 3),  -- Dra. Juliana Evans - Cirugía Ocular
--   (4, 3),  -- Dra. Ana Adams - Cirugía Ocular
--   (5, 1),  -- Dr. Carlos Moore - Oftalmología
--   (6, 1);  -- Dra. Juana Taylor - Oftalmología


CREATE TABLE availability (
    id INT AUTO_INCREMENT PRIMARY KEY,
    professional_id INT,
    speciality_id INT,
    day_of_week VARCHAR(20),
    start_time TIME,
    end_time TIME,
    FOREIGN KEY (professional_id) REFERENCES professional(id),
    FOREIGN KEY (speciality_id) REFERENCES speciality(id)
);


INSERT INTO availability (professional_id, speciality_id, day_of_week, start_time, end_time) VALUES
(1, 1, 'Lunes', '08:00:00', '16:00:00'),
(2, 2, 'Martes', '08:00:00', '16:00:00'),
(3, 1, 'Miercoles', '08:00:00', '16:00:00'),
(1, 2, 'Jueves', '08:00:00', '16:00:00'),
(3, 3, 'Viernes', '08:00:00', '16:00:00');



-- Dra. María Miller - Oftalmología
INSERT INTO availability (professional_id, speciality_id, day_of_week, start_time, end_time) VALUES
(1, 1, 'Lunes', '08:00:00', '12:00:00'),
(1, 1, 'Miércoles', '12:00:00', '16:00:00'),
(1, 1, 'Viernes', '08:00:00', '12:00:00');


-- Dra. María Miller - Optometría
INSERT INTO availability (professional_id, speciality_id, day_of_week, start_time, end_time) VALUES
(1, 2, 'Martes', '08:00:00', '14:00:00'),
(1, 2, 'Jueves', '08:00:00', '14:00:00');

-- Dr. Luis Williams - Optometría
INSERT INTO availability (professional_id, speciality_id, day_of_week, start_time, end_time) VALUES
(2, 2, 'Lunes','12:00:00', '16:00:00'),
(2, 2, 'Miércoles', '08:00:00', '12:00:00'),
(2, 2, 'Viernes','12:00:00', '16:00:00');

-- Dra. Juliana Evans - Cirugía Ocular
INSERT INTO availability (professional_id, speciality_id, day_of_week, start_time, end_time) VALUES
(3, 3, 'Lunes', '08:00:00', '12:00:00'),
(3, 3, 'Miércoles', '10:00:00', '14:00:00');

-- Dra. Ana Adams - Cirugía Ocular
INSERT INTO availability (professional_id, speciality_id, day_of_week, start_time, end_time) VALUES
(4, 3, 'Martes', '08:00:00', '12:00:00'),
(4, 3, 'Jueves', '15:00:00', '16:00:00');

-- Dr. Carlos Moore - Oftalmología
INSERT INTO availability (professional_id, speciality_id, day_of_week, start_time, end_time) VALUES
(5, 1, 'Martes', '08:00:00', '12:00:00'),
(5, 1, 'Viernes', '12:00:00', '16:00:00');

-- Dra. Juana Taylor - Oftalmología
INSERT INTO availability (professional_id, speciality_id, day_of_week, start_time, end_time) VALUES
(6, 1, 'Lunes', '10:00:00', '14:00:00'),
(6, 1, 'Viernes', '08:00:00', '16:00:00');


use clinic_project;


SELECT DISTINCT p.name, a.speciality_id
FROM professional p
INNER JOIN availability a ON p.id = a.professional_id
INNER JOIN speciality s ON a.speciality_id = s.id
WHERE a.speciality_id = 1;

//Seleccioname todos los profesionales que correspondan a una especialidad..

SELECT p.name, a.speciality_id, a.day_of_week
FROM professional p
INNER JOIN availability a ON p.id = a.professional_id
INNER JOIN speciality s ON a.speciality_id = s.id
WHERE a.speciality_id = 2 AND p.name= "Maria" ;


CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    speciality_id INT,
    professional_id INT,    
    date DATE,
    time TIME,
    status ENUM('available', 'occupied'),
    users_id INT, -- Clave externa que hace referencia al ID del usuario en la tabla users
    FOREIGN KEY (speciality_id) REFERENCES speciality(id),
    FOREIGN KEY (professional_id) REFERENCES professional(id),  
    FOREIGN KEY (users_id) REFERENCES users(id)
);


INSERT INTO appointments (professional_id, speciality_id, date, time, status, users_id)
VALUES
    (1, 1, '2023-10-06', '08:00:00', 'occupied', 1),
    (1, 2, '2023-10-08', '08:30:00', 'occupied', 1),
    (2, 2, '2023-10-06', '09:00:00', 'occupied', 1),
    (1, 1, '2023-10-06', '09:30:00', 'occupied', 1),
    (1, 1, '2023-10-06', '10:00:00', 'occupied', 1);




INSERT INTO appointments (professional_id, date, time, status, users_id)
VALUES (1, '2023-10-17', '10:00', 'available', 1);


SELECT a.date, a.time, s.name AS speciality, p.name AS professional
FROM appointments AS a
INNER JOIN speciality AS s ON a.speciality_id = s.id
INNER JOIN professional AS p ON a.professional_id = p.id
WHERE a.users_id = 1;