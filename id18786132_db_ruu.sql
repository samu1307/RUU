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


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id18786132_db_ruu`
--
CREATE DATABASE IF NOT EXISTS `id18786132_db_ruu` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id18786132_db_ruu`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_createAux`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_createAux` (IN `_name` VARCHAR(40), IN `_lastName` VARCHAR(50), IN `_number` VARCHAR(10), IN `_email` VARCHAR(50), IN `_user` INT(11))   BEGIN
	INSERT INTO auxiliar (nombre, apellido, telefono, correo, usuario) VALUES (_name, _lastName, _number, _email, _user);
    SELECT * FROM auxiliar WHERE nombre = _name;
END$$

DROP PROCEDURE IF EXISTS `sp_createCoor`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_createCoor` (IN `_name` VARCHAR(40), IN `_lastName` VARCHAR(50), IN `_number` VARCHAR(10), IN `_email` VARCHAR(50), IN `_user` INT(11))   BEGIN
	INSERT INTO coordinador (nombre, apellido, telefono, correo, usuario) VALUES (_name, _lastName, _number, _email, _user);
    SELECT * FROM coordinador WHERE nombre = _name;
END$$

DROP PROCEDURE IF EXISTS `sp_createCourse`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_createCourse` (IN `_grado` INT(2), IN `_curso` VARCHAR(1), IN `_jornada` VARCHAR(1), IN `_cantAlumnos` BIGINT(20), IN `_profesor` VARCHAR(20), IN `_estado` VARCHAR(1))   BEGIN
	INSERT INTO curso (grado, curso, jornada, cantAlumnos, profesor, estado) VALUES (_grado, _curso, _jornada, _cantAlumnos, _profesor, _estado);
    SELECT * FROM curso WHERE grado = _grado AND curso = _curso;
END$$

DROP PROCEDURE IF EXISTS `sp_createCuRe`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_createCuRe` (IN `_horaER` TIME, IN `_fechaER` DATE, IN `_cantidad` INT, IN `_cursoId` INT(11), IN `_refriId` INT(11))   BEGIN
	INSERT INTO curso_refrigerio (horaEntregaRefri, fechaEntregaRefri, cantidad, curso_idCurso, refrigerio_idRefrigerio) VALUES (_grado, _curso, _jornada, _cantAlumnos, _profesor, _estado);
    SELECT * FROM curso_refrigerio WHERE idEntregaRefri = _name;
END$$

DROP PROCEDURE IF EXISTS `sp_createSnack`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_createSnack` (IN `_hora` TIME, IN `_fecha` DATE, IN `_cantidad` BIGINT(20), IN `_tipo` VARCHAR(1), IN `_descripcion` VARCHAR(100), IN `auxiliar` INT(11), IN `coordinador` INT(11))   BEGIN
	INSERT INTO refrigerio (hora, fecha, cantidad, tipo, descripcion, auxiliar, coordinador) VALUES (_hora, _fecha, _cantidad, _tipo, _descripcion, _auxiliar, _coordinador);
    SELECT * FROM refrigerio WHERE hora = _hora;
END$$

DROP PROCEDURE IF EXISTS `sp_createUser`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_createUser` (IN `_name` VARCHAR(40), IN `_pass` VARCHAR(20), IN `_rol` VARCHAR(20), IN `_state` VARCHAR(1))   BEGIN
	INSERT INTO usuario (usuario, contrasenia, rol, estado) VALUES (_name, _pass, _rol, UCASE(_state));
    SELECT * FROM usuario WHERE nombre = _name;
END$$

DROP PROCEDURE IF EXISTS `sp_deleteAuxById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_deleteAuxById` (IN `_id` INT(11))   BEGIN 
	DELETE FROM auxiliar WHERE idAuxiliar = _id;
	SELECT * FROM auxiliar WHERE idAuxiliar = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_deleteCoorById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_deleteCoorById` (IN `_id` INT(11))   BEGIN 
	DELETE FROM coordinador WHERE idCoordinador = _id;
	SELECT * FROM coordinador WHERE idCoordinador = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_deleteCourseById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_deleteCourseById` (IN `_id` INT(11))   BEGIN 
	DELETE FROM curso WHERE idCurso = _id;
	SELECT * FROM curso;
END$$

DROP PROCEDURE IF EXISTS `sp_deleteCuReById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_deleteCuReById` (IN `_id` INT(11))   BEGIN 
	DELETE FROM curso_refrigerio WHERE idEntregaRefri = _id;
	SELECT * FROM curso_refrigerio;
END$$

DROP PROCEDURE IF EXISTS `sp_deleteUserById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_deleteUserById` (IN `_id` INT(11))   BEGIN 
	DELETE FROM usuario WHERE idUsuario = _id;
	SELECT * FROM usuario WHERE idUsuario = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_queryAuxById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryAuxById` (IN `_id` INT(11))   BEGIN 
	SELECT * FROM auxiliar WHERE idAuxiliar = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_queryAuxs`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryAuxs` ()   BEGIN
