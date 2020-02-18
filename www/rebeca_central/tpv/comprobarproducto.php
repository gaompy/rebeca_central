
<script language="javascript">

function pon_prefijo(codigopro,variable1,variable2,variable3,cantidad) {
 	
  parent.document.formulario_lineas.codigopro.value=codigopro;
  parent.document.formulario_lineas.referencia.value=variable1;
	parent.document.formulario_lineas.descripcion.value=variable2;	
  parent.document.formulario_lineas.precio.value=variable3;
  
 parent.document.getElementById("formulario_lineas").submit();
 //parent.document.formulario_lineas.total.value=totalgral;
}
			


function limpiar() {

  parent.document.formulario_lineas.descripcion.value="";
	parent.document.formulario_lineas.precio.value="";
	parent.document.formulario_lineas.referencia.value="";
	parent.document.formulario_lineas.cantidad.value="";
  parent.document.getElementById("formulario_lineas").submit();
}

</script>
<?
 include ("../conectar.php");
 include ("../fecha_hora.php");

 ?>
<body>
<?	
$variable1=$_GET["codigopro"];
$cantidad=$_GET["cantidad"];
$nro_fac=$_GET["nro_fac"];


	$consulta="SELECT * FROM productos WHERE pro_bar='$variable1' AND borrado='0'";
	$rs_tabla = mysql_query($consulta);
	

$i=0;
	
	if (mysql_num_rows($rs_tabla)>0) {
		
           $codigopro=mysql_result($rs_tabla,$i,"pro_cod");
			      $variable2=mysql_result($rs_tabla,$i,"pro_des");
			      $variable3=mysql_result($rs_tabla,$i,"pro_ven_nor");

   
   
   	   
 			$aps_cod=1;	
			$apertura=2;
	
			@$codigo=$variable1;

      @$precio=$variable3;
      @$costototal=$precio*$cantidad;
      @$usuario=1;

				



$sel_insert="INSERT INTO factura_det(fac_cod,ape_cod,pro_cod,pro_bar,pro_can,pro_cos,pro_tot,aps_cod,fecha,hora,usuario,borrado)
values('$nro_fac','$apertura','$codigopro','$codigo','$cantidad','$precio','$costototal','$aps_cod','$fecha','$hora','$usuario','0')";
$rs_insert=mysql_query($sel_insert);
 
 
   
		?>
		<script languaje="javascript">
		pon_prefijo("<?php echo $codigopro?>","<?php echo $variable1?>","<?php echo $variable2?>","<?php echo $variable3?>","<?php echo $cantidad?>");
		
		</script>
		<? 
	} else { ?>
	<script>
	alert ("No existe ningun Producto con ese codigo");	
	limpiar();
	</script>
	<? }
?>

