-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 06:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
-- Table structure for table `antrian`
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
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_pasien`, `waktu`, `keluhan`, `nomor`, `status`) VALUES
(11, 2, '2019-06-19 21:49:30', 'Adem Panas', 1, 'Proses Pembayaran'),
(12, 3, '2019-06-20 21:21:28', 'pusing', 1, 'Menunggu Obat');

-- --------------------------------------------------------

--
-- Table structure for table `detail_diagnosa`
--

CREATE TABLE `detail_diagnosa` (
  `id_detail` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_diagnosa` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_diagnosa`
--

INSERT INTO `detail_diagnosa` (`id_detail`, `id_pemeriksaan`, `id_diagnosa`) VALUES
(7, 5, 1),
(8, 5, 2),
(9, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
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
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`id_detail`, `id_resep`, `id_obat`, `dosis1`, `dosis2`, `jumlah`, `subtotal`) VALUES
(5, 5, 1, 3, 1, 1, 6000),
(6, 5, 2, 3, 1, 1, 2000),
(7, 6, 2, 2, 1, 1, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` tinyint(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `nama`, `status`) VALUES
(1, 'Batuk', 'Aktif'),
(2, 'pusing', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id_kategori` tinyint(3) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_obat`
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
-- Table structure for table `obat`
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
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `id_kategori`, `id_satuan`, `harga_jual`, `stock`, `tgl_kadaluarsa`, `id_user`, `status`) VALUES
(1, 'Acarbose', 5, 23, 6000, 10, '2023-08-04', 1, 'Aktif'),
(2, 'Paracetamol', 2, 24, 2000, 10, '2025-09-08', 1, 'Aktif'),
(3, 'bodrex', 8, 24, 1000, 10, '2019-05-31', 1, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
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
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_identitas`, `nama`, `tmpt_lahir`, `tgl_lahir`, `gender`, `alamat`, `no_hp`, `pendidikan`, `status_perkawinan`, `status`, `username`, `password`) VALUES
(1, '124324234234', 'Iyek Ali', 'Jember', '1998-08-09', 'Laki-laki', 'Gumuk Mas', '085235711871', 'D4', 'Kawin', 'Aktif', NULL, NULL),
(2, '111111', 'fatan', 'bondowoso', '2019-05-03', 'Laki-laki', 'mastrip', '08522121232', 'SD', 'Kawin', 'Aktif', NULL, NULL),
(3, '1231121121212', 'Isa Kurniawan', 'Banyuwangi', '2000-06-14', 'Laki-laki', 'Jl. Mastrip Timur', '085235711872', 'SMA', 'Belum Kawin', 'Aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` tinyint(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(7) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `nama`, `harga`, `status`) VALUES
(1, 'Suntik', 20000, 'Aktif'),
(2, 'Akupuntur', 60000, 'Aktif'),
(3, 'pijet', 100000, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
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

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
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
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_antrian`, `id_user`, `pemeriksaan`, `tensi`, `suhu_badan`) VALUES
(5, 11, 3, 'Fisik', '120/90', 37),
(6, 12, 3, 'fisik', '120/90', 36);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `harga_resep` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `id_pemeriksaan`, `harga_resep`) VALUES
(5, 5, 8000),
(6, 6, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `satuan_obat`
--

CREATE TABLE `satuan_obat` (
  `id_satuan` tinyint(3) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_obat`
--

INSERT INTO `satuan_obat` (`id_satuan`, `satuan`, `status`) VALUES
(1, 'KG', 'Aktif'),
(22, 'MG', 'Aktif'),
(23, 'Botol', 'Aktif'),
(24, 'Lembar', 'Aktif'),
(25, 'mg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_pelayanan` tinyint(3) NOT NULL,
  `subtotal` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `id_pemeriksaan`, `id_pelayanan`, `subtotal`) VALUES
(7, 5, 2, 60000),
(8, 5, 3, 100000),
(9, 5, 1, 20000),
(10, 6, 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `tgl_lahir`, `gender`, `alamat`, `no_hp`, `agama`, `foto`, `username`, `password`, `level`, `status`) VALUES
(1, 'Inant Kharisma', '1999-05-04', 'Laki-laki', 'Jl. Mastrip 7', '082359382266', 'Islam', 'face21.jpg', 'inant', '$2y$12$lGta2RXZq7loNjhCD15uIeMYAUaC0w2KaPtw/BpwPn82A.lCKk.I.', 'Admin', 'Aktif'),
(2, 'Kahfinda kevin', '1998-09-09', 'Laki-laki', 'Alamat', '085235711871', 'Islam', 'face22.jpg', 'kevin', '$2y$10$PJMp77Y6Fws9UfkVrvGYWOmy0gIt7sF.4tUwbJn2jkHkdYjl.D1M2', 'Resepsionis', 'Aktif'),
(3, 'Iyek', '1999-08-09', 'Laki-laki', 'Alamat', '085235711873', 'Islam', 'face18.jpg', 'iyek', '$2y$10$sB2jVZufcz.xdm583xGrbOLxv7RJO5EKAgYH9LRMSwxTnKiPm/E2e', 'Perawat', 'Aktif'),
(4, 'Leli', '1999-07-09', 'Laki-laki', 'Alamat', '08523571187', 'Islam', 'face26.jpg', 'leli', '$2y$10$3AvFCCnNaD7Zk5HN2xgJo.6ZkqR1JABES/a8MDYogCK8Ru9q68XC.', 'Farmasi', 'Aktif'),
(5, 'Salman', '1998-08-07', 'Laki-laki', 'Mastrip 5', '085235711876', 'Islam', 'face4.jpg', 'salman', '$2y$10$WfrPYpfW0P0IPg/O1MErGeWGeVkHm.iVV75V.0Uqxbur24Hzopfvy', 'Admin', 'Aktif'),
(6, 'kevin', '2222-02-01', 'Laki-laki', 'jl.mastrip', '083847182005', 'Islam', 'default.jpg', 'kevin', '$2y$10$z6eCAXSBnZZGShgTySWVyutxHtP2SfE8.ZuS.hl1/qy0SSRkMHkC.', 'Admin', 'Non Aktif'),
(7, 'david', '2019-04-12', 'Laki-laki', 'jl mastrip', '085111156789', 'Islam', 'face1.jpg', 'david', '$2y$10$abYyOOrkLIlDeVZNkBSdZutS.lrkzOC8Z14E.PIyzIqSheU4nanKS', 'Admin', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`),
  ADD KEY `id_diagnosa` (`id_diagnosa`);

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_resep` (`id_resep`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_antrian` (`id_antrian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_antrian` (`id_antrian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`);

--
-- Indexes for table `satuan_obat`
--
ALTER TABLE `satuan_obat`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`),
  ADD KEY `id_pelayanan` (`id_pelayanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id_kategori` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `satuan_obat`
--
ALTER TABLE `satuan_obat`
  MODIFY `id_satuan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Constraints for table `detail_diagnosa`
--
ALTER TABLE `detail_diagnosa`
  ADD CONSTRAINT `detail_diagnosa_ibfk_1` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`id_pemeriksaan`),
  ADD CONSTRAINT `detail_diagnosa_ibfk_2` FOREIGN KEY (`id_diagnosa`) REFERENCES `diagnosa` (`id_diagnosa`);

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`),
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_obat` (`id_kategori`),
  ADD CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan_obat` (`id_satuan`),
  ADD CONSTRAINT `obat_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_antrian`) REFERENCES `antrian` (`id_antrian`);

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`id_antrian`) REFERENCES `antrian` (`id_antrian`),
  ADD CONSTRAINT `pemeriksaan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`id_pemeriksaan`);

--
-- Constraints for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD CONSTRAINT `tindakan_ibfk_1` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`id_pemeriksaan`),
  ADD CONSTRAINT `tindakan_ibfk_2` FOREIGN KEY (`id_pelayanan`) REFERENCES `pelayanan` (`id_pelayanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
