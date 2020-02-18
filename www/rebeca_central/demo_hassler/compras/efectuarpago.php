<?php 
@@session_start();
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;

include ("../conectar.php");
include ("../fecha_hora.php");  

$variable1=$_GET["variable1"]; //medios pag
$variable2=$_GET["variable2"]; // forma
$variable3=$_GET["variable3"]; // tipo moneda
$variable4=$_GET["variable4"]; //tipo envio
$variable5=str_replace(".","",($_GET["variable5"]));
$variable6=$_GET["variable6"]; //costo
$variable7=$_GET["variable7"]; //fac_cod
$variable8=$_GET["variable8"]; //cliente
$ban_cod=$_GET["ban_cod"]; //banco
$obs_des=$_GET["obs_des"]; //cliente
$cheque=$_GET["cheque"]; //nrocheque

$mesa=$_GET["mesa"]; //cliente

if ($variable2=='2'){
$saldo=$variable6-$variable5;
}else{
$saldo='0';
}

if ($variable3 <> 1){
$sql1 = "SELECT * FROM cotizaciones 
WHERE tmo_cod='$variable3' AND borrado='0' 
AND cot_cod=(SELECT MAX(cot_cod) 
FROM cotizaciones WHERE tmo_cod='$variable3' 
AND borrado='0')"; 
$query1=mysql_query($sql1);
$cot_cod=mysql_result($query1,0,"cot_cod");
$cot_ven=mysql_result($query1,0,"cot_ven");
$cot_mon=number_format(($variable6/$cot_ven),2);
}else{
  $cot_cod=1;
  $cot_mon=$variable6;
}


$query="UPDATE compra_cab 	SET 		prv_cod = '$variable8' , 	mpg_cod = '$variable1' , 	
for_cod = '$variable2' , 	tmo_cod = '$variable3' , 	tie_cod = '$variable4' ,  fac_imp = '$variable5' , 	
fac_tot = '$variable6' , 	fac_est = '1' , 
cot_cod='$cot_cod',
cot_mon='$cot_mon',
fac_sal='$saldo',	
hora = '$hora' , 	usuario = '$usuario',fac_des='$obs_des'   	
WHERE 	fac_cod = '$variable7'"; $rs=mysql_query($query);
$query="update mesas set mes_est='0',mes_fac='0'   	
WHERE 	mes_cod = '$mesa'"; 
$rs=mysql_query($query);

//movimientos

$query="SELECT * FROM compra_cab_view WHERE fac_cod='$variable7'";
$rs_query=mysql_query($query);
$cliente=mysql_result($rs_query,0,"prv_cod");
$prv_des=mysql_result($rs_query,0,"prv_des");
$fecha_pago=mysql_result($rs_query,0,"fecha");

$sel="select * from movimientos where borrado='0' and mov_cod=
(SELECT MAX(mov_cod) FROM movimientos WHERE borrado=0 AND ban_cod='$ban_cod')";
$rs=mysql_query($sel);
$mov_mon_dep=mysql_result($rs,0,"mov_mon_dep");
$mov_mon_ext=mysql_result($rs,0,"mov_mon_ext");
$mov_mon_sal=mysql_result($rs,0,"mov_mon_sal");
$pago=$variable6;
$deposito=0;
$extraccion=$pago;
$saldo=$mov_mon_sal-$pago;             


	$sel_maximo="SELECT max(mov_cod) as maximo FROM movimientos";
	$rs_maximo=mysql_query($sel_maximo);
	$variable_mov=mysql_result($rs_maximo,0,"maximo")+1;
  
	
	$query_operacion="INSERT INTO movimientos 	(mov_cod, 	mov_nro, 	mov_obs, mov_mon_dep,	mov_mon_ext,mov_mon_sal, 	
  mov_par, 	ban_cod, 	mov_fec, fac_cod	,fecha, 	hora, 	usuario,borrado 	) 
  VALUES 	('$variable_mov', 	'$cheque', 	'Pago a proveedor: $prv_des','0',	'$pago','$saldo', 	
  'EXT.', 	'$ban_cod', 	'$fecha_pago','$variable7','$fecha', 	
  '$hora', 	'$usuario','0' 	)";     			
	$rs_operacion=mysql_query($query_operacion);

header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");

?>
   