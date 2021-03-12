<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$b= $_POST["name"];
$c =$_POST["maestro"];
$d = $_POST["maestro2"];
$sql= mysqli_query($conexion,"UPDATE materias SET idM='$c', 2idM='$d', Nombre='$b' WHERE idMa='$id'");


if ($sql) {
	echo "<script>alert('Materia modificada correctamente')</script>";
}else{
	echo "<script>alert('Materia no modificado.')</script>";
}
echo "<script>location.href='../../materia.php' </script>";
 ?>