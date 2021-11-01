-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2021 at 04:33 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f32ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE IF NOT EXISTS `product_details` (
  `details_ID` int(50) NOT NULL AUTO_INCREMENT,
  `product_ID` int(50) NOT NULL,
  `colour` varchar(40) NOT NULL,
  `colour_code` varchar(7) NOT NULL,
  `stock` int(20) NOT NULL,
  PRIMARY KEY (`details_ID`),
  KEY `product_ID` (`product_ID`),
  KEY `product_ID_2` (`product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`details_ID`, `product_ID`, `colour`, `colour_code`, `stock`) VALUES
(1, 1, 'cream', '#e5dfc8', 2),
(2, 1, 'phantom black', '#2e2a27', 4),
(3, 1, 'green ', '#3f4f51', 3),
(4, 1, 'lavender', '#c2b1d7', 5),
(5, 2, 'phantom black', '#2f2a27', 3),
(6, 2, 'phantom green', '#354c46', 2),
(7, 2, 'phantom silver', '#cbc7c3', 4),
(8, 3, 'mystic bronze', '#997271', 3),
(9, 3, 'mystic white', '#dad9dc', 2),
(10, 3, 'mystic black', '#3d3936', 3),
(11, 4, 'sierra blue', '#afc7dc', 5),
(12, 4, 'silver', '#f2f3ef', 4),
(13, 4, 'gold', '#faead5', 3),
(14, 4, 'graphite', '#63625f', 2),
(15, 5, 'white', '#f9f6ef', 3),
(16, 5, 'black', '#1f2120', 3),
(17, 5, 'red', '#b81233', 3),
(18, 6, 'black', '#000', 2),
(19, 19, 'blue', '#afc8dc', 2),
(20, 19, 'silver', '#d1d3d4', 2),
(21, 20, 'grey', '#c5c5c5', 4),
(22, 21, 'black', '#131418', 6),
(23, 22, 'black', '#131419', 3),
(24, 23, 'silver', '#e7e7e7', 2),
(25, 24, 'silver', '#e7e7e8', 8),
(26, 25, 'black', '#141414', 5),
(27, 26, 'black', '#191920', 4),
(28, 27, 'black', '#141414', 3),
(29, 28, 'white', '#FFFFFF', 1),
(30, 28, 'graphite', '#494d53', 2),
(31, 28, 'lavender', '#bfb1d2', 2),
(32, 29, 'b. purple', '#645394', 1),
(33, 30, 'mystic blue', '#384478', 6),
(34, 31, 'white', '#FFFFFF', 3),
(35, 32, 'white', '#FFFFFF', 5),
(36, 33, 'white', '#FFFFFF', 5),
(37, 34, 'black', '#000000', 2),
(38, 34, 'silver', '#c0c0c0', 3),
(39, 35, 'abyss blue', '#525f77', 2),
(40, 35, 'english lavender', '#a5a0c8', 3),
(41, 6, 'mystic silver ', '#e8f2fd', 2),
(42, 7, 'blush gold', '#fce5cd', 3),
(43, 7, 'deep sea blue ', '#19879d', 5),
(44, 7, 'silver frost', '#e0e4e4', 2),
(45, 8, 'aurora', '#81ced5', 4),
(46, 8, 'stellar black', '#000', 2),
(47, 36, 'midnight', '#3b4338', 3),
(48, 36, 'red', '#c13047', 2),
(49, 37, 'black', '#000000', 2),
(50, 9, 'pearl blue', '#82accb', 5),
(51, 9, 'space silver', '#d0d0d9', 2),
(52, 38, 'black', '#000000', 3),
(53, 38, 'brown', '#6e4d36', 3),
(54, 10, 'space grey', '#b2b5b8', 0),
(55, 10, 'gold', '#efe0d4', 5),
(56, 10, 'silver', '#e0e2e1', 4),
(57, 11, 'space grey', '#b2b5b8', 5),
(58, 11, 'silver', '#e0e2e1', 5),
(59, 12, 'nightfall black', '#222222', 4),
(60, 13, 'natural silver ', '#E8E8E8', 4),
(61, 14, 'performance blue', '#E4E4E4', 3),
(62, 15, 'black', '#000', 2),
(63, 16, 'storm gray', '#E2E2E2', 4),
(64, 17, 'platinum silver', '#c5c5c5', 2),
(65, 18, 'dark side of the moon', '#444444', 3),
(66, 18, 'lunar light', '#c5c5c5', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
