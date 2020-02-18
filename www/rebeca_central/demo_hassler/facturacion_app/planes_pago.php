

<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
		<script language="javascript">
		

		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		function cancelar() {

			window.close();
		}

		function limpiar() {
			document.getElementById("formulario").reset();
			
		}

		function guardar_linea(){	
   	var planes=document.getElementById("planes").value;
		parent.opener.document.formulario.planes.value=planes;
    
    
		alert("Cantidad : "+planes+" Cuotas generadas!");
		window.close();
			
		}		
			function foco(){
		document.getElementById("planes").focus();
		}	
		</script>
	</head>
	<body onLoad="foco()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Planes de Pago </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>


    							<tr>	
							<td width="6%">Introdusca Cant. de Cuotas</td>
						    <td width="27%"><input NAME="planes" type="text" class="cajaMedia" id="planes" size="45" maxlength="45" value="1"></td>						 
    						<tr>
					     
					      </td>

					    </tr>
						<tr>
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar_linea()" border="1" onMouseOver="style.cursor=cursor">		
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					

			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>