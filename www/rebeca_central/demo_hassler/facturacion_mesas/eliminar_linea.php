<?php
include ("../conectar.php");


$numlinea=$_GET["numlinea"];
$nrofactura=$_GET["nrofactura"];

$consulta= "update factura_det set borrado='1' where mde_cod='$numlinea'";
$rs_consulta = mysql_query($consulta);


$consulta1="SELECT * from factura_det WHERE mde_cod='$numlinea'";
$rs_tabla1 = mysql_query($consulta1);
$codigo=mysql_result($rs_tabla1,0,"pro_cod");
$cantidad=mysql_result($rs_tabla1,0,"pro_can");	

$sel_up="update productos set pro_can=pro_can+$cantidad where pro_cod='$codigo' ";
$rs_up=mysql_query($sel_up);	

$par=1;
$pro_cod=$codigo;
$pro_can=$cantidad;
include("componentes.php") ;
?>

<script>

parent.opener.document.formulario_lineas.submit();
parent.opener.document.formulario_lineas.variable6.focus();
</script>


