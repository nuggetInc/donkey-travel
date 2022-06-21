-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2022 at 09:46 AM
-- Server version: 10.8.3-MariaDB
-- PHP Version: 8.1.7

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

-- --------------------------------------------------------

--
-- Table structure for table `breakspots`
--

CREATE TABLE `breakspots` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phonenumber`, `password`, `edited`) VALUES
(1, 'Cas', 'cas@donkeytravel.nl', '0612345678', '$2y$10$H4rIShA0C00E5EvTEusgLu5JTs1/TNyOkskTbz8VV567FEArh4b12', '2022-05-24 07:50:49'),
(2, 'Tim', 'tim@donkeytravel.nl', '0612345678', '$2y$10$99pqDMy8/7ivZX50261Y7e3PCwV9ejVKNvg0Ywyqv.nPkWW9qbwi.', '2022-05-12 10:03:41'),
(3, 'Daan', 'daan@donkeytravel.nl', '0612345678', '$2y$10$pmaAOJeSk0J7aOX6KZy3o.1twnTT6vbBiGxl3nHRQH/29zgPOzGZe', '2022-05-11 07:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `inns`
--

CREATE TABLE `inns` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `coordinates` varchar(20) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `overnight_stays`
--

CREATE TABLE `overnight_stays` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `inn_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `pincode` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `start_date`, `pincode`, `trip_id`, `customer_id`, `status_id`) VALUES
(8, '2022-06-19', 0, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `coordinates` varchar(20) NOT NULL,
  `edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `status` varchar(40) NOT NULL,
  `removeable` tinyint(4) NOT NULL,
  `assign_pin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `statuscode`, `status`, `removeable`, `assign_pin`) VALUES
(0, 0, 'Eh...', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

CREATE TABLE `trackers` (
  `id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `description` varchar(40) NOT NULL,
  `route` varchar(50) NOT NULL,
  `day_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `description`, `route`, `day_count`) VALUES
(4, 'Tocht door Altlay', 'Altlay', 3),
(5, 'Tocht door Bremm', 'Bremm', 3),
(6, 'Tocht door Klotten', 'Klotten', 3),
(7, 'Tocht door Kyll', 'Kyll', 3),
(8, 'Tocht door Leienkaul', 'Leienkaul', 3),
(9, 'Tocht door Paflur', 'Paflur', 3),
(10, 'Tocht door Stelvio', 'Stelvio', 3),
(11, 'Tocht door Urzig', 'Urzig', 3),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inns`
--
ALTER TABLE `inns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overnight_stays`
--
ALTER TABLE `overnight_stays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trackers`
--
ALTER TABLE `trackers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3248;

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
