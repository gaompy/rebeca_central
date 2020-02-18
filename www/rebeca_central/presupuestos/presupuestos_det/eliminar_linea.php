<?php


include ("../../conectar.php");


$numlinea=$_GET["numlinea"];
$nrofactura=$_GET["nrofactura"];




$consulta= "update presupuesto_det set borrado='1' where prd_cod='$numlinea'";
$rs_consulta = mysql_query($consulta);


	$consulta3="select sum(pro_tot) as total from presupuesto_det where pre_cod='$nrofactura' and borrado='0'";
	$rs_tabla3 = mysql_query($consulta3);
	$costotal=mysql_result($rs_tabla3,0,"total");	

									





echo "<script>parent.location.href='frame_lineas.php?codcliente1=".$nrofactura."';</script>";

?>

<script>parent.document.getElementById("referencia").focus();</script>


