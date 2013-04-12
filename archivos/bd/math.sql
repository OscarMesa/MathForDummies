# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: math
# Generation Time: 2013-01-27 20:05:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contenidos
# ------------------------------------------------------------
DROP DATABASE IF EXISTS math;
CREATE DATABASE math;
USE math;
DROP TABLE IF EXISTS `contenidos`;

CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL,
  `state_contenido` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `titulo` varchar(45) DEFAULT NULL,
  `texto` text,
  `observacion` text,
  `tipo_contenido_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`tipo_contenido_id`),
  KEY `fk_contenidos_tipo_contenido1_idx` (`tipo_contenido_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table contenidos_curso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contenidos_curso`;

CREATE TABLE `contenidos_curso` (
  `cursos_id` int(11) NOT NULL,
  `state_cu` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`contenidos_id`),
  KEY `fk_cursos_has_contenidos_contenidos1` (`contenidos_id`),
  KEY `fk_cursos_has_contenidos_cursos1` (`cursos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table contenidos_ejercicio
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contenidos_ejercicio`;

CREATE TABLE `contenidos_ejercicio` (
  `contenidos_id` int(11) NOT NULL,
  `state_ce` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `ejercicios_id` int(11) NOT NULL,
  PRIMARY KEY (`contenidos_id`,`ejercicios_id`),
  KEY `fk_contenidos_has_ejercicios_ejercicios1` (`ejercicios_id`),
  KEY `fk_contenidos_has_ejercicios_contenidos1` (`contenidos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table cursos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cursos`;

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_curso` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `id_tipo_curso` varchar(45) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cursos_tipo_curso1` (`id_tipo_curso`),
  KEY `fk_cursos_docentes1` (`id_docente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;

INSERT INTO `cursos` (`id`, `id_tipo_curso`, `id_docente`)
VALUES
  (25,'8',13),
  (24,'8',14),
  (22,'9',15),
  (8,'8',4),
  (16,'2',1),
  (12,'4',4),
  (20,'8',1);

/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Ecuaciones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Ecuaciones`;

CREATE TABLE `Ecuaciones` (
  `id_ecuacion` int(11) NOT NULL AUTO_INCREMENT,
  `state_ecuaciones` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `formula_matematica` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ecuacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Ecuaciones` WRITE;
/*!40000 ALTER TABLE `Ecuaciones` DISABLE KEYS */;

INSERT INTO `Ecuaciones` (`id_ecuacion`, `formula_matematica`)
VALUES
  (1,'A = x + 6 + v'),
  (2,'A = x + c + 4'),
  (3,'A = x + c + v'),
  (4,'A = x + 2 + v');

/*!40000 ALTER TABLE `Ecuaciones` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ejercicios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ejercicios`;

CREATE TABLE `ejercicios` (
  `id_ejercicio` int(11) NOT NULL AUTO_INCREMENT,
  `state_ejercicios` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `ejercicio` varchar(45) NOT NULL,
  `solucion` varchar(45) NOT NULL,
  `dificultada` int(3) NOT NULL COMMENT 'Esta tabla permite ingresase a una ecuación su grado de dificultad ',
  `valoracion_porcentaje` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ejercicio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `ejercicios` WRITE;
/*!40000 ALTER TABLE `ejercicios` DISABLE KEYS */;

INSERT INTO `ejercicios` (`id_ejercicio`, `ejercicio`, `solucion`, `dificultada`, `valoracion_porcentaje`)
VALUES
  (1,'X = A + B','2',1,'20'),
  (2,'B = 2 exp 2 - 2X','3',2,'40'),
  (3,'C = 3F + 2P','NN',2,'90');

