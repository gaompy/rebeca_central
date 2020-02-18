<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"]; 
include ("../fecha_hora.php");
include ("../conectar.php");  

$accion=$_POST["accion"];
if (!isset($accion)) { echo $accion=$_GET["accion"]; }

if ($accion=="alta") {
	 $variable2=$_POST["variable2"];
	 $variable3=md5($_POST["variable3"]);
   $variable3_1=$_POST["variable3"];
	 $variable4=$_POST["variable4"];
   $variable5=$_POST["variable5"];


	$sel_maximo="SELECT max(id) as maximo FROM usuarios";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO usuarios (id,usuario,password,niv_cod,suc_cod,fecha,hora,usu,borrado,password_nor)
					VALUES ('$variable1','$variable2','$variable3','$variable4','$variable5','$fecha','$hora','$usuario','0','$variable3_1')";					
	$rs_operacion=mysql_query($query_operacion);
 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

	
}

if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable3=$_POST["variable3"];
	$variable4=$_POST["variable4"];



		
	$query="update usuarios set niv_cod='$variable3',suc_cod='$variable4',fecha='$fecha',hora='$hora',usu='$usuario' where id='$variable1'";
	$rs_query=mysql_query($query);
	
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 


}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$variable2=md5("12345");
	$query="UPDATE usuarios SET password='$variable2',fecha='$fecha',hora='$hora' where id='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}
				
	
?>

