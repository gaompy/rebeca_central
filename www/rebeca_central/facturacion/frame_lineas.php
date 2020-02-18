<?php
@session_start();
$usuario=$_SESSION["id_usuario"];
include ("../conectar.php");
include("../fecha_hora.php");
include("../permisos.php");

?>

<script>
function eliminar_linea(numlinea,nrofactura,mde_par)
{
	
  if (mde_par==0){
   if (confirm(" Desea eliminar esta linea ? "))
		document.getElementById("frame_datos").src="eliminar_linea.php?nrofactura="+nrofactura+"&numlinea=" + numlinea;
		document.getElementById("formulario_lineas").submit();
   }else{
   alert("El pedido fue entregado, imposible eliminar!");
   } 
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
</script>

<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<?php

@$aps_cod=$_POST["aps_cod"];if ($aps_cod==""){$aps_cod=$_SESSION["aps_cod"];}else{$_SESSION["aps_cod"] = $aps_cod;}
@$ape_cod=$_POST["ape_cod"];if ($ape_cod==""){$ape_cod=$_SESSION["ape_cod"];}else{$_SESSION["ape_cod"] = $ape_cod;}
@$mes_cod=$_POST["mes_cod"];if ($mes_cod==""){$mes_cod=$_SESSION["mes_cod"];}else{$_SESSION["mes_cod"] = $mes_cod;}
@$cli_cod=$_POST["cli_cod"];if ($cli_cod==""){$cli_cod=$_SESSION["cli_cod"];}else{$_SESSION["cli_cod"] = $cli_cod;}
@$fac_cod=$_POST["fac_cod"];if ($fac_cod==""){$fac_cod=$_SESSION["fac_cod"];}else{$_SESSION["fac_cod"] = $fac_cod;}
@$pro_cod=$_POST["pro_cod"];//if ($pro_cod==""){$pro_cod=$_SESSION["pro_cod"];}else{$_SESSION["pro_cod"] = $pro_cod;}
@$pro_ven=str_replace(".","",($_POST["variable8"]));
@$pro_cos=str_replace(".","",($_POST["pro_cos"]));
@$pro_can=$_POST["variable9"];


			$consulta="SELECT count(*) as cuenta FROM factura_cab WHERE (fac_cod='$fac_cod') and borrado='0'";
			$rs_tabla = mysql_query($consulta);
			$cuenta=mysql_result($rs_tabla,0,"cuenta");
      
      if ($cuenta==0){      
            $sel="INSERT INTO factura_cab (fac_cod,ape_cod,cli_cod,aps_cod,mes_cod,fecha,hora,usuario,borrado) 
				    VALUES ('$fac_cod','$ape_cod','$cli_cod','$aps_cod',$mes_cod,'$fecha','$hora','$usuario','0')";
				    $rs=mysql_query($sel);
                
            $sel="update mesas set mes_fac='$fac_cod',mes_est='1' where mes_cod='$mes_cod'";
				    $rs=mysql_query($sel);	      
      }else{
      
       			$sel="update factura_cab set cli_cod='$cli_cod',mes_cod='$mes_cod' where fac_cod='$fac_cod'";
						$rs=mysql_query($sel);	
					  
            $sel="update mesas set mes_fac='$fac_cod' where mes_cod='$mes_cod'";
						$rs=mysql_query($sel);
      }
      
        if ($pro_cod <> ""){
            if ($pro_can<>0){
					  $pro_tot=($pro_ven * $pro_can);
            $pro_cos_tot=($pro_cos * $pro_can);
            $utilidad=$pro_tot-$pro_cos_tot;
                 
                    $sel="INSERT INTO factura_det(fac_cod,ape_cod,pro_cod,pro_can,pro_ven,pro_tot,aps_cod,fecha,hora,usuario,borrado,pro_com,pro_uti)
						        values('$fac_cod','$ape_cod','$pro_cod','$pro_can','$pro_ven','$pro_tot','$aps_cod','$fecha','$hora','$usuario','0','$pro_cos','$utilidad')";
						        $rs=mysql_query($sel);
          
             $sel_up="update productos set pro_can=pro_can-$pro_can,pro_ven='$pro_ven' where pro_cod='$pro_cod' ";
						 $rs_up=mysql_query($sel_up);
             $par=0;
             include("componentes.php") ;
         
         }                              
        }
            	      
$img="";
?>

<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
<?php 
$sel_lineas="SELECT factura_det.mde_cod,factura_det.pro_cod, productos.pro_bar,productos.pro_des, familias_pro.fam_des, factura_det.pro_can,factura_det.pro_gus1,factura_det.pro_gus2, factura_det.pro_ven, factura_det.pro_tot, 
factura_det.mde_par,factura_det.hora,factura_det.borrado
FROM (factura_det INNER JOIN productos ON factura_det.pro_cod = productos.pro_cod) INNER JOIN familias_pro ON productos.fam_cod = familias_pro.fam_cod
WHERE factura_det.borrado='0' and factura_det.fac_cod='$fac_cod'  order by factura_det.mde_cod desc";

$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"mde_cod");
	$pro_cod=mysql_result($rs_lineas,$i,"pro_cod");
  $pro_bar=mysql_result($rs_lineas,$i,"pro_bar");	
  $pro_des=strtoupper(mysql_result($rs_lineas,$i,"pro_des"));
	$fam_des=strtoupper(mysql_result($rs_lineas,$i,"fam_des"));
	$pro_can=mysql_result($rs_lineas,$i,"pro_can");
  $pro_gus1=mysql_result($rs_lineas,$i,"pro_gus1");
  $pro_gus2=mysql_result($rs_lineas,$i,"pro_gus2");
	$pro_cos=mysql_result($rs_lineas,$i,"pro_ven");
	$pro_tot=mysql_result($rs_lineas,$i,"pro_tot");
  $mde_par=mysql_result($rs_lineas,$i,"mde_par");
  $pro_hor=mysql_result($rs_lineas,$i,"hora");
  
  
  if ($mde_par==0){
  $img="../img/icono1.gif";
  
  }else{
  $img="../img/convertir.png";
  
  }
  
	
  if (!isset($pro_gus1)) {   
  }else{
  $pro_des=$pro_des." / (".$pro_gus1.",".$pro_gus2.")"; 
  }



  

	if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } ?>
			<tr class="<? echo $fondolinea?>">
				
        <td width="3%"><? echo $i+1?></td>
				<td width="5%"><? echo $pro_bar?></td>
        <td width="10%"><? echo $pro_des?></td>
        <td width="5%"><?  echo $fam_des?></td>
				<td width="5%"><?  echo $pro_can?></td>
				<td width="5%"><?  echo number_format($pro_cos, 0, ",", ".")?></td>
				<td width="5%"><?  echo number_format($pro_tot, 0, ",", ".");?></td>
        	
        
        <?php  
				  if (@$eli=='0'){
				?>
            <td width="3%"><a href="javascript:eliminar_linea('<?php echo $numlinea;?>','<?php echo $fac_cod;?>','<?php echo $mde_par;?>')"><img src="../img/eliminar.png" border="0"></a></td>
          <?php
				  }
				?>
        
        
        
			</tr>
<? } ?>
</table>
<?

			$consulta="SELECT sum(pro_tot) as suma FROM factura_det WHERE (fac_cod='$fac_cod') and borrado='0'";
			$rs_tabla = mysql_query($consulta);
			$total=mysql_result($rs_tabla,0,"suma");

      $consulta_uti="SELECT sum(pro_uti) as suma FROM factura_det WHERE (fac_cod='$fac_cod') and borrado='0'";
			$rs_tabla_uti = mysql_query($consulta_uti);
			$total_uti=mysql_result($rs_tabla_uti,0,"suma");


?>


<script>parent.document.formulario_lineas.variable10.value="<? echo number_format($total, 0, ",", ".")?>";</script>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>