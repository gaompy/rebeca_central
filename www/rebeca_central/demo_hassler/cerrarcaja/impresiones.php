<?php
@@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$emp_des=$_SESSION["emp_des"];

require_once('../reportes/class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../reportes/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
$pdf->addJpegFromFile("../reportes/logo.jpg",40,750,150,72);

include("../conectar.php");
$variable1=$_GET['nroapertura'];

$contenido ="SELECT pro_cod,SUM(pro_can)AS pro_can,(SELECT pro_des FROM productos WHERE pro_cod=factura_det.pro_cod)AS pro_des 
,REPLACE(FORMAT(SUM(pro_tot),0),',','.')AS pro_tot,SUM(pro_tot)AS total
FROM factura_det 
WHERE ape_cod='$variable1' AND borrado='0' AND usuario='$usuario'
GROUP BY pro_cod"; 
$queEmp = $contenido;

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
  
  $total=$total+mysql_result($resEmp,$ixx,"total");
  $ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
  
}
$titles = array(



				'pro_des'=>'<b>Producto</b>',
				'pro_can'=>'<b>Cantidad</b>',
				'pro_tot'=>'<b>Total</b>',			

				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

 
$queEmp1 = "select * from aper_cie where borrado='0' and ape_cod='$variable1'";
$resEmp1 = mysql_query($queEmp1, $conexion) or die(mysql_error());
$fecha_aper=mysql_result($resEmp1,0,"fecha");
$dotacion=mysql_result($resEmp1,0,"ape_dot");
$rendido=mysql_result($resEmp1,0,"ape_efe");
$arendir=mysql_result($resEmp1,0,"ape_cie");  
$diferencia=mysql_result($resEmp1,0,"ape_dif"); 

$txttit = "<b>                                                                    $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Consolidado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Cierre Nro.: $variable1            -            Fecha: $fecha_aper</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>------------------------</b> "."", 10);
$pdf->ezText("<b>Dotacion :</b> ".number_format($dotacion, 0, ",", ".")."", 10);
$pdf->ezText("<b>Rendido :</b> ".number_format($rendido, 0, ",", ".")."", 10);
$pdf->ezText("<b>Total a Recaudacion :</b> ".number_format($total, 0, ",", ".")."", 10);
$pdf->ezText("<b>Total a Rendir :</b> ".number_format($arendir, 0, ",", ".")."", 10);
$pdf->ezText("<b>Diferencia :</b> ".number_format($diferencia, 0, ",", ".")."", 10);
$pdf->ezText("<b>------------------------</b> "."", 10);
$pdf->ezText("<b>Cantidad :</b> ".$ixx."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>