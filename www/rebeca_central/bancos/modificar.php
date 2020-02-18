<?php 
include ("../conectar.php"); 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$variable1=$_GET["variable1"];

$query="SELECT * FROM bancos_view WHERE ban_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"ban_des"));
$variable3=strtoupper(mysql_result($rs_query,0,"ban_nro"));
$variable4=strtoupper(mysql_result($rs_query,0,"tcu_cod"));
$variable4_1=strtoupper(mysql_result($rs_query,0,"tcu_des"));
$variable5=strtoupper(mysql_result($rs_query,0,"tmo_cod"));
$variable5_1=strtoupper(mysql_result($rs_query,0,"tmo_des"));



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
				var mensaje="";
        
        if (document.getElementById("variable2").value=="") mensaje+="  - Entidad\n";
        if (document.getElementById("variable3").value=="") mensaje+="  - Nro.Cta.\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Tipo Cta.\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Moneda \n";
				
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
							<td width="15%">Entidad</td>
						    <td width="43%"><input NAME="variable2" value="<?echo $variable2?>" type="text" class="cajaGrande" id="variable2" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="15%">Nro.Cta.</td>
						    <td width="43%"><input NAME="variable3" value="<?echo $variable3?>"type="text" value="" class="cajaMedia" id="variable3" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>					
						<tr>
					
				   <?php
					  $query="SELECT * FROM tipo_cuenta where borrado=0 and tcu_cod <> '$variable4' ORDER BY tcu_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Tipo cuenta</td>
							<td width="43%"><select id="variable4" name="variable4" class="comboMedio" onChange="buscar()">
							<option value="<?echo $variable4?>"><?echo $variable4_1?></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"tcu_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"tcu_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>		
		
				        </tr>
				        
				   <?php
					  $query="SELECT * FROM tipo_moneda where borrado='0' and tmo_cod <> '$variable5' ORDER BY tmo_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Tipo Moneda</td>            
							<td width="43%"><select id="variable5" name="variable5" class="comboMedio" onChange="buscar()">
							<option value="<?echo $variable5?>"><?echo $variable5_1?></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"tmo_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"tmo_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>						        				        
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
