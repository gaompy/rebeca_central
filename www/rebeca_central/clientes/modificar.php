<?php 
include ("../conectar.php"); 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$variable1=$_GET["variable1"];

$query="SELECT * FROM clientes_view WHERE cli_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"cli_des"));
$variable3=strtoupper(mysql_result($rs_query,0,"cli_ruc"));
$variable4=strtoupper(mysql_result($rs_query,0,"cli_dir"));
$variable5=strtoupper(mysql_result($rs_query,0,"cli_tel"));
$variable6=strtoupper(mysql_result($rs_query,0,"cli_mai"));
$variable7=strtoupper(mysql_result($rs_query,0,"med_cod"));
$variable7_1=strtoupper(mysql_result($rs_query,0,"med_des"));
$variable8=strtoupper(mysql_result($rs_query,0,"tic_cod"));
$variable8_1=strtoupper(mysql_result($rs_query,0,"tic_des"));
$variable9=strtoupper(mysql_result($rs_query,0,"cli_par"));



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
        
        if (document.getElementById("variable2").value=="") mensaje+="  - Descripcion\n";
        if (document.getElementById("variable3").value=="") mensaje+="  - RUC\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Direccion\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Telefono\n";
        if (document.getElementById("variable6").value=="") mensaje+="  - Email\n";
				
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
							<td width="15%">Cliente</td>
						    <td width="43%"><input NAME="variable2" type="text" class="comboGrande" id="variable2" size="45" maxlength="45" value="<?php echo $variable2; ?>"></td>
						<tr>
					<tr>
							<td width="15%">RUC</td>
						    <td width="43%"><input NAME="variable3" type="text"  class="cajaMedia" id="variable3" size="245" maxlength="245" value="<?php echo $variable3; ?>"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>					
						<tr>
							<td width="15%">Direccion</td>
						    <td width="43%"><input NAME="variable4" type="text"   class="cajaGrande" id="variable4" size="245" maxlength="245" value="<?php echo $variable4; ?>"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
            						<tr>
							<td width="15%">Telefono</td>
						    <td width="43%"><input NAME="variable5" type="text"  class="cajaMedia" id="variable5" size="45" maxlength="45" value="<?php echo $variable5; ?>"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
            						<tr>
							<td width="15%">Email</td>
						    <td width="43%"><input NAME="variable6" type="text" class="cajaMedia" id="variable6" size="45" maxlength="45" value="<?php echo $variable6; ?>"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>		

	   <?php
					  $query="SELECT * FROM medios where borrado=0 and med_cod <> '$variable7' ORDER BY med_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Tipo Medios</td>
							<td width="43%"><select id="variable7" name="variable7" class="comboMedio" onChange="buscar()">
							<option value="<?php echo $variable7?>"><?php echo $variable7_1?></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"med_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"med_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>		
		
				        </tr>
				        
				   <?php
					  $query="SELECT * FROM tipo_cliente where borrado='0' and tic_cod <> '$variable8' ORDER BY tic_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Tipo Cliente</td>
							<td width="43%"><select id="variable8" name="variable8" class="comboMedio" onChange="buscar()">
							  <option value="<?php echo $variable8?>"><?php echo $variable8_1?></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"tic_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"tic_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>						        							
      					        
          <tr>
						<td width="15%">Predeterminado</td>
							<td width="43%"><select id="variable9" name="variable9" class="comboPequeno" onChange="buscar()">				
              
            <? 
             if ($variable9==0){
            ?>
              <option value="0">No</option>
              <option value="1">Si</option>
             <?
             }else{
             ?>
              <option value="1">Si</option>

              
             <?
             }
             ?>
            
              
              	</select></td>
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
