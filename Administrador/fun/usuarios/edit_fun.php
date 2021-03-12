<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$b= $_POST["contra"];
$contra =md5($b);
$sql= mysqli_query($conexion,"UPDATE users SET Password='$contra' WHERE idU='$id'");


if ($sql) {
	echo "<script>alert('Usuario modificado correctamente')</script>";
}else{
	echo "<script>alert('Usuario no modificado.')</script>";
}
echo "<script>location.href='../../usuarios.php' </script>";
 ?>