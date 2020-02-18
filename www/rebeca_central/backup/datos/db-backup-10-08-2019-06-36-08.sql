DROP TABLE IF EXISTS aper_cie;

CREATE TABLE `aper_cie` (
  `ape_cod` int(11) NOT NULL,
  `ape_dot` double NOT NULL,
  `ape_efe` double DEFAULT NULL,
  `ape_cie` double DEFAULT NULL,
  `ape_par` double DEFAULT NULL,
  `ape_dif` double DEFAULT NULL,
  `aps_cod` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`ape_cod`),
  KEY `FK_aper_cie` (`aps_cod`),
  CONSTRAINT `FK_aper_cie` FOREIGN KEY (`aps_cod`) REFERENCES `aper_sis` (`aps_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO aper_cie VALUES("1","100000","","","0","","1","2019-10-08","05:36:43","1","0");


DROP TABLE IF EXISTS aper_cie_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aper_cie_view` AS (select `aper_cie`.`ape_cod` AS `ape_cod`,replace(format(`aper_cie`.`ape_dot`,0),',','.') AS `ape_dot`,replace(format(`aper_cie`.`ape_efe`,0),',','.') AS `ape_efe`,replace(format(`aper_cie`.`ape_cie`,0),',','.') AS `ape_cie`,(case when (`aper_cie`.`ape_par` = 0) then _utf8'Abierto' when (`aper_cie`.`ape_par` = 1) then _utf8'Cerrado' end) AS `ape_est`,replace(format(`aper_cie`.`ape_dif`,0),',','.') AS `ape_dif`,`aper_cie`.`aps_cod` AS `aps_cod`,`aper_cie`.`fecha` AS `fecha`,`aper_cie`.`hora` AS `hora`,`aper_cie`.`usuario` AS `usuario`,`aper_cie`.`borrado` AS `borrado` from `aper_cie`);

INSERT INTO aper_cie_view VALUES("1","100.000","","","Abierto","","1","2019-10-08","05:36:43","1","0");


DROP TABLE IF EXISTS aper_sis;

CREATE TABLE `aper_sis` (
  `aps_cod` int(11) NOT NULL,
  `aps_efe` double DEFAULT NULL,
  `aps_cie` double DEFAULT NULL,
  `aps_dif` double DEFAULT NULL,
  `aps_par` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`aps_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO aper_sis VALUES("1","0","0","0","0","2012-09-19","21:50:58","4","1");


DROP TABLE IF EXISTS auditoria;

CREATE TABLE `auditoria` (
  `aud_cod` int(11) NOT NULL AUTO_INCREMENT,
  `aud_ip` varchar(15) DEFAULT NULL,
  `usu_cod` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`aud_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO auditoria VALUES("1","181.122.5.222","admin","2019-10-08","05:33:33");
INSERT INTO auditoria VALUES("2","181.122.5.222","admin","2019-10-08","05:36:16");
INSERT INTO auditoria VALUES("3","181.122.5.222","admin","2019-10-08","05:58:05");
INSERT INTO auditoria VALUES("4","181.122.5.222","admin","2019-10-08","05:58:30");
INSERT INTO auditoria VALUES("5","181.122.5.222","admin","2019-10-08","06:00:44");
INSERT INTO auditoria VALUES("6","181.122.5.222","admin","2019-10-08","06:01:05");
INSERT INTO auditoria VALUES("7","181.122.5.222","admin","2019-10-08","06:02:14");
INSERT INTO auditoria VALUES("8","181.122.5.222","admin","2019-10-08","06:04:04");
INSERT INTO auditoria VALUES("9","181.122.5.222","admin","2019-10-08","06:10:02");
INSERT INTO auditoria VALUES("10","181.122.5.222","admin","2019-10-08","06:15:54");
INSERT INTO auditoria VALUES("11","181.122.5.222","admin","2019-10-08","06:18:22");
INSERT INTO auditoria VALUES("12","181.122.5.222","admin","2019-10-08","06:23:11");
INSERT INTO auditoria VALUES("13","181.122.5.222","admin","2019-10-08","06:23:37");
INSERT INTO auditoria VALUES("14","181.122.5.222","admin","2019-10-08","06:27:06");
INSERT INTO auditoria VALUES("15","181.122.5.222","admin","2019-10-08","06:29:52");
INSERT INTO auditoria VALUES("16","181.122.5.222","admin","2019-10-08","06:31:57");


DROP TABLE IF EXISTS bajas;

CREATE TABLE `bajas` (
  `prd_cod` int(11) NOT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `prd_can` double DEFAULT NULL,
  `prd_fec` date DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`prd_cod`),
  KEY `FK_produccion_pro_cod` (`pro_cod`),
  CONSTRAINT `FK_bajas` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS bajas_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bajas_view` AS (select `bajas`.`prd_cod` AS `prd_cod`,`bajas`.`pro_cod` AS `pro_cod`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `pro_des`,(select `productos`.`par_cod` AS `par_cod` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `par_cod`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `fam_cod`,`bajas`.`prd_can` AS `prd_can`,`bajas`.`prd_fec` AS `prd_fec`,`bajas`.`fecha` AS `fecha`,`bajas`.`hora` AS `hora`,`bajas`.`usuario` AS `usuario`,`bajas`.`borrado` AS `borrado` from `bajas`);



DROP TABLE IF EXISTS bancos;

CREATE TABLE `bancos` (
  `ban_cod` int(11) NOT NULL,
  `ban_des` varchar(255) DEFAULT NULL,
  `ban_nro` varchar(20) DEFAULT NULL,
  `tcu_cod` int(11) DEFAULT NULL,
  `tmo_cod` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`ban_cod`),
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
  `ape_cod` int(11) DEFAULT NULL,
  `caj_des` varchar(255) DEFAULT NULL,
  `caj_ing` double DEFAULT NULL,
  `caj_sal` double DEFAULT NULL,
  `caj_par` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`caj_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO caja_diaria VALUES("1","1","PRUEBA","0","10000","1","2019-10-08","06:13:24","1","0");


DROP TABLE IF EXISTS clientes;

CREATE TABLE `clientes` (
  `cli_cod` int(11) NOT NULL,
  `cli_des` varchar(255) DEFAULT NULL,
  `cli_ruc` varchar(20) DEFAULT NULL,
  `cli_dir` varchar(255) DEFAULT NULL,
  `cli_tel` varchar(255) DEFAULT NULL,
  `cli_mai` varchar(255) DEFAULT NULL,
  `med_cod` int(11) DEFAULT NULL,
  `tic_cod` int(11) DEFAULT NULL,
  `cli_par` int(1) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`cli_cod`),
  KEY `cli_des` (`cli_des`),
  KEY `FK_clientes_tic_cod` (`tic_cod`),
  KEY `FK_clientes_med_cod` (`med_cod`),
  CONSTRAINT `FK_clientes_med_cod` FOREIGN KEY (`med_cod`) REFERENCES `medios` (`med_cod`),
  CONSTRAINT `FK_clientes_tic_cod` FOREIGN KEY (`tic_cod`) REFERENCES `tipo_cliente` (`tic_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO clientes VALUES("1","CLIENTE OCASIONAL","--","--","--","--","1","3","1","2019-10-08","05:41:52","1","0");


DROP TABLE IF EXISTS clientes_det;

CREATE TABLE `clientes_det` (
  `cld_cod` int(11) NOT NULL AUTO_INCREMENT,
  `cli_cod` int(11) DEFAULT NULL,
  `cld_ced` varchar(255) NOT NULL,
  `cld_nom` varchar(100) NOT NULL,
  `cld_tel` varchar(100) DEFAULT NULL,
  `cld_ema` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(1) DEFAULT '0',
  PRIMARY KEY (`cld_cod`),
  KEY `FK_clientes_det` (`cli_cod`),
  CONSTRAINT `FK_clientes_det` FOREIGN KEY (`cli_cod`) REFERENCES `clientes` (`cli_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO clientes_det VALUES("3","1","--","CLIENTE OCASIONAL","--","--","2019-10-08","05:41:52","1","0");


DROP TABLE IF EXISTS clientes_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clientes_view` AS (select `clientes`.`cli_cod` AS `cli_cod`,`clientes`.`cli_des` AS `cli_des`,`clientes`.`cli_ruc` AS `cli_ruc`,`clientes`.`cli_dir` AS `cli_dir`,`clientes`.`cli_tel` AS `cli_tel`,`clientes`.`cli_mai` AS `cli_mai`,`clientes`.`med_cod` AS `med_cod`,`clientes`.`tic_cod` AS `tic_cod`,`clientes`.`cli_par` AS `cli_par`,`clientes`.`fecha` AS `fecha`,`clientes`.`hora` AS `hora`,`clientes`.`usuario` AS `usuario`,`clientes`.`borrado` AS `borrado`,(select `tipo_cliente`.`tic_des` AS `tic_des` from `tipo_cliente` where (`tipo_cliente`.`tic_cod` = `clientes`.`tic_cod`)) AS `tic_des`,(select `tipo_cliente`.`tic_por` AS `tic_por` from `tipo_cliente` where (`tipo_cliente`.`tic_cod` = `clientes`.`tic_cod`)) AS `tic_por`,(select `medios`.`med_des` AS `med_des` from `medios` where (`medios`.`med_cod` = `clientes`.`med_cod`)) AS `med_des` from `clientes`);

INSERT INTO clientes_view VALUES("1","CLIENTE OCASIONAL","--","--","--","--","1","3","1","2019-10-08","05:41:52","1","0","ESTANDAR","0","PROPIO");


DROP TABLE IF EXISTS cobros;

CREATE TABLE `cobros` (
  `cob_cod` int(11) NOT NULL AUTO_INCREMENT,
  `fac_cod` int(11) DEFAULT NULL,
  `cli_cod` int(11) DEFAULT NULL,
  `cob_mon` double DEFAULT NULL,
  `cob_sal` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`cob_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS compra_cab;

CREATE TABLE `compra_cab` (
  `fac_cod` int(11) NOT NULL,
  `fac_num` varchar(20) DEFAULT NULL,
  `ape_cod` int(11) DEFAULT NULL,
  `prv_cod` int(11) DEFAULT NULL,
  `mpg_cod` int(11) DEFAULT NULL,
  `for_cod` int(11) DEFAULT NULL,
  `tmo_cod` int(11) DEFAULT NULL,
  `cot_cod` int(11) DEFAULT NULL,
  `cot_mon` varchar(50) DEFAULT NULL,
  `tie_cod` int(11) DEFAULT NULL,
  `fac_imp` double DEFAULT NULL,
  `fac_tot` double DEFAULT NULL,
  `aps_cod` int(11) DEFAULT NULL,
  `mes_cod` int(11) DEFAULT NULL,
  `fac_est` int(11) DEFAULT '0',
  `fac_sal` double DEFAULT NULL,
  `fac_des` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`fac_cod`),
  KEY `FK_factura_cab_cliente` (`prv_cod`),
  KEY `FK_factura_cab_mesas` (`mes_cod`),
  KEY `FK_factura_cab_ape_cod` (`ape_cod`),
  KEY `FK_factura_cab_aps_cod` (`aps_cod`),
  CONSTRAINT `FK_compra_cab` FOREIGN KEY (`prv_cod`) REFERENCES `proveedores` (`prv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS compra_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compra_cab_view` AS (select `compra_cab`.`fac_cod` AS `fac_cod`,`compra_cab`.`fac_num` AS `fac_num`,`compra_cab`.`ape_cod` AS `ape_cod`,`compra_cab`.`prv_cod` AS `prv_cod`,(select `proveedores`.`prv_des` AS `prv_des` from `proveedores` where (`proveedores`.`prv_cod` = `compra_cab`.`prv_cod`)) AS `prv_des`,(select `proveedores`.`prv_ruc` AS `prv_ruc` from `proveedores` where (`proveedores`.`prv_cod` = `compra_cab`.`prv_cod`)) AS `prv_ruc`,`compra_cab`.`mpg_cod` AS `mpg_cod`,(select `medios_pago`.`mpg_des` AS `mpg_des` from `medios_pago` where (`medios_pago`.`mpg_cod` = `compra_cab`.`mpg_cod`)) AS `mpg_des`,`compra_cab`.`for_cod` AS `for_cod`,(select `formas_pago`.`for_des` AS `for_des` from `formas_pago` where (`formas_pago`.`for_cod` = `compra_cab`.`for_cod`)) AS `for_des`,`compra_cab`.`tmo_cod` AS `tmo_cod`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `compra_cab`.`tmo_cod`)) AS `tmo_des`,`compra_cab`.`cot_cod` AS `cot_cod`,`compra_cab`.`cot_mon` AS `cot_mon`,`compra_cab`.`tie_cod` AS `tie_cod`,(select `tipo_envio`.`tie_des` AS `tie_des` from `tipo_envio` where (`tipo_envio`.`tie_cod` = `compra_cab`.`tie_cod`)) AS `tie_des`,`compra_cab`.`fac_imp` AS `fac_imp`,replace(format(`compra_cab`.`fac_tot`,0),',','.') AS `fac_tot_1`,replace(format(`compra_cab`.`fac_imp`,0),',','.') AS `fac_imp_1`,replace(format(`compra_cab`.`fac_sal`,0),',','.') AS `fac_sal_1`,`compra_cab`.`fac_tot` AS `fac_tot`,`compra_cab`.`aps_cod` AS `aps_cod`,format(`compra_cab`.`cot_mon`,0) AS `cot_mon_1`,`compra_cab`.`mes_cod` AS `mes_cod`,(select `mesas`.`mes_des` AS `mes_des` from `mesas` where (`mesas`.`mes_cod` = `compra_cab`.`mes_cod`)) AS `mes_des`,`compra_cab`.`fac_est` AS `fac_est`,(case when (`compra_cab`.`fac_est` = 0) then _utf8'Pendiente' else _utf8'Cerrado' end) AS `estado`,`compra_cab`.`fac_sal` AS `fac_sal`,`compra_cab`.`fecha` AS `fecha`,`compra_cab`.`hora` AS `hora`,`compra_cab`.`usuario` AS `usuario`,`compra_cab`.`borrado` AS `borrado` from `compra_cab`);



DROP TABLE IF EXISTS compra_det;

CREATE TABLE `compra_det` (
  `mde_cod` int(11) NOT NULL AUTO_INCREMENT,
  `ape_cod` int(11) DEFAULT NULL,
  `fac_cod` int(11) DEFAULT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `pro_can` double DEFAULT NULL,
  `pro_ven` double DEFAULT NULL,
  `pro_tot` double DEFAULT NULL,
  `mde_par` int(11) DEFAULT '0',
  `aps_cod` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mde_cod`),
  KEY `FK_factura_det_fac_cod` (`fac_cod`),
  KEY `FK_factura_det` (`pro_cod`),
  CONSTRAINT `FK_compra_det` FOREIGN KEY (`fac_cod`) REFERENCES `compra_cab` (`fac_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS compra_det_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `compra_det_view` AS (select `compra_det`.`mde_cod` AS `mde_cod`,`compra_det`.`ape_cod` AS `ape_cod`,`compra_det`.`fac_cod` AS `fac_cod`,`compra_det`.`pro_cod` AS `pro_cod`,`compra_det`.`pro_can` AS `pro_can`,`compra_det`.`pro_ven` AS `pro_ven`,`compra_det`.`pro_tot` AS `pro_tot`,`compra_det`.`mde_par` AS `mde_par`,`compra_det`.`aps_cod` AS `aps_cod`,`compra_det`.`fecha` AS `fecha`,`compra_det`.`hora` AS `hora`,`compra_det`.`usuario` AS `usuario`,`compra_det`.`borrado` AS `borrado`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `compra_det`.`pro_cod`)) AS `pro_des`,(select `productos`.`pro_imp` AS `pro_imp` from `productos` where (`productos`.`pro_cod` = `compra_det`.`pro_cod`)) AS `iva`,(case (select `productos`.`pro_imp` AS `pro_imp` from `productos` where (`productos`.`pro_cod` = `compra_det`.`pro_cod`)) when 10 then round((`compra_det`.`pro_tot` / 11),0) when 0 then _utf8'0' when 5 then round((`compra_det`.`pro_tot` / 21),0) end) AS `impuesto` from `compra_det` where (`compra_det`.`borrado` = _utf8'0'));



DROP TABLE IF EXISTS cotizaciones;

CREATE TABLE `cotizaciones` (
  `cot_cod` int(11) NOT NULL,
  `tmo_cod` int(11) DEFAULT NULL,
  `cot_com` double DEFAULT NULL,
  `cot_ven` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`cot_cod`),
  KEY `fk_cotizaciones_tipo_moneda1` (`tmo_cod`),
  CONSTRAINT `FK_cotizaciones_tmo_cod` FOREIGN KEY (`tmo_cod`) REFERENCES `tipo_moneda` (`tmo_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS cotizaciones_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cotizaciones_view` AS (select `cotizaciones`.`cot_cod` AS `cot_cod`,`cotizaciones`.`tmo_cod` AS `tmo_cod`,`cotizaciones`.`cot_com` AS `cot_com`,`cotizaciones`.`cot_ven` AS `cot_ven`,`cotizaciones`.`fecha` AS `fecha`,`cotizaciones`.`hora` AS `hora`,`cotizaciones`.`usuario` AS `usuario`,`cotizaciones`.`borrado` AS `borrado`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `cotizaciones`.`tmo_cod`)) AS `tmo_des` from `cotizaciones`);



