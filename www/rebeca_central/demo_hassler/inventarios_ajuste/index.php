<?php
@@session_start();
include ("../conectar.php");
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
include ("../permisos.php");


$codfamilia="";
$codfacturatmp="";
$preciototal="";
$aps_cod=0;
$apertura=0;

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
		
		function inicio(){
		document.getElementById("codcliente").focus();
		}
		
		var miPopup
		function abreVentana(){
			

			
			miPopup = window.open("ver.php","miwin","width=700,height=600,scrollbars=yes");
			miPopup.focus();

			
		}
		
		function ventanaArticulos(){
			var codigo=document.getElementById("codcliente").value;
			var tip_cli=document.getElementById("tipo_cliente").value;
			var parametro=document.getElementById("parametro").value;
			if (parametro==0){			
			if (codigo=="") {
				alert ("Debe introducir el codigo del Inventario");
			} else {
				miPopup = window.open("ver_pro.php","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			}
		}else{
			
			alert("No puede modificar Inventario!");
			}
			
			
		}
	
		function limpiar(){
		
		document.getElementById("referencia").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="";
		document.getElementById("referencia").focus();
		
		}
		function cancelar() {
			location.href="../central.php";
		}
		
		function limpiarcaja() {
			document.getElementById("nombre").value="";
			document.getElementById("nif").value="";
		}
		
		function mostrar_datos() {
		document.getElementById("formulario_lineas").submit();
		}		
		
		function validar() 
			{
				var mensaje="";
				var entero=0;
				var enteroo=0;
		
				if (document.getElementById("referencia").value=="") mensaje="  - Referencia\n";
				if (document.getElementById("descripcion").value=="") mensaje+="  - Descripcion\n";
				if (document.getElementById("precio").value=="") { 
							mensaje+="  - Falta el Costo\n"; 
						} else {
							if (isNaN(document.getElementById("precio").value)==true) {
								mensaje+="  - El precio debe ser numerico\n";
							}
						}
				if (document.getElementById("cantidad").value=="") 
						{ 
						mensaje+="  - Falta la cantidad\n";
						} else {
						/*	enteroo=parseInt(document.getElementById("cantidad").value);
							if (isNaN(enteroo)==true) {
								mensaje+="  - La cantidad debe ser numerica\n";
							} else {  */
									document.getElementById("cantidad").value;
								//}    
						}

				
				if (mensaje!="") {
					alert("Atencion, se han detectado las siguientes incorrecciones:\n\n"+mensaje);
				} else {

					document.getElementById("formulario_lineas").submit();			
					document.getElementById("referencia").value="";
					document.getElementById("descripcion").value="";
					document.getElementById("precio").value="";
					document.getElementById("unidad").value="";
					document.getElementById("cantidad").value="";
					document.getElementById("referencia").focus();
	
				}
			}
		function validarcliente(){
			var codigo=document.getElementById("codcliente").value;

			var parametro=document.getElementById("parametro").value;
			if (parametro==0){
			miPopup = window.open("comprobarcliente.php?codcliente="+codigo,"frame_lineas","width=700,height=80,scrollbars=yes");
			
						
			}else{
			
			
			alert("No puede modificar Factura!");
			}	
		}	
		

		
		function validarfactura(){
			var codigo=document.getElementById("nro_fac").value;
			miPopup = window.open("comprobarfactura.php?codfactura="+codigo,"frame_lineas","width=700,height=80,scrollbars=yes");
			
		}		

		function validarproducto(){
	
			var codigo=document.getElementById("referencia").value;
				var parametro=document.getElementById("parametro").value;
			if (parametro==0){

			miPopup = window.open("comprobarproducto.php?codigopro="+codigo,"frame_lineas","miwin","width=700,height=80,scrollbars=yes");
			}else{
			
			
			alert("No puede modificar Factura!");
			}	
		}	

		var miPopup
		function abrecliente(){
						
			var parametro=document.getElementById("parametro").value;
			if (parametro==0){
			
			miPopup = window.open("nuevo_cliente.php","miwin","width=700,height=429,scrollbars=yes");
			miPopup.focus();
			}else{
			
			alert("No puede modificar Inventario!");
			}			
			
		}
		
		
		function validar_cabecera(){
			
				var parametro=document.getElementById("parametro").value;			
				var mensaje="";
				if (document.getElementById("nombre").value=="") mensaje+="  - Cliente\n";
				if (document.getElementById("fecha").value=="") mensaje+="  - Fecha\n";
				if (mensaje!="") {
					alert("Atencion, se han detectado las siguientes incorrecciones:\n\n"+mensaje);
				} else {					
							if (parametro==0){
							document.getElementById("formulario").submit();							
							}else{
			
							alert("No puede modificar Factura!");
						}						
				}	
			}				
			
var miPopup
function imprimir() {
		var codigo=document.getElementById("nro_fac").value;
		if (codigo > 0){
			miPopup = window.open("impresiones.php?codigo="+codigo,"miwin","width=700,height=380,scrollbars=yes");		
			miPopup.focus();
			}else{
				alert("Ingrese codigo Inventario!");
			}
		}		

  function procesar() {
	var codigo=document.getElementById("nro_fac").value;
	var parametro=document.getElementById("parametro").value;
		
		if (codigo > 0){
	     
			if (parametro==2){
				
				alert("Inventario Procesado!");
				
				}else	{			
				if (confirm(" Esta seguro de ajustar Stock? ")) {	
							
              
                var miPopup; 
                miPopup = window.open("procesarinventario.php?codigo="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			          miPopup.focus();
            	}	
							
					}	

			}else{
				alert("Introdusca codigo Inventario!");
			}
		
					
		}			
		
		</script>


	</head>
<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header"><?echo $descripcion?> </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<td width="15%">Cod. Inv. </td>
							
					      <td colspan="3"><input NAME="codcliente" type="text" class="cajaTotales" id="codcliente" size="6" maxlength="5">
					        <img src="../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar" onMouseOver="style.cursor=cursor"></td>					
						</tr>						
					
						<tr>
					 <input NAME="nro_fac" type="hidden" id="nro_fac" size="10" maxlength="5" readonly">	
						<tr>
	
						<tr>
							<td width="6%">Nombre</td>
						    <td width="27%"><input NAME="nombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45" readonly></td>
				            <td width="3%">Estado</td>
				            <td width="64%"><input NAME="nif" type="text" class="cajaMedia" id="nif" size="20" maxlength="15" readonly></td>
						</tr>						
						<tr>            
            <td>Fecha</td>
						  <td><input id="fecha" type="text" class="cajaPequena" NAME="fecha" maxlength="10" readonly><img src="../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0" id="Image2" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecha",
					ifFormat   : "%Y-%m-%d",
					button     : "Image2"
					  }
					);
		</script></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>	              							
							


					</table>										
			  </div>
			  <input id="accion" name="accion" value="alta" type="hidden">
			  <input id="tipo_cliente" name="tipo_cliente"  type="hidden">
			  <input id="parametro" name="parametro"  type="hidden">
			  </form>
			  <br>
					 <?php  
					if (@$ins=='0'){
					
					?>
					<td width="1%"><img src="../img/botonaceptar.jpg" width="72" height="22" border="1" onClick="procesar()" onMouseOver="style.cursor=cursor" title="Agregar"></td>
														<?php
					}
					?>	
					<td width="1%"><img src="../img/botonlimpiar.jpg" width="72" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor" title="Limpiar"></td>
										<?php  
					if (@$imp=='0'){
					
					?>
					<td width="1%"><img src="../img/botonimprimir.jpg" width="72" height="22" border="1" onClick="imprimir()" onMouseOver="style.cursor=cursor" title="Limpiar"></td>
				  				  					<?php
					}
					?>
				  <td width="1%"><img src="../img/botoncerrar.jpg" width="72" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor" title="Cerrar"></td>
				   
				
				    <input id="codfamilia" name="codfamilia" value="<? echo $codfamilia?>" type="hidden">
				    <input id="codfacturatmp" name="codfacturatmp" value="<? echo $codfacturatmp?>" type="hidden">	
					<input id="preciototal2" name="preciototal" value="<? echo $preciototal?>" type="hidden">			    
			      </div>
				</div>
			  		<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
					<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
					</iframe>
			  </form>
			 </div>
		  </div>
		</div>
    </body>
</html>
