-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 10:50 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnostic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `fullname`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Super Admin', 'dadmin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '2018-09-12 13:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_no` int(30) NOT NULL,
  `patient_id` int(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `appoint_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_no`, `patient_id`, `doctor_id`, `disease`, `description`, `appoint_date`, `created_at`) VALUES
(1, 5, 1, 'Chest Pain', 'Chest Pain form many days', '2018-09-20 00:00:00', '2018-09-17 22:20:33'),
(2, 6, 1, 'Fever', 'Fever from 5 days', '2018-09-22 00:00:00', '2018-09-18 00:17:00'),
(3, 6, 1, 'Chest Pain', 'chest pain and joint pain', '2018-09-28 00:00:00', '2018-09-18 00:18:53'),
(4, 6, 1, 'Chest Pain 4', 'Chest Pain 4', '2018-09-27 00:00:00', '2018-09-18 00:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `specialty` varchar(200) NOT NULL,
  `work_place` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `chamber_address` text NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `apoint_time` varchar(200) NOT NULL,
  `limit_of_patient` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `fullname`, `designation`, `degree`, `specialty`, `work_place`, `email_address`, `phone`, `chamber_address`, `profile_pic`, `apoint_time`, `limit_of_patient`, `created_at`, `status`) VALUES
(1, 'Shek Lutfor Rahman', 'Professor', 'MBBS, FRCS, Medicine', 'Medicine and Child', 'Dhaka Medical Hospital', 'lutfor@gmail.com', '172346874', 'Green Hospital', 'che anonymous.jpg', '8 pm', 34, '2018-09-12 12:07:55', 1),
(2, 'Dr. Ajijur Rahman', 'Professor', 'MBBS, FRCS in America', 'Heart Disease ', 'Dhaka Medical Hospital', 'ajij420@gmail.com', '172356484', 'Square Hospital', 'che anonymous.jpg', '8 pm', 25, '2018-09-12 12:21:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pathology_test_info`
--

CREATE TABLE `pathology_test_info` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `reporting_time` varchar(200) NOT NULL,
  `test_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pathology_test_info`
--

INSERT INTO `pathology_test_info` (`test_id`, `test_name`, `description`, `reporting_time`, `test_price`, `created_at`) VALUES
(1, 'Anal Smear ', 'Specimen Collection:	Place specimen into Thin Prep vial or immediately apply the specimen to the slide(s) and fix with spray fixative. \r\nHandling Instructions for Offsite Areas:	Maintain and transport at room temperature. Place slides in cardboard slide holder for transport. ', '72 hours', 1200, '2018-09-20 21:25:56'),
(2, 'AUTOPSY', 'Synonyms:	Post-mortem examination, Necropsy, Fetopsy \r\nSpecimen:	Cadaver, Products of Conception >20 weeks gestation \r\nContainer:	 \r\nVolume:	Whole body \r\nMinimum Volume:	 \r\nSpecimen Collection:	Consent required. \r\nHandling Instructions for Offsite Areas:	Transport body to Morgue. ', '72 hours', 3000, '2018-09-20 21:27:00'),
(3, 'BONE MARROW BIOPSY TISSUE EXAMINATION', 'Specimen:	Bone Marrow Core \r\nContainer:	 \r\nVolume:	Entire bone marrow specimen \r\nMinimum Volume:	 \r\nSpecimen Collection:	Bone marrow core biopsy. \r\nHandling Instructions for Offsite Areas:	Place specimen in B Plus fixative, note time placed in fixative, transport to Pathology as soon as possible, room temperature. ', '72 hours', 3500, '2018-09-20 21:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '2',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`user_id`, `fullname`, `phone`, `email`, `password`, `role`, `date`) VALUES
(2, 'Habib Wahid', '', 'habib@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '2018-09-12 13:10:57'),
(3, 'Galib Hossain', '', 'galib@gmail.com', '123456', 2, '2018-09-12 23:45:38'),
(4, 'Habib Mohamod', '', 'habib@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '2018-09-12 23:47:51'),
(5, 'Ajijul Haque', '01723276069', 'ajijul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '2018-09-16 00:54:03'),
(6, 'Imran Hossain', '1723276089', 'kkislam33@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '2018-09-18 00:15:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_no`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `pathology_test_info`
--
ALTER TABLE `pathology_test_info`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pathology_test_info`
--
ALTER TABLE `pathology_test_info`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
