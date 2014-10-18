/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.12-log : Database - psarnetwork_db
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

/*Table structure for table `slideshow` */

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

/*Data for the table `slideshow` */

insert  into `slideshow`(`id`,`title`,`image`,`short_desc`,`description`,`link_url`,`status`,`product_id`,`advertiser_id`,`created_date`,`expire_date`) values (6,'title-updated','1413631121.jpg','title-updated','title-updated','http://psarnetwork.local/admin/create_slideshow-title-updated',1,NULL,3,'243214title-updated','23432title-updated'),(7,'testing-updated','1413631558.jpg','test-updated','test-updated','http://psarnetwork.local/admin/create_slideshow-updated',0,NULL,NULL,'233-updated','23432-updated');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