/*!40000 ALTER TABLE `ejercicios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Ejercicios_Ecuaciones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Ejercicios_Ecuaciones`;

CREATE TABLE `Ejercicios_Ecuaciones` (
  `ejercicios_id` int(11) NOT NULL,
  `state_ee` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `Ecuaciones_id_ecuacion` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id`,`Ecuaciones_id_ecuacion`),
  KEY `fk_ejercicios_has_Ecuaciones_Ecuaciones1` (`Ecuaciones_id_ecuacion`),
  KEY `fk_ejercicios_has_Ecuaciones_ejercicios1` (`ejercicios_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table evaluaciones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evaluaciones`;

CREATE TABLE `evaluaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_evalucaciones` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `porcentaje` float NOT NULL,
  `tiempo_limite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table evalucacion_integrante
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evalucacion_integrante`;

CREATE TABLE `evalucacion_integrante` (
  `id_evaluacion` int(11) NOT NULL,
  `state_evalucacion_integrante` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `id_ejercicio` varchar(45) NOT NULL,
  `id_integrante_curso` varchar(45) NOT NULL,
  `tiempo_duracion` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion`,`id_ejercicio`,`id_integrante_curso`),
  KEY `fk_evalucacion_integrante_integrantes_curso1` (`id_integrante_curso`),
  KEY `fk_evalucacion_integrante_ejercicios1` (`id_ejercicio`),
  KEY `fk_evalucacion_integrante_evaluaciones1` (`id_evaluacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table img_videos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `img_videos`;

CREATE TABLE `img_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_img_videos` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `url` varchar(100) DEFAULT NULL,
  `nombre` text,
  `type` ENUM('img','video') NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table img_videos_has_contenidos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `img_videos_has_contenidos`;

CREATE TABLE `img_videos_has_contenidos` (
  `img_videos_id` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  `state_video_has_contenidos` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `contenidos_tipo_contenido_id` int(11) NOT NULL,
  PRIMARY KEY (`img_videos_id`,`contenidos_id`,`contenidos_tipo_contenido_id`),
  KEY `fk_img_videos_has_contenidos_contenidos1_idx` (`contenidos_id`,`contenidos_tipo_contenido_id`),
  KEY `fk_img_videos_has_contenidos_img_videos1_idx` (`img_videos_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table integrantes_curso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `integrantes_curso`;

CREATE TABLE `integrantes_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_integrantes_curso` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `cursos_id` int(11) NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cursos_id`,`id_integrante`),
  KEY `fk_usuarios_has_cursos_cursos1` (`cursos_id`),
  KEY `fk_integrantes_curso_usuarios1` (`id_integrante`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table perfiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `perfiles`;

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `state_perfiles` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;

INSERT INTO `perfiles` (`id_perfil`, `nombre`)
VALUES
  (1,'Estudiante'),
  (2,'Docente'),
  (3,'Administrador');

/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table permisos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_permisos` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table permisos_perfil
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permisos_perfil`;

CREATE TABLE `permisos_perfil` (
  `perfiles_id` int(11) NOT NULL,
  `state_permisos_perfil` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `permisos_id` int(11) NOT NULL,
  PRIMARY KEY (`perfiles_id`,`permisos_id`),
  KEY `fk_perfiles_has_permisos_permisos1` (`permisos_id`),
  KEY `fk_perfiles_has_permisos_perfiles1` (`perfiles_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table Profesion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Profesion`;

CREATE TABLE `Profesion` (
  `id_profesion` int(5) NOT NULL AUTO_INCREMENT,
  `state_profesion` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_profesion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `Profesion` WRITE;
/*!40000 ALTER TABLE `Profesion` DISABLE KEYS */;

INSERT INTO `Profesion` (`id_profesion`, `descripcion`)
VALUES
  (1,'Arquitectura'),
  (2,'Diseño de Interiores'),
  (3,'Diseño de Modas'),
  (4,'Diseño Gráfico'),
  (5,'Diseño Industrial'),
  (6,'Música'),
  (7,'Arte'),
  (8,'Agronomía'),
  (9,'Ciencias Ambientales'),
  (10,'Médico Veterinario'),
  (11,'Zootecnista'),
  (12,'Administración de Empresas'),
  (13,'Mercadotecnia'),
  (14,'Contaduría Pública y Auditoría'),
  (15,'Turismo'),
  (16,'Economía'),
  (17,'Estadística'),
  (18,'Medicina'),
  (19,'Psicopedagogía'),
  (20,'Enfermería'),
  (21,'Farmacia'),
  (22,'Sistemas'),
  (23,'Física'),
  (24,'Geología'),
  (25,'Química'),
  (26,'Matemática'),
  (27,'Bioquímico'),
  (28,'Derecho'),
  (29,'Antropología'),
  (30,'Ingeniería en Sistemas'),
  (31,'Filología'),
  (32,'Historia del Arte'),
  (33,'Ingeniería Civil'),
  (34,'Ingeniería Eléctrica'),
  (35,'Ingeniería Industrial'),
  (36,'Ingeniería Mecánica');

