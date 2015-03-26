/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : math

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-03-25 19:28:02
*/

SET FOREIGN_KEY_CHECKS=0;

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
FOREIGN KEY (`evaluaciones_id`) REFERENCES `evaluacion` (`id_evaluacion`) ON DELETE RESTRICT ON UPDATE CASCADE,
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
INSERT INTO `ejercicios_evaluaciones` VALUES ('1', '4', '1'), ('1', '5', '1'), ('1', '6', '1'), ('1', '7', '1'), ('2', '7', '2'), ('3', '6', '3');
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
-- Auto increment value for `ejercicios`
-- ----------------------------
ALTER TABLE `ejercicios` AUTO_INCREMENT=5;
