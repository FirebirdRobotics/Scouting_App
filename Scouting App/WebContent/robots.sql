-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 10:35 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firebirds`
--

-- --------------------------------------------------------

--
-- Table structure for table `robots`
--

CREATE TABLE `robots` (
  `robotNumber` int(11) NOT NULL,
  `teamName` varchar(100) DEFAULT NULL,
  `crossedBaseline` set('yes','no') DEFAULT NULL,
  `placedCubeAuto` set('placedOnScale','placedOnSwitch','didNotPlace') DEFAULT NULL,
  `switch` int(100) DEFAULT NULL,
  `dropped` int(100) DEFAULT NULL,
  `scale` int(100) DEFAULT NULL,
  `cubeExchange` int(100) DEFAULT NULL,
  `attemptedClimb` set('successfulClimb','unsuccessfulClimb','parked','didNotTry') DEFAULT NULL,
  `carriedRobots` set('yes','no') DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `robots`
--

INSERT INTO `robots` (`robotNumber`, `teamName`, `crossedBaseline`, `placedCubeAuto`, `switch`, `dropped`, `scale`, `cubeExchange`, `attemptedClimb`, `carriedRobots`, `comments`) VALUES
(1, NULL, 'yes', 'placedOnScale', 1, 1, 1, 1, 'successfulClimb', 'yes', 'test robot 1'),
(2, NULL, 'no', 'placedOnSwitch', 2, 2, 2, 2, 'unsuccessfulClimb', 'no', 'test robot 2'),
(3, NULL, 'yes', 'didNotPlace', 3, 3, 3, 3, 'parked', 'yes', 'test robot 3'),
(4, NULL, 'yes', 'placedOnScale', 4, 4, 4, 4, 'didNotTry', 'yes', 'test robot 4'),
(5, NULL, 'yes', 'placedOnScale', 5, 5, 5, 5, 'successfulClimb', 'yes', 'test robot 5'),
(6, NULL, 'yes', 'placedOnScale', 6, 6, 6, 6, 'successfulClimb', 'yes', 'test robot 6'),
(7, NULL, 'yes', 'placedOnScale', 7, 7, 7, 7, 'successfulClimb', 'yes', 'test robot 7'),
(8, NULL, 'yes', 'placedOnSwitch', 8, 8, 8, 8, 'unsuccessfulClimb', 'yes', 'test robot 8\r\n\r\n'),
(9, NULL, 'no', 'placedOnSwitch', 9, 9, 9, 9, 'parked', 'yes', 'test robot 9'),
(10, NULL, 'yes', 'placedOnScale', 10, 10, 10, 10, 'unsuccessfulClimb', 'no', 'test robot 10'),
(11, NULL, 'no', 'didNotPlace', 11, 11, 11, 11, 'didNotTry', 'no', 'test robot 11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`robotNumber`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
