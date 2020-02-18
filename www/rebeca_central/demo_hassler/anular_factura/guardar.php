<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../conectar.php"); 
include ("../fecha_hora.php"); 

$variable1=$_GET["nrofactura"];


$query="update factura_cab set borrado='1' where fac_cod='$variable1'";					 
$rs=mysql_query($query);

$query="update mesas set mes_fac='0',mes_est='0' where mes_fac='$variable1'";					 
$rs=mysql_query($query);

$sel="select * from factura_det where borrado='0' and fac_cod='$variable1'";
$rs=mysql_query($sel);

for($i = 0; $i < mysql_num_rows($rs); $i++){
  $pro_cod=mysql_result($rs,$i,"pro_cod");
  $pro_can=mysql_result($rs,$i,"pro_can");  
  $sel_up="update productos set pro_can=pro_can+$pro_can where pro_cod='$pro_cod'";
  $rs_up=mysql_query($sel_up);
}
$query="update factura_det set borrado='1' where fac_cod='$variable1'";					 
$rs=mysql_query($query);

mysql_close($conexion);

header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

?>
