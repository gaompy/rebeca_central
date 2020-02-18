<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="images/logo.ico">
        <title>CDO app</title>
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/menu.css" type="text/css" media="screen">

        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
    <?
      @$mensaje=$_GET["mensaje"];
      include("menu/files.php");
    ?>      
    <label for="select"></label>
    </body>

</html>