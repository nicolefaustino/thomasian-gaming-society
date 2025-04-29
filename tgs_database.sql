-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgs_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `user_id` int(11) NOT NULL,
  `admin_firstname` varchar(30) NOT NULL,
  `admin_lastname` varchar(30) NOT NULL,
  `admin_pfp` varchar(100) NOT NULL,
  `admin_rank` varchar(10) NOT NULL CHECK (`admin_rank` = 'DEFAULT' or `admin_rank` = 'SUPER')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`user_id`, `admin_firstname`, `admin_lastname`, `admin_pfp`, `admin_rank`) VALUES
(1, 'Annika', 'Sun', 'https://i.imgur.com/gFcYNha.jpeg', 'SUPER'),
(2, 'Nicole', 'Faustino', 'https://i.imgur.com/lJJZVRv.jpeg', 'SUPER'),
(5, 'Jelmey', 'Dizon', 'https://i.imgur.com/cz3POUX.jpeg', 'SUPER'),
(6, 'Clarisse', 'Atienza', 'https://i.imgur.com/iqM2tJB.jpeg', 'SUPER');

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `comment_content` varchar(500) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`comment_id`, `user_id`, `game_id`, `comment_content`, `date_added`) VALUES
(1, 5, 1, 'DISTORT DISTORT DISTORT DISTORT', '2024-12-14 09:40:05'),
(2, 1, 1, 'The difficulty curve is vertical', '2024-12-14 09:41:31'),
(3, 1, 4, 'My friends made me play this game. I dont want to play this game anymore please get me out of here', '2024-12-14 09:42:42'),
(4, 6, 4, 'Ignore the comment below. My friend is totally fine :)', '2024-12-14 09:43:21'),
(5, 1, 4, 'Everything is okay now im having so much fun', '2024-12-14 09:45:56'),
(6, 1, 1, 'I gunned down Queen of Hatred', '2024-12-14 09:50:13'),
(7, 7, 1, 'Watch Skibidi Toilet', '2024-12-14 11:12:12'),
(8, 5, 4, 'Fun Game!', '2024-12-14 11:35:54'),
(9, 1, 1, 'I VOTED CAUSE ROLAND IS SO HOT', '2024-12-16 03:08:22'),
(10, 5, 4, 'fun game!', '2024-12-18 05:23:18'),
(11, 8, 5, 'KAFKAAAAA I LOVE YOU', '2024-12-18 09:12:17'),
(12, 1, 12, 'I know what Lewis did', '2024-12-18 09:16:25'),
(13, 9, 12, 'I like Leah', '2024-12-18 09:18:34'),
(14, 9, 12, 'I wasnt allowed to play this game cause my mom said it was scary', '2024-12-18 09:21:29'),
(15, 9, 1, 'Haha', '2024-12-18 09:34:01'),
(16, 9, 1, 'LETS GO', '2024-12-18 09:35:07'),
(17, 9, 1, 'YAY', '2024-12-18 09:35:52'),
(18, 9, 12, 'I was banned again', '2024-12-18 09:37:08'),
(19, 9, 12, 'help', '2024-12-18 09:37:53'),
(20, 9, 12, 'I dont like Lewis', '2024-12-18 09:38:42'),
(21, 1, 12, 'Lets play Stardew!', '2024-12-18 09:39:19'),
(22, 1, 4, 'I hate this game like for real man', '2024-12-18 09:43:37'),
(23, 10, 16, 'HAR HAR HAR', '2024-12-18 09:44:14'),
(24, 11, 15, 'I like this game ', '2024-12-18 11:47:00'),
(25, 11, 16, 'Ugly', '2024-12-18 11:56:12'),
(26, 1, 1, 'I love this game so much! ', '2024-12-18 13:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `game_table`
--

CREATE TABLE `game_table` (
  `game_id` int(11) NOT NULL,
  `game_name` varchar(30) NOT NULL,
  `game_genre` varchar(30) NOT NULL,
  `game_desc` varchar(500) NOT NULL,
  `game_imagelink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_table`
--

INSERT INTO `game_table` (`game_id`, `game_name`, `game_genre`, `game_desc`, `game_imagelink`) VALUES
(1, 'Library of Ruina', 'Horror', 'ARBITER BLAST', 'https://i.imgur.com/MlH1DIQ.png'),
(4, 'Rock Paper Scissors', 'FPS', 'Crazy Game', 'https://i.imgur.com/xfpR45a.jpeg'),
(5, 'Honkai Star Rail', 'FPS', 'Destroy Aliens!', 'https://i.imgur.com/UL3asSl.jpeg'),
(12, 'Stardew Valley', 'Cozy', 'Mewing is good for your teeth', 'https://i.imgur.com/S7QXygQ.jpeg'),
(15, 'Webfishing', 'Cozy', 'that furry fishing game everyone\'s into rn', 'https://i.pinimg.com/736x/60/01/67/6001673c2d25ad0e22b510355a779441.jpg'),
(16, 'Five Nights at Freddy\'s', 'Horror', 'OH MY GOD ITS AN ANIMATRONIC', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFSc-hVP7R2AoR9-i3RVQx-tURtRGIa1exkw&s'),
(18, 'Call of Duty', 'FPS', 'Call of Doody', 'https://i.imgur.com/dzeqzHn.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `rating_table`
--

CREATE TABLE `rating_table` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_table`
--

INSERT INTO `rating_table` (`rating_id`, `user_id`, `game_id`, `rating`) VALUES
(1, 1, 1, 5),
(2, 6, 4, 5),
(3, 6, 4, 3),
(4, 6, 4, 3),
(5, 6, 1, 5),
(6, 6, 4, 5),
(7, 1, 1, 5),
(8, 5, 1, 5),
(9, 6, 4, 5),
(10, 1, 1, 5),
(11, 1, 4, 5),
(12, 1, 1, 5),
(13, 5, 1, 5),
(14, 5, 1, 5),
(15, 1, 1, 5),
(16, 1, 4, 1),
(17, 6, 4, 5),
(18, 1, 4, 5),
(19, 1, 1, 5),
(20, 7, 1, 5),
(21, 7, 4, 5),
(22, 5, 4, 5),
(23, 1, 1, 5),
(24, 1, 1, 5),
(25, 5, 4, 5),
(26, 8, 5, 5),
(27, 1, 12, 5),
(28, 9, 12, 5),
(29, 9, 12, 5),
(30, 9, 1, 5),
(31, 9, 1, 5),
(32, 9, 1, 5),
(33, 9, 12, 5),
(34, 9, 12, 5),
(35, 9, 12, 5),
(36, 1, 12, 5),
(37, 1, 4, 1),
(38, 10, 16, 5),
(39, 11, 15, 5),
(40, 11, 16, 1),
(41, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_username`, `user_email`, `user_password`) VALUES
(1, 'currysauce111', 'annika@gmail.com', '1234'),
(2, 'pomelopies', 'pomelopies@gmail.com', 'gay123'),
(5, 'borki', 'borki@gmail.com', 'adasd'),
(6, 'teehee', 'aa@gmail.com', 'dddddd'),
(7, 'bob', 'bob@gmail.com', '1234'),
(8, 'LettuceChomper', 'a123@gmail.com', '1234'),
(9, 'Freak', 'freak@gmail.com', '1234'),
(10, 'Sauce', 'sauce@gmail.com', '1234'),
(11, 'Yoshihide', 'yoshi@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `game_table`
--
ALTER TABLE `game_table`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `rating_table`
--
ALTER TABLE `rating_table`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `game_table`
--
ALTER TABLE `game_table`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rating_table`
--
ALTER TABLE `rating_table`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
