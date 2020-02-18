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

INSERT INTO aper_cie VALUES("1","500000","502500","502500","1","0","1","2015-10-05","23:13:04","1","0");
INSERT INTO aper_cie VALUES("2","500000","502000","507500","1","-5500","1","2015-10-10","22:11:27","1","0");
INSERT INTO aper_cie VALUES("3","20000","21000","22500","1","-1500","1","2015-10-10","22:13:36","2","0");
INSERT INTO aper_cie VALUES("4","50000","64000","70000","1","-6000","1","2015-10-11","11:56:03","1","0");
INSERT INTO aper_cie VALUES("5","50000","0","50000","1","-50000","1","2015-10-11","13:00:59","1","0");
INSERT INTO aper_cie VALUES("6","500000","427000","542500","1","-115500","1","2015-10-11","13:25:06","1","0");
INSERT INTO aper_cie VALUES("7","500000","550000","590000","1","-40000","1","2015-10-11","23:48:30","1","0");
INSERT INTO aper_cie VALUES("8","150000","200000","162500","1","37500","1","2015-10-12","01:33:10","1","0");
INSERT INTO aper_cie VALUES("9","50000","120000","125000","1","-5000","1","2015-10-12","21:13:49","1","0");
INSERT INTO aper_cie VALUES("10","300000","14000000","14264500","1","-264500","1","2015-10-19","18:02:52","1","0");
INSERT INTO aper_cie VALUES("11","30000","32500","32500","1","0","1","2015-10-19","18:12:08","2","0");
INSERT INTO aper_cie VALUES("12","500000","503000","512500","1","-9500","1","2015-11-19","21:01:00","1","0");
INSERT INTO aper_cie VALUES("13","500000","502500","502500","1","0","1","2015-11-19","23:11:56","1","0");
INSERT INTO aper_cie VALUES("14","500000","502500","502500","1","0","1","2015-11-19","23:13:20","1","0");
INSERT INTO aper_cie VALUES("15","150000","200000","155000","1","45000","1","2015-11-19","23:18:24","2","0");
INSERT INTO aper_cie VALUES("16","500000","800000","813500","1","-13500","1","2015-11-20","00:24:35","1","0");
INSERT INTO aper_cie VALUES("17","150000","317000","329000","1","-12000","1","2015-11-21","13:22:41","1","0");
INSERT INTO aper_cie VALUES("18","150000","397000","418000","1","-21000","1","2015-11-21","17:14:28","1","0");
INSERT INTO aper_cie VALUES("19","500000","503000","511500","1","-8500","1","2015-11-22","16:19:45","1","0");
INSERT INTO aper_cie VALUES("20","50000","77000","81000","1","-4000","1","2015-11-22","16:23:59","1","0");
INSERT INTO aper_cie VALUES("21","50000","","","0","","1","2015-11-23","19:00:06","1","0");


DROP TABLE IF EXISTS aper_cie_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `aper_cie_view` AS (select `aper_cie`.`ape_cod` AS `ape_cod`,replace(format(`aper_cie`.`ape_dot`,0),',','.') AS `ape_dot`,replace(format(`aper_cie`.`ape_efe`,0),',','.') AS `ape_efe`,replace(format(`aper_cie`.`ape_cie`,0),',','.') AS `ape_cie`,(case when (`aper_cie`.`ape_par` = 0) then _utf8'Abierto' when (`aper_cie`.`ape_par` = 1) then _utf8'Cerrado' end) AS `ape_est`,replace(format(`aper_cie`.`ape_dif`,0),',','.') AS `ape_dif`,`aper_cie`.`aps_cod` AS `aps_cod`,`aper_cie`.`fecha` AS `fecha`,`aper_cie`.`hora` AS `hora`,`aper_cie`.`usuario` AS `usuario`,`aper_cie`.`borrado` AS `borrado` from `aper_cie`);

INSERT INTO aper_cie_view VALUES("1","500.000","502.500","502.500","Cerrado","0","1","2015-10-05","23:13:04","1","0");
INSERT INTO aper_cie_view VALUES("2","500.000","502.000","507.500","Cerrado","-5.500","1","2015-10-10","22:11:27","1","0");
INSERT INTO aper_cie_view VALUES("3","20.000","21.000","22.500","Cerrado","-1.500","1","2015-10-10","22:13:36","2","0");
INSERT INTO aper_cie_view VALUES("4","50.000","64.000","70.000","Cerrado","-6.000","1","2015-10-11","11:56:03","1","0");
INSERT INTO aper_cie_view VALUES("5","50.000","0","50.000","Cerrado","-50.000","1","2015-10-11","13:00:59","1","0");
INSERT INTO aper_cie_view VALUES("6","500.000","427.000","542.500","Cerrado","-115.500","1","2015-10-11","13:25:06","1","0");
INSERT INTO aper_cie_view VALUES("7","500.000","550.000","590.000","Cerrado","-40.000","1","2015-10-11","23:48:30","1","0");
INSERT INTO aper_cie_view VALUES("8","150.000","200.000","162.500","Cerrado","37.500","1","2015-10-12","01:33:10","1","0");
INSERT INTO aper_cie_view VALUES("9","50.000","120.000","125.000","Cerrado","-5.000","1","2015-10-12","21:13:49","1","0");
INSERT INTO aper_cie_view VALUES("10","300.000","14.000.000","14.264.500","Cerrado","-264.500","1","2015-10-19","18:02:52","1","0");
INSERT INTO aper_cie_view VALUES("11","30.000","32.500","32.500","Cerrado","0","1","2015-10-19","18:12:08","2","0");
INSERT INTO aper_cie_view VALUES("12","500.000","503.000","512.500","Cerrado","-9.500","1","2015-11-19","21:01:00","1","0");
INSERT INTO aper_cie_view VALUES("13","500.000","502.500","502.500","Cerrado","0","1","2015-11-19","23:11:56","1","0");
INSERT INTO aper_cie_view VALUES("14","500.000","502.500","502.500","Cerrado","0","1","2015-11-19","23:13:20","1","0");
INSERT INTO aper_cie_view VALUES("15","150.000","200.000","155.000","Cerrado","45.000","1","2015-11-19","23:18:24","2","0");
INSERT INTO aper_cie_view VALUES("16","500.000","800.000","813.500","Cerrado","-13.500","1","2015-11-20","00:24:35","1","0");
INSERT INTO aper_cie_view VALUES("17","150.000","317.000","329.000","Cerrado","-12.000","1","2015-11-21","13:22:41","1","0");
INSERT INTO aper_cie_view VALUES("18","150.000","397.000","418.000","Cerrado","-21.000","1","2015-11-21","17:14:28","1","0");
INSERT INTO aper_cie_view VALUES("19","500.000","503.000","511.500","Cerrado","-8.500","1","2015-11-22","16:19:45","1","0");
INSERT INTO aper_cie_view VALUES("20","50.000","77.000","81.000","Cerrado","-4.000","1","2015-11-22","16:23:59","1","0");
INSERT INTO aper_cie_view VALUES("21","50.000","","","Abierto","","1","2015-11-23","19:00:06","1","0");


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

INSERT INTO aper_sis VALUES("1","0","0","0","0","2012-09-19","21:50:58","4","0");


DROP TABLE IF EXISTS auditoria;

