-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2021 at 02:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `email_list_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `date`) VALUES
(1, 'owilliamson@yahoo.com', '2021-06-16 00:34:32'),
(2, 'qcummings@gmail.com', '2021-06-16 00:34:43'),
(3, 'louie.wyman@gmail.com', '2021-06-16 00:35:06'),
(4, 'wilhelm.ward@yahoo.com', '2021-06-16 00:35:16'),
(5, 'nicole.reynolds@hotmail.com', '2021-06-16 00:35:26'),
(6, 'kohler.benton@gmail.com', '2021-06-16 00:35:35'),
(7, 'yyundt@yahoo.com', '2021-06-16 00:35:44'),
(8, 'ahermiston@hotmail.com', '2021-06-16 00:35:53'),
(9, 'feeney.destin@hotmail.com', '2021-06-16 00:36:01'),
(10, 'janick.harber@netflix.com', '2021-06-16 00:36:09'),
(11, 'shakira.littel@yahoo.com', '2021-06-16 00:36:19'),
(12, 'garry98@gmail.com', '2021-06-16 00:36:27'),
(13, 'abshire.lonny@netflix.com', '2021-06-16 00:36:36'),
(14, 'kris.turner@hotmail.com', '2021-06-16 00:36:46'),
(15, 'opal.block@netflix.com', '2021-06-16 00:36:53'),
(16, 'hudson.julie@yahoo.com', '2021-06-16 00:37:01'),
(17, 'okon.anais@yahoo.com', '2021-06-16 00:37:09'),
(18, 'isom.carter@gmail.com', '2021-06-16 00:37:17'),
(19, 'crona.sandrine@netflix.com', '2021-06-16 00:37:24'),
(20, 'otrantow@hotmail.com', '2021-06-16 00:37:31'),
(21, 'mraz.elinor@netflix.com', '2021-06-16 00:37:39'),
(23, 'leland.gleason@hotmail.com', '2021-06-16 00:37:54'),
(24, 'rogahn.vernie@hotmail.com', '2021-06-16 00:38:05'),
(25, 'rosie41@netflix.com', '2021-06-16 00:38:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
