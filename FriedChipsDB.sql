-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2017 at 05:17 AM
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
('admin', '5', 1505439127);

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
('admin', 1, NULL, NULL, NULL, 1505439103, 1505439103),
('check_query', 2, '', NULL, NULL, 1505496377, 1505496377),
('create-user', 2, '', NULL, NULL, 1505442397, 1505442397),
('delete-user', 2, '', 'isUser', NULL, 1505442795, 1505443296),
('RBAC', 2, 'Can create a new permission, add a new role, assign roles to user', NULL, NULL, 1505439093, 1505439093),
('update-dp', 2, '', 'isUser', NULL, 1505442630, 1505443303),
('update-password', 2, '', 'isUser', NULL, 1505442648, 1505443307),
('update-user-details', 2, '', 'isUser', NULL, 1505442410, 1505443318),
('users', 2, '', NULL, NULL, 1505442811, 1505442811),
('view-all-users', 2, 'Can view all the users present in the database.', NULL, NULL, 1505442322, 1505442322),
('view-user-details', 2, '', 'isUser', NULL, 1505442364, 1505443327);

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
('admin', 'check_query'),
('admin', 'create-user'),
('admin', 'delete-user'),
('admin', 'RBAC'),
('admin', 'update-dp'),
('admin', 'update-password'),
('admin', 'update-user-details'),
('admin', 'view-all-users'),
('admin', 'view-user-details');

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
('isUser', 'O:34:\"app\\models\\rules\\DisplayLoggedUser\":3:{s:4:\"name\";s:6:\"isUser\";s:9:\"createdAt\";i:1505443284;s:9:\"updatedAt\";i:1505443284;}', 1505443284, 1505443284);

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
(7, 'Hyd. Electric Project'),
(8, 'Underground & Open Cast Mines'),
(9, 'Road Construction'),
(10, 'Maintenance Equipment'),
(11, 'Road & Rail Tunnels'),
(12, 'Metro');

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
(8, 'Tunnel Heading', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Tunnel Heading.jpg', 'true'),
(9, 'Mucking', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Mucking.jpg', 'true'),
(11, 'Load Haul Dump (LHD\'s)', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Load Haul Dump (LHD\'s).jpg', 'true'),
(12, 'Dump Trucks', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Dump Trucks.jpg', 'true'),
(14, 'Battery Locomotives', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Battery Locomotives.jpg', 'true'),
(15, 'Transverse Cutting Units', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Transverse Cutting Units.jpg', 'true'),
(17, 'Drilling Jumbos', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Drilling Jumbos.jpg', 'true'),
(19, 'Trolley Locomotives', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Trolley Locomotives.jpg', 'true'),
(20, 'Underground Trucks ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Underground Trucks .jpg', 'true'),
(21, 'Bitumen & Emulsion', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Bitumen & Emulsion.jpg', 'true'),
(23, 'Pipe Layers', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Pipe Layers.jpg', 'true'),
(24, 'Micro Surface Pavers', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Micro Surface Pavers.jpg', 'true'),
(25, 'Raise Climbers', ' It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'uploads/Raise Climbers.jpg', 'true'),
(26, 'Pinion Hoist', ' It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n', 'uploads/Pinion Hoist.jpg', 'true'),
(27, 'Crawler Cranes', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Crawler Cranes.png', 'true'),
(28, 'All Terrain Cranes', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/All Terrain Cranes.jpg', 'true'),
(29, 'Mobile Cranes', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Mobile Cranes.jpg', 'true');

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
(8, 7),
(9, 7),
(9, 12),
(11, 7),
(11, 11),
(12, 7),
(14, 8),
(15, 8),
(17, 8),
(19, 8),
(20, 8),
(21, 9),
(21, 10),
(23, 9),
(24, 9),
(25, 7),
(25, 12),
(26, 7),
(27, 9),
(28, 9),
(28, 11),
(29, 9);

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
(8, 1, 'true'),
(9, 1, 'true'),
(9, 2, 'true'),
(9, 3, 'true'),
(9, 4, 'true'),
(9, 5, 'true'),
(11, 1, 'true'),
(11, 2, 'true'),
(11, 3, 'true'),
(11, 4, 'true'),
(11, 5, 'true'),
(12, 1, 'true'),
(12, 2, 'true'),
(12, 3, 'true'),
(12, 4, 'true'),
(12, 5, 'true'),
(14, 1, 'true'),
(14, 2, 'true'),
(14, 3, 'true'),
(14, 4, 'true'),
(14, 5, 'true'),
(15, 1, 'true'),
(15, 2, 'true'),
(15, 3, 'true'),
(15, 4, 'true'),
(15, 5, 'true'),
(17, 1, 'true'),
(17, 2, 'true'),
(17, 3, 'true'),
(17, 4, 'true'),
(17, 5, 'true'),
(19, 1, 'true'),
(19, 2, 'true'),
(19, 3, 'true'),
(19, 4, 'true'),
(19, 5, 'true'),
(20, 1, 'true'),
(20, 2, 'true'),
(20, 3, 'true'),
(20, 4, 'true'),
(20, 5, 'true'),
(21, 1, 'true'),
(21, 2, 'true'),
(21, 3, 'true'),
(21, 4, 'true'),
(21, 5, 'true'),
(23, 1, 'true'),
(23, 2, 'true'),
(23, 3, 'true'),
(23, 4, 'true'),
(23, 5, 'true'),
(24, 1, 'true'),
(24, 2, 'true'),
(24, 3, 'true'),
(24, 4, 'true'),
(24, 5, 'true'),
(25, 1, 'true'),
(25, 2, 'true'),
(25, 3, 'true'),
(25, 4, 'true'),
(25, 5, 'true'),
(26, 1, 'true'),
(26, 2, 'true'),
(26, 3, 'true'),
(26, 4, 'true'),
(26, 5, 'true'),
(27, 1, 'true'),
(27, 2, 'true'),
(27, 3, 'true'),
(27, 4, 'true'),
(27, 5, 'true'),
(28, 1, 'true'),
(28, 2, 'true'),
(28, 3, 'true'),
(28, 4, 'true'),
(28, 5, 'true'),
(29, 1, 'true'),
(29, 2, 'true'),
(29, 3, 'true'),
(29, 4, 'true'),
(29, 5, 'true');

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
(6, 8, '-', 'true'),
(6, 9, '-', 'true'),
(6, 11, '-', 'true'),
(6, 12, '-', 'true'),
(6, 14, '-', 'true'),
(6, 15, '-', 'true'),
(6, 17, '-', 'true'),
(6, 19, '-', 'true'),
(6, 20, '-', 'true'),
(6, 21, '-', 'true'),
(6, 23, '-', 'true'),
(6, 24, '-', 'true'),
(6, 25, '-', 'true'),
(6, 26, '-', 'true'),
(6, 27, '-', 'true'),
(6, 28, '-', 'true'),
(6, 29, '-', 'true');

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
(1, 'Quantity'),
(2, 'Color'),
(3, 'Usage'),
(4, 'New/Old'),
(5, 'Construction area');

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
(6, '-');

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
(6, 'Micheal', 'Jackson', '$2y$13$ZijOESonrGEsxDis2w.qROOQuBfVDenjmHR.O9AwJ.AYdzqqQ/QAO', 'micheal@gmail.com', '', 'uploads/photo.png'),
(7, 'Jane', 'Doe', '$2y$13$q4abQM1T09gAEM6MhRVOdewMi7U3uJNeeYeQkZlzEl0EDFUINKM0C', 'jane@doe.com', NULL, 'uploads/default.png'),
(8, 'Kane', 'Top', '$2y$13$F/.FqwH1gFq6NMzkXRmDoOqAs/vLUMb2PUXFyrpltGvbDWPT/qVkK', 'kane@top.com', NULL, 'uploads/default.png'),
(9, 'Karen', 'Lobo', '$2y$13$judq.QLksaOqSUY3plT1/eM1tszFYXjhry/e0ZNQVLtRGkemK6uYW', 'karen@lobo.com', NULL, 'uploads/default.png'),
(10, 'Deepak', 'Takur', '$2y$13$bbB41lmM5dIo7XOjmZxQ4e.Rg7WHJQ90tnnF8eK4sNP4PWjVH8Tf2', 'deepak@takur.com', NULL, 'uploads/default.png'),
(11, 'Gaurav', 'Dessai', '$2y$13$EWhvH3vKNRkQBjc7/7Sh1.tjA3RdZVmcv/oOKmxCOt4pCuOkZ9UdK', 'gaurav@dessai.com', NULL, 'uploads/default.png');

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

--
-- Dumping data for table `user_ans_questions`
--

INSERT INTO `user_ans_questions` (`created_time`, `pid`, `qid`, `uid`, `answer`, `isRead`) VALUES
('2017-09-15 16:38:54', 8, 1, 5, '', 'true'),
('2017-09-16 02:10:37', 14, 1, 7, '2 units', 'true'),
('2017-09-16 02:10:37', 14, 2, 7, 'Yellow', 'true'),
('2017-09-16 02:10:37', 14, 3, 7, 'Drilling a hole', 'true'),
('2017-09-16 02:10:37', 14, 4, 7, 'Old', 'true'),
('2017-09-16 02:10:37', 14, 5, 7, 'Margoa', 'true'),
('2017-09-16 02:12:42', 17, 1, 8, '5', 'true'),
('2017-09-16 02:12:42', 17, 2, 8, 'Blue', 'true'),
('2017-09-16 02:12:42', 17, 3, 8, 'Climbing a building', 'true'),
('2017-09-16 02:12:42', 17, 4, 8, 'New', 'true'),
('2017-09-16 02:12:42', 17, 5, 8, 'Mumbai', 'true'),
('2017-09-16 02:14:04', 27, 1, 9, '2', 'true'),
('2017-09-16 02:14:04', 27, 2, 9, 'Yellow', 'true'),
('2017-09-16 02:14:04', 27, 3, 9, 'Need to do some construction work', 'true'),
('2017-09-16 02:14:04', 27, 4, 9, 'New', 'true'),
('2017-09-16 02:14:04', 27, 5, 9, 'Canada', 'true'),
('2017-09-16 02:17:58', 20, 1, 10, '1', 'true'),
('2017-09-16 02:17:58', 20, 2, 10, 'Yellow', 'true'),
('2017-09-16 02:17:58', 20, 3, 10, 'Drilling a wall', 'true'),
('2017-09-16 02:17:58', 20, 4, 10, 'Old', 'true'),
('2017-09-16 02:17:58', 20, 5, 10, 'Mumbai', 'true'),
('2017-09-16 02:18:53', 20, 1, 11, '3', 'true'),
('2017-09-16 02:18:53', 20, 2, 11, 'Any', 'true'),
('2017-09-16 02:18:53', 20, 3, 11, 'Building construction', 'true'),
('2017-09-16 02:18:53', 20, 4, 11, 'Old', 'true'),
('2017-09-16 02:18:53', 20, 5, 11, 'Panjim', 'true');

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
(5, 'Chowgule FOSS Club', '9856321454'),
(7, NULL, '9658745213'),
(8, NULL, '9565874521'),
(9, NULL, '9654785412'),
(10, NULL, '9865321456'),
(11, NULL, '9865321145');

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
