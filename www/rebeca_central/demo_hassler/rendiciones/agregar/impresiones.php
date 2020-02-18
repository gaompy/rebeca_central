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

$contenido = "SELECT * ,
(SELECT fac_num FROM factura_cab WHERE fac_cod=hruta_det.fac_cod) AS fac_num,
(SELECT cli_des FROM clientes WHERE cli_cod=(SELECT fac_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS cli_des,
(SELECT codigoanterior FROM clientes WHERE cli_cod=(SELECT fac_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS codigoanterior,
(SELECT cli_tel FROM clientes WHERE cli_cod=(SELECT fac_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS cli_tel,
(SELECT zona FROM clientes WHERE cli_cod=(SELECT fac_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS zona,
(CASE (SELECT fac_est FROM factura_cab WHERE fac_cod=hruta_det.fac_cod) WHEN 0 THEN 'Pendiente' WHEN 1 THEN 'Confirmado' END) AS estado,
(SELECT SUM(pro_tot) 
                FROM factura_det 
                WHERE borrado='0' AND fac_cod=(SELECT fac_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS total_normal,

(SELECT REPLACE(FORMAT(SUM(pro_tot),0),',','.')
                FROM factura_det 
                WHERE borrado='0' AND fac_cod=(SELECT fac_cod FROM factura_cab WHERE fac_cod=hruta_det.fac_cod)) AS total_format
FROM hruta_det WHERE borrado='0' and hru_cod='$variable1'"; 
$queEmp = $contenido;

$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(



				'fac_cod'=>'<b>Nro.Pedido</b>',
				'fac_num'=>'<b>Factura</b>',
        'codigoanterior'=>'<b>Cuenta</b>',
				'cli_des'=>'<b>Cliente</b>',
        'fac_tot'=>'<b>Total a Rend.</b>',
        'hde_mon'=>'<b>Rendido</b>',
				'hde_dif'=>'<b>Diferencia</b>',
        'hde_env_ret'=>'<b>Env.Ret.</b>',
        'hde_env_nor'=>'<b>Env.No Ret.</b>',
        'fecha'=>'<b>Fecha</b>',
        
	
				
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500,
        'fontSize'=>6
			);


$query_costo="SELECT SUM(total_normal) AS pro_ven FROM ($contenido)as tmp";
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
$total_a_rendir=mysql_result($res_datos,0,"hru_tot");
$rendido=mysql_result($res_datos,0,"hru_ren");
$dif=$total_a_rendir-$rendido;


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
$pdf->ezText("<b>Total a Rendir:</b> ".number_format($total_a_rendir, 0, ",", ".")."", 8);
$pdf->ezText("<b>Rendido:</b> ".number_format($rendido, 0, ",", ".")."", 8);
$pdf->ezText("<b>Diferencia:</b> ".number_format($dif, 0, ",", ".")."", 8);
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