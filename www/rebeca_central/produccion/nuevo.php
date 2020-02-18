<?php 
@@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;

include ("../conectar.php"); 
include ("../fecha_hora.php"); 
?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
		<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>	
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>     
     <script type="text/javascript" src="../js/formato.js"></script>
		<script language="javascript">
		
		function cancelar() {
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;

		}
		
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
				var mensaje="";
				if (document.getElementById("variable5").value=="") mensaje+="  - Cantidad\n";
				if (document.getElementById("variable6").value=="") mensaje+="  - Fecha\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
                if (isNaN(document.getElementById("variable5").value)==true) {
									alert ("El campo debe ser numerico!");									
								}else{
                 
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
                      }
                                    
                  }
          
              } 
        }
	
  function inicio(){
		document.getElementById("variable2").focus();
}
		var miPopup
		function abreVentana(){
			miPopup = window.open("ver_pro.php","miwin","width=700,height=600,scrollbars=yes");
			miPopup.focus();
		}
    
		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">INSERTAR <?echo $descripcion?> </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<input id="variable0" type="hidden"  NAME="variable0">
            <tr>
							<td width="16%">Cod. prod.</td>
							<td width="68%"><input id="variable1" type="text" class="cajaMedia" NAME="variable1" maxlength="10" readonly="yes">  <img src="../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar Materia" onMouseOver="style.cursor=cursor"></td>
							<td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>		
							<td width="15%">Descripcion</td>
						    <td width="43%"><input NAME="variable2" type="text" class="cajaGrande" id="variable2" size="45" maxlength="45" readonly="yes"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
					<tr>		
							<td width="15%">Familia</td>
						    <td width="43%"><input NAME="variable3" type="text" class="cajaMedia" id="variable3" size="45" maxlength="45" readonly="yes"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>											
							<td width="15%">Unidad</td>
						    <td width="43%"><input NAME="variable4" type="text" class="cajaMedia" id="variable4" size="45" maxlength="45" readonly="yes"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>											
						<td width="15%">Cantidad</td>
						    <td width="43%"><input NAME="variable5" type="text" class="cajaMedia" id="variable5" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>				
<td>Fecha Produccion</td>
						  <td><input id="variable6" value="<?echo $fecha?>" type="text" class="cajaPequena" NAME="variable6" maxlength="10" readonly><img src="../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0" id="Image2" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "variable6",
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
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="alta" type="hidden">
					<input id="id" name="id" value=variable2 type="hidden">
			  </div>
			  </form>
		  </div>
		  </div>
		</div>
	</body>
</html>
