<?php
session_start();
$user=$_POST['username'];
$pass=md5($_POST['password']);
$emp_des="ADRDM Comercial";
include("conexion/conectar.php");
include("conexion/fecha_hora.php");

$query="select *
from usuarios 
where usuario='$user' and password='$pass' and borrado=0";
$rs=mysql_query($query);
$cuenta = mysql_num_rows($rs);
if ($cuenta==1){

		$id_usuario=mysql_result($rs,0,"id"); 
		$niv_cod=mysql_result($rs,0,"niv_cod");
		$_SESSION["id_usuario"] = $id_usuario;		
		$_SESSION["emp_des"] = $emp_des;
    $_SESSION["s_username"] = $user;    		
    $_SESSION["db"] = "CDO";

    $query_usu="select * from vendedores where usu_cod='$id_usuario' and borrado='0'";
    $rs_usu=mysql_query($query_usu);
    $ncaja=mysql_result($rs_usu,0,"mes_cod");
    $codvendedor=mysql_result($rs_usu,0,"ven_cod");
    
    $_SESSION["ncaja"] = $ncaja;
    $_SESSION["codvendedor"] = $codvendedor;
    
    $sel_1="select * from metas where borrado='0' and ven_cod='$codvendedor' and met_est='0'";
    $rs_1=mysql_query($sel_1);
    $met_cod=mysql_result($rs_1,0,"met_cod");
    
    $_SESSION["met_cod"] = $met_cod;
    $aud_ip =$_SERVER['REMOTE_ADDR'];
    header("Location:menu/index.php");
        	
}else{    
    $mensaje="Usuario/Password, incorrectos";
    header("Location:index.php?mensaje=$mensaje");
}
?>