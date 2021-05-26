-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Bulan Mei 2021 pada 10.14
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postmedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `Id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `gender` enum('P','L') NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` text NOT NULL,
  `pict_profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`Id`, `username`, `full_name`, `gender`, `email`, `password`, `pict_profile`) VALUES
(1, 'didintri196', 'Didin Tri Anggoro', 'L', 'didinri196@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'didin.jpg'),
(2, 'alex', 'Alex Tri', '', 'alex@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(3, 'asd', 'sad', '', 'asdsa@gg.com', '7815696ecbf1c96e6894b779456d330e', ''),
(4, 'admin', 'Supri Sijun', '', 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '3a2d744d04163b01171a35fb0446ed31.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_post`
--

CREATE TABLE `comment_post` (
  `Id` int(11) NOT NULL,
  `CreateAt` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_post`
--

CREATE TABLE `like_post` (
  `Id` int(11) NOT NULL,
  `CreateAt` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `Id` varchar(15) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `ImageUrl` text NOT NULL,
  `Caption` text NOT NULL,
  `CreateAt` int(11) NOT NULL,
  `UpdateAt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`Id`, `AccountID`, `ImageUrl`, `Caption`, `CreateAt`, `UpdateAt`) VALUES
('94vVfqjEL9', 1, 'e2270838afac00c06d6cce5ed3baca5d.jpg', 'World\'s most beautiful car in Curabitur #test drive booking ! the most beatuiful car available in america and the saudia arabia, you can book your test drive by our official website.', 1621999194, 1622016117),
('G34fpwbsUb', 1, '13e6081e97d1d6708f44c37c5fc3d10a.jpg', 'Meja kerja ku sangat bagus sekali.', 1622003428, 1622010604);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `comment_post`
--
ALTER TABLE `comment_post`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `comment_post`
--
ALTER TABLE `comment_post`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `like_post`
--
ALTER TABLE `like_post`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
