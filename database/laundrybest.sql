-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 10:51 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `Name`, `Email`, `Username`, `Password`, `Role`) VALUES
(5, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'alfiecasama220', '0c7540eb7e65b553ec1ba6b20de79608', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `Name`, `Email`, `Username`, `Password`, `Role`) VALUES
(1, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'alfiecasama220', '$2y$10$l4ql6wy/urzdxmCdSbZKA.OctWLeUZ.5DoMJQqpk0actcooEeFGMK', ''),
(2, 'Johnrel Pintor', 'johnny2@gmail.com', 'johnny2', '$2y$10$tvS.OjfJJkBlzwaLT7jWY.Wul6wptscn7kT0Ha50JY/rusOsqKRW2', '');

-- --------------------------------------------------------

--
-- Table structure for table `finalorder`
--

CREATE TABLE `finalorder` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ApartmentNum` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `orderTotal` double NOT NULL,
  `orderData` varchar(255) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `productID` varchar(100) NOT NULL,
  `servicesID` varchar(100) NOT NULL,
  `clientID` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finalorder`
--

INSERT INTO `finalorder` (`id`, `Fullname`, `Email`, `Address`, `ApartmentNum`, `message`, `orderTotal`, `orderData`, `paymentMethod`, `quantity`, `productID`, `servicesID`, `clientID`, `status`, `date`) VALUES
(20, 'Johnrel Pintor', 'johnny2@gmail.com', 'Bunao Dumaguete City', '1123', 'This is my laundry', 630, '', 'Cash on delivery', '3', '3', '1,2', 2, 1, '2024-01-05'),
(23, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '1123', 'N/A', 990, '', 'Cash on delivery', '3,2', '2,4', '1,2', 1, 0, '2024-01-04'),
(24, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '123', 'N/A', 3920, '', 'Gcash', '3,2', '2,4', '2', 1, 1, '2024-01-03'),
(25, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '123', 'N/A', 920, '', 'Gcash', '3,2', '2,4', '2', 1, 0, '2024-01-02'),
(26, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '123', 'N/A', 920, '', 'Gcash', '3,2', '2,4', '2', 1, 0, '2024-01-01'),
(27, 'Johnrel Pintor', 'johnny2@gmail.com', 'Bun', 'N/A', 'N/A', 2305, '', 'Gcash', '12', '3', '1,2,3,4', 2, 0, '2024-01-06'),
(28, 'Mark Anthony Ceniza', 'mark2@gmail.com', 'Motong Dumaguete City', 'N/A', 'N/A', 5200, '', 'Gcash', '12', '3', '1,2,3,4', 2, 1, '2024-01-07'),
(29, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', 'N/A', 'N/A', 3200, '', 'Gcash', '12', '3', '1,2,3,4', 2, 1, '2024-01-07'),
(31, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '123', 'N/A', 920, '', 'Gcash', '3,2', '2,4', '2', 1, 1, '2024-01-01'),
(32, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '123', 'N/A', 920, '', 'Gcash', '3,2', '2,4', '2', 1, 1, '2024-01-02'),
(33, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '123', 'N/A', 3920, '', 'Gcash', '3,2', '2,4', '2', 1, 0, '2024-01-03'),
(34, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '1123', 'N/A', 990, '', 'Cash on delivery', '3,2', '2,4', '1,2', 1, 1, '2024-01-04'),
(35, 'Johnrel Pintor', 'johnny2@gmail.com', 'Bunao Dumaguete City', '1123', 'This is my laundry', 630, '', 'Cash on delivery', '3', '3', '1,2', 2, 0, '2024-01-05'),
(36, 'Johnrel Pintor', 'johnny2@gmail.com', 'Bun', 'N/A', 'N/A', 2305, '', 'Gcash', '12', '3', '1,2,3,4', 2, 1, '2024-01-06'),
(37, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '123', 'This is my order', 1170, '', 'Cash on delivery', '3,2,1', '2,4,3', '1,2', 1, 1, '2024-01-09'),
(38, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '11223344', 'This is labhanan', 560, '', 'Gcash', '3', '1', '2', 1, 1, '2024-01-11'),
(39, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '123', 'N/A', 2815, '', 'Cash on delivery', '14', '1', '1,2,3,4,5,6', 1, 1, '2024-01-13'),
(40, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'Bunao Dumaguete City', '11223344', 'This is notes', 2855, '', 'Cash on delivery', '14,1', '1,3', '2,3,6', 1, 1, '2024-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `image`, `productName`, `Description`, `Quantity`, `Category`, `dateAdded`) VALUES
(3, '6348-downy.webp', 'Downy', '\r\nDowny is a brand of fabric softener that is widely recognized for its ability to add a soft and fr', 340, 'Fabric', '2024-01-12 22:49:09'),
(4, '3930-surfpowder.webp', 'Surf', 'Surf is a brand of laundry detergent known for its effective cleaning capabilities and long-standing', 269, 'Powder', '2024-01-12 22:53:28'),
(5, '2278-8a-jpg_029b0_1024x1024.webp', 'Zonrox', 'Zonrox is a brand of household bleach that is commonly used for cleaning and disinfecting purposes. ', 230, 'Bleach', '2024-01-13 15:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `Name`, `Email`, `Username`, `Password`, `Role`) VALUES
(2, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'alfiecasama220', 'e517ba555a3d9df9b253d4db8127aaf1', 'Manager');

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
  `totalNumber` int(11) NOT NULL,
  `optionalMessage` varchar(255) NOT NULL,
  `paymentMethod` int(100) NOT NULL
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
(12, '4421-monday.jpg', 'Monday', 'Bundle', '7 kilos of laundry', 180),
(13, '3171-tuesday.jpg', 'Tuesday', 'Bundle', '7 kilos of laundry', 180),
(14, '1527-wednesday.jpg', 'Wednesday', 'Bundle', '7 kilos of laundry', 180),
(15, '1432-thursday.jpg', 'Thursday', 'Bundle', '7 kilos of laundry', 180),
(16, '2984-friday.jpg', 'Friday', 'Bundle', '7 kilos of laundry', 180),
(17, '5418-saturday.jpg', 'Saturday', 'Bundle', '7 kilos of laundry', 180),
(18, '5193-sunday.jpg', 'Sunday', 'Bundle', '7 kilos of laundry', 180);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `Title`, `Description`, `Status`, `Date`, `Role`) VALUES
(4, 'Alfie&#039;s Report', 'Please debug ang optimized the code, Thank you admin!', 1, '2024-01-16 23:27:06', 'admin'),
(5, 'Ivan&#039;s Report', 'Please create an organize div for client&#039;s UI.', 1, '2024-01-16 23:34:02', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `salestatistics`
--

CREATE TABLE `salestatistics` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total` double NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salestatistics`
--

INSERT INTO `salestatistics` (`id`, `date`, `total`, `status`) VALUES
(177, '2024-01-01', 1840, 0),
(178, '2024-01-02', 1840, 1),
(179, '2024-01-03', 7840, 1),
(180, '2024-01-04', 1980, 0),
(181, '2024-01-05', 1260, 0),
(182, '2024-01-06', 4610, 0),
(183, '2024-01-07', 8400, 1),
(184, '2024-01-09', 1170, 1),
(185, '2024-01-11', 560, 1),
(186, '2024-01-13', 2815, 1),
(187, '2024-01-17', 2855, 1);

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
(1, 'Dryer Add-On', 'Enhance the efficiency of your laundry experience with our Dryer Add-On service. For just 70 pesos,', 70),
(2, 'Light Clothing - Hand Wash', 'Give your delicate fabrics the care they deserve with our Light Clothing Hand Wash service. Priced a', 20),
(3, 'Heavy Clothing - Hand Wash', 'For heavier fabrics that demand special attention, our Heavy Clothing Hand Wash service is the solut', 35),
(4, 'Soap and Downy Add-On', 'Elevate the freshness of your laundry with our optional Soap and Downy Add-On. For just 20 pesos, in', 20),
(5, 'Delivery Service', 'Experience the convenience of our Delivery Service for just 50 pesos. Let us bring your freshly laun', 50),
(6, 'Pick-Up and Delivery Service', 'Opt for the ultimate convenience with our Pick-Up and Delivery Service, priced at 100 pesos. Enjoy a', 100);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `Name`, `Email`, `Username`, `Password`, `Role`) VALUES
(2, 'Alfie John Casama', 'alfiecasama220@gmail.com', 'alfiecasama220', '867d13bfdc3ae19c0cb894c18173cbde', 'Staff');

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
(1, '1,3', '1', '68,69', '2,3,6', 2855, '14,1', 1);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `finalorder`
--
ALTER TABLE `finalorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salestatistics`
--
ALTER TABLE `salestatistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finalorder`
--
ALTER TABLE `finalorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salestatistics`
--
ALTER TABLE `salestatistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
