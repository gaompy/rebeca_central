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
  $variable5=strtoupper($_POST["variable5"]);

	$sel_maximo="SELECT max(cho_cod) as maximo FROM choferes";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion=" INSERT INTO choferes 	(cho_cod, 	cho_des, 	cho_dir, 	cho_tel, 	cho_ema, 	
  fecha, 	hora, 	usuario, 	borrado 	) 	
  VALUES 	('$variable1', 	'$variable2', 	'$variable3', 	'$variable4', 	'$variable5', 	
  '$fecha', 	'$hora', 	'$usuario', 	'0' 	)";				
	$rs_operacion=mysql_query($query_operacion);
  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");     
	}

if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);
  $variable5=strtoupper($_POST["variable5"]);
  
	$query="UPDATE choferes 	SET 	cho_des = '$variable2' , 	
  cho_dir = '$variable3' , 	cho_tel = '$variable4' , 	
  cho_ema = '$variable5', fecha = '$fecha' , 	hora = '$hora' , 	usuario = '$usuario' 	
  WHERE 	cho_cod = '$variable1' ";
	$rs_query=mysql_query($query);  
	header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");   
	}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE choferes SET borrado='1',fecha='$fecha',hora='$hora' where cho_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}
?>

