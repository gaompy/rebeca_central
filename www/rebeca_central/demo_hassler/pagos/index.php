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
?>

<html>
	<head>
	<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">		
		<script type="text/javascript" src="../js/formato.js"></script>
    <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">    
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>	
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>	
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
		document.getElementById("nro_fac").focus();
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
			var codigo=document.getElementById("codcliente").value;
			var tip_cli=document.getElementById("tipo_cliente").value;
			var parametro=document.getElementById("parametro").value;
			if (parametro==0){			
			if (codigo=="") {
				alert ("Debe introducir el codigo del Cliente");
			} else {
				miPopup = window.open("ver_pro.php?tipocli="+tip_cli,"miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			}
		}else{
			
			alert("No puede modificar Factura!");
			}
			
			
		}
	
		function limpiar(){

		
		document.getElementById("codcliente").value="";
		document.getElementById("nombre").value="";
		document.getElementById("saldo").value="";
		document.getElementById("nif").value="";
		document.getElementById("tipo_des").value="";
		document.getElementById("total").value="";
		document.getElementById("fecha").value="";
		document.getElementById("nro_fac").value="";
		document.getElementById("nro_fac").focus();
			
		
		
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
							enteroo=parseInt(document.getElementById("cantidad").value);
							if (isNaN(enteroo)==true) {
								mensaje+="  - La cantidad debe ser numerica\n";
							} else {
									document.getElementById("cantidad").value=enteroo;
								}
						}

				
				if (mensaje!="") {
					alert("Atencion, se han detectado las siguientes incorrecciones:\n\n"+mensaje);
				} else {

					document.getElementById("formulario_lineas").submit();			
					document.getElementById("referencia").value="";
					document.getElementById("descripcion").value="";
					document.getElementById("precio").value="";
					document.getElementById("unidad").value="";
					document.getElementById("cantidad").value=1;
	
				}
			}

		
		function validarfactura(){
			var codigo=document.getElementById("nro_fac").value;
			miPopup = window.open("comprobarfactura.php?codfactura="+codigo,"frame_lineas","width=700,height=80,scrollbars=yes");
			
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
			
			  var saldo=document.getElementById("saldo").value;
        var cheque=document.getElementById("cheque").value;
			 
			  if (saldo==0){
			  
        alert("ATENCION, NO PUEDE PAGAR FACTURA CON SALDO 0");
        } else  {
			  
				var nrofactura=document.getElementById("nro_fac").value;
				var diferencia=document.getElementById("diferencia").value;				
				var fecha_pago=document.getElementById("fecha_pago").value;
        var ban_cod=document.getElementById("ban_cod").value;	
				
				var mensaje="";
				if (document.getElementById("nombre").value=="") mensaje+="  - Cliente\n";
				if (document.getElementById("diferencia").value=="") mensaje+="  - Pago\n";		
				if (document.getElementById("fecha_pago").value=="") mensaje+="  - Fecha Pago\n";			
				if (mensaje!="") {
					alert("Atencion, se han detectado las siguientes incorrecciones:\n\n"+mensaje);
				} else {					
				 		
					if (confirm(" Desea guardar registro? ")){ 
              location.href="guardar_cliente.php?nrofactura="+nrofactura+"&diferencia="+diferencia+"&fecha="+fecha_pago+"&cheque="+cheque+"&ban_cod="+ban_cod;
				  }
				}
			 }
			}		

var miPopup
function imprimir(variable1) {
	var parametro=variable1;
	var nrofactura=document.getElementById("nro_fac").value;	
	var total=document.getElementById("total").value;	
	var cliente=document.getElementById("nombre").value;	
	
	if (nrofactura > 0){
      if (parametro == 0){
        miPopup = window.open("impresiones_cuotas.php?nrofactura="+nrofactura+"&total="+total+"&cliente="+cliente,"miwin","width=700,height=380,scrollbars=yes");		
	  		miPopup.focus();
		   }else{
         miPopup = window.open("impresiones.php?nrofactura="+nrofactura+"&total="+total+"&cliente="+cliente,"miwin","width=700,height=380,scrollbars=yes");		
		  	miPopup.focus();      
       }    
    }else{		
		alert("Ingrese Nro. de Factura");
		}
	}
		</script>


	</head>
