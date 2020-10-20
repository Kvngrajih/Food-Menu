-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 02:32 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `lastname` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `middle` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT '0',
  `fullname` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL,
  `avartar` mediumtext CHARACTER SET utf8 NOT NULL,
  `authentication_key` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `firstname`, `lastname`, `middle`, `user_level`, `fullname`, `email`, `password`, `level`, `avartar`, `authentication_key`) VALUES
(1, '', 'Raji', 'Samad', '', 1, NULL, 'admin@fd.com', '79cbd8a89a0be6c0683f5effaf4ef07c4e7afebcfbae000b22c7c85e5560f89a2a0280b4', '', '', ''),
(2, '', 'Samad', 'Olawale', '', 2, NULL, 'rajiatlive@gmail.com', '79cbd8a89a0be6c0683f5effaf4ef07c4e7afebcfbae000b22c7c85e5560f89a2a0280b4', '', '', ''),
(3, '', 'Kemi', 'Olawale', '', 2, NULL, 'outhubict@gmail.com', '0c7540eb7e65b553ec1ba6b20de79608d033e22ae348aeb5660fc2140aec35850c4da99779cbd8a89a0be6c0683f5effaf4ef07c4e7afebcfbae000b22c7c85e5560f89a2a0280b4', '', '', ''),
(4, '', 'Samad', 'Ola', '', 2, NULL, 'admin@aosacademy.com', '79cbd8a89a0be6c0683f5effaf4ef07c4e7afebcfbae000b22c7c85e5560f89a2a0280b4', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `c_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `products` varchar(220) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,0) NOT NULL,
  `s_table` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `orderid` varchar(220) NOT NULL,
  `year` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`c_id`, `uid`, `products`, `qty`, `status`, `price`, `s_table`, `orderid`, `year`) VALUES
(1, 2, 'RIce||Coke', 6, 1, '15000', 'Table 8', 'ORDID.157380', '01-07-2019 03:18:57 PM'),
(2, 2, 'Semovita||Pepsi', 4, 1, '4920', 'Table 9', 'ORDID.126800', '01-07-2019 03:19:41 PM'),
(3, 2, 'Eba||Buttle Water', 1, 1, '1450', 'Table 5', 'ORDID.141130', '01-07-2019 03:22:24 PM'),
(4, 2, 'Amala||Buttle Water', 6, 1, '7500', 'Table 1', 'ORDID.172300', '01-07-2019 03:48:38 PM'),
(5, 2, 'Eba||Coke', 1, 0, '1700', 'Table 9', 'ORDID.129700', '01-07-2019 03:50:10 PM'),
(6, 1, 'RIce||Buttle Water', 2, 1, '4500', 'Table 20', 'ORDID.87600', '01-07-2019 03:51:17 PM'),
(7, 1, 'Eba||Coke', 1, 0, '1700', 'Table 5', 'ORDID.93090', '02-07-2019 12:13:07 PM'),
(8, 1, 'Eba||Sprite', 3, 1, '4800', 'Table 15', 'ORDID.203420', '02-07-2019 12:18:00 PM'),
(9, 1, 'Eba||Buttle Water', 2, 0, '2900', 'Table 5', 'ORDID.24930', '02-07-2019 12:37:47 PM'),
(10, 1, 'Amala||Pepsi', 5, 1, '6500', 'Table 78', 'ORDID.180100', '02-07-2019 12:39:02 PM'),
(11, 2, 'Amala||Coke', 5, 1, '7500', 'Table 56', 'ORDID.43500', '02-07-2019 01:24:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `city` varchar(200) COLLATE utf8_bin NOT NULL,
  `state` varchar(200) COLLATE utf8_bin NOT NULL,
  `country` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city`, `state`, `country`) VALUES
