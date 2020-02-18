<?
@session_start();
include ("../conectar.php");
$form=$_GET["variable1"];
$mec_cod=$_GET["variable2"];
$descripcion=$_GET["variable3"];
$_SESSION["form"] = $form; 
$_SESSION["mec_cod"] = $mec_cod;
$_SESSION["descripcion"] = $descripcion;
$usuario=$_SESSION["id_usuario"];
$ncaja=$_SESSION["ncaja"];
  if ($form=="16"){
    $tipo=0;
    }else{
    $tipo=1;
  }
  include ("../permisos.php");


    $query1="SELECT * FROM aper_cie WHERE ape_par='0' and usuario='$usuario'";
    $rs_query1=mysql_query($query1);    
    $cuenta1 = mysql_num_rows($rs_query1);

    

   if ($cuenta1=='0') {

   ?>
        <script>
          alert ("Debe realizar Apertura de Caja!");
          location.href="../central.php";	
        </script>
    <?
} else {

$ape_cod=mysql_result($rs_query1,0,"ape_cod");
$aps_cod=mysql_result($rs_query1,0,"aps_cod");
 
$_SESSION["ape_cod"] = $ape_cod;
$_SESSION["aps_cod"] = $aps_cod; 

if ($tipo==1){
?>



<script language="javascript">
		function agregar_pedido(variable1,variable2,variable3,variable4) {
      var ncaja="<? echo $ncaja?>";
      
       if (variable3==ncaja){
        if (confirm("Entregar Pedido ? "))  
         location.href="detalle.php?nromesa="+variable1+"&mesfac="+variable2+"&estado="+variable3+"&mes_des="+variable4+"&par=1";  	
         else {
          location.href="detalle.php?nromesa="+variable1+"&mesfac="+variable2+"&estado="+variable3+"&mes_des="+variable4+"&par=0"; 
          }
         }else {        
         location.href="detalle.php?nromesa="+variable1+"&mesfac="+variable2+"&estado="+variable3+"&mes_des="+variable4+"&par=0"; 
       }
  	}
	</script>





<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">		
<style type="text/css">
<!--
.Estilo1 {
	font-size: 10pt;
	font:"Arial Black", Gadget, sans-serif;
	color: #000033;
}
.Estilo2 {color: #000066}
-->

a.nounderline:link   
{   
 text-decoration:none;   
} 

</style>



<?php 

$contenido = "select * from mesas where borrado=0 order by mes_cod"; 
$qry =mysql_query($contenido);
$contador=1;
$cantidad=mysql_num_rows($qry);
$multiplo=round($cantidad/7)+1;


$query2="SELECT SUM(mes_est) AS suma FROM mesas WHERE borrado='0' and mes_cod >0";
$rs_query2=mysql_query($query2); 
$suma=mysql_result($rs_query2,0,"suma");

if ($suma > 0){

?>
<meta http-equiv="refresh" content="5"/>
<?
}
 

?> 


<table width="51%" height="128" border=1 align="center" cellpadding=10 cellspacing=20 class="fuente8">
  <?
  $con=0;
  $codigo=0;
  while($con < $multiplo) {
  ?>
  <tr>
    <?
    for ($i = 1; $i <= 7; $i++) {
        $sql1 = "SELECT MIN(mes_cod) AS minimo FROM mesas WHERE borrado='0' AND mes_cod > '$codigo'"; 
        $query1 =mysql_query($sql1);
        $mes_cod=mysql_result($query1,0,"minimo");
     
        $sql = "select * from mesas where mes_cod='$mes_cod' and mes_cod > 0"; 
        $query =mysql_query($sql);
        $cuenta=mysql_num_rows($query);

      if ($cuenta>0){
          $mesa_nro=mysql_result($query,0,"mes_cod");
          $mes_des=mysql_result($query,0,"mes_des");
          $mes_est=mysql_result($query,0,"mes_est");
          $mes_fac=mysql_result($query,0,"mes_fac");
            if ($mes_est == 0){$imagen="fotos/mesa.jpg";}
            if ($mes_est == 1){$imagen="fotos/camarero.jpg";}   
            if ($mes_est == 2){$imagen="fotos/comiendo.jpg";}  
      ?>
          <td width="3%"><span class="fuente8_1"><a href="javascript:agregar_pedido('<?php echo $mesa_nro;?>','<?php echo $mes_fac;?>','<?php echo $mes_est;?>','<?php echo $mes_des;?>')" class="nounderline" ><img src="<? echo $imagen; ?>" border="0"  width="100" height="85" ><span class="Estilo1"><?php echo $mes_des ?></span></a>      
      <?      
        $codigo=$mes_cod;
      }
      }
    ?>

    </span>          
  </tr>
 <?
 $con++;
 } 
 ?>
</table>
<?
}else{

$sel="select * from mesas where mes_cod='$ncaja'";
$rs=mysql_query($sel);
$nro_fac=mysql_result($rs,0,"mes_fac");

if ($nro_fac == 0 ){
?>
 <script language="javascript">
    var ncaja="<? echo $ncaja?>";
    if (confirm("desea generar pedido ? "))  
         location.href="detalle.php?nromesa="+ncaja;  	
         else {
          location.href="../central.php";
          }
 </script>

<?
}else{
header("Location:detalle.php?nromesa=$ncaja");
}
} 
}
?>