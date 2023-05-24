-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2023 pada 04.55
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asika`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` varchar(50) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `no_polisi`, `model`) VALUES
('MBL1684781834', 'DB 4110 GS', 'Toyota Supra'),
('MBL1684781878', 'DB 0116 GG', 'Rubicon'),
('MBL1684868923', 'DB 123 TEST', 'Tesla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `no_pesanan` varchar(100) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `maksud` varchar(255) NOT NULL,
  `user` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `id_user` int(100) NOT NULL,
  `waktu_selesai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `no_pesanan`, `tujuan`, `maksud`, `user`, `tanggal`, `waktu`, `status`, `id_user`, `waktu_selesai`) VALUES
(34, '6466e846e8e2e', 'test', 'test', 'Pedro V Rapar', '2023-05-19', '11:08', 'selesai', 1, '2023-05-21 18:56:12'),
(35, '6466e84ebe3b1', 'tsetasf', 'aasdfasdf', 'Pedro V Rapar', '2023-05-19', '11:09', 'selesai', 1, '2023-05-21 18:56:12'),
(37, '646717cd5d75c', 'test', 'tesea', 'Pedro V Rapar', '2023-05-19', '02:31', 'selesai', 1, '2023-05-21 18:57:04'),
(39, '646b5bfec9c1d', 'test', 'testsdfsdf', 'Pedro V Rapar', '2023-05-23', '09:00', 'selesai', 1, '2023-05-24 02:52:36'),
(41, '646d68544456d', 'tset', 'test', 'Pedro V Rapar', '2023-05-24', '10:30', 'selesai', 1, '2023-05-24 02:52:59'),
(42, '646d68d64c2c2', 'coba', 'coba', 'User 1', '2023-05-24', '10:30', 'selesai', 3, '2023-05-24 01:32:24'),
(43, '646d6b0d9e803', 'Manado', 'mantos', 'User SCM', '2023-05-24', '13:00', 'selesai', 6, '2023-05-24 01:42:09'),
(44, '646d755676119', '123', '123', 'User 1', '2023-05-24', '10:24', 'selesai', 3, '2023-05-24 02:30:09'),
(45, '646d778510822', 'test', 'test', 'User 1', '2023-05-24', '10:33', 'selesai', 3, '2023-05-24 02:36:33'),
(46, '646d79d17fc6d', 'test', 'tset', 'User 1', '2023-05-24', '10:43', 'selesai', 3, '2023-05-24 02:44:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setuju`
--

CREATE TABLE `tb_setuju` (
  `id_setuju` varchar(100) NOT NULL,
  `id_reservasi` varchar(100) NOT NULL,
  `id_supir` varchar(100) NOT NULL,
  `id_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_setuju`
--

INSERT INTO `tb_setuju` (`id_setuju`, `id_reservasi`, `id_supir`, `id_kendaraan`) VALUES
('12', '35', '3', '1'),
('13', '33', '4', '4'),
('14', '34', '3', '1'),
('15', '36', '4', '4'),
('16', '37', '4', '4'),
('17', '38', '3', '1'),
('18', '0', '0', '0'),
('19', '0', '0', '0'),
('20', '0', '0', '0'),
('21', '40', '0', '0'),
('22', '40', '0', '0'),
('23', '40', '0', '0'),
('24', '40', 'DRV1684781681', 'MBL1684781878'),
('25', '39', 'DRV1684781669', 'MBL1684781834'),
('STJ1684870206', '40', 'DRV1684781681', 'MBL1684781878'),
('STJ1684870433', '40', 'DRV1684781681', 'MBL1684781878'),
('STJ1684891633', '39', 'DRV1684781681', 'MBL1684781878'),
('STJ1684891772', '41', 'DRV1684891677', 'MBL1684781878'),
('STJ1684891913', '42', 'DRV1684781669', 'MBL1684781834'),
('STJ1684892461', '43', 'DRV1684892233', 'MBL1684781834'),
('STJ1684895069', '44', 'DRV1684781681', 'MBL1684781878'),
('STJ1684895634', '45', 'DRV1684855826', 'MBL1684868923'),
('STJ1684896215', '46', 'DRV1684781681', 'MBL1684781878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `id_setuju` varchar(100) DEFAULT NULL,
  `id_supir` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `id_setuju`, `id_supir`, `status`) VALUES
(1, 'STJ1684891913', 'DRV1684781669', 'Ready'),
(2, 'STJ1684896215', 'DRV1684781681', 'Ready'),
(3, 'STJ1684895634', 'DRV1684855826', 'Sibuk'),
(4, 'STJ1684891772', 'DRV1684891677', 'Ready'),
(5, 'STJ1684892461', 'DRV1684892233', 'Sibuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supir`
--

CREATE TABLE `tb_supir` (
  `id_supir` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telp` varchar(50) NOT NULL,
  `id_kendaraan` varchar(50) DEFAULT NULL,
  `no_polisi` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supir`
--

INSERT INTO `tb_supir` (`id_supir`, `nama`, `nomor_telp`, `id_kendaraan`, `no_polisi`, `model`) VALUES
('DRV1684781669', 'Edo', '085823404770', 'MBL1684781834', 'DB 4110 GS', 'Toyota Supra'),
('DRV1684781681', 'Faldy', '085817384156', 'MBL1684781878', 'DB 0116 GG', 'Rubicon'),
('DRV1684855826', 'Test', '123321', 'MBL1684868923', 'DB 123 TEST', 'Tesla'),
('DRV1684891677', 'Patrik', '0123897', 'MBL1684781878', 'DB 0116 GG', 'Rubicon'),
('DRV1684892233', 'yayan', '091233333', 'MBL1684781834', 'DB 4110 GS', 'Toyota Supra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `fungsi` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `fungsi`, `username`, `password`, `role`) VALUES
(1, 'Pedro V Rapar', 'Developer', 'edo', 'edoedo', 'developer'),
(2, 'Administrator', 'ICT', 'admin', 'admin', 'admin'),
(3, 'User 1', 'ICT', 'user', 'user', 'user'),
(6, 'User SCM', 'SCM', 'user2', 'user2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `tb_setuju`
--
ALTER TABLE `tb_setuju`
  ADD PRIMARY KEY (`id_setuju`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
