<?php

@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
include ("../conectar.php");
include ("../permisos.php");

$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
$variable3=$_POST["variable3"];
$variable4=$_POST["variable4"];

$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";

if ($variable1 <> "") { $where.=" AND hru_cod='$variable1'"; }
if ($variable2 <> "") { $where.=" AND cam_cod='$variable2'"; }
if ($variable3 <> "") { $where.=" AND cam_cod='$variable3'"; }
if ($variable4 <> "") { $where.=" AND cam_cod='$variable4'"; }




$where.=" ORDER BY hru_cod desc";
$query_busqueda="SELECT count(*) as filas FROM hruta_cab_view WHERE borrado=0 and hru_est='0' AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

if ($_POST["iniciopagina"]==0){

}
else
{



}

?>
<html>
	<head>
		<title>Usuarios</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function ver(variable1) {
			parent.location.href="ver.php?variable1=" + variable1;
		}
		
		function modificar(variable1) {
			parent.location.href="modificar.php?variable1=" + variable1;
		}
		
		function eliminar(variable1) {
			parent.location.href="eliminar.php?variable1=" + variable1;
		}

		function inicio() {
			var numfilas=document.getElementById("numfilas").value;
			var indi=parent.document.getElementById("iniciopagina").value;
			var contador=1;
			var indice=0;
			if (indi>numfilas) { 
				indi=1; 
			}
			parent.document.form_busqueda.filas.value=numfilas;
			parent.document.form_busqueda.paginas.innerHTML="";		
			while (contador<=numfilas) {
				texto=contador + "-" + parseInt(contador+9);
				if (indi==contador) {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
					parent.document.form_busqueda.paginas.options[indice].selected=true;
				} else {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
				}
				indice++;
				contador=contador+10;
			}
		}
		</script>
	</head>

	<body onload=inicio() oncontextmenu="return false">	
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
			<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0 ID="Table1" align="center">
			<input type="hidden" name="numfilas" id="numfilas" value="<?php echo $filas; ?>">
				<?php $iniciopagina=$_POST["iniciopagina"];
				if (empty($iniciopagina)) { $iniciopagina=0; } else { $iniciopagina=$iniciopagina-1;}
				if (empty($iniciopagina)) { $iniciopagina=0; }
				if ($iniciopagina>$filas) { $iniciopagina=0; }
					if ($filas > 0) { ?>
						<?php $sel_resultado="select * from hruta_cab_view WHERE borrado='0' and hru_est='0' AND ".$where;
						   include("sql.php");
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;						   
						   
						   while ($contador < mysql_num_rows($res_resultado)) {
								 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						   <tr class="<?php echo $fondolinea;?>">
						
						
							<td class="aCentro" width="5%"><?php echo $contador+1;?></td>
						  <td width="5%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"hru_cod");?></div></td>
						  <td width="20%"><div align="left"><?php echo strtoupper(mysql_result($res_resultado,$contador,"cam_des"));?></div></td>
              <td width="16%"><div align="left"><?php echo strtoupper(mysql_result($res_resultado,$contador,"cho_des"));?></div></td>
              <td width="14%"><div align="left"><?php echo strtoupper(mysql_result($res_resultado,$contador,"zon_des"));?></div></td>
              <td width="14%"><div align="left"><?php echo strtoupper(mysql_result($res_resultado,$contador,"estado"));?></div></td>
              <td width="16%"><div align="left"><?php echo mysql_result($res_resultado,$contador,"total_1");?></div></td>
													<?php  
							if (@$mod=='0'){
							?>
							<td width="5%"><div align="center"><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"hru_cod")?>)"><img src="../img/modificar.png" width="16" height="16" border="0"  title="Modificar"></a></div></td>
							<?php
							}
							?>
							<td width="5%"><div align="center"><a href="javascript:ver(<?php echo mysql_result($res_resultado,$contador,"hru_cod")?>)"><img src="../img/ver.png" width="16" height="16" border="0"  title="Visualizar"></a></div></td>
							<?php  
							if (@$eli=='0'){
							?>							
							<td width="6%"><div align="center"><a href="javascript:eliminar(<?php echo mysql_result($res_resultado,$contador,"hru_cod")?>)"><img src="../img/eliminar.png" width="16" height="16" border="0"  title="Eliminar"></a></div></td>						
							<?php
							}
							?>
						
						</tr>
						<?php $contador++;
							}
						?>
			  </table>
          <table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="87%" class="mensaje"><?php echo "RESULTADOS OBTENIDOS";?></td>
					    </tr>
					</table>            
					<?php } else { ?>
					<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="100%" class="mensaje"><?php echo "No hay ning&uacute;n tipo que cumpla con los criterios de b&uacute;squeda";?></td>
					    </tr>
					</table>					
					<?php } ?>					
			  </div>
		  </div>
    </div>			
		</div>
	</body>
</html>
