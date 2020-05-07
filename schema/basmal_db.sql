-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2020 at 02:01 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basmal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `name` varchar(145) NOT NULL,
  `album_cover` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `name`, `album_cover`) VALUES
(8, 'Poly Games 201900', '../albums/analytics2.png'),
(9, 'MO626 Season 3 Launch', '../albums/Mo626-Social-Media-Search.JPG'),
(10, 'All Stars 2020 - My Bucks', '../albums/trophy-all-stars.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `album_images`
--

CREATE TABLE `album_images` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `caption` varchar(145) NOT NULL,
  `album_id` int(11) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album_images`
--

INSERT INTO `album_images` (`id`, `image_url`, `caption`, `album_id`, `date_posted`) VALUES
(3, '../albums/Friday_Basketball2.PNG', 'Friday Games', 8, '2019-11-28'),
(4, '../albums/Basket-IQ-YouTube-cover.png', 'Season 3 Launch', 9, '2019-11-28'),
(5, '../albums/banner-ads.png', 'Test Photo', 9, '2019-11-28'),
(6, '../albums/calculator.jpg', 'Gallery Photo', 9, '2019-11-28'),
(7, '../albums/trophy-all-stars.jpg', 'Montana receiving the Championship Trophy from Oscar Kanjala', 10, '2020-03-25'),
(8, '../albums/sozobal.jpg', 'Sozobal All Stars', 10, '2020-03-25'),
(9, '../albums/champs-all-stars.jpg', '2020 All Stars Champs - Cezobal', 10, '2020-03-25'),
(10, '../albums/front-row-all-stars.jpg', 'Chief Masawani Jere, Oscar Kanjala, Blena Chisenga and Nakali Manjolo ', 10, '2020-03-25'),
(11, '../albums/committe.jpg', 'Organising Committee - All Stars 2020', 10, '2020-03-25'),
(12, '../albums/cezobal-ladies.jpg', 'Cezoball All Stars 2020', 10, '2020-03-25'),
(13, '../albums/champs-nozobal.jpg', 'All Stars D2 2020 Champs', 10, '2020-03-25'),
(14, '../albums/my-bucks.jpg', 'My Bucks - Linda Simwaka greating the All Stars', 10, '2020-03-25'),
(15, '../albums/oscar-moc.jpg', 'Oscar Kanjala greeting the All Stars', 10, '2020-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fixture`
--

CREATE TABLE `fixture` (
  `fixture_id` int(11) NOT NULL,
  `home_team` int(11) NOT NULL,
  `away_team` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `venue_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `season` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fixture`
--

INSERT INTO `fixture` (`fixture_id`, `home_team`, `away_team`, `date_time`, `venue_id`, `status`, `season`) VALUES
(1, 13, 11, '2019-11-16 13:00:00', 6, 2, '2019/2020'),
(2, 11, 17, '2019-11-16 15:00:00', 6, 2, '2019/2020'),
(3, 14, 12, '2019-11-16 12:00:00', 6, 2, '2019/2020'),
(4, 13, 17, '2019-11-16 10:00:00', 6, 2, '2019/2020'),
(5, 27, 10, '2019-12-07 18:30:00', 1, 2, '2019/2020'),
(6, 44, 9, '2019-12-07 19:30:00', 1, 2, '2019/2020'),
(8, 31, 35, '2019-12-07 11:00:00', 9, 2, '2019/2020'),
(10, 41, 40, '2019-12-07 10:00:00', 9, 2, '2019/2020'),
(11, 45, 41, '2019-12-07 12:00:00', 9, 2, '2019/2020'),
(12, 32, 35, '2019-12-07 13:00:00', 9, 2, '2019/2020'),
(13, 45, 40, '2019-12-07 14:00:00', 9, 2, '2019/2020'),
(14, 32, 31, '2019-12-07 15:00:00', 9, 2, '2019/2020'),
(15, 11, 11, '0000-00-00 00:00:00', 1, 2, '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `log_table`
--

CREATE TABLE `log_table` (
  `season` varchar(45) NOT NULL,
  `teams_id` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `played` int(11) DEFAULT NULL,
  `scored` int(11) DEFAULT NULL,
  `conceded` int(11) DEFAULT NULL,
  `won` int(11) DEFAULT NULL,
  `lost` int(11) DEFAULT NULL,
  `forfeit` int(11) DEFAULT NULL,
  `zones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_table`
--

INSERT INTO `log_table` (`season`, `teams_id`, `points`, `played`, `scored`, `conceded`, `won`, `lost`, `forfeit`, `zones_id`) VALUES
('2019/2020', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('2019/2020', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('2019/2020', 11, 4, 2, 163, 70, 2, NULL, NULL, 1),
('2019/2020', 12, 2, 1, 29, 9, 1, NULL, NULL, 1),
('2019/2020', 13, 2, 2, 70, 133, NULL, 2, NULL, 1),
('2019/2020', 14, 1, 1, 9, 29, NULL, 1, NULL, 1),
('2019/2020', 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('2019/2020', 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('2019/2020', 17, 3, 2, 92, 122, 1, 1, NULL, 1),
('2019/2020', 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('2019/2020', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('2019/2020', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('2019/2020', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
('2019/2020', 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
('2019/2020', 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
('2019/2020', 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
('2019/2020', 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
('2019/2020', 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
('2019/2020', 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
('2019/2020', 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
('2019/2020', 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('2019/2020', 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
('2019/2020', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `news_image`, `date_added`, `added_by`) VALUES
(3, 'MO626 COLLEGE BASKETBALL THIRD EDITION - SECOND ROUND GAMES', 'Second Round of the 3rd Edition of Mo626 College Basketball to kick off soon. According to BASMAL Vice President, who is leading the fixtures committee, everything is geared up and ready for the games to kick off at the end of January.\r\n\r\nThe 3rd Edition was kicked off on 16th November 2019. First round of the games saw various teams from 3 regions (South, East, and Central) participating in the games. However most schools could not participate due to a crash with their exams schedule. The Northern Zone had no games played at all as schools were mostly not in session.\r\n\r\nFebruary is when games are expected to be in full swing with all schools participating in their respective zones. The tournament is scheduled to run until end March. Last year\'s champions MCA Lilongwe have pulled out of the tournament giving a chance to uprising teams Poly, Bunda, and ABC. ', '../images/mo_launch.jpg', '2019-11-27 13:16:00', 'blena.c@gmail.com'),
(6, 'THE NEW PRESIDENT OF BASKETBALL ASSOCIATION OF MALAWI', 'Chief Masawani Jere is the new President of the Basketball Association of Malawi (BASMAL). Chief Jere holds Masterâ€™s Degree in Local Government and Rural Development studies from Birmingham University, U.K. He has been in basketball circles both locally and internationally- He is a 3 time National Champ, he played for CIVO Bax from 1987-1992\r\n\r\nIn other life, Chief Jere is a retired Civil Servant (Ministry of local Government) and the Chief for Emchakachakeni Community in Mzimba. His Ngoni Chief Title is Inkosi Mzikubola the IV. He is married with 2 kids. With his love for basketball, Jere has managed to develop basketball in his community by building 2 basketball courts at Echakachakeni Community Secondary School and Robert Laws Secondary School. He is planning to build another basketball court at Ekwendeni Community Secondary School in May, 2020. This great initiative in his community has been possible by working closely with his high school friend Adam Silver who happens to be the Commissioner for the NBA. \r\n\r\nIn the next four years as BASMAL President, he want to focus on the grass root level by promoting the juniors league. He will also focus on improving the infrastructure of the game, which is the main challenge in this country.\r\n\r\nCongratulations Chief Masawani Jere â€“ let us change the game together.', '../images/Jere2.jpg', '2020-03-24 19:04:00', 'blena.c@gmail.com'),
(7, 'THE VICE PRESIDENT OF BASKETBALL ASSOCIATION OF MALAWI', 'Banthari â€œB-manâ€ Banda is the new Vice President of Basketball Association of Malawi (BASMAL). Banthari is an IT Expert who works as Service Delivery Supervisor for NITEL (formerly known as MALSWITCH). He is married with two kids.\r\n\r\nBanthari hasnâ€™t left any stone unturned when it comes to Malawian Basketball. He is the current National 3x3 Basketball Coordinator. He was the General Secretary for Southern Zone Basketball League (SOZOBAL) from 2010 â€“ 2015 before joining Basketball Association of Malawi as Vice General Secretary from 2015 â€“ 2019.\r\n\r\nBeing a team player, Banthari has managed to work with different people during his basketball life to organize and secure sponsorship for different activities such as NBM Mo626 Ice College Basketball, National Finals (Boys & Girls) Under 18 3x3 Basketball (2019), Presidential Initiative for Sports, All Star Games just to mention a few.\r\n\r\nAs a basketball Player, Banthari has managed to play for the following teams during his time; Chichiri Secondary School, Crazy Warriors, Falcons, Bricks and the Mighty Legends.\r\n\r\nIn the next four years as BASMAL Vice President, his main 4 core objectives that BASMAL should implement are; (1) BASMAL to have a proper database for its registered players, coaches, referees, and partners. (2) To make sure that primary & secondary school basketball competitions are re-introduced as part of youth development. (3) Heâ€™ll push for technical courses so that Malawi should have a pool of FIBA accredited Coaches at all levels, FIBA accredited Referees & Commissioners. He will also introduce 3x3 youth leaders in all zones for the game of basketball to improve technically in order for Malawi to be able to compete on an international level in all categories. (4) To resurrect the Senior Menâ€™s National Team and introduce the Ladies Basketball National Team.\r\n\r\nCongratulations Banthari â€œB-manâ€ Banda â€“ let us change the game together.', '../images/Bman3.JPG', '2020-03-25 18:10:00', 'blena.c@gmail.com'),
(8, 'THE NEW GENERAL SECRETARY FOR BASKETBALL ASSOCIATION OF MALAWI', 'Peter Gomani is the new General Secretary for Basketball Association of Malawi (BASMAL). Peter holds a Bachelorâ€™s Degree in Accountancy and works as the Human Resources Manager for Workforce Recruitment Services Ltd. He is married with three kids.\r\n\r\nBefore joining BASMAL, Peter was a committee member for CEZOBAL from 2010 â€“ 2012 and then later became the General Secretary for CEZOBAL from 2015-2020. He is also a Co-founder of the Lilongwe based team known as Disciples Basketball. As a basketball player, he has played for the following teams; Poly Bobcats, Trojans Basketball and Disciples. He is also a 2009 CEZOBAL All Star.\r\n\r\nDriven by passion and by the fact that there was someone else behind the years he enjoyed basketball, he has always wanted to be that someone else for that kid who wants to enjoy basketball now which will contribute to the growth and development of basketball in Malawi. He believes after serving CEZOBAL for more than 7 years, he has gained enough experience and knowledge which will help him perform his duties as BASMAL GS.\r\n\r\nHe is looking forward to an exciting four years which will see basketball transforming to become a major sport discipline in Malawi. I look forward to be part of the team that will bring back confidence of stakeholders, making partnerships within and outside Malawi plus building modern infrastructure for basketball. He also looks forward to working with zonal leadership\'s harmonizing the activities of the zones and strengthening the relationship between the two with an aim of achieving a common goal.\r\n\r\nCongratulations Peter Gomani â€“ Let us change the game together.', '../images/Peter.jpg', '2020-03-26 11:12:00', 'blena.c@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `player_position_id` int(11) NOT NULL,
  `teams_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player_position`
--

CREATE TABLE `player_position` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `results_id` int(11) NOT NULL,
  `home_team` int(11) NOT NULL,
  `home_team_score` int(11) DEFAULT NULL,
  `away_team` int(11) NOT NULL,
  `away_team_score` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `last_updated` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `season` varchar(45) NOT NULL,
  `fixture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`results_id`, `home_team`, `home_team_score`, `away_team`, `away_team_score`, `status`, `last_updated`, `updated_by`, `season`, `fixture_id`) VALUES
(1, 13, 30, 11, 81, 2, '2019-11-16 00:00:00', 'blena.c@gmail.com', '2019/2020', 1),
(2, 11, 82, 17, 40, 2, '2019-11-16 00:00:00', 'blena.c@gmail.com', '2019/2020', 2),
(3, 14, 9, 12, 29, 2, '2019-11-16 00:00:00', 'blena.c@gmail.com', '2019/2020', 3),
(4, 13, 40, 17, 52, 2, '2019-11-16 00:00:00', 'blena.c@gmail.com', '2019/2020', 4),
(5, 27, 61, 10, 32, 2, '2019-12-07 00:00:00', 'blena.c@gmail.com', '2019/2020', 5),
(6, 44, 46, 9, 64, 2, '2019-12-07 00:00:00', 'blena.c@gmail.com', '2019/2020', 6),
(8, 31, 62, 35, 38, 2, '2019-12-07 00:00:00', 'blena.c@gmail.com', '2019/2020', 8),
(10, 41, 44, 40, 55, 2, '2019-12-07 00:00:00', 'blena.c@gmail.com', '2019/2020', 10),
(11, 45, 53, 41, 24, 2, '2019-12-07 00:00:00', 'blena.c@gmail.com', '2019/2020', 11),
(12, 32, 79, 35, 32, 2, '2019-12-07 00:00:00', 'blena.c@gmail.com', '2019/2020', 12),
(13, 45, 14, 40, 39, 2, '2019-12-07 00:00:00', 'blena.c@gmail.com', '2019/2020', 13),
(14, 32, 55, 31, 38, 2, '2019-12-07 00:00:00', 'blena.c@gmail.com', '2019/2020', 14),
(15, 11, NULL, 11, NULL, 0, NULL, NULL, '2019/2020', 15);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(145) NOT NULL,
  `zones_id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT '1' COMMENT '1 for Men\n2 for ladies'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `zones_id`, `logo`, `gender`) VALUES
(9, 'Chanco Hawks', 4, '../teams/unima.jpg', 1),
(10, 'Chanco Lady Hawks', 4, '../teams/unima.jpg', 2),
(11, 'Poly Wildcats', 1, '../teams/unima.jpg', 1),
(12, 'Poly Ladycats', 1, '../teams/unima.jpg', 2),
(13, 'COM Lumbricals', 1, '../teams/unima.jpg', 1),
(14, 'COM Ladies', 1, '../teams/unima.jpg', 2),
(15, 'MUST Gorillas', 1, '../teams/unima.jpg', 1),
(16, 'MUST Ladies', 1, '../teams/unima.jpg', 2),
(17, 'MCA BT Men', 1, '../teams/unima.jpg', 1),
(18, 'MCA BT Ladies', 1, '../teams/unima.jpg', 2),
(19, 'CU', 1, '../teams/unima.jpg', 1),
(20, 'CU Ladies', 1, '../teams/unima.jpg', 2),
(21, 'MZUNI', 3, '../teams/unima.jpg', 1),
(22, 'UNILIA', 3, '../teams/unima.jpg', 1),
(23, 'UNILIA Ladies', 3, '../teams/unima.jpg', 2),
(24, 'MZUNI Ladies', 3, '../teams/unima.jpg', 2),
(25, 'DOMASI', 4, '../teams/unima.jpg', 1),
(26, 'DMI', 4, '../teams/unima.jpg', 1),
(27, 'ZIMA', 4, '../teams/unima.jpg', 2),
(28, 'DMI Ladies', 4, '../teams/unima.jpg', 2),
(29, 'ABC', 2, '../teams/unima.jpg', 1),
(30, 'NRC', 2, '../teams/unima.jpg', 1),
(31, 'BUNDA', 2, '../teams/unima.jpg', 1),
(32, 'MAGU', 2, '../teams/unima.jpg', 1),
(33, 'UNI OF LL', 2, '../teams/unima.jpg', 1),
(34, 'DAEYANG', 2, '../teams/unima.jpg', 1),
(35, 'NALIKULE', 2, '../teams/unima.jpg', 1),
(36, 'MCA LL', 2, '../teams/unima.jpg', 1),
(37, 'Lilongwe Technical', 2, '../teams/unima.jpg', 1),
(38, 'ABC Ladies', 2, '../teams/unima.jpg', 2),
(39, 'NRC Ladies', 2, '../teams/unima.jpg', 2),
(40, 'Bunda Ladies', 2, '../teams/unima.jpg', 2),
(41, 'MAGU Ladies', 2, '../teams/unima.jpg', 2),
(42, 'UNI OF LL Ladies', 2, '../teams/unima.jpg', 2),
(43, 'DAEYANG Ladies', 2, '../teams/unima.jpg', 2),
(44, 'Chanco Scorpions', 4, '../teams/unima.jpg', 1),
(45, 'NALIKULE Ladies', 2, '../teams/unima.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `phone`, `firstname`, `middlename`, `lastname`, `roles_id`) VALUES
('blena.c@gmail.com', 'blena.c@gmail.com', '$2y$10$Gj4zStb9dyoV2u.ZNnmndOCuFbwehMj9NEwceFfXCHEiWIRQNj3MS', '0999463686', 'Blena', 'N', 'Chisenga', 1),
('malawibasketball@gmail.com', 'malawibasketball@gmail.com', '$2y$10$VOIpqsR7gb7doSspRucx8.c99BFQW6ACZ2jRk3jknmmFc.SG5Ffhq\n', '0996555501', 'Basmal', NULL, 'MW', 10);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `name`) VALUES
(1, 'Chanco Sports Complex'),
(2, 'Don Bosco'),
(3, 'ABC'),
(4, 'CIVO'),
(5, 'MUST'),
(6, 'POLY'),
(7, 'DOMASI'),
(8, 'DMI'),
(9, 'MAGU');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`) VALUES
(1, 'Southern Zone'),
(2, 'Central Zone'),
(3, 'Nothern Zone'),
(4, 'Eastern Zone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_images`
--
ALTER TABLE `album_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixture`
--
ALTER TABLE `fixture`
  ADD PRIMARY KEY (`fixture_id`),
  ADD KEY `fk_fixture_venue1_idx` (`venue_id`);

--
-- Indexes for table `log_table`
--
ALTER TABLE `log_table`
  ADD PRIMARY KEY (`season`,`teams_id`),
  ADD KEY `fk_log_table_zones1_idx` (`zones_id`),
  ADD KEY `fk_log_table_teams1_idx` (`teams_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_players_player_position_idx` (`player_position_id`),
  ADD KEY `fk_players_teams1_idx` (`teams_id`);

--
-- Indexes for table `player_position`
--
ALTER TABLE `player_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`results_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teams_zones1_idx` (`zones_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_users_roles1_idx` (`roles_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `album_images`
--
ALTER TABLE `album_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixture`
--
ALTER TABLE `fixture`
  MODIFY `fixture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `player_position`
--
ALTER TABLE `player_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `results_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fixture`
--
ALTER TABLE `fixture`
  ADD CONSTRAINT `fk_fixture_venue1` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log_table`
--
ALTER TABLE `log_table`
  ADD CONSTRAINT `fk_log_table_teams1` FOREIGN KEY (`teams_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_table_zones1` FOREIGN KEY (`zones_id`) REFERENCES `zones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `fk_players_player_position` FOREIGN KEY (`player_position_id`) REFERENCES `player_position` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_players_teams1` FOREIGN KEY (`teams_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `fk_teams_zones1` FOREIGN KEY (`zones_id`) REFERENCES `zones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
