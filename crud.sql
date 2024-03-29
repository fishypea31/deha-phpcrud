-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 10:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `username`, `email`, `phone`, `password`) VALUES
(2, 'hoang nhat', 'hoangnhat', 'hoangnhat@gmail.com', 1999999, '1234'),
(3, 'Do Ngoc Tuan Anh', 'fishypeas', 'dntanh0@gmail.com', 199999999, 'c3535febaff29fcb7c0d'),
(5, 'Do Ngoc Tuan Anh', 'fishypeas', 'dntanh0@gmail.com', 199999999, '2110'),
(6, 'nguyen quang ngoc', 'thangcuty', 'ty@gmail.com', 199999999, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `passwords`) VALUES
(1, 'dntanh', 'ta@gmail.com', '9d5103e888c6a49a8de7c973e486553e'),
(2, 'duyduong', 'dnd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'maico', 'maico@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'lucminhtu', 'lumintus@gmail.com', '065b31e345762f2bf7d2274ce7e90bdf'),
(5, 'pduyanh', 'muoi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'hungtrung', 'hungtrung@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'lamduong', 'lamduong@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'long', 'long@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'dat', 'dat@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'ductrong', 'ductrong@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'fishypeas', 'dntanh10@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
