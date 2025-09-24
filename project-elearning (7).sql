-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2025 at 05:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemens`
--

CREATE TABLE `departemens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `departemens`
--

INSERT INTO `departemens` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2025-06-04 10:01:52', '2025-06-04 10:01:52'),
(2, 'HRD', '2025-06-04 10:01:52', '2025-06-04 10:01:52'),
(3, 'Finance', '2025-06-04 10:01:52', '2025-06-04 10:01:52'),
(28, 'Assisstant', '2025-08-06 04:55:10', '2025-08-06 04:55:10'),
(29, 'Pengemudi', '2025-08-06 04:55:12', '2025-08-06 04:55:12'),
(30, 'Chief Operation', '2025-08-06 04:55:13', '2025-08-06 04:55:13'),
(52, 'Pengemudi Direksi', '2025-08-06 06:40:23', '2025-08-06 06:40:23'),
(53, 'Pramubakti', '2025-08-06 06:40:24', '2025-08-06 06:40:24'),
(54, 'Site Manager Teknisi', '2025-08-06 06:40:30', '2025-08-06 06:40:30'),
(55, 'Teknisi', '2025-08-06 06:40:31', '2025-08-06 06:40:31'),
(56, 'Satuan Pengamanan', '2025-08-06 06:40:32', '2025-08-06 06:40:32'),
(57, 'Controller', '2025-08-06 06:40:39', '2025-08-06 06:40:39'),
(58, 'Ass. Chief Security', '2025-08-06 06:40:45', '2025-08-06 06:40:45'),
(59, 'Satpam', '2025-08-06 06:40:55', '2025-08-06 06:40:55'),
(60, 'Administrasi', '2025-08-06 06:41:26', '2025-08-06 06:41:26'),
(61, 'Administrasi Keuangan ', '2025-08-06 06:41:27', '2025-08-06 06:41:27'),
(62, 'Contact Center', '2025-08-06 06:41:29', '2025-08-06 06:41:29'),
(63, 'Central Monitoring Control', '2025-08-06 06:41:34', '2025-08-06 06:41:34'),
(64, 'Resepsionis', '2025-08-06 06:41:39', '2025-08-06 06:41:39'),
(66, 'staff', '2025-08-20 03:42:17', '2025-08-20 03:42:17'),
(67, 'Controller 1', '2025-08-22 09:07:53', '2025-08-22 09:07:53'),
(68, 'Controller 2', '2025-08-22 09:07:53', '2025-08-22 09:07:53'),
(69, 'Koordinator', '2025-08-22 09:07:54', '2025-08-22 09:07:54'),
(70, 'Leader Cleaning', '2025-08-22 09:07:54', '2025-08-22 09:07:54'),
(71, 'Pengemudi 1', '2025-08-22 09:07:54', '2025-08-22 09:07:54'),
(72, 'Pengemudi Direksi 1', '2025-08-22 09:07:55', '2025-08-22 09:07:55'),
(73, 'Pengemudi 2', '2025-08-22 09:07:55', '2025-08-22 09:07:55'),
(74, 'Pengemudi Direksi 2', '2025-08-22 09:07:55', '2025-08-22 09:07:55'),
(75, 'Pramubakti 1', '2025-08-22 09:07:56', '2025-08-22 09:07:56'),
(76, 'Team Leader 1', '2025-08-22 09:07:57', '2025-08-22 09:07:57'),
(77, 'Pramubakti 2', '2025-08-22 09:07:59', '2025-08-22 09:07:59'),
(78, 'Satuan Pengamanan 2', '2025-08-22 09:08:00', '2025-08-22 09:08:00'),
(79, 'Satuan Pengamanan 3', '2025-08-22 09:08:02', '2025-08-22 09:08:02'),
(80, 'Satuan Pengamanan 1', '2025-08-22 09:08:03', '2025-08-22 09:08:03'),
(81, 'Site Manager', '2025-08-22 09:08:03', '2025-08-22 09:08:03'),
(82, 'Chief Satpam', '2025-08-22 09:08:11', '2025-08-22 09:08:11'),
(83, 'Satpam Wanita', '2025-08-22 09:08:30', '2025-08-22 09:08:30'),
(84, 'Operator CMC', '2025-08-22 09:08:35', '2025-08-22 09:08:35'),
(85, 'Assistant BRI', '2025-08-22 09:08:41', '2025-08-22 09:08:41'),
(86, 'Petugas IT', '2025-08-22 09:08:42', '2025-08-22 09:08:42'),
(87, 'Administrasi 1', '2025-08-22 09:08:43', '2025-08-22 09:08:43'),
(88, 'Administrasi 2', '2025-08-22 09:08:43', '2025-08-22 09:08:43'),
(89, 'Satpam 1', '2025-08-22 09:08:45', '2025-08-22 09:08:45'),
(90, 'Satpam 3', '2025-08-22 09:08:45', '2025-08-22 09:08:45'),
(91, 'Satpam 2', '2025-08-22 09:08:46', '2025-08-22 09:08:46'),
(92, 'Office Boy', '2025-08-22 09:09:14', '2025-08-22 09:09:14'),
(93, 'SPV Briguna KPR', '2025-08-22 09:09:16', '2025-08-22 09:09:16'),
(94, 'Satpam Mobile', '2025-08-22 09:09:21', '2025-08-22 09:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `departemen_modul`
--

CREATE TABLE `departemen_modul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modul_id` bigint(20) UNSIGNED NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `departemen_modul`
--

INSERT INTO `departemen_modul` (`id`, `modul_id`, `departemen_id`, `created_at`, `updated_at`) VALUES
(7, 42, 60, NULL, NULL),
(8, 42, 61, NULL, NULL),
(9, 42, 64, NULL, NULL),
(10, 42, 86, NULL, NULL),
(11, 42, 87, NULL, NULL),
(12, 42, 88, NULL, NULL),
(14, 35, 56, NULL, NULL),
(15, 35, 59, NULL, NULL),
(16, 35, 78, NULL, NULL),
(17, 35, 79, NULL, NULL),
(18, 35, 80, NULL, NULL),
(19, 35, 82, NULL, NULL),
(20, 35, 83, NULL, NULL),
(21, 35, 89, NULL, NULL),
(22, 34, 53, NULL, NULL),
(23, 34, 70, NULL, NULL),
(24, 34, 75, NULL, NULL),
(25, 34, 77, NULL, NULL),
(26, 34, 92, NULL, NULL),
(27, 33, 29, NULL, NULL),
(28, 33, 52, NULL, NULL),
(29, 33, 71, NULL, NULL),
(30, 33, 72, NULL, NULL),
(31, 33, 73, NULL, NULL),
(32, 33, 74, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departemen_ujian`
--

CREATE TABLE `departemen_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `departemen_ujian`
--

INSERT INTO `departemen_ujian` (`id`, `ujian_id`, `departemen_id`, `created_at`, `updated_at`) VALUES
(17, 43, 29, NULL, NULL),
(18, 43, 71, NULL, NULL),
(19, 43, 73, NULL, NULL),
(20, 43, 52, NULL, NULL),
(21, 43, 72, NULL, NULL),
(22, 43, 74, NULL, NULL),
(23, 44, 30, NULL, NULL),
(24, 44, 82, NULL, NULL),
(25, 44, 57, NULL, NULL),
(26, 44, 67, NULL, NULL),
(27, 44, 68, NULL, NULL),
(28, 44, 84, NULL, NULL),
(29, 44, 59, NULL, NULL),
(30, 44, 89, NULL, NULL),
(31, 44, 91, NULL, NULL),
(32, 44, 90, NULL, NULL),
(33, 44, 94, NULL, NULL),
(34, 44, 83, NULL, NULL),
(35, 44, 56, NULL, NULL),
(36, 44, 80, NULL, NULL),
(37, 44, 78, NULL, NULL),
(38, 44, 79, NULL, NULL),
(39, 45, 70, NULL, NULL),
(40, 45, 92, NULL, NULL),
(41, 45, 53, NULL, NULL),
(42, 45, 75, NULL, NULL),
(43, 45, 77, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `skor` int(11) NOT NULL,
  `skor_maks` int(11) NOT NULL,
  `persentase` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_user`
--

CREATE TABLE `jawaban_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2025_08_21_135431_create_departemen_modul_table', 1),
(3, '2025_08_26_104232_create_departemen_ujian_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `moduls`
--

CREATE TABLE `moduls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `moduls`
--

INSERT INTO `moduls` (`id`, `judul`, `deskripsi`, `file_path`, `file_name`, `created_at`, `updated_at`) VALUES
(33, 'Modul Pengemudi PT BAS', NULL, 'modul/BPnil2m1VkCnOEKRiKnBPBgc5gvU88jvb4OXcaeh.pdf', 'Buku Saku Pengemudi BAS.pdf', '2025-08-12 09:07:53', '2025-08-12 09:07:53'),
(34, 'Modul Pramubakti PT BAS', NULL, 'modul/tc2m9rTjSpMHI237bp8TBFpceKAzgrn6O7BuHcHT.pdf', 'Buku Saku Pramubakti & Cleaning Service BAS.pdf', '2025-08-12 09:09:04', '2025-08-12 09:09:04'),
(35, 'Modul Satpam PT BAS', NULL, 'modul/ClqzCv7EnPhXXbxn2C8urwI3H1jh6R326do4Si1b.pdf', 'Buku Saku Satpam BAS.pdf', '2025-08-12 09:10:39', '2025-08-12 09:10:39'),
(42, 'Modul Petugas Administrasi PT BAS', NULL, 'modul/dfRWHNckaN7b4WSWmkCTlugzeJwRmrRgnIIMr759.pdf', 'Buku Saku Administrasi.pdf', '2025-08-27 06:35:29', '2025-08-27 06:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` text NOT NULL,
  `opsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `jawaban_benar` varchar(255) DEFAULT NULL,
  `poin` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `ujian_id`, `pertanyaan`, `opsi`, `jawaban_benar`, `poin`, `created_at`, `updated_at`) VALUES
(258, 43, 'Mengapa penting bagi pengemudi untuk bersikap sopan saat menghadapi keluhan penumpang?', '[\"Agar terlihat berwibawa\",\"Untuk menjaga citra baik perusahaan\",\"Agar tidak dimarahi atasan\",\"Supaya cepat selesai perjalanan\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(259, 43, 'Apa manfaat utama dari menjaga sikap positif selama bertugas?', '[\"Membuat penumpang takut\",\"Menjaga kenyamanan dan kepercayaan penumpang\",\"Agar cepat selesai kerja\",\"Supaya mendapat hadiah\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(260, 43, 'Bagaimana pengemudi menunjukkan integritas dalam bekerja?', '[\"Selalu mematuhi SOP dan bersikap jujur\",\"Menyelesaikan tugas secepat mungkin\",\"Meminta imbalan dari penumpang\",\"Menghindari tanggung jawab\"]', '0', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(261, 43, 'Mengapa penampilan rapi penting bagi pengemudi?', '[\"Untuk menarik perhatian\",\"Menunjukkan profesionalisme dan kebersihan\",\"Agar mudah dikenali\",\"Supaya mendapat promosi\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(262, 43, 'Pengemudi harus mengenakan seragam yang telah ditentukan, karena? ', '[\"Untuk menunjukkan kepribadian yang unik\",\"Untuk memastikan kenyamanan selama mengemudi\",\"Untuk mencerminkan profesionalisme dan SOP perusahaan\",\"Untuk menarik perhatian penumpang\"]', '3', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(263, 43, 'Apa fungsi utama dari penggunaan ID Card saat bertugas?', '[\"Identifikasi resmi dan menunjukkan status sebagai petugas\",\"Sebagai hiasan seragam\",\"Tanda pangkat\",\"Bukti untuk mendapat tip\"]', '0', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(264, 43, 'Bagaimana pengemudi menunjukkan penguasaan teknik berkendara yang baik?', '[\"Menyalip di tikungan\",\"Menggunakan klakson terus-menerus\",\"Menjaga kecepatan dan mematuhi rambu\",\"Mengemudi sambil telepon\"]', '2', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(265, 43, 'Kenapa pengemudi harus menguasai teknik pengereman yang tepat?', '[\"Agar terlihat jago\",\"Untuk membingungkan penumpang\",\"Supaya bisa berhenti tiba-tiba\",\"Untuk keselamatan dan menghindari kecelakaan\"]', '3', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(266, 43, 'Pentingnya kemampuan komunikasi bagi seorang pengemudi?', '[\"Untuk memastikan penumpang tahu tentang latar belakang pengemudi\",\"Menjawab dengan jutek ketika penumpang bertanya\",\"Menghindari percakapan tidak penting dengan penumpang\",\"Agar dapat menerima informasi perjalanan dengan jelas\"]', '3', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(267, 43, 'Apa yang harus dilakukan pengemudi jika mendapati ban kurang angin sebelum berangkat?', '[\"Membiarkannya saja\",\"Mengisi angin atau mengganti ban\",\"Menunda perjalanan\",\"Meminta penumpang untuk memperbaiki\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(268, 43, 'Apa sikap yang benar saat pengemudi menghadapi situasi jalan macet?', '[\"Membunyikan klakson terus\",\"Tetap sabar dan fokus\",\"Menyerobot jalur lain\",\"Mengajak penumpang berdiskusi panas\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(269, 43, 'Pemeriksaan rutin terhadap kondisi kendaraan sebelum perjalanan penting, karena? ', '[\"Dapat memperboros konsumsi bahan bakar\",\"Memperlama waktu agar penumpang tidak naik\",\"Untuk memastikan semua sistem kendaraan berfungsi dengan baik dan menghindari kecelakaan\",\"Memperlama waktu agar penumpang tidak naik\"]', '2', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(270, 43, 'Apa tanggung jawab pengemudi terkait waktu keberangkatan?', '[\"Berangkat seenaknya\",\"Menyesuaikan dengan kesiapan pribadi\",\"Tiba tepat waktu sesuai jadwal\",\"Menunggu perintah penumpang\"]', '2', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(271, 43, 'Mengapa pengemudi perlu memahami tujuan penumpang?', '[\"Supaya tidak bertanya-tanya\",\"Agar bisa merencanakan rute terbaik\",\"Untuk menghemat bahan bakar\",\"Agar bisa menunda perjalanan\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(272, 43, 'Untuk menjaga keamanan barang bawaan penumpang, pengemudi harus?', '[\"Membantu menata barang bawaan agar terletak dengan aman \",\"Membanting barang bawaan penumpang\",\"Cuek dan membiarkan penumpang merapikan barang sendiri\",\"Menyuruh penumpang membawa barang di pangkuan\"]', '0', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(273, 43, 'Apa yang harus dilakukan pengemudi saat menerima tugas perjalanan dari kantor?', '[\"Segera berangkat tanpa instruksi\",\"Bertanya ke penumpang\",\"Mengabaikan surat tugas\",\"Memastikan detail perjalanan lengkap dan jelas\"]', '3', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(274, 43, 'Apa yang harus dilakukan jika pengemudi bekerja lembur?', '[\"Mengisi formulir lembur dengan detail yang akurat dan mendapat persetujuan pejabat berwenang\",\"Baru mengisi formulir jika ditanya \",\"Tidak pernah mengisi formulir dengan detail\",\"Diam saja\"]', '0', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(275, 43, 'Bagaimana pelaporan bahan bakar yang benar?', '[\"Dikirim lewat pesan singkat\",\"Tidak perlu dilaporkan\",\"Disimpan pribadi\",\"Dicatat sesuai pemakaian dan dilaporkan ke admin\"]', '3', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(276, 43, 'Setelah melakukan pemeriksaan rutin terhadap kondisi kendaraan, yang harus pengemudi lakukan adalah?', '[\"Tidak membuat catatan\",\"Membuat laporan tentang kondisi kendaraan dan menyerahkannya kepada atasan atau petugas yang ditunjuk\",\"Tidak melaporkan apapun\",\"Mengabaikan kondisi kendaraan\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(277, 43, 'Apa pentingnya menghindari penggunaan HP saat berkendara?', '[\"Agar tidak boros baterai\",\"Untuk fokus pada musik\",\"Untuk keselamatan dan konsentrasi\",\"Supaya tidak terlihat sibuk\"]', '2', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(278, 43, 'Pengemudi tidak boleh mengemudi dengan perasaan marah atau agresif, karena?', '[\"Membuat perjalanan lebih aman dan nyaman\",\"Dapat mengurangi kemampuan dalam membuat keputusan yang tepat dan mengarah pada perilaku dapat berisiko di jalan\",\"Macet diperjalanan\",\"Cepat sampai\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(279, 43, 'Apa yang termasuk dalam manuver yang berbahaya atau tidak aman?', '[\"Menyalip di tempat yang aman\",\"Mengemudi dengan kecepatan rendah\",\"Memotong jalur dengan tiba-tiba\",\"Mengemudi di jalur yang benar\"]', '2', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(280, 43, 'Apa yang sebaiknya dihindari agar tidak mengganggu penglihatan saat berkendara?', '[\"Barang di dashboard yang menumpuk\",\"Kaca spion bersih\",\"Lampu dalam kondisi baik\",\"Posisi duduk ideal\"]', '0', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(281, 43, 'Penting bagi pengemudi untuk tidak melampaui batas kecepatan yang ditetapkan, karena? ', '[\"Menghemat bahan bakar\",\"Menunjukkan keberanian di jalan\",\"Lebih membuat adrenalin terpacu\",\"Untuk mengurangi risiko kecelakaan dan menjaga keselamatan penumpang\"]', '3', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(282, 43, 'Pengemudi dilarang mengemudi di bawah pengaruh alkohol atau obat-obatan terlarang, karena?', '[\"Dapat meningkatkan kehati-hatian pengemudi\",\"Dapat mengganggu konsentrasi dan meningkatkan risiko kecelakaan\",\"Agar perjalanan terasa lebih menyenangkan\",\"Sampai lebih cepat\"]', '1', 4, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(283, 44, 'Apa yang dimaksud dengan fungsi utama seorang satpam?', '[\"Melindungi dan mengayomi pekerja di tempat kerja dan lingkungan sekitarnya\",\"Melakukan tugas-tugas pengaturan dan penjagaan\",\"Menyelenggarakan keamanan teknis di tempat kerja\",\"Menangani keadaan darurat di tempat kerja\"]', '0', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(284, 44, 'Apa yang termasuk dalam kegiatan yang dilakukan oleh seorang satpam sesuai dengan fungsi mereka?', '[\"Hanya tugas pengaturan dan penjagaan\",\"Hanya tugas patroli dan perondaan\",\"Tugas pengaturan, penjagaan, patroli, perondaan, dan penanganan keadaan darurat\",\"Hanya tugas penanganan keadaan darurat\"]', '2', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(285, 44, 'Apa yang menjadi syarat utama dalam pemilihan sepatu bagi seorang satpam', '[\"Sepatu harus berwarna hitam polos\",\"Sepatu harus bermodel slip on\",\"Sepatu tidak perlu disemir\",\"Sepatu memiliki aksesori tambahan\"]', '0', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(286, 44, 'Dalam \"SERVICE VALUE SATPAM PT BAS,\" komitmen untuk \"Siap dalam bertugas\" mencerminkan:', '[\"Keterampilan berbicara yang baik\",\"Kepatuhan terhadap peraturan perusahaan\",\"Kesiapan fisik dan mental dalam melaksanakan tugas\",\"Pemahaman produk layanan perusahaan\"]', '2', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(287, 44, 'Mengapa penting bagi satpam memahami titik kumpul evakuasi?', '[\"Untuk memberikan pengarahan saat simulasi atau keadaan darurat\",\"Untuk mempercepat patroli\",\"Agar dapat ditunjukkan kepada tamu\",\"Untuk memantau kamera CCTV\"]', '0', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(288, 44, 'Salah satu aspek yang harus diperhatikan oleh seorang satpam sesuai dengan \"SERVICE VALUE SATPAM PT BAS\" adalah', '[\"Menjaga perilaku saat berbicara hanya dengan atasan\",\"Memahami dan mengikuti perkembangan produk ataupun prosedur layanan Perusahaan (User)\",\"perlu memiliki disiplin dalam melaksanakan tugas\",\"Mengabaikan waktu yang telah ditetapkan untuk tugas-tugas rutin\"]', '1', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(289, 44, 'Apa tujuan utama kegiatan patroli oleh satpam?', '[\"Menemani rekan satpam\",\"Memastikan keamanan area dan mencegah gangguan\",\"Menunjukkan kehadiran fisik\",\"Menghitung kendaraan\"]', '1', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(290, 44, 'Apa yang dimaksud dengan \'navigator\' dalam tugas satpam?', '[\"Satpam yang membawa peta\",\"Satpam yang memberi arahan dan rasa aman kepada tamu\",\"Satpam yang menjaga pintu keluar\",\"Satpam yang menyimpan dokumen\"]', '1', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(291, 44, 'Apa arti dari 5S dalam budaya kerja satpam?', '[\"Siaga, Sigap, Sopan, Satu, Santai\",\"Senyum, Salam, Sapa, Sopan, Santun\",\"Sadar, Sapa, Santun, Sopan, Semangat\",\"Sapa, Salam, Siap, Sopan, Santun\"]', '1', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(292, 44, 'Mengapa satpam tidak diperbolehkan membawa orang lain selama bertugas?', '[\"Karena satpam tidak boleh memiliki teman selama bekerja\",\"Karena satpam tidak menjaga perusahaan\",\"Karena satpam tidak boleh memiliki kehidupan sosial di luar jam kerja\",\"Karena satpam harus selalu berfokus pada tugasnya tanpa terganggu oleh orang lain\"]', '3', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(293, 44, 'Apa tindakan satpam jika menemukan kabel terbuka yang berbahaya?', '[\"Menghindar\",\"Menutupi dengan karpet\",\"Melapor ke teknisi atau atasan\",\"Membetulkan sendiri\"]', '2', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(294, 44, 'Apa tujuan utama pemeriksaan kendaraan di gerbang masuk oleh satpam?', '[\"Mengetahui identitas pemilik\",\"Mengarahkan parkir kendaraan\",\"Menghitung jumlah kendaraan\",\"Memastikan tidak ada barang berbahaya\"]', '3', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(295, 44, 'Apa sikap satpam saat menghadapi keluhan dari tamu?', '[\"Menjawab dengan sopan dan memberi solusi\",\"Mengabaikan\",\"Menyerahkan ke rekan lain\",\"Marah\"]', '0', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(296, 44, 'Apa yang termasuk dalam larangan jabatan seorang satpam?', '[\"Membantu petugas kebersihan menjaga area kantor\",\"Menggunakan fasilitas kantor untuk kepentingan pribadi\",\"Melaporkan kejadian keamanan kepada atasan\",\"Memberikan arahan kepada tamu perusahaan\"]', '1', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(297, 44, 'Menurut peraturan, seorang satpam pria hanya diperbolehkan menggunakan dua titik aksesoris yang mencakup jam tangan dan cincin nikah. Apa yang diharapkan dalam penggunaan cincin nikah menurut peraturan tersebut?', '[\"Cincin nikah harus berukuran besar dan mencolok\",\"Cincin nikah harus berwarna-warni\",\"Cincin nikah harus sesuai dengan selera pribadi\",\"Cincin nikah tidak boleh terlalu besar dan mencolok\"]', '3', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(298, 44, 'Apa yang menjadi perbedaan antara pakaian dinas harian (PDH) dan pakaian dinas lapangan (PDL)?', '[\"Warna kemeja dan panjang lengan\",\"Panjang celana\",\"Warna celana\",\"Warna kemeja dan lengan\"]', '0', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(299, 44, 'Salah satu larangan yang diberlakukan bagi seorang satpam adalah \"Tidak Produktif.\" Apa yang dimaksud dengan larangan ini?', '[\"Tidak boleh melakukan tugas keamanan di luar Banking Hall\",\"Tidak boleh mengejar produktivitas dalam pekerjaan sehari-hari\",\"Tidak boleh melakukan aktivitas yang tidak ada hubungannya dengan tugas satpam\",\"Tidak boleh melakukan aktivitas apa pun selama jam kerja\"]', '2', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(300, 44, 'Dalam pelaksanaan patroli, petugas patroli harus mengetahui dan memahami situasi serta keadaan unit kerja area parkir. Apa yang dapat diidentifikasi melalui pemahaman ini?', '[\"Waktu kontrol patroli yang optimal\",\"Sumber-sumber bahaya yang dapat mengganggu keamanan dan ketertiban\",\"Rute patroli yang paling efisien\",\"Lokasi APAR \\/ Hydrant yang tepat\"]', '1', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(301, 44, 'Apa yang menjadi salah satu kewajiban satpam perbankan saat melaksanakan tugasnya?', '[\"Membantu proses audit internal bank tanpa koordinasi\",\"Memberikan pelayanan keuangan langsung kepada nasabah\",\"Membantu proses audit internal bank tanpa koordinasi\",\"Menyelesaikan pertanyaan nasabah dengan benar, tegas, dan santun\"]', '3', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(302, 44, 'Apa yang wajib dilakukan seorang satpam sebelum melaksanakan tugas?', '[\"Menunggu perintah langsung dari user\",\"Melakukan absensi hanya jika diingatkan\",\"Mengisi buku hadir atau absen melalui aplikasi G-STS dan melakukan serah terima tugas\",\"Langsung patroli ke area kerja tanpa serah terima\"]', '2', 5, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(323, 45, 'Salah satu sikap kerja yang wajib ditunjukkan oleh pramubakti adalah', '\"[\\\"Bersikap cuek terhadap tamu\\\",\\\"Menghindari kontak mata\\\",\\\"Memberikan salam, senyum, dan sapa\\\",\\\"Hanya menjawab bila ditanya\\\"]\"', '2', 5, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(324, 45, 'Apa pengertian \"General Cleaning/Periodik\"?', '\"[\\\"General Cleaning adalah pekerjaan harian\\\",\\\"General Cleaning hanya dilakukan pada area kerja tertentu\\\",\\\"General Cleaning adalah pekerjaan rutin\\\",\\\"General Cleaning adalah pekerjaan yang dilakukan mingguan, bulanan, atau sesuai dengan jadwal yang ditentukan\\\"]\"', '3', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(325, 45, 'Apa yang harus dilakukan setelah selesai pekerjaan pembersihan?', '\"[\\\"Langsung pulang\\\",\\\"Memastikan area bersih dan peralatan dicuci serta disimpan kembali\\\",\\\"Meninggalkan area tanpa pengecekan\\\",\\\"Menunggu supervisor memeriksa\\\"]\"', '1', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(326, 45, 'Salah satu alat yang digunakan untuk membersihkan kaca adalah', '\"[\\\"Window squeegee\\\",\\\"Toilet brush\\\",\\\"Lobby duster\\\",\\\"Nylon broom\\\"]\"', '0', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(327, 45, 'Apa yang harus dilakukan jika menemukan tumpahan cairan di lantai umum?', '\"[\\\"Menunggu supervisor datang\\\",\\\"Membersihkan segera dan beri tanda peringatan\\\",\\\"Membiarkan sampai petugas lain yang bersihkan\\\",\\\"Laporkan ke bagian keamanan\\\"]\"', '1', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(328, 45, 'Tujuan menggunakan floor sign saat pembersihan lantai adalah', '\"[\\\"Sebagai dekorasi tambahan\\\",\\\"Memberi tahu supervisor bahwa petugas bekerja\\\",\\\"Memberi peringatan agar orang berhati-hati\\\",\\\"Untuk menutup area kerja\\\"]\"', '2', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(329, 45, 'Tujuan utama cleaning service menggunakan SOP adalah', '\"[\\\"Agar bisa bekerja sesuka hati\\\",\\\"Memastikan pekerjaan dilakukan aman, efektif, dan efisien\\\",\\\"Untuk membatasi jam kerja\\\",\\\"Agar bisa istirahat lebih lama\\\"]\"', '1', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(330, 45, 'Alat pelindung diri yang wajib digunakan saat menggunakan bahan kimia adalah', '\"[\\\"Sepatu olahraga\\\",\\\"Kacamata hitam\\\",\\\"Topi proyek\\\",\\\"Sarung tangan dan masker\\\"]\"', '3', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(331, 45, 'Sikap kerja yang harus ditunjukkan saat bertugas adalah', '\"[\\\"Malas-malasan jika tidak diawasi\\\",\\\"Bekerja sambil bermain ponsel\\\",\\\"Tanggung jawab, disiplin, dan inisiatif\\\",\\\"Banyak berbicara dengan rekan kerja\\\"]\"', '2', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(332, 45, 'Mengapa petugas wajib melakukan briefing sebelum mulai bekerja?', '\"[\\\"Supaya bisa bertemu teman\\\",\\\"Untuk evaluasi dan penyamaan tugas kerja\\\",\\\"Untuk mendapatkan makan pagi\\\",\\\"Agar bisa datang terlambat\\\"]\"', '1', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(333, 45, 'Apa yang menjadi sasaran mutu dari toilet cleaning?', '\"[\\\"Toilet bersih, kering, harum, dan higienis\\\",\\\"Toilet hanya tampak bersih\\\",\\\"Toilet tidak digunakan\\\",\\\"Toilet basah dan beraroma\\\"]\"', '0', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(334, 45, 'Tujuan dari mopping lantai adalah', '\"[\\\"Mengkilapkan jendela\\\",\\\"Membersihkan debu dari plafon\\\",\\\"Menghilangkan kotoran dan noda dari lantai\\\",\\\"Membersihkan dinding\\\"]\"', '2', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(335, 45, 'Apa tujuan dari standar penampilan petugas cleaning service dan pramubakti?', '\"[\\\"Agar terlihat lebih tinggi\\\",\\\"Untuk menjaga citra diri positif dan profesional\\\",\\\"Supaya tidak dikenali\\\",\\\"Untuk tampil mencolok di area kerja\\\"]\"', '1', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(336, 45, 'Apa pengertian \"Daily Maintenance/Rutin\"?', '\"[\\\"Daily Maintenance adalah pekerjaan periodik\\\",\\\"Daily Maintenance mencakup pekerjaan rutin mingguan\\\",\\\"Daily Maintenance adalah pekerjaan periodik\\\",\\\"Daily Maintenance adalah pekerjaan harian\\\"]\"', '3', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(337, 45, 'Tugas apa yang bukan dilakukan di pagi hari sebelum jam operasional kantor?', '\"[\\\"Menghidupkan lampu listrik dan AC\\\",\\\"Menyediakan minuman bagi para pegawai\\\",\\\"Mengirim surat\\\",\\\"Membersihkan area kerja\\\"]\"', '2', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(338, 45, 'Yang merupakan bagian dari General Cleaning/Periodik adalah?', '\"[\\\"Vacuuming\\\\\\/Penyedotan Debu Lantai Karpet\\\",\\\"Sweeping\\\\\\/Penyapuan\\\",\\\"Mopping\\\\\\/Pengepelan\\\",\\\"Pencucian Perabot\\\\\\/Alat Makan (Utensils)\\\"]\"', '0', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(339, 45, 'Yang bukan merupakan petunjuk Kesehatan dan Keselamatan Kerja (K3) dalam proses Toilet Cleaning/Pembersihan Toilet adalah', '\"[\\\"Harus menggunakan sarung tangan karet\\\",\\\"Pembersihan dilakukan sudut terjauh menuju pintu keluar\\\",\\\"Jangan membuat goresan\\\\\\/kerusakan objek yang dibersihkan\\\",\\\"Membiarkan area basah dan tidak memasang warning sign\\\"]\"', '3', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(340, 45, 'Yang bukan merupakan alat kebersihan dan penunjang kebersihan?', '\"[\\\"Window Squeegee\\\\\\/Stik karet pembersih jendela\\\",\\\"Small Brush\\\\\\/Sikat Kecil\\\",\\\"Meja dan Kursi Kerja\\\",\\\"Rubber Gloves\\\\\\/Sarung Tangan Karet\\\"]\"', '2', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(341, 45, 'Yang bukan merupakan pola Glass Cleaning/Pembersihan Kaca?', '\"[\\\"Pola gerakan angka 1 berfungsi pada kaca berukuran kecil\\\",\\\"Pola gerakan angka 7 berfungsi pada kaca berukuran sedang\\\",\\\"Pola gerakan angka 9 berfungsi pada kaca berukuran besar\\\",\\\"Pola gerakan angka 8 berfungsi pada kaca berukuran besar\\\"]\"', '2', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40'),
(342, 45, 'Alat Kesehatan dan Keselamatan Kerja (K3) yang wajib ada?', '\"[\\\"Mesin Vacuum Wet dan Dry Cleaner\\\",\\\"Mesin Floor Polisher\\\",\\\"Mopping Stick\\\\\\/Tongkat Pel\\\",\\\"Warning sign\\\\\\/Tanda peringatan\\\"]\"', '3', 1, '2025-08-31 21:26:40', '2025-08-31 21:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `batas_waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `durasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `judul`, `deskripsi`, `batas_waktu`, `durasi`, `created_at`, `updated_at`) VALUES
(43, 'Ujian Pengemudi', NULL, '2025-09-30 05:00:00', 60, '2025-08-28 09:28:45', '2025-08-28 09:28:45'),
(44, 'Ujian Satpam', NULL, '2025-09-30 05:00:00', 60, '2025-08-28 09:30:50', '2025-08-28 09:30:50'),
(45, 'Ujian Pramubakti', NULL, '2025-09-30 05:00:00', 60, '2025-08-28 09:31:50', '2025-08-31 21:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `departemen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_kerja` varchar(70) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `departemen_id`, `unit_kerja`, `profile_photo_path`) VALUES
(1, 'Admin Utama', 'admin@example.com', '$2y$12$4oEjHh.5AvniswRcNlRV5uHPyTx.rPQ1n68aDVzONJalkylyEaTMi', 'admin', '2025-06-04 10:01:52', '2025-08-20 09:18:21', NULL, '', 'profile-photos/T7RchiN0gFHFQvmQ2bAs90Ih9Eripa7j2NkP0az4.png'),
(2, 'User IT 1', 'user1@example.com', '$2y$12$CKa1Xr07DzjkOHytJYIV1.iWKxhIAZj.uRsA/ak9Rxjbr1mhfzVhu', 'user', '2025-06-04 10:01:53', '2025-08-26 06:35:23', 1, '', 'profile-photos/eCY5fZZhmkG9jMixov8OdGQnIuX8DDPbrMfRhAbh.png'),
(3, 'User IT 2', 'user2@example.com', '$2y$12$iBCB8DBjOCNI8qCPs42Cr.cAdFCEByrHUKVZasDqgWXN/e6gA6MQe', 'user', '2025-06-04 10:01:53', '2025-06-04 10:01:53', 1, '', ''),
(4, 'User HRD 2', 'user3@example.com', '$2y$12$4KXYIyHd6tUO9kngK4OQMOyhtPgDMgq6GHoKIGuV1HnTsKMVNQ1US', 'user', '2025-06-04 10:01:54', '2025-08-28 07:50:07', 2, '', 'profile-photos/sxUyZQmnBCDEOpP7ozDLK12B0uqndMCHGrdB9pda.png'),
(5, 'User HRD 2', 'user4@example.com', '$2y$12$jlHcZ6W98GEgk.aBSiYPCeNUVOGAjogRd25MZkDSV.vgq1t8Me/2O', 'user', '2025-06-04 10:01:54', '2025-06-04 10:01:54', 2, '', ''),
(877, 'Erick Ade', '1122001', '$2y$12$A0k2MFu/5lgs2Sy9u893rOPXYqwK47nC7eXneDMxeUWlvNJc/weCW', 'user', '2025-08-20 03:42:18', '2025-08-21 01:32:15', 66, 'Pramudi', 'profile-photos/MnSKC2nEH2v8GPxOb1bgeX7EEybUI6EIXUSCnk1U.jpg'),
(878, 'udin 1', '20250001', '$2y$12$Ray8XIIIafX7i2vbW8JOeujxdJ3yvord4vpX0TTTWpCm.Hdm1PkgS', 'user', '2025-08-21 09:20:48', '2025-08-21 09:20:48', 28, 'Bank Rakyat Indonesia', NULL),
(879, 'udin 2', '20250002', '$2y$12$4A/QF4xcs5QBKjlEcNhvte5AQUb1/TfCOcJlV.m8VixP/XM8erfw.', 'user', '2025-08-21 09:20:48', '2025-08-21 09:20:48', 28, 'Bank Rakyat Indonesia', NULL),
(880, 'udin 3', '20250003', '$2y$12$S.BT1A3rAgnuqjgZw6PLEOkgVslicG.Th0a89uTjH5KcYbQ0BnysK', 'user', '2025-08-21 09:20:48', '2025-08-21 09:20:48', 28, 'Bank Rakyat Indonesia', NULL),
(881, 'udin 4', '20250004', '$2y$12$brdIy92wWMngWi8fjFtGfORn.bIv.WSOo7rf25hf/at5MTnuCuoDC', 'user', '2025-08-21 09:20:48', '2025-08-21 09:20:48', 28, 'Bank Rakyat Indonesia', NULL),
(882, 'udin 5', '20250005', '$2y$12$eTsnQRO7CrmO3gh8qn6Mberf1cAAvAhX9W7VEBqt6b/dkXzqY4oiO', 'user', '2025-08-21 09:20:49', '2025-08-21 09:20:49', 29, 'Koperasi Pamandiri', NULL),
(883, 'Irwansyah', '80002000002', '$2y$12$97MvnW25114uctOBwb0UoelKuqUiwtrBJYku6OnT4bgCPEYCbkoPa', 'user', '2025-08-22 09:07:51', '2025-08-22 09:07:51', 29, 'Kantor Pusat BRI', NULL),
(884, 'Adi Eko Apriyana', '80003000002', '$2y$12$jMNmjEskgKvgdUWajVlfF.eHZr.lRY6mTzc3O9DaM2g5SgshpRFua', 'user', '2025-08-22 09:07:51', '2025-08-22 09:07:51', 57, 'Kantor Pusat', NULL),
(885, 'Amri Maulana', '80003000003', '$2y$12$7wB4TgQH0ClibnNEVw02Cuswq5FH5VvKIvPk9feTfeHuRwlQ/pc02', 'user', '2025-08-22 09:07:51', '2025-08-22 09:07:51', 57, 'Kantor Pusat', NULL),
(886, 'Joko Surono Krestiyantoro', '80003000004', '$2y$12$FMarQoJeDXSJ4CBH1FV9d.2t7rVywMaq6P0xA8Oh7/yJJp2vV3Xce', 'user', '2025-08-22 09:07:52', '2025-08-22 09:07:52', 57, 'Kantor Pusat', NULL),
(887, 'Mulyana', '80003000005', '$2y$12$8PYf628FuyLH30bPat5ZUeS/1/ye7b7aj9sQO7aB31SncfGKA0yXy', 'user', '2025-08-22 09:07:52', '2025-08-22 09:07:52', 57, 'Kantor Pusat', NULL),
(888, 'Reno Agestin', '80003000006', '$2y$12$1pOvwYSb32q21Geo2oliUOvNpDK4otAPcQewbNwoUXSkqxJb3qzx6', 'user', '2025-08-22 09:07:52', '2025-08-22 09:07:52', 57, 'Kantor Pusat', NULL),
(889, 'Suwinarno', '80003000007', '$2y$12$UxxMqSxErEAfat2cK7yvq.JZz7pdr8Mf0mrYTYyqFbpmpNh4dQeZu', 'user', '2025-08-22 09:07:53', '2025-08-22 09:07:53', 57, 'Kantor Pusat', NULL),
(890, 'Dede Kurnia', '80003000008', '$2y$12$JfTAKH8blfh5q6pUI2RGZ.orh24Kv5YsInoqHS/u36NMU/PMmF2Bq', 'user', '2025-08-22 09:07:53', '2025-08-22 09:07:53', 67, 'Kantor Pusat', NULL),
(891, 'Ali Imran', '80003000009', '$2y$12$ey7Db8Ca7JsG6kZvQPEJH.Czv3SSV8evmjq60ecaHIM7a3Xxr77dW', 'user', '2025-08-22 09:07:53', '2025-08-22 09:07:53', 68, 'Kantor Pusat', NULL),
(892, 'Holani', '80003000010', '$2y$12$TjM7xlQRFr2ZQYwANM2C6euQdKf3WJFpGbuHRy/MExIVwnS4DctVe', 'user', '2025-08-22 09:07:54', '2025-08-22 09:07:54', 68, 'Kantor Pusat', NULL),
(893, 'Mulyanto', '80003000011', '$2y$12$eEuXquJyQLSRm0fC7hhKzug8xB0pQ5jGn6qs3or3UoX0csxmXBGVu', 'user', '2025-08-22 09:07:54', '2025-08-22 09:07:54', 69, 'Kantor Pusat', NULL),
(894, 'Sukarno', '80003000012', '$2y$12$t13DUWbNprRm.m9sJFI10.AVFdqjyNb4LS/GyobTK5/ZZv0U0Ecda', 'user', '2025-08-22 09:07:54', '2025-08-22 09:07:54', 70, 'Kantor Pusat', NULL),
(895, 'Wisnu Nardi', '80003000014', '$2y$12$41mhYB2tmEQ9QZT1Qdb0M.RGD15llCt3gGulOIFd7gUSZ37YsxziO', 'user', '2025-08-22 09:07:55', '2025-08-22 09:07:55', 71, 'Kantor Pusat', NULL),
(896, 'Agus Romli', '80003000015', '$2y$12$ihOvrh.RmJsN6ulfIq8zUucZL72rapE3sQi570voXAErtdlu41u4K', 'user', '2025-08-22 09:07:55', '2025-08-22 09:07:55', 52, 'Kantor Pusat', NULL),
(897, 'Mulyono', '80003000016', '$2y$12$h4piEnQNGZ/MWl7pV5CF8eoQdQDSQPTes3khINWiWUZxxZXRQqq..', 'user', '2025-08-22 09:07:55', '2025-08-22 09:07:55', 72, 'Kantor Pusat', NULL),
(898, 'Priyo Puji Santoso', '80003000017', '$2y$12$4b8sN1BHFYxtZJtPzoyoJ.MBYVayNgwlljLdBeZh2N4PkQrcxWm9i', 'user', '2025-08-22 09:07:55', '2025-08-22 09:07:55', 73, 'PKSS Jakarta 2', NULL),
(899, 'Tommi', '80003000018', '$2y$12$t7qS4U4a7m2HLumo6WII9ukm9ppCs5YkkGzP.Y9vFnV7Tn88VKjJ.', 'user', '2025-08-22 09:07:56', '2025-08-22 09:07:56', 74, 'Kantor Pusat', NULL),
(900, 'Pipin Nuryanto', '80003000019', '$2y$12$8VKcMUXrf8ao9d88vqkfYueSdjSWWpxzFqht5.8HKPEsY9H5mbNMa', 'user', '2025-08-22 09:07:56', '2025-08-22 09:07:56', 29, 'PKSS Yogyakarta', NULL),
(901, 'Ashtri Puspita Rini', '80003000020', '$2y$12$UlgDbpBujt.ybwqEcMcoGeaSqeoFezgnI8U4lV3zLBiDT5uIf7LBG', 'user', '2025-08-22 09:07:56', '2025-08-22 09:07:56', 75, 'Kantor Pusat', NULL),
(902, 'Doni Anggara', '80003000022', '$2y$12$3RZvGusFlYfdbCpmdvg1LeUyY3za5x6EPZTDn16NwCMusuQO5IRhC', 'user', '2025-08-22 09:07:57', '2025-08-22 09:07:57', 75, 'Kantor Pusat', NULL),
(903, 'Eka Firmandana', '80003000023', '$2y$12$r.0LwvTpmckYtDz.Sh6MVuki4bjGAo1rblNZPzHIaGr32bv52f7mi', 'user', '2025-08-22 09:07:57', '2025-08-22 09:07:57', 75, 'Kantor Pusat', NULL),
(904, 'Erwin Yovitra', '80003000024', '$2y$12$zViCF6r.dSBHjOA0wQS7K.meKahxq5XE2980MJHmRTOPDa1DVG0va', 'user', '2025-08-22 09:07:57', '2025-08-22 09:07:57', 75, 'Kantor Pusat', NULL),
(905, 'Gustian Harisyah', '80003000025', '$2y$12$2ZTsggw2RmT9fAFyv48EEe9vsqCEUE0PDe7lSKocEJQHlA5/Hms5y', 'user', '2025-08-22 09:07:58', '2025-08-22 09:07:58', 76, 'Kantor Pusat', NULL),
(906, 'Husrin', '80003000026', '$2y$12$71IjPRBN/2ObI9YvYMS/s.9ZCb1REPGjgKaVqxDK9E/h0JxMUorRu', 'user', '2025-08-22 09:07:58', '2025-08-22 09:07:58', 75, 'Kantor Pusat', NULL),
(907, 'Noval Kurniawan', '80003000029', '$2y$12$pJM1Bp.npKcqDBfllEB7tupL0nuqicIfEfOy2WVlJTSSc3d60ThGW', 'user', '2025-08-22 09:07:58', '2025-08-22 09:07:58', 75, 'Kantor Pusat', NULL),
(908, 'Supriadi', '80003000030', '$2y$12$yolf8KFGmSd458rSUHLWA.8t.3Y0A0k4OhAqYoBn9/7.wmEhbQEJa', 'user', '2025-08-22 09:07:59', '2025-08-22 09:07:59', 75, 'Kantor Pusat', NULL),
(909, 'Syahroni', '80003000031', '$2y$12$b7/546CdML.VuenIY76D8OgPWoczndMOPBvAqK5E1Rvvlt4ZRSJP6', 'user', '2025-08-22 09:07:59', '2025-08-22 09:07:59', 75, 'Kantor Pusat', NULL),
(910, 'Wahyu Giono', '80003000032', '$2y$12$9hn/C35E9grZA37toEo0iOEcjoKZEV1r5rQMc8LnFTX.BtslX.GoS', 'user', '2025-08-22 09:07:59', '2025-08-22 09:07:59', 75, 'Kantor Pusat', NULL),
(911, 'Agus Mansyur', '80003000033', '$2y$12$vb.8/eybYcRCmVgL7L5Tc.0PPhU3I4aro2aDgXFHyD1r9USwIWE7u', 'user', '2025-08-22 09:07:59', '2025-08-22 09:07:59', 77, 'Kantor Pusat', NULL),
(912, 'Nabila Yasmine Firmansyah', '80003000035', '$2y$12$4EN0bvH9x56cOi9VgIappO50iapZMXBo8H8wcg.8l49K7UQFxPODa', 'user', '2025-08-22 09:08:00', '2025-08-22 09:08:00', 64, 'Kantor Pusat', NULL),
(913, 'Adi Laksono', '80003000036', '$2y$12$A8iGtjJLIE3E5xB7voV2HOsrj7lyOVBgyeBd35dR7fPxXxDKVkRfK', 'user', '2025-08-22 09:08:00', '2025-08-22 09:08:00', 78, 'Kantor Pusat', NULL),
(914, 'Agus Paryoto', '80003000037', '$2y$12$Ypm/Natij1DvfoNoQx9JDOTu32oTYBZ/PlS/io6nt9j1tPERKG032', 'user', '2025-08-22 09:08:00', '2025-08-22 09:08:00', 78, 'Kantor Pusat', NULL),
(915, 'Ilham Effendi', '80003000038', '$2y$12$9b1CKuisiVXG/Q8cGsKKf.HHe5mH01.p5u50D/AUzX4ouEK6mlvBW', 'user', '2025-08-22 09:08:01', '2025-08-22 09:08:01', 78, 'Kantor Pusat', NULL),
(916, 'Joko Prasetiyo', '80003000039', '$2y$12$DISDOESSO5d0s3.8PTskX.jSGJB0EazGDN9OBrfWTd6WNhN.1hC0m', 'user', '2025-08-22 09:08:01', '2025-08-22 09:08:01', 78, 'Kantor Pusat', NULL),
(917, 'Mansyur', '80003000040', '$2y$12$0mO01Ezf8DRiOV1BBzkCuun.WFMD6OCnKw3pFNAa3UeDsCAkRWzIS', 'user', '2025-08-22 09:08:01', '2025-08-22 09:08:01', 78, 'Kantor Pusat', NULL),
(918, 'Muhammad Fadrian', '80003000041', '$2y$12$9Q7ngVdrJv3ixjVNVC./1eo/0f3vTXu4Yrdw24wwXrLQ5/I.Nx8Me', 'user', '2025-08-22 09:08:02', '2025-08-22 09:08:02', 78, 'Kantor Pusat', NULL),
(919, 'Muhazir', '80003000042', '$2y$12$JZirV7QLtbSDyueE8X3zxOFss7Xe8I4i/fSzzZkOKykmSb3vMQ0Iu', 'user', '2025-08-22 09:08:02', '2025-08-22 09:08:02', 79, 'Kantor Pusat', NULL),
(920, 'Nurabidin', '80003000043', '$2y$12$n5HEXrLRd2fhdubY2aA7lejHdR89vc421ggUyvk0gwkh5c1onowFO', 'user', '2025-08-22 09:08:02', '2025-08-22 09:08:02', 78, 'Kantor Pusat', NULL),
(921, 'Rizwan', '80003000044', '$2y$12$ctTFz1A2WUi0gAYuEgrcw.WlUqeDZ6vffgp6ff9mVf1WNR04.vmUu', 'user', '2025-08-22 09:08:03', '2025-08-22 09:08:03', 78, 'Kantor Pusat', NULL),
(922, 'Susanto', '80003000045', '$2y$12$tPUA9zJdzq9aBzFWHkk8Qu1Q.tMgHgp/OsLRQhQBocXIccL6jakYm', 'user', '2025-08-22 09:08:03', '2025-08-22 09:08:03', 78, 'Kantor Pusat', NULL),
(923, 'Herdiansyah', '80003000046', '$2y$12$CEOvuHuuTFjk51kaAabPW.M81KhQt5iY8zfDjgU8RD63/jYyG8IZ2', 'user', '2025-08-22 09:08:03', '2025-08-22 09:08:03', 80, 'Kantor Pusat', NULL),
(924, 'Agus Joko Waluyo', '80003000048', '$2y$12$1TjKdPmo9kkhoIx/OT6kVuvS3Y3.fn4I2uPJJbsKkO3Czfh/cwl9.', 'user', '2025-08-22 09:08:03', '2025-08-22 09:08:03', 81, 'Kantor Pusat', NULL),
(925, 'Irwan Saputra', '80003000049', '$2y$12$fnA7jAmZnOr5y6hAZXLSYeSAmgs0T7Xn/ybZC/huP2YKpR7voMoOi', 'user', '2025-08-22 09:08:04', '2025-08-22 09:08:04', 55, 'Kantor Pusat', NULL),
(926, 'Tri Setiawan', '80003000051', '$2y$12$bInoDAd.rZIaDCzkUsd7I.DiZ6Vs/msSWzkEfmZvkxcDQNrKV2amq', 'user', '2025-08-22 09:08:04', '2025-08-22 09:08:04', 55, 'Kantor Pusat', NULL),
(927, 'Nurul Akbar', '80003000052', '$2y$12$77cLH7LcFiO8hM06SrSx5OJDxL8QSHXmfLey0fEMYsuyuM7envCsK', 'user', '2025-08-22 09:08:04', '2025-08-22 09:08:04', 56, 'PKSS Aceh', NULL),
(928, 'Zulfahmi', '80003000053', '$2y$12$hHTIRZJ1.NJGvGt83QemouN21rl.NPTiTq/cZXQ0LUWg1ejLkKyO6', 'user', '2025-08-22 09:08:05', '2025-08-22 09:08:05', 29, 'PKSS Aceh', NULL),
(929, 'Mardianah', '80003000055', '$2y$12$OwM82F/jz8Rri/uGnKpAxenveKVDb1uwn0dGXfd1CQ4mxG8x3490.', 'user', '2025-08-22 09:08:05', '2025-08-22 09:08:05', 53, 'PKSS Balikpapan', NULL),
(930, 'Widodo Nurkholiq Biantoro', '80003000056', '$2y$12$qmon7DVC7A3iAZOXaFxBauof9WNWXH.vdnXOF8ILhOf1pznYWkHuO', 'user', '2025-08-22 09:08:05', '2025-08-22 09:08:05', 29, 'PKSS Balikpapan', NULL),
(931, 'Asep Kusnadi', '80003000057', '$2y$12$IhIpEm1loNuW2W8Fe4AFCuTDpCjiPKBuhA4uMMXM.78zEBYrXUI8.', 'user', '2025-08-22 09:08:06', '2025-08-22 09:08:06', 53, 'PKSS Bandung', NULL),
(932, 'Iwan Setiawan', '80003000058', '$2y$12$ln390nLqgrk51vjLI27ko.KRW9LQv.NweK3.LMf92mSjdsRwSEh/2', 'user', '2025-08-22 09:08:06', '2025-08-22 09:08:06', 56, 'PKSS Bandung', NULL),
(933, 'Rachmat Hidayat', '80003000059', '$2y$12$BWiaSLoxbeCI1paxHaNQy.DEO1ij.sknnuMOc/LWArM5y.eOjLGOq', 'user', '2025-08-22 09:08:06', '2025-08-22 09:08:06', 29, 'PKSS Bandung', NULL),
(934, 'Rooyadi', '80003000060', '$2y$12$gkaEMx8zCAi4kyBmKJlE0OjSaoHqtMIHoKGgyJR/n7HSk0sZo5i5O', 'user', '2025-08-22 09:08:06', '2025-08-22 09:08:06', 29, 'PKSS Banjarmasin', NULL),
(935, 'Dinul Qayyimah', '80003000062', '$2y$12$KCXrZxLRBubDHxNRo2d9gu5QPTvqjkWMuktBVWmkttvR1KnQDGOga', 'user', '2025-08-22 09:08:07', '2025-08-22 09:08:07', 56, 'PKSS Batam', NULL),
(936, 'Dodi Dwi Saputra', '80003000063', '$2y$12$4kT.7WmLjuFLrRHVVepPNu2doEQw1blY8yGfnnzBH16iHd9W2CYS2', 'user', '2025-08-22 09:08:07', '2025-08-22 09:08:07', 53, 'PKSS Batam', NULL),
(937, 'Robi Harizuma Candra', '80003000064', '$2y$12$xLxDVGkwGtzFpIvz1W08s.a/SKChqicxh7WWHeJff1jVlbh9vxl6W', 'user', '2025-08-22 09:08:07', '2025-08-22 09:08:07', 29, 'PKSS Bengkulu', NULL),
(938, 'Yayan Apriansyah', '80003000065', '$2y$12$MdQCB06Qg8MwvrUmtlV8ee9RrAGLsGBxkTmGk1CLVd.dRl6ZKpv7i', 'user', '2025-08-22 09:08:08', '2025-08-22 09:08:08', 56, 'PKSS Bengkulu', NULL),
(939, 'Haryatna', '80003000066', '$2y$12$vJOJOppiU675zl3J7Dcntul2pPNOXYSBkkFqn6eng97XFlTMy9iGq', 'user', '2025-08-22 09:08:08', '2025-08-22 09:08:08', 53, 'PKSS Cirebon', NULL),
(940, 'Jurkedi', '80003000067', '$2y$12$bQa.b2WbOBlccc4nD9V1luwKz90xpKrp.QC/TgqqdwBkpBXZfYs12', 'user', '2025-08-22 09:08:08', '2025-08-22 09:08:08', 56, 'PKSS Cirebon', NULL),
(941, 'Wahyu Sulistyo', '80003000068', '$2y$12$31EcF.SKCdDUgDT/gIqpie9ItyYlt/g19uZH8wCfaGTalipXxFDaa', 'user', '2025-08-22 09:08:09', '2025-08-22 09:08:09', 29, 'PKSS Cirebon', NULL),
(942, 'I Gusti Ngurah Julirianta', '80003000069', '$2y$12$TxFZS6ds0z02SfYL4EFpiOpmcZd1dl9PGcMYrehlhq48lnpD.jiC.', 'user', '2025-08-22 09:08:09', '2025-08-22 09:08:09', 56, 'PKSS Denpasar', NULL),
(943, 'I Komang Karmana', '80003000070', '$2y$12$ABQxboVwBfBlgadXp0X/wemek3OuW39Tl1AozSgktrMRY6huW/hc2', 'user', '2025-08-22 09:08:09', '2025-08-22 09:08:09', 53, 'PKSS Denpasar', NULL),
(944, 'Ketut Rupawan', '80003000071', '$2y$12$JMHnayRPgt/d7eNheNwnNOmr54p1rMo2p8Xlv8TmyjK7sPzoDtg8G', 'user', '2025-08-22 09:08:10', '2025-08-22 09:08:10', 29, 'PKSS Denpasar', NULL),
(945, 'Hari Purnomo', '80003000073', '$2y$12$P7gLa5/wrF0kyI55KLPJO.sYdv88cjGJU3LlhTZRHzIAzvm.nVdaq', 'user', '2025-08-22 09:08:10', '2025-08-22 09:08:10', 53, 'PKSS Jakarta 2', NULL),
(946, 'Andika Putra Ramadan', '80003000074', '$2y$12$FEKqkMFjB1pT.FlVc9dbpOepJCvN/tT.XoDtBJBuQ3Xz.JBhNf5f2', 'user', '2025-08-22 09:08:10', '2025-08-22 09:08:10', 71, 'Kantor Pusat', NULL),
(947, 'Nurhujad Mara Kesuma', '80003000076', '$2y$12$MpJb6rtpzInX3N0O1Aq4f.N78PYrxzuiH5yDMhnWG0G0DBb2DxZ.u', 'user', '2025-08-22 09:08:10', '2025-08-22 09:08:10', 29, 'PKSS Jakarta 3', NULL),
(948, 'Aldi Irfan Azhari', '80003000078', '$2y$12$Stq61Jrvq3xVndpFg0a4oOE09lOzYCEHcKMwlZ5JU.tBIIJE29kkK', 'user', '2025-08-22 09:08:11', '2025-08-22 09:08:11', 29, 'PKSS Jakarta 4', NULL),
(949, 'Supriyono', '80003000079', '$2y$12$IS27viMmNkFnx9HLHNQ06.Gp1UvoQ4U2LwRFrqvlgEUM.T7yCK9wW', 'user', '2025-08-22 09:08:11', '2025-08-22 09:08:11', 82, 'PKSS Jakarta 4', NULL),
(950, 'Dedek Elfian', '80003000080', '$2y$12$ngXzyVHpkKgQoi1HhnnKlu1uT5xIMaLHydNDf.9K6YJTNDm52pJE2', 'user', '2025-08-22 09:08:11', '2025-08-22 09:08:11', 56, 'PKSS Jambi', NULL),
(951, 'Dwi Kurnia Putra', '80003000081', '$2y$12$xhEtewVQ/UU.xgKdgo58SuYiTbIhwo58.2VDvBTMOkgtn0Onjifle', 'user', '2025-08-22 09:08:12', '2025-08-22 09:08:12', 29, 'PKSS Jambi', NULL),
(952, 'Purnianto', '80003000082', '$2y$12$sYlVhQX6StNsA31b/lW8a.XlqN2nWamfh3NF5wqQ6v.HRQFfRLJRW', 'user', '2025-08-22 09:08:12', '2025-08-22 09:08:12', 53, 'PKSS Jambi', NULL),
(953, 'Amsal Samsuddin', '80003000083', '$2y$12$HQqxAuiDL4psmwOSKDFS4edkWo52B5cQYBfkTD.h/0WsRkcKAOWfu', 'user', '2025-08-22 09:08:12', '2025-08-22 09:08:12', 53, 'PKSS Jayapura', NULL),
(954, 'Herdiansyah Usman', '80003000084', '$2y$12$Nek0tSnDJs7NGan7yXihoOcmlW3VXs8Bhwo8evbnTNa7/6pgleimK', 'user', '2025-08-22 09:08:13', '2025-08-22 09:08:13', 29, 'PKSS Jayapura', NULL),
(955, 'Junaidin', '80003000085', '$2y$12$X24kcDc3RnUGwK0/VbUfMOQ3DCq6p95XBx8GPr1YaSIorxAaQZWfu', 'user', '2025-08-22 09:08:13', '2025-08-22 09:08:13', 56, 'PKSS Jayapura', NULL),
(956, 'Aswad Darmawan', '80003000086', '$2y$12$rJ716GEima1m86GOONV4/eP.3zBwlZzw153LYcXDqsqLEvUuav3/W', 'user', '2025-08-22 09:08:13', '2025-08-22 09:08:13', 29, 'PKSS Kendari', NULL),
(957, 'Aswin Tawakal', '80003000087', '$2y$12$X4ADWOLpwoWY/Bt5uplg0O79wnJf4MR7geGKOAcnc.0d/uh3Ix0vi', 'user', '2025-08-22 09:08:14', '2025-08-22 09:08:14', 53, 'PKSS Kendari', NULL),
(958, 'Muhammad Hij\'ran', '80003000089', '$2y$12$7XMoO4kfMi/tjKWj679qcOcKGefioGpuJkESq11sokYZnEvj8bzxO', 'user', '2025-08-22 09:08:14', '2025-08-22 09:08:14', 53, 'PKSS Kupang', NULL),
(959, 'Nabil Alkatiri', '80003000090', '$2y$12$8cw0V.urezB/OoXpzxxMteolYo5YFphWY2Ai6dME43bMGgwAoQgd.', 'user', '2025-08-22 09:08:14', '2025-08-22 09:08:14', 29, 'PKSS Kupang', NULL),
(960, 'Asep Saepudin', '80003000091', '$2y$12$7JBAPkywpUdNQ/eQ7fm0y.54Lev7UT0mxQ7mWma2i2SIiGCie1CT6', 'user', '2025-08-22 09:08:14', '2025-08-22 09:08:14', 53, 'PKSS Lampung', NULL),
(961, 'Renaldi', '80003000092', '$2y$12$loJcT/7tWZiJEKeSBfv.y.E8lIR4fnIGkTpeoowTaDwgBJo2YAdIm', 'user', '2025-08-22 09:08:15', '2025-08-22 09:08:15', 56, 'PKSS Lampung', NULL),
(962, 'Mahmuda', '80003000093', '$2y$12$Swf/hNkabGOBSrf3MSEt8.RISELvSAPoHw4DHvFGvjQc2VWtFrajy', 'user', '2025-08-22 09:08:15', '2025-08-22 09:08:15', 29, 'PKSS Mataram', NULL),
(963, 'Rusdi Idris', '80003000095', '$2y$12$igKdEQ0DGdNm7Mdz0Q0V6uARyQD0qFQEEf.tu4pZqP0uEm3V6N6FS', 'user', '2025-08-22 09:08:15', '2025-08-22 09:08:15', 29, 'PKSS Makassar', NULL),
(964, 'Hendra', '80003000096', '$2y$12$w/v3sIJMX5waqZard4YHCeBTc/oTm380gaecETlYXzw4HHM.AD9ny', 'user', '2025-08-22 09:08:16', '2025-08-22 09:08:16', 53, 'PKSS Makassar', NULL),
(965, 'Muhammad Farid', '80003000097', '$2y$12$Qt33RfyXr.PHvPER9mX.1.q98MukWWKwHljEGnG0TkxFY.K6JP0ga', 'user', '2025-08-22 09:08:16', '2025-08-22 09:08:16', 29, 'PKSS Malang', NULL),
(966, 'Samsul Huda', '80003000098', '$2y$12$s6DaTaT4MVxmX0daVCGyjusWojy.amVepjDhudfyztd90IPk4d9/q', 'user', '2025-08-22 09:08:16', '2025-08-22 09:08:16', 53, 'PKSS Malang', NULL),
(967, 'Iskandar Ismail', '80003000099', '$2y$12$CYBmkeF09ZJZNFM/ChLsz..13dXXnlCRTwigxKCRFy/.o2kbPQdr2', 'user', '2025-08-22 09:08:17', '2025-08-22 09:08:17', 56, 'PKSS Manado', NULL),
(968, 'Jufri Neno', '80003000100', '$2y$12$zjySH4adkJDn95zl1pG9b.95hmbkLD2RVPk0Z6GfhRoP6KQhacrM6', 'user', '2025-08-22 09:08:17', '2025-08-22 09:08:17', 29, 'PKSS Manado', NULL),
(969, 'Abdul Gani', '80003000102', '$2y$12$4V6WHQgxE1mSEGbmPgb6keSQENittZebCOW5r4XqlYrqBFQ02fYEm', 'user', '2025-08-22 09:08:17', '2025-08-22 09:08:17', 53, 'PKSS Mataram', NULL),
(970, 'Mitra Riadi', '80003000103', '$2y$12$wGpE.NcPrkldxhl5dO2OoeK/Xx2zyegnqTBwfgYyfIrU86p9sAEE2', 'user', '2025-08-22 09:08:18', '2025-08-22 09:08:18', 56, 'PKSS Mataram', NULL),
(971, 'Solahuddin Nasution', '80003000104', '$2y$12$BgXiz8bRlcYfG8.rU5fgPubNg7VASU6v8qH.W6Z39mPFCmBrG2lpq', 'user', '2025-08-22 09:08:18', '2025-08-22 09:08:18', 29, 'PKSS Medan', NULL),
(972, 'Nurdiansyah', '80003000105', '$2y$12$lOpuzpw5C5S54zR2MBbAeecUl1J/D/nqpQRdhn/CevEAYgWA793aa', 'user', '2025-08-22 09:08:18', '2025-08-22 09:08:18', 53, 'PKSS Medan', NULL),
(973, 'Muhamad Habibi', '80003000106', '$2y$12$SYAlmIHpRZPKMdFxJLczLujciwg/eh.qJ6dBwj7NERWF8W.QF8wBm', 'user', '2025-08-22 09:08:18', '2025-08-22 09:08:18', 56, 'PKSS Medan', NULL),
(974, 'Guntur', '80003000107', '$2y$12$sz27FSu4swEK5tjnT2uXB.tcy7GCRk8Srqtmz/WPKkC83gFOhY7s.', 'user', '2025-08-22 09:08:19', '2025-08-22 09:08:19', 29, 'PKSS Padang', NULL),
(975, 'Ardi', '80003000109', '$2y$12$FJrJvzYT1ipJhGGnkqCqjOZvocIsf4VsjfTz6EV6R0V7Ev.UO7Qn2', 'user', '2025-08-22 09:08:19', '2025-08-22 09:08:19', 29, 'PKSS Palangkaraya', NULL),
(976, 'Pahrul Rahman', '80003000110', '$2y$12$CoPSsGu0d8wmfFGATudw1unMjd31qljxsYl6lwuZnzEbPSnNEDdkG', 'user', '2025-08-22 09:08:19', '2025-08-22 09:08:19', 53, 'PKSS Palangkaraya', NULL),
(977, 'Hermansyah Susanto', '80003000111', '$2y$12$.4b0VaaB839KfqQG5uBWAeLB9qHOiWYyLEax9GN844MzptQ4IxZpC', 'user', '2025-08-22 09:08:20', '2025-08-22 09:08:20', 29, 'PKSS Palembang', NULL),
(978, 'Hengki Ermawan', '80003000112', '$2y$12$TTsF.3oHxNOlQSyX3VT4cOTe/bOB.vstndcRtN3JwH40FsS0CiA8S', 'user', '2025-08-22 09:08:20', '2025-08-22 09:08:20', 53, 'PKSS Palembang', NULL),
(979, 'Adry Marshal', '80003000113', '$2y$12$zQo7JJkk1yj4Cfd4dTpg5eDz09mpzCTj8HJynoInXPUMfmN1qp4va', 'user', '2025-08-22 09:08:20', '2025-08-22 09:08:20', 56, 'PKSS Palembang', NULL),
(980, 'Ahmad', '80003000114', '$2y$12$A57Epm1NWYh79uEKib0fKuByZrdCY5hqk40sNx0kiUrPU1.7Ve.Iq', 'user', '2025-08-22 09:08:21', '2025-08-22 09:08:21', 29, 'PKSS Palu', NULL),
(981, 'Andi Sanjaya', '80003000116', '$2y$12$8Q2XrSP3NLltLjv0EZ433.vGQ3g/vtK6JoQ5cq7lh6jx4kUicbVda', 'user', '2025-08-22 09:08:21', '2025-08-22 09:08:21', 56, 'PKSS Palu', NULL),
(982, 'Hendri J', '80003000117', '$2y$12$D33A0UfAiEU0MduplBEtDOaPw8dGxB9e/DPTmwVKga7.DSArAxw.K', 'user', '2025-08-22 09:08:21', '2025-08-22 09:08:21', 29, 'PKSS Pekanbaru', NULL),
(983, 'Efri Andani', '80003000118', '$2y$12$hr/1EvV19riU/rmt8NouHesc6kRgItAvgCpDrZkv7ECgJbKSuv2xS', 'user', '2025-08-22 09:08:21', '2025-08-22 09:08:21', 53, 'PKSS Pekanbaru', NULL),
(984, 'Arif Syahbana', '80003000119', '$2y$12$w95TbrBoRDX6zSU38n0v5ugrAszbV3gebwPKoNJAVY9OWbhSaUUTW', 'user', '2025-08-22 09:08:22', '2025-08-22 09:08:22', 29, 'PKSS Pontianak', NULL),
(985, 'Burhanudin', '80003000123', '$2y$12$pdTeZJCEbSxjh5IQE9Lz.u8g3ekxLNZlNTw7N6ZZXSJTYDQeXTTLW', 'user', '2025-08-22 09:08:22', '2025-08-22 09:08:22', 53, 'PKSS Purwokerto', NULL),
(986, 'Agung Setiawan', '80003000124', '$2y$12$pHv.zfINNdOwf7/O6ktcUO1TMsIwYeJpURbGW6dozuNFjC6V0lat2', 'user', '2025-08-22 09:08:22', '2025-08-22 09:08:22', 56, 'PKSS Purwokerto', NULL),
(987, 'Priyono', '80003000125', '$2y$12$qKmFprxysgmCCCNtnZ5ZbOTuxJy1GR6l5G1hGkAe6OMnMKByqcXPG', 'user', '2025-08-22 09:08:23', '2025-08-22 09:08:23', 29, 'PKSS Semarang', NULL),
(988, 'Muchamad Rosidi', '80003000126', '$2y$12$ZtObkLFEAi4qdOnDgtep/u/PS54qQ6KgR4TEqBOu74CoBxmSJUHl2', 'user', '2025-08-22 09:08:23', '2025-08-22 09:08:23', 53, 'PKSS Semarang', NULL),
(989, 'Kusmanto', '80003000127', '$2y$12$/xAENfyFsNrwFOBX880IHOD41IUm7009ISZwgt5yo/UxT/uADnZga', 'user', '2025-08-22 09:08:23', '2025-08-22 09:08:23', 56, 'PKSS Semarang', NULL),
(990, 'Khairul', '80003000128', '$2y$12$B.AaNFVvqm9lbeR9a5u7zOTBLZ4WQWYqxA1ve8gn6EY9yYYb2VAQu', 'user', '2025-08-22 09:08:24', '2025-08-22 09:08:24', 53, 'PKSS Sorong', NULL),
(991, 'Muhamad Yusuf', '80003000129', '$2y$12$t0g4mnnVOscNkBSPeJecTOrCjQKXQpZMHwin8mYd1GKlZBFuoLgTO', 'user', '2025-08-22 09:08:24', '2025-08-22 09:08:24', 56, 'PKSS Sorong', NULL),
(992, 'Agus Harianto', '80003000130', '$2y$12$clp.KsAj/kM6WyNCt50nhOpGcbGR34VOaJ3hiu63hIhPYi0lYtYiS', 'user', '2025-08-22 09:08:24', '2025-08-22 09:08:24', 29, 'PKSS Surabaya', NULL),
(993, 'Heru Nursanto', '80003000131', '$2y$12$2lAD8FlNkpL52MMqUgFlAOonlPaQMsARux0rBGX0F9HmfH5ZAX6CW', 'user', '2025-08-22 09:08:25', '2025-08-22 09:08:25', 53, 'PKSS Surabaya', NULL),
(994, 'Munfar', '80003000132', '$2y$12$/E49MjJKZrPXzslPu4P8/OsivX52bVj3Z61UxErq1KKjLyooNpNma', 'user', '2025-08-22 09:08:25', '2025-08-22 09:08:25', 56, 'PKSS Surabaya', NULL),
(995, 'Muldie', '80003000133', '$2y$12$IHxuTukDZRsQD.cUi/WjMui1Oqs8U.hEnlPCd56dUXE4CiyF6nO1m', 'user', '2025-08-22 09:08:25', '2025-08-22 09:08:25', 29, 'PKSS Ternate', NULL),
(996, 'Nisa Bakar', '80003000134', '$2y$12$Mg1tXx0hjpF2AHf8Bh8tVOEOPeez76oHTOVZuJiER.00KLoGvwkd2', 'user', '2025-08-22 09:08:26', '2025-08-22 09:08:26', 53, 'PKSS Ternate', NULL),
(997, 'Rudi Abd Latif', '80003000135', '$2y$12$GHYBxFyhaREEcuyLq26eoOYjL0jaQf/r2Fbvf7uKa2.VYwbyP0c2i', 'user', '2025-08-22 09:08:26', '2025-08-22 09:08:26', 56, 'PKSS Ternate', NULL),
(998, 'Sri Mulyana', '80003000136', '$2y$12$7XGcLbEQQhgcIvrnecddK.w1MGrQDtXW7pyARXjfyko/l00GfgR9S', 'user', '2025-08-22 09:08:26', '2025-08-22 09:08:26', 70, 'PKSS Yogyakarta', NULL),
(999, 'Aris Sutrisno', '80003000137', '$2y$12$3yqrGuS/IiHmqacTBO0V0O8TV0wg6BMASo8kgOjaO8GfcAOrIsCIa', 'user', '2025-08-22 09:08:26', '2025-08-22 09:08:26', 29, 'PKSS Purwokerto', NULL),
(1000, 'Deddy Santoso', '80003000138', '$2y$12$KzXcqPP.YNW7VmY9.4cqu.7ltxtyzN7noagilUdaMg07BGRMcoFR6', 'user', '2025-08-22 09:08:27', '2025-08-22 09:08:27', 53, 'PKSS Yogyakarta', NULL),
(1001, 'Wahyudi Bintoro', '80003000139', '$2y$12$4OcZXlxl9..Cv0qfQjERKuHlxdMmccVgyW14.c9JI260/0RgWJEZy', 'user', '2025-08-22 09:08:27', '2025-08-22 09:08:27', 56, 'PKSS Yogyakarta', NULL),
(1002, 'Luvi Alfian', '80003000140', '$2y$12$DE18ZiA7kUtmRT2ocX3svuLC7jtMs5Yb9uZ0uC7qWYDhrErLhDqjm', 'user', '2025-08-22 09:08:27', '2025-08-22 09:08:27', 71, 'Kantor Pusat', NULL),
(1003, 'Eko Nurcahyo Sulistiawan', '80003000141', '$2y$12$2jtiSHq5AMikApCQPW0pHOzEjEWt31P3lGaEXGnZTNpdOWF30khr6', 'user', '2025-08-22 09:08:28', '2025-08-22 09:08:28', 56, 'PKSS Malang', NULL),
(1004, 'Mahyudi', '80003000144', '$2y$12$46qXjWJRp94iaupvGv6CGuCcG7VFGE3EG5baDYHYKUqvhNVdD6Ih.', 'user', '2025-08-22 09:08:28', '2025-08-22 09:08:28', 53, 'PKSS Jakarta 3', NULL),
(1005, 'Muhammad Aropik', '80003000145', '$2y$12$HCzHC5o0n1jNXhXKaGfmQOd1X1TstSQyDB7/F.Qx56/6xVQqNeOpW', 'user', '2025-08-22 09:08:28', '2025-08-22 09:08:28', 29, 'PKSS Lampung', NULL),
(1006, 'Fardalio Evan Kagiling', '80003000146', '$2y$12$jbgdUeTZktbx1qoWG.jYCO/QL7n8egm80DXP2x6TmVz2waUbS46j6', 'user', '2025-08-22 09:08:29', '2025-08-22 09:08:29', 53, 'PKSS Manado', NULL),
(1007, 'Annisa Febria Santi', '80003000148', '$2y$12$lfM9ZQyMBXBSiF514FlbsuPveH8vCmb1FYQmY5O78YABTqO9q814q', 'user', '2025-08-22 09:08:29', '2025-08-22 09:08:29', 56, 'PKSS Balikpapan', NULL),
(1008, 'Muhammad Arfah', '80003000149', '$2y$12$binBrpZI.4xQp05X7Lnw0OsgHpChO1R93olhInZxPj7fAcc.ggSrS', 'user', '2025-08-22 09:08:29', '2025-08-22 09:08:29', 56, 'PKSS Makassar', NULL),
(1009, 'Muhamad Rizal Khamzah', '80003000150', '$2y$12$MvameyeQC0pMTyOlr87MnuD3pynDY9ZgnnS0JF7O27Qgwup40INvm', 'user', '2025-08-22 09:08:30', '2025-08-22 09:08:30', 53, 'PKSS Pontianak', NULL),
(1010, 'Eka Yudhistira', '80003000151', '$2y$12$bkXtEjEnKm9NUwjs1.jMyeIUYdMeOtzz39s6Gyf7t1JoauzEgp4/q', 'user', '2025-08-22 09:08:30', '2025-08-22 09:08:30', 56, 'PKSS Pekanbaru', NULL),
(1011, 'Ria Rosiyati', '80003000152', '$2y$12$L8D7a3zdGl4rFhQhl/Pkt.lI1CiTvKi2DphIn9r8eBVyRwPcifsJ6', 'user', '2025-08-22 09:08:30', '2025-08-22 09:08:30', 83, 'Kantor Pusat', NULL),
(1012, 'Sandi', '80003000153', '$2y$12$OSwuCJzmUqN6mw74OGoJEuGqOPmrJR88QugNjVqBLITtRkp85IHqC', 'user', '2025-08-22 09:08:30', '2025-08-22 09:08:30', 71, 'Kantor Pusat', NULL),
(1013, 'Intan Madilau', '80003000154', '$2y$12$zE9S/WbeTqThfggGvWEpoenLqkFjsVvsRl6qlan8wDCOg17uPKrEW', 'user', '2025-08-22 09:08:31', '2025-08-22 09:08:31', 53, 'Kantor Pusat', NULL),
(1014, 'Syakila Naflah Asisifa Hasanudin', '80003000156', '$2y$12$SWz2N9Xp12hndj9ld.HCbO/USftaS1d8Dq.e4LkU.F2ndaUXUvL7.', 'user', '2025-08-22 09:08:31', '2025-08-22 09:08:31', 61, 'Kantor Pusat', NULL),
(1015, 'Rafael Gaung Samudro', '80003000157', '$2y$12$vezMSG1ccn2kMBc2UiZBf./iRm1w9DEUhH8MRxRH9QheD6pO053z2', 'user', '2025-08-22 09:08:31', '2025-08-22 09:08:31', 61, 'Kantor Pusat', NULL),
(1016, 'Catur Prasetyo Nugroho', '80003000158', '$2y$12$t.1EP3fxXUXy.McE9.TrrelSYH0YNhRW0QVrs.kBEu44bxdqw5WZq', 'user', '2025-08-22 09:08:32', '2025-08-22 09:08:32', 56, 'PKSS Pontianak', NULL),
(1017, 'Vici Khasandra Junanta', '80003000160', '$2y$12$elLJPAH5PXHgIcBTzq2KrOFRaZjbwk5CI2t7W51cb.KTYMeyxZXgm', 'user', '2025-08-22 09:08:32', '2025-08-22 09:08:32', 56, 'PKSS Padang', NULL),
(1018, 'Misbah Husudur', '80003000161', '$2y$12$GCQUQ51W0mWEsoTke0aO3OPDmKDStZaP5weiOondUNQbAMiEyuCCK', 'user', '2025-08-22 09:08:32', '2025-08-22 09:08:32', 75, 'Kantor Pusat', NULL),
(1019, 'Syarif Abdurrahman', '80003000162', '$2y$12$OY/7Ny9BSaF5uBKlG8NXC.Taowz4gaoGadbWWBwNKmIQXPvSy//8.', 'user', '2025-08-22 09:08:33', '2025-08-22 09:08:33', 56, 'PKSS Banjarmasin', NULL),
(1020, 'Syahrul Zamaludin Putra', '80003000163', '$2y$12$oien12e7WSCctq8N/.hLDOCXySyl4TQoCn7mpNtrbhdSgckAUQXUi', 'user', '2025-08-22 09:08:33', '2025-08-22 09:08:33', 75, 'Kantor Pusat', NULL),
(1021, 'Liza Nur Indahsari', '80003000164', '$2y$12$N942k8uCC306/2mqLgn6ZuZ84zTiAtvLD2tw48U9JuvYVFpHCsBoG', 'user', '2025-08-22 09:08:33', '2025-08-22 09:08:33', 60, 'Kantor Pusat', NULL),
(1022, 'La Riswan', '80003000167', '$2y$12$mx9tXO1uTADb0mYrFJ94ZuSphNrWJDUBhy48IguIBRaqYm52A9JvG', 'user', '2025-08-22 09:08:33', '2025-08-22 09:08:33', 53, 'PKSS Ambon', NULL),
(1023, 'Ferrial Rizkcy Radianto Latumahina', '80003000168', '$2y$12$3HuJkjbecim8WDvmeOg1/OQGVARYYyPRawRUE9VujxnlYpPasCuJq', 'user', '2025-08-22 09:08:34', '2025-08-22 09:08:34', 29, 'PKSS Ambon', NULL),
(1024, 'Rama Pratama', '80003000169', '$2y$12$lihDFHiR2qvD6zdgPd7vC.ZxWBjvNTh2UnVMp7/0zTtMs2NuRhcYC', 'user', '2025-08-22 09:08:34', '2025-08-22 09:08:34', 53, 'PKSS Padang', NULL),
(1025, 'Agnes Ayu Rahma Septriyanti', '80003000170', '$2y$12$FE1SMbfWI9OphNmTf6JKLeOqzVALevvU7lMbOSAy9PKE19ljj51aS', 'user', '2025-08-22 09:08:34', '2025-08-22 09:08:34', 62, 'Kantor Pusat', NULL),
(1026, 'Ruth Cristiani Nababan', '80003000171', '$2y$12$sgV7xopOQkPif6becoTMNeqR5aKNrhdnlwYDkZ48Z6rwKigE5EYJq', 'user', '2025-08-22 09:08:35', '2025-08-22 09:08:35', 62, 'Kantor Pusat', NULL),
(1027, 'Yuli Pranata', '80003000172', '$2y$12$.GImqf9y.mFXHObZm1uuB.PFaGO3bGoAnhfR0qHQhaXBw0AhNbdOS', 'user', '2025-08-22 09:08:35', '2025-08-22 09:08:35', 84, 'Kantor Pusat', NULL),
(1028, 'Muhamad Andromiko', '80003000173', '$2y$12$Arr1enpAxF39yLuVnRyby.XBpCqJIiTp14i6UhUqMNgZXaQ6hOm/a', 'user', '2025-08-22 09:08:35', '2025-08-22 09:08:35', 84, 'Kantor Pusat', NULL),
(1029, 'Winona Aurelia', '80003000174', '$2y$12$/ZzIjLhfAdPjzhDyF8UAL.IEdehr/sKUgLBHKaFB3i4VVovdpncri', 'user', '2025-08-22 09:08:36', '2025-08-22 09:08:36', 64, 'PKSS Jakarta 2', NULL),
(1030, 'Alfian Indra Saputra', '80003000175', '$2y$12$YFtuIZNZ8KL6u5dhZk.yCeeKsTwFBZr.0R61jpUAxRU/anvYSAWgO', 'user', '2025-08-22 09:08:36', '2025-08-22 09:08:36', 29, 'PKSS Jakarta 1', NULL),
(1031, 'I Komang Agus Rustika', '80003000176', '$2y$12$Vq6d/aJDF7kimpDLLXlcaOI5dOYbv079GUw3D2q63S3liZ6GuzrT6', 'user', '2025-08-22 09:08:36', '2025-08-22 09:08:36', 53, 'PKSS Palu', NULL),
(1032, 'Alfison', '80005000002', '$2y$12$cdCTWHfNkr5COhp0tnB9wOMMuGfYDBqkmXIznuXNtmnXVjSmEXIGS', 'user', '2025-08-22 09:08:37', '2025-08-22 09:08:37', 30, 'PKSS Pekanbaru', NULL),
(1033, 'Imron Maulana', '80005000003', '$2y$12$hcOUhK3iK/a.k8nukD5DDOQOM73eHPf9J1Rym109ggG1DuWWnM7Fu', 'user', '2025-08-22 09:08:37', '2025-08-22 09:08:37', 30, 'PKSS Denpasar', NULL),
(1034, 'Cheveriady', '80005000004', '$2y$12$RFRDOt3Q5cGOnrvalXKEwOHLlhe.tTCj.gi5oLisoEVPtWRSLuib2', 'user', '2025-08-22 09:08:37', '2025-08-22 09:08:37', 30, 'PKSS Jakarta 3', NULL),
(1035, 'Tomi Hidayat', '80005000005', '$2y$12$YnsmL135EBR.Ivu3oLJ.OOit8q4LCVdIsU2lnDhgNvy6LqzLorM7q', 'user', '2025-08-22 09:08:37', '2025-08-22 09:08:37', 30, 'PKSS Jakarta 2', NULL),
(1036, 'Suardi B', '80005000006', '$2y$12$Kjv9G13AOikDkW4zhIjXw.ZofT3mM7QDpYIEhjoYRfZ.rZVFOSQ6O', 'user', '2025-08-22 09:08:38', '2025-08-22 09:08:38', 30, 'PKSS Makassar', NULL),
(1037, 'Abdul Rohman', '80005000008', '$2y$12$0PUjGsdmxZr5J2.VVdBgieQZD8KM6SwHsmpzgl2asTA6ohUa9p3mC', 'user', '2025-08-22 09:08:38', '2025-08-22 09:08:38', 30, 'PKSS Bandung', NULL),
(1038, 'Rocky Mamonto', '80005000011', '$2y$12$h85R2zcrRCc6bN7Xt9OSIeey4gHkmmixjkjwkyk4cNxLGAnPDSG1a', 'user', '2025-08-22 09:08:38', '2025-08-22 09:08:38', 30, 'PKSS Jayapura', NULL),
(1039, 'Sona Bayu Aditya', '80005000012', '$2y$12$kfiMKKzPZQb8lGzZrqifQOna7FCCZuBaYTWqFFtSVngIZHCycRIVW', 'user', '2025-08-22 09:08:39', '2025-08-22 09:08:39', 30, 'PKSS Malang', NULL),
(1040, 'Budiman Yawaddullazi', '80005000014', '$2y$12$oSPJ.VjsvRmeIpYVFhX9sO0OvaQhIcNMcSCH1SqW/9zFuljghMAfi', 'user', '2025-08-22 09:08:39', '2025-08-22 09:08:39', 30, 'PKSS Padang', NULL),
(1041, 'Angga Saputra', '80005000015', '$2y$12$M1A.ou9CJlvKej4zPWCXUeUINLyWlJq51wugO0nbv2Bjgo.L2TJWC', 'user', '2025-08-22 09:08:39', '2025-08-22 09:08:39', 30, 'PKSS Palembang', NULL),
(1042, 'Sri Artho Kencono', '80005000016', '$2y$12$JVnZMlQuyITRtQ3T.lkO1urVNrinnN0Cd85n/o1TiSAAGlUgVRPVS', 'user', '2025-08-22 09:08:40', '2025-08-22 09:08:40', 30, 'PKSS Semarang', NULL),
(1043, 'Lidah Hariyanto', '80005000017', '$2y$12$oFF5gnt.2Jt9uxqPfSr4EeGq8YvcLB0WdYX7AMMHp.226r1jKDnhe', 'user', '2025-08-22 09:08:40', '2025-08-22 09:08:40', 30, 'PKSS Surabaya', NULL),
(1044, 'Budhi Gunawan', '80005000019', '$2y$12$w7r13OipnLkYj9qgvJPkauTkKEI/2HANB0mAfw4yhbZAypVD5iVha', 'user', '2025-08-22 09:08:40', '2025-08-22 09:08:40', 30, 'PKSS Yogyakarta', NULL),
(1045, 'Syarif Daeng Pawewang', '80005000020', '$2y$12$WC9U5tr1nMXQCTLGPLgELertbAJ1eAiK6CvR9IrWefZlDfsIWdLnm', 'user', '2025-08-22 09:08:41', '2025-08-22 09:08:41', 30, 'PKSS Manado', NULL),
(1046, 'Eko Sumaryanto', '80005000021', '$2y$12$TcnDj4Sbmm9hFq2zYyKQo.dzxSka2OHCdVFiCZxkOzfBWYpXzcn/i', 'user', '2025-08-22 09:08:41', '2025-08-22 09:08:41', 30, 'PKSS Jakarta 1', NULL),
(1047, 'Reza Setiawan', '80005000022', '$2y$12$txqJc/F1xPkbiqGTm9bOgerNILddorO0I.En2XY5fhIjQ2VSyqCw.', 'user', '2025-08-22 09:08:41', '2025-08-22 09:08:41', 30, 'PKSS Medan', NULL),
(1048, 'Jonidi', '80005000023', '$2y$12$/BA8EvkSMFderqdxpPSc3uSmEmB6.cP4ZTRGpG9UdHt6DoTc6J9jm', 'user', '2025-08-22 09:08:41', '2025-08-22 09:08:41', 30, 'PKSS Bandar Lampung', NULL),
(1049, 'Mutia Afifah', '80008000001', '$2y$12$jxr.1p6PfhZK90ql/odaA..AsxUoZObT8I8x/mc7n2e7Aufpq5DBS', 'user', '2025-08-22 09:08:42', '2025-08-22 09:08:42', 85, 'BRI Kantor Pusat', NULL),
(1050, 'Ganajalma Nabastala', '80008000002', '$2y$12$8AITmwVY6drKEbOgMVHjAOE8KhoELTlQAOSIELAIpkTGa/MbIQR/m', 'user', '2025-08-22 09:08:42', '2025-08-22 09:08:42', 85, 'BRI Kanwil Jakarta 1', NULL),
(1051, 'Ramadhika Gumilang', '80008000003', '$2y$12$hxGf8jXcR1jDddn8Y9DK8uBd64LltoqKOWCW0egE1d6sxHakeiYYe', 'user', '2025-08-22 09:08:42', '2025-08-22 09:08:42', 86, 'BRI Kanwil Jakarta 2', NULL),
(1052, 'Deno Siswanto', '80010000001', '$2y$12$D1pcLNJfSF.rCxU9dLixY.0HF6Ybc9kXOBx4zKY961vMHPQ7hrF2S', 'user', '2025-08-22 09:08:43', '2025-08-22 09:08:43', 29, 'Kantor Pusat Koperasi', NULL),
(1053, 'Agus Tri Laksono', '80010000002', '$2y$12$ptG1tmB1HxeCDOTAXUEb2OxEKb.10C0Fmd7sdX6VwUX8vrWLI/RYG', 'user', '2025-08-22 09:08:43', '2025-08-22 09:08:43', 29, 'Kantor Pusat Koperasi', NULL),
(1054, 'Fiorentina Aldila Priyatmadhi', '80011000001', '$2y$12$hVePwknOC1m0PUSqD098TO1f79K7g97G.qtW8Xtg1GXsRh5sQHCrS', 'user', '2025-08-22 09:08:43', '2025-08-22 09:08:43', 87, 'Kantor Pusat', NULL),
(1055, 'Shavana Putri Natasya', '80011000002', '$2y$12$mKEUG0.9l7SScHBgrD0dh.wyvMJcN80mWQVU1x/BRd91kU8Q63bN2', 'user', '2025-08-22 09:08:44', '2025-08-22 09:08:44', 88, 'Kantor Pusat', NULL),
(1056, 'Ade Idhar Churrur', '80013000001', '$2y$12$IuEMogdIcKEwDzudeSXsLO1zIVdMAoYGN2JgUT/D1tqnEfPvaq/zu', 'user', '2025-08-22 09:08:44', '2025-08-22 09:08:44', 59, 'BRI KC Brebes', NULL),
(1057, 'Imam Saripudin', '80013000002', '$2y$12$yIVDwC5rVpr.EbixZSjgSucFtrcW9OVXE4FBuIj4yqwzuMwIDoVhG', 'user', '2025-08-22 09:08:44', '2025-08-22 09:08:44', 59, 'BRI KC Brebes', NULL),
(1058, 'Hasanudin', '80013000003', '$2y$12$1pUD3OBT.O7DinB06djb.uOqftht4vD.5Hm5V8U/NZxj91x3a5A5G', 'user', '2025-08-22 09:08:45', '2025-08-22 09:08:45', 59, 'BRI KC Brebes', NULL),
(1059, 'Tegar Febri Erlangga', '80013000004', '$2y$12$QIUF7NFOIb6oKhNyMZur/OtDYLDBAphQqnH4fAdW2W8pxwGpzqQNa', 'user', '2025-08-22 09:08:45', '2025-08-22 09:08:45', 59, 'BRI KC Brebes', NULL),
(1060, 'Tri Mulyaningsih', '80013000005', '$2y$12$rK.kAGdyHGiVf3X0xNesIOdM59G9.7ldcJh9ffdb8LRZygmzyW0O.', 'user', '2025-08-22 09:08:45', '2025-08-22 09:08:45', 59, 'BRI KC Brebes', NULL),
(1061, 'Dedy Fujianto', '80013000006', '$2y$12$00tx1zJ6uISCJ3U/C1hxyOLr3zCopkUX0TwILMwRmcVfj0WBZy3se', 'user', '2025-08-22 09:08:45', '2025-08-22 09:08:45', 89, 'BRI KC Brebes', NULL),
(1062, 'Sigit Afrianto', '80013000007', '$2y$12$A.zvZNYpNxgN54PKPzsh5ehQvLM8ESfwtinijYzazdrpdZOh3lYzK', 'user', '2025-08-22 09:08:46', '2025-08-22 09:08:46', 90, 'BRI KC Brebes', NULL),
(1063, 'Yosi Hartriso', '80013000008', '$2y$12$sKmINet6eNn2e.leDk82a.3Gq6A831QembLywZblzF6ZMqrKvimli', 'user', '2025-08-22 09:08:46', '2025-08-22 09:08:46', 91, 'BRI KC Brebes', NULL),
(1064, 'De Tarso', '80013000009', '$2y$12$9Qhi2eGPpLjRHJw63aFPyOUJAroZF6.fnT.Pg6pa/VFoL6OG4opEi', 'user', '2025-08-22 09:08:46', '2025-08-22 09:08:46', 91, 'BRI KC Brebes', NULL),
(1065, 'Irfan Muzakar', '80013000010', '$2y$12$tDeMKHJ6aEFGuwx0Cl1le.2kslEX5VamC/lTmG6eSqTdgUxIDTBvq', 'user', '2025-08-22 09:08:47', '2025-08-22 09:08:47', 91, 'BRI KC Brebes', NULL),
(1066, 'Yance Kuswanto', '80013000011', '$2y$12$l52cccYkE7XlICSEI8IR/u/VbxwVLvTGRa4QPzbJ8RTp2doCWTciq', 'user', '2025-08-22 09:08:47', '2025-08-22 09:08:47', 59, 'BRI KCP Jatibarang', NULL),
(1067, 'Ades Prawiro', '80013000012', '$2y$12$GzRwy4MbnXTMaZqHiR92suGC3yHPb1X1.dmP9eni7oBiqhdSjO0iy', 'user', '2025-08-22 09:08:47', '2025-08-22 09:08:47', 89, 'BRI KCP Jatibarang', NULL),
(1068, 'Agus Hartanto', '80013000013', '$2y$12$PvRNkWYWQT3OgppYDWBhxOhp8rex3HVhJhaDYxOL1w0fQM4iERGQO', 'user', '2025-08-22 09:08:48', '2025-08-22 09:08:48', 89, 'BRI KCP Jatibarang', NULL),
(1069, 'Kervin Herdiansyah', '80013000014', '$2y$12$C3TWyu/X2vcnFVt76HUFuumumI9JCsND.qT2wD1y0kxLL2H4q/NBC', 'user', '2025-08-22 09:08:48', '2025-08-22 09:08:48', 59, 'BRI KCP Ketanggungan', NULL),
(1070, 'Restu Triyono', '80013000015', '$2y$12$p6pTLjcUHaAtcSNpyCMkg.6wHCcDxnY3U.BcwAsuQHvPQI/3YLbhG', 'user', '2025-08-22 09:08:48', '2025-08-22 09:08:48', 59, 'BRI KCP Ketanggungan', NULL),
(1071, 'Akhmad Faizal', '80013000016', '$2y$12$J.2OWMQTk0TFibEBXfthbexhfe8uHJ1iFg.py3s2djrU.Les44zza', 'user', '2025-08-22 09:08:48', '2025-08-22 09:08:48', 59, 'BRI KCP Ketanggungan', NULL),
(1072, 'Daryono', '80013000017', '$2y$12$q5JqLL41OeMvnFlr//GE1eOqd6Rh0bWnbFKN5SJ7nD4Oxun.wz9L2', 'user', '2025-08-22 09:08:49', '2025-08-22 09:08:49', 59, 'BRI KCP Ketanggungan', NULL),
(1073, 'Ali Mustofa', '80013000018', '$2y$12$cb9FjdDuHUOjW2zNKjVEyeFBo1cQ0VdifgBRz65DWg3fH3oqgypO2', 'user', '2025-08-22 09:08:49', '2025-08-22 09:08:49', 89, 'BRI KCP Ketanggungan', NULL),
(1074, 'To Imron', '80013000019', '$2y$12$uQePEUql2yv87H9kWoanV.JD1xwod7QFAq2xYheG6cMizWUOKUbpS', 'user', '2025-08-22 09:08:49', '2025-08-22 09:08:49', 89, 'BRI KCP Ketanggungan', NULL),
(1075, 'Khairul Anam', '80013000020', '$2y$12$lc0Pgv9dmlV68s/H2yDaCuLqKE9/e3IbMjYTSB1iREpLVSFdnVtPm', 'user', '2025-08-22 09:08:50', '2025-08-22 09:08:50', 59, 'BRI Unit Bandungsari', NULL),
(1076, 'Dani Hardianto', '80013000021', '$2y$12$RYYepZVzCXeNCujE6ts02.aQBwgiN8acGHLs6j67SdQ3XdHW10Dmm', 'user', '2025-08-22 09:08:50', '2025-08-22 09:08:50', 59, 'BRI Unit Bandungsari', NULL),
(1077, 'Widya Ary Basuki', '80013000022', '$2y$12$DuFRlAX1tTjEHm7dK8r/1uIoqjVXddkOOkEv2nH8.QnDEWFBRayUK', 'user', '2025-08-22 09:08:50', '2025-08-22 09:08:50', 59, 'BRI Unit Bangsri', NULL),
(1078, 'Imam Nawawi', '80013000024', '$2y$12$8POyiLlc0M3ZcLgTiZ6FeOxXoiyDxXoWSJYeaUSAmUBBtUh0np8JK', 'user', '2025-08-22 09:08:51', '2025-08-22 09:08:51', 59, 'BRI Unit Bangsri', NULL),
(1079, 'Junaedi Siswindiyanto', '80013000025', '$2y$12$xVDnJfQpVPnfAIcBizeCi.4o6XUFrbzkoliP19DRdi70HVY1jIWHO', 'user', '2025-08-22 09:08:51', '2025-08-22 09:08:51', 89, 'BRI Unit Bangsri', NULL),
(1080, 'Ruslan', '80013000028', '$2y$12$OJ39zYeuLF/oGxS56dJE6ev.0p/Qdrr49o8eBFZbkbiT.jQFeTMr.', 'user', '2025-08-22 09:08:51', '2025-08-22 09:08:51', 59, 'BRI Unit Banjarharjo', NULL),
(1081, 'Susri Hendra Yohana', '80013000029', '$2y$12$G56RCLxZNsQf1/UrJCyJJuUT3ZSUY7nWa61xbKcDcOXZHBBrLJRCG', 'user', '2025-08-22 09:08:52', '2025-08-22 09:08:52', 89, 'BRI Unit Banjarharjo', NULL),
(1082, 'Rizal Muhaemin', '80013000030', '$2y$12$FUjiOPNVJYB0jsh7NttN1OOzcWD9SNMrixkTtyiwMRcMsCyx8GCYe', 'user', '2025-08-22 09:08:52', '2025-08-22 09:08:52', 59, 'BRI Unit Baros', NULL),
(1083, 'Ahmad Taher', '80013000031', '$2y$12$pP/iGJcRy9xwvo2cRxZBLO8fbO/PFQ/Wzw73dH8Hw7WxRFTRUmw.6', 'user', '2025-08-22 09:08:52', '2025-08-22 09:08:52', 59, 'BRI KC Brebes', NULL),
(1084, 'Chaerul Amin Mu\'min', '80013000032', '$2y$12$NkmSG6G/imP1pB.9UHk1e.z3wj3kQDQjvVyRkHKAZ1u39lvBCioba', 'user', '2025-08-22 09:08:52', '2025-08-22 09:08:52', 59, 'BRI Unit Banjaratma', NULL),
(1085, 'Riko Afriyan', '80013000033', '$2y$12$xOskaPO6E3myVPIsB69Kfu1zT.BbWQ82DCjpOzxp0eeB0lEswpsmm', 'user', '2025-08-22 09:08:53', '2025-08-22 09:08:53', 59, 'BRI Unit Baros', NULL),
(1086, 'Firman Hikmawan', '80013000034', '$2y$12$ADH7/IxD4worJ4/sLOZjzOLDxAkn2bMcEh2bonkWCx0azhlJS2xDW', 'user', '2025-08-22 09:08:53', '2025-08-22 09:08:53', 89, 'BRI Unit Baros', NULL),
(1087, 'Saeful Amin', '80013000035', '$2y$12$DNgycmUTe/A9snOjDLkGROQWf/RTDkcVFpJdgx9VP9Y7PJVq.ipj.', 'user', '2025-08-22 09:08:53', '2025-08-22 09:08:53', 59, 'BRI Unit Buaran', NULL),
(1088, 'Nursidik', '80013000036', '$2y$12$9R1UF25p5w6hYmUFI22kCuZVsiyq1D7uUp.ckX6LGBiaDIfZcnawS', 'user', '2025-08-22 09:08:54', '2025-08-22 09:08:54', 59, 'BRI Unit Bulakamba', NULL),
(1089, 'Agus Andryawan', '80013000037', '$2y$12$UcMbUsBVcRyyJcaqhKkVwOHsWihTqNtPBH7kzacPqDCSxJRWqLlIK', 'user', '2025-08-22 09:08:54', '2025-08-22 09:08:54', 89, 'BRI Unit Bulakamba', NULL),
(1090, 'Agung Wibawa Putra', '80013000038', '$2y$12$zfNybixzp0MeEQzZgSrWsuagM9U2FA.Yl.y5MC81Hk3mMJaQG4DXm', 'user', '2025-08-22 09:08:54', '2025-08-22 09:08:54', 89, 'BRI Unit Dukuh Waringin', NULL),
(1091, 'Fani Setia Budhi', '80013000039', '$2y$12$oYOD1Zy41HNMMR2O9s4k0OT8jyz1JIyUbkhH6DSOCPBAVbadZSinm', 'user', '2025-08-22 09:08:55', '2025-08-22 09:08:55', 59, 'BRI Unit Dukuh Waringin', NULL),
(1092, 'Andi Susandi', '80013000040', '$2y$12$xlMk0D5.nfVbTm8lAlhuquLgoYWINA.3X3ZtAxRrugl0oiAIBBSQO', 'user', '2025-08-22 09:08:55', '2025-08-22 09:08:55', 59, 'BRI Unit Jatibarang 1 ', NULL),
(1093, 'Ibnu Septian Renaldy', '80013000042', '$2y$12$LJ7qkftWqIBG6KY0WUI/C.uSQm.BOHQPAgUUMeeJJxr7SAs9hVWE2', 'user', '2025-08-22 09:08:55', '2025-08-22 09:08:55', 59, 'BRI Unit Jatibarang 2', NULL),
(1094, 'Muhamad Agung Akhirin', '80013000043', '$2y$12$ghikHZJcIaQ5LxuUkJTgoOabwHdXcpk1iWND6Z2DELT3XJ0.TiLL6', 'user', '2025-08-22 09:08:56', '2025-08-22 09:08:56', 59, 'BRI Unit Jatibarang 2', NULL),
(1095, 'Tedi Ariyana', '80013000044', '$2y$12$wuOJ/SJ02rZPxvw.RXQ1J.wfihT48Eb1rQ0Qk.EiTcZcciRejkCwS', 'user', '2025-08-22 09:08:56', '2025-08-22 09:08:56', 59, 'BRI Unit Jatibarang 2', NULL),
(1096, 'Wardiyanto', '80013000045', '$2y$12$y9aAlADapymOveb8xuYyw.dRIhYGZyfyD4G3AvYB2eAtrTgsYNKTK', 'user', '2025-08-22 09:08:56', '2025-08-22 09:08:56', 59, 'BRI Unit Jatirokeh', NULL),
(1097, 'Indra Kristyanto', '80013000046', '$2y$12$3Hu1OsqTwGxz0FvWV0AC/.PBfq.379eRqKbUmpXEECfeZ/1bFkGn6', 'user', '2025-08-22 09:08:56', '2025-08-22 09:08:56', 89, 'BRI Unit Jatirokeh', NULL),
(1098, 'Tanto Irawan', '80013000047', '$2y$12$nJN.aN8.OCd.Ht9KXZCR4OILi4f4z97jCjVO/t8StjWzGU3rcsUJe', 'user', '2025-08-22 09:08:57', '2025-08-22 09:08:57', 59, 'BRI Unit Kaligangsa', NULL),
(1099, 'Bima Permana Putra', '80013000048', '$2y$12$Bv1SBDJ7RsGxjH9n1tSN6OQB4mj0HyF1OgF4HoENrWeUjlBPsCbaG', 'user', '2025-08-22 09:08:57', '2025-08-22 09:08:57', 59, 'BRI Unit Kaligangsa', NULL),
(1100, 'Ade Putra', '80013000050', '$2y$12$Ji89QupUCqyoYtb3k3a5yekYecW6q6UYBhJ7K5jzicGheGT9uXTKi', 'user', '2025-08-22 09:08:57', '2025-08-22 09:08:57', 59, 'BRI Unit Kemurang Wetan', NULL),
(1101, 'Lintang Yoga Jati', '80013000051', '$2y$12$Imxc7syZJ2VHlWX2V0UPfO5Uu96BS4sUA61.4azOgnm95aYx2uFTq', 'user', '2025-08-22 09:08:58', '2025-08-22 09:08:58', 59, 'BRI Unit Kemurang Wetan', NULL),
(1102, 'Moh Ilham Stiawan Pr', '80013000052', '$2y$12$zqbANXsMuh/6cbsOaJUh6uIDIliyJSBTjUpQ45UXhW4pYIRVknaIG', 'user', '2025-08-22 09:08:58', '2025-08-22 09:08:58', 59, 'BRI Unit Kemurang Wetan', NULL),
(1103, 'Guntur Sukma Andhika', '80013000053', '$2y$12$WeHW9XD/BBupq00Hi3YqvOPb3Vasd.v0R.M8PSMbw42wAX7s7JF56', 'user', '2025-08-22 09:08:58', '2025-08-22 09:08:58', 59, 'BRI Unit Kersana', NULL),
(1104, 'Achmad Aadiyaat Surawijaya', '80013000054', '$2y$12$0ZY6qa1/4GgLXWwJoa6CeOsWN63YMSUNOODbBimCJ5/eSLOCGzzPK', 'user', '2025-08-22 09:08:59', '2025-08-22 09:08:59', 59, 'BRI Unit Kersana', NULL),
(1105, 'Agus Faradiansyah', '80013000055', '$2y$12$4pADs8Nzk/B.h6iax1TYQ.j53QlXxPfsMFiWne13Irm6N8RwNiTPa', 'user', '2025-08-22 09:08:59', '2025-08-22 09:08:59', 89, 'BRI Unit Kersana', NULL),
(1106, 'Fajar Egi Prasetyo', '80013000056', '$2y$12$5bHED8740jkyde6M1o7N5Oec/CLWraRLWGHK/CS4fi0KVkg/gJrDK', 'user', '2025-08-22 09:08:59', '2025-08-22 09:08:59', 59, 'BRI Unit Klampok', NULL),
(1107, 'Syahrul Firmansyah', '80013000057', '$2y$12$ziOAuVbq9FTtXAka977T7e0aEqa4WGKhbflext9qNhBC9qbUX8Gye', 'user', '2025-08-22 09:08:59', '2025-08-22 09:08:59', 59, 'BRI Unit Klampok', NULL),
(1108, 'Andry Irawan', '80013000058', '$2y$12$z4IoF1MoK0b3K/EKkprmW.wF0.MWafIphgJuUcAzGmaJekAYtYSkq', 'user', '2025-08-22 09:09:00', '2025-08-22 09:09:00', 89, 'BRI Unit Klampok', NULL),
(1109, 'Tokhidin', '80013000059', '$2y$12$1vIBhGcNN2HOMN1kjNl85eiV.pGfIPahPgpNpzrX/EUtZ2DI9eDIS', 'user', '2025-08-22 09:09:00', '2025-08-22 09:09:00', 59, 'BRI Unit Kluwut', NULL),
(1110, 'Deri Prayitno', '80013000060', '$2y$12$Kx48kMIiUKEoDkK7bfDi4ugT/thACQlGDa0D7SW7ozS.3mJDo59kO', 'user', '2025-08-22 09:09:00', '2025-08-22 09:09:00', 59, 'BRI Unit Kluwut', NULL),
(1111, 'Abdul Wahab Sachroni', '80013000061', '$2y$12$wZbtroU1TG3DaUFg9rfjTOHleCVNHmn6zOZmoYEUulRlZDqIRyg0u', 'user', '2025-08-22 09:09:01', '2025-08-22 09:09:01', 59, 'BRI Unit Krasak', NULL),
(1112, 'Rafin Hafis Hasbalah', '80013000063', '$2y$12$/6odC.fV/7JBpIVWypSROOIKixUnmkmU0QW31fwv2ecwLYZ4CddOy', 'user', '2025-08-22 09:09:01', '2025-08-22 09:09:01', 59, 'BRI Unit Kubangwungu', NULL),
(1113, 'Bimo Prabowo', '80013000064', '$2y$12$dN4Of7TAe10JHD/WcjCg7eYUqGgTn1TJ.7IiqTcbJy6qWOtO692fG', 'user', '2025-08-22 09:09:01', '2025-08-22 09:09:01', 59, 'BRI Unit Kubangwungu', NULL),
(1114, 'Lutfi Ainul Yaqin', '80013000065', '$2y$12$A1PQkhWIbH8V5QcLavZb1O0oGc8tdEteE9nQ1.kQllTOM98Ow1CUW', 'user', '2025-08-22 09:09:02', '2025-08-22 09:09:02', 59, 'BRI Unit Kubangwungu', NULL),
(1115, 'Daffa Putra Undyansyah', '80013000066', '$2y$12$xPKaD37pgb3xCYthB.Opx.5zZb8eVf5GUWyNCdv5go.2OveQGrZHC', 'user', '2025-08-22 09:09:02', '2025-08-22 09:09:02', 59, 'BRI Unit Kubangwungu', NULL),
(1116, 'Bambang Irawan', '80013000067', '$2y$12$gSl59.qF1oo3cTdIXqRZHeurMiU5.LMqNSGMuoOhF7D2FEbwFeUO6', 'user', '2025-08-22 09:09:02', '2025-08-22 09:09:02', 59, 'BRI Unit Larangan', NULL),
(1117, 'Mukhamad Afif', '80013000068', '$2y$12$O3QJIfzGuEgdJ1jpCS2pbu0v7oH2gQY6lM7YUg29XUWZM5dlxKt.O', 'user', '2025-08-22 09:09:03', '2025-08-22 09:09:03', 59, 'BRI Unit Larangan', NULL),
(1118, 'Wahudin', '80013000069', '$2y$12$bry5/h1vbhttDAHUBMlbHO2zephr2dX9T830MBfsRVbMwM4AhxYum', 'user', '2025-08-22 09:09:03', '2025-08-22 09:09:03', 89, 'BRI Unit Larangan', NULL),
(1119, 'Nurokhman', '80013000070', '$2y$12$NQkPdSncqAuEmCqqro1iFeA8pbParQf7z2wVQv9CSi9mK.cpxMOqq', 'user', '2025-08-22 09:09:03', '2025-08-22 09:09:03', 59, 'BRI Unit Losari 1', NULL),
(1120, 'Nurudin', '80013000071', '$2y$12$dvAzsOCCq3wLWPiRRWj2LuSvl9GB2FIIVweXUZbGHrfBVqXE55/vS', 'user', '2025-08-22 09:09:03', '2025-08-22 09:09:03', 59, 'BRI Unit Losari 1', NULL),
(1121, 'Mohammad Arif Farizqi', '80013000072', '$2y$12$XT8y02L31U5gIfaEsYeR/uuCSU0MoyI4uSn21HVoWvb6QSMzf7XAK', 'user', '2025-08-22 09:09:04', '2025-08-22 09:09:04', 59, 'BRI Unit Losari 1', NULL),
(1122, 'Muhammad Bukhori', '80013000073', '$2y$12$El1SDwZP6uQrDoVzxK4jQen6nJAoKrk24pQw8guFLd3jaBdaQZurK', 'user', '2025-08-22 09:09:04', '2025-08-22 09:09:04', 59, 'BRI Unit Losari 2', NULL),
(1123, 'Adi Susilo', '80013000074', '$2y$12$srPyHucZttnwPUlG.smIzeT4DBYy495jOs9szbWaPTRYILUFFy3Kq', 'user', '2025-08-22 09:09:04', '2025-08-22 09:09:04', 59, 'BRI Unit Losari 2', NULL),
(1124, 'Teuku Rensa Septian', '80013000075', '$2y$12$YqyuV7Y8Lk65KvBQIAYz3ej9KW7EjTTFue2oNXE86ZrubFcbrp7uq', 'user', '2025-08-22 09:09:05', '2025-08-22 09:09:05', 59, 'BRI Unit Losari 2', NULL),
(1125, 'Warji', '80013000076', '$2y$12$pNptv1j.rf0vz4sTRfNhpesiymgrppMkjovBUmIS2R3wU3ql5a.Vu', 'user', '2025-08-22 09:09:05', '2025-08-22 09:09:05', 59, 'BRI Unit Luwunggede', NULL),
(1126, 'Muhamad Faozan', '80013000077', '$2y$12$Vz3vXdVH6osKknujuNBKjOL0fU.xuTHo/59YHO.n4Nzyb0M4OUKoC', 'user', '2025-08-22 09:09:05', '2025-08-22 09:09:05', 59, 'BRI Unit Luwunggede', NULL),
(1127, 'Ghozali Al Hilal', '80013000078', '$2y$12$.eokbizE1xAuLOH3OlqhZu5VRaQtG8sfFtLPHjO4Vhxaff3Fjrep.', 'user', '2025-08-22 09:09:06', '2025-08-22 09:09:06', 59, 'BRI Unit Luwunggede', NULL),
(1128, 'Muhamad Fuad', '80013000079', '$2y$12$kOmV7PZSA9UC3LKW4wNTkuiSu5yBnn443.RRP91JAmilfa8nadmqq', 'user', '2025-08-22 09:09:06', '2025-08-22 09:09:06', 89, 'BRI Unit Negla', NULL),
(1129, 'Wihendar', '80013000080', '$2y$12$RG93Top9es2D/TX3cAKIAeNG4PDUBkrJ6zmmhlJJ8.8gVee1CaE7.', 'user', '2025-08-22 09:09:06', '2025-08-22 09:09:06', 89, 'BRI Unit Negla', NULL),
(1130, 'Choirul Ashidiq', '80013000081', '$2y$12$R5cTPPHrb8JtWUYR75aFxumFhfjegDlru5Qzf4CB5m1VN/Acj3KrO', 'user', '2025-08-22 09:09:07', '2025-08-22 09:09:07', 59, 'BRI Unit Pasarbatang 1', NULL),
(1131, 'Eko Bagus Prasojo', '80013000082', '$2y$12$nRz90QfAC3bav9IPkq83tePrQUK/W.6hIBQpq6Nm6YkjLlXDJyLLy', 'user', '2025-08-22 09:09:07', '2025-08-22 09:09:07', 89, 'BRI Unit Pasarbatang 1', NULL),
(1132, 'Rizal Bektiono', '80013000083', '$2y$12$7czU3E6yqzYpAhNqU8pvZ.uXVJutZ01zJTri2b5o1Ezrf1q4v5kRO', 'user', '2025-08-22 09:09:07', '2025-08-22 09:09:07', 89, 'BRI Unit Pasarbatang 1', NULL),
(1133, 'Ade Tri Fani', '80013000084', '$2y$12$ggf47LPs/MWp7lBSw2M33uT/8OUExY2ppwosn5Jc3ANy9aZRje/yy', 'user', '2025-08-22 09:09:08', '2025-08-22 09:09:08', 59, 'BRI Unit Pasarbatang 2', NULL),
(1134, 'Yulianto ', '80013000085', '$2y$12$fhpW9pe6gV3wUkWwGlNLA.o5VbmrmjW/2/5CjRKvyvzS.r6iheAFe', 'user', '2025-08-22 09:09:08', '2025-08-22 09:09:08', 59, 'BRI Unit Pasarbatang 2', NULL),
(1135, 'Candra Bagas Yudistira', '80013000088', '$2y$12$kZRe066CVIBsKqhmRkBLcOmtZUW9X6uBhVl4ZOtJ7OwoVT76zwwDG', 'user', '2025-08-22 09:09:08', '2025-08-22 09:09:08', 89, 'BRI Unit Pende', NULL),
(1136, 'Reyhan Suryo Wibowo', '80013000089', '$2y$12$BypbPfC3FsMBNpzYiAvc4.ivXDpP0mCYUR8tIdNVTZiU0KwLLUqOq', 'user', '2025-08-22 09:09:08', '2025-08-22 09:09:08', 59, 'BRI Unit Pesantunan', NULL),
(1137, 'M. Lutfi Maulana Hasanudin', '80013000090', '$2y$12$2mBnWcI8nOICmOna6ydMOeemJyxv/iDB.1vCH4EkCqU5AevAGHm/6', 'user', '2025-08-22 09:09:09', '2025-08-22 09:09:09', 59, 'BRI Unit Pesantunan', NULL),
(1138, 'Tofik Nirwana Sandi', '80013000091', '$2y$12$HPdzOVoQjy6/gLLoIqyzt.EtDSw8GkFS7qNWLzHjeMI1urm9rVGBC', 'user', '2025-08-22 09:09:09', '2025-08-22 09:09:09', 59, 'BRI Unit Pesantunan', NULL),
(1139, 'Mohammad Rizqi Lukman Hakim', '80013000092', '$2y$12$BwrKP/cBH0FRmyk1nFoxA.VAWzUT0ruRC.j9wKzaYp1kAtSicgcVK', 'user', '2025-08-22 09:09:09', '2025-08-22 09:09:09', 59, 'BRI Unit Pesantunan', NULL),
(1140, 'Nur Faizal', '80013000093', '$2y$12$krT3iWWlfFrNaDZkirGoRu9Qc0XHWDv3hwEoSJ7v.N1FY4Bz/Qk8i', 'user', '2025-08-22 09:09:10', '2025-08-22 09:09:10', 59, 'BRI Unit Sitanggal', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`, `departemen_id`, `unit_kerja`, `profile_photo_path`) VALUES
(1141, 'Mufa Dlol Furqon Haqi', '80013000094', '$2y$12$x9STuf0hx2zy0YGXHGS3H.JTiXA1u.sek7DUzr2F6c/wg.A4wkey6', 'user', '2025-08-22 09:09:10', '2025-08-22 09:09:10', 59, 'BRI Unit Sitanggal', NULL),
(1142, 'Bimo Aji Nugroho', '80013000095', '$2y$12$OVt1L5B4jjoTF7EX3foN.OVPnSiZxw.yCCEKC0pp.ssIqfWO8wglO', 'user', '2025-08-22 09:09:10', '2025-08-22 09:09:10', 59, 'BRI Unit Sitanggal', NULL),
(1143, 'Sutrimo', '80013000096', '$2y$12$jHOxWT/VTVnQRbqB0bLTdud.zXS4E2NQRhpxxQ.ykwJtEL/wtuNQq', 'user', '2025-08-22 09:09:11', '2025-08-22 09:09:11', 59, 'BRI Unit Tanjung', NULL),
(1144, 'Ade Imawan Wahyudi', '80013000098', '$2y$12$72EORFiLVOZaO.l/qlKT6eIjLNdilMW9XXZtNRPMdRmIL3OlYExIS', 'user', '2025-08-22 09:09:11', '2025-08-22 09:09:11', 59, 'BRI Unit Tanjung', NULL),
(1145, 'Rizky Rivaldy', '80013000099', '$2y$12$650PTy3DoL9LfgOo5hw5Q.iFyw8sf8FBVBtXx0BWkrd55/7gX7pN2', 'user', '2025-08-22 09:09:11', '2025-08-22 09:09:11', 59, 'BRI Unit Bandungsari', NULL),
(1146, 'Dzaki Ausaf Pratama M', '80013000100', '$2y$12$qH19cwBNmMzH.D7k0ZtTZ.WHL0ZFXNrDedBdjNnhlEpH/a4tIS.1S', 'user', '2025-08-22 09:09:11', '2025-08-22 09:09:11', 59, 'BRI Unit Larangan', NULL),
(1147, 'Dedi Arifin', '80013000101', '$2y$12$Ryj8/qbidXKUJasygxcWv.OMu46o38.B3aBDU5pNiZgHfJwpDbsk2', 'user', '2025-08-22 09:09:12', '2025-08-22 09:09:12', 59, 'BRI Unit Krasak', NULL),
(1148, 'Ade Kurniawan', '80013000102', '$2y$12$Rp3iRJxVpchi8UrPAVV4Pe1dsarzzIecOonDC612bst8B/0TaGEk.', 'user', '2025-08-22 09:09:12', '2025-08-22 09:09:12', 59, 'BRI Unit Banjarharjo', NULL),
(1149, 'Bilal Miftakhul Janah', '80013000103', '$2y$12$fWNHoPllqi/b9tsPy5vlv.uOjAwNyXshvrYdXag5O7eDq4qspj1Qq', 'user', '2025-08-22 09:09:12', '2025-08-22 09:09:12', 59, 'BRI Unit Buaran', NULL),
(1150, 'Rifal Faris Sandi', '80013000104', '$2y$12$sComnQasQPyB/m7cR2CQ2egsBGUlFf9ZB54sy0aeb525MJ8yyjS9e', 'user', '2025-08-22 09:09:13', '2025-08-22 09:09:13', 59, 'BRI Unit Kemurang Wetan', NULL),
(1151, 'Agus Jamalludin', '80013000105', '$2y$12$jfgUu8CEuBwWUFrTr2bh1Od/Ko79/SVh730YtltNpC1hPPS2T.OgC', 'user', '2025-08-22 09:09:13', '2025-08-22 09:09:13', 59, 'BRI Unit Losari 2', NULL),
(1152, 'Akhmad Azizi', '80013000106', '$2y$12$/lVVT6W.dKX2u5bFi7GlCeucJwctmmKvztGb2HCByUzIyom1Rw4QS', 'user', '2025-08-22 09:09:13', '2025-08-22 09:09:13', 59, 'BRI Unit Pasarbatang 2', NULL),
(1153, 'Alvin Nur Iman', '80013000107', '$2y$12$J3BO.wg2Yhii0WdJfRkwXuVXnv0ywrytYaC/3EAUwSZGIJ8PiJ0jO', 'user', '2025-08-22 09:09:14', '2025-08-22 09:09:14', 59, 'BRI Unit Pesantunan', NULL),
(1154, 'Wahyudin Hidayat Pulu', '80016000001', '$2y$12$/upzpm0qMqgqgCBNJEhKpe5Zmb3nq3OGTq7eYD7kOEGXPiIIB0OZi', 'user', '2025-08-22 09:09:14', '2025-08-22 09:09:14', 53, 'Bidang Bimas Islam', NULL),
(1155, 'M. Ainul Khabib', '80016000002', '$2y$12$qB5uPphhWg08p7LIy8pZJekzg79gCpkGNHq7TvpH2aQiKpw2r3/t.', 'user', '2025-08-22 09:09:14', '2025-08-22 09:09:14', 29, 'Bidang Pendidikan Islam', NULL),
(1156, 'Febriansyah', '80017000001', '$2y$12$7Cyj2CpcA2EIDPZORFL2SeTUd6EhCIADOm1/JvQK.oIukWk33crka', 'user', '2025-08-22 09:09:15', '2025-08-22 09:09:15', 92, 'PT Masterista Solusi Foodservis', NULL),
(1157, 'Ilham Chaerol Bhasri', '80017000002', '$2y$12$lmS9o4oRYmA8m4SNlvVNMO1vVZsD4HzoH/Axf2gzhh2FOw1AslGNS', 'user', '2025-08-22 09:09:15', '2025-08-22 09:09:15', 59, 'PT Masterista Solusi Foodservis', NULL),
(1158, 'Mahatir Muhammad', '80018000001', '$2y$12$zQ8GJ1mHWfzPz5DS5deHaOMa8NnWg.Veu88XVTm.3fT1AKItLNvIK', 'user', '2025-08-22 09:09:15', '2025-08-22 09:09:15', 59, 'Maxima Laboratorium Klinik', NULL),
(1159, 'Ryan Hidayat', '80018000002', '$2y$12$6BQo.7uMXii294AfFfsK0.91H9u8X/pnS53dlQQitR5E92Iwo.YaK', 'user', '2025-08-22 09:09:15', '2025-08-22 09:09:15', 59, 'Maxima Laboratorium Klinik', NULL),
(1160, 'Ramayadi', '80018000003', '$2y$12$ks1ehG3llmx.YWnD0bPT4OAEjYNw0NVTWyfSdwUsIgOY0PfpqNdSq', 'user', '2025-08-22 09:09:16', '2025-08-22 09:09:16', 59, 'Maxima Laboratorium Klinik', NULL),
(1161, 'Muharri Sharif, S.Kom', '80019000001', '$2y$12$0B2MBCN.1Lj4St4wzLi15O/OLU2/ZvQhLIiP6dxClIPJ.4cwttIlO', 'user', '2025-08-22 09:09:16', '2025-08-22 09:09:16', 93, 'Kantor Pusat', NULL),
(1162, 'Fatur Waly Ghifari', '81002000001', '$2y$12$uR7VVdFvo2hstW5fiV07Cu.sGvCexAbGFPQzpZzgAvEoDkrZ10U56', 'user', '2025-08-22 09:09:16', '2025-08-22 09:09:16', 29, 'Kantor Pusat BRI', NULL),
(1163, 'Hidayaturrahman', '81003000001', '$2y$12$4dANtddhHN4MLHo39NNRYe31E7nnUKAvaQmymvY7fJO/uLWcocltO', 'user', '2025-08-22 09:09:17', '2025-08-22 09:09:17', 53, 'PKSS Banjarmasin', NULL),
(1164, 'Muhammad Al-hasan', '81003000002', '$2y$12$N4QgXssBJvPkd2WJyeR2duJpJMop8SPN0cIy5JfLTjO5HThN5rfie', 'user', '2025-08-22 09:09:17', '2025-08-22 09:09:17', 75, 'Kantor Pusat', NULL),
(1165, 'Siti Nuranisa', '81008000001', '$2y$12$6eoj/.PUw/Wb/exP64oKWuWNtVNm3aQq5LKUwZlzUNmVbWGbLFD7W', 'user', '2025-08-22 09:09:17', '2025-08-22 09:09:17', 85, 'BRI Kantor Pusat', NULL),
(1166, 'Andi Muhammad Alifikri', '81008000002', '$2y$12$5eJel2Aysa2PP6ZHLcXq2udsJ0fOLnqyZTCGKBATgRFopdevJCS22', 'user', '2025-08-22 09:09:18', '2025-08-22 09:09:18', 85, 'BRI Kantor Pusat', NULL),
(1167, 'Ahmad Mualim', '81009000001', '$2y$12$FRxKLJQ9jK1soVfLsqVCVODmSHg9L5Mv1caLtNFmHYdLi/hGiU0U6', 'user', '2025-08-22 09:09:18', '2025-08-22 09:09:18', 29, 'Kantor Pusat BRI', NULL),
(1168, 'S. Bona Barita', '81010000001', '$2y$12$KHNrv6veWuKG9vVSIQLvK.eGizH9V0wwNNAjwWUgPQQtCyoqJMxem', 'user', '2025-08-22 09:09:18', '2025-08-22 09:09:18', 29, 'Kantor Pusat Koperasi', NULL),
(1169, 'Budi Prastiono', '81014000001', '$2y$12$4mKY6ckkYaClsfS.aO9IYunMQkwwLQI9GaKzqom0ShV93uVrtbICi', 'user', '2025-08-22 09:09:19', '2025-08-22 09:09:19', 59, 'BRI KC Madiun', NULL),
(1170, 'Refaldy Widya Putra', '81014000002', '$2y$12$/j8uvLnwFRcE2OGHdswfOuDNq1/MJ/ROWDRzTePBMTasVAmNjmTCa', 'user', '2025-08-22 09:09:19', '2025-08-22 09:09:19', 59, 'BRI KC Madiun', NULL),
(1171, 'Toni Adi Tiya', '81014000003', '$2y$12$E7usoPy1HHIGukVjmr.Rfeo2i46MlGJ03KqtHftYCX3Npt99BpItG', 'user', '2025-08-22 09:09:19', '2025-08-22 09:09:19', 59, 'BRI KC Madiun', NULL),
(1172, 'Yudo Prakoso Suwandi', '81014000004', '$2y$12$kyNCCHIY3NOT49bjEMlf..uGMP6pYGDfCfFjMh47EHFw71fmFLWa6', 'user', '2025-08-22 09:09:19', '2025-08-22 09:09:19', 59, 'BRI KC Madiun', NULL),
(1173, 'Dony Bagus Indarwanto', '81014000005', '$2y$12$sVAyNSVWzZdXDGgfVAPquuIzRJW2hKygNTr1z9ZwcHQIS3gMUF9VC', 'user', '2025-08-22 09:09:20', '2025-08-22 09:09:20', 89, 'BRI KC Madiun', NULL),
(1174, 'Fatqurochman', '81014000006', '$2y$12$wQwdPw95qxzaWgF.DZ6LgeYmPvlYPs68n.1z3mwW6DyUdOvyBjfQ6', 'user', '2025-08-22 09:09:20', '2025-08-22 09:09:20', 89, 'BRI KC Madiun', NULL),
(1175, 'Giyatno', '81014000007', '$2y$12$r1wyQPp7iFW3ikI/rNnzR.RHxxhfg7WxRBZWyOmFebCsDQpnbP.am', 'user', '2025-08-22 09:09:20', '2025-08-22 09:09:20', 89, 'BRI KC Madiun', NULL),
(1176, 'Sukowo', '81014000008', '$2y$12$Ma2gXym0fAg2N6QEJMuZ.uMF5mz6nRkLBIp/BJ3WE/2JT4/00F.u6', 'user', '2025-08-22 09:09:21', '2025-08-22 09:09:21', 91, 'BRI KC Madiun', NULL),
(1177, 'Yayan Ramandika', '81014000009', '$2y$12$qhexMjgnXxfn7TUQq3UgB.WkjEthXiBXZeD8qrtKFajqnNeh3odYi', 'user', '2025-08-22 09:09:21', '2025-08-22 09:09:21', 94, 'Madiun', NULL),
(1178, 'Jainal Arifin', '81014000010', '$2y$12$w4Ydm/GrzwRD38yBna216O53fk1UvgHHOfNhc8gJNzUf9qvAr3SHO', 'user', '2025-08-22 09:09:21', '2025-08-22 09:09:21', 94, 'Madiun', NULL),
(1179, 'Septian Aldho Mukti Arifin', '81014000011', '$2y$12$M1uB7kPVHRbFhCFniIjZLO0FfquzgH5ZupDiX6TWP7rzvxpk/XIPC', 'user', '2025-08-22 09:09:22', '2025-08-22 09:09:22', 94, 'Madiun', NULL),
(1180, 'Purnomo', '81014000012', '$2y$12$evPJb8hqH60yrtlwrK611ueLxcXjQ2zEkgaO3YhNbEljxv9im7swy', 'user', '2025-08-22 09:09:22', '2025-08-22 09:09:22', 59, 'BRI KCP Caruban', NULL),
(1181, 'Ahmat Sujarwo', '81014000013', '$2y$12$qgSVMFefKhF5xO.wD7zNDOaP4EL68wkWFmVDWLM5TFBwF9IkwBgmy', 'user', '2025-08-22 09:09:22', '2025-08-22 09:09:22', 89, 'BRI KCP Caruban', NULL),
(1182, 'Ardy Kurniawan', '81014000014', '$2y$12$CduDaMH0v.AFGe1dhMAxJuRw.WeY8iif5NkFT4k2P2mwEhu8nycOC', 'user', '2025-08-22 09:09:23', '2025-08-22 09:09:23', 59, 'BRI KCP Dolopo', NULL),
(1183, 'Hari Prasetiyo', '81014000015', '$2y$12$rOYW16TlI7LtMeh1mglyHuwABkR6x8.ayW9kdyQq9OSfb7Onta5OG', 'user', '2025-08-22 09:09:23', '2025-08-22 09:09:23', 59, 'BRI KCP Dolopo', NULL),
(1184, 'Mukti Prasetyono', '81014000016', '$2y$12$EwiOg/QyYRTehn/d6ecx8OsGwSxfhAoeI7.Y8alRDU9q0bYZye5FS', 'user', '2025-08-22 09:09:23', '2025-08-22 09:09:23', 59, 'BRI KCP Sudirman', NULL),
(1185, 'Aris Mario Cahyanto', '81014000017', '$2y$12$Km.7C/I/reXWFNoB9hdSSeONlvmi0D/xYljFiLgPy6nbyQ.v27cBe', 'user', '2025-08-22 09:09:24', '2025-08-22 09:09:24', 59, 'BRI Unit Aloon-Aloon Madiun', NULL),
(1186, 'Sulis Setyono', '81014000018', '$2y$12$enQrXy8VLyJpkGLpTSG1juZe4qM/duSwi2Avh4sMNR0fryDUpvWne', 'user', '2025-08-22 09:09:24', '2025-08-22 09:09:24', 89, 'BRI Unit Aloon-Aloon Madiun', NULL),
(1187, 'Catur Santoso', '81014000019', '$2y$12$W9RxKg.xxA5Sr/enF2Lt7OpvRcTw/u2DmtgEzj1M6TZjGy4I.ViDS', 'user', '2025-08-22 09:09:24', '2025-08-22 09:09:24', 59, 'BRI Unit Bale Lintang', NULL),
(1188, 'Muhammad Jamroni', '81014000020', '$2y$12$qVSlLAZAr58MDTF0Bs9Us.H3odoT6IRMICmBsccT.QbmdS/XYRMtm', 'user', '2025-08-22 09:09:24', '2025-08-22 09:09:24', 59, 'BRI Unit Bale Lintang', NULL),
(1189, 'Julian Enggal Susilo Pradana', '81014000021', '$2y$12$wL6IJVomigrrtnksLLMyfOCIvUPrnrROPMm3A9uCm7xlqS4c1wfjy', 'user', '2025-08-22 09:09:25', '2025-08-22 09:09:25', 59, 'BRI Unit Balerejo Madiun', NULL),
(1190, 'Heru Prasetiyo', '81014000022', '$2y$12$lppdX5RpHFbSp3m56rsbuu4Lq3R7CObR8SsAt2SDM1y2oPaql0mlm', 'user', '2025-08-22 09:09:25', '2025-08-22 09:09:25', 89, 'BRI Unit Balerejo Madiun', NULL),
(1191, 'Achmad Gilang Maulana', '81014000023', '$2y$12$twfzF6OxXW.EMsLBw9b8Jedg4L7ekWNjn2zViR.gJGNhHPpqe4Pey', 'user', '2025-08-22 09:09:25', '2025-08-22 09:09:25', 59, 'BRI Unit Caruban', NULL),
(1192, 'Rudianto', '81014000024', '$2y$12$oUImHRkFYkRST989Lk8fCezvSv/bB.weZ9R9vEhHGoj8YhFLYgUSS', 'user', '2025-08-22 09:09:26', '2025-08-22 09:09:26', 89, 'BRI Unit Caruban', NULL),
(1193, 'Puji Widodo Asmoro', '81014000025', '$2y$12$S.lxT0NTZk4s/mE6SVNvGOO5m4CTgqVn0juDAs5FdLv4z.td1o4m.', 'user', '2025-08-22 09:09:26', '2025-08-22 09:09:26', 59, 'BRI Unit Dagangan Madiun', NULL),
(1194, 'Tri Wahyudi', '81014000026', '$2y$12$WC5GaPYz2PZyf2Pkmdm6ued9EjDKf433a6abhDroBISTX8yfYvcK6', 'user', '2025-08-22 09:09:26', '2025-08-22 09:09:26', 89, 'BRI Unit Dagangan Madiun', NULL),
(1195, 'Handy Dillisan', '81014000027', '$2y$12$NeqBulAU7CS8K7LyB6v.Q.WYQRrNycuuWnKiM.GIB375GufkO3H1C', 'user', '2025-08-22 09:09:27', '2025-08-22 09:09:27', 59, 'BRI Unit Diponegoro Madiun', NULL),
(1196, 'Satria Nugraha', '81014000028', '$2y$12$YX8.osG5z7C2FLdKzwPFW.IH00SnoOWCY65q3wHB/IpyhRU.p3xbu', 'user', '2025-08-22 09:09:27', '2025-08-22 09:09:27', 89, 'BRI Unit Diponegoro Madiun', NULL),
(1197, 'Catur Saputro', '81014000029', '$2y$12$jSeotGHTPtvIhTiUwuIeT.Jt1nIJowXfcvmVNzoCT5aEoYwI0t0PO', 'user', '2025-08-22 09:09:27', '2025-08-22 09:09:27', 59, 'BRI Unit Dolopo', NULL),
(1198, 'Shokip', '81014000030', '$2y$12$dQAHByXoLUzMC24ykXAvkOW3djspcL/xLzDBFTPKWL5i6jW6W6Eu.', 'user', '2025-08-22 09:09:27', '2025-08-22 09:09:27', 59, 'BRI Unit Dolopo', NULL),
(1199, 'Muhammad Sholihin', '81014000031', '$2y$12$BunMLUAeJJMVW39eVMV6RODLJKaGGG0CMN.kquDHWf8CV/PvhCD.C', 'user', '2025-08-22 09:09:28', '2025-08-22 09:09:28', 59, 'BRI Unit Dungus Madiun', NULL),
(1200, 'Visen Faisal', '81014000032', '$2y$12$dZ4QsskXQMDzV3L86yYOgOripaw8muEB5wIJ2fZ8dVDsDSoMTNqti', 'user', '2025-08-22 09:09:28', '2025-08-22 09:09:28', 59, 'BRI Unit Dungus Madiun', NULL),
(1201, 'Saiman', '81014000033', '$2y$12$lC9x7hwMrYga0A474JpxxOo11K.EmdGvm5PwCwiZGrilN2H/Ry/.y', 'user', '2025-08-22 09:09:28', '2025-08-22 09:09:28', 89, 'BRI Unit Gantrung Madiun', NULL),
(1202, 'Arif Bahrowi', '81014000034', '$2y$12$czSC/xfCjXczIOu5NWyFEulwBl1s4vJject1CU5ByKKnpFeN5Rikq', 'user', '2025-08-22 09:09:29', '2025-08-22 09:09:29', 89, 'BRI Unit Gantrung Madiun', NULL),
(1203, 'Pupung Heri Purnomo', '81014000035', '$2y$12$idZ7Pz6l7tgvrYeAcqAdw.oEyyjgEI9meS99IuHriwElz57fRL2Bm', 'user', '2025-08-22 09:09:29', '2025-08-22 09:09:29', 59, 'BRI Unit Gemarang Madiun', NULL),
(1204, 'Hari Subiyantoro', '81014000036', '$2y$12$/VJWeGB2fY1Jbp6S7Brb1OfFo9kcZ9xn8222tCsl445/36GFEkK8.', 'user', '2025-08-22 09:09:29', '2025-08-22 09:09:29', 89, 'BRI Unit Gemarang Madiun', NULL),
(1205, 'Giastindo Carfika Fernando', '81014000037', '$2y$12$0auuQOPubkuCdDJZwDAOq.RuqY/LG6ywgQBQF.B40Pqnv2uS5vN1.', 'user', '2025-08-22 09:09:30', '2025-08-22 09:09:30', 59, 'BRI Unit Jiwan Madiun', NULL),
(1206, 'Ibnul Qayyim Anshari', '81014000038', '$2y$12$w4XCrJIKpGjfcsR8Kub.7O7.NYv/WLrayJhjcC38C8.4s8qIlwREC', 'user', '2025-08-22 09:09:30', '2025-08-22 09:09:30', 89, 'BRI Unit Jiwan Madiun', NULL),
(1207, 'Riyanto', '81014000039', '$2y$12$ClPnPBzaGDok9XjS9FdN0OwbZo9bhyF1V.8KS3m1gtU3Zwg2.JI4u', 'user', '2025-08-22 09:09:30', '2025-08-22 09:09:30', 59, 'BRI Unit Kare Madiun', NULL),
(1208, 'Ahmad Hanafi', '81014000040', '$2y$12$y8JtzC0R7ICaSPdeLRHX/epCO2OpgcmwvM5h3DCPh01NfJg2XDpd.', 'user', '2025-08-22 09:09:31', '2025-08-22 09:09:31', 59, 'BRI Unit Kebonsari Madiun', NULL),
(1209, 'Ratno Widya', '81014000041', '$2y$12$QFxfsgorzWKM/VZKI2YCjeL7DEgY3ueXitA2OEZ5KXC7eOtJ8cCJu', 'user', '2025-08-22 09:09:31', '2025-08-22 09:09:31', 89, 'BRI Unit Kebonsari Madiun', NULL),
(1210, 'Dona Rastra Sena', '81014000042', '$2y$12$d1E.4cOrLlCKIMTtIQl3uukmKjSpdqdtTwNJA6I29Jy7QmyHuomZG', 'user', '2025-08-22 09:09:31', '2025-08-22 09:09:31', 59, 'BRI Unit Mejayan Madiun', NULL),
(1211, 'Satriyo Budi Harjo', '81014000043', '$2y$12$WpFCyqVLSvTpS7y3v4E9IesxBkBufcvBestu7ZXyb/gM/7pOO./5S', 'user', '2025-08-22 09:09:31', '2025-08-22 09:09:31', 59, 'BRI Unit Mejayan Madiun', NULL),
(1212, 'Rudi Setiawan', '81014000044', '$2y$12$cw4wlcV3OqKzS8y6Kjm3kuqYu0k93cYTdYpQEoDH4ZB8QNGDUYdES', 'user', '2025-08-22 09:09:32', '2025-08-22 09:09:32', 59, 'BRI Unit Milir Madiun', NULL),
(1213, 'Ryan Prayogo', '81014000045', '$2y$12$rrvVbcgE4rJLHbMw457SKeMq/yTBHwjy91UtFO1ZhSwyZxze0mKhO', 'user', '2025-08-22 09:09:32', '2025-08-22 09:09:32', 59, 'BRI Unit Milir Madiun', NULL),
(1214, 'Catur Karyono', '81014000046', '$2y$12$0Be2hB5dlTcywy2jq3rCMebn3rjDXM2HPNDM83wklZctS.CM38/OC', 'user', '2025-08-22 09:09:32', '2025-08-22 09:09:32', 59, 'BRI Unit Muneng Madiun', NULL),
(1215, 'Nanang', '81014000047', '$2y$12$YjMUm26oN/jpuOLLaRt8R.nSgR5gRcQfDbG8.3wdgViC0QpN.7SIi', 'user', '2025-08-22 09:09:33', '2025-08-22 09:09:33', 59, 'BRI Unit Muneng Madiun', NULL),
(1216, 'Heri Setia Budi', '81014000048', '$2y$12$dMuMdCs77RVK1NKk45XfIOmmxhcrgoMTZrFxEKb1Tyl802o13gQXS', 'user', '2025-08-22 09:09:33', '2025-08-22 09:09:33', 59, 'BRI Unit Nglames Madiun', NULL),
(1217, 'Pramono', '81014000049', '$2y$12$Qd.A7V7ww8XMSViJmNrjNucYCCmk1JE4zsZGKVZfrPLaSGo31SSyC', 'user', '2025-08-22 09:09:33', '2025-08-22 09:09:33', 89, 'BRI Unit Nglames Madiun', NULL),
(1218, 'Dhedy Wahyu Nurcahyanto', '81014000050', '$2y$12$ZbiSE8wg/3bo82chSfiFJuVEDqV7rwWFPVZISqvIDFWszgEkvqztK', 'user', '2025-08-22 09:09:34', '2025-08-22 09:09:34', 59, 'BRI Unit Perintis Kemerdekaan Madiun', NULL),
(1219, 'Luki Dwi Cahyono', '81014000051', '$2y$12$4/LoX4MPWEcWAWw4WAqTOuLSuQQny60gTb0qVFv1S6nAAPtn/bMQK', 'user', '2025-08-22 09:09:34', '2025-08-22 09:09:34', 59, 'BRI Unit Perintis Kemerdekaan Madiun', NULL),
(1220, 'Dimas Maryanto', '81014000052', '$2y$12$N6yx21GsUkx99f/Ch156VO1ZZO2/njYJIpoGPjqHfZiNDx.HfE0TC', 'user', '2025-08-22 09:09:34', '2025-08-22 09:09:34', 59, 'BRI Unit Pilangkenceng Madiun', NULL),
(1221, 'Suyatno', '81014000053', '$2y$12$jN/fb5rFoOezHloAWq8MVeavRfDVfbsRcX6L73h0ptBKy9BHFZqm.', 'user', '2025-08-22 09:09:35', '2025-08-22 09:09:35', 89, 'BRI Unit Pilangkenceng Madiun', NULL),
(1222, 'Agung Henri Suseno', '81014000054', '$2y$12$n2Ic/5XqfD0S79MoeHqeW.gSzAeMeYDstjxXJ0d.6dFUc3bbVRlgW', 'user', '2025-08-22 09:09:35', '2025-08-22 09:09:35', 59, 'BRI Unit Purworejo Madiun', NULL),
(1223, 'Kholik Purwanto', '81014000055', '$2y$12$QK3vVtEs/YIhU.alul4rvOdXCVB7vVkaMfvvjQUk68oxRFbVr70oK', 'user', '2025-08-22 09:09:35', '2025-08-22 09:09:35', 59, 'BRI Unit Saradan Madiun', NULL),
(1224, 'Darminto', '81014000056', '$2y$12$gPVhkO3ihq5ndHwUTFLKe.7RnEY09V5kd.LHE7WFHlS.3WTE7sHhG', 'user', '2025-08-22 09:09:35', '2025-08-22 09:09:35', 89, 'BRI Unit Saradan Madiun', NULL),
(1225, 'Cahya Andika Putra', '81014000057', '$2y$12$KaATtXIFgLPFZ7F5Gzr.hugIJCb7DPAb1XXk5RPrW.LVNp0dBEYFy', 'user', '2025-08-22 09:09:36', '2025-08-22 09:09:36', 59, 'BRI Unit Sawahan Madiun', NULL),
(1226, 'Sudarmanto', '81014000058', '$2y$12$JedTPs0GrMYlnvm7jcn5DeTOLgUoHwSZzC0ZvePejgoJRX.tYvzcm', 'user', '2025-08-22 09:09:36', '2025-08-22 09:09:36', 89, 'BRI Unit Sawahan Madiun', NULL),
(1227, 'Ade Sulis Prasetyo', '81014000059', '$2y$12$myG55WHz0Al5iz2vZUbkaO3FFobqlsKmWSfbTGdAy1tKJ/QvnBvUO', 'user', '2025-08-22 09:09:36', '2025-08-22 09:09:36', 59, 'BRI Unit Sleko Madiun', NULL),
(1228, 'Refiandri Dian Permata Putra', '81014000060', '$2y$12$ew/Y3bQpUYGN1RE1EsiKquvogfMCah/PzJI6Te2tgyrigDP27onhS', 'user', '2025-08-22 09:09:37', '2025-08-22 09:09:37', 59, 'BRI Unit Sleko Madiun', NULL),
(1229, 'Angleng Kusuma Farkhan Efendi', '81014000061', '$2y$12$G9r2urvj35ZR71I/clUSt.uQ9cKP/y4U6YxqFZWwClUpkKQSLCLo6', 'user', '2025-08-22 09:09:37', '2025-08-22 09:09:37', 59, 'BRI Unit Uteran Madiun', NULL),
(1230, 'Danu Ilham', '81014000062', '$2y$12$WXsY8qyIPUiG9uDTMvYoX.r1I50/MOTDgnRdzGEZA52JQ0M.8a4Ji', 'user', '2025-08-22 09:09:37', '2025-08-22 09:09:37', 59, 'BRI Unit Uteran Madiun', NULL),
(1231, 'Agus Kurniawan', '81014000063', '$2y$12$tBM8jtrP8YcEetAc6u/MN.sNQR6pq3v2nOHJqTxdJ2op1XrmmmB5S', 'user', '2025-08-22 09:09:38', '2025-08-22 09:09:38', 59, 'BRI Unit Wonoasri Madiun', NULL),
(1232, 'Agus Supriyanto', '81014000064', '$2y$12$PKlLb87bMWdcln96/Cd4QuAYRGE1csM4qC3EfNEgMe9ZANRJkb.5m', 'user', '2025-08-22 09:09:38', '2025-08-22 09:09:38', 89, 'BRI Unit Wonoasri Madiun', NULL),
(1233, 'Mujiono', '81014000065', '$2y$12$EpNCDrWLkkFtZs.Vs8C7UOApRzXoXckQwiDfE457c90zpTv1Xmjj.', 'user', '2025-08-22 09:09:38', '2025-08-22 09:09:38', 89, 'BRI Unit Wungu Madiun', NULL),
(1234, 'Muhammad Soleh Hadi Prayitno', '81014000066', '$2y$12$raJuw.N3L6Ay8zuNrTkpb.WzmIUAhkH4zh4FQrIn8kRx5NtvQ39f.', 'user', '2025-08-22 09:09:38', '2025-08-22 09:09:38', 59, 'BRI KCP Sudirman', NULL),
(1237, 'User Testing', 'admin@gmail.com', '$2y$12$BcgDshNRM1nDbN/aiPrjNe7DSua8HMiVdJQdN3XjrB5j3822X8e.C', 'user', '2025-08-27 07:05:04', '2025-08-28 07:48:07', 2, 'bandung', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `departemen_modul`
--
ALTER TABLE `departemen_modul`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `departemen_modul_modul_id_foreign` (`modul_id`) USING BTREE,
  ADD KEY `departemen_modul_departemen_id_foreign` (`departemen_id`) USING BTREE;

--
-- Indexes for table `departemen_ujian`
--
ALTER TABLE `departemen_ujian`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `departemen_ujian_ujian_id_departemen_id_unique` (`ujian_id`,`departemen_id`) USING BTREE,
  ADD KEY `departemen_ujian_departemen_id_foreign` (`departemen_id`) USING BTREE;

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `hasil_ujian_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `hasil_ujian_ujian_id_foreign` (`ujian_id`) USING BTREE;

--
-- Indexes for table `jawaban_user`
--
ALTER TABLE `jawaban_user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `jawaban_user_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `jawaban_user_ujian_id_foreign` (`ujian_id`) USING BTREE,
  ADD KEY `jawaban_user_pertanyaan_id_foreign` (`pertanyaan_id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `soal_ujian_id_foreign` (`ujian_id`) USING BTREE;

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD KEY `users_departemen_id_foreign` (`departemen_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `departemen_modul`
--
ALTER TABLE `departemen_modul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `departemen_ujian`
--
ALTER TABLE `departemen_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `jawaban_user`
--
ALTER TABLE `jawaban_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1238;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departemen_modul`
--
ALTER TABLE `departemen_modul`
  ADD CONSTRAINT `departemen_modul_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `departemen_modul_modul_id_foreign` FOREIGN KEY (`modul_id`) REFERENCES `moduls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departemen_ujian`
--
ALTER TABLE `departemen_ujian`
  ADD CONSTRAINT `departemen_ujian_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `departemen_ujian_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD CONSTRAINT `hasil_ujian_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_ujian_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jawaban_user`
--
ALTER TABLE `jawaban_user`
  ADD CONSTRAINT `jawaban_user_pertanyaan_id_foreign` FOREIGN KEY (`pertanyaan_id`) REFERENCES `soal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_user_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ujian_id_foreign` FOREIGN KEY (`ujian_id`) REFERENCES `ujian` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemens` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
