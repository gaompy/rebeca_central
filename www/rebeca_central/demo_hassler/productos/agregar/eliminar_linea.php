<?php
include ("../../conectar.php");

$numlinea=$_GET["numlinea"];
$procod=$_GET["procod"];
$consulta= "update recetas set borrado='1' where rec_cod='$numlinea'";
$rs_consulta = mysql_query($consulta);
echo "<script>parent.location.href='frame_lineas.php?procod=".$procod."';</script>";
?>
<script>parent.document.getElementById("referencia").focus();</script>


