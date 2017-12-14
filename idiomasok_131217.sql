/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 100126
Source Host           : localhost:3306
Source Database       : idiomasok

Target Server Type    : MYSQL
Target Server Version : 100126
File Encoding         : 65001

Date: 2017-12-13 18:31:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for aula
-- ----------------------------
DROP TABLE IF EXISTS `aula`;
CREATE TABLE `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of aula
-- ----------------------------
INSERT INTO `aula` VALUES ('1', 'Aula A');
INSERT INTO `aula` VALUES ('2', 'Aula B');
INSERT INTO `aula` VALUES ('3', 'Aula C');

-- ----------------------------
-- Table structure for curso
-- ----------------------------
DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacidad` int(11) NOT NULL,
  `esta_abierto` tinyint(4) NOT NULL,
  `idioma_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkidioma_idx` (`idioma_id`) USING BTREE,
  KEY `fknivel` (`nivel_id`),
  CONSTRAINT `fkidioma` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fknivel` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of curso
-- ----------------------------
INSERT INTO `curso` VALUES ('13', '12', '1', '9', '1');
INSERT INTO `curso` VALUES ('15', '123', '1', '10', '2');

-- ----------------------------
-- Table structure for grupo
-- ----------------------------
DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aula_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `maestro_id` int(11) DEFAULT NULL,
  `horario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkaid_idx` (`aula_id`) USING BTREE,
  KEY `fkgrups_idx` (`curso_id`) USING BTREE,
  KEY `fkmas_idx` (`maestro_id`) USING BTREE,
  KEY `fkh` (`horario_id`),
  CONSTRAINT `fkaid` FOREIGN KEY (`aula_id`) REFERENCES `aula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkgrups` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkh` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkmas` FOREIGN KEY (`maestro_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of grupo
-- ----------------------------
INSERT INTO `grupo` VALUES ('5', '1', '13', '5', '1');

-- ----------------------------
-- Table structure for grupo_alumno
-- ----------------------------
DROP TABLE IF EXISTS `grupo_alumno`;
CREATE TABLE `grupo_alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkuid` (`usuario_id`),
  KEY `fkg` (`grupo_id`),
  CONSTRAINT `fkg` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkuid` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grupo_alumno
-- ----------------------------

-- ----------------------------
-- Table structure for horario
-- ----------------------------
DROP TABLE IF EXISTS `horario`;
CREATE TABLE `horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of horario
-- ----------------------------
INSERT INTO `horario` VALUES ('1', 'Lunes - Viernes 10-14');
INSERT INTO `horario` VALUES ('3', '123132123');

-- ----------------------------
-- Table structure for idioma
-- ----------------------------
DROP TABLE IF EXISTS `idioma`;
CREATE TABLE `idioma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of idioma
-- ----------------------------
INSERT INTO `idioma` VALUES ('9', 'Ruso');
INSERT INTO `idioma` VALUES ('10', 'Aleman');

-- ----------------------------
-- Table structure for nivel
-- ----------------------------
DROP TABLE IF EXISTS `nivel`;
CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nivel
-- ----------------------------
INSERT INTO `nivel` VALUES ('1', 'Basico');
INSERT INTO `nivel` VALUES ('2', 'Medio');
INSERT INTO `nivel` VALUES ('3', 'Avanzado');

-- ----------------------------
-- Table structure for tipo_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tipo_usuario
-- ----------------------------
INSERT INTO `tipo_usuario` VALUES ('1', 'Alumno');
INSERT INTO `tipo_usuario` VALUES ('2', 'Profesor');
INSERT INTO `tipo_usuario` VALUES ('3', 'Administrador');
INSERT INTO `tipo_usuario` VALUES ('4', 'Moderador');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `domicilio` varchar(45) DEFAULT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fktipousuario_idx` (`tipo_usuario_id`) USING BTREE,
  CONSTRAINT `fktipousuario` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'tavo_x99@hotmail.com', 'smtavo1991', 'gustavo', 'jimenez torres', '9931460820', 'calle chida por ahi numer 999 centro tabasco', '1');
INSERT INTO `usuario` VALUES ('2', 'x@x.coms', 'a', 'profesors', 'chideyd', '9931111a', 'asdasds', '3');
INSERT INTO `usuario` VALUES ('3', 'admin@admin.com', 'smtavo1991', 'admin', 'admin', '123', 'asdas', '3');
INSERT INTO `usuario` VALUES ('5', 'q@q.com', 'hola', 'juan', 'lima', '23132123', 'asdasdasd', '2');
