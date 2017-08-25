-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2017 at 04:33 AM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Wayne Mark Rooney', ' Wayne Mark Rooney (; born 24 October 1985) is an English professional footballer who plays for Premier League club Everton and captains the England national team. He has played much of his career as a forward, and he has also been used in various midfield roles. He is the record goalscorer for the England national team and for Manchester United. At club level, he has won every honour available in English, Continental and European football, with the exception of the European Super Cup.[3] Along with Michael Carrick, he is the only English player to win the Premier League, FA Cup, UEFA Champions League, League Cup, UEFA Europa League and FIFA Club World Cup.[4]', 'uploads/Wayne Mark Rooney.jpg', 'true'),
(2, 'Michael Carrick', 'Michael Carrick (born 28 July 1981) is an English professional footballer who plays for Manchester United, whom he also captains, and the England national team. Carrick primarily plays as a central midfielder, but he has been used as an emergency centre-back under Alex Ferguson, David Moyes and Louis van Gaal. Distinctive features of his play include his inventive distribution of the ball along with his passing and crossing abilities.[3][4] He is one of the most decorated English footballers of all time.[5][6]\r\n\r\nCarrick began his career at West Ham United, joining the youth team in 1997 and winning the FA Youth Cup two years later. He was sent on loan twice during his debut season, to Swindon Town and Birmingham City, before securing a place in the first team by the 2000–01 season. He experienced relegation in the 2002–03 season and was voted into the PFA First Division Team of the Year in the following campaign. He made more than 150 appearances for the Hammers, but in 2004, he moved to rival London club Tottenham Hotspur for a fee believed to be £3.5 million. He scored twice in 75 appearances, before moving to Manchester United in 2006 for £18 million.', 'uploads/Michael Carrick.jpe', 'true'),
(3, 'Paul Pogba', 'Paul Labile Pogba (born 15 March 1993) is a French professional footballer who plays for Premier League club Manchester United and the France national team. He operates primarily as a central midfielder and is comfortable playing both in attack and defence.[3]\r\n\r\nAfter beginning his career with Manchester United in 2011, Pogba joined Italian side Juventus in 2012, and helped the club to four consecutive Serie A titles, as well as two Coppa Italia and two Supercoppa Italiana titles. During his time with the club, he established himself as one of the most promising young players in the world, and received the Golden Boy award in 2013, followed by the Bravo Award in 2014 and was named by The Guardian as one of the ten most promising young players in Europe. In 2016, Pogba was named to the 2015 UEFA Team of the Year as well as the 2015 FIFA FIFPro World XI, after helping Juventus to the 2015 UEFA Champions League Final. Despite leaving Manchester United on a free transfer, Pogba returned to the club in 2016 for a then-world record transfer fee of €105 million (£89.3 million).[4]', 'uploads/Paul Pogba.jpg', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'CLUB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `image` text NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `authKey` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `image`, `password`, `email`, `authKey`) VALUES
(11, 'John', 'Snow', 'uploads/Jon-Snow-4.jpg', '$2y$13$cmwzxlMt/szWnmrdG1mtvu8vXqDLD15S4RU86GN0YgYB2ZbBXRC7e', 'john@snow.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `userid` int(11) NOT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD CONSTRAINT `user_customer_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
