/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ropa

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-02-15 20:47:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tblcategoria`
-- ----------------------------
DROP TABLE IF EXISTS `tblcategoria`;
CREATE TABLE `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `strDescripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblcategoria
-- ----------------------------
INSERT INTO `tblcategoria` VALUES ('4', 'Jean');
INSERT INTO `tblcategoria` VALUES ('5', 'Camisas');
INSERT INTO `tblcategoria` VALUES ('7', 'Busos');
INSERT INTO `tblcategoria` VALUES ('8', 'Medias');

-- ----------------------------
-- Table structure for `tblproducto`
-- ----------------------------
DROP TABLE IF EXISTS `tblproducto`;
CREATE TABLE `tblproducto` (
  `idProductos` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(100) DEFAULT NULL,
  `strSEO` varchar(100) DEFAULT NULL,
  `dblPrecio` double DEFAULT NULL,
  `intEstado` int(11) DEFAULT NULL,
  `intCategoria` int(11) DEFAULT NULL,
  `strImagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProductos`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblproducto
-- ----------------------------
INSERT INTO `tblproducto` VALUES ('3', 'Manga Corta', 's-m-l', '25000', '1', '5', null);
INSERT INTO `tblproducto` VALUES ('4', 'Manga Larga', 's-m-l', '40000', '1', '5', null);
INSERT INTO `tblproducto` VALUES ('5', 'Blusa', 's-m-l', '30000', '1', '5', null);
INSERT INTO `tblproducto` VALUES ('6', 'Levis', '28-32', '50000', '1', '4', null);
INSERT INTO `tblproducto` VALUES ('7', 'Man Power', '28-32', '45000', '1', '4', null);
INSERT INTO `tblproducto` VALUES ('8', 'Forever', '6-8', '550000', '1', '4', null);
INSERT INTO `tblproducto` VALUES ('9', 'B-Capota', 'm-l-xl', '60000', '1', '7', null);

-- ----------------------------
-- Table structure for `tblusuario`
-- ----------------------------
DROP TABLE IF EXISTS `tblusuario`;
CREATE TABLE `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) DEFAULT NULL,
  `strApellido` varchar(50) DEFAULT NULL,
  `intDocumento` int(11) DEFAULT NULL,
  `intNumeroTelefono` bigint(50) DEFAULT NULL,
  `strDireccion` varchar(100) DEFAULT NULL,
  `strEmail` varchar(100) DEFAULT NULL,
  `intActivo` int(11) DEFAULT NULL,
  `strPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tblusuario
-- ----------------------------
INSERT INTO `tblusuario` VALUES ('5', 'jhon', 'sierra', '1024532118', '2147483647', 'kra 54 y7sur', 'jfzp001@live.com', '1', '123');
