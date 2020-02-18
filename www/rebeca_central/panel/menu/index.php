<?
@session_start();
@$usu_cod=$_SESSION["usu_cod"];
@$usu_nom=$_SESSION["usu_nom"];
if ($usu_cod <> ""){
include ("../conectar.php"); 
include ("../fecha_hora.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<script language="javascript">
      function titulares() 		
      {
				var mensaje="";
        if (document.getElementById("variable1").value=="") mensaje+="  - Titular\n";
        if (document.getElementById("variable2").value=="") mensaje+="  - Fecha Nac.\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
          var cuenta;
          var variable0=document.getElementById("variable0").value;
          var variable1=document.getElementById("variable1").value;
          var variable2=document.getElementById("variable2").value;
          if (variable0==""){
            cuenta=0;
          }else{
            cuenta=1;
          }                    
          location.href="guardar.php?variable1="+variable1+"&variable2="+variable2+"&accion="+cuenta+"&variable0="+variable0;
        }
			}  
      
      function titulares_app() 		
      {
				var mensaje="";
        if (document.getElementById("variable1_1").value=="") mensaje+="  - Titular\n";
        if (document.getElementById("variable2_1").value=="") mensaje+="  - Fecha Nac.\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
          
          var variable0=document.getElementById("variable0_2").value;
          var variable1=document.getElementById("variable1_1").value;
          //var variable2=document.getElementById("variable2_1").value;
          
          location.href="aplicacion.php?variable0="+variable0+"&variable1="+variable1;
        }
			}  

      
      function titulares_app_informe() 		
      {
				var mensaje="";
        if (document.getElementById("variable1_1").value=="") mensaje+="  - Titular\n";
        if (document.getElementById("variable2_1").value=="") mensaje+="  - Fecha\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
          
          var variable0=document.getElementById("variable0_2").value;
          var variable1=document.getElementById("variable1_1").value;
          var variable2=document.getElementById("variable2_1").value;
          
          	miPopup = window.open("../reportes/index.php?variable0="+variable0+"&variable1="+variable1+"&variable2="+variable2,"miwin","width=700,height=380,scrollbars=yes");
			      miPopup.focus();

          
          //location.href="aplicacion.php?variable0="+variable0+"&variable1="+variable1;
        }
			}  




      function categorias_datos(cat_cod,cat_des,cat_img,cat_par) 		
      {
         if (cat_par==0){
         alert("No puede modificar categoria estandar!");
         
         }else{
				  var variable0_0=document.getElementById("variable0_0").value=cat_cod;
          var variable3=document.getElementById("variable3").value=cat_des;
          var variable4=document.getElementById("variable4").value=cat_img;
         }


			}

      function sub_categorias_datos(sub_cod,sub_des,cat_cod) 		
      {
				  var variable0_1=document.getElementById("variable0_1").value=sub_cod;
          var variable5=document.getElementById("variable5").value=sub_des;
          var variable6=document.getElementById("variable6").value=cat_cod;


			}


      function categorias() 		
      {
				var mensaje="";
        if (document.getElementById("variable3").value=="") mensaje+="  - Categoria\n";
        if (document.getElementById("variable4").value=="") mensaje+="  - Imagen\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
          var cuenta;
          var variable0=document.getElementById("variable0_0").value;
          var variable1=document.getElementById("variable3").value;
          var variable2=document.getElementById("variable4").value;
          if (variable0==""){
            cuenta=3;
          
            document.getElementById("accion").value=3;
            document.getElementById("contactForm1").submit();
          }else{
            cuenta=4;
            document.getElementById("accion").value=4;
            document.getElementById("contactForm1").submit();
          }                              
        }
			}

      function sub_categorias() 		
      {
				var mensaje="";
        if (document.getElementById("variable5").value=="") mensaje+="  - Sub Categoria\n";
        if (document.getElementById("variable6").value=="") mensaje+="  - Categorias\n";
        if (document.getElementById("variable7").value=="") mensaje+="  - Imagen\n";
        if (document.getElementById("variable8").value=="") mensaje+="  - Sonido\n";
        
				if (mensaje!="") {
					alert("Atencion, Faltan Datos:\n\n"+mensaje);
          
 			    }else {
          var cuenta;
          var variable0=document.getElementById("variable0_1").value;
          var variable1=document.getElementById("variable5").value;
          var variable2=document.getElementById("variable6").value;
          if (variable0==""){
            cuenta=5;    
            document.getElementById("accion1").value=5;
            document.getElementById("contactForm2").submit();
          }else{
            cuenta=6;
            document.getElementById("accion1").value=6;
            document.getElementById("contactForm2").submit();
          }                              
        }
			}



      function titulares_datos(tit_cod,tit_nom,tit_fec) 		
        {
        
				  var variable0=document.getElementById("variable0").value=tit_cod;
          var variable1=document.getElementById("variable1").value=tit_nom;
          var variable2=document.getElementById("variable2").value=tit_fec;
                              
          
        }
			        

      function titulares_datos_app(tit_cod,tit_nom,tit_fec) 		
        {
        
				  var variable0=document.getElementById("variable0_2").value=tit_cod;
          var variable1=document.getElementById("variable1_1").value=tit_nom;
          var variable2=document.getElementById("variable2_1").value=tit_fec;
                              
          
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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">WEBTEA</a>
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?echo $usu_nom?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ml-auto">
            <?php
                $sel="select * from menu_det where borrado='0' order by med_ord";
	              $rs=mysql_query($sel);                	              
            for ($i = 0; $i < mysql_num_rows($rs); $i++) {
                $med_cod=mysql_result($rs,$i,"med_cod");
                $med_des=mysql_result($rs,$i,"med_des");
                $med_dir=mysql_result($rs,$i,"med_dir");
            ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?echo $med_dir?>"><?echo $med_des?></a>
            </li>
             <?php
               }               
             ?>
          </ul>



        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <img class="img-fluid" src="../img/profile1.png" alt="">
        <div class="intro-text">
          <span class="name">PANEL DE CONTROL</span>
          <hr class="star-light">
          <span class="skills">Bienvenido al panel de control, usted podra personalizar las opciones dentro de la app</span>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>      
    </header>

    <!-- titular Section -->
    <section id="titular">
      <div class="container">
        <h2 class="text-center">Registre al titular</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate >
              <div class="control-group">
               <input id="variable0" name="variable0" value="" type="hidden" readonly>

                <div class="form-group floating-label-form-group controls">
                  <label>Nombre y Apellido</label>
                  <input class="form-control" id="variable1" name="variable1" value="" type="text" placeholder="Nombre y apellido" required data-validation-required-message="Introdusca Nombre y apellido.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Fecha de Nacimiento</label>
                  <input class="form-control" id="variable2" name="variable2" value="" type="text" placeholder="Fecha Nac.: Ej. 2001-03-01" required data-validation-required-message="Intrudusca Fecha de Nac.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>              
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="button" class="btn btn-success btn-lg" id="sendMessageButton"><a href="javascript:titulares()" class="nounderline">Registrar/modificar</a></button>
              </div>
            
            <fieldset>
              <legend>Modificar Titulares</legend>
                <?php 
                
                $sel="select * from titulares where borrado='0' and usuario='$usu_cod'";
	              $rs=mysql_query($sel);                
	              $cuenta=mysql_num_rows($rs);
                 $j=1;   
                  for ($i = 0; $i < mysql_num_rows($rs); $i++) {
                   $tit_cod=mysql_result($rs,$i,"tit_cod");
                   $tit_nom=mysql_result($rs,$i,"tit_nom");
                   $tit_fec=mysql_result($rs,$i,"tit_fec");
                   
                ?>
                <label><a href="javascript:titulares_datos('<?php echo $tit_cod ?>','<?php echo $tit_nom ?>','<?php echo $tit_fec ?>')" class="nounderline"> <?echo $j."- ".$tit_nom?></a></label> <br>                
               <?php
                   $j++;
                  }
               ?>
           
           </fieldset>
            
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- titular Categorias -->
    <section id="categoria">
      <div class="container">
        <h2 class="text-center">Registre Categorias</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage1" id="contactForm1" method="post" action="guardar.php" enctype="multipart/form-data" novalidate >
                <input id="variable0_0" name="variable0_0" value="" type="hidden" readonly>
                <input id="accion" name="accion" value="" type="hidden" readonly>
                
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Introdusca Categoria</label>
                  <input class="form-control" id="variable3" name="variable3" type="text" placeholder="Introdusca Categoria" required data-validation-required-message="Introdusca Categoria.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Seleccionar Imagen</label>                
                  Adjuntar Imagen: <input class="form-control" type="file" name="variable4" id="variable4" accept="image/jpg" />
                  <p class="help-block text-danger"></p>
                </div>
              </div>              
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="button" class="btn btn-success btn-lg" id="sendMessageButton"><a href="javascript:categorias()" class="nounderline" >Guardar</a></button>                                
              </div>
          <fieldset>
              <legend>Modificar Categorias</legend>
                <?php 
                
                $sel="select * from categorias where borrado='0' and usuario='$usu_cod' or usuario=0 order by cat_des";
	              $rs=mysql_query($sel);                
	              $cuenta=mysql_num_rows($rs);
                 $j=1;   
                  for ($i = 0; $i < mysql_num_rows($rs); $i++) {
                   $cat_cod=mysql_result($rs,$i,"cat_cod");
                   $cat_des=mysql_result($rs,$i,"cat_des");
                   $cat_img=mysql_result($rs,$i,"cat_img");
                   $cat_par=mysql_result($rs,$i,"cat_par");
                   
                ?>
                <label><a href="javascript:categorias_datos('<?php echo $cat_cod ?>','<?php echo $cat_des ?>','<?php echo $cat_img ?>','<?php echo $cat_par ?>')" class="nounderline"> <?echo $j."- ".$cat_des?></a></label> <br>                
               <?php
                   $j++;
                  }
               ?>           
           </fieldset>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- titular Subcategorias -->
    <section id="subcategoria">
      <div class="container">
        <h2 class="text-center">Sub Categorias</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage2" id="contactForm2" method="post" action="guardar.php" enctype="multipart/form-data" novalidate >
                <input id="variable0_1" name="variable0_1" value="" type="hidden" readonly>
                <input id="accion1" name="accion1" value="" type="hidden" readonly>
  
	             <?php
					       $query="SELECT * FROM categorias where borrado='0' and usuario='$usu_cod' or usuario=0 order by cat_des";
						     $res=mysql_query($query);
						     $contador=0;
					       ?>						
              
              
               <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Sub Categorias</label>
                  <input class="form-control" id="variable5" name="variable5" type="text" placeholder="Sub Categoria" required data-validation-required-message="Subcategoria.">
                   <br> 
                    Elegir Categoria:<select id="variable6" name="variable6">
							  	    <option value=""></option>
								        <?php
								        while ($contador < mysql_num_rows($res)) { ?> 
								          <option value="<?php echo mysql_result($res,$contador,"cat_cod")?>"><?php echo strtoupper(mysql_result($res,$contador,"cat_des"))?></option>
								          <?php $contador++;
								          } ?>				                   
                     </select>
                  
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Seleccionar Imagen</label>                
                  Adjuntar Imagen:<input class="form-control" type="file" name="variable7" id="variable7" accept="image/jpeg"/>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Seleccionar Sonido</label>                
                  Adjuntar Sonido:<input class="form-control" type="file" name="variable8" id="variable8" accept="audio/mpeg"/>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
                            
              <br>
              <div id="success"></div>
              <div class="form-group">
                 <button type="button" class="btn btn-success btn-lg" id="sendMessageButton"><a href="javascript:sub_categorias()" class="nounderline" >Guardar</a></button>                
              </div>
              
          <fieldset>
              <legend>Modificar SubCategorias</legend>
                <?php 
                
                $sel="select *,(select cat_des from categorias where cat_cod=sub_categorias.cat_cod) as cat_des 
                from sub_categorias where borrado='0' and usuario='$usu_cod'";
	              $rs=mysql_query($sel);                
	              $cuenta=mysql_num_rows($rs);
                 $j=1;   
                  for ($i = 0; $i < mysql_num_rows($rs); $i++) {
                   $sub_cod=mysql_result($rs,$i,"sub_cod");
                   $sub_des=mysql_result($rs,$i,"sub_des");
                   $sca_cod=mysql_result($rs,$i,"cat_cod");
                   $sca_des=mysql_result($rs,$i,"cat_des");
                   
                ?>
                <label><a href="javascript:sub_categorias_datos('<?php echo $sub_cod ?>','<?php echo $sub_des ?>','<?php echo $sca_cod ?>')" class="nounderline"> <?echo $j."- ".$sub_des." / ".$sca_des?></a></label> <br>                
               <?php
                   $j++;
                  }
               ?>           
           </fieldset>
              
              
            </form>
          </div>
        </div>
      </div>
    </section>


    <!-- titular app Section -->
    <section id="titular_app">
      <div class="container">
        <h2 class="text-center">Seleccione Titular</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate >
              <div class="control-group">
               <input id="variable0_2" name="variable0_2" value="" type="hidden" readonly>
                <div class="form-group floating-label-form-group controls">
                  <label>Nombre y Apellido</label>
                  <input class="form-control" id="variable1_1" name="variable1_1" value="" type="text" placeholder="Nombre y apellido" required data-validation-required-message="Introdusca Nombre y apellido." readonly="yes">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Fecha</label>
                  <input class="form-control" id="variable2_1" name="variable2_1" value="<?echo $fecha;?>" type="text" placeholder="Fecha Nac." required data-validation-required-message="Intrudusca Fecha">
                  <p class="help-block text-danger"></p>
                </div>
              </div>              
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="button" class="btn btn-success btn-lg" id="sendMessageButton"><a href="javascript:titulares_app()" class="nounderline">Ejecutar App</a></button>
                <button type="button" class="btn btn-success btn-lg" id="sendMessageButton"><a href="javascript:titulares_app_informe()" class="nounderline">Informe</a></button>
              </div>
            
            <fieldset>
              <legend>Titulares</legend>
                <?php 
                $sel="select * from titulares where borrado='0' and usuario='$usu_cod'";
	              $rs=mysql_query($sel);                
	              $cuenta=mysql_num_rows($rs);
                 $j=1;   
                  for ($i = 0; $i < mysql_num_rows($rs); $i++) {
                   $tit_cod=mysql_result($rs,$i,"tit_cod");
                   $tit_nom=mysql_result($rs,$i,"tit_nom");
                   $tit_fec=$fecha;//mysql_result($rs,$i,"tit_fec");
                   
                ?>
                <label><a href="javascript:titulares_datos_app('<?php echo $tit_cod ?>','<?php echo $tit_nom ?>','<?php echo $tit_fec ?>')" class="nounderline"> <?echo $j."- ".$tit_nom?></a></label> <br>                
               <?php
                   $j++;
                  }
               ?>           
           </fieldset>
            
            </form>
          </div>
        </div>
      </div>
    </section>


    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
              <h3>Direccion</h3>
              <p>10 de Agosto c/ Cnel Romero
                <br>Asuncion-Paraguay
                <br>Telefono: +595921 220 226
                </p>
            </div>
            <div class="footer-col col-md-4">
              <h3>Nuestras Redes Sociales</h3>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-linkedin"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-dribbble"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="footer-col col-md-4">
              <h3>Soporte Tecnico</h3>
              <p>soporte@webtea.com.py</p>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; webtea 2017
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