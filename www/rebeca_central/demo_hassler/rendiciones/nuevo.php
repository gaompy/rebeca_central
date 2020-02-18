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

  function inicio(){
		document.getElementById("variable2").focus();
}

function guardar()
        
			{
				var mensaje="";
        if (document.getElementById("variable2").value=="") mensaje+="  - Camiones\n";
        if (document.getElementById("variable3").value=="") mensaje+="  - Choferes\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Ayudante\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Zonas\n";
        if (document.getElementById("variable6").value=="") mensaje+="  - Fecha\n";
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
                
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
                      }                        
                
          
              }
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
          
	          
            <?php
					      $query="SELECT * FROM camiones where borrado=0 order by cam_des";
						    $res=mysql_query($query);
						    $contador=0;
					  ?>						
						
						<td width="15%">Camiones</td>
							<td width="43%"><select id="variable2" name="variable2" class="comboGrande">
							<option value="">Ninguno</option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"cam_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"cam_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>

            <?php
					      $query="SELECT * FROM choferes where borrado=0 order by cho_des";
						    $res=mysql_query($query);
						    $contador=0;
					  ?>						
						
						<td width="15%">Choferes</td>
							<td width="43%"><select id="variable3" name="variable3" class="comboGrande">
							<option value="">Ninguno</option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"cho_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"cho_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>

            <?php
					      $query="SELECT * FROM ayudantes where borrado=0 order by ayu_des";
						    $res=mysql_query($query);
						    $contador=0;
					  ?>						
						
						<td width="15%">Ayudantes</td>
							<td width="43%"><select id="variable4" name="variable4" class="comboGrande">
							<option value="">Ninguno</option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"ayu_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"ayu_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>


            <?php
					      $query="SELECT * FROM zonas where borrado=0 order by zon_des";
						    $res=mysql_query($query);
						    $contador=0;
					  ?>						
						
						<td width="15%">Zonas</td>
							<td width="43%"><select id="variable5" name="variable5" class="comboGrande">
							<option value="">Ninguno</option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"zon_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"zon_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>

						<tr>					
						<td>Fecha </td>
						  <td><input id="variable6" value="<?echo $fecha?>" type="text" class="cajaPequena" NAME="variable6" maxlength="10" readonly><img src="../img/calendario.png" name="Image3" id="Image3" width="16" height="16" border="0" id="Image3" onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "variable6",
					ifFormat   : "%Y-%m-%d",
					button     : "Image3"
					  }
					);
		      </script></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>				

															
							 
						<tr>											
					 
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
