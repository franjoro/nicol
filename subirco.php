<?php 
require("conexion.php");
date_default_timezone_set('America/Nicaragua');
$date = date("d-m-Y-g-i");
$carpeta="archivos/";
opendir($carpeta);
$destino = $carpeta .$_FILES ['file']['name'];
copy($_FILES ['file']['tmp_name'], $destino);


if (file_exists($destino)) {
	$fp= fopen($destino, "r");

	while ($datos =fgetcsv($fp,1000,";")) {
	$codigo = $datos[0];
	$name =$datos[1] ;
	$nose = $datos[2];
	echo $codigo;
	// echo $grado;
	// echo $m1;
	echo $name;
	echo $nose;
	// echo $m2."<br>";
	$sql = mysqli_query($conexion,"INSERT INTO codigo(idCodigo,Codigo,valor) VALUES('$codigo','$name','$nose') ");

	
	}
}

fclose($fp);
rename($destino,$carpeta.$date.".csv");
if ($sql) {
	echo "<script>alert('Alumno insertado correctamente')</script>";
}else{
	echo "<script>alert('Alumnos no insertados o ya existentes')</script>";
}
// echo "<script>location.href='../../estudiantes.php' </script>";
 
?>
