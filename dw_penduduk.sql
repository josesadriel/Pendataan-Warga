-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2021 pada 22.36
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dw_penduduk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status` enum('sekretaris','admin','user') NOT NULL DEFAULT 'sekretaris',
  `pendidikan` text NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`username`, `password`, `nama`, `alamat`, `no_hp`, `status`, `pendidikan`, `gambar`) VALUES
('admin', 'admin', 'Admin', '-', '-', 'admin', '-', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `pukul` varchar(6) NOT NULL,
  `kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama` text NOT NULL,
  `tempatLahir` text NOT NULL,
  `tglLahir` date NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `kelurahan` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kota` text NOT NULL,
  `provinsi` text NOT NULL,
  `agama` enum('Islam','Protestan','Katolik','Buddha','Hindu','Kong Hu Cu') NOT NULL,
  `status` enum('Menikah','Belum Menikah','Cerai Hidup','Cerai Mati') NOT NULL,
  `diKeluarga` enum('Kepala Keluarga','Suami','Isteri','Anak','Menantu','Cucu','Orangtua','Mertua','Famili','Famili Lain','Lainnya') NOT NULL,
  `pendidikan` enum('TIDAK / BELUM SEKOLAH','BELUM TAMAT SD/SEDERAJAT','TAMAT SD / SEDERAJAT','SLTP/SEDERAJAT','SLTA / SEDERAJAT','DIPLOMA I / II','AKADEMI/ DIPLOMA III/S. MUDA','DIPLOMA IV/ STRATA I','STRATA II','STRATA III') NOT NULL,
  `pekerjaan` enum('Belum Bekerja','Swasta','ASN','Wiraswasta','Pelajar') NOT NULL,
  `kependudukan` enum('tetap','musiman') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
