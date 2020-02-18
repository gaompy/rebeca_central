<?php
@session_start();
@$usu_cod=$_SESSION["usu_cod"];
@$usu_nom=$_SESSION["usu_nom"];

if ($usu_cod <> ""){
$variable0=$_GET["variable0"];
$variable1=$_GET["variable1"];

@$tit_cod=$_SESSION[$variable0];
@$tit_nom=$_SESSION[$variable1];


include ("../conectar.php"); 
include ("../fecha_hora.php"); 


?>

<!DOCTYPE html>
<script type="text/javascript" src="jquery.js"></script>
<html lang="en">
<script>

function realizaProceso(valorCaja1, valorCaja2){

        var parametros = {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
        };
        $.ajax({
                data:  parametros,
                url:   'ajax.php',
                type:  'post', 
                beforeSend: function () {
                        //$("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        //$("#resultado").html(response);
                }
        });
} 
</script>

 <style type="text/css">   
    a.nounderline:link   
    {   
    text-decoration:none;
    color:black;   
    }   
  </style>

  <head>
    <meta charset="utf-8">
    
    <style type="text/css">    
        a {text-decoration:none}
    </style>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WEBTEA.'.</title>
     
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/freelancer.min.css" rel="stylesheet">
  </head>
   
  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">HOLA</a>
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?echo $variable1?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Volver Atras</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
     <br>
    <!-- Header -->
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
      <div class="container">
        <h2 class="text-center">A jugar !</h2>
        <hr class="star-primary">
        <div class="row">
        
        <?php 
                        
          $sel="select * from categorias where borrado='0' and usuario='$usu_cod' or usuario=0";
	        $rs=mysql_query($sel);                
	        $cuenta=mysql_num_rows($rs);
            $j=1;   
                  for ($i = 0; $i < mysql_num_rows($rs); $i++) {
                   $cat_cod=mysql_result($rs,$i,"cat_cod");
                   $cat_des=mysql_result($rs,$i,"cat_des");
                   $cat_img=mysql_result($rs,$i,"cat_img");
                   $href="#portfolioModal".$j;
        ?>
        
          <div class="col-sm-4 portfolio-item">
            <a class="portfolio-link" href="<?echo $href;?>" data-toggle="modal">
              <div class="caption">
                <div class="caption-content">
                  <i class="fa fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo $cat_img;?>" alt="">
            </a>
          </div>
        <?php
            $j++;
          }
        ?>  
        </div>
      </div>
    </section>


    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Portfolio Modals -->
    
            <?php 
                        
          $sel1="select * from categorias where borrado='0' and usuario='$usu_cod' or usuario=0";
	        $rs1=mysql_query($sel1);                
	        $cuenta1=mysql_num_rows($rs1);
            $j1=1;   
                  for ($i1 = 0; $i1 < mysql_num_rows($rs1); $i1++) {
                   $cat_cod=mysql_result($rs1,$i1,"cat_cod");
                   $cat_des=mysql_result($rs1,$i1,"cat_des");
                   $cat_img=mysql_result($rs1,$i1,"cat_img");
                   $href="portfolioModal".$j1;
        ?>

    <div class="portfolio-modal modal fade" id="<?php echo $href;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                
                <?php
                  $sel2="select * from sub_categorias where borrado='0' and cat_cod='$cat_cod'";
	                $rs2=mysql_query($sel2);                
	                $cuenta2=mysql_num_rows($rs2);
                    $j2=1;   
                      for ($i2 = 0; $i2 < mysql_num_rows($rs2); $i2++) {
                      $sub_cod=mysql_result($rs2,$i2,"sub_cod");
                      $sub_des=mysql_result($rs2,$i2,"sub_des");
                      $sub_img=mysql_result($rs2,$i2,"sub_img");
                      $sub_aud=mysql_result($rs2,$i2,"sub_son");
                      $form="form".$j1.$j2;

                ?>
                <div class="modal-body">
                  <h2><?php echo $sub_des;?></h2>
                  <hr class="star-primary">
                                    
                  <img class="img-fluid img-centered" src="<?php echo $sub_img; ?>" alt="">
                     <audio id="<?php echo $form;?>" src="<?php echo $sub_aud;?>"></audio>
                      <div>
                       <button class="btn btn-success" onclick="document.getElementById('<?php echo $form?>').play(),realizaProceso('<?php echo $sub_cod;?>','<?php echo $variable0;?>')">Play</button>
                       <button class="btn btn-success" onclick="document.getElementById('<?php echo $form?>').volume+=0.1">Vol.+</button>
                       <button class="btn btn-success" onclick="document.getElementById('<?php echo $form?>').volume-=0.1">Vol.-</button>
                       
                        
                           
                      </div>
                                          
                  <ul class="list-inline item-details">
                    <li>
                    </li>

                    <li>
                    </li>

                  </ul>
                  
                </div>
                 <?php
                    $j2++;
                    }     
                 ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
           <?php
            $j1++;
          }
        ?>  
 
    
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/freelancer.min.js"></script>

  </body>

</html>
<?

}else{
?>
  <script language="javascript"> 
   	  alert("Por favor inicie sesion!");
      location.href="../index.php";
  </script>

<?
} 
?>