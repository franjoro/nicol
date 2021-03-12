<?php 
require("../../../conexion.php");
$id = $_POST["id"];
$sqq=mysqli_query($conexion,"SELECT idCodigo,bimestre,IdEs FROM aplicados WHERE id_ap='$id' ");
$eow=mysqli_fetch_array($sqq);

$sql1=mysqli_query($conexion,"SELECT valor FROM codigo WHERE idCodigo='$eow[0]' ");
$rowl1=mysqli_fetch_array($sql1);
$bimestre=$eow[1];
if ($bimestre=='1') {
	$columna='conducta1';
}elseif ($bimestre=='2') {
	$columna='conducta2';
}elseif ($bimestre=='3') {
	$columna='conducta3';
}elseif ($bimestre=='4') {
	$columna='conducta2';
}

$sql112=mysqli_query($conexion,"SELECT $columna FROM estudiantes WHERE IdEs='$eow[2]' ");
$rowl11=mysqli_fetch_array($sql112);

$resultado= ($rowl11[0]-$rowl1[0]);

if ($rowl1>0) {
if ($resultado<0 OR $resultado>100) {
	$sqqqq=" ";
}else{
	$sqqqq=mysqli_query($conexion,"UPDATE estudiantes SET $columna='$resultado' WHERE IdEs='$eow[2]' ");
}

}


$sql= mysqli_query($conexion,"DELETE FROM aplicados WHERE id_ap='$id'");

if ($sql) {
	echo "Código eliminado";
}else{
	echo "Error, no se pudo elimninar";
}
 ?>