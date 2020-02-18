<?php
include ("../conectar.php");


$numlinea=$_GET["numlinea"];
$pro_cod=$_GET["pro_cod"];
$pro_can=$_GET["pro_can"];
$nro_fac=$_GET["nro_fac"];
$mes_cod=$_GET["mes_cod"];

$consulta="SELECT count(*) as cuenta FROM tmp WHERE numlinea='$numlinea'";
$rs_tabla = mysql_query($consulta);
$parametro=mysql_result($rs_tabla,0,"cuenta");

if ($parametro==0){

    $consulta= "insert into tmp (numlinea,pro_cod,pro_can,nro_fac)
    values('$numlinea','$pro_cod','$pro_can','$nro_fac')";
    $rs_consulta = mysql_query($consulta);

}else{
    $consulta= "delete from tmp where numlinea='$numlinea'";
    $rs_consulta = mysql_query($consulta);
}

header("Location: reporte/impresiones_orden_linea_varios.php?nrofactura=".$nro_fac."&mes_cod=".$mes_cod);


?>




