<?php 
require "../conexion1.php";
require "../conexion.php";
$idm =$_POST['idm'];
$idma =$_POST['idma'];

echo $idma;

$sql=mysqli_query($conexion1,"SELECT * FROM materias WHERE idMa='$idm'");
$a=mysqli_fetch_array($sql);
$aa=$a[0];
$b=$a[1];
$c=$a[3];
$d=$a[4];


mysqli_query($conexion,"INSERT INTO materias(idMa,Nombre,Cant,idG,idM,2idM,Role) VALUES('$aa','$b','1','$c','$idma','$idma','0') ");

 ?>