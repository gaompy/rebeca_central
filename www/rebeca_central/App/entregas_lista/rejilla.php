<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];

$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
include ("../conexion/conectar.php");


$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($variable1 <> "") { $where.=" AND fac_cod='$variable1'"; }
if ($variable2 <> "") { $where.=" AND cli_des like '%".$variable2."%'"; }



$where.=" ORDER BY fac_cod desc";
?>
<script type="text/javascript" src="../js/bootbox.min.js"></script> 
<style type="text/css">
a {color:black; text-decoration:none}
</style>
<style type="text/css">

@media only screen and (max-width: 480px), only screen and (max-device-width: 480px) {
  /*aqu� nuestro cSS para dispositivos m�viles*/
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
  position: absolute; bottom: -40px; /*la altura del pi� en negativo*/
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
 width: 44%; /*a esta celda le damos un poco m�s de amplitud para dejar m�s espacio para el conmutador +/- */
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
<script>
	function modificar(variable1) {
     parent.location.href="pedidos.php?variable1=" + variable1 +"&par=modificar";
	}

</script>
<html>
<head>
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
<script type="text/javascript" src="../files/jquery.min.js"></script> 

<body>
	</head>
  <form id="form_busqueda" name="form_busqueda"  class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px">
<table>
   
   <?php $sel_resultado="SELECT * 
FROM factura_cab_view WHERE borrado='0' and fac_est='1' and fac_ent='0'  AND usuario='$usuario' AND ".$where;
		$res_resultado=mysql_query($sel_resultado);    
		$contador=0;						   
    $nrs=mysql_num_rows($res_resultado);?>
      <tr><b>PedNro. / </b></tr>
      <tr><b>Cliente / </b></tr>
      
      <tr><b>Fecha / </b></tr>
      <tr><b>Item(<?php echo $nrs?>)</b></tr><br><br>
    <?php
  		while ($contador < mysql_num_rows($res_resultado)) {
		?>						   
  		<tr><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"fac_cod")?>)"><b>[<?php echo mysql_result($res_resultado,$contador,"fac_cod") ?>]- </b></a></tr>                               
      <tr><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"fac_cod")?>)"><b><?php echo strtoupper(mysql_result($res_resultado,$contador,"cli_des"));?> * (</b></a></tr>
      <tr><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"fac_cod")?>)"><b><?php echo strtoupper(mysql_result($res_resultado,$contador,"fecha"));?>)</b></tr></a><br><br>
      						
						     
			<?php $contador++;
			}
			?>			


  </table>
  </form>
	</body>
</html>

