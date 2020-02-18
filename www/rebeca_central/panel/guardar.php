<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
include ("../conectar.php"); 


  $variable1=$_GET["linea"];
 
	$query="UPDATE factura_det SET mde_par=1 where fac_cod='$variable1' ";
	$rs_query=mysql_query($query);
  
	$query="UPDATE factura_cab SET fac_ent=1 where fac_cod='$variable1' ";
	$rs_query=mysql_query($query);
  
	header("Location: index.php");


?>

