<?php
@session_start();
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

$contenido = "SELECT *,
(total/cantidad) AS promedio, 
REPLACE(FORMAT((total/cantidad),0),',','.') AS promedio_format,
(CASE `tmp`.`pro_bol` WHEN 0 THEN 'RETORNABLE' WHEN 1 THEN 'NO RETORNABLE' END) AS `envase`
FROM (SELECT factura_det_view.hru_cod, factura_det_view.pro_cod, factura_det_view.pro_bar, factura_det_view.pro_des, 
SUM(factura_det_view.pro_can) AS cantidad, SUM(pro_can*pro_pes) AS peso, 
SUM(pro_can*pro_lit) AS litros, factura_det_view.pro_bol, SUM(factura_det_view.pro_ven) AS pro_ven, 
SUM(factura_det_view.pro_tot) AS total, factura_det_view.uni_des
FROM factura_det_view
WHERE factura_det_view.hru_cod='$variable1'
GROUP BY factura_det_view.hru_cod, factura_det_view.pro_cod, factura_det_view.pro_bar, 
factura_det_view.pro_des, factura_det_view.pro_bol, factura_det_view.uni_des) AS tmp"; 
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
				'pro_des'=>'<b>Producto</b>',
        'cantidad'=>'<b>Cantidad</b>',
				'peso'=>'<b>Pesos</b>',
        'litros'=>'<b>Litros</b>',
        'envase'=>'<b>Envase</b>',
        'uni_des'=>'<b>Unidad</b>',
				'promedio_format'=>'<b>Promedio</b>',
        
	
				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500,
        'fontSize'=>6
			);


$query_costo="SELECT SUM(promedio) AS pro_ven FROM ($contenido)as tmp";
$resCos = mysql_query($query_costo, $conexion) or die(mysql_error());
$costo=mysql_result($resCos,0,"pro_ven");

$query_datos="select *,
(select cam_cha from camiones where borrado='0' and cam_cod=hruta_cab_view.cam_cod) as cam_cha 
from hruta_cab_view where borrado='0' and hru_cod='$variable1'";
$res_datos = mysql_query($query_datos, $conexion) or die(mysql_error());
$cam_des=mysql_result($res_datos,0,"cam_des");
$cho_des=mysql_result($res_datos,0,"cho_des");
$cam_cha=mysql_result($res_datos,0,"cam_cha");
$ayu_des=mysql_result($res_datos,0,"ayu_des");
$estado=mysql_result($res_datos,0,"estado");


$txttit = "<b>                                                                      $emp_des</b>\n";
$txttit.= "<b>                                                                 Planilla de Ruteo Detallada</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Reparto:</b> $variable1\n";
$txttit.= "<b>Camion:</b> $cam_des                           Chapa: $cam_cha\n";
$txttit.= "<b>Conductor</b>: $cho_des                        Ayudante: $ayu_des\n";
$txttit.= "<b>Estado </b>: $estado\n";
$pdf->ezText($txttit, 8);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Cantidad :</b> ".$ixx."", 8);
$pdf->ezText("<b>Total Promedio :</b> ".number_format($costo, 0, ",", ".")."", 8);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 8);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 8);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 8);
$pdf->ezText("", 10);
$pdf->ezText("", 10);
$pdf->ezText("", 10);
$pdf->ezText("", 10);
$pdf->ezText("_________          ____________             ________________                   __________              ______________", 10);
$pdf->ezText("Conductor           jefe de Reparto            Ayudante de Reparto                  Vo.Bo.Caja                Vo.Bo.Repartidor", 8);
$pdf->ezText("", 10);
ob_end_clean();
$pdf->ezStream();
?>