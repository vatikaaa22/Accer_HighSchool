-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 10, 2025 at 11:42 PM
-- Server version: 8.0.42
-- PHP Version: 8.2.27

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
  `address_id` int NOT NULL,
  `address_name` varchar(100) DEFAULT NULL,
  `isDefault` tinyint(1) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
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
  `email_id` int NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `isDefault` tinyint(1) DEFAULT NULL,
  `user_id` int DEFAULT NULL
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
  `eskul_id` int NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `img` text,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eskuls`
--

INSERT INTO `eskuls` (`eskul_id`, `title`, `img`, `user_id`) VALUES
(5, 'RENANG', 'hussain-badshah-Hlc0D_HoEKk-unsplash.jpg', 1),
(8, 'BASKET', 'chelsea-fern-WJRZNL7rDF8-unsplash.jpg', 1),
(12, 'BADMINTON', 'badminton.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int NOT NULL,
  `event_date` date DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_date`, `name`, `user_id`) VALUES
(7, '2024-02-17', 'Accer Got Talent', NULL),
(8, '2025-08-04', 'Accer Fest', NULL),
(9, '2025-05-04', 'Accer Sports Day', NULL),
(10, '2024-04-14', 'Entrepreneur Day', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `description` longtext,
  `user_id` int DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `name`, `description`, `user_id`, `image`) VALUES
(5, 'Seragam Accer High School', 'Dirancang dengan bahan pilihan dan sentuhan desain modern, seragam ini mencerminkan identitas sekolah yang berkelas dan stylish. Dengan tampilan rapi dan rasa nyaman, siswa Accer High School tampil percaya diri setiap hari, siap belajar dengan semangat dan penuh inspirasi.', 1, 'baju.jpg'),
(8, 'Ruang Kelas', 'Dirancang dengan tata ruang yang nyaman dan desain modern, setiap kelas di Accer High School mencerminkan lingkungan belajar yang kondusif dan inspiratif. Dengan suasana yang rapi, bersih, dan penuh semangat, siswa merasa lebih fokus, nyaman, dan siap menyerap ilmu setiap hari.', 1, 'kls.jpg'),
(9, 'Perpustakaan', 'Dilengkapi dengan koleksi buku yang beragam dan suasana yang tenang, perpustakaan Accer High School menjadi tempat ideal untuk membaca, belajar, dan mengeksplorasi pengetahuan. Dengan desain modern dan ruang yang nyaman, siswa dapat mengembangkan wawasan mereka dalam lingkungan yang mendukung dan inspiratif.', 1, 'perpus.jpg'),
(10, 'Ruang Musik', 'Ruang musik Accer High School didesain khusus untuk menumbuhkan kreativitas dan bakat seni siswa. Dilengkapi dengan berbagai alat musik dan suasana yang mendukung, ruang ini menjadi tempat bagi siswa untuk berekspresi, berlatih, dan mengasah kemampuan musikal mereka dengan penuh semangat.', 1, 'musik.jpg'),
(11, 'Laboratorium Komputer', 'Lab komputer Accer High School dilengkapi dengan perangkat modern dan koneksi internet yang stabil untuk mendukung pembelajaran berbasis teknologi. Di ruang ini, siswa mengembangkan keterampilan digital, mulai dari pengolahan data hingga pemrograman, dalam lingkungan yang nyaman dan produktif.', 1, 'lab kom.jpg'),
(12, 'Kantin', 'Kantin Accer School menyediakan beragam makanan dan minuman sehat dalam lingkungan yang bersih dan nyaman. Menjadi tempat favorit saat istirahat, kantin ini menawarkan menu dari makanan tradisional hingga camilan kekinian dengan standar kebersihan yang terjaga untuk mendukung kesehatan siswa.', 1, 'kantin.jpg'),
(13, 'Kolam Renang', 'Kolam renang di Accer School menjadi salah satu fasilitas olahraga yang mendukung pengembangan fisik dan kesehatan siswa. Didesain dengan standar keamanan dan kebersihan tinggi, kolam ini digunakan untuk kegiatan pembelajaran olahraga, ekstrakurikuler renang, hingga lomba antar kelas. Fasilitas ini tidak hanya melatih keterampilan berenang, tetapi juga menjadi sarana rekreasi yang menyenangkan bagi siswa dalam suasana yang nyaman dan terkontrol.', 1, 'kolam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `information_id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `information_date` date DEFAULT NULL,
  `description` longtext,
  `location` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`information_id`, `title`, `information_date`, `description`, `location`, `image`, `user_id`) VALUES
(13, 'Accer High School Raih Peringkat 1', '2025-07-10', 'Sleman, 3 Juli 2025 — Accer High School resmi dinobatkan sebagai sekolah terbaik di Yogyakarta setelah berhasil meraih peringkat 1 dalam evaluasi pendidikan tingkat daerah.', 'DI.Yogyakarta', 'piagam.jpg', 1),
(14, 'Pendaftaran Peserta Didik Baru (PPDB)', '2025-07-10', 'Pendaftaran Peserta Didik Baru Accer High School Tahun Ajaran 2025/2026 telah dibuka! Segera daftarkan dirimu dan jadilah bagian dari sekolah terbaik di Yogyakarta.', 'DI.Yogyakarta', 'PPDB ACCER.png', 1),
(15, 'Prestasi Membanggakan Lulusan Accer High School', '2025-07-10', 'Nadia Putri Azzahra, siswi Accer High School, berhasil meraih peringkat 1 lulusan terbaik tahun ajaran 2024/2025. Dengan prestasi akademik yang gemilang dan dedikasi tinggi selama masa sekolah, Nadia menjadi kebanggaan sekolah dan inspirasi bagi seluruh siswa Accer High School.', 'DI.Yogyakarta', 'Prestasi akademik.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `phone_id` int NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `number` varchar(30) DEFAULT NULL,
  `isDefault` tinyint(1) DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`phone_id`, `username`, `number`, `isDefault`, `user_id`) VALUES
(1, 'Humas', '098764322', 1, 1),
(2, 'Pengajaran', '22234456', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int NOT NULL,
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
(2, 'tika', 'random@gmail.com', '22222344', '10 MIPA 1', 'test'),
(3, 'tika', 'random@gmail.com', '12333', '10 MIPA 1', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
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
  MODIFY `address_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `email_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eskuls`
--
ALTER TABLE `eskuls`
  MODIFY `eskul_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `information_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `phone_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
