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
$hora_actual=date("H:i:s");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>



<title>Pantalla de Pedidos</title>

<link rel="stylesheet" type="text/css" href="estilos/view.css" media="all">
<script type="text/javascript" src="estilos/view.js"></script>



</head>

<link rel="shortcut icon" href="images/ico.png">

<body id="main_body" >

<body onLoad="inicio()">

	<img id="top" src="images/top.png" alt="">
	<div id="form_container">

		<script language="javascript">

    function actualizar()
      {
     
      document.getElementById("form_700784").submit();
      } 
    function atras(){
    
    alert("hola");
    }      
     
		</script>

	  <h1><a>Categorias</a></h1>
		<form id="form_700784" class="appnitro" method="post" action="frame.php" target="frame_rejilla">
		<div class="form_description">
			<table width="184" border="0" align="center">
			  <tr>
			    <td width="178"><img src="images/logo.png" width="148" height="45"/></td>
		      </tr>
			  </table>
			<p>&nbsp;</p>
			<p><img src="img/atras.png" width="50" height="45" onClick="javascript:atras()"/></p>
			<h2 align="center"></p>
     <?
        include ("../conectar.php");
        $sql="select * from familias_pro where borrado='0' and fam_par='1' order by fam_des";
	      $res=mysql_query($sql);
         $contador=0;
     ?> 
   <div>
   
		<p>
		  <select class="element select medium" id="fam_cod" name="fam_cod" onChange="actualizar()"> 
		    <option value="" selected="selected"></option>
		    <?php
								while ($contador < mysql_num_rows($res)) { ?>
		    <option value="<?php echo mysql_result($res,$contador,"fam_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"fam_des"))?></option>
		    <?php $contador++;
								} ?>				
	      </select>							
		  </td>
		  </li>          
     </p>
		<p>&nbsp;</p>
   </div>  		
     		
    </form>	
     	<iframe width="100%" height="500" id="frame_rejilla" name="frame_rejilla" frameborder="0">
			 <ilayer width="100%" height="500" id="frame_rejilla" name="frame_rejilla"></ilayer>
			</iframe>
		<div id="footer">Creado por GSM Nitro</div>
   <img id="bottom" src="images/bottom.png" alt="">
	</body>
</html>