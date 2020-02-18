<?php  
@session_start();
include ("../conectar.php");
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$variable1=$_GET["variable1"]; 

$variable1=$_GET["variable1"];
$cadena_busqueda=$_GET["cadena_busqueda"];

$query="SELECT * FROM usuarios WHERE id='$variable1'";
$rs_query=mysql_query($query);
$variablex=mysql_result($rs_query,0,"usu");

$query_usu="SELECT * FROM usuarios WHERE id='$variablex'";
$rs_query_usu=mysql_query($query_usu);
$variable_usu=strtoupper(mysql_result($rs_query_usu,0,"usuario"));

$variable2=strtoupper(mysql_result($rs_query,0,"usuario"));
$variable3=mysql_result($rs_query,0,"niv_cod");
$variable4="**********";
$variable5=mysql_result($rs_query,0,"suc_cod");

$query1="SELECT * FROM niveles WHERE niv_cod='$variable3'";
$rs_query1=mysql_query($query1);
$variable13=strtoupper(mysql_result($rs_query1,0,"niv_des"));

$query1="SELECT * FROM sucursales WHERE suc_cod='$variable5'";
$rs_query1=mysql_query($query1);
$variable6=strtoupper(mysql_result($rs_query1,0,"suc_des"));

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
		
                
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
                      }                        
                
          
        }     
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">MODIFICAR Usuario</div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td>C&oacute;digo</td>
							<td><?php echo $variable1 ?></td>
						    <td width="42%" rowspan="13" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="15%">Descripcion</td>
						<td><?php echo $variable2 ?></td>
						    <td width="42%" rowspan="13" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>

				   <?php
					  	$query="SELECT * FROM niveles where borrado=0 ORDER BY niv_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Nivel</td>
							<td width="43%"><select id="variable3" name="variable3" class="comboMedio">
							<option value="<?php echo $variable3; ?>"><?php echo $variable13; ?></option>
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
						
						<td width="15%">Sucursal</td>
							<td width="43%"><select id="variable4" name="variable4" class="comboMedio">
							<option value="<?php echo $variable5; ?>"><?php echo $variable6; ?></option>
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
					<input id="accion" name="accion" value="modificar" type="hidden">
					<input id="id" name="id" value="<?php echo $variable1;?>" type="hidden">
					
			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
