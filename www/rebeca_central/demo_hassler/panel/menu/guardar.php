<?php
session_start();
@$usu_cod=$_SESSION["usu_cod"];
include ("../conectar.php"); 
include ("../fecha_hora.php"); 

@$accion=$_GET["accion"];

if (!isset($accion)) { echo @$accion=$_POST["accion"]; }

if ($accion=="0") {
  $variable1=strtoupper($_GET["variable1"]);
	$variable2=$_GET["variable2"];

	 $sel_maximo="SELECT max(tit_cod) as maximo FROM titulares";
	 $rs_maximo=mysql_query($sel_maximo);
	 $variable_max=mysql_result($rs_maximo,0,"maximo")+1;
	
	    $query_operacion="insert into titulares(tit_cod,tit_nom,tit_fec,fecha,hora,usuario)
      values('$variable_max','$variable1','$variable2','$fecha','$hora','$usu_cod')";					
	    $rs_operacion=mysql_query($query_operacion);
  
  
?>
  <script language="javascript"> 
   	  alert("Ha registrado al titular correctamente!");
      location.href="index.php";
  </script>

<?
}


if ($accion=="1") {
   $variable0=strtoupper($_GET["variable0"]);
   $variable1=strtoupper($_GET["variable1"]);
	 $variable2=$_GET["variable2"];
	    
      $query_up="update titulares set tit_nom='$variable1',tit_fec='$variable2' where tit_cod='$variable0'";					
	    $rs_up=mysql_query($query_up);  
  ?>
  <script language="javascript"> 
   	  alert("Los datos se han actualizado correctamente!");
      location.href="index.php";
  </script>
  <?
  }
  

if ($accion=="3") {
  $variable1=strtoupper($_POST["variable3"]);
	 
   $sel_maximo="SELECT max(cat_cod) as maximo FROM categorias";
	 $rs_maximo=mysql_query($sel_maximo);
	 $variable_max=mysql_result($rs_maximo,0,"maximo")+1;
	 $img="../img/portfolio/categorias/".$variable_max.".jpg";
   
	    $query_operacion="insert into categorias(cat_cod,cat_des,cat_img,cat_par,fecha,hora,usuario)
      values('$variable_max','$variable1','$img','1','$fecha','$hora','$usu_cod')";					
	    $rs_operacion=mysql_query($query_operacion);
      include ("upload_foto.php");
?>
  <script language="javascript"> 
   	  alert("Ha registrado su categoria correctamente!");
      location.href="index.php";
  </script>

<?
}

if ($accion=="4") {
   $variable0=strtoupper($_POST["variable0_0"]);
   $variable1=strtoupper($_POST["variable3"]);
	 /*$variable2=$_POST["variable2"];*/
	    
      $query_up="update categorias set cat_des='$variable1' where cat_cod='$variable0'";					
	    $rs_up=mysql_query($query_up);
      $variable_max=$variable0; 
      include ("upload_foto.php"); 
  ?>
  <script language="javascript"> 
   	  alert("Los datos se han actualizado correctamente!");
      location.href="index.php";
  </script>
  <?
  }
@$accion=$_POST["accion1"];
if ($accion=="5") {
  $variable1=strtoupper($_POST["variable5"]);
  $variable2=strtoupper($_POST["variable6"]);
	 
   $sel_maximo="SELECT max(sub_cod) as maximo FROM sub_categorias";
	 $rs_maximo=mysql_query($sel_maximo);
	 $variable_max=mysql_result($rs_maximo,0,"maximo")+1;
	 $img="../img/portfolio/sub_categorias/".$variable_max.".jpg";
   $aud="../img/portfolio/audios/".$variable_max.".mp3";
   
	    $query_operacion="insert into sub_categorias(sub_cod,sub_des,cat_cod,sub_img,sub_son,fecha,hora,usuario)
      values('$variable_max','$variable1','$variable2','$img','$aud','$fecha','$hora','$usu_cod')";					
	    $rs_operacion=mysql_query($query_operacion);
      include ("upload_foto_sub_cat.php");
      include ("upload_audios.php");
?>
  <script language="javascript"> 
   	  alert("Ha registrado su sub categoria correctamente!");
      location.href="index.php";
  </script>

<?
}
if ($accion=="6") {
    $variable0=strtoupper($_POST["variable0_1"]);
    $variable1=strtoupper($_POST["variable5"]);
    $variable2=strtoupper($_POST["variable6"]);
  	    
      $query_up="update sub_categorias set sub_des='$variable1',cat_cod='$variable2' 
      where sub_cod='$variable0'";					
	    $rs_up=mysql_query($query_up);
      $variable_max=$variable0; 
      include ("upload_foto_sub_cat.php");
      include ("upload_audios.php");
       
  ?>
  <script language="javascript"> 
   	  alert("Los datos se han actualizado correctamente!");
      location.href="index.php";
  </script>
  <?
  }


  
?>