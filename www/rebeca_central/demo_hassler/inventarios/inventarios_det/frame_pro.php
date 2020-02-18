
<html>
<head>
<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>

<style type="text/css">
a {color:black; text-decoration:none}
</style>

<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,codigopro, variable8) {
  parent.opener.document.formulario_lineas.referencia.value=variable1;
  parent.opener.document.formulario_lineas.descripcion.value=variable2;
  parent.opener.document.formulario_lineas.costo.value=variable3;
  parent.opener.document.formulario_lineas.pro_cod.value=codigopro;
  parent.opener.document.formulario_lineas.precio.value=variable8; 
   parent.opener.document.formulario_lineas.cantidad.value="";
  parent.opener.document.formulario_lineas.cantidad.focus();
  
  /*
 

  parent.opener.document.formulario_lineas.variable8.value=variable3;
 */

  parent.window.close();
}

</script>
<?php
include ("../../conectar.php"); 
$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
$variable3=$_POST["variable3"];

$where="1=1";

if ($variable1 <> "") { $where.=" AND par_cod='$variable1'"; }
if ($variable2 <> "") { $where.=" AND fam_cod='$variable2'"; }

if ($variable3 <> "") { $where.=" AND pro_des like '%".$variable3."%'"; }
$where.=" order by pro_des";

$consulta="select * from productos_view where borrado='0'  AND ".$where;


	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<? if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b>Codigo</b></div></td>
			
			<td width="50%"><div align="center"><b>Descripcion</b></div></td>
			<td width="23%"><div align="center"><b>Familia</b></div></td>
			<td width="22%"><div align="center"><b>Costo</b></div></td>
      <td width="22%"><div align="center"><b>Precio</b></div></td>
        	<td width="7%"><div align="center"><b>Aceptar</b></div></td>
			<td width="2%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
        $codigopro=mysql_result($rs_tabla,$i,"pro_cod");				
				$variable1=mysql_result($rs_tabla,$i,"pro_bar");
				$variable2=mysql_result($rs_tabla,$i,"pro_des");
				$variable3=mysql_result($rs_tabla,$i,"fam_cod");
				$variable4=strtoupper(mysql_result($rs_tabla,$i,"fam_des"));
				$variable5=mysql_result($rs_tabla,$i,"par_cod");
				$variable6=mysql_result($rs_tabla,$i,"par_des");
        $variable7=number_format(mysql_result($rs_tabla,$i,"pro_cos"), 0, ",", ".");
        $variable8=number_format(mysql_result($rs_tabla,$i,"pro_ven"), 0, ",", ".");        
				

				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
				<tr class="<?php echo $fondolinea?>">
					<td><div align="left"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable7; ?>','<?php echo $codigopro; ?>','<?php echo $variable8; ?>')"><?php echo "<b>".$variable1."</b>";?></a></div></td>
					<td><div align="left"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable7; ?>','<?php echo $codigopro; ?>','<?php echo $variable8; ?>')"><?php echo $variable2;?></a></div></td>
					<td><div align="left"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable7; ?>','<?php echo $codigopro; ?>','<?php echo $variable8; ?>')"><?php echo $variable4;?></a></div></td>
					<td><div align="right"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable7; ?>','<?php echo $codigopro; ?>','<?php echo $variable8; ?>')"><?php echo $variable7;?></a></div></td>	
					<td><div align="right"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable7; ?>','<?php echo $codigopro; ?>','<?php echo $variable8; ?>')"><?php echo $variable8;?></a></div></td>	
					<td align="center"><div align="center"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable7; ?>','<?php echo $codigopro; ?>','<?php echo $variable8; ?>')"><img src="../../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
			<?php }?>
  </table>
		<?php }  ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</body>
</html>
