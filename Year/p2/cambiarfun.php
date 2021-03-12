<?php 
require "../conexion1.php";
require "../conexion.php";
$id =$_POST['id'];
$sql=mysqli_query($conexion1,"SELECT * FROM maestros WHERE idM='$id'");
$a=mysqli_fetch_array($sql);
$aa=$a[0];
$d=$a[1];
$c=$a[2];
$e=$a[3];
$f=$a[4];
$b=$a[5];
$g=$a[6];

mysqli_query($conexion,"INSERT INTO maestros(idM,Nombre,Apellido,Genero,Puesto,Correo,IdG) VALUES('$aa','$d','$c','$e','$f','$b','$g') ");

$contra = md5($aa);
mysqli_query($conexion,"INSERT INTO users(Username,Password,Role,acceso) VALUES('$aa','$contra','3','1') ");

echo "Maestro ingresado";
 ?>