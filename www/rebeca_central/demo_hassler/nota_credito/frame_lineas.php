<?php
@@session_start();
$usuario=$_SESSION["id_usuario"];
include ("../conectar.php");
include("../fecha_hora.php");

?>

<script>
function eliminar_linea(numlinea,nrofactura,estado)
{
if (estado==0){ 
	if (confirm(" Desea eliminar esta linea ? "))
		  document.getElementById("frame_datos").src="eliminar_linea.php?nrofactura="+nrofactura+"&numlinea=" + numlinea+"&par=0";		  
      parent.document.formulario_lineas.submit();
    
      }else{
      alert("No se puede modificar Factura");}
}

		var miPopup
function imprimir_linea(codfactura,mesa,linea) {
			var codfactura;
      var mesa;
		  	miPopup = window.open("reporte/impresiones_orden_linea.php?nrofactura="+codfactura+"&mesa="+mesa+"&linea="+linea,"miwin","width=500,height=300,scrollbars=yes");

      miPopup.focus();
		}	
   var miPopup
		function ver_linea(codigo){
			var codigo
			miPopup = window.open("ver.php?numlinea="+codigo,"miwin","width=700,height=380,scrollbars=yes");
			
			miPopup.focus();
		}
var codcliente1;

 		function actualiza(numlinea,pro_cod,pro_can,nro_fac,mesa){
       var miPopup                                                                    			
		  miPopup= window.open("actualiza_linea.php?numlinea="+numlinea +"&pro_cod="+pro_cod+"&pro_can="+pro_can+"&nro_fac="+nro_fac+"&mes_cod="+mesa,"miwin","width=500,height=300,scrollbars=yes");
		  miPopup.focus();
    }
    
function actualizar_linea(numlinea){
    if (confirm(" Desea Actualizar esta linea ? "))
      var subtotal="tot_"+numlinea;
      var total=document.getElementById(subtotal).value;
		  document.getElementById("frame_datos").src="eliminar_linea.php?numlinea=" + numlinea +"&total="+total+"&par=1";		  
      parent.document.formulario_lineas.submit();
}    
</script>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../js/formato.js"></script>
<?php

$aps_cod=0;
$ape_cod=$_POST["variable4"];
$mes_cod=0;
$cli_cod=$_POST["cli_cod"];
$fac_cod=$_POST["fac_cod"];
$pro_cod=$_POST["pro_cod"];
$fac_num=$_POST["fac_num"];
$estado=$_POST["estado"];
$pro_ven=str_replace(".","",($_POST["variable8"]));
$pro_can=$_POST["variable9"];
$fecha_compra=$_POST["variable5"];

			$consulta="SELECT count(*) as cuenta FROM compra_cab WHERE (fac_cod='$fac_cod') and borrado='0'";
			$rs_tabla = mysql_query($consulta);
			$cuenta=mysql_result($rs_tabla,0,"cuenta");
      
      if ($cuenta==0){      
          $sel="INSERT INTO compra_cab (fac_cod,fac_num,ape_cod,prv_cod,aps_cod,mes_cod,fecha,hora,usuario,borrado) 
				    VALUES ('$fac_cod','$fac_num','$ape_cod','$cli_cod','$aps_cod',$mes_cod,'$fecha_compra','$hora','$usuario','0')";
				    $rs=mysql_query($sel);
/*                
            $sel="update mesas set mes_fac='$fac_cod',mes_est='1' where mes_cod='$mes_cod'";
				    $rs=mysql_query($sel);*/	      
      }else{
      
       			$sel="update compra_cab set prv_cod='$cli_cod',mes_cod='$mes_cod',ape_cod='$ape_cod',fecha='$fecha_compra' where fac_cod='$fac_cod'";
						$rs=mysql_query($sel);	
					  /*
            $sel="update mesas set mes_fac='$fac_cod' where mes_cod='$mes_cod'";
						$rs=mysql_query($sel);*/
      }
      
        if ($pro_cod <> ""){
					  $pro_tot=($pro_ven * $pro_can);
            $sel="INSERT INTO compra_det(fac_cod,ape_cod,pro_cod,pro_can,pro_ven,pro_tot,aps_cod,fecha,hora,usuario,borrado)
						values('$fac_cod','$ape_cod','$pro_cod','$pro_can','$pro_ven','$pro_tot','$aps_cod','$fecha_compra','$hora','$usuario','0')";
						$rs=mysql_query($sel);
            
            if ($ape_cod==1){
              $sel_up="update productos set pro_can=pro_can+$pro_can where pro_cod='$pro_cod' ";
						  $rs_up=mysql_query($sel_up);
            }

            if ($ape_cod==2){
              $sel_up="update productos set pro_can=pro_can-$pro_can where pro_cod='$pro_cod' ";
						  $rs_up=mysql_query($sel_up);
            }
                                       
            if ($ape_cod==3){
              $sel_up="update productos set pro_can=pro_can+$pro_can where pro_cod='$pro_cod' ";
						  $rs_up=mysql_query($sel_up);
            }




        }
            	      

