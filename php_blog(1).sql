-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 08:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL DEFAULT '0',
  `status` varchar(20) NOT NULL,
  `terms_condation` varchar(10) NOT NULL DEFAULT 'NotAgree',
  `role_id` int(11) NOT NULL,
  `del_id` varchar(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `phone`, `gender`, `address`, `image`, `password`, `code`, `status`, `terms_condation`, `role_id`, `del_id`) VALUES
(6, 'Rashedul Hasan', 'rashed4pa@gmail.com', '01767078222', 'Male', 'Muradnagor, Cumilla.', 'user-1632504479-1092739131.PNG', 'e807f1fcf82d132f9bb018ca6738a19f', '0', '', 'NotAgree', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`id`, `session`, `time`) VALUES
(5, 'osvq2hvrme4a2v6gqdudpku080', 1632581769),
(6, '1at23i3a2kvs0b2ko0t10kp6ll', 1632581774),
(7, 'jk79r1r2purp14af8b6op7b18s', 1632551171);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Viewer'),
(4, 'Suscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_online`
--
ALTER TABLE `user_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_online`
--
ALTER TABLE `user_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usertable`
--
ALTER TABLE `usertable`
  ADD CONSTRAINT `usertable_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
