<?php 
@session_start();
$_SESSION["s_username"];
$_SESSION["id_usuario"];
$usuario=$_SESSION["id_usuario"];
$usuario_desc=$_SESSION["s_username"];

include("../conectar.php");


/******************************************** 
Write the query, call it, and find the number of fields 
/********************************************/ 

$contenido = implode('',file("tmp_$usuario.dat")); 


$qry =mysql_query($contenido); 

$campos = 70;   
$i=0;    

/******************************************** 
Extract field names and write them to the $header 
variable 
/********************************************/
ob_start(); 
echo "&nbsp;<center><table border=\"1\" align=\"center\">"; 
echo "<tr bgcolor=\"#ffffff\"> </tr>"; 
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

echo $reporte; 

?>