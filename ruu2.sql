-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2023 a las 19:08:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ruu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refrigerio`
--

DROP TABLE IF EXISTS `refrigerio`;
CREATE TABLE `refrigerio` (
  `idRefrigerio` int(11) NOT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `auxiliar` int(11) DEFAULT NULL,
  `coordinador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refrigerio`
--

INSERT INTO `refrigerio` (`idRefrigerio`, `hora`, `fecha`, `cantidad`, `tipo`, `descripcion`, `auxiliar`, `coordinador`) VALUES
(1, '10:04:13', '2023-06-09', 434, 'A', 'Banano, Galleta Maria, Avena, Queso', 5, 1),
(2, '10:04:13', '2023-06-09', 372, 'B', 'Banano, Galleta Maria, Avena, Queso', 5, 1),
(3, '02:25:44', '2023-06-09', 412, 'A', 'Banano, Galleta Maria, Avena, Queso', 7, 2),
(4, '02:25:44', '2023-06-09', 387, 'B', 'Banano, Galleta Maria, Avena, Queso', 7, 2),
(5, '09:49:24', '2023-06-10', 424, 'A', 'Manzana, Yogurt, Rosquitas de Arroz, Mani', 2, 1),
(6, '09:49:24', '2023-06-10', 354, 'B', 'Manzana, Yogurt, Rosquitas de Arroz, Mani', 2, 1),
(7, '01:13:51', '2023-06-10', 463, 'A', 'Manzana, Yogurt, Rosquitas de Arroz, Mani', 8, 2),
(8, '01:13:51', '2023-06-10', 316, 'B', 'Manzana, Yogurt, Rosquitas de Arroz, Mani', 8, 2),
(9, '10:46:13', '2023-06-11', 441, 'A', 'Pera, Yogurt Griego, Mantecada', 3, 1),
(10, '10:51:13', '2023-06-11', 369, 'B', 'Pera, Yogurt Griego, Mantecada', 3, 1),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `refrigerio`
--
ALTER TABLE `refrigerio`
  ADD PRIMARY KEY (`idRefrigerio`),
  ADD KEY `refrigerio_ibfk_1` (`auxiliar`),
  ADD KEY `refrigerio_ibfk_2` (`coordinador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `refrigerio`
--
ALTER TABLE `refrigerio`
  MODIFY `idRefrigerio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `refrigerio`
--
ALTER TABLE `refrigerio`
  ADD CONSTRAINT `refrigerio_ibfk_1` FOREIGN KEY (`auxiliar`) REFERENCES `auxiliar` (`idAuxiliar`),
  ADD CONSTRAINT `refrigerio_ibfk_2` FOREIGN KEY (`coordinador`) REFERENCES `coordinador` (`idCoordinador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
