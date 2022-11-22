-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 05:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `od_networktv`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_account`
--

CREATE TABLE `users_account` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(250) DEFAULT NULL,
  `EMAIL` varchar(150) DEFAULT NULL,
  `PASSWORD` varchar(256) DEFAULT NULL,
  `OTP` varchar(50) DEFAULT NULL,
  `YOUTUBE_CHANNEL_ID` varchar(150) DEFAULT NULL,
  `WALLET_BALANCE` float DEFAULT NULL,
  `WALLET_ID` varchar(25) DEFAULT NULL,
  `IS_EXIST` varchar(50) DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_account`
--

INSERT INTO `users_account` (`USER_ID`, `USERNAME`, `EMAIL`, `PASSWORD`, `OTP`, `YOUTUBE_CHANNEL_ID`, `WALLET_BALANCE`, `WALLET_ID`, `IS_EXIST`) VALUES
(1, 'ejayz', 'ajdapulangprovido@gmail.com', '$2y$09$1zLM2HGYt/V8on87Ghq.vO4BiAwgTzkF57.euYqpCCILOrbyNJefK', NULL, 'UC9w8ssNRpCs78WaGsLJmX6A', 0, '8903041643081458143446636', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_account`
--
ALTER TABLE `users_account`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
