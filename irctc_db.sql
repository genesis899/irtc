-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 07:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irctc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `coach_no` varchar(25) NOT NULL,
  `seat_no` varchar(25) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `phone`, `coach_no`, `seat_no`, `status`, `user_id`, `doctor_id`) VALUES
(3, 'Genesis peter', '8590744865', '08765', '52', 'approved', 6, 13),
(4, 'Genesis peter', '8590744865', '08765', '52', 'rejected', 6, 13),
(5, 'Genesis peter', '8590744865', '08765', '52', 'pending', 6, 13),
(6, 'nimmy11', '9876876456', 'A', 'S1', 'pending', 17, 13);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `fare_id` int(11) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `journey_date` date NOT NULL,
  `tickets` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `seat_number` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `train_id`, `fare_id`, `passenger_name`, `journey_date`, `tickets`, `total_amount`, `booking_date`, `seat_number`, `user_id`) VALUES
(10, 1, 18, 'nimmy', '2025-09-22', 1, 80, '2025-09-22 10:37:15', 'S1', 17),
(13, 1, 8, 'samuel pk', '2026-03-07', 5, 925, '2025-11-12 18:08:33', 'S1,S2,S3,S4,S5', 6),
(15, 4, 150, 'rishal ', '2026-03-07', 2, 220, '2025-11-13 06:12:13', 'S1,S2', 6),
(16, 1, 80, 'Genesis', '2025-11-13', 4, 240, '2025-11-13 06:24:38', 'S1,S2,S3,S4', 6),
(17, 1, 59, 'nimmy', '2025-11-22', 1, 60, '2025-11-13 06:28:47', 'S1', 15);

-- --------------------------------------------------------

--
-- Table structure for table `book_menu`
--

