-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 10:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `treatment` (`v_names` VARCHAR(50), `v_cond` VARCHAR(50), `v_status` VARCHAR(50), `v_report` VARCHAR(1000), `v_nurse` VARCHAR(100), `v_boo` INT(10))   BEGIN
	INSERT INTO tblfeedback (patient_name,patient_cond,fee_status,fee_report,nurse_name, booking_id)
        VALUES (v_names, v_cond, v_status, v_report, v_nurse, v_boo);
        
        UPDATE booking SET booking_status = v_status 
        WHERE booking_id = v_boo; 

	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `ser_id` int(10) NOT NULL,
  `camp_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `boodate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_status`, `start_time`, `end_time`, `ser_id`, `camp_id`, `user_id`, `boodate`) VALUES
(50, 'ACTIVE', '09:00:00', '10:00:00', 1, 1, 6, '2023-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `camp_id` int(10) NOT NULL,
  `camp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`camp_id`, `camp_name`) VALUES
(1, 'PRETORIA'),
(2, 'SOSHANGUVE_SOUTH'),
(3, 'SOSHANGUVE_NORTH'),
(4, 'EMALAHLENI'),
(5, 'ARCADIA'),
(6, 'GA-RANKUWA'),
(7, 'POLOKWANE'),
(8, 'MBOMBELA'),
(9, 'ARTS');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `fee_id` int(10) NOT NULL,
  `fee_date` date DEFAULT current_timestamp(),
  `patient_name` varchar(50) DEFAULT NULL,
  `patient_cond` varchar(50) DEFAULT NULL,
  `fee_status` varchar(50) DEFAULT NULL,
  `fee_report` varchar(1000) DEFAULT NULL,
  `nurse_name` varchar(100) NOT NULL,
  `booking_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblser`
--

CREATE TABLE `tblser` (
  `ser_id` int(10) NOT NULL,
  `ser_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblser`
--

INSERT INTO `tblser` (`ser_id`, `ser_type`) VALUES
(1, 'HIV-TESTING'),
(2, 'FEMILY_PLANNING'),
(3, 'ORAL_CONTRASETIVE'),
(4, 'AILMENT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `tut_no` varchar(9) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `type`, `tut_no`, `password`, `email`) VALUES
(2, 'Thokozane', 'Dlamini', 'admin', 'admin', 'admin', 'admin@tut4life.ac.za'),
(4, 'Angel', 'Magagula', 'nurse', 'nurse', 'nurse', 'nurse@gmail.com'),
(5, 'Ratile', 'Makola', 'student', '219990472', '12345', '219990472@tut4life.ac.za'),
(6, 'Scelo', 'Mabinza', 'student', '218484041', 'Sicelo@81', '218484041@tut4life.ac.za');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `ser_id` (`ser_id`),
  ADD KEY `camp_id` (`camp_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `tblser`
--
ALTER TABLE `tblser`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `camp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `fee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblser`
--
ALTER TABLE `tblser`
  MODIFY `ser_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ser_id`) REFERENCES `tblser` (`ser_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`camp_id`) REFERENCES `campus` (`camp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD CONSTRAINT `tblfeedback_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
