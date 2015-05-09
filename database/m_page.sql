/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.17 : Database - psarnetwork_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`psarnetwork_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `psarnetwork_db`;

/*Table structure for table `m_page` */

DROP TABLE IF EXISTS `m_page`;

CREATE TABLE `m_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_user_id` int(11) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `title_km` varchar(50) DEFAULT NULL,
  `short_desc_en` text,
  `short_desc_km` text,
  `status` int(1) DEFAULT '1',
  `create_at` varchar(50) DEFAULT NULL,
  `update_at` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'static',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `m_page` */

insert  into `m_page`(`id`,`sys_user_id`,`title_en`,`title_km`,`short_desc_en`,`short_desc_km`,`status`,`create_at`,`update_at`,`type`) values (18,2,'sfdfssssssssssss','dsfd','cvx','cxvcv',1,'2015-01-19','2015-01-19','static'),(20,NULL,'New Arrival Products','New Arrival Products',NULL,NULL,1,NULL,NULL,'widget'),(21,NULL,'Hot Promotion Products',NULL,NULL,NULL,1,NULL,NULL,'widget'),(22,NULL,'Secondhand Products',NULL,NULL,NULL,1,NULL,NULL,'widget'),(23,NULL,'Monthly Pay  Products',NULL,NULL,NULL,1,NULL,NULL,'widget'),(24,NULL,'Urgent Sale',NULL,NULL,NULL,1,NULL,NULL,'widget'),(25,NULL,'test',NULL,NULL,NULL,1,NULL,NULL,'widget');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
