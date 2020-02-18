<?php
session_start();
include ("../conexion/conectar.php");
include ("../conexion/fecha_hora.php");
$usuario=$_SESSION["id_usuario"];
$ncaja=$_SESSION["ncaja"];

$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

if ($accion=="modificar") {

$variable1=$_POST['cli_cod'];

$query1="SELECT max(fac_cod) as maximo FROM factura_cab";
$rs_query1=mysql_query($query1);
$nro_fac=mysql_result($rs_query1,0,"maximo")+1;
  
    $sel="INSERT INTO factura_cab (fac_cod,ape_cod,cli_cod,aps_cod,mes_cod,fecha,hora,usuario,borrado) 
    VALUES ('$nro_fac','1','$variable1','1',$ncaja,'$fecha','$hora','$usuario','0')";
    $rs=mysql_query($sel);                

    $sel="update mesas set mes_fac='$nro_fac',mes_est='1' where mes_cod='$ncaja'";
    $rs=mysql_query($sel);	

    	$sel="select * from clientes_view where borrado='0' and cli_cod='$variable1'";
	    $rs=mysql_query($sel);  
      $cuenta = mysql_num_rows($rs);
      
      $cli_cod=mysql_result($rs,0, "cli_cod");
      $codigoanterior=mysql_result($rs,0, "codigoanterior");
      $nombrecliente=mysql_result($rs,0, "nombrecliente");
      echo "SE HA GENERADO PEDIDO NRO.: ".$nro_fac;
 }
 
 ?>