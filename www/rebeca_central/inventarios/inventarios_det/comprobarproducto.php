<?php


?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,pro_cod) {
	parent.document.formulario_lineas.referencia.value=variable1;
	parent.document.formulario_lineas.descripcion.value=variable2;	
  parent.document.formulario_lineas.precio.value=variable3;
  parent.document.formulario_lineas.pro_cod.value=pro_cod;
	parent.document.formulario_lineas.cantidad.value="";
	parent.document.formulario_lineas.cantidad.focus();		
	//parent.document.getElementById("formulario_lineas").submit();
}
			


function limpiar() {

  parent.document.formulario_lineas.descripcion.value="";
	parent.document.formulario_lineas.precio.value="";
	parent.document.formulario_lineas.referencia.value="";
	parent.document.formulario_lineas.cantidad.value="";
}

</script>
<? include ("../../conectar.php"); ?>
<body>
<?	
$variable1=$_GET["codigopro"];	
$cantidad=strlen($variable1);


	
$consulta="SELECT * FROM productos WHERE pro_bar='$variable1' AND borrado='0'";
$rs_tabla = mysql_query($consulta);
$i=0;
	
	if (mysql_num_rows($rs_tabla)>0) {		
      $pro_cod=mysql_result($rs_tabla,$i,"pro_cod");
			$variable3=mysql_result($rs_tabla,$i,"pro_des");
			$estandar=number_format(mysql_result($rs_tabla,$i,"pro_cos"), 0, ",", ".");
      $variablex=  $estandar;
      
		
		?>
		<script languaje="javascript">
		pon_prefijo("<?php echo $variable1?>","<?php echo $variable3?>","<?php echo $variablex?>","<?php echo $pro_cod?>");
		
		</script>
		<? 
	} else { ?>
	<script>
	alert ("No existe ningun Producto con ese codigo");	
	limpiar();
	</script>
	<? }
?>
</div>
</body>
</html>
