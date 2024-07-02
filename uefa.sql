-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 05:06 PM
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
-- Database: `uefa`
--

-- --------------------------------------------------------

--
-- Table structure for table `klasemen`
--

CREATE TABLE `klasemen` (
  `id` int(11) NOT NULL,
  `group_name` varchar(10) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `wins` int(11) DEFAULT NULL,
  `draws` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klasemen`
--

INSERT INTO `klasemen` (`id`, `group_name`, `country_name`, `wins`, `draws`, `losses`, `points`) VALUES
(1, 'B', NULL, NULL, NULL, NULL, NULL),
(2, 'C', NULL, NULL, NULL, NULL, NULL),
(3, 'A', NULL, NULL, NULL, NULL, NULL),
(4, 'D', NULL, NULL, NULL, NULL, NULL),
(5, 'C', NULL, NULL, NULL, NULL, NULL),
(6, 'B', 'A', 2, 0, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `password`) VALUES
(1, '211011400', 'admin'),
(2, '211011400941', '$2y$10$i2VC4eBm/WMk5z4NCt6ApOSZDBB6oc8uLlwuLbBNpgwipef0wHZmy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klasemen`
--
ALTER TABLE `klasemen`
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
-- AUTO_INCREMENT for table `klasemen`
--
ALTER TABLE `klasemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
