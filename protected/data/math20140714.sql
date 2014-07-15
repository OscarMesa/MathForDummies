-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2014 a las 03:17:02
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `math`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_curso`
--

CREATE TABLE IF NOT EXISTS `comentarios_curso` (
  `idcurso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `comentario` varchar(45) NOT NULL,
  PRIMARY KEY (`idcurso`,`idusuario`),
  KEY `fk_Comentarios_curso_cursos1_idx` (`idcurso`),
  KEY `fk_Comentarios_curso_usuarios1_idx` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_evaluacion`
--

CREATE TABLE IF NOT EXISTS `comentarios_evaluacion` (
  `idusuario` int(11) NOT NULL,
  `idevaluacion` varchar(45) NOT NULL,
  `comentarios_evaluacion` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`,`idevaluacion`),
  KEY `fk_comentarios_evaluacion_usuarios1_idx` (`idusuario`),
  KEY `fk_comentarios_evaluacion_evaluaciones1_idx` (`idevaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_taller`
--

CREATE TABLE IF NOT EXISTS `comentarios_taller` (
  `idtaller` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `comentarios_taller` varchar(45) NOT NULL,
  PRIMARY KEY (`idtaller`,`idusuario`),
  KEY `fk_comentarios_taller_usuarios1_idx` (`idusuario`),
  KEY `fk_comentarios_taller_talleres1_idx` (`idtaller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE IF NOT EXISTS `contenidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_contenido` enum('active','inactive') NOT NULL DEFAULT 'active',
  `titulo` varchar(45) DEFAULT NULL,
  `texto` text,
  `observacion` text,
  `almacenado_total` tinyint(1) NOT NULL COMMENT 'este campo permite saber si un contenido se ha almenado en su totalidad o es un registro que puede o no ser tomado en cuenta.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `state_contenido`, `titulo`, `texto`, `observacion`, `almacenado_total`) VALUES
(166, 'inactive', 'oscar prueba algo mas.', '<b>esta es una prueba.</b><br><br><br><b>1. sfdasdfas</b>.<br><ul><li>2. dsfasfddsaf</li></ul>', 'adsfasdfasdfVideo', 1),
(179, 'active', 'Este es el titulo', 'Pequ;a descripciion<br>', 'asdfsadf', 1),
(195, 'active', 'contenido taller 1', 'Descripcion para le contenido 1.<br><br>Puntos a tratar.<br><br><ul><li>Punto&nbsp; uno.</li><li>Punto dos.</li></ul><blockquote>Otro texto.<br></blockquote>', 'observacion x.', 1),
(197, 'active', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_ejercicio`
--

CREATE TABLE IF NOT EXISTS `contenidos_ejercicio` (
  `contenidos_id` int(11) NOT NULL,
  `state_ce` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ejercicios_id` int(11) NOT NULL,
  PRIMARY KEY (`contenidos_id`,`ejercicios_id`),
  KEY `fk_contenidos_has_ejercicios_ejercicios1` (`ejercicios_id`),
  KEY `fk_contenidos_has_ejercicios_contenidos1` (`contenidos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_talleres`
--

CREATE TABLE IF NOT EXISTS `contenidos_talleres` (
  `contenidos_id` int(11) NOT NULL,
  `talleres_idtalleres` int(11) NOT NULL,
  PRIMARY KEY (`contenidos_id`,`talleres_idtalleres`),
  KEY `fk_contenidos_has_talleres_talleres1_idx` (`talleres_idtalleres`),
  KEY `fk_contenidos_has_talleres_contenidos1_idx` (`contenidos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contenidos_talleres`
--

INSERT INTO `contenidos_talleres` (`contenidos_id`, `talleres_idtalleres`) VALUES
(195, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_curso` enum('active','inactive') NOT NULL DEFAULT 'active',
  `id_docente` int(11) DEFAULT NULL,
  `idmateria` int(11) NOT NULL,
  `nombre_curso` varchar(45) DEFAULT NULL,
  `descripcion_curso` text NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cursos_docentes1` (`id_docente`),
  KEY `fk_cursos_materias1_idx` (`idmateria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `state_curso`, `id_docente`, `idmateria`, `nombre_curso`, `descripcion_curso`, `fecha_inicio`, `fecha_cierre`) VALUES
(1, 'active', 1, 1, 'asdf', 'sdf', '2014-03-27', '2014-04-19'),
(2, 'active', 1, 3, 'Fisica 1', 'Curso para la medicion.', '2014-06-14', '2014-06-15'),
(3, 'active', 1, 1, 'Matematicas discretas.', 'matematicas el curso de 1.', '2014-05-03', '2014-05-04'),
(4, 'active', 1, 1, 'kkjkkjjkkjklk kjjk', 'hhjhjhjhjhj', '2014-04-04', '2014-09-04'),
(5, 'active', 1, 1, 'Curso 1', 'esta es la descripcion.', '2014-05-01', '2014-09-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_evaluaciones`
--

CREATE TABLE IF NOT EXISTS `cursos_evaluaciones` (
  `cursos_id` int(11) NOT NULL,
  `evaluaciones_id` int(11) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `porcentaje` decimal(10,0) DEFAULT NULL COMMENT 'este es el porcentaje del examen con relacion al curso',
  `tiempo_limite` time DEFAULT NULL,
  PRIMARY KEY (`cursos_id`,`evaluaciones_id`),
  KEY `fk_cursos_has_evaluaciones_evaluaciones1_idx` (`evaluaciones_id`),
  KEY `fk_cursos_has_evaluaciones_cursos1_idx` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_has_tema`
--

CREATE TABLE IF NOT EXISTS `cursos_has_tema` (
  `cursos_id` int(11) NOT NULL,
  `tema_idtema` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`tema_idtema`),
  KEY `fk_cursos_has_tema_tema1_idx` (`tema_idtema`),
  KEY `fk_cursos_has_tema_cursos1_idx` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_juego`
--

CREATE TABLE IF NOT EXISTS `cursos_juego` (
  `cursos_id` int(11) NOT NULL,
  `juego_idjuego` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`juego_idjuego`),
  KEY `fk_cursos_has_juego_juego1_idx` (`juego_idjuego`),
  KEY `fk_cursos_has_juego_cursos1_idx` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_talleres`
--

CREATE TABLE IF NOT EXISTS `cursos_talleres` (
  `cursos_id` int(11) NOT NULL,
  `talleres_idtalleres` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`talleres_idtalleres`),
  KEY `fk_cursos_has_talleres_talleres1_idx` (`talleres_idtalleres`),
  KEY `fk_cursos_has_talleres_cursos1_idx` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE IF NOT EXISTS `ejercicios` (
  `id_ejercicio` int(11) NOT NULL AUTO_INCREMENT,
  `state_ejercicios` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ejercicio` varchar(45) NOT NULL,
  `solucion` varchar(45) NOT NULL,
  `dificultad` int(3) NOT NULL COMMENT 'Esta tabla permite ingresase a una ecuación su grado de dificultad ',
  `valoracion_porcentaje` varchar(45) NOT NULL,
  `idtema` int(11) DEFAULT NULL,
  `idusuariocreador` int(11) DEFAULT NULL,
  `IdDocente` int(11) DEFAULT NULL COMMENT 'cunado el creador del ejercicio es el docente, el creador y el iddocente es el mismo.',
  PRIMARY KEY (`id_ejercicio`),
  KEY `fk_ejercicios_tema1_idx` (`idtema`),
  KEY `fk_ejercicios_usuarios1_idx` (`idusuariocreador`),
  KEY `fk_ejercicios_usuarios2_idx` (`IdDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios_ecuaciones`
--

CREATE TABLE IF NOT EXISTS `ejercicios_ecuaciones` (
  `ejercicios_id` int(11) NOT NULL,
  `state_ee` enum('active','inactive') NOT NULL DEFAULT 'active',
  `Ecuaciones_id_ecuacion` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id`,`Ecuaciones_id_ecuacion`),
  KEY `fk_ejercicios_has_Ecuaciones_Ecuaciones1` (`Ecuaciones_id_ecuacion`),
  KEY `fk_ejercicios_has_Ecuaciones_ejercicios1` (`ejercicios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios_evaluaciones`
--

CREATE TABLE IF NOT EXISTS `ejercicios_evaluaciones` (
  `ejercicios_id_ejercicio` int(11) NOT NULL,
  `evaluaciones_id` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id_ejercicio`,`evaluaciones_id`),
  KEY `fk_ejercicios_has_evaluaciones_evaluaciones1_idx` (`evaluaciones_id`),
  KEY `fk_ejercicios_has_evaluaciones_ejercicios1_idx` (`ejercicios_id_ejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios_respuestaejercicio`
--

CREATE TABLE IF NOT EXISTS `ejercicios_respuestaejercicio` (
  `ejercicios_id_ejercicio` int(11) NOT NULL,
  `RespuestaEjercicio_idRespuestaEjercicio` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id_ejercicio`,`RespuestaEjercicio_idRespuestaEjercicio`),
  KEY `fk_ejercicios_has_RespuestaEjercicio_RespuestaEjercicio1_idx` (`RespuestaEjercicio_idRespuestaEjercicio`),
  KEY `fk_ejercicios_has_RespuestaEjercicio_ejercicios1_idx` (`ejercicios_id_ejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios_talleres`
--

CREATE TABLE IF NOT EXISTS `ejercicios_talleres` (
  `ejercicios_id_ejercicio` int(11) NOT NULL,
  `talleres_idtalleres` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id_ejercicio`,`talleres_idtalleres`),
  KEY `fk_ejercicios_has_talleres_talleres1_idx` (`talleres_idtalleres`),
  KEY `fk_ejercicios_has_talleres_ejercicios1_idx` (`ejercicios_id_ejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_evalucaciones` enum('active','inactive') NOT NULL DEFAULT 'active',
  `porcentaje` float NOT NULL,
  `tiempo_limite` int(11) NOT NULL,
  `competencia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evalucacion_integrante`
--

CREATE TABLE IF NOT EXISTS `evalucacion_integrante` (
  `id_evaluacion` int(11) NOT NULL,
  `state_evalucacion_integrante` enum('active','inactive') NOT NULL DEFAULT 'active',
  `id_integrante_curso` varchar(45) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion`,`id_integrante_curso`),
  KEY `fk_evalucacion_integrante_integrantes_curso1` (`id_integrante_curso`),
  KEY `fk_evalucacion_integrante_evaluaciones1` (`id_evaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_videos_sonido`
--

CREATE TABLE IF NOT EXISTS `img_videos_sonido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_img_videos` enum('active','inactive') NOT NULL DEFAULT 'active',
  `url` varchar(100) DEFAULT NULL,
  `nombre` text,
  `type` enum('img','video','sonido') NOT NULL,
  `descripcion` text,
  `idUsiario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_img_videos_sonido_usuarios1_idx` (`idUsiario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `img_videos_sonido`
--

INSERT INTO `img_videos_sonido` (`id`, `state_img_videos`, `url`, `nombre`, `type`, `descripcion`, `idUsiario`) VALUES
(1, 'active', '', 'ewrwqer', 'img', 'qewrwe', 1),
(2, 'active', '', 'fadasf', 'img', 'adsfdsaf', 1),
(3, 'active', 'themes/PoliAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', 1),
(4, 'active', 'themes/PoliAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', 1),
(5, 'active', 'themes/PoliAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', 1),
(6, 'active', 'themes/PoliAuLink/images/15/46.png', 'adsf', 'img', 'asdfdsaf', 1),
(7, 'active', 'themes/PoliAuLink/images/contenidos/49/273738_661765541_263078633_n.jpg', 'prueba', 'img', 'asdfsadf', 1),
(8, 'active', 'themes/PoliAuLink/images/contenidos/50/av-9.jpg', 'adsf', 'img', 'asdfsadf', 1),
(9, 'active', '', 'asdfasdf', 'video', 'Esta es la descripcion.', 1),
(10, 'active', '', 'sdfasdf', 'video', 'asdfsdf', 1),
(11, 'active', '', 'fasdf', 'video', 'fasdf', 1),
(12, 'active', '', 'prueba', 'video', 'asdfasdfasdf', 1),
(13, 'active', '', 'adfsdf', 'video', 'asdfsaf', 1),
(14, 'active', '', 'adfsdf', 'video', 'asdfsaf', 1),
(15, 'active', '', 'adfsdf', 'video', 'asdfsaf', 1),
(16, 'active', '', 'dadsf', 'video', 'dsfsa', 1),
(17, 'active', '', 'dadsf', 'video', 'dsfsa', 1),
(18, 'active', 'http://vimeo.com/85475429', 'dfasdf', 'video', 'asdfasdf', 1),
(19, 'active', 'http://vimeo.com/85475429', 'asfasfdhttp://vimeo.com/85475429', 'video', 'asdfasdfasdfadsf', 1),
(20, 'active', 'http://vimeo.com/85475429', 'asdfasdf', 'video', 'dsf', 1),
(21, 'active', 'themes/PoliAuLink/images/contenidos/160/273738_661765541_263078633_n.jpg', 'sdfg', 'img', 'sdfgsdfgsdf', 1),
(22, 'active', 'themes/PoliAuLink/images/contenidos/161/certificado.png', 'dfd', 'img', 'asdfasdf', 1),
(23, 'active', 'http://vimeo.com/85475429', 'asdfasdf', 'video', 'asdfasdf', 1),
(24, 'active', 'http://vimeo.com/85475429', 'tales', 'video', 'dasdfsafdsafdasdf', 1),
(25, 'active', 'http://vimeo.com/85475429', 'prueba', 'video', 'asdfasdf', 1),
(26, 'active', 'themes/PoliAuLink/images/contenidos/167/46.png', 'otra prueba', 'img', 'sadfasfdasdfasf', 1),
(27, 'active', 'themes/PoliAuLink/images/contenidos/178/10174854_655914264446567_765582406_n.jpg', 'contenido 1', 'img', 'esta es una prueba', 1),
(28, 'active', 'themes/PoliAuLink/images/contenidos/164/respiracion.jpg', 'Contenido 1', 'img', 'Descripcion.', 1),
(29, 'active', 'themes/PoliAuLink/images/contenidos/179/certificado.png', 'hello', 'img', 'asfsadfsdf', 1),
(30, 'active', 'themes/PoliAuLink/images/contenidos/166/576098_10150986024207739_1502339542_n.jpg', 'Imagen 1', 'img', 'Imagen para mostrar ejemplo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_videos_sonido_contenidos`
--

CREATE TABLE IF NOT EXISTS `img_videos_sonido_contenidos` (
  `img_videos_id` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  `state_video_has_contenidos` enum('active','inactive') NOT NULL DEFAULT 'active',
  `contenidos_tipo_contenido_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`img_videos_id`,`contenidos_id`,`contenidos_tipo_contenido_id`),
  KEY `fk_img_videos_has_contenidos_contenidos1_idx` (`contenidos_id`,`contenidos_tipo_contenido_id`),
  KEY `fk_img_videos_has_contenidos_img_videos1_idx` (`img_videos_id`),
  KEY `fk_img_videos_has_contenidos_contenidos1_idx1` (`contenidos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `img_videos_sonido_contenidos`
--

INSERT INTO `img_videos_sonido_contenidos` (`img_videos_id`, `contenidos_id`, `state_video_has_contenidos`, `contenidos_tipo_contenido_id`) VALUES
(29, 179, 'active', 0),
(30, 166, 'active', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_curso`
--

CREATE TABLE IF NOT EXISTS `integrantes_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_integrantes_curso` enum('active','inactive','penddocente','pendalumno') NOT NULL DEFAULT 'active',
  `cursos_id` int(11) NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cursos_id`,`id_integrante`),
  KEY `fk_usuarios_has_cursos_cursos1` (`cursos_id`),
  KEY `fk_integrantes_curso_usuarios1` (`id_integrante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE IF NOT EXISTS `juego` (
  `idjuego` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `dir_servidor` varchar(45) NOT NULL,
  PRIMARY KEY (`idjuego`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `idmaterias` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(45) DEFAULT NULL,
  `state_materia` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`idmaterias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`idmaterias`, `nombre_materia`, `state_materia`) VALUES
(1, 'Matematicas', 'active'),
(2, 'Español', 'active'),
(3, 'Fisica', 'active'),
(4, 'Quimica', 'active'),
(5, 'Bilogia', 'active'),
(6, 'Inglés', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_docente`
--

CREATE TABLE IF NOT EXISTS `materias_docente` (
  `materias_idmaterias` int(11) NOT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`materias_idmaterias`,`usuarios_id_usuario`),
  KEY `fk_materias_has_usuarios_usuarios1_idx` (`usuarios_id_usuario`),
  KEY `fk_materias_has_usuarios_materias1_idx` (`materias_idmaterias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `math_authassignment`
--

CREATE TABLE IF NOT EXISTS `math_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_math_authassignment_math_authitem1` (`itemname`),
  KEY `fk_math_authassignment_user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `math_authassignment`
--

INSERT INTO `math_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
(1, NULL, 'N;', 'invitados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `math_authitem`
--

CREATE TABLE IF NOT EXISTS `math_authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `math_authitem`
--

INSERT INTO `math_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_contenidos_admin', 0, '', NULL, 'N;'),
('action_contenidos_create', 0, '', NULL, 'N;'),
('action_contenidos_delete', 0, '', NULL, 'N;'),
('action_contenidos_index', 0, '', NULL, 'N;'),
('action_contenidos_update', 0, '', NULL, 'N;'),
('action_contenidos_view', 0, '', NULL, 'N;'),
('action_cursos_admin', 0, '', NULL, 'N;'),
('action_cursos_create', 0, '', NULL, 'N;'),
('action_cursos_curso', 0, '', NULL, 'N;'),
('action_cursos_delete', 0, '', NULL, 'N;'),
('action_cursos_index', 0, '', NULL, 'N;'),
('action_cursos_update', 0, '', NULL, 'N;'),
('action_cursos_view', 0, '', NULL, 'N;'),
('action_imgvideossonido_admin', 0, '', NULL, 'N;'),
('action_imgvideossonido_create', 0, '', NULL, 'N;'),
('action_imgvideossonido_delete', 0, '', NULL, 'N;'),
('action_imgvideossonido_index', 0, '', NULL, 'N;'),
('action_imgvideossonido_loadformulario', 0, '', NULL, 'N;'),
('action_imgvideossonido_loadmultimediabycontent', 0, '', NULL, 'N;'),
('action_imgvideossonido_savemultimediacontent', 0, '', NULL, 'N;'),
('action_imgvideossonido_update', 0, '', NULL, 'N;'),
('action_imgvideossonido_view', 0, '', NULL, 'N;'),
('action_site_ajaxiniciosesion', 0, '', NULL, 'N;'),
('action_site_ajaxrecuperar', 0, '', NULL, 'N;'),
('action_site_ajaxregistro', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_talleres_admin', 0, '', NULL, 'N;'),
('action_talleres_create', 0, '', NULL, 'N;'),
('action_talleres_delete', 0, '', NULL, 'N;'),
('action_talleres_index', 0, '', NULL, 'N;'),
('action_talleres_update', 0, '', NULL, 'N;'),
('action_talleres_view', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadmincreate', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_rbacajaxsetchilditem', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemchilditems', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemcreate', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemupdate', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbacusersassignments', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementdelete', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdate', 0, '', NULL, 'N;'),
('action_universidad_admin', 0, '', NULL, 'N;'),
('action_universidad_cargar', 0, '', NULL, 'N;'),
('action_universidad_create', 0, '', NULL, 'N;'),
('action_universidad_delete', 0, '', NULL, 'N;'),
('action_universidad_index', 0, '', NULL, 'N;'),
('action_universidad_update', 0, '', NULL, 'N;'),
('action_universidad_view', 0, '', NULL, 'N;'),
('action_usuarios_activardocente', 0, '', NULL, 'N;'),
('action_usuarios_activarusuario', 0, '', NULL, 'N;'),
('action_usuarios_active', 0, '', NULL, 'N;'),
('action_usuarios_admin', 0, '', NULL, 'N;'),
('action_usuarios_ajaxfiltrousuarios', 0, '', NULL, 'N;'),
('action_usuarios_cambiopassword', 0, '', NULL, 'N;'),
('action_usuarios_create', 0, '', NULL, 'N;'),
('action_usuarios_createanonimo', 0, '', NULL, 'N;'),
('action_usuarios_delete', 0, '', NULL, 'N;'),
('action_usuarios_guardarcambionuevopassword', 0, '', NULL, 'N;'),
('action_usuarios_inactive', 0, '', NULL, 'N;'),
('action_usuarios_index', 0, '', NULL, 'N;'),
('action_usuarios_inicio', 0, '', NULL, 'N;'),
('action_usuarios_recuperarpassword', 0, '', NULL, 'N;'),
('action_usuarios_update', 0, '', NULL, 'N;'),
('action_usuarios_view', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('controller_contenidos', 0, '', NULL, 'N;'),
('controller_cursos', 0, '', NULL, 'N;'),
('controller_imgvideossonido', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('controller_talleres', 0, '', NULL, 'N;'),
('controller_universidad', 0, '', NULL, 'N;'),
('controller_usuarios', 0, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'C:\\xampp\\htdocs\\PoliAuLink\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;'),
('invitados', 2, 'Rol invitado.', '', 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `math_authitemchild`
--

CREATE TABLE IF NOT EXISTS `math_authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `math_authitemchild`
--

INSERT INTO `math_authitemchild` (`parent`, `child`) VALUES
('invitados', 'action_cursos_curso'),
('invitados', 'action_site_ajaxiniciosesion'),
('invitados', 'action_site_ajaxrecuperar'),
('invitados', 'action_site_ajaxregistro'),
('invitados', 'action_site_contact'),
('invitados', 'action_site_error'),
('invitados', 'action_site_index'),
('invitados', 'action_site_login'),
('invitados', 'action_site_logout');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `math_field`
--

CREATE TABLE IF NOT EXISTS `math_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `longname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `useregexpmsg` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `math_field`
--

INSERT INTO `math_field` (`idfield`, `fieldname`, `longname`, `position`, `required`, `fieldtype`, `fieldsize`, `maxlength`, `showinreports`, `useregexp`, `useregexpmsg`, `predetvalue`) VALUES
(1, 'nombreusuario', 'Nombre Usuario', 2, 1, 0, 20, 45, 1, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `math_fieldvalue`
--

CREATE TABLE IF NOT EXISTS `math_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_math_fieldvalue_math_user1` (`iduser`),
  KEY `fk_math_fieldvalue_math_field1` (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `math_session`
--

CREATE TABLE IF NOT EXISTS `math_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `mathsession_iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `math_session`
--

INSERT INTO `math_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1404904957, 1404906757, 1, '127.0.0.1', 1, 1404904957, NULL, NULL),
(2, 1, 1404946231, 1404948031, 0, '127.0.0.1', 2, 1404946236, NULL, NULL),
(3, 1, 1405008747, 1405010547, 0, '127.0.0.1', 1, 1405008747, 1405009724, '127.0.0.1'),
(4, 1, 1405017761, 1405019561, 0, '127.0.0.1', 1, 1405017761, NULL, NULL),
(5, 1, 1405023471, 1405025271, 0, '127.0.0.1', 1, 1405023471, NULL, NULL),
(6, 1, 1405037198, 1405038998, 0, '127.0.0.1', 1, 1405037198, NULL, NULL),
(7, 1, 1405046327, 1405048127, 0, '127.0.0.1', 1, 1405046327, 1405046409, '127.0.0.1'),
(8, 1, 1405046658, 1405048458, 0, '127.0.0.1', 1, 1405046658, 1405046852, '127.0.0.1'),
(9, 1, 1405046872, 1405048672, 0, '127.0.0.1', 1, 1405046872, NULL, NULL),
(10, 1, 1405050079, 1405051879, 0, '127.0.0.1', 1, 1405050079, NULL, NULL),
(11, 1, 1405078035, 1405079835, 0, '127.0.0.1', 1, 1405078035, NULL, NULL),
(12, 1, 1405141826, 1405143626, 0, '127.0.0.1', 1, 1405141826, NULL, NULL),
(13, 1, 1405174366, 1405176166, 0, '127.0.0.1', 1, 1405174366, NULL, NULL),
(14, 1, 1405280706, 1405282506, 0, '127.0.0.1', 1, 1405280706, NULL, NULL),
(15, 1, 1405291186, 1405292986, 0, '127.0.0.1', 1, 1405291186, NULL, NULL),
(16, 1, 1405294275, 1405296075, 0, '127.0.0.1', 1, 1405294275, NULL, NULL),
(17, 1, 1405298010, 1405299810, 0, '127.0.0.1', 1, 1405298010, NULL, NULL),
(18, 1, 1405300915, 1405302715, 0, '127.0.0.1', 1, 1405300915, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `math_system`
--

CREATE TABLE IF NOT EXISTS `math_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `largename` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registerusingtermslabel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `math_system`
--

INSERT INTO `math_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 30, 10, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `math_user`
--

CREATE TABLE IF NOT EXISTS `math_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `math_user`
--

INSERT INTO `math_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1405300915, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'nopassword', NULL, 1, 0, 0),
(8, 1405294489, NULL, NULL, 'oscar', 'oscarmesa.elpoli@gmail.com', 'd7b89d8c', '490905b5811b93a53e397c1cfc99f137', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `state_perfiles` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `state_perfiles`, `nombre`) VALUES
(4, 'active', 'Docente'),
(5, 'active', 'Estudiante'),
(6, 'active', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_permisos` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `state_permisos`, `nombre`) VALUES
(1, 'active', 'insertar usuario'),
(2, 'active', 'seleccionar usario'),
(3, 'active', 'eliminar usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_perfil`
--

CREATE TABLE IF NOT EXISTS `permisos_perfil` (
  `perfiles_id` int(11) NOT NULL,
  `state_permisos_perfil` enum('active','inactive') NOT NULL DEFAULT 'active',
  `permisos_id` int(11) NOT NULL,
  PRIMARY KEY (`perfiles_id`,`permisos_id`),
  KEY `fk_perfiles_has_permisos_permisos1` (`permisos_id`),
  KEY `fk_perfiles_has_permisos_perfiles1` (`perfiles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos_perfil`
--

INSERT INTO `permisos_perfil` (`perfiles_id`, `state_permisos_perfil`, `permisos_id`) VALUES
(4, 'active', 1),
(4, 'active', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE IF NOT EXISTS `profesion` (
  `id_profesion` int(5) NOT NULL AUTO_INCREMENT,
  `state_profesion` enum('active','inactive') NOT NULL DEFAULT 'active',
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_profesion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestaejercicio`
--

CREATE TABLE IF NOT EXISTS `respuestaejercicio` (
  `idRespuestaEjercicio` int(11) NOT NULL,
  `respuesta_ejercicio` varchar(45) NOT NULL,
  `ordenposicion` enum('a','b','c','d','f') NOT NULL,
  `idContenido` int(11) DEFAULT NULL COMMENT 'SI a la respuesta se le desea indexar algun contenido que haga mas explicativa la respuesta.\n',
  `es_verdadero` enum('v','f') DEFAULT NULL,
  PRIMARY KEY (`idRespuestaEjercicio`),
  KEY `fk_RespuestaEjercicio_contenidos1_idx` (`idContenido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_evaluado`
--

CREATE TABLE IF NOT EXISTS `respuestas_evaluado` (
  `ejercicios_id_ejercicio` int(11) NOT NULL,
  `evalucacion_integrante_id_evaluacion` int(11) NOT NULL,
  `evalucacion_integrante_id_integrante_curso` varchar(45) NOT NULL,
  `respuesta_ejercicio` varchar(45) DEFAULT NULL,
  `es_verdadero` enum('v','f') DEFAULT NULL,
  `posicionrespuesta` enum('a','b','c','d','f') DEFAULT NULL,
  `fecha_respuesta` datetime DEFAULT NULL,
  PRIMARY KEY (`ejercicios_id_ejercicio`,`evalucacion_integrante_id_evaluacion`,`evalucacion_integrante_id_integrante_curso`),
  KEY `fk_ejercicios_has_evalucacion_integrante_evalucacion_integr_idx` (`evalucacion_integrante_id_evaluacion`,`evalucacion_integrante_id_integrante_curso`),
  KEY `fk_ejercicios_has_evalucacion_integrante_ejercicios1_idx` (`ejercicios_id_ejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE IF NOT EXISTS `talleres` (
  `idtalleres` int(11) NOT NULL AUTO_INCREMENT,
  `state_taller` enum('active','inactive') NOT NULL,
  `id_materia` int(5) NOT NULL,
  `id_curso` int(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idtalleres`),
  KEY `id_materia` (`id_materia`),
  KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`idtalleres`, `state_taller`, `id_materia`, `id_curso`, `nombre`, `descripcion`) VALUES
(1, 'active', 1, 1, 'Taller 2', 'Descripcion taller 2.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `idtema` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `idmateria` int(11) NOT NULL,
  PRIMARY KEY (`idtema`),
  KEY `fk_tema_materias1_idx` (`idmateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_contenidos`
--

CREATE TABLE IF NOT EXISTS `tema_contenidos` (
  `tema_idtema` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`tema_idtema`,`contenidos_id`),
  KEY `fk_tema_has_contenidos_contenidos1_idx` (`contenidos_id`),
  KEY `fk_tema_has_contenidos_tema1_idx` (`tema_idtema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_evaluaciones`
--

CREATE TABLE IF NOT EXISTS `tema_evaluaciones` (
  `tema_idtema` int(11) NOT NULL,
  `evaluaciones_id` int(11) NOT NULL,
  PRIMARY KEY (`tema_idtema`,`evaluaciones_id`),
  KEY `fk_tema_has_evaluaciones_evaluaciones1_idx` (`evaluaciones_id`),
  KEY `fk_tema_has_evaluaciones_tema1_idx` (`tema_idtema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_talleres`
--

CREATE TABLE IF NOT EXISTS `tema_talleres` (
  `tema_idtema` int(11) NOT NULL,
  `talleres_idtalleres` int(11) NOT NULL,
  PRIMARY KEY (`tema_idtema`,`talleres_idtalleres`),
  KEY `fk_tema_has_talleres_talleres1_idx` (`talleres_idtalleres`),
  KEY `fk_tema_has_talleres_tema1_idx` (`tema_idtema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE IF NOT EXISTS `universidad` (
  `id_universidad` int(5) NOT NULL AUTO_INCREMENT,
  `state_universidad` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre_universidad` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_universidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `state_usuario` enum('active','inactive','not_confirmed','not_confirmed_admin','recover_password') NOT NULL DEFAULT 'active',
  `nombre` varchar(30) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `contrasena` varchar(40) DEFAULT NULL,
  `telefono` int(15) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `state_usuario`, `nombre`, `apellido1`, `apellido2`, `contrasena`, `telefono`, `celular`, `correo`) VALUES
(1, 'active', 'oscar', 'mesa', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 5804661, '3012280744', 'oscarmesa.elpoli@gmail.com'),
(2, 'inactive', 'Diego', 'Ochoa', NULL, '9a98af001a57b6a9f8013ae51acf8ac2a05b5cd8', 5804661, '3012280744', 'diego8525@gmail.com'),
(3, 'active', 'ffsd', 'apellido1', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '0', 'diego8525@hotmail.com'),
(8, 'recover_password', 'oscar', '', NULL, '670882072561d9166a468c4df18d4d42798a469a', 0, '', 'oscar@nettic.com.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_contenidos`
--

CREATE TABLE IF NOT EXISTS `usuarios_contenidos` (
  `usuarios_id_usuario` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_id_usuario`,`contenidos_id`),
  KEY `fk_usuarios_has_contenidos_contenidos1_idx` (`contenidos_id`),
  KEY `fk_usuarios_has_contenidos_usuarios1_idx` (`usuarios_id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfiles`
--

CREATE TABLE IF NOT EXISTS `usuarios_perfiles` (
  `usuarios_id_usuario` int(11) NOT NULL,
  `perfiles_id_perfil` int(11) NOT NULL,
  `state_up` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`usuarios_id_usuario`,`perfiles_id_perfil`),
  KEY `fk_usuarios_has_perfiles_perfiles1_idx` (`perfiles_id_perfil`),
  KEY `fk_usuarios_has_perfiles_usuarios1_idx` (`usuarios_id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_perfiles`
--

INSERT INTO `usuarios_perfiles` (`usuarios_id_usuario`, `perfiles_id_perfil`, `state_up`) VALUES
(1, 4, 'active'),
(1, 5, 'active'),
(1, 6, 'active'),
(2, 4, 'active'),
(2, 5, 'active'),
(2, 6, 'active'),
(8, 4, 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_profesion`
--

CREATE TABLE IF NOT EXISTS `usuarios_profesion` (
  `id_usuario` int(11) NOT NULL,
  `Profesion_id_profesion` int(5) NOT NULL,
  PRIMARY KEY (`id_usuario`,`Profesion_id_profesion`),
  KEY `fk_usuarios_has_Profesion_Profesion1_idx` (`Profesion_id_profesion`),
  KEY `fk_usuarios_has_Profesion_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_universidades`
--

CREATE TABLE IF NOT EXISTS `usuario_universidades` (
  `id_usuario` int(11) NOT NULL,
  `state_uu` enum('active','inactive') NOT NULL DEFAULT 'active',
  `universidades_id` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`universidades_id`),
  KEY `fk_docentes_has_universidades_docentes1` (`id_usuario`),
  KEY `fk_usuario_universidades_universidad1` (`universidades_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenidos_talleres`
--
ALTER TABLE `contenidos_talleres`
  ADD CONSTRAINT `contenidos_talleres_ibfk_1` FOREIGN KEY (`contenidos_id`) REFERENCES `contenidos` (`id`),
  ADD CONSTRAINT `contenidos_talleres_ibfk_2` FOREIGN KEY (`talleres_idtalleres`) REFERENCES `talleres` (`idtalleres`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`idmaterias`);

--
-- Filtros para la tabla `img_videos_sonido_contenidos`
--
ALTER TABLE `img_videos_sonido_contenidos`
  ADD CONSTRAINT `img_videos_sonido_contenidos_ibfk_1` FOREIGN KEY (`img_videos_id`) REFERENCES `img_videos_sonido` (`id`),
  ADD CONSTRAINT `img_videos_sonido_contenidos_ibfk_3` FOREIGN KEY (`contenidos_id`) REFERENCES `contenidos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `math_authassignment`
--
ALTER TABLE `math_authassignment`
  ADD CONSTRAINT `fk_math_authassignment_math_authitem1` FOREIGN KEY (`itemname`) REFERENCES `math_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_math_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `math_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `math_authitemchild`
--
ALTER TABLE `math_authitemchild`
  ADD CONSTRAINT `mathauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `math_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mathauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `math_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `math_fieldvalue`
--
ALTER TABLE `math_fieldvalue`
  ADD CONSTRAINT `fk_math_fieldvalue_math_field1` FOREIGN KEY (`idfield`) REFERENCES `math_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_math_fieldvalue_math_user1` FOREIGN KEY (`iduser`) REFERENCES `math_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos_perfil`
--
ALTER TABLE `permisos_perfil`
  ADD CONSTRAINT `permisos_perfil_ibfk_1` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `permisos_perfil_ibfk_2` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`);

--
-- Filtros para la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD CONSTRAINT `talleres_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`idmaterias`),
  ADD CONSTRAINT `talleres_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD CONSTRAINT `usuarios_perfiles_ibfk_1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_perfiles_ibfk_2` FOREIGN KEY (`perfiles_id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_universidades`
--
ALTER TABLE `usuario_universidades`
  ADD CONSTRAINT `usuario_universidades_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usuario_universidades_ibfk_2` FOREIGN KEY (`universidades_id`) REFERENCES `universidad` (`id_universidad`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
