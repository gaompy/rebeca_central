<?php


include ("../../conectar.php");


$numlinea=$_GET["numlinea"];
$cli_cod=$_GET["cli_cod"];




$consulta= "update clientes_det set borrado='1' where cld_cod='$numlinea'";
$rs_consulta = mysql_query($consulta);



echo "<script>parent.location.href='frame_lineas.php?cli_cod=".$cli_cod."';</script>";

?>

<script>parent.document.getElementById("variable4").focus();</script>


