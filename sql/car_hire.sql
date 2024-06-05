-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2017 at 01:39 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `car_hire`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_stat` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `veh_id` varchar(50) NOT NULL,
  `client` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `order_stat`, `date`, `veh_id`, `client`) VALUES
(1, 'settled', '2017-07-14 16:10:38', '9', '31593530');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `id_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_no` (`id_no`,`email`,`phone`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `id_no`, `email`, `phone`) VALUES
(1, 'Yakub Juma', '31593530', 'mwambeyu.jnr@gmail.com', '0715108068');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_ref` varchar(50) NOT NULL,
  `amnt_paid` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `processed_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_ref` (`order_ref`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `trans_date`, `order_ref`, `amnt_paid`, `payment_method`, `processed_by`) VALUES
(1, '2017-07-14 16:10:38', '1', '3000.00', 'cash', '0712345678');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `username`, `password`) VALUES
(2, 'admin', '0712345678', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `engine` varchar(50) NOT NULL,
  `plate` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `status`, `type`, `model`, `color`, `engine`, `plate`, `price`, `img`) VALUES
(1, 'available', 'saloon', 'Toyota Vitz', 'Black', '2.0 CC', 'KCJ123H', '3000.00', 'rear_side_view.jpg'),
(2, 'available', 'mini van', 'Toyota Noah', 'White', '2.0 CC', 'KCE345Y', '6000.00', '1200px-2nd_generation_Toyota_Noah.jpg'),
(4, 'available', 'saloon', 'Toyota Premio', 'Blue', '2.0 CC', 'KCJ764K', '4000.00', 'Toyota_Premio.jpg'),
(5, 'available', 'wagon', 'Mazda Demio', 'Deep Maroon', '2.0 CC', 'KCE245Y', '3000.00', '2012-Mazda-Demio-4939.JPG'),
(6, 'available', 'mini suv', 'Toyota Rav4', 'Black', '3.0 CC', 'KCF878J', '10000.00', 'b17_zfrev_fl2_0202_b.png'),
(7, 'available', 'suv', 'Toyota Land Cruiser V8', 'Black', '8.0 CC', 'KCJ666H', '20000.00', '8789987.jpg'),
(8, 'available', 'suv', 'Range Rover', 'White', '8.0 CC', 'KCF675M', '20000.00', 'article-2477960-1906E63A00000578-171_634x353.jpg'),
(9, 'hired', 'wagon', 'Mazda Demio', 'White', '2.0 CC', 'KCC676T', '3000.00', 'Mazda_Demio_Carmudi.jpg');
