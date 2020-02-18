<?php
@@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];

@$modif="";


?>

<script>
function eliminar_linea(numlinea,cli_cod)
{
	if (confirm(" Desea eliminar esta linea ? "))

		
		document.getElementById("frame_datos").src="eliminar_linea.php?cli_cod="+cli_cod+"&numlinea=" + numlinea;
		document.getElementById("formulario_lineas").submit();

}


		var miPopup
		function ver_linea(codigo){
			var codigo
			miPopup = window.open("ver.php?numlinea="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			
			miPopup.focus();
		}


</script>
<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">
<?php 
include ("../../conectar.php");
include("../../fecha_hora.php");
			
@$cli_cod=$_POST["cli_cod"];
$retorno=0;	
if (@$cli_cod<>1) {	

if (!isset($cli_cod)) {
	$cli_cod=$_GET["cli_cod"];
	$retorno=1; 

	}
			
	if ($retorno==0) {
  $cli_cod=$_POST["cli_cod"];
  $variable4=strtoupper($_POST["variable4"]);
  $variable5=strtoupper($_POST["variable5"]);	
  $variable6=strtoupper($_POST["variable6"]);
  $variable7=$_POST["variable7"];	
         
   if ($variable4<>""){
          	$sel_insert="INSERT INTO clientes_det(cli_cod, cld_ced, cld_nom, cld_tel,cld_ema, 
            fecha, hora, usuario)VALUES('$cli_cod', '$variable4', '$variable5', 
            '$variable6','$variable7', '$fecha', '$hora','$usuario')";
						$rs_insert=mysql_query($sel_insert);
 }     
 }		
          
       				
?>
						
						
						
						
						
<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
<?php 
$sel_lineas="select * from clientes_det where borrado=0 and cli_cod='$cli_cod'";

$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"cld_cod");
	$cli_cod=mysql_result($rs_lineas,$i,"cli_cod");
  $cld_ced=mysql_result($rs_lineas,$i,"cld_ced");
	$cld_nom=strtoupper(mysql_result($rs_lineas,$i,"cld_nom"));
	$cld_tel=mysql_result($rs_lineas,$i,"cld_tel");
  $cld_ema=mysql_result($rs_lineas,$i,"cld_ema");
  
  
	if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } ?>
			<tr class="<? echo $fondolinea?>">
				<td width="3%"><? echo $i+1?></td>
				<td width="5%"><? echo $numlinea?></td>
				<td width="10%"><?echo $cld_ced?></td>			
				<td width="5%"><? echo $cld_nom?></td>
        <td width="5%"><? echo $cld_tel?></td>
        <td width="5%"><? echo $cld_ema?></td>
        
			 <td width="3%"><a href="javascript:eliminar_linea('<?php echo $numlinea;?>','<?php echo $cli_cod;?>')"><img src="../../img/eliminar.png" border="0"></a></td>

			</tr>
<? }    }	?>
</table>
<script>parent.document.formulario_lineas.variable4.focus();</script>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>