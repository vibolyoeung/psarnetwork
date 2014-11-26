/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : psarnetwork_db

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2014-11-26 15:56:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `short_desc` varchar(200) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `product_service_type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `expire_date` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'product-slide', 'ShortDesc', 'Long Desc', '20', '1', '1', '1413631092.jpg', '2014/11/10', '2014/11/26', '1');
