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
$nro_factura=$_GET["codigo"];

$contenido = "select * from (SELECT *, (SELECT pro_can FROM productos WHERE pro_cod=tmp.pro_cod)AS stock_sistema
,(pro_can-(SELECT pro_can FROM productos WHERE pro_cod=tmp.pro_cod) )AS diferencia
FROM (SELECT inv_cod,pro_cod,pro_bar, pro_des,SUM(pro_can)AS pro_can, pro_cos,SUM(pro_tot) AS pro_tot,
REPLACE(FORMAT(pro_cos,0),',','.')AS pro_cos_for,REPLACE(FORMAT(SUM(pro_tot),0),',','.')AS pro_tot_for,borrado
FROM inventarios_det_view WHERE borrado='0'
GROUP BY pro_cod,inv_cod)AS tmp)as tmp1 where inv_cod='$nro_factura' order by pro_des
"; 
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
				'pro_can'=>'<b>Stock Fisico</b>',        
        'stock_sistema'=>'<b>Stock Sistema</b>',
        'pro_cos_for'=>'<b>Costo Uni.</b>',
				'pro_tot_for'=>'<b>Total</b>',
        'diferencia'=>'<b>Diferencia</b>',
			
				
			

				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

$txttit = "<b>                                                                    $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Consolidado</b>\n";

$cons="select * from inventarios_cab_view where inv_cod='$nro_factura'";
$rs = mysql_query($cons);
$inv_des=mysql_result($rs,0,"inv_des");
$inv_fec=mysql_result($rs,0,"inv_fec");	
$par_des=mysql_result($rs,0,"par_des");	

$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Cidigo : $nro_factura</b>\n";
$txttit.= "<b>Descripcion : $inv_des</b>\n";
$txttit.= "<b>Fecha : $inv_fec</b>\n";
$txttit.= "<b>Listado $par_des</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Cantidad :</b> ".$ixx."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>