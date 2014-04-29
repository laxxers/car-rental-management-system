-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2014 at 07:07 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `type` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `details` varchar(25) NOT NULL,
  `hourly` int(11) NOT NULL,
  `daily` int(11) NOT NULL,
  `weekly` int(11) NOT NULL,
  `monthly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`type`, `name`, `details`, `hourly`, `daily`, `weekly`, `monthly`) VALUES
('small', 'viva', 'auto', 6, 150, 900, 1500),
('small', 'viva', 'manual', 6, 150, 900, 1500),
('medium', 'saga', 'auto', 1000, 1000, 1000, 1000),
('medium', 'vios', 'auto', 1000, 1000, 1000, 1000),
('luxury', 'accord', 'auto', 1000, 1000, 1000, 1000),
('MPV', 'avanza', 'auto', 1000, 1000, 1000, 1000),
('van', 'HiAce', 'auto', 1000, 1000, 1000, 1000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