<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header"><?echo $descripcion?></div>
				<div id="frmBusqueda">
							<img src="../img/logo.png" alt="" width="172" height="48">
				<form id="formulario" name="formulario"  method="post" action="guardar_cliente.php" >
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						
						<tr>
							<td width="1%">Nro.trans. </td>					
					      <td colspan="3"><input NAME="nro_fac" type="text" class="cajaTotales" id="nro_fac" size="6" maxlength="7" onChange="validarfactura()">	
						  
						  </td>					
						<tr>
							<td width="15%">Cod. Cliente </td>
					      <td colspan="3"><input NAME="codcliente" type="text" class="cajaPequena" id="codcliente" size="6" maxlength="5" readonly>
						</tr>
						<tr>
							<td width="6%">Nombre</td>
						    <td width="27%"><input NAME="nombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45" readonly></td>
				            <td width="3%">RUC</td>
				            <td width="64%"><input NAME="nif" type="text" class="cajaMedia" id="nif" size="20" maxlength="15" readonly></td>
						</tr>
						<tr>
							<td width="6%">Fecha</td>
						    <td width="27%"><input NAME="fecha" type="text" class="cajaPequena" id="fecha" size="10" maxlength="10"  readonly> 
							</td>
							<td width="6%">Telefono</td>
						    <td width="27%"><input NAME="tipo_des" type="text" class="cajaMedia" id="tipo_des" size="10" maxlength="10" readonly> 
							</td>
					<td width="5%">Total</td>
					<td width="27%"><input NAME="total" type="text" class="cajaTotales" id="total" size="10" maxlength="10" readonly></td>
						</tr>
						<tr>
					<td width="5%">Saldo</td>
					<td width="27%"><input NAME="saldo"  type="text" class="cajaTotales" id="saldo" size="10" maxlength="10" readonly></td>
							</tr>					                       
						<tr>
					<td width="5%">Monto</td>
					<td width="27%"><input NAME="diferencia" onkeyup="format(this)"type="text" class="cajaMedia" id="diferencia" size="10" maxlength="10"></td>
					<td width="5%">Nro.Cheque</td>
					<td width="27%"><input NAME="cheque" type="text" class="cajaMedia" id="cheque" size="20" maxlength="20" value="0"></td>
                
				   <?php
					  $query="SELECT * FROM bancos where borrado=0 ORDER BY ban_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Bancos</td>
							<td width="43%"><select id="ban_cod" name="ban_cod" class="comboGrande">
							<option value="0">Efectivo</option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"ban_cod")?>"><?php echo mysql_result($res,$contador,"ban_des")." / ".mysql_result($res,$contador,"ban_nro");?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>

				  <td>Fecha</td>
						  <td><input id="fecha_pago" type="text" class="cajaPequena" NAME="fecha_pago" maxlength="10" readonly><img src="../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0" id="Image2" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecha_pago",
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
			 

			  </form>
			  <br>
			   <div id="frmBusqueda">
					
					<img src="../img/botonaceptar.jpg" width="79" height="22" border="1" onClick="validar_cabecera()" onMouseOver="style.cursor=cursor">
					<td width="1%"><img src="../img/botonlimpiar.jpg" width="72" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor" title="Limpiar"></td>	
          <img src="../img/botonimprimir.jpg" width="79" height="22" border="1" onClick="imprimir(1)" onMouseOver="style.cursor=cursor">					
				  <td width="1%"><img src="../img/botoncerrar.jpg" width="72" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor" title="Cerrar"></td>
				  </tr>
				</table>
				</div>
				</div>
			  		<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
					<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
					</iframe>
			  </form>			  
			  				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_lineas" name="frame_lineas" frameborder="0">
						<ilayer width="100%" height="250" id="frame_lineas" name="frame_lineas">						
						<div align="right"></div>
						</ilayer>
					</iframe>
			 </div>
		  </div>
		</div>
    </body>
</html>
