-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2020 at 02:30 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` varchar(100) NOT NULL,
  `ticket_type` varchar(100) NOT NULL,
  `ticket_price` int(10) NOT NULL,
  `ticket_desc` text NOT NULL,
  `ticket_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_type`, `ticket_price`, `ticket_desc`, `ticket_qty`) VALUES
('GA001', 'General Admission', 39, '10 glowtick\r\n\r\nFree mineral water', 5000),
('VIP001', 'VIP', 99, 'Exclusive Viewing Area\r\n\r\nLunch and Drink coupons\r\n\r\nLockers (free of charge, limited quantity available)\r\n\r\nBackstage Access\r\n\r\nVIP Lounge', 5000),
('VIPL001', 'VIP Lite', 49, 'Exclusive Viewing Area\r\n\r\nLunch and Drink coupons\r\n\r\nLockers (free of charge, limited quantity available)', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `gender` text NOT NULL,
  `ticket_no` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `fname`, `lname`, `usertype`, `phoneno`, `gender`, `ticket_no`) VALUES
('a@a.com', '123', 'Test', 'Testo Acc', 'Admin', '01234567890', 'male', NULL),
('admin@test.com', '123', 'SDFG', 'HJKL', 'User', '11111111111', 'female', NULL),
('aiman.dragonz@gmail.com', 'abc123', 'Muhamad Aiman', 'Remy Shahar', 'Admin', '01110056051', 'Male', NULL),
('b@b.b', '123', 'Bboy', 'Boboy', 'User', '1234567890', 'male', NULL),
('mushio@gmail.com', '123', 'Mushio', 'Umaga', 'user', '0123456789', 'male', NULL),
('qwerty@a.com', '123', 'Qwerty', 'Test', 'User', '12344567789', 'female', NULL),
('test@a.com', '123', 'Test User', 'User First', 'User', '01234567890', 'male', NULL),
('testuser@user.com', '123', 'User', 'Test Acc', 'User', '01234567890', 'female', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_ticket`
--

CREATE TABLE `user_ticket` (
  `ticket_no` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ticket_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ticket_no` (`ticket_no`);

--
-- Indexes for table `user_ticket`
--
ALTER TABLE `user_ticket`
  ADD PRIMARY KEY (`ticket_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_ticket`
--
ALTER TABLE `user_ticket`
  MODIFY `ticket_no` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ticket_no`) REFERENCES `user_ticket` (`ticket_no`);

--
-- Constraints for table `user_ticket`
--
ALTER TABLE `user_ticket`
  ADD CONSTRAINT `user_ticket_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `user_ticket_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
