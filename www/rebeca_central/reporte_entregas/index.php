<?php
@session_start();
include ("../conectar.php");
include ("../fecha_hora.php");
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
include ("../permisos.php");
$fecha_inicio=substr($fecha, 0, -2)."01";

?>

<html>
	<head>
		<title>Base de datos <?echo $descripcion?> </title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">	
		<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>	
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>	    	
	</head>

	<script language="javascript">			

	
function inicio() {
			document.getElementById("form_busqueda").submit();
      document.getElementById("variable2").focus();
		}
		
		function nuevo() {
			location.href="nuevo.php";
		}
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}	

var miPopup
function imprimir() {
			miPopup = window.open("impresiones.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}

var miPopup
function excel() {
			miPopup = window.open("excel.php");
			miPopup.focus();
		}		
		
		function buscar() {
			var cadena;
			cadena=hacer_cadena_busqueda();
			document.getElementById("cadena_busqueda").value=cadena;
			if (document.getElementById("iniciopagina").value=="") {
				document.getElementById("iniciopagina").value=1;
			} else {
				document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			}
			document.getElementById("form_busqueda").submit();
		}
		
		function paginar() {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			document.getElementById("form_busqueda").submit();
		}
		
		function hacer_cadena_busqueda() {
			var variable1=document.getElementById("variable1").value;
			var variable2=document.getElementById("variable2").value;

	
			
			var cadena="";
			cadena="~"+variable1+"~"+variable2+"~";
			return cadena;
			}
			
		function limpiar() {
			document.getElementById("form_busqueda").reset();
		}
		
		var miPopup
		function abreVentana(){
			miPopup = window.open("ventana.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}
		
	function ejecutasql(){
			
			miPopup = window.open("tmp.php","miwin","width=700,height=380,scrollbars=yes");
			
		}
				
		function cerrarventana() {
			location.href="../central.php";
		}
		
	</script>
	
	
	
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
				<div id="tituloForm" class="header">Base de <?echo $descripcion?></div>
								
				<div id="frmBusqueda">
				<img src="../img/logo.png" alt="" width="172" height="48">
				
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
              
              <td width="15%">Entrega</td>
							<td width="43%"><select id="variable5" name="variable5" class="comboMedio" onChange="buscar()">
							
              <option value="0">Pendiente</option>
              <option value="1">Entregados</option>
								</select></td>
						<tr>
							<td width="16%"><p>Ticket</p></td>
							<td width="68%"><input id="variable1" type="text" class="cajaPequena" NAME="variable1" maxlength="45"  onChange="buscar()">  <img src="../img/ver.png" width="16" height="16" onClick="buscar()" title="Buscar Materia" onMouseOver="style.cursor=cursor"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%" align="right"></td>
						</tr>

            
				   <td height="103"><p>&nbsp;</p>
				     <p>Fecha Inicio</p>
				     <p>Fecha Fin</p>
				     <p>&nbsp;</p>
				     <p>&nbsp;</p>
				     <p>&nbsp;</p></td>
				<td><p>
				  <input id="variable2" type="text" class="cajaPequena"  NAME="variable2" value='<?echo $fecha_inicio?>' maxlength="10" readonly>
				  <img src="../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
				  <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "variable2",
					ifFormat   : "%Y-%m-%d",
					button     : "Image2"
					  }
					);
		            </script></p> 				
				  <input id="variable3" type="text" class="cajaPequena"  NAME="variable3" value='<?echo $fecha?>' maxlength="10" readonly>
				  <img src="../img/calendario.png" name="Image3" id="Image3" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
				  <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "variable3",
					ifFormat   : "%Y-%m-%d",
					button     : "Image3"
					  }
					);
		            </script>



				  <table width="1" border="0">
            <tr>
				      <td>&nbsp;</td>
			        </tr>
			      </table>
				  <p>&nbsp; </p></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>	
				   									

					</table>
			  </div>
			 	<div id="botonBusqueda"><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
					 
					 <?php  
					if (@$ins=='-1'){
					
					?>
					 
					 <img src="../img/botonagregar.jpg" width="72" height="22" border="1" onClick="nuevo()" onMouseOver="style.cursor=cursor">
					<?php
					}
					?>
					
					<?php  
					if (@$imp=='0'){
					
					?>
					<img src="../img/botonimprimir.jpg" width="79" height="22" border="1" onClick="imprimir()" onMouseOver="style.cursor=cursor">
					<img src="../img/boton_excel.png" width="22" height="22" border="1" onClick="excel()" onMouseOver="style.cursor=cursor">				

					<?php
					}
					?>
					
					
					  		
			 <img src="../img/cerrar_ventana.jpg" width="22" height="22" border="1" onClick="cerrarventana()" onMouseOver="style.cursor=cursor">				</div>
			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" align="left">N encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">
					RELACION DE DATOS </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="6%">ITEM</td>
							<td width="6%">CODIGO</td>
							<td width="20%">DESCRIPCION </td>
					
							
							<td width="6%">Ver/Entregar </td>
							
						</tr>
				</table>
				</div>
				<input type="hidden" id="iniciopagina" name="iniciopagina">
				<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">
			</form>
				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_rejilla" name="frame_rejilla" frameborder="0">
						<ilayer width="100%" height="250" id="frame_rejilla" name="frame_rejilla"></ilayer>
					</iframe>
					<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
					<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
					</iframe>
				</div>
			</div>
		  </div>			
	</div>
	</body>
</html>
