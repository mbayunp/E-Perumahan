/*
 Navicat Premium Data Transfer

 Source Server         : ALOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : db_ci_iuran_warga

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 14/06/2023 13:45:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_iuran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_iuran`;
CREATE TABLE `tbl_iuran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_warga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_bayar` date NULL DEFAULT NULL,
  `iuran_bulan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nominal_iuran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `adddate` datetime NULL DEFAULT NULL,
  `upddate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_iuran
-- ----------------------------
INSERT INTO `tbl_iuran` VALUES (1, '1', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:10', '2023-05-30 07:35:48');
INSERT INTO `tbl_iuran` VALUES (2, '2', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:25', NULL);
INSERT INTO `tbl_iuran` VALUES (3, '3', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:32', NULL);
INSERT INTO `tbl_iuran` VALUES (4, '4', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:41', NULL);
INSERT INTO `tbl_iuran` VALUES (5, '5', '2023-05-30', '2023-05', '65000', '1', '2023-05-30 07:32:47', NULL);
INSERT INTO `tbl_iuran` VALUES (6, '1', '2023-05-30', '2023-06', '65000', '1', '2023-05-30 07:35:54', '2023-05-30 07:36:56');

-- ----------------------------
-- Table structure for tbl_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pengeluaran`;
CREATE TABLE `tbl_pengeluaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nominal` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_pengeluaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `adddate` datetime NULL DEFAULT NULL,
  `upddate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pengeluaran
-- ----------------------------
INSERT INTO `tbl_pengeluaran` VALUES (1, 'Biaya tukang', '100000', NULL, '2023-05-02', 'Tukang untuk membersihkan lingkungan', '2023-05-30 07:37:44', '2023-05-30 07:44:18');

-- ----------------------------
-- Table structure for tbl_setting
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE `tbl_setting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `upddate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_setting
-- ----------------------------
INSERT INTO `tbl_setting` VALUES (1, '65000', 'nominal_iuran', '2023-05-22 06:47:31');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `add_date` datetime NULL DEFAULT NULL,
  `upd_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_warga
-- ----------------------------
DROP TABLE IF EXISTS `tbl_warga`;
CREATE TABLE `tbl_warga`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomor_nik_ktp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_kk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_rumah` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status_tinggal` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `adddate` datetime NULL DEFAULT NULL,
  `upddate` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_warga
-- ----------------------------
INSERT INTO `tbl_warga` VALUES (1, '1234567889', '1234567891', 'Rifaldi', '085777283013', '41', 'Jl. Kimia No 41', '1', '2023-05-30 07:28:52', '2023-05-30 07:30:51');
INSERT INTO `tbl_warga` VALUES (2, '1234567882', '1234567892', 'Rodin', '08129587441', '42', 'Jl. Kimia No 42', '1', '2023-05-30 07:28:52', NULL);
INSERT INTO `tbl_warga` VALUES (3, '1234567883', '1234567893', 'Ryan', '089872113451', '43', 'Jl. Kimia No 43', '1', '2023-05-30 07:28:52', NULL);
INSERT INTO `tbl_warga` VALUES (4, '1234567884', '1234567894', 'Suparwanto', '084211345867', '44', 'Jl. Kimia No 44', '1', '2023-05-30 07:28:52', NULL);
INSERT INTO `tbl_warga` VALUES (5, '1234567885', '1234567895', 'Fahri', '084722618931', '45', 'Jl. Kimia No 45', '1', '2023-05-30 07:28:52', NULL);

SET FOREIGN_KEY_CHECKS = 1;
