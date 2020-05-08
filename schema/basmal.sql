-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: basmal_db
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `album_cover` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (8,'Poly Games 201900','../albums/analytics2.png'),(9,'MO626 Season 3 Launch','../albums/Mo626-Social-Media-Search.JPG'),(10,'All Stars 2020 - My Bucks','../albums/trophy-all-stars.jpg');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_images`
--

DROP TABLE IF EXISTS `album_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) NOT NULL,
  `caption` varchar(145) NOT NULL,
  `album_id` int(11) NOT NULL,
  `date_posted` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_images`
--

LOCK TABLES `album_images` WRITE;
/*!40000 ALTER TABLE `album_images` DISABLE KEYS */;
INSERT INTO `album_images` VALUES (3,'../albums/Friday_Basketball2.PNG','Friday Games',8,'2019-11-28'),(4,'../albums/Basket-IQ-YouTube-cover.png','Season 3 Launch',9,'2019-11-28'),(5,'../albums/banner-ads.png','Test Photo',9,'2019-11-28'),(6,'../albums/calculator.jpg','Gallery Photo',9,'2019-11-28'),(7,'../albums/trophy-all-stars.jpg','Montana receiving the Championship Trophy from Oscar Kanjala',10,'2020-03-25'),(8,'../albums/sozobal.jpg','Sozobal All Stars',10,'2020-03-25'),(9,'../albums/champs-all-stars.jpg','2020 All Stars Champs - Cezobal',10,'2020-03-25'),(10,'../albums/front-row-all-stars.jpg','Chief Masawani Jere, Oscar Kanjala, Blena Chisenga and Nakali Manjolo ',10,'2020-03-25'),(11,'../albums/committe.jpg','Organising Committee - All Stars 2020',10,'2020-03-25'),(12,'../albums/cezobal-ladies.jpg','Cezoball All Stars 2020',10,'2020-03-25'),(13,'../albums/champs-nozobal.jpg','All Stars D2 2020 Champs',10,'2020-03-25'),(14,'../albums/my-bucks.jpg','My Bucks - Linda Simwaka greating the All Stars',10,'2020-03-25'),(15,'../albums/oscar-moc.jpg','Oscar Kanjala greeting the All Stars',10,'2020-03-25');
/*!40000 ALTER TABLE `album_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'images/banner.jpg','banner1'),(2,'images/banner2.jpg','banner2');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixture`
--

DROP TABLE IF EXISTS `fixture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixture` (
  `fixture_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_team` int(11) NOT NULL,
  `away_team` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `venue_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `season` varchar(45) NOT NULL,
  PRIMARY KEY (`fixture_id`),
  KEY `fk_fixture_venue1_idx` (`venue_id`),
  CONSTRAINT `fk_fixture_venue1` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixture`
--

LOCK TABLES `fixture` WRITE;
/*!40000 ALTER TABLE `fixture` DISABLE KEYS */;
INSERT INTO `fixture` VALUES (1,13,11,'2019-11-16 13:00:00',6,2,'2019/2020'),(2,11,17,'2019-11-16 15:00:00',6,2,'2019/2020'),(3,14,12,'2019-11-16 12:00:00',6,2,'2019/2020'),(4,13,17,'2019-11-16 10:00:00',6,2,'2019/2020'),(5,27,10,'2019-12-07 18:30:00',1,2,'2019/2020'),(6,44,9,'2019-12-07 19:30:00',1,2,'2019/2020'),(8,31,35,'2019-12-07 11:00:00',9,2,'2019/2020'),(10,41,40,'2019-12-07 10:00:00',9,2,'2019/2020'),(11,45,41,'2019-12-07 12:00:00',9,2,'2019/2020'),(12,32,35,'2019-12-07 13:00:00',9,2,'2019/2020'),(13,45,40,'2019-12-07 14:00:00',9,2,'2019/2020'),(14,32,31,'2019-12-07 15:00:00',9,2,'2019/2020'),(15,11,11,'0000-00-00 00:00:00',1,2,'2019/2020');
/*!40000 ALTER TABLE `fixture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_table`
--

DROP TABLE IF EXISTS `log_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `zones_id` int(11) NOT NULL,
  PRIMARY KEY (`season`,`teams_id`),
  KEY `fk_log_table_zones1_idx` (`zones_id`),
  KEY `fk_log_table_teams1_idx` (`teams_id`),
  CONSTRAINT `fk_log_table_teams1` FOREIGN KEY (`teams_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_log_table_zones1` FOREIGN KEY (`zones_id`) REFERENCES `zones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_table`
--

LOCK TABLES `log_table` WRITE;
/*!40000 ALTER TABLE `log_table` DISABLE KEYS */;
INSERT INTO `log_table` VALUES ('2019/2020',9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),('2019/2020',10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),('2019/2020',11,4,2,163,70,2,NULL,NULL,1),('2019/2020',12,2,1,29,9,1,NULL,NULL,1),('2019/2020',13,2,2,70,133,NULL,2,NULL,1),('2019/2020',14,1,1,9,29,NULL,1,NULL,1),('2019/2020',15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),('2019/2020',16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),('2019/2020',17,3,2,92,122,1,1,NULL,1),('2019/2020',18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),('2019/2020',19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),('2019/2020',20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),('2019/2020',21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3),('2019/2020',22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3),('2019/2020',23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3),('2019/2020',24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3),('2019/2020',25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4),('2019/2020',26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4),('2019/2020',27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4),('2019/2020',28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4),('2019/2020',29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',31,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',34,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',35,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',36,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',37,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',40,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',41,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',42,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',43,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),('2019/2020',44,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4),('2019/2020',45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `log_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `added_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (3,'MO626 COLLEGE BASKETBALL THIRD EDITION - SECOND ROUND GAMES','Second Round of the 3rd Edition of Mo626 College Basketball to kick off soon. According to BASMAL Vice President, who is leading the fixtures committee, everything is geared up and ready for the games to kick off at the end of January.\r\n\r\nThe 3rd Edition was kicked off on 16th November 2019. First round of the games saw various teams from 3 regions (South, East, and Central) participating in the games. However most schools could not participate due to a crash with their exams schedule. The Northern Zone had no games played at all as schools were mostly not in session.\r\n\r\nFebruary is when games are expected to be in full swing with all schools participating in their respective zones. The tournament is scheduled to run until end March. Last year\'s champions MCA Lilongwe have pulled out of the tournament giving a chance to uprising teams Poly, Bunda, and ABC. ','../images/mo_launch.jpg','2019-11-27 13:16:00','blena.c@gmail.com'),(6,'THE NEW PRESIDENT OF BASKETBALL ASSOCIATION OF MALAWI','Chief Masawani Jere is the new President of the Basketball Association of Malawi (BASMAL). Chief Jere holds Masterâ€™s Degree in Local Government and Rural Development studies from Birmingham University, U.K. He has been in basketball circles both locally and internationally- He is a 3 time National Champ, he played for CIVO Bax from 1987-1992\r\n\r\nIn other life, Chief Jere is a retired Civil Servant (Ministry of local Government) and the Chief for Emchakachakeni Community in Mzimba. His Ngoni Chief Title is Inkosi Mzikubola the IV. He is married with 2 kids. With his love for basketball, Jere has managed to develop basketball in his community by building 2 basketball courts at Echakachakeni Community Secondary School and Robert Laws Secondary School. He is planning to build another basketball court at Ekwendeni Community Secondary School in May, 2020. This great initiative in his community has been possible by working closely with his high school friend Adam Silver who happens to be the Commissioner for the NBA. \r\n\r\nIn the next four years as BASMAL President, he want to focus on the grass root level by promoting the juniors league. He will also focus on improving the infrastructure of the game, which is the main challenge in this country.\r\n\r\nCongratulations Chief Masawani Jere â€“ let us change the game together.','../images/Jere2.jpg','2020-03-24 19:04:00','blena.c@gmail.com'),(7,'THE VICE PRESIDENT OF BASKETBALL ASSOCIATION OF MALAWI','Banthari â€œB-manâ€ Banda is the new Vice President of Basketball Association of Malawi (BASMAL). Banthari is an IT Expert who works as Service Delivery Supervisor for NITEL (formerly known as MALSWITCH). He is married with two kids.\r\n\r\nBanthari hasnâ€™t left any stone unturned when it comes to Malawian Basketball. He is the current National 3x3 Basketball Coordinator. He was the General Secretary for Southern Zone Basketball League (SOZOBAL) from 2010 â€“ 2015 before joining Basketball Association of Malawi as Vice General Secretary from 2015 â€“ 2019.\r\n\r\nBeing a team player, Banthari has managed to work with different people during his basketball life to organize and secure sponsorship for different activities such as NBM Mo626 Ice College Basketball, National Finals (Boys & Girls) Under 18 3x3 Basketball (2019), Presidential Initiative for Sports, All Star Games just to mention a few.\r\n\r\nAs a basketball Player, Banthari has managed to play for the following teams during his time; Chichiri Secondary School, Crazy Warriors, Falcons, Bricks and the Mighty Legends.\r\n\r\nIn the next four years as BASMAL Vice President, his main 4 core objectives that BASMAL should implement are; (1) BASMAL to have a proper database for its registered players, coaches, referees, and partners. (2) To make sure that primary & secondary school basketball competitions are re-introduced as part of youth development. (3) Heâ€™ll push for technical courses so that Malawi should have a pool of FIBA accredited Coaches at all levels, FIBA accredited Referees & Commissioners. He will also introduce 3x3 youth leaders in all zones for the game of basketball to improve technically in order for Malawi to be able to compete on an international level in all categories. (4) To resurrect the Senior Menâ€™s National Team and introduce the Ladies Basketball National Team.\r\n\r\nCongratulations Banthari â€œB-manâ€ Banda â€“ let us change the game together.','../images/Bman3.JPG','2020-03-25 18:10:00','blena.c@gmail.com'),(8,'THE NEW GENERAL SECRETARY FOR BASKETBALL ASSOCIATION OF MALAWI','Peter Gomani is the new General Secretary for Basketball Association of Malawi (BASMAL). Peter holds a Bachelorâ€™s Degree in Accountancy and works as the Human Resources Manager for Workforce Recruitment Services Ltd. He is married with three kids.\r\n\r\nBefore joining BASMAL, Peter was a committee member for CEZOBAL from 2010 â€“ 2012 and then later became the General Secretary for CEZOBAL from 2015-2020. He is also a Co-founder of the Lilongwe based team known as Disciples Basketball. As a basketball player, he has played for the following teams; Poly Bobcats, Trojans Basketball and Disciples. He is also a 2009 CEZOBAL All Star.\r\n\r\nDriven by passion and by the fact that there was someone else behind the years he enjoyed basketball, he has always wanted to be that someone else for that kid who wants to enjoy basketball now which will contribute to the growth and development of basketball in Malawi. He believes after serving CEZOBAL for more than 7 years, he has gained enough experience and knowledge which will help him perform his duties as BASMAL GS.\r\n\r\nHe is looking forward to an exciting four years which will see basketball transforming to become a major sport discipline in Malawi. I look forward to be part of the team that will bring back confidence of stakeholders, making partnerships within and outside Malawi plus building modern infrastructure for basketball. He also looks forward to working with zonal leadership\'s harmonizing the activities of the zones and strengthening the relationship between the two with an aim of achieving a common goal.\r\n\r\nCongratulations Peter Gomani â€“ Let us change the game together.','../images/Peter.jpg','2020-03-26 11:12:00','blena.c@gmail.com');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_position`
--

DROP TABLE IF EXISTS `player_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_position`
--

LOCK TABLES `player_position` WRITE;
/*!40000 ALTER TABLE `player_position` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `player_position_id` int(11) NOT NULL,
  `teams_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_players_player_position_idx` (`player_position_id`),
  KEY `fk_players_teams1_idx` (`teams_id`),
  CONSTRAINT `fk_players_player_position` FOREIGN KEY (`player_position_id`) REFERENCES `player_position` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_players_teams1` FOREIGN KEY (`teams_id`) REFERENCES `teams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `results_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_team` int(11) NOT NULL,
  `home_team_score` int(11) DEFAULT NULL,
  `away_team` int(11) NOT NULL,
  `away_team_score` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `last_updated` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `season` varchar(45) NOT NULL,
  `fixture_id` int(11) NOT NULL,
  PRIMARY KEY (`results_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,13,30,11,81,2,'2019-11-16 00:00:00','blena.c@gmail.com','2019/2020',1),(2,11,82,17,40,2,'2019-11-16 00:00:00','blena.c@gmail.com','2019/2020',2),(3,14,9,12,29,2,'2019-11-16 00:00:00','blena.c@gmail.com','2019/2020',3),(4,13,40,17,52,2,'2019-11-16 00:00:00','blena.c@gmail.com','2019/2020',4),(5,27,61,10,32,2,'2019-12-07 00:00:00','blena.c@gmail.com','2019/2020',5),(6,44,46,9,64,2,'2019-12-07 00:00:00','blena.c@gmail.com','2019/2020',6),(8,31,62,35,38,2,'2019-12-07 00:00:00','blena.c@gmail.com','2019/2020',8),(10,41,44,40,55,2,'2019-12-07 00:00:00','blena.c@gmail.com','2019/2020',10),(11,45,53,41,24,2,'2019-12-07 00:00:00','blena.c@gmail.com','2019/2020',11),(12,32,79,35,32,2,'2019-12-07 00:00:00','blena.c@gmail.com','2019/2020',12),(13,45,14,40,39,2,'2019-12-07 00:00:00','blena.c@gmail.com','2019/2020',13),(14,32,55,31,38,2,'2019-12-07 00:00:00','blena.c@gmail.com','2019/2020',14),(15,11,NULL,11,NULL,0,NULL,NULL,'2019/2020',15);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin'),(2,'Editor');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secretariat`
