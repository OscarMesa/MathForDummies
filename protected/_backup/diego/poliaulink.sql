/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : math

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-10-04 09:44:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `comentarios_curso`
-- ----------------------------
DROP TABLE IF EXISTS `comentarios_curso`;
CREATE TABLE `comentarios_curso` (
`idcurso`  int(11) NOT NULL ,
`idusuario`  int(11) NOT NULL ,
`comentario`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`idcurso`, `idusuario`),
INDEX `fk_Comentarios_curso_cursos1_idx` (`idcurso`) USING BTREE ,
INDEX `fk_Comentarios_curso_usuarios1_idx` (`idusuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of comentarios_curso
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `comentarios_evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `comentarios_evaluacion`;
CREATE TABLE `comentarios_evaluacion` (
`idusuario`  int(11) NOT NULL ,
`idevaluacion`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`comentarios_evaluacion`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`idusuario`, `idevaluacion`),
INDEX `fk_comentarios_evaluacion_usuarios1_idx` (`idusuario`) USING BTREE ,
INDEX `fk_comentarios_evaluacion_evaluaciones1_idx` (`idevaluacion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of comentarios_evaluacion
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `comentarios_taller`
-- ----------------------------
DROP TABLE IF EXISTS `comentarios_taller`;
CREATE TABLE `comentarios_taller` (
`idtaller`  int(11) NOT NULL ,
`idusuario`  int(11) NOT NULL ,
`comentarios_taller`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`idtaller`, `idusuario`),
INDEX `fk_comentarios_taller_usuarios1_idx` (`idusuario`) USING BTREE ,
INDEX `fk_comentarios_taller_talleres1_idx` (`idtaller`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of comentarios_taller
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `contenidos`
-- ----------------------------
DROP TABLE IF EXISTS `contenidos`;
CREATE TABLE `contenidos` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`state_contenido`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`titulo`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`texto`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
`observacion`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
`almacenado_total`  tinyint(1) NOT NULL COMMENT 'este campo permite saber si un contenido se ha almenado en su totalidad o es un registro que puede o no ser tomado en cuenta.' ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=198

;

-- ----------------------------
-- Records of contenidos
-- ----------------------------
BEGIN;
INSERT INTO `contenidos` VALUES ('166', 'inactive', 'oscar prueba algo mas.', '<b>esta es una prueba.</b><br><br><br><b>1. sfdasdfas</b>.<br><ul><li>2. dsfasfddsaf</li></ul>', 'adsfasdfasdfVideo', '1'), ('179', 'active', 'Este es el titulo', 'Pequ;a descripciion<br>', 'asdfsadf', '1'), ('195', 'active', 'contenido taller 1', 'Descripcion para le contenido 1.<br><br>Puntos a tratar.<br><br><ul><li>Punto&nbsp; uno.</li><li>Punto dos.</li></ul><blockquote>Otro texto.<br></blockquote>', 'observacion x.', '1'), ('197', 'active', null, null, null, '0');
COMMIT;

-- ----------------------------
-- Table structure for `contenidos_ejercicio`
-- ----------------------------
DROP TABLE IF EXISTS `contenidos_ejercicio`;
CREATE TABLE `contenidos_ejercicio` (
`contenidos_id`  int(11) NOT NULL ,
`state_ce`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`ejercicios_id`  int(11) NOT NULL ,
PRIMARY KEY (`contenidos_id`, `ejercicios_id`),
INDEX `fk_contenidos_has_ejercicios_ejercicios1` (`ejercicios_id`) USING BTREE ,
INDEX `fk_contenidos_has_ejercicios_contenidos1` (`contenidos_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of contenidos_ejercicio
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `contenidos_talleres`
-- ----------------------------
DROP TABLE IF EXISTS `contenidos_talleres`;
CREATE TABLE `contenidos_talleres` (
`contenidos_id`  int(11) NOT NULL ,
`talleres_idtalleres`  int(11) NOT NULL ,
PRIMARY KEY (`contenidos_id`, `talleres_idtalleres`),
FOREIGN KEY (`contenidos_id`) REFERENCES `contenidos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`talleres_idtalleres`) REFERENCES `talleres` (`idtalleres`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_contenidos_has_talleres_talleres1_idx` (`talleres_idtalleres`) USING BTREE ,
INDEX `fk_contenidos_has_talleres_contenidos1_idx` (`contenidos_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of contenidos_talleres
-- ----------------------------
BEGIN;
INSERT INTO `contenidos_talleres` VALUES ('195', '1');
COMMIT;

-- ----------------------------
-- Table structure for `cursos`
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`state_curso`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`id_docente`  int(11) NULL DEFAULT NULL ,
`idmateria`  int(11) NOT NULL ,
`nombre_curso`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`descripcion_curso`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`fecha_inicio`  date NULL DEFAULT NULL ,
`fecha_cierre`  date NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_docente`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idmateria`) REFERENCES `materias` (`idmaterias`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_cursos_docentes1` (`id_docente`) USING BTREE ,
INDEX `fk_cursos_materias1_idx` (`idmateria`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=6

;

-- ----------------------------
-- Records of cursos
-- ----------------------------
BEGIN;
INSERT INTO `cursos` VALUES ('1', 'active', '1', '1', 'asdf', 'sdf', '2014-03-27', '2014-04-19'), ('2', 'active', '1', '3', 'Fisica 1', 'Curso para la medicion.', '2014-06-14', '2014-06-15'), ('3', 'active', '1', '1', 'Matematicas discretas.', 'matematicas el curso de 1.', '2014-05-03', '2014-05-04'), ('4', 'active', '1', '1', 'kkjkkjjkkjklk kjjk', 'hhjhjhjhjhj', '2014-04-04', '2014-09-04'), ('5', 'active', '1', '1', 'Curso 1', 'esta es la descripcion.', '2014-05-01', '2014-09-07');
COMMIT;

-- ----------------------------
-- Table structure for `cursos_evaluaciones`
-- ----------------------------
DROP TABLE IF EXISTS `cursos_evaluaciones`;
CREATE TABLE `cursos_evaluaciones` (
`cursos_id`  int(11) NOT NULL ,
`evaluaciones_id`  int(11) NOT NULL ,
`fecha_inicio`  datetime NULL DEFAULT NULL ,
`fecha_fin`  datetime NULL DEFAULT NULL ,
`porcentaje`  decimal(10,0) NULL DEFAULT NULL COMMENT 'este es el porcentaje del examen con relacion al curso' ,
`tiempo_limite`  time NULL DEFAULT NULL ,
PRIMARY KEY (`cursos_id`, `evaluaciones_id`),
INDEX `fk_cursos_has_evaluaciones_evaluaciones1_idx` (`evaluaciones_id`) USING BTREE ,
INDEX `fk_cursos_has_evaluaciones_cursos1_idx` (`cursos_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of cursos_evaluaciones
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `cursos_has_tema`
-- ----------------------------
DROP TABLE IF EXISTS `cursos_has_tema`;
CREATE TABLE `cursos_has_tema` (
`cursos_id`  int(11) NOT NULL ,
`tema_idtema`  int(11) NOT NULL ,
PRIMARY KEY (`cursos_id`, `tema_idtema`),
INDEX `fk_cursos_has_tema_tema1_idx` (`tema_idtema`) USING BTREE ,
INDEX `fk_cursos_has_tema_cursos1_idx` (`cursos_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of cursos_has_tema
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `cursos_juego`
-- ----------------------------
DROP TABLE IF EXISTS `cursos_juego`;
CREATE TABLE `cursos_juego` (
`cursos_id`  int(11) NOT NULL ,
`juego_idjuego`  int(11) NOT NULL ,
PRIMARY KEY (`cursos_id`, `juego_idjuego`),
INDEX `fk_cursos_has_juego_juego1_idx` (`juego_idjuego`) USING BTREE ,
INDEX `fk_cursos_has_juego_cursos1_idx` (`cursos_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of cursos_juego
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `cursos_talleres`
-- ----------------------------
DROP TABLE IF EXISTS `cursos_talleres`;
CREATE TABLE `cursos_talleres` (
`cursos_id`  int(11) NOT NULL ,
`talleres_idtalleres`  int(11) NOT NULL ,
PRIMARY KEY (`cursos_id`, `talleres_idtalleres`),
INDEX `fk_cursos_has_talleres_talleres1_idx` (`talleres_idtalleres`) USING BTREE ,
INDEX `fk_cursos_has_talleres_cursos1_idx` (`cursos_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of cursos_talleres
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `ejercicios`
-- ----------------------------
DROP TABLE IF EXISTS `ejercicios`;
CREATE TABLE `ejercicios` (
`id_ejercicio`  int(11) NOT NULL AUTO_INCREMENT ,
`state_ejercicios`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`ejercicio`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`solucion`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`dificultad`  int(3) NOT NULL COMMENT 'Esta tabla permite ingresase a una ecuación su grado de dificultad ' ,
`valoracion_porcentaje`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idtema`  int(11) NULL DEFAULT NULL ,
`idusuariocreador`  int(11) NULL DEFAULT NULL ,
`IdDocente`  int(11) NULL DEFAULT NULL COMMENT 'cunado el creador del ejercicio es el docente, el creador y el iddocente es el mismo.' ,
PRIMARY KEY (`id_ejercicio`),
INDEX `fk_ejercicios_tema1_idx` (`idtema`) USING BTREE ,
INDEX `fk_ejercicios_usuarios1_idx` (`idusuariocreador`) USING BTREE ,
INDEX `fk_ejercicios_usuarios2_idx` (`IdDocente`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of ejercicios
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `ejercicios_ecuaciones`
-- ----------------------------
DROP TABLE IF EXISTS `ejercicios_ecuaciones`;
CREATE TABLE `ejercicios_ecuaciones` (
`ejercicios_id`  int(11) NOT NULL ,
`state_ee`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`Ecuaciones_id_ecuacion`  int(11) NOT NULL ,
PRIMARY KEY (`ejercicios_id`, `Ecuaciones_id_ecuacion`),
INDEX `fk_ejercicios_has_Ecuaciones_Ecuaciones1` (`Ecuaciones_id_ecuacion`) USING BTREE ,
INDEX `fk_ejercicios_has_Ecuaciones_ejercicios1` (`ejercicios_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of ejercicios_ecuaciones
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `ejercicios_evaluaciones`
-- ----------------------------
DROP TABLE IF EXISTS `ejercicios_evaluaciones`;
CREATE TABLE `ejercicios_evaluaciones` (
`ejercicios_id_ejercicio`  int(11) NOT NULL ,
`evaluaciones_id`  int(11) NOT NULL ,
PRIMARY KEY (`ejercicios_id_ejercicio`, `evaluaciones_id`),
INDEX `fk_ejercicios_has_evaluaciones_evaluaciones1_idx` (`evaluaciones_id`) USING BTREE ,
INDEX `fk_ejercicios_has_evaluaciones_ejercicios1_idx` (`ejercicios_id_ejercicio`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of ejercicios_evaluaciones
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `ejercicios_respuestaejercicio`
-- ----------------------------
DROP TABLE IF EXISTS `ejercicios_respuestaejercicio`;
CREATE TABLE `ejercicios_respuestaejercicio` (
`ejercicios_id_ejercicio`  int(11) NOT NULL ,
`RespuestaEjercicio_idRespuestaEjercicio`  int(11) NOT NULL ,
PRIMARY KEY (`ejercicios_id_ejercicio`, `RespuestaEjercicio_idRespuestaEjercicio`),
INDEX `fk_ejercicios_has_RespuestaEjercicio_RespuestaEjercicio1_idx` (`RespuestaEjercicio_idRespuestaEjercicio`) USING BTREE ,
INDEX `fk_ejercicios_has_RespuestaEjercicio_ejercicios1_idx` (`ejercicios_id_ejercicio`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of ejercicios_respuestaejercicio
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `ejercicios_talleres`
-- ----------------------------
DROP TABLE IF EXISTS `ejercicios_talleres`;
CREATE TABLE `ejercicios_talleres` (
`ejercicios_id_ejercicio`  int(11) NOT NULL ,
`talleres_idtalleres`  int(11) NOT NULL ,
PRIMARY KEY (`ejercicios_id_ejercicio`, `talleres_idtalleres`),
INDEX `fk_ejercicios_has_talleres_talleres1_idx` (`talleres_idtalleres`) USING BTREE ,
INDEX `fk_ejercicios_has_talleres_ejercicios1_idx` (`ejercicios_id_ejercicio`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of ejercicios_talleres
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `estados`
-- ----------------------------
DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
`id_estado`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_estado`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of estados
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `evaluaciones`
-- ----------------------------
DROP TABLE IF EXISTS `evaluaciones`;
CREATE TABLE `evaluaciones` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`state_evalucaciones`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`porcentaje`  float NOT NULL ,
`tiempo_limite`  int(11) NOT NULL ,
`competencia`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of evaluaciones
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `evalucacion_integrante`
-- ----------------------------
DROP TABLE IF EXISTS `evalucacion_integrante`;
CREATE TABLE `evalucacion_integrante` (
`id_evaluacion`  int(11) NOT NULL ,
`state_evalucacion_integrante`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`id_integrante_curso`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`fecha_inicio`  datetime NULL DEFAULT NULL ,
`fecha_fin`  datetime NULL DEFAULT NULL ,
PRIMARY KEY (`id_evaluacion`, `id_integrante_curso`),
INDEX `fk_evalucacion_integrante_integrantes_curso1` (`id_integrante_curso`) USING BTREE ,
INDEX `fk_evalucacion_integrante_evaluaciones1` (`id_evaluacion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of evalucacion_integrante
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `img_videos_sonido`
-- ----------------------------
DROP TABLE IF EXISTS `img_videos_sonido`;
CREATE TABLE `img_videos_sonido` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`state_img_videos`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`url`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`nombre`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
`type`  enum('img','video','sonido') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`descripcion`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
`idUsiario`  int(11) NULL DEFAULT NULL ,
PRIMARY KEY (`id`),
INDEX `fk_img_videos_sonido_usuarios1_idx` (`idUsiario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=31

;

-- ----------------------------
-- Records of img_videos_sonido
-- ----------------------------
BEGIN;
INSERT INTO `img_videos_sonido` VALUES ('1', 'active', '', 'ewrwqer', 'img', 'qewrwe', '1'), ('2', 'active', '', 'fadasf', 'img', 'adsfdsaf', '1'), ('3', 'active', 'themes/OzAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', '1'), ('4', 'active', 'themes/OzAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', '1'), ('5', 'active', 'themes/OzAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', '1'), ('6', 'active', 'themes/OzAuLink/images/15/46.png', 'adsf', 'img', 'asdfdsaf', '1'), ('7', 'active', 'themes/OzAuLink/images/contenidos/49/273738_661765541_263078633_n.jpg', 'prueba', 'img', 'asdfsadf', '1'), ('8', 'active', 'themes/OzAuLink/images/contenidos/50/av-9.jpg', 'adsf', 'img', 'asdfsadf', '1'), ('9', 'active', '', 'asdfasdf', 'video', 'Esta es la descripcion.', '1'), ('10', 'active', '', 'sdfasdf', 'video', 'asdfsdf', '1'), ('11', 'active', '', 'fasdf', 'video', 'fasdf', '1'), ('12', 'active', '', 'prueba', 'video', 'asdfasdfasdf', '1'), ('13', 'active', '', 'adfsdf', 'video', 'asdfsaf', '1'), ('14', 'active', '', 'adfsdf', 'video', 'asdfsaf', '1'), ('15', 'active', '', 'adfsdf', 'video', 'asdfsaf', '1'), ('16', 'active', '', 'dadsf', 'video', 'dsfsa', '1'), ('17', 'active', '', 'dadsf', 'video', 'dsfsa', '1'), ('18', 'active', 'http://vimeo.com/85475429', 'dfasdf', 'video', 'asdfasdf', '1'), ('19', 'active', 'http://vimeo.com/85475429', 'asfasfdhttp://vimeo.com/85475429', 'video', 'asdfasdfasdfadsf', '1'), ('20', 'active', 'http://vimeo.com/85475429', 'asdfasdf', 'video', 'dsf', '1'), ('21', 'active', 'themes/OzAuLink/images/contenidos/160/273738_661765541_263078633_n.jpg', 'sdfg', 'img', 'sdfgsdfgsdf', '1'), ('22', 'active', 'themes/OzAuLink/images/contenidos/161/certificado.png', 'dfd', 'img', 'asdfasdf', '1'), ('23', 'active', 'http://vimeo.com/85475429', 'asdfasdf', 'video', 'asdfasdf', '1'), ('24', 'active', 'http://vimeo.com/85475429', 'tales', 'video', 'dasdfsafdsafdasdf', '1'), ('25', 'active', 'http://vimeo.com/85475429', 'prueba', 'video', 'asdfasdf', '1'), ('26', 'active', 'themes/OzAuLink/images/contenidos/167/46.png', 'otra prueba', 'img', 'sadfasfdasdfasf', '1'), ('27', 'active', 'themes/OzAuLink/images/contenidos/178/10174854_655914264446567_765582406_n.jpg', 'contenido 1', 'img', 'esta es una prueba', '1'), ('28', 'active', 'themes/OzAuLink/images/contenidos/164/respiracion.jpg', 'Contenido 1', 'img', 'Descripcion.', '1'), ('29', 'active', 'themes/OzAuLink/images/contenidos/179/certificado.png', 'hello', 'img', 'asfsadfsdf', '1'), ('30', 'active', 'themes/OzAuLink/images/contenidos/166/576098_10150986024207739_1502339542_n.jpg', 'Imagen 1', 'img', 'Imagen para mostrar ejemplo', '1');
COMMIT;

-- ----------------------------
-- Table structure for `img_videos_sonido_contenidos`
-- ----------------------------
DROP TABLE IF EXISTS `img_videos_sonido_contenidos`;
CREATE TABLE `img_videos_sonido_contenidos` (
`img_videos_id`  int(11) NOT NULL ,
`contenidos_id`  int(11) NOT NULL ,
`state_video_has_contenidos`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`contenidos_tipo_contenido_id`  int(11) NOT NULL DEFAULT 0 ,
PRIMARY KEY (`img_videos_id`, `contenidos_id`, `contenidos_tipo_contenido_id`),
FOREIGN KEY (`img_videos_id`) REFERENCES `img_videos_sonido` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`contenidos_id`) REFERENCES `contenidos` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
INDEX `fk_img_videos_has_contenidos_contenidos1_idx` (`contenidos_id`, `contenidos_tipo_contenido_id`) USING BTREE ,
INDEX `fk_img_videos_has_contenidos_img_videos1_idx` (`img_videos_id`) USING BTREE ,
INDEX `fk_img_videos_has_contenidos_contenidos1_idx1` (`contenidos_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of img_videos_sonido_contenidos
-- ----------------------------
BEGIN;
INSERT INTO `img_videos_sonido_contenidos` VALUES ('29', '179', 'active', '0'), ('30', '166', 'active', '0');
COMMIT;

-- ----------------------------
-- Table structure for `integrantes_curso`
-- ----------------------------
DROP TABLE IF EXISTS `integrantes_curso`;
CREATE TABLE `integrantes_curso` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`state_integrantes_curso`  enum('active','inactive','penddocente','pendalumno') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`cursos_id`  int(11) NOT NULL ,
`id_integrante`  int(11) NOT NULL ,
`fecha_registro`  date NOT NULL ,
`estado`  int(11) NOT NULL ,
PRIMARY KEY (`id`, `cursos_id`, `id_integrante`),
INDEX `fk_usuarios_has_cursos_cursos1` (`cursos_id`) USING BTREE ,
INDEX `fk_integrantes_curso_usuarios1` (`id_integrante`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of integrantes_curso
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `juego`
-- ----------------------------
DROP TABLE IF EXISTS `juego`;
CREATE TABLE `juego` (
`idjuego`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`dir_servidor`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`idjuego`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of juego
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `materias`
-- ----------------------------
DROP TABLE IF EXISTS `materias`;
CREATE TABLE `materias` (
`idmaterias`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre_materia`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`state_materia`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`idmaterias`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of materias
-- ----------------------------
BEGIN;
INSERT INTO `materias` VALUES ('1', 'Matematicas', 'active'), ('2', 'Español', 'active'), ('3', 'Fisica', 'active'), ('4', 'Quimica', 'active'), ('5', 'Bilogia', 'active'), ('6', 'Inglés', 'active');
COMMIT;

-- ----------------------------
-- Table structure for `materias_docente`
-- ----------------------------
DROP TABLE IF EXISTS `materias_docente`;
CREATE TABLE `materias_docente` (
`materias_idmaterias`  int(11) NOT NULL ,
`usuarios_id_usuario`  int(11) NOT NULL ,
PRIMARY KEY (`materias_idmaterias`, `usuarios_id_usuario`),
INDEX `fk_materias_has_usuarios_usuarios1_idx` (`usuarios_id_usuario`) USING BTREE ,
INDEX `fk_materias_has_usuarios_materias1_idx` (`materias_idmaterias`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of materias_docente
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `math_authassignment`
-- ----------------------------
DROP TABLE IF EXISTS `math_authassignment`;
CREATE TABLE `math_authassignment` (
`userid`  int(11) NOT NULL ,
`bizrule`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`data`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`itemname`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
PRIMARY KEY (`userid`, `itemname`),
FOREIGN KEY (`itemname`) REFERENCES `math_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`userid`) REFERENCES `math_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION,
INDEX `fk_math_authassignment_math_authitem1` (`itemname`) USING BTREE ,
INDEX `fk_math_authassignment_user` (`userid`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of math_authassignment
-- ----------------------------
BEGIN;
INSERT INTO `math_authassignment` VALUES ('1', null, 'N;', 'invitados');
COMMIT;

-- ----------------------------
-- Table structure for `math_authitem`
-- ----------------------------
DROP TABLE IF EXISTS `math_authitem`;
CREATE TABLE `math_authitem` (
`name`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`type`  int(11) NOT NULL ,
`description`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`bizrule`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
`data`  text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL ,
PRIMARY KEY (`name`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of math_authitem
-- ----------------------------
BEGIN;
INSERT INTO `math_authitem` VALUES ('action_contenidos_admin', '0', '', null, 'N;'), ('action_contenidos_create', '0', '', null, 'N;'), ('action_contenidos_delete', '0', '', null, 'N;'), ('action_contenidos_index', '0', '', null, 'N;'), ('action_contenidos_update', '0', '', null, 'N;'), ('action_contenidos_view', '0', '', null, 'N;'), ('action_cursos_admin', '0', '', null, 'N;'), ('action_cursos_create', '0', '', null, 'N;'), ('action_cursos_curso', '0', '', null, 'N;'), ('action_cursos_delete', '0', '', null, 'N;'), ('action_cursos_index', '0', '', null, 'N;'), ('action_cursos_update', '0', '', null, 'N;'), ('action_cursos_view', '0', '', null, 'N;'), ('action_imgvideossonido_admin', '0', '', null, 'N;'), ('action_imgvideossonido_create', '0', '', null, 'N;'), ('action_imgvideossonido_delete', '0', '', null, 'N;'), ('action_imgvideossonido_index', '0', '', null, 'N;'), ('action_imgvideossonido_loadformulario', '0', '', null, 'N;'), ('action_imgvideossonido_loadmultimediabycontent', '0', '', null, 'N;'), ('action_imgvideossonido_savemultimediacontent', '0', '', null, 'N;'), ('action_imgvideossonido_update', '0', '', null, 'N;'), ('action_imgvideossonido_view', '0', '', null, 'N;'), ('action_site_ajaxiniciosesion', '0', '', null, 'N;'), ('action_site_ajaxrecuperar', '0', '', null, 'N;'), ('action_site_ajaxregistro', '0', '', null, 'N;'), ('action_site_contact', '0', '', null, 'N;'), ('action_site_error', '0', '', null, 'N;'), ('action_site_index', '0', '', null, 'N;'), ('action_site_login', '0', '', null, 'N;'), ('action_site_logout', '0', '', null, 'N;'), ('action_talleres_admin', '0', '', null, 'N;'), ('action_talleres_create', '0', '', null, 'N;'), ('action_talleres_delete', '0', '', null, 'N;'), ('action_talleres_index', '0', '', null, 'N;'), ('action_talleres_update', '0', '', null, 'N;'), ('action_talleres_view', '0', '', null, 'N;'), ('action_ui_editprofile', '0', '', null, 'N;'), ('action_ui_fieldsadmincreate', '0', '', null, 'N;'), ('action_ui_fieldsadminlist', '0', '', null, 'N;'), ('action_ui_rbacajaxsetchilditem', '0', '', null, 'N;'), ('action_ui_rbacauthitemchilditems', '0', '', null, 'N;'), ('action_ui_rbacauthitemcreate', '0', '', null, 'N;'), ('action_ui_rbacauthitemupdate', '0', '', null, 'N;'), ('action_ui_rbaclistroles', '0', '', null, 'N;'), ('action_ui_rbacusersassignments', '0', '', null, 'N;'), ('action_ui_sessionadmin', '0', '', null, 'N;'), ('action_ui_systemupdate', '0', '', null, 'N;'), ('action_ui_usermanagementadmin', '0', '', null, 'N;'), ('action_ui_usermanagementcreate', '0', '', null, 'N;'), ('action_ui_usermanagementdelete', '0', '', null, 'N;'), ('action_ui_usermanagementupdate', '0', '', null, 'N;'), ('action_universidad_admin', '0', '', null, 'N;'), ('action_universidad_cargar', '0', '', null, 'N;'), ('action_universidad_create', '0', '', null, 'N;'), ('action_universidad_delete', '0', '', null, 'N;'), ('action_universidad_index', '0', '', null, 'N;'), ('action_universidad_update', '0', '', null, 'N;'), ('action_universidad_view', '0', '', null, 'N;'), ('action_usuarios_activardocente', '0', '', null, 'N;'), ('action_usuarios_activarusuario', '0', '', null, 'N;'), ('action_usuarios_active', '0', '', null, 'N;'), ('action_usuarios_admin', '0', '', null, 'N;'), ('action_usuarios_ajaxfiltrousuarios', '0', '', null, 'N;'), ('action_usuarios_cambiopassword', '0', '', null, 'N;'), ('action_usuarios_create', '0', '', null, 'N;'), ('action_usuarios_createanonimo', '0', '', null, 'N;'), ('action_usuarios_delete', '0', '', null, 'N;'), ('action_usuarios_guardarcambionuevopassword', '0', '', null, 'N;'), ('action_usuarios_inactive', '0', '', null, 'N;'), ('action_usuarios_index', '0', '', null, 'N;'), ('action_usuarios_inicio', '0', '', null, 'N;'), ('action_usuarios_recuperarpassword', '0', '', null, 'N;'), ('action_usuarios_update', '0', '', null, 'N;'), ('action_usuarios_view', '0', '', null, 'N;'), ('admin', '0', '', null, 'N;'), ('controller_contenidos', '0', '', null, 'N;'), ('controller_cursos', '0', '', null, 'N;'), ('controller_imgvideossonido', '0', '', null, 'N;'), ('controller_site', '0', '', null, 'N;'), ('controller_talleres', '0', '', null, 'N;'), ('controller_universidad', '0', '', null, 'N;'), ('controller_usuarios', '0', '', null, 'N;'), ('docente', '2', 'un docente', '', 'N;'), ('edit-advanced-profile-features', '0', 'C:\\xampp\\htdocs\\OzAuLink\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', null, 'N;'), ('estudiante', '2', 'un sagano mas', '', 'N;'), ('invitados', '2', 'Rol invitado.', '', 'N;');
COMMIT;

-- ----------------------------
-- Table structure for `math_authitemchild`
-- ----------------------------
DROP TABLE IF EXISTS `math_authitemchild`;
CREATE TABLE `math_authitemchild` (
`parent`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`child`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
PRIMARY KEY (`parent`, `child`),
FOREIGN KEY (`parent`) REFERENCES `math_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`child`) REFERENCES `math_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `child` (`child`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci

;

-- ----------------------------
-- Records of math_authitemchild
-- ----------------------------
BEGIN;
INSERT INTO `math_authitemchild` VALUES ('docente', 'action_cursos_admin'), ('docente', 'action_cursos_create'), ('invitados', 'action_cursos_curso'), ('invitados', 'action_site_ajaxiniciosesion'), ('invitados', 'action_site_ajaxrecuperar'), ('invitados', 'action_site_ajaxregistro'), ('invitados', 'action_site_contact'), ('invitados', 'action_site_error'), ('invitados', 'action_site_index'), ('invitados', 'action_site_login'), ('invitados', 'action_site_logout'), ('estudiante', 'edit-advanced-profile-features'), ('docente', 'estudiante'), ('docente', 'invitados'), ('estudiante', 'invitados');
COMMIT;

-- ----------------------------
-- Table structure for `math_field`
-- ----------------------------
DROP TABLE IF EXISTS `math_field`;
CREATE TABLE `math_field` (
`idfield`  int(11) NOT NULL AUTO_INCREMENT ,
`fieldname`  varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`longname`  varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`position`  int(11) NULL DEFAULT 0 ,
`required`  int(11) NULL DEFAULT 0 ,
`fieldtype`  int(11) NULL DEFAULT 0 ,
`fieldsize`  int(11) NULL DEFAULT 20 ,
`maxlength`  int(11) NULL DEFAULT 45 ,
`showinreports`  int(11) NULL DEFAULT 0 ,
`useregexp`  varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`useregexpmsg`  varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`predetvalue`  mediumblob NULL ,
PRIMARY KEY (`idfield`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of math_field
-- ----------------------------
BEGIN;
INSERT INTO `math_field` VALUES ('1', 'nombreusuario', 'Nombre Usuario', '2', '1', '0', '20', '45', '1', '', '', '');
COMMIT;

-- ----------------------------
-- Table structure for `math_fieldvalue`
-- ----------------------------
DROP TABLE IF EXISTS `math_fieldvalue`;
CREATE TABLE `math_fieldvalue` (
`idfieldvalue`  int(11) NOT NULL AUTO_INCREMENT ,
`iduser`  int(11) NOT NULL ,
`idfield`  int(11) NOT NULL ,
`value`  blob NULL ,
PRIMARY KEY (`idfieldvalue`),
FOREIGN KEY (`idfield`) REFERENCES `math_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
FOREIGN KEY (`iduser`) REFERENCES `math_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION,
INDEX `fk_math_fieldvalue_math_user1` (`iduser`) USING BTREE ,
INDEX `fk_math_fieldvalue_math_field1` (`idfield`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of math_fieldvalue
-- ----------------------------
BEGIN;
INSERT INTO `math_fieldvalue` VALUES ('1', '10', '1', 0x6A75617175696E);
COMMIT;

-- ----------------------------
-- Table structure for `math_session`
-- ----------------------------
DROP TABLE IF EXISTS `math_session`;
CREATE TABLE `math_session` (
`idsession`  int(11) NOT NULL AUTO_INCREMENT ,
`iduser`  int(11) NOT NULL ,
`created`  bigint(30) NULL DEFAULT NULL ,
`expire`  bigint(30) NULL DEFAULT NULL ,
`status`  int(11) NULL DEFAULT 0 ,
`ipaddress`  varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`usagecount`  int(11) NULL DEFAULT 0 ,
`lastusage`  bigint(30) NULL DEFAULT NULL ,
`logoutdate`  bigint(30) NULL DEFAULT NULL ,
`ipaddressout`  varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
PRIMARY KEY (`idsession`),
INDEX `mathsession_iduser` (`iduser`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=38

;

-- ----------------------------
-- Records of math_session
-- ----------------------------
BEGIN;
INSERT INTO `math_session` VALUES ('1', '1', '1404904957', '1404906757', '1', '127.0.0.1', '1', '1404904957', null, null), ('2', '1', '1404946231', '1404948031', '0', '127.0.0.1', '2', '1404946236', null, null), ('3', '1', '1405008747', '1405010547', '0', '127.0.0.1', '1', '1405008747', '1405009724', '127.0.0.1'), ('4', '1', '1405017761', '1405019561', '0', '127.0.0.1', '1', '1405017761', null, null), ('5', '1', '1405023471', '1405025271', '0', '127.0.0.1', '1', '1405023471', null, null), ('6', '1', '1405037198', '1405038998', '0', '127.0.0.1', '1', '1405037198', null, null), ('7', '1', '1405046327', '1405048127', '0', '127.0.0.1', '1', '1405046327', '1405046409', '127.0.0.1'), ('8', '1', '1405046658', '1405048458', '0', '127.0.0.1', '1', '1405046658', '1405046852', '127.0.0.1'), ('9', '1', '1405046872', '1405048672', '0', '127.0.0.1', '1', '1405046872', null, null), ('10', '1', '1405050079', '1405051879', '0', '127.0.0.1', '1', '1405050079', null, null), ('11', '1', '1405078035', '1405079835', '0', '127.0.0.1', '1', '1405078035', null, null), ('12', '1', '1405141826', '1405143626', '0', '127.0.0.1', '1', '1405141826', null, null), ('13', '1', '1405174366', '1405176166', '0', '127.0.0.1', '1', '1405174366', null, null), ('14', '1', '1405280706', '1405282506', '0', '127.0.0.1', '1', '1405280706', null, null), ('15', '1', '1405291186', '1405292986', '0', '127.0.0.1', '1', '1405291186', null, null), ('16', '1', '1405294275', '1405296075', '0', '127.0.0.1', '1', '1405294275', null, null), ('17', '1', '1405298010', '1405299810', '0', '127.0.0.1', '1', '1405298010', null, null), ('18', '1', '1405300915', '1405302715', '0', '127.0.0.1', '1', '1405300915', null, null), ('19', '1', '1405392578', '1405394378', '0', '::1', '1', '1405392578', null, null), ('20', '1', '1405396255', '1405398055', '0', '::1', '1', '1405396255', null, null), ('21', '1', '1405398166', '1405399966', '1', '::1', '1', '1405398166', null, null), ('22', '10', '1408308476', '1408310276', '0', '::1', '1', '1408308476', '1408308484', '::1'), ('23', '10', '1408308520', '1408310320', '0', '::1', '1', '1408308520', '1408308567', '::1'), ('24', '1', '1408308580', '1408310380', '0', '::1', '2', '1408308665', null, null), ('25', '1', '1408312107', '1408313907', '0', '::1', '1', '1408312107', null, null), ('26', '1', '1408317064', '1408318864', '0', '::1', '1', '1408317064', null, null), ('27', '1', '1408319649', '1408433049', '0', '::1', '1', '1408319649', '1408319655', '::1'), ('28', '1', '1408322344', '1408435744', '0', '::1', '1', '1408322344', '1408322353', '::1'), ('29', '1', '1408323258', '1408436658', '0', '::1', '3', '1408323401', '1408323406', '::1'), ('30', '1', '1408323540', '1408436940', '0', '::1', '1', '1408323540', '1408323615', '::1'), ('31', '1', '1408323662', '1408437062', '0', '::1', '2', '1408323662', '1408323667', '::1'), ('32', '1', '1408323724', '1408437124', '0', '::1', '1', '1408323724', '1408323729', '::1'), ('33', '1', '1408323963', '1408437363', '0', '::1', '1', '1408323963', '1408323970', '::1'), ('34', '1', '1408323982', '1408437382', '0', '::1', '1', '1408323982', '1408323991', '::1'), ('35', '1', '1408328258', '1408441658', '1', '::1', '1', '1408328258', null, null), ('36', '1', '1408512180', '1408625580', '1', '::1', '1', '1408512180', null, null), ('37', '1', '1411699855', '1411813255', '1', '::1', '1', '1411699855', null, null);
COMMIT;

-- ----------------------------
-- Table structure for `math_system`
-- ----------------------------
DROP TABLE IF EXISTS `math_system`;
CREATE TABLE `math_system` (
`idsystem`  int(11) NOT NULL AUTO_INCREMENT ,
`name`  varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`largename`  varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`sessionmaxdurationmins`  int(11) NULL DEFAULT 30 ,
`sessionmaxsameipconnections`  int(11) NULL DEFAULT 10 ,
`sessionreusesessions`  int(11) NULL DEFAULT 1 COMMENT '1yes 0no' ,
`sessionmaxsessionsperday`  int(11) NULL DEFAULT '-1' ,
`sessionmaxsessionsperuser`  int(11) NULL DEFAULT '-1' ,
`systemnonewsessions`  int(11) NULL DEFAULT 0 COMMENT '1yes 0no' ,
`systemdown`  int(11) NULL DEFAULT 0 ,
`registerusingcaptcha`  int(11) NULL DEFAULT 0 ,
`registerusingterms`  int(11) NULL DEFAULT 0 ,
`terms`  blob NULL ,
`registerusingactivation`  int(11) NULL DEFAULT 1 ,
`defaultroleforregistration`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`registerusingtermslabel`  varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`registrationonlogin`  int(11) NULL DEFAULT 1 ,
PRIMARY KEY (`idsystem`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of math_system
-- ----------------------------
BEGIN;
INSERT INTO `math_system` VALUES ('1', 'default', null, '1890', '10', '1', '-1', '-1', '0', '0', '0', '0', '', '0', '', '', '1');
COMMIT;

-- ----------------------------
-- Table structure for `math_user`
-- ----------------------------
DROP TABLE IF EXISTS `math_user`;
CREATE TABLE `math_user` (
`iduser`  int(11) NOT NULL AUTO_INCREMENT ,
`regdate`  bigint(30) NULL DEFAULT NULL ,
`actdate`  bigint(30) NULL DEFAULT NULL ,
`logondate`  bigint(30) NULL DEFAULT NULL ,
`username`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`email`  varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
`password`  varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Hashed password' ,
`authkey`  varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'llave de autentificacion' ,
`state`  int(11) NULL DEFAULT 0 ,
`totalsessioncounter`  int(11) NULL DEFAULT 0 ,
`currentsessioncounter`  int(11) NULL DEFAULT 0 ,
PRIMARY KEY (`iduser`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_unicode_ci
AUTO_INCREMENT=11

;

-- ----------------------------
-- Records of math_user
-- ----------------------------
BEGIN;
INSERT INTO `math_user` VALUES ('1', null, null, '1411699855', 'admin', 'admin@tucorreo.com', 'admin', null, '1', '0', '0'), ('2', null, null, null, 'invitado', 'invitado', 'nopassword', null, '1', '0', '0'), ('8', '1405294489', null, null, 'oscar', 'oscarmesa.elpoli@gmail.com', 'd7b89d8c', '490905b5811b93a53e397c1cfc99f137', '1', '0', '0'), ('10', '1405393022', null, '1408308520', 'diego', 'diego8525@gmail.com', '85852525', 'de4cc260a224bc4d0a9e60e55c09aa62', '1', '0', '0');
COMMIT;

-- ----------------------------
-- Table structure for `perfiles`
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles` (
`id_perfil`  int(11) NOT NULL AUTO_INCREMENT ,
`state_perfiles`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`nombre`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_perfil`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
BEGIN;
INSERT INTO `perfiles` VALUES ('4', 'active', 'Docente'), ('5', 'active', 'Estudiante'), ('6', 'active', 'Administrador');
COMMIT;

-- ----------------------------
-- Table structure for `permisos`
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`state_permisos`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`nombre`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of permisos
-- ----------------------------
BEGIN;
INSERT INTO `permisos` VALUES ('1', 'active', 'insertar usuario'), ('2', 'active', 'seleccionar usario'), ('3', 'active', 'eliminar usuario');
COMMIT;

-- ----------------------------
-- Table structure for `permisos_perfil`
-- ----------------------------
DROP TABLE IF EXISTS `permisos_perfil`;
CREATE TABLE `permisos_perfil` (
`perfiles_id`  int(11) NOT NULL ,
`state_permisos_perfil`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`permisos_id`  int(11) NOT NULL ,
PRIMARY KEY (`perfiles_id`, `permisos_id`),
FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`id_perfil`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_perfiles_has_permisos_permisos1` (`permisos_id`) USING BTREE ,
INDEX `fk_perfiles_has_permisos_perfiles1` (`perfiles_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of permisos_perfil
-- ----------------------------
BEGIN;
INSERT INTO `permisos_perfil` VALUES ('4', 'active', '1'), ('4', 'active', '3');
COMMIT;

-- ----------------------------
-- Table structure for `profesion`
-- ----------------------------
DROP TABLE IF EXISTS `profesion`;
CREATE TABLE `profesion` (
`id_profesion`  int(5) NOT NULL AUTO_INCREMENT ,
`state_profesion`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`descripcion`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_profesion`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of profesion
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `respuestaejercicio`
-- ----------------------------
DROP TABLE IF EXISTS `respuestaejercicio`;
CREATE TABLE `respuestaejercicio` (
`idRespuestaEjercicio`  int(11) NOT NULL ,
`respuesta_ejercicio`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`ordenposicion`  enum('a','b','c','d','f') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idContenido`  int(11) NULL DEFAULT NULL COMMENT 'SI a la respuesta se le desea indexar algun contenido que haga mas explicativa la respuesta.\n' ,
`es_verdadero`  enum('v','f') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`idRespuestaEjercicio`),
INDEX `fk_RespuestaEjercicio_contenidos1_idx` (`idContenido`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of respuestaejercicio
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `respuestas_evaluado`
-- ----------------------------
DROP TABLE IF EXISTS `respuestas_evaluado`;
CREATE TABLE `respuestas_evaluado` (
`ejercicios_id_ejercicio`  int(11) NOT NULL ,
`evalucacion_integrante_id_evaluacion`  int(11) NOT NULL ,
`evalucacion_integrante_id_integrante_curso`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`respuesta_ejercicio`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`es_verdadero`  enum('v','f') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`posicionrespuesta`  enum('a','b','c','d','f') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`fecha_respuesta`  datetime NULL DEFAULT NULL ,
PRIMARY KEY (`ejercicios_id_ejercicio`, `evalucacion_integrante_id_evaluacion`, `evalucacion_integrante_id_integrante_curso`),
INDEX `fk_ejercicios_has_evalucacion_integrante_evalucacion_integr_idx` (`evalucacion_integrante_id_evaluacion`, `evalucacion_integrante_id_integrante_curso`) USING BTREE ,
INDEX `fk_ejercicios_has_evalucacion_integrante_ejercicios1_idx` (`ejercicios_id_ejercicio`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of respuestas_evaluado
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `talleres`
-- ----------------------------
DROP TABLE IF EXISTS `talleres`;
CREATE TABLE `talleres` (
`idtalleres`  int(11) NOT NULL AUTO_INCREMENT ,
`state_taller`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`id_materia`  int(5) NOT NULL ,
`id_curso`  int(5) NOT NULL ,
`nombre`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`descripcion`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`idtalleres`),
FOREIGN KEY (`id_materia`) REFERENCES `materias` (`idmaterias`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `id_materia` (`id_materia`) USING BTREE ,
INDEX `id_curso` (`id_curso`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of talleres
-- ----------------------------
BEGIN;
INSERT INTO `talleres` VALUES ('1', 'active', '1', '1', 'Taller 2', 'Descripcion taller 2.');
COMMIT;

-- ----------------------------
-- Table structure for `tema`
-- ----------------------------
DROP TABLE IF EXISTS `tema`;
CREATE TABLE `tema` (
`idtema`  int(11) NOT NULL ,
`descripcion`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`idmateria`  int(11) NOT NULL ,
PRIMARY KEY (`idtema`),
INDEX `fk_tema_materias1_idx` (`idmateria`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tema
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `tema_contenidos`
-- ----------------------------
DROP TABLE IF EXISTS `tema_contenidos`;
CREATE TABLE `tema_contenidos` (
`tema_idtema`  int(11) NOT NULL ,
`contenidos_id`  int(11) NOT NULL ,
PRIMARY KEY (`tema_idtema`, `contenidos_id`),
INDEX `fk_tema_has_contenidos_contenidos1_idx` (`contenidos_id`) USING BTREE ,
INDEX `fk_tema_has_contenidos_tema1_idx` (`tema_idtema`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tema_contenidos
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `tema_evaluaciones`
-- ----------------------------
DROP TABLE IF EXISTS `tema_evaluaciones`;
CREATE TABLE `tema_evaluaciones` (
`tema_idtema`  int(11) NOT NULL ,
`evaluaciones_id`  int(11) NOT NULL ,
PRIMARY KEY (`tema_idtema`, `evaluaciones_id`),
INDEX `fk_tema_has_evaluaciones_evaluaciones1_idx` (`evaluaciones_id`) USING BTREE ,
INDEX `fk_tema_has_evaluaciones_tema1_idx` (`tema_idtema`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tema_evaluaciones
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `tema_talleres`
-- ----------------------------
DROP TABLE IF EXISTS `tema_talleres`;
CREATE TABLE `tema_talleres` (
`tema_idtema`  int(11) NOT NULL ,
`talleres_idtalleres`  int(11) NOT NULL ,
PRIMARY KEY (`tema_idtema`, `talleres_idtalleres`),
INDEX `fk_tema_has_talleres_talleres1_idx` (`talleres_idtalleres`) USING BTREE ,
INDEX `fk_tema_has_talleres_tema1_idx` (`tema_idtema`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of tema_talleres
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `universidad`
-- ----------------------------
DROP TABLE IF EXISTS `universidad`;
CREATE TABLE `universidad` (
`id_universidad`  int(5) NOT NULL AUTO_INCREMENT ,
`state_universidad`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`nombre_universidad`  varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '' ,
PRIMARY KEY (`id_universidad`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of universidad
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `usuario_universidades`
-- ----------------------------
DROP TABLE IF EXISTS `usuario_universidades`;
CREATE TABLE `usuario_universidades` (
`id_usuario`  int(11) NOT NULL ,
`state_uu`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`universidades_id`  int(11) NOT NULL ,
PRIMARY KEY (`id_usuario`, `universidades_id`),
FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`universidades_id`) REFERENCES `universidad` (`id_universidad`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_docentes_has_universidades_docentes1` (`id_usuario`) USING BTREE ,
INDEX `fk_usuario_universidades_universidad1` (`universidades_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of usuario_universidades
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
`id_usuario`  int(11) NOT NULL AUTO_INCREMENT ,
`state_usuario`  enum('active','inactive','not_confirmed','not_confirmed_admin','recover_password') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`nombre`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`apellido1`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`apellido2`  varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`contrasena`  varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`telefono`  int(15) NOT NULL ,
`celular`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`correo`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_usuario`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=9

;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
BEGIN;
INSERT INTO `usuarios` VALUES ('1', 'active', 'oscar', 'mesa', null, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '5804661', '3012280744', 'oscarmesa.elpoli@gmail.com'), ('2', 'inactive', 'Diego', 'Ochoa', null, '9a98af001a57b6a9f8013ae51acf8ac2a05b5cd8', '5804661', '3012280744', 'diego8525@gmail.com'), ('3', 'active', 'ffsd', 'apellido1', null, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0', '0', 'diego8525@hotmail.com'), ('8', 'recover_password', 'oscar', '', null, '670882072561d9166a468c4df18d4d42798a469a', '0', '', 'oscar@nettic.com.co');
COMMIT;

-- ----------------------------
-- Table structure for `usuarios_contenidos`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_contenidos`;
CREATE TABLE `usuarios_contenidos` (
`usuarios_id_usuario`  int(11) NOT NULL ,
`contenidos_id`  int(11) NOT NULL ,
PRIMARY KEY (`usuarios_id_usuario`, `contenidos_id`),
INDEX `fk_usuarios_has_contenidos_contenidos1_idx` (`contenidos_id`) USING BTREE ,
INDEX `fk_usuarios_has_contenidos_usuarios1_idx` (`usuarios_id_usuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of usuarios_contenidos
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `usuarios_perfiles`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_perfiles`;
CREATE TABLE `usuarios_perfiles` (
`usuarios_id_usuario`  int(11) NOT NULL ,
`perfiles_id_perfil`  int(11) NOT NULL ,
`state_up`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`usuarios_id_usuario`, `perfiles_id_perfil`),
FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`perfiles_id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_usuarios_has_perfiles_perfiles1_idx` (`perfiles_id_perfil`) USING BTREE ,
INDEX `fk_usuarios_has_perfiles_usuarios1_idx` (`usuarios_id_usuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of usuarios_perfiles
-- ----------------------------
BEGIN;
INSERT INTO `usuarios_perfiles` VALUES ('1', '4', 'active'), ('1', '5', 'active'), ('1', '6', 'active'), ('2', '4', 'active'), ('2', '5', 'active'), ('2', '6', 'active'), ('8', '4', 'active');
COMMIT;

-- ----------------------------
-- Table structure for `usuarios_profesion`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_profesion`;
CREATE TABLE `usuarios_profesion` (
`id_usuario`  int(11) NOT NULL ,
`Profesion_id_profesion`  int(5) NOT NULL ,
PRIMARY KEY (`id_usuario`, `Profesion_id_profesion`),
INDEX `fk_usuarios_has_Profesion_Profesion1_idx` (`Profesion_id_profesion`) USING BTREE ,
INDEX `fk_usuarios_has_Profesion_usuarios1_idx` (`id_usuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of usuarios_profesion
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Auto increment value for `contenidos`
-- ----------------------------
ALTER TABLE `contenidos` AUTO_INCREMENT=198;

-- ----------------------------
-- Auto increment value for `cursos`
-- ----------------------------
ALTER TABLE `cursos` AUTO_INCREMENT=6;

-- ----------------------------
-- Auto increment value for `ejercicios`
-- ----------------------------
ALTER TABLE `ejercicios` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `estados`
-- ----------------------------
ALTER TABLE `estados` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `evaluaciones`
-- ----------------------------
ALTER TABLE `evaluaciones` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `img_videos_sonido`
-- ----------------------------
ALTER TABLE `img_videos_sonido` AUTO_INCREMENT=31;

-- ----------------------------
-- Auto increment value for `integrantes_curso`
-- ----------------------------
ALTER TABLE `integrantes_curso` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `juego`
-- ----------------------------
ALTER TABLE `juego` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `materias`
-- ----------------------------
ALTER TABLE `materias` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `math_field`
-- ----------------------------
ALTER TABLE `math_field` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `math_fieldvalue`
-- ----------------------------
ALTER TABLE `math_fieldvalue` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `math_session`
-- ----------------------------
ALTER TABLE `math_session` AUTO_INCREMENT=38;

-- ----------------------------
-- Auto increment value for `math_system`
-- ----------------------------
ALTER TABLE `math_system` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `math_user`
-- ----------------------------
ALTER TABLE `math_user` AUTO_INCREMENT=11;

-- ----------------------------
-- Auto increment value for `perfiles`
-- ----------------------------
ALTER TABLE `perfiles` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `permisos`
-- ----------------------------
ALTER TABLE `permisos` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `profesion`
-- ----------------------------
ALTER TABLE `profesion` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `talleres`
-- ----------------------------
ALTER TABLE `talleres` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `universidad`
-- ----------------------------
ALTER TABLE `universidad` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `usuarios`
-- ----------------------------
ALTER TABLE `usuarios` AUTO_INCREMENT=9;
