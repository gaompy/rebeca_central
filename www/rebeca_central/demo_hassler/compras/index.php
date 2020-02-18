<?php
@session_start();
include ("../conectar.php");
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
include ("../permisos.php");

$query1="SELECT max(fac_cod) as maximo FROM compra_cab";
$rs_query1=mysql_query($query1);
$nro_fac=mysql_result($rs_query1,0,"maximo")+1;
?>
<html>
	<head>
	<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
    <link href="../calendario/calendar-blue.css" rel="stylesheet" type="text/css">    
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar.js"></script>
		<script type="text/JavaScript" language="javascript" src="../calendario/lang/calendar-sp.js"></script>	
		<script type="text/JavaScript" language="javascript" src="../calendario/calendar-setup.js"></script>	
    <script type="text/javascript" src="../js/formato.js"></script>    		
	
	<script language="javascript">
  
  
		function validarcliente(){
      var miPopup;
      var fac_cod=document.getElementById("variable0").value;
      var cli_cod=document.getElementById("variable1").value;      
			miPopup = window.open("comprobarcliente.php?variable1="+cli_cod+"&variable2="+fac_cod,"frame_lineas","width=700,height=80,scrollbars=yes");
		 }
		
		function abreVentana(){
		  var miPopup;
      
      
      var mensaje="";

        if (document.getElementById("fac_num").value=="") mensaje+="  - Nro.Factura\n";
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);          
 			    }else {
           var estado=document.getElementById("estado").value;
           if (estado==0){
             var fac_cod=document.getElementById("fac_num").value;
			       miPopup = window.open("ver_cliente.php?fac_cod="+fac_cod,"miwin","width=700,height=450,scrollbars=no");
			       miPopup.focus();
             }else{alert("No se puede modificar Factura");}
          }			
		}

		function validarproducto(){
			
    var mensaje="";
        if (document.getElementById("variable1").value=="") mensaje+="  - Codigo Cliente\n";
        if (document.getElementById("variable2").value=="") mensaje+="  - Nombre Cliente\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Fecha Compra\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {          
            var estado=document.getElementById("estado").value;
           if (estado==0){
            var nro_fac=document.getElementById("variable0").value;
			      var codigo=document.getElementById("variable6").value;      
		        miPopup = window.open("comprobarproducto.php?codigopro="+codigo+"&nro_fac="+nro_fac,"frame_lineas","miwin","width=700,height=80,scrollbars=yes");
            }else{alert("No se puede modificar Factura");}

		   }	  
    
    
    }	    

function guardar()
        
			{
				var mensaje="";

        if (document.getElementById("variable6").value=="") mensaje+="  - Codigo\n";
        if (document.getElementById("variable9").value=="") mensaje+="  - Cantidad\n";
        if (document.getElementById("variable2").value=="") mensaje+="  - Nombre Cliente\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Fecha Compra\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
                if (isNaN(document.getElementById("variable9").value)==true) {
									 alert ("El campo cantidad debe ser numerico!");									
								    }else{
                     if (confirm(" Desea guardar registro? ")){ 
                          document.getElementById("formulario_lineas").submit();
                          document.getElementById("variable6").value="";
                          document.getElementById("variable7").value="";
                          document.getElementById("variable8").value="";
                          document.getElementById("variable9").value="";
                          document.getElementById("variable6").focus();
                      }                        
                      } 
          
              }
        }
		function inicio(){
      //var codigo=document.getElementById("variable0").value;
      //miPopup = window.open("comprobarfactura.php?codfactura="+codigo,"frame_lineas","width=700,height=80,scrollbars=yes");
		  document.getElementById("fac_num").focus();
    }
    
		function ventanaArticulos(){
      var mensaje="";
        if (document.getElementById("variable1").value=="") mensaje+="  - Codigo Cliente\n";
        if (document.getElementById("variable2").value=="") mensaje+="  - Nombre Cliente\n";
        if (document.getElementById("variable5").value=="") mensaje+="  - Fecha Compra\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else { 
           
              var estado=document.getElementById("estado").value;
                if (estado==0){       
				          miPopup = window.open("ver_pro.php","miwin","width=700,height=500,scrollbars=yes");
				          miPopup.focus();
              } else {alert("No se puede modificar Factura");} 
             }
		}
    

function imprimir(codfactura,mesa) {
		  	var miPopup;
        miPopup = window.open("reporte/impresiones_orden.php?nrofactura="+codfactura+"&mesa="+mesa,"miwin","width=500,height=300,scrollbars=yes");
        miPopup.focus();
		}	    

		function cerrar_caja(){
    
				var mensaje="";
				if (document.getElementById("variable2").value=="") mensaje+="  - Cliente\n";				
				if (mensaje!="") {
					alert("Atencion, se han detectado las siguientes incorrecciones:\n\n"+mensaje);
				} else {					
            var estado=document.getElementById("estado").value;
            if (estado==0){ 
							document.getElementById("formulario").submit();	
           }else {alert("No se puede modificar Factura");}    						
				}	
			}	
		
    function cancelar() {
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="../central.php";
		}
     	      
  </script>
	<style type="text/css">
<!--
.Estilo1 {
	font-size: 14pt;
	font-weight: bold;
}
-->
    </style>

<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header"><?echo $descripcion?></div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_factura.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>						
					  
					   
						<tr>
							<td width="1%">Fac. Nro. </td>					
					      <td colspan="3"><input NAME="fac_num" type="text" class="cajaMedia" id="fac_num" size="200" maxlength="200" onKeyup="mascara(this,'-','3-3-7',true)">
					      </tr>
						<tr>
							<td width="15%">Cod. Proveedor </td>							
					      <td colspan="3"><input NAME="variable1" type="text" class="cajaPequena" id="variable1" size="6" maxlength="5">
					        <img src="../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar Cliente" onMouseOver="style.cursor=cursor"></td>					
						</tr>
						<tr>
							<td width="6%">Nombre</td>
						    <td width="27%"><input NAME="variable2" type="text" class="cajaGrande" id="variable2" size="45" maxlength="45" readonly></td>
				        <td width="3%">RUC</td>
				        <td width="64%"><input NAME="variable3" type="text" class="cajaMedia" id="variable3" size="20" maxlength="15" readonly></td>
						</tr>
						<? $hoy=date("Y-m-d"); ?>
	   	
					 <input NAME="variable0" type="hidden"  id="variable0" value="<? echo $nro_fac?>" readonly >            							
					</table>										
			  </div>      
			  </form>
			  <br>        
			   <div id="frmBusqueda">
				<form id="formulario_lineas" name="formulario_lineas" method="post" action="frame_lineas.php" target="frame_lineas">
				  <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
          					<td>Fecha</td>
					<td><input id="variable5" type="text" class="cajaPequena" NAME="variable5" maxlength="10" readonly><img src="../img/calendario.png" name="Image2" id="Image2" width="16" height="16" border="0"  onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "variable5",
					ifFormat   : "%Y-%m-%d",
					button     : "Image2"
					  }
					);
		</script></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>
				  <tr>
					<td width="17%">Codigo</td>
					<td colspan="9"><input NAME="variable6" type="text" class="cajaMedia" id="variable6" size="15" maxlength="15" onChange="validarproducto()"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar Producto"></td>
				  <tr>
					<td>Descripcion</td>
					<td width="44%"><input NAME="variable7" type="text" class="cajaGrande" id="variable7" size="30" maxlength="30" readonly></td>
				  <tr>
					<td width="17%">Costo</td>
					<td width="44%"><input NAME="variable8" type="text" class="cajaTotales" id="variable8" size="10" maxlength="10"></td>
         	<tr>
					<td width="17%">Cantidad</td>
					<td width="44%"><input NAME="variable9" type="text" class="cajaPequena2" id="variable9" size="10" maxlength="10" onChange="guardar()"></td>			
					<td width="17%">Total</td>
					<td width="14%"><input NAME="variable10" type="text" class="cajaTotales" id="variable10" size="10" maxlength="10" readonly></td>
					<tr>
					<td width="17%">&nbsp;</td>
					<td width="44%"><div align="center"><img src="../img/botonagregar.jpg" width="72" height="22" border="1" onMouseOver="style.cursor=cursor" onClick="guardar()" title="Agregar"> <img src="../img/botonlimpiar.jpg" width="72" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor" title="Limpiar">  <img src="../img/botoncerrar.jpg" width="72" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor" title="Cerrar"> <img src="fotos/caja.jpg" width="100" height="73" border="1" onClick="cerrar_caja()" onMouseOver="style.cursor=cursor" title="Cerrar"></div></td>
				  <td width="17%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
				   </tr>
				</table>
				</div>        
        <input NAME="cli_cod" id="cli_cod" type="hidden">
        <input NAME="estado" id="estado" type="hidden">  
        <input NAME="pro_cod" id="pro_cod" type="hidden">
        <input NAME="fac_num" id="fac_num" type="hidden">
        <input NAME="fac_cod" id="fac_cod" type="hidden" value="<? echo $nro_fac?>"> 
				<br>
        </form>
				<div id="frmBusqueda">
				<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="1%">ITEM</td>
							<td width="3%">CODIG</td>
							<td width="4%">DESCRIPCION</td>
							<td width="5%">FAM</td>
							<td width="2%">CANT</td>
							<td width="2%">UNIT</td>
							<td width="2%">TOTAL</td>
              <td width="2%">ACT</td>						
              <td width="2%">ELIM</td>
						</tr>
				</table>
				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_lineas" name="frame_lineas" frameborder="0">
						<ilayer width="100%" height="250" id="frame_lineas" name="frame_lineas">						
						<div align="right"></div>
						</ilayer>
					</iframe>
				</div>					
			  </div>
			  <div id="frmBusqueda">
			<table width="25%" border=0 align="right" cellpadding=3 cellspacing=0 class="fuente8">
		  </table>
			  </form>
			 </div>
		  </div>
		</div>
    </body>

