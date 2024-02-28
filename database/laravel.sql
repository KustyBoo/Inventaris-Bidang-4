-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 10:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banyak_barang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `banyak_barang`, `created_at`, `updated_at`) VALUES
(27, '1.3.2.05.001.004.001', 0, '2024-02-12 23:31:56', '2024-02-25 19:26:03'),
(28, '1.3.2.05.001.004.005', 0, '2024-02-12 23:33:55', '2024-02-19 23:26:24'),
(29, '1.3.2.05.002.001.008', 5, '2024-02-12 23:40:58', '2024-02-14 18:34:53'),
(30, '1.3.2.05.001.004.0011', 7, '2024-02-16 00:51:01', '2024-02-18 19:09:10'),
(34, '1.3.2.05.002.001.024', 2, '2024-02-17 02:20:29', '2024-02-17 02:20:29'),
(35, '1.3.2.05.002.001.030', 4, '2024-02-18 02:19:58', '2024-02-19 19:06:59'),
(36, '1.3.2.05.002.004.004', 2, '2024-02-18 19:06:11', '2024-02-19 19:11:49'),
(37, '1.3.2.06.001.002.015', 2, '2024-02-18 19:18:15', '2024-02-25 19:31:24'),
(38, '1.3.2.06.001.001.048', 5, '2024-02-19 23:18:04', '2024-02-28 00:18:53'),
(39, '1.3.2.10.002.002.009', 1, '2024-02-19 23:20:33', '2024-02-19 23:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengambil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek_tipe_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perolehan_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_pembelian` int(11) NOT NULL,
  `ukuran_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keadaan_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banyak_barang` int(11) NOT NULL,
  `harga_satuan_barang` bigint(20) NOT NULL,
  `jumlah_harga_barang` bigint(20) NOT NULL,
  `kode_ruangan` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `foto_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_barang` bigint(20) UNSIGNED NOT NULL,
  `id_barang_masuk` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `nama_pengambil`, `reg`, `nama_jenis_barang`, `merek_tipe_barang`, `no_pabrik`, `bahan`, `perolehan_barang`, `tahun_pembelian`, `ukuran_barang`, `satuan`, `keadaan_barang`, `banyak_barang`, `harga_satuan_barang`, `jumlah_harga_barang`, `kode_ruangan`, `tanggal_keluar`, `foto_barang`, `kategori_barang`, `id_barang_masuk`, `created_at`, `updated_at`) VALUES
