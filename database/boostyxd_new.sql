-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2022 at 07:11 AM
-- Server version: 10.3.35-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boostyxd_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `brgy`
--

CREATE TABLE `brgy` (
  `brgy_id` int(11) NOT NULL,
  `brgy` varchar(16) DEFAULT NULL,
  `shipping_fee` int(1) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brgy`
--

INSERT INTO `brgy` (`brgy_id`, `brgy`, `shipping_fee`, `is_active`) VALUES
(1, 'Alangilan', 0, 0),
(2, 'Alijis', 0, 0),
(3, 'Banago', 0, 0),
(4, 'Barangay 1', 0, 0),
(5, 'Barangay 2', 0, 0),
(6, 'Barangay 3', 0, 0),
(7, 'Barangay 4', 0, 0),
(8, 'Barangay 5', 0, 0),
(9, 'Barangay 6', 0, 0),
(10, 'Barangay 7', 0, 0),
(11, 'Barangay 8', 0, 0),
(12, 'Barangay 9', 0, 0),
(13, 'Barangay 10', 0, 0),
(14, 'Barangay 11', 0, 0),
(15, 'Barangay 12', 0, 0),
(16, 'Barangay 13', 0, 0),
(17, 'Barangay 14', 0, 0),
(18, 'Barangay 15', 0, 0),
(19, 'Barangay 16', 0, 0),
(20, 'Barangay 17', 0, 0),
(21, 'Barangay 18', 0, 0),
(22, 'Barangay 19', 0, 0),
(23, 'Barangay 20', 0, 0),
(24, 'Barangay 21', 0, 0),
(25, 'Barangay 22', 0, 0),
(26, 'Barangay 23', 0, 0),
(27, 'Barangay 24', 0, 0),
(28, 'Barangay 25', 0, 0),
(29, 'Barangay 26', 0, 0),
(30, 'Barangay 27', 0, 0),
(31, 'Barangay 28', 0, 0),
(32, 'Barangay 29', 0, 0),
(33, 'Barangay 30', 0, 0),
(34, 'Barangay 31', 0, 0),
(35, 'Barangay 32', 0, 0),
(36, 'Barangay 33', 0, 0),
(37, 'Barangay 34', 0, 0),
(38, 'Barangay 35', 0, 0),
(39, 'Barangay 36', 0, 0),
(40, 'Barangay 37', 0, 0),
(41, 'Barangay 38', 0, 0),
(42, 'Barangay 39', 0, 0),
(43, 'Barangay 40', 0, 0),
(44, 'Barangay 41', 0, 0),
(45, 'Bata', 0, 0),
(46, 'Cabug', 0, 0),
(47, 'Estefania', 0, 0),
(48, 'Felisa', 0, 0),
(49, 'Granada', 0, 0),
(50, 'Handumanan', 0, 0),
(51, 'Mandalagan', 0, 0),
(52, 'Mansilingan', 0, 0),
(53, 'Montevista', 0, 0),
(54, 'Pahanocoy', 0, 0),
(55, 'Punta Taytay', 0, 0),
(56, 'Singcang-Airport', 0, 0),
(57, 'Sum-ag', 0, 0),
(58, 'Taculing', 0, 0),
(59, 'Tangub', 0, 0),
(60, 'Villamonte', 0, 0),
(61, 'Vista Alegre', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(20) NOT NULL,
  `order_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item_id`, `order_id`, `option_id`, `user_id`, `quantity`) VALUES
(139, 5, 704221, 63, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `item_img` varchar(100) NOT NULL,
  `item_price` float NOT NULL,
  `gcash_qrcode` varchar(100) NOT NULL,
  `item_add_text` varchar(255) NOT NULL,
  `is_featured` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_available` int(1) NOT NULL,
  `total_items_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_description`, `item_img`, `item_price`, `gcash_qrcode`, `item_add_text`, `is_featured`, `date_created`, `is_available`, `total_items_left`) VALUES
