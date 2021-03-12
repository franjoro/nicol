<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$b= $_POST["nota"];

$sql= mysqli_query($conexion,"UPDATE notas SET Nota='$b' WHERE idNota='$id'");

if ($sql) {
	echo "<script>alert('Nota modificada correctamente')</script>";
}else{
	echo "<script>alert('Nota no modificada.')</script>";
}
echo "<script>location.href='../../notas.php' </script>";
 ?>