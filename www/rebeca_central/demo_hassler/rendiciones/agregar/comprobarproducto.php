
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2) {
	

  parent.document.formulario_lineas.subpro.value=variable1;
	parent.document.formulario_lineas.descripcion.value=variable2;	
	parent.document.formulario_lineas.cantidad.value="";	
  parent.document.formulario_lineas.cantidad.focus();
  //parent.document.formulario_lineas.submit();	
 
}
			


function limpiar() {
  
  parent.document.formulario_lineas.descripcion.value="";
  parent.document.formulario_lineas.subpro.value="";
	parent.document.formulario_lineas.referencia.value="";
	parent.document.formulario_lineas.cantidad.value="";
  parent.document.formulario_lineas.referencia.focus();
  parent.document.formulario_lineas.submit();	
}

</script>
<? include ("../../conectar.php"); ?>
<body>
<?	
$variable1=$_GET["codigopro"];

	$consulta="SELECT * FROM productos WHERE pro_bar='$variable1' AND borrado='0'";
	$rs_tabla = mysql_query($consulta);
	

$i=0;
	
	if (mysql_num_rows($rs_tabla)>0) {
		
      $codigopro=mysql_result($rs_tabla,$i,"pro_cod");
			$variable3=mysql_result($rs_tabla,$i,"pro_des");
    
		
		?>
		<script languaje="javascript">
		pon_prefijo("<?php echo $codigopro?>","<?php echo $variable3?>");
		
		</script>
		<? 
	} else { ?>
	<script languaje="javascript">
	alert ("No existe ningun Producto con ese codigo");	
	parent.document.formulario_lineas.submit();	
	</script>
	<? }
?>
</div>
</body>
</html>
