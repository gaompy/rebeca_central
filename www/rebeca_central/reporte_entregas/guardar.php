<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../fecha_hora.php"); 
include ("../conectar.php"); 

$accion=$_POST["accion"];
if (!isset($accion)) { echo $accion=$_GET["accion"]; }

if ($accion=="alta") {

$variable1=$_POST["variable1"];
$retirado=strtoupper($_POST["retirado"]);
$sel_lineas="SELECT factura_det.mde_cod,factura_det.pro_cod, productos.pro_bar,productos.pro_des, familias_pro.fam_des, factura_det.pro_can,factura_det.pro_gus1,factura_det.pro_gus2, factura_det.pro_ven, factura_det.pro_tot, 
factura_det.mde_par,factura_det.hora,factura_det.borrado
FROM (factura_det INNER JOIN productos ON factura_det.pro_cod = productos.pro_cod) INNER JOIN familias_pro ON productos.fam_cod = familias_pro.fam_cod
WHERE factura_det.borrado='0' and factura_det.fac_cod='$variable1'  order by factura_det.mde_cod desc";
$rs_lineas=mysql_query($sel_lineas);

for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"mde_cod");
  $mde_cod=$_POST["lin_".$numlinea];
  $conf=$_POST["var_".$numlinea];
  
  $up="update factura_det set mde_par='$conf' where mde_cod='$mde_cod'";
  $rs=mysql_query($up);
  
  }
  
  $query="select count(*) as cuenta from ($sel_lineas) as tmp";
  $rs_query=mysql_query($query);
  $cuenta_total=mysql_result($rs_query,0,"cuenta");
  
  $query="select count(*) as cuenta from ($sel_lineas) as tmp WHERE mde_par='1'";
  $rs_query=mysql_query($query);
  $cuenta_up=mysql_result($rs_query,0,"cuenta");  
  
  if ($cuenta_total==$cuenta_up){
    $up="update factura_cab set fac_ent='1', fac_rec='$retirado' where fac_cod='$variable1'";
    $rs=mysql_query($up);
  }
  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
}
	
?>

