<?php
@session_start();
$user=$_POST['username'];
$pass=md5($_POST['password']);
$emp_des="HOTEL HASSLER";
$version="3.2";
$anio="2018";

include("conectar.php");
include("fecha_hora.php");
/*******************************************************/

/*******************************************************/
$ncaja=0;
$query="select * from usuarios where usuario='$user' and password='$pass' and borrado=0";
$rs=mysql_query($query);
$cuenta = mysql_num_rows($rs);
//$cuenta=mysql_result($rs,0,"cuenta"); 

if ($cuenta==1){

		$id_usuario=mysql_result($rs,0,"id"); 
		$niv_cod=mysql_result($rs,0,"niv_cod");
		$suc_cod=mysql_result($rs,0,"suc_cod");
		
		$_SESSION["id_usuario"] = $id_usuario;
		$_SESSION["niv_cod"] = $niv_cod;
		$_SESSION["suc_cod"] = $suc_cod;		
		$_SESSION["emp_des"] = $emp_des;
		$_SESSION["s_username"] = $user;
		$_SESSION["p_pass"] = $pass;
    $_SESSION["ncaja"] = $ncaja;
    $_SESSION["version"] = $version;
    $_SESSION["anio"] = $anio;
    
    $aud_ip = $_SERVER['REMOTE_ADDR'];
      
    $query="INSERT INTO auditoria(aud_ip,usu_cod, fecha, hora)VALUES('$aud_ip','$user' ,'$fecha', '$hora')";
    $rs=mysql_query($query);
    header("Location:main.php");
    
}else{
?>
<script language="javascript">
		alert("Usuario/Password, incorrectos!");
		location.href="index.php";
</script>
<?
}
?>