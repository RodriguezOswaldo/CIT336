-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2019 at 02:55 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Category classifications of inventory items';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Cannon'),
(2, 'Explosive'),
(3, 'Misc'),
(4, 'Rocket'),
(5, 'Trap'),
(6, 'Holes');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientid` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientid`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comments`) VALUES
(19, 'arthur', 'owen', 'arthur@owen.com', '$2y$10$XdRnoU6tmPByAiieitgxjOckVUAMGjvMX5p/LNEkGd1A0r/GxPkLa', '3', NULL),
(20, 'Admin', 'User', 'admin@cit336.net', '$2y$10$Mhney80kGO5kuEYISmV8XObDbRHM7g.toDy4LTICci5oRSMT80JkO', '3', NULL),
(21, 'Oswaldo', 'Rodriguez', 'Own@rodriguez.com', '$2y$10$niwg8FeMe2oWSZLCsY2sFOrX01yhO5JqVWCwYIH43g.cOu2ckYtF2', '1', NULL),
(22, 'luis', 'carlos', 'luis@carlos.com', '$2y$10$IC/rQvsWO9spAft8KkDEC./qgqkblkAMQtBaoPhA9Kmu5PGlo2YK.', '1', NULL),
(23, 'theman', 'theman', 'the@man.com', '$2y$10$9lzqZh7gJLCH0sSzv5Drwuj8LCdvFhfI9sucJgxdgu/Und6B6xG.e', '1', NULL),
(24, 'givennam', 'given', 'give@ver.com', '$2y$10$soRhD3PalPIG.0FflHeK5OkgXWGXhnmKE/eaVhBDcOvqONAbP1WVe', '1', NULL),
(25, 'Own', 'Rodriguez', 'Own@Own.com', '$2y$10$es1OgpPUYuDJGQ97TatWdO9e1y92QYFwocYjRZFM1YQjsDrCugy5e', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) NOT NULL,
  `imgPath` varchar(150) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`) VALUES
