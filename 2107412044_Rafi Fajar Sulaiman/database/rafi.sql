-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 04:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rafi`
--

-- --------------------------------------------------------

--
-- Table structure for table `sulaiman`
--

CREATE TABLE `sulaiman` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sulaiman`
--

INSERT INTO `sulaiman` (`id`, `nama`, `alamat`, `hp`, `tgl_transaksi`, `jenis_barang`, `nama_barang`, `jumlah`, `harga`) VALUES
(1, 'Rafi', 'Pamulang', '822132456789', '2022-11-22', 'Baju', 'Kemeja Hitam Polos', 3, 150000),
(2, 'Fajar', 'Vila Dago', '82123456789', '2022-11-22', 'Makanan', 'Burger Ayam', 2, 40000),
(3, 'Sulaiman', 'Vildag', '8213216549', '2022-11-08', 'Celana', 'Celana Cino Krem', 1, 400000),
(4, 'Irfan', 'Depok', '8123456789', '2022-11-10', 'Kacamata', 'Kacamata Hitam', 1, 99000),
(5, 'Satriatama', 'Depok', '8593216548', '2022-11-24', 'Topi', 'Topi Hitam UI', 2, 79000),
(6, 'Ghianna', 'Jakarta', '8132456789', '2022-11-29', 'Makanan', 'Es Podeng', 5, 10000),
(7, 'Praba', 'Serang', '82264987321', '2022-11-24', 'Alat Musik', 'Bass Fender', 1, 2399000),
(8, 'Arya', 'Serang', '82265498713', '2022-11-02', 'Alat Musik', 'Electric Guitar', 1, 5900000),
(9, 'Wahyu', 'Bekasi', '821321654987', '2022-11-30', 'Elektronik', 'Laptop ASUS TUF Dash F15', 1, 19899000),
(10, 'Atsil', 'Cibubur', '8215467987', '2022-11-17', 'Kendaraan', 'Yamaha Jupiter MX', 1, 16999000),
(11, 'Create', '', '8132654846', '2022-11-18', 'Makanan', 'Hotdog', 1, 29000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sulaiman`
--
ALTER TABLE `sulaiman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sulaiman`
--
ALTER TABLE `sulaiman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
