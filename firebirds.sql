-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2018 at 10:38 PM
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
-- Table structure for table `pitrobots`
--

CREATE TABLE `pitrobots` (
  `robotNumber` int(11) NOT NULL,
  `botAbility` varchar(20) DEFAULT NULL,
  `gameStrategy` varchar(20) DEFAULT NULL,
  `botClimber` varchar(20) DEFAULT NULL,
  `robotWeight` varchar(20) DEFAULT NULL,
  `centerOfMass` varchar(20) DEFAULT NULL,
  `driveTrain` varchar(20) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `robots`
--

CREATE TABLE `robots` (
  `robotNumber` int(11) NOT NULL,
  `matchNumber` varchar(10) NOT NULL,
  `startedWithCube` set('yes','no') DEFAULT NULL,
  `crossedBaseline` set('yes','no') DEFAULT NULL,
  `placedCubeAuto` set('placedOnScale','placedOnSwitch','placedOnExchange','placedOnScaleAndSwitch','placedOnScaleAndExchange','placedOnSwitchAndExchange','placedOnAll','didNotPlace') DEFAULT NULL,
  `switch` int(100) DEFAULT NULL,
  `dropped` int(100) DEFAULT NULL,
  `scale` int(100) DEFAULT NULL,
  `cubeExchange` int(100) DEFAULT NULL,
  `attemptedClimb` set('successfulClimb','unsuccessfulClimb','parked','didNotTry') DEFAULT NULL,
  `carriedRobots` set('yes','no') DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `user` varchar(20) NOT NULL,
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

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamNumber`, `teamName`) VALUES
(498, 'The Cobra Commanders'),
(698, 'Hamilton Microbots'),
(991, 'BroncoBotics'),
(1165, 'Team Paradise'),
(1212, 'Sentinels'),
(1290, 'Robowolves'),
(1492, 'Team CAUTION'),
(1633, 'RoboBuffs'),
(1726, 'N.E.R.D.S. (Nifty Engineering Robotics Design Squad)'),
(2375, 'Dragon Robotics'),
(2403, 'Plasma Robotics'),
(2449, 'Out of Orbit Robotics'),
(2478, 'Westwood Robotics'),
(2647, 'Cyborg Mustangs'),
(2662, 'Robo Krew'),
(2840, 'Blue Tide'),
(2844, 'Stampede Robotics'),
(3019, 'Firebirds'),
(3133, 'Coronado Robotics'),
(3187, 'Arcadia Titan Robotics'),
(3853, 'Pridetronics'),
(3944, 'All Knights'),
(4111, 'Some Assembly Required'),
(4146, 'Sabercats'),
(4496, 'Sonoran Storm Robotics'),
(4565, 'Coyotes'),
(5200, 'Alchesay Falcon'),
(5465, 'Binary Bots'),
(5613, 'ThunderDogs'),
(6314, 'DM Robotics (Wolf Pack)'),
(6352, 'LAUNCH TEAM'),
(6372, 'Chi-squared Robotics'),
(6413, 'Degrees of Freedom'),
(6479, 'AzTech'),
(6674, 'MIT Iron Eagles'),
(6683, 'The ROAR-Botics'),
(6748, 'MustangRobotics'),
(6833, 'Phoenix Coding Academy Pythons'),
(6871, 'QC DogSquad'),
(6922, 'Apache Genesis'),
(7017, 'Fellowship of the Gear'),
(7214, 'Tiger-Ops Robotics');

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
('185643', 'Ben', 'Schnip', '08202001', '08202001', 'benschnieper@gmail.com'),
('199753', 'Jackson', 'Smith', '04252003', '04252003', 'Jsmith53@susdgapps.org'),
('a', 'a', 'a', 'a', 'a', 'hgoldschmidt57@susdgapps.org'),
('altneu ', 'Theo', 'Altneu', 'idonttrustyang', 'idonttrustyang', 'taltneu@icloud.com'),
('Asha', 'Asha', 'Ramaswamy', '08102003', '08102003', 'Ashaaaz10@gmail.com'),
('ASharkey', 'Amanda', 'Sharkey', 'pandashark', 'pandashark', 'aroseshark@gmail.com '),
('avaclaire', 'Ava Claire', 'Lariego', '07062003', '07062003', 'alariego46@susdgapps.org'),
('Clay', 'Clayton', 'Petersen', 'mrmejr10', 'mrmejr10', 'claypete45@gmail.com'),
('DShark', 'Danielle', 'Sharkey', 'happyaye88', 'happyaye88', 'Dsharkey94@susdgapps.org'),
('Firebirdster', 'Martin ', 'Hussey', '1-JohnDoe', '1-JohnDoe', 'Jrbrilliant@yahoo.com '),
('Jaym', 'Jay', 'Macintyre', 'Ginsam11', 'Ginsam11', 'jaym1231@gmail.com'),
('JdHenry', 'JD', 'Henry', 'Asdfghjkl1234', 'Asdfghjkl1234', 'jd.henry097@gmail.com '),
('KindaWorks', 'Adnaan', 'Ali', 'aonla@786', 'aonla@786', 'adnaan.kool@gmail.com'),
('LauraHeinzen', 'Laura', 'Heinzen', '10082002', '10082002', 'Laura.heinzen12@gmail.com'),
('Lexi24', 'Lexi', 'Brister', 'JunoBuno24', 'JunoBuno24', 'alexandra7234@hotmail.com'),
('Matthew', 'Matthew', 'Schwartz', '02052003', '02052003', 'Mattmaxaz@gmail.com'),
('msharkey', 'Mike', 'Sharkey', '3019', '3019', 'mike@sharkey.com'),
('Pokemon', 'Elliot', 'Teitel ', 'Oldman123', 'Oldman123', 'emteitel@gmail.com'),
('ricefarmer', 'Branden', 'Yang', 'TS25692ts', 'TS25692ts', 'yang.branden@gmail.com'),
('sirikops', 'Siri ', 'Kopparapu', 'sukibuki', 'sukibuki', 'sirikops@hotmail.com'),
('Sophie Wallace', 'Sophie', 'Wallace', '12182002', '12182002', 'sophie.wallace@cox.net'),
('surajkops', 'Suraj', 'Kopparapu', 'Smlysun2', 'Smlysun2', 'surajkops@hotmail.com'),
('Vak_269', 'Vak', 'Klein', 'Butter1234', 'Butter1234', 'Vaughnklein533@gmail.com'),
('Yola', 'Sid', 'The Science Kid', 'ratata', 'ratata', 'siddhantsaxena@hotmail.com'),
('zod', 'Steve', 'Jones', 'chones', 'chones', 'allsystemsgo19@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pitrobots`
--
ALTER TABLE `pitrobots`
  ADD PRIMARY KEY (`robotNumber`);

--
-- Indexes for table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`robotNumber`,`matchNumber`);

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
