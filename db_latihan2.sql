-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2020 pada 12.51
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `angkatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `namalengkap`, `prodi`, `angkatan`) VALUES
(2, '008', 'Marcella', 'Teknik Komputer', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_peminjaman`
--

CREATE TABLE `tabel_peminjaman` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(100) NOT NULL,
  `id_peminjam` varchar(100) NOT NULL,
  `tanggal_pinjam` varchar(100) NOT NULL,
  `tanggal_kembali` varchar(100) NOT NULL,
  `denda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hakakses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `username`, `password`, `hakakses`) VALUES
(5, 'suho', 'suho1', 'Admin'),
(6, 'kai', 'kai1', 'Nonadmin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_peminjaman`
--
ALTER TABLE `tabel_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_peminjaman`
--
ALTER TABLE `tabel_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
