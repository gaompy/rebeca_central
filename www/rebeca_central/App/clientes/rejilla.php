<?php
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];

$variable1=$_POST["variable1"];
$variable2=$_POST["variable2"];
//$variable3=$_POST["variable3"];
include ("../conexion/conectar.php");
//include ("../permisos.php");

$cadena_busqueda=$_POST["cadena_busqueda"];

$where="1=1";
if ($variable1 <> "") { $where.=" AND codigoanterior='$variable1'"; }
if ($variable2 <> "") { $where.=" AND cli_des like '%".$variable2."%'"; }



$where.=" ORDER BY cli_des ASC";
$query_busqueda="SELECT count(*) as filas FROM clientes_view WHERE borrado=0 AND ".$where;
$rs_busqueda=mysql_query($query_busqueda);
$filas=mysql_result($rs_busqueda,0,"filas");

if ($_POST["iniciopagina"]==0){

}
else
{



}

?>

<style type="text/css">
a {color:black; text-decoration:none}
</style>

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
				texto=contador + "-" + parseInt(contador+29);
				if (indi==contador) {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
					parent.document.form_busqueda.paginas.options[indice].selected=true;
				} else {
					parent.document.form_busqueda.paginas.options[indice]=new Option (texto,contador);
				}
				indice++;
				contador=contador+30;
			}
		}
		</script>
	</head>

	<body onload=inicio() oncontextmenu="return false">	
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
      <table width="100%" cellspacing=0 cellpadding=7 border=0 ID="Table1" align="center" class="formoid-default-skyblue" style="background-color:#ffffff;font-size:16px;font-family:Arial,Helvetica,sans-serif;color:#3c79b5;max-width:650px;min-width:150px">
			<input type="hidden" name="numfilas" id="numfilas" value="<?php echo $filas; ?>">
				<?php $iniciopagina=$_POST["iniciopagina"];
				if (empty($iniciopagina)) { $iniciopagina=0; } else { $iniciopagina=$iniciopagina-1;}
				if (empty($iniciopagina)) { $iniciopagina=0; }
				if ($iniciopagina>$filas) { $iniciopagina=0; }
					if ($filas > 0) { ?>
						<?php $sel_resultado="SELECT * from clientes_view where borrado='0' and ".$where;
						   include("sql.php");
						   $sel_resultado=$sel_resultado."  limit ".$iniciopagina.",30";
						   $res_resultado=mysql_query($sel_resultado);
						   $contador=0;						   
						   
						   while ($contador < mysql_num_rows($res_resultado)) {
							 if ($contador % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						   
               <tr class="<?php echo $fondolinea;?>">						
							 <td width="1%"><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"cli_cod")?>)"><b><?php echo mysql_result($res_resultado,$contador,"codigoanterior") ?><a></b></td>                               
               <td width="30%"><div align="center"><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"cli_cod")?>)"><b><?php echo strtoupper(mysql_result($res_resultado,$contador,"cli_des"));?></b></a></div></td>
               <td width="50%"><div align="center"><a href="javascript:modificar(<?php echo mysql_result($res_resultado,$contador,"cli_cod")?>)"><b><?php echo strtoupper(mysql_result($res_resultado,$contador,"cli_dir"));?></b></a></div></td>						
							 
							 						
						
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

