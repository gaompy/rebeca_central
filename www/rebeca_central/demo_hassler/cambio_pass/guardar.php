<?php
include ("../conectar.php"); 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
//include("../seguridad.php");
include ("../fecha_hora.php"); 

$accion=$_POST["accion"];
if (!isset($accion)) { echo $accion=$_GET["accion"]; }

if ($accion=="alta") {
	$variable2=$_POST["variable2"];
	
	if ($variable2!=''){

	$sel_maximo="SELECT max(pai_cod) as maximo FROM paises";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO paises (pai_cod,pai_des,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);
	header("Location: index.php");
	}else{ 
	header("Location: index.php"); 
	}
	
}

if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=$_POST["variable2"];	
	$variable3=md5($_POST["variable3"]);
  $variable3_1=$_POST["variable3"];
	if ($variable2!=''){
	$query="UPDATE usuarios SET password='$variable3',password_nor='$variable3_1',fecha='$fecha',hora='$hora',usu='$usuario' where id='$variable1'";
	$rs_query=mysql_query($query);

	header("Location:../central.php");
	}else{
	header("Location:../central.php"); 
	}

}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE paises SET borrado='1',fecha='$fecha',hora='$hora' where pai_cod='$variable1'";
	$rs_query=mysql_query($query);
	header("Location: index.php");

}

		
	
?>