(39, 1, 'rocket.png', '/dashboard/acme/images/products/rocket.png', '2019-11-30 03:08:44'),
(40, 1, 'rocket-tn.png', '/dashboard/acme/images/products/rocket-tn.png', '2019-11-30 03:08:44'),
(41, 8, 'anvil.png', '/dashboard/acme/images/products/anvil.png', '2019-11-30 03:10:50'),
(42, 8, 'anvil-tn.png', '/dashboard/acme/images/products/anvil-tn.png', '2019-11-30 03:10:50'),
(43, 3, 'catapult.png', '/dashboard/acme/images/products/catapult.png', '2019-11-30 03:11:23'),
(44, 3, 'catapult-tn.png', '/dashboard/acme/images/products/catapult-tn.png', '2019-11-30 03:11:23'),
(45, 15, 'rope.jpg', '/dashboard/acme/images/products/rope.jpg', '2019-11-30 03:11:42'),
(46, 15, 'rope-tn.jpg', '/dashboard/acme/images/products/rope-tn.jpg', '2019-11-30 03:11:42'),
(47, 14, 'helmet.png', '/dashboard/acme/images/products/helmet.png', '2019-11-30 03:11:57'),
(48, 14, 'helmet-tn.png', '/dashboard/acme/images/products/helmet-tn.png', '2019-11-30 03:11:57'),
(49, 4, 'roadrunner.jpg', '/dashboard/acme/images/products/roadrunner.jpg', '2019-11-30 03:13:55'),
(50, 4, 'roadrunner-tn.jpg', '/dashboard/acme/images/products/roadrunner-tn.jpg', '2019-11-30 03:13:55'),
(51, 5, 'trap.jpg', '/dashboard/acme/images/products/trap.jpg', '2019-11-30 03:14:09'),
(52, 5, 'trap-tn.jpg', '/dashboard/acme/images/products/trap-tn.jpg', '2019-11-30 03:14:09'),
(53, 13, 'piano.jpg', '/dashboard/acme/images/products/piano.jpg', '2019-11-30 03:14:32'),
(54, 13, 'piano-tn.jpg', '/dashboard/acme/images/products/piano-tn.jpg', '2019-11-30 03:14:32'),
(55, 6, 'hole-tn.png', '/dashboard/acme/images/products/hole-tn.png', '2019-11-30 03:14:51'),
(56, 6, 'hole-tn-tn.png', '/dashboard/acme/images/products/hole-tn-tn.png', '2019-11-30 03:14:51'),
(57, 10, 'mallet.png', '/dashboard/acme/images/products/mallet.png', '2019-11-30 03:15:10'),
(58, 10, 'mallet-tn.png', '/dashboard/acme/images/products/mallet-tn.png', '2019-11-30 03:15:10'),
(59, 9, 'rubberband.jpg', '/dashboard/acme/images/products/rubberband.jpg', '2019-11-30 03:15:32'),
(60, 9, 'rubberband-tn.jpg', '/dashboard/acme/images/products/rubberband-tn.jpg', '2019-11-30 03:15:32'),
(61, 2, 'mortar.jpg', '/dashboard/acme/images/products/mortar.jpg', '2019-11-30 03:15:57'),
(62, 2, 'mortar-tn.jpg', '/dashboard/acme/images/products/mortar-tn.jpg', '2019-11-30 03:15:57'),
(63, 12, 'seed.jpg', '/dashboard/acme/images/products/seed.jpg', '2019-11-30 03:16:12'),
(64, 12, 'seed-tn.jpg', '/dashboard/acme/images/products/seed-tn.jpg', '2019-11-30 03:16:12'),
(65, 16, 'bomb.png', '/dashboard/acme/images/products/bomb.png', '2019-11-30 03:16:28'),
(66, 16, 'bomb-tn.png', '/dashboard/acme/images/products/bomb-tn.png', '2019-11-30 03:16:28'),
(67, 11, 'tnt.png', '/dashboard/acme/images/products/tnt.png', '2019-11-30 03:16:44'),
(68, 11, 'tnt-tn.png', '/dashboard/acme/images/products/tnt-tn.png', '2019-11-30 03:16:44'),
(73, 3, 'images.jpeg', '/dashboard/acme/images/products/images.jpeg', '2019-12-01 02:39:28'),
(74, 3, 'images-tn.jpeg', '/dashboard/acme/images/products/images-tn.jpeg', '2019-12-01 02:39:28'),
(75, 3, 'download.jpeg', '/dashboard/acme/images/products/download.jpeg', '2019-12-01 02:39:43'),
(76, 3, 'download-tn.jpeg', '/dashboard/acme/images/products/download-tn.jpeg', '2019-12-01 02:39:43'),
(77, 11, 'dfhg.jpeg', '/dashboard/acme/images/products/dfhg.jpeg', '2019-12-01 03:08:11'),
(78, 11, 'dfhg-tn.jpeg', '/dashboard/acme/images/products/dfhg-tn.jpeg', '2019-12-01 03:08:11'),
(79, 11, 'awesome.jpeg', '/dashboard/acme/images/products/awesome.jpeg', '2019-12-01 03:08:21'),
(80, 11, 'awesome-tn.jpeg', '/dashboard/acme/images/products/awesome-tn.jpeg', '2019-12-01 03:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invName` varchar(50) NOT NULL DEFAULT '',
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL DEFAULT '',
  `invThumbnail` varchar(50) NOT NULL DEFAULT '',
  `invPrice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `invStock` smallint(6) NOT NULL DEFAULT 0,
  `invSize` smallint(6) NOT NULL DEFAULT 0,
  `invWeight` smallint(6) NOT NULL DEFAULT 0,
  `invLocation` varchar(35) NOT NULL DEFAULT '',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `invVendor` varchar(20) NOT NULL DEFAULT '',
  `invStyle` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Acme Inc. Inventory Table';

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`) VALUES
(1, 'Acme Rocket', 'The Acme Rocket meets multiple purposes. This can be launched independently to deliver a payload or strapped on to help get you to where you want to be FAST!!! Really Fast! Launch stand is included.', '/dashboard/acme/images/products/rocket.png', '/acme/images/products/rocket-tn.png', '132000.00', 5, 60, 90, 'Albuquerque, New Mexico', 4, 'Goddard', 'metal'),
(2, 'Mortar', 'Our Mortar is very powerful. This cannon can launch a projectile or bomb 3 miles. Made of solid steel and mounted on cement or metal stands [not included].', '/dashboard/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '1500.00', 26, 250, 750, 'San Jose', 1, 'Smith & Wesson', 'Metal'),
(3, 'Catapult', 'Our best wooden catapult. Ideal for hurling objects for up to 1000 yards. Payloads of up to 300 lbs.', '/dashboard/acme/images/products/catapult.png', '/acme/images/products/catapult-tn.png', '2500.00', 4, 1569, 400, 'Cedar Point, IO', 1, 'Wooden Creations', 'Wood'),
(4, 'Female RoadRuner Cutout', 'This carbon fiber backed cutout of a female roadrunner is sure to catch the eye of any male roadrunner.', '/dashboard/acme/images/products/roadrunner.jpg', '/acme/images/products/roadrunner-tn.jpg', '20.00', 500, 27, 2, 'San Jose', 5, 'Picture Perfect', 'Carbon Fiber'),
(5, 'Giant Mouse Trap', 'Our big mouse trap. This trap is multifunctional. It can be used to catch dogs, mountain lions, road runners or even muskrats. Must be staked for larger varmints [stakes not included] and baited with approptiate bait [sold seperately].\r\n', '/dashboard/acme/images/products/trap.jpg', '/acme/images/products/trap-tn.jpg', '20.00', 34, 470, 28, 'Cedar Point, IO', 5, 'Rodent Control', 'Wood'),
(6, 'Instant Hole', 'Instant hole - Wonderful for creating the appearance of openings.', '/dashboard/acme/images/products/hole.png', '/acme/images/products/hole-tn.png', '25.00', 269, 24, 2, 'San Jose', 3, 'Hidden Valley', 'Ether'),
(8, 'Anvil', '50 lb. Anvil - perfect for any task requireing lots of weight. Made of solid, tempered steel.', '/dashboard/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '150.00', 15, 80, 50, 'San Jose', 5, 'Steel Made', 'Metal'),
(9, 'Monster Rubber Band', 'These are not tiny rubber bands. These are MONSTERS! These bands can stop a train locamotive or be used as a slingshot for cows. Only the best materials are used!', '/dashboard/acme/images/products/rubberband.jpg', '/acme/images/products/rubberband-tn.jpg', '4.00', 4589, 75, 1, 'Cedar Point, IO', 3, 'Rubbermaid', 'Rubber'),
(10, 'Mallet', 'Ten pound mallet for bonking roadrunners on the head. Can also be used for bunny rabbits.', '/dashboard/acme/images/products/mallet.png', '/acme/images/products/mallet-tn.png', '25.00', 100, 36, 10, 'Cedar Point, IA', 3, 'Wooden Creations', 'Wood'),
(11, 'TNT', 'The biggest bang for your buck with our nitro-based TNT. Price is per stick.', '/dashboard/acme/images/products/tnt.png', '/acme/images/products/tnt-tn.png', '10.00', 1000, 25, 2, 'San Jose', 2, 'Nobel Enterprises', 'Plastic'),
(12, 'Roadrunner Custom Bird Seed Mix', 'Our best varmint seed mix - varmints on two or four legs cannot resist this mix. Contains meat, nuts, cereals and our own special ingredient. Guaranteed to bring them in. Can be used with our monster trap.', '/dashboard/acme/images/products/seed.jpg', '/acme/images/products/seed-tn.jpg', '8.00', 150, 24, 3, 'San Jose', 5, 'Acme', 'Plastic'),
(13, 'Grand Piano', 'This upright grand piano is guaranteed to play well and smash anything beneath it if dropped from a height.', '/dashboard/acme/images/products/piano.jpg', '/acme/images/products/piano-tn.jpg', '3500.00', 36, 500, 1200, 'Cedar Point, IA', 3, 'Wulitzer', 'Wood'),
(14, 'Crash Helmet', 'This carbon fiber and plastic helmet is the ultimate in protection for your head. comes in assorted colors.', '/dashboard/acme/images/products/helmet.png', '/acme/images/products/helmet-tn.png', '100.00', 25, 48, 9, 'San Jose', 3, 'Suzuki', 'Carbon Fiber'),
(15, 'Climbing Rope', 'This climbing rope is ideal for all uses. Each rope is the highest quality climbing and comes in 100 foot lengths.', '/dashboard/acme/images/products/rope.jpg', '/acme/images/products/rope-tn.jpg', '15.00', 200, 200, 6, 'San Jose', 3, 'Marina Sales', 'Climbing Rope'),
(16, 'Small Bomb', 'Bomb with a fuse - A little old fashioned, but highly effective. This bomb has the ability to devistate anything within 30 feet.', '/dashboard/acme/images/products/bomb.png', '/acme/images/products/bomb-tn.png', '275.00', 58, 30, 12, 'San Jose', 2, 'Nobel Enterprises', 'Metal');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(123, 'I love them!', '2019-12-18 19:36:04', 3, 19),
(124, 'I love them!', '2019-12-18 19:36:11', 3, 19),
(125, 'I love them!', '2019-12-18 19:36:37', 3, 19),
(126, 'I love them!', '2019-12-18 19:37:35', 3, 19),
(139, 'I like it!!', '2019-12-18 21:50:27', 2, 25),
(140, 'What in the world is this?', '2019-12-18 21:52:51', 9, 25),
(142, 'That is so cool!', '2019-12-18 21:53:38', 3, 25),
(143, 'That is so cool!', '2019-12-18 21:54:17', 3, 25),
(144, 'That is so cool!', '2019-12-18 21:54:34', 3, 25),
(145, 'That is so cool!', '2019-12-18 21:54:35', 3, 25),
(146, 'That is so cool!', '2019-12-18 21:54:40', 3, 25),
(147, 'That is so cool!', '2019-12-18 21:54:52', 3, 25),
(152, 'I think it could have been better!', '2019-12-18 21:56:13', 2, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `invId` (`invId`) USING BTREE,
  ADD KEY `clientId` (`clientId`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_image` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_inv_categories` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
