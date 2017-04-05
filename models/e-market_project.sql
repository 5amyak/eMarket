-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2017 at 07:32 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-market_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL,
  `category` varchar(24) NOT NULL,
  `price` int(11) NOT NULL,
  `img_path` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `user_id`, `title`, `description`, `category`, `price`, `img_path`) VALUES
(2, 8, 'got', 'GOT', 'Miscellaneous', 0, 'uploads/100 Game of Thrones Wide Screen Wallpapers (69).jpg'),
(3, 1, 'Winter Soldier', 'Captain America', 'Miscellaneous', 25, 'uploads/1.jpg'),
(4, 1, 'fish', 'fishy!!!', 'Vehicle', 500, 'uploads/6.jpg'),
(7, 1, 'sheep', 'sheepy!!', 'Miscellaneous', 25, 'uploads/10.jpg'),
(10, 3, 'wolf', 'wolfy!!!', 'Clothing', 5000, 'uploads/100 Game of Thrones Wide Screen Wallpapers (70).jpg'),
(11, 3, 'iron throne', 'irony!!', 'Furniture', 100000000, 'uploads/100 Game of Thrones Wide Screen Wallpapers (29).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(48) NOT NULL,
  `college` varchar(72) NOT NULL,
  `city` varchar(36) NOT NULL,
  `contact` varchar(24) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gender` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `college`, `city`, `contact`, `email`, `password`, `gender`) VALUES
(1, 'Samyak Jain', 'MNNIT', 'allahabad', '9571124425', 'samyakjain3098@gmail.com', '$2y$10$iCj0Q3n.x2EgoJnkybKsROR.X4e3MFrT1tBdAfFG79MyE/2ff7TYO', 'Male'),
(3, 'sohan', 'mnnit', 'allahabad', '957846131', 'sohan@gma.ocn', '$2y$10$jjI4Uq8RN.EQF1yqy9uSHurWQXbJgkwWZjejcEyQatiTQWGjgHSB.', 'Male'),
(8, 'samy', 'mnnit', 'allahabad', '957846131', 'sasas@das.com', '$2y$10$6FQj5cm6o.lwey11FxvqkeeqXgff38yJTB.PkDoGiqjRCy0zOm9E6', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `city` (`city`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
