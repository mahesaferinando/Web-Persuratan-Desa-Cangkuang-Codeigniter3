-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2022 pada 08.20
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desacangkuang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuansosial`
--

CREATE TABLE `bantuansosial` (
  `id` int(255) NOT NULL,
  `id_user` int(100) NOT NULL,
  `tglbuat` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nokk` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenisbansos` varchar(255) NOT NULL,
  `alasanbansos` varchar(255) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `kondisi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarpekerjaan`
--

CREATE TABLE `daftarpekerjaan` (
  `id` int(100) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftarpekerjaan`
--

INSERT INTO `daftarpekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'Belum / Tidak Bekerja'),
(2, 'Wiraswasta'),
(3, 'Mengurus Rumah Tangga'),
(4, 'Pelajar / Mahasiswa\r\n'),
(5, 'Pensiunan'),
(6, 'Pewagai Negeri Sipil\r\n'),
(7, 'Tentara Nasional Indonesia\r\n'),
(8, 'Kepolisisan RI\r\n'),
(9, 'Perdagangan'),
(10, 'Petani / Pekebun\r\n'),
(11, 'Peternak'),
(12, 'Nelayan / Perikanan\r\n'),
(13, 'Industri'),
(14, 'Konstruksi'),
(15, 'Transportasi'),
(16, 'Karyawan Swasta\r\n'),
(17, 'Karyawan BUMN\r\n'),
(18, 'Karyawan BUMD\r\n'),
(19, 'Karyawan Honorer\r\n'),
(20, 'Buruh Harian Lepas\r\n'),
(21, 'Buruh Tani/ Perkebunan\r\n'),
(22, 'Buruh Nelayan/ Perikanan\r\n'),
(23, 'Buruh Peternakan\r\n'),
(24, 'Pembantu Rumah Tangga\r\n'),
(25, 'Tukang Cukur\r\n'),
(26, 'Tukang Listrik\r\n'),
(27, 'Tukang Batu\r\n'),
(28, 'Tukang Kayu\r\n'),
(29, 'Tukang Sol Sepatu\r\n'),
(30, 'Tukang Las / Pandai Besi\r\n'),
(31, 'Tukang Jahit\r\n'),
(32, 'Tukang Gigi\r\n'),
(33, 'Penata Rias\r\n'),
(34, 'Penata Busana\r\n'),
(35, 'Penata Rambut\r\n'),
(36, 'Mekanik'),
(37, 'Seniman'),
(38, 'Tabib'),
(39, 'Paraji'),
(40, 'Perancang Busana\r\n'),
(41, 'Penterjemah'),
(42, 'Imam Masjid\r\n'),
(43, 'Pendeta'),
(44, 'Pastor'),
(45, 'Wartawan'),
(46, 'Ustadz / Mubaligh\r\n'),
(47, 'Juru Masak\r\n'),
(48, 'Promotor Acara\r\n'),
(49, 'Anggota DPR-RI\r\n'),
(50, 'Anggota DPD\r\n'),
(51, 'Anggota BPK\r\n'),
(52, 'Presiden'),
(53, 'Wakil Presiden\r\n'),
(54, 'Anggota Mahkamah Konstitusi\r\n'),
(55, 'Anggota Kabinet/ Kementerian\r\n'),
(56, 'Duta Besar\r\n'),
(57, 'Gubernur'),
(58, 'Wakil Gubernur\r\n'),
(59, 'Bupati'),
(60, 'Wakil Bupati\r\n'),
(61, 'Walikota'),
(62, 'Wakil Walikota\r\n'),
(63, 'Anggota DPRD Provinsi\r\n'),
(64, 'Anggota DPRD Kabupaten / Kota\r\n'),
(65, 'Dosen'),
(66, 'Guru'),
(67, 'Pilot'),
(68, 'Pengacara'),
(69, 'Notaris'),
(70, 'Arsitek'),
(71, 'Akuntan'),
(72, 'Konsultan'),
(73, 'Dokter'),
(74, 'Bidan'),
(75, 'Perawat'),
(76, 'Apoteker'),
(77, 'Psikiater / Psikolog\r\n'),
(78, 'Penyiar Televisi\r\n'),
(79, 'Penyiar Radio\r\n'),
(80, 'Pelaut'),
(81, 'Peneliti'),
(82, 'Sopir'),
(83, 'Pialang'),
(84, 'Paranormal'),
(85, 'Pedagang'),
(86, 'Perangkat Desa\r\n'),
(87, 'Kepala Desa\r\n'),
(88, 'Biarawati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skkematian`
--

CREATE TABLE `skkematian` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `tglbuat` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `nama` varchar(255) NOT NULL,
  `tl` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `tgl_kematian` date NOT NULL,
  `hari` varchar(255) NOT NULL,
  `tmpt_kematian` varchar(255) NOT NULL,
  `jam` time(6) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `penyebab` varchar(255) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `kondisi` int(10) NOT NULL,
  `jenissurat` varchar(255) NOT NULL,
  `tglproses_skkematian` varchar(255) NOT NULL,
  `tglselesai_skkematian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sklahir`
--

