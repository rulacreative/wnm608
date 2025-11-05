-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2025 at 07:37 PM
-- Server version: 10.6.23-MariaDB-cll-lve
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rbashi`
--
 
-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `url` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(32) NOT NULL,
  `images` varchar(256) NOT NULL,
  `thumbnail` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `url`, `description`, `category`, `images`, `thumbnail`) VALUES
(1, 'Lavender Calm', 18.00, 'lavender-calm', 'Soft floral notes to relax body and mind.', 'Herbal', 'p1.png', 'p1.png'),
(2, 'Mint Focus', 16.00, 'mint-focus', 'Cool mint blend that refreshes and sharpens focus.', 'Herbal', 'p2.png', 'p2.png'),
(3, 'Ginger Digest', 17.00, 'ginger-digest', 'Warm ginger spice to soothe and support digestion.', 'Wellness', 'p3.png', 'p3.png'),
(4, 'Chamomile Dream', 15.00, 'chamomile-dream', 'Golden calm in a cup — your bedtime ritual begins here.', 'Herbal', 'p4.png', 'p4.png'),
(5, 'Rose Harmony', 19.00, 'rose-harmony', 'Delicate rose petals for moments of inner peace.', 'Floral', 'p5.png', 'p5.png'),
(6, 'Citrus Glow', 17.00, 'citrus-glow', 'Zesty citrus infusion that uplifts and energizes.', 'Citrus', 'p6.png', 'p6.png'),
(7, 'Chai Tranquil', 18.00, 'chai-tranquil', 'Spiced black tea that comforts and grounds.', 'Chai', 'p7.png', 'p7.png'),
(8, 'Jasmine Muse', 20.00, 'jasmine-muse', 'Fragrant jasmine that inspires calm focus.', 'Green', 'p8.png', 'p8.png'),
(9, 'Earl Grey Luxe', 19.50, 'earl-grey-luxe', 'Classic black tea with notes of bright bergamot.', 'Black', 'p9.png', 'p9.png'),
(10, 'Moroccan Mint', 16.50, 'moroccan-mint', 'A timeless Moroccan blend of green tea and refreshing mint.', 'Green', 'p10.png', 'p10.png'),
(11, 'Hibiscus Breeze', 15.50, 'hibiscus-breeze', 'Tart ruby hibiscus with a cooling floral finish.', 'Herbal', 'p11.png', 'p11.png'),
(12, 'Turmeric Soothe', 17.50, 'turmeric-soothe', 'Golden turmeric with ginger for gentle warmth.', 'Wellness', 'p12.png', 'p12.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
