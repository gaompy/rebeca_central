<?php
include ("../../conectar.php"); 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];

include ("../../fecha_hora.php"); 

$accion=$_POST["accion"];
if (!isset($accion)) { echo $accion=$_GET["accion"]; }




if ($accion=="modificar") {

  $variable1=$_POST["id"];
  $cantidad=$_POST["variable5"];
  $costo=$_POST["variable6"];
  $total=$cantidad*$costo;
	$fac_cod=$_POST["fac_cod"];
  	
	$query="update inventario_det set pro_can='$cantidad',pro_cos='$costo',
  pro_tot='$total' ,fecha='$fecha',hora='$hora',usuario='$usuario' where mde_cod='$variable1'";
	$rs_query=mysql_query($query);
  //echo "REGISTRO ACTUALIZADO!";

}
		
	
?>

 		<script language="javascript">
    	alert("Registro Guardado!");      
      var codcliente1="<?echo $fac_cod?>";   
      location.href="frame_lineas.php?codcliente1="+codcliente1;  
      parent.document.getElementById("formulario_lineas").submit();  	
   
    </script>