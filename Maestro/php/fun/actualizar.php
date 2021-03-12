<?php
require("../../../conexion.php");
session_start();
$usu = $_SESSION['username'];  
// Sesion
$id=$_GET["id"]; 
// id de materias




$bi =mysqli_query($conexion,"SELECT * FROM  bimestre");
$rowbi =mysqli_fetch_array($bi);
// Bimestre

$ma=mysqli_query($conexion,"SELECT idG FROM materias WHERE idMa='$id'");
$rowma=mysqli_fetch_array($ma);
// Grado
$act=$_GET["act"];
// tipo de actividad



$des= $_POST["des"];
$ti=$_POST["ti"];
// datos de actividad


$a=$_POST["t1"];
$b=$_POST["t2"];
$c=$_POST["t3"];
$d=$_POST["t4"];
$e=$_POST["t5"];

$f=$_POST["p1"];
$g=$_POST["p2"];
$h=$_POST["p3"];
$i=$_POST["p4"];
$j=$_POST["p5"];
// $num=$_POST["num"];

// $sql= mysqli_query($conexion,"INSERT INTO actividades(Titulo,Descripcion,idMa,Role,Bimestre,Des1,Porcen1,,Porcen2,Des3,Porcen3,Des4,Porcen4,Des5,Porcen5,IdG,Num) VALUES ('$ti','$des','$id','$act','$rowbi[0]','$a','$f','$b','$g','$c','$h','$d','$i','$e','$j','$rowma[0]','$num')");

$sql= mysqli_query($conexion,"UPDATE actividades SET Titulo='$ti',Descripcion='$des',idMa='$id',Des1='$a',Porcen1='$f',Des2='$b',Porcen2='$g',Des3='$c',Porcen3='$h',Des4='$d',Porcen4='$i',Des5='$e',Porcen5='$j' WHERE idMa='$id' AND Role='$act' AND Bimestre='$rowbi[0]' ");

if ($sql) {
	echo "Perfiles modificados correctamente";
}else{
	echo "Error".mysqli_error($conexion);
}
 ?>
