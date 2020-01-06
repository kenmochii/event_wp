-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2020 at 07:09 PM
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
('GA001', 'General Admission', 39, '10 glowtick and free mineral water', 10),
('SUL001', 'Sultan VIP', 88, 'All area privileges and dinner with DJs', 10),
('VIP001', 'VIP', 99, 'Exclusive backstage entry', 10);

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
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `fname`, `lname`, `usertype`, `phoneno`, `gender`) VALUES
('a@a.com', '123', 'AAAA', 'Testo Account', 'Admin', '012345678', 'male'),
('abdul@gmail.com', '123', 'abdul', 'aimanudinnudin', 'User', '0176903894', 'male'),
('admin@test.com', '123', 'SDFG', 'HJKL', 'User', '11111111111', 'male'),
('aiman.dragonz@gmail.com', 'abc123', 'Muhamad Aiman', 'Remy Shahar', 'Admin', '01110056051', 'Male'),
('aimannur@gmail.com', '123', 'aiman', 'nur', 'User', '123102973', 'male'),
('ayam@gmail.com', '123', 'amir', 'ayam', 'User', '012381288631', 'male'),
('b@b.b', '123', 'Boboiboy Kuasa Empat', 'Mutcho', 'User', '0123456789', 'male'),
('kam@gmail.com', '123', 'Kambing', 'Besar', 'User', '123', 'Male'),
('kucing@gmail.com', '123', 'Kucing', 'Parsi', 'User', '01221345832', 'Female'),
('lembu@gmail.com', '123', 'Lembu Nate', 'Gerilla', 'User', '123', 'Male'),
('mushio@gmail.com', '123', 'Mushio', 'Umaga', 'User', '0123456789', 'male'),
('qw@gmail.com', '123', 'qw', 'wq', 'User', '1111111111', 'Male'),
('qwerty@a.com', '123', 'Qwerty', 'Test', 'User', '12344567789', 'female'),
('tak@gmail.com', '123', 'Nama Saiya Aimi', 'Takksukha Awwak', 'User', '0188767755', 'male'),
('test@a.com', '123', 'Test User', 'User First', 'User', '01234567890', 'male'),
('testuser@user.com', '123', 'User', 'Test Acc', 'User', '01234567890', 'female'),
('z@z.z', '123', 'adik saya', 'hudoh', 'User', '123321', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `user_ticket`
--

CREATE TABLE `user_ticket` (
  `purchase_id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ticket_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_ticket`
--

INSERT INTO `user_ticket` (`purchase_id`, `fname`, `email`, `ticket_id`) VALUES
(53, 'Nama Saiya', 'tak@gmail.com', 'GA001'),
(54, 'Nama Saiya', 'tak@gmail.com', 'SUL001'),
(55, 'Nama Saiya', 'tak@gmail.com', 'VIP001'),
(57, 'Nama Saiya', 'tak@gmail.com', 'GA001'),
(58, 'Nama Saiya', 'tak@gmail.com', 'SUL001'),
(59, 'Lembu Nate', 'lembu@gmail.com', 'GA001'),
(60, 'Lembu Nate', 'lembu@gmail.com', 'GA001'),
(61, 'Lembu Nate', 'lembu@gmail.com', 'GA001'),
(62, 'Lembu Nate', 'lembu@gmail.com', 'GA001'),
(63, 'Lembu Nate', 'lembu@gmail.com', 'GA001'),
(64, 'Lembu Nate', 'lembu@gmail.com', 'GA001'),
(65, 'abdul', 'abdul@gmail.com', 'GA001'),
(66, 'abdul', 'abdul@gmail.com', 'GA001');

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
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_ticket`
--
ALTER TABLE `user_ticket`
  ADD UNIQUE KEY `purchase_id` (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_ticket`
--
ALTER TABLE `user_ticket`
  MODIFY `purchase_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
