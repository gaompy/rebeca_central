<?php
include ("../conectar.php"); 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
include ("../fecha_hora.php"); 
  
  $variable2=str_replace(".","",($_GET["variable2"]));
	$sel_maximo="SELECT max(ape_cod) as maximo FROM aper_cie";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
  $query_operacion="INSERT INTO aper_cie (ape_cod,ape_dot,ape_par,aps_cod,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','0','1','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);

	header("Location:../main.php");
?>
		




		
	

