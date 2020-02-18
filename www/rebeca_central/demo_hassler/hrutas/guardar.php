<?php
include ("../conectar.php"); 
@session_start();
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;

include ("../fecha_hora.php"); 

@$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

if ($accion=="alta") {
	$variable2=strtoupper($_POST["variable2"]);
	$variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);
  $variable5=strtoupper($_POST["variable5"]);
  $variable6=strtoupper($_POST["variable6"]);
  
	$sel_maximo="SELECT max(hru_cod) as maximo FROM hruta_cab";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;	
	$query_operacion="INSERT INTO hruta_cab (hru_cod,cam_cod,cho_cod,ayu_cod,zon_cod,hru_tot,fecha,hora,usuario) 
  values('$variable1','$variable2','$variable3','$variable4','$variable5','0','$variable6','$hora','$usuario')";					
	$rs_operacion=mysql_query($query_operacion);
	header("Location: agregar/index.php?variable1=$variable1");
}

if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);
	$variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);
  $variable5=strtoupper($_POST["variable5"]);
  $variable6=strtoupper($_POST["variable6"]);
    
  $query="UPDATE hruta_cab SET cam_cod='$variable2',
  cho_cod='$variable3',ayu_cod='$variable4',zon_cod='$variable5', 
  fecha='$fecha',hora='$hora',usuario='$usuario' where hru_cod='$variable1'";
	$rs_query=mysql_query($query);
	header("Location: agregar/index.php?variable1=$variable1");
}
if ($accion=="baja") {
	$variable1=$_GET["variable1"];
  $query="UPDATE hruta_cab SET borrado='1', 
  fecha='$fecha',hora='$hora',usuario='$usuario' where hru_cod='$variable1'";
	$rs_query=mysql_query($query);
  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");    
}
?>