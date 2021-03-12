<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$b= $_POST["option"];
$c =$_POST["apellido"];
$d = $_POST["nombre"];
$sql= mysqli_query($conexion,"UPDATE estudiantes SET Nombre='$d', Apellido='$c', IdG='$b' WHERE IdEs='$id'");


if ($sql) {
	echo "<script>alert('Alumno modificado correctamente')</script>";
}else{
	echo "<script>alert('Alumno no modificado.')</script>";
}
echo "<script>location.href='../../estudiantes.php' </script>";
 ?>