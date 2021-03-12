<?php 
require("../../../conexion.php");

$a =$_POST['user'];
$b =$_POST['contra'];
$d = md5($b);

$sql1=mysqli_query($conexion,"SELECT COUNT(Username) FROM users WHERE Username='$a' ");
$row =mysqli_fetch_array($sql1);
if ($row[0]>=1) {
	echo "<script>alert('Usuario administrativo ya existente')</script>";
}else{

	$sql = mysqli_query($conexion,"INSERT INTO users(Username,Password,Role,acceso) VALUES('$a','$d','2','1') ");

	if ($sql) {
	echo "<script>alert('Usuario administrativo insertados correctamente')</script>";
}else{
	echo "<script>alert('Usuario administrativo no insertado.')</script>";
}}
echo "<script>location.href='../../usuarios.php' </script>";
 ?>