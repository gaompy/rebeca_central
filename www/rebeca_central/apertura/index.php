<?php
@@session_start();
include ("../conectar.php");
$usuario=$_SESSION["id_usuario"];
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
include ("../permisos.php"); 

if ($consulta=="on"){

$q="select count(aps_cod) as c from aper_sis where aps_par='0'";
$rs=mysql_query($q);
$ape_sis_q=mysql_result($rs,0,"c");

if (($ape_sis_q=='0')) {
	?>
		<script>
			alert ("El sistema no esta Abierto!");
			location.href="../central.php";	
		</script>
	<?php	
}else{

	$query="SELECT count(*) as cuenta FROM aper_cie WHERE ape_par='0' and usuario='$usuario'";
	$rs_query=mysql_query($query);
	$cuenta=mysql_result($rs_query,0,"cuenta");
	
	if (!($cuenta=='0')) {
		?>
		<script>
			alert ("Existe una Apertura Actual, favor realice el cierre correspondiente!");
			location.href="../central.php";	
		</script>
		<?
	}else{
			$query1="select max(ape_cod) as maximo from aper_cie";
			$rs_query1=mysql_query($query1);
			$variable1=mysql_result($rs_query1,0,"maximo")+1;
			
			$query3="select max(aps_cod) as maximo from aper_sis where aps_par='0'";
			$rs_query3=mysql_query($query3);
			$variable3=mysql_result($rs_query3,0,"maximo");

	?>
	<html>
		<head>
			<title>Principal</title>
			<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
			<script type="text/javascript" src="../funciones/validar.js"></script>
      <script type="text/javascript" src="../js/formato.js"></script>	
			<script language="javascript">
			
			function cancelar() {
				location.href="../central.php";
			}
			
	
			
			var cursor;
			if (document.all) {
			// Está utilizando EXPLORER
			cursor='hand';
			} else {
			// Está utilizando MOZILLA/NETSCAPE
			cursor='pointer';
			}
			
			function limpiar() {
				document.getElementById("formulario").reset();
			}
			
			function valida(){
			
			var codigo;
			codigo=document.getElementById("variable2").value;
			
					if (document.getElementById("variable2").value=="") { 
								alert ("El campo no puede estar vacio!");
	
							} else {
							
							if (confirm(" Esta Seguro que de realizar la apertura de caja? ")){ 
								parent.location.href="guardar.php?variable2=" + codigo;
								location.href="../central.php";
							 }
              
              	}
				}
	
      
function inicio() {		
      document.getElementById("variable2").focus();
		}      
</script>
		</head>
	
	<body onLoad="inicio()">
			<div id="pagina">
				<div id="zonaContenido">
					<div align="center">
					<div id="tituloForm" class="header">APERTURA de CAJA</div>
					<div id="frmBusqueda">
					<form id="formulario" name="formulario" method="post" action="guardar.php">
						<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
							
							<tr>
								<td width="15%">Nro. de Apertura:</td>
								<td width="43%">
	<input NAME="variable1" type="text" class="cajaPequena" id="variable1" size="45" maxlength="45" value="<?php echo $variable1 ?>" readonly>
	</td>
								<td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
							</tr>
							<tr>
								<td width="15%">Ingrese Dotacion de Caja:</td>
								<td width="43%"><input NAME="variable2" type="text" class="cajaPequena" id="variable2" size="45" maxlength="45" onKeyUp="format(this)" onChange="format(this)"></td>
								<td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
							</tr>
							<tr>					

						  </tr>
							<tr>		 
						</table>
				  </div>
					<div id="botonBusqueda">
						<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="valida()" border="1" onMouseOver="style.cursor=cursor">
						<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
						<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
	
				  </div>
				  </form>
			  </div>
			  </div>
		</div>
<?php 
	}
 }
}
 ?>
	</body>
</html>
