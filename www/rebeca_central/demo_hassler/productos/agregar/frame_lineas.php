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
      $cantidad=$_POST["cantidad"];
      $precio=str_replace(".","",($_POST["precio"]));

					$sql = "select count(*)as cuenta from recetas where pro_cod='$procod' and spr_cod='$subpro'
          and borrado='0'"; 
          $query =mysql_query($sql);
          $cuenta=mysql_result($query,0,"cuenta");
          
          if ($cuenta==0){
          	$sel_insert="insert into recetas(pro_cod,spr_cod,rec_can,rec_pre,fecha,hora,usuario,borrado)
            values('$procod','$subpro','$cantidad','$precio','$fecha','$hora','$usuario','0')";
						$rs_insert=mysql_query($sel_insert);
          }else{
           	 ?>
             <script>
	               alert ("No puede agregar el mismo producto en la misma composicion!");	
	           </script>
          
           <?
          }  
  				
          }		
          
       				
?>
						
						
						
						
						
<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
<?php 
$sel_lineas="SELECT *,
(SELECT pro_des FROM productos_view WHERE pro_cod=recetas.spr_cod)AS pro_des, 
(SELECT pro_bar FROM productos_view WHERE pro_cod=recetas.spr_cod)AS pro_bar,
(SELECT uni_des FROM productos_view WHERE pro_cod=recetas.spr_cod)AS uni_des,
(SELECT fam_des FROM productos_view WHERE pro_cod=recetas.spr_cod)AS fam_des,
(SELECT par_des FROM productos_view WHERE pro_cod=recetas.spr_cod)AS par_des,
(SELECT pro_can FROM productos_view WHERE pro_cod=recetas.spr_cod)AS pro_can
FROM recetas
WHERE pro_cod = '$procod' and borrado='0'";

$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"rec_cod");
	$pro_cod=mysql_result($rs_lineas,$i,"pro_cod");
  $pro_bar=mysql_result($rs_lineas,$i,"pro_bar");
	$pro_des=strtoupper(mysql_result($rs_lineas,$i,"pro_des"));
	$rec_can=mysql_result($rs_lineas,$i,"rec_can");
  $pro_can=mysql_result($rs_lineas,$i,"pro_can");
  $uni_des=mysql_result($rs_lineas,$i,"uni_des");
  $fam_des=mysql_result($rs_lineas,$i,"fam_des");
  $par_des=mysql_result($rs_lineas,$i,"par_des");	

	if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } ?>
			<tr class="<? echo $fondolinea?>">
				<td width="3%"><? echo $i+1?></td>
				<td width="5%"><? echo $pro_bar?></td>
				<td width="10%"><? echo $pro_des?></td>			
				<td width="5%"><? echo $rec_can?></td>
        <td width="5%"><? echo $pro_can?></td>
        <td width="5%"><? echo $fam_des?></td>
        <td width="5%"><? echo $par_des?></td>
        
        	<td width="5%"><? echo $uni_des?></td>
			 <td width="3%"><a href="javascript:eliminar_linea('<?php echo $numlinea;?>','<?php echo $procod;?>')"><img src="../../img/eliminar.png" border="0"></a></td>

			</tr>
<? }    }	?>
</table>
<script>parent.document.formulario_lineas.referencia.focus();</script>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>


