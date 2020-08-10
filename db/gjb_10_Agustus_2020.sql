-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2020 at 08:53 PM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djailorg_gjb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cost_report_office`
--

CREATE TABLE `cost_report_office` (
  `cost_report_office_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `cost_expense` double NOT NULL,
  `balance` double NOT NULL,
  `cost_report_cashflow` tinyint(1) NOT NULL,
  `cost_report_office_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_report_office_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `verify_by_admin` int(11) DEFAULT NULL,
  `verify_at_admin` timestamp NULL DEFAULT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cost_report_office`
--

INSERT INTO `cost_report_office` (`cost_report_office_id`, `project_id`, `cost_expense`, `balance`, `cost_report_cashflow`, `cost_report_office_desc`, `cost_report_office_date`, `created_by`, `updated_by`, `desc`, `ver`, `status`, `verify_by_admin`, `verify_at_admin`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 100000000, 100000000, 1, 'Pemasukan Dana', '2020-08-01', NULL, NULL, NULL, 1, 1, 1, '2020-07-27 12:50:58', 0, '2020-07-27 12:50:58', '2020-07-27 12:50:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cost_report_realtime`
--

CREATE TABLE `cost_report_realtime` (
  `cost_report_realtime_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `cost_expense` double NOT NULL,
  `balance` double NOT NULL,
  `cost_report_cashflow` tinyint(1) NOT NULL,
  `cost_report_realtime_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_report_realtime_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `verify_by_admin` int(11) DEFAULT NULL,
  `verify_at_admin` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `cost_report_realtime`
--

INSERT INTO `cost_report_realtime` (`cost_report_realtime_id`, `project_id`, `cost_expense`, `balance`, `cost_report_cashflow`, `cost_report_realtime_desc`, `cost_report_realtime_date`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`, `verify_by_admin`, `verify_at_admin`, `status`) VALUES
(1, 6, 200000000, 200000000, 1, 'Saldo Awal', '2020-08-01', NULL, NULL, NULL, 1, 0, '2020-07-27 12:52:46', '2020-07-27 12:52:46', NULL, 1, '2020-07-27 12:52:46', 1),
(2, 6, 100000000, 100000000, 0, 'Setor ke kas proyek untuk pembelian Material', '2020-08-01', NULL, NULL, NULL, 1, 0, '2020-07-27 12:53:09', '2020-07-27 12:53:09', NULL, 1, '2020-07-27 12:53:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_dob` date NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `employee_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `employee_dob`, `role_id`, `employee_username`, `employee_password`, `employee_email`, `employee_phone`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin User', '1990-01-01', 1, 'adminuser', '$2y$10$v1bCPaZSbqoPpYnZbVF/lOFolUR17w9XAvHusRV8ImJRKDWKwd1ba', 'adminuser@gjb.com', '08000000000', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(2, 'karyawan 2', '2020-07-22', 2, 'karyawan 2', '$2y$10$2J3aFNUIoCaA0gjqo1W.4eVblY4laZtPyvU552xkee9U2vFhAIXfu', 'adawiyahrobiyatul24@ymail.com', '08928282', NULL, NULL, NULL, 1, 0, '2020-07-20 02:37:22', '2020-07-27 12:36:35', '2020-07-27 12:36:35'),
(3, 'Office user', '2020-07-08', 2, 'officeuser@gjb.com', '$2y$10$8yGP93rXTzepbwr8Mvqphe1tWawtHFExQ8WzmR3vOFzobfzUuRvKi', 'officeuser@gjb.com', '089282823322', NULL, NULL, NULL, 1, 0, '2020-07-21 06:35:05', '2020-07-27 12:36:39', '2020-07-27 12:36:39'),
(4, 'Projek Manajer', '2020-07-04', 3, 'projekmanajer@gjb.com', '$2y$10$9AkBs03ms2irShVWydJ/FecbbjaeKNMqvEzBLYpQR2MU7icw3K0lu', 'projekmanajer@gjb.com', '435353', NULL, NULL, NULL, 1, 0, '2020-07-21 06:35:43', '2020-07-21 06:35:43', NULL),
(5, 'Rachel', '1997-03-03', 1, 'rachel3', '$2y$10$Xf6Bhkt1PUGV/8mvb98HGOXvO9Uja3lfs6B7KE1iI3Iy1LfCTjHMq', 'rachel3@gmail.com', '087788462397', NULL, NULL, NULL, 1, 0, '2020-07-27 12:40:46', '2020-07-27 12:40:46', NULL),
(6, 'Meli', '1998-07-02', 6, 'adminmeli', '$2y$10$JpQT/Fs/RHNSd4vBk0xx6OPJ0NtG1lMH5ESXNpCpzeI14Rb1itI6O', 'adminmeli@gjb.com', '08212439987', NULL, NULL, NULL, 1, 0, '2020-07-27 12:58:03', '2020-07-27 12:58:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_report`
--

CREATE TABLE `material_report` (
  `material_report_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `material_type_id` bigint(20) UNSIGNED NOT NULL,
  `material_unit_id` bigint(20) UNSIGNED NOT NULL,
  `material_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_report_date` date NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_cost_unit` double NOT NULL,
  `material_qty` int(10) UNSIGNED NOT NULL,
  `material_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `verify_by_admin` int(255) DEFAULT NULL,
  `verify_at_admin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `material_report`
--

INSERT INTO `material_report` (`material_report_id`, `project_id`, `material_type_id`, `material_unit_id`, `material_code`, `material_report_date`, `material_name`, `material_cost_unit`, `material_qty`, `material_desc`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`, `status`, `verify_by_admin`, `verify_at_admin`) VALUES
(6, 6, 2, 6, 'AB-001', '2020-08-01', 'Excavator', 100000000, 1, 'Caterpillar', NULL, NULL, NULL, 1, 0, '2020-07-27 13:17:19', '2020-07-27 13:17:19', NULL, 1, 1, '2020-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `material_type`
--

CREATE TABLE `material_type` (
  `material_type_id` bigint(20) UNSIGNED NOT NULL,
  `material_type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `material_type`
--

INSERT INTO `material_type` (`material_type_id`, `material_type_name`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Alat Berat', NULL, NULL, NULL, 1, 0, '2020-07-27 12:31:06', '2020-07-27 12:31:06', NULL),
(3, 'Logam', NULL, NULL, NULL, 1, 0, '2020-07-27 12:31:59', '2020-07-27 12:31:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_unit`
--

CREATE TABLE `material_unit` (
  `material_unit_id` bigint(20) UNSIGNED NOT NULL,
  `material_unit_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `material_unit`
--

INSERT INTO `material_unit` (`material_unit_id`, `material_unit_name`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'm3', NULL, NULL, NULL, 1, 0, '2020-07-27 12:44:03', '2020-07-27 12:44:03', NULL),
(5, 'jam', NULL, NULL, NULL, 1, 0, '2020-07-27 12:44:19', '2020-07-27 12:44:19', NULL),
(6, 'unit', NULL, NULL, NULL, 1, 0, '2020-07-27 13:15:59', '2020-07-27 13:15:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_use`
--

CREATE TABLE `material_use` (
  `material_use_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `material_report_id` bigint(20) UNSIGNED NOT NULL,
  `material_use_date` date NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `material_cost_unit` double NOT NULL,
  `material_qty` int(10) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `residue` int(10) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `verify_by_admin` bigint(20) UNSIGNED DEFAULT NULL,
  `verify_at_admin` timestamp NULL DEFAULT NULL,
  `status` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `material_use`
--

INSERT INTO `material_use` (`material_use_id`, `project_id`, `material_report_id`, `material_use_date`, `stock`, `material_cost_unit`, `material_qty`, `total`, `residue`, `created_by`, `updated_by`, `verify_by_admin`, `verify_at_admin`, `status`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 6, 6, '2020-08-01', 1, 100000000, 1, 100000000, 0, NULL, NULL, 1, '2020-07-27 13:18:53', 1, 'Caterpillar', 1, 0, '2020-07-27 13:18:53', '2020-07-27 13:18:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `menu_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_code`, `menu_name`, `menu_link`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'home-dashboard', 'Beranda', '', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(2, 'projects', 'Proyek', 'projects', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(3, 'type-proyek', 'Tipe Proyek', 'type-proyek', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(4, 'employees', 'Karyawan', 'employees', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(5, 'roles', 'Akses Role', 'roles', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(6, 'material-type', 'Tipe Material', 'material-type', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(7, 'material-unit', 'Unit Material', 'material-unit', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_03_16_042349_create_role_table', 1),
(2, '2020_03_16_051544_create_employees_table', 1),
(3, '2020_03_16_052202_alter_employees_table_relationships', 1),
(4, '2020_03_16_052501_alter_role_table_relationships', 1),
(5, '2020_03_16_135818_create_project_types_table', 1),
(6, '2020_03_16_135850_create_project_table', 1),
(7, '2020_03_16_184648_alter_project_table_relationships', 1),
(8, '2020_03_16_185103_alter_project_type_table_relationships', 1),
(9, '2020_03_16_212622_create_project_step_table', 1),
(10, '2020_03_16_212700_create_project_employees_table', 1),
(11, '2020_03_18_114449_create_menus_table', 1),
(12, '2020_03_29_145002_create_role_access_table', 1),
(13, '2020_03_29_145850_alter_role_access_table_relationships', 1),
(14, '2020_07_02_145002_create_material_type_table', 1),
(15, '2020_07_02_145003_create_material_unit_table', 1),
(16, '2020_07_02_145005_create_material_report_table', 1),
(17, '2020_07_02_245010_create_cost_report_realtime_table', 1),
(18, '2020_07_02_345010_create_cost_report_office_table', 1),
(19, '2020_07_02_445010_create_supporting_document_table', 1),
(20, '2020_07_02_535850_alter_add_column_progress_project_table', 1),
(21, '2020_07_03_095159_create_project_substep_table', 1),
(22, '2020_07_03_095838_create_project_progress_plan_table', 1),
(23, '2020_07_03_100223_create_progress_table', 1),
(24, '2020_07_06_160714_alter_table_progress_add_column_progress_date', 1),
(25, '2020_07_24_100753_create_material_use_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id_notif` bigint(20) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_href` int(11) NOT NULL,
  `id_href_segment2` int(11) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id_notif`, `type`, `notifiable_type`, `notifiable_id`, `data`, `href`, `id_href`, `id_href_segment2`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 'Keuangan Lapangan', 'keuangan_lapangan', 1, 'Keuangan Lapangan Pemasukan Dana', '/projects/1/detail-keuangan', 1, NULL, NULL, '2020-07-27 12:50:58', '2020-07-27 12:50:58'),
(2, 'Keuangan Kantor', 'keuangan_kantor', 1, 'Keuangan Kantor Saldo Awal', '/projects/1/detail-realtime', 1, NULL, NULL, '2020-07-27 12:52:46', '2020-07-27 12:52:46'),
(3, 'Keuangan Kantor', 'keuangan_kantor', 1, 'Keuangan Kantor Setor ke kas proyek untuk pembelian Material', '/projects/2/detail-realtime', 2, NULL, NULL, '2020-07-27 12:53:09', '2020-07-27 12:53:09'),
(4, 'Keuangan Kantor Mendekati limit', 'keuangan_kantor_over', 1, 'Keuangan Kantor Rehabilitasi Jaringan Irigasi Over', '/projects/6/keuangan-nyata', 6, NULL, NULL, '2020-07-27 12:53:09', '2020-07-27 12:53:09'),
(5, 'Keuangan Kantor Mendekati limit', 'keuangan_kantor_over', 2, 'Keuangan Kantor Rehabilitasi Jaringan Irigasi Over', '/projects/6/keuangan-nyata', 6, NULL, NULL, '2020-07-27 12:53:09', '2020-07-27 12:53:09'),
(6, 'Keuangan Kantor Mendekati limit', 'keuangan_kantor_over', 3, 'Keuangan Kantor Rehabilitasi Jaringan Irigasi Over', '/projects/6/keuangan-nyata', 6, NULL, NULL, '2020-07-27 12:53:09', '2020-07-27 12:53:09'),
(7, 'Keuangan Kantor Mendekati limit', 'keuangan_kantor_over', 5, 'Keuangan Kantor Rehabilitasi Jaringan Irigasi Over', '/projects/6/keuangan-nyata', 6, NULL, NULL, '2020-07-27 12:53:09', '2020-07-27 12:53:09'),
(8, 'Laporan Material', 'laporan_material', 1, 'Laporan Material Excavator', '/projects/6/detail-material', 6, NULL, NULL, '2020-07-27 13:17:19', '2020-07-27 13:17:19'),
(9, 'Material Mendekati limit', 'laporan_material_over', 1, 'Material Mendekati limit Material Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material', 6, NULL, NULL, '2020-07-27 13:17:19', '2020-07-27 13:17:19'),
(10, 'Material Mendekati limit', 'laporan_material_over', 2, 'Material Mendekati limit Material Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material', 6, NULL, NULL, '2020-07-27 13:17:19', '2020-07-27 13:17:19'),
(11, 'Material Mendekati limit', 'laporan_material_over', 3, 'Material Mendekati limit Material Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material', 6, NULL, NULL, '2020-07-27 13:17:19', '2020-07-27 13:17:19'),
(12, 'Material Mendekati limit', 'laporan_material_over', 5, 'Material Mendekati limit Material Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material', 6, NULL, NULL, '2020-07-27 13:17:19', '2020-07-27 13:17:19'),
(13, 'Material Mendekati limit', 'laporan_material_over', 6, 'Material Mendekati limit Material Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material', 6, NULL, NULL, '2020-07-27 13:17:19', '2020-07-27 13:17:19'),
(14, 'Laporan Penggunaan Material', 'laporan_penggunaan_material', 1, 'Laporan Penggunaan Material Caterpillar', '/projects/9/detail-material-use', 9, NULL, NULL, '2020-07-27 13:18:53', '2020-07-27 13:18:53'),
(15, 'Pengunaan Material Stock Mendekati limit', 'laporan_penggunaan_material_stock_over', 1, 'Pengunaan Material Mendekati limit Material Stock Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material-use', 6, NULL, NULL, '2020-07-27 13:18:53', '2020-07-27 13:18:53'),
(16, 'Pengunaan Material Stock Mendekati limit', 'laporan_penggunaan_material_stock_over', 2, 'Pengunaan Material Mendekati limit Material Stock Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material-use', 6, NULL, NULL, '2020-07-27 13:18:53', '2020-07-27 13:18:53'),
(17, 'Pengunaan Material Stock Mendekati limit', 'laporan_penggunaan_material_stock_over', 3, 'Pengunaan Material Mendekati limit Material Stock Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material-use', 6, NULL, NULL, '2020-07-27 13:18:53', '2020-07-27 13:18:53'),
(18, 'Pengunaan Material Stock Mendekati limit', 'laporan_penggunaan_material_stock_over', 5, 'Pengunaan Material Mendekati limit Material Stock Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material-use', 6, NULL, NULL, '2020-07-27 13:18:53', '2020-07-27 13:18:53'),
(19, 'Pengunaan Material Stock Mendekati limit', 'laporan_penggunaan_material_stock_over', 6, 'Pengunaan Material Mendekati limit Material Stock Rehabilitasi Jaringan Irigasi Over', '/projects/6/laporan-material-use', 6, NULL, NULL, '2020-07-27 13:18:53', '2020-07-27 13:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progress_id` bigint(20) UNSIGNED NOT NULL,
  `project_substep_id` bigint(20) UNSIGNED NOT NULL,
  `project_step_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `week` int(10) UNSIGNED NOT NULL,
  `progress_add` double NOT NULL,
  `progress_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `progress_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`progress_id`, `project_substep_id`, `project_step_id`, `project_id`, `week`, `progress_add`, `progress_desc`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`, `progress_date`) VALUES
(1, 16, 10, 6, 1, 2, 'sesuai jadwal', NULL, NULL, NULL, 1, 0, '2020-07-27 13:09:15', '2020-07-27 13:09:15', NULL, '2020-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type_id` bigint(20) UNSIGNED NOT NULL,
  `cost_total` double NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `progress` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_type_id`, `cost_total`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`, `progress`) VALUES
(6, 'Rehabilitasi Jaringan Irigasi', 3, 2000000, NULL, NULL, NULL, 1, 0, '2020-07-27 12:49:02', '2020-07-27 12:49:02', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_employees`
--

CREATE TABLE `project_employees` (
  `project_employee_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `project_employees`
--

INSERT INTO `project_employees` (`project_employee_id`, `project_id`, `employee_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 6, 1, '2020-07-27 12:49:02', '2020-07-27 12:49:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_progress_plan`
--

CREATE TABLE `project_progress_plan` (
  `project_progress_plan_id` bigint(20) UNSIGNED NOT NULL,
  `project_substep_id` bigint(20) UNSIGNED NOT NULL,
  `project_step_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `week` int(10) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `project_progress_plan`
--

INSERT INTO `project_progress_plan` (`project_progress_plan_id`, `project_substep_id`, `project_step_id`, `project_id`, `week`, `weight`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(34, 16, 10, 6, 1, 2, NULL, NULL, NULL, 1, 0, '2020-07-27 12:49:02', '2020-07-27 12:49:02', NULL),
(35, 16, 10, 6, 2, 2, NULL, NULL, NULL, 1, 0, '2020-07-27 12:49:02', '2020-07-27 12:49:02', NULL),
(36, 17, 10, 6, 1, 2, NULL, NULL, NULL, 1, 0, '2020-07-27 12:49:02', '2020-07-27 12:49:02', NULL),
(37, 17, 10, 6, 2, 2, NULL, NULL, NULL, 1, 0, '2020-07-27 12:49:02', '2020-07-27 12:49:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_step`
--

CREATE TABLE `project_step` (
  `project_step_id` bigint(20) UNSIGNED NOT NULL,
  `project_step_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `project_step`
--

INSERT INTO `project_step` (`project_step_id`, `project_step_name`, `project_id`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Pekerjaan Persiapan', 6, NULL, NULL, NULL, 1, 0, '2020-07-27 12:49:02', '2020-07-27 12:49:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_substep`
--

CREATE TABLE `project_substep` (
  `project_substep_id` bigint(20) UNSIGNED NOT NULL,
  `project_step_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `project_substep_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_start_date` date NOT NULL,
  `estimated_end_date` date NOT NULL,
  `real_start_date` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `project_substep`
--

INSERT INTO `project_substep` (`project_substep_id`, `project_step_id`, `project_id`, `project_substep_name`, `estimated_start_date`, `estimated_end_date`, `real_start_date`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 10, 6, 'Mobilisasi dan Demobilisasi Alat', '2020-08-01', '2020-08-14', '2020-08-01', NULL, NULL, NULL, 2, 0, '2020-07-27 12:49:02', '2020-07-27 13:09:15', NULL),
(17, 10, 6, 'Kitsdam', '2020-08-14', '2020-08-28', NULL, NULL, NULL, NULL, 1, 0, '2020-07-27 12:49:02', '2020-07-27 12:49:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `project_type_id` bigint(20) UNSIGNED NOT NULL,
  `project_type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`project_type_id`, `project_type_name`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Bangunan', NULL, NULL, NULL, 1, 0, '2020-07-27 12:30:40', '2020-07-27 13:43:47', '2020-07-27 13:43:47'),
(3, 'Sipil', NULL, NULL, NULL, 1, 0, '2020-07-27 12:30:51', '2020-07-27 12:30:51', NULL),
(4, 'Bangunan', NULL, NULL, NULL, 1, 0, '2020-07-27 13:44:03', '2020-07-27 13:44:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_desc`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'Admin can access all of the features', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(2, 'Office', 'Office', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(3, 'Projek Manajer', 'Projek Manajer', NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(5, 'adm', 'can access all features', NULL, NULL, NULL, 1, 0, '2020-07-27 12:29:47', '2020-07-27 12:29:47', NULL),
(6, 'office meli', 'Office meli', NULL, NULL, NULL, 1, 0, '2020-07-27 12:55:11', '2020-07-27 12:55:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE `role_access` (
  `role_access_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_access`
--

INSERT INTO `role_access` (`role_access_id`, `role_id`, `menu_id`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(2, 1, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(3, 1, 3, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(4, 1, 4, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(5, 1, 5, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(6, 1, 6, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(7, 1, 7, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(8, 2, 1, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(9, 2, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(10, 2, 3, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(11, 2, 6, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(12, 2, 7, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(13, 3, 1, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(14, 3, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 02:28:53', '2020-07-20 02:28:53', NULL),
(15, 5, 1, NULL, NULL, NULL, 1, 0, '2020-07-27 12:29:47', '2020-07-27 12:29:47', NULL),
(16, 5, 2, NULL, NULL, NULL, 1, 0, '2020-07-27 12:29:47', '2020-07-27 12:29:47', NULL),
(17, 5, 3, NULL, NULL, NULL, 1, 0, '2020-07-27 12:29:48', '2020-07-27 12:29:48', NULL),
(18, 5, 4, NULL, NULL, NULL, 1, 0, '2020-07-27 12:29:48', '2020-07-27 12:29:48', NULL),
(19, 5, 5, NULL, NULL, NULL, 1, 0, '2020-07-27 12:29:48', '2020-07-27 12:29:48', NULL),
(20, 5, 6, NULL, NULL, NULL, 1, 0, '2020-07-27 12:29:48', '2020-07-27 12:29:48', NULL),
(21, 5, 7, NULL, NULL, NULL, 1, 0, '2020-07-27 12:29:48', '2020-07-27 12:29:48', NULL),
(22, 6, 1, NULL, NULL, NULL, 1, 0, '2020-07-27 12:55:11', '2020-07-27 12:55:11', NULL),
(23, 6, 2, NULL, NULL, NULL, 1, 0, '2020-07-27 12:55:11', '2020-07-27 12:55:11', NULL),
(24, 6, 4, NULL, NULL, NULL, 1, 0, '2020-07-27 12:55:11', '2020-07-27 12:55:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supporting_document`
--

CREATE TABLE `supporting_document` (
  `supporting_document_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `supporting_document_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supporting_document_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supporting_document_upload_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `desc` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `supporting_document`
--

INSERT INTO `supporting_document` (`supporting_document_id`, `project_id`, `supporting_document_name`, `supporting_document_path`, `supporting_document_upload_date`, `created_by`, `updated_by`, `desc`, `ver`, `delete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 6, 'Bukti Pembayaran Alat', 'public/supporting-document/oH1nz5HpV0OVCA0sRluRPC0I2K7srKuw5Y4yuZWr.jpeg', '2020-08-01', NULL, NULL, NULL, 1, 0, '2020-07-27 13:19:40', '2020-07-27 13:19:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cost_report_office`
--
ALTER TABLE `cost_report_office`
  ADD PRIMARY KEY (`cost_report_office_id`) USING BTREE,
  ADD KEY `cost_report_office_project_id_foreign` (`project_id`) USING BTREE;

--
-- Indexes for table `cost_report_realtime`
--
ALTER TABLE `cost_report_realtime`
  ADD PRIMARY KEY (`cost_report_realtime_id`) USING BTREE,
  ADD KEY `cost_report_realtime_project_id_foreign` (`project_id`) USING BTREE;

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`) USING BTREE,
  ADD UNIQUE KEY `employees_employee_username_deleted_at_unique` (`employee_username`,`deleted_at`) USING BTREE,
  ADD UNIQUE KEY `employees_employee_email_deleted_at_unique` (`employee_email`,`deleted_at`) USING BTREE,
  ADD KEY `employees_role_id_foreign` (`role_id`) USING BTREE,
  ADD KEY `employees_created_by_foreign` (`created_by`) USING BTREE,
  ADD KEY `employees_updated_by_foreign` (`updated_by`) USING BTREE;

--
-- Indexes for table `material_report`
--
ALTER TABLE `material_report`
  ADD PRIMARY KEY (`material_report_id`) USING BTREE,
  ADD KEY `material_report_project_id_foreign` (`project_id`) USING BTREE,
  ADD KEY `material_report_material_type_id_foreign` (`material_type_id`) USING BTREE,
  ADD KEY `material_report_material_unit_id_foreign` (`material_unit_id`) USING BTREE;

--
-- Indexes for table `material_type`
--
ALTER TABLE `material_type`
  ADD PRIMARY KEY (`material_type_id`) USING BTREE;

--
-- Indexes for table `material_unit`
--
ALTER TABLE `material_unit`
  ADD PRIMARY KEY (`material_unit_id`) USING BTREE;

--
-- Indexes for table `material_use`
--
ALTER TABLE `material_use`
  ADD PRIMARY KEY (`material_use_id`) USING BTREE,
  ADD KEY `material_use_project_id_foreign` (`project_id`) USING BTREE,
  ADD KEY `material_use_material_report_id_foreign` (`material_report_id`) USING BTREE;

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`) USING BTREE,
  ADD UNIQUE KEY `menus_menu_code_deleted_at_unique` (`menu_code`,`deleted_at`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notif`) USING BTREE,
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`) USING BTREE;

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`) USING BTREE,
  ADD KEY `progress_project_id_foreign` (`project_id`) USING BTREE,
  ADD KEY `progress_project_step_id_foreign` (`project_step_id`) USING BTREE,
  ADD KEY `progress_project_substep_id_foreign` (`project_substep_id`) USING BTREE,
  ADD KEY `progress_created_by_index` (`created_by`) USING BTREE,
  ADD KEY `progress_updated_by_index` (`updated_by`) USING BTREE;

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`) USING BTREE,
  ADD KEY `project_project_type_id_foreign` (`project_type_id`) USING BTREE,
  ADD KEY `project_created_by_foreign` (`created_by`) USING BTREE,
  ADD KEY `project_updated_by_foreign` (`updated_by`) USING BTREE;

--
-- Indexes for table `project_employees`
--
ALTER TABLE `project_employees`
  ADD PRIMARY KEY (`project_employee_id`) USING BTREE,
  ADD KEY `project_employees_project_id_foreign` (`project_id`) USING BTREE,
  ADD KEY `project_employees_employee_id_foreign` (`employee_id`) USING BTREE;

--
-- Indexes for table `project_progress_plan`
--
ALTER TABLE `project_progress_plan`
  ADD PRIMARY KEY (`project_progress_plan_id`) USING BTREE,
  ADD KEY `project_progress_plan_project_id_foreign` (`project_id`) USING BTREE,
  ADD KEY `project_progress_plan_project_step_id_foreign` (`project_step_id`) USING BTREE,
  ADD KEY `project_progress_plan_project_substep_id_foreign` (`project_substep_id`) USING BTREE,
  ADD KEY `project_progress_plan_created_by_index` (`created_by`) USING BTREE,
  ADD KEY `project_progress_plan_updated_by_index` (`updated_by`) USING BTREE;

--
-- Indexes for table `project_step`
--
ALTER TABLE `project_step`
  ADD PRIMARY KEY (`project_step_id`) USING BTREE,
  ADD KEY `project_step_project_id_foreign` (`project_id`) USING BTREE,
  ADD KEY `project_step_created_by_foreign` (`created_by`) USING BTREE,
  ADD KEY `project_step_updated_by_foreign` (`updated_by`) USING BTREE;

--
-- Indexes for table `project_substep`
--
ALTER TABLE `project_substep`
  ADD PRIMARY KEY (`project_substep_id`) USING BTREE,
  ADD KEY `project_substep_project_id_foreign` (`project_id`) USING BTREE,
  ADD KEY `project_substep_project_step_id_foreign` (`project_step_id`) USING BTREE,
  ADD KEY `project_substep_created_by_index` (`created_by`) USING BTREE,
  ADD KEY `project_substep_updated_by_index` (`updated_by`) USING BTREE;

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`project_type_id`) USING BTREE,
  ADD KEY `project_types_created_by_foreign` (`created_by`) USING BTREE,
  ADD KEY `project_types_updated_by_foreign` (`updated_by`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`) USING BTREE,
  ADD KEY `role_created_by_foreign` (`created_by`) USING BTREE,
  ADD KEY `role_updated_by_foreign` (`updated_by`) USING BTREE;

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
  ADD PRIMARY KEY (`role_access_id`) USING BTREE,
  ADD KEY `role_access_role_id_foreign` (`role_id`) USING BTREE,
  ADD KEY `role_access_menu_id_foreign` (`menu_id`) USING BTREE;

--
-- Indexes for table `supporting_document`
--
ALTER TABLE `supporting_document`
  ADD PRIMARY KEY (`supporting_document_id`) USING BTREE,
  ADD KEY `supporting_document_project_id_foreign` (`project_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cost_report_office`
--
ALTER TABLE `cost_report_office`
  MODIFY `cost_report_office_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cost_report_realtime`
--
ALTER TABLE `cost_report_realtime`
  MODIFY `cost_report_realtime_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `material_report`
--
ALTER TABLE `material_report`
  MODIFY `material_report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `material_type`
--
ALTER TABLE `material_type`
  MODIFY `material_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material_unit`
--
ALTER TABLE `material_unit`
  MODIFY `material_unit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `material_use`
--
ALTER TABLE `material_use`
  MODIFY `material_use_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notif` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progress_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_employees`
--
ALTER TABLE `project_employees`
  MODIFY `project_employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_progress_plan`
--
ALTER TABLE `project_progress_plan`
  MODIFY `project_progress_plan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `project_step`
--
ALTER TABLE `project_step`
  MODIFY `project_step_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_substep`
--
ALTER TABLE `project_substep`
  MODIFY `project_substep_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `project_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `role_access_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `supporting_document`
--
ALTER TABLE `supporting_document`
  MODIFY `supporting_document_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cost_report_office`
--
ALTER TABLE `cost_report_office`
  ADD CONSTRAINT `cost_report_office_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `cost_report_realtime`
--
ALTER TABLE `cost_report_realtime`
  ADD CONSTRAINT `cost_report_realtime_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `employees_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `employees_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `material_report`
--
ALTER TABLE `material_report`
  ADD CONSTRAINT `material_report_material_type_id_foreign` FOREIGN KEY (`material_type_id`) REFERENCES `material_type` (`material_type_id`),
  ADD CONSTRAINT `material_report_material_unit_id_foreign` FOREIGN KEY (`material_unit_id`) REFERENCES `material_unit` (`material_unit_id`),
  ADD CONSTRAINT `material_report_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `material_use`
--
ALTER TABLE `material_use`
  ADD CONSTRAINT `material_use_material_report_id_foreign` FOREIGN KEY (`material_report_id`) REFERENCES `material_report` (`material_report_id`),
  ADD CONSTRAINT `material_use_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `progress_project_step_id_foreign` FOREIGN KEY (`project_step_id`) REFERENCES `project_step` (`project_step_id`),
  ADD CONSTRAINT `progress_project_substep_id_foreign` FOREIGN KEY (`project_substep_id`) REFERENCES `project_substep` (`project_substep_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `project_project_type_id_foreign` FOREIGN KEY (`project_type_id`) REFERENCES `project_types` (`project_type_id`),
  ADD CONSTRAINT `project_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `project_employees`
--
ALTER TABLE `project_employees`
  ADD CONSTRAINT `project_employees_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `project_employees_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `project_progress_plan`
--
ALTER TABLE `project_progress_plan`
  ADD CONSTRAINT `project_progress_plan_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_progress_plan_project_step_id_foreign` FOREIGN KEY (`project_step_id`) REFERENCES `project_step` (`project_step_id`),
  ADD CONSTRAINT `project_progress_plan_project_substep_id_foreign` FOREIGN KEY (`project_substep_id`) REFERENCES `project_substep` (`project_substep_id`);

--
-- Constraints for table `project_step`
--
ALTER TABLE `project_step`
  ADD CONSTRAINT `project_step_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `project_step_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_step_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `project_substep`
--
ALTER TABLE `project_substep`
  ADD CONSTRAINT `project_substep_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `project_substep_project_step_id_foreign` FOREIGN KEY (`project_step_id`) REFERENCES `project_step` (`project_step_id`);

--
-- Constraints for table `project_types`
--
ALTER TABLE `project_types`
  ADD CONSTRAINT `project_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `project_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`),
  ADD CONSTRAINT `role_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `role_access`
--
ALTER TABLE `role_access`
  ADD CONSTRAINT `role_access_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`menu_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_access_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE;

--
-- Constraints for table `supporting_document`
--
ALTER TABLE `supporting_document`
  ADD CONSTRAINT `supporting_document_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
