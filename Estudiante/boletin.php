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
  <title>Boletin de Notas</title>

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

  $id = $_GET['id'];
    $query87 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$id'");
  while ($rowoo = mysqli_fetch_array($query87)){
    // $a=mysqli_num_rows($query87);
    // echo $a;
    $lala = $rowoo['IdEs'];
    $lele = $rowoo['Nombre'];
    $lili = $rowoo['Apellido'];
    $lolo = $rowoo['IdG'];
    
    $query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

    $rowi = mysqli_fetch_array($query2);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];
   ?>

   <?php 
          if (isset($_GET['idb'])) {
            $bimestre = $_GET['idb'];
          }else{
            $sqlbi = mysqli_query($conexion,"SELECT * FROM bimestre");
            $rowb = mysqli_fetch_array($sqlbi);
            $bimestre = $rowb[0];
          }

  if ($bimestre=='1') {
  $columna="Bimestre 1";
}elseif ($bimestre=='2') {
  $columna="Bimestre 2";
}elseif ($bimestre=='3') {
  $columna="Bimestre 3";
}elseif ($bimestre=='4') {
  $columna="Bimestre 4";
}

         ?>


  <div class="container">
  <div style="margin-top: 40px">
    <img style="float: left" width="300" height="80" src="img/logo.png">
    <h4 class="pip" style="float: right"><?php echo $columna ?></h4>
  </div>
<br><br><br><br>
  <h1>Informe de Acumulados Bimensuales 2018</h1>
  <div style="width: 480px">
  <table class="table">
    <tr>
      <td>Carné: <?php echo $lala ?></td>
      <td>Alumno: <?php echo utf8_encode($lili).", ".utf8_encode($lele) ?></td>
    </tr>
    <tr>
      <td>Grado: <?php echo $ja ?></td>
      <td>Sección: <?php echo $je;?></td>
    </tr>
  </table>
  </div>

  <!-- NUEVA TABLITAA================================== -->
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Materia</th>
      <th scope="col">I 30%</th>
      <th scope="col">II 30%</th>
      <th scope="col">Exam</th>
      <th scope="col">Prom</th>

    </tr>
  </thead>
  <tbody>
  <?php 

    $query = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id'");
    while($row = mysqli_fetch_array($query)){
  
    $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = '$bimestre' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = '$bimestre' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre ='$bimestre' ");

    $rowi2 = mysqli_fetch_array($query3);
    $rowi5 = mysqli_fetch_array($query5);
    $rowi7 = mysqli_fetch_array($query7);
    $query4 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi2[0]' AND IdEs='$lala' ");
    $query6 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi5[0]' AND IdEs='$lala' ");
    $query8 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi7[0]' AND IdEs='$lala' ");


    $rowi3 = mysqli_fetch_array($query4);
    $rowi6 = mysqli_fetch_array($query6);
    $rowi8 = mysqli_fetch_array($query8);

    $haha = $rowi3[0];
    $hehe = $rowi6[0];
    $hihi = $rowi8[0];
    $rowi9 = $haha + $hehe +$hihi;

   ?>
    
    <tr>
      <td><?php echo utf8_encode($row['1']) ?></td>
      <td><?php echo $haha ?></td>
      <td><?php echo $hehe ?></td>
      <td><?php echo $hihi ?></td>
      <td><?php echo $rowi9 ?></td>
    </tr>
   


    <?php } ?>
  </tbody>
</table>
	<br><br><br>
  <p style="display: inline;">Firma&nbsp;</p><p style="display: inline;">_________________</p>
  <p style="display: inline; float: right">_________________</p><p style="display: inline; float: right">Firma&nbsp;</p>
  <div style="page-break-before: always;height:0; line-height:0;">

  </div>
</div>
 <?php } ?>
 </body>
 </html>
