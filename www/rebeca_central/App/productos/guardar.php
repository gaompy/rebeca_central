<?php
@session_start();
include ("../conexion/conectar.php");
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

	$sel_maximo="SELECT max(rem_cod) as maximo FROM remitentes";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO remitentes(rem_cod,rem_des,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);
	header("Location: modificar.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion&par=alta");
}

if ($accion=="modificar") {
	$variable1=$_POST["variable1"];
	$variable2=strtoupper($_POST["variable2"]);	
	$query="UPDATE remitentes SET rem_des='$variable2',fecha='$fecha',hora='$hora',usuario='$usuario' where rem_cod='$variable1'";
	$rs_query=mysql_query($query);
	header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");
	}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE remitentes SET borrado='1',fecha='$fecha',hora='$hora' where rem_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
}
?>
