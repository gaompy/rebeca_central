
<html>
<head>
<link rel="stylesheet" href="mm_travel2.css" type="text/css" />
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable7,codigopro,cantidad,nro_fac) {
	



  parent.opener.document.formulario_lineas.codigopro.value=codigopro;
  parent.opener.document.formulario_lineas.referencia.value=variable1;
	parent.opener.document.formulario_lineas.descripcion.value=variable2;	
	parent.opener.document.formulario_lineas.precio.value=variable7;
 // parent.opener.document.formulario_lineas.cantidad.focus();
  
  			miPopup = window.open("comprobarproducto.php?codigopro="+variable1+"&cantidad="+cantidad+"&nro_fac="+nro_fac, "frame_lineas","miwin","width=700,height=80,scrollbars=yes");
  //parent.opener.document.getElementById("formulario_lineas").submit();
/*	parent.opener.document.formulario_lineas.cantidad.value="";
	parent.opener.document.formulario_lineas.cantidad.focus();*/	
	parent.window.close();


}

</script>
<?php
include ("../conectar.php"); 

$variable2=$_POST["variable2"];
$variable3=$_POST["variable3"];
$nro_fac=$_POST["nro_fac"];
$cantidad=$_POST["cantidad"];


$where="1=1";


//if ($variable1 <> "") { $where.=" AND familias_pro.par_cod='$variable1'"; }
//if ($variable2 <> "") { $where.=" AND productos.fam_cod='$variable2'"; }

if ($variable3 <> "") { $where.=" AND pro_des like '%".$variable3."%'"; }
$where.=" order by pro_des";
?>
<body>

     <div align="left" class="fuente8" width="98%"><strong><?php echo ""?> </strong></div>

     </td>				
<?
	
$consulta="select *,(select fam_des from 
familias_pro where fam_cod=productos.fam_cod)as fam_des 
from productos where borrado='0' AND ".$where;


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
        $variable7=mysql_result($rs_tabla,$i,"pro_ven_nor");
			


				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td>
 		<div align="left"><?php echo $variable1;?></div></td>
					<td>
        <div align="left"><?php echo $variable2;?></div></td>
					<td>
        <div align="left"><?php echo $variable4;?></div></td>
						<td>
        <div align="right"><?php echo number_format($variable7, 0, ",",".");?></div></td>	

				
	    	  
					<td align="center"><div align="center"><a href="javascript:pon_prefijo('<?php echo $variable1?>','<?php echo $variable2?>','<?php echo $variable7; ?>','<?php echo $codigopro; ?>','<?php echo $cantidad; ?>','<?php echo $nro_fac; ?>')"><img src="img/convertir.png" border="0" title="Seleccionar"></a></div></td>					
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