(2, 'Felix', '000001', 'Filing Cabinet Besi', 'Lion', NULL, 'besi', 'Pembelian', 2012, '4 pintu', NULL, 'Kurang Baik', 1, 2130000, 2130000, 7, '2024-02-13', '20240213075615.jpg', 2, 8, '2024-02-12 23:56:15', '2024-02-12 23:56:15'),
(3, 'Felix', '000001', 'Filing Cabinet Besi', 'Lion', NULL, 'besi', 'Pembelian', 2012, '4 pintu', NULL, 'Kurang Baik', 1, 2130000, 2130000, 7, '2024-03-15', '20240215022329.jpg', 2, 8, '2024-02-14 18:23:29', '2024-02-14 18:23:29'),
(4, 'Kania', '000001 s/d 000006', 'Meja Rapat', 'Uno Gold Series / UOD-4056', NULL, 'kayu', 'Pembelian', 2012, 'biasa', NULL, 'Baik', 1, 2000000, 12000000, 7, '2024-02-15', '20240215023453.jpg', 1, 9, '2024-02-14 18:34:53', '2024-02-14 18:34:53'),
(5, 'Admin', '000002', 'Charger laptop', 'Asus', NULL, 'Alumunium', 'Pembelian', 2012, NULL, '1', 'Baik', 1, 200000, 2000000, 2, '2024-02-16', '20240216085141.jpg', 1, 10, '2024-02-16 00:51:41', '2024-02-16 00:51:41'),
(6, 'Felix', '000001', 'Filing Cabinet Besi', 'Lion', NULL, 'besi', 'Pembelian', 2012, '4 pintu', NULL, 'Kurang Baik', 1, 2130000, 2130000, 7, '2024-03-18', '20240218100829.jpg', 2, 8, '2024-02-18 02:08:29', '2024-02-18 02:08:29'),
(7, 'Admin', '000002', 'Charger laptop', 'Asus', NULL, 'Alumunium', 'Pembelian', 2012, NULL, '1', 'Baik', 1, 200000, 2000000, 2, '2024-02-19', '20240219030704.jpg', 1, 10, '2024-02-18 19:07:05', '2024-02-18 19:07:05'),
(8, 'Felix', '000002', 'Charger laptop', 'Asus', NULL, 'Alumunium', 'Pembelian', 2012, NULL, '1', 'Baik', 1, 200000, 2000000, 2, '2024-02-19', '20240219030910.jpg', 1, 10, '2024-02-18 19:09:10', '2024-02-18 19:09:10'),
(9, 'Kania', '000001', 'Tinta Printer', 'Canon', NULL, 'Campuran', 'Pembelian', 2024, NULL, NULL, 'Baik', 1, 50000, 250000, 4, '2024-02-19', '20240219031915.jpg', 2, 14, '2024-02-18 19:19:15', '2024-02-18 19:19:15'),
(10, 'Admin', '000001', 'Kertas 500 RIM', 'HVS Paper One 75 gsm', NULL, NULL, 'Pembelian', 2012, NULL, NULL, 'Kurang Baik', 1, 2130000, 4260000, 7, '2024-02-20', '20240220001454.jpg', 2, 8, '2024-02-19 16:14:54', '2024-02-19 16:14:54'),
(11, 'Felix', '000001', 'Tinta Printer', 'Canon', NULL, 'Campuran', 'Pembelian', 2024, NULL, NULL, 'Baik', 1, 50000, 250000, 4, '2024-02-20', '20240220030606.jpg', 2, 14, '2024-02-19 19:06:06', '2024-02-19 19:06:06'),
(12, 'Kania', '000001 s/d 000016', 'Kursi Rapat', 'Chitose / Kursi Rapat', NULL, NULL, 'Pembelian', 2018, NULL, NULL, 'Baik', 1, 500000, 2500000, 7, '2024-02-20', '20240220030659.jpg', 1, 12, '2024-02-19 19:06:59', '2024-02-19 19:06:59'),
(13, 'Rizky Fajar Fanani', '000001', 'Kertas 500 RIM', 'HVS Paper One 75 gsm', NULL, NULL, 'Pembelian', 2012, NULL, NULL, 'Kurang Baik', 1, 2130000, 4260000, 7, '2024-02-20', '20240220072624.jpg', 2, 8, '2024-02-19 23:26:24', '2024-02-19 23:26:24'),
(14, 'Felix', '000001', 'Lemari Besi/Metal', 'Lion', NULL, 'Besi', 'Pembelian', 2012, '2 pintu', NULL, 'Kurang Baik', 1, 2530000, 2530000, 7, '2024-02-26', '20240226032603.jpg', 1, 7, '2024-02-25 19:26:03', '2024-02-25 19:26:03'),
(15, 'Kania', '000001', 'Tinta Printer', 'Canon', NULL, 'Campuran', 'Pembelian', 2024, NULL, NULL, 'Baik', 1, 50000, 250000, 4, '2024-02-26', '20240226033124.jpg', 2, 14, '2024-02-25 19:31:24', '2024-02-25 19:31:24'),
(16, 'Admin', '000021', 'Uninterruptible Power Supply (UPS)', 'ICA Line Interaktive UPS / 602B', '1117Q1701559', 'Campuran', 'Pembelian', 2018, 'biasa', 'buah', 'Baik', 1, 2735000, 2735000, 7, '2024-02-28', '20240228081822.jpg', 1, 15, '2024-02-28 00:18:22', '2024-02-28 00:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merek_tipe_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pabrik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perolehan_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_pembelian` int(11) NOT NULL,
  `ukuran_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keadaan_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan_barang` bigint(20) NOT NULL,
  `jumlah_harga_barang` bigint(20) NOT NULL,
  `kode_ruangan` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `foto_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_barang` bigint(20) UNSIGNED NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `reg`, `nama_jenis_barang`, `merek_tipe_barang`, `no_pabrik`, `bahan`, `perolehan_barang`, `tahun_pembelian`, `ukuran_barang`, `satuan`, `keadaan_barang`, `harga_satuan_barang`, `jumlah_harga_barang`, `kode_ruangan`, `tanggal_masuk`, `foto_barang`, `kategori_barang`, `id_barang`, `created_at`, `updated_at`) VALUES
