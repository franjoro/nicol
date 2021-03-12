<?php 
session_start();
require("../conexion.php");
// $id = $_GET['id'];
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

  $id = $_SESSION['username'];
$sql= mysqli_query($conexion,"SELECT * FROM estudiantes WHERE IdEs='$id'");
$row=mysqli_fetch_array($sql);
 ?>
<!DOCTYPE html>
<html>
<title>Conducta</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <a style="text-decoration: none;" href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-text-white w3-hover-white">Observaciones</a>
    <a style="text-decoration: none;" href="notas.php" class="w3-bar-item w3-button w3-padding-large w3-white">Notas</a>
    <a style="text-decoration: none;" href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-text-white w3-hover-white">Conducta</a>
    <a style="text-decoration: none;" href="../sign/destruir.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-text-white w3-hover-white">Salir</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a style="text-decoration: none;" href="index.php" class="w3-bar-item w3-button w3-padding-large">Observaciones</a>
    <a style="text-decoration: none;" href="notas.php" class="w3-bar-item w3-button w3-padding-large">Notas</a>
    <a style="text-decoration: none;" href="mostrar.php" class="w3-bar-item w3-button w3-padding-large">Conducta</a>
    <a style="text-decoration: none;" href="../sign/destruir.php" class="w3-bar-item w3-button w3-padding-large">Salir</a>
  </div>
</div>
<!-- First Grid -->
<div style="background: #2980b9; color: white" class="w3-row-padding w3-padding-64 w3-container">
  <br>
<!-- <a href="../../conducta.php"> -->
<!-- <button class="w3-button w3-red w3-left">X</button> -->
</a>
      
<br>
<?php 
  $row9 = mysqli_query($conexion,"SELECT Nombre, Apellido, IdG FROM estudiantes WHERE IdEs = '$id' ");
$result9 = mysqli_fetch_array($row9);

$lolo= $result9[2];

$query9 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

    $rowi = mysqli_fetch_array($query9);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];
 ?>
    <div class="w3-half">
     <table class="w3-table">
       <thead>
         <th style="color: white" colspan="2"><h1>Estudiante:<b> <?php echo utf8_encode($row[1])." ".utf8_encode($row[2]) ?></b></h1></th>
       </thead>
       <tr>
         <td style="color: #fff"><h4><b>Grado: </b><?php echo $ja." ".$je ?></h4></td>
         <td style="color: #fff"><h4><b>Código:</b> <?php echo $row[0] ?></h4></td>
       </tr>
     </table>

    </div>
  


  <div class="w3-content">






   <div class="w3-half ">
     <label style="color: #fff">Bimestre:</label>
        <select id="acumu" class="w3-select">
            <option class="dis">Selecciona el bimestre</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
 
    </div>

  
<?php 
if (isset($_GET['b'])) {
  $bimestre=$_GET['b'];
}else{
$sqlBi=mysqli_query($conexion,"SELECT * FROM bimestre");
$rowbi=mysqli_fetch_array($sqlBi);
$bimestre=$rowbi[0];
}

if ($bimestre=='1') {
  $columna="conducta1";
}elseif ($bimestre=='2') {
  $columna="conducta2";
}elseif ($bimestre=='3') {
  $columna="conducta3";
}elseif ($bimestre=='4') {
  $columna="conducta4";
}
$sql1=mysqli_query($conexion,"SELECT * FROM aplicados WHERE IdEs='$id' AND bimestre='$bimestre'");


$sqlEs=mysqli_query($conexion,"SELECT $columna FROM estudiantes WHERE IdEs='$id'");
$rowEs=mysqli_fetch_array($sqlEs);

if ($rowEs[0]>=90) {
  $color='green';
  $texto="¡Excelente!";
}elseif ($rowEs[0]>=95 AND $rowEs[0]<=90 ) {
  $color='green';
  $texto="¡Muy bien!";
}elseif ($rowEs[0]>=80 AND $rowEs[0]<=90 ) {
  $color='black';
  $texto="bien";
}elseif ($rowEs[0]<80 ) {
  $color='yellow';
  $texto="Debe mejorar";
}
 ?>

</div>
</div>
<!-- <a href="#"><img style="margin-top: -80px;" align="right" height="60" src="img/1.png"></a><br> -->
<div>
<center><h1>Puntaje: <?php echo $rowEs[0] ?></h1>
<h2 style="color:<?php echo $color ?>"><?php echo $texto ?></h2></center>
<center>
<!-- <hr style="height: 2px; background-color: #16a085; width: 600px; border-radius: 5px;"> -->
</center>
</div>
<div class="w3-container">
   <table class="w3-table w3-striped" style="width: 100%">
      <thead>
        <th style="width: 40%">Código</th>
        <th style="width: 40%">Descripción</th>
        <th style="width: 20%"></th>
      </thead>
      <?php 

       while ($row= mysqli_fetch_array($sql1)) { 
            $sql2=mysqli_query($conexion,"SELECT Codigo,valor FROM codigo WHERE idCodigo='$row[1]'");
            $cod =mysqli_fetch_array($sql2);
              ?>
            
        <tr>
          <td><?php echo $cod[0] ?> <br><b>Valor:<?php echo $cod[1] ?></b></td>
          <td><?php echo $row[2] ?></td>
          <td><b>Fecha:</b><?php echo $row[6] ?>?></td>
        </tr>
        <?php 
      }
         ?>
    </table>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.slim.js"
  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
  crossorigin="anonymous"></script> 
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
<script type="text/javascript">
  $('#acumu').change(function(){
        var selectedOption = $('#acumu option:selected');
  if (selectedOption.val() == 1) {
        location.href='mostrar.php?id=<?php echo $id ?>&b=1 ';
        }else if (selectedOption.val() == 2) {
          location.href='mostrar.php?id=<?php echo $id ?>&b=2 ';
        }else if (selectedOption.val() == 3) {
          location.href='mostrar.php?id=<?php echo $id ?>&b=3 ';
        }else if (selectedOption.val() == 4) {
          location.href='mostrar.php?id=<?php echo $id ?>&b=4 ';
        }
      });
</script>

</body>
</html>
<?php 
}else{
  echo "Sin acceso temporal a la plataforma, Por favor comunicarse con administración para solventar";
}
 ?>
