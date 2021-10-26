-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2021 at 10:57 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtb_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `platforms` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `saleprice` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `platforms`, `price`, `saleprice`) VALUES
(67, 'hgf', 'dfgh', 4, 6),
(66, 'z', 'z', 1, 1),
(65, 'alo', 'loa', 1, 2),
(64, 'qÆ°erty', 'ytgfrd', 1.7654, 3.642),
(63, 'flbsnl', 'glskb', 2, 2),
(61, 'lá»›n nháº¥t', 'llll', 2.31123, 9.134),
(62, 'gbxm', 'lfkmvdkm', 1, 1),
(59, 'uyt', 'rew', 1.1234, 0),
(58, 'a', 'j', 1, 0),
(54, 'bbb', 'ccc', 1.94459, 0),
(57, 'ty', 'tre', 1.12345, 1.12346),
(53, 'admin', 'a', 1.12345, 1.12346),
(56, 'bbbb', 'bbbb', 233.21, 1.3456),
(46, 'hung', 'plat1', 1, 9.765),
(47, 'admin', 'Cloud1', 0, 0),
(60, 'oiuytr', 'ytrdes', 3.654, 1.34567),
(49, 'hung', 'sadsa', 5.76, 4.32);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
