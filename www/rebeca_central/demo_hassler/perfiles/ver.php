<?php
include ("../conectar.php"); 

$variable1=$_GET["variable1"];
$cadena_busqueda=$_GET["cadena_busqueda"];

$query="SELECT * FROM niveles WHERE niv_cod='$variable1'";
$rs_query=mysql_query($query);

$variable2=strtoupper(mysql_result($rs_query,0,"niv_des"));
$variablex=mysql_result($rs_query,0,"usuario");

$query_usu="SELECT * FROM usuarios WHERE id='$variablex'";
$rs_query_usu=mysql_query($query_usu);
@$variable_usu=strtoupper(mysql_result($rs_query_usu,0,"usuario"));

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
			location.href="index.php?cadena_busqueda=<?php echo $cadena_busqueda?>";
		}
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">VER Nivel</div>
				<div id="frmBusqueda">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $variable1 ?></td>
					    </tr>
						<tr>
							<td width="15%">Descripcion</td>
						    <td width="85%" colspan="2"><?php echo $variable2?></td>
					    </tr>
						<tr>
					
												<td width="15%"></td>
						    <td width="85%" colspan="2"><strong><?php echo "Ins / Upd / Prin/Con";?><strong></td>
					    </tr>
						<tr>
					
						
					<?php
						$query="SELECT per_cod,niv_cod,mec_cod, med_cod,(SELECT med_des FROM menu_det WHERE med_cod=permisos.med_cod)AS per_des,
per_agr,per_mod,per_imp,per_con,per_eli from 
permisos where niv_cod='$variable1' and mec_cod='@$modulo' order by (SELECT med_ord FROM menu_det WHERE med_cod=permisos.med_cod)";
						$rs=mysql_query($query);
							while ($row = mysql_fetch_row($rs)) {
					
					$var0=$row[0];$var2=$row[2];$var3=$row[3];$var4=$row[4];$var5=$row[5];$var6=$row[6];$var7=$row[7];$var8=$row[8];$var9=$row[9];
					

					if ($var5=='on'){
					
						$var5="Ins";
					}
					if ($var6=='on'){
					
						$var6="Up";
					}
					if ($var7=='on'){
					
						$var7="Prin";
					}
					
					if ($var8=='on'){
					
						$var8="Con";
					}	
					if ($var9=='on'){
					
						$var9="Eli";
					}	
										
								
					$variable1="$var5-$var6-$var7-$var8-$var9";
					?>  
					  
					  
					  <td width="15%"><?php echo "$var2-$var4"; ?></td>
						    <td width="85%" colspan="2"><?php echo $variable1 ;?></td>
					    </tr>
						<tr>
								
						<?php
						}
						?>
  
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
