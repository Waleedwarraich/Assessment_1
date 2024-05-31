-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 05:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hikesvictoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `hikes`
--

CREATE TABLE `hikes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hikename` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `caption` varchar(100) NOT NULL,
  `distance` double NOT NULL,
  `level` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hikes`
--

INSERT INTO `hikes` (`id`, `user_id`, `hikename`, `description`, `caption`, `distance`, `level`, `location`, `image`) VALUES
(5, 7, 'Yen Gill32543534', 'Impedit nulla deser', 'Incididunt dolores e', 96, 'Easy', 'Dicta accusamus pari', 'images/438118098_758878343101052_4548048176246370961_n.jpg'),
(6, 7, 'Jorden Raymond', 'Ad proident sint en', 'Qui non adipisci off', 10, 'hard', 'Commodi irure amet ', 'images/closer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(120) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `gender`, `password`) VALUES
(7, 'Victor Love', 'mohsin@gmail.com', 'Male', '$2y$10$q8d.BNwXXnBLn8OrdrCOJ.ndw4ErKmaLdu6sJBzu/TREYi34V26QW'),
(8, 'Mannix Boone', 'pawicav@mailinator.com', 'Female', '$2y$10$VP9TTUCKWDXQbGj53k.kHOY.DHZyWMif5oj9KT6zPnXUI9x06Ldfy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hikes`
--
ALTER TABLE `hikes`
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
-- AUTO_INCREMENT for table `hikes`
--
ALTER TABLE `hikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
