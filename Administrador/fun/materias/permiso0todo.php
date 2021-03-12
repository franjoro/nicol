<?php 
require("../../../conexion.php");



	// $columna="Bact1='0', Bact2='0', Bact3='0'";
	$columna=" ";
	$columna2=" ";
	$columna3=" ";

	
    if (isset($_POST['1']) AND isset($_POST['2']) AND isset($_POST['3'])) {
		$columna="Bact1='0'";
		$columna2=", Bact2='0'";
		$columna3=", Bact3='0'";
	}else{ 

	if (isset($_POST['1']) AND isset($_POST['2'])) {
		$columna="Bact1='0'";
		$columna2=", Bact2='0'";
	}elseif(isset($_POST['1']) AND isset($_POST['3'])) {
		$columna="Bact1='0'";
		$columna3=", Bact3='0'";
	}elseif (isset($_POST['2']) AND isset($_POST['3'])) {
		$columna="Bact2='0'";
		$columna3=", Bact3='0'";
	}else{

		if (isset($_POST['1'])) {
		$columna="Bact1='0'";
	}
	if (isset($_POST['2'])) {
		$columna2="Bact2='0'";
	}
	if (isset($_POST['3'])=='3') {
		$columna3="Bact3='0'";
	}

}
	}



$sql= mysqli_query($conexion,"UPDATE materias SET $columna $columna2 $columna3 ");


if ($sql) {
	echo "<script>alert('Bloqueo de materias activado')</script>";
}else{
	echo "<script>alert('Error.')</script>";
}
echo "<script>location.href='../../materia.php' </script>";	
 ?>