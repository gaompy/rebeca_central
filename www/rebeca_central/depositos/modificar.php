<?php 
include ("../conectar.php"); 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$variable1=$_GET["variable1"];

$query="SELECT *,(select suc_des from sucursales where suc_cod=depositos.suc_cod) as suc_des FROM depositos WHERE dep_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"dep_des"));
$variable3=strtoupper(mysql_result($rs_query,0,"suc_cod"));
$variable3_1=strtoupper(mysql_result($rs_query,0,"suc_des"));



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
        if (document.getElementById("variable3").value=="") mensaje+="  - Sucursales\n";

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
							<td width="15%">Descripcion</td>
						    <td width="43%"><input NAME="variable2" type="text" class="comboGrande" id="variable2" size="45" maxlength="45" value="<?php echo $variable2; ?>"></td>
						<tr>
											
  		  <?php
					  $query="SELECT * FROM sucursales where suc_cod <> '$variable3' and  borrado='0' order by suc_des ASC";
						$res=mysql_query($query);
						$contador=0;
					  ?>						
						
						<td width="15%">Sucursales</td>
							<td width="43%"><select id="variable3" name="variable3" class="comboMedio" onChange="buscar()">
							<option value="<?echo $variable3?>"><?echo $variable3_1?></option>
              
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
