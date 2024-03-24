-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 06:10 AM
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
-- Database: `fanpit`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` int(11) NOT NULL,
  `threadid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` varchar(9999) NOT NULL,
  `parent_postid` int(11) NOT NULL,
  `ptime` date NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='posts for each thread';

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `postcount` int(11) NOT NULL,
  `modid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='sections and their moderators';

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionid`, `sname`, `description`, `postcount`, `modid`) VALUES
(1, 'Basketball', 'Discussion about basketball-related topics', 0, 0),
(2, 'Football', 'Discussion about football-related topics', 0, 0),
(3, 'Hockey', 'Discussion about hockey-related topics', 0, 0),
(4, 'Motorsports', 'Discussion about motorsports-related topics', 0, 0),
(5, 'Baseball', 'Discussion about baseball-related topics', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `threadid` int(11) NOT NULL,
  `sectionid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `content` varchar(9999) NOT NULL,
  `ttime` date NOT NULL DEFAULT current_timestamp(),
  `threadImage` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='thread is the initial post';

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`threadid`, `sectionid`, `userid`, `title`, `content`, `ttime`, `threadImage`, `likes`) VALUES
(18, 1, 1, 'Toronto Raptors upset the Philadelphia 76ers in East Conference Finals', 'The Toronto Raptors pull off a stunning upset against the Philadelphia 76ers in the Eastern Conference Finals, defying all odds and expectations. With an electrifying display of skill, teamwork, and determination, the Raptors overcome formidable opponents to secure their spot in the NBA Finals. This historic victory sends shockwaves throughout the basketball world and cements the Raptors\' status as true contenders for the championship title.', '2024-03-24', 'thread_images/toronto.jpg', 27),
(19, 3, 1, 'Exciting Game in the Stanley Cup Finals', 'The Stanley Cup Finals are heating up with an intense battle between two top teams. Fans are on the edge of their seats as the game goes into overtime. Who will emerge victorious and take home the coveted trophy? Join the discussion and share your predictions', '2024-03-24', 'thread_images/stanley.jpg', 0),
(20, 3, 1, 'Formula 1 Grand Prix: Thrilling Race Weekend', 'The Formula 1 Grand Prix is back with another thrilling race weekend filled with high-speed action and adrenaline-pumping moments. Get ready to witness the world\'\'s top drivers push their limits on the track. Who will emerge victorious and claim the championship title? Share your thoughts and excitement!', '2024-03-24', 'thread_images/f1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nickname` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='table that stores all of the user info in the database';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `nickname`, `email`, `pass`, `birthday`) VALUES
(1, 'test1', '0', 'test1@gmail.com', 'test1', '2024-03-08'),
(2, 'test1', '0', 'test1@gmail.com', 'test1', '2024-03-21'),
(3, 'fanpitAdmin', '0', 'test@gmail.com', 'admin123.', '2024-03-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionid`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`threadid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `threadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
