<?php 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"];

include("../conexion/conectar.php");
//include ("../permisos.php");
$par="MODIFICAR";
$variable1="";
$variable2="";
$variable3="";

if ($par=="alta"){
  $definicion="INSERTAR";
	$sel="SELECT max(cli_cod) as maximo FROM clientes_view";
	$rs=mysql_query($sel);
	$variable1=mysql_result($rs,0,"maximo")+1;
  
}else{
  $definicion="MODIFICAR";
  $codigoanterior=$_POST["variable2"];
  
  if(is_numeric($codigoanterior)) {
      $codcliente = $codigoanterior;  
    } else {
      $codcliente = substr($codigoanterior,0, strpos($codigoanterior,'='));      
    }
  
  
	$sel="SELECT * FROM clientes_view where cli_cod='$codcliente'";
	$rs=mysql_query($sel);
  $nrs=mysql_num_rows($rs);
if ($nrs>0) { 
  $variable1=mysql_result($rs,0,"cli_cod");
	$variable3=mysql_result($rs,0,"cli_des");
  $variable4=mysql_result($rs,0,"cli_dir");
  $variable5=mysql_result($rs,0,"cli_ruc");

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" >
<script type="text/javascript" src="../js/formato.js"></script>
<script language="javascript">

function inicio() {			
    document.getElementById("variable2").focus();                        
}

		function salir(){
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;
		}		
</script>
<head>
	<meta charset="utf-8" />
	<title><? echo strtoupper($descripcion); ?></title>
        
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel="shortcut icon" href="img/logo.ico">
<body>




<!-- Start Formoid form-->
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/jquery.min.js"></script>
<form id="form_busqueda" name="form_busqueda" action="guardar.php" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post"><div class="title">

        <h2><? echo strtoupper("Cliente"); ?></h2></div>
	<div class="element-input"><label class="title"><b>codigo</b></label><input class="large" type="text" name="variable1" id="variable1" value="<? echo $variable1?>"  readonly="yes"/></div>
	<div class="element-input"><label class="title"><b>Cliente/RUC</b></label><input class="large" type="text" name="variable2" id="variable2" value="<? echo $variable3." / ".$variable5?>"  size="50" maxlength="50" readonly="yes"/></div>
  <div class="element-input"><label class="title"><b>Direccion</b></label><input class="large" type="text" name="variable3" id="variable3" value="<? echo $variable4 ?>"  size="50" maxlength="50"readonly="yes"/></div>
            
  <div class="submit">
  <p>
    <input type="submit" value="Generar Pedido"/>
    <input type="button" value="Volver" onclick="salir()"/>    
    <input type="hidden" name="cli_cod" id="cli_cod" value="<?echo $variable1?>"/>
    <input type="hidden" name="accion" id="accion" value="modificar"/>
  </p>
</div>
</form>
</body>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
</html>
<?php
}else{
header("Location:index.php");
}

}
?>