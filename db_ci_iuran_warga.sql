-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2023 pada 12.54
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
-- Database: `db_ci_iuran_warga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bukti`
--

CREATE TABLE `tbl_bukti` (
  `id` int(11) NOT NULL,
  `id_warga` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_bukti`
--

INSERT INTO `tbl_bukti` (`id`, `id_warga`, `gambar`) VALUES
(16, 10, '1314003.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_iuran`
--

CREATE TABLE `tbl_iuran` (
  `id` int(11) NOT NULL,
  `id_warga` varchar(255) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `iuran_bulan` varchar(10) DEFAULT NULL,
  `nominal_iuran` varchar(20) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `adddate` datetime DEFAULT NULL,
  `upddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_iuran`
--

INSERT INTO `tbl_iuran` (`id`, `id_warga`, `tanggal_bayar`, `iuran_bulan`, `nominal_iuran`, `status`, `adddate`, `upddate`) VALUES
(1, '1', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:10', '2023-05-30 07:35:48'),
(2, '2', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:25', NULL),
(3, '3', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:32', NULL),
(4, '4', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:41', NULL),
(5, '5', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:47', NULL),
(6, '1', '2023-05-30', '2023-06', '65000', '1', '2023-05-30 07:35:54', '2023-05-30 07:36:56'),
(7, '2', '2023-07-01', '2023-08', '65000', '1', '2023-07-01 21:57:15', NULL),
(8, '5', '2023-07-01', '2023-07', '65000', '1', '2023-07-01 21:57:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nominal` int(30) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `tanggal_pengeluaran` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `adddate` datetime DEFAULT NULL,
  `upddate` datetime DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`id`, `nama`, `nominal`, `tanggal`, `tanggal_pengeluaran`, `keterangan`, `adddate`, `upddate`, `jumlah`, `harga`) VALUES
(1, 'Biaya tukang', 100000, NULL, '2023-05-02', 'Tukang untuk membersihkan lingkungan', '2023-05-30 07:37:44', '2023-05-30 07:44:18', 12, 90000000),
(7, 'dsdsd', 24, NULL, '2023-07-02', 'ewwq', '2023-07-01 22:00:17', NULL, 2, 12),
(8, 'dsdsd', 100000, NULL, '', 'ewwq', '2023-07-01 22:02:29', NULL, 5, 20000),
(9, 'dsdsd', 264, NULL, '2023-07-02', 'ewwq', '2023-07-01 22:05:29', NULL, 22, 12),
(10, 'Daging', 24, NULL, '2023-07-16', 'daging sapi', '2023-07-16 10:06:45', NULL, 2, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `upddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama`, `type`, `upddate`) VALUES
(1, '65000', 'nominal_iuran', '2023-05-22 06:47:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `add_date` datetime DEFAULT NULL,
  `upd_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `add_date`, `upd_date`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `id` int(11) NOT NULL,
  `nomor_nik_ktp` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `nomor_rumah` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_tinggal` varchar(1) DEFAULT NULL,
  `adddate` datetime DEFAULT NULL,
  `upddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_warga`
--

INSERT INTO `tbl_warga` (`id`, `nomor_nik_ktp`, `nama`, `nomor_telepon`, `nomor_rumah`, `alamat`, `status_tinggal`, `adddate`, `upddate`) VALUES
(1, '1234567889', 'Rifaldi', '085777283013', '41', 'Jl. Kimia No 41', '1', '2023-05-30 07:28:52', '2023-05-30 07:30:51'),
(2, '1234567882', 'Rodin', '08129587441', '42', 'Jl. Kimia No 42', '1', '2023-05-30 07:28:52', NULL),
(3, '1234567883', 'Ryan', '089872113451', '43', 'Jl. Kimia No 43', '1', '2023-05-30 07:28:52', NULL),
(4, '1234567884', 'Suparwanto', '084211345867', '44', 'Jl. Kimia No 44', '1', '2023-05-30 07:28:52', NULL),
(5, '1234567885', 'Fahri', '084722618931', '45', 'Jl. Kimia No 45', '1', '2023-05-30 07:28:52', NULL),
(10, '23763812656', 'dibo', '087500022333', '7', 'Jalan jalan', '2', '2023-07-02 06:39:44', '2023-07-02 06:41:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_warga` (`id_warga`);

--
-- Indeks untuk tabel `tbl_iuran`
--
ALTER TABLE `tbl_iuran`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_iuran`
--
ALTER TABLE `tbl_iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_bukti`
--
ALTER TABLE `tbl_bukti`
  ADD CONSTRAINT `tbl_bukti_ibfk_1` FOREIGN KEY (`id_warga`) REFERENCES `tbl_warga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
