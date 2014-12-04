-- ----------------------------
-- Table structure for `m_category`
-- ----------------------------
DROP TABLE IF EXISTS `m_category`;
CREATE TABLE `m_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) DEFAULT NULL,
  `name_zh` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_category
-- ----------------------------
INSERT INTO `m_category` VALUES ('13', 'testing', 'testing', '11', '0');
INSERT INTO `m_category` VALUES ('16', 'luxis', 'luxis', '15', '1');
INSERT INTO `m_category` VALUES ('17', 'Luxis-330', 'Luxis-330', '16', '1');
INSERT INTO `m_category` VALUES ('19', 'super maraket en', 'super market zh', '0', '1');
INSERT INTO `m_category` VALUES ('20', 'traditional market', 'traditional market', '0', '1');
INSERT INTO `m_category` VALUES ('21', 'private company', 'private company', '0', '1');
INSERT INTO `m_category` VALUES ('22', 'home shop', 'home shop', '0', '1');
INSERT INTO `m_category` VALUES ('23', 'individual', 'individual', '0', '1');
INSERT INTO `m_category` VALUES ('24', 'Phone', 'Phone', '19', '1');
INSERT INTO `m_category` VALUES ('25', 'Tablet', 'Tablet', '19', '1');
INSERT INTO `m_category` VALUES ('26', 'Laptop', 'Laptop', '19', '1');
INSERT INTO `m_category` VALUES ('27', 'Moto', 'Moto', '19', '1');
INSERT INTO `m_category` VALUES ('28', 'House', 'House', '19', '1');
INSERT INTO `m_category` VALUES ('29', 'Car', 'Car', '19', '1');
INSERT INTO `m_category` VALUES ('30', 'Land', 'Land', '19', '1');
INSERT INTO `m_category` VALUES ('31', 'Instrument', 'Instrument', '19', '1');
INSERT INTO `m_category` VALUES ('32', 'Closth', 'Closth', '19', '1');
INSERT INTO `m_category` VALUES ('33', 'Jewellery', 'Jewellery', '19', '1');
INSERT INTO `m_category` VALUES ('34', 'Cosmetic Wakeup', 'Cosmetic Wakeup', '19', '1');
INSERT INTO `m_category` VALUES ('35', 'Food', 'Food', '19', '1');
INSERT INTO `m_category` VALUES ('36', 'Furniture', 'Furniture', '19', '1');
INSERT INTO `m_category` VALUES ('37', 'Entertainment', 'Entertainment', '19', '1');
INSERT INTO `m_category` VALUES ('38', 'Fussiness Service', 'Fussiness Service', '19', '1');
INSERT INTO `m_category` VALUES ('39', 'Phone', 'Phone', '20', '1');
INSERT INTO `m_category` VALUES ('40', 'Computer', 'Computer', '20', '1');
INSERT INTO `m_category` VALUES ('42', 'Dell en', 'Dekk zh', '40', '1');
INSERT INTO `m_category` VALUES ('43', 'HP en', 'HP zh', '40', '1');
INSERT INTO `m_category` VALUES ('44', 'Postro', 'Postro', '42', '1');
INSERT INTO `m_category` VALUES ('45', 'Lattitude E6400', 'Lattitude E6400', '42', '1');
INSERT INTO `m_category` VALUES ('46', 'HP AA', 'HP AA', '43', '1');
INSERT INTO `m_category` VALUES ('47', 'HP BB', 'HP BB', '43', '1');
INSERT INTO `m_category` VALUES ('48', 'TT', 'TT', '45', '1');