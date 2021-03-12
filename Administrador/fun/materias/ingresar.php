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

if (isset($_POST['maestro1'])) {
	$d=$_POST['maestro1'];
}else{
	$d=$_POST['maestro'];
}

if (isset($_POST['BimestreRole'])) {
	$ee=$_POST['BimestreRole'];

}else{
	$ee=0;
	
}


$e =$_POST['name'];
$sql = mysqli_query($conexion,"INSERT INTO materias(idMa,Nombre,Cant,idG,idM,2idM,Role) VALUES('$a','$e','$op','$b','$c','$d','$ee') ");

	if ($sql) {
	echo "<script>alert('Materia insertada correctamente')</script>";
}else{
	$error=mysqli_error($conexion);
	echo "<script>alert('Materia no insertada, por favor revisar sección de errores.')".$error."</script>";
	echo $error;
}
echo "<script>location.href='../../materia.php' </script>";
 ?>