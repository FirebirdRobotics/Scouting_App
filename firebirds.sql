-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2018 at 09:41 PM
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
(59, 'RamTech'),
(148, 'Robowranglers'),
(180, 'S.P.A.M'),
(254, 'The Cheesy Poofs'),
(294, 'Beach Cities Robotics'),
(359, 'Hawaiian Kids'),
(399, 'Eagle Robotics'),
(456, 'Siege Robotics'),
(585, 'Cyber Penguins'),
(957, 'SWARM'),
(973, 'Greybots'),
(980, 'ThunderBots'),
(1156, 'Under Control'),
(1261, 'Robo Lions'),
(1706, 'Ratchet Rockers'),
(1810, 'Jaguar Robotics'),
(1828, 'BoxerBots'),
(1902, 'Exploding Bacon'),
(1984, 'Jawas'),
(2096, 'RoboActive'),
(2283, 'Panteras'),
(2583, 'RoboWarriors'),
(2854, 'The Prototypes'),
(2974, 'Walton Robotics'),
(2976, 'Spartabots'),
(2990, 'Hotwire'),
(2992, 'The S. S. Prometheus'),
(3019, 'Firebirds'),
(3075, 'Ha-Dream Team'),
(3223, 'Robotics Of Central Kitsap'),
(3284, 'Camdenton LASER'),
(3339, 'BumbleB'),
(3397, 'Robolions'),
(3489, 'Category 5'),
(3495, 'MindCraft Robotics'),
(3506, 'YETI Robotics'),
(3711, 'Iron Mustang'),
(3970, 'Duncan Dynamics'),
(4400, 'CERBOTICS'),
(4733, 'Scarlett Robotics'),
(4775, 'Aztech Robotics'),
(5242, 'RoboCats'),
(5291, 'Emperius'),
(5414, 'Pearadox'),
(5496, 'Robo Knights'),
(5572, 'ROSBOTS'),
(5801, 'CTC Inspire'),
(5809, 'The Jesubots'),
(5839, 'Blue Whales'),
(5854, 'GLITCH'),
(6014, 'ARC'),
(6025, 'Adriot Androids'),
(6050, 'Wee Waa Bush Bots'),
(6060, 'Circuit Serpents'),
(6353, 'Zodiac'),
(6672, 'Fusion Corps'),
(6702, 'StingBots Santa Anita'),
(6705, 'WildCat 5e'),
(6803, 'HAI-Panda'),
(6885, 'The Pilots'),
(6907, 'The G.O.A.T'),
(6919, 'The Commodores'),
(7034, '2B Determined'),
(7039, 'âŒâ­•'),
(7140, 'OKSEF ROBOTICS'),
(7157, 'Î¼Botics'),
(7173, 'Iris Robotics'),
(7293, 'COTANAK ROBOTICS');

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
