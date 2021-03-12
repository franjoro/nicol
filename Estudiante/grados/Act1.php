<?php 
session_start();
require '../../conexion.php';

 ?>

 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Segundo 30%</title>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../../Maestro/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../Maestro/css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
      .pip{
        padding: 10px;
        border: 3px solid black;
      }
    </style>
 </head>
<body>
<?php 
$usu = $_SESSION['username'];
$sql = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdEs = '$usu'");
      $row = mysqli_fetch_array($sql);

  $query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$row[4]' ");

    $rowi = mysqli_fetch_array($query2);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];


$ani = date('Y');
          if (isset($_GET['idb'])) {
            $bimestre = $_GET['idb'];
          }else{
            $sqlbi = mysqli_query($conexion,"SELECT * FROM bimestre");
            $rowb = mysqli_fetch_array($sqlbi);
            $bimestre = $rowb[0];
          }

          $yas = $row[5];
          $yes = $row[6];
          $yis = $row[7];
          $yos = $row[8];



  if ($bimestre=='1') {
  $columna="I bimensual";
  $yus = $yas;
}elseif ($bimestre=='2') {
  $columna="II bimensual";
  $yus = $yes;
}elseif ($bimestre=='3') {
  $columna="III bimensual";
  $yus = $yis;
}elseif ($bimestre=='4') {
  $columna="IV bimensual";
  $yus = $yos;
}

    

         ?>

          <a href="../index.php"><button class="btn btn-danger">X</button></a>
  <div class="container">
    <div class="row">
    <div class="col-md-12">
  <div style="margin-top: 40px; overflow: hidden">
    <img style="float: left" width="250" height="80" src="img/logo.png">
    <!-- <h4 style=" display: inline-block; float:right" class="pip"><?php echo $columna ?></h4> -->
  </div>
  <h5>Colegio Salesiano "San Juan Bosco"</h5>
  <p>Informe del primer 30% de acumulados para el <?php echo $columna." ". $ani?></p>

  <p style="display: inline;">Nombre: <?php echo $row[1]." ".$row[2] ?></p>
  <p style="display: inline; float: right">Grado: <?php echo $ja." ".$je ?></p>
  <br>
  <h3 style="display: inline-block;">Conducta:</h3>
  <p style="display: inline-block;" class="pip"><?php echo $yus ?></p>

  <br>

  <table class="table">
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Materia</th>
      <th scope="col">Calificación</th>

    </tr>
  </thead>
  <tbody>
    <?php 
    $query12 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$row[4]'");
    while($row12 = mysqli_fetch_array($query12)){
  
    $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$row[4]' AND idMa = '$row12[0]' AND Role = 1 AND Bimestre = '$bimestre' ");
     $rowi2 = mysqli_fetch_array($query3);
    $query4 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi2[0]' AND IdEs='$usu' ");
    $rowi3 = mysqli_fetch_array($query4);
    $haha = $rowi3[0];

     ?>
     <tr>
    <td><?php echo utf8_encode($row12['1']) ?></td>
    <td><?php echo $haha; ?></td>
    </tr>
     <?php } ?>
  </tbody>
</table>
<br><br>
<h5 style="display: inline;">Observaciones</h5>
<p style="display: inline-block;">_______________________________________</p>
  <br><br><br>

</div>
  <!-- <p style="display: inline;">Firma&nbsp;</p><p style="display: inline;">_________________</p> -->
  <!-- <p style="display: inline; float: right">_________________</p><p style="display: inline; float: right">Firma&nbsp;</p> -->
  <div style="page-break-before: always;height:0; line-height:0;">
  </div>
</div>
</div>

 </body>
 </html>
