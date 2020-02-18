<?php
 include("conectar.php");
 
 $query="select *, 
 (SELECT pro_bar FROM productos WHERE pro_cod=factura_det.pro_cod) AS pro_bar,
(SELECT pro_des FROM productos WHERE pro_cod=factura_det.pro_cod) AS pro_des
 from factura_det order by mde_cod limit 0,100";
 $rs=mysql_query($query);
 $query;
 $cuenta=0;
   for ($i = 0; $i < mysql_num_rows($rs); $i++) {
  
    $mde_cod=mysql_result($rs,$i,"mde_cod");
    $pro_cod=mysql_result($rs,$i,"pro_cod");
    $pro_bar=mysql_result($rs,$i,"pro_bar");
    $pro_des=mysql_result($rs,$i,"pro_des");
    $mde_ven=mysql_result($rs,$i,"pro_ven");
    
      
       $query_fac="select * from productos_det where pro_cod='$pro_cod' and pde_ven='$mde_ven'";
       $rs_fac=mysql_query($query_fac);
       $cuenta = mysql_num_rows($rs_fac);
       
       if ($cuenta==0){
       $query_pro="select * from productos where pro_cod='$pro_cod' and pro_ven='$mde_ven'";
       $rs_pro=mysql_query($query_pro);
       @$pro_ven=mysql_result($rs_pro,0,"pro_ven");
       @$pro_com=mysql_result($rs_pro,0,"pro_cos");
       
       }else{
       @$pro_ven=mysql_result($rs_fac,0,"pde_ven");
       @$pro_com=mysql_result($rs_fac,0,"pde_cos");
       
       }
       echo $mde_cod." - ".$cuenta." - ".$pro_bar." - ".$pro_des." - ".$pro_com." - ".$pro_ven."<br>";
       
}                                             
 
 
 
 


?>