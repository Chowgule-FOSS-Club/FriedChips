-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2017 at 02:03 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `auth_assignment` (
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

CREATE TABLE IF NOT EXISTS `auth_item` (
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

CREATE TABLE IF NOT EXISTS `auth_item_child` (
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

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isUser', 'O:34:"app\\models\\rules\\DisplayLoggedUser":3:{s:4:"name";s:6:"isUser";s:9:"createdAt";i:1505443284;s:9:"updatedAt";i:1505443284;}', 1505443284, 1505443284);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `customer_questions` (
  `userid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `value` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` enum('true','false') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `description`, `image`, `status`) VALUES
(11, 'Load Haul Dump (LHD''s)', 'PAUS diesel driven LHDs are designed for high productivity, reliability and easy maintenance in tough under-\r\nground mining applications. The Paus PFL 18 is a very compact 1.8 m3 loader and due to its dimensions suitable\r\nfor narrow vine operations.\r\nThe PFL 18 is powered by a 84 kW Deutz F6L914 air-cooled engine. The diesel engine combined with a hydro-\r\ndynamic drive convinces with very low operation costs, high breakout forces, extraordinary productivity and ex-\r\ntremely long lifetime.\r\nExtreme maneuverability is achieved by articulated steering (±40°) and compact dimensions. The oscillating rear\r\naxle (±8°) guarantees always an excellent ground contact even under rough road conditions. The ROPS/FOPS\r\napproved drive compartment is designed after the latest ergonomic standards and grants excellent operating\r\ncomfort and extremely good view. Clearly arranged operating elements allow the operator to be focused on pro-\r\nduction.\r\nThe PFL 18 is designed for easy maintenance and all daily maintenance checks could be done from one side for\r\nreducing down time of the machine. Central lubrication bars facilitate greasing.', 'uploads/Load Haul Dump (LHD''s).jpg', 'true'),
(14, 'Battery Locomotives', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Battery Locomotives.jpg', 'true'),
(15, 'Transverse Cutting Units', 'The transverse drum cutter is ideally suited for tren-\r\nching, tunnelling, special foundation work, demolition\r\nand for soil mixing. The operating characteristics of erkat\r\nspecial drum cutters allow them to be used in noise and\r\nvibration sensitive areas.\r\nThe ER range of transverse drum cutters consists of\r\n15 different models.\r\nBy changing the cutter drums, erkat transverse drum\r\ncutters can be easily converted to suit several special\r\napplications such as tunnelling, profiling or cutting wood\r\n(non-standard models).', 'uploads/Transverse Cutting Units.jpg', 'true'),
(17, 'Drilling Jumbos', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Drilling Jumbos.jpg', 'true'),
(19, 'Trolley Locomotives', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/Trolley Locomotives.jpg', 'true'),
(20, 'Underground Trucks ', 'This mine transporter articulated dump truck can be applied to the underground work, such as mine roadway. This tipper truck underground mining is suitable for transporting the ore, rock and other various objects. So this Underground Truck without track can be used as transportation equipment.\r\n\r\n\r\n1. All diesel engines with low pollution are from DEUTZ.\r\n\r\n2. And the hydraulic torque converter, speed changing box and the driven axle equipped on this mine transporter articulated dump truck are all from DANA.\r\n\r\n3. Hydraulic braking system from Mico also is installed on this Underground Truck.\r\n\r\n4. The off-gas discharged from such articulated dump truck is processed though oxidation, catalysis and anechoic treatment, etc. This processing unit and other advanced complement parts are all imported from Italia.\r\n\r\n5. The driving brake is wet type and multi-discs, which has stable performance and maintains avoidance.\r\n\r\n6. The carriage of this vehicle is made of steel plate with well anti-friction. It ensures the duality of the coach. This Underground Truck can dump the cargo automatically. So this mine transporter articulated dump trucks can be used to load and transport various ores and materials.\r\n', 'uploads/Underground Trucks .jpg', 'true'),
(21, 'Bitumen & Emulsion', 'The MELTING DRUM unit is used all the time that bitumen is\r\nsupplied to customer inside drums and he needs to liquefy it prior\r\nutilisation.\r\nWe have available two models: “MD 3x8” and “MD 3x10”. The\r\nmodel name indicates the number of lines (3) and the quantity of\r\ndrums for each line (8 or 10) inside the drum melting unit. This\r\nequipment is designed to continuously melt bitumen contained in\r\nstandard drums of 200 kg/each, so to enable constant supply of\r\nbitumen.', 'uploads/Bitumen & Emulsion.jpg', 'true'),
(23, 'Pipe Layers', 'Taishan Construction Machinery Group Co., Ltd. is a professional manufacturer of a comprehensive range of Pipelayer and Special construction machinery. The main series of their Products are Daifeng brand Hydraulic Pipelayers having lifting capacity from 25 Ton to 100 Ton, Marsh Pipelayers, Multifunction Pipelayers, Tracked Crane, Hydraulic Backfiller, Colligated welding vehicle, Pipeline Mobile Power station and Hydraulic wheeled Excavator.', 'uploads/Pipe Layers.jpg', 'true'),
(24, 'Micro Surface Pavers', 'As a professional micro-surfacing manufacture and supplier in China(Zhejiang Metong Road Machinery), we have received ISO9001 certification of quality regulatory system. We provide our customers with road equipment, such as micro-surfacing, chip sealer, asphalt distributor and rubber asphalt plant. They are exported to more than forty countries and regions, including Russia, Indonesia, Chile and Kenya. We are in a position to produce high-quality pavement machinery according to customers'' various demands. Thank you for visiting our website. If you have any question, please feel free to contact us.', 'uploads/Micro Surface Pavers.jpg', 'true'),
(25, 'Raise Climbers', 'Arkbro designs, manufactures and sells or leases Raise Climbers and related equipment to be used for horizontal drilling to enlarge pilot raises for ventilation shafts, transport shafts etc. as well as for production mining (Long Hole Drilling), of Narrow ore veins or wide ore bodies.\r\nArkbro also designs, manufactures and sells or leases Universal Rack and Pinion Hoists. They are ideal for use in various applications, especially in mines and Underground shafts for inspection, servicing and repairing of cables , emergency egress, and interval hoisting. The quick installation due to the rack and pinion system and the limited space requirements, (no machine room is needed) makes the ABU-600 Hoist the most economical and practical solution for your specific project.\r\n', 'uploads/Raise Climbers.jpg', 'true'),
(26, 'Pinion Hoist', 'Arkbro also designs, manufactures and sells or leases Universal Rack and Pinion Hoists. They are ideal for use in various applications, especially in mines and Underground shafts for inspection, servicing and repairing of cables , emergency egress, and interval hoisting. The quick installation due to the rack and pinion system and the limited space requirements, (no machine room is needed) makes the ABU-600 Hoist the most economical and practical solution for your specific project.\r\n', 'uploads/Pinion Hoist.jpg', 'true'),
(27, 'Crawler Cranes', 'XCMG Group is the largest enterprise in developing, manufacturing and exporting comprehensive range of construction machinery in China with their equipments working in more than 120 countries.\r\nXCMG''s fully hydraulic Cranes are developed independently in absorption of foreign advanced technology and combined with China domestic work conditions. Power, Drive and Hydraulic components, Steel cables and Wire Ropes are selected from Domestic and internationally famous enterprises.', 'uploads/Crawler Cranes.png', 'true'),
(28, 'All Terrain Cranes', 'XCMG Group is the largest enterprise in developing, manufacturing and exporting comprehensive range of construction machinery in China with their equipments working in more than 120 countries.\r\nXCMG''s fully hydraulic Cranes are developed independently in absorption of foreign advanced technology and combined with China domestic work conditions. Power, Drive and Hydraulic components, Steel cables and Wire Ropes are selected from Domestic and internationally famous enterprises.', 'uploads/All Terrain Cranes.jpg', 'true'),
(29, 'Mobile Cranes', 'XCMG Group is the largest enterprise in developing, manufacturing and exporting comprehensive range of construction machinery in China with their equipments working in more than 120 countries.\r\nXCMG''s fully hydraulic Cranes are developed independently in absorption of foreign advanced technology and combined with China domestic work conditions. Power, Drive and Hydraulic components, Steel cables and Wire Ropes are selected from Domestic and internationally famous enterprises..', 'uploads/Mobile Cranes.jpg', 'true'),
(30, 'Concrete Sprayer', 'Solves problem of deficiency spraying of small sprayer in big and long tunnels, greatly improves the working conditions for tunnel workers,raises work efficiency, reduce concrete consumption,guarantee the construction quality. with dual power system, it greatly reduces exhaust emissions. It is the best choice for hydro-power, railway and roadway tunnels.', 'uploads/Concrete Sprayer.jpg', 'true'),
(31, 'Tunnel Loading  Machines', 'For heading in soft ground and high speed\r\nmucking of blasted rock\r\nMinimal cross section  15 m2,\r\nDiesel drive 140 kW.\r\nElectric drive 90 kW\r\nOperating weight approx. 31 t\r\n', 'uploads/Tunnel Loading  Machines.jpg', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_question`
--

CREATE TABLE IF NOT EXISTS `product_question` (
  `pid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `status` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_question`
--

INSERT INTO `product_question` (`pid`, `qid`, `status`) VALUES
(11, 6, 'true'),
(14, 6, 'true'),
(15, 6, 'true'),
(17, 6, 'true'),
(19, 6, 'true'),
(20, 6, 'true'),
(21, 6, 'true'),
(23, 6, 'true'),
(24, 6, 'true'),
(25, 6, 'true'),
(26, 6, 'true'),
(27, 6, 'true'),
(28, 6, 'true'),
(30, 6, 'true'),
(31, 6, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_specs`
--

CREATE TABLE IF NOT EXISTS `product_specs` (
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `value` varchar(500) NOT NULL,
  `status` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `name`) VALUES
(6, 'Message');

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE IF NOT EXISTS `specification` (
  `sid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`sid`, `name`) VALUES
(6, '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `user_admin` (
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_ans_questions`
--

CREATE TABLE IF NOT EXISTS `user_ans_questions` (
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

CREATE TABLE IF NOT EXISTS `user_customer` (
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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
