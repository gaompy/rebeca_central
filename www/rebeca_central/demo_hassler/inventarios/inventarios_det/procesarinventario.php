<?php
@session_start();
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../../fecha_hora.php"); 
include ("../../conectar.php");

      $variable1=$_GET["variable1"];
      $sqlinv="update inventario_cab set inv_par='1' where inv_cod='$variable1'";
      $rsinv=mysql_query($sqlinv);
      

	$consulta="select * from inventario_det where borrado='0'
  and inv_cod='$variable1'";
	$rs_tabla = mysql_query($consulta);

for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
			$pro_cod=mysql_result($rs_tabla,$i,"pro_cod");					  
  		$pro_can=mysql_result($rs_tabla,$i,"pro_can");
      $pro_ven=mysql_result($rs_tabla,$i,"pro_ven");
      $pro_cos=mysql_result($rs_tabla,$i,"pro_cos");
        
      $sqlinv="update productos set pro_can=(pro_can+$cantidad),pro_cos='$pro_cos',pro_ven='$pro_ven' 
      where pro_cod='$pro_cod'";
      $rsinv=mysql_query($sqlinv);      	
		}            
header("Location:../index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");      
?>