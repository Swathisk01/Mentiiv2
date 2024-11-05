-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 01:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentii`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `text_answer` text DEFAULT NULL,
  `audio_path` varchar(255) DEFAULT NULL,
  `sentiment_score` float DEFAULT NULL,
  `sentiment_label` varchar(50) DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `user_id`, `day`, `text_answer`, `audio_path`, `sentiment_score`, `sentiment_label`, `submitted_at`) VALUES
(1, 1, 7, 'no really', NULL, -0.1, 'Negative', '2024-10-20 16:52:37'),
(2, 1, 7, 'great', NULL, 0.8, 'Positive', '2024-10-20 17:19:08'),
(4, 1, 7, 'yes i feel ', NULL, 0, 'Neutral', '2024-10-26 09:26:36'),
(5, 1, 7, 'no not i want to sit alone', NULL, 0, 'Neutral', '2024-10-26 09:35:36'),
(6, 1, 7, 'i want to sit alone', NULL, 0, 'Neutral', '2024-10-26 09:51:45'),
(7, 1, 7, 'Good', NULL, 0.7, 'Positive', '2024-10-28 14:37:59'),
(8, 1, 7, 'was good ', NULL, 0.7, 'Positive', '2024-11-04 12:09:33'),
(11, 1, 7, 'yes', NULL, 0, 'Neutral', '2024-11-04 13:09:38'),
(12, 1, 7, 'yes', NULL, 0, 'Neutral', '2024-11-04 13:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Swathi', '$2y$10$O2HNFU3j.MvWsRL0TGHFHO8rSWjSbIjLlEDHmqetebbgea8kdBRiy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
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
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