(7, '000001', 'Lemari Besi/Metal', 'Lion', NULL, 'Besi', 'Pembelian', 2012, '2 pintu', NULL, 'Kurang Baik', 2530000, 2530000, 7, '2024-01-13', '20240213073156.jpg', 1, 27, '2024-02-12 23:31:56', '2024-02-18 19:26:44'),
(8, '000001', 'Kertas 500 RIM', 'HVS Paper One 75 gsm', NULL, NULL, 'Pembelian', 2012, NULL, NULL, 'Kurang Baik', 2130000, 4260000, 7, '2024-02-13', '20240219031632.jpg', 2, 28, '2024-02-12 23:33:55', '2024-02-18 19:16:32'),
(9, '000001 s/d 000006', 'Meja Rapat', 'Uno Gold Series / UOD-4056', NULL, 'Kayu', 'Pembelian', 2012, 'biasa', NULL, 'Baik', 2000000, 10000000, 7, '2024-04-13', '20240213074058.jpg', 1, 29, '2024-02-12 23:40:58', '2024-02-18 19:26:20'),
(10, '000002', 'Charger laptop', 'Asus', NULL, NULL, 'Pembelian', 2012, NULL, '1', 'Baik', 200000, 1400000, 2, '2024-02-16', '20240219031402.jpg', 1, 30, '2024-02-16 00:51:01', '2024-02-18 19:14:02'),
(11, '000014', 'Meja 1/2 Biro', 'Saga MTB 120 / Meja Kerja 1/2 Biro', NULL, NULL, 'Pembelian', 2018, NULL, NULL, 'Rusak Berat', 993465, 1986930, 4, '2024-02-17', '20240217102029.jpg', 1, 34, '2024-02-17 02:20:29', '2024-02-17 02:20:41'),
(12, '000001 s/d 000016', 'Kursi Rapat', 'Chitose / Kursi Rapat', NULL, NULL, 'Pembelian', 2018, NULL, NULL, 'Baik', 500000, 2500000, 7, '2024-03-18', '20240218102329.jpg', 1, 35, '2024-02-18 02:19:58', '2024-02-18 19:08:03'),
(13, '000008', 'A.C. Split', 'Sharp / AHA 12 UCY', NULL, 'Campuran', 'Pembelian', 2018, NULL, NULL, 'Baik', 5400000, 10800000, 7, '2024-04-19', '20240219030611.jpg', 1, 36, '2024-02-18 19:06:11', '2024-02-19 19:11:49'),
(14, '000001', 'Tinta Printer', 'Canon', NULL, 'Campuran', 'Pembelian', 2024, NULL, NULL, 'Baik', 50000, 250000, 4, '2024-02-19', '20240219031815.jpg', 2, 37, '2024-02-18 19:18:15', '2024-02-18 19:18:15'),
(15, '000021', 'Uninterruptible Power Supply (UPS)', 'ICA Line Interaktive UPS / 602B', '1117Q1701559', 'Campuran', 'Pembelian', 2018, 'biasa', 'buah', 'Baik', 2735000, 13675000, 7, '2024-02-20', '20240220071804.jpg', 1, 38, '2024-02-19 23:18:04', '2024-02-28 00:18:53'),
(16, '000001', 'Scanner (Peralatan Mini Komputer)', 'Fujitsu / Image scanner', NULL, NULL, 'Pembelian', 2018, NULL, NULL, 'Baik', 10075320, 10075320, 7, '2024-02-20', '20240220072033.png', 2, 39, '2024-02-19 23:20:33', '2024-02-19 23:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'asset', '2024-02-06 18:33:47', '2024-02-06 18:33:47'),
(2, 'habis pakai', '2024-02-06 18:33:47', '2024-02-06 18:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(52, '2014_10_12_000000_create_users_table', 1),
(53, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(54, '2014_10_12_100000_create_password_resets_table', 1),
(55, '2019_08_19_000000_create_failed_jobs_table', 1),
(56, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(57, '2024_01_24_063828_create_permission_tables', 2),
(58, '2024_02_05_060211_create_barang_table', 3),
(59, '2024_02_06_000504_create_kategori_table', 4),
(61, '2024_01_22_020036_create_barang_masuk_table', 5),
(68, '2024_01_22_020046_create_barang_keluar_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-02-06 17:53:25', '2024-02-06 17:53:25'),
(2, 'user', 'web', '2024-02-06 17:53:25', '2024-02-06 17:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$12$.CGEGccaTfDHoI7LA4.kHuaP9Z9sTQbrxzHiivWbHqynt3SknUIoS', 'NS6GRUsd0xAW7zjCyi0XoJSKbZU60DpX7wM3zUp5m7v01ovn2ENoae2sfXxi', '2024-02-06 17:53:29', '2024-02-06 17:53:29'),
(2, 'Felix', 'felix@gmail.com', NULL, '$2y$12$iGCSs9MDZXCI1en6nG4ANOObrfGE8wrjjrZuqBs/B0vU2q3VgZjyK', '1jx3CqX2oh9KCZ7N8h6ApU091xN3FAIwJ1YJHD8doEuLOtJN7YbRPHbpw6WY', '2024-02-12 19:05:18', '2024-02-12 19:05:18'),
(3, 'Kania', 'kania@gmail.com', NULL, '$2y$12$Y8Cd4q1zPqaHBxE9BZ.ZYeWp3JaCnlq0RCTX6JAgpv7SrKxdv9Hjq', NULL, '2024-02-14 18:34:16', '2024-02-14 18:34:16'),
(4, 'Rizky Fajar Fanani', 'rizky@gmail.com', NULL, '$2y$12$Xb0aDRCjO..HHZ1KdLzk2u7FOG/KTOUs9ubsPUxiVjHOUpSE2vG.y', NULL, '2024-02-19 23:23:20', '2024-02-19 23:23:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang_kode_barang_unique` (`kode_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_keluar_kategori_barang_foreign` (`kategori_barang`),
  ADD KEY `barang_keluar_id_barang_masuk_foreign` (`id_barang_masuk`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuk_kategori_barang_foreign` (`kategori_barang`),
  ADD KEY `barang_masuk_id_barang_foreign` (`id_barang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_id_barang_masuk_foreign` FOREIGN KEY (`id_barang_masuk`) REFERENCES `barang_masuk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_keluar_kategori_barang_foreign` FOREIGN KEY (`kategori_barang`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_masuk_kategori_barang_foreign` FOREIGN KEY (`kategori_barang`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
