<?php 
@@session_start();
$usuario=$_SESSION["id_usuario"];
$suc_cod=$_SESSION["suc_cod"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"]; 

include ("../../conectar.php"); 
$variable1=$_GET['variable1'];
$query="SELECT * FROM hruta_cab_view WHERE hru_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"cam_cod"));
$variable2_0=strtoupper(mysql_result($rs_query,0,"cam_des"));
$variable3=strtoupper(mysql_result($rs_query,0,"cho_cod"));
$variable3_0=strtoupper(mysql_result($rs_query,0,"cho_des"));
$variable4=strtoupper(mysql_result($rs_query,0,"ayu_cod"));
$variable4_0=strtoupper(mysql_result($rs_query,0,"ayu_des"));
$variable5=strtoupper(mysql_result($rs_query,0,"zon_cod"));
$variable5_0=strtoupper(mysql_result($rs_query,0,"zon_des"));
$parametro=strtoupper(mysql_result($rs_query,0,"hru_est"));



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
      document.getElementById("variable_1").focus();
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
				var parametro="<?php echo $parametro?>";
        if (parametro==0){ 
          miPopup = window.open("ver_pro.php","miwin","width=700,height=500,scrollbars=yes");
				  miPopup.focus();
        }else{
        alert("Hoja de ruta confirmada, no se puede modificar!");
        }
		}
	
		function limpiar(){
		
		document.getElementById("variable_1").value="";
		document.getElementById("variable_2").value="";
		document.getElementById("variable_3").value="";
		document.getElementById("variable_4").value="";
    document.getElementById("variable_1").focus();
		
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
        if (document.getElementById("variable_1").value=="") mensaje+="  - Pedido\n";
        if (document.getElementById("variable_2").value=="") mensaje+="  - Cliente\n";
        if (document.getElementById("variable_3").value=="") mensaje+="  - Estado\n";
        if (document.getElementById("variable_4").value=="") mensaje+="  - Total\n";
          if (mensaje!="") {
					   alert("Atencion, Faltan Datos:\n\n"+mensaje);
 			    }else {
            
          if (confirm(" Desea guardar registro? ")){ 
          document.getElementById("formulario_lineas").submit();
        	
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
      var parametro="<?php echo $parametro?>";
      
      if (parametro==0){
			   var codigo=document.getElementById("variable_1").value;
			   miPopup = window.open("comprobarfactura.php?codfactura="+codigo,"frame_lineas","width=700,height=80,scrollbars=yes");
      }else{
         alert("Hoja de Ruta confirmada, no se puede modificar!");
      }
		 
		}
    
		var miPopup
function imprimir(variable1) {
		 
     
     if (confirm(" Imprimir por productos? ")){ 
       miPopup = window.open("impresiones_pro.php?variable1="+variable1,"miwin","width=700,height=380,scrollbars=yes");
       miPopup.focus();
     }else{
       miPopup = window.open("impresiones.php?variable1="+variable1,"miwin","width=700,height=380,scrollbars=yes");
       miPopup.focus();
     }                        
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
    
 		function confirmar(){
    
        var param="<?echo $parametro?>";
    
        if (param==0){
		
          if (confirm(" Desea Confirmar Listado ? ")){
            //alert("Confirmado");
           var miPopup; 
           variable1="<?echo $variable1?>";           
			     location.href="procesarhruta.php?variable1="+variable1;           
           }
            }else{
            alert("Listado Confirmado!");
             }
		}   
    
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
				<div id="tituloForm" class="header">cargar facturas</div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="frame_lineas.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="1%">Hoja de Ruta</td>					
					      <td colspan="3"><input NAME="variable1" type="text" class="cajaMedia" id="variable1" size="10" maxlength="5" value="<? echo $variable1?>"  readonly>
						<tr>
						<tr>
							<td width="6%">Camion</td>
						    <td width="27%"><input NAME="variable2" type="text" class="cajaGrande" id="variable2" size="45" maxlength="45" value="<? echo $variable2_0?>" readonly></td>
					  </tr>
						<tr>
							<td width="6%">Chofer</td>
						    <td width="27%"><input NAME="variable3" type="text" class="cajaGrande" id="variable3" size="45" maxlength="45" value="<? echo $variable3_0?>" readonly></td>
					  </tr>
						<tr>
							<td width="6%">Zona</td>
						    <td width="27%"><input NAME="variable4" type="text" class="cajaGrande" id="variable4" size="45" maxlength="45" value="<? echo $variable5_0?>" readonly></td>
					  </tr>
          <td width="5%">Total</td>
					<td width="1%"><input NAME="variable5" type="text" class="cajaTotales" id="variable5" size="300" maxlength="300" readonly></td>

            
					</table>										
			  </div>
			  <input id="accion" name="accion" value="alta" type="hidden">
			  </form>
			  <br>
			   <div id="frmBusqueda">
				<form id="formulario_lineas" name="formulario_lineas" method="post" action="frame_lineas.php" target="frame_lineas">
				  <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
				  <tr>
					<td width="11%">Pedido Nro.</td>
					<td colspan="10"><input NAME="variable_1" type="text" class="cajaMedia" id="variable_1" size="150" maxlength="150" onChange="validarfactura()"> <img src="../../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar"></td>
				  <tr>
					<td>Cliente</td>
					<td width="19%"><input NAME="variable_2" type="text" class="cajaGrande" id="variable_2" size="300" maxlength="300" readonly></td>
				  <tr>
					<td>Estado</td>
					<td width="19%"><input NAME="variable_3" type="text" class="cajaGrande" id="variable_3" size="300" maxlength="300" readonly></td>
				  <tr>

					<td width="5%">Monto</td>
					<td width="1%"><input NAME="variable_4" type="text" class="cajaTotales" id="variable_4" size="300" maxlength="300" readonly></td>
			    
          <tr>
					 <td width="1%"><div align="center"></div></td>
				   <td width="1%"><img src="../../img/botonagregar.jpg" onClick="validar()" width="72" height="22" border="1" onMouseOver="style.cursor=cursor" title="Agregar"> <img src="../../img/botonlimpiar.jpg" width="72" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor" title="Limpiar"> <img src="../../img/botonimprimir.jpg" width="72" height="22" border="1" onClick="imprimir('<? echo $variable1?>')" onMouseOver="style.cursor=cursor" title="Limpiar"> <img src="../../img/boton-confirmar.jpg" width="90" height="27" border="0" onClick="confirmar()" onMouseOver="style.cursor=cursor" title="Confirmar"> <img src="../../img/botoncerrar.jpg" width="72" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor" title="Cerrar"></td>
           <td width="1%">&nbsp;</td>
				   <td width="1%">&nbsp;</td>
          </tr>
				</table>
				</div>
				<input NAME="hru_cod" id="hru_cod" type="hidden" value="<? echo $variable1?>">
        <input NAME="parametro" id="parametro" type="hidden" value="<? echo $parametro?>">
			   <input NAME="fac_cod" id="fac_cod" type="hidden">
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
ÿ 		೜ɝdiv>
			  		<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
					<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
					</iframe>
			  </form>
			 </div>
		  </div>
		</div>
    </body>
</html>
