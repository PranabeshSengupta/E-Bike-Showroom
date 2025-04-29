-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 06:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_mobile` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_dob` varchar(255) NOT NULL,
  `a_img` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `a_name`, `a_mobile`, `a_email`, `a_dob`, `a_img`, `a_password`) VALUES
(12, 'Tanmoy mondal', '7412589632', '1234tanmoy@gmail.com', '2003-07-12', 'uploads/674bdb89e76dd.jpg', 'Tanmoy@123');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_mobile` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `c_question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `c_name`, `c_email`, `c_mobile`, `product_name`, `c_question`) VALUES
(12, 'Tahirul islam', '5566tahirul@gmail.com', '9647938735', 'TVS Jupitar', 'Ei product ta ki battary valo?');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_message` varchar(255) NOT NULL,
  `c_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `c_name`, `c_email`, `c_message`, `c_mobile`) VALUES
(7, 'Tanmoy Mondal', '5566tahirul@gmail.com', 'I wanted to buy a new Scooter.', '9647938735');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `b_range` varchar(255) NOT NULL,
  `displacement` varchar(255) NOT NULL,
  `top_speed` varchar(255) NOT NULL,
  `charging_time` varchar(255) NOT NULL,
  `weight_capacity` varchar(255) NOT NULL,
  `weight_vehicle` varchar(255) NOT NULL,
  `smart_dashboard` varchar(255) NOT NULL,
  `app_connectivity` varchar(255) NOT NULL,
  `safety_features` varchar(255) NOT NULL,
  `light` varchar(255) NOT NULL,
  `1st_service` varchar(255) NOT NULL,
  `2nd_service` varchar(255) NOT NULL,
  `3rd_service` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `g_image_1` varchar(255) NOT NULL,
  `g_image_2` varchar(255) NOT NULL,
  `g_image_3` varchar(255) NOT NULL,
  `g_image_4` varchar(255) NOT NULL,
  `g_image_5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `model`, `price`, `b_range`, `displacement`, `top_speed`, `charging_time`, `weight_capacity`, `weight_vehicle`, `smart_dashboard`, `app_connectivity`, `safety_features`, `light`, `1st_service`, `2nd_service`, `3rd_service`, `b_image`, `g_image_1`, `g_image_2`, `g_image_3`, `g_image_4`, `g_image_5`) VALUES
(35, 'TVS Jupiter', '85000', '150', '130', '55', '8', '165', '75', 'No', 'Yes', 'No', 'No', '5', '10', '15', 'tvs-jupiter-4.webp', 'tvs-jupiter-3.webp', 'tvs-jupiter-6.webp', 'tvs-jupiter-7.webp', 'tvs-jupiter-1.webp', 'tvs-jupiter-2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_rating` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `c_name`, `c_email`, `c_rating`, `review`, `photo`) VALUES
(17, 'Tahirul islam', '5566tahirul@gmail.com', '4', 'This website is very good.', 'uploads/img3.jpg'),
(18, 'Tanmoy Mondal', 'Tanmoy123@gmail.com', '5', 'The show room is very good. Very helpfull people.', 'uploads/img2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(255) NOT NULL,
  `p_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `p_video`) VALUES
(33, 'videos/18.10.2024_10.54.10_REC.mp4'),
(34, 'videos/22.10.2024_21.28.50_REC.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
