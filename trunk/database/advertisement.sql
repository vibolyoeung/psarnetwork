-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2014 at 03:47 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psarnetwork_db`
--
CREATE DATABASE IF NOT EXISTS `psarnetwork_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `psarnetwork_db`;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(200) DEFAULT NULL,
  `link_url` varchar(200) DEFAULT NULL,
  `started_date` varchar(100) DEFAULT NULL,
  `expire_date` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `advertiser_id` int(11) NOT NULL,
  `adv_page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adv_page`
--

CREATE TABLE IF NOT EXISTS `adv_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `adv_page`
--

INSERT INTO `adv_page` (`id`, `name`) VALUES
(1, 'Home page'),
(2, 'Category Page'),
(3, 'Page Detail'),
(4, 'Market Place'),
(5, 'Market Place Detail'),
(6, 'Interprise-page'),
(7, 'Free-user page'),
(8, 'Register'),
(9, 'Login');

-- --------------------------------------------------------

--
-- Table structure for table `adv_page_position_mm`
--

CREATE TABLE IF NOT EXISTS `adv_page_position_mm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adv_page_id` int(11) NOT NULL,
  `adv_position_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `adv_page_position_mm`
--

INSERT INTO `adv_page_position_mm` (`id`, `adv_page_id`, `adv_position_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 2, 5),
(15, 2, 6),
(16, 2, 7),
(17, 2, 8),
(18, 2, 9),
(19, 2, 10),
(20, 3, 2),
(21, 3, 3),
(22, 3, 4),
(23, 3, 5),
(24, 4, 2),
(25, 4, 3),
(26, 4, 5),
(27, 4, 8),
(28, 4, 9),
(29, 4, 10),
(30, 5, 11),
(31, 5, 4),
(32, 5, 5),
(33, 5, 6),
(34, 5, 7),
(35, 6, 4),
(36, 7, 4),
(37, 8, 4),
(38, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `adv_position`
--

CREATE TABLE IF NOT EXISTS `adv_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `adv_position`
--

INSERT INTO `adv_position` (`id`, `name`) VALUES
(1, 'Slide Show'),
(2, 'Top'),
(3, 'Buttom'),
(4, 'V-Left-Meduim'),
(5, 'V-Right-Meduim'),
(6, 'V-Left-Samll'),
(7, 'V-Right-Samll'),
(8, 'H-Midlle-top-Large'),
(9, 'H-Middle-centre-Large'),
(10, 'H-Middle-Buttom-Large'),
(11, 'Market-Slide-Show'),
(12, 'H-Top-Meduim');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
