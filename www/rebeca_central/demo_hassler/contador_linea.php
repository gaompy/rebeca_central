<?php
function listar_directorios_ruta($ruta){ 


   // abrir un directorio y listarlo recursivo 
   if (is_dir($ruta)) { 
      if ($dh = opendir($ruta)) { 
         while (($file = readdir($dh)) !== false) { 
            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
            //mostraría tanto archivos como directorios 
            echo "<br>Nombre de archivo: $file ";//: Es un: " . filetype($ruta . $file);

            $archivo = fopen ($ruta."/".$file, "r");
            $num_lineas = 0; 
            $caracteres = 0; 
                //Hago un bucle para recorrer el archivo línea a línea hasta el final del archivo 
                while (!feof ($archivo)) { 
                //si extraigo una línea del archivo y no es false 
                  if ($linea = fgets($archivo)){ 
      	         //acumulo una en la variable número de líneas 
                  $num_lineas++; 
      	        //acumulo el número de caracteres de esta línea 
      	           $caracteres += strlen($linea); 
                } 
              } 
              fclose ($archivo); 
              echo "
              Líneas: " . $num_lineas; 
              echo "
              Caracteres: " . $caracteres;   

             
            if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
               //solo si el archivo es un directorio, distinto que "." y ".." 
               echo "<br>Directorio: $ruta$file"; 
            listar_directorios_ruta($ruta . $file . "/"); 
               
            } 
         } 
      closedir($dh); 
      } 
   }else{ 
}
}
$archivo=listar_directorios_ruta("./facturacion");

  /*
$archivo1=listar_directorios_ruta("./facturacion");
$archivo = fopen ($archivo1, "r"); 

$num_lineas = 0; 
$caracteres = 0; 

//Hago un bucle para recorrer el archivo línea a línea hasta el final del archivo 
while (!feof ($archivo)) { 
    //si extraigo una línea del archivo y no es false 
    if ($linea = fgets($archivo)){ 
      	//acumulo una en la variable número de líneas 
       $num_lineas++; 
      	//acumulo el número de caracteres de esta línea 
      	$caracteres += strlen($linea); 
    } 
} 
fclose ($archivo); 
echo "
Líneas: " . $num_lineas; 
echo "
Caracteres: " . $caracteres; */  
?>

<?php    /*
$directorio = opendir("../syspymes_baratodo"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo $archivo . "<br />";
    }
}          */
?>

<? 
/*
//abro el archivo para lectura 
$archivo = fopen ("index.php", "r"); 

//inicializo una variable para llevar la cuenta de las líneas y los caracteres 
$num_lineas = 0; 
$caracteres = 0; 

//Hago un bucle para recorrer el archivo línea a línea hasta el final del archivo 
while (!feof ($archivo)) { 
    //si extraigo una línea del archivo y no es false 
    if ($linea = fgets($archivo)){ 
      	//acumulo una en la variable número de líneas 
       $num_lineas++; 
      	//acumulo el número de caracteres de esta línea 
      	$caracteres += strlen($linea); 
    } 
} 
fclose ($archivo); 
echo "
Líneas: " . $num_lineas; 
echo "
Caracteres: " . $caracteres;   */
?>