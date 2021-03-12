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
	$puesto =$datos[1] ;
	$ape = $datos[2];
	$name =$datos[3];
	$gen = $datos[4];
	$correo = $datos[5];
	// echo $codigo;
	// echo $grado;
	// echo $ape;
	// echo $name;
	// echo $gen."<br>";
	$sql = mysqli_query($conexion,"INSERT INTO maestros(idM,Nombre,Apellido,Genero,Puesto,Correo) VALUES('$codigo','$name','$ape','$gen','$puesto','$correo') ");
	$d= md5($codigo);
	$sql2 = mysqli_query($conexion,"INSERT INTO users(Username,Password,Role) VALUES('$codigo','$d','3') ");
	}
}

fclose($fp);
rename($destino,$carpeta.$date.".csv");
if ($sql) {
	echo "<script>alert('Maestro insertado correctamente')</script>";
}else{
	echo "<script>alert('Maestro no insertados o ya existentes')</script>";
}
echo "<script>location.href='../../maestros.php' </script>";
 ?>