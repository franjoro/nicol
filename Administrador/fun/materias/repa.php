<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$b= $_POST["repa"];

$sql= mysqli_query($conexion,"UPDATE materias SET Role='$b' WHERE idMa='$id'");


if ($sql) {
	echo "<script>alert('Peíodo de reparación editado')</script>";
}else{
	echo "<script>alert('Error.')</script>";
}
echo "<script>location.href='../../materia.php' </script>";
 ?>