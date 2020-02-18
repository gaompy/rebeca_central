<?php
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../conectar.php");
$variable1=$_GET["variable1"];

$query="SELECT * FROM depositos WHERE dep_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=mysql_result($rs_query,0,"dep_des");


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
			
         if (confirm(" Desea eliminar registro? ")){ 
          location.href="guardar.php?variable1=" + variable1 + "&accion=baja";
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
							<td width="85%" colspan="2"><?php echo $variable1?></td>
					    </tr>
						<tr>
							<td width="15%">Descripcion</td>
						    <td width="85%" colspan="2"><?php echo $variable2?></td>
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
