<?php
function fechanueva($fechavieja){
    list($a,$m,$d)=explode("-",$fechavieja);
    return $d."-".$m."-".$a;
};


function espacios($variable){
  $cont=0;
  $espacio="";
  while ($cont < $variable) {
  $espacio=$espacio." ";
  $cont++;
}
return $espacio;
};

?>

<?php
@@session_start();
set_time_limit(50); 

$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$fecha=date("d-m-Y");
$emp_des=$_SESSION["emp_des"];
$suc_cod=$_SESSION["suc_cod"];

require_once('class.ezpdf.php');
$pdf =& new Cezpdf('TICKET');
$pdf->selectFont('fonts/Helvetica.afm');
$pdf->ezSetCmMargins(0,0,0,0);
include("../../conectar.php");
$variable1=$_GET["nrofactura"];
$variable2=$_GET["mesa"];
$linea=$_GET["linea"];
$query="select *,(select pro_des from productos where pro_cod=factura_det.pro_cod)
as pro_des from factura_det where fac_cod='$variable1' and mde_cod='$linea' and borrado='0'";
$res=mysql_query($query);


$txttit.= "<b> ----------------------------------------</b>\n";
$txttit.= "<b>          $emp_des</b>\n";
$txttit.= "<b> ----------------------------------------</b>\n";
$txttit.= "<b> Orden Nro.: $variable1</b>\n";
$txttit.= "<b> Mesa Nro.: $variable2</b>\n";
$txttit.= "<b> ----------------------------------------</b>\n";
$txttit.= "<b> COD. DESC. CANT.</b>\n";
$txttit.= "<b> ----------------------------------------</b>\n";

while($row=mysql_fetch_array($res)) 
{
$codigo=$row[4];
$cantidad=$row[5];
$descripcion=substr($row['pro_des'],0,15) ;

$txttit.= "<b> $codigo-$descripcion-$cantidad </b>\n";

}
$txttit.= "<b> ----------------------------------------</b>\n";
$pdf->ezText($txttit, 10);
$pdf->ezText("<b> Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b> Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b> Usuario :</b> ".$usuario_desc."\n\n", 10);



ob_end_clean();  
$pdf->ezStream();          



?>