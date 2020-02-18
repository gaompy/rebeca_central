<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,variable5,fecha,fac_cod,fac_num,par,estado) {
	parent.opener.document.formulario.variable1.value=variable1;
  parent.opener.document.formulario.variable2.value=variable2;
  parent.opener.document.formulario.variable3.value=variable3;
  parent.opener.document.formulario_lineas.estado.value=estado;
  parent.opener.document.formulario_lineas.variable5.value=fecha;
  parent.opener.document.formulario_lineas.cli_cod.value=variable1;
  parent.opener.document.formulario_lineas.fac_num.value=fac_num;
  if (par==0){
    parent.opener.document.formulario_lineas.fac_cod.value=fac_cod;
    parent.opener.document.formulario.variable0.value=fac_cod;
  }
  parent.opener.document.formulario_lineas.variable6.focus();
  parent.opener.document.formulario_lineas.variable6.focus();
  parent.opener.document.getElementById("formulario_lineas").submit();
 	parent.window.close();
}



</script>
<? include ("../conectar.php"); 

$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
$fac_num=$_POST["fac_cod"];

$where="1=1";
if ($variable1 <> "") { $where.=" AND prv_ruc like '%".$variable1."%'"; }
if ($variable2 <> "") { $where.=" AND prv_des like '%".$variable2."%'"; }

$where.=" order by prv_des";
?>

<body>
<?
$consulta="SELECT * ,
(SELECT prv_des FROM proveedores WHERE prv_cod=compra_cab.prv_cod)AS prv_des,
(SELECT prv_ruc FROM proveedores WHERE prv_cod=compra_cab.prv_cod)AS prv_ruc
FROM compra_cab WHERE borrado='0' AND fac_num='$fac_num' and ".$where;
$rs_tabla = mysql_query($consulta);
@$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<? if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b>Codigo</b></div></td>			
			<td width="60%"><div align="center"><b>Descripcion</b></div></td>
			<td width="14%"><div align="center"><b>RUC</b></div></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
		        $fac_cod=mysql_result($rs_tabla,$i,"fac_cod");
            $prv_cod=mysql_result($rs_tabla,$i,"prv_cod");
            $prv_des=mysql_result($rs_tabla,$i,"prv_des");	
		        $prv_ruc=mysql_result($rs_tabla,$i,"prv_ruc");
            $fac_est=mysql_result($rs_tabla,$i,"fac_est");
            $fecha=mysql_result($rs_tabla,$i,"fecha");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
			<tr class="<?php echo $fondolinea?>">
				<td>
 		   <div align="left"><?php echo $prv_cod;?></div></td>
					<td>
        <div align="left"><?php echo $prv_des;?></div></td>
					<td>
        <div align="left"><?php echo $prv_ruc;?></div></td>
		  <td width="16%" align="center"><div align="center"><a href="javascript:pon_prefijo('<? echo $prv_cod ?>','<? echo $prv_des ?>','<? echo $prv_ruc ?>','<? echo $fac_cod?>','<? echo $fecha?>','<? echo $fac_cod?>','<? echo $fac_num?>','0','<? echo $fac_est?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
        </tr>
			<?php }
		?>
  </table>
		<? 
		}else{
    
    
$consulta=" SELECT * FROM proveedores WHERE borrado='0' AND ".$where;
$rs_tabla = mysql_query($consulta);
$nrs=mysql_num_rows($rs_tabla); 
    
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<? if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b>Codigo</b></div></td>			
			<td width="60%"><div align="center"><b>Descripcion</b></div></td>
			<td width="14%"><div align="center"><b>RUC</b></div></td>
		  </tr>
		<?php
			for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
		    
        $prv_cod=mysql_result($rs_tabla,$i,"prv_cod");
        $prv_des=mysql_result($rs_tabla,$i,"prv_des");	
		    $prv_ruc=mysql_result($rs_tabla,$i,"prv_ruc");
        $fecha="";
        $fac_cod=0;
        $fac_est=0;
        
		if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
			<tr class="<?php echo $fondolinea?>">
				<td>
 		   <div align="left"><?php echo $prv_cod;?></div></td>
					<td>
        <div align="left"><?php echo $prv_des;?></div></td>
					<td>
			  <div align="left"><?php echo $prv_ruc;?></div></td>
		  <td width="16%" align="center"><div align="center"><a href="javascript:pon_prefijo('<? echo $prv_cod ?>','<? echo $prv_des ?>','<? echo $prv_ruc ?>','<? echo $fac_cod?>','<? echo $fecha?>','<? echo $fac_cod?>','<? echo $fac_num?>','1','<? echo $fac_est?>')"><img src="../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
        </tr>
			<?php }
		?>
  </table>
		<? 
		} }?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</body>
</html>
