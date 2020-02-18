<?php
session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];
$emp_des=$_SESSION["emp_des"];

if ($emp_des==""){
header("Location:../index.php");
}



include("../../conectar.php");

$variable1=$_GET["nrofactura"];
//@$variable2=$_GET["mesa"];
@$importe=str_replace(".","",($_GET["importe"]));

$query1="SELECT * 
FROM clientes 
WHERE cli_cod=(SELECT cli_cod FROM factura_cab WHERE fac_cod='$variable1')";
$res1=mysql_query($query1);
$cli_des=mysql_result($res1,0,"cli_des");
$cli_ruc=mysql_result($res1,0,"cli_ruc");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comprobante de Ingreso</title>
<style type="text/css">
.centrar {
	text-align: center;
	font-weight: bold;
}
.centrar {
	font-size: 9px;
}
.centrar2 {
	text-align: left;
	font-size: 9px;
}
.centrar2 {
	text-align: left;
	font-size: 9px;
}
.fuentes {
	font-family: "Courier New", Courier, monospace;
}
.fuentes {
	font-family: "Times New Roman", Times, serif;
}
.fuentes {
	font-size: 12px;
}

.x {
  //font-family: "Times New Roman", Times, serif; 
	font-family: "Courier New", Courier, monospace;
	font-size: 12px;
	font-weight: bold;
}
</style>

	<script language="javascript">
  
  function impresion(){
		 window.print();      
  }	  
  </script>
</head>
<body onLoad="impresion()">
<span class="x">-----------------------------<br />
  <label for="variable1">&nbsp&nbsp&nbsp&nbsp<?echo "&nbsp ".strtoupper($emp_des) ?><br />
  </label>
    <label for="variable1"><br />
  </label>
    <label for="variable1">&nbsp&nbsp&nbsp&nbsp Adan Ramirez c/<br />
      </label>
    <label for="variable1">&nbsp&nbsp&nbsp&nbsp Villarrica<br />
      </label>
  <label for="variable1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Capiata-Paraguay<br />
  </label>
  <label for="variable1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Cel.:0981-413452<br />
  </label>
  <label for="variable1">&nbsp&nbsp TICKET NRO: <?echo $variable1 ?><br />
  </label>
  <label for="variable1">&nbsp&nbsp CLIENTE: <?echo $cli_des ?><br />
  </label>
  
  </label>-----------------------------<br />
  <label for="variable1">&nbsp; &nbsp;CANT DESCRIP. UNIT.SUBT<br />
  </label>-----------------------------</span>
<table width="300" border="0">
  <?
$query="SELECT fac_cod,pro_cod,
(SELECT pro_bar FROM productos WHERE pro_cod=factura_det.pro_cod) AS pro_bar, 
(SELECT pro_des FROM productos WHERE pro_cod=factura_det.pro_cod) AS pro_des,
pro_can,pro_ven,pro_tot,borrado 
FROM 
factura_det WHERE borrado=0 AND fac_cod='$variable1'
ORDER BY mde_cod";
$res=mysql_query($query);

?>  
  <tr>
    <?
  $total=0;
for ($i = 0; $i < mysql_num_rows($res); $i++) {
 $j=$i+1;
 $pro_des=mysql_result($res,$i,"pro_des");
 $pro_can=mysql_result($res,$i,"pro_can");
 $pro_tot=mysql_result($res,$i,"pro_tot");
 $pro_ven=mysql_result($res,$i,"pro_ven"); 
  ?>
    
    <td width="20"><span class="x">
      <label for="variable1"><br />
      </label>
    </span></td>
  
  
    
    <td width="1"><span class="x">
      <label for="variable1"><?echo $pro_can."-"?><br />
      </label>
    </span></td>

      <td width="100"><span class="x">
      <label for="variable1"><?echo substr(($pro_des),0,100)."(".number_format($pro_ven, 0, ",", ".").")" ?><br />
      </label>
    </span></td>
  
    
    <td width="150">      <span class="x">
      <label for="variable1"><?echo number_format($pro_tot, 0, ",", ".") ?><br />
      </label>
    </span></td>
    
    
  </tr>
  <?
   
$total=$pro_tot+$total;
$vuelto=$importe-$total;
   
   }
  ?>
  
</table>
<span class="x">-----------------------------<br />

<label for="variable1">&nbsp&nbsp TOTAL : <?echo number_format($total, 0, ",", ".") ?><br />
</label>
<label for="variable1">&nbsp&nbsp IMPORTE : <?echo number_format($importe, 0, ",", ".") ?><br />
</label>
<label for="variable1">&nbsp&nbsp VUELTO : <?echo number_format($vuelto, 0, ",", ".") ?><br />
</label>
<label for="variable1">&nbsp&nbsp FECHA : <?echo date("d/m/Y") ?><br />
</label>
<label for="variable1">&nbsp&nbsp HORA : <?echo date("H:i:s") ?><br />
</label>
<label for="variable1">&nbsp&nbsp CAJERO : <?echo $usuario_desc ?><br />
</label>
</span>
</body>
</html>