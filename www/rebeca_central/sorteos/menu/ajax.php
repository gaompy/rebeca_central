<?php
session_start();
@$usu_cod=$_SESSION["usu_cod"];
 
include ("../fecha_hora.php"); 
include ("../conectar.php");
$resultado = $_POST['valorCaja1'] + $_POST['valorCaja2']; 
$sub_cod=$_POST['valorCaja1'];
$tit_cod=$_POST['valorCaja2'];

$query="insert into procesos(sub_cod,tit_cod,fecha,hora,usuario)
values('$sub_cod','$tit_cod','$fecha','$hora','$usu_cod')";					
$rs=mysql_query($query);


echo $resultado;       
?>