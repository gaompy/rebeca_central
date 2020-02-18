<?php
@session_start();
include ("../conexion/conectar.php");
include ("../fecha_hora.php"); 

$accion=$_POST["accion"];
if (!isset($accion)) { echo $accion=$_GET["accion"]; }

if ($accion=="modificar") {
	   $variable1=$_POST["variable1"];
	   $variable2=strtoupper($_POST["variable2"]);	  	
     
     $variable4=md5($_POST["variable4"]);
     $variable4_1=$_POST["variable4"];
	   $query="UPDATE usuarios SET password='$variable4',password_nor='$variable4_1',fecha='$fecha $hora' 
        where id='$variable1'";
	   $rs_query=mysql_query($query);  
  
      $direccion="../menu/central.php";
      header("Location:$direccion");
	}	
?>