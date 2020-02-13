-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 05:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `productPrice` int(5) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `productPrice`, `createdAt`, `updateAt`) VALUES
(1, 'RedMi Note 4', 10000, '2020-02-11 12:51:15', '2020-02-12 11:49:41'),
(2, 'Poco F1', 14000, '2020-02-11 12:51:15', '2020-02-12 11:48:26'),
(3, 'poco X2', 18000, '2020-02-11 12:52:00', '2020-02-12 11:48:26'),
(4, 'onePlus 7', 33000, '2020-02-11 12:52:00', '2020-02-12 11:48:26'),
(5, 'lenovo k8 note', 13000, '2020-02-11 23:45:22', '2020-02-12 11:48:26'),
(6, 'Samsung A30', 15000, '2020-02-11 23:46:12', '2020-02-12 11:48:26'),
(7, 'onePlus 6T', 23000, '2020-02-11 23:46:19', '2020-02-12 11:48:26'),
(8, 'iphone XR', 30000, '2020-02-11 23:48:04', '2020-02-12 11:48:26'),
(9, 'onePlus 6', 25000, '2020-02-11 23:49:33', '2020-02-12 11:48:26'),
(10, 'Real me 5', 20000, '2020-02-11 23:50:28', '2020-02-12 11:48:26'),
(15, 'Samsung A50s', 21000, '2020-02-12 09:07:55', '2020-02-12 11:48:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
