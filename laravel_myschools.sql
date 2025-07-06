-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2024 at 12:40 PM
-- Server version: 5.7.39
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_myschools`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_name` varchar(100) DEFAULT NULL,
  `isDefault` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_name`, `isDefault`, `user_id`, `address_info`) VALUES
(5, 'AMIKOM', 1, 1, 'amamjdh,ajhkdhasdf\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `email_id` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `isDefault` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`email_id`, `email`, `isDefault`, `user_id`) VALUES
(4, 'user@gmail.com', 1, NULL),
(6, 'usere@gmail.com', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eskuls`
--

CREATE TABLE `eskuls` (
  `eskul_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `img` text,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eskuls`
--

INSERT INTO `eskuls` (`eskul_id`, `title`, `img`, `user_id`) VALUES
(5, 'RENANG', 'hussain-badshah-Hlc0D_HoEKk-unsplash.jpg', 1),
(7, 'GOLF', 'peter-drew-DYr7sYSOo_A-unsplash.jpg', 1),
(8, 'BASKET', 'chelsea-fern-WJRZNL7rDF8-unsplash.jpg', 1),
(11, 'asda', 'tobias-keller-73F4pKoUkM0-unsplash.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_date` date DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_date`, `name`, `user_id`) VALUES
(4, '2024-05-08', 'adsdasd', NULL),
(5, '2024-07-01', ' scsssf updTE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `description` longtext,
  `user_id` int(11) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `name`, `description`, `user_id`, `image`) VALUES
(3, 'Seragam', '\r\nDibuat dengan bahan berkualitas tinggi dan desain yang modern, setiap seragam menjadi simbol dari identitas sekolah yang prestisius dan gaya yang tak lekang oleh waktu. Bergaya dengan percaya diri, siswa kami siap menghadapi setiap hari dengan semangat yang menginspirasi dan nyaman.\"', 1, 'seragam.jpg'),
(4, 'Fasilitas', 'Selamat datang di sekolah di mana standar dunia bertemu dengan fasilitas yang tak tertandingi. Di sini, setiap siswa memasuki sebuah dunia dirancang untuk memupuk pengetahuan, kreativitas, dan prestasi yang tak terbatas. Bersiaplah untuk mengeksplorasi masa depan dengan segala kemudahan yang ada!', 1, 's-b-vonlanthen-A8iLzX6OddM-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `information_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `information_date` date DEFAULT NULL,
  `description` longtext,
  `location` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`information_id`, `title`, `information_date`, `description`, `location`, `image`, `user_id`) VALUES
(4, 'ALAM', '2024-06-30', '\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Iusto inventore sint amet nesciunt soluta odio minima saepe esse doloribus, minus dolorem ex voluptas! Minima, possimus earum aliquid a illum provident?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Iusto inventore sint amet nesciunt soluta odio minima saepe esse doloribus, minus dolorem ex voluptas! Minima, possimus earum aliquid a illum provident?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Iusto inventore sint amet nesciunt soluta odio minima saepe esse doloribus, minus dolorem ex voluptas! Minima, possimus earum aliquid a illum provident?', 'USA', 'robert-lukeman-zNN6ubHmruI-unsplash.jpg', 1),
(6, 'kjhdkjasd update', '2024-07-01', 'kjdskajhkdjakshdkjahdkjashdk\r\n', 'Yogyakarta', 'tobias-keller-73F4pKoUkM0-unsplash.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `phone_id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `number` varchar(30) DEFAULT NULL,
  `isDefault` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` text,
  `number` varchar(13) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `name`, `email`, `number`, `subject`, `message`) VALUES
(1, 'Wahid', 'user@gmail.com', '9109819023', 'testing', '\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Illo quae maiores delectus praesentium, adipisci suscipit tempora similique tenetur impedit neque nisi cum, pariatur labore ipsam ipsum incidunt nesciunt? Voluptates, non.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`) VALUES
(1, 'Developer', 'developer321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `eskuls`
--
ALTER TABLE `eskuls`
  ADD PRIMARY KEY (`eskul_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`information_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`phone_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eskuls`
--
ALTER TABLE `eskuls`
  MODIFY `eskul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phone_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `eskuls`
--
ALTER TABLE `eskuls`
  ADD CONSTRAINT `eskuls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `informations`
--
ALTER TABLE `informations`
  ADD CONSTRAINT `informations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
