<?php
include ("../conectar.php"); 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../fecha_hora.php"); 

$accion=$_POST["accion"];
if (!isset($accion)) { echo $accion=$_GET["accion"]; }

if ($accion=="alta") {
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=$_POST["variable3"];

	$sel_maximo="SELECT max(mes_cod) as maximo FROM mesas";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO mesas(mes_cod,mes_des,mes_tip,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','$variable3','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
	
}


if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=$_POST["variable3"];
	$query="UPDATE mesas SET mes_des='$variable2',mes_tip='$variable3',fecha='$fecha',hora='$hora',usuario='$usuario' where mes_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");  
	}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE mesas SET borrado='1',fecha='$fecha',hora='$hora' where mes_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}
	
?>