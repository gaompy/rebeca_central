<?php
include ("../conectar.php"); 
@session_start();
$usuario=$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"]; 


include ("../fecha_hora.php"); 

$accion=$_POST["accion"];
if (!isset($accion)) { echo $accion=$_GET["accion"]; }

if ($accion=="alta") {

	$variable2=$_POST["variable2"];

	$sel_maximo="SELECT max(niv_cod) as maximo FROM niveles";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;
	
	$query_operacion="INSERT INTO niveles (niv_cod,niv_des,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);
	
		$query="select * from menu_det where borrado=0 order by med_cod";
		$rs=mysql_query($query);
			while ($row = mysql_fetch_row($rs)) {
			
			$var0=$row[0];$var1=$row[1];$var2=$row[2];
			
			  	$query_operacion1="INSERT INTO permisos (niv_cod, med_cod, mec_cod, per_agr, per_mod, per_imp,per_con,per_eli)
					VALUES ('$variable1','$var0','$var1','0','0','0','0','0')";					
				$rs_operacion1=mysql_query($query_operacion1);
			
			}
	
 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}

if ($accion=="modificar") {

$variable1=$_POST["id"];
$query="select * from permisos where niv_cod='$variable1' order by med_cod";
$rs=mysql_query($query);
while ($row = mysql_fetch_row($rs)) {
$var0=$row[0];$var4=$row[4];$var5=$row[5];$var6=$row[6];$var7=$row[7];
							
$variA="variA";
$variB="variB";
$variC="variC";
$variD="variD";
$variE="variE";
							
@$variableA=$_POST["$variA$var0"];	
@$variableB=$_POST["$variB$var0"];	
@$variableC=$_POST["$variC$var0"];	
@$variableD=$_POST["$variD$var0"];	
@$variableE=$_POST["$variE$var0"];	


$query="UPDATE permisos SET per_agr='$variableA',per_mod='$variableB',per_imp='$variableC',per_con='$variableD',per_eli='$variableE' where per_cod='$var0'";
$rs_query=mysql_query($query);


}	
	
}

		
	
?>


<script language="javascript">
window.close()
</script>
