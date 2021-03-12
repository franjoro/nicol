<?php 
require("../../../conexion.php");
$id=$_GET['id'];
$act=$_GET['act'];

$bi =mysqli_query($conexion,"SELECT * FROM  bimestre");
$rowbi =mysqli_fetch_array($bi);

$a=$_POST["ti"];
$b=$_POST["des"];

$sql= mysqli_query($conexion,"UPDATE actividades SET Titulo='$a',Descripcion='$b' WHERE idMa='$id' AND Role='$act' AND Bimestre='$rowbi[0]' ");
echo "Información del examen actualizada";
 ?>

