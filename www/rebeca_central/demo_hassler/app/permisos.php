<?php
@session_start();
@$_SESSION["niv_cod"];
@$niv_cod=$_SESSION["niv_cod"];
@$form=$_SESSION["form"];
@$mec_cod=$_SESSION["mec_cod"];
@$query="select * from permisos where niv_cod='$niv_cod' and med_cod='$form'";
@$rs=mysql_query($query);
@$consulta=mysql_result($rs,0,"per_con");
@$impresion=mysql_result($rs,0,"per_imp");
@$modificar=mysql_result($rs,0,"per_mod");
@$insertar=mysql_result($rs,0,"per_agr");
@$eliminar=mysql_result($rs,0,"per_eli");
@$nivel=mysql_result($rs,0,"niv_cod");

if (@$niv_cod <> ""){
		
		if ($consulta=='0'){
       
       if (@$impresion=='0'){
   			@$imp='0';
				}else{
           	@$imp='1';
			  }
      
      if (@$insertar=='0'){
   			@$ins='0';
				}else{
           	@$ins='1';
			  }
      	
        if (@$modificar=='0'){
   			@$mod='0';
				}else{
           	@$mod='1';
			  }
       	
         if (@$eliminar=='0'){
   			@$eli='0';
				}else{
           	@$eli='1';
			  }
        
        
            
				}else{
	
        $direccion="../menu/central.php";
        $tiempo="2000";
        $mensaje="No tiene permisos para ejecutar este aplicacion!";
        header("Location:../mensaje/index.php?direccion=$direccion&tiempo=$tiempo&mensaje=$mensaje");

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