/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.21-MariaDB : Database - laravel54mnmvrs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel54mnmvrs` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `laravel54mnmvrs`;

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `brands` */

insert  into `brands`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'Ford',NULL,NULL,NULL),(2,'Audi',NULL,NULL,NULL),(3,'BMW',NULL,NULL,NULL),(4,'Mercedes',NULL,NULL,NULL),(5,'Honda',NULL,NULL,NULL);

/*Table structure for table `colors` */

DROP TABLE IF EXISTS `colors`;

CREATE TABLE `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hexcode` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `colors` */

insert  into `colors`(`id`,`name`,`hexcode`,`created_at`,`updated_at`) values (1,'Blue','#0000FF',NULL,NULL),(2,'Red','#FF0000',NULL,NULL),(3,'Green','#00FF00',NULL,NULL),(4,'Yellow','#FFFF00',NULL,NULL),(5,'Purple','#800080',NULL,NULL),(6,'Orange','#FFA500',NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_07_04_184655_create_table_vechiles',1),(4,'2017_07_04_185557_create_table_brands',1),(5,'2017_07_04_185623_create_table_models',1),(6,'2017_07_04_185734_create_table_vtypes',1),(7,'2017_07_04_190246_create_table_colors',1);

/*Table structure for table `models` */

DROP TABLE IF EXISTS `models`;

CREATE TABLE `models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brands_id` int(11) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brandsidmodels` (`brands_id`),
  CONSTRAINT `brandsidmodels` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `models` */

insert  into `models`(`id`,`brands_id`,`name`,`description`,`created_at`,`updated_at`) values (1,1,'Focus',NULL,NULL,NULL),(2,1,'Fiesta',NULL,NULL,NULL),(4,1,'Mondeo',NULL,NULL,NULL),(5,1,'Mustang',NULL,NULL,NULL),(6,2,'A3',NULL,NULL,NULL),(7,2,'A4',NULL,NULL,NULL),(8,2,'A5',NULL,NULL,NULL),(9,2,'A6',NULL,NULL,NULL),(10,2,'A7',NULL,NULL,NULL),(11,2,'A8',NULL,NULL,NULL),(12,3,'3.20',NULL,NULL,NULL),(13,3,'1.18',NULL,NULL,NULL),(14,3,'5.20',NULL,NULL,NULL),(15,3,'5.30',NULL,NULL,NULL),(16,3,'Z4',NULL,NULL,NULL),(17,3,'Z5',NULL,NULL,NULL),(18,4,'A180',NULL,NULL,NULL),(19,4,'C200',NULL,NULL,NULL),(20,4,'C300',NULL,NULL,NULL),(21,4,'E180',NULL,NULL,NULL),(23,4,'CLA',NULL,NULL,NULL),(24,5,'Civic',NULL,NULL,NULL),(25,5,'Jazz',NULL,NULL,NULL),(26,5,'Accord',NULL,NULL,NULL),(27,5,'TypeR',NULL,NULL,NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'kralcs','kralcs@gmail.com','$2y$10$xGQnHCPe2cCtVqNPlNeJdus.Nh.Ory/eqKUw.vja9ASvELoCSqQxm',NULL,'2017-07-04 20:57:00','2017-07-04 20:57:00');

/*Table structure for table `vechiles` */

DROP TABLE IF EXISTS `vechiles`;

CREATE TABLE `vechiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plate` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brands_id` int(10) unsigned NOT NULL,
  `models_id` int(10) unsigned NOT NULL,
  `modelyear` int(11) NOT NULL,
  `vtypes_id` int(10) unsigned NOT NULL,
  `colors_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vechiles_plate_unique` (`plate`),
  KEY `modelsidvechiles` (`models_id`),
  KEY `vtypesidvechiles` (`vtypes_id`),
  KEY `colorsidvechiles` (`colors_id`),
  KEY `usersidvechiles` (`users_id`),
  KEY `brandsidvechiles` (`brands_id`),
  CONSTRAINT `brandsidvechiles` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  CONSTRAINT `colorsidvechiles` FOREIGN KEY (`colors_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `modelsidvechiles` FOREIGN KEY (`models_id`) REFERENCES `models` (`id`) ON DELETE CASCADE,
  CONSTRAINT `usersidvechiles` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `vtypesidvechiles` FOREIGN KEY (`vtypes_id`) REFERENCES `vtypes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vechiles` */

insert  into `vechiles`(`id`,`plate`,`nickname`,`brands_id`,`models_id`,`modelyear`,`vtypes_id`,`colors_id`,`status`,`users_id`,`created_at`,`updated_at`) values (1,'35HB2951','MYFocus',1,1,2008,1,1,1,1,NULL,NULL),(4,'35ar0965','kalos',1,1,2005,1,1,1,1,'2017-07-07 11:34:27','2017-07-07 11:34:27'),(6,'35HB42951','MYFocus',1,1,2008,1,1,1,1,'2017-07-07 12:00:29','2017-07-07 12:00:29'),(9,'sdfds','fdsf',1,1,2010,1,1,0,1,'2017-07-08 09:56:24','2017-07-08 09:56:24'),(11,'34gfew32','saddfdhd',3,17,2011,1,2,1,1,'2017-07-08 15:33:19','2017-07-08 15:33:19'),(12,'gerg','ergter',1,2,2001,1,4,1,1,'2017-07-08 15:47:52','2017-07-08 15:47:52'),(13,'d','rger',2,2,2007,1,1,1,1,'2017-07-08 16:07:28','2017-07-08 16:07:28'),(14,'sdfg','sdf',1,1,2010,1,4,1,1,'2017-07-08 16:10:53','2017-07-08 16:10:53'),(17,'sdfgdsgdfs','sdf',1,1,2010,1,4,1,1,'2017-07-08 16:18:05','2017-07-08 16:18:05'),(18,'fghjk','fghjk',1,2,3456,1,6,1,1,'2017-07-08 16:23:13','2017-07-08 16:23:13'),(20,'wgwe','gwe',3,2,324,1,2,1,1,'2017-07-08 17:20:01','2017-07-08 17:20:01');

/*Table structure for table `vtypes` */

DROP TABLE IF EXISTS `vtypes`;

CREATE TABLE `vtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vtypes` */

insert  into `vtypes`(`id`,`name`,`description`,`created_at`,`updated_at`) values (1,'Cars',NULL,NULL,NULL),(2,'Motorcycles',NULL,NULL,NULL),(3,'Bus',NULL,NULL,NULL),(4,'SUV',NULL,NULL,NULL),(5,'Tractor',NULL,NULL,NULL),(6,'Truck',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
