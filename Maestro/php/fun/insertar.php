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
$num=$_POST["num"];

$sql= mysqli_query($conexion,"INSERT INTO actividades(Titulo,Descripcion,idMa,Role,Bimestre,Des1,Porcen1,Des2,Porcen2,Des3,Porcen3,Des4,Porcen4,Des5,Porcen5,IdG,Num) VALUES ('$ti','$des','$id','$act','$rowbi[0]','$a','$f','$b','$g','$c','$h','$d','$i','$e','$j','$rowma[0]','$num')");



if ($sql) {
	echo "Perfiles insertados correctamente";

}else{
	echo "Error".mysqli_error($conexion);
}

$actividad=mysqli_query($conexion,"SELECT idAct FROM actividades WHERE idMa='$id' AND Role='$act' AND Bimestre='$rowbi[0]' ");
$actirow=mysqli_fetch_array($actividad);

	if ($num=='1') {
		 $estudiantes=mysqli_query($conexion,"SELECT IdEs FROM estudiantes WHERE IdG='$rowma[0]'");
         while($esrow=mysqli_fetch_array($estudiantes)){ 
         	$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
         }
	}elseif ($num=='2'){
		$estudiantes=mysqli_query($conexion,"SELECT IdEs FROM estudiantes WHERE IdG='$rowma[0]'");
         while($esrow=mysqli_fetch_array($estudiantes)){ 
         	$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
         	$query1=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','2')");
         }
	}elseif ($num=='3') {
		$estudiantes=mysqli_query($conexion,"SELECT IdEs FROM estudiantes WHERE IdG='$rowma[0]'");
         while($esrow=mysqli_fetch_array($estudiantes)){ 
         	$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
         	$query1=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','2')");
         	$query2=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','3')");
         }
	}elseif ($num=='4') {
				$estudiantes=mysqli_query($conexion,"SELECT IdEs FROM estudiantes WHERE IdG='$rowma[0]'");
         while($esrow=mysqli_fetch_array($estudiantes)){ 
         	$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
         	$query1=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','2')");
         	$query2=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','3')");
         	$query3=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','4')");
         }
	}elseif ($num=='5') {
	    		$estudiantes=mysqli_query($conexion,"SELECT IdEs FROM estudiantes WHERE IdG='$rowma[0]'");
         while($esrow=mysqli_fetch_array($estudiantes)){ 
         	$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
         	$query1=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','2')");
         	$query2=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','3')");
         	$query3=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','4')");
         	$query4=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','5')");
         }
	}
	

// }



	// if ($num='1') {
	// 		while($esrow=mysqli_fetch_array($estudiantes)){
	// 	
	// 			}
	// }elseif ($num='2') {
	// 	$estudiantes=mysqli_query($conexion,"SELECT IdEs FROM estudiantes WHERE IdG='$rowma[0]'");
	// 		while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
				
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','2')");
	// 			echo "Hola";
	// 			}
	// }elseif ($num='3') {
	// 		while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','2')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','3')");
	// 			}
	// }elseif ($num='4') {
	// 		while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','2')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','3')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','4')");
	// 			}
	// }elseif ($num='5') {
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','1')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','2')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','3')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','4')");
	// 			}
	// 			while($esrow=mysqli_fetch_array($estudiantes)){
	// 		$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','5')");
	// 			}
	// }





 ?>