CREATE TABLE `sklahir` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `tgl_buat_sklahir` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `nama_anak` varchar(255) NOT NULL,
  `hari_lahir` varchar(255) NOT NULL,
  `tl_anak` varchar(255) NOT NULL,
  `tgl_anak` date NOT NULL,
  `jam` time(6) NOT NULL,
  `agama_anak` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `anakke` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `tl_ibu` varchar(255) NOT NULL,
  `tgl_ibu` varchar(255) NOT NULL,
  `agama_ibu` varchar(255) NOT NULL,
  `pekerjaan_ibu` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `tl_ayah` varchar(255) NOT NULL,
  `tgl_ayah` varchar(255) NOT NULL,
  `agama_ayah` varchar(255) NOT NULL,
  `pekerjaan_ayah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `kondisi` int(10) NOT NULL,
  `jenissurat` varchar(255) NOT NULL,
  `tglproses_sklahir` varchar(255) NOT NULL,
  `tglselesai_sklahir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpindah`
--

CREATE TABLE `skpindah` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `tglbuat` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `namapengaju` varchar(255) NOT NULL,
  `nokk` varchar(255) NOT NULL,
  `nik_pengaju` varchar(255) NOT NULL,
  `tl_pengaju` varchar(255) NOT NULL,
  `tgl_pengaju` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `alamat_asal` varchar(255) NOT NULL,
  `pindahke` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `namapengikut1` varchar(255) NOT NULL,
  `nikpengikut1` varchar(255) NOT NULL,
  `jkpengikut1` varchar(255) NOT NULL,
  `hubpengikut1` varchar(255) NOT NULL,
  `namapengikut2` varchar(255) NOT NULL,
  `nikpengikut2` varchar(255) NOT NULL,
  `jkpengikut2` varchar(255) NOT NULL,
  `hubpengikut2` varchar(255) NOT NULL,
  `namapengikut3` varchar(255) NOT NULL,
  `nikpengikut3` varchar(255) NOT NULL,
  `jkpengikut3` varchar(255) NOT NULL,
  `hubpengikut3` varchar(255) NOT NULL,
  `namapengikut4` varchar(255) NOT NULL,
  `nikpengikut4` varchar(255) NOT NULL,
  `jkpengikut4` varchar(255) NOT NULL,
  `hubpengikut4` varchar(255) NOT NULL,
  `namapengikut5` varchar(255) NOT NULL,
  `nikpengikut5` varchar(255) NOT NULL,
  `jkpengikut5` varchar(255) NOT NULL,
  `hubpengikut5` varchar(255) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `kondisi` int(10) NOT NULL,
  `jenissurat` varchar(255) NOT NULL,
  `tglproses_skpindah` varchar(255) NOT NULL,
  `tglselesai_skpindah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm`
--

CREATE TABLE `sktm` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `tglbuat` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `nama_pengaju` varchar(255) NOT NULL,
  `nik_pengaju` varchar(255) NOT NULL,
  `tl_pengaju` varchar(255) NOT NULL,
  `tanggallahir_pengaju` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `tl_pemohon` varchar(255) NOT NULL,
  `tgllahir_pemohon` date NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `alasansktm` varchar(255) NOT NULL,
  `kondisi` int(10) NOT NULL,
  `jenissurat` varchar(255) NOT NULL,
  `tglproses_sktm` varchar(255) NOT NULL,
  `tglselesai_sktm` varchar(255) NOT NULL,
  `suratsktm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nokk` varchar(255) NOT NULL,
  `tmptlahir` varchar(255) NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jkelamin` varchar(255) NOT NULL,
  `statuskeluarga` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `statuskawin` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `nokk`, `tmptlahir`, `tanggallahir`, `alamat`, `jkelamin`, `statuskeluarga`, `agama`, `statuskawin`, `pekerjaan`, `role_id`, `is_active`, `date_created`) VALUES
(20, 'Admin', '198507232005022001', 'def.jpg', '$2y$10$1X7qfmaBdrnhO4WbmY1CwukMjt1S/8vlCSh/c.ja4vreeN.RGtZuq', '198507232005022001 ', '', '0000-00-00', '', 'Laki - Laki', '', '', '', '', 1, 1, 1643729921),
(54, 'User', '3204280000000000', 'def.jpg', '$2y$10$G6z/td2..6M4h3NZRUTkSuXfd/KC1Nbtg4iYeOZQheZKmF9VbC5nW', '2304280000000000', 'Bandung', '1993-11-24', 'Bandung', 'Laki - Laki', 'Kepala Keluarga', 'Islam', 'Kawin', 'Wiraswasta', 2, 1, 1654582743);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Pengelolaan Menu Web', 'menu', 'fas fa-fw fa-cogs', 0),
(3, 3, 'Pengelolaan Sub Menu', 'user/katalog', 'fas fa-fw fa-clipboard-list', 0),
(4, 2, 'Permohonan Surat', 'user/permohonansurat', 'fas fa-fw fa-envelope-open-text', 1),
(5, 2, 'Pendaftaran Bantuan Sosial', 'user/bantuan', 'fas fa-fw fa-hand-holding-medical', 1),
(6, 1, 'Laporan Bantuan Sosial', 'admin/laporanbansos', 'fas fa-fw fa-print', 1),
(7, 1, 'Laporan Pembuatan Surat Pengajuan', 'admin/laporansurat', 'fas fa-fw fa-print', 1),
(8, 2, 'Status Pengajuan Surat & Bantuan Sosial', 'user/statussurat', 'fas fa-fw fa-check-square', 1),
(9, 1, 'Arsip Surat Selesai', 'admin/arsip', 'fas fa-fw fa-file-archive', 1),
(10, 1, 'Pembuatan Akun', 'admin/buatakun', 'fas fa-fw fa-user-plus', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bantuansosial`
--
ALTER TABLE `bantuansosial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftarpekerjaan`
--
ALTER TABLE `daftarpekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skkematian`
--
ALTER TABLE `skkematian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sklahir`
--
ALTER TABLE `sklahir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skpindah`
--
ALTER TABLE `skpindah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bantuansosial`
--
ALTER TABLE `bantuansosial`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `daftarpekerjaan`
--
ALTER TABLE `daftarpekerjaan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `skkematian`
--
ALTER TABLE `skkematian`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sklahir`
--
ALTER TABLE `sklahir`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `skpindah`
--
ALTER TABLE `skpindah`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
