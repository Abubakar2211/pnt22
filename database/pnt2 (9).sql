-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 10:28 PM
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
-- Database: `pnt2`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_contacts`
--

CREATE TABLE `add_contacts` (
  `id` int(11) NOT NULL,
  `firstName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lastName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cell` int(110) NOT NULL,
  `landline` int(110) NOT NULL,
  `category` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sub-category` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `country` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `religion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `website` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `designation` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `companyName` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_contacts`
--

INSERT INTO `add_contacts` (`id`, `firstName`, `lastName`, `cell`, `landline`, `category`, `sub-category`, `country`, `religion`, `Email`, `website`, `designation`, `companyName`, `status`) VALUES
(1, 'Name', '', 0, 0, 'Sell Phone', 'Client Boardcast', '', 'Joining', 'Email', NULL, 'Client Status', 'Company Name', ''),
(2, 'Cheryl Lin', '', 529, 0, '+1-485-032-6738x1196', 'Yes', '', '12/07/2021', 'johnstondouglas@gmail.com', NULL, 'Active', 'Lane, Butler and Elliott', ''),
(3, 'Rebecca Adams', '', 952, 0, '001-630-891-4387x632', 'Yes', '', '12/03/2022', 'qmartinez@sosa-lindsey.com', NULL, 'Active', 'Brooks and Sons', ''),
(4, 'James Gonzales', '', 0, 0, '728.153.1309', 'Yes', '', '24/05/2022', 'matthew49@yahoo.com', NULL, 'Active', 'Garcia, Larson and Glenn', ''),
(5, 'Brenda Reed', '', 801, 0, '024-949-1234x7749', 'Yes', '', '30/09/2021', 'amorton@henderson.biz', NULL, 'Active', 'Hanson PLC', ''),
(6, 'Darrell Valdez', '', 446, 0, '679-922-5031x29199', 'Yes', '', '16/11/2021', 'nicholasturner@gonzalez.com', NULL, 'Active', 'Scott and Sons', ''),
(7, 'Brian Smith', '', 361237, 0, '(324)975-4127', 'Yes', '', '06/10/2020', 'angelawaller@gmail.com', NULL, 'Active', 'Payne Group', ''),
(8, 'Benjamin Moore', '', 0, 0, '202.771.5315x387', 'Yes', '', '08/09/2024', 'carsondale@kidd.com', NULL, 'Active', 'Jackson, Stewart and Wright', ''),
(9, 'Christina Diaz', '', 923127, 0, '001-731-632-0188x9916', 'Yes', '', '19/03/2024', 'jamespowell@clark-gonzalez.com', NULL, 'Active', 'Burke, Singh and Conway', ''),
(10, 'Kimberly Cook', '', 0, 0, '970.701.9750x78836', 'Yes', '', '05/03/2021', 'scottgeorge@cannon-pierce.com', NULL, 'Active', 'Noble, Hall and Fuller', ''),
(11, 'James Moore', '', 128, 0, '740.730.9838x39088', 'Yes', '', '04/01/2022', 'kimberlydiaz@yahoo.com', NULL, 'Active', 'Young-Carroll', ''),
(12, 'Name', '', 0, 0, '', 'Client Status', '', 'Sell Phone', 'Company Name', 'Contact Number', 'Client Boardcast', '', ''),
(13, 'Cheryl Lin', '', 0, 0, '', 'Active', '', '+1-485-032-6738x1196', 'Lane, Butler and Elliott', '529-907-6129x70422', 'Yes', '', ''),
(14, 'Rebecca Adams', '', 429, 0, '', 'Active', '', '001-630-891-4387x632', 'Brooks and Sons', '952-821-6018x068', 'Yes', '', ''),
(15, 'James Gonzales', '', 688337, 0, '', 'Active', '', '728.153.1309', 'Garcia, Larson and Glenn', '(486)810-7648x7329', 'Yes', '', ''),
(16, 'Brenda Reed', '', 0, 0, '', 'Active', '', '024-949-1234x7749', 'Hanson PLC', '801-871-5825x70929', 'Yes', '', ''),
(17, 'Darrell Valdez', '', 0, 0, '', 'Active', '', '679-922-5031x29199', 'Scott and Sons', '446-912-9956x05635', 'Yes', '', ''),
(18, 'Brian Smith', '', 1, 0, '', 'Active', '', '(324)975-4127', 'Payne Group', '361.237.5515', 'Yes', '', ''),
(19, 'Benjamin Moore', '', 0, 0, '', 'Active', '', '202.771.5315x387', 'Jackson, Stewart and Wright', '(587)717-7568x32944', 'Yes', '', ''),
(20, 'Christina Diaz', '', 0, 0, '', 'Active', '', '001-731-632-0188x9916', 'Burke, Singh and Conway', '923.127.3164x94848', 'Yes', '', ''),
(21, 'Kimberly Cook', '', 0, 0, '', 'Active', '', '970.701.9750x78836', 'Noble, Hall and Fuller', '(382)115-4406', 'Yes', '', ''),
(22, 'James Moore', '', 1, 0, '', 'Active', '', '740.730.9838x39088', 'Young-Carroll', '128-168-5940x419', 'Yes', '', ''),
(23, 'Name', 'Email', 0, 0, '', 'Sell Phone', 'Client Status', '', 'Client Boardcast', NULL, 'Joining', 'Company Name', ''),
(24, 'Cheryl Lin', 'johnstondouglas@gmail.com', 0, 0, '', '+1-485-032-6738x1196', 'Active', '', 'Yes', NULL, '12/07/2021', 'Lane, Butler and Elliott', ''),
(25, 'Rebecca Adams', 'qmartinez@sosa-lindsey.com', 0, 0, '', '001-630-891-4387x632', 'Active', '', 'Yes', NULL, '12/03/2022', 'Brooks and Sons', ''),
(26, 'James Gonzales', 'matthew49@yahoo.com', 0, 0, '', '728.153.1309', 'Active', '', 'Yes', NULL, '24/05/2022', 'Garcia, Larson and Glenn', ''),
(27, 'Brenda Reed', 'amorton@henderson.biz', 0, 0, '', '024-949-1234x7749', 'Active', '', 'Yes', NULL, '30/09/2021', 'Hanson PLC', ''),
(28, 'Darrell Valdez', 'nicholasturner@gonzalez.com', 0, 0, '', '679-922-5031x29199', 'Active', '', 'Yes', NULL, '16/11/2021', 'Scott and Sons', ''),
(29, 'Brian Smith', 'angelawaller@gmail.com', 0, 0, '', '(324)975-4127', 'Active', '', 'Yes', NULL, '06/10/2020', 'Payne Group', ''),
(30, 'Benjamin Moore', 'carsondale@kidd.com', 0, 0, '', '202.771.5315x387', 'Active', '', 'Yes', NULL, '08/09/2024', 'Jackson, Stewart and Wright', ''),
(31, 'Christina Diaz', 'jamespowell@clark-gonzalez.com', 0, 0, '', '001-731-632-0188x9916', 'Active', '', 'Yes', NULL, '19/03/2024', 'Burke, Singh and Conway', ''),
(32, 'Kimberly Cook', 'scottgeorge@cannon-pierce.com', 0, 0, '', '970.701.9750x78836', 'Active', '', 'Yes', NULL, '05/03/2021', 'Noble, Hall and Fuller', ''),
(33, 'James Moore', 'kimberlydiaz@yahoo.com', 0, 0, '', '740.730.9838x39088', 'Active', '', 'Yes', NULL, '04/01/2022', 'Young-Carroll', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(2, 'Abubakar');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `country_id`) VALUES
(3, 'Karachissss', 2),
(5, 'Karachi', 8),
(6, 'mumbai', 7);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `cellPhone` varchar(255) NOT NULL,
  `cellNumber` varchar(255) NOT NULL,
  `joining` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `clientStatus` varchar(255) NOT NULL,
  `clientBoardcast` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `contact`, `cellPhone`, `cellNumber`, `joining`, `companyName`, `clientStatus`, `clientBoardcast`, `date_time`) VALUES
