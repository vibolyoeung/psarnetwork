-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2015 at 05:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psarnetwork_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name_en` varchar(255) DEFAULT NULL,
  `province_ordering` int(11) DEFAULT NULL,
  `province_lat_long` varchar(100) DEFAULT NULL,
  `province_name_km` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name_en`, `province_ordering`, `province_lat_long`, `province_name_km`) VALUES
(1, 'Phnom Penh', 1, '11.578925,104.920006', 'ភ្នំពេញ'),
(2, 'Rattanak Kiri', 2, '13.915406,107.099762', 'រតនះគីរី'),
(3, 'Mondul Kiri', 3, '12.846616,107.110748', 'មណ្ឌលគីរី'),
(4, 'Siem Reap', 4, '13.369788,103.864224', 'សៀមរាប'),
(5, 'Preah Sihanouk', 5, '10.752366,103.776627', 'ព្រះសីហនុ'),
(6, 'Stung Treng', 6, '13.648656,105.973663', 'ស្ទឹងត្រែង'),
(7, 'Kratie', 7, '12.910875,105.96817', 'ក្រចេះ'),
(8, 'Preah Vihear', 8, '14.072645,104.850311', 'ព្រះវិហារ'),
(9, 'Kampot', 9, '10.763159,104.380875', 'កំពត'),
(10, 'Kep', 10, '10.545196,104.355984', 'កែប'),
(11, 'Koh Kong', 11, '11.722167,103.358459', 'កុះកុង'),
(12, 'Kampong Thom', 12, '12.969766,105.210113', 'កំពង់ធំ'),
(13, 'Kandal', 13, '11.432917,105.122452', 'កណ្តាល'),
(14, 'Takeo', 14, '10.960068,104.809341', 'តាកែវ'),
(15, 'Battambang', 15, '13.098205,102.979889', 'បាត់ដំបង'),
(16, 'Kampong Cham', 16, '12.136005,105.679779', 'កំពង់ចាម'),
(17, 'Kampong Chhnang', 17, '12.178965,104.559402', 'កំពង់ឆ្នាំង'),
(18, 'Kampong Speu', 18, '11.648201,104.391861', 'កំពង់ស្ពឺ'),
(19, 'Pursat', 19, '12.436577,103.641815', 'ពោន៍សាត់'),
(20, 'Oddar Meanchey', 20, '14.232438,103.633575', 'ឧត្តមានជ័យ'),
(21, 'Pailin', 21, '12.922922,102.673302', 'ប៉ៃលិន'),
(22, 'Prey Veng', 22, '11.414072,105.502853', 'ព្រៃវែង'),
(23, 'Svay Rieng', 23, '11.182444,105.825577', 'ស្វាយរៀង'),
(24, 'Banteay Meanchey', 24, '13.816744,102.90802', 'បន្ទាយមានជ័យ'),
(25, 'Tbong Khmum', 25, '11.961187, 105.634747', 'ត្បូងឃ្មុុំ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
