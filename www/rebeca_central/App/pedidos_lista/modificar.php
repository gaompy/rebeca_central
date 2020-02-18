<?php 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include("../conexion/conectar.php");
//include ("../permisos.php");
$par=$_GET["par"];
$variable1="";
$variable2="";
$variable3="";

if ($par=="alta"){
  $definicion="INSERTAR";
	$sel="SELECT max(cli_cod) as maximo FROM clientes_view";
	$rs=mysql_query($sel);
	$variable1=mysql_result($rs,0,"maximo")+1;
  
}else{
  $definicion="MODIFICAR";
  $variable1=$_GET["variable1"];
	$sel="SELECT * ,
(SELECT cli_des FROM clientes WHERE cli_cod=factura_cab.cli_cod) AS cli_des,
(SELECT cli_ruc FROM clientes WHERE cli_cod=factura_cab.cli_cod) AS cli_ruc
FROM factura_cab WHERE borrado='0' and fac_cod='$variable1'";
	$rs=mysql_query($sel);
  $variable1=mysql_result($rs,0,"fac_cod");
	$variable2=mysql_result($rs,0,"cli_des");
  $variable3=mysql_result($rs,0,"cli_ruc");
  
  

}


?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" >
<script type="text/javascript" src="../js/formato.js"></script>
<script language="javascript">

function inicio() {			
    document.getElementById("variable4").focus();                        
}
	function eliminar(variable1,fac_cod) {
			location.href="guardar.php?variable1=" + variable1 +"&accion=baja"+"&fac_cod="+fac_cod ;
		}
		function salir(){
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;
		}		
</script>
<head>
	<meta charset="utf-8" />
	<title><? echo strtoupper($descripcion); ?></title>
        
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="shortcut icon" href="img/logo.ico">
<body onLoad="inicio()">

<!-- Start Formoid form-->
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/jquery.min.js"></script>
<form id="form_busqueda" name="form_busqueda" action="guardar.php" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post">


<div class="title"><h2><? echo "PEDIDOS"; ?></h2></div>
	<div class="element-input"><label class="title"><b>Nro.Pedido</b><span class="required">*</span></label><input class="large" type="text" name="variable1" id="variable1" value="<? echo $variable1?>" required="required" readonly="yes"/></div>
	<div class="element-input"><label class="title"><b>Cliente/RUC</b><span class="required">*</span></label><input class="large" type="text" name="variable2" id="variable2" value="<? echo $variable2." / ".$variable3?>" required="required" size="50" maxlength="50" readonly="yes"/></div>
  
  <div class="element-input"><label class="title"><b>Codigo Producto</b><span class="required">*</span></label><input class="large" type="text" name="variable4" id="variable4"  required="required" size="50" maxlength="50" /></div>
  <div class="element-input"><label class="title"><b>Cantidad</b><span class="required">*</span></label><input class="medium" type="text" name="variable5" id="variable5"  required="required" size="50" maxlength="50" /></div>
  
    <div class="submit">
  <p>
   <input type="submit" value="Guardar"/>
    <input type="button" value="Volver Atras" onclick="salir()"/>    
    <input type="hidden" name="accion" id="accion" value="alta"/>
  </p>
</div>
  
  
 <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=1 ID="Table1">
  <?php
   	$sel_lineas="SELECT factura_det.mde_cod,factura_det.pro_cod, productos.pro_bar,productos.pro_des, familias_pro.fam_des, factura_det.pro_can,factura_det.pro_gus1,factura_det.pro_gus2, factura_det.pro_ven, factura_det.pro_tot, 
factura_det.mde_par,factura_det.hora,factura_det.borrado
FROM (factura_det INNER JOIN productos ON factura_det.pro_cod = productos.pro_cod) INNER JOIN familias_pro ON productos.fam_cod = familias_pro.fam_cod
WHERE factura_det.borrado='0' and factura_det.fac_cod='$variable1'  order by factura_det.mde_cod desc";

$rs_lineas=mysql_query($sel_lineas);
$nrs=mysql_num_rows($rs_lineas);
if ($nrs>0) { 
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"mde_cod");
	$pro_cod=mysql_result($rs_lineas,$i,"pro_cod");
  $pro_bar=mysql_result($rs_lineas,$i,"pro_bar");	
  $pro_des=strtoupper(mysql_result($rs_lineas,$i,"pro_des"));
	$fam_des=strtoupper(mysql_result($rs_lineas,$i,"fam_des"));
	$pro_can=mysql_result($rs_lineas,$i,"pro_can");
  $pro_gus1=mysql_result($rs_lineas,$i,"pro_gus1");
  $pro_gus2=mysql_result($rs_lineas,$i,"pro_gus2");
	$pro_cos=mysql_result($rs_lineas,$i,"pro_ven");
	$pro_tot=mysql_result($rs_lineas,$i,"pro_tot");

  ?>
   <td width="3%"><? echo $i+1?></td>
				<td width="5%"><? echo $pro_bar?></td>
        <td width="10%"><? echo $pro_des?></td>
        
				<td width="5%"><?  echo $pro_can?></td>
				<td width="5%"><?  echo number_format($pro_cos, 0, ",", ".");?></td>
				<td width="5%"><?  echo number_format($pro_tot, 0, ",", ".");?></td>
        <td width="3%"><a href="javascript:eliminar(<?php echo mysql_result($rs_lineas,$i,"mde_cod")?>,<?php echo $variable1?>)"><img src="../images/eliminar.jpg" width="16" height="16" border="0"  title="Eliminar"></a></td>
        </tr>
  <?php
   @$sumatotal=$sumatotal+$pro_tot;
   
   }
  ?>
  </table>
  <?php 
		}  ?>
   <div class="title"><h2><? echo "TOTAL = ".number_format(@$sumatotal, 0, ",", "."); ?></h2></div>
            

</form>
</body>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>

</html>
  	
