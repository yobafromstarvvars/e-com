-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 05:52 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image_link` varchar(512) NOT NULL DEFAULT '/assets/img/brand/brand-placeholder.png',
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `image_link`, `id_category`) VALUES
(1, 'Rockson', '/assets/img/brand/rockson.png', 1),
(2, 'casio', '/assets/img/brand/casio.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image_link` varchar(512) DEFAULT '/assets/img/catalog/placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image_link`) VALUES
(1, 'instrument', '/assets/img/catalog/instruments-category.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `received_date` date DEFAULT NULL,
  `status` enum('received','paid','processing','canceled') NOT NULL DEFAULT 'processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `quantity` float NOT NULL DEFAULT 0,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_link` varchar(512) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL DEFAULT 0,
  `id_brand` int(11) NOT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `amount` float NOT NULL DEFAULT 0,
  `id_type` int(11) NOT NULL,
  `id_subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image_link`, `description`, `price`, `id_brand`, `rating`, `amount`, `id_type`, `id_subcategory`) VALUES
(1, 'ST Electric Guitar Black', '/assets/img/catalog/guitar-electro (3).jpeg', 'ST-style electric guitar with Poplar body, bolt-on maple neck, composite fretboard, \'C\' neck profile, ceramic single-coils.', 5390, 1, 4.86, 1, 1, 1),
(2, 'CT-S100 Casiotone (Black)', '/assets/img/catalog/keys (2).jpeg', 'The Casio CT-S100 Casiotone (Black) is a 61-note portable Keyboard with 122x tones, 61x rhythms and an on-board Dance Music Mode. ', 6490, 2, 3.43, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_category` int(11) NOT NULL,
  `image_link` varchar(512) DEFAULT '/assets/img/catalog/placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `id_category`, `image_link`) VALUES
(1, 'guitar', 1, '/assets/img/catalog/guitar-acoustic (1).jpeg'),
(2, 'keys', 1, '/assets/img/catalog/keys (4).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `id_subcategory`) VALUES
(1, 'electric', 1),
(2, 'keyboard', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `joined_date` date NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(512) NOT NULL DEFAULT '/assets/img/profiles/profile-placeholder.png',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`, `joined_date`, `image_path`, `is_admin`, `is_active`) VALUES
(1, 'Will', 'will@gmail.com', '$2y$10$tFKfPd.ZiYJ1M64ZYljrn.Xt4OpsRhgTzJGASsCVhis6NPQQ/1gvG', '2023-03-02', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(5, 'Will', 'mary@gmail.com', '$2y$10$ZtT1vJ2w5JiJbE.ppEq2nu4S9W9nzKPEP1ohUEFi6TLgLjtWPNlwO', '2023-03-02', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(7, 'gary', 'gary@gmail.com', '$2y$10$Ljh2Fdout9U6PPDivqFSX.PBPsRSZrv3OlDDZd2b1qisxDn/5XX72', '2023-03-02', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(8, 'Dick', 'dick@gmail.com', '$2y$10$W4F3aDhQzQnvchd80i1rj.nBqtagxjH1I6E3HLlNN0/Q4qDqYlFUm', '2023-03-02', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(9, 'joe', 'joe@example.com', '$2y$10$riZFIxGBy9ZX03vZnn19ROXf5bm5dgD85CkfPyMWyfajrZezp6QKK', '2023-03-02', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(10, 'bob', 'bob@example.com', '$2y$10$6pHRlv5VNlXTQS3S3dgpzeoq6KLwEbHMNC0LSS8u/QgLKs.oChJlK', '2023-03-02', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(13, 'frank', 'frank@example.com', '$2y$10$wKK90hIBYVBYoIbeOzKVhurJ04t4Fw2/Wq0.alhM1V4iSFCOM6a3q', '2023-03-02', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(14, 'robert', 'robert@example.com', '$2y$10$yfv4mHjNQywICzkuSF8CPe2HojL9IFlmEDqOXHnnUBF.0dQjjBFL6', '2023-03-02', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(15, 'lade', 'lady@example.com', '$2y$10$Ejhyg5YbYjNdYz21pp6sxeJwOiiMUuqyoXGeNc7ukM3.BZpmaMN1e', '2023-03-02', '/assets/img/profiles/id15-2023-03-03-12-50-38.png', 0, 1),
(16, '', '', '', '2023-03-03', '/assets/img/profiles/id15-2023-03-03-12-16-32.png', 0, 1),
(17, 'Labo', 'labo@example.com', '$2y$10$Ejhyg5YbYjNdYz21pp6sxeJwOiiMUuqyoXGeNc7ukM3.BZpmaMN1e', '2023-03-03', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(18, 'Admin', 'admin@admin.com', '$2y$10$m5ddScJBJl7MjC/9/xcfnetS2MEVA6q7F5CocTyLtlqL9HmyP2VIG', '2023-03-03', '/assets/img/profiles/profile-placeholder.png', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id_subcategory` (`id_subcategory`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subcategory` (`id_subcategory`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD CONSTRAINT `orders_item_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_item_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
