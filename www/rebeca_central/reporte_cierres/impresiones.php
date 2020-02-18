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


$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(

				'ape_cod'=>'<b>Codigo</b>',
				'ape_dot'=>'<b>Dotacion</b>',
        'ape_efe'=>'<b>Efectivo</b>',
        'ape_cie'=>'<b>Cierre</b>',
        'ape_est'=>'<b>Estado</b>',
        'ape_dif'=>'<b>Diferencia</b>',
        'usu_des'=>'<b>Usuario</b>',
        'fecha'=>'<b>Fecha Apertura</b>'
			
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

$txttit = "<b>                                                                     $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Detallado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>$descripcion</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);

$query="SELECT REPLACE(FORMAT(SUM(REPLACE(ape_dot,'.','')),0),',','.') AS dotacion,
REPLACE(FORMAT(SUM(REPLACE(ape_efe,'.','')),0),',','.') AS efectivo,
REPLACE(FORMAT(SUM(REPLACE(ape_cie,'.','')),0),',','.') AS cierre,
REPLACE(FORMAT(SUM(REPLACE(ape_dif,'.','')),0),',','.') AS diferencia
from ($contenido) as tmp";
$rs=mysql_query($query);
$ape_dot=mysql_result($rs,0,"dotacion");
$ape_efe=mysql_result($rs,0,"efectivo");
$ape_cie=mysql_result($rs,0,"cierre");
$ape_dif=mysql_result($rs,0,"diferencia");

 

$pdf->ezText("", 10);
$pdf->ezText("<b>Total Dotacion : </b> ".$ape_dot ."", 10);
$pdf->ezText("<b>Total Dotacion + ventas (rendido) : </b> ".$ape_efe ."", 10);
$pdf->ezText("<b>Total Cierre ventas (sistema) : </b> ".$ape_cie ."", 10);
$pdf->ezText("<b>Total diferencia : </b> ".$ape_dif ."", 10);




$pdf->ezText("<b>Item :</b> ".$ixx ."", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>