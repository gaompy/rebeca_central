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
$variable0=mysql_result($rs_query,0,"codigoanterior");
$variable2=mysql_result($rs_query,0,"cli_des");
$variable3=mysql_result($rs_query,0,"cli_ruc");
$variable9=mysql_result($rs_query,0,"cli_par");
$variable9_1=mysql_result($rs_query,0,"cli_par_des");


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
			  var variable9='<? echo $variable9?>';
        if (variable9==1){
        alert("No se puede eliminar cliente predeterminado!");
        }else{
         if (confirm(" Desea eliminar registro? ")){ 
          location.href="guardar.php?variable1=" + variable1 + "&accion=baja";
         }    
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
							<td width="85%" colspan="2"><?php echo $variable0?></td>
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
              <td width="15%">Predeterminado</td>
						    <td width="85%" colspan="2"><?php echo $variable9_1?></td>
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