?>

<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
<?php 
$sel_lineas="SELECT compra_det.mde_cod,compra_det.pro_cod, productos.pro_bar,productos.pro_des, familias_pro.fam_des, compra_det.pro_can, compra_det.pro_ven, compra_det.pro_tot, compra_det.borrado
FROM (compra_det INNER JOIN productos ON compra_det.pro_cod = productos.pro_cod) INNER JOIN familias_pro ON productos.fam_cod = familias_pro.fam_cod
WHERE compra_det.borrado='0' and compra_det.fac_cod='$fac_cod'  order by compra_det.mde_cod desc";

$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"mde_cod");
	$pro_cod=mysql_result($rs_lineas,$i,"pro_cod");
  $pro_bar=mysql_result($rs_lineas,$i,"pro_bar");
	$pro_des=strtoupper(mysql_result($rs_lineas,$i,"pro_des"));
	$fam_des=strtoupper(mysql_result($rs_lineas,$i,"fam_des"));
	$pro_can=mysql_result($rs_lineas,$i,"pro_can");
	$pro_cos=mysql_result($rs_lineas,$i,"pro_ven");
	$pro_tot=mysql_result($rs_lineas,$i,"pro_tot");
	

	if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } ?>
			<tr class="<?php echo $fondolinea?>">
				<td width="3%"><? echo $i+1?></td>
				<td width="5%"><? echo $pro_bar?></td>
				<td width="10%"><? echo $pro_des?></td>
				<td width="5%"><? echo $fam_des?></td>
				<td width="5%"><? echo $pro_can?></td>
				<td width="5%"><? echo number_format($pro_cos, 0, ",", ".")?></td>
				<td width="5%"><? echo number_format($pro_tot, 0, ",", ".");?></td> 
	
   <?php
        if ($estado==0){
        ?>				 
        <td width="5%"><input NAME="tot_<?echo $numlinea; ?>" id="tot_<?echo $numlinea; ?>" type="text" value="<? echo number_format($pro_tot, 0, ",", ".");?>"class="cajaPequena" size="30" maxlength="30" onkeyup="format(this)"></td>
	      <?
        }else{
        ?>
        <td width="5%"><? echo number_format($pro_cos, 0, ",", ".")?></td>
        <?
        }
        ?>
        
  
       <td width="3%"><a href="javascript:actualizar_linea('<?php echo $numlinea;?>')"><img src="../img/convertir.png" border="0"></a></td>
       <td width="3%"><a href="javascript:eliminar_linea('<?php echo $numlinea;?>','<?php echo $fac_cod;?>','<?php echo $estado;?>')"><img src="../img/eliminar.png" border="0"></a></td>

			</tr>
<? } ?>
</table>
<?

			$consulta="SELECT sum(pro_tot) as suma FROM compra_det WHERE (fac_cod='$fac_cod') and borrado='0'";
			$rs_tabla = mysql_query($consulta);
			$total=mysql_result($rs_tabla,0,"suma");


?>


<script>parent.document.formulario_lineas.variable10.value="<? echo number_format($total, 0, ",", ".")?>";</script>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>