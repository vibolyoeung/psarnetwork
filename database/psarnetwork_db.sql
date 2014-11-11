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

/*Table structure for table `account_type` */

DROP TABLE IF EXISTS `account_type`;

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `account_type` */

insert  into `account_type`(`id`,`name`) values (1,'Free'),(2,'Enterprise');

/*Table structure for table `adv_page` */

DROP TABLE IF EXISTS `adv_page`;

CREATE TABLE `adv_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `adv_page` */

insert  into `adv_page`(`id`,`name`) values (1,'Home page'),(2,'Category Page'),(3,'Page Detail'),(4,'Market Place'),(5,'Market Place Detail'),(6,'Interprise-page'),(7,'Free-user page'),(8,'Register'),(9,'Login');

/*Table structure for table `adv_page_position_mm` */

DROP TABLE IF EXISTS `adv_page_position_mm`;

CREATE TABLE `adv_page_position_mm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_page_id` int(11) NOT NULL,
  `adv_position_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

/*Data for the table `adv_page_position_mm` */

insert  into `adv_page_position_mm`(`id`,`adv_page_id`,`adv_position_id`) values (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7),(8,1,8),(9,1,9),(10,1,10),(11,2,2),(12,2,3),(13,2,4),(14,2,5),(15,2,6),(16,2,7),(17,2,8),(18,2,9),(19,2,10),(20,3,2),(21,3,3),(22,3,4),(23,3,5),(24,4,2),(25,4,3),(26,4,5),(27,4,8),(28,4,9),(29,4,10),(30,5,11),(31,5,4),(32,5,5),(33,5,6),(34,5,7),(35,6,4),(36,7,4),(37,8,4),(38,9,4);

/*Table structure for table `adv_position` */

DROP TABLE IF EXISTS `adv_position`;

CREATE TABLE `adv_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `adv_page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `adv_position` */

insert  into `adv_position`(`id`,`name`,`adv_page_id`) values (1,'Slide Show',NULL),(2,'Top',NULL),(3,'Buttom',NULL),(4,'V-Left-Meduim',NULL),(5,'V-Right-Meduim',NULL),(6,'V-Left-Samll',NULL),(7,'V-Right-Samll',NULL),(8,'H-Midlle-top-Large',NULL),(9,'H-Middle-centre-Large',NULL),(10,'H-Middle-Buttom-Large',NULL),(11,'Market-Slide-Show',NULL),(12,'H-Top-Meduim',NULL);

/*Table structure for table `advertisement` */

DROP TABLE IF EXISTS `advertisement`;

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL,
  `link_url` varchar(200) DEFAULT NULL,
  `started_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `adv_page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `advertisement` */

/*Table structure for table `advertiser_profile` */

DROP TABLE IF EXISTS `advertiser_profile`;

