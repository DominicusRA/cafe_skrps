/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.19-MariaDB : Database - cafe
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cafe` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `cafe`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama`,`username`,`password`) values 
(4,'Admin','21232f297a57a5a743894a0e4a801fc3','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `bahan` */

DROP TABLE IF EXISTS `bahan`;

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(50) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `kode_bahan` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_bahan`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bahan` */

insert  into `bahan`(`id_bahan`,`nama_bahan`,`satuan`,`kode_bahan`) values 
(25,'Kopi',NULL,'BHN/001'),
(26,'Susu Kental',NULL,'BHN/002'),
(27,'Susu Cair',NULL,'BHN/003'),
(28,'Butterscotch',NULL,'BHN/004'),
(29,'Vanila',NULL,'BHN/005'),
(30,'Sirup hazelnut',NULL,'BHN/006'),
(31,'Gula Pasir',NULL,'BHN/007'),
(32,'Sirup pisang',NULL,'BHN/008'),
(33,'Kayu manis',NULL,'BHN/009'),
(34,'Gula aren',NULL,'BHN/010'),
(35,'Sirup Rum',NULL,'BHN/011'),
(36,'Biskuit',NULL,'BHN/012'),
(37,'Coklat',NULL,'BHN/013'),
(38,'Yogurt',NULL,'BHN/014'),
(39,'Sirup strawberry',NULL,'BHN/015');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `kode_menu` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`kode_menu`,`nama`) values 
(23,'MNU/001','Espresso'),
(24,'MNU/002','Americano'),
(25,'MNU/003','Vietnam Drip'),
(26,'MNU/004','Cappucino'),
(27,'MNU/005','v60'),
(28,'MNU/006','Butterscot'),
(29,'MNU/007','Hazelnut Latte'),
(30,'MNU/008','Kopi Gedang Ambon'),
(31,'MNU/009','Kopi Gula Aren'),
(32,'MNU/010','Susu Rum Regal'),
(33,'MNU/011','Choco Banana'),
(34,'MNU/012','Dark Choco'),
(35,'MNU/013','Choco Regal'),
(36,'MNU/014','Susu Kanan');

/*Table structure for table `menu_nota` */

DROP TABLE IF EXISTS `menu_nota`;

CREATE TABLE `menu_nota` (
  `id_mnu` int(11) DEFAULT NULL,
  `id_nota` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `menu_nota` */

/*Table structure for table `nota` */

DROP TABLE IF EXISTS `nota`;

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_nota` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `nota` */

/*Table structure for table `resep` */

DROP TABLE IF EXISTS `resep`;

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL AUTO_INCREMENT,
  `id_bahan` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `takaran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_resep`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;

/*Data for the table `resep` */

insert  into `resep`(`id_resep`,`id_bahan`,`id_menu`,`takaran`) values 
(30,25,23,18),
(31,25,24,18),
(32,25,25,12),
(33,26,25,45),
(34,25,26,15),
(35,27,26,150),
(36,25,27,15),
(37,25,28,12),
(38,27,28,300),
(39,28,28,45),
(40,29,28,8),
(41,25,29,12),
(42,27,29,100),
(43,30,29,30),
(44,31,29,14),
(45,25,30,12),
(46,27,30,200),
(47,31,30,14),
(48,32,30,30),
(49,33,30,4),
(50,25,31,12),
(51,27,31,100),
(52,34,31,50),
(53,26,32,45),
(54,27,32,200),
(55,35,32,15),
(56,36,32,4),
(57,27,33,200),
(58,32,33,30),
(59,37,33,14),
(60,37,34,28),
(61,27,35,200),
(62,36,35,4),
(63,37,35,0),
(64,27,36,200),
(65,38,36,30),
(66,39,36,15);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
