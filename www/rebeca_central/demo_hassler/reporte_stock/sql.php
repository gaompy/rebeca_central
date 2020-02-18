
<?Php
		if(file_exists ("tmp_$usuario.dat")) {

			unlink("tmp_$usuario.dat");
		}
		else {

		}

$archivo = "tmp_$usuario.dat";
$fp = fopen($archivo, "a");
$string = $sel_resultado;
$write = fputs($fp, $string);
fclose($fp); 



?>