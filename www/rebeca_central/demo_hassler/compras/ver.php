<?php
include ("../conectar.php"); 

$variable1=$_GET["numlinea"];


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
		

		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Ver Imagen</div>
				<div id="frmBusqueda">
				
	
							<td colspan="2"><?php echo "<img src='../productos/fotos/$variable1.jpg' border='0' width='500' height='300'>"; ?></td>
						</tr>
																	
						
  
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="window.close()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
		  </div>
		  </div>
		</div>
	</body>
</html>
