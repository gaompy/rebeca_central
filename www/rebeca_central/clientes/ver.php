<?php
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../conectar.php"); 

$variable1=$_GET["variable1"];

$query="SELECT *, 
(CASE cli_par WHEN 0 THEN 'No' WHEN 1 THEN 'Si' END)AS cli_par_des
 FROM clientes_view WHERE cli_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"cli_des"));
$variable3=strtoupper(mysql_result($rs_query,0,"cli_ruc"));
$variable4=strtoupper(mysql_result($rs_query,0,"cli_dir"));
$variable5=strtoupper(mysql_result($rs_query,0,"cli_tel"));
$variable6=strtoupper(mysql_result($rs_query,0,"cli_mai"));
$variable7=strtoupper(mysql_result($rs_query,0,"med_cod"));
$variable7_1=strtoupper(mysql_result($rs_query,0,"med_des"));
$variable8=strtoupper(mysql_result($rs_query,0,"tic_cod"));
$variable8_1=strtoupper(mysql_result($rs_query,0,"tic_des"));
$variable9=strtoupper(mysql_result($rs_query,0,"cli_par_des"));

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
    
var miPopup
  function imprimir(variable1,variable2) {
		  miPopup = window.open("agregar/impresiones.php?variable1="+variable1+"&variable2="+variable2,"miwin","width=700,height=380,scrollbars=yes");
      miPopup.focus();
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
							<td width="15%">Cliente</td>
						    <td width="85%" colspan="2"><?php echo $variable2?></td>
					    </tr>
							<tr>
              <td width="15%">RUC</td>
						    <td width="85%" colspan="2"><?php echo $variable3?></td>
					    </tr>
						<tr>

              <td width="15%">Direccion</td>
						    <td width="85%" colspan="2"><?php echo $variable4?></td>
					    </tr>
						<tr>
              <td width="15%">Telefono</td>
						    <td width="85%" colspan="2"><?php echo $variable5?></td>
					    </tr>
						<tr>
              <td width="15%">Email</td>
						    <td width="85%" colspan="2"><?php echo $variable6?></td>
					    </tr>
						<tr>
              <td width="15%">Medios Comun.</td>
						    <td width="85%" colspan="2"><?php echo $variable7_1?></td>
					    </tr>
						<tr>
              <td width="15%">Tipo Cliente</td>
						    <td width="85%" colspan="2"><?php echo $variable8_1?></td>
					    </tr>
						
              <tr>
              <td width="15%">Predeterminado</td>
						    <td width="85%" colspan="2"><?php echo $variable9?></td>
					    </tr>

            




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
        	<img src="../img/botonimprimir.jpg" width="79" height="22" border="1" onClick="imprimir('<? echo $variable1?>','<? echo $variable2?>')" onMouseOver="style.cursor=cursor">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
			  </div>
		  </div>
		  </div>
		</div>
	</body>
</html>
