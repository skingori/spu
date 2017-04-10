-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2017 at 06:54 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(20) NOT NULL,
  `login_rank` varchar(4) NOT NULL,
  `login_password` varchar(100) NOT NULL,
  `login_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`login_id`, `login_username`, `login_rank`, `login_password`, `login_status`) VALUES
(8, 'admin', '1', '21232f297a57a5a743894a0e4a801fc3', 'Active'),
(9, 'user', '2', '81dc9bdb52d04dc20036dbd8313ed055', 'Active'),
(10, '', '2', 'd41d8cd98f00b204e9800998ecf8427e', 'Inactive'),
(11, 'anne', '2', '81dc9bdb52d04dc20036dbd8313ed055', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_table`
--

CREATE TABLE `payroll_table` (
  `payroll_id` int(11) NOT NULL,
  `payroll_user_id` varchar(20) NOT NULL,
  `payroll_hours_worked` varchar(20) NOT NULL,
  `payroll_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_table`
--

INSERT INTO `payroll_table` (`payroll_id`, `payroll_user_id`, `payroll_hours_worked`, `payroll_date`) VALUES
(1, 'xxxxxxxxxx', '30', '2017-04-21'),
(2, '23864287', '45', '2017-04-08'),
(3, '23864287', '900', '2017-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `user_attendance`
--

CREATE TABLE `user_attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_user_id` varchar(20) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `attendance_mode` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_attendance`
--

INSERT INTO `user_attendance` (`attendance_id`, `attendance_user_id`, `attendance_date`, `attendance_time`, `attendance_mode`) VALUES
(20, '12345678-90-1990', '2005-07-12', '2017-04-03 11:10:51', 'walkin-clockin'),
(21, '12345678-90-1990', '2017-04-03', '2017-04-03 11:42:47', 'walkin-clockout'),
(22, '12345678-90-1990', '2017-04-03', '2017-04-03 14:06:22', 'walkin-clockin'),
(23, '12345678-90-1990', '2017-04-04', '2017-04-04 06:22:31', 'walkin-clockin'),
(24, '12345678-90-1990', '2017-04-04', '2017-04-04 14:35:42', 'walkin-clockin'),
(25, '12345678-90-1990', '2017-04-04', '2017-04-04 14:43:38', 'walkin-clockout'),
(26, '1234', '2017-04-04', '2017-04-04 14:43:51', 'walkin-clockin'),
(27, '1234', '2017-04-04', '2017-04-04 14:46:18', 'walkin-clockout'),
(28, '1234', '2017-04-04', '2017-04-04 14:46:28', 'walkin-clockin'),
(29, '1234', '2017-04-04', '2017-04-04 14:51:06', 'walkin-clockout'),
(30, '12345678-90-1990', '2017-04-05', '2017-04-05 18:35:30', 'walkin-clockin'),
(31, '724090774', '2017-04-06', '2017-04-06 05:05:37', 'walkin-clockout'),
(32, '724090774', '2017-04-06', '2017-04-06 05:05:43', 'walkin-clockin'),
(33, '123', '2017-04-07', '2017-04-07 07:47:31', 'walkin-clockin'),
(34, '1232', '2017-04-07', '2017-04-07 07:48:03', 'walkin-clockin'),
(35, '1232', '2017-04-07', '2017-04-07 07:48:07', 'walkin-clockout'),
(36, '1232', '2017-04-07', '2017-04-07 07:48:13', 'walkin-clockin'),
(37, '2', '2017-04-07', '2017-04-07 07:48:23', 'walkin-clockout'),
(38, '232323', '2017-04-07', '2017-04-07 07:48:28', 'walkin-clockout'),
(39, '232323232', '2017-04-07', '2017-04-07 07:48:32', 'walkin-clockout'),
(40, '232323232', '2017-04-07', '2017-04-07 07:48:36', 'walkin-clockin'),
(41, '724090774', '2017-04-07', '2017-04-07 07:59:11', 'walkin-clockin'),
(42, '12445666', '2017-04-07', '2017-04-07 08:39:16', 'walkin-clockout'),
(43, '12445666', '2017-04-07', '2017-04-07 08:39:28', 'walkin-clockout'),
(44, '724090774', '2017-04-07', '2017-04-07 08:39:52', 'walkin-clockout'),
(45, '724090774', '2017-04-07', '2017-04-07 08:39:55', 'walkin-clockin'),
(46, 'login_username', '2017-04-07', '2017-04-07 09:28:30', 'walkin-clockout'),
(47, '724090774', '2017-04-07', '2017-04-07 09:28:43', 'walkin-clockin'),
(48, '724090774', '2017-04-07', '2017-04-07 10:48:36', 'walkin-clockin'),
(49, '724090774', '2017-04-07', '2017-04-07 11:04:32', 'walkin-clockout'),
(50, '724090774', '2017-04-07', '2017-04-07 11:04:38', 'walkin-clockin'),
(51, '724090774', '2017-04-07', '2017-04-07 11:06:06', 'walkin-clockout'),
(52, '724090774', '2017-04-07', '2017-04-07 11:06:12', 'walkin-clockin'),
(53, '724090774', '2017-04-07', '2017-04-07 11:13:23', 'walkin-clockout'),
(54, '724090774', '2017-04-07', '2017-04-07 11:13:28', 'walkin-clockin'),
(55, '724090774', '2017-04-07', '2017-04-07 11:20:56', 'walkin-clockin'),
(56, '724090774', '2017-04-07', '2017-04-07 11:24:13', 'walkin-clockin'),
(57, '12445666', '2017-04-07', '2017-04-07 16:14:33', 'walkin-clockout'),
(58, '07240907', '2017-04-07', '2017-04-07 16:17:07', 'walkin-clockin'),
(59, '724090774', '2017-04-08', '2017-04-08 05:20:55', 'walkin-clockout'),
(60, '07240907', '2017-04-08', '2017-04-08 05:21:44', 'walkin-clockin'),
(61, '07240907', '2017-04-08', '2017-04-08 05:45:38', 'walkin-clockin'),
(62, '0724090774', '2017-04-08', '2017-04-08 08:06:22', 'walkin-clockin'),
(63, '23864287', '2017-04-08', '2017-04-08 08:22:56', 'walkin-clockin'),
(64, 'xxxxxxxxxx', '2017-04-08', '2017-04-08 14:51:36', 'walkin-clockin'),
(65, 'xxxxxxxxxx', '2017-04-08', '2017-04-08 14:52:01', 'walkin-clockout'),
(66, 'xxxxxxxxxx', '2017-04-08', '2017-04-08 14:52:05', 'walkin-clockin'),
(67, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 08:06:31', 'walkin-clockin'),
(68, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 08:07:14', 'walkin-clockin'),
(69, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:42:12', 'walkin-clockin'),
(70, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:44:09', 'walkin-clockin'),
(71, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:46:02', 'walkin-clockout'),
(72, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:46:08', 'walkin-clockin'),
(73, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:47:56', 'walkin-clockin'),
(74, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:49:41', 'walkin-clockout'),
(75, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:49:45', 'walkin-clockin'),
(76, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:50:11', 'walkin-clockout'),
(77, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:50:14', 'walkin-clockin'),
(78, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:53:01', 'walkin-clockout'),
(79, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:53:04', 'walkin-clockin'),
(80, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:55:41', 'walkin-clockout'),
(81, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:55:44', 'walkin-clockin'),
(82, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:56:56', 'walkin-clockin'),
(83, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:58:07', 'walkin-clockout'),
(84, 'xxxxxxxxxx', '2017-04-09', '2017-04-09 09:58:10', 'walkin-clockin');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_payrollnumber` varchar(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_fingerprint` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_firstname`, `user_lastname`, `user_username`, `user_payrollnumber`, `user_email`, `user_phone`, `user_fingerprint`) VALUES
(1, 'samson', 'Coder', 'admin', '0724090774', 'infor.samson@gmail.com', '0724090774', ''),
(2, 'user', 'user', 'anne', 'xxxxxxxxxx', 'x@x.com', '1234567890', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `payroll_table`
--
ALTER TABLE `payroll_table`
  ADD PRIMARY KEY (`payroll_id`),
  ADD KEY `payroll_id` (`payroll_id`);

--
-- Indexes for table `user_attendance`
--
ALTER TABLE `user_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `attendance_id` (`attendance_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payroll_table`
--
ALTER TABLE `payroll_table`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_attendance`
--
ALTER TABLE `user_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;