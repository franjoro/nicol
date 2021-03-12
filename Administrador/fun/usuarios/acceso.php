<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$b= $_POST["ac"];
if ($b=="si") {
$sql= mysqli_query($conexion,"UPDATE users SET acceso='1' WHERE idU='$id'");
	# code...
}else{
$sql= mysqli_query($conexion,"UPDATE users SET acceso='0' WHERE idU='$id'");
}

if ($sql) {
	echo "<script>alert('Usuario modificado correctamente')</script>";
}else{
	echo "<script>alert('Usuario no modificado.')</script>";
}
echo "<script>location.href='../../usuarios.php' </script>";
 ?>