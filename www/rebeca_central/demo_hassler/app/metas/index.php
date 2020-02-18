<?php 
@session_start();
$met_cod=$_SESSION["met_cod"];
$ven_cod=$_SESSION["codvendedor"];
include("../conexion/conectar.php");
$sel="select * from metas where borrado='0' and met_cod='$met_cod'";
$rs=mysql_query($sel);

  $variable1=mysql_result($rs,0,"met_cod");
	$variable2=mysql_result($rs,0,"met_fec_ini");
  $variable3=mysql_result($rs,0,"met_fec_fin");
  $variable4=mysql_result($rs,0,"met_mon");
  $variable5=mysql_result($rs,0,"met_acu");
  $variable6=mysql_result($rs,0,"met_dia");
  $variable7=mysql_result($rs,0,"met_can");
  $porcentaje=round((($variable5 * 100)/$variable4),2)."%";
  
  
  $fecha="$variable3"."00:00:00";
  $segundos=strtotime($fecha) - strtotime('now');
  $diferencia_dias=intval($segundos/60/60/24);
  
  
 
?>

<!DOCTYPE html>
<html>


<style type="text/css">
a {color:black; text-decoration:none}
</style>

<style type="text/css">
@media only screen and (max-width: 480px), only screen and (max-device-width: 480px) {
  /*aquí nuestro cSS para dispositivos móviles*/
}
@media (max-width: 480px) {
  table, thead, tfoot, tbody, tr {
   display:block;
 }
thead tr th {
 display:none;
 }
/*Si usamos tfoot*/
 table {
  position: relative;
  }
 tfoot {
  position: absolute; bottom: -40px; /*la altura del pié en negativo*/
  width:inherit;
  }
}
/*encabezados de las filas*/
 tbody th {
 display: inline-block;
 width: 34%;
 }
/*primera celda de cada fila que no sea un encabezado*/
tbody td:first-of-type {
 display: inline-block;
 width: 44%; /*a esta celda le damos un poco más de amplitud para dejar más espacio para el conmutador +/- */
 }
 /*nuestro ejemplo*/
 thead tr th:first-child {
 display: block;
 width: inherit; padding: 2% 5%;
 font: bold normal 16px/20px Arial, Helvetica, sans-serif;
 text-align: center;
 }
 /*tomamos todos los elementos a partir del cuarto por la cola, que es lo mismo que mostrar los 2 primeros*/
 thead tr th:nth-last-child(1n+4) {
 display: inline-block;
 width: 40%; padding: 2% 5%;
 font: bold normal 16px/20px Arial, Helvetica, sans-serif;
 }
 
</style>


<script type="text/javascript" src="../js/formato.js"></script>
<script language="javascript">

function inicio() {			
    document.getElementById("variable4").focus();                        
}
	function eliminar(variable1,fac_cod) {
			location.href="guardar_pedidos.php?variable1=" + variable1 +"&accion=baja"+"&fac_cod="+fac_cod ;
		}
	function guardar() {
	    var variable1="<?php echo $variable1?>";
	    var variable4=document.getElementById("variable4").value;
	    var variable5=document.getElementById("variable5").value;
	    
			location.href="guardar_pedidos.php?variable1=" + variable1 +"&accion=alta"+"&variable4="+variable4+"&variable5="+variable5;
		}
		
		
		function salir(){			
      location.href="../menu/central.php";
		}		
</script>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	
	<title><? echo strtoupper($descripcion); ?></title>
        
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="shortcut icon" href="img/logo.ico">
<body onLoad="inicio()">

<!-- Start Formoid form-->
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/jquery.min.js"></script>
<link href="../css/jquery-ui.css" rel="stylesheet">
<script src="../css/jquery.js"></script>
<script src="../css/jquery-ui.js"></script>

<form id="form_busqueda" name="form_busqueda" action="guardar_pedidos.php" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post" autocomplete="off">
<div class="title"><h2><? echo "CALC.PROD." ?></h2></div>
<label class="title"><b><? echo "COD. : ".$variable1;  ?></b></label>
<label class="title"><b><? echo "DESDE : ".$variable2;  ?></b></label>
<label class="title"><b><? echo "HASTA : ".$variable3;  ?></b></label>
<label class="title"><b><? echo "---------------------------- ";  ?></b></label>
<label class="title"><b><? echo "META : ".number_format($variable4, 0, ",", ".")." Gs.";  ?></b></label>
<label class="title"><b><? echo "LOGRADO : ".number_format($variable5, 0, ",", ".")." Gs. (".$porcentaje.")";  ?></b></label>
<label class="title"><b><? echo "FALTA : ".$diferencia_dias." DIAS";  ?></b></label>
<label class="title"><b><? echo "CANT.VEND. : ".number_format($variable7, 0, ",", ".")." (PROD.)";  ?></b></label>
<div class="submit">
  <p>
    <input type="button" value="Volver Atras" onclick="salir()"/>
  </p>
</div>

</form>
</body>
</html>
  	
