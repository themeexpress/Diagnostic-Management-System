-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 07:32 PM
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
-- Database: `diagnostic_manage`
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
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `userid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`userid`, `name`, `email`, `user_name`, `password`, `user_role`, `created_date`, `created_by`) VALUES
(1, 'Super Admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '2018-10-12 13:19:48', 1),
(2, 'manager1', 'manager@gmail.com', 'manager1', 'e10adc3949ba59abbe56e057f20f883e', 2, '2018-10-12 13:20:57', 1),
(4, 'Hasan Shohid', 'hasan@gmail.com', 'hasan35', 'e10adc3949ba59abbe56e057f20f883e', 3, '2018-10-12 14:36:21', 1),
(5, 'Alikul Hasan', 'atik@gmail.com', 'alhik123', 'e10adc3949ba59abbe56e057f20f883e', 3, '2018-10-15 23:07:19', 0),
(6, 'Dr. Kamrul Chowdory', 'kamrul@gmail.com', 'kamrul123', 'e10adc3949ba59abbe56e057f20f883e', 4, '2018-10-15 23:19:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_no` int(30) NOT NULL,
  `patient_id` int(30) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `disease` varchar(255) DEFAULT NULL,
  `disease_description` text,
  `appoint_date` datetime DEFAULT NULL,
  `patient_serial` int(11) DEFAULT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_no`, `patient_id`, `doctor_id`, `disease`, `disease_description`, `appoint_date`, `patient_serial`, `approved`, `created_at`) VALUES
(1, 5, 1, 'djhdjfldjsjf', 'dsjfkjdsfkjasd fjasdjfasdjfiojdsa', '2018-10-10 00:00:00', 1, 0, '2018-10-05 13:21:40'),
(2, 5, 1, 'Stomach Pain', 'stomach pain from some days', '2018-10-10 00:00:00', 2, 0, '2018-10-05 14:14:28'),
(3, 9, 1, 'Chest Pain and Boomating', NULL, '2018-10-22 00:00:00', 1, 0, '2018-10-12 04:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(1, 'Square Pharma Ltd.', '1'),
(13, 'Bximcho Pharma', '1'),
(14, 'Drugs International', '1'),
(15, 'GlaxoSmith', '1'),
(16, 'General Pharama', '1'),
(17, 'Novo Pharma', '1'),
(18, 'INCEPTA PHARMA', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `parent_cat`, `category_name`, `status`) VALUES
(1, 0, 'Paracetamol', '1'),
(2, 0, 'Anti-inflammatory', '1'),
(5, 1, 'Antacids', '1'),
(7, 1, 'Hydrocortisone cream', '1'),
(9, 2, 'Antiseptic cream', '1'),
(10, 0, 'Amoxicillin', '1');

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
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(1, 'Md. Kamrul Islam', '2018-12-10', 1800, 324, 100, 2024, 2024, 0, 'Cash'),
(2, 'Usman', '0000-00-00', 240, 43.199999999999996, 0, 283.2, 283.2, 0, 'Cash'),
(3, 'Jaman', '0000-00-00', 310, 55.8, 55, 310.8, 310.8, 0, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(1, 1, 'Parapyrol', 50, 10),
(2, 1, 'Alcet', 60, 5),
(3, 1, 'Astaa', 50, 20),
(4, 2, 'Alcet', 60, 1),
(5, 2, 'Cronatil', 90, 1),
(6, 2, 'Cronatil', 90, 1),
(7, 3, 'Parapyrol', 50, 1),
(8, 3, 'Alcet', 60, 1),
(9, 3, 'Flugal', 200, 1);

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
(3, 'BONE MARROW BIOPSY TISSUE EXAMINATION', 'Specimen:	Bone Marrow Core \r\nContainer:	 \r\nVolume:	Entire bone marrow specimen \r\nMinimum Volume:	 \r\nSpecimen Collection:	Bone marrow core biopsy. \r\nHandling Instructions for Offsite Areas:	Place specimen in B Plus fixative, note time placed in fixative, transport to Pathology as soon as possible, room temperature. ', '72 hours', 3500, '2018-09-20 21:28:14'),
(4, 'Chest X-ray', 'In a time when everyone seems to have a tablet, which makes it possible to consume everything digitally, and the only real paper we use is bathroom tissu', '72 hours', 3500, '2018-10-15 21:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
(1, 1, 15, 'Parapyrol', 50, 189, '2018-10-04', '1'),
(2, 1, 1, 'Alcet', 60, 93, '2018-10-04', '1'),
(3, 1, 14, 'Cronatil', 90, 249, '2018-10-04', '1'),
(4, 2, 13, 'Asmasol', 280, 200, '2018-10-04', '1'),
(5, 2, 1, 'Burnet', 250, 300, '2018-10-04', '1'),
(6, 1, 1, 'Ace', 50, 300, '2018-10-04', '1'),
(7, 5, 13, 'Astaa', 50, 180, '2018-10-04', '1'),
(8, 2, 1, 'Flugal', 200, 399, '2018-10-04', '1'),
(9, 10, 18, 'Azidthomicine', 500, 200, '2018-10-04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test_invoice`
--

