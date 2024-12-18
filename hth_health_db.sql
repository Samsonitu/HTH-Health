-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 02:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hth_health_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `lastPassword` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `zaloID` varchar(15) NOT NULL,
  `googleID` varchar(50) NOT NULL,
  `facebookID` varchar(50) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0,
  `createAt` datetime NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accID`, `username`, `password`, `lastPassword`, `email`, `zaloID`, `googleID`, `facebookID`, `role`, `createAt`, `active`) VALUES
(1, 'EMP001', '123', '123', 'emp001@gmail.com', '', '', '', 1, '2024-12-07 08:38:15', b'1'),
(2, 'EMP002', '123', '123', 'emp002@gmail.com', '', '', '', 1, '2024-12-07 12:24:07', b'1'),
(3, 'BS1234', '123', '123', 'bs1234@gmail.com', '', '', '', 2, '2024-12-09 02:36:24', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `apptID` int(11) NOT NULL,
  `empCode` varchar(6) DEFAULT NULL,
  `patientID` int(11) NOT NULL,
  `patientCode` varchar(10) DEFAULT NULL,
  `doctorCode` varchar(6) DEFAULT NULL,
  `apptCode` varchar(6) DEFAULT NULL,
  `apptTime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT -1,
  `symptom` text NOT NULL,
  `totalPrice` float DEFAULT NULL,
  `paymentStatus` tinyint(1) NOT NULL,
  `createAt` datetime NOT NULL,
  `confirmAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`apptID`, `empCode`, `patientID`, `patientCode`, `doctorCode`, `apptCode`, `apptTime`, `status`, `symptom`, `totalPrice`, `paymentStatus`, `createAt`, `confirmAt`) VALUES
(1, 'EMP001', 4, 'P241205372', 'BS1234', 'A16136', '2024-12-10 23:59:55', 0, 'Đau bụng, ho, sốt cao', 970000, 0, '2024-12-08 23:46:27', '2024-12-10 00:20:51'),
(2, 'EMP001', 9, 'P241211078', '', 'A97236', '2024-12-11 08:27:00', 2, 'Đau đầu, ho', 970000, 0, '2024-12-11 00:35:44', '2024-12-11 08:15:51'),
(3, NULL, 10, NULL, NULL, NULL, '2024-12-11 00:37:00', -1, 'Ho, sốt cao', NULL, 0, '2024-12-11 00:38:11', NULL),
(4, 'EMP001', 11, 'P241211333', '', 'A22443', '2024-12-11 09:11:00', 2, 'Chân bẹt, ít nói', 1470000, 0, '2024-12-11 09:11:52', '2024-12-11 09:15:51'),
(5, 'EMP001', 4, 'P241208569', '', 'A25390', '2024-12-11 21:36:00', 2, 'Ho', 1470000, 0, '2024-12-11 21:39:07', '2024-12-11 21:39:34'),
(6, 'EMP001', 3, 'P241208392', 'BS3456', 'A12921', '2024-12-11 21:48:00', 2, 'Chân bẹt', 600000, 0, '2024-12-11 21:48:17', '2024-12-11 21:48:53'),
(7, 'EMP001', 3, 'P241208392', '', 'A98914', '2024-12-12 07:38:00', 2, 'Đau đầu, ho', 970000, 0, '2024-12-12 07:38:52', '2024-12-12 07:41:51'),
(8, NULL, 12, NULL, NULL, NULL, '2024-12-12 07:40:00', -1, 'Sốt cao', NULL, 0, '2024-12-12 07:40:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_details`
--

