-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 05:54 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `REGISTRATION`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE IF NOT EXISTS `ADMIN` (
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Security` varchar(200) NOT NULL,
  `Answer` varchar(30) NOT NULL,
  `Birthday` date NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`Fname`, `Lname`, `Username`, `Password`, `Security`, `Answer`, `Birthday`) VALUES
('Roshan', 'Koirala', 'roshankoirala05@gmail.com', '71203', 'In what city were you born?', 'Biratnagar', '1993-05-07'),
('Nawaraj', 'Subedi', 'sandip_subedi25@gmail.com', '71203', 'what is your mothers maiden name ?', 'Regmi', '1993-05-07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
