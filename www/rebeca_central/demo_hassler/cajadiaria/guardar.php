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
	$variable1=$_POST["variable1"];
  $variable2=strtoupper($_POST["variable2"]);
  $variable3=str_replace(".","",($_POST["variable3"]));
  $variable4=$_POST["variable4"];
  
  if ($variable4==0) {
   $variable3=$variable3;
   $variable3_0=0;   
  }  else {
   $variable3_0=$variable3;
   $variable3=0;
  } 
	$sel_maximo="SELECT max(caj_cod) as maximo FROM caja_diaria";
	$rs_maximo=mysql_query($sel_maximo);
	$variable0=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO caja_diaria(caj_cod,ape_cod,caj_des,caj_ing,caj_sal,caj_par,fecha,hora,usuario,borrado)
					VALUES ('$variable0','$variable1','$variable2','$variable3','$variable3_0','$variable4','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);
	header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 	
}
/*

if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);	
  $variable3=$_POST["variable3"];
	$query="UPDATE caja_diaria SET dep_des='$variable2',suc_cod='$variable3',fecha='$fecha',hora='$hora',usuario='$usuario' where dep_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");  
	}
          */


if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE caja_diaria SET borrado='1',fecha='$fecha',hora='$hora' where caj_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}

		
	
?>

