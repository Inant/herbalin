-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2019 pada 18.40
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herbalin_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `keluhan` text NOT NULL,
  `nomor` int(11) NOT NULL,
  `status` enum('Mengantri','Diperiksa','Menunggu Obat','Proses Pembayaran','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_pasien`, `waktu`, `keluhan`, `nomor`, `status`) VALUES
(16, 9, '2019-06-21 14:39:34', 'Pusing, Penglihatan buram, Mual.', 1, 'Selesai'),
(23, 1, '2019-06-27 00:47:03', 'Pusing', 1, 'Selesai'),
(24, 3, '2019-07-03 22:41:05', 'Sakit pinggang', 1, 'Selesai'),
(25, 1, '2019-07-07 10:02:18', 'Pilek', 1, 'Menunggu Obat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_diagnosa`
--

CREATE TABLE `detail_diagnosa` (
  `id_detail` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_diagnosa` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_diagnosa`
--

INSERT INTO `detail_diagnosa` (`id_detail`, `id_pemeriksaan`, `id_diagnosa`) VALUES
(12, 26, 5),
(13, 27, 5),
(14, 28, 6),
(15, 29, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_detail` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `id_obat` int(7) NOT NULL,
  `dosis1` tinyint(2) NOT NULL,
  `dosis2` tinyint(2) NOT NULL,
  `jumlah` tinyint(3) NOT NULL,
  `subtotal` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_resep`
--

INSERT INTO `detail_resep` (`id_detail`, `id_resep`, `id_obat`, `dosis1`, `dosis2`, `jumlah`, `subtotal`) VALUES
(12, 26, 1, 3, 1, 1, 6000),
(13, 26, 2, 2, 1, 2, 2000),
(14, 27, 2, 2, 1, 1, 2000),
(15, 27, 1, 3, 1, 1, 6000),
(16, 28, 3, 1, 1, 2, 1000),
(17, 29, 1, 2, 1, 1, 6000),
(18, 29, 2, 3, 1, 2, 2000),
(19, 29, 3, 3, 1, 2, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` tinyint(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `nama`, `status`) VALUES
(3, 'Hiperglikemia', 'Aktif'),
(4, 'Hiperlipidemia', 'Aktif'),
(5, 'Hipertensi', 'Aktif'),
(6, 'Artritis', 'Aktif'),
(7, 'Hiperurisemia', 'Aktif'),
(8, 'Hepatitis', 'Aktif'),
(9, 'Dispepsia', 'Aktif'),
(10, 'Hemorhoid', 'Aktif'),
(11, 'Obesitas', 'Aktif'),
(12, 'Tumor/kanker', 'Aktif');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `getallkunjungan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `getallkunjungan` (
`waktu` datetime
,`keluhan` text
,`nama` varchar(50)
,`usia` int(5)
,`gender` enum('Laki-laki','Perempuan')
,`alamat` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `getallpembayaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `getallpembayaran` (
`waktu` datetime
,`grand_total` int(9)
,`total_bayar` int(9)
,`kembalian` int(7)
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori` tinyint(3) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_obat`
--

INSERT INTO `kategori_obat` (`id_kategori`, `kategori`, `status`) VALUES
(1, 'Alat Kesehatan satu', 'Non Aktif'),
(2, 'Kapsul', 'Aktif'),
(3, 'Pill', 'Aktif'),
(4, 'Sirup', 'Aktif'),
(5, 'Obat Herbal', 'Aktif'),
(6, 'Salep', 'Aktif'),
(7, 'cair', 'Aktif'),
(8, 'kpasul2', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kategori` tinyint(3) NOT NULL,
  `id_satuan` tinyint(4) NOT NULL,
  `harga_jual` int(7) NOT NULL,
  `stock` smallint(5) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `id_user` tinyint(3) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `id_kategori`, `id_satuan`, `harga_jual`, `stock`, `tgl_kadaluarsa`, `id_user`, `status`) VALUES
(1, 'Acarbose', 5, 23, 6000, 7, '2023-08-04', 1, 'Aktif'),
(2, 'Paracetamol', 2, 24, 2000, 5, '2020-01-11', 1, 'Aktif'),
(3, 'bodrex', 8, 24, 1000, 6, '2021-02-05', 1, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `no_identitas` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `pendidikan` varchar(5) NOT NULL,
  `status_perkawinan` enum('Kawin','Belum Kawin') NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_identitas`, `nama`, `tmpt_lahir`, `tgl_lahir`, `gender`, `alamat`, `no_hp`, `pendidikan`, `status_perkawinan`, `status`, `username`, `password`) VALUES
(1, '124324234234', 'Iyek Ali', 'Jember', '1998-08-09', 'Laki-laki', 'Gumuk Mas', '085235711871', 'D4', 'Kawin', 'Aktif', NULL, NULL),
(2, '111111', 'fatan', 'bondowoso', '2019-05-03', 'Laki-laki', 'mastrip', '08522121232', 'SD', 'Kawin', 'Aktif', NULL, NULL),
(3, '1231121121212', 'Isa Kurniawan', 'Banyuwangi', '2000-06-14', 'Laki-laki', 'Jl. Mastrip Timur', '085235711872', 'SMA', 'Belum Kawin', 'Aktif', NULL, NULL),
(8, '122312232123', 'saya', 'Jember', '2000-03-29', 'Laki-laki', 'Jl. Mastrip 5, Sumbersari, Jember', '085258887156', 'SMA', 'Belum Kawin', 'Aktif', 'nangkabunyok', '$2y$10$NKgA0SfkNKfR6Y1GY8xRHO5PKdeb14cooXlhBNf9TlsheDMiXcdim'),
(9, '776676767128', 'siska', 'Banyuwangi', '1998-03-14', 'Perempuan', 'Jl. Kaliurang, Sumbersari, Jember', '085258887155', 'SMA', 'Belum Kawin', 'Aktif', 'siska1', '$2y$10$CXjgO7By4F72zMyZtouGYeKdlKyPxaTNJgXPQd3MDy1MO/kGgDtoO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` tinyint(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(7) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `nama`, `harga`, `status`) VALUES
(4, 'Acupunture', 50000, 'Aktif'),
(5, 'Acupressure', 40000, 'Aktif'),
(6, 'Bekam', 50000, 'Aktif'),
(7, 'Hipno Terapi', 30000, 'Aktif'),
(8, 'Cek Gula Darah', 20000, 'Aktif'),
(9, 'Cek Asam Urat', 15000, 'Aktif'),
(10, 'Cek Kolesterol', 15000, 'Aktif'),
(11, 'Rehabilitasi Strok', 50000, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `grand_total` int(9) NOT NULL,
  `total_bayar` int(9) NOT NULL,
  `kembalian` int(7) NOT NULL,
  `id_user` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_antrian`, `waktu`, `grand_total`, `total_bayar`, `kembalian`, `id_user`) VALUES
(1, 24, '2019-07-03 18:54:38', 41000, 50000, 9000, 3),
(3, 16, '2019-07-05 15:34:19', 58000, 60000, 2000, 3),
(4, 23, '2019-07-05 16:53:57', 58000, 60000, 2000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `id_user` tinyint(3) NOT NULL,
  `pemeriksaan` text NOT NULL,
  `tensi` varchar(10) NOT NULL,
  `suhu_badan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_antrian`, `id_user`, `pemeriksaan`, `tensi`, `suhu_badan`) VALUES
(26, 16, 3, 'fisik', '150/120', 35),
(27, 23, 3, 'fisik', '140/110', 35),
(28, 24, 3, 'fisik', '120/100', 35),
(29, 25, 3, 'fisik', '120/100', 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `harga_resep` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id_resep`, `id_pemeriksaan`, `harga_resep`) VALUES
(26, 26, 8000),
(27, 27, 8000),
(28, 28, 1000),
(29, 29, 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_obat`
--

CREATE TABLE `satuan_obat` (
  `id_satuan` tinyint(3) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan_obat`
--

INSERT INTO `satuan_obat` (`id_satuan`, `satuan`, `status`) VALUES
(1, 'KG', 'Aktif'),
(22, 'MG', 'Aktif'),
(23, 'Botol', 'Aktif'),
(24, 'Lembar', 'Aktif'),
(25, 'mg', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_pelayanan` tinyint(3) NOT NULL,
  `subtotal` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `id_pemeriksaan`, `id_pelayanan`, `subtotal`) VALUES
(13, 26, 4, 50000),
(14, 27, 4, 50000),
(15, 28, 5, 40000),
(16, 29, 4, 50000),
(17, 29, 6, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` set('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `foto` varchar(64) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` enum('Admin','Resepsionis','Perawat','Farmasi','Kasir','Owner') NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `tgl_lahir`, `gender`, `alamat`, `no_hp`, `agama`, `foto`, `username`, `password`, `level`, `status`) VALUES
(1, 'Inant Kharisma', '1999-05-04', 'Laki-laki', 'Jl. Mastrip 7', '082359382266', 'Islam', 'face21.jpg', 'inant', '$2y$12$lGta2RXZq7loNjhCD15uIeMYAUaC0w2KaPtw/BpwPn82A.lCKk.I.', 'Admin', 'Aktif'),
(2, 'Kahfinda kevin', '1998-09-09', 'Laki-laki', 'Alamat', '085235711871', 'Islam', 'face22.jpg', 'kevin', '$2y$10$PJMp77Y6Fws9UfkVrvGYWOmy0gIt7sF.4tUwbJn2jkHkdYjl.D1M2', 'Resepsionis', 'Aktif'),
(3, 'Iyek', '1999-08-09', 'Laki-laki', 'Alamat', '085235711873', 'Islam', 'face18.jpg', 'iyek', '$2y$10$sB2jVZufcz.xdm583xGrbOLxv7RJO5EKAgYH9LRMSwxTnKiPm/E2e', 'Perawat', 'Aktif'),
(4, 'Leli', '1999-07-09', 'Laki-laki', 'Alamat', '08523571187', 'Islam', 'face26.jpg', 'leli', '$2y$10$3AvFCCnNaD7Zk5HN2xgJo.6ZkqR1JABES/a8MDYogCK8Ru9q68XC.', 'Farmasi', 'Aktif'),
(5, 'Salman', '1998-08-07', 'Laki-laki', 'Mastrip 5', '085235711876', 'Islam', 'face4.jpg', 'salman', '$2y$10$WfrPYpfW0P0IPg/O1MErGeWGeVkHm.iVV75V.0Uqxbur24Hzopfvy', 'Admin', 'Aktif'),
(6, 'kevin', '2222-02-01', 'Laki-laki', 'jl.mastrip', '083847182005', 'Islam', 'default.jpg', 'kevin', '$2y$10$z6eCAXSBnZZGShgTySWVyutxHtP2SfE8.ZuS.hl1/qy0SSRkMHkC.', 'Admin', 'Non Aktif'),
(7, 'david', '2019-04-12', 'Laki-laki', 'jl mastrip', '085111156789', 'Islam', 'face1.jpg', 'david', '$2y$10$abYyOOrkLIlDeVZNkBSdZutS.lrkzOC8Z14E.PIyzIqSheU4nanKS', 'Admin', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur untuk view `getallkunjungan`
--
DROP TABLE IF EXISTS `getallkunjungan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getallkunjungan`  AS  select `a`.`waktu` AS `waktu`,`a`.`keluhan` AS `keluhan`,`p`.`nama` AS `nama`,(year(curdate()) - year(`p`.`tgl_lahir`)) AS `usia`,`p`.`gender` AS `gender`,`p`.`alamat` AS `alamat` from (`antrian` `a` join `pasien` `p` on((`p`.`id_pasien` = `a`.`id_pasien`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `getallpembayaran`
--
DROP TABLE IF EXISTS `getallpembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getallpembayaran`  AS  select `pb`.`waktu` AS `waktu`,`pb`.`grand_total` AS `grand_total`,`pb`.`total_bayar` AS `total_bayar`,`pb`.`kembalian` AS `kembalian`,`p`.`nama` AS `nama` from ((`pembayaran` `pb` join `antrian` `a` on((`pb`.`id_antrian` = `a`.`id_antrian`))) join `pasien` `p` on((`p`.`id_pasien` = `a`.`id_pasien`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`),
  ADD KEY `id_diagnosa` (`id_diagnosa`);

--
-- Indeks untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_resep` (`id_resep`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indeks untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_antrian` (`id_antrian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_antrian` (`id_antrian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`);

--
-- Indeks untuk tabel `satuan_obat`
--
ALTER TABLE `satuan_obat`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`),
  ADD KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `satuan_obat`
--
ALTER TABLE `satuan_obat`
  MODIFY `id_satuan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD CONSTRAINT `detail_diagnosa_ibfk_1` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`id_pemeriksaan`),
  ADD CONSTRAINT `detail_diagnosa_ibfk_2` FOREIGN KEY (`id_diagnosa`) REFERENCES `diagnosa` (`id_diagnosa`);

--
-- Ketidakleluasaan untuk tabel `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`),
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_obat` (`id_kategori`),
  ADD CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan_obat` (`id_satuan`),
  ADD CONSTRAINT `obat_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_antrian`) REFERENCES `antrian` (`id_antrian`);

--
-- Ketidakleluasaan untuk tabel `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`id_antrian`) REFERENCES `antrian` (`id_antrian`),
  ADD CONSTRAINT `pemeriksaan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`id_pemeriksaan`);

--
-- Ketidakleluasaan untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD CONSTRAINT `tindakan_ibfk_1` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`id_pemeriksaan`),
  ADD CONSTRAINT `tindakan_ibfk_2` FOREIGN KEY (`id_pelayanan`) REFERENCES `pelayanan` (`id_pelayanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
