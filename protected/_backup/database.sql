-- -------------------------------------------~
SET SQL_QUOTE_SHOW_CREATE = 1~
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0~
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0~
-- -------------------------------------------~
-- -------------------------------------------~
-- START BACKUP~
-- -------------------------------------------~
-- -------------------------------------------~
-- TABLE `comentarios_curso`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `comentarios_curso`~
CREATE TABLE IF NOT EXISTS `comentarios_curso` (
  `idcurso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `comentario` varchar(45) NOT NULL,
  PRIMARY KEY (`idcurso`,`idusuario`),
  KEY `fk_Comentarios_curso_cursos1_idx` (`idcurso`),
  KEY `fk_Comentarios_curso_usuarios1_idx` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `comentarios_evaluacion`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `comentarios_evaluacion`~
CREATE TABLE IF NOT EXISTS `comentarios_evaluacion` (
  `idusuario` int(11) NOT NULL,
  `idevaluacion` varchar(45) NOT NULL,
  `comentarios_evaluacion` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`,`idevaluacion`),
  KEY `fk_comentarios_evaluacion_usuarios1_idx` (`idusuario`),
  KEY `fk_comentarios_evaluacion_evaluaciones1_idx` (`idevaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `comentarios_taller`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `comentarios_taller`~
CREATE TABLE IF NOT EXISTS `comentarios_taller` (
  `idtaller` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `comentarios_taller` varchar(45) NOT NULL,
  PRIMARY KEY (`idtaller`,`idusuario`),
  KEY `fk_comentarios_taller_usuarios1_idx` (`idusuario`),
  KEY `fk_comentarios_taller_talleres1_idx` (`idtaller`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `contenidos`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `contenidos`~
CREATE TABLE IF NOT EXISTS `contenidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_contenido` enum('active','inactive') NOT NULL DEFAULT 'active',
  `titulo` varchar(45) DEFAULT NULL,
  `texto` text,
  `observacion` text,
  `almacenado_total` tinyint(1) NOT NULL COMMENT 'este campo permite saber si un contenido se ha almenado en su totalidad o es un registro que puede o no ser tomado en cuenta.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `contenidos_ejercicio`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `contenidos_ejercicio`~
CREATE TABLE IF NOT EXISTS `contenidos_ejercicio` (
  `contenidos_id` int(11) NOT NULL,
  `state_ce` enum('active','inactive') NOT NULL DEFAULT 'active',
  `ejercicios_id` int(11) NOT NULL,
  PRIMARY KEY (`contenidos_id`,`ejercicios_id`),
  KEY `fk_contenidos_has_ejercicios_ejercicios1` (`ejercicios_id`),
  KEY `fk_contenidos_has_ejercicios_contenidos1` (`contenidos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `contenidos_talleres`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `contenidos_talleres`~
CREATE TABLE IF NOT EXISTS `contenidos_talleres` (
  `contenidos_id` int(11) NOT NULL,
  `talleres_idtalleres` int(11) NOT NULL,
  PRIMARY KEY (`contenidos_id`,`talleres_idtalleres`),
  KEY `fk_contenidos_has_talleres_talleres1_idx` (`talleres_idtalleres`),
  KEY `fk_contenidos_has_talleres_contenidos1_idx` (`contenidos_id`),
  CONSTRAINT `contenidos_talleres_ibfk_1` FOREIGN KEY (`contenidos_id`) REFERENCES `contenidos` (`id`),
  CONSTRAINT `contenidos_talleres_ibfk_2` FOREIGN KEY (`talleres_idtalleres`) REFERENCES `talleres` (`idtalleres`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `cursos`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `cursos`~
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_curso` enum('active','inactive') NOT NULL DEFAULT 'active',
  `id_docente` int(11) DEFAULT NULL,
  `idmateria` int(11) NOT NULL,
  `nombre_curso` varchar(45) DEFAULT NULL,
  `descripcion_curso` text NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `tiene_foro` int(1) DEFAULT NULL,
  `id_grado` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_cursos_docentes1` (`id_docente`),
  KEY `fk_cursos_materias1_idx` (`idmateria`),
  KEY `cursos_fk_grado` (`id_grado`),
  CONSTRAINT `cursos_fk_grado` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON UPDATE CASCADE,
  CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `math_user` (`iduser`),
  CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`idmateria`) REFERENCES `materias` (`idmaterias`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Campo que vincula el curso a un grado escolar.'~

-- -------------------------------------------~
-- TABLE `cursos_evaluaciones`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `cursos_evaluaciones`~
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `cursos_juego`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `cursos_juego`~
CREATE TABLE IF NOT EXISTS `cursos_juego` (
  `cursos_id` int(11) NOT NULL,
  `juego_idjuego` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`juego_idjuego`),
  KEY `fk_cursos_has_juego_juego1_idx` (`juego_idjuego`),
  KEY `fk_cursos_has_juego_cursos1_idx` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `cursos_talleres`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `cursos_talleres`~
CREATE TABLE IF NOT EXISTS `cursos_talleres` (
  `cursos_id` int(11) NOT NULL,
  `talleres_idtalleres` int(11) NOT NULL,
  PRIMARY KEY (`cursos_id`,`talleres_idtalleres`),
  KEY `fk_cursos_has_talleres_talleres1_idx` (`talleres_idtalleres`),
  KEY `fk_cursos_has_talleres_cursos1_idx` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `ejercicios`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `ejercicios`~
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `ejercicios_ecuaciones`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `ejercicios_ecuaciones`~
CREATE TABLE IF NOT EXISTS `ejercicios_ecuaciones` (
  `ejercicios_id` int(11) NOT NULL,
  `state_ee` enum('active','inactive') NOT NULL DEFAULT 'active',
  `Ecuaciones_id_ecuacion` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id`,`Ecuaciones_id_ecuacion`),
  KEY `fk_ejercicios_has_Ecuaciones_Ecuaciones1` (`Ecuaciones_id_ecuacion`),
  KEY `fk_ejercicios_has_Ecuaciones_ejercicios1` (`ejercicios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `ejercicios_evaluaciones`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `ejercicios_evaluaciones`~
CREATE TABLE IF NOT EXISTS `ejercicios_evaluaciones` (
  `ejercicios_id_ejercicio` int(11) NOT NULL,
  `evaluaciones_id` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id_ejercicio`,`evaluaciones_id`),
  KEY `fk_ejercicios_has_evaluaciones_evaluaciones1_idx` (`evaluaciones_id`),
  KEY `fk_ejercicios_has_evaluaciones_ejercicios1_idx` (`ejercicios_id_ejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `ejercicios_respuestaejercicio`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `ejercicios_respuestaejercicio`~
CREATE TABLE IF NOT EXISTS `ejercicios_respuestaejercicio` (
  `ejercicios_id_ejercicio` int(11) NOT NULL,
  `RespuestaEjercicio_idRespuestaEjercicio` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id_ejercicio`,`RespuestaEjercicio_idRespuestaEjercicio`),
  KEY `fk_ejercicios_has_RespuestaEjercicio_RespuestaEjercicio1_idx` (`RespuestaEjercicio_idRespuestaEjercicio`),
  KEY `fk_ejercicios_has_RespuestaEjercicio_ejercicios1_idx` (`ejercicios_id_ejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `ejercicios_talleres`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `ejercicios_talleres`~
CREATE TABLE IF NOT EXISTS `ejercicios_talleres` (
  `ejercicios_id_ejercicio` int(11) NOT NULL,
  `talleres_idtalleres` int(11) NOT NULL,
  PRIMARY KEY (`ejercicios_id_ejercicio`,`talleres_idtalleres`),
  KEY `fk_ejercicios_has_talleres_talleres1_idx` (`talleres_idtalleres`),
  KEY `fk_ejercicios_has_talleres_ejercicios1_idx` (`ejercicios_id_ejercicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `estados`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `estados`~
CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `evaluaciones`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `evaluaciones`~
CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_evalucaciones` enum('active','inactive') NOT NULL DEFAULT 'active',
  `porcentaje` float NOT NULL,
  `tiempo_limite` int(11) NOT NULL,
  `competencia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `evalucacion_integrante`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `evalucacion_integrante`~
CREATE TABLE IF NOT EXISTS `evalucacion_integrante` (
  `id_evaluacion` int(11) NOT NULL,
  `state_evalucacion_integrante` enum('active','inactive') NOT NULL DEFAULT 'active',
  `id_integrante_curso` varchar(45) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion`,`id_integrante_curso`),
  KEY `fk_evalucacion_integrante_integrantes_curso1` (`id_integrante_curso`),
  KEY `fk_evalucacion_integrante_evaluaciones1` (`id_evaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `grado`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `grado`~
CREATE TABLE IF NOT EXISTS `grado` (
  `id_grado` int(5) NOT NULL AUTO_INCREMENT,
  `desc_numerica` int(5) NOT NULL,
  `desc_verbal` varchar(100) NOT NULL COMMENT 'Descripcion verbal del grado, por ejemplo: sexto, decimo, once',
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `img_videos_sonido`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `img_videos_sonido`~
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `img_videos_sonido_contenidos`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `img_videos_sonido_contenidos`~
CREATE TABLE IF NOT EXISTS `img_videos_sonido_contenidos` (
  `img_videos_id` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  `state_video_has_contenidos` enum('active','inactive') NOT NULL DEFAULT 'active',
  `contenidos_tipo_contenido_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`img_videos_id`,`contenidos_id`,`contenidos_tipo_contenido_id`),
  KEY `fk_img_videos_has_contenidos_contenidos1_idx` (`contenidos_id`,`contenidos_tipo_contenido_id`),
  KEY `fk_img_videos_has_contenidos_img_videos1_idx` (`img_videos_id`),
  KEY `fk_img_videos_has_contenidos_contenidos1_idx1` (`contenidos_id`),
  CONSTRAINT `img_videos_sonido_contenidos_ibfk_1` FOREIGN KEY (`img_videos_id`) REFERENCES `img_videos_sonido` (`id`),
  CONSTRAINT `img_videos_sonido_contenidos_ibfk_3` FOREIGN KEY (`contenidos_id`) REFERENCES `contenidos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `integrantes_curso`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `integrantes_curso`~
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `juego`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `juego`~
CREATE TABLE IF NOT EXISTS `juego` (
  `idjuego` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `dir_servidor` varchar(45) NOT NULL,
  PRIMARY KEY (`idjuego`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `materias`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `materias`~
CREATE TABLE IF NOT EXISTS `materias` (
  `idmaterias` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(45) DEFAULT NULL,
  `state_materia` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`idmaterias`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `materias_docente`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `materias_docente`~
CREATE TABLE IF NOT EXISTS `materias_docente` (
  `materias_idmaterias` int(11) NOT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`materias_idmaterias`,`usuarios_id_usuario`),
  KEY `fk_materias_has_usuarios_usuarios1_idx` (`usuarios_id_usuario`),
  KEY `fk_materias_has_usuarios_materias1_idx` (`materias_idmaterias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `math_authassignment`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `math_authassignment`~
CREATE TABLE IF NOT EXISTS `math_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_math_authassignment_math_authitem1` (`itemname`),
  KEY `fk_math_authassignment_user` (`userid`),
  CONSTRAINT `fk_math_authassignment_math_authitem1` FOREIGN KEY (`itemname`) REFERENCES `math_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_math_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `math_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci~

-- -------------------------------------------~
-- TABLE `math_authitem`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `math_authitem`~
CREATE TABLE IF NOT EXISTS `math_authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci~

-- -------------------------------------------~
-- TABLE `math_authitemchild`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `math_authitemchild`~
CREATE TABLE IF NOT EXISTS `math_authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `mathauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `math_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mathauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `math_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci~

-- -------------------------------------------~
-- TABLE `math_field`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `math_field`~
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci~

-- -------------------------------------------~
-- TABLE `math_fieldvalue`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `math_fieldvalue`~
CREATE TABLE IF NOT EXISTS `math_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_math_fieldvalue_math_user1` (`iduser`),
  KEY `fk_math_fieldvalue_math_field1` (`idfield`),
  CONSTRAINT `fk_math_fieldvalue_math_field1` FOREIGN KEY (`idfield`) REFERENCES `math_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_math_fieldvalue_math_user1` FOREIGN KEY (`iduser`) REFERENCES `math_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci~

-- -------------------------------------------~
-- TABLE `math_session`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `math_session`~
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci~

-- -------------------------------------------~
-- TABLE `math_system`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `math_system`~
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci~

-- -------------------------------------------~
-- TABLE `math_user`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `math_user`~
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci~

-- -------------------------------------------~
-- TABLE `periodo`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `periodo`~
CREATE TABLE IF NOT EXISTS `periodo` (
  `id_periodo` int(5) NOT NULL AUTO_INCREMENT,
  `valor_numerico` int(5) NOT NULL,
  `valor_textual` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `profesion`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `profesion`~
CREATE TABLE IF NOT EXISTS `profesion` (
  `id_profesion` int(5) NOT NULL AUTO_INCREMENT,
  `state_profesion` enum('active','inactive') NOT NULL DEFAULT 'active',
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_profesion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `respuestaejercicio`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `respuestaejercicio`~
CREATE TABLE IF NOT EXISTS `respuestaejercicio` (
  `idRespuestaEjercicio` int(11) NOT NULL,
  `respuesta_ejercicio` varchar(45) NOT NULL,
  `ordenposicion` enum('a','b','c','d','f') NOT NULL,
  `idContenido` int(11) DEFAULT NULL COMMENT 'SI a la respuesta se le desea indexar algun contenido que haga mas explicativa la respuesta.\n',
  `es_verdadero` enum('v','f') DEFAULT NULL,
  PRIMARY KEY (`idRespuestaEjercicio`),
  KEY `fk_RespuestaEjercicio_contenidos1_idx` (`idContenido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `respuestas_evaluado`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `respuestas_evaluado`~
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `talleres`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `talleres`~
CREATE TABLE IF NOT EXISTS `talleres` (
  `idtalleres` int(11) NOT NULL AUTO_INCREMENT,
  `state_taller` enum('active','inactive') NOT NULL,
  `id_materia` int(5) NOT NULL,
  `id_curso` int(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idtalleres`),
  KEY `id_materia` (`id_materia`),
  KEY `id_curso` (`id_curso`),
  CONSTRAINT `talleres_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`idmaterias`),
  CONSTRAINT `talleres_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `tema`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `tema`~
CREATE TABLE IF NOT EXISTS `tema` (
  `idtema` int(11) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `idcurso` int(11) NOT NULL,
  `idperiodo` int(5) DEFAULT NULL,
  PRIMARY KEY (`idtema`),
  KEY `fk_tema_materias1_idx` (`idcurso`),
  KEY `fk_idperiodo` (`idperiodo`),
  CONSTRAINT `fk_idcurso` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_idperiodo` FOREIGN KEY (`idperiodo`) REFERENCES `periodo` (`id_periodo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Mediate este campo podremos saber cual es el periodo al que pertenece el tema que se le esta cargando al curso'~

-- -------------------------------------------~
-- TABLE `tema_contenidos`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `tema_contenidos`~
CREATE TABLE IF NOT EXISTS `tema_contenidos` (
  `tema_idtema` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`tema_idtema`,`contenidos_id`),
  KEY `fk_tema_has_contenidos_contenidos1_idx` (`contenidos_id`),
  KEY `fk_tema_has_contenidos_tema1_idx` (`tema_idtema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `tema_evaluaciones`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `tema_evaluaciones`~
CREATE TABLE IF NOT EXISTS `tema_evaluaciones` (
  `tema_idtema` int(11) NOT NULL,
  `evaluaciones_id` int(11) NOT NULL,
  PRIMARY KEY (`tema_idtema`,`evaluaciones_id`),
  KEY `fk_tema_has_evaluaciones_evaluaciones1_idx` (`evaluaciones_id`),
  KEY `fk_tema_has_evaluaciones_tema1_idx` (`tema_idtema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `tema_talleres`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `tema_talleres`~
CREATE TABLE IF NOT EXISTS `tema_talleres` (
  `tema_idtema` int(11) NOT NULL,
  `talleres_idtalleres` int(11) NOT NULL,
  PRIMARY KEY (`tema_idtema`,`talleres_idtalleres`),
  KEY `fk_tema_has_talleres_talleres1_idx` (`talleres_idtalleres`),
  KEY `fk_tema_has_talleres_tema1_idx` (`tema_idtema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `universidad`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `universidad`~
CREATE TABLE IF NOT EXISTS `universidad` (
  `id_universidad` int(5) NOT NULL AUTO_INCREMENT,
  `state_universidad` enum('active','inactive') NOT NULL DEFAULT 'active',
  `nombre_universidad` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_universidad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `usuario_universidades`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `usuario_universidades`~
CREATE TABLE IF NOT EXISTS `usuario_universidades` (
  `id_usuario` int(11) NOT NULL,
  `state_uu` enum('active','inactive') NOT NULL DEFAULT 'active',
  `universidades_id` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`universidades_id`),
  KEY `fk_docentes_has_universidades_docentes1` (`id_usuario`),
  KEY `fk_usuario_universidades_universidad1` (`universidades_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `usuarios_contenidos`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `usuarios_contenidos`~
CREATE TABLE IF NOT EXISTS `usuarios_contenidos` (
  `usuarios_id_usuario` int(11) NOT NULL,
  `contenidos_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_id_usuario`,`contenidos_id`),
  KEY `fk_usuarios_has_contenidos_contenidos1_idx` (`contenidos_id`),
  KEY `fk_usuarios_has_contenidos_usuarios1_idx` (`usuarios_id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE `usuarios_profesion`~
-- -------------------------------------------~
DROP TABLE IF EXISTS `usuarios_profesion`~
CREATE TABLE IF NOT EXISTS `usuarios_profesion` (
  `id_usuario` int(11) NOT NULL,
  `Profesion_id_profesion` int(5) NOT NULL,
  PRIMARY KEY (`id_usuario`,`Profesion_id_profesion`),
  KEY `fk_usuarios_has_Profesion_Profesion1_idx` (`Profesion_id_profesion`),
  KEY `fk_usuarios_has_Profesion_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1~

-- -------------------------------------------~
-- TABLE DATA contenidos~
-- -------------------------------------------~
INSERT INTO `contenidos` (`id`,`state_contenido`,`titulo`,`texto`,`observacion`,`almacenado_total`) VALUES
('166','inactive','oscar prueba algo mas.','<b>esta es una prueba.</b><br><br><br><b>1. sfdasdfas</b>.<br><ul><li>2. dsfasfddsaf</li></ul>','adsfasdfasdfVideo','1')~
INSERT INTO `contenidos` (`id`,`state_contenido`,`titulo`,`texto`,`observacion`,`almacenado_total`) VALUES
('179','active','Este es el titulo','Pequ;a descripciion<br>','asdfsadf','1')~
INSERT INTO `contenidos` (`id`,`state_contenido`,`titulo`,`texto`,`observacion`,`almacenado_total`) VALUES
('195','active','contenido taller 1','Descripcion para le contenido 1.<br><br>Puntos a tratar.<br><br><ul><li>Punto&nbsp; uno.</li><li>Punto dos.</li></ul><blockquote>Otro texto.<br></blockquote>','observacion x.','1')~
INSERT INTO `contenidos` (`id`,`state_contenido`,`titulo`,`texto`,`observacion`,`almacenado_total`) VALUES
('198','active','','','','0')~



-- -------------------------------------------~
-- TABLE DATA contenidos_talleres~
-- -------------------------------------------~
INSERT INTO `contenidos_talleres` (`contenidos_id`,`talleres_idtalleres`) VALUES
('195','1')~



-- -------------------------------------------~
-- TABLE DATA cursos~
-- -------------------------------------------~
INSERT INTO `cursos` (`id`,`state_curso`,`id_docente`,`idmateria`,`nombre_curso`,`descripcion_curso`,`fecha_inicio`,`fecha_cierre`,`tiene_foro`,`id_grado`) VALUES
('1','active','1','4','Quima 2','sdf','2014-03-27','2014-04-19','0','10')~
INSERT INTO `cursos` (`id`,`state_curso`,`id_docente`,`idmateria`,`nombre_curso`,`descripcion_curso`,`fecha_inicio`,`fecha_cierre`,`tiene_foro`,`id_grado`) VALUES
('2','active','1','3','Fisica 1','Curso para la medicion.','2014-06-14','2014-06-15','0','10')~
INSERT INTO `cursos` (`id`,`state_curso`,`id_docente`,`idmateria`,`nombre_curso`,`descripcion_curso`,`fecha_inicio`,`fecha_cierre`,`tiene_foro`,`id_grado`) VALUES
('3','active','1','1','Matematicas discretas.','matematicas el curso de 1.','2014-05-03','2014-05-04','0','6')~
INSERT INTO `cursos` (`id`,`state_curso`,`id_docente`,`idmateria`,`nombre_curso`,`descripcion_curso`,`fecha_inicio`,`fecha_cierre`,`tiene_foro`,`id_grado`) VALUES
('4','active','1','1','kkjkkjjkkjklk kjjk','hhjhjhjhjhj','2014-04-04','2014-09-04','','1')~
INSERT INTO `cursos` (`id`,`state_curso`,`id_docente`,`idmateria`,`nombre_curso`,`descripcion_curso`,`fecha_inicio`,`fecha_cierre`,`tiene_foro`,`id_grado`) VALUES
('5','active','1','1','Curso 1','esta es la descripcion.','2014-05-01','2014-09-07','','1')~
INSERT INTO `cursos` (`id`,`state_curso`,`id_docente`,`idmateria`,`nombre_curso`,`descripcion_curso`,`fecha_inicio`,`fecha_cierre`,`tiene_foro`,`id_grado`) VALUES
('6','active','1','1','prueba','prueba de creacion de cruso.','2014-09-30','2015-02-28','','1')~



-- -------------------------------------------~
-- TABLE DATA grado~
-- -------------------------------------------~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('1','1','Primero de primaria')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('2','2','Segundo de primaria')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('3','3','Tercero de primaria')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('4','4','Cuarto de primaria.')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('5','5','Quito de primaria')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('6','6','Sexto')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('7','7','Séptimo')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('8','8','Octavo')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('9','9','Noveno')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('10','10','Décimo')~
INSERT INTO `grado` (`id_grado`,`desc_numerica`,`desc_verbal`) VALUES
('11','11','Once')~



-- -------------------------------------------~
-- TABLE DATA img_videos_sonido~
-- -------------------------------------------~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('1','active','','ewrwqer','img','qewrwe','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('2','active','','fadasf','img','adsfdsaf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('3','active','themes/PoliAuLink/images/14/ana.jpg','fadasf','img','adsfdsaf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('4','active','themes/PoliAuLink/images/14/ana.jpg','fadasf','img','adsfdsaf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('5','active','themes/PoliAuLink/images/14/ana.jpg','fadasf','img','adsfdsaf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('6','active','themes/PoliAuLink/images/15/46.png','adsf','img','asdfdsaf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('7','active','themes/PoliAuLink/images/contenidos/49/273738_661765541_263078633_n.jpg','prueba','img','asdfsadf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('8','active','themes/PoliAuLink/images/contenidos/50/av-9.jpg','adsf','img','asdfsadf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('9','active','','asdfasdf','video','Esta es la descripcion.','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('10','active','','sdfasdf','video','asdfsdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('11','active','','fasdf','video','fasdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('12','active','','prueba','video','asdfasdfasdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('13','active','','adfsdf','video','asdfsaf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('14','active','','adfsdf','video','asdfsaf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('15','active','','adfsdf','video','asdfsaf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('16','active','','dadsf','video','dsfsa','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('17','active','','dadsf','video','dsfsa','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('18','active','http://vimeo.com/85475429','dfasdf','video','asdfasdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('19','active','http://vimeo.com/85475429','asfasfdhttp://vimeo.com/85475429','video','asdfasdfasdfadsf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('20','active','http://vimeo.com/85475429','asdfasdf','video','dsf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('21','active','themes/PoliAuLink/images/contenidos/160/273738_661765541_263078633_n.jpg','sdfg','img','sdfgsdfgsdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('22','active','themes/PoliAuLink/images/contenidos/161/certificado.png','dfd','img','asdfasdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('23','active','http://vimeo.com/85475429','asdfasdf','video','asdfasdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('24','active','http://vimeo.com/85475429','tales','video','dasdfsafdsafdasdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('25','active','http://vimeo.com/85475429','prueba','video','asdfasdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('26','active','themes/PoliAuLink/images/contenidos/167/46.png','otra prueba','img','sadfasfdasdfasf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('27','active','themes/PoliAuLink/images/contenidos/178/10174854_655914264446567_765582406_n.jpg','contenido 1','img','esta es una prueba','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('28','active','themes/PoliAuLink/images/contenidos/164/respiracion.jpg','Contenido 1','img','Descripcion.','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('29','active','themes/PoliAuLink/images/contenidos/179/certificado.png','hello','img','asfsadfsdf','1')~
INSERT INTO `img_videos_sonido` (`id`,`state_img_videos`,`url`,`nombre`,`type`,`descripcion`,`idUsiario`) VALUES
('30','active','themes/PoliAuLink/images/contenidos/166/576098_10150986024207739_1502339542_n.jpg','Imagen 1','img','Imagen para mostrar ejemplo','1')~



-- -------------------------------------------~
-- TABLE DATA img_videos_sonido_contenidos~
-- -------------------------------------------~
INSERT INTO `img_videos_sonido_contenidos` (`img_videos_id`,`contenidos_id`,`state_video_has_contenidos`,`contenidos_tipo_contenido_id`) VALUES
('29','179','active','0')~
INSERT INTO `img_videos_sonido_contenidos` (`img_videos_id`,`contenidos_id`,`state_video_has_contenidos`,`contenidos_tipo_contenido_id`) VALUES
('30','166','active','0')~



-- -------------------------------------------~
-- TABLE DATA materias~
-- -------------------------------------------~
INSERT INTO `materias` (`idmaterias`,`nombre_materia`,`state_materia`) VALUES
('1','Matematicas','active')~
INSERT INTO `materias` (`idmaterias`,`nombre_materia`,`state_materia`) VALUES
('2','Español','active')~
INSERT INTO `materias` (`idmaterias`,`nombre_materia`,`state_materia`) VALUES
('3','Fisica','active')~
INSERT INTO `materias` (`idmaterias`,`nombre_materia`,`state_materia`) VALUES
('4','Quimica','active')~
INSERT INTO `materias` (`idmaterias`,`nombre_materia`,`state_materia`) VALUES
('5','Bilogia','active')~
INSERT INTO `materias` (`idmaterias`,`nombre_materia`,`state_materia`) VALUES
('6','Inglés','active')~



-- -------------------------------------------~
-- TABLE DATA math_authassignment~
-- -------------------------------------------~
INSERT INTO `math_authassignment` (`userid`,`bizrule`,`data`,`itemname`) VALUES
('33','','N;','alumno')~
INSERT INTO `math_authassignment` (`userid`,`bizrule`,`data`,`itemname`) VALUES
('33','','N;','Profesor')~
INSERT INTO `math_authassignment` (`userid`,`bizrule`,`data`,`itemname`) VALUES
('34','','N;','alumno')~



-- -------------------------------------------~
-- TABLE DATA math_authitem~
-- -------------------------------------------~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_contenidos_admin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_contenidos_create','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_contenidos_delete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_contenidos_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_contenidos_update','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_contenidos_view','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_cursos_admin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_cursos_create','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_cursos_curso','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_cursos_delete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_cursos_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_cursos_update','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_cursos_view','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_default_create','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_default_delete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_default_download','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_default_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_documento_view','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_grado_admin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_grado_create','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_grado_delete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_grado_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_grado_update','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_grado_view','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_admin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_create','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_delete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_loadformulario','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_loadmultimediabycontent','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_savemultimediacontent','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_update','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_imgvideossonido_view','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_site_ajaxiniciosesion','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_site_ajaxrecuperar','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_site_ajaxregistro','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_site_contact','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_site_error','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_site_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_site_login','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_site_logout','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_talleres_admin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_talleres_create','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_talleres_delete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_talleres_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_talleres_update','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_talleres_view','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_editprofile','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_fieldsadmincreate','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_fieldsadminlist','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_fieldsadminupdate','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbacajaxassignment','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbacajaxsetchilditem','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbacauthitemchilditems','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbacauthitemcreate','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbacauthitemdelete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbacauthitemupdate','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbaclistops','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbaclistroles','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbaclisttasks','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_rbacusersassignments','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_sessionadmin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_systemupdate','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_usermanagementadmin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_usermanagementcreate','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_usermanagementdelete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_ui_usermanagementupdate','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_universidad_admin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_universidad_cargar','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_universidad_create','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_universidad_delete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_universidad_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_universidad_update','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_universidad_view','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_activardocente','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_activarusuario','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_active','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_admin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_ajaxfiltrousuarios','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_cambiopassword','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_create','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_createanonimo','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_delete','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_guardarcambionuevopassword','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_inactive','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_index','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_inicio','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_recuperarpassword','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_update','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('action_usuarios_view','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('admin','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Administrador_cursos','1','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Administrador_Examen','1','usuarios que administran los exámenes-docentes','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Administrador_Multimedia','1','administra imagenes, videos y audio.','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Administrar_Ejercicios','1','usuarios que administran ejercicios','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Administrar_Usuarios','1','Usuario puede administrar todos los usuarios.','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Adminsitrar_Talleres','1','usuarios que tiene acceso a administrar talleres','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Alumno','2','Alumno de la aplicación','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('controller_contenidos','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('controller_cursos','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('controller_grado','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('controller_imgvideossonido','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('controller_site','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('controller_talleres','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('controller_universidad','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('controller_usuarios','0','','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Derrollar_Taller','1','usuarios que desarrollan un taller','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Desarrollar_Ejercicio','1','usuarios que desarrollan ejercicios','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Desarrollar_examen','1','Alumnos que realizan el examen.','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Desarrollo_ejercicios','1','usuarios que desarrollan los ejercicios','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('edit-advanced-profile-features','0','C:\\xampp\\htdocs\\PoliAuLink\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('invitados','2','Invitado de la aplicación','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Moderador_foro_chat','1','Usuario encargado de administrar contenidos que se manejan en foros.','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Profesor','2','este es el profe de la aplicación','','N;')~
INSERT INTO `math_authitem` (`name`,`type`,`description`,`bizrule`,`data`) VALUES
('Realizar_Taller','1','Usuario general que puede ver un taller.','','N;')~



-- -------------------------------------------~
-- TABLE DATA math_authitemchild~
-- -------------------------------------------~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_contenidos_create')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_contenidos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_contenidos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_cursos_admin')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_cursos_admin')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_cursos_create')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_cursos_create')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_cursos_curso')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_cursos_delete')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_cursos_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_cursos_update')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_cursos_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_grado_admin')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_grado_create')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_grado_delete')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_grado_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_grado_update')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_grado_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_imgvideossonido_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_imgvideossonido_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_site_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_talleres_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_talleres_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_universidad_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_universidad_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_usuarios_index')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_cursos','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Examen','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrador_Multimedia','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Ejercicios','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Administrar_Usuarios','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Adminsitrar_Talleres','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Derrollar_Taller','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_Ejercicio','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollar_examen','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Desarrollo_ejercicios','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('invitados','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Moderador_foro_chat','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Profesor','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Realizar_Taller','action_usuarios_view')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','Administrador_Examen')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','Administrar_Ejercicios')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','Derrollar_Taller')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','invitados')~
INSERT INTO `math_authitemchild` (`parent`,`child`) VALUES
('Alumno','Profesor')~



-- -------------------------------------------~
-- TABLE DATA math_field~
-- -------------------------------------------~
INSERT INTO `math_field` (`idfield`,`fieldname`,`longname`,`position`,`required`,`fieldtype`,`fieldsize`,`maxlength`,`showinreports`,`useregexp`,`useregexpmsg`,`predetvalue`) VALUES
('1','nombrecompleto','Nombre completo','0','1','0','20','45','0','','Este campo es obligatorio','')~
INSERT INTO `math_field` (`idfield`,`fieldname`,`longname`,`position`,`required`,`fieldtype`,`fieldsize`,`maxlength`,`showinreports`,`useregexp`,`useregexpmsg`,`predetvalue`) VALUES
('2','apellidos','Apellidos','1','1','0','20','45','0','','','')~
INSERT INTO `math_field` (`idfield`,`fieldname`,`longname`,`position`,`required`,`fieldtype`,`fieldsize`,`maxlength`,`showinreports`,`useregexp`,`useregexpmsg`,`predetvalue`) VALUES
('3','universidad','Universidad','2','1','3','20','45','0','','','1, Politécnico Colombiano Jaime Isaza Cadavid
2, EAFIT
3, Universidad de Antioquia
4, Universidad de Nacional de Colombia')~
INSERT INTO `math_field` (`idfield`,`fieldname`,`longname`,`position`,`required`,`fieldtype`,`fieldsize`,`maxlength`,`showinreports`,`useregexp`,`useregexpmsg`,`predetvalue`) VALUES
('4','telefono','Teléfono','4','1','0','20','20','0','','','')~
INSERT INTO `math_field` (`idfield`,`fieldname`,`longname`,`position`,`required`,`fieldtype`,`fieldsize`,`maxlength`,`showinreports`,`useregexp`,`useregexpmsg`,`predetvalue`) VALUES
('5','cel','Celular','5','0','0','20','45','0','','','')~
INSERT INTO `math_field` (`idfield`,`fieldname`,`longname`,`position`,`required`,`fieldtype`,`fieldsize`,`maxlength`,`showinreports`,`useregexp`,`useregexpmsg`,`predetvalue`) VALUES
('6','fechanac','Fecha de nacimiento','6','1','0','20','45','0','','','')~
INSERT INTO `math_field` (`idfield`,`fieldname`,`longname`,`position`,`required`,`fieldtype`,`fieldsize`,`maxlength`,`showinreports`,`useregexp`,`useregexpmsg`,`predetvalue`) VALUES
('7','materias','Materias','7','1','3','20','45','0','','','1, Matemáticas
2, Español
3,  Química
4, Física')~



-- -------------------------------------------~
-- TABLE DATA math_session~
-- -------------------------------------------~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('1','1','1404904957','1404906757','1','127.0.0.1','1','1404904957','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('2','1','1408382754','1408384554','0','127.0.0.1','1','1408382754','1408383385','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('3','1','1408389256','1408391056','0','127.0.0.1','1','1408389256','1408389329','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('4','1','1408395987','1408397787','0','127.0.0.1','1','1408395987','1408395991','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('5','6','1408426845','1408428645','0','127.0.0.1','1','1408426845','1408426854','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('6','1','1408426863','1408428663','1','127.0.0.1','1','1408426863','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('7','1','1408580023','1408581823','0','127.0.0.1','1','1408580023','1408580154','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('8','1','1408580788','1408582588','1','127.0.0.1','1','1408580788','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('9','6','1409246792','1409248592','0','127.0.0.1','1','1409246792','1409246814','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('10','1','1409246821','1409248621','1','127.0.0.1','1','1409246821','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('11','6','1411620398','1411622198','0','127.0.0.1','1','1411620398','1411620455','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('12','1','1411620469','1411622269','0','127.0.0.1','1','1411620469','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('13','1','1411643561','1411645361','0','127.0.0.1','1','1411643561','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('14','1','1411645491','1411647291','0','127.0.0.1','1','1411645491','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('15','1','1411694905','1411696705','0','127.0.0.1','1','1411694905','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('16','1','1411700982','1411702782','0','127.0.0.1','1','1411700982','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('17','1','1411706465','1411708265','0','127.0.0.1','1','1411706465','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('18','1','1411708493','1411710293','0','127.0.0.1','1','1411708493','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('19','1','1411711601','1411713401','0','127.0.0.1','1','1411711601','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('20','1','1411713431','1411715231','0','127.0.0.1','1','1411713431','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('21','1','1411731473','1411733273','0','127.0.0.1','1','1411731473','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('22','1','1411784753','1411786553','0','127.0.0.1','1','1411784753','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('23','1','1411828808','1411830608','0','127.0.0.1','1','1411828808','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('24','1','1411836952','1411838752','0','127.0.0.1','1','1411836952','1411837170','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('25','1','1411838175','1411839975','0','127.0.0.1','2','1411838870','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('26','1','1411840297','1411842097','0','127.0.0.1','1','1411840297','1411840530','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('27','1','1411840606','1411842406','0','127.0.0.1','1','1411840606','1411840623','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('28','1','1411840643','1411842443','0','127.0.0.1','1','1411840643','1411840671','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('29','1','1411840813','1411842613','0','127.0.0.1','1','1411840813','1411841249','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('30','19','1411841261','1411843061','0','127.0.0.1','1','1411841261','1411841272','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('31','1','1411841278','1411843078','0','127.0.0.1','1','1411841278','1411841332','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('32','19','1411841339','1411843139','0','127.0.0.1','1','1411841339','1411841343','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('33','1','1411841453','1411843253','0','127.0.0.1','1','1411841453','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('34','1','1411847963','1411849763','0','127.0.0.1','1','1411847963','1411848002','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('35','1','1411848140','1411849940','1','127.0.0.1','1','1411848140','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('36','1','1411989289','1411991089','0','127.0.0.1','1','1411989289','1411989603','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('37','1','1411990697','1411992497','0','127.0.0.1','1','1411990697','1411990941','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('38','25','1411990950','1411992750','0','127.0.0.1','1','1411990950','1411990990','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('39','1','1412036857','1412038657','0','127.0.0.1','1','1412036857','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('40','1','1412038973','1412050973','0','127.0.0.1','1','1412038973','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('41','1','1412065016','1412077016','0','127.0.0.1','1','1412065016','1412065038','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('42','1','1412065342','1412077342','0','127.0.0.1','1','1412065342','1412065360','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('43','1','1412066851','1412078851','0','127.0.0.1','1','1412066851','1412066880','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('44','1','1412067026','1412079026','0','127.0.0.1','1','1412067026','1412067039','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('45','1','1412067051','1412079051','0','127.0.0.1','1','1412067051','1412067204','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('46','29','1412069508','1412081508','0','127.0.0.1','1','1412069508','1412069597','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('47','30','1412069668','1412081668','0','127.0.0.1','1','1412069668','1412069676','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('48','1','1412072699','1412084699','0','127.0.0.1','1','1412072699','1412072708','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('49','33','1412072752','1412084752','0','127.0.0.1','1','1412072752','1412072755','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('50','1','1412072772','1412084772','0','127.0.0.1','1','1412072772','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('51','1','1412099021','1412111021','1','127.0.0.1','1','1412099021','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('52','1','1412121989','1412133989','0','127.0.0.1','1','1412121989','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('53','1','1412135505','1412147505','0','127.0.0.1','1','1412135505','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('54','1','1412169427','1412181427','1','127.0.0.1','1','1412169427','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('55','1','1412208808','1412220808','0','127.0.0.1','1','1412208808','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('56','1','1412221345','1412233345','0','127.0.0.1','1','1412221345','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('57','33','1412230540','1412242540','0','127.0.0.1','1','1412230540','1412230666','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('58','33','1412230679','1412242679','1','127.0.0.1','1','1412230679','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('59','1','1412233691','1412245691','0','127.0.0.1','1','1412233691','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('60','1','1412250585','1412262585','1','127.0.0.1','1','1412250585','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('61','1','1412292900','1412304900','0','127.0.0.1','1','1412292900','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('62','1','1412306369','1412318369','0','127.0.0.1','1','1412306369','1412307057','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('63','1','1412307565','1412319565','0','127.0.0.1','1','1412307565','1412308193','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('64','34','1412309205','1412321205','0','127.0.0.1','1','1412309205','1412309213','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('65','1','1412309788','1412321788','0','127.0.0.1','1','1412309788','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('66','1','1412335623','1412347623','0','127.0.0.1','1','1412335623','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('67','1','1412385143','1412397143','0','127.0.0.1','1','1412385143','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('68','1','1412398031','1412410031','0','127.0.0.1','1','1412398031','','')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('69','1','1412419944','1412431944','0','127.0.0.1','1','1412419944','1412424824','127.0.0.1')~
INSERT INTO `math_session` (`idsession`,`iduser`,`created`,`expire`,`status`,`ipaddress`,`usagecount`,`lastusage`,`logoutdate`,`ipaddressout`) VALUES
('70','1','1412424932','1412436932','1','127.0.0.1','1','1412424932','','')~



-- -------------------------------------------~
-- TABLE DATA math_system~
-- -------------------------------------------~
INSERT INTO `math_system` (`idsystem`,`name`,`largename`,`sessionmaxdurationmins`,`sessionmaxsameipconnections`,`sessionreusesessions`,`sessionmaxsessionsperday`,`sessionmaxsessionsperuser`,`systemnonewsessions`,`systemdown`,`registerusingcaptcha`,`registerusingterms`,`terms`,`registerusingactivation`,`defaultroleforregistration`,`registerusingtermslabel`,`registrationonlogin`) VALUES
('1','default','','200','10','1','-1','-1','0','0','0','0','','0','','','1')~



-- -------------------------------------------~
-- TABLE DATA math_user~
-- -------------------------------------------~
INSERT INTO `math_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES
('1','','','1412424932','admin','admin@tucorreo.com','d033e22ae348aeb5660fc2140aec35850c4da997','','1','0','0')~
INSERT INTO `math_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES
('2','','','','invitado','invitado','nopassword','','1','0','0')~
INSERT INTO `math_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES
('33','','','1412230679','omesag','oscarmesa.elpoli@gmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','','1','0','0')~
INSERT INTO `math_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES
('34','','','1412309205','diegochoa','ochoa8525@hotmail.com','40bd001563085fc35165329ea1ff5c5ecbdbbeef','','1','0','0')~
INSERT INTO `math_user` (`iduser`,`regdate`,`actdate`,`logondate`,`username`,`email`,`password`,`authkey`,`state`,`totalsessioncounter`,`currentsessioncounter`) VALUES
('36','1412425581','','','diego234','diego8525@gmail.com','b78e82e69823d05bf5219fbf9b7e91b1b5662787','14fc10955e05b78e961d0480894370326b272f58','1','0','0')~



-- -------------------------------------------~
-- TABLE DATA periodo~
-- -------------------------------------------~
INSERT INTO `periodo` (`id_periodo`,`valor_numerico`,`valor_textual`) VALUES
('1','1','Período 1')~
INSERT INTO `periodo` (`id_periodo`,`valor_numerico`,`valor_textual`) VALUES
('2','2','Período 2')~
INSERT INTO `periodo` (`id_periodo`,`valor_numerico`,`valor_textual`) VALUES
('3','3','Período 3')~
INSERT INTO `periodo` (`id_periodo`,`valor_numerico`,`valor_textual`) VALUES
('4','4','Período 4')~



-- -------------------------------------------~
-- TABLE DATA talleres~
-- -------------------------------------------~
INSERT INTO `talleres` (`idtalleres`,`state_taller`,`id_materia`,`id_curso`,`nombre`,`descripcion`) VALUES
('1','active','1','1','Taller 2','Descripcion taller 2.')~



-- -------------------------------------------~
-- TABLE DATA tema~
-- -------------------------------------------~
INSERT INTO `tema` (`idtema`,`titulo`,`descripcion`,`idcurso`,`idperiodo`) VALUES
('0','Estequiometría','Leyes fundamentales de la química. Teoría  atómica de Dalton. Hipótesis de
Avogadro. Átomo. Molécula. Peso atómico. Peso molecular. Mol. Número de Avogadro. Volumen molar. Estequiometría.','1','1')~



-- -------------------------------------------~
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS~
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS~
-- -------------------------------------------~
-- -------------------------------------------~
-- END BACKUP~
-- -------------------------------------------~
