-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi` (
  `kd_prov` bigint(20) unsigned NOT NULL,
  `nama_prov` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kd_prov`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `provinsi` (`kd_prov`, `nama_prov`, `created_at`, `updated_at`) VALUES
(11,	'Aceh',	NULL,	NULL),
(12,	'Sumatera Utara',	NULL,	NULL),
(13,	'Sumatera Barat',	NULL,	NULL),
(14,	'Riau',	NULL,	NULL),
(15,	'Jambi',	NULL,	NULL),
(16,	'Sumatera Selatan',	NULL,	NULL),
(17,	'Bengkulu',	NULL,	NULL),
(18,	'Lampung',	NULL,	NULL),
(19,	'Kepulauan Bangka Belitung',	NULL,	NULL),
(21,	'Kepulauan Riau',	NULL,	NULL),
(31,	'Dki Jakarta',	NULL,	NULL),
(32,	'Jawa Barat',	NULL,	NULL),
(33,	'Jawa Tengah',	NULL,	NULL),
(34,	'Di Yogyakarta',	NULL,	NULL),
(35,	'Jawa Timur',	NULL,	NULL),
(36,	'Banten',	NULL,	NULL),
(51,	'Bali',	NULL,	NULL),
(52,	'Nusa Tenggara Barat',	NULL,	NULL),
(53,	'Nusa Tenggara Timur',	NULL,	NULL),
(61,	'Kalimantan Barat',	NULL,	NULL),
(62,	'Kalimantan Tengah',	NULL,	NULL),
(63,	'Kalimantan Selatan',	NULL,	NULL),
(64,	'Kalimantan Timur',	NULL,	NULL),
(65,	'Kalimantan Utara',	NULL,	NULL),
(71,	'Sulawesi Utara',	NULL,	NULL),
(72,	'Sulawesi Tengah',	NULL,	NULL),
(73,	'Sulawesi Selatan',	NULL,	NULL),
(74,	'Sulawesi Tenggara',	NULL,	NULL),
(75,	'Gorontalo',	NULL,	NULL),
(76,	'Sulawesi Barat',	NULL,	NULL),
(81,	'Maluku',	NULL,	NULL),
(82,	'Maluku Utara',	NULL,	NULL),
(91,	'Papua Barat',	NULL,	NULL),
(94,	'Papua',	NULL,	NULL);

-- 2021-03-25 07:55:44
