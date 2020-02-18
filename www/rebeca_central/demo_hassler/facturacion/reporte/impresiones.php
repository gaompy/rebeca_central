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
$pdf =& new Cezpdf('LEGAL');
$pdf->selectFont('fonts/Courier.afm');
$pdf->ezSetCmMargins(2.6,0,1.5,0);
include("../../conectar.php");
include("conversor.php");
$variable1=$_GET["nrofactura"];
//*************************************************************************************************
$conta=0;
while ($conta < 3) {


$query3="SELECT factura_cab.fac_pri, factura_cab.fac_cod, factura_cab.cli_cod, clientes.cli_des,clientes.cli_dir,clientes.cli_tel, clientes.cli_con,factura_cab.for_cod,factura_cab.fecha
FROM factura_cab INNER JOIN clientes ON factura_cab.cli_cod = clientes.cli_cod
WHERE factura_cab.fac_cod='$variable1'";
$res3=mysql_query($query3);

$variable9=mysql_result($res3,0,"fac_pri");
$variable10=mysql_result($res3,0,"cli_des");
$variable11=mysql_result($res3,0,"cli_con");
$variable12=mysql_result($res3,0,"cli_dir");
$variable13=mysql_result($res3,0,"cli_tel");
$variable14=mysql_result($res3,0,"fecha");

$primeralinea=60-strlen($variable10);
$segundalinea=50-strlen($variable12);
$terceralinea=70-strlen($variable14);
$forma_pago=mysql_result($res3,0,"for_cod");
$contado="";
$credito="";

if ($forma_pago==1) {
$contado="X";
}else {
$credito="X";
}
 

$pdf->ezText("<b>                    </b> ".fechanueva($variable14).espacios($terceralinea).$contado."<b>              </b> ".$credito, 8);
$pdf->ezText("<b>                    </b> ".strtoupper($variable10).espacios($primeralinea).$variable11, 8);
$pdf->ezText("<b> </b> ");
$pdf->ezText("<b>       </b> ".strtoupper($variable12).espacios($segundalinea).$variable13, 8);
$pdf->ezText("<b> </b> ");
$pdf->ezText("<b> </b> ");
$pdf->ezText("<b> </b> ");


//****************************************************************
 

      
$contenido = "SELECT productos.pro_bar, productos.pro_des,pro_imp, SUM(factura_det.pro_can) AS pro_can ,factura_det.pro_cos,SUM(factura_det.pro_tot) AS pro_tot,factura_det.fac_cod
FROM factura_det INNER JOIN productos ON factura_det.pro_cod = productos.pro_cod
GROUP BY factura_det.fac_cod, factura_det.pro_cod, productos.pro_bar, productos.pro_des, factura_det.borrado
HAVING factura_det.fac_cod='$variable1' AND factura_det.borrado='0'"; 
$queEmp = $contenido;
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);


   
$contador=0;
$total_pro=0;
$grabadas10=0;
$grabadas5=0;
$exentas=0;       

while ($contador < mysql_num_rows($resEmp)) {
$total_pro=$total_pro+mysql_result($resEmp, $contador,"pro_tot");
$pro_imp=mysql_result($resEmp, $contador,"pro_imp");
$pro_des=mysql_result($resEmp, $contador,"pro_des");
$pro_can=mysql_result($resEmp, $contador,"pro_can");
$pro_cos=mysql_result($resEmp, $contador,"pro_cos");

if ($pro_imp=='10'){
$grabadas10=$grabadas10+mysql_result($resEmp, $contador,"pro_tot")/11;
@$impuesto=number_format(mysql_result($resEmp, $contador,"pro_tot"), 0, ",", ".");
@$imp10=@$impuesto;
}else {
@$imp10=0;
}

if ($pro_imp=='5'){
$grabadas5=$grabadas5+mysql_result($resEmp, $contador,"pro_tot")/21;
@$impuesto=number_format(mysql_result($resEmp, $contador,"pro_tot"), 0, ",", ".");
@$imp5=@$impuesto;
}else {
@$imp5=0;
}

if ($pro_imp=='0'){
$exentas=$grabadas5+mysql_result($resEmp, $contador,"pro_tot")/0;
@$impuesto=number_format(mysql_result($resEmp, $contador,"pro_tot"), 0, ",", ".");
$exe=@$impuesto;
}else {
$exe=0;
}


$contador++;

$terceralinea=10-strlen($pro_can);
$cuartalinea=48-strlen($pro_des);
$quintalinea=17-strlen($pro_cos);
$sextalinea=10-strlen($exe);
$septimalinea=13-strlen(@$imp5);
$octavalinea=1-strlen(@$imp10);
$pdf->ezText("<b></b>".$pro_can.espacios($terceralinea).strtoupper($pro_des).espacios($cuartalinea).number_format($pro_cos, 0, ",", ".").espacios($quintalinea).$exe.espacios($sextalinea).@$imp5.espacios($septimalinea).@$imp10.espacios($octavalinea), 8);

}

$espaciores=9-$contador;

$contador1=0;
while ($contador1 < $espaciores){

$pdf->ezText("<b>-         -                                               -                 -         -            -</b> ");
$contador1++;
}




$pdf->ezText("<b></b> ");
$pdf->ezText("<b></b> ");
$pdf->ezText("<b></b> ");
$pdf->ezText("<b></b> ");
$pdf->ezText("<b></b> ");
$pdf->ezText("<b>                             </b> ".num2letras($total_pro), 8);
$pdf->ezText("<b>                         </b> ".number_format($grabadas5, 0, ",", ".")."            ".number_format($grabadas10, 0, ",", ".")."                          ".number_format($grabadas5+$grabadas10+$exentas, 0, ",", ".")."                        ".number_format($total_pro, 0, ",", "."), 8);

//******************************

 $conta++;
 $co=0;
 if ($conta < 3){
 
  WHILE ($co < 15) {  
  $pdf->ezText("<b></b> ");
  $co++;
  
  } 
}

}

ob_end_clean();   
$pdf->ezStream();          



?>