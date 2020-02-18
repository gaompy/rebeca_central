<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
include ("../fecha_hora.php"); 
include ("../conectar.php");

$variable1=$_GET["codigo"];
	
	$consulta="SELECT * FROM (SELECT *, (SELECT pro_can FROM productos WHERE pro_cod=tmp.pro_cod)AS stock_sistema
,(pro_can-(SELECT pro_can FROM productos WHERE pro_cod=tmp.pro_cod) )AS diferencia
FROM (SELECT inv_cod,pro_cod,pro_bar, pro_des,SUM(pro_can)AS pro_can, pro_cos,SUM(pro_tot) AS pro_tot,
REPLACE(FORMAT(pro_cos,0),',','.')AS pro_cos_for,REPLACE(FORMAT(SUM(pro_tot),0),',','.')AS pro_tot_for,borrado
FROM inventarios_det_view WHERE borrado='0'
GROUP BY pro_cod,inv_cod)AS tmp)AS tmp1 WHERE inv_cod='$variable1' ORDER BY pro_des";
	$rs_tabla = mysql_query($consulta);

for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
			$pro_cod=mysql_result($rs_tabla,$i,"pro_cod");					  
  		$pro_can=mysql_result($rs_tabla,$i,"pro_can");
      $pro_cos=mysql_result($rs_tabla,$i,"pro_cos");
      
      $sqlinv="update productos set pro_can='$pro_can',pro_cos='$pro_cos' 
      where pro_cod='$pro_cod'";
      $rsinv=mysql_query($sqlinv);      	
		}
	$consulta1="update inventario_cab set inv_par='2' where inv_cod='$variable1'";
	$rs_tabla1 = mysql_query($consulta1);
		
	header("Location:impresiones.php?codigo=$variable1");
  	?>
