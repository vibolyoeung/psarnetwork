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

/*Table structure for table `permission` */

DROP TABLE IF EXISTS `permission`;

CREATE TABLE `permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Data for the table `permission` */

insert  into `permission`(`id`,`permission_name`) values (1,'admin/users'),(2,'admin/create'),(3,'admin/edit'),(4,'admin/delete'),(5,'admin/status'),(6,'admin/profile'),(7,'admin/change-password'),(8,'admin/dashboard'),(9,'admin/user-group'),(10,'admin/user-group-add'),(12,'admin/user-group-edit'),(13,'admin/user-group-delete'),(14,'admin/pages'),(15,'admin/create-page'),(16,'admin/edit-page'),(17,'admin/status-page'),(18,'admin/slideshows'),(19,'admin/create-slideshow'),(20,'admin/edit-slideshow'),(21,'admin/delete-slideshow'),(22,'admin/status-slideshow'),(23,'admin/advertisements'),(24,'admin/create-advertisement'),(25,'admin/list-ads-positions'),(26,'admin/edit-advertisement'),(27,'admin/delete-advertisement'),(28,'admin/status-advertisement'),(29,'admin/categories'),(30,'admin/create-category'),(31,'admin/delete-page'),(32,'admin/delete-category'),(33,'admin/status-category'),(34,'admin/markets'),(35,'admin/create-market'),(36,'admin/edit-market'),(37,'admin/delete-market'),(38,'admin/list-district'),(39,'admin/delete-page'),(40,'admin/status-category'),(41,'admin/delete-category'),(42,'admin/edit-category'),(43,'admin/setting-list'),(46,'admin/setting-add-permission-name'),(48,'admin/setting-delete-permission-name'),(49,'admin/setting-add-slideshow'),(50,'admin/client-user-type'),(51,'admin/client-user-type-edit');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
