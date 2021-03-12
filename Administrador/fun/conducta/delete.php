<?php 
require("../../../conexion.php");
$id = $_POST["id"];

$sql= mysqli_query($conexion,"DELETE FROM codigo WHERE idCodigo='$id'");

if ($sql) {
	echo "Código eliminado";
}else{
	echo "Error, no se pudo elimninar";
}
 ?>