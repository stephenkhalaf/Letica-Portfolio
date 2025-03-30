-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 10:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letica`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `unique_id`, `full_name`, `email`, `password`, `image`, `type`) VALUES
(2, 1722796536, 'Stephen Khalaf ', 'stephenkhalaf@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '17227965364ubtqqaxh0.jpg', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `unique_id`, `image`, `type`) VALUES
(11, 1724198503, '1724198503s1.jpg', 'Selfies'),
(12, 1724198514, '1724198514m1.jpg', 'Quotes'),
(13, 1724198526, '1724198526s2.jpg', 'Selfies'),
(14, 1724198538, '1724198538s3.jpg', 'Selfies'),
(15, 1724198552, '1724198552s4.jpg', 'Selfies'),
(16, 1724198569, '1724198569m2.jpg', 'Quotes'),
(17, 1724198579, '1724198579m3.jpg', 'Quotes'),
(18, 1724198589, '1724198589m4.jpg', 'Quotes'),
(19, 1724198600, '1724198600m5.jpg', 'Quotes'),
(20, 1724198611, '1724198611s5.jpg', 'Selfies'),
(21, 1724198621, '1724198621s6.jpg', 'Selfies'),
(22, 1724198632, '1724198632s7.jpg', 'Selfies'),
(23, 1724198641, '1724198641s8.jpg', 'Selfies'),
(24, 1724198650, '1724198650s9.jpg', 'Selfies'),
(25, 1724198662, '1724198662s10.jpg', 'Selfies'),
(26, 1724198691, '1724198691m6.jpg', 'Quotes'),
(27, 1724198700, '1724198700m7.jpg', 'Quotes'),
(28, 1724198708, '1724198708m8.jpg', 'Quotes'),
(29, 1724198720, '1724198720m9.jpg', 'Quotes'),
(30, 1724198734, '1724198734m10.jpg', 'Quotes'),
(31, 1724198743, '1724198743m11.jpg', 'Quotes'),
(32, 1724198758, '1724198758s11.jpg', 'Selfies'),
(33, 1724198769, '1724198769s12.jpg', 'Selfies'),
(34, 1724198777, '1724198777s13.jpg', 'Selfies');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
