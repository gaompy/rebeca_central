<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(codcliente,nombre,nif,fecha,par) {
	parent.opener.document.formulario.nro_fac.value=codcliente;
	parent.opener.document.formulario.codcliente.value=codcliente;
	parent.opener.document.formulario.nombre.value=nombre;
	parent.opener.document.formulario.nif.value=nif;
	parent.opener.document.formulario.fecha.value=fecha;
  parent.opener.document.formulario.parametro.value=par;		
		

	parent.window.close();
}

</script>
<? include ("../conectar.php"); 


$variable2=$_POST["variable2"];
$variable6="";
$where="1=1";

if ($variable2 <> "") { $where.=" AND inv_des like '%".$variable2."%'"; }

$where.=" order by inv_cod desc";
?>

<body>
<?
	
	$consulta="SELECT * from inventarios_cab_view where borrado='0' and inv_par >'0' AND ".$where;
	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<? if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="16%"><div align="center"><b>Codigo</b></div></td>
			
			<td width="25%"><div align="center"><b>Descripcion</b></div></td>
			<td width="25%"><div align="center"><b>Fecha</b></div></td>
			<td width="23%"><div align="center"><b>Estado</b></div></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
				$variable1=mysql_result($rs_tabla,$i,"inv_cod");
				$variable2=mysql_result($rs_tabla,$i,"inv_des");
				$variable3=mysql_result($rs_tabla,$i,"inv_fec");
        $variable4=mysql_result($rs_tabla,$i,"par_des");
        $inv_par=mysql_result($rs_tabla,$i,"inv_par");
								

				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
 		<div align="left"><?php echo $variable1;?></div></td>
					<td>
        <div align="left"><?php echo $variable2;?></div></td>
					<td>
        <div align="left"><?php echo $variable3;?></div></td>
		   <td>
		     <div align="left"><?php echo $variable4;?></div></td>
		   <td width="11%" align="center"><div align="center"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable4?>','<?php echo $variable3?>','<?php echo $inv_par?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
