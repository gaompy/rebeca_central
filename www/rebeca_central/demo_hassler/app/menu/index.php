<?php
session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
include("../conexion/conectar.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
     <link rel="shortcut icon" href="../images/logo.ico">
    <title>CDO app</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!--[if lte IE 8]><link rel="stylesheet" href="../../responsive-nav.css"><![endif]-->
    <!--[if gt IE 8]><!--><link rel="stylesheet" href="styles.css"><!--<![endif]-->
    <script src="responsive-nav.js"></script>
  </head>
  <body>
    <div role="navigation" id="foo" class="nav-collapse">
      <ul>
        <li><a href="../menu/central.php" target="principal">Inicio</a></li> 
        <li><a href="../clientes/index.php" target="principal">Procesar Pedidos</a></li>
        <li><a href="../productos/index.php" target="principal">Lista de Productos</a></li>        
        <li><a href="../pedidos_lista/index.php" target="principal">Lista de Pedidos</a></li>
        <li><a href="../metas/index.php" target="principal">Calc. de Produccion</a></li>
        <li><a href="../cambio_pass/index.php" target="principal">Password</a></li>                    
        <li><a href="../sesion.php" >Salir</a></li> 
                                   
      </ul>
    </div>

    <div role="main" class="main">
        <a href="#nav" class="nav-toggle">Menu</a>
        <iframe src="../menu/central.php" name="principal" title="principal" width="105%" height="610px" 
          frameborder=0 style="margin-left: 0px; margin-right: 0px; margin-top: 0px; margin-bottom: 0px; text-align: center;">
        </iframe>  
    </div>  
    <script>
      var navigation = responsiveNav("foo", {customToggle: ".nav-toggle"});
    </script>
  </body>
</html>
