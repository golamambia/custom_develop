-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 12:48 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classified`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_admin`
--

CREATE TABLE `admin_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_login_id` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_fastname` varchar(255) NOT NULL,
  `admin_lastname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_last_login_ip` varchar(255) NOT NULL,
  `admin_last_login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_admin`
--

INSERT INTO `admin_admin` (`admin_id`, `admin_login_id`, `admin_password`, `admin_fastname`, `admin_lastname`, `admin_email`, `admin_last_login_ip`, `admin_last_login_datetime`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Panel', 'admin@gmail.com', '::1', '2018-10-07 17:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `admin_setting`
--

CREATE TABLE `admin_setting` (
  `id` int(11) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkdin` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `office_phone` varchar(50) NOT NULL,
  `admin_logo` varchar(255) NOT NULL,
  `from_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_setting`
--

INSERT INTO `admin_setting` (`id`, `twitter`, `facebook`, `linkdin`, `google_plus`, `site_email`, `address`, `phone`, `office_phone`, `admin_logo`, `from_email`) VALUES
(1, '#', '#', '#', '#', '#', '9 Brittain Drive, Grantham, NG31 9JY, United Kingdom.', '0123 456 78 90 ', '987654321', '#', 'info@theprivatecleaner.co.uk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_admin`
--
ALTER TABLE `admin_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_setting`
--
ALTER TABLE `admin_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_admin`
--
ALTER TABLE `admin_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_setting`
--
ALTER TABLE `admin_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
