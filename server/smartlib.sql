-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2021 at 11:46 PM
-- Server version: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c0smartlib`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(64) NOT NULL,
  `book_rfid` varchar(64) NOT NULL,
  `issued_by_name` varchar(64) NOT NULL,
  `issued_by_rollno` varchar(64) NOT NULL,
  `issued_at` varchar(64) NOT NULL,
  `cover_img` varchar(64) NOT NULL,
  `indexpdf` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_rfid`, `issued_by_name`, `issued_by_rollno`, `issued_at`, `cover_img`, `indexpdf`) VALUES
(1, 'Communication Engineering', '4000319D07EB', 'student1', '001', '22-09-2020 03:47:33 PM', 'Communication Engineering.png', 'Communication Engineering.pdf'),
(2, 'Data Structures', '4000318CC33E', 'Not Issued', 'Not Issued', 'Not Issued', 'Data Structures.png', 'Data Structures.pdf'),
(3, 'Electronic Devices And Circuits', '40002C7E584A', 'student1', '001', '22-09-2020 03:52:05 PM', 'Electronic Devices And Circuits.png', 'Electronic Devices And Circuits.pdf'),
(4, 'Fundamentals Of Computer', '40002E0D0A69', 'rupalib', '009', '22-09-2020 09:41:33 PM', 'Fundamentals Of Computer.png', 'Fundamentals Of Computer.pdf'),
(5, 'OOP With CPP', '40002E04046E', 'Not Issued', 'Not Issued', 'Not Issued', 'OOP With CPP.png', 'OOP With CPP.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `issue_history`
--

CREATE TABLE `issue_history` (
  `id` int(11) NOT NULL,
  `book` varchar(64) NOT NULL,
  `student_name` varchar(64) NOT NULL,
  `collage` varchar(64) NOT NULL,
  `student_rollno` varchar(64) NOT NULL,
  `datetime` varchar(64) NOT NULL,
  `action` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_history`
--

INSERT INTO `issue_history` (`id`, `book`, `student_name`, `collage`, `student_rollno`, `datetime`, `action`) VALUES
(1, 'Data Structures', 'student1', '', '001', '27-05-2020 01:34:36 PM', 'issue'),
(2, 'Data Structures', 'student1', '', '001', '27-05-2020 01:56:16 PM', 'return'),
(3, 'Communication Engineering', 'student1', '', '001', '27-05-2020 01:59:19 PM', 'issue'),
(4, 'Communication Engineering', 'student1', '', '001', '27-05-2020 02:03:38 PM', 'return'),
(5, 'Fundamentals Of Computer', 'student1', '', '001', '27-05-2020 02:05:19 PM', 'issue'),
(6, 'Fundamentals Of Computer', 'student1', '', '001', '27-05-2020 02:09:44 PM', 'return'),
(7, 'OOP With CPP', 'student1', '', '001', '27-05-2020 02:11:07 PM', 'issue'),
(8, 'OOP With CPP', 'student1', '', '001', '27-05-2020 02:14:47 PM', 'return'),
(9, 'Electronic Devices And Circuits', 'student1', '', '001', '27-05-2020 02:15:56 PM', 'issue'),
(10, 'Electronic Devices And Circuits', 'student1', '', '001', '27-05-2020 02:18:34 PM', 'return'),
(11, 'OOP With CPP', 'student1', '', '001', '21-09-2020 06:41:41 PM', 'issue'),
(12, 'OOP With CPP', 'student1', '', '001', '21-09-2020 06:42:52 PM', 'return'),
(13, 'Communication Engineering', 'student1', '', '001', '21-09-2020 06:43:47 PM', 'issue'),
(14, 'Communication Engineering', 'student1', '', '001', '21-09-2020 06:45:52 PM', 'return'),
(15, 'Data Structures', 'student007', '', '007', '21-09-2020 10:30:34 PM', 'issue'),
(16, 'Data Structures', 'student007', '', '007', '21-09-2020 10:40:18 PM', 'return'),
(17, 'Communication Engineering', 'student1', '', '001', '22-09-2020 03:47:33 PM', 'issue'),
(18, 'Electronic Devices And Circuits', 'student1', '', '001', '22-09-2020 03:52:05 PM', 'issue'),
(19, 'Fundamentals Of Computer', 'rupalib', '', '009', '22-09-2020 09:41:33 PM', 'issue');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `rollno` varchar(64) NOT NULL,
  `branch` varchar(64) NOT NULL,
  `section` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rollno`, `branch`, `section`) VALUES
(1, 'student1', '123456', '001', 'IT', 'A'),
(2, 'student2', '123456', '002', 'IT', 'A'),
(3, 'student5', '890890', '005', 'EXTC', 'A'),
(4, 'swapnali', '234567', '003', 'EXTC', 'A'),
(5, 'student007', 'bhau007', '007', 'extc', 'a'),
(6, 'rupalib', '202023', '009', 'extc', 'a');

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
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_history`
--
ALTER TABLE `issue_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `rollno` (`rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `issue_history`
--
ALTER TABLE `issue_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
