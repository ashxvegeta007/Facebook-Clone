-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 06:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comments` int(11) NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `is_profile_image` tinyint(1) NOT NULL,
  `is_cover_image` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `userid`, `post`, `image`, `likes`, `date`, `comments`, `has_image`, `is_profile_image`, `is_cover_image`) VALUES
(51, 89745898, 8955339045984860918, '', ' uploads/8955339045984860918/tesFLZfROnXDiy9.jpg', 0, '2023-06-28 17:40:25', 0, 1, 0, 0),
(52, 135747341515824, 8955339045984860918, 'das', ' ', 0, '2023-06-30 16:59:03', 0, 0, 0, 0),
(53, 83674725766, 8955339045984860918, 'ss', ' uploads/8955339045984860918/yzFnErPyXZmylDb.jpg', 0, '2023-06-30 16:59:19', 0, 1, 0, 0),
(54, 2825168215219730452, 8955339045984860918, '', ' uploads//pawracJ4yMjQpeb.jpg', 0, '2023-06-30 17:00:06', 0, 1, 1, 0),
(55, 7814089, 8955339045984860918, '', ' uploads//BE1J8NPdTVFZkxw.jpg', 0, '2023-06-30 17:01:00', 0, 1, 0, 1),
(56, 4287201481440064317, 8955339045984860918, 'hhhhhh', ' ', 0, '2023-06-30 17:22:48', 0, 0, 0, 0),
(57, 717674, 8955339045984860918, 'mmm', ' uploads/8955339045984860918/5QGrDZeZQp1Z2Sb.jpg', 0, '2023-06-30 17:23:04', 0, 1, 0, 0),
(58, 657886062, 8955339045984860918, '', ' uploads//lv7wQr0K5DDf9Cs.jpg', 0, '2023-06-30 17:23:23', 0, 1, 1, 0),
(59, 7393586366851152961, 8955339045984860918, '', ' uploads//cBUU8gVPr6jDRgs.jpg', 0, '2023-06-30 17:23:38', 0, 1, 0, 1),
(60, 87212, 8955339045984860918, 'mmmm', ' ', 0, '2023-06-30 17:31:51', 0, 0, 0, 0),
(61, 563255, 8955339045984860918, 'ooooo', ' uploads/8955339045984860918/N73zbnEMqhQbDMS.jpg', 0, '2023-06-30 17:32:06', 0, 1, 0, 0),
(62, 2397217940, 8955339045984860918, '', ' uploads//AYYuCiERktXpkRg.jpg', 0, '2023-06-30 17:32:20', 0, 1, 1, 0),
(63, 131584488384545720, 8955339045984860918, '', ' uploads//mglc5N5dXsGmEpV.jpg', 0, '2023-06-30 17:32:34', 0, 1, 0, 1),
(64, 157028640, 8955339045984860918, 'ZzxZ', ' ', 0, '2023-07-01 16:02:52', 0, 0, 0, 0),
(65, 793556290299, 8955339045984860918, 'zczC', ' uploads/8955339045984860918/4fQOjcuueKTJXbx.jpg', 0, '2023-07-01 16:03:05', 0, 1, 0, 0),
(66, 448488715682793417, 8955339045984860918, '', ' uploads//dZM6ueP1rV7dbCg.jpg', 0, '2023-07-01 16:03:19', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(19) NOT NULL,
  `user_id` bigint(19) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image` varchar(1000) NOT NULL,
  `cover_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `email`, `password`, `url_address`, `date`, `profile_image`, `cover_image`) VALUES
(42, 8955339045984860918, 'Emma', 'watson', 'Female', 'ashutoshroy453@gmail.com', '123456', 'ashu.roy', '2023-07-01 16:03:19', 'uploads//dZM6ueP1rV7dbCg.jpg', 'uploads//mglc5N5dXsGmEpV.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`),
  ADD KEY `comments` (`comments`),
  ADD KEY `has_image` (`has_image`),
  ADD KEY `is_profile_image` (`is_profile_image`),
  ADD KEY `is_cover_image` (`is_cover_image`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `email` (`email`),
  ADD KEY `gender` (`gender`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `password` (`password`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
