<?php 
@session_start();
$usuario=$_SESSION["id_usuario"];
$suc_cod=$_SESSION["suc_cod"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"]; 

include ("../../conectar.php"); 

$variable1=strtoupper($_GET["variable1"]);
$variable2=strtoupper($_GET["variable2"]);
$variable3=strtoupper($_GET["variable3"]);


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
    document.getElementById("variable4").focus();

		}
		
		

	
		function limpiar(){
		
		document.getElementById("variable4").value="";
		document.getElementById("variable5").value="";
		document.getElementById("variable6").value="-";
		document.getElementById("variable7").value="-";
		document.getElementById("variable4").focus();
		
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
        if (document.getElementById("variable4").value=="") mensaje+="  - Cedula\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Funcionario\n";
        if (document.getElementById("variable6").value=="") mensaje+="  - Telefono\n";
        if (document.getElementById("variable7").value=="") mensaje+="  - Email\n";
        

        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    } else{      
                      if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario_lineas").submit();
                          limpiar();
		           }
        }	
	    }	
      


		

var miPopup
  function imprimir(variable1,variable2) {
		  miPopup = window.open("impresiones.php?variable1="+variable1+"&variable2="+variable2,"miwin","width=700,height=380,scrollbars=yes");
      miPopup.focus();
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
				<div id="tituloForm" class="header">FUNCIONARIOS DE CLIENTES</div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="frame_lineas.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						
						<tr>
							<td width="1%">Codigo</td>					
					      <td colspan="3"><input NAME="variable1" type="text" class="cajaPequena" id="variable1" size="10" maxlength="5" value="<? echo $variable1?>" readonly>

						<tr>

						<tr>
							<td width="6%">Cliente</td>
						    <td width="27%"><input NAME="variable2" type="text" class="cajaGrande" id="variable2" size="45" maxlength="45" value="<? echo $variable2?>" readonly></td>
					  </tr>
            
							<td width="6%">RUC</td>
						    <td width="27%"><input NAME="variable3" type="text" class="cajaMedia" id="variable3" size="45" maxlength="45" value="<? echo $variable3?>" readonly></td>
					  </tr>	              							

            	              							
					</table>										
			  </div>
			  </form>
			  <br>
			   <div id="frmBusqueda">
				<form id="formulario_lineas" name="formulario_lineas" method="post" action="frame_lineas.php" target="frame_lineas">

				  <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
				  <tr>
					
					
					<td width="11%">Cedula ID.</td>
					<td colspan="10"><input NAME="variable4" type="text" class="cajaMedia" id="variable4" size="50" maxlength="50"></td>
				  <tr>
					<td>Funcionario</td>
					<td width="19%"><input NAME="variable5" type="text" class="cajaGrande" id="variable5" size="230" maxlength="230"></td>

				  <tr>
					<td width="5%">Telefono</td>
					<td width="1%"><input NAME="variable6" type="text" class="cajaMedia" id="variable6" size="50" maxlength="50" value="-"></td>
			    <tr>
          <tr>
					<td width="5%">Email</td>
					<td width="1%"><input NAME="variable7" type="text" class="cajaGrande" id="variable7" size="50" maxlength="50" value="-"></td>
			    <tr>

					 <td width="1%"><div align="center"></div></td>
				    <td width="1%"><img src="../../img/botonagregar.jpg" onClick="validar()" width="72" height="22" border="1" onMouseOver="style.cursor=cursor" title="Agregar"> <img src="../../img/botonlimpiar.jpg" width="72" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor" title="Limpiar"> <img src="../../img/botonimprimir.jpg" width="72" height="22" border="1" onClick="imprimir('<? echo $variable1?>','<? echo $variable2?>')" onMouseOver="style.cursor=cursor" title="Limpiar"> <img src="../../img/botoncerrar.jpg" width="72" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor" title="Cerrar"></td>

          <td width="1%">&nbsp;</td>
				   <td width="1%">&nbsp;</td>
          </tr>
				</table>
				</div>
				<input NAME="cli_cod" id="cli_cod" type="hidden" value="<? echo $variable1?>">
			   
				<div id="frmBusqueda">
				<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="1%">ITEM</td>
							<td width="2%">CODIG</td>
							<td width="2%">CEDULA</td>
							<td width="2%">FUNCIONARIO</td>
              <td width="2%">TELEFONO</td>
              <td width="2%">EMAIL</td>
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
