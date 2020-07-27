-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2020 at 09:49 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'admin', '1-7-2020 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  KEY `doctorId` (`doctorId`),
  KEY `doctorSpecialization` (`doctorSpecialization`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(6, 'General Physician', 1, 1, 700, '2020-07-30', '5:00 PM', '2020-07-03 13:57:21', 1, 0, '2020-07-03 14:08:17'),
(7, 'Dermatologist', 3, 1, 1700, '2020-07-29', '5:00 PM', '2020-07-03 14:01:19', 0, 1, '2020-07-03 14:01:48'),
(8, 'Dentist', 4, 1, 9000, '2020-07-31', '10:00 AM', '2020-07-04 13:48:08', 1, 1, NULL),
(9, 'General Physician', 1, 1, 700, '2020-07-31', '6:00 PM', '2020-07-04 15:04:57', 1, 1, NULL),
(10, 'Dentist', 4, 1, 9000, '2020-07-24', '12:15 AM', '2020-07-08 21:14:30', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'General Physician', 'Elias Afara', 'tyr, jal el baher', '700', 78895320, 'ena001@pu.edu.lb', 'e10adc3949ba59abbe56e057f20f883e', '2020-07-02 21:38:34', '2020-07-07 03:52:04'),
(2, 'Homeopath', 'Hassan Abdallah', 'Qana', '1200', 78421365, 'hass@email.com', '2e6028d56bfdbc725bb08c247cce60d0', '2020-07-02 21:43:47', NULL),
(3, 'Dermatologist', 'Mohamad Hijazi', 'Al Hosh', '1700', 78456932, 'hijaz@email.com', '2e6028d56bfdbc725bb08c247cce60d0', '2020-07-02 21:44:49', NULL),
(4, 'Dentist', 'Yu Mi', 'China', '9000', 2642412684126, 'yumi@gmail.com', '2e6028d56bfdbc725bb08c247cce60d0', '2020-07-04 12:45:31', NULL),
(5, 'Dermatologist', 'Hassan Abdallahfedeeeeeee', 'jal el baher', '44444444', 4444444444444444444, 'lsss@email.com', '755f85c2723bb39381c7379a604160d8', '2020-07-07 11:28:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

DROP TABLE IF EXISTS `doctorspecilization`;
CREATE TABLE IF NOT EXISTS `doctorspecilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `specilization` (`specilization`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(2, 'General Physician', '2020-07-02 20:40:12', NULL),
(3, 'Dermatologist', '2020-07-02 20:41:16', NULL),
(4, 'Homeopath', '2020-07-02 20:41:40', NULL),
(5, 'Ayurveda', '2020-07-02 20:42:27', NULL),
(6, 'Dentist', '2020-07-02 20:43:06', NULL),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2020-07-02 20:44:04', NULL),
(12, 'Dermatologist', '2020-07-02 20:46:36', NULL),
(13, 'Biolegiest', '2020-07-02 20:47:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

DROP TABLE IF EXISTS `tblpatient`;
CREATE TABLE IF NOT EXISTS `tblpatient` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `Docid` (`Docid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(6, 1, 'Afara', 201601666, 'patient@user.com', 'Male', 'jal el baher', 21, 'In good shape', '2020-07-03 09:43:04', '2020-07-03 09:49:29'),
(7, 1, 'lama', 20220201, 'lama@user.com', 'Male', 'tyre', 21, 'goos', '2020-07-03 09:44:09', '2020-07-03 10:00:15'),
(8, 1, 'hijazi', 123456789, 'hijazi@user.com', 'Male', 'Hosh', 20, 'sick', '2020-07-03 09:49:16', NULL),
(9, 2, 'Afara', 2022020, 'lesiobrawn@gmail.comddd', 'Male', 'tyre\r\ntyre', 21, 'ddddddddd', '2020-07-07 11:29:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(2555) DEFAULT NULL,
  `address` longtext,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(1, 'Elias', 'tyre', 'Tyre', 'male', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-07-01 15:05:57', '2020-07-07 04:44:29');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `doctorId` FOREIGN KEY (`doctorId`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctorSpecialization` FOREIGN KEY (`doctorSpecialization`) REFERENCES `doctorspecilization` (`specilization`),
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD CONSTRAINT `Docid` FOREIGN KEY (`Docid`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
