<?php
include ("../conectar.php"); 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];

include ("../fecha_hora.php"); 
//$variable1=$_GET["variable1"];
$variable2=$_GET["variable2"];
$variable3=str_replace(".","",($_GET["variable3"]));
$variable4=str_replace(".","",($_GET["variable4"]));
$variable5=str_replace(".","",($_GET["variable5"]));

$query="update mesas set mes_fac='0',mes_est='0'";					 
$rs=mysql_query($query);

	$query_operacion="update aper_cie set ape_par= '1', ape_cie = $variable5 + $variable4, ape_efe = $variable3, ape_dif = $variable3-($variable5 + $variable4) 
						where ape_cod = '$variable2' 
						  and usuario = '$usuario'";					
	$rs_operacion=mysql_query($query_operacion);
  
  
	header("Location:../main.php");
?>
		




		
	

