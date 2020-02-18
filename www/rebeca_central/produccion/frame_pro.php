<?php

?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,variable4,variable5) {
	parent.opener.document.formulario.variable1.value=variable1;
	parent.opener.document.formulario.variable2.value=variable2;	
	parent.opener.document.formulario.variable3.value=variable3;
	parent.opener.document.formulario.variable4.value=variable4;	
  parent.opener.document.formulario.variable4.value=variable4;
  parent.opener.document.formulario.variable0.value=variable5;
  parent.opener.document.formulario.variable5.focus();		
	parent.window.close();
}

</script>
<?php
include ("../conectar.php"); 
$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
$variable3=$_POST["variable3"];

$where="1=1";


if ($variable1 <> "") { $where.=" AND par_cod='$variable1'"; }
if ($variable2 <> "") { $where.=" AND fam_cod='$variable2'"; }
if ($variable3 <> "") { $where.=" AND pro_des like '%".$variable3."%'"; }
$where.=" order by pro_des";
?>
<body>
<?
	
$consulta="select * from productos_view where borrado='0' AND ".$where;


	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<? if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="5%"><div align="center"><b>Codigo</b></div></td>
			
			<td width="10%"><div align="center"><b>Descripcion</b></div></td>
			<td width="10%"><div align="center"><b>Familia</b></div></td>
			<td width="10%"><div align="center"><b>Costo</b></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
				$variable0=mysql_result($rs_tabla,$i,"pro_cod");
				$variable1=mysql_result($rs_tabla,$i,"pro_bar");
				$variable2=mysql_result($rs_tabla,$i,"pro_des");
				$variable3=mysql_result($rs_tabla,$i,"fam_cod");
				$variable4=mysql_result($rs_tabla,$i,"fam_des");
				$variable5=mysql_result($rs_tabla,$i,"par_cod");
				$variable6=mysql_result($rs_tabla,$i,"par_des");
				$variable7=mysql_result($rs_tabla,$i,"pro_ven");
				$variable8=mysql_result($rs_tabla,$i,"uni_cod");
        $variable9=mysql_result($rs_tabla,$i,"uni_des");


				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
 		<div align="left"><?php echo $variable1;?></div></td>
					<td>
        <div align="left"><?php echo $variable2;?></div></td>
					<td>
        <div align="left"><?php echo $variable4;?></div></td>
						<td>
        <div align="left"><?php echo number_format($variable7, 0, ",",".");?></div></td>	
					<td align="center"><div align="center"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable4; ?>','<?php echo $variable9; ?>','<?php echo $variable0; ?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
			<?php }
		?>
  </table>
		<?php 
		}  ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</body>
</html>