CREATE TABLE `auditoria` (
  `aud_cod` int(11) NOT NULL AUTO_INCREMENT,
  `aud_ip` varchar(15) DEFAULT NULL,
  `usu_cod` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`aud_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;

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
INSERT INTO auditoria VALUES("71","190.23.156.209","admin","2015-10-20","12:41:28");
INSERT INTO auditoria VALUES("72","127.0.0.1","admin","2015-10-20","21:10:52");
INSERT INTO auditoria VALUES("73","127.0.0.1","admin","2015-10-20","23:33:54");
INSERT INTO auditoria VALUES("74","127.0.0.1","admin","2015-10-21","10:44:28");
INSERT INTO auditoria VALUES("75","127.0.0.1","admin","2015-10-21","23:56:36");
INSERT INTO auditoria VALUES("76","127.0.0.1","admin","2015-10-22","11:36:26");
INSERT INTO auditoria VALUES("77","127.0.0.1","admin","2015-10-22","12:58:29");
INSERT INTO auditoria VALUES("78","127.0.0.1","admin","2015-10-22","13:03:52");
INSERT INTO auditoria VALUES("79","186.16.7.237","admin","2015-10-22","13:08:05");
INSERT INTO auditoria VALUES("80","186.16.7.237","admin","2015-10-22","13:10:06");
INSERT INTO auditoria VALUES("81","186.16.7.237","admin","2015-10-22","13:10:49");
INSERT INTO auditoria VALUES("82","190.23.156.197","admin","2015-10-22","14:54:09");
INSERT INTO auditoria VALUES("83","190.23.156.197","admin","2015-10-22","14:58:17");
INSERT INTO auditoria VALUES("84","190.23.156.197","admin","2015-10-22","15:12:03");
INSERT INTO auditoria VALUES("85","190.23.156.197","admin","2015-10-22","15:23:46");
INSERT INTO auditoria VALUES("86","190.23.156.197","admin","2015-10-22","15:24:44");
INSERT INTO auditoria VALUES("87","127.0.0.1","admin","2015-10-23","23:11:55");
INSERT INTO auditoria VALUES("88","127.0.0.1","admin","2015-10-26","10:15:12");
INSERT INTO auditoria VALUES("89","127.0.0.1","admin","2015-10-27","11:09:17");
INSERT INTO auditoria VALUES("90","127.0.0.1","admin","2015-10-27","19:38:08");
INSERT INTO auditoria VALUES("91","127.0.0.1","admin","2015-10-27","19:57:17");
INSERT INTO auditoria VALUES("92","127.0.0.1","admin","2015-10-27","21:20:37");
INSERT INTO auditoria VALUES("93","127.0.0.1","admin","2015-10-27","21:22:40");
INSERT INTO auditoria VALUES("94","127.0.0.1","admin","2015-10-27","21:24:47");
INSERT INTO auditoria VALUES("95","127.0.0.1","admin","2015-10-27","21:39:50");
INSERT INTO auditoria VALUES("96","127.0.0.1","admin","2015-10-27","22:10:35");
INSERT INTO auditoria VALUES("97","127.0.0.1","admin","2015-10-27","22:15:53");
INSERT INTO auditoria VALUES("98","127.0.0.1","admin","2015-10-27","22:21:56");
INSERT INTO auditoria VALUES("99","127.0.0.1","admin","2015-10-27","23:09:36");
INSERT INTO auditoria VALUES("100","192.168.0.9","admin","2015-10-28","00:02:03");
INSERT INTO auditoria VALUES("101","127.0.0.1","admin","2015-10-28","10:08:37");
INSERT INTO auditoria VALUES("102","127.0.0.1","admin","2015-11-02","12:18:44");
INSERT INTO auditoria VALUES("103","127.0.0.1","admin","2015-11-03","13:07:44");
INSERT INTO auditoria VALUES("104","127.0.0.1","admin","2015-11-04","12:17:35");
INSERT INTO auditoria VALUES("105","127.0.0.1","admin","2015-11-04","13:00:26");
INSERT INTO auditoria VALUES("106","127.0.0.1","admin","2015-11-05","21:37:13");
INSERT INTO auditoria VALUES("107","127.0.0.1","admin","2015-11-05","23:53:38");
INSERT INTO auditoria VALUES("108","127.0.0.1","admin","2015-11-08","22:14:29");
INSERT INTO auditoria VALUES("109","186.16.7.237","admin","2015-11-09","10:27:36");
INSERT INTO auditoria VALUES("110","127.0.0.1","admin","2015-11-12","12:36:00");
INSERT INTO auditoria VALUES("111","127.0.0.1","admin","2015-11-13","00:24:09");
INSERT INTO auditoria VALUES("112","127.0.0.1","admin","2015-11-13","09:20:12");
INSERT INTO auditoria VALUES("113","192.168.0.6","admin","2015-11-13","10:54:26");
INSERT INTO auditoria VALUES("114","127.0.0.1","admin","2015-11-13","12:47:15");
INSERT INTO auditoria VALUES("115","127.0.0.1","admin","2015-11-13","14:41:47");
INSERT INTO auditoria VALUES("116","127.0.0.1","admin","2015-11-13","14:42:08");
INSERT INTO auditoria VALUES("117","127.0.0.1","admin","2015-11-13","14:43:20");
INSERT INTO auditoria VALUES("118","127.0.0.1","admin","2015-11-13","14:44:25");
INSERT INTO auditoria VALUES("119","127.0.0.1","admin","2015-11-13","14:44:46");
INSERT INTO auditoria VALUES("120","127.0.0.1","admin","2015-11-13","14:45:20");
INSERT INTO auditoria VALUES("121","127.0.0.1","admin","2015-11-13","14:50:44");
INSERT INTO auditoria VALUES("122","127.0.0.1","admin","2015-11-13","15:10:39");
INSERT INTO auditoria VALUES("123","127.0.0.1","admin","2015-11-13","15:11:14");
INSERT INTO auditoria VALUES("124","127.0.0.1","admin","2015-11-13","15:23:56");
INSERT INTO auditoria VALUES("125","127.0.0.1","admin","2015-11-13","15:25:49");
INSERT INTO auditoria VALUES("126","127.0.0.1","admin","2015-11-13","15:28:07");
INSERT INTO auditoria VALUES("127","127.0.0.1","admin","2015-11-13","15:30:42");
INSERT INTO auditoria VALUES("128","127.0.0.1","admin","2015-11-13","15:51:31");
INSERT INTO auditoria VALUES("129","127.0.0.1","admin","2015-11-13","20:36:48");
INSERT INTO auditoria VALUES("130","127.0.0.1","admin","2015-11-13","21:23:36");
INSERT INTO auditoria VALUES("131","127.0.0.1","admin","2015-11-13","22:47:48");
INSERT INTO auditoria VALUES("132","127.0.0.1","admin","2015-11-14","00:06:35");
INSERT INTO auditoria VALUES("133","127.0.0.1","admin","2015-11-14","12:09:03");
INSERT INTO auditoria VALUES("134","127.0.0.1","admin","2015-11-14","15:47:20");
INSERT INTO auditoria VALUES("135","127.0.0.1","admin","2015-11-14","15:50:35");
INSERT INTO auditoria VALUES("136","127.0.0.1","admin","2015-11-14","15:51:07");
INSERT INTO auditoria VALUES("137","127.0.0.1","admin","2015-11-14","15:51:29");
INSERT INTO auditoria VALUES("138","127.0.0.1","admin","2015-11-14","15:52:42");
INSERT INTO auditoria VALUES("139","127.0.0.1","admin","2015-11-14","17:49:27");
INSERT INTO auditoria VALUES("140","127.0.0.1","admin","2015-11-14","17:49:53");
INSERT INTO auditoria VALUES("141","127.0.0.1","admin","2015-11-14","17:50:07");
INSERT INTO auditoria VALUES("142","127.0.0.1","admin","2015-11-19","19:00:33");
INSERT INTO auditoria VALUES("143","127.0.0.1","admin","2015-11-19","19:55:03");
INSERT INTO auditoria VALUES("144","127.0.0.1","admin","2015-11-19","20:29:43");
INSERT INTO auditoria VALUES("145","127.0.0.1","admin","2015-11-19","21:18:50");
INSERT INTO auditoria VALUES("146","127.0.0.1","admin","2015-11-19","21:19:24");
INSERT INTO auditoria VALUES("147","127.0.0.1","admin","2015-11-19","21:44:29");
INSERT INTO auditoria VALUES("148","127.0.0.1","cajero","2015-11-19","23:15:59");
INSERT INTO auditoria VALUES("149","127.0.0.1","admin","2015-11-20","11:04:23");
INSERT INTO auditoria VALUES("150","127.0.0.1","admin","2015-11-20","11:18:44");
INSERT INTO auditoria VALUES("151","127.0.0.1","admin","2015-11-20","13:45:16");
INSERT INTO auditoria VALUES("152","127.0.0.1","admin","2015-11-20","15:15:55");
INSERT INTO auditoria VALUES("153","127.0.0.1","admin","2015-11-20","15:16:09");
INSERT INTO auditoria VALUES("154","127.0.0.1","admin","2015-11-20","15:16:30");
INSERT INTO auditoria VALUES("155","127.0.0.1","admin","2015-11-20","15:16:43");
INSERT INTO auditoria VALUES("156","127.0.0.1","admin","2015-11-21","12:29:55");
INSERT INTO auditoria VALUES("157","127.0.0.1","admin","2015-11-22","11:53:13");
INSERT INTO auditoria VALUES("158","127.0.0.1","admin","2015-11-23","18:50:50");
INSERT INTO auditoria VALUES("159","127.0.0.1","admin","2015-11-23","18:52:12");
INSERT INTO auditoria VALUES("160","127.0.0.1","admin","2015-11-25","09:50:46");
INSERT INTO auditoria VALUES("161","127.0.0.1","admin","2015-11-25","11:33:10");
INSERT INTO auditoria VALUES("162","127.0.0.1","admin","2015-11-25","12:16:10");
INSERT INTO auditoria VALUES("163","127.0.0.1","admin","2015-11-25","12:22:45");
INSERT INTO auditoria VALUES("164","127.0.0.1","admin","2015-11-25","12:23:35");
INSERT INTO auditoria VALUES("165","127.0.0.1","admin","2015-11-25","12:26:02");
INSERT INTO auditoria VALUES("166","127.0.0.1","admin","2015-11-25","14:57:49");
INSERT INTO auditoria VALUES("167","127.0.0.1","admin","2015-11-25","16:41:49");
INSERT INTO auditoria VALUES("168","127.0.0.1","admin","2015-11-25","18:23:08");
INSERT INTO auditoria VALUES("169","127.0.0.1","admin","2015-11-25","18:36:00");
INSERT INTO auditoria VALUES("170","127.0.0.1","admin","2015-11-26","12:33:19");
INSERT INTO auditoria VALUES("171","127.0.0.1","admin","2015-11-26","18:48:40");
INSERT INTO auditoria VALUES("172","127.0.0.1","admin","2015-11-29","12:46:07");
INSERT INTO auditoria VALUES("173","127.0.0.1","admin","2015-11-29","12:46:46");
INSERT INTO auditoria VALUES("174","127.0.0.1","admin","2015-12-29","13:28:46");
INSERT INTO auditoria VALUES("175","127.0.0.1","admin","2015-12-29","19:34:33");
INSERT INTO auditoria VALUES("176","127.0.0.1","admin","2016-02-04","20:36:31");
INSERT INTO auditoria VALUES("177","127.0.0.1","admin","2016-02-04","20:41:35");
INSERT INTO auditoria VALUES("178","127.0.0.1","admin","2016-02-06","11:29:35");
INSERT INTO auditoria VALUES("179","181.120.244.199","admin","2016-02-22","19:11:02");
INSERT INTO auditoria VALUES("180","181.120.244.199","admin","2016-02-22","19:13:19");
INSERT INTO auditoria VALUES("181","179.184.6.209","Admin","2016-02-22","19:14:22");
INSERT INTO auditoria VALUES("182","127.0.0.1","admin","2016-02-22","19:35:50");
INSERT INTO auditoria VALUES("183","127.0.0.1","admin","2016-05-30","10:46:11");
INSERT INTO auditoria VALUES("184","192.168.5.37","admin","2016-05-30","10:50:27");
INSERT INTO auditoria VALUES("185","192.168.5.37","admin","2016-05-30","11:53:34");
INSERT INTO auditoria VALUES("186","190.23.92.245","admin","2016-05-31","15:02:21");


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

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `bajas_view` AS (select `bajas`.`prd_cod` AS `prd_cod`,`bajas`.`pro_cod` AS `pro_cod`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `pro_des`,(select `productos`.`par_cod` AS `par_cod` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `par_cod`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `bajas`.`pro_cod`)) AS `fam_cod`,`bajas`.`prd_can` AS `prd_can`,`bajas`.`prd_fec` AS `prd_fec`,`bajas`.`fecha` AS `fecha`,`bajas`.`hora` AS `hora`,`bajas`.`usuario` AS `usuario`,`bajas`.`borrado` AS `borrado` from `bajas`);



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

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `bancos_view` AS (select `bancos`.`ban_cod` AS `ban_cod`,`bancos`.`ban_des` AS `ban_des`,`bancos`.`ban_nro` AS `ban_nro`,`bancos`.`tcu_cod` AS `tcu_cod`,`bancos`.`tmo_cod` AS `tmo_cod`,`bancos`.`fecha` AS `fecha`,`bancos`.`hora` AS `hora`,`bancos`.`usuario` AS `usuario`,`bancos`.`borrado` AS `borrado`,(select `tipo_cuenta`.`tcu_des` AS `tcu_des` from `tipo_cuenta` where (`tipo_cuenta`.`tcu_cod` = `bancos`.`tcu_cod`)) AS `tcu_des`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `bancos`.`tmo_cod`)) AS `tmo_des` from `bancos`);



DROP TABLE IF EXISTS caja_diaria;

CREATE TABLE `caja_diaria` (
  `caj_cod` int(11) NOT NULL,
  `caj_des` varchar(255) DEFAULT NULL,
  `caj_ing` int(11) DEFAULT NULL,
  `caj_sal` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`caj_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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

INSERT INTO clientes VALUES("1","CLIENTE OCACIONAL","--","--","--","--","4","3","0","2015-11-25","15:33:05","1","0");
INSERT INTO clientes VALUES("2","GGGG","--","--","--","--","4","3","0","2015-10-05","23:22:21","1","0");
INSERT INTO clientes VALUES("3","QQQQ","--","--","--","--","4","3","0","2015-10-05","23:31:36","1","0");
INSERT INTO clientes VALUES("4","ASASS","--","--","--","--","1","3","0","2015-11-14","13:10:01","1","0");
INSERT INTO clientes VALUES("5","PPP","--","--","--","--","4","3","0","2015-10-05","23:32:51","1","0");
INSERT INTO clientes VALUES("6","ASFFASF","--","--","--","--","4","3","0","2015-10-05","23:33:21","1","0");
INSERT INTO clientes VALUES("7","KKKKK","--","--","--","--","4","3","0","2015-10-05","23:33:27","1","0");
INSERT INTO clientes VALUES("8","HFFHFHFH","--","--","--","--","4","3","0","2015-10-05","23:42:47","1","0");
INSERT INTO clientes VALUES("9","KKKKK","--","--","--","--","4","3","0","2015-10-05","23:49:47","1","0");
INSERT INTO clientes VALUES("10","ARIEL","3219801","--","--","--","2","1","1","2016-05-31","15:03:20","1","0");
INSERT INTO clientes VALUES("11","FGSDFG","--","--","--","--","4","3","0","2015-10-06","00:32:35","1","0");
INSERT INTO clientes VALUES("12","JORGE","--","--","--","--","4","3","0","2015-11-21","17:39:15","1","0");
INSERT INTO clientes VALUES("13","TTTTT","--","--","--","--","4","3","0","2015-11-13","12:56:40","1","0");
INSERT INTO clientes VALUES("14","EEEEEEE","--","--","--","--","4","3","0","2015-11-13","13:12:32","1","0");
INSERT INTO clientes VALUES("15","SDSDSD","--","--","--","--","4","3","0","2015-11-13","13:00:44","1","0");
INSERT INTO clientes VALUES("16","JJJJJJ","--","--","--","--","4","3","0","2015-11-13","13:01:08","1","0");
INSERT INTO clientes VALUES("17","RRRRRR","--","--","--","--","4","3","0","2015-11-13","13:01:32","1","0");
INSERT INTO clientes VALUES("18","YYYYYY","--","--","--","--","4","3","0","2015-11-13","13:01:44","1","0");
INSERT INTO clientes VALUES("19","MMMMMMMM","--","--","--","--","4","3","0","2015-11-13","13:02:24","1","0");
INSERT INTO clientes VALUES("20","JORGE RAMON","3129809","--","--","--","4","3","0","2015-11-14","12:20:55","1","0");
INSERT INTO clientes VALUES("21","RAMON GALLARDO","--","--","--","--","4","3","0","2015-11-14","14:19:23","1","0");
INSERT INTO clientes VALUES("22","JORGE ESCOBAR","3219801-9","--","--","--","4","3","0","2015-11-14","14:20:36","1","0");
INSERT INTO clientes VALUES("23","RICARDO BUSE","899988-1","--","--","--","4","3","0","2015-11-14","14:31:30","1","0");


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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO clientes_det VALUES("1","10","32191","arielruiz","11","1","2015-11-14","13:45:49","1","1");
INSERT INTO clientes_det VALUES("3","10","3219806","andres raul ruiz diaz","0984121669","-","2015-11-14","13:51:46","1","1");
INSERT INTO clientes_det VALUES("4","10","321989002112","jorge ramirez","-","-","2015-11-14","13:53:23","1","1");
INSERT INTO clientes_det VALUES("5","10","80111/1","roque santacruz","0984121669","roque@tigo.com.py","2015-11-14","13:58:23","1","0");
INSERT INTO clientes_det VALUES("6","10","3499175","cinthia martinez","0982692120","cinthilore_m@hotmail.com","2015-11-14","13:58:47","1","0");
INSERT INTO clientes_det VALUES("7","10","21211","ASDFASDFASF","-","-","2015-11-14","14:11:25","1","1");
INSERT INTO clientes_det VALUES("8","21","--","RAMON GALLARDO","--","--","2015-11-14","14:19:23","1","0");
INSERT INTO clientes_det VALUES("9","22","3219801-9","JORGE ESCOBAR","--","--","2015-11-14","14:20:04","1","0");
INSERT INTO clientes_det VALUES("10","22","777555","ROQUE GONZALEZ","0982692120","rg@hotmail.com","2015-11-14","14:21:02","1","0");
INSERT INTO clientes_det VALUES("11","23","899988-1","RICARDO BUSE","--","--","2015-11-14","14:31:30","1","0");
INSERT INTO clientes_det VALUES("12","23","4999861","JOSE BOGADO","0982692120","jbogado@hotmail.com","2015-11-14","14:31:53","1","0");


DROP TABLE IF EXISTS clientes_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `clientes_view` AS (select `clientes`.`cli_cod` AS `cli_cod`,`clientes`.`cli_des` AS `cli_des`,`clientes`.`cli_ruc` AS `cli_ruc`,`clientes`.`cli_dir` AS `cli_dir`,`clientes`.`cli_tel` AS `cli_tel`,`clientes`.`cli_mai` AS `cli_mai`,`clientes`.`med_cod` AS `med_cod`,`clientes`.`tic_cod` AS `tic_cod`,`clientes`.`cli_par` AS `cli_par`,`clientes`.`fecha` AS `fecha`,`clientes`.`hora` AS `hora`,`clientes`.`usuario` AS `usuario`,`clientes`.`borrado` AS `borrado`,(select `tipo_cliente`.`tic_des` AS `tic_des` from `tipo_cliente` where (`tipo_cliente`.`tic_cod` = `clientes`.`tic_cod`)) AS `tic_des`,(select `tipo_cliente`.`tic_por` AS `tic_por` from `tipo_cliente` where (`tipo_cliente`.`tic_cod` = `clientes`.`tic_cod`)) AS `tic_por`,(select `medios`.`med_des` AS `med_des` from `medios` where (`medios`.`med_cod` = `clientes`.`med_cod`)) AS `med_des` from `clientes`);

INSERT INTO clientes_view VALUES("1","CLIENTE OCACIONAL","--","--","--","--","4","3","0","2015-11-25","15:33:05","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("2","GGGG","--","--","--","--","4","3","0","2015-10-05","23:22:21","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("3","QQQQ","--","--","--","--","4","3","0","2015-10-05","23:31:36","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("4","ASASS","--","--","--","--","1","3","0","2015-11-14","13:10:01","1","0","ESTANDAR","0","OTROS");
INSERT INTO clientes_view VALUES("5","PPP","--","--","--","--","4","3","0","2015-10-05","23:32:51","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("6","ASFFASF","--","--","--","--","4","3","0","2015-10-05","23:33:21","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("7","KKKKK","--","--","--","--","4","3","0","2015-10-05","23:33:27","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("8","HFFHFHFH","--","--","--","--","4","3","0","2015-10-05","23:42:47","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("9","KKKKK","--","--","--","--","4","3","0","2015-10-05","23:49:47","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("10","ARIEL","3219801","--","--","--","2","1","1","2016-05-31","15:03:20","1","0","MAYORISTAS","10","PROPIOS MEDIOS");
INSERT INTO clientes_view VALUES("11","FGSDFG","--","--","--","--","4","3","0","2015-10-06","00:32:35","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("12","JORGE","--","--","--","--","4","3","0","2015-11-21","17:39:15","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("13","TTTTT","--","--","--","--","4","3","0","2015-11-13","12:56:40","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("14","EEEEEEE","--","--","--","--","4","3","0","2015-11-13","13:12:32","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("15","SDSDSD","--","--","--","--","4","3","0","2015-11-13","13:00:44","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("16","JJJJJJ","--","--","--","--","4","3","0","2015-11-13","13:01:08","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("17","RRRRRR","--","--","--","--","4","3","0","2015-11-13","13:01:32","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("18","YYYYYY","--","--","--","--","4","3","0","2015-11-13","13:01:44","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("19","MMMMMMMM","--","--","--","--","4","3","0","2015-11-13","13:02:24","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("20","JORGE RAMON","3129809","--","--","--","4","3","0","2015-11-14","12:20:55","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("21","RAMON GALLARDO","--","--","--","--","4","3","0","2015-11-14","14:19:23","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("22","JORGE ESCOBAR","3219801-9","--","--","--","4","3","0","2015-11-14","14:20:36","1","0","ESTANDAR","0","FACEBOOK");
INSERT INTO clientes_view VALUES("23","RICARDO BUSE","899988-1","--","--","--","4","3","0","2015-11-14","14:31:30","1","0","ESTANDAR","0","FACEBOOK");


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO cobros VALUES("1","39","10","300000","1700000","2015-10-19","18:33:12","1","0");
INSERT INTO cobros VALUES("2","37","1","75000","0","2015-10-19","18:34:13","1","0");


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

INSERT INTO compra_cab VALUES("1","01-01","0","1","1","1","1","1","2000","0","2000","2000","0","0","1","0","2015-10-10","21:56:51","1","0");
INSERT INTO compra_cab VALUES("2","0101","0","1","1","2","1","1","10000","0","10000","10000","0","0","1","10000","2015-10-11","22:03:37","1","0");
INSERT INTO compra_cab VALUES("3","001","0","1","1","1","1","1","2444444","0","3000000","2444444","0","0","1","0","2015-10-19","23:32:24","1","0");
INSERT INTO compra_cab VALUES("4","5546546","0","1","","","","","","","","","0","0","0","","2015-10-22","15:32:36","1","0");
INSERT INTO compra_cab VALUES("5","4545345","0","1","","","","","","","","","0","0","0","","2015-10-22","15:46:22","1","0");


DROP TABLE IF EXISTS compra_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `compra_cab_view` AS (select `compra_cab`.`fac_cod` AS `fac_cod`,`compra_cab`.`fac_num` AS `fac_num`,`compra_cab`.`ape_cod` AS `ape_cod`,`compra_cab`.`prv_cod` AS `prv_cod`,(select `proveedores`.`prv_des` AS `prv_des` from `proveedores` where (`proveedores`.`prv_cod` = `compra_cab`.`prv_cod`)) AS `prv_des`,(select `proveedores`.`prv_ruc` AS `prv_ruc` from `proveedores` where (`proveedores`.`prv_cod` = `compra_cab`.`prv_cod`)) AS `prv_ruc`,`compra_cab`.`mpg_cod` AS `mpg_cod`,(select `medios_pago`.`mpg_des` AS `mpg_des` from `medios_pago` where (`medios_pago`.`mpg_cod` = `compra_cab`.`mpg_cod`)) AS `mpg_des`,`compra_cab`.`for_cod` AS `for_cod`,(select `formas_pago`.`for_des` AS `for_des` from `formas_pago` where (`formas_pago`.`for_cod` = `compra_cab`.`for_cod`)) AS `for_des`,`compra_cab`.`tmo_cod` AS `tmo_cod`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `compra_cab`.`tmo_cod`)) AS `tmo_des`,`compra_cab`.`cot_cod` AS `cot_cod`,`compra_cab`.`cot_mon` AS `cot_mon`,`compra_cab`.`tie_cod` AS `tie_cod`,(select `tipo_envio`.`tie_des` AS `tie_des` from `tipo_envio` where (`tipo_envio`.`tie_cod` = `compra_cab`.`tie_cod`)) AS `tie_des`,`compra_cab`.`fac_imp` AS `fac_imp`,replace(format(`compra_cab`.`fac_tot`,0),',','.') AS `fac_tot_1`,`compra_cab`.`fac_tot` AS `fac_tot`,`compra_cab`.`aps_cod` AS `aps_cod`,format(`compra_cab`.`cot_mon`,0) AS `cot_mon_1`,`compra_cab`.`mes_cod` AS `mes_cod`,(select `mesas`.`mes_des` AS `mes_des` from `mesas` where (`mesas`.`mes_cod` = `compra_cab`.`mes_cod`)) AS `mes_des`,`compra_cab`.`fac_est` AS `fac_est`,(case when (`compra_cab`.`fac_est` = 0) then _utf8'Pendiente' else _utf8'Cerrado' end) AS `estado`,`compra_cab`.`fac_sal` AS `fac_sal`,`compra_cab`.`fecha` AS `fecha`,`compra_cab`.`hora` AS `hora`,`compra_cab`.`usuario` AS `usuario`,`compra_cab`.`borrado` AS `borrado` from `compra_cab`);

INSERT INTO compra_cab_view VALUES("1","01-01","0","1","COCA COLA","800-00","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2000","0","","2000","2.000","2000","0","2,000","0","FACTURACION","1","Cerrado","0","2015-10-10","21:56:51","1","0");
INSERT INTO compra_cab_view VALUES("2","0101","0","1","COCA COLA","800-00","1","EFECTIVO","2","CREDITO","1","GUARANIES","1","10000","0","","10000","10.000","10000","0","10,000","0","FACTURACION","1","Cerrado","10000","2015-10-11","22:03:37","1","0");
INSERT INTO compra_cab_view VALUES("3","001","0","1","COCA COLA","800-00","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2444444","0","","3000000","2.444.444","2444444","0","2,444,444","0","FACTURACION","1","Cerrado","0","2015-10-19","23:32:24","1","0");
INSERT INTO compra_cab_view VALUES("4","5546546","0","1","COCA COLA","800-00","","","","","","","","","","","","","","0","","0","FACTURACION","0","Pendiente","","2015-10-22","15:32:36","1","0");
INSERT INTO compra_cab_view VALUES("5","4545345","0","1","COCA COLA","800-00","","","","","","","","","","","","","","0","","0","FACTURACION","0","Pendiente","","2015-10-22","15:46:22","1","0");


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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO compra_det VALUES("1","0","1","1","1","0","35000.56","0","0","2015-10-10","21:56:05","1","1");
INSERT INTO compra_det VALUES("2","0","1","1","1","2000","2000","0","0","2015-10-10","21:56:36","1","0");
INSERT INTO compra_det VALUES("3","0","2","1","2","2000","4000","0","0","2015-10-11","22:03:16","1","0");
INSERT INTO compra_det VALUES("4","0","2","1","3","2000","6000","0","0","2015-10-11","22:03:21","1","0");
INSERT INTO compra_det VALUES("5","0","3","2","2","1222222","2444444","0","0","2015-10-19","23:29:22","1","0");
INSERT INTO compra_det VALUES("6","0","4","1","10","2000","20000","0","0","2015-10-22","15:32:36","1","0");
INSERT INTO compra_det VALUES("7","0","4","2","1","1500000","1500000","0","0","2015-10-22","15:33:40","1","0");
INSERT INTO compra_det VALUES("8","0","5","2","1","1450000","1450000","0","0","2015-10-22","15:46:22","1","0");
INSERT INTO compra_det VALUES("9","0","5","2","10","1450000","14500000","0","0","2015-10-22","15:53:10","1","0");


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

INSERT INTO cotizaciones VALUES("1","2","5500","5600","2015-10-22","15:14:07","1","0");
INSERT INTO cotizaciones VALUES("2","3","1500","1500","2015-10-22","15:59:21","1","0");


DROP TABLE IF EXISTS cotizaciones_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `cotizaciones_view` AS (select `cotizaciones`.`cot_cod` AS `cot_cod`,`cotizaciones`.`tmo_cod` AS `tmo_cod`,`cotizaciones`.`cot_com` AS `cot_com`,`cotizaciones`.`cot_ven` AS `cot_ven`,`cotizaciones`.`fecha` AS `fecha`,`cotizaciones`.`hora` AS `hora`,`cotizaciones`.`usuario` AS `usuario`,`cotizaciones`.`borrado` AS `borrado`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `cotizaciones`.`tmo_cod`)) AS `tmo_des` from `cotizaciones`);

INSERT INTO cotizaciones_view VALUES("1","2","5500","5600","2015-10-22","15:14:07","1","0","DOLARES");
INSERT INTO cotizaciones_view VALUES("2","3","1500","1500","2015-10-22","15:59:21","1","0","REAL");


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

INSERT INTO depositos VALUES("1","DEPOSITO 1","1","2015-10-08","10:37:41","1","0");
INSERT INTO depositos VALUES("2","DEPOSITO 2","1","2015-10-08","11:11:05","1","0");
INSERT INTO depositos VALUES("3","DEPOSITO1","2","2015-10-19","22:22:53","1","0");


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
  `fac_num` varchar(20) DEFAULT NULL,
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

INSERT INTO factura_cab VALUES("1","0","1","1","1","1","1","1","1","2500","1","2500","2500","1","3","1","0","","2015-10-10","22:07:55","1","0");
INSERT INTO factura_cab VALUES("2","","1","1","1","","","","","","","","","1","4","1","","","2015-10-07","22:23:40","1","0");
INSERT INTO factura_cab VALUES("3","","1","1","1","","","","","","","","","1","1","1","","","2015-10-10","11:49:40","1","0");
INSERT INTO factura_cab VALUES("4","","1","1","1","","","","","","","","","1","1","1","","","2015-10-10","11:55:20","1","0");
INSERT INTO factura_cab VALUES("5","","1","1","1","","","","","","","","","1","1","1","","","2015-10-10","12:00:53","1","0");
INSERT INTO factura_cab VALUES("6","0","3","1","1","1","1","1","1","2500","1","3000","2500","1","2","1","0","","2015-10-10","22:17:48","2","1");
INSERT INTO factura_cab VALUES("7","0","2","1","1","1","1","1","1","7500","1","8000","7500","1","12","1","0","","2015-10-10","22:21:48","1","0");
INSERT INTO factura_cab VALUES("8","0","4","1","1","1","1","1","1","2500","1","2500","2500","1","1","1","0","","2015-10-11","12:01:27","1","0");
INSERT INTO factura_cab VALUES("9","0","4","1","1","1","1","1","1","7500","1","10000","7500","1","4","1","0","","2015-10-11","12:36:03","1","0");
INSERT INTO factura_cab VALUES("10","0","4","1","1","1","1","1","1","2500","1","25000","2500","1","3","1","0","","2015-10-11","13:24:08","1","0");
INSERT INTO factura_cab VALUES("11","0","4","1","1","1","1","1","1","2500","1","3000","2500","1","20","1","0","","2015-10-11","13:24:28","1","0");
INSERT INTO factura_cab VALUES("12","0","4","1","1","1","1","1","1","2500","1","3000","2500","1","11","1","0","","2015-10-11","13:24:20","1","0");
INSERT INTO factura_cab VALUES("13","0","4","1","1","1","1","1","1","10000","1","100000","10000","1","16","1","0","","2015-10-11","13:24:36","1","0");
INSERT INTO factura_cab VALUES("14","0","4","1","1","1","1","1","1","7500","1","8000","7500","1","1","1","0","","2015-10-11","12:45:29","1","1");
INSERT INTO factura_cab VALUES("15","0","4","1","1","1","1","1","1","2500","1","25000","2500","1","2","1","0","","2015-10-11","13:23:58","1","0");
INSERT INTO factura_cab VALUES("16","","4","1","1","","","","","","","","","1","1","1","","","2015-10-11","12:48:17","1","1");
INSERT INTO factura_cab VALUES("17","0","4","1","1","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-10-11","12:55:58","1","1");
INSERT INTO factura_cab VALUES("18","0","6","1","1","1","1","1","1","25000","1","30000","25000","1","1","1","0","","2015-10-11","13:26:48","1","0");
INSERT INTO factura_cab VALUES("19","0","6","1","1","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-10-11","13:27:01","1","0");
INSERT INTO factura_cab VALUES("20","0","6","1","1","1","1","1","1","2500","1","30000","2500","1","12","1","0","","2015-10-11","13:27:34","1","0");
INSERT INTO factura_cab VALUES("21","0","6","1","1","1","1","1","1","5000","1","10000","5000","1","7","1","0","","2015-10-11","13:27:18","1","0");
INSERT INTO factura_cab VALUES("22","0","6","1","1","1","1","1","1","2500","1","50000","2500","1","17","1","0","","2015-10-11","14:15:16","1","0");
INSERT INTO factura_cab VALUES("23","0","6","1","1","1","1","1","1","2500","1","3000","2500","1","21","1","0","","2015-10-11","13:27:28","1","0");
INSERT INTO factura_cab VALUES("24","0","6","1","1","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-10-11","14:14:58","1","0");
INSERT INTO factura_cab VALUES("25","","7","1","1","","","","","","","","","1","1","1","","","2015-10-11","23:48:41","1","1");
INSERT INTO factura_cab VALUES("26","0","7","1","1","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-10-11","23:50:56","1","0");
INSERT INTO factura_cab VALUES("27","0","7","1","1","1","1","1","1","17500","1","20000","17500","1","3","1","0","","2015-10-12","00:10:53","1","0");
INSERT INTO factura_cab VALUES("28","0","7","1","1","1","1","1","1","17500","1","20000","17500","1","2","1","0","","2015-10-12","00:58:11","1","0");
INSERT INTO factura_cab VALUES("29","0","7","1","1","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-10-12","01:03:23","1","0");
INSERT INTO factura_cab VALUES("30","0","7","1","1","1","1","1","1","7500","1","8000","7500","1","3","1","0","","2015-10-12","01:12:41","1","0");
INSERT INTO factura_cab VALUES("31","0","7","12","1","1","1","1","1","17500","1","2000","17500","1","3","1","0","","2015-10-12","01:15:19","1","0");
INSERT INTO factura_cab VALUES("32","0","7","1","1","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-10-12","01:19:41","1","0");
INSERT INTO factura_cab VALUES("33","0","7","1","1","1","1","1","1","10000","1","10000","10000","1","10","1","0","","2015-10-12","01:31:08","1","0");
INSERT INTO factura_cab VALUES("34","0","7","1","1","1","1","1","1","12500","1","15000","12500","1","3","1","0","","2015-10-12","01:24:20","1","0");
INSERT INTO factura_cab VALUES("35","0","8","1","1","1","1","1","1","7500","1","8000","7500","1","3","1","0","","2015-10-12","21:04:43","1","0");
INSERT INTO factura_cab VALUES("36","0","8","1","1","1","1","2","1","0.89","2","893","5000","1","4","1","0","","2015-10-12","21:05:39","1","0");
INSERT INTO factura_cab VALUES("37","0","9","1","1","1","2","1","1","75000","1","100000","75000","1","1","1","0","","2015-10-19","17:56:56","1","0");
INSERT INTO factura_cab VALUES("38","0","10","1","1","1","1","1","1","4000000","1","5000000","4000000","1","1","1","0","","2015-10-19","18:03:54","1","0");
INSERT INTO factura_cab VALUES("39","0","10","10","1","1","1","1","1","2000000","1","2000000","2000000","1","1","1","0","fgfgfgfg","2015-10-19","22:35:33","1","0");
INSERT INTO factura_cab VALUES("40","","10","1","1","","","","","","","","","1","1","1","","","2015-10-19","23:00:02","1","0");
INSERT INTO factura_cab VALUES("41","0","10","1","1","1","1","1","1","2500","1","25000","2500","1","3","1","0","","2015-10-20","23:46:10","1","0");
INSERT INTO factura_cab VALUES("42","","10","10","1","","","","","","","","","1","1","1","","","2015-10-20","21:26:14","1","0");
INSERT INTO factura_cab VALUES("43","","10","10","1","","","","","","","","","1","1","1","","","2015-10-20","21:42:56","1","0");
INSERT INTO factura_cab VALUES("44","0","10","10","1","1","1","1","1","1800000","1","1800000","1800000","1","1","1","0","","2015-10-20","21:44:01","1","0");
INSERT INTO factura_cab VALUES("45","","10","1","1","","","","","","","","","1","1","1","","","2015-10-20","22:11:18","1","0");
INSERT INTO factura_cab VALUES("46","","10","10","1","","","","","","","","","1","1","1","","","2015-10-20","23:07:56","1","0");
INSERT INTO factura_cab VALUES("47","","10","1","1","","","","","","","","","1","1","1","","","2015-10-20","23:08:21","1","0");
INSERT INTO factura_cab VALUES("48","","10","10","1","","","","","","","","","1","1","1","","","2015-10-20","23:09:13","1","0");
INSERT INTO factura_cab VALUES("49","","10","1","1","","","","","","","","","1","1","1","","","2015-10-20","23:09:34","1","0");
INSERT INTO factura_cab VALUES("50","","10","10","1","","","","","","","","","1","1","1","","","2015-10-20","23:36:25","1","0");
INSERT INTO factura_cab VALUES("51","","10","10","1","","","","","","","","","1","1","1","","","2015-10-20","23:36:48","1","0");
INSERT INTO factura_cab VALUES("52","","10","10","1","","","","","","","","","1","1","1","","","2015-10-20","23:37:56","1","0");
INSERT INTO factura_cab VALUES("53","","10","10","1","","","","","","","","","1","1","1","","","2015-10-20","23:38:40","1","0");
INSERT INTO factura_cab VALUES("54","","10","1","1","","","","","","","","","1","1","1","","","2015-10-20","23:39:09","1","0");
INSERT INTO factura_cab VALUES("55","","10","1","1","","","","","","","","","1","1","1","","","2015-10-20","23:39:28","1","0");
INSERT INTO factura_cab VALUES("56","","10","1","1","","","","","","","","","1","1","1","","","2015-10-20","23:42:12","1","0");
INSERT INTO factura_cab VALUES("57","","10","1","1","","","","","","","","","1","1","1","","","2015-10-20","23:42:20","1","0");
INSERT INTO factura_cab VALUES("58","","10","1","1","","","","","","","","","1","1","1","","","2015-10-20","23:44:16","1","0");
INSERT INTO factura_cab VALUES("59","0","10","1","1","1","1","1","1","15000","1","15000","15000","1","1","1","0","","2015-10-20","23:45:19","1","0");
INSERT INTO factura_cab VALUES("60","0","10","1","1","1","1","1","1","2000000","1","20000000","2000000","1","1","1","0","","2015-10-27","16:43:45","1","0");
INSERT INTO factura_cab VALUES("61","0","10","1","1","1","1","2","1","357.14","1","400","2000000","1","2","1","0","","2015-10-22","15:57:18","1","0");
INSERT INTO factura_cab VALUES("62","0","10","1","1","1","1","1","1","2000000","1","2100000","2000000","1","3","1","0","","2015-10-22","16:01:10","1","0");
INSERT INTO factura_cab VALUES("63","0","10","1","1","1","1","1","1","5000","1","7000","5000","1","2","1","0","","2015-10-27","16:44:21","1","0");
INSERT INTO factura_cab VALUES("64","0","10","1","1","1","1","1","1","5000","1","6000","5000","1","18","1","0","","2015-10-27","16:44:11","1","0");
INSERT INTO factura_cab VALUES("65","0","10","1","1","1","1","1","1","14000","1","15000","14000","1","4","1","0","","2015-10-27","16:43:55","1","0");
INSERT INTO factura_cab VALUES("66","0","10","1","1","1","1","1","1","7500","1","10000","7500","1","12","1","0","","2015-10-27","16:44:03","1","0");
INSERT INTO factura_cab VALUES("67","0","10","1","1","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-10-27","20:03:00","1","0");
INSERT INTO factura_cab VALUES("68","0","10","1","1","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-10-27","20:22:43","1","0");
INSERT INTO factura_cab VALUES("69","0","10","1","1","1","1","1","1","2500","1","30000","2500","1","12","1","0","","2015-10-27","20:23:59","1","0");
INSERT INTO factura_cab VALUES("70","0","10","1","1","1","1","1","1","15500","1","20000","15500","1","18","1","0","","2015-10-27","20:25:21","1","0");
INSERT INTO factura_cab VALUES("71","0","10","1","1","1","1","1","1","2500","1","30000","2500","1","3","1","0","","2015-10-27","21:21:15","1","0");
INSERT INTO factura_cab VALUES("72","0","10","1","1","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-10-27","21:25:22","1","0");
INSERT INTO factura_cab VALUES("73","0","10","1","1","1","1","1","1","22000","1","23000","22000","1","1","1","0","","2015-10-28","00:58:42","1","0");
INSERT INTO factura_cab VALUES("74","0","10","1","1","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-10-28","00:58:55","1","0");
INSERT INTO factura_cab VALUES("75","0","10","1","1","1","1","1","1","2500","1","30000","2500","1","6","1","0","","2015-10-28","01:00:54","1","0");
INSERT INTO factura_cab VALUES("76","","10","1","1","","","","","","","","","1","1","1","","","2015-10-28","01:01:48","1","0");
INSERT INTO factura_cab VALUES("77","","10","1","1","","","","","","","","","1","2","1","","","2015-10-28","01:51:02","1","0");
INSERT INTO factura_cab VALUES("78","","10","1","1","","","","","","","","","1","3","1","","","2015-10-28","01:52:04","1","0");
INSERT INTO factura_cab VALUES("79","","10","1","1","","","","","","","","","1","1","1","","","2015-10-28","01:54:27","1","0");
INSERT INTO factura_cab VALUES("80","","10","1","1","","","","","","","","","1","2","1","","","2015-10-28","01:54:31","1","0");
INSERT INTO factura_cab VALUES("81","","10","1","1","","","","","","","","","1","3","1","","","2015-10-28","01:54:34","1","0");
INSERT INTO factura_cab VALUES("82","0","10","1","1","1","1","1","1","5000","1","5000","5000","1","3","1","0","","2015-11-12","17:49:43","1","0");
INSERT INTO factura_cab VALUES("83","0","10","10","1","1","1","1","1","13500","1","15000","13500","1","1","1","0","","2015-11-12","17:49:26","1","0");
INSERT INTO factura_cab VALUES("84","0","10","1","1","1","1","1","1","13500","1","15000","13500","1","11","1","0","","2015-11-12","17:51:17","1","0");
INSERT INTO factura_cab VALUES("85","0","10","1","1","1","1","1","1","2500","1","3000","2500","1","13","1","0","","2015-11-12","17:51:27","1","0");
INSERT INTO factura_cab VALUES("86","","10","1","1","","","","","","","","","1","1","1","","","2015-11-12","17:54:46","1","0");
INSERT INTO factura_cab VALUES("87","","10","1","1","","","","","","","","","1","2","1","","","2015-11-12","17:55:07","1","0");
INSERT INTO factura_cab VALUES("88","","10","1","1","","","","","","","","","1","1","1","","","2015-11-12","18:01:38","1","0");
INSERT INTO factura_cab VALUES("89","0","10","1","1","1","1","1","1","16000","1","17000","16000","1","3","1","0","","2015-11-13","00:19:39","1","0");
INSERT INTO factura_cab VALUES("90","","10","1","1","","","","","","","","","1","1","1","","","2015-11-13","00:13:57","1","0");
INSERT INTO factura_cab VALUES("91","0","10","1","1","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-19","20:53:22","1","0");
INSERT INTO factura_cab VALUES("92","0","10","1","1","1","1","1","1","2500","1","0","2500","1","2","1","0","","2015-11-19","20:53:33","1","0");
INSERT INTO factura_cab VALUES("93","","10","1","1","","","","","","","","","1","5","1","","","2015-11-13","16:44:31","1","0");
INSERT INTO factura_cab VALUES("94","0","10","1","1","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-14","12:19:58","1","0");
INSERT INTO factura_cab VALUES("95","0","10","1","1","1","1","1","1","2500","1","1000","2500","1","1","1","0","","2015-11-19","20:53:48","1","0");
INSERT INTO factura_cab VALUES("96","","","","","","","","","","","","","","","1","","","","","","");
INSERT INTO factura_cab VALUES("97","0","12","1","","1","1","1","1","5000","1","50000","5000","1","3","1","0","","2015-11-19","21:55:49","1","0");
INSERT INTO factura_cab VALUES("98","0","12","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-19","21:55:42","1","0");
INSERT INTO factura_cab VALUES("99","0","12","1","","1","1","1","1","2500","1","3000","2500","1","5","1","0","","2015-11-19","21:55:29","1","0");
INSERT INTO factura_cab VALUES("100","0","12","1","","1","1","1","1","2500","1","3000","2500","1","6","1","0","","2015-11-19","21:55:23","1","0");
INSERT INTO factura_cab VALUES("101","","12","1","","","","","","","","","","1","4","1","","","2015-11-19","22:20:15","1","1");
INSERT INTO factura_cab VALUES("102","","12","1","","","","","","","","","","1","5","1","","","2015-11-19","22:20:25","1","1");
INSERT INTO factura_cab VALUES("103","","12","1","","","","","","","","","","1","6","1","","","2015-11-19","22:40:03","1","1");
INSERT INTO factura_cab VALUES("104","","12","1","","","","","","","","","","1","3","1","","","2015-11-19","22:41:00","1","1");
INSERT INTO factura_cab VALUES("105","","12","1","","","","","","","","","","1","2","1","","","2015-11-19","22:41:54","1","1");
INSERT INTO factura_cab VALUES("106","","12","1","","","","","","","","","","1","7","1","","","2015-11-19","22:49:39","1","1");
INSERT INTO factura_cab VALUES("107","","12","1","","","","","","","","","","1","7","1","","","2015-11-19","22:55:48","1","1");
INSERT INTO factura_cab VALUES("108","","12","1","","","","","","","","","","1","7","1","","","2015-11-19","22:55:52","1","1");
INSERT INTO factura_cab VALUES("109","","12","1","","","","","","","","","","1","2","1","","","2015-11-19","22:56:15","1","1");
INSERT INTO factura_cab VALUES("110","","12","1","","","","","","","","","","1","2","1","","","2015-11-19","22:56:45","1","1");
INSERT INTO factura_cab VALUES("111","","12","1","","","","","","","","","","1","2","1","","","2015-11-19","22:56:52","1","1");
INSERT INTO factura_cab VALUES("112","","12","1","","","","","","","","","","1","2","1","","","2015-11-19","22:56:56","1","1");
INSERT INTO factura_cab VALUES("113","","12","1","","","","","","","","","","1","1","1","","","2015-11-19","22:57:44","1","1");
INSERT INTO factura_cab VALUES("114","","12","1","","","","","","","","","","1","1","1","","","2015-11-19","22:57:50","1","1");
INSERT INTO factura_cab VALUES("115","","12","1","","","","","","","","","","1","1","1","","","2015-11-19","22:57:52","1","1");
INSERT INTO factura_cab VALUES("116","","12","1","","","","","","","","","","1","1","1","","","2015-11-19","22:58:05","1","1");
INSERT INTO factura_cab VALUES("117","","12","1","","","","","","","","","","1","2","1","","","2015-11-19","22:58:20","1","1");
INSERT INTO factura_cab VALUES("118","","12","1","","","","","","","","","","1","8","1","","","2015-11-19","23:00:28","1","1");
INSERT INTO factura_cab VALUES("119","","12","1","","","","","","","","","","1","21","1","","","2015-11-19","23:01:04","1","1");
INSERT INTO factura_cab VALUES("120","","12","1","","","","","","","","","","1","9","1","","","2015-11-19","23:01:41","1","1");
INSERT INTO factura_cab VALUES("121","0","13","1","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-19","23:12:12","1","0");
INSERT INTO factura_cab VALUES("122","0","11","1","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-19","23:17:00","2","0");
INSERT INTO factura_cab VALUES("123","0","14","1","","1","1","1","1","2500","1","3000","2500","1","16","1","0","","2015-11-19","23:22:13","1","0");
INSERT INTO factura_cab VALUES("124","0","15","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-19","23:19:43","2","0");
INSERT INTO factura_cab VALUES("125","0","15","1","","1","1","1","1","2500","1","3000","2500","1","18","1","0","","2015-11-19","23:19:23","2","0");
INSERT INTO factura_cab VALUES("126","0","16","12","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-20","13:22:47","1","0");
INSERT INTO factura_cab VALUES("127","0","16","1","","1","1","1","1","2500","1","30000","2500","1","2","1","0","","2015-11-20","11:36:11","1","0");
INSERT INTO factura_cab VALUES("128","0","16","22","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-20","01:13:05","1","0");
INSERT INTO factura_cab VALUES("129","0","16","7","","1","1","1","1","10000","1","15000","10000","1","4","1","0","","2015-11-20","01:11:09","1","0");
INSERT INTO factura_cab VALUES("130","0","16","1","","1","1","1","1","2500","1","50000","2500","1","18","1","0","","2015-11-20","01:10:30","1","0");
INSERT INTO factura_cab VALUES("131","0","16","1","","1","1","1","1","2500","1","3000","2500","1","5","1","0","","2015-11-20","01:11:00","1","0");
INSERT INTO factura_cab VALUES("132","0","16","1","","1","1","1","1","5000","1","10000","5000","1","3","1","0","","2015-11-20","11:26:05","1","0");
INSERT INTO factura_cab VALUES("133","0","16","2","","1","1","1","1","37000","1","40000","37000","1","20","1","0","","2015-11-20","13:19:50","1","0");
INSERT INTO factura_cab VALUES("134","0","16","1","","1","1","1","1","12500","1","15000","12500","1","18","1","0","","2015-11-20","02:35:47","1","0");
INSERT INTO factura_cab VALUES("135","0","16","1","","1","1","1","1","5000","1","10000","5000","1","4","1","0","","2015-11-20","13:23:49","1","0");
INSERT INTO factura_cab VALUES("136","0","16","1","","1","1","1","1","5000","1","10000","5000","1","19","1","0","","2015-11-20","12:38:13","1","0");
INSERT INTO factura_cab VALUES("137","0","16","1","","1","1","1","1","5000","1","50000","5000","1","10","1","0","","2015-11-20","13:26:25","1","0");
INSERT INTO factura_cab VALUES("138","","16","1","","","","","","","","","","1","7","1","","","2015-11-20","02:51:32","1","1");
INSERT INTO factura_cab VALUES("139","0","16","1","","1","1","1","1","2500","1","5000","2500","1","5","1","0","","2015-11-20","13:29:18","1","0");
INSERT INTO factura_cab VALUES("140","0","16","1","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-20","13:38:07","1","0");
INSERT INTO factura_cab VALUES("141","0","16","1","","1","1","1","1","10000","1","100000","10000","1","4","1","0","","2015-11-20","13:49:44","1","0");
INSERT INTO factura_cab VALUES("142","0","16","1","","1","1","1","1","2500","1","100000","2500","1","4","1","0","","2015-11-20","13:50:47","1","0");
INSERT INTO factura_cab VALUES("143","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","13:51:33","1","0");
INSERT INTO factura_cab VALUES("144","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","13:53:10","1","0");
INSERT INTO factura_cab VALUES("145","0","16","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-20","13:54:07","1","0");
INSERT INTO factura_cab VALUES("146","0","16","1","","1","1","1","1","5000","1","10000","5000","1","4","1","0","","2015-11-20","13:55:03","1","0");
INSERT INTO factura_cab VALUES("147","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","13:55:26","1","0");
INSERT INTO factura_cab VALUES("148","0","16","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-20","13:55:47","1","0");
INSERT INTO factura_cab VALUES("149","0","16","1","","1","1","1","1","2500","1","11000","2500","1","1","1","0","","2015-11-20","13:56:43","1","0");
INSERT INTO factura_cab VALUES("150","0","16","1","","1","1","1","1","2500","1","30000","2500","1","3","1","0","","2015-11-20","13:58:25","1","0");
INSERT INTO factura_cab VALUES("151","0","16","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-20","13:58:43","1","0");
INSERT INTO factura_cab VALUES("152","0","16","1","","1","1","1","1","2500","1","6000","2500","1","4","1","0","","2015-11-20","13:59:23","1","0");
INSERT INTO factura_cab VALUES("153","0","16","1","","1","1","1","1","2500","1","5000","2500","1","19","1","0","","2015-11-20","13:59:01","1","0");
INSERT INTO factura_cab VALUES("154","0","16","1","","1","1","1","1","11000","1","15000","11000","1","4","1","0","","2015-11-20","14:00:03","1","0");
INSERT INTO factura_cab VALUES("155","0","16","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-20","14:00:39","1","0");
INSERT INTO factura_cab VALUES("156","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","14:17:15","1","0");
INSERT INTO factura_cab VALUES("157","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","14:18:12","1","0");
INSERT INTO factura_cab VALUES("158","0","16","1","","1","1","1","1","2500","1","3000","2500","1","5","1","0","","2015-11-20","14:18:29","1","0");
INSERT INTO factura_cab VALUES("159","0","16","1","","1","1","1","1","2500","1","50000","2500","1","4","1","0","","2015-11-20","14:29:43","1","0");
INSERT INTO factura_cab VALUES("160","0","16","22","","1","1","1","1","2500","1","5000","2500","1","3","1","0","","2015-11-20","14:48:53","1","0");
INSERT INTO factura_cab VALUES("161","0","16","12","","1","1","1","1","2500","1","5000","2500","1","11","1","0","","2015-11-20","14:49:53","1","0");
INSERT INTO factura_cab VALUES("162","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","14:51:04","1","0");
INSERT INTO factura_cab VALUES("163","0","16","1","","1","1","1","1","2500","1","50000","2500","1","4","1","0","","2015-11-20","14:51:49","1","0");
INSERT INTO factura_cab VALUES("164","0","16","1","","1","1","1","1","2500","1","1","2500","1","4","1","0","","2015-11-20","14:52:35","1","0");
INSERT INTO factura_cab VALUES("165","0","16","1","","1","1","1","1","2500","1","1000","2500","1","4","1","0","","2015-11-20","14:53:02","1","0");
INSERT INTO factura_cab VALUES("166","0","16","1","","1","1","1","1","2500","1","10000","2500","1","4","1","0","","2015-11-20","14:53:28","1","0");
INSERT INTO factura_cab VALUES("167","0","16","1","","1","1","1","1","13500","1","15000","13500","1","3","1","0","","2015-11-20","14:53:57","1","0");
INSERT INTO factura_cab VALUES("168","0","16","1","","1","1","1","1","16000","1","20000","16000","1","3","1","0","","2015-11-20","14:54:43","1","0");
INSERT INTO factura_cab VALUES("169","0","16","1","","1","1","1","1","13500","1","15000","13500","1","5","1","0","","2015-11-20","14:57:16","1","0");
INSERT INTO factura_cab VALUES("170","0","16","1","","1","1","1","1","13500","1","20000","13500","1","4","1","0","","2015-11-20","14:57:46","1","0");
INSERT INTO factura_cab VALUES("171","0","16","1","","1","1","1","1","2500","1","5000","2500","1","5","1","0","","2015-11-20","15:02:04","1","0");
INSERT INTO factura_cab VALUES("172","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","15:13:34","1","0");
INSERT INTO factura_cab VALUES("173","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","15:14:31","1","0");
INSERT INTO factura_cab VALUES("174","0","16","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-20","15:15:27","1","0");
INSERT INTO factura_cab VALUES("175","0","16","1","","1","1","1","1","13500","1","50000","13500","1","21","1","0","","2015-11-20","15:19:12","1","0");
INSERT INTO factura_cab VALUES("176","0","16","1","","1","1","1","1","2500","1","5000","2500","1","1","1","0","","2015-11-20","15:19:56","1","0");
INSERT INTO factura_cab VALUES("177","0","16","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-21","12:30:20","1","0");
INSERT INTO factura_cab VALUES("178","0","16","1","","1","1","1","1","5000","1","4000","5000","1","8","1","0","","2015-11-21","12:31:21","1","0");
INSERT INTO factura_cab VALUES("179","0","16","1","","1","1","1","1","13500","1","15000","13500","1","2","1","0","","2015-11-21","12:37:03","1","0");
INSERT INTO factura_cab VALUES("180","0","16","1","","1","1","1","1","11000","1","12000","11000","1","4","1","0","","2015-11-21","12:37:39","1","0");
INSERT INTO factura_cab VALUES("181","0","16","1","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-21","12:38:47","1","0");
INSERT INTO factura_cab VALUES("182","0","16","1","","1","1","1","1","13500","1","15000","13500","1","4","1","0","","2015-11-21","12:51:22","1","0");
INSERT INTO factura_cab VALUES("183","","16","1","","","","","","","","","","1","5","1","","","2015-11-21","12:52:42","1","1");
INSERT INTO factura_cab VALUES("184","0","16","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-21","13:08:17","1","0");
INSERT INTO factura_cab VALUES("185","0","17","1","","1","1","1","1","11000","1","150000","11000","1","3","1","0","","2015-11-21","13:23:34","1","0");
INSERT INTO factura_cab VALUES("186","0","17","1","","1","1","1","1","2500","1","5000","2500","1","3","1","0","","2015-11-21","13:23:54","1","0");
INSERT INTO factura_cab VALUES("187","0","17","1","","1","1","1","1","11000","1","15000","11000","1","3","1","0","","2015-11-21","13:26:07","1","0");
INSERT INTO factura_cab VALUES("188","0","17","1","","1","1","1","1","54000","1","55000","54000","1","1","1","0","","2015-11-21","14:22:31","1","0");
INSERT INTO factura_cab VALUES("189","0","17","1","","1","1","1","1","2500","1","3000","2500","1","2","1","0","","2015-11-21","14:47:46","1","0");
INSERT INTO factura_cab VALUES("190","0","17","1","","1","1","1","1","13500","1","15000","13500","1","1","1","0","","2015-11-21","14:47:58","1","0");
INSERT INTO factura_cab VALUES("191","0","17","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-21","14:54:05","1","0");
INSERT INTO factura_cab VALUES("192","0","17","1","","1","1","1","1","11000","1","15000","11000","1","10","1","0","","2015-11-21","14:55:02","1","0");
INSERT INTO factura_cab VALUES("193","0","17","1","","1","1","1","1","18500","1","20000","18500","1","2","1","0","","2015-11-21","14:57:48","1","0");
INSERT INTO factura_cab VALUES("194","0","17","1","","1","1","1","1","2500","1","30000","2500","1","1","1","0","","2015-11-21","15:02:33","1","0");
INSERT INTO factura_cab VALUES("195","0","17","1","","1","1","1","1","13500","1","15000","13500","1","2","1","0","","2015-11-21","15:04:01","1","0");
INSERT INTO factura_cab VALUES("196","0","17","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-21","15:26:08","1","0");
INSERT INTO factura_cab VALUES("197","0","17","1","","1","1","1","1","15500","1","20000","15500","1","3","1","0","","2015-11-21","15:32:55","1","0");
INSERT INTO factura_cab VALUES("198","0","17","1","","1","1","1","1","2500","1","3000","2500","1","11","1","0","","2015-11-21","15:34:55","1","0");
INSERT INTO factura_cab VALUES("199","0","17","1","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-21","15:40:40","1","0");
INSERT INTO factura_cab VALUES("200","0","17","1","","1","1","1","1","13500","1","15000","13500","1","12","1","0","","2015-11-21","15:40:32","1","0");
INSERT INTO factura_cab VALUES("201","0","18","1","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-21","17:15:32","1","0");
INSERT INTO factura_cab VALUES("202","0","18","1","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-21","17:21:12","1","0");
INSERT INTO factura_cab VALUES("203","0","18","1","","1","1","1","1","2500","1","3000","2500","1","2","1","0","","2015-11-21","17:17:00","1","0");
INSERT INTO factura_cab VALUES("204","0","18","1","","1","1","1","1","2500","1","3000","2500","1","21","1","0","","2015-11-21","17:22:05","1","0");
INSERT INTO factura_cab VALUES("205","0","18","1","","1","1","1","1","2500","1","50000","2500","1","4","1","0","","2015-11-21","17:31:59","1","0");
INSERT INTO factura_cab VALUES("206","0","18","10","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-21","17:33:09","1","0");
INSERT INTO factura_cab VALUES("207","0","18","1","","1","1","1","1","78000","1","100000","78000","1","3","1","0","","2015-11-21","22:43:47","1","0");
INSERT INTO factura_cab VALUES("208","0","18","1","","1","1","1","1","2500","1","50000","2500","1","4","1","0","","2015-11-21","17:38:07","1","0");
INSERT INTO factura_cab VALUES("209","0","18","10","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-21","17:39:30","1","0");
INSERT INTO factura_cab VALUES("210","0","18","12","","1","1","1","1","2500","1","40000","2500","1","5","1","0","","2015-11-21","17:41:16","1","0");
INSERT INTO factura_cab VALUES("211","0","18","12","","1","1","1","1","2500","1","10000","2500","1","12","1","0","","2015-11-21","22:43:57","1","0");
INSERT INTO factura_cab VALUES("212","0","18","12","","1","1","1","1","2500","1","5000","2500","1","4","1","0","","2015-11-22","04:35:16","1","0");
INSERT INTO factura_cab VALUES("213","0","18","12","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-22","11:53:27","1","0");
INSERT INTO factura_cab VALUES("214","0","18","12","","1","1","1","1","15000","1","20000","15000","1","4","1","0","","2015-11-22","12:40:40","1","0");
INSERT INTO factura_cab VALUES("215","0","18","12","","1","1","1","1","50000","1","100000","50000","1","4","1","0","","2015-11-22","12:49:46","1","0");
INSERT INTO factura_cab VALUES("216","0","18","12","","1","1","1","1","32000","1","35000","32000","1","3","1","0","","2015-11-22","12:57:24","1","0");
INSERT INTO factura_cab VALUES("217","0","18","12","","1","1","1","1","7500","1","50000","7500","1","4","1","0","","2015-11-22","13:07:16","1","0");
INSERT INTO factura_cab VALUES("218","0","18","12","","1","1","1","1","2500","1","3000","2500","1","19","1","0","","2015-11-22","13:07:54","1","0");
INSERT INTO factura_cab VALUES("219","0","18","12","","1","1","1","1","2500","1","3000","2500","1","5","1","0","","2015-11-22","13:04:39","1","0");
INSERT INTO factura_cab VALUES("220","0","18","12","","1","1","1","1","5000","1","10000","5000","1","1","1","0","","2015-11-22","13:22:42","1","0");
INSERT INTO factura_cab VALUES("221","0","18","12","","1","1","1","1","16000","1","20000","16000","1","17","1","0","","2015-11-22","13:54:51","1","0");
INSERT INTO factura_cab VALUES("222","0","18","12","","1","1","1","1","7500","1","10000","7500","1","12","1","0","","2015-11-22","13:50:42","1","0");
INSERT INTO factura_cab VALUES("223","0","18","1","","1","1","1","1","11000","1","15000","11000","1","1","1","0","","2015-11-22","13:53:15","1","0");
INSERT INTO factura_cab VALUES("224","0","18","12","","1","1","1","1","11000","1","15000","11000","1","1","1","0","","2015-11-22","13:54:41","1","0");
INSERT INTO factura_cab VALUES("225","0","19","12","","1","1","1","1","2500","1","5000","2500","1","1","1","0","","2015-11-22","16:21:52","1","0");
INSERT INTO factura_cab VALUES("226","0","19","12","","1","1","1","1","9000","1","10000","9000","1","19","1","0","","2015-11-22","16:21:59","1","0");
INSERT INTO factura_cab VALUES("227","0","20","12","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-22","22:58:51","1","0");
INSERT INTO factura_cab VALUES("228","","20","12","","","","","","","","","","1","4","1","","","2015-11-22","22:58:56","1","1");
INSERT INTO factura_cab VALUES("229","0","20","12","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-23","18:51:02","1","0");
INSERT INTO factura_cab VALUES("230","0","20","12","","1","1","1","1","10000","1","18500","10000","1","4","1","0","","2015-11-23","18:56:34","1","0");
INSERT INTO factura_cab VALUES("231","0","20","12","","1","1","1","1","13500","1","15000","13500","1","21","1","0","","2015-11-23","18:59:24","1","0");
INSERT INTO factura_cab VALUES("232","0","20","12","","1","1","1","1","2500","1","5000","2500","1","10","1","0","","2015-11-23","18:59:33","1","0");
INSERT INTO factura_cab VALUES("233","0","21","12","","1","1","1","1","2500","1","5000","2500","1","1","1","0","","2015-11-23","19:00:30","1","0");
INSERT INTO factura_cab VALUES("234","0","21","12","","1","1","1","1","2500","1","5000","2500","1","13","1","0","","2015-11-23","19:00:59","1","0");
INSERT INTO factura_cab VALUES("235","0","21","12","","1","1","1","1","5000","1","10000","5000","1","3","1","0","","2015-11-23","19:06:15","1","0");
INSERT INTO factura_cab VALUES("236","0","21","12","","1","1","1","1","10000","1","15000","10000","1","18","1","0","","2015-11-23","19:07:43","1","0");
INSERT INTO factura_cab VALUES("237","0","21","12","","1","1","1","1","7500","1","10000","7500","1","18","1","0","","2015-11-25","15:02:12","1","0");
INSERT INTO factura_cab VALUES("238","0","21","12","","1","1","1","1","5000","1","10000","5000","1","10","1","0","","2015-11-25","15:02:20","1","0");
INSERT INTO factura_cab VALUES("239","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:06:42","1","0");
INSERT INTO factura_cab VALUES("240","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:08:29","1","0");
INSERT INTO factura_cab VALUES("241","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:10:02","1","0");
INSERT INTO factura_cab VALUES("242","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:10:46","1","0");
INSERT INTO factura_cab VALUES("243","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:12:21","1","0");
INSERT INTO factura_cab VALUES("244","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:12:55","1","0");
INSERT INTO factura_cab VALUES("245","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:13:57","1","0");
INSERT INTO factura_cab VALUES("246","0","21","12","","1","1","1","1","2500","1","5000","2500","1","0","1","0","","2015-11-25","10:16:53","1","0");
INSERT INTO factura_cab VALUES("247","0","21","12","","1","1","1","1","2500","1","6000","2500","1","0","1","0","","2015-11-25","10:17:26","1","0");
INSERT INTO factura_cab VALUES("248","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:30:50","1","0");
INSERT INTO factura_cab VALUES("249","","21","12","","","","","","","","","","1","0","1","","","2015-11-25","10:30:53","1","0");
INSERT INTO factura_cab VALUES("250","0","21","12","","1","1","1","1","2500","1","30000","2500","1","3","1","0","","2015-11-25","15:18:34","1","0");
INSERT INTO factura_cab VALUES("251","0","21","12","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","15:02:03","1","0");
INSERT INTO factura_cab VALUES("252","0","21","12","","1","1","1","1","5000","1","10000","5000","1","0","1","0","","2015-11-25","11:12:27","1","0");
INSERT INTO factura_cab VALUES("253","0","21","12","","1","1","1","1","2500","1","50000","2500","1","0","1","0","","2015-11-25","11:32:39","1","0");
INSERT INTO factura_cab VALUES("254","0","21","12","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","15:18:42","1","0");
INSERT INTO factura_cab VALUES("255","0","21","12","","1","1","1","1","2500","1","3000","2500","1","2","1","0","","2015-11-25","15:20:04","1","0");
INSERT INTO factura_cab VALUES("256","0","21","12","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","15:19:06","1","0");
INSERT INTO factura_cab VALUES("257","0","21","12","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","15:20:18","1","0");
INSERT INTO factura_cab VALUES("258","0","21","12","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-25","15:21:09","1","0");
INSERT INTO factura_cab VALUES("259","0","21","12","","1","1","1","1","2500","1","30000","2500","1","0","1","0","","2015-11-25","15:21:18","1","0");
INSERT INTO factura_cab VALUES("260","0","21","12","","1","1","1","1","5000","1","3000","5000","1","0","1","0","","2015-11-25","15:21:29","1","0");
INSERT INTO factura_cab VALUES("261","0","21","12","","1","1","1","1","13500","1","15000","13500","1","0","1","0","","2015-11-25","15:32:46","1","0");
INSERT INTO factura_cab VALUES("262","0","21","12","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-25","15:21:47","1","0");
INSERT INTO factura_cab VALUES("263","0","21","12","","1","1","1","1","2500","1","3000","2500","1","21","1","0","","2015-11-25","15:33:54","1","0");
INSERT INTO factura_cab VALUES("264","0","21","12","","1","1","1","1","2500","1","30000","2500","1","0","1","0","","2015-11-25","15:33:17","1","0");
INSERT INTO factura_cab VALUES("265","0","21","1","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","15:35:06","1","0");
INSERT INTO factura_cab VALUES("266","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","15:34:44","1","0");
INSERT INTO factura_cab VALUES("267","","21","1","","","","","","","","","","1","0","1","","","2015-11-25","15:35:06","1","1");
INSERT INTO factura_cab VALUES("268","0","21","1","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","15:46:09","1","0");
INSERT INTO factura_cab VALUES("269","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","15:45:09","1","0");
INSERT INTO factura_cab VALUES("270","0","21","1","","1","1","1","1","5000","1","10000","5000","1","0","1","0","","2015-11-25","15:50:58","1","0");
INSERT INTO factura_cab VALUES("271","0","21","1","","1","1","1","1","2500","1","3000","2500","1","12","1","0","","2015-11-25","15:50:36","1","0");
INSERT INTO factura_cab VALUES("272","0","21","1","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","15:52:55","1","0");
INSERT INTO factura_cab VALUES("273","0","21","1","","1","1","1","1","13500","1","15000","13500","1","19","1","0","","2015-11-25","15:52:44","1","0");
INSERT INTO factura_cab VALUES("274","0","21","1","","1","1","1","1","7500","1","10000","7500","1","0","1","0","","2015-11-25","15:58:21","1","0");
INSERT INTO factura_cab VALUES("275","0","21","1","","1","1","1","1","2500","1","3000","2500","1","12","1","0","","2015-11-25","15:57:56","1","0");
INSERT INTO factura_cab VALUES("276","0","21","1","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","16:06:18","1","0");
INSERT INTO factura_cab VALUES("277","0","21","1","","1","1","1","1","2500","1","30000","2500","1","0","1","0","","2015-11-25","16:13:29","1","0");
INSERT INTO factura_cab VALUES("278","0","21","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-25","16:13:08","1","0");
INSERT INTO factura_cab VALUES("279","0","21","1","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","16:17:43","1","0");
INSERT INTO factura_cab VALUES("280","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","16:16:40","1","0");
INSERT INTO factura_cab VALUES("281","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","18:12:31","1","0");
INSERT INTO factura_cab VALUES("282","0","21","1","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-11-25","18:24:10","1","0");
INSERT INTO factura_cab VALUES("283","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","18:26:58","1","0");
INSERT INTO factura_cab VALUES("284","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","18:27:30","1","0");
INSERT INTO factura_cab VALUES("285","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","18:29:38","1","0");
INSERT INTO factura_cab VALUES("286","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","18:31:27","1","0");
INSERT INTO factura_cab VALUES("287","0","21","1","","1","1","1","1","2500","1","111","2500","1","5","1","0","","2015-11-25","18:32:58","1","0");
INSERT INTO factura_cab VALUES("288","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","18:35:27","1","0");
INSERT INTO factura_cab VALUES("289","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","18:36:11","1","0");
INSERT INTO factura_cab VALUES("290","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","18:39:37","1","0");
INSERT INTO factura_cab VALUES("291","0","21","1","","1","1","1","1","2500","1","3000","2500","1","12","1","0","","2015-11-25","18:36:44","1","0");
INSERT INTO factura_cab VALUES("292","0","21","1","","1","1","1","1","2500","1","3000","2500","1","10","1","0","","2015-11-25","18:40:17","1","0");
INSERT INTO factura_cab VALUES("293","0","21","1","","1","1","1","1","2500","1","3000","2500","1","11","1","0","","2015-11-25","18:41:07","1","0");
INSERT INTO factura_cab VALUES("294","0","21","1","","1","1","1","1","2500","1","3000","2500","1","10","1","0","","2015-11-25","18:41:58","1","0");
INSERT INTO factura_cab VALUES("295","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","19:02:25","1","0");
INSERT INTO factura_cab VALUES("296","0","21","1","","1","1","1","1","2500","1","3000","2500","1","11","1","0","","2015-11-25","19:06:06","1","0");
INSERT INTO factura_cab VALUES("297","0","21","1","","1","1","1","1","55000","1","3000","55000","1","4","1","0","","2015-11-25","19:11:07","1","0");
INSERT INTO factura_cab VALUES("298","0","21","1","","1","1","1","1","2500","1","5000","2500","1","20","1","0","","2015-11-25","20:13:06","1","0");
INSERT INTO factura_cab VALUES("299","0","21","1","","1","1","1","1","2500","1","30000","2500","1","4","1","0","","2015-11-25","20:19:58","1","0");
INSERT INTO factura_cab VALUES("300","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","20:21:34","1","0");
INSERT INTO factura_cab VALUES("301","0","21","1","","1","1","1","1","2500","1","3000","2500","1","11","1","0","","2015-11-25","20:25:33","1","0");
INSERT INTO factura_cab VALUES("302","0","21","1","","1","1","1","1","13500","1","3000","13500","1","3","1","0","","2015-11-25","20:26:03","1","0");
INSERT INTO factura_cab VALUES("303","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-25","20:29:25","1","0");
INSERT INTO factura_cab VALUES("304","0","21","1","","1","1","1","1","2500","1","5000","2500","1","0","1","0","","2015-11-25","22:42:31","1","0");
INSERT INTO factura_cab VALUES("305","0","21","1","","1","1","1","1","13500","1","15000","13500","1","11","1","0","","2015-11-26","12:38:47","1","0");
INSERT INTO factura_cab VALUES("306","0","21","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-26","12:34:54","1","0");
INSERT INTO factura_cab VALUES("307","0","21","1","","1","1","1","1","13500","1","15000","13500","1","4","1","0","","2015-11-26","12:40:11","1","0");
INSERT INTO factura_cab VALUES("308","0","21","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-26","12:46:29","1","0");
INSERT INTO factura_cab VALUES("309","0","21","1","","1","1","1","1","13500","1","15000","13500","1","3","1","0","","2015-11-26","12:47:36","1","0");
INSERT INTO factura_cab VALUES("310","0","21","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-26","13:09:08","1","0");
INSERT INTO factura_cab VALUES("311","0","21","1","","1","1","1","1","2500","1","3000","2500","1","3","1","0","","2015-11-26","20:58:07","1","0");
INSERT INTO factura_cab VALUES("312","0","21","1","","1","1","1","1","2500","1","30000","2500","1","4","1","0","","2015-11-26","21:17:12","1","0");
INSERT INTO factura_cab VALUES("313","0","21","1","","1","1","1","1","16000","1","30000","16000","1","3","1","0","","2015-11-26","21:42:27","1","0");
INSERT INTO factura_cab VALUES("314","0","21","1","","1","1","1","1","16000","1","30000","16000","1","3","1","0","","2015-11-26","21:49:35","1","0");
INSERT INTO factura_cab VALUES("315","0","21","1","","1","1","1","1","13500","1","15000","13500","1","2","1","0","","2015-11-26","22:18:55","1","0");
INSERT INTO factura_cab VALUES("316","0","21","1","","1","1","1","1","13500","1","15000","13500","1","10","1","0","","2015-11-26","22:25:58","1","0");
INSERT INTO factura_cab VALUES("317","0","21","1","","1","1","1","1","13500","1","15000","13500","1","4","1","0","","2015-11-26","22:27:11","1","0");
INSERT INTO factura_cab VALUES("318","0","21","1","","1","1","1","1","13500","1","30000","13500","1","4","1","0","","2015-11-26","22:27:47","1","0");
INSERT INTO factura_cab VALUES("319","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-26","22:31:22","1","0");
INSERT INTO factura_cab VALUES("320","0","21","1","","1","1","1","1","2500","1","3000","2500","1","4","1","0","","2015-11-26","22:31:57","1","0");
INSERT INTO factura_cab VALUES("321","0","21","1","","1","1","1","1","2500","1","300","2500","1","10","1","0","","2015-11-26","22:33:18","1","0");
INSERT INTO factura_cab VALUES("322","0","21","1","","1","1","1","1","13500","1","30000","13500","1","0","1","0","","2015-11-26","22:32:48","1","0");
INSERT INTO factura_cab VALUES("323","","21","1","","","","","","","","","","1","1","0","","","2015-11-26","23:19:23","1","0");
INSERT INTO factura_cab VALUES("324","0","21","1","","1","1","1","1","2500","1","3000","2500","1","1","1","0","","2015-11-26","23:36:54","1","0");
INSERT INTO factura_cab VALUES("325","0","21","1","","1","1","1","1","2500","1","30000","2500","1","0","1","0","","2015-11-26","23:36:42","1","0");
INSERT INTO factura_cab VALUES("326","0","21","1","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2015-12-29","13:31:01","1","0");
INSERT INTO factura_cab VALUES("327","0","21","1","","1","1","1","1","2500","1","30000","2500","1","1","1","0","","2015-12-29","13:30:23","1","0");
INSERT INTO factura_cab VALUES("328","","21","1","","","","","","","","","","1","21","0","","","2015-12-29","13:31:30","1","0");
INSERT INTO factura_cab VALUES("329","0","21","1","","1","1","1","1","11000","1","15000","11000","1","0","1","0","","2016-02-04","20:37:09","1","0");
INSERT INTO factura_cab VALUES("330","0","21","10","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2016-02-04","20:39:02","1","0");
INSERT INTO factura_cab VALUES("331","0","21","10","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2016-02-22","19:36:07","1","0");
INSERT INTO factura_cab VALUES("332","","21","10","","","","","","","","","","1","3","0","","","2016-02-22","19:13:25","1","0");
INSERT INTO factura_cab VALUES("333","0","21","10","","1","1","1","1","2500","1","3000","2500","1","0","1","0","","2016-02-22","19:41:55","1","0");
INSERT INTO factura_cab VALUES("334","0","21","10","","1","1","1","1","7500","1","10000","7500","1","0","1","0","","2016-02-22","19:42:06","1","0");
INSERT INTO factura_cab VALUES("335","0","21","10","","1","1","1","1","13000","1","15000","13000","1","0","1","0","","2016-05-30","10:46:57","1","0");
INSERT INTO factura_cab VALUES("336","0","21","2","","1","1","1","1","11000","1","12000","11000","1","0","1","0","","2016-05-31","15:02:59","1","0");
INSERT INTO factura_cab VALUES("337","","21","10","","","","","","","","","","1","0","0","","","2016-05-31","15:03:04","1","0");


DROP TABLE IF EXISTS factura_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `factura_cab_view` AS (select `factura_cab`.`fac_cod` AS `fac_cod`,`factura_cab`.`fac_num` AS `fac_num`,`factura_cab`.`ape_cod` AS `ape_cod`,`factura_cab`.`cli_cod` AS `cli_cod`,(select `clientes`.`cli_des` AS `cli_des` from `clientes` where (`clientes`.`cli_cod` = `factura_cab`.`cli_cod`)) AS `cli_des`,(select `clientes`.`cli_ruc` AS `cli_ruc` from `clientes` where (`clientes`.`cli_cod` = `factura_cab`.`cli_cod`)) AS `cli_ruc`,`factura_cab`.`mpg_cod` AS `mpg_cod`,(select `medios_pago`.`mpg_des` AS `mpg_des` from `medios_pago` where (`medios_pago`.`mpg_cod` = `factura_cab`.`mpg_cod`)) AS `mpg_des`,`factura_cab`.`for_cod` AS `for_cod`,(select `formas_pago`.`for_des` AS `for_des` from `formas_pago` where (`formas_pago`.`for_cod` = `factura_cab`.`for_cod`)) AS `for_des`,`factura_cab`.`tmo_cod` AS `tmo_cod`,(select `tipo_moneda`.`tmo_des` AS `tmo_des` from `tipo_moneda` where (`tipo_moneda`.`tmo_cod` = `factura_cab`.`tmo_cod`)) AS `tmo_des`,`factura_cab`.`cot_cod` AS `cot_cod`,`factura_cab`.`cot_mon` AS `cot_mon`,`factura_cab`.`tie_cod` AS `tie_cod`,(select `tipo_envio`.`tie_des` AS `tie_des` from `tipo_envio` where (`tipo_envio`.`tie_cod` = `factura_cab`.`tie_cod`)) AS `tie_des`,`factura_cab`.`fac_imp` AS `fac_imp`,replace(format(`factura_cab`.`fac_tot`,0),',','.') AS `fac_tot_1`,`factura_cab`.`fac_tot` AS `fac_tot`,`factura_cab`.`aps_cod` AS `aps_cod`,format(`factura_cab`.`cot_mon`,0) AS `cot_mon_1`,`factura_cab`.`mes_cod` AS `mes_cod`,(select `mesas`.`mes_des` AS `mes_des` from `mesas` where (`mesas`.`mes_cod` = `factura_cab`.`mes_cod`)) AS `mes_des`,`factura_cab`.`fac_est` AS `fac_est`,(case when (`factura_cab`.`fac_est` = 0) then _utf8'Pendiente' else _utf8'Cerrado' end) AS `estado`,`factura_cab`.`fac_sal` AS `fac_sal`,`factura_cab`.`fac_rec` AS `fac_rec`,`factura_cab`.`fecha` AS `fecha`,`factura_cab`.`hora` AS `hora`,`factura_cab`.`usuario` AS `usuario`,`factura_cab`.`borrado` AS `borrado` from `factura_cab`);

INSERT INTO factura_cab_view VALUES("1","0","1","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","2500","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-10","22:07:55","1","0");
INSERT INTO factura_cab_view VALUES("2","","1","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","4","MESA 4","1","Cerrado","","","2015-10-07","22:23:40","1","0");
INSERT INTO factura_cab_view VALUES("3","","1","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-10","11:49:40","1","0");
INSERT INTO factura_cab_view VALUES("4","","1","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-10","11:55:20","1","0");
INSERT INTO factura_cab_view VALUES("5","","1","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-10","12:00:53","1","0");
INSERT INTO factura_cab_view VALUES("6","0","3","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-10-10","22:17:48","2","1");
INSERT INTO factura_cab_view VALUES("7","0","2","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","8000","7.500","7500","1","7,500","12","MESA 12","1","Cerrado","0","","2015-10-10","22:21:48","1","0");
INSERT INTO factura_cab_view VALUES("8","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","2500","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-10-11","12:01:27","1","0");
INSERT INTO factura_cab_view VALUES("9","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","10000","7.500","7500","1","7,500","4","MESA 4","1","Cerrado","0","","2015-10-11","12:36:03","1","0");
INSERT INTO factura_cab_view VALUES("10","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","25000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-11","13:24:08","1","0");
INSERT INTO factura_cab_view VALUES("11","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","20","MESA 20","1","Cerrado","0","","2015-10-11","13:24:28","1","0");
INSERT INTO factura_cab_view VALUES("12","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","11","MESA 11","1","Cerrado","0","","2015-10-11","13:24:20","1","0");
INSERT INTO factura_cab_view VALUES("13","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","10000","1","EN CAJA","100000","10.000","10000","1","10,000","16","MESA 16","1","Cerrado","0","","2015-10-11","13:24:36","1","0");
INSERT INTO factura_cab_view VALUES("14","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","8000","7.500","7500","1","7,500","1","MESA 1","1","Cerrado","0","","2015-10-11","12:45:29","1","1");
INSERT INTO factura_cab_view VALUES("15","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","25000","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-10-11","13:23:58","1","0");
INSERT INTO factura_cab_view VALUES("16","","4","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-11","12:48:17","1","1");
INSERT INTO factura_cab_view VALUES("17","0","4","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-10-11","12:55:58","1","1");
INSERT INTO factura_cab_view VALUES("18","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","25000","1","EN CAJA","30000","25.000","25000","1","25,000","1","MESA 1","1","Cerrado","0","","2015-10-11","13:26:48","1","0");
INSERT INTO factura_cab_view VALUES("19","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-10-11","13:27:01","1","0");
INSERT INTO factura_cab_view VALUES("20","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","12","MESA 12","1","Cerrado","0","","2015-10-11","13:27:34","1","0");
INSERT INTO factura_cab_view VALUES("21","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","7","MESA 7","1","Cerrado","0","","2015-10-11","13:27:18","1","0");
INSERT INTO factura_cab_view VALUES("22","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","50000","2.500","2500","1","2,500","17","MESA 17","1","Cerrado","0","","2015-10-11","14:15:16","1","0");
INSERT INTO factura_cab_view VALUES("23","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","21","MESA 21","1","Cerrado","0","","2015-10-11","13:27:28","1","0");
INSERT INTO factura_cab_view VALUES("24","0","6","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-10-11","14:14:58","1","0");
INSERT INTO factura_cab_view VALUES("25","","7","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-11","23:48:41","1","1");
INSERT INTO factura_cab_view VALUES("26","0","7","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-10-11","23:50:56","1","0");
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
INSERT INTO factura_cab_view VALUES("37","0","9","1","CLIENTE OCACIONAL","--","1","EFECTIVO","2","CREDITO","1","GUARANIES","1","75000","1","EN CAJA","100000","75.000","75000","1","75,000","1","MESA 1","1","Cerrado","0","","2015-10-19","17:56:56","1","0");
INSERT INTO factura_cab_view VALUES("38","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","4000000","1","EN CAJA","5000000","4.000.000","4000000","1","4,000,000","1","MESA 1","1","Cerrado","0","","2015-10-19","18:03:54","1","0");
INSERT INTO factura_cab_view VALUES("39","0","10","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2000000","1","EN CAJA","2000000","2.000.000","2000000","1","2,000,000","1","MESA 1","1","Cerrado","0","fgfgfgfg","2015-10-19","22:35:33","1","0");
INSERT INTO factura_cab_view VALUES("40","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-19","23:00:02","1","0");
INSERT INTO factura_cab_view VALUES("41","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","25000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-20","23:46:10","1","0");
INSERT INTO factura_cab_view VALUES("42","","10","10","ARIEL","3219801","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","21:26:14","1","0");
INSERT INTO factura_cab_view VALUES("43","","10","10","ARIEL","3219801","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","21:42:56","1","0");
INSERT INTO factura_cab_view VALUES("44","0","10","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","1800000","1","EN CAJA","1800000","1.800.000","1800000","1","1,800,000","1","MESA 1","1","Cerrado","0","","2015-10-20","21:44:01","1","0");
INSERT INTO factura_cab_view VALUES("45","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","22:11:18","1","0");
INSERT INTO factura_cab_view VALUES("46","","10","10","ARIEL","3219801","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:07:56","1","0");
INSERT INTO factura_cab_view VALUES("47","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:08:21","1","0");
INSERT INTO factura_cab_view VALUES("48","","10","10","ARIEL","3219801","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:09:13","1","0");
INSERT INTO factura_cab_view VALUES("49","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:09:34","1","0");
INSERT INTO factura_cab_view VALUES("50","","10","10","ARIEL","3219801","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:36:25","1","0");
INSERT INTO factura_cab_view VALUES("51","","10","10","ARIEL","3219801","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:36:48","1","0");
INSERT INTO factura_cab_view VALUES("52","","10","10","ARIEL","3219801","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:37:56","1","0");
INSERT INTO factura_cab_view VALUES("53","","10","10","ARIEL","3219801","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:38:40","1","0");
INSERT INTO factura_cab_view VALUES("54","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:39:09","1","0");
INSERT INTO factura_cab_view VALUES("55","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:39:28","1","0");
INSERT INTO factura_cab_view VALUES("56","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:42:12","1","0");
INSERT INTO factura_cab_view VALUES("57","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:42:20","1","0");
INSERT INTO factura_cab_view VALUES("58","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-20","23:44:16","1","0");
INSERT INTO factura_cab_view VALUES("59","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","15000","1","EN CAJA","15000","15.000","15000","1","15,000","1","MESA 1","1","Cerrado","0","","2015-10-20","23:45:19","1","0");
INSERT INTO factura_cab_view VALUES("60","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2000000","1","EN CAJA","20000000","2.000.000","2000000","1","2,000,000","1","MESA 1","1","Cerrado","0","","2015-10-27","16:43:45","1","0");
INSERT INTO factura_cab_view VALUES("61","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","2","DOLARES","1","357.14","1","EN CAJA","400","2.000.000","2000000","1","357","2","MESA 2","1","Cerrado","0","","2015-10-22","15:57:18","1","0");
INSERT INTO factura_cab_view VALUES("62","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2000000","1","EN CAJA","2100000","2.000.000","2000000","1","2,000,000","3","MESA 3","1","Cerrado","0","","2015-10-22","16:01:10","1","0");
INSERT INTO factura_cab_view VALUES("63","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","7000","5.000","5000","1","5,000","2","MESA 2","1","Cerrado","0","","2015-10-27","16:44:21","1","0");
INSERT INTO factura_cab_view VALUES("64","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","6000","5.000","5000","1","5,000","18","MESA 18","1","Cerrado","0","","2015-10-27","16:44:11","1","0");
INSERT INTO factura_cab_view VALUES("65","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","14000","1","EN CAJA","15000","14.000","14000","1","14,000","4","MESA 4","1","Cerrado","0","","2015-10-27","16:43:55","1","0");
INSERT INTO factura_cab_view VALUES("66","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","10000","7.500","7500","1","7,500","12","MESA 12","1","Cerrado","0","","2015-10-27","16:44:03","1","0");
INSERT INTO factura_cab_view VALUES("67","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-27","20:03:00","1","0");
INSERT INTO factura_cab_view VALUES("68","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-27","20:22:43","1","0");
INSERT INTO factura_cab_view VALUES("69","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","12","MESA 12","1","Cerrado","0","","2015-10-27","20:23:59","1","0");
INSERT INTO factura_cab_view VALUES("70","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","15500","1","EN CAJA","20000","15.500","15500","1","15,500","18","MESA 18","1","Cerrado","0","","2015-10-27","20:25:21","1","0");
INSERT INTO factura_cab_view VALUES("71","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-27","21:21:15","1","0");
INSERT INTO factura_cab_view VALUES("72","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-10-27","21:25:22","1","0");
INSERT INTO factura_cab_view VALUES("73","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","22000","1","EN CAJA","23000","22.000","22000","1","22,000","1","MESA 1","1","Cerrado","0","","2015-10-28","00:58:42","1","0");
INSERT INTO factura_cab_view VALUES("74","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-10-28","00:58:55","1","0");
INSERT INTO factura_cab_view VALUES("75","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","6","MESA 6","1","Cerrado","0","","2015-10-28","01:00:54","1","0");
INSERT INTO factura_cab_view VALUES("76","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-28","01:01:48","1","0");
INSERT INTO factura_cab_view VALUES("77","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-10-28","01:51:02","1","0");
INSERT INTO factura_cab_view VALUES("78","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","3","MESA 3","1","Cerrado","","","2015-10-28","01:52:04","1","0");
INSERT INTO factura_cab_view VALUES("79","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-10-28","01:54:27","1","0");
INSERT INTO factura_cab_view VALUES("80","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-10-28","01:54:31","1","0");
INSERT INTO factura_cab_view VALUES("81","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","3","MESA 3","1","Cerrado","","","2015-10-28","01:54:34","1","0");
INSERT INTO factura_cab_view VALUES("82","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","5000","5.000","5000","1","5,000","3","MESA 3","1","Cerrado","0","","2015-11-12","17:49:43","1","0");
INSERT INTO factura_cab_view VALUES("83","0","10","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","1","MESA 1","1","Cerrado","0","","2015-11-12","17:49:26","1","0");
INSERT INTO factura_cab_view VALUES("84","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","11","MESA 11","1","Cerrado","0","","2015-11-12","17:51:17","1","0");
INSERT INTO factura_cab_view VALUES("85","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","13","MESA 13","1","Cerrado","0","","2015-11-12","17:51:27","1","0");
INSERT INTO factura_cab_view VALUES("86","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-11-12","17:54:46","1","0");
INSERT INTO factura_cab_view VALUES("87","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-11-12","17:55:07","1","0");
INSERT INTO factura_cab_view VALUES("88","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-11-12","18:01:38","1","0");
INSERT INTO factura_cab_view VALUES("89","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","16000","1","EN CAJA","17000","16.000","16000","1","16,000","3","MESA 3","1","Cerrado","0","","2015-11-13","00:19:39","1","0");
INSERT INTO factura_cab_view VALUES("90","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-11-13","00:13:57","1","0");
INSERT INTO factura_cab_view VALUES("91","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-19","20:53:22","1","0");
INSERT INTO factura_cab_view VALUES("92","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","0","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-11-19","20:53:33","1","0");
INSERT INTO factura_cab_view VALUES("93","","10","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","5","MESA 5","1","Cerrado","","","2015-11-13","16:44:31","1","0");
INSERT INTO factura_cab_view VALUES("94","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-14","12:19:58","1","0");
INSERT INTO factura_cab_view VALUES("95","0","10","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","1000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-19","20:53:48","1","0");
INSERT INTO factura_cab_view VALUES("96","","","","","","","","","","","","","","","","","","","","","","","1","Cerrado","","","","","","");
INSERT INTO factura_cab_view VALUES("97","0","12","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","50000","5.000","5000","1","5,000","3","MESA 3","1","Cerrado","0","","2015-11-19","21:55:49","1","0");
INSERT INTO factura_cab_view VALUES("98","0","12","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-19","21:55:42","1","0");
INSERT INTO factura_cab_view VALUES("99","0","12","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","5","MESA 5","1","Cerrado","0","","2015-11-19","21:55:29","1","0");
INSERT INTO factura_cab_view VALUES("100","0","12","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","6","MESA 6","1","Cerrado","0","","2015-11-19","21:55:23","1","0");
INSERT INTO factura_cab_view VALUES("101","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","4","MESA 4","1","Cerrado","","","2015-11-19","22:20:15","1","1");
INSERT INTO factura_cab_view VALUES("102","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","5","MESA 5","1","Cerrado","","","2015-11-19","22:20:25","1","1");
INSERT INTO factura_cab_view VALUES("103","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","6","MESA 6","1","Cerrado","","","2015-11-19","22:40:03","1","1");
INSERT INTO factura_cab_view VALUES("104","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","3","MESA 3","1","Cerrado","","","2015-11-19","22:41:00","1","1");
INSERT INTO factura_cab_view VALUES("105","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-11-19","22:41:54","1","1");
INSERT INTO factura_cab_view VALUES("106","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","7","MESA 7","1","Cerrado","","","2015-11-19","22:49:39","1","1");
INSERT INTO factura_cab_view VALUES("107","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","7","MESA 7","1","Cerrado","","","2015-11-19","22:55:48","1","1");
INSERT INTO factura_cab_view VALUES("108","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","7","MESA 7","1","Cerrado","","","2015-11-19","22:55:52","1","1");
INSERT INTO factura_cab_view VALUES("109","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-11-19","22:56:15","1","1");
INSERT INTO factura_cab_view VALUES("110","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-11-19","22:56:45","1","1");
INSERT INTO factura_cab_view VALUES("111","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-11-19","22:56:52","1","1");
INSERT INTO factura_cab_view VALUES("112","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-11-19","22:56:56","1","1");
INSERT INTO factura_cab_view VALUES("113","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-11-19","22:57:44","1","1");
INSERT INTO factura_cab_view VALUES("114","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-11-19","22:57:50","1","1");
INSERT INTO factura_cab_view VALUES("115","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-11-19","22:57:52","1","1");
INSERT INTO factura_cab_view VALUES("116","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","1","Cerrado","","","2015-11-19","22:58:05","1","1");
INSERT INTO factura_cab_view VALUES("117","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","2","MESA 2","1","Cerrado","","","2015-11-19","22:58:20","1","1");
INSERT INTO factura_cab_view VALUES("118","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","8","MESA 8","1","Cerrado","","","2015-11-19","23:00:28","1","1");
INSERT INTO factura_cab_view VALUES("119","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","21","MESA 21","1","Cerrado","","","2015-11-19","23:01:04","1","1");
INSERT INTO factura_cab_view VALUES("120","","12","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","9","MESA 9","1","Cerrado","","","2015-11-19","23:01:41","1","1");
INSERT INTO factura_cab_view VALUES("121","0","13","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-19","23:12:12","1","0");
INSERT INTO factura_cab_view VALUES("122","0","11","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-19","23:17:00","2","0");
INSERT INTO factura_cab_view VALUES("123","0","14","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","16","MESA 16","1","Cerrado","0","","2015-11-19","23:22:13","1","0");
INSERT INTO factura_cab_view VALUES("124","0","15","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-19","23:19:43","2","0");
INSERT INTO factura_cab_view VALUES("125","0","15","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","18","MESA 18","1","Cerrado","0","","2015-11-19","23:19:23","2","0");
INSERT INTO factura_cab_view VALUES("126","0","16","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-20","13:22:47","1","0");
INSERT INTO factura_cab_view VALUES("127","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-11-20","11:36:11","1","0");
INSERT INTO factura_cab_view VALUES("128","0","16","22","JORGE ESCOBAR","3219801-9","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-20","01:13:05","1","0");
INSERT INTO factura_cab_view VALUES("129","0","16","7","KKKKK","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","10000","1","EN CAJA","15000","10.000","10000","1","10,000","4","MESA 4","1","Cerrado","0","","2015-11-20","01:11:09","1","0");
INSERT INTO factura_cab_view VALUES("130","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","50000","2.500","2500","1","2,500","18","MESA 18","1","Cerrado","0","","2015-11-20","01:10:30","1","0");
INSERT INTO factura_cab_view VALUES("131","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","5","MESA 5","1","Cerrado","0","","2015-11-20","01:11:00","1","0");
INSERT INTO factura_cab_view VALUES("132","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","3","MESA 3","1","Cerrado","0","","2015-11-20","11:26:05","1","0");
INSERT INTO factura_cab_view VALUES("133","0","16","2","GGGG","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","37000","1","EN CAJA","40000","37.000","37000","1","37,000","20","MESA 20","1","Cerrado","0","","2015-11-20","13:19:50","1","0");
INSERT INTO factura_cab_view VALUES("134","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","12500","1","EN CAJA","15000","12.500","12500","1","12,500","18","MESA 18","1","Cerrado","0","","2015-11-20","02:35:47","1","0");
INSERT INTO factura_cab_view VALUES("135","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","4","MESA 4","1","Cerrado","0","","2015-11-20","13:23:49","1","0");
INSERT INTO factura_cab_view VALUES("136","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","19","MESA 19","1","Cerrado","0","","2015-11-20","12:38:13","1","0");
INSERT INTO factura_cab_view VALUES("137","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","50000","5.000","5000","1","5,000","10","MESA 10","1","Cerrado","0","","2015-11-20","13:26:25","1","0");
INSERT INTO factura_cab_view VALUES("138","","16","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","7","MESA 7","1","Cerrado","","","2015-11-20","02:51:32","1","1");
INSERT INTO factura_cab_view VALUES("139","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","5","MESA 5","1","Cerrado","0","","2015-11-20","13:29:18","1","0");
INSERT INTO factura_cab_view VALUES("140","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-20","13:38:07","1","0");
INSERT INTO factura_cab_view VALUES("141","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","10000","1","EN CAJA","100000","10.000","10000","1","10,000","4","MESA 4","1","Cerrado","0","","2015-11-20","13:49:44","1","0");
INSERT INTO factura_cab_view VALUES("142","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","100000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","13:50:47","1","0");
INSERT INTO factura_cab_view VALUES("143","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","13:51:33","1","0");
INSERT INTO factura_cab_view VALUES("144","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","13:53:10","1","0");
INSERT INTO factura_cab_view VALUES("145","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-20","13:54:07","1","0");
INSERT INTO factura_cab_view VALUES("146","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","4","MESA 4","1","Cerrado","0","","2015-11-20","13:55:03","1","0");
INSERT INTO factura_cab_view VALUES("147","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","13:55:26","1","0");
INSERT INTO factura_cab_view VALUES("148","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-20","13:55:47","1","0");
INSERT INTO factura_cab_view VALUES("149","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","11000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-20","13:56:43","1","0");
INSERT INTO factura_cab_view VALUES("150","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-20","13:58:25","1","0");
INSERT INTO factura_cab_view VALUES("151","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-20","13:58:43","1","0");
INSERT INTO factura_cab_view VALUES("152","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","6000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","13:59:23","1","0");
INSERT INTO factura_cab_view VALUES("153","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","19","MESA 19","1","Cerrado","0","","2015-11-20","13:59:01","1","0");
INSERT INTO factura_cab_view VALUES("154","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","15000","11.000","11000","1","11,000","4","MESA 4","1","Cerrado","0","","2015-11-20","14:00:03","1","0");
INSERT INTO factura_cab_view VALUES("155","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-20","14:00:39","1","0");
INSERT INTO factura_cab_view VALUES("156","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:17:15","1","0");
INSERT INTO factura_cab_view VALUES("157","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:18:12","1","0");
INSERT INTO factura_cab_view VALUES("158","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","5","MESA 5","1","Cerrado","0","","2015-11-20","14:18:29","1","0");
INSERT INTO factura_cab_view VALUES("159","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","50000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:29:43","1","0");
INSERT INTO factura_cab_view VALUES("160","0","16","22","JORGE ESCOBAR","3219801-9","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-20","14:48:53","1","0");
INSERT INTO factura_cab_view VALUES("161","0","16","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","11","MESA 11","1","Cerrado","0","","2015-11-20","14:49:53","1","0");
INSERT INTO factura_cab_view VALUES("162","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:51:04","1","0");
INSERT INTO factura_cab_view VALUES("163","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","50000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:51:49","1","0");
INSERT INTO factura_cab_view VALUES("164","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","1","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:52:35","1","0");
INSERT INTO factura_cab_view VALUES("165","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","1000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:53:02","1","0");
INSERT INTO factura_cab_view VALUES("166","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","10000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:53:28","1","0");
INSERT INTO factura_cab_view VALUES("167","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","3","MESA 3","1","Cerrado","0","","2015-11-20","14:53:57","1","0");
INSERT INTO factura_cab_view VALUES("168","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","16000","1","EN CAJA","20000","16.000","16000","1","16,000","3","MESA 3","1","Cerrado","0","","2015-11-20","14:54:43","1","0");
INSERT INTO factura_cab_view VALUES("169","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","5","MESA 5","1","Cerrado","0","","2015-11-20","14:57:16","1","0");
INSERT INTO factura_cab_view VALUES("170","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","20000","13.500","13500","1","13,500","4","MESA 4","1","Cerrado","0","","2015-11-20","14:57:46","1","0");
INSERT INTO factura_cab_view VALUES("171","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","5","MESA 5","1","Cerrado","0","","2015-11-20","15:02:04","1","0");
INSERT INTO factura_cab_view VALUES("172","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","15:13:34","1","0");
INSERT INTO factura_cab_view VALUES("173","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","15:14:31","1","0");
INSERT INTO factura_cab_view VALUES("174","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-20","15:15:27","1","0");
INSERT INTO factura_cab_view VALUES("175","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","50000","13.500","13500","1","13,500","21","MESA 21","1","Cerrado","0","","2015-11-20","15:19:12","1","0");
INSERT INTO factura_cab_view VALUES("176","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-20","15:19:56","1","0");
INSERT INTO factura_cab_view VALUES("177","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-21","12:30:20","1","0");
INSERT INTO factura_cab_view VALUES("178","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","4000","5.000","5000","1","5,000","8","MESA 8","1","Cerrado","0","","2015-11-21","12:31:21","1","0");
INSERT INTO factura_cab_view VALUES("179","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","2","MESA 2","1","Cerrado","0","","2015-11-21","12:37:03","1","0");
INSERT INTO factura_cab_view VALUES("180","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","12000","11.000","11000","1","11,000","4","MESA 4","1","Cerrado","0","","2015-11-21","12:37:39","1","0");
INSERT INTO factura_cab_view VALUES("181","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-21","12:38:47","1","0");
INSERT INTO factura_cab_view VALUES("182","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","4","MESA 4","1","Cerrado","0","","2015-11-21","12:51:22","1","0");
INSERT INTO factura_cab_view VALUES("183","","16","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","5","MESA 5","1","Cerrado","","","2015-11-21","12:52:42","1","1");
INSERT INTO factura_cab_view VALUES("184","0","16","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-21","13:08:17","1","0");
INSERT INTO factura_cab_view VALUES("185","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","150000","11.000","11000","1","11,000","3","MESA 3","1","Cerrado","0","","2015-11-21","13:23:34","1","0");
INSERT INTO factura_cab_view VALUES("186","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-21","13:23:54","1","0");
INSERT INTO factura_cab_view VALUES("187","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","15000","11.000","11000","1","11,000","3","MESA 3","1","Cerrado","0","","2015-11-21","13:26:07","1","0");
INSERT INTO factura_cab_view VALUES("188","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","54000","1","EN CAJA","55000","54.000","54000","1","54,000","1","MESA 1","1","Cerrado","0","","2015-11-21","14:22:31","1","0");
INSERT INTO factura_cab_view VALUES("189","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-11-21","14:47:46","1","0");
INSERT INTO factura_cab_view VALUES("190","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","1","MESA 1","1","Cerrado","0","","2015-11-21","14:47:58","1","0");
INSERT INTO factura_cab_view VALUES("191","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-21","14:54:05","1","0");
INSERT INTO factura_cab_view VALUES("192","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","15000","11.000","11000","1","11,000","10","MESA 10","1","Cerrado","0","","2015-11-21","14:55:02","1","0");
INSERT INTO factura_cab_view VALUES("193","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","18500","1","EN CAJA","20000","18.500","18500","1","18,500","2","MESA 2","1","Cerrado","0","","2015-11-21","14:57:48","1","0");
INSERT INTO factura_cab_view VALUES("194","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-21","15:02:33","1","0");
INSERT INTO factura_cab_view VALUES("195","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","2","MESA 2","1","Cerrado","0","","2015-11-21","15:04:01","1","0");
INSERT INTO factura_cab_view VALUES("196","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-21","15:26:08","1","0");
INSERT INTO factura_cab_view VALUES("197","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","15500","1","EN CAJA","20000","15.500","15500","1","15,500","3","MESA 3","1","Cerrado","0","","2015-11-21","15:32:55","1","0");
INSERT INTO factura_cab_view VALUES("198","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","11","MESA 11","1","Cerrado","0","","2015-11-21","15:34:55","1","0");
INSERT INTO factura_cab_view VALUES("199","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-21","15:40:40","1","0");
INSERT INTO factura_cab_view VALUES("200","0","17","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","12","MESA 12","1","Cerrado","0","","2015-11-21","15:40:32","1","0");
INSERT INTO factura_cab_view VALUES("201","0","18","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-21","17:15:32","1","0");
INSERT INTO factura_cab_view VALUES("202","0","18","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-21","17:21:12","1","0");
INSERT INTO factura_cab_view VALUES("203","0","18","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-11-21","17:17:00","1","0");
INSERT INTO factura_cab_view VALUES("204","0","18","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","21","MESA 21","1","Cerrado","0","","2015-11-21","17:22:05","1","0");
INSERT INTO factura_cab_view VALUES("205","0","18","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","50000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-21","17:31:59","1","0");
INSERT INTO factura_cab_view VALUES("206","0","18","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-21","17:33:09","1","0");
INSERT INTO factura_cab_view VALUES("207","0","18","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","78000","1","EN CAJA","100000","78.000","78000","1","78,000","3","MESA 3","1","Cerrado","0","","2015-11-21","22:43:47","1","0");
INSERT INTO factura_cab_view VALUES("208","0","18","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","50000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-21","17:38:07","1","0");
INSERT INTO factura_cab_view VALUES("209","0","18","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-21","17:39:30","1","0");
INSERT INTO factura_cab_view VALUES("210","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","40000","2.500","2500","1","2,500","5","MESA 5","1","Cerrado","0","","2015-11-21","17:41:16","1","0");
INSERT INTO factura_cab_view VALUES("211","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","10000","2.500","2500","1","2,500","12","MESA 12","1","Cerrado","0","","2015-11-21","22:43:57","1","0");
INSERT INTO factura_cab_view VALUES("212","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-22","04:35:16","1","0");
INSERT INTO factura_cab_view VALUES("213","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-22","11:53:27","1","0");
INSERT INTO factura_cab_view VALUES("214","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","15000","1","EN CAJA","20000","15.000","15000","1","15,000","4","MESA 4","1","Cerrado","0","","2015-11-22","12:40:40","1","0");
INSERT INTO factura_cab_view VALUES("215","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","50000","1","EN CAJA","100000","50.000","50000","1","50,000","4","MESA 4","1","Cerrado","0","","2015-11-22","12:49:46","1","0");
INSERT INTO factura_cab_view VALUES("216","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","32000","1","EN CAJA","35000","32.000","32000","1","32,000","3","MESA 3","1","Cerrado","0","","2015-11-22","12:57:24","1","0");
INSERT INTO factura_cab_view VALUES("217","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","50000","7.500","7500","1","7,500","4","MESA 4","1","Cerrado","0","","2015-11-22","13:07:16","1","0");
INSERT INTO factura_cab_view VALUES("218","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","19","MESA 19","1","Cerrado","0","","2015-11-22","13:07:54","1","0");
INSERT INTO factura_cab_view VALUES("219","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","5","MESA 5","1","Cerrado","0","","2015-11-22","13:04:39","1","0");
INSERT INTO factura_cab_view VALUES("220","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","1","MESA 1","1","Cerrado","0","","2015-11-22","13:22:42","1","0");
INSERT INTO factura_cab_view VALUES("221","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","16000","1","EN CAJA","20000","16.000","16000","1","16,000","17","MESA 17","1","Cerrado","0","","2015-11-22","13:54:51","1","0");
INSERT INTO factura_cab_view VALUES("222","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","10000","7.500","7500","1","7,500","12","MESA 12","1","Cerrado","0","","2015-11-22","13:50:42","1","0");
INSERT INTO factura_cab_view VALUES("223","0","18","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","15000","11.000","11000","1","11,000","1","MESA 1","1","Cerrado","0","","2015-11-22","13:53:15","1","0");
INSERT INTO factura_cab_view VALUES("224","0","18","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","15000","11.000","11000","1","11,000","1","MESA 1","1","Cerrado","0","","2015-11-22","13:54:41","1","0");
INSERT INTO factura_cab_view VALUES("225","0","19","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-22","16:21:52","1","0");
INSERT INTO factura_cab_view VALUES("226","0","19","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","9000","1","EN CAJA","10000","9.000","9000","1","9,000","19","MESA 19","1","Cerrado","0","","2015-11-22","16:21:59","1","0");
INSERT INTO factura_cab_view VALUES("227","0","20","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-22","22:58:51","1","0");
INSERT INTO factura_cab_view VALUES("228","","20","12","JORGE","--","","","","","","","","","","","","","","1","","4","MESA 4","1","Cerrado","","","2015-11-22","22:58:56","1","1");
INSERT INTO factura_cab_view VALUES("229","0","20","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-23","18:51:02","1","0");
INSERT INTO factura_cab_view VALUES("230","0","20","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","10000","1","EN CAJA","18500","10.000","10000","1","10,000","4","MESA 4","1","Cerrado","0","","2015-11-23","18:56:34","1","0");
INSERT INTO factura_cab_view VALUES("231","0","20","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","21","MESA 21","1","Cerrado","0","","2015-11-23","18:59:24","1","0");
INSERT INTO factura_cab_view VALUES("232","0","20","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","10","MESA 10","1","Cerrado","0","","2015-11-23","18:59:33","1","0");
INSERT INTO factura_cab_view VALUES("233","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-23","19:00:30","1","0");
INSERT INTO factura_cab_view VALUES("234","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","13","MESA 13","1","Cerrado","0","","2015-11-23","19:00:59","1","0");
INSERT INTO factura_cab_view VALUES("235","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","3","MESA 3","1","Cerrado","0","","2015-11-23","19:06:15","1","0");
INSERT INTO factura_cab_view VALUES("236","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","10000","1","EN CAJA","15000","10.000","10000","1","10,000","18","MESA 18","1","Cerrado","0","","2015-11-23","19:07:43","1","0");
INSERT INTO factura_cab_view VALUES("237","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","10000","7.500","7500","1","7,500","18","MESA 18","1","Cerrado","0","","2015-11-25","15:02:12","1","0");
INSERT INTO factura_cab_view VALUES("238","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","10","MESA 10","1","Cerrado","0","","2015-11-25","15:02:20","1","0");
INSERT INTO factura_cab_view VALUES("239","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:06:42","1","0");
INSERT INTO factura_cab_view VALUES("240","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:08:29","1","0");
INSERT INTO factura_cab_view VALUES("241","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:10:02","1","0");
INSERT INTO factura_cab_view VALUES("242","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:10:46","1","0");
INSERT INTO factura_cab_view VALUES("243","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:12:21","1","0");
INSERT INTO factura_cab_view VALUES("244","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:12:55","1","0");
INSERT INTO factura_cab_view VALUES("245","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:13:57","1","0");
INSERT INTO factura_cab_view VALUES("246","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","10:16:53","1","0");
INSERT INTO factura_cab_view VALUES("247","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","6000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","10:17:26","1","0");
INSERT INTO factura_cab_view VALUES("248","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:30:50","1","0");
INSERT INTO factura_cab_view VALUES("249","","21","12","JORGE","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","10:30:53","1","0");
INSERT INTO factura_cab_view VALUES("250","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-25","15:18:34","1","0");
INSERT INTO factura_cab_view VALUES("251","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","15:02:03","1","0");
INSERT INTO factura_cab_view VALUES("252","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","0","FACTURACION","1","Cerrado","0","","2015-11-25","11:12:27","1","0");
INSERT INTO factura_cab_view VALUES("253","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","50000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","11:32:39","1","0");
INSERT INTO factura_cab_view VALUES("254","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:18:42","1","0");
INSERT INTO factura_cab_view VALUES("255","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","2","MESA 2","1","Cerrado","0","","2015-11-25","15:20:04","1","0");
INSERT INTO factura_cab_view VALUES("256","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:19:06","1","0");
INSERT INTO factura_cab_view VALUES("257","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:20:18","1","0");
INSERT INTO factura_cab_view VALUES("258","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-25","15:21:09","1","0");
INSERT INTO factura_cab_view VALUES("259","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:21:18","1","0");
INSERT INTO factura_cab_view VALUES("260","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","3000","5.000","5000","1","5,000","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:21:29","1","0");
INSERT INTO factura_cab_view VALUES("261","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:32:46","1","0");
INSERT INTO factura_cab_view VALUES("262","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-25","15:21:47","1","0");
INSERT INTO factura_cab_view VALUES("263","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","21","MESA 21","1","Cerrado","0","","2015-11-25","15:33:54","1","0");
INSERT INTO factura_cab_view VALUES("264","0","21","12","JORGE","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:33:17","1","0");
INSERT INTO factura_cab_view VALUES("265","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:35:06","1","0");
INSERT INTO factura_cab_view VALUES("266","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","15:34:44","1","0");
INSERT INTO factura_cab_view VALUES("267","","21","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","0","FACTURACION","1","Cerrado","","","2015-11-25","15:35:06","1","1");
INSERT INTO factura_cab_view VALUES("268","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:46:09","1","0");
INSERT INTO factura_cab_view VALUES("269","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","15:45:09","1","0");
INSERT INTO factura_cab_view VALUES("270","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","5000","1","EN CAJA","10000","5.000","5000","1","5,000","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:50:58","1","0");
INSERT INTO factura_cab_view VALUES("271","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","12","MESA 12","1","Cerrado","0","","2015-11-25","15:50:36","1","0");
INSERT INTO factura_cab_view VALUES("272","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:52:55","1","0");
INSERT INTO factura_cab_view VALUES("273","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","19","MESA 19","1","Cerrado","0","","2015-11-25","15:52:44","1","0");
INSERT INTO factura_cab_view VALUES("274","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","10000","7.500","7500","1","7,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","15:58:21","1","0");
INSERT INTO factura_cab_view VALUES("275","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","12","MESA 12","1","Cerrado","0","","2015-11-25","15:57:56","1","0");
INSERT INTO factura_cab_view VALUES("276","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","16:06:18","1","0");
INSERT INTO factura_cab_view VALUES("277","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","16:13:29","1","0");
INSERT INTO factura_cab_view VALUES("278","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-25","16:13:08","1","0");
INSERT INTO factura_cab_view VALUES("279","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","16:17:43","1","0");
INSERT INTO factura_cab_view VALUES("280","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","16:16:40","1","0");
INSERT INTO factura_cab_view VALUES("281","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","18:12:31","1","0");
INSERT INTO factura_cab_view VALUES("282","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","18:24:10","1","0");
INSERT INTO factura_cab_view VALUES("283","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","18:26:58","1","0");
INSERT INTO factura_cab_view VALUES("284","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","18:27:30","1","0");
INSERT INTO factura_cab_view VALUES("285","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","18:29:38","1","0");
INSERT INTO factura_cab_view VALUES("286","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","18:31:27","1","0");
INSERT INTO factura_cab_view VALUES("287","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","111","2.500","2500","1","2,500","5","MESA 5","1","Cerrado","0","","2015-11-25","18:32:58","1","0");
INSERT INTO factura_cab_view VALUES("288","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","18:35:27","1","0");
INSERT INTO factura_cab_view VALUES("289","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","18:36:11","1","0");
INSERT INTO factura_cab_view VALUES("290","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","18:39:37","1","0");
INSERT INTO factura_cab_view VALUES("291","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","12","MESA 12","1","Cerrado","0","","2015-11-25","18:36:44","1","0");
INSERT INTO factura_cab_view VALUES("292","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","10","MESA 10","1","Cerrado","0","","2015-11-25","18:40:17","1","0");
INSERT INTO factura_cab_view VALUES("293","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","11","MESA 11","1","Cerrado","0","","2015-11-25","18:41:07","1","0");
INSERT INTO factura_cab_view VALUES("294","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","10","MESA 10","1","Cerrado","0","","2015-11-25","18:41:58","1","0");
INSERT INTO factura_cab_view VALUES("295","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","19:02:25","1","0");
INSERT INTO factura_cab_view VALUES("296","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","11","MESA 11","1","Cerrado","0","","2015-11-25","19:06:06","1","0");
INSERT INTO factura_cab_view VALUES("297","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","55000","1","EN CAJA","3000","55.000","55000","1","55,000","4","MESA 4","1","Cerrado","0","","2015-11-25","19:11:07","1","0");
INSERT INTO factura_cab_view VALUES("298","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","20","MESA 20","1","Cerrado","0","","2015-11-25","20:13:06","1","0");
INSERT INTO factura_cab_view VALUES("299","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","20:19:58","1","0");
INSERT INTO factura_cab_view VALUES("300","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","20:21:34","1","0");
INSERT INTO factura_cab_view VALUES("301","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","11","MESA 11","1","Cerrado","0","","2015-11-25","20:25:33","1","0");
INSERT INTO factura_cab_view VALUES("302","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","3000","13.500","13500","1","13,500","3","MESA 3","1","Cerrado","0","","2015-11-25","20:26:03","1","0");
INSERT INTO factura_cab_view VALUES("303","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-25","20:29:25","1","0");
INSERT INTO factura_cab_view VALUES("304","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","5000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-25","22:42:31","1","0");
INSERT INTO factura_cab_view VALUES("305","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","11","MESA 11","1","Cerrado","0","","2015-11-26","12:38:47","1","0");
INSERT INTO factura_cab_view VALUES("306","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-26","12:34:54","1","0");
INSERT INTO factura_cab_view VALUES("307","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","4","MESA 4","1","Cerrado","0","","2015-11-26","12:40:11","1","0");
INSERT INTO factura_cab_view VALUES("308","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-26","12:46:29","1","0");
INSERT INTO factura_cab_view VALUES("309","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","3","MESA 3","1","Cerrado","0","","2015-11-26","12:47:36","1","0");
INSERT INTO factura_cab_view VALUES("310","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-26","13:09:08","1","0");
INSERT INTO factura_cab_view VALUES("311","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","3","MESA 3","1","Cerrado","0","","2015-11-26","20:58:07","1","0");
INSERT INTO factura_cab_view VALUES("312","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-26","21:17:12","1","0");
INSERT INTO factura_cab_view VALUES("313","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","16000","1","EN CAJA","30000","16.000","16000","1","16,000","3","MESA 3","1","Cerrado","0","","2015-11-26","21:42:27","1","0");
INSERT INTO factura_cab_view VALUES("314","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","16000","1","EN CAJA","30000","16.000","16000","1","16,000","3","MESA 3","1","Cerrado","0","","2015-11-26","21:49:35","1","0");
INSERT INTO factura_cab_view VALUES("315","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","2","MESA 2","1","Cerrado","0","","2015-11-26","22:18:55","1","0");
INSERT INTO factura_cab_view VALUES("316","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","10","MESA 10","1","Cerrado","0","","2015-11-26","22:25:58","1","0");
INSERT INTO factura_cab_view VALUES("317","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","15000","13.500","13500","1","13,500","4","MESA 4","1","Cerrado","0","","2015-11-26","22:27:11","1","0");
INSERT INTO factura_cab_view VALUES("318","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","30000","13.500","13500","1","13,500","4","MESA 4","1","Cerrado","0","","2015-11-26","22:27:47","1","0");
INSERT INTO factura_cab_view VALUES("319","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-26","22:31:22","1","0");
INSERT INTO factura_cab_view VALUES("320","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","4","MESA 4","1","Cerrado","0","","2015-11-26","22:31:57","1","0");
INSERT INTO factura_cab_view VALUES("321","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","300","2.500","2500","1","2,500","10","MESA 10","1","Cerrado","0","","2015-11-26","22:33:18","1","0");
INSERT INTO factura_cab_view VALUES("322","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13500","1","EN CAJA","30000","13.500","13500","1","13,500","0","FACTURACION","1","Cerrado","0","","2015-11-26","22:32:48","1","0");
INSERT INTO factura_cab_view VALUES("323","","21","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","1","MESA 1","0","Pendiente","","","2015-11-26","23:19:23","1","0");
INSERT INTO factura_cab_view VALUES("324","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-11-26","23:36:54","1","0");
INSERT INTO factura_cab_view VALUES("325","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-11-26","23:36:42","1","0");
INSERT INTO factura_cab_view VALUES("326","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2015-12-29","13:31:01","1","0");
INSERT INTO factura_cab_view VALUES("327","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","30000","2.500","2500","1","2,500","1","MESA 1","1","Cerrado","0","","2015-12-29","13:30:23","1","0");
INSERT INTO factura_cab_view VALUES("328","","21","1","CLIENTE OCACIONAL","--","","","","","","","","","","","","","","1","","21","MESA 21","0","Pendiente","","","2015-12-29","13:31:30","1","0");
INSERT INTO factura_cab_view VALUES("329","0","21","1","CLIENTE OCACIONAL","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","15000","11.000","11000","1","11,000","0","FACTURACION","1","Cerrado","0","","2016-02-04","20:37:09","1","0");
INSERT INTO factura_cab_view VALUES("330","0","21","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2016-02-04","20:39:02","1","0");
INSERT INTO factura_cab_view VALUES("331","0","21","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2016-02-22","19:36:07","1","0");
INSERT INTO factura_cab_view VALUES("332","","21","10","ARIEL","3219801","","","","","","","","","","","","","","1","","3","MESA 3","0","Pendiente","","","2016-02-22","19:13:25","1","0");
INSERT INTO factura_cab_view VALUES("333","0","21","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","2500","1","EN CAJA","3000","2.500","2500","1","2,500","0","FACTURACION","1","Cerrado","0","","2016-02-22","19:41:55","1","0");
INSERT INTO factura_cab_view VALUES("334","0","21","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","7500","1","EN CAJA","10000","7.500","7500","1","7,500","0","FACTURACION","1","Cerrado","0","","2016-02-22","19:42:06","1","0");
INSERT INTO factura_cab_view VALUES("335","0","21","10","ARIEL","3219801","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","13000","1","EN CAJA","15000","13.000","13000","1","13,000","0","FACTURACION","1","Cerrado","0","","2016-05-30","10:46:57","1","0");
INSERT INTO factura_cab_view VALUES("336","0","21","2","GGGG","--","1","EFECTIVO","1","CONTADO","1","GUARANIES","1","11000","1","EN CAJA","12000","11.000","11000","1","11,000","0","FACTURACION","1","Cerrado","0","","2016-05-31","15:02:59","1","0");
INSERT INTO factura_cab_view VALUES("337","","21","10","ARIEL","3219801","","","","","","","","","","","","","","1","","0","FACTURACION","0","Pendiente","","","2016-05-31","15:03:04","1","0");


DROP TABLE IF EXISTS factura_det;

CREATE TABLE `factura_det` (
  `mde_cod` int(11) NOT NULL AUTO_INCREMENT,
  `ape_cod` int(11) DEFAULT NULL,
  `fac_cod` int(11) DEFAULT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `pro_can` double DEFAULT NULL,
  `pro_gus1` int(11) DEFAULT NULL,
  `pro_gus2` int(11) DEFAULT NULL,
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
  CONSTRAINT `FK_factura_det` FOREIGN KEY (`pro_cod`) REFERENCES `productos` (`pro_cod`),
  CONSTRAINT `FK_factura_det_fac_cod` FOREIGN KEY (`fac_cod`) REFERENCES `factura_cab` (`fac_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=447 DEFAULT CHARSET=latin1;

INSERT INTO factura_det VALUES("1","1","1","1","1","","","2500","2500","1","1","2015-10-10","22:07:35","1","0");
INSERT INTO factura_det VALUES("2","3","6","1","1","","","2500","2500","1","1","2015-10-10","22:13:52","2","1");
INSERT INTO factura_det VALUES("3","2","7","1","3","","","2500","7500","1","1","2015-10-10","22:14:07","1","0");
INSERT INTO factura_det VALUES("4","3","6","1","1","","","2500","2500","1","1","2015-10-10","22:17:41","2","0");
INSERT INTO factura_det VALUES("5","4","8","1","1","","","2500","2500","1","1","2015-10-11","11:56:10","1","0");
INSERT INTO factura_det VALUES("6","4","9","1","3","","","2500","7500","1","1","2015-10-11","12:08:02","1","0");
INSERT INTO factura_det VALUES("7","4","10","1","1","","","2500","2500","1","1","2015-10-11","12:11:02","1","0");
INSERT INTO factura_det VALUES("8","4","11","1","1","","","2500","2500","1","1","2015-10-11","12:36:09","1","0");
INSERT INTO factura_det VALUES("9","4","12","1","1","","","2500","2500","1","1","2015-10-11","12:36:34","1","0");
INSERT INTO factura_det VALUES("10","4","13","1","1","","","2500","2500","1","1","2015-10-11","12:36:42","1","0");
INSERT INTO factura_det VALUES("11","4","13","1","3","","","2500","7500","1","1","2015-10-11","12:39:02","1","0");
INSERT INTO factura_det VALUES("12","4","14","1","13","","","2500","32500","1","1","2015-10-11","12:40:34","1","1");
INSERT INTO factura_det VALUES("13","4","14","1","3","","","2500","7500","1","1","2015-10-11","12:45:22","1","0");
INSERT INTO factura_det VALUES("14","4","15","1","1","","","2500","2500","1","1","2015-10-11","12:45:38","1","0");
INSERT INTO factura_det VALUES("15","4","16","1","1","","","2500","2500","1","1","2015-10-11","12:48:17","1","1");
INSERT INTO factura_det VALUES("16","4","17","1","1","","","2500","2500","1","1","2015-10-11","12:55:40","1","1");
INSERT INTO factura_det VALUES("17","6","18","1","10","","","2500","25000","1","1","2015-10-11","13:25:12","1","0");
INSERT INTO factura_det VALUES("18","6","19","1","1","","","2500","2500","1","1","2015-10-11","13:25:19","1","0");
INSERT INTO factura_det VALUES("19","6","20","1","1","","","2500","2500","1","1","2015-10-11","13:25:39","1","0");
INSERT INTO factura_det VALUES("20","6","21","1","1","","","2500","2500","1","1","2015-10-11","13:25:48","1","0");
INSERT INTO factura_det VALUES("21","6","22","1","1","","","2500","2500","1","1","2015-10-11","13:25:56","1","0");
INSERT INTO factura_det VALUES("22","6","23","1","1","","","2500","2500","1","1","2015-10-11","13:26:02","1","0");
INSERT INTO factura_det VALUES("23","6","21","1","1","","","2500","2500","1","1","2015-10-11","13:27:11","1","0");
INSERT INTO factura_det VALUES("24","6","24","1","1","","","2500","2500","1","1","2015-10-11","13:33:20","1","0");
INSERT INTO factura_det VALUES("25","7","25","1","1","","","2500","2500","1","1","2015-10-11","23:48:41","1","1");
INSERT INTO factura_det VALUES("26","7","26","1","1","","","2500","2500","1","1","2015-10-11","23:49:55","1","0");
INSERT INTO factura_det VALUES("27","7","27","1","1","","","2500","2500","1","1","2015-10-11","23:57:05","1","0");
INSERT INTO factura_det VALUES("28","7","27","1","1","","","2500","2500","1","1","2015-10-12","00:02:20","1","0");
INSERT INTO factura_det VALUES("29","7","27","1","1","","","2500","2500","1","1","2015-10-12","00:03:32","1","0");
INSERT INTO factura_det VALUES("30","7","27","1","1","","","2500","2500","1","1","2015-10-12","00:05:53","1","0");
INSERT INTO factura_det VALUES("31","7","27","1","1","","","2500","2500","1","1","2015-10-12","00:10:13","1","0");
INSERT INTO factura_det VALUES("32","7","27","1","2","","","2500","5000","1","1","2015-10-12","00:10:27","1","0");
INSERT INTO factura_det VALUES("33","7","28","1","1","","","2500","2500","1","1","2015-10-12","00:11:06","1","0");
INSERT INTO factura_det VALUES("34","7","28","1","2","","","2500","5000","1","1","2015-10-12","00:11:17","1","0");
INSERT INTO factura_det VALUES("35","7","28","1","1","11","22","2500","2500","1","1","2015-10-12","00:18:35","1","0");
INSERT INTO factura_det VALUES("36","7","28","1","3","11","33","2500","7500","1","1","2015-10-12","00:29:43","1","0");
INSERT INTO factura_det VALUES("37","7","29","1","1","11","22","2500","2500","1","1","2015-10-12","00:58:46","1","0");
INSERT INTO factura_det VALUES("38","7","30","1","1","11","11","2500","2500","1","1","2015-10-12","01:05:06","1","0");
INSERT INTO factura_det VALUES("39","7","30","1","1","0","0","2500","2500","1","1","2015-10-12","01:07:21","1","0");
INSERT INTO factura_det VALUES("40","7","30","1","1","","","2500","2500","1","1","2015-10-12","01:10:22","1","0");
INSERT INTO factura_det VALUES("41","7","31","1","1","","","2500","2500","1","1","2015-10-12","01:13:03","1","0");
INSERT INTO factura_det VALUES("42","7","31","1","3","","","2500","7500","1","1","2015-10-12","01:14:45","1","0");
INSERT INTO factura_det VALUES("43","7","31","1","3","","","2500","7500","1","1","2015-10-12","01:14:59","1","0");
INSERT INTO factura_det VALUES("44","7","32","1","1","","","2500","2500","1","1","2015-10-12","01:19:27","1","0");
INSERT INTO factura_det VALUES("45","7","33","1","1","","","2500","2500","1","1","2015-10-12","01:19:50","1","0");
INSERT INTO factura_det VALUES("46","7","33","1","1","","","2500","2500","1","1","2015-10-12","01:19:59","1","0");
INSERT INTO factura_det VALUES("47","7","33","1","1","","","2500","2500","1","1","2015-10-12","01:20:16","1","0");
INSERT INTO factura_det VALUES("48","7","34","1","1","","","2500","2500","1","1","2015-10-12","01:21:04","1","0");
INSERT INTO factura_det VALUES("49","7","34","1","1","","","2500","2500","1","1","2015-10-12","01:21:45","1","0");
INSERT INTO factura_det VALUES("50","7","34","1","1","","","2500","2500","1","1","2015-10-12","01:22:44","1","0");
INSERT INTO factura_det VALUES("51","7","34","1","1","","","2500","2500","1","1","2015-10-12","01:23:12","1","0");
INSERT INTO factura_det VALUES("52","7","34","1","1","11","32","2500","2500","1","1","2015-10-12","01:24:04","1","0");
INSERT INTO factura_det VALUES("53","7","33","1","1","11","32","2500","2500","1","1","2015-10-12","01:26:01","1","0");
INSERT INTO factura_det VALUES("54","8","35","1","1","11","22","2500","2500","1","1","2015-10-12","16:14:01","1","0");
INSERT INTO factura_det VALUES("55","8","35","1","1","","","2500","2500","1","1","2015-10-12","20:54:01","1","0");
INSERT INTO factura_det VALUES("56","8","35","1","1","11","23","2500","2500","1","1","2015-10-12","20:54:10","1","0");
INSERT INTO factura_det VALUES("57","8","36","1","1","","","2500","2500","1","1","2015-10-12","21:04:57","1","0");
INSERT INTO factura_det VALUES("58","8","36","1","1","11","11","2500","2500","1","1","2015-10-12","21:05:03","1","0");
INSERT INTO factura_det VALUES("59","9","37","1","30","","","2500","75000","1","1","2015-10-19","17:56:21","1","0");
INSERT INTO factura_det VALUES("60","10","38","2","2","","","2000000","4000000","1","1","2015-10-19","18:03:39","1","0");
INSERT INTO factura_det VALUES("61","10","39","2","1","","","2000000","2000000","1","1","2015-10-19","18:27:59","1","0");
INSERT INTO factura_det VALUES("62","10","40","2","1","","","2000000","2000000","1","1","2015-10-19","23:00:02","1","0");
INSERT INTO factura_det VALUES("63","10","41","1","1","","","2500","2500","1","1","2015-10-19","23:11:17","1","0");
INSERT INTO factura_det VALUES("64","10","42","2","1","","","2000000","2000000","1","1","2015-10-20","21:26:14","1","0");
INSERT INTO factura_det VALUES("65","10","43","2","1","","","2000000","2000000","1","1","2015-10-20","21:42:56","1","0");
INSERT INTO factura_det VALUES("66","10","44","2","1","","","2000000","2000000","1","1","2015-10-20","21:43:39","1","0");
INSERT INTO factura_det VALUES("67","10","45","1","1","","","2500","2500","1","1","2015-10-20","22:11:18","1","0");
INSERT INTO factura_det VALUES("68","10","46","1","1","","","2500","2500","1","1","2015-10-20","23:07:56","1","0");
INSERT INTO factura_det VALUES("69","10","47","2","1","","","2000000","2000000","1","1","2015-10-20","23:08:21","1","0");
INSERT INTO factura_det VALUES("70","10","48","2","1","","","2000000","2000000","1","1","2015-10-20","23:09:13","1","0");
INSERT INTO factura_det VALUES("71","10","49","1","1","","","2500","2500","1","1","2015-10-20","23:09:34","1","0");
INSERT INTO factura_det VALUES("72","10","50","1","1","","","2500","2500","1","1","2015-10-20","23:36:25","1","0");
INSERT INTO factura_det VALUES("73","10","51","1","1","","","2500","2500","1","1","2015-10-20","23:36:48","1","0");
INSERT INTO factura_det VALUES("74","10","52","1","1","","","2500","2500","1","1","2015-10-20","23:37:56","1","0");
INSERT INTO factura_det VALUES("75","10","53","2","1","","","2000000","2000000","1","1","2015-10-20","23:38:40","1","0");
INSERT INTO factura_det VALUES("76","10","54","2","1","","","2000000","2000000","1","1","2015-10-20","23:39:09","1","0");
INSERT INTO factura_det VALUES("77","10","55","1","1","","","2500","2500","1","1","2015-10-20","23:39:32","1","0");
INSERT INTO factura_det VALUES("78","10","56","2","1","","","2000000","2000000","1","1","2015-10-20","23:42:12","1","0");
INSERT INTO factura_det VALUES("79","10","57","1","1","","","2500","2500","1","1","2015-10-20","23:42:20","1","0");
INSERT INTO factura_det VALUES("80","10","58","1","1","","","2500","2500","1","1","2015-10-20","23:44:20","1","0");
INSERT INTO factura_det VALUES("81","10","59","1","1","","","2500","2500","1","1","2015-10-20","23:44:49","1","0");
INSERT INTO factura_det VALUES("82","10","59","1","5","","","2500","12500","1","1","2015-10-20","23:44:53","1","0");
INSERT INTO factura_det VALUES("83","10","60","2","1","","","2000000","2000000","1","1","2015-10-22","15:55:38","1","0");
INSERT INTO factura_det VALUES("84","10","61","2","1","","","2000000","2000000","1","1","2015-10-22","15:57:01","1","0");
INSERT INTO factura_det VALUES("85","10","62","2","1","","","2000000","2000000","1","1","2015-10-22","15:59:45","1","0");
INSERT INTO factura_det VALUES("86","10","63","1","1","","","2500","2500","1","1","2015-10-26","10:15:22","1","1");
INSERT INTO factura_det VALUES("87","10","63","1","1","","","2500","2500","0","1","2015-10-26","10:26:49","1","1");
INSERT INTO factura_det VALUES("88","10","63","1","1","11","22","2500","2500","1","1","2015-10-26","10:26:59","1","0");
INSERT INTO factura_det VALUES("89","10","63","1","1","11","4","2500","2500","1","1","2015-10-26","10:43:52","1","0");
INSERT INTO factura_det VALUES("90","10","64","1","1","3","8","2500","2500","1","1","2015-10-26","10:44:10","1","0");
INSERT INTO factura_det VALUES("91","10","64","1","1","","","2500","2500","1","1","2015-10-26","10:50:10","1","0");
INSERT INTO factura_det VALUES("92","10","65","1","1","33","11","2500","2500","1","1","2015-10-26","11:00:02","1","0");
INSERT INTO factura_det VALUES("93","10","65","1","1","","","2500","2500","1","1","2015-10-26","11:00:33","1","1");
INSERT INTO factura_det VALUES("94","10","65","1","1","11","3","2500","2500","1","1","2015-10-26","11:00:41","1","0");
INSERT INTO factura_det VALUES("95","10","65","3","1","","","6500","6500","1","1","2015-10-26","11:12:40","1","0");
INSERT INTO factura_det VALUES("96","10","65","1","1","11","4","2500","2500","1","1","2015-10-27","12:40:20","1","0");
INSERT INTO factura_det VALUES("97","10","66","1","1","4","3","2500","2500","1","1","2015-10-27","12:41:26","1","0");
INSERT INTO factura_det VALUES("98","10","66","1","1","12","4","2500","2500","1","1","2015-10-27","12:45:02","1","0");
INSERT INTO factura_det VALUES("99","10","66","1","1","","","2500","2500","1","1","2015-10-27","12:46:45","1","1");
INSERT INTO factura_det VALUES("100","10","66","1","1","11","3","2500","2500","1","1","2015-10-27","12:47:16","1","0");
INSERT INTO factura_det VALUES("101","10","67","1","1","","","2500","2500","1","1","2015-10-27","19:22:58","1","1");
INSERT INTO factura_det VALUES("102","10","67","1","1","","","2500","2500","1","1","2015-10-27","19:23:24","1","1");
INSERT INTO factura_det VALUES("103","10","67","1","1","11","4","2500","2500","1","1","2015-10-27","19:43:07","1","1");
INSERT INTO factura_det VALUES("104","10","67","1","1","11","3","2500","2500","1","1","2015-10-27","19:45:34","1","0");
INSERT INTO factura_det VALUES("105","10","68","1","1","11","3","2500","2500","1","1","2015-10-27","20:04:52","1","0");
INSERT INTO factura_det VALUES("106","10","69","1","1","11","2","2500","2500","1","1","2015-10-27","20:23:29","1","0");
INSERT INTO factura_det VALUES("107","10","70","1","1","11","3","2500","2500","1","1","2015-10-27","20:24:32","1","0");
INSERT INTO factura_det VALUES("108","10","70","3","2","","","6500","13000","1","1","2015-10-27","20:24:57","1","0");
INSERT INTO factura_det VALUES("109","10","71","1","1","1","1","2500","2500","1","1","2015-10-27","21:21:03","1","0");
INSERT INTO factura_det VALUES("110","10","72","1","1","1","11","2500","2500","1","1","2015-10-27","21:25:15","1","0");
INSERT INTO factura_det VALUES("111","10","73","1","1","11","3","2500","2500","1","1","2015-10-27","22:21:46","1","0");
INSERT INTO factura_det VALUES("112","10","74","1","1","","","2500","2500","1","1","2015-10-27","22:22:12","1","0");
INSERT INTO factura_det VALUES("113","10","73","3","3","","","6500","19500","1","1","2015-10-27","22:22:32","1","0");
INSERT INTO factura_det VALUES("114","10","75","1","1","","","2500","2500","1","1","2015-10-28","01:00:21","1","0");
INSERT INTO factura_det VALUES("115","10","77","1","1","","","2500","2500","1","1","2015-10-28","01:52:16","1","0");
INSERT INTO factura_det VALUES("116","10","81","1","1","","","2500","2500","1","1","2015-10-28","01:55:10","1","0");
INSERT INTO factura_det VALUES("117","10","82","1","1","","","2500","2500","1","1","2015-10-28","01:55:52","1","1");
INSERT INTO factura_det VALUES("118","10","82","1","1","11","4","2500","2500","1","1","2015-10-28","02:11:04","1","0");
INSERT INTO factura_det VALUES("119","10","82","1","1","","","2500","2500","1","1","2015-10-28","12:03:01","1","0");
INSERT INTO factura_det VALUES("120","10","83","2","1","","","11000","11000","1","1","2015-11-12","13:33:07","1","0");
INSERT INTO factura_det VALUES("121","10","83","1","1","","","2500","2500","1","1","2015-11-12","15:12:13","1","0");
INSERT INTO factura_det VALUES("122","10","84","1","1","11","4","2500","2500","1","1","2015-11-12","15:12:31","1","0");
INSERT INTO factura_det VALUES("123","10","84","1","3","4","16","2500","7500","0","1","2015-11-12","15:15:04","1","1");
INSERT INTO factura_det VALUES("124","10","84","2","1","","","11000","11000","1","1","2015-11-12","15:17:26","1","0");
INSERT INTO factura_det VALUES("125","10","85","1","1","11","4","2500","2500","1","1","2015-11-12","15:17:39","1","0");
INSERT INTO factura_det VALUES("126","10","89","1","1","11","4","2500","2500","0","1","2015-11-12","18:09:03","1","1");
INSERT INTO factura_det VALUES("127","10","89","2","1","","","11000","11000","1","1","2015-11-12","18:09:11","1","0");
INSERT INTO factura_det VALUES("128","10","88","1","1","","","2500","2500","1","1","2015-11-12","18:10:05","1","0");
INSERT INTO factura_det VALUES("129","10","90","1","1","","","2500","2500","1","1","2015-11-13","00:13:57","1","0");
INSERT INTO factura_det VALUES("130","10","89","1","1","","","2500","2500","1","1","2015-11-13","00:14:09","1","0");
INSERT INTO factura_det VALUES("131","10","89","1","1","11","4","2500","2500","1","1","2015-11-13","00:17:42","1","0");
INSERT INTO factura_det VALUES("132","10","91","1","1","","","2500","2500","1","1","2015-11-13","00:20:23","1","0");
INSERT INTO factura_det VALUES("133","","","","","","","","27","0","","","","","");
INSERT INTO factura_det VALUES("134","10","94","1","1","","","2500","2500","1","1","2015-11-14","12:19:50","1","0");
INSERT INTO factura_det VALUES("135","10","95","1","1","","","2500","2500","1","1","2015-11-14","12:22:48","1","0");
INSERT INTO factura_det VALUES("136","10","92","1","1","1","11","2500","2500","1","1","2015-11-19","19:10:38","1","0");
INSERT INTO factura_det VALUES("137","12","97","1","1","","","2500","2500","1","1","2015-11-19","21:02:21","1","0");
INSERT INTO factura_det VALUES("138","12","97","1","1","11","3","2500","2500","1","1","2015-11-19","21:02:30","1","0");
INSERT INTO factura_det VALUES("139","12","98","1","1","","","2500","2500","1","1","2015-11-19","21:53:59","1","0");
INSERT INTO factura_det VALUES("140","12","99","1","1","","","2500","2500","1","1","2015-11-19","21:54:44","1","0");
INSERT INTO factura_det VALUES("141","12","100","1","1","","","2500","2500","1","1","2015-11-19","21:55:07","1","0");
INSERT INTO factura_det VALUES("142","13","121","1","1","11","3","2500","2500","1","1","2015-11-19","23:12:05","1","0");
INSERT INTO factura_det VALUES("143","11","122","1","1","11","5","2500","2500","1","1","2015-11-19","23:16:21","2","0");
INSERT INTO factura_det VALUES("144","14","123","1","1","4","11","2500","2500","1","1","2015-11-19","23:18:09","1","0");
INSERT INTO factura_det VALUES("145","15","125","1","1","4","37","2500","2500","1","1","2015-11-19","23:19:14","2","0");
INSERT INTO factura_det VALUES("146","15","124","1","1","3","8","2500","2500","1","1","2015-11-19","23:19:38","2","0");
INSERT INTO factura_det VALUES("147","16","129","1","1","","","2500","2500","1","1","2015-11-20","01:07:00","1","0");
INSERT INTO factura_det VALUES("148","16","129","1","3","1","34","2500","7500","1","1","2015-11-20","01:07:06","1","0");
INSERT INTO factura_det VALUES("149","16","130","1","1","11","4","2500","2500","1","1","2015-11-20","01:10:20","1","0");
INSERT INTO factura_det VALUES("150","16","131","1","1","","","2500","2500","1","1","2015-11-20","01:10:52","1","0");
INSERT INTO factura_det VALUES("151","16","128","1","1","4","11","2500","2500","1","1","2015-11-20","01:11:25","1","0");
INSERT INTO factura_det VALUES("152","16","132","1","1","11","3","2500","2500","1","1","2015-11-20","01:38:10","1","0");
INSERT INTO factura_det VALUES("153","16","134","1","1","11","3","2500","2500","1","1","2015-11-20","02:28:26","1","0");
INSERT INTO factura_det VALUES("154","16","134","1","1","","","2500","2500","1","1","2015-11-20","02:35:32","1","0");
INSERT INTO factura_det VALUES("155","16","134","1","3","11","4","2500","7500","1","1","2015-11-20","02:35:39","1","0");
INSERT INTO factura_det VALUES("156","16","133","1","1","11","32","2500","2500","1","1","2015-11-20","02:35:55","1","1");
INSERT INTO factura_det VALUES("157","16","133","1","3","","","2500","7500","1","1","2015-11-20","02:36:01","1","0");
INSERT INTO factura_det VALUES("158","16","133","1","1","","","2500","2500","1","1","2015-11-20","02:36:21","1","0");
INSERT INTO factura_det VALUES("159","16","133","2","1","","","11000","11000","1","1","2015-11-20","02:37:00","1","0");
INSERT INTO factura_det VALUES("160","16","135","1","1","11","11","2500","2500","1","1","2015-11-20","02:46:02","1","0");
INSERT INTO factura_det VALUES("161","16","136","1","1","","","2500","2500","1","1","2015-11-20","02:50:30","1","0");
INSERT INTO factura_det VALUES("162","16","133","1","2","","","2500","5000","1","1","2015-11-20","02:51:13","1","0");
INSERT INTO factura_det VALUES("163","16","132","1","1","","","2500","2500","1","1","2015-11-20","11:04:37","1","0");
INSERT INTO factura_det VALUES("164","16","133","2","1","","","11000","11000","1","1","2015-11-20","11:10:05","1","0");
INSERT INTO factura_det VALUES("165","16","127","1","1","","","2500","2500","1","1","2015-11-20","11:36:05","1","0");
INSERT INTO factura_det VALUES("166","16","136","1","1","","","2500","2500","1","1","2015-11-20","12:37:35","1","0");
INSERT INTO factura_det VALUES("167","16","137","1","1","","","2500","2500","1","1","2015-11-20","12:56:02","1","0");
INSERT INTO factura_det VALUES("168","16","137","1","1","11","10","2500","2500","1","1","2015-11-20","12:56:24","1","0");
INSERT INTO factura_det VALUES("169","16","135","1","1","11","11","2500","2500","1","1","2015-11-20","13:03:54","1","0");
INSERT INTO factura_det VALUES("170","16","126","1","1","","","2500","2500","1","1","2015-11-20","13:20:00","1","0");
INSERT INTO factura_det VALUES("171","16","139","1","1","","","2500","2500","1","1","2015-11-20","13:29:13","1","0");
INSERT INTO factura_det VALUES("172","16","140","1","1","11","12","2500","2500","1","1","2015-11-20","13:37:58","1","0");
INSERT INTO factura_det VALUES("173","16","141","1","1","","","2500","2500","1","1","2015-11-20","13:38:36","1","0");
INSERT INTO factura_det VALUES("174","16","141","1","1","","","2500","2500","1","1","2015-11-20","13:48:20","1","0");
INSERT INTO factura_det VALUES("175","16","141","1","1","","","2500","2500","1","1","2015-11-20","13:48:25","1","0");
INSERT INTO factura_det VALUES("176","16","141","1","1","11","11","2500","2500","1","1","2015-11-20","13:48:37","1","0");
INSERT INTO factura_det VALUES("177","16","142","1","1","11","11","2500","2500","1","1","2015-11-20","13:50:39","1","0");
INSERT INTO factura_det VALUES("178","16","143","1","1","10","9","2500","2500","1","1","2015-11-20","13:51:28","1","0");
INSERT INTO factura_det VALUES("179","16","144","1","1","11","3","2500","2500","1","1","2015-11-20","13:53:05","1","0");
INSERT INTO factura_det VALUES("180","16","145","1","1","","","2500","2500","1","1","2015-11-20","13:54:02","1","0");
INSERT INTO factura_det VALUES("181","16","146","1","1","11","33","2500","2500","1","1","2015-11-20","13:54:46","1","0");
INSERT INTO factura_det VALUES("182","16","146","1","1","11","3","2500","2500","1","1","2015-11-20","13:54:56","1","0");
INSERT INTO factura_det VALUES("183","16","147","1","1","11","3","2500","2500","1","1","2015-11-20","13:55:21","1","0");
INSERT INTO factura_det VALUES("184","16","148","1","1","","","2500","2500","1","1","2015-11-20","13:55:41","1","0");
INSERT INTO factura_det VALUES("185","16","149","1","1","11","1","2500","2500","1","1","2015-11-20","13:56:37","1","0");
INSERT INTO factura_det VALUES("186","16","150","1","1","","","2500","2500","1","1","2015-11-20","13:58:20","1","0");
INSERT INTO factura_det VALUES("187","16","151","1","1","","","2500","2500","1","1","2015-11-20","13:58:40","1","0");
INSERT INTO factura_det VALUES("188","16","153","1","1","","","2500","2500","1","1","2015-11-20","13:58:55","1","0");
INSERT INTO factura_det VALUES("189","16","152","1","1","11","11","2500","2500","1","1","2015-11-20","13:59:14","1","0");
INSERT INTO factura_det VALUES("190","16","154","1","1","","","2500","2500","0","1","2015-11-20","13:59:53","1","1");
INSERT INTO factura_det VALUES("191","16","154","2","1","","","11000","11000","1","1","2015-11-20","13:59:59","1","0");
INSERT INTO factura_det VALUES("192","16","155","1","1","11","3","2500","2500","1","1","2015-11-20","14:00:34","1","0");
INSERT INTO factura_det VALUES("193","16","156","1","1","","","2500","2500","1","1","2015-11-20","14:17:10","1","0");
INSERT INTO factura_det VALUES("194","16","157","1","1","","","2500","2500","1","1","2015-11-20","14:18:08","1","0");
INSERT INTO factura_det VALUES("195","16","158","1","1","","","2500","2500","1","1","2015-11-20","14:18:26","1","0");
INSERT INTO factura_det VALUES("196","16","159","1","1","","","2500","2500","1","1","2015-11-20","14:29:39","1","0");
INSERT INTO factura_det VALUES("197","16","160","1","1","","","2500","2500","1","1","2015-11-20","14:45:20","1","0");
INSERT INTO factura_det VALUES("198","16","161","1","1","","","2500","2500","1","1","2015-11-20","14:49:44","1","0");
INSERT INTO factura_det VALUES("199","16","162","1","1","","","2500","2500","1","1","2015-11-20","14:51:01","1","0");
INSERT INTO factura_det VALUES("200","16","163","1","1","","","2500","2500","1","1","2015-11-20","14:51:42","1","0");
INSERT INTO factura_det VALUES("201","16","164","1","1","","","2500","2500","1","1","2015-11-20","14:52:32","1","0");
INSERT INTO factura_det VALUES("202","16","165","1","1","","","2500","2500","1","1","2015-11-20","14:52:59","1","0");
INSERT INTO factura_det VALUES("203","16","166","1","1","","","2500","2500","1","1","2015-11-20","14:53:23","1","0");
INSERT INTO factura_det VALUES("204","16","167","1","1","","","2500","2500","1","1","2015-11-20","14:53:51","1","0");
INSERT INTO factura_det VALUES("205","16","167","2","1","","","11000","11000","1","1","2015-11-20","14:53:53","1","0");
INSERT INTO factura_det VALUES("206","16","168","1","1","","","2500","2500","1","1","2015-11-20","14:54:27","1","0");
INSERT INTO factura_det VALUES("207","16","168","2","1","","","11000","11000","1","1","2015-11-20","14:54:29","1","0");
INSERT INTO factura_det VALUES("208","16","168","1","1","11","32","2500","2500","1","1","2015-11-20","14:54:36","1","0");
INSERT INTO factura_det VALUES("209","16","169","1","1","","","2500","2500","1","1","2015-11-20","14:55:34","1","0");
INSERT INTO factura_det VALUES("210","16","169","2","1","","","11000","11000","1","1","2015-11-20","14:55:36","1","0");
INSERT INTO factura_det VALUES("211","16","170","1","1","","","2500","2500","1","1","2015-11-20","14:57:39","1","0");
INSERT INTO factura_det VALUES("212","16","170","2","1","","","11000","11000","1","1","2015-11-20","14:57:42","1","0");
INSERT INTO factura_det VALUES("213","16","171","1","1","","","2500","2500","1","1","2015-11-20","15:01:59","1","0");
INSERT INTO factura_det VALUES("214","16","172","1","1","","","2500","2500","1","1","2015-11-20","15:13:30","1","0");
INSERT INTO factura_det VALUES("215","16","173","1","1","","","2500","2500","1","1","2015-11-20","15:14:25","1","0");
INSERT INTO factura_det VALUES("216","16","174","1","1","11","33","2500","2500","1","1","2015-11-20","15:15:23","1","0");
INSERT INTO factura_det VALUES("217","16","175","1","1","","","2500","2500","1","1","2015-11-20","15:18:58","1","0");
INSERT INTO factura_det VALUES("218","16","175","2","1","","","11000","11000","1","1","2015-11-20","15:19:05","1","0");
INSERT INTO factura_det VALUES("219","16","176","1","1","","","2500","2500","1","1","2015-11-20","15:19:51","1","0");
INSERT INTO factura_det VALUES("220","16","177","1","1","11","11","2500","2500","1","1","2015-11-21","12:30:15","1","0");
INSERT INTO factura_det VALUES("221","16","178","1","1","11","11","2500","2500","1","1","2015-11-21","12:31:02","1","0");
INSERT INTO factura_det VALUES("222","16","178","1","1","","","2500","2500","1","1","2015-11-21","12:31:11","1","0");
INSERT INTO factura_det VALUES("223","16","179","1","1","","","2500","2500","1","1","2015-11-21","12:33:04","1","0");
INSERT INTO factura_det VALUES("224","16","179","2","1","","","11000","11000","1","1","2015-11-21","12:36:58","1","0");
INSERT INTO factura_det VALUES("225","16","180","2","1","","","11000","11000","1","1","2015-11-21","12:37:33","1","0");
INSERT INTO factura_det VALUES("226","16","181","1","1","11","33","2500","2500","1","1","2015-11-21","12:38:42","1","0");
INSERT INTO factura_det VALUES("227","16","182","2","1","","","11000","11000","1","1","2015-11-21","12:46:01","1","0");
INSERT INTO factura_det VALUES("228","16","182","1","1","","","2500","2500","1","1","2015-11-21","12:51:08","1","0");
INSERT INTO factura_det VALUES("229","16","184","1","1","","","2500","2500","1","1","2015-11-21","13:08:13","1","0");
INSERT INTO factura_det VALUES("230","17","185","2","1","","","11000","11000","1","1","2015-11-21","13:23:25","1","0");
INSERT INTO factura_det VALUES("231","17","186","1","1","","","2500","2500","1","1","2015-11-21","13:23:49","1","0");
INSERT INTO factura_det VALUES("232","17","187","2","1","","","11000","11000","1","1","2015-11-21","13:25:13","1","0");
INSERT INTO factura_det VALUES("233","17","188","2","1","","","11000","11000","1","1","2015-11-21","13:26:15","1","0");
INSERT INTO factura_det VALUES("234","17","188","1","1","","","2500","2500","1","1","2015-11-21","13:26:59","1","0");
INSERT INTO factura_det VALUES("235","17","188","1","1","11","4","2500","2500","1","1","2015-11-21","13:27:49","1","0");
INSERT INTO factura_det VALUES("236","17","188","1","1","","","2500","2500","1","1","2015-11-21","13:29:33","1","0");
INSERT INTO factura_det VALUES("237","17","188","1","1","","","2500","2500","1","1","2015-11-21","14:12:08","1","0");
INSERT INTO factura_det VALUES("238","17","188","2","3","","","11000","33000","1","1","2015-11-21","14:12:28","1","0");
INSERT INTO factura_det VALUES("239","17","189","1","1","","","2500","2500","1","1","2015-11-21","14:22:51","1","0");
INSERT INTO factura_det VALUES("240","17","190","1","1","11","3","2500","2500","1","1","2015-11-21","14:37:51","1","0");
INSERT INTO factura_det VALUES("241","17","190","2","1","","","11000","11000","1","1","2015-11-21","14:38:33","1","0");
INSERT INTO factura_det VALUES("242","17","191","1","1","","","2500","2500","1","1","2015-11-21","14:53:43","1","0");
INSERT INTO factura_det VALUES("243","17","192","2","1","","","11000","11000","1","1","2015-11-21","14:54:33","1","0");
INSERT INTO factura_det VALUES("244","17","193","2","1","","","11000","11000","1","1","2015-11-21","14:56:19","1","0");
INSERT INTO factura_det VALUES("245","17","193","1","3","","","2500","7500","1","1","2015-11-21","14:56:23","1","0");
INSERT INTO factura_det VALUES("246","17","194","1","1","","","2500","2500","1","1","2015-11-21","15:02:06","1","0");
INSERT INTO factura_det VALUES("247","17","195","1","1","","","2500","2500","1","1","2015-11-21","15:02:54","1","0");
INSERT INTO factura_det VALUES("248","17","195","2","1","","","11000","11000","1","1","2015-11-21","15:03:27","1","0");
INSERT INTO factura_det VALUES("249","17","196","1","1","","","2500","2500","1","1","2015-11-21","15:19:42","1","0");
INSERT INTO factura_det VALUES("250","17","197","1","1","11","4","2500","2500","1","1","2015-11-21","15:29:36","1","0");
INSERT INTO factura_det VALUES("251","17","197","3","1","","","6500","6500","1","1","2015-11-21","15:30:38","1","0");
INSERT INTO factura_det VALUES("252","17","197","3","1","","","6500","6500","1","1","2015-11-21","15:32:40","1","0");
INSERT INTO factura_det VALUES("253","17","198","1","1","","","2500","2500","1","1","2015-11-21","15:33:18","1","0");
INSERT INTO factura_det VALUES("254","17","199","1","1","","","2500","2500","1","1","2015-11-21","15:36:49","1","0");
INSERT INTO factura_det VALUES("255","17","200","2","1","","","11000","11000","1","1","2015-11-21","15:37:18","1","0");
INSERT INTO factura_det VALUES("256","17","200","1","1","","","2500","2500","1","1","2015-11-21","15:37:37","1","0");
INSERT INTO factura_det VALUES("257","18","201","1","1","","","2500","2500","1","1","2015-11-21","17:14:42","1","0");
INSERT INTO factura_det VALUES("258","18","202","1","1","","","2500","2500","1","1","2015-11-21","17:16:00","1","0");
INSERT INTO factura_det VALUES("259","18","203","1","1","11","3","2500","2500","1","1","2015-11-21","17:16:39","1","0");
INSERT INTO factura_det VALUES("260","18","204","1","1","","","2500","2500","1","1","2015-11-21","17:21:27","1","0");
INSERT INTO factura_det VALUES("261","18","205","1","1","","","2500","2500","1","1","2015-11-21","17:31:54","1","0");
INSERT INTO factura_det VALUES("262","18","206","1","1","","","2500","2500","1","1","2015-11-21","17:33:05","1","0");
INSERT INTO factura_det VALUES("263","18","208","1","1","","","2500","2500","1","1","2015-11-21","17:38:02","1","0");
INSERT INTO factura_det VALUES("264","18","209","1","1","","","2500","2500","1","1","2015-11-21","17:39:26","1","0");
INSERT INTO factura_det VALUES("265","18","210","1","1","","","2500","2500","1","1","2015-11-21","17:41:00","1","0");
INSERT INTO factura_det VALUES("266","18","207","1","1","","","2500","2500","1","1","2015-11-21","17:41:36","1","0");
INSERT INTO factura_det VALUES("267","18","207","2","1","","","11000","11000","1","1","2015-11-21","17:41:39","1","0");
INSERT INTO factura_det VALUES("268","18","207","3","2","","","6500","13000","1","1","2015-11-21","17:41:48","1","0");
INSERT INTO factura_det VALUES("269","18","211","1","1","","","2500","2500","1","1","2015-11-21","17:43:47","1","0");
INSERT INTO factura_det VALUES("270","18","207","1","1","","","2500","2500","1","1","2015-11-21","17:58:37","1","0");
INSERT INTO factura_det VALUES("271","18","207","2","1","","","11000","11000","1","1","2015-11-21","18:54:52","1","0");
INSERT INTO factura_det VALUES("272","18","207","2","3","","","11000","33000","1","1","2015-11-21","18:55:01","1","0");
INSERT INTO factura_det VALUES("273","18","207","1","1","","","2500","2500","1","1","2015-11-21","18:56:47","1","0");
INSERT INTO factura_det VALUES("274","18","207","1","1","","","2500","2500","1","1","2015-11-21","18:57:05","1","0");
INSERT INTO factura_det VALUES("275","18","212","1","1","","","2500","2500","1","1","2015-11-22","04:35:11","1","0");
INSERT INTO factura_det VALUES("276","18","213","1","1","","","2500","2500","1","1","2015-11-22","11:53:23","1","0");
INSERT INTO factura_det VALUES("277","18","214","1","1","","","2500","2500","1","1","2015-11-22","11:54:06","1","0");
INSERT INTO factura_det VALUES("278","18","214","1","1","","","2500","2500","1","1","2015-11-22","12:35:55","1","0");
INSERT INTO factura_det VALUES("279","18","214","1","1","","","2500","2500","1","1","2015-11-22","12:36:34","1","0");
INSERT INTO factura_det VALUES("280","18","214","1","1","","","2500","2500","1","1","2015-11-22","12:37:09","1","0");
INSERT INTO factura_det VALUES("281","18","214","1","1","11","4","2500","2500","1","1","2015-11-22","12:38:04","1","0");
INSERT INTO factura_det VALUES("282","18","214","1","1","","","2500","2500","1","1","2015-11-22","12:38:20","1","0");
INSERT INTO factura_det VALUES("283","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:40:45","1","0");
INSERT INTO factura_det VALUES("284","18","215","1","11","","","2500","27500","1","1","2015-11-22","12:41:03","1","0");
INSERT INTO factura_det VALUES("285","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:41:42","1","0");
INSERT INTO factura_det VALUES("286","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:45:16","1","0");
INSERT INTO factura_det VALUES("287","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:46:37","1","0");
INSERT INTO factura_det VALUES("288","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:47:28","1","0");
INSERT INTO factura_det VALUES("289","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:47:57","1","0");
INSERT INTO factura_det VALUES("290","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:48:17","1","0");
INSERT INTO factura_det VALUES("291","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:48:29","1","0");
INSERT INTO factura_det VALUES("292","18","215","1","1","","","2500","2500","1","1","2015-11-22","12:49:35","1","0");
INSERT INTO factura_det VALUES("293","18","216","1","1","","","2500","2500","1","1","2015-11-22","12:49:54","1","0");
INSERT INTO factura_det VALUES("294","18","216","2","1","","","11000","11000","1","1","2015-11-22","12:50:36","1","0");
INSERT INTO factura_det VALUES("295","18","216","2","1","","","11000","11000","1","1","2015-11-22","12:50:49","1","0");
INSERT INTO factura_det VALUES("296","18","216","1","1","","","2500","2500","1","1","2015-11-22","12:52:13","1","0");
INSERT INTO factura_det VALUES("297","18","216","1","1","","","2500","2500","1","1","2015-11-22","12:56:27","1","0");
INSERT INTO factura_det VALUES("298","18","216","1","1","","","2500","2500","1","1","2015-11-22","12:56:44","1","0");
INSERT INTO factura_det VALUES("299","18","217","1","1","","","2500","2500","1","1","2015-11-22","12:57:30","1","0");
INSERT INTO factura_det VALUES("300","18","217","1","1","","","2500","2500","1","1","2015-11-22","12:57:45","1","0");
INSERT INTO factura_det VALUES("301","18","218","1","1","","","2500","2500","1","1","2015-11-22","12:58:37","1","0");
INSERT INTO factura_det VALUES("302","18","217","1","1","","","2500","2500","1","1","2015-11-22","12:59:43","1","0");
INSERT INTO factura_det VALUES("303","18","219","1","1","","","2500","2500","1","1","2015-11-22","13:00:32","1","0");
INSERT INTO factura_det VALUES("304","18","220","1","1","","","2500","2500","1","1","2015-11-22","13:01:44","1","0");
INSERT INTO factura_det VALUES("305","18","220","1","1","","","2500","2500","1","1","2015-11-22","13:01:54","1","0");
INSERT INTO factura_det VALUES("306","18","221","1","1","","","2500","2500","1","1","2015-11-22","13:27:46","1","0");
INSERT INTO factura_det VALUES("307","18","221","1","1","","","2500","2500","1","1","2015-11-22","13:28:03","1","0");
INSERT INTO factura_det VALUES("308","18","222","1","1","","","2500","2500","1","1","2015-11-22","13:28:28","1","0");
INSERT INTO factura_det VALUES("309","18","222","1","1","","","2500","2500","1","1","2015-11-22","13:29:40","1","0");
INSERT INTO factura_det VALUES("310","18","222","1","1","","","2500","2500","1","1","2015-11-22","13:40:08","1","0");
INSERT INTO factura_det VALUES("311","18","221","2","1","","","11000","11000","1","1","2015-11-22","13:41:24","1","0");
INSERT INTO factura_det VALUES("312","18","223","2","1","","","11000","11000","1","1","2015-11-22","13:52:09","1","0");
INSERT INTO factura_det VALUES("313","18","224","2","1","","","11000","11000","1","1","2015-11-22","13:53:59","1","0");
INSERT INTO factura_det VALUES("314","19","225","1","1","","","2500","2500","1","1","2015-11-22","16:19:59","1","0");
INSERT INTO factura_det VALUES("315","19","226","1","1","","","2500","2500","1","1","2015-11-22","16:20:19","1","0");
INSERT INTO factura_det VALUES("316","19","226","3","1","","","6500","6500","1","1","2015-11-22","16:20:41","1","0");
INSERT INTO factura_det VALUES("317","20","227","1","1","","","2500","2500","1","1","2015-11-22","16:24:04","1","0");
INSERT INTO factura_det VALUES("318","20","229","1","1","","","2500","2500","1","1","2015-11-23","18:50:56","1","0");
INSERT INTO factura_det VALUES("319","20","230","1","1","","","2500","2500","1","1","2015-11-23","18:51:14","1","0");
INSERT INTO factura_det VALUES("320","20","230","1","1","","","2500","2500","1","1","2015-11-23","18:51:39","1","0");
INSERT INTO factura_det VALUES("321","20","230","1","1","","","2500","2500","1","1","2015-11-23","18:53:03","1","0");
INSERT INTO factura_det VALUES("322","20","230","1","1","","","2500","2500","1","1","2015-11-23","18:53:57","1","0");
INSERT INTO factura_det VALUES("323","20","231","1","1","","","2500","2500","1","1","2015-11-23","18:56:45","1","0");
INSERT INTO factura_det VALUES("324","20","232","1","1","","","2500","2500","1","1","2015-11-23","18:57:06","1","0");
INSERT INTO factura_det VALUES("325","20","231","2","1","","","11000","11000","1","1","2015-11-23","18:58:10","1","0");
INSERT INTO factura_det VALUES("326","21","233","1","1","","","2500","2500","1","1","2015-11-23","19:00:12","1","0");
INSERT INTO factura_det VALUES("327","21","234","1","1","","","2500","2500","1","1","2015-11-23","19:00:35","1","0");
INSERT INTO factura_det VALUES("328","21","235","1","1","","","2500","2500","1","1","2015-11-23","19:01:48","1","0");
INSERT INTO factura_det VALUES("329","21","235","1","1","","","2500","2500","1","1","2015-11-23","19:01:59","1","0");
INSERT INTO factura_det VALUES("330","21","236","1","1","","","2500","2500","1","1","2015-11-23","19:04:00","1","0");
INSERT INTO factura_det VALUES("331","21","236","1","1","11","3","2500","2500","1","1","2015-11-23","19:05:09","1","0");
INSERT INTO factura_det VALUES("332","21","236","1","1","","","2500","2500","1","1","2015-11-23","19:06:01","1","0");
INSERT INTO factura_det VALUES("333","21","236","1","1","11","3","2500","2500","1","1","2015-11-23","19:06:54","1","0");
INSERT INTO factura_det VALUES("334","21","237","1","1","","","2500","2500","1","1","2015-11-23","19:08:10","1","0");
INSERT INTO factura_det VALUES("335","21","237","1","1","","","2500","2500","1","1","2015-11-23","19:08:41","1","0");
INSERT INTO factura_det VALUES("336","21","237","1","1","","","2500","2500","1","1","2015-11-23","19:10:43","1","0");
INSERT INTO factura_det VALUES("337","21","238","1","1","","","2500","2500","1","1","2015-11-23","22:44:23","1","0");
INSERT INTO factura_det VALUES("338","21","238","1","1","","","2500","2500","1","1","2015-11-23","22:46:56","1","0");
INSERT INTO factura_det VALUES("339","21","244","1","1","","","2500","2500","1","1","2015-11-25","10:13:09","1","0");
INSERT INTO factura_det VALUES("340","21","246","1","1","","","2500","2500","1","1","2015-11-25","10:16:38","1","0");
INSERT INTO factura_det VALUES("341","21","247","1","1","11","3","2500","2500","1","1","2015-11-25","10:17:10","1","0");
INSERT INTO factura_det VALUES("342","21","251","1","1","","","2500","2500","1","1","2015-11-25","11:01:39","1","0");
INSERT INTO factura_det VALUES("343","21","252","1","1","","","2500","2500","1","1","2015-11-25","11:08:03","1","0");
INSERT INTO factura_det VALUES("344","21","252","1","1","11","4","2500","2500","1","1","2015-11-25","11:08:20","1","0");
INSERT INTO factura_det VALUES("345","21","253","1","1","","","2500","2500","1","1","2015-11-25","11:12:33","1","0");
INSERT INTO factura_det VALUES("346","21","254","1","1","","","2500","2500","1","1","2015-11-25","11:32:47","1","0");
INSERT INTO factura_det VALUES("347","21","250","1","1","","","2500","2500","1","1","2015-11-25","15:18:30","1","0");
INSERT INTO factura_det VALUES("348","21","256","1","1","","","2500","2500","1","1","2015-11-25","15:19:02","1","0");
INSERT INTO factura_det VALUES("349","21","255","1","1","","","2500","2500","1","1","2015-11-25","15:20:02","1","0");
INSERT INTO factura_det VALUES("350","21","257","1","1","","","2500","2500","1","1","2015-11-25","15:20:14","1","0");
INSERT INTO factura_det VALUES("351","21","258","1","1","","","2500","2500","1","1","2015-11-25","15:21:06","1","0");
INSERT INTO factura_det VALUES("352","21","259","1","1","","","2500","2500","1","1","2015-11-25","15:21:14","1","0");
INSERT INTO factura_det VALUES("353","21","260","1","1","","","2500","2500","1","1","2015-11-25","15:21:24","1","0");
INSERT INTO factura_det VALUES("354","21","260","1","1","","","2500","2500","1","1","2015-11-25","15:21:26","1","0");
INSERT INTO factura_det VALUES("355","21","262","1","1","","","2500","2500","1","1","2015-11-25","15:21:39","1","0");
INSERT INTO factura_det VALUES("356","21","261","1","1","","","2500","2500","1","1","2015-11-25","15:24:11","1","0");
INSERT INTO factura_det VALUES("357","21","261","2","1","","","11000","11000","1","1","2015-11-25","15:24:31","1","0");
INSERT INTO factura_det VALUES("358","21","263","1","1","","","2500","2500","1","1","2015-11-25","15:25:38","1","0");
INSERT INTO factura_det VALUES("359","21","264","1","1","","","2500","2500","1","1","2015-11-25","15:33:13","1","0");
INSERT INTO factura_det VALUES("360","21","266","1","1","","","2500","2500","1","1","2015-11-25","15:34:39","1","0");
INSERT INTO factura_det VALUES("361","21","265","1","1","","","2500","2500","1","1","2015-11-25","15:35:01","1","0");
INSERT INTO factura_det VALUES("362","21","269","1","1","","","2500","2500","1","1","2015-11-25","15:45:02","1","0");
INSERT INTO factura_det VALUES("363","21","268","1","1","","","2500","2500","1","1","2015-11-25","15:46:05","1","0");
INSERT INTO factura_det VALUES("364","21","270","1","1","","","2500","2500","1","1","2015-11-25","15:50:23","1","0");
INSERT INTO factura_det VALUES("365","21","271","1","1","","","2500","2500","1","1","2015-11-25","15:50:31","1","0");
INSERT INTO factura_det VALUES("366","21","270","1","1","","","2500","2500","1","1","2015-11-25","15:50:53","1","0");
INSERT INTO factura_det VALUES("367","21","272","1","1","","","2500","2500","1","1","2015-11-25","15:51:45","1","0");
INSERT INTO factura_det VALUES("368","21","273","1","1","","","2500","2500","1","1","2015-11-25","15:51:52","1","0");
INSERT INTO factura_det VALUES("369","21","273","2","1","","","11000","11000","1","1","2015-11-25","15:51:55","1","0");
INSERT INTO factura_det VALUES("370","21","274","1","3","","","2500","7500","1","1","2015-11-25","15:53:23","1","0");
INSERT INTO factura_det VALUES("371","21","275","1","1","","","2500","2500","1","1","2015-11-25","15:55:16","1","0");
INSERT INTO factura_det VALUES("372","21","276","1","1","","","2500","2500","1","1","2015-11-25","16:06:13","1","0");
INSERT INTO factura_det VALUES("373","21","277","1","1","","","2500","2500","1","1","2015-11-25","16:11:39","1","0");
INSERT INTO factura_det VALUES("374","21","278","1","1","","","2500","2500","1","1","2015-11-25","16:13:01","1","0");
INSERT INTO factura_det VALUES("375","21","279","1","1","","","2500","2500","1","1","2015-11-25","16:15:48","1","0");
INSERT INTO factura_det VALUES("376","21","280","1","1","","","2500","2500","1","1","2015-11-25","16:16:02","1","0");
INSERT INTO factura_det VALUES("377","21","281","1","1","","","2500","2500","1","1","2015-11-25","16:41:28","1","0");
INSERT INTO factura_det VALUES("378","21","282","1","1","","","2500","2500","1","1","2015-11-25","18:13:45","1","0");
INSERT INTO factura_det VALUES("379","21","283","1","1","","","2500","2500","1","1","2015-11-25","18:21:53","1","0");
INSERT INTO factura_det VALUES("380","21","284","1","1","","","2500","2500","1","1","2015-11-25","18:27:23","1","0");
INSERT INTO factura_det VALUES("381","21","285","1","1","","","2500","2500","1","1","2015-11-25","18:29:34","1","0");
INSERT INTO factura_det VALUES("382","21","286","1","1","","","2500","2500","1","1","2015-11-25","18:31:24","1","0");
INSERT INTO factura_det VALUES("383","21","287","1","1","","","2500","2500","1","1","2015-11-25","18:32:43","1","0");
INSERT INTO factura_det VALUES("384","21","288","1","1","","","2500","2500","1","1","2015-11-25","18:35:22","1","0");
INSERT INTO factura_det VALUES("385","21","289","1","1","","","2500","2500","1","1","2015-11-25","18:36:06","1","0");
INSERT INTO factura_det VALUES("386","21","291","1","1","","","2500","2500","1","1","2015-11-25","18:36:40","1","0");
INSERT INTO factura_det VALUES("387","21","290","1","1","","","2500","2500","1","1","2015-11-25","18:37:20","1","0");
INSERT INTO factura_det VALUES("388","21","292","1","1","","","2500","2500","1","1","2015-11-25","18:40:13","1","0");
INSERT INTO factura_det VALUES("389","21","293","1","1","","","2500","2500","1","1","2015-11-25","18:41:03","1","0");
INSERT INTO factura_det VALUES("390","21","294","1","1","","","2500","2500","1","1","2015-11-25","18:41:54","1","0");
INSERT INTO factura_det VALUES("391","21","295","1","1","","","2500","2500","1","1","2015-11-25","19:02:20","1","0");
INSERT INTO factura_det VALUES("392","21","296","1","1","","","2500","2500","1","1","2015-11-25","19:06:03","1","0");
INSERT INTO factura_det VALUES("393","21","297","1","1","","","2500","2500","1","1","2015-11-25","19:10:55","1","0");
INSERT INTO factura_det VALUES("394","21","297","2","3","","","11000","33000","1","1","2015-11-25","19:10:57","1","0");
INSERT INTO factura_det VALUES("395","21","297","3","3","","","6500","19500","1","1","2015-11-25","19:11:04","1","0");
INSERT INTO factura_det VALUES("396","21","298","1","1","","","2500","2500","1","1","2015-11-25","20:13:02","1","0");
INSERT INTO factura_det VALUES("397","21","299","1","1","","","2500","2500","1","1","2015-11-25","20:19:55","1","0");
INSERT INTO factura_det VALUES("398","21","300","1","1","","","2500","2500","1","1","2015-11-25","20:21:30","1","0");
INSERT INTO factura_det VALUES("399","21","301","1","1","","","2500","2500","1","1","2015-11-25","20:25:30","1","0");
INSERT INTO factura_det VALUES("400","21","302","1","1","","","2500","2500","1","1","2015-11-25","20:25:56","1","0");
INSERT INTO factura_det VALUES("401","21","302","2","1","","","11000","11000","1","1","2015-11-25","20:26:00","1","0");
INSERT INTO factura_det VALUES("402","21","303","1","1","","","2500","2500","1","1","2015-11-25","20:29:22","1","0");
INSERT INTO factura_det VALUES("403","21","304","1","1","","","2500","2500","1","1","2015-11-25","22:42:26","1","0");
INSERT INTO factura_det VALUES("404","21","305","1","1","","","2500","2500","1","1","2015-11-26","12:33:40","1","0");
INSERT INTO factura_det VALUES("405","21","306","1","1","","","2500","2500","1","1","2015-11-26","12:34:50","1","0");
INSERT INTO factura_det VALUES("406","21","305","2","1","","","11000","11000","1","1","2015-11-26","12:38:42","1","0");
INSERT INTO factura_det VALUES("407","21","307","1","1","","","2500","2500","1","1","2015-11-26","12:40:06","1","0");
INSERT INTO factura_det VALUES("408","21","307","2","1","","","11000","11000","1","1","2015-11-26","12:40:08","1","0");
INSERT INTO factura_det VALUES("409","21","308","1","1","","","2500","2500","1","1","2015-11-26","12:46:25","1","0");
INSERT INTO factura_det VALUES("410","21","309","1","1","","","2500","2500","1","1","2015-11-26","12:47:27","1","0");
INSERT INTO factura_det VALUES("411","21","309","2","1","","","11000","11000","1","1","2015-11-26","12:47:32","1","0");
INSERT INTO factura_det VALUES("412","21","310","1","1","","","2500","2500","1","1","2015-11-26","13:09:05","1","0");
INSERT INTO factura_det VALUES("413","21","311","1","1","","","2500","2500","1","1","2015-11-26","20:58:01","1","0");
INSERT INTO factura_det VALUES("414","21","312","1","1","","","2500","2500","1","1","2015-11-26","21:17:07","1","0");
INSERT INTO factura_det VALUES("415","21","313","1","1","","","2500","2500","1","1","2015-11-26","21:39:40","1","0");
INSERT INTO factura_det VALUES("416","21","313","2","1","","","11000","11000","1","1","2015-11-26","21:39:43","1","0");
INSERT INTO factura_det VALUES("417","21","313","1","1","","","2500","2500","1","1","2015-11-26","21:39:54","1","0");
INSERT INTO factura_det VALUES("418","21","314","1","1","","","2500","2500","1","1","2015-11-26","21:49:25","1","0");
INSERT INTO factura_det VALUES("419","21","314","1","1","","","2500","2500","1","1","2015-11-26","21:49:27","1","0");
INSERT INTO factura_det VALUES("420","21","314","2","1","","","11000","11000","1","1","2015-11-26","21:49:30","1","0");
INSERT INTO factura_det VALUES("421","21","315","1","1","","","2500","2500","1","1","2015-11-26","22:18:42","1","0");
INSERT INTO factura_det VALUES("422","21","315","2","1","","","11000","11000","1","1","2015-11-26","22:18:45","1","0");
INSERT INTO factura_det VALUES("423","21","316","1","1","","","2500","2500","1","1","2015-11-26","22:25:45","1","0");
INSERT INTO factura_det VALUES("424","21","316","2","1","","","11000","11000","1","1","2015-11-26","22:25:47","1","0");
INSERT INTO factura_det VALUES("425","21","317","1","1","","","2500","2500","1","1","2015-11-26","22:27:05","1","0");
INSERT INTO factura_det VALUES("426","21","317","2","1","","","11000","11000","1","1","2015-11-26","22:27:08","1","0");
INSERT INTO factura_det VALUES("427","21","318","1","1","","","2500","2500","1","1","2015-11-26","22:27:41","1","0");
INSERT INTO factura_det VALUES("428","21","318","2","1","","","11000","11000","1","1","2015-11-26","22:27:43","1","0");
INSERT INTO factura_det VALUES("429","21","319","1","1","","","2500","2500","1","1","2015-11-26","22:31:18","1","0");
INSERT INTO factura_det VALUES("430","21","320","1","1","","","2500","2500","1","1","2015-11-26","22:31:52","1","0");
INSERT INTO factura_det VALUES("431","21","322","1","1","","","2500","2500","1","1","2015-11-26","22:32:41","1","0");
INSERT INTO factura_det VALUES("432","21","322","2","1","","","11000","11000","1","1","2015-11-26","22:32:44","1","0");
INSERT INTO factura_det VALUES("433","21","321","1","1","","","2500","2500","1","1","2015-11-26","22:33:13","1","0");
INSERT INTO factura_det VALUES("434","21","325","1","1","","","2500","2500","1","1","2015-11-26","23:35:08","1","0");
INSERT INTO factura_det VALUES("435","21","324","1","1","","","2500","2500","1","1","2015-11-26","23:36:50","1","0");
INSERT INTO factura_det VALUES("436","21","327","1","1","","","2500","2500","1","1","2015-12-29","13:29:34","1","0");
INSERT INTO factura_det VALUES("437","21","326","1","1","","","2500","2500","1","1","2015-12-29","13:30:46","1","0");
INSERT INTO factura_det VALUES("438","21","329","2","1","","","11000","11000","0","1","2016-02-04","20:36:59","1","0");
INSERT INTO factura_det VALUES("439","21","330","1","1","","","2500","2500","0","1","2016-02-04","20:38:56","1","0");
INSERT INTO factura_det VALUES("440","21","332","1","1","","","2500","2500","0","1","2016-02-22","19:13:28","1","0");
INSERT INTO factura_det VALUES("441","21","332","2","1","","","11000","11000","0","1","2016-02-22","19:13:33","1","0");
INSERT INTO factura_det VALUES("442","21","331","1","1","","","2500","2500","0","1","2016-02-22","19:35:59","1","0");
INSERT INTO factura_det VALUES("443","21","333","1","1","","","2500","2500","0","1","2016-02-22","19:41:52","1","0");
INSERT INTO factura_det VALUES("444","21","334","1","3","","","2500","7500","0","1","2016-02-22","19:42:02","1","0");
INSERT INTO factura_det VALUES("445","21","335","3","2","","","6500","13000","0","1","2016-05-30","10:46:50","1","0");
INSERT INTO factura_det VALUES("446","21","336","2","1","","","11000","11000","0","1","2016-05-31","15:02:53","1","0");


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

INSERT INTO familias_pro VALUES("1","PIZZAS","1","2015-11-20","11:08:49","1","0");
INSERT INTO familias_pro VALUES("2","COMIDAS","1","2015-11-12","19:49:26","1","0");
INSERT INTO familias_pro VALUES("3","BEBIDAS","1","2015-11-22","13:51:26","1","0");


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

INSERT INTO inventario_cab VALUES("1","X","0","2015-10-05","2015-10-05","23:12:36","1","1");
INSERT INTO inventario_cab VALUES("2","INICIAL","2","2015-10-11","2015-10-19","22:51:33","1","0");


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO inventario_det VALUES("1","2","1","20","2000","40000","2015-10-11","12:59:48","1","0");


DROP TABLE IF EXISTS inventarios_cab_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `inventarios_cab_view` AS (select `inventario_cab`.`inv_cod` AS `inv_cod`,`inventario_cab`.`inv_des` AS `inv_des`,`inventario_cab`.`inv_par` AS `inv_par`,(case `inventario_cab`.`inv_par` when 0 then _utf8'PENDIENTE' when 1 then _utf8'CONFIRMADO' when 2 then _utf8'AJUSTADO' end) AS `par_des`,`inventario_cab`.`inv_fec` AS `inv_fec`,`inventario_cab`.`fecha` AS `fecha`,`inventario_cab`.`hora` AS `hora`,`inventario_cab`.`usuario` AS `usuario`,`inventario_cab`.`borrado` AS `borrado`,(select sum((`inventario_det`.`pro_can` * `inventario_det`.`pro_cos`)) AS `total` from `inventario_det` where ((`inventario_det`.`borrado` = _utf8'0') and (`inventario_det`.`inv_cod` = `inventario_cab`.`inv_cod`)) group by `inventario_det`.`inv_cod`) AS `total`,replace(format((select sum((`inventario_det`.`pro_can` * `inventario_det`.`pro_cos`)) AS `total` from `inventario_det` where ((`inventario_det`.`borrado` = _utf8'0') and (`inventario_det`.`inv_cod` = `inventario_cab`.`inv_cod`)) group by `inventario_det`.`inv_cod`),0),',','.') AS `total_format` from `inventario_cab`);

INSERT INTO inventarios_cab_view VALUES("1","X","0","PENDIENTE","2015-10-05","2015-10-05","23:12:36","1","1","","");
INSERT INTO inventarios_cab_view VALUES("2","INICIAL","2","AJUSTADO","2015-10-11","2015-10-19","22:51:33","1","0","40000","40.000");


DROP TABLE IF EXISTS inventarios_det_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `inventarios_det_view` AS (select `inventario_det`.`mde_cod` AS `mde_cod`,`inventario_det`.`inv_cod` AS `inv_cod`,`inventario_det`.`pro_cod` AS `pro_cod`,`inventario_det`.`pro_can` AS `pro_can`,`inventario_det`.`pro_cos` AS `pro_cos`,replace(format(`inventario_det`.`pro_cos`,0),',','.') AS `pro_cos_for`,`inventario_det`.`pro_tot` AS `pro_tot`,replace(format(`inventario_det`.`pro_tot`,0),',','.') AS `pro_tot_for`,`inventario_det`.`fecha` AS `fecha`,`inventario_det`.`hora` AS `hora`,`inventario_det`.`usuario` AS `usuario`,`inventario_det`.`borrado` AS `borrado`,(select `productos_view`.`pro_bar` AS `pro_bar` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `pro_bar`,(select `productos_view`.`pro_des` AS `pro_des` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `pro_des`,(select `productos_view`.`fam_des` AS `fam_des` from `productos_view` where (`productos_view`.`pro_cod` = `inventario_det`.`pro_cod`)) AS `fam_des` from `inventario_det`);

INSERT INTO inventarios_det_view VALUES("1","2","1","20","2000","2.000","40000","40.000","2015-10-11","12:59:48","1","0","01","PIZZA GRANDE","PIZZAS");


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

INSERT INTO marcas VALUES("1","ILOLAY","2015-10-07","11:38:05","1","0");
INSERT INTO marcas VALUES("2","VARIOS","2015-10-07","11:38:12","1","0");


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

INSERT INTO medios VALUES("1","OTROS","2011-08-07","20:17:49","1","0");
INSERT INTO medios VALUES("2","PROPIOS MEDIOS","2011-08-07","20:14:55","1","0");
INSERT INTO medios VALUES("3","MSN","2011-08-07","20:14:58","1","0");
INSERT INTO medios VALUES("4","FACEBOOK","2015-01-31","16:05:39","1","0");


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

INSERT INTO medios_pago VALUES("1","EFECTIVO","2015-01-31","13:01:55","1","0");
INSERT INTO medios_pago VALUES("2","CHEQUE","2012-03-12","23:12:42","1","0");
INSERT INTO medios_pago VALUES("3","TARJ. CRED.","2012-03-12","23:12:55","1","0");
INSERT INTO medios_pago VALUES("4","TARJ. DEBITO","2012-03-20","17:20:35","2","0");


DROP TABLE IF EXISTS menu_cab;

CREATE TABLE `menu_cab` (
  `mec_cod` int(11) NOT NULL AUTO_INCREMENT,
  `mec_des` varchar(255) DEFAULT NULL,
  `mec_ord` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mec_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO menu_cab VALUES("1","Mantenimiento","1","0");
INSERT INTO menu_cab VALUES("2","Administracion","2","0");
INSERT INTO menu_cab VALUES("3","Finanzas y Tesoreria","3","0");
INSERT INTO menu_cab VALUES("4","Ventas","4","0");
INSERT INTO menu_cab VALUES("5","Compras","5","0");
INSERT INTO menu_cab VALUES("6","Inventarios","6","0");
INSERT INTO menu_cab VALUES("7","Envios al Cliente","7","0");
INSERT INTO menu_cab VALUES("8","Reportes","9","0");
INSERT INTO menu_cab VALUES("9","Seguridad","10","0");
INSERT INTO menu_cab VALUES("10","Utilitarios","8","0");


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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
INSERT INTO menu_det VALUES("19","4","Cierre Caja","./cerrarcaja/index.php","principal","5","0");
INSERT INTO menu_det VALUES("20","8","Reporte Cierres","./reporte_cierres/index.php","principal","1","0");
INSERT INTO menu_det VALUES("21","8","Reporte Ventas","./reporte_ventas/index.php","principal","2","0");
INSERT INTO menu_det VALUES("22","8","Reporte Stock","./reporte_stock/index.php","principal","3","0");
INSERT INTO menu_det VALUES("23","8","Estado Cuenta Cliente","./reporte_cuentas_clientes/index.php","principal","4","0");
INSERT INTO menu_det VALUES("24","5","Facturas Compra","./compras/index.php","principal","1","0");
INSERT INTO menu_det VALUES("25","8","Estado Cuenta Prov.","./reporte_cuentas_proveedor/index.php","principal","5","0");
INSERT INTO menu_det VALUES("26","3","Pagos a Proveedores","./pagos/index.php","principal","2","0");
INSERT INTO menu_det VALUES("27","2","Produccion","./produccion/index.php","principal","5","0");
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
INSERT INTO menu_det VALUES("43","10","Panel Cocina","./panel/index.php","otros","0","0");
INSERT INTO menu_det VALUES("44","10","Comanda Electronica","./mozo/index.php","otros1","1","0");


DROP TABLE IF EXISTS mesas;

CREATE TABLE `mesas` (
  `mes_cod` int(11) NOT NULL,
  `mes_des` varchar(255) DEFAULT NULL,
  `mes_est` int(11) DEFAULT '0',
  `mes_fac` int(11) DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mes_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mesas VALUES("0","FACTURACION","1","0","","","1","0");
INSERT INTO mesas VALUES("1","MESA 1","0","0","2015-10-26","10:28:25","1","0");
INSERT INTO mesas VALUES("2","MESA 2","0","0","2015-02-02","23:32:22","1","0");
INSERT INTO mesas VALUES("3","MESA 3","1","332","2015-02-02","23:32:36","1","0");
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
INSERT INTO mesas VALUES("21","MESA 21","2","328","2015-02-03","10:41:51","1","0");
INSERT INTO mesas VALUES("22","BARRA 1","0","0","2015-11-21","15:01:59","1","1");


DROP TABLE IF EXISTS movimientos;

CREATE TABLE `movimientos` (
  `mov_cod` int(11) NOT NULL,
  `mov_nro` varchar(20) DEFAULT NULL,
  `mov_obs` varchar(255) DEFAULT NULL,
  `mov_mon` double DEFAULT NULL,
  `mov_par` varchar(5) DEFAULT NULL,
  `ban_cod` int(11) DEFAULT NULL,
  `mov_fec` date DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  PRIMARY KEY (`mov_cod`),
  KEY `FK_movimientos_bancos` (`ban_cod`),
  CONSTRAINT `FK_movimientos_bancos` FOREIGN KEY (`ban_cod`) REFERENCES `bancos` (`ban_cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS movimientos_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `movimientos_view` AS (select `movimientos`.`mov_cod` AS `mov_cod`,`movimientos`.`mov_nro` AS `mov_nro`,`movimientos`.`mov_obs` AS `mov_obs`,`movimientos`.`mov_mon` AS `mov_mon`,`movimientos`.`mov_par` AS `mov_par`,`movimientos`.`ban_cod` AS `ban_cod`,`movimientos`.`mov_fec` AS `mov_fec`,`movimientos`.`fecha` AS `fecha`,`movimientos`.`hora` AS `hora`,`movimientos`.`usuario` AS `usuario`,`movimientos`.`borrado` AS `borrado`,(select `bancos_view`.`ban_des` AS `ban_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `ban_des`,(select `bancos_view`.`ban_nro` AS `ban_nro` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `ban_nro`,(select `bancos_view`.`tcu_cod` AS `tcu_cod` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tcu_cod`,(select `bancos_view`.`tcu_des` AS `tcu_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tcu_des`,(select `bancos_view`.`tmo_cod` AS `tmo_cod` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tmo_cod`,(select `bancos_view`.`tmo_des` AS `tmo_des` from `bancos_view` where (`bancos_view`.`ban_cod` = `movimientos`.`ban_cod`)) AS `tmo_des`,replace(format(`movimientos`.`mov_mon`,0),',','.') AS `monto` from `movimientos`);



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
INSERT INTO niveles VALUES("2","administrador","2015-10-08","21:46:32","1","0");
INSERT INTO niveles VALUES("3","caja","2015-10-10","21:38:39","1","0");
INSERT INTO niveles VALUES("4","x","2015-10-15","14:46:35","1","0");
INSERT INTO niveles VALUES("5","yyy","2015-10-15","14:47:14","1","0");


DROP TABLE IF EXISTS pagos;

CREATE TABLE `pagos` (
  `cob_cod` int(11) NOT NULL AUTO_INCREMENT,
  `fac_cod` int(11) DEFAULT NULL,
  `prv_cod` int(11) DEFAULT NULL,
  `cob_mon` double DEFAULT NULL,
  `cob_sal` double DEFAULT NULL,
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
INSERT INTO parametro VALUES("2","PRODUCCION","0");
INSERT INTO parametro VALUES("3","MATERIA PRIMA","0");


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
) ENGINE=InnoDB AUTO_INCREMENT=325 DEFAULT CHARSET=latin1;

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
INSERT INTO permisos VALUES("323","1","10","43","on","on","on","on","on");
INSERT INTO permisos VALUES("324","1","10","44","on","on","on","on","on");


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

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `produccion_view` AS (select `produccion`.`prd_cod` AS `prd_cod`,`produccion`.`pro_cod` AS `pro_cod`,(select `productos`.`pro_bar` AS `pro_bar` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `pro_bar`,(select `productos`.`pro_des` AS `pro_des` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `pro_des`,(select `productos`.`par_cod` AS `par_cod` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `par_cod`,(select `productos`.`fam_cod` AS `fam_cod` from `productos` where (`productos`.`pro_cod` = `produccion`.`pro_cod`)) AS `fam_cod`,`produccion`.`prd_can` AS `prd_can`,`produccion`.`prd_fec` AS `prd_fec`,`produccion`.`fecha` AS `fecha`,`produccion`.`hora` AS `hora`,`produccion`.`usuario` AS `usuario`,`produccion`.`borrado` AS `borrado` from `produccion`);



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

INSERT INTO productos VALUES("1","01","PIZZA GRANDE","2000","2500","-406","10","2","1","7","1","2015-11-20","11:09:35","1","0");
INSERT INTO productos VALUES("2","C01","HAMB. CARNE","0","11000","-51","10","2","2","10","2","2015-10-26","11:13:29","1","0");
INSERT INTO productos VALUES("3","C1","COCA","0","6500","-6","10","1","3","10","2","2015-11-21","15:31:03","1","0");


DROP TABLE IF EXISTS productos_view;

CREATE ALGORITHM=UNDEFINED DEFINER=`syspymes`@`localhost` SQL SECURITY DEFINER VIEW `productos_view` AS (select `productos`.`pro_cod` AS `pro_cod`,`productos`.`pro_bar` AS `pro_bar`,`productos`.`pro_des` AS `pro_des`,`productos`.`pro_cos` AS `pro_cos`,`productos`.`pro_ven` AS `pro_ven`,`productos`.`pro_can` AS `pro_can`,`productos`.`pro_imp` AS `pro_imp`,`productos`.`par_cod` AS `par_cod`,`productos`.`fam_cod` AS `fam_cod`,`productos`.`uni_cod` AS `uni_cod`,`productos`.`mar_cod` AS `mar_cod`,`productos`.`fecha` AS `fecha`,`productos`.`hora` AS `hora`,`productos`.`usuario` AS `usuario`,`productos`.`borrado` AS `borrado`,(select `parametro`.`par_des` AS `par_des` from `parametro` where (`parametro`.`par_cod` = `productos`.`par_cod`)) AS `par_des`,(select `familias_pro`.`fam_des` AS `fam_des` from `familias_pro` where (`familias_pro`.`fam_cod` = `productos`.`fam_cod`)) AS `fam_des`,(select `unidades`.`uni_des` AS `uni_des` from `unidades` where (`unidades`.`uni_cod` = `productos`.`uni_cod`)) AS `uni_des`,(select `marcas`.`mar_des` AS `mar_des` from `marcas` where (`marcas`.`mar_cod` = `productos`.`mar_cod`)) AS `mar_des` from `productos`);

INSERT INTO productos_view VALUES("1","01","PIZZA GRANDE","2000","2500","-406","10","2","1","7","1","2015-11-20","11:09:35","1","0","PRODUCCION","PIZZAS","CAJA DE 10 UNID.","ILOLAY");
INSERT INTO productos_view VALUES("2","C01","HAMB. CARNE","0","11000","-51","10","2","2","10","2","2015-10-26","11:13:29","1","0","PRODUCCION","COMIDAS","UNIDADES","VARIOS");
INSERT INTO productos_view VALUES("3","C1","COCA","0","6500","-6","10","1","3","10","2","2015-11-21","15:31:03","1","0","COMPRA-VENTA","BEBIDAS","UNIDADES","VARIOS");


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

INSERT INTO proveedores VALUES("1","COCA COLA","800-00","--","--","--","2016-05-31","15:03:45","1","0");
INSERT INTO proveedores VALUES("2","PROVEEDOR2","--","--","--","--","2016-05-31","15:04:02","1","0");


DROP TABLE IF EXISTS recetas;

CREATE TABLE `recetas` (
  `rec_cod` int(11) NOT NULL AUTO_INCREMENT,
  `pro_cod` int(11) DEFAULT NULL,
  `spr_cod` int(11) DEFAULT NULL,
  `rec_can` double DEFAULT NULL,
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
INSERT INTO sucursales VALUES("2","FDO DE LA MORA","","","2015-10-19","22:19:12","1","0");


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
  `tie_cod` int(11) DEFAULT NULL,
  `tie_des` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tipo_envio VALUES("1","EN CAJA","2015-01-31","16:53:35","1","0");
INSERT INTO tipo_envio VALUES("2","DELIVERY","2015-01-31","16:53:32","1","0");
INSERT INTO tipo_envio VALUES("3","ENTREGADO","2015-02-08","23:10:24","1","0");


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
INSERT INTO tipo_moneda VALUES("2","DOLARES","US$","0","2015-11-14","00:01:18","1","0");
INSERT INTO tipo_moneda VALUES("3","REAL","RE$","0","2015-01-31","17:01:05","1","0");
INSERT INTO tipo_moneda VALUES("4","PESO ARG.","P$","0","2015-11-13","23:23:25","1","0");
INSERT INTO tipo_moneda VALUES("5","LIBRA ","L$","0","2015-02-03","20:10:13","1","0");
INSERT INTO tipo_moneda VALUES("6","YEN","Y$","0","2015-11-13","23:23:47","1","0");


DROP TABLE IF EXISTS tmp;

CREATE TABLE `tmp` (
  `tmp_cod` int(11) NOT NULL AUTO_INCREMENT,
  `numlinea` int(11) NOT NULL,
  `pro_cod` int(11) DEFAULT NULL,
  `pro_can` double DEFAULT NULL,
  `nro_fac` int(11) DEFAULT NULL,
  PRIMARY KEY (`tmp_cod`,`numlinea`),
  UNIQUE KEY `tmp_cod` (`tmp_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tmp VALUES("3","210","2","1","169");


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","admin","827ccb0eea8a706c4c34a16891f84e7b","12345","1","1","2015-10-10","20:39:56","1","0");
INSERT INTO usuarios VALUES("2","cajero","827ccb0eea8a706c4c34a16891f84e7b","12345","3","1","2015-10-10","22:12:06","1","0");


