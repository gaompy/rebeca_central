DROP TABLE IF EXISTS aper_cie;

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

INSERT INTO aper_cie VALUES("1","500000","502500","502500","1","0","1","2015-10-05","23:13:04","1","0");
INSERT INTO aper_cie VALUES("2","500000","502000","507500","1","-5500","1","2015-10-10","22:11:27","1","0");
INSERT INTO aper_cie VALUES("3","20000","21000","22500","1","-1500","1","2015-10-10","22:13:36","2","0");
INSERT INTO aper_cie VALUES("4","50000","64000","70000","1","-6000","1","2015-10-11","11:56:03","1","0");
INSERT INTO aper_cie VALUES("5","50000","0","50000","1","-50000","1","2015-10-11","13:00:59","1","0");
INSERT INTO aper_cie VALUES("6","500000","427000","542500","1","-115500","1","2015-10-11","13:25:06","1","0");
INSERT INTO aper_cie VALUES("7","500000","550000","590000","1","-40000","1","2015-10-11","23:48:30","1","0");
INSERT INTO aper_cie VALUES("8","150000","200000","162500","1","37500","1","2015-10-12","01:33:10","1","0");
INSERT INTO aper_cie VALUES("9","50000","120000","125000","1","-5000","1","2015-10-12","21:13:49","1","0");
INSERT INTO aper_cie VALUES("10","300000","","","0","","1","2015-10-19","18:02:52","1","0");
INSERT INTO aper_cie VALUES("11","30000","","","0","","1","2015-10-19","18:12:08","2","0");


DROP TABLE IF EXISTS aper_cie_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aper_cie_view` AS (select `aper_cie`.`ape_cod` AS `ape_cod`,replace(convert(format(`aper_cie`.`ape_dot`,0) using utf8),_utf8',',_utf8'.') AS `ape_dot`,replace(convert(format(`aper_cie`.`ape_efe`,0) using utf8),_utf8',',_utf8'.') AS `ape_efe`,replace(convert(format(`aper_cie`.`ape_cie`,0) using utf8),_utf8',',_utf8'.') AS `ape_cie`,(case when (`aper_cie`.`ape_par` = 0) then _utf8'Abierto' when (`aper_cie`.`ape_par` = 1) then _utf8'Cerrado' end) AS `ape_est`,replace(convert(format(`aper_cie`.`ape_dif`,0) using utf8),_utf8',',_utf8'.') AS `ape_dif`,`aper_cie`.`aps_cod` AS `aps_cod`,`aper_cie`.`fecha` AS `fecha`,`aper_cie`.`hora` AS `hora`,`aper_cie`.`usuario` AS `usuario`,`aper_cie`.`borrado` AS `borrado` from `aper_cie`);

INSERT INTO aper_cie_view VALUES("1","500.000","502.500","502.500","Cerrado","0","1","2015-10-05","23:13:04","1","0");
INSERT INTO aper_cie_view VALUES("2","500.000","502.000","507.500","Cerrado","-5.500","1","2015-10-10","22:11:27","1","0");
INSERT INTO aper_cie_view VALUES("3","20.000","21.000","22.500","Cerrado","-1.500","1","2015-10-10","22:13:36","2","0");
INSERT INTO aper_cie_view VALUES("4","50.000","64.000","70.000","Cerrado","-6.000","1","2015-10-11","11:56:03","1","0");
INSERT INTO aper_cie_view VALUES("5","50.000","0","50.000","Cerrado","-50.000","1","2015-10-11","13:00:59","1","0");
INSERT INTO aper_cie_view VALUES("6","500.000","427.000","542.500","Cerrado","-115.500","1","2015-10-11","13:25:06","1","0");
INSERT INTO aper_cie_view VALUES("7","500.000","550.000","590.000","Cerrado","-40.000","1","2015-10-11","23:48:30","1","0");
INSERT INTO aper_cie_view VALUES("8","150.000","200.000","162.500","Cerrado","37.500","1","2015-10-12","01:33:10","1","0");
INSERT INTO aper_cie_view VALUES("9","50.000","120.000","125.000","Cerrado","-5.000","1","2015-10-12","21:13:49","1","0");
INSERT INTO aper_cie_view VALUES("10","300.000","","","Abierto","","1","2015-10-19","18:02:52","1","0");
INSERT INTO aper_cie_view VALUES("11","30.000","","","Abierto","","1","2015-10-19","18:12:08","2","0");


DROP TABLE IF EXISTS aper_sis;

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

INSERT INTO aper_sis VALUES("1","0","0","0","0","2012-09-19","21:50:58","4","0");


DROP TABLE IF EXISTS auditoria;

CREATE TABLE `auditoria` (
  `aud_cod` int(11) NOT NULL auto_increment,
  `aud_ip` varchar(15) default NULL,
  `usu_cod` varchar(20) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  PRIMARY KEY  (`aud_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO auditoria VALUES("1","127.0.0.1","admin","2015-10-05","21:11:55");
INSERT INTO auditoria VALUES("2","127.0.0.1","admin","2015-10-05","21:23:52");
INSERT INTO auditoria VALUES("3","127.0.0.1","admin","2015-10-05","21:25:20");
INSERT INTO auditoria VALUES("4","127.0.0.1","admin","2015-10-05","21:27:45");
INSERT INTO auditoria VALUES("5","127.0.0.1","admin","2015-10-05","21:31:17");
INSERT INTO auditoria VALUES("6","127.0.0.1","admin","2015-10-05","21:33:10");
INSERT INTO auditoria VALUES("7","127.0.0.1","admin","2015-10-05","21:44:40");
INSERT INTO auditoria VALUES("8","127.0.0.1","admin","2015-10-05","21:49:52");
INSERT INTO auditoria VALUES("9","127.0.0.1","caja1","2015-10-05","21:54:02");
INSERT INTO auditoria VALUES("10","127.0.0.1","admin","2015-10-05","22:16:48");
INSERT INTO auditoria VALUES("11","127.0.0.1","caja1","2015-10-05","22:51:17");
INSERT INTO auditoria VALUES("12","127.0.0.1","admin","2015-10-05","23:01:39");
INSERT INTO auditoria VALUES("13","127.0.0.1","admin","2015-10-06","00:35:35");
INSERT INTO auditoria VALUES("14","127.0.0.1","admin","2015-10-06","14:14:42");
INSERT INTO auditoria VALUES("15","127.0.0.1","admin","2015-10-07","11:31:41");
INSERT INTO auditoria VALUES("16","127.0.0.1","admin","2015-10-07","22:22:29");
INSERT INTO auditoria VALUES("17","127.0.0.1","admin","2015-10-08","10:06:53");
INSERT INTO auditoria VALUES("18","127.0.0.1","admin","2015-10-08","21:29:14");
INSERT INTO auditoria VALUES("19","127.0.0.1","admin","2015-10-08","21:29:57");
INSERT INTO auditoria VALUES("20","127.0.0.1","admin","2015-10-08","21:30:08");
INSERT INTO auditoria VALUES("21","127.0.0.1","admin","2015-10-08","21:42:12");
INSERT INTO auditoria VALUES("22","127.0.0.1","admin","2015-10-08","21:42:41");
INSERT INTO auditoria VALUES("23","127.0.0.1","admin","2015-10-08","21:43:36");
INSERT INTO auditoria VALUES("24","127.0.0.1","admin","2015-10-08","22:05:43");
INSERT INTO auditoria VALUES("25","127.0.0.1","admin","2015-10-08","22:52:46");
INSERT INTO auditoria VALUES("26","127.0.0.1","admin","2015-10-09","10:05:43");
INSERT INTO auditoria VALUES("27","127.0.0.1","admin","2015-10-09","10:35:45");
INSERT INTO auditoria VALUES("28","127.0.0.1","admin","2015-10-09","10:38:16");
INSERT INTO auditoria VALUES("29","127.0.0.1","admin","2015-10-09","10:38:59");
INSERT INTO auditoria VALUES("30","127.0.0.1","admin","2015-10-09","10:48:44");
INSERT INTO auditoria VALUES("31","127.0.0.1","admin","2015-10-09","11:49:37");
INSERT INTO auditoria VALUES("32","127.0.0.1","admin","2015-10-09","11:52:56");
INSERT INTO auditoria VALUES("33","127.0.0.1","admin","2015-10-09","14:36:47");
INSERT INTO auditoria VALUES("34","127.0.0.1","admin","2015-10-09","20:56:50");
INSERT INTO auditoria VALUES("35","127.0.0.1","admin","2015-10-09","20:59:32");
INSERT INTO auditoria VALUES("36","127.0.0.1","admin","2015-10-10","10:59:00");
INSERT INTO auditoria VALUES("37","127.0.0.1","admin","2015-10-10","20:29:51");
INSERT INTO auditoria VALUES("38","127.0.0.1","admin","2015-10-10","20:39:46");
INSERT INTO auditoria VALUES("39","127.0.0.1","admin","2015-10-10","20:40:00");
INSERT INTO auditoria VALUES("40","127.0.0.1","admin","2015-10-10","21:23:52");
INSERT INTO auditoria VALUES("41","127.0.0.1","cajero","2015-10-10","22:12:41");
INSERT INTO auditoria VALUES("42","127.0.0.1","admin","2015-10-11","11:51:32");
INSERT INTO auditoria VALUES("43","127.0.0.1","admin","2015-10-11","12:14:42");
INSERT INTO auditoria VALUES("44","127.0.0.1","admin","2015-10-11","12:15:19");
INSERT INTO auditoria VALUES("45","127.0.0.1","admin","2015-10-11","12:15:35");
INSERT INTO auditoria VALUES("46","127.0.0.1","admin","2015-10-11","12:25:25");
INSERT INTO auditoria VALUES("47","127.0.0.1","admin","2015-10-11","14:14:41");
INSERT INTO auditoria VALUES("48","127.0.0.1","admin","2015-10-12","01:30:43");
INSERT INTO auditoria VALUES("49","172.24.252.34","admin","2015-10-12","16:07:45");
INSERT INTO auditoria VALUES("50","127.0.0.1","admin","2015-10-12","20:32:46");
INSERT INTO auditoria VALUES("51","127.0.0.1","admin","2015-10-12","20:39:01");
INSERT INTO auditoria VALUES("52","127.0.0.1","admin","2015-10-12","20:41:35");
INSERT INTO auditoria VALUES("53","127.0.0.1","admin","2015-10-12","20:49:32");
INSERT INTO auditoria VALUES("54","190.23.232.132","admin","2015-10-13","13:52:23");
INSERT INTO auditoria VALUES("55","127.0.0.1","admin","2015-10-14","15:03:59");
INSERT INTO auditoria VALUES("56","127.0.0.1","admin","2015-10-14","20:41:29");
INSERT INTO auditoria VALUES("57","127.0.0.1","admin","2015-10-14","22:52:55");
INSERT INTO auditoria VALUES("58","127.0.0.1","admin","2015-10-15","02:34:39");
INSERT INTO auditoria VALUES("59","127.0.0.1","admin","2015-10-15","10:28:10");
INSERT INTO auditoria VALUES("60","186.16.7.237","admin","2015-10-16","20:55:39");
INSERT INTO auditoria VALUES("61","186.16.7.237","admin","2015-10-18","14:22:37");
INSERT INTO auditoria VALUES("62","186.16.7.237","admin","2015-10-18","14:23:39");
INSERT INTO auditoria VALUES("63","190.23.156.197","admin","2015-10-19","16:20:08");
INSERT INTO auditoria VALUES("64","190.23.156.197","admin","2015-10-19","16:58:28");
INSERT INTO auditoria VALUES("65","190.23.156.197","admin","2015-10-19","17:37:14");
INSERT INTO auditoria VALUES("66","190.23.156.197","cajero","2015-10-19","18:11:49");
INSERT INTO auditoria VALUES("67","190.23.156.197","admin","2015-10-19","18:13:01");
INSERT INTO auditoria VALUES("68","127.0.0.1","admin","2015-10-19","21:53:52");
INSERT INTO auditoria VALUES("69","127.0.0.1","cajero","2015-10-19","22:20:06");
INSERT INTO auditoria VALUES("70","127.0.0.1","admin","2015-10-19","22:20:54");


