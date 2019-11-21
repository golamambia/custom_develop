-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2019 at 06:00 AM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hisecure`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `u_name` varchar(200) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(10000) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `post_time` varchar(100) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_id` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`id`, `userid`, `u_name`, `user_email`, `user_mobile`, `title`, `msg`, `rating`, `post_time`, `product_name`, `product_id`) VALUES
(23, '11', 'Kalyan Mondal', 'name.kalyan@gmail.com', '7980230244', 'hh', 'jsdg', '3', '22/03/2019', 'Serving chair', '15'),
(24, '11', 'Kalyan Mondal', 'name.kalyan@gmail.com', '7980230244', 'test title', 'test message', '4', '22/03/2019', 'Royal round chair', '11'),
(25, '11', 'Kalyan Mondal', 'name.kalyan@gmail.com', '7980230244', 'ttt', 'mmm', '5', '22/03/2019', 'Royal round  dining', '9'),
(26, '11', 'Kalyan Mondal', 'name.kalyan@gmail.com', '7980230244', 'Good', 'Very good', '2', '26/04/2019', 'Square plastic table ', '12'),
(27, '11', 'Kalyan Mondal', 'name.kalyan@gmail.com', '7980230244', 'SEO Optimization', 'this is for testing', '1', '29/04/2019', 'Best Serving Chair', '14'),
(28, '11', 'Kalyan Mondal', 'name.kalyan@gmail.com', '7980230244', 'test', 'tgtth', '1', '30/04/2019', 'Best Serving Chair', '14'),
(29, '11', 'Kalyan Mondal', 'name.kalyan@gmail.com', '7980230244', 'SEO Optimization', 'tyjtykytkm', '1', '30/04/2019', 'Best Serving Chair', '14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
