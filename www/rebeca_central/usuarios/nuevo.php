<?php 
@@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../conectar.php");
?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
		<script language="javascript">
		
		function cancelar() {
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;

		}
		
		function enfoque(){
		document.formulario.variable3.focus();
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
		
                
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
                      }                        
                
          
        } 
 
		
		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">INSERTAR Usuarios </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>

						<tr>
							<td>Username</td>
							<td><input id="variable2" name="variable2" type="text" class="cajaMedia" maxlength="45" value="<?php $variable2; ?>"></td>
							<td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
				   
						<td>Password</td>
							<td><input id="variable3" name="variable3" type="password" class="cajaMedia" maxlength="45" value="<?php $variable3; ?>"></td>
							<td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
				
				   <?php
					  	$query="SELECT * FROM niveles where borrado=0 ORDER BY niv_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  $variable4="";
					  ?>						
						
						<td width="15%">Niveles</td>
							<td width="43%"><select id="variable4" name="variable4" class="comboMedio">
							<option value="<?php echo $variable4; ?>"><?php echo $variable4; ?></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"niv_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"niv_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>						

				   <?php
					  	$query="SELECT * FROM sucursales where borrado=0 ORDER BY suc_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Sucursales</td>
							<td width="43%"><select id="variable5" name="variable5" class="comboMedio">
							<option value="<?php echo $variable4; ?>"><?php echo $variable4; ?></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"suc_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"suc_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>			
						 
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="alta" type="hidden">
					<input id="id" name="id" value="variable2" type="hidden">
			  </div>
			  </form>
		  </div>
		  </div>
		</div>
	</body>
</html>
