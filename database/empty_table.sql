-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 09:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empty_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_subjects`
--

CREATE TABLE `class_subjects` (
  `Id` int(11) NOT NULL,
  `School_Id` int(11) DEFAULT NULL,
  `Class_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Lock_Status` int(1) NOT NULL DEFAULT 0,
  `Total_Marks` int(3) NOT NULL DEFAULT 40,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Id` int(2) NOT NULL,
  `Personal_No` int(11) DEFAULT NULL,
  `Name` varchar(30) NOT NULL,
  `Father_Name` varchar(30) DEFAULT NULL,
  `Designation` varchar(20) DEFAULT NULL,
  `Mac_Address` varchar(17) DEFAULT NULL,
  `Mobile_No` varchar(12) DEFAULT NULL,
  `Status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Id`, `Personal_No`, `Name`, `Father_Name`, `Designation`, `Mac_Address`, `Mobile_No`, `Status`) VALUES
(1, NULL, 'Guest', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_committee`
--

CREATE TABLE `exam_committee` (
  `Id` int(11) NOT NULL,
  `Member_Id` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_msgs`
--

CREATE TABLE `header_msgs` (
  `Id` int(11) NOT NULL,
  `Msg` varchar(700) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header_msgs`
--

INSERT INTO `header_msgs` (`Id`, `Msg`, `Status`) VALUES
(1, 'GHSS Chitor', 1),
(2, 'Government Higher Secondary School', 1),
(3, 'Chitor Swat', 1),
(4, 'Final Term Exam', 1),
(5, 'Final Term Exam', 1),
(6, 'Final Exam', 1),
(7, 'Exam', 1),
(8, 'Slip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Employee_Id` int(11) NOT NULL,
  `User_Name` varchar(30) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Employee_Id`, `User_Name`, `Password`, `Status`) VALUES
(1, 1, 'Guest', '25f9e794323b453885f5181f1b624d0b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `Serial_No` int(11) NOT NULL,
  `Roll_No` int(11) NOT NULL,
  `English_Marks` int(3) NOT NULL DEFAULT 0,
  `Urdu_Marks` int(3) NOT NULL DEFAULT 0,
  `Maths_Marks` int(3) NOT NULL DEFAULT 0,
  `Science_Marks` int(3) NOT NULL DEFAULT 0,
  `Hpe_Marks` int(3) NOT NULL DEFAULT 0,
  `Nazira_Marks` int(3) NOT NULL DEFAULT 0,
  `History_Marks` int(3) NOT NULL DEFAULT 0,
  `Drawing_Marks` int(3) NOT NULL DEFAULT 0,
  `Islamyat_Marks` int(3) NOT NULL DEFAULT 0,
  `Computer_Marks` int(3) NOT NULL DEFAULT 0,
  `Arabic_Marks` int(3) NOT NULL DEFAULT 0,
  `Mutalia_Marks` int(3) NOT NULL DEFAULT 0,
  `Qirat_Marks` int(3) NOT NULL DEFAULT 0,
  `Pashto_Marks` int(3) NOT NULL DEFAULT 0,
  `Social_Marks` int(3) NOT NULL DEFAULT 0,
  `Biology_Marks` int(3) NOT NULL DEFAULT 0,
  `Chemistry_Marks` int(3) NOT NULL DEFAULT 0,
  `Physics_Marks` int(3) NOT NULL DEFAULT 0,
  `Civics_Marks` int(3) NOT NULL DEFAULT 0,
  `Economics_Marks` int(3) NOT NULL DEFAULT 0,
  `Islamic_Study_Marks` int(3) NOT NULL DEFAULT 0,
  `Islamic_Education_Marks` int(3) NOT NULL DEFAULT 0,
  `Statistics_Marks` int(3) NOT NULL DEFAULT 0
  `Geography_Marks` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Serial_No` int(11) NOT NULL,
  `Roll_No` int(11) NOT NULL,
  `Total_Marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`Id`, `Name`, `Status`) VALUES
(1, 'GHSS Chitor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_classes`
--

CREATE TABLE `school_classes` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `School_Id` int(2) NOT NULL,
  `Pass_Percentage` float NOT NULL DEFAULT 0,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `school_classes`
--

INSERT INTO `school_classes` (`Id`, `Name`, `School_Id`, `Pass_Percentage`, `Status`) VALUES
(1, '6th', 1, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `User_Id` int(11) NOT NULL,
  `Selected_School_Id` int(11) NOT NULL DEFAULT 1,
  `Selected_Class_Id` int(11) NOT NULL DEFAULT 1,
  `Student_Changes` int(1) NOT NULL DEFAULT 0,
  `Batch_Marks_Changes` int(1) NOT NULL DEFAULT 0,
  `Single_Marks_Changes` int(1) NOT NULL DEFAULT 0,
  `Subject_Changes` int(1) NOT NULL DEFAULT 0,
  `School_Changes` int(1) NOT NULL DEFAULT 0,
  `Marks_Lock_Changes` int(1) NOT NULL DEFAULT 0,
  `Permission_Changes` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`User_Id`, `Selected_School_Id`, `Selected_Class_Id`, `Student_Changes`, `Batch_Marks_Changes`, `Single_Marks_Changes`, `Subject_Changes`, `School_Changes`, `Marks_Lock_Changes`, `Permission_Changes`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE `students_info` (
  `Roll_No` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `Dob` date DEFAULT NULL,
  `Mobile_No` varchar(12) NOT NULL DEFAULT '03',
  `Admission_Date` date DEFAULT NULL,
  `Admission_No` int(6) DEFAULT NULL,
  `Admission_No_High` int(6) DEFAULT 0,
  `Father_Cnic` varchar(15) DEFAULT NULL,
  `Student_Form_B` varchar(15) DEFAULT NULL,
  `School` varchar(30) NOT NULL DEFAULT 'GHSS CHITOR',
  `Class` enum('5th','6th A','6th B','7th','8th A','8th B','8th','10th A','10th B','9th A','9th B','6th','7th A','7th B','4th','11th','8th C','8th M','8th S','7th F','6th F','6th P','5th K','5th C') NOT NULL,
  `Class_Position` varchar(20) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Class_No` int(3) DEFAULT NULL,
  `Graduation_Year` year(4) NOT NULL DEFAULT 0000,
  `Address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `Id` int(11) NOT NULL,
  `Class_Subject_Id` int(11) NOT NULL,
  `Teacher_Id` int(11) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_index`
--

CREATE TABLE `tab_index` (
  `Tab_index_id` int(11) NOT NULL,
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
  `Drawing` int(11) NOT NULL,
  `Social` int(2) NOT NULL DEFAULT 0,
  `Pashto` int(2) NOT NULL DEFAULT 0,
  `Biology` int(2) NOT NULL,
  `Chemistry` int(2) NOT NULL,
  `Physics` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `uqSchool_Class_Subject` (`School_Id`,`Class_Id`,`Subject_Id`),
  ADD KEY `class_id_reference` (`Class_Id`),
  ADD KEY `subject_id_reference` (`Subject_Id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `exam_committee`
--
ALTER TABLE `exam_committee`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `unique` (`Member_Id`);

--
-- Indexes for table `header_msgs`
--
ALTER TABLE `header_msgs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`User_Name`),
  ADD KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`Serial_No`),
  ADD UNIQUE KEY `forign` (`Roll_No`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Serial_No`),
  ADD UNIQUE KEY `po` (`Roll_No`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `unique_index` (`Name`,`School_Id`),
  ADD KEY `school_id` (`School_Id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `selected_school` (`Selected_School_Id`),
  ADD KEY `selected_class` (`Selected_Class_Id`);

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`Roll_No`),
  ADD UNIQUE KEY `uniqe_adm` (`Admission_No`),
  ADD UNIQUE KEY `High_Admission_No` (`Admission_No_High`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Class_Subject_Id` (`Class_Subject_Id`),
  ADD KEY `class_subject` (`Class_Subject_Id`),
  ADD KEY `subject_teacher` (`Teacher_Id`);

--
-- Indexes for table `tab_index`
--
ALTER TABLE `tab_index`
  ADD PRIMARY KEY (`Tab_index_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_subjects`
--
ALTER TABLE `class_subjects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_msgs`
--
ALTER TABLE `header_msgs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `Serial_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `Serial_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_classes`
--
ALTER TABLE `school_classes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_index`
--
ALTER TABLE `tab_index`
  MODIFY `Tab_index_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_subjects`
--
ALTER TABLE `class_subjects`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`Class_Id`) REFERENCES `school_classes` (`Id`),
  ADD CONSTRAINT `class_subjects_ibfk_1` FOREIGN KEY (`School_Id`) REFERENCES `schools` (`Id`),
  ADD CONSTRAINT `subject_id` FOREIGN KEY (`Subject_Id`) REFERENCES `subjects` (`Id`);

--
-- Constraints for table `exam_committee`
--
ALTER TABLE `exam_committee`
  ADD CONSTRAINT `member_id` FOREIGN KEY (`Member_Id`) REFERENCES `employees` (`Id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `emp_id` FOREIGN KEY (`Employee_Id`) REFERENCES `employees` (`Id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `forkey` FOREIGN KEY (`Roll_No`) REFERENCES `students_info` (`Roll_No`);

--
-- Constraints for table `school_classes`
--
ALTER TABLE `school_classes`
  ADD CONSTRAINT `school_id` FOREIGN KEY (`School_Id`) REFERENCES `schools` (`Id`);

--
-- Constraints for table `setting`
--
ALTER TABLE `setting`
  ADD CONSTRAINT `selected_class` FOREIGN KEY (`Selected_Class_Id`) REFERENCES `school_classes` (`Id`),
  ADD CONSTRAINT `selected_school` FOREIGN KEY (`Selected_School_Id`) REFERENCES `schools` (`Id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`User_Id`) REFERENCES `employees` (`Id`);

--
-- Constraints for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `class_subject_fk` FOREIGN KEY (`Class_Subject_Id`) REFERENCES `class_subjects` (`Id`),
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`Teacher_Id`) REFERENCES `employees` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
