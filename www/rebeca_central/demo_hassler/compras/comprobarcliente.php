
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,variable4,variable4_1,variable4_2,variable5) {

	parent.document.formulario.variable2.value=variable2;
  parent.document.formulario.variable3.value=variable3;
  parent.document.formulario.variable4.value=variable4_1;
  parent.document.formulario_lineas.cli_cod.value=variable1;
  parent.document.formulario_lineas.variable6.focus();
  
  //parent.document.formulario_lineas.submit();

}

function limpiar() {
  parent.document.formulario.variable1.value="";
	parent.document.formulario.variable2.value="";
  parent.document.formulario.variable3.value="";
  parent.document.formulario.variable4.value="";
  parent.document.formulario.variable1.focus();
}

</script>
<? include ("../conectar.php"); ?>
<body>
<?
$cli_cod=$_GET["variable1"];
$fac_cod=$_GET["variable2"];
$consulta="SELECT * from proveedores WHERE cli_cod='$cli_cod' and borrado='0'";
$rs_tabla = mysql_query($consulta);
	if (mysql_num_rows($rs_tabla)>0) {

		$cli_des=mysql_result($rs_tabla,0,"cli_des");	
		$prv_=mysql_result($rs_tabla,0,"prv_");
		$tic_cod=mysql_result($rs_tabla,0,"tic_cod");
		$tic_des=mysql_result($rs_tabla,0,"tic_des");
    $tic_por=mysql_result($rs_tabla,0,"tic_por");		
		
		?>
		<script languaje="javascript">
	  	pon_prefijo("<? echo $cli_cod ?>","<? echo $cli_des ?>","<? echo $prv_ ?>","<? echo $tic_cod ?>","<? echo $tic_des ?>","<? echo $tic_por?>","<? echo $fac_cod?>");
    
		</script>
		<? 
	} else { ?>
 <script languaje="javascript">
    alert("No existe cliente en la base de datos!");
    limpiar();
  </script>
  
	<? }
  ?>
</div>
</body>
</html>