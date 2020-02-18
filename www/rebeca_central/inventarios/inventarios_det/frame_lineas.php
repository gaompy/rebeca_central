<?php
@@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$suc_cod=$_SESSION["suc_cod"];
@$modif="";
$nro_factura=0;

?>

<script>
function eliminar_linea(numlinea,nrofactura,param)
{

	if (param==0){
	
	if (confirm(" Desea eliminar esta linea ? "))
		document.getElementById("frame_datos").src="eliminar_linea.php?nrofactura="+nrofactura+"&numlinea=" + numlinea;
		document.getElementById("formulario_lineas").submit();
	}else{

alert("No puede modificar Inventario!");
}

}


		var miPopup
		function modificar_linea(codigo){
			var codigo
			/*miPopup = window.open("modificar_material.php?numlinea="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			
			miPopup.focus();*/
      
      location.href="modificar_material.php?numlinea="+codigo;
		}
var codcliente1;

</script>
<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">
<?php 
include ("../../conectar.php");
include("../../fecha_hora.php");
			
@$nro_factura=$_POST["codcliente1"];	
@$parame=$_POST["param"];
$retorno=0;	
if (@$modif<>1) {	
if (!isset($nro_factura)) {
	$nro_factura=$_GET["codcliente1"];
	$retorno=1; 
	}
		
			
	if ($retorno==0) {
					
			$cliente=$_POST["codcli"];
			$codigo=$_POST["referencia"];
		  $cantidad=$_POST["cantidad"];
		  $pro_cod=$_POST["pro_cod"];		  
      $precio=str_replace(".","",($_POST["precio"]));
			$costototal=$cantidad*$precio;

											
						 if ($codigo<>"") {
             
                  $sel_insert=" INSERT INTO inventario_det 	( 	inv_cod, 	pro_cod, 	pro_can, 	
                  pro_cos, 	pro_tot, 	fecha, 	hora, 	usuario, 	borrado 	) 	
                  VALUES 	( 	'$nro_factura', 	'$pro_cod', 	'$cantidad', 	
                  '$precio', 	'$costototal', 	'$fecha', 	'$hora', 	'$usuario', 	'0' 	)";
						      $rs_insert=mysql_query($sel_insert);
              	
                }
							
								$consulta2="select sum(pro_tot) as total from inventario_det where inv_cod='$nro_factura' and borrado='0'";
								$rs_tabla2 = mysql_query($consulta2);
								$costotal=mysql_result($rs_tabla2,0,"total");	

							
						
					}
					}						
?>
						
						
						
						
						
<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
<?php 
$sel_lineas="SELECT * FROM inventarios_det_view WHERE borrado=0 AND inv_cod='$nro_factura' 
ORDER BY mde_cod desc";
$costotal=0;
$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"mde_cod");
	$pro_cod=mysql_result($rs_lineas,$i,"pro_bar");
	$pro_des=strtoupper(mysql_result($rs_lineas,$i,"pro_des"));
	$fam_des=strtoupper(mysql_result($rs_lineas,$i,"fam_des"));
	$pro_can=mysql_result($rs_lineas,$i,"pro_can");
	$pro_cos=mysql_result($rs_lineas,$i,"pro_cos");
	$pro_tot=mysql_result($rs_lineas,$i,"pro_tot");
  $costotal=$costotal+$pro_tot

//	if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } ?>
		<!--	<tr class="<? echo $fondolinea?>"> -->
				<td width="10%"><? echo $i+1?></td>
				<td width="12%"><? echo $pro_cod?></td>
				<td width="24%"><? echo $pro_des?></td>
				<td width="15%"><? echo $pro_can?></td>
				<td width="13%"><? echo number_format($pro_cos, 0, ",", ".")?></td>
				<td width="10%"><? echo number_format($pro_tot, 0, ",", ".");?></td>
				
      	<td width="8%"><a href="javascript:eliminar_linea('<?php echo $numlinea;?>','<?php echo $nro_factura;?>','<?php echo $parame;?>')"><img src="../../img/eliminar.png" border="0"></a></td>

			
			</tr>
<? } ?>
</table>
<script>parent.document.formulario_lineas.referencia.focus();</script>
<script>parent.document.formulario_lineas.total.value="<? echo number_format($costotal, 0, ",", ".");?>";</script>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>


