<?php 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$campo=$_SESSION["campo"] ;
$tabla=$_SESSION["tabla"] ;

include("../conexion/conectar.php");
include ("../permisos.php");
$par=$_GET["par"];
$variable1="";
$variable2="";
$variable3="";

if ($par=="alta"){
  $definicion="INSERTAR";
	$sel="SELECT max(".$campo."_cod) as maximo FROM ".$tabla."";
	$rs=mysql_query($sel);
	$variable1=mysql_result($rs,0,"maximo")+1;
  
}else{
  $definicion="MODIFICAR";
  $variable1=$_GET["variable1"];
	$sel="SELECT * FROM ".$tabla." where ".$campo."_cod='$variable1'";
	$rs=mysql_query($sel);
	$variable2=mysql_result($rs,0, $campo."_des");

}


?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" >
<script language="javascript">

function inicio() {			
    document.getElementById("variable2").focus();                        
}

		function salir(){
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      var campo="<?echo $campo?>";
      var tabla="<?echo $tabla?>";
      location.href="index.php?campo="+campo+"&tabla="+tabla+"&variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;
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
<form id="form_busqueda" name="form_busqueda" action="guardar.php" class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:12px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" method="post"><div class="title">
<img src="../images/logo.jpg" width="125" height="91">
        <h2><? echo strtoupper($definicion." ".$descripcion); ?></h2></div>
	<div class="element-input"><label class="title"><b>codigo</b><span class="required">*</span></label><input class="medium" type="text" name="variable1" id="variable1" value="<? echo $variable1?>" required="required" readonly="yes"/></div>
	<div class="element-input"><label class="title"><b>Descripcion</b><span class="required">*</span></label><input class="large" type="text" name="variable2" id="variable2" value="<? echo $variable2?>" required="required"/></div>        
  <div class="submit">
  <p>
    <input type="submit" value="Guardar"/>
    <input type="button" value="Volver" onclick="salir()"/>    
    <input type="hidden" name="accion" id="accion" value="<?echo $par?>"/>
  </p>
</div>
</form>
</body>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>

</html>
  	
