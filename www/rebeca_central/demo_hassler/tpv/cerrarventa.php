<?
@session_start();
$sistema=$_SESSION["sistema"];
include("../conectar.php");
include("../fecha_hora.php");


$nro_fac=$_GET["nro_fac"];




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<title>Terminal Punto de Venta .'. v.01</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="img/logo.png">
<link rel="stylesheet" href="mm_travel2.css" type="text/css" />
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
<style type="text/css">
<!--
body,td,th {
	color: #FF0000;
}
-->
</style></head>
<body bgcolor="#C0DFFD">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#3366CC">
    <td colspan="3" rowspan="2"><img src="mm_travel_photo.jpg" alt="Header image" width="174" height="89" border="0" /></td>
    <td height="63" colspan="3" id="logo" valign="bottom" align="center" nowrap="nowrap">AUTOSERVICE SAN MIGUEL </td>
    <td width="207">&nbsp;</td>
  </tr>

  <tr bgcolor="#3366CC">
    <td height="64" colspan="3" id="tagline" valign="top" align="center">TERMINAL PUNTO DE VENTA </td>
	<td width="207">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="7" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

  <tr bgcolor="#CCFF99">
  	<td colspan="7" id="dateformat" height="25">&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script> ------------------------------ .'. AUTOSERVICE SAN MIGUEL .'. ------------------------------------</td>
  </tr>
 <tr>
    <td colspan="7" bgcolor="#003366"><img src="mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>

 <tr>
    <td width="165" valign="top" bgcolor="#E6F3FF">
	
   <form id="form2" name="form2" >
          			<iframe name="frame_lineas" width="100%" height="300" frameborder="0" class="pageName" id="frame_lineas">
    <ilayer width="100%" height="300" id="frame_lineas" name="frame_lineas">    </ilayer>
 	</iframe>  
  <table border="0" cellspacing="0" cellpadding="0" width="199" id="navigation">
        <tr>
          <td width="199">&nbsp;
            <p><br />
              </p>
            <p>&nbsp;</p>
            <p><strong>&nbsp;Item - Prod. - Cant. - Total</strong> <br />
              </p></td>
        </tr>
       
	  

         

       
       
        
       
  

      </table>
      </form>
 	 
 
 	</a><br />
  	&nbsp;<br />
  	&nbsp;<br />
  	&nbsp;<br /> 	</td>
    <td width="50"><img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
    <td colspan="2" valign="top"><img src="mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />
	&nbsp;<br />
	&nbsp;<br />
	<table border="0" cellspacing="0" cellpadding="0" width="305">
        <tr>
          <td class="pageName"></head>
          
 	<script language="javascript">         
   
   function ventanaArticulos(){
   
        var nro_fac="<? echo $nro_fac?>";

       var codigo=document.getElementById("referencia").value;
       var cantidad=document.getElementById("cantidad").value;
       
       if (cantidad==""){
       cantidad=1;
       }
   
        miPopup = window.open("ver_pro.php?nro_fac="+nro_fac+"&cantidad="+cantidad,"miwin","width=700,height=450,scrollbars=yes");
	      miPopup.focus(); 
   }
   
  function validarproducto(){
      var nro_fac="<? echo $nro_fac?>";

       var codigo=document.getElementById("referencia").value;
       var cantidad=document.getElementById("cantidad").value;
       
       if (cantidad==""){
       cantidad=1;
       }
			miPopup = window.open("comprobarproducto.php?codigopro="+codigo+"&cantidad="+cantidad+"&nro_fac="+nro_fac, "frame_lineas","miwin","width=700,height=80,scrollbars=yes");
		
		}	
   
   function eliminar(codigo){
   
     if (confirm(" Desea eliminar esta linea ? ")){
			miPopup = window.open("eliminarproducto.php?linea="+codigo, "frame_lineas","miwin","width=700,height=80,scrollbars=yes");
		 }
      }
     
   function actualizar(){
                                                            
      document.getElementById("formulario_lineas").submit();
    //document.getElementById("formulario_lineas").submit();
       alert("Va a Actualizar Ticket!"); 
		}
    
    function cerrarsistema(){
                                                            
   if (confirm(" Desea Salir del Sistema? ")){
    location.href="../index.php?var=<?echo $sistema?>";
   }   
   }
   
  function cierreventa(){

      var importe=document.getElementById("cantidad").value;
      if (importe==""){               
      alert("No se ha introducido el importe!");
      }else{
      location.href="index.php";
      }

  }
    function calculo(){
    

    
       var total=parseInt(document.getElementById("total").value);
       var importe=parseInt(document.getElementById("cantidad").value);
       
       var general=importe-total;
       
      alert("Su Vuelto es de : "+ general);
       
    } 	        
  
  </script>       
          
