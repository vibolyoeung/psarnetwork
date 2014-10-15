/*Table structure for table `s_page` */

DROP TABLE IF EXISTS `s_page`;

CREATE TABLE `s_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_user_id` int(11) DEFAULT NULL,
  `m_page_id` int(11) DEFAULT NULL,
  `sys_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;