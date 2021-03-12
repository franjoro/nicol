<?php 
require("../../../conexion.php");
session_start();
$usu = $_SESSION['username'];  
// Sesion
$id=$_GET["id"];
//estudiante
$sqll=mysqli_query($conexion,"SELECT * FROM bimestre");
$rowbi=mysqli_fetch_array($sqll);
$bimestre=$rowbi[0];

// ==================================================================MODIFICAR ACA SI HAY MAS BIMESTRES
if ($bimestre=='1') {
	$columna='conducta1';
}elseif ($bimestre=='2') {
	$columna='conducta2';
}elseif ($bimestre=='3') {
	$columna='conducta3';
}elseif ($bimestre=='4') {
	$columna='conducta4';
}
// ==================================================================MODIFICAR ACA SI HAY MAS BIMESTRES
$a=$_POST['option'];
$b=$_POST['des'];

$date=date("d/m/y");

$query=mysqli_query($conexion,"INSERT INTO aplicados(idCodigo,Descripcion,IdEs,idM,Role,fecha,bimestre) VALUES('$a','$b','$id','$usu','1','$date','$bimestre') ") ;





$queryy=mysqli_query($conexion,"SELECT valor FROM codigo WHERE idCodigo='$a' ");
$rowcod=mysqli_fetch_array($queryy);
$codigose=$rowcod[0];

$sqq=mysqli_query($conexion,"SELECT $columna FROM estudiantes WHERE IdEs='$id' ");
$sqqq=mysqli_fetch_array($sqq);

$resultado=($codigose+$sqqq[0]);

if ($resultado<0 OR $resultado>100) {
	$sql2=" ";
}else{
	$sql2 = mysqli_query($conexion,"UPDATE estudiantes SET $columna='$resultado' WHERE IdEs='$id'");
}

if ($query) {
	echo "Código ingresado correctamente";

}else{
	echo "Código no insertado.";
}

 ?>
