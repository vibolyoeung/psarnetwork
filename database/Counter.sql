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

/*Table structure for table `counter` */

DROP TABLE IF EXISTS `counter`;

CREATE TABLE `counter` (
  `cnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnt_page` varchar(255) DEFAULT NULL,
  `cnt_object_id` int(11) DEFAULT NULL,
  `cnt_type` varchar(50) DEFAULT NULL,
  `cnt_ip` varchar(32) DEFAULT NULL,
  `cnt_browser` varchar(255) DEFAULT NULL,
  `cnt_hour` smallint(2) DEFAULT NULL,
  `cnt_minute` smallint(2) DEFAULT NULL,
  `cnt_date` timestamp(6) NULL DEFAULT NULL,
  `cnt_day` smallint(2) DEFAULT NULL,
  `cnt_month` smallint(2) DEFAULT NULL,
  `cnt_year` smallint(4) DEFAULT NULL,
  `cnt_refferer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cnt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `counter` */

insert  into `counter`(`cnt_id`,`cnt_page`,`cnt_object_id`,`cnt_type`,`cnt_ip`,`cnt_browser`,`cnt_hour`,`cnt_minute`,`cnt_date`,`cnt_day`,`cnt_month`,`cnt_year`,`cnt_refferer`) values (1,'page/store-51',51,'page','::1','Google Chrome',4,46,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/my/detail/21'),(2,'page/store-51',51,'page','::1','Google Chrome',4,46,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(3,'page/store-51',51,'page','::1','Google Chrome',4,46,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(4,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,46,NULL,21,8,2015,'192.168.1.100'),(5,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,46,NULL,21,8,2015,'192.168.1.100'),(6,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,46,NULL,21,8,2015,'192.168.1.100'),(7,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,46,NULL,21,8,2015,'192.168.1.100'),(8,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,47,NULL,21,8,2015,'192.168.1.100'),(9,'page/store-51/p/175',51,'page','::1','Google Chrome',4,47,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/my/detail/21'),(10,'page/store-51/search/Computer%20,%20Software,Network,Hardware',51,'page','::1','Google Chrome',4,47,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/p/175'),(11,'page/store-51/search/Computer-Accessory',51,'page','::1','Google Chrome',4,47,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/search/Computer%20,%20Software,Network,Hardware'),(12,'page/store-51/search/Case&Towers',51,'page','::1','Google Chrome',4,47,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/search/Computer-Accessory'),(13,'page/store-51',51,'page','::1','Google Chrome',4,47,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/search/Case&Towers'),(14,'page/store-51',51,'page','::1','Google Chrome',4,47,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(15,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,47,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(16,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,48,NULL,21,8,2015,'192.168.1.100'),(17,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,48,NULL,21,8,2015,'192.168.1.100'),(18,'page/store-51',51,'page','::1','Google Chrome',4,48,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/my/detail/21'),(19,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,48,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(20,'page/store-51',51,'page','::1','Google Chrome',4,48,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/my/detail/21'),(21,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,48,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(22,'page/store-51',51,'page','::1','Google Chrome',4,48,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/my/detail/21'),(23,'page/store-51',51,'page','::1','Google Chrome',4,49,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(24,'page/store-51',51,'page','::1','Google Chrome',4,54,NULL,21,8,2015,'192.168.1.100'),(25,'page/store-51',51,'page','::1','Google Chrome',4,57,NULL,21,8,2015,'192.168.1.100'),(26,'page/store-51',51,'page','::1','Google Chrome',4,57,NULL,21,8,2015,'192.168.1.100'),(27,'page/store-51',51,'page','::1','Google Chrome',4,58,NULL,21,8,2015,'192.168.1.100'),(28,'page/store-51',51,'page','::1','Google Chrome',4,58,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(29,'page/store-51/my/detail/21',51,'page','::1','Google Chrome',4,58,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51'),(30,'page/store-51',51,'page','::1','Google Chrome',4,58,NULL,21,8,2015,'http://localhost/psarnetwork/public/page/store-51/my/detail/21');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
