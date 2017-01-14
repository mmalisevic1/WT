-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 08:07 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtspirala4`
--

-- --------------------------------------------------------

--
-- Table structure for table `administracija`
--

CREATE TABLE `administracija` (
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `administracija`
--

INSERT INTO `administracija` (`username`, `password`) VALUES
('admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `clanak`
--

CREATE TABLE `clanak` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `slika1` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `slika2` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `slika3` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `clanak`
--

INSERT INTO `clanak` (`id`, `naslov`, `slika1`, `slika2`, `slika3`, `tekst`, `vrijeme`) VALUES
(18, 'Dokumentarac BBC-a "Planet Earth" ajde', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 07:30:12'),
(19, 'Dokumentarac BBC-a "Planet Earth" viseeeeee', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 07:32:33'),
(20, 'Dokumentarac BBC-a "Planet Earth" mrs', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 07:36:11'),
(21, 'Dokumentarac BBC-a "Planet Earth"', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 07:38:08'),
(22, '', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 07:40:59'),
(23, 'Dokumentarac BBC-a "Planet Earth"', 'img1.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 07:41:09'),
(24, 'Dokumentarac BBC-a "Planet Earth"', 'imgno.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 00:22:55'),
(25, 'Dokumentarac BBC-a "Planet Earth"', 'img4.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 00:23:59'),
(26, 'Dokumentarac BBC-a "Planet Earth"', 'img4.jpg', 'img2.jpg', 'img3.jpg', 'bleh', '2017-01-14 01:39:32'),
(27, 'Dokumentarac BBC-a "Planet Earth"', 'img4.jpg', 'img2.jpg', 'img3.jpg', '', '2017-01-14 01:39:53'),
(28, 'Dokumentarac BBC-a "Planet Earth"', 'img4.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 01:40:21'),
(29, 'Dokumentarac BBC-a "Planet Earth"', 'img4.jpg', 'img2.jpg', 'img3.jpg', '<h3>Je li ranjivo</h3>', '2017-01-14 02:51:51'),
(30, '<p>GLupiram se </p>', 'img4.jpg', 'img2.jpg', 'img3.jpg', '<h3>Je li ranjivo</h3>', '2017-01-14 02:53:55'),
(31, '<p style="color:red">GLupiram se </p>', 'img4.jpg', 'img2.jpg', 'img3.jpg', '<h3>Je li ranjivo</h3>', '2017-01-14 02:57:05'),
(32, '<p style="color:red">GLupiram se </p>', 'img4.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 03:04:10'),
(33, 'Dokumentarac BBC-a "Planet Earth"', 'img4.jpg', 'img2.jpg', 'img3.jpg', 'Aenean ut vehicula nulla. Proin eu tincidunt purus. Vivamus in feugiat neque. Duis convallis orci sapien, id pretium ante consectetur vel. Vestibulum ultricies eget metus faucibus bibendum. Sed feugiat, turpis at molestie tincidunt, lorem arcu vehicula nunc, et lobortis tellus mi mattis nibh. Duis volutpat placerat ligula vitae aliquet. Nulla ut arcu dapibus, volutpat purus sit amet, tincidunt magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut felis eget dolor feugiat faucibus. Aenean malesuada mi vitae pharetra porta. Aliquam in rutrum dui. Phasellus laoreet nisi vel blandit facilisis. Praesent ac massa eget est tincidunt sollicitudin.\r\n        Integer commodo enim in massa vulputate egestas. Vestibulum consectetur arcu auctor, porttitor urna ac, viverra turpis. Mauris bibendum massa in condimentum consectetur. Mauris ac faucibus justo, ut hendrerit justo. Integer suscipit euismod sodales. Maecenas eu lobortis orci. Donec aliquam vehicula auctor. Vivamus ligula tortor, scelerisque eget nisi at, condimentum scelerisque nibh. Duis consectetur sollicitudin felis vitae finibus. Phasellus a ex id massa volutpat auctor sit amet quis nunc. Phasellus condimentum, orci et faucibus interdum, dolor nisi placerat arcu, at malesuada nunc est nec ante. Aliquam pharetra vitae tortor ut vulputate.', '2017-01-14 03:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `clanak` int(11) NOT NULL,
  `autor` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `clanak`, `autor`, `tekst`, `vrijeme`) VALUES
(1, 33, 'medina', 'Nadam se da radi', '2017-01-14 06:59:28'),
(2, 33, 'medina', 'OMG RADIIIIIII', '2017-01-14 07:00:05'),
(4, 33, 'jalePusa', 'Ovo cudo radi yeeeeeey. Najbolja stranica na svijetu', '2017-01-14 07:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `spol` varchar(6) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`username`, `password`, `email`, `spol`) VALUES
('anjakin', 'anja123', 'amileticku1@etf.unsa.ba', 'ženski'),
('jalePusa', 'jale777', 'jaksamovic1@etf.unsa.ba', 'muški'),
('medina', 'medina1', 'mmalisevic1@etf.unsa.ba', 'ženski');

-- --------------------------------------------------------

--
-- Table structure for table `zadatak2`
--

CREATE TABLE `zadatak2` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `zadatak2`
--

INSERT INTO `zadatak2` (`id`, `email`) VALUES
(1, 'mmalisevic1@etf.unsa.ba'),
(2, 'amileticku1@etf.unsa.ba'),
(3, 'emuratspah1@etf.unsa.ba'),
(4, 'smuratovic2@etf.unsa.ba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administracija`
--
ALTER TABLE `administracija`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `clanak`
--
ALTER TABLE `clanak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clanak` (`clanak`),
  ADD KEY `autor` (`autor`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `zadatak2`
--
ALTER TABLE `zadatak2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanak`
--
ALTER TABLE `clanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `zadatak2`
--
ALTER TABLE `zadatak2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`clanak`) REFERENCES `clanak` (`id`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`autor`) REFERENCES `korisnik` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
