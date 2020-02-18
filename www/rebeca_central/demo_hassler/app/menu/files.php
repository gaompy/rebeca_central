<?php
@session_start();
@$usuario=$_SESSION["id_usuario"];
if ($usuario<>"") {    
?>
		<script language="javascript">
		location.href="menu/index.php";
		</script>

<?
}else{

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>App Pre-ventas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head >
<script language="javascript">
function inicio() {
			document.getElementById("username").focus();
		}
		function limpiar() {
			document.getElementById("inicio").reset();
      document.getElementById("username").focus();
		}    
    
    function cliente() {		
      location.href="../index.php";    
    }    
     
 </script>
<body class="blurBg-false" style="background-color:#EBEBEB" onLoad="inicio()">
  <h2>&nbsp;</h2>
<link rel="stylesheet" href="files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="files/jquery.min.js"></script>
<form id="inicio" name="inicio" class="formoid-default-skyblue"  action='login.php' align="left" 
style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" 
method="post" autocomplete="off"><div class="title"><h2><img src="images/logo.jpg" width="110" height="100"></h2>
  <h2>Pre-ventas</h2>
</div>
    
<div class="element-input"><label class="title"><b>Usuario</b><span class="required">*</span></label><input class="large" type="text" name="username" id="username" required="required"/></div>
<div class="element-password"><label class="title"><b>Password</b><span class="required">*</span></label><input class="large" type="password" name="password" id="password" value="" required="required"/></div>
<? 
echo "<br>".@$mensaje=$_GET["mensaje"]."</br>";
?>
<div class="submit"><input type="submit" value="Ingresar"/>
<input type="button" value="Limpiar" onclick="limpiar()"/>  </div>
    <h2>&nbsp;</h2>
      <script type="text/javascript" src="files/formoid-default-skyblue.js"></script>
</form>
</body>
</html>

 <?
 }
 ?>