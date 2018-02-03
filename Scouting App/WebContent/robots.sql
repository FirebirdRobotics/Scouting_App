-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2018 at 10:38 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
-- Indexes for dumped tables
--

--
-- Indexes for table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`robotNumber`);
