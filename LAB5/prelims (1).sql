-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 08:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prelims`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradesID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `gradeValue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gradesID`, `studentID`, `gradeValue`) VALUES
(1, 1, 80),
(2, 2, 95),
(3, 3, 85),
(4, 4, 70),
(5, 5, 88),
(6, 6, 92),
(7, 7, 93),
(8, 8, 72),
(9, 9, 69),
(10, 10, 99);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(2500) NOT NULL,
  `year` varchar(200) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `firstName`, `lastName`, `age`, `address`, `year`, `teacherID`) VALUES
(1, 'Melanie', 'Bond', 25, '1402 Hott Street', '2nd year', 2),
(2, 'Justine', 'Avery', 23, '1030 Chenoweth Drive', '2nd year', 2),
(3, 'Dominic', 'Ice', 23, '278 Custer Street', '2nd year', 2),
(4, 'Charles', 'Johnston', 21, 'Midway Ohio', '3rd year', 3),
(5, 'Dylan', 'King', 23, '278 Custer Street', '2nd year', 2),
(6, 'Mohammad', 'Middleton', 21, 'Cherrybruise Street', '3rd year', 3),
(7, 'Leonard', 'Martin', 23, '2575 Owagner Lane', '1st year', 1),
(8, 'Lucas', 'Hart', 23, '3935 Horizon Circle', '1st year', 1),
(9, 'Christopher', 'Edmunds', 21, '1140 Tennessee Avenue', '1st year', 1),
(10, 'Rebecca', 'Campbell', 23, '4058 Gateway Road', '3rd year', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `teacherName`) VALUES
(1, 'Ruth Mackenzie'),
(2, 'Stewart Mitchell'),
(3, 'Trevor Newman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradesID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `studentID_2` (`studentID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `studentName` (`studentID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
