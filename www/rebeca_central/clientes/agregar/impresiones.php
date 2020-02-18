<?php
@@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$emp_des=$_SESSION["emp_des"];
$descripcion=$_SESSION["descripcion"] ;

require_once('../../reportes/class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../../reportes/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
$pdf->addJpegFromFile("../../reportes/logo.jpg",40,770,100,32);

include("../../conectar.php");
$variable1=$_GET['variable1'];
$variable2=$_GET['variable2'];
$contenido = "select * from clientes_det where borrado=0 and cli_cod='$variable1'"; 
$queEmp = $contenido;

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(



				'cld_cod'=>'<b>Codigo</b>',
				'cld_ced'=>'<b>Cedula</b>',
				'cld_nom'=>'<b>Funcionario</b>',
        'cld_tel'=>'<b>Telefono</b>',
				'cld_ema'=>'<b>Email</b>',
	
				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

$txttit = "<b>                                                                      $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Consolidado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Lista de funcionarios de:</b>\n";
$txttit.= "<b>$variable2</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Cantidad :</b> ".$ixx."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>