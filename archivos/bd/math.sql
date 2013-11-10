-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-07-2012 a las 08:20:51
-- Versión del servidor: 5.1.36
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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

CREATE TABLE IF NOT EXISTS `contenidos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `texto` text,
  `observacion` text,
  `id_imagen` varchar(45) DEFAULT NULL,
  `dependencia` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contenidos_imagenes1` (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `contenidos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_curso`
--

CREATE TABLE IF NOT EXISTS `contenidos_curso` (
  `cursos_id` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`contenidos_id`),
  KEY `fk_cursos_has_contenidos_contenidos1` (`contenidos_id`),
  KEY `fk_cursos_has_contenidos_cursos1` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `contenidos_curso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_ejercicio`
--

CREATE TABLE IF NOT EXISTS `contenidos_ejercicio` (
  `contenidos_id` int(11) NOT NULL,
  `ejercicios_id` int(11) NOT NULL,
  PRIMARY KEY (`contenidos_id`,`ejercicios_id`),
  KEY `fk_contenidos_has_ejercicios_ejercicios1` (`ejercicios_id`),
  KEY `fk_contenidos_has_ejercicios_contenidos1` (`contenidos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `contenidos_ejercicio`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_evaluacion`
--

CREATE TABLE IF NOT EXISTS `contenidos_evaluacion` (
  `contenidos_id` int(11) NOT NULL,
  `evaluaciones_id` int(11) NOT NULL,
  PRIMARY KEY (`contenidos_id`,`evaluaciones_id`),
  KEY `fk_contenidos_has_evaluaciones_evaluaciones1` (`evaluaciones_id`),
  KEY `fk_contenidos_has_evaluaciones_contenidos1` (`contenidos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `contenidos_evaluacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_formula`
--

CREATE TABLE IF NOT EXISTS `contenidos_formula` (
  `formulas_id` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`formulas_id`,`contenidos_id`),
  KEY `fk_formulas_has_contenidos_contenidos1` (`contenidos_id`),
  KEY `fk_formulas_has_contenidos_formulas1` (`formulas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `contenidos_formula`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos_taller`
--

CREATE TABLE IF NOT EXISTS `contenidos_taller` (
  `talleres_id` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`talleres_id`,`contenidos_id`),
  KEY `fk_talleres_has_contenidos_contenidos1` (`contenidos_id`),
  KEY `fk_talleres_has_contenidos_talleres1` (`talleres_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `contenidos_taller`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(45) DEFAULT NULL,
  `id_tipo_curso` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cursos_usuarios` (`id_usuario`),
  KEY `fk_cursos_tipo_curso1` (`id_tipo_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `cursos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE IF NOT EXISTS `ejercicios` (
  `id` int(11) NOT NULL,
  `ejercicio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `ejercicios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ecuacion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `evaluaciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones_curso`
--

CREATE TABLE IF NOT EXISTS `evaluaciones_curso` (
  `cursos_id` int(11) NOT NULL,
  `evaluaciones_id` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`evaluaciones_id`),
  KEY `fk_cursos_has_evaluaciones_evaluaciones1` (`evaluaciones_id`),
  KEY `fk_cursos_has_evaluaciones_cursos1` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `evaluaciones_curso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulas`
--

CREATE TABLE IF NOT EXISTS `formulas` (
  `id` int(11) NOT NULL,
  `fomula` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `formulas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) DEFAULT NULL,
  `nombre` text,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `imagenes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_taller`
--

CREATE TABLE IF NOT EXISTS `imagenes_taller` (
  `talleres_id` int(11) NOT NULL,
  `imagenes_id` int(11) NOT NULL,
  PRIMARY KEY (`talleres_id`,`imagenes_id`),
  KEY `fk_talleres_has_imagenes_imagenes1` (`imagenes_id`),
  KEY `fk_talleres_has_imagenes_talleres1` (`talleres_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `imagenes_taller`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes_curso`
--

CREATE TABLE IF NOT EXISTS `integrantes_curso` (
  `usuarios_id` int(11) NOT NULL,
  `cursos_id` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `integrantes_curso_usuarios_id` int(11) NOT NULL,
  `integrantes_curso_cursos_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_id`,`cursos_id`),
  KEY `fk_usuarios_has_cursos_cursos1` (`cursos_id`),
  KEY `fk_usuarios_has_cursos_usuarios1` (`usuarios_id`),
  KEY `fk_integrantes_curso_integrantes_curso1` (`integrantes_curso_usuarios_id`,`integrantes_curso_cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `integrantes_curso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcar la base de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `descripcion`) VALUES
(3, 'Profesor', 'Control a medias'),
(26, 'Admin', 'all ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'modificacion', 'sdfdsfsdf'),
(2, 'manejo cuenta', ' dsdfd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_perfil`
--

CREATE TABLE IF NOT EXISTS `permisos_perfil` (
  `perfiles_id` int(11) NOT NULL,
  `permisos_id` int(11) NOT NULL,
  PRIMARY KEY (`perfiles_id`,`permisos_id`),
  KEY `fk_perfiles_has_permisos_permisos1` (`permisos_id`),
  KEY `fk_perfiles_has_permisos_perfiles1` (`perfiles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `permisos_perfil`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE IF NOT EXISTS `talleres` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `talleres`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_curso`
--

CREATE TABLE IF NOT EXISTS `tipo_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `tipo_curso`
--

INSERT INTO `tipo_curso` (`id`, `nombre`, `descripcion`) VALUES
(1, 'fdfgfdg', ' dfgdf'),
(2, 'fgfgfd', ' fdfdfd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `tipo_perfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_perfiles1` (`tipo_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

