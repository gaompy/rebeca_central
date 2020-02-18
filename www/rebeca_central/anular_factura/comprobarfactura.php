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

function pon_prefijo(cod_cli,cli_des,fecha,cli_ruc,nro_factura,total,tipo_des) {
	parent.document.formulario.codcliente.value=cod_cli;
	parent.document.formulario.nombre.value=cli_des;
	parent.document.formulario.nif.value=cli_ruc;
	parent.document.formulario.fecha.value=fecha;

	parent.document.formulario.tipo_des.value=tipo_des;	
	parent.document.formulario.total.value=total;	

}

function limpiar() {
	parent.document.formulario.codcliente.value="";
	parent.document.formulario.nombre.value="";
	parent.document.formulario.nif.value="";
	parent.document.formulario.fecha.value="";
	parent.document.formulario.tipo_des.value="";
	parent.document.formulario.total.value="";
	parent.document.formulario.nro_fac.focus();

	
}

</script>
<? include ("../conectar.php"); ?>
<body>
<?
	$codfactura=$_GET["codfactura"];
	
	
	$consulta="SELECT * FROM factura_cab WHERE fac_cod='$codfactura' AND borrado='0'";
	$rs_tabla = mysql_query($consulta);
	
  if (mysql_num_rows($rs_tabla)>0) {
		
		$fac_cod=mysql_result($rs_tabla,0,"fac_cod");
		$cli_cod=mysql_result($rs_tabla,0,"cli_cod");
		$total=number_format(mysql_result($rs_tabla,0,"fac_tot"), 0, ",", ".");
		//$parametro=mysql_result($rs_tabla,0,"fac_ruc");
		
		$fecha=mysql_result($rs_tabla,0,"fecha");
		$usuario=mysql_result($rs_tabla,0,"usuario");		
		
		$consulta1="SELECT * from clientes_view WHERE cli_cod='$cli_cod'";
		$rs_tabla1 = mysql_query($consulta1);
		$cli_des=mysql_result($rs_tabla1,0,"cli_des");	
		$cli_ruc=mysql_result($rs_tabla1,0,"cli_ruc");
		$variable4=mysql_result($rs_tabla1,0,"tic_cod");
    $variable6=mysql_result($rs_tabla1,0,"tic_des");
				
		
		?>
		<script languaje="javascript">
		pon_prefijo("<? echo $cli_cod ?>","<? echo $cli_des ?>","<? echo $fecha ?>","<? echo $cli_ruc ?>","<? echo $fac_cod ?>","<? echo $total ?>","<? echo $variable6 ?>");
		</script>
		<? 
	} else { ?>
	<script>
	alert ("No existe ninguna Factura con ese codigo");
	limpiar();
	//parent.document.formulario.parametro.value=1;
	parent.document.formulario_lineas.codcliente.focus();
	</script>
	<? }
mysql_close($conexion);
?>
</div>
</body>
</html>