SELECT * FROM auxiliar;
END$$

DROP PROCEDURE IF EXISTS `sp_queryCoor`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryCoor` ()   BEGIN
SELECT * FROM coordinador;
END$$

DROP PROCEDURE IF EXISTS `sp_queryCoorById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryCoorById` (IN `_id` INT(11))   BEGIN 
	SELECT * FROM coordinador WHERE idAuxiliar = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_queryCourse`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryCourse` ()   BEGIN
SELECT * FROM curso;
END$$

DROP PROCEDURE IF EXISTS `sp_queryCourseById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryCourseById` (IN `_id` INT(11))   BEGIN 
	SELECT * FROM curso WHERE idCurso = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_queryCuRe`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryCuRe` ()   BEGIN
SELECT * FROM curso_refrigerio;
END$$

DROP PROCEDURE IF EXISTS `sp_queryCuReById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryCuReById` (IN `_id` INT(11))   BEGIN 
	SELECT * FROM curso_refrigerio WHERE idEntregaRefri = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_querySnack`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_querySnack` ()   BEGIN
SELECT * FROM refrigerio;
END$$

DROP PROCEDURE IF EXISTS `sp_querySnackById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_querySnackById` (IN `_id` INT(11))   BEGIN 
	SELECT * FROM refrigerio WHERE idRefrigerio = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_queryUser`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryUser` ()   BEGIN
SELECT * FROM usuario;
END$$

DROP PROCEDURE IF EXISTS `sp_queryUserById`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_queryUserById` (IN `_id` INT)   BEGIN 
	SELECT * FROM usuario WHERE idUsuario = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateAuxEmail`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateAuxEmail` (IN `_id` INT(11), IN `_newEmail` VARCHAR(50))   BEGIN
	UPDATE auxiliar SET correo = _newEmail WHERE idAuxiliar = _id;
    SELECT * FROM auxiliar WHERE correo = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateAuxId`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateAuxId` (IN `_id` INT(11), IN `_newId` INT)   BEGIN
	UPDATE auxiliar SET idAuxiliar = _newId WHERE idAuxiliar = _id;
    SELECT * FROM auxiliar WHERE idAuxiliar = _newId;
END$$

DROP PROCEDURE IF EXISTS `sp_updateAuxLastName`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateAuxLastName` (IN `_id` INT(11), IN `_newLastName` VARCHAR(50))   BEGIN
	UPDATE auxiliar SET apellido = _newLastName WHERE idAuxiliar = _id;
    SELECT * FROM auxiliar WHERE apellido = _newLastName;
END$$

DROP PROCEDURE IF EXISTS `sp_updateAuxName`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateAuxName` (IN `_id` INT(11), IN `_newName` VARCHAR(40))   BEGIN
	UPDATE auxiliar SET nombre = _newName WHERE idAuxiliar = _id;
    SELECT * FROM auxiliar WHERE nombre = _newName;
END$$

