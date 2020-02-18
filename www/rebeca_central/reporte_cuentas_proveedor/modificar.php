<?php 
include ("../conectar.php"); 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$variable1=$_GET["variable1"];

$query="SELECT * FROM compra_cab_view WHERE fac_cod='$variable1'";
$rs_query=mysql_query($query);
$variable2=strtoupper(mysql_result($rs_query,0,"fac_num"));
$variable3=strtoupper(mysql_result($rs_query,0,"prv_des"));
$variable4=strtoupper(mysql_result($rs_query,0,"prv_ruc"));
$variable5=strtoupper(mysql_result($rs_query,0,"mpg_des"));
$variable6=strtoupper(mysql_result($rs_query,0,"for_des"));
$variable7=strtoupper(mysql_result($rs_query,0,"tmo_des"));
$variable7_1=strtoupper(mysql_result($rs_query,0,"fac_tot_1"));

  $sel="select * from movimientos where borrado='0' and mov_cod=
    (SELECT MAX(mov_cod) FROM movimientos WHERE borrado=0 AND fac_cod='$variable1')";
  $rs=mysql_query($sel);
  $cuenta=mysql_num_rows($rs);
  if ($cuenta==0){
   $ban_cod=0;
  }else{  
   $ban_cod=mysql_result($rs,0,"ban_cod");
  }  
    
    

?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
		<script language="javascript">
		
		function cancelar() {
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;
		}
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function limpiar() {
			document.getElementById("formulario").reset();
		}

		
function guardar()
        
			{
				var mensaje="";
        
        if (document.getElementById("variable2").value=="") mensaje+="  - Descripcion\n";
        if (document.getElementById("variable3").value=="") mensaje+="  - RUC\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Direccion\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Telefono\n";
        if (document.getElementById("variable6").value=="") mensaje+="  - Email\n";
				
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
                
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario").submit();
                      }                        
                
          
              }
        }
        
function inicio(){
		document.getElementById("variable2").focus();
}        
			
		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">MODIFICAR <?echo $descripcion?> </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td>C&oacute;digo</td>
							<td><?php echo $variable1 ?></td>
						    <td width="42%" rowspan="13" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
							<td width="15%">Fac.Num.</td>
						    <td width="43%"><input NAME="variable2" type="text" class="comboGrande" id="variable2" size="45" maxlength="45" value="<?php echo $variable2; ?>" readonly></td>
						<tr>
					<tr>
							<td width="15%">Proveedor</td>
						    <td width="43%"><input NAME="variable3" type="text"  class="cajaMedia" id="variable3" size="245" maxlength="245" value="<?php echo $variable3; ?>" readonly></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>					
						<tr>
							<td width="15%">RUC</td>
						    <td width="43%"><input NAME="variable4" type="text"   class="cajaGrande" id="variable4" size="245" maxlength="245" value="<?php echo $variable4; ?>" readonly></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
            						<tr>
							<td width="15%">Medio Pago</td>
						    <td width="43%"><input NAME="variable5" type="text"  class="cajaMedia" id="variable5" size="45" maxlength="45" value="<?php echo $variable5; ?>" readonly></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
            <tr>
							<td width="15%">Forma Pago</td>
						    <td width="43%"><input NAME="variable6" type="text" class="cajaMedia" id="variable6" size="45" maxlength="45" value="<?php echo $variable6; ?>" readonly></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>		

            <tr>
							<td width="15%">Moneda</td>
						    <td width="43%"><input NAME="variable7" type="text" class="cajaMedia" id="variable7" size="45" maxlength="45" value="<?php echo $variable7; ?>" readonly></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>		
						<tr>
            	<td width="15%">Total</td>
						    <td width="43%"><input NAME="variable8" type="text" class="cajaMedia" id="variable8" size="45" maxlength="45" value="<?php echo $variable7_1; ?>" readonly></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>		
              
              	
				        </tr>
           <input NAME="ban_cod" type="hidden" id="ban_cod" size="10" maxlength="10" value="<?php echo $ban_cod; ?>" readonly>                	
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="modificar" type="hidden">
					<input id="id" name="id" value="<?php echo $variable1;?>" type="hidden">
			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
