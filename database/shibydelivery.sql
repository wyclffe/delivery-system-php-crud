-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 04:42 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shibytest`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `username` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `constituency` varchar(100) NOT NULL,
  `van` int(100) NOT NULL,
  `truck` int(100) NOT NULL,
  `canter` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`username`, `company`, `email`, `phone`, `constituency`, `van`, `truck`, `canter`, `password`, `agent_id`) VALUES
('shibyTech', 'ShibyMovers', 'admin@shibymovers.com', 12345678, 'nairobi', 0, 0, 0, 'qwerty123', 2),
('hamza', 'shororo', 'hamzaharush@gmail.com', 722356510, 'Mvita', 2000, 3000, 5000, '123456', 9);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` varchar(250) NOT NULL,
  `feedback_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `company` varchar(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `mobilenumber` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `shiftfrom` varchar(100) NOT NULL,
  `shiftto` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(300) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `quote_id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`company`, `fullname`, `mobilenumber`, `email`, `shiftfrom`, `shiftto`, `date`, `description`, `vehicle`, `quote_id`, `agent_id`) VALUES
('shororo', 'hamza', 722342356, 'geo@gmail.com', 'Mvita', 'Changamwe', '2018-12-18', 'now', 'van', 18, 9),
('shororo', 'ogeto', 9424, 'ogetow@yahoo.com', 'Kisauni', 'Nyali', '2018-12-26', 'ok', 'truck', 19, 9),
('shororo', 'joyce', 2357, 'joycemalai@gmail.com', 'Mvita', 'Nyali', '2018-12-27', 'llllll', 'canter', 20, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agent_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`quote_id`),
  ADD KEY `fk_agent` (`agent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `quote_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
