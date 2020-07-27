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

 Date: 27/07/2020 12:08:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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

SET FOREIGN_KEY_CHECKS = 1;
