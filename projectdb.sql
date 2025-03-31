-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping data for table projectdb.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table projectdb.personal_access_tokens: ~28 rows (approximately)
INSERT IGNORE INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 7, 'Bearer_Token', 'f6de56c6f7d61b5677f8e916696a1b60a2a0f5a521b989bdbe5ba96ecda7b4b0', '["*"]', NULL, NULL, '2025-03-26 21:50:11', '2025-03-26 21:50:11'),
	(2, 'App\\Models\\User', 7, 'Bearer_Token', 'e0f53ee3ff3088ccbcaec7482485981e26beccb274b6eb559899d7da785874e9', '["*"]', NULL, NULL, '2025-03-26 21:51:44', '2025-03-26 21:51:44'),
	(3, 'App\\Models\\User', 7, 'Bearer_Token', '051c2a71a8e9917dd81392f32c8aab37bf7bd3b3f74404a64296a8fc8fab1f2c', '["*"]', NULL, NULL, '2025-03-26 21:54:15', '2025-03-26 21:54:15'),
	(4, 'App\\Models\\User', 7, 'Bearer_Token', '692c3af98b5ca83899e73d946484edb0ec23777efeaf4abe976dbada2f812f14', '["*"]', NULL, NULL, '2025-03-26 21:56:47', '2025-03-26 21:56:47'),
	(5, 'App\\Models\\User', 7, 'Bearer_Token', 'fd877ed35df7abdc8316a280a462cbc7533eef46b4bd11fc1d61982c530a1bd6', '["*"]', NULL, NULL, '2025-03-26 22:07:26', '2025-03-26 22:07:26'),
	(6, 'App\\Models\\User', 7, 'Bearer_Token', '41be03ea08ed56616b0060192a075602f1848b92681419c57497fadf3f694206', '["*"]', NULL, NULL, '2025-03-26 22:15:20', '2025-03-26 22:15:20'),
	(7, 'App\\Models\\User', 7, 'Bearer_Token', '27b0861afb7fa434de4b00446004a412334a6752e1f15d4fddcf2a16dec5df5a', '["*"]', NULL, NULL, '2025-03-26 22:15:26', '2025-03-26 22:15:26'),
	(8, 'App\\Models\\User', 7, 'Bearer_Token', '62436a5592c738e683fb66f97257e0cb08c942234bac912feb0a02c1e73a69e1', '["*"]', NULL, NULL, '2025-03-26 22:15:47', '2025-03-26 22:15:47'),
	(9, 'App\\Models\\User', 7, 'Bearer_Token', 'd1999f83966f101dc7d18e17f6b3390746e91b26e59db5b7aba3d11c71f8a5a9', '["*"]', NULL, NULL, '2025-03-26 22:16:11', '2025-03-26 22:16:11'),
	(10, 'App\\Models\\User', 7, 'Bearer_Token', '7456a9833962ff989d0061f5bf73c85a7d2fd4cfbcb015a08b4a80af3dfd2698', '["*"]', NULL, NULL, '2025-03-26 22:16:14', '2025-03-26 22:16:14'),
	(11, 'App\\Models\\User', 7, 'Bearer_Token', 'df8a8702f76a1beec2b4cf9ca5628eb222fe625e05d1f7a57c2199bda43ba72e', '["*"]', NULL, NULL, '2025-03-26 22:17:49', '2025-03-26 22:17:49'),
	(12, 'App\\Models\\User', 7, 'Bearer_Token', '079dda9dba3f473cd96780365609e930ac5554b29c2aa8ffb056e26c3de9dfd4', '["*"]', NULL, NULL, '2025-03-26 22:19:47', '2025-03-26 22:19:47'),
	(13, 'App\\Models\\User', 7, 'Bearer_Token', '77bd38bedc18a868f8f5225e89075911eff332392f17d77a800e092bde54b64a', '["*"]', NULL, NULL, '2025-03-26 22:20:51', '2025-03-26 22:20:51'),
	(14, 'App\\Models\\User', 7, 'Bearer_Token', '682471b566dac921f1c1453e6ad2c213e669bb49b26ab618d98c7d159708d75c', '["*"]', NULL, NULL, '2025-03-26 22:21:20', '2025-03-26 22:21:20'),
	(15, 'App\\Models\\User', 7, 'Bearer_Token', 'dc47467582982c0f0a93316c5abaab732f9fb629c3c48832cd85d448c0a43dcd', '["*"]', NULL, NULL, '2025-03-26 22:22:08', '2025-03-26 22:22:08'),
	(16, 'App\\Models\\User', 7, 'Bearer_Token', '40522c375ba3c333a40e1e82a6526ebf95350c64025b8d5dc33c21cba44dc55e', '["*"]', NULL, NULL, '2025-03-26 22:22:12', '2025-03-26 22:22:12'),
	(17, 'App\\Models\\User', 7, 'Bearer_Token', '7624442ebc26cf4bc670241725158e92dd3b99ba307902a468f6fa02f55fa3db', '["*"]', NULL, NULL, '2025-03-26 22:23:14', '2025-03-26 22:23:14'),
	(18, 'App\\Models\\User', 7, 'Bearer_Token', 'fb6cd0072929d972ed4e96c6fdb3dab5b6d7cff06fb192440a8df6ce9296388d', '["*"]', NULL, NULL, '2025-03-26 22:23:18', '2025-03-26 22:23:18'),
	(19, 'App\\Models\\User', 7, 'Bearer_Token', '00d755928cb696159358afa097108affb831f9fea5129a2635cbb9bcb966269b', '["*"]', NULL, NULL, '2025-03-26 22:24:56', '2025-03-26 22:24:56'),
	(20, 'App\\Models\\User', 7, 'Bearer_Token', 'e07814d89274914fbf00a9e1e89ebd6b56a428a0260ce8e426713e6a07b49c06', '["*"]', NULL, NULL, '2025-03-26 22:25:22', '2025-03-26 22:25:22'),
	(21, 'App\\Models\\User', 7, 'Bearer_Token', '494f6c10cf8d7758a9d7e78e9fedd18dcc9737b1a66b13a6a460a23c03264fcf', '["*"]', NULL, NULL, '2025-03-26 22:27:51', '2025-03-26 22:27:51'),
	(22, 'App\\Models\\User', 7, 'Bearer_Token', '2a4b98ba5f0a2471fe0982a22b266cbc2f07d19b12c7b7eb7667cfe942977e55', '["*"]', NULL, NULL, '2025-03-26 22:29:07', '2025-03-26 22:29:07'),
	(23, 'App\\Models\\User', 7, 'Bearer_Token', 'b5e2cde195fd8b633507349074c8328d18866a8a3a92494903051558c578c4f9', '["*"]', NULL, NULL, '2025-03-26 22:31:09', '2025-03-26 22:31:09'),
	(24, 'App\\Models\\User', 7, 'Bearer_Token', '5d3fc0dd821f89596c6419410c3d2c10c643aa640599caf8560421d39d5cb3a2', '["*"]', NULL, NULL, '2025-03-26 22:31:29', '2025-03-26 22:31:29'),
	(25, 'App\\Models\\User', 7, 'Bearer_Token', 'b4707e61cb22311077e43df8a603ea401fc7283e9d2f7233eed0e8313b430e99', '["*"]', NULL, NULL, '2025-03-26 22:34:08', '2025-03-26 22:34:08'),
	(26, 'App\\Models\\User', 7, 'Bearer_Token', '4e4f2e06e3e3d8f5be634168eea918ac24e328d3dc6b760ef4a67a7b02d2dd2d', '["*"]', NULL, NULL, '2025-03-26 22:35:18', '2025-03-26 22:35:18'),
	(27, 'App\\Models\\User', 7, 'Bearer_Token', '93930b33722203b2f08d3c011359c3a8da08149343ca7022162b5bc6e505c40e', '["*"]', NULL, NULL, '2025-03-26 22:38:38', '2025-03-26 22:38:38'),
	(28, 'App\\Models\\User', 7, 'Bearer_Token', '644b550ea43f20aad15f2f0238190aa3fc8eb669d3060c550c6d8f7fcb9a22d4', '["*"]', NULL, NULL, '2025-03-26 22:39:05', '2025-03-26 22:39:05');

