-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: trans-cash-mobile.fr.mysql:3306
-- Generation Time: Apr 24, 2018 at 10:55 PM
-- Server version: 10.1.30-MariaDB-1~xenial
-- PHP Version: 5.4.45-0+deb7u13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trans_cash_mobile_fr`
--

-- --------------------------------------------------------

--
-- Table structure for table `minichat`
--

CREATE TABLE IF NOT EXISTS `minichat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `minichat`
--

INSERT INTO `minichat` (`id`, `pseudo`, `message`) VALUES
(1, 'Loubia', 'Je suis la'),
(2, 'Loubia', 'Je suis la'),
(3, 'Karamel', 'Le chocolat c''est bon'),
(4, '', ''),
(5, 'Jiricane', 'Sa fait lomptemp'),
(6, '$pseudo', '$message'),
(7, 'Loubiataga', 'Wewewe'),
(8, 'Karim', 'Nique tout'),
(9, 'Kaka', 'Lala'),
(10, '', ''),
(11, '', ''),
(12, 'Karim', 'Karim'),
(13, 'Lambada', 'Forgenith'),
(14, '', ''),
(15, '', ''),
(16, 'A', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
