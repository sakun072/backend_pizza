-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2023 at 05:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demopz`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `bid` int(5) NOT NULL,
  `cid` int(5) NOT NULL,
  `amount` int(10) NOT NULL,
  `omid` int(10) NOT NULL,
  `status_send` varchar(255) NOT NULL,
  `new_address` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`bid`, `cid`, `amount`, `omid`, `status_send`, `new_address`, `time`, `email`) VALUES
(27, 2, 1718, 58, 'send', '', '0000-00-00', 'demo@gmail.com'),
(28, 1, 1888, 60, 'send', '', '0000-00-00', 'bou123@gmail.com');

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
  `wallet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `phone`, `address`, `email`, `password`, `wallet`) VALUES
(1, 'bee', 973210644, '', 'bou123@gmail.com', 'abc123', 900),
(2, 'boy', 123456, 'หนองใหญ่', 'demo@gmail.com', '1234', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `name`, `price`, `image`) VALUES
(1, 'หม่าล่าหมูสไลซ์', 200, 'https://cdn.1112.com/1112/public//images/products/pizza/Aug23/102783.png'),
(2, 'ดับเบิ้ลชีสพิซซ่า', 279, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/162216.png'),
(3, 'ดับเบิ้ลเปปเปอโรนี', 279, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/162217.png'),
(4, 'ฮาวายเอี้ยน', 279, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102204.png'),
(5, 'ซีฟู้ดค็อกเทล', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102208.png'),
(6, 'ซุปเปอร์เดอลุกซ์', 379, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102201.png'),
(7, 'กริลล์ฮาวายเอี้ยน', 509, 'https://cdn.1112.com/1112/public//images/products/pizza/Nov2022/199446.png'),
(8, 'สไปซี่ ซุปเปอร์ซีฟู้ด', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102734.png'),
(9, 'ซีฟู้ดเดอลุกซ์', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102228.png'),
(10, 'ค็อกเทลกุ้ง', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102209.png'),
(11, 'ต้มยำกุ้ง', 439, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102212.png'),
(12, 'มีทเดอลุกซ์', 379, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102210.png'),
(13, 'ไก่สามรส', 379, 'https://cdn.1112.com/1112/public//images/products/pizza/Topping/102203.png');

-- --------------------------------------------------------

--
-- Table structure for table `orderamount`
--

CREATE TABLE `orderamount` (
  `fid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `crid` int(10) NOT NULL,
  `oder_price` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status_oder` varchar(255) NOT NULL,
  `omid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderamount`
--

INSERT INTO `orderamount` (`fid`, `sid`, `crid`, `oder_price`, `email`, `status_oder`, `omid`) VALUES
(2, 5, 3, 979, 'bou123@gmail.com', 'no', 46),
(3, 2, 2, 679, 'bou123@gmail.com', 'no', 47),
(5, 4, 1, 839, 'bou123@gmail.com', 'no', 48),
(3, 4, 3, 879, 'bbb123@gmail.com', 'no', 49),
(3, 4, 3, 879, 'bou123@gmail.com', 'no', 50),
(6, 2, 3, 879, 'bou123@gmail.com', 'no', 51),
(3, 4, 3, 879, 'demo@gmail.com', 'no', 52),
(3, 4, 3, 879, 'demo@gmail.com', 'no', 53),
(1, 4, 2, 700, 'bou123@gmail.com', 'no', 54),
(2, 4, 3, 879, 'demo@gmail.com', 'no', 55),
(3, 4, 3, 879, 'demo@gmail.com', 'no', 56),
(3, 4, 2, 779, 'demo@gmail.com', 'no', 57),
(5, 5, 1, 939, 'demo@gmail.com', 'no', 58),
(3, 4, 3, 879, 'bou123@gmail.com', 'no', 59),
(7, 2, 3, 1009, 'bou123@gmail.com', 'no', 60);

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
(1, 'bbb123@gmail.com', '111123');

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
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `crust`
--
ALTER TABLE `crust`
  MODIFY `crid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orderamount`
--
ALTER TABLE `orderamount`
  MODIFY `omid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
