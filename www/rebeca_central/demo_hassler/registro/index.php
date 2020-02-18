<!DOCTYPE html>
<html>
<script>
     function volver(){
     
      location.href="../index.php";
       //alert("Ha sido dado de alta satisfactoriamente, ingrese su email y su contraseña en el sistema!");
     
     }
</script>

<head>
	<meta charset="utf-8" />
	<title>Registro de usuarios</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">


<link href="lib/jquery-ui.css" rel="stylesheet">
<script src="lib/jquery.js"></script>
<script src="lib/jquery-ui.js"></script>

<!-- Start Formoid form-->
<link rel="stylesheet" href="lib/formoid1/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="lib/formoid1/jquery.min.js"></script>
   
 <link href="lib/jquery-ui.css" rel="stylesheet">
<script src="lib/jquery.js"></script>
<script src="lib/jquery-ui.js"></script>

<form id="form_busqueda" name="form_busqueda" action="guardar.php"  class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:14px;font-family:'Times New Roman',Times,serif;color:#666666;max-width:480px;min-width:150px" method="post">
<div class="title"><h2><img src="../images/logo.png" width="152" height="72"></h2>
  <h2>Registro de usuarios</h2>
</div>
<div class="element-input"><label class="title">Empresa<span class="required">*</span></label><input class="large" type="text" name="variable2" required id="variable2"/></div>
<div class="element-input"><label class="title">Rubro<span class="required">*</span></label><input class="large" type="text" name="variable3" required id="variable3"/></div>
<div class="element-name"><label class="title">Datos personales<span class="required">*</span></label><span class="nameFirst"><input  type="text" name="variable4" required id="variable4"/><label class="subtitle">Nombres</label></span><span class="nameLast"><input  type="text" name="variable5" required id="variable5"/><label class="subtitle">Aprellidos</label></span></div>
<div class="element-address">
	  <p>
	    <label class="title">Direccion<span class="required">*</span></label><input  type="text" name="variable6" required id="variable6"/>
      <label class="title">Ciudad<span class="required">*</span></label><input  type="text" name="variable7" required id="variable7"/>
	        
	    </span></p>
   <label class="title">Pais<span class="required">*</span></label><input  type="text" name="variable8" required id="variable8"/>
	<div class="element-email"><label class="title">Email<span class="required">*</span></label><input class="medium" type="email" name="variable9" required id="variable9"/></div>
	<div class="element-password"><label class="title">Password<span class="required">*</span></label><input class="medium" type="password" name="variable10" value="" required id="variable10"/></div>
<div class="submit"><input type="submit" value="Registrar"/></form><p class="frmd">&nbsp;</p><script type="text/javascript" src="lib/formoid1/formoid-default-skyblue.js"></script>
 <input type="button" value="Volver" onclick="volver()"/> </div>


<!-- Stop Formoid form-->

</body>
<?php
include("conectar.php");
?> 

<script>
var empresa = 
<?  
$query="select reg_rub from registro group by reg_rub order by reg_rub";
$res=mysql_query($query);
$contador=0;
?>
[
<?
while ($contador < mysql_num_rows($res)) {
$reg_emp=mysql_result($res,$contador,"reg_rub"); 
?>
 "<? echo $reg_emp?>",
<?
  $contador++;
} 
?>
]; 
$("#variable3").autocomplete({
	source: empresa
});
</script>


<script>
var ciudad = 
<?  
$query="select reg_ciu from registro group by reg_ciu order by reg_ciu";
$res=mysql_query($query);
$contador=0;
?>
[
<?
while ($contador < mysql_num_rows($res)) {
$reg_ciu=mysql_result($res,$contador,"reg_ciu"); 
?>
 "<? echo $reg_ciu?>",
<?
  $contador++;
} 
?>
]; 
$("#variable7").autocomplete({
	source: ciudad
});
</script>


<script>
var pais = 
<?  
$query="SELECT reg_pai FROM registro GROUP BY reg_pai ORDER BY reg_pai";
$res=mysql_query($query);
$contador=0;
?>
[
<?
while ($contador < mysql_num_rows($res)) {
$reg_pai=mysql_result($res,$contador,"reg_pai"); 
?>
 "<? echo $reg_pai?>",
<?
  $contador++;
} 
?>
]; 
$("#variable8").autocomplete({
	source: pais
});
</script>



</html>
