<?php 
include ("../conectar.php"); 
$variable1 = $_POST['valorCaja1'];

	$sel_ruc="SELECT count(*) as cuenta 
  from proveedores where borrado='0' and prv_ruc='$variable1'";
	$rs_ruc=mysql_query($sel_ruc);
	$contador=mysql_result($rs_ruc,0,"cuenta");
 
    if ($contador > '0'){
     $resultado="Ya existe RUC en la base de datos!";
    }else{
     $resultado="RUC habilitado a ingresar...";
    }

echo $resultado;


?>