<?php 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$usuario=$_SESSION["id_usuario"];
include ("../../conectar.php"); 
include ("../../permisos.php"); 

$variable1=$_GET["variable1"] ;

$query="select * 
from presupuesto_cab_view where pre_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"cli_des"));
$variable3=strtoupper(mysql_result($rs_query,0,"est_des"));
$variable4=strtoupper(mysql_result($rs_query,0,"pre_fec"));
$parametro=strtoupper(mysql_result($rs_query,0,"pre_est"));


?>

<html>
	<head>
	<title>Principal</title>
		<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../../js/formato.js"></script>		
		<link href="../../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../../calendario/lang/calendar-sp.js"></script>	
		<script type="text/JavaScript" language="javascript" src="../../calendario/calendar-setup.js"></script>	
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
    
    var param="<?echo $parametro?>";
    
    if (param==0){
		
      document.getElementById("referencia").focus();
      document.getElementById("formulario_lineas").submit();
    
    }else{
     alert("Presupuesto Confirmado!");
    }
    
		}
		
		var miPopup
		function abreVentana(){
			

			
			miPopup = window.open("ver_cliente.php","miwin","width=700,height=429,scrollbars=yes");
			miPopup.focus();

			
		}
		
		function ventanaArticulos(){
			var codigo=document.getElementById("codcliente").value;
			var tip_cli=document.getElementById("tipo_cliente").value;
			var parametro=document.getElementById("parametro").value;
			if (parametro==0){			
			if (codigo=="") {
				alert ("Debe introducir el codigo del Presupuesto");
			} else {
				miPopup = window.open("ver_pro.php","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			}
		}else{
			
			alert("No puede modificar Presupuesto!");
			}
			
			
		}
	
		function limpiar(){
		
		document.getElementById("referencia").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("precio").value="";
		document.getElementById("cantidad").value="";
		document.getElementById("referencia").focus();
		
		}
    
 		function confirmar(){
    
        var param="<?echo $parametro?>";
    
        if (param==0){
		
          if (confirm(" Desea Confirmar Presupuesto ? ")){
           var miPopup; 
           variable1="<?echo $variable1?>";           
			     location.href="confirmarpresupuesto.php?variable1="+variable1;           
           }
            }else{
                alert("Presupuesto Confirmado!");
             }
		}   
    
    
		function cancelar() {
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="../index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;

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
								mensaje+="  - El precio debe ser numerico / utilice punto\n";
							}
              if (isNaN(document.getElementById("cantidad").value)==true) {
								mensaje+="  - Cantidad debe ser numerica / utilice punto\n";
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
         if (confirm(" Desea guardar registro? ")){ 
					document.getElementById("formulario_lineas").submit();			
					document.getElementById("referencia").value="";
					document.getElementById("descripcion").value="";
					document.getElementById("precio").value="";					
					document.getElementById("cantidad").value="";
					document.getElementById("referencia").focus();
	       }
				}
			}
		function validarcliente(){
			var codigo=document.getElementById("codcliente").value;

			var parametro=document.getElementById("parametro").value;
			if (parametro==0){
			miPopup = window.open("comprobarcliente.php?codcliente="+codigo,"frame_lineas","width=700,height=80,scrollbars=yes");
			
						
			}else{
			
			
			alert("No puede modificar Presupuesto!");
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
			
			
			alert("No puede modificar Presupuesto!");
			}	
		}	

		var miPopup
		function abrecliente(){
						
			var parametro=document.getElementById("parametro").value;
			if (parametro==0){
			
			miPopup = window.open("nuevo_cliente.php","miwin","width=700,height=429,scrollbars=yes");
			miPopup.focus();
			}else{
			
			alert("No puede modificar Presupuesto!");
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
			
							alert("No puede modificar Presupuesto!");
						}						
				}	
			}				
			
var miPopup
function imprimir() {
		var codigo=document.getElementById("nro_fac").value;
		if (codigo > 0){
    var variable2="<?echo $variable2?>";
    var variable3="<?echo $variable3?>";
    var variable4="<?echo $variable4?>";
    
			miPopup = window.open("impresiones.php?codigo="+codigo+"&variable2="+variable2+
      "&variable3="+variable3+"&variable4="+variable4,"miwin","width=700,height=380,scrollbars=yes");		
			miPopup.focus();
			}else{
				alert("Introdusca codigo Presupuesto!");
			}
		}		
		
		
		</script>


	</head>
