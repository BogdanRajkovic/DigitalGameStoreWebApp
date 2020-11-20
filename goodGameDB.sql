-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 02:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodgame`
--
CREATE DATABASE IF NOT EXISTS `goodgame` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `goodgame`;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `GameID` int(11) NOT NULL,
  `Game_Name` varchar(50) DEFAULT NULL,
  `Game_Price` decimal(6,2) DEFAULT NULL,
  `Game_Quantity` int(11) DEFAULT NULL,
  `Game_Img_Url` varchar(50) DEFAULT NULL,
  `Game_Genre` varchar(50) DEFAULT NULL,
  `Date_Created` datetime NOT NULL,
  `Date_Deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GameID`, `Game_Name`, `Game_Price`, `Game_Quantity`, `Game_Img_Url`, `Game_Genre`, `Date_Created`, `Date_Deleted`) VALUES
(1, 'Witcher 3 GOTY Edition', '49.55', 12, 'img/witcher3.jpg', 'Action', '2018-09-24 18:19:45', NULL),
(2, 'Counter-Strike: Global Offensive', '12.99', 35, 'img/csgo.jpg', 'FPS', '2018-09-24 18:57:29', NULL),
(3, 'FIFA 17', '9.99', 5, 'img/fifa17.jpg', 'Sports', '2018-09-24 18:57:29', NULL),
(4, 'NBA 2K17', '15.00', 7, 'img/nba2k17.jpg', 'Sports', '2018-09-24 18:57:29', NULL),
(5, 'PlayerUnknown\'s Battlegrounds', '23.75', 45, 'img/pubg.jpg', 'Battle royale', '2018-09-24 18:57:29', NULL),
(6, 'Grand Theft Auto V', '35.00', 15, 'img/gta5.jpg', 'Action', '2018-09-24 18:57:29', NULL),
(7, 'Hitman: Absolution', '7.23', 6, 'img/hitmanabsolution.jpg', 'Action', '2018-09-25 14:24:33', NULL),
(8, 'Hitman: Blood Money', '3.85', 10, 'img/hitmanbloodmoney.jpg', 'Action', '2018-09-25 14:25:45', NULL),
(9, 'Payday 2', '7.00', 20, 'img/padday2.jpg', 'FPS', '2018-09-25 14:26:45', NULL),
(10, 'PES 17', '5.00', 12, 'img/pes17.png', 'Sports', '2018-09-25 14:27:43', NULL),
(11, 'Rocket League', '11.25', 5, 'img/rocketleague.jpg', 'Sports', '2018-09-25 14:29:00', NULL),
(12, 'Total War: Rome II', '3.89', 1, 'img/rometotalwar2.jpg', 'Strategy', '2018-09-25 14:30:44', NULL),
(13, 'Total War: Shogun 2', '5.69', 5, 'img/shoguntotalwar2.jpg', 'Strategy', '2018-09-25 14:33:30', NULL),
(14, 'The Witcher 2: Assassins of Kings', '12.99', 35, 'img/witcher2.jpg', 'Action', '2018-09-25 14:37:50', NULL),
(15, 'World of Warcraft: Legion', '18.99', 5, 'img/wow.jpg', 'MMORPG', '2018-09-25 14:39:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `game_stock`
--

DROP TABLE IF EXISTS `game_stock`;
CREATE TABLE `game_stock` (
  `Game_Stock_Id` int(11) NOT NULL,
  `GameID` int(11) NOT NULL,
  `Game_Key` int(11) NOT NULL,
  `Date_Created` datetime NOT NULL,
  `Date_Deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `First_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password_hash` varchar(256) DEFAULT NULL,
  `Is_Admin` bit(1) DEFAULT NULL,
  `Date_Created` datetime NOT NULL,
  `Date_Deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `First_Name`, `Last_Name`, `Email`, `Username`, `Password_hash`, `Is_Admin`, `Date_Created`, `Date_Deleted`) VALUES
(1, 'Nikola', 'Milic', 'NikMil@gmail.com', 'NikMil', '$2y$10$FbDpLh0wEidoRQQ0BE1yo.fJPuEL1zNchklqHu2eYp2RCLd53pf56', NULL, '2018-09-25 21:22:31', NULL),
(2, 'Bogdan', 'Rajkovic', 'bogdan123@gmail.com', 'BoggY', '$2y$10$SEInneCEZ1JU3id/bd4Nf.b6sEEl3VdR.mrr6ZHpZT3njnXIytWvu', NULL, '2018-09-25 23:45:05', NULL),
(3, 'Nikola', 'Zivkovic', '1234@gmail.com', 'Miki', '$2y$10$S25fiJBklD8Lax27sI1SIuYTvg47xtQDb8AXb/gmUZFclRDhgDzO.', NULL, '2018-09-25 23:56:44', NULL),
(6, 'Zeljko', 'Petrovic', 'ZPetrovic@gmail.com', 'ZeljkoP', '$2y$10$eW3P/6HIkYkpMQ2P4qJoeOGUOLCjPtu4dG5d3mob01HZHyM5/3A.q', NULL, '2018-09-26 01:47:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_games`
--

DROP TABLE IF EXISTS `user_games`;
CREATE TABLE `user_games` (
  `User_Games_Id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `GameID` int(11) NOT NULL,
  `Game_Stock_Id` int(11) NOT NULL,
  `Is_Remarked` bit(1) DEFAULT NULL,
  `Remark_Text` varchar(256) DEFAULT NULL,
  `Date_Created` datetime NOT NULL,
  `Date_Deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `game_stock`
--
ALTER TABLE `game_stock`
  ADD PRIMARY KEY (`Game_Stock_Id`),
  ADD KEY `fk_game_stock_games` (`GameID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`User_Games_Id`),
  ADD KEY `fk_user_games_user` (`UserID`),
  ADD KEY `fk_user_games_games` (`GameID`),
  ADD KEY `fk_user_games_game_stock` (`Game_Stock_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `game_stock`
--
ALTER TABLE `game_stock`
  MODIFY `Game_Stock_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_games`
--
ALTER TABLE `user_games`
  MODIFY `User_Games_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_stock`
--
ALTER TABLE `game_stock`
  ADD CONSTRAINT `fk_game_stock_games` FOREIGN KEY (`GameID`) REFERENCES `games` (`GameID`);

--
-- Constraints for table `user_games`
--
ALTER TABLE `user_games`
  ADD CONSTRAINT `fk_user_games_game_stock` FOREIGN KEY (`Game_Stock_Id`) REFERENCES `game_stock` (`Game_Stock_Id`),
  ADD CONSTRAINT `fk_user_games_games` FOREIGN KEY (`GameID`) REFERENCES `games` (`GameID`),
  ADD CONSTRAINT `fk_user_games_user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
