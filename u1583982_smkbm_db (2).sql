-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Jan 2023 pada 12.08
-- Versi server: 10.5.17-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1583982_smkbm_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ortu`
--

CREATE TABLE `data_ortu` (
  `id_siswa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_ayah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir_ayah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidup_mati_ayah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wni_wna_ayah` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama_ayah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_ayah` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw_ayah` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_kab_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos_ayah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_ayah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pend_terakhir_ayah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_ortu`
--

INSERT INTO `data_ortu` (`id_siswa`, `nama_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `hidup_mati_ayah`, `wni_wna_ayah`, `agama_ayah`, `alamat_ayah`, `rt_ayah`, `rw_ayah`, `kota_kab_ayah`, `kode_pos_ayah`, `no_telp_ayah`, `pend_terakhir_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `created_at`, `updated_at`) VALUES
('1229012', 'ayah saya', '', '', 'hidup', 'WNI', 'Islam', 'ldws', '', '', '', '', '', '', '', '', '2023-01-16 12:03:27', '2023-01-16 12:03:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ortu_ibu`
--

CREATE TABLE `data_ortu_ibu` (
  `id_siswa_ibu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidup_mati_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wni_wna_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_kab_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_ibu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pend_terakhir_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_ortu_ibu`
--

INSERT INTO `data_ortu_ibu` (`id_siswa_ibu`, `nama_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `hidup_mati_ibu`, `wni_wna_ibu`, `agama_ibu`, `alamat_ibu`, `rt_ibu`, `rw_ibu`, `kota_kab_ibu`, `kode_pos_ibu`, `no_telp_ibu`, `pend_terakhir_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `created_at`, `updated_at`) VALUES
('1229012', 'dsd', '', '', 'hidup', 'WNI', 'Islam', 'ds', '', '', '', '', '', '', '', '', '2023-01-16 12:03:27', '2023-01-16 12:03:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ortu_wali`
--

CREATE TABLE `data_ortu_wali` (
  `id_siswa_wali` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_wali` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir_wali` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama_wali` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hubungan_wali` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pend_terakhir_wali` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_wali` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_ortu_wali`
--

INSERT INTO `data_ortu_wali` (`id_siswa_wali`, `nama_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `agama_wali`, `alamat_wali`, `hubungan_wali`, `pend_terakhir_wali`, `pekerjaan_wali`, `penghasilan_wali`, `created_at`, `updated_at`) VALUES
('1229012', 'fcss', NULL, '', 'Islam', '', '', '', '', '', '2023-01-16 12:03:27', '2023-01-16 12:03:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_users` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota_kab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmbl_s_kandung` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmbl_s_tiri` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahasa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_sttb` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_sttb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_belajar` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referral` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_users`, `email`, `nama_lengkap`, `jenis_kelamin`, `jurusan`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `rt`, `rw`, `kota_kab`, `kode_pos`, `no_telp`, `anak_ke`, `jmbl_s_kandung`, `jmbl_s_tiri`, `bahasa`, `asal_sekolah`, `tgl_sttb`, `no_sttb`, `lama_belajar`, `nisn`, `referral`, `created_at`, `updated_at`) VALUES
('2324OLIWZM', 'admin@gmail.com', 'lukim', 'L', 'BD (Bisnis Digital)', 'gd', '2023-01-16', 'islam', 'jl', '1', '1', 'jd', '21', '0991', '1', '0', '0', '[\"Indonesia\",\"Jawa\"]', 'SMP Purta Jaya', '', '', '3', '1229012', 'Andi/DKV/10', '2023-01-16 12:03:27', '2023-01-16 12:03:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_12_16_173741_create_data_siswa_table', 1),
(2, '2022_12_17_032611_create_data_ortu_table', 1),
(3, '2022_12_17_045037_create_data_ortu_ibu_table', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_ortu`
--
ALTER TABLE `data_ortu`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `data_ortu_ibu`
--
ALTER TABLE `data_ortu_ibu`
  ADD PRIMARY KEY (`id_siswa_ibu`);

--
-- Indeks untuk tabel `data_ortu_wali`
--
ALTER TABLE `data_ortu_wali`
  ADD PRIMARY KEY (`id_siswa_wali`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD UNIQUE KEY `nisn` (`nisn`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
