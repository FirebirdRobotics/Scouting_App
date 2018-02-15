-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2018 at 12:44 AM
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
  `crossedBaseline` set('yes','no') DEFAULT NULL,
  `placedCubeAuto` set('placedOnScale','placedOnSwitch','didNotPlace') DEFAULT NULL,
  `allySwitch` int(11) DEFAULT NULL,
  `enemySwitch` int(11) DEFAULT NULL,
  `scale` int(11) DEFAULT NULL,
  `attemptedClimb` set('successfulClimb','unsuccessfulClimb','parked','didNotTry') DEFAULT NULL,
  `carriedRobots` set('yes','no') DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `robots`
--

INSERT INTO `robots` (`robotNumber`, `crossedBaseline`, `placedCubeAuto`, `allySwitch`, `enemySwitch`, `scale`, `attemptedClimb`, `carriedRobots`, `comments`) VALUES
(1, 'yes', 'placedOnScale', 1, 1, 1, 'successfulClimb', 'yes', 'ok'),
(3, 'yes', 'placedOnScale', 2, 1, 1, 'unsuccessfulClimb', 'no', 'test'),
(9, 'yes', 'didNotPlace', 0, 0, 0, 'parked', 'no', 'test'),
(10, 'yes', 'placedOnScale', 12, 0, 2, 'successfulClimb', 'yes', '10th robot'),
(11, 'yes', 'placedOnScale', 0, 0, 0, 'parked', 'yes', '11th robot'),
(100, 'yes', 'didNotPlace', 4, 6, 0, 'parked', 'no', 'bad robot'),
(123, 'yes', 'placedOnScale', 2, 2, 2, 'successfulClimb', 'yes', 'asdfasdf'),
(444, 'yes', 'placedOnScale', 0, 0, 0, 'successfulClimb', 'yes', ''),
(800, 'yes', 'placedOnScale', 2, 0, 2, 'successfulClimb', 'yes', 'okok'),
(1234, 'no', 'didNotPlace', 3, 1, 6, 'didNotTry', 'no', 'test'),
(3019, 'yes', 'placedOnScale', 1, 1, 1, 'successfulClimb', 'yes', 'adfasdf'),
(8001, 'no', 'placedOnScale', 1, 0, 0, 'parked', 'yes', 'sdhfajk;dfh l');

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
