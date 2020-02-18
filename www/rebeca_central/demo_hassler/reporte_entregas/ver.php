<?php
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$ncaja=$_SESSION["ncaja"];
include ("../conectar.php"); 

$variable1=$_GET["variable1"];

$query="SELECT * FROM factura_cab_view WHERE fac_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"cli_des"));
@$fac_rec=strtoupper(mysql_result($rs_query,0,"fac_rec"));
if($fac_rec==NULL){
$fac_rec="--";
}
$variablex=mysql_result($rs_query,0,"usuario");

$query_usu="SELECT * FROM usuarios WHERE id='$variablex'";
$rs_query_usu=mysql_query($query_usu);
$variable_usu=strtoupper(mysql_result($rs_query_usu,0,"usuario"));

?>

<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		
		function aceptar() {
		  var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;

		}
    
    function guardar()
        
			{
				var mensaje="";
        if (document.getElementById("retirado").value=="") mensaje+="  - Entregado/Observacion\n";
        
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
                
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
                  }
          
              }
        }
    
  function inicio(){
		document.getElementById("retirado").focus();
}
		
		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">VER <?echo $descripcion?></div>
				<div id="frmBusqueda">
        <form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="14%">Ticket</td>
							<td colspan="2"><?php echo $variable1 ?></td>
					    </tr>
						<tr>
							<td width="14%">Cliente</td>
						    <td colspan="2"><?php echo $variable2?></td>
					    </tr>
						<tr>
					  <td width="14%">Fecha</td>
						    <td colspan="2"><?php echo mysql_result($rs_query,0,"fecha")?></td>
					    </tr>
						<tr>
					<td width="14%">hora</td>
						    <td colspan="2"><?php echo mysql_result($rs_query,0,"hora")?></td>
					    </tr>
						<tr>						
					<td width="14%">usuario</td>
						    <td colspan="2"><?php echo $variable_usu; ?></td>
					    </tr>
						<tr>						
					<td width="14%"></td>
						    <td colspan="2"></td>
					    </tr>              
						<tr>						
					   <td width="14%"><b>Codigo Barras</b></td>
						    <td colspan="2"><b>Descripcion</b></td>
                <td colspan="2"><b>Cantidad</b></td>
                <td colspan="2"><b>Total</b></td>
                <td width="26%" colspan="2"><b>Entregar</b></td>
					    </tr>   
              						<tr>						
					<td width="14%"></td>
						    <td colspan="2"></td>
					    </tr>           
<?php
$sel_lineas="SELECT factura_det.mde_cod,factura_det.pro_cod, productos.pro_bar,productos.pro_des, familias_pro.fam_des, factura_det.pro_can,factura_det.pro_gus1,factura_det.pro_gus2, factura_det.pro_ven, factura_det.pro_tot, 
factura_det.mde_par,factura_det.hora,factura_det.borrado
FROM (factura_det INNER JOIN productos ON factura_det.pro_cod = productos.pro_cod) INNER JOIN familias_pro ON productos.fam_cod = familias_pro.fam_cod
WHERE factura_det.borrado='0' and factura_det.fac_cod='$variable1'  order by factura_det.mde_cod desc";

$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
	$numlinea=mysql_result($rs_lineas,$i,"mde_cod");
	$pro_cod=mysql_result($rs_lineas,$i,"pro_cod");
  $pro_bar=mysql_result($rs_lineas,$i,"pro_bar");	
  $pro_des=strtoupper(mysql_result($rs_lineas,$i,"pro_des"));
	$fam_des=strtoupper(mysql_result($rs_lineas,$i,"fam_des"));
	$pro_can=mysql_result($rs_lineas,$i,"pro_can");
  $pro_tot=mysql_result($rs_lineas,$i,"pro_tot");
  $mde_par=mysql_result($rs_lineas,$i,"mde_par");
?>
<tr>	
<input id="lin_<?echo $numlinea?>" name="lin_<?echo $numlinea?>" value="<?php echo $numlinea?>" type="hidden">					
<td width="14%"><?echo $pro_bar?></td>
<td colspan="2"><b><?echo $pro_des?></b></td>
<td colspan="2"><b><?echo $pro_can?></b></td>
<td colspan="2"><b><?echo number_format($pro_tot, 0, ",", ".");?></b></td>
<td colspan="2">
<?php 
if ($mde_par=='0'){
?>

<select id="var_<?echo $numlinea?>" name="var_<?echo $numlinea?>" class="comboPequeno">
 <?php 
 if ($ncaja==6){
 ?>
<option value="1">Si</option>
<option value="0">No</option>
<?php
}else{
?>
<option value="0">No</option>
<option value="1">Si</option>


</select>  
<?php
}
}else{
?>
<select id="var_<?echo $numlinea?>" name="var_<?echo $numlinea?>" class="comboPequeno" readonly>
<option value="1">Entregado</option>

</select>  

<?
}
?>
</td>
</tr> 


<?php
}
?>              
              
						
						<tr>
							<td width="15%">Retirado/Observacion </td>
						    <td width="43%"><input NAME="retirado" value="<?echo $fac_rec?>" type="text" class="cajaGrande" id="retirado" size="245" maxlength="245"></td>
					        
						</tr>					
      	</table>        
              
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar()" border="1" onMouseOver="style.cursor=cursor">          
          <img src="../img/botoncancelar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">
			    <input id="accion" name="accion" value="alta" type="hidden">
          <input id="variable1" name="variable1" value="<?echo $variable1;?>" type="hidden">
        </div>
        </form>
		  </div>
		  </div>
		</div>
	</body>
</html>
