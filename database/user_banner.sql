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

/*Table structure for table `user_banner` */

DROP TABLE IF EXISTS `user_banner`;

CREATE TABLE `user_banner` (
  `ban_id` int(11) NOT NULL AUTO_INCREMENT,
  `ban_title` varchar(250) NOT NULL,
  `ban_cdate` date DEFAULT NULL,
  `ban_enddate` date DEFAULT NULL,
  `ban_status` int(1) NOT NULL DEFAULT '1',
  `ban_image` varchar(100) NOT NULL,
  `ban_store_id` int(11) NOT NULL,
  `ban_position` varchar(100) NOT NULL,
  `ban_link` text,
  PRIMARY KEY (`ban_id`),
  KEY `ban_store_id` (`ban_store_id`),
  CONSTRAINT `ban_store_id` FOREIGN KEY (`ban_store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `user_banner` */

insert  into `user_banner`(`ban_id`,`ban_title`,`ban_cdate`,`ban_enddate`,`ban_status`,`ban_image`,`ban_store_id`,`ban_position`,`ban_link`) values (5,'Banner 1','2015-07-17','2015-07-17',1,'1437152045.jpg',48,'top-c','http://localhost/psarnetwork/public/page/48'),(6,'Right sidebar','2015-07-17','2015-07-31',1,'1437172586.jpg',48,'rs','http://localhost/psarnetwork/public/page/48'),(8,'02','2015-07-23','2017-07-18',1,'1437666377.jpg',48,'top-c','http://localhost/psarnetwork/public/page/47'),(9,'03','2015-07-23','2016-07-19',1,'1437666394.jpg',48,'top-c','http://localhost/psarnetwork/public/page/47');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
