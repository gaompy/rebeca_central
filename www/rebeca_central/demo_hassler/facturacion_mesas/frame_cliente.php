<?php
header('Cache-Control: no-cache');
header('Pragma: no-cache'); 
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,variable4,variable4_1,variable4_2,variable5) {
	parent.opener.document.formulario.variable1.value=variable1;
  parent.opener.document.formulario.variable2.value=variable2;
  parent.opener.document.formulario.variable3.value=variable3;
  parent.opener.document.formulario.variable4.value=variable4_1;
  parent.opener.document.formulario_lineas.cli_cod.value=variable1;
  parent.opener.document.formulario_lineas.variable6.focus();
  parent.opener.document.formulario_lineas.variable6.focus();
  parent.opener.document.getElementById("formulario_lineas").submit();
  
 	parent.window.close();
}


</script>
<? include ("../conectar.php"); 

$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
$fac_cod=$_POST["fac_cod"];
$variable6="";
$where="1=1";
if ($variable1 <> "") { $where.=" AND cli_ruc like '%".$variable1."%'"; }
if ($variable2 <> "") { $where.=" AND cli_des like '%".$variable2."%'"; }

$where.=" order by cli_des";
?>

<body>
<?
	
	$consulta="SELECT * from clientes_view WHERE borrado='0' AND ".$where;
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
			<td width="10%"><div align="center"><b>RUC</b></div></td>
			<td width="10%"><div align="center"><b>Tipo Cliente</b></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
		    $cli_cod=mysql_result($rs_tabla,$i,"cli_cod");
        $cli_des=mysql_result($rs_tabla,$i,"cli_des");	
		    $cli_ruc=mysql_result($rs_tabla,$i,"cli_ruc");
		    $tic_cod=mysql_result($rs_tabla,$i,"tic_cod");
		    $tic_des=mysql_result($rs_tabla,$i,"tic_des");
        $tic_por=mysql_result($rs_tabla,$i,"tic_por");	
				
								
				

				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
			<tr class="<?php echo $fondolinea?>">
				<td>
 		   <div align="left"><?php echo $cli_cod;?></div></td>
					<td>
        <div align="left"><?php echo $cli_des;?></div></td>
					<td>
        <div align="left"><?php echo $cli_ruc;?></div></td>
		  <td>
        <div align="left"><?php echo $tic_des;?></div></td>	
					<td align="center"><div align="center"><a href="javascript:pon_prefijo('<? echo $cli_cod ?>','<? echo $cli_des ?>','<? echo $cli_ruc ?>','<? echo $tic_cod ?>','<? echo $tic_des ?>','<? echo $tic_por?>','<? echo $fac_cod?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
