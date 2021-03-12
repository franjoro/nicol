<?php 
require("../../../conexion.php");


$a = $_POST['cod'];
$b=$_POST['grado'];
$c=$_POST['sec'];




$sql = mysqli_query($conexion,"INSERT INTO grados(idG,Nombre,Seccion) VALUES('$a','$b','$c') ");

	if ($sql) {
	echo "<script>alert('Grado insertado correctamente')</script>";
}else{
	echo "<script>alert('Grado no insertado, por favor revisar sección de errores.')</script>";
}
echo "<script>location.href='../../grados.php' </script>";
 ?>