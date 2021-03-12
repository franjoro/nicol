<?php 
require("../../../conexion.php");

$a =$_POST['codigo'];
$b =$_POST['option'];
$c = utf8_encode($_POST['apellido']);
$d = utf8_encode($_POST['nombre']);
$e =$_POST['option1'];


$contra = md5($a);
	$sql = mysqli_query($conexion,"INSERT INTO estudiantes(IdEs,Nombre,Apellido,Genero,IdG) VALUES('$a','$d','$c','$e','$b') ");
	

	if ($sql) {
	echo "<script>alert('Alumnos insertados correctamente')</script>";
	$sql2 = mysqli_query($conexion,"INSERT INTO users(Username,Password,Role,acceso) VALUES('$a','$contra','4','1') ");
}else{
	echo "<script>alert('Alumnos no insertado.')</script>";
}
echo "<script>location.href='../../estudiantes.php' </script>";
 ?>