<?php
include ("../conectar.php"); 
include ("../fecha_hora.php");
 

	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);
  $variable5=strtoupper($_POST["variable5"]);
  $variable6=strtoupper($_POST["variable6"]);
  $variable7=strtoupper($_POST["variable7"]);
  $variable8=strtoupper($_POST["variable8"]);
  $variable9=$_POST["variable9"];
  $variable10=md5($_POST["variable10"]);
  $variable10_1=$_POST["variable10"];
  $variable11=$_SERVER['REMOTE_ADDR'];
  
  
	$sel_maximo="SELECT count(*) as cuenta FROM registro where reg_ema='$variable9'";
	$rs_maximo=mysql_query($sel_maximo);
	$cuenta=mysql_result($rs_maximo,0,"cuenta");
  
  if ($cuenta==0){  
  
  /******************************************************/
  
	$sel_maximo="SELECT max(reg_cod) as maximo FROM registro";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo") + 1;
  $variable12="alpha_gratis_".$variable1;
  
	/******************************************************/
	$query_operacion="INSERT INTO registro(reg_cod,reg_emp, reg_rub, reg_nom, reg_ape, reg_dir, reg_ciu, 
	reg_pai, reg_ema, reg_pas, reg_ip, reg_dat_bas, fecha, hora,reg_pas_nor)
  VALUES('$variable1','$variable2', '$variable3', '$variable4','$variable5', '$variable6', 
	'$variable7', '$variable8', '$variable9','$variable10', '$variable11','$variable12', 
	'$fecha', '$hora','$variable10_1')";				
	$rs_operacion=mysql_query($query_operacion);	
  /******************************************************/
	/*$query="create database $variable12";  				
	$rs=mysql_query($query);*/	  
  //header("Location: ../index.php"); 
	
?>

<?php

$source_db="alpha_matrix_gratis";
$new_db=$variable12;

mysql_select_db($source_db);
$result=mysql_query("SHOW FULL TABLES FROM alpha_matrix_gratis WHERE table_type='BASE TABLE'");
$table_names=array();
while($row=mysql_fetch_array($result)){
$table_names[]=$row[0];
}
mysql_query("create database $new_db");
mysql_select_db($new_db);
for($i=0;$i<count($table_names);$i++){
mysql_query("create table ".$table_names[$i]." select * from $source_db.".$table_names[$i]);
}

mysql_query("CREATE VIEW aper_cie_view AS (
SELECT
  aper_cie.ape_cod AS ape_cod,
  REPLACE(FORMAT(aper_cie.ape_dot,0),_utf8',',_utf8'.') AS ape_dot,
  REPLACE(FORMAT(aper_cie.ape_efe,0),_utf8',',_utf8'.') AS ape_efe,
  REPLACE(FORMAT(aper_cie.ape_cie,0),_utf8',',_utf8'.') AS ape_cie,
  (CASE WHEN (aper_cie.ape_par = 0) THEN _utf8'Abierto' WHEN (aper_cie.ape_par = 1) THEN _utf8'Cerrado' END) AS ape_est,
  REPLACE(FORMAT(aper_cie.ape_dif,0),_utf8',',_utf8'.') AS ape_dif,
  aper_cie.aps_cod AS aps_cod,
  aper_cie.fecha   AS fecha,
  aper_cie.hora    AS hora,
  aper_cie.usuario AS usuario,
  aper_cie.borrado AS borrado
FROM aper_cie)");
  /**************************************/
