<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$descripcion=$_SESSION["descripcion"] ;
$emp_des=$_SESSION["emp_des"];


require_once('../reportes/class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../reportes/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
$pdf->addJpegFromFile("../reportes/logo.jpg",40,770,100,32);

include("../conectar.php");
$variable1=$_GET["variable1"];

$contenido = "SELECT pro_cod,(SELECT pro_bar FROM productos WHERE pro_cod=factura_det.pro_cod)AS pro_bar,
(SELECT pro_des FROM productos WHERE pro_cod=factura_det.pro_cod)AS pro_des,
SUM(pro_can)AS pro_can, REPLACE(FORMAT(SUM(pro_tot),0),',','.')AS pro_tot
FROM factura_det WHERE borrado='0' AND ape_cod='$variable1'
GROUP BY pro_cod"; 
$queEmp = $contenido;

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(

				'pro_bar'=>'<b>Codigo</b>',
				'pro_des'=>'<b>Descripcion</b>',
        'pro_can'=>'<b>Cantidad</b>',
        'pro_tot'=>'<b>Total En Gs.</b>'
        
			
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

$txttit = "<b>                                                                     $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Detallado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Detalle de Cierre </b>\n";
$txttit.= "<b>Apertura Nro : $variable1</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Item :</b> ".$ixx ."", 10);
$query="select * from aper_cie_view where borrado='0' and ape_cod='$variable1'";
$rs=mysql_query($query);
$ape_dot=mysql_result($rs,0,"ape_dot");
$ape_efe=mysql_result($rs,0,"ape_efe"); if ($ape_efe==""){$ape_efe=0;}
$ape_cie=mysql_result($rs,0,"ape_cie"); if ($ape_cie==""){$ape_cie=$ape_dot;}
$ape_est=mysql_result($rs,0,"ape_est");
$ape_dif=mysql_result($rs,0,"ape_dif");
$ape_fec=mysql_result($rs,0,"fecha");
$ventas=number_format((str_replace(".","",($ape_cie))-str_replace(".","",($ape_dot))), 0, ",", ".");
if ($ventas < 0){$ventas=0;}




/****************************detalle de ingreso y egreso********************/
$pdf->ezText("", 10);
$pdf->ezText("Detalle de Movimiento", 10);


$sel_lineas="SELECT *,
              REPLACE(FORMAT(caj_ing,0),',','.') AS caj_ing_des,
              REPLACE(FORMAT(caj_sal,0),',','.') AS caj_sal_des,
              CASE caj_par  
              WHEN 0 THEN 'Ingreso'  
              WHEN 1 THEN 'Egreso'  
              END AS caj_par_des
              from caja_diaria where borrado='0' and ape_cod='$variable1'";
$rs_lineas=mysql_query($sel_lineas);
$j=0;
$monto=0;
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
  $j=$j+1;
  $caj_cod=mysql_result($rs_lineas,$i,"caj_cod");
  $caj_des=mysql_result($rs_lineas,$i,"caj_des");
  $caj_ing=number_format(mysql_result($rs_lineas,$i,"caj_ing"), 0, ",", ".");
  $caj_sal=number_format(mysql_result($rs_lineas,$i,"caj_sal"), 0, ",", ".");
  $caj_par=mysql_result($rs_lineas,$i,"caj_par");
  $caj_par_des=mysql_result($rs_lineas,$i,"caj_par_des");
  $caj_fec=mysql_result($rs_lineas,$i,"fecha");
  $caj_hor=mysql_result($rs_lineas,$i,"hora");
  
  if ($caj_par==0){
   $monto=$caj_ing;
  }else{
   $monto=$caj_sal;
  }
  
  
  $pdf->ezText("$j - $caj_par_des / $caj_des - ($monto) - $caj_fec - $caj_hor", 6);

 } 


/*****************************************************************************/
$query1="SELECT SUM(caj_ing) AS caj_ing_sum,SUM(caj_sal) AS caj_sal_sum
FROM caja_diaria WHERE borrado='0' AND ape_cod='$variable1'
GROUP BY ape_cod";
$rs1=mysql_query($query1);

@$ingreso=mysql_result($rs1,0,"caj_ing_sum");if ($ingreso==""){$ingreso=0; }
@$egreso=mysql_result($rs1,0,"caj_sal_sum");if ($egreso==""){$egreso=0;}
$dif_ing_egr=$ingreso-$egreso;
$ape_cie_tmp= $ingreso+str_replace(".","",($ape_cie));
$ape_cie_tmp=$ape_cie_tmp-$egreso;
$dif_gral=str_replace(".","",($ape_efe))-$ape_cie_tmp;

