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
$variable2=$_GET["variable2"];

$contenido = "SELECT pro_cod,(SELECT pro_bar FROM productos WHERE pro_cod=factura_det.pro_cod)AS pro_bar,
(SELECT pro_des FROM productos WHERE pro_cod=factura_det.pro_cod)AS pro_des,
SUM(pro_can)AS pro_can, REPLACE(FORMAT(SUM(pro_tot),0),',','.')AS pro_tot
FROM factura_det WHERE borrado='0' AND fac_cod='$variable1'
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
$txttit.= "<b>Detalle de Ventas</b>\n";
$txttit.= "<b>Factura Nro : $variable1</b>\n";
$txttit.= "<b>Cliente : $variable2</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Item :</b> ".$ixx ."", 10);
$pdf->ezText("***************************************", 10);

$query1="SELECT tmo_cod,(SELECT tmo_des FROM tipo_moneda WHERE tmo_cod=factura_cab.tmo_cod)AS tmo_des
,SUM(cot_mon) AS cot_mon, (SELECT cot_ven FROM cotizaciones WHERE cot_cod=factura_cab.cot_cod) AS cot_ven 
FROM factura_cab  WHERE borrado=0 AND fac_cod='$variable1' AND tmo_cod >0
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
WHERE borrado='0' AND fac_cod='$variable1'
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
WHERE borrado='0' AND fac_cod='$variable1'
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
WHERE borrado='0' AND fac_cod='$variable1'
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