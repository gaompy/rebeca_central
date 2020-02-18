<?php
@@session_start();
include ("../conectar.php"); 
$_SESSION["s_username"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../fecha_hora.php"); 

$variable1=$_GET["nrofactura"];
$pago=str_replace(".","",($_GET["diferencia"]));
$fecha_pago=$_GET["fecha"];

$query="SELECT * FROM factura_cab WHERE fac_cod='$variable1'";
$rs_query=mysql_query($query);
$saldo=mysql_result($rs_query,0,"fac_sal");
$cliente=mysql_result($rs_query,0,"cli_cod");
$saldototal=$saldo-$pago;


$query_operacion="update factura_cab set fac_sal='$saldototal' where fac_cod='$variable1'";					
$rs_operacion=mysql_query($query_operacion);

$query_operacion1="insert into cobros (fac_cod,cli_cod,cob_mon,cob_sal,fecha,hora,usuario,borrado) 
values('$variable1','$cliente','$pago','$saldototal','$fecha_pago','$hora','$usuario','0')";					
$rs_operacion1=mysql_query($query_operacion1);

header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
?>