mysql_query("CREATE VIEW bajas_view AS (
SELECT
  bajas.prd_cod AS prd_cod,
  bajas.pro_cod AS pro_cod,
  (SELECT
     productos.pro_bar AS pro_bar
   FROM productos
   WHERE (productos.pro_cod = bajas.pro_cod)) AS pro_bar,
  (SELECT
     productos.pro_des AS pro_des
   FROM productos
   WHERE (productos.pro_cod = bajas.pro_cod)) AS pro_des,
  (SELECT
     productos.par_cod AS par_cod
   FROM productos
   WHERE (productos.pro_cod = bajas.pro_cod)) AS par_cod,
  (SELECT
     productos.fam_cod AS fam_cod
   FROM productos
   WHERE (productos.pro_cod = bajas.pro_cod)) AS fam_cod,
  bajas.prd_can AS prd_can,
  bajas.prd_fec AS prd_fec,
  bajas.fecha   AS fecha,
  bajas.hora    AS hora,
  bajas.usuario AS usuario,
  bajas.borrado AS borrado
FROM bajas)");  
/*************************/
mysql_query("CREATE VIEW bancos_view AS (SELECT
  bancos.ban_cod AS ban_cod,
  bancos.ban_des AS ban_des,
  bancos.ban_nro AS ban_nro,
  bancos.tcu_cod AS tcu_cod,
  bancos.tmo_cod AS tmo_cod,
  bancos.fecha   AS fecha,
  bancos.hora    AS hora,
  bancos.usuario AS usuario,
  bancos.borrado AS borrado,
  (SELECT
     tipo_cuenta.tcu_des AS tcu_des
   FROM tipo_cuenta
   WHERE (tipo_cuenta.tcu_cod = bancos.tcu_cod)) AS tcu_des,
  (SELECT
     tipo_moneda.tmo_des AS tmo_des
   FROM tipo_moneda
   WHERE (tipo_moneda.tmo_cod = bancos.tmo_cod)) AS tmo_des
FROM bancos)");

mysql_query("CREATE VIEW clientes_view AS (SELECT
  clientes.cli_cod AS cli_cod,
  clientes.cli_des AS cli_des,
  clientes.cli_ruc AS cli_ruc,
  clientes.cli_dir AS cli_dir,
  clientes.cli_tel AS cli_tel,
  clientes.cli_mai AS cli_mai,
  clientes.med_cod AS med_cod,
  clientes.tic_cod AS tic_cod,
  clientes.fecha   AS fecha,
  clientes.hora    AS hora,
  clientes.usuario AS usuario,
  clientes.borrado AS borrado,
  (SELECT
     tipo_cliente.tic_des AS tic_des
   FROM tipo_cliente
   WHERE (tipo_cliente.tic_cod = clientes.tic_cod)) AS tic_des,
  (SELECT
     tipo_cliente.tic_por AS tic_por
   FROM tipo_cliente
   WHERE (tipo_cliente.tic_cod = clientes.tic_cod)) AS tic_por,
  (SELECT
     medios.med_des   AS med_des
   FROM medios
   WHERE (medios.med_cod = clientes.med_cod)) AS med_des
FROM clientes)");


mysql_query("CREATE VIEW compras_cab_view AS (SELECT
  compra_cab.fac_cod AS fac_cod,
  compra_cab.fac_num AS fac_num,
  compra_cab.ape_cod AS ape_cod,
  compra_cab.prv_cod AS prv_cod,
  (SELECT
     proveedores.prv_des AS prv_des
   FROM proveedores
   WHERE (proveedores.prv_cod = compra_cab.prv_cod)) AS prv_des,
  (SELECT
     proveedores.prv_ruc AS prv_ruc
   FROM proveedores
   WHERE (proveedores.prv_cod = compra_cab.prv_cod)) AS prv_ruc,
  compra_cab.mpg_cod AS mpg_cod,
  (SELECT
     medios_pago.mpg_des AS mpg_des
   FROM medios_pago
   WHERE (medios_pago.mpg_cod = compra_cab.mpg_cod)) AS mpg_des,
  compra_cab.for_cod AS for_cod,
  (SELECT
     formas_pago.for_des AS for_des
   FROM formas_pago
   WHERE (formas_pago.for_cod = compra_cab.for_cod)) AS for_des,
  compra_cab.tmo_cod AS tmo_cod,
  (SELECT
     tipo_moneda.tmo_des AS tmo_des
   FROM tipo_moneda
   WHERE (tipo_moneda.tmo_cod = compra_cab.tmo_cod)) AS tmo_des,
  compra_cab.cot_cod AS cot_cod,
  compra_cab.cot_mon AS cot_mon,
  compra_cab.tie_cod AS tie_cod,
  (SELECT
     tipo_envio.tie_des AS tie_des
   FROM tipo_envio
   WHERE (tipo_envio.tie_cod = compra_cab.tie_cod)) AS tie_des,
  compra_cab.fac_imp AS fac_imp,
  REPLACE(FORMAT(compra_cab.fac_tot,0),_utf8',',_utf8'.') AS fac_tot_1,
  compra_cab.fac_tot AS fac_tot,
  compra_cab.aps_cod AS aps_cod,
  FORMAT(compra_cab.cot_mon,0) AS cot_mon_1,
  compra_cab.mes_cod AS mes_cod,
  (SELECT
     mesas.mes_des      AS mes_des
   FROM mesas
   WHERE (mesas.mes_cod = compra_cab.mes_cod)) AS mes_des,
  compra_cab.fac_est AS fac_est,
  (CASE WHEN (compra_cab.fac_est = 0) THEN _utf8'Pendiente' ELSE _utf8'Cerrado' END) AS estado,
  compra_cab.fac_sal AS fac_sal,
  compra_cab.fecha   AS fecha,
  compra_cab.hora    AS hora,
  compra_cab.usuario AS usuario,
  compra_cab.borrado AS borrado
FROM compra_cab)");

