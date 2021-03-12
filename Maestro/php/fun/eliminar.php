<?php 
require("../../../conexion.php");
$id = $_GET["id"];
$act =$_GET["act"];

$query111 = mysqli_query($conexion, "SELECT * FROM bimestre");
$row111 = mysqli_fetch_array($query111);

$sql= mysqli_query($conexion,"DELETE FROM actividades WHERE idMa='$id' AND Role='$act' AND Bimestre='$row111[0]' ");



if ($sql) {
	echo "Actividad eliminada";
}else{
	echo "Error, no se pudo elimninar";
}

 ?>
