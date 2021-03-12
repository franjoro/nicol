<?php 
require("../../../conexion.php");
session_start();
$usu = $_SESSION['username'];  
// Sesion
$id=$_GET["id"];
$ma=$_GET['ma'];
//estudiante
$sqll=mysqli_query($conexion,"SELECT * FROM bimestre");
$rowbi=mysqli_fetch_array($sqll);
$bimestre=$rowbi[0];

$b=$_POST['des'];
$date=date("d/m/y");
$query=mysqli_query($conexion,"INSERT INTO aplicados(Descripcion,IdEs,idM,Role,fecha,bimestre) VALUES('$b','$id','$usu','0','$date',$bimestre) ") ;

if ($query) {
	echo "<script>alert('Observación ingresado correctamente')</script>";
	echo "<script>location.href='../codigos.php?id=".$ma."' </script>";

}else{
	echo "<script>alert('Observación no insertado.')</script>";
}

 ?>