/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : psarnetwork_db

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2014-11-26 15:56:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `slideshow`
-- ----------------------------
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `short_desc` text,
  `description` text,
  `link_url` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT NULL,
  `advertiser_id` int(11) DEFAULT NULL,
  `created_date` varchar(100) DEFAULT NULL,
  `expire_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slideshow
-- ----------------------------
INSERT INTO `slideshow` VALUES ('6', 'title-updated', '1413631121.jpg', 'title-updated', 'title-updated', 'http://psarnetwork.local/admin/create_slideshow-title-updated', '1', '1', '3', '17/11/2014', '14/11/2014');
INSERT INTO `slideshow` VALUES ('7', 'New Care Arrival', '1415712839.png', 'This is the best time for me This is the best time for me This is the best time for me This is the best time for me This is the best time for me', 'This is the best time for me This is the best time for me This is the best time for me This is the best time for me This is the best time for me', 'http://psarnetwork.local/admin/create_slideshow-updated', '1', null, null, '06/11/2014', '26/11/2014');