CREATE TABLE `test_invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `order_date` varchar(250) NOT NULL,
  `sub_total` double NOT NULL,
  `vat` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_invoice`
--

INSERT INTO `test_invoice` (`invoice_no`, `customer_id`, `order_date`, `sub_total`, `vat`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(1, 'Saidur Rahman', '2018-01-10', 4200, 630, 0, 4830, 4800, 30, 'cash'),
(2, 'pathihas', '2018-01-10', 4700, 705, 700, 4705, 4700, 5, 'cash'),
(3, 'Imran khan', '2018-02-10', 4200, 630, 630, 4200, 4200, 0, 'cash'),
(4, 'Saidur Rahman', '2018-02-10', 4700, 705, 700, 4705, 4700, 5, 'cash'),
(5, 'Saidur Rahman', '2018-04-10', 4200, 630, 630, 4200, 4196, 0, 'cash'),
(6, 'hello34', '2018-04-10', 2400, 360, 0, 2760, 2696, 60, 'cash'),
(7, 'Imran', '2018-14-10', 5400, 810, 800, 5410, 5410, 0, 'cash'),
(8, 'Saidur Rahman Khan vasani', '2018-15-10', 2400, 360, 300, 2460, 2460, 0, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `test_invoice_details`
--

CREATE TABLE `test_invoice_details` (
  `invoice_details_id` int(11) NOT NULL,
  `invoice_no` int(11) DEFAULT NULL,
  `test_name` varchar(200) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_invoice_details`
--

INSERT INTO `test_invoice_details` (`invoice_details_id`, `invoice_no`, `test_name`, `price`, `qty`) VALUES
(1, 1, 'Anal Smear ', 1200, 1),
(2, 1, 'AUTOPSY', 3000, 1),
(3, 2, 'BONE MARROW BIOPSY TISSUE EXAMINATION', 3500, 1),
(4, 2, 'Anal Smear ', 1200, 1),
(5, 3, 'Anal Smear ', 1200, 1),
(6, 3, 'AUTOPSY', 3000, 1),
(7, 4, 'Anal Smear ', 1200, 1),
(8, 4, 'BONE MARROW BIOPSY TISSUE EXAMINATION', 3500, 1),
(9, 5, 'Anal Smear ', 1200, 1),
(10, 5, 'AUTOPSY', 3000, 1),
(11, 6, 'Anal Smear ', 1200, 1),
(12, 6, 'Anal Smear ', 1200, 1),
(13, 7, 'Anal Smear ', 1200, 1),
(14, 7, 'AUTOPSY', 3000, 1),
(15, 7, 'Anal Smear ', 1200, 1),
(16, 8, 'Anal Smear ', 1200, 1),
(17, 8, 'Anal Smear ', 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(1, 'Rizwan', 'rizwan@gmail.com', '$2y$08$s11k9wKZWc4v6apSODUdveJufFxbE2Be7rP./uS49et7NrlhteFgK', 'Admin', '2017-12-23', '2018-03-01 04:03:17', ''),
(2, 'Test', 'rizwan1@gmail.com', '$2y$08$8j4aTDZiPZBb3rif4RV/teRFYx2Xv0p9F8CTW3blSafkEhXkMfaV6', 'Admin', '2017-12-23', '2017-12-24 11:12:57', ''),
(3, 'Rizwan', 'rizwankhan.august16@gmail.com', '$2y$08$NmqD7p7Qn7QkEG0/6Sa8v.YhNGo.J2zqfRRGrGRzg1EUlV.9O.M42', 'Admin', '2017-12-24', '2017-12-26 05:12:07', ''),
(4, 'Rizwan', 'rizwankhan@gmail.com', '$2y$08$FsjstZZh5dBNUf.5cZta3e.jZAyfK8pCFaO9AR0jIpQCswNR1bJve', 'Admin', '2017-12-24', '2017-12-25 06:12:18', ''),
(5, 'Imran Khan', 'imran@gmail.com', '$2y$08$KCqI3w9Q1kXFX0W.HDnIYODpMceE6AAbJgygBSQ3au8yZotMyXnCC', 'Admin', '2017-12-25', '2017-12-25 00:00:00', ''),
(6, 'Khan', 'khan@gmail.com', '$2y$08$/4PDGZrGbDPGPEYisj3HBOcaMxRRIBQ1UzHjHKdbzpVMDJJRLry6m', 'Admin', '2017-12-26', '2018-01-15 08:01:14', ''),
(7, 'John Smith', 'john.smith@gmail.com', '$2y$08$cTcxbttxHGTzy0FD3AVjr.m.aNL7p735YRplRiyKZB0kHAOpB9WI2', 'Admin', '2018-02-16', '2018-02-16 05:02:41', ''),
(8, 'xman Hero', 'xman@gmail.com', '$2y$08$8TTvmhfdajFkrReBwKiMVu9v04diaMnB6Ur83qT/thzIahcTh60.K', 'Admin', '2018-09-23', '2018-09-23 06:09:47', ''),
(9, 'kamrul islam', 'kkislam33@gmail.com', '$2y$08$gplu6YlA/EL7Dojx7MIwsOclCo19U5pNC/gmyHPzkSMkhH18ufoSG', 'Admin', '2018-09-29', '2018-10-12 07:10:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_role` int(11) DEFAULT '1',
  `register_by` int(11) DEFAULT '1',
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`user_id`, `fullname`, `phone`, `age`, `email`, `password`, `user_role`, `register_by`, `date`) VALUES
(5, 'Ajijul Haque', '01723276069', 55, 'ajijul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2018-09-16 00:54:03'),
(6, 'Kamrul', '1723276089', 50, 'kkislam33@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, '2018-09-18 00:15:44'),
(7, 'Saidur Rahman', '018753265965', 26, 'sujon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2018-10-11 02:35:41'),
(8, 'Haji Mahbub', '017234568', 25, 'haji@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '2018-10-12 03:18:22'),
(9, 'Kashem Ali', '0172358694', 26, 'kashem@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '2018-10-12 04:04:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_no`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `pathology_test_info`
--
ALTER TABLE `pathology_test_info`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `cid` (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `test_invoice`
--
ALTER TABLE `test_invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `test_invoice_details`
--
ALTER TABLE `test_invoice_details`
  ADD PRIMARY KEY (`invoice_details_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pathology_test_info`
--
ALTER TABLE `pathology_test_info`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `test_invoice`
--
ALTER TABLE `test_invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `test_invoice_details`
--
ALTER TABLE `test_invoice_details`
  MODIFY `invoice_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
