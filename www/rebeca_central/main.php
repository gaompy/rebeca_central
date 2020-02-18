<?php 
include("conectar.php");
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
@$nivel=$_SESSION["niv_cod"];
//include("seguridad.php");

if ($_SESSION["id_usuario"]==""){;

header ("Location:index.php");
}
else{

?>
<html>
<link rel="shortcut icon" href="img/ico.png">

<head>
<body oncontextmenu="return false">
  <title>Syspymes</title>
  
  <script language="JavaScript" src="menu/JSCookMenu.js"></script>
  <link rel="stylesheet" href="menu/theme.css" type="text/css">
  <p>
    <script language="JavaScript" src="menu/theme.js"></script><script language="JavaScript">
<!--

var MenuPrincipal = [
    <?
    $sel="SELECT * FROM (SELECT mec_cod,(SELECT mec_des FROM menu_cab WHERE mec_cod=tmp.mec_cod) AS mec_des, (SELECT mec_ord FROM menu_cab WHERE mec_cod=tmp.mec_cod) AS mec_ord 
FROM (SELECT * FROM permisos WHERE niv_cod='$nivel' AND per_con='on') AS tmp GROUP BY mec_cod) AS tmp1 ORDER BY mec_ord";
    $res=mysql_query($sel);
    $contador=0;	
    while ($contador < mysql_num_rows($res)) {    
    ?>    
    [null,'<?php echo mysql_result($res,$contador,"mec_des")?>',null,null,'alpha',
    <?
          $mec_cod=mysql_result($res,$contador,"mec_cod");
          $sel1="SELECT * ,
          (SELECT med_des FROM menu_det WHERE med_cod=permisos.med_cod) AS med_des,
          (SELECT med_dir FROM menu_det WHERE med_cod=permisos.med_cod) AS med_dir,
          (SELECT med_ifr FROM menu_det WHERE med_cod=permisos.med_cod) AS med_ifr,
          (SELECT med_ord FROM menu_det WHERE med_cod=permisos.med_cod) AS med_ord
           FROM permisos WHERE niv_cod='$nivel' AND per_con='on' AND mec_cod='$mec_cod'
           ORDER BY (SELECT med_ord FROM menu_det WHERE med_cod=permisos.med_cod)";
           $res1=mysql_query($sel1);
          $contador1=0;
          while ($contador1 < mysql_num_rows($res1)) { 
          ?>           
           [null,'<?php echo mysql_result($res1,$contador1,"med_des")?>','<?php echo mysql_result($res1,$contador1,"med_dir")."?variable1=".mysql_result($res1,$contador1,"med_cod")."&variable2=".mysql_result($res,$contador,"mec_cod")."&variable3=".mysql_result($res1,$contador1,"med_des")?>','<?php echo mysql_result($res1,$contador1,"med_ifr")?>','prg'],
          
          <?
          $contador1++;
          }
    
    ?>
    ],	
    <?
    $contador++;
    }    
    ?>
    [null,'Sesion','sesion.php',null,'prg'],    
    ];



--></script>
    
    <style type="text/css">
  body { background-color: rgb(255, 255,255);
    background-image: url(images/superior.png);
    background-repeat: no-repeat;
	margin: 0px;
    }

  #MenuAplicacion { margin-left: 10px;
    margin-top: 0px;
    }


    </style>
  </p>
<div id="MenuAplicacion" align="center"></div>
<script language="JavaScript">
<!--
	cmDraw ('MenuAplicacion', MenuPrincipal, 'hbr', cmThemeGray, 'ThemeGray');
-->
</script>
<iframe src="central.php" name="principal" title="principal" width="100%" height="1050px" frameborder=0 scrolling="no" style="margin-left: 0px; margin-right: 0px; margin-top: 2px; margin-bottom: 0px;"></iframe>
</body>
</html>
<?php

}
?>