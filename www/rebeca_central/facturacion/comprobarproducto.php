
<html>
<head>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(variable1,variable2,variable3,codigopro,pro_cos) {
 	
  parent.document.formulario_lineas.submit();
  parent.document.formulario_lineas.pro_cos.value=pro_cos;
  parent.document.formulario_lineas.variable6.value=variable1;
	parent.document.formulario_lineas.variable7.value=variable2;	
  parent.document.formulario_lineas.variable8.value=variable3;
  parent.document.formulario_lineas.pro_cod.value=codigopro;
	parent.document.formulario_lineas.variable9.value="1";	
  parent.document.formulario_lineas.variable9.focus();
  
  
}
			


function limpiar() {
   
  parent.document.formulario_lineas.variable6.value="";
	parent.document.formulario_lineas.variable7.value="";	
  parent.document.formulario_lineas.variable8.value="";
	parent.document.formulario_lineas.variable9.value="";	
  parent.document.formulario_lineas.submit();
  //parent.document.formulario.variable9.value=1;
  parent.document.formulario.variable6.focus();
  //ventanaArticulos();
}



	function ventanaArticulos(){
        var miPopup;
				miPopup = window.open("ver_pro.php","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();

		}

</script>
<? include ("../conectar.php"); ?>
<body>
<?	
$variable1=$_GET["codigopro"];
$nrofac=$_GET["nro_fac"];

$consulta="SELECT count(*) as cuenta from factura_det WHERE fac_cod='$nrofac' and borrado=0";
$rs_tabla = mysql_query($consulta);
$cuenta=mysql_result($rs_tabla,0,"cuenta");
				
        if ($cuenta < 10){
						$cantpro=0;							
				}else {
            $cantpro=1;
        }
	
	$consulta="SELECT * FROM productos_view WHERE pro_bar='$variable1' and par_cod <> 3 AND borrado='0'";
	$rs_tabla = mysql_query($consulta);
	

$i=0;
	
	if (mysql_num_rows($rs_tabla)>0) {
		
      $codigopro=mysql_result($rs_tabla,$i,"pro_cod");
			$variable3=mysql_result($rs_tabla,$i,"pro_des");      
      $variable2=number_format(mysql_result($rs_tabla,$i,"pro_ven"), 0, ",", ".");
      $variable4=number_format(mysql_result($rs_tabla,$i,"pro_cos"), 0, ",", ".");
   
 
		
		?>
		<script languaje="javascript">
		pon_prefijo("<?php echo $variable1?>","<?php echo $variable3?>","<?php echo $variable2?>","<?php echo $codigopro?>","<?php echo $variable4?>");
		
		</script>
		<? 
	} else { ?>
	<script languaje="javascript">
	 alert ("No existe ningun Producto con ese codigo");	
   limpiar();
   //ventanaArticulos();
   
	
  </script>
	<? }
?>
</div>
</body>
</html>
