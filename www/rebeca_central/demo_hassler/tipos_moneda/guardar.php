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
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);	
	$sel_maximo="SELECT max(tmo_cod) as maximo FROM tipo_moneda";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO tipo_moneda(tmo_cod,tmo_des,tmo_sim,tmo_par,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','$variable3','$variable4','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);
  
    if ($variable4==1){
      $update="update tipo_moneda set tmo_par=0 where tmo_cod <> '$variable1'";
      $rs_query=mysql_query($update);
    }
  
  
  
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
	
}


if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);	
	
  $query="UPDATE tipo_moneda SET tmo_des='$variable2',tmo_sim='$variable3',
  tmo_par='$variable4',fecha='$fecha',hora='$hora',usuario='$usuario' 
  where tmo_cod='$variable1'";
  
	$rs_query=mysql_query($query);
	
    if ($variable4==1){
      $update="update tipo_moneda set tmo_par=0 where tmo_cod <> '$variable1'";
      $rs_query=mysql_query($update);
    } 
  
   header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");  
	}



if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE tipo_moneda SET borrado='1',fecha='$fecha',hora='$hora' where tmo_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}

		
	
?>

