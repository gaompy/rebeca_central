<?
session_start();
$form="productos";
$mec_cod="productos";
$descripcion="Productos";

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
	    
     }

function inicio() {
    document.getElementById("iniciopagina").value=1;
    //document.getElementById("variable1").focus();
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
<body onLoad="inicio()">

<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
<script type="text/javascript" src="../files/jquery.min.js"></script>
<form id="form_busqueda" name="form_busqueda" action="rejilla.php" target="frame_rejilla" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post" autocomplete="off">
  
	<div class="title">
  <h2><? echo strtoupper($descripcion); ?></h2></div>
	<div class="element-input"><label class="title"><b>codigo</b><span></span></label><input class="large" type="text" name="variable1" id="variable1"/></div>
	<div class="element-input"><label class="title"><b>Descripcion</b><span></span></label><input class="large" type="text" name="variable2" id="variable2"/></div>
<div class="submit">
  <p>
    <input type="submit" value="Buscar"/>
    <input type="button" value="Limpiar" onclick="limpiar()"/>
  </p>
</div>

<div class="submit"></div>
<div id="cabeceraResultado"></div>
<div id="frmResultado">
<table  width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">

</table>
</div>
<input type="hidden" id="iniciopagina" name="iniciopagina">
<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">

	<div>
	  <iframe width="110%" height="530" id="frame_rejilla" name="frame_rejilla" frameborder="0">	    
    </iframe>
	</div>

</form>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
</body>
</html>
  	
