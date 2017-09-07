-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2017 at 04:24 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FriedChipsDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '5', NULL),
('cas', '5', NULL),
('show', '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1504319391, 1504319391),
('cas', 1, NULL, NULL, NULL, 1504539295, 1504539295),
('display-details', 2, 'display details of users', NULL, NULL, 1504319285, 1504319285),
('display-logged-user', 2, 'Displaying details of the user logged in', 'isAuthor', NULL, 1504319285, 1504319285),
('editor', 2, NULL, NULL, NULL, 1504319285, 1504319285),
('hopeitworkstes', 2, 'dasdasd', NULL, NULL, 1504537878, 1504537878),
('show', 1, NULL, NULL, NULL, 1504537742, 1504537742);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'display-details'),
('admin', 'display-logged-user'),
('admin', 'editor'),
('cas', 'display-details'),
('cas', 'display-logged-user'),
('display-logged-user', 'display-details'),
('editor', 'display-logged-user'),
('show', 'display-details'),
('show', 'display-logged-user'),
('show', 'editor');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:34:\"app\\models\\rules\\DisplayLoggedUser\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1504319285;s:9:\"updatedAt\";i:1504319285;}', 1504319285, 1504319285);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `name`) VALUES
(4, 'Defender'),
(5, 'Midfielder'),
(6, 'Attacker');

-- --------------------------------------------------------

--
-- Table structure for table `customer_questions`
--

CREATE TABLE `customer_questions` (
  `userid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `value` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `description`, `image`, `status`) VALUES
(1, 'Wayne Rooney', ' Wayne Mark Rooney (; born 24 October 1985) is an English professional footballer who plays for Premier League club Everton and captains the England national team. He has played much of his career as a forward, and he has also been used in various midfield roles. He is the record goalscorer for the England national team and for Manchester United. At club level, he has won every honour available in English, Continental and European football, with the exception of the European Super Cup.[3] Along with Michael Carrick, he is the only English player to win the Premier League, FA Cup, UEFA Champions League, League Cup, UEFA Europa League and FIFA Club World Cup.', 'uploads/Wayne Rooney.jpe', 'true'),
(2, 'Michael Carrick', 'Michael Carrick (born 28 July 1981) is an English professional footballer who plays for Manchester United, whom he also captains, and the England national team. Carrick primarily plays as a central midfielder, but he has been used as an emergency centre-back under Alex Ferguson, David Moyes and Louis van Gaal. Distinctive features of his play include his inventive distribution of the ball along with his passing and crossing abilities.[3][4] He is one of the most decorated English footballers of all time.[5][6]\r\n\r\nCarrick began his career at West Ham United, joining the youth team in 1997 and winning the FA Youth Cup two years later. He was sent on loan twice during his debut season, to Swindon Town and Birmingham City, before securing a place in the first team by the 2000–01 season. He experienced relegation in the 2002–03 season and was voted into the PFA First Division Team of the Year in the following campaign. He made more than 150 appearances for the Hammers, but in 2004, he moved to rival London club Tottenham Hotspur for a fee believed to be £3.5 million. He scored twice in 75 appearances, before moving to Manchester United in 2006 for £18 million.', 'uploads/Michael Carrick.jpe', 'true'),
(3, 'Paul Pogba', 'Paul Labile Pogba (born 15 March 1993) is a French professional footballer who plays for Premier League club Manchester United and the France national team. He operates primarily as a central midfielder and is comfortable playing both in attack and defence.[3]\r\n\r\nAfter beginning his career with Manchester United in 2011, Pogba joined Italian side Juventus in 2012, and helped the club to four consecutive Serie A titles, as well as two Coppa Italia and two Supercoppa Italiana titles. During his time with the club, he established himself as one of the most promising young players in the world, and received the Golden Boy award in 2013, followed by the Bravo Award in 2014 and was named by The Guardian as one of the ten most promising young players in Europe. In 2016, Pogba was named to the 2015 UEFA Team of the Year as well as the 2015 FIFA FIFPro World XI, after helping Juventus to the 2015 UEFA Champions League Final. Despite leaving Manchester United on a free transfer, Pogba returned to the club in 2016 for a then-world record transfer fee of €105 million (£89.3 million).[4]', 'uploads/Paul Pogba.jpg', 'true'),
(4, 'Zlatan Ibrahimovic', 'Swedish professional footballer who plays as a forward for Manchester United. He was also a member of the Sweden national team, making his senior international debut in 2001 and serving as captain from 2010 until he retired from international football in 2016.[3] Primarily a striker, he is a prolific goalscorer, who is best known for his technique, creativity, strength, ability in the air, and his powerful and accurate striking ability. As of May 2017, he is the second most decorated active footballer in the world, having won 33 trophies in his career.[4]', 'uploads/Zlatan Ibrahimovic.jpe', 'true'),
(5, 'Ander Herrera Agüera ', 'Spanish professional footballer who plays as a midfielder for English club Manchester United and the Spain national team.\r\nHe began his career at Real Zaragoza, before moving to Athletic Bilbao in 2011 and then to Manchester United for €36 million in 2014. He was named the club\'s player of the year in the 2016–17 season.\r\nHe has won tournaments with Spain at under-20 and under-21 level and represented the nation at the 2012 Olympics. He made his senior international debut in November 2016.', 'uploads/Ander Herrera Agüera .jpg', 'true'),
(6, 'Marcus Rashford ', ' English professional footballer who plays as a forward for Premier League club Manchester United and the England national team.\r\n\r\nA Manchester United player from the age of seven, he scored twice in both his first-team debut (UEFA Europa League) after the warm-up injury of striker Anthony Martial and in his first Premier League match in February 2016 (against Arsenal). He also scored in his first Manchester derby match, and his first League Cup match.\r\nRashford scored on his England debut in May 2016, becoming the youngest English player to score in his first senior international match. He was chosen for UEFA Euro 2016.', 'uploads/Marcus Rashford .jpe', 'true'),
(7, 'David de Gea Quintana', 'Spanish professional footballer who plays as a goalkeeper for English club Manchester United and the Spain national team. He has been hailed as one of the best goalkeepers in the world.[3][4]\r\n\r\nBorn in Madrid, De Gea began his career aged 13 with Atlético Madrid and rose through the academy system at the club before making his senior debut in 2009. After being made Atlético\'s first-choice goalkeeper, he helped the team win both the UEFA Europa League and the UEFA Super Cup in 2010. His performances attracted the attention of Manchester United, whom he joined in June 2011 for £18.9 million, a British record for a goalkeeper.', 'uploads/David de Gea Quintana.jpe', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pid`, `cid`) VALUES
(1, 5),
(1, 6),
(2, 4),
(2, 5),
(3, 5),
(3, 6),
(4, 6),
(5, 5),
(5, 6),
(6, 6),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_question`
--

CREATE TABLE `product_question` (
  `pid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `status` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_question`
--

INSERT INTO `product_question` (`pid`, `qid`, `status`) VALUES
(1, 1, 'true'),
(1, 2, 'true'),
(1, 3, 'true'),
(2, 1, 'true'),
(2, 2, 'true'),
(2, 3, 'true'),
(3, 1, 'true'),
(3, 2, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_specs`
--

