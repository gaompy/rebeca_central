
<?php 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];

include ("../../conectar.php");


/******************************************** 
Write the query, call it, and find the number of fields 
/********************************************/ 
$qry =mysql_query("SELECT * from tmp_$usuario"); 

$campos = mysql_num_fields($qry);   
$i=0;   

/******************************************** 
Extract field names and write them to the $header 
variable 
/********************************************/
ob_start(); 
echo "&nbsp;<center><table border=\"1\" align=\"center\">"; 
echo "<tr bgcolor=\"#ffffff\"> 
  <td><font color=\"#336666\"><strong>CODIGO</strong></font></td> 
  <TD><font color=\"#336666\"><strong>DESCRIPCION</strong></font></TD> 
  <TD><font color=\"#336666\"><strong>FECHA</strong></font></TD> 
  <TD><font color=\"#336666\"><strong>HORA</strong></font></TD> 
</tr>"; 
while($row=mysql_fetch_array($qry)) 
{   
    echo "<tr>";   
     for($j=0; $j<$campos; $j++) {   
         echo "<td>".$row[$j]."</td>";   
     }   
     echo "</tr>";         
}   
echo "</table>"; 

//$reporte = ob_get_clean();

$reporte = ob_get_clean();

/******************************************** 
Set the automatic downloadn section 
/********************************************/

header("Content-type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=consulta.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0");  

echo $reporte; 
$query_operacion2="drop table `tmp_$usuario`";
$rs_operacion2=mysql_query($query_operacion2);

?>