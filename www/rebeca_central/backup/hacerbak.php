<?php 
@@session_start();
include ("../conectar.php"); 
$hoy=date("d/m/Y");
$hora=date("H:i:s");
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
include ("../permisos.php");


?>
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
		
		function limpiar() {
			document.getElementById("formulario").reset();
		}
    

function guardar()
		
    	{
          
           if (confirm(" Desea guardar realizar backup? ")){ 
                          document.getElementById("formulario").submit();
          }           
          
     }
       
		function cerrarventana() {
			location.href="../central.php";
		}          
			
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">NUEVA COPIA DE SEGURIDAD</div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_copia.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="14%">Denominacion</td>
						    <td width="36%"><input NAME="Adenominacion" type="text" class="cajaGrande" id="Adenominacion" size="50" maxlength="50" value="db-backup" readonly="yes"></td>
				      
						</tr>
						<tr>
							<td width="14%">Fecha</td>
						    <td width="36%"><input NAME="fecha" type="text" class="cajaPequena" id="fecha" size="12" maxlength="12" value="<? echo $hoy?>" readonly="yes"></td>
				            <td width="50%"></td>
						</tr>
						<tr>
							<td width="14%">Hora</td>
						    <td width="36%"><input NAME="hora" type="text" class="cajaPequena" id="hora" size="12" maxlength="12" value="<? echo $hora?>" readonly="yes"></td>
				            <td width="50%"></td>
						</tr>							
					</table>
			  </div>
				<div id="botonBusqueda">
					<input type="hidden" name="id" id="id" value="">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
			  <img src="../img/cerrar_ventana.jpg" width="22" height="22" onClick="cerrarventana()" border="1" onMouseOver="style.cursor=cursor">				</div>
        
        </div>
			  </form>
			 </div>
		  </div>
		</div>
	</body>
</html>
