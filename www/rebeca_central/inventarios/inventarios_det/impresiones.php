<?php
@@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$emp_des=$_SESSION["emp_des"];

require_once('../../reportes/class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../../reportes/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(0.5,0.5,0.5,0.5);
$pdf->addJpegFromFile("../../reportes/logo.jpg",40,770,100,32);

include("../../conectar.php");
$nro_factura=$_GET["codigo"];
$variable2=$_GET["variable2"];
$variable3=$_GET["variable3"];
$variable4=$_GET["variable4"];

$contenido = "select * from inventarios_det_view where borrado='0' AND inv_cod='$nro_factura' order by mde_cod "; 
$queEmp = $contenido;

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


$ixx = 0;
$cantidad=0;
$costo=0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
  $ixx = $ixx+1;  
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(


        'inv_cod'=>'<b>Inv.Nro.</b>',
				'pro_bar'=>'<b>Codigo</b>',
				'pro_des'=>'<b>Descripcion</b>',
        'fam_des'=>'<b>Familia</b>',
				'pro_can'=>'<b>Cantidad</b>',
				'pro_cos_for'=>'<b>Costo</b>',
			  'pro_tot_for'=>'<b>Total</b>',

				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>560,
        'fontSize'=>8
			);


$sel_resultado ="SELECT * from inventarios_cab_view where inv_cod='$nro_factura'";
$res_resultado=mysql_query($sel_resultado);
$costo=mysql_result($res_resultado,$contador,"total_format");



 


$txttit = "<b>                                                                    $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Consolidado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";



$txttit.= "<b></b>\n";
$txttit.= "Cod. Inv.: $nro_factura \n";
$txttit.= "Descripcion: $variable2 - Estado: $variable3 - Fecha: $variable4 \n";
$txttit.= "Lista de Productos (Fisicos)\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Item :</b> ".$ixx."", 10);
$pdf->ezText("<b>Costo Total :</b> ".$costo."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>