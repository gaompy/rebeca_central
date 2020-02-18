<?php


  include("config.php"); 
  $conexion=mysql_connect($Servidor,$Usuario,$Password) or die(header("Location:index.php"));
  $descriptor=mysql_select_db($BaseDeDatos,$conexion);
  


?>
