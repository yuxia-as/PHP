-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 03:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_bin NOT NULL,
  `beds` varchar(15) COLLATE utf8_bin NOT NULL,
  `bath` varchar(15) COLLATE utf8_bin NOT NULL,
  `size` int(10) NOT NULL,
  `rent` int(10) NOT NULL,
  `address` varchar(100) COLLATE utf8_bin NOT NULL,
  `img_address` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `type`, `beds`, `bath`, `size`, `rent`, `address`, `img_address`, `description`, `user_id`) VALUES
(1, 'Single Family Home', '2 Beds', '2.5 Bath', 1804, 800, '4003 Manor Dr,  Stroudsburg, PA 18360', 'img/h1.jpg', ' Exceptional 5.5 Acre McMichaels Creekfront Home In...', 1),
(2, 'Single Family Home', '3 Beds', '2 Bath', 1293, 845, '2176 N 5th st,Stroudsburg,PA 18360', 'img/h2.jpg', 'Ranch in the heart of the Pocono Mountains, situated in Downtown Stroudsburg. With recently updated kitchen, baths, roof and new flooring throughout. This home offers a covered front porch and great backyard with a covered patio for you to sit back and relax with family and friends.', 1),
(3, 'Single Family Home', '4 Beds', '2 Bath', 1872, 1200, '1427 Route 715,Stroudsburg,PA 18360', 'img/h3.jpg', 'This property is being offered at Public Auction on 02-28-2019. Visit Auction.com now to view additional photos, Property Inspection Report with title information, plat maps and interior inspection reports when available. Auction.com is the nation\'s leading real estate transaction platform focused exclusively on the sale of residential foreclosure and bank-owned properties.', 2),
(4, 'Single Family Home', '3 Beds', '2 Bath', 3005, 1286, '1925 Kyle Dr,Stroudsburg,PA 18360', 'img/h4.jpg', 'Two story colonial style home in East View Estates. Tremendous kitchen with all appliances. Four large bedrooms on the second floor with another in the basement level. Oil heat with 3 zones and central air.', 3),
(5, 'Single Family Home', '3 Beds', '2 Bath', 3120, 1599, '5595 Olde Mill Run,Stroudsburg,PA 18360', 'img/h5.jpg', 'Executive style home,set on secluded wooded lot in lovely neighborhood,circular driveway,solid brick exterior,front covered porch,terrace in back,20 x 40 ft in ground pool.Holiday cooking sized eat in kitchen w/island & SS appliances,formal dining room,living room w/FP & triple bay window, greeting room, study w/FP, Master bedroom suite.', 2),
(6, 'Apartment', '3 Beds', '2.5 Bath', 3568, 1063, '121 Buckfield Ln,Stroudsburg,PA 18360', 'img/h6.jpg', 'This home offers an impressive expansive foyer with spiral oak staircase. The main floor has a formal living room, formal dining room, den, library, and chef\'\'s eat in kitchen. The home offers 4 large and well appointed bedrooms for a spacious yet smart use of space and 4 full baths.', 2),
(7, 'Single Family Home', '4 Beds', '3 Bath', 2678, 1593, '1103 Gap View Holw,Stroudsburg,PA 18360', 'img/h7.jpg', 'Offers all the check marks you are looking for.....Hardwood flooring, fireplace, sunroom, 4 bedrooms, in-law suite, new appliances, freshly paint,2 car garage ,PLUS PLUS PLUS', 3),
(9, 'Single Family Home', '3 Beds', '1.5 Bath', 2560, 1100, '141 Price Dr,Stroudsburg,PA 18360', 'img/h8.jpg', 'FABULOUS EXTENDED BRICK AND VINYL RANCH WITH FULL IN- LAW APARTMENT WALK IN LOWER LEVEL. NEW UPGRADED KITCHEN FEATURING GRANITE COUNTERTOPS AND STAINLESS APPLIANCES. CERAMIC TILE AND HARDWOOD FLOORS. MASSIVE FAMILY ROOM & FORMAL DININGROOM WITH FIREPLACE.', 4),
(10, 'Single Family Home', '3 Beds', '2.5 Bath', 2980, 1265, '1226 Greenwood Rd,Stroudsburg,PA 18360', 'img/h9.jpg', 'The open floor plan encompasses 5 spacious bedrooms with plenty of room for study, sleep and storage, 3 and a half bathrooms, and a stylish gourmet kitchen that flows through to the dining room with fireplace. The expansive living room opens up to a spacious rear four season sun room.', 4),
(12, 'Apartment', '2 Beds', '1 Bath', 1800, 880, '854 Thomas St,Stroudsburg,PA 18360', 'img/h10.jpg', 'This property was recently foreclosed by a bank or financial institution and is now available to purchase online at Auction.com ending 02-21-2019. Visit Auction.com now to view additional photos, Property Inspection Report with title information, plat maps and interior inspection reports when available.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `phone` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Sara', 'sara@gmail.com', '2235684568', 'test123'),
(2, 'John', 'john@gmail.com', '5201342234', 'test123'),
(3, 'Mike', 'mike@gmail.com', '5205689876', 'test123'),
(4, 'Frye', 'frye@gmail.com', '5602537894', 'test123'),
(5, 'Parse', 'parse@gmail.com', '2265635896', 'test345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
