-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 07:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `account` mediumtext NOT NULL,
  `nameFirst` mediumtext NOT NULL,
  `nameLast` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `phone` int(11) NOT NULL,
  `email` mediumtext DEFAULT NULL,
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

INSERT INTO `users` (`id`, `username`, `password`, `account`, `nameFirst`, `nameLast`, `name`, `phone`, `email`, `gender`, `date`, `service`, `diocese`, `country`, `province`, `district`, `sector`, `cell`, `village`, `photo`, `details`, `timeCreated`, `timeEdited`, `status`) VALUES
(1, 'karima jacque-0786451217-Male', '0786451217', 'Christian', 'karima', 'jacque', 'karima jacque', 786451217, 'eagleb382@gmail.com', 'Male', '0000-00-00', '8:00 AM', 'Diocese of Butare', 'Rwanda', 'SOUTH', 'Nyanza', 'Kibilizi', 'Cyeru', 'Nyamunini', '', '', '2021-09-14 19:00:58', '2021-09-14 19:00:58', 0),
(2, 'kariku bonna-788888-Male', '788888', 'Christian', 'kariku', 'bonna', 'kariku bonna', 788888, 'hhag@ahfhf.com', 'Male', '2021-09-06', '11:00 AM', '', 'Antigua and Barbuda', '', '', '', '', '', '', '', '2021-09-14 19:37:29', '2021-09-14 19:37:29', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
