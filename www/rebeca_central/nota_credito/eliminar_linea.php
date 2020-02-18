<?php
include ("../conectar.php");
$numlinea=$_GET["numlinea"];
$par=$_GET["par"];

if ($par==0){
  $consulta= "update compra_det set borrado='1' where mde_cod='$numlinea'";
  $rs_consulta = mysql_query($consulta);
  $consulta1="SELECT * from compra_det WHERE mde_cod='$numlinea'";
  $rs_tabla1 = mysql_query($consulta1);
  $codigo=mysql_result($rs_tabla1,0,"pro_cod");
  $cantidad=mysql_result($rs_tabla1,0,"pro_can");	

  $sel_up="update productos set pro_can=pro_can-$cantidad where pro_cod='$codigo'";
  $rs_up=mysql_query($sel_up);
}
	
if ($par==1){
  
  $total=str_replace(".","",($_GET["total"]));
  $sel_up="update compra_det set pro_tot='$total' where mde_cod='$numlinea'";
  $rs_up=mysql_query($sel_up);
}
?>