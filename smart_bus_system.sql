-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 07:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_bus_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_info`
--

CREATE TABLE `bus_info` (
  `tb_id` int(11) NOT NULL COMMENT 'to identify uniquely each bus  ',
  `bus_name` varchar(70) NOT NULL,
  `bus_no` varchar(70) NOT NULL,
  `bus_condtions` enum('Ac','Non-Ac') NOT NULL,
  `bus_contact_number` int(10) NOT NULL,
  `bus_avb_seats` varchar(70) NOT NULL,
  `bus_img_path` text NOT NULL,
  `isCompleteRoute` enum('Complete','Not-Complete') NOT NULL,
  `route_id` int(70) NOT NULL,
  `time_id` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_info`
--

INSERT INTO `bus_info` (`tb_id`, `bus_name`, `bus_no`, `bus_condtions`, `bus_contact_number`, `bus_avb_seats`, `bus_img_path`, `isCompleteRoute`, `route_id`, `time_id`) VALUES
(1, 'Ransilu Express', '2343', 'Non-Ac', 779854127, '10', '', 'Not-Complete', 1, 1),
(2, 'Janaka Travels', '3265', 'Non-Ac', 715632491, '23', '', 'Not-Complete', 2, 2),
(3, 'Ajantha Travels', '5678', 'Ac', 768541325, '14', '', 'Not-Complete', 1, 3),
(4, 'Kasuni Travels', '6568', 'Ac', 719856471, '16', '', 'Not-Complete', 1, 1),
(5, 'Tharaka Travels', '4571', 'Non-Ac', 779875491, '23', '', 'Not-Complete', 1, 1),
(6, 'Herath Liner', '6562', 'Ac', 77854617, '0', '', 'Not-Complete', 1, 1),
(7, 'Nil Super Liner', '3262', 'Non-Ac', 784514259, '0', '', 'Complete', 1, 1),
(8, 'Jagath Super', '4452', 'Ac', 714589542, '12', '', 'Not-Complete', 1, 1),
(9, 'Hemamali Travels', '1214', 'Ac', 775268544, '0', '', 'Complete', 1, 1),
(10, 'Labugama Super', '2334', 'Non-Ac', 754125985, '20', '', 'Not-Complete', 1, 1),
(11, 'Janaka Travels', '4265', 'Ac', 715632891, '15', '', 'Not-Complete', 2, 1),
(12, 'Ransilu Express', '2345', 'Non-Ac', 779854127, '11', '', 'Not-Complete', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `route_info`
--

CREATE TABLE `route_info` (
  `route_id` int(11) NOT NULL,
  `start_point` varchar(70) NOT NULL,
  `end_point` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_info`
--

INSERT INTO `route_info` (`route_id`, `start_point`, `end_point`) VALUES
(1, 'Labugama', 'Colombo'),
(2, 'Labugama', 'Hanwalla');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `time_id` int(11) NOT NULL,
  `start_time` varchar(70) NOT NULL,
  `end_time` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`time_id`, `start_time`, `end_time`) VALUES
(1, '06:30 AM', '08:30 AM'),
(2, '08:00 AM', '09:00 AM'),
(3, '09:30 AM', '11:30 AM'),
(4, '10:00 AM', '11:00 AM'),
(5, '12:00 PM', '2:00 PM'),
(6, '2:30 PM', '3:30 PM'),
(7, '4:00 PM', '6:00 PM'),
(8, '05.30 PM', '06.30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(50) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `uname` varchar(70) NOT NULL,
  `password` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `image_path` text NOT NULL,
  `state` enum('active','inactive') NOT NULL,
  `utype` enum('user','driver','time_keeper','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `uname`, `password`, `contact`, `image_path`, `state`, `utype`) VALUES
(1, 'ruwan', 'ruwan@gmail.com', 'ruwan', 'ruwan123', '0778563856', '', 'active', 'driver'),
(2, 'kamal ', 'kamal@gmai.com', 'kamal', 'kamal123', '0789698596', '', 'active', 'time_keeper'),
(4, 'chamara', 'chamara@yahoo.com', 'chamara', 'chamara123', '0714585471', '', 'inactive', 'user'),
(5, 'lahiru', 'lahiru@gmail.com', 'lahiru', 'lahiru123', '0714587497', '', 'active', 'driver'),
(7, 'kasuni', 'kasuni@gmail.com', 'kasu', 'kasu123', '0704512415', '', 'active', 'user'),
(9, 'tharaka', 'tharaka@gmail.com', 'tharaka', 'tharaka123', '0779875491', '', 'active', 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `tb_id` int(70) NOT NULL,
  `uid` int(70) NOT NULL,
  `bus_number` varchar(80) NOT NULL,
  `route_id` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`tb_id`, `uid`, `bus_number`, `route_id`) VALUES
(1, 1, '2343', '1'),
(2, 2, '0', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_info`
--
ALTER TABLE `bus_info`
  ADD PRIMARY KEY (`tb_id`);

--
-- Indexes for table `route_info`
--
ALTER TABLE `route_info`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`tb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_info`
--
ALTER TABLE `bus_info`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'to identify uniquely each bus  ', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `route_info`
--
ALTER TABLE `route_info`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `tb_id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
