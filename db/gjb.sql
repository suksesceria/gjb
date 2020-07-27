/*
 Navicat Premium Data Transfer

 Source Server         : mysql_local
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : gjb

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 25/07/2020 11:32:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cost_report_office
-- ----------------------------
DROP TABLE IF EXISTS `cost_report_office`;
CREATE TABLE `cost_report_office`  (
  `cost_report_office_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `cost_expense` double NOT NULL,
  `balance` double NOT NULL,
  `cost_report_cashflow` tinyint(1) NOT NULL,
  `cost_report_office_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_report_office_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `verify_by_admin` int(11) NULL DEFAULT NULL,
  `verify_at_admin` date NULL DEFAULT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`cost_report_office_id`) USING BTREE,
  INDEX `cost_report_office_project_id_foreign`(`project_id`) USING BTREE,
  CONSTRAINT `cost_report_office_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cost_report_office
-- ----------------------------
INSERT INTO `cost_report_office` VALUES (1, 2, 40000000, 40000000, 1, 'Income', '2020-07-17', NULL, NULL, NULL, 1, 1, NULL, NULL, 0, '2020-07-23 20:55:08', '2020-07-23 20:55:08', NULL);
INSERT INTO `cost_report_office` VALUES (2, 4, 40000000, 40000000, 1, 'Pemasukkan', '2020-07-16', NULL, NULL, NULL, 1, 1, 1, '2020-07-23', 0, '2020-07-23 20:59:29', '2020-07-23 20:59:54', NULL);
INSERT INTO `cost_report_office` VALUES (4, 4, 200000, 7800000, 0, 'ket 1', '2020-07-17', NULL, NULL, NULL, 1, 1, NULL, NULL, 0, '2020-07-23 21:26:16', '2020-07-23 21:26:16', NULL);

-- ----------------------------
-- Table structure for cost_report_realtime
-- ----------------------------
DROP TABLE IF EXISTS `cost_report_realtime`;
CREATE TABLE `cost_report_realtime`  (
  `cost_report_realtime_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `cost_expense` double NOT NULL,
  `balance` double NOT NULL,
  `cost_report_cashflow` tinyint(1) NOT NULL,
  `cost_report_realtime_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_report_realtime_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `verify_by_admin` int(11) NULL DEFAULT NULL,
  `verify_at_admin` date NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cost_report_realtime_id`) USING BTREE,
  INDEX `cost_report_realtime_project_id_foreign`(`project_id`) USING BTREE,
  CONSTRAINT `cost_report_realtime_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cost_report_realtime
-- ----------------------------
INSERT INTO `cost_report_realtime` VALUES (1, 2, 30000000, 30000000, 1, 'keungan kantor 1', '2020-07-10', NULL, NULL, NULL, 1, 0, '2020-07-23 21:08:59', '2020-07-23 21:08:59', NULL, NULL, NULL, 1);

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_dob` date NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `employee_username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`employee_id`) USING BTREE,
  UNIQUE INDEX `employees_employee_username_deleted_at_unique`(`employee_username`, `deleted_at`) USING BTREE,
  UNIQUE INDEX `employees_employee_email_deleted_at_unique`(`employee_email`, `deleted_at`) USING BTREE,
  INDEX `employees_role_id_foreign`(`role_id`) USING BTREE,
  INDEX `employees_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `employees_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `employees_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `employees_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `employees_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (1, 'Admin User', '1990-01-01', 1, 'adminuser', '$2y$10$v1bCPaZSbqoPpYnZbVF/lOFolUR17w9XAvHusRV8ImJRKDWKwd1ba', 'adminuser@gjb.com', '08000000000', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `employees` VALUES (2, 'karyawan 2', '2020-07-22', 2, 'karyawan 2', '$2y$10$2J3aFNUIoCaA0gjqo1W.4eVblY4laZtPyvU552xkee9U2vFhAIXfu', 'adawiyahrobiyatul24@ymail.com', '08928282', NULL, NULL, NULL, 1, 0, '2020-07-20 09:37:22', '2020-07-20 09:37:22', NULL);
INSERT INTO `employees` VALUES (3, 'Office user', '2020-07-08', 2, 'officeuser@gjb.com', '$2y$10$8yGP93rXTzepbwr8Mvqphe1tWawtHFExQ8WzmR3vOFzobfzUuRvKi', 'officeuser@gjb.com', '089282823322', NULL, NULL, NULL, 1, 0, '2020-07-21 13:35:05', '2020-07-21 13:35:05', NULL);
INSERT INTO `employees` VALUES (4, 'Projek Manajer', '2020-07-04', 3, 'projekmanajer@gjb.com', '$2y$10$9AkBs03ms2irShVWydJ/FecbbjaeKNMqvEzBLYpQR2MU7icw3K0lu', 'projekmanajer@gjb.com', '435353', NULL, NULL, NULL, 1, 0, '2020-07-21 13:35:43', '2020-07-21 13:35:43', NULL);

-- ----------------------------
-- Table structure for material_report
-- ----------------------------
DROP TABLE IF EXISTS `material_report`;
CREATE TABLE `material_report`  (
  `material_report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `material_type_id` bigint(20) UNSIGNED NOT NULL,
  `material_unit_id` bigint(20) UNSIGNED NOT NULL,
  `material_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_report_date` date NOT NULL,
  `material_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_cost_unit` double NOT NULL,
  `material_qty` int(10) UNSIGNED NOT NULL,
  `material_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `status` int(255) NULL DEFAULT NULL,
  `verify_by_admin` int(255) NULL DEFAULT NULL,
  `verify_at_admin` date NULL DEFAULT NULL,
  PRIMARY KEY (`material_report_id`) USING BTREE,
  INDEX `material_report_project_id_foreign`(`project_id`) USING BTREE,
  INDEX `material_report_material_type_id_foreign`(`material_type_id`) USING BTREE,
  INDEX `material_report_material_unit_id_foreign`(`material_unit_id`) USING BTREE,
  CONSTRAINT `material_report_material_type_id_foreign` FOREIGN KEY (`material_type_id`) REFERENCES `material_type` (`material_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `material_report_material_unit_id_foreign` FOREIGN KEY (`material_unit_id`) REFERENCES `material_unit` (`material_unit_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `material_report_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of material_report
-- ----------------------------
INSERT INTO `material_report` VALUES (1, 4, 1, 1, 'TM1-001', '2020-07-09', 'mat 1', 1000000, 5, 'ket 1', NULL, NULL, NULL, 1, 0, '2020-07-23 21:11:49', '2020-07-23 21:12:23', NULL, 2, 1, '2020-07-23');
INSERT INTO `material_report` VALUES (2, 4, 1, 1, 'TM1-002', '2020-07-24', 'Material bahan baku', 300000, 3, 'ket 3', NULL, NULL, NULL, 1, 0, '2020-07-23 21:17:24', '2020-07-23 21:17:43', NULL, 1, 1, '2020-07-23');

-- ----------------------------
-- Table structure for material_type
-- ----------------------------
DROP TABLE IF EXISTS `material_type`;
CREATE TABLE `material_type`  (
  `material_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `material_type_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`material_type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of material_type
-- ----------------------------
INSERT INTO `material_type` VALUES (1, 'tipe material 1', NULL, NULL, NULL, 1, 0, '2020-07-20 09:36:41', '2020-07-20 09:36:41', NULL);

-- ----------------------------
-- Table structure for material_unit
-- ----------------------------
DROP TABLE IF EXISTS `material_unit`;
CREATE TABLE `material_unit`  (
  `material_unit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `material_unit_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`material_unit_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of material_unit
-- ----------------------------
INSERT INTO `material_unit` VALUES (1, 'satuan 1', NULL, NULL, NULL, 1, 0, '2020-07-20 09:36:19', '2020-07-20 09:36:19', NULL);
INSERT INTO `material_unit` VALUES (2, 'satuan 1', NULL, NULL, NULL, 1, 0, '2020-07-20 09:36:20', '2020-07-20 09:36:22', '2020-07-20 09:36:22');
INSERT INTO `material_unit` VALUES (3, 'satuan 2', NULL, NULL, NULL, 1, 0, '2020-07-20 09:36:27', '2020-07-20 09:36:27', NULL);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `menu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE,
  UNIQUE INDEX `menus_menu_code_deleted_at_unique`(`menu_code`, `deleted_at`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'home-dashboard', 'Beranda', '', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `menus` VALUES (2, 'projects', 'Proyek', 'projects', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `menus` VALUES (3, 'type-proyek', 'Tipe Proyek', 'type-proyek', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `menus` VALUES (4, 'employees', 'Karyawan', 'employees', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `menus` VALUES (5, 'roles', 'Akses Role', 'roles', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `menus` VALUES (6, 'material-type', 'Tipe Material', 'material-type', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `menus` VALUES (7, 'material-unit', 'Unit Material', 'material-unit', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2020_03_16_042349_create_role_table', 1);
INSERT INTO `migrations` VALUES (2, '2020_03_16_051544_create_employees_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_03_16_052202_alter_employees_table_relationships', 1);
INSERT INTO `migrations` VALUES (4, '2020_03_16_052501_alter_role_table_relationships', 1);
INSERT INTO `migrations` VALUES (5, '2020_03_16_135818_create_project_types_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_03_16_135850_create_project_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_03_16_184648_alter_project_table_relationships', 1);
INSERT INTO `migrations` VALUES (8, '2020_03_16_185103_alter_project_type_table_relationships', 1);
INSERT INTO `migrations` VALUES (9, '2020_03_16_212622_create_project_step_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_03_16_212700_create_project_employees_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_03_18_114449_create_menus_table', 1);
INSERT INTO `migrations` VALUES (12, '2020_03_29_145002_create_role_access_table', 1);
INSERT INTO `migrations` VALUES (13, '2020_03_29_145850_alter_role_access_table_relationships', 1);
INSERT INTO `migrations` VALUES (14, '2020_07_02_145002_create_material_type_table', 1);
INSERT INTO `migrations` VALUES (15, '2020_07_02_145003_create_material_unit_table', 1);
INSERT INTO `migrations` VALUES (16, '2020_07_02_145005_create_material_report_table', 1);
INSERT INTO `migrations` VALUES (17, '2020_07_02_245010_create_cost_report_realtime_table', 1);
INSERT INTO `migrations` VALUES (18, '2020_07_02_345010_create_cost_report_office_table', 1);
INSERT INTO `migrations` VALUES (19, '2020_07_02_445010_create_supporting_document_table', 1);
INSERT INTO `migrations` VALUES (20, '2020_07_02_535850_alter_add_column_progress_project_table', 1);
INSERT INTO `migrations` VALUES (21, '2020_07_03_095159_create_project_substep_table', 1);
INSERT INTO `migrations` VALUES (22, '2020_07_03_095838_create_project_progress_plan_table', 1);
INSERT INTO `migrations` VALUES (23, '2020_07_03_100223_create_progress_table', 1);
INSERT INTO `migrations` VALUES (24, '2020_07_06_160714_alter_table_progress_add_column_progress_date', 1);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id_notif` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `id_href` int(11) NOT NULL,
  `id_href_segment2` int(11) NULL DEFAULT NULL,
  `read_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_notif`) USING BTREE,
  INDEX `notifications_notifiable_type_notifiable_id_index`(`notifiable_type`, `notifiable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES (1, 'Keuangan Lapangan', 'keuangan_lapangan', 1, 'Income', '/projects/1/detail-keuangan', 1, NULL, NULL, '2020-07-23 20:55:08', '2020-07-23 20:55:08');
INSERT INTO `notifications` VALUES (2, 'Keuangan Lapangan', 'keuangan_lapangan', 1, 'Pemasukkan', '/projects/2/detail-keuangan', 2, NULL, NULL, '2020-07-23 20:59:29', '2020-07-23 20:59:29');
INSERT INTO `notifications` VALUES (3, 'Keuangan Kantor', 'keuangan_kantor', 1, 'keungan kantor 1', '/projects/1/detail-realtime', 1, NULL, NULL, '2020-07-23 21:08:59', '2020-07-23 21:08:59');
INSERT INTO `notifications` VALUES (4, 'Laporan Material', 'laporan_material', 1, 'ket 1', '/projects/1/detail-material', 1, NULL, NULL, '2020-07-23 21:11:49', '2020-07-23 21:11:49');
INSERT INTO `notifications` VALUES (5, 'Laporan Material', 'laporan_material', 1, 'ket 3', '/projects/2/detail-material', 2, NULL, NULL, '2020-07-23 21:17:24', '2020-07-23 21:17:24');
INSERT INTO `notifications` VALUES (6, 'Keuangan Lapangan', 'keuangan_lapangan', 1, 'ket 1', '/projects/3/detail-keuangan', 3, NULL, NULL, '2020-07-23 21:19:28', '2020-07-23 21:19:28');
INSERT INTO `notifications` VALUES (7, 'Keuangan Lapangan', 'keuangan_lapangan', 1, 'ket 1', '/projects/4/detail-keuangan', 4, NULL, NULL, '2020-07-23 21:26:16', '2020-07-23 21:26:16');
INSERT INTO `notifications` VALUES (8, 'Keuangan Lapangan Mendekati limit', 'keuangan_lapangan_over', 1, 'Keuangan Lapangan test project manajer Kurang lebih 20% lagi', '/projects/4/keuangan', 4, NULL, NULL, '2020-07-23 21:26:18', '2020-07-23 21:26:18');
INSERT INTO `notifications` VALUES (9, 'Keuangan Lapangan Mendekati limit', 'keuangan_lapangan_over', 2, 'Keuangan Lapangan test project manajer Kurang lebih 20% lagi', '/projects/4/keuangan', 4, NULL, NULL, '2020-07-23 21:26:19', '2020-07-23 21:26:19');
INSERT INTO `notifications` VALUES (10, 'Keuangan Lapangan Mendekati limit', 'keuangan_lapangan_over', 3, 'Keuangan Lapangan test project manajer Kurang lebih 20% lagi', '/projects/4/keuangan', 4, NULL, NULL, '2020-07-23 21:26:20', '2020-07-23 21:26:20');

-- ----------------------------
-- Table structure for progress
-- ----------------------------
DROP TABLE IF EXISTS `progress`;
CREATE TABLE `progress`  (
  `progress_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_substep_id` bigint(20) UNSIGNED NOT NULL,
  `project_step_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `week` int(10) UNSIGNED NOT NULL,
  `progress_add` double NOT NULL,
  `progress_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `progress_date` date NOT NULL,
  PRIMARY KEY (`progress_id`) USING BTREE,
  INDEX `progress_project_id_foreign`(`project_id`) USING BTREE,
  INDEX `progress_project_step_id_foreign`(`project_step_id`) USING BTREE,
  INDEX `progress_project_substep_id_foreign`(`project_substep_id`) USING BTREE,
  INDEX `progress_created_by_index`(`created_by`) USING BTREE,
  INDEX `progress_updated_by_index`(`updated_by`) USING BTREE,
  CONSTRAINT `progress_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `progress_project_step_id_foreign` FOREIGN KEY (`project_step_id`) REFERENCES `project_step` (`project_step_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `progress_project_substep_id_foreign` FOREIGN KEY (`project_substep_id`) REFERENCES `project_substep` (`project_substep_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of progress
-- ----------------------------
INSERT INTO `progress` VALUES (1, 6, 3, 2, 1, 20, 'desk progress', NULL, NULL, NULL, 1, 0, '2020-07-20 11:13:59', '2020-07-20 11:13:59', NULL, '2020-07-20');
INSERT INTO `progress` VALUES (2, 7, 3, 2, 2, 30, 'desk progress 2', NULL, NULL, NULL, 1, 0, '2020-07-20 11:14:19', '2020-07-20 11:14:19', NULL, '2020-07-29');
INSERT INTO `progress` VALUES (3, 9, 5, 3, 1, 2, 'des', NULL, NULL, NULL, 1, 0, '2020-07-20 11:36:04', '2020-07-20 11:36:04', NULL, '2020-07-01');
INSERT INTO `progress` VALUES (4, 10, 6, 4, 1, 20, 'desk progress', NULL, NULL, NULL, 1, 0, '2020-07-21 13:42:13', '2020-07-21 13:42:13', NULL, '2020-08-07');
INSERT INTO `progress` VALUES (5, 10, 6, 4, 5, 70, 'sed', NULL, NULL, NULL, 1, 0, '2020-07-21 14:51:56', '2020-07-21 14:51:56', NULL, '2020-08-07');

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project`  (
  `project_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type_id` bigint(20) UNSIGNED NOT NULL,
  `cost_total` double NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `progress` double NULL DEFAULT 0,
  PRIMARY KEY (`project_id`) USING BTREE,
  INDEX `project_project_type_id_foreign`(`project_type_id`) USING BTREE,
  INDEX `project_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `project_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `project_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_project_type_id_foreign` FOREIGN KEY (`project_type_id`) REFERENCES `project_types` (`project_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES (2, 'projek 1', 1, 90000000, NULL, NULL, NULL, 2, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', NULL, 0);
INSERT INTO `project` VALUES (3, 'projek 2', 1, 10000000, NULL, NULL, NULL, 1, 0, '2020-07-20 11:35:46', '2020-07-20 11:35:46', NULL, 0);
INSERT INTO `project` VALUES (4, 'test project manajer', 1, 40000000, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL, 0);
INSERT INTO `project` VALUES (5, 'setelah ganti tampilan', 1, 20000000, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:52', '2020-07-24 12:20:52', NULL, 0);

-- ----------------------------
-- Table structure for project_employees
-- ----------------------------
DROP TABLE IF EXISTS `project_employees`;
CREATE TABLE `project_employees`  (
  `project_employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`project_employee_id`) USING BTREE,
  INDEX `project_employees_project_id_foreign`(`project_id`) USING BTREE,
  INDEX `project_employees_employee_id_foreign`(`employee_id`) USING BTREE,
  CONSTRAINT `project_employees_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_employees_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project_employees
-- ----------------------------
INSERT INTO `project_employees` VALUES (2, 2, 2, '2020-07-20 09:38:58', '2020-07-20 09:38:58', NULL);
INSERT INTO `project_employees` VALUES (3, 3, 1, '2020-07-20 11:35:46', '2020-07-20 11:35:46', NULL);
INSERT INTO `project_employees` VALUES (4, 4, 3, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_employees` VALUES (5, 5, 1, '2020-07-24 12:20:52', '2020-07-24 12:20:52', NULL);
INSERT INTO `project_employees` VALUES (6, 5, 2, '2020-07-24 12:20:52', '2020-07-24 12:20:52', NULL);

-- ----------------------------
-- Table structure for project_progress_plan
-- ----------------------------
DROP TABLE IF EXISTS `project_progress_plan`;
CREATE TABLE `project_progress_plan`  (
  `project_progress_plan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_substep_id` bigint(20) UNSIGNED NOT NULL,
  `project_step_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `week` int(10) UNSIGNED NOT NULL,
  `weight` double NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`project_progress_plan_id`) USING BTREE,
  INDEX `project_progress_plan_project_id_foreign`(`project_id`) USING BTREE,
  INDEX `project_progress_plan_project_step_id_foreign`(`project_step_id`) USING BTREE,
  INDEX `project_progress_plan_project_substep_id_foreign`(`project_substep_id`) USING BTREE,
  INDEX `project_progress_plan_created_by_index`(`created_by`) USING BTREE,
  INDEX `project_progress_plan_updated_by_index`(`updated_by`) USING BTREE,
  CONSTRAINT `project_progress_plan_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_progress_plan_project_step_id_foreign` FOREIGN KEY (`project_step_id`) REFERENCES `project_step` (`project_step_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_progress_plan_project_substep_id_foreign` FOREIGN KEY (`project_substep_id`) REFERENCES `project_substep` (`project_substep_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project_progress_plan
-- ----------------------------
INSERT INTO `project_progress_plan` VALUES (8, 6, 3, 2, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', '2020-07-20 10:09:57');
INSERT INTO `project_progress_plan` VALUES (9, 7, 3, 2, 1, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', '2020-07-20 10:09:57');
INSERT INTO `project_progress_plan` VALUES (10, 7, 3, 2, 2, 3, NULL, NULL, NULL, 1, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', '2020-07-20 10:09:57');
INSERT INTO `project_progress_plan` VALUES (11, 7, 3, 2, 3, 3, NULL, NULL, NULL, 1, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', '2020-07-20 10:09:57');
INSERT INTO `project_progress_plan` VALUES (12, 8, 4, 2, 1, 2, NULL, NULL, NULL, 2, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', NULL);
INSERT INTO `project_progress_plan` VALUES (13, 8, 4, 2, 2, 3, NULL, NULL, NULL, 2, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', NULL);
INSERT INTO `project_progress_plan` VALUES (14, 8, 4, 2, 3, 2, NULL, NULL, NULL, 2, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', NULL);
INSERT INTO `project_progress_plan` VALUES (15, 6, 3, 2, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-20 10:09:57', '2020-07-20 10:09:57', NULL);
INSERT INTO `project_progress_plan` VALUES (16, 7, 3, 2, 1, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 10:09:57', '2020-07-20 10:09:57', NULL);
INSERT INTO `project_progress_plan` VALUES (17, 9, 5, 3, 1, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 11:35:46', '2020-07-20 11:35:46', NULL);
INSERT INTO `project_progress_plan` VALUES (18, 10, 6, 4, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_progress_plan` VALUES (19, 10, 6, 4, 2, 2, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_progress_plan` VALUES (20, 10, 6, 4, 3, 3, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_progress_plan` VALUES (21, 11, 7, 4, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_progress_plan` VALUES (22, 12, 7, 4, 1, 2, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_progress_plan` VALUES (23, 12, 7, 4, 2, 3, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_progress_plan` VALUES (24, 12, 7, 4, 3, 1, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_progress_plan` VALUES (25, 12, 7, 4, 4, 1, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_progress_plan` VALUES (26, 13, 8, 5, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);
INSERT INTO `project_progress_plan` VALUES (27, 13, 8, 5, 2, 2, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);
INSERT INTO `project_progress_plan` VALUES (28, 13, 8, 5, 3, 3, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);
INSERT INTO `project_progress_plan` VALUES (29, 13, 8, 5, 4, 4, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);
INSERT INTO `project_progress_plan` VALUES (30, 14, 8, 5, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);
INSERT INTO `project_progress_plan` VALUES (31, 14, 8, 5, 2, 2, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);
INSERT INTO `project_progress_plan` VALUES (32, 15, 9, 5, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);
INSERT INTO `project_progress_plan` VALUES (33, 15, 9, 5, 2, 2, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);

-- ----------------------------
-- Table structure for project_step
-- ----------------------------
DROP TABLE IF EXISTS `project_step`;
CREATE TABLE `project_step`  (
  `project_step_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_step_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`project_step_id`) USING BTREE,
  INDEX `project_step_project_id_foreign`(`project_id`) USING BTREE,
  INDEX `project_step_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `project_step_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `project_step_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_step_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_step_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project_step
-- ----------------------------
INSERT INTO `project_step` VALUES (3, 'langkah 1', 2, NULL, NULL, NULL, 2, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', NULL);
INSERT INTO `project_step` VALUES (4, 'langkah 2', 2, NULL, NULL, NULL, 2, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', NULL);
INSERT INTO `project_step` VALUES (5, 'langkah 1', 3, NULL, NULL, NULL, 1, 0, '2020-07-20 11:35:46', '2020-07-20 11:35:46', NULL);
INSERT INTO `project_step` VALUES (6, 'langkah 1', 4, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_step` VALUES (7, 'e3e3', 4, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_step` VALUES (8, 'lankaga', 5, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:52', '2020-07-24 12:20:52', NULL);
INSERT INTO `project_step` VALUES (9, 'Langkah kedua', 5, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);

-- ----------------------------
-- Table structure for project_substep
-- ----------------------------
DROP TABLE IF EXISTS `project_substep`;
CREATE TABLE `project_substep`  (
  `project_substep_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_step_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `project_substep_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_start_date` date NOT NULL,
  `estimated_end_date` date NOT NULL,
  `real_start_date` date NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`project_substep_id`) USING BTREE,
  INDEX `project_substep_project_id_foreign`(`project_id`) USING BTREE,
  INDEX `project_substep_project_step_id_foreign`(`project_step_id`) USING BTREE,
  INDEX `project_substep_created_by_index`(`created_by`) USING BTREE,
  INDEX `project_substep_updated_by_index`(`updated_by`) USING BTREE,
  CONSTRAINT `project_substep_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_substep_project_step_id_foreign` FOREIGN KEY (`project_step_id`) REFERENCES `project_step` (`project_step_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project_substep
-- ----------------------------
INSERT INTO `project_substep` VALUES (6, 3, 2, 'det l1', '2020-07-27', '2020-08-02', '2020-07-20', NULL, NULL, NULL, 3, 0, '2020-07-20 09:38:58', '2020-07-20 11:13:59', NULL);
INSERT INTO `project_substep` VALUES (7, 3, 2, 'det l2', '2020-07-21', '2020-07-25', '2020-07-29', NULL, NULL, NULL, 3, 0, '2020-07-20 09:38:58', '2020-07-20 11:14:19', NULL);
INSERT INTO `project_substep` VALUES (8, 4, 2, 'detail langkah 2 yang 1', '2020-07-09', '2020-07-24', NULL, NULL, NULL, NULL, 2, 0, '2020-07-20 09:38:58', '2020-07-20 10:09:57', NULL);
INSERT INTO `project_substep` VALUES (9, 5, 3, 't1', '2020-07-21', '2020-07-25', '2020-07-01', NULL, NULL, NULL, 2, 0, '2020-07-20 11:35:46', '2020-07-20 11:36:04', NULL);
INSERT INTO `project_substep` VALUES (10, 6, 4, 'test', '2020-07-30', '2020-08-14', '2020-08-07', NULL, NULL, NULL, 2, 0, '2020-07-21 13:38:32', '2020-07-21 13:42:13', NULL);
INSERT INTO `project_substep` VALUES (11, 7, 4, 'e3e3', '2020-07-30', '2020-08-06', NULL, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_substep` VALUES (12, 7, 4, 'dewr', '2020-08-06', '2020-09-03', NULL, NULL, NULL, NULL, 1, 0, '2020-07-21 13:38:32', '2020-07-21 13:38:32', NULL);
INSERT INTO `project_substep` VALUES (13, 8, 5, 'test', '2020-07-02', '2020-07-25', NULL, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:52', '2020-07-24 12:20:52', NULL);
INSERT INTO `project_substep` VALUES (14, 8, 5, 'test kedua', '2020-07-11', '2020-07-21', NULL, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);
INSERT INTO `project_substep` VALUES (15, 9, 5, 'detail langkah 2 yang 2', '2020-07-22', '2020-08-05', NULL, NULL, NULL, NULL, 1, 0, '2020-07-24 12:20:53', '2020-07-24 12:20:53', NULL);

-- ----------------------------
-- Table structure for project_types
-- ----------------------------
DROP TABLE IF EXISTS `project_types`;
CREATE TABLE `project_types`  (
  `project_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_type_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`project_type_id`) USING BTREE,
  INDEX `project_types_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `project_types_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `project_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `project_types_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project_types
-- ----------------------------
INSERT INTO `project_types` VALUES (1, 'test 1', NULL, NULL, NULL, 2, 0, '2020-07-20 09:30:46', '2020-07-20 09:30:50', NULL);

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`) USING BTREE,
  INDEX `role_created_by_foreign`(`created_by`) USING BTREE,
  INDEX `role_updated_by_foreign`(`updated_by`) USING BTREE,
  CONSTRAINT `role_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `role_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `employees` (`employee_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Admin', 'Admin can access all of the features', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role` VALUES (2, 'Office', 'Office', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role` VALUES (3, 'Projek Manajer', 'Projek Manajer', NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);

-- ----------------------------
-- Table structure for role_access
-- ----------------------------
DROP TABLE IF EXISTS `role_access`;
CREATE TABLE `role_access`  (
  `role_access_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`role_access_id`) USING BTREE,
  INDEX `role_access_role_id_foreign`(`role_id`) USING BTREE,
  INDEX `role_access_menu_id_foreign`(`menu_id`) USING BTREE,
  CONSTRAINT `role_access_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`menu_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_access_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_access
-- ----------------------------
INSERT INTO `role_access` VALUES (1, 1, 1, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (2, 1, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (3, 1, 3, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (4, 1, 4, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (5, 1, 5, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (6, 1, 6, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (7, 1, 7, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (8, 2, 1, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (9, 2, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (10, 2, 3, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (11, 2, 6, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (12, 2, 7, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (13, 3, 1, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);
INSERT INTO `role_access` VALUES (14, 3, 2, NULL, NULL, NULL, 1, 0, '2020-07-20 09:28:53', '2020-07-20 09:28:53', NULL);

-- ----------------------------
-- Table structure for supporting_document
-- ----------------------------
DROP TABLE IF EXISTS `supporting_document`;
CREATE TABLE `supporting_document`  (
  `supporting_document_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `supporting_document_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supporting_document_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supporting_document_upload_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `desc` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ver` int(10) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`supporting_document_id`) USING BTREE,
  INDEX `supporting_document_project_id_foreign`(`project_id`) USING BTREE,
  CONSTRAINT `supporting_document_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supporting_document
-- ----------------------------
INSERT INTO `supporting_document` VALUES (1, 2, 'dok 1', 'public/supporting-document/MrVusiX1uVs474eO1Ya5wHWrlfB4ky7uaVHJzN2K.pdf', '2020-07-02', NULL, NULL, NULL, 1, 0, '2020-07-20 11:18:50', '2020-07-20 11:18:50', NULL);
INSERT INTO `supporting_document` VALUES (2, 4, 'dok 1', 'public/supporting-document/RtG4kxHBySxA2GMnAImd0kcQLDyybRHbgoQpJXso.zip', '2020-07-09', NULL, NULL, NULL, 1, 0, '2020-07-21 15:42:06', '2020-07-21 15:42:06', NULL);
INSERT INTO `supporting_document` VALUES (3, 4, 'dok 2', 'public/supporting-document/UsJ78sglbortCm4S0FSklqtZiZqM1xViVSo1jxAU.pdf', '2020-07-31', NULL, NULL, NULL, 1, 0, '2020-07-21 15:42:27', '2020-07-21 15:42:27', NULL);

SET FOREIGN_KEY_CHECKS = 1;
