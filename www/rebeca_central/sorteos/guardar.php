<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
include ("../conectar.php"); 
include ("../fecha_hora.php"); 


  $variable1=$_GET["linea"];
  
  $query_sor="SELECT * FROM promo_det 
  WHERE borrado='0' AND pmd_est='0'
  ORDER BY RAND() LIMIT 1";
	$rs_query_sor=mysql_query($query_sor);
  $pmd_cel=mysql_result($rs_query_sor,0,"pmd_cel");
  $pmd_cod=mysql_result($rs_query_sor,0,"pmd_cod");
  $factura=mysql_result($rs_query_sor,0,"fac_cod");   
  
  $pmd_cel=str_replace("-","",($pmd_cel));
 
	$query="UPDATE promo_cab SET prm_est ='1', prm_cel='$pmd_cel',prm_fec='$fecha',fac_cod='$factura' where prm_cod='$variable1' ";
	$rs_query=mysql_query($query);
  
  $query="UPDATE promo_det SET pmd_est ='1', pmd_fec_sor='$fecha',prm_cod='$variable1' where pmd_est='0'";
	$rs_query=mysql_query($query);
  
  $query="UPDATE promo_det SET pmd_est ='2' where pmd_cod='$pmd_cod'";
	$rs_query=mysql_query($query);
 
	header("Location: index.php");
?>