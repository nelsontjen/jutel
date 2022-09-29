-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 08:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jutel`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `bintang` enum('1','2','3','4','5') NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `nama`, `kota`, `harga`, `bintang`, `jumlah_kamar`, `fasilitas`, `foto`) VALUES
(1, 'Mawar', 'Tangerang', 250000, '3', 30, 'Kolam Renang, Spa, Breakfast', 'bd52c-mawar.jpg'),
(2, 'Golden Boutique Hotel Kemayoran ', 'Jakarta', 450000, '3', 20, 'Kolam Renang, Wifi, Parkir Mobil, Restaurant', 'd5b7c-golden-boutique.jpg'),
(3, 'H Sovereign Bali', 'Bali', 500000, '4', 30, 'Wi-Fi, Kolam Berenang, Bar, Room Service', '970c0-hsovereign.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_book`
--

CREATE TABLE `order_book` (
  `order_id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `tgl_checkIn` date NOT NULL,
  `tgl_checkOut` date NOT NULL,
  `tgl_order` datetime NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_book`
--

INSERT INTO `order_book` (`order_id`, `id_customer`, `id_hotel`, `tgl_checkIn`, `tgl_checkOut`, `tgl_order`, `totalHarga`, `kamar`) VALUES
(1, 7, 1, '2021-05-17', '2021-05-18', '2021-05-17 02:18:21', 250000, 1),
(2, 7, 3, '2021-05-16', '2021-05-18', '2021-05-17 02:48:50', 1000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `role_id`, `is_active`, `bdate`, `no_telp`, `foto`) VALUES
(7, 'Hindra', 'Pangadi', 'admin@umn.ac.id', '$2y$10$6517wMsEp3m/Qvv.sXceION8w2yj9iQNuzPbV.rfDVrR8LI5ksbt6', 1, 1, '2002-06-11', '02154656532', 'messageImage_1604054619865.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_rental`
--

CREATE TABLE `user_rental` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_rental`
--

INSERT INTO `user_rental` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Edit Hotel', 'admin', 'far fa-edit', 1),
(2, 2, 'My Profile', 'user', 'fa fa-id-badge', 1),
(3, 2, 'My Order / Booking', 'user/booking_list', '	fa fa-cart-plus', 1),
(4, 2, 'List Hotel', 'User/list_hotel', 'fa fa-hotel', 1),
(5, 2, 'About us', 'user/about', 'fa fa-users', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_book`
--
ALTER TABLE `order_book`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rental`
--
ALTER TABLE `user_rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_book`
--
ALTER TABLE `order_book`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_rental`
--
ALTER TABLE `user_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
