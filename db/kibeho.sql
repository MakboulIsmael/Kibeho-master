-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 06:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kibeho`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `usertype`, `email`, `password`) VALUES
(1, 'admin', 'egide@gmail.com', '123@Egide');

-- --------------------------------------------------------

--
-- Table structure for table `christian`
--

CREATE TABLE `christian` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `size` int(20) NOT NULL,
  `downloads` int(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `christian`
--

INSERT INTO `christian` (`id`, `name`, `size`, `downloads`, `phone`, `email`) VALUES
(1, 'Image 06.png', 3313569, 0, '0780527666', 'makbur406@gmail.com'),
(2, 'IMG_20201225_232951_', 69402, 0, '0789555584', 'nana@gmail.com'),
(3, 'Image 13.png', 3334448, 0, '0786451217', 'egide@gmail.com'),
(4, 'Image 12.png', 3415520, 0, '0780527555', 'nishimwemarie2018@gm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mak` varchar(20) NOT NULL,
  `account` mediumtext NOT NULL,
  `nameFirst` mediumtext NOT NULL,
  `nameLast` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `phone` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `gender` mediumtext NOT NULL,
  `date` date NOT NULL,
  `service` mediumtext NOT NULL,
  `diocese` mediumtext NOT NULL,
  `country` mediumtext NOT NULL,
  `province` mediumtext NOT NULL,
  `district` mediumtext NOT NULL,
  `sector` mediumtext NOT NULL,
  `cell` mediumtext NOT NULL,
  `village` mediumtext NOT NULL,
  `photo` mediumtext NOT NULL,
  `details` mediumtext NOT NULL,
  `timeCreated` mediumtext NOT NULL DEFAULT current_timestamp(),
  `timeEdited` mediumtext NOT NULL DEFAULT current_timestamp(),
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `mak`, `account`, `nameFirst`, `nameLast`, `name`, `phone`, `userid`, `gender`, `date`, `service`, `diocese`, `country`, `province`, `district`, `sector`, `cell`, `village`, `photo`, `details`, `timeCreated`, `timeEdited`, `status`) VALUES
(20, '', 'KBH-32074', 'Christian', 'Metero', 'Aloys', 'Metero Aloys', '', 780527666, 'Male', '2022-04-20', '7:00 AM', '', 'Aruba', '', '', '', '', '', '', '', '2022-04-13 01:13:31', '2022-04-13 01:13:31', 0),
(21, '', 'KBH-50197', 'Christian', 'kwizera', 'Jean', 'kwizera Jean', '', 789555584, 'Male', '2022-04-24', '10:00 AM', '', 'Bahrain', '', '', '', '', '', '', '', '2022-04-13 17:52:45', '2022-04-13 17:52:45', 0),
(22, '', 'KBH-92736', 'Christian', 'Mozes', 'Emma', 'Mozes Emma', '0780527666', 1, 'Male', '2022-04-20', '10:00 AM', '', 'Bahrain', '', '', '', '', '', '', '', '2022-04-16 22:06:51', '2022-04-16 22:06:51', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `christian`
--
ALTER TABLE `christian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `christian`
--
ALTER TABLE `christian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
