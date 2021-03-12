<?php 
require("../../conexion.php");
$a=$_GET['id'];

$carpeta1="img/";
opendir($carpeta1);
$destino1 = $carpeta1 . $_FILES ['file']['name'];
copy($_FILES ['file']['tmp_name'], $destino1);

mysqli_query($conexion,"UPDATE maestros SET img='$destino1' WHERE idM='$a'");

header("location:../index.php");
 ?>