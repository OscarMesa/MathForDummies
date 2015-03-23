/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : math

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-03-19 17:19:59
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
`detalle`  blob NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=199

;

-- ----------------------------
-- Records of contenidos
-- ----------------------------
BEGIN;
INSERT INTO `contenidos` VALUES ('166', 'inactive', 'oscar prueba algo mas.', 0x616473666173646661736466566964656F), ('179', 'active', 'Este es el titulo', 0x6173646673616466), ('195', 'active', 'contenido taller 1', 0x6F62736572766163696F6E20782E), ('198', 'active', null, null);
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
-- Table structure for `contenidos_materia`
-- ----------------------------
DROP TABLE IF EXISTS `contenidos_materia`;
CREATE TABLE `contenidos_materia` (
`id_contenido`  int(5) NOT NULL ,
`id_materia`  int(5) NOT NULL ,
PRIMARY KEY (`id_contenido`, `id_materia`),
FOREIGN KEY (`id_contenido`) REFERENCES `contenidos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_materia`) REFERENCES `materias` (`idmaterias`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_materia` (`id_materia`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of contenidos_materia
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
`tiene_foro`  int(1) NULL DEFAULT NULL ,
`id_grado`  int(5) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`id`),
FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_docente`) REFERENCES `math_user` (`iduser`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idmateria`) REFERENCES `materias` (`idmaterias`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_cursos_docentes1` (`id_docente`) USING BTREE ,
INDEX `fk_cursos_materias1_idx` (`idmateria`) USING BTREE ,
INDEX `cursos_fk_grado` (`id_grado`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
COMMENT='Campo que vincula el curso a un grado escolar.'
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of cursos
-- ----------------------------
BEGIN;
INSERT INTO `cursos` VALUES ('1', 'active', '1', '4', 'Quima 2', 'una prueba .......................', '2014-03-27', '2015-01-07', '1', '10'), ('2', 'active', '1', '3', 'Fisica 1', 'Curso para la medicion.', '2014-06-14', '2014-06-15', '0', '10'), ('3', 'active', '1', '1', 'Matematicas discretas.', 'matematicas el curso de 1.', '2014-05-03', '2014-05-04', '0', '6'), ('4', 'active', '1', '1', 'kkjkkjjkkjklk kjjk', 'hhjhjhjhjhj', '2014-04-04', '2014-09-04', null, '1'), ('5', 'active', '1', '1', 'Curso 1', 'esta es la descripcion.', '2014-05-01', '2014-09-07', null, '1'), ('6', 'active', '1', '1', 'prueba', 'prueba de creacion de cruso.', '2014-09-30', '2015-02-28', null, '1');
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
-- Table structure for `dificultad`
-- ----------------------------
DROP TABLE IF EXISTS `dificultad`;
CREATE TABLE `dificultad` (
`idDificultad`  int(5) NOT NULL AUTO_INCREMENT ,
`descripcion`  varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`idDificultad`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of dificultad
-- ----------------------------
BEGIN;
INSERT INTO `dificultad` VALUES ('1', 'Baja'), ('2', 'Media'), ('3', 'Alta');
COMMIT;

-- ----------------------------
-- Table structure for `ejercicios`
-- ----------------------------
DROP TABLE IF EXISTS `ejercicios`;
CREATE TABLE `ejercicios` (
`id_ejercicio`  int(11) NOT NULL AUTO_INCREMENT ,
`state_ejercicios`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
`idMateria`  int(5) NULL DEFAULT NULL ,
`ejercicio`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`idusuariocreador`  int(5) NULL DEFAULT NULL ,
`idDificultad`  int(5) NULL DEFAULT NULL ,
`visible`  enum('publico','privado') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'publico' ,
PRIMARY KEY (`id_ejercicio`),
FOREIGN KEY (`idDificultad`) REFERENCES `dificultad` (`idDificultad`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`idMateria`) REFERENCES `materias` (`idmaterias`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`idusuariocreador`) REFERENCES `math_user` (`iduser`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_ejercicios_usuarios1_idx` (`idusuariocreador`) USING BTREE ,
INDEX `fk_dificultad` (`idDificultad`) USING BTREE ,
INDEX `fk_materia_ejercicio` (`idMateria`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of ejercicios
-- ----------------------------
BEGIN;
INSERT INTO `ejercicios` VALUES ('1', 'active', '4', 'Monomios, polinomios y fracciones algebraicas', '1', '2', 'publico'), ('2', 'active', '4', 'Ecuación de primer grado', '1', '2', 'publico'), ('3', 'active', '4', 'Ejercicio para valorar su habilidad para desarrollar un problema', '1', '2', 'publico'), ('4', 'active', '4', 'Conteos numericos', '2', '3', 'privado');
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
`valoracion_porcentaje`  double NULL DEFAULT NULL ,
PRIMARY KEY (`ejercicios_id_ejercicio`, `evaluaciones_id`),
FOREIGN KEY (`ejercicios_id_ejercicio`) REFERENCES `ejercicios` (`id_ejercicio`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`evaluaciones_id`) REFERENCES `evaluacion` (`cursos_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
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
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of estados
-- ----------------------------
BEGIN;
INSERT INTO `estados` VALUES ('1', 'Activo'), ('2', 'Inactivo');
COMMIT;

-- ----------------------------
-- Table structure for `evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion` (
`cursos_id`  int(11) NOT NULL ,
`fecha_inicio`  datetime NULL DEFAULT NULL ,
`fecha_fin`  datetime NULL DEFAULT NULL ,
`porcentaje`  decimal(10,0) NULL DEFAULT NULL COMMENT 'este es el porcentaje del examen con relacion al curso' ,
`tiempo_limite`  time NULL DEFAULT NULL ,
`estado_evaluación`  int(1) NULL DEFAULT NULL ,
`tipo_evaluacion_id`  int(5) NULL DEFAULT NULL COMMENT 'Tipo de evaluacion, con este campo se busca saber si la evaluacion se va hacer virtualmente o simplemente se ingresa como un formato, lo cual indica que la evaluacion se realiza presencialmente y en el sistema solo se ingresa la nota obtenida.' ,
PRIMARY KEY (`cursos_id`),
FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`tipo_evaluacion_id`) REFERENCES `tipo_evaluacion` (`tipoid`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_cursos_has_evaluaciones_cursos1_idx` (`cursos_id`) USING BTREE ,
INDEX `fk_idtipoevaluacion` (`tipo_evaluacion_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of evaluacion
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
-- Table structure for `grado`
-- ----------------------------
DROP TABLE IF EXISTS `grado`;
CREATE TABLE `grado` (
`id_grado`  int(5) NOT NULL AUTO_INCREMENT ,
`desc_numerica`  int(5) NOT NULL ,
`desc_verbal`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'Descripcion verbal del grado, por ejemplo: sexto, decimo, once' ,
PRIMARY KEY (`id_grado`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=12

;

-- ----------------------------
-- Records of grado
-- ----------------------------
BEGIN;
INSERT INTO `grado` VALUES ('1', '1', 'Primero de primaria'), ('2', '2', 'Segundo de primaria'), ('3', '3', 'Tercero de primaria'), ('4', '4', 'Cuarto de primaria.'), ('5', '5', 'Quito de primaria'), ('6', '6', 'Sexto'), ('7', '7', 'Séptimo'), ('8', '8', 'Octavo'), ('9', '9', 'Noveno'), ('10', '10', 'Décimo'), ('11', '11', 'Once');
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
INSERT INTO `img_videos_sonido` VALUES ('1', 'active', '', 'ewrwqer', 'img', 'qewrwe', '1'), ('2', 'active', '', 'fadasf', 'img', 'adsfdsaf', '1'), ('3', 'active', 'themes/PoliAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', '1'), ('4', 'active', 'themes/PoliAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', '1'), ('5', 'active', 'themes/PoliAuLink/images/14/ana.jpg', 'fadasf', 'img', 'adsfdsaf', '1'), ('6', 'active', 'themes/PoliAuLink/images/15/46.png', 'adsf', 'img', 'asdfdsaf', '1'), ('7', 'active', 'themes/PoliAuLink/images/contenidos/49/273738_661765541_263078633_n.jpg', 'prueba', 'img', 'asdfsadf', '1'), ('8', 'active', 'themes/PoliAuLink/images/contenidos/50/av-9.jpg', 'adsf', 'img', 'asdfsadf', '1'), ('9', 'active', '', 'asdfasdf', 'video', 'Esta es la descripcion.', '1'), ('10', 'active', '', 'sdfasdf', 'video', 'asdfsdf', '1'), ('11', 'active', '', 'fasdf', 'video', 'fasdf', '1'), ('12', 'active', '', 'prueba', 'video', 'asdfasdfasdf', '1'), ('13', 'active', '', 'adfsdf', 'video', 'asdfsaf', '1'), ('14', 'active', '', 'adfsdf', 'video', 'asdfsaf', '1'), ('15', 'active', '', 'adfsdf', 'video', 'asdfsaf', '1'), ('16', 'active', '', 'dadsf', 'video', 'dsfsa', '1'), ('17', 'active', '', 'dadsf', 'video', 'dsfsa', '1'), ('18', 'active', 'http://vimeo.com/85475429', 'dfasdf', 'video', 'asdfasdf', '1'), ('19', 'active', 'http://vimeo.com/85475429', 'asfasfdhttp://vimeo.com/85475429', 'video', 'asdfasdfasdfadsf', '1'), ('20', 'active', 'http://vimeo.com/85475429', 'asdfasdf', 'video', 'dsf', '1'), ('21', 'active', 'themes/PoliAuLink/images/contenidos/160/273738_661765541_263078633_n.jpg', 'sdfg', 'img', 'sdfgsdfgsdf', '1'), ('22', 'active', 'themes/PoliAuLink/images/contenidos/161/certificado.png', 'dfd', 'img', 'asdfasdf', '1'), ('23', 'active', 'http://vimeo.com/85475429', 'asdfasdf', 'video', 'asdfasdf', '1'), ('24', 'active', 'http://vimeo.com/85475429', 'tales', 'video', 'dasdfsafdsafdasdf', '1'), ('25', 'active', 'http://vimeo.com/85475429', 'prueba', 'video', 'asdfasdf', '1'), ('26', 'active', 'themes/PoliAuLink/images/contenidos/167/46.png', 'otra prueba', 'img', 'sadfasfdasdfasf', '1'), ('27', 'active', 'themes/PoliAuLink/images/contenidos/178/10174854_655914264446567_765582406_n.jpg', 'contenido 1', 'img', 'esta es una prueba', '1'), ('28', 'active', 'themes/PoliAuLink/images/contenidos/164/respiracion.jpg', 'Contenido 1', 'img', 'Descripcion.', '1'), ('29', 'active', 'themes/PoliAuLink/images/contenidos/179/certificado.png', 'hello', 'img', 'asfsadfsdf', '1'), ('30', 'active', 'themes/PoliAuLink/images/contenidos/166/576098_10150986024207739_1502339542_n.jpg', 'Imagen 1', 'img', 'Imagen para mostrar ejemplo', '1');
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
`cursos_id`  int(11) NOT NULL ,
`id_integrante`  int(11) NOT NULL ,
`fecha_registro`  timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`estado`  int(11) NOT NULL ,
PRIMARY KEY (`id`, `cursos_id`, `id_integrante`),
FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`estado`) REFERENCES `estados` (`id_estado`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`id_integrante`) REFERENCES `math_user` (`iduser`) ON DELETE RESTRICT ON UPDATE CASCADE,
UNIQUE INDEX `uq_estudiante_curso` (`cursos_id`, `id_integrante`) USING BTREE ,
INDEX `fk_usuarios_has_cursos_cursos1` (`cursos_id`) USING BTREE ,
INDEX `fk_integrantes_curso_usuarios1` (`id_integrante`) USING BTREE ,
INDEX `fk_estado_id` (`estado`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=45

;

-- ----------------------------
-- Records of integrantes_curso
-- ----------------------------
BEGIN;
INSERT INTO `integrantes_curso` VALUES ('10', '1', '36', '2015-03-07 14:18:20', '2'), ('11', '1', '1', '2015-03-07 11:05:25', '2'), ('13', '1', '33', '2015-03-10 20:27:35', '1'), ('42', '1', '34', '2015-03-10 20:27:56', '1'), ('44', '2', '33', '2015-03-08 10:32:43', '1');
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
INSERT INTO `math_authassignment` VALUES ('2', null, 'N;', 'invitado'), ('33', null, 'N;', 'alumno'), ('34', null, 'N;', 'alumno'), ('36', null, 'N;', 'Alumno');
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
INSERT INTO `math_authitem` VALUES ('action__nuevocontediomediacurso', '0', '', null, 'N;'), ('action_contenidos_admin', '0', '', null, 'N;'), ('action_contenidos_create', '0', '', null, 'N;'), ('action_contenidos_delete', '0', '', null, 'N;'), ('action_contenidos_index', '0', '', null, 'N;'), ('action_contenidos_nuevocontediomediacurso', '0', '', null, 'N;'), ('action_contenidos_update', '0', '', null, 'N;'), ('action_contenidos_view', '0', '', null, 'N;'), ('action_cursos_admin', '0', '', null, 'N;'), ('action_cursos_agregarestudiantes', '0', '', null, 'N;'), ('action_cursos_create', '0', '', null, 'N;'), ('action_cursos_curso', '0', '', null, 'N;'), ('action_cursos_delete', '0', '', null, 'N;'), ('action_cursos_eliminarusuariocurso', '0', '', null, 'N;'), ('action_cursos_index', '0', '', null, 'N;'), ('action_cursos_update', '0', '', null, 'N;'), ('action_cursos_view', '0', '', null, 'N;'), ('action_default_create', '0', '', null, 'N;'), ('action_default_delete', '0', '', null, 'N;'), ('action_default_download', '0', '', null, 'N;'), ('action_default_index', '0', '', null, 'N;'), ('action_documento_view', '0', '', null, 'N;'), ('action_ejercicios_view', '0', '', null, 'N;'), ('action_evaluacion_admin', '0', '', null, 'N;'), ('action_evaluacion_create', '0', '', null, 'N;'), ('action_evaluacion_delete', '0', '', null, 'N;'), ('action_evaluacion_index', '0', '', null, 'N;'), ('action_evaluacion_update', '0', '', null, 'N;'), ('action_evaluacion_view', '0', '', null, 'N;'), ('action_evaluaciones_create', '0', '', null, 'N;'), ('action_grado_admin', '0', '', null, 'N;'), ('action_grado_create', '0', '', null, 'N;'), ('action_grado_delete', '0', '', null, 'N;'), ('action_grado_index', '0', '', null, 'N;'), ('action_grado_update', '0', '', null, 'N;'), ('action_grado_view', '0', '', null, 'N;'), ('action_imgvideossonido_admin', '0', '', null, 'N;'), ('action_imgvideossonido_create', '0', '', null, 'N;'), ('action_imgvideossonido_delete', '0', '', null, 'N;'), ('action_imgvideossonido_index', '0', '', null, 'N;'), ('action_imgvideossonido_loadformulario', '0', '', null, 'N;'), ('action_imgvideossonido_loadmultimediabycontent', '0', '', null, 'N;'), ('action_imgvideossonido_savemultimediacontent', '0', '', null, 'N;'), ('action_imgvideossonido_update', '0', '', null, 'N;'), ('action_imgvideossonido_view', '0', '', null, 'N;'), ('action_site_ajaxiniciosesion', '0', '', null, 'N;'), ('action_site_ajaxrecuperar', '0', '', null, 'N;'), ('action_site_ajaxregistro', '0', '', null, 'N;'), ('action_site_contact', '0', '', null, 'N;'), ('action_site_error', '0', '', null, 'N;'), ('action_site_index', '0', '', null, 'N;'), ('action_site_login', '0', '', null, 'N;'), ('action_site_logout', '0', '', null, 'N;'), ('action_talleres_admin', '0', '', null, 'N;'), ('action_talleres_create', '0', '', null, 'N;'), ('action_talleres_delete', '0', '', null, 'N;'), ('action_talleres_index', '0', '', null, 'N;'), ('action_talleres_update', '0', '', null, 'N;'), ('action_talleres_view', '0', '', null, 'N;'), ('action_tema_active', '0', '', null, 'N;'), ('action_tema_admin', '0', '', null, 'N;'), ('action_tema_create', '0', '', null, 'N;'), ('action_tema_delete', '0', '', null, 'N;'), ('action_tema_index', '0', '', null, 'N;'), ('action_tema_update', '0', '', null, 'N;'), ('action_tema_view', '0', '', null, 'N;'), ('action_ui_editprofile', '0', '', null, 'N;'), ('action_ui_fieldsadmincreate', '0', '', null, 'N;'), ('action_ui_fieldsadmindelete', '0', '', null, 'N;'), ('action_ui_fieldsadminlist', '0', '', null, 'N;'), ('action_ui_fieldsadminupdate', '0', '', null, 'N;'), ('action_ui_rbacajaxassignment', '0', '', null, 'N;'), ('action_ui_rbacajaxsetchilditem', '0', '', null, 'N;'), ('action_ui_rbacauthitemchilditems', '0', '', null, 'N;'), ('action_ui_rbacauthitemcreate', '0', '', null, 'N;'), ('action_ui_rbacauthitemdelete', '0', '', null, 'N;'), ('action_ui_rbacauthitemupdate', '0', '', null, 'N;'), ('action_ui_rbaclistops', '0', '', null, 'N;'), ('action_ui_rbaclistroles', '0', '', null, 'N;'), ('action_ui_rbaclisttasks', '0', '', null, 'N;'), ('action_ui_rbacusersassignments', '0', '', null, 'N;'), ('action_ui_sessionadmin', '0', '', null, 'N;'), ('action_ui_systemupdate', '0', '', null, 'N;'), ('action_ui_usermanagementadmin', '0', '', null, 'N;'), ('action_ui_usermanagementcreate', '0', '', null, 'N;'), ('action_ui_usermanagementdelete', '0', '', null, 'N;'), ('action_ui_usermanagementupdate', '0', '', null, 'N;'), ('action_ui_usersaved', '0', '', null, 'N;'), ('action_universidad_admin', '0', '', null, 'N;'), ('action_universidad_cargar', '0', '', null, 'N;'), ('action_universidad_create', '0', '', null, 'N;'), ('action_universidad_delete', '0', '', null, 'N;'), ('action_universidad_index', '0', '', null, 'N;'), ('action_universidad_update', '0', '', null, 'N;'), ('action_universidad_view', '0', '', null, 'N;'), ('action_usuarios_activardocente', '0', '', null, 'N;'), ('action_usuarios_activarusuario', '0', '', null, 'N;'), ('action_usuarios_active', '0', '', null, 'N;'), ('action_usuarios_admin', '0', '', null, 'N;'), ('action_usuarios_ajaxfiltrousuarios', '0', '', null, 'N;');
INSERT INTO `math_authitem` VALUES ('action_usuarios_cambiopassword', '0', '', null, 'N;'), ('action_usuarios_create', '0', '', null, 'N;'), ('action_usuarios_createanonimo', '0', '', null, 'N;'), ('action_usuarios_delete', '0', '', null, 'N;'), ('action_usuarios_guardarcambionuevopassword', '0', '', null, 'N;'), ('action_usuarios_inactive', '0', '', null, 'N;'), ('action_usuarios_index', '0', '', null, 'N;'), ('action_usuarios_inicio', '0', '', null, 'N;'), ('action_usuarios_obtenerestudiantesajax', '0', '', null, 'N;'), ('action_usuarios_recuperarpassword', '0', '', null, 'N;'), ('action_usuarios_update', '0', '', null, 'N;'), ('action_usuarios_view', '0', '', null, 'N;'), ('admin', '0', '', null, 'N;'), ('Administrador_cursos', '1', '', '', 'N;'), ('Administrador_Examen', '1', 'usuarios que administran los exámenes-docentes', '', 'N;'), ('Administrador_Multimedia', '1', 'administra imagenes, videos y audio.', '', 'N;'), ('Administrar_Ejercicios', '1', 'usuarios que administran ejercicios', '', 'N;'), ('Administrar_Usuarios', '1', 'Usuario puede administrar todos los usuarios.', '', 'N;'), ('Adminsitrar_Talleres', '1', 'usuarios que tiene acceso a administrar talleres', '', 'N;'), ('Alumno', '2', 'Alumno de la aplicación', '', 'N;'), ('controller_contenidos', '0', '', null, 'N;'), ('controller_cursos', '0', '', null, 'N;'), ('controller_evaluacion', '0', '', null, 'N;'), ('controller_grado', '0', '', null, 'N;'), ('controller_imgvideossonido', '0', '', null, 'N;'), ('controller_site', '0', '', null, 'N;'), ('controller_talleres', '0', '', null, 'N;'), ('controller_tema', '0', '', null, 'N;'), ('controller_universidad', '0', '', null, 'N;'), ('controller_usuarios', '0', '', null, 'N;'), ('Derrollar_Taller', '1', 'usuarios que desarrollan un taller', '', 'N;'), ('Desarrollar_Ejercicio', '1', 'usuarios que desarrollan ejercicios', '', 'N;'), ('Desarrollar_examen', '1', 'Alumnos que realizan el examen.', '', 'N;'), ('Desarrollo_ejercicios', '1', 'usuarios que desarrollan los ejercicios', '', 'N;'), ('edit-advanced-profile-features', '0', 'C:\\xampp\\htdocs\\PoliAuLink\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', null, 'N;'), ('invitado', '2', 'Usuario que solo puede ver lo básico de la aplicación.', '', 'N;'), ('Moderador_foro_chat', '1', 'Usuario encargado de administrar contenidos que se manejan en foros.', '', 'N;'), ('Profesor', '2', 'este es el profe de la aplicación', '', 'N;'), ('Realizar_Taller', '1', 'Usuario general que puede ver un taller.', '', 'N;');
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
INSERT INTO `math_authitemchild` VALUES ('Alumno', 'action_contenidos_create'), ('Administrador_cursos', 'action_contenidos_index'), ('Administrador_Examen', 'action_contenidos_index'), ('Administrador_Multimedia', 'action_contenidos_index'), ('Administrar_Ejercicios', 'action_contenidos_index'), ('Administrar_Usuarios', 'action_contenidos_index'), ('Adminsitrar_Talleres', 'action_contenidos_index'), ('Alumno', 'action_contenidos_index'), ('Derrollar_Taller', 'action_contenidos_index'), ('Desarrollar_Ejercicio', 'action_contenidos_index'), ('Desarrollar_examen', 'action_contenidos_index'), ('Desarrollo_ejercicios', 'action_contenidos_index'), ('invitado', 'action_contenidos_index'), ('Moderador_foro_chat', 'action_contenidos_index'), ('Profesor', 'action_contenidos_index'), ('Realizar_Taller', 'action_contenidos_index'), ('Administrador_cursos', 'action_contenidos_view'), ('Administrador_Examen', 'action_contenidos_view'), ('Administrador_Multimedia', 'action_contenidos_view'), ('Administrar_Ejercicios', 'action_contenidos_view'), ('Administrar_Usuarios', 'action_contenidos_view'), ('Adminsitrar_Talleres', 'action_contenidos_view'), ('Alumno', 'action_contenidos_view'), ('Derrollar_Taller', 'action_contenidos_view'), ('Desarrollar_Ejercicio', 'action_contenidos_view'), ('Desarrollar_examen', 'action_contenidos_view'), ('Desarrollo_ejercicios', 'action_contenidos_view'), ('invitado', 'action_contenidos_view'), ('Moderador_foro_chat', 'action_contenidos_view'), ('Profesor', 'action_contenidos_view'), ('Realizar_Taller', 'action_contenidos_view'), ('Administrador_cursos', 'action_cursos_admin'), ('Alumno', 'action_cursos_admin'), ('Administrador_cursos', 'action_cursos_create'), ('Alumno', 'action_cursos_create'), ('Alumno', 'action_cursos_curso'), ('Administrador_cursos', 'action_cursos_delete'), ('Administrador_cursos', 'action_cursos_index'), ('Administrador_Examen', 'action_cursos_index'), ('Administrador_Multimedia', 'action_cursos_index'), ('Administrar_Ejercicios', 'action_cursos_index'), ('Administrar_Usuarios', 'action_cursos_index'), ('Adminsitrar_Talleres', 'action_cursos_index'), ('Alumno', 'action_cursos_index'), ('Derrollar_Taller', 'action_cursos_index'), ('Desarrollar_Ejercicio', 'action_cursos_index'), ('Desarrollar_examen', 'action_cursos_index'), ('Desarrollo_ejercicios', 'action_cursos_index'), ('invitado', 'action_cursos_index'), ('Moderador_foro_chat', 'action_cursos_index'), ('Profesor', 'action_cursos_index'), ('Realizar_Taller', 'action_cursos_index'), ('Administrador_cursos', 'action_cursos_update'), ('Administrador_cursos', 'action_cursos_view'), ('Administrador_Examen', 'action_cursos_view'), ('Administrador_Multimedia', 'action_cursos_view'), ('Administrar_Ejercicios', 'action_cursos_view'), ('Administrar_Usuarios', 'action_cursos_view'), ('Adminsitrar_Talleres', 'action_cursos_view'), ('Alumno', 'action_cursos_view'), ('Derrollar_Taller', 'action_cursos_view'), ('Desarrollar_Ejercicio', 'action_cursos_view'), ('Desarrollar_examen', 'action_cursos_view'), ('Desarrollo_ejercicios', 'action_cursos_view'), ('invitado', 'action_cursos_view'), ('Moderador_foro_chat', 'action_cursos_view'), ('Profesor', 'action_cursos_view'), ('Realizar_Taller', 'action_cursos_view'), ('invitado', 'action_default_index'), ('invitado', 'action_documento_view'), ('Profesor', 'action_grado_admin'), ('Profesor', 'action_grado_create'), ('Profesor', 'action_grado_delete'), ('invitado', 'action_grado_index'), ('Profesor', 'action_grado_index'), ('Profesor', 'action_grado_update'), ('invitado', 'action_grado_view'), ('Profesor', 'action_grado_view'), ('Administrador_cursos', 'action_imgvideossonido_index'), ('Administrador_Examen', 'action_imgvideossonido_index'), ('Administrador_Multimedia', 'action_imgvideossonido_index'), ('Administrar_Ejercicios', 'action_imgvideossonido_index'), ('Administrar_Usuarios', 'action_imgvideossonido_index'), ('Adminsitrar_Talleres', 'action_imgvideossonido_index'), ('Alumno', 'action_imgvideossonido_index'), ('Derrollar_Taller', 'action_imgvideossonido_index'), ('Desarrollar_Ejercicio', 'action_imgvideossonido_index'), ('Desarrollar_examen', 'action_imgvideossonido_index'), ('Desarrollo_ejercicios', 'action_imgvideossonido_index'), ('invitado', 'action_imgvideossonido_index'), ('Moderador_foro_chat', 'action_imgvideossonido_index'), ('Profesor', 'action_imgvideossonido_index'), ('Realizar_Taller', 'action_imgvideossonido_index'), ('Administrador_cursos', 'action_imgvideossonido_view'), ('Administrador_Examen', 'action_imgvideossonido_view'), ('Administrador_Multimedia', 'action_imgvideossonido_view'), ('Administrar_Ejercicios', 'action_imgvideossonido_view'), ('Administrar_Usuarios', 'action_imgvideossonido_view'), ('Adminsitrar_Talleres', 'action_imgvideossonido_view'), ('Alumno', 'action_imgvideossonido_view');
INSERT INTO `math_authitemchild` VALUES ('Derrollar_Taller', 'action_imgvideossonido_view'), ('Desarrollar_Ejercicio', 'action_imgvideossonido_view'), ('Desarrollar_examen', 'action_imgvideossonido_view'), ('Desarrollo_ejercicios', 'action_imgvideossonido_view'), ('invitado', 'action_imgvideossonido_view'), ('Moderador_foro_chat', 'action_imgvideossonido_view'), ('Profesor', 'action_imgvideossonido_view'), ('Realizar_Taller', 'action_imgvideossonido_view'), ('Administrador_cursos', 'action_site_index'), ('Administrador_Examen', 'action_site_index'), ('Administrador_Multimedia', 'action_site_index'), ('Administrar_Ejercicios', 'action_site_index'), ('Administrar_Usuarios', 'action_site_index'), ('Adminsitrar_Talleres', 'action_site_index'), ('Alumno', 'action_site_index'), ('Derrollar_Taller', 'action_site_index'), ('Desarrollar_Ejercicio', 'action_site_index'), ('Desarrollar_examen', 'action_site_index'), ('Desarrollo_ejercicios', 'action_site_index'), ('invitado', 'action_site_index'), ('Moderador_foro_chat', 'action_site_index'), ('Profesor', 'action_site_index'), ('Realizar_Taller', 'action_site_index'), ('Administrador_cursos', 'action_talleres_index'), ('Administrador_Examen', 'action_talleres_index'), ('Administrador_Multimedia', 'action_talleres_index'), ('Administrar_Ejercicios', 'action_talleres_index'), ('Administrar_Usuarios', 'action_talleres_index'), ('Adminsitrar_Talleres', 'action_talleres_index'), ('Alumno', 'action_talleres_index'), ('Derrollar_Taller', 'action_talleres_index'), ('Desarrollar_Ejercicio', 'action_talleres_index'), ('Desarrollar_examen', 'action_talleres_index'), ('Desarrollo_ejercicios', 'action_talleres_index'), ('invitado', 'action_talleres_index'), ('Moderador_foro_chat', 'action_talleres_index'), ('Profesor', 'action_talleres_index'), ('Realizar_Taller', 'action_talleres_index'), ('Administrador_cursos', 'action_talleres_view'), ('Administrador_Examen', 'action_talleres_view'), ('Administrador_Multimedia', 'action_talleres_view'), ('Administrar_Ejercicios', 'action_talleres_view'), ('Administrar_Usuarios', 'action_talleres_view'), ('Adminsitrar_Talleres', 'action_talleres_view'), ('Alumno', 'action_talleres_view'), ('Derrollar_Taller', 'action_talleres_view'), ('Desarrollar_Ejercicio', 'action_talleres_view'), ('Desarrollar_examen', 'action_talleres_view'), ('Desarrollo_ejercicios', 'action_talleres_view'), ('invitado', 'action_talleres_view'), ('Moderador_foro_chat', 'action_talleres_view'), ('Profesor', 'action_talleres_view'), ('Realizar_Taller', 'action_talleres_view'), ('invitado', 'action_tema_index'), ('invitado', 'action_tema_view'), ('Administrador_cursos', 'action_universidad_index'), ('Administrador_Examen', 'action_universidad_index'), ('Administrador_Multimedia', 'action_universidad_index'), ('Administrar_Ejercicios', 'action_universidad_index'), ('Administrar_Usuarios', 'action_universidad_index'), ('Adminsitrar_Talleres', 'action_universidad_index'), ('Alumno', 'action_universidad_index'), ('Derrollar_Taller', 'action_universidad_index'), ('Desarrollar_Ejercicio', 'action_universidad_index'), ('Desarrollar_examen', 'action_universidad_index'), ('Desarrollo_ejercicios', 'action_universidad_index'), ('invitado', 'action_universidad_index'), ('Moderador_foro_chat', 'action_universidad_index'), ('Profesor', 'action_universidad_index'), ('Realizar_Taller', 'action_universidad_index'), ('Administrador_cursos', 'action_universidad_view'), ('Administrador_Examen', 'action_universidad_view'), ('Administrador_Multimedia', 'action_universidad_view'), ('Administrar_Ejercicios', 'action_universidad_view'), ('Administrar_Usuarios', 'action_universidad_view'), ('Adminsitrar_Talleres', 'action_universidad_view'), ('Alumno', 'action_universidad_view'), ('Derrollar_Taller', 'action_universidad_view'), ('Desarrollar_Ejercicio', 'action_universidad_view'), ('Desarrollar_examen', 'action_universidad_view'), ('Desarrollo_ejercicios', 'action_universidad_view'), ('invitado', 'action_universidad_view'), ('Moderador_foro_chat', 'action_universidad_view'), ('Profesor', 'action_universidad_view'), ('Realizar_Taller', 'action_universidad_view'), ('Administrador_cursos', 'action_usuarios_index'), ('Administrador_Examen', 'action_usuarios_index'), ('Administrador_Multimedia', 'action_usuarios_index'), ('Administrar_Ejercicios', 'action_usuarios_index'), ('Administrar_Usuarios', 'action_usuarios_index'), ('Adminsitrar_Talleres', 'action_usuarios_index'), ('Alumno', 'action_usuarios_index'), ('Derrollar_Taller', 'action_usuarios_index'), ('Desarrollar_Ejercicio', 'action_usuarios_index'), ('Desarrollar_examen', 'action_usuarios_index'), ('Desarrollo_ejercicios', 'action_usuarios_index'), ('invitado', 'action_usuarios_index'), ('Moderador_foro_chat', 'action_usuarios_index'), ('Profesor', 'action_usuarios_index'), ('Realizar_Taller', 'action_usuarios_index');
INSERT INTO `math_authitemchild` VALUES ('Alumno', 'action_usuarios_inicio'), ('invitado', 'action_usuarios_inicio'), ('Profesor', 'action_usuarios_inicio'), ('Administrador_cursos', 'action_usuarios_view'), ('Administrador_Examen', 'action_usuarios_view'), ('Administrador_Multimedia', 'action_usuarios_view'), ('Administrar_Ejercicios', 'action_usuarios_view'), ('Administrar_Usuarios', 'action_usuarios_view'), ('Adminsitrar_Talleres', 'action_usuarios_view'), ('Alumno', 'action_usuarios_view'), ('Derrollar_Taller', 'action_usuarios_view'), ('Desarrollar_Ejercicio', 'action_usuarios_view'), ('Desarrollar_examen', 'action_usuarios_view'), ('Desarrollo_ejercicios', 'action_usuarios_view'), ('invitado', 'action_usuarios_view'), ('Moderador_foro_chat', 'action_usuarios_view'), ('Profesor', 'action_usuarios_view'), ('Realizar_Taller', 'action_usuarios_view'), ('Alumno', 'Administrador_Examen'), ('Alumno', 'Administrar_Ejercicios'), ('Alumno', 'Derrollar_Taller'), ('Alumno', 'Profesor');
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
AUTO_INCREMENT=9

;

-- ----------------------------
-- Records of math_field
-- ----------------------------
BEGIN;
INSERT INTO `math_field` VALUES ('1', 'nombrecompleto', 'Nombre completo', '0', '1', '0', '20', '45', '0', '', 'Este campo es obligatorio', ''), ('3', 'universidad', 'Universidad', '2', '1', '3', '20', '45', '0', '', '', 0x312C20506F6C6974C3A9636E69636F20436F6C6F6D6269616E6F204A61696D65204973617A6120436164617669640D0A322C2045414649540D0A332C20556E69766572736964616420646520416E74696F717569610D0A342C20556E697665727369646164206465204E6163696F6E616C20646520436F6C6F6D626961), ('4', 'telefono', 'Teléfono', '4', '1', '0', '20', '20', '0', '', '', ''), ('5', 'cel', 'Celular', '5', '0', '0', '20', '45', '0', '', '', ''), ('6', 'fechanac', 'Fecha de nacimiento', '6', '1', '0', '20', '45', '0', '', '', ''), ('7', 'materias', 'Materias', '7', '1', '3', '20', '45', '0', '', '', 0x312C204D6174656DC3A174696361730D0A322C2045737061C3B16F6C0D0A332C20205175C3AD6D6963610D0A342C2046C3AD73696361), ('8', 'aplicaCurso', 'Aplica para los cursos?', '2', '1', '3', '20', '45', '0', '', '', 0x312C53690D0A302C4E6F);
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
AUTO_INCREMENT=28

;

-- ----------------------------
-- Records of math_fieldvalue
-- ----------------------------
BEGIN;
INSERT INTO `math_fieldvalue` VALUES ('1', '1', '1', 0x4F73636172204D657361), ('3', '1', '3', 0x31), ('4', '1', '4', 0x35383034363631), ('5', '1', '5', 0x33303132323830373434), ('6', '1', '6', 0x30392F31312F31393931), ('7', '1', '7', 0x31), ('8', '36', '1', 0x446965676F204F63686F612047757A6D616E), ('9', '36', '3', 0x31), ('10', '36', '4', 0x3330313233313233), ('11', '36', '5', 0x333234323334), ('12', '36', '6', 0x30392F31312F31393931), ('13', '36', '7', 0x31), ('14', '33', '1', 0x6F73636172206D657361), ('15', '33', '3', 0x31), ('16', '33', '4', 0x35383032313332), ('17', '33', '5', 0x333234323334), ('18', '33', '6', 0x36206465206F6374756272652064656C203930), ('19', '33', '7', 0x32), ('20', '33', '8', 0x31), ('21', '34', '1', 0x446965676F2041726D616E646F204F63686F61), ('22', '34', '3', 0x31), ('23', '34', '8', 0x31), ('24', '34', '4', 0x35383032313332), ('25', '34', '5', 0x333234323334), ('26', '34', '6', 0x36206465206F6374756272652064656C203932), ('27', '34', '7', 0x31);
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
AUTO_INCREMENT=152

;

-- ----------------------------
-- Records of math_session
-- ----------------------------
BEGIN;
INSERT INTO `math_session` VALUES ('1', '1', '1404904957', '1404906757', '1', '127.0.0.1', '1', '1404904957', null, null), ('2', '1', '1408382754', '1408384554', '0', '127.0.0.1', '1', '1408382754', '1408383385', '127.0.0.1'), ('3', '1', '1408389256', '1408391056', '0', '127.0.0.1', '1', '1408389256', '1408389329', '127.0.0.1'), ('4', '1', '1408395987', '1408397787', '0', '127.0.0.1', '1', '1408395987', '1408395991', '127.0.0.1'), ('5', '6', '1408426845', '1408428645', '0', '127.0.0.1', '1', '1408426845', '1408426854', '127.0.0.1'), ('6', '1', '1408426863', '1408428663', '1', '127.0.0.1', '1', '1408426863', null, null), ('7', '1', '1408580023', '1408581823', '0', '127.0.0.1', '1', '1408580023', '1408580154', '127.0.0.1'), ('8', '1', '1408580788', '1408582588', '1', '127.0.0.1', '1', '1408580788', null, null), ('9', '6', '1409246792', '1409248592', '0', '127.0.0.1', '1', '1409246792', '1409246814', '127.0.0.1'), ('10', '1', '1409246821', '1409248621', '1', '127.0.0.1', '1', '1409246821', null, null), ('11', '6', '1411620398', '1411622198', '0', '127.0.0.1', '1', '1411620398', '1411620455', '127.0.0.1'), ('12', '1', '1411620469', '1411622269', '0', '127.0.0.1', '1', '1411620469', null, null), ('13', '1', '1411643561', '1411645361', '0', '127.0.0.1', '1', '1411643561', null, null), ('14', '1', '1411645491', '1411647291', '0', '127.0.0.1', '1', '1411645491', null, null), ('15', '1', '1411694905', '1411696705', '0', '127.0.0.1', '1', '1411694905', null, null), ('16', '1', '1411700982', '1411702782', '0', '127.0.0.1', '1', '1411700982', null, null), ('17', '1', '1411706465', '1411708265', '0', '127.0.0.1', '1', '1411706465', null, null), ('18', '1', '1411708493', '1411710293', '0', '127.0.0.1', '1', '1411708493', null, null), ('19', '1', '1411711601', '1411713401', '0', '127.0.0.1', '1', '1411711601', null, null), ('20', '1', '1411713431', '1411715231', '0', '127.0.0.1', '1', '1411713431', null, null), ('21', '1', '1411731473', '1411733273', '0', '127.0.0.1', '1', '1411731473', null, null), ('22', '1', '1411784753', '1411786553', '0', '127.0.0.1', '1', '1411784753', null, null), ('23', '1', '1411828808', '1411830608', '0', '127.0.0.1', '1', '1411828808', null, null), ('24', '1', '1411836952', '1411838752', '0', '127.0.0.1', '1', '1411836952', '1411837170', '127.0.0.1'), ('25', '1', '1411838175', '1411839975', '0', '127.0.0.1', '2', '1411838870', null, null), ('26', '1', '1411840297', '1411842097', '0', '127.0.0.1', '1', '1411840297', '1411840530', '127.0.0.1'), ('27', '1', '1411840606', '1411842406', '0', '127.0.0.1', '1', '1411840606', '1411840623', '127.0.0.1'), ('28', '1', '1411840643', '1411842443', '0', '127.0.0.1', '1', '1411840643', '1411840671', '127.0.0.1'), ('29', '1', '1411840813', '1411842613', '0', '127.0.0.1', '1', '1411840813', '1411841249', '127.0.0.1'), ('30', '19', '1411841261', '1411843061', '0', '127.0.0.1', '1', '1411841261', '1411841272', '127.0.0.1'), ('31', '1', '1411841278', '1411843078', '0', '127.0.0.1', '1', '1411841278', '1411841332', '127.0.0.1'), ('32', '19', '1411841339', '1411843139', '0', '127.0.0.1', '1', '1411841339', '1411841343', '127.0.0.1'), ('33', '1', '1411841453', '1411843253', '0', '127.0.0.1', '1', '1411841453', null, null), ('34', '1', '1411847963', '1411849763', '0', '127.0.0.1', '1', '1411847963', '1411848002', '127.0.0.1'), ('35', '1', '1411848140', '1411849940', '1', '127.0.0.1', '1', '1411848140', null, null), ('36', '1', '1411989289', '1411991089', '0', '127.0.0.1', '1', '1411989289', '1411989603', '127.0.0.1'), ('37', '1', '1411990697', '1411992497', '0', '127.0.0.1', '1', '1411990697', '1411990941', '127.0.0.1'), ('38', '25', '1411990950', '1411992750', '0', '127.0.0.1', '1', '1411990950', '1411990990', '127.0.0.1'), ('39', '1', '1412036857', '1412038657', '0', '127.0.0.1', '1', '1412036857', null, null), ('40', '1', '1412038973', '1412050973', '0', '127.0.0.1', '1', '1412038973', null, null), ('41', '1', '1412065016', '1412077016', '0', '127.0.0.1', '1', '1412065016', '1412065038', '127.0.0.1'), ('42', '1', '1412065342', '1412077342', '0', '127.0.0.1', '1', '1412065342', '1412065360', '127.0.0.1'), ('43', '1', '1412066851', '1412078851', '0', '127.0.0.1', '1', '1412066851', '1412066880', '127.0.0.1'), ('44', '1', '1412067026', '1412079026', '0', '127.0.0.1', '1', '1412067026', '1412067039', '127.0.0.1'), ('45', '1', '1412067051', '1412079051', '0', '127.0.0.1', '1', '1412067051', '1412067204', '127.0.0.1'), ('46', '29', '1412069508', '1412081508', '0', '127.0.0.1', '1', '1412069508', '1412069597', '127.0.0.1'), ('47', '30', '1412069668', '1412081668', '0', '127.0.0.1', '1', '1412069668', '1412069676', '127.0.0.1'), ('48', '1', '1412072699', '1412084699', '0', '127.0.0.1', '1', '1412072699', '1412072708', '127.0.0.1'), ('49', '33', '1412072752', '1412084752', '0', '127.0.0.1', '1', '1412072752', '1412072755', '127.0.0.1'), ('50', '1', '1412072772', '1412084772', '0', '127.0.0.1', '1', '1412072772', null, null), ('51', '1', '1412099021', '1412111021', '1', '127.0.0.1', '1', '1412099021', null, null), ('52', '1', '1412121989', '1412133989', '0', '127.0.0.1', '1', '1412121989', null, null), ('53', '1', '1412135505', '1412147505', '0', '127.0.0.1', '1', '1412135505', null, null), ('54', '1', '1412169427', '1412181427', '1', '127.0.0.1', '1', '1412169427', null, null), ('55', '1', '1412208808', '1412220808', '0', '127.0.0.1', '1', '1412208808', null, null), ('56', '1', '1412221345', '1412233345', '0', '127.0.0.1', '1', '1412221345', null, null), ('57', '33', '1412230540', '1412242540', '0', '127.0.0.1', '1', '1412230540', '1412230666', '127.0.0.1'), ('58', '33', '1412230679', '1412242679', '1', '127.0.0.1', '1', '1412230679', null, null), ('59', '1', '1412233691', '1412245691', '0', '127.0.0.1', '1', '1412233691', null, null), ('60', '1', '1412250585', '1412262585', '1', '127.0.0.1', '1', '1412250585', null, null), ('61', '1', '1412292900', '1412304900', '0', '127.0.0.1', '1', '1412292900', null, null), ('62', '1', '1412306369', '1412318369', '0', '127.0.0.1', '1', '1412306369', '1412307057', '127.0.0.1'), ('63', '1', '1412307565', '1412319565', '0', '127.0.0.1', '1', '1412307565', '1412308193', '127.0.0.1'), ('64', '34', '1412309205', '1412321205', '0', '127.0.0.1', '1', '1412309205', '1412309213', '127.0.0.1'), ('65', '1', '1412309788', '1412321788', '0', '127.0.0.1', '1', '1412309788', null, null), ('66', '1', '1412335623', '1412347623', '0', '127.0.0.1', '1', '1412335623', null, null), ('67', '1', '1412385143', '1412397143', '0', '127.0.0.1', '1', '1412385143', null, null), ('68', '1', '1412398031', '1412410031', '0', '127.0.0.1', '1', '1412398031', null, null), ('69', '1', '1412419944', '1412431944', '0', '127.0.0.1', '1', '1412419944', '1412424824', '127.0.0.1'), ('70', '1', '1412424932', '1412436932', '0', '127.0.0.1', '1', '1412424932', null, null), ('71', '1', '1412437286', '1412449286', '0', '127.0.0.1', '1', '1412437286', null, null), ('72', '1', '1412452387', '1412464387', '0', '127.0.0.1', '1', '1412452387', null, null), ('73', '1', '1412473447', '1412485447', '0', '127.0.0.1', '1', '1412473447', null, null), ('74', '1', '1412532814', '1412544814', '0', '127.0.0.1', '1', '1412532814', null, null), ('75', '1', '1412554843', '1412566843', '1', '127.0.0.1', '1', '1412554843', null, null), ('76', '1', '1413333267', '1413345267', '0', '127.0.0.1', '1', '1413333267', null, null), ('77', '1', '1413345680', '1413357680', '1', '127.0.0.1', '1', '1413345680', null, null), ('78', '1', '1414110734', '1414122734', '0', '127.0.0.1', '1', '1414110734', null, null), ('79', '1', '1414122929', '1414134929', '0', '127.0.0.1', '1', '1414122929', null, null), ('80', '1', '1414342479', '1414354479', '0', '127.0.0.1', '1', '1414342479', null, null), ('81', '1', '1414357337', '1414369337', '1', '127.0.0.1', '1', '1414357337', null, null), ('82', '1', '1414431949', '1414443949', '0', '127.0.0.1', '1', '1414431949', null, null), ('83', '1', '1414464281', '1414476281', '0', '127.0.0.1', '1', '1414464281', null, null), ('84', '1', '1414495035', '1414507035', '0', '127.0.0.1', '1', '1414495035', null, null), ('85', '1', '1414519708', '1414531708', '0', '127.0.0.1', '1', '1414519708', null, null), ('86', '1', '1414558027', '1414570027', '0', '127.0.0.1', '1', '1414558027', null, null), ('87', '1', '1414582988', '1414594988', '1', '127.0.0.1', '1', '1414582988', null, null), ('88', '1', '1414724550', '1414736550', '0', '127.0.0.1', '1', '1414724550', null, null), ('89', '1', '1414758629', '1414770629', '0', '127.0.0.1', '1', '1414758629', null, null), ('90', '1', '1414792273', '1414804273', '1', '127.0.0.1', '1', '1414792273', null, null), ('91', '1', '1415038789', '1415050789', '0', '127.0.0.1', '1', '1415038789', null, null), ('92', '1', '1415060994', '1415072994', '0', '127.0.0.1', '1', '1415060994', null, null), ('93', '1', '1415123681', '1415135681', '0', '127.0.0.1', '1', '1415123681', null, null), ('94', '1', '1415273624', '1415285624', '1', '127.0.0.1', '1', '1415273624', null, null), ('95', '1', '1416886241', '1416898241', '1', '127.0.0.1', '1', '1416886241', null, null), ('96', '1', '1420862401', '1420874401', '0', '127.0.0.1', '1', '1420862401', '1420862412', '127.0.0.1'), ('97', '1', '1420862547', '1420874547', '0', '127.0.0.1', '1', '1420862547', null, null), ('98', '1', '1420874931', '1420886931', '0', '127.0.0.1', '1', '1420874931', null, null), ('99', '1', '1420887316', '1420899316', '0', '127.0.0.1', '1', '1420887316', null, null), ('100', '1', '1420900094', '1420912094', '0', '127.0.0.1', '1', '1420900094', null, null);
INSERT INTO `math_session` VALUES ('101', '1', '1420914073', '1420926073', '0', '127.0.0.1', '1', '1420914073', '1420914195', '127.0.0.1'), ('102', '1', '1420914223', '1420926223', '0', '127.0.0.1', '2', '1420914346', '1420914350', '127.0.0.1'), ('103', '1', '1420914368', '1420926368', '0', '127.0.0.1', '2', '1420914797', '1420914798', '127.0.0.1'), ('104', '1', '1420914843', '1420926843', '0', '127.0.0.1', '2', '1420914908', '1420914913', '127.0.0.1'), ('105', '1', '1420915172', '1420927172', '0', '127.0.0.1', '1', '1420915172', '1420915759', '127.0.0.1'), ('106', '1', '1420915808', '1420927808', '0', '127.0.0.1', '1', '1420915808', '1420915878', '127.0.0.1'), ('107', '1', '1420915924', '1420927924', '0', '127.0.0.1', '1', '1420915924', '1420915928', '127.0.0.1'), ('108', '1', '1420915967', '1420927967', '0', '127.0.0.1', '2', '1420917054', '1420917128', '127.0.0.1'), ('109', '1', '1420917144', '1420929144', '0', '127.0.0.1', '1', '1420917144', '1420917146', '127.0.0.1'), ('110', '1', '1420917310', '1420929310', '0', '127.0.0.1', '1', '1420917310', '1420917352', '127.0.0.1'), ('111', '1', '1420917421', '1420929421', '0', '127.0.0.1', '2', '1420918437', '1420918439', '127.0.0.1'), ('112', '1', '1420918561', '1420930561', '1', '127.0.0.1', '1', '1420918561', null, null), ('113', '1', '1421278315', '1421290315', '1', '127.0.0.1', '2', '1421278336', null, null), ('114', '1', '1421400253', '1421412253', '0', '127.0.0.1', '1', '1421400253', null, null), ('115', '1', '1421413595', '1421425595', '1', '127.0.0.1', '1', '1421413595', null, null), ('116', '1', '1423093593', '1423105593', '0', '127.0.0.1', '1', '1423093593', null, null), ('117', '1', '1423697230', '1423709230', '1', '127.0.0.1', '1', '1423697230', null, null), ('118', '1', '1425513424', '1425525424', '0', '127.0.0.1', '1', '1425513424', '1425517932', '127.0.0.1'), ('119', '1', '1425517987', '1425529987', '0', '127.0.0.1', '1', '1425517987', null, null), ('120', '1', '1425530020', '1425542020', '0', '127.0.0.1', '1', '1425530020', null, null), ('121', '1', '1425547027', '1425559027', '0', '127.0.0.1', '1', '1425547027', '1425552963', '127.0.0.1'), ('122', '33', '1425552970', '1425564970', '0', '127.0.0.1', '1', '1425552970', '1425552975', '127.0.0.1'), ('123', '1', '1425552979', '1425564979', '0', '127.0.0.1', '1', '1425552979', null, null), ('124', '1', '1425681952', '1425693952', '0', '127.0.0.1', '1', '1425681952', null, null), ('125', '1', '1425695241', '1425707241', '0', '127.0.0.1', '1', '1425695241', null, null), ('126', '1', '1425740016', '1425752016', '0', '127.0.0.1', '1', '1425740016', null, null), ('127', '1', '1425755855', '1425767855', '0', '127.0.0.1', '1', '1425755855', null, null), ('128', '1', '1425772133', '1425784133', '0', '127.0.0.1', '1', '1425772133', null, null), ('129', '1', '1425792284', '1425804284', '0', '127.0.0.1', '1', '1425792284', null, null), ('130', '1', '1425821552', '1425833552', '0', '127.0.0.1', '1', '1425821552', null, null), ('131', '1', '1425836485', '1425848485', '0', '127.0.0.1', '1', '1425836485', null, null), ('132', '1', '1425852980', '1425864980', '0', '127.0.0.1', '1', '1425852980', null, null), ('133', '1', '1425865018', '1425877018', '0', '127.0.0.1', '2', '1425871171', null, null), ('134', '1', '1425898530', '1425910530', '1', '127.0.0.1', '1', '1425898530', null, null), ('135', '1', '1425944858', '1425956858', '0', '127.0.0.1', '1', '1425944858', null, null), ('136', '1', '1425958501', '1425970501', '0', '127.0.0.1', '1', '1425958501', null, null), ('137', '1', '1425982284', '1425994284', '0', '127.0.0.1', '1', '1425982284', null, null), ('138', '1', '1426008473', '1426020473', '1', '127.0.0.1', '1', '1426008473', null, null), ('139', '1', '1426036962', '1426048962', '0', '127.0.0.1', '1', '1426036962', null, null), ('140', '1', '1426072893', '1426084893', '1', '127.0.0.1', '1', '1426072893', null, null), ('141', '1', '1426117850', '1426129850', '0', '127.0.0.1', '1', '1426117850', null, null), ('142', '1', '1426131459', '1426143459', '0', '127.0.0.1', '1', '1426131459', null, null), ('143', '1', '1426160699', '1426172699', '1', '127.0.0.1', '1', '1426160699', null, null), ('144', '1', '1426206435', '1426218435', '0', '127.0.0.1', '1', '1426206435', null, null), ('145', '1', '1426219230', '1426231230', '1', '127.0.0.1', '1', '1426219230', null, null), ('146', '1', '1426678532', '1426690532', '0', '127.0.0.1', '1', '1426678532', null, null), ('147', '1', '1426702637', '1426714637', '1', '127.0.0.1', '1', '1426702637', null, null), ('148', '1', '1426721389', '1426733389', '1', '127.0.0.1', '1', '1426721389', null, null), ('149', '1', '1426764852', '1426776852', '1', '127.0.0.1', '1', '1426764852', null, null), ('150', '1', '1426788495', '1426800495', '0', '127.0.0.1', '1', '1426788495', null, null), ('151', '1', '1426802860', '1426814860', '1', '127.0.0.1', '1', '1426802860', null, null);
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
INSERT INTO `math_system` VALUES ('1', 'default', null, '200', '10', '1', '-1', '-1', '0', '0', '0', '0', '', '0', '', '', '1');
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
AUTO_INCREMENT=37

;

-- ----------------------------
-- Records of math_user
-- ----------------------------
BEGIN;
INSERT INTO `math_user` VALUES ('1', null, null, '1426802860', 'admin', 'admin@tucorreo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', null, '1', '0', '0'), ('2', null, null, null, 'invitado', 'invitado', 'nopassword', null, '1', '0', '0'), ('33', null, null, '1425552970', 'omesag', 'oscarmesa.elpoli@gmail.com', '9c524002915fb6ac799f264eb4fefacd9abe7da1', null, '1', '0', '0'), ('34', null, null, '1412309205', 'diegochoa', 'ochoa8525@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', null, '1', '0', '0'), ('36', '1412425581', null, null, 'diego234', 'diego8525@gmail.com', 'b78e82e69823d05bf5219fbf9b7e91b1b5662787', '14fc10955e05b78e961d0480894370326b272f58', '1', '0', '0');
COMMIT;

-- ----------------------------
-- Table structure for `periodo`
-- ----------------------------
DROP TABLE IF EXISTS `periodo`;
CREATE TABLE `periodo` (
`id_periodo`  int(5) NOT NULL AUTO_INCREMENT ,
`valor_numerico`  int(5) NOT NULL ,
`valor_textual`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id_periodo`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of periodo
-- ----------------------------
BEGIN;
INSERT INTO `periodo` VALUES ('1', '1', 'Período 1'), ('2', '2', 'Período 2'), ('3', '3', 'Período 3'), ('4', '4', 'Período 4');
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
`idtema`  int(11) NOT NULL AUTO_INCREMENT ,
`titulo`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`descripcion`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
`idcurso`  int(11) NOT NULL ,
`idperiodo`  int(5) NULL DEFAULT NULL ,
`estado`  enum('inactive','active') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'active' ,
PRIMARY KEY (`idtema`),
FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
FOREIGN KEY (`idperiodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE RESTRICT ON UPDATE CASCADE,
INDEX `fk_tema_materias1_idx` (`idcurso`) USING BTREE ,
INDEX `fk_idperiodo` (`idperiodo`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
COMMENT='Mediate este campo podremos saber cual es el periodo al que pertenece el tema que se le esta cargando al curso'
AUTO_INCREMENT=12

;

-- ----------------------------
-- Records of tema
-- ----------------------------
BEGIN;
INSERT INTO `tema` VALUES ('1', 'Estequiometría', 'Leyes fundamentales de la química. Teoría  atómica de Dalton. Hipótesis de\r\nAvogadro. Átomo. Molécula. Peso atómico. Peso molecular. Mol. Número de Avogadro. Volumen molar. Estequiometría.', '1', '1', 'active'), ('2', 'Estructura atómica de la tabla periódica', 'Naturaleza eléctrica de la materia. Rayos catódicos. Experiencia de Thomson y Millikan. Experiencia de Rutherford. Electrones. Protones. Neutrones. Átomo de Bohr. Dualidad partícula onda. Principio de incertidumbre. Ecuación de Schrodinger. Números cuánticos. Orbitales. Principio de Exclusión de Pauli. Regla de Hund. Configuraciones electrónicas. Clasificación periódica de los elementos. Propiedades  periódicas. Radio  atómico. Radio iónico. Potencial de ionización. Afinidad electrónica. Electronegatividad.\r\n ', '1', '2', 'active'), ('4', 'Estequiometría 1', 'Naturaleza eléctrica de la materia. Rayos catódicos. Experiencia de Thomson y Millikan. Experiencia de Rutherford. Electrones. Protones. Neutrones. Átomo de Bohr. Dualidad partícula onda. Principio de incertidumbre. Ecuación de Schrodinger. Números cuánticos. Orbitales. Principio de Exclusión de Pauli. Regla de Hund. Configuraciones electrónicas. Clasificación periódica de los elementos. Propiedades  periódicas. Radio  atómico. Radio iónico. Potencial de ionización. Afinidad electrónica. Electronegatividad.\r\n ', '1', '3', 'inactive'), ('5', 'Estequiometría 1', '<zxc<zcx<zxc<zxc', '1', '2', 'active'), ('6', 'Enlace químico ', null, '1', '1', 'active'), ('7', 'Enlace químico ', null, '1', '1', 'active'), ('8', 'Extraccion de piedras', null, '1', '2', 'active'), ('9', 'diego', null, '1', '1', 'inactive'), ('10', 'oscar', 'jejejejejeje', '1', '1', 'inactive'), ('11', 'Un tema mas', 'this is a prueba', '2', '1', 'active');
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
FOREIGN KEY (`tema_idtema`) REFERENCES `tema` (`idtema`) ON DELETE RESTRICT ON UPDATE CASCADE,
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
-- Table structure for `tipo_evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_evaluacion`;
CREATE TABLE `tipo_evaluacion` (
`tipoid`  int(5) NOT NULL AUTO_INCREMENT ,
`tipo_evaluacion`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`tipoid`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of tipo_evaluacion
-- ----------------------------
BEGIN;
INSERT INTO `tipo_evaluacion` VALUES ('1', 'Presencial'), ('2', 'Virtual');
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
ALTER TABLE `contenidos` AUTO_INCREMENT=199;

-- ----------------------------
-- Auto increment value for `cursos`
-- ----------------------------
ALTER TABLE `cursos` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for `dificultad`
-- ----------------------------
ALTER TABLE `dificultad` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for `ejercicios`
-- ----------------------------
ALTER TABLE `ejercicios` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `estados`
-- ----------------------------
ALTER TABLE `estados` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `grado`
-- ----------------------------
ALTER TABLE `grado` AUTO_INCREMENT=12;

-- ----------------------------
-- Auto increment value for `img_videos_sonido`
-- ----------------------------
ALTER TABLE `img_videos_sonido` AUTO_INCREMENT=31;

-- ----------------------------
-- Auto increment value for `integrantes_curso`
-- ----------------------------
ALTER TABLE `integrantes_curso` AUTO_INCREMENT=45;

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
ALTER TABLE `math_field` AUTO_INCREMENT=9;

-- ----------------------------
-- Auto increment value for `math_fieldvalue`
-- ----------------------------
ALTER TABLE `math_fieldvalue` AUTO_INCREMENT=28;

-- ----------------------------
-- Auto increment value for `math_session`
-- ----------------------------
ALTER TABLE `math_session` AUTO_INCREMENT=152;

-- ----------------------------
-- Auto increment value for `math_system`
-- ----------------------------
ALTER TABLE `math_system` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `math_user`
-- ----------------------------
ALTER TABLE `math_user` AUTO_INCREMENT=37;

-- ----------------------------
-- Auto increment value for `periodo`
-- ----------------------------
ALTER TABLE `periodo` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for `profesion`
-- ----------------------------
ALTER TABLE `profesion` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for `talleres`
-- ----------------------------
ALTER TABLE `talleres` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for `tema`
-- ----------------------------
ALTER TABLE `tema` AUTO_INCREMENT=12;

-- ----------------------------
-- Auto increment value for `tipo_evaluacion`
-- ----------------------------
ALTER TABLE `tipo_evaluacion` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `universidad`
-- ----------------------------
ALTER TABLE `universidad` AUTO_INCREMENT=1;