CREATE TABLE `advertiser_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `advertiser_profile` */

insert  into `advertiser_profile`(`id`,`name`,`phone`,`email`,`address`) values (1,'Englishss','097 27 93 573','updoc.year4@gmail.com','PP'),(2,'Englishss','097 27 93 573','updoc.year4@gmail.com','PP'),(3,'KOCH DOEN','097 27 93 573','doeunkoch@gmail.com','PHP');

/*Table structure for table `client_type` */

DROP TABLE IF EXISTS `client_type`;

CREATE TABLE `client_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `account_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `client_type` */

insert  into `client_type`(`id`,`name`,`account_type_id`) values (1,'Individual',1),(2,'Homeshop',2),(3,'Private company',2),(4,'Traditional Market',2),(5,'Supermarket',2);

/*Table structure for table `district` */

DROP TABLE IF EXISTS `district`;

CREATE TABLE `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dis_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dis_name_kh` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dis_ordering` int(11) DEFAULT NULL,
  `dis_lat_long` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dis_zipcode` int(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dis_name` (`dis_name`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `district` */

insert  into `district`(`id`,`dis_name`,`dis_name_kh`,`dis_ordering`,`dis_lat_long`,`dis_zipcode`) values (1,'Malai',NULL,NULL,'13.416667, 102.6',NULL),(2,'Svay Chek',NULL,NULL,'13.666667, 103',108),(3,'Thma Puok',NULL,NULL,'13.75, 103',107),(4,'Serei Saophoan',NULL,NULL,'13.583333, 102.983333',106),(5,'Ou Chrov','ស្រុកអូរជ្រៅ',NULL,'13.65, 102.566667',105),(6,'Preah Netr Preah','ព្រះនេត្រព្រះ',NULL,'13.616667, 103.25',104),(7,'Phnom Srok','ភ្នំស្រុក',NULL,'13.783333, 103.166667',103),(8,'Mongkol Borey','មង្គលបូរី',NULL,'13.541667, 103.025',102),(9,'RukhaKiri','រុក្ខាគិរី',NULL,'',0),(10,'Koas Krala','កោះក្រឡ',NULL,'12.761224, 103.261657',213),(11,'Kamrieng','កំរៀង',NULL,'13.277473, 102.553039',212),(12,'Phnum Proek','ភ្នំព្រឹក',NULL,'13.348641, 102.566600',211),(13,'Sampov Loun','សំពៅលូន',NULL,'13.386066, 102.460598',210),(14,'Samlout','សំឡូត',NULL,'12.794274, 102.858592',209),(15,'Sangkae','សង្កែ',NULL,'13.213065, 103.403554',208),(16,'Rotanak Mondol','រតនមណ្ឌល',NULL,'13.055562, 102.853211',207),(17,'Moung Ruessei','មោងឫស្សី',NULL,'12.890136, 103.453944',206),(18,'Ek Phnom','ឯកភ្នំ',NULL,'13.115823, 103.160260',205),(19,'Bavel','បវេល',NULL,'13.263695, 102.880623',204),(20,'Battambang','បាត់ដំបង',NULL,'13.1, 103.2',1907),(21,'Thma Koul','ថ្មគោល',NULL,'13.326476, 103.039527',202),(22,'Banan','បាណន់',NULL,'12.950017, 103.144412',201),(23,'Stueng Trang','ស្ទឹងត្រង់',NULL,'12.257222, 105.536111',315),(24,'Srey Santhor','ស្រីសន្ធរ',NULL,'11.841944, 105.125833',314),(25,'Prey Chhor','ព្រៃឈរ',NULL,'12.050278, 105.256944',313),(26,'Koh Sotin','កោះសុទិន',NULL,'11.887778, 105.413333',308),(27,'Kang Meas','គងមាស',NULL,'11.943056, 105.270556',307),(28,'Kampong Siem','កំពង់សៀម',NULL,'12.014444, 105.4175',306),(29,'Kampong Cham','កំពង់ចាម',NULL,'11.911111, 105.854167',305),(30,'Cheung Prey','ជើងព្រៃ',NULL,'12.051111, 105.070833',303),(31,'Chamkar Leu','ចំការលើ',NULL,'12.314167, 105.2775',302),(32,'Batheay','បាធាយ',NULL,'11.996111, 104.944444',301),(33,'Tuek Phos','ទឹកផុស',NULL,'12.016667, 104.533333',408),(34,'Sameakki Mean Chey','សាមគ្គីមានជ័យ',NULL,'11.666667, 104.666667',407),(35,'Rolea B\'ier','រលាប្អៀរ',NULL,'12.2, 104.65',406),(36,'Kampong Tralach','កំពង់ត្រឡាច',NULL,'11.933333, 104.716667',405),(37,'Kampong Leaeng','កំពងលែង',NULL,'12.266667, 104.716667',404),(38,'Kampong Chhnang','កំពង់ឆ្នាំង',NULL,'12.25, 104.666667',403),(39,'Chol Kiri','ជលគីរី',NULL,'12.166667, 104.866667',402),(40,'Baribour','បរិបូណ៌',NULL,'12.433333, 104.45',401),(41,'Thpong','ថ្ពង',NULL,'11.733333, 104.433333',508),(42,'Samraong Tong','សំរោងទង',NULL,'11.466667, 104.533333',507),(43,'Phnom Sruoch','ភ្នំស្រួច',NULL,'11.4, 104.4',506),(44,'Oudong','ឧដុង្គ',NULL,'11.8, 104.75',505),(45,'Aoral','ឱរ៉ាល់',NULL,'11.683333, 104.116667',504),(46,'Kong Pisei','គងពិសី',NULL,'11.366667, 104.65',503),(47,'Chbar Mon','ច្បារមន',NULL,'11.45, 104.5',502),(48,'Basedth','បរសេដ្ឋ',NULL,'11.2, 104.583333',501),(49,'Stoung','ស្ទោង',NULL,'12.833333, 104.583333',608),(50,'Santuk','សន្ទុក',NULL,'12.666667, 105.5',607),(51,'Sandaan','សណ្ដាន់',NULL,'13.327739, 105.312152',606),(52,'Prasat Sambour','ប្រាសាទសម្បូរ',NULL,'12.943034, 105.169416',605),(53,'Prasat Balangk','ប្រាសាទបល្ល័ង្ក',NULL,'13.237431, 104.779346',604),(54,'Stueng Saen','ស្ទឹងសែន',NULL,'12.806640, 104.883127',603),(55,'Kampong Svay','កំពង់ស្វាយ',NULL,'12.583333, 104.75',602),(56,'Baray','បារាយណ៍',NULL,'12.333333, 105',601),(57,'Kampong Bay','កំពង់បាយ',NULL,'10.6, 104.166667',708),(58,'Kampot','កំពត',NULL,'10.6, 104.166667',707),(59,'Kampong Trach','កំពង់ត្រាច',NULL,'10.55, 104.466667',706),(60,'Dang Tong','ដងទង',NULL,'10.657233, 104.455261',705),(61,'Chum Kiri','ជុំគីរី',NULL,'10.85, 104.4',704),(62,'Chhouk','ឈូក',NULL,'10.816667, 104.45',703),(63,'Banteay Meas','បន្ទាយមាស',NULL,'10.616667, 104.533333',702),(64,'Angkor Chey','អង្គរជ័យ',NULL,'10.766667, 104.65',701),(65,'Ta Khmao','តាខ្មៅ',NULL,'11.483333, 104.95',811),(66,'S\'ang','ស្អាង',NULL,'11.3625, 105.005',810),(67,'Ponhea Leu','ពញ្ញាឮ',NULL,'11.815556, 104.799167',809),(68,'Angk Snuol','អង្គស្នួល',NULL,'11.491667, 104.656111',808),(69,'Mukh Kamphool','មុខកំពូល',NULL,'11.742222, 104.980833',807),(70,'Lvea Aem','ល្វាឯម',NULL,'11.54, 105.058889',806),(71,'Leuk Daek','លើកដែក',NULL,'11.173611, 105.228611',805),(72,'Koh Thum','កោះធំ',NULL,'11.126111, 105.057222',804),(73,'Khsach Kandal','ខ្សាច់កណ្តាល',NULL,'11.748333, 105.011389',803),(74,'Kien Svay','គៀនស្វាយ',NULL,'11.508889, 105.075278',802),(75,'Kandal Stueng','កណ្តាលស្ទឹង',NULL,'11.406667, 104.835556',801),(76,'Kampong Seila','កំពង់សីលា',NULL,'11.842312, 103.895082',908),(77,'Thma Bang','ថ្មបាំង',NULL,'11.816667, 103.416667',907),(78,'Srae Ambel','ស្រែអំបិល',NULL,'11.126570, 103.744248',906),(79,'Mondol Seima','មណ្ឌលសីម៉ា',NULL,'12.035816, 103.096304',906),(80,'Smach Mean Chey','ស្មាច់មានជ័យ',NULL,'11.646081, 103.028674',904),(81,'Koh Kong','កោះកុង',NULL,'11.5, 103.166667',903),(82,'Kiri Sakor','គីរីសាគរ',NULL,'11, 103.166667',902),(83,'Botum Sakor','បូទុមសាគរ',NULL,'11.156983, 103.312799',901),(84,'Snuol','ស្នួល',NULL,'12.166667, 106.583333',1005),(85,'Sambour','សំបូរ',NULL,'13.289403, 106.013818',1004),(86,'Preaek Prasab','ព្រែកប្រសព្វ',NULL,'12.353620, 106.128679',1003),(87,'Kratié','ក្រចេះ',NULL,'13.179590, 105.952191',1002),(88,'Chhloung','ឆ្លូង',NULL,'12.527283, 106.027633',1001),(89,'Senmonorom','សែនមនោរម្យ',NULL,'12.45, 107.2',1105),(90,'Pechr Chenda','ពេជ្រាដា',NULL,'13.012126, 106.989584',1104),(91,'Ou Reang','អូររាំង',NULL,'12.333965, 107.168434',1103),(92,'Kaoh Nheaek','កោះញែក',NULL,'13.389774, 107.045288',1102),(93,'Kaev Seima','កែវសីម៉ា',NULL,'12.3628, 106.8187',1101),(94,'Trapeang Prasat','ត្រពាំងប្រាសាទ',NULL,'14.495276, 104.313544',2205),(95,'Samraong','សំរោង',NULL,'14.25, 103.583333',2204),(96,'Chong Kal','ចុងកាល',NULL,'14.166667, 103.583333',2203),(97,'Banteay Ampil','បន្ទាយអំពិល',NULL,'14.25, 103.25',2202),(98,'Anlong Veng','អន្លុងវែង',NULL,'14.233333, 104.083333',2201),(99,'Tbaeng Meanchey','ត្បែងមានជ័យ',NULL,'13.828628, 104.960021',1307),(100,'Sangkom Thmei','សង្គមថ្មី',NULL,'13.669145, 104.795966',1306),(101,'Rovieng','រវៀង',NULL,'13.5, 104.833333',1305),(102,'Kuleaen','គូលែន',NULL,'13.910588, 104.565468',1304),(103,'Choam Khsant','ជាំក្សាន្ត',NULL,'14.166667, 104.916667',1303),(104,'Chhaeb','ឆែប',NULL,'14.245870, 105.418367',1302),(105,'Chey Saen','ជ័យសែន',NULL,'13.753517, 105.343437',1301),(106,'Veal Veang','វាលវែង',NULL,'12.366667, 103.25',1506),(107,'Pursat','ពោធិ៍សាត់',NULL,'12.621782, 103.907415',3166),(108,'Phnum Kravanh','ភ្នុំក្រវាញ',NULL,'12.333333, 103.75',1504),(109,'Krakor','ក្រគរ',NULL,'12.516667, 104.2',1503),(110,'Kandieng','កណ្ដៀង',NULL,'12.566667, 104.033333',1502),(111,'Bakan','បាកាន',NULL,'12.6, 103.783333',1501),(112,'Sithor Kandal','ស៊ីធរកណ្ដាល',NULL,'11.766667, 105.366667',1412),(113,'Kampong Leav','កំពង់លាវ',NULL,'11.483333, 105.316667',1411),(114,'Prey Veaeng','ព្រៃវែង',NULL,'11.483333, 105.316667',1410),(115,'Preah Sdach','ព្រះស្ដេច',NULL,'11.083333, 105.35',1409),(116,'Pea Reang','ពារាំង',NULL,'11.666667, 105.183333',1408),(117,'Peam Ro','ពាមរក៏',NULL,'11.266667, 105.283333',1407),(118,'Peam Chor','ពាមជរ',NULL,'11.1, 105.233333',1406),(119,'Me Sang','មេសាង',NULL,'11.3, 105.55',1405),(120,'Kanhchriech','កញ្ច្រៀច',NULL,'11.7, 105.533333',1404),(121,'Kampong Trabaek','កំពង់ត្របែក',NULL,'11.165180, 105.483320',1403),(122,'Kamchay Mear','កំចាយមារ',NULL,'11.566667, 105.7',1402),(123,'Ba Phnum','បាភ្នំ',NULL,'11.328724, 105.452583',1401),(124,'Veun Sai','វើនសៃ',NULL,'14.1472, 106.8173',1609),(125,'Ta Veaeng','តាវែង',NULL,'14.033333, 107.116667',1408),(126,'Ou Ya Dav','អូរយ៉ាដាវ',NULL,'13.5205, 107.4326',1407),(127,'Ou Chum','អូរជុំ',NULL,'13.8407, 107.0302',1406),(128,'Lumphat','លំផាត់',NULL,'13.416667, 107',1605),(129,'Koun Mom','កូនមុំ',NULL,'13.745958, 106.794834',1604),(130,'Bar Kaev','បាគាវ',NULL,'13.6927, 107.2197',1603),(131,'Banlung','បានលុង',NULL,'13.74, 107',1602),(132,'Andoung Meas','អណ្តូងមាស',NULL,'13.8807, 107.3474',1601),(133,'Varin','វ៉ារិន',NULL,'13.75, 103.916667',1714),(134,'Svay Leu','ស្វាយលើ',NULL,'13.981929, 104.269695',1713),(135,'Srei Snam','ស្រីស្នំ',NULL,'13.75, 103.916667',1712),(136,'Sout Nikom','សូទ្រនិគម',NULL,'13.451614, 104.138772',1711),(137,'Siem Reap','សៀមរាប',NULL,'13.362222, 103.859722',1907),(138,'Prasat Bakong','ប្រាសាទបាគង',NULL,'13.446319, 103.968687',1709),(139,'Puok','ពួក',NULL,'13.416667, 103.666667',1707),(140,'Kralanh','ក្រលាញ់',NULL,'13.583333, 103.5',1706),(141,'Chi Kraeng','ជីក្រែង',NULL,'13.364957, 104.368315',1704),(142,'Banteay Srei','បន្ទាយស្រី',NULL,'13.433333, 103.85',1703),(143,'Angkor Thom','អង្គរធំ',NULL,'13.433333, 103.85',1702),(144,'Angkor Chum','អង្គរជុំ',NULL,'4.166667, 104.333333',1701),(145,'Thala Barivat','ថាឡាបារីវ៉ាត់',NULL,'13.930695, 105.871128',1905),(146,'Stung Treng','ស្ទឹងត្រែង',NULL,'13.583333, 106.25',1904),(147,'Siem Pang','សៀមប៉ាង',NULL,'14.244819, 106.438734',1903),(148,'Siem Bouk','សៀមបូក',NULL,'13.451452, 105.713778',1902),(149,'Sesan','សេសាន',NULL,'13.657085, 106.384582',1901),(150,'Svay Theab','ស្វាយទៀប',NULL,'11.189441, 105.936696',2007),(151,'Svay Rieng','ស្វាយរៀង',NULL,'11.119594, 105.800781',2006),(152,'Svay Chrom','ស្វាយជ្រុំ',NULL,'11.200843, 105.694313',2005),(153,'Romeas Haek','រមាសហែក',NULL,'11.491624, 105.736674',2004),(154,'Romdoul','រំដួល',NULL,'11.302309, 105.824378',2003),(155,'Kampong Rou','កំពង់រោទ៍',NULL,'10.926497, 105.943093',2002),(156,'Chanthrea','ចន្រ្ទា',NULL,'11.004674, 106.084317',2001),(157,'Treang','ទ្រាំង',NULL,'10.833333, 104.75',2110),(158,'Tram Kak','ត្រាំកក់',NULL,'11, 104.583333',2109),(159,'Doun Kaev','ដូនកែវ',NULL,'11.027876, 104.789268',2108),(161,'Prey Kabbas','ព្រៃកប្បាស',NULL,'11.245541, 104.916644',2106),(162,'Kaoh Andaet','កោះអណ្តែត',NULL,'10.850978, 104.910564',2105),(163,'Kiri Vong','គីរីវង្ស',NULL,'10.736174, 104.799789',2104),(164,'Bourei Cholsar','បូរីជលសារ',NULL,'10.938353, 105.014206',2103),(165,'Bathi','បាទី',NULL,'11.363072, 104.802618',2102),(166,'Angkor Borei','អង្គរបុរី',NULL,'11.028809, 104.915198',2101),(167,'Kep','កែប',NULL,'10.542561, 104.353781',0),(168,'Damnak Chang\'aeur','ដំណាក់ចង្អើរ',NULL,'10.526946, 104.366774',0),(169,'Sala Krau','សាលាក្រៅ',NULL,'13.011453, 102.667351',2402),(170,'Pailin','ប៉ៃលិន',NULL,'12.831924, 102.665477',2401),(171,'Por Sen Chey','ฺពោធិសែនជ័យ',NULL,'11.572953, 104.775741',0),(172,'Sen Sok','សែនសុខ',NULL,'11.585988, 104.892278',0),(173,'Russei Keo','ឫស្សីកែវ',NULL,'11.613477, 104.871135',12300),(174,'Meanchey','មានជ័យ',NULL,'11.532856, 104.949548',12350),(175,'Dangkao','ដង្កោ',NULL,'11.483122, 104.820175',12400),(176,'Toul Kork','ទួលគោក',NULL,'11.573080, 104.897976',12150),(177,'Prampi Makara','៧មករា',NULL,'11.563720, 104.912472',12250),(178,'Daun Penh','ដូនពេញ',NULL,'11.569156, 104.923808',12200),(179,'Chamkarmon','ចំការមន',NULL,'11.549116, 104.920557',12300),(180,'Stueng Hav','ស្ទឹងហាវ',NULL,'10.704459, 103.612661',1803),(181,'Prey Nob','ព្រៃនប់',NULL,'10.625215, 103.780299',1802),(182,'Mittakpheap','មិត្តភាព',NULL,'10.629221, 103.529191',1801),(183,'Suong','សួង',NULL,'11.918072, 105.652986',0),(184,'Tbuong Khmum','ត្បូងឃ្មុំ',NULL,'11.947080, 105.634061',316),(185,'Ponhea Kraek','ពញ្ញាក្រែក',NULL,'11.759490, 105.920005',312),(186,'Ou Reang Ov','អូរាំងឪ',NULL,'11.845744, 105.524712',311),(187,'Memot','មេមត់',NULL,'11.827660, 106.182690',310),(188,'Krouch Chhmar','ក្រូចឆ្មារ',NULL,'12.223141, 105.637751',309),(189,'Dambae','ដំបែ',NULL,'11.935139, 105.922880',304);

/*Table structure for table `image` */

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

/*Data for the table `image` */

/*Table structure for table `layout` */

DROP TABLE IF EXISTS `layout`;

CREATE TABLE `layout` (
  `lay_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lay_title` varchar(100) DEFAULT NULL,
  `lay_keyword` varchar(200) DEFAULT NULL,
  `lay_keyword_desc` text,
  PRIMARY KEY (`lay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `layout` */

/*Table structure for table `m_category` */

DROP TABLE IF EXISTS `m_category`;

CREATE TABLE `m_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(100) DEFAULT NULL,
  `name_zh` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `m_category` */

insert  into `m_category`(`id`,`name_en`,`name_zh`,`parent_id`,`status`) values (13,'testing','testing',11,0),(14,'Vichicle','Vichicle',0,1),(15,'Car','Car',14,1),(16,'luxis','luxis',15,1),(17,'Luxis-330','Luxis-330',16,1),(18,'TV','TV',0,1);

/*Table structure for table `m_page` */

DROP TABLE IF EXISTS `m_page`;

CREATE TABLE `m_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_user_id` int(11) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `title_zh` varchar(50) DEFAULT NULL,
  `short_desc_en` text,
  `short_desc_zh` text,
  `status` int(1) DEFAULT '1',
  `create_at` varchar(50) DEFAULT NULL,
  `update_at` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `m_page` */

insert  into `m_page`(`id`,`sys_user_id`,`title_en`,`title_zh`,`short_desc_en`,`short_desc_zh`,`status`,`create_at`,`update_at`) values (15,2,'About','關於','About','關於',1,'2014-10-20','2014-10-20');

/*Table structure for table `market` */

DROP TABLE IF EXISTS `market`;

CREATE TABLE `market` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(100) DEFAULT NULL,
  `title_zh` varchar(100) DEFAULT NULL,
  `created_date` varchar(100) DEFAULT NULL,
  `modify_date` varchar(100) DEFAULT NULL,
  `desc_en` text,
  `desc_zh` text,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `amount_stair` varchar(100) DEFAULT NULL,
  `market_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `market` */

insert  into `market`(`id`,`title_en`,`title_zh`,`created_date`,`modify_date`,`desc_en`,`desc_zh`,`province_id`,`district_id`,`image`,`amount_stair`,`market_type`) values (8,'esss','ss','2014-11-11','2014-11-11','sfds','sss',2,68,'1415719636.jpg','10',2);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `short_desc` varchar(200) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  `product_service_type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `product` */

/*Table structure for table `product_in_store` */

DROP TABLE IF EXISTS `product_in_store`;

CREATE TABLE `product_in_store` (
  `id` int(11) unsigned zerofill NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `product_in_store` */

/*Table structure for table `product_service_type` */

DROP TABLE IF EXISTS `product_service_type`;

CREATE TABLE `product_service_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `product_service_type` */

insert  into `product_service_type`(`id`,`name`) values (1,'sell'),(2,'Buy'),(3,'Rent'),(4,'Hot Promotion');

/*Table structure for table `province` */

DROP TABLE IF EXISTS `province`;

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(100) DEFAULT NULL,
  `province_ordering` int(11) DEFAULT NULL,
  `province_lat_long` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `province` */

insert  into `province`(`province_id`,`province_name`,`province_ordering`,`province_lat_long`) values (1,'Phnom Penh',1,'11.578925,104.920006'),(2,'Rattanak Kiri',2,'13.915406,107.099762'),(3,'Mondul Kiri',3,'12.846616,107.110748'),(4,'Siem Reap',4,'13.369788,103.864224'),(5,'Preah Sihanouk',5,'10.752366,103.776627'),(6,'Stung Treng',6,'13.648656,105.973663'),(7,'Kratie',7,'12.910875,105.96817'),(8,'Preah Vihear',8,'14.072645,104.850311'),(9,'Kampot',9,'10.763159,104.380875'),(10,'Kep',10,'10.545196,104.355984'),(11,'Koh Kong',11,'11.722167,103.358459'),(12,'Kampong Thom',12,'12.969766,105.210113'),(13,'Kandal',13,'11.432917,105.122452'),(14,'Takeo',14,'10.960068,104.809341'),(15,'Battambang',15,'13.098205,102.979889'),(16,'Kampong Cham',16,'12.136005,105.679779'),(17,'Kampong Chhnang',17,'12.178965,104.559402'),(18,'Kampong Speu',18,'11.648201,104.391861'),(19,'Pursat',19,'12.436577,103.641815'),(20,'Oddar Meanchey',20,'14.232438,103.633575'),(21,'Pailin',21,'12.922922,102.673302'),(22,'Prey Veng',22,'11.414072,105.502853'),(23,'Svay Rieng',23,'11.182444,105.825577'),(24,'Banteay Meanchey',24,'13.816744,102.90802'),(25,'Tbong Khmum',25,'11.961187, 105.634747');

/*Table structure for table `s_category` */

DROP TABLE IF EXISTS `s_category`;

CREATE TABLE `s_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `s_category` */

/*Table structure for table `s_page` */

DROP TABLE IF EXISTS `s_page`;

CREATE TABLE `s_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `m_page_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `s_page` */

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `setting` */

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

insert  into `slideshow`(`id`,`title`,`image`,`short_desc`,`description`,`link_url`,`status`,`product_id`,`advertiser_id`,`created_date`,`expire_date`) values (6,'title-updated','1413631121.jpg','title-updated','title-updated','http://psarnetwork.local/admin/create_slideshow-title-updated',1,NULL,3,'243214title-updated','23432title-updated'),(7,'New Care Arrival','1415712839.png','This is the best time for me This is the best time for me This is the best time for me This is the best time for me This is the best time for me','This is the best time for me This is the best time for me This is the best time for me This is the best time for me This is the best time for me','http://psarnetwork.local/admin/create_slideshow-updated',1,NULL,NULL,'06/11/2014','28/11/2014');

/*Table structure for table `store` */

DROP TABLE IF EXISTS `store`;

CREATE TABLE `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `sup_id` int(11) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `title_zh` varchar(100) DEFAULT NULL,
  `desc_en` text,
  `desc_zh` text,
  `view` int(11) DEFAULT NULL,
  `stair` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `store` */

insert  into `store`(`id`,`user_id`,`sup_id`,`title_en`,`title_zh`,`desc_en`,`desc_zh`,`view`,`stair`,`image`) values (4,NULL,6,'Store1','sdd','SF','SFS',NULL,'23','1414236547.jpg');

/*Table structure for table `template` */

DROP TABLE IF EXISTS `template`;

CREATE TABLE `template` (
  `tem_id` int(11) NOT NULL AUTO_INCREMENT,
  `tem_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `template` */

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`password`,`password_temp`,`status`,`create_at`,`update_at`,`remember_token`,`user_type`,`account_type`,`client_type`) values (2,'KOCH Doeund','doeunkoch@gmail.com','$2y$10$gBGqu4Jo/dHIrusgJILwxOCvwT/dAS/91AaifWz38wtD7SecUOO/q',NULL,1,NULL,NULL,'DPadTF8KJ3TkqTa78BG4LYJK6laPBDxr5LSu8p9NtyI2z2CND6udCIR0xOQj',1,NULL,NULL),(3,'HOM Kimhim-updated','kimhim.hom-updated@gmail.com','$2y$10$RY3WZxvzq9K4X/4ZGdQP.uj.usxhCXU2vmhYcC6SXuX/irnlmiJum',NULL,0,NULL,'2014-10-13','',1,NULL,NULL);

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `user_type` */

insert  into `user_type`(`id`,`name`) values (1,'Observer '),(2,'Supervisor'),(3,'Watcher'),(4,'client');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
