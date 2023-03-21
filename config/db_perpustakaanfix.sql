-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2023 at 03:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getALLBuku` ()   BEGIN
SELECT * FROM tb_buku ORDER BY id_buku ASC ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getALLPeminjaman` ()   BEGIN
SELECT * FROM tb_peminjaman ORDER BY id_peminjaman ASC ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getALLPengembalian` ()   BEGIN
SELECT * FROM tb_pengembalian ORDER BY id_pengembalian ASC ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama`, `username`, `password`, `level`) VALUES
(3, 'Superadmin', 'admin', '$2y$10$uHeV9MKEuBg3dTaax3/m7.AQi5RioFwfyOU6CeOTdUNZe1LgTFFHG', '1'),
(4, 'Petugas', 'petugas', '$2y$10$I1wCgGD/fhL.JAiQhweb9OGfMYYrVz.GFdArbhrEsDWocwl9/LKNO', '2'),
(6, 'bejo', 'petugas1', '$2y$10$iLqBZ8GOZeo7bsSnTU5FIOdBx5afoxA.3xUhzSxRtInxE7qD2OZlm', '2'),
(8, 'jojo', 'jojo', '12345', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int NOT NULL,
  `kode_anggota` varchar(10) NOT NULL,
  `nama_anggota` char(255) NOT NULL,
  `jk_anggota` enum('Laki-laki','Perempuan') NOT NULL,
  `jurusan_anggota` char(255) NOT NULL,
  `no_hp_anggota` varchar(13) DEFAULT NULL,
  `alamat_anggota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `kode_anggota`, `nama_anggota`, `jk_anggota`, `jurusan_anggota`, `no_hp_anggota`, `alamat_anggota`) VALUES
(4, '35', 'satria', 'Laki-laki', 'teknik informatika', '081226428336', 'sangkanjoyo'),
(5, '36', 'joko', 'Laki-laki', 'teknik infotmatika', '08122654784', 'kajen'),
(6, '37', 'wati', 'Perempuan', 'telekomunikasi', '081226428337', 'pekalongan'),
(7, '38', 'sulis', 'Perempuan', 'ekonomi', '0812673639363', 'jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int NOT NULL,
  `kode_buku` varchar(5) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` char(255) NOT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `tahun_penerbit` int DEFAULT NULL,
  `stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `kode_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_penerbit`, `stok`) VALUES
(6, 'F2', 'Manusia dan Semesta', 'Peter', 'Ggpedia', 2017, 10),
(10, 'F4', 'belajar python', 'sulastri', 'PT Cipta', 2001, 140),
(11, 'F3', 'belajar data analisis', 'zukifli', 'PT abadi', 2018, 30),
(12, 'F091', 'komunikasi', 'Tarman', 'PT Cipta Karya', 2010, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_petugas` int NOT NULL,
  `kode_petugas` varchar(10) NOT NULL,
  `nama_petugas` char(50) NOT NULL,
  `jabatan_petugas` varchar(255) NOT NULL,
  `no_hp_petugas` varchar(13) NOT NULL,
  `alamat_petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_petugas`, `kode_petugas`, `nama_petugas`, `jabatan_petugas`, `no_hp_petugas`, `alamat_petugas`) VALUES
(1, 'K02', 'Heri', 'Staf', '082421210242', 'Purwokerto'),
(4, 'K03', 'bejo', 'staff', '08126383633', 'semarang'),
(7, 'K01', 'herman', 'staff', '081272483483', 'purwokerto'),
(8, 'K05', 'linda', 'staff', '08126382037', 'bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int NOT NULL,
  `qty` int NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `id_buku` int NOT NULL,
  `id_anggota` int NOT NULL,
  `id_petugas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `qty`, `tanggal_pinjam`, `tanggal_kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
(22, 2, '2023-02-28', '2023-03-02 21:39:00', 12, 4, 1),
(23, 2, '2023-03-08', '2023-03-01 00:07:00', 12, 4, 1),
(24, 1234, '2023-03-01', '2023-03-10 00:53:00', 12, 4, 1);

--
-- Triggers `tb_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `Peminjaman_Stok` AFTER INSERT ON `tb_peminjaman` FOR EACH ROW BEGIN UPDATE tb_buku SET stok = stok - NEW.qty WHERE id_buku = NEW.id_buku; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `id_pengembalian` int NOT NULL,
  `qty` int NOT NULL,
  `tanggal_pengembalian` datetime DEFAULT NULL,
  `id_buku` int NOT NULL,
  `id_anggota` int NOT NULL,
  `id_petugas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengembalian`
--

INSERT INTO `tb_pengembalian` (`id_pengembalian`, `qty`, `tanggal_pengembalian`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
(12, 2, '2023-02-28 21:40:00', 12, 4, 1),
(13, 2, '2023-03-01 00:07:00', 12, 4, 1),
(14, 1234, '2023-03-01 00:54:00', 12, 4, 1);

--
-- Triggers `tb_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `Pengembalian_Stok` AFTER INSERT ON `tb_pengembalian` FOR EACH ROW BEGIN UPDATE tb_buku SET stok = stok + NEW.qty WHERE id_buku = NEW.id_buku; END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`) USING BTREE,
  ADD KEY `id_petugas` (`id_petugas`) USING BTREE,
  ADD KEY `id_anggota` (`id_anggota`) USING BTREE;

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_buku` (`id_buku`) USING BTREE,
  ADD KEY `id_anggota` (`id_anggota`) USING BTREE,
  ADD KEY `id_petugas` (`id_petugas`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  MODIFY `id_pengembalian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_karyawan` (`id_petugas`);

--
-- Constraints for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `tb_pengembalian_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`),
  ADD CONSTRAINT `tb_pengembalian_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `tb_pengembalian_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_karyawan` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
