<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 

include ("../conectar.php");


$numlinea=$_GET["numlinea"];
$nrofactura=$_GET["nrofactura"];




$consulta= "update factura_det set borrado='1' where mde_cod='$numlinea'";
$rs_consulta = mysql_query($consulta);


$consulta1="SELECT * from factura_det WHERE mde_cod='$numlinea'";
$rs_tabla1 = mysql_query($consulta1);
$codigo=mysql_result($rs_tabla1,0,"pro_cod");
$cantidad=mysql_result($rs_tabla1,0,"pro_can");	


$consulta2="SELECT * from productos WHERE pro_cod='$codigo'";
$rs_tabla2 = mysql_query($consulta2);
$cantidadproducto=mysql_result($rs_tabla2,0,"pro_can");

$calculo=$cantidadproducto+$cantidad;

$sel_insert3="update productos set pro_can='$calculo' where pro_cod='$codigo' ";
$rs_insert3=mysql_query($sel_insert3);	

	
	$consulta3="select sum(pro_tot) as total from factura_det where fac_cod='$nrofactura' and borrado='0'";
	$rs_tabla3 = mysql_query($consulta3);
	$costotal=mysql_result($rs_tabla3,0,"total");	
	
	if (!isset($costotal)) {
	
	$sel_insert4="update factura_cab set fac_tot='0' where fac_cod='$nrofactura'";
	$rs_insert4=mysql_query($sel_insert4);	
	
	
	}else{
			
	$sel_insert4="update factura_cab set fac_tot='$costotal' where fac_cod='$nrofactura'";
	$rs_insert4=mysql_query($sel_insert4);	
	}
									





echo "<script>parent.location.href='frame_lineas.php?nro_fac=".$nrofactura."';</script>";

?>

<script>parent.document.getElementById("referencia").focus();</script>


