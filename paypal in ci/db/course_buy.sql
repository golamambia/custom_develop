-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2019 at 12:29 AM
-- Server version: 5.6.45-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_work`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_buy`
--

CREATE TABLE `course_buy` (
  `id` int(11) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(11) NOT NULL,
  `txn_id` varchar(256) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_buy`
--

INSERT INTO `course_buy` (`id`, `user_id`, `product_id`, `qty`, `txn_id`, `entry_date`) VALUES
(13, 'ST0022', 5, '2', '1NH916806J1778223', '2019-09-25'),
(12, 'ST0022', 5, '2', '4H025532106014128', '2019-09-25'),
(11, 'ST0022', 5, '2', '4H0255321060141281', '2019-09-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_buy`
--
ALTER TABLE `course_buy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_buy`
--
ALTER TABLE `course_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
