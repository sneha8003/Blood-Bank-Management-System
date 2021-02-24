-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 19, 2020 at 10:04 AM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL DEFAULT '0',
  `blood_group_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `blood_group_name`) VALUES
(1, 'O+'),
(2, 'O-'),
(3, 'A+'),
(4, 'A-'),
(5, 'B+'),
(6, 'B-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `blood_stock_id` int(11) NOT NULL,
  `bag_no` int(11) NOT NULL,
  `donate_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `blood_id` int(11) NOT NULL,
  `archive_stock` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_stock`
--

INSERT INTO `blood_stock` (`blood_stock_id`, `bag_no`, `donate_date`, `expiry_date`, `blood_id`, `archive_stock`) VALUES
(1, 1003, '2020-07-01', '2020-07-12', 1, 'no'),
(2, 1011, '2020-06-16', '2020-09-24', 1, 'no'),
(3, 12, '2020-01-07', '2020-02-10', 6, 'no\r\n'),
(4, 1002, '2020-01-15', '2020-04-08', 2, 'no'),
(5, 1006, '2020-05-07', '2020-08-01', 1, 'no'),
(6, 1016, '2020-07-15', '2020-10-14', 3, 'no'),
(7, 1018, '2020-02-11', '2020-05-06', 3, 'yes'),
(8, 1017, '2020-06-10', '2020-11-18', 2, 'no'),
(9, 1015, '2020-07-01', '2020-10-13', 4, 'no'),
(10, 1010, '2020-06-16', '2020-09-15', 4, 'no'),
(11, 1013, '2020-07-07', '2020-10-07', 5, 'no'),
(12, 1014, '2020-07-07', '2020-10-08', 6, 'no'),
(13, 1007, '2020-05-06', '2020-08-13', 5, 'no'),
(14, 1009, '2020-06-10', '2020-09-04', 6, 'no'),
(15, 1001, '2020-03-11', '2020-03-11', 7, 'no'),
(16, 1008, '2020-06-17', '2020-09-02', 7, 'no'),
(17, 1005, '2020-05-07', '2020-07-31', 8, 'no'),
(18, 1012, '2020-06-16', '2020-09-30', 8, 'no'),
(19, 1004, '2020-07-02', '2020-07-21', 1, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `donation_camp`
--

CREATE TABLE `donation_camp` (
  `camp_id` int(11) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donation_camp`
--

INSERT INTO `donation_camp` (`camp_id`, `organization`, `location`, `date_time`) VALUES
(40, 'Red Cross', 'Satdobato, Kathmandu', '2020-06-10 8:00 AM - 2020-06-11 12:00 AM'),
(41, 'Blood Donor Association', 'New Baneshwor, Kathmandu', '2020-07-02 10:00 AM - 2020-07-03 12:00 AM'),
(42, 'Red Cross Society', 'Hattiban, Kathmandu', '2021-01-01 7:00 AM - 2021-01-02 12:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_photo` varchar(255) NOT NULL,
  `donor_address` varchar(255) NOT NULL,
  `donor_email` varchar(255) NOT NULL,
  `donor_contact` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `donor_gender` varchar(255) NOT NULL,
  `blood_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donor_id`, `donor_name`, `donor_photo`, `donor_address`, `donor_email`, `donor_contact`, `date_of_birth`, `donor_gender`, `blood_id`) VALUES
