<?php 
require("../../../conexion.php");
$a =$_POST['cod'];
$b =$_POST['option'];

$sql = mysqli_query($conexion,"INSERT INTO codigo(Codigo,valor) VALUES('$a','$b') ");

	if ($sql) {
	echo "<script>alert('Código agregado correctamente')</script>";
}else{
	echo "<script>alert('Código no insertado, por favor revisar sección de errores.')</script>";
}
echo "<script>location.href='../../conducta.php' </script>";
 ?>