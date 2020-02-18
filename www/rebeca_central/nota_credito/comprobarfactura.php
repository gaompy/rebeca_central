<?php

@@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(cod_cli,cli_des,fecha,prv_,nro_factura,total,tip_cod,tipo_des,parametro) {
	parent.document.formulario.variable1.value=cod_cli;
	parent.document.formulario.variable2.value=cli_des;
	parent.document.formulario.variable3.value=prv_;
	parent.document.formulario.variable4.value=fecha;	
	parent.document.formulario_lineas.fac_cod.value=nro_factura;	
  parent.document.formulario_lineas.cli_cod.value=cod_cli;
	parent.document.formulario_lineas.variable6.focus();
  parent.document.formulario_lineas.submit();  
}



</script>
<? include ("../conectar.php"); ?>
<body>
<?
	$codfactura=$_GET["codfactura"];

	$consulta="SELECT * FROM compra_cab WHERE fac_cod='$codfactura'";
	$rs_tabla = mysql_query($consulta);
	if (mysql_num_rows($rs_tabla)>0) {
		
		$fac_cod=mysql_result($rs_tabla,0,"fac_cod");
		$cli_cod=mysql_result($rs_tabla,0,"cli_cod");
		$total=number_format(mysql_result($rs_tabla,0,"fac_tot"), 0, ",", ".");
		$parametro=mysql_result($rs_tabla,0,"fac_est");
		
		$fecha=mysql_result($rs_tabla,0,"fecha");
		$usuario=mysql_result($rs_tabla,0,"usuario");		
		
		$consulta1="SELECT * from proveedores WHERE cli_cod='$cli_cod'";
		$rs_tabla1 = mysql_query($consulta1);
		$cli_des=mysql_result($rs_tabla1,0,"cli_des");	
		$prv_=mysql_result($rs_tabla1,0,"prv_");
		$variable4=mysql_result($rs_tabla1,0,"tic_cod");
    $variable6=mysql_result($rs_tabla1,0,"tic_des");
				
			
		
		
		?>
		<script languaje="javascript">
		pon_prefijo("<? echo $cli_cod ?>","<? echo $cli_des ?>","<? echo $fecha ?>","<? echo $prv_ ?>","<? echo $fac_cod ?>","<? echo $total ?>","<? echo $variable4 ?>","<? echo $variable6 ?>");
		</script>
		<? 
	} else { ?>
	<script>
//	alert ("Nro de Factura disponible");
	
  </script>
	<? }
?>
</div>
</body>
</html>
