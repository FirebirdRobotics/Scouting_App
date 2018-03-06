-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2018 at 11:40 PM
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
  `placedCubeAuto` set('placedOnScale','placedOnSwitch','placedOnExchange','placedOnScaleAndSwitch','placedOnScaleAndExchange','placedOnSwitchAndExchange','placedOnAll','didNotPlace') DEFAULT NULL,
  `switch` int(100) DEFAULT NULL,
  `dropped` int(100) DEFAULT NULL,
  `scale` int(100) DEFAULT NULL,
  `cubeExchange` int(100) DEFAULT NULL,
  `attemptedClimb` set('successfulClimb','unsuccessfulClimb','parked','didNotTry') DEFAULT NULL,
  `carriedRobots` set('yes','no') DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
