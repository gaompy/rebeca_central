
<html>
<head>
<link href="../../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,codigopro,cuenta) {
  
  if (cuenta==0){
  parent.opener.document.formulario_lineas.pro_cod.value=codigopro;
  parent.opener.document.formulario_lineas.referencia.value=variable1;
  parent.opener.document.formulario_lineas.descripcion.value=variable2;
  parent.opener.document.formulario_lineas.precio.value=variable3;
  
  //parent.opener.document.formulario_lineas.variable9.value="";
  parent.opener.document.formulario_lineas.cantidad.focus();
  parent.window.close();
  }else{
  location.href="frame_pro.php?cuenta="+cuenta+"&codigopro="+codigopro;
  }
}

</script>
<?php
include ("../../conectar.php"); 
@$conteo=$_GET["cuenta"];
@$codigopro=$_GET["codigopro"];
@$variable1=$_POST["variable1"];
@$variable2=$_POST["variable2"];
@$variable3=$_POST["variable3"];

$where="1=1";

if ($variable1 <> "") { $where.=" AND par_cod='$variable1'"; }
if ($variable2 <> "") { $where.=" AND fam_cod='$variable2'"; }
if ($variable3 <> "") { $where.=" AND pro_des like '%".$variable3."%'"; }
$where.=" order by pro_des";

  if ($conteo == ""){
   $consulta="select * from productos_view where borrado='0' and par_cod <> 3 AND ".$where;  
  }else{
    $consulta="select * from (SELECT *, 
(SELECT pro_bar FROM productos_view WHERE pro_cod=productos_det.pro_cod) AS pro_bar,
(SELECT pro_des FROM productos_view WHERE pro_cod=productos_det.pro_cod) AS pro_des,
(SELECT fam_cod FROM productos_view WHERE pro_cod=productos_det.pro_cod) AS fam_cod,
(SELECT fam_des FROM productos_view WHERE pro_cod=productos_det.pro_cod) AS fam_des,
(SELECT par_cod FROM productos_view WHERE pro_cod=productos_det.pro_cod) AS par_cod,
(SELECT par_des FROM productos_view WHERE pro_cod=productos_det.pro_cod) AS par_des,
  pde_ven AS pro_ven
  FROM productos_det)as tmp where borrado='0' and par_cod <> 3 and pro_cod = '$codigopro' AND ".$where;
	}
  
  $rs_tabla = mysql_query($consulta);
	$nrs=mysql_num_rows($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<? if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="10%"><div align="center"><b>Codigo</b></div></td>
			
			<td width="21%"><div align="center"><b>Descripcion</b></div></td>
			<td width="23%"><div align="center"><b>Familia</b></div></td>
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
        $variable7=number_format(mysql_result($rs_tabla,$i,"pro_ven"), 0, ",", ".");        
				
        $cons="select count(*) as cuenta from productos_det where borrado='0' 
        and pro_cod='$codigopro'";
        $rs_cons = mysql_query($cons);
        
        if($conteo == ""){
          $cuenta=mysql_result($rs_cons,0,"cuenta");
        }else{
          $cuenta=0;
        }

				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
 		<div align="left"><?php echo $variable1;?></div></td>
					<td>
        <div align="left"><?php echo $variable2;?></div></td>
					<td>
        <div align="left"><?php echo $variable4;?></div></td>
						<td>
        <div align="right"><?php echo $variable7;?></div></td>	

				
	    	  
					<td align="center"><div align="center"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable7; ?>','<?php echo $codigopro; ?>','<?php echo $cuenta; ?>')"><img src="../../img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
