-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2014 at 10:47 AM
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
  `transmission` varchar(25) NOT NULL,
  `daily` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `luggage` int(11) NOT NULL,
  `ac` enum('1','0') NOT NULL,
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`type`, `name`, `transmission`, `daily`, `capacity`, `luggage`, `ac`, `vehicle_id`) VALUES
('Compact', 'Perodua Viva', 'Auto', 150, 4, 2, '1', 1),
('Standard', 'Toyota Vios', 'Auto', 250, 5, 4, '1', 2),
('Luxury', 'Honda Accord', 'Auto', 550, 5, 5, '1', 3),
('MPV', 'Toyota Avanza', 'Auto', 450, 8, 4, '1', 4),
('Van', 'Toyota HiAce', 'Auto', 300, 12, 6, '0', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
