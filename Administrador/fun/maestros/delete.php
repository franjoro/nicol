<?php 
require("../../../conexion.php");
$id = $_GET["id"];

$sql= mysqli_query($conexion,"DELETE FROM maestros WHERE idM='$id'");
$sql= mysqli_query($conexion,"DELETE FROM users WHERE Username='$id'");

if ($sql) {
	echo "<script>alert('Maestro eliminado correctamente')</script>";
}else{
	echo "<script>alert('Maestro no elimniado.')</script>";
}
echo "<script>location.href='../../maestros.php' </script>";
 ?>