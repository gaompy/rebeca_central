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
function eliminar_linea(numlinea,procod)
{
	if (confirm(" Desea eliminar esta linea ? "))

		
		document.getElementById("frame_datos").src="eliminar_linea.php?procod="+procod+"&numlinea=" + numlinea;
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
<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">
<?php 
include ("../../conectar.php");
include("../../fecha_hora.php");
			
@$procod=$_POST["procod"];	
$retorno=0;	
if (@$modif<>1) {	

if (!isset($procod)) {
	$procod=$_GET["procod"];
	$retorno=1; 

	}
		
			
	if ($retorno==0) {
					
			$procod=$_POST["procod"];	
			$subpro=$_POST["subpro"];
      $pde_des=strtoupper($_POST["descripcion"]);
			$pde_cos=str_replace(".","",($_POST["costo"]));
			$pde_ven=str_replace(".","",($_POST["precio"]));
          /*
				$sql = "select count(*)as cuenta from productos_det 
        where pro_cod='$procod' and borrado='0'"; 
				$query=mysql_query($sql);
				$cuenta=mysql_result($query,0,"cuenta");
        */
          
				if ($pde_des <>""){
					$sel_insert="INSERT INTO productos_det (pro_cod,pde_des,pde_cos,pde_ven, pde_est, fecha, hora, usuario, borrado
	         )VALUES('$procod', '$pde_des', '$pde_cos', '$pde_ven', '0', '$fecha', '$hora', '$usuario', 
	        '0')";
					$rs_insert=mysql_query($sel_insert);
				}
				
				//}  
  			}		
          
       				
?>
						
<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
<?php 
$sel_lineas="SELECT * from productos_det 
WHERE pro_cod = '$procod' and borrado='0'";

$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"pde_cod");
	$pro_cod=mysql_result($rs_lineas,$i,"pro_cod");
  $pde_des=strtoupper(mysql_result($rs_lineas,$i,"pde_des"));
	$pde_cos=number_format(mysql_result($rs_lineas,$i,"pde_cos"), 0, ",", ".");
  $pde_ven=number_format(mysql_result($rs_lineas,$i,"pde_ven"), 0, ",", ".");	

	if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } ?>
			<tr class="<? echo $fondolinea?>">
				<td width="3%"><? echo $i+1?></td>				
				<td width="10%"><? echo $pde_des?></td>			
				<td width="5%"><? echo $pde_cos?></td>
        <td width="5%"><? echo $pde_ven?></td>        
			 <td width="3%"><a href="javascript:eliminar_linea('<?php echo $numlinea;?>','<?php echo $procod;?>')"><img src="../../img/eliminar.png" border="0"></a></td>

			</tr>
<? }    }	?>
</table>
<script>parent.document.formulario_lineas.descripcion.focus();</script>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>


