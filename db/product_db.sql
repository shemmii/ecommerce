-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 06:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `product_id`, `order_name`, `order_quantity`, `order_price`, `total`) VALUES
(125, 27, 85, 'Square Up', 1, 1200, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactnumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fullname`, `email`, `address`, `contactnumber`) VALUES
(27, 'Gweneth Bumanglag', 'gweneth@gmail.com', 'las pinas', '0915666666');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `customer_id`, `username`, `password`, `user_type`) VALUES
(1, 3, 'shemaiah', '6c0c1de7d1c6ed38a959a8146ecdf3c6d2145565', 'admin'),
(17, 27, 'gwen', '585e3e2946cc65c5c94a8522a18910430aeec20d', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(255) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `customer_id`, `product_id`, `order_quantity`, `total`) VALUES
('624324a3', 19, 85, 1, '1200'),
('6243c687', 19, 92, 1, '1500'),
('6776e0a4', 19, 85, 1, '1200'),
('6778ce8e', 19, 92, 1, '1500'),
('ddf0788d', 19, 85, 5, '6000'),
('ddf09e38', 19, 92, 1, '1500'),
('03327a5c', 19, 85, 5, '6000'),
('0333f88f', 19, 92, 9, '10800'),
('d6a86742', 19, 94, 5, '1160'),
('e524a5db', 19, 89, 8, '12000'),
('e524f992', 19, 90, 1, '1200'),
('89e9ffa7', 18, 89, 1, '1500'),
('e579487b', 18, 91, 8, '12000'),
('cf8096d8', 18, 88, 1, '1500'),
('cf817cdd', 18, 87, 1, '1500'),
('cf8180cb', 19, 91, 55, '82500'),
('377d5acd', 22, 85, 1, '1200'),
('c2413df9', 22, 89, 1, '1500'),
('c244efa1', 22, 85, 1, '1200'),
('c244f0c6', 22, 87, 1, '1500'),
('2313c225', 22, 89, 1, '1500'),
('23176ccb', 23, 93, 1, '1200'),
('231804be', 23, 93, 1, '1200'),
('231805f9', 23, 88, 1, '1500'),
('0a2bc43a', 23, 85, 1, '1200'),
('0a3531b1', 23, 89, 1, '1500'),
('0a3534b1', 23, 90, 1, '1200'),
('b2b92d50', 23, 91, 1, '1500'),
('d263f6e3', 23, 94, 1, '232'),
('d2674793', 23, 94, 1, '232'),
('da33b99f', 23, 93, 1, '1200'),
('e832943c', 23, 93, 5, '6000'),
('9486a6a5', 23, 85, 1, '1200'),
('9486d2c8', 23, 91, 1, '1500'),
('9486d4bf', 25, 85, 8, '9600'),
('9486d66a', 25, 87, 1, '1500'),
('52500374', 19, 90, 5, '6000'),
('c40403db', 19, 87, 5, '7500'),
('ccf84bab', 19, 90, 5, '6000'),
('f0a6cb2a', 19, 90, 1, '1200'),
('f0a77d44', 19, 90, 5, '6000'),
('e9b3b353', 19, 90, 10, '12000'),
('c05b2b90', 19, 90, 1, '1200'),
('cc644269', 19, 85, 1, '1200'),
('ea75dd3b', 19, 88, 1, '1500'),
('f0aa2fd4', 19, 91, 1, '1500'),
('f6aaab9e', 19, 87, 1, '1500'),
('107d5caa', 19, 90, 1, '1200'),
('3a499e11', 19, 94, 1, '232'),
('43e1857a', 19, 87, 1, '1500'),
('4fa3127e', 19, 93, 1, '1200'),
('636a8233', 19, 93, 1, '1200'),
('93e7b6f8', 19, 89, 1, '1500'),
('09db664e', 19, 88, 1, '1500'),
('09dc19a1', 19, 88, 1, '1500'),
('09dc1ad9', 19, 85, 1, '1200'),
('09dc1e8b', 19, 85, 1, '1200'),
('aaa7c761', 19, 85, 8, '9600'),
('aaa7ec47', 19, 93, 1, '1200'),
('aaa7ecfc', 21, 93, 1, '1200'),
('b5638f63', 21, 91, 1, '1500'),
('11204587', 21, 90, 5, '6000'),
('70834e56', 21, 88, 1, '1500'),
('d980711f', 21, 85, 3, '3600'),
('d7832611', 21, 92, 6, '9000'),
('6707af91', 21, 88, 1, '1500'),
('670868da', 27, 85, 1, '1200'),
('67086d30', 27, 91, 1, '1500'),
('c7c2c569', 27, 90, 4, '4800');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(50) NOT NULL,
  `quantity` int(255) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `code` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `name`, `price`, `quantity`, `description`, `image`, `code`) VALUES
(85, 'Album', 'Square Up', 1200, 2991, 'Square Up is the first Korean mini-album by BLACKPINK. It is available in two versions and contains 4 tracks, with \"Ddu-Du Ddu-Du\" and \"Forever Young\" serving as the album\'s double title tracks. \"Square Up\", which means \"stick together\" and \"prepare to fight\", has a message of \"let\'s stand up to the challenge\", exploring a mature concept. The album was released digitally on June 15, 2018, and physically on June 20, 2018.', '3799577.jpg', 1),
(87, 'Album', 'Square two', 1500, 2986, 'Square Two is the second digital single album by South Korean girl group BLACKPINK. It was released on November 1, 2016 by YG Entertainment and distributed by KT Music. The single has a double A-side, \"Playing with Fire\" and \"Stay\", and bonus track \"Whistle (Acoustic Ver.)\". The lyrics were written by Teddy and the music was composed by Teddy, R.Tee and Seo Won Jin.', '1444332.jpg', 2),
(88, 'Album', 'Square One', 1500, 2981, 'Square One is the debut digital single album by BLACKPINK. It was released on August 8, 2016 by YG Entertainment and distributed by KT Music. The single has a double A-side, \"Whistle\" and \"Boombayah\". The lyrics were written by Teddy, Bekuh Boom and B.I from iKON and the music was composed by Teddy, Future Bounce and Bekuh Boom. To promote the single, BLACKPINK performed both songs on the South Korea music program, SBS\'s Inkigayo on August 14, 2016.', '9033543.jpg', 3),
(89, 'Album', 'Kill This Love', 1500, 2936, '\"Kill This Love\" is a single released by South Korean girl group BLACKPINK. It is the first and title track in the group\'s second mini-album Kill This Love under the same name. The single and its music video was released on April 5, 2019 at 12am KST.', '3059828.png', 4),
(90, 'Jacket ', 'Hoodie (treasure)', 1200, 300, 'treasure  treasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasuretreasure', '6095479.png', 5),
(91, 'Hat', 'Itzy Hat', 1500, 2991, 'itzy official merch itzy official merch itzy official merch itzy official merch', '5423907.png', 6),
(92, 'T-shirt', 'Exo shirt', 1500, 2991, ' exo official merch exo official merch exo official merch exo official merch', '7203414.png', 7),
(93, 'Lightsstick', 'twice lightstick', 1200, 300, ' twice official lightsticktwice official lightsticktwice official lightsticktwice official lightstick', '1278844.png', 8),
(94, 'Bag', 'treasure bag', 232, 3000, 'treasure official merch  treasure official merch  treasure official merch  treasure official merch ', '2096863.png', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_ibfk_1` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_tbl_ibfk_1` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
