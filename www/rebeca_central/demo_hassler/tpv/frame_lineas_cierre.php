<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$suc_cod=$_SESSION["suc_cod"];
$modif="";
$nro_factura=0;

?>

<script>
function eliminar_linea(numlinea,nrofactura,item)
{
	if (confirm(" Desea eliminar el item N° " + item + " ?"))

		
		document.getElementById("frame_datos").src="eliminar_linea.php?nrofactura="+nrofactura+"&numlinea=" + numlinea;
		document.getElementById("formulario_lineas").submit();

}


		var miPopup
		function ver_linea(codigo){
			var codigo
			miPopup = window.open("ver.php?numlinea="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			
			miPopup.focus();
		}
var codcliente1;

</script>
<link rel="stylesheet" href="mm_travel2.css" type="text/css" />
<?php 
include ("../conectar.php");
include("../fecha_hora.php");
			
@$nro_factura=$_POST["nro_fac"];	
$retorno=0;	
if ($modif<>1) {	
if (!isset($nro_factura)) {
	$nro_factura=$_GET["nro_fac"];
	$retorno=1; 
  
  $consulta2="select sum(pro_tot) as total from factura_det where fac_cod='$nro_factura' and borrado='0'";
	$rs_tabla2 = mysql_query($consulta2);
	$costotal=mysql_result($rs_tabla2,0,"total");	

	}
		
			
	if ($retorno==0) {
					
			$aps_cod=$_POST["aps_cod"];	
			$apertura=$_POST["apertura"];
			$cliente=$_POST["codcli"];
			$codigo=$_POST["referencia"];
      $codigopro=$_POST["codigopro"];
		  $cantidad=$_POST["cantidad"];
		 // $cantidad="1.560";
		  
			$precio=$_POST["precio"];
			if ($costotal==""){
      $costototal=round($cantidad*$precio);
      }else{
      $costotal=0;
      }
				
				
		/*					
						$consulta="SELECT count(*) as cuenta from productos WHERE pro_cod='$codigopro'";
						$rs_tabla = mysql_query($consulta);
						$param=mysql_result($rs_tabla,0,"cuenta");		
											
						$sel_insert="INSERT INTO factura_det(fac_cod,ape_cod,pro_cod,pro_bar,pro_can,pro_cos,pro_tot,aps_cod,fecha,hora,usuario,borrado,suc_cod)
						values('$nro_factura','$apertura','$codigopro','$codigo','$cantidad','$precio','$costototal','$aps_cod','$fecha','$hora','$usuario','0','$suc_cod')";
						$rs_insert=mysql_query($sel_insert);
 							
							
								$consulta1="SELECT * from productos WHERE pro_cod='$codigopro'";
								$rs_tabla1 = mysql_query($consulta1)or die();
								@$cantidadproducto=mysql_result($rs_tabla1,0,"pro_can");					
								$calculo=$cantidadproducto-$cantidad;
								
								
								$sel_insert3="update productos set pro_can='$calculo' where pro_cod='$codigopro' ";
								$rs_insert3=mysql_query($sel_insert3);	
							
								$consulta2="select sum(pro_tot) as total from factura_det where fac_cod='$nro_factura' and borrado='0'";
								$rs_tabla2 = mysql_query($consulta2);
								$costotal=mysql_result($rs_tabla2,0,"total");	*/
							
						
						}
					}						  
?>
						
						
						
						
						
<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
<?php 
$sel_lineas="SELECT factura_det.mde_cod,factura_det.pro_cod, factura_det.pro_bar,productos.pro_des, familias_pro.fam_des, factura_det.pro_can, factura_det.pro_cos, factura_det.pro_tot, factura_det.borrado
FROM (factura_det INNER JOIN productos ON factura_det.pro_cod = productos.pro_cod) INNER JOIN familias_pro ON productos.fam_cod = familias_pro.fam_cod
WHERE factura_det.borrado='0' and factura_det.fac_cod='$nro_factura'  order by factura_det.mde_cod desc";

$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"mde_cod");
	$pro_cod=mysql_result($rs_lineas,$i,"pro_cod");
  $pro_bar=mysql_result($rs_lineas,$i,"pro_bar");
	$pro_des=strtoupper(mysql_result($rs_lineas,$i,"pro_des"));
	$fam_des=strtoupper(mysql_result($rs_lineas,$i,"fam_des"));
	$pro_can=mysql_result($rs_lineas,$i,"pro_can");
	$pro_cos=mysql_result($rs_lineas,$i,"pro_cos");
	$pro_tot=number_format(mysql_result($rs_lineas,$i,"pro_tot"), 0, ",", ".");
  $indice=$i+1;
	

	if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } ?>
			<tr class="<? echo $fondolinea?>">
			
    <td width="199"><p><a href="javascript:eliminar_linea('<? echo $numlinea ?>','<? echo $nro_factura ?>','<? echo $indice ?>');" class="navText"><?echo "$indice- $pro_des - $pro_can - $pro_tot";?></a></p>
      <p>-----------------------------</p></td>
		    
      </tr>
<? } ?>
</table>
<script>parent.document.formulario_lineas.referencia.value="000000-0";</script>
<script>parent.document.formulario_lineas.descripcion.value="SIN NOMBRE";</script>
<script>parent.document.formulario_lineas.precio.value="";</script>
<script>parent.document.formulario_lineas.cantidad.value="";</script>
<script>parent.document.formulario_lineas.cantidad.focus();</script>
<script>parent.document.formulario_lineas.total.value="<? echo number_format($costotal, 0, ",", ".");?>";</script>


<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>