DROP PROCEDURE IF EXISTS `sp_updateAuxNumber`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateAuxNumber` (IN `_id` INT(11), IN `_newNumber` VARCHAR(10))   BEGIN
	UPDATE auxiliar SET telefono = _newNumber WHERE idAuxiliar = _id;
    SELECT * FROM auxiliar WHERE telefono = _newNumber;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCoorEmail`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCoorEmail` (IN `_id` INT(11), IN `_newEmail` VARCHAR(50))   BEGIN
	UPDATE coordinador SET correo = _newEmail WHERE idCoordinador = _id;
    SELECT * FROM coordinador WHERE correo = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCoorId`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCoorId` (IN `_id` INT(11), IN `_newId` INT)   BEGIN
	UPDATE coordinador SET idCoordinador = _newId WHERE idCoordinador = _id;
    SELECT * FROM coordinador WHERE idCoordinador = _newId;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCoorLastName`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCoorLastName` (IN `_id` INT(11), IN `_newLastName` VARCHAR(50))   BEGIN
	UPDATE coordinador SET apellido = _newLastName WHERE idCoordinador = _id;
    SELECT * FROM coordinador WHERE apellido = _newLastName;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCoorName`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCoorName` (IN `_id` INT(11), IN `_newName` VARCHAR(40))   BEGIN
	UPDATE coordinador SET nombre = _newName WHERE idCoordinador = _id;
    SELECT * FROM coordinador WHERE nombre = _newName;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCoorNumber`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCoorNumber` (IN `_id` INT(11), IN `_newNumber` VARCHAR(10))   BEGIN
	UPDATE coordinador SET telefono = _newNumber WHERE idCoordinador = _id;
    SELECT * FROM coordinador WHERE telefono = _newNumber;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCourse`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCourse` (IN `_id` INT(11), IN `_newCourse` VARCHAR(1))   BEGIN
	UPDATE curso SET curso = _newCourse WHERE idCurso = _id;
    SELECT * FROM curso WHERE idCurso = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCourseCAlum`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCourseCAlum` (IN `_id` INT(11), IN `_newCAlum` BIGINT(20))   BEGIN
	UPDATE curso SET cantAlumnos = _newCAlum WHERE idCurso = _id;
    SELECT * FROM curso WHERE idCurso = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCourseGrade`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCourseGrade` (IN `_id` INT(11), IN `_newGrade` INT(2))   BEGIN
	UPDATE curso SET grado = _newGrade WHERE idCurso = _id;
    SELECT * FROM curso	 WHERE idCurso = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCourseId`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCourseId` (IN `_id` INT(11), IN `_newId` INT)   BEGIN
	UPDATE curso SET idCurso = _newId WHERE idCurso = _id;
    SELECT * FROM curso WHERE idCurso = _newId;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCourseJ`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCourseJ` (IN `_id` INT(11), IN `_newJ` VARCHAR(1))   BEGIN
	UPDATE curso SET jornada = _newJ WHERE idCurso = _id;
    SELECT * FROM curso WHERE idCurso = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCourseState`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCourseState` (IN `_id` INT(11), IN `_newState` VARCHAR(1))   BEGIN
	UPDATE curso SET estado = _newState WHERE idCurso = _id;
    SELECT * FROM curso WHERE idCurso = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCourseTeach`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCourseTeach` (IN `_id` INT(11), IN `_newTeach` VARCHAR(20))   BEGIN
	UPDATE curso SET profesor = _newTeach WHERE idCurso = _id;
    SELECT * FROM curso WHERE idCurso = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCuReCant`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCuReCant` (IN `_id` INT(11), IN `_newCant` VARCHAR(1))   BEGIN
	UPDATE curso_refrigerio SET cantidad = _newCant WHERE idEntregaRefri = _id;
    SELECT * FROM curso_refrigerio WHERE idEntregaRefri = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCuReCursoId`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCuReCursoId` (IN `_id` INT(11), IN `_newIdCurso` BIGINT(20))   BEGIN
	UPDATE curso_refrigerio SET curso_idCurso = _newIdCurso WHERE idEntregaRefri = _id;
    SELECT * FROM curso_refrigerio WHERE idEntregaRefri = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCuReDate`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCuReDate` (IN `_id` INT(11), IN `_newDate` DATE)   BEGIN
	UPDATE curso_refrigerio SET fechaEntregaRefri = _newDate WHERE idEntregaRefri = _id;
    SELECT * FROM curso_refrigerio WHERE idEntregaRefri = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCuReId`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCuReId` (IN `_id` INT(11), IN `_newId` INT)   BEGIN
	UPDATE curso_refrigerio SET idEntregaRefri = _newId WHERE idEntregaRefri = _id;
    SELECT * FROM curso_refrigerio WHERE idEntregaRefri = _newId;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCuReRefriId`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCuReRefriId` (IN `_id` INT(11), IN `_newIdRefri` VARCHAR(20))   BEGIN
	UPDATE curso_refrigerio SET refrigerio_idRefrigerio = _newIdRefri WHERE idEntregaRefri = _id;
    SELECT * FROM curso_refrigerio WHERE idEntregaRefri = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateCuReTime`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateCuReTime` (IN `_id` INT(11), IN `_newTime` TIME)   BEGIN
	UPDATE curso_refrigerio SET horaEntregaRefri = _newTime WHERE idEntregaRefri = _id;
    SELECT * FROM curso_refrigerio WHERE idEntregaRefri = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateSnackAux`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateSnackAux` (IN `_id` INT(11), IN `_newAux` VARCHAR(50))   BEGIN
	UPDATE refrigerio SET auxiliar = _newAux WHERE idRefrigerio = _id;
    SELECT * FROM refrigerio WHERE idRefrigerio = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateSnackCant`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateSnackCant` (IN `_id` INT(11), IN `_newCant` VARCHAR(10))   BEGIN
	UPDATE refrigerio SET cantidad = _newCant WHERE idRefrigerio = _id;
    SELECT * FROM refrigerio WHERE idRefrigerio = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateSnackCoor`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateSnackCoor` (IN `_id` INT(11), IN `_newCoor` VARCHAR(50))   BEGIN
	UPDATE refrigerio SET coordinador = _newCoor WHERE idRefrigerio = _id;
    SELECT * FROM refrigerio WHERE idRefrigerio = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateSnackDate`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateSnackDate` (IN `_id` INT(11), IN `_newDate` VARCHAR(50))   BEGIN
	UPDATE refrigerio SET fecha = _newDate WHERE idRefrigerio = _id;
    SELECT * FROM refrigerio WHERE idRefrigerio = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateSnackDescri`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateSnackDescri` (IN `_id` INT(11), IN `_newDescri` VARCHAR(100))   BEGIN
	UPDATE refrigerio SET descripcion = _newDescri WHERE idRefrigerio = _id;
    SELECT * FROM refrigerio WHERE idRefrigerio = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateSnackId`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateSnackId` (IN `_id` INT(11), IN `_newId` INT)   BEGIN
	UPDATE refrigerio SET idRefrigerio = _newId WHERE idRefrigerio = _id;
    SELECT * FROM refrigerio WHERE idRefrigerio = _newId;
END$$

DROP PROCEDURE IF EXISTS `sp_updateSnackTime`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateSnackTime` (IN `_id` INT(11), IN `_newTime` VARCHAR(40))   BEGIN
	UPDATE refrigerio SET hora = _newTime WHERE idRefrigerio = _id;
    SELECT * FROM refrigerio WHERE hora = _newTime;
