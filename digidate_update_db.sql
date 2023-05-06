-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 08:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digidate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `gender_id` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`gender_id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'X');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`tag_id`, `tag_name`) VALUES
(1, 'Sport'),
(2, 'Koken'),
(3, 'Werk'),
(4, 'Reizen'),
(5, 'Eten'),
(6, 'Muziek'),
(7, 'Familie'),
(8, 'Nelfix'),
(9, 'Dieren'),
(10, 'Vissen'),
(11, 'Voetbal'),
(12, 'Boeken'),
(13, 'Student'),
(14, 'Roken'),
(15, 'Uitgaant'),
(16, 'Feesten'),
(17, 'Comedie'),
(18, 'Concerten'),
(19, 'Gamen'),
(20, 'Camperen'),
(21, 'Avontuur'),
(22, 'Wijn'),
(23, 'Bier'),
(24, 'God'),
(25, 'Tattoo\'s'),
(26, 'Gym'),
(27, 'Anime'),
(28, 'Shoppen'),
(29, 'Politiek'),
(30, 'Yoga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_phone_number` int(20) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(8) NOT NULL DEFAULT 'user',
  `user_payed` tinyint(1) NOT NULL,
  `user_blocked` tinyint(1) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_accepted` tinyint(1) DEFAULT NULL,
  `user_gender` varchar(15) NOT NULL,
  `user_preference` varchar(15) NOT NULL,
  `user_photo` mediumblob NOT NULL,
  `user_tags` set('Anime','Avontuur','bier','boeken','netflix','Politiek','Anime','Avontuur','bier','boeken','boeken','camperen','comedie','concerten','Dieren','Eten','Familie','Feesten','gamen','god','gym','koken','muziek') NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `random` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `gender_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
