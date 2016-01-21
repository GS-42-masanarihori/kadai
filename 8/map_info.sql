-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 1 月 21 日 15:42
-- サーバのバージョン： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `map`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `map_info`
--

CREATE TABLE `map_info` (
  `id` int(12) NOT NULL,
  `lat` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lon` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `input_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `map_info`
--

INSERT INTO `map_info` (`id`, `lat`, `lon`, `img`, `input_date`) VALUES
(1, '39.11', '139.01', '1.jpg', '2016-01-19 20:53:29'),
(2, '39.115', '139.012', '2.jpg', '2016-01-19 20:55:24'),
(3, '39.117', '139.012', '3.jpg', '2016-01-19 20:55:38'),
(6, '35.748030899999996', '139.783952', 'IMG_3823.jpg', '2016-01-19 22:44:47'),
(12, '35.698374799999996', '139.766069', 'upload/20160121092435me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:24:35'),
(13, '35.6984081', '139.76600489999998', 'upload/20160121092453me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:24:53'),
(14, '35.698414', '139.7660172', 'upload/20160121094414me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:44:14'),
(15, '35.698414', '139.7660172', 'upload/20160121094625me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:46:25'),
(16, '35.698414', '139.7660172', 'upload/20160121094641me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:46:41'),
(17, '35.698414', '139.7660172', 'upload/20160121094750me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:47:50'),
(18, '35.698414', '139.7660172', 'upload/20160121094804me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:48:04'),
(19, '35.698390599999996', '139.766', 'upload/20160121094809me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:48:09'),
(20, '35.698390599999996', '139.766', 'upload/20160121094847me9dg241pcm725oglov3urvtu5.jpg', '2016-01-21 17:48:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `map_info`
--
ALTER TABLE `map_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `map_info`
--
ALTER TABLE `map_info`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
