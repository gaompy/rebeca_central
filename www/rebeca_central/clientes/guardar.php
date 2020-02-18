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
  $variable5=strtoupper($_POST["variable5"]);
  $variable6=strtoupper($_POST["variable6"]);
  $variable7=strtoupper($_POST["variable7"]);
  $variable8=strtoupper($_POST["variable8"]);
  $variable9=strtoupper($_POST["variable9"]);
  
  $par=strtoupper($_POST["par"]);
  

	$sel_maximo="SELECT max(cli_cod) as maximo FROM clientes";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion=" INSERT INTO clientes 	(cli_cod, 	cli_des, 	cli_ruc, 	cli_dir, 	cli_tel, 	cli_mai, 	
  med_cod, 	tic_cod, cli_par	,fecha, 	hora, 	usuario, 	borrado 	) 	
  VALUES 	('$variable1', 	'$variable2', 	'$variable3', 	'$variable4', 	'$variable5', 	
  '$variable6', 	'$variable7', 	'$variable8', '$variable9'	,'$fecha', 	'$hora', 	'$usuario', 	'0' 	)";				
	$rs_operacion=mysql_query($query_operacion);
  
  
  
  $sel_insert="INSERT INTO clientes_det(cli_cod, cld_ced, cld_nom, cld_tel,cld_ema, 
            fecha, hora, usuario)VALUES('$variable1', '$variable3', '$variable2', 
            '$variable5','$variable6', '$fecha', '$hora','$usuario')";
						$rs_insert=mysql_query($sel_insert);
	
  if ($variable9==1){
    $update="update clientes set cli_par=0 where cli_cod <> '$variable1'";
    $rs_query=mysql_query($update);
  }
  
  
  if ($par==0){
    header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");
   //header("Location: agregar/index.php?variable1=$variable1&variable2=$variable2&variable3=$variable3");
     
	}else {
    header("Location: ../facturacion/ver_cliente.php?fac_cod=$par"); 
	}
}


if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=strtoupper($_POST["variable4"]);
  $variable5=strtoupper($_POST["variable5"]);
  $variable6=strtoupper($_POST["variable6"]);
  $variable7=strtoupper($_POST["variable7"]);
  $variable8=strtoupper($_POST["variable8"]);
  $variable9=strtoupper($_POST["variable9"]);
  
	$query="UPDATE clientes 	SET 	cli_des = '$variable2' , 	
  cli_ruc = '$variable3' , 	cli_dir = '$variable4' , 	cli_tel = '$variable5' , 	
  cli_mai = '$variable6' , 	med_cod = '$variable7' , 	tic_cod = '$variable8' ,
  cli_par='$variable9',  fecha = '$fecha' , 	hora = '$hora' , 	usuario = '$usuario' 	
  WHERE 	cli_cod = '$variable1' ";
	$rs_query=mysql_query($query);
  
  if ($variable9==1){
    $update="update clientes set cli_par=0 where cli_cod <> '$variable1'";
    $rs_query=mysql_query($update);
  }
	header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");
 //header("Location: agregar/index.php?variable1=$variable1&variable2=$variable2&variable3=$variable3");  
	}



if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE clientes SET borrado='1',fecha='$fecha',hora='$hora' where cli_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}

		
	
?>