(1, 'Ilorin', 'Kwara', 'Nigeria'),
(2, 'Ibadan', 'Oyo', 'South Africa'),
(3, 'Sagamu', 'Ogun', 'India'),
(4, 'Ikeja', 'Lagos', 'United State');

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `n_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `orderid` varchar(220) COLLATE utf8_bin NOT NULL,
  `s_table` varchar(220) COLLATE utf8_bin NOT NULL,
  `food` varchar(220) COLLATE utf8_bin NOT NULL,
  `drink` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `needs`
--

INSERT INTO `needs` (`n_id`, `uid`, `orderid`, `s_table`, `food`, `drink`) VALUES
(1, 2, 'ORDID.157380', 'Table 8', 'RIce', 'Coke'),
(2, 2, 'ORDID.126800', 'Table 9', 'Semovita', 'Pepsi'),
(3, 2, 'ORDID.141130', 'Table 1', 'Eba', 'Buttle Water'),
(4, 2, 'ORDID.172300', 'Table 20', 'Amala', 'Buttle Water'),
(5, 1, 'ORDID.87600', 'Table 11', 'RIce', 'Buttle Water'),
(6, 1, 'ORDID.203420', 'Table 6', 'Eba', 'Sprite'),
(7, 1, 'ORDID.180100', '', 'Amala', 'Pepsi'),
(8, 2, 'ORDID.43500', '', 'Amala', 'Coke');

-- --------------------------------------------------------

--
-- Table structure for table `numlog`
--

CREATE TABLE `numlog` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(220) COLLATE utf8_bin NOT NULL,
  `year` varchar(220) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `numlog`
--

INSERT INTO `numlog` (`id`, `phone`, `email`, `year`) VALUES
(1, '08167735273', 'raji@gmail', '19-06-2019 06:06:22 PM'),
(2, '09067735273', 'raji3@gmail', '20-06-2019 10:35:25 AM'),
(3, '08167735273', 'raji@gmail', '21-06-2019 03:54:34 PM'),
(4, '09067735273', 'raji3@gmail', '21-06-2019 03:55:12 PM'),
(5, '07067735273', 'raji4@gmail', '23-06-2019 02:36:50 PM'),
(6, '08167755555', 'fasola@gmail.com', '26-06-2019 11:26:42 AM');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `note` varchar(500) NOT NULL,
  `orderid` varchar(220) NOT NULL,
  `year` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `uid`, `qty`, `status`, `price`, `note`, `orderid`, `year`) VALUES
(1, 2, 6, '4', '15000', '', 'ORDID.157380', '01-07-2019 03:19:08 PM'),
(2, 2, 4, '3', '4920', '', 'ORDID.126800', '01-07-2019 03:19:53 PM'),
(3, 2, 1, '3', '1450', '', 'ORDID.141130', '01-07-2019 03:22:33 PM'),
(4, 2, 6, '2', '7500', '', 'ORDID.172300', '01-07-2019 03:48:48 PM'),
(5, 1, 2, '2', '4500', '', 'ORDID.87600', '01-07-2019 03:51:27 PM'),
(6, 1, 3, '3', '4800', '', 'ORDID.203420', '02-07-2019 12:18:09 PM'),
(7, 1, 5, '3', '6500', '', 'ORDID.180100', '02-07-2019 12:39:13 PM'),
(8, 2, 5, '4', '7500', '', 'ORDID.43500', '02-07-2019 01:25:53 PM');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `payment_type` longtext COLLATE utf8_unicode_ci,
  `invoice_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `is_complete` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  `method` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `amount` longtext COLLATE utf8_unicode_ci,
  `creation_date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orderid` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `title`, `payment_type`, `invoice_id`, `transaction_id`, `is_complete`, `uid`, `method`, `description`, `amount`, `creation_date`, `orderid`, `year`, `count`) VALUES
