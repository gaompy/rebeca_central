<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3) {
	parent.opener.document.form_busqueda.variable1.value=variable1;
	parent.opener.document.form_busqueda.variable2.value=variable2;
	parent.opener.document.form_busqueda.variable3.value=variable3;

	parent.window.close();
}

</script>
<?php include ("../conectar.php"); ?>
<body oncontextmenu="return false">
<?php
	


	$consulta="select * from presupuesto_cab order by pre_des";

	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="15%"><div align="center"><b>Codigo</b></div></td>
			<td width="20%"><div align="center"><b>Descripcion</b></div></td>
			<td width="20%"><div align="center"><b>Fecha</b></div></td>
			<td width="15%"><div align="center"><b>Estado</b></div></td>

			
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
				$variable1=mysql_result($rs_tabla,$i,"pre_cod");
				$variable2=mysql_result($rs_tabla,$i,"pre_des");
				$variable3=mysql_result($rs_tabla,$i,"pre_par");
				$variable5=mysql_result($rs_tabla,$i,"pre_fec");
				
				if ($variable3==0){
				$variable4="PENDIENTE";
				}else{
				$variable4="CONFIRMADO";
				}
				
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $variable1;?></div></td>
					<td>
        <div align="left"><?php echo $variable2;?></div></td>
					<td>
        <div align="left"><?php echo $variable5;?></div></td>				
					<td>
        <div align="left"><?php echo $variable4;?></div></td>				
					<td>
   <td>
					
										<td align="center"><div align="center"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable5?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
