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

function pon_prefijo(cod_cli,prv_des,fecha,prv_ruc,nro_factura,total,tipo_des,saldo) {
	parent.document.formulario.codcliente.value=cod_cli;
	parent.document.formulario.nombre.value=prv_des;
	parent.document.formulario.nif.value=prv_ruc;
	parent.document.formulario.fecha.value=fecha;
	parent.document.formulario.saldo.value=saldo;
	parent.document.formulario.tipo_des.value=tipo_des;	
	parent.document.formulario.total.value=total;	
	parent.document.formulario.diferencia.focus();

}

function limpiar() {
	parent.document.formulario.codcliente.value="";
	parent.document.formulario.nombre.value="";
	parent.document.formulario.nif.value="";
	parent.document.formulario.fecha.value="";
	parent.document.formulario.tipo_des.value="";
	parent.document.formulario.total.value="";
	parent.document.formulario.saldo.value="";
	parent.document.formulario.nro_fac.focus();

	
}

</script>
<? include ("../conectar.php"); ?>
<body>
<?
	$codfactura=$_GET["codfactura"];
	
	
	$consulta="SELECT * FROM compra_cab WHERE fac_cod='$codfactura' AND borrado=0 and for_cod='2'";
	$rs_tabla = mysql_query($consulta);
	if (mysql_num_rows($rs_tabla)>0) {
		
		$fac_cod=mysql_result($rs_tabla,0,"fac_cod");
		$prv_cod=mysql_result($rs_tabla,0,"prv_cod");
		$total=number_format(mysql_result($rs_tabla,0,"fac_tot"), 0, ",", ".");
		$parametro=mysql_result($rs_tabla,0,"fac_est");
		$saldo=number_format(mysql_result($rs_tabla,0,"fac_sal"), 0, ",", ".");;
		$fecha=mysql_result($rs_tabla,0,"fecha");
		$usuario=mysql_result($rs_tabla,0,"usuario");		
		
		$consulta1="SELECT * from proveedores WHERE prv_cod='$prv_cod'";
		$rs_tabla1 = mysql_query($consulta1);
		$prv_des=mysql_result($rs_tabla1,0,"prv_des");	
		$prv_ruc=mysql_result($rs_tabla1,0,"prv_ruc");
		$variable6=mysql_result($rs_tabla1,0,"prv_tel");
		
		
		?>
		<script languaje="javascript">
		pon_prefijo("<? echo $prv_cod ?>","<? echo $prv_des ?>","<? echo $fecha ?>","<? echo $prv_ruc ?>","<? echo $fac_cod ?>","<? echo $total ?>","<? echo $variable6 ?>","<? echo $saldo ?>");
		</script>
		<? 
	} else { ?>
	<script>
	alert ("No existe ningun Factura con ese codigo");
	limpiar();
	parent.document.formulario.parametro.value=1;
	parent.document.formulario_lineas.codcliente.focus();
	</script>
	<? }
?>
</div>
</body>
</html>