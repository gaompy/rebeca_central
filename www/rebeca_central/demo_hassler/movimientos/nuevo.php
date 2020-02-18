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
    <script type="text/javascript" src="../js/formato.js"></script>
		<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>	
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>
    
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
        if (document.getElementById("variable2").value=="") mensaje+="  - Nro.mov\n";
        if (document.getElementById("variable3").value=="") mensaje+="  - Observacion.\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Monto\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Tipo Mov. \n";
        if (document.getElementById("variable6").value=="") mensaje+="  - Banco y Cta. \n";
        if (document.getElementById("variable7").value=="") mensaje+="  - Fecha trans. \n";
        

				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
                
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
                      }                        
                
          
              }
        }
	
  function inicio(){
		document.getElementById("variable2").focus();
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
						<tr>
							<td width="15%">Nro. Cheque</td>
						    <td width="43%"><input NAME="variable2" type="text" class="cajaMedia" id="variable2" size="245" maxlength="245"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="15%">Concepto</td>
						    <td width="43%"><input NAME="variable3" type="text" value="" class="cajaGrande" id="variable3" size="245" maxlength="245"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>					
						<tr>
							<td width="15%">Monto</td>
						    <td width="43%"><input NAME="variable4" onkeyup="format(this)"  type="text" value="" class="cajaMedia" id="variable4" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>					
						<tr>
            <td width="15%">Tipo Mov.</td>
							<td width="43%"><select id="variable5" name="variable5" class="comboMedio" onChange="buscar()">
							<option value=""></option>
              <option value="dep.">Depositos</option>
              <option value="ext.">Extracciones</option>
							</select></td>
				        </tr>
						<tr>          
        
				   <?php
					  $query="SELECT * FROM bancos where borrado=0 ORDER BY ban_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Bancos</td>
							<td width="43%"><select id="variable6" name="variable6" class="comboGrande" onChange="buscar()">
							<option value=""></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"ban_cod")?>"><?php echo mysql_result($res,$contador,"ban_des")." / ".mysql_result($res,$contador,"ban_nro");?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
		<tr>				
<td>Fecha bajas</td>
						  <td><input id="variable7" value="<?echo $fecha?>" type="text" class="cajaPequena" NAME="variable7" maxlength="10" readonly><img src="../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0" id="Image2" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "variable7",
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
