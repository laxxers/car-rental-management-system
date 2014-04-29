-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2014 at 12:54 PM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `details` varchar(25) NOT NULL,
  `hourly` int(11) NOT NULL,
  `daily` int(11) NOT NULL,
  `weekly` int(11) NOT NULL,
  `monthly` int(11) NOT NULL,
  `no_passenger` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `ac` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`type`, `name`, `details`, `hourly`, `daily`, `weekly`, `monthly`, `no_passenger`, `capacity`, `ac`, `id`) VALUES
('Compact', 'Perodua Viva 1.0(A)', 'Auto', 6, 150, 900, 1500, 4, 2, '1', 1),
('Standard', 'Toyota Vios 1.5(A)', 'Auto', 1000, 1000, 1000, 1000, 5, 4, '1', 2),
('Luxury', 'Honda Accord 2.0 (A)', 'Auto', 1000, 1000, 1000, 1000, 5, 5, '1', 3),
('MPV', 'Toyota Avanza 1.5(A)', 'Auto', 1000, 1000, 1000, 1000, 8, 6, '1', 4),
('Van', 'Toyota HiAce', 'Auto', 1000, 1000, 1000, 1000, 12, 8, '0', 5),
('Luxury', 'Toyota Camry 2.0(A)', 'Auto', 1000, 1000, 1000, 1000, 5, 5, '1', 6),
('MPV', 'Toyota Estima 2.4(A)', 'Auto', 1000, 1000, 1000, 1000, 8, 6, '1', 7),
('Small', 'Hyundai Sonata 2.0(A)', 'Auto', 1000, 1000, 1000, 1000, 4, 2, '1', 8),
('MPV', 'Toyota Innova 2.0(A)', 'Auto', 1000, 1000, 1000, 1000, 8, 6, '1', 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
