<?php 
require("../../../conexion.php");
$id = $_GET["id"];


$sql= mysqli_query($conexion,"DELETE  FROM users WHERE idU='$id'");

if ($sql) {
	echo "<script>alert('Usuario eliminado correctamente')</script>";
}else{
	echo "<script>alert('Usuario no elimniado.')</script>";
}
echo "<script>location.href='../../usuarios.php' </script>";
 ?>