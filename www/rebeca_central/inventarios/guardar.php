<?php
include ("../conectar.php"); 
@session_start();
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;

include ("../fecha_hora.php"); 

@$accion=$_POST["accion"];
if (!isset($accion)) { $accion=$_GET["accion"]; }

if ($accion=="alta") {
	$variable2=strtoupper($_POST["variable2"]);
	$variable3=strtoupper($_POST["variable3"]);
	$sel_maximo="SELECT max(inv_cod) as maximo FROM inventario_cab";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;	
	$query_operacion="INSERT INTO inventario_cab(inv_cod,inv_des,inv_par,inv_fec,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','0','$variable3','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);
	header("Location: inventarios_det/index.php?variable1=$variable1");

}

if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);	
	$variable3=strtoupper($_POST["variable3"]);
	$query="UPDATE inventario_cab SET inv_des='$variable2',inv_fec='$variable3',fecha='$fecha',hora='$hora',usuario='$usuario' where inv_cod='$variable1'";
	$rs_query=mysql_query($query);
	header("Location: inventarios_det/index.php?variable1=$variable1");
}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	
  $sel="SELECT inv_par FROM inventario_cab where inv_cod='$variable1'";
	$rs=mysql_query($sel);
	$inv_par=mysql_result($rs,0,"inv_par");
  if ($inv_par==0){
    $query="UPDATE inventario_cab SET borrado='1',fecha='$fecha',hora='$hora',usuario='$usuario' where inv_cod='$variable1'";
	  $rs_query=mysql_query($query);
    $query="UPDATE inventario_det SET borrado='1',fecha='$fecha',hora='$hora',usuario='$usuario' where fac_cod='$variable1'";
	  $rs_query=mysql_query($query); 
	  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");
  }else{
  ?>
  <script>
   		var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";      
      alert("Inventario Ajustado, no se puede modificar");
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;

  
  </script>
  <?
  }     
}
?>

