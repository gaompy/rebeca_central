<?
@session_start();
 include ("../conectar.php");
?>

	<script language="javascript">
    
    function confirmar(numlinea)
      {
	         if (confirm(" Desea Confirmar este Pedido ? ")){
		       location.href="guardar.php?linea="+numlinea;
	        }
     }

		</script>


   <p>	<b>Item___Codigo__________Producto ________Precio_______________Confirmar</b></p>
  <table width="600" border="0" align="center">
		              
                  <tr>
		                 <?
                      $fam_cod=$_POST["fam_cod"];
                      $sel_lineas="SELECT * FROM productos WHERE borrado='0' AND fam_cod='$fam_cod'
                      order by pro_des";
                      $rs_lineas=mysql_query($sel_lineas);
                        
                        for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
                        $pro_cod=mysql_result($rs_lineas,$i,"pro_cod");
                        $pro_bar=mysql_result($rs_lineas,$i,"pro_bar");
                        $pro_des=mysql_result($rs_lineas,$i,"pro_des");
                        $pro_ven=mysql_result($rs_lineas,$i,"pro_ven");
                        
                         ?>
                    <td width="42"><b><?echo $i+1?></td></b>                 
		                <td width="141"><b><?echo $pro_bar?></td></b>
                    <td width="141"><b><?echo $pro_des?></td></b>
		                <td width="98"><b><?echo $pro_ven?></td></b>
                    <td width="75"><a href="javascript:confirmar('<?echo $pro_cod?>')"><img src="img/signo_ok.jpg" width="49" height="36" /></td>
            
            </tr>
              <? } ?>
            </tr>
          </table>