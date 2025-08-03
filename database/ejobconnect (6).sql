-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 06:19 AM
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
-- Database: `ejobconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(250) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `attemp` int(250) NOT NULL,
  `reset_token` varchar(500) NOT NULL,
  `token_expiry` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `attemp`, `reset_token`, `token_expiry`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '4052e09931ceddc2963e2524ee2a2bc7', 'admin', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(250) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `cp_number` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `attemp` int(250) NOT NULL,
  `reset_token` varchar(500) NOT NULL,
  `token_expiry` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `firstname`, `lastname`, `email`, `cp_number`, `address`, `password`, `type`, `attemp`, `reset_token`, `token_expiry`, `status`) VALUES
(5, 'Alexanders', 'Avendano', 'a.avendano008@gmail.com', '09558456111', 'ph2 blk38 lot 31 Southville 4 Brgy. Pooc Sta.rosa Laguna', 'd0c7061e489f8f272328517d9c923729', 'applicant', 0, '87ca0a9213e4bc950ef2e6f351a017e3', '2025-08-03 12:27:10', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(250) NOT NULL,
  `applicant_id` varchar(500) NOT NULL,
  `posting_id` varchar(500) NOT NULL,
  `file_location` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(250) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `attemp` int(250) NOT NULL,
  `reset_token` varchar(500) NOT NULL,
  `token_expiry` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `attemp`, `reset_token`, `token_expiry`, `status`) VALUES
(1, 'employer', 'employer', 'employer@gmail.com', '4052e09931ceddc2963e2524ee2a2bc7', 'employer', 0, '', '', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(250) NOT NULL,
  `employer_id` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `date_registered` varchar(500) NOT NULL,
  `date_created` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `tagify` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `employer_id`, `title`, `description`, `date_registered`, `date_created`, `status`, `tagify`) VALUES
(13, '1', 'I.T. Solutions', '<p><span style=\"font-size: 24pt;\"><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfJhl_DCV72DVplfwf5fRYBeuPDtajlZJnoQ&amp;s\" alt=\"SM City Santa Rosa added a new photo. - SM City Santa Rosa\" width=\"267\" height=\"267\"></strong></span></p>\n<p><span style=\"font-size: 24pt;\"><strong>Looking For Web developer</strong></span></p>\n<p><span style=\"font-size: 12pt;\">knowledgeable in PHP,JS,worddpress</span></p>\n<p><span style=\"font-size: 12pt;\">25k starting salary</span></p>', '', '2025-08-01 19:14:17', 'approved', 'test,'),
(18, '1', 'I.T. Solutions', '<p><span style=\"font-size: 24pt;\"><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfJhl_DCV72DVplfwf5fRYBeuPDtajlZJnoQ&amp;s\" alt=\"SM City Santa Rosa added a new photo. - SM City Santa Rosa\" width=\"267\" height=\"267\"></strong></span></p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Looking For Web developer</strong></span></p>\r\n<p><span style=\"font-size: 12pt;\">knowledgeable in PHP,JS,worddpress</span></p>\r\n<p><span style=\"font-size: 12pt;\">25k starting salary</span></p>', '', '2025-08-01 19:14:17', 'approved', 'test,'),
(19, '1', 'I.T. Solutions', '<p><span style=\"font-size: 24pt;\"><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfJhl_DCV72DVplfwf5fRYBeuPDtajlZJnoQ&amp;s\" alt=\"SM City Santa Rosa added a new photo. - SM City Santa Rosa\" width=\"267\" height=\"267\"></strong></span></p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Looking For Web developer</strong></span></p>\r\n<p><span style=\"font-size: 12pt;\">knowledgeable in PHP,JS,worddpress</span></p>\r\n<p><span style=\"font-size: 12pt;\">25k starting salary</span></p>', '', '2025-08-01 19:14:17', 'approved', 'test,'),
(20, '1', 'I.T. Solutions', '<p><span style=\"font-size: 24pt;\"><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfJhl_DCV72DVplfwf5fRYBeuPDtajlZJnoQ&amp;s\" alt=\"SM City Santa Rosa added a new photo. - SM City Santa Rosa\" width=\"267\" height=\"267\"></strong></span></p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Looking For Web developer</strong></span></p>\r\n<p><span style=\"font-size: 12pt;\">knowledgeable in PHP,JS,worddpress</span></p>\r\n<p><span style=\"font-size: 12pt;\">25k starting salary</span></p>', '', '2025-08-01 19:14:17', 'approved', 'test,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
