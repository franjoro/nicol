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

$ti=$_POST['ti'];
$des=$_POST['des'];
$num=$_POST['num'];


$sql= mysqli_query($conexion,"INSERT INTO actividades(Titulo,Descripcion,idMa,Role,Bimestre,IdG,Num,Porcen1) VALUES ('$ti','$des','$id','$act','$rowbi[0]','$rowma[0]','$num','40')");

$actividad=mysqli_query($conexion,"SELECT idAct FROM actividades WHERE idMa='$id' AND Role='$act' AND Bimestre='$rowbi[0]' ");
$actirow=mysqli_fetch_array($actividad);	

 $estudiantes=mysqli_query($conexion,"SELECT IdEs FROM estudiantes WHERE IdG='$rowma[0]'");
         while($esrow=mysqli_fetch_array($estudiantes)){ 
        	$query=mysqli_query($conexion,"INSERT INTO notas(Nota,idAct,IdEs,Role) VALUES('0','$actirow[0]','$esrow[0]','0')");
         }
 if ($sql) {
 	echo "Examen insertado correctamente";
 }else{
	$error =mysqli_error($conexion);
 	echo "Error".$error;
 }
?>
