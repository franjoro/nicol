<?php 
require '../conexion.php';
session_start();
    
     if(isset($_SESSION['username']) AND $_SESSION['sesion_tipoUsuario'] == '4'){
        // echo "Hello\n". $_SESSION['nombre'];

         echo "\n <a style='display: none;' href='../destruir.php'><strong>Logout</strong></a>";

      }else{
        header("Location: ../sign/destruir.php");
      }

$usu = $_SESSION['username'];
$ac=mysqli_query($conexion,"SELECT acceso FROM users WHERE Username='$usu'");
$acc=mysqli_fetch_array($ac);
if ($acc[0]=='1') {
 ?>




<!DOCTYPE html>
<html>
<title>Alumno</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="img/1.png">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-card w3-left-align w3-large"  style="background: #34495e">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Observaciones</a>
    <a href="notas.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-text-white w3-hover-white">Notas</a>
    <a href="mostrar.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-text-white w3-hover-white">Conducta</a>
    <a href="../sign/destruir.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-text-white w3-hover-white">Salir</a>
    <!-- <a style="float: right" href="#"><img height="60" src="img/1.png"></a> -->
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">

    <a href="#" class="w3-bar-item w3-button w3-padding-large">Observaciones</a>
    <a href="notas.php" class="w3-bar-item w3-button w3-padding-large">Notas</a>
    <a href="mostrar.php" class="w3-bar-item w3-button w3-padding-large">Conducta</a>
    <a href="../sign/destruir.php" class="w3-bar-item w3-button w3-padding-large">Salir</a>
  </div>
</div>

<?php 
// session_start();
$usu = $_SESSION['username'];
$bum = "hola";

$row = mysqli_query($conexion,"SELECT Nombre, Apellido, IdG FROM estudiantes WHERE IdEs = '$usu' ");
$result = mysqli_fetch_array($row);

$texto = $result[0];

    $codi = mb_detect_encoding($texto, "UTF-8,ISO-8859-1");
    $texto = iconv($codi, 'UTF-8', $texto);

$lolo= $result[2];

$query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

    $rowi = mysqli_fetch_array($query2);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];

 ?>

<!-- Header -->
<header class="w3-container w3-center w3-indigo" >
  <br><br><br><br>
   <a href="#"><img align="center" height="90" src="img/1.png"></a><br>
  <h1 class="w3-margin"><?php echo utf8_encode($result['Nombre']) . "\n" . utf8_encode($result['Apellido']); ?></h1>
  <h3 class="w3-margin"><?php echo utf8_encode($ja)." ".$je; ?></h3>
  <!-- <p class="w3-xlarge">Template by w3.css</p> -->
  <!-- <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started</button> -->
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
<?php 
 $query3 = mysqli_query($conexion, "SELECT * FROM aplicados WHERE IdEs = '$usu' AND Role= '0'");
  $num=mysqli_num_rows($query3);
  if ($num=='0') {
    $titt="*Alumno sin observaciones ingresadas";
  }else{
    $titt="Tus observaciones";
  }
 ?>
      <h1><?php echo $titt ?></h1>
<br>

<?php 
// $query4 = mysqli_query($conexion, "SELECT * FROM aplicados WHERE IdEs = '$usu'");
 

  while ($ruwu = mysqli_fetch_array($query3)) {
  // $rowo = mysqli_fetch_array($query3);
  $hol = $ruwu[4];
  $query4 = mysqli_query($conexion, "SELECT Nombre FROM maestros WHERE idM = '$hol'");
  $riwi = mysqli_fetch_array($query4);
  $hul = $riwi[0];

 
 ?>


    <table class="w3-table w3-striped" style="width: 100%">
      <thead>
        <th style="width: 80%">Observación</th>
        <th style="width: 20%">Profesor</th>
      </thead>
       <tr>
         <td><?php echo $ruwu[2] ?></td>
        <td><?php echo $hul ?>
        <br>
            <b><?php echo $ruwu[6] ?></b></td>
      </tr>
      <?php } ?>
    </table>
    <!-- <h5 style="float: right; cursor: pointer;" onclick="document.getElementById('modal').style.display='block'">Ver más <i class="fa fa-arrow-right" aria-hidden="true"></i></h5> -->


    
  </div>
  <br><br><br><br>
  <center>
  <div class="w3-container">
  <?php 

    $query6 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$lolo'");
    $roww = mysqli_fetch_array($query6);

    $waa = $roww['idMa'];
    $wee = $roww['Bact1'];
    // $wee = $roww['Bact1'];
    $wii = $roww['Bact2'];
    $woo = $roww['Bact3'];

      // echo $wee;
    if ($wee == 1) {
      echo "<p>Pronto se habilitara la boleta 1</p>";
    }else{
      echo '<a href="grados/Act1.php"><button class="w3-button w3-blue">Boleta Act 1</button></a><br><br>';
    }
    if ($wee == 1) {
      echo "<p>Pronto se habilitara la boleta 2</p>";
    }else{
      echo '<a href="grados/Act2.php"><button class="w3-button w3-blue">Boleta Act 2</button></a><br><br>';
    }
    if ($woo == 1) {
      echo "<p>Pronto se habilitara la boleta de examen</p>";
    }else{
      '<a href="grados/Act3.php"><button class="w3-button w3-blue">Boleta Act 2</button></a>';
    }

   ?>
   </div>
   </center>
</div>
<br>
<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
  <marquee>
    <h1 class="w3-margin w3-xlarge"></h1>
  </marquee>
</div>





<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<div id="id01" class="w3-modal"  >
    <div class="w3-modal-content">
      <div class="w3-container">
        <h1>Cambiar la contraseña nos ayudara con la seguridad</h1>
        <label>Por favor ingresa una nueva contraseña:</label>
        <form action="fun/contra.php?id=<?php echo $usu ?>" method="POST">
        <input type="Password" class="w3-input w3-border" name="contra">
        <br>
        <button class="w3-button w3-green" type="submit" style="float: right;">Cambiar</button>
        </form>
        <br><br>
      </div>
    </div>
  </div>

  <?php 
// VALIDACION CONTRASEÑA=====================================
$opContra=md5($usu);
$contrasql=mysqli_query($conexion,"SELECT Password FROM users WHERE Username='$usu'");
$contrarow=mysqli_fetch_array($contrasql);
if ($contrarow[0]<>$opContra) {
}else{
  echo "<script>function myFunction() {
    document.getElementById('id01').style.display = 'block';}
myFunction()</script>";
  
}

// VALIDACION CONTRASEÑA=====================================
 ?>

</body>
</html>
  <?php 
  }else{
    header("Location: bill.php");
  }
   ?>