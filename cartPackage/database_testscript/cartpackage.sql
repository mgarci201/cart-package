-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2015 at 02:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cartpackage`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
`id` int(11) NOT NULL,
  `package` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numbers` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `package`, `numbers`, `cost`) VALUES
(1, 'Private Suite Gold Menu', 'Minimum: 25', '35'),
(2, 'Private Suite Silver Menu', 'Minimum: 25', '37'),
(3, 'Child 3 to 12 Suites', 'Minimum: 0', '8'),
(4, 'Child 0 to 2 Suites', 'Minimum: 0', '1'),
(5, 'VIP Hen and Stag', 'Minimum: 15', '57');

-- --------------------------------------------------------

--
-- Table structure for table `package_type`
--

CREATE TABLE IF NOT EXISTS `package_type` (
`id` int(11) NOT NULL,
  `package_type_id` int(11) DEFAULT NULL,
  `package_name_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package_type`
--

INSERT INTO `package_type` (`id`, `package_type_id`, `package_name_type`) VALUES
(1, 1, 'Fine Dining'),
(2, 2, 'Nightout Trackside');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_type`
--
ALTER TABLE `package_type`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_379332E14A17E91F` (`package_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `package_type`
--
ALTER TABLE `package_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `package_type`
--
ALTER TABLE `package_type`
ADD CONSTRAINT `FK_379332E14A17E91F` FOREIGN KEY (`package_type_id`) REFERENCES `package` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
