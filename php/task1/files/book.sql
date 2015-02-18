-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2015 at 10:51 PM
-- Server version: 5.5.41-log
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `User2`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop-authors`
--

CREATE TABLE IF NOT EXISTS `shop-authors` (
  `authors_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `authors_name` text NOT NULL,
  PRIMARY KEY (`authors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop-books`
--

CREATE TABLE IF NOT EXISTS `shop-books` (
  `book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` float unsigned NOT NULL,
  `book_name` text CHARACTER SET latin1 NOT NULL,
  `img` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'no_image.png',
  `content` text CHARACTER SET latin1 NOT NULL,
  `visible` enum('0','1') CHARACTER SET latin1 NOT NULL DEFAULT '1',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop-book_a`
--

CREATE TABLE IF NOT EXISTS `shop-book_a` (
  `a_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop-book_g`
--

CREATE TABLE IF NOT EXISTS `shop-book_g` (
  `g_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop-cart`
--

CREATE TABLE IF NOT EXISTS `shop-cart` (
  `User_Id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop-genre`
--

CREATE TABLE IF NOT EXISTS `shop-genre` (
  `genre_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre_name` text NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop-orders`
--

CREATE TABLE IF NOT EXISTS `shop-orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `paymentID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop-payment`
--

CREATE TABLE IF NOT EXISTS `shop-payment` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop-users`
--

CREATE TABLE IF NOT EXISTS `shop-users` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` int(11) NOT NULL,
  `Password` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
