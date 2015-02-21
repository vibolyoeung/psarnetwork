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
  `permission_name_alias` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

/*Data for the table `permission` */

insert  into `permission`(`id`,`permission_name`,`permission_name_alias`) values (1,'admin/users','User'),(2,'admin/create','Create User'),(3,'admin/edit','Edit User'),(4,'admin/delete','Delete User'),(5,'admin/status','Enable User'),(6,'admin/profile','Edit Profile'),(7,'admin/change-password','Change Password'),(8,'admin/dashboard','Dashboard'),(9,'admin/user-group','User Group'),(10,'admin/user-group-add','Create User Group'),(12,'admin/user-group-edit','Edit User Group'),(13,'admin/user-group-delete','Delete User Group'),(14,'admin/pages','Page'),(15,'admin/create-page','Create Page'),(16,'admin/edit-page','Edit Page'),(17,'admin/status-page','Enable Page'),(18,'admin/slideshows','Slideshow'),(19,'admin/create-slideshow','Create Slideshow'),(20,'admin/edit-slideshow','Edit Slideshow'),(21,'admin/delete-slideshow','Delete Slideshow'),(22,'admin/status-slideshow','Enable Slideshow'),(23,'admin/advertisements','Advertisement'),(24,'admin/create-advertisement','Create Advertisement'),(25,'admin/list-ads-positions','List Ads Positions'),(26,'admin/edit-advertisement','Edit Advertisement'),(27,'admin/delete-advertisement','Delete Advertisement'),(28,'admin/status-advertisement','Enable Advertisement'),(29,'admin/categories','Category'),(30,'admin/create-category','Create Category'),(31,'admin/delete-page','Delete Page'),(32,'admin/delete-category','Delete Category'),(33,'admin/status-category','Enable Category'),(34,'admin/markets','Market'),(35,'admin/create-market','Create Market'),(36,'admin/edit-market','Edit Market'),(37,'admin/delete-market','Delete Market'),(38,'admin/list-district','List District'),(39,'admin/delete-page','delete Page'),(42,'admin/edit-category','Edit Category'),(43,'admin/back-end-setting','Backend Setting'),(46,'admin/setting-add-permission-name','Setting Add Permission'),(48,'admin/setting-delete-permission-name','Setting Delete Permission'),(49,'admin/setting-add-slideshow','Setting Add Slideshow'),(50,'admin/client-user-type','Client User Type'),(51,'admin/client-user-type-edit','Edit Client User Type'),(52,'admin/front-end-setting','Frontend Setting');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