END$$

DROP PROCEDURE IF EXISTS `sp_updateSnackType`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateSnackType` (IN `_id` INT(11), IN `_newType` VARCHAR(50))   BEGIN
	UPDATE refrigerio SET tipo = _newType WHERE idRefrigerio = _id;
    SELECT * FROM refrigerio WHERE idRefrigerio = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateUserId`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateUserId` (IN `_id` INT, IN `_newId` INT)   BEGIN
	UPDATE usuario SET idUsuario = _newId WHERE idUsuario = _id;
    SELECT * FROM usuario WHERE idUsuario = _newId;
END$$

DROP PROCEDURE IF EXISTS `sp_updateUserName`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateUserName` (IN `_name` VARCHAR(40), IN `_newName` VARCHAR(40))   BEGIN
	UPDATE usuario SET usuario = _newName WHERE usuario = _name;
    SELECT * FROM usuario WHERE usuario = _newName;
END$$

DROP PROCEDURE IF EXISTS `sp_updateUserPass`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateUserPass` (IN `_pass` VARCHAR(20), IN `_newPass` VARCHAR(20))   BEGIN
	UPDATE usuario SET contrasenia = _newPass WHERE contrasenia = _pass;
    SELECT * FROM usuario WHERE contrasenia = _newPass;
END$$

DROP PROCEDURE IF EXISTS `sp_updateUserRol`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateUserRol` (IN `_id` INT(11), IN `_newRol` VARCHAR(20))   BEGIN
	UPDATE usuario SET rol = _newRol WHERE idUsuario = _id;
    SELECT * FROM usuario WHERE idUsuario = _id;
