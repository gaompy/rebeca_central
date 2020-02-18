<?php 
@session_start();
$usu_cod=$_SESSION["id_usuario"];
$usu_des=$_SESSION["s_username"];
$definicion="CAMBIO DE ";
$descripcion="Password";
$par="modificar";
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" >
<script language="javascript">

function inicio() {	
  var par="<?echo $par?>";
    if (par=="alta"){
  		//document.getElementById("variable2").focus();                        
    }else{
      //document.getElementById("variable4").focus();
    }
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

        <h2><? echo strtoupper($definicion." ".$descripcion); ?></h2></div>
	<div class="element-input"><label class="title">codigo<span class="required">*</span></label><input class="large" type="text" name="variable1" id="variable1" value="<? echo $usu_cod; ?>" required="required" readonly="yes"/></div>
	<div class="element-input"><label class="title">Usuario<span class="required">*</span></label><input class="large" type="text" name="variable2" id="variable2" value="<? echo $usu_des?>" required="required" readonly="yes"/></div>
  <div class="element-password"><label class="title">Password<span class="required">*</span></label><input class="large" type="password" name="variable4" id="variable4" value="" required="required"/></div>         
  
  
  <div class="submit">
  <p>
    <input type="submit" value="Guardar"/> 
    <input type="hidden" name="accion" id="accion" value="<?echo $par?>"/>
  </p>
</div>
</form>
</body>
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>

</html>
  	
