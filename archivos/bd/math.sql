-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2013 a las 20:34:27
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `contenidos`
--

DROP TABLE IF EXISTS `contenidos`;
CREATE TABLE IF NOT EXISTS `contenidos` (
  `id` int(11) NOT NULL,
  `state_contenido` enum('active','inactive') NOT NULL DEFAULT 'active',
  `titulo` varchar(45) DEFAULT NULL,
  `texto` text,
  `observacion` text,
  `tipo_contenido_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`tipo_contenido_id`),
  KEY `fk_contenidos_tipo_contenido1_idx` (`tipo_contenido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_curso`
--

DROP TABLE IF EXISTS `contenidos_curso`;
CREATE TABLE IF NOT EXISTS `contenidos_curso` (
  `cursos_id` int(11) NOT NULL,
  `state_cu` enum('active','inactive') NOT NULL DEFAULT 'active',
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`contenidos_id`),
  KEY `fk_cursos_has_contenidos_contenidos1` (`contenidos_id`),
  KEY `fk_cursos_has_contenidos_cursos1` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_ejercicio`
--

DROP TABLE IF EXISTS `contenidos_ejercicio`;
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
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_curso` enum('active','inactive') NOT NULL DEFAULT 'active',
  `id_tipo_curso` varchar(45) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cursos_tipo_curso1` (`id_tipo_curso`),
  KEY `fk_cursos_docentes1` (`id_docente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `state_curso`, `id_tipo_curso`, `id_docente`) VALUES
(25, 'active', '8', 13),
(24, 'active', '8', 14),
(22, 'active', '9', 15),
(8, 'active', '8', 4),
(16, 'active', '2', 1),
(12, 'active', '4', 4),
(20, 'active', '8', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ecuaciones`
--

DROP TABLE IF EXISTS `Ecuaciones`;
CREATE TABLE IF NOT EXISTS `Ecuaciones` (
  `id_ecuacion` int(11) NOT NULL AUTO_INCREMENT,
  `state_ecuaciones` enum('active','inactive') NOT NULL DEFAULT 'active',
  `formula_matematica` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ecuacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `Ecuaciones`
--

INSERT INTO `Ecuaciones` (`id_ecuacion`, `state_ecuaciones`, `formula_matematica`) VALUES
(1, 'active', 'A = x + 6 + v'),
(2, 'active', 'A = x + c + 4'),
(3, 'active', 'A = x + c + v'),
(4, 'active', 'A = x + 2 + v');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

DROP TABLE IF EXISTS `ejercicios`;
CREATE TABLE IF NOT EXISTS `ejercicios` (
  `id_ejercicio` int(11) NOT NULL AUTO_INCREMENT,
  `state_ejercicios` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ejercicio` varchar(45) NOT NULL,
  `solucion` varchar(45) NOT NULL,
  `dificultada` int(3) NOT NULL COMMENT 'Esta tabla permite ingresase a una ecuación su grado de dificultad ',
  `valoracion_porcentaje` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ejercicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id_ejercicio`, `state_ejercicios`, `ejercicio`, `solucion`, `dificultada`, `valoracion_porcentaje`) VALUES
(1, 'active', 'X = A + B', '2', 1, '20'),
(2, 'active', 'B = 2 exp 2 - 2X', '3', 2, '40'),
(3, 'active', 'C = 3F + 2P', 'NN', 2, '90');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ejercicios_Ecuaciones`
--

DROP TABLE IF EXISTS `Ejercicios_Ecuaciones`;
CREATE TABLE IF NOT EXISTS `Ejercicios_Ecuaciones` (
  `ejercicios_id` int(11) NOT NULL,
  `state_ee` enum('active','inactive') NOT NULL DEFAULT 'active',
  `Ecuaciones_id_ecuacion` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id`,`Ecuaciones_id_ecuacion`),
  KEY `fk_ejercicios_has_Ecuaciones_Ecuaciones1` (`Ecuaciones_id_ecuacion`),
  KEY `fk_ejercicios_has_Ecuaciones_ejercicios1` (`ejercicios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

DROP TABLE IF EXISTS `evaluaciones`;
CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_evalucaciones` enum('active','inactive') NOT NULL DEFAULT 'active',
  `porcentaje` float NOT NULL,
  `tiempo_limite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evalucacion_integrante`
--

DROP TABLE IF EXISTS `evalucacion_integrante`;
CREATE TABLE IF NOT EXISTS `evalucacion_integrante` (
  `id_evaluacion` int(11) NOT NULL,
  `state_evalucacion_integrante` enum('active','inactive') NOT NULL DEFAULT 'active',
  `id_ejercicio` varchar(45) NOT NULL,
  `id_integrante_curso` varchar(45) NOT NULL,
  `tiempo_duracion` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion`,`id_ejercicio`,`id_integrante_curso`),
  KEY `fk_evalucacion_integrante_integrantes_curso1` (`id_integrante_curso`),
  KEY `fk_evalucacion_integrante_ejercicios1` (`id_ejercicio`),
  KEY `fk_evalucacion_integrante_evaluaciones1` (`id_evaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_videos`
--

DROP TABLE IF EXISTS `img_videos`;
CREATE TABLE IF NOT EXISTS `img_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_img_videos` enum('active','inactive') NOT NULL DEFAULT 'active',
  `url` varchar(100) DEFAULT NULL,
  `nombre` text,
  `type` enum('img','video') NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `img_videos`
--

INSERT INTO `img_videos` (`id`, `state_img_videos`, `url`, `nombre`, `type`, `descripcion`) VALUES
(3, 'active', 'http://www.youtube.com/embed/UgsSGvxsqfo', 'Video 1', 'video', 'Descripcion del curso'),
(4, 'active', 'http://www.youtube.com/embed/mH4l88VdaoE', 'Video 2', 'video', 'Descripcion del video 2.'),
(8, 'active', 'http://www.youtube.com/embed/sMIYtFFgbhI', 'ggdfgsd', 'video', 'sadf asdfasd fadsf safd '),
(9, 'active', 'http://localhost/PoliAulaLink/upload/3c62a86d-2059-4c27-9871-80ee8cc6caef', NULL, 'video', NULL),
(10, 'active', 'http://localhost/PoliAulaLink/upload/827359c2-3b39-45a2-8a13-8a67727b61a9', NULL, 'video', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_videos_has_contenidos`
--

DROP TABLE IF EXISTS `img_videos_has_contenidos`;
CREATE TABLE IF NOT EXISTS `img_videos_has_contenidos` (
  `img_videos_id` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  `state_video_has_contenidos` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`img_videos_id`,`contenidos_id`),
  KEY `fk_img_videos_has_contenidos_img_videos1_idx` (`img_videos_id`),
  KEY `fk_img_videos_has_contenidos_contenidos1_idx` (`contenidos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_curso`
--

DROP TABLE IF EXISTS `integrantes_curso`;
CREATE TABLE IF NOT EXISTS `integrantes_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_integrantes_curso` enum('active','inactive') NOT NULL DEFAULT 'active',
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
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `state_perfiles` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `state_perfiles`, `nombre`) VALUES
(1, 'active', 'Estudiante'),
(2, 'active', 'Docente'),
(3, 'active', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_permisos` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_perfil`
--

DROP TABLE IF EXISTS `permisos_perfil`;
CREATE TABLE IF NOT EXISTS `permisos_perfil` (
  `perfiles_id` int(11) NOT NULL,
  `state_permisos_perfil` enum('active','inactive') NOT NULL DEFAULT 'active',
  `permisos_id` int(11) NOT NULL,
  PRIMARY KEY (`perfiles_id`,`permisos_id`),
  KEY `fk_perfiles_has_permisos_permisos1` (`permisos_id`),
  KEY `fk_perfiles_has_permisos_perfiles1` (`perfiles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesion`
--

DROP TABLE IF EXISTS `Profesion`;
CREATE TABLE IF NOT EXISTS `Profesion` (
  `id_profesion` int(5) NOT NULL AUTO_INCREMENT,
  `state_profesion` enum('active','inactive') NOT NULL DEFAULT 'active',
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_profesion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `Profesion`
--

INSERT INTO `Profesion` (`id_profesion`, `state_profesion`, `descripcion`) VALUES
(1, 'active', 'Arquitectura'),
(2, 'active', 'Diseño de Interiores'),
(3, 'active', 'Diseño de Modas'),
(4, 'active', 'Diseño Gráfico'),
(5, 'active', 'Diseño Industrial'),
(6, 'active', 'Música'),
(7, 'active', 'Arte'),
(8, 'active', 'Agronomía'),
(9, 'active', 'Ciencias Ambientales'),
(10, 'active', 'Médico Veterinario'),
(11, 'active', 'Zootecnista'),
(12, 'active', 'Administración de Empresas'),
(13, 'active', 'Mercadotecnia'),
(14, 'active', 'Contaduría Pública y Auditoría'),
(15, 'active', 'Turismo'),
(16, 'active', 'Economía'),
(17, 'active', 'Estadística'),
(18, 'active', 'Medicina'),
(19, 'active', 'Psicopedagogía'),
(20, 'active', 'Enfermería'),
(21, 'active', 'Farmacia'),
(22, 'active', 'Sistemas'),
(23, 'active', 'Física'),
(24, 'active', 'Geología'),
(25, 'active', 'Química'),
(26, 'active', 'Matemática'),
(27, 'active', 'Bioquímico'),
(28, 'active', 'Derecho'),
(29, 'active', 'Antropología'),
(30, 'active', 'Ingeniería en Sistemas'),
(31, 'active', 'Filología'),
(32, 'active', 'Historia del Arte'),
(33, 'active', 'Ingeniería Civil'),
(34, 'active', 'Ingeniería Eléctrica'),
(35, 'active', 'Ingeniería Industrial'),
(36, 'active', 'Ingeniería Mecánica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contenido`
--

DROP TABLE IF EXISTS `tipo_contenido`;
CREATE TABLE IF NOT EXISTS `tipo_contenido` (
  `id_tipo_contenido` int(11) NOT NULL AUTO_INCREMENT,
  `state_tc` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_contenido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_contenido`
--

INSERT INTO `tipo_contenido` (`id_tipo_contenido`, `state_tc`, `nombre`, `descripcion`) VALUES
(1, 'active', 'Numero Reales', 'Esta es la descripcion de los numeros reales.'),
(2, 'active', 'Raices ', 'Imagenes y videos que ilustran estos temas'),
(3, 'active', 'Suma de fraccionario', 'Sum de frracciones.'),
(4, 'active', 'Trinomios', 'Oprección con trinomios.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_curso`
--

DROP TABLE IF EXISTS `tipo_curso`;
CREATE TABLE IF NOT EXISTS `tipo_curso` (
  `id_tipo_curso` int(5) NOT NULL AUTO_INCREMENT,
  `state_tp` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tipo_curso`
--

INSERT INTO `tipo_curso` (`id_tipo_curso`, `state_tp`, `nombre`) VALUES
(1, 'active', 'Propiedades de los reales'),
(2, 'active', 'Conjuntos e intervalos'),
(3, 'active', 'Valor absoluto y distancia.'),
(4, 'active', 'Introductiro algebra'),
(5, 'active', 'Definición de números complejos'),
(6, 'active', 'Operaciones con números complejos.'),
(7, 'active', 'Exponentes y radicales.'),
(8, 'active', 'Exponentes enteros'),
(9, 'active', 'Exponentes racionales'),
(10, 'active', 'Racionalización de denominadores'),
(11, 'active', 'Expresiones algebraicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

DROP TABLE IF EXISTS `universidad`;
CREATE TABLE IF NOT EXISTS `universidad` (
  `id_universidad` int(5) NOT NULL AUTO_INCREMENT,
  `state_universidad` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre_universidad` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_universidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id_universidad`, `state_universidad`, `nombre_universidad`) VALUES
(1, 'active', 'Escuela Superior de Administración Pública (ESAP)'),
(2, 'active', 'Universidad Nacional de Colombia (UNAL)'),
(3, 'active', ' Universidad Distrital Francisco José de Caldas'),
(4, 'active', 'Universidad Militar Nueva Granada (UMNG)'),
(5, 'active', 'Universidad Nacional Abierta y a Distancia (UNAD)'),
(6, 'active', 'Universidad Pedagógica Nacional'),
(7, 'active', 'Universidad Colegio Mayor de Cundinamarca'),
(8, 'active', ' Politécnico Colombiano Jaime Isaza Cadavid'),
(9, 'active', 'Instituto Tecnológico Metropolitano (ITM) '),
(10, 'active', ' Institución Universitaria de Envigado (IUE)'),
(11, 'active', 'Tecnológico de Antioquía (TDEA)'),
(12, 'active', ' Universidad EAFIT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `state_usuario` enum('active','inactive','incomplete_register') NOT NULL DEFAULT 'active',
  `nombre` varchar(30) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `contrasena` varchar(40) DEFAULT NULL,
  `telefono` int(15) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `id_profesion` int(11) DEFAULT NULL,
  `tipo_perfil` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_docentes_Profesion1` (`id_profesion`),
  KEY `fk_usuarios_perfiles1` (`tipo_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `state_usuario`, `nombre`, `apellido1`, `apellido2`, `contrasena`, `telefono`, `celular`, `correo`, `id_profesion`, `tipo_perfil`) VALUES
(12, 'active', 'oscar1', 'mesa1', 'dadsf', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2344827, '2147483647', 'oscarmesa.elpoli@gmail.com', 1, 3),
(13, 'active', 'perez', 'juanito', 'garcia', '972a76407ce2b5fbab8dc3c1bc17e60abb2cd57a', 123, '234', 'deosmega@hotmail.com', 30, 2),
(15, 'active', 'diana', 'bedoya', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 234448270, '2147483647', 'diana123@gmail.com', 36, 2),
(16, 'active', 'carlos', 'madrigal', 'tobon', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 12345678, '3012280744', 'c.ingeniero@gmail.com', 30, 2),
(17, 'active', 'Diego', 'Ochoa', 'perrita', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2147483647, '6876987698', 'diego8525@gmail.com', 34, 2),
(18, 'active', 'oscar', '', NULL, NULL, 0, '', 'oscarmesa.elpodddli@gmail.com', NULL, 1),
(19, 'active', 'oscar', '', NULL, NULL, 0, '', 'oscarmesa.elpodddli@gmail.com', NULL, 1),
(20, 'active', 'oscar', '', NULL, NULL, 0, '', 'oscarmesa.esflpodddli@gmail.com', NULL, 1),
(21, 'active', 'oscar', '', NULL, NULL, 0, '', 'oscarmesasas.esflpodddli@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_universidades`
--

DROP TABLE IF EXISTS `usuario_universidades`;
CREATE TABLE IF NOT EXISTS `usuario_universidades` (
  `id_usuario` int(11) NOT NULL,
  `state_uu` enum('active','inactive','complete_fields') NOT NULL DEFAULT 'active',
  `universidades_id` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`universidades_id`),
  KEY `fk_docentes_has_universidades_docentes1` (`id_usuario`),
  KEY `fk_usuario_universidades_universidad1` (`universidades_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