/*!40000 ALTER TABLE `Profesion` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tipo_contenido
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_contenido`;

CREATE TABLE `tipo_contenido` (
  `id_tipo_contenido` int(11) NOT NULL AUTO_INCREMENT,
  `state_tc` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_contenido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tipo_contenido` WRITE;
/*!40000 ALTER TABLE `tipo_contenido` DISABLE KEYS */;

INSERT INTO `tipo_contenido` (`id_tipo_contenido`, `nombre`, `descripcion`)
VALUES
  (1,'Numero Reales','Esta es la descripcion de los numeros reales.'),
  (2,'Raices ','Imagenes y videos que ilustran estos temas'),
  (3,'Suma de fraccionario','Sum de frracciones.'),
  (4,'Trinomios','Oprección con trinomios.');

/*!40000 ALTER TABLE `tipo_contenido` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tipo_curso
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_curso`;

CREATE TABLE `tipo_curso` (
  `id_tipo_curso` int(5) NOT NULL AUTO_INCREMENT,
  `state_tp` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_curso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tipo_curso` WRITE;
/*!40000 ALTER TABLE `tipo_curso` DISABLE KEYS */;

INSERT INTO `tipo_curso` (`id_tipo_curso`, `nombre`)
VALUES
  (1,'Propiedades de los reales'),
  (2,'Conjuntos e intervalos'),
  (3,'Valor absoluto y distancia.'),
  (4,'Introductiro algebra'),
  (5,'Definición de números complejos'),
  (6,'Operaciones con números complejos.'),
  (7,'Exponentes y radicales.'),
  (8,'Exponentes enteros'),
  (9,'Exponentes racionales'),
  (10,'Racionalización de denominadores'),
  (11,'Expresiones algebraicas');

/*!40000 ALTER TABLE `tipo_curso` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table universidad
# ------------------------------------------------------------

DROP TABLE IF EXISTS `universidad`;

CREATE TABLE `universidad` (
  `id_universidad` int(5) NOT NULL AUTO_INCREMENT,
  `state_universidad` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `nombre_universidad` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_universidad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `universidad` WRITE;
/*!40000 ALTER TABLE `universidad` DISABLE KEYS */;

INSERT INTO `universidad` (`id_universidad`, `nombre_universidad`)
VALUES
  (1,'Escuela Superior de Administración Pública (ESAP)'),
  (2,'Universidad Nacional de Colombia (UNAL)'),
  (3,' Universidad Distrital Francisco José de Caldas'),
  (4,'Universidad Militar Nueva Granada (UMNG)'),
  (5,'Universidad Nacional Abierta y a Distancia (UNAD)'),
  (6,'Universidad Pedagógica Nacional'),
  (7,'Universidad Colegio Mayor de Cundinamarca'),
  (8,' Politécnico Colombiano Jaime Isaza Cadavid'),
  (9,'Instituto Tecnológico Metropolitano (ITM) '),
  (10,' Institución Universitaria de Envigado (IUE)'),
  (11,'Tecnológico de Antioquía (TDEA)'),
  (12,' Universidad EAFIT');

/*!40000 ALTER TABLE `universidad` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usuario_universidades
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuario_universidades`;

CREATE TABLE `usuario_universidades` (
  `id_usuario` int(11) NOT NULL,
  `state_uu` ENUM('active','inactive') NOT NULL DEFAULT 'active',
  `universidades_id` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`universidades_id`),
  KEY `fk_docentes_has_universidades_docentes1` (`id_usuario`),
  KEY `fk_usuario_universidades_universidad1` (`universidades_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table usuarios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `state_usuario` ENUM('active','inactive') NOT NULL DEFAULT 'active',
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido1`, `apellido2`, `contrasena`, `telefono`, `celular`, `correo`, `id_profesion`, `tipo_perfil`)
VALUES
  (12,'oscar1','mesa1','dadsf','40bd001563085fc35165329ea1ff5c5ecbdbbeef',2344827,2147483647,'oscarmesa.elpoli@gmail.com',1,1),
  (13,'perez','juanito','garcia','972a76407ce2b5fbab8dc3c1bc17e60abb2cd57a',123,234,'pepito@gmail.com',30,2),
  (15,'diana','bedoya','','40bd001563085fc35165329ea1ff5c5ecbdbbeef',234448270,2147483647,'diana123@gmail.com',36,2);

/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