(1, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561834524', 1, 2, 'FDP_dash', 'Food Payment', '1600', '29-06-2019 07:55:24 PM', 'ORDID.304590', NULL, 0),
(2, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561834712', 1, 2, 'FDP_dash', 'Food Payment', '2900', '29-06-2019 07:58:32 PM', 'ORDID.224730', NULL, 0),
(3, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561982315', 1, 1, 'FDP_dash', 'Food Payment', '9000', '01-07-2019 12:58:35 PM', 'ORDID.108650', NULL, 0),
(4, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561982515', 1, 1, 'FDP_dash', 'Food Payment', '5100', '01-07-2019 01:01:55 PM', 'ORDID.262250', NULL, 0),
(5, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561985219', 1, 2, 'FDP_dash', 'Food Payment', '7200', '01-07-2019 01:46:59 PM', 'ORDID.247110', NULL, 0),
(6, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561990497', 1, 2, 'FDP_dash', 'Food Payment', '4500', '01-07-2019 03:14:57 PM', 'ORDID.260210', NULL, 0),
(7, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561990529', 1, 2, 'FDP_dash', 'Food Payment', '4500', '01-07-2019 03:15:29 PM', 'ORDID.260210', NULL, 0),
(8, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561990543', 1, 2, 'FDP_dash', 'Food Payment', '4500', '01-07-2019 03:15:43 PM', 'ORDID.260210', NULL, 0),
(9, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561990748', 1, 2, 'FDP_dash', 'Food Payment', '15000', '01-07-2019 03:19:08 PM', 'ORDID.157380', NULL, 0),
(10, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561990793', 1, 2, 'FDP_dash', 'Food Payment', '4920', '01-07-2019 03:19:53 PM', 'ORDID.126800', NULL, 0),
(11, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561990953', 1, 2, 'FDP_dash', 'Food Payment', '1450', '01-07-2019 03:22:33 PM', 'ORDID.141130', NULL, 0),
(12, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561992528', 1, 2, 'FDP_dash', 'Food Payment', '7500', '01-07-2019 03:48:48 PM', 'ORDID.172300', NULL, 0),
(13, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1561992687', 1, 1, 'FDP_dash', 'Food Payment', '4500', '01-07-2019 03:51:27 PM', 'ORDID.87600', NULL, 0),
(14, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1562066289', 1, 1, 'FDP_dash', 'Food Payment', '4800', '02-07-2019 12:18:09 PM', 'ORDID.203420', NULL, 0),
(15, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1562067553', 1, 1, 'FDP_dash', 'Food Payment', '6500', '02-07-2019 12:39:13 PM', 'ORDID.180100', NULL, 0),
(16, 'Food Payment', 'Online Machine', NULL, 'FDP_PAY1562070353', 1, 2, 'FDP_dash', 'Food Payment', '7500', '02-07-2019 01:25:53 PM', 'ORDID.43500', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `card` varchar(220) COLLATE utf8_bin NOT NULL,
  `expire` varchar(10) COLLATE utf8_bin NOT NULL,
  `cv` varchar(5) COLLATE utf8_bin NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`id`, `card`, `expire`, `cv`, `uid`) VALUES
(1, '56698787636737', '02/12', '787', 2),
(2, '56698787636737', '02/12', '787', 2),
(3, '56698787636737', '03/20', '787', 2),
(4, '56698787636737', '02/12', '787', 2),
(5, '56698787636737', '02/12', '787', 1),
(6, '56698787636737', '03/20', '787', 1),
(7, '56698787636737', '03/20', '787', 1),
(8, '56698787636737', '03/20', '787', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(220) COLLATE utf8_bin NOT NULL,
  `type` enum('Food','Drink') COLLATE utf8_bin NOT NULL,
  `img` varchar(220) COLLATE utf8_bin NOT NULL,
  `price` varchar(220) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `img`, `price`) VALUES
(1, 'Amala', 'Food', 'upload/AMALA_PRODUCT15089_19.jpg', '1000'),
(2, 'Eba', 'Food', 'upload/EBA_PRODUCT14038_19.jpg', '1200'),
(3, 'RIce', 'Food', 'upload/RICE_PRODUCT15703_19.jpg', '2000'),
(4, 'Semovita', 'Food', 'upload/SEMOVITA_PRODUCT20548_19.jpg', '930'),
(5, 'Pepsi', 'Drink', 'upload/PEPSI_PRODUCT24207_19.jpg', '300'),
(6, 'Coke', 'Drink', 'upload/COKE_PRODUCT1308_19.jpg', '500'),
(7, 'Buttle Water', 'Drink', 'upload/BUTTLE WATER_PRODUCT25893_19.jpg', '250'),
(8, 'Sprite', 'Drink', 'upload/SPRITE_PRODUCT1786_19.jpg', '400');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `lastname` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `logid` varchar(200) COLLATE utf8_bin NOT NULL,
  `phone` varchar(220) COLLATE utf8_bin NOT NULL,
  `orderpin` varchar(200) COLLATE utf8_bin NOT NULL,
  `city` varchar(200) COLLATE utf8_bin NOT NULL,
  `state` varchar(200) COLLATE utf8_bin NOT NULL,
  `country` varchar(200) COLLATE utf8_bin NOT NULL,
  `address` varchar(250) COLLATE utf8_bin NOT NULL,
  `year` varchar(250) COLLATE utf8_bin NOT NULL,
  `howuhear` varchar(250) COLLATE utf8_bin NOT NULL,
  `avartar` varchar(220) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `logid`, `phone`, `orderpin`, `city`, `state`, `country`, `address`, `year`, `howuhear`, `avartar`) VALUES
(1, 'Raji', 'Samad', 'raji@gmail', '', '08167735273', 'FDP/19/UID/01480380', 'Ilorin', 'Kwara', 'Nigeria', '56, University Road, Beside FABBS Oil And Gas Ltd, Tipper Garage, Tanke, Ilorin, Kwara State.', '21-06-2019 03:54:34 PM', 'Facebook', ''),
(2, 'Salami', 'Funke', 'raji3@gmail', '', '09067735273', 'FDP/19/UID/01500660', 'Sagamu', 'Ogun', 'Nigeria', '56, University Road, Beside FABBS Oil And Gas Ltd, Tipper Garage, Tanke, Ilorin, Kwara State.', '21-06-2019 03:55:12 PM', 'Instergram', ''),
(3, 'Omobukola', 'Adeleke', 'raji4@gmail', '', '07067735273', 'FDP/19/UID/01332180', 'Ikeja', 'Lagos', 'Nigeria', '56, University Road, Beside FABBS Oil And Gas Ltd, Tipper Garage, Tanke, Ilorin, Kwara State.', '23-06-2019 02:36:50 PM', 'Twiter', ''),
(4, 'Fasola', 'Kabir', 'fasola@gmail.com', '', '08167755555', 'FDP/19/UID/0145680', 'Ilorin', 'Kwara', 'Nigeria', 'Abgaakklknkg\'clhgknflkb', '26-06-2019 11:26:42 AM', 'Facebook', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `numlog`
--
ALTER TABLE `numlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `needs`
--
ALTER TABLE `needs`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `numlog`
--
ALTER TABLE `numlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