DROP TABLE IF EXISTS bajas;

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



DROP TABLE IF EXISTS bajas_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bajas_view` AS (select `bajas`.`prd_cod` AS `prd_cod`,`bajas`.`pro_cod` AS `pro_cod`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `pro_des`,(select `productos`.`par_cod` AS `par_cod` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `par_cod`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `fam_cod`,`bajas`.`prd_can` AS `prd_can`,`bajas`.`prd_fec` AS `prd_fec`,`bajas`.`fecha` AS `fecha`,`bajas`.`hora` AS `hora`,`bajas`.`usuario` AS `usuario`,`bajas`.`borrado` AS `borrado` from `bajas`);



DROP TABLE IF EXISTS bancos;

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



DROP TABLE IF EXISTS bancos_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bancos_view` AS (select `bancos`.`ban_cod` AS `ban_cod`,`bancos`.`ban_des` AS `ban_des`,`bancos`.`ban_nro` AS `ban_nro`,`bancos`.`tcu_cod` AS `tcu_cod`,`bancos`.`tmo_cod` AS `tmo_cod`,`bancos`.`fecha` AS `fecha`,`bancos`.`hora` AS `hora`,`bancos`.`usuario` AS `usuario`,`bancos`.`borrado` AS `borrado`,(select `tipo_cuenta`.`tcu_des` AS `tcu_des` from `tipo_cuenta` where (`tipo_cuenta`.`tcu_cod` = `bancos`.`tcu_cod`)) AS `tcu_des`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `bancos`.`tmo_cod`)) AS `tmo_des` from `bancos`);



DROP TABLE IF EXISTS caja_diaria;

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



DROP TABLE IF EXISTS clientes;

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

INSERT INTO clientes VALUES("1","CLIENTE OCACIONAL","--","--","--","--","4","3","2015-10-10","11:54:25","1","0");
INSERT INTO clientes VALUES("2","GGGG","--","--","--","--","4","3","2015-10-05","23:22:21","1","0");
INSERT INTO clientes VALUES("3","QQQQ","--","--","--","--","4","3","2015-10-05","23:31:36","1","0");
INSERT INTO clientes VALUES("4","ASASS","--","--","--","--","1","3","2015-10-14","20:46:51","1","0");
INSERT INTO clientes VALUES("5","PPP","--","--","--","--","4","3","2015-10-05","23:32:51","1","0");
INSERT INTO clientes VALUES("6","ASFFASF","--","--","--","--","4","3","2015-10-05","23:33:21","1","0");
INSERT INTO clientes VALUES("7","KKKKK","--","--","--","--","4","3","2015-10-05","23:33:27","1","0");
INSERT INTO clientes VALUES("8","HFFHFHFH","--","--","--","--","4","3","2015-10-05","23:42:47","1","0");
INSERT INTO clientes VALUES("9","KKKKK","--","--","--","--","4","3","2015-10-05","23:49:47","1","0");
INSERT INTO clientes VALUES("10","ARIEL","3219801","--","--","--","2","3","2015-10-14","20:46:18","1","0");
INSERT INTO clientes VALUES("11","FGSDFG","--","--","--","--","4","3","2015-10-06","00:32:35","1","0");
INSERT INTO clientes VALUES("12","JORGE","--","--","--","--","4","3","2015-10-12","01:14:31","1","0");


DROP TABLE IF EXISTS clientes_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientes_view` AS (select `clientes`.`cli_cod` AS `cli_cod`,`clientes`.`cli_des` AS `cli_des`,`clientes`.`cli_ruc` AS `cli_ruc`,`clientes`.`cli_dir` AS `cli_dir`,`clientes`.`cli_tel` AS `cli_tel`,`clientes`.`cli_mai` AS `cli_mai`,`clientes`.`med_cod` AS `med_cod`,`clientes`.`tic_cod` AS `tic_cod`,`clientes`.`fecha` AS `fecha`,`clientes`.`hora` AS `hora`,`clientes`.`usuario` AS `usuario`,`clientes`.`borrado` AS `borrado`,(select `tipo_cliente`.`tic_des` AS `tic_des` from `tipo_cliente` where (`tipo_cliente`.`tic_cod` = `clientes`.`tic_cod`)) AS `tic_des`,(select `tipo_cliente`.`tic_por` AS `tic_por` from `tipo_cliente` where (`tipo_cliente`.`tic_cod` = `clientes`.`tic_cod`)) AS `tic_por`,(select `medios`.`med_des` AS `med_des` from `medios` where (`medios`.`med_cod` = `clientes`.`med_cod`)) AS `med_des` from `clientes`);

INSERT INTO clientes_view VALUES("1","CLIENTE OCACIONAL","--","--","--","--","4","3","2015-10-10","11:54:25","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("2","GGGG","--","--","--","--","4","3","2015-10-05","23:22:21","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("3","QQQQ","--","--","--","--","4","3","2015-10-05","23:31:36","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("4","ASASS","--","--","--","--","1","3","2015-10-14","20:46:51","1","0","ESTANDAR","0","OTROS");
INSERT INTO clientes_view VALUES("5","PPP","--","--","--","--","4","3","2015-10-05","23:32:51","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("6","ASFFASF","--","--","--","--","4","3","2015-10-05","23:33:21","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("7","KKKKK","--","--","--","--","4","3","2015-10-05","23:33:27","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("8","HFFHFHFH","--","--","--","--","4","3","2015-10-05","23:42:47","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("9","KKKKK","--","--","--","--","4","3","2015-10-05","23:49:47","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("10","ARIEL","3219801","--","--","--","2","3","2015-10-14","20:46:18","1","0","ESTANDAR","0","PROPIOS MEDIOS");
INSERT INTO clientes_view VALUES("11","FGSDFG","--","--","--","--","4","3","2015-10-06","00:32:35","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("12","JORGE","--","--","--","--","4","3","2015-10-12","01:14:31","1","0","ESTANDAR","0","FACEBOOK");


DROP TABLE IF EXISTS cobros;

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

INSERT INTO cobros VALUES("1","39","10","300000","1700000","2015-10-19","18:33:12","1","0");
INSERT INTO cobros VALUES("2","37","1","75000","0","2015-10-19","18:34:13","1","0");


DROP TABLE IF EXISTS compra_cab;

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

INSERT INTO compra_cab VALUES("1","01-01","0","1","1","1","1","1","2000","0","2000","2000","0","0","1","0","2015-10-10","21:56:51","1","0");
INSERT INTO compra_cab VALUES("2","0101","0","1","1","2","1","1","10000","0","10000","10000","0","0","1","10000","2015-10-11","22:03:37","1","0");


DROP TABLE IF EXISTS compra_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compra_cab_view` AS (select `compra_cab`.`fac_cod` AS `fac_cod`,`compra_cab`.`fac_num` AS `fac_num`,`compra_cab`.`ape_cod` AS `ape_cod`,`compra_cab`.`prv_cod` AS `prv_cod`,(select `proveedores`.`prv_des` AS `prv_des` from `proveedores` where (`proveedores`.`prv_cod` = `compra_cab`.`prv_cod`)) AS `prv_des`,(select `proveedores`.`prv_ruc` AS `prv_ruc` from `proveedores` where (`proveedores`.`prv_cod` = `compra_cab`.`prv_cod`)) AS `prv_ruc`,`compra_cab`.`mpg_cod` AS `mpg_cod`,(select `medios_pago`.`mpg_des` AS `mpg_des` from `medios_pago` where (`medios_pago`.`mpg_cod` = `compra_cab`.`mpg_cod`)) AS `mpg_des`,`compra_cab`.`for_cod` AS `for_cod`,(select `formas_pago`.`for_des` AS `for_des` from `formas_pago` where (`formas_pago`.`for_cod` = `compra_cab`.`for_cod`)) AS `for_des`,`compra_cab`.`tmo_cod` AS `tmo_cod`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `compra_cab`.`tmo_cod`)) AS `tmo_des`,`compra_cab`.`cot_cod` AS `cot_cod`,`compra_cab`.`cot_mon` AS `cot_mon`,`compra_cab`.`tie_cod` AS `tie_cod`,(select `tipo_envio`.`tie_des` AS `tie_des` from `tipo_envio` where (`tipo_envio`.`tie_cod` = `compra_cab`.`tie_cod`)) AS `tie_des`,`compra_cab`.`fac_imp` AS `fac_imp`,replace(convert(format(`compra_cab`.`fac_tot`,0) using utf8),_utf8',',_utf8'.') AS `fac_tot_1`,`compra_cab`.`fac_tot` AS `fac_tot`,`compra_cab`.`aps_cod` AS `aps_cod`,format(`compra_cab`.`cot_mon`,0) AS `cot_mon_1`,`compra_cab`.`mes_cod` AS `mes_cod`,(select `mesas`.`mes_des` AS `mes_des` from `mesas` where (`mesas`.`mes_cod` = `compra_cab`.`mes_cod`)) AS `mes_des`,`compra_cab`.`fac_est` AS `fac_est`,(case when (`compra_cab`.`fac_est` = 0) then _utf8'Pendiente' else _utf8'Cerrado' end) AS `estado`,`compra_cab`.`fac_sal` AS `fac_sal`,`compra_cab`.`fecha` AS `fecha`,`compra_cab`.`hora` AS `hora`,`compra_cab`.`usuario` AS `usuario`,`compra_cab`.`borrado` AS `borrado` from `compra_cab`);

INSERT INTO compra_cab_view VALUES("1","01-01","0","1","X","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2000","0","","2000","2.000","2000","0","2,000","0","","1","Cerrado","0","2015-10-10","21:56:51","1","0");
INSERT INTO compra_cab_view VALUES("2","0101","0","1","X","--","1","EFECTIVO","2","CREDITO","1","GUARANIES","1","10000","0","","10000","10.000","10000","0","10,000","0","","1","Cerrado","10000","2015-10-11","22:03:37","1","0");


DROP TABLE IF EXISTS compra_det;

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

INSERT INTO compra_det VALUES("1","0","1","1","1","0","0","0","0","2015-10-10","21:56:05","1","1");
INSERT INTO compra_det VALUES("2","0","1","1","1","2000","2000","0","0","2015-10-10","21:56:36","1","0");
INSERT INTO compra_det VALUES("3","0","2","1","2","2000","4000","0","0","2015-10-11","22:03:16","1","0");
INSERT INTO compra_det VALUES("4","0","2","1","3","2000","6000","0","0","2015-10-11","22:03:21","1","0");


