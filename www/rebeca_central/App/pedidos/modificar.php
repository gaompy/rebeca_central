<?php 
@session_start();
include("../conexion/conectar.php");
include("../conexion/fecha_hora.php");

$variable1=$_POST['variable1'];

	
	$sel="select * from clientes_view where borrado='0' and codigoanterior='$variable1'";
	$rs=mysql_query($sel);  
  $cuenta = mysql_num_rows($rs);
	
  
  if ($cuenta==0){

   echo "NO EXISTE CLIENTE FAVOR BUSCAR";
    //header("Location:index.php");
  } else {
  
  $cli_cod=mysql_result($rs,0, "cli_cod");
  $codigoanterior=mysql_result($rs,0, "codigoanterior");
  $nombrecliente=mysql_result($rs,0, "nombrecliente");
  $cli_ruc=mysql_result($rs,0, "cli_ruc");
  $cli_dir=mysql_result($rs,0, "cli_dir");
  $cli_tel=mysql_result($rs,0, "cli_tel");
  
  
  
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
	<title><? echo strtoupper($descripcion); ?></title>
        
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="shortcut icon" href="img/logo.ico">
<body onLoad="inicio()">

<!-- Start Formoid form-->
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/jquery.min.js"></script>
<form id="form_busqueda" name="form_busqueda" action="guardar.php" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post"><div class="title">

  <h2>Datos del Cliente</h2></div>
   
	<div class="element-input"><label class="title"><b>Cod.Cliente</b><span class="required">*</span></label><input class="large" type="text" name="variable1" id="variable1" value="<? echo $codigoanterior?>" required="required" readonly="yes"/></div>
	<div class="element-input"><label class="title"><b>Denominacion</b><span class="required">*</span></label><input class="large" type="text" name="variable2" id="variable2" value="<? echo $nombrecliente?>" required="required" readonly="yes"/></div>
  <div class="element-input"><label class="title"><b>RUC</b><span class="required">*</span></label><input class="large" type="text" name="variable3" id="variable3" value="<? echo $cli_ruc?>" required="required" readonly="yes"/></div>
  <div class="element-input"><label class="title"><b>Direccion</b><span class="required">*</span></label><input class="large" type="text" name="variable4" id="variable4" value="<? echo $cli_dir?>" required="required" readonly="yes"/></div>
  <div class="element-input"><label class="title"><b>Telefono</b><span class="required">*</span></label><input class="large" type="text" name="variable5" id="variable5" value="<? echo $cli_tel?>" required="required" readonly="yes"/></div>      
  

  
  <div class="submit">
  <p>
    <input type="submit" value="Generar Pedido"/>    
    <input type="hidden" name="cli_cod" id="cli_cod" value="<?echo $cli_cod?>"/>
    <input type="hidden" name="accion" id="accion" value="modificar"/>    
  </p>
</div>
</form>
</body>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>

</html>
<?
  }
?>  	