<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">CARGAR PRODUCTOS</div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_factura.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<td width="15%">Cod. Inv. </td>
							
					      <td colspan="3"><input NAME="codcliente" type="text" class="cajaTotales" id="codcliente" size="6" maxlength="5" value="<? echo $variable1?>">
					        </td>					
						</tr>						
					
						<tr>
								
					 <input NAME="nro_fac" value="<?echo $variable1?>" type="hidden" id="nro_fac" size="10" maxlength="5" readonly">	
						  
					

						
						<tr>
	
						<tr>
							<td width="6%">Nombre</td>
						    <td width="27%"><input NAME="nombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45" readonly value="<? echo $variable2?>"></td>
				            <td width="3%">Estado</td>
				            <td width="64%"><input NAME="nif" type="text" class="cajaMedia" id="nif" size="20" maxlength="15" readonly value="<? echo $variable3?>"></td>
						</tr>
						
						<tr>
            
            <td>Fecha</td>
						  <td><input id="fecha" type="text" class="cajaPequena" NAME="fecha" maxlength="10" value="<?echo $variable4?>" readonly><img src="../../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0" id="Image2" onMouseOver="this.style.cursor='pointer'">
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
			  <input id="parametro" name="parametro"  type="hidden" value="<?echo $parametro?>">
			  </form>
			  <br>
			   <div id="frmBusqueda">
				<form id="formulario_lineas" name="formulario_lineas" method="post" action="frame_lineas.php" target="frame_lineas">
				<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
				  <tr>
					
					
					<td width="11%">Codigo</td>
					<td colspan="10"><input NAME="referencia" type="text" class="cajaMedia" id="referencia" size="15" maxlength="15" onChange="validarproducto()"> <img src="../../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar Producto">
				  </td>
				  </tr>
				  <tr>
					<td>Descripcion</td>
					<td width="19%"><input NAME="descripcion" type="text" class="cajaGrande" id="descripcion" size="30" maxlength="30" readonly></td>
				  <tr>
                                			
				
					<td width="5%">Precio</td>
					<td width="11%"><input NAME="precio" onkeyup="format(this)" type="text" class="cajaTotales" id="precio" size="10"  maxlength="10" ></td>					
          	 <tr>
            <td width="5%">Cantidad</td>
					<td width="1%"><input NAME="cantidad" onChange="validar()" type="text" class="cajaPequena2" id="cantidad" size="10" maxlength="10"  ></td>
					  <tr> 
					<td width="5%">Total</td>
					<td width="1%"><input NAME="total" type="text" class="cajaTotales" id="total" size="10" maxlength="10" readonly></td>

					

					<td width="1%"><img src="../../img/botonagregar.jpg" width="72" height="22" border="1" onClick="validar()" onMouseOver="style.cursor=cursor" title="Agregar"></td>
					<td width="1%"><img src="../../img/botonlimpiar.jpg" width="72" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor" title="Limpiar"></td>
					<td width="1%"><img src="../../img/botonimprimir.jpg" width="72" height="22" border="1" onClick="imprimir()" onMouseOver="style.cursor=cursor" title="Limpiar"></td>
					<td width="1%"><img src="../../img/boton-confirmar.jpg" width="90" height="27" border="0" onClick="confirmar()" onMouseOver="style.cursor=cursor" title="Limpiar"></td>				  
          
          <td width="1%"><img src="../../img/botoncerrar.jpg" width="72" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor" title="Cerrar"></td>
				   
				  </tr>
				</table>
				</div>
				<input NAME="codcliente1" id="codcliente1" type="hidden" value="<?echo $variable1?>">
        <input NAME="pro_cod" id="pro_cod" type="hidden">
				<input NAME="codcli" id="codcli" type="hidden">
				<input NAME="param" id="param" type="hidden">
				
				<br>
				<div id="frmBusqueda">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="11%">ITEM</td>
							<td width="9%">CODIG</td>
							<td width="14%">DESCRIPCION</td>
							<td width="9%">CANT</td>
							<td width="10%">UNIT</td>
							<td width="9%">TOTAL</td>
							<td width="9%">ELIM</td>
						</tr>
				</table>
				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_lineas" name="frame_lineas" frameborder="0">
						<ilayer width="100%" height="250" id="frame_lineas" name="frame_lineas">						
						<div align="right"></div>
						</ilayer>
					</iframe>
				</div>					
			  </div>
			  <div id="frmBusqueda">
			<table width="25%" border=0 align="right" cellpadding=3 cellspacing=0 class="fuente8">
			  <tr>

		</table>
			  </div>
				<div id="botonBusqueda">					
				  <div align="center">
				
				    <input id="codfamilia" name="codfamilia" type="hidden">
				    <input id="codfacturatmp" name="codfacturatmp" type="hidden">	
					<input id="preciototal2" name="preciototal"  type="hidden">			    
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
