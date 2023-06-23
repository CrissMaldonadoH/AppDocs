/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `doc_documento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `DOC_NOMBRE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOC_CODIGO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOC_CONTENIDO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOC_ID_TIPO` bigint(20) unsigned NOT NULL,
  `DOC_ID_PROCESO` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doc_documento_doc_id_tipo_foreign` (`DOC_ID_TIPO`),
  KEY `doc_documento_doc_id_proceso_foreign` (`DOC_ID_PROCESO`),
  CONSTRAINT `doc_documento_doc_id_proceso_foreign` FOREIGN KEY (`DOC_ID_PROCESO`) REFERENCES `pro_proceso` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doc_documento_doc_id_tipo_foreign` FOREIGN KEY (`DOC_ID_TIPO`) REFERENCES `tip_tipo_doc` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `pro_proceso` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PRO_PREFIJO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRO_NOMBRE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tip_tipo_doc` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TIP_NOMBRE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TIP_PREFIJO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `doc_documento` (`id`, `DOC_NOMBRE`, `DOC_CODIGO`, `DOC_CONTENIDO`, `DOC_ID_TIPO`, `DOC_ID_PROCESO`) VALUES
(1, 'La Sistematización de Experiencias como Metodología de Investigación', 'INV-TEST-1', 'Libro para aprender a sistematizar experiencias', 3, 2);



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2023_06_23_004833_create_pro_proceso_table', 6),
(20, '2023_06_23_011026_create_tip_tipo_doc_table', 6),
(21, '2023_06_23_012841_create_doc_documento_table', 7);





INSERT INTO `pro_proceso` (`id`, `PRO_PREFIJO`, `PRO_NOMBRE`) VALUES
(1, 'ING', 'Ingeniería');
INSERT INTO `pro_proceso` (`id`, `PRO_PREFIJO`, `PRO_NOMBRE`) VALUES
(2, 'TEST', 'Testing');
INSERT INTO `pro_proceso` (`id`, `PRO_PREFIJO`, `PRO_NOMBRE`) VALUES
(3, 'PROD', 'Producción');
INSERT INTO `pro_proceso` (`id`, `PRO_PREFIJO`, `PRO_NOMBRE`) VALUES
(4, 'MKG', 'Marketing'),
(5, 'CONT', 'Contabilidad');

INSERT INTO `tip_tipo_doc` (`id`, `TIP_NOMBRE`, `TIP_PREFIJO`) VALUES
(1, 'Instructivo', 'INS');
INSERT INTO `tip_tipo_doc` (`id`, `TIP_NOMBRE`, `TIP_PREFIJO`) VALUES
(2, 'Informativo', 'INF');
INSERT INTO `tip_tipo_doc` (`id`, `TIP_NOMBRE`, `TIP_PREFIJO`) VALUES
(3, 'Investigativo', 'INV');
INSERT INTO `tip_tipo_doc` (`id`, `TIP_NOMBRE`, `TIP_PREFIJO`) VALUES
(4, 'Descriptivo', 'DES'),
(5, 'Expositivo', 'EXP');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Cristian Maldonado', 'crissmaldonadoh@gmail.com', NULL, '$2y$10$pEKqzp4N5xL.cA/CE7/OKOG/lE7JR0u.ZSUwfM1mqmOR8X4Q8EII6', NULL, '2023-06-23 03:04:41', '2023-06-23 03:04:41');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;