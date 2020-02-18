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

				'fac_cod'=>'<b>Ticket</b>',
        'fac_num'=>'<b>Factura</b>',
				'cli_des'=>'<b>Cliente</b>',
        'mpg_des'=>'<b>Medio Pago</b>',
        'for_des'=>'<b>Forma Pago</b>',
        'tie_des'=>'<b>Tipo Envio</b>',
        'mes_des'=>'<b>Punto</b>',
        'estado'=>'<b>Estado</b>',
        'fac_sal'=>'<b>Saldo</b>',
        'tmo_des'=>'<b>Moneda</b>',
        //'cot_mon'=>'<b>Monto(otros)</b>',
        'fac_tot_1'=>'<b>Monto(Gs.)</b>',
        'fac_uti_1'=>'<b>Utilidad</b>',
        'ape_cod'=>'<b>Apertura</b>',
        'usu_des'=>'<b>Usuario</b>',
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
$txttit.= "<b>$descripcion</b>\n";
$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("<b>Item :</b> ".$ixx ."", 10);
$pdf->ezText("***************************************", 10);

$query1="SELECT tmo_cod,(SELECT tmo_des FROM tipo_moneda WHERE tmo_cod=tmp.tmo_cod)AS tmo_des
,SUM(cot_mon) AS cot_mon, (SELECT cot_ven FROM cotizaciones WHERE cot_cod=tmp.cot_cod) AS cot_ven 
FROM ($contenido)as tmp  WHERE borrado=0 AND tmo_cod >0
GROUP BY tmo_cod,cot_cod";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
    $tmo_cod=mysql_result($rs1,$i,"tmo_cod");
    $tmo_des=mysql_result($rs1,$i,"tmo_des");
    $cot_mon=mysql_result($rs1,$i,"cot_mon");
    $cot_ven=mysql_result($rs1,$i,"cot_ven");
    
    if ($tmo_cod==1){$monto=number_format($cot_mon, 0, ",", ".");}else{$monto=str_replace(".",",",($cot_mon))." -cot. (".number_format($cot_ven, 0, ",", ".").")";}
        
    $pdf->ezText("<b></b> ".$tmo_des." - ".$monto."", 10);
  } 
$pdf->ezText("***************************************", 10);

$query1="SELECT for_cod,(SELECT for_des FROM formas_pago WHERE for_cod=tmp.for_cod)AS for_des
,SUM(fac_tot) AS fac_tot 
FROM ($contenido)as tmp 
WHERE borrado='0' 
GROUP BY for_cod";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
       $for_cod=mysql_result($rs1,$i,"for_cod");
       $for_des=mysql_result($rs1,$i,"for_des");
       $fac_tot=mysql_result($rs1,$i,"fac_tot");
      $pdf->ezText("<b></b> ".$for_des." - ".number_format($fac_tot, 0, ",", ".")."", 10);  
  } 

$pdf->ezText("***************************************", 10);
$query1="SELECT mpg_cod,(SELECT mpg_des FROM medios_pago WHERE mpg_cod=tmp.mpg_cod)AS mpg_des
,SUM(fac_tot) AS fac_tot 
FROM ($contenido)as tmp 
WHERE borrado='0'
GROUP BY mpg_cod";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
       $mpg_cod=mysql_result($rs1,$i,"mpg_cod");
       $mpg_des=mysql_result($rs1,$i,"mpg_des");
       $fac_tot=mysql_result($rs1,$i,"fac_tot");
      $pdf->ezText("<b></b> ".$mpg_des." - ".number_format($fac_tot, 0, ",", ".")."", 10);  
  } 
$pdf->ezText("***************************************", 10);
$total_gral=0;
$total_uti_gral=0;
$query1="SELECT tie_cod,(SELECT tie_des FROM tipo_envio WHERE tie_cod=tmp.tie_cod)AS tie_des
,SUM(fac_tot) AS fac_tot,sum(fac_uti) as pro_uti_gral 
FROM ($contenido)as tmp 
WHERE borrado='0'
GROUP BY tie_cod";
$rs1=mysql_query($query1);

  for ($i = 0; $i < mysql_num_rows($rs1); $i++) {
       $tie_cod=mysql_result($rs1,$i,"tie_cod");
       $tie_des=mysql_result($rs1,$i,"tie_des");
       $fac_tot=mysql_result($rs1,$i,"fac_tot");
       $pro_uti_gral=mysql_result($rs1,$i,"pro_uti_gral");
       $pdf->ezText("<b></b> ".$tie_des." - ".number_format($fac_tot, 0, ",", ".")."", 10);
       $total_gral=$fac_tot+$total_gral; 
       $total_uti_gral=$pro_uti_gral+$total_uti_gral;
  }
 $total_general=number_format($total_gral, 0, ",", ".");  
 $uti_general=number_format($total_uti_gral, 0, ",", "."); 
 
 $porc= round($total_uti_gral*100/ $total_gral,2);


$pdf->ezText("*************************************** Total General :  $total_general en Gs. ****************************************** Utilidad: $uti_general ******************* Porc.%: $porc   ", 10);




$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b>Usuario :</b> ".$usuario_desc."\n\n", 10);
ob_end_clean();
$pdf->ezStream();
?>