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
if (!isset($accion)) { $accion=$_GET["accion"]; }

if ($accion=="alta") {
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);
  //$variable5=strtoupper($_POST["variable5"]);

	$sel_maximo="SELECT max(cam_cod) as maximo FROM camiones";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion=" INSERT INTO camiones 	(cam_cod, 	cam_des, 	cam_cha, 	cam_kil, 	
  fecha, 	hora, 	usuario, 	borrado 	) 	
  VALUES 	('$variable1', 	'$variable2', 	'$variable3', 	'$variable4',  	
  '$fecha', 	'$hora', 	'$usuario', 	'0' 	)";				
	$rs_operacion=mysql_query($query_operacion);
  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");     
	}

if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);
  //$variable5=strtoupper($_POST["variable5"]);
  
	$query="UPDATE camiones 	SET 	cam_des = '$variable2' , 	
  cam_cha = '$variable3' , 	cam_kil = '$variable4' , 	
  fecha = '$fecha' , 	hora = '$hora' , 	usuario = '$usuario' 	
  WHERE 	cam_cod = '$variable1' ";
	$rs_query=mysql_query($query);  
	header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");   
	}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE camiones SET borrado='1',fecha='$fecha',hora='$hora' where cam_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}
?>

