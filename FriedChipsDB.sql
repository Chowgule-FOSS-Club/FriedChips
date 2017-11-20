-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2017 at 10:43 PM
-- Server version: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
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
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
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
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
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
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
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
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userid`,`qid`),
  KEY `customer_question_qid` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` enum('true','false') NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `description`, `image`, `status`) VALUES
(11, 'Hermann Paus Maschinenfabrik Gmbh. LHD''S', 'Manufactured by <strong>''Hermann Paus Maschinenfabrik Gmbh</strong>, Germany.  Their products include:<br><br>\r\n     \r\n    • Load Haul Dump (Scooptrams) – 2 to 5.5 tonnes payload.<br>\r\n    • Low Profile Dump Trucks - 8 to 35 tonnes payload.<br>\r\n    • Multi-Purpose Vehicles for Underground including Transport Vehicles for personals.<br>', 'uploads/Hermann Paus Maschinenfabrik Gmbh. LHD''S.jpg', 'true'),
(14, 'Xiangtan Electric Locomotive ( XELFCL) Battery Locomotive', '<strong>Xiangtan Electric Locomotive Factory Co., Ltd. </strong>(China)<br><br>\r\n    Manufacturers :-<br>\r\n    • Battery Power Locomotive<br>\r\n    • Stepless Speed Regulating Electric Locomotive<br>\r\n    • Mining Trolley Locomotive<br>\r\n    • Tunneling/Narrow gauge battery locomotive<br>\r\n    • Overhead Mining Locomotive<br>\r\n    • Hydraulic Trolley Locomotive<br>\r\n    • AC Frequency Variable Electric Locomotive<br>\r\n    • Larger toner locomotive and matched rolling stocks for TBM<br><br>\r\n', 'uploads/Xiangtan Electric Locomotive ( XELFCL) Battery Locomotive.jpg', 'true'),
(15, 'Erkat. Transverse Cutting', '<strong>Erkat</strong> manufacture Transverse Drum Cutters for mounting on excavators.  Erkat has 15 years experience in development, manufacturers and application of Rock Cutting excavator attachments.  Erkat manufacturers Transverse Cutter suitable for Excavator having weight from 7 to 70 Tons.<br><br>\r\n\r\nThe Transverse Cutter is ideally suited for <br><br>\r\n\r\n-  Tunneling <br>\r\n-  Trenching <br>\r\n-  Special Foundation work <br>\r\n-  Demolation <br>\r\n-  Soil Mixing <br>', 'uploads/Erkat. Transverse Cutting.jpeg', 'true'),
(17, 'Jiangxi Siton Machinery. Drilling Jumbos', '<strong>Ziangxi Siton Machinery Manufacturing Company Limited </strong>manufacturers Single & Double Boom Drilling Jumbos, underground Low Profile Dump Truck, LHD with bucket & capacity ranging from .75 to 3 cubic meter both in Diesel and Electric version, shuttle mines car and side Dumping wagons.', 'uploads/Jiangxi Siton Machinery. Drilling Jumbos.jpg', 'true'),
(19, 'Xiangtan Electric Locomotive ( XELFCL). Trolley Locomotive', '<strong>Xiangtan Electric Locomotive Factory Co., Ltd. </strong>(China)<br><br>\r\nManufacturers :-<br>\r\n• Battery Power Locomotive<br>\r\n• Stepless Speed Regulating Electric Locomotive<br>\r\n• Mining Trolley Locomotive<br>\r\n• Tunneling/Narrow gauge battery locomotive<br>\r\n• Overhead Mining Locomotive<br>\r\n• Hydraulic Trolley Locomotive<br>\r\n• AC Frequency Variable Electric Locomotive<br>\r\n• Larger toner locomotive and matched rolling stocks for TBM<br><br>\r\n', 'uploads/Xiangtan Electric Locomotive ( XELFCL). Trolley Locomotive.jpg', 'true'),
(20, 'Jiangxi Siton Machinery. Underground Trucks ', '<strong>Ziangxi Siton Machinery Manufacturing Company Limited </strong>manufacturers Single & Double Boom Drilling Jumbos, underground Low Profile Dump Truck, LHD with bucket & capacity ranging from .75 to 3 cubic meter both in Diesel and Electric version, shuttle mines car and side Dumping wagons.', 'uploads/Jiangxi Siton Machinery. Underground Trucks .jpg', 'true'),
(21, 'Massenza Srl. Bitumen Emulsion', '<strong>Massenza S.r.L. </strong>(Italy) has been manufacturing and exporting their specilized range of construction equipment to World Wide market for over 50 years.<br><br>\r\n\r\nMassenza Product line includes <br><br>\r\n\r\n-  Skid Mounted and Stationery Plants having Production Capacity of 6 Ton to 30 Tons per hour. <br>\r\n-  Modified Bitumen Plant <br>\r\n-  Drum Melting Units<br>\r\n-  Thermal Oil Heater and Tanks<br>\r\n-  Polymer Modified Bitumen Plant <br>\r\n-  Cut-Back Plant<br>\r\n-  Storage Tanks<br>\r\n-  Intelligent Bitumen Sprayers<br>\r\n-  Gritz Spreader<br>\r\n-  Sealing Machine" Seal-Mass M5"<br>', 'uploads/Massenza Srl. Bitumen Emulsion.jpg', 'true'),
(23, 'Taishan Construction Machinery ( TCMCL ). Pipe Layers', '<strong>Taishan Construction Machinery Company Limited </strong> is a professional manufacturer of comprehensive range of Pipelayer having lifting capacity from 25 Ton to 100 Ton Track Pipelayers, multi function Pipelayers, marsh Pipelayers.  They also manufacture Crawler Cranes, Pipeline Mobile Power Station and Hydraulic wheel excavator. <br><br>\r\n\r\nDaiFeng Brand Hydraulic Pipelayer is a well known brand in China and their products have been exported to many countries including India.', 'uploads/Taishan Construction Machinery ( TCMCL ). Pipe Layers.jpg', 'true'),
(24, 'Zhejiang Metong Road Machinery. Micro Surface Paver', '<strong>Zhejiang Metong </strong> Road Construction Machinery Company is a China-based Company having specialization in the manufacture of Road Construction, Road Maintenance, and other related Road Equipment.  They manufacture following equipment: <br><br>\r\n\r\n-  Micro Surface Paver<br>\r\n-  Chip Sealers<br>\r\n-  Asphalt Distributors<br>\r\n-  Bitumen Sprayer<br>\r\n-  Chips Spreader<br>\r\n-  Road Maintenance Truck<br>\r\n-  Hot Recycling Asphalt Road Maintenance Truck<br>\r\n-  Cold in-plant recycling Equipment<br>\r\n-  Cold Milling Machines<br>\r\n-  Soil Stablizer<br>\r\n-  Road Roller/compactors<br>', 'uploads/Zhejiang Metong Road Machinery. Micro Surface Paver.jpg', 'true'),
(25, 'Akbro. Raise Climbers', '<strong>Arkbro</strong> is the only North American Company manufacturing complete range of Raise Climbers.  Arkbro Design and manufactures Mining Construction Equipment and provides Raise Mining consulting services to the Mining Industry for applications in Raise Mining, Hydro Electric Projects, Horizontal Drilling, Long-hole Drilling and Production Mining.<br><br>\r\n\r\nThey also manufacture other allied Mining Equipment and have been manufacturing these products since 1967 their products include:<br><br>\r\n\r\nSingle & Double Drive Pneumatic Raise Climbers<br>\r\nSingle & Double  Drive Diesel Raise Climbers<br>\r\nSingle & Double  Drive Electric Raise Climbers.\r\n', 'uploads/Akbro. Raise Climbers.png', 'true'),
(27, 'Xuzhou Construction Machinery Group (XCMG) Crawler Cranes', '<strong>Xuzhou Construction Machinery Co. Ltd. (XCMG)</strong>, is the largest enterprise in developing, manufacturing and exporting a comprehensive range of construction machinery in China with their equipments working in more than 120 countries.<br><br>\r\n\r\nThey manufactured wide range of Hydraulic Crawler Cranes, Truck Cranes and all-terrain Cranes.  XCMG''s fully Hydraulic Crane are developed independently and in collaboration with renowned Foreign Manufacturers using advanced Technology.  Power Drive and Hydraulic Components, Steel Cables and Wire Ropes are selected from domestic and reputed International Manufacturers.', 'uploads/Xuzhou Construction Machinery Group (XCMG) Crawler Cranes.jpg', 'true'),
(28, 'Xuzhou Construction Machinery Group (XCMG) All Terrain Cranes', '<strong>Xuzhou Construction Machinery Co. Ltd. (XCMG)</strong>, is the largest enterprise in developing, manufacturing and exporting a comprehensive range of construction machinery in China with their equipments working in more than 120 countries.<br><br>\r\n\r\nThey manufactured wide range of Hydraulic Crawler Cranes, Truck Cranes and all-terrain Cranes. XCMG''s fully Hydraulic Crane are developed independently and in collaboration with renowned Foreign Manufacturers using advanced Technology. Power Drive and Hydraulic Components, Steel Cables and Wire Ropes are selected from domestic and reputed International Manufacturers.', 'uploads/Xuzhou Construction Machinery Group (XCMG) All Terrain Cranes.jpg', 'true'),
(29, 'Xuzhou Construction Machinery Group (XCMG) Mobile Cranes', '<strong>Xuzhou Construction Machinery Co. Ltd. (XCMG)</strong>, is the largest enterprise in developing, manufacturing and exporting a comprehensive range of construction machinery in China with their equipments working in more than 120 countries.<br><br>\r\n\r\nThey manufactured wide range of Hydraulic Crawler Cranes, Truck Cranes and all-terrain Cranes. XCMG''s fully Hydraulic Crane are developed independently and in collaboration with renowned Foreign Manufacturers using advanced Technology. Power Drive and Hydraulic Components, Steel Cables and Wire Ropes are selected from domestic and reputed International Manufacturers.', 'uploads/Xuzhou Construction Machinery Group (XCMG) Mobile Cranes.jpg', 'true'),
(30, 'Jiangxi Siton Machinery. Concrete Sprayer', '<strong>Ziangxi Siton Machinery Manufacturing Company Limited </strong>manufacturers Single & Double Boom Drilling Jumbos, underground Low Profile Dump Truck, LHD with bucket & capacity ranging from .75 to 3 cubic meter both in Diesel and Electric version, shuttle mines car and side Dumping wagons.', 'uploads/Jiangxi Siton Machinery. Concrete Sprayer.jpg', 'true'),
(31, 'ITC-SA. Tunnel Loading', 'Manufactured by <strong>''ITC- SCHAEFF''</strong>, Germany  <br><br>  \r\n Custom Engineered mucking units on crawler specially designed to work in under ground tunnels. These tunnelling loader reduce the mucking time by almost 60% as compared to conventional mucking.<br><br>\r\n     To facilitate tramming in a rail bound mucking system a pony truck can be used. This hydraulic device allows quick hauling on rails. When working at the face, it runs on crawlers to ensure an optimum stability.<br><br>\r\n     These units can be fitted with hydraulic hammers for excavation in soft and medium ground conditions. \r\n    These units are powered by diesel engine to drive to work site and electric drive to work at face. The use of electric power at face results in better ventilation.<br><br>\r\n     Two basic model; i.e.; ITC 120 & ITC 312 are powered by electric motor ranging from 42 kW to 110 kW. These units can be fitted with various options; i.e.; different size and capacity of boom, bucket, conveyor and hammer.', 'uploads/ITC-SA. Tunnel Loading.jpg', 'true'),
(32, 'Zhejiang Metong Road Machinery. Road Maintenance', '	<strong>Zhejiang Metong </strong> Road Construction Machinery Company is a China-based Company having specialization in the manufacture of Road Construction, Road Maintenance, and other related Road Equipment. They manufacture following equipment: <br><br>\r\n\r\n- Micro Surface Paver<br>\r\n- Chip Sealers<br>\r\n- Asphalt Distributors<br>\r\n- Bitumen Sprayer<br>\r\n- Chips Spreader<br>\r\n- Road Maintenance Truck<br>\r\n- Hot Recycling Asphalt Road Maintenance Truck<br>\r\n- Cold in-plant recycling Equipment<br>\r\n- Cold Milling Machines<br>\r\n- Soil Stablizer<br>\r\n- Road Roller/compactors<br>', 'uploads/Zhejiang Metong Road Machinery. Road Maintenance.jpg', 'true'),
(33, 'Massenza Srl. Grit Spreader', '<strong>Massenza S.r.L. </strong>(Italy) has been manufacturing and exporting their specilized range of construction equipment to World Wide market for over 50 years.<br><br>\r\n\r\nMassenza Product Line includes Emulsion Production Plants, Modified Bitumen Plants, Thermal Oil Heaters & Tanks and Drum Melting Units, which are manufactured by using innovative Technology and the Advanced Production concepts.', 'uploads/Massenza Srl. Grit Spreader.jpg', 'true'),
(34, 'Other Equipments', 'In addition to above mentioned equipments, we can also supply Tower cranes, Pipe blending machines, Mobile power stations (Pay Welder), Internal Pneumatic Line-up Clamps, Concrete pumps, Wheel loaders, Motor Graders, Crawler dozers, Special heavy duty vehicles for transportation of heavy equipments including SPV, Crushing equipments, Stone crushing plants, Grinding mills, Vibratory feeders, Forklift (Electric as well as diesel), Concrete placing booms, Self loading concrete mixing trucks and transit mixture for underground, Bulldozers, Drill bits & DTH, Hammer bits, Surface drills for open cast mines, Snow blowers from our Chinese Principals.', 'uploads/Other Equipments.png', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`pid`,`cid`),
  KEY `product_category_cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_question`
