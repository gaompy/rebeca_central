<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../fecha_hora.php"); 
include ("../conectar.php"); 

$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

if ($accion=="alta") {

  $variable1=$_POST["variable1"];
  
  $sel_maximo="select * from factura_cab where fac_cod='$variable1'";
	$rs_maximo=mysql_query($sel_maximo);
	$mes_cod=mysql_result($rs_maximo,0,"mes_cod");
  
  
  $up="update mesas set mes_fac='$variable1' where mes_cod='$mes_cod'";
  $rs=mysql_query($up);
  $ncaja=$mes_cod;
  
  header("Location: ../facturacion_app/detalle.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion&nromesa=$ncaja"); 
}
	
?>