mysql_query("CREATE VIEW cotizaciones_view AS (
SELECT
  cotizaciones.cot_cod AS cot_cod,
  cotizaciones.tmo_cod AS tmo_cod,
  cotizaciones.cot_com AS cot_com,
  cotizaciones.cot_ven AS cot_ven,
  cotizaciones.fecha   AS fecha,
  cotizaciones.hora    AS hora,
  cotizaciones.usuario AS usuario,
  cotizaciones.borrado AS borrado,
  (SELECT
     tipo_moneda.tmo_des  AS tmo_des
   FROM tipo_moneda
   WHERE (tipo_moneda.tmo_cod = cotizaciones.tmo_cod)) AS tmo_des
FROM cotizaciones)");

mysql_query("CREATE VIEW factura_cab_view AS (
SELECT
  factura_cab.fac_cod AS fac_cod,
  factura_cab.fac_num AS fac_num,
  factura_cab.ape_cod AS ape_cod,
  factura_cab.cli_cod AS cli_cod,
  (SELECT
     clientes.cli_des    AS cli_des
   FROM clientes
   WHERE (clientes.cli_cod = factura_cab.cli_cod)) AS cli_des,
  (SELECT
     clientes.cli_ruc    AS cli_ruc
   FROM clientes
   WHERE (clientes.cli_cod = factura_cab.cli_cod)) AS cli_ruc,
  factura_cab.mpg_cod AS mpg_cod,
  (SELECT
     medios_pago.mpg_des AS mpg_des
   FROM medios_pago
   WHERE (medios_pago.mpg_cod = factura_cab.mpg_cod)) AS mpg_des,
  factura_cab.for_cod AS for_cod,
  (SELECT
     formas_pago.for_des AS for_des
   FROM formas_pago
   WHERE (formas_pago.for_cod = factura_cab.for_cod)) AS for_des,
  factura_cab.tmo_cod AS tmo_cod,
  (SELECT
     tipo_moneda.tmo_des AS tmo_des
   FROM tipo_moneda
   WHERE (tipo_moneda.tmo_cod = factura_cab.tmo_cod)) AS tmo_des,
  factura_cab.cot_cod AS cot_cod,
  factura_cab.cot_mon AS cot_mon,
  factura_cab.tie_cod AS tie_cod,
  (SELECT
     tipo_envio.tie_des  AS tie_des
   FROM tipo_envio
   WHERE (tipo_envio.tie_cod = factura_cab.tie_cod)) AS tie_des,
  factura_cab.fac_imp AS fac_imp,
  REPLACE(FORMAT(factura_cab.fac_tot,0),_utf8',',_utf8'.') AS fac_tot_1,
  factura_cab.fac_tot AS fac_tot,
  factura_cab.aps_cod AS aps_cod,
  FORMAT(factura_cab.cot_mon,0) AS cot_mon_1,
  factura_cab.mes_cod AS mes_cod,
  (SELECT
     mesas.mes_des       AS mes_des
   FROM mesas
   WHERE (mesas.mes_cod = factura_cab.mes_cod)) AS mes_des,
  factura_cab.fac_est AS fac_est,
  (CASE WHEN (factura_cab.fac_est = 0) THEN _utf8'Pendiente' ELSE _utf8'Cerrado' END) AS estado,
  factura_cab.fac_sal AS fac_sal,
  factura_cab.fac_rec AS fac_rec,
  factura_cab.fecha   AS fecha,
  factura_cab.hora    AS hora,
  factura_cab.usuario AS usuario,
  factura_cab.borrado AS borrado
FROM factura_cab)");

