/*Table structure for table `article_page` */

DROP TABLE IF EXISTS `article_page`;

CREATE TABLE `article_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `short_desc` text,
  `description` text,
  `status` int(1) DEFAULT '1',
  `m_page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;