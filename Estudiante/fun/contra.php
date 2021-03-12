<?php 
require("../../conexion.php");
$id = $_GET["id"];
$b= $_POST["contra"];
$contra =md5($b);
$sql= mysqli_query($conexion,"UPDATE users SET Password='$contra' WHERE Username='$id'");


if ($sql) {
	echo "<script>alert('Contraseña actualizada, no la olvides')</script>";
}else{
	echo "<script>alert('Contraseña no actualizada')</script>";
}
echo "<script>location.href='../index.php' </script>";
 ?>