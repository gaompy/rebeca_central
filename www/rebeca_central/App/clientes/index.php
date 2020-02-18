<?
session_start();
$form="clientes";
$mec_cod="clientes";
$descripcion="Clientes";
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;

include("../conexion/conectar.php");
//include ("../permisos.php");

?>
<!DOCTYPE html>

<html>
 	<meta charset="utf-8" >

<script language="javascript">
    function inicio() {
	   document.getElementById("variable1").focus();              
		}
		function nuevo(){                   
       location.href="modificar.php?variable1="+variable1+"&par=alta";
		}
     function imprimir() {
      var miPopup;     
			miPopup = window.open("impresiones.php","miwin","width=700,height=500,scrollbars=yes");
			miPopup.focus();
		}   
     function limpiar(){
      document.getElementById("form_busqueda").reset();
	    inicio();	
     }

function inicio() {
    document.getElementById("iniciopagina").value=1;
    document.getElementById("variable1").focus();
    document.getElementById("form_busqueda").submit();
}

function buscar() {
			var cadena;
			cadena=hacer_cadena_busqueda();
			document.getElementById("cadena_busqueda").value=cadena;
			if (document.getElementById("iniciopagina").value=="") {
				document.getElementById("iniciopagina").value=1;
			} else {
				document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			}
			document.getElementById("form_busqueda").submit();
		}
      function paginar() {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			document.getElementById("form_busqueda").submit();
		}
		
		function hacer_cadena_busqueda() {
			var variable1=document.getElementById("variable1").value;
			var variable2=document.getElementById("variable2").value;
			var cadena="";
			cadena="~"+variable1+"~"+variable2+"~";
			return cadena;
		} 

      
</script>
<head>
<meta charset="utf-8" />
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="shortcut icon" href="img/logo.ico">
<body>
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
<script type="text/javascript" src="../files/jquery.min.js"></script>

<link href="../css/jquery-ui.css" rel="stylesheet">
<script src="../css/jquery.js"></script>
<script src="../css/jquery-ui.js"></script>

<form id="form_busqueda" name="form_busqueda" action="modificar.php" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post" autocomplete="off">
	<div class="title">
  <h2><? echo strtoupper("Buscar ".$descripcion); ?></h2></div>
	<div class="element-input" class="demoHeaders"><label class="title"><b>Cliente</b><span></span></label><input class="large" type="text" name="variable2" id="variable2"/></div>
<div class="submit">
  <p>
    <input type="submit" value="Buscar"/>
  </p>
</div>

</form>
</body>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
<script>
var listar_clientes = 
<?php

$query="SELECT cli_cod,cli_des,cli_dir FROM clientes_view WHERE borrado=0 order by cli_des";
$rs=mysql_query($query);
//$filas=mysql_result($rs,0,"filas");
   
?>    
[
<?php
$contador=0;						   
while ($contador < mysql_num_rows($rs)) {
$cli_ant=mysql_result($rs,$contador,"cli_cod");
$cli_des=mysql_result($rs,$contador,"cli_des");
$cli_dir=mysql_result($rs,$contador,"cli_dir");
$cli_gral=$cli_ant."=".$cli_des;
  
?>
   "<?php echo $cli_gral;?>",
<?php
$contador++;
}
?>
]; 

$( "#variable2" ).autocomplete({
	source: listar_clientes
});
</script>

</html>  	