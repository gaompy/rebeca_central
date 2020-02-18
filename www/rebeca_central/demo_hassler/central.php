<?php
@session_start();
include ("conectar.php");
$hoy=date("Y-m-d");


@$user=$_SESSION["s_username"];
@$_SESSION["id_usuario"];
@$_SESSION["niv_cod"];
@$suc_cod=$_SESSION["suc_cod"];
@$nivel=$_SESSION["niv_cod"];
@$anio=$_SESSION["anio"];
@$version=$_SESSION["version"];

$query="select count(*) as cuenta from usuarios where usuario='$user'";
$rs=mysql_query($query);
$cuenta=mysql_result($rs,0,"cuenta"); 
if ($cuenta==1){

$query1="SELECT * FROM niveles where niv_cod='$nivel'";
$res1=mysql_query($query1);
$niv_des=strtoupper(mysql_result($res1,0,"niv_des"));

$query1="SELECT * FROM sucursales where suc_cod='$suc_cod'";
$res1=mysql_query($query1);
$suc_des=strtoupper(mysql_result($res1,0,"suc_des"));



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo4 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.Estilo5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.Estilo6 {font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style3 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FF0000;
	font-weight: bold;
}
.x {
	text-align: right;
}
-->
</style>
</head>   
<body oncontextmenu="return false">
<table width="50%" border="0" align="center">
  <tr height="50px">
    <td>&nbsp;</td>
    <td><?php
 //$_SERVER['SERVER_NAME'];
$url_base =$_SERVER['REMOTE_ADDR'];
 ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="200px">
    <td></td>
    <td><div align="center"><img src="img/logo.png" width="335" height="111" /></div></td>
    <td></td>

  <tr>
    <td>&nbsp;</td>
    <td><div align="center" class="Estilo6">Alpha Solutions, Usuario Conectado:<span class="style3"><?php echo $_SESSION["s_username"]; ?></span>, Nivel:<span class="style3"><?php echo strtoupper($niv_des); ?></span>, Sucursal:<span class="style3"><?php echo strtoupper($suc_des)?></span> </span>, Conectado desde:<span class="style3"><?php echo $url_base?></div></td>
    <td>&nbsp;</td>
  </tr>
  


  
  <tr>
    <td>&nbsp;</td>
    <td><div align="center" class="Estilo6">Versi&oacute;n <?echo $version;?> </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center" class="Estilo6">&copy; <?echo $anio;?></div></td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><table width="50%" border="0" align="center">
        <tr>
          <td><div align="center"><span class="Estilo5">Resolución óptima 1024 x 768 píxeles  </span></div></td>
        </tr>
      </table></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="27">&nbsp;</td>
      <td><table width="50%" border="0" align="center">
        <tr>
        </tr>
      </table>
      <p class="x"><img src="img/alpha.png" width="130" height="70" /></p>
      <p><img src="img/top-syspymes-001.jpg" width="890" height="97" /></p>
      </td>
      <td>&nbsp;</td>
    </tr>
</table>
</body>
 
</html>

<?
  mysql_close($conexion);
  }
else{
	
include("sesion.php");
}
  
  ?>