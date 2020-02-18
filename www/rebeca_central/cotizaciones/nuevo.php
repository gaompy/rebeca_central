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
        if (document.getElementById("variable2").value=="") mensaje+="  - Tipo Moneda\n";
        if (document.getElementById("variable3").value=="") mensaje+="  - Compra\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Venta\n";
          
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
										<tr>
	        <?php
					  $query="SELECT * FROM tipo_moneda where borrado=0  ORDER BY tmo_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Tipos de Monedas</td>
							<td width="43%"><select id="variable2" name="variable2" class="comboMedio" onChange="buscar()">
							<option value=""></option>
								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"tmo_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"tmo_des"))?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
	         	<tr>
							<td width="15%">Compra Gs.</td>
						    <td width="43%"><input NAME="variable3" type="text" class="cajaMedia" id="variable3" size="45"  maxlength="45" onkeyup="format(this)" onchange="format(this)" ></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>					
	         	<tr>
							<td width="15%">Venta</td>
						    <td width="43%"><input NAME="variable4" type="text" class="cajaMedia" id="variable4" size="45"  maxlength="45" onkeyup="format(this)" onchange="format(this)" ></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
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
