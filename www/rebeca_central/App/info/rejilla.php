<?php
session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$campo=$_SESSION["campo"];
$tabla=$_SESSION["tabla"];

$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];

include ("../conexion/conectar.php");
include ("../permisos.php");

$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($variable1 <> "") { $where.=" AND ".$campo."_cod='$variable1'"; }
if ($variable2 <> "") { $where.=" AND ".$campo."_des like '%".$variable2."%'"; }



$where.=" ORDER BY ".$campo."_cod ASC";
$query_busqueda="SELECT count(*) as filas FROM ".$tabla." WHERE borrado=0 AND ".$where;
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
<link rel="stylesheet" href="../files/formoid-default-skyblue.css" type="text/css" />
<script type="text/javascript" src="../files/formoid-default-skyblue.js"></script>
<script type="text/javascript" src="../files/jquery.min.js"></script>
<body bgcolor="white">
		<script language="javascript">
		
		function ver(variable1) {
			parent.location.href="ver.php?variable1=" + variable1 + "&cadena_busqueda=<?php echo $cadena_busqueda;?>";
		}
		
		function modificar(variable1) {
			parent.location.href="modificar.php?variable1=" + variable1 +"&par=modificar";
		}
		
		function eliminar(variable1) {
			parent.location.href="guardar.php?variable1=" + variable1 +"&accion=baja" ;
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
		</script>
	</head>

	<body onload=inicio() oncontextmenu="return false">	
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
      <table width="87%" cellspacing=0 cellpadding=3 border=0 ID="Table1" align="center" class="formoid-default-skyblue" style="background-color:#ffffff;font-size:10px;font-family:Arial,Helvetica,sans-serif;color:#3c79b5;max-width:650px;min-width:150px">
			<input type="hidden" name="numfilas" id="numfilas" value="<?php echo $filas; ?>">
				<?php $iniciopagina=$_POST["iniciopagina"];
				if (empty($iniciopagina)) { $iniciopagina=0; } else { $iniciopagina=$iniciopagina-1;}
				if (empty($iniciopagina)) { $iniciopagina=0; }
				if ($iniciopagina>$filas) { $iniciopagina=0; }
					if ($filas > 0) { ?>
						<?php $sel_resultado="SELECT * from ".$tabla." where borrado='0' and ".$where;
						   include("sql.php");
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",10";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;						   
						   
						   while ($contador < mysql_num_rows($res_resultado)) {
							 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						   
               <tr class="<?php echo $fondolinea;?>">						
							 <td class="aCentro" width="8%"><?php echo mysql_result($res_resultado,$contador,$campo."_cod") ?></td>                               
               <td width="66%"><div align="center"><?php echo strtoupper(mysql_result($res_resultado,$contador,$campo."_des"));?></div></td>						

						
							<?php  
							if (@$mod=='0'){
							?>
							<td width="13%"><div align="center"><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,$campo."_cod")?>)"><img src="../images/bulb.png" width="16" height="16" border="0"  title="Modificar"></a></div></td>
							<?php
							}							  
							if (@$eli=='0'){
							?>							
							<td width="13%"><div align="center"><a href="javascript:eliminar(<?php echo mysql_result($res_resultado,$contador,$campo."_cod")?>)"><img src="../images/eliminar.jpg" width="16" height="16" border="0"  title="Eliminar"></a></div></td>						
							<?php
							}
							?>
						
						</tr>
						<?php $contador++;
							}
						?>			
			  </table>
					<?php }?>
				
			  </div>
		  </div>
    </div>			
		</div>
	</body>
</html>

