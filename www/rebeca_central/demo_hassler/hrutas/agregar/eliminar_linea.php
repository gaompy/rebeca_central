<?php
include ("../../conectar.php");
$numlinea=$_GET["numlinea"];
$hru_cod=$_GET["hru_cod"];
$fac_cod=$_GET["fac_cod"];
$consulta= "update hruta_det set borrado='1' where hde_cod='$numlinea'";
$rs_consulta = mysql_query($consulta);

$sql_up = "update factura_cab set fac_ent='0', hru_cod='0' where fac_cod='$fac_cod' "; 
$query_up=mysql_query($sql_up);   

echo "<script>parent.location.href='frame_lineas.php?hru_cod=".$hru_cod."';</script>";
?>
<script>parent.document.getElementById("variable_1").focus();</script>
