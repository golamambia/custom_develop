-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 08:53 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gratia_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_admin`
--

CREATE TABLE IF NOT EXISTS `admin_admin` (
`admin_id` int(11) NOT NULL,
  `admin_login_id` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_fastname` varchar(255) NOT NULL,
  `admin_lastname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_last_login_ip` varchar(255) NOT NULL,
  `admin_last_login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_admin`
--

INSERT INTO `admin_admin` (`admin_id`, `admin_login_id`, `admin_password`, `admin_fastname`, `admin_lastname`, `admin_email`, `admin_last_login_ip`, `admin_last_login_datetime`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Panel', 'admin@gmail.com', '::1', '2018-10-07 17:49:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_admin`
--
ALTER TABLE `admin_admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_admin`
--
ALTER TABLE `admin_admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
