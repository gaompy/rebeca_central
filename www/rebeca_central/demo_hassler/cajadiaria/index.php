<?php
@session_start();
$usuario=$_SESSION["id_usuario"];
include ("../conectar.php");
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
include ("../permisos.php");



    $query1="SELECT * FROM aper_cie WHERE ape_par='0' and usuario='$usuario'";
    $rs_query1=mysql_query($query1);    
    $cuenta1 = mysql_num_rows($rs_query1);

    

   if ($cuenta1=='0') {

   ?>
        <script>
          alert ("Debe realizar Apertura de Caja!");
          location.href="../central.php";	
        </script>
    <?
} else {

$ape_cod=mysql_result($rs_query1,0,"ape_cod");
$aps_cod=mysql_result($rs_query1,0,"aps_cod");
 
$_SESSION["ape_cod"] = $ape_cod;
$_SESSION["aps_cod"] = $aps_cod; 

}

?>

<html>
	<head>
		<title>Base de datos <?echo $descripcion?> </title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">		
	</head>

	<script language="javascript">			

	
function inicio() {
			document.getElementById("form_busqueda").submit();
      document.getElementById("variable1").focus();
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
						<tr>
							<td width="16%">Apertura</td>
							<td width="68%"><input id="variable1" type="text" class="cajaPequena" NAME="variable1" maxlength="10"  value="<?echo $ape_cod?>" onChange="buscar()" readOnly="yes">  <img src="../img/ver.png" width="16" height="16" onClick="buscar()" title="Buscar Materia" onMouseOver="style.cursor=cursor"></td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%" align="right"></td>
						</tr>
						<tr>
							<td>Descripcion</td>
							<td><input id="variable2" name="variable2" type="text" class="cajaGrande" maxlength="245"  onChange="buscar()"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
						
						<td width="15%">Tipo de Mov.</td>
							<td width="43%"><select id="variable3" name="variable3" class="comboMedio" onChange="buscar()">
							<option value="">Todos</option>
              <option value="0">Ingresos</option>
              <option value="1">Egresos</option>
				
						</select>							</td>
				     
  									

					</table>
			  </div>
			 	<div id="botonBusqueda"><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
					 
					 <?php  
					if (@$ins=='0'){
					
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
							<td width="6%">COD.APE</td>
							<td width="20%">DESCRIPCION </td>
							<td width="20%">DEFINICION </td>
							
							<?php  
							if (@$mod=='-1'){
					
								?>
							<td width="5%">Modificar</td>
																<?php
								}
							?>
							
							<td width="5%">Ver</td>
							
							<?php  
							if (@$eli=='0'){
					
								?>
							<td width="6%">Eliminar</td>
									<?php
								}
							?>
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
					</iframe></div>
			</div>
		  </div>			
	</div>
	</body>
</html>

