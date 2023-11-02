-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 04:18:02
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
CREATE DATABASE IF NOT EXISTS `ruu` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ruu`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_deleteUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deleteUser` (IN `_id` INT)   BEGIN
	UPDATE usuario SET estado = "I" WHERE idUsuario = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_login`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login` (IN `_user` VARCHAR(40), IN `_pass` VARCHAR(20), IN `_rol` VARCHAR(11))   BEGIN
  IF `_rol` = 'Coordinador' THEN
    SELECT * FROM `v_usercoordinador` WHERE (`user` = `_user` OR `correo` = `_user`) AND `pass` = `_pass`;
  ELSE
    SELECT * FROM `v_userauxiliar` WHERE (`user` = `_user` OR `correo` = `_user`) AND `pass` = `_pass`;
  END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_saveSnack`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_saveSnack` (IN `_id` INT, IN `_hora` TIME, IN `_fecha` DATE, IN `_cant` BIGINT(20), IN `_type` VARCHAR(1), IN `_descri` VARCHAR(100), IN `_aux` INT(11), IN `_coor` INT(11))   BEGIN
  IF _id = 0 THEN
    INSERT INTO refrigerio (hora, fecha, cantidad, tipo, descripcion, auxiliar, coordinador) VALUES (_hora, _fecha, _cant, _type, _descri, _aux, _coor);
  ELSE 
    UPDATE refrigerio SET hora = _hora, fecha = _fecha, cantidad = _cant, tipo = _type, descripcion = _descri, auxiliar = _aux, coordinador = _coor WHERE idUsuario = _id;
  END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_saveUser`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_saveUser` (IN `_id` INT, IN `_name` VARCHAR(40), IN `_lastName` VARCHAR(50), IN `_number` VARCHAR(10), IN `_email` VARCHAR(50), IN `_jornada` VARCHAR(1), IN `_user` VARCHAR(40), IN `_pass` VARCHAR(20), IN `_rol` VARCHAR(11), IN `_idRol` INT, IN `_img` LONGBLOB)   BEGIN
  DECLARE _idQuery INT; 
  IF _id = 0 THEN
    INSERT INTO usuario (usuario, contrasenia, rol, estado, imgUser) VALUES (_user, _pass, _rol, 'A', _img);
    SELECT idUsuario INTO _idQuery FROM usuario WHERE usuario = _user AND contrasenia = _pass AND rol = _rol;
    IF _rol = 'Coordinador' THEN 
      INSERT INTO coordinador (nombre, apellido, jornada, telefono, correo, usuario) VALUES (_name, _lastName, _jornada, _number, _email, _idQuery);
    ELSE
      INSERT INTO auxiliar (nombre, apellido, jornada, telefono, correo, usuario) VALUES (_name, _lastName, _jornada, _number, _email, _idQuery);
    END IF;
  ELSE 
    UPDATE usuario SET usuario = _user, contrasenia = _pass WHERE idUsuario = _id;
    IF _rol = 'Coordinador' THEN 
      UPDATE coordinador SET nombre = _name, apellido = _lastName, jornada = _jornada, telefono = _number, correo = _email WHERE idCoordinador = _idRol;
    ELSE
      UPDATE auxiliar SET nombre = _name, apellido = _lastName, jornada = _jornada, telefono = _number, correo = _email WHERE idAuxiliar = _idRol;
    END IF;
  END IF;
END$$

DROP PROCEDURE IF EXISTS `sp_UpdatePass`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_UpdatePass` (IN `_email` VARCHAR(50), IN `_passNew` VARCHAR(20))   BEGIN
  DECLARE _idUser INT;
  SELECT idUser INTO _idUser FROM v_newpass WHERE correoCoor = _email OR correoAux = _email;
  UPDATE usuario SET contrasenia = _passNew WHERE idUsuario = _idUser;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

DROP TABLE IF EXISTS `auxiliar`;
CREATE TABLE IF NOT EXISTS `auxiliar` (
  `idAuxiliar` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `jornada` varchar(1) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAuxiliar`),
  KEY `auxiliar_ibfk_1` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `auxiliar`:
