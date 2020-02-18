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
	$sel_maximo="SELECT max(pre_cod) as maximo FROM presupuesto_cab";
	$rs_maximo=mysql_query($sel_maximo);
	$variable1=mysql_result($rs_maximo,0,"maximo")+1;	
	$query_operacion="INSERT INTO presupuesto_cab(pre_cod,cli_cod,pre_est,pre_fec,fecha,hora,usuario,borrado)
					VALUES ('$variable1','$variable2','0','$variable3','$fecha','$hora','$usuario','0')";					
	$rs_operacion=mysql_query($query_operacion);
	header("Location: presupuestos_det/index.php?variable1=$variable1");

}

if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);	
	$variable3=strtoupper($_POST["variable3"]);
	$query="UPDATE presupuesto_cab SET cli_cod='$variable2',pre_fec='$variable3',fecha='$fecha',hora='$hora',usuario='$usuario' where pre_cod='$variable1'";
	$rs_query=mysql_query($query);
	header("Location: presupuestos_det/index.php?variable1=$variable1");
}

if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	
  $sel="SELECT pre_est FROM presupuesto_cab where pre_cod='$variable1'";
	$rs=mysql_query($sel);
	$pre_par=mysql_result($rs,0,"pre_est");
  if ($pre_par==0){
    $query="UPDATE presupuesto_cab SET borrado='1',fecha='$fecha',hora='$hora',usuario='$usuario' where pre_cod='$variable1'";
	  $rs_query=mysql_query($query);
    $query="UPDATE presupuesto_det SET borrado='1',fecha='$fecha',hora='$hora',usuario='$usuario' where fac_cod='$variable1'";
	  $rs_query=mysql_query($query); 
	  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");
  }else{
  ?>
  <script>
   		var variable1="<?echo $form?>";
      var variable2="<?echo $mec_cod?>";
      var variable3="<?echo $descripcion?>";      
      alert("Presupuesto Confirmado, no se puede modificar");
      location.href="index.php?variable1="+variable1+"&variable2="+variable2+"&variable3="+variable3;

  
  </script>
  <?
  }     
}
?>