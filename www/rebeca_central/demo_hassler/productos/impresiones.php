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
$queEmp = "SELECT *,REPLACE(FORMAT(pro_cos,0),',','.')AS costo,REPLACE(FORMAT(pro_ven,0),',','.')AS venta  FROM ($contenido)as tmp";

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
        //'costo'=>'<b>Costo</b>',
        //'venta'=>'<b>Venta</b>',
        //'pro_can'=>'<b>Stock</b>',
        //'pro_imp'=>'<b>Impuesto</b>',
        //'par_des'=>'<b>Tipo Producto</b>',
        //'fam_des'=>'<b>Familia</b>',
        'uni_des'=>'<b>Unidades Med.</b>',
        'mar_des'=>'<b>Marca</b>',
        'pro_pes'=>'<b>Peso</b>',
        'pro_lit'=>'<b>Litro</b>',
        'venta'=>'<b>Venta</b>'
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>560,
        'fontSize'=>8
			);

$txttit = "<b>                                                                     $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Detallado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Lista de $descripcion</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Item :</b> ".$ixx ."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>