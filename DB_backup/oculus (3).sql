-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 07:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oculus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ctitle` varchar(255) NOT NULL,
  `carticle` longtext NOT NULL,
  `cimage` varchar(255) NOT NULL,
  `curl` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ctitle`, `carticle`, `cimage`, `curl`, `created_at`, `updated_at`) VALUES
(1, 'statues', 'Beautiful statues from all across the world ', 'statues.jpeg', 'statues', '2019-01-21 00:00:00', '2019-01-21 00:00:00'),
(2, 'paintings', 'A large collection of hand made paintings ', 'paint.jpeg', 'paintings', '2019-01-21 00:00:00', '2019-01-21 00:00:00'),
(3, 'relics', 'A collection of ancient and modern relics ', 'relic.jpeg', 'relics', '2019-01-21 00:00:00', '2019-01-21 00:00:00'),
(4, 'jewelry', '<p>jewelry<br></p>', 'tool.jpg', 'jewelry', '2019-01-21 00:00:00', '2019-02-07 15:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `menu_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `article` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `menu_id`, `title`, `image`, `article`, `created_at`, `updated_at`) VALUES
(1, 2, 'About us', 'about.jpeg', 'we are a shop that offers a variety of high-end statues paintings and artifacts \r\nfrom all over the world\r\nwe offer you the best service and quality\r\nour products are 100% real and in great condition', '2019-01-16 00:00:00', '2019-02-03 19:46:14'),
(3, 5, 'Contact us', 'contact.jpeg', 'Contacts\r\n45 Park Avenue, Apt. 303\r\nNew York, NY 10016, USA\r\n001 (917) 555-4836\r\n001 (800) 333-6578\r\ninfo@m-store.com Working hours: 10am - 8pm, Mn - St', '2019-01-23 00:00:00', '2019-02-03 19:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `link`, `url`, `title`, `created_at`, `updated_at`) VALUES
(2, 'About Us', 'about-us', 'About-us', '2019-01-31 00:00:00', '2019-02-03 18:46:52'),
(5, 'Contact us', 'contact-us', 'Contact-Us', '2019-02-02 13:56:37', '2019-02-02 13:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `total` decimal(8,0) NOT NULL,
  `data` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `data`, `updated_at`, `created_at`) VALUES
(1, 4, '50000', 'a:1:{i:4;a:6:{s:2:\"id\";s:1:\"4\";s:4:\"name\";s:16:\"Roman Aristocrat\";s:5:\"price\";d:50000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:10:\"queen.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-01-30 18:01:56', '2019-01-30 18:01:56'),
(2, 4, '50000', 'a:1:{i:4;a:6:{s:2:\"id\";s:1:\"4\";s:4:\"name\";s:16:\"Roman Aristocrat\";s:5:\"price\";d:50000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:10:\"queen.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-01-30 18:02:22', '2019-01-30 18:02:22'),
(3, 4, '2500', 'a:1:{i:9;a:6:{s:2:\"id\";s:1:\"9\";s:4:\"name\";s:5:\"Model\";s:5:\"price\";d:2500;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:9:\"body.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-01-30 18:03:06', '2019-01-30 18:03:06'),
(4, 5, '80000', 'a:3:{i:2;a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:8:\"The lady\";s:5:\"price\";d:20000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:9:\"pink.jpeg\";}s:10:\"conditions\";a:0:{}}i:3;a:6:{s:2:\"id\";s:1:\"3\";s:4:\"name\";s:10:\"The secret\";s:5:\"price\";d:10000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:12:\"secrets.jpeg\";}s:10:\"conditions\";a:0:{}}i:4;a:6:{s:2:\"id\";s:1:\"4\";s:4:\"name\";s:16:\"Roman Aristocrat\";s:5:\"price\";d:50000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:10:\"queen.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-01-31 18:14:36', '2019-01-31 18:14:36'),
(5, 5, '65000', 'a:2:{i:8;a:6:{s:2:\"id\";s:1:\"8\";s:4:\"name\";s:9:\"Sacrifice\";s:5:\"price\";d:20000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:10:\"bible.jpeg\";}s:10:\"conditions\";a:0:{}}i:7;a:6:{s:2:\"id\";s:1:\"7\";s:4:\"name\";s:6:\"buddha\";s:5:\"price\";d:45000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:9:\"yoga.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-01-31 18:15:27', '2019-01-31 18:15:27'),
(6, 5, '20000', 'a:1:{i:2;a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:8:\"The lady\";s:5:\"price\";d:20000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:9:\"pink.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-02-08 14:53:31', '2019-02-08 14:53:31'),
(7, 9, '4000', 'a:1:{i:2;a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:8:\"The lady\";s:5:\"price\";d:4000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:9:\"pink.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-02-10 16:39:12', '2019-02-10 16:39:12'),
(8, 4, '4000', 'a:1:{i:2;a:6:{s:2:\"id\";s:1:\"2\";s:4:\"name\";s:8:\"The lady\";s:5:\"price\";d:4000;s:8:\"quantity\";i:1;s:10:\"attributes\";a:1:{s:5:\"image\";s:9:\"pink.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-02-11 18:26:33', '2019-02-11 18:26:33'),
(9, 4, '108000', 'a:1:{i:4;a:6:{s:2:\"id\";s:1:\"4\";s:4:\"name\";s:16:\"Roman Aristocrat\";s:5:\"price\";d:27000;s:8:\"quantity\";i:4;s:10:\"attributes\";a:1:{s:5:\"image\";s:10:\"queen.jpeg\";}s:10:\"conditions\";a:0:{}}}', '2019-02-11 18:26:57', '2019-02-11 18:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `ptitle` varchar(255) NOT NULL,
  `particle` longtext NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `onsale` tinyint(255) DEFAULT '0',
  `purl` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categorie_id`, `ptitle`, `particle`, `pimage`, `price`, `onsale`, `purl`, `updated_at`, `created_at`) VALUES
(2, 1, 'The lady', 'A high end classic Roman statue from 356 BC', 'pink.jpeg', '4000', 1, 'the-lady-roman', '2019-02-08 22:56:29', '2019-01-23 00:00:00'),
(3, 1, 'The secret', 'Modern Sculpture of a young boy keeping a secret.&nbsp; The perfect Sculpture to take your garden to the next design levels', 'secrets.jpeg', '1250', 1, 'secrets', '2019-02-08 22:57:11', '2019-01-30 00:00:00'),
(4, 1, 'Roman Aristocrat', 'roman aristocrat head with the golden necklace filled with diamonds', 'queen.jpeg', '27000', 1, 'roman-aristocrat', '2019-02-08 22:58:57', '2019-01-30 00:00:00'),
(6, 1, 'Mercy', '<p>Sculpture of angle from the Renaissance&nbsp;</p><p> </p>', 'angels.jpeg', '5000', 1, 'mercy', '2019-02-08 22:59:29', '2019-01-23 00:00:00'),
(7, 1, 'Buddha', 'Small classic&nbsp; Buddha&nbsp;statue for every house and for those who want to keep a relaxing environment&nbsp;', 'yoga.jpeg', '750', 1, 'buddha', '2019-02-11 15:59:13', '2019-01-23 00:00:00'),
(8, 1, 'Sacrifice', 'A woman dancing for here freedome', 'bible.jpeg', '20000', 0, 'sacrifice', '2019-02-08 23:02:07', '2019-01-23 00:00:00'),
(9, 1, 'Model', 'Roman sculpture of the male body', 'body.jpeg', '2500', 0, 'model', '2019-01-23 00:00:00', '2019-01-23 00:00:00'),
(11, 2, 'The meeting', 'a painting of the dome from the renaissance', 'dome.jpeg', '5760', 0, 'the-meeting', '2019-01-23 00:00:00', '2019-01-23 00:00:00'),
(14, 2, 'Birds ', 'A collection of rare bird paintings ', 'birds.jpeg', '780', 0, 'birds', '2019-01-23 00:00:00', '2019-01-23 00:00:00'),
(15, 3, 'Viking helmet', 'Old Norseman helmet', 'helmet.jpeg', '65000', 0, 'viking-helmet', '2019-02-11 15:59:48', '2019-01-23 00:00:00'),
(17, 4, 'Viking Rings', 'Viking Rings from the stone era ', 'vikings.jpg', '450', 0, 'vikings-rings', '2019-01-23 00:00:00', '2019-01-08 00:00:00'),
(18, 4, 'Gems Necklace', ' necklace with the best beautiful gemstone from 1936', 'gems.jpeg', '11550', 0, 'gems-neklace', '2019-01-23 00:00:00', '2018-12-21 00:00:00'),
(19, 1, 'Monk', 'little buddha monk to add some relaxing feel to you garden', 'yoga2.jpeg', '200', 0, 'monk', '2019-01-23 00:00:00', '2018-12-28 00:00:00'),
(30, 2, 'Square', 'A piece of modern art in its full power', 'colors.jpeg', '249', 1, 'Square', '2019-02-02 00:00:00', '2019-02-02 00:00:00'),
(31, 2, 'Golden Forest', ' An amazing forest painting made only with olive colors \r\n', 'forest.jpeg', '150', 1, 'golden-forest', '2019-02-02 00:00:00', '2019-02-08 00:00:00'),
(32, 3, 'Old School clock', 'Old school pocket watch from 1941', 'clock.jpeg', '1500', 0, 'clock', '2019-02-02 00:00:00', '2019-02-08 00:00:00'),
(33, 3, 'Novum Testamentum', 'Novum Testamentum the new testament book from 1917', 'book.jpeg', '9800', 0, 'new-testament', '2019-02-02 00:00:00', '2019-02-08 00:00:00'),
(34, 2, 'Rabbit', '<p>Psycodelic Painting of a rabbitb</p>', '11.02.19.16.14.55-2012-07-31 18.05.01 247691099632419520_39436903.jpg', '260', 0, 'rabbit', '2019-02-11 16:19:14', '2019-02-11 16:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, '-', '-', '-', '2019-01-23 00:00:00', '2019-01-23 00:00:00'),
(2, '--', '--', '--', '2019-01-23 00:00:00', '2019-01-23 00:00:00'),
(3, '---', '---', '---', '2019-01-23 00:00:00', '2019-01-23 00:00:00'),
(4, 'admin', 'admin@gmail.com', '$2y$10$7tz34p/ej.mwwUGKxP6N/utmSNCJLWn4ylNus2Jb9Vu1OkahBaixy', '2019-01-29 00:00:00', '2019-01-29 00:00:00'),
(5, 'arman', 'armenin2088@gmail.com', '$2y$10$7tz34p/ej.mwwUGKxP6N/utmSNCJLWn4ylNus2Jb9Vu1OkahBaixy', '2019-01-29 00:00:00', '2019-01-29 00:00:00'),
(6, 'armando', 'armando@gmail.com', '$2y$10$7tz34p/ej.mwwUGKxP6N/utmSNCJLWn4ylNus2Jb9Vu1OkahBaixy', '2019-01-23 00:00:00', '2019-01-23 00:00:00'),
(7, 'alex', 'alex@gmail.com', '$2y$10$CKDaa//n8fwTl2kZbtQaeOpuve00Xa6.NWKP7t5BrfyLxNcYGDx.e', '2019-01-30 16:31:35', '2019-01-30 16:31:35'),
(8, 'david', 'david@gmail.com', '$2y$10$n0K8M./jxE0UtyCF4gPQ2u1YXmxuomCqO1T4q.5gcUz.XEbxuyKzy', '2019-01-30 16:47:19', '2019-01-30 16:47:19'),
(9, 'bob', 'bob@gmail.com', '$2y$10$iguYb6tlGQ30d2U2w1uUZeD8jGCp11reveG1F4J364AYxMo2CUONi', '2019-02-10 16:36:45', '2019-02-10 16:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`uid`, `rid`) VALUES
(4, 100),
(5, 99),
(6, 99),
(7, 99),
(8, 99),
(9, 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `curl` (`curl`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purl` (`purl`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
