<?php 
@@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../conectar.php");

$variable1=$_GET["variable1"];



$query="SELECT * FROM inventarios_cab_view WHERE inv_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2_0=strtoupper(mysql_result($rs_query,0,"dep_des"));
$variable2=strtoupper(mysql_result($rs_query,0,"inv_des"));
$variable3=mysql_result($rs_query,0,"inv_fec");
$variablex=strtoupper(mysql_result($rs_query,0,"usuario"));

$query_usu="SELECT * FROM usuarios WHERE id='$variablex'";
$rs_query_usu=mysql_query($query_usu);
$variable_usu=strtoupper(mysql_result($rs_query_usu,0,"usuario"));
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
		function cancelar() {
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;

		}
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">VER <?echo $descripcion?></div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $variable1 ?></td>
					    </tr>
						<tr>
							<td width="15%">Deposito</td>
						    <td width="85%" colspan="2"><?php echo $variable2_0?></td>
					    </tr>

						<tr>
							<td width="15%">Observacion</td>
						    <td width="85%" colspan="2"><?php echo $variable2?></td>
					    </tr>
						<tr>
							<td width="15%">Fecha Inventario</td>
						    <td width="85%" colspan="2"><?php echo $variable3?></td>
					    </tr>
						<tr>



  
					  <td width="15%">Fecha Carga</td>
						    <td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"fecha")?></td>
					    </tr>
						<tr>
					<td width="15%">hora</td>
						    <td width="85%" colspan="2"><?php echo mysql_result($rs_query,0,"hora")?></td>
					    </tr>
						<tr>						
					<td width="15%">usuario</td>
						    <td width="85%" colspan="2"><?php echo $variable_usu; ?></td>
					    </tr>
						<tr>												
						
  
										</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
		  </div>
		  </div>
		</div>
	</body>
</html>
