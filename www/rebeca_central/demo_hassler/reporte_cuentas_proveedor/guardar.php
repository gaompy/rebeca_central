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
  $variable3=$_POST["variable3"]; // proveedor;  
  
	$ban_cod=$_POST["ban_cod"];
  $total=str_replace(".","",($_POST["variable8"]));
  
  $query="UPDATE compra_cab set fac_est='0' where fac_cod='$variable1'";
  $rs_query=mysql_query($query);
   
   if ($ban_cod > '0'){
  
    $sel="select * from movimientos where borrado='0' and mov_cod=
    (SELECT MAX(mov_cod) FROM movimientos WHERE borrado=0 AND ban_cod='$ban_cod')";
    $rs=mysql_query($sel);
    $mov_mon_dep=mysql_result($rs,0,"mov_mon_dep");
    $mov_mon_ext=mysql_result($rs,0,"mov_mon_ext");
    $mov_mon_sal=mysql_result($rs,0,"mov_mon_sal");
    $pago=0;
    $deposito=$total;
    $extraccion=0;
    $saldo=$mov_mon_sal+$total;  

    $sel_maximo="SELECT max(mov_cod) as maximo FROM movimientos";
	  $rs_maximo=mysql_query($sel_maximo);
	  $variable_mov=mysql_result($rs_maximo,0,"maximo")+1;
    

	$sel_maximo="SELECT max(mov_cod) as maximo FROM movimientos";
	$rs_maximo=mysql_query($sel_maximo);
	$variable_mov=mysql_result($rs_maximo,0,"maximo")+1;
  
	
	$query_operacion="INSERT INTO movimientos 	(mov_cod, 	mov_nro, 	mov_obs, 
  mov_mon_dep,	mov_mon_ext,mov_mon_sal,mov_par, 	ban_cod, 	mov_fec, fac_cod,fecha,hora,usuario,borrado 	) 
  VALUES 	('$variable_mov', 	'0', 	'Mov. Modif. Prov.: $variable3','$deposito',	'$pago','$saldo', 	
  'DEP.', 	'$ban_cod', 	'$fecha','$variable1','$fecha', 	
  '$hora', 	'$usuario','0' 	)";     			
	$rs_operacion=mysql_query($query_operacion);
  }
    
	header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");
   
	}



if ($accion=="baja") {

	$variable1=$_POST["id"];
  $variable3=$_POST["variable3"]; // proveedor;  
  
	$ban_cod=$_POST["ban_cod"];
  $total=str_replace(".","",($_POST["variable8"]));
  
  $query="UPDATE compra_cab set borrado='1' where fac_cod='$variable1'";
  $rs_query=mysql_query($query);
   
   if ($ban_cod > '0'){
  
    $sel="select * from movimientos where borrado='0' and mov_cod=
    (SELECT MAX(mov_cod) FROM movimientos WHERE borrado=0 AND ban_cod='$ban_cod')";
    $rs=mysql_query($sel);
    $mov_mon_dep=mysql_result($rs,0,"mov_mon_dep");
    $mov_mon_ext=mysql_result($rs,0,"mov_mon_ext");
    $mov_mon_sal=mysql_result($rs,0,"mov_mon_sal");
    $pago=0;
    $deposito=$total;
    $extraccion=0;
    $saldo=$mov_mon_sal+$total;  

    $sel_maximo="SELECT max(mov_cod) as maximo FROM movimientos";
	  $rs_maximo=mysql_query($sel_maximo);
	  $variable_mov=mysql_result($rs_maximo,0,"maximo")+1;
    

	$sel_maximo="SELECT max(mov_cod) as maximo FROM movimientos";
	$rs_maximo=mysql_query($sel_maximo);
	$variable_mov=mysql_result($rs_maximo,0,"maximo")+1;
  
	
	$query_operacion="INSERT INTO movimientos 	(mov_cod, 	mov_nro, 	mov_obs, 
  mov_mon_dep,	mov_mon_ext,mov_mon_sal,mov_par, 	ban_cod, 	mov_fec, fac_cod,fecha,hora,usuario,borrado 	) 
  VALUES 	('$variable_mov', 	'0', 	'Mov. Elim. Prov.: $variable3','$deposito',	'$pago','$saldo', 	
  'DEP.', 	'$ban_cod', 	'$fecha','$variable1','$fecha', 	
  '$hora', 	'$usuario','0' 	)";     			
	$rs_operacion=mysql_query($query_operacion);
  }
    
	header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");


}

		
	
?>

