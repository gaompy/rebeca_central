<?php
include ("../conectar.php"); 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;

$variable1=$_GET["variable1"];
$cadena_busqueda=$_GET["cadena_busqueda"];

$query="SELECT * FROM usuarios WHERE id='$variable1'";
$rs_query=mysql_query($query);
$variablex=mysql_result($rs_query,0,"usu");

$query_usu="SELECT * FROM usuarios WHERE id='$variablex'";
$rs_query_usu=mysql_query($query_usu);
$variable_usu=strtoupper(mysql_result($rs_query_usu,0,"usuario"));

$variable2=strtoupper(mysql_result($rs_query,0,"usuario"));
$variable3=mysql_result($rs_query,0,"niv_cod");
$variable4="**********";
$variable5=mysql_result($rs_query,0,"suc_cod");

$query1="SELECT * FROM niveles WHERE niv_cod='$variable3'";
$rs_query1=mysql_query($query1);
$variable3=strtoupper(mysql_result($rs_query1,0,"niv_des"));

$query1="SELECT * FROM sucursales WHERE suc_cod='$variable5'";
$rs_query1=mysql_query($query1);
$variable6=strtoupper(mysql_result($rs_query1,0,"suc_des"));

?>

<html>
	<head>
		<title>Principal</title>
		
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">



		<script language="javascript">
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function aceptar(variable1) {
			location.href="guardar.php?variable1=" + variable1 + "&accion=baja" + "&cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		function cancelar() {
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;
		}
		
		</script>
	    <style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
        </style>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">RESETEAR PASSWORD </div>
				<div id="frmBusqueda">
		
					<span class="style1">Atencion, el reseteo del password genera "12345" como contrasena default</span>
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $variable1?></td>
					    </tr>
						<tr>
							<td width="15%">Descripcion</td>
						    <td width="85%" colspan="2"><?php echo $variable2;?></td>
					    </tr>
						<tr>
  
						<td width="15%">Nivel</td>
						    <td width="85%" colspan="2"><?php echo $variable3;?></td>
					    </tr>
						<tr>
						<td width="15%">Sucrusal</td>
						    <td width="85%" colspan="2"><?php echo $variable6;?></td>
					    </tr>
						<tr>
    <td width="15%">&nbsp;</td>
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar(<?php echo $variable1?>)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">

			  </div>

			  </div>
		  </div>
    </div>
		</div>
	</body>
</html>
