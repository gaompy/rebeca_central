<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
?>
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(cli_des,estado,total,fac_cod) {
  
	parent.document.formulario_lineas.variable_2.value=cli_des;
  parent.document.formulario_lineas.variable_3.value=estado;
  parent.document.formulario_lineas.variable_4.value=total;
  parent.document.formulario_lineas.fac_cod.value=fac_cod;
  parent.document.getElementById("formulario_lineas").submit();
  
  //limpiar();
}

function limpiar() {
  parent.document.getElementById("formulario_lineas").submit();
  parent.document.formulario_lineas.variable_1.value="";
  parent.document.formulario_lineas.variable_2.value="";
  parent.document.formulario_lineas.variable_3.value="";
  parent.document.formulario_lineas.variable_4.value="";
  parent.document.formulario_lineas.variable_1.focus();
  //parent.document.getElementById("variable_1").focus();
    
}

</script>
<? include ("../../conectar.php"); ?>
<body>
<?
  include ("../../fecha_hora.php");
	$codfactura=$_GET["codfactura"];
	
	$consulta="SELECT *,
  (select cli_des from clientes where cli_cod=factura_cab.cli_cod) as cli_des  
  FROM factura_cab WHERE fac_cod='$codfactura' and borrado='0' and fac_ent='0'";
	$rs_tabla = mysql_query($consulta);
	
  if (mysql_num_rows($rs_tabla)>0) {
		
		$fac_cod=mysql_result($rs_tabla,0,"fac_cod");
		$cli_cod=mysql_result($rs_tabla,0,"cli_cod");
    $cli_des=mysql_result($rs_tabla,0,"cli_des");
	  $fac_est=mysql_result($rs_tabla,0,"fac_est");
    if ($fac_est=='0'){
     $estado="Pendiente";
    }else{
     $estado="Confirmado";
    }
 		
		$consulta2="SELECT REPLACE(FORMAT(SUM(pro_tot),0),',','.') AS total
                FROM factura_det 
                WHERE borrado='0' AND fac_cod='$fac_cod'";
		$rs_tabla2 = mysql_query($consulta2);
		$total=mysql_result($rs_tabla2,0,"total");
				
		
		?>
		<script languaje="javascript">
		pon_prefijo('<?php echo $cli_des?>','<?php echo $estado?>','<?php echo $total?>','<?php echo $fac_cod?>');
		</script>
		<? 
	} else { ?>
	<script>
	alert ("El pedido ha sido procesado!");
	limpiar();
	</script>
	<? }
?>
</div>
</body>
</html>
