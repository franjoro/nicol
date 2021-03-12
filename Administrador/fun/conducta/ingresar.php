<?php 
require("../../../conexion.php");
$a =$_POST['cod'];
$b =$_POST['option'];
$id=$_POST['id'];

$sql = mysqli_query($conexion,"INSERT INTO codigo(idCodigo,Codigo,valor) VALUES('$id','$a','$b') ");

	if ($sql) {
	echo "<script>alert('Código agregado correctamente')</script>";
}else{
	echo "<script>alert('Código no insertado, por favor revisar id existente o errores.')</script>";
}
echo "<script>location.href='../../conducta.php' </script>";
 ?>