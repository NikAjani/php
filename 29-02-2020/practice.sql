-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 05:12 PM
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
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `description` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `name`, `parentId`, `description`, `status`, `createdAt`, `updatedAt`) VALUES
(25, 'Cloth', 0, 'Cloth', 1, '2020-03-02 11:56:38', '2020-03-03 07:48:57'),
(26, 'Top', 25, 'Top', 1, '2020-03-02 12:46:10', '2020-03-03 07:49:02'),
(27, 'Electronic', 0, 'Electronic', 1, '2020-03-03 07:46:28', '2020-03-03 08:08:00'),
(28, 'Mobile', 27, 'Mobile', 1, '2020-03-03 08:07:57', '2020-03-03 08:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custId` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custId`, `firstName`, `lastName`, `email`, `password`) VALUES
(11, 'Ajani', 'Nikhil', 'ajaninikhil23@gmail.com', '123'),
(12, 'Ajani12', 'Nikhil12', 'ajaninikhil23@gmail.com', '123'),
(14, 'Nikhil', 'Ajani', 'ajaninikhil23@gmail.com', 'ajani'),
(15, 'Nikhil', 'Ajani', 'ajaninikhil23@gmail.com', 'ajani');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `addressline1` varchar(50) NOT NULL,
  `addressline2` varchar(50) DEFAULT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `custId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `addressline1`, `addressline2`, `pincode`, `city`, `state`, `country`, `custId`) VALUES
(2, 'Address 1', 'Rajkot2', 360006, 'Rajkot', 'Gujarat', 'India', 11),
(3, 'Rajkot1', 'Rajkot2', 360006, 'Rajkot', 'Gujarat', 'India', 12),
(5, 'address 1234', 'address 2234', 360006, 'Rajkot', 'Gujarat', 'India', 14),
(6, 'address 1', 'address 2234', 360006, 'Rajkot', 'Gujarat', 'India', 15);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(6) NOT NULL,
  `stock` int(6) NOT NULL,
  `description` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `price`, `stock`, `description`, `createdAt`, `updatedAt`) VALUES
(16, 'Product 1', 200, 2, 'Product', '2020-03-02 12:49:28', '2020-03-02 12:49:28'),
(17, 'Product 2', 20, 2, 'Product 2', '2020-03-03 08:05:48', '2020-03-03 08:07:44'),
(19, 'DEmo', 23, 2, 'Demo', '2020-03-03 13:11:36', '2020-03-03 13:11:36'),
(21, 'DEmo', 23, 2, 'Demo', '2020-03-03 13:12:49', '2020-03-03 13:12:49'),
(22, 'DEmo', 23, 2, 'Demo', '2020-03-03 13:13:23', '2020-03-03 13:13:23'),
(23, 'DEmo', 23, 2, 'Demo', '2020-03-03 13:13:55', '2020-03-03 13:13:55'),
(26, 'ADads', 12, 2, 'asdasd', '2020-03-03 13:16:58', '2020-03-03 13:16:58'),
(27, 'dfgseg', 23, 23, 'asfdasdf', '2020-03-03 13:17:27', '2020-03-03 13:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `productId`, `catId`) VALUES
(4, 16, 26),
(5, 17, 28),
(11, 26, 26),
(12, 27, 26);

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
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `custId` (`custId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catId` (`catId`),
  ADD KEY `productId` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`custId`) REFERENCES `customer` (`custId`) ON DELETE CASCADE ON UPDATE CASCADE;

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
