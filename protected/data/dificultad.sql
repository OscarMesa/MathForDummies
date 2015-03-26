/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : math

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-03-25 20:28:38
*/

SET FOREIGN_KEY_CHECKS=0;

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
-- Auto increment value for `dificultad`
-- ----------------------------
ALTER TABLE `dificultad` AUTO_INCREMENT=4;
