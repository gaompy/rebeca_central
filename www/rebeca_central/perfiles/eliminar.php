<?php
include ("../conectar.php"); 

$variable1=$_GET["variable1"];
$cadena_busqueda=$_GET["cadena_busqueda"];

$query="SELECT * FROM paises WHERE pai_cod='$variable1'";
$rs_query=mysql_query($query);

?>

<html>
	<head>
		<title>Principal</title>
		
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">



		<script language="javascript">
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function aceptar(variable1) {
			location.href="guardar.php?variable1=" + variable1 + "&accion=baja" + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function cancelar() {
			location.href="index.php?cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">ELIMINAR paises </div>
				<div id="frmBusqueda">
		
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $variable1?></td>
					    </tr>
						<tr>
							<td width="15%">Descripcion</td>
						    <td width="85%" colspan="2"><?php echo $variable2=strtoupper(mysql_result($rs_query,0,"pai_des"))?></td>
					    </tr>
						<tr>
  
					  
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar(<?php echo $variable1?>)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">

			  </div>

			  </div>
			 </div>
		  </div>
		</div>
	</body>
</html>