(1, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '000', '000', '2005-12-01', 'OG Technologies', 'active', 'active', '0000-00-00 00:00:00'),
(2, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '03122082355', 'aa', '2024-11-26', 'OG Technologies', 'active', 'active', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `cell_number` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `D_O_B` date DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `type`, `sub_type`, `first_name`, `last_name`, `designation`, `email_id`, `cell_number`, `phone_number`, `company_name`, `category`, `sub_category`, `website`, `country`, `city`, `D_O_B`, `religion`, `facebook`, `status`) VALUES
(1, '3', '6', 'Abubakar', 'Baig', '', 'abubakar192005@gmail.com', '', '03122082355', '', '', '', '', '', '', '0000-00-00', '', '', 'Active'),
(2, '3', '6', 'hammad', '', '', 'hammad@gmail.com', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_status`
--

CREATE TABLE `contacts_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `applied` enum('Applied','Unapplied') DEFAULT 'Unapplied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts_status`
--

INSERT INTO `contacts_status` (`id`, `status`, `applied`) VALUES
(3, 'Active', 'Applied'),
(5, 'Pending', 'Unapplied'),
(6, 'Deliver', 'Unapplied');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(7, 'india'),
(8, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `list-name` varchar(110) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `list-emails` text NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `list-name`, `quantity`, `country`, `category`, `list-emails`, `status`) VALUES
(29, 'Team-PNT', '5', '', 'Team', '[\"shahid@pntglobal.com\",\"syedasehar567@gmail.com\",\"sanapretyintezar@gmail.com\",\"afiahsan23@gmail.com\",\"ayesha25arif@gmail.com\"]', 'no-record'),
(30, 'hhh', '3', 'South Georgia', 'Team', '[\"shahid@pntglobal.com\",\"syedasehar567@gmail.com\",\"sanapretyintezar@gmail.com\"]', 'no-record'),
(31, 'kjlkjkj', '3', 'South Georgia', '', '', 'no-record'),
(32, 'php dev', '7', 'Palestine', 'Team', '', 'no-record');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `religion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `religion`) VALUES
(6, 'Islam'),
(7, 'Sikhism'),
(8, 'Confucianism'),
(9, 'Hinduism');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `sub_category`, `category_id`) VALUES
(2, 'Software engineer', 2),
(3, 'aa', 2),
(4, 'aa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_types`
--

CREATE TABLE `sub_types` (
  `id` int(11) NOT NULL,
  `sub_type` varchar(255) NOT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_types`
--

INSERT INTO `sub_types` (`id`, `sub_type`, `type_id`) VALUES
(6, 'imran', 3),
(10, 'Mobile Supplier', 27),
(11, 'IT Supplier', 27),
(12, 'Dream Team 5', 3),
(13, 'Five for Fun', 3);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `contact`, `category`, `password`, `date_time`) VALUES
(1, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', '1', '3691308f2a4c2f6983f2880d32e29c84', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `email`, `contact`, `designation`, `category`, `password`, `date_time`) VALUES
(1, 'Abubakar Baig', 'abubakar192005@gmail.com', '03122082355', 'aa', '1', '4124bc0a9335c27f086f24ba207a4912', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(3, 'Team'),
(27, 'Supplier'),
(28, 'Contact');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_contacts`
--
ALTER TABLE `add_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_status`
--
ALTER TABLE `contacts_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sub_types`
--
ALTER TABLE `sub_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_contacts`
--
ALTER TABLE `add_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts_status`
--
ALTER TABLE `contacts_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_types`
--
ALTER TABLE `sub_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_types`
--
ALTER TABLE `sub_types`
  ADD CONSTRAINT `sub_types_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
