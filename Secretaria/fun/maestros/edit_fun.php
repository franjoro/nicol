<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$c =$_POST["correo"];
$d = $_POST["apellido"];
$e = $_POST["nombre"];
$f = $_POST["puesto"];
$sql= mysqli_query($conexion,"UPDATE maestros SET Nombre='$e', Apellido='$d', Puesto='$f', Correo='$c' WHERE idM='$id'");


if ($sql) {
	echo "<script>alert('Maestro modificado correctamente')</script>";
}else{
	echo "<script>alert('Maestro no modificado.')</script>";
}
echo "<script>location.href='../../maestros.php' </script>";
 ?>