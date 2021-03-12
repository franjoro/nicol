<?php 
require("conexion.php");
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
	$name =$datos[1] ;
	$nose = $datos[2];
	$grado =$datos[3];
	$m1 = $datos[4];
	$m2 = $datos[5];
	echo $codigo;
	echo $grado;
	echo $m1;
	echo $name;
	echo $m2."<br>";
	$sql = mysqli_query($conexion,"INSERT INTO materias(idMa,Nombre,Cant,idG,idM,2idM) VALUES('$codigo','$name','$nose','$grado','$m1','$m2') ");

	echo "<script>alert('vgbhnjkm,')</script>";
	}
}

fclose($fp);
rename($destino,$carpeta.$date.".csv");
$error =mysqli_error($conexion);
if ($sql) {
	echo "<script>alert('Alumno insertado correctamente')</script>";
}else{
	echo "<script>alert('Alumnos no insertados o ya existentes')</script>".$error;
	echo "<script>alert('".$error."')</script>";
}
// echo "<script>location.href='../../estudiantes.php' </script>";
 
?>
