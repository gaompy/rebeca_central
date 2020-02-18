<?php
session_start();
include ("../conexion/conectar.php");
include ("../conexion/fecha_hora.php");
$usuario=$_SESSION["id_usuario"];
$ncaja=$_SESSION["ncaja"];

$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

if ($accion=="modificar") {

$variable1=$_POST['cli_cod'];

$query1="SELECT max(fac_cod) as maximo FROM factura_cab";
$rs_query1=mysql_query($query1);
$nro_fac=mysql_result($rs_query1,0,"maximo")+1;
  
    $sel="INSERT INTO factura_cab (fac_cod,ape_cod,cli_cod,aps_cod,mes_cod,fecha,hora,usuario,borrado) 
    VALUES ('$nro_fac','1','$variable1','1',$ncaja,'$fecha','$hora','$usuario','0')";
    $rs=mysql_query($sel);                

    $sel="update mesas set mes_fac='$nro_fac',mes_est='1' where mes_cod='$ncaja'";
    $rs=mysql_query($sel);	

    	$sel="select * from clientes_view where borrado='0' and cli_cod='$variable1'";
	    $rs=mysql_query($sel);  
      $cuenta = mysql_num_rows($rs);
      
      $cli_cod=mysql_result($rs,0, "cli_cod");
      $codigoanterior=mysql_result($rs,0, "codigoanterior");
      $nombrecliente=mysql_result($rs,0, "nombrecliente");
  
 }
 
 if ($accion=="retornar") {
      
      $variable1=$_POST['cli_cod'];
    	$sel="select * from clientes_view where borrado='0' and cli_cod='$variable1'";
	    $rs=mysql_query($sel);  
      $cuenta = mysql_num_rows($rs);

      $cli_cod=mysql_result($rs,0, "cli_cod");
      $codigoanterior=mysql_result($rs,0, "codigoanterior");
      $nombrecliente=mysql_result($rs,0, "nombrecliente");
      
      $query_usu="select * from vendedores where usu_cod='$id_usuario' and borrado='0'";
      $rs_usu=mysql_query($query_usu);
      $nro_caja=mysql_result($rs_usu,0,"mes_fac");
 
 
 }
 
 ?>
<!DOCTYPE html>
<html>
<meta charset="utf-8" >



<script language="javascript">

function inicio() {			
    document.getElementById("variable1").focus();                        
}
	
		
</script>
<head>
	<meta charset="utf-8" />
	<title>Pedido</title>
        
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="shortcut icon" href="img/logo.ico">
<body onLoad="inicio()">

<!-- Start Formoid form-->
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/jquery.min.js"></script>
<form id="form_busqueda" name="form_busqueda" action="buscar.php" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post"><div class="title">

  <h2>Agregar Productos</h2></div>
  <div class="element-input"><label class="title"><b>Nro. Pedido</b><span class="required">*</span></label><input class="large" type="text" name="variable1" id="variable0" value="<? echo $nro_fac?>" required="required" readonly="yes"/></div> 
	<div class="element-input"><label class="title"><b>Cod.Cliente / Denominacion</b><span class="required">*</span></label><input class="large" type="text" name="variable1" id="variable1" value="<? echo $codigoanterior." - ".$nombrecliente?>" required="required" readonly="yes"/></div>
  <div class="element-input"><label class="title"><b>Buscar Productos</b><span class="required">*</span></label><input class="large" type="text" name="variable1" id="variable1" value="" required="required"/></div>
  
  <div class="submit">
  <p>
    <input type="submit" value="Buscar"/>    
    <input type="hidden" name="cli_cod" id="cli_cod" value="<?echo $cli_cod?>"/>
    <input type="hidden" name="accion" id="accion" value="modificar"/>    
  </p>
</div>
</form>
</body>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>

</html> 
