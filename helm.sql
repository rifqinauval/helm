-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 04:54 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helm`
--

-- --------------------------------------------------------

--
-- Table structure for table `helm_jadi`
--

CREATE TABLE `helm_jadi` (
  `id` int(5) NOT NULL,
  `merek` varchar(25) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `ukuran` varchar(25) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `warna` varchar(25) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `helm_jadi`
--

INSERT INTO `helm_jadi` (`id`, `merek`, `tipe`, `ukuran`, `jenis`, `warna`, `harga`, `gambar`) VALUES
(2, 'GM', 'GM-10', 'L', 'half face', 'Merah', '3000', '11.jpg'),
(11, 'mds', 'supermoto', 'M', 'halface', 'hitam', '450000', '34.jpg'),
(12, 'BOGO', 'BOGO-2019', 'L', 'half-face', 'coklat', '170000', 'bogo.jpg'),
(16, 'KYT', 'KYT-best', 'L', 'full face', 'Hijau', '400000', 'Espargaró-Replica-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `image` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(5) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'rifqi nauval', 'rifqinauval11@gmail.com', 'jendela1.png', '$2y$10$nuAbGDWFY6adVd95rqtjA.fV9ZrJ4iLX6tOBv/DHvGl/uS3Wdz7o6', 1, 1, 1574825433),
(4, 'stephen curry', 'sc30@gmail.com', '173040080.jpg', '$2y$10$AXIPSNH1Oe94lJSnsH6TY.DHg0tsesAhQzQTNesFV5gpO2h6ZBzCO', 2, 1, 1574827656),
(5, 'dindin', 'aku@mail.com', 'default.jpg', '$2y$10$PJGJMfCyagXqQG3bpfgff.8k5GlJHikLey2YhvCXKbb/hW.pRVq3y', 2, 1, 1575095973),
(6, 'tosaedi ibrahim', 'tosaediibrahim@gmail.com', 'default.jpg', '$2y$10$ZVh0zPmHCwu54OBaLxI.KexP2w7.0FTyZv25AX/gMgiX32yYiKXni', 2, 1, 1575131556),
(11, 'Rekweb', 'rekwebtubes@gmail.com', 'default.jpg', '$2y$10$YrihQdScQ.nmtZrrBwSoye8p3TQ3bpFHGEH3.ewAcdtdyBMRRMTCa', 2, 1, 1576238669),
(12, 'madani', 'muhamadgemam@gmail.com', 'default.jpg', '$2y$10$npppBfR2CAJzip/xXhAb6uVhDtLViBcmZGTBZukHDZ7Z8isQs8uq6', 2, 0, 1576731181),
(13, 'madani', 'muhamadgemam04@gmail.com', 'default.jpg', '$2y$10$Hp4uiXyU/oVJA2H2fGX1quCE8XwSh6yQ8C.ByNTNmNk4K9wizTBEm', 2, 0, 1576731238),
(14, 'abiyyu', 'nama.cookie2019@gmail.com', 'default.jpg', '$2y$10$GPTuUveuI1gdE3QBLHFG7OGz0qbacxc.pPKjVCMW8Kn2OQMPrSrX.', 2, 0, 1576731301);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 2, 2),
(8, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(4, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(5) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, '1', 'Dashboard', 'Admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, '2', 'My Profile', 'user', 'fas fa-store-alt', 1),
(3, '2', 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, '3', 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, '3', 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, '1', 'role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, '1', 'Data Produk', 'admin/data_produk', 'hgj', 1),
(9, '2', 'Produk', 'user/data_produk_user', 'fas fa-fw fa-folder', 1),
(10, '2', 'Ganti Password', 'user/changepassword', 'khhvj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(10, 'muhamadgemam@gmail.com', '9eYz9ZvNeXzJX561eR7IKPVx9nAI1TEZ9tFJf+g4cPo=', 1576145018),
(18, 'rekwebtubes@gmail.com', 'MWR37/fJyC4bicq/zQrTl3c+eazydRJ4cGdIgJUFafw=', 1576238716),
(19, 'muhamadgemam@gmail.com', 'Awe9LA9fr/l5SkCHQRFzlQjxcUMT7ZUK4qz6azSMgbQ=', 1576731181),
(20, 'muhamadgemam04@gmail.com', 'oE3zlbTDlag74qUj5LKtwooccwn6eblsfLFBJjboH1Q=', 1576731238),
(21, 'nama.cookie2019@gmail.com', 'gECLrsl8KGSXMvxXctphENSdvUIBIXd4DlXc1PtuEZM=', 1576731301),
(22, 'rifqinauval11@gmail.com', 'Cy++BbcoKsskE/rKsmJlX9H5eIqz13WAxG9esDvkI3U=', 1576731440);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `helm_jadi`
--
ALTER TABLE `helm_jadi`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `helm_jadi`
--
ALTER TABLE `helm_jadi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