CREATE TABLE `book_menu` (
  `id` int(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(100) NOT NULL,
  `menu_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_menu`
--

INSERT INTO `book_menu` (`id`, `quantity`, `total`, `status`, `user_id`, `menu_id`) VALUES
(20, 10, 240, 'delivered', 6, 8),
(26, 1, 100, 'delivered', 6, 17),
(30, 2, 96, 'delivered', 6, 7),
(31, 6, 288, 'delivered', 6, 7),
(32, 1, 24, 'delivered', 6, 8),
(33, 2, 160, 'delivered', 6, 13),
(34, 5, 650, 'delivered', 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `book_product`
--

CREATE TABLE `book_product` (
  `id` int(11) NOT NULL,
  `quantity` int(30) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_product`
--

INSERT INTO `book_product` (`id`, `quantity`, `total`, `status`, `user_id`, `product_id`) VALUES
(1, 2, 40, 'delivered', 6, 4),
(3, 1, 90, 'delivered', 6, 3),
(4, 1, 20, 'paid', 6, 2),
(7, 1, 20, 'delivered', 6, 2),
(8, 2, 180, 'paid', 6, 3),
(9, 1, 20, 'paid', 6, 2),
(10, 1, 90, 'paid', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_signup`
--

CREATE TABLE `doctor_signup` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_signup`
--

INSERT INTO `doctor_signup` (`id`, `name`, `email`, `phone`, `address`, `image`, `experience`, `availability`, `login_id`) VALUES
(4, 'DR SIBI', 'sibi89@gmail.com', '7012663817', 'qwertyuiopalskfdjfghxbv,c \r\nnchhfbahbqb', '5.jpg', '1-e0237008-15f7-4367-a5ec-7f8ab24bb0fa.pdf', 'available', 13);

-- --------------------------------------------------------

--
-- Table structure for table `fares`
--

CREATE TABLE `fares` (
  `id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `from_station` varchar(100) NOT NULL,
  `to_station` varchar(100) NOT NULL,
  `fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fares`
--

INSERT INTO `fares` (`id`, `train_id`, `from_station`, `to_station`, `fare`) VALUES
(8, 1, 'Thiruvananthapuram', 'Kasaragod', 185),
(9, 1, 'Thiruvananthapuram', 'Kannur', 160),
(10, 1, 'Thiruvananthapuram', 'Thrissur', 105),
(11, 1, 'Thiruvananthapuram', 'Kozhikode', 140),
(12, 1, 'Thiruvananthapuram', 'Palakkad', 130),
(13, 1, 'Thiruvananthapuram', 'Kottayam', 70),
(14, 1, 'Thiruvananthapuram', 'Pathanamthitta', 60),
(15, 1, 'Thiruvananthapuram', 'Alappuzha', 65),
(16, 1, 'Thiruvananthapuram', 'malappuram', 125),
(17, 1, 'Thiruvananthapuram', 'Kollam', 40),
(18, 1, 'Thiruvananthapuram', 'Ernakulam', 80),
(19, 1, 'Kollam', 'Thiruvananthapuram', 40),
(20, 1, 'Kollam', 'Pathanamthitta', 40),
(21, 1, 'Kollam', 'Alappuzha', 45),
(22, 1, 'Kollam', 'Kottayam', 50),
(23, 1, 'Kollam', 'Ernakulam', 65),
(24, 1, 'Kollam', 'Thrissur', 85),
(25, 1, 'Kollam', 'Palakkad', 110),
(26, 1, 'Kollam', 'malappuram', 115),
(27, 1, 'Kollam', 'Kozhikode', 120),
(28, 1, 'Kollam', 'Kannur', 145),
(30, 1, 'Kollam', 'Kasaragod', 165),
(31, 1, 'Pathanamthitta', 'Thiruvananthapuram', 60),
(32, 1, 'Pathanamthitta', 'Kollam', 40),
(33, 1, 'Pathanamthitta', 'Alappuzha', 20),
(34, 1, 'Pathanamthitta', 'Kottayam', 30),
(35, 1, 'Pathanamthitta', 'Ernakulam', 45),
(36, 1, 'Pathanamthitta', 'Thrissur', 70),
(37, 1, 'Pathanamthitta', 'Palakkad', 90),
(38, 1, 'Pathanamthitta', 'malappuram', 95),
(39, 1, 'Pathanamthitta', 'Kozhikode', 105),
(40, 1, 'Pathanamthitta', 'Kannur', 130),
(41, 1, 'Pathanamthitta', 'Kasaragod', 150),
(42, 1, 'Alappuzha', 'Thiruvananthapuram', 65),
(43, 1, 'Alappuzha', 'Kollam', 45),
(44, 1, 'Alappuzha', 'Pathanamthitta', 20),
(45, 1, 'Alappuzha', 'Kottayam', 25),
(46, 1, 'Alappuzha', 'Ernakulam', 35),
(47, 1, 'Alappuzha', 'Thrissur', 60),
(48, 1, 'Alappuzha', 'Palakkad', 80),
(49, 1, 'Alappuzha', 'malappuram', 85),
(50, 1, 'Alappuzha', 'Kozhikode', 95),
(51, 1, 'Alappuzha', 'Kannur', 120),
(53, 1, 'Alappuzha', 'Kasaragod', 145),
(54, 1, 'Kottayam', 'Thiruvananthapuram', 70),
(55, 1, 'Kottayam', 'Kollam', 50),
(56, 1, 'Kottayam', 'Pathanamthitta', 30),
(57, 1, 'Kottayam', 'Alappuzha', 25),
(58, 1, 'Kottayam', 'Ernakulam', 35),
(59, 1, 'Kottayam', 'Thrissur', 60),
(60, 1, 'Kottayam', 'Palakkad', 80),
(61, 1, 'Kottayam', 'malappuram', 85),
(62, 1, 'Kottayam', 'Kozhikode', 95),
(63, 1, 'Kottayam', 'Kannur', 120),
(64, 1, 'Kottayam', 'Kasaragod', 145),
(65, 1, 'Ernakulam', 'Thiruvananthapuram', 80),
(66, 1, 'Ernakulam', 'Kollam', 65),
(67, 1, 'Ernakulam', 'Pathanamthitta', 45),
(68, 1, 'Ernakulam', 'Alappuzha', 35),
(69, 1, 'Ernakulam', 'Kottayam', 40),
(70, 1, 'Ernakulam', 'Thrissur', 45),
(71, 1, 'Ernakulam', 'Palakkad', 65),
(72, 1, 'Ernakulam', 'malappuram', 70),
(73, 1, 'Ernakulam', 'Kozhikode', 75),
(74, 1, 'Ernakulam', 'Kannur', 105),
(75, 1, 'Ernakulam', 'Kasaragod', 130),
(76, 1, 'Thrissur', 'Thiruvananthapuram', 105),
(77, 1, 'Thrissur', 'Kollam', 85),
(78, 1, 'Thrissur', 'Pathanamthitta', 70),
(79, 1, 'Thrissur', 'Alappuzha', 60),
(80, 1, 'Thrissur', 'Kottayam', 60),
(81, 1, 'Thrissur', 'Ernakulam', 45),
(82, 1, 'Thrissur', 'Palakkad', 50),
(83, 1, 'Thrissur', 'malappuram', 55),
(84, 1, 'Thrissur', 'Kozhikode', 60),
(85, 1, 'Thrissur', 'Kannur', 80),
(86, 1, 'Thrissur', 'Kasaragod', 110),
(87, 1, 'Palakkad', 'Thiruvananthapuram', 130),
(88, 1, 'Palakkad', 'Kollam', 110),
(89, 1, 'Palakkad', 'Pathanamthitta', 90),
(91, 1, 'Palakkad', 'Alappuzha', 85),
(92, 1, 'Palakkad', 'Kottayam', 80),
(93, 1, 'Palakkad', 'Ernakulam', 65),
(94, 1, 'Palakkad', 'Thrissur', 50),
(95, 1, 'Palakkad', 'malappuram', 65),
(96, 1, 'Palakkad', 'Kozhikode', 75),
(97, 1, 'Palakkad', 'Kannur', 85),
(98, 1, 'Palakkad', 'Kasaragod', 110),
(99, 1, 'malappuram', 'Thiruvananthapuram', 125),
(100, 1, 'malappuram', 'Kollam', 115),
(101, 1, 'malappuram', 'Pathanamthitta', 95),
(103, 1, 'malappuram', 'Alappuzha', 90),
(104, 1, 'malappuram', 'Kottayam', 85),
(105, 1, 'malappuram', 'Ernakulam', 70),
(106, 1, 'malappuram', 'Thrissur', 55),
(107, 1, 'malappuram', 'Palakkad', 65),
(108, 1, 'malappuram', 'Kozhikode', 30),
(109, 1, 'malappuram', 'Kannur', 60),
(110, 1, 'malappuram', 'Kasaragod', 85),
(111, 1, 'Kozhikode', 'Thiruvananthapuram', 140),
(112, 1, 'Kozhikode', 'Kollam', 120),
(113, 1, 'Kozhikode', 'Pathanamthitta', 105),
(115, 1, 'Kozhikode', 'Alappuzha', 100),
(116, 1, 'Kozhikode', 'Kottayam', 95),
(117, 1, 'Kozhikode', 'Ernakulam', 75),
(118, 1, 'Kozhikode', 'Thrissur', 60),
(120, 1, 'Kozhikode', 'malappuram', 45),
(121, 1, 'Kozhikode', 'Kannur', 50),
(122, 1, 'Kozhikode', 'Kasaragod', 75),
(123, 1, 'Kozhikode', 'Palakkad', 65),
(124, 1, 'Kannur', 'Thiruvananthapuram', 160),
(125, 1, 'Kannur', 'Kollam', 145),
(126, 1, 'Kannur', 'Pathanamthitta', 130),
(128, 1, 'Kannur', 'Kottayam', 120),
(129, 1, 'Kannur', 'Alappuzha', 125),
(130, 1, 'Kannur', 'Ernakulam', 120),
(131, 1, 'Kannur', 'Thrissur', 80),
(132, 1, 'Kannur', 'Palakkad', 85),
(133, 1, 'Kannur', 'malappuram', 60),
(134, 1, 'Kannur', 'Kozhikode', 50),
(135, 1, 'Kannur', 'Kasaragod', 40),
(136, 1, 'Kasaragod', 'Thiruvananthapuram', 185),
(137, 1, 'Kasaragod', 'Kollam', 165),
(138, 1, 'Kasaragod', 'Pathanamthitta', 150),
(139, 1, 'Kasaragod', 'Alappuzha', 145),
(140, 1, 'Kasaragod', 'Kottayam', 145),
(141, 1, 'Kasaragod', 'Ernakulam', 130),
(142, 1, 'Kasaragod', 'Thrissur', 110),
(143, 1, 'Kasaragod', 'Palakkad', 115),
(144, 1, 'Kasaragod', 'malappuram', 85),
(145, 1, 'Kasaragod', 'Kozhikode', 75),
(146, 1, 'Kasaragod', 'Kannur', 40),
(147, 4, 'thrissur', 'eranakulam', 60),
(148, 4, 'thrissur', 'kottyam', 80),
(150, 4, 'thrissur', 'alappuzha', 110),
(151, 4, 'thrissur', 'kollam', 150);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `subject`, `feedback`, `user_id`) VALUES
(1, 'website bug', 'cannot open menu', 6),
(2, 'website bug', 'cannot view products', 6),
(3, 'aa', '', 6),
(4, 'hgfg', 'good', 6);

-- --------------------------------------------------------

--
-- Table structure for table `food_supplier_signup`
--

CREATE TABLE `food_supplier_signup` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_supplier_signup`
--

INSERT INTO `food_supplier_signup` (`id`, `name`, `email`, `phone`, `address`, `login_id`) VALUES
(1, 'Rino', 'rino@gmail.com', '9847432309', 'moonnuthycal(h) Anaprampal N.po Thalavaby', 7),
(2, 'samson cs', 'samson10@gmail.com', '9476385682', 'palliparambil house kurichekkara po thrissur', 14);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user_type`, `user_status`) VALUES
(1, 'admin', 'admin', 'admin', 'approved'),
(6, 'shen', 'shen1234', 'user', 'approved'),
(7, 'rino', 'rino1234', 'food_supplier', 'approved'),
(8, 'jibin123', 'jibin@2005', 'user', 'approved'),
(9, 'ajo', 'ajo1234', 'doctor', 'pending'),
(13, 'sibi', 'sibi1234', 'doctor', 'approved'),
(14, 'samson', 'samson123', 'food_supplier', 'approved'),
(15, 'nimmy', 'nimmy', 'user', 'approved'),
(16, 'aaaa', 'aaa11112', 'user', 'approved'),
(17, 'nimmy11', 'nimmy@321', 'user', 'approved'),
(18, 'rishal', 'rishal99', 'user', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `food_name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `food_name`, `description`, `quantity`, `price`, `image`, `supplier_id`, `status`) VALUES
(5, 'Dosha', 'Break Fast', '4', '40', 'dosha.jpg', 7, 'approved'),
(7, 'IDLY', 'Break Fast', '4', '48', 'idly.jpg', 7, 'approved'),
(8, 'POORI', 'Break Fast', '2', '24', '6679df14b71b2ae10dd0e57c9570e9cb.jpg', 7, 'approved'),
(9, 'Appam', 'Break Fast', '3', '36', 'Appam.jpg', 7, 'approved'),
(10, 'Rice Meal', 'Lunch', '50', '110', 'lunch kerala rice.jpg', 7, 'approved'),
(11, 'Fish Fry', 'Fish fry', '20', '70', 'fish fry1.jpg', 7, 'approved'),
(12, 'Kozhuva Fish Fry', '', '1 plate', '50', 'fish fry2.jpg', 7, 'approved'),
(13, 'Egg Biriyani', 'Lunch/Dinner', '20', '80', 'Egg biriyani.jpg', 7, 'approved'),
(14, 'Vegitable Biriyani', 'Lunch/Dinner', '1', '60', 'veg biriyani.jpg', 7, 'approved'),
(15, 'Chicken Biriyani', 'Lunch/Dinner', '45', '130', 'chicken biriyani.jpg', 7, 'approved'),
(16, 'Vegitable Curry', '', '1 plate', '60', 'vegetable-curry-recipe.jpg', 7, 'approved'),
(17, 'Chicken Curry', '', '1', '100', 'chicken curry.jpg', 7, 'approved'),
(18, 'Egg Curry', '', '1', '70', 'egg curry.jpg', 7, 'approved'),
(19, 'Paneer Butter Masala', '', '1', '90', 'paneer-butter-masala-recipe.jpg', 7, 'approved'),
(20, 'Cahi', 'Morning/evening drings', '1', '10', 'chai.jpg', 7, 'approved'),
(21, 'Coffie', 'Morning/Evening drings', '1', '15', 'coffie.jpg', 7, 'approved'),
(22, 'Vada', 'Snacks', '1', '10', 'Vadas.JPG', 7, 'approved'),
(23, 'Parippu vada', 'Snacks', '1', '10', 'parippu vada.jpg', 7, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `menu_feedback`
--

CREATE TABLE `menu_feedback` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_feedback`
--

INSERT INTO `menu_feedback` (`id`, `subject`, `feedback`, `menu_id`, `user_id`) VALUES
(7, 'good', 'aaa\r\n', 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `description`, `quantity`, `image`, `price`, `login_id`) VALUES
(2, 'Water Bottle', 'Mineral water', '20', 'water bottle.jpg', '20', 1),
(3, 'Sanitary Pads', 'very usefull and comfortable', '19', 'sanitary pads.jpg', '90', 1),
(4, 'Disposable Plate', 'Eco friendly', '20', 'disposable paper plate.jpg', '20', 1),
(7, 'Pen', 'Blue', '20', 'b4ec9a4c-af7f-4997-9c6a-1c78bcc73b5b_1.109a4221acf1566100c4a15ff3c74ef8.jpg', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `email`, `phone`, `address`, `login_id`) VALUES
(5, 'Shen Varghese Bobby', 'shenbobby89@gmail.co', '7012663819', 'moonnuthycal(h) Anaprampal N.po Thalavaby', 6),
(6, 'jibin binu', 'jibinbinu812@gmail.c', '9207506156', 'kinaruvila jibin bhavan cherupoika po cherupoika', 8),
(7, 'nimmy ', 'nimmy@gmail.com', '1234567890', 'qwertyuiopalskfdjfghxbv,c \r\nnchhfbahbqb', 15),
(8, 'GENESIS PETER', 'genesispeter724@gmai', '8590744862', 'PARAMBAN HOUSE KURICHEKKARA PO MATTAMPURAM', 16),
(9, 'nimmy', 'nimmymams@gmail.com', '9876876456', 'marian academy of management studies', 17),
(10, 'Rishal', 'rishal99@gmail.com', '8847568374', 'Anaparambil house', 18);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `train_no` int(100) NOT NULL,
  `from_d` varchar(100) NOT NULL,
  `to_d` varchar(100) NOT NULL,
  `login_id` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `name`, `train_no`, `from_d`, `to_d`, `login_id`, `image`) VALUES
(1, 'Jan Shatabdi Express', 1120, 'Thiruvananthapuram', 'kasaragod', 1, 'OIP.webp'),
(2, 'Vande Bharat Express', 3646, 'Eranakulam', 'kashmir', 1, 'download.webp'),
(4, 'Flix train', 7, 'thrissur', 'kollam', 1, '03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `train_stops`
--

CREATE TABLE `train_stops` (
  `id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `station_name` varchar(100) NOT NULL,
  `stop_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `train_stops`
--

INSERT INTO `train_stops` (`id`, `train_id`, `station_name`, `stop_order`) VALUES
(3, 1, 'Kollam', 2),
(4, 1, 'Ernakulam', 6),
(5, 1, 'Alappuzha', 4),
(6, 1, 'malappuram', 9),
(7, 1, 'Kottayam', 5),
(8, 1, 'Palakkad', 8),
(9, 1, 'Kozhikode', 10),
(10, 1, 'Kannur', 11),
(11, 1, 'Kasaragod', 12),
(12, 1, 'Thrissur', 7),
(13, 1, 'Thiruvananthapuram', 1),
(14, 1, 'Pathanamthitta', 3),
(17, 4, 'thrissur', 1),
(18, 4, 'eranakulam', 2),
(19, 4, 'kottyam', 3),
(20, 4, 'alappuzha', 4),
(21, 4, 'kollam', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_ibfk_1` (`user_id`),
  ADD KEY `bookings_ibfk_2` (`train_id`),
  ADD KEY `bookings_ibfk_3` (`fare_id`);

--
-- Indexes for table `book_menu`
--
ALTER TABLE `book_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_menu_ibfk_1` (`menu_id`),
  ADD KEY `book_menu_ibfk_2` (`user_id`);

--
-- Indexes for table `book_product`
--
ALTER TABLE `book_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_product_ibfk_1` (`user_id`),
  ADD KEY `book_product_ibfk_2` (`product_id`);

--
-- Indexes for table `doctor_signup`
--
ALTER TABLE `doctor_signup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `fares`
--
ALTER TABLE `fares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `food_supplier_signup`
--
ALTER TABLE `food_supplier_signup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `menu_feedback`
--
ALTER TABLE `menu_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_feedback_ibfk_1` (`menu_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `train_stops`
--
ALTER TABLE `train_stops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `train_stops_ibfk_1` (`train_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `book_menu`
--
ALTER TABLE `book_menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `book_product`
--
ALTER TABLE `book_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor_signup`
--
ALTER TABLE `doctor_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fares`
--
ALTER TABLE `fares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_supplier_signup`
--
ALTER TABLE `food_supplier_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu_feedback`
--
ALTER TABLE `menu_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `train_stops`
--
ALTER TABLE `train_stops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`login_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor_signup` (`login_id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`train_id`) REFERENCES `train` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`fare_id`) REFERENCES `fares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_menu`
--
ALTER TABLE `book_menu`
  ADD CONSTRAINT `book_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_menu_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `signup` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_product`
--
ALTER TABLE `book_product`
  ADD CONSTRAINT `book_product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_signup`
--
ALTER TABLE `doctor_signup`
  ADD CONSTRAINT `doctor_signup_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);

--
-- Constraints for table `fares`
--
ALTER TABLE `fares`
  ADD CONSTRAINT `fares_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `train` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`login_id`);

--
-- Constraints for table `food_supplier_signup`
--
ALTER TABLE `food_supplier_signup`
  ADD CONSTRAINT `food_supplier_signup_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `food_supplier_signup` (`login_id`);

--
-- Constraints for table `menu_feedback`
--
ALTER TABLE `menu_feedback`
  ADD CONSTRAINT `menu_feedback_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `book_menu` (`id`),
  ADD CONSTRAINT `menu_feedback_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `signup` (`login_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);

--
-- Constraints for table `signup`
--
ALTER TABLE `signup`
  ADD CONSTRAINT `signup_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `train_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);

--
-- Constraints for table `train_stops`
--
ALTER TABLE `train_stops`
  ADD CONSTRAINT `train_stops_ibfk_1` FOREIGN KEY (`train_id`) REFERENCES `train` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