(2, 'Clip for teens november sale', '', 'product_image/clip.png', 375, '44F652C1-41AD-4B4E-97C7-3B6D89A3ADC6.jpeg', '', 0, '2022-07-04 03:02:59', 0, 0),
(3, 'Keychain', '', 'product_image/keychain.png', 1200.75, 'gcash_qr/44F652C1-41AD-4B4E-97C7-3B6D89A3ADC6.jpeg', '', 0, '2022-07-03 05:50:09', 1, 231),
(5, 'Artwork', '', 'product_image/find-hero.png', 700, 'gcash_qr/44F652C1-41AD-4B4E-97C7-3B6D89A3ADC6.jpeg', '', 0, '2022-05-19 05:59:21', 1, 0),
(6, 'Artwork 2', '', 'product_image/find-img.png', 700.5, 'gcash_qr/44F652C1-41AD-4B4E-97C7-3B6D89A3ADC6.jpeg', '', 0, '2022-07-04 03:16:23', 0, 0),
(7, 'Photo', '', 'product_image/BA7386DE-65F3-4A40-AA26-5EFCDE83BF2F.jpeg', 320, 'gcash_qr/9376B7B5-1312-40A8-8140-BF853E48DD15.jpeg', '', 0, '2022-05-17 06:05:29', 1, 0),
(8, 'Iced Coffee', '', 'product_image/FBB7A32A-0659-49BC-86D9-C52555457804.jpeg', 382, 'gcash_qr/44F652C1-41AD-4B4E-97C7-3B6D89A3ADC6.jpeg', '', 0, '2022-05-19 05:39:22', 1, 0),
(9, 'Coffe', '', 'product_image/E137E2C6-C664-491D-9651-2D22DF203519.png', 50, 'gcash_qr/44F652C1-41AD-4B4E-97C7-3B6D89A3ADC6.jpeg', '', 0, '2022-05-17 04:49:50', 1, 0),
(10, 'Sling Bag', '', 'product_image/7971DA09-666D-476D-BB4B-985664D45FC2.jpeg', 799, 'gcash_qr/1AE54F4E-A87A-4727-B9C4-B70E53F752B7.jpeg', '', 0, '2022-05-19 06:58:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(100) NOT NULL,
  `selection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `option_name`, `selection_id`) VALUES
(1, '2 layers', 2),
(2, 'athena', 3),
(4, 'aurora', 3),
(5, 'selena', 3),
(6, 'white', 4),
(10, 'silver name', 5),
(12, 'gold name', 5),
(13, '<a href=\'https://boostyxdota.com/pixie/product.php\'>A</a>', 1),
(14, 'B', 1),
(15, 'C', 1),
(16, 'D', 1),
(17, 'E', 1),
(18, 'F', 1),
(19, 'G', 1),
(20, 'H', 1),
(21, 'I', 1),
(22, 'J', 1),
(23, 'K', 1),
(24, 'L', 1),
(25, 'M', 1),
(26, 'N', 1),
(27, '3 layers', 2),
(28, 'O', 1),
(29, 'P', 1),
(30, 'Q', 1),
(31, 'R', 1),
(32, 'S', 1),
(33, 'T', 1),
(34, 'U', 1),
(35, 'V', 1),
(36, 'X', 1),
(37, 'Y', 1),
(38, 'Z', 1),
(39, '1', 1),
(40, '2', 1),
(41, '3', 1),
(42, '4', 1),
(43, '5', 1),
(44, '6', 1),
(45, '7', 1),
(46, '8', 1),
(47, '9', 1),
(48, '0', 1),
(49, 'navy blue', 4),
(50, 'pink', 4),
(51, 'A', 6),
(52, 'B', 6),
(53, 'C', 6),
(54, 'D', 6),
(55, 'E', 6),
(56, 'F', 6),
(57, 'green', 8),
(58, 'orange', 8),
(59, 'red', 8),
(60, 'aurora', 9),
(61, 'rose', 9),
(62, 'white', 10),
(63, 'green', 10),
(64, 'black', 10),
(65, 'Mocha', 11),
(66, 'dark chocolate', 11),
(67, 'black', 11),
(68, '2 layers', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `customermobile` varchar(15) NOT NULL,
  `customeremail` varchar(50) NOT NULL,
  `customername` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_no`, `item_id`, `option_id`, `option_name`, `quantity`, `description`, `amount`, `customermobile`, `customeremail`, `customername`, `user_id`, `order_date`) VALUES