mysql_query("CREATE VIEW inventarios_cab_view AS (
SELECT
  inventario_cab.inv_cod AS inv_cod,
  inventario_cab.inv_des AS inv_des,
  inventario_cab.inv_par AS inv_par,
  (CASE inventario_cab.inv_par WHEN 0 THEN _utf8'PENDIENTE' WHEN 1 THEN _utf8'CONFIRMADO' WHEN 2 THEN _utf8'AJUSTADO' END) AS par_des,
  inventario_cab.inv_fec AS inv_fec,
  inventario_cab.fecha   AS fecha,
  inventario_cab.hora    AS hora,
  inventario_cab.usuario AS usuario,
  inventario_cab.borrado AS borrado,
  (SELECT
     SUM((inventario_det.pro_can * inventario_det.pro_cos)) AS total
   FROM inventario_det
   WHERE ((inventario_det.borrado = _utf8'0')
          AND (inventario_det.inv_cod = inventario_cab.inv_cod))
   GROUP BY inventario_det.inv_cod) AS total,
  REPLACE(FORMAT((SELECT SUM((inventario_det.pro_can * inventario_det.pro_cos)) AS total FROM inventario_det WHERE ((inventario_det.borrado = _utf8'0') AND (inventario_det.inv_cod = inventario_cab.inv_cod)) GROUP BY inventario_det.inv_cod),0),_utf8',',_utf8'.') AS total_format
FROM inventario_cab)");


mysql_query("CREATE VIEW productos_view AS (
SELECT
  productos.pro_cod AS pro_cod,
  productos.pro_bar AS pro_bar,
  productos.pro_des AS pro_des,
  productos.pro_cos AS pro_cos,
  productos.pro_ven AS pro_ven,
  productos.pro_can AS pro_can,
  productos.pro_imp AS pro_imp,
  productos.par_cod AS par_cod,
  productos.fam_cod AS fam_cod,
  productos.uni_cod AS uni_cod,
  productos.mar_cod AS mar_cod,
  productos.fecha   AS fecha,
  productos.hora    AS hora,
  productos.usuario AS usuario,
  productos.borrado AS borrado,
  (SELECT
     parametro.par_des AS par_des
   FROM parametro
   WHERE (parametro.par_cod = productos.par_cod)) AS par_des,
  (SELECT
     familias_pro.fam_des AS fam_des
   FROM familias_pro
   WHERE (familias_pro.fam_cod = productos.fam_cod)) AS fam_des,
  (SELECT
     unidades.uni_des  AS uni_des
   FROM unidades
   WHERE (unidades.uni_cod = productos.uni_cod)) AS uni_des,
  (SELECT
     marcas.mar_des    AS mar_des
   FROM marcas
   WHERE (marcas.mar_cod = productos.mar_cod)) AS mar_des
FROM productos)");


mysql_query("CREATE VIEW inventarios_det_view AS (
SELECT
  inventario_det.mde_cod AS mde_cod,
  inventario_det.inv_cod AS inv_cod,
  inventario_det.pro_cod AS pro_cod,
  inventario_det.pro_can AS pro_can,
  inventario_det.pro_cos AS pro_cos,
  REPLACE(FORMAT(inventario_det.pro_cos,0),_utf8',',_utf8'.') AS pro_cos_for,
  inventario_det.pro_tot AS pro_tot,
  REPLACE(FORMAT(inventario_det.pro_tot,0),_utf8',',_utf8'.') AS pro_tot_for,
  inventario_det.fecha   AS fecha,
  inventario_det.hora    AS hora,
  inventario_det.usuario AS usuario,
  inventario_det.borrado AS borrado,
  (SELECT
     productos_view.pro_bar AS pro_bar
   FROM productos_view
   WHERE (productos_view.pro_cod = inventario_det.pro_cod)) AS pro_bar,
  (SELECT
     productos_view.pro_des AS pro_des
   FROM productos_view
   WHERE (productos_view.pro_cod = inventario_det.pro_cod)) AS pro_des,
  (SELECT
     productos_view.fam_des AS fam_des
   FROM productos_view
   WHERE (productos_view.pro_cod = inventario_det.pro_cod)) AS fam_des
FROM inventario_det)");