$pdf->ezText(" ", 10);
$pdf->ezText("*************Resumen Caja***************", 10);
$pdf->ezText("<b>Dotacion Gs. :</b> ".$ape_dot ."", 10);
$pdf->ezText("<b>Ventas Gs. :</b> ".$ventas ."", 10);
$pdf->ezText("<b>Total Caja Gs. :</b> ".$ape_cie ."", 10);
$pdf->ezText("**********Resumen Movimiento*************", 10);
$pdf->ezText("<b>Ingresos Gs. :</b> ".number_format($ingreso, 0, ",", ".") ."", 10);
$pdf->ezText("<b>Egresos Gs. :</b> ".number_format($egreso, 0, ",", ".") ."", 10);
$pdf->ezText("<b>Total Mov. Gs. :</b> ".number_format($dif_ing_egr, 0, ",", ".") ."", 10);
$pdf->ezText("**********Resumen General****************", 10);
$pdf->ezText("<b>Caja y Mov. Gs. :</b> ".number_format($ape_cie_tmp, 0, ",", ".") ."", 10);
$pdf->ezText("<b>Rendido Gs. :</b> ".$ape_efe ."", 10);
$pdf->ezText("<b>Diferencia :</b> ".number_format($dif_gral, 0, ",", ".") ."", 10);
$pdf->ezText("<b>Estado :</b> ".$ape_est ."", 10);
$pdf->ezText("***************************************", 10);

$query1="SELECT tmo_cod,(SELECT tmo_des FROM tipo_moneda WHERE tmo_cod=factura_cab.tmo_cod)AS tmo_des
,SUM(cot_mon) AS cot_mon, (SELECT cot_ven FROM cotizaciones WHERE cot_cod=factura_cab.cot_cod) AS cot_ven 
FROM factura_cab  WHERE borrado=0 AND ape_cod='$variable1' AND tmo_cod >0
GROUP BY ape_cod,tmo_cod,cot_cod";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
    $tmo_cod=mysql_result($rs1,$i,"tmo_cod");
    $tmo_des=mysql_result($rs1,$i,"tmo_des");
    $cot_mon=mysql_result($rs1,$i,"cot_mon");
    $cot_ven=mysql_result($rs1,$i,"cot_ven");
    
    if ($tmo_cod==1){$monto=number_format($cot_mon, 0, ",", ".");}else{$monto=str_replace(".",",",($cot_mon))." -cot. (".number_format($cot_ven, 0, ",", ".").")";}
        
    $pdf->ezText("<b></b> ".$tmo_des." - ".$monto."", 10);
  } 
$pdf->ezText("***************************************", 10);

$query1="SELECT for_cod,(SELECT for_des FROM formas_pago WHERE for_cod=factura_cab.for_cod)AS for_des
,SUM(fac_tot) AS fac_tot 
FROM factura_cab 
WHERE borrado='0' AND ape_cod='$variable1'
GROUP BY for_cod";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
       $for_cod=mysql_result($rs1,$i,"for_cod");
       $for_des=mysql_result($rs1,$i,"for_des");
       $fac_tot=mysql_result($rs1,$i,"fac_tot");
      $pdf->ezText("<b></b> ".$for_des." - ".number_format($fac_tot, 0, ",", ".")."", 10);  
  } 

$pdf->ezText("***************************************", 10);
$query1="SELECT mpg_cod,(SELECT mpg_des FROM medios_pago WHERE mpg_cod=factura_cab.mpg_cod)AS mpg_des
,SUM(fac_tot) AS fac_tot 
FROM factura_cab 
WHERE borrado='0' AND ape_cod='$variable1'
GROUP BY mpg_cod";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
       $mpg_cod=mysql_result($rs1,$i,"mpg_cod");
       $mpg_des=mysql_result($rs1,$i,"mpg_des");
       $fac_tot=mysql_result($rs1,$i,"fac_tot");
      $pdf->ezText("<b></b> ".$mpg_des." - ".number_format($fac_tot, 0, ",", ".")."", 10);  
  } 
$pdf->ezText("***************************************", 10);

$query1="SELECT tie_cod,(SELECT tie_des FROM tipo_envio WHERE tie_cod=factura_cab.tie_cod)AS tie_des
,SUM(fac_tot) AS fac_tot 
FROM factura_cab 
WHERE borrado='0' AND ape_cod='$variable1'
GROUP BY tie_cod";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
       $tie_cod=mysql_result($rs1,$i,"tie_cod");
       $tie_des=mysql_result($rs1,$i,"tie_des");
       $fac_tot=mysql_result($rs1,$i,"fac_tot");
      $pdf->ezText("<b></b> ".$tie_des." - ".number_format($fac_tot, 0, ",", ".")."", 10);  
  } 
$pdf->ezText("***************************************", 10);



$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>