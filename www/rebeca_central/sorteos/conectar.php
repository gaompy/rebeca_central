<?php
  include("config.php"); 
  @$conexion=mysql_connect($Servidor,$Usuario,$Password) or die("Error contacte con administrador");
  @$descriptor=mysql_select_db($BaseDeDatos,$conexion);
?>