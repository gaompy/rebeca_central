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
        if (document.getElementById("variable2").value=="") mensaje+="  - Codigo Barras\n";
        if (document.getElementById("variable3").value=="") mensaje+="  - Descripcion\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Costo\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Venta\n";
        if (document.getElementById("variable6").value=="") mensaje+="  - Stock inicial\n";
        if (document.getElementById("variable7").value=="") mensaje+="  - Impuesto\n";
        if (document.getElementById("variable8").value=="") mensaje+="  - Tipo Producto\n";
        if (document.getElementById("variable9").value=="") mensaje+="  - Familia\n";
        if (document.getElementById("variable10").value=="") mensaje+="  - Unidades de Med.\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
                if (isNaN(document.getElementById("variable6").value)==true) {
									alert ("El campo debe ser numerico!");									
								}else{
                 if (isNaN(document.getElementById("variable7").value)==true) {
									alert ("El campo debe ser numerico!");									
                  }else{
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
                      } 
                      }                       
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
							<td width="15%">Codig Barras</td>
						    <td width="43%"><input NAME="variable2" type="text" class="cajaMedia" id="variable2" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="15%">Descripcion</td>
						    <td width="43%"><input NAME="variable3" type="text" value="" class="cajaGrande" id="variable3" size="245" maxlength="245"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>					
						<tr>
							<td width="15%">Costo</td>
						    <td width="43%"><input NAME="variable4" type="text" value="0"  onkeyup="format(this)" onchange="format(this)" class="cajaPequena" id="variable4" size="245" maxlength="245"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
            						<tr>
							<td width="15%">Venta</td>
						    <td width="43%"><input NAME="variable5" type="text" value="0" onkeyup="format(this)" onchange="format(this)" class="cajaPequena" id="variable5" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
           <tr>
							<td width="15%">Stock Inicial</td>
						    <td width="43%"><input NAME="variable6" type="text" value="0"class="cajaMedia" id="variable6" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
            
            
			     <tr>
							<td width="15%">Impuesto</td>
						    <td width="43%"><input NAME="variable7" type="text" value="0"class="cajaMedia" id="variable7" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>		            		

	        <?php
					  $query="SELECT * FROM parametro where borrado='0' order by par_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Tipo Producto</td>
							<td width="43%"><select id="variable8" name="variable8" class="comboMedio" onChange="buscar()">
							  	<option value=""></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"par_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"par_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>		
		
				        </tr>
				        
				   <?php
					  $query="SELECT * FROM familias_pro where borrado='0' ORDER BY fam_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Categorias</td>
							<td width="43%"><select id="variable9" name="variable9" class="comboMedio" onChange="buscar()">
							 <option value=""></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"fam_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"fam_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<tr>						        
				                    				
	  <?php
					  $query="SELECT * FROM unidades where borrado='0' ORDER BY uni_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Unidades de Medida</td>
							<td width="43%"><select id="variable10" name="variable10" class="comboMedio" onChange="buscar()">
							  <option value=""></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"uni_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"uni_des"))?></option>
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
					<input id="id" name="id" value=variable2 type="hidden">
			  </div>
			  </form>
		  </div>
		  </div>
		</div>
	</body>
</html>
