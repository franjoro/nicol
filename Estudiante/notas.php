<?php 

session_start();
require '../conexion.php';

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
<title>Notas</title>
<meta charset="UTF-8">
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<style type="text/css">
  a{
    color: white;
    text-decoration: none;
    text-decoration-line: none;
  }
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-card w3-left-align w3-large"  style="background: #34495e">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a style="text-decoration: none;" href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-text-white w3-hover-white">Observaciones</a>
    <a style="text-decoration: none;" href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Notas</a>
    <a style="text-decoration: none;" href="mostrar.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-text-white w3-hover-white">Conducta</a>
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
<?php 
// session_start();
$usu = $_SESSION['username'];

$row = mysqli_query($conexion,"SELECT IdEs, Nombre, Apellido, IdG FROM estudiantes WHERE IdEs = '$usu' ");
$result = mysqli_fetch_array($row);
$lele = $result[0];
$lolo= $result[3];

$query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

    $rowi = mysqli_fetch_array($query2);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];

 ?> 

<!-- Header -->
<header class="w3-container w3-indigo" style="margin-top:50px; height: 280px;">

    <div class="w3-half">
     <table class="w3-table">
       <thead>
         <th style="color: white" colspan="2"><h1><?php echo utf8_encode($result[1]). " ". utf8_encode($result[2]) ?></h1></th>
       </thead>
       <tr>
         <td style="color: white"><h4><b>Grado: </b><?php echo $ja ." ".$je ?></h4></td>
         <td style="color: white"><h4><b>Código:</b> <?php echo $usu ?></h4></td>
       </tr>
        <tr>
          <!-- <td><h4><b>NIE:</b> 355081</h4></td> -->
          <!-- <td><h4><b>NIE:</b> No se que poner</h4></td> -->
        </tr>

        <?php 
          if (isset($_GET['b'])) {
            $bimestre = $_GET['b'];
          }else{
            $sqlbi = mysqli_query($conexion,"SELECT * FROM bimestre");
            $rowb = mysqli_fetch_array($sqlbi);
            $bimestre = $rowb[0];
          }

         ?>
        <tr>
          <td><h4><b style="color: white">Bimestre:</b></h4></td>
          <td>
               <select id="acumu" class="w3-select" style="width: 180px;">
                  <option style="display: none; opacity: 0;">Seleccione un bimestre</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
          </td>
        </tr>
     </table>

    </div>

   <div class="w3-half w3-center">
    
  <a href="#"><img align="right" height="100" src="img/1.png"></a><br>
    </div>

    <?php 

    $query4 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$lolo'");
    while ($row = mysqli_fetch_array($query4) ) {
    // $row = mysqli_fetch_array($query4);
      $ha = $row[0];
      $he = $row[1];
      $hi = $row[2];
      $ho = $row[3];
      $hu = $row[4];
      $hou = $row[5];


     
      ?>

  
</header>



<div class="w3-container table-responsive">




<table style="max-width: 100%;" class=" table table-hover table-bordered">
  <thead class="w3-teal">
    <th colspan="2"><?php echo utf8_encode($he) ?></th>
    <th >porcentaje</th>
    <th >Nota</th>
    <th ><a style="text-decoration: none;" href="acumulados.php?id=<?php echo $row[0]?>&b=<?php echo $bimestre ?>">Más<i class="fas fa-arrow-right"></i></a></th>
  </thead>

  <?php  $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG ='$ho' AND idMa = '$ha' AND Role = 1 AND Bimestre = '$bimestre'");
      // while ($rowi3 = mysqli_fetch_array($query5)) {
      $rowi3 = mysqli_fetch_array($query5);
        $tot = $rowi3[0];
        $tit = $rowi3[1];
        $des = $rowi3[2];
        $iM = $rowi3[3];
        $rol = $rowi3[4];
        $bi = $rowi3[5];
        $des1 = $rowi3[6];
        $por1 = $rowi3[7];
        $des2 = $rowi3[8];
        $por2 = $rowi3[9];
        $des3 = $rowi3[10];      
        $por3 = $rowi3[11];
        $des4 = $rowi3[12];
        $por4 = $rowi3[13];
        $des5 = $rowi3[14];
        $por5 = $rowi3[15];
        $iG = $rowi3[16]; 
             $num =mysqli_num_rows($query5);
     if ($num=='0') {
       $texto="Actividad 1 pendiente de ingresar";
     }else{
        $texto=" ";
     }

        $query6 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG ='$ho' AND idMa = '$ha' AND Role =2 AND Bimestre = '$bimestre'");
      // while ($rowi3 = mysqli_fetch_array($query5)) {
      $rowi4 = mysqli_fetch_array($query6);
        $tot2 = $rowi4[0];
        $tit2 = $rowi4[1];
        $des2 = $rowi4[2];
        $iM2 = $rowi4[3];
        $rol2 = $rowi4[4];
        $bi2 = $rowi4[5];
        $des12 = $rowi4[6];
        $por12 = $rowi4[7];
        $des22 = $rowi4[8];
        $por22 = $rowi4[9];
        $des32 = $rowi4[10];      
        $por32 = $rowi4[11];
        $des42 = $rowi4[12];
        $por42 = $rowi4[13];
        $des52 = $rowi4[14];
        $por52 = $rowi4[15];
        $iG2 = $rowi4[16];
             $num =mysqli_num_rows($query6);
     if ($num=='0') {
       $texto1="Actividad 2 pendiente de ingresar";
     }else{
        $texto1=" ";
     }

       /* $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG ='$ho' AND idMa = '$ha' AND Role =3 AND Bimestre = '$bimestre'");
      // while ($rowi3 = mysqli_fetch_array($query5)) {
      $rowi5 = mysqli_fetch_array($query7);
        $tot3 = $rowi5[0];
        $tit3 = $rowi5[1];
        $des3 = $rowi5[2];
        $iM3 = $rowi5[3];
        $rol3 = $rowi5[4];
        $bi3 = $rowi5[5];
        $des13 = $rowi5[6];
        $por13 = $rowi5[7];
        $des23 = $rowi5[8];
        $por23 = $rowi5[9];
        $des33 = $rowi5[10];      
        $por33 = $rowi5[11];
        $des43 = $rowi5[12];
        $por43 = $rowi5[13];
        $des53 = $rowi5[14];
        $por53 = $rowi5[15];
        $iG3 = $rowi5[16];
             $num =mysqli_num_rows($query7);
     if ($num=='0') {
       $texto2="Examen pendiente de ingresar";
     }else{
        $texto2=" ";
     }  */


        $query8 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE IdEs = '$lele' AND idAct = '$tot' ");
        $rowi6 = mysqli_fetch_array($query8);

        $not1 = $rowi6[0];

         $query9 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE IdEs = '$lele' AND idAct = '$tot2' ");
        $rowi7 = mysqli_fetch_array($query9);

        $not2 = $rowi7[0];

       $queryp = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE IdEs = '$lele' AND idAct = '$tot3' ");
        $rowi8 = mysqli_fetch_array($queryp);

        $not3 = $rowi8[0];

        ?>



  <tr>
    <td style="width: 20% !important;"><?php echo $tit ?><font style="color:red"><?php echo $texto ?></font></td>
    <td style="width: 40% !important;"><?php echo $des ?></td>
    <td style="width: 15% !important; vertical-align: middle;">30%</td>
    <td style="width: 15% !important; vertical-align: middle;"><?php echo $not1 ?></td>
    <!-- <td ></td> -->
  </tr>
   <tr>
    <td style="width: 20% !important;"><?php echo $tit2 ?><font style="color:red"><?php echo $texto1 ?></font></td>
    <td style="width: 20% !important;"><?php echo $des2 ?></td>
    <td style="width: 15% !important; vertical-align: middle;">30%</td>
    <td style="width: 15% !important; vertical-align: middle;"><?php echo $not2 ?></td>
    <!-- <td ></td> -->
  </tr>
  <!--<tr>
    <td  style="width: 20% !important;"><?php echo $tit3 ?><font style="color:red"><?php echo $texto2 ?></font></td>
    <td style="width: 20% !important;"><?php echo $des3 ?></td>
    <td style="width: 15% !important; vertical-align: middle;">40%</td>
    <td style="width: 15% !important; vertical-align: middle;"><?php echo $not3 ?></td>
    <!-- <td ></td> 
  </tr>-->
  
   <!--<tr>
    <td>Actividad 3</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
    <td>40%</td>
    <td>8.0</td>
  </tr>
  <tr>
   <td colspan="3" class="w3-right-align"><b>Promedio</b></td>
   <td><b>8.0</b></td>
  </tr>
  <thead>
    <th colspan="4" class="w3-teal">Lenguaje</th>
  </thead>
  <tr>
    <td style="width: 8%">Actividad 1</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
    <td>30%</td>
    <td>8.0</td>
  </tr>
  <tr>
    <td>Actividad 2</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
    <td>30%</td>
    <td>8.0</td>
  </tr>
  <tr>
    <td>Actividad 3</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
    <td>40%</td>
    <td>8.0</td>
  </tr>
  <tr>
   <td colspan="3" class="w3-right-align"><b>Promedio</b></td>
   <td><b>8.0</b></td>
  </tr>-->
</table>
</div> 
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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


<script>
  $(document).ready(function(){
      $('#acumu').change(function(){
        var selectedOption = $('#acumu option:selected');
        if (selectedOption.val() == 1) {
        location.href='notas.php?&b=1 ';
        }else if (selectedOption.val() == 2) {
          location.href='notas.php?&b=2 ';
        }else if (selectedOption.val() == 3) {
          location.href='notas.php?&b=3 ';
        }else if (selectedOption.val() == 4) {
          location.href='notas.php?&b=4 ';
        }
      });
    });

</script>

</body>
</html>



    <?php 
  }else{
    echo "Sin acceso temporal a la plataforma, Por favor comunicarse con administración para solventar pagos pendientes";
  }
   ?>