CREATE TABLE `product_specs` (
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `value` varchar(500) NOT NULL,
  `status` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_specs`
--

INSERT INTO `product_specs` (`sid`, `pid`, `value`, `status`) VALUES
(1, 1, '1223', 'true'),
(1, 2, '180', 'true'),
(2, 1, '100', 'true'),
(2, 2, '120', 'true'),
(3, 1, 'ENGLAND', 'true'),
(3, 2, 'ENGLANG', 'true'),
(3, 3, 'France', 'true'),
(3, 4, 'Sweden', 'true'),
(3, 5, 'Spain', 'true'),
(3, 6, 'England', 'true'),
(3, 7, 'Spain', 'true'),
(4, 1, 'Manchester United', 'true'),
(4, 2, 'Manchester United', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `name`) VALUES
(1, 'What is his top speed ?'),
(2, 'What is his shot speed ?'),
(3, 'Is he fit to play 90mins');

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `sid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`sid`, `name`) VALUES
(1, 'HEIGHT'),
(2, 'WEIGHT'),
(3, 'COUNTRY'),
(4, 'CLUB'),
(5, 'LOAD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `password`, `email`, `authKey`, `image`) VALUES
(5, 'Castor', 'Godinho', '$2y$13$OIgCheJl8vwYTIpC0CdiSeCByyD4yCS/SS5KC1BsI/hUSkoK4phii', 'castorgodinho@yahoo.in', '', 'uploads/Jon-Snow-4.jpg'),
(6, 'Micheal', 'Jackson', '$2y$13$ZijOESonrGEsxDis2w.qROOQuBfVDenjmHR.O9AwJ.AYdzqqQ/QAO', 'micheal@gmail.com', '', 'uploads/photo.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_ans_questions`
--

CREATE TABLE `user_ans_questions` (
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `answer` text,
  `isRead` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `userid` int(11) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_customer`
--

INSERT INTO `user_customer` (`userid`, `company`, `phone`) VALUES
(5, 'Chowgule FOSS Club', '9856321454');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customer_questions`
--
ALTER TABLE `customer_questions`
  ADD PRIMARY KEY (`userid`,`qid`),
  ADD KEY `customer_question_qid` (`qid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pid`,`cid`),
  ADD KEY `product_category_cid` (`cid`);

--
-- Indexes for table `product_question`
--
ALTER TABLE `product_question`
  ADD PRIMARY KEY (`pid`,`qid`),
  ADD KEY `product_question_qid` (`qid`);

--
-- Indexes for table `product_specs`
--
ALTER TABLE `product_specs`
  ADD PRIMARY KEY (`sid`,`pid`),
  ADD KEY `product_specs_pid` (`pid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_ans_questions`
--
ALTER TABLE `user_ans_questions`
  ADD PRIMARY KEY (`created_time`,`pid`,`qid`,`uid`),
  ADD KEY `user_ans_questions_pid` (`pid`),
  ADD KEY `user_ans_questions_qid` (`qid`),
  ADD KEY `user_ans_questions_uid` (`uid`);

--
-- Indexes for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_questions`
--
ALTER TABLE `customer_questions`
  ADD CONSTRAINT `customer_question_qid` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`),
  ADD CONSTRAINT `customer_question_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_cid` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`),
  ADD CONSTRAINT `product_category_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);

--
-- Constraints for table `product_question`
--
ALTER TABLE `product_question`
  ADD CONSTRAINT `product_question_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `product_question_qid` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`);

--
-- Constraints for table `product_specs`
--
ALTER TABLE `product_specs`
  ADD CONSTRAINT `product_specs_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `product_specs_sid` FOREIGN KEY (`sid`) REFERENCES `specification` (`sid`);

--
-- Constraints for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD CONSTRAINT `user_admin_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `user_ans_questions`
--
ALTER TABLE `user_ans_questions`
  ADD CONSTRAINT `user_ans_questions_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `user_ans_questions_qid` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`),
  ADD CONSTRAINT `user_ans_questions_uid` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD CONSTRAINT `user_customer_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