CREATE TABLE `appointment_details` (
  `apptDID` int(11) NOT NULL,
  `apptID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_details`
--

INSERT INTO `appointment_details` (`apptDID`, `apptID`, `serviceID`) VALUES
(6, 1, 1),
(7, 1, 2),
(8, 2, 1),
(9, 4, 1),
(10, 4, 4),
(11, 5, 1),
(12, 5, 4),
(13, 6, 2),
(14, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `counterID` int(11) NOT NULL,
  `counterName` varchar(20) NOT NULL,
  `isAvaiable` bit(1) NOT NULL DEFAULT b'1',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`counterID`, `counterName`, `isAvaiable`, `description`) VALUES
(1, 'Quầy tiếp nhận 1', b'1', 'null'),
(2, 'Quầy tiếp nhận 2', b'1', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorCode` varchar(6) NOT NULL,
  `accID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `doctorName` varchar(50) NOT NULL,
  `doctorGender` varchar(5) NOT NULL,
  `doctorBirthday` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `beginDate` date NOT NULL,
  `experience` text NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorCode`, `accID`, `roomID`, `doctorName`, `doctorGender`, `doctorBirthday`, `avatar`, `phoneNumber`, `address`, `beginDate`, `experience`, `active`) VALUES
('BS1234', 3, 1, 'Phạm Văn Giỏi', 'Nam', '1985-06-15', '', '0901234567', '123 Đường ABC, TP.HCM', '2024-01-01', '10 năm kinh nghiệm', b'1'),
('BS3456', 4, 2, 'Nguyễn Thị Tuyết', 'woman', '1994-02-01', '', '0942386687', '', '2024-12-10', '', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empCode` varchar(6) NOT NULL,
  `accID` int(11) NOT NULL,
  `counterID` int(11) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `employeeGender` varchar(5) NOT NULL,
  `employeeBirthday` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `beginDate` date NOT NULL,
  `experience` text NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empCode`, `accID`, `counterID`, `employeeName`, `employeeGender`, `employeeBirthday`, `avatar`, `phoneNumber`, `address`, `beginDate`, `experience`, `active`) VALUES
('EMP001', 1, 1, 'Nguyễn Văn A', 'man', '1990-01-01', '', '0901234567', '123 Nguyễn Trãi, Hà Nội', '2023-12-01', '2 năm kinh nghiệm làm việc tại phòng khám đa khoa', b'1'),
('EMP002', 2, 2, 'Trần Thị B', 'woman', '1995-07-15', '', '0912345678', '456 Lê Lợi, TP HCM', '2023-12-01', '3 năm kinh nghiệm làm việc tại phòng khám tư nhân', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `ent_examination`
--

CREATE TABLE `ent_examination` (
  `ID` int(11) NOT NULL,
  `patientCode` varchar(10) NOT NULL,
  `outerEar` text NOT NULL,
  `earCanal` text NOT NULL,
  `nasalMucosa` text NOT NULL,
  `nasalDischarge` text NOT NULL,
  `throatMucosa` text NOT NULL,
  `amidan` text NOT NULL,
  `cervicalLymphNodes` text NOT NULL,
  `followUpAppointmentDate` date NOT NULL,
  `generalConclusion` text NOT NULL,
  `doctoInstructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eye_examination`
--

CREATE TABLE `eye_examination` (
  `ID` int(11) NOT NULL,
  `patientCode` varchar(6) NOT NULL,
  `uncorrectedVisionRightEye` varchar(100) NOT NULL,
  `uncorrectedVisionLeftEye` varchar(100) NOT NULL,
  `correctedVisionRightEye` varchar(100) NOT NULL,
  `correctedVisionLeftEye` varchar(100) NOT NULL,
  `ocularMotility` text NOT NULL,
  `pupilaryLightReflex` text NOT NULL,
  `strabismus` text NOT NULL,
  `followUpAppointmentDate` date NOT NULL,
  `generalConclusion` text NOT NULL,
  `doctoInstructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_examination`
--

CREATE TABLE `general_examination` (
  `ID` int(11) NOT NULL,
  `patientCode` varchar(10) NOT NULL,
  `outerEar` text NOT NULL,
  `earCanal` text NOT NULL,
  `eardrum` text NOT NULL,
  `nasalMucosa` text NOT NULL,
  `nasalDischarge` text NOT NULL,
  `nasalSeptum` text NOT NULL,
  `throatMucosa` text NOT NULL,
  `amidan` text NOT NULL,
  `cervicalLymphNodes` text NOT NULL,
  `followUpAppointmentDate` date NOT NULL,
  `generalCoclusion` text NOT NULL,
  `doctorInstructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `guardianID` int(11) NOT NULL,
  `accID` int(11) DEFAULT NULL,
  `empCode` varchar(6) NOT NULL,
  `guardianCode` varchar(6) DEFAULT NULL,
  `guardianName` varchar(50) NOT NULL,
  `guardianGender` varchar(5) NOT NULL,
  `guardianBirthday` date NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `job` varchar(255) DEFAULT NULL,
  `createAt` datetime DEFAULT NULL,
  `isTemporary` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardianID`, `accID`, `empCode`, `guardianCode`, `guardianName`, `guardianGender`, `guardianBirthday`, `phoneNumber`, `address`, `job`, `createAt`, `isTemporary`) VALUES
(1, NULL, 'EMP001', 'G62683', 'Đinh Thị Xuân', 'woman', '1987-12-01', '0332601835', '124/4A Tổ 6, khu phố 7, phường Tân Biên, thành phố Biên Hòa, tỉnh Đồng Nai', 'Tự do', '2024-12-05 20:57:27', b'0'),
(2, NULL, 'EMP001', 'G32857', 'Nguyễn Thị Thanh Thảo', 'woman', '2019-11-01', '0123456789', '14/4 kp 9', 'Tự do', '2024-12-06 19:43:48', b'0'),
(3, NULL, 'EMP001', 'G13024', 'Bùi Quang Dũng', 'man', '1890-02-12', '0614884587', '113/3', 'Công An', '2024-12-08 12:08:32', b'0'),
(4, NULL, 'EMP001', 'G31123', 'Lại Văn Nhạc', 'man', '2007-03-05', '01886148025', '124 Trường Chinh', 'Học Sinh', '2024-12-08 21:05:11', b'0'),
(5, NULL, '', NULL, 'Phạm Xuân Hiếu', '', '0000-00-00', '0909610327', '126/A khu phố 7, phường Tân Biên, thành phố Biên Hòa, tỉnh Đồng Nai', NULL, NULL, b'1'),
(6, NULL, 'EMP001', 'G58126', 'Nguyễn Thị Thanh Thảo', 'woman', '1988-12-01', '0123456789', '1234', 'Nội Trợ', '2024-12-10 22:42:23', b'0'),
(9, NULL, 'EMP001', 'G11345', 'Đinh Bộ Hợp', 'man', '1999-01-20', '0123456789', '99A/3', 'Văn phòng', '2024-12-11 08:09:36', b'0'),
(10, NULL, '', NULL, 'Nguyễn Thị Thủy', '', '0000-00-00', '0913457681', '', NULL, NULL, b'1'),
(11, NULL, 'EMP001', 'G12335', 'Phạm Bá Cường', 'man', '1992-11-11', '013456789', '99 Đống Đa', 'Giám đốc', '2024-12-11 09:12:32', b'0'),
(12, NULL, '', NULL, 'Phạm Xuân Hiền', '', '0000-00-00', '0332601835', '', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `heart_examination`
--

CREATE TABLE `heart_examination` (
  `ID` int(11) NOT NULL,
  `patientCode` varchar(6) NOT NULL,
  `heartRate` int(11) NOT NULL,
  `heartSound` varchar(250) NOT NULL,
  `breathingRate` int(11) NOT NULL,
  `bloodPressure` varchar(250) NOT NULL,
  `oxygenSaturation` float NOT NULL,
  `temperature` float NOT NULL,
  `followUpAppointmentDate` date NOT NULL,
  `doctocInstructions` text NOT NULL,
  `generalConclusion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_form`
--

CREATE TABLE `medical_form` (
  `formID` int(11) NOT NULL,
  `patientCode` varchar(10) NOT NULL,
  `doctorCode` varchar(6) NOT NULL,
  `empCode` varchar(6) NOT NULL,
  `formCode` varchar(10) NOT NULL,
  `symptom` text NOT NULL,
  `totalPrice` float NOT NULL,
  `createAt` datetime NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_form`
--

INSERT INTO `medical_form` (`formID`, `patientCode`, `doctorCode`, `empCode`, `formCode`, `symptom`, `totalPrice`, `createAt`, `status`) VALUES
(1, 'P241208569', 'BS1234', 'EMP001', 'F-01010101', 'Đau đầu', 970000, '2024-12-10 13:38:14', b'0'),
(2, 'P241208392', 'BS1234', 'EMP001', 'F-01010121', 'Buồn nôn', 970000, '2024-12-10 13:43:48', b'0'),
(13, 'P241205372', 'BS1234', 'EMP001', 'F241210559', 'Đau đầu', 970000, '2024-12-10 15:35:47', b'0'),
(14, 'P241210608', 'BS1234', 'EMP001', 'F241210932', 'Chán', 970000, '2024-12-10 15:42:48', b'0'),
(16, 'P241211078', 'BS1234', 'EMP001', 'F241211798', 'Đau đầu, ho', 970000, '2024-12-11 09:09:29', b'0'),
(17, 'P241211333', 'BS1234', 'EMP001', 'F241211012', 'Chân bẹt, ít nói', 1470000, '2024-12-11 09:16:34', b'0'),
(18, 'P241208569', 'BS3456', 'EMP001', 'F241211654', 'Ho', 1470000, '2024-12-11 21:40:21', b'0'),
(19, 'P241210608', 'BS3456', 'EMP001', 'F241211943', 'Đau họng, ho', 970000, '2024-12-11 08:00:00', b'0'),
(20, 'P241208392', 'BS3456', 'EMP001', 'F241211455', 'Chân bẹt', 600000, '2024-12-11 22:03:31', b'0'),
(21, 'P241208392', 'BS1234', 'EMP001', 'F241212160', 'Đau đầu, ho', 970000, '2024-12-12 07:44:14', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `medical_form_details`
--

CREATE TABLE `medical_form_details` (
  `formDetailsID` int(11) NOT NULL,
  `formID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_form_details`
--

INSERT INTO `medical_form_details` (`formDetailsID`, `formID`, `serviceID`, `description`, `status`) VALUES
(1, 1, 1, '', b'0'),
(2, 13, 1, '', b'0'),
(3, 14, 1, '', b'0'),
(5, 16, 1, '', b'0'),
(6, 17, 1, '', b'0'),
(7, 17, 4, '', b'0'),
(8, 18, 1, '', b'0'),
(9, 18, 4, '', b'0'),
(10, 19, 1, '', b'0'),
(11, 20, 2, '', b'0'),
(12, 21, 1, '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `guardianID` int(11) NOT NULL,
  `empCode` varchar(6) DEFAULT NULL,
  `patientCode` varchar(10) DEFAULT NULL,
  `patientName` varchar(50) NOT NULL,
  `patientGender` varchar(5) NOT NULL,
  `patientBirthday` date NOT NULL,
  `medicalHistory` text DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `createAt` datetime NOT NULL,
  `isTemporary` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `guardianID`, `empCode`, `patientCode`, `patientName`, `patientGender`, `patientBirthday`, `medicalHistory`, `allergies`, `relationship`, `createAt`, `isTemporary`) VALUES
(1, 1, 'EMP001', 'P241205372', 'Phạm Ngọc Huấn', 'man', '2005-03-05', '', '', 'Mẹ', '2024-12-05 20:57:27', b'0'),
(2, 2, 'EMP001', 'P241206043', 'Nguyễn Minh Thuyêt', 'man', '2005-12-02', '', '', 'Mẹ', '2024-12-06 19:43:48', b'0'),
(3, 3, 'EMP001', 'P241208392', 'Bùi Quang Hưng', 'man', '2004-12-01', '', '', 'Bố', '2024-12-08 12:08:32', b'0'),
(4, 4, 'EMP001', 'P241208569', 'Lại Văn Sâm', 'man', '2020-01-12', '', '', 'Anh', '2024-12-08 21:05:11', b'0'),
(6, 6, 'EMP001', 'P241210608', 'Nguyễn Thị Thương', 'woman', '2005-01-05', '', '', 'Mẹ', '2024-12-10 22:42:23', b'0'),
(9, 9, 'EMP001', 'P241211078', 'Đinh Bộ Quang', 'man', '2020-02-22', NULL, NULL, 'Bố', '2024-12-11 08:12:16', b'0'),
(10, 10, NULL, NULL, 'Phạm Quang Hồng', 'man', '2018-09-24', NULL, NULL, NULL, '0000-00-00 00:00:00', b'1'),
(11, 11, 'EMP001', 'P241211333', 'Phạm Thị Mĩ Hương', 'woman', '2005-03-05', NULL, NULL, 'Bố', '2024-12-11 09:13:51', b'0'),
(12, 12, NULL, NULL, 'Phạm Ngọc Huấn', 'man', '2024-03-20', NULL, NULL, NULL, '0000-00-00 00:00:00', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `queueID` int(11) NOT NULL,
  `counterID` int(11) NOT NULL,
  `apptID` int(11) DEFAULT NULL,
  `patientName` varchar(50) NOT NULL,
  `queueNo` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `assignedTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queues`
--

INSERT INTO `queues` (`queueID`, `counterID`, `apptID`, `patientName`, `queueNo`, `status`, `assignedTime`) VALUES
(1, 1, 0, 'Phạm Ngọc Huấn', 1, 2, '2024-12-10 14:11:42'),
(2, 1, 0, 'Nguyễn Thị Thanh Vân', 2, 2, '2024-12-10 14:43:23'),
(3, 2, 0, 'M', 3, 0, '2024-12-10 14:45:17'),
(4, 1, 0, '.Đoàn Ngọc Đức.', 4, -1, '2024-12-10 22:30:47'),
(5, 2, 0, '.Vũ Tiến Đạt.', 5, 0, '2024-12-10 22:46:52'),
(6, 2, 0, '.Nguyễn Tiến Linh.', 6, 0, '2024-12-10 22:55:53'),
(7, 1, 0, '.Trịnh Đình Quang.', 7, 0, '2024-12-10 23:59:41'),
(8, 1, 0, '.Đinh Bộ Quang.', 1, 2, '2024-12-11 08:17:02'),
(9, 1, 0, '.Phạm Thị Mĩ Hương.', 2, 2, '2024-12-11 09:16:12'),
(10, 1, 0, '.Lại Văn Sâm.', 3, 2, '2024-12-11 21:39:58'),
(11, 1, 0, 'Nguyễn Thị Thanh Thương', 4, 2, '2024-12-11 21:42:08'),
(12, 1, 0, '.Bùi Quang Hưng.', 5, 2, '2024-12-11 21:49:31'),
(13, 1, 0, '.Bùi Quang Hưng.', 1, 2, '2024-12-12 07:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(11) NOT NULL,
  `roomName` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `roomName`, `description`, `active`) VALUES
(1, 'Phòng khám 1', '', b'1'),
(2, 'Phòng khám 2', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `resultTableName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `createAt` datetime NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `serviceName`, `resultTableName`, `image`, `price`, `status`, `createAt`, `description`) VALUES
(1, 'Khám tổng quát', 'general_medical_examination', '', 970000, b'1', '2024-12-08 10:47:59', NULL),
(2, 'Khám thị lực', 'eye_examination', '', 600000, b'1', '2024-12-08 10:48:05', NULL),
(3, 'Khám tim', 'heart_examination', '', 800000, b'1', '2024-12-08 10:48:11', NULL),
(4, 'Khám tai mũi họng', 'ent_examination', '', 500000, b'1', '2024-12-08 10:48:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accID`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`apptID`),
  ADD KEY `patientCode` (`patientID`,`empCode`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `empCode` (`empCode`),
  ADD KEY `doctorCode` (`doctorCode`),
  ADD KEY `patientCode_2` (`patientCode`);

--
-- Indexes for table `appointment_details`
--
ALTER TABLE `appointment_details`
  ADD PRIMARY KEY (`apptDID`),
  ADD KEY `apptID` (`apptID`,`serviceID`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`counterID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorCode`),
  ADD KEY `accID` (`accID`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empCode`),
  ADD KEY `accID` (`accID`),
  ADD KEY `counterID` (`counterID`);

--
-- Indexes for table `ent_examination`
--
ALTER TABLE `ent_examination`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `eye_examination`
--
ALTER TABLE `eye_examination`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `general_examination`
--
ALTER TABLE `general_examination`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`guardianID`),
  ADD UNIQUE KEY `guardianCode` (`guardianCode`),
  ADD KEY `empCode` (`empCode`),
  ADD KEY `accID` (`accID`);

--
-- Indexes for table `heart_examination`
--
ALTER TABLE `heart_examination`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medical_form`
--
ALTER TABLE `medical_form`
  ADD PRIMARY KEY (`formID`);

--
-- Indexes for table `medical_form_details`
--
ALTER TABLE `medical_form_details`
  ADD PRIMARY KEY (`formDetailsID`),
  ADD KEY `formID` (`formID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`),
  ADD UNIQUE KEY `patientCode` (`patientCode`),
  ADD KEY `parentID` (`guardianID`),
  ADD KEY `employeeCode` (`empCode`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`queueID`),
  ADD KEY `counterID` (`counterID`,`apptID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `apptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment_details`
--
ALTER TABLE `appointment_details`
  MODIFY `apptDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `counterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ent_examination`
--
ALTER TABLE `ent_examination`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eye_examination`
--
ALTER TABLE `eye_examination`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_examination`
--
ALTER TABLE `general_examination`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `guardianID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `heart_examination`
--
ALTER TABLE `heart_examination`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_form`
--
ALTER TABLE `medical_form`
  MODIFY `formID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `medical_form_details`
--
ALTER TABLE `medical_form_details`
  MODIFY `formDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `queues`
--
ALTER TABLE `queues`
  MODIFY `queueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
