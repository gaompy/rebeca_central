<?php
@session_start();
include ("../conectar.php");
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
include ("../permisos.php");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>



<title>Pantalla para Mozos</title>

<link rel="stylesheet" type="text/css" href="estilos/view.css" media="all">
<script type="text/javascript" src="estilos/view.js"></script>



</head>

<link rel="shortcut icon" href="images/ico.png">

<body id="main_body" >

<body onLoad="inicio()">

	

	<img id="top" src="images/top.png" alt="">

	<div id="form_container">

	

		<script language="javascript">
    
    function confirmar(fac_cod,mes_cod)
    {
	   
      if (fac_cod==0){
        
        if (confirm(" Desea Crear Pedido ? ")){
		    location.href="guardar.php?fac_cod="+fac_cod+"&mes_cod="+mes_cod;
        //location.href="guardar.php?";
        }

      }else{
        location.href="guardar.php?fac_cod="+fac_cod+"&mes_cod="+mes_cod;
     }
     
     
    }


		</script>

	

		<h1><a>Pantalla para Mozos</a></h1>

		<form id="form_700784" class="appnitro"  method="post" action="login.php">

					<div class="form_description">

			<table width="184" border="0" align="center">
			  <tr>
			    <td width="178"><img src="images/logo.png" width="148" height="45" /></td>
		      </tr>
			  </table>
			<h2 align="center">
			  
			  Pantalla para Mozos
  </p>
			  </h2>
					
					</div>
          
          <table width="600" border="0" align="center">
		              
                  <tr>
		                   <?
                        $sel_lineas="select * from mesas where borrado='0' order by mes_cod";
                        $rs_lineas=mysql_query($sel_lineas);
                        
                        for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
                        $mes_cod=mysql_result($rs_lineas,$i,"mes_cod");
                        $mes_des=mysql_result($rs_lineas,$i,"mes_des");
                        $fac_cod=mysql_result($rs_lineas,$i,"mes_fac");
                        if ($fac_cod==0){
                          $estado="Pendiente";
                          $img="img/agregar.jpg";
                        }else{
                          $estado="Atendido - Pedido N° ".$fac_cod;
                          $img="img/signo_ok.jpg";
                        }
                        
                         ?>
                    
                    <td width="122"><?echo $mes_des?></td>
		                <td width="241"><?echo $estado?></td>
                  
                    <td width="75"><a href="javascript:confirmar('<?echo $fac_cod?>','<?echo $mes_cod?>')"><img src="<? echo $img;?>" width="49" height="49" /></td>
            </tr>
                    <? } ?>
            </tr>
          </table>
		</form>	

		<div id="footer">

			Creado por GSM Nitro</div>

	</div>

	<img id="bottom" src="images/bottom.png" alt="">

	</body>

</html>