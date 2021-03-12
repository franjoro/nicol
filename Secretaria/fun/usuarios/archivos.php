<?php 
require("../../../conexion.php");
date_default_timezone_set('America/El_Salvador');
$date = date("d-m-Y-g-i");
$carpeta="archivos/";
opendir($carpeta);
$destino = $carpeta .$_FILES ['file']['name'];
copy($_FILES ['file']['tmp_name'], $destino);


if (file_exists($destino)) {
	$fp= fopen($destino, "r");

	while ($datos =fgetcsv($fp,1000,";")) {
	$username = $datos[0];
	$acceso =$datos[1] ;

	$sql = mysqli_query($conexion,"UPDATE users SET acceso='$acceso' WHERE Username='$username' ");

	}
}

fclose($fp);
rename($destino,$carpeta.$date.".csv");
if ($sql) {
	echo "<script>alert('usuarios modificados correctamente')</script>";
}else{
	echo "<script>alert('usuarios no modificados revisar problema')</script>";
}
echo "<script>location.href='../../usuarios.php' </script>";
 ?>