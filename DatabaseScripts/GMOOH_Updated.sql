-- phpMyAdmin SQL Dump
-- version 4.3.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2016 at 04:01 AM
-- Server version: 5.5.41
-- PHP Version: 5.5.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jwhit159_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `GenEdChecksheet`
--

CREATE TABLE IF NOT EXISTS `GenEdChecksheet` (
  `CompID` int(11) NOT NULL,
  `SecID` int(11) NOT NULL,
  `PosID` int(11) NOT NULL,
  `Ends` int(11) NOT NULL,
  `Columns` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GenEdChecksheet`
--

INSERT INTO `GenEdChecksheet` (`CompID`, `SecID`, `PosID`, `Ends`, `Columns`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 1, 1),
(3, 1, 3, 1, 1),
(4, 1, 4, 1, 1),
(5, 2, 1, 1, 1),
(6, 2, 2, 1, 1),
(7, 2, 3, 1, 1),
(8, 2, 4, 1, 1),
(9, 2, 5, 1, 1),
(10, 4, 1, 2, 1),
(11, 4, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `GenEdPosition`
--

CREATE TABLE IF NOT EXISTS `GenEdPosition` (
  `SectionID` int(11) NOT NULL,
  `PosID` int(11) NOT NULL DEFAULT '0',
  `PosDesc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GenEdPosition`
--

INSERT INTO `GenEdPosition` (`SectionID`, `PosID`, `PosDesc`) VALUES
(1, 1, 'A.Oral Communication:'),
(1, 2, 'B.Written Communication:'),
(1, 3, 'C.Mathematics:'),
(1, 4, 'D.Wellness:'),
(2, 1, 'A.Natural Sciences:'),
(2, 2, 'B.Social Sciences:'),
(2, 3, 'C.Humanities:'),
(2, 4, 'D.Arts:'),
(2, 5, 'E.Free Elective:'),
(4, 1, '1. Natural Science with Lab:');

-- --------------------------------------------------------

--
-- Table structure for table `GenEdRestrictions`
--

CREATE TABLE IF NOT EXISTS `GenEdRestrictions` (
  `CompID` int(11) NOT NULL,
  `Dept` text NOT NULL,
  `ClassNo` int(11) DEFAULT NULL,
  `LowRange` int(11) DEFAULT NULL,
  `HighRange` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GenEdRestrictions`
--

INSERT INTO `GenEdRestrictions` (`CompID`, `Dept`, `ClassNo`, `LowRange`, `HighRange`) VALUES
(1, 'COM', NULL, 10, NULL),
(2, 'ENG', NULL, 23, 25),
(3, 'MAT', NULL, 17, NULL),
(4, 'HEA', NULL, NULL, NULL),
(6, 'PSY', NULL, NULL, NULL),
(7, 'ENG', NULL, NULL, NULL),
(7, 'ENG', NULL, NULL, NULL),
(5, 'AST', NULL, NULL, NULL),
(5, 'BIO', NULL, NULL, NULL),
(5, 'CHM', NULL, NULL, NULL),
(5, 'ENV', NULL, NULL, NULL),
(5, 'GEL', NULL, NULL, NULL),
(5, 'MAR', NULL, NULL, NULL),
(5, 'NSE', NULL, NULL, NULL),
(5, 'PHY', NULL, NULL, NULL),
(6, 'ANT', NULL, NULL, NULL),
(6, 'CRJ', NULL, NULL, NULL),
(6, 'ECO', NULL, NULL, NULL),
(6, 'HIS', NULL, NULL, NULL),
(6, 'INT', NULL, NULL, NULL),
(6, 'MCS', NULL, NULL, NULL),
(6, 'PSY', NULL, NULL, NULL),
(6, 'POL', NULL, NULL, NULL),
(6, 'SOC', NULL, NULL, NULL),
(6, 'SSE', NULL, NULL, NULL),
(6, 'SWK', NULL, NULL, NULL),
(7, 'ENG', NULL, NULL, NULL),
(7, 'HUM', NULL, NULL, NULL),
(7, 'PAG', NULL, NULL, NULL),
(7, 'PHI', NULL, NULL, NULL),
(7, 'WRI', NULL, NULL, NULL),
(7, 'WGS', NULL, NULL, NULL),
(7, 'Modern Language', NULL, NULL, NULL),
(8, 'ARC', NULL, NULL, NULL),
(8, 'ARH', NULL, NULL, NULL),
(8, 'ART', NULL, NULL, NULL),
(8, 'CDE', NULL, NULL, NULL),
(8, 'CDH', NULL, NULL, NULL),
(8, 'CFT', NULL, NULL, NULL),
(8, 'DAN', NULL, NULL, NULL),
(8, 'FAR', NULL, NULL, NULL),
(8, 'FAS', NULL, NULL, NULL),
(8, 'MUP', NULL, NULL, NULL),
(8, 'MUS', NULL, NULL, NULL),
(8, 'THE', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `GenEdSection`
--

CREATE TABLE IF NOT EXISTS `GenEdSection` (
  `SectionID` int(11) NOT NULL DEFAULT '0',
  `SectionDesc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GenEdSection`
--

INSERT INTO `GenEdSection` (`SectionID`, `SectionDesc`) VALUES
(1, 'I. UNIVERSITY CORE (12 credits)'),
(2, 'II. UNIVERSITY DISTRIBUTION (15 credits)'),
(3, 'III. COMPETENCIES ACROSS THE CURRICULUM'),
(4, 'IV. COLLEGE DISTRIBUTION (33 credits)');

-- --------------------------------------------------------

--
-- Table structure for table `GenEdSpecialRestrictions`
--

CREATE TABLE IF NOT EXISTS `GenEdSpecialRestrictions` (
  `CompID` int(11) NOT NULL,
  `Dept` text,
  `ClassNo` int(11) DEFAULT NULL,
  `ProgramID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GenEdSpecialRestrictions`
--

INSERT INTO `GenEdSpecialRestrictions` (`CompID`, `Dept`, `ClassNo`, `ProgramID`) VALUES
(3, 'MAT', 140, 1),
(7, 'WRI', 207, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Program`
--

CREATE TABLE IF NOT EXISTS `Program` (
  `ProgramID` int(11) NOT NULL,
  `ProgramTitle` text NOT NULL,
  `ProgramNo` text,
  `ProgramVersion` varchar(255) NOT NULL,
  `ProgramAbriv` varchar(500) DEFAULT NULL,
  `ProgramNotes` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Program`
--

INSERT INTO `Program` (`ProgramID`, `ProgramTitle`, `ProgramNo`, `ProgramVersion`, `ProgramAbriv`, `ProgramNotes`) VALUES
(1, 'BS Computer Science: Information Technology', 'ULASCSCIT', '2118', 'COMPUTER SCIENCE: IT', 'Consider taking a Minor in an Application Domain such as Math, Psychology, Sociology, Economics, Biology, or any Science\r\nConsider taking a second speech course in II E\r\nCSC-prefix courses below 125-level, CSC 280 and CSC 380 do not count toward the BS in Information Technology\r\nBefore taking any 300-level course a student must have completed 18 credit hours in CSC courses numbered 125 or above with a GPA of 2.25 in the CSC courses.'),
(2, 'BS Computer Science: Software Development', 'ULASCSCSD', '2118', 'COMPUTER SCIENCE: SD', 'Before taking any 300-level course a student must have completed 18 credit hours in CSC courses numbered 125 or above with a GPA of 2.25 in the CSC courses.\r\nStudents minoring in Math should take MAT 301\r\nCSC-prefix courses below 125-level, CSC\r\n130, CSC 280 and CSC 380 do not count\r\ntoward the BS in Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `ProgramChecksheet`
--

CREATE TABLE IF NOT EXISTS `ProgramChecksheet` (
  `ClassID` int(11) NOT NULL,
  `PrgCompID` int(11) NOT NULL,
  `PrgColumn` int(11) NOT NULL,
  `PrgSection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProgramChecksheet`
--

INSERT INTO `ProgramChecksheet` (`ClassID`, `PrgCompID`, `PrgColumn`, `PrgSection`) VALUES
(1, 1, 1, 1),
(1, 2, 1, 1),
(2, 1, 1, 1),
(2, 2, 1, 1),
(3, 1, 1, 1),
(4, 1, 1, 1),
(5, 1, 1, 2),
(6, 1, 1, 6),
(100, 1, 2, 1),
(101, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ProgramColumn`
--

CREATE TABLE IF NOT EXISTS `ProgramColumn` (
  `PrgColumn` int(11) NOT NULL,
  `PrgCompID` int(11) NOT NULL,
  `PrgColumnDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProgramColumn`
--

INSERT INTO `ProgramColumn` (`PrgColumn`, `PrgCompID`, `PrgColumnDesc`) VALUES
(1, 1, 'B. Major Program: 57 sh'),
(2, 1, 'C. Concomitant Courses: 3 sh'),
(1, 2, 'B. Major Program: 51 sh'),
(2, 2, 'C. Concomitant Courses: 9 sh');

-- --------------------------------------------------------

--
-- Table structure for table `ProgramComp`
--

CREATE TABLE IF NOT EXISTS `ProgramComp` (
  `PrgCompID` int(11) NOT NULL,
  `ProgramID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProgramComp`
--

INSERT INTO `ProgramComp` (`PrgCompID`, `ProgramID`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ProgramSection`
--

CREATE TABLE IF NOT EXISTS `ProgramSection` (
  `PrgSection` int(11) NOT NULL,
  `PrgCompID` int(11) NOT NULL,
  `PrgColumn` int(11) NOT NULL,
  `PrgSectionDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProgramSection`
--

INSERT INTO `ProgramSection` (`PrgSection`, `PrgCompID`, `PrgColumn`, `PrgSectionDesc`) VALUES
(1, 1, 1, '1. Required Courses: 33 sh'),
(2, 1, 1, '2. Elective Courses: 15-24 sh'),
(3, 1, 1, '3. Elective Courses: 0-9 sh'),
(1, 1, 2, '1. Required Courses: 3 sh'),
(2, 1, 2, '2. Internship – optional (free elective)'),
(1, 2, 1, '1. Required Courses: 33 sh'),
(2, 2, 1, '2. Elective Courses: 18 sh (no more than two 200-\r\nlevel)'),
(1, 2, 2, '1. Required Courses: 9 sh '),
(2, 2, 2, '2. Internship – optional (free elective) ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `GenEdChecksheet`
--
ALTER TABLE `GenEdChecksheet`
  ADD PRIMARY KEY (`CompID`);

--
-- Indexes for table `GenEdPosition`
--
ALTER TABLE `GenEdPosition`
  ADD PRIMARY KEY (`SectionID`,`PosID`);

--
-- Indexes for table `GenEdSection`
--
ALTER TABLE `GenEdSection`
  ADD PRIMARY KEY (`SectionID`);

--
-- Indexes for table `GenEdSpecialRestrictions`
--
ALTER TABLE `GenEdSpecialRestrictions`
  ADD PRIMARY KEY (`ProgramID`,`CompID`);

--
-- Indexes for table `Program`
--
ALTER TABLE `Program`
  ADD PRIMARY KEY (`ProgramID`);

--
-- Indexes for table `ProgramChecksheet`
--
ALTER TABLE `ProgramChecksheet`
  ADD PRIMARY KEY (`ClassID`,`PrgCompID`);

--
-- Indexes for table `ProgramColumn`
--
ALTER TABLE `ProgramColumn`
  ADD PRIMARY KEY (`PrgCompID`,`PrgColumn`);

--
-- Indexes for table `ProgramComp`
--
ALTER TABLE `ProgramComp`
  ADD PRIMARY KEY (`PrgCompID`);

--
-- Indexes for table `ProgramSection`
--
ALTER TABLE `ProgramSection`
  ADD PRIMARY KEY (`PrgCompID`,`PrgColumn`,`PrgSection`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `GenEdChecksheet`
--
ALTER TABLE `GenEdChecksheet`
  MODIFY `CompID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `Program`
--
ALTER TABLE `Program`
  MODIFY `ProgramID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ProgramComp`
--
ALTER TABLE `ProgramComp`
  MODIFY `PrgCompID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
