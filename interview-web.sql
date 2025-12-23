-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2025 at 03:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `networks`
--

CREATE TABLE `networks` (
  `id` int(11) NOT NULL,
  `ip_address_device` varchar(50) DEFAULT NULL,
  `gateway` varchar(50) DEFAULT NULL,
  `dns` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `networks`
--

INSERT INTO `networks` (`id`, `ip_address_device`, `gateway`, `dns`, `created_at`, `updated_at`) VALUES
(2, '1231431310', '2147483647', '2147483647', '2025-12-20 17:22:46', '2025-12-20 17:22:46'),
(3, '192.168.245.011', '10.10.99', '172.168.254.89', '2025-12-20 17:31:58', '2025-12-20 17:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `olts`
--

CREATE TABLE `olts` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `grup` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `vendor` varchar(50) DEFAULT NULL,
  `firmware` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Offline',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `olts`
--

INSERT INTO `olts` (`id`, `description`, `grup`, `model`, `ip_address`, `vendor`, `firmware`, `status`, `created_at`, `updated_at`) VALUES
(2, 'PUSH-3843-3940', 'BYD', 'JDM03221', '192.177.39.09', 'V.1.0.2.', '22', 'Online', '2025-12-20 22:21:59', '2025-12-20 23:25:06'),
(3, '3314SDADE333', 'grub 1', '33FFGR', '192.29.03.00', 'V.1.1.3.4', '12', 'Online', '2025-12-20 22:23:11', '2025-12-20 23:25:25'),
(5, 'PUSH-3843-3940111', '111', '111', '111', '111', '111', 'Online', '2025-12-22 13:45:41', '2025-12-22 13:45:41'),
(6, 'DESC1', 'grub 1 desc', 'model desc', '192.29.03.00', 'npci', '12', 'Online', '2025-12-22 13:46:38', '2025-12-22 13:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `onus`
--

CREATE TABLE `onus` (
  `id` int(11) NOT NULL,
  `id_olt` int(11) NOT NULL,
  `id_wifi` int(11) NOT NULL,
  `id_network` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `pon_number` varchar(100) DEFAULT NULL,
  `sn` varchar(100) DEFAULT NULL,
  `mac` varchar(100) DEFAULT NULL,
  `vendor` varchar(100) DEFAULT NULL,
  `status_tr` varchar(20) DEFAULT 'Offline',
  `status_omci` varchar(20) DEFAULT 'Offline',
  `rx` varchar(20) DEFAULT NULL,
  `tx` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `onus`
--

INSERT INTO `onus` (`id`, `id_olt`, `id_wifi`, `id_network`, `name`, `description`, `pon_number`, `sn`, `mac`, `vendor`, `status_tr`, `status_omci`, `rx`, `tx`, `created_at`, `updated_at`) VALUES
(12, 3, 7, 3, 'adit', 'PUSH-3843-3940', '0/0/1', 'AHM24412', 'D0:92:1A:00', 'V.14.10.11', 'Online', 'Offline', '2', '3', '2025-12-21 09:09:23', '2025-12-21 09:09:23'),
(19, 2, 2, 2, 'adit', 'Astra Honda Motor', '222222222222222333', '542524', '42524', 'npci', 'Offline', 'Online', '32', '2', '2025-12-23 21:37:44', '2025-12-23 21:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`) VALUES
(1, 'e3qeq3e', 'ad@gmail.com', '243141', 1),
(2, 'aditya', 'aditya@gmail.com', '112131', 1),
(3, 'brian', 'brian@gmail.com', '112131', 1),
(4, 'admin2', 'admin@gmail.com', 'Admin123*', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wifis`
--

CREATE TABLE `wifis` (
  `id` int(11) NOT NULL,
  `wifi_name` varchar(50) DEFAULT NULL,
  `wifi_password` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wifis`
--

INSERT INTO `wifis` (`id`, `wifi_name`, `wifi_password`, `created_at`, `updated_at`) VALUES
(1, 'ini nama wifiqqq', '$2y$10$UVM9TSrfXT70lUz5fRR//.Lg4LAHNz4uLOS6LuOlvtE', '2025-12-20 16:24:34', '2025-12-20 16:38:44'),
(2, 'nama wifi2', 'pass wiifi2', '2025-12-20 16:27:35', '2025-12-20 16:27:35'),
(3, 'ini nama wifi3', 'pass wifi3', '2025-12-20 16:28:47', '2025-12-20 16:28:47'),
(4, 'ini nama wifi4', 'pass wifi4', '2025-12-20 16:28:54', '2025-12-20 16:28:54'),
(6, 'ini nama wifi211', '$2y$10$JByr.DQ/gLBgXOPHQqDGReoHm7MoR88D10itRirdrwU', '2025-12-20 16:33:08', '2025-12-20 16:33:08'),
(7, 'DADEA', '$2y$10$bLzkMBvVAblB8Mdjh0uBTu4PDhP2ADv4JcvwjcNGfo.', '2025-12-20 16:39:16', '2025-12-20 16:39:16'),
(8, 'da3edq3', '$2y$10$YLfzNXi/x88e.d/RMJqHkO4eHjmjX8lGnhd/kWOwkk2', '2025-12-23 21:38:58', '2025-12-23 21:38:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `networks`
--
ALTER TABLE `networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olts`
--
ALTER TABLE `olts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onus`
--
ALTER TABLE `onus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_OLT` (`id_olt`),
  ADD UNIQUE KEY `id_wifi` (`id_wifi`),
  ADD UNIQUE KEY `id_network` (`id_network`),
  ADD UNIQUE KEY `id_wifi_2` (`id_wifi`,`id_network`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wifis`
--
ALTER TABLE `wifis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `networks`
--
ALTER TABLE `networks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `olts`
--
ALTER TABLE `olts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `onus`
--
ALTER TABLE `onus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wifis`
--
ALTER TABLE `wifis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `onus`
--
ALTER TABLE `onus`
  ADD CONSTRAINT `id_olt` FOREIGN KEY (`id_olt`) REFERENCES `olts` (`id`),
  ADD CONSTRAINT `onus_ibfk_1` FOREIGN KEY (`id_wifi`) REFERENCES `wifis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onus_ibfk_2` FOREIGN KEY (`id_network`) REFERENCES `networks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