(1, 'Manisha Tulachan', 'manisha.png', 'Deep,Pokhara', 'manisha@gmail.com', '9832432452', '2020-07-15', 'Male', 1),
(2, 'Alisha Chaulagain', 'alisha.png', 'Kathmandu', 'alisha@gmail.com', '9845678976', '1997-06-24', 'Female', 1),
(3, 'Ashesh Shrestha', 'ashesh.png', 'Pokhara', 'ashesh@gmail.com', '9845678987', '2002-11-05', 'Male', 1),
(4, 'Gresha Shrestha', 'gresha.jpeg', 'Dharan', 'gresha@gmail.com', '9845678226', '2008-07-08', 'Female', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `name`, `address`, `email`, `contact`, `date_of_birth`, `gender`, `username`, `user_type`, `password`) VALUES
(13, 'Sneha Gauchan', 'Deep, pokhara', 'sneha@gmail.com', '9832678945', '1999-02-25', 'Female', 'sneha', 'superadmin', '$2y$10$RaEVsHjOJZHv6z/BlnsEvOyt6cYXiyT07V7vgIy9ZXhxUHGWq263a'),
(14, 'Aashraya Gauchan', 'Pokhara', 'aashraya@gmail.com', '9856378765', '2007-12-13', 'Male', 'aashraya', 'admin', '$2y$10$QfTo4.jrMY6E0MJlOx/dIuhTSqu64XJe8oDWyk3E0N.TFFe6y3XAG'),
(15, 'Lobsang Dolma', 'kapan, Kathmandu', 'lobsang@gmail.com', '9853678762', '2006-03-15', 'Female', 'lobsang', 'admin', '$2y$10$PI4GZkQ6AQbM2CHMM8vp1uvMUc.HJMvwzSfpX/CBJITokAFXMFL8W'),
(16, 'Aahana Sherchan', 'Pokhara', 'aahana@gmail.com', '9856782932', '2008-06-17', 'Female', 'aahana', 'admin', '$2y$10$4OVQzUEPtZQH6qQwgw065OfNJ1rIvaPfJY1kdg00Vh2NoSX0vh0WC'),
(17, 'Alex Gurung', 'Pokhara', 'alex@gmail.com', '9823352343', '2007-02-13', 'Male', 'alex', 'user', '$2y$10$Stzxjkqi2UD4UPGByul8yuk0B8dKyxpc0dxmlcU5Y5yqBSsLYrfUu'),
(18, 'Carol Ghale', 'Pokhara', 'carol@gmail.com', '9823256789', '2007-06-19', 'Female', 'carol', 'user', '$2y$10$xdpiix7mNnejF/NgYvTd3.S.T.OhW8C4do9fXqnR5W5M/8KGyOrXW'),
(19, 'Purnima Gururng', 'kathmandu', 'purnima@gmail.com', '9832345455', '2011-03-15', 'Female', 'purnima', 'user', '$2y$10$uxhw5HCSbzM..FUryVsI4uXwb3WidwFfidZpgvY.23hZxCqzLS2HO');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `total_bag` int(11) NOT NULL,
  `blood_required_date` varchar(25) NOT NULL,
  `request_state` varchar(255) NOT NULL DEFAULT 'request'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `username`, `total_bag`, `blood_required_date`, `request_state`) VALUES
(7, 'purnima', 1, '2020-07-01', 'Accepted'),
(8, 'purnima', 1, '2020-07-16', 'Accepted'),
(9, 'carol', 1, '2020-07-16', 'Accepted'),
(10, 'carol', 1, '2020-07-24', 'Request Sent'),
(11, 'alex', 1, '2020-07-02', 'Request Sent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`blood_stock_id`),
  ADD KEY `blood_id` (`blood_id`);

--
-- Indexes for table `donation_camp`
--
ALTER TABLE `donation_camp`
  ADD PRIMARY KEY (`camp_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `blood_id` (`blood_id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_stock`
--
ALTER TABLE `blood_stock`
  MODIFY `blood_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donation_camp`
--
ALTER TABLE `donation_camp`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD CONSTRAINT `blood_stock_ibfk_1` FOREIGN KEY (`blood_id`) REFERENCES `blood` (`blood_id`);

--
-- Constraints for table `donors`
--
ALTER TABLE `donors`
  ADD CONSTRAINT `donors_ibfk_1` FOREIGN KEY (`blood_id`) REFERENCES `blood` (`blood_id`);
