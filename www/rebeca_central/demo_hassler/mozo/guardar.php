<?php
include ("../conectar.php"); 
include ("../fecha_hora.php"); 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;

  $variable1=$_GET["fac_cod"];
  $mes_cod=$_GET["mes_cod"];

  if ($variable1==0){
  $query1="SELECT MAX(fac_cod) AS maximo,
    MAX(ape_cod) AS ape_cod,
    MAX(aps_cod) AS aps_cod FROM factura_cab";
  $rs_query1=mysql_query($query1);
  $fac_cod=mysql_result($rs_query1,0,"maximo")+1;
  $ape_cod=mysql_result($rs_query1,0,"ape_cod");
  $aps_cod=mysql_result($rs_query1,0,"aps_cod");
  $cli_cod="1";
  
            $sel="INSERT INTO factura_cab (fac_cod,ape_cod,cli_cod,aps_cod,mes_cod,fecha,hora,usuario,borrado) 
				    VALUES ('$fac_cod','$ape_cod','$cli_cod','$aps_cod',$mes_cod,'$fecha','$hora','$usuario','0')";
				    $rs=mysql_query($sel);
            
            $sel="update mesas set mes_fac='$fac_cod',mes_est='1' where mes_cod='$mes_cod'";
				    $rs=mysql_query($sel);
  } else{
  $fac_cod=$variable1;
  }           	
  
  
	header("Location: pedido.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion&fac_cod=$fac_cod"); 

?>