mysql_query("CREATE VIEW movimientos_view AS (
SELECT
  movimientos.mov_cod AS mov_cod,
  movimientos.mov_nro AS mov_nro,
  movimientos.mov_obs AS mov_obs,
  movimientos.mov_mon AS mov_mon,
  movimientos.mov_par AS mov_par,
  movimientos.ban_cod AS ban_cod,
  movimientos.mov_fec AS mov_fec,
  movimientos.fecha   AS fecha,
  movimientos.hora    AS hora,
  movimientos.usuario AS usuario,
  movimientos.borrado AS borrado,
  (SELECT
     bancos_view.ban_des AS ban_des
   FROM bancos_view
   WHERE (bancos_view.ban_cod = movimientos.ban_cod)) AS ban_des,
  (SELECT
     bancos_view.ban_nro AS ban_nro
   FROM bancos_view
   WHERE (bancos_view.ban_cod = movimientos.ban_cod)) AS ban_nro,
  (SELECT
     bancos_view.tcu_cod AS tcu_cod
   FROM bancos_view
   WHERE (bancos_view.ban_cod = movimientos.ban_cod)) AS tcu_cod,
  (SELECT
     bancos_view.tcu_des AS tcu_des
   FROM bancos_view
   WHERE (bancos_view.ban_cod = movimientos.ban_cod)) AS tcu_des,
  (SELECT
     bancos_view.tmo_cod AS tmo_cod
   FROM bancos_view
   WHERE (bancos_view.ban_cod = movimientos.ban_cod)) AS tmo_cod,
  (SELECT
     bancos_view.tmo_des AS tmo_des
   FROM bancos_view
   WHERE (bancos_view.ban_cod = movimientos.ban_cod)) AS tmo_des,
  REPLACE(FORMAT(movimientos.mov_mon,0),_utf8',',_utf8'.') AS monto
FROM movimientos)");




mysql_query("CREATE VIEW produccion_view AS (
SELECT
  produccion.prd_cod AS prd_cod,
  produccion.pro_cod AS pro_cod,
  (SELECT
     productos.pro_bar  AS pro_bar
   FROM productos
   WHERE (productos.pro_cod = produccion.pro_cod)) AS pro_bar,
  (SELECT
     productos.pro_des  AS pro_des
   FROM productos
   WHERE (productos.pro_cod = produccion.pro_cod)) AS pro_des,
  (SELECT
     productos.par_cod  AS par_cod
   FROM productos
   WHERE (productos.pro_cod = produccion.pro_cod)) AS par_cod,
  (SELECT
     productos.fam_cod  AS fam_cod
   FROM productos
   WHERE (productos.pro_cod = produccion.pro_cod)) AS fam_cod,
  produccion.prd_can AS prd_can,
  produccion.prd_fec AS prd_fec,
  produccion.fecha   AS fecha,
  produccion.hora    AS hora,
  produccion.usuario AS usuario,
  produccion.borrado AS borrado
FROM produccion)");

                 

	 $variable2=$variable9;
	 $variable3=$variable10;
	 $variable4=1;
   $variable5=1;


	$sel_maximo="SELECT max(id) as maximo FROM usuarios";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO usuarios (id,usuario,password,niv_cod,suc_cod,fecha,hora,usu,borrado,password_nor)
					VALUES ('$variable1','$variable2','$variable3','$variable4','$variable5','$fecha','$hora','1','0','$variable10_1')";					
	$rs_operacion=mysql_query($query_operacion);
?>
 <script>
  alert("Ha sido dado de alta satisfactoriamente, ingrese su email y su contraseña en el sistema!")
  location.href="../index.php";
 </script>
 

<?
}else{

?>
 <script>
  alert("Ya tenemos registrado su email, favor contactenos a : alpha@alpha-py.com")
  location.href="index.php";
 </script>
 

<?

}


?>
