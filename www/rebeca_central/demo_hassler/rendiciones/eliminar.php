<?php 
@@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../conectar.php");

$variable1=$_GET["variable1"];




$query="SELECT * FROM hruta_cab_view WHERE hru_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"cam_cod"));
$variable2_0=strtoupper(mysql_result($rs_query,0,"cam_des"));
$variable3=strtoupper(mysql_result($rs_query,0,"cho_cod"));
$variable3_0=strtoupper(mysql_result($rs_query,0,"cho_des"));
$variable4=strtoupper(mysql_result($rs_query,0,"ayu_cod"));
$variable4_0=strtoupper(mysql_result($rs_query,0,"ayu_des"));
$variable5=strtoupper(mysql_result($rs_query,0,"zon_cod"));
$variable5_0=strtoupper(mysql_result($rs_query,0,"zon_des"));
$variable6=strtoupper(mysql_result($rs_query,0,"hru_est"));
$estado=strtoupper(mysql_result($rs_query,0,"hru_est"));
$estado_des=strtoupper(mysql_result($rs_query,0,"estado"));
$fecha=strtoupper(mysql_result($rs_query,0,"fecha"));
$variablex=strtoupper(mysql_result($rs_query,0,"usuario"));

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
    var estado="<?echo $estado?>";
    if (estado==0){
      if (confirm(" Desea eliminar registro? ")){ 
			     location.href="guardar.php?variable1=" + variable1 + "&accion=baja";
		  }
     }else{
     alert("El registro ha sido confirmado, no se puede modificar!");
     }
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
				<div id="tituloForm" class="header">ELIMINAR <?echo $descripcion?></div>
				<div id="frmBusqueda">
		
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">C&oacute;digo</td>
							<td width="85%" colspan="2"><?php echo $variable1 ?></td>
					    </tr>
						  <tr>
							<td width="15%">Camion</td>
						    <td width="85%" colspan="2"><?php echo $variable2_0?></td>
					    </tr>
						
						  <tr>
							<td width="15%">Chofer</td>
						    <td width="85%" colspan="2"><?php echo $variable3_0?></td>
					    </tr>
            
						  <tr>
							<td width="15%">Ayudante</td>
						    <td width="85%" colspan="2"><?php echo $variable4_0?></td>
					    </tr>

              <tr>
							<td width="15%">Zona</td>
						    <td width="85%" colspan="2"><?php echo $variable5_0?></td>
					    </tr>

						  <tr>
							<td width="15%">Estado</td>
						    <td width="85%" colspan="2"><?php echo $estado_des?></td>
					    </tr>


   
					  
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
