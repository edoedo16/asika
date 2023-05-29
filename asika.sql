-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2023 pada 01.43
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
  `fungsi` varchar(100) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `id_user` varchar(100) NOT NULL,
  `waktu_selesai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `no_pesanan`, `tujuan`, `maksud`, `user`, `fungsi`, `nomor`, `tanggal`, `waktu`, `status`, `id_user`, `waktu_selesai`, `keterangan`) VALUES
(53, '64701fd6d8699', 'test', 'test', 'User SCM', 'SCM', '081523801075', '2023-05-26', '10:56', 'selesai', '6', '2023-05-29 01:38:25', ''),
(61, '6473f31d969bb', 'test', 'test', 'User SCM', '', '', '2023-05-29', '08:33', 'selesai', '6', '2023-05-29 01:40:16', ''),
(62, '6473fc6d44ee0', 'test', 'test', 'User SCM', 'SCM', '081523801075', '2023-05-29', '09:14', 'selesai', '6', '2023-05-29 01:40:59', ''),
(63, '647404df7473e', 'test', 'test', 'Pedro V Rapar', 'Developer', '085823404770', '2023-05-29', '09:49', 'ditolak', '1', '2023-05-29 03:09:33', 'testasets'),
(64, '6474178731404', 'test', 'test', 'User SCM', 'SCM', '081523801075', '2023-05-29', '11:09', 'ditolak', '6', '2023-05-29 03:10:26', 'Faldy sementara tidor'),
(65, '647418a5d8715', 'test', 'test', 'User SCM', 'SCM', '081523801075', '2023-05-29', '11:14', 'ditolak', '6', '2023-05-29 03:15:12', 'tidak ada driver'),
(66, '64741ae8bf769', 'PLTP 5 &amp; 6', 'Monitoring Jaringan', 'Sapi', 'ICT', '085158843252', '2023-05-29', '13:30', 'selesai', '8', '2023-05-29 03:25:08', '');

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
('STJ1684896215', '46', 'DRV1684781681', 'MBL1684781878'),
('STJ1684910559', '47', 'DRV1684891677', 'MBL1684781878'),
('STJ1685101996', '60', 'DRV1684781681', 'MBL1684781878'),
('STJ1685320205', '53', 'DRV1684781681', 'MBL1684781878'),
('STJ1685322512', '61', 'DRV1684781681', 'MBL1684781878'),
('STJ1685322964', '62', 'DRV1684781681', 'MBL1684781878'),
('STJ1685323055', '62', 'DRV1684781681', 'MBL1684781878'),
('STJ1685330675', '66', 'DRV1684892233', 'MBL1684781834');

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
(1, '', 'DRV1684781669', 'Ready'),
(2, '', 'DRV1684781681', 'Ready'),
(3, '', 'DRV1684855826', 'Ready'),
(4, '', 'DRV1684891677', 'Ready'),
(5, '', 'DRV1684892233', 'Ready'),
(6, NULL, 'DRV1685070918', 'Ready');

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
('DRV1684892233', 'Yayan', '08975574033', 'MBL1684781834', 'DB 4110 GS', 'Toyota Supra'),
('DRV1685070918', 'Ka Shandy', '085256031858', 'MBL1684781878', 'DB 0116 GG', 'Rubicon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `fungsi` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `nomor`, `fungsi`, `username`, `password`, `role`) VALUES
(1, 'Pedro V Rapar', '085823404770', 'Developer', 'edo', 'edoedo', 'developer'),
(2, 'Administrator', '085817384156', 'ICT', 'admin', 'admin', 'admin'),
(3, 'User 1', '085256031858', 'ICT', 'user', 'user', 'user'),
(6, 'User SCM', '123123123', 'SCM', 'user2', 'user2', 'user'),
(7, 'tes', '123', 'test', 'test', 'test', 'user'),
(8, 'Sapi', '085158843252', 'ICT', 'user3', 'user3', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_sementara`
--

CREATE TABLE `tb_user_sementara` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `fungsi` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indeks untuk tabel `tb_user_sementara`
--
ALTER TABLE `tb_user_sementara`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_user_sementara`
--
ALTER TABLE `tb_user_sementara`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
