<html>
<head>
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

function buscar() {
	document.getElementById("variable3").focus();
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
<? include ("../conectar.php"); ?>
<body onLoad="buscar()">
<form name="form1" id="form1" method="post" action="frame_pro.php" target="frame_resultado" onSubmit="buscar()">
 <div id="frmBusqueda2">
 <div align="center">	
	<table class="fuente8" align="center" width="95%">
     <tr>
	    <td width="36%">Definicion:</td>
	    <td width="64%">
		  <select id="variable1" name="variable1" class="comboMedio" onChange="enviar()">
		   <option value="" selected>Todos</option>
      <?
		    $consultafamilia="select * from parametro where borrado='0' order by par_des ASC";
			$queryfamilia=mysql_query($consultafamilia);
			$anterior="";
			
			while ($rowfamilia=mysql_fetch_row($queryfamilia))
			  { 
			  	if ($anterior==$rowfamilia[0]) { ?>
					<option value="<? echo $rowfamilia[0]?>" selected><? echo strtoupper($rowfamilia[1])?></option>
			<?	} else { ?>
					<option value="<? echo $rowfamilia[0]?>"><? echo strtoupper($rowfamilia[1])?></option>
			<?	}   
		   	  };
		  ?>
	    </select>		</td></tr>
		<tr>
		 
		    <td width="36%">Categorias:</td>
	    <td width="64%">	 
		  <select id="variable2" name="variable2" class="comboMedio" onChange="enviar()">
		  <?
		    $consultafamilia="select * from familias_pro where borrado='0' order by fam_des ASC";
			$queryfamilia=mysql_query($consultafamilia);
			?><option value="">Todos los Tipos</option><?
			while ($rowfamilia=mysql_fetch_row($queryfamilia))
			  { 
			  	if ($anterior==$rowfamilia[0]) { ?>
					<option value="<? echo $rowfamilia[0]?>" selected><? echo strtoupper($rowfamilia[1])?></option>
			<?	} else { ?>
					<option value="<? echo $rowfamilia[0]?>"><? echo strtoupper($rowfamilia[1])?></option>
			<?	}   
		   	  };
		  ?>
	    </select>		</td></tr>
		<tr>
		<tr><td width="36%" class="busqueda">Descripci&oacute;n:</td>
	    <td width="64%"><input name="variable3" type="text" id="variable3" size="50" class="cajaGrande" onKeyPress="enviar()"></td></tr>
		<tr>
		  <td class="busqueda">&nbsp;</td>
		  <td><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="enviar()" onMouseOver="style.cursor=cursor"></td>
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
