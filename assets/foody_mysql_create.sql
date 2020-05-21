-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 01:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foody`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(3) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `foodCategory` int(3) NOT NULL,
  `stock` int(25) NOT NULL,
  `photoLink` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `rating` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodName`, `foodCategory`, `stock`, `photoLink`, `desc`, `price`, `rating`) VALUES
(1, 'Mushroom Soup', 1, 8, 'Creamy-Garlic-Mushroom-Soup-spoon.jpg', 'Creamy mushroom soup that will warm your body', 40000, 0),
(2, 'Chicken Soup', 1, 18, 'soup.jpg', 'Creamy and cheesy chicken soup that will warm your body', 45000, 0),
(3, 'Seasoned Fries', 1, 20, 'frozenfrenchfries14.jpg', 'Seasoned with our specialty herbs and with your choice of dipping sauce', 40000, 0),
(4, 'Potato Wedges', 1, 15, 'crispy-garlic-potato-wedges-6.jpg', 'Crisp on the outside, tender on the inside. This potato wedges will be served with our specialty ranch dressing on the side', 45000, 0),
(5, 'Calamari Rings', 1, 15, 'Flourless-Truly-Crispy-Calamari-Rings-In-The-Air-Fryer.jpg', 'Rings of squid coated in a super crispy, crunchy shell', 48000, 0),
(6, 'Tenderloin Steak', 2, 20, '045813900_1489071066-sirloin.jpg', 'Thick, hearty, juicy steak cooked according to your liking', 300000, 0),
(7, 'Spaghetti Carbonara', 2, 20, 'recipe-image-legacy-id--1001491_11.jpg', 'Creamy pasta cooked to al dente', 70000, 0),
(8, 'Chicken Cordon Bleu', 2, 15, 'Chicken-Cordon-Bleu_2.jpg', 'Fried to golden brown, this chicken dish will melt in your mouth', 75000, 0),
(9, 'Fish and Chips', 2, 23, 'Resep-Fish-chips.jpg', 'You can never go wrong with classic fish and chip', 75000, 0),
(10, 'Club Burger', 2, 10, 'clubborgar.jpg', 'Big burger with layers of bacon, cheese, and all the goodness with fries as the side', 160000,0),
(11, 'Chicken Steak', 2, 20, '8fd1e8e3-bda8-4c8d-9fc3-148cf2d1eb19.jpg', 'Delicious and thickly cut chicken steak', 120000,0),
(12, 'Chocolate Lava Cake', 3, 20, 'IMG_6207-chocolate-molten-lava-cakes-recipe-square.jpg', 'Chocolate goodness that will melt in your mouth', 40000, 0),
(13, 'Gelato Ice Cream', 3, 20, '76389-es-krim-neapolitan-shutterstock.jpg', 'Italian style ice cream (Chocolate, Strawberry, Vanilla flavor)', 35000, 0),
(14, 'Panna Cotta', 3, 21, 'panna-cotta-620.jpg', 'Soft and creamy panna cotta, topped with berries and sauce',40000,0),
(15, '3pc Macaroon', 3, 20, 'macaroon.jpg', '3 pieces of sweet goodness (Flavor: Lemon, Strawberry, Grape, Chocolate, Oreo)',36000,0),
(16, 'Banana Split', 3, 18, 'Banana+Split.jpg', 'Classic banana split dessert with our renowed gelato. Share with your friends!', 70000,0),
(17, 'Lemonade', 4, 20, '2586d951-a46a-4091-aec6-eca3adefb409.jpg', 'Refreshing lemonade, perfect for summer!', 28000, 0),
(18, 'Americano', 4, 15, 'hot-americano.jpg', 'Hot/Cold version available', 25000,0),
(19, 'Cappuccino', 4, 20, '1280px-Cappuccino.jpg', 'Hot/Cold version available', 35000,0),
(20, 'Oreo Shake', 4, 25, 'oreoshake.png', 'Blended oreo milkshake. Sweet and rich', 40000,0 ),
(21, 'Lemon Tea', 4, 20, 'freshlemontea.jpg','Fresh lemon tea. Hot/Cold available', 30000, 0);
-- --------------------------------------------------------

--
-- Table structure for table `foodcategory`
--

CREATE TABLE `foodcategory` (
  `categoryID` int(3) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodcategory`
--

INSERT INTO `foodcategory` (`categoryID`, `categoryName`) VALUES
(1, 'Appetizer'),
(2, 'Main Course'),
(3, 'Dessert'),
(4, 'Beverage');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(3) NOT NULL,
  `payment` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `payment`) VALUES
(1, 'Cash'),
(2, 'Debit'),
(3, 'Credit');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transID` int(3) NOT NULL,
  `custID` int(3) NOT NULL,
  `orderDate` date NOT NULL,
  `paymentType` int(3) DEFAULT NULL,
  `total` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deliveryAddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `transactiondetail`
--

CREATE TABLE `transactiondetail` (
  `transID` int(3) NOT NULL,
  `foodID` int(3) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `custID` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `displayName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `profileLink` varchar(255) DEFAULT 'default.png',
  `role` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`custID`, `email`, `displayName`, `password`, `birthDate`, `profileLink`, `role`) VALUES
(1, 'uwu@gmail.com', 'joy', '$2y$10$2no4qZ0IQk6K8DC80e7FhOGZwlroFdHnDEH518fuSQQ/2N/XBLrCK', '1999-12-15', 'default.png', 'user'),
(2, 'admin@gmail.com', 'admin', '$2y$10$BBBJnSsYAuL3BUiE8zWl2uCu0ZkyQluq8HahuZpsB6YZGgbt3ZBGe', '2020-05-11', 'default.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`),
  ADD KEY `Food_fk0` (`foodCategory`);

--
-- Indexes for table `foodcategory`
--
ALTER TABLE `foodcategory`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transID`),
  ADD KEY `Transaction_fk0` (`custID`),
  ADD KEY `Transaction_fk1` (`paymentType`);

--
-- Indexes for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD KEY `Transaction Detail_fk0` (`transID`),
  ADD KEY `Transaction Detail_fk1` (`foodID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`custID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `foodcategory`
--
ALTER TABLE `foodcategory`
  MODIFY `categoryID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `custID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `Food_fk0` FOREIGN KEY (`foodCategory`) REFERENCES `foodcategory` (`categoryID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `Transaction_fk0` FOREIGN KEY (`custID`) REFERENCES `user` (`custID`),
  ADD CONSTRAINT `Transaction_fk1` FOREIGN KEY (`paymentType`) REFERENCES `payment` (`paymentID`);

--
-- Constraints for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD CONSTRAINT `Transaction Detail_fk0` FOREIGN KEY (`transID`) REFERENCES `transaction` (`transID`),
  ADD CONSTRAINT `Transaction Detail_fk1` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
