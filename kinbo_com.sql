-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 07:14 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinbo.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `phn_num` int(11) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_date` date NOT NULL,
  `order_amount` int(11) NOT NULL,
  `delivery_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `phn_num`, `customer_address`, `order_date`, `shipping_date`, `order_amount`, `delivery_status`) VALUES
(28, 13, 1774486000, 'Dhaka', '2017-12-26', '2017-12-26', 130000, 'delivered'),
(29, 13, 1774486000, 'Bd', '2017-12-26', '2017-12-26', 130000, 'delivered'),
(30, 13, 1774486000, 'Dhaka', '2017-12-26', '2017-12-26', 13000, 'pending'),
(31, 18, 1777777777, 'Azimpur', '2017-12-26', '2017-12-26', 130000, 'pending'),
(32, 18, 125, 'xxxx', '2017-12-26', '2017-12-26', 130000, 'pending'),
(33, 18, 123, 'zzzz', '2017-12-26', '2017-12-26', 130000, 'pending'),
(34, 13, 188888666, 'Link road', '2017-12-27', '2017-12-27', 130000, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `short_desc` varchar(300) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `short_desc`, `img_path`, `price`, `stock`) VALUES
(10, 6, 'Iphone 10', 'Iphone 10', '1514299200apple-iphone-x-bangladesh.jpg', 130000, 10),
(11, 4, 'Huawei P10', 'Huawei P10', '1514396241Huawei-P10.jpg', 56000, 10),
(12, 5, 'Nokia 6', 'Nokia 6', '1514396293Nokia-6.jpg', 22000, 20),
(13, 3, 'Oneplus 5', 'Oneplus 5', '1514396331OnePlus-5.jpg', 39000, 12),
(14, 1, 'Samsung Galaxy Note 8', 'Samsung Galaxy Note 8', '1514396373Samsung-Galaxy-Note8.jpg', 76000, 12),
(15, 7, 'Xiaomi mi 6', 'Xiaomi mi 6', '1514396419Xiaomi-Mi-6.jpg', 30000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(70) NOT NULL,
  `short_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`, `short_desc`) VALUES
(1, 'Samsung', 'All Product From Samsung'),
(3, 'Oneplus', 'All Product From Oneplus'),
(4, 'Huawei', 'All Product From Huawei'),
(5, 'Nokia', 'All Product From Nokia'),
(6, 'Iphone', 'All Product From Iphone'),
(7, 'Xiaomi', 'All Product From Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`, `user_type_id`) VALUES
(1, 'Administrator', 'admin@gmail.com', '123', 'male', 1),
(13, 'Shovon', 'shovon@gmail.com', 'shovon', 'male', 2),
(18, 'Rahatu rahat', 'rahat@gmail.com', '123456', 'male', 2),
(19, 'User Id', 'user@gmail.com', '123456', 'male', 2),
(26, 'New User', 'new@gmail.com', '123456', 'male', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`) VALUES
(1, 'admin'),
(2, 'users');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_fk` (`customer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `product_id_fk` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_cat_relation` (`category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_unique` (`category_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `em_uniqe` (`email`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_fk` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_datils_fk` FOREIGN KEY (`order_details_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_cat_relation` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `usertypeFK` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
