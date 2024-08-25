-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 11:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `Product`, `product_description`, `product_image`, `price`, `category`) VALUES
(1, 'Instrument 1', 'Instrument 1', '11.jpg', 44.00, 'Garden'),
(2, 'Instrument 12', 'Instrument 12', '12.jpg', 130.00, 'Garden'),
(3, 'Instrument 13', 'Instrument 13', '13.jpg', 164.00, 'Outdoor'),
(4, 'Instrument 14', 'Instrument 14', '14.jpg', 188.00, 'Outdoor'),
(5, 'Instrument 15', 'Instrument 15', '15.jpg', 79.00, 'Garden'),
(6, 'Instrument 15', 'Instrument 15', '15.jpg', 79.00, 'Garden'),
(7, 'Instrument 15', 'Instrument 15', '15.jpg', 79.00, 'Garden');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'FCMP Outdoor IM4000 Dual Chamber Tumbling Composter', 'Corona GT 3244 Extended Reach', 'FCMP Outdoor IM4000 Dual Chamber Tumbling Composter.jpg', 22.00),
(2, 'garden-Batches-card-2', 'garden-Batches-card-2', 'garden-Batches-card-2.jpg', 30.00),
(3, 'Garden Weasel 3-Piece Hand Tools', 'Garden Weasel 3-Piece Hand Tools', 'Garden Weasel 3-Piece Hand Tools.jpg', 10.00),
(4, 'Sun Joe Electric Garden Tiller', 'Sun Joe Electric Garden Tiller', 'Sun Joe Electric Garden Tiller.jpg', 40.00),
(5, 'Wilcox Digging Hoe Tool', 'Wilcox Digging Hoe', 'Wilcox Digging Hoe.jpg', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `breakets`
--

CREATE TABLE `breakets` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breakets`
--

INSERT INTO `breakets` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'Grey Round Hanging Garden Bird Feeder', 'Grey Round Hanging Garden Bird Feeder', 'Grey Round Hanging Garden Bird Feeder.jpg', 38.00),
(2, 'Gold Heart Hanging Garden Candle Holder', 'Gold Heart Hanging Garden Candle Holder', 'Gold Heart Hanging Garden Candle Holder.jpg', 30.00),
(3, 'Grey Ornate Hanging Garden Bird Feeder', 'Grey Ornate Hanging Garden Bird Feeder', 'Grey Ornate Hanging Garden Bird Feeder.jpg', 35.00),
(4, 'Ornate Gold Wall Bracket', 'Ornate Gold Wall Bracket', 'Ornate Gold Wall Bracket.jpg', 30.00),
(5, 'Ornate Scrolled Bracket', 'Ornate Scrolled Bracket', 'Ornate Scrolled Bracket.jpg', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `chemicals`
--

CREATE TABLE `chemicals` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image_filename` varchar(255) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cust_data`
--

CREATE TABLE `cust_data` (
  `ID` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_data`
--

INSERT INTO `cust_data` (`ID`, `Username`, `Email`, `Password`, `Image`) VALUES
(1, 'Ali1', 'alihassanchand32@gmail.com', 'asda', 'AH.jpg'),
(2, 'AliHassan1', 'alihassanchand24@gmail.com', 'hello001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `decoratives_pablles`
--

CREATE TABLE `decoratives_pablles` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decoratives_pablles`
--

INSERT INTO `decoratives_pablles` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, '7LB River Rocks Mexican', '7LB River Rocks Mexican', '7LB River Rocks Mexican.jpg', 7.00),
(2, '500 ct Blue Garden Stones', '500 ct Blue Garden Stones', '500 ct Blue Garden Stones.jpg', 15.00),
(3, 'Ausluru 11LB Smooth', 'Ausluru 11LB Smooth ', 'Ausluru 11LB Smooth.jpg', 5.00),
(4, 'Luminous Stones (Blue)', 'Luminous Stones (Blue)', 'Luminous Stones (Blue).jpg', 18.00),
(5, 'Mat Snow Pebbles', 'Mat Snow Pebbles', 'Mat Snow Pebbles.webp', 5.00),
(6, 'Multi-Colored Rocks 1', 'Multi-Colored Rocks 1', 'Multi-Colored Rocks 1.jpg', 8.00),
(7, 'Pink Glow Stones Pebbles', 'Pink Glow Stones Pebbles', 'Pink Glow Stones Pebbles.jpg', 22.00),
(8, 'plplaaoo Outdoor Luminous Stones', 'plplaaoo Outdoor Luminous Stones', 'plplaaoo Outdoor Luminous Stones.jpg', 16.00);

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `id` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Work` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`id`, `Image`, `Name`, `Work`) VALUES
(2, 'AH.jpg', ' Ali Hassan Chand', 'BackEnd Developer'),
(3, 'Ubaid.jpg', ' Ubaid Soomro', 'FrontEnd Developer'),
(4, 'Muntaha.jpg', 'Muntaha Sheikh', 'FrontEnd Developer'),
(5, 'Ahmed.jpg', ' Ahmed Memon ', 'Flow Chart Maker');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `garden_bricks`
--

CREATE TABLE `garden_bricks` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garden_bricks`
--

INSERT INTO `garden_bricks` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'Burnt Clay Bricks', 'Burnt Clay Bricks per 1 peice', 'Burnt Clay Bricks.webp', 5.00),
(2, 'Concrete Bricks', 'Concrete Bricks', 'Concrete Bricks.webp', 10.00),
(3, 'Engineering Bricksq', 'Engineering Bricks', 'Engineering Bricks.webp', 9.00),
(4, 'Fire Bricks', 'Fire Bricks', 'Fire Bricks.webp', 11.00),
(5, 'Fly Ash Clay Bricks', 'Fly Ash Clay Bricks', 'Fly Ash Clay Bricks.webp', 6.00),
(6, 'Sand Lime Bricks', 'Sand Lime Bricks', 'Sand Lime Bricks.webp', 13.00),
(7, 'Sun-Dried Clay or Mud Bricks', 'Sun-Dried Clay or Mud Bricks', 'Sun-Dried Clay or Mud Bricks.webp', 8.00);

-- --------------------------------------------------------

--
-- Table structure for table `garden_fence`
--

CREATE TABLE `garden_fence` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garden_fence`
--

INSERT INTO `garden_fence` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'Bamboo Picket Rolled Fence', 'Bamboo Picket Rolled Fence', 'Bamboo Picket Rolled Fence.jpg', 30.00),
(2, 'Black Vinyl Iron Fence', 'Black Vinyl Iron Fence', 'Black Vinyl Iron Fence.jpg', 15.00),
(3, 'Border Lawn Picket Fence', 'Border Lawn Picket Fence', 'Border Lawn Picket Fence.jpg', 10.00),
(4, 'Butterfly Design Plastic Fence', 'Butterfly Design Plastic Fence', 'Butterfly Design Plastic Fence.jpg', 30.00),
(5, 'Esschert Iron Fence', 'Esschert Iron Fence', 'Esschert Iron Fence.jpg', 10.00),
(6, 'MGP Natural Reed Fence', 'MGP Natural Reed Fence', 'MGP Natural Reed Fence.jpg', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `garden_outdoor_lights`
--

CREATE TABLE `garden_outdoor_lights` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garden_outdoor_lights`
--

INSERT INTO `garden_outdoor_lights` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(2, 'Garden Solar Lights', 'Garden Solar Lights', 'Garden Solar Lights.webp', 60.00),
(3, 'Garden Wall Light', 'Garden Wall Light', 'Garden Wall Light.webp', 45.00),
(4, 'Led Copper Wire Wate', 'Led Copper Wire Wate', 'Led Copper Wire Wate.jpg', 60.00),
(5, 'Plastic Garden Led', 'Plastic Garden Led', 'Plastic Garden Led.jpg', 55.00),
(6, 'Spike Lamps with RGB', 'Spike Lamps with RGB', 'Spike Lamps with RGB.jpg', 47.00);

-- --------------------------------------------------------

--
-- Table structure for table `garden_toys`
--

CREATE TABLE `garden_toys` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garden_toys`
--

INSERT INTO `garden_toys` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'Aubllo Owl Headlamp', '', 'Aubllo Owl Headlamp.webp', 14.00),
(2, 'Crayola Washable Chalk', 'Crayola Washable Chalk', 'Crayola Washable Chalk.webp', 23.00),
(3, 'Plasma Car', 'Plasma Car', 'Plasma Car.webp', 14.00),
(4, 'Little Tikes Toy', 'Little Tikes Toy', 'Little Tikes Toy.webp', 17.00),
(5, 'Minnidip Blushing pool', 'Minnidip Blushing pool', 'Minnidip Blushing pool.webp', 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `instagram`
--

CREATE TABLE `instagram` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instagram`
--

INSERT INTO `instagram` (`id`, `Product`, `product_image`) VALUES
(1, 'Instagram 1', 'I1 (1).jpg'),
(2, 'Instagram 2', 'I1 (2).jpg'),
(3, 'Instagram 3', 'I1 (3).jpg'),
(4, 'Instagram 4', 'I1 (4).jpg'),
(5, 'Instagram 5', 'I1 (5).jpg'),
(6, 'Instagram 1', 'I1 (6).jpg'),
(7, 'Instagram 1', 'I1 (7).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesticides`
--

CREATE TABLE `pesticides` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesticides`
--

INSERT INTO `pesticides` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'Acelan Pesticides', 'Acelan', 'Acelan.jpeg', 10.00),
(2, 'Adama Pesticides', 'Adama', 'Adama.jpg', 8.00),
(3, 'Atabron Pesticides', 'Atabron', 'Atabron.jpeg', 14.00),
(4, 'Miticide Pesticides', 'Miticide', 'Miticide.jpg', 3.00),
(5, 'Virus-G', 'Virus-G', 'Virus-G.jpg', 16.00);

-- --------------------------------------------------------

--
-- Table structure for table `plantnest`
--

CREATE TABLE `plantnest` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` int(11) NOT NULL,
  `Product_Descriiption` int(11) NOT NULL,
  `Product_Category` int(11) NOT NULL,
  `Product_Image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'Sample Product', 'This is a sample product description.', '1.jpg', 99.99),
(2, 'Aloe vera - herbal', 'Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul...', '2.jpg', 29.49),
(3, 'Herbal Green', 'this is an eample discrption of the plant with eample price and name', '3.jpg', 39.00),
(4, 'Aloe vera ', 'eample', '4.jpg', 50.00),
(5, 'NightPlant', 'day plant', '5.jpg', 20.00),
(6, 'OutdoorPlant', 'day plant', '6.jpg', 20.00),
(7, 'InteriorPlant', 'day plant', '7.jpg', 20.00),
(8, 'Indoor Plant', 'day plant', '8.jpg', 20.00),
(9, 'Factory Plant', 'day plant', '9.jpg', 20.00),
(10, 'Cactus Plant', 'Cactusplant', '10.jpg', 20.00),
(11, 'Instrument 1', 'Instrument 1', '11.jpg', 90.00),
(12, 'Plant Nest Logo', NULL, 'Web capture_11-8-2023_124152_looka.com.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `railings`
--

CREATE TABLE `railings` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `railings`
--

INSERT INTO `railings` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, '2ft Brackets', '2ft Brackets', '2ft Brackets.jpg', 188.00),
(2, '6ft Aluminium Railing', '6ft Aluminium Railing', '6ft Aluminium Railing.jpg', 188.00),
(3, 'Backyard fence railling', 'Backyard fence railling', 'Backyard fence railling.jpg', 123.00),
(4, 'Wave Wooden Railling', 'Wave Wooden Railling', 'Wave Wooden Railling.webp', 175.00),
(5, 'Garden Gate Railings', 'Garden Gate Railings', 'Garden Gate Railings.jpg', 103.00),
(6, 'Wooden Garden Railling', 'Wooden Garden Railling', 'Wooden Garden Railling.jpg', 64.00),
(7, 'Large Wooden Railling Borders', 'Large Wooden Railling Borders', 'Large Wooden Railling Borders.jpg', 245.00),
(8, 'Senetary Residential Panel', 'Senetary Residential Panel', 'Senetary Residential Panel.jpg', 99.00),
(9, 'DIY Ralling', 'DIY Ralling', 'DIY Ralling.webp', 46.00),
(10, 'Garden Stairs Railing', 'Garden Stairs Railing', 'Garden Stairs Railling.jpeg', 190.00),
(11, 'Small Garden Railling', 'Small Garden Railling', 'Small Garden Railling.jpg', 70.00),
(12, 'Trex Signature Railing', 'Trex Signature Horizontal Railing', 'Trex Signature Horizontal Railing.jpg', 110.00),
(13, 'Garden Fence Gate Railling', 'Garden Fence Gate Railling', 'Garden Fence Gate Railling.jpeg', 35.00);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `review` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `Name`, `Status`, `review`) VALUES
(1, 'AliHassan Chand', 'Back End Developer', 'Great Website'),
(3, 'Muntaha Sheikh', 'FrontEnd Developer', 'Awesome Editings'),
(12, 'Syed Huzaifa', 'Teacher', 'Looking Fabulous'),
(17, 'Syed Huzaifa', 'Teacher', 'Looking Fabulous'),
(18, 'Syed Huzaifa', 'Teacher', 'Looking Fabulous'),
(19, 'Syed Huzaifa', 'Teacher', 'Looking Fabulous');

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

CREATE TABLE `seeds` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'asian garden 14 pack', 'asian garden 14 pack', 'asian garden 14 pack.jpeg', 33.00),
(2, 'Assorted Seeds', 'Assorted Seeds', 'assorted seeds.jpg', 20.00),
(3, 'Carrot Jeantte Organic Seeds', 'Carrot Jeantte Organic Seeds', 'carrot.webp', 16.00),
(4, 'Finland SPrayer Purple', 'Finland SPrayer Purple', 'Finland SPrayer Purple.webp', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `soil_and_set`
--

CREATE TABLE `soil_and_set` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spray_bottle`
--

CREATE TABLE `spray_bottle` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spray_bottle`
--

INSERT INTO `spray_bottle` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'Forugo Sprayer', 'Forugo Sprayer', 'Forugo Sprayer.jpg', 5.00),
(2, 'Gareden Handheld Sprayer', 'Gareden Handheld Sprayer', 'Gareden Handheld Sprayer.webp', 27.00),
(3, 'Dada Sorayer', 'Dada Sorayer', 'Dada Sorayer.png', 10.00),
(4, 'seesa International', 'seesa International', 'seesa International.jpg', 9.00);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `Image` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Work` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `Image` varchar(355) DEFAULT NULL,
  `joined` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `verification_code`, `email_verified_at`, `Image`, `joined`) VALUES
