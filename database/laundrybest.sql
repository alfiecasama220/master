-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 10:21 AM
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
-- Database: `laundrybest`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `Name`, `Email`, `Username`, `Password`) VALUES
(1, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'alfiecasama220', '$2y$10$l4ql6wy/urzdxmCdSbZKA.OctWLeUZ.5DoMJQqpk0actcooEeFGMK'),
(2, 'Johnrel Pintor', 'johnny2@gmail.com', 'johnny2', '$2y$10$tvS.OjfJJkBlzwaLT7jWY.Wul6wptscn7kT0Ha50JY/rusOsqKRW2');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ApartmentNum` varchar(100) NOT NULL,
  `totalNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `Image`, `Title`, `Category`, `Description`, `Price`) VALUES
(1, 'monday.jpg', 'Monday', 'Bundle', '7 kilos of laundry', 180),
(2, 'tuesday.jpg', 'Tuesday', 'Bundle', '7 kilos of laundry', 180),
(3, 'wednesday.jpg', 'Wednesday', 'Bundle', '7 kilos of laundry', 180),
(4, 'thursday.jpg', 'Thursday', 'Bundle', '7 kilos of laundry', 180),
(5, 'friday.jpg', 'Friday', 'Bundle', '7 kilos of laundry', 180),
(6, 'saturday.jpg', 'Saturday', 'Bundle', '7 kilos of laundry', 180),
(7, 'sunday.jpg', 'Sunday', 'Bundle', '7 kilos of laundry', 180);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `Title`, `Description`, `Price`) VALUES
(1, 'Dryer Add-On', 'Enhance the efficiency of your laundry experience with our Dryer Add-On service. For just 70 pesos, ', 70),
(2, 'Light Clothing - Hand Wash', 'Give your delicate fabrics the care they deserve with our Light Clothing Hand Wash service. Priced a', 20),
(3, 'Heavy Clothing - Hand Wash', 'For heavier fabrics that demand special attention, our Heavy Clothing Hand Wash service is the solut', 35),
(4, 'Soap and Downy Add-On', 'Elevate the freshness of your laundry with our optional Soap and Downy Add-On. For just 20 pesos, in', 20),
(5, 'Delivery Service', 'Experience the convenience of our Delivery Service for just 50 pesos. Let us bring your freshly laun', 50),
(6, 'Pick-Up and Delivery Service', 'Opt for the ultimate convenience with our Pick-Up and Delivery Service, priced at 100 pesos. Enjoy a', 100);

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `id` int(11) NOT NULL,
  `productID` varchar(100) NOT NULL,
  `clientID` varchar(100) NOT NULL,
  `transactionID` varchar(100) NOT NULL,
  `servicesID` varchar(100) NOT NULL,
  `total` double NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `isProcessing` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`id`, `productID`, `clientID`, `transactionID`, `servicesID`, `total`, `quantity`, `isProcessing`) VALUES
(130, '3', '1', '63', '1', 720, '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `servicesID` int(11) NOT NULL,
  `total` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `productID`, `clientID`, `servicesID`, `total`, `quantity`, `price`) VALUES
(63, 3, 1, 0, 720, 4, 180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total` (`total`),
  ADD KEY `transactionID` (`transactionID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`),
  ADD KEY `clientID` (`clientID`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
