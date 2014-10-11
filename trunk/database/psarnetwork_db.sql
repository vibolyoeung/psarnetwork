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

/*Table structure for table `system_user` */

DROP TABLE IF EXISTS `system_user`;

CREATE TABLE `system_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password_temp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `create_at` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `update_at` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_role_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `system_user` */

insert  into `system_user`(`id`,`email`,`password`,`password_temp`,`status`,`create_at`,`update_at`,`remember_token`,`user_role_id`,`name`) values (2,'doeunkoch@gmail.com','$2y$10$eXNK4W8PzpFQBkHh59oyMezTGwtkod.Av49nmdmZCnd3IZc//j/Zi',NULL,NULL,NULL,NULL,'vrdmrWRuxUJxfOg6tyCYlydE9pW6ivLvQM2oOWQbEmfMZWR2xUy58D761itY',1,'KOCH Doeun'),(3,'kimhim.hom@gmail.com','$2y$10$RY3WZxvzq9K4X/4ZGdQP.uj.usxhCXU2vmhYcC6SXuX/irnlmiJum',NULL,NULL,NULL,NULL,'iRRSpAoXclQzUsLLraQAQGYfoP2X3P4SrMRaOl4ojXjhVknPJk7Sib5ogLzk',0,'HOM Kimhim');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
