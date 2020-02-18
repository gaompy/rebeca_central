<?php
  include("config.php"); 
  @$conexion=mysql_connect($Servidor,$Usuario,$Password);
  mysql_select_db($BaseDeDatos,$conexion);  
?>