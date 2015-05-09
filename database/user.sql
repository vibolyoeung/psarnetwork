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

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password_temp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `create_at` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `update_at` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` int(11) NOT NULL,
  `account_type` int(11) DEFAULT NULL,
  `client_type` int(11) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `account_role` int(11) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`password`,`password_temp`,`status`,`create_at`,`update_at`,`remember_token`,`user_type`,`account_type`,`client_type`,`telephone`,`address`,`account_role`,`user_name`) values (2,'KOCH Doeun','doeunkoch@gmail.com','$2y$10$9zwNoGkcOPhycNEP/P2xPuWkXJZmuXlT9rEV2Y.0TxQTsO9NbtlXq',NULL,1,'2014-12-04',NULL,'ABtnxgwyDL4PlMcYsVYYeRSfrLOH9k1xXlxITtjnCxBxy3scPBquh8R78ZYI',1,NULL,NULL,'0972793573','Phnom Penh',NULL,''),(3,'HOM Kimhim','kimhim.hom-updated@gmail.com','$2y$10$RY3WZxvzq9K4X/4ZGdQP.uj.usxhCXU2vmhYcC6SXuX/irnlmiJum',NULL,1,NULL,'2014-11-26','',1,NULL,NULL,NULL,NULL,NULL,''),(14,'KOCHDOEUN','doeunkoch1@gmail.com','693cfed9dd8adf7c63afbf53cf3a8043',NULL,1,'2015-02-21',NULL,NULL,4,NULL,2,'09727935730','{\"province\":\"15\",\"disctict\":\"9\",\"g_latitude_longit',2,''),(15,'Noelani Nieves','quto@gmail.com','3bf7f9ce3190e8b37595e7c8133cc090',NULL,0,'2015-02-26',NULL,NULL,4,2,2,'+534-59-5479060','{\"province\":\"22\",\"disctict\":\"114\"}',3,''),(16,'Karen Stevens','rawecy@yahoo.com','693cfed9dd8adf7c63afbf53cf3a8043',NULL,1,'2015-03-20',NULL,NULL,4,1,3,'+783-84-9309860','{\"province\":\"24\",\"disctict\":\"\"}',4,''),(17,'somoeun','soungsomoeun@gmail.com','1d3b81a857956c90ebcb11346a473162',NULL,1,'2015-03-21',NULL,NULL,4,1,1,'015308248','{\"province\":\"1\",\"disctict\":\"173\",\"g_latitude_longi',4,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
