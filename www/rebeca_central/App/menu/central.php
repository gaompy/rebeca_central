<?php
@session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head >
<script language="javascript">
function inicio() {
			document.getElementById("username").focus();
		}
 </script>
<body class="blurBg-false"  onLoad="inicio()">
  <h2>&nbsp;</h2>
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/jquery.min.js"></script>
<form class="formoid-default-skyblue"  action='login.php' 
style="background-color:#FFFFFF;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#00557f;max-width:680px;min-width:150px" 
method="post"><div class="title"><h2><img src="../images/logo.jpg" width="210" height="200"></h2>
  <p>Alpha Solutions / Empresa: <?php echo $_SESSION["emp_des"];?></p>
  <p> Usuario Conectado:<span class="style3"><?php echo $_SESSION["s_username"]; ?></span></p>  
  <p> Conectado desde:<span class="style3"><?php echo $_SERVER['REMOTE_ADDR'];?></span></p>
<div align="center" class="Estilo6">
  <blockquote>
    <p>&nbsp;</p>
  </blockquote>
</div>
</div>
<div class="element-input"><script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
</div>
</form>
</body>
</html>
