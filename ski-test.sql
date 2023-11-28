/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tbl_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tbl_beli` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `notransaksi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_suplier` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_beli` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tbl_detail_beli` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `notransaksi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `diskon_rp` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tbl_hutang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `notransaksi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_supplier` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_beli` datetime NOT NULL,
  `total_hutang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tbl_stock` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty_beli` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tbl_suplier` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_suplier` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_suplier` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_14_151454_create_permission_tables', 1),
(6, '2023_11_28_213136_create_table_barang', 1),
(7, '2023_11_28_213400_create_table_suplier', 1),
(8, '2023_11_28_213539_create_table_beli', 1),
(9, '2023_11_28_213840_create_table_detail_beli', 1),
(10, '2023_11_28_222131_create_table_stock', 1),
(11, '2023_11_28_222855_create_table_hutang', 1);



INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);




INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'post_show', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'post_create', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'post_update', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58');
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'post_detail', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(5, 'post_delete', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(6, 'category_show', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(7, 'category_create', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(8, 'category_update', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(9, 'category_detail', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(10, 'category_delete', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(11, 'tag_show', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(12, 'tag_create', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(13, 'tag_update', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(14, 'tag_delete', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(15, 'role_show', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(16, 'role_create', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(17, 'role_update', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(18, 'role_detail', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(19, 'role_delete', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(20, 'user_show', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(21, 'user_create', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(22, 'user_update', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(23, 'user_detail', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58'),
(24, 'user_delete', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58');



INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(3, 1);
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3);

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58');
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Editor', 'web', '2023-11-29 02:24:58', '2023-11-29 02:24:58');

INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `created_at`, `updated_at`) VALUES
(1, 'B20231101', 'Barang 1', 'pcs', 2000, NULL, NULL);
INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `created_at`, `updated_at`) VALUES
(2, 'B20231102', 'Barang 2', 'pcs', 2000, NULL, NULL);
INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `created_at`, `updated_at`) VALUES
(3, 'B20231103', 'Barang 3', 'pcs', 2000, NULL, NULL);
INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `created_at`, `updated_at`) VALUES
(4, 'B20231104', 'Barang 4', 'pcs', 2000, NULL, NULL),
(5, 'B20231105', 'Barang 5', 'pcs', 2000, NULL, NULL),
(6, 'B20231106', 'Barang 6', 'pcs', 2000, NULL, NULL),
(7, 'B20231107', 'Barang 7', 'pcs', 2000, NULL, NULL),
(8, 'B20231108', 'Barang 8', 'pcs', 2000, NULL, NULL),
(9, 'B20231109', 'Barang 9', 'pcs', 2000, NULL, NULL),
(10, 'B202311010', 'Barang 10', 'pcs', 2000, NULL, NULL);

INSERT INTO `tbl_beli` (`id`, `notransaksi`, `kode_suplier`, `tanggal_beli`, `created_at`, `updated_at`) VALUES
(1, 'B202311001', 'S202311005', '2023-11-21 00:00:00', '2023-11-29 02:25:37', '2023-11-29 02:25:37');


INSERT INTO `tbl_detail_beli` (`id`, `notransaksi`, `kode_barang`, `harga_beli`, `qty`, `diskon`, `diskon_rp`, `total`, `created_at`, `updated_at`) VALUES
(1, 'B202311001', 'B20231108', 10000, 2, 20, 4000, 20000, '2023-11-29 02:25:37', '2023-11-29 02:25:37');


INSERT INTO `tbl_hutang` (`id`, `notransaksi`, `kode_supplier`, `tanggal_beli`, `total_hutang`, `created_at`, `updated_at`) VALUES
(1, 'B202311001', 'S202311005', '2023-11-21 00:00:00', 4000, '2023-11-29 02:25:37', '2023-11-29 02:25:37');


INSERT INTO `tbl_stock` (`id`, `kode_barang`, `qty_beli`, `created_at`, `updated_at`) VALUES
(1, 'B20231108', '2', '2023-11-29 02:25:37', NULL);


INSERT INTO `tbl_suplier` (`id`, `kode_suplier`, `nama_suplier`, `created_at`, `updated_at`) VALUES
(1, 'S202311001', 'Suplier 1', NULL, NULL);
INSERT INTO `tbl_suplier` (`id`, `kode_suplier`, `nama_suplier`, `created_at`, `updated_at`) VALUES
(2, 'S202311002', 'Suplier 2', NULL, NULL);
INSERT INTO `tbl_suplier` (`id`, `kode_suplier`, `nama_suplier`, `created_at`, `updated_at`) VALUES
(3, 'S202311003', 'Suplier 3', NULL, NULL);
INSERT INTO `tbl_suplier` (`id`, `kode_suplier`, `nama_suplier`, `created_at`, `updated_at`) VALUES
(4, 'S202311004', 'Suplier 4', NULL, NULL),
(5, 'S202311005', 'Suplier 5', NULL, NULL);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '2023-11-29 02:24:58', '$2y$10$uiYfIAK/IbDQTYw2sFMVAe.QxuYZB6HtAsbqmhFA2PgGN9sGqqrSW', '8yYHZa0jnKr5EPwOIb31OOS4JJU9789GlJ5yMDtMjlcs4JnmwXt9QeEEZ1V8', '2023-11-29 02:24:58', '2023-11-29 02:24:58');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;