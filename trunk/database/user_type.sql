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

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `permission` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `user_type` */

insert  into `user_type`(`id`,`name`,`permission`) values (1,'Observer','a:2:{s:6:\"access\";a:47:{i:0;s:27:\"admin/client-user-type-edit\";i:1;s:22:\"admin/client-user-type\";i:2;s:27:\"admin/setting-add-slideshow\";i:3;s:36:\"admin/setting-delete-permission-name\";i:4;s:33:\"admin/setting-add-permission-name\";i:5;s:18:\"admin/setting-list\";i:6;s:19:\"admin/edit-category\";i:7;s:21:\"admin/delete-category\";i:8;s:21:\"admin/status-category\";i:9;s:17:\"admin/delete-page\";i:10;s:19:\"admin/list-district\";i:11;s:19:\"admin/delete-market\";i:12;s:17:\"admin/edit-market\";i:13;s:19:\"admin/create-market\";i:14;s:13:\"admin/markets\";i:15;s:21:\"admin/status-category\";i:16;s:21:\"admin/delete-category\";i:17;s:17:\"admin/delete-page\";i:18;s:21:\"admin/create-category\";i:19;s:16:\"admin/categories\";i:20;s:26:\"admin/status-advertisement\";i:21;s:26:\"admin/delete-advertisement\";i:22;s:24:\"admin/edit-advertisement\";i:23;s:24:\"admin/list-ads-positions\";i:24;s:26:\"admin/create-advertisement\";i:25;s:20:\"admin/advertisements\";i:26;s:22:\"admin/status-slideshow\";i:27;s:22:\"admin/delete-slideshow\";i:28;s:20:\"admin/edit-slideshow\";i:29;s:22:\"admin/create-slideshow\";i:30;s:16:\"admin/slideshows\";i:31;s:17:\"admin/status-page\";i:32;s:15:\"admin/edit-page\";i:33;s:17:\"admin/create-page\";i:34;s:11:\"admin/pages\";i:35;s:23:\"admin/user-group-delete\";i:36;s:21:\"admin/user-group-edit\";i:37;s:20:\"admin/user-group-add\";i:38;s:16:\"admin/user-group\";i:39;s:15:\"admin/dashboard\";i:40;s:21:\"admin/change-password\";i:41;s:13:\"admin/profile\";i:42;s:12:\"admin/status\";i:43;s:12:\"admin/delete\";i:44;s:10:\"admin/edit\";i:45;s:12:\"admin/create\";i:46;s:11:\"admin/users\";}s:6:\"modify\";a:45:{i:0;s:27:\"admin/client-user-type-edit\";i:1;s:22:\"admin/client-user-type\";i:2;s:27:\"admin/setting-add-slideshow\";i:3;s:36:\"admin/setting-delete-permission-name\";i:4;s:33:\"admin/setting-add-permission-name\";i:5;s:18:\"admin/setting-list\";i:6;s:19:\"admin/edit-category\";i:7;s:21:\"admin/delete-category\";i:8;s:21:\"admin/status-category\";i:9;s:17:\"admin/delete-page\";i:10;s:19:\"admin/list-district\";i:11;s:19:\"admin/delete-market\";i:12;s:17:\"admin/edit-market\";i:13;s:19:\"admin/create-market\";i:14;s:13:\"admin/markets\";i:15;s:21:\"admin/status-category\";i:16;s:21:\"admin/delete-category\";i:17;s:17:\"admin/delete-page\";i:18;s:21:\"admin/create-category\";i:19;s:16:\"admin/categories\";i:20;s:26:\"admin/status-advertisement\";i:21;s:26:\"admin/delete-advertisement\";i:22;s:24:\"admin/edit-advertisement\";i:23;s:24:\"admin/list-ads-positions\";i:24;s:26:\"admin/create-advertisement\";i:25;s:20:\"admin/advertisements\";i:26;s:22:\"admin/status-slideshow\";i:27;s:22:\"admin/delete-slideshow\";i:28;s:20:\"admin/edit-slideshow\";i:29;s:22:\"admin/create-slideshow\";i:30;s:16:\"admin/slideshows\";i:31;s:17:\"admin/status-page\";i:32;s:15:\"admin/edit-page\";i:33;s:17:\"admin/create-page\";i:34;s:11:\"admin/pages\";i:35;s:23:\"admin/user-group-delete\";i:36;s:21:\"admin/user-group-edit\";i:37;s:20:\"admin/user-group-add\";i:38;s:16:\"admin/user-group\";i:39;s:15:\"admin/dashboard\";i:40;s:12:\"admin/status\";i:41;s:12:\"admin/delete\";i:42;s:10:\"admin/edit\";i:43;s:12:\"admin/create\";i:44;s:11:\"admin/users\";}}'),(2,'Supervisor',NULL),(3,'Watcher',NULL),(4,'client',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
