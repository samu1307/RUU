-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-08-2023 a las 04:02:12
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `id18786132_db_ruu`
--
CREATE DATABASE IF NOT EXISTS `RUU` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `RUU`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `contrasenia` varchar(20) DEFAULT NULL,
  `rol` varchar(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `imgUser` LONGBLOB
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `rol`, `estado`) VALUES
(0, 'ADMIN', '.33', 'Coordinador', 'A'),
(1, 'Juan Carlos', 'juandmin123', 'Coordinador', 'A'),
(2, 'Walter', 'walteradmin123', 'Coordinador', 'A'),
(3, 'Carolina', 'caro023277', 'Auxiliar', 'A'),
(4, 'Maria Jose', 'Maria.33', 'Auxiliar', 'A'),
(5, 'Karen', '12543645245', 'Auxiliar', 'A'),
(6, 'Juliana', 'Juli.567', 'Auxiliar', 'A'),
(7, 'Samuel', '5758.e8', 'Auxiliar', 'A'),
(8, 'Julian', 'julian523', 'Auxiliar', 'A'),
(9, 'Gabriela', '3126546534', 'Auxiliar', 'A'),
(10, 'Jimena', 'xime3456.32', 'Auxiliar', 'A'),
(11, 'Santiago', 'santi.54.ss', 'Auxiliar', 'A'),
(12, 'Josefina', '3125698754', 'Auxiliar', 'A'),
(13, 'Laura', '1027653497', 'Auxiliar', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador`
--

DROP TABLE IF EXISTS `coordinador`;
CREATE TABLE `coordinador` (
  `idCoordinador` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `jornada` varchar(1) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `coordinador`
--

INSERT INTO `coordinador` (`idCoordinador`, `nombre`, `apellido`, `jornada`, `telefono`, `correo`, `usuario`) VALUES
(0, 'ADMIN', 'ADMIN', 'M', 'ADMIN', 'ADMIN', 0),
(1, 'Juan Carlos', 'Cadavid', 'M', '3125467897', 'juanca@gmail.com', 1),
(2, 'Walter', 'Aguirre Bernal', 'T', '3129749743', 'waguirreb@educacionbogota.edu.co', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

DROP TABLE IF EXISTS `auxiliar`;
CREATE TABLE `auxiliar` (
  `idAuxiliar` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `jornada` varchar(1) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`idAuxiliar`, `nombre`, `apellido`, `jornada`, `telefono`, `correo`, `usuario`) VALUES
(1, 'Carolina', 'Sepulveda', 'M', '3126574585', 'caro.03@gmail.com', 3),
(2, 'Maria Jose', 'T', 'Salazar', '3748652845', 'mariajo34567@gmail.com', 4),
(3, 'Karen', 'Escobar', 'M', '3103635793', 'kaes70837@gmail.com', 5),
(4, 'Juliana', 'Ramirez', 'T', '3245473356', 'julianaramirez54@gmail.com', 6),
(5, 'Samuel', 'Jimenez', 'M', '3603461854', 'jimenez654@hotmail.com', 7),
(6, 'Julian', 'Fichas', 'T', '3247685624', 'fichasjulififi@gmail.com', 8),
(7, 'Gabriela', 'Sanchez', 'T', '3126546534', 'ssgabriela56@gmail.com', 9),
(8, 'Jimena', 'Mendoza', 'M', '3657668668', 'jimemendojime@gmail.com', 10),
(9, 'Santiago', 'Pineda', 'T', '3126987257', 'pisantiago456@hotmail.com', 11),
(10, 'Josefina', 'Michi', 'M', '3654896512', 'josejosemichi5646@gmail.com', 12),
(11, 'Laura', 'Alvarez', 'T', '3698745521', 'lauraalva876545@gmail.com', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `grado` int(2) DEFAULT NULL,
  `curso` varchar(1) DEFAULT NULL,
  `jornada` varchar(1) DEFAULT NULL,
  `cantAlumnos` bigint(20) DEFAULT NULL,
  `profesor` varchar(20) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
CREATE TABLE `curso_refrigerio` (
  `idEntregaRefri` int(11) NOT NULL,
  `horaEntregaRefri` time DEFAULT NULL,
  `fechaEntregaRefri` date DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `curso_idCurso` int(11) DEFAULT NULL,
  `refrigerio_idRefrigerio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(10, '10:51:13', '2023-06-11', 369, 'B', 'Pera, Yogurt Griego, Mantecada', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contraseniaAnterior`
--

DROP TABLE IF EXISTS `contraseniaAnterior`;
CREATE TABLE `contraseniaAnterior` (
  `idUsuario` int(11) DEFAULT NULL,
  `contraseniaAnterior` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contraseniaAnterior`
--

INSERT INTO `contraseniaAnterior` (`idUsuario`, `contraseniaAnterior`) VALUES
(15, '123');

-- ----------------------------------------------

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
-- Estructura para la vista `v_userAuxiliar`
--
CREATE OR REPLACE VIEW v_userAuxiliar AS
    SELECT u.idUsuario, a.idAuxiliar, u.usuario AS user,
      u.contrasenia AS pass, u.rol AS rol,
      u.estado, a.nombre, a.apellido, a.jornada,a.telefono, a.correo
    FROM usuario AS u
    INNER JOIN auxiliar AS a 
    WHERE u.idUsuario = a.usuario AND u.rol = 'Auxiliar';


-- --------------------------------------------------------

--
-- Estructura para la vista `v_userCoordinador`
--
CREATE OR REPLACE VIEW v_userCoordinador AS
    SELECT u.idUsuario, a.idCoordinador, u.usuario AS user,
      u.contrasenia AS pass, u.rol AS rol,
      u.estado, a.nombre, a.apellido, a.jornada, a.telefono, a.correo
    FROM usuario AS u
    INNER JOIN coordinador AS a 
    WHERE u.idUsuario = a.usuario AND u.rol = 'Coordinador';

-- --------------------------------------------------------

--
-- Estructura para la vista `v_allUsers`
--

DROP VIEW IF EXISTS `v_allUsers`;
CREATE VIEW v_allUsers AS
SELECT 
    u.idUsuario AS idUsuario,
    c.nombre AS ncoor,
    a.nombre AS naux,
    c.apellido AS acoor,
    a.apellido AS aaux,
    c.correo AS ccoor,
    a.correo AS caux,
    c.telefono AS tcoor,
    a.telefono AS taux,
    c.jornada AS jcoor,
    a.jornada AS jaux,
    u.usuario AS usuario,
    u.contrasenia AS contrasenia,
    u.rol AS rol,
    u.estado AS estado
FROM usuario u
LEFT JOIN coordinador c ON u.idUsuario = c.usuario
LEFT JOIN auxiliar a ON u.idUsuario = a.usuario;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  ADD PRIMARY KEY (`idAuxiliar`),
  ADD KEY `auxiliar_ibfk_1` (`usuario`);

--
-- Indices de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  ADD PRIMARY KEY (`idCoordinador`),
  ADD KEY `coordinador_ibfk_1` (`usuario`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `curso_refrigerio`
--
ALTER TABLE `curso_refrigerio`
  ADD PRIMARY KEY (`idEntregaRefri`),
  ADD KEY `curso_refrigerio_ibfk_1` (`curso_idCurso`),
  ADD KEY `curso_refrigerio_ibfk_2` (`refrigerio_idRefrigerio`);

--
-- Indices de la tabla `refrigerio`
--
ALTER TABLE `refrigerio`
  ADD PRIMARY KEY (`idRefrigerio`),
  ADD KEY `refrigerio_ibfk_1` (`auxiliar`),
  ADD KEY `refrigerio_ibfk_2` (`coordinador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auxiliar`
--
ALTER TABLE `auxiliar`
  MODIFY `idAuxiliar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `coordinador`
--
ALTER TABLE `coordinador`
  MODIFY `idCoordinador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `curso_refrigerio`
--
ALTER TABLE `curso_refrigerio`
  MODIFY `idEntregaRefri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `refrigerio`
--
ALTER TABLE `refrigerio`
  MODIFY `idRefrigerio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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




-- --------------------------------------------------------

--
-- Procedimientos
--

DELIMITER $$

-- Create or Update

DROP PROCEDURE IF EXISTS `sp_saveUser` $$
CREATE  PROCEDURE `sp_saveUser` (IN `_id` INT, IN `_name` VARCHAR(40), IN `_lastName` VARCHAR(50), IN `_number` VARCHAR(10), IN `_email` VARCHAR(50), IN `_jornada` VARCHAR(1),  IN `_user` VARCHAR(40), IN `_pass` VARCHAR(20), IN `_rol` VARCHAR(11), IN `_idRol` INT, IN `_img` LONGBLOB) 
BEGIN
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

-- Update Password
DROP PROCEDURE IF EXISTS `sp_UpdatePass`$$
CREATE  PROCEDURE `sp_UpdatePass` (IN `_email` VARCHAR(50), IN `_passNew` VARCHAR(20)) 
BEGIN
  DECLARE _idUser INT;
  SELECT idUser INTO _idUser FROM v_newpass WHERE correoCoor = _email OR correoAux = _email;
  UPDATE usuario SET contrasenia = _passNew WHERE idUsuario = _idUser;
END$$

-- Delete User

DROP PROCEDURE IF EXISTS `sp_deleteUser`$$
CREATE  PROCEDURE `sp_deleteUser` (IN `_id` INT) 
BEGIN
	UPDATE usuario SET estado = "I" WHERE idUsuario = _id;
END$$

-- Login

DROP PROCEDURE IF EXISTS `sp_login`$$
CREATE  PROCEDURE `sp_login` (IN `_user` VARCHAR(40), IN `_pass` VARCHAR(20), IN `_rol` VARCHAR(11)) 
BEGIN
  IF `_rol` = 'Coordinador' THEN
    SELECT * FROM `v_usercoordinador` WHERE (`user` = `_user` OR `correo` = `_user`) AND `pass` = `_pass`;
  ELSE
    SELECT * FROM `v_userauxiliar` WHERE (`user` = `_user` OR `correo` = `_user`) AND `pass` = `_pass`;
  END IF;
END$$

DELIMITER $$