DROP TABLE IF EXISTS datos_empresa;

CREATE TABLE `datos_empresa` (
  `dat_cod` int(11) NOT NULL,
  `dat_des` varchar(255) NOT NULL,
  `dat_dir` varchar(255) NOT NULL,
  `dat_tel` varchar(100) NOT NULL,
  `dat_ema` varchar(100) NOT NULL,
  `dat_ruc` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `usuario` int(11) NOT NULL,
  `borrado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dat_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS depositos;

CREATE TABLE `depositos` (
  `dep_cod` int(11) NOT NULL,
  `dep_des` varchar(255) DEFAULT NULL,
  `suc_cod` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`dep_cod`),
  KEY `FK_depositos` (`suc_cod`),
  CONSTRAINT `FK_depositos` FOREIGN KEY (`suc_cod`) REFERENCES `sucursales` (`suc_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS depositos_pro;

CREATE TABLE `depositos_pro` (
  `dpr_cod` int(11) NOT NULL AUTO_INCREMENT,
  `dep_cod` int(11) DEFAULT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `dpr_can` double DEFAULT NULL,
  `dpr_can_aux` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(1) DEFAULT '0',
  PRIMARY KEY (`dpr_cod`),
  KEY `FK_depositos_pro` (`dep_cod`),
  KEY `FK_depositos_pro_productos` (`pro_cod`),
  CONSTRAINT `FK_depositos_pro` FOREIGN KEY (`dep_cod`) REFERENCES `depositos` (`dep_cod`),
  CONSTRAINT `FK_depositos_pro_productos` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS factura_cab;

CREATE TABLE `factura_cab` (
  `fac_cod` int(11) NOT NULL,
  `fac_num` varchar(20) DEFAULT '0',
  `ape_cod` int(11) DEFAULT NULL,
  `cli_cod` int(11) DEFAULT NULL,
  `cld_cod` int(11) DEFAULT NULL,
  `mpg_cod` int(11) DEFAULT NULL,
  `for_cod` int(11) DEFAULT NULL,
  `tmo_cod` int(11) DEFAULT NULL,
  `cot_cod` int(11) DEFAULT NULL,
  `cot_mon` varchar(50) DEFAULT NULL,
  `tie_cod` int(11) DEFAULT NULL,
  `fac_imp` double DEFAULT NULL,
  `fac_tot` double DEFAULT NULL,
  `aps_cod` int(11) DEFAULT NULL,
  `mes_cod` int(11) DEFAULT NULL,
  `fac_est` int(11) DEFAULT '0',
  `fac_sal` double DEFAULT NULL,
  `fac_rec` varchar(200) DEFAULT NULL,
  `fac_uti` double DEFAULT NULL,
  `fac_ent` int(1) DEFAULT '0',
  `fac_fac` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`fac_cod`),
  KEY `FK_factura_cab_cliente` (`cli_cod`),
  KEY `FK_factura_cab_mesas` (`mes_cod`),
  KEY `FK_factura_cab_ape_cod` (`ape_cod`),
  KEY `FK_factura_cab_aps_cod` (`aps_cod`),
  KEY `FK_factura_cab_cld_cod` (`cld_cod`),
  CONSTRAINT `FK_factura_cab_ape_cod` FOREIGN KEY (`ape_cod`) REFERENCES `aper_cie` (`ape_cod`),
  CONSTRAINT `FK_factura_cab_aps_cod` FOREIGN KEY (`aps_cod`) REFERENCES `aper_sis` (`aps_cod`),
  CONSTRAINT `FK_factura_cab_cld_cod` FOREIGN KEY (`cld_cod`) REFERENCES `clientes_det` (`cld_cod`),
  CONSTRAINT `FK_factura_cab_cliente` FOREIGN KEY (`cli_cod`) REFERENCES `clientes` (`cli_cod`),
  CONSTRAINT `FK_factura_cab_mesas` FOREIGN KEY (`mes_cod`) REFERENCES `mesas` (`mes_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO factura_cab VALUES("1","000-000-0000003","1","1","","1","1","1","1","2000","1","0","2000","1","1","1","0","","1000","0","","2019-10-08","06:02:22","1","0");
INSERT INTO factura_cab VALUES("2","0","1","1","","1","1","1","1","4000","1","0","4000","1","2","1","0","","2000","0","","2019-10-08","06:01:39","1","0");
INSERT INTO factura_cab VALUES("3","0","1","1","","1","1","1","1","2000","1","0","2000","1","1","1","0","","1000","0","","2019-10-08","06:13:41","1","0");


DROP TABLE IF EXISTS factura_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `factura_cab_view` AS (select `factura_cab`.`fac_cod` AS `fac_cod`,`factura_cab`.`fac_num` AS `fac_num`,`factura_cab`.`ape_cod` AS `ape_cod`,`factura_cab`.`cli_cod` AS `cli_cod`,`factura_cab`.`cld_cod` AS `cld_cod`,`factura_cab`.`mpg_cod` AS `mpg_cod`,`factura_cab`.`for_cod` AS `for_cod`,`factura_cab`.`tmo_cod` AS `tmo_cod`,`factura_cab`.`cot_cod` AS `cot_cod`,`factura_cab`.`cot_mon` AS `cot_mon`,`factura_cab`.`tie_cod` AS `tie_cod`,`factura_cab`.`fac_imp` AS `fac_imp`,`factura_cab`.`fac_tot` AS `fac_tot`,`factura_cab`.`aps_cod` AS `aps_cod`,`factura_cab`.`mes_cod` AS `mes_cod`,`factura_cab`.`fac_est` AS `fac_est`,`factura_cab`.`fac_sal` AS `fac_sal`,`factura_cab`.`fac_rec` AS `fac_rec`,`factura_cab`.`fac_ent` AS `fac_ent`,`factura_cab`.`fecha` AS `fecha`,`factura_cab`.`hora` AS `hora`,`factura_cab`.`usuario` AS `usuario`,`factura_cab`.`borrado` AS `borrado`,`factura_cab`.`fac_uti` AS `fac_uti`,`clientes`.`cli_des` AS `cli_des`,`medios_pago`.`mpg_des` AS `mpg_des`,`formas_pago`.`for_des` AS `for_des`,`tipo_moneda`.`tmo_des` AS `tmo_des`,`tipo_envio`.`tie_des` AS `tie_des`,`mesas`.`mes_des` AS `mes_des`,`usuarios`.`usuario` AS `usu_des`,replace(format(`factura_cab`.`fac_tot`,0),',','.') AS `fac_tot_1`,replace(format(`factura_cab`.`cot_mon`,0),',','.') AS `cot_mon_1`,replace(format(`factura_cab`.`fac_uti`,0),',','.') AS `fac_uti_1`,(case `factura_cab`.`fac_est` when 0 then 'Pendiente' when 1 then 'Confirmado' end) AS `estado`,(case `factura_cab`.`fac_ent` when 0 then 'Pendiente' when 1 then 'Confirmado' end) AS `entrega` from (((((((`factura_cab` join `clientes` on((`factura_cab`.`cli_cod` = `clientes`.`cli_cod`))) join `medios_pago` on((`factura_cab`.`mpg_cod` = `medios_pago`.`mpg_cod`))) join `formas_pago` on((`factura_cab`.`for_cod` = `formas_pago`.`for_cod`))) join `tipo_moneda` on((`factura_cab`.`tmo_cod` = `tipo_moneda`.`tmo_cod`))) join `tipo_envio` on((`factura_cab`.`tie_cod` = `tipo_envio`.`tie_cod`))) join `mesas` on((`factura_cab`.`mes_cod` = `mesas`.`mes_cod`))) join `usuarios` on((`factura_cab`.`usuario` = `usuarios`.`id`))));

INSERT INTO factura_cab_view VALUES("1","000-000-0000003","1","1","","1","1","1","1","2000","1","0","2000","1","1","1","0","","0","2019-10-08","06:02:22","1","0","1000","CLIENTE OCASIONAL","EFECTIVO","CONTADO","GUARANIES","EN CAJA","CAJA 1","admin","2.000","2.000","1.000","Confirmado","Pendiente");
INSERT INTO factura_cab_view VALUES("2","0","1","1","","1","1","1","1","4000","1","0","4000","1","2","1","0","","0","2019-10-08","06:01:39","1","0","2000","CLIENTE OCASIONAL","EFECTIVO","CONTADO","GUARANIES","EN CAJA","CAJA 2","admin","4.000","4.000","2.000","Confirmado","Pendiente");
INSERT INTO factura_cab_view VALUES("3","0","1","1","","1","1","1","1","2000","1","0","2000","1","1","1","0","","0","2019-10-08","06:13:41","1","0","1000","CLIENTE OCASIONAL","EFECTIVO","CONTADO","GUARANIES","EN CAJA","CAJA 1","admin","2.000","2.000","1.000","Confirmado","Pendiente");


DROP TABLE IF EXISTS factura_cab_view_2;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `factura_cab_view_2` AS (select `factura_cab`.`fac_cod` AS `fac_cod`,`factura_cab`.`fac_num` AS `fac_num`,`factura_cab`.`ape_cod` AS `ape_cod`,`factura_cab`.`cli_cod` AS `cli_cod`,`factura_cab`.`cld_cod` AS `cld_cod`,`factura_cab`.`mpg_cod` AS `mpg_cod`,`factura_cab`.`for_cod` AS `for_cod`,`factura_cab`.`tmo_cod` AS `tmo_cod`,`factura_cab`.`cot_cod` AS `cot_cod`,`factura_cab`.`cot_mon` AS `cot_mon`,`factura_cab`.`tie_cod` AS `tie_cod`,`factura_cab`.`fac_imp` AS `fac_imp`,`factura_cab`.`fac_tot` AS `fac_tot`,`factura_cab`.`aps_cod` AS `aps_cod`,`factura_cab`.`mes_cod` AS `mes_cod`,`factura_cab`.`fac_est` AS `fac_est`,`factura_cab`.`fac_sal` AS `fac_sal`,`factura_cab`.`fac_rec` AS `fac_rec`,`factura_cab`.`fac_ent` AS `fac_ent`,`factura_cab`.`fecha` AS `fecha`,`factura_cab`.`hora` AS `hora`,`factura_cab`.`usuario` AS `usuario`,`factura_cab`.`borrado` AS `borrado`,`factura_cab`.`fac_uti` AS `fac_uti`,`clientes`.`cli_des` AS `cli_des`,`medios_pago`.`mpg_des` AS `mpg_des`,`formas_pago`.`for_des` AS `for_des`,`tipo_moneda`.`tmo_des` AS `tmo_des`,`tipo_envio`.`tie_des` AS `tie_des`,`mesas`.`mes_des` AS `mes_des`,`usuarios`.`usuario` AS `usu_des`,replace(format(`factura_cab`.`fac_tot`,0),',','.') AS `fac_tot_1`,replace(format(`factura_cab`.`cot_mon`,0),',','.') AS `cot_mon_1`,replace(format(`factura_cab`.`fac_uti`,0),',','.') AS `fac_uti_1`,(case `factura_cab`.`fac_est` when 0 then 'Pendiente' when 1 then 'Confirmado' end) AS `estado`,(case `factura_cab`.`fac_ent` when 0 then 'Pendiente' when 1 then 'Confirmado' end) AS `entrega` from (((((((`factura_cab` join `clientes` on((`factura_cab`.`cli_cod` = `clientes`.`cli_cod`))) join `medios_pago` on((`factura_cab`.`mpg_cod` = `medios_pago`.`mpg_cod`))) join `formas_pago` on((`factura_cab`.`for_cod` = `formas_pago`.`for_cod`))) join `tipo_moneda` on((`factura_cab`.`tmo_cod` = `tipo_moneda`.`tmo_cod`))) join `tipo_envio` on((`factura_cab`.`tie_cod` = `tipo_envio`.`tie_cod`))) join `mesas` on((`factura_cab`.`mes_cod` = `mesas`.`mes_cod`))) join `usuarios` on((`factura_cab`.`usuario` = `usuarios`.`id`))) where (`factura_cab`.`mes_cod` <> '4'));

INSERT INTO factura_cab_view_2 VALUES("1","000-000-0000003","1","1","","1","1","1","1","2000","1","0","2000","1","1","1","0","","0","2019-10-08","06:02:22","1","0","1000","CLIENTE OCASIONAL","EFECTIVO","CONTADO","GUARANIES","EN CAJA","CAJA 1","admin","2.000","2.000","1.000","Confirmado","Pendiente");
INSERT INTO factura_cab_view_2 VALUES("2","0","1","1","","1","1","1","1","4000","1","0","4000","1","2","1","0","","0","2019-10-08","06:01:39","1","0","2000","CLIENTE OCASIONAL","EFECTIVO","CONTADO","GUARANIES","EN CAJA","CAJA 2","admin","4.000","4.000","2.000","Confirmado","Pendiente");
INSERT INTO factura_cab_view_2 VALUES("3","0","1","1","","1","1","1","1","2000","1","0","2000","1","1","1","0","","0","2019-10-08","06:13:41","1","0","1000","CLIENTE OCASIONAL","EFECTIVO","CONTADO","GUARANIES","EN CAJA","CAJA 1","admin","2.000","2.000","1.000","Confirmado","Pendiente");


DROP TABLE IF EXISTS factura_det;

CREATE TABLE `factura_det` (
  `mde_cod` int(11) NOT NULL AUTO_INCREMENT,
  `ape_cod` int(11) DEFAULT NULL,
  `fac_cod` int(11) DEFAULT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `pro_can` double DEFAULT NULL,
  `pro_gus1` int(11) DEFAULT NULL,
  `pro_gus2` int(11) DEFAULT NULL,
  `pro_com` double DEFAULT NULL,
  `pro_ven` double DEFAULT NULL,
  `pro_tot` double DEFAULT NULL,
  `pro_uti` double DEFAULT NULL,
  `mde_par` int(11) DEFAULT '0',
  `aps_cod` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mde_cod`),
  KEY `FK_factura_det_fac_cod` (`fac_cod`),
  KEY `FK_factura_det` (`pro_cod`),
  CONSTRAINT `FK_factura_det` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`),
  CONSTRAINT `FK_factura_det_fac_cod` FOREIGN KEY (`fac_cod`) REFERENCES `factura_cab` (`fac_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO factura_det VALUES("2","1","1","1","1","","","1000","2000","2000","1000","0","1","2019-10-08","06:00:56","1","0");
INSERT INTO factura_det VALUES("3","1","2","1","1","","","1000","2000","2000","1000","0","1","2019-10-08","06:01:15","1","0");
INSERT INTO factura_det VALUES("4","1","2","1","1","","","1000","2000","2000","1000","0","1","2019-10-08","06:01:23","1","0");
INSERT INTO factura_det VALUES("5","1","3","1","1","","","1000","2000","2000","1000","0","1","2019-10-08","06:13:36","1","0");


DROP TABLE IF EXISTS factura_imp;

CREATE TABLE `factura_imp` (
  `fim_cod` int(11) NOT NULL AUTO_INCREMENT,
  `fim_ini` double NOT NULL,
  `fim_fin` double NOT NULL,
  `fim_num` double NOT NULL,
  `fac_cod` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `usuario` int(11) NOT NULL,
  `borrado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fim_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO factura_imp VALUES("1","0","0","2","1","2019-10-08","03:00:00","1","0");
INSERT INTO factura_imp VALUES("2","0","0","3","1","2019-10-08","06:12:43","1","0");


DROP TABLE IF EXISTS familias_pro;

CREATE TABLE `familias_pro` (
  `fam_cod` int(11) NOT NULL,
  `fam_des` varchar(255) NOT NULL,
  `fam_par` int(1) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`fam_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO familias_pro VALUES("1","VARIOS","0","2019-10-08","05:33:56","1","0");


DROP TABLE IF EXISTS formas_pago;

CREATE TABLE `formas_pago` (
  `for_cod` int(11) NOT NULL,
  `for_des` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`for_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO formas_pago VALUES("1","CONTADO","2015-02-03","14:58:22","1","0");
INSERT INTO formas_pago VALUES("2","CREDITO","2015-01-31","12:21:40","1","0");


DROP TABLE IF EXISTS inventario_cab;

CREATE TABLE `inventario_cab` (
  `inv_cod` int(11) NOT NULL,
  `inv_des` varchar(50) DEFAULT NULL,
  `inv_par` int(11) DEFAULT NULL,
  `inv_fec` date DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`inv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS inventario_det;

CREATE TABLE `inventario_det` (
  `mde_cod` int(11) NOT NULL AUTO_INCREMENT,
  `inv_cod` int(11) DEFAULT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `pro_can` double DEFAULT NULL,
  `pro_cos` double DEFAULT NULL,
  `pro_tot` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mde_cod`),
  KEY `FK_inventario_det` (`inv_cod`),
  CONSTRAINT `FK_inventario_det` FOREIGN KEY (`inv_cod`) REFERENCES `inventario_cab` (`inv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS inventarios_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventarios_cab_view` AS (select `inventario_cab`.`inv_cod` AS `inv_cod`,`inventario_cab`.`inv_des` AS `inv_des`,`inventario_cab`.`inv_par` AS `inv_par`,(case `inventario_cab`.`inv_par` when 0 then _utf8'PENDIENTE' when 1 then _utf8'CONFIRMADO' when 2 then _utf8'AJUSTADO' end) AS `par_des`,`inventario_cab`.`inv_fec` AS `inv_fec`,`inventario_cab`.`fecha` AS `fecha`,`inventario_cab`.`hora` AS `hora`,`inventario_cab`.`usuario` AS `usuario`,`inventario_cab`.`borrado` AS `borrado`,(select sum(`inventario_det`.`pro_tot`) from `inventario_det` where ((`inventario_det`.`borrado` = '0') and (`inventario_det`.`inv_cod` = `inventario_cab`.`inv_cod`))) AS `total_costo`,replace(format((select sum(`inventario_det`.`pro_tot`) from `inventario_det` where ((`inventario_det`.`borrado` = '0') and (`inventario_det`.`inv_cod` = `inventario_cab`.`inv_cod`))),0),',','.') AS `total_costo_format` from `inventario_cab`);



DROP TABLE IF EXISTS inventarios_det_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventarios_det_view` AS (select `inventario_det`.`mde_cod` AS `mde_cod`,`inventario_det`.`inv_cod` AS `inv_cod`,`inventario_det`.`pro_cod` AS `pro_cod`,`inventario_det`.`pro_can` AS `pro_can`,`inventario_det`.`pro_cos` AS `pro_cos`,replace(format(`inventario_det`.`pro_cos`,0),',','.') AS `pro_cos_for`,`inventario_det`.`pro_tot` AS `pro_tot`,replace(format(`inventario_det`.`pro_tot`,0),',','.') AS `pro_tot_for`,`inventario_det`.`fecha` AS `fecha`,`inventario_det`.`hora` AS `hora`,`inventario_det`.`usuario` AS `usuario`,`inventario_det`.`borrado` AS `borrado`,(select `productos_view`.`pro_bar` AS `pro_bar` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `pro_bar`,(select `productos_view`.`pro_des` AS `pro_des` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `pro_des`,(select `productos_view`.`fam_des` AS `fam_des` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `fam_des` from `inventario_det`);



DROP TABLE IF EXISTS libro_diario;

CREATE TABLE `libro_diario` (
  `ldi_cod` int(11) NOT NULL AUTO_INCREMENT,
  `ldi_dia` int(11) NOT NULL,
  `ldi_con` varchar(255) NOT NULL,
  `ldi_deb` double NOT NULL,
  `ldi_hab` double NOT NULL,
  `ldi_par` int(1) NOT NULL,
  `ldi_tra` int(11) NOT NULL COMMENT 'transaccion, venta, compra',
  `ldi_tab` varchar(50) NOT NULL COMMENT 'tabla de donde proviene la transaccion',
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `usuario` int(11) NOT NULL,
  `borrado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ldi_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS marcas;

CREATE TABLE `marcas` (
  `mar_cod` int(11) NOT NULL,
  `mar_des` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT '0',
  PRIMARY KEY (`mar_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO marcas VALUES("1","VARIOS","2019-10-08","05:35:07","1","0");


DROP TABLE IF EXISTS medios;

CREATE TABLE `medios` (
  `med_cod` int(11) NOT NULL,
  `med_des` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`med_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO medios VALUES("1","PROPIO","2019-10-08","05:41:38","1","0");


DROP TABLE IF EXISTS medios_pago;

CREATE TABLE `medios_pago` (
  `mpg_cod` int(11) NOT NULL,
  `mpg_des` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mpg_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO medios_pago VALUES("1","EFECTIVO","2017-02-20","21:53:05","1","0");
INSERT INTO medios_pago VALUES("2","CHEQUE","2017-02-20","21:52:42","1","0");


DROP TABLE IF EXISTS menu_cab;

CREATE TABLE `menu_cab` (
  `mec_cod` int(11) NOT NULL AUTO_INCREMENT,
  `mec_des` varchar(255) DEFAULT NULL,
  `mec_ord` int(11) DEFAULT NULL,
  `mec_sis` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mec_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO menu_cab VALUES("1","Mantenimiento","1","0","0");
INSERT INTO menu_cab VALUES("2","Administracion","2","0","0");
INSERT INTO menu_cab VALUES("3","Finanzas y Tesoreria","3","0","0");
INSERT INTO menu_cab VALUES("4","Ventas","4","0","0");
INSERT INTO menu_cab VALUES("5","Compras","5","0","0");
INSERT INTO menu_cab VALUES("6","Inventarios","6","0","0");
INSERT INTO menu_cab VALUES("7","Envios al Cliente","7","0","0");
INSERT INTO menu_cab VALUES("8","Reportes","9","0","0");
INSERT INTO menu_cab VALUES("9","Seguridad","10","0","0");
INSERT INTO menu_cab VALUES("10","Utilitarios","8","0","0");
INSERT INTO menu_cab VALUES("11","Configuracion","1","1","0");


DROP TABLE IF EXISTS menu_det;

CREATE TABLE `menu_det` (
  `med_cod` int(11) NOT NULL AUTO_INCREMENT,
  `mec_cod` int(11) DEFAULT NULL,
  `med_des` varchar(255) DEFAULT NULL,
  `med_dir` varchar(255) DEFAULT NULL,
  `med_ifr` varchar(255) DEFAULT NULL,
  `med_ord` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT '0',
  PRIMARY KEY (`med_cod`),
  KEY `fk_menu_det_menu_cab1` (`mec_cod`),
  CONSTRAINT `FK_menu_det_menu_cab` FOREIGN KEY (`mec_cod`) REFERENCES `menu_cab` (`mec_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

INSERT INTO menu_det VALUES("1","1","Categorias","./familias/index.php","principal","1","0");
INSERT INTO menu_det VALUES("2","1","Condicion Pago","./formas_pago/index.php","principal","2","0");
INSERT INTO menu_det VALUES("3","1","Medios Pago","./medios_pago/index.php","principal","3","0");
INSERT INTO menu_det VALUES("4","1","Medios Comun.","./medios_comun/index.php","principal","4","0");
INSERT INTO menu_det VALUES("5","1","Mesas","./mesas/index.php","principal","5","0");
INSERT INTO menu_det VALUES("6","1","Tipos Cliente","./tipos_cliente/index.php","principal","6","0");
INSERT INTO menu_det VALUES("7","1","Tipos Cuenta","./tipos_cuenta/index.php","principal","7","0");
INSERT INTO menu_det VALUES("8","1","Tipos Envio","./tipos_envio/index.php","principal","8","0");
INSERT INTO menu_det VALUES("9","1","Tipos Moneda","./tipos_moneda/index.php","principal","9","0");
INSERT INTO menu_det VALUES("10","1","Unidades Medida","./unidades/index.php","principal","10","0");
INSERT INTO menu_det VALUES("11","2","Clientes","./clientes/index.php","principal","1","0");
INSERT INTO menu_det VALUES("12","2","Proveedores","./proveedores/index.php","principal","2","0");
INSERT INTO menu_det VALUES("13","2","Cotizaciones","./cotizaciones/index.php","principal","4","0");
INSERT INTO menu_det VALUES("14","3","Cobros de Fact.","./cobros/index.php","principal","1","0");
INSERT INTO menu_det VALUES("15","4","Apertura Caja","./apertura/index.php","principal","1","0");
INSERT INTO menu_det VALUES("16","4","Facturacion","./facturacion/index.php","principal","2","0");
INSERT INTO menu_det VALUES("17","2","Productos","./productos/index.php","principal","3","0");
INSERT INTO menu_det VALUES("18","4","Anular Factura","./anular_factura/index.php","principal","4","0");
INSERT INTO menu_det VALUES("19","4","Cierre Caja","./cerrarcaja/index.php","principal","6","0");
INSERT INTO menu_det VALUES("20","8","Reporte Cierres","./reporte_cierres/index.php","principal","1","0");
INSERT INTO menu_det VALUES("21","8","Reporte Ventas","./reporte_ventas/index.php","principal","2","0");
INSERT INTO menu_det VALUES("22","8","Reporte Stock","./reporte_stock/index.php","principal","4","0");
INSERT INTO menu_det VALUES("23","8","Estado Cuenta Cliente","./reporte_cuentas_clientes/index.php","principal","6","0");
INSERT INTO menu_det VALUES("24","5","Facturas Compra","./compras/index.php","principal","1","0");
INSERT INTO menu_det VALUES("25","8","Estado Cuenta Prov.","./reporte_cuentas_proveedor/index.php","principal","7","0");
INSERT INTO menu_det VALUES("26","3","Pagos a Proveedores","./pagos/index.php","principal","2","0");
INSERT INTO menu_det VALUES("27","2","Ingresar Productos","./produccion/index.php","principal","5","0");
INSERT INTO menu_det VALUES("28","2","Baja de Productos","./bajas/index.php","principal","6","0");
INSERT INTO menu_det VALUES("29","3","Bancos y Cuentas","./bancos/index.php","principal","3","0");
INSERT INTO menu_det VALUES("30","3","Movimientos","./movimientos/index.php","principal","4","0");
INSERT INTO menu_det VALUES("31","6","Carga de Datos","./inventarios/index.php","principal","1","0");
INSERT INTO menu_det VALUES("32","6","Ajuste de Stock","./inventarios_ajuste/index.php","principal","2","0");
INSERT INTO menu_det VALUES("33","7","En Proceso","./delivery/index.php","principal","1","0");
INSERT INTO menu_det VALUES("34","7","Confirmacion ","./delivery_conf/index.php","principal","2","0");
INSERT INTO menu_det VALUES("35","9","Perfiles","./perfiles/index.php","principal","2","0");
INSERT INTO menu_det VALUES("36","9","Usuarios","./usuarios/index.php","principal","3","0");
INSERT INTO menu_det VALUES("37","9","Cambio Password","./cambio_pass/index.php","principal","4","0");
INSERT INTO menu_det VALUES("38","1","Marcas","./marcas/index.php","principal","11","0");
INSERT INTO menu_det VALUES("39","4","Control por Mesas","./facturacion/index.php","principal","3","0");
INSERT INTO menu_det VALUES("40","1","Depositos","./depositos/index.php","principal","12","0");
INSERT INTO menu_det VALUES("41","9","Backup Local","./backup/hacerbak.php","principal","1","0");
INSERT INTO menu_det VALUES("42","9","Sucursales","./sucursales/index.php","principal","0","0");
INSERT INTO menu_det VALUES("43","10","Panel de pedido","./panel/index.php","otros","0","0");
INSERT INTO menu_det VALUES("44","10","Comanda Electronica","./mozo/index.php","otros1","1","0");
INSERT INTO menu_det VALUES("45","4","Pedidos App","./reporte_app/index.php","principal","7","0");
INSERT INTO menu_det VALUES("46","8","Reporte Precios","./reporte_precios/index.php","principal","5","0");
INSERT INTO menu_det VALUES("47","4","Caja diaria","./cajadiaria/index.php","principal","5","0");
INSERT INTO menu_det VALUES("48","8","Reporte Movimientos","./reporte_movimientos/index.php","principal","3","0");
INSERT INTO menu_det VALUES("49","4","Imprimir Factura","./reporte_factura/index.php","principal","3","0");
INSERT INTO menu_det VALUES("50","5","Nota de Credito","./nota_credito/index.php","principal","2","0");
INSERT INTO menu_det VALUES("51","7","Deposito Entregas","./reporte_entregas/index.php","principal","3","0");
INSERT INTO menu_det VALUES("52","4","Reimpresion Ticket","./reporte_reimpresion/index.php","principal","3","0");
INSERT INTO menu_det VALUES("53","10","Sortear premios","./sorteos/index.php","otros","3","0");
INSERT INTO menu_det VALUES("54","10","Premios","./premios/index.php","principal","2","0");
INSERT INTO menu_det VALUES("55","11","Datos de Empresa","./datos/index.php","principal","1","0");
INSERT INTO menu_det VALUES("56","11","Ejercicio Fiscal","./ejercicio/index.php","principal","2","0");
INSERT INTO menu_det VALUES("61","11","Plan de Cuentas","./plan_cuentas/index.php","principal","3","0");


DROP TABLE IF EXISTS mesas;

CREATE TABLE `mesas` (
  `mes_cod` int(11) NOT NULL,
  `mes_des` varchar(255) DEFAULT NULL,
  `mes_est` int(11) DEFAULT '0',
  `mes_fac` int(11) DEFAULT '0',
  `mes_ipe` varchar(50) DEFAULT NULL,
  `mes_gru` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mes_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mesas VALUES("0","VENTANILLA","1","1","","1","","","1","0");
INSERT INTO mesas VALUES("1","CAJA 1","0","0","","1","2015-10-26","10:28:25","1","0");
INSERT INTO mesas VALUES("2","CAJA 2","0","0","","1","2015-02-02","23:32:22","1","0");
INSERT INTO mesas VALUES("3","CAJA 3","0","0","","1","2015-02-02","23:32:36","1","0");


DROP TABLE IF EXISTS movimientos;

CREATE TABLE `movimientos` (
  `mov_cod` int(11) NOT NULL,
  `mov_nro` varchar(20) DEFAULT NULL,
  `mov_obs` varchar(255) DEFAULT NULL,
  `mov_mon_dep` double DEFAULT NULL,
  `mov_mon_ext` double DEFAULT NULL,
  `mov_mon_sal` double DEFAULT NULL,
  `mov_par` varchar(5) DEFAULT NULL,
  `ban_cod` int(11) DEFAULT NULL,
  `mov_fec` date DEFAULT NULL,
  `fac_cod` int(11) DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mov_cod`),
  KEY `FK_movimientos_bancos` (`ban_cod`),
  CONSTRAINT `FK_movimientos_bancos` FOREIGN KEY (`ban_cod`) REFERENCES `bancos` (`ban_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS movimientos_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `movimientos_view` AS (select `movimientos`.`mov_cod` AS `mov_cod`,`movimientos`.`mov_nro` AS `mov_nro`,`movimientos`.`mov_obs` AS `mov_obs`,`movimientos`.`mov_mon_dep` AS `mov_mon_dep`,`movimientos`.`mov_mon_ext` AS `mov_mon_ext`,`movimientos`.`mov_mon_sal` AS `mov_mon_sal`,`movimientos`.`mov_par` AS `mov_par`,`movimientos`.`ban_cod` AS `ban_cod`,`movimientos`.`mov_fec` AS `mov_fec`,`movimientos`.`fecha` AS `fecha`,`movimientos`.`hora` AS `hora`,`movimientos`.`usuario` AS `usuario`,`movimientos`.`borrado` AS `borrado`,(select `bancos_view`.`ban_des` AS `ban_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `ban_des`,(select `bancos_view`.`ban_nro` AS `ban_nro` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `ban_nro`,(select `bancos_view`.`tcu_cod` AS `tcu_cod` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tcu_cod`,(select `bancos_view`.`tcu_des` AS `tcu_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tcu_des`,(select `bancos_view`.`tmo_cod` AS `tmo_cod` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tmo_cod`,(select `bancos_view`.`tmo_des` AS `tmo_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tmo_des`,replace(format(`movimientos`.`mov_mon_dep`,0),',','.') AS `monto_dep`,replace(format(`movimientos`.`mov_mon_ext`,0),',','.') AS `monto_ext`,replace(format(`movimientos`.`mov_mon_sal`,0),',','.') AS `monto_sal` from `movimientos`);



DROP TABLE IF EXISTS niveles;

CREATE TABLE `niveles` (
  `niv_cod` int(11) NOT NULL,
  `niv_des` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`niv_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO niveles VALUES("1","root","2012-04-07","20:29:38","1","0");
INSERT INTO niveles VALUES("2","administrador","2019-10-08","06:18:40","1","0");


DROP TABLE IF EXISTS pagos;

CREATE TABLE `pagos` (
  `cob_cod` int(11) NOT NULL AUTO_INCREMENT,
  `fac_cod` int(11) DEFAULT NULL,
  `prv_cod` int(11) DEFAULT NULL,
  `cob_mon` double DEFAULT NULL,
  `cob_sal` double DEFAULT NULL,
  `cob_che` varchar(200) DEFAULT NULL,
  `ban_cod` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`cob_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS parametro;

CREATE TABLE `parametro` (
  `par_cod` int(11) NOT NULL,
  `par_des` varchar(45) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`par_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO parametro VALUES("1","COMPRA-VENTA","0");
INSERT INTO parametro VALUES("2","PAQUETES","0");
INSERT INTO parametro VALUES("3","MATERIA PRIMA","1");


DROP TABLE IF EXISTS permisos;

CREATE TABLE `permisos` (
  `per_cod` int(11) NOT NULL AUTO_INCREMENT,
  `niv_cod` int(11) DEFAULT NULL,
  `mec_cod` int(11) DEFAULT NULL,
  `med_cod` int(11) DEFAULT NULL,
  `per_agr` varchar(2) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `per_mod` varchar(2) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `per_imp` varchar(2) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `per_con` varchar(2) DEFAULT NULL,
  `per_eli` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`per_cod`),
  KEY `fk_Permisos_Niveles1` (`niv_cod`),
  KEY `fk_Permisos_menu_cab1` (`mec_cod`),
  KEY `FK_permisos_med_cod` (`med_cod`),
  CONSTRAINT `FK_permisos_mec_cod` FOREIGN KEY (`mec_cod`) REFERENCES `menu_cab` (`mec_cod`),
  CONSTRAINT `FK_permisos_med_cod` FOREIGN KEY (`med_cod`) REFERENCES `menu_det` (`med_cod`),
  CONSTRAINT `FK_permisos_niv_cod` FOREIGN KEY (`niv_cod`) REFERENCES `niveles` (`niv_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=393 DEFAULT CHARSET=latin1;

INSERT INTO permisos VALUES("1","1","1","1","on","on","on","on","on");
INSERT INTO permisos VALUES("2","1","1","2","on","on","on","on","on");
INSERT INTO permisos VALUES("3","1","1","3","on","on","on","on","on");
INSERT INTO permisos VALUES("4","1","1","4","on","on","on","on","on");
INSERT INTO permisos VALUES("5","1","1","5","on","on","on","","on");
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
INSERT INTO permisos VALUES("33","1","7","33","on","on","on","","on");
INSERT INTO permisos VALUES("34","1","7","34","on","on","on","","on");
INSERT INTO permisos VALUES("35","1","9","35","on","on","on","on","on");
INSERT INTO permisos VALUES("80","1","9","36","on","on","on","on","on");
INSERT INTO permisos VALUES("117","1","1","38","on","on","on","on","on");
INSERT INTO permisos VALUES("118","1","4","39","","","","","");
INSERT INTO permisos VALUES("158","1","1","40","on","on","on","on","on");
INSERT INTO permisos VALUES("199","1","9","37","on","on","on","on","on");
INSERT INTO permisos VALUES("240","1","9","41","on","on","on","on","on");
INSERT INTO permisos VALUES("322","1","9","42","on","on","on","on","on");
INSERT INTO permisos VALUES("323","1","10","43","on","on","on","","on");
INSERT INTO permisos VALUES("324","1","10","44","on","on","on","","on");
INSERT INTO permisos VALUES("325","1","2","45","on","on","on","","on");
INSERT INTO permisos VALUES("326","1","8","46","on","on","on","on","on");
INSERT INTO permisos VALUES("327","1","4","47","on","on","on","on","on");
INSERT INTO permisos VALUES("328","1","8","48","on","on","on","on","on");
INSERT INTO permisos VALUES("329","1","4","49","on","on","on","on","on");
INSERT INTO permisos VALUES("330","1","5","50","on","on","on","on","on");
INSERT INTO permisos VALUES("331","1","7","51","on","on","on","","on");
INSERT INTO permisos VALUES("332","1","4","52","on","on","on","on","on");
INSERT INTO permisos VALUES("333","1","10","53","","","","","");
INSERT INTO permisos VALUES("334","1","10","54","on","on","on","","on");
INSERT INTO permisos VALUES("335","1","11","55","on","on","on","","on");
INSERT INTO permisos VALUES("336","2","1","1","on","on","on","on","on");
INSERT INTO permisos VALUES("337","2","1","2","on","on","on","on","on");
INSERT INTO permisos VALUES("338","2","1","3","on","on","on","on","on");
INSERT INTO permisos VALUES("339","2","1","4","on","on","on","on","on");
INSERT INTO permisos VALUES("340","2","1","5","on","on","on","","on");
INSERT INTO permisos VALUES("341","2","1","6","on","on","on","on","on");
INSERT INTO permisos VALUES("342","2","1","7","on","on","on","on","on");
INSERT INTO permisos VALUES("343","2","1","8","on","on","on","on","on");
INSERT INTO permisos VALUES("344","2","1","9","on","on","on","on","on");
INSERT INTO permisos VALUES("345","2","1","10","on","on","on","on","on");
INSERT INTO permisos VALUES("346","2","2","11","on","on","on","on","on");
INSERT INTO permisos VALUES("347","2","2","12","on","on","on","on","on");
INSERT INTO permisos VALUES("348","2","2","13","on","on","on","on","on");
INSERT INTO permisos VALUES("349","2","3","14","on","on","on","on","on");
INSERT INTO permisos VALUES("350","2","4","15","on","on","on","on","on");
INSERT INTO permisos VALUES("351","2","4","16","on","on","on","on","on");
INSERT INTO permisos VALUES("352","2","2","17","on","on","on","on","on");
INSERT INTO permisos VALUES("353","2","4","18","on","on","on","on","on");
INSERT INTO permisos VALUES("354","2","4","19","on","on","on","on","on");
INSERT INTO permisos VALUES("355","2","8","20","on","on","on","on","on");
INSERT INTO permisos VALUES("356","2","8","21","on","on","on","on","on");
INSERT INTO permisos VALUES("357","2","8","22","on","on","on","on","on");
INSERT INTO permisos VALUES("358","2","8","23","on","on","on","on","on");
INSERT INTO permisos VALUES("359","2","5","24","on","on","on","on","on");
INSERT INTO permisos VALUES("360","2","8","25","on","on","on","on","on");
INSERT INTO permisos VALUES("361","2","3","26","on","on","on","on","on");
INSERT INTO permisos VALUES("362","2","2","27","on","on","on","on","on");
INSERT INTO permisos VALUES("363","2","2","28","on","on","on","on","on");
INSERT INTO permisos VALUES("364","2","3","29","on","on","on","on","on");
INSERT INTO permisos VALUES("365","2","3","30","on","on","on","on","on");
INSERT INTO permisos VALUES("366","2","6","31","on","on","on","on","on");
INSERT INTO permisos VALUES("367","2","6","32","on","on","on","on","on");
INSERT INTO permisos VALUES("368","2","7","33","on","on","on","","on");
INSERT INTO permisos VALUES("369","2","7","34","on","on","on","","on");
INSERT INTO permisos VALUES("370","2","9","35","on","on","on","","on");
INSERT INTO permisos VALUES("371","2","9","36","on","on","on","on","on");
INSERT INTO permisos VALUES("372","2","9","37","on","on","on","on","on");
INSERT INTO permisos VALUES("373","2","1","38","on","on","on","on","on");
INSERT INTO permisos VALUES("374","2","4","39","on","on","on","","on");
INSERT INTO permisos VALUES("375","2","1","40","on","on","on","","on");
INSERT INTO permisos VALUES("376","2","9","41","on","on","on","on","on");
INSERT INTO permisos VALUES("377","2","9","42","on","on","on","","on");
INSERT INTO permisos VALUES("378","2","10","43","on","on","on","","on");
INSERT INTO permisos VALUES("379","2","10","44","on","on","on","","on");
INSERT INTO permisos VALUES("380","2","4","45","on","on","on","","on");
INSERT INTO permisos VALUES("381","2","8","46","on","on","on","on","on");
INSERT INTO permisos VALUES("382","2","4","47","on","on","on","on","on");
INSERT INTO permisos VALUES("383","2","8","48","on","on","on","on","on");
INSERT INTO permisos VALUES("384","2","4","49","on","on","on","on","on");
INSERT INTO permisos VALUES("385","2","5","50","on","on","on","on","on");
INSERT INTO permisos VALUES("386","2","7","51","on","on","on","","on");
INSERT INTO permisos VALUES("387","2","4","52","on","on","on","on","on");
INSERT INTO permisos VALUES("388","2","10","53","on","on","on","","on");
INSERT INTO permisos VALUES("389","2","10","54","on","on","on","","on");
INSERT INTO permisos VALUES("390","2","11","55","on","on","on","","on");
INSERT INTO permisos VALUES("391","2","11","56","on","on","on","","on");
INSERT INTO permisos VALUES("392","2","11","61","on","on","on","","on");


DROP TABLE IF EXISTS presupuesto_cab;

CREATE TABLE `presupuesto_cab` (
  `pre_cod` int(11) NOT NULL,
  `cli_cod` int(11) DEFAULT NULL,
  `pre_est` int(11) DEFAULT '0',
  `pre_fec` date DEFAULT NULL,
  `pre_cab` text,
  `pre_pie` text,
  `pre_obs` text,
  `pre_fec_conf` date DEFAULT NULL,
  `pre_cos_tot` double DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(1) DEFAULT NULL,
  PRIMARY KEY (`pre_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS presupuesto_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `presupuesto_cab_view` AS (select `presupuesto_cab`.`pre_cod` AS `pre_cod`,`presupuesto_cab`.`cli_cod` AS `cli_cod`,`presupuesto_cab`.`pre_est` AS `pre_est`,`presupuesto_cab`.`pre_fec` AS `pre_fec`,`presupuesto_cab`.`pre_fec_conf` AS `pre_fec_conf`,`presupuesto_cab`.`pre_cos_tot` AS `pre_cos_tot`,`presupuesto_cab`.`fecha` AS `fecha`,`presupuesto_cab`.`hora` AS `hora`,`presupuesto_cab`.`usuario` AS `usuario`,`presupuesto_cab`.`borrado` AS `borrado`,replace(format(`presupuesto_cab`.`pre_cos_tot`,0),',','.') AS `pre_cos_for`,(case `presupuesto_cab`.`pre_est` when 0 then _utf8'PENDIENTE' when 1 then _utf8'CONFIRMADO' when 2 then _utf8'AJUSTADO' end) AS `est_des`,(select `clientes`.`cli_des` AS `cli_des` from `clientes` where (`clientes`.`cli_cod` = `presupuesto_cab`.`cli_cod`)) AS `cli_des` from `presupuesto_cab`);



DROP TABLE IF EXISTS presupuesto_det;

CREATE TABLE `presupuesto_det` (
  `prd_cod` int(11) NOT NULL AUTO_INCREMENT,
  `pre_cod` int(11) DEFAULT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `prd_can` double DEFAULT NULL,
  `prd_cos` double DEFAULT NULL,
  `prd_tot` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(1) DEFAULT NULL,
  PRIMARY KEY (`prd_cod`),
  KEY `FK_inventario_det` (`pre_cod`),
  CONSTRAINT `FK_presupuesto_det_` FOREIGN KEY (`pre_cod`) REFERENCES `presupuesto_cab` (`pre_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS presupuesto_det_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `presupuesto_det_view` AS (select `presupuesto_det`.`prd_cod` AS `prd_cod`,`presupuesto_det`.`pre_cod` AS `pre_cod`,`presupuesto_det`.`pro_cod` AS `pro_cod`,`presupuesto_det`.`prd_can` AS `prd_can`,`presupuesto_det`.`prd_cos` AS `prd_cos`,`presupuesto_det`.`prd_tot` AS `prd_tot`,`presupuesto_det`.`fecha` AS `fecha`,`presupuesto_det`.`hora` AS `hora`,`presupuesto_det`.`usuario` AS `usuario`,`presupuesto_det`.`borrado` AS `borrado`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `presupuesto_det`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `presupuesto_det`.`pro_cod`)) AS `pro_des`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `presupuesto_det`.`pro_cod`)) AS `fam_cod`,(select `familias_pro`.`fam_des` AS `fam_des` from `familias_pro` where (`familias_pro`.`fam_cod` = (select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `presupuesto_det`.`pro_cod`)))) AS `fam_des`,replace(format(`presupuesto_det`.`prd_cos`,0),',','.') AS `prd_cos_for`,replace(format(`presupuesto_det`.`prd_tot`,0),',','.') AS `prd_tot_for` from `presupuesto_det`);



DROP TABLE IF EXISTS produccion;

CREATE TABLE `produccion` (
  `prd_cod` int(11) NOT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `prd_can` double DEFAULT NULL,
  `prd_fec` date DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`prd_cod`),
  KEY `FK_produccion_pro_cod` (`pro_cod`),
  CONSTRAINT `FK_produccion_pro_cod` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS produccion_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `produccion_view` AS (select `produccion`.`prd_cod` AS `prd_cod`,`produccion`.`pro_cod` AS `pro_cod`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `pro_des`,(select `productos`.`par_cod` AS `par_cod` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `par_cod`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `fam_cod`,`produccion`.`prd_can` AS `prd_can`,`produccion`.`prd_fec` AS `prd_fec`,`produccion`.`fecha` AS `fecha`,`produccion`.`hora` AS `hora`,`produccion`.`usuario` AS `usuario`,`produccion`.`borrado` AS `borrado` from `produccion`);



DROP TABLE IF EXISTS productos;

CREATE TABLE `productos` (
  `pro_cod` int(11) NOT NULL,
  `pro_bar` varchar(30) DEFAULT NULL,
  `pro_des` varchar(255) DEFAULT NULL,
  `pro_cos` double DEFAULT NULL,
  `pro_ven` double DEFAULT NULL,
  `pro_can` double DEFAULT NULL,
  `pro_imp` int(11) DEFAULT NULL,
  `par_cod` int(11) DEFAULT NULL,
  `fam_cod` int(11) DEFAULT NULL,
  `uni_cod` int(11) DEFAULT NULL,
  `mar_cod` int(11) DEFAULT NULL,
  `pro_bol` int(11) DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`pro_cod`),
  KEY `FK_productos_par_cod` (`par_cod`),
  KEY `FK_productos_fam_cod` (`fam_cod`),
  KEY `FK_productos_uni_cod` (`uni_cod`),
  KEY `FK_productos_marca` (`mar_cod`),
  CONSTRAINT `FK_productos_fam_cod` FOREIGN KEY (`fam_cod`) REFERENCES `familias_pro` (`fam_cod`),
  CONSTRAINT `FK_productos_marca` FOREIGN KEY (`mar_cod`) REFERENCES `marcas` (`mar_cod`),
  CONSTRAINT `FK_productos_par_cod` FOREIGN KEY (`par_cod`) REFERENCES `parametro` (`par_cod`),
  CONSTRAINT `FK_productos_uni_cod` FOREIGN KEY (`uni_cod`) REFERENCES `unidades` (`uni_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO productos VALUES("1","01","PRUEBA","1000","2000","-5","10","1","1","2","1","0","2019-10-08","05:42:35","1","0");


DROP TABLE IF EXISTS productos_det;

CREATE TABLE `productos_det` (
  `pde_cod` int(11) NOT NULL AUTO_INCREMENT,
  `pro_cod` int(11) DEFAULT NULL,
  `pde_des` varchar(255) DEFAULT NULL,
  `pde_cos` double DEFAULT NULL,
  `pde_ven` double DEFAULT NULL,
  `pde_est` int(1) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(1) DEFAULT '0',
  PRIMARY KEY (`pde_cod`),
  KEY `FK_productos_det_pro_cod` (`pro_cod`),
  CONSTRAINT `FK_productos_det_pro_cod` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS productos_det_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `productos_det_view` AS (select `productos_det`.`pde_cod` AS `pde_cod`,`productos_det`.`pro_cod` AS `pro_cod`,`productos_det`.`pde_des` AS `pde_des`,`productos_det`.`pde_cos` AS `pde_cos`,`productos_det`.`pde_ven` AS `pde_ven`,`productos_det`.`pde_est` AS `pde_est`,`productos_det`.`fecha` AS `fecha`,`productos_det`.`hora` AS `hora`,`productos_det`.`usuario` AS `usuario`,`productos_det`.`borrado` AS `borrado`,(select `productos`.`pro_bar` from `productos` where (`productos`.`pro_cod` = `productos_det`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` from `productos` where (`productos`.`pro_cod` = `productos_det`.`pro_cod`)) AS `pro_des`,(select `productos`.`fam_cod` from `productos` where (`productos`.`pro_cod` = `productos_det`.`pro_cod`)) AS `fam_cod`,(select `productos`.`par_cod` from `productos` where (`productos`.`pro_cod` = `productos_det`.`pro_cod`)) AS `par_cod`,(select `productos`.`pro_bol` AS `pro_bol` from `productos` where (`productos`.`pro_cod` = `productos_det`.`pro_cod`)) AS `pro_bol` from `productos_det`);



DROP TABLE IF EXISTS productos_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productos_view` AS (select `productos`.`pro_cod` AS `pro_cod`,`productos`.`pro_bar` AS `pro_bar`,`productos`.`pro_des` AS `pro_des`,`productos`.`pro_cos` AS `pro_cos`,`productos`.`pro_ven` AS `pro_ven`,`productos`.`pro_can` AS `pro_can`,`productos`.`pro_imp` AS `pro_imp`,`productos`.`par_cod` AS `par_cod`,`productos`.`fam_cod` AS `fam_cod`,`productos`.`uni_cod` AS `uni_cod`,`productos`.`mar_cod` AS `mar_cod`,`productos`.`pro_bol` AS `pro_bol`,`productos`.`fecha` AS `fecha`,`productos`.`hora` AS `hora`,`productos`.`usuario` AS `usuario`,`productos`.`borrado` AS `borrado`,(select `parametro`.`par_des` AS `par_des` from `parametro` where (`parametro`.`par_cod` = `productos`.`par_cod`)) AS `par_des`,(select `familias_pro`.`fam_des` AS `fam_des` from `familias_pro` where (`familias_pro`.`fam_cod` = `productos`.`fam_cod`)) AS `fam_des`,(select `unidades`.`uni_des` AS `uni_des` from `unidades` where (`unidades`.`uni_cod` = `productos`.`uni_cod`)) AS `uni_des`,(select `marcas`.`mar_des` AS `mar_des` from `marcas` where (`marcas`.`mar_cod` = `productos`.`mar_cod`)) AS `mar_des` from `productos`);

INSERT INTO productos_view VALUES("1","01","PRUEBA","1000","2000","-5","10","1","1","2","1","0","2019-10-08","05:42:35","1","0","COMPRA-VENTA","VARIOS","VARIOS","VARIOS");


DROP TABLE IF EXISTS promo_cab;

CREATE TABLE `promo_cab` (
  `prm_cod` int(11) NOT NULL,
  `prm_des` varchar(255) NOT NULL,
  `prm_est` int(1) NOT NULL DEFAULT '0',
  `prm_fec` date DEFAULT NULL,
  `prm_cel` varchar(20) DEFAULT NULL,
  `fac_cod` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `usuario` int(11) NOT NULL,
  `borrado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prm_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS promo_det;

CREATE TABLE `promo_det` (
  `pmd_cod` int(11) NOT NULL AUTO_INCREMENT,
  `pmd_cel` varchar(20) NOT NULL,
  `pmd_est` int(1) NOT NULL DEFAULT '0',
  `pmd_fec_sor` date DEFAULT NULL,
  `prm_cod` int(11) NOT NULL,
  `fac_cod` int(11) NOT NULL,
  `cli_cod` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(1) DEFAULT '0',
  PRIMARY KEY (`pmd_cod`),
  KEY `FK_promo_det_prm_cod` (`prm_cod`),
  KEY `FK_promo_det_fac_cod` (`fac_cod`),
  KEY `FK_promo_det_cli_cod` (`cli_cod`),
  CONSTRAINT `FK_promo_det_cli_cod` FOREIGN KEY (`cli_cod`) REFERENCES `clientes` (`cli_cod`),
  CONSTRAINT `FK_promo_det_fac_cod` FOREIGN KEY (`fac_cod`) REFERENCES `factura_cab` (`fac_cod`),
  CONSTRAINT `FK_promo_det_prm_cod` FOREIGN KEY (`prm_cod`) REFERENCES `promo_cab` (`prm_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS proveedores;

CREATE TABLE `proveedores` (
  `prv_cod` int(11) NOT NULL,
  `prv_des` varchar(255) DEFAULT NULL,
  `prv_ruc` varchar(20) DEFAULT NULL,
  `prv_dir` varchar(255) DEFAULT NULL,
  `prv_tel` varchar(255) DEFAULT NULL,
  `prv_mai` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`prv_cod`),
  KEY `cli_des` (`prv_des`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS recetas;

CREATE TABLE `recetas` (
  `rec_cod` int(11) NOT NULL AUTO_INCREMENT,
  `pro_cod` int(11) DEFAULT NULL,
  `spr_cod` int(11) DEFAULT NULL,
  `rec_can` double DEFAULT NULL,
  `rec_pre` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`rec_cod`),
  KEY `FK_recetas_pro_cod` (`pro_cod`),
  KEY `FK_recetas_sub` (`spr_cod`),
  CONSTRAINT `FK_recetas_pro_cod` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`),
  CONSTRAINT `FK_recetas_sub` FOREIGN KEY (`spr_cod`) REFERENCES `productos` (`pro_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS sucursales;

CREATE TABLE `sucursales` (
  `suc_cod` int(11) NOT NULL,
  `suc_des` varchar(255) DEFAULT NULL,
  `suc_tim` varchar(100) DEFAULT NULL,
  `suc_val` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`suc_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO sucursales VALUES("1","CENTRAL","82737776","08/11","2012-03-31","22:04:33","1","0");


DROP TABLE IF EXISTS tabbackup;

CREATE TABLE `tabbackup` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `archivo` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS tipo_cliente;

CREATE TABLE `tipo_cliente` (
  `tic_cod` int(11) NOT NULL,
  `tic_des` varchar(50) DEFAULT NULL,
  `tic_por` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`tic_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_cliente VALUES("1","MAYORISTAS","10","2015-01-31","22:22:19","1","0");
INSERT INTO tipo_cliente VALUES("2","MINORISTAS","5.3","2015-10-08","11:19:21","1","0");
INSERT INTO tipo_cliente VALUES("3","ESTANDAR","0","2015-01-31","22:22:06","1","0");


DROP TABLE IF EXISTS tipo_cuenta;

CREATE TABLE `tipo_cuenta` (
  `tcu_cod` int(11) NOT NULL AUTO_INCREMENT,
  `tcu_des` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`tcu_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tipo_cuenta VALUES("1","CTA.CTE","2015-01-31","16:41:05","1","0");
INSERT INTO tipo_cuenta VALUES("2","CAJ.AHO.","2015-01-31","16:41:02","1","0");


DROP TABLE IF EXISTS tipo_envio;

CREATE TABLE `tipo_envio` (
  `tie_cod` int(11) NOT NULL,
  `tie_des` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`tie_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_envio VALUES("1","EN CAJA","2015-01-31","16:53:35","1","0");
INSERT INTO tipo_envio VALUES("2","REPARTOS","2017-02-20","21:57:24","1","0");
INSERT INTO tipo_envio VALUES("3","ENTREGADO","2017-02-20","21:56:45","1","1");


DROP TABLE IF EXISTS tipo_moneda;

CREATE TABLE `tipo_moneda` (
  `tmo_cod` int(11) NOT NULL,
  `tmo_des` varchar(45) DEFAULT NULL,
  `tmo_sim` varchar(45) DEFAULT NULL,
  `tmo_par` int(1) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`tmo_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_moneda VALUES("1","GUARANIES","GS.","1","2015-11-14","00:01:30","1","0");
INSERT INTO tipo_moneda VALUES("2","DOLARES","US$","0","2017-02-20","21:58:01","1","1");
INSERT INTO tipo_moneda VALUES("3","REAL","RE$","0","2017-02-20","21:58:25","1","1");
INSERT INTO tipo_moneda VALUES("4","PESO ARG.","P$","0","2017-02-20","21:58:21","1","1");
INSERT INTO tipo_moneda VALUES("5","LIBRA ","L$","0","2017-02-20","21:58:16","1","1");
INSERT INTO tipo_moneda VALUES("6","YEN","Y$","0","2017-02-20","21:58:29","1","1");


DROP TABLE IF EXISTS tmp;

CREATE TABLE `tmp` (
  `tmp_cod` int(11) NOT NULL AUTO_INCREMENT,
  `numlinea` int(11) NOT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `pro_can` double DEFAULT NULL,
  `nro_fac` int(11) DEFAULT NULL,
  PRIMARY KEY (`tmp_cod`,`numlinea`),
  UNIQUE KEY `tmp_cod` (`tmp_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tmp VALUES("3","210","2","1","169");
INSERT INTO tmp VALUES("4","22641","519","2","6687");
INSERT INTO tmp VALUES("5","38065","489","2","11061");
INSERT INTO tmp VALUES("6","38065","489","2","11061");
INSERT INTO tmp VALUES("7","41994","978","2","12154");
INSERT INTO tmp VALUES("8","47654","314","50","13684");
INSERT INTO tmp VALUES("9","72428","412","3","20628");
INSERT INTO tmp VALUES("12","175465","1276","3","48720");


DROP TABLE IF EXISTS unidades;

CREATE TABLE `unidades` (
  `uni_cod` int(11) NOT NULL,
  `uni_des` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`uni_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO unidades VALUES("1","UNIDAD","2017-02-22","23:25:46","1","1");
INSERT INTO unidades VALUES("2","VARIOS","2019-10-08","05:35:15","1","0");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `password_nor` varchar(45) DEFAULT NULL,
  `niv_cod` int(11) DEFAULT NULL,
  `suc_cod` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usu` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_Niveles1` (`niv_cod`),
  KEY `FK_usuarios` (`suc_cod`),
  CONSTRAINT `FK_usuarios` FOREIGN KEY (`suc_cod`) REFERENCES `sucursales` (`suc_cod`),
  CONSTRAINT `FK_usuarios_niveles` FOREIGN KEY (`niv_cod`) REFERENCES `niveles` (`niv_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","admin","8518e999e7e26bba6b2dd1df2ee74d2e","apollo11","1","1","2019-10-08","06:23:06","1","0");


DROP TABLE IF EXISTS utilidad_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `utilidad_view` AS (select `factura_det`.`fac_cod` AS `fac_cod`,(`factura_det`.`pro_tot` - ((select `productos`.`pro_cos` from `productos` where (`productos`.`pro_cod` = `factura_det`.`pro_cod`)) * `factura_det`.`pro_can`)) AS `utilidad` from `factura_det` where (`factura_det`.`borrado` = 0));

INSERT INTO utilidad_view VALUES("1","1000");
INSERT INTO utilidad_view VALUES("2","1000");
INSERT INTO utilidad_view VALUES("2","1000");
INSERT INTO utilidad_view VALUES("3","1000");


