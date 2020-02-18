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

				'mov_cod'=>'<b>Codigo</b>',
				'mov_fec'=>'<b>Fecha</b>',
        'mov_nro'=>'<b>Nro.Cheque</b>',
        'ban_des'=>'<b>Bancos</b>',    
        'mov_obs'=>'<b>Concepto</b>',                    
        //'tcu_des'=>'<b>Tipo Cta.</b>',        
        'mov_par'=>'<b>Tipo Mov.</b>',
        'monto_dep'=>'<b>Dep.</b>',
        'monto_ext'=>'<b>Ext.</b>',
        'monto_sal'=>'<b>Saldo</b>',
        
			
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

$query1="SELECT SUM(mov_mon_dep) AS deposito,SUM(mov_mon_ext) AS extraccion 
FROM ($contenido) as tmp";
$rs1=mysql_query($query1);
$deposito=mysql_result($rs1,0,"deposito");
$extraccion=mysql_result($rs1,0,"extraccion");
$diferencia=$deposito-$extraccion; 
$deposito_tmp=number_format($deposito, 0, ",", ".");
$extraccion_tmp=number_format($extraccion, 0, ",", ".");
$diferencia=number_format($diferencia, 0, ",", ".");
  
$pdf->ezText("Total Depositos = $deposito_tmp", 10);
$pdf->ezText("Total Extracciones = $extraccion_tmp", 10);  
$pdf->ezText("**********Saldo General = $diferencia ***********************", 10);

$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>