--

CREATE TABLE IF NOT EXISTS `product_question` (
  `pid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `status` enum('true','false') NOT NULL,
  PRIMARY KEY (`pid`,`qid`),
  KEY `product_question_qid` (`qid`)
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
(27, 6, 'true'),
(28, 6, 'true'),
(30, 6, 'true'),
(31, 6, 'true'),
(32, 6, 'true'),
(33, 6, 'true'),
(34, 6, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `product_specs`
--

CREATE TABLE IF NOT EXISTS `product_specs` (
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `value` varchar(500) NOT NULL,
  `status` enum('true','false') NOT NULL DEFAULT 'true',
  PRIMARY KEY (`sid`,`pid`),
  KEY `product_specs_pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `password`, `email`, `authKey`, `image`) VALUES
(5, 'Cas', 'Gas', '$2y$13$OIgCheJl8vwYTIpC0CdiSeCByyD4yCS/SS5KC1BsI/hUSkoK4phii', 'castorgodinho@yahoo.in', '', 'uploads/Jon-Snow-4.jpg'),
(6, 'Micheal', 'Jackson', '$2y$13$ZijOESonrGEsxDis2w.qROOQuBfVDenjmHR.O9AwJ.AYdzqqQ/QAO', 'micheal@gmail.com', '', 'uploads/photo.png'),
(7, 'Jane', 'Doe', '$2y$13$q4abQM1T09gAEM6MhRVOdewMi7U3uJNeeYeQkZlzEl0EDFUINKM0C', 'jane@doe.com', NULL, 'uploads/default.png'),
(8, 'Kane', 'Top', '$2y$13$F/.FqwH1gFq6NMzkXRmDoOqAs/vLUMb2PUXFyrpltGvbDWPT/qVkK', 'kane@top.com', NULL, 'uploads/default.png'),
(9, 'Karen', 'Lobo', '$2y$13$judq.QLksaOqSUY3plT1/eM1tszFYXjhry/e0ZNQVLtRGkemK6uYW', 'karen@lobo.com', NULL, 'uploads/default.png'),
(10, 'Deepak', 'Takur', '$2y$13$bbB41lmM5dIo7XOjmZxQ4e.Rg7WHJQ90tnnF8eK4sNP4PWjVH8Tf2', 'deepak@takur.com', NULL, 'uploads/default.png'),
(11, 'Gaurav', 'Dessai', '$2y$13$EWhvH3vKNRkQBjc7/7Sh1.tjA3RdZVmcv/oOKmxCOt4pCuOkZ9UdK', 'gaurav@dessai.com', NULL, 'uploads/default.png'),
(12, 'wendham', 'Gray', '$2y$13$dV/oa5UQfahOJS.8WS8UHuC1Mn0rtjmDbM4FB0mYs348h5uzJ.3na', 'wendhamgray@gmail.com', NULL, 'uploads/default.png'),
(13, 'Sumit', 'jain', '$2y$13$b6E6u1gxv7UNfLSjWwjegOUqAJ5XCUaHT8zuwaLqFbhDre7f99kTC', 'sumitkj7@gmail.com', NULL, 'uploads/default.png'),
(14, 'John', 'tor', '$2y$13$gl4WLVs2DPvK4Q6z8Y9hzeqyjZm89U1q3r08onZ9VWUDSmmO01bYi', 'jonww@snow.com', NULL, 'uploads/default.png'),
(15, 'Wendhamw', 'Gray', '$2y$13$jozYWU9ujD8VPLnxYGj/AONen3SpgT1Oi2JFyXU7VsBeowvYnb7Mm', 'wendhamgray2@gmail.com', NULL, 'uploads/default.png'),
(16, 'wendhem', 'grey', '$2y$13$Xr.xvOW.ZLToYcasnE.QKe3dq/ZxfN7fTxEK9dsV7QDWflvz2E1kW', 'wendhamgrey@gmail.com', NULL, 'uploads/default.png'),
(17, 'wendhem', 'grey', '$2y$13$v4CMABGzoWL9OU40zWltMeD3/6DC6LNFZBHsdQW0vVm4QMhiR4ekS', 'wendhamgry@gmail.com', NULL, 'uploads/default.png'),
(18, 'wendham', 'Gray', '$2y$13$4xrihfWAQLdgUpaJwAWQjOl7L0jyJn6kNXyLywLLZYs7VA9ln0ZGq', 'wesndhamgray@gmail.com', NULL, 'uploads/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE IF NOT EXISTS `user_admin` (
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
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
  `isRead` enum('true','false') DEFAULT 'false',
  PRIMARY KEY (`created_time`,`pid`,`qid`,`uid`),
  KEY `user_ans_questions_pid` (`pid`),
  KEY `user_ans_questions_qid` (`qid`),
  KEY `user_ans_questions_uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ans_questions`
--

INSERT INTO `user_ans_questions` (`created_time`, `pid`, `qid`, `uid`, `answer`, `isRead`) VALUES
('2017-09-21 05:51:50', 14, 6, 12, 'test ', 'true'),
('2017-09-21 05:56:16', 14, 6, 13, 'Give details about 10ton ', 'true'),
('2017-09-21 06:44:35', 14, 6, 5, 'This is a msg', 'true'),
('2017-09-21 06:53:09', 15, 6, 5, 'this is a mug', 'true'),
('2017-09-21 06:54:50', 15, 6, 5, '', 'true'),
('2017-09-21 11:59:24', 14, 6, 12, 'this is a test by our web developer', 'true'),
('2017-09-28 05:28:28', 14, 6, 14, 'sdfsdfsdf', 'true'),
('2017-09-29 07:18:10', 25, 6, 15, '', 'true'),
('2017-09-29 09:48:40', 11, 6, 16, 'check', 'true'),
('2017-09-29 09:49:26', 11, 6, 17, 'check2', 'true'),
('2017-09-29 09:50:14', 11, 6, 12, 'check3', 'true'),
('2017-09-29 09:51:07', 11, 6, 12, '', 'true'),
('2017-09-29 09:52:26', 11, 6, 12, '', 'true'),
('2017-09-29 09:52:46', 14, 6, 12, '', 'true'),
('2017-09-29 09:53:03', 11, 6, 12, '', 'true'),
('2017-09-29 09:53:12', 15, 6, 12, '', 'true'),
('2017-09-29 09:54:38', 14, 6, 12, '', 'true'),
('2017-09-29 09:54:43', 14, 6, 12, '', 'true'),
('2017-09-29 09:55:36', 11, 6, 12, '', 'true'),
('2017-09-29 09:56:13', 11, 6, 12, '', 'true'),
('2017-09-29 09:57:12', 11, 6, 18, '', 'true'),
('2017-09-29 09:57:48', 11, 6, 12, '', 'true'),
('2017-09-29 09:58:27', 11, 6, 12, '', 'true'),
('2017-09-29 10:51:15', 11, 6, 5, '1000', 'true'),
('2017-09-29 10:51:27', 11, 6, 5, '', 'true'),
('2017-10-05 12:21:49', 27, 6, 5, '', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE IF NOT EXISTS `user_customer` (
  `userid` int(11) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_customer`
--

INSERT INTO `user_customer` (`userid`, `company`, `phone`) VALUES
(5, 'Chowgule FOSS Club', '6969696969'),
(7, NULL, '9658745213'),
(8, NULL, '9565874521'),
(9, NULL, '9654785412'),
(10, NULL, '9865321456'),
(11, NULL, '9865321145'),
(12, NULL, '9823431003'),
(13, NULL, '9818050853'),
(14, NULL, '1111111111'),
(15, NULL, '9823431003'),
(16, NULL, '9823231880'),
(17, NULL, '9823231880'),
(18, NULL, '9823431003');

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
