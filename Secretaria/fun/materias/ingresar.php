<?php 
require("../../../conexion.php");
if (isset($_POST['opcion'])) {
$op =2;
}else{
$op =1;
}

$a =$_POST['cod'];
$b =$_POST['option'];
$c =$_POST['maestro'];
$d =$_POST['maestro1'];
$e =$_POST['name'];
$sql = mysqli_query($conexion,"INSERT INTO materias(idMa,Nombre,Cant,idG,idM,2idM) VALUES('$a','$e','$op','$b','$c','$d') ");

	if ($sql) {
	echo "<script>alert('Materia insertada correctamente')</script>";
}else{
	echo "<script>alert('Materia no insertada, por favor revisar sección de errores.')</script>";
}
echo "<script>location.href='../../materia.php' </script>";
 ?>