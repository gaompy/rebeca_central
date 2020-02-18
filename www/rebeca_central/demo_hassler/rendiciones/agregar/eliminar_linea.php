<?php
include ("../../conectar.php");
$numlinea=$_GET["numlinea"];
$hru_cod=$_GET["hru_cod"];
$rendido=str_replace(".","",($_GET["rendido"]));
$envase_ret=str_replace(".","",($_GET["envase_ret"]));
$envase_nor=str_replace(".","",($_GET["envase_nor"]));
$total=str_replace(".","",($_GET["total"]));
$diferencia=$total-$rendido;

$consulta= "update hruta_det set hde_est='1', 
hde_mon='$rendido',hde_dif='$diferencia',hde_env_ret='$envase_ret',
hde_env_nor='$envase_nor',fac_tot='$total' 
where hde_cod='$numlinea'";
$rs_consulta = mysql_query($consulta);
echo "<script>location.href='frame_lineas.php?hru_cod=".$hru_cod."';</script>";
?>