-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 01:33 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `categoryName` varchar(30) NOT NULL,
  `UrlKey` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `parentId` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `categoryName`, `UrlKey`, `image`, `status`, `description`, `parentId`, `createdAt`, `updateAt`) VALUES
(35, 'Cloth', 'Cloth', '4.jpg', 'yes', 'asd', 0, '2020-02-15 08:18:36', '2020-02-17 05:01:48'),
(36, 'top', 'top', 'top.jpg', 'yes', 'yes', 35, '2020-02-15 08:39:01', '2020-02-17 05:29:32'),
(38, 'bottom', 'bottom', 'bottom.jpg', 'yes', 'bottom', 35, '2020-02-15 08:53:14', '2020-02-17 05:29:46'),
(39, 'Electronic', 'Electronic', 'el.jpg', 'yes', 'Electronic', 0, '2020-02-17 04:08:46', '2020-02-17 04:33:04'),
(40, 'HouseHold', 'HouseHold', '6.jpg', 'yes', 'HouseHold', 0, '2020-02-17 04:10:50', '2020-02-17 04:10:50'),
(41, 'Mobile', 'Mobile', 'mobile.jpeg', 'yes', 'mobile', 39, '2020-02-17 04:52:57', '2020-02-17 04:52:57'),
(42, 'furniture', 'furniture', 'furniture.jpg', 'yes', 'furniture', 40, '2020-02-17 04:53:28', '2020-02-17 05:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `cmsId` int(11) NOT NULL,
  `cmsName` varchar(30) NOT NULL,
  `UrlKey` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `content` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cmsId`, `cmsName`, `UrlKey`, `status`, `content`) VALUES
(1, 'home', 'home', 'yes', 'Welcom\r\nThis is MVC Ecommerce Demo.'),
(2, 'Contact Us', 'contactus', 'yes', 'This is Contact Us Page'),
(4, 'About Us', 'aboutus', 'yes', 'This is About Us Page');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `sku` varchar(30) NOT NULL,
  `UrlKey` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `description` varchar(70) NOT NULL,
  `shortDescription` varchar(50) NOT NULL,
  `price` int(6) NOT NULL,
  `stock` int(3) NOT NULL,
  `cratedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `sku`, `UrlKey`, `image`, `status`, `description`, `shortDescription`, `price`, `stock`, `cratedAt`, `updateAt`) VALUES
(16, 'product123', 'sku1', 'product123', '4.jpg', '', '', '', 123, 123, '2020-02-15 09:23:34', '2020-02-15 09:23:34'),
(17, 'product1', 'asd', 'product1', '4.jpg', 'yes', 'sdas', 'asdasd', 123, 123, '2020-02-15 09:25:03', '2020-02-15 09:25:03'),
(18, 'Bottom Prod', 'asdasd', 'Bottom-Prod', 'bottom.jpg', 'yes', 'asdasd', 'asdasd', 123, 1, '2020-02-15 10:22:25', '2020-02-17 08:02:49'),
(19, 'Top', 'top2', 'Top', '1.jpg', 'yes', 'Top 2', 'Top', 234, 12, '2020-02-17 07:42:24', '2020-02-17 09:23:13'),
(20, 'Redmi Note 8', 'Remi8', 'Redmi-Note-8', 'mobile.jpeg', 'yes', 'Red Mi Note 8', 'Note 8', 20000, 2, '2020-02-17 08:00:38', '2020-02-17 09:56:14'),
(21, 'table', 'tab', 'table', 'furniture.jpg', 'yes', 'Dinning Table', 'Table', 5000, 4, '2020-02-17 08:01:28', '2020-02-17 10:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `prod_cat_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`prod_cat_id`, `productId`, `catId`) VALUES
(17, 17, 36),
(18, 18, 38),
(19, 19, 36),
(20, 20, 41),
(21, 21, 42);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phoneNo` int(15) NOT NULL,
  `emailId` varchar(30) NOT NULL,
  `password` varchar(33) NOT NULL,
  `userType` varchar(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `phoneNo`, `emailId`, `password`, `userType`, `createdAt`, `updateAt`) VALUES
(1, 'Nikhil', 'Ajani', 989814038, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'A', '2020-02-14 08:43:36', '2020-02-14 08:49:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`cmsId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`prod_cat_id`),
  ADD KEY `catId` (`catId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `cmsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `prod_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
