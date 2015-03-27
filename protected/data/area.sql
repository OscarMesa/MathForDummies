/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : math

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-03-26 21:17:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `area`
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
`id_area`  int(5) NOT NULL AUTO_INCREMENT ,
`descripcion`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
PRIMARY KEY (`id_area`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of area
-- ----------------------------
BEGIN;
INSERT INTO `area` VALUES ('1', 'Ciencias Naturales'), ('2', 'Ciencias Sociales'), ('3', 'Educación Artística'), ('4', 'Humanidades'), ('5', 'Matemáticas'), ('6', 'Tegnología e Informática');
COMMIT;

-- ----------------------------
-- Auto increment value for `area`
-- ----------------------------
ALTER TABLE `area` AUTO_INCREMENT=7;



ALTER TABLE `materias`
MODIFY COLUMN `nombre_materia`  varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `idmaterias`,
MODIFY COLUMN `state_materia`  enum('active','inactive') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AFTER `nombre_materia`,
ADD COLUMN `idarea`  int(5) NOT NULL AFTER `state_materia`;


ALTER TABLE `materias` ADD CONSTRAINT `fk_id_area_asignatura` FOREIGN KEY (`idarea`) REFERENCES `area` (`id_area`) ON DELETE RESTRICT ON UPDATE CASCADE;

