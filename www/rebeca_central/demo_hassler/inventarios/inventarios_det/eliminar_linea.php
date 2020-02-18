<?php
include ("../../conectar.php");
$numlinea=$_GET["numlinea"];
$nrofactura=$_GET["nrofactura"];
$consulta= "update inventario_det set borrado='1' where mde_cod='$numlinea'";
$rs_consulta = mysql_query($consulta);
echo "<script>parent.location.href='frame_lineas.php?codcliente1=".$nrofactura."';</script>";
?>