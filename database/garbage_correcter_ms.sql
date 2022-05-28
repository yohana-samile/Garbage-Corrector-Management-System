-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 08:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garbage_correcter_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `profile` varchar(20) NOT NULL DEFAULT 'default.png',
  `place_of_residence` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `live_garbage_request_picture`
--

CREATE TABLE `live_garbage_request_picture` (
  `live_request_id` int(11) NOT NULL,
  `street_name` int(11) NOT NULL,
  `garbage_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `money_obtained`
--

CREATE TABLE `money_obtained` (
  `money` int(11) NOT NULL,
  `amount_per_month` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'inuse',
  `who_pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile` varchar(20) NOT NULL DEFAULT 'default.png',
  `street_assined` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `street`
--

CREATE TABLE `street` (
  `street_id` int(11) NOT NULL,
  `street_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE `truck` (
  `truck_id` int(11) NOT NULL,
  `truck_plate_no` varchar(50) NOT NULL,
  `registered_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_garbage_truck_request`
--

CREATE TABLE `user_garbage_truck_request` (
  `request_id` int(11) NOT NULL,
  `time_requested` time NOT NULL,
  `requested_by` int(11) NOT NULL,
  `request_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_position`
--

CREATE TABLE `user_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `place_of_residence` (`place_of_residence`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `live_garbage_request_picture`
--
ALTER TABLE `live_garbage_request_picture`
  ADD PRIMARY KEY (`live_request_id`),
  ADD KEY `street_name` (`street_name`);

--
-- Indexes for table `money_obtained`
--
ALTER TABLE `money_obtained`
  ADD PRIMARY KEY (`money`),
  ADD KEY `who_pay` (`who_pay`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `street_assined` (`street_assined`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `position_id_2` (`position_id`);

--
-- Indexes for table `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`street_id`);

--
-- Indexes for table `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`truck_id`),
  ADD KEY `registered_by` (`registered_by`);

--
-- Indexes for table `user_garbage_truck_request`
--
ALTER TABLE `user_garbage_truck_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `requested_by` (`requested_by`);

--
-- Indexes for table `user_position`
--
ALTER TABLE `user_position`
  ADD PRIMARY KEY (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_garbage_request_picture`
--
ALTER TABLE `live_garbage_request_picture`
  MODIFY `live_request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `money_obtained`
--
ALTER TABLE `money_obtained`
  MODIFY `money` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `street`
--
ALTER TABLE `street`
  MODIFY `street_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck`
--
ALTER TABLE `truck`
  MODIFY `truck_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_garbage_truck_request`
--
ALTER TABLE `user_garbage_truck_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_position`
--
ALTER TABLE `user_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `user_position` (`position_id`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`place_of_residence`) REFERENCES `street` (`street_id`);

--
-- Constraints for table `live_garbage_request_picture`
--
ALTER TABLE `live_garbage_request_picture`
  ADD CONSTRAINT `live_garbage_request_picture_ibfk_1` FOREIGN KEY (`street_name`) REFERENCES `street` (`street_id`);

--
-- Constraints for table `money_obtained`
--
ALTER TABLE `money_obtained`
  ADD CONSTRAINT `money_obtained_ibfk_1` FOREIGN KEY (`who_pay`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `user_position` (`position_id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`street_assined`) REFERENCES `street` (`street_id`);

--
-- Constraints for table `truck`
--
ALTER TABLE `truck`
  ADD CONSTRAINT `truck_ibfk_1` FOREIGN KEY (`registered_by`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `user_garbage_truck_request`
--
ALTER TABLE `user_garbage_truck_request`
  ADD CONSTRAINT `user_garbage_truck_request_ibfk_1` FOREIGN KEY (`requested_by`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