--   `usuario`
--       `usuario` -> `idUsuario`
--

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`idAuxiliar`, `nombre`, `apellido`, `jornada`, `telefono`, `correo`, `usuario`) VALUES
(1, 'Carolina', 'Sepulveda', 'M', '3126574585', 'caro.03@gmail.com', 3),
(2, 'Maria Jose', 'T', 'S', '3748652845', 'mariajo34567@gmail.com', 4),
(3, 'Karen', 'Escobar', 'M', '3103635793', 'kaes70837@gmail.com', 5),
(4, 'Juliana', 'Ramirez', 'T', '3245473356', 'julianaramirez54@gmail.com', 6),
(5, 'Samuel', 'Jimenez', 'M', '3603461854', 'jimenez654@hotmail.com', 7),
(6, 'Julian', 'Fichas', 'T', '3247685624', 'fichasjulififi@gmail.com', 8),
(7, 'Gabriela', 'Sanchez', 'T', '3126546534', 'ssgabriela56@gmail.com', 9),
(8, 'Jimena', 'Mendoza', 'M', '3657668668', 'jimemendojime@gmail.com', 10),
(9, 'Santiago', 'Pineda', 'T', '3126987257', 'pisantiago456@hotmail.com', 11),
(10, 'Josefina', 'Michi', 'M', '3654896512', 'josejosemichi5646@gmail.com', 12),
(11, 'Laura', 'Alvarez', 'T', '3698745521', 'lauraalva876545@gmail.com', 13),
(45, 'Nuevo', 'Nuevo', 'M', '3124657865', 'rivvas.cs@gmail.com', 61),
(46, 'Samuel', 'Sarmiento Rivas', 'T', '3124564765', 'samuel123@gmail.com', 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contraseniaanterior`
--

DROP TABLE IF EXISTS `contraseniaanterior`;
CREATE TABLE IF NOT EXISTS `contraseniaanterior` (
  `idUsuario` int(11) DEFAULT NULL,
  `contraseniaAnterior` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `contraseniaanterior`:
--

--
-- Volcado de datos para la tabla `contraseniaanterior`
--

INSERT INTO `contraseniaanterior` (`idUsuario`, `contraseniaAnterior`) VALUES
(15, '123'),
(10, 'xime3456.32'),
(7, '5758.e8'),
(5, '12543645245'),
(5, NULL),
(5, NULL),
(11, 'santi.54.ss'),
(11, 'sd'),
(11, 'sd'),
(11, 'sd'),
(11, 'sd'),
(11, 'sd'),
(11, 'sd'),
(11, ''),
(11, 'as'),
(11, 'as'),
(11, ''),
(11, 'sasda'),
(11, 'asdasd'),
(11, 'asdasd'),
(11, 'asdasd'),
(11, 'asdasd'),
(11, 'asdasd'),
(1, 'juandmin123'),
(1, 'Nosemibro'),
(1, 'asdasd'),
(1, 'asdasd'),
(1, 'juandmin123'),
(1, 'juandmin123'),
(62, 'nuevo'),
(62, '4234234'),
(62, '4234234'),
(62, '4234234'),
(8, 'julian523'),
(63, 'samuel123'),
(63, '2324'),
(2, 'walteradmin123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador`
--

DROP TABLE IF EXISTS `coordinador`;
CREATE TABLE IF NOT EXISTS `coordinador` (
  `idCoordinador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `jornada` varchar(1) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCoordinador`),
  KEY `coordinador_ibfk_1` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `coordinador`:
--   `usuario`
--       `usuario` -> `idUsuario`
--

--
-- Volcado de datos para la tabla `coordinador`
--

INSERT INTO `coordinador` (`idCoordinador`, `nombre`, `apellido`, `jornada`, `telefono`, `correo`, `usuario`) VALUES
(0, 'ADMIN', 'ADMIN', 'M', 'ADMIN', 'ADMIN', 0),
(1, 'Juan Carlos', 'Cadavid', 'M', '3125467897', 'juanca@gmail.com', 1),
(2, 'Walter', 'Aguirre Bernal', 'T', '3129749743', 'waguirreb@educacionbogota.edu.co', 2),
(9, 'Nuevo', 'Nuevo', 'M', '1232344323', 'rivvas.cs@gmail.com', 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `grado` int(2) DEFAULT NULL,
  `curso` varchar(1) DEFAULT NULL,
  `jornada` varchar(1) DEFAULT NULL,
  `cantAlumnos` bigint(20) DEFAULT NULL,
  `profesor` varchar(20) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `curso`:
--

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `grado`, `curso`, `jornada`, `cantAlumnos`, `profesor`, `estado`) VALUES
(1, 1, 'A', 'M', 38, 'Elena Ramírez', 'A'),
(2, 1, 'B', 'M', 31, 'Marilyn Fernández', 'A'),
(3, 2, 'A', 'M', 42, 'Damián Oliveros ', 'A'),
(4, 2, 'B', 'M', 46, 'Fernanda Zarate', 'A'),
(5, 3, 'A', 'M', 36, 'Adriana Sandoval', 'A'),
(6, 3, 'B', 'M', 43, 'Michelle García', 'A'),
(7, 4, 'A', 'M', 33, 'Marta Morales', 'A'),
(8, 4, 'B', 'M', 29, 'María Hernández ', 'A'),
(9, 5, 'A', 'M', 49, 'María Soledad ', 'A'),
(10, 5, 'B', 'M', 38, 'Lilian Fichas', 'A'),
(11, 6, 'A', 'M', 34, 'Kalet Muñoz', 'A'),
(12, 6, 'B', 'M', 38, 'Karen Rodriguez', 'A'),
(13, 7, 'A', 'M', 31, 'Juliana Rivas', 'A'),
(14, 7, 'B', 'M', 42, 'Maria Sarmiento', 'A'),
(15, 8, 'A', 'M', 46, 'Maicol Amezquita', 'A'),
(16, 8, 'B', 'M', 36, 'Adonay Tafur', 'A'),
(17, 9, 'A', 'M', 43, 'Carlos Caro', 'A'),
(18, 9, 'B', 'M', 33, 'Jefferson Cossio', 'A'),
(19, 10, 'A', 'M', 35, 'Richard Montes', 'A'),
(20, 10, 'B', 'M', 36, 'Carlos Moreno', 'A'),
(21, 11, 'A', 'M', 31, 'Carlos Caro', 'A'),
(22, 11, 'B', 'M', 33, 'Adriana Tafur', 'A'),
(26, 2, 'B', 'T', 46, 'Fernanda Zarate', 'A'),
(27, 3, 'A', 'T', 36, 'Adriana Sandoval', 'A'),
(28, 3, 'B', 'T', 43, 'Michelle García', 'A'),
(29, 4, 'A', 'T', 33, 'Marta Morales', 'A'),
(30, 4, 'B', 'T', 29, 'María Hernández ', 'A'),
(31, 5, 'A', 'T', 49, 'María Soledad ', 'A'),
(32, 5, 'B', 'T', 38, 'Lilian Fichas', 'A'),
(33, 6, 'A', 'T', 34, 'Kalet Muñoz', 'A'),
(34, 6, 'B', 'T', 38, 'Karen Rodriguez', 'A'),
(35, 7, 'A', 'T', 31, 'Juliana Rivas', 'A'),
(36, 7, 'B', 'T', 42, 'Maria Sarmiento', 'A'),
(37, 8, 'A', 'T', 46, 'Maicol Amezquita', 'A'),
(38, 8, 'B', 'T', 36, 'Adonay Tafur', 'A'),
(39, 9, 'A', 'T', 43, 'Carlos Caro', 'A'),
(40, 9, 'B', 'T', 33, 'Jefferson Cossio', 'A'),
(41, 10, 'A', 'T', 35, 'Richard Montes', 'A'),
(42, 10, 'B', 'T', 36, 'Carlos Moreno', 'A'),
(43, 11, 'A', 'T', 31, 'Carlos Caro', 'A'),
(44, 11, 'B', 'T', 33, 'Adriana Tafur', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_refrigerio`
--

DROP TABLE IF EXISTS `curso_refrigerio`;
CREATE TABLE IF NOT EXISTS `curso_refrigerio` (
  `idEntregaRefri` int(11) NOT NULL AUTO_INCREMENT,
  `horaEntregaRefri` time DEFAULT NULL,
  `fechaEntregaRefri` date DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `curso_idCurso` int(11) DEFAULT NULL,
  `refrigerio_idRefrigerio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEntregaRefri`),
  KEY `curso_refrigerio_ibfk_1` (`curso_idCurso`),
  KEY `curso_refrigerio_ibfk_2` (`refrigerio_idRefrigerio`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `curso_refrigerio`:
--   `curso_idCurso`
--       `curso` -> `idCurso`
--   `refrigerio_idRefrigerio`
--       `refrigerio` -> `idRefrigerio`
--

--
-- Volcado de datos para la tabla `curso_refrigerio`
--

INSERT INTO `curso_refrigerio` (`idEntregaRefri`, `horaEntregaRefri`, `fechaEntregaRefri`, `cantidad`, `curso_idCurso`, `refrigerio_idRefrigerio`) VALUES
(1, '10:57:34', '2023-06-09', 38, 1, 1),
(2, '10:59:12', '2023-06-09', 31, 2, 1),
(3, '11:02:38', '2023-06-09', 42, 3, 1),
(4, '11:03:27', '2023-06-09', 46, 4, 1),
(5, '11:04:52', '2023-06-09', 36, 5, 1),
(6, '11:05:17', '2023-06-09', 43, 6, 1),
(7, '11:06:01', '2023-06-09', 33, 7, 1),
(8, '11:07:13', '2023-06-09', 29, 8, 1),
(9, '11:08:42', '2023-06-09', 49, 9, 1),
(10, '11:09:41', '2023-06-09', 38, 10, 1),
(11, '11:10:26', '2023-06-09', 34, 11, 2),
(12, '11:11:29', '2023-06-09', 38, 12, 2),
(13, '11:12:51', '2023-06-09', 31, 13, 2),
(14, '11:13:34', '2023-06-09', 42, 14, 2),
(15, '11:14:34', '2023-06-09', 46, 15, 2),
(16, '11:15:34', '2023-06-09', 36, 16, 2),
(17, '11:16:34', '2023-06-09', 43, 17, 2),
(18, '11:17:34', '2023-06-09', 33, 18, 2),
(19, '11:18:34', '2023-06-09', 35, 19, 2),
(20, '11:19:34', '2023-06-09', 33, 20, 2),
(21, '11:20:34', '2023-06-09', 31, 21, 2),
(22, '11:21:34', '2023-06-09', 33, 22, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refrigerio`
--

DROP TABLE IF EXISTS `refrigerio`;
CREATE TABLE IF NOT EXISTS `refrigerio` (
  `idRefrigerio` int(11) NOT NULL AUTO_INCREMENT,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `auxiliar` int(11) DEFAULT NULL,
  `coordinador` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRefrigerio`),
  KEY `refrigerio_ibfk_1` (`auxiliar`),
  KEY `refrigerio_ibfk_2` (`coordinador`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `refrigerio`:
--   `auxiliar`
--       `auxiliar` -> `idAuxiliar`
--   `coordinador`
--       `coordinador` -> `idCoordinador`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) DEFAULT NULL,
  `contrasenia` varchar(20) DEFAULT NULL,
  `rol` varchar(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `imgUser` longblob DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELACIONES PARA LA TABLA `usuario`:
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `rol`, `estado`, `imgUser`) VALUES
(0, 'ADMIN', '.33', 'Coordinador', 'A', NULL),
(1, 'Juan Carlos', 'juandmin', 'Coordinador', 'A', NULL),
(2, 'Walter', 'walteradmin123', 'Coordinador', 'I', NULL),
(3, 'Carolina', 'caro023277', 'Auxiliar', 'A', NULL),
(4, 'Maria Jose', 'Maria.33', 'Auxiliar', 'A', NULL),
(5, 'Karen', 'asd', 'Auxiliar', 'A', NULL),
(6, 'Juliana', 'Juli.567', 'Auxiliar', 'A', NULL),
(7, 'Samuel', '5758.e8', 'Auxiliar', 'A', NULL),
(8, 'Julian', 'julian523', 'Auxiliar', 'I', NULL),
(9, 'Gabriela', '3126546534', 'Auxiliar', 'A', NULL),
(10, 'Jimena', 'xime3456.32', 'Auxiliar', 'I', NULL),
(11, 'Santiago', 'asdasd', 'Auxiliar', 'A', NULL),
(12, 'Josefina', '3125698754', 'Auxiliar', 'A', NULL),
(13, 'Laura', '1027653497', 'Auxiliar', 'A', NULL),
(61, 'nose', 'nose', 'Auxiliar', 'A', NULL),
(62, 'nuevo', '4234234', 'Coordinador', 'I', ''),
(63, 'samuel1234', '2324', 'Auxiliar', 'A', '');

--
-- Disparadores `usuario`
--
DROP TRIGGER IF EXISTS `tr_savePassBefore`;
DELIMITER $$
CREATE TRIGGER `tr_savePassBefore` BEFORE UPDATE ON `usuario` FOR EACH ROW BEGIN   
        INSERT INTO contraseniaAnterior VALUES (old.idUsuario, old.contrasenia);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_allusers`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_allusers`;
CREATE TABLE IF NOT EXISTS `v_allusers` (
`idUsuario` int(11)
,`ncoor` varchar(40)
,`naux` varchar(40)
,`acoor` varchar(50)
,`aaux` varchar(50)
,`ccoor` varchar(50)
,`caux` varchar(50)
,`tcoor` varchar(10)
,`taux` varchar(10)
,`jcoor` varchar(1)
,`jaux` varchar(1)
,`usuario` varchar(40)
,`contrasenia` varchar(20)
,`rol` varchar(11)
,`estado` varchar(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_userauxiliar`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_userauxiliar`;
CREATE TABLE IF NOT EXISTS `v_userauxiliar` (
`idUsuario` int(11)
,`idAuxiliar` int(11)
,`user` varchar(40)
,`pass` varchar(20)
,`rol` varchar(11)
,`estado` varchar(1)
,`nombre` varchar(40)
,`apellido` varchar(50)
,`jornada` varchar(1)
,`telefono` varchar(10)
,`correo` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_usercoordinador`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_usercoordinador`;
CREATE TABLE IF NOT EXISTS `v_usercoordinador` (
`idUsuario` int(11)
,`idCoordinador` int(11)
,`user` varchar(40)
,`pass` varchar(20)
,`rol` varchar(11)
,`estado` varchar(1)
,`nombre` varchar(40)
,`apellido` varchar(50)
,`jornada` varchar(1)
,`telefono` varchar(10)
,`correo` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_allusers`
--
DROP TABLE IF EXISTS `v_allusers`;

DROP VIEW IF EXISTS `v_allusers`;
CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_allusers`  AS SELECT `u`.`idUsuario` AS `idUsuario`, `c`.`nombre` AS `ncoor`, `a`.`nombre` AS `naux`, `c`.`apellido` AS `acoor`, `a`.`apellido` AS `aaux`, `c`.`correo` AS `ccoor`, `a`.`correo` AS `caux`, `c`.`telefono` AS `tcoor`, `a`.`telefono` AS `taux`, `c`.`jornada` AS `jcoor`, `a`.`jornada` AS `jaux`, `u`.`usuario` AS `usuario`, `u`.`contrasenia` AS `contrasenia`, `u`.`rol` AS `rol`, `u`.`estado` AS `estado` FROM ((`usuario` `u` left join `coordinador` `c` on(`u`.`idUsuario` = `c`.`usuario`)) left join `auxiliar` `a` on(`u`.`idUsuario` = `a`.`usuario`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_userauxiliar`
--
DROP TABLE IF EXISTS `v_userauxiliar`;

DROP VIEW IF EXISTS `v_userauxiliar`;
CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_userauxiliar`  AS SELECT `u`.`idUsuario` AS `idUsuario`, `a`.`idAuxiliar` AS `idAuxiliar`, `u`.`usuario` AS `user`, `u`.`contrasenia` AS `pass`, `u`.`rol` AS `rol`, `u`.`estado` AS `estado`, `a`.`nombre` AS `nombre`, `a`.`apellido` AS `apellido`, `a`.`jornada` AS `jornada`, `a`.`telefono` AS `telefono`, `a`.`correo` AS `correo` FROM (`usuario` `u` join `auxiliar` `a`) WHERE `u`.`idUsuario` = `a`.`usuario` AND `u`.`rol` = 'Auxiliar''Auxiliar'  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_usercoordinador`
--
DROP TABLE IF EXISTS `v_usercoordinador`;

DROP VIEW IF EXISTS `v_usercoordinador`;
CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usercoordinador`  AS SELECT `u`.`idUsuario` AS `idUsuario`, `a`.`idCoordinador` AS `idCoordinador`, `u`.`usuario` AS `user`, `u`.`contrasenia` AS `pass`, `u`.`rol` AS `rol`, `u`.`estado` AS `estado`, `a`.`nombre` AS `nombre`, `a`.`apellido` AS `apellido`, `a`.`jornada` AS `jornada`, `a`.`telefono` AS `telefono`, `a`.`correo` AS `correo` FROM (`usuario` `u` join `coordinador` `a`) WHERE `u`.`idUsuario` = `a`.`usuario` AND `u`.`rol` = 'Coordinador''Coordinador'  ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD CONSTRAINT `auxiliar_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `coordinador`
--
ALTER TABLE `coordinador`
  ADD CONSTRAINT `coordinador_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `curso_refrigerio`
--
ALTER TABLE `curso_refrigerio`
  ADD CONSTRAINT `curso_refrigerio_ibfk_1` FOREIGN KEY (`curso_idCurso`) REFERENCES `curso` (`idCurso`),
  ADD CONSTRAINT `curso_refrigerio_ibfk_2` FOREIGN KEY (`refrigerio_idRefrigerio`) REFERENCES `refrigerio` (`idRefrigerio`);

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
