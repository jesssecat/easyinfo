/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lemtree

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-09 17:07:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `uid` int(10) unsigned NOT NULL,
  `names` varchar(50) NOT NULL,
  `addres` varchar(50) NOT NULL DEFAULT '0',
  `phone` varchar(20) NOT NULL DEFAULT '0',
  `edu` varchar(15) NOT NULL DEFAULT '0',
  `sex` varchar(5) NOT NULL DEFAULT '0',
  `presens` text,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `names` (`names`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------

-- ----------------------------
-- Table structure for `user_reg`
-- ----------------------------
DROP TABLE IF EXISTS `user_reg`;
CREATE TABLE `user_reg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `regtime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_reg_username` (`username`),
  KEY `user_reg_password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_reg
-- ----------------------------