DROP TABLE IF EXISTS cotizaciones;

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

INSERT INTO cotizaciones VALUES("1","2","5500","5600","2015-10-11","12:38:32","1","0");


DROP TABLE IF EXISTS cotizaciones_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cotizaciones_view` AS (select `cotizaciones`.`cot_cod` AS `cot_cod`,`cotizaciones`.`tmo_cod` AS `tmo_cod`,`cotizaciones`.`cot_com` AS `cot_com`,`cotizaciones`.`cot_ven` AS `cot_ven`,`cotizaciones`.`fecha` AS `fecha`,`cotizaciones`.`hora` AS `hora`,`cotizaciones`.`usuario` AS `usuario`,`cotizaciones`.`borrado` AS `borrado`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `cotizaciones`.`tmo_cod`)) AS `tmo_des` from `cotizaciones`);

INSERT INTO cotizaciones_view VALUES("1","2","5500","5600","2015-10-11","12:38:32","1","0","DOLARES");


DROP TABLE IF EXISTS depositos;

CREATE TABLE `depositos` (
  `dep_cod` int(11) NOT NULL,
  `dep_des` varchar(255) default NULL,
  `suc_cod` int(11) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`dep_cod`),
  KEY `FK_depositos` (`suc_cod`),
  CONSTRAINT `FK_depositos` FOREIGN KEY (`suc_cod`) REFERENCES `sucursales` (`suc_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO depositos VALUES("1","DEPOSITO 1","1","2015-10-08","10:37:41","1","0");
INSERT INTO depositos VALUES("2","DEPOSITO 2","1","2015-10-08","11:11:05","1","0");
INSERT INTO depositos VALUES("3","DEPOSITO1","2","2015-10-19","22:22:53","1","0");


DROP TABLE IF EXISTS depositos_pro;

