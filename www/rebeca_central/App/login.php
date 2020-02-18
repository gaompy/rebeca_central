<?php
function limpiar($string){
 $string = htmlentities($string);
 $string = preg_replace('/\&(.)[^;]*;/', '\\1', $string);
 return $string;
}
?>
<?php
@session_start();
$user=limpiar($_POST['username']);
//$pass=limpiar($_POST['password']);
$pass=md5($_POST['password']);
$emp_des="Ortega Comercial";
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
    $_SESSION["db"] = "Baratodo";    
    $_SESSION["ncaja"] = "7";
    
    
    $aud_ip =$_SERVER['REMOTE_ADDR'];
    
    $direccion="menu/index.php";    
    header("Location:$direccion");	
}else{    
    $mensaje="Usuario/Password, incorrectos";
    header("Location:index.php?mensaje=$mensaje");
}
?>