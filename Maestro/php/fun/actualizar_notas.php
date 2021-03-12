<?php 
require("../../../conexion.php");
$a=$_POST["id"];
$b=$_POST["texto"];
$c=$_POST["columna"];

$sql= mysqli_query($conexion,"UPDATE notas SET $c ='$b' WHERE idNota='$a' ");
 ?>