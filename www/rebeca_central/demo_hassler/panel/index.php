<!DOCTYPE html>
<html lang="en">
<?php
@session_start();
$emp_des=$_SESSION["emp_des"]; 
include("../conectar.php");
include("../fecha_hora.php");
$fecha_inicio=substr($fecha, 0, -2)."01";
$hora_actual=date("H:i:s");

function RestarHoras($horaini,$horafin)
{
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);
 
	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);
 
	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);
 
	$dif=$fin-$ini;
 
	$difh=floor($dif/3600);
	$difm=floor(($dif-($difh*3600))/60);
	$difs=$dif-($difm*60)-($difh*3600);
	return date("H:i:s",mktime($difh,$difm,$difs));
}
 
?>

  
  
  <style type="text/css">   
    a.nounderline:link   
    {   
    text-decoration:none;
    color:black;   
    }   
  </style>


  <head>
  <meta http-equiv="refresh" content="3"/>

    <meta charset="utf-8">
    
    
    <style type="text/css">    
        a {text-decoration:none}
    </style>
    
    	<script language="javascript">
    
    function confirmar(numlinea)
      {
	         if (confirm(" Desea Confirmar este Pedido ? ")){
		       location.href="guardar.php?linea="+numlinea;
	        }
     }

		</script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?echo $emp_des;?></title>
     
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
  </head>
   
  <body id="page-top">

  <?php
  
           $sel_lineas="select count(*) as cuenta from factura_cab_view 
          where fac_ent='0' and borrado='0' and fecha >='$fecha_inicio' and fecha <='$fecha'";
               $rs_lineas=mysql_query($sel_lineas);
               $contador=mysql_result($rs_lineas,0,"cuenta"); 
               
               $_SESSION["contador"] = $contador; 
               
  ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?echo $emp_des;?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">En espera de entrega : <?php echo $contador; ?> tickets</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        
        <div class="intro-text">
          <table width="110%" border=1 ID="Table1" align="center">
          <?php
          $productos="";
         $sel_lineas="select * from factura_cab_view 
          where fac_ent='0' and borrado='0' and fecha >='$fecha_inicio' and fecha <='$fecha'  
          order by fac_cod asc
          limit 0,10";
               $rs_lineas=mysql_query($sel_lineas);
               $cuenta=mysql_num_rows($rs_lineas);
               if ($cuenta==0){
               ?>
                 <td><span class="skills"><b>No existen Pedidos a procesar...</b></span></td>
               <?
               }
               
                        
                        for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {                        
                        $fac_cod=mysql_result($rs_lineas,$i,"fac_cod");                                                                       
                        $cli_des=mysql_result($rs_lineas,$i,"cli_des");
                        $pro_hor=mysql_result($rs_lineas,$i,"hora");
                        $tiempo=RestarHoras($pro_hor,$hora_actual);
                        
                        if ($i==0){
                         $_SESSION["nrofac"]=$fac_cod;                       
                        } 

                         $sel="SELECT fac_cod,pro_cod,pro_can,
                        (SELECT pro_bar FROM productos WHERE pro_cod=factura_det.pro_cod) AS pro_bar,
                        (SELECT pro_des FROM productos WHERE pro_cod=factura_det.pro_cod) AS pro_des
                         FROM factura_det WHERE borrado='0' AND fac_cod='$fac_cod'";
                         $rs=mysql_query($sel);
                         $cuenta=mysql_num_rows($rs);
                         if ($cuenta>0){
                         for ($j = 0; $j < mysql_num_rows($rs); $j++) {

                            
                            $fac_cod=mysql_result($rs,$j,"fac_cod");
                            $pro_des=mysql_result($rs,$j,"pro_des");
                            $pro_can=mysql_result($rs,$j,"pro_can");
                            $productos=$productos."".$pro_can."-".$pro_des."<br/>";
                         
                         }
                         
                         }     
                         
                         ?>
                        
                     <td><span class="skills"><b><?php echo $i+1;?></b></span></td>
                      <td><span class="skills"><b><?php echo $fac_cod;?></b></span></td>
                      
                      <td><span><?php echo "<b>".$productos."</b>";?></span></td>
          
                       
                   
                    
                     <?php 
                     if ($i==0){
                     ?>
                     <td><a href="javascript:confirmar('<?php echo $fac_cod?>')"><img src="img/verde.png" width="150" height="150" /></td>
                   
                     <?php
                      }
                     ?>
                     
                     <?php 
                     if ($i==1){
                     ?>
                     <td><img src="img/azul.png" width="90" height="90" /></td>
                     <?php
                      }
                     ?>
                     
                      <?php 
                     if ($i > 1){
                     ?>
                     <td><img src="img/rojo.png" width="60" height="60" /></td>
                     <?php
                      }
                     ?>
                    
            
            </tr>
              <? 
                $productos="";
                }
                        
                
               @$aux=$_SESSION["aux"];
               //echo "$i-$aux";
               if ($i==$aux){
                    $_SESSION["aux"] = $i;                                
               }else{               
                  
                  if ($i > $aux){
                  

                    $link="img/timbre.mp3";
                    $audio="<embed src=".$link." width='0' height='0' >"; 
                    echo $audio;                             
                    }
                    $_SESSION["aux"] = $i;
               }
          ?>
          </table>
        </div>
      </div>
    </header>

    <!-- Portfolio Grid Section -->



        <!-- sesion Section -->
    


    <!-- Footer -->
    <footer class="text-center">

      <div class="footer-below">
        <div class="container">
        
          <div class="row">
            <div class="col-lg-12">
              Dise&ntildeo, Desarrollo y Programaci&oacuten: ALPHA TECHNOLOGY 
               
            </div>
            <div class="col-lg-12">

              Telefono: 0984 348 341 
            </div>
            
            
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>
