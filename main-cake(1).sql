-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2021 at 10:30 AM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `main-cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `txnid`, `payment_amount`, `payment_status`, `itemid`, `createdtime`, `username`) VALUES
(4, '12345', '0.00', 'payment status', '345', '2021-10-11 16:25:51', ''),
(5, '22345', '0.00', 'payment status', '445', '2021-10-11 12:00:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_by_clients`
--

CREATE TABLE `table_by_clients` (
  `id` int(11) NOT NULL COMMENT 'userid',
  `fullName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_by_clients`
--

INSERT INTO `table_by_clients` (`id`, `fullName`, `emailAddress`, `userPassword`, `confirmPassword`) VALUES
(1, 'joseph karanja', '6karanjajoseph@gmail.com', '34777899', '34777899'),
(2, 'james patoo', 'jamespatoo@gmail.com', '111111', '111111'),
(5, 'john patoo', 'johnpatoo@gmail.com', '222222', '222222'),
(6, 'maggy kamau', 'maggykamau@gmail.com', '333333', '333333');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `product_name`, `code`, `image`, `price`) VALUES
(1, 'Dozen Cupcakes', '3DcAM01', 'img/shop/product-1.jpg', 32.00),
(2, 'Cookies and Cream', 'USB02', 'img/shop/product-2.jpg', 30.00),
(3, 'Cookies and cream', 'swwt', 'img/shop/product-3.jpg', 31.00),
(4, 'Gluten Free Mini Dozen', 'LPN45', 'img/shop/product-4.jpg', 25.00),
(5, 'Vanilla Salted Caramel', 'jpl', 'img/shop/product-5.jpg', 20.00),
(6, 'German chocholate', '', 'img/shop/product-6.jpg', 14.00),
(7, 'Dulce De Leche', 'tre', 'img/shop/product-7.jpg', 32.00),
(8, 'Mississipi mud', 'try', 'img/shop/product-8.jpg\"', 10.00),
(9, 'Blackbery cake', 'hjy', 'img/shop/image.jpeg\r\n', 500.00),
(10, 'Birthday cake', 'hgjf', 'img/shop/birthday.jpg\r\n', 800.00),
(11, 'Sweet birthday deco', 'uth', 'img/shop/16714-birthday-cake-600x600.jpg\r\n', 670.00),
(12, 'Black cocoa cake', 'fcx', 'img/shop/black-cocoa-cake-1626886151.jpg\r\n', 530.00),
(13, 'Simple Mocha', 'jfdi', 'img/shop/Simple-Mocha.jpg\r\n', 550.00),
(14, 'Smash cake', 'uswjd', 'img/shop/images.jpeg\r\n', 450.00),
(15, 'Lion Cake', 'deffe', 'img/shop/lion_cake.jpg\r\n', 510.00),
(16, 'Half cake', 'wfdv', 'img/shop/1591686787174_DSC_0398_M.jpg\r\n', 320.00),
(17, 'Butter scone', 'dgfg', 'img/shop/buttersco-500x500.jpg\r\n', 430.00),
(18, 'Peanut Butter', 'def', 'img/shop/best-peanut-butter-frosting-main.jpg\r\n', 120.00),
(19, 'Butterscoth Delight', 'jfjg', 'img/shop/FGCCAKE6-butterscoth-delight-260x260.jpg\r\n', 345.00),
(20, 'Do-cake', 'joip', 'img/shop/pumpkin-dog-cake-recipe-09.2019-2-769x1024.webp\r\n', 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `kitu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `kitu`) VALUES
(1, 'heri ugali'),
(2, 'test mode');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_by_clients`
--
ALTER TABLE `table_by_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_by_clients`
--
ALTER TABLE `table_by_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'userid', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
