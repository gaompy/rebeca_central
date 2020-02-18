<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$suc_cod=$_SESSION["suc_cod"];
@$modif="";


?>

<script>
function eliminar_linea(numlinea,hru_cod,fac_cod,parametro)
{
if (parametro==0){
	if (confirm(" Desea eliminar esta linea ? "))
		document.getElementById("frame_datos").src="eliminar_linea.php?hru_cod="+hru_cod+"&numlinea=" + numlinea+"&fac_cod="+fac_cod;
		document.getElementById("formulario_lineas").submit();
  }else{
    alert("La hoja de ruta esta confirmada, no se puede eliminar dato!")
  
  }    
    
}
		var miPopup
		function ver_linea(codigo){
			var codigo
			miPopup = window.open("ver.php?numlinea="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
}

function limpiar() {

  parent.document.formulario_lineas.variable_1.value="";
  parent.document.formulario_lineas.variable_2.value="";
  parent.document.formulario_lineas.variable_3.value="";
  parent.document.formulario_lineas.variable_4.value="";
  parent.document.formulario_lineas.fac_cod.value="";
  parent.document.formulario_lineas.variable_1.focus();

}


</script>
<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">
<?php 
include ("../../conectar.php");
include("../../fecha_hora.php");
			
@$hru_cod=$_POST["hru_cod"];
@$fac_cod=$_POST["fac_cod"];
@$parametro=$_POST["parametro"];	
$retorno=0;	
if (@$modif<>1) {	

if (!isset($hru_cod)) {
	$hru_cod=$_GET["hru_cod"];
	$retorno=1; 
}
			
if ($retorno==0) {
      $hru_cod=$_POST["hru_cod"];
      $fac_cod=$_POST["fac_cod"];
      
        
        if ($fac_cod <> ""){ 
        	$sql_0 = "select count(*) as cuenta from hruta_det where borrado='0' 
          and fac_cod='$fac_cod'"; 
          $query_0=mysql_query($sql_0);
          $cuenta=mysql_result($query_0,0,"cuenta");
          if ($cuenta==0){     
					  $sql = "insert into hruta_det (hru_cod,fac_cod,fecha,hora,usuario,borrado)
            values('$hru_cod','$fac_cod','$fecha','$hora','$usuario','0')"; 
            $query=mysql_query($sql);

					  $sql_up = "update factura_cab set fac_ent='1',hru_cod='$hru_cod' where fac_cod='$fac_cod' "; 
            $query_up=mysql_query($sql_up);
          }
          }          
    }		
?>
<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
<?php 
$sel_lineas="SELECT * ,
(SELECT fac_num FROM factura_cab WHERE fac_cod=hruta_det.fac_cod) AS fac_num,
(SELECT cli_des FROM clientes WHERE cli_cod=(SELECT cli_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS cli_des,
(CASE (SELECT fac_est FROM factura_cab WHERE fac_cod=hruta_det.fac_cod) WHEN 0 THEN 'Pendiente' WHEN 1 THEN 'Confirmado' END) AS estado,
(SELECT SUM(pro_tot) 
                FROM factura_det 
                WHERE borrado='0' AND fac_cod=(SELECT fac_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS total_normal,

(SELECT REPLACE(FORMAT(SUM(pro_tot),0),',','.') 
                FROM factura_det 
                WHERE borrado='0' AND fac_cod=(SELECT fac_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS total_format
FROM hruta_det WHERE borrado='0' and hru_cod='$hru_cod'";
$rs_lineas=mysql_query($sel_lineas);
$sumatotal=0;

for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"hde_cod");
  $hru_cod=mysql_result($rs_lineas,$i,"hru_cod");
  $fac_cod=mysql_result($rs_lineas,$i,"fac_cod");
  $cli_des=mysql_result($rs_lineas,$i,"cli_des");
  $estado=mysql_result($rs_lineas,$i,"estado");
  $total_normal=mysql_result($rs_lineas,$i,"total_normal");
  $total=mysql_result($rs_lineas,$i,"total_format");
  $sumatotal=$sumatotal+$total_normal;
	
	if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } ?>
			<tr class="<? echo $fondolinea?>">
				<td width="3%"><? echo $i+1?></td>				
				<td width="5%"><? echo $fac_cod?></td>
        <td width="5%"><? echo $cli_des?></td>
        <td width="5%"><? echo $estado?></td>
        <td width="5%"><? echo $total?></td>				
  		 <td width="3%"><a href="javascript:eliminar_linea('<?php echo $numlinea;?>','<?php echo $hru_cod;?>','<?php echo $fac_cod;?>','<?php echo $parametro;?>')"><img src="../../img/eliminar.png" border="0"></a></td>
			</tr>
<? }    }	?>
<?php
					$sql = "update hruta_cab set hru_tot='$sumatotal' where hru_cod='$hru_cod'"; 
          $query=mysql_query($sql);

?>

</table>
<script>
parent.document.formulario.variable5.value="<?echo number_format($sumatotal, 0, ",", ".");?>";
 limpiar();
</script>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>