-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2016 at 01:43 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craftsTest`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`id`, `name`, `address`) VALUES
(1, 'NDMC', 'Delhi'),
(2, 'SDMC', 'UP'),
(3, 'EDMC', 'Bihar'),
(4, 'WDMC', 'Rajstan');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complainid` int(11) NOT NULL,
  `loosid` int(11) NOT NULL,
  `images` text NOT NULL,
  `comment` text NOT NULL,
  `complaintype` text NOT NULL,
  `authorityId` int(11) NOT NULL,
  `nextcomplainid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complainid`, `loosid`, `images`, `comment`, `complaintype`, `authorityId`, `nextcomplainid`) VALUES
(1, 5, 'authority', ' authority', 'authority', 25, 0),
(2, 5, 'authority', ' authority', 'authority', 25, 0),
(3, 5, 'authority', ' authority', 'authority', 25, 0),
(4, 5, 'authority', ' authority', 'authority', 25, 0),
(5, 5, 'authority', ' authority', 'authority', 25, 0),
(6, 1, '', ' Loos is too Dirty', 'authority', 25, 0),
(7, 1, '', ' Loos is too Dirty', 'authority', 25, 0),
(8, 1, '', ' Loos is too Dirty', 'authority', 25, 0),
(9, 1, '', ' Loos is too Dirty', 'authority', 25, 0),
(10, 1, '', ' Loos is too Dirty', 'authority', 25, 0),
(11, 3, '', ' Loos is too Dirty', 'authority', 25, 0),
(12, 5, '', ' Loos is too Dirty', 'authority', 25, 0),
(13, 6, '', ' Loos is too Dirty', 'authority', 25, 0),
(14, 7, '', ' Loos is too Dirty', 'authority', 25, 0),
(15, 2, '', ' Loos is too Dirty', 'authority', 25, 0),
(16, 2, '', ' Loos is too Dirty', 'authority', 25, 0),
(17, 2, '', ' Loos is too Dirty', 'authority', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gcm_users`
--

CREATE TABLE `gcm_users` (
  `id` int(11) NOT NULL,
  `gcm_regid` text,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gcm_users`
--

INSERT INTO `gcm_users` (`id`, `gcm_regid`, `name`, `email`, `created_at`) VALUES
(1, 'fKrADVNVNrU:APA91bHNiHrs7cf2SKgPmzrvbl-2jDAAkW9dvIBLk0SJjRr75_1Ly95y_n9aALmaxMSLxZQ8H4xvFUXBhkxFg9146nFxz8ob0mnvRRjJ4fzcz5SaOpnkqd9lPICJdw6uq8F2BqVNwSpo', 'Himanshu', 'cshimanshu@gmail.com', '2016-03-18 19:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` text,
  `password` text,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`) VALUES
(8, 'himanshu', 'varun', 'admin'),
(10, 'general', 'general', 'general'),
(11, 'authority', 'authority', 'authority');

-- --------------------------------------------------------

--
-- Table structure for table `loos`
--

CREATE TABLE `loos` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` text NOT NULL,
  `distric` text NOT NULL,
  `state` text NOT NULL,
  `pincode` text NOT NULL,
  `lati` text NOT NULL,
  `longi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loos`
--

INSERT INTO `loos` (`id`, `name`, `address1`, `address2`, `city`, `distric`, `state`, `pincode`, `lati`, `longi`) VALUES
(1, 'authority', 'authority', 'authority', 'authority', 'authority', 'authority', 'authority', '28.617428', '77.1953751'),
(2, 'authority', 'authority', 'authority', 'authority', 'authority', 'authority', 'authority', '28.62', '77.2090'),
(3, 'authority', 'authority', 'authority', 'authority', 'authority', 'authority', 'authority', '28.617428', '77.1953751'),
(4, 'authority', 'authority', 'authority', 'authority', 'authority', 'authority', 'authority', '28.6139', '77.2090'),
(5, 'giggu', 'jvib', 'bibk', 'biibi', 'ibbi', 'ibbi', '9', '28.6174326', '77.1953836'),
(6, 'idbif', 'jcfj', 'cjcj', 'kcj', 'jcvk', 'kckv', '68868', '28.6173882', '77.1952076'),
(7, 'lldydd', 'lhxlhh', 'I hh', 'lccllckc', 'kalau  kk . kalau kg', 'cijcc', '843556', '28.6174403', '77.195451');

-- --------------------------------------------------------

--
-- Table structure for table `map_authority_loos`
--

CREATE TABLE `map_authority_loos` (
  `mappingId` int(11) NOT NULL,
  `authorityId` int(11) DEFAULT NULL,
  `loosId` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_authority_loos`
--

INSERT INTO `map_authority_loos` (`mappingId`, `authorityId`, `loosId`) VALUES
(2, 35, '65,36,58,69'),
(3, 34, '56,58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complainid`);

--
-- Indexes for table `gcm_users`
--
ALTER TABLE `gcm_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loos`
--
ALTER TABLE `loos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_authority_loos`
--
ALTER TABLE `map_authority_loos`
  ADD PRIMARY KEY (`mappingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complainid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `gcm_users`
--
ALTER TABLE `gcm_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loos`
--
ALTER TABLE `loos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `map_authority_loos`
--
ALTER TABLE `map_authority_loos`
  MODIFY `mappingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
