<?php
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../conectar.php"); 

$variable0=$_GET["variable1"];

$query="SELECT *,
CASE caj_par  
WHEN 0 THEN 'Ingreso'  
WHEN 1 THEN 'Egreso'  
END AS caj_par_des
FROM caja_diaria WHERE caj_cod='$variable0'";


$rs_query=mysql_query($query);
$variable1=strtoupper(mysql_result($rs_query,0,"ape_cod"));
$variable2=strtoupper(mysql_result($rs_query,0,"caj_des"));
$variable3=number_format(mysql_result($rs_query,0,"caj_ing"), 0, ",", ".");
$variable4=number_format(mysql_result($rs_query,0,"caj_sal"), 0, ",", ".");
$variable5=strtoupper(mysql_result($rs_query,0,"caj_par_des"));

$variablex=mysql_result($rs_query,0,"usuario");
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
		
		
		function aceptar() {
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
							<td width="15%">Cod.Mov.</td>
							<td width="85%" colspan="2"><?php echo $variable0 ?></td>
					    </tr>
						<tr>
							<td width="15%">Cod.Apertura</td>
							<td width="85%" colspan="2"><?php echo $variable1 ?></td>
					    </tr>              
              
						<tr>
							<td width="15%">Descripcion</td>
						    <td width="85%" colspan="2"><?php echo $variable2?></td>
					    </tr>
              
              <tr>
							<td width="15%">Ingreso</td>
						    <td width="85%" colspan="2"><?php echo $variable3?></td>
					    </tr>
						<tr>
							<td width="15%">Egreso</td>
						    <td width="85%" colspan="2"><?php echo $variable4?></td>
					    </tr>              
						<tr>
							<td width="15%">Tipo Mov.</td>
						    <td width="85%" colspan="2"><?php echo $variable5?></td>
					    </tr>              
              
						<tr>
					  <td width="15%">Fecha</td>
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
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
		  </div>
		  </div>
		</div>
	</body>
</html>
