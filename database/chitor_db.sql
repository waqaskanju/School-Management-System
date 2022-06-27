-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2022 at 02:24 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chitor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_pno` int(11) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `employee_Fname` varchar(50) NOT NULL,
  `employee_designation` varchar(20) NOT NULL,
  `employee_mac` varchar(17) NOT NULL,
  `emmployee_mob` varchar(12) NOT NULL DEFAULT '03',
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `Serial_No` int(11) NOT NULL AUTO_INCREMENT,
  `Roll_No` int(11) NOT NULL,
  `English_Marks` int(11) NOT NULL DEFAULT '0',
  `Urdu_Marks` int(11) NOT NULL DEFAULT '0',
  `Maths_Marks` int(11) NOT NULL DEFAULT '0',
  `Science_Marks` int(11) NOT NULL DEFAULT '0',
  `Hpe_Marks` int(11) NOT NULL DEFAULT '0',
  `Nazira_Marks` int(11) NOT NULL DEFAULT '0',
  `History_Marks` int(11) NOT NULL DEFAULT '0',
  `Drawing_Marks` int(11) NOT NULL DEFAULT '0',
  `Islamyat_Marks` int(11) NOT NULL DEFAULT '0',
  `Computer_Marks` int(11) NOT NULL DEFAULT '0',
  `Arabic_Marks` int(11) NOT NULL DEFAULT '0',
  `Mutalia_Marks` int(11) NOT NULL DEFAULT '0',
  `Qirat_Marks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Serial_No`),
  UNIQUE KEY `forign` (`Roll_No`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`Serial_No`, `Roll_No`, `English_Marks`, `Urdu_Marks`, `Maths_Marks`, `Science_Marks`, `Hpe_Marks`, `Nazira_Marks`, `History_Marks`, `Drawing_Marks`, `Islamyat_Marks`, `Computer_Marks`, `Arabic_Marks`, `Mutalia_Marks`, `Qirat_Marks`) VALUES
(207, 300, 6, 5, 55, 5, 5, 54, 5, 56, 6, 58, 5, 65, 56),
(208, 85, 99, 88, 92, 99, 88, 99, 89, 33, 88, 40, 88, 33, 99);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `Serial_No` int(11) NOT NULL AUTO_INCREMENT,
  `Roll_No` int(11) NOT NULL,
  `Total_Marks` int(11) NOT NULL,
  PRIMARY KEY (`Serial_No`),
  UNIQUE KEY `po` (`Roll_No`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Serial_No`, `Roll_No`, `Total_Marks`) VALUES
(1, 85, 378);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `User_Id` int(11) NOT NULL,
  `User_Name` varchar(250) NOT NULL,
  `Class_Show` varchar(250) NOT NULL,
  `Class_Roll_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

DROP TABLE IF EXISTS `students_info`;
CREATE TABLE IF NOT EXISTS `students_info` (
  `Roll_No` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `FName` varchar(100) NOT NULL,
  `Mobile` varchar(12) NOT NULL DEFAULT '03',
  `School` varchar(200) NOT NULL DEFAULT 'GHSS CHITOR',
  `Class` enum('5th','6th A','6th B','7th','8th A','8th B','8th','10th A','10th B','9th A','9th B','6th','7th A','7th B','kg','1st','2nd','3rd','4th') NOT NULL,
  `Class_Position` varchar(20) DEFAULT NULL,
  `Year` year(4) NOT NULL,
  `Dob` date DEFAULT NULL,
  `Date_Admission` date DEFAULT NULL,
  `Mobile_No` varchar(14) DEFAULT NULL,
  `FCnic` int(15) DEFAULT NULL,
  `Form_B` varchar(15) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Roll_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_info`
--

