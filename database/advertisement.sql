
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
  `pro_cat_id` int(11) DEFAULT '0',
  `size` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `apearance` int(11) NOT NULL,
  `to_page` varchar(255) DEFAULT NULL,
  `adv_position_id` int(11) NOT NULL,
  `adv_cat_page_id` int(11) NOT NULL,
  `adv_page_id` int(11) DEFAULT NULL,
  `license_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;



INSERT INTO `advertisement` (`id`, `title_en`, `title_km`, `description_en`, `description_km`, `image`, `link_url`, `started_date`, `end_date`, `user_id`, `incharger`, `pro_cat_id`, `size`, `type`, `status`, `apearance`, `to_page`, `adv_position_id`, `adv_cat_page_id`, `adv_page_id`, `license_id`, `payment_method`) VALUES
(19, 'english title', 'khmer title', 'Phasellus ullamcorper ipsum rutrum nunc. Praesent egestas tristique nibh. Nullam vel sem. Sed augue ipsum, egestas nec, vestibulum et, malesuada adipiscing, dui. Fusce convallis metus id felis luctus adipiscing.', 'Aenean massa. Vestibulum rutrum, mi nec elementum vehicula, eros quam gravida nisl, id fringilla neque ante vel mi. Nullam quis ante. Maecenas egestas arcu quis ligula mattis placerat. Etiam iaculis nunc ac metus.', '1437752751.png', 'http://vibol.host22.com/', '21/07/2015', '31/08/2015', 22, 2, 0, 30, 1, 1, 0, '', 1, 1, 1, 0, 1),
(21, 'New phone arrival', 'New phone arrival', '', '', '1437753281.jpg', 'http://google.com/', '02/07/2015', '25/08/2015', 0, 0, 0, 0, 1, 1, 0, '', 1, 1, 1, 1, 1),
(24, 'New phone arrival', 'ថ្មី', 'Description of English lang', 'Description of khmer lang', '1437810363.jpg', 'http://maps.google.com/', '01/07/2015', '31/08/2015', 0, 0, 0, 0, 1, 1, 0, '', 1, 1, 1, 1, 1),
(25, 'Special Ad', 'ផ្សាយពានិជ្ជកម្មពិសេស', 'Detail', 'ពត៏មានលំអិត', '1437810896.jpg', 'http://maps.google.com/', '01/07/2015', '31/07/2015', 17, 0, 0, 0, 1, 1, 0, '', 8, 1, 1, 1, 1),
(29, 'Dolore tenetur enim excepteur consequatur magni', 'Khmer title', 'Ad accusamus cupidatat est est cumque corrupti, elit, quis officiis occaecat maxime possimus, enim quae velit.', 'Eum corrupti, ipsa, beatae ut aut similique eius Nam dignissimos est.', '1439992093.jpg', 'http://vibol.host22.com/', '11/08/2015', '31/08/2015', 18, 2, 19, 43, 2, 1, 0, '', 4, 2, 1, 4, 3),
(30, 'english title', 'ចំណង​ជើង', 'describe in English', 'រៀប​រាប់​ជា​ខ្មែរ', '1440083883.png', 'http://vibol.host22.com/', '17/08/2015', '31/08/2015', 14, 2, 31, 24, 2, 1, 1, '', 3, 2, 1, 0, 3);

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
(1, 'Homepage'),
(2, 'Category Page'),
(3, 'Page Detail'),
(6, 'Interprise Page'),
(7, 'Free User page'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adv_page_position_mm`
--

INSERT INTO `adv_page_position_mm` (`id`, `adv_page_id`, `adv_position_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(5, 1, 5),
(6, 1, 6),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 14),
(12, 1, 16),
(13, 1, 17),
(41, 1, 15),
(42, 1, 11),
(43, 1, 14),
(15, 2, 6),
(16, 2, 7),
(44, 2, 14),
(45, 2, 3),
(20, 3, 6),
(21, 3, 7),
(23, 3, 13),
(46, 3, 14),
(47, 3, 3),
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
(35, 6, 6),
(36, 6, 7),
(37, 7, 6),
(38, 7, 7),
(39, 8, 4),
(40, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `adv_position`
--

CREATE TABLE IF NOT EXISTS `adv_position` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `adv_page_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adv_position`
--

INSERT INTO `adv_position` (`id`, `name`, `adv_page_id`) VALUES
(1, 'Slide Show', NULL),
(2, 'Special Box', NULL),
(3, 'Most Buttom', NULL),
(4, 'Conceptial Blog', NULL),
(5, 'Upon Product Ads', NULL),
(6, 'Left Side Panel', NULL),
(7, 'Right Side Panel', NULL),
(8, 'Upon Enterprise Product', NULL),
(9, 'Middle View', NULL),
(10, 'Upon Buyer Request Blog', NULL),
(11, 'Upon New Blog', NULL),
(12, 'Upon Enterprise Store', NULL),
(13, 'Upon Related Product', NULL),
(14, 'Most Top', NULL),
(15, 'Upon Monthly Pay Blog', NULL),
(16, 'Upon Hot Promotion Blog', NULL),
(17, 'Upon Second Hand Blog', NULL);

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
(9, 9, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
