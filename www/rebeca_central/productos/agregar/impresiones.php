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
$variable1=$_GET['nrofactura'];
$variable2=$_GET['prodes'];
$contenido = "SELECT *, (SELECT pro_des FROM productos WHERE pro_cod=recetas.spr_cod)AS pro_des
, (SELECT pro_bar FROM productos WHERE pro_cod=recetas.spr_cod)AS pro_bar,(SELECT pro_can FROM productos WHERE pro_cod=recetas.spr_cod)AS pro_can
, (SELECT uni_des FROM unidades WHERE uni_cod=(SELECT uni_cod FROM productos WHERE pro_cod=recetas.spr_cod))AS uni_des,
((SELECT pro_ven FROM productos WHERE pro_cod=recetas.spr_cod)*rec_can)AS pro_ven,
 REPLACE(FORMAT(((SELECT pro_ven FROM productos WHERE pro_cod=recetas.spr_cod)*rec_can),0),',','.')AS pro_ven_for
FROM recetas
WHERE pro_cod = '$variable1' and borrado='0'"; 
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
				'rec_can'=>'<b>Cant.</b>',
        'pro_ven_for'=>'<b>P.venta</b>',
        'pro_can'=>'<b>Stock</b>',
				'uni_des'=>'<b>Unidades</b>',
        
	
				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);


$query_costo="SELECT SUM(pro_ven) AS pro_ven FROM ($contenido)as tmp";
$resCos = mysql_query($query_costo, $conexion) or die(mysql_error());
$costo=mysql_result($resCos,0,"pro_ven");

$txttit = "<b>                                                                      $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Detallado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Composicion de Producto;</b>\n";
$txttit.= "<b>$variable2</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Cantidad :</b> ".$ixx."", 10);
$pdf->ezText("<b>Costo :</b> ".number_format($costo, 0, ",", ".")."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>