INSERT INTO `students_info` (`Roll_No`, `Name`, `FName`, `Mobile`, `School`, `Class`, `Class_Position`, `Year`, `Dob`, `Date_Admission`, `Mobile_No`, `FCnic`, `Form_B`, `Status`) VALUES
(1, 'abc', 'def', '03', 'GHSS CHITOR', '5th', '7', 2022, '2022-06-01', '2022-06-30', '789', 456, '123', 1),
(22, 'khan', 'shahid', '03', 'GPS Kokrai', '4th', NULL, 2022, '2022-06-26', '2022-06-26', '03339494241', 3220, '100', 1),
(85, 'waqas', 'Khan', '03', 'GHSS Chitor', '4th', '1st out of 1', 2022, '2022-06-15', '2022-06-25', '03339494241', 15602, '1560359', 1),
(159, 'Azmat', 'Khan', '03', 'GHSS Chitor', '4th', NULL, 2022, '2022-06-04', '2022-06-19', '03333', 334, '03552', 1),
(275, 'dafs', 'adfas', '03', 'GHSS Chitor', '4th', NULL, 2022, '2022-06-27', '2022-06-26', '0333', 15601, '1562022', 1),
(295, 'dafs', 'adfas', '03', 'GHSS Chitor', '4th', NULL, 2022, '2022-06-27', '2022-06-26', '0333', 15601, '1562022', 1),
(300, 'khan', 'shah', '03', 'GPS Kokrai', '5th', NULL, 2022, '2022-06-09', '2022-06-26', '03', 3, '03333', 1),
(301, 'khan', 'azmat', '03', 'GHSS Chitor', '6th', NULL, 2022, '2022-06-26', '2022-06-09', '03', 3, '03', 1),
(789, 'waqas', 'Khan', '03', 'GHSS Chitor', '4th', NULL, 2022, '2022-06-15', '2022-06-25', '03339494241', 15602, '1560359', 1),
(8523, 'czxc', 'xcvxc', '03', 'GPS Kokrai', '4th', NULL, 2022, '2022-06-08', '2022-06-08', '033333', 3220, '03455', 1),
(2955858, 'hgh', 'gfg', '03', 'GHSS Chitor', '6th', NULL, 2022, '2022-06-15', '2022-06-16', '03', 3, '03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(30) NOT NULL,
  `subject_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_status`) VALUES
(1, 'English', 1),
(2, 'Urdu', 1),
(3, 'Maths', 1),
(4, 'Computer Science', 1),
(5, 'Islamyat', 1),
(8, 'Science', 1),
(6, 'History / Geography', 1),
(9, 'Qirat', 1),
(10, 'Arabi', 1),
(11, 'Drawing', 1),
(7, 'HPE', 1),
(13, 'Pashto', 1),
(14, 'Nazira', 1),
(12, 'Mutalia Quran', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tab_index`
--

DROP TABLE IF EXISTS `tab_index`;
CREATE TABLE IF NOT EXISTS `tab_index` (
  `id` int(11) NOT NULL,
  `English` int(11) NOT NULL,
  `Urdu` int(11) NOT NULL,
  `Maths` int(11) NOT NULL,
  `Hpe` int(11) NOT NULL,
  `Nazira` int(11) NOT NULL,
  `Science` int(11) NOT NULL,
  `Arabic` int(11) NOT NULL,
  `Islamyat` int(11) NOT NULL,
  `History` int(11) NOT NULL,
  `Computer` int(11) NOT NULL,
  `Mutalia` int(11) NOT NULL,
  `Qirat` int(11) NOT NULL,
  `Drawing` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_index`
--

INSERT INTO `tab_index` (`id`, `English`, `Urdu`, `Maths`, `Hpe`, `Nazira`, `Science`, `Arabic`, `Islamyat`, `History`, `Computer`, `Mutalia`, `Qirat`, `Drawing`) VALUES
(1, 13, 12, 11, 10, 7, 9, 8, 6, 5, 4, 3, 2, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `forkey` FOREIGN KEY (`Roll_No`) REFERENCES `students_info` (`Roll_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
