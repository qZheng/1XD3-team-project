-- phpMyAdmin SQL Dump
-- version 5.2.2-1.el9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2025 at 01:48 PM
-- Server version: 9.1.0-commercial
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zhengq42_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `interested_in_group_performance` tinyint(1) DEFAULT NULL,
  `volunteer_since` date DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `sax` tinyint(1) NOT NULL,
  `percussion` tinyint(1) NOT NULL,
  `violin` tinyint(1) NOT NULL,
  `piano` tinyint(1) NOT NULL,
  `guitar` tinyint(1) NOT NULL,
  `voice` tinyint(1) NOT NULL,
  `other` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
