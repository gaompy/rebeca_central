<?php 
@session_start();
include ("../conectar.php");
$usuario=$_SESSION["id_usuario"];
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
include ("../permisos.php"); 

$query="SELECT count(*) as cuenta FROM aper_cie WHERE ape_par='0' and usuario='$usuario'";
$rs_query=mysql_query($query);
$cuenta=mysql_result($rs_query,0,"cuenta");

$quser="SELECT usuario FROM usuarios WHERE id='$usuario'";
$rs_quser=mysql_query($quser);
$variable1=mysql_result($rs_quser,0,"usuario")."($usuario)";

if ($cuenta=='0') {
	?>
	<script>
		alert ("No Existen Cajas que Cerrar!");
		location.href="../central.php";	
	</script>
	<?
}else{

	$query2="SELECT max(ape_cod) as ape_cod FROM aper_cie WHERE ape_par='0' and usuario='$usuario'";
	$rs_q=mysql_query($query2);
	$variable2=mysql_result($rs_q,0,"ape_cod");


  $query="SELECT COUNT(*) AS cuenta FROM factura_cab WHERE borrado='0'
  AND ape_cod='$variable2' AND fac_est='0'";
  $rs_query=mysql_query($query);
  $cuenta=mysql_result($rs_query,0,"cuenta");  
  
  if ($cuenta==0){
    
	
	$query4="select sum(fac_tot) as s from factura_cab WHERE ape_cod = $variable2;";
	$rs_q4=mysql_query($query4);
	$variable4=mysql_result($rs_q4,0,"s");
	
	$qq="SELECT * FROM aper_cie WHERE ape_cod = $variable2";
	$rs_qq=mysql_query($qq);
	$variable5=mysql_result($rs_qq,0,"ape_dot");
	if (!isset($variable5)){
		$variable5 = 0;
	}
	if (!isset($variable4)){
		$variable4 = 0;
	}
	$variable6 = $variable5 + $variable4
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
		var v3,v4,v5
		
		codigo=document.getElementById("variable2").value;
		 v3=document.getElementById("variable3").value;
		v4=document.getElementById("variable4").value;
		v5=document.getElementById("variable5").value;
		
		if (document.getElementById("variable3").value=="") { 
					alert ("El campo no puede estar vacio!");
					location.href="index.php";	
		}else{	
				if (document.getElementById("variable2").value=="") { 
							alert ("El campo no puede estar vacio!");
							location.href="index.php";		
				} else {
					if (isNaN(document.getElementById("variable2").value)==true) {
						alert ("El campo debe ser numerico!");
					location.href="index.php";	
					}
					else {
					
					parent.location.href="guardar.php?variable2=" + codigo + "&variable3=" + v3 + "&variable4=" + v4  + "&variable5=" + v5 ;
			/*		
          var miPopup
          miPopup = window.open("impresiones.php?nroapertura="+codigo,"miwin","width=1100,height=800,scrollbars=yes");
          miPopup.focus();*/
          
          //alert("Caja Cerrada!");
					}
				}
		}
	}

  function inicio(){
		document.getElementById("variable3").focus();
}		
		

		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">CIERRE DE CAJA </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="javascript:valida()">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						
						<tr>
							<td width="11%">Usuario</td>
						    <td width="7%">
            <input NAME="variable1" type="text" class="cajaTotales" id="variable1" size="45" maxlength="45" value="<?php echo $variable1;  ?>" readonly>
              </td>
				          <td width="25%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="11%">Nro de Apertura:</td>
					      <td width="7%"><input NAME="variable2" type="text" class="cajaPequena" id="variable2" size="45" maxlength="45" value="<?php echo $variable2;  ?>" readonly></td>
				          <td width="18%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="11%">Efectivo :</td>
					      <td width="7%"><input NAME="variable3" type="text" onKeyUp="format(this)" class="cajaPequena" id="variable3" size="45" maxlength="45" value="0"></td>
				          <td width="18%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td>Recaudacion</td>
						    <td>
          <input NAME="variable4" type="text" class="cajaTotales" id="variable4" size="45" maxlength="45" value="<?php echo number_format($variable4, 0, ",",".");  ?>" readonly>
						  </td>
				          <td width="21%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td>Dotacion Inicial </td>
						    <td>
          <input NAME="variable5" type="text" class="cajaTotales" id="variable5" size="45" maxlength="45" value="<?php echo number_format($variable5, 0, ",",".");  ?>" readonly>
						  </td>
				          <td width="21%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td>Total</td>
						    <td>
          <input NAME="variable6" type="text" class="cajaTotales" id="variable6" size="45" maxlength="45" value="<?php echo number_format($variable6, 0, ",",".");  ?>" readonly>
						  </td>
				          <td width="21%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
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
	  }else{
    ?>
    	<script>
		    alert ("Existen facturas pendientes!");
		    location.href="../central.php";	
	    </script>
    
     <?php
    }
	};?>