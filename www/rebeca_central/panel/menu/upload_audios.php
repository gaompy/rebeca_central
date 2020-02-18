<?php
       
        
          $status = "";
          // obtenemos los datos del archivo
          $tamano = $_FILES["variable8"]['size'];
          $tipo = $_FILES["variable8"]['type'];
          //$archivo1 = $_FILES["foto"]['name'];          
		  		$archivo = "mp3";
          $prefijo = $variable_max;         
            if (($archivo=='') or ($tipo =='')) {
                  $status = "No ha Incluido Foto";
               }               
               else {                      
              // guardamos el archivo a la carpeta files
              $destino =  "../img/portfolio/audios/".$prefijo.".".$archivo;
              $nombre_archivo=$prefijo.".".$archivo;
              if (copy($_FILES['variable8']['tmp_name'],$destino)) {
          
                  $status = "Archivo subido: <b>".$archivo."</b>";
              } else {
                 $status = "Error al subir el archivo";
  
              }
            } 
?>