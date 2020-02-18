<?php 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;

include ("../conectar.php"); 
$par=$_GET["par"];
?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
		<script language="javascript">
		
		function cancelar() {
      
      var par='<? echo $par ?>';
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      
      if (par==0) {
      
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;
        
        }else {
      
      location.href="../facturacion/ver_cliente.php?fac_cod="+par;
      
        }   
        
        
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
				<div id="tituloForm" class="header">INSERTAR <?echo $descripcion?> </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">Cliente</td>
						    <td width="43%"><input NAME="variable2" type="text" class="cajaGrande" id="variable2" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="15%">RUC</td>
						    <td width="43%"><input NAME="variable3" type="text" value="--" class="cajaMedia" id="variable3" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>					
						<tr>
							<td width="15%">Direccion</td>
						    <td width="43%"><input NAME="variable4" type="text" value="--"  class="cajaGrande" id="variable4" size="245" maxlength="245"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
            						<tr>
							<td width="15%">Telefono</td>
						    <td width="43%"><input NAME="variable5" type="text" value="--" class="cajaMedia" id="variable5" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
            						<tr>
							<td width="15%">Email</td>
						    <td width="43%"><input NAME="variable6" type="text" value="--"class="cajaMedia" id="variable6" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>		

	   <?php
					  $query="SELECT * FROM medios where borrado=0 ORDER BY med_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Tipo Medios</td>
							<td width="43%"><select id="variable7" name="variable7" class="comboMedio" onChange="buscar()">
							
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
					  $query="SELECT * FROM tipo_cliente ORDER BY tic_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Tipo Cliente</td>
							<td width="43%"><select id="variable8" name="variable8" class="comboMedio" onChange="buscar()">
							
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
              <option value="0">No</option>
              <option value="1">Si</option>
              	</select></td>
				        </tr>											
					 
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="alta" type="hidden">
					<input id="id" name="id" value=variable2 type="hidden">
          <input id="par" name="par" value="<? echo $par ?>" type="hidden">
			  </div>
			  </form>
		  </div>
		  </div>
		</div>
	</body>
</html>
