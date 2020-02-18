/*
SQLyog Community v8.71 
MySQL - 5.0.19-nt : Database - micanje_cup
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`micanje_cup` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `micanje_cup`;

/*Table structure for table `auditoria` */

DROP TABLE IF EXISTS `auditoria`;

CREATE TABLE `auditoria` (
  `aud_cod` int(11) NOT NULL auto_increment,
  `aud_ip` varchar(15) default NULL,
  `usu_cod` varchar(20) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  PRIMARY KEY  (`aud_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `auditoria` */

LOCK TABLES `auditoria` WRITE;

insert  into `auditoria`(`aud_cod`,`aud_ip`,`usu_cod`,`fecha`,`hora`) values (1,'127.0.0.1','admin@admin.com','2016-03-28','13:24:56'),(2,'127.0.0.1','admin@admin.com','2016-03-28','13:25:44'),(3,'127.0.0.1','admin@admin.com','2016-03-28','17:57:52'),(4,'127.0.0.1','admin@admin.com','2016-04-05','12:35:13'),(5,'127.0.0.1','admin@admin.com','2016-04-06','15:32:23'),(6,'127.0.0.1','admin@admin.com','2016-04-07','11:36:37'),(7,'127.0.0.1','admin@admin.com','2016-04-07','13:46:14'),(8,'127.0.0.1','admin@admin.com','2016-04-11','11:29:08'),(9,'127.0.0.1','admin@admin.com','2016-04-12','11:51:08'),(10,'127.0.0.1','admin@admin.com','2016-04-13','14:32:26'),(11,'127.0.0.1','admin@admin.com','2016-04-14','11:40:49'),(12,'127.0.0.1','admin@admin.com','2016-04-15','10:55:10'),(13,'127.0.0.1','admin@admin.com','2016-04-15','22:26:12'),(14,'127.0.0.1','admin@admin.com','2016-04-17','15:49:52'),(15,'127.0.0.1','admin@admin.com','2016-04-18','13:11:45'),(16,'127.0.0.1','admin@admin.com','2016-04-19','09:44:49'),(17,'127.0.0.1','admin@admin.com','2016-04-19','10:17:22'),(18,'127.0.0.1','admin@admin.com','2016-04-19','10:19:23'),(19,'127.0.0.1','admin@admin.com','2016-04-19','10:19:33'),(20,'127.0.0.1','admin@admin.com','2016-04-19','15:07:53'),(21,'127.0.0.1','admin@admin.com','2016-04-19','16:49:32'),(22,'127.0.0.1','admin@admin.com','2016-04-19','16:52:01'),(23,'127.0.0.1','admin@admin.com','2016-04-19','17:18:31'),(24,'127.0.0.1','admin@admin.com','2016-04-19','17:18:39'),(25,'127.0.0.1','admin@admin.com','2016-04-20','09:41:31'),(26,'127.0.0.1','admin@admin.com','2016-04-20','11:01:48'),(27,'127.0.0.1','admin@admin.com','2016-04-21','09:49:05'),(28,'127.0.0.1','admin@admin.com','2016-04-21','13:04:05'),(29,'127.0.0.1','admin@admin.com','2016-04-21','13:04:34'),(30,'127.0.0.1','admin@admin.com','2016-04-21','15:26:44'),(31,'127.0.0.1','admin@admin.com','2016-04-21','15:29:07'),(32,'127.0.0.1','admin@admin.com','2016-04-22','13:18:45'),(33,'127.0.0.1','admin@admin.com','2016-04-22','13:23:02'),(34,'127.0.0.1','admin@admin.com','2016-04-22','13:24:32'),(35,'127.0.0.1','admin@admin.com','2016-04-22','15:30:40'),(36,'127.0.0.1','admin@admin.com','2016-04-22','16:57:59'),(37,'127.0.0.1','admin@admin.com','2016-04-22','17:20:23'),(38,'127.0.0.1','admin@admin.com','2016-04-22','17:21:38'),(39,'127.0.0.1','admin@admin.com','2016-04-22','17:22:20'),(40,'127.0.0.1','admin@admin.com','2016-04-22','17:28:38'),(41,'127.0.0.1','admin@admin.com','2016-04-25','11:22:12'),(42,'127.0.0.1','admin@admin.com','2016-04-25','11:22:29'),(43,'127.0.0.1','admin@admin.com','2016-04-25','11:31:54'),(44,'127.0.0.1','admin@admin.com','2016-04-25','11:37:49'),(45,'127.0.0.1','admin@admin.com','2016-04-25','11:45:38'),(46,'127.0.0.1','admin@admin.com','2016-04-25','11:47:30'),(47,'127.0.0.1','admin@admin.com','2016-04-25','11:51:29'),(48,'127.0.0.1','admin@admin.com','2016-04-25','11:53:24'),(49,'192.168.5.184','admin@admin.com','2016-04-25','14:10:51'),(50,'127.0.0.1','admin@admin.com','2016-04-25','15:18:01'),(51,'127.0.0.1','admin@admin.com','2016-04-25','16:52:16'),(52,'127.0.0.1','admin@admin.com','2016-04-25','16:52:39'),(53,'192.168.5.184','admin@admin.com','2016-04-25','17:04:16'),(54,'127.0.0.1','admin@admin.com','2016-04-26','09:51:40'),(55,'192.168.5.184','admin@admin.com','2016-04-26','10:14:30'),(56,'127.0.0.1','grupon@grupon.com','2016-04-26','17:01:41'),(57,'127.0.0.1','admin@admin.com','2016-04-26','17:10:46'),(58,'127.0.0.1','grupon@grupon.com','2016-04-26','17:11:27'),(59,'127.0.0.1','admin@admin.com','2016-04-27','15:25:06'),(60,'127.0.0.1','admin@admin.com','2016-04-27','15:31:12'),(61,'127.0.0.1','admin@admin.com','2016-05-02','10:51:31'),(62,'127.0.0.1','admin@admin.com','2016-05-03','11:45:38'),(63,'127.0.0.1','admin@admin.com','2016-05-09','16:01:53'),(64,'127.0.0.1','admin@admin.com','2016-05-10','10:21:57');

UNLOCK TABLES;

/*Table structure for table `camp_conf` */

DROP TABLE IF EXISTS `camp_conf`;

CREATE TABLE `camp_conf` (
  `cac_cod` int(11) NOT NULL auto_increment,
  `cam_cod` int(11) default NULL,
  `inf_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(1) default '0',
  PRIMARY KEY  (`cac_cod`),
  KEY `FK_camp_conf_cam` (`cam_cod`),
  KEY `FK_camp_conf_info` (`inf_cod`),
  CONSTRAINT `FK_camp_conf_cam` FOREIGN KEY (`cam_cod`) REFERENCES `campanas` (`cam_cod`),
  CONSTRAINT `FK_camp_conf_info` FOREIGN KEY (`inf_cod`) REFERENCES `info` (`inf_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `camp_conf` */

LOCK TABLES `camp_conf` WRITE;

insert  into `camp_conf`(`cac_cod`,`cam_cod`,`inf_cod`,`fecha`,`hora`,`usuario`,`borrado`) values (238,1,1,'2016-04-20','13:24:35',1,1),(239,1,2,'2016-04-20','13:24:35',1,1),(240,1,3,'2016-04-20','13:24:35',1,1),(241,1,4,'2016-04-20','13:24:35',1,1),(242,1,5,'2016-04-20','13:24:35',1,1),(243,1,1,'2016-04-20','13:29:41',1,1),(244,1,2,'2016-04-20','13:29:41',1,1),(245,1,4,'2016-04-20','13:29:41',1,1),(246,1,1,'2016-04-20','13:37:38',1,0),(247,1,2,'2016-04-20','13:37:38',1,0),(248,1,3,'2016-04-20','13:37:38',1,0),(249,1,4,'2016-04-20','13:37:38',1,0),(250,2,1,'2016-04-21','10:19:29',1,0),(251,2,2,'2016-04-21','10:19:29',1,0),(252,3,1,'2016-04-26','17:06:11',3,0),(253,3,2,'2016-04-26','17:06:11',3,0),(254,3,3,'2016-04-26','17:06:11',3,0);

UNLOCK TABLES;

/*Table structure for table `campanas` */

DROP TABLE IF EXISTS `campanas`;

CREATE TABLE `campanas` (
  `cam_cod` int(11) NOT NULL,
  `cam_des` varchar(255) default NULL,
  `cam_fec` date default NULL,
  `pro_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(1) default NULL,
  PRIMARY KEY  (`cam_cod`),
  KEY `FK_campanas` (`pro_cod`),
  CONSTRAINT `FK_campanas` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `campanas` */

LOCK TABLES `campanas` WRITE;

insert  into `campanas`(`cam_cod`,`cam_des`,`cam_fec`,`pro_cod`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'GRUPON ','2016-04-20',1,'2016-04-20','13:37:38',1,0),(2,'GRUPON 1','2016-04-22',2,'2016-04-21','10:19:29',1,0),(3,'CAMPANA PRUEBA','2016-04-20',3,'2016-04-26','17:06:11',3,0);

UNLOCK TABLES;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `cli_cod` int(11) NOT NULL auto_increment,
  `det_cod` int(11) default NULL,
  `cam_cod` int(11) default NULL,
  `inf_cod` int(11) default NULL,
  `inf_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `borrado` int(1) default '0',
  PRIMARY KEY  (`cli_cod`),
  KEY `FK_clientes` (`cam_cod`),
  KEY `FK_clientes_det_cod` (`det_cod`),
  CONSTRAINT `FK_clientes` FOREIGN KEY (`cam_cod`) REFERENCES `campanas` (`cam_cod`),
  CONSTRAINT `FK_clientes_det_cod` FOREIGN KEY (`det_cod`) REFERENCES `detalles` (`det_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

LOCK TABLES `clientes` WRITE;

insert  into `clientes`(`cli_cod`,`det_cod`,`cam_cod`,`inf_cod`,`inf_des`,`fecha`,`hora`,`borrado`) values (1,1964,1,1,'ARIEL ADRIAN RUIZ DIAZ MARTINEZ','2016-04-20','13:36:44',0),(2,1964,1,2,'ARIELRUIZDIAZ.PY@GMAIL.COM','2016-04-20','13:36:44',0),(3,1964,1,4,'0984121669','2016-04-20','13:36:44',0),(4,1963,1,1,'JORGE ANTONIO RODRIGUEZ','2016-04-20','13:40:24',0),(5,1963,1,2,'JORGE@RODRIGUEZ.COM.PY','2016-04-20','13:40:24',0),(6,1963,1,3,'AV. DEL YATCH','2016-04-20','13:40:24',0),(7,1963,1,4,'0971744498','2016-04-20','13:40:24',0),(8,1962,1,1,'JOSE RAMIREZ','2016-04-20','14:12:32',0),(9,1962,1,2,'ARIELRUIZDIAZ.PY@GMAIL.COM','2016-04-20','14:12:32',0),(10,1962,1,3,'CARANDAY 274','2016-04-20','14:12:32',0),(11,1962,1,4,'0984121669','2016-04-20','14:12:32',0),(12,1962,1,1,'JOSE RAMIREZ','2016-04-20','14:13:19',0),(13,1962,1,2,'ARIELRUIZDIAZ.PY@GMAIL.COM','2016-04-20','14:13:19',0),(14,1962,1,3,'CARANDAY 274','2016-04-20','14:13:19',0),(15,1962,1,4,'0984121669','2016-04-20','14:13:19',0),(16,1961,1,1,'ARIEL ADRIAN RUIZ DIAZ MARTINEZ','2016-04-20','14:13:59',0),(17,1961,1,2,'ARIELRUIZDIAZ.PY@GMAIL.COM','2016-04-20','14:13:59',0),(18,1961,1,3,'CARANDAY 274','2016-04-20','14:13:59',0),(19,1961,1,4,'0971744498','2016-04-20','14:13:59',0),(20,1960,1,1,'ARIEL ADRIAN RUIZ DIAZ MARTINEZ','2016-04-20','14:16:20',0),(21,1960,1,2,'ARIELRUIZDIAZ.PY@GMAIL.COM','2016-04-20','14:16:20',0),(22,1960,1,3,'AV. DEL YATCH','2016-04-20','14:16:20',0),(23,1960,1,4,'0984121669','2016-04-20','14:16:20',0),(24,1959,1,1,'ARIEL ADRIAN RUIZ DIAZ MARTINEZ','2016-04-21','12:13:33',0),(25,1959,1,2,'ARIELRUIZDIAZ.PY@GMAIL.COM','2016-04-21','12:13:33',0),(26,1959,1,3,'AV. DEL YATCH','2016-04-21','12:13:33',0),(27,1959,1,4,'098','2016-04-21','12:13:33',0),(28,1984,3,1,'S','2016-04-27','16:25:23',0),(29,1984,3,2,'ARIELRUIZDIAZ.PY@GMAIL.COM','2016-04-27','16:25:23',0),(30,1984,3,3,'S','2016-04-27','16:25:23',0);

UNLOCK TABLES;

/*Table structure for table `detalles` */

DROP TABLE IF EXISTS `detalles`;

CREATE TABLE `detalles` (
  `det_cod` int(11) NOT NULL auto_increment,
  `pro_cod` int(11) default NULL,
  `cam_cod` int(11) default NULL COMMENT 'campania',
  `det_gen` varchar(8) default NULL COMMENT 'codigo generado',
  `det_pro_cod` varchar(100) default NULL COMMENT 'codigo interno',
  `det_pro_des` varchar(200) default NULL COMMENT 'descripcion producto',
  `det_can` int(11) default NULL,
  `det_pre` double default NULL COMMENT 'precio',
  `det_est` int(1) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(1) default '0',
  PRIMARY KEY  (`det_cod`),
  KEY `FK_detalles` (`pro_cod`),
  KEY `FK_detalles_camp` (`cam_cod`),
  CONSTRAINT `FK_detalles` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`),
  CONSTRAINT `FK_detalles_camp` FOREIGN KEY (`cam_cod`) REFERENCES `campanas` (`cam_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalles` */

LOCK TABLES `detalles` WRITE;

insert  into `detalles`(`det_cod`,`pro_cod`,`cam_cod`,`det_gen`,`det_pro_cod`,`det_pro_des`,`det_can`,`det_pre`,`det_est`,`fecha`,`hora`,`usuario`,`borrado`) values (1950,1,1,'R1V0y6vT',NULL,NULL,1,NULL,0,'2016-04-20','13:35:22',1,0),(1951,1,1,'KqO0a8tN',NULL,NULL,1,NULL,0,'2016-04-20','13:35:22',1,0),(1952,1,1,'7WWdD3rH',NULL,NULL,1,NULL,0,'2016-04-20','13:35:22',1,0),(1953,1,1,'MjkztYbr',NULL,NULL,1,NULL,0,'2016-04-20','13:35:22',1,0),(1954,1,1,'CfPsHLU0',NULL,NULL,1,NULL,0,'2016-04-20','13:35:22',1,0),(1955,1,1,'J5jfIKT4',NULL,NULL,2,NULL,0,'2016-04-20','13:35:25',1,0),(1956,1,1,'cjisFtoW',NULL,NULL,2,NULL,0,'2016-04-20','13:35:25',1,0),(1957,1,1,'x5NAWa5q',NULL,NULL,2,NULL,0,'2016-04-20','13:35:25',1,0),(1958,1,1,'gg5idtTg',NULL,NULL,2,NULL,0,'2016-04-20','13:35:25',1,0),(1959,1,1,'d7Jv2ZZe',NULL,NULL,2,NULL,1,'2016-04-20','13:35:25',1,0),(1960,1,1,'RjEs2eds',NULL,NULL,3,NULL,1,'2016-04-20','13:35:27',1,0),(1961,1,1,'YQHWVWU0',NULL,NULL,3,NULL,1,'2016-04-20','13:35:27',1,0),(1962,1,1,'xtY3y7th',NULL,NULL,3,NULL,1,'2016-04-20','13:35:27',1,0),(1963,1,1,'1NmKFTeA',NULL,NULL,3,NULL,1,'2016-04-20','13:35:27',1,0),(1964,1,1,'0lpO4DzT',NULL,NULL,3,NULL,1,'2016-04-20','13:35:27',1,0),(1965,2,2,'yUBBgFmu',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1966,2,2,'TwUuYEZx',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1967,2,2,'9JUGnpNn',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1968,2,2,'fF8YZNjp',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1969,2,2,'0oQ76JeY',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1970,2,2,'bnN8rCJJ',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1971,2,2,'sxu75bRE',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1972,2,2,'OvekhnfZ',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1973,2,2,'JT9A7KNc',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1974,2,2,'r49B9OFl',NULL,NULL,4,NULL,0,'2016-04-21','10:37:25',1,0),(1975,3,3,'8XH0EU96',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1976,3,3,'9U4DREPT',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1977,3,3,'EAEQQUS7',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1978,3,3,'4FJRP6OE',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1979,3,3,'RG8O1QSO',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1980,3,3,'7LRGONIL',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1981,3,3,'OY8HQERI',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1982,3,3,'3YZBM4C3',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1983,3,3,'ZK9SF5J6',NULL,NULL,1,NULL,0,'2016-04-26','17:06:39',3,0),(1984,3,3,'RS6H4RE7',NULL,NULL,1,NULL,1,'2016-04-26','17:06:39',3,0);

UNLOCK TABLES;

/*Table structure for table `detalles_cod` */

DROP TABLE IF EXISTS `detalles_cod`;

CREATE TABLE `detalles_cod` (
  `dec_cod` int(11) NOT NULL auto_increment,
  `cam_cod` int(11) default NULL,
  `det_cod` int(11) default NULL,
  `dec_cod_int` varchar(100) default NULL,
  `det_est` int(1) default '0',
  `cli_nom` varchar(255) default NULL,
  `cli_ema` varchar(255) default NULL,
  `cli_fec` date default NULL,
  `cli_hor` time default NULL,
  `cli_ipe` varchar(30) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(1) default '0',
  PRIMARY KEY  (`dec_cod`),
  KEY `FK_detalles_cod` (`cam_cod`),
  KEY `FK_detalles_cod_detalles` (`det_cod`),
  CONSTRAINT `FK_detalles_cod` FOREIGN KEY (`cam_cod`) REFERENCES `campanas` (`cam_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detalles_cod` */

LOCK TABLES `detalles_cod` WRITE;

insert  into `detalles_cod`(`dec_cod`,`cam_cod`,`det_cod`,`dec_cod_int`,`det_est`,`cli_nom`,`cli_ema`,`cli_fec`,`cli_hor`,`cli_ipe`,`fecha`,`hora`,`usuario`,`borrado`) values (4275,3,NULL,'cuenta',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4276,3,NULL,'M10EKE14',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4277,3,NULL,'2FANF10D',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4278,3,NULL,'YDEPS1FK',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4279,3,NULL,'UBHNWJ0C',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4280,3,NULL,'9WAX2UPX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4281,3,NULL,'ROOB2OX0',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4282,3,NULL,'096ZYFT2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4283,3,NULL,'E0Q5058Q',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4284,3,NULL,'AWP3LUI0',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4285,3,NULL,'5OQW1AOD',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4286,3,NULL,'OT6J461O',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4287,3,NULL,'NLWR30FP',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4288,3,NULL,'M0K6G70C',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4289,3,NULL,'TFU05G8T',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4290,3,NULL,'KP53XY6V',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4291,3,NULL,'BHLXTTMD',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4292,3,NULL,'ZSMQRH4V',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4293,3,NULL,'U1D2SI4D',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4294,3,NULL,'D4O1VMI0',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4295,3,NULL,'V0CGBLQW',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4296,3,NULL,'EISOH1FC',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4297,3,NULL,'XE8AX18S',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4298,3,NULL,'U0UKD1D2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4299,3,NULL,'Z7BGOS38',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4300,3,NULL,'XHQL0NG4',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4301,3,NULL,'S5V4F22J',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4302,3,NULL,'UNVNE60I',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4303,3,NULL,'DL0ISSRX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4304,3,NULL,'E6QHYS86',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4305,3,NULL,'EWFMLKH9',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4306,3,NULL,'EC6842LM',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4307,3,NULL,'HWN5EH2J',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4308,3,NULL,'X4YRC3C1',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4309,3,NULL,'TMK4I0E6',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4310,3,NULL,'F8KW326N',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4311,3,NULL,'YOUXYT48',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4312,3,NULL,'X8Z34JFV',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4313,3,NULL,'U2Q7K6PL',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4314,3,NULL,'KXENR6RK',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4315,3,NULL,'B2SNF7VM',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4316,3,NULL,'3ZKGNTPS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4317,3,NULL,'HAY8C51E',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4318,3,NULL,'H647GVAB',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4319,3,NULL,'B89FOYIJ',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4320,3,NULL,'53RW0L2E',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4321,3,NULL,'6SKC44CP',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4322,3,NULL,'OT462FCV',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4323,3,NULL,'VA1B275F',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4324,3,NULL,'367GDEZU',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4325,3,NULL,'OSZZRIMH',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4326,3,NULL,'2JQ1R1G3',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4327,3,NULL,'Q51II2TN',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4328,3,NULL,'0UU0OHHS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4329,3,NULL,'EIXI3NBK',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4330,3,NULL,'N0A7A4YS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4331,3,NULL,'QEN7VXYX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4332,3,NULL,'RLVEDU14',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4333,3,NULL,'B0BOTK31',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4334,3,NULL,'JQYFRRK2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4335,3,NULL,'09BE9FBA',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4336,3,NULL,'IHS4Y39W',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4337,3,NULL,'KVPKM4JP',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4338,3,NULL,'BDPY6A3F',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4339,3,NULL,'CO9DWRLE',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4340,3,NULL,'JJ3KA2O9',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4341,3,NULL,'SSW6QSA0',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4342,3,NULL,'EHL6B1HT',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4343,3,NULL,'C7ZUESDM',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4344,3,NULL,'RQDRIB9R',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4345,3,NULL,'L2C26YTN',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4346,3,NULL,'PRKOJNF1',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4347,3,NULL,'0L23MC71',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4348,3,NULL,'S8XLQEW2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4349,3,NULL,'ONUU93C2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4350,3,NULL,'NOCEDAKD',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4351,3,NULL,'LNMHEMMX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4352,3,NULL,'4Z654SRL',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4353,3,NULL,'ANDQGVJS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4354,3,NULL,'SACQ209G',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4355,3,NULL,'MIQNBEXX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4356,3,NULL,'OKP8Q3S3',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4357,3,NULL,'I1A881XS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4358,3,NULL,'VNGJTC59',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4359,3,NULL,'NU1XA4ZK',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4360,3,NULL,'UXX7TFOU',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4361,3,NULL,'PG6BZH10',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4362,3,NULL,'J2Z7ZF6W',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4363,3,NULL,'BHFGKRCC',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4364,3,NULL,'AN78M6SR',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4365,3,NULL,'7KKKXTLZ',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4366,3,NULL,'33ZXX8R9',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4367,3,NULL,'FF0ZFCL6',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4368,3,NULL,'00S345I5',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4369,3,NULL,'YGGETANX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4370,3,NULL,'Y0JBFP72',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4371,3,NULL,'G9H2H755',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','15:55:03',1,0),(4372,3,NULL,'cuenta',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4373,3,NULL,'M10EKE14',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4374,3,NULL,'2FANF10D',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4375,3,NULL,'YDEPS1FK',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4376,3,NULL,'UBHNWJ0C',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4377,3,NULL,'9WAX2UPX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4378,3,NULL,'ROOB2OX0',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4379,3,NULL,'096ZYFT2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4380,3,NULL,'E0Q5058Q',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4381,3,NULL,'AWP3LUI0',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4382,3,NULL,'5OQW1AOD',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4383,3,NULL,'OT6J461O',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4384,3,NULL,'NLWR30FP',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4385,3,NULL,'M0K6G70C',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4386,3,NULL,'TFU05G8T',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4387,3,NULL,'KP53XY6V',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4388,3,NULL,'BHLXTTMD',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4389,3,NULL,'ZSMQRH4V',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4390,3,NULL,'U1D2SI4D',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4391,3,NULL,'D4O1VMI0',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4392,3,NULL,'V0CGBLQW',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4393,3,NULL,'EISOH1FC',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4394,3,NULL,'XE8AX18S',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4395,3,NULL,'U0UKD1D2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4396,3,NULL,'Z7BGOS38',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4397,3,NULL,'XHQL0NG4',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4398,3,NULL,'S5V4F22J',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4399,3,NULL,'UNVNE60I',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4400,3,NULL,'DL0ISSRX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4401,3,NULL,'E6QHYS86',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4402,3,NULL,'EWFMLKH9',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4403,3,NULL,'EC6842LM',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4404,3,NULL,'HWN5EH2J',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4405,3,NULL,'X4YRC3C1',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4406,3,NULL,'TMK4I0E6',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4407,3,NULL,'F8KW326N',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4408,3,NULL,'YOUXYT48',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4409,3,NULL,'X8Z34JFV',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4410,3,NULL,'U2Q7K6PL',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4411,3,NULL,'KXENR6RK',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4412,3,NULL,'B2SNF7VM',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4413,3,NULL,'3ZKGNTPS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4414,3,NULL,'HAY8C51E',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4415,3,NULL,'H647GVAB',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4416,3,NULL,'B89FOYIJ',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4417,3,NULL,'53RW0L2E',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4418,3,NULL,'6SKC44CP',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4419,3,NULL,'OT462FCV',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4420,3,NULL,'VA1B275F',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4421,3,NULL,'367GDEZU',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4422,3,NULL,'OSZZRIMH',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4423,3,NULL,'2JQ1R1G3',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4424,3,NULL,'Q51II2TN',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4425,3,NULL,'0UU0OHHS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4426,3,NULL,'EIXI3NBK',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4427,3,NULL,'N0A7A4YS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4428,3,NULL,'QEN7VXYX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4429,3,NULL,'RLVEDU14',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4430,3,NULL,'B0BOTK31',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4431,3,NULL,'JQYFRRK2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4432,3,NULL,'09BE9FBA',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4433,3,NULL,'IHS4Y39W',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4434,3,NULL,'KVPKM4JP',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4435,3,NULL,'BDPY6A3F',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4436,3,NULL,'CO9DWRLE',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4437,3,NULL,'JJ3KA2O9',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4438,3,NULL,'SSW6QSA0',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4439,3,NULL,'EHL6B1HT',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4440,3,NULL,'C7ZUESDM',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4441,3,NULL,'RQDRIB9R',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4442,3,NULL,'L2C26YTN',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4443,3,NULL,'PRKOJNF1',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4444,3,NULL,'0L23MC71',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4445,3,NULL,'S8XLQEW2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4446,3,NULL,'ONUU93C2',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4447,3,NULL,'NOCEDAKD',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4448,3,NULL,'LNMHEMMX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4449,3,NULL,'4Z654SRL',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4450,3,NULL,'ANDQGVJS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4451,3,NULL,'SACQ209G',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4452,3,NULL,'MIQNBEXX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4453,3,NULL,'OKP8Q3S3',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4454,3,NULL,'I1A881XS',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4455,3,NULL,'VNGJTC59',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4456,3,NULL,'NU1XA4ZK',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4457,3,NULL,'UXX7TFOU',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4458,3,NULL,'PG6BZH10',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4459,3,NULL,'J2Z7ZF6W',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4460,3,NULL,'BHFGKRCC',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4461,3,NULL,'AN78M6SR',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4462,3,NULL,'7KKKXTLZ',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4463,3,NULL,'33ZXX8R9',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4464,3,NULL,'FF0ZFCL6',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4465,3,NULL,'00S345I5',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4466,3,NULL,'YGGETANX',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4467,3,NULL,'Y0JBFP72',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0),(4468,3,NULL,'G9H2H755',0,NULL,NULL,NULL,NULL,NULL,'2016-05-09','16:02:10',1,0);

UNLOCK TABLES;

/*Table structure for table `info` */

DROP TABLE IF EXISTS `info`;

CREATE TABLE `info` (
  `inf_cod` int(11) NOT NULL,
  `inf_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(1) default NULL,
  PRIMARY KEY  (`inf_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `info` */

LOCK TABLES `info` WRITE;

insert  into `info`(`inf_cod`,`inf_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'NOMBRE  Y APELLIDO','2016-04-20','13:22:10',1,0),(2,'EMAIL','2016-04-20','13:22:57',1,0),(3,'DIRECCION','2016-04-20','13:23:01',1,0),(4,'TELEFONO','2016-04-20','13:23:04',1,0),(5,'OTROS DATOS','2016-04-20','13:23:09',1,0);

UNLOCK TABLES;

/*Table structure for table `menu_cab` */

DROP TABLE IF EXISTS `menu_cab`;

CREATE TABLE `menu_cab` (
  `mec_cod` int(11) NOT NULL auto_increment,
  `mec_des` varchar(255) default NULL,
  `mec_ord` int(11) default NULL,
  `borrado` int(11) default '0',
  PRIMARY KEY  (`mec_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu_cab` */

LOCK TABLES `menu_cab` WRITE;

insert  into `menu_cab`(`mec_cod`,`mec_des`,`mec_ord`,`borrado`) values (1,'Mantenimiento',1,0),(2,'Administracion',2,0),(3,'Reportes',3,0),(4,'Seguridad',4,0);

UNLOCK TABLES;

/*Table structure for table `menu_det` */

DROP TABLE IF EXISTS `menu_det`;

CREATE TABLE `menu_det` (
  `med_cod` int(11) NOT NULL auto_increment,
  `mec_cod` int(11) default NULL,
  `med_des` varchar(255) default NULL,
  `med_dir` varchar(255) default NULL,
  `med_ifr` varchar(255) default NULL,
  `med_ord` int(11) default NULL,
  `borrado` int(11) default '0',
  PRIMARY KEY  (`med_cod`),
  KEY `fk_menu_det_menu_cab1` (`mec_cod`),
  CONSTRAINT `FK_menu_det_rel` FOREIGN KEY (`mec_cod`) REFERENCES `menu_cab` (`mec_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu_det` */

LOCK TABLES `menu_det` WRITE;

insert  into `menu_det`(`med_cod`,`mec_cod`,`med_des`,`med_dir`,`med_ifr`,`med_ord`,`borrado`) values (1,1,'Productos','../productos/index.php?&campo=pro&tabla=productos','principal',2,0),(2,2,'Campanias','../campanas/index.php?campo=cam&tabla=campanas','principal',1,0),(3,1,'Info Adicional','../info/index.php?campo=inf&tabla=info','principal',1,0),(4,4,'Roles','../roles/index.php?campo=rol&tabla=niveles','principal',2,0),(6,4,'Usuarios','../usuarios/index.php?campo=usu&tabla=usuarios','principal',3,0),(7,4,'Cambio Password','../cambio_pass/index.php?campo=usu&tabla=usuarios','principal',1,0),(8,2,'Opcion1','../cambio_pass/index.php?campo=usu&tabla=usuarios','principal',1,1),(9,3,'Rep.General','../rep_campana/index.php?campo=det&tabla=detalles_view','principal',1,0),(10,2,'Generar Cod.','../campanas_pro/index.php?campo=det&tabla=detalles_view','principal',2,0);

UNLOCK TABLES;

/*Table structure for table `niveles` */

DROP TABLE IF EXISTS `niveles`;

CREATE TABLE `niveles` (
  `niv_cod` int(11) NOT NULL,
  `niv_des` varchar(45) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`niv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `niveles` */

LOCK TABLES `niveles` WRITE;

insert  into `niveles`(`niv_cod`,`niv_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'ROOT','2016-05-02','16:26:29',1,0),(2,'NIVEL2','2016-05-02','10:51:38',1,0);

UNLOCK TABLES;

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `per_cod` int(11) NOT NULL auto_increment,
  `niv_cod` int(11) default NULL,
  `med_cod` int(11) default NULL,
  `per_agr` varchar(1) character set latin1 collate latin1_bin default '0',
  `per_mod` varchar(1) character set latin1 collate latin1_bin default '0',
  `per_imp` varchar(1) character set latin1 collate latin1_bin default '0',
  `per_con` varchar(1) default '0',
  `per_eli` varchar(1) default '0',
  `borrado` int(1) default '0',
  PRIMARY KEY  (`per_cod`),
  KEY `fk_Permisos_Niveles1` (`niv_cod`),
  KEY `FK_permisos_med_cod` (`med_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `permisos` */

LOCK TABLES `permisos` WRITE;

insert  into `permisos`(`per_cod`,`niv_cod`,`med_cod`,`per_agr`,`per_mod`,`per_imp`,`per_con`,`per_eli`,`borrado`) values (1,1,1,'0','0','0','0','0',0),(2,1,2,'0','0','0','0','0',0),(3,1,3,'0','0','0','0','0',0),(4,1,4,'0','0','0','0','0',0),(9,1,6,'0','0','0','0','0',0),(10,1,8,'0','0','0','0','0',0),(11,1,9,'0','0','0','0','0',0),(12,1,10,'0','0','0','0','0',0),(13,2,1,'1','1','0','0','1',0),(14,2,3,'1','1','0','0','1',0),(15,2,2,'1','1','0','0','1',0),(16,2,10,'1','1','0','0','1',0),(17,2,9,'0','0','0','0','0',0),(18,2,4,'0','0','0','1','0',0),(19,2,6,'0','0','0','1','0',0),(20,2,7,'0','0','0','0','0',0);

UNLOCK TABLES;

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `pro_cod` int(11) NOT NULL,
  `pro_des` varchar(255) default NULL,
  `pro_pre` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(1) default NULL,
  PRIMARY KEY  (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

LOCK TABLES `productos` WRITE;

insert  into `productos`(`pro_cod`,`pro_des`,`pro_pre`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'ESTRELLAS',NULL,'2016-04-20','13:24:35',1,0),(2,'ESTRELLA 2',NULL,'2016-04-21','10:19:29',1,0),(3,'PRODUCTO PRUEBA',NULL,'2016-04-26','17:06:11',3,0);

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `password_nor` varchar(45) default NULL,
  `niv_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usu` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_usuarios_Niveles1` (`niv_cod`),
  CONSTRAINT `FK_usuarios_niveles` FOREIGN KEY (`niv_cod`) REFERENCES `niveles` (`niv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id`,`usuario`,`password`,`password_nor`,`niv_cod`,`fecha`,`hora`,`usu`,`borrado`) values (1,'admin@admin.com','8518e999e7e26bba6b2dd1df2ee74d2e','apollo11',1,'2015-12-20','18:48:23',1,0),(2,'JORGE@HOTMAIL.COM','827ccb0eea8a706c4c34a16891f84e7b','12345',1,'2016-03-09','00:26:05',2,0),(3,'grupon@grupon.com','827ccb0eea8a706c4c34a16891f84e7b','12345',2,'2016-04-26','17:01:16',1,0);

UNLOCK TABLES;

/*Table structure for table `camp_conf_view` */

DROP TABLE IF EXISTS `camp_conf_view`;

/*!50001 DROP VIEW IF EXISTS `camp_conf_view` */;
/*!50001 DROP TABLE IF EXISTS `camp_conf_view` */;

/*!50001 CREATE TABLE  `camp_conf_view`(
 `cac_cod` int(11) ,
 `cam_cod` int(11) ,
 `inf_cod` int(11) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(1) ,
 `cam_des` varchar(255) ,
 `inf_des` varchar(255) 
)*/;

/*Table structure for table `campanas_view` */

DROP TABLE IF EXISTS `campanas_view`;

/*!50001 DROP VIEW IF EXISTS `campanas_view` */;
/*!50001 DROP TABLE IF EXISTS `campanas_view` */;

/*!50001 CREATE TABLE  `campanas_view`(
 `cam_cod` int(11) ,
 `cam_des` varchar(255) ,
 `cam_fec` date ,
 `pro_cod` int(11) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(1) ,
 `pro_des` varchar(255) 
)*/;

/*Table structure for table `detalles_cod_view` */

DROP TABLE IF EXISTS `detalles_cod_view`;

/*!50001 DROP VIEW IF EXISTS `detalles_cod_view` */;
/*!50001 DROP TABLE IF EXISTS `detalles_cod_view` */;

/*!50001 CREATE TABLE  `detalles_cod_view`(
 `dec_cod` int(11) ,
 `cam_cod` int(11) ,
 `cam_des` varchar(255) ,
 `pro_des` varchar(255) ,
 `det_cod` int(11) ,
 `dec_cod_int` varchar(100) ,
 `det_est` int(1) ,
 `cli_nom` varchar(255) ,
 `cli_ema` varchar(255) ,
 `cli_fec` date ,
 `cli_hor` time ,
 `cli_ipe` varchar(30) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(1) ,
 `det_est_des` varchar(5) ,
 `det_gen` varchar(8) 
)*/;

/*Table structure for table `detalles_view` */

DROP TABLE IF EXISTS `detalles_view`;

/*!50001 DROP VIEW IF EXISTS `detalles_view` */;
/*!50001 DROP TABLE IF EXISTS `detalles_view` */;

/*!50001 CREATE TABLE  `detalles_view`(
 `det_cod` int(11) ,
 `pro_cod` int(11) ,
 `cam_cod` int(11) ,
 `det_gen` varchar(8) ,
 `det_pro_cod` varchar(100) ,
 `det_pro_des` varchar(200) ,
 `det_can` int(11) ,
 `det_pre` double ,
 `det_est` int(1) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(1) ,
 `pro_des` varchar(255) ,
 `cam_des` varchar(255) ,
 `det_est_des` varchar(5) 
)*/;

/*View structure for view camp_conf_view */

/*!50001 DROP TABLE IF EXISTS `camp_conf_view` */;
/*!50001 DROP VIEW IF EXISTS `camp_conf_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `camp_conf_view` AS (select `camp_conf`.`cac_cod` AS `cac_cod`,`camp_conf`.`cam_cod` AS `cam_cod`,`camp_conf`.`inf_cod` AS `inf_cod`,`camp_conf`.`fecha` AS `fecha`,`camp_conf`.`hora` AS `hora`,`camp_conf`.`usuario` AS `usuario`,`camp_conf`.`borrado` AS `borrado`,(select `campanas`.`cam_des` AS `cam_des` from `campanas` where (`campanas`.`cam_cod` = `camp_conf`.`cam_cod`)) AS `cam_des`,(select `info`.`inf_des` AS `inf_des` from `info` where (`info`.`inf_cod` = `camp_conf`.`inf_cod`)) AS `inf_des` from `camp_conf`) */;

/*View structure for view campanas_view */

/*!50001 DROP TABLE IF EXISTS `campanas_view` */;
/*!50001 DROP VIEW IF EXISTS `campanas_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `campanas_view` AS (select `campanas`.`cam_cod` AS `cam_cod`,`campanas`.`cam_des` AS `cam_des`,`campanas`.`cam_fec` AS `cam_fec`,`campanas`.`pro_cod` AS `pro_cod`,`campanas`.`fecha` AS `fecha`,`campanas`.`hora` AS `hora`,`campanas`.`usuario` AS `usuario`,`campanas`.`borrado` AS `borrado`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `campanas`.`pro_cod`)) AS `pro_des` from `campanas`) */;

/*View structure for view detalles_cod_view */

/*!50001 DROP TABLE IF EXISTS `detalles_cod_view` */;
/*!50001 DROP VIEW IF EXISTS `detalles_cod_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalles_cod_view` AS (select `detalles_cod`.`dec_cod` AS `dec_cod`,`detalles_cod`.`cam_cod` AS `cam_cod`,(select `campanas`.`cam_des` AS `cam_des` from `campanas` where (`campanas`.`cam_cod` = `detalles_cod`.`cam_cod`)) AS `cam_des`,(select `detalles_view`.`pro_des` AS `pro_des` from `detalles_view` where (`detalles_view`.`det_cod` = `detalles_cod`.`det_cod`)) AS `pro_des`,`detalles_cod`.`det_cod` AS `det_cod`,`detalles_cod`.`dec_cod_int` AS `dec_cod_int`,`detalles_cod`.`det_est` AS `det_est`,`detalles_cod`.`cli_nom` AS `cli_nom`,`detalles_cod`.`cli_ema` AS `cli_ema`,`detalles_cod`.`cli_fec` AS `cli_fec`,`detalles_cod`.`cli_hor` AS `cli_hor`,`detalles_cod`.`cli_ipe` AS `cli_ipe`,`detalles_cod`.`fecha` AS `fecha`,`detalles_cod`.`hora` AS `hora`,`detalles_cod`.`usuario` AS `usuario`,`detalles_cod`.`borrado` AS `borrado`,(case `detalles_cod`.`det_est` when 0 then _utf8'INGR.' when 1 then _utf8'PROC.' end) AS `det_est_des`,(select `detalles`.`det_gen` AS `det_gen` from `detalles` where (`detalles`.`det_cod` = `detalles_cod`.`det_cod`)) AS `det_gen` from `detalles_cod`) */;

/*View structure for view detalles_view */

/*!50001 DROP TABLE IF EXISTS `detalles_view` */;
/*!50001 DROP VIEW IF EXISTS `detalles_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detalles_view` AS (select `detalles`.`det_cod` AS `det_cod`,`detalles`.`pro_cod` AS `pro_cod`,`detalles`.`cam_cod` AS `cam_cod`,`detalles`.`det_gen` AS `det_gen`,`detalles`.`det_pro_cod` AS `det_pro_cod`,`detalles`.`det_pro_des` AS `det_pro_des`,`detalles`.`det_can` AS `det_can`,`detalles`.`det_pre` AS `det_pre`,`detalles`.`det_est` AS `det_est`,`detalles`.`fecha` AS `fecha`,`detalles`.`hora` AS `hora`,`detalles`.`usuario` AS `usuario`,`detalles`.`borrado` AS `borrado`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `detalles`.`pro_cod`)) AS `pro_des`,(select `campanas`.`cam_des` AS `cam_des` from `campanas` where (`campanas`.`cam_cod` = `detalles`.`cam_cod`)) AS `cam_des`,(case `detalles`.`det_est` when 0 then _utf8'INGR.' when 1 then _utf8'PROC.' end) AS `det_est_des` from `detalles`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
