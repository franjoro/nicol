<?php 
require("../../../conexion.php");
if (isset($_GET['id'])) {
	$a=$_GET['id'];
	$add="WHERE idMa='$a'";
}else{
	$add=" ";
}

if (isset($_GET['n'])) {
	$num=$_GET['n'];
	if ($num=='1') {
		$columna="Bact1='1'";
	}
	if ($num=='2') {
		$columna="Bact2='1'";
	}
	if ($num=='3') {
		$columna="Bact3='1'";
	}
	
}else{
	$columna="Bact1='1', Bact2='1', Bact3='1'";
}

$sql= mysqli_query($conexion,"UPDATE materias SET $columna $add");


if ($sql) {
	echo "<script>alert('Bloqueo de materias desactivado')</script>";
}else{
	echo "<script>alert('Error.')</script>";
}
echo "<script>location.href='../../materia.php' </script>";
 ?>