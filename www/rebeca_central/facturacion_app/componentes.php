<?php
			$q="select count(*) as cuenta from recetas where pro_cod='$pro_cod' and borrado=0";
			$rq = mysql_query($q);
			$conta=mysql_result($rq,0,"cuenta");

      if ($conta > 0){
        			$q1="select * from recetas where pro_cod='$pro_cod' and borrado=0";
			        $rq1 = mysql_query($q1);
              
              for ($j = 0; $j < mysql_num_rows($rq1); $j++) {                
                $spr_cod=mysql_result($rq1,$j,"spr_cod");
                $rec_can=mysql_result($rq1,$j,"rec_can");
                $pro_can_tot=$pro_can * $rec_can; 
                
               if ($par==0){             
                $up="update productos set pro_can=pro_can-$pro_can_tot where pro_cod='$spr_cod'";
						    $up=mysql_query($up);
               }else{
                 $up="update productos set pro_can=pro_can+$pro_can_tot where pro_cod='$spr_cod'";
						     $up=mysql_query($up);              
               
               }
              
              }
      
      }

?>