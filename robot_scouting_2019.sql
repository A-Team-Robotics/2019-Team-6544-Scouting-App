-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 01:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `robot_scouting_2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_info`
--

CREATE TABLE `auto_info` (
  `id` int(12) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `canCollectHatch` enum('Yes','No','','') NOT NULL,
  `canCollectCargo` enum('Yes','No','','') NOT NULL,
  `extraInformation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(12) NOT NULL,
  `matchNumber` int(12) NOT NULL,
  `blueTeam1` int(12) NOT NULL,
  `blueTeam2` int(12) NOT NULL,
  `blueTeam3` int(12) NOT NULL,
  `redTeam1` int(12) NOT NULL,
  `redTeam2` int(12) NOT NULL,
  `redTeam3` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `match_scout`
--

CREATE TABLE `match_scout` (
  `id` int(12) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `matchNumber` int(12) NOT NULL,
  `startLocation` enum('L1','L2','L3','Unknown') NOT NULL,
  `climb` enum('Yes','No','','') NOT NULL,
  `climbLevel` enum('L1','L2','L3','No') NOT NULL,
  `climbFail` enum('Yes','No','','') NOT NULL,
  `climbFailLevel` enum('L1','L2','L3','No') NOT NULL,
  `yellowCard` varchar(255) NOT NULL,
  `redCard` varchar(255) NOT NULL,
  `foul` varchar(255) NOT NULL,
  `defense` enum('Not Defensive','Somewhat Defensive','Very Defensive','') NOT NULL,
  `fallover` enum('Yes','No','','') NOT NULL,
  `falloverSave` enum('Yes','No','','') NOT NULL,
  `win` enum('Yes','No','','') NOT NULL,
  `extraInformation` varchar(255) NOT NULL,
  `score` int(12) NOT NULL,
  `user` varchar(255) NOT NULL,
  `scouter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `match_scout_1`
--

CREATE TABLE `match_scout_1` (
  `id` int(12) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `matchNumber` int(12) NOT NULL,
  `autoHatchRocketsSuccess1` int(12) NOT NULL,
  `autoHatchRocketsSuccess2` int(12) NOT NULL,
  `autoHatchRocketsSuccess3` int(12) NOT NULL,
  `autoCargoRocketsSuccess1` int(12) NOT NULL,
  `autoCargoRocketsSuccess2` int(12) NOT NULL,
  `autoCargoRocketsSuccess3` int(12) NOT NULL,
  `autoHatchRocketsFail1` int(12) NOT NULL,
  `autoHatchRocketsFail2` int(12) NOT NULL,
  `autoHatchRocketsFail3` int(12) NOT NULL,
  `autoCargoRocketsFail1` int(12) NOT NULL,
  `autoCargoRocketsFail2` int(12) NOT NULL,
  `autoCargoRocketsFail3` int(12) NOT NULL,
  `score` int(12) NOT NULL,
  `user` varchar(255) NOT NULL,
  `scouter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `match_scout_2`
--

CREATE TABLE `match_scout_2` (
  `id` int(12) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `matchNumber` int(12) NOT NULL,
  `autoHatchShipSuccess1` int(12) NOT NULL,
  `autoHatchShipSuccess2` int(12) NOT NULL,
  `autoHatchShipSuccess3` int(12) NOT NULL,
  `autoCargoShipSuccess1` int(12) NOT NULL,
  `autoCargoShipSuccess2` int(12) NOT NULL,
  `autoCargoShipSuccess3` int(12) NOT NULL,
  `autoHatchShipFail1` int(12) NOT NULL,
  `autoHatchShipFail2` int(12) NOT NULL,
  `autoHatchShipFail3` int(12) NOT NULL,
  `autoCargoShipFail1` int(12) NOT NULL,
  `autoCargoShipFail2` int(12) NOT NULL,
  `autoCargoShipFail3` int(12) NOT NULL,
  `score` int(12) NOT NULL,
  `user` varchar(255) NOT NULL,
  `scouter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `match_scout_3`
--

CREATE TABLE `match_scout_3` (
  `id` int(12) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `matchNumber` int(12) NOT NULL,
  `teleopHatchRocketsSuccess1` int(12) NOT NULL,
  `teleopHatchRocketsSuccess2` int(12) NOT NULL,
  `teleopHatchRocketsSuccess3` int(12) NOT NULL,
  `teleopCargoRocketsSuccess1` int(12) NOT NULL,
  `teleopCargoRocketsSuccess2` int(12) NOT NULL,
  `teleopCargoRocketsSuccess3` int(12) NOT NULL,
  `teleopHatchRocketsFail1` int(12) NOT NULL,
  `teleopHatchRocketsFail2` int(12) NOT NULL,
  `teleopHatchRocketsFail3` int(12) NOT NULL,
  `teleopCargoRocketsFail1` int(12) NOT NULL,
  `teleopCargoRocketsFail2` int(12) NOT NULL,
  `teleopCargoRocketsFail3` int(12) NOT NULL,
  `score` int(12) NOT NULL,
  `user` varchar(255) NOT NULL,
  `scouter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `match_scout_4`
--

CREATE TABLE `match_scout_4` (
  `id` int(12) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `matchNumber` int(12) NOT NULL,
  `teleopHatchShipSuccess1` int(12) NOT NULL,
  `teleopHatchShipSuccess2` int(12) NOT NULL,
  `teleopHatchShipSuccess3` int(12) NOT NULL,
  `teleopCargoShipSuccess1` int(12) NOT NULL,
  `teleopCargoShipSuccess2` int(12) NOT NULL,
  `teleopCargoShipSuccess3` int(12) NOT NULL,
  `teleopHatchShipFail1` int(12) NOT NULL,
  `teleopHatchShipFail2` int(12) NOT NULL,
  `teleopHatchShipFail3` int(12) NOT NULL,
  `teleopCargoShipFail1` int(12) NOT NULL,
  `teleopCargoShipFail2` int(12) NOT NULL,
  `teleopCargoShipFail3` int(12) NOT NULL,
  `score` int(12) NOT NULL,
  `user` varchar(255) NOT NULL,
  `scouter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `robot_info`
--

CREATE TABLE `robot_info` (
  `id` int(12) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `speedMPS` int(12) NOT NULL,
  `weightP` int(12) NOT NULL,
  `strength` enum('Very Weak','Weak','Strong','Very Strong') NOT NULL,
  `numWheels` int(12) NOT NULL,
  `omniWheels` enum('Yes','No','','') NOT NULL,
  `canPlaceHatch2` enum('Yes','No','','') NOT NULL,
  `canPlaceHatch3` enum('Yes','No','','') NOT NULL,
  `canPlaceCargo2` enum('Yes','No','','') NOT NULL,
  `canPlaceCargo3` enum('Yes','No','','') NOT NULL,
  `canPickUpHatch` enum('Yes','No','','') NOT NULL,
  `speedPickUp` enum('Very Slow','Slow','Fast','Very Fast','No') NOT NULL,
  `canClimb2` enum('Yes','No','','') NOT NULL,
  `canClimb3` enum('Yes','No','','') NOT NULL,
  `extraInformation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team_info`
--

CREATE TABLE `team_info` (
  `id` int(12) NOT NULL,
  `teamName` varchar(255) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `teamSchoolName` varchar(255) NOT NULL,
  `teamEmail` varchar(255) NOT NULL,
  `teamAge` varchar(255) NOT NULL,
  `teamLocation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teleop_info`
--

CREATE TABLE `teleop_info` (
  `id` int(12) NOT NULL,
  `teamNumber` int(12) NOT NULL,
  `averageNumHatches` int(12) NOT NULL,
  `averageNumCargo` int(12) NOT NULL,
  `speedClimb2` int(12) NOT NULL,
  `speedClimb3` int(12) NOT NULL,
  `extraInformation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_info`
--
ALTER TABLE `auto_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_scout`
--
ALTER TABLE `match_scout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_scout_1`
--
ALTER TABLE `match_scout_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_scout_2`
--
ALTER TABLE `match_scout_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_scout_3`
--
ALTER TABLE `match_scout_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_scout_4`
--
ALTER TABLE `match_scout_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `robot_info`
--
ALTER TABLE `robot_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_info`
--
ALTER TABLE `team_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teleop_info`
--
ALTER TABLE `teleop_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_info`
--
ALTER TABLE `auto_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1321;

--
-- AUTO_INCREMENT for table `match_scout`
--
ALTER TABLE `match_scout`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `match_scout_1`
--
ALTER TABLE `match_scout_1`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `match_scout_2`
--
ALTER TABLE `match_scout_2`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `match_scout_3`
--
ALTER TABLE `match_scout_3`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `match_scout_4`
--
ALTER TABLE `match_scout_4`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `robot_info`
--
ALTER TABLE `robot_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_info`
--
ALTER TABLE `team_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teleop_info`
--
ALTER TABLE `teleop_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
