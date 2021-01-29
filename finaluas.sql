-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tutorial
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_activation_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_activation_attempts`
--

LOCK TABLES `auth_activation_attempts` WRITE;
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups`
--

LOCK TABLES `auth_groups` WRITE;
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` VALUES (1,'member','Read only'),(2,'admin','Full CRUD');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_permissions`
--

LOCK TABLES `auth_groups_permissions` WRITE;
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_users` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (1,1),(1,6),(1,7),(2,5);
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'127.0.0.1','pet.santino@gmail.com',NULL,'2021-01-07 08:18:35',0),(2,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-07 08:18:53',1),(3,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-07 08:27:48',1),(4,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-07 08:31:03',1),(5,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-07 08:31:16',1),(6,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-07 17:05:09',1),(7,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-07 17:28:34',1),(8,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-07 17:28:45',1),(9,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-07 18:30:33',1),(10,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-08 01:31:33',1),(11,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-08 02:14:11',1),(12,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-08 19:10:38',1),(13,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-08 23:51:53',1),(14,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-09 02:59:21',1),(15,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-09 22:36:55',1),(16,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-11 19:24:23',1),(17,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-11 21:54:29',1),(18,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-13 20:02:58',1),(19,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-14 07:20:42',1),(20,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-14 19:31:46',1),(21,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-15 00:55:02',1),(22,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-15 06:14:57',1),(23,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-15 06:33:46',1),(24,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-16 08:39:21',1),(25,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-16 08:39:52',1),(26,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-16 08:41:53',1),(27,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-16 09:06:35',1),(28,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-16 09:09:55',1),(29,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-16 17:50:14',1),(30,'127.0.0.1','admin',NULL,'2021-01-16 19:22:42',0),(31,'127.0.0.1','pet.santino2@gmail.com',NULL,'2021-01-16 19:22:54',0),(32,'127.0.0.1','admin',NULL,'2021-01-16 19:22:57',0),(33,'127.0.0.1','pet.santino2@gmail.com',4,'2021-01-16 19:42:08',1),(34,'127.0.0.1','admin',NULL,'2021-01-16 20:09:02',0),(35,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-16 20:09:24',1),(36,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-16 22:48:05',1),(37,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-16 22:56:49',1),(38,'127.0.0.1','patricks@upnvj.ac.id',6,'2021-01-16 23:38:20',1),(39,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-17 01:29:39',1),(40,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-17 03:18:33',1),(41,'127.0.0.1','patricks@upnvj.ac.id',6,'2021-01-17 04:35:20',1),(42,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-17 04:39:08',1),(43,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-17 05:16:51',1),(44,'127.0.0.1','test123@gmail.com',7,'2021-01-17 07:30:53',1),(45,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-17 07:42:57',1),(46,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-19 20:12:51',1),(47,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-20 02:54:36',1),(48,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-25 09:00:56',1),(49,'127.0.0.1','pet.santino@gmail.com',1,'2021-01-25 09:12:01',1),(50,'127.0.0.1','pet.santino2@gmail.com',5,'2021-01-26 04:26:11',1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions`
--

LOCK TABLES `auth_permissions` WRITE;
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_reset_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_reset_attempts`
--

LOCK TABLES `auth_reset_attempts` WRITE;
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_tokens`
--

LOCK TABLES `auth_tokens` WRITE;
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_users_permissions` (
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_users_permissions`
--

LOCK TABLES `auth_users_permissions` WRITE;
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(20) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (3,'SGRD4532','Semen Tiga Roda','Sak','60000',100),(4,'TRPL4444','Triplek 4mm','Lembar','50000',250),(5,'TRPL6666','Triplek 6mm','Lembar','70000',250),(10,'TRPL9999','Triplek 9mm','Lembar','95000',250),(11,'BTBT1515','Batu Bata Merah','Buah','5000',5000),(13,'BTKO1736','Batako','Buah','2000',2000);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (2,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1610017162,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penjualan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_penjualan` varchar(8) NOT NULL,
  `kode_barang` varchar(45) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `jumlah_terjual` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES (1,'TRAN0001','BTBT1515','2021-01-14',200),(2,'TRAN0001','SGRD4532','2021-01-14',3),(3,'TRAN0002','TRPL6666','2021-01-15',10),(4,'TRAN0003','TRPL6666','2020-09-23',20),(5,'TRAN0003','BTKO1736','2020-09-23',500),(6,'TRAN0004','TRPL4444','2020-12-25',50),(7,'TRAN0004','TRPL6666','2020-12-25',50),(8,'TRAN0005','BTKO1736','2020-11-04',750),(9,'TRAN0006','BTBT1515','2020-11-08',250),(10,'TRAN0006','SGRD4532','2020-11-08',4),(11,'TRAN0007','BTBT1515','2020-10-12',1000),(12,'TRAN0007','SGRD4532','2020-10-12',12),(13,'TRAN0008','SGRD4532','2021-01-08',25),(14,'TRAN0009','SGRD4532','2021-01-17',10),(15,'TRAN0010','BTBT1515','2021-01-20',600),(16,'TRAN0010','BTKO1736','2021-01-20',200),(17,'TRAN0010','BTBT1515','2021-01-20',300);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` int unsigned NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `age` varchar(2) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_profiles_users_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'Patrick Santino','19','Laki-laki','081316472184','https://akademik.upnvj.ac.id/app/get_foto_mahasiswa/87490'),(5,'Ronaldo','19','Laki-laki','081316472184','https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Cristiano_Ronaldo_2018.jpg/399px-Cristiano_Ronaldo_2018.jpg'),(6,'Patrick Santino','19','Laki-laki','081316472184','https://akademik.upnvj.ac.id/app/get_foto_mahasiswa/87490'),(7,'Patrick Santino S','19','Laki-laki','081316472184','https://akademik.upnvj.ac.id/app/get_foto_mahasiswa/87490');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pet.santino@gmail.com','sotobakar','$2y$10$pPGUhQnNeejtAR3sHu4ri.5AWOc7m76VcMkUF90cvEhK0fxMHVDBS',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2021-01-07 08:18:46','2021-01-07 08:18:46',NULL),(5,'pet.santino2@gmail.com','admin','$2y$10$dhFniuHtMtapVzkQJFtWDO3IVE2iko9BUXX2I5c/rJkmZvcRHnPpq',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2021-01-16 20:09:17','2021-01-16 20:09:17',NULL),(6,'patricks@upnvj.ac.id','sotobakar1','$2y$10$JAbHkc.rrcexj1jHuLDb9upfFcmj.W57fJscD0xifPXL/hxu8fJzS',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2021-01-16 23:00:20','2021-01-16 23:00:20',NULL),(7,'test123@gmail.com','test123','$2y$10$ds8SLIhRYChJN0C7z9zb5udhla7SdAD6K2YR8EqWM1j76.X8UlDkG',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2021-01-17 07:30:32','2021-01-17 07:30:32',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'tutorial'
--

--
-- Dumping routines for database 'tutorial'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-28 17:57:53