--

DROP TABLE IF EXISTS `secretariat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secretariat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT 'images/placeholder.png',
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secretariat`
--

LOCK TABLES `secretariat` WRITE;
/*!40000 ALTER TABLE `secretariat` DISABLE KEYS */;
INSERT INTO `secretariat` VALUES (1,'Dean Lungu Jnr','YOUTH DIRECTOR','Marital status: Married with 1 daughter\r\nProfession: Contractor \r\nDean Lungu Jnr is the Youth Director of Basketball Association of Malawi (BASMAL). Dean works as Contracts Manager for (Deans Engineering Company Limited) DECO Ltd. He is married and have one kid.\r\nDean is the co-founder of Catalyst Basketball Movement (CBM) which promotes leadership and social grassroots level change by using basketball as a vehicle for the youth to exchange cultures, values, skills and create equal opportunities. Through CBM he has worked with BASMAL in facilitating the FIBA Young Lions 3x3 program as well as various programs with NBA Africa, BIM and Canterbury Rams Basketball Team.\r\n\r\nPrior to joining Basmal he served as Youth representative in Cezobal on two different occasions from 2010-2012 and then 2017-2020. \r\n\r\nBasketball History:\r\nDean played played for Rhodes University Menâ€™s Basketball team from 2003-2005 and also coached the Rhodes University Menâ€™s first team in 2005. Dean has served as Assistant coach for the Malawi Menâ€™s National Team from 2010-2013. He has also been player/coach for Them Pirates Basketball Club in Cezobal from 2010 before retiring in 2018. He now serves as a board member for Them Pirates Basketball Club.\r\n\r\nDean brings in passion, a wealth of experience and a vast network together with a drive and willingness to use basketball as a means to create awareness and support for the underprivileged children and young adults through programs, which place emphasis on hard work, accountability, honest living and positivity. Plus to create opportunities for the youth not only as a players, but outside of basketball as leaders of tomorrow.','images/placeholder.png',NULL),(2,'Dr. Dominic Zaliro Samu Moyo','THE DIRECTOR OF COMPETITIONS & COMPLIANCE','Dr. Dominic Zaliro Samu Moyo is the Director of Competitions & Compliance for Basketball Association of Malawi (BASMAL). Dominic has a Masterâ€™s degree in Medicine, Pediatrics and Child Health. He is the Consultant General Pediatrician at Queen Elizabeth Hospital. He is also a lecturer at College of Medicine. He is married and has one kid.\r\nDominic has played different roles in the Southern Zone Basketball League (SOZOBAL) before joining BASMAL. He was the Publicity Secretary from 2013-2014 then later became the Leagues Administration Manager from 2014-2016. In 2016, he was the Vice Chairman for SOZOBAL. In the just ended 2020 All Stars games, he was one of the organizing committee member.\r\nAs basketball player, he has played for the following teams; College of Medicine, Falcons, Them Pirates Basketball, Mikoko Basketball, Magangâ€™a and currently playing for Crazy Warriors. He is a 1 time Southern Zone Basketball League Champ and a 1 time Bravehearts King & Queens of the Court Champ.\r\nHis goal in the next four years is to have national competitions which are exciting and sustainable. He will build a resilient competitions environment for all basketball competitions in Malawi. He will also ensure inclusiveness in all BASMAL suctioned activities with special emphasis in ensuring participation of special groups (physically challenged and those in rural areas). Dominic will make sure that the basketball competitions add value to the socio-economic development of the communities such activities are taking place.','images/placeholder.png',NULL),(3,'John Chizunza','THE VICE GENERAL SECRETARY','John Chizunza is the new Vice General Secretary for Basketball Association of Malawi (BASMAL). John holds a Bachelorâ€™s Degree in Social Science majoring in Economics and works as the Branch Manager for Eco Bank in Mzuzu. He is married with one kid.\r\nJohn was the Northern Zone Basketball League (NOZOBAL) General Secretary before joining BASMAL. During his term as NOZOBAL GS, he has led NOZOBAL to its first ever National Championship in the 2020 Rising All Stars Competition. He is also a founder and coach for the Mzuzu based team known as Nkhadwe.  He is a 1 time National Champ (Chanco Hawks, 2001-2001) and he has over 10 yearsâ€™ experience as a basketball player, playing for teams like; Chanco Hawks, Bricks, Trojans and Nkhadwe.\r\nHis main focus in the next four years is to have a vibrant Junior Leagues, Competitive Zones and produce Elite Basketball Players who can compete on the continent. He will work closely with local and international stakeholders to achieve this. He will also make sure to have a transparent and accountable BASMAL.','images/placeholder.png',1),(4,'Dr. Lisungu Banda Moyo (Lisu) ','THE DIRECTOR OF WOMEN BASKETBALL ','Dr. Lisungu Banda Moyo (Lisu) is the Director of Women Basketball for Basketball Association of Malawi (BASMAL). She has a PhD in Resource Economics from Lilongwe University of Agriculture and Natural Resources (Formerly known as Bunda College of Agriculture). She is married.\r\nSports know Lisu by first name - She is a 2 time national Champ, a former General Secretary for Central Zone Basketball League (CEZOBAL) and a former Treasurer for BASMAL. She is also the General Secretary for Lilongwe Sports District Committee.\r\nAs a basketball player, she has won almost everything you can think of on a local scene such as; Bunda First Year Most Valuable Player (MVP) - Mkwambisi trophy 2006, Angels Player of the Year Award 2014, Angels 2015 Championship team Award, Tanzania Mbeya Flames tournament MVP, Bravehearts Most committed player of the year Award 2016, Bravehearts National Championship team Award 2016, Malawi Most Valuable Player Nationals 2016, Vixens International Tournament in Zimbabwe- Runners up. 2016, Harare Mayors International basketball tournament Runners up 2017, Bravehearts International Basketball Challenge Champions 2018 and Basketball Champion of the game Award 2018\r\nAs a basketball coach, she has coached Bunda Ollivetes, Lilongwe Girls Secondary School, Lady Angels Basketball, Lady Bravehearts Basketball, 2020 All Star Team and currently coaching Pirates Basketball Team & Lilongwe University of Agriculture and Natural Resources.\r\nHer main focus during the next four years is to give the women a chance to participate and shine out there, she will create structures that will align with the international standards. She will start women basketball from the grassroots, primary schools, high schools, colleges then Elite from all the parts of the country â€“ NORTH, SOUTH AND CENTRAL.','images/placeholder.png',NULL),(5,'Blena Chisenga Snr ','THE DIRECTOR OF MARKETING & RESOURCE MOBILIZATION','Blena Chisenga Snr is the Director of Marketing and Resource Mobilization for Basketball Association of Malawi (BASMAL). Blena has a Masterâ€™s degree in Computer Science and is the Founder & Managing Director at Virtual Tech Malawi. He is married and has one kid.\r\nBlena was the Head of Marketing for Mikoko Basketball before joining BASMAL. As a basketball player, he played for Chanco Hawks, where he was also the Sports Director. He then played for Central Knights in Lilongwe and later founded Mikoko Basketball in Blantyre. He believes in creating opportunities for others especially the youth and the under-privileged. In line with what he believes in, he founded Namikasi Basketball which is a community based team in Mdeka. He is also running basketball clinics for under 10 kids in Blantyre under the Kids Basketball brand. For the love of basketball, he introduced Entrepreneurs Basketball which aims at connecting entrepreneurs using the game of basketball. The team plays in the Southern Zone Corporate Social Basketball.\r\nBeing a digital Marketing Expert, he will utilize his skills to build awareness of the game. He will come up with a database to keep records of the game that can be accessed by the public using different digital platforms such Social Media, Mobile App, USSD and Website. He will also build partnerships with different stakeholders that will see the game grow and at the same time adding value to the partners.','images/placeholder.png',NULL),(6,'Banthari â€œBmanâ€ Banda ','THE VICE PRESIDENT OF BASKETBALL ASSOCIATION OF MALAWI','Banthari â€œBmanâ€ Banda is the new Vice President of Basketball Association of Malawi (BASMAL). Banthari is an IT Expert who works as Service Delivery Supervisor for NITEL (formerly known as MALSWITCH). He is married with two kids.\r\nBanthari hasnâ€™t left any stone unturned when it comes to Malawian Basketball. He is the current National Coordinator 3x3 Basketball. He was the General Secretary for Southern Zone Basketball League (SOZOBAL) from 2010 â€“ 2015 before joining Basketball Association of Malawi as Vice General Secretary from 2015 â€“ 2019.\r\nBeing a team player, Banthari has managed to work with different people during his basketball life to organize and secure sponsorship for different activities such as NBM Mo626 Ice College Basketball, National Finals (Boys & Girls) Under 18 3x3 Basketball (2019), Presidential Initiative for Sports, All Star Games just to mention a few.\r\nAs a basketball Player, Banthari has managed to play for the following teams during his prime; Chichiri Secondary School, Crazy Warriors, Falcons, Bricks and the Mighty Legends. \r\nIn the next four years as BASMAL Vice President.','images/placeholder.png',2),(7,'Chief Masawani Jere ','THE PRESIDENT OF BASKETBALL ASSOCIATION OF MALAWI','Chief Masawani Jere is the new President of the Basketball Association of Malawi (BASMAL). Chief Jere holds Masterâ€™s Degree in Local Government and Rural Development studies from Birmingham University, U.K. He has been in basketball circles both locally and internationally- He is a 3 time National Champ, he played for CIVO Bax from 1987-1992\r\nIn other life, Chief Jere is a retired Civil Servant (Ministry of local Government) and the Chief for Emchakachakeni Community in Mzimba. His Ngoni Chief Title is Inkosi Mzikubola the IV. He is married with 2 kids. With his love for basketball, Jere has managed to develop basketball in his community by building 2 basketball courts at Echakachakeni Community Secondary School and Robert Laws Secondary School. He is planning to build another basketball court at Ekwendeni Community Secondary School in May, 2020. This great initiative in his community has been possible by working closely with his high school friend Adam Silver who happens to be the Commissioner for the NBA. \r\nIn the next four years as BASMAL President, he want to focus on the grass root level by promoting the juniors league. He will also focus on improving the infrastructure of the game, which is the main challenge in this country.','images/placeholder.png',3),(8,'Hope Chisamanga','TECHNICAL DIRECTOR','','images/placeholder.png',NULL),(9,'Hellen Chabunya','TREASURER','','images/placeholder.png',NULL);
/*!40000 ALTER TABLE `secretariat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `zones_id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL DEFAULT 1 COMMENT '1 for Men\n2 for ladies',
  PRIMARY KEY (`id`),
  KEY `fk_teams_zones1_idx` (`zones_id`),
  CONSTRAINT `fk_teams_zones1` FOREIGN KEY (`zones_id`) REFERENCES `zones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (9,'Chanco Hawks',4,'../teams/unima.jpg',1),(10,'Chanco Lady Hawks',4,'../teams/unima.jpg',2),(11,'Poly Wildcats',1,'../teams/unima.jpg',1),(12,'Poly Ladycats',1,'../teams/unima.jpg',2),(13,'COM Lumbricals',1,'../teams/unima.jpg',1),(14,'COM Ladies',1,'../teams/unima.jpg',2),(15,'MUST Gorillas',1,'../teams/unima.jpg',1),(16,'MUST Ladies',1,'../teams/unima.jpg',2),(17,'MCA BT Men',1,'../teams/unima.jpg',1),(18,'MCA BT Ladies',1,'../teams/unima.jpg',2),(19,'CU',1,'../teams/unima.jpg',1),(20,'CU Ladies',1,'../teams/unima.jpg',2),(21,'MZUNI',3,'../teams/unima.jpg',1),(22,'UNILIA',3,'../teams/unima.jpg',1),(23,'UNILIA Ladies',3,'../teams/unima.jpg',2),(24,'MZUNI Ladies',3,'../teams/unima.jpg',2),(25,'DOMASI',4,'../teams/unima.jpg',1),(26,'DMI',4,'../teams/unima.jpg',1),(27,'ZIMA',4,'../teams/unima.jpg',2),(28,'DMI Ladies',4,'../teams/unima.jpg',2),(29,'ABC',2,'../teams/unima.jpg',1),(30,'NRC',2,'../teams/unima.jpg',1),(31,'BUNDA',2,'../teams/unima.jpg',1),(32,'MAGU',2,'../teams/unima.jpg',1),(33,'UNI OF LL',2,'../teams/unima.jpg',1),(34,'DAEYANG',2,'../teams/unima.jpg',1),(35,'NALIKULE',2,'../teams/unima.jpg',1),(36,'MCA LL',2,'../teams/unima.jpg',1),(37,'Lilongwe Technical',2,'../teams/unima.jpg',1),(38,'ABC Ladies',2,'../teams/unima.jpg',2),(39,'NRC Ladies',2,'../teams/unima.jpg',2),(40,'Bunda Ladies',2,'../teams/unima.jpg',2),(41,'MAGU Ladies',2,'../teams/unima.jpg',2),(42,'UNI OF LL Ladies',2,'../teams/unima.jpg',2),(43,'DAEYANG Ladies',2,'../teams/unima.jpg',2),(44,'Chanco Scorpions',4,'../teams/unima.jpg',1),(45,'NALIKULE Ladies',2,'../teams/unima.jpg',2);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) NOT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `fk_users_roles1_idx` (`roles_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('blena.c@gmail.com','blena.c@gmail.com','$2y$10$Gj4zStb9dyoV2u.ZNnmndOCuFbwehMj9NEwceFfXCHEiWIRQNj3MS','0999463686','Blena','N','Chisenga',1),('malawibasketball@gmail.com','malawibasketball@gmail.com','$2y$10$VOIpqsR7gb7doSspRucx8.c99BFQW6ACZ2jRk3jknmmFc.SG5Ffhq\n','0996555501','Basmal',NULL,'MW',10),('admin@admin.com','admin@admin.com','$2y$10$H/gqvUtrii6BR14NCbmS6.dFd.AQP3niPLMQrTHpwea6fXoDVsvk6','0882550227','Pistone','J','Sanjama',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venue`
--

LOCK TABLES `venue` WRITE;
/*!40000 ALTER TABLE `venue` DISABLE KEYS */;
INSERT INTO `venue` VALUES (1,'Chanco Sports Complex'),(2,'Don Bosco'),(3,'ABC'),(4,'CIVO'),(5,'MUST'),(6,'POLY'),(7,'DOMASI'),(8,'DMI'),(9,'MAGU');
/*!40000 ALTER TABLE `venue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,'Southern Zone'),(2,'Central Zone'),(3,'Nothern Zone'),(4,'Eastern Zone');
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-08 12:37:47
