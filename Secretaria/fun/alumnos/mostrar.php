<?php 
require("../../../conexion.php");
date_default_timezone_set('America/El_Salvador');
$date = date("d-m-Y-g-i");
$carpeta="archivos/";
opendir($carpeta);
$destino = $carpeta .$_FILES ['file']['name'];
copy($_FILES ['file']['tmp_name'], $destino);


if (file_exists($destino)) {
	$fp= fopen($destino, "r");

	while ($datos =fgetcsv($fp,1000,";")) {
	$codigo = $datos[0];
	$grado =$datos[1] ;
	$ape = utf8_encode($datos[2]);
	$name =utf8_encode($datos[3]);
	$gen = $datos[4];
	// echo $codigo;
	// echo $grado;
	// echo $ape;
	// echo $name;
	// echo $gen."<br>";
	$sql = mysqli_query($conexion,"INSERT INTO estudiantes(IdEs,Nombre,Apellido,Genero,IdG) VALUES('$codigo','$name','$ape','$gen','$grado') ");
	$d= md5($codigo);
	$sql2 = mysqli_query($conexion,"INSERT INTO users(Username,Password,Role) VALUES('$codigo','$d','4') ");
	}
}

fclose($fp);
rename($destino,$carpeta.$date.".csv");
if ($sql) {
	echo "<script>alert('Alumno insertado correctamente')</script>";
}else{
	echo "<script>alert('Alumnos no insertados o ya existentes')</script>";
}
echo "<script>location.href='../../estudiantes.php' </script>";
 ?>