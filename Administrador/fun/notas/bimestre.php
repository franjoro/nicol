<?php 
require("../../../conexion.php");
$sql=mysqli_query($conexion,"UPDATE bimestre SET id=id+1 ");

if ($sql) {
	echo "<script>alert('Bimestre actualizado')</script>";
}else{
	echo "<script>alert('Error')</script>";
}
echo "<script>location.href='../../notas.php' </script>";
 ?>