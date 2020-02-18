<?php

@@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;


include ("../conectar.php"); 
include("../fecha_hora.php");


$fac_cod=$_POST["variable0"];
$cli_cod=$_POST["variable1"];
$mesa=$_POST["mesa"];

	$sel_maximo="SELECT * FROM factura_imp WHERE borrado='0' 
  AND fim_cod=(SELECT MAX(fim_cod) FROM factura_imp WHERE borrado='0')";
	$rs_maximo=mysql_query($sel_maximo);
	$var1=mysql_result($rs_maximo,0,"fim_ini");
  $var2=mysql_result($rs_maximo,0,"fim_fin");
  $var3=mysql_result($rs_maximo,0,"fim_num")+1;
  

$nrofactura = str_pad($var1, 3, "0", STR_PAD_LEFT)."-".str_pad($var2, 3, "0", STR_PAD_LEFT)."-".str_pad($var3, 7, "0", STR_PAD_LEFT);




?>

<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../js/formato.js"></script> 
    <script type="text/javascript" src="../js/shortcut.js"></script>   
		<script language="javascript">
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}

		function inicio(){
		  document.getElementById("variable5").focus();
    }		

    function cancelar() {
			var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;
		}
    
function aceptar() {
var mesa="<?echo $mesa?>";	
var variable1=document.getElementById("variable1").value;
var variable2=document.getElementById("variable2").value;
var variable3=document.getElementById("variable3").value;
var variable4=document.getElementById("variable4").value;
var variable5=document.getElementById("variable5").value;
var variable6=document.getElementById("variable6").value;
var fac_cod=document.getElementById("fac_cod").value;
var cli_cod=document.getElementById("cli_cod").value;
var factura=document.getElementById("factura").value;


        var mensaje="";
        if (document.getElementById("variable5").value=="") mensaje+="  - Importe\n";

				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
                
                     if (confirm(" Desea Imprimir factura? ")){ 
                                                    
                             var miPopup;
                             miPopup = window.open("reporte/impresiones_factura.php?nrofactura="+fac_cod+"&importe="+variable5+"&factura="+factura,"miwin","width=500,height=600,scrollbars=no");
                             miPopup.focus();

                            location.href="efectuarpago.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3+"&variable4="+variable4+"&variable5="+variable5+"&variable6="+variable6+"&variable7="+fac_cod+"&variable8="+cli_cod+"&mesa="+mesa+"&factura="+factura;                  
                      }else{
                             var miPopup;
                             miPopup = window.open("reporte/impresiones_ticket.php?nrofactura="+fac_cod+"&importe="+variable5,"miwin","width=500,height=600,scrollbars=no");
                             miPopup.focus();
                           // window.print("reporte/impresiones_ticket.php?nrofactura="+fac_cod+"&importe="+variable5,"miwin","width=500,height=600,scrollbars=no");
                            

                            location.href="efectuarpago.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3+"&variable4="+variable4+"&variable5="+variable5+"&variable6="+variable6+"&variable7="+fac_cod+"&variable8="+cli_cod+"&mesa="+mesa;                      
                      
                      }                        
                
          
              }
        }


function init()
{
inicio();
shortcut("f2",function()
{
aceptar();

});

shortcut("f4",function()
{
cancelar();

});



}	

    
				
		</script>
	    <style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
-->
        </style>
	</head>
