<?php
@session_start();
include ("../conectar.php"); 
$_SESSION["s_username"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../fecha_hora.php"); 

$variable1=$_GET["nrofactura"];
$pago=str_replace(".","",($_GET["diferencia"]));
$fecha_pago=$_GET["fecha"];
$cheque=$_GET["cheque"];
$ban_cod=$_GET["ban_cod"];

$query="SELECT * FROM compra_cab_view WHERE fac_cod='$variable1'";
$rs_query=mysql_query($query);
$saldo=mysql_result($rs_query,0,"fac_sal");
$cliente=mysql_result($rs_query,0,"prv_cod");
$prv_des=mysql_result($rs_query,0,"prv_des");
$saldototal=$saldo-$pago;


$query_operacion="update compra_cab set fac_sal='$saldototal' where fac_cod='$variable1'";					
$rs_operacion=mysql_query($query_operacion);

$query_operacion1="insert into pagos (fac_cod,prv_cod,cob_mon,cob_sal,cob_che,ban_cod,fecha,hora,usuario,borrado) 
values('$variable1','$cliente','$pago','$saldototal','$cheque','$ban_cod','$fecha_pago','$hora','$usuario','0')";					
$rs_operacion1=mysql_query($query_operacion1);


$sel="select * from movimientos where borrado='0' and mov_cod=
(SELECT MAX(mov_cod) FROM movimientos WHERE borrado=0 AND ban_cod='$ban_cod')";
$rs=mysql_query($sel);
$mov_mon_dep=mysql_result($rs,0,"mov_mon_dep");
$mov_mon_ext=mysql_result($rs,0,"mov_mon_ext");
$mov_mon_sal=mysql_result($rs,0,"mov_mon_sal");

$deposito=0;
$extraccion=$pago;
$saldo=$mov_mon_sal-$pago;             


	$sel_maximo="SELECT max(mov_cod) as maximo FROM movimientos";
	$rs_maximo=mysql_query($sel_maximo);
	$variable_mov=mysql_result($rs_maximo,0,"maximo")+1;
  
	
	$query_operacion="INSERT INTO movimientos 	(mov_cod, 	mov_nro, 	mov_obs, mov_mon_dep,	mov_mon_ext,mov_mon_sal, 	
  mov_par, 	ban_cod, 	mov_fec, 	fecha, 	hora, 	usuario,borrado 	) 
  VALUES 	('$variable_mov', 	'$cheque', 	'Pago a proveedor: $prv_des','0',	'$pago','$saldo', 	
  'EXT.', 	'$ban_cod', 	'$fecha_pago', 	'$fecha', 	
  '$hora', 	'$usuario','0' 	)";     			
	$rs_operacion=mysql_query($query_operacion);
  
  
header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
?>
