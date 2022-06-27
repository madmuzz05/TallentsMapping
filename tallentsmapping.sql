-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2022 at 06:18 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tallentsmapping`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_nilai`
--

DROP TABLE IF EXISTS `bobot_nilai`;
CREATE TABLE IF NOT EXISTS `bobot_nilai` (
  `id_bobot_nilai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `simulasi_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `parameter_penilaian_id` bigint(20) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bobot_nilai`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_nilai`
--

INSERT INTO `bobot_nilai` (`id_bobot_nilai`, `simulasi_id`, `user_id`, `parameter_penilaian_id`, `nilai`, `created_at`, `updated_at`) VALUES
(81, 158, 7, 22, 3.5, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(80, 34, 1, 22, 3, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(79, 155, 7, 21, 2, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(78, 29, 1, 21, 2, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(77, 151, 7, 20, 5, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(76, 25, 1, 20, 2, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(75, 161, 7, 19, 1, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(74, 37, 1, 19, 5, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(73, 143, 7, 18, 5, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(72, 15, 1, 18, 3, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(71, 150, 7, 13, 4, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(70, 24, 1, 13, 3, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(69, 154, 7, 14, 2, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(68, 28, 1, 14, 2, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(67, 132, 7, 15, 2, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(66, 30, 1, 15, 2, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(65, 130, 7, 16, 5, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(64, 33, 1, 16, 5, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(63, 133, 7, 17, 4, '2022-06-26 04:50:36', '2022-06-26 04:50:36'),
(62, 51, 1, 17, 3.5, '2022-06-26 04:50:36', '2022-06-26 04:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

DROP TABLE IF EXISTS `hasil`;
CREATE TABLE IF NOT EXISTS `hasil` (
  `id_hasil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `job_family_id` bigint(20) NOT NULL,
  `nilai` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_hasil`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `user_id`, `job_family_id`, `nilai`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '3.1', '2022-06-26 05:00:03', '2022-06-26 05:00:04'),
(4, 7, 2, '3.25', '2022-06-26 05:00:04', '2022-06-26 05:00:04'),
(5, 1, 5, '3.069', '2022-06-26 05:01:55', '2022-06-26 05:13:44'),
(6, 7, 5, '3.15', '2022-06-26 05:01:55', '2022-06-26 05:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_jabatan` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `kategori_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Staff Muda', '2022-05-12 11:41:41', '2022-06-10 12:08:34'),
(2, 'Vice President', '2022-05-12 11:41:41', '2022-05-12 11:41:41'),
(4, 'staf', '2022-06-10 20:32:16', '2022-06-10 20:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `job_family`
--

DROP TABLE IF EXISTS `job_family`;
CREATE TABLE IF NOT EXISTS `job_family` (
  `id_job_family` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_family` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_core_faktor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_sec_faktor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_job_family`),
  UNIQUE KEY `job_family_kode_unique` (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_family`
--

INSERT INTO `job_family` (`id_job_family`, `kode`, `job_family`, `nilai_core_faktor`, `nilai_sec_faktor`, `created_at`, `updated_at`) VALUES
(1, 'OPS', 'OPERASIONAL', '0', '0', '2022-06-18 10:05:40', '2022-06-23 00:17:34'),
(2, 'PEML', 'PEMELIHARAAN', '60', '40', '2022-06-18 10:05:40', '2022-06-23 00:43:47'),
(3, 'ENG', 'ENGINEERING/ KONSTRUKSI', NULL, NULL, '2022-06-18 10:05:40', '2022-06-18 10:05:40'),
(4, 'SAR', 'PEMASARAN', NULL, NULL, '2022-06-18 10:05:40', '2022-06-18 10:05:40'),
(5, 'KEU', 'KEUANGAN', '70', '30', '2022-06-18 10:05:40', '2022-06-23 00:45:45'),
(6, 'RENB', 'PERENCANAAN & PENGEMBANGAN', NULL, NULL, '2022-06-18 10:05:40', '2022-06-18 10:05:40'),
(7, 'SDM', 'MANAJEMEN SDM', '0', '0', '2022-06-18 10:05:40', '2022-06-23 00:42:18'),
(8, 'SUP', 'MANAJEMEN PENGADAAN', NULL, NULL, '2022-06-18 10:05:40', '2022-06-18 10:05:40'),
(9, 'SEKR', 'SEKRETARIS PERUSAHAAN, CORPORATE COMMUNICATION & UMUM', NULL, NULL, '2022-06-18 10:05:40', '2022-06-18 10:05:40'),
(10, 'AUD', 'AUDIT', '0', '0', '2022-06-18 10:05:40', '2022-06-23 00:46:40'),
(11, 'HUK', 'HUKUM', NULL, NULL, '2022-06-18 10:05:40', '2022-06-18 10:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 2),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_05_03_213807_create_unit_kerja_table', 4),
(6, '2022_05_03_213859_create_jabatan_table', 1),
(7, '2022_05_12_072200_create_pernyataan_table', 1),
(8, '2022_05_12_072217_create_tema_bakat_table', 1),
(9, '2022_05_12_074008_create_simulasi_table', 1),
(12, '2022_06_14_115549_create_hasil_table', 3),
(13, '2022_06_14_115943_create_parameter_penilaian_table', 3),
(14, '2022_06_16_025725_create_job_family_table', 3),
(18, '2022_06_24_151458_create_bobot_nilai_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `parameter_penilaian`
--

DROP TABLE IF EXISTS `parameter_penilaian`;
CREATE TABLE IF NOT EXISTS `parameter_penilaian` (
  `id_parameter_penilaian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_family_id` bigint(20) NOT NULL,
  `tema_bakat_id` bigint(20) NOT NULL,
  `kategori_faktor` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_parameter_penilaian`),
  UNIQUE KEY `parameter_penilaian_tema_bakat_id_unique` (`tema_bakat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parameter_penilaian`
--

INSERT INTO `parameter_penilaian` (`id_parameter_penilaian`, `job_family_id`, `tema_bakat_id`, `kategori_faktor`, `nilai`, `created_at`, `updated_at`) VALUES
(18, 5, 10, 'Core Faktor', '5', '2022-06-23 00:45:45', '2022-06-23 00:45:45'),
(19, 5, 30, 'Core Faktor', '5', '2022-06-23 00:45:45', '2022-06-23 00:45:45'),
(17, 2, 44, 'Secondary Faktor', '3', '2022-06-23 00:43:47', '2022-06-23 00:43:47'),
(16, 2, 26, 'Secondary Faktor', '3', '2022-06-23 00:43:47', '2022-06-23 00:43:47'),
(15, 2, 23, 'Core Faktor', '5', '2022-06-23 00:43:47', '2022-06-23 00:43:47'),
(14, 2, 21, 'Core Faktor', '5', '2022-06-23 00:43:47', '2022-06-23 00:43:47'),
(13, 2, 17, 'Core Faktor', '5', '2022-06-23 00:43:47', '2022-06-23 00:43:47'),
(20, 5, 18, 'Core Faktor', '5', '2022-06-23 00:45:45', '2022-06-23 00:45:45'),
(21, 5, 22, 'Secondary Faktor', '3', '2022-06-23 00:45:45', '2022-06-23 00:45:45'),
(22, 5, 27, 'Secondary Faktor', '3', '2022-06-23 00:45:45', '2022-06-23 00:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pernyataan`
--

DROP TABLE IF EXISTS `pernyataan`;
CREATE TABLE IF NOT EXISTS `pernyataan` (
  `id_pernyataan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pernyataan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema_bakat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pernyataan`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pernyataan`
--

INSERT INTO `pernyataan` (`id_pernyataan`, `pernyataan`, `tema_bakat_id`, `created_at`, `updated_at`) VALUES
(4, 'Membuat Konsep Berdasarkan Apa Yang Dilihat, Dialami Atau Diyakini', 7, '2022-06-22 22:50:29', '2022-06-22 22:50:29'),
(5, 'Mengoreksi Tulisan Yang Dibuat Sebelumnya Untuk Dipublikasikan', 8, '2022-06-22 22:50:29', '2022-06-22 22:50:29'),
(6, 'Memilih, Mengedit , Merevisi Dokumen Tertulis Yang Sudah Diklasifikasikan Dalam Persiapan Publikasinya', 9, '2022-06-22 22:50:29', '2022-06-22 22:50:29'),
(7, 'Membuat Pernyataan Resmi Secara Tertulis Ataupun Lisan Mengenai Sesuatu.', 10, '2022-06-22 22:50:29', '2022-06-22 22:50:29'),
(8, 'Menulis Artikel, Ide, Dokumen, Cerita Ataupun Alat Bantu Pendidikan', 11, '2022-06-22 22:50:29', '2022-06-22 22:50:29'),
(9, 'Membangun Atau Menjelaskan Arti Atau Makna Dari Sesuatu', 12, '2022-06-22 22:50:29', '2022-06-22 22:50:29'),
(10, 'Menuliskan Kembali Dengan Lengkap, Catatan Ataupun Steno Yang Sudah Dibuat', 13, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(11, 'Menulis Atau Mengatakan Sesuatu Dalam Bahasa Lain Yang Diperlukan Agar Orang Yang Membaca Ataupun Mendengar Bisa Mengerti', 14, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(12, 'Menjalankan Dan Menjaga Kepatuhan Sesuai Dengan Aturan Yang Berlaku', 15, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(13, 'Menyimpan Berkas Ditempat Yang Benar Dengan Rapih Dan Mudah Dicari', 16, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(14, 'Merapihkan, Membersihkan Dan Menata Ruangan', 17, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(15, 'Melakukan Pengetikan ,Atau Memasukan Data Untuk Menghasilkan Dokumen, Berkas, Artikel Dlsb', 18, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(16, 'Mengatur / Menyusun Acara, Sistem & Prosedur Ataupun Tataletak', 19, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(17, 'Membuat Rencana Dari Tugas Yang Harus Dilakukan Dengan Urutan Dan Waktu Tertentu', 20, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(18, 'Menyusun Semua Bagian Terpisah Yang Diperlukan Untuk Menjadi Barang Jadi Dan Lengkap', 21, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(19, 'Membangun Rumah, Gedung, Pabrik, Jembatan Dan Struktur Lainnya', 22, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(20, 'Memasang Bagian Bagian Terpisah Dari Suatu Mesin Menjadi Peralatan Yang Siap Pakai', 23, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(21, 'Membuat Atau Menciptakan Sesuatu Sesuatu Menjadi Barang Jadi Ataupun Barang Setengah Jadi', 24, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(22, 'Kegiatan Tahap Terakhir Untuk Menyelesaikan Proses Produksi , Proyek Atau Konstruksi', 25, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(23, 'Melakukan Pengujian Untuk Membuktikan Sesuatunya Bekerja Dengan Benar Sesuai Dengan Spesifikasi Yang Diharapkan', 26, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(24, 'Mengirim Sesuatu Seperti Surat, Barang Yang Dibeli Atau Dipesan Ke Alamat Atau Orang Tertentu', 27, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(25, 'Menyebarkan Sesuatu [Barang, Surat, Artikel] Pada Saat Yang Hampir Bersamaan Ketempat Atau Daerah Tertentu', 28, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(26, 'Memelihara Mesin , Peralatan , Sistem Atau Bangunan', 29, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(27, 'Membuat Sesuatu [ Mesin, Peralatan, Proses, Sistem] Berjalan / Beroperasi', 30, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(28, 'Memperbaiki, Mengembalikan Sesuatu [Peralatan, Sistim, Manusia] Ke Fungsi Semula', 31, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(29, 'Memberi Makan, Merawat, Melatih, Mengembangkan Biakan Binatang', 32, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(30, 'Melakukan Kegiatan Olahraga Tertentu Dengan Berprestasi', 33, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(31, 'Bertani: Menyiapkan, Menyemai, Menanam, Menumbuhkan, Memelihara, Memangkas Dll', 34, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(32, 'Menggunakan Fungsi Koordinasi Fisik Seperti Memanjat, Mengontrol Dan Mengoperasikan Peralatan Dll', 35, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(33, 'Pekerjaan Dimana Dibutuhkan Keterampilan Tangan, Kerajinan Tangan', 36, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(34, 'Kegiatan Yang Berkaitan Dengan Seni Visual Seperti Melukis, Komunikasi Visual, Gambar Dlsb', 37, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(35, 'Bernyanyi Didepan Penonton', 38, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(36, 'Kegiatan Yang Berkaitan Dengan Seni Musik', 39, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(37, 'Kegiatan Seorang Model Feshen', 40, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(38, 'Membuat Sesuatu Menjadi Lebih Dramatis', 41, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(39, 'Menampilkan Gerakan Tubuh Yang Indah Dan Harmonis Yang Diiringi Irama Tertentu', 42, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(40, 'Membuat Dan Menyiapkan Makanan / Kueh', 43, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(41, 'Menjaga Sesuatu, Khususnya Sumber Daya Budaya Dan Lingkungan Dari Bahaya Kehilangan, Kerusakan, Perubahan Atau Kelapukan', 44, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(42, 'Membuat Sesuatu Atau Seseorang Menjadi Menyenangkan Dan Menarik Untuk Dilihat', 45, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(43, 'Beraksi Mengexpresikan Peran Sebagai Aktor / Artis', 46, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(44, 'Kegiatan Mengantisipasi Masadepan Secara Bijak Dan Menentukan Visi Yang Benar', 47, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(45, 'Memilih Atau Merencanakan Jalan Terbaik Menuju Tujuan', 48, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(46, 'Menentukan Sasaran, Membuat Skedul, Program Kerja, Prioritas, Revisi Dan Penyesuaikan Kebijakkan Dlsb', 49, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(47, 'Membuat Sesuatu [ Produk, Layanan, Informasi ] Menjadi Diketahui Secara Umum Atau Oleh Anggauta Dari Kelompok Tertentu', 50, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(48, 'Aktivitas Bisnis Mengenai Strategi Memasarkan Termasuk Mempresentasikan Layanan Atau Produk Ke Pelanggan Potensial Dengan Berbagai Jalan Agar Mereka Tertarik Untuk Membeli', 51, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(49, 'Mengubah, Atau Menyebabkan Perubahan Sehingga Menjadi Lebih Besar, Lebih Kuat, Lebih Menarik, Lebih Maju', 52, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(50, 'Membuat Promosi Melalui Pengumuman Publik Di Koran, Radio, Televisi Mengenai Produk, Layanan, Acara, Lowongan Untuk Menarik Dan Meningkatkan Perhatian Publik', 53, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(51, 'Mengintegrasikan Ide Dan Informasi, Mengkombinasikan Berbagai Elemen Menjadi Satu', 54, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(52, 'Melontarkan Ide Tentang Segala Sesuatu', 55, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(53, 'Menggunakan Imajinasi Untuk Menemukan Suatu Rancangan, Produk Atau Layanan Yang Baru', 56, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(54, 'Mempresentasikan Atau Merekam Sesuatu Dalam Bentuk Deretan Gambar Tetap Yang Bergerak', 57, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(55, 'Membuat Gambar Teknik', 58, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(56, 'Membuat Gambar Dari Sesuatu [ Bangunan, Produk ] Yang Direncanakan Untuk Dibuat (Yang Memperlihatkan Bagaimana Cara Membuatnya)', 59, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(57, 'Melayani Orang Lain Sebagai Pekerjaan, Tugas Ataupun Keinginan Yang Tulus', 60, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(58, 'Menyampaikan Informasi Ataupun Pengetahuan Kepada Orang Lain', 61, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(59, 'Memberikan Salam Sapaan Dengan Santun Kepada Orang Lain Yang Dikenal Maupun Belum Dikenal', 62, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(60, 'Membantu Seseorang Melakukan Tugasnya Dalam Posisi Sebagai Bawahan', 63, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(61, 'Melakukan Sesuatu Pekerjaan Sosial Tanpa Meminta Bayaran Atau Imbalan', 64, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(62, 'Menyembuhkan Atau Merehabilitasi Seseorang Melalui Perlakuan Fisik, Mental Atau Perilaku', 65, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(63, 'Kegiatan Spiritual Seperti Sembahyang, Berdoa Dlsb', 66, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(64, 'Membantu Menyelesaikan Masalah Pribadi Atau Masalah Psikologi Seseorang', 67, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(65, 'Tugas Perawatan Atau Kerja Sosial Untuk Memperhatikan Orang Dari Sisi Fisik, Medik Atau Kesejahteraan Umum', 68, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(66, 'Menggunakan Teknik Bertanya Untuk Mendapatkan Informasi Dari Seseorang', 69, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(67, 'Memilih Dan Merekrut Seseorang Sebagai Pekerja Atau Anggauta', 70, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(68, 'Menjual Produk Atau Layanan Dengan Berbagai Cara Agar Orang Lain Mau Membelinya', 71, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(69, 'Mempengaruhi Pikiran Atau Meyakinkan Orang Lain', 72, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(70, 'Menghibur Seseorang Atau Sekelompok Orang', 73, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(71, 'Menghubungkan Kedua Belah Fihak Baik Pembeli Maupun Penjual Sehingga Terjadi Transaksi', 74, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(72, 'Membeli Sesuatu Dengan Uang Atau Yang Setara Melalui Usaha Keras Maupun Pengorbanan Untuk Mendapatkan Yang Terbaik', 75, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(73, 'Berusaha Untuk Mendapat Persetujuan, Menawar Untuk Mendapatkan Keuntungan, Hak Atau Kesempatan', 76, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(74, 'Melakukan Pengujian Secara Detil Untuk Menemukan Sesuatu Yang Belum Diketahui', 77, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(75, 'Menanyai Seseorang Dengan Lengkap Secara Agresif Atau Dengan Sikap Mengancam', 78, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(76, 'Menggunakan Kekuasaan Untuk Dapat Mengatur Dan Mengawasi Orang Dalam Melaksanaan Tugas', 79, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(77, 'Menagih Uang Yang Sudah Jatuh Tempo Sesuai Dengan Kontrak Atau Perjanjian Yang Dibuat Sebelumnya', 80, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(78, 'Mengatasi, Rekonsiliasi, Menyelesaikan Konflik', 81, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(79, 'Menugaskan Sesorang Untuk Pergi Ketempat Tertentu Sesuai Dengan Tugas Yang Harus Dilakukan', 82, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(80, 'Mengkoordinir Orang Untuk Bekerja Sama Melakukan Suatu Tugas', 83, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(81, 'Bertindak Atau Bekerja Bersama Untuk Mencapai Sasaran Yang Sama', 84, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(82, 'Menyampaikan Informasi Secara Formal Maupun Informal Dengan Cara Yang Mudah Dimengerti', 85, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(83, 'Komunikasi Dengan Cara Bertukar Pesan Tertulis Seperti Surat, Email Dlsb', 86, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(84, 'Menyampaikan Perasaan Atau Pikiran Dengan Berbicara Atau Menulis Atau Gerak Tubuh Sehingga Dapat Dimengerti Orang', 87, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(85, 'Bertindak Atau Berbicara Atas Nama Orang Lain Dengan Resmi', 88, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(86, 'Membina Hubungan Persahabatan Dengan Orang Lain Berdasarkan Saling Pengertian Ataupun Berbagi Pandangan Dan Keperdulian', 89, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(87, 'Menjadi Perwakilan Disuatu Tempat Dengan Membangun Jaringan Melalui Kontak Dengan Pelanggan Atau Lainnya', 90, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(88, 'Memberi Panduan Untuk Menujukkan Jalan Yang Benar Bagi Seseorang', 91, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(89, 'Mendorong, Memberi Semangat Untuk Mendapatkan Kinerja Maksimum Pada Seseorang', 92, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(90, 'Mendukung Orang /Kelompok Lain Melaksanakan Tugasnya Agar Hasil Kerja Orang / Kelompok Tersebut Maksimal', 93, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(91, 'Memberikan Nasehat Atau Informasi', 94, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(92, 'Berpartner Dengan Klien Dalam Memperjelas, Menyelaraskan Dan Mencapai Tujuan Klien Sesuai Dengan Kekuatan Klien Tersebut', 95, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(93, 'Memberikan Nasehat Dan Strategi Sukses Kepada Klien Sesuai Dengan Keahliannya', 96, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(94, 'Mengajarkan Klien Dengan Metoda Pengajar Dan Membukakan Jalan Yang Membuat Mereka Sukses', 97, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(95, 'Mengajar, Menyampaikan Ilmu Dengan Cara Yang Benar Agar Bisa Difahami Oleh Orang Lain', 98, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(96, 'Mengajari Keterampilan, Prosedur, Metoda, Keahlian Dll Untuk Mengembangkan Keterampilan Dan Pengetahuan Seseorang Dibidang Tertentu', 99, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(97, 'Mencari Apa Yang Menjadikan Sesuatu Dengan Cara Mengidentifikasikan Bagian Bagian Pembentuknya, [Atau Mempelajari Sesuatu Dengan Seksama]', 100, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(98, 'Mencatat Uang Yang Diterima Dan Dibelanjakan Oleh Individu, Bisnis Atau Organisasi Dalam Buku Dengan Standar Tertentu', 101, '2022-06-23 00:08:55', '2022-06-23 00:08:55'),
(99, 'Merancang Program, Menulis Program, Merancang Antar Muka, Mengembangkan Piranti Lunak Komputer', 102, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(100, 'Merencanaan, Mengatur, Menyimpan, Mendistribusikan Dana /Uang', 103, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(101, 'Menerima , Menyimpan, Membayar Uang Sesuai Prosedur Dan Menyimpan Catatannya', 104, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(102, 'Memonitor Dan Memeriksa Pengeluaran Biaya Yang Telah Diperhitungkan Sebelumnya Untuk Melaksanakan Suatu Proyek', 105, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(103, 'Membuat Perhitungan Biaya Kira Kira Dari Suatu Pekerjaan Untuk Tujuan Membuat Penawaran', 106, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(104, 'Melakukan Pemeriksaan, Koreksi Terhadap Laporan Terkait Keuangan Yang Dilakukan Sesuai Dengan Kebutuhan', 107, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(105, 'Memeriksa Sesuatu Dengan Seksama Mengenai Mutu Atau Kebenarannya', 108, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(106, 'Memeriksa Benar Tidaknya Sesuatu Dengan Cara Menguji, Menginvestigasi Atau Membandingkan', 109, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(107, 'Mengawasi Kemungkinan Ketidak Benaran Atau Ketidak Adilan Dari Suatu Pelaksanaan', 110, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(108, 'Menjaga Keselamatan Jiwa Manusia Dari Risiko Bahaya Atau Kecelakaan', 111, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(109, 'Menjaga Keamanan Aset Dari Kehilangan, Pencurian , Kerusakan Dlsb', 112, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(110, 'Mengidentifikasi Penyebab Dari Suatu Masalah.', 113, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(111, 'Mengenali Sesuatu Atau Seseorang Dan Agar Bisa Mengatakan Siapa Dia Atau Apa Itu', 114, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(112, 'Menaksir Nilai / Harga Dari Sesuatu [ Barang, Produk, Bangunan, Tanah, Perusahaan', 115, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(113, 'Menimbang Atau Menguji Sesuatu Dalam Rangka Menentukan Harga Atau Mutu Atau Kepentingan Atau Juga Kondisinya', 116, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(114, 'Memperhatikan Seseorang Atau Sesuatu Dengan Seksama Khususnya Untuk Tujuan Keilmuan', 117, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(115, 'Melakukan Penelitian Terhadap Suatu Subyek Secara Metodik Untuk Menemukan Fakta Fakta, Memperbaiki Atau Membuat Teori Baru, Atau Mengembangkan Rencana Tindakan Berdasarkan Fakta', 118, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(116, 'Membuat Laporan Atau Survai Atas Kegiatan , Kinerja Dan Kejadian Yang Terjadi Sebelumnya', 119, '2022-06-23 00:08:56', '2022-06-23 00:08:56'),
(117, 'Memperhatikan Sesuatu Atau Seseorang Dengan Seksama Khususnya Untuk Membuat Suatu Opini', 120, '2022-06-23 00:08:56', '2022-06-23 00:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `simulasi`
--

DROP TABLE IF EXISTS `simulasi`;
CREATE TABLE IF NOT EXISTS `simulasi` (
  `id_simulasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `pernyataan_id` bigint(20) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_simulasi`)
) ENGINE=MyISAM AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `simulasi`
--

INSERT INTO `simulasi` (`id_simulasi`, `user_id`, `pernyataan_id`, `nilai`, `created_at`, `updated_at`) VALUES
(15, 1, 7, 3, '2022-06-22 23:12:45', '2022-06-22 23:12:45'),
(18, 1, 4, 2, '2022-06-22 23:15:09', '2022-06-22 23:15:09'),
(16, 1, 8, 5, '2022-06-22 23:12:46', '2022-06-22 23:12:46'),
(14, 1, 6, 0, '2022-06-22 23:12:43', '2022-06-22 23:12:43'),
(13, 1, 5, 3, '2022-06-22 23:12:41', '2022-06-22 23:12:41'),
(19, 1, 9, 3, '2022-06-22 23:15:50', '2022-06-23 00:11:51'),
(20, 1, 10, 5, '2022-06-23 00:11:52', '2022-06-23 00:11:52'),
(21, 1, 11, 2, '2022-06-23 00:11:54', '2022-06-23 00:11:54'),
(22, 1, 12, 3, '2022-06-23 00:11:55', '2022-06-23 00:11:55'),
(23, 1, 13, 1, '2022-06-23 00:11:57', '2022-06-23 00:11:57'),
(24, 1, 14, 3, '2022-06-23 00:11:58', '2022-06-23 00:11:58'),
(25, 1, 15, 2, '2022-06-23 00:12:00', '2022-06-23 00:12:00'),
(26, 1, 16, 4, '2022-06-23 00:12:02', '2022-06-23 00:12:02'),
(27, 1, 17, 0, '2022-06-23 00:12:03', '2022-06-23 00:12:03'),
(28, 1, 18, 2, '2022-06-23 00:12:05', '2022-06-23 00:12:05'),
(29, 1, 19, 0, '2022-06-23 00:12:06', '2022-06-23 00:12:06'),
(30, 1, 20, 2, '2022-06-23 00:12:08', '2022-06-23 00:12:08'),
(31, 1, 21, 0, '2022-06-23 00:12:10', '2022-06-23 00:12:10'),
(32, 1, 22, 0, '2022-06-23 00:12:11', '2022-06-23 00:12:11'),
(33, 1, 23, 3, '2022-06-23 00:12:13', '2022-06-23 00:12:13'),
(34, 1, 24, 1, '2022-06-23 00:12:15', '2022-06-23 00:12:15'),
(35, 1, 25, 5, '2022-06-23 00:12:16', '2022-06-23 00:12:16'),
(36, 1, 26, 3, '2022-06-23 00:12:18', '2022-06-23 00:12:18'),
(37, 1, 27, 0, '2022-06-23 00:12:19', '2022-06-23 00:12:19'),
(38, 1, 28, 4, '2022-06-23 00:12:21', '2022-06-23 00:12:21'),
(39, 1, 29, 2, '2022-06-23 00:12:22', '2022-06-23 00:12:22'),
(40, 1, 30, 0, '2022-06-23 00:12:23', '2022-06-23 00:12:23'),
(41, 1, 31, 3, '2022-06-23 00:12:25', '2022-06-23 00:12:25'),
(42, 1, 32, 2, '2022-06-23 00:12:27', '2022-06-23 00:12:27'),
(43, 1, 33, 4, '2022-06-23 00:12:28', '2022-06-23 00:12:28'),
(44, 1, 34, 0, '2022-06-23 00:12:30', '2022-06-23 00:12:30'),
(45, 1, 35, 2, '2022-06-23 00:12:31', '2022-06-23 00:12:31'),
(46, 1, 36, 4, '2022-06-23 00:12:33', '2022-06-23 00:12:33'),
(47, 1, 37, 0, '2022-06-23 00:12:34', '2022-06-23 00:12:34'),
(48, 1, 38, 2, '2022-06-23 00:12:35', '2022-06-23 00:12:35'),
(49, 1, 39, 4, '2022-06-23 00:12:38', '2022-06-23 00:12:38'),
(50, 1, 40, 0, '2022-06-23 00:12:39', '2022-06-23 00:12:39'),
(51, 1, 41, 5, '2022-06-23 00:12:42', '2022-06-23 00:12:42'),
(52, 1, 42, 3, '2022-06-23 00:12:43', '2022-06-23 00:12:43'),
(53, 1, 43, 1, '2022-06-23 00:12:45', '2022-06-23 00:12:45'),
(54, 1, 44, 3, '2022-06-23 00:12:47', '2022-06-23 00:12:47'),
(55, 1, 45, 3, '2022-06-23 00:12:48', '2022-06-23 00:12:48'),
(56, 1, 46, 0, '2022-06-23 00:12:50', '2022-06-23 00:12:50'),
(57, 1, 47, 2, '2022-06-23 00:12:52', '2022-06-23 00:12:52'),
(58, 1, 48, 4, '2022-06-23 00:12:56', '2022-06-23 00:12:56'),
(59, 1, 49, 2, '2022-06-23 00:13:00', '2022-06-23 00:13:00'),
(60, 1, 50, 4, '2022-06-23 00:13:02', '2022-06-23 00:13:02'),
(61, 1, 51, 0, '2022-06-23 00:13:08', '2022-06-23 00:13:08'),
(62, 1, 52, 3, '2022-06-23 00:13:10', '2022-06-23 00:13:10'),
(63, 1, 53, 4, '2022-06-23 00:13:13', '2022-06-23 00:13:13'),
(64, 1, 54, 2, '2022-06-23 00:13:18', '2022-06-23 00:13:18'),
(65, 1, 55, 4, '2022-06-23 00:13:23', '2022-06-23 00:13:23'),
(66, 1, 56, 1, '2022-06-23 00:13:25', '2022-06-23 00:13:25'),
(67, 1, 57, 5, '2022-06-23 00:13:31', '2022-06-23 00:13:31'),
(68, 1, 58, 2, '2022-06-23 00:13:32', '2022-06-23 00:13:32'),
(69, 1, 59, 1, '2022-06-23 00:13:34', '2022-06-23 00:13:34'),
(70, 1, 60, 2, '2022-06-23 00:13:36', '2022-06-23 00:13:36'),
(71, 1, 61, 3, '2022-06-23 00:13:38', '2022-06-23 00:13:38'),
(72, 1, 62, 0, '2022-06-23 00:13:40', '2022-06-23 00:13:40'),
(73, 1, 63, 3, '2022-06-23 00:13:44', '2022-06-23 00:13:44'),
(74, 1, 64, 0, '2022-06-23 00:13:46', '2022-06-23 00:13:46'),
(75, 1, 65, 4, '2022-06-23 00:13:48', '2022-06-23 00:13:48'),
(76, 1, 66, 4, '2022-06-23 00:13:52', '2022-06-23 00:13:52'),
(77, 1, 67, 4, '2022-06-23 00:13:57', '2022-06-23 00:13:57'),
(78, 1, 68, 3, '2022-06-23 00:14:01', '2022-06-23 00:14:01'),
(79, 1, 69, 1, '2022-06-23 00:14:03', '2022-06-23 00:14:03'),
(80, 1, 70, 0, '2022-06-23 00:14:04', '2022-06-23 00:14:04'),
(81, 1, 71, 3, '2022-06-23 00:14:06', '2022-06-23 00:14:06'),
(82, 1, 72, 4, '2022-06-23 00:14:08', '2022-06-23 00:14:08'),
(83, 1, 73, 3, '2022-06-23 00:14:22', '2022-06-23 00:14:22'),
(84, 1, 74, 5, '2022-06-23 00:14:24', '2022-06-23 00:14:24'),
(85, 1, 75, 1, '2022-06-23 00:14:25', '2022-06-23 00:14:25'),
(86, 1, 76, 3, '2022-06-23 00:14:28', '2022-06-23 00:14:28'),
(87, 1, 77, 2, '2022-06-23 00:14:30', '2022-06-23 00:14:30'),
(88, 1, 78, 1, '2022-06-23 00:14:34', '2022-06-23 00:14:34'),
(89, 1, 79, 2, '2022-06-23 00:14:37', '2022-06-23 00:14:37'),
(90, 1, 80, 3, '2022-06-23 00:14:40', '2022-06-23 00:14:40'),
(91, 1, 81, 3, '2022-06-23 00:14:43', '2022-06-23 00:14:43'),
(92, 1, 82, 4, '2022-06-23 00:14:50', '2022-06-23 00:14:50'),
(93, 1, 83, 2, '2022-06-23 00:14:53', '2022-06-23 00:14:53'),
(94, 1, 84, 5, '2022-06-23 00:14:55', '2022-06-23 00:14:55'),
(95, 1, 85, 4, '2022-06-23 00:14:57', '2022-06-23 00:14:57'),
(96, 1, 86, 2, '2022-06-23 00:15:02', '2022-06-23 00:15:02'),
(97, 1, 87, 0, '2022-06-23 00:15:03', '2022-06-23 00:15:03'),
(98, 1, 88, 2, '2022-06-23 00:15:04', '2022-06-23 00:15:04'),
(99, 1, 89, 4, '2022-06-23 00:15:06', '2022-06-23 00:15:06'),
(100, 1, 90, 2, '2022-06-23 00:15:08', '2022-06-23 00:15:08'),
(101, 1, 91, 2, '2022-06-23 00:15:10', '2022-06-23 00:15:10'),
(102, 1, 92, 4, '2022-06-23 00:15:12', '2022-06-23 00:15:12'),
(103, 1, 93, 5, '2022-06-23 00:15:13', '2022-06-23 00:15:13'),
(104, 1, 94, 4, '2022-06-23 00:15:15', '2022-06-23 00:15:15'),
(105, 1, 95, 3, '2022-06-23 00:15:17', '2022-06-23 00:15:17'),
(106, 1, 96, 2, '2022-06-23 00:15:21', '2022-06-23 00:15:21'),
(107, 1, 97, 4, '2022-06-23 00:15:23', '2022-06-23 00:15:23'),
(108, 1, 98, 1, '2022-06-23 00:15:25', '2022-06-23 00:15:25'),
(109, 1, 99, 4, '2022-06-23 00:15:27', '2022-06-23 00:15:27'),
(110, 1, 100, 5, '2022-06-23 00:15:29', '2022-06-23 00:15:29'),
(111, 1, 101, 3, '2022-06-23 00:15:30', '2022-06-23 00:15:30'),
(112, 1, 102, 2, '2022-06-23 00:15:33', '2022-06-23 00:15:33'),
(113, 1, 103, 4, '2022-06-23 00:15:38', '2022-06-23 00:15:38'),
(114, 1, 104, 2, '2022-06-23 00:15:40', '2022-06-23 00:15:40'),
(115, 1, 105, 1, '2022-06-23 00:15:41', '2022-06-23 00:15:41'),
(116, 1, 106, 0, '2022-06-23 00:15:43', '2022-06-23 00:15:43'),
(117, 1, 107, 2, '2022-06-23 00:15:45', '2022-06-23 00:15:45'),
(118, 1, 108, 3, '2022-06-23 00:15:47', '2022-06-23 00:15:47'),
(119, 1, 109, 2, '2022-06-23 00:15:49', '2022-06-23 00:15:49'),
(120, 1, 110, 5, '2022-06-23 00:15:52', '2022-06-23 00:15:52'),
(121, 1, 111, 0, '2022-06-23 00:15:55', '2022-06-23 00:15:55'),
(122, 1, 112, 3, '2022-06-23 00:16:26', '2022-06-23 00:16:26'),
(133, 7, 41, 2, '2022-06-23 00:15:55', '2022-06-26 01:43:57'),
(132, 7, 20, 2, '2022-06-23 00:15:52', '2022-06-26 01:42:04'),
(131, 7, 109, 3, '2022-06-23 00:15:49', '2022-06-26 01:47:21'),
(130, 7, 23, 3, '2022-06-23 00:15:47', '2022-06-23 00:15:47'),
(129, 7, 107, 4, '2022-06-23 00:15:45', '2022-06-26 01:47:16'),
(134, 7, 112, 3, '2022-06-23 00:16:26', '2022-06-23 00:16:26'),
(135, 1, 113, 2, '2022-06-23 00:15:45', '2022-06-23 00:15:45'),
(136, 1, 114, 3, '2022-06-23 00:15:47', '2022-06-23 00:15:47'),
(137, 1, 115, 2, '2022-06-23 00:15:49', '2022-06-23 00:15:49'),
(138, 1, 116, 5, '2022-06-23 00:15:52', '2022-06-23 00:15:52'),
(139, 1, 117, 0, '2022-06-23 00:15:55', '2022-06-23 00:15:55'),
(140, 7, 4, 3, '2022-06-26 01:31:41', '2022-06-26 01:31:41'),
(141, 7, 5, 0, '2022-06-26 01:36:45', '2022-06-26 01:36:45'),
(142, 7, 6, 4, '2022-06-26 01:36:54', '2022-06-26 01:36:54'),
(143, 7, 7, 5, '2022-06-26 01:36:55', '2022-06-26 01:36:55'),
(144, 7, 8, 3, '2022-06-26 01:36:57', '2022-06-26 01:36:57'),
(145, 7, 9, 2, '2022-06-26 01:36:59', '2022-06-26 01:36:59'),
(146, 7, 10, 3, '2022-06-26 01:37:00', '2022-06-26 01:37:00'),
(147, 7, 11, 5, '2022-06-26 01:37:02', '2022-06-26 01:37:02'),
(148, 7, 12, 3, '2022-06-26 01:37:03', '2022-06-26 01:37:03'),
(149, 7, 13, 3, '2022-06-26 01:37:09', '2022-06-26 01:37:09'),
(150, 7, 14, 4, '2022-06-26 01:37:10', '2022-06-26 01:37:10'),
(151, 7, 15, 5, '2022-06-26 01:41:27', '2022-06-26 01:41:27'),
(152, 7, 16, 3, '2022-06-26 01:41:29', '2022-06-26 01:41:29'),
(153, 7, 17, 4, '2022-06-26 01:41:30', '2022-06-26 01:41:30'),
(154, 7, 18, 2, '2022-06-26 01:41:33', '2022-06-26 01:41:33'),
(155, 7, 19, 0, '2022-06-26 01:42:02', '2022-06-26 01:42:02'),
(156, 7, 21, 3, '2022-06-26 01:42:06', '2022-06-26 01:42:06'),
(157, 7, 22, 2, '2022-06-26 01:42:08', '2022-06-26 01:42:08'),
(158, 7, 24, 5, '2022-06-26 01:42:11', '2022-06-26 01:42:11'),
(159, 7, 25, 2, '2022-06-26 01:42:13', '2022-06-26 01:42:13'),
(160, 7, 26, 3, '2022-06-26 01:42:15', '2022-06-26 01:42:15'),
(161, 7, 27, 1, '2022-06-26 01:42:17', '2022-06-26 01:42:17'),
(162, 7, 28, 2, '2022-06-26 01:42:19', '2022-06-26 01:42:19'),
(163, 7, 29, 4, '2022-06-26 01:42:20', '2022-06-26 01:42:20'),
(164, 7, 30, 4, '2022-06-26 01:42:22', '2022-06-26 01:42:22'),
(165, 7, 31, 2, '2022-06-26 01:42:25', '2022-06-26 01:42:25'),
(166, 7, 32, 4, '2022-06-26 01:42:27', '2022-06-26 01:42:27'),
(167, 7, 33, 5, '2022-06-26 01:42:30', '2022-06-26 01:42:30'),
(168, 7, 34, 4, '2022-06-26 01:43:38', '2022-06-26 01:43:38'),
(169, 7, 35, 4, '2022-06-26 01:43:40', '2022-06-26 01:43:40'),
(170, 7, 36, 4, '2022-06-26 01:43:43', '2022-06-26 01:43:43'),
(171, 7, 37, 2, '2022-06-26 01:43:45', '2022-06-26 01:43:45'),
(172, 7, 38, 2, '2022-06-26 01:43:49', '2022-06-26 01:43:49'),
(173, 7, 39, 4, '2022-06-26 01:43:53', '2022-06-26 01:43:53'),
(174, 7, 40, 5, '2022-06-26 01:43:55', '2022-06-26 01:43:55'),
(175, 7, 42, 4, '2022-06-26 01:44:00', '2022-06-26 01:44:00'),
(176, 7, 43, 4, '2022-06-26 01:44:02', '2022-06-26 01:44:02'),
(177, 7, 44, 5, '2022-06-26 01:44:04', '2022-06-26 01:44:04'),
(178, 7, 45, 4, '2022-06-26 01:44:06', '2022-06-26 01:44:06'),
(179, 7, 46, 3, '2022-06-26 01:44:10', '2022-06-26 01:44:10'),
(180, 7, 47, 4, '2022-06-26 01:44:29', '2022-06-26 01:44:29'),
(181, 7, 48, 3, '2022-06-26 01:44:31', '2022-06-26 01:44:31'),
(182, 7, 49, 4, '2022-06-26 01:44:34', '2022-06-26 01:44:34'),
(183, 7, 50, 4, '2022-06-26 01:44:37', '2022-06-26 01:44:37'),
(184, 7, 51, 4, '2022-06-26 01:44:39', '2022-06-26 01:44:39'),
(185, 7, 52, 3, '2022-06-26 01:44:41', '2022-06-26 01:44:41'),
(186, 7, 53, 1, '2022-06-26 01:44:46', '2022-06-26 01:44:46'),
(187, 7, 54, 3, '2022-06-26 01:44:48', '2022-06-26 01:44:48'),
(188, 7, 55, 3, '2022-06-26 01:45:00', '2022-06-26 01:45:00'),
(189, 7, 56, 4, '2022-06-26 01:45:02', '2022-06-26 01:45:02'),
(190, 7, 57, 2, '2022-06-26 01:45:06', '2022-06-26 01:45:06'),
(191, 7, 58, 4, '2022-06-26 01:45:09', '2022-06-26 01:45:09'),
(192, 7, 59, 4, '2022-06-26 01:45:11', '2022-06-26 01:45:11'),
(193, 7, 60, 2, '2022-06-26 01:45:13', '2022-06-26 01:45:13'),
(194, 7, 61, 4, '2022-06-26 01:45:15', '2022-06-26 01:45:15'),
(195, 7, 62, 3, '2022-06-26 01:45:17', '2022-06-26 01:45:17'),
(196, 7, 63, 4, '2022-06-26 01:45:20', '2022-06-26 01:45:20'),
(197, 7, 64, 3, '2022-06-26 01:45:35', '2022-06-26 01:45:35'),
(198, 7, 65, 4, '2022-06-26 01:45:40', '2022-06-26 01:45:40'),
(199, 7, 66, 2, '2022-06-26 01:45:42', '2022-06-26 01:45:42'),
(200, 7, 67, 4, '2022-06-26 01:45:44', '2022-06-26 01:45:44'),
(201, 7, 68, 4, '2022-06-26 01:45:46', '2022-06-26 01:45:46'),
(202, 7, 69, 5, '2022-06-26 01:45:47', '2022-06-26 01:45:47'),
(203, 7, 70, 2, '2022-06-26 01:45:50', '2022-06-26 01:45:50'),
(204, 7, 71, 4, '2022-06-26 01:45:52', '2022-06-26 01:45:52'),
(205, 7, 72, 4, '2022-06-26 01:45:54', '2022-06-26 01:45:54'),
(206, 7, 73, 4, '2022-06-26 01:46:01', '2022-06-26 01:46:01'),
(207, 7, 74, 4, '2022-06-26 01:46:06', '2022-06-26 01:46:06'),
(208, 7, 75, 5, '2022-06-26 01:46:09', '2022-06-26 01:46:09'),
(209, 7, 76, 3, '2022-06-26 01:46:11', '2022-06-26 01:46:11'),
(210, 7, 77, 2, '2022-06-26 01:46:13', '2022-06-26 01:46:13'),
(211, 7, 78, 4, '2022-06-26 01:46:15', '2022-06-26 01:46:15'),
(212, 7, 79, 5, '2022-06-26 01:46:16', '2022-06-26 01:46:16'),
(213, 7, 80, 4, '2022-06-26 01:46:18', '2022-06-26 01:46:18'),
(214, 7, 81, 5, '2022-06-26 01:46:21', '2022-06-26 01:46:21'),
(215, 7, 82, 5, '2022-06-26 01:46:23', '2022-06-26 01:46:23'),
(216, 7, 83, 5, '2022-06-26 01:46:24', '2022-06-26 01:46:24'),
(217, 7, 84, 5, '2022-06-26 01:46:26', '2022-06-26 01:46:26'),
(218, 7, 85, 3, '2022-06-26 01:46:29', '2022-06-26 01:46:29'),
(219, 7, 86, 2, '2022-06-26 01:46:31', '2022-06-26 01:46:31'),
(220, 7, 87, 5, '2022-06-26 01:46:33', '2022-06-26 01:46:33'),
(221, 7, 88, 3, '2022-06-26 01:46:34', '2022-06-26 01:46:34'),
(222, 7, 89, 3, '2022-06-26 01:46:39', '2022-06-26 01:46:39'),
(223, 7, 90, 3, '2022-06-26 01:46:42', '2022-06-26 01:46:42'),
(224, 7, 91, 2, '2022-06-26 01:46:44', '2022-06-26 01:46:44'),
(225, 7, 92, 3, '2022-06-26 01:46:46', '2022-06-26 01:46:46'),
(226, 7, 93, 4, '2022-06-26 01:46:47', '2022-06-26 01:46:47'),
(227, 7, 94, 3, '2022-06-26 01:46:49', '2022-06-26 01:46:49'),
(228, 7, 95, 4, '2022-06-26 01:46:51', '2022-06-26 01:46:51'),
(229, 7, 96, 2, '2022-06-26 01:46:52', '2022-06-26 01:46:52'),
(230, 7, 97, 3, '2022-06-26 01:46:54', '2022-06-26 01:46:54'),
(231, 7, 98, 4, '2022-06-26 01:46:56', '2022-06-26 01:46:56'),
(232, 7, 99, 3, '2022-06-26 01:46:57', '2022-06-26 01:46:57'),
(233, 7, 100, 1, '2022-06-26 01:46:59', '2022-06-26 01:46:59'),
(234, 7, 101, 4, '2022-06-26 01:47:01', '2022-06-26 01:47:01'),
(235, 7, 102, 5, '2022-06-26 01:47:03', '2022-06-26 01:47:03'),
(236, 7, 103, 3, '2022-06-26 01:47:05', '2022-06-26 01:47:05'),
(237, 7, 104, 3, '2022-06-26 01:47:09', '2022-06-26 01:47:09'),
(238, 7, 105, 2, '2022-06-26 01:47:11', '2022-06-26 01:47:11'),
(239, 7, 106, 4, '2022-06-26 01:47:13', '2022-06-26 01:47:13'),
(240, 7, 108, 5, '2022-06-26 01:47:18', '2022-06-26 01:47:18'),
(241, 7, 110, 3, '2022-06-26 01:47:23', '2022-06-26 01:47:23'),
(242, 7, 111, 2, '2022-06-26 01:47:25', '2022-06-26 01:47:25'),
(243, 7, 113, 3, '2022-06-26 01:47:29', '2022-06-26 01:47:29'),
(244, 7, 114, 4, '2022-06-26 01:47:31', '2022-06-26 01:47:31'),
(245, 7, 115, 4, '2022-06-26 01:47:33', '2022-06-26 01:47:33'),
(246, 7, 116, 2, '2022-06-26 01:47:35', '2022-06-26 01:47:35'),
(247, 7, 117, 5, '2022-06-26 01:47:37', '2022-06-26 01:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `tema_bakat`
--

DROP TABLE IF EXISTS `tema_bakat`;
CREATE TABLE IF NOT EXISTS `tema_bakat` (
  `id_tema_bakat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_tema` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tema_bakat`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tema_bakat`
--

INSERT INTO `tema_bakat` (`id_tema_bakat`, `nama_tema`, `deskripsi`, `created_at`, `updated_at`) VALUES
(9, 'REDACTING', 'Memilih, Mengedit , Merevisi Dokumen Tertulis Yang Sudah Diklasifikasikan Dalam Persiapan Publikasinya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(7, 'CONCEPTUALIZING', 'Membuat Konsep Berdasarkan Apa Yang Dilihat, Dialami Atau Diyakini', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(8, 'EDITING', 'Mengoreksi Tulisan Yang Dibuat Sebelumnya Untuk Dipublikasikan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(10, 'REPORTING', 'Membuat Pernyataan Resmi Secara Tertulis Ataupun Lisan Mengenai Sesuatu.', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(11, 'WRITING', 'Menulis Artikel, Ide, Dokumen, Cerita Ataupun Alat Bantu Pendidikan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(12, 'INTERPRETING', 'Membangun Atau Menjelaskan Arti Atau Makna Dari Sesuatu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(13, 'TRANSCRIBING', 'Menuliskan Kembali Dengan Lengkap, Catatan Ataupun Steno Yang Sudah Dibuat', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(14, 'TRANSLATING', 'Menulis Atau Mengatakan Sesuatu Dalam Bahasa Lain Yang Diperlukan Agar Orang Yang Membaca Ataupun Mendengar Bisa Mengerti', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(15, 'COMPLYING', 'Menjalankan Dan Menjaga Kepatuhan Sesuai Dengan Aturan Yang Berlaku', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(16, 'FILLING', 'Menyimpan Berkas Ditempat Yang Benar Dengan Rapih Dan Mudah Dicari', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(17, 'HOUSE KEEPING', 'Merapihkan, Membersihkan Dan Menata Ruangan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(18, 'TYPEWRITING', 'Melakukan Pengetikan ,Atau Memasukan Data Untuk Menghasilkan Dokumen, Berkas, Artikel Dlsb', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(19, 'ORGANIZING', 'Mengatur / Menyusun Acara, Sistem & Prosedur Ataupun Tataletak', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(20, 'SCHEDULING', 'Membuat Rencana Dari Tugas Yang Harus Dilakukan Dengan Urutan Dan Waktu Tertentu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(21, 'ASSEMBLING', 'Menyusun Semua Bagian Terpisah Yang Diperlukan Untuk Menjadi Barang Jadi Dan Lengkap', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(22, 'BUILDING', 'Membangun Rumah, Gedung, Pabrik, Jembatan Dan Struktur Lainnya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(23, 'INSTALLING', 'Memasang Bagian Bagian Terpisah Dari Suatu Mesin Menjadi Peralatan Yang Siap Pakai', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(24, 'PRODUCING', 'Membuat Atau Menciptakan Sesuatu Sesuatu Menjadi Barang Jadi Ataupun Barang Setengah Jadi', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(25, 'FINISHING', 'Kegiatan Tahap Terakhir Untuk Menyelesaikan Proses Produksi , Proyek Atau Konstruksi', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(26, 'TESTING', 'Melakukan Pengujian Untuk Membuktikan Sesuatunya Bekerja Dengan Benar Sesuai Dengan Spesifikasi Yang Diharapkan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(27, 'DELIVERING', 'Mengirim Sesuatu Seperti Surat, Barang Yang Dibeli Atau Dipesan Ke Alamat Atau Orang Tertentu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(28, 'DISTRIBUTING', 'Menyebarkan Sesuatu [Barang, Surat, Artikel] Pada Saat Yang Hampir Bersamaan Ketempat Atau Daerah Tertentu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(29, 'MAINTAINING', 'Memelihara Mesin , Peralatan , Sistem Atau Bangunan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(30, 'OPERATING', 'Membuat Sesuatu [ Mesin, Peralatan, Proses, Sistem] Berjalan / Beroperasi', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(31, 'RESTORING', 'Memperbaiki, Mengembalikan Sesuatu [Peralatan, Sistim, Manusia] Ke Fungsi Semula', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(32, 'TENDING ANIMAL', 'Memberi Makan, Merawat, Melatih, Mengembangkan Biakan Binatang', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(33, 'SPORT', 'Melakukan Kegiatan Olahraga Tertentu Dengan Berprestasi', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(34, 'PLANTING', 'Bertani: Menyiapkan, Menyemai, Menanam, Menumbuhkan, Memelihara, Memangkas Dll', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(35, 'PHYSICAL SKILL', 'Menggunakan Fungsi Koordinasi Fisik Seperti Memanjat, Mengontrol Dan Mengoperasikan Peralatan Dll', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(36, 'MANUAL SKILL', 'Pekerjaan Dimana Dibutuhkan Keterampilan Tangan, Kerajinan Tangan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(37, 'VISUAL ART', 'Kegiatan Yang Berkaitan Dengan Seni Visual Seperti Melukis, Komunikasi Visual, Gambar Dlsb', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(38, 'SINGING', 'Bernyanyi Didepan Penonton', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(39, 'MUSICAL ART', 'Kegiatan Yang Berkaitan Dengan Seni Musik', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(40, 'MODELLING', 'Kegiatan Seorang Model Feshen', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(41, 'DRAMATIZING', 'Membuat Sesuatu Menjadi Lebih Dramatis', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(42, 'DANCING', 'Menampilkan Gerakan Tubuh Yang Indah Dan Harmonis Yang Diiringi Irama Tertentu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(43, 'COOKING', 'Membuat Dan Menyiapkan Makanan / Kueh', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(44, 'CONSERVING', 'Menjaga Sesuatu, Khususnya Sumber Daya Budaya Dan Lingkungan Dari Bahaya Kehilangan, Kerusakan, Perubahan Atau Kelapukan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(45, 'BEAUTIFYING', 'Membuat Sesuatu Atau Seseorang Menjadi Menyenangkan Dan Menarik Untuk Dilihat', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(46, 'ACTING', 'Beraksi Mengexpresikan Peran Sebagai Aktor / Artis', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(47, 'VISIONING', 'Kegiatan Mengantisipasi Masadepan Secara Bijak Dan Menentukan Visi Yang Benar', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(48, 'STRATEGIZING', 'Memilih Atau Merencanakan Jalan Terbaik Menuju Tujuan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(49, 'PLANNING', 'Menentukan Sasaran, Membuat Skedul, Program Kerja, Prioritas, Revisi Dan Penyesuaikan Kebijakkan Dlsb', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(50, 'PUBLICIZING', 'Membuat Sesuatu [ Produk, Layanan, Informasi ] Menjadi Diketahui Secara Umum Atau Oleh Anggauta Dari Kelompok Tertentu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(51, 'MARKETING', 'Aktivitas Bisnis Mengenai Strategi Memasarkan Termasuk Mempresentasikan Layanan Atau Produk Ke Pelanggan Potensial Dengan Berbagai Jalan Agar Mereka Tertarik Untuk Membeli', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(52, 'DEVELOPING', 'Mengubah, Atau Menyebabkan Perubahan Sehingga Menjadi Lebih Besar, Lebih Kuat, Lebih Menarik, Lebih Maju', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(53, 'ADVERTISING', 'Membuat Promosi Melalui Pengumuman Publik Di Koran, Radio, Televisi Mengenai Produk, Layanan, Acara, Lowongan Untuk Menarik Dan Meningkatkan Perhatian Publik', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(54, 'SYNTHESIZING', 'Mengintegrasikan Ide Dan Informasi, Mengkombinasikan Berbagai Elemen Menjadi Satu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(55, 'IDEATING', 'Melontarkan Ide Tentang Segala Sesuatu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(56, 'CREATING', 'Menggunakan Imajinasi Untuk Menemukan Suatu Rancangan, Produk Atau Layanan Yang Baru', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(57, 'ANIMATING', 'Mempresentasikan Atau Merekam Sesuatu Dalam Bentuk Deretan Gambar Tetap Yang Bergerak', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(58, 'DRAFTING', 'Membuat Gambar Teknik', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(59, 'DESIGNING', 'Membuat Gambar Dari Sesuatu [ Bangunan, Produk ] Yang Direncanakan Untuk Dibuat (Yang Memperlihatkan Bagaimana Cara Membuatnya)', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(60, 'SERVING', 'Melayani Orang Lain Sebagai Pekerjaan, Tugas Ataupun Keinginan Yang Tulus', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(61, 'INFORMING', 'Menyampaikan Informasi Ataupun Pengetahuan Kepada Orang Lain', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(62, 'GREETING', 'Memberikan Salam Sapaan Dengan Santun Kepada Orang Lain Yang Dikenal Maupun Belum Dikenal', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(63, 'ASSISTING', 'Membantu Seseorang Melakukan Tugasnya Dalam Posisi Sebagai Bawahan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(64, 'VOLUNTEERING', 'Melakukan Sesuatu Pekerjaan Sosial Tanpa Meminta Bayaran Atau Imbalan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(65, 'THERAPIES', 'Menyembuhkan Atau Merehabilitasi Seseorang Melalui Perlakuan Fisik, Mental Atau Perilaku', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(66, 'SPIRITUALIZING', 'Kegiatan Spiritual Seperti Sembahyang, Berdoa Dlsb', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(67, 'COUNSELLING', 'Membantu Menyelesaikan Masalah Pribadi Atau Masalah Psikologi Seseorang', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(68, 'CARING', 'Tugas Perawatan Atau Kerja Sosial Untuk Memperhatikan Orang Dari Sisi Fisik, Medik Atau Kesejahteraan Umum', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(69, 'INTERVIEWING', 'Menggunakan Teknik Bertanya Untuk Mendapatkan Informasi Dari Seseorang', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(70, 'RECRUITING', 'Memilih Dan Merekrut Seseorang Sebagai Pekerja Atau Anggauta', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(71, 'SELLING', 'Menjual Produk Atau Layanan Dengan Berbagai Cara Agar Orang Lain Mau Membelinya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(72, 'INFLUENCING', 'Mempengaruhi Pikiran Atau Meyakinkan Orang Lain', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(73, 'ENTERTAINING', 'Menghibur Seseorang Atau Sekelompok Orang', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(74, 'BROKERING', 'Menghubungkan Kedua Belah Fihak Baik Pembeli Maupun Penjual Sehingga Terjadi Transaksi', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(75, 'PURCHASING', 'Membeli Sesuatu Dengan Uang Atau Yang Setara Melalui Usaha Keras Maupun Pengorbanan Untuk Mendapatkan Yang Terbaik', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(76, 'NEGOTIATING', 'Berusaha Untuk Mendapat Persetujuan, Menawar Untuk Mendapatkan Keuntungan, Hak Atau Kesempatan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(77, 'INVESTIGATING', 'Melakukan Pengujian Secara Detil Untuk Menemukan Sesuatu Yang Belum Diketahui', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(78, 'INTERROGATING', 'Menanyai Seseorang Dengan Lengkap Secara Agresif Atau Dengan Sikap Mengancam', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(79, 'CONTROLLING', 'Menggunakan Kekuasaan Untuk Dapat Mengatur Dan Mengawasi Orang Dalam Melaksanaan Tugas', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(80, 'COLLECTING', 'Menagih Uang Yang Sudah Jatuh Tempo Sesuai Dengan Kontrak Atau Perjanjian Yang Dibuat Sebelumnya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(81, 'MEDIATING', 'Mengatasi, Rekonsiliasi, Menyelesaikan Konflik', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(82, 'DISPATCHING', 'Menugaskan Sesorang Untuk Pergi Ketempat Tertentu Sesuai Dengan Tugas Yang Harus Dilakukan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(83, 'COORDINATING', 'Mengkoordinir Orang Untuk Bekerja Sama Melakukan Suatu Tugas', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(84, 'COOPERATING', 'Bertindak Atau Bekerja Bersama Untuk Mencapai Sasaran Yang Sama', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(85, 'PRESENTING', 'Menyampaikan Informasi Secara Formal Maupun Informal Dengan Cara Yang Mudah Dimengerti', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(86, 'CORRESPONDING', 'Komunikasi Dengan Cara Bertukar Pesan Tertulis Seperti Surat, Email Dlsb', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(87, 'COMMUNICATING', 'Menyampaikan Perasaan Atau Pikiran Dengan Berbicara Atau Menulis Atau Gerak Tubuh Sehingga Dapat Dimengerti Orang', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(88, 'REPRESENTING', 'Bertindak Atau Berbicara Atas Nama Orang Lain Dengan Resmi', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(89, 'RELATING', 'Membina Hubungan Persahabatan Dengan Orang Lain Berdasarkan Saling Pengertian Ataupun Berbagi Pandangan Dan Keperdulian', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(90, 'LIAISING', 'Menjadi Perwakilan Disuatu Tempat Dengan Membangun Jaringan Melalui Kontak Dengan Pelanggan Atau Lainnya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(91, 'GUIDING', 'Memberi Panduan Untuk Menujukkan Jalan Yang Benar Bagi Seseorang', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(92, 'MOTIVATING', 'Mendorong, Memberi Semangat Untuk Mendapatkan Kinerja Maksimum Pada Seseorang', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(93, 'SUPPORTING', 'Mendukung Orang /Kelompok Lain Melaksanakan Tugasnya Agar Hasil Kerja Orang / Kelompok Tersebut Maksimal', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(94, 'ADVISING', 'Memberikan Nasehat Atau Informasi', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(95, 'COACHING', 'Berpartner Dengan Klien Dalam Memperjelas, Menyelaraskan Dan Mencapai Tujuan Klien Sesuai Dengan Kekuatan Klien Tersebut', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(96, 'CONSULTING', 'Memberikan Nasehat Dan Strategi Sukses Kepada Klien Sesuai Dengan Keahliannya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(97, 'MENTORING', 'Mengajarkan Klien Dengan Metoda Pengajar Dan Membukakan Jalan Yang Membuat Mereka Sukses', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(98, 'TEACHING', 'Mengajar, Menyampaikan Ilmu Dengan Cara Yang Benar Agar Bisa Difahami Oleh Orang Lain', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(99, 'TRAINING', 'Mengajari Keterampilan, Prosedur, Metoda, Keahlian Dll Untuk Mengembangkan Keterampilan Dan Pengetahuan Seseorang Dibidang Tertentu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(100, 'ANALYZING', 'Mencari Apa Yang Menjadikan Sesuatu Dengan Cara Mengidentifikasikan Bagian Bagian Pembentuknya, [Atau Mempelajari Sesuatu Dengan Seksama]', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(101, 'BOOKEEPING', 'Mencatat Uang Yang Diterima Dan Dibelanjakan Oleh Individu, Bisnis Atau Organisasi Dalam Buku Dengan Standar Tertentu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(102, 'PROGRAMMING', 'Merancang Program, Menulis Program, Merancang Antar Muka, Mengembangkan Piranti Lunak Komputer', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(103, 'BUDGETING', 'Merencanaan, Mengatur, Menyimpan, Mendistribusikan Dana /Uang', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(104, 'CASHIERING', 'Menerima , Menyimpan, Membayar Uang Sesuai Prosedur Dan Menyimpan Catatannya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(105, 'COSTING', 'Memonitor Dan Memeriksa Pengeluaran Biaya Yang Telah Diperhitungkan Sebelumnya Untuk Melaksanakan Suatu Proyek', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(106, 'ESTIMATING', 'Membuat Perhitungan Biaya Kira Kira Dari Suatu Pekerjaan Untuk Tujuan Membuat Penawaran', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(107, 'AUDITING', 'Melakukan Pemeriksaan, Koreksi Terhadap Laporan Terkait Keuangan Yang Dilakukan Sesuai Dengan Kebutuhan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(108, 'INSPECTING', 'Memeriksa Sesuatu Dengan Seksama Mengenai Mutu Atau Kebenarannya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(109, 'VERIFYING', 'Memeriksa Benar Tidaknya Sesuatu Dengan Cara Menguji, Menginvestigasi Atau Membandingkan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(110, 'MONITORING', 'Mengawasi Kemungkinan Ketidak Benaran Atau Ketidak Adilan Dari Suatu Pelaksanaan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(111, 'SAFEKEEPING', 'Menjaga Keselamatan Jiwa Manusia Dari Risiko Bahaya Atau Kecelakaan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(112, 'SECURING', 'Menjaga Keamanan Aset Dari Kehilangan, Pencurian , Kerusakan Dlsb', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(113, 'DIAGNOSING', 'Mengidentifikasi Penyebab Dari Suatu Masalah.', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(114, 'IDENTIFYING', 'Mengenali Sesuatu Atau Seseorang Dan Agar Bisa Mengatakan Siapa Dia Atau Apa Itu', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(115, 'APPRAISING', 'Menaksir Nilai / Harga Dari Sesuatu [ Barang, Produk, Bangunan, Tanah, Perusahaan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(116, 'EVALUATING', 'Menimbang Atau Menguji Sesuatu Dalam Rangka Menentukan Harga Atau Mutu Atau Kepentingan Atau Juga Kondisinya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(117, 'OBSERVING', 'Memperhatikan Seseorang Atau Sesuatu Dengan Seksama Khususnya Untuk Tujuan Keilmuan', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(118, 'RESEARCHING', 'Melakukan Penelitian Terhadap Suatu Subyek Secara Metodik Untuk Menemukan Fakta Fakta, Memperbaiki Atau Membuat Teori Baru, Atau Mengembangkan Rencana Tindakan Berdasarkan Fakta', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(119, 'REVIEWING', 'Membuat Laporan Atau Survai Atas Kegiatan , Kinerja Dan Kejadian Yang Terjadi Sebelumnya', '2022-06-22 22:49:42', '2022-06-22 22:49:42'),
(120, 'SURVEYING', 'Memperhatikan Sesuatu Atau Seseorang Dengan Seksama Khususnya Untuk Membuat Suatu Opini', '2022-06-22 22:49:42', '2022-06-22 22:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

DROP TABLE IF EXISTS `unit_kerja`;
CREATE TABLE IF NOT EXISTS `unit_kerja` (
  `id_unit_kerja` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_family_id` bigint(20) NOT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_unit_kerja`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit_kerja`, `job_family_id`, `departemen`, `created_at`, `updated_at`) VALUES
(6, 1, 'Dep Produksi I B', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(5, 1, 'Dep Produksi I A', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(7, 1, 'Dep Produksi II A', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(8, 1, 'Dep Produksi II B', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(9, 1, 'Dep Produksi III A', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(10, 1, 'Dep Produksi III B', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(11, 1, 'Dep Proses & Pengendalian Kualitas', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(12, 1, 'Dep Perencanaan Produksi & Pengelolaan Energi', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(13, 1, 'Dep Lingkungan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(14, 1, 'Dep Keselamatan & Kesehatan Kerja', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(15, 1, 'Staf Madya Shift Operasi', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(16, 1, 'Proyek Bidang Administrasi & Logistik (Bagian K3)', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(17, 1, 'Dpb Anper Bidang Operasi', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(18, 2, 'Dep Perencanaan Strategi Pemeliharaan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(19, 2, 'Dep Reliability', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(20, 2, 'Dep Perencanaan & Pengendalian TA', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(21, 2, 'Dep Inspeksi Teknik Rotating', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(22, 2, 'Dep Inspeksi Teknik Statik', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(23, 2, 'Dep Bengkel & Fabrikasi', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(24, 2, 'Dep Pemeliharaan I', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(25, 2, 'Dep Pemeliharaan II', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(26, 2, 'Dep Pemeliharaan III', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(27, 2, 'Dep Teknik & Bisnis', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(28, 2, 'Proyek Bidang Pemeliharaan (Bagian Mechanical & Piping, Electrical/Instrument)', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(29, 2, 'Dpb Anper Bidang Pemeliharaan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(30, 3, 'Dep Rancang Bangun', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(31, 3, 'Proyek Bidang Administrasi & Logitstik (Bagian\nProject Control)', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(32, 3, 'Proyek Bidang Engineering & Konstruksi (Bagian\nProcess dan Civil)', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(33, 3, 'Dpb Anper Bidang Engineering', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(34, 4, 'Project Agrosolution', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(35, 4, 'Project Retail Management', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(36, 4, 'Dep Administrasi Pemasaran', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(37, 4, 'Dep Administrasi Penjualan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(38, 4, 'Dpb Anper Bidang Pemasaran', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(39, 5, 'Dep Keuangan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(40, 5, 'Dep Pelaporan Keuangan & Manajemen', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(41, 5, 'Dep Akuntansi Biaya', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(42, 5, 'Dep Anggaran', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(43, 5, 'Dep Portofolio Bisnis', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(44, 5, 'Proyek Bidang Administrasi & Logistik (Bagian Administrasi & Keuangan)', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(45, 5, 'Dpb Anper Bidang Keuangan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(46, 6, 'Dep Pengembangan Korporat', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(47, 6, 'Dep Riset', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(48, 6, 'Dpb Anper Bidang Perencanaan & Pengembangan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(49, 7, 'Dep Remunerasi & Hubungan Industrial', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(50, 7, 'Dep Inovasi & Sistem Manajemen', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(51, 7, 'Dep Pengembangan SDM & Organisasi', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(52, 7, 'Dpb Anper Bidang SDM', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(53, 8, 'Dep Pengadaan Barang', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(54, 8, 'Dep Pengadaan Jasa', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(55, 8, 'Dep Perencanaan & Penerimaan Barang/Jasa', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(56, 8, 'Dep Pengelolaan Pelabuhan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(57, 8, 'Dep Pengelolaan Mitra Produksi', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(58, 8, 'Dep Pergudangan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(59, 8, 'Dpb Anper Bidang Pengadaan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(60, 9, 'Dep Komunikasi Korporat', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(61, 9, 'Dep Corporate Social Responsibility', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(62, 9, 'Dep TKP & Manajemen Risiko', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(63, 9, 'Dep Pelayanan Umum', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(64, 9, 'Dep Keamanan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(65, 9, 'Dep Administrasi Bisnis', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(66, 9, 'Dpb Anper Bidang Sesper', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(67, 9, 'Dpb Anper Bidang Sekretaris Perusahaan', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(68, 10, 'Dep Audit Operasi & Produksi', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(69, 10, 'Dep Audit Keuangan & Umum', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(70, 10, 'Dpb Anper Bidang Audit', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(71, 11, 'Dep Hukum', '2022-06-22 22:48:48', '2022-06-22 22:48:48'),
(72, 11, 'Dpb Anper Bidang Hukum', '2022-06-22 22:48:48', '2022-06-22 22:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pegawai` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_kerja_id` bigint(20) NOT NULL,
  `assesmen` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `alamat`, `telepon`, `no_pegawai`, `foto`, `email`, `email_verified_at`, `password`, `hak_akses`, `unit_kerja_id`, `assesmen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'lorep Ipsum', '08221398132', 'P8812', NULL, 'user@tm.com', NULL, '$2y$10$ldscA3hXhVlYYRiXXmfZKupmspBh6khak.LF8zriJ89oe9E3lXUt6', 'User', 1, 'Y', NULL, '2022-06-06 21:18:35', '2022-06-06 21:18:35'),
(2, 'Admin', 'lorep Ipsum', '08442353981', 'P8832', NULL, 'admin@tm.com', NULL, '$2y$10$NESfbpE68HXShAOWCkQUBu7KKL6FaScQgiPqs4bgiKO7JPPwfJB86', 'Admin', 1, 'N', NULL, '2022-06-06 21:18:35', '2022-06-06 21:18:35'),
(3, 'ronio', 'romo', '0832143289', 'np1213', NULL, 'roniboy@tm.com', NULL, '12345678', 'admin', 1, 'N', NULL, '2022-06-06 21:21:38', '2022-06-06 21:21:38'),
(7, 'Aad', 'Roomo', '083424242344', 'p912231', NULL, 'aad@tm.com', NULL, '$2y$10$w.KJvpXBw8LinxESgtcB6eNm82wf9s8PwuGfxZqJQ0YvWHVWT3QYm', 'User', 1, 'Y', NULL, '2022-06-10 20:52:50', '2022-06-26 05:13:44'),
(8, 'Rizza', 'Roomo', '08342431231', 'p9123324', NULL, 'rizaboy@tm.com', NULL, '$2y$10$lp6NuV1JX/Xp.vzs581kme2EiawSGi7eCGl/7Ayp1ot.IgahiKGHi', 'User', 2, 'N', NULL, '2022-06-10 20:52:50', '2022-06-10 20:52:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
