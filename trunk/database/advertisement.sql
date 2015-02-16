-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2015 at 10:27 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

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
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL,
  `title_en` varchar(200) DEFAULT NULL,
  `title_km` varchar(250) NOT NULL,
  `description_en` text,
  `description_km` text NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `link_url` varchar(200) DEFAULT NULL,
  `started_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `incharger` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `apearance` int(11) NOT NULL,
  `adv_position_id` int(11) NOT NULL,
  `adv_cat_page_id` int(11) NOT NULL,
  `adv_page_id` int(11) DEFAULT NULL,
  `license_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `title_en`, `title_km`, `description_en`, `description_km`, `image`, `link_url`, `started_date`, `end_date`, `user_id`, `incharger`, `size`, `type`, `status`, `apearance`, `adv_position_id`, `adv_cat_page_id`, `adv_page_id`, `license_id`, `payment_method`) VALUES
(2, 'Advertisement title', 'ចំណងជើង2ផ្សព្វ​ផ្សាយ', 'English title', 'ការពីពរណា', '1422546836.jpg', 'https://www.google.com.kh', '29/01/2015', '23/01/2015', 6, 0, 0, 0, 1, 0, 5, 2, 3, 4, 1),
(3, 'Advertisement title', 'វិបុល', 'vibol love you', 'វិបុល​ស្រលាញ់​អ្នក', '1422719470.jpg', 'https://www.google.com.kh', '31/01/2015', '30/01/2015', 6, 0, 200, 0, 1, 1, 2, 2, 1, 2, 2),
(4, 'Molestias', 'ជាភាសាខ្មែរ', 'Hic aliquam voluptatem in rem optio, id, temporibus officiis et tempore, aliquip.', 'ជាភាសារខ្មែរ', '1423060901.jpg', 'https://www.google.com.kh', '11-Oct-1972', '06-Sep-1998', 0, 0, 23, 2, 1, 0, 10, 1, 2, 1, 1),
(5, 'Occaecat neque veritatis dolor praesentium fugiat nulla ut distinctio Anim', 'ភាសារខ្មែរ', 'Eius voluptatem. Eveniet, magni explicabo. Nesciunt, culpa, cupidatat voluptatem veniam, animi, in dolorem quibusdam esse, minima amet, pariatur. Dolorum.', 'Dicta quidem sapiente hic et velit, similique ut magni aspernatur doloribus doloremque.', '1423148012.jpg', 'https://www.facebook.com/video.php?v=801912709855737&set=vb.199289656784715&type=2&theater', '14-Jun-1992', '27-May-2000', 7, 0, 23, 1, 1, 1, 3, 1, 3, 3, 3),
(6, 'Sunt distinctio', 'Eos et est consectetur sed quis atque et', 'Necessitatibus temporibus ullam tempora perspiciatis, quia impedit, ratione velit ducimus, excepturi.', 'Soluta quam voluptas nihil dolor hic aut blanditiis quas ut magnam in non ipsam ipsa, in ullamco aperiam atque.', '1423148259.png', 'https://www.google.com.kh', '06-Oct-1972', '25-Apr-1994', 9, 0, 0, 1, 1, 1, 5, 1, 5, 3, 3),
(7, 'Placeat nostrud omnis ullamco sint natus tempore praesentium nobis voluptate aut quisquam et voluptas ut sint', 'Illo atque dolor quis sint exercitation culpa qui illo', 'Nesciunt, voluptatem excepturi error tenetur elit, in in non voluptatibus dolorum officiis totam nostrud aspernatur.', 'Reprehenderit ullam non animi, veniam, dolorem esse magni omnis vitae id, totam aut assumenda nemo perspiciatis, dolor ex laboris.', '1423668591.png', 'https://www.facebook.com/video.php?v=801912709855737&set=vb.199289656784715&type=2&theater', '16-Jul-2011', '27-Apr-2000', 10, 0, 0, 1, 1, 1, 8, 2, 4, 2, 2),
(8, 'Deleniti ducimus sit corrupti lorem quisquam sapiente sapiente tempora exercitation vel neque', 'Distinctio Ducimus non placeat in sit quis odit id aut reprehenderit quos voluptatem Molestiae', 'Qui quisquam eum proident, ipsam nisi aut et dolore porro qui porro iure quasi do suscipit.', 'Ea error nihil do sed aut libero omnis est est deserunt.', '1423668811.PNG', 'https://www.facebook.com/video.php?v=801912709855737&set=vb.199289656784715&type=2&theater', '19-May-2003', '07-Jun-1987', 11, 3, 32, 1, NULL, 0, 3, 1, 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_profile`
--

CREATE TABLE IF NOT EXISTS `advertiser_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertiser_profile`
--

INSERT INTO `advertiser_profile` (`id`, `name`, `phone`, `email`, `address`) VALUES
(1, 'Englishss', '097 27 93 573', 'updoc.year4@gmail.com', 'PP'),
(2, 'Englishss', '097 27 93 573', 'updoc.year4@gmail.com', 'PP'),
(3, 'KOCH DOEN', '097 27 93 573', 'doeunkoch@gmail.com', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `adv_page`
--

CREATE TABLE IF NOT EXISTS `adv_page` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `adv_page_id` int(11) NOT NULL,
  `adv_position_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `adv_page_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adv_position`
--

INSERT INTO `adv_position` (`id`, `name`, `adv_page_id`) VALUES
(1, 'Slide Show', NULL),
(2, 'Top', NULL),
(3, 'Buttom', NULL),
(4, 'V-Left-Meduim', NULL),
(5, 'V-Right-Meduim', NULL),
(6, 'V-Left-Samll', NULL),
(7, 'V-Right-Samll', NULL),
(8, 'H-Midlle-top-Large', NULL),
(9, 'H-Middle-centre-Large', NULL),
(10, 'H-Middle-Buttom-Large', NULL),
(11, 'Market-Slide-Show', NULL),
(12, 'H-Top-Meduim', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_adv_position`
--

CREATE TABLE IF NOT EXISTS `category_adv_position` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_adv_position`
--

INSERT INTO `category_adv_position` (`id`, `name`) VALUES
(1, 'Banner Advertisment'),
(2, 'Product Advertisment');

-- --------------------------------------------------------

--
-- Table structure for table `cat_page_position_mm`
--

CREATE TABLE IF NOT EXISTS `cat_page_position_mm` (
  `id` int(11) NOT NULL,
  `adv_page_id` int(11) NOT NULL,
  `cat_adv_position_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat_page_position_mm`
--

INSERT INTO `cat_page_position_mm` (`id`, `adv_page_id`, `cat_adv_position_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 1),
(4, 3, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 1, 2),
(11, 3, 2),
(12, 4, 2),
(13, 5, 2),
(14, 6, 2),
(15, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE IF NOT EXISTS `license` (
  `id` int(11) NOT NULL,
  `name_en` varchar(250) NOT NULL,
  `name_km` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `name_en`, `name_km`) VALUES
(1, 'commercial', 'ពាណិជ្ជកម្ម'),
(2, 'free', 'មិនគឹតថ្លៃ'),
(3, 'testing', 'សាកល្បង'),
(4, 'expired', 'ផុតកំណត់');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`) VALUES
(1, 'Yearly'),
(2, 'Montly'),
(3, 'Contract');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertiser_profile`
--
ALTER TABLE `advertiser_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adv_page`
--
ALTER TABLE `adv_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adv_page_position_mm`
--
ALTER TABLE `adv_page_position_mm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adv_position`
--
ALTER TABLE `adv_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_adv_position`
--
ALTER TABLE `category_adv_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_page_position_mm`
--
ALTER TABLE `cat_page_position_mm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `advertiser_profile`
--
ALTER TABLE `advertiser_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `adv_page`
--
ALTER TABLE `adv_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `adv_page_position_mm`
--
ALTER TABLE `adv_page_position_mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `adv_position`
--
ALTER TABLE `adv_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `category_adv_position`
--
ALTER TABLE `category_adv_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cat_page_position_mm`
--
ALTER TABLE `cat_page_position_mm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
