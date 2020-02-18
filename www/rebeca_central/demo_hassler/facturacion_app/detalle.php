<?php 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];

$form=$_SESSION["form"]; 
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
$nro_mesa=$_GET['nromesa'];


$apertura=2 ;
$aps_cod=0 ;
$ncaja=$nro_mesa;


include ("../fecha_hora.php"); 
include ("../conectar.php"); 
include ("../permisos.php"); 


if ($nro_mesa==$ncaja){

$sel="select * from mesas where mes_cod=$ncaja";
$rs=mysql_query($sel);
    
    $nro_fac=mysql_result($rs,0,"mes_fac");
    $mes_est=1;
    $mes_des=mysql_result($rs,0,"mes_des");
    $nro_mesa=$ncaja;
    $par=0;     

}else{

    $nro_fac=mysql_result($rs,0,"mes_fac");
    $mes_est=1;
    $mes_des=mysql_result($rs,0,"mes_des");
    $nro_mesa=$ncaja;
    $par=0;     
}



//***********************************************************************/
$query_del="delete from tmp where nro_fac='$nro_fac'";					
$rs_del=mysql_query($query_del);




if ($mes_est==0){
$query1="SELECT max(fac_cod) as maximo FROM factura_cab";
$rs_query1=mysql_query($query1);
$nro_fac=mysql_result($rs_query1,0,"maximo")+1;

    $sel="select cli_cod from clientes where borrado='0' and cli_par='1'";
    $rs=mysql_query($sel);
    $cli_cod=mysql_result($rs,0,"cli_cod");
  
    $sel="INSERT INTO factura_cab (fac_cod,ape_cod,cli_cod,aps_cod,mes_cod,fecha,hora,usuario,borrado) 
    VALUES ('$nro_fac','$apertura','$cli_cod','$aps_cod',$nro_mesa,'$fecha','$hora','$usuario','0')";
    $rs=mysql_query($sel);                

    $sel="update mesas set mes_fac='$nro_fac',mes_est='1' where mes_cod='$nro_mesa'";
    $rs=mysql_query($sel);	

  }

if ($mes_est==1) {

   if ($par==1){
    $query_operacion1="update mesas set mes_est='2' where mes_cod='$nro_mesa'";					
    $rs_operacion1=mysql_query($query_operacion1);
    header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
   
   }

}



?>

<html>
	<head>
	<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../js/shortcut.js"></script>  
    		
	
	<script language="javascript">
     
      
		function validarcliente(){
      var miPopup;
      var fac_cod=document.getElementById("variable0").value;
      var cli_cod=document.getElementById("variable1").value;      
			miPopup = window.open("comprobarcliente.php?variable1="+cli_cod+"&variable2="+fac_cod,"frame_lineas","width=700,height=80,scrollbars=yes");
		 }
		
		function abreVentana(){
		  var miPopup;
      var fac_cod=document.getElementById("variable0").value;
			miPopup = window.open("ver_cliente.php?fac_cod="+fac_cod,"miwin","width=700,height=500,scrollbars=no");
			miPopup.focus();			
		}

		function validarproducto(){
			var nro_fac=document.getElementById("variable0").value;
			var codigo=document.getElementById("variable6").value;      
		  miPopup = window.open("comprobarproducto.php?codigopro="+codigo+"&nro_fac="+nro_fac,"frame_lineas","miwin","width=700,height=80,scrollbars=yes");

		}	    

