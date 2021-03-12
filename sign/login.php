<?php
session_start();
require '../conexion.php';
  function alert ($text,$func){
    echo "<script type='text/javascript'>alert('$text');$func();</script>";
  }

            $username="s1000114_nicol21";
            $password="cisberm30CS";
            $database="s1000114_nicol21";
            $servername="localhost";

            if (isset($_SESSION['usuario'])) {
    header('location: index.php');
  }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
@$txtNombreUsuario= filter_var(strtolower($_POST['idU']), FILTER_SANITIZE_EMAIL);
@$txtpass=  md5($_POST['password']);
// $txtpass = hash('sha512', $txtpass);
  
mysqli_connect($servername,$username,$password);

mysqli_select_db($conexion,$database) or die( "Unable to select database");

//Creando Instruccion de Insercion de Datos

$query = 'SELECT idU, Username, Password, Role FROM users 
WHERE Username="'.$txtNombreUsuario.'" AND Password="'.$txtpass.'"';


//Ejecutando Query al Lado del Servidor de Base de datos
$resultado = mysqli_query($conexion,$query);

	//$sesion = mysqli_query($conexion, "SELECT * FROM sesiones");
	//$se = mysqli_fetch_array($sesion);

	$dead = $se[0];
	// echo $dead;
	//if ($dead == '732') {
	//	header('Location: bill.php');
	//}

if ($f=mysqli_fetch_array($resultado)){
    if($txtpass==$f['Password']){

      // validando la sesion
      $_SESSION['sesion_valida']=1;
      $_SESSION['username']=$f['Username'];
      $_SESSION['EmailU']=$f['idU'];
      $_SESSION['sesion_tipoUsuario']=$f['Role'];
      $_SESSION['sesion']=$se['user'];

      

        $errores = '';

    if (empty($txtNombreUsuario) or empty($txtpass)) {
        $errores .= 'Por favor rellena todos los datos correctamente';
      }else{
        
        $chaca = 'SELECT idU From users WHERE idU = "'.$txtNombreUsuario.'"';
        $resultado = mysqli_query($conexion,$chaca);
        if ($f=mysqli_fetch_array($resultado)) {
          if ($txtNombreUsuario!=$f['Username']) {
            $errores .= 'Lo sentimos';
          }
        }


}
      }


      	if($dead == '732'){
      		header('Location: bill.php');
      	}else{

      	}

       
            
            
      
    
           if ($_SESSION['sesion_tipoUsuario'] == '4' AND $dead !='732') {
              
              $dato = 'SELECT acceso FROM users';
              $resul = mysqli_query($conexion,$dato);
          if ($R=mysqli_fetch_array($resul)){

            $a=$R[0];
            $b = "1";     

      if($b==$a){
              header("Location: ../Estudiante/index.php");
            }
               }else{
                header('Location: bill.html');
               }


           }elseif ($_SESSION['sesion_tipoUsuario'] == '1' AND $dead !='732'){
              $dato = 'SELECT IdUsuario FROM datosusu WHERE IdUsuario="'.$txtNombreUsuario.'"';
           $resul = mysqli_query($conexion,$dato);
          if ($R=mysqli_fetch_array($resul)){
            if($idUsuario==$R['idUsuario']){
              header("Location: ../principal/aa.php");
            }   
           }else{
                  header('Location: ../Administrador/index.php');
               }



          } else if ($_SESSION['sesion_tipoUsuario'] == '3' AND $dead !='732') {
              
              $dato = 'SELECT idM FROM maestros WHERE idM="'.$_SESSION['username'].'"';
           $resul = mysqli_query($conexion,$dato);
          if ($R=mysqli_fetch_array($resul)){

            $a=$R['idM'];
            $b =$_SESSION['username'];     

      if($b==$a){
              header("Location: ../Maestro/index.php");
            }
               }else{
                header('Location: DatosU/index.php');
               }




      } elseif ($_SESSION['sesion_tipoUsuario'] == '110' AND $dead !='732') {
              
              $dato = 'SELECT email FROM infoempresa WHERE email="'.$txtNombreUsuario.'"';
           $resul = mysqli_query($conexion,$dato);
          if ($R=mysqli_fetch_array($resul)){

            $a=$R['EmailU'];
            $b =$txtNombreUsuario;     

      if($b==$a){
              header("Location: main/index.html");
            }
               }else{
                header('Location: curved-cut/index.php');
               }

               
        

            } elseif ($_SESSION['sesion_tipoUsuario'] == '2' AND $dead !='732'){
              header('Location:../Secretaria');
}
elseif ($_SESSION['sesion_tipoUsuario'] == '120'){
              header('Location: prueba2.html');


            }
elseif ($_SESSION['sesion_tipoUsuario'] == '750'){
              header('Location: prueba3.html');


            }


               
      } 
            
}


if ($txtpass!=$f['Password']) {
 echo "<script>alert('Usuario o contraseña incorrectos')</script>";
echo '<script type="text/javascript">window.location="index.php";</script>';

}



?>