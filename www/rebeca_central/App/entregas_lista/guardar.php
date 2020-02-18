<?php
@session_start();
include ("../conexion/conectar.php");
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
include ("../fecha_hora.php"); 

@$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

if ($accion=="alta") {
  $fac_cod=strtoupper($_POST["variable1"]);
	$pro_bar=strtoupper($_POST["variable4"]);
  $pro_can=strtoupper($_POST["variable5"]);

/*	
	$query_operacion="INSERT INTO remitentes(rem_cod,rem_des,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);*/
  
  $sel="SELECT * from productos where pro_bar='$pro_bar'";
	$rs=mysql_query($sel);
  $pro_cod=mysql_result($rs,0,"pro_cod");
  $pro_cos=mysql_result($rs,0,"pro_cos");
  $pro_ven=mysql_result($rs,0,"pro_ven");
  
  $pro_tot=($pro_ven*$pro_can);
  $pro_cos_tot=($pro_cos * $pro_can);
  $utilidad=$pro_tot-$pro_cos_tot;
  
  $sel="INSERT INTO factura_det(fac_cod,ape_cod,pro_cod,pro_can,pro_ven,pro_tot,aps_cod,fecha,hora,usuario,borrado,pro_com,pro_uti)
	values('$fac_cod','2','$pro_cod','$pro_can','$pro_ven','$pro_tot','1','$fecha','$hora','$usuario','0','$pro_cos','$utilidad')";
	$rs=mysql_query($sel);
          
  $sel_up="update productos set pro_can=pro_can-$pro_can where pro_cod='$pro_cod' ";
	$rs_up=mysql_query($sel_up);
	header("Location: modificar.php?variable1=$fac_cod&par=modificar");
}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
  $fac_cod=$_GET["fac_cod"];
	$query="UPDATE factura_det SET borrado='1',fecha='$fecha',hora='$hora' where mde_cod='$variable1'";
	$rs_query=mysql_query($query);
  header("Location: modificar.php?variable1=$fac_cod&par=modificar"); 
}
?>
