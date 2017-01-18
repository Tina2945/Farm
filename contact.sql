-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2017 at 12:07 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `id` int(10) NOT NULL,
  `Recency` int(100) NOT NULL,
  `Frequency` int(100) NOT NULL,
  `Money` int(255) NOT NULL,
  `Rscore` int(100) NOT NULL,
  `Fscore` int(100) NOT NULL,
  `Mscore` int(100) NOT NULL,
  `RFMscore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `address`, `id`, `Recency`, `Frequency`, `Money`, `Rscore`, `Fscore`, `Mscore`, `RFMscore`) VALUES
('dinghau', '台北市中山區德惠街37巷87號', 5, 3, 3, 525000, 5, 5, 3, 553),
('chialefu', '台灣省文山區政大路87號', 8, 9, 6, 160000, 4, 4, 1, 441),
('meileinsha', '台北市中山區嘿嘿路1號', 1087, 7, 1, 50000, 4, 5, 1, 451),
('chanlien', '台灣省全部區我快倒被全聯買走', 2037, 10, 4, 100000, 4, 4, 1, 441),
('taitun', '台北是全台各地都我據點歐1號', 2048, 5, 6, 1042500, 5, 4, 5, 545),
('imy', '台北市牛奶區牛奶路09號', 3450, 30, 1, 1012500, 1, 5, 5, 155),
('doomy', '台東縣牛肉鄉奶品路8號', 5001, 2, 15, 1313000, 5, 1, 1, 511);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `name` varchar(15) NOT NULL,
  `gender` char(1) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `id` varchar(15) NOT NULL,
  `jobtitle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`name`, `gender`, `mobile`, `id`, `jobtitle`) VALUES
('羅靖婷', '女', '0931960318', '103306006', 'manager'),
('佘欣玲', '女', '0937373737', '103306037', 'boss'),
('黃書妍', '女', '0938383838', '103306038', 'design manager'),
('陳彥哲', '男', '0922958152', '103306082', 'employee'),
('陳三鼎', '男', '0987654321', '104573037', 'employee'),
('陳四鼎', '女', '0912345678', '108787666', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`name`, `price`) VALUES
('milk', 150),
('pannacotta', 25),
('pudding', 20),
('yogurt', 40);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `name`, `product`, `price`, `amount`, `total`) VALUES
(5, 'dinghau', 'milk', 150, 100, 15000),
(1087, 'meileinsha', 'milk', 150, 30, 4500),
(5, 'dinghau', 'milk', 150, 100, 15000),
(3450, 'imy', 'yogurt', 40, 87, 3480),
(3450, 'imy', 'pannacotta', 25, 500, 12500),
(2048, 'taitun', 'yogurt', 40, 7000, 280000),
(2048, 'taitun', 'milk', 150, 5000, 750000),
(5001, 'doomy', 'yogurt', 40, 50, 2000),
(5001, 'doomy', 'yogurt', 40, 50, 2000),
(5001, 'doomy', 'yogurt', 40, 50, 2000),
(5001, 'doomy', 'yogurt', 40, 50, 2000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(5, 'dinghau', 'milk', 150, 300, 45000),
(8, 'chialefu', 'pudding', 20, 8000, 160000),
(2048, 'taitun', 'pannacotta', 25, 500, 12500),
(5001, 'doomy', 'milk', 150, 8700, 1305000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
