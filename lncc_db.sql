-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2026 at 11:53 AM
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
-- Database: `lncc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$FJSc5vj5zhFLyuvl4MUBF.nKXk1kikkSMRt3hCLGQwIoVbGcahq7W', '2026-11-06 13:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT 'Show Announcement',
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT 'assets/slider/Artboard 1.png',
  `published_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `slug`, `category`, `content`, `image`, `published_at`, `created_at`) VALUES
(1, 'Official Season Auditions Announced Across 5 Lagos Zones', 'official-season-auditions-announced', 'Auditions', 'The Lagos State Government in partnership with Bravopoints International has officially released audition dates across Ikeja, Badagry, Ikorodu, Lagos Island, and Epe.', 'assets/slider/Artboard 1.png', '2026-11-06', '2026-11-06 13:55:55'),
(2, 'Lagos State Ministry of Wealth Creation Backs N30M Grand Prize', 'ministry-wealth-creation-backs-30m-prize', 'Partnership', 'The Lagos State Government confirms its strategic partnership offering N30 million to the grand champion and N1M each to 40 bootcamp entrepreneurs.', 'assets/slider/Artboard 2.png', '2026-11-04', '2026-11-06 13:55:55'),
(3, 'Over 20 Titans and CEOs Confirmed for The Council & Mentorship', 'titans-ceos-confirmed-council-mentorship', 'The Council', 'Leading Nigerian entrepreneurs, industrialists, and investors will mentor contestants in the Colossus House and evaluate boardroom pitches.', 'assets/slider/Artboard 3.png', '2026-11-01', '2026-11-06 13:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `audition_location` varchar(100) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL,
  `business_idea` text DEFAULT NULL,
  `years_operation` varchar(50) DEFAULT NULL,
  `stage` varchar(50) DEFAULT NULL,
  `lasrra_number` varchar(100) DEFAULT NULL,
  `utility_bill` varchar(255) DEFAULT NULL,
  `government_id` varchar(255) DEFAULT NULL,
  `media_channel` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `status` enum('pending','shortlisted','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `reference_number`, `full_name`, `email`, `phone`, `gender`, `marital_status`, `dob`, `qualification`, `address`, `instagram`, `audition_location`, `business_name`, `sector`, `business_idea`, `years_operation`, `stage`, `lasrra_number`, `utility_bill`, `government_id`, `media_channel`, `profile_picture`, `status`, `created_at`) VALUES
(1, 'LNCC-2026-94809', 'DAVID ADAPOYI', 'BEULAND78@GMAIL.COM', '23563466446', 'male', '', '1996-10-16', 'bsc', '', '', 'ikeja', 'maxdvd', 'agriculture', 'gggggggggggggggggggggggggggfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '1-3', 'idea', '', 'bill_1794218363_6af1997b436dc.png', 'id_1794218363_6af1997b43d0b.jpg', '', 'profile_1794218363_6af1997b42f9d.jpg', 'shortlisted', '2026-11-09 09:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read','replied') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_number` (`reference_number`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
