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
$variable2=$_GET["mes_cod"];
 /*
$consulta="SELECT * FROM mesas WHERE mes_cod='$variable2'";
$rs_tabla = mysql_query($consulta);
$variable2=mysql_result($rs_tabla,0,"mes_des");*/

//$linea=$_GET["linea"];
$query="select *,(select pro_des from productos where pro_cod=tmp.pro_cod) as pro_des
,(select pro_bar from productos where pro_cod=tmp.pro_cod) 
as pro_bar, 
(SELECT pro_gus1 FROM factura_det WHERE mde_cod=tmp.numlinea)AS pro_gus1 ,
(SELECT pro_gus2 FROM factura_det WHERE mde_cod=tmp.numlinea) AS pro_gus2
from tmp where nro_fac='$variable1'";
$res=mysql_query($query);


$txttit.= "<b> ----------------------------------------</b>\n";
$txttit.= "<b>          $emp_des</b>\n";
$txttit.= "<b> ----------------------------------------</b>\n";
$txttit.= "<b> Orden Nro.: $variable1</b>\n";
$txttit.= "<b> Mesa Nro.: $variable2</b>\n";
$txttit.= "<b> ----------------------------------------</b>\n";
$txttit.= "<b> DESC. COD. CANT.</b>\n";
$txttit.= "<b> ----------------------------------------</b>\n";

while($row=mysql_fetch_array($res)) 
{
$codigo=$row[6];
$cantidad=$row[3];
$pro_gus1=$row[7];
$pro_gus2=$row[8];
$descripcion=substr($row['pro_des'],0,15) ;

if (!isset($pro_gus1)) {   
}else{
  $descripcion=$descripcion." / (".$pro_gus1.",".$pro_gus2.")";  
}




$txttit.= "<b> $descripcion - $cantidad </b>\n";

}
$txttit.= "<b> ----------------------------------------</b>\n";
$pdf->ezText($txttit, 10);
$pdf->ezText("<b> Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b> Hora:</b> ".date("H:i:s"), 10);
$pdf->ezText("<b> Usuario :</b> ".$usuario_desc."\n\n", 10);



ob_end_clean();  
$pdf->ezStream();          



?>