CREATE TABLE `depositos_pro` (
  `dpr_cod` int(11) NOT NULL auto_increment,
  `dep_cod` int(11) default NULL,
  `dpr_can` double default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(1) default '0',
  PRIMARY KEY  (`dpr_cod`),
  KEY `FK_depositos_pro` (`dep_cod`),
  CONSTRAINT `FK_depositos_pro` FOREIGN KEY (`dep_cod`) REFERENCES `depositos` (`dep_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS factura_cab;

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

INSERT INTO factura_cab VALUES("1","0","1","1","1","1","1","1","2500","1","2500","2500","1","3","1","0","","2015-10-10","22:07:55","1","0");
INSERT INTO factura_cab VALUES("2","","1","1","","","","","","","","","1","4","0","","","2015-10-07","22:23:40","1","0");
INSERT INTO factura_cab VALUES("3","","1","1","","","","","","","","","1","1","0","","","2015-10-10","11:49:40","1","0");
INSERT INTO factura_cab VALUES("4","","1","1","","","","","","","","","1","1","0","","","2015-10-10","11:55:20","1","0");
INSERT INTO factura_cab VALUES("5","","1","1","","","","","","","","","1","1","0","","","2015-10-10","12:00:53","1","0");
INSERT INTO factura_cab VALUES("6","0","3","1","1","1","1","1","2500","1","3000","2500","1","2","1","0","","2015-10-10","22:17:48","2","1");
INSERT INTO factura_cab VALUES("7","0","2","1","1","1","1","1","7500","1","8000","7500","1","12","1","0","","2015-10-10","22:21:48","1","0");
INSERT INTO factura_cab VALUES("8","0","4","1","1","1","1","1","2500","1","2500","2500","1","1","1","0","","2015-10-11","12:01:27","1","0");
INSERT INTO factura_cab VALUES("9","0","4","1","1","1","1","1","7500","1","10000","7500","1","4","1","0","","2015-10-11","12:36:03","1","0");
INSERT INTO factura_cab VALUES("10","0","4","1","1","1","1","1","2500","1","25000","2500","1","3","1","0","","2015-10-11","13:24:08","1","0");
INSERT INTO factura_cab VALUES("11","0","4","1","1","1","1","1","2500","1","3000","2500","1","20","1","0","","2015-10-11","13:24:28","1","0");
INSERT INTO factura_cab VALUES("12","0","4","1","1","1","1","1","2500","1","3000","2500","1","11","1","0","","2015-10-11","13:24:20","1","0");
INSERT INTO factura_cab VALUES("13","0","4","1","1","1","1","1","10000","1","100000","10000","1","16","1","0","","2015-10-11","13:24:36","1","0");
INSERT INTO factura_cab VALUES("14","0","4","1","1","1","1","1","7500","1","8000","7500","1","1","1","0","","2015-10-11","12:45:29","1","1");
INSERT INTO factura_cab VALUES("15","0","4","1","1","1","1","1","2500","1","25000","2500","1","2","1","0","","2015-10-11","13:23:58","1","0");
INSERT INTO factura_cab VALUES("16","","4","1","","","","","","","","","1","1","0","","","2015-10-11","12:48:17","1","1");
INSERT INTO factura_cab VALUES("17","0","4","1","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-10-11","12:55:58","1","1");
INSERT INTO factura_cab VALUES("18","0","6","1","1","1","1","1","25000","1","30000","25000","1","1","1","0","","2015-10-11","13:26:48","1","0");
INSERT INTO factura_cab VALUES("19","0","6","1","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-10-11","13:27:01","1","0");
INSERT INTO factura_cab VALUES("20","0","6","1","1","1","1","1","2500","1","30000","2500","1","12","1","0","","2015-10-11","13:27:34","1","0");
INSERT INTO factura_cab VALUES("21","0","6","1","1","1","1","1","5000","1","10000","5000","1","7","1","0","","2015-10-11","13:27:18","1","0");
INSERT INTO factura_cab VALUES("22","0","6","1","1","1","1","1","2500","1","50000","2500","1","17","1","0","","2015-10-11","14:15:16","1","0");
INSERT INTO factura_cab VALUES("23","0","6","1","1","1","1","1","2500","1","3000","2500","1","21","1","0","","2015-10-11","13:27:28","1","0");
INSERT INTO factura_cab VALUES("24","0","6","1","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-10-11","14:14:58","1","0");
INSERT INTO factura_cab VALUES("25","","7","1","","","","","","","","","1","1","0","","","2015-10-11","23:48:41","1","1");
INSERT INTO factura_cab VALUES("26","0","7","1","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-10-11","23:50:56","1","0");
INSERT INTO factura_cab VALUES("27","0","7","1","1","1","1","1","17500","1","20000","17500","1","3","1","0","","2015-10-12","00:10:53","1","0");
INSERT INTO factura_cab VALUES("28","0","7","1","1","1","1","1","17500","1","20000","17500","1","2","1","0","","2015-10-12","00:58:11","1","0");
INSERT INTO factura_cab VALUES("29","0","7","1","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-10-12","01:03:23","1","0");
INSERT INTO factura_cab VALUES("30","0","7","1","1","1","1","1","7500","1","8000","7500","1","3","1","0","","2015-10-12","01:12:41","1","0");
INSERT INTO factura_cab VALUES("31","0","7","12","1","1","1","1","17500","1","2000","17500","1","3","1","0","","2015-10-12","01:15:19","1","0");
INSERT INTO factura_cab VALUES("32","0","7","1","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-10-12","01:19:41","1","0");
INSERT INTO factura_cab VALUES("33","0","7","1","1","1","1","1","10000","1","10000","10000","1","10","1","0","","2015-10-12","01:31:08","1","0");
INSERT INTO factura_cab VALUES("34","0","7","1","1","1","1","1","12500","1","15000","12500","1","3","1","0","","2015-10-12","01:24:20","1","0");
INSERT INTO factura_cab VALUES("35","0","8","1","1","1","1","1","7500","1","8000","7500","1","3","1","0","","2015-10-12","21:04:43","1","0");
INSERT INTO factura_cab VALUES("36","0","8","1","1","1","2","1","0.89","2","893","5000","1","4","1","0","","2015-10-12","21:05:39","1","0");
INSERT INTO factura_cab VALUES("37","0","9","1","1","2","1","1","75000","1","100000","75000","1","1","1","0","","2015-10-19","17:56:56","1","0");
INSERT INTO factura_cab VALUES("38","0","10","1","1","1","1","1","4000000","1","5000000","4000000","1","1","1","0","","2015-10-19","18:03:54","1","0");
INSERT INTO factura_cab VALUES("39","0","10","10","1","2","1","1","2000000","3","3000000","2000000","1","1","1","1700000","fgfgfgfg","2015-10-19","18:28:44","1","0");


DROP TABLE IF EXISTS factura_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `factura_cab_view` AS (select `factura_cab`.`fac_cod` AS `fac_cod`,`factura_cab`.`fac_num` AS `fac_num`,`factura_cab`.`ape_cod` AS `ape_cod`,`factura_cab`.`cli_cod` AS `cli_cod`,(select `clientes`.`cli_des` AS `cli_des` from `clientes` where (`clientes`.`cli_cod` = `factura_cab`.`cli_cod`)) AS `cli_des`,(select `clientes`.`cli_ruc` AS `cli_ruc` from `clientes` where (`clientes`.`cli_cod` = `factura_cab`.`cli_cod`)) AS `cli_ruc`,`factura_cab`.`mpg_cod` AS `mpg_cod`,(select `medios_pago`.`mpg_des` AS `mpg_des` from `medios_pago` where (`medios_pago`.`mpg_cod` = `factura_cab`.`mpg_cod`)) AS `mpg_des`,`factura_cab`.`for_cod` AS `for_cod`,(select `formas_pago`.`for_des` AS `for_des` from `formas_pago` where (`formas_pago`.`for_cod` = `factura_cab`.`for_cod`)) AS `for_des`,`factura_cab`.`tmo_cod` AS `tmo_cod`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `factura_cab`.`tmo_cod`)) AS `tmo_des`,`factura_cab`.`cot_cod` AS `cot_cod`,`factura_cab`.`cot_mon` AS `cot_mon`,`factura_cab`.`tie_cod` AS `tie_cod`,(select `tipo_envio`.`tie_des` AS `tie_des` from `tipo_envio` where (`tipo_envio`.`tie_cod` = `factura_cab`.`tie_cod`)) AS `tie_des`,`factura_cab`.`fac_imp` AS `fac_imp`,replace(convert(format(`factura_cab`.`fac_tot`,0) using utf8),_utf8',',_utf8'.') AS `fac_tot_1`,`factura_cab`.`fac_tot` AS `fac_tot`,`factura_cab`.`aps_cod` AS `aps_cod`,format(`factura_cab`.`cot_mon`,0) AS `cot_mon_1`,`factura_cab`.`mes_cod` AS `mes_cod`,(select `mesas`.`mes_des` AS `mes_des` from `mesas` where (`mesas`.`mes_cod` = `factura_cab`.`mes_cod`)) AS `mes_des`,`factura_cab`.`fac_est` AS `fac_est`,(case when (`factura_cab`.`fac_est` = 0) then _utf8'Pendiente' else _utf8'Cerrado' end) AS `estado`,`factura_cab`.`fac_sal` AS `fac_sal`,`factura_cab`.`fac_rec` AS `fac_rec`,`factura_cab`.`fecha` AS `fecha`,`factura_cab`.`hora` AS `hora`,`factura_cab`.`usuario` AS `usuario`,`factura_cab`.`borrado` AS `borrado` from `factura_cab`);

INSERT INTO factura_cab_view VALUES("1","0","1","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","2500","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-10","22:07:55","1","0");
INSERT INTO factura_cab_view VALUES("2","","1","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","4","MESA 4","0","Pendiente","","","2015-10-07","22:23:40","1","0");
INSERT INTO factura_cab_view VALUES("3","","1","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MOSTRADOR","0","Pendiente","","","2015-10-10","11:49:40","1","0");
INSERT INTO factura_cab_view VALUES("4","","1","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MOSTRADOR","0","Pendiente","","","2015-10-10","11:55:20","1","0");
INSERT INTO factura_cab_view VALUES("5","","1","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MOSTRADOR","0","Pendiente","","","2015-10-10","12:00:53","1","0");
INSERT INTO factura_cab_view VALUES("6","0","3","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-10-10","22:17:48","2","1");
INSERT INTO factura_cab_view VALUES("7","0","2","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","8000","7.500","7500","1","7,500","12","MESA 12","1","Cerrado","0","","2015-10-10","22:21:48","1","0");
INSERT INTO factura_cab_view VALUES("8","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","2500","2.500","2500","1","2,500","1","MOSTRADOR","1","Cerrado","0","","2015-10-11","12:01:27","1","0");
INSERT INTO factura_cab_view VALUES("9","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","10000","7.500","7500","1","7,500","4","MESA 4","1","Cerrado","0","","2015-10-11","12:36:03","1","0");
INSERT INTO factura_cab_view VALUES("10","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","25000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-11","13:24:08","1","0");
INSERT INTO factura_cab_view VALUES("11","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","20","MESA 20","1","Cerrado","0","","2015-10-11","13:24:28","1","0");
INSERT INTO factura_cab_view VALUES("12","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","11","MESA 11","1","Cerrado","0","","2015-10-11","13:24:20","1","0");
INSERT INTO factura_cab_view VALUES("13","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","10000","1","EN CAJA","100000","10.000","10000","1","10,000","16","MESA 16","1","Cerrado","0","","2015-10-11","13:24:36","1","0");
INSERT INTO factura_cab_view VALUES("14","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","8000","7.500","7500","1","7,500","1","MOSTRADOR","1","Cerrado","0","","2015-10-11","12:45:29","1","1");
INSERT INTO factura_cab_view VALUES("15","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","25000","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-10-11","13:23:58","1","0");
INSERT INTO factura_cab_view VALUES("16","","4","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MOSTRADOR","0","Pendiente","","","2015-10-11","12:48:17","1","1");
INSERT INTO factura_cab_view VALUES("17","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MOSTRADOR","1","Cerrado","0","","2015-10-11","12:55:58","1","1");
INSERT INTO factura_cab_view VALUES("18","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","25000","1","EN CAJA","30000","25.000","25000","1","25,000","1","MOSTRADOR","1","Cerrado","0","","2015-10-11","13:26:48","1","0");
INSERT INTO factura_cab_view VALUES("19","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-10-11","13:27:01","1","0");
INSERT INTO factura_cab_view VALUES("20","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","12","MESA 12","1","Cerrado","0","","2015-10-11","13:27:34","1","0");
INSERT INTO factura_cab_view VALUES("21","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","7","MESA 7","1","Cerrado","0","","2015-10-11","13:27:18","1","0");
INSERT INTO factura_cab_view VALUES("22","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","50000","2.500","2500","1","2,500","17","MESA 17","1","Cerrado","0","","2015-10-11","14:15:16","1","0");
INSERT INTO factura_cab_view VALUES("23","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","21","MESA 21","1","Cerrado","0","","2015-10-11","13:27:28","1","0");
INSERT INTO factura_cab_view VALUES("24","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MOSTRADOR","1","Cerrado","0","","2015-10-11","14:14:58","1","0");
INSERT INTO factura_cab_view VALUES("25","","7","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MOSTRADOR","0","Pendiente","","","2015-10-11","23:48:41","1","1");
INSERT INTO factura_cab_view VALUES("26","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MOSTRADOR","1","Cerrado","0","","2015-10-11","23:50:56","1","0");
INSERT INTO factura_cab_view VALUES("27","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","17500","1","EN CAJA","20000","17.500","17500","1","17,500","3","MESA 3","1","Cerrado","0","","2015-10-12","00:10:53","1","0");
INSERT INTO factura_cab_view VALUES("28","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","17500","1","EN CAJA","20000","17.500","17500","1","17,500","2","MESA 2","1","Cerrado","0","","2015-10-12","00:58:11","1","0");
INSERT INTO factura_cab_view VALUES("29","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-10-12","01:03:23","1","0");
INSERT INTO factura_cab_view VALUES("30","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","8000","7.500","7500","1","7,500","3","MESA 3","1","Cerrado","0","","2015-10-12","01:12:41","1","0");
INSERT INTO factura_cab_view VALUES("31","0","7","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","17500","1","EN CAJA","2000","17.500","17500","1","17,500","3","MESA 3","1","Cerrado","0","","2015-10-12","01:15:19","1","0");
INSERT INTO factura_cab_view VALUES("32","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-10-12","01:19:41","1","0");
INSERT INTO factura_cab_view VALUES("33","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","10000","1","EN CAJA","10000","10.000","10000","1","10,000","10","MESA 10","1","Cerrado","0","","2015-10-12","01:31:08","1","0");
INSERT INTO factura_cab_view VALUES("34","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","12500","1","EN CAJA","15000","12.500","12500","1","12,500","3","MESA 3","1","Cerrado","0","","2015-10-12","01:24:20","1","0");
INSERT INTO factura_cab_view VALUES("35","0","8","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","8000","7.500","7500","1","7,500","3","MESA 3","1","Cerrado","0","","2015-10-12","21:04:43","1","0");
INSERT INTO factura_cab_view VALUES("36","0","8","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","2","DOLARES","1","0.89","2","DELIVERY","893","5.000","5000","1","1","4","MESA 4","1","Cerrado","0","","2015-10-12","21:05:39","1","0");
INSERT INTO factura_cab_view VALUES("37","0","9","1","CLIENTE OCACIONAL","--","1","EFECTIVO","2","CREDITO","1","GUARANIES","1","75000","1","EN CAJA","100000","75.000","75000","1","75,000","1","MOSTRADOR","1","Cerrado","0","","2015-10-19","17:56:56","1","0");
INSERT INTO factura_cab_view VALUES("38","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","4000000","1","EN CAJA","5000000","4.000.000","4000000","1","4,000,000","1","MOSTRADOR","1","Cerrado","0","","2015-10-19","18:03:54","1","0");
INSERT INTO factura_cab_view VALUES("39","0","10","10","ARIEL","3219801","1","EFECTIVO","2","CREDITO","1","GUARANIES","1","2000000","3","ENTREGADO","3000000","2.000.000","2000000","1","2,000,000","1","MOSTRADOR","1","Cerrado","1700000","fgfgfgfg","2015-10-19","18:28:44","1","0");


DROP TABLE IF EXISTS factura_det;

CREATE TABLE `factura_det` (
  `mde_cod` int(11) NOT NULL auto_increment,
  `ape_cod` int(11) default NULL,
  `fac_cod` int(11) default NULL,
  `pro_cod` int(11) default NULL,
  `pro_can` double default NULL,
  `pro_gus1` int(11) default NULL,
  `pro_gus2` int(11) default NULL,
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

INSERT INTO factura_det VALUES("1","1","1","1","1","","","2500","2500","0","1","2015-10-10","22:07:35","1","0");
INSERT INTO factura_det VALUES("2","3","6","1","1","","","2500","2500","0","1","2015-10-10","22:13:52","2","1");
INSERT INTO factura_det VALUES("3","2","7","1","3","","","2500","7500","0","1","2015-10-10","22:14:07","1","0");
INSERT INTO factura_det VALUES("4","3","6","1","1","","","2500","2500","0","1","2015-10-10","22:17:41","2","0");
INSERT INTO factura_det VALUES("5","4","8","1","1","","","2500","2500","0","1","2015-10-11","11:56:10","1","0");
INSERT INTO factura_det VALUES("6","4","9","1","3","","","2500","7500","0","1","2015-10-11","12:08:02","1","0");
INSERT INTO factura_det VALUES("7","4","10","1","1","","","2500","2500","0","1","2015-10-11","12:11:02","1","0");
INSERT INTO factura_det VALUES("8","4","11","1","1","","","2500","2500","0","1","2015-10-11","12:36:09","1","0");
INSERT INTO factura_det VALUES("9","4","12","1","1","","","2500","2500","0","1","2015-10-11","12:36:34","1","0");
INSERT INTO factura_det VALUES("10","4","13","1","1","","","2500","2500","0","1","2015-10-11","12:36:42","1","0");
INSERT INTO factura_det VALUES("11","4","13","1","3","","","2500","7500","0","1","2015-10-11","12:39:02","1","0");
INSERT INTO factura_det VALUES("12","4","14","1","13","","","2500","32500","0","1","2015-10-11","12:40:34","1","1");
INSERT INTO factura_det VALUES("13","4","14","1","3","","","2500","7500","0","1","2015-10-11","12:45:22","1","0");
INSERT INTO factura_det VALUES("14","4","15","1","1","","","2500","2500","0","1","2015-10-11","12:45:38","1","0");
INSERT INTO factura_det VALUES("15","4","16","1","1","","","2500","2500","0","1","2015-10-11","12:48:17","1","1");
INSERT INTO factura_det VALUES("16","4","17","1","1","","","2500","2500","0","1","2015-10-11","12:55:40","1","1");
INSERT INTO factura_det VALUES("17","6","18","1","10","","","2500","25000","0","1","2015-10-11","13:25:12","1","0");
INSERT INTO factura_det VALUES("18","6","19","1","1","","","2500","2500","0","1","2015-10-11","13:25:19","1","0");
INSERT INTO factura_det VALUES("19","6","20","1","1","","","2500","2500","0","1","2015-10-11","13:25:39","1","0");
INSERT INTO factura_det VALUES("20","6","21","1","1","","","2500","2500","0","1","2015-10-11","13:25:48","1","0");
INSERT INTO factura_det VALUES("21","6","22","1","1","","","2500","2500","0","1","2015-10-11","13:25:56","1","0");
INSERT INTO factura_det VALUES("22","6","23","1","1","","","2500","2500","0","1","2015-10-11","13:26:02","1","0");
INSERT INTO factura_det VALUES("23","6","21","1","1","","","2500","2500","0","1","2015-10-11","13:27:11","1","0");
INSERT INTO factura_det VALUES("24","6","24","1","1","","","2500","2500","0","1","2015-10-11","13:33:20","1","0");
INSERT INTO factura_det VALUES("25","7","25","1","1","","","2500","2500","0","1","2015-10-11","23:48:41","1","1");
INSERT INTO factura_det VALUES("26","7","26","1","1","","","2500","2500","0","1","2015-10-11","23:49:55","1","0");
INSERT INTO factura_det VALUES("27","7","27","1","1","","","2500","2500","0","1","2015-10-11","23:57:05","1","0");
INSERT INTO factura_det VALUES("28","7","27","1","1","","","2500","2500","0","1","2015-10-12","00:02:20","1","0");
INSERT INTO factura_det VALUES("29","7","27","1","1","","","2500","2500","0","1","2015-10-12","00:03:32","1","0");
INSERT INTO factura_det VALUES("30","7","27","1","1","","","2500","2500","0","1","2015-10-12","00:05:53","1","0");
INSERT INTO factura_det VALUES("31","7","27","1","1","","","2500","2500","0","1","2015-10-12","00:10:13","1","0");
INSERT INTO factura_det VALUES("32","7","27","1","2","","","2500","5000","0","1","2015-10-12","00:10:27","1","0");
INSERT INTO factura_det VALUES("33","7","28","1","1","","","2500","2500","0","1","2015-10-12","00:11:06","1","0");
INSERT INTO factura_det VALUES("34","7","28","1","2","","","2500","5000","0","1","2015-10-12","00:11:17","1","0");
INSERT INTO factura_det VALUES("35","7","28","1","1","11","22","2500","2500","0","1","2015-10-12","00:18:35","1","0");
INSERT INTO factura_det VALUES("36","7","28","1","3","11","33","2500","7500","0","1","2015-10-12","00:29:43","1","0");
INSERT INTO factura_det VALUES("37","7","29","1","1","11","22","2500","2500","0","1","2015-10-12","00:58:46","1","0");
INSERT INTO factura_det VALUES("38","7","30","1","1","11","11","2500","2500","0","1","2015-10-12","01:05:06","1","0");
INSERT INTO factura_det VALUES("39","7","30","1","1","0","0","2500","2500","0","1","2015-10-12","01:07:21","1","0");
INSERT INTO factura_det VALUES("40","7","30","1","1","","","2500","2500","0","1","2015-10-12","01:10:22","1","0");
INSERT INTO factura_det VALUES("41","7","31","1","1","","","2500","2500","0","1","2015-10-12","01:13:03","1","0");
INSERT INTO factura_det VALUES("42","7","31","1","3","","","2500","7500","0","1","2015-10-12","01:14:45","1","0");
INSERT INTO factura_det VALUES("43","7","31","1","3","","","2500","7500","0","1","2015-10-12","01:14:59","1","0");
INSERT INTO factura_det VALUES("44","7","32","1","1","","","2500","2500","0","1","2015-10-12","01:19:27","1","0");
INSERT INTO factura_det VALUES("45","7","33","1","1","","","2500","2500","0","1","2015-10-12","01:19:50","1","0");
INSERT INTO factura_det VALUES("46","7","33","1","1","","","2500","2500","0","1","2015-10-12","01:19:59","1","0");
INSERT INTO factura_det VALUES("47","7","33","1","1","","","2500","2500","0","1","2015-10-12","01:20:16","1","0");
INSERT INTO factura_det VALUES("48","7","34","1","1","","","2500","2500","0","1","2015-10-12","01:21:04","1","0");
INSERT INTO factura_det VALUES("49","7","34","1","1","","","2500","2500","0","1","2015-10-12","01:21:45","1","0");
INSERT INTO factura_det VALUES("50","7","34","1","1","","","2500","2500","0","1","2015-10-12","01:22:44","1","0");
INSERT INTO factura_det VALUES("51","7","34","1","1","","","2500","2500","0","1","2015-10-12","01:23:12","1","0");
INSERT INTO factura_det VALUES("52","7","34","1","1","11","32","2500","2500","0","1","2015-10-12","01:24:04","1","0");
INSERT INTO factura_det VALUES("53","7","33","1","1","11","32","2500","2500","0","1","2015-10-12","01:26:01","1","0");
INSERT INTO factura_det VALUES("54","8","35","1","1","11","22","2500","2500","0","1","2015-10-12","16:14:01","1","0");
INSERT INTO factura_det VALUES("55","8","35","1","1","","","2500","2500","0","1","2015-10-12","20:54:01","1","0");
INSERT INTO factura_det VALUES("56","8","35","1","1","11","23","2500","2500","0","1","2015-10-12","20:54:10","1","0");
INSERT INTO factura_det VALUES("57","8","36","1","1","","","2500","2500","0","1","2015-10-12","21:04:57","1","0");
INSERT INTO factura_det VALUES("58","8","36","1","1","11","11","2500","2500","0","1","2015-10-12","21:05:03","1","0");
INSERT INTO factura_det VALUES("59","9","37","1","30","","","2500","75000","0","1","2015-10-19","17:56:21","1","0");
INSERT INTO factura_det VALUES("60","10","38","2","2","","","2000000","4000000","0","1","2015-10-19","18:03:39","1","0");
INSERT INTO factura_det VALUES("61","10","39","2","1","","","2000000","2000000","0","1","2015-10-19","18:27:59","1","0");


DROP TABLE IF EXISTS familias_pro;

CREATE TABLE `familias_pro` (
  `fam_cod` int(11) NOT NULL,
  `fam_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`fam_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO familias_pro VALUES("1","PANES","2015-10-07","11:37:08","1","0");
INSERT INTO familias_pro VALUES("2","COMIDAS","2015-10-07","11:37:13","1","0");


DROP TABLE IF EXISTS formas_pago;

CREATE TABLE `formas_pago` (
  `for_cod` int(11) NOT NULL,
  `for_des` varchar(45) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`for_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO formas_pago VALUES("1","CONTADO","2015-02-03","14:58:22","1","0");
INSERT INTO formas_pago VALUES("2","CREDITO","2015-01-31","12:21:40","1","0");


DROP TABLE IF EXISTS inventario_cab;

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

INSERT INTO inventario_cab VALUES("1","X","0","2015-10-05","2015-10-05","23:12:36","1","1");
INSERT INTO inventario_cab VALUES("2","INICIAL","2","2015-10-11","2015-10-11","13:00:08","1","0");


DROP TABLE IF EXISTS inventario_det;

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

INSERT INTO inventario_det VALUES("1","2","1","20","2000","40000","2015-10-11","12:59:48","1","0");


DROP TABLE IF EXISTS inventarios_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventarios_cab_view` AS (select `inventario_cab`.`inv_cod` AS `inv_cod`,`inventario_cab`.`inv_des` AS `inv_des`,`inventario_cab`.`inv_par` AS `inv_par`,(case `inventario_cab`.`inv_par` when 0 then _utf8'PENDIENTE' when 1 then _utf8'CONFIRMADO' when 2 then _utf8'AJUSTADO' end) AS `par_des`,`inventario_cab`.`inv_fec` AS `inv_fec`,`inventario_cab`.`fecha` AS `fecha`,`inventario_cab`.`hora` AS `hora`,`inventario_cab`.`usuario` AS `usuario`,`inventario_cab`.`borrado` AS `borrado`,(select sum((`inventario_det`.`pro_can` * `inventario_det`.`pro_cos`)) AS `total` from `inventario_det` where ((`inventario_det`.`borrado` = _utf8'0') and (`inventario_det`.`inv_cod` = `inventario_cab`.`inv_cod`)) group by `inventario_det`.`inv_cod`) AS `total`,replace(convert(format((select sum((`inventario_det`.`pro_can` * `inventario_det`.`pro_cos`)) AS `total` from `inventario_det` where ((`inventario_det`.`borrado` = _utf8'0') and (`inventario_det`.`inv_cod` = `inventario_cab`.`inv_cod`)) group by `inventario_det`.`inv_cod`),0) using utf8),_utf8',',_utf8'.') AS `total_format` from `inventario_cab`);

INSERT INTO inventarios_cab_view VALUES("1","X","0","PENDIENTE","2015-10-05","2015-10-05","23:12:36","1","1","","");
INSERT INTO inventarios_cab_view VALUES("2","INICIAL","2","AJUSTADO","2015-10-11","2015-10-11","13:00:08","1","0","40000","40.000");


DROP TABLE IF EXISTS inventarios_det_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventarios_det_view` AS (select `inventario_det`.`mde_cod` AS `mde_cod`,`inventario_det`.`inv_cod` AS `inv_cod`,`inventario_det`.`pro_cod` AS `pro_cod`,`inventario_det`.`pro_can` AS `pro_can`,`inventario_det`.`pro_cos` AS `pro_cos`,replace(convert(format(`inventario_det`.`pro_cos`,0) using utf8),_utf8',',_utf8'.') AS `pro_cos_for`,`inventario_det`.`pro_tot` AS `pro_tot`,replace(convert(format(`inventario_det`.`pro_tot`,0) using utf8),_utf8',',_utf8'.') AS `pro_tot_for`,`inventario_det`.`fecha` AS `fecha`,`inventario_det`.`hora` AS `hora`,`inventario_det`.`usuario` AS `usuario`,`inventario_det`.`borrado` AS `borrado`,(select `productos_view`.`pro_bar` AS `pro_bar` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `pro_bar`,(select `productos_view`.`pro_des` AS `pro_des` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `pro_des`,(select `productos_view`.`fam_des` AS `fam_des` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `fam_des` from `inventario_det`);

INSERT INTO inventarios_det_view VALUES("1","2","1","20","2000","2.000","40000","40.000","2015-10-11","12:59:48","1","0","01","PIZZA GRANDE","COMIDAS");


DROP TABLE IF EXISTS marcas;

CREATE TABLE `marcas` (
  `mar_cod` int(11) NOT NULL,
  `mar_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default '0',
  PRIMARY KEY  (`mar_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO marcas VALUES("1","ILOLAY","2015-10-07","11:38:05","1","0");
INSERT INTO marcas VALUES("2","VARIOS","2015-10-07","11:38:12","1","0");


DROP TABLE IF EXISTS medios;

CREATE TABLE `medios` (
  `med_cod` int(11) NOT NULL,
  `med_des` varchar(50) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`med_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO medios VALUES("1","OTROS","2011-08-07","20:17:49","1","0");
INSERT INTO medios VALUES("2","PROPIOS MEDIOS","2011-08-07","20:14:55","1","0");
INSERT INTO medios VALUES("3","MSN","2011-08-07","20:14:58","1","0");
INSERT INTO medios VALUES("4","FACEBOOK","2015-01-31","16:05:39","1","0");


DROP TABLE IF EXISTS medios_pago;

CREATE TABLE `medios_pago` (
  `mpg_cod` int(11) NOT NULL,
  `mpg_des` varchar(45) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mpg_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO medios_pago VALUES("1","EFECTIVO","2015-01-31","13:01:55","1","0");
INSERT INTO medios_pago VALUES("2","CHEQUE","2012-03-12","23:12:42","1","0");
INSERT INTO medios_pago VALUES("3","TARJ. CRED.","2012-03-12","23:12:55","1","0");
INSERT INTO medios_pago VALUES("4","TARJ. DEBITO","2012-03-20","17:20:35","2","0");


DROP TABLE IF EXISTS menu_cab;

CREATE TABLE `menu_cab` (
  `mec_cod` int(11) NOT NULL auto_increment,
  `mec_des` varchar(255) default NULL,
  `mec_ord` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`mec_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO menu_cab VALUES("1","Mantenimiento","1","0");
INSERT INTO menu_cab VALUES("2","Administracion","2","0");
INSERT INTO menu_cab VALUES("3","Finanzas y Tesoreria","3","0");
INSERT INTO menu_cab VALUES("4","Ventas","4","0");
INSERT INTO menu_cab VALUES("5","Compras","5","0");
INSERT INTO menu_cab VALUES("6","Inventarios","6","0");
INSERT INTO menu_cab VALUES("7","Envios al Cliente","7","0");
INSERT INTO menu_cab VALUES("8","Reportes","8","0");
INSERT INTO menu_cab VALUES("9","Seguridad","9","0");


DROP TABLE IF EXISTS menu_det;

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

INSERT INTO menu_det VALUES("1","1","Categorias","./familias/index.php","1","0");
INSERT INTO menu_det VALUES("2","1","Condicion Pago","./formas_pago/index.php","2","0");
INSERT INTO menu_det VALUES("3","1","Medios Pago","./medios_pago/index.php","3","0");
INSERT INTO menu_det VALUES("4","1","Medios Comun.","./medios_comun/index.php","4","0");
INSERT INTO menu_det VALUES("5","1","Mesas","./mesas/index.php","5","0");
INSERT INTO menu_det VALUES("6","1","Tipos Cliente","./tipos_cliente/index.php","6","0");
INSERT INTO menu_det VALUES("7","1","Tipos Cuenta","./tipos_cuenta/index.php","7","0");
INSERT INTO menu_det VALUES("8","1","Tipos Envio","./tipos_envio/index.php","8","0");
INSERT INTO menu_det VALUES("9","1","Tipos Moneda","./tipos_moneda/index.php","9","0");
INSERT INTO menu_det VALUES("10","1","Unidades Medida","./unidades/index.php","10","0");
INSERT INTO menu_det VALUES("11","2","Clientes","./clientes/index.php","1","0");
INSERT INTO menu_det VALUES("12","2","Proveedores","./proveedores/index.php","2","0");
INSERT INTO menu_det VALUES("13","2","Cotizaciones","./cotizaciones/index.php","4","0");
INSERT INTO menu_det VALUES("14","3","Cobros de Fact.","./cobros/index.php","1","0");
INSERT INTO menu_det VALUES("15","4","Apertura Caja","./apertura/index.php","1","0");
INSERT INTO menu_det VALUES("16","4","Facturacion","./facturacion/detalle.php","2","0");
INSERT INTO menu_det VALUES("17","2","Productos","./productos/index.php","3","0");
INSERT INTO menu_det VALUES("18","4","Anular Factura","./anular_factura/index.php","4","0");
INSERT INTO menu_det VALUES("19","4","Cierre Caja","./cerrarcaja/index.php","5","0");
INSERT INTO menu_det VALUES("20","8","Reporte Cierres","./reporte_cierres/index.php","1","0");
INSERT INTO menu_det VALUES("21","8","Reporte Ventas","./reporte_ventas/index.php","2","0");
INSERT INTO menu_det VALUES("22","8","Reporte Stock","./reporte_stock/index.php","3","0");
INSERT INTO menu_det VALUES("23","8","Estado Cuenta Cliente","./reporte_cuentas_clientes/index.php","4","0");
INSERT INTO menu_det VALUES("24","5","Facturas Compra","./compras/index.php","1","0");
INSERT INTO menu_det VALUES("25","8","Estado Cuenta Prov.","./reporte_cuentas_proveedor/index.php","5","0");
INSERT INTO menu_det VALUES("26","3","Pagos a Proveedores","./pagos/index.php","2","0");
INSERT INTO menu_det VALUES("27","2","Produccion","./produccion/index.php","5","0");
INSERT INTO menu_det VALUES("28","2","Baja de Productos","./bajas/index.php","6","0");
INSERT INTO menu_det VALUES("29","3","Bancos y Cuentas","./bancos/index.php","3","0");
INSERT INTO menu_det VALUES("30","3","Movimientos","./movimientos/index.php","4","0");
INSERT INTO menu_det VALUES("31","6","Carga de Datos","./inventarios/index.php","1","0");
INSERT INTO menu_det VALUES("32","6","Ajuste de Stock","./inventarios_ajuste/index.php","2","0");
INSERT INTO menu_det VALUES("33","7","En Proceso","./delivery/index.php","1","0");
INSERT INTO menu_det VALUES("34","7","Confirmacion ","./delivery_conf/index.php","2","0");
INSERT INTO menu_det VALUES("35","9","Perfiles","./perfiles/index.php","2","0");
INSERT INTO menu_det VALUES("36","9","Usuarios","./usuarios/index.php","3","0");
INSERT INTO menu_det VALUES("37","9","Cambio Password","./cambio_pass/index.php","4","0");
INSERT INTO menu_det VALUES("38","1","Marcas","./marcas/index.php","11","0");
INSERT INTO menu_det VALUES("39","4","Control por Mesas","./control_mesas/index.php","3","0");
INSERT INTO menu_det VALUES("40","1","Depositos","./depositos/index.php","12","0");
INSERT INTO menu_det VALUES("41","9","Backup Local","./backup/hacerbak.php","1","0");
INSERT INTO menu_det VALUES("42","9","Sucursales","./sucursales/index.php","0","0");


DROP TABLE IF EXISTS mesas;

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

INSERT INTO mesas VALUES("1","MOSTRADOR","1","39","2015-10-11","12:41:00","1","0");
INSERT INTO mesas VALUES("2","MESA 2","0","0","2015-02-02","23:32:22","1","0");
INSERT INTO mesas VALUES("3","MESA 3","0","0","2015-02-02","23:32:36","1","0");
INSERT INTO mesas VALUES("4","MESA 4","0","0","2015-02-02","23:32:48","1","0");
INSERT INTO mesas VALUES("5","MESA 5","0","0","2015-02-02","23:32:58","1","0");
INSERT INTO mesas VALUES("6","MESA 6","0","0","2015-02-02","23:33:10","1","0");
INSERT INTO mesas VALUES("7","MESA 7","0","0","2015-02-02","23:33:22","1","0");
INSERT INTO mesas VALUES("8","MESA 8","0","0","2015-02-02","23:33:32","1","0");
INSERT INTO mesas VALUES("9","MESA 9","0","0","2015-02-03","10:40:30","1","0");
INSERT INTO mesas VALUES("10","MESA 10","0","0","2015-02-03","10:40:35","1","0");
INSERT INTO mesas VALUES("11","MESA 11","0","0","2015-02-03","10:40:40","1","0");
INSERT INTO mesas VALUES("12","MESA 12","0","0","2015-02-03","10:40:45","1","0");
INSERT INTO mesas VALUES("13","MESA 13","0","0","2015-02-03","10:40:50","1","0");
INSERT INTO mesas VALUES("14","MESA 14","0","0","2015-02-03","10:40:53","1","0");
INSERT INTO mesas VALUES("15","MESA 15","0","0","2015-02-03","10:40:57","1","0");
INSERT INTO mesas VALUES("16","MESA 16","0","0","2015-02-03","10:41:01","1","0");
INSERT INTO mesas VALUES("17","MESA 17","0","0","2015-02-03","10:41:29","1","0");
INSERT INTO mesas VALUES("18","MESA 18","0","0","2015-02-03","10:41:32","1","0");
INSERT INTO mesas VALUES("19","MESA 19","0","0","2015-02-03","10:41:37","1","0");
INSERT INTO mesas VALUES("20","MESA 20","0","0","2015-02-03","10:41:40","1","0");
INSERT INTO mesas VALUES("21","MESA 21","0","0","2015-02-03","10:41:51","1","0");


DROP TABLE IF EXISTS movimientos;

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



DROP TABLE IF EXISTS movimientos_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `movimientos_view` AS (select `movimientos`.`mov_cod` AS `mov_cod`,`movimientos`.`mov_nro` AS `mov_nro`,`movimientos`.`mov_obs` AS `mov_obs`,`movimientos`.`mov_mon` AS `mov_mon`,`movimientos`.`mov_par` AS `mov_par`,`movimientos`.`ban_cod` AS `ban_cod`,`movimientos`.`mov_fec` AS `mov_fec`,`movimientos`.`fecha` AS `fecha`,`movimientos`.`hora` AS `hora`,`movimientos`.`usuario` AS `usuario`,`movimientos`.`borrado` AS `borrado`,(select `bancos_view`.`ban_des` AS `ban_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `ban_des`,(select `bancos_view`.`ban_nro` AS `ban_nro` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `ban_nro`,(select `bancos_view`.`tcu_cod` AS `tcu_cod` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tcu_cod`,(select `bancos_view`.`tcu_des` AS `tcu_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tcu_des`,(select `bancos_view`.`tmo_cod` AS `tmo_cod` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tmo_cod`,(select `bancos_view`.`tmo_des` AS `tmo_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tmo_des`,replace(convert(format(`movimientos`.`mov_mon`,0) using utf8),_utf8',',_utf8'.') AS `monto` from `movimientos`);



DROP TABLE IF EXISTS niveles;

CREATE TABLE `niveles` (
  `niv_cod` int(11) NOT NULL,
  `niv_des` varchar(45) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`niv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO niveles VALUES("1","root","2012-04-07","20:29:38","1","0");
INSERT INTO niveles VALUES("2","administrador","2015-10-08","21:46:32","1","0");
INSERT INTO niveles VALUES("3","caja","2015-10-10","21:38:39","1","0");
INSERT INTO niveles VALUES("4","x","2015-10-15","14:46:35","1","0");
INSERT INTO niveles VALUES("5","yyy","2015-10-15","14:47:14","1","0");


DROP TABLE IF EXISTS pagos;

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



DROP TABLE IF EXISTS parametro;

CREATE TABLE `parametro` (
  `par_cod` int(11) NOT NULL,
  `par_des` varchar(45) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`par_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO parametro VALUES("1","COMPRA-VENTA","0");
INSERT INTO parametro VALUES("2","PRODUCCION","0");
INSERT INTO parametro VALUES("3","MATERIA PRIMA","0");


DROP TABLE IF EXISTS permisos;

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

INSERT INTO permisos VALUES("1","1","1","1","on","on","on","on","on");
INSERT INTO permisos VALUES("2","1","1","2","on","on","on","on","on");
INSERT INTO permisos VALUES("3","1","1","3","on","on","on","on","on");
INSERT INTO permisos VALUES("4","1","1","4","on","on","on","on","on");
INSERT INTO permisos VALUES("5","1","1","5","on","on","on","on","on");
INSERT INTO permisos VALUES("6","1","1","6","on","on","on","on","on");
INSERT INTO permisos VALUES("7","1","1","7","on","on","on","on","on");
INSERT INTO permisos VALUES("8","1","1","8","on","on","on","on","on");
INSERT INTO permisos VALUES("9","1","1","9","on","on","on","on","on");
INSERT INTO permisos VALUES("10","1","1","10","on","on","on","on","on");
INSERT INTO permisos VALUES("11","1","2","11","on","on","on","on","on");
INSERT INTO permisos VALUES("12","1","2","12","on","on","on","on","on");
INSERT INTO permisos VALUES("13","1","2","13","on","on","on","on","on");
INSERT INTO permisos VALUES("14","1","3","14","on","on","on","on","on");
INSERT INTO permisos VALUES("15","1","4","15","on","on","on","on","on");
INSERT INTO permisos VALUES("16","1","2","17","on","on","on","on","on");
INSERT INTO permisos VALUES("17","1","4","16","on","on","on","on","on");
INSERT INTO permisos VALUES("18","1","4","18","on","on","on","on","on");
INSERT INTO permisos VALUES("19","1","4","19","on","on","on","on","on");
INSERT INTO permisos VALUES("20","1","8","20","on","on","on","on","on");
INSERT INTO permisos VALUES("21","1","8","21","on","on","on","on","on");
INSERT INTO permisos VALUES("22","1","8","22","on","on","on","on","on");
INSERT INTO permisos VALUES("23","1","8","23","on","on","on","on","on");
INSERT INTO permisos VALUES("24","1","5","24","on","on","on","on","on");
INSERT INTO permisos VALUES("25","1","8","25","on","on","on","on","on");
INSERT INTO permisos VALUES("26","1","3","26","on","on","on","on","on");
INSERT INTO permisos VALUES("27","1","2","27","on","on","on","on","on");
INSERT INTO permisos VALUES("28","1","2","28","on","on","on","on","on");
INSERT INTO permisos VALUES("29","1","3","29","on","on","on","on","on");
INSERT INTO permisos VALUES("30","1","3","30","on","on","on","on","on");
INSERT INTO permisos VALUES("31","1","6","31","on","on","on","on","on");
INSERT INTO permisos VALUES("32","1","6","32","on","on","on","on","on");
INSERT INTO permisos VALUES("33","1","7","33","on","on","on","on","on");
INSERT INTO permisos VALUES("34","1","7","34","on","on","on","on","on");
INSERT INTO permisos VALUES("35","1","9","35","on","on","on","on","on");
INSERT INTO permisos VALUES("80","1","9","36","on","on","on","on","on");
INSERT INTO permisos VALUES("117","1","1","38","on","on","on","on","on");
INSERT INTO permisos VALUES("118","1","4","39","on","on","on","on","on");
INSERT INTO permisos VALUES("158","1","1","40","on","on","on","on","on");
INSERT INTO permisos VALUES("159","2","1","1","","","","on","");
INSERT INTO permisos VALUES("160","2","1","2","","","","","");
INSERT INTO permisos VALUES("161","2","1","3","","","","on","");
INSERT INTO permisos VALUES("162","2","1","4","","","","","");
INSERT INTO permisos VALUES("163","2","1","5","","","","on","");
INSERT INTO permisos VALUES("164","2","1","6","","","","","");
INSERT INTO permisos VALUES("165","2","1","7","","","","","");
INSERT INTO permisos VALUES("166","2","1","8","","","","","");
INSERT INTO permisos VALUES("167","2","1","9","","","","","");
INSERT INTO permisos VALUES("168","2","1","10","","","","","");
INSERT INTO permisos VALUES("169","2","2","11","on","","","on","");
INSERT INTO permisos VALUES("170","2","2","12","","","","","");
INSERT INTO permisos VALUES("171","2","2","13","","","","","");
INSERT INTO permisos VALUES("172","2","3","14","","","","","");
INSERT INTO permisos VALUES("173","2","4","15","","","","","");
INSERT INTO permisos VALUES("174","2","4","16","","","","","");
INSERT INTO permisos VALUES("175","2","2","17","","","","","");
INSERT INTO permisos VALUES("176","2","4","18","","","","","");
INSERT INTO permisos VALUES("177","2","4","19","","","","","");
INSERT INTO permisos VALUES("178","2","8","20","","","","","");
INSERT INTO permisos VALUES("179","2","8","21","","","","","");
INSERT INTO permisos VALUES("180","2","8","22","","","","","");
INSERT INTO permisos VALUES("181","2","8","23","","","","","");
INSERT INTO permisos VALUES("182","2","5","24","","","","","");
INSERT INTO permisos VALUES("183","2","8","25","","","","","");
INSERT INTO permisos VALUES("184","2","3","26","","","","","");
INSERT INTO permisos VALUES("185","2","2","27","","","","","");
INSERT INTO permisos VALUES("186","2","2","28","","","","","");
INSERT INTO permisos VALUES("187","2","3","29","","","","","");
INSERT INTO permisos VALUES("188","2","3","30","","","","","");
INSERT INTO permisos VALUES("189","2","6","31","","","","","");
INSERT INTO permisos VALUES("190","2","6","32","","","","","");
INSERT INTO permisos VALUES("191","2","7","33","","","","","");
INSERT INTO permisos VALUES("192","2","7","34","","","","","");
INSERT INTO permisos VALUES("193","2","9","35","","","","","");
INSERT INTO permisos VALUES("194","2","9","36","","","","","");
INSERT INTO permisos VALUES("195","2","9","37","","","","on","");
INSERT INTO permisos VALUES("196","2","1","38","","","","","");
INSERT INTO permisos VALUES("197","2","4","39","","","","","");
INSERT INTO permisos VALUES("198","2","1","40","","","","","");
INSERT INTO permisos VALUES("199","1","9","37","on","on","on","on","on");
INSERT INTO permisos VALUES("200","3","1","1","","","","","");
INSERT INTO permisos VALUES("201","3","1","2","","","","","");
INSERT INTO permisos VALUES("202","3","1","3","","","","","");
INSERT INTO permisos VALUES("203","3","1","4","","","","","");
INSERT INTO permisos VALUES("204","3","1","5","","","","","");
INSERT INTO permisos VALUES("205","3","1","6","","","","","");
INSERT INTO permisos VALUES("206","3","1","7","","","","","");
INSERT INTO permisos VALUES("207","3","1","8","","","","","");
INSERT INTO permisos VALUES("208","3","1","9","","","","","");
INSERT INTO permisos VALUES("209","3","1","10","","","","","");
INSERT INTO permisos VALUES("210","3","2","11","","","","","");
INSERT INTO permisos VALUES("211","3","2","12","","","","","");
INSERT INTO permisos VALUES("212","3","2","13","","","","","");
INSERT INTO permisos VALUES("213","3","3","14","","","","","");
INSERT INTO permisos VALUES("214","3","4","15","","","","on","");
INSERT INTO permisos VALUES("215","3","4","16","","","","on","");
INSERT INTO permisos VALUES("216","3","2","17","","","","","");
INSERT INTO permisos VALUES("217","3","4","18","","","","","");
INSERT INTO permisos VALUES("218","3","4","19","","","","on","");
INSERT INTO permisos VALUES("219","3","8","20","","","","on","");
INSERT INTO permisos VALUES("220","3","8","21","","","","","");
INSERT INTO permisos VALUES("221","3","8","22","","","","","");
INSERT INTO permisos VALUES("222","3","8","23","","","","","");
INSERT INTO permisos VALUES("223","3","5","24","","","","","");
INSERT INTO permisos VALUES("224","3","8","25","","","","","");
INSERT INTO permisos VALUES("225","3","3","26","","","","","");
INSERT INTO permisos VALUES("226","3","2","27","","","","","");
INSERT INTO permisos VALUES("227","3","2","28","","","","","");
INSERT INTO permisos VALUES("228","3","3","29","","","","","");
INSERT INTO permisos VALUES("229","3","3","30","","","","","");
INSERT INTO permisos VALUES("230","3","6","31","","","","","");
INSERT INTO permisos VALUES("231","3","6","32","","","","","");
INSERT INTO permisos VALUES("232","3","7","33","","","","","");
INSERT INTO permisos VALUES("233","3","7","34","","","","","");
INSERT INTO permisos VALUES("234","3","9","35","","","","","");
INSERT INTO permisos VALUES("235","3","9","36","","","","","");
INSERT INTO permisos VALUES("236","3","9","37","","","","","");
INSERT INTO permisos VALUES("237","3","1","38","","","","","");
INSERT INTO permisos VALUES("238","3","4","39","","","","on","");
INSERT INTO permisos VALUES("239","3","1","40","","","","","");
INSERT INTO permisos VALUES("240","1","9","41","on","on","on","on","on");
INSERT INTO permisos VALUES("241","4","1","1","0","0","0","0","0");
INSERT INTO permisos VALUES("242","4","1","2","0","0","0","0","0");
INSERT INTO permisos VALUES("243","4","1","3","0","0","0","0","0");
INSERT INTO permisos VALUES("244","4","1","4","0","0","0","0","0");
INSERT INTO permisos VALUES("245","4","1","5","0","0","0","0","0");
INSERT INTO permisos VALUES("246","4","1","6","0","0","0","0","0");
INSERT INTO permisos VALUES("247","4","1","7","0","0","0","0","0");
INSERT INTO permisos VALUES("248","4","1","8","0","0","0","0","0");
INSERT INTO permisos VALUES("249","4","1","9","0","0","0","0","0");
INSERT INTO permisos VALUES("250","4","1","10","0","0","0","0","0");
INSERT INTO permisos VALUES("251","4","2","11","0","0","0","0","0");
INSERT INTO permisos VALUES("252","4","2","12","0","0","0","0","0");
INSERT INTO permisos VALUES("253","4","2","13","0","0","0","0","0");
INSERT INTO permisos VALUES("254","4","3","14","0","0","0","0","0");
INSERT INTO permisos VALUES("255","4","4","15","0","0","0","0","0");
INSERT INTO permisos VALUES("256","4","4","16","0","0","0","0","0");
INSERT INTO permisos VALUES("257","4","2","17","0","0","0","0","0");
INSERT INTO permisos VALUES("258","4","4","18","0","0","0","0","0");
INSERT INTO permisos VALUES("259","4","4","19","0","0","0","0","0");
INSERT INTO permisos VALUES("260","4","8","20","0","0","0","0","0");
INSERT INTO permisos VALUES("261","4","8","21","0","0","0","0","0");
INSERT INTO permisos VALUES("262","4","8","22","0","0","0","0","0");
INSERT INTO permisos VALUES("263","4","8","23","0","0","0","0","0");
INSERT INTO permisos VALUES("264","4","5","24","0","0","0","0","0");
INSERT INTO permisos VALUES("265","4","8","25","0","0","0","0","0");
INSERT INTO permisos VALUES("266","4","3","26","0","0","0","0","0");
INSERT INTO permisos VALUES("267","4","2","27","0","0","0","0","0");
INSERT INTO permisos VALUES("268","4","2","28","0","0","0","0","0");
INSERT INTO permisos VALUES("269","4","3","29","0","0","0","0","0");
INSERT INTO permisos VALUES("270","4","3","30","0","0","0","0","0");
INSERT INTO permisos VALUES("271","4","6","31","0","0","0","0","0");
INSERT INTO permisos VALUES("272","4","6","32","0","0","0","0","0");
INSERT INTO permisos VALUES("273","4","7","33","0","0","0","0","0");
INSERT INTO permisos VALUES("274","4","7","34","0","0","0","0","0");
INSERT INTO permisos VALUES("275","4","9","35","0","0","0","0","0");
INSERT INTO permisos VALUES("276","4","9","36","0","0","0","0","0");
INSERT INTO permisos VALUES("277","4","9","37","0","0","0","0","0");
INSERT INTO permisos VALUES("278","4","1","38","0","0","0","0","0");
INSERT INTO permisos VALUES("279","4","4","39","0","0","0","0","0");
INSERT INTO permisos VALUES("280","4","1","40","0","0","0","0","0");
INSERT INTO permisos VALUES("281","5","1","1","","","","on","");
INSERT INTO permisos VALUES("282","5","1","2","","","","on","");
INSERT INTO permisos VALUES("283","5","1","3","","","","on","");
INSERT INTO permisos VALUES("284","5","1","4","","","","on","");
INSERT INTO permisos VALUES("285","5","1","5","","","","on","");
INSERT INTO permisos VALUES("286","5","1","6","","","","","");
INSERT INTO permisos VALUES("287","5","1","7","","","","on","");
INSERT INTO permisos VALUES("288","5","1","8","","","","on","");
INSERT INTO permisos VALUES("289","5","1","9","","","","on","");
INSERT INTO permisos VALUES("290","5","1","10","","","","on","");
INSERT INTO permisos VALUES("291","5","2","11","","","","on","");
INSERT INTO permisos VALUES("292","5","2","12","","","","on","");
INSERT INTO permisos VALUES("293","5","2","13","","","","","");
INSERT INTO permisos VALUES("294","5","3","14","","","","","");
INSERT INTO permisos VALUES("295","5","4","15","","","","","");
INSERT INTO permisos VALUES("296","5","4","16","","","","","");
INSERT INTO permisos VALUES("297","5","2","17","","","","","");
INSERT INTO permisos VALUES("298","5","4","18","","","","","");
INSERT INTO permisos VALUES("299","5","4","19","","","","","");
INSERT INTO permisos VALUES("300","5","8","20","","","","","");
INSERT INTO permisos VALUES("301","5","8","21","","","","","");
INSERT INTO permisos VALUES("302","5","8","22","","","","","");
INSERT INTO permisos VALUES("303","5","8","23","","","","","");
INSERT INTO permisos VALUES("304","5","5","24","","","","","");
INSERT INTO permisos VALUES("305","5","8","25","","","","on","");
INSERT INTO permisos VALUES("306","5","3","26","","","","","");
INSERT INTO permisos VALUES("307","5","2","27","","","","","");
INSERT INTO permisos VALUES("308","5","2","28","","","","","");
INSERT INTO permisos VALUES("309","5","3","29","","","","","");
INSERT INTO permisos VALUES("310","5","3","30","","","","","");
INSERT INTO permisos VALUES("311","5","6","31","","","","","");
INSERT INTO permisos VALUES("312","5","6","32","","","","on","");
INSERT INTO permisos VALUES("313","5","7","33","","","","","");
INSERT INTO permisos VALUES("314","5","7","34","","","","","");
INSERT INTO permisos VALUES("315","5","9","35","","","","","");
INSERT INTO permisos VALUES("316","5","9","36","","","","","");
INSERT INTO permisos VALUES("317","5","9","37","","","","","");
INSERT INTO permisos VALUES("318","5","1","38","","","","on","");
INSERT INTO permisos VALUES("319","5","4","39","","","","","");
INSERT INTO permisos VALUES("320","5","1","40","","","","on","");
INSERT INTO permisos VALUES("321","5","9","41","","","","on","");
INSERT INTO permisos VALUES("322","1","9","42","on","on","on","on","on");


DROP TABLE IF EXISTS produccion;

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



DROP TABLE IF EXISTS produccion_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produccion_view` AS (select `produccion`.`prd_cod` AS `prd_cod`,`produccion`.`pro_cod` AS `pro_cod`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `pro_des`,(select `productos`.`par_cod` AS `par_cod` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `par_cod`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `fam_cod`,`produccion`.`prd_can` AS `prd_can`,`produccion`.`prd_fec` AS `prd_fec`,`produccion`.`fecha` AS `fecha`,`produccion`.`hora` AS `hora`,`produccion`.`usuario` AS `usuario`,`produccion`.`borrado` AS `borrado` from `produccion`);



DROP TABLE IF EXISTS productos;

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

INSERT INTO productos VALUES("1","01","PIZZA GRANDE","2000","2500","-87","10","1","2","7","1","2015-10-12","00:52:49","1","0");
INSERT INTO productos VALUES("2","C01","COMPRESOR X","1111000","2000000","2","10","1","2","10","2","2015-10-19","18:02:19","1","0");


DROP TABLE IF EXISTS productos_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productos_view` AS (select `productos`.`pro_cod` AS `pro_cod`,`productos`.`pro_bar` AS `pro_bar`,`productos`.`pro_des` AS `pro_des`,`productos`.`pro_cos` AS `pro_cos`,`productos`.`pro_ven` AS `pro_ven`,`productos`.`pro_can` AS `pro_can`,`productos`.`pro_imp` AS `pro_imp`,`productos`.`par_cod` AS `par_cod`,`productos`.`fam_cod` AS `fam_cod`,`productos`.`uni_cod` AS `uni_cod`,`productos`.`mar_cod` AS `mar_cod`,`productos`.`fecha` AS `fecha`,`productos`.`hora` AS `hora`,`productos`.`usuario` AS `usuario`,`productos`.`borrado` AS `borrado`,(select `parametro`.`par_des` AS `par_des` from `parametro` where (`parametro`.`par_cod` = `productos`.`par_cod`)) AS `par_des`,(select `familias_pro`.`fam_des` AS `fam_des` from `familias_pro` where (`familias_pro`.`fam_cod` = `productos`.`fam_cod`)) AS `fam_des`,(select `unidades`.`uni_des` AS `uni_des` from `unidades` where (`unidades`.`uni_cod` = `productos`.`uni_cod`)) AS `uni_des`,(select `marcas`.`mar_des` AS `mar_des` from `marcas` where (`marcas`.`mar_cod` = `productos`.`mar_cod`)) AS `mar_des` from `productos`);

INSERT INTO productos_view VALUES("1","01","PIZZA GRANDE","2000","2500","-87","10","1","2","7","1","2015-10-12","00:52:49","1","0","COMPRA-VENTA","COMIDAS","CAJA DE 10 UNID.","ILOLAY");
INSERT INTO productos_view VALUES("2","C01","COMPRESOR X","1111000","2000000","2","10","1","2","10","2","2015-10-19","18:02:19","1","0","COMPRA-VENTA","COMIDAS","UNIDADES","VARIOS");


DROP TABLE IF EXISTS proveedores;

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

INSERT INTO proveedores VALUES("1","X","--","--","--","--","2015-10-10","21:55:42","1","0");


DROP TABLE IF EXISTS recetas;

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



DROP TABLE IF EXISTS sucursales;

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

INSERT INTO sucursales VALUES("1","CENTRAL","82737776","08/11","2012-03-31","22:04:33","1","0");
INSERT INTO sucursales VALUES("2","FDO DE LA MORA","","","2015-10-19","22:19:12","1","0");


DROP TABLE IF EXISTS tabbackup;

CREATE TABLE `tabbackup` (
  `id` int(6) NOT NULL auto_increment,
  `denominacion` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `archivo` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS tipo_cliente;

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

INSERT INTO tipo_cliente VALUES("1","MAYORISTAS","10","2015-01-31","22:22:19","1","0");
INSERT INTO tipo_cliente VALUES("2","MINORISTAS","5.3","2015-10-08","11:19:21","1","0");
INSERT INTO tipo_cliente VALUES("3","ESTANDAR","0","2015-01-31","22:22:06","1","0");


DROP TABLE IF EXISTS tipo_cuenta;

CREATE TABLE `tipo_cuenta` (
  `tcu_cod` int(11) NOT NULL auto_increment,
  `tcu_des` varchar(20) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`tcu_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_cuenta VALUES("1","CTA.CTE","2015-01-31","16:41:05","1","0");
INSERT INTO tipo_cuenta VALUES("2","CAJ.AHO.","2015-01-31","16:41:02","1","0");


DROP TABLE IF EXISTS tipo_envio;

CREATE TABLE `tipo_envio` (
  `tie_cod` int(11) default NULL,
  `tie_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_envio VALUES("1","EN CAJA","2015-01-31","16:53:35","1","0");
INSERT INTO tipo_envio VALUES("2","DELIVERY","2015-01-31","16:53:32","1","0");
INSERT INTO tipo_envio VALUES("3","ENTREGADO","2015-02-08","23:10:24","1","0");


DROP TABLE IF EXISTS tipo_moneda;

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

INSERT INTO tipo_moneda VALUES("1","GUARANIES","GS.","2015-01-31","17:00:59","1","0");
INSERT INTO tipo_moneda VALUES("2","DOLARES","US$","2015-01-31","17:00:51","1","0");
INSERT INTO tipo_moneda VALUES("3","REAL","RE$","2015-01-31","17:01:05","1","0");
INSERT INTO tipo_moneda VALUES("4","PESO ARG.","P$","2015-01-31","17:01:19","1","0");
INSERT INTO tipo_moneda VALUES("5","LIBRA ","L$","2015-02-03","20:10:13","1","0");


DROP TABLE IF EXISTS tmp;

CREATE TABLE `tmp` (
  `tmp_cod` int(11) NOT NULL auto_increment,
  `numlinea` int(11) NOT NULL,
  `pro_cod` int(11) default NULL,
  `pro_can` double default NULL,
  `nro_fac` int(11) default NULL,
  PRIMARY KEY  (`tmp_cod`,`numlinea`),
  UNIQUE KEY `tmp_cod` (`tmp_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS unidades;

CREATE TABLE `unidades` (
  `uni_cod` int(11) NOT NULL,
  `uni_des` varchar(255) default NULL,
  `fecha` date default NULL,
  `hora` time default NULL,
  `usuario` int(11) default NULL,
  `borrado` int(11) default NULL,
  PRIMARY KEY  (`uni_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO unidades VALUES("1","UNID.","2015-04-06","15:45:11","1","1");
INSERT INTO unidades VALUES("2","LTROS.","2012-03-12","23:17:53","1","1");
INSERT INTO unidades VALUES("3","MTR.","2015-04-06","15:44:48","1","1");
INSERT INTO unidades VALUES("4","BOLSA","2015-04-09","11:58:21","1","1");
INSERT INTO unidades VALUES("5","UNIDADES","2015-04-09","11:58:30","1","1");
INSERT INTO unidades VALUES("6","PAQUETE","2015-04-06","15:45:07","1","1");
INSERT INTO unidades VALUES("7","CAJA DE 10 UNID.","2015-04-09","11:59:06","1","0");
INSERT INTO unidades VALUES("8","CAJA DE 20 UNID.","2015-04-09","11:59:14","1","0");
INSERT INTO unidades VALUES("9","FRASCOS DE 5 ML.","2015-04-09","11:59:30","1","0");
INSERT INTO unidades VALUES("10","UNIDADES","2015-04-09","11:59:45","1","0");
INSERT INTO unidades VALUES("11","ML.","2015-04-09","11:59:53","1","0");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `usuario` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `password_nor` varchar(45) default NULL,
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

INSERT INTO usuarios VALUES("1","admin","827ccb0eea8a706c4c34a16891f84e7b","12345","1","1","2015-10-10","20:39:56","1","0");
INSERT INTO usuarios VALUES("2","cajero","827ccb0eea8a706c4c34a16891f84e7b","12345","3","1","2015-10-10","22:12:06","1","1");


