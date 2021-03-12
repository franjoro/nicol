<?php 
require "../conexion1.php";
require "../conexion.php";
$ida =$_POST['ida'];
$idg =$_POST['idg'];


if ($idg=='nop') {
	echo "Alumno no insertado";
}else{
 $sql=mysqli_query($conexion1,"SELECT * FROM estudiantes WHERE IdEs='$ida'");
$a=mysqli_fetch_array($sql);
$aa=$a[0];
$d=$a[1];
$c=$a[2];
$e=$a[3];
$f=$a[4];


 mysqli_query($conexion,"INSERT INTO estudiantes(IdEs,Nombre,Apellido,Genero,IdG) VALUES('$aa','$d','$c','$e','$idg') ");
echo mysqli_error($conexion1);
 $contra = md5($aa);
 mysqli_query($conexion,"INSERT INTO users(Username,Password,Role,acceso) VALUES('$aa','$contra','4','1') ");

}

 ?>