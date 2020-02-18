<?php
@session_start();
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../../fecha_hora.php"); 
include ("../../conectar.php");

      $variable1=$_GET["variable1"];
      $sqlinv="update hruta_cab set hru_est='1' where hru_cod='$variable1'";
      $rsinv=mysql_query($sqlinv);    
      
       
header("Location:../index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");      
?>