(1, 'AliHassan Chand', 'alihassanchand32@gmail.com', 'hello001', '971393', '2023-07-20 07:33:24', 'developer.jpg', '2023-07-23 00:00:00'),
(2, 'Ali', 'alihassanchand24@gmail.com', 'zzzaa786', '255695', '2023-07-26 10:25:59', '1920 London.jpg', '2023-07-23 00:00:00'),
(3, 'Hassan', 'alihassanchand24@gmail.com', 'hello123', '325679', '2023-07-26 10:30:08', 'img.png', '2023-07-23 00:00:00'),
(5, 'Ali Hassan', 'alihassanchand32@gmail.com', '', '320197', NULL, 'Designer.jpg', '2023-07-23 00:00:00'),
(7, 'Ali Hassan', 'alihassanchand32@gmail.com', '', '239493', '2023-08-13 11:41:51', 'AH.jpg', NULL),
(8, 'AliHassan Chand', 'alihassanchand32@gmail.com', '', '224427', '2023-08-13 11:44:53', 'AH.jpg', NULL),
(9, 'AliHassan Chand', 'alihassanchand32@gmail.com', '', '206880', '2023-08-13 11:46:55', 'AH.jpg', NULL),
(10, 'AliHassan Chand', 'alihassanchand32@gmail.com', '', '300688', '2023-08-13 11:51:37', 'AH.jpg', NULL),
(11, 'AliHassan Chand', 'alihassanchand32@gmail.com', '', '102136', NULL, 'AH.jpg', NULL),
(12, 'AliHassan aaaa', 'alihassanchand32@gmail.com', 'hello001', '264953', '2023-08-13 11:58:46', 'AH.jpg', NULL),
(0, 'Muntaha Sheikh', 'muntahasheikh011@gmail.com', 'aptech123', '196181', '2023-08-13 12:29:45', 'Muntaha.jpg', NULL),
(0, 'Muntaha Sheikh', 'muntahasheikh011@gmail.com', '', '128840', NULL, 'Muntaha.jpg', NULL),
(0, 'Muntaha Sheikh', 'muntahasheikh011@gmail.com', '', '208689', NULL, 'Muntaha.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wheel_barrow`
--

CREATE TABLE `wheel_barrow` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wheel_barrow`
--

INSERT INTO `wheel_barrow` (`id`, `Product`, `product_description`, `product_image`, `price`) VALUES
(1, 'Home Depot Wheel Barrow', 'Home Depot Wheel Barrow', 'Home Depot Wheel Barrow.webp', 37.00),
(2, 'Tradesman Wheel Barrow', 'Tradesman Wheel Barrow', 'Tradesman Wheel Barrow.jpeg', 78.00),
(3, 'wheel barrow', 'wheel barrow', 'AWBS WHEEL Barrow.jpg', 60.00),
(4, 'wheel barrow', 'wheel barrow', 'AWBS WHEEL Barrow.jpg', 60.00),
(5, 'Kids Wheel Barrow', 'Topwell Kids Wheel Barrow', 'Topwell Kids Wheel Barrow.jpeg', 20.00),
(6, 'Red Kids Wheel Barrow', 'Red Kids Wheel Barrow', 'Rolly Red Wheel Barrow.jpeg', 27.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breakets`
--
ALTER TABLE `breakets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemicals`
--
ALTER TABLE `chemicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust_data`
--
ALTER TABLE `cust_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `decoratives_pablles`
--
ALTER TABLE `decoratives_pablles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garden_bricks`
--
ALTER TABLE `garden_bricks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garden_fence`
--
ALTER TABLE `garden_fence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garden_outdoor_lights`
--
ALTER TABLE `garden_outdoor_lights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garden_toys`
--
ALTER TABLE `garden_toys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram`
--
ALTER TABLE `instagram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesticides`
--
ALTER TABLE `pesticides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plantnest`
--
ALTER TABLE `plantnest`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `railings`
--
ALTER TABLE `railings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seeds`
--
ALTER TABLE `seeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soil_and_set`
--
ALTER TABLE `soil_and_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spray_bottle`
--
ALTER TABLE `spray_bottle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wheel_barrow`
--
ALTER TABLE `wheel_barrow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `breakets`
--
ALTER TABLE `breakets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chemicals`
--
ALTER TABLE `chemicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cust_data`
--
ALTER TABLE `cust_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `decoratives_pablles`
--
ALTER TABLE `decoratives_pablles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `garden_bricks`
--
ALTER TABLE `garden_bricks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `garden_fence`
--
ALTER TABLE `garden_fence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `garden_outdoor_lights`
--
ALTER TABLE `garden_outdoor_lights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `garden_toys`
--
ALTER TABLE `garden_toys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instagram`
--
ALTER TABLE `instagram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesticides`
--
ALTER TABLE `pesticides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plantnest`
--
ALTER TABLE `plantnest`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `railings`
--
ALTER TABLE `railings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soil_and_set`
--
ALTER TABLE `soil_and_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spray_bottle`
--
ALTER TABLE `spray_bottle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wheel_barrow`
--
ALTER TABLE `wheel_barrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
