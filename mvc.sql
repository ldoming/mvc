-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2014 at 05:55 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `phone_number`, `address`, `is_deleted`, `created_datetime`, `updated_datetime`) VALUES
(1, 1, 'Sample', '+63912345678', 'sample', 0, '2014-01-09 08:31:41', '0000-00-00 00:00:00'),
(2, 2, '3', '+639123456781', 'sample1', 0, '2014-01-09 08:31:41', '2014-01-09 11:37:30'),
(3, 1, 'sample', '12345', 'cambi', 0, '2014-01-09 16:21:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` enum('admin','user') NOT NULL,
  `is_deleted` tinyint(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `phone_number`, `address`, `type`, `is_deleted`, `created_datetime`, `updated_datetime`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lymuel', 'Doming', '+639469617849', 'Cambinocot, Cebu City', 'admin', 0, '2014-01-09 08:34:39', '0000-00-00 00:00:00'),
(3, 'ldoming', 'c938214f9d5e2744c70b324a80f7726b', 'Lymuel', 'Doming', '+639469617849', 'Cambinocot, Cebu City', 'admin', 0, '2014-01-09 16:43:17', '0000-00-00 00:00:00'),
(4, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', 'user', 0, '2014-01-09 17:15:01', '0000-00-00 00:00:00'),
(5, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', 'user', 0, '2014-01-09 17:15:05', '0000-00-00 00:00:00'),
(6, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'User', '+639469617849', 'Cambinocot, Cebu City', 'user', 0, '2014-01-09 17:17:42', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
