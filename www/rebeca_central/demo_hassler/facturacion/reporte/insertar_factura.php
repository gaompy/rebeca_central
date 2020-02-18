<?php
@session_start();
 $usuario=$_SESSION["id_usuario"];
 include("../../conectar.php");
 include("../../fecha_hora.php");
 
 $var1=substr($variable2, 0,3);
 $var2=substr($variable2, 4,3);
 $var3=substr($variable2, -7);
 
 for ($a = 0; $a < $multiplo; $a++) {
  if ($a > 0){
    $var3=$var3+1;
    $query="insert into factura_imp(fim_ini,fim_fin,fim_num,fac_cod,fecha,hora,usuario) 
    values('$var1','$var2','$var3','$variable1','$fecha','$hora','$usuario')";
    mysql_query($query);

  }else{
    $query="insert into factura_imp(fim_ini,fim_fin,fim_num,fac_cod,fecha,hora,usuario) 
    values('$var1','$var2','$var3','$variable1','$fecha','$hora','$usuario')";
    mysql_query($query);
  } 
 }
 
?>