<body onLoad="javascript:document.getElementById('formulario_lineas').submit()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">
				  <p>CIERRE DE VENTA Ticket N&deg;</p>
				  <label>
				  <input name="textfield" type="text" class="subHeader" value="<? echo $nro_fac?>" />
				  </label>
			  </div>

				<form id="formulario_lineas" name="formulario_lineas" method="post" action="frame_lineas_cierre.php?nro_fac=<? echo $nro_fac?>" target="frame_lineas">

				  <table class="fuente8" width="51%" cellspacing=0 cellpadding=3 border=0>
				  <tr>
					
					
					<td width="15%">Ruc</td>
					<td colspan="10"><input NAME="referencia" type="text" class="pageName"  id="referencia" onChange="validarproducto()" value="000000-0" size="30" maxlength="30"> 
					<img src="img/ver.png" width="16" height="16" onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor" title="Buscar"> <img src="img/convertir.png" width="16" height="16" onClick="actualizar()" onMouseOver="style.cursor=cursor" title="Actualizar"></td>
				  <tr>
					<td>Cliente</td>
					<td width="85%"><input NAME="descripcion" type="text" class="pageName" id="descripcion" size="50" maxlength="50"  value="SIN NOMBRE"></td>
				  <tr>

				
				  <tr>
					
					
					<td width="15%">Importe</td>
					<td width="85%"><input NAME="cantidad" type="text" class="pageName" id="cantidad" onChange="calculo()" size="30" maxlength="30" >
				    <label></label></td>
				    <tr>
					<td width="15%">Total</td>
					<td width="85%"><label>
					<textarea name="total" cols="20" rows="5" readonly class="pageName1" id="total">0</textarea>
					</label></td>
             <tr>
					
          <input NAME="codipro" type="hidden" id="codigopro" size="10" maxlength="10"  >
				  </tr>
				</table>
				</div>
				
				<label></label>
				<br>
				<div id="frmBusqueda">
			<table width="25%" border=0 align="right" cellpadding=3 cellspacing=0 class="fuente8">
			  <tr>
		</table>

			  </div>
				<div id="botonBusqueda">					
				  <div align="center">
				
				    <input id="codfamilia" name="codfamilia" type="hidden">
				    <input id="codfacturatmp" name="codfacturatmp" type="hidden">	
					<input id="preciototal2" name="preciototal"  type="hidden">			    
			      </div>
				</div>

			  </form>
		  </div>
		  </div>
		</div>
    </body>
</html>
</td>
		</tr>

		<tr>
          <td class="bodyText"><p></p>

		<p></p></td>
        </tr>
      </table>
     <br />	  </td>
    <td width="51"><img src="mm_spacer.gif" alt="" width="50" height="1" border="0" /></td>
        <td width="196" valign="top"><br />
		&nbsp;<br />
		<table border="0" cellspacing="0" cellpadding="0" width="190">
			<tr>
			<td colspan="3" class="subHeader" align="center">NUEVO TICKET</td>
			</tr>
				
			<tr>
			<td width="40"><img src="mm_spacer.gif" alt="" width="40" height="1" border="0" /></td>
			<td width="110" id="sidebar" class="smallText"><br />
			<p><img src="img/agregar.png" alt="Image 1" width="110" height="110" onclick="javascript:cierreventa();" vspace="6" border="0" /><br />
			<br />
			<a href="javascript:cerrarsistema();">Cerrar Sistema &gt;</a></p>

	
			 <br />
			&nbsp;<br />
			&nbsp;<br />			</td>
			<td width="40">&nbsp;</td>
			</tr>
	</table>	</td>
	<td width="207">&nbsp;</td>
  </tr>
  <tr>
    <td width="165">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="4">&nbsp;</td>
    <td width="305">&nbsp;</td>
    <td width="51">&nbsp;</td>
    <td width="196">&nbsp;</td>
	<td width="207">&nbsp;</td>
  </tr>
</table>
</body>
</html>
