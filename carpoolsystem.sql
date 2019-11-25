-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 08:35 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carpoolsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `carpool_community`
--

CREATE TABLE IF NOT EXISTS `carpool_community` (
  `community_id` int(11) NOT NULL,
  `community_name` text NOT NULL,
  `community_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpool_community`
--

INSERT INTO `carpool_community` (`community_id`, `community_name`, `community_price`) VALUES
(1, 'KAREN', 200),
(2, 'KIAMBU', 300),
(3, 'MADARAKA', 50);

-- --------------------------------------------------------

--
-- Table structure for table `carpool_drivers`
--

CREATE TABLE IF NOT EXISTS `carpool_drivers` (
  `driver_id` int(11) NOT NULL,
  `monday` int(11) NOT NULL DEFAULT '0',
  `tuesday` int(11) NOT NULL DEFAULT '0',
  `wednesday` int(11) NOT NULL DEFAULT '0',
  `thursday` int(11) NOT NULL DEFAULT '0',
  `friday` int(11) NOT NULL DEFAULT '0',
  `passenger_count` int(11) NOT NULL DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpool_drivers`
--

INSERT INTO `carpool_drivers` (`driver_id`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `passenger_count`) VALUES
(2, 1, 1, 1, 1, 1, 4),
(3, 1, 1, 1, 0, 0, 4),
(4, 1, 1, 1, 1, 1, 4),
(8, 0, 0, 0, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `carpool_history`
--

CREATE TABLE IF NOT EXISTS `carpool_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpool_history`
--

INSERT INTO `carpool_history` (`id`, `user_id`, `driver_id`, `date`) VALUES
(1, 1, 2, '2019-10-29'),
(23, 1, 2, '2019-10-28'),
(24, 6, 4, '2019-10-28'),
(25, 7, 2, '2019-10-29'),
(26, 7, 2, '2019-10-28'),
(27, 7, 2, '2019-10-24'),
(28, 7, 8, '2019-10-30'),
(29, 9, 2, '2019-10-24'),
(30, 9, 2, '2019-10-29'),
(31, 10, 3, '2019-10-28'),
(32, 1, 2, '2019-11-07'),
(33, 1, 4, '2019-11-08'),
(34, 11, 2, '2019-11-06'),
(35, 1, 2, '2019-11-06'),
(36, 12, 2, '2019-11-12'),
(37, 13, 2, '2019-11-11'),
(38, 13, 2, '2019-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `carpool_usergroups`
--

CREATE TABLE IF NOT EXISTS `carpool_usergroups` (
  `user_group_id` int(11) NOT NULL,
  `group_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpool_usergroups`
--

INSERT INTO `carpool_usergroups` (`user_group_id`, `group_description`) VALUES
(1, 'DRIVER'),
(2, 'USER'),
(3, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `carpool_users`
--

CREATE TABLE IF NOT EXISTS `carpool_users` (
  `user_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `idnumber` varchar(12) NOT NULL,
  `gender` text NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `community` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `active` varchar(10) NOT NULL DEFAULT 'FALSE',
  `new_account` varchar(11) NOT NULL DEFAULT 'TRUE'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carpool_users`
--

INSERT INTO `carpool_users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `phonenumber`, `idnumber`, `gender`, `dateofbirth`, `community`, `address`, `user_group_id`, `active`, `new_account`) VALUES
(1, 'Tony', 'Tumwet', 'triadsyndicate@gmail.com', '$2y$10$sgQINz5FdsouMoz8UlELtuolef7Mpa5BztrUY4Vq4AgKdI9Zmlm/.', '734042442', '34997978', 'Male', '2000-07-24', 'KAREN', 'Karen Lokeyx 23134Xdsa', 2, 'TRUE', 'FALSE'),
(2, 'Tony', 'Tumwet', 'triadsyndicxate@yopmail.com', '$2y$10$Y0MNyiEsgFCXXo0SZrMANeih1KmuXeWpRizpi5NctBvky/HFrDg5C', '799243956', '34997978', 'Male', '1997-10-24', 'KAREN', 'Karen Police 23S', 1, 'TRUE', 'FALSE'),
(3, 'Second', 'Test', 'pascal@gmail.com', '$2y$10$F9vJUzJxwfgUtTcBoAD30uLN66XHbReg0UiK2yLGJBeHgX8ClwUgm', '799243956', '34997978', 'Male', '1997-07-21', 'KAREN', 'Karen 12133w2432e43234243eew2dewqdd3d342d32', 1, 'TRUE', 'FALSE'),
(4, 'Patrick', 'Radmin', 'radmin@gmail.com', '$2y$10$jvLuS.jpF1d6Ngw5Ohtene6f4COrwVxEjQTBZV8u3OTrCVSTIUb4S', '734042442', '2534658', 'Male', '1990-10-18', 'KAREN', 'Rongai Academy', 1, 'TRUE', 'FALSE'),
(5, 'Max', 'Thunderman', 'maxt@gmail.com', '$2y$10$3gyRM8WNqe5nGdHA9lO/keJD9d7PjY40DoEcy.mKpoFPVIGnyt9z.', '799243956', '25463265', 'Male', '1996-10-24', 'KAREN', 'Japan 010', 2, 'TRUE', 'FALSE'),
(6, 'Peach', 'Pickle', 'peachpickle@gmail.com', '$2y$10$GT4SFjb7gZazvGFtxrlrn.JftKGzB/E1dp9IeHk5hX6kTSZkixA76', '729919799', '123456', 'Female', '2000-03-31', 'KIAMBU', 'Tausi Street', 2, 'TRUE', 'FALSE'),
(7, 'Nasra ', 'Ali', 'nasrali9848@gmail.com', '$2y$10$c1V0JdNVn0uLZzf9mZhan.vC4VtOZu4tjdeAJ4Jwh9dMycFBuhQse', '722334455', '123456', 'Female', '1999-10-19', 'KIAMBU', 'Nairobi', 2, 'FALSE', 'FALSE'),
(8, 'Jeffrey', 'Shitsukane', 'shitsukane.js@gmail.com', '$2y$10$H3i.aMP2MsvAmU3Ma1K1S.uHOa3yLUvzdfiAt07zwfIAEDbrBKzv6', '748066187', '37053897', 'Male', '1999-05-23', 'KAREN', 'Nairobi', 1, 'TRUE', 'FALSE'),
(9, 'Charity', 'Cheruto', 'charity.kemei@strathmore.edu', '$2y$10$ENEJr3tQEp7HGHjgghY1uOh/cHRahlJq.PqKGFrxRbm7DxckIjMuy', '728292165', '37328058', 'Female', '2019-10-02', 'KIAMBU', 'Nairobi', 2, 'TRUE', 'FALSE'),
(10, 'tina', 'tina', 'tina@gmail.com', '$2y$10$kMlwRa36jSMETWL84KtpIOxxMap1Xen3yvznjeVu/LSiE0v8QoNyK', '793672996', '37485875', 'Female', '2000-07-04', 'KAREN', 'Nairobi', 2, 'TRUE', 'FALSE'),
(11, 'Fredah', 'Cheetah', 'fredahkioko@yopmail.com', '$2y$10$X1LWyINV1PFRH9ztQigciudIY0w4TcpywOfgzU8BimCQ6j29JPHPu', '734042442', '25463265', 'Female', '1998-11-05', 'KIAMBU', 'Karen Police 23S', 3, 'TRUE', 'FALSE'),
(12, 'Vaseline', 'Arimis', 'vaseline@yopmail.com', '$2y$10$SPrsTZH7maKjbkE0yoOueO5EbQyNuoDgGONyeo/lJw8kxmVmHT9/y', '799243956', '34997978', 'Male', '2008-11-06', 'KAREN', 'Japan 010', 2, 'TRUE', 'FALSE'),
(13, 'Samuel', 'Mariwa', 'samuelmariwa@yopmail.com', '$2y$10$dtud48K3y0wPazi.QOuBj.mntFTMSMehVwQsqLjYOstJbVoHixr62', '734042442', '25463265', 'Male', '1997-11-06', 'KAREN', 'Karen Lokeyx 23134Xdsa', 2, 'TRUE', 'FALSE');

-- --------------------------------------------------------

--
-- Stand-in structure for view `userstbl`
--
CREATE TABLE IF NOT EXISTS `userstbl` (
`user_id` int(11)
,`firstname` text
,`community` text
,`address` varchar(255)
,`monday` int(11)
,`tuesday` int(11)
,`wednesday` int(11)
,`thursday` int(11)
,`friday` int(11)
,`passenger_count` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `userstbl`
--
DROP TABLE IF EXISTS `userstbl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userstbl` AS select `carpool_users`.`user_id` AS `user_id`,`carpool_users`.`firstname` AS `firstname`,`carpool_users`.`community` AS `community`,`carpool_users`.`address` AS `address`,`carpool_drivers`.`monday` AS `monday`,`carpool_drivers`.`tuesday` AS `tuesday`,`carpool_drivers`.`wednesday` AS `wednesday`,`carpool_drivers`.`thursday` AS `thursday`,`carpool_drivers`.`friday` AS `friday`,`carpool_drivers`.`passenger_count` AS `passenger_count` from (`carpool_users` join `carpool_drivers` on((`carpool_users`.`user_id` = `carpool_drivers`.`driver_id`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carpool_community`
--
ALTER TABLE `carpool_community`
  ADD PRIMARY KEY (`community_id`);

--
-- Indexes for table `carpool_drivers`
--
ALTER TABLE `carpool_drivers`
  ADD PRIMARY KEY (`driver_id`), ADD UNIQUE KEY `driver_id_2` (`driver_id`), ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `carpool_history`
--
ALTER TABLE `carpool_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carpool_usergroups`
--
ALTER TABLE `carpool_usergroups`
  ADD PRIMARY KEY (`user_group_id`), ADD UNIQUE KEY `user_group_id` (`user_group_id`);

--
-- Indexes for table `carpool_users`
--
ALTER TABLE `carpool_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carpool_community`
--
ALTER TABLE `carpool_community`
  MODIFY `community_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `carpool_history`
--
ALTER TABLE `carpool_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `carpool_users`
--
ALTER TABLE `carpool_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carpool_drivers`
--
ALTER TABLE `carpool_drivers`
ADD CONSTRAINT `user_id` FOREIGN KEY (`driver_id`) REFERENCES `carpool_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
