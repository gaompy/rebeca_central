<?php
function fechanueva($fechavieja){
    list($a,$m,$d)=explode("-",$fechavieja);
    if ($m=='01'){$mes="ENERO";}
    if ($m=='02'){$mes="FEBRERO";}
    if ($m=='03'){$mes="MARZO";}
    if ($m=='04'){$mes="ABRIL";}
    if ($m=='05'){$mes="MAYO";}
    if ($m=='06'){$mes="JUNIO";}
    if ($m=='07'){$mes="JULIO";}
    if ($m=='08'){$mes="AGOSTO";}
    if ($m=='09'){$mes="SETIEMBRE";}
    if ($m=='10'){$mes="OCTUBRE";}
    if ($m=='11'){$mes="NOVIEMBRE";}
    if ($m=='12'){$mes="DICIEMBRE";}    
    return $d." ".$mes." ".substr($a, -0);
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
set_time_limit(250); 
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('A4','landscape');
$pdf->selectFont('fonts/Courier.afm');
$pdf->ezSetCmMargins(3,0,1,0);
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$fecha=date("d-m-Y");
$emp_des=$_SESSION["emp_des"];
$suc_cod=$_SESSION["suc_cod"];


include("../../conectar.php");
include("conversor.php");
$variable1=$_GET["nrofactura"];
$variable2=$_GET["factura"];
$variable3=$_GET["codcliente"];
include("insertar_factura.php");
$update_factura="update factura_cab set fac_num='$variable2', cli_cod='$variable3' where fac_cod='$variable1'";
$res=mysql_query($update_factura);

$query_con="SELECT COUNT(*) AS cuenta FROM 
factura_det WHERE borrado='0' AND fac_cod='$variable1'
AND (SELECT pro_bol FROM productos WHERE pro_cod=factura_det.pro_cod)=0";
$res_con=mysql_query($query_con);
$cuenta_fac=mysql_result($res_con,0,"cuenta");
$multiplo=ceil($cuenta_fac/18);
$aux=0;
$limit=0;

//*************************************************************************************************
$conta=0;
while ($conta < 1) {


$query3="SELECT *, 
(SELECT cli_des FROM clientes WHERE cli_cod=factura_cab.cli_cod) AS cli_des,
(SELECT cli_ruc FROM clientes WHERE cli_cod=factura_cab.cli_cod) AS cli_con,
(SELECT cli_dir FROM clientes WHERE cli_cod=factura_cab.cli_cod) AS cli_dir,
(SELECT cli_tel FROM clientes WHERE cli_cod=factura_cab.cli_cod) AS cli_tel
FROM factura_cab WHERE fac_cod='$variable1'";
$res3=mysql_query($query3);

$variable9=mysql_result($res3,0,"fac_cod");
$variable10=mysql_result($res3,0,"cli_des");
$variable11=mysql_result($res3,0,"cli_con");
$variable12=mysql_result($res3,0,"cli_dir");
$variable13=mysql_result($res3,0,"cli_tel");
$variable14=mysql_result($res3,0,"fecha");

$primeralinea=60-strlen($variable10);
$segundalinea=10-strlen($variable12);
$terceralinea=50-strlen($variable14);
$forma_pago=mysql_result($res3,0,"for_cod");
$contado="";
$credito="";

if ($forma_pago==1) {
$contado="Contado: X";
}else {
$contado="Contado: X";
}
$pdf->ezText("<b> </b> ");
$pdf->ezText("<b> </b> ");
$pdf->ezText(" Fecha : ".fechanueva($variable14).espacios($terceralinea).$contado." ".$credito."            Fecha : ".fechanueva($variable14).espacios($terceralinea).$contado." ".$credito, 8);
$pdf->ezText(" Cliente : ".strtoupper($variable10)."                                                                     Cliente : ".strtoupper($variable10), 8);
$pdf->ezText(" RUC: ".strtoupper($variable11)."                                                                         RUC: ".strtoupper($variable11), 8);
$pdf->ezText(" Direccion: ".strtoupper($variable12)."  Telefono :".espacios($segundalinea).$variable13."                                  Direccion: ".strtoupper($variable12)."  Telefono :".espacios($segundalinea).$variable13, 8);
$pdf->ezText("<b>_______________________________________________________________________________          _______________________________________________________________________________</b> ");
$pdf->ezText("<b> </b> ");


//****************************************************************
$contenido = "SELECT factura_det.mde_cod,factura_det.pro_cod, productos.pro_bar,productos.pro_des,productos.pro_imp, productos.pro_bol, familias_pro.fam_des, factura_det.pro_can,factura_det.pro_gus1,factura_det.pro_gus2, factura_det.pro_ven, factura_det.pro_tot, 
factura_det.mde_par,factura_det.hora,factura_det.borrado
FROM (factura_det INNER JOIN productos ON factura_det.pro_cod = productos.pro_cod) INNER JOIN familias_pro ON productos.fam_cod = familias_pro.fam_cod
WHERE factura_det.borrado='0' AND factura_det.fac_cod='$variable1' AND productos.pro_bol='0' ORDER BY factura_det.mde_cod asc
limit $limit,18"; 
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
$pro_cos=mysql_result($resEmp, $contador,"pro_ven");
$pro_bar=mysql_result($resEmp, $contador,"pro_bar");

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

$terceralinea=5-strlen($pro_can);
$cuartalinea=27-strlen($pro_des);
$quintalinea=8-strlen($pro_cos);
$sextalinea=10-strlen($exe);
$septimalinea=10-strlen(@$imp5);
$octavalinea=1-strlen(@$imp10);
$pdf->ezText("<b>    </b>".substr($pro_bar, -2)."<b>   </b>".$pro_can.espacios($terceralinea).
strtoupper($pro_des).espacios($cuartalinea).number_format($pro_cos, 0, ",", ".").
espacios($quintalinea).$exe.espacios($sextalinea).@$imp5.espacios($septimalinea).@$imp10.
espacios($octavalinea)."<b>            </b>".substr($pro_bar, -2)."<b>   </b>".$pro_can.espacios($terceralinea).
strtoupper($pro_des).espacios($cuartalinea).number_format($pro_cos, 0, ",", ".").
espacios($quintalinea).$exe.espacios($sextalinea).@$imp5.espacios($septimalinea).@$imp10.
espacios($octavalinea), 8);

}

$espaciores=36-$contador;

$contador1=0;
while ($contador1 < $espaciores){

$pdf->ezText("<b>     -    -                -                         -         -            -</b>        <b>     -    -                -                         -         -            -</b>");
$contador1++;
}

$pdf->ezText("<b></b> ");
$pdf->ezText("<b></b> ");
$pdf->ezText("<b></b> ");

$pdf->ezText("<b>_______________________________________________________________________________        _______________________________________________________________________________</b> ");
$pdf->ezText("<b></b> ");
$pdf->ezText(" En Letras: ".num2letras($total_pro)."                                                En Letras: ".num2letras($total_pro), 8);
$pdf->ezText(" IVA 5% : ".number_format($grabadas5, 0, ",", ".")."     IVA 10% : ".number_format($grabadas10, 0, ",", ".")."  Total IVA : ".number_format($grabadas5+$grabadas10+$exentas, 0, ",", ".")."   TOTAL A PAG. :".number_format($total_pro, 0, ",", ".")."            IVA 5% : ".number_format($grabadas5, 0, ",", ".")."     IVA 10% : ".number_format($grabadas10, 0, ",", ".")."  Total IVA : ".number_format($grabadas5+$grabadas10+$exentas, 0, ",", ".")."   TOTAL A PAG. :".number_format($total_pro, 0, ",", "."), 8);

//******************************
 $conta++;
 
}

ob_end_clean();   
$pdf->ezStream();  
?>