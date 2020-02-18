<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];

$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
$variable3=$_POST["variable3"];
$variable4=$_POST["variable4"];
$variable5=$_POST["fecha_inicio"];
$variable6=$_POST["fecha_fin"];
$variable7=$_POST["variable5"];
include ("../conectar.php");
include ("../permisos.php");

$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($variable1 <> "") { $where.=" AND prv_cod='$variable1'"; }
if ($variable2 <> "") { $where.=" AND prv_des like '%$variable2%'"; }
if ($variable3 <> "") { $where.=" AND prv_ruc like '%$variable3%'"; }
if ($variable4 <> "") { $where.=" AND for_cod='$variable4'"; }
if ($variable5 <> "") { $where.=" AND fecha >='$variable5'"; }
if ($variable6 <> "") { $where.=" AND fecha <='$variable6'"; }
if ($variable7 <> "") { $where.=" AND ape_cod='$variable7'"; }

$where.=" ORDER BY fecha asc";
$query_busqueda="SELECT count(*) as filas FROM compra_cab_view WHERE borrado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

if ($_POST["iniciopagina"]==0){

}

?>
<html>
	<head>
		<title>Usuarios</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
var miPopup
function imprimir(variable1,variable2,variable3) {
			miPopup = window.open("impresiones_det.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3,"miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}

		function inicio() {
			var numfilas=document.getElementById("numfilas").value;
			var indi=parent.document.getElementById("iniciopagina").value;
			var contador=1;
			var indice=0;
			if (indi>numfilas) { 
				indi=1; 
			}
			parent.document.form_busqueda.filas.value=numfilas;
			parent.document.form_busqueda.paginas.innerHTML="";		
			while (contador<=numfilas) {
				texto=contador + "-" + parseInt(contador+9);
				if (indi==contador) {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
					parent.document.form_busqueda.paginas.options[indice].selected=true;
				} else {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
				}
				indice++;
				contador=contador+10;
			}
		}
    
	function modificar(variable1) {
			parent.location.href="modificar.php?variable1=" + variable1;
		}
		
		function eliminar(variable1) {
			parent.location.href="eliminar.php?variable1=" + variable1;
		}
		</script>
	</head>

	<body onload=inicio() oncontextmenu="return false">	
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
			<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0 ID="Table1" align="center">
			<input type="hidden" name="numfilas" id="numfilas" value="<?php echo $filas; ?>">
				<?php $iniciopagina=$_POST["iniciopagina"];
				if (empty($iniciopagina)) { $iniciopagina=0; } else { $iniciopagina=$iniciopagina-1;}
				if (empty($iniciopagina)) { $iniciopagina=0; }
				if ($iniciopagina>$filas) { $iniciopagina=0; }
					if ($filas > 0) { ?>
						<?php $sel_resultado="SELECT *, REPLACE(FORMAT(fac_tot-fac_imp,0),',','.') AS total_gral, 
(SELECT SUM(impuesto) AS total 
FROM compra_det_view WHERE fac_cod=compra_cab_view.fac_cod AND iva=10
GROUP BY fac_cod) AS iva_10,

REPLACE(FORMAT((SELECT SUM(impuesto) AS total 
FROM compra_det_view WHERE fac_cod=compra_cab_view.fac_cod AND iva=10
GROUP BY fac_cod),0),',','.') AS iva_10_formato,

(SELECT SUM(impuesto) AS total 
FROM compra_det_view WHERE fac_cod=compra_cab_view.fac_cod AND iva=5
GROUP BY fac_cod) AS iva_5,
REPLACE(FORMAT((SELECT SUM(impuesto) AS total 
FROM compra_det_view WHERE fac_cod=compra_cab_view.fac_cod AND iva=5
GROUP BY fac_cod),0),',','.') AS iva_5_formato,

(SELECT SUM(impuesto) AS total 
FROM compra_det_view WHERE fac_cod=compra_cab_view.fac_cod AND iva=0
GROUP BY fac_cod) AS excento,

REPLACE(FORMAT((SELECT SUM(impuesto) AS total 
FROM compra_det_view WHERE fac_cod=compra_cab_view.fac_cod AND iva=0
GROUP BY fac_cod),0),',','.') AS excento_formato,

(SELECT SUM(impuesto) AS total 
FROM compra_det_view WHERE fac_cod=compra_cab_view.fac_cod
GROUP BY fac_cod) AS total_iva,

REPLACE(FORMAT((SELECT SUM(impuesto) AS total 
FROM compra_det_view WHERE fac_cod=compra_cab_view.fac_cod
GROUP BY fac_cod),0),',','.') AS total_iva_formato,


            (CASE ape_cod WHEN 0 THEN 'Compras' WHEN 1 THEN 'Bonificaciones'  WHEN 2 THEN 'Devoluciones' WHEN 3 THEN 'Descuentos'  END)AS tipo_doc
            from compra_cab_view where borrado='0' and fac_est='1' and ".$where;
						   include("sql.php");
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;						   
						   
						while ($contador < mysql_num_rows($res_resultado)) {
							if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						  <tr class="<?php echo $fondolinea;?>">						
							<td class="aCentro" width="8%"><?php echo $contador+1;?></td>
							<td width="12%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"fac_cod");?></div></td>
              <td width="12%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"fac_num");?></div></td>
							<td width="25%"><div align="left"><?php echo strtoupper(mysql_result($res_resultado,$contador,"prv_des"));?></div></td>
						  
              	
							<?php  
							if (@$mod=='0'){
							?>
							<td width="5%"><div align="center"><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"fac_cod")?>)"><img src="../img/modificar.png" width="16" height="16" border="0"  title="Modificar"></a></div></td>
							<?php
							}
							?>
							<td width="5%"><div align="center"><a href="javascript:imprimir('<?php echo mysql_result($res_resultado,$contador,"fac_cod")?>','<?php echo mysql_result($res_resultado,$contador,"prv_des")?>','<?php echo mysql_result($res_resultado,$contador,"fac_num")?>')"><img src="../img/imprimir.png" width="16" height="16" border="0"  title="Imprimir"></a></div></td>
							<?php  
							if (@$eli=='0'){
							?>							
							<td width="6%"><div align="center"><a href="javascript:eliminar(<?php echo mysql_result($res_resultado,$contador,"fac_cod")?>)"><img src="../img/eliminar.png" width="16" height="16" border="0"  title="Eliminar"></a></div></td>						
							<?php
							}
							?>
              
              
              
              
							</tr>
						<?php $contador++;
							}
						?>			
			  </table>
          <table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="87%" class="mensaje"><?php echo "RESULTADOS OBTENIDOS";?></td>
					    </tr>
					</table>            
					<?php } else { ?>
					<table class="fuente8" width="87%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="100%" class="mensaje"><?php echo "No hay ning&uacute;n tipo que cumpla con los criterios de b&uacute;squeda";?></td>
					    </tr>
					</table>					
					<?php } ?>					
			  </div>
		  </div>
    </div>			
		</div>
	</body>
</html>
