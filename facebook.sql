-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 07:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `user_id`, `post_id`) VALUES
(1, 'Hello', 1, 5),
(2, 'Hi', 1, 5),
(3, 'Hello Su Su', 2, 5),
(4, 'Hi AUng AUng', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `like_data`
--

CREATE TABLE `like_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like_data`
--

INSERT INTO `like_data` (`id`, `user_id`, `post_id`) VALUES
(4, 1, 5),
(5, 1, 4),
(6, 1, 3),
(7, 2, 3),
(8, 2, 4),
(9, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `online_user`
--

CREATE TABLE `online_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_user`
--

INSERT INTO `online_user` (`id`, `user_id`) VALUES
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `post_photo` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `post_photo`, `user_id`, `created_date`, `modified_date`) VALUES
(1, 'Laravel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate', 'car3.jpg', 1, '2020-01-30 12:34:34', '2020-01-30 12:34:34'),
(3, 'PHP Mailing', 'Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate', 'a3.jpg', 1, '2020-01-30 12:35:08', '2020-01-30 12:35:08'),
(4, 'Javascript', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate', 'car2.jpg', 1, '2020-01-30 12:40:47', '2020-01-30 12:40:47'),
(5, 'Nodejs', 'dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut eni', 'test.jpg', 2, '2020-01-31 09:50:44', '2020-01-31 09:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `c_password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `c_password`, `email`, `phone`, `dob`, `gender`, `photo`, `address`, `created_date`, `modified_date`) VALUES
(1, 'Su Su', '123', '123', 'susu@gmail.com', '0932323232', '2020-01-01', 'female', '4.png', 'Yangon', '2020-01-30', '2020-01-30'),
(2, 'Aung Aung', '123', '123', 'aungaung@gmail.com', '0934324234', '2020-01-01', 'male', '3.jpg', 'Mandalay', '2020-01-31', '2020-01-31'),
(3, 'Htoo Htoo', '123', '123', 'htoohtoo@gmail.com', '09323232', '2020-02-01', 'male', '3.jpg', 'Yangon', '2020-02-04', '2020-02-04'),
(4, 'Zin Zin', '123', '123', 'zinzin@gmail.com', '0932323', '2020-02-01', 'male', '4.png', 'Yangon', '2020-02-04', '2020-02-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_data`
--
ALTER TABLE `like_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_user`
--
ALTER TABLE `online_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `like_data`
--
ALTER TABLE `like_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `online_user`
--
ALTER TABLE `online_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
