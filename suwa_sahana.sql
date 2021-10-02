-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2021 at 10:56 AM
-- Server version: 8.0.23
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suwa_sahana_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendant`
--

CREATE TABLE `Attendant` (
  `Emp_No` varchar(10) NOT NULL,
  `Hourly_Chg_Rate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Attendant`
--

INSERT INTO `Attendant` (`Emp_No`, `Hourly_Chg_Rate`) VALUES
('E006', 500);

-- --------------------------------------------------------

--
-- Table structure for table `Bed`
--

CREATE TABLE `Bed` (
  `Bed_ID` varchar(10) NOT NULL,
  `Ward_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Bed`
--

INSERT INTO `Bed` (`Bed_ID`, `Ward_ID`) VALUES
('B001', 'W001'),
('B002', 'W001'),
('B003', 'W001'),
('B004', 'W001'),
('B005', 'W002'),
('B006', 'W002'),
('B007', 'W002'),
('B008', 'W002'),
('B009', 'W002');

-- --------------------------------------------------------

--
-- Table structure for table `Cleaner`
--

CREATE TABLE `Cleaner` (
  `Emp_No` varchar(10) NOT NULL,
  `Contract_No` varchar(10) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Cleaner`
--

INSERT INTO `Cleaner` (`Emp_No`, `Contract_No`, `Start_Date`, `End_Date`) VALUES
('E005', 'CC020201', '2021-02-01', '2025-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `Diagnosis`
--

CREATE TABLE `Diagnosis` (
  `Diagnosis_Code` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Diagnosis`
--

INSERT INTO `Diagnosis` (`Diagnosis_Code`, `Name`) VALUES
('D001', 'Check Throat'),
('D002', 'Check Abdominal Pain');

-- --------------------------------------------------------

--
-- Table structure for table `Diagnostic_Unit`
--

CREATE TABLE `Diagnostic_Unit` (
  `DU_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PCU_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Diagnostic_Unit`
--

INSERT INTO `Diagnostic_Unit` (`DU_ID`, `Name`, `PCU_ID`) VALUES
('DU001', 'Xray Unit', 'PCU003'),
('DU002', 'CT Scan Unit', 'PCU004');

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE `Doctor` (
  `Emp_No` varchar(10) NOT NULL,
  `DEA_Reg_No` varchar(10) NOT NULL,
  `Speciality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`Emp_No`, `DEA_Reg_No`, `Speciality`) VALUES
('E001', 'DEAR2936', 'Nuerologist'),
('E002', 'DEAR9728', 'General Surgeon'),
('E007', 'DEA9842', 'Peadetrician '),
('E008', 'DEA8572', 'Rhuematologist');

-- --------------------------------------------------------

--
-- Table structure for table `Drug`
--

CREATE TABLE `Drug` (
  `Drug_Code` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Unit_Cost` int NOT NULL,
  `Type` varchar(25) NOT NULL,
  `Treatment_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Drug`
--

INSERT INTO `Drug` (`Drug_Code`, `Name`, `Unit_Cost`, `Type`, `Treatment_ID`) VALUES
('D001', 'Paracetamol', 5, 'Tablet', 'T001'),
('D002', 'Cough Syrup', 250, 'Liquid', 'T002');

-- --------------------------------------------------------

--
-- Table structure for table `Drug_Supply`
--

CREATE TABLE `Drug_Supply` (
  `Drug_Supply_Code` int NOT NULL,
  `Drug_Code` varchar(10) NOT NULL,
  `Reg_No` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Quantity` int NOT NULL,
  `Unit_Cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Drug_Supply`
--

INSERT INTO `Drug_Supply` (`Drug_Supply_Code`, `Drug_Code`, `Reg_No`, `Date`, `Quantity`, `Unit_Cost`) VALUES
(1, 'D001', 'VR002', '2021-08-01', 100, 4),
(2, 'D001', 'VR001', '2021-09-02', 250, 5),
(3, 'D002', 'VR002', '2021-07-01', 500, 800),
(4, 'D002', 'VR002', '2021-09-07', 400, 750);

-- --------------------------------------------------------

--
-- Table structure for table `Emg_Contact`
--

CREATE TABLE `Emg_Contact` (
  `Patient_ID` varchar(10) NOT NULL,
  `NIC` varchar(12) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Relationship` varchar(50) NOT NULL,
  `Contact_Num` int NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Emg_Contact`
--

INSERT INTO `Emg_Contact` (`Patient_ID`, `NIC`, `First_Name`, `Last_Name`, `Relationship`, `Contact_Num`, `Address`) VALUES
('P0001', '200027492912', 'Sahan', 'Ranathunga', 'Uncle', 727348281, 'Kurunegala'),
('P0001', '76284891V', 'Janith', 'Rodrigo', 'Brother', 76382927, 'Moratuwa'),
('P0002', '78263613V', 'Ruwan', 'Dissanayake', 'Father', 727472811, 'Dehiwala');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `Emp_No` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Working_Status` varchar(10) NOT NULL,
  `Contact_Num` int NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Emp_No`, `Name`, `Address`, `Working_Status`, `Contact_Num`, `Type`) VALUES
('E001', 'Nimal Perera', 'Reid Avenue, Colombo', 'Full Time', 771237812, 'Medical Staff'),
('E002', 'Sanath Ranathunga', 'Samagi Mawatha, Rathmalana', 'Part Time', 712736211, 'Medical Staff'),
('E003', 'Samadhi Peiris', 'Kurunegala', 'Full Time', 752848281, 'Medical Staff'),
('E004', 'Chethana Perera', 'Part Time', 'Part Time', 724482911, 'Medical Staff'),
('E005', 'Sarath Fernando', 'Piliyandala', 'Part Time', 724849291, 'Non Medical Staff'),
('E006', 'Mohan Cooray', 'Panadura', 'Full Time', 728948281, 'Non Medical Staff'),
('E007', 'Priyankara Jayawardena', 'Dehiwala', 'Full Time', 717382911, 'Medical Staff'),
('E008', 'Sisira Fernando', 'Rathnapura', 'Part Time', 782637211, 'Medical Staff');

-- --------------------------------------------------------

--
-- Table structure for table `InPatient_Daily_Examination`
--

CREATE TABLE `InPatient_Daily_Examination` (
  `Daily_Examination_Code` int NOT NULL,
  `Patient_ID` varchar(10) NOT NULL,
  `Emp_No` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Temp` float NOT NULL,
  `Weight` float NOT NULL,
  `Blood_Pres` varchar(10) NOT NULL,
  `Pulse` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `InPatient_Daily_Examination`
--

INSERT INTO `InPatient_Daily_Examination` (`Daily_Examination_Code`, `Patient_ID`, `Emp_No`, `Date`, `Time`, `Temp`, `Weight`, `Blood_Pres`, `Pulse`) VALUES
(1, 'P0001', 'E003', '2021-09-01', '10:54:58', 98.5, 75.2, '86/126', 110),
(2, 'P0001', 'E004', '2021-09-02', '10:23:41', 98, 75.2, '82/122', 101),
(3, 'P0001', 'E003', '2021-09-03', '08:42:20', 97.6, 75.2, '80/120', 99),
(4, 'P0002', 'E004', '2021-09-22', '10:30:27', 101, 65.9, '76/118', 98),
(5, 'P0002', 'E003', '2021-09-22', '17:37:25', 101.4, 65.2, '80/121', 100);

-- --------------------------------------------------------

--
-- Table structure for table `InPatient_Daily_Examination_Symptoms`
--

CREATE TABLE `InPatient_Daily_Examination_Symptoms` (
  `Daily_Examination_Code` int NOT NULL,
  `Symptom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `InPatient_Daily_Examination_Symptoms`
--

INSERT INTO `InPatient_Daily_Examination_Symptoms` (`Daily_Examination_Code`, `Symptom`) VALUES
(1, 'Mild Fever'),
(1, 'Throat Ache'),
(2, 'Throat Ache'),
(3, 'Mild body pains'),
(4, 'High Fever'),
(4, 'Running Nose'),
(5, 'Heavy Cough'),
(5, 'High Fever'),
(5, 'Running Nose');

-- --------------------------------------------------------

--
-- Table structure for table `Insurance_Comp`
--

CREATE TABLE `Insurance_Comp` (
  `Patient_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Reg_Branch` varchar(50) NOT NULL,
  `Branch_Address` varchar(100) NOT NULL,
  `Contact_Num` int NOT NULL,
  `Sub_Flag` int NOT NULL,
  `Sub_First_Name` varchar(50) DEFAULT NULL,
  `Sub_Last_Name` varchar(50) DEFAULT NULL,
  `Sub_Relationship` varchar(50) DEFAULT NULL,
  `Sub_Address` varchar(100) DEFAULT NULL,
  `Sub_Contact_Num` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Insurance_Comp`
--

INSERT INTO `Insurance_Comp` (`Patient_ID`, `Name`, `Reg_Branch`, `Branch_Address`, `Contact_Num`, `Sub_Flag`, `Sub_First_Name`, `Sub_Last_Name`, `Sub_Relationship`, `Sub_Address`, `Sub_Contact_Num`) VALUES
('P0001', 'Janashakthi Insurance', 'Colombo', 'Nawam Mawatha, Colombo 02', 117383727, 1, NULL, NULL, NULL, NULL, NULL),
('P0002', 'Softlogic Insurance', 'Colombo 07', 'Union Place, Colombo', 112677381, 0, 'Ruwan', ' Dissanayake', 'Father', 'Nugegoda', 773467326);

-- --------------------------------------------------------

--
-- Table structure for table `In_Patient`
--

CREATE TABLE `In_Patient` (
  `Patient_ID` varchar(10) NOT NULL,
  `DOB` date NOT NULL,
  `Bed_ID` varchar(10) NOT NULL,
  `Ward_ID` varchar(10) NOT NULL,
  `Admitted_Time` time NOT NULL,
  `Admitted_Date` date NOT NULL,
  `Discharged_Date` date DEFAULT NULL,
  `Discharged_Time` time DEFAULT NULL,
  `Admitted_Doc_No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `In_Patient`
--

INSERT INTO `In_Patient` (`Patient_ID`, `DOB`, `Bed_ID`, `Ward_ID`, `Admitted_Time`, `Admitted_Date`, `Discharged_Date`, `Discharged_Time`, `Admitted_Doc_No`) VALUES
('P0001', '2011-09-01', 'B001', 'W001', '11:41:38', '2021-09-01', '2021-09-03', '17:32:38', 'E001'),
('P0002', '2012-09-14', 'B006', 'W002', '08:13:34', '2021-09-22', NULL, NULL, 'E007'),
('P0005', '2010-10-21', 'B002', 'W001', '11:25:10', '2021-09-23', NULL, NULL, 'E008'),
('P0006', '2021-02-05', 'B006', 'W002', '10:30:00', '2021-09-27', NULL, NULL, 'E002');

-- --------------------------------------------------------

--
-- Table structure for table `Medical_Staff`
--

CREATE TABLE `Medical_Staff` (
  `Emp_No` varchar(10) NOT NULL,
  `MC_Reg_No` varchar(10) NOT NULL,
  `Joined_Date` date NOT NULL,
  `Resigned_Date` date DEFAULT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Medical_Staff`
--

INSERT INTO `Medical_Staff` (`Emp_No`, `MC_Reg_No`, `Joined_Date`, `Resigned_Date`, `Type`) VALUES
('E001', 'MCR0204', '2018-09-04', NULL, 'Doctor'),
('E002', 'MCR0872', '2014-09-02', NULL, 'Doctor'),
('E003', 'MCRN0287', '2018-07-10', NULL, 'Nurse'),
('E004', 'MCRN7529', '2021-09-01', NULL, 'Nurse'),
('E007', 'MCR0289', '2020-04-01', NULL, 'Doctor'),
('E008', 'MCR9816', '2019-05-05', NULL, 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `Non_Medical_Staff`
--

CREATE TABLE `Non_Medical_Staff` (
  `Emp_No` varchar(10) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Non_Medical_Staff`
--

INSERT INTO `Non_Medical_Staff` (`Emp_No`, `Type`) VALUES
('E005', 'Cleaner'),
('E006', 'Attendant');

-- --------------------------------------------------------

--
-- Table structure for table `Nurse`
--

CREATE TABLE `Nurse` (
  `Emp_No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Nurse`
--

INSERT INTO `Nurse` (`Emp_No`) VALUES
('E003'),
('E004');

-- --------------------------------------------------------

--
-- Table structure for table `Out_Patient`
--

CREATE TABLE `Out_Patient` (
  `Patient_ID` varchar(10) NOT NULL,
  `Arrival_Date` date NOT NULL,
  `Arrival_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Out_Patient`
--

INSERT INTO `Out_Patient` (`Patient_ID`, `Arrival_Date`, `Arrival_Time`) VALUES
('P0003', '2021-09-01', '11:54:28'),
('P0004', '2021-08-01', '18:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `Patient_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`Patient_ID`, `Name`, `Type`) VALUES
('P0001', 'Suvin Kodithuwakku', 'In Patient'),
('P0002', 'Sahan Dissanayake', 'In Patient'),
('P0003', 'Nipun Weerasinghe', 'Out Patient'),
('P0004', 'Vineth Bandaranayake', 'Out Patient'),
('P0005', 'Nethsara Sandeepa', 'In Patient'),
('P0006', 'Kalana Weranga', 'In Patient');

-- --------------------------------------------------------

--
-- Table structure for table `Patient_Care_Unit`
--

CREATE TABLE `Patient_Care_Unit` (
  `PCU_ID` varchar(10) NOT NULL,
  `Head_Emp_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Patient_Care_Unit`
--

INSERT INTO `Patient_Care_Unit` (`PCU_ID`, `Head_Emp_ID`) VALUES
('PCU0001', 'E001'),
('PCU0002', 'E002'),
('PCU003', 'E007'),
('PCU004', 'E008');

-- --------------------------------------------------------

--
-- Table structure for table `Patient_Diagnosis`
--

CREATE TABLE `Patient_Diagnosis` (
  `Patient_Diagnosis_Code` int NOT NULL,
  `Diagnosis_Code` varchar(10) NOT NULL,
  `Patient_ID` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Emp_No` varchar(10) NOT NULL,
  `Description` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Patient_Diagnosis`
--

INSERT INTO `Patient_Diagnosis` (`Patient_Diagnosis_Code`, `Diagnosis_Code`, `Patient_ID`, `Date`, `Time`, `Emp_No`, `Description`) VALUES
(1, 'D001', 'P0001', '2021-09-01', '08:50:24', 'E001', 'Throat has red marks'),
(2, 'D002', 'P0001', '2021-09-03', '11:43:24', 'E002', NULL),
(3, 'D002', 'P0003', '2021-09-08', '18:51:47', 'E008', 'Right side painful'),
(7, 'D002', 'P0002', '2021-09-20', '10:30:20', 'E007', NULL),
(14, 'D002', 'P0002', '2021-09-20', '10:30:20', 'E007', NULL),
(15, 'D002', 'P0002', '2021-09-20', '10:30:20', 'E007', NULL),
(16, 'D002', 'P0002', '2021-09-20', '10:30:20', 'E007', NULL),
(17, 'D002', 'P0002', '2021-09-20', '10:30:20', 'E007', NULL),
(18, 'D002', 'P0002', '2021-09-20', '10:30:20', 'E007', NULL),
(19, 'D002', 'P0002', '2021-09-20', '10:30:20', 'E007', NULL),
(22, 'D002', 'P0005', '2021-09-24', '15:45:00', 'E008', NULL),
(23, 'D002', 'P0005', '2021-09-18', '10:20:00', 'E007', ''),
(25, 'D002', 'P0005', '2021-09-21', '10:30:00', 'E007', 'Test'),
(27, 'D002', 'P0005', '2021-09-17', '23:27:00', 'E008', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Patient_OnArrival_Inspection`
--

CREATE TABLE `Patient_OnArrival_Inspection` (
  `OnArrival_Inspection_Code` int NOT NULL,
  `Patient_ID` varchar(10) NOT NULL,
  `Emp_No` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Temp` float NOT NULL,
  `Weight` float NOT NULL,
  `Blood_Pres` varchar(10) NOT NULL,
  `Pulse` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Patient_OnArrival_Inspection`
--

INSERT INTO `Patient_OnArrival_Inspection` (`OnArrival_Inspection_Code`, `Patient_ID`, `Emp_No`, `Date`, `Time`, `Temp`, `Weight`, `Blood_Pres`, `Pulse`) VALUES
(1, 'P0001', 'E003', '2021-09-01', '16:02:47', 98, 75.2, '87/25', 104),
(2, 'P0001', 'E004', '2021-09-04', '15:02:47', 100, 75.5, '85/125', 103),
(6, 'P0002', 'E003', '2021-09-08', '16:04:04', 96.8, 80, '82/122', 95),
(7, 'P0003', 'E004', '2021-09-05', '10:04:04', 98.6, 76.2, '80/121', 97),
(8, 'P0004', 'E003', '2021-09-12', '14:05:52', 99.2, 65.8, '86/126', 90),
(9, 'P0005', 'E004', '2021-09-25', '11:27:59', 95.6, 82, '88/120', 170),
(10, 'P0005', 'E004', '2021-09-25', '11:27:59', 95.6, 82, '88/120', 170),
(11, 'P0005', 'E004', '2021-09-25', '11:27:59', 95.6, 82, '88/120', 170),
(12, 'P0005', 'E004', '2021-09-25', '11:27:59', 95.6, 82, '88/120', 170);

-- --------------------------------------------------------

--
-- Table structure for table `Patient_OnArrival_Inspection_Symptoms`
--

CREATE TABLE `Patient_OnArrival_Inspection_Symptoms` (
  `OnArrival_Inspection_Code` int NOT NULL,
  `Symptoms` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Patient_OnArrival_Inspection_Symptoms`
--

INSERT INTO `Patient_OnArrival_Inspection_Symptoms` (`OnArrival_Inspection_Code`, `Symptoms`) VALUES
(1, 'Cough'),
(1, 'Fever'),
(2, 'Running Nose'),
(6, 'Abdominal Pain'),
(7, 'Hand Pain'),
(8, 'Rash in the leg');

-- --------------------------------------------------------

--
-- Table structure for table `Patient_Treatment`
--

CREATE TABLE `Patient_Treatment` (
  `Patient_Treatment_Code` int NOT NULL,
  `Patient_ID` varchar(10) NOT NULL,
  `Treatment_ID` varchar(10) NOT NULL,
  `Emp_No` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Patient_Treatment`
--

INSERT INTO `Patient_Treatment` (`Patient_Treatment_Code`, `Patient_ID`, `Treatment_ID`, `Emp_No`, `Date`, `Time`) VALUES
(1, 'P0002', 'T001', 'E002', '2021-09-07', '18:52:38'),
(2, 'P0004', 'T004', 'E002', '2021-09-13', '17:52:38'),
(3, 'P0001', 'T001', 'E001', '2021-08-03', '14:51:53'),
(4, 'P0001', 'T003', 'E001', '2021-08-26', '18:51:53'),
(5, 'P0001', 'T001', 'E001', '2021-09-01', '10:53:09'),
(6, 'P0001', 'T004', 'E008', '2021-09-08', '17:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `PCU_Employee`
--

CREATE TABLE `PCU_Employee` (
  `PCU_ID` varchar(10) NOT NULL,
  `Emp_No` varchar(10) NOT NULL,
  `Hours_worked_per_week` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PCU_Employee`
--

INSERT INTO `PCU_Employee` (`PCU_ID`, `Emp_No`, `Hours_worked_per_week`) VALUES
('PCU0001', 'E001', 10),
('PCU0001', 'E002', 30),
('PCU0001', 'E003', 20),
('PCU0001', 'E005', 20),
('PCU0001', 'E006', 10),
('PCU0001', 'E008', 20),
('PCU0002', 'E001', 20),
('PCU0002', 'E003', 15),
('PCU0002', 'E004', 35),
('PCU0002', 'E006', 25),
('PCU003', 'E005', 20),
('PCU003', 'E007', 30),
('PCU004', 'E008', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--

CREATE TABLE `Test` (
  `Test_Code` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Cost` varchar(50) NOT NULL,
  `Treatment_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Test`
--

INSERT INTO `Test` (`Test_Code`, `Name`, `Cost`, `Treatment_ID`) VALUES
('T001', 'Full Blood Report', '750', 'T003'),
('T002', 'CT Scan', '10000', 'T004');

-- --------------------------------------------------------

--
-- Table structure for table `Treatment`
--

CREATE TABLE `Treatment` (
  `Treatment_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Treatment`
--

INSERT INTO `Treatment` (`Treatment_ID`) VALUES
('T001'),
('T002'),
('T003'),
('T004');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `User_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `User_Type`) VALUES
('admin', 'admin123', 'Admin'),
('doctor', 'doctor123', 'Doctor'),
('nurse', 'nurse123', 'Nurse'),
('patient', 'patient123', 'Patient'),
('ravindu', 'ruw2000925', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `Vendor`
--

CREATE TABLE `Vendor` (
  `Reg_No` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact_Num` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Vendor`
--

INSERT INTO `Vendor` (`Reg_No`, `Name`, `Address`, `Contact_Num`) VALUES
('VR001', 'PR Medicals', 'No.2, Reid Avenue, Colombo 07', 772647381),
('VR002', 'Sisira Pharmaceuticals ', 'No. 100, Peiris Mawatha, Dehiwala', 112749372),
('VR003', 'GSK Medicals', 'Ratmalana', 113792739);

-- --------------------------------------------------------

--
-- Table structure for table `Ward`
--

CREATE TABLE `Ward` (
  `Ward_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PCU_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Ward`
--

INSERT INTO `Ward` (`Ward_ID`, `Name`, `PCU_ID`) VALUES
('W001', 'General Ward', 'PCU0001'),
('W002', 'Covid Ward', 'PCU0002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendant`
--
ALTER TABLE `Attendant`
  ADD PRIMARY KEY (`Emp_No`);

--
-- Indexes for table `Bed`
--
ALTER TABLE `Bed`
  ADD PRIMARY KEY (`Bed_ID`),
  ADD KEY `bed_ward` (`Ward_ID`);

--
-- Indexes for table `Cleaner`
--
ALTER TABLE `Cleaner`
  ADD PRIMARY KEY (`Emp_No`);

--
-- Indexes for table `Diagnosis`
--
ALTER TABLE `Diagnosis`
  ADD PRIMARY KEY (`Diagnosis_Code`);

--
-- Indexes for table `Diagnostic_Unit`
--
ALTER TABLE `Diagnostic_Unit`
  ADD PRIMARY KEY (`DU_ID`),
  ADD KEY `du_pcu` (`PCU_ID`);

--
-- Indexes for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD PRIMARY KEY (`Emp_No`);

--
-- Indexes for table `Drug`
--
ALTER TABLE `Drug`
  ADD PRIMARY KEY (`Drug_Code`),
  ADD KEY `drug_treat` (`Treatment_ID`);

--
-- Indexes for table `Drug_Supply`
--
ALTER TABLE `Drug_Supply`
  ADD PRIMARY KEY (`Drug_Supply_Code`),
  ADD KEY `drug_supply` (`Drug_Code`),
  ADD KEY `drug_vendor` (`Reg_No`);

--
-- Indexes for table `Emg_Contact`
--
ALTER TABLE `Emg_Contact`
  ADD PRIMARY KEY (`Patient_ID`,`NIC`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`Emp_No`);

--
-- Indexes for table `InPatient_Daily_Examination`
--
ALTER TABLE `InPatient_Daily_Examination`
  ADD PRIMARY KEY (`Daily_Examination_Code`),
  ADD KEY `iptnt_daily` (`Patient_ID`),
  ADD KEY `daily_nurse` (`Emp_No`);

--
-- Indexes for table `InPatient_Daily_Examination_Symptoms`
--
ALTER TABLE `InPatient_Daily_Examination_Symptoms`
  ADD PRIMARY KEY (`Daily_Examination_Code`,`Symptom`);

--
-- Indexes for table `Insurance_Comp`
--
ALTER TABLE `Insurance_Comp`
  ADD PRIMARY KEY (`Patient_ID`,`Name`);

--
-- Indexes for table `In_Patient`
--
ALTER TABLE `In_Patient`
  ADD PRIMARY KEY (`Patient_ID`),
  ADD KEY `ptnt_bed` (`Bed_ID`),
  ADD KEY `ptnt_ward` (`Ward_ID`),
  ADD KEY `admit_doc` (`Admitted_Doc_No`);

--
-- Indexes for table `Medical_Staff`
--
ALTER TABLE `Medical_Staff`
  ADD PRIMARY KEY (`Emp_No`);

--
-- Indexes for table `Non_Medical_Staff`
--
ALTER TABLE `Non_Medical_Staff`
  ADD PRIMARY KEY (`Emp_No`);

--
-- Indexes for table `Nurse`
--
ALTER TABLE `Nurse`
  ADD PRIMARY KEY (`Emp_No`);

--
-- Indexes for table `Out_Patient`
--
ALTER TABLE `Out_Patient`
  ADD PRIMARY KEY (`Patient_ID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`Patient_ID`);

--
-- Indexes for table `Patient_Care_Unit`
--
ALTER TABLE `Patient_Care_Unit`
  ADD PRIMARY KEY (`PCU_ID`),
  ADD KEY `pcu_head` (`Head_Emp_ID`);

--
-- Indexes for table `Patient_Diagnosis`
--
ALTER TABLE `Patient_Diagnosis`
  ADD PRIMARY KEY (`Patient_Diagnosis_Code`),
  ADD KEY `ptnt_diag_doc` (`Emp_No`),
  ADD KEY `ptnt_diag_ptnt` (`Patient_ID`),
  ADD KEY `ptnt_diag_diagnosis` (`Diagnosis_Code`);

--
-- Indexes for table `Patient_OnArrival_Inspection`
--
ALTER TABLE `Patient_OnArrival_Inspection`
  ADD PRIMARY KEY (`OnArrival_Inspection_Code`),
  ADD KEY `fk_pnt_inspect` (`Patient_ID`),
  ADD KEY `fk_nurse_inspect` (`Emp_No`);

--
-- Indexes for table `Patient_OnArrival_Inspection_Symptoms`
--
ALTER TABLE `Patient_OnArrival_Inspection_Symptoms`
  ADD PRIMARY KEY (`OnArrival_Inspection_Code`,`Symptoms`);

--
-- Indexes for table `Patient_Treatment`
--
ALTER TABLE `Patient_Treatment`
  ADD PRIMARY KEY (`Patient_Treatment_Code`),
  ADD KEY `ptnt_treat` (`Patient_ID`),
  ADD KEY `ptnt_treat_treatment` (`Treatment_ID`),
  ADD KEY `ptnt_treat_doc` (`Emp_No`);

--
-- Indexes for table `PCU_Employee`
--
ALTER TABLE `PCU_Employee`
  ADD PRIMARY KEY (`PCU_ID`,`Emp_No`),
  ADD KEY `pcu_emp` (`Emp_No`);

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
  ADD PRIMARY KEY (`Test_Code`),
  ADD KEY `test_treat` (`Treatment_ID`);

--
-- Indexes for table `Treatment`
--
ALTER TABLE `Treatment`
  ADD PRIMARY KEY (`Treatment_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `Vendor`
--
ALTER TABLE `Vendor`
  ADD PRIMARY KEY (`Reg_No`);

--
-- Indexes for table `Ward`
--
ALTER TABLE `Ward`
  ADD PRIMARY KEY (`Ward_ID`),
  ADD KEY `ward_pcu` (`PCU_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Drug_Supply`
--
ALTER TABLE `Drug_Supply`
  MODIFY `Drug_Supply_Code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `InPatient_Daily_Examination`
--
ALTER TABLE `InPatient_Daily_Examination`
  MODIFY `Daily_Examination_Code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Patient_Diagnosis`
--
ALTER TABLE `Patient_Diagnosis`
  MODIFY `Patient_Diagnosis_Code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Patient_OnArrival_Inspection`
--
ALTER TABLE `Patient_OnArrival_Inspection`
  MODIFY `OnArrival_Inspection_Code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Patient_Treatment`
--
ALTER TABLE `Patient_Treatment`
  MODIFY `Patient_Treatment_Code` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Attendant`
--
ALTER TABLE `Attendant`
  ADD CONSTRAINT `fk_emp_atd` FOREIGN KEY (`Emp_No`) REFERENCES `Non_Medical_Staff` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Bed`
--
ALTER TABLE `Bed`
  ADD CONSTRAINT `bed_ward` FOREIGN KEY (`Ward_ID`) REFERENCES `Ward` (`Ward_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Cleaner`
--
ALTER TABLE `Cleaner`
  ADD CONSTRAINT `fk_emp_cln` FOREIGN KEY (`Emp_No`) REFERENCES `Non_Medical_Staff` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Diagnostic_Unit`
--
ALTER TABLE `Diagnostic_Unit`
  ADD CONSTRAINT `du_pcu` FOREIGN KEY (`PCU_ID`) REFERENCES `Patient_Care_Unit` (`PCU_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD CONSTRAINT `fk_emp_doc` FOREIGN KEY (`Emp_No`) REFERENCES `Medical_Staff` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Drug`
--
ALTER TABLE `Drug`
  ADD CONSTRAINT `drug_treat` FOREIGN KEY (`Treatment_ID`) REFERENCES `Treatment` (`Treatment_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Drug_Supply`
--
ALTER TABLE `Drug_Supply`
  ADD CONSTRAINT `drug_supply` FOREIGN KEY (`Drug_Code`) REFERENCES `Drug` (`Drug_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drug_vendor` FOREIGN KEY (`Reg_No`) REFERENCES `Vendor` (`Reg_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Emg_Contact`
--
ALTER TABLE `Emg_Contact`
  ADD CONSTRAINT `ptnt_emg` FOREIGN KEY (`Patient_ID`) REFERENCES `In_Patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `InPatient_Daily_Examination`
--
ALTER TABLE `InPatient_Daily_Examination`
  ADD CONSTRAINT `daily_nurse` FOREIGN KEY (`Emp_No`) REFERENCES `Nurse` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iptnt_daily` FOREIGN KEY (`Patient_ID`) REFERENCES `In_Patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `InPatient_Daily_Examination_Symptoms`
--
ALTER TABLE `InPatient_Daily_Examination_Symptoms`
  ADD CONSTRAINT `inptnt_daily_symp` FOREIGN KEY (`Daily_Examination_Code`) REFERENCES `InPatient_Daily_Examination` (`Daily_Examination_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Insurance_Comp`
--
ALTER TABLE `Insurance_Comp`
  ADD CONSTRAINT `ptnt_ins` FOREIGN KEY (`Patient_ID`) REFERENCES `In_Patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `In_Patient`
--
ALTER TABLE `In_Patient`
  ADD CONSTRAINT `admit_doc` FOREIGN KEY (`Admitted_Doc_No`) REFERENCES `Doctor` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intptnt_ptnt` FOREIGN KEY (`Patient_ID`) REFERENCES `Patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptnt_bed` FOREIGN KEY (`Bed_ID`) REFERENCES `Bed` (`Bed_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptnt_ward` FOREIGN KEY (`Ward_ID`) REFERENCES `Ward` (`Ward_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Medical_Staff`
--
ALTER TABLE `Medical_Staff`
  ADD CONSTRAINT `fk_emp` FOREIGN KEY (`Emp_No`) REFERENCES `Employee` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Non_Medical_Staff`
--
ALTER TABLE `Non_Medical_Staff`
  ADD CONSTRAINT `fk_emp_nms` FOREIGN KEY (`Emp_No`) REFERENCES `Employee` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Nurse`
--
ALTER TABLE `Nurse`
  ADD CONSTRAINT `fk_emp_nurse` FOREIGN KEY (`Emp_No`) REFERENCES `Medical_Staff` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Out_Patient`
--
ALTER TABLE `Out_Patient`
  ADD CONSTRAINT `out_ptnt` FOREIGN KEY (`Patient_ID`) REFERENCES `Patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Patient_Care_Unit`
--
ALTER TABLE `Patient_Care_Unit`
  ADD CONSTRAINT `pcu_head` FOREIGN KEY (`Head_Emp_ID`) REFERENCES `Employee` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Patient_Diagnosis`
--
ALTER TABLE `Patient_Diagnosis`
  ADD CONSTRAINT `ptnt_diag_diagnosis` FOREIGN KEY (`Diagnosis_Code`) REFERENCES `Diagnosis` (`Diagnosis_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptnt_diag_doc` FOREIGN KEY (`Emp_No`) REFERENCES `Doctor` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptnt_diag_ptnt` FOREIGN KEY (`Patient_ID`) REFERENCES `Patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Patient_OnArrival_Inspection`
--
ALTER TABLE `Patient_OnArrival_Inspection`
  ADD CONSTRAINT `fk_nurse_inspect` FOREIGN KEY (`Emp_No`) REFERENCES `Nurse` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pnt_inspect` FOREIGN KEY (`Patient_ID`) REFERENCES `Patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Patient_OnArrival_Inspection_Symptoms`
--
ALTER TABLE `Patient_OnArrival_Inspection_Symptoms`
  ADD CONSTRAINT `on arrival_symp` FOREIGN KEY (`OnArrival_Inspection_Code`) REFERENCES `Patient_OnArrival_Inspection` (`OnArrival_Inspection_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Patient_Treatment`
--
ALTER TABLE `Patient_Treatment`
  ADD CONSTRAINT `ptnt_treat` FOREIGN KEY (`Patient_ID`) REFERENCES `Patient` (`Patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptnt_treat_doc` FOREIGN KEY (`Emp_No`) REFERENCES `Doctor` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptnt_treat_treatment` FOREIGN KEY (`Treatment_ID`) REFERENCES `Treatment` (`Treatment_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PCU_Employee`
--
ALTER TABLE `PCU_Employee`
  ADD CONSTRAINT `pcu_emp` FOREIGN KEY (`Emp_No`) REFERENCES `Employee` (`Emp_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pcu_pcu` FOREIGN KEY (`PCU_ID`) REFERENCES `Patient_Care_Unit` (`PCU_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Test`
--
ALTER TABLE `Test`
  ADD CONSTRAINT `test_treat` FOREIGN KEY (`Treatment_ID`) REFERENCES `Treatment` (`Treatment_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ward`
--
ALTER TABLE `Ward`
  ADD CONSTRAINT `ward_pcu` FOREIGN KEY (`PCU_ID`) REFERENCES `Patient_Care_Unit` (`PCU_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
