<?php
include ("../conectar.php");
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=33;
include ("../permisos.php");

$variable1=$_POST["variable1"];

$variable3=$_POST["variable3"];


$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($variable1 <> "") { $where.=" AND pro_cod='$variable1'"; }
if ($variable3 <> "") { $where.=" AND mat_cod='$variable3'"; }




$where.=" ORDER BY pro_cod ASC";
$query_busqueda="SELECT count(*) as filas FROM material_det WHERE borrado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

if ($_POST["iniciopagina"]==0){

}
else
{
//include("tmp.php");
}

?>
<html>
	<head>
		<title>Usuarios</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		/*
		function ver_tipo(variable1) {
			parent.location.href="ver.php?variable1=" + variable1;
		}*/
		
		function modificar_tipo(variable1) {
			parent.location.href="modificar.php?variable1=" + variable1;
		}
		
		function eliminar_tipo(variable1) {
			parent.location.href="eliminar.php?variable1=" + variable1;
		}
		
		
		var miPopup
		function modificar_material(codigo){
			var codigo
			miPopup = window.open("modificar_material.php?numlinea="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			
			miPopup.focus();
		}		
		
		
		var miPopup
		function ver_tipo(codigo){
			var codigo
			miPopup = window.open("rep_material.php?numlinea="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			
			miPopup.focus();
		}				
		
		var miPopup
		function eliminar_linea(codigo){
			var codigo
			miPopup = window.open("eli_material.php?numlinea="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			
			miPopup.focus();
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

	<body onload=inicio()>	
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
						<?php $sel_resultado="SELECT * FROM material_det WHERE borrado=0 AND ".$where;
						   include("sql.php");
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;						   
   
						   
						   while ($contador < mysql_num_rows($res_resultado)) {
								 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea;?>">
						
							<?php
								$mde_cod=mysql_result($res_resultado,$contador,"mde_cod");
								$pro_cod=mysql_result($res_resultado,$contador,"pro_cod");
								$mat_cod=mysql_result($res_resultado,$contador,"mat_cod");
								
								
								$consulta="SELECT * from proveedores WHERE pro_cod='$pro_cod'";
								$rs_tabla = mysql_query($consulta);
								$nrs=mysql_num_rows($rs_tabla);
								$pro_des=mysql_result($rs_tabla,0,"pro_des");
							
								$consulta1="SELECT * from materiales WHERE mat_cod='$mat_cod'";
								$rs_tabla1 = mysql_query($consulta1);
								$nrs1=mysql_num_rows($rs_tabla1);
								$mat_des=mysql_result($rs_tabla1,0,"mat_des");
							
							?>
						
						
							<td class="aCentro" width="8%"><?php echo $contador+1;?></td>
							<td width="1%"><div align="left"><?php echo $mde_cod?></div></td>
							<td width="10%"><div align="left"><?php echo strtoupper($mat_des);?></div></td>
							<td width="20%"><div align="left"><?php echo strtoupper($pro_des);?></div></td>


							<?php  
							if (@$mod=='0'){
							?>
							<td width="5%"><div align="center"><a href="#"><img src="../img/modificar.png" width="16" height="16" border="0" onClick="modificar_material(<?php echo mysql_result($res_resultado,$contador,"mde_cod")?>)" title="Modificar"></a></div></td>
							<?php
							}
							?>
							<td width="5%"><div align="center"><a href="#"><img src="../img/ver.png" width="16" height="16" border="0" onClick="ver_tipo(<?php echo mysql_result($res_resultado,$contador,"mde_cod")?>)" title="Visualizar"></a></div></td>
							<?php  
							if (@$eli=='0'){
							?>							
							<td width="6%"><div align="center"><a href="#"><img src="../img/eliminar.png" width="16" height="16" border="0" onClick="eliminar_linea(<?php echo mysql_result($res_resultado,$contador,"mde_cod")?>)" title="Eliminar"></a></div></td>						
							<?php
							}
							?>
						
						
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
