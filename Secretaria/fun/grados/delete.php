<?php 
require("../../../conexion.php");
$id = $_POST["id"];

$sql= mysqli_query($conexion,"DELETE FROM grados WHERE idG='$id'");

if ($sql) {
	echo "Grado eliminado";
}else{
	echo "Error, no se pudo elimninar";
}
 ?>