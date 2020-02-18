<!DOCTYPE html>
<html lang="en">
<?php
@session_start();
include("../conectar.php");
include("../fecha_hora.php");

?>

  
  
  <style type="text/css">   
    a.nounderline:link   
    {   
    text-decoration:none;
    color:black;   
    }   
  </style>


  <head>
 
    <meta http-equiv="refresh" content="10"/>
    <meta charset="utf-8">
    
    
    <style type="text/css">    
        a {text-decoration:none}
    </style>
    
    	<script language="javascript">
    
    function confirmar(numlinea,conta,estado)
      {
	        if (conta==0){
          
          alert("No existen Numeros para Sortear!");
          
          }else{
          
            if (estado==0){
              if (confirm(" Desea Sortear este Premio ? ")){
		            location.href="guardar.php?linea="+numlinea;
	             }}else{
               alert("Este premio ha sido sorteado, no se puede volver a sortear!");
               }
     }     }

		</script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>COMERCIAL BARATODO</title>
     
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
  
           $sel_lineas="select count(*) as cuenta from promo_det 
          where pmd_est='0' and borrado='0'";
               $rs_lineas=mysql_query($sel_lineas);
               $contador=mysql_result($rs_lineas,0,"cuenta"); 
               
               $_SESSION["contador"] = $contador; 
               
  ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">COMERCIAL BARATODO</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">En espera de sorteo : <?php echo $contador; ?> Nros de Celulares</a>
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
               $sel_lineas="select * from promo_cab where borrado='0' and prm_cod > '0' order by prm_cod desc LIMIT 5 ";
               $rs_lineas=mysql_query($sel_lineas);
               $cuenta=mysql_num_rows($rs_lineas);
               if ($cuenta==0){
               ?>
                 <td><span class="skills"><b>No existen Premios a procesar...</b></span></td>
               <?
               }
               
                        
                        for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {                        
                        $fac_cod=mysql_result($rs_lineas,$i,"prm_cod");                                                                       
                        $prom_des=mysql_result($rs_lineas,$i,"prm_des");
                        $prm_cel=mysql_result($rs_lineas,$i,"prm_cel");
                        $prm_fec=mysql_result($rs_lineas,$i,"prm_fec");
                        $prm_est=mysql_result($rs_lineas,$i,"prm_est");
                    
                        
                        if ($i==0){
                         $_SESSION["nrofac"]=$fac_cod;                       
                        } 

                            $sel_lineas_1="SELECT *,
                                (SELECT cli_des FROM factura_cab_view WHERE fac_cod=promo_det.fac_cod) AS cli_des,
                                (SELECT fecha FROM factura_cab_view WHERE fac_cod=promo_det.fac_cod) AS fecha,
                                (SELECT fac_tot_1 FROM factura_cab_view WHERE fac_cod=promo_det.fac_cod) AS monto
                                FROM promo_det WHERE borrado='0' AND prm_cod='$fac_cod' AND pmd_est='2'";
                            $rs_lineas_1=mysql_query($sel_lineas_1);
                            $cuenta_1=mysql_num_rows($rs_lineas_1);
                      
                              if ($cuenta_1==0){
                                $descripcion="";
                              }else{
                                $cliente=mysql_result($rs_lineas_1,0,"cli_des");
                                $fecha_compra=mysql_result($rs_lineas_1,0,"fecha");
                                $ticket=mysql_result($rs_lineas_1,0,"fac_cod");
                                $descripcion="Cliente: ".$cliente." - Fecha Compra: ".$fecha_compra." - Nro.ticket: ".$ticket;
                              }
                      
                      
                         
                         
                         ?>
                        
                     <td><span class="skills"><b><?php echo $i+1;?></b></span></td>
                      <td><span class="skills"><b><?php echo $prom_des;?></b></span></td>
                      <td><span class="skills"><?php echo "<b>".$prm_cel."</b>";?></span></td>
                      <td><span ><?php echo "<b>".$descripcion."</b>";?></span></td>
                       
                   
                    
                     <?php 
                     if ($i==0){
                     ?>
                     <td><a href="javascript:confirmar('<?php echo $fac_cod?>','<?php echo $contador?>','<?php echo $prm_est?>')"><img src="img/verde.png" width="150" height="150" /></td>
                   
                     <?php
                      }
                     ?>
                     
                     <?php 
                     if ($i==1){
                     ?>
                     <td><a href="javascript:confirmar('<?php echo $fac_cod?>','<?php echo $contador?>','<?php echo $prm_est?>')"><img src="img/azul.png" width="90" height="90" /></td>
                     <?php
                      }
                     ?>
                     
                      <?php 
                     if ($i > 1){
                     ?>
                     <td><a href="javascript:confirmar('<?php echo $fac_cod?>','<?php echo $contador?>','<?php echo $prm_est?>')"><img src="img/rojo.png" width="60" height="60" /></td>
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
