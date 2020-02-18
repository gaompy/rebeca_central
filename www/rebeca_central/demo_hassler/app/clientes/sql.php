<?Php
 $db=$_SESSION["db"];
 
		if(file_exists ($db."_".$usuario.".dat")) {

			unlink($db."_".$usuario.".dat");
		}
		else {

		}

$archivo = $db."_".$usuario.".dat";
$fp = fopen($archivo, "a");
$string = $sel_resultado;
$write = fputs($fp, $string);
fclose($fp); 

?>