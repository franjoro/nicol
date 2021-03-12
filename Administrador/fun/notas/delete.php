<?php 
require("../../../conexion.php");
$id = $_POST["id"];

$sql= mysqli_query($conexion,"DELETE FROM actividades WHERE idAct='$id'");

if ($sql) {
	echo "Actividad eliminada";
}else{
	echo "Error, no se pudo elimninar";
}
 ?>