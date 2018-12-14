-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: administrador_2
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria_media`
--

DROP TABLE IF EXISTS `categoria_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_categoria_media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_categoria_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_media`
--

LOCK TABLES `categoria_media` WRITE;
/*!40000 ALTER TABLE `categoria_media` DISABLE KEYS */;
INSERT INTO `categoria_media` VALUES (1,'Categoría 1','Descripción de categoría 1','2017-10-27 12:52:15','2017-11-02 00:43:17'),(2,'categoria 2','Descripción de categoría 2','2017-11-02 00:42:44','2017-11-02 00:42:44'),(3,'Categoria 3','fasf bsds nfsn sd g fg dghd hgd  dhdf','2017-11-08 05:30:31','2017-11-08 05:30:31'),(4,'rejas jardin dewrsfsf','gdgdfgdfgd vg dg  hdffhfd','2017-11-15 21:01:23','2018-08-27 20:41:28');
/*!40000 ALTER TABLE `categoria_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estatus`
--

DROP TABLE IF EXISTS `estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estatus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus`
--

LOCK TABLES `estatus` WRITE;
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` VALUES (1,'Activo','Estado Activado','2017-11-13 23:38:48','2017-11-13 23:38:48');
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_10_27_014233_create_tipo_media_table',1),(4,'2017_10_27_091311_create_categoria_media_table',2),(6,'2017_10_27_103100_create_multi_media_table',3),(7,'2017_11_13_162511_create_Estatus_table',4),(8,'2017_11_13_163822_create_Rol_table',4),(9,'2017_11_13_163904_create_Usuario_table',4),(11,'2018_10_01_193130_create_puntaje_table',5),(12,'2018_10_05_082236_create_notas_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_multimedia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_multimedia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_media_id` int(10) unsigned NOT NULL,
  `tipo_media_id` int(10) unsigned NOT NULL,
  `multimedia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `multimedia_categoria_media_id_foreign` (`categoria_media_id`),
  KEY `multimedia_tipo_media_id_foreign` (`tipo_media_id`),
  CONSTRAINT `multimedia_categoria_media_id_foreign` FOREIGN KEY (`categoria_media_id`) REFERENCES `categoria_media` (`id`),
  CONSTRAINT `multimedia_tipo_media_id_foreign` FOREIGN KEY (`tipo_media_id`) REFERENCES `tipo_media` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia`
--

LOCK TABLES `multimedia` WRITE;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
INSERT INTO `multimedia` VALUES (1,'Titulo 1','asdasdasda dfxdg  dgd',4,3,'1544743892.mp4','2017-10-27 19:10:24','2018-12-14 02:31:33'),(2,'melisa','dADASDASDAFDASD',1,2,'H8b_M4ngOw8','2017-11-01 02:44:45','2018-10-06 06:28:36'),(3,'vc<sdxfsd fsfsdfd','dddddddasd',1,2,'GO53tkuvtpg','2017-11-01 02:50:02','2018-12-14 05:02:50'),(4,'sdfdsfsdfsd','fsdfdsfsdsdfsdfsdfsd  sgd g gdfg',1,3,'1544743913.mp4','2017-11-01 03:33:35','2018-12-14 02:31:54'),(5,'ad','sdadsadsad',1,1,'ad1415.jpg','2017-11-01 03:48:10','2017-12-01 12:06:36'),(6,'prueba1 xxxxx','ccccc',2,1,'prueba19331.jpeg','2017-11-01 03:58:14','2018-10-06 01:17:32'),(9,'helloween king diamond','fasfs fs dfsdfsd',1,2,'Pcqx2oFzvfQ','2017-11-01 19:27:36','2018-07-14 03:53:04'),(10,'zfsd fdfsdgfds','cauros satanicos que aportan al metal cundo brocas cauros satanicos que aportan al metal cundo brocas',2,1,'zfsd_fdfsdgfds0023.jpg','2017-11-01 19:28:59','2018-12-14 03:32:39'),(11,'video gato','csdfdsfsd  sfsd  safdfsd fsd',2,1,'video_gato6893.jpg','2017-11-01 23:43:52','2018-12-14 03:59:10'),(12,'Gato','Se crean dos tablas desde la consola con sus debidos atributos, la primera tabla se denomino Cliente con su primary key y demas elementos, luego se creo otra tabla para hacerle su respectivo undex se creo la relacion y se corrigieron errores.',1,1,'Gato2140.png','2017-11-02 00:27:49','2018-12-14 03:32:00'),(13,'Metallica - Monsters Of Rock, Moscow 1991','Largest crowd Metallica has ever played for with an estimated 1.6 million people.',3,3,'1544747590.mp4','2017-11-04 00:43:36','2018-12-14 03:33:10'),(15,'borrate  x','gjg jgh gjhg',4,1,'borrate__x3340.jpg','2017-11-08 02:12:26','2018-12-14 03:58:41'),(16,'fssf','fsdfsdfsdfs',1,2,'n5_vrProhoY','2017-11-08 02:16:57','2018-12-14 05:03:48'),(18,'Helloween Pumpkins United- Santiago Chile 5 nov 2017','Helloween Pumpkins United Teatro Caupolican Santiago Chile',1,2,'EKyBvyRV2zA','2017-11-08 04:04:12','2018-07-18 04:15:24'),(19,'<zc<czxc','xdbs gvx cbxb',3,1,'<zc<czxc9858.jpg','2017-11-08 05:28:02','2017-11-29 10:08:21'),(20,'xxxx x','z<x zcvxv xgdgg',1,2,'NG_qF2mHOlA','2017-11-15 20:56:34','2018-12-14 04:00:30'),(21,'nombre de prueba','csdv sdgdf gdgdgdgh gdgdfg',3,1,'nombre de prueba3806.jpg','2017-11-29 10:30:39','2017-11-29 10:30:39'),(22,'Nuevo','as djghjgjgk   jgh',1,3,'1544747801.mp4','2018-03-28 02:26:53','2018-12-14 03:36:41'),(23,'sdgdfg','gfdgdfgfdmgfjgj',2,2,'_Jtpf8N5IDE','2018-03-28 02:27:54','2018-12-14 03:36:11'),(24,'sd fbbdgd','fdhdf bdbnd hdf',1,1,'sd_fbbdgd3809.jpeg','2018-03-28 02:28:46','2018-12-14 03:58:05'),(25,'ASAsA','<ZCZ XVXVX',4,1,'ASAsA9350.jpg','2018-03-29 07:44:46','2018-12-14 03:35:04');
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (2,'ascad','2018-10-08 07:31:38','2018-10-08 07:31:38'),(3,'xxxx','2018-12-13 22:11:08','2018-12-13 22:11:08');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('pinki@pinki.cl','$2y$10$vrV.JOxkr9CS9JUvyH/Go.owVGI4B3dj.tZBKaB8FgbSvrcv19whm','2017-11-28 00:37:40');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntaje`
--

