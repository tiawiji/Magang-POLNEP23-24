-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2024 pada 02.59
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanggurubaru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'CEO'),
(2, 'Karyawan'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_posisi`
--

CREATE TABLE `tb_posisi` (
  `id_posisi` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_posisi`
--

INSERT INTO `tb_posisi` (`id_posisi`, `posisi`) VALUES
(1, 'Designer'),
(2, 'Programmer'),
(3, 'System Analyst'),
(4, 'System Engineer'),
(5, 'Ouality Control'),
(6, 'Marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_task`
--

CREATE TABLE `tb_task` (
  `id_task` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `nama_task` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status` enum('Not Started','In Progress','Done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_task`
--

INSERT INTO `tb_task` (`id_task`, `id_user`, `id_posisi`, `nama_task`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(2, 14, 1, 'pembuatan aplikasi pengisian raport sd 12 ', '2023-12-01', '2023-12-31', 'In Progress'),
(3, 15, 2, 'coba', '2023-12-08', '2023-12-23', 'In Progress'),
(4, 2, 1, 'cobacoba ', '2023-12-06', '2023-12-21', 'Not Started'),
(5, 2, 1, 'matematika', '2023-12-27', '2024-01-06', 'Not Started'),
(7, 2, 3, 'try 1 ', '2023-12-28', '2024-01-04', 'Done'),
(9, 2, 1, 'try 2 ', '2024-01-04', '2024-01-05', 'Not Started'),
(10, 2, 1, 'nyobe', '2024-01-03', '2024-01-31', 'In Progress'),
(11, 2, 1, '3 januari', '2024-01-04', '2024-01-19', 'Done'),
(12, 2, 1, 'usyucsydc', '2024-01-11', '2024-01-31', 'Done'),
(13, 2, 1, 'weewgeg ', '2024-01-04', '2024-01-30', 'Not Started'),
(14, 2, 1, 'rekgjerjg', '2024-01-18', '2024-01-31', 'In Progress');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_jabatan`, `nama_user`, `email`, `password`, `foto`) VALUES
(1, 1, 'Putri Yani', 'putriyanisempurna@gmail.com', '4dd37f149cf1b89e5bedbe031b09b28714e4cedd', 'me.jpg'),
(2, 2, 'Tia Wiji Lestari', 'tiawiji16@gmail.com', '613135c8c4795648b9471f73989354d044450490', '210048.jpg'),
(3, 3, 'Rifka Dwi Juni', 'rifkadwi@gmail.com', '4e26a10cc740047fd5c067a2427f5619f3dbf431', '2.drawio.pn'),
(14, 1, 'caster', 'caster@gmai.com', 'da12345', ''),
(15, 1, 'casterlagi', 'caster2@gmai.com', 'da12345', ''),
(16, 1, 'casterlagilagi', 'caster3@gmai.com', 'da12345', ''),
(17, 1, 'casterlagilagilagi', 'caster4@gmai.com', 'tia1212', ''),
(18, 1, 'casterlagilagilaginih', 'caster5@gmai.com', 'tia1212', ''),
(19, 2, 'tiysh', 'tiawiji@gmail.com', '$2y$10$FTjEOCvKtpq5/mHJgZXJNuGMv64BkUBsMG.muarIhKb', ''),
(20, 2, 'tiysh', 'tiawiji@gmail.com', '$2y$10$Lciiqru8ngSsKDJ5OMJ0cuQVFwnoI7U2.0nmY7Q/l23', ''),
(21, 2, 'tiysh', 'tiawiji@gmail.com', '$2y$10$Ty82RzJ2Xsv32mX.fTrJDuI.Pp9v..I6/snZpk4dmp7', ''),
(22, 2, 'tiysh', 'tiawiji@gmail.com', '$2y$10$Cxz2HVMKKkEEkCGh3YwU.eklE2h8d//CGJ5IPgo8dP7', ''),
(23, 1, 'tiysh', 'tiawiji@gmail.com', '$2y$10$x./VEluVpUratcCCECjcc.WIyuGwmu7utuAb.tgJXlW', ''),
(24, 1, 'tiysh', 'tiawiji@gmail.com', '$2y$10$drM/Q9PrSBHbRL3U4vmdhuN0/0XbeIo0TWkWnW92zR3', ''),
(25, 2, 'tiysh', 'tiawiji@gmail.com', '$2y$10$wKVeCwasB5udqVqVjUZKJeB/p4AEpZ0vrh1HiHV/MlD', ''),
(26, 2, 'tiysh', 'tiawiji@gmail.com', '$2y$10$RfxqM8OAJQ4leUXYhrUjnugumV0dJU5a4n3MBjtni0O', ''),
(27, 1, 'ytt', 'yt@gmail.com', '$2y$10$vrhB94S6nmN9WLKZWArnlOr3hcOq.WQFI7fSPnmohKu', ''),
(28, 3, 'tiyah5', 'tia76@gmail.com', '$2y$10$asN4wwjU1b5BH2byp1OF9OrS88c0aILjyW44wNSfrO/', ''),
(29, 3, 'tiyah5', 'tia76@gmail.com', '$2y$10$YR9wsEIf6wIV31nYVTK3k.Eoz.yhbmFDPc9lX7txvJy', ''),
(30, 2, 'clairo', 'clairo@gmail.com', '$2y$10$T.5UczRpBcOnGvT0AC/b7OiG3uFcJAgaF6lyMHD/EoH', ''),
(31, 1, 'clairo', 'clairo@gmail.com', '$2y$10$Y9WVFj/HeWOTztEIJxs8v.gjSOFG157ZKNYCVAJZgez', ''),
(32, 1, 'clairo', 'clairo@gmail.com', '$2y$10$20lMcQpC6OBVdwO2fFvH2uTQ6Drm/aGXBr7Po5YKozp', ''),
(33, 2, 'clairo', 'clairo@gmail.com', '$2y$10$sSKYwkijk7VIepYp.1oEy.vvFRUIyxUAMN72yig4o8U', ''),
(35, 2, 'clairo', 'clairo@gmail.com', '10abb201e0a81da52d468a97659d446519560063', ''),
(36, 3, 'tiyahh321', 'tiaaaawiji121@gmail.com', '613135c8c4795648b9471f73989354d044450490', ''),
(37, 3, 'tiyahh321n', 'tiaaaawiji121@gmail.com', '613135c8c4795648b9471f73989354d044450490', ''),
(38, 1, 'tiyahh321nl', 'tiaaaawiji121@gmail.com', '613135c8c4795648b9471f73989354d044450490', ''),
(39, 1, 'tiyahh321nlp', 'tiaaaawiji121@gmail.com', '613135c8c4795648b9471f73989354d044450490', ''),
(40, 1, 'tiyahh321nlp1', 'tiaaaawiji121@gmail.com', '613135c8c4795648b9471f73989354d044450490', ''),
(41, 1, 'tiyahh321nlp1a', 'tiaaaawiji121@gmail.com', '613135c8c4795648b9471f73989354d044450490', ''),
(42, 1, 'tiyahh321nlp1aww', 'tiaaaawiji121@gmail.com', '613135c8c4795648b9471f73989354d044450490', ''),
(43, 2, 'rehan', 'rehan@gmail.com', 'c9a6538eb3be7f54c02c4ad88f3e07ce6458c27a', ''),
(44, 3, 'caster23', 'caster@gmail.com', '6048d0bb81131304a9ad5339c577380cbecdff16', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_posisi`
--
ALTER TABLE `tb_posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indeks untuk tabel `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_posisi` (`id_posisi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_posisi`
--
ALTER TABLE `tb_posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_task`
--
ALTER TABLE `tb_task`
  ADD CONSTRAINT `tb_task_ibfk_1` FOREIGN KEY (`id_posisi`) REFERENCES `tb_posisi` (`id_posisi`),
  ADD CONSTRAINT `tb_task_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
