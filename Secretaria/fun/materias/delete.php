<?php 
require("../../../conexion.php");
$id = $_GET["id"];

$sql= mysqli_query($conexion,"DELETE FROM materias WHERE idMa='$id'");


if ($sql) {
	echo "<script>alert('Materia eliminada correctamente')</script>";
}else{
	echo "<script>alert('Materia no elimniado.')</script>";
}
echo "<script>location.href='../../materia.php' </script>";
 ?>