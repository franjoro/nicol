<?php 
require("../../../conexion.php");

$a =$_POST['codigo'];
$b =$_POST['correo'];
$c =$_POST['apellido'];
$d =$_POST['nombre'];
$e =$_POST['option1'];
$f =$_POST['pu'];
$g =$_POST['grado'];


$contra = md5($a);
	$sql = mysqli_query($conexion,"INSERT INTO maestros(idM,Nombre,Apellido,Genero,Puesto,Correo,IdG) VALUES('$a','$d','$c','$e','$f','$b','$g') ");
	

	if ($sql) {
	echo "<script>alert('Maestro ingresado correctamente')</script>";
	$sql2 = mysqli_query($conexion,"INSERT INTO users(Username,Password,Role,acceso) VALUES('$a','$contra','3','1') ");
}else{
	echo "<script>alert('maestro no insertado.')</script>";
}
echo "<script>location.href='../../maestros.php' </script>";
 ?>