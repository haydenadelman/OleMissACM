-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2020 at 06:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olemissacm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contactID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `title`, `date`, `time`, `location`, `description`) VALUES
(5, 'Beginning of the Semester Meeting', '2021-01-26', '18:00', 'Weir Hall Room 235', 'Join us for the first meeting of 2021! We will be discussing current and future plans, giving an overview of what ACM is, and spending some time getting to know each other. Pizza will be provided on a first come, first served basis.'),
(6, 'ACM Monthly Movie Night', '2021-02-02', '18:00', 'Weir Hall Room 235', 'Come hang out and watch a classic of computer-based cinema, War Games. Starring Matthew Broderick (Also from Ferris Bueller’s Day Off and as the voice of Simba from The Lion King), War Games features a terrible understanding of what computers were capable of in the 80s and some really interesting portrayals of hacking. War Games is considered one of the best films of 1983, and the 80s in general, so come enjoy this classic with us. Popcorn will be provided. ');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `imgName` varchar(255) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageID`, `imgName`, `description`) VALUES
(48, 'gallery1.jpg', 'ACM Project Development'),
(49, 'gallery2.jpg', 'VR Development'),
(50, 'gallery3.jpg', 'ACM Fall Meeting'),
(51, 'gallery4.jpg', 'ACM LAN party!'),
(52, 'LabHelp5.jpg', 'ACM lab session');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dues` int(5) NOT NULL,
  `classification` varchar(10) NOT NULL,
  `date_added` date NOT NULL,
  `memberID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`name`, `email`, `dues`, `classification`, `date_added`, `memberID`) VALUES
('Hayden Adelman', 'hhadelma@go.olemiss.edu', 0, 'Senior', '2020-10-19', 1),
('Ashlynn Principe', 'ashlynnprincipe@gmail.com', 1, 'Junior', '2020-10-19', 2),
('John Doe', 'johndoe@gmail.com', 0, 'Freshman', '2020-10-19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `role`) VALUES
(8, 'president@1', 'president@1', 'user'),
(12, 'admin@1', 'admin1', 'admin'),
(13, 'president@7', 'president1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
