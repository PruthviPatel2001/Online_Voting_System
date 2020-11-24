-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 11:17 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signin`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `sr.no` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` varchar(12) NOT NULL,
  `aadharno` varchar(14) NOT NULL,
  `voterid` varchar(11) NOT NULL,
  `voted` char(3) DEFAULT 'no',
  `votedto` char(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`sr.no`, `firstname`, `lastname`, `dob`, `age`, `gender`, `contactNo`, `aadharno`, `voterid`, `voted`, `votedto`, `password`) VALUES
(2, 'Pruthvi', 'Patel', '2020-10-27', 19, 'male', '8456789452', '44444444444', '444444444', 'no', NULL, '$2y$10$VTqzb5mfloOFFpk5WD2iQOBzDkP90Exnt0i41QZEuvOFvu0gr71aK'),
(3, 'Pavan', 'Mistry', '2001-03-10', 19, 'male', '9724777658', '876543210987', '1234567890', 'yes', 'bjp', '$2y$10$i6nzdgrPgNhu8m/3iq2g2OlpbPLt2rMrqxjK0PdB3mIuEiEGNRztm'),
(5, 'demo', 'demo', '2000-03-19', 19, 'male', '1234567890', '12341234', '1324123412', 'no', NULL, '$2y$10$C2vnQJnL8kSrz4VKfFoviubGZ3o3tvY.qhvjWmzM0hBZ0i615zijK'),
(6, 'demo', 'demo1', '2000-03-22', 20, 'female', '1234567890', '123412341234', '1234123412', 'no', NULL, '$2y$10$ebAOBPvNardQt47Etkh4lu76BzYR3Qsd94eAxTfcUVTRak1az.PVO'),
(7, 'demo', 'demo2', '2001-04-11', 20, 'female', '1234567890', '123412341324', '1231231231', 'yes', 'bjp', '$2y$10$HWX273EtEgj626iSx2NaKer5mNgqtUzdeWp7GBrIM1HDz2e93ogfG');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `Name` text NOT NULL,
  `total_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`Name`, `total_vote`) VALUES
('aap', 0),
('bjp', 2),
('congress', 0),
('cpi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`sr.no`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`Name`(4));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `sr.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
