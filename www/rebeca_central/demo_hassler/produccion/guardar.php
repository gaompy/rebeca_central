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
	$variable1=$_POST["variable0"];
	$variable5=$_POST["variable5"];
	$variable6=$_POST["variable6"];

	$sel_maximo="SELECT max(prd_cod) as maximo FROM produccion";
	$rs_maximo=mysql_query($sel_maximo);
	$variable0=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO produccion (prd_cod,pro_cod,prd_can,prd_fec,fecha,hora,usuario,borrado)
					VALUES ('$variable0','$variable1','$variable5','$variable6','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);

/*aumenta stock productos*/  
$up="update productos set pro_can=pro_can+$variable5 where pro_cod='$variable1'";
$up=mysql_query($up);
  
/* descueenta stock recetas*/
$sel_lineas="select spr_cod from recetas where borrado='0' and pro_cod='$variable1'";
$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {	
	$spr_cod=mysql_result($rs_lineas,$i,"spr_cod");
      $sel_up="UPDATE productos 
      SET pro_can=pro_can-((SELECT rec_can FROM recetas WHERE spr_cod=productos.pro_cod)*$variable5)
      WHERE pro_cod='$spr_cod'";
      $rs_up=mysql_query($sel_up); 
}


  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
	
}



if ($accion=="baja") {
	$variable1=$_GET["variable1"];
  
  $sel="SELECT * FROM produccion where prd_cod='$variable1'";
	$rs=mysql_query($sel);
	$pro_cod=mysql_result($rs,0,"pro_cod");
  $pro_can=mysql_result($rs,0,"prd_can");
  

$up="update productos set pro_can=pro_can-$pro_can where pro_cod='$pro_cod'";
$up=mysql_query($up);

$sel_lineas="select spr_cod from recetas where borrado='0' and pro_cod='$pro_cod'";
$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {	
	$spr_cod=mysql_result($rs_lineas,$i,"spr_cod");
      $sel_up="UPDATE productos 
      SET pro_can=pro_can+((SELECT rec_can FROM recetas WHERE spr_cod=productos.pro_cod)*$pro_can)
      WHERE pro_cod='$spr_cod'";
      $rs_up=mysql_query($sel_up); 
}

$query="UPDATE produccion SET borrado='1',fecha='$fecha',hora='$hora' where prd_cod='$variable1'";
$rs_query=mysql_query($query);
  
header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}

		
	
?>

