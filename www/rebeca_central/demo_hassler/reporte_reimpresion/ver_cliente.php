<html>
<head>
<? 
include ("../conectar.php"); 
$fac_cod=0;
?>
<title>Buscador</title>
<script>

var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		


function cliente() {
var fac_cod='<? echo $fac_cod ?>';
  location.href="../clientes/nuevo.php?par="+fac_cod;
 }

function buscar() {
	document.getElementById("variable1").focus();
	if (document.getElementById("iniciopagina").value=="") {
		document.getElementById("iniciopagina").value=1;
	} else {
		document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
	}
	document.getElementById("form1").submit();
	document.getElementById("tabla_resultado").style.display="";
}

function inicio() {

	var combo_familia=document.getElementById("cmbfamilia").value;
	if (combo_familia==0) {
		buscar();
	} else {
		document.getElementById("tabla_resultado").style.display="none";
	}
			
}

function paginar() {
	document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
	document.getElementById("form1").submit();
}

function enviar() {
	document.getElementById("form1").submit();
}

</script>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body onLoad="buscar()">
<form name="form1" id="form1" method="post" action="frame_cliente.php" target="frame_resultado" onSubmit="buscar()">
 <div id="frmBusqueda2">
 <div align="center">	
	<table class="fuente8" align="center" width="95%">

		<tr><td width="36%" class="busqueda">RUC:</td>
	    <td width="64%"><input name="variable1" type="text" id="variable1" size="50" class="cajaMedia" onChange="enviar()" ></td></tr>
		<tr>
		<tr><td width="36%" class="busqueda">Nombre:</td>
	    <td width="64%"><input name="variable2" type="text" id="variable2" size="50" class="cajaGrande" onChange="enviar()"></td></tr>
		<tr>
		<input name="fac_cod" value="<?echo $fac_cod?>" type="hidden" id="fac_cod">
		
		  <td class="busqueda">&nbsp;</td>
		  <td>
            <img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="enviar()" onMouseOver="style.cursor=cursor">
		  <td>&nbsp;</td>
	  </tr>
</table>
</div>
  <table width="95%" id="tabla_resultado" name="tabla_resultado" style="display:none" align="center">
	<tr>
  		<td>
			<iframe width="100%" height="300" id="frame_resultado" name="frame_resultado">
				<ilayer width="100%" height="300" id="frame_resultado" name="frame_resultado"></ilayer>
			</iframe>
		</td>
	</tr>
</table>
<input type="hidden" id="iniciopagina" name="iniciopagina">
<table width="100%" border="0">
  <tr>
    <td><div align="center">
      <img src="../img/botoncerrar.jpg" width="70" height="22" onClick="window.close()" border="1" onMouseOver="style.cursor=cursor">
    </div></td>
  </tr>
</table>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
</form>
</div>
</body>
</html>
