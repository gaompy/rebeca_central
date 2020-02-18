<?php 
@@session_start();
$usuario=$_SESSION["id_usuario"];
$suc_cod=$_SESSION["suc_cod"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"]; 

include ("../../conectar.php"); 
$pro_cod=$_GET['variable1'];
$pro_bar=$_GET['probar'];
$pro_des=$_GET['prodes'];



?>

<html>
	<head>
	<title>Principal</title>
		<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">		
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
    document.getElementById("formulario_lineas").submit();
    document.getElementById("referencia").focus();

		}
		
		var miPopup
		function abreVentana(){
			
			var parametro=document.getElementById("parametro").value;
			if (parametro==0){
			
			miPopup = window.open("ver_cliente.php","miwin","width=700,height=429,scrollbars=yes");
			miPopup.focus();
			}else{
			
			alert("No puede modificar Factura!");
			}
			
		}
		
		function ventanaArticulos(){
		
				miPopup = window.open("ver_pro.php","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();

			
		}
	
		function limpiar(){
		
		document.getElementById("referencia").value="";
		document.getElementById("descripcion").value="";
		document.getElementById("subpro").value="";
		document.getElementById("cantidad").value="";
    document.getElementById("precio").value="";
		document.getElementById("referencia").focus();
		
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
        if (document.getElementById("referencia").value=="") mensaje+="  - Codigo Barras\n";
        if (document.getElementById("descripcion").value=="") mensaje+="  - Descripcion\n";
        if (document.getElementById("cantidad").value=="") mensaje+="  - Cantidad\n";

        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    } else{
      
             var codigo=document.getElementById("referencia").value;
              var pro_bar=document.getElementById("pro_bar").value;
      
                if(codigo==pro_bar){  
                      alert("Sub Producto no puede incluir mismo producto!");
                  }	else { 
                      if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario_lineas").submit();
                          limpiar();
                      }    
                   }	
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
    
		var miPopup
function imprimir(codfactura) {
			var codfactura;
      var pro_des=document.getElementById("nombre").value;
		  miPopup = window.open("impresiones.php?nrofactura="+codfactura+"&prodes="+pro_des,"miwin","width=700,height=380,scrollbars=yes");

      miPopup.focus();
		}			

		function validarproducto(){

			var codigo=document.getElementById("referencia").value;
      var pro_bar=document.getElementById("pro_bar").value;
      
      if(codigo==pro_bar){
      alert("Sub Producto no puede incluir mismo producto!");
      }	else { 
			miPopup = window.open("comprobarproducto.php?codigopro="+codigo,"frame_lineas","miwin","width=700,height=80,scrollbars=yes");
        }	
		
    
    }	

		var miPopup
		function abrecliente(){
						
			var parametro=document.getElementById("parametro").value;
			if (parametro==0){
			
			miPopup = window.open("nuevo_cliente.php","miwin","width=700,height=429,scrollbars=yes");
			miPopup.focus();
			}else{
			
			alert("No puede modificar Factura!");
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
		</script>


	<style type="text/css">
<!--
.Estilo1 {
	font-size: 14pt;
	font-weight: bold;
}
-->
    </style>
	</head>
<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">COMPONENTES</div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="frame_lineas.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						
						<tr>
							<td width="1%">Codigo Barras</td>					
					      <td colspan="3"><input NAME="pro_bar" type="text" class="cajaMedia" id="pro_bar" size="10" maxlength="5" value="<? echo $pro_bar?>" onChange="validarfactura()" readonly>

						<tr>

						<tr>
							<td width="6%">Descripcion</td>
						    <td width="27%"><input NAME="nombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45" value="<? echo $pro_des?>" readonly></td>
				            
			
					  </tr>	              							
					</table>										
			  </div>
			  <input id="accion" name="accion" value="alta" type="hidden">
			  <input id="tipo_cliente" name="tipo_cliente"  type="hidden">
			  <input id="parametro" name="parametro"  type="hidden">
			  </form>
			  <br>
			   <div id="frmBusqueda">
				<form id="formulario_lineas" name="formulario_lineas" method="post" action="frame_lineas.php" target="frame_lineas">

				  <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
				  <tr>
					
					
					<td width="11%">Codigo</td>
					<td colspan="10"><input NAME="referencia" type="text" class="cajaMedia" id="referencia" size="15" maxlength="15" onChange="validarproducto()"> <img src="../../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar Producto">				  </td>
				  <tr>
					<td>Descripcion</td>
					<td width="19%"><input NAME="descripcion" type="text" class="cajaGrande" id="descripcion" size="30" maxlength="30" readonly></td>
				  <tr>

					<td width="5%">Cantidad</td>
					<td width="1%"><input NAME="cantidad" type="text" class="cajaPequena2" id="cantidad" size="10" maxlength="10" onChange="validar()" ></td>
			        	  <tr>
						<td width="17%">Precio</td>
					<td width="14%"><input NAME="precio" type="text" class="cajaTotales" id="precio" size="10" maxlength="10" readonly></td>
					<tr>	

					 <td width="1%"><div align="center"></div></td>
				    <td width="1%"><img src="../../img/botonagregar.jpg" onClick="validar()" width="72" height="22" border="1" onMouseOver="style.cursor=cursor" title="Agregar"> <img src="../../img/botonlimpiar.jpg" width="72" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor" title="Limpiar"> <img src="../../img/botonimprimir.jpg" width="72" height="22" border="1" onClick="imprimir('<? echo $pro_cod?>')" onMouseOver="style.cursor=cursor" title="Limpiar"> <img src="../../img/botoncerrar.jpg" width="72" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor" title="Cerrar"></td>

          <td width="1%">&nbsp;</td>
				   <td width="1%">&nbsp;</td>
          </tr>
				</table>
				</div>
				<input NAME="procod" id="procod" type="hidden" value="<? echo $pro_cod?>">
			   <input NAME="subpro" id="subpro" type="hidden">
				<div id="frmBusqueda">
				<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="1%">ITEM</td>
							<td width="2%">CODIG</td>
							<td width="2%">DESCRIPCION</td>
							<td width="2%">CANT</td>
              <td width="2%">STOCK</td>
              <td width="2%">FAMILIA</td>
              <td width="2%">TIPO</td>
              <td width="2%">UNID.</td>
              <td width="2%">ELIM</td>
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
