-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 08:34 AM
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
-- Database: `demopz2`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `bid` int(5) NOT NULL,
  `cid` int(5) NOT NULL,
  `quantity` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `omid` int(10) NOT NULL,
  `status_send` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`bid`, `cid`, `quantity`, `amount`, `omid`, `status_send`, `address`, `time`, `email`) VALUES
(37, 3, 0, 400, 79, 'nosend', '0', '0000-00-00 00:00:00', 'a@gmail.com'),
(38, 3, 0, 400, 86, 'nosend', '0', '0000-00-00 00:00:00', 'a@gmail.com'),
(39, 3, 0, 1218, 89, 'nosend', '0', '0000-00-00 00:00:00', 'a@gmail.com'),
(43, 3, 0, 639, 111, 'nosend', '', '0000-00-00 00:00:00', 'a@gmail.com'),
(44, 3, 0, 679, 112, 'nosend', '', '0000-00-00 00:00:00', 'a@gmail.com'),
(45, 3, 0, 479, 113, 'nosend', 'asd', '0000-00-00 00:00:00', 'a@gmail.com'),
(46, 3, 0, 679, 114, 'nosend', 'ทดสอบบที่อยู๋ใหม่', '0000-00-00 00:00:00', 'a@gmail.com'),
(47, 3, 0, 639, 116, 'nosend', 'asd', '0000-00-00 00:00:00', 'a@gmail.com'),
(48, 3, 0, 639, 117, 'nosend', 'asd', '2023-10-30 16:51:44', 'a@gmail.com'),
(49, 3, 4, 1118, 118, 'nosend', 'asd', '2023-10-30 17:30:32', 'a@gmail.com'),
(50, 3, 3, 1400, 122, 'send', 'asd', '2023-10-30 18:34:37', 'a@gmail.com'),
(51, 3, 6, 4254, 125, 'nosend', 'asd', '2023-10-30 18:37:29', 'a@gmail.com'),
(52, 3, 1, 739, 126, 'nosend', 'บนถนน ซอย 9', '2023-10-30 18:59:31', 'a@gmail.com'),
(53, 3, 4, 1837, 139, 'nosend', 'asd', '2023-10-30 20:03:44', 'a@gmail.com'),
(54, 4, 4, 1837, 141, 'nosend', '288/87 ลักษณาวะดี', '2023-10-30 20:05:46', 'pee@gmail.com'),
(55, 4, 1, 479, 142, 'send', 'คณะ IT', '2023-10-30 20:10:56', 'pee@gmail.com'),
(56, 3, 2, 958, 145, 'nosend', 'asd', '2023-10-30 21:25:26', 'a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `crust`
--

CREATE TABLE `crust` (
  `crid` int(10) NOT NULL,
  `crust_pizza` varchar(10) NOT NULL,
  `crust_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crust`
--

INSERT INTO `crust` (`crid`, `crust_pizza`, `crust_price`) VALUES
(1, 'บางกรอบ', 100),
(2, 'หนานุ่ม', 200),
(3, 'ขอบซีส', 300);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `wallet` int(10) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `phone`, `address`, `email`, `password`, `wallet`, `level`) VALUES
(1, 'bee', 973210644, '', 'bou123@gmail.com', 'abc123', 900, 'U'),
(2, 'boy', 123456, 'หนองใหญ่', 'demo@gmail.com', '1234', 1000, 'U'),
(3, 'big', 12345, 'asd', 'a@gmail.com', '1', 100, 'U'),
(4, 'pee', 834914905, '288/87 ลักษณาวะดี', 'pee@gmail.com', '123', 1000, 'U'),
(5, 'o', 123456, 'IT', 'bbb123@gmail.com', '2', 10000, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `crid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `ftid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `name`, `price`, `image`, `crid`, `sid`, `ftid`) VALUES
(1, 'หม่าล่าหมูกรอบสไลซ์', 500, 'https://cdn.1112.com/1112/public//images/products/pizza/Aug23/102783.png', 1, 2, 3),
(2, 'ดับเบิ้ลชีสพิซซ่า', 279, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/162216.png', 1, 2, 3),
(3, 'ดับเบิ้ลเปปเปอโรนี', 279, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/162217.png', 1, 2, 3),
(4, 'ฮาวายเอี้ยน', 279, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102204.png', 1, 2, 3),
(5, 'ซีฟู้ดค็อกเทล', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102208.png', 1, 2, 3),
(6, 'ซุปเปอร์เดอลุกซ์', 379, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102201.png', 1, 2, 3),
(7, 'กริลล์ฮาวายเอี้ยน', 509, 'https://cdn.1112.com/1112/public//images/products/pizza/Nov2022/199446.png', 1, 2, 3),
(8, 'สไปซี่ ซุปเปอร์ซีฟู้ด', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102734.png', 1, 2, 3),
(9, 'ซีฟู้ดเดอลุกซ์', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102228.png', 1, 2, 3),
(10, 'ค็อกเทลกุ้ง', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102209.png', 1, 2, 3),
(11, 'ต้มยำกุ้ง', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102212.png', 1, 2, 3),
(12, 'มีทเดอลุกซ์', 379, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102210.png', 1, 2, 3),
(13, 'ไก่สามรส', 379, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102203.png', 1, 2, 3),
(14, 'แฮมเบอร์เกอร์', 80, 'https://www.mcdonalds.com.sg/sites/default/files/2023-02/1200x1200_MOP_BBPilot_Hamburger.png', 4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `foodtype`
--

CREATE TABLE `foodtype` (
  `ftid` int(10) NOT NULL,
  `name` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodtype`
--

INSERT INTO `foodtype` (`ftid`, `name`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderamount`
--

CREATE TABLE `orderamount` (
  `fid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `crid` int(10) NOT NULL,
  `oder_price` int(10) NOT NULL,
  `omid` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bid` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderamount`
--

INSERT INTO `orderamount` (`fid`, `sid`, `crid`, `oder_price`, `omid`, `email`, `bid`, `status`, `quantity`) VALUES
(1, 1, 1, 400, 79, '', 0, '', 0),
(1, 1, 1, 400, 86, '', 0, '', 0),
(4, 1, 1, 479, 88, '', 0, '', 0),
(5, 1, 2, 739, 89, '', 0, '', 0),
(2, 1, 1, 479, 93, '', 0, '', 0),
(5, 4, 2, 939, 94, '', 0, '', 0),
(6, 1, 1, 579, 95, '', 0, '', 0),
(6, 1, 1, 579, 97, '', 0, '', 0),
(6, 2, 1, 679, 99, '', 0, '', 0),
(11, 1, 1, 639, 111, '', 43, '', 0),
(12, 2, 1, 679, 112, '', 44, '', 0),
(4, 1, 1, 479, 113, '', 45, '', 0),
(6, 2, 1, 679, 114, '', 46, '', 0),
(8, 1, 1, 639, 116, '', 47, '', 4),
(5, 1, 1, 639, 117, '', 48, '', 2),
(5, 1, 1, 639, 118, '', 49, '', 2),
(3, 1, 1, 479, 119, '', 49, '', 2),
(1, 1, 1, 800, 121, '', 50, '', 2),
(1, 2, 2, 600, 122, '', 50, '', 1),
(2, 1, 1, 958, 123, '', 51, '', 2),
(4, 2, 3, 779, 124, '', 51, '', 1),
(9, 2, 2, 2517, 125, '', 51, '', 3),
(5, 2, 1, 739, 126, '', 52, '', 1),
(1, 1, 1, 400, 136, 'a@gmail.com', 53, '', 1),
(4, 1, 1, 1437, 139, 'a@gmail.com', 53, '', 3),
(1, 1, 1, 400, 140, 'pee@gmail.com', 54, '', 1),
(2, 1, 1, 1437, 141, 'pee@gmail.com', 54, '', 3),
(2, 1, 1, 479, 142, 'pee@gmail.com', 55, '', 1),
(2, 1, 1, 958, 145, 'a@gmail.com', 56, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `oid` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`oid`, `email`, `password`) VALUES
(1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `sid` int(10) NOT NULL,
  `size_pizza` varchar(10) NOT NULL,
  `size_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sid`, `size_pizza`, `size_price`) VALUES
(1, 'S', 100),
(2, 'M', 200),
(4, 'L', 300),
(5, 'XL', 400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `fk_omid` (`omid`),
  ADD KEY `fk_cid` (`cid`);

--
-- Indexes for table `crust`
--
ALTER TABLE `crust`
  ADD PRIMARY KEY (`crid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `orderamount`
--
ALTER TABLE `orderamount`
  ADD PRIMARY KEY (`omid`),
  ADD KEY `fk_size` (`sid`),
  ADD KEY `fk_crust` (`crid`),
  ADD KEY `fk_food` (`fid`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `crust`
--
ALTER TABLE `crust`
  MODIFY `crid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orderamount`
--
ALTER TABLE `orderamount`
  MODIFY `omid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `oid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `fk_cid` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_omid` FOREIGN KEY (`omid`) REFERENCES `orderamount` (`omid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderamount`
--
ALTER TABLE `orderamount`
  ADD CONSTRAINT `fk_crust` FOREIGN KEY (`crid`) REFERENCES `crust` (`crid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_food` FOREIGN KEY (`fid`) REFERENCES `food` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_size` FOREIGN KEY (`sid`) REFERENCES `size` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
