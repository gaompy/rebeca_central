<?php 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../conectar.php");

$variable1=$_GET["variable1"];

$query="SELECT * FROM presupuesto_cab_view WHERE pre_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"cli_cod"));
$variable2_1=strtoupper(mysql_result($rs_query,0,"cli_des"));
$variable3=mysql_result($rs_query,0,"pre_fec");

?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>	
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>		</head>		
		<script type="text/javascript" src="../funciones/validar.js"></script>
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
        if (document.getElementById("variable2").value=="") mensaje+="  - Cliente\n";
        if (document.getElementById("variable3").value=="") mensaje+="  - Fecha\n";
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
				<div id="tituloForm" class="header">MODIFICAR <?echo $descripcion?> </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td>C&oacute;digo</td>
							<td><?php echo $variable1 ?></td>
						    <td width="42%" rowspan="13" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
									<tr>
				   <?php
					  $query="SELECT * FROM clientes where borrado=0 ORDER BY cli_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Clientes</td>
							<td width="43%"><select id="variable2" name="variable2" class="comboGrande">
							<option value="<?php echo $variable2?>"><?php echo $variable2_1?></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"cli_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"cli_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
                
						<tr>
						<td>Fecha </td>
						  <td><input id="variable3" type="text" class="cajaPequena" NAME="variable3" maxlength="10" value="<?php echo $variable3 ?>" readonly><img src="../img/calendario.png" name="Image3" id="Image3" width="16" height="16" border="0" id="Image3" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "variable3",
					ifFormat   : "%Y-%m-%d",
					button     : "Image3"
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
					<input id="accion" name="accion" value="modificar" type="hidden">
					<input id="id" name="id" value="<?php echo $variable1;?>" type="hidden">
			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
