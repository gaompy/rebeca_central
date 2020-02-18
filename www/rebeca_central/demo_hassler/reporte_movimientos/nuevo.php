<?php 
@session_start();
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$usuario=$_SESSION["id_usuario"];
include ("../conectar.php"); 


    $query1="SELECT * FROM aper_cie WHERE ape_par='0' and usuario='$usuario'";
    $rs_query1=mysql_query($query1);    
    $cuenta1 = mysql_num_rows($rs_query1);

    

   if ($cuenta1=='0') {

   ?>
        <script>
          alert ("Debe realizar Apertura de Caja!");
          location.href="../central.php";	
        </script>
    <?
} else {

$ape_cod=mysql_result($rs_query1,0,"ape_cod");
$aps_cod=mysql_result($rs_query1,0,"aps_cod");
 
$_SESSION["ape_cod"] = $ape_cod;
$_SESSION["aps_cod"] = $aps_cod; 

}

?>
<html>

		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="../funciones/validar.js"></script>
    <script type="text/javascript" src="../js/formato.js"></script> 
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
        if (document.getElementById("variable3").value=="") mensaje+="  - Monto\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Tipo de Mov.\n";
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
				<div id="tituloForm" class="header">INSERTAR <?echo $descripcion?> </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						
            <tr>
							<td width="15%">Apertura</td>
						    <td width="43%"><input NAME="variable1" type="text" value="<? echo $ape_cod?>" class="cajaPequena" id="variable1" size="45" maxlength="45" readOnly="yes"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>  
            <tr>
							<td width="15%">Descripcion</td>
						    <td width="43%"><input NAME="variable2" type="text" class="cajaGrande" id="variable2" size="245" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
								
									
            <tr>
							<td width="15%">Monto</td>
						    <td width="43%"><input NAME="variable3" type="text" onKeyUp="format(this)" class="cajaMedia" id="variable3" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="12" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>		
							<td width="15%">Tipo de Mov.</td>
							<td width="43%"><select id="variable4" name="variable4" class="comboMedio">
							<option value="">Ninguno</option>
              <option value="0">Ingresos</option>
              <option value="1">Egresos</option>
						</select>							</td>  														
					 
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="guardar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="alta" type="hidden">
					<input id="id" name="id" value=variable2 type="hidden">
			  </div>
			  </form>
		  </div>
		  </div>
		</div>
	</body>
</html>
