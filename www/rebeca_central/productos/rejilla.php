<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];

$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
$variable3=$_POST["variable3"];
$variable4=$_POST["variable4"];

include ("../conectar.php");
include ("../permisos.php");

$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($variable1 <> "") { $where.=" AND pro_bar='$variable1'"; }
if ($variable2 <> "") { $where.=" AND pro_des like '%".$variable2."%'"; }
if ($variable3 <> "") { $where.=" AND par_cod='$variable3'"; }
if ($variable4 <> "") { $where.=" AND fam_cod='$variable4'"; }


$where.=" ORDER BY pro_des ASC";
$query_busqueda="SELECT count(*) as filas FROM productos_view WHERE borrado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

if ($_POST["iniciopagina"]==0){

}
else
{



}

?>
<html>
	<head>
		<title>Usuarios</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		function ver(variable1) {
			parent.location.href="ver.php?variable1=" + variable1 + "&cadena_busqueda=<?php echo $cadena_busqueda;?>";
		}
		
		function modificar(variable1) {
			parent.location.href="modificar.php?variable1=" + variable1 + "&cadena_busqueda=<?php echo $cadena_busqueda;?>";
		}
		
		function eliminar(variable1) {
			parent.location.href="eliminar.php?variable1=" + variable1+ "&cadena_busqueda=<?php echo $cadena_busqueda;?>";
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
    
    function agregar_composicion(variable1,variable2,variable3,variable4) {
    
		  if (variable4==2){
    	    parent.location.href="agregar/index.php?variable1=" + variable1+ "&probar="+variable2+"&prodes="+variable3;
		  }else{
      alert("Producto no contiene composicion, favor verificar!");
      
      }
    }
    function agregar_precios(variable1,variable2,variable3,variable4) {
    		  
    	 parent.location.href="precios/index.php?variable1=" + variable1+ "&probar="+variable2+"&prodes="+variable3;		  
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
						<?php $sel_resultado="SELECT * from productos_view where borrado='0' and ".$where;
						   include("sql.php");
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;						   
						   
						   while ($contador < mysql_num_rows($res_resultado)) {
								 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea;?>">
						
						
							<td class="aCentro" width="6%"><?php echo $contador+1;?></td>
							<td width="10%"><div align="center"><?php echo mysql_result($res_resultado,$contador,"pro_bar");?></div></td>
							<td width="39%"><div align="left"><?php echo strtoupper(mysql_result($res_resultado,$contador,"pro_des"));?></div></td>
              <td width="5%"><div align="left"><?php echo number_format(mysql_result($res_resultado,$contador,"pro_ven"), 0, ",", ".");?></div></td>
						
							<?php  
							if (@$mod=='0'){
							?>
              <td width="11%"><div align="center"><a href="javascript:agregar_precios('<?php echo mysql_result($res_resultado,$contador,"pro_cod")?>','<?php echo mysql_result($res_resultado,$contador,"pro_bar")?>','<?php echo mysql_result($res_resultado,$contador,"pro_des")?>','<?php echo mysql_result($res_resultado,$contador,"par_cod")?>')"><img src="../img/precios.jpg" width="16" height="16" border="0" title="Precios"></a></div></td>
              <td width="8%"><div align="center"><a href="javascript:agregar_composicion('<?php echo mysql_result($res_resultado,$contador,"pro_cod")?>','<?php echo mysql_result($res_resultado,$contador,"pro_bar")?>','<?php echo mysql_result($res_resultado,$contador,"pro_des")?>','<?php echo mysql_result($res_resultado,$contador,"par_cod")?>')"><img src="../img/convertir.png" width="16" height="16" border="0" title="Modificar"></a></div></td>
							<td width="10%"><div align="center"><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"pro_cod")?>)"><img src="../img/modificar.png" width="16" height="16" border="0"  title="Modificar"></a></div></td>
							<?php
							}
							?>
							<td width="6%"><div align="center"><a href="javascript:ver(<?php echo mysql_result($res_resultado,$contador,"pro_cod")?>)"><img src="../img/ver.png" width="16" height="16" border="0"  title="Visualizar"></a></div></td>
							<?php  
							if (@$eli=='0'){
							?>							
							<td width="10%"><div align="center"><a href="javascript:eliminar(<?php echo mysql_result($res_resultado,$contador,"pro_cod")?>)"><img src="../img/eliminar.png" width="16" height="16" border="0"  title="Eliminar"></a></div></td>						
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
