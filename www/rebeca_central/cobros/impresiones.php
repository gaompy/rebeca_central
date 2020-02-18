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
$nrofactura=$_GET["nrofactura"];
$cliente=$_GET["cliente"];
$total=$_GET["total"];


$contenido = "select * from cobros where fac_cod='$nrofactura'"; 
$queEmp = $contenido;

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(


				'cob_cod'=>'<b>Codigo</b>',
				'cob_mon'=>'<b>Monto</b>',
				'cob_sal'=>'<b>Saldo</b>',
				'fecha'=>'<b>Fecha</b>',
				'hora'=>'<b>Hora</b>',

			

				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
			
$contador=0;
$total_cos=0;
$total_venta=0;
$diferencia=0;

while ($contador < mysql_num_rows($resEmp)) {
$total_cos=$total_cos+mysql_result($resEmp, $contador,"cob_mon");
$total_venta=mysql_result($resEmp, $contador,"cob_sal");
$contador++;
}
		
$diferencia=$total-$total_cos;			

$txttit = "<b>                                                                    $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Consolidado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";

$txttit.= "<b></b>\n";
$txttit.= "<b>Historico de Cobros</b>\n";


$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);


$pdf->ezText("<b>Cantidad :</b> ".$ixx."", 10);
$pdf->ezText("<b>Total a Cobrar :</b> ".number_format($total_venta, 0, ",", ".")."", 10);
$pdf->ezText("<b>Total Facturado :</b> ".$total, 10);
$pdf->ezText("<b>En Caja :</b> ".number_format($total_cos, 0, ",", ".")."", 10);
$pdf->ezText("<b>---------------------------------</b>", 10);
$pdf->ezText("<b>Factura Nro.: $nrofactura</b> ", 10);
$pdf->ezText("<b>Cliente: $cliente</b> ", 10);
$pdf->ezText("<b>Total Factura: $total ", 10);
$pdf->ezText("<b>---------------------------------</b>", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>