<?php 
require("../../../conexion.php");
$id = $_GET["id"];

$sql= mysqli_query($conexion,"DELETE FROM estudiantes WHERE IdEs='$id'");
$sql= mysqli_query($conexion,"DELETE FROM users WHERE Username='$id'");

if ($sql) {
	echo "<script>alert('Alumno eliminado correctamente')</script>";
}else{
	echo "<script>alert('Alumno no elimniado.')</script>";
}
echo "<script>location.href='../../estudiantes.php' </script>";
 ?>