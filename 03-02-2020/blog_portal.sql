-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 11:09 AM
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
-- Database: `blog_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `parentId` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `metaName` varchar(50) NOT NULL,
  `catUrl` varchar(50) NOT NULL,
  `catContant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `parentId`, `title`, `metaName`, `catUrl`, `catContant`) VALUES
(1, 0, 'sport', 'sport', 'sport/', 'abc'),
(3, 1, 'abc', 'ad', 'ad', 'asd'),
(4, 0, 'education', 'edu', 'education', 'e'),
(5, 4, 'cat1', 'adad', 'adad', 'add');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `contant` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `publish` date NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `userId`, `title`, `contant`, `url`, `publish`, `category`) VALUES
(4, 3, 'post2', 'Ajani', 'Nikhil', '2020-02-11', 'sport,abc,education'),
(5, 3, 'post3', 'afaf', 'adad', '2020-02-11', 'sport,abc,education'),
(6, 3, 'post4', 'abc', 'acfr', '2020-02-12', 'sport,abc,education'),
(7, 3, 'post34', 'we', 'sdf', '0000-00-00', 'sport,abc,education'),
(8, 3, 'post34', 'we', 'sdf', '0000-00-00', 'sport,abc,education'),
(9, 3, 'post34', 'we', 'sdf', '0000-00-00', 'sport,abc,education'),
(12, 3, 'post44', 'adad', 'adadd', '2020-02-10', 'sport,abc'),
(13, 3, 'post55', '5848', '151', '2020-02-18', 'sport,abc,education'),
(14, 3, 'adada', 'adad', 'dadadad', '2020-02-11', 'sport,abc,education'),
(15, 3, 'adada', 'adad', 'dadadad', '2020-02-11', 'sport,abc,education'),
(16, 3, 'adada', 'adad', 'dadadad', '2020-02-11', 'sport,abc,education'),
(17, 3, 'post3', 'adad', 'adad', '2020-02-11', 'abc,education,cat1'),
(18, 3, 'post3', 'adad', 'adad', '2020-02-11', 'abc,education,cat1'),
(19, 3, 'post22223', 'fafa', 'afaf', '2020-02-10', 'abc,education'),
(20, 3, 'post22223', 'fafa', 'afaf', '2020-02-10', 'abc,education'),
(21, 3, 'postAjani', 'akjkd', 'akjdkja', '2020-02-05', 'sport,education');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `postCatId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`postCatId`, `postId`, `catId`) VALUES
(10, 20, 3),
(11, 20, 4),
(12, 21, 1),
(13, 21, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `prefix` varchar(7) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `emailId` varchar(30) NOT NULL,
  `phoneNo` int(13) NOT NULL,
  `password` varchar(33) NOT NULL,
  `information` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastLogin` timestamp NULL DEFAULT NULL,
  `updateAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `prefix`, `firstName`, `lastName`, `emailId`, `phoneNo`, `password`, `information`, `createdAt`, `lastLogin`, `updateAt`) VALUES
(1, 'Mr', 'ajani', 'Nikhil', 'ajaninikhil23@gmail.com', 1231231231, '62e87f5e7cf1d6513c2f3993f676cad8', '312', '2020-02-03 11:52:45', NULL, '2020-02-03 11:55:39'),
(2, 'Mr', 'ajani', 'Nikhil', 'ajaninikhil23@gmail.com', 1231231231, '202cb962ac59075b964b07152d234b70', '312', '2020-02-03 11:52:45', NULL, '2020-02-03 11:55:39'),
(3, 'Mr', 'ajani', 'nikhil', 'admin@gmail.com', 1231231231, '21232f297a57a5a743894a0e4a801fc3', 'ajani', '2020-02-03 11:52:45', NULL, '2020-02-03 11:55:39'),
(4, 'Mr', 'ajani', 'nikhil', 'admin123@gmaia', 1231231231, '202cb962ac59075b964b07152d234b70', '13', '2020-02-03 11:52:45', NULL, '2020-02-03 11:55:39'),
(5, 'Mr', 'user1a', 'user2', 'user@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70', '123', '2020-02-03 11:53:15', NULL, '2020-02-03 11:55:39'),
(6, 'Mr', 'user2', 'user22', 'user2@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70', '123', '2020-02-03 11:54:06', NULL, '2020-02-03 11:55:49'),
(7, '', 'Nikhil', 'Ajani', 'ajani@gmail.com', 2147483647, '202cb962ac59075b964b07152d234b70', '123', '2020-02-03 12:01:58', NULL, '2020-02-03 12:01:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`postCatId`),
  ADD KEY `postId` (`postId`),
  ADD KEY `catId` (`catId`);

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
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `postCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`catId`) REFERENCES `category` (`catId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
