/*
Navicat MySQL Data Transfer

Source Server         : lamp
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : wechat

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-07-18 17:56:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for active
-- ----------------------------
DROP TABLE IF EXISTS `active`;
CREATE TABLE `active` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT '标题',
  `cate_id` int(11) DEFAULT NULL COMMENT '分类id',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `connent` varchar(255) DEFAULT NULL COMMENT '内容',
  `publisher` varchar(50) DEFAULT NULL COMMENT '发布人',
  `modifier` varchar(50) DEFAULT NULL COMMENT '修改人',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keywords` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '关键词',
  `connent` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '回复内容',
  `enabled` tinyint(1) DEFAULT '1',
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
