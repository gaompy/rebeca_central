<?php
@@session_start();
include ("../conectar.php"); 
$usuario=$_SESSION["id_usuario"];

$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../fecha_hora.php"); 

$variable1=$_GET["nrofactura"];
$recibido=$_GET["diferencia"];

$query_operacion="update factura_cab set fac_rec='$recibido',tie_cod='3' where fac_cod='$variable1'";					
$rs_operacion=mysql_query($query_operacion);

header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
	
?>
