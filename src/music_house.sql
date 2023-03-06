-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 04:55 AM
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
(6, 'instruments', '/assets/img/category/instruments-2023-03-05-06-31-55.jpg'),
(7, 'music sheets', '/assets/img/catalog/placeholder.png'),
(8, 'Books', '/assets/img/catalog/placeholder.png'),
(9, 'gift', '/assets/img/catalog/placeholder.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `received_date` timestamp NULL DEFAULT NULL,
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
(6, 'guitar', 6, '/assets/img/subcategory/guitar-2023-03-05-06-33-03.jpg'),
(7, 'keys', 6, '/assets/img/subcategory/keys-2023-03-05-06-38-20.jpg'),
(8, 'music box', 9, '/assets/img/catalog/placeholder.png'),
(9, 'media', 9, '/assets/img/catalog/placeholder.png');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `joined_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(512) NOT NULL DEFAULT '/assets/img/profiles/profile-placeholder.png',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`, `joined_date`, `image_path`, `is_admin`, `is_active`) VALUES
(1, 'William', 'william@gmail.com', '$2y$10$Hd1NHSiKT22UwSk2lzZDLelT4Gd1M9HEdEoVFWtxJ.BCgmdOnSoie', '2023-03-01 21:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(5, 'Will', 'mary@gmail.com', '$2y$10$ZtT1vJ2w5JiJbE.ppEq2nu4S9W9nzKPEP1ohUEFi6TLgLjtWPNlwO', '2023-03-01 21:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(15, 'lade', 'lady@example.com', '$2y$10$Ejhyg5YbYjNdYz21pp6sxeJwOiiMUuqyoXGeNc7ukM3.BZpmaMN1e', '2023-03-01 21:00:00', '/assets/img/profiles/id15-2023-03-03-12-50-38.png', 0, 1),
(17, 'Labo', 'labo@example.com', '$2y$10$Ejhyg5YbYjNdYz21pp6sxeJwOiiMUuqyoXGeNc7ukM3.BZpmaMN1e', '2023-03-02 21:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(18, 'Admin', 'admin@admin.com', '$2y$10$m5ddScJBJl7MjC/9/xcfnetS2MEVA6q7F5CocTyLtlqL9HmyP2VIG', '2023-03-02 21:00:00', '/assets/img/profiles/id18-2023-03-05-03-05-10.png', 1, 1),
(19, 'Dick', 'dick@example.com', '$2y$10$WEwau.5YJH8prAg/mSYX6OvOl1piLlGEBmz1u8wkZKvwS2ZfELyeG', '0000-00-00 00:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(20, 'Ass', 'ass@example.com', '$2y$10$H3qbY.bQBKTDAAeq5gZlz.ZDOYOZAsGQJGY96P.huUrBy3a3p3bRa', '0000-00-00 00:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(21, 'Finn', 'finn@example.com', '$2y$10$KvAwQ1yVgeHzBM50TAfnNu7BT0.fzXg0Rfr21VLdBqhWKFLNCxXw2', '0000-00-00 00:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(22, 'Jake', 'jake@example.com', '$2y$10$Trw0PdyYQ9Us8.sYGtv2O.E7csDHlI5tXqxrU/LwyrwO2uPTDoj/C', '0000-00-00 00:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(23, 'Islam', 'islam@example.com', '$2y$10$QTGhH89u808PKHOpsLeJQe1TQXlyg3wJUIdG10y4Tj85ycnLs/kV.', '0000-00-00 00:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(24, 'Olga', 'olga@example.com', '$2y$10$8CFZHrCZyQ.We./DMsRt2u0OHe0OtcwBlvwh4bleCMrqdJrI8x1s2', '0000-00-00 00:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(25, 'Steve', 'steve@example.com', '$2y$10$PjLFkLZmEv1AQ9qVLC1p..yf6l.RVTdLISbKsIZvQnCVYnk8wzJuq', '0000-00-00 00:00:00', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(26, 'Comb', 'comb@example.com', '$2y$10$E/XgI7M6hoaB9MU821Xkc.SfCoYB2YmY0z5TbgoJLLcPW.teoXwS2', '2023-03-05 00:54:19', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(27, 'Nick', 'nick@example.com', '$2y$10$NaabsxLW6PworwUFIZtV8.o.MoaCsZsggLBE3NawBXJ/6K3T9xUwy', '2023-03-05 00:56:24', '/assets/img/profiles/profile-placeholder.png', 0, 0),
(28, 'Martin', 'martin@example.com', '$2y$10$U.ipqbr/Rr250/zJg53ue.yaE4L8LlPCvCFiw3N.ur0UwPtWRx6bW', '2023-03-05 00:58:16', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(29, 'Oliver', 'oliver@gmail.com', '$2y$10$1J89Z/J5tPMMPWj9efQPsOvRn5SAfbz8.xQ0u9Va0edOBt9vDOaiK', '2023-03-05 01:02:58', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(34, 'Oliver', 'oliver@gmai.com', '$2y$10$o/gByapgdsaWInWRS4NJRuKuB2sw6xDByZUOU5ZOGoclaqEJ9SUrG', '2023-03-05 01:19:34', '/assets/img/profiles/profile-placeholder.png', 0, 1),
(35, 'Baby', 'baby@gmai.com', '$2y$10$VGx3vBc9qsPO.Kzg1/rIMuScCEZjIYdXXGKTTZ9MIe25ecKqQDaQK', '2023-03-05 01:20:16', 'The_Lake_1.png', 1, 1),
(36, 'Paul', 'paul@comac.com', '$2y$10$BHcx/7M8X23Wp0/VqgtrZOfM8SwC9YJ6.Md9iBF69MJ0h6l8T8O0W', '2023-03-05 01:23:38', '/assets/img/profiles/profile-placeholder.png', 0, 1);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
