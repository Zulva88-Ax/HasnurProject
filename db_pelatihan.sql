-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 01 Sep 2024 pada 17.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelatihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihans`
--

CREATE TABLE `pelatihans` (
  `id` int(10) NOT NULL,
  `nama_trainer` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `sesi` int(1) NOT NULL,
  `waktu` time NOT NULL,
  `topik` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelatihans`
--

INSERT INTO `pelatihans` (`id`, `nama_trainer`, `tanggal`, `sesi`, `waktu`, `topik`, `updated_at`, `created_at`) VALUES
(1, 'Taufik', '2024-09-01', 3, '16:33:10', 'PELATIHAN HAFECS', '2024-09-01 10:29:04', '0000-00-00 00:00:00'),
(2, 'koji', '2024-09-01', 1, '17:27:00', 'UJI COBA', '2024-09-01 09:30:28', '2024-09-01 09:30:28'),
(4, 'aji', '2024-09-02', 1, '03:32:00', 'UJI COBA 1', '2024-09-01 11:32:56', '2024-09-01 11:32:56'),
(5, 'pito', '2024-09-19', 1, '22:33:00', 'UJI COBA 3', '2024-09-01 11:33:53', '2024-09-01 11:33:53'),
(6, 'moji', '2024-09-05', 2, '15:34:00', 'UJI COBA 4', '2024-09-01 11:34:33', '2024-09-01 11:34:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