END$$

DROP PROCEDURE IF EXISTS `sp_updateUserState`$$
CREATE DEFINER=`id18786132_db`@`%` PROCEDURE `sp_updateUserState` (IN `_id` INT(11), IN `_newState` VARCHAR(1))   BEGIN
	UPDATE usuario SET estado = _newState WHERE idUsuario = _id;
    SELECT * FROM usuario WHERE idUsuario = _id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliar`
--

DROP TABLE IF EXISTS `auxiliar`;
CREATE TABLE `auxiliar` (
  `idAuxiliar` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auxiliar`
--

INSERT INTO `auxiliar` (`idAuxiliar`, `nombre`, `apellido`, `telefono`, `correo`, `usuario`) VALUES
(1, 'Carolina', 'Cepeda', '3126574585', 'caro.03@gmail.com', 3),
(2, 'Maria Camila', 'Jaramillo ', '3748652845', 'mariajara34567@gmail.com', 4),
(3, 'Karen', 'Escobar', '3103635793', 'kaes70837@gmail.com', 5),
(4, 'Juliana', 'Ramirez', '3245473356', 'julianaramirez54@gmail.com', 6),
(5, 'Samuel', 'Jimenez', '3603461854', 'jimenez654@hotmail.com', 7),
(6, 'Julian', 'Fichas', '3247685624', 'fichasjulififi@gmail.com', 8),
(7, 'Gabriela', 'Sanchez', '3126546534', 'ssgabriela56@gmail.com', 9),
(8, 'Jimena', 'Mendoza', '3657668668', 'jimemendojime@gmail.com', 10),
(9, 'Santiago', 'Pineda', '3126987257', 'pisantiago456@hotmail.com', 11),
(10, 'Dayana', 'Peralta', '3654896512', 'pepedada5646@gmail.com', 12),
(11, 'Laura', 'Alvarez', '3698745521', 'lauraalva876545@gmail.com', 13);

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
(1, 'Juan Carlos ', 'Cadavid', 'M', '3125467897', 'juanca@gmail.com', 1),
(2, 'Walter', 'Aguirre Bernal', 'T', '3129749743', 'waguirreb@educacionbogota.edu.co', 2);

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
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `contrasenia` varchar(20) DEFAULT NULL,
  `rol` varchar(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasenia`, `rol`, `estado`) VALUES
(1, 'ADMIN', 'AdMiN.33', 'Coordinador', 'A'),
(2, 'Juan Carlos', 'juandmin123', 'Auxiliar', 'A'),
(3, 'Walter', 'walteradmin123', 'Coordinador', 'A'),
(4, 'Carolina', 'caro023277', 'Auxiliar', 'A'),
(5, 'Maria Camila', 'Maria.33', 'Auxiliar', 'A'),
(6, 'Karen', '12543645245', 'Auxiliar', 'A'),
(7, 'Juliana', 'Juli.567', 'Auxiliar', 'A'),
(8, 'Samuel', '5758.e8', 'Auxiliar', 'A'),
(9, 'Julian', 'julian523', 'Auxiliar', 'A'),
(10, 'Gabriela', '3126546534', 'Auxiliar', 'A'),
(11, 'Jimena', 'xime3456.32', 'Auxiliar', 'A'),
(12, 'Santiago', 'santi.54.ss', 'Auxiliar', 'A'),
(13, 'Dayana', '3125698754', 'Auxiliar', 'A'),
(14, 'Laura', '1027653497', 'Auxiliar', 'A'),
(15, 'Samuel Sarmiento', '123', 'Auxiliar', 'A');

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
-- Estructura Stand-in para la vista `v_auxiliares`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_auxiliares`;
CREATE TABLE `v_auxiliares` (
`idUsuario` int(11)
,`usuario` varchar(40)
,`contrasenia` varchar(20)
,`rol` varchar(11)
,`estado` varchar(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_coordinadores`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_coordinadores`;
CREATE TABLE `v_coordinadores` (
`idUsuario` int(11)
,`usuario` varchar(40)
,`contrasenia` varchar(20)
,`rol` varchar(11)
,`estado` varchar(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_dateAuxiliar`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_dateAuxiliar`;
CREATE TABLE `v_dateAuxiliar` (
`nombre` varchar(40)
,`apellido` varchar(50)
,`telefono` varchar(10)
,`correo` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_dateCoordinador`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_dateCoordinador`;
CREATE TABLE `v_dateCoordinador` (
`nombre` varchar(40)
,`apellido` varchar(50)
,`telefono` varchar(10)
,`correo` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_dateCuRefri`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_dateCuRefri`;
CREATE TABLE `v_dateCuRefri` (
`idEntregaRefri` int(11)
,`horaEntregaRefri` time
,`fechaEntregaRefri` date
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_dateCurso`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_dateCurso`;
CREATE TABLE `v_dateCurso` (
`idCurso` int(11)
,`grado` int(2)
,`curso` varchar(1)
,`jornada` varchar(1)
,`cantAlumnos` bigint(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_dateRefri`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_dateRefri`;
CREATE TABLE `v_dateRefri` (
`hora` time
,`fecha` date
,`cantidad` bigint(20)
,`tipo` varchar(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_descriCurso`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_descriCurso`;
CREATE TABLE `v_descriCurso` (
`grado` int(2)
,`curso` varchar(1)
,`jornada` varchar(1)
,`profesor` varchar(20)
,`estado` varchar(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_descriRefri`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_descriRefri`;
CREATE TABLE `v_descriRefri` (
`cantidad` bigint(20)
,`tipo` varchar(1)
,`descripcion` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_entregaRefri`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_entregaRefri`;
CREATE TABLE `v_entregaRefri` (
`idEntregaRefri` int(11)
,`cantidad` int(11)
,`grado` int(2)
,`curso` varchar(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_userAuxiliar`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_userAuxiliar`;
CREATE TABLE `v_userAuxiliar` (
`nombre` varchar(40)
,`apellido` varchar(50)
,`correo` varchar(50)
,`usuario` int(11)
,`contrasenia` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_userCoordinador`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `v_userCoordinador`;
CREATE TABLE `v_userCoordinador` (
`nombre` varchar(40)
,`apellido` varchar(50)
,`correo` varchar(50)
,`usuario` int(11)
,`contrasenia` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_auxiliares`
--
DROP TABLE IF EXISTS `v_auxiliares`;

DROP VIEW IF EXISTS `v_auxiliares`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_auxiliares`  AS SELECT `usuario`.`idUsuario` AS `idUsuario`, `usuario`.`usuario` AS `usuario`, `usuario`.`contrasenia` AS `contrasenia`, `usuario`.`rol` AS `rol`, `usuario`.`estado` AS `estado` FROM `usuario` WHERE `usuario`.`rol` = 'Auxiliar' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_coordinadores`
--
DROP TABLE IF EXISTS `v_coordinadores`;

DROP VIEW IF EXISTS `v_coordinadores`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_coordinadores`  AS SELECT `usuario`.`idUsuario` AS `idUsuario`, `usuario`.`usuario` AS `usuario`, `usuario`.`contrasenia` AS `contrasenia`, `usuario`.`rol` AS `rol`, `usuario`.`estado` AS `estado` FROM `usuario` WHERE `usuario`.`rol` = 'Coordinador' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_dateAuxiliar`
--
DROP TABLE IF EXISTS `v_dateAuxiliar`;

DROP VIEW IF EXISTS `v_dateAuxiliar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_dateAuxiliar`  AS SELECT `auxiliar`.`nombre` AS `nombre`, `auxiliar`.`apellido` AS `apellido`, `auxiliar`.`telefono` AS `telefono`, `auxiliar`.`correo` AS `correo` FROM `auxiliar` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_dateCoordinador`
--
DROP TABLE IF EXISTS `v_dateCoordinador`;

DROP VIEW IF EXISTS `v_dateCoordinador`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_dateCoordinador`  AS SELECT `coordinador`.`nombre` AS `nombre`, `coordinador`.`apellido` AS `apellido`, `coordinador`.`telefono` AS `telefono`, `coordinador`.`correo` AS `correo` FROM `coordinador` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_dateCuRefri`
--
DROP TABLE IF EXISTS `v_dateCuRefri`;

DROP VIEW IF EXISTS `v_dateCuRefri`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_dateCuRefri`  AS SELECT `curso_refrigerio`.`idEntregaRefri` AS `idEntregaRefri`, `curso_refrigerio`.`horaEntregaRefri` AS `horaEntregaRefri`, `curso_refrigerio`.`fechaEntregaRefri` AS `fechaEntregaRefri` FROM `curso_refrigerio` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_dateCurso`
--
DROP TABLE IF EXISTS `v_dateCurso`;

DROP VIEW IF EXISTS `v_dateCurso`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_dateCurso`  AS SELECT `curso`.`idCurso` AS `idCurso`, `curso`.`grado` AS `grado`, `curso`.`curso` AS `curso`, `curso`.`jornada` AS `jornada`, `curso`.`cantAlumnos` AS `cantAlumnos` FROM `curso` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_dateRefri`
--
DROP TABLE IF EXISTS `v_dateRefri`;

DROP VIEW IF EXISTS `v_dateRefri`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_dateRefri`  AS SELECT `refrigerio`.`hora` AS `hora`, `refrigerio`.`fecha` AS `fecha`, `refrigerio`.`cantidad` AS `cantidad`, `refrigerio`.`tipo` AS `tipo` FROM `refrigerio` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_descriCurso`
--
DROP TABLE IF EXISTS `v_descriCurso`;

DROP VIEW IF EXISTS `v_descriCurso`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_descriCurso`  AS SELECT `curso`.`grado` AS `grado`, `curso`.`curso` AS `curso`, `curso`.`jornada` AS `jornada`, `curso`.`profesor` AS `profesor`, `curso`.`estado` AS `estado` FROM `curso` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_descriRefri`
--
DROP TABLE IF EXISTS `v_descriRefri`;

DROP VIEW IF EXISTS `v_descriRefri`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_descriRefri`  AS SELECT `refrigerio`.`cantidad` AS `cantidad`, `refrigerio`.`tipo` AS `tipo`, `refrigerio`.`descripcion` AS `descripcion` FROM `refrigerio` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_entregaRefri`
--
DROP TABLE IF EXISTS `v_entregaRefri`;

DROP VIEW IF EXISTS `v_entregaRefri`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_entregaRefri`  AS SELECT `cr`.`idEntregaRefri` AS `idEntregaRefri`, `cr`.`cantidad` AS `cantidad`, `c`.`grado` AS `grado`, `c`.`curso` AS `curso` FROM (`curso_refrigerio` `cr` join `curso` `c`) WHERE `c`.`idCurso` = `cr`.`curso_idCurso` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_userAuxiliar`
--
DROP TABLE IF EXISTS `v_userAuxiliar`;

DROP VIEW IF EXISTS `v_userAuxiliar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_userAuxiliar`  AS SELECT `a`.`nombre` AS `nombre`, `a`.`apellido` AS `apellido`, `a`.`correo` AS `correo`, `a`.`usuario` AS `usuario`, `u`.`contrasenia` AS `contrasenia` FROM (`auxiliar` `a` join `usuario` `u`) WHERE `a`.`usuario` = `u`.`idUsuario` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_userCoordinador`
--
DROP TABLE IF EXISTS `v_userCoordinador`;

DROP VIEW IF EXISTS `v_userCoordinador`;
CREATE ALGORITHM=UNDEFINED DEFINER=`id18786132_db`@`%` SQL SECURITY DEFINER VIEW `v_userCoordinador`  AS SELECT `c`.`nombre` AS `nombre`, `c`.`apellido` AS `apellido`, `c`.`correo` AS `correo`, `c`.`usuario` AS `usuario`, `u`.`contrasenia` AS `contrasenia` FROM (`coordinador` `c` join `usuario` `u`) WHERE `c`.`usuario` = `u`.`idUsuario` ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
