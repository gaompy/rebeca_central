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
  
  $sel_sum="SELECT SUM(pro_tot) AS total,count(*) as cuenta FROM factura_det WHERE borrado='0' AND fac_cod='$variable1'
  GROUP BY fac_cod";
	$rs_sum=mysql_query($sel_sum);
  $nrs=mysql_num_rows($rs_sum);
  if ($nrs>0) {
  $item=mysql_result($rs_sum,0,"cuenta");
  $sumatotal=mysql_result($rs_sum,0,"total");
  }else{
  $sumatotal="0";
  $item="0";
  }
 }
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" >

<style type="text/css">
a {color:black; text-decoration:none}
</style>

<style type="text/css">
@media only screen and (max-width: 480px), only screen and (max-device-width: 480px) {
  /*aquí nuestro cSS para dispositivos móviles*/
}
@media (max-width: 480px) {
  table, thead, tfoot, tbody, tr {
   display:block;
 }
thead tr th {
 display:none;
 }
/*Si usamos tfoot*/
 table {
  position: relative;
  }
 tfoot {
  position: absolute; bottom: -40px; /*la altura del pié en negativo*/
  width:inherit;
  }
}
/*encabezados de las filas*/
 tbody th {
 display: inline-block;
 width: 34%;
 }
/*primera celda de cada fila que no sea un encabezado*/
tbody td:first-of-type {
 display: inline-block;
 width: 44%; /*a esta celda le damos un poco más de amplitud para dejar más espacio para el conmutador +/- */
 }
 /*nuestro ejemplo*/
 thead tr th:first-child {
 display: block;
 width: inherit; padding: 2% 5%;
 font: bold normal 16px/20px Arial, Helvetica, sans-serif;
 text-align: center;
 }
 /*tomamos todos los elementos a partir del cuarto por la cola, que es lo mismo que mostrar los 2 primeros*/
 thead tr th:nth-last-child(1n+4) {
 display: inline-block;
 width: 40%; padding: 2% 5%;
 font: bold normal 16px/20px Arial, Helvetica, sans-serif;
 }
 
</style>


<script type="text/javascript" src="../js/formato.js"></script>
<script language="javascript">

function inicio() {			
    document.getElementById("variable4").focus();                        
}
	function eliminar(variable1,fac_cod) {
			location.href="guardar_pedidos.php?variable1=" + variable1 +"&accion=baja"+"&fac_cod="+fac_cod ;
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
<link href="../css/jquery-ui.css" rel="stylesheet">
<script src="../css/jquery.js"></script>
<script src="../css/jquery-ui.js"></script>

<form id="form_busqueda" name="form_busqueda" action="guardar_pedidos.php" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post" autocomplete="off">
<div class="title"><h2><? echo "SISTEMA PEDIDOS" ?></h2></div>
<label class="title"><b><? echo "PEDIDO NRO.: ".$variable1;  ?></b></label>
<label class="title"><b><? echo $variable2." / ".$variable3;  ?></b></label>
<label class="title"><b><? echo "TOTAL = ".number_format($sumatotal, 0, ",", ".")." - CANT: ".$item; ?></b></label>
  <div class="element-input" class="demoHeaders"><label class="title"><b>Codigo/Nombre de Producto</b><span class="required">*</span></label><input class="large" type="text" name="variable4" id="variable4"  required="required" size="150" placeholder="Codigo/Descripcion" maxlength="150" /></div>
  
  <div class="element-number"><label class="title"><b>Cantidad</b><span class="required">*</span></label><div class="item-cont"><input class="medium" type="text" min="1" max="100000" id="variable5" name="variable5" required="required" placeholder="Cantidad" value=""/><span class="icon-place"></span></div></div>
  
    <div class="submit">
  <p>
   <input type="submit" value="Guardar"/>
    <input type="button" value="Volver Atras" onclick="salir()"/>    
    <input type="hidden" name="accion" id="accion" value="alta"/>
    <input type="hidden" name="variable1" id="variable1" value="<?php echo $variable1;?>"/>
  </p>
</div>
  
  
 <table border=0>
  <thead>
  <tr>
   <b>Descripcion</b>
  </tr>
  
    <tr>
   <b> - Precios</b>
  </tr>

 </thead>
  <tbody>
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
  $item=$i+1;

  ?>
  
  <tr>
   
	 <td><a href="javascript:eliminar(<?php echo mysql_result($rs_lineas,$i,"mde_cod")?>,<?php echo $variable1?>)"><? echo "<b>".$item.")</br> ".$pro_bar."-".$pro_des."(CANT.".$pro_can.")"?></td>        				
	 <th><a href="javascript:eliminar(<?php echo mysql_result($rs_lineas,$i,"mde_cod")?>,<?php echo $variable1?>)"><?  echo number_format($pro_cos, 0, ",", ".")." / ".number_format($pro_tot, 0, ",", ".");?></th>
   				
   </tr>
    
  <?php   
   }
  ?>
  </tbody>
  </table>
  <?php 
		}  ?>
   
            

</form>
</body>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
<script>
var listar_productos = 
<?php

$query="SELECT pro_bar,pro_des,pro_ven FROM productos WHERE borrado=0 order by pro_des";
$rs=mysql_query($query);
   
?>    
[
<?php
$contador=0;						   
while ($contador < mysql_num_rows($rs)) {
$pro_bar=mysql_result($rs,$contador,"pro_bar");
$pro_des=mysql_result($rs,$contador,"pro_des");
$pro_can=mysql_result($rs,$contador,"pro_ven");
$pro_cod_des=$pro_bar."=(ST.".$pro_can.")".$pro_des;
?>
  "<?php echo $pro_cod_des ?>",
<?php
$contador++;
}
?>
]; 

$( "#variable4" ).autocomplete({
	source: listar_productos
});
</script>
</html>
  	
