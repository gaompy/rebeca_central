/*
SQLyog Community v8.71 
MySQL - 5.0.19-nt : Database - alpha_matrix_gratis
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alpha_matrix_gratis` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `alpha_matrix_gratis`;

/*Table structure for table `aper_cie` */

DROP TABLE IF EXISTS `aper_cie`;

CREATE TABLE `aper_cie` (
  `ape_cod` int(11) NOT NULL,
  `ape_dot` double NOT NULL,
  `ape_efe` double default NULL,
  `ape_cie` double default NULL,
  `ape_par` double default NULL,
  `ape_dif` double default NULL,
  `aps_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`ape_cod`),
  KEY `FK_aper_cie` (`aps_cod`),
  CONSTRAINT `FK_aper_cie` FOREIGN KEY (`aps_cod`) REFERENCES `aper_sis` (`aps_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aper_cie` */

LOCK TABLES `aper_cie` WRITE;

UNLOCK TABLES;

/*Table structure for table `aper_sis` */

DROP TABLE IF EXISTS `aper_sis`;

CREATE TABLE `aper_sis` (
  `aps_cod` int(11) NOT NULL,
  `aps_efe` double default NULL,
  `aps_cie` double default NULL,
  `aps_dif` double default NULL,
  `aps_par` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`aps_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aper_sis` */

LOCK TABLES `aper_sis` WRITE;

insert  into `aper_sis`(`aps_cod`,`aps_efe`,`aps_cie`,`aps_dif`,`aps_par`,`fecha`,`hora`,`usuario`,`borrado`) values (1,0,0,0,0,'2012-09-19','21:50:58',4,0);

UNLOCK TABLES;

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

UNLOCK TABLES;

/*Table structure for table `bajas` */

DROP TABLE IF EXISTS `bajas`;

CREATE TABLE `bajas` (
  `prd_cod` int(11) NOT NULL,
  `pro_cod` int(11) default NULL,
  `prd_can` double default NULL,
  `prd_fec` date default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`prd_cod`),
  KEY `FK_produccion_pro_cod` (`pro_cod`),
  CONSTRAINT `FK_bajas` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bajas` */

LOCK TABLES `bajas` WRITE;

UNLOCK TABLES;

/*Table structure for table `bancos` */

DROP TABLE IF EXISTS `bancos`;

CREATE TABLE `bancos` (
  `ban_cod` int(11) NOT NULL,
  `ban_des` varchar(255) default NULL,
  `ban_nro` varchar(20) default NULL,
  `tcu_cod` int(11) default NULL,
  `tmo_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`ban_cod`),
  KEY `FK_bancos_cuenta` (`tcu_cod`),
  KEY `FK_bancos_moneda` (`tmo_cod`),
  CONSTRAINT `FK_bancos_cuenta` FOREIGN KEY (`tcu_cod`) REFERENCES `tipo_cuenta` (`tcu_cod`),
  CONSTRAINT `FK_bancos_moneda` FOREIGN KEY (`tmo_cod`) REFERENCES `tipo_moneda` (`tmo_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bancos` */

LOCK TABLES `bancos` WRITE;

UNLOCK TABLES;

/*Table structure for table `caja_diaria` */

DROP TABLE IF EXISTS `caja_diaria`;

CREATE TABLE `caja_diaria` (
  `caj_cod` int(11) NOT NULL,
  `caj_des` varchar(255) default NULL,
  `caj_ing` int(11) default NULL,
  `caj_sal` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`caj_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `caja_diaria` */

LOCK TABLES `caja_diaria` WRITE;

UNLOCK TABLES;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `cli_cod` int(11) NOT NULL,
  `cli_des` varchar(255) default NULL,
  `cli_ruc` varchar(20) default NULL,
  `cli_dir` varchar(255) default NULL,
  `cli_tel` varchar(255) default NULL,
  `cli_mai` varchar(255) default NULL,
  `med_cod` int(11) default NULL,
  `tic_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`cli_cod`),
  KEY `cli_des` (`cli_des`),
  KEY `FK_clientes_tic_cod` (`tic_cod`),
  KEY `FK_clientes_med_cod` (`med_cod`),
  CONSTRAINT `FK_clientes_med_cod` FOREIGN KEY (`med_cod`) REFERENCES `medios` (`med_cod`),
  CONSTRAINT `FK_clientes_tic_cod` FOREIGN KEY (`tic_cod`) REFERENCES `tipo_cliente` (`tic_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clientes` */

LOCK TABLES `clientes` WRITE;

UNLOCK TABLES;

/*Table structure for table `cobros` */

DROP TABLE IF EXISTS `cobros`;

CREATE TABLE `cobros` (
  `cob_cod` int(11) NOT NULL auto_increment,
  `fac_cod` int(11) default NULL,
  `cli_cod` int(11) default NULL,
  `cob_mon` double default NULL,
  `cob_sal` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`cob_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cobros` */

LOCK TABLES `cobros` WRITE;

UNLOCK TABLES;

/*Table structure for table `compra_cab` */

DROP TABLE IF EXISTS `compra_cab`;

CREATE TABLE `compra_cab` (
  `fac_cod` int(11) NOT NULL,
  `fac_num` varchar(20) default NULL,
  `ape_cod` int(11) default NULL,
  `prv_cod` int(11) default NULL,
  `mpg_cod` int(11) default NULL,
  `for_cod` int(11) default NULL,
  `tmo_cod` int(11) default NULL,
  `cot_cod` int(11) default NULL,
  `cot_mon` varchar(50) default NULL,
  `tie_cod` int(11) default NULL,
  `fac_imp` double default NULL,
  `fac_tot` double default NULL,
  `aps_cod` int(11) default NULL,
  `mes_cod` int(11) default NULL,
  `fac_est` int(11) default '0',
  `fac_sal` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`fac_cod`),
  KEY `FK_factura_cab_cliente` (`prv_cod`),
  KEY `FK_factura_cab_mesas` (`mes_cod`),
  KEY `FK_factura_cab_ape_cod` (`ape_cod`),
  KEY `FK_factura_cab_aps_cod` (`aps_cod`),
  CONSTRAINT `FK_compra_cab` FOREIGN KEY (`prv_cod`) REFERENCES `proveedores` (`prv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `compra_cab` */

LOCK TABLES `compra_cab` WRITE;

UNLOCK TABLES;

/*Table structure for table `compra_det` */

DROP TABLE IF EXISTS `compra_det`;

CREATE TABLE `compra_det` (
  `mde_cod` int(11) NOT NULL auto_increment,
  `ape_cod` int(11) default NULL,
  `fac_cod` int(11) default NULL,
  `pro_cod` int(11) default NULL,
  `pro_can` double default NULL,
  `pro_ven` int(11) default NULL,
  `pro_tot` double default NULL,
  `mde_par` int(11) default '0',
  `aps_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mde_cod`),
  KEY `FK_factura_det_fac_cod` (`fac_cod`),
  KEY `FK_factura_det` (`pro_cod`),
  CONSTRAINT `FK_compra_det` FOREIGN KEY (`fac_cod`) REFERENCES `compra_cab` (`fac_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `compra_det` */

LOCK TABLES `compra_det` WRITE;

UNLOCK TABLES;

/*Table structure for table `cotizaciones` */

DROP TABLE IF EXISTS `cotizaciones`;

CREATE TABLE `cotizaciones` (
  `cot_cod` int(11) NOT NULL,
  `tmo_cod` int(11) default NULL,
  `cot_com` double default NULL,
  `cot_ven` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`cot_cod`),
  KEY `fk_cotizaciones_tipo_moneda1` (`tmo_cod`),
  CONSTRAINT `FK_cotizaciones_tmo_cod` FOREIGN KEY (`tmo_cod`) REFERENCES `tipo_moneda` (`tmo_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cotizaciones` */

LOCK TABLES `cotizaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `factura_cab` */

DROP TABLE IF EXISTS `factura_cab`;

CREATE TABLE `factura_cab` (
  `fac_cod` int(11) NOT NULL,
  `fac_num` varchar(20) default NULL,
  `ape_cod` int(11) default NULL,
  `cli_cod` int(11) default NULL,
  `mpg_cod` int(11) default NULL,
  `for_cod` int(11) default NULL,
  `tmo_cod` int(11) default NULL,
  `cot_cod` int(11) default NULL,
  `cot_mon` varchar(50) default NULL,
  `tie_cod` int(11) default NULL,
  `fac_imp` double default NULL,
  `fac_tot` double default NULL,
  `aps_cod` int(11) default NULL,
  `mes_cod` int(11) default NULL,
  `fac_est` int(11) default '0',
  `fac_sal` double default NULL,
  `fac_rec` varchar(200) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`fac_cod`),
  KEY `FK_factura_cab_cliente` (`cli_cod`),
  KEY `FK_factura_cab_mesas` (`mes_cod`),
  KEY `FK_factura_cab_ape_cod` (`ape_cod`),
  KEY `FK_factura_cab_aps_cod` (`aps_cod`),
  CONSTRAINT `FK_factura_cab_ape_cod` FOREIGN KEY (`ape_cod`) REFERENCES `aper_cie` (`ape_cod`),
  CONSTRAINT `FK_factura_cab_aps_cod` FOREIGN KEY (`aps_cod`) REFERENCES `aper_sis` (`aps_cod`),
  CONSTRAINT `FK_factura_cab_cliente` FOREIGN KEY (`cli_cod`) REFERENCES `clientes` (`cli_cod`),
  CONSTRAINT `FK_factura_cab_mesas` FOREIGN KEY (`mes_cod`) REFERENCES `mesas` (`mes_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `factura_cab` */

LOCK TABLES `factura_cab` WRITE;

UNLOCK TABLES;

/*Table structure for table `factura_det` */

DROP TABLE IF EXISTS `factura_det`;

CREATE TABLE `factura_det` (
  `mde_cod` int(11) NOT NULL auto_increment,
  `ape_cod` int(11) default NULL,
  `fac_cod` int(11) default NULL,
  `pro_cod` int(11) default NULL,
  `pro_can` double default NULL,
  `pro_ven` int(11) default NULL,
  `pro_tot` double default NULL,
  `mde_par` int(11) default '0',
  `aps_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mde_cod`),
  KEY `FK_factura_det_fac_cod` (`fac_cod`),
  KEY `FK_factura_det` (`pro_cod`),
  CONSTRAINT `FK_factura_det` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`),
  CONSTRAINT `FK_factura_det_fac_cod` FOREIGN KEY (`fac_cod`) REFERENCES `factura_cab` (`fac_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `factura_det` */

LOCK TABLES `factura_det` WRITE;

UNLOCK TABLES;

/*Table structure for table `familias_pro` */

DROP TABLE IF EXISTS `familias_pro`;

CREATE TABLE `familias_pro` (
  `fam_cod` int(11) NOT NULL,
  `fam_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`fam_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `familias_pro` */

LOCK TABLES `familias_pro` WRITE;

UNLOCK TABLES;

/*Table structure for table `formas_pago` */

DROP TABLE IF EXISTS `formas_pago`;

CREATE TABLE `formas_pago` (
  `for_cod` int(11) NOT NULL,
  `for_des` varchar(45) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`for_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `formas_pago` */

LOCK TABLES `formas_pago` WRITE;

insert  into `formas_pago`(`for_cod`,`for_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'CONTADO','2015-02-03','14:58:22',1,0),(2,'CREDITO','2015-01-31','12:21:40',1,0);

UNLOCK TABLES;

/*Table structure for table `inventario_cab` */

DROP TABLE IF EXISTS `inventario_cab`;

CREATE TABLE `inventario_cab` (
  `inv_cod` int(11) NOT NULL,
  `inv_des` varchar(50) default NULL,
  `inv_par` int(11) default NULL,
  `inv_fec` date default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`inv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inventario_cab` */

LOCK TABLES `inventario_cab` WRITE;

UNLOCK TABLES;

/*Table structure for table `inventario_det` */

DROP TABLE IF EXISTS `inventario_det`;

CREATE TABLE `inventario_det` (
  `mde_cod` int(11) NOT NULL auto_increment,
  `inv_cod` int(11) default NULL,
  `pro_cod` int(11) default NULL,
  `pro_can` double default NULL,
  `pro_cos` double default NULL,
  `pro_tot` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mde_cod`),
  KEY `FK_inventario_det` (`inv_cod`),
  CONSTRAINT `FK_inventario_det` FOREIGN KEY (`inv_cod`) REFERENCES `inventario_cab` (`inv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inventario_det` */

LOCK TABLES `inventario_det` WRITE;

UNLOCK TABLES;

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `mar_cod` int(11) NOT NULL,
  `mar_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default '0',
  PRIMARY KEY  (`mar_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `marcas` */

LOCK TABLES `marcas` WRITE;

UNLOCK TABLES;

/*Table structure for table `medios` */

DROP TABLE IF EXISTS `medios`;

CREATE TABLE `medios` (
  `med_cod` int(11) NOT NULL,
  `med_des` varchar(50) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`med_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medios` */

LOCK TABLES `medios` WRITE;

insert  into `medios`(`med_cod`,`med_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'OTROS','2011-08-07','20:17:49',1,0),(2,'PROPIOS MEDIOS','2011-08-07','20:14:55',1,0),(3,'MSN','2011-08-07','20:14:58',1,0),(4,'FACEBOOK','2015-01-31','16:05:39',1,0);

UNLOCK TABLES;

/*Table structure for table `medios_pago` */

DROP TABLE IF EXISTS `medios_pago`;

CREATE TABLE `medios_pago` (
  `mpg_cod` int(11) NOT NULL,
  `mpg_des` varchar(45) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mpg_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medios_pago` */

LOCK TABLES `medios_pago` WRITE;

insert  into `medios_pago`(`mpg_cod`,`mpg_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'EFECTIVO','2015-01-31','13:01:55',1,0),(2,'CHEQUE','2012-03-12','23:12:42',1,0),(3,'TARJ. CRED.','2012-03-12','23:12:55',1,0),(4,'TARJ. DEBITO','2012-03-20','17:20:35',2,0);

UNLOCK TABLES;

/*Table structure for table `menu_cab` */

DROP TABLE IF EXISTS `menu_cab`;

CREATE TABLE `menu_cab` (
  `mec_cod` int(11) NOT NULL auto_increment,
  `mec_des` varchar(255) default NULL,
  `mec_ord` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mec_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu_cab` */

LOCK TABLES `menu_cab` WRITE;

insert  into `menu_cab`(`mec_cod`,`mec_des`,`mec_ord`,`borrado`) values (1,'Mantenimiento',1,0),(2,'Administracion',2,0),(3,'Finanzas y Tesoreria',3,0),(4,'Ventas',4,0),(5,'Compras',5,0),(6,'Inventarios',6,0),(7,'Envios al Cliente',7,0),(8,'Reportes',8,0),(9,'Seguridad',9,0);

UNLOCK TABLES;

/*Table structure for table `menu_det` */

DROP TABLE IF EXISTS `menu_det`;

CREATE TABLE `menu_det` (
  `med_cod` int(11) NOT NULL auto_increment,
  `mec_cod` int(11) default NULL,
  `med_des` varchar(255) default NULL,
  `med_dir` varchar(255) default NULL,
  `med_ord` int(11) default NULL,
  `borrado` int(11) default '0',
  PRIMARY KEY  (`med_cod`),
  KEY `fk_menu_det_menu_cab1` (`mec_cod`),
  CONSTRAINT `FK_menu_det_menu_cab` FOREIGN KEY (`mec_cod`) REFERENCES `menu_cab` (`mec_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu_det` */

LOCK TABLES `menu_det` WRITE;

insert  into `menu_det`(`med_cod`,`mec_cod`,`med_des`,`med_dir`,`med_ord`,`borrado`) values (1,1,'Categorias','./Categorias/index.php',1,0),(2,1,'Condicion Pago','./formas_pago/index.php',2,0),(3,1,'Medios Pago','./medios_pago/index.php',3,0),(4,1,'Medios Comun.','./medios_comun/index.php',4,0),(5,1,'Mesas','./mesas/index.php',5,1),(6,1,'Tipos Cliente','./tipos_cliente/index.php',6,0),(7,1,'Tipos Cuenta','./tipos_cuenta/index.php',7,0),(8,1,'Tipos Envio','./tipos_envio/index.php',8,0),(9,1,'Tipos Moneda','./tipos_moneda/index.php',9,0),(10,1,'Unidades Medida','./unidades/index.php',10,0),(11,2,'Clientes','./clientes/index.php',1,0),(12,2,'Proveedores','./proveedores/index.php',2,0),(13,2,'Cotizaciones','./cotizaciones/index.php',4,0),(14,3,'Cobros de Fact.','./cobros/index.php',1,0),(15,4,'Apertura Caja','./apertura/index.php',1,0),(16,4,'Facturacion','./facturacion/detalle.php',2,0),(17,2,'Productos','./productos/index.php',3,0),(18,4,'Anular Factura','./anular_factura/index.php',3,0),(19,4,'Cierre Caja','./cerrarcaja/index.php',4,0),(20,8,'Reporte Cierres','./reporte_cierres/index.php',1,0),(21,8,'Reporte Ventas','./reporte_ventas/index.php',2,0),(22,8,'Reporte Stock','./reporte_stock/index.php',3,0),(23,8,'Estado Cuenta Cliente','./reporte_cuentas_clientes/index.php',4,0),(24,5,'Facturas Compra','./compras/index.php',1,0),(25,8,'Estado Cuenta Prov.','./reporte_cuentas_proveedor/index.php',5,0),(26,3,'Pagos a Proveedores','./pagos/index.php',2,0),(27,2,'Produccion','./produccion/index.php',5,0),(28,2,'Baja de Productos','./bajas/index.php',6,0),(29,3,'Bancos y Cuentas','./bancos/index.php',3,0),(30,3,'Movimientos','./movimientos/index.php',4,0),(31,6,'Carga de Datos','./inventarios/index.php',1,0),(32,6,'Ajuste de Stock','./inventarios_ajuste/index.php',2,0),(33,7,'En Proceso','./delivery/index.php',1,0),(34,7,'Confirmacion ','./delivery_conf/index.php',2,0),(35,9,'Perfiles','./perfiles/index.php',1,0),(36,9,'Usuarios','./usuarios/index.php',2,0),(37,9,'Cambio Password','./cambio_pass/index.php',3,0),(38,1,'Marcas','./marcas/index.php',11,0);

UNLOCK TABLES;

/*Table structure for table `mesas` */

DROP TABLE IF EXISTS `mesas`;

CREATE TABLE `mesas` (
  `mes_cod` int(11) NOT NULL,
  `mes_des` varchar(255) default NULL,
  `mes_est` int(11) default '0',
  `mes_fac` int(11) default '0',
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mes_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mesas` */

LOCK TABLES `mesas` WRITE;

insert  into `mesas`(`mes_cod`,`mes_des`,`mes_est`,`mes_fac`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'FACTURA',1,44,'2015-02-02','23:32:15',1,0),(2,'MESA 2',0,0,'2015-02-02','23:32:22',1,0),(3,'MESA 3',1,21,'2015-02-02','23:32:36',1,0),(4,'MESA 4',2,22,'2015-02-02','23:32:48',1,0),(5,'MESA 5',0,0,'2015-02-02','23:32:58',1,0),(6,'MESA 6',0,0,'2015-02-02','23:33:10',1,0),(7,'MESA 7',0,0,'2015-02-02','23:33:22',1,0),(8,'MESA 8',0,0,'2015-02-02','23:33:32',1,0),(9,'MESA 9',1,27,'2015-02-03','10:40:30',1,0),(10,'MESA 10',0,0,'2015-02-03','10:40:35',1,0),(11,'MESA 11',0,0,'2015-02-03','10:40:40',1,0),(12,'MESA 12',0,0,'2015-02-03','10:40:45',1,0),(13,'MESA 13',1,26,'2015-02-03','10:40:50',1,0),(14,'MESA 14',1,25,'2015-02-03','10:40:53',1,0),(15,'MESA 15',0,0,'2015-02-03','10:40:57',1,0),(16,'MESA 16',0,0,'2015-02-03','10:41:01',1,0),(17,'MESA 17',0,0,'2015-02-03','10:41:29',1,0),(18,'MESA 18',1,23,'2015-02-03','10:41:32',1,0),(19,'MESA 19',0,0,'2015-02-03','10:41:37',1,0),(20,'MESA 20',0,0,'2015-02-03','10:41:40',1,0),(21,'MESA 21',1,28,'2015-02-03','10:41:51',1,0);

UNLOCK TABLES;

/*Table structure for table `movimientos` */

DROP TABLE IF EXISTS `movimientos`;

CREATE TABLE `movimientos` (
  `mov_cod` int(11) NOT NULL,
  `mov_nro` varchar(20) default NULL,
  `mov_obs` varchar(255) default NULL,
  `mov_mon` double default NULL,
  `mov_par` varchar(5) default NULL,
  `ban_cod` int(11) default NULL,
  `mov_fec` date default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mov_cod`),
  KEY `FK_movimientos_bancos` (`ban_cod`),
  CONSTRAINT `FK_movimientos_bancos` FOREIGN KEY (`ban_cod`) REFERENCES `bancos` (`ban_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `movimientos` */

LOCK TABLES `movimientos` WRITE;

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

insert  into `niveles`(`niv_cod`,`niv_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'root','2012-04-07','20:29:38',1,0),(2,'caja','2015-02-09','00:31:38',5,0);

UNLOCK TABLES;

/*Table structure for table `pagos` */

DROP TABLE IF EXISTS `pagos`;

CREATE TABLE `pagos` (
  `cob_cod` int(11) NOT NULL auto_increment,
  `fac_cod` int(11) default NULL,
  `prv_cod` int(11) default NULL,
  `cob_mon` double default NULL,
  `cob_sal` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`cob_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pagos` */

LOCK TABLES `pagos` WRITE;

UNLOCK TABLES;

/*Table structure for table `parametro` */

DROP TABLE IF EXISTS `parametro`;

CREATE TABLE `parametro` (
  `par_cod` int(11) NOT NULL,
  `par_des` varchar(45) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`par_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `parametro` */

LOCK TABLES `parametro` WRITE;

insert  into `parametro`(`par_cod`,`par_des`,`borrado`) values (1,'COMPRA-VENTA',0),(2,'PRODUCCION',0),(3,'MATERIA PRIMA',0);

UNLOCK TABLES;

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `per_cod` int(11) NOT NULL auto_increment,
  `niv_cod` int(11) default NULL,
  `mec_cod` int(11) default NULL,
  `med_cod` int(11) default NULL,
  `per_agr` varchar(2) character set latin1 collate latin1_bin default NULL,
  `per_mod` varchar(2) character set latin1 collate latin1_bin default NULL,
  `per_imp` varchar(2) character set latin1 collate latin1_bin default NULL,
  `per_con` varchar(2) default NULL,
  `per_eli` varchar(2) default NULL,
  PRIMARY KEY  (`per_cod`),
  KEY `fk_Permisos_Niveles1` (`niv_cod`),
  KEY `fk_Permisos_menu_cab1` (`mec_cod`),
  KEY `FK_permisos_med_cod` (`med_cod`),
  CONSTRAINT `FK_permisos_mec_cod` FOREIGN KEY (`mec_cod`) REFERENCES `menu_cab` (`mec_cod`),
  CONSTRAINT `FK_permisos_med_cod` FOREIGN KEY (`med_cod`) REFERENCES `menu_det` (`med_cod`),
  CONSTRAINT `FK_permisos_niv_cod` FOREIGN KEY (`niv_cod`) REFERENCES `niveles` (`niv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `permisos` */

LOCK TABLES `permisos` WRITE;

insert  into `permisos`(`per_cod`,`niv_cod`,`mec_cod`,`med_cod`,`per_agr`,`per_mod`,`per_imp`,`per_con`,`per_eli`) values (1,1,1,1,'on','on','on','on','on'),(2,1,1,2,'on','on','on','on','on'),(3,1,1,3,'on','on','on','on','on'),(4,1,1,4,'on','on','on','on','on'),(5,1,1,5,'on','on','on','on','on'),(6,1,1,6,'on','on','on','on','on'),(7,1,1,7,'on','on','on','on','on'),(8,1,1,8,'on','on','on','on','on'),(9,1,1,9,'on','on','on','on','on'),(10,1,1,10,'on','on','on','on','on'),(11,1,2,11,'on','on','on','on','on'),(12,1,2,12,'on','on','on','on','on'),(13,1,2,13,'on','on','on','on','on'),(14,1,3,14,'on','on','on','on','on'),(15,1,4,15,'on','on','on','on','on'),(16,1,2,17,'on','on','on','on','on'),(17,1,4,16,'on','on','on','on','on'),(18,1,4,18,'on','on','on','on','on'),(19,1,4,19,'on','on','on','on','on'),(20,1,8,20,'on','on','on','on','on'),(21,1,8,21,'on','on','on','on','on'),(22,1,8,22,'on','on','on','on','on'),(23,1,8,23,'on','on','on','on','on'),(24,1,5,24,'on','on','on','on','on'),(25,1,8,25,'on','on','on','on','on'),(26,1,3,26,'on','on','on','on','on'),(27,1,2,27,'on','on','on','on','on'),(28,1,2,28,'on','on','on','on','on'),(29,1,3,29,'on','on','on','on','on'),(30,1,3,30,'on','on','on','on','on'),(31,1,6,31,'on','on','on','on','on'),(32,1,6,32,'on','on','on','on','on'),(33,1,7,33,'on','on','on','on','on'),(34,1,7,34,'on','on','on','on','on'),(35,1,9,35,'on','on','on','on','on'),(80,1,9,36,'on','on','on','on','on'),(117,1,1,38,'on','on','on','on','on');

UNLOCK TABLES;

/*Table structure for table `produccion` */

DROP TABLE IF EXISTS `produccion`;

CREATE TABLE `produccion` (
  `prd_cod` int(11) NOT NULL,
  `pro_cod` int(11) default NULL,
  `prd_can` double default NULL,
  `prd_fec` date default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`prd_cod`),
  KEY `FK_produccion_pro_cod` (`pro_cod`),
  CONSTRAINT `FK_produccion_pro_cod` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produccion` */

LOCK TABLES `produccion` WRITE;

UNLOCK TABLES;

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `pro_cod` int(11) NOT NULL,
  `pro_bar` varchar(30) default NULL,
  `pro_des` varchar(255) default NULL,
  `pro_cos` double default NULL,
  `pro_ven` double default NULL,
  `pro_can` double default NULL,
  `pro_imp` int(11) default NULL,
  `par_cod` int(11) default NULL,
  `fam_cod` int(11) default NULL,
  `uni_cod` int(11) default NULL,
  `mar_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`pro_cod`),
  KEY `FK_productos_par_cod` (`par_cod`),
  KEY `FK_productos_fam_cod` (`fam_cod`),
  KEY `FK_productos_uni_cod` (`uni_cod`),
  KEY `FK_productos_marca` (`mar_cod`),
  CONSTRAINT `FK_productos_fam_cod` FOREIGN KEY (`fam_cod`) REFERENCES `familias_pro` (`fam_cod`),
  CONSTRAINT `FK_productos_marca` FOREIGN KEY (`mar_cod`) REFERENCES `marcas` (`mar_cod`),
  CONSTRAINT `FK_productos_par_cod` FOREIGN KEY (`par_cod`) REFERENCES `parametro` (`par_cod`),
  CONSTRAINT `FK_productos_uni_cod` FOREIGN KEY (`uni_cod`) REFERENCES `unidades` (`uni_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productos` */

LOCK TABLES `productos` WRITE;

UNLOCK TABLES;

/*Table structure for table `proveedores` */

DROP TABLE IF EXISTS `proveedores`;

CREATE TABLE `proveedores` (
  `prv_cod` int(11) NOT NULL,
  `prv_des` varchar(255) default NULL,
  `prv_ruc` varchar(20) default NULL,
  `prv_dir` varchar(255) default NULL,
  `prv_tel` varchar(255) default NULL,
  `prv_mai` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`prv_cod`),
  KEY `cli_des` (`prv_des`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `proveedores` */

LOCK TABLES `proveedores` WRITE;

UNLOCK TABLES;

/*Table structure for table `recetas` */

DROP TABLE IF EXISTS `recetas`;

CREATE TABLE `recetas` (
  `rec_cod` int(11) NOT NULL auto_increment,
  `pro_cod` int(11) default NULL,
  `spr_cod` int(11) default NULL,
  `rec_can` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`rec_cod`),
  KEY `FK_recetas_pro_cod` (`pro_cod`),
  KEY `FK_recetas_sub` (`spr_cod`),
  CONSTRAINT `FK_recetas_pro_cod` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`),
  CONSTRAINT `FK_recetas_sub` FOREIGN KEY (`spr_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `recetas` */

LOCK TABLES `recetas` WRITE;

UNLOCK TABLES;

/*Table structure for table `sucursales` */

DROP TABLE IF EXISTS `sucursales`;

CREATE TABLE `sucursales` (
  `suc_cod` int(11) NOT NULL,
  `suc_des` varchar(255) default NULL,
  `suc_tim` varchar(100) default NULL,
  `suc_val` varchar(100) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`suc_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sucursales` */

LOCK TABLES `sucursales` WRITE;

insert  into `sucursales`(`suc_cod`,`suc_des`,`suc_tim`,`suc_val`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'CENTRAL','82737776','08/11','2012-03-31','22:04:33',1,0);

UNLOCK TABLES;

/*Table structure for table `tipo_cliente` */

DROP TABLE IF EXISTS `tipo_cliente`;

CREATE TABLE `tipo_cliente` (
  `tic_cod` int(11) NOT NULL,
  `tic_des` varchar(50) default NULL,
  `tic_por` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`tic_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_cliente` */

LOCK TABLES `tipo_cliente` WRITE;

insert  into `tipo_cliente`(`tic_cod`,`tic_des`,`tic_por`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'MAYORISTAS',10,'2015-01-31','22:22:19',1,0),(2,'SEMI-MAYORISTAS',5.3,'2015-01-31','22:22:35',1,0),(3,'ESTANDAR',0,'2015-01-31','22:22:06',1,0);

UNLOCK TABLES;

/*Table structure for table `tipo_cuenta` */

DROP TABLE IF EXISTS `tipo_cuenta`;

CREATE TABLE `tipo_cuenta` (
  `tcu_cod` int(11) NOT NULL auto_increment,
  `tcu_des` varchar(20) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`tcu_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_cuenta` */

LOCK TABLES `tipo_cuenta` WRITE;

insert  into `tipo_cuenta`(`tcu_cod`,`tcu_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'CTA.CTE','2015-01-31','16:41:05',1,0),(2,'CAJ.AHO.','2015-01-31','16:41:02',1,0);

UNLOCK TABLES;

/*Table structure for table `tipo_envio` */

DROP TABLE IF EXISTS `tipo_envio`;

CREATE TABLE `tipo_envio` (
  `tie_cod` int(11) default NULL,
  `tie_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_envio` */

LOCK TABLES `tipo_envio` WRITE;

insert  into `tipo_envio`(`tie_cod`,`tie_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'EN CAJA','2015-01-31','16:53:35',1,0),(2,'DELIVERY','2015-01-31','16:53:32',1,0),(3,'ENTREGADO','2015-02-08','23:10:24',1,0);

UNLOCK TABLES;

/*Table structure for table `tipo_moneda` */

DROP TABLE IF EXISTS `tipo_moneda`;

CREATE TABLE `tipo_moneda` (
  `tmo_cod` int(11) NOT NULL,
  `tmo_des` varchar(45) default NULL,
  `tmo_sim` varchar(45) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`tmo_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_moneda` */

LOCK TABLES `tipo_moneda` WRITE;

insert  into `tipo_moneda`(`tmo_cod`,`tmo_des`,`tmo_sim`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'GUARANIES','GS.','2015-01-31','17:00:59',1,0),(2,'DOLARES','US$','2015-01-31','17:00:51',1,0),(3,'REAL','RE$','2015-01-31','17:01:05',1,0),(4,'PESO ARG.','P$','2015-01-31','17:01:19',1,0),(5,'LIBRA ','L$','2015-02-03','20:10:13',1,0);

UNLOCK TABLES;

/*Table structure for table `tmp` */

DROP TABLE IF EXISTS `tmp`;

CREATE TABLE `tmp` (
  `tmp_cod` int(11) NOT NULL auto_increment,
  `numlinea` int(11) NOT NULL,
  `pro_cod` int(11) default NULL,
  `pro_can` double default NULL,
  `nro_fac` int(11) default NULL,
  PRIMARY KEY  (`tmp_cod`,`numlinea`),
  UNIQUE KEY `tmp_cod` (`tmp_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tmp` */

LOCK TABLES `tmp` WRITE;

UNLOCK TABLES;

/*Table structure for table `unidades` */

DROP TABLE IF EXISTS `unidades`;

CREATE TABLE `unidades` (
  `uni_cod` int(11) NOT NULL,
  `uni_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`uni_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `unidades` */

LOCK TABLES `unidades` WRITE;

insert  into `unidades`(`uni_cod`,`uni_des`,`fecha`,`hora`,`usuario`,`borrado`) values (1,'UNID.','2015-04-06','15:45:11',1,1),(2,'LTROS.','2012-03-12','23:17:53',1,1),(3,'MTR.','2015-04-06','15:44:48',1,1),(4,'BOLSA','2015-04-09','11:58:21',1,1),(5,'UNIDADES','2015-04-09','11:58:30',1,1),(6,'PAQUETE','2015-04-06','15:45:07',1,1),(7,'CAJA DE 10 UNID.','2015-04-09','11:59:06',1,0),(8,'CAJA DE 20 UNID.','2015-04-09','11:59:14',1,0),(9,'FRASCOS DE 5 ML.','2015-04-09','11:59:30',1,0),(10,'UNIDADES','2015-04-09','11:59:45',1,0),(11,'ML.','2015-04-09','11:59:53',1,0);

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `niv_cod` int(11) default NULL,
  `suc_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usu` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_usuarios_Niveles1` (`niv_cod`),
  KEY `FK_usuarios` (`suc_cod`),
  CONSTRAINT `FK_usuarios` FOREIGN KEY (`suc_cod`) REFERENCES `sucursales` (`suc_cod`),
  CONSTRAINT `FK_usuarios_niveles` FOREIGN KEY (`niv_cod`) REFERENCES `niveles` (`niv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id`,`usuario`,`password`,`niv_cod`,`suc_cod`,`fecha`,`hora`,`usu`,`borrado`) values (1,'admin','827ccb0eea8a706c4c34a16891f84e7b',1,1,'2015-04-09','11:48:35',1,0);

UNLOCK TABLES;

/*Table structure for table `aper_cie_view` */

DROP TABLE IF EXISTS `aper_cie_view`;

/*!50001 DROP VIEW IF EXISTS `aper_cie_view` */;
/*!50001 DROP TABLE IF EXISTS `aper_cie_view` */;

/*!50001 CREATE TABLE  `aper_cie_view`(
 `ape_cod` int(11) ,
 `ape_dot` varchar(20) ,
 `ape_efe` varchar(20) ,
 `ape_cie` varchar(20) ,
 `ape_est` varchar(7) ,
 `ape_dif` varchar(20) ,
 `aps_cod` int(11) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) 
)*/;

/*Table structure for table `bajas_view` */

DROP TABLE IF EXISTS `bajas_view`;

/*!50001 DROP VIEW IF EXISTS `bajas_view` */;
/*!50001 DROP TABLE IF EXISTS `bajas_view` */;

/*!50001 CREATE TABLE  `bajas_view`(
 `prd_cod` int(11) ,
 `pro_cod` int(11) ,
 `pro_bar` varchar(30) ,
 `pro_des` varchar(255) ,
 `par_cod` bigint(11) ,
 `fam_cod` bigint(11) ,
 `prd_can` double ,
 `prd_fec` date ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) 
)*/;

/*Table structure for table `bancos_view` */

DROP TABLE IF EXISTS `bancos_view`;

/*!50001 DROP VIEW IF EXISTS `bancos_view` */;
/*!50001 DROP TABLE IF EXISTS `bancos_view` */;

/*!50001 CREATE TABLE  `bancos_view`(
 `ban_cod` int(11) ,
 `ban_des` varchar(255) ,
 `ban_nro` varchar(20) ,
 `tcu_cod` int(11) ,
 `tmo_cod` int(11) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) ,
 `tcu_des` varchar(20) ,
 `tmo_des` varchar(45) 
)*/;

/*Table structure for table `clientes_view` */

DROP TABLE IF EXISTS `clientes_view`;

/*!50001 DROP VIEW IF EXISTS `clientes_view` */;
/*!50001 DROP TABLE IF EXISTS `clientes_view` */;

/*!50001 CREATE TABLE  `clientes_view`(
 `cli_cod` int(11) ,
 `cli_des` varchar(255) ,
 `cli_ruc` varchar(20) ,
 `cli_dir` varchar(255) ,
 `cli_tel` varchar(255) ,
 `cli_mai` varchar(255) ,
 `med_cod` int(11) ,
 `tic_cod` int(11) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) ,
 `tic_des` varchar(50) ,
 `tic_por` double ,
 `med_des` varchar(50) 
)*/;

/*Table structure for table `compra_cab_view` */

DROP TABLE IF EXISTS `compra_cab_view`;

/*!50001 DROP VIEW IF EXISTS `compra_cab_view` */;
/*!50001 DROP TABLE IF EXISTS `compra_cab_view` */;

/*!50001 CREATE TABLE  `compra_cab_view`(
 `fac_cod` int(11) ,
 `fac_num` varchar(20) ,
 `ape_cod` int(11) ,
 `prv_cod` int(11) ,
 `prv_des` varchar(255) ,
 `prv_ruc` varchar(20) ,
 `mpg_cod` int(11) ,
 `mpg_des` varchar(45) ,
 `for_cod` int(11) ,
 `for_des` varchar(45) ,
 `tmo_cod` int(11) ,
 `tmo_des` varchar(45) ,
 `cot_cod` int(11) ,
 `cot_mon` varchar(50) ,
 `tie_cod` int(11) ,
 `tie_des` varchar(255) ,
 `fac_imp` double ,
 `fac_tot_1` varchar(20) ,
 `fac_tot` double ,
 `aps_cod` int(11) ,
 `cot_mon_1` varchar(18) ,
 `mes_cod` int(11) ,
 `mes_des` varchar(255) ,
 `fac_est` int(11) ,
 `estado` varchar(9) ,
 `fac_sal` double ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) 
)*/;

/*Table structure for table `cotizaciones_view` */

DROP TABLE IF EXISTS `cotizaciones_view`;

/*!50001 DROP VIEW IF EXISTS `cotizaciones_view` */;
/*!50001 DROP TABLE IF EXISTS `cotizaciones_view` */;

/*!50001 CREATE TABLE  `cotizaciones_view`(
 `cot_cod` int(11) ,
 `tmo_cod` int(11) ,
 `cot_com` double ,
 `cot_ven` double ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) ,
 `tmo_des` varchar(45) 
)*/;

/*Table structure for table `factura_cab_view` */

DROP TABLE IF EXISTS `factura_cab_view`;

/*!50001 DROP VIEW IF EXISTS `factura_cab_view` */;
/*!50001 DROP TABLE IF EXISTS `factura_cab_view` */;

/*!50001 CREATE TABLE  `factura_cab_view`(
 `fac_cod` int(11) ,
 `fac_num` varchar(20) ,
 `ape_cod` int(11) ,
 `cli_cod` int(11) ,
 `cli_des` varchar(255) ,
 `cli_ruc` varchar(20) ,
 `mpg_cod` int(11) ,
 `mpg_des` varchar(45) ,
 `for_cod` int(11) ,
 `for_des` varchar(45) ,
 `tmo_cod` int(11) ,
 `tmo_des` varchar(45) ,
 `cot_cod` int(11) ,
 `cot_mon` varchar(50) ,
 `tie_cod` int(11) ,
 `tie_des` varchar(255) ,
 `fac_imp` double ,
 `fac_tot_1` varchar(20) ,
 `fac_tot` double ,
 `aps_cod` int(11) ,
 `cot_mon_1` varchar(18) ,
 `mes_cod` int(11) ,
 `mes_des` varchar(255) ,
 `fac_est` int(11) ,
 `estado` varchar(9) ,
 `fac_sal` double ,
 `fac_rec` varchar(200) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) 
)*/;

/*Table structure for table `inventarios_cab_view` */

DROP TABLE IF EXISTS `inventarios_cab_view`;

/*!50001 DROP VIEW IF EXISTS `inventarios_cab_view` */;
/*!50001 DROP TABLE IF EXISTS `inventarios_cab_view` */;

/*!50001 CREATE TABLE  `inventarios_cab_view`(
 `inv_cod` int(11) ,
 `inv_des` varchar(50) ,
 `inv_par` int(11) ,
 `par_des` varchar(10) ,
 `inv_fec` date ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) ,
 `total` double ,
 `total_format` longtext 
)*/;

/*Table structure for table `inventarios_det_view` */

DROP TABLE IF EXISTS `inventarios_det_view`;

/*!50001 DROP VIEW IF EXISTS `inventarios_det_view` */;
/*!50001 DROP TABLE IF EXISTS `inventarios_det_view` */;

/*!50001 CREATE TABLE  `inventarios_det_view`(
 `mde_cod` int(11) ,
 `inv_cod` int(11) ,
 `pro_cod` int(11) ,
 `pro_can` double ,
 `pro_cos` double ,
 `pro_cos_for` varchar(20) ,
 `pro_tot` double ,
 `pro_tot_for` varchar(20) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) ,
 `pro_bar` varchar(30) ,
 `pro_des` varchar(255) ,
 `fam_des` varchar(255) 
)*/;

/*Table structure for table `movimientos_view` */

DROP TABLE IF EXISTS `movimientos_view`;

/*!50001 DROP VIEW IF EXISTS `movimientos_view` */;
/*!50001 DROP TABLE IF EXISTS `movimientos_view` */;

/*!50001 CREATE TABLE  `movimientos_view`(
 `mov_cod` int(11) ,
 `mov_nro` varchar(20) ,
 `mov_obs` varchar(255) ,
 `mov_mon` double ,
 `mov_par` varchar(5) ,
 `ban_cod` int(11) ,
 `mov_fec` date ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) ,
 `ban_des` varchar(255) ,
 `ban_nro` varchar(20) ,
 `tcu_cod` bigint(11) ,
 `tcu_des` varchar(20) ,
 `tmo_cod` bigint(11) ,
 `tmo_des` varchar(45) ,
 `monto` varchar(20) 
)*/;

/*Table structure for table `produccion_view` */

DROP TABLE IF EXISTS `produccion_view`;

/*!50001 DROP VIEW IF EXISTS `produccion_view` */;
/*!50001 DROP TABLE IF EXISTS `produccion_view` */;

/*!50001 CREATE TABLE  `produccion_view`(
 `prd_cod` int(11) ,
 `pro_cod` int(11) ,
 `pro_bar` varchar(30) ,
 `pro_des` varchar(255) ,
 `par_cod` bigint(11) ,
 `fam_cod` bigint(11) ,
 `prd_can` double ,
 `prd_fec` date ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) 
)*/;

/*Table structure for table `productos_view` */

DROP TABLE IF EXISTS `productos_view`;

/*!50001 DROP VIEW IF EXISTS `productos_view` */;
/*!50001 DROP TABLE IF EXISTS `productos_view` */;

/*!50001 CREATE TABLE  `productos_view`(
 `pro_cod` int(11) ,
 `pro_bar` varchar(30) ,
 `pro_des` varchar(255) ,
 `pro_cos` double ,
 `pro_ven` double ,
 `pro_can` double ,
 `pro_imp` int(11) ,
 `par_cod` int(11) ,
 `fam_cod` int(11) ,
 `uni_cod` int(11) ,
 `mar_cod` int(11) ,
 `fecha` date ,
 `hora` time ,
 `usuario` int(11) ,
 `borrado` int(11) ,
 `par_des` varchar(45) ,
 `fam_des` varchar(255) ,
 `uni_des` varchar(255) ,
 `mar_des` varchar(255) 
)*/;

/*View structure for view aper_cie_view */

/*!50001 DROP TABLE IF EXISTS `aper_cie_view` */;
/*!50001 DROP VIEW IF EXISTS `aper_cie_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aper_cie_view` AS (select `aper_cie`.`ape_cod` AS `ape_cod`,replace(format(`aper_cie`.`ape_dot`,0),_utf8',',_utf8'.') AS `ape_dot`,replace(format(`aper_cie`.`ape_efe`,0),_utf8',',_utf8'.') AS `ape_efe`,replace(format(`aper_cie`.`ape_cie`,0),_utf8',',_utf8'.') AS `ape_cie`,(case when (`aper_cie`.`ape_par` = 0) then _utf8'Abierto' when (`aper_cie`.`ape_par` = 1) then _utf8'Cerrado' end) AS `ape_est`,replace(format(`aper_cie`.`ape_dif`,0),_utf8',',_utf8'.') AS `ape_dif`,`aper_cie`.`aps_cod` AS `aps_cod`,`aper_cie`.`fecha` AS `fecha`,`aper_cie`.`hora` AS `hora`,`aper_cie`.`usuario` AS `usuario`,`aper_cie`.`borrado` AS `borrado` from `aper_cie`) */;

/*View structure for view bajas_view */

/*!50001 DROP TABLE IF EXISTS `bajas_view` */;
/*!50001 DROP VIEW IF EXISTS `bajas_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bajas_view` AS (select `bajas`.`prd_cod` AS `prd_cod`,`bajas`.`pro_cod` AS `pro_cod`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `pro_des`,(select `productos`.`par_cod` AS `par_cod` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `par_cod`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `fam_cod`,`bajas`.`prd_can` AS `prd_can`,`bajas`.`prd_fec` AS `prd_fec`,`bajas`.`fecha` AS `fecha`,`bajas`.`hora` AS `hora`,`bajas`.`usuario` AS `usuario`,`bajas`.`borrado` AS `borrado` from `bajas`) */;

/*View structure for view bancos_view */

/*!50001 DROP TABLE IF EXISTS `bancos_view` */;
/*!50001 DROP VIEW IF EXISTS `bancos_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bancos_view` AS (select `bancos`.`ban_cod` AS `ban_cod`,`bancos`.`ban_des` AS `ban_des`,`bancos`.`ban_nro` AS `ban_nro`,`bancos`.`tcu_cod` AS `tcu_cod`,`bancos`.`tmo_cod` AS `tmo_cod`,`bancos`.`fecha` AS `fecha`,`bancos`.`hora` AS `hora`,`bancos`.`usuario` AS `usuario`,`bancos`.`borrado` AS `borrado`,(select `tipo_cuenta`.`tcu_des` AS `tcu_des` from `tipo_cuenta` where (`tipo_cuenta`.`tcu_cod` = `bancos`.`tcu_cod`)) AS `tcu_des`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `bancos`.`tmo_cod`)) AS `tmo_des` from `bancos`) */;

/*View structure for view clientes_view */

/*!50001 DROP TABLE IF EXISTS `clientes_view` */;
/*!50001 DROP VIEW IF EXISTS `clientes_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientes_view` AS (select `clientes`.`cli_cod` AS `cli_cod`,`clientes`.`cli_des` AS `cli_des`,`clientes`.`cli_ruc` AS `cli_ruc`,`clientes`.`cli_dir` AS `cli_dir`,`clientes`.`cli_tel` AS `cli_tel`,`clientes`.`cli_mai` AS `cli_mai`,`clientes`.`med_cod` AS `med_cod`,`clientes`.`tic_cod` AS `tic_cod`,`clientes`.`fecha` AS `fecha`,`clientes`.`hora` AS `hora`,`clientes`.`usuario` AS `usuario`,`clientes`.`borrado` AS `borrado`,(select `tipo_cliente`.`tic_des` AS `tic_des` from `tipo_cliente` where (`tipo_cliente`.`tic_cod` = `clientes`.`tic_cod`)) AS `tic_des`,(select `tipo_cliente`.`tic_por` AS `tic_por` from `tipo_cliente` where (`tipo_cliente`.`tic_cod` = `clientes`.`tic_cod`)) AS `tic_por`,(select `medios`.`med_des` AS `med_des` from `medios` where (`medios`.`med_cod` = `clientes`.`med_cod`)) AS `med_des` from `clientes`) */;

/*View structure for view compra_cab_view */

/*!50001 DROP TABLE IF EXISTS `compra_cab_view` */;
/*!50001 DROP VIEW IF EXISTS `compra_cab_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compra_cab_view` AS (select `compra_cab`.`fac_cod` AS `fac_cod`,`compra_cab`.`fac_num` AS `fac_num`,`compra_cab`.`ape_cod` AS `ape_cod`,`compra_cab`.`prv_cod` AS `prv_cod`,(select `proveedores`.`prv_des` AS `prv_des` from `proveedores` where (`proveedores`.`prv_cod` = `compra_cab`.`prv_cod`)) AS `prv_des`,(select `proveedores`.`prv_ruc` AS `prv_ruc` from `proveedores` where (`proveedores`.`prv_cod` = `compra_cab`.`prv_cod`)) AS `prv_ruc`,`compra_cab`.`mpg_cod` AS `mpg_cod`,(select `medios_pago`.`mpg_des` AS `mpg_des` from `medios_pago` where (`medios_pago`.`mpg_cod` = `compra_cab`.`mpg_cod`)) AS `mpg_des`,`compra_cab`.`for_cod` AS `for_cod`,(select `formas_pago`.`for_des` AS `for_des` from `formas_pago` where (`formas_pago`.`for_cod` = `compra_cab`.`for_cod`)) AS `for_des`,`compra_cab`.`tmo_cod` AS `tmo_cod`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `compra_cab`.`tmo_cod`)) AS `tmo_des`,`compra_cab`.`cot_cod` AS `cot_cod`,`compra_cab`.`cot_mon` AS `cot_mon`,`compra_cab`.`tie_cod` AS `tie_cod`,(select `tipo_envio`.`tie_des` AS `tie_des` from `tipo_envio` where (`tipo_envio`.`tie_cod` = `compra_cab`.`tie_cod`)) AS `tie_des`,`compra_cab`.`fac_imp` AS `fac_imp`,replace(format(`compra_cab`.`fac_tot`,0),_utf8',',_utf8'.') AS `fac_tot_1`,`compra_cab`.`fac_tot` AS `fac_tot`,`compra_cab`.`aps_cod` AS `aps_cod`,format(`compra_cab`.`cot_mon`,0) AS `cot_mon_1`,`compra_cab`.`mes_cod` AS `mes_cod`,(select `mesas`.`mes_des` AS `mes_des` from `mesas` where (`mesas`.`mes_cod` = `compra_cab`.`mes_cod`)) AS `mes_des`,`compra_cab`.`fac_est` AS `fac_est`,(case when (`compra_cab`.`fac_est` = 0) then _utf8'Pendiente' else _utf8'Cerrado' end) AS `estado`,`compra_cab`.`fac_sal` AS `fac_sal`,`compra_cab`.`fecha` AS `fecha`,`compra_cab`.`hora` AS `hora`,`compra_cab`.`usuario` AS `usuario`,`compra_cab`.`borrado` AS `borrado` from `compra_cab`) */;

/*View structure for view cotizaciones_view */

/*!50001 DROP TABLE IF EXISTS `cotizaciones_view` */;
/*!50001 DROP VIEW IF EXISTS `cotizaciones_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cotizaciones_view` AS (select `cotizaciones`.`cot_cod` AS `cot_cod`,`cotizaciones`.`tmo_cod` AS `tmo_cod`,`cotizaciones`.`cot_com` AS `cot_com`,`cotizaciones`.`cot_ven` AS `cot_ven`,`cotizaciones`.`fecha` AS `fecha`,`cotizaciones`.`hora` AS `hora`,`cotizaciones`.`usuario` AS `usuario`,`cotizaciones`.`borrado` AS `borrado`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `cotizaciones`.`tmo_cod`)) AS `tmo_des` from `cotizaciones`) */;

/*View structure for view factura_cab_view */

/*!50001 DROP TABLE IF EXISTS `factura_cab_view` */;
/*!50001 DROP VIEW IF EXISTS `factura_cab_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `factura_cab_view` AS (select `factura_cab`.`fac_cod` AS `fac_cod`,`factura_cab`.`fac_num` AS `fac_num`,`factura_cab`.`ape_cod` AS `ape_cod`,`factura_cab`.`cli_cod` AS `cli_cod`,(select `clientes`.`cli_des` AS `cli_des` from `clientes` where (`clientes`.`cli_cod` = `factura_cab`.`cli_cod`)) AS `cli_des`,(select `clientes`.`cli_ruc` AS `cli_ruc` from `clientes` where (`clientes`.`cli_cod` = `factura_cab`.`cli_cod`)) AS `cli_ruc`,`factura_cab`.`mpg_cod` AS `mpg_cod`,(select `medios_pago`.`mpg_des` AS `mpg_des` from `medios_pago` where (`medios_pago`.`mpg_cod` = `factura_cab`.`mpg_cod`)) AS `mpg_des`,`factura_cab`.`for_cod` AS `for_cod`,(select `formas_pago`.`for_des` AS `for_des` from `formas_pago` where (`formas_pago`.`for_cod` = `factura_cab`.`for_cod`)) AS `for_des`,`factura_cab`.`tmo_cod` AS `tmo_cod`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `factura_cab`.`tmo_cod`)) AS `tmo_des`,`factura_cab`.`cot_cod` AS `cot_cod`,`factura_cab`.`cot_mon` AS `cot_mon`,`factura_cab`.`tie_cod` AS `tie_cod`,(select `tipo_envio`.`tie_des` AS `tie_des` from `tipo_envio` where (`tipo_envio`.`tie_cod` = `factura_cab`.`tie_cod`)) AS `tie_des`,`factura_cab`.`fac_imp` AS `fac_imp`,replace(format(`factura_cab`.`fac_tot`,0),_utf8',',_utf8'.') AS `fac_tot_1`,`factura_cab`.`fac_tot` AS `fac_tot`,`factura_cab`.`aps_cod` AS `aps_cod`,format(`factura_cab`.`cot_mon`,0) AS `cot_mon_1`,`factura_cab`.`mes_cod` AS `mes_cod`,(select `mesas`.`mes_des` AS `mes_des` from `mesas` where (`mesas`.`mes_cod` = `factura_cab`.`mes_cod`)) AS `mes_des`,`factura_cab`.`fac_est` AS `fac_est`,(case when (`factura_cab`.`fac_est` = 0) then _utf8'Pendiente' else _utf8'Cerrado' end) AS `estado`,`factura_cab`.`fac_sal` AS `fac_sal`,`factura_cab`.`fac_rec` AS `fac_rec`,`factura_cab`.`fecha` AS `fecha`,`factura_cab`.`hora` AS `hora`,`factura_cab`.`usuario` AS `usuario`,`factura_cab`.`borrado` AS `borrado` from `factura_cab`) */;

/*View structure for view inventarios_cab_view */

/*!50001 DROP TABLE IF EXISTS `inventarios_cab_view` */;
/*!50001 DROP VIEW IF EXISTS `inventarios_cab_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventarios_cab_view` AS (select `inventario_cab`.`inv_cod` AS `inv_cod`,`inventario_cab`.`inv_des` AS `inv_des`,`inventario_cab`.`inv_par` AS `inv_par`,(case `inventario_cab`.`inv_par` when 0 then _utf8'PENDIENTE' when 1 then _utf8'CONFIRMADO' when 2 then _utf8'AJUSTADO' end) AS `par_des`,`inventario_cab`.`inv_fec` AS `inv_fec`,`inventario_cab`.`fecha` AS `fecha`,`inventario_cab`.`hora` AS `hora`,`inventario_cab`.`usuario` AS `usuario`,`inventario_cab`.`borrado` AS `borrado`,(select sum((`inventario_det`.`pro_can` * `inventario_det`.`pro_cos`)) AS `total` from `inventario_det` where ((`inventario_det`.`borrado` = _utf8'0') and (`inventario_det`.`inv_cod` = `inventario_cab`.`inv_cod`)) group by `inventario_det`.`inv_cod`) AS `total`,replace(format((select sum((`inventario_det`.`pro_can` * `inventario_det`.`pro_cos`)) AS `total` from `inventario_det` where ((`inventario_det`.`borrado` = _utf8'0') and (`inventario_det`.`inv_cod` = `inventario_cab`.`inv_cod`)) group by `inventario_det`.`inv_cod`),0),_utf8',',_utf8'.') AS `total_format` from `inventario_cab`) */;

/*View structure for view inventarios_det_view */

/*!50001 DROP TABLE IF EXISTS `inventarios_det_view` */;
/*!50001 DROP VIEW IF EXISTS `inventarios_det_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventarios_det_view` AS (select `inventario_det`.`mde_cod` AS `mde_cod`,`inventario_det`.`inv_cod` AS `inv_cod`,`inventario_det`.`pro_cod` AS `pro_cod`,`inventario_det`.`pro_can` AS `pro_can`,`inventario_det`.`pro_cos` AS `pro_cos`,replace(format(`inventario_det`.`pro_cos`,0),_utf8',',_utf8'.') AS `pro_cos_for`,`inventario_det`.`pro_tot` AS `pro_tot`,replace(format(`inventario_det`.`pro_tot`,0),_utf8',',_utf8'.') AS `pro_tot_for`,`inventario_det`.`fecha` AS `fecha`,`inventario_det`.`hora` AS `hora`,`inventario_det`.`usuario` AS `usuario`,`inventario_det`.`borrado` AS `borrado`,(select `productos_view`.`pro_bar` AS `pro_bar` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `pro_bar`,(select `productos_view`.`pro_des` AS `pro_des` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `pro_des`,(select `productos_view`.`fam_des` AS `fam_des` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `fam_des` from `inventario_det`) */;

/*View structure for view movimientos_view */

/*!50001 DROP TABLE IF EXISTS `movimientos_view` */;
/*!50001 DROP VIEW IF EXISTS `movimientos_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `movimientos_view` AS (select `movimientos`.`mov_cod` AS `mov_cod`,`movimientos`.`mov_nro` AS `mov_nro`,`movimientos`.`mov_obs` AS `mov_obs`,`movimientos`.`mov_mon` AS `mov_mon`,`movimientos`.`mov_par` AS `mov_par`,`movimientos`.`ban_cod` AS `ban_cod`,`movimientos`.`mov_fec` AS `mov_fec`,`movimientos`.`fecha` AS `fecha`,`movimientos`.`hora` AS `hora`,`movimientos`.`usuario` AS `usuario`,`movimientos`.`borrado` AS `borrado`,(select `bancos_view`.`ban_des` AS `ban_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `ban_des`,(select `bancos_view`.`ban_nro` AS `ban_nro` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `ban_nro`,(select `bancos_view`.`tcu_cod` AS `tcu_cod` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tcu_cod`,(select `bancos_view`.`tcu_des` AS `tcu_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tcu_des`,(select `bancos_view`.`tmo_cod` AS `tmo_cod` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tmo_cod`,(select `bancos_view`.`tmo_des` AS `tmo_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tmo_des`,replace(format(`movimientos`.`mov_mon`,0),_utf8',',_utf8'.') AS `monto` from `movimientos`) */;

/*View structure for view produccion_view */

/*!50001 DROP TABLE IF EXISTS `produccion_view` */;
/*!50001 DROP VIEW IF EXISTS `produccion_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produccion_view` AS (select `produccion`.`prd_cod` AS `prd_cod`,`produccion`.`pro_cod` AS `pro_cod`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `pro_des`,(select `productos`.`par_cod` AS `par_cod` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `par_cod`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `fam_cod`,`produccion`.`prd_can` AS `prd_can`,`produccion`.`prd_fec` AS `prd_fec`,`produccion`.`fecha` AS `fecha`,`produccion`.`hora` AS `hora`,`produccion`.`usuario` AS `usuario`,`produccion`.`borrado` AS `borrado` from `produccion`) */;

/*View structure for view productos_view */

/*!50001 DROP TABLE IF EXISTS `productos_view` */;
/*!50001 DROP VIEW IF EXISTS `productos_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productos_view` AS (select `productos`.`pro_cod` AS `pro_cod`,`productos`.`pro_bar` AS `pro_bar`,`productos`.`pro_des` AS `pro_des`,`productos`.`pro_cos` AS `pro_cos`,`productos`.`pro_ven` AS `pro_ven`,`productos`.`pro_can` AS `pro_can`,`productos`.`pro_imp` AS `pro_imp`,`productos`.`par_cod` AS `par_cod`,`productos`.`fam_cod` AS `fam_cod`,`productos`.`uni_cod` AS `uni_cod`,`productos`.`mar_cod` AS `mar_cod`,`productos`.`fecha` AS `fecha`,`productos`.`hora` AS `hora`,`productos`.`usuario` AS `usuario`,`productos`.`borrado` AS `borrado`,(select `parametro`.`par_des` AS `par_des` from `parametro` where (`parametro`.`par_cod` = `productos`.`par_cod`)) AS `par_des`,(select `familias_pro`.`fam_des` AS `fam_des` from `familias_pro` where (`familias_pro`.`fam_cod` = `productos`.`fam_cod`)) AS `fam_des`,(select `unidades`.`uni_des` AS `uni_des` from `unidades` where (`unidades`.`uni_cod` = `productos`.`uni_cod`)) AS `uni_des`,(select `marcas`.`mar_des` AS `mar_des` from `marcas` where (`marcas`.`mar_cod` = `productos`.`mar_cod`)) AS `mar_des` from `productos`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
