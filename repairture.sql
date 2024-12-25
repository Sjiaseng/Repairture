-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2024 at 07:53 AM
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
-- Database: `repairture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_ID` int(11) NOT NULL,
  `admin_email` text DEFAULT NULL,
  `admin_passwrd` text DEFAULT NULL,
  `admin_firstname` text DEFAULT NULL,
  `admin_lastname` text DEFAULT NULL,
  `admin_mobilenum` int(11) DEFAULT NULL,
  `admin_profilepic` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_ID`, `admin_email`, `admin_passwrd`, `admin_firstname`, `admin_lastname`, `admin_mobilenum`, `admin_profilepic`) VALUES
(1, 'admin1@example.com', 'password1', 'Alice', 'Smith', 1234567890, 0x6956424f5277304b47676f414141414e5355684555674141414751414141426b434149414141442f6741494441414141356b6c45515652346e4f335151516b4149414441514c562f5a36336758694c634a526962653342727651373469566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d4257634542696c3442782f4745476e6f41414141415355564f524b35435949493d),
(2, 'admin2@example.com', 'password2', 'Bob', 'Jones', 987654321, 0x6956424f5277304b47676f414141414e5355684555674141414751414141426b434149414141442f674149444141414136456c45515652346e4f33517751334149424441734950396432355849432b455a4538515a63313877356c394f2b416c5a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d425759465a67566d42542b49594148484c486b64456741414141424a52553545726b4a6767673d3d);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `tech_ID` int(11) DEFAULT NULL,
  `booking_date_time` datetime DEFAULT NULL,
  `booking_status` varchar(10) DEFAULT NULL,
  `booking_title` tinytext DEFAULT NULL,
  `booking_comment` longtext DEFAULT NULL,
  `services_name` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `user_cancel_note` int(11) DEFAULT NULL,
  `tech_cancel_note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_ID`, `user_ID`, `tech_ID`, `booking_date_time`, `booking_status`, `booking_title`, `booking_comment`, `services_name`, `created_at`, `user_cancel_note`, `tech_cancel_note`) VALUES
(1, 1, 1, '2022-01-03 10:00:00', 'Pending', 'House Dirty', 'Please clean my house', 'Upholstery Cleaning', '2022-01-03', 0, 0),
(2, 2, 2, '2022-01-04 12:00:00', 'ComingSoon', 'Plumbing Issue', 'Water leak in kitchen', 'Plumbing', '2022-01-02', 0, 0),
(3, 1, 1, '2022-01-04 12:00:00', 'Cancel', 'House Dirty', 'Please clean my house', 'Upholstery Cleaning', '2022-01-01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactus_ID` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `read_note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactus_ID`, `name`, `email`, `message`, `created_at`, `read_note`) VALUES
(1, 'John Smith', 'johnsmith@example.com', 'I have a question about your services', '2022-01-01', 0),
(2, 'Jane Doe', 'janedoe@example.com', 'I would like to request a quote', '2022-01-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inbox_ID` int(11) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `tech_ID` int(11) DEFAULT NULL,
  `admin_ID` int(11) DEFAULT NULL,
  `inbox_message` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `inbox_read` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inbox_ID`, `user_ID`, `tech_ID`, `admin_ID`, `inbox_message`, `created_at`, `inbox_read`) VALUES
(1, 1, NULL, NULL, 'Your Appointment has been submited', '2022-01-01', 0),
(2, 2, NULL, NULL, 'Your Appointment has been make', '2022-01-02', 0),
(3, 1, NULL, NULL, 'Your Appointment has been cancel', '2022-01-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `tech_ID` int(11) NOT NULL,
  `tech_email` text DEFAULT NULL,
  `tech_passwrd` text DEFAULT NULL,
  `tech_firstname` text DEFAULT NULL,
  `tech_lastname` text DEFAULT NULL,
  `tech_age` int(3) DEFAULT NULL,
  `tech_gender` text DEFAULT NULL,
  `tech_mobilenum` int(11) DEFAULT NULL,
  `tech_icnum` int(12) DEFAULT NULL,
  `services_name` varchar(50) DEFAULT NULL,
  `service_location` text DEFAULT NULL,
  `tech_addressline` text DEFAULT NULL,
  `tech_city` text DEFAULT NULL,
  `tech_state` text DEFAULT NULL,
  `tech_poscode` int(5) DEFAULT NULL,
  `tech_profilepic` longblob DEFAULT NULL,
  `tech_icpic` longblob DEFAULT NULL,
  `tech_certpic` longblob DEFAULT NULL,
  `tech_verify` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`tech_ID`, `tech_email`, `tech_passwrd`, `tech_firstname`, `tech_lastname`, `tech_age`, `tech_gender`, `tech_mobilenum`, `tech_icnum`, `services_name`, `service_location`, `tech_addressline`, `tech_city`, `tech_state`, `tech_poscode`, `tech_profilepic`, `tech_icpic`, `tech_certpic`, `tech_verify`) VALUES
(1, 'tech1@example.com', 'password1', 'Bob', 'Smith', 35, 'male', 1234567890, 2147483647, 'Plumbing', 'Selangor', '789 Main St', 'Klang', 'Selangor', 12345, 0x74656368315f70726f66696c652e6a7067, 0x74656368315f69632e6a7067, 0x74656368315f636572742e6a7067, NULL),
(2, 'tech2@example.com', 'password2', 'Carla', 'Doe', 30, 'female', 2147483647, 2147483647, 'Upholstery Cleaning', 'Kuala Lumpur', '456 Park Ave', 'Kepong', 'Kuala Lumpur', 54321, 0x74656368325f70726f66696c652e6a7067, 0x74656368325f69632e6a7067, 0x74656368325f636572742e6a7067, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `todo_ID` int(11) NOT NULL,
  `admin_ID` int(11) DEFAULT NULL,
  `tech_ID` int(11) DEFAULT NULL,
  `todo_subject` text DEFAULT NULL,
  `todo_date` date DEFAULT NULL,
  `todo_starred` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`todo_ID`, `admin_ID`, `tech_ID`, `todo_subject`, `todo_date`, `todo_starred`) VALUES
(1, 1, NULL, 'Approve user', '2022-01-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_email` text DEFAULT NULL,
  `user_passwrd` text DEFAULT NULL,
  `user_firstname` text DEFAULT NULL,
  `user_lastname` text DEFAULT NULL,
  `user_age` int(3) DEFAULT NULL,
  `user_gender` text DEFAULT NULL,
  `user_mobilenum` int(11) DEFAULT NULL,
  `user_icnum` int(12) DEFAULT NULL,
  `user_addressline` text DEFAULT NULL,
  `user_city` text DEFAULT NULL,
  `user_state` text DEFAULT NULL,
  `user_poscode` int(5) DEFAULT NULL,
  `user_profilepic` longblob DEFAULT NULL,
  `user_icpic` longblob DEFAULT NULL,
  `user_verify` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `user_email`, `user_passwrd`, `user_firstname`, `user_lastname`, `user_age`, `user_gender`, `user_mobilenum`, `user_icnum`, `user_addressline`, `user_city`, `user_state`, `user_poscode`, `user_profilepic`, `user_icpic`, `user_verify`) VALUES
