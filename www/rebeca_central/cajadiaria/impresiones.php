<?php
@@session_start();
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

$contenido = implode('',file("tmp_$usuario.dat")); 
$queEmp = $contenido;

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ingreso=0;
$egreso=0;
$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ingreso=$ingreso+mysql_result($resEmp,$ixx,"caj_ing");
  $egreso=$egreso+mysql_result($resEmp,$ixx,"caj_sal");  
  $ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(

				'caj_cod'=>'<b>Codigo</b>',
				'ape_cod'=>'<b>Apertura</b>',
        'caj_des'=>'<b>Descripcion</b>',
        'caj_par_des'=>'<b>Tipo Mov.</b>',
        'caj_ing_des'=>'<b>Ingreso</b>',
        'caj_sal_des'=>'<b>Egreso</b>',
        'caj_par_des'=>'<b>Tipo</b>',
        'fecha'=>'<b>Fecha</b>',
			
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$diferencia=$ingreso-$egreso;
$txttit = "<b>                                                                     $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Detallado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Lista de $descripcion</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("Ingresos : ".number_format($ingreso, 0, ",", ".") ."", 10);
$pdf->ezText("Egresos : ".number_format($egreso, 0, ",", ".") ."", 10);
$pdf->ezText("<b>Diferencia :</b> ".number_format($diferencia, 0, ",", ".")."", 10);
$pdf->ezText("-----------------------------------", 10);
$pdf->ezText("<b>Item :</b> ".$ixx ."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>