-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 12:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `lodgedcomplains`
--

CREATE TABLE `lodgedcomplains` (
  `id` int(11) NOT NULL,
  `organizationname` varchar(50) NOT NULL,
  `organizationcontact` varchar(50) NOT NULL,
  `complain` text NOT NULL,
  `howtoimprove` varchar(100) NOT NULL,
  `secondchance` varchar(6) NOT NULL DEFAULT 'Yes,No',
  `anonymous` varchar(6) NOT NULL DEFAULT 'Yes,No',
  `username` varchar(40) NOT NULL,
  `datelodged` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lodgedcomplains`
--

INSERT INTO `lodgedcomplains` (`id`, `organizationname`, `organizationcontact`, `complain`, `howtoimprove`, `secondchance`, `anonymous`, `username`, `datelodged`) VALUES
(4, 'Welcome On Board,nm', 'dvdffd', 'sdz', 'ds', 'no', 'no', 'ifeOseni', '2022-05-06'),
(10, 'as', 'as', 'as', 'sa', 'yes', 'yes', 'ifeOseni', '2022-05-07'),
(11, 'Ife', 'C7', 'Power', 'Yes', 'no', 'no', 'ifeOseni', '2022-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `passcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `fname`, `mname`, `username`, `email`, `phone`, `passcode`) VALUES
(2, 'Oseni', 'Ifeoluwa', 'Daniel', 'ifeOseni', 'ifeoseni@gmail.com', 2147483647, 'cc0bdd591879dce7dd0f6edca10367f8'),
(3, 'Oseni', 'Ifeoluwa', 'Daniel', 'ifeOseni2', 'ifeoseni2@gmail.com', 2147483647, 'cc0bdd591879dce7dd0f6edca10367f8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lodgedcomplains`
--
ALTER TABLE `lodgedcomplains`
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
-- AUTO_INCREMENT for table `lodgedcomplains`
--
ALTER TABLE `lodgedcomplains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
