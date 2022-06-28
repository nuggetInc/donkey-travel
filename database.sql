-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 12:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donkey_travel`
--
CREATE DATABASE IF NOT EXISTS `donkey_travel` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `donkey_travel`;

-- --------------------------------------------------------

--
-- Table structure for table `breakspots`
--

DROP TABLE IF EXISTS `breakspots`;
CREATE TABLE `breakspots` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `breakspots`
--

INSERT INTO `breakspots` (`id`, `reservation_id`, `restaurant_id`, `status_id`) VALUES
(25, 9, 2, 2),
(30, 9, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phonenumber`, `password`, `edited`) VALUES
(1, 'Cas de Loijer', 'cas@donkeytravel.nl', '0612345678', '$2y$10$H4rIShA0C00E5EvTEusgLu5JTs1/TNyOkskTbz8VV567FEArh4b12', '2022-06-20 15:54:06'),
(2, 'Tim Hartsuijker', 'tim@donkeytravel.nl', '0612345678', '$2y$10$99pqDMy8/7ivZX50261Y7e3PCwV9ejVKNvg0Ywyqv.nPkWW9qbwi.', '2022-06-28 05:23:23'),
(3, 'Daan Vermeren', 'daan@donkeytravel.nl', '0612345678', '$2y$10$pmaAOJeSk0J7aOX6KZy3o.1twnTT6vbBiGxl3nHRQH/29zgPOzGZe', '2022-06-28 05:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `inns`
--

DROP TABLE IF EXISTS `inns`;
CREATE TABLE `inns` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `coordinates` varchar(20) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inns`
--

INSERT INTO `inns` (`id`, `name`, `address`, `email`, `phonenumber`, `coordinates`, `edited`) VALUES
(1, 'Voorbeeld Herberg', 'Breedeborg 191', 'voorbeeld@herberg.nl', '0612345678', '', '2022-06-28 05:11:23'),
(2, 'Voorbeeld Herberg', 'Boschweg 37', 'voorbeeld@herberg.nl', '0612345678', '', '2022-06-28 05:11:33'),
(3, 'Voorbeeld Herberg', 'Neelstraat 105', 'voorbeeld@herberg.nl', '0612345678', '', '2022-06-28 05:11:44'),
(4, 'Voorbeeld Herberg', 'Zuiderkruisstraat 13', 'voorbeeld@herberg.nl', '0612345678', '', '2022-06-28 05:11:54'),
(5, 'Voorbeeld Herberg', 'Columbusstraat 9', 'voorbeeld@herberg.nl', '0612345678', '', '2022-06-28 05:19:31'),
(6, 'Voorbeeld Herberg', 'Hindelaan 96', 'voorbeeld@herberg.nl', '0612345678', '', '2022-06-28 05:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `overnight_stays`
--

DROP TABLE IF EXISTS `overnight_stays`;
CREATE TABLE `overnight_stays` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `inn_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `overnight_stays`
--

INSERT INTO `overnight_stays` (`id`, `reservation_id`, `inn_id`, `status_id`) VALUES
(7, 9, 1, 3),
(8, 9, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `pincode` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `start_date`, `pincode`, `trip_id`, `customer_id`, `status_id`) VALUES
(9, '2022-06-20', 0, 4, 2, 2),
(10, '2022-06-22', 0, 8, 3, 1),
(11, '2022-06-27', 6046, 4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `coordinates` varchar(20) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `email`, `phonenumber`, `coordinates`, `edited`) VALUES
(1, 'Voorbeeld Restaurant', 'Breedeborg 191', 'voorbeeld@restaurant.nl', '0612345678', '', '2022-06-28 05:03:41'),
(2, 'Voorbeeld Restaurant', 'Boschweg 37', 'voorbeeld@restaurant.nl', '0612345678', '', '2022-06-28 05:03:55'),
(3, 'Voorbeeld Restaurant', 'Neelstraat 105', 'voorbeeld@restaurant.nl', '0612345678', '', '2022-06-28 05:04:10'),
(4, 'Voorbeeld Restaurant', 'Zuiderkruisstraat 13', 'voorbeeld@restaurant.nl', '0612345678', '', '2022-06-28 05:04:25'),
(5, 'Voorbeeld Restaurant', 'Columbusstraat 9', 'voorbeeld@restaurant.nl', '0612345678', '', '2022-06-28 05:04:36'),
(6, 'Voorbeeld Restaurant', 'Hindelaan 96', 'voorbeeld@restaurant.nl', '0612345678', '', '2022-06-28 05:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `status` varchar(40) NOT NULL,
  `removeable` tinyint(4) NOT NULL,
  `assign_pin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `statuscode`, `status`, `removeable`, `assign_pin`) VALUES
(1, 0, 'Offerte', 1, 0),
(2, 0, 'Definitief', 0, 1),
(3, 0, 'Aanvraag', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

DROP TABLE IF EXISTS `trackers`;
CREATE TABLE `trackers` (
  `id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trackers`
--

INSERT INTO `trackers` (`id`, `pincode`, `latitude`, `longitude`, `time`) VALUES
(3253, 6046, 50.053171981126, 7.0355299673975, 2022062875543576),
(3254, 6046, 50.053122024983, 7.0354240201414, 2022062875548955),
(3255, 6046, 50.053096963093, 7.0352439768612, 2022062875553993),
(3256, 6046, 50.05302102305, 7.0350490137935, 2022062875559037),
(3257, 6046, 50.052979029715, 7.0348910149187, 2022062875605000),
(3258, 6046, 50.052877021953, 7.0346210338175, 2022062875610056),
(3259, 6046, 50.052903005853, 7.0345190260559, 2022062875615103),
(3260, 6046, 50.052904011682, 7.0344569999725, 2022062875627032),
(3261, 6046, 50.052896970883, 7.034403020516, 2022062875632069),
(3262, 6046, 50.052894037217, 7.0342990010977, 2022062875637123),
(3263, 6046, 50.052894037217, 7.0342130027711, 2022062875642162),
(3264, 6046, 50.052894037217, 7.0341249927878, 2022062875647207),
(3265, 6046, 50.052895965055, 7.0340570155531, 2022062875652984),
(3266, 6046, 50.052903005853, 7.0340000186116, 2022062875658026),
(3267, 6046, 50.052908034995, 7.033892981708, 2022062875703077),
(3268, 6046, 50.052886996418, 7.0338130183518, 2022062875713143),
(3269, 6046, 50.052856989205, 7.0338459592313, 2022062875718161),
(3270, 6046, 50.052835028619, 7.033914020285, 2022062875723207),
(3271, 6046, 50.052809966728, 7.0339870266616, 2022062875728261),
(3272, 6046, 50.052782977, 7.034070007503, 2022062875733305),
(3273, 6046, 50.052741989493, 7.0342209655792, 2022062875738329),
(3274, 6046, 50.052710976452, 7.0343570038676, 2022062875743356),
(3275, 6046, 50.052689015865, 7.0344580058008, 2022062875748416),
(3276, 6046, 50.052676023915, 7.0345649588853, 2022062875753444),
(3277, 6046, 50.052651967853, 7.0346740074456, 2022062875759036),
(3278, 6046, 50.052690021694, 7.0350119657815, 2022062875804055),
(3279, 6046, 50.052706031129, 7.0353510137647, 2022062875809091),
(3280, 6046, 50.05271198228, 7.0357299596071, 2022062875814853),
(3281, 6046, 50.05271198228, 7.0358079951257, 2022062875819895),
(3282, 6046, 50.052658002824, 7.0362349692732, 2022062875824906),
(3283, 6046, 50.052437977865, 7.0366200339049, 2022062875834918);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `description` varchar(40) NOT NULL,
  `route` varchar(50) NOT NULL,
  `day_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `description`, `route`, `day_count`) VALUES
(4, 'Tocht door Altlay', 'Altlay', 3),
(5, 'Tocht door Bremm', 'Bremm', 4),
(6, 'Tocht door Klotten', 'Klotten', 3),
(7, 'Tocht door Kyll', 'Kyll', 5),
(8, 'Tocht door Leienkaul', 'Leienkaul', 3),
(9, 'Tocht door Paflur', 'Paflur', 2),
(10, 'Tocht door Stelvio', 'Stelvio', 3),
(11, 'Tocht door Urzig', 'Urzig', 2),
(12, 'Tocht door Wittlich', 'Wittlich', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakspots`
--
ALTER TABLE `breakspots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `restaurant_id` (`restaurant_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inns`
--
ALTER TABLE `inns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overnight_stays`
--
ALTER TABLE `overnight_stays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inn_id` (`inn_id`),
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `pincode` (`pincode`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trackers`
--
ALTER TABLE `trackers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trackers_ibfk_1` (`pincode`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breakspots`
--
ALTER TABLE `breakspots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inns`
--
ALTER TABLE `inns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `overnight_stays`
--
ALTER TABLE `overnight_stays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trackers`
--
ALTER TABLE `trackers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3284;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `breakspots`
--
ALTER TABLE `breakspots`
  ADD CONSTRAINT `breakspots_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`),
  ADD CONSTRAINT `breakspots_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`),
  ADD CONSTRAINT `breakspots_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `overnight_stays`
--
ALTER TABLE `overnight_stays`
  ADD CONSTRAINT `overnight_stays_ibfk_1` FOREIGN KEY (`inn_id`) REFERENCES `inns` (`id`),
  ADD CONSTRAINT `overnight_stays_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`),
  ADD CONSTRAINT `overnight_stays_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`);

--
-- Constraints for table `trackers`
--
ALTER TABLE `trackers`
  ADD CONSTRAINT `trackers_ibfk_1` FOREIGN KEY (`pincode`) REFERENCES `reservations` (`pincode`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
