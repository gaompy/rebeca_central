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
@session_start();
set_time_limit(50); 

$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$fecha=date("d-m-Y");
$emp_des=$_SESSION["emp_des"];
$suc_cod=$_SESSION["suc_cod"];

require_once('class.ezpdf.php');
$pdf =& new Cezpdf('TICKET');
$pdf->selectFont('fonts/Courier.afm');
$pdf->ezSetCmMargins(0,0,0,0);
include("../../conectar.php");
include("conversor.php");

$variable1=$_GET["nrofactura"];
$variable2=$_GET["mesa"];
@$importe=str_replace(".","",($_GET["importe"]));

$query="SELECT factura_det.fac_cod, factura_det.pro_cod, productos.pro_bar, productos.pro_des, SUM(factura_det.pro_can) AS pro_can, SUM(factura_det.pro_tot) AS pro_tot, factura_det.borrado
FROM factura_det INNER JOIN productos ON factura_det.pro_cod = productos.pro_cod
GROUP BY factura_det.fac_cod, factura_det.pro_cod, productos.pro_bar, productos.pro_des, factura_det.borrado
HAVING factura_det.fac_cod='$variable1' AND factura_det.borrado='0'";
$res=mysql_query($query);

$query1="SELECT * 
FROM clientes 
WHERE cli_cod=(SELECT cli_cod FROM factura_cab WHERE fac_cod='$variable1')";
$res1=mysql_query($query1);
$cli_des=mysql_result($res1,0,"cli_des");
$cli_ruc=mysql_result($res1,0,"cli_ruc");



$txttit.= "<b> --------------------</b>\n";
$txttit.= "<b>      $emp_des</b>\n";

$txttit.= "<b> --------------------</b>\n";
$txttit.= " Ped. Nro.: $variable1\n";
$txttit.= " Cliente: $cli_des\n";
$txttit.= " RUC: $cli_ruc\n";

$txttit.= "<b> --------------------</b>\n";
$txttit.= " DESC. CANT.   SUBTOT\n";

$txttit.= "<b> --------------------</b>\n";

while($row=mysql_fetch_array($res)) 
{
$contador++;
$codigo=$row['pro_bar'];
$cantidad=$row['pro_can'];
$descripcion=substr($row['pro_des'],0,15) ;
$subtotal=substr($row['pro_tot'],0,15) ;
$subformato=number_format($subtotal, 0, ",", ".");

$txttit.= "$descripcion-$cantidad-$subformato\n";
$total=$subtotal+$total;
}
$totalformato=number_format($total, 0, ",", ".");
$vuelto=(@$importe-$total);
$vuelto_formato=number_format($vuelto, 0, ",", ".");

$txttit.= "<b> --------------------</b>\n";
$txttit.= "<b> Total a Pagar: $totalformato</b>\n";
$txttit.= " VUELTO: $vuelto_formato\n";
$pdf->ezText($txttit, 7);
$pdf->ezText("<b></b> ".num2letras($total), 7);
$pdf->ezText(" Fecha: ".date("d/m/Y"), 7);
$pdf->ezText(" Hora: ".date("H:i:s"), 7);
$pdf->ezText(" Usuario : ".$usuario_desc."\n\n", 7);

ob_end_clean();  
$pdf->ezStream();          

?>