(24, 100, 3, 13, 'A', 11, 'Keychain - A', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-22 08:39:26'),
(25, 100, 3, 1, '2 layers', 11, 'Keychain - 2 layers', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-22 08:39:26'),
(26, 100, 3, 4, 'aurora', 11, 'Keychain - aurora', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-22 08:39:26'),
(27, 100, 3, 50, 'pink', 11, 'Keychain - pink', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-22 08:39:26'),
(28, 100, 3, 12, 'gold name', 11, 'Keychain - gold name', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-22 08:39:26'),
(29, 100, 6, 53, 'C', 1, 'Artwork 2 - C', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-22 08:39:26'),
(30, 100, 6, 68, '2 layers', 1, 'Artwork 2 - 2 layers', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-22 08:39:26'),
(31, 100, 3, 13, 'A', 11, 'Keychain - A', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-28 06:43:38'),
(32, 100, 3, 1, '2 layers', 11, 'Keychain - 2 layers', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-28 06:43:38'),
(33, 100, 3, 4, 'aurora', 11, 'Keychain - aurora', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-28 06:43:38'),
(34, 100, 3, 50, 'pink', 11, 'Keychain - pink', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-28 06:43:38'),
(35, 100, 3, 12, 'gold name', 11, 'Keychain - gold name', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-28 06:43:38'),
(36, 100, 6, 53, 'C', 1, 'Artwork 2 - C', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-28 06:43:38'),
(37, 100, 6, 68, '2 layers', 1, 'Artwork 2 - 2 layers', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-28 06:43:38'),
(38, 100, 3, 1, '2 layers', 11, 'Keychain - 2 layers', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(39, 100, 3, 4, 'aurora', 11, 'Keychain - aurora', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(40, 100, 3, 50, 'pink', 11, 'Keychain - pink', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(41, 100, 3, 12, 'gold name', 11, 'Keychain - gold name', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(42, 100, 3, 48, '0', 4, 'Keychain - 0', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(43, 100, 3, 27, '3 layers', 4, 'Keychain - 3 layers', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(44, 100, 3, 4, 'aurora', 4, 'Keychain - aurora', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(45, 100, 3, 49, 'navy blue', 4, 'Keychain - navy blue', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(46, 100, 3, 10, 'silver name', 4, 'Keychain - silver name', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:23:22'),
(47, 100, 3, 1, '2 layers', 11, 'Keychain - 2 layers', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39'),
(48, 100, 3, 4, 'aurora', 11, 'Keychain - aurora', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39'),
(49, 100, 3, 50, 'pink', 11, 'Keychain - pink', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39'),
(50, 100, 3, 12, 'gold name', 11, 'Keychain - gold name', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39'),
(51, 100, 3, 48, '0', 4, 'Keychain - 0', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39'),
(52, 100, 3, 27, '3 layers', 4, 'Keychain - 3 layers', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39'),
(53, 100, 3, 4, 'aurora', 4, 'Keychain - aurora', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39'),
(54, 100, 3, 49, 'navy blue', 4, 'Keychain - navy blue', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39'),
(55, 100, 3, 10, 'silver name', 4, 'Keychain - silver name', 1, '09563674950', 'cedricisubol@gmail.com', '5', 5, '2022-06-29 01:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

CREATE TABLE `selection` (
  `selection_id` int(11) NOT NULL,
  `selection_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selection`
--

INSERT INTO `selection` (`selection_id`, `selection_name`, `product_id`) VALUES
(1, 'letter/number', 3),
(2, 'layer', 3),
(3, 'flower group', 3),
(4, 'colorant', 3),
(5, 'name', 3),
(6, 'letter/number', 6),
(7, 'layer', 6),
(8, 'colorant', 2),
(9, 'flower group', 2),
(10, 'colorant', 5),
(11, 'flavor', 8);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `paypal_client_id` varchar(100) NOT NULL,
  `banner_first_img` varchar(100) NOT NULL,
  `banner_first_title` varchar(100) NOT NULL,
  `banner_first_desc` varchar(100) NOT NULL,
  `banner_sec_img` varchar(100) NOT NULL,
  `banner_sec_title` varchar(100) NOT NULL,
  `banner_sec_desc` varchar(100) NOT NULL,
  `banner_third_img` varchar(100) NOT NULL,
  `banner_third_title` varchar(100) NOT NULL,
  `banner_third_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `gcash_num` varchar(15) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `paypal_client_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `mname`, `lname`, `username`, `password`, `delivery_address`, `contact_num`, `gcash_num`, `date_created`, `paypal_client_id`) VALUES
(2, 'Jenny', 'Norbe', 'Pedero', 'jen', '123', 'PUROK LANGKA, Brgy. Caridad, Brgy. Caridad\r\nBrgy. Carida', '09563674950', '09563674950', '2022-05-26 01:24:49', ''),
(5, 'Cedric', 'D', 'Isubol', 'ced', '123', 'PUROK LANGKA, Brgy. Caridad', '09563674950', '09563674950', '2022-06-21 14:01:30', 'AQXlWAWKPcp2V2KkubN7m5jkrU26kNzz-xnvWWNNUPueoNjYhxgwZDeSz5DduAuistosvGC3HIZywgjB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brgy`
--
ALTER TABLE `brgy`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `selection`
--
ALTER TABLE `selection`
  ADD PRIMARY KEY (`selection_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `selection`
--
ALTER TABLE `selection`
  MODIFY `selection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
