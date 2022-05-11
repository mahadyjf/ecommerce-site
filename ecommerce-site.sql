-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 02:53 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Mahady Jaman', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_brand`
--

INSERT INTO `tb_brand` (`brandId`, `brandName`) VALUES
(1, 'ACER'),
(2, 'SAMSUNG'),
(3, 'CANON'),
(4, 'NOKIA'),
(5, 'IPHONE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`catId`, `catName`) VALUES
(1, 'Mobile Phones'),
(2, 'Desktop'),
(3, 'Laptop'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Sports &amp; Fitness'),
(7, 'Footwear'),
(8, 'Jewellery'),
(9, 'Clothing'),
(11, 'Home Decor &amp; Kitchen'),
(12, 'Toys, Kids &amp; Babies'),
(13, 'Beauty &amp; Healthcare'),
(14, 'Camera');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'Mahady jaman', 'Feni sadar', 'Feni', 'Bangladesh', '3900', '01843809389', 'mahadyj5@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'karim ullah', 'mouchak', 'Dhaka', 'Bangladesh', '3000', '3243254354353', 'karim@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Hridoy', 'Comilla', 'Comilla', 'Bangladesh', '40000', '05327-543578309', 'hridoy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'customer', 'Las begas', 'Las begas', 'America', '54353', '34354365467', 'customer@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderId` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderId`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(4, 1, 9, 'Lorem Ipsum is simply', 2, 1241.74, 'upload/553e379289.png', '2020-09-09 09:49:48', 1),
(5, 1, 5, 'Lorem Ipsum is simply', 3, 1515.66, 'upload/a30694fa37.png', '2020-09-09 09:49:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'Lorem Ipsum is simply lorem', 4, 2, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit&lt;/span&gt;&lt;/p&gt;', 505.22, 'upload/30d6cf4288.png', 0),
(2, 'Lorem Ipsum', 7, 3, '&lt;p&gt;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .&amp;nbsp;This is a mobile phone ðŸ“± .v&amp;nbsp;This is a mobile phone ðŸ“± .&lt;/p&gt;', 505.22, 'upload/37031ac8c9.jpg', 1),
(3, 'Lorem Ipsum is simply', 2, 1, '&lt;p&gt;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;This is a Desktops .&amp;nbsp;&lt;/p&gt;', 620.87, 'upload/3677b76346.jpg', 1),
(5, 'Lorem Ipsum is simply', 1, 1, '&lt;p&gt;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;mobile phone&amp;nbsp;&lt;/p&gt;', 505.22, 'upload/a30694fa37.png', 0),
(6, 'Lorem Ipsum is simply', 2, 2, '&lt;p&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;/p&gt;', 800.00, 'upload/4984f5b56e.jpg', 0),
(7, 'Lorem Ipsum is simply', 3, 3, '&lt;p&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;/p&gt;', 1200.00, 'upload/d324abc6af.png', 0),
(8, 'Lorem Ipsum', 4, 4, '&lt;p&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;span&gt;Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.&lt;/span&gt;&lt;/p&gt;', 600.00, 'upload/025c20978e.jpg', 0),
(9, 'Lorem Ipsum is simply', 1, 5, '&lt;div style=&quot;color: #f8f8f2; background-color: #272822; font-family: Consolas, \'Courier New\', monospace; font-size: 14px; line-height: 19px; white-space: pre;&quot;&gt;Lorem&amp;nbsp;ipsum&amp;nbsp;dolor&amp;nbsp;sit&amp;nbsp;amet,&amp;nbsp;sed&amp;nbsp;do&amp;nbsp;eiusmod Lorem&amp;nbsp;ipsum&amp;nbsp;dolor&amp;nbsp;sit&amp;nbsp;amet,&amp;nbsp;sed&amp;nbsp;do&amp;nbsp;eiusmod Lorem&amp;nbsp;ipsum&amp;nbsp;dolor&amp;nbsp;sit&amp;nbsp;amet,&amp;nbsp;sed&amp;nbsp;do&amp;nbsp;eiusmod.&lt;/div&gt;\r\n&lt;div style=&quot;color: #f8f8f2; background-color: #272822; font-family: Consolas, \'Courier New\', monospace; font-size: 14px; line-height: 19px; white-space: pre;&quot;&gt;Lorem&amp;nbsp;ipsum&amp;nbsp;dolor&amp;nbsp;sit&amp;nbsp;amet,&amp;nbsp;sed&amp;nbsp;do&amp;nbsp;eiusmod.&lt;/div&gt;', 620.87, 'upload/553e379289.png', 0),
(10, 'Lorem Ipsum is simply lorem', 14, 3, '&lt;p&gt;We make best camera in this world. did you know who we are?&amp;nbsp;&lt;/p&gt;', 1200.00, 'upload/eb842ae118.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
