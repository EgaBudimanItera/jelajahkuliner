/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.25 : Database - jelajah_kuliner
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`jelajah_kuliner` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jelajah_kuliner`;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(128) NOT NULL,
  `deskripsi_kategori` text NOT NULL,
  `foto_kategori` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`deskripsi_kategori`,`foto_kategori`,`created_at`) values (1,'Restourant Mahal','Suatu tempat atau bangunan yang diorganisasi secara komersial yang menyelenggarakan pelayanan yang baik','kat11.jpg','2018-08-14 22:31:46'),(2,'Cafe','Suatu restoran kecil yang mengutamakan penjualan cake (kue-kue, sandwich, roti, kopi, dan teh.','kat2.jpg','2018-08-14 22:33:51'),(3,'Rumah Makan','Menyajikan hidangan kepada masyarakat dan menyediakan tempat untuk menikmati hidangan tersebut','kat3.jpg','2018-08-14 22:34:56'),(4,'Jajanan','Makanan dan minuman yang diolah oleh pengrajin makanan di tempat penjualan dan atau disajikan sebagai makanan siap santap. ','kat4.jpg','2018-08-14 23:03:19'),(5,'Coffee Shop','Utamanya menyediakan tempat untuk minum kopi dan teh.','kat5.jpg','2018-08-14 23:06:25');

/*Table structure for table `kuliner` */

DROP TABLE IF EXISTS `kuliner`;

CREATE TABLE `kuliner` (
  `id_kuliner` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kuliner` varchar(512) NOT NULL,
  `deskripsi_kuliner` text NOT NULL,
  `menu_andalan` text NOT NULL,
  `kisaran_harga` text NOT NULL,
  `alamat` text NOT NULL,
  `foto_kuliner` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `lat_kuliner` decimal(10,8) DEFAULT NULL,
  `lng_kuliner` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kuliner`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `kuliner` */

insert  into `kuliner`(`id_kuliner`,`nama_kuliner`,`deskripsi_kuliner`,`menu_andalan`,`kisaran_harga`,`alamat`,`foto_kuliner`,`id_kategori`,`lat_kuliner`,`lng_kuliner`,`created_at`) values (1,'Mie Ayam Apollo','Mie ayam dengan ayam asli','Mie Ayam Apollo','Rp 50.000-80.000','Jalan Raya Makassar 6','mie-ayam-di-jakarta-timur-01.jpg',1,'-5.41768900','105.25152460','2018-08-14 22:06:10'),(5,'Pecel Lele GGG','Pecel lele enak dan sehat','Pecel Lele','Rp 10.000 - Rp 70.000','Jln BKP X','pecel-lele_20151025_2121015.jpg',3,'-5.37518505','105.21325824','2018-08-17 13:56:22');

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `profil` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `profil` */

insert  into `profil`(`id`,`foto`,`profil`) values (1,'AlexBeutel-small.png','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. ');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