<body onLoad="init()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
			
				<div id="frmBusqueda" >
				<form id="formulario" name="formulario" method="post" action="javascript:aceptar()">
          <table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						</td>
						<p>  <td width="85%" colspan="2" class="mensaje">CIERRE DE VENTA - (F2 Aceptar) / (F4 Salir)</td>   </p>
					    </tr>				          
					  <?php
					  	$query="SELECT * FROM medios_pago where borrado=0 ORDER BY mpg_cod ASC";
						  $res=mysql_query($query);
						  $contador=0;
					  	mysql_result($res,$contador,"mpg_cod");
					  	strtoupper(mysql_result($res,$contador,"mpg_des"));
					  ?>
				      <td width="15%">Medios Pago</td>
							<td width="43%"><select id="variable1" name="variable1" class="comboMedio" onChange="buscar()">

								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"mpg_cod"); ?>"><?php echo strtoupper(mysql_result($res,$contador,"mpg_des"));?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        </tr>
					   <?php
					       $query="SELECT * FROM formas_pago where borrado=0 ORDER BY for_cod ASC";
						     $res=mysql_query($query);
						     $contador=0;
					   ?>						
						
						<td width="15%">Formas Pago</td>
							<td width="43%"><select id="variable2" name="variable2" class="comboMedio" onChange="planespago()">

								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"for_cod"); ?>"><?php echo strtoupper(mysql_result($res,$contador,"for_des"));?></option>
								<?php $contador++;
								} ?>				
								</select>
                </td>
				        </tr>
						<tr>		


					   <?php
					  	$query="SELECT * FROM tipo_moneda where borrado=0 ORDER BY tmo_cod ASC";
						$res=mysql_query($query);
						$contador=0;

					  ?>						
						
						<td width="15%">Tipo Moneda</td>
							<td width="43%"><select id="variable3" name="variable3" class="comboMedio" onChange="validarmoneda()">

								<?php
								while ($contador < mysql_num_rows($res)) { ?>
								<option value="<?php echo mysql_result($res,$contador,"tmo_cod"); ?>"><?php echo strtoupper(mysql_result($res,$contador,"tmo_des"));?></option>
								<?php $contador++;
								} ?>				
								</select>							</td>
				        <tr>
		        <?php
			           $consulta3="select sum(pro_tot) as total from factura_det where fac_cod='$fac_cod' and borrado='0'";
			           $rs_tabla3 = mysql_query($consulta3);
			           $costotal=mysql_result($rs_tabla3,0,"total");
		        ?>
		
						        </tr>
						<tr>											

					<?php
					  $queryte="SELECT * FROM tipo_envio where borrado='0' and tie_cod <> 3 ORDER BY tie_cod ASC";
						$reste=mysql_query($queryte);
						$contadorte=0;

					  ?>						
						
						<td width="15%">Tipo Envio</td>
							<td width="43%"><select id="variable4" name="variable4" class="comboMedio">

								<?php
								while ($contadorte < mysql_num_rows($reste)) { ?>
								<option value="<?php echo mysql_result($reste,$contadorte,"tie_cod"); ?>"><?php echo strtoupper(mysql_result($reste,$contadorte,"tie_des"));?></option>
								<?php $contadorte++;
								} ?>				
								</select>							</td>
				        </tr>
							
						<td width="6%">Importe</td>
						    <td width="27%"><input NAME="variable5" onKeyUp="format(this)"  type="text" class="cajaMedia" id="variable5" size="45" maxlength="45" value="0"></td>
					<tr>
          	<td width="6%">Factura Nro.</td>
						<td width="27%"><input NAME="factura" onKeyUp="mascara(this,'-','3-3-7',true)"  type="text" class="cajaMedia" id="factura" size="45" maxlength="45" value="<?php echo $nrofactura?>"></td>    			
                
                
                    			
					<tr>		
						<td>Total a Pagar</td>
						  <td colspan="2" class="style1"><?php echo number_format($costotal, 0, ",", ".") ?> Gs.</td>
          </tr>
					  <input NAME="variable6" type="hidden" id="variable6" value="<? echo $costotal;?>">
          <tr>
						  <td>Nro Ticket</td>
						  <td colspan="2"><?php echo $fac_cod?></td>
					 <input NAME="fac_cod" type="hidden" id="fac_cod" value="<? echo $fac_cod;?>">
					 <input NAME="cli_cod" type="hidden" id="cli_cod" value="<? echo $cli_cod;?>">
          </tr>
					  <tr>
						  <td>Fecha</td>
						  <td colspan="2"><?php echo $fecha?></td>
						   <input NAME="fecha_factura" type="hidden" id="fecha_factura" value="<? echo $fecha;?>">
					  </tr>
					  <tr>
						  <td></td>
						  <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Importe de Acuerdo a las ltimas cotizaciones</td>
						   <input NAME="fecha_factura" type="hidden" id="fecha_factura" value="<? echo $fecha;?>">
					  </tr>           
           
           <table class="fuente8" width="30%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
					<?
            $sql = "SELECT * FROM tipo_moneda WHERE borrado='0' AND tmo_cod <> 1 ORDER BY tmo_des DESC"; 
            $query =mysql_query($sql);
          
            for ($i = 0; $i < mysql_num_rows($query); $i++) {
          ?>
          	  <tr>
						    <td><?echo mysql_result($query,$i,"tmo_des"); ?></td>                
                <td>                
                <?
                      $tmo_cod=mysql_result($query,$i,"tmo_cod");
                      $sql1 = "SELECT * FROM cotizaciones 
                      WHERE tmo_cod='$tmo_cod' AND borrado='0' 
                      AND cot_cod=(SELECT MAX(cot_cod) 
                      FROM cotizaciones WHERE tmo_cod='$tmo_cod' 
                      AND borrado='0')"; 
                      $query1=mysql_query($sql1);
                      $row=mysql_num_rows($query1);
                      
                      if ($row>0){
                        echo $cot_ven=number_format(mysql_result($query1,0,"cot_ven"), 0, ",", ".");
                      }else{
                        echo $cot_ven=0;
                      }
                      
                      ?>
                </td>                
                <td>
                
                <?
                     if ($row>0){
                          echo $coti=number_format(($costotal/$cot_ven), 0);
                     }else{
                          echo $coti=0;
                     }
                ?>
                </td>
					      
                </tr>
					      <?
                  } 
                ?>	  
          
          </table>
						
					
			
			  	  </form>
				<div id="botonBusqueda">
					<div align="center">
					  <img src="../img/botonaceptar.jpg" width="85" height="22" onClick="aceptar()" border="1" onMouseOver="style.cursor=cursor">					   
					   <img src="../img/botoncerrar.jpg" width="79" height="22" border="1" onClick="cancelar()" onMouseOver="style.cursor=cursor">
		          </div>
						<br>
						<div align="center" id="cajareg">					 
	       </div>
			  </div>
		</div>
	</body>
</html>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>