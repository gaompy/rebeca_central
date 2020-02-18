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
$pdf->addJpegFromFile("../reportes/logo.jpg",40,770,100,32);

include("../conectar.php");

$contenido = implode('',file("tmp_$usuario.dat")); 
$queEmp = $contenido;

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


$query="SELECT SUM(pro_cos_tot)AS total_costo,SUM(pro_ven_tot)AS total_venta 
FROM 
($contenido)AS tmp";
$res=mysql_query($query);
$total_costo=mysql_result($res,0,"total_costo");
$total_venta=mysql_result($res,0,"total_venta");

$ixx = 0;

while($datatmp = mysql_fetch_assoc($resEmp)) { 
//$total=$total+mysql_result($resEmp,$ixx,"total");	
  $ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(



				'inv_cod'=>'<b>Codigo</b>',
        'dep_des'=>'<b>Deposito</b>',
				'inv_des'=>'<b>Descripcion</b>',
				'par_des'=>'<b>Estado</b>',
        'pro_cos_tot_for'=>'<b>Total Costo</b>',
        'pro_ven_tot_for'=>'<b>Total Venta</b>',
				'inv_fec'=>'<b>Fecha</b>',

				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

$txttit = "<b>                                                                     $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Consolidado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Lista de Inventarios</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Item :</b> ".$ixx ."", 10);
$pdf->ezText("<b>Total Costo :</b> ".number_format($total_costo, 0, ",", ".") ."", 10);
$pdf->ezText("<b>Total Venta :</b> ".number_format($total_venta, 0, ",", ".") ."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>