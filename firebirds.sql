-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2018 at 12:01 AM
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
  `matchNumber` int(11) NOT NULL,
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

INSERT INTO `robots` (`robotNumber`, `matchNumber`, `crossedBaseline`, `placedCubeAuto`, `switch`, `dropped`, `scale`, `cubeExchange`, `attemptedClimb`, `carriedRobots`, `comments`) VALUES
(1, 0, 'yes', 'placedOnScale', 1, 1, 1, 1, 'successfulClimb', 'yes', 'test robot 1'),
(2, 0, 'no', 'placedOnSwitch', 2, 2, 2, 2, 'unsuccessfulClimb', 'no', 'test robot 2'),
(3, 0, 'yes', 'didNotPlace', 3, 3, 3, 3, 'parked', 'yes', 'test robot 3'),
(4, 0, 'yes', 'placedOnScale', 4, 4, 4, 4, 'didNotTry', 'yes', 'test robot 4'),
(5, 0, 'yes', 'placedOnScale', 5, 5, 5, 5, 'successfulClimb', 'yes', 'test robot 5'),
(6, 0, 'yes', 'placedOnScale', 6, 6, 6, 6, 'successfulClimb', 'yes', 'test robot 6'),
(7, 0, 'yes', 'placedOnScale', 7, 7, 7, 7, 'successfulClimb', 'yes', 'test robot 7'),
(8, 0, 'yes', 'placedOnSwitch', 8, 8, 8, 8, 'unsuccessfulClimb', 'yes', 'test robot 8\r\n\r\n'),
(9, 0, 'no', 'placedOnSwitch', 9, 9, 9, 9, 'parked', 'yes', 'test robot 9'),
(10, 0, 'yes', 'placedOnScale', 10, 10, 10, 10, 'unsuccessfulClimb', 'no', 'test robot 10'),
(11, 0, 'no', 'didNotPlace', 11, 11, 11, 11, 'didNotTry', 'no', 'test robot 11');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teamNumber` int(11) NOT NULL,
  `teamName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `confirmPassword` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstName`, `lastName`, `password`, `confirmPassword`, `email`) VALUES
('apple', 'good', 'company', 'apple', 'apple', 'apple@apple.com'),
('bob', 'bob', 'bob', 'bob', 'bob', 'bob'),
('bobjoe', 'bob', 'joe', 'bobjoe', 'bobjoe', 'bobjoe@mail.com'),
('horse', 'an', 'animal', 'horse', 'horse', 'horse@horse.horse'),
('jimbob', 'jim', 'bob', 'jimbob', 'jimbob', 'jimbob@mail.com'),
('potato', 'potato', 'potato', 'potato', 'potato', 'potato@potato'),
('ricefarmer', 'Branden', 'Yang', 'password', 'password', 'yang.branden@gmail.com'),
('test', 'test', 'test', 'test', 'test', 'test'),
('username', 'firstname', 'lastname', 'password', 'password', 'email@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`robotNumber`,`matchNumber`) USING BTREE;

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
