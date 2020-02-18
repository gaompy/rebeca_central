<?php
@session_start();
@$_SESSION["niv_cod"];
@$niv_cod=$_SESSION["niv_cod"];
@$form=$_SESSION["form"];
@$mec_cod=$_SESSION["mec_cod"];
@$query="select * from permisos where niv_cod='$niv_cod' and med_cod='$form' and mec_cod='$mec_cod'";
@$rs=mysql_query($query);
@$consulta=mysql_result($rs,0,"per_con");
@$impresion=mysql_result($rs,0,"per_imp");
@$modificar=mysql_result($rs,0,"per_mod");
@$insertar=mysql_result($rs,0,"per_agr");
@$eliminar=mysql_result($rs,0,"per_eli");

if (@$niv_cod <> ""){
		
		if ($consulta=='on'){
       
       if (@$impresion=='on'){
   			@$imp='0';
				}else{
           	@$imp='1';
			}
      
      if (@$insertar=='on'){
   			@$ins='0';
				}else{
           	@$ins='1';
			}
      	
        if (@$modificar=='on'){
   			@$mod='0';
				}else{
           	@$mod='1';
			}
       	
         if (@$eliminar=='on'){
   			@$eli='0';
				}else{
           	@$eli='1';
			}
            
				}else{
	
			?>
			<script language="javascript">			
			
				alert ("No Tiene permisos para ejecutar este programa!");
        location.href="../central.php";
      

			</script>
      
		<?php 

    }
    }   else {
    
   	?>
			<script language="javascript">			
			
				alert ("La sesion se ha cerrado!");
        location.href="../index.php";

			</script>
      
		<?php  
    }
    ?>