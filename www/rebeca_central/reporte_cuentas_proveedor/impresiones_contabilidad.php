<?php
@@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$descripcion=$_SESSION["descripcion"] ;
$emp_des=$_SESSION["emp_des"];


require_once('../reportes/class.ezpdf.php');
$pdf =& new Cezpdf('a4','landscape');
$pdf->selectFont('../reportes/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);
//$pdf->addPngFromFile("../reportes/logo.png",580,650,100,72);
$pdf->addJpegFromFile("../reportes/logo.jpg",30,540,100,32);

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

				'fac_cod'=>'<b>Trans.Nro.</b>',
        'fac_num'=>'<b>Nro.doc</b>',
        'tipo_doc'=>'<b>Tipo.doc</b>',        
				'prv_des'=>'<b>Proveedor</b>',
        'prv_ruc'=>'<b>RUC</b>',

        'iva_10_formato'=>'<b>IVA 10</b>',
        'iva_5_formato'=>'<b>IVA 5</b>',
        'excento_formato'=>'<b>Excento</b>',
        'total_iva_formato'=>'<b>Total IVA</b>',
        'fecha'=>'<b>Fecha</b>'
			
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>800,
        'fontSize'=>8
			);

$txttit = "<b>                                                                     $emp_des</b>\n";
$txttit.= "<b>                                                                 Reporte Detallado</b>\n";
$txttit.= "<b></b>\n";
$txttit.= "<b>Libro IVA Compras</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Item :</b> ".$ixx ."", 10);
$pdf->ezText("***************************************", 10);

$iva_10=0;
$iva_5=0;
$excento=0;
$query1="select * from ($contenido)as tmp";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
    $fac_cod=mysql_result($rs1,$i,"fac_cod");
    $iva_10=mysql_result($rs1,$i,"iva_10")+$iva_10;
    $iva_5=mysql_result($rs1,$i,"iva_5")+$iva_5;
    $excento=mysql_result($rs1,$i,"excento")+$excento;
    
  }
$total_iva=$iva_10+$iva_5+$excento;   
$pdf->ezText("IVA 10:  ". number_format($iva_10, 0, ",", ".").".-", 10);
$pdf->ezText("IVA 5:  ". number_format($iva_5, 0, ",", ".").".-", 10);
$pdf->ezText("EXENTAS:  ". number_format($excento, 0, ",", ".").".-", 10);
//$pdf->ezText($query1, 10);  
  
$pdf->ezText("***************************************", 10);
$pdf->ezText("TOTAL IVA:  ". number_format($total_iva, 0, ",", ".").".-", 10);


$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>