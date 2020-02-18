<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style2 {color: #FFFFFF}
.style3 {color: #FFFFFF; font-weight: bold; }
-->
</style>
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,variable4) {
	parent.opener.document.form_busqueda.variable1.value=variable1;
	parent.opener.document.form_busqueda.variable2.value=variable2;
	parent.opener.document.form_busqueda.variable3.value=variable3;
	parent.opener.document.form_busqueda.variable4.value=variable4;


	parent.window.close();
}

</script>
<?php include ("../conectar.php"); ?>
<body>
<?php
	

//	$consulta="SELECT * FROM tipo_profesor WHERE borrado=0 ORDER BY tipo_cod ASC";
	$consulta="SELECT * from usuarios WHERE borrado=0 order by usuario";

	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="15%"><div align="center" class="style3">Codigo</div></td>
			<td width="38%"><div align="center" class="style1 style2">Descripcion</div></td>

			
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
				$variable1=mysql_result($rs_tabla,$i,"id");
				$variable2=mysql_result($rs_tabla,$i,"usuario");
				$variable3=mysql_result($rs_tabla,$i,"niv_cod");		
				$variable4=mysql_result($rs_tabla,$i,"suc_cod");		

			
				
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $variable1;?></div></td>
					<td>
        <div align="left"><?php echo utf8_encode($variable2);?></div></td>
		
					<td>

   <td>
					
						  <td align="center"><div align="center"><a href="javascript:pon_prefijo(<?php echo $variable1?>,'<?php echo $variable2?>','<?php echo $variable3?>','<?php echo $variable4?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
