<?php
@session_start();
include ("../conexion/conectar.php");
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$ven_cod=$_SESSION["codvendedor"];
$met_cod=$_SESSION["met_cod"];

include ("../fecha_hora.php"); 

@$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

if ($accion=="alta") {
  $fac_cod=strtoupper($_POST["variable1"]);
	$pro_bar_bru=$_POST["variable4"];
  $pro_can=$_POST["variable5"];
  $precio=$_POST["precio"];
  
  if(is_numeric($pro_bar_bru)) {
      $pro_bar = $pro_bar_bru;  
    } else {
      $pro_bar = substr($pro_bar_bru,0, strpos($pro_bar_bru,'='));      
    }
    
  $sel="SELECT * from productos where pro_bar='$pro_bar'";
	$rs=mysql_query($sel);
  $pro_cod=mysql_result($rs,0,"pro_cod");
  $pro_cos=mysql_result($rs,0,"pro_cos");
  if ($precio==0){
    $pro_ven=mysql_result($rs,0,"pro_ven");
  }else{
    $pro_ven=$precio;
  }
  
  $pro_tot=($pro_ven*$pro_can);
  $pro_cos_tot=($pro_cos * $pro_can);
  $utilidad=$pro_tot-$pro_cos_tot;
  
  $sel="INSERT INTO factura_det(fac_cod,ape_cod,pro_cod,pro_can,pro_ven,pro_tot,aps_cod,fecha,hora,usuario,borrado,pro_com,pro_uti)
	values('$fac_cod','2','$pro_cod','$pro_can','$pro_ven','$pro_tot','1','$fecha','$hora','$usuario','0','$pro_cos','$utilidad')";
	$rs=mysql_query($sel);
          
  $sel_up="update productos set pro_can=pro_can-$pro_can where pro_cod='$pro_cod' ";
	$rs_up=mysql_query($sel_up);
  
  $sel_met="update metas set met_acu=met_acu+$pro_tot,met_can=met_can+$pro_can where met_cod='$met_cod' ";
	$rs_met=mysql_query($sel_met);

	header("Location: pedidos.php?variable1=$fac_cod&par=modificar");
}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
  $fac_cod=$_GET["fac_cod"];
	$query="UPDATE factura_det SET borrado='1',fecha='$fecha',hora='$hora' where mde_cod='$variable1'";
	$rs_query=mysql_query($query);
  
  $sel="SELECT * from factura_det  where mde_cod='$variable1'";
	$rs=mysql_query($sel);
  $pro_tot=mysql_result($rs,0,"pro_tot");
  $pro_can=mysql_result($rs,0,"pro_can");
  
  $sel_met="update metas set met_acu=met_acu-$pro_tot,met_can=met_can-$pro_can where met_cod='$met_cod' ";
	$rs_met=mysql_query($sel_met);

  header("Location: pedidos.php?variable1=$fac_cod&par=modificar"); 
}
?>