(1, 'user1@example.com', 'password1', 'John', 'Doe', 70, 'male', 1234567890, 2147483647, '123 Main St', 'Ampang', 'Selangor', 12345, 0x75736572315f70726f66696c652e6a7067, 0x75736572315f69632e6a7067, NULL),
(2, 'user2@example.com', 'password2', 'Jane', 'Doe', 75, 'female', 987654321, 2147483647, '456 Main St', 'Kuala Lumpur', 'Kuala Lumpur', 54321, 0x75736572325f70726f66696c652e6a7067, 0x75736572325f69632e6a7067, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `tech_ID` (`tech_ID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactus_ID`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `tech_ID` (`tech_ID`),
  ADD KEY `admin_ID` (`admin_ID`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`tech_ID`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`todo_ID`),
  ADD KEY `admin_ID` (`admin_ID`),
  ADD KEY `tech_ID` (`tech_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inbox_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `tech_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `todo_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`tech_ID`) REFERENCES `technicians` (`tech_ID`);

--
-- Constraints for table `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `inbox_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `inbox_ibfk_2` FOREIGN KEY (`tech_ID`) REFERENCES `technicians` (`tech_ID`),
  ADD CONSTRAINT `inbox_ibfk_3` FOREIGN KEY (`admin_ID`) REFERENCES `admins` (`admin_ID`);

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`admin_ID`) REFERENCES `admins` (`admin_ID`),
  ADD CONSTRAINT `todolist_ibfk_2` FOREIGN KEY (`tech_ID`) REFERENCES `technicians` (`tech_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;