DROP TABLE IF EXISTS `puntaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puntaje` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `puntaje` int(11) NOT NULL,
  `multimedia_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `puntaje_multimedia_id_foreign` (`multimedia_id`),
  CONSTRAINT `puntaje_multimedia_id_foreign` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntaje`
--

LOCK TABLES `puntaje` WRITE;
/*!40000 ALTER TABLE `puntaje` DISABLE KEYS */;
INSERT INTO `puntaje` VALUES (1,1,6,'2018-10-01 23:48:09','2018-10-01 23:48:09'),(2,1,4,'2018-10-01 23:49:57','2018-10-01 23:49:57'),(3,2,3,'2018-10-01 23:55:21','2018-10-01 23:55:21'),(4,3,4,'2018-10-01 23:55:43','2018-10-01 23:55:43'),(5,2,6,'2018-10-02 01:13:09','2018-10-02 01:13:09'),(6,3,6,'2018-10-02 01:13:25','2018-10-02 01:13:25'),(7,2,2,'2018-10-02 01:35:28','2018-10-02 01:35:28'),(8,2,2,'2018-10-02 01:35:42','2018-10-02 01:35:42'),(9,1,5,'2018-10-02 01:40:00','2018-10-02 01:40:00'),(10,2,2,'2018-10-02 01:58:44','2018-10-02 01:58:44'),(11,1,5,'2018-10-02 02:28:26','2018-10-02 02:28:26'),(12,1,5,'2018-10-02 02:28:38','2018-10-02 02:28:38'),(13,1,2,'2018-10-02 02:28:55','2018-10-02 02:28:55'),(14,1,1,'2018-10-02 02:53:22','2018-10-02 02:53:22'),(15,2,1,'2018-10-02 02:54:40','2018-10-02 02:54:40'),(16,2,3,'2018-10-02 02:55:57','2018-10-02 02:55:57'),(17,3,3,'2018-10-02 02:56:10','2018-10-02 02:56:10'),(18,1,1,'2018-10-02 03:15:45','2018-10-02 03:15:45'),(19,2,1,'2018-10-02 03:15:52','2018-10-02 03:15:52'),(20,2,4,'2018-10-02 03:16:12','2018-10-02 03:16:12'),(21,2,1,'2018-10-02 03:17:04','2018-10-02 03:17:04'),(22,1,2,'2018-10-02 03:17:18','2018-10-02 03:17:18'),(23,3,1,'2018-10-02 03:21:42','2018-10-02 03:21:42'),(24,1,1,'2018-10-02 03:22:24','2018-10-02 03:22:24'),(25,2,2,'2018-10-02 03:25:36','2018-10-02 03:25:36'),(26,3,1,'2018-10-02 04:53:41','2018-10-02 04:53:41'),(27,1,1,'2018-10-02 05:04:08','2018-10-02 05:04:08'),(28,3,1,'2018-10-02 05:04:17','2018-10-02 05:04:17'),(29,1,2,'2018-10-02 05:18:29','2018-10-02 05:18:29'),(30,1,1,'2018-10-02 05:18:29','2018-10-02 05:18:29'),(31,1,2,'2018-10-02 05:18:31','2018-10-02 05:18:31'),(32,1,1,'2018-10-02 05:18:32','2018-10-02 05:18:32'),(33,1,1,'2018-10-02 05:18:32','2018-10-02 05:18:32'),(34,1,1,'2018-10-02 05:18:33','2018-10-02 05:18:33'),(35,1,1,'2018-10-02 05:18:34','2018-10-02 05:18:34'),(36,1,1,'2018-10-02 05:18:34','2018-10-02 05:18:34'),(37,1,1,'2018-10-02 05:18:35','2018-10-02 05:18:35'),(38,1,1,'2018-10-02 05:18:35','2018-10-02 05:18:35'),(39,1,2,'2018-10-02 05:18:36','2018-10-02 05:18:36'),(40,1,1,'2018-10-02 05:18:37','2018-10-02 05:18:37'),(41,1,2,'2018-10-02 05:19:49','2018-10-02 05:19:49'),(42,1,1,'2018-10-02 05:19:50','2018-10-02 05:19:50'),(43,1,1,'2018-10-02 05:27:21','2018-10-02 05:27:21'),(44,1,1,'2018-10-02 05:27:21','2018-10-02 05:27:21'),(45,1,1,'2018-10-02 05:27:22','2018-10-02 05:27:22'),(46,1,2,'2018-10-02 05:27:23','2018-10-02 05:27:23'),(47,1,2,'2018-10-02 05:30:39','2018-10-02 05:30:39'),(48,1,2,'2018-10-02 05:30:40','2018-10-02 05:30:40'),(49,1,1,'2018-10-02 05:30:42','2018-10-02 05:30:42'),(50,1,1,'2018-10-02 05:30:43','2018-10-02 05:30:43'),(51,1,2,'2018-10-02 05:32:31','2018-10-02 05:32:31'),(52,1,1,'2018-10-02 05:32:32','2018-10-02 05:32:32'),(53,1,1,'2018-10-02 05:32:34','2018-10-02 05:32:34'),(54,1,1,'2018-10-02 05:33:41','2018-10-02 05:33:41'),(55,1,1,'2018-10-02 05:33:42','2018-10-02 05:33:42'),(56,1,3,'2018-10-02 05:41:42','2018-10-02 05:41:42'),(57,1,3,'2018-10-02 05:41:42','2018-10-02 05:41:42'),(58,1,3,'2018-10-02 05:41:43','2018-10-02 05:41:43'),(59,1,3,'2018-10-02 05:41:43','2018-10-02 05:41:43'),(60,1,3,'2018-10-02 05:41:55','2018-10-02 05:41:55'),(61,1,3,'2018-10-02 05:41:55','2018-10-02 05:41:55'),(62,1,3,'2018-10-02 05:41:56','2018-10-02 05:41:56'),(63,1,3,'2018-10-02 05:41:56','2018-10-02 05:41:56'),(64,1,2,'2018-10-02 05:44:31','2018-10-02 05:44:31'),(65,1,6,'2018-10-02 05:46:19','2018-10-02 05:46:19'),(66,1,9,'2018-10-02 05:46:30','2018-10-02 05:46:30'),(67,1,9,'2018-10-02 05:46:32','2018-10-02 05:46:32'),(68,2,6,'2018-10-02 05:47:16','2018-10-02 05:47:16'),(69,1,6,'2018-10-02 05:47:22','2018-10-02 05:47:22'),(70,1,1,'2018-10-02 05:56:21','2018-10-02 05:56:21'),(71,2,1,'2018-10-02 05:56:29','2018-10-02 05:56:29'),(72,2,2,'2018-10-02 06:20:17','2018-10-02 06:20:17'),(73,2,6,'2018-10-02 06:21:38','2018-10-02 06:21:38'),(74,2,4,'2018-11-28 01:13:52','2018-11-28 01:13:52');
/*!40000 ALTER TABLE `puntaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'admin','Administrador','2017-11-13 23:25:51','2017-11-13 23:25:51'),(2,'Editor','Solo edita contenidos del sitio','2017-12-01 06:42:47','2017-12-01 06:42:47');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_media`
--

DROP TABLE IF EXISTS `tipo_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_tipo_media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_tipo_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_media`
--

LOCK TABLES `tipo_media` WRITE;
/*!40000 ALTER TABLE `tipo_media` DISABLE KEYS */;
INSERT INTO `tipo_media` VALUES (1,'imagen','Para subir archivos de tipo de imagen','2017-10-27 08:50:41','2017-11-02 01:10:56'),(2,'youtube','Se debe agregar la url de vídeo de youtube','2017-10-27 11:29:40','2017-11-02 01:10:32'),(3,'video','Para subir  archivos de tipo de video','2017-11-01 18:09:32','2017-11-02 01:09:59');
/*!40000 ALTER TABLE `tipo_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pepe','pepe@tapia.cl','$2y$10$6Jxej51wHTPaPXfbjeDbLudTst7zcsJ7ihz1HwYja5s3lFHlewFDe','roJ1gHEMKrttWWogf1UzqXqEvFW1xqUGXWeW4StY3KHlj6PSUxTfst7YsfRk','2017-11-22 22:43:56','2017-11-22 22:43:56'),(2,'Cristian','camilo.attack@gmail.com','$2y$10$4jU6RYt8wGuHTh4E2POTS.BzoblJpl.L1cT08TE1KgQ5drd3TSIIW','J0blYTub5z8gfRUv57da7bqzBe46cQ8iKt1Xz5oKqfj0S37KjpcgHsNtrHof','2018-10-06 01:10:32','2018-10-06 01:10:32'),(3,'Camilo','camilo.attack2@gmail.com','$2y$10$HRoLXo4OZFTQ5RSqKqwcieJWK8t7sHTa8FRIV/gUA6bPql66/h34i','csrYKissB06lhXvkAW17kpwJwpGoMAx4lCxB9csTqlcOcxCpnveXzFxqarz2','2018-12-14 02:18:58','2018-12-14 02:18:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_id` int(10) unsigned NOT NULL,
  `estatus_id` int(10) unsigned NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ape_pater` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ape_mater` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rut` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_rut_unique` (`rut`),
  UNIQUE KEY `usuario_password_unique` (`password`),
  KEY `usuario_rol_id_foreign` (`rol_id`),
  KEY `usuario_estatus_id_foreign` (`estatus_id`),
  CONSTRAINT `usuario_estatus_id_foreign` FOREIGN KEY (`estatus_id`) REFERENCES `estatus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `usuario_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,1,'PinkiMetal','werwer','ewtwtwe','234324','pinki@pinki.cl','1231313','$2y$10$AgVHChcuR8TNSA/g6jiY5ukW7aNjDbRy465DTk5ATG/bSuXONMNti','NtJrLSJ8lZHT0kTcvcspvQMnGDIME1RsJAg1EE5W48bhvZxOtg5VSjjbXeph','2017-11-14 00:53:49','2017-11-22 22:40:27'),(2,1,1,'camilo','paterno','materno','123','camilo.attack123@gmail.com','123','$2y$10$zYN7OpYzRcmSKIBHa6S7refj9LAyS15ZWvju5oNM6u2rDqjWdyLyO',NULL,'2018-12-14 02:08:48','2018-12-14 02:08:48');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-14  0:25:04
