<?php
include ("../conectar.php"); 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$form=$_SESSION["form"];
$mec_cod=$_SESSION["mec_cod"];
$descripcion=$_SESSION["descripcion"] ;
include ("../fecha_hora.php"); 

$accion=$_POST["accion"];
if (!isset($accion)) { echo $accion=$_GET["accion"]; }

if ($accion=="alta") {
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=str_replace(".","",($_POST["variable4"]));
  $variable5=strtoupper($_POST["variable5"]);
  $variable6=strtoupper($_POST["variable6"]);
  $variable7=strtoupper($_POST["variable7"]);
  
  
  
  
  $sel="select count(*) as cuenta from movimientos where borrado='0' and ban_cod='$variable6'";
	$rs=mysql_query($sel);
  $contador=mysql_result($rs,0,"cuenta");
   if ($contador==0){   
     $deposito=$variable4;
     $extraccion=0;
     $saldo=$variable4;
   }else{
	       $sel="select * from movimientos where borrado='0' and mov_cod=
         (SELECT MAX(mov_cod) FROM movimientos WHERE borrado=0 AND ban_cod='$variable6')";
	       $rs=mysql_query($sel);
	       $mov_mon_dep=mysql_result($rs,0,"mov_mon_dep");
         $mov_mon_ext=mysql_result($rs,0,"mov_mon_ext");
         $mov_mon_sal=mysql_result($rs,0,"mov_mon_sal");
         
          if ($variable5=="DEP."){
              $deposito=$variable4;
              $extraccion=0;
              $saldo=$mov_mon_sal+$variable4;             
            }else{
              $deposito=0;
              $extraccion=$variable4;
              $saldo=$mov_mon_sal-$variable4;             
            }  
        }
  $sel_maximo="SELECT max(mov_cod) as maximo FROM movimientos";
	$rs_maximo=mysql_query($sel_maximo);
  $variable1=mysql_result($rs_maximo,0,"maximo")+1;

  $query_operacion="INSERT INTO 
  movimientos(mov_cod, 	mov_nro, 	mov_obs, 	mov_mon_dep,mov_mon_ext, mov_mon_sal, 	
  mov_par, 	ban_cod, 	mov_fec, 	fecha, 	hora, 	usuario,borrado 	) 
  VALUES 	('$variable1', 	'$variable2', 	'$variable3', 	'$deposito', 	
  '$extraccion','$saldo','$variable5',	'$variable6', 	'$variable7', 	'$fecha', 	
  '$hora', 	'$usuario','0' 	)";     			
	$rs_operacion=mysql_query($query_operacion);
	
  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 
	
}


if ($accion=="modificar") {
	$variable1=$_POST["id"];
	$variable2=strtoupper($_POST["variable2"]);
  $variable3=strtoupper($_POST["variable3"]);
  $variable4=str_replace(".","",($_POST["variable4"]));
  $variable5=strtoupper($_POST["variable5"]);
  $variable6=strtoupper($_POST["variable6"]);
  $variable7=strtoupper($_POST["variable7"]);
  
    if ($variable5=="DEP."){
      $deposito=$variable5;
      $extraccion=0;
  
  }else{
      $deposito=0;
      $extraccion=$variable5;
  }


	$query="UPDATE movimientos SET
	mov_nro = '$variable2' , 
	mov_obs = '$variable3' , 
	mov_mon = '$variable4' , 
	mov_par = '$variable5' , 
	ban_cod = '$variable6' , 
	mov_fec = '$variable7' , 
	fecha = '$fecha' , 
	hora = '$hora' , 
	usuario = '$usuario' 	
	WHERE
	mov_cod = '$variable1'";
	$rs_query=mysql_query($query);
  header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion");  
	}



if ($accion=="baja") {
	$variable1=$_GET["variable1"];
	$query="UPDATE movimientos SET borrado='1',fecha='$fecha',hora='$hora' where mov_cod='$variable1'";
	$rs_query=mysql_query($query);
	 header("Location: index.php?variable1=$form&variable2=$mec_cod&variable3=$descripcion"); 

}

		
	
?>

