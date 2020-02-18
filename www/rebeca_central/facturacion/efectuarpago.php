<?php 
@session_start();
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
$mesa=$_GET["mesa"]; //mesa
$celular=$_GET["celular"]; //celular

if ($variable2=='2'){
$saldo=$variable6;
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

$consulta_uti="SELECT sum(pro_uti) as suma FROM factura_det WHERE (fac_cod='$variable7') and borrado='0'";
$rs_tabla_uti = mysql_query($consulta_uti);
$total_uti=mysql_result($rs_tabla_uti,0,"suma");



 $query="UPDATE factura_cab 	SET 	fac_num = '0' , 	cli_cod = '$variable8' , 	mpg_cod = '$variable1' , 	
for_cod = '$variable2' , 	tmo_cod = '$variable3' , 	tie_cod = '$variable4' ,  fac_imp = '$variable5' , 	
fac_tot = '$variable6' , 	fac_est = '1' , 
cot_cod='$cot_cod',
cot_mon='$cot_mon',
fac_sal='$saldo',
fac_uti='$total_uti',	
fecha = '$fecha' , 	hora = '$hora' , 	usuario = '$usuario' 	
WHERE 	fac_cod = '$variable7'"; 
$rs=mysql_query($query);

$query="update mesas set mes_est='0',mes_fac='0'   	
WHERE 	mes_cod = '$mesa'"; 
$rs=mysql_query($query);

$query_promo="insert into promo_det (pmd_cel,prm_cod,fac_cod,cli_cod,fecha,hora,usuario) values('$celular','0','$variable7','$variable8','$fecha','$hora','$usuario')"; 
$rs_promo=mysql_query($query_promo);


header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");
?> 