function guardar()
        
			{
				var mensaje="";

        if (document.getElementById("variable6").value=="") mensaje+="  - Codigo\n";
        if (document.getElementById("variable9").value=="") mensaje+="  - Cantidad\n";
        
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
      var codigo=document.getElementById("variable0").value;
      miPopup = window.open("comprobarfactura.php?codfactura="+codigo,"frame_lineas","width=700,height=80,scrollbars=yes");
		  document.getElementById("variable1").focus();
    }
    
		function ventanaArticulos(){
			var codigo=document.getElementById("variable1").value;	
			if (codigo=="") {
				alert ("Debe introducir el codigo del Cliente");
			} else {
				miPopup = window.open("ver_pro.php","miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
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
        if (document.getElementById("variable10").value=="0") mensaje+="  - El pedido no puede estar vacio\n";				
				if (mensaje!="") {
					alert("Atencion, se han detectado las siguientes incorrecciones:\n\n"+mensaje);
				} else {					

							document.getElementById("formulario").submit();							
				}	
			}	
		
    function cancelar() {
      var nro_mesa="<?echo $nro_mesa;?>";
      var ncaja="<? echo $ncaja?>";
      
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";      
            
      if (nro_mesa==ncaja){
          //location.href="../central.php";          
          location.href="../reporte_app/index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;          
      }else{
			    var variable1="<?echo $form?>";
          var variable2="<?echo $mec_cod?>";
          var variable3="<?echo $descripcion?>";
          location.href="../reporte_app/index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;
      }
		}
    
    function foco_gusto() { 
     document.getElementById("gusto2").focus();
    }       



function limpiar() {
   
  document.formulario_lineas.variable6.value="";
	document.formulario_lineas.variable7.value="";	
  document.formulario_lineas.variable8.value="";
	document.formulario_lineas.variable9.value="";	
  document.formulario_lineas.variable6.focus();
  
}


function init()
{
inicio();
shortcut("f3",function()
{
cerrar_caja();

});

shortcut("f2",function()
{
guardar();
document.getElementById("variable6").focus();
});

shortcut("f1",function()
{
imprimir('<? echo $nro_mesa?>','<? echo $nro_fac?>')
});

shortcut("f4",function()
{
cancelar();
});

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

<body onLoad="init()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">FACTURACION</div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_factura.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>						
						<tr>
							<td width="1%">TICKET Nro. </td>					
					      <td colspan="3"><input NAME="variable0" type="text" class="cajaTotales" id="variable0" size="10" maxlength="5" value="<? echo $nro_fac?>" readonly>
					        <span class="Estilo1"><? echo "$mes_des"; ?> </span></td>					
						<tr>
							<td width="15%">Cod. Cliente </td>							
					      <td colspan="3"><input NAME="variable1" type="text" class="cajaPequena" id="variable1" size="6" maxlength="5" onChange="validarcliente()">
					        <img src="../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar Cliente" onMouseOver="style.cursor=cursor"></td>					
						</tr>
						<tr>
							<td width="6%">Nombre</td>
						    <td width="27%"><input NAME="variable2" type="text" class="cajaGrande" id="variable2" size="45" maxlength="45" readonly></td>
				        <td width="3%">RUC</td>
				        <td width="64%"><input NAME="variable3" type="text" class="cajaMedia" id="variable3" size="20" maxlength="15" readonly></td>
						</tr>
						<? $hoy=date("Y-m-d"); ?>
						<tr>							
							<td width="6%">Tipo Cliente</td>              
						  <td width="27%"><input NAME="variable4" type="text" class="cajaMedia" id="variable4" size="100" maxlength="100" readonly></td>               
            <td>Fecha</td>
						  <td><input id="variable5" type="text" class="cajaPequena" NAME="variable5" maxlength="10" value="<?echo $hoy ?>" readonly>
              </td>
						  <td>&nbsp;</td>
					  </tr>              							
					</table>										
			  </div>
        <input NAME="mesa" id="mesa" type="hidden" value="<? echo $nro_mesa?>">
			  </form>
			  <br>
        
			   <div id="frmBusqueda">
				<form id="formulario_lineas" name="formulario_lineas" method="post" action="frame_lineas.php" target="frame_lineas">
				  <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
				  <tr>
					<td width="17%">Codigo</td>
					<td colspan="9"><input NAME="variable6" type="text" class="cajaMedia" id="variable6" size="15" maxlength="15" onChange="validarproducto()"> <img src="../img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar Producto"></td>
				  <tr>
					<td>Descripcion</td>
					<td width="44%"><input NAME="variable7" type="text" class="cajaGrande" id="variable7" size="30" maxlength="30" readonly></td>
				  <tr>
					<td width="17%">Precio</td>
					<td width="44%"><input NAME="variable8" type="text" class="cajaTotales" id="variable8" size="10" maxlength="10"></td>
         	<tr>
					<td width="17%">Cantidad</td>
					<td width="44%"><input NAME="variable9" type="text" class="cajaPequena2" id="variable9" size="10" maxlength="10" onChange="guardar()"></td>
          <tr>  
				  <td width="17%">Total</td>
				  <td width="10%"><b><input name="variable10" class="cajaTotales" type="text"  id="variable10" size="10" maxlength="10" readonly></b></td>
          <tr>
				  <td width="17%"><p>&nbsp;</p></td>
				  <td width="44%"><div align="center"><img src="../img/botonagregar.jpg" width="72" height="22" border="1" onMouseOver="style.cursor=cursor" onClick="guardar()" title="Agregar"> <img src="../img/botonlimpiar.jpg" width="72" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor" title="Limpiar"> <img src="../img/botoncerrar.jpg" width="72" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor" title="Cerrar"> <img src="fotos/caja.jpg" width="100" height="73" border="1" onClick="cerrar_caja()" onMouseOver="style.cursor=cursor" title="Cerrar"></div></td>
				  <td width="17%"><p><strong></strong></p>
				    <p><strong>Agregar producto (F2)</strong></p>
                  <p><strong>Cerrar venta (F3)</strong></p>
                  <p><strong>Salir (F4)</strong></p>
                  </td>
          <td width="14%">&nbsp;</td>
			      </tr>
				</table>
				</div>        
        <input NAME="cli_cod" id="cli_cod" type="hidden">
        <input NAME="pro_cod" id="pro_cod" type="hidden">
        <input NAME="pro_cos" id="pro_cos" type="hidden">
        <input NAME="fac_cod" id="fac_cod" type="hidden" value="<? echo $nro_fac?>">
				<input NAME="ape_cod" id="ape_cod" type="hidden" value="<? echo $apertura?>">
				<input NAME="aps_cod" id="aps_cod" type="hidden" value="<? echo $aps_cod?>">
        <input NAME="mes_cod" id="mes_cod" type="hidden" value="<? echo $nro_mesa?>">
				<br>
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
                      <?php  
				  if (@$eli=='0'){
				  ?>
              <td width="2%">ELIM</td>
              
        <?php
				  }
				?>
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

