<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$emp_des=$_SESSION["emp_des"];


require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
//$pdf->addJpegFromFile("../../img/logo.",40,750,150,72);

include ("../../conectar.php");

$queEmp = "select * from tmp_$usuario order by niv_cod asc";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$query="SELECT count(*) as cuenta from tmp_$usuario";
$query_ejec = mysql_query($query, $conexion)or die(mysql_error());
$query_cantidad=mysql_result($query_ejec,0,"cuenta");

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(



				'niv_cod'=>'<b>Codigo</b>',
				'niv_des'=>'<b>Descripcion</b>',
				'fecha'=>'<b>Fecha</b>',
				'hora'=>'<b>hora</b>'
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);

$txttit = "<b>                                                                $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Consolidado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Lista de Perfiles</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Cantidad :</b> ".$query_cantidad."\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
$pdf->ezStream();

$query_operacion2="drop table `tmp_$usuario`";
$rs_operacion2=mysql_query($query_operacion2);
?>