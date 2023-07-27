-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 10:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project123`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Jon Smoth', 'jon@gmail.com', '111111', 'user-lg.jpg', 'bangladesh', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '01911111111', 'Web Disigner'),
(2, 'Fon Smoth', 'fon@gmail.com', '222222', 'user.jpg', 'bangladesh', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '01711111111', 'web designer'),
(3, 'Kon smoth', 'kon@gmail.com', '333333', 'user-lg.jpg', 'Bangladesh', 'This application is created by Mdev Media, if you willing to contact me, please click this link. ', '01811111111', 'web designer');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, ' Iphone ', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(2, ' Xiomi ', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(3, ' Samsung ', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(4, ' Nokia ', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(5, 'Vivo', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `city_categories`
--

CREATE TABLE IF NOT EXISTS `city_categories` (
`p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_categories`
--

INSERT INTO `city_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, ' Dhaka ', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(2, ' Chattagram ', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(3, ' Khulna ', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(4, ' Barisal ', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'),
(5, 'Rajshahi', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `mainadmin`
--

CREATE TABLE IF NOT EXISTS `mainadmin` (
`admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  `admin_job` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `admin_name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `admin_name`) VALUES
(1, 1, 4, '2020-04-27 20:38:29', 'Mobile', 'nokia5.1.jpg', 'nokia5.1.jpg', 'nokia5.1.jpg', 2550, 'Nokia 5.1\r\nRam:4gb\r\nRom:128gb\r\nCamera:16/16 mp\r\nBatery:4500 mah\r\nDisplay:5.5 in\r\n', 'Nokia', 'Jon Smoth'),
(2, 1, 1, '2020-04-27 20:38:37', 'Mobile', 'iphone11pro.jpg', 'iphone11pro.jpg', 'iphone11pro.jpg', 4900, 'IPhone 11 pro\r\nRam:6gb\r\nRom:128gb\r\nCamera:22/16/12 mp\r\nBatery:4350 mah\r\nDisplay:6.2 in', 'Iphone', 'Jon Smoth'),
(3, 2, 3, '2020-04-27 20:38:47', 'Mobile', 'galaxys11pro.jpg', 'galaxys11pro.jpg', 'galaxys11pro.jpg', 4500, 'Samsung Galaxy x 11 pro\r\nRam:8gb\r\nRom:256gb\r\nCamera:22/16/16 mp\r\nBatery:5100 mah\r\nDisplay:6.4 in', 'Samsung', 'Fon Smoth'),
(5, 3, 5, '2020-04-27 20:49:20', 'Mobile', 'vivo15pro.jpg', 'vivo15pro.jpg', 'vivo15pro.jpg', 4200, 'Vivo 15 pro\r\nRam:8gb\r\nRom :254gb\r\nCamera:16/16mp\r\nBatary:4500mah\r\nDisplay:6.3 in\r\n\r\n', 'vivo', 'Kon smoth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `city_categories`
--
ALTER TABLE `city_categories`
 ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `mainadmin`
--
ALTER TABLE `mainadmin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `city_categories`
--
ALTER TABLE `city_categories`
MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mainadmin`
--
ALTER TABLE `mainadmin`
MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