-- Dumping data for table projectdb.users: ~4 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Mark Adrian', 'mark@dev.com', 'mark@dev', NULL, '$2y$12$Bhn8r4F2wnxTyN6e6bP2hedj5bvFFnkpMq1aP9OoGQwUBBawAlD5K', NULL, '2025-03-25 23:44:14', '2025-03-25 23:44:14'),
	(5, 'Erljay Ogay', 'erl@intouch.com', 'erl@123', NULL, '$2y$12$qXyh0iLcd/szaFo0yu/90.wsx9hPW27u9w.EWtj/nzvnnOQIPzlLi', NULL, '2025-03-26 17:38:44', '2025-03-26 17:38:44'),
	(6, 'Gordon Smith', 'test@gmail.com', 'test@123', NULL, '$2y$12$WRLIh4An71cDXQVwJrNcXuMe6fO5MmlXWJSReleENAKD8FLMCvyjO', NULL, '2025-03-26 17:40:13', '2025-03-26 17:40:13'),
	(7, 'Test2', 'test2@gmail.com', 'test2@123', NULL, '$2y$12$IhoXS2q3RoQuEjbVmeZRKeMCk6rere6hdAb4gOpwlQjQofXMMj3Eq', NULL, '2025-03-26 18:01:31', '2025-03-26 18:01:31');

-- Dumping data for table projectdb.user_details: ~4 rows (approximately)
INSERT IGNORE INTO `user_details` (`id`, `contact`, `address`, `birthdate`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, '097878654321', 'Antipolo City', '1995-08-05', 1, '2025-03-25 23:44:14', '2025-03-25 23:44:14'),
	(5, '09757595137', 'Antipolo City', '2002-01-23', 5, '2025-03-26 17:38:44', '2025-03-26 17:38:44'),
	(6, '09878765432', 'Antipolo City', '2002-12-09', 6, '2025-03-26 17:40:13', '2025-03-26 17:40:13'),
	(7, '09767654321', 'Antipolo', '1995-08-05', 7, '2025-03-26 18:01:31', '2025-03-26 18:01:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
