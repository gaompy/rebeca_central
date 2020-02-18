<?php
@session_start();
include ("../conectar.php");
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
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=str_replace(".","",($_POST["variable4"]));
  $variable5=str_replace(".","",($_POST["variable5"]));
  $variable6=strtoupper($_POST["variable6"]);
  $variable7=strtoupper($_POST["variable7"]);
  $variable8=strtoupper($_POST["variable8"]);
  $variable9=strtoupper($_POST["variable9"]);
  $variable10=strtoupper($_POST["variable10"]);
  $variable11=strtoupper($_POST["variable11"]);
  $variable12=$_POST["variable12"];
  $variable13=$_POST["peso"];
  $variable14=$_POST["litro"];
  
	$sel_maximo="SELECT max(pro_cod) as maximo FROM productos";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion=" INSERT INTO productos 	(pro_cod, 	pro_bar, 	pro_des, 	pro_cos, 	pro_ven, 	 
  pro_can, 	pro_imp, 	par_cod, 	fam_cod, 	uni_cod, mar_cod,	pro_pes, pro_lit ,fecha, 	hora, 	usuario, 	borrado,pro_bol 	) 
  VALUES 	('$variable1', 	'$variable2', 	'$variable3', 	'$variable4', 	'$variable5', 	
  '$variable6', 	'$variable7', 	'$variable8', 	'$variable9', 	'$variable10', '$variable11','$variable13','$variable14',	'$fecha', 
  '$hora', 	'$usuario', 	'0' ,'$variable12'	)";			
	$rs_operacion=mysql_query($query_operacion);
	
  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
	
}


if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=str_replace(".","",($_POST["variable4"]));
  $variable5=str_replace(".","",($_POST["variable5"]));
  $variable6=strtoupper($_POST["variable6"]);
  $variable7=strtoupper($_POST["variable7"]);
  $variable8=strtoupper($_POST["variable8"]);
  $variable9=strtoupper($_POST["variable9"]);
  $variable10=strtoupper($_POST["variable10"]);
  $variable11=strtoupper($_POST["variable11"]);
  $variable12=$_POST["variable12"];
  $variable13=$_POST["peso"];
  $variable14=$_POST["litro"];

  
	$query=" UPDATE productos 	SET 	pro_bar = '$variable2' , 	pro_des = '$variable3' , 	
  pro_cos = '$variable4' , 	pro_ven = '$variable5' , 	pro_can = '$variable6' , 	pro_imp = '$variable7' , 	
  par_cod = '$variable8' , 	fam_cod = '$variable9' , 	uni_cod = '$variable10' ,mar_cod='$variable11',pro_pes='$variable13',pro_lit='$variable14'	,fecha = '$fecha' , 	
  hora = '$hora' , 	usuario = '$usuario',pro_bol='$variable12' 	WHERE 	pro_cod = '$variable1' ";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");  
	}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE productos SET borrado='1',fecha='$fecha',hora='$hora' where pro_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
}
?>