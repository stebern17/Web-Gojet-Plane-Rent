-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 06:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_privatejet`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(15) NOT NULL,
  `kd_booking` varchar(255) NOT NULL,
  `id_login` int(15) NOT NULL,
  `id_jet` int(15) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lama_sewa` int(15) NOT NULL,
  `total_harga` int(15) NOT NULL,
  `konfirmasi_pembayaran` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `kd_booking`, `id_login`, `id_jet`, `ktp`, `nama`, `alamat`, `no_tlp`, `tanggal`, `lama_sewa`, `total_harga`, `konfirmasi_pembayaran`, `tgl_input`) VALUES
(1, 'KD1', 1, 5, '3121929', 'Yahya', 'Garut', '021222111444', '01-11-2021', 5, 112000000, 'Berhasil', '02-11-2021'),
(2, 'KD2', 1, 6, '938232939', 'farhan', 'Jogja', '09890876', '12-11-2021', 3, 137000000, 'Belum Berhasil', '13-11-2021');

-- --------------------------------------------------------

--
-- Table structure for table `infoweb`
--

CREATE TABLE `infoweb` (
  `id` int(15) DEFAULT NULL,
  `crop_name` varchar(255) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_rek` text DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infoweb`
--

INSERT INTO `infoweb` (`id`, `crop_name`, `tlp`, `alamat`, `email`, `no_rek`, `update_at`) VALUES
(1, 'Begundal Rant', '081122334455', 'Manisrenggo', 'privathet@begundal.co.id', 'BCA A/N ADI 112453141234', '2023-07-06 15:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(15) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Yahya', 'admin', 'admin', 'admin'),
(5, 'Farhan', 'pengguna', 'pengguna', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(15) DEFAULT NULL,
  `id_booking` int(255) DEFAULT NULL,
  `no_rekening` int(255) DEFAULT NULL,
  `nama_rekening` varchar(255) DEFAULT NULL,
  `nominal` int(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`) VALUES
(3, 1, 98123244, 'Rudi', 112000000, '02-11-2021'),
(4, 2, 87943531, 'Yanza', 137000000, '13-11-2021');

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_pengambilan` int(15) NOT NULL,
  `kd_booking` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `denda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privat_jet`
--

CREATE TABLE `privat_jet` (
  `id_jet` int(15) NOT NULL,
  `no_seri` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privat_jet`
--

INSERT INTO `privat_jet` (`id_jet`, `no_seri`, `merk`, `harga`, `deskripsi`, `status`, `gambar`) VALUES
(5, 'PK750', 'Cessna Citation Longitude', 5070, 'jet pribadi keluaran produsen pesawat Cessna yang mampu menampung penumpang sebanyak 12 orang. Fasilitas yang tersedia pada jet pribadi satu ini diantaranya yaitu mesin pembuat kopi, oven, serta kamar mandi yang luas dan mewah.', 'Tidak Tersedia', 'cessna citation.jpg'),
(6, 'PK1000E', 'Embraer Lineage ', 46000000, 'dapat membuat penumpangnya merasa nyaman. Penumpang dapat menikmati ruang kabin yang mewah dan besar pada jet pribadi ini. Selain itu, Embraer Lineage 1000E juga dilengkapi dengan televisi, sofa mewah, kamar tidur khusus, hingga kamar mandi pribadi.', 'Tersedia', 'Embraer lineage.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_pengambilan`);

--
-- Indexes for table `privat_jet`
--
ALTER TABLE `privat_jet`
  ADD PRIMARY KEY (`id_jet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id_pengambilan` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privat_jet`
--
ALTER TABLE `privat_jet`
  MODIFY `id_jet` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
