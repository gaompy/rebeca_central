
<html>
<head>
<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<style type="text/css">
a {color:black; text-decoration:none}
</style>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,variable4) {
  
  parent.opener.document.formulario_lineas.variable_1.value=variable1;
  parent.opener.document.formulario_lineas.variable_2.value=variable2;
  parent.opener.document.formulario_lineas.variable_3.value=variable3;
  parent.opener.document.formulario_lineas.variable_4.value=variable4;
  parent.opener.document.formulario_lineas.fac_cod.value=variable1;
  parent.opener.document.getElementById("formulario_lineas").submit();
  location.href="ver_pro.php";
  //document.getElementById("form2").submit();
  
  //limpiar();
	//parent.window.close();
}


</script>
<?php
include ("../../conectar.php"); 
@$variable1=$_POST["variable3"];
$where="1=1";
if ($variable1 <> "") { $where.=" AND (SELECT cli_des FROM clientes WHERE cli_cod=factura_cab.cli_cod) like '%".$variable1."%'"; }
$where.=" order by fac_cod ";
?>
<body>
     
     <div align="left" class="fuente8" width="98%"><strong><?php echo ""?> </strong></div>

     </td>				
<?
	
$consulta="select *,
(SELECT cli_des FROM clientes WHERE cli_cod=factura_cab.cli_cod) AS cli_des,
(CASE fac_est WHEN 0 THEN 'Pendiente' WHEN 1 THEN 'Confirmado' END) AS estado,
(SELECT REPLACE(FORMAT(SUM(pro_tot),0),',','.') 
                FROM factura_det 
                WHERE borrado='0' AND fac_cod=factura_cab.fac_cod) AS total_format                 
from factura_cab where borrado='0' and fac_ent='0' AND ".$where;

	$rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form2" name="form2">
<? if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b>Pedido</b></div></td>			
			<td width="21%"><div align="center"><b>Clientes</b></div></td>
			<td width="23%"><div align="center"><b>Estados</b></div></td>
      <td width="23%"><div align="center"><b>Total</b></div></td>
      <td width="7%"><div align="center"><b>Aceptar</b></div></td>
			<td width="2%"><div align="center"></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
        $variable1=mysql_result($rs_tabla,$i,"fac_cod");				
				$variable2=mysql_result($rs_tabla,$i,"cli_des");
				$variable3=mysql_result($rs_tabla,$i,"estado");
			  $variable4=mysql_result($rs_tabla,$i,"total_format");

				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
					<tr class="<?php echo $fondolinea?>">
					<td><div align="left"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable3?>','<?php echo $variable4?>')"><b><?php echo $variable1;?></b></div></td>
					<td><div align="left"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable3?>','<?php echo $variable4?>')"><?php echo $variable2;?></a></div></td>
					<td><div align="left"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable3?>','<?php echo $variable4?>')"><?php echo $variable3;?></a></div></td>
					<td><div align="left"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable3?>','<?php echo $variable4?>')"><?php echo $variable4;?></a></div></td>
					<td><div align="left"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable3?>','<?php echo $variable4?>')"><img src="../../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
				  </tr>
			<?php }?>
  </table>
		<?php } ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</body>
</html>
