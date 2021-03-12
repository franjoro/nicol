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
  <title>Boletin de Estudiantes</title>

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
  $ani = date('Y');
  $id = $_GET['id'];
    $query87 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$id'");
  while ($rowoo = mysqli_fetch_array($query87)){
    // $a=mysqli_num_rows($query87);
    // echo $a;
    $lala = $rowoo['IdEs'];
    $lele = $rowoo['Nombre'];
    $lili = $rowoo['Apellido'];
    $lolo = $rowoo['IdG'];
    $nana = $rowoo['conducta1'];
    $nene = $rowoo['conducta2'];
    $nini = $rowoo['conducta3'];
    $nono = $rowoo['conducta4'];
    $nunu = ($nana + $nene + $nini + $nono)/4;
    
    $query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

    $rowi = mysqli_fetch_array($query2);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];

    
   ?>

   <?php 
//           if (isset($_GET['idb'])) {
//             $bimestre = $_GET['idb'];
//           }else{
//             $sqlbi = mysqli_query($conexion,"SELECT * FROM bimestre");
//             $rowb = mysqli_fetch_array($sqlbi);
//             $bimestre = $rowb[0];
//           }

//   if ($bimestre=='1') {
//   $columna="Bimestre 1";
// }elseif ($bimestre=='2') {
//   $columna="Bimestre 2";
// }elseif ($bimestre=='3') {
//   $columna="Bimestre 3";
// }elseif ($bimestre=='4') {
//   $columna="Bimestre 4";
// }

         ?>


  <div class="container">
  <div style="margin-top: 40px">
    <img style="float: left" width="300" height="80" src="img/logo.png">
    <h4 class="pip" style="float: right">Final</h4>
  </div>
<br><br><br><br>
  <h1>Boletin de notas</h1>
  <div style="width: 480px">
  <table class="table">
    <tr>
      <td>Carné: <?php echo $lala ?></td>
      <td>Alumno: <?php echo utf8_encode($lili).", ".utf8_encode($lele) ?></td>
    </tr>
    <tr>
      <td>Grado: <?php echo $ja ."-". $je; ?></td>
      <td>Año Lectivo: <?php echo $ani;?></td>
    </tr>
    <!-- <tr></tr> -->
  </table>
  </div>

  <!-- NUEVA TABLITAA================================== -->
  <table class="table">
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Materia</th>
      <th scope="col">I</th>
      <th scope="col">20%</th>
      <th scope="col">II</th>
      <th scope="col">30%</th>
      <th scope="col">III</th>
      <th scope="col">20%</th>
      <th scope="col">IV</th>
      <th scope="col">30%</th>
      <th scope="col">Nota final</th>
      <!-- <th scope="col">Conducta</th> -->

    </tr>
  </thead>
  <tbody>
  <?php 

    $query = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id'");
    while($row = mysqli_fetch_array($query)){
  
    $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = 1 ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = 1 ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = 1 ");

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
    $porce1 = $rowi9 * 0.2;


    // Bimestre 2

    $query21 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = 2 ");
    $query22 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = 2 ");
    $query23 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = 2 ");

    $rowi21 = mysqli_fetch_array($query21);
    $rowi22 = mysqli_fetch_array($query22);
    $rowi23 = mysqli_fetch_array($query23);
    $query24 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi21[0]' AND IdEs='$lala' ");
    $query25 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi22[0]' AND IdEs='$lala' ");
    $query26 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi23[0]' AND IdEs='$lala' ");


    $rowi27 = mysqli_fetch_array($query24);
    $rowi28 = mysqli_fetch_array($query25);
    $rowi29 = mysqli_fetch_array($query26);

    $zaza = $rowi27[0];
    $zeze = $rowi28[0];
    $zizi = $rowi29[0];
    $zozo = $zaza + $zeze + $zizi;

    $porce2 = $zozo * 0.3;

    // Bimestre 3

    $query31 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = 3 ");
    $query32 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = 3 ");
    $query33 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = 3 ");

    $rowi31 = mysqli_fetch_array($query31);
    $rowi32 = mysqli_fetch_array($query32);
    $rowi33 = mysqli_fetch_array($query33);
    $query34 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi31[0]' AND IdEs='$lala' ");
    $query35 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi32[0]' AND IdEs='$lala' ");
    $query36 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi33[0]' AND IdEs='$lala' ");


    $rowi37 = mysqli_fetch_array($query34);
    $rowi38 = mysqli_fetch_array($query35);
    $rowi39 = mysqli_fetch_array($query36);

    $qaqa = $rowi37[0];
    $qeqe = $rowi38[0];
    $qiqi = $rowi39[0];
    $qoqo = $qaqa + $qeqe + $qiqi;
    $porce3 = $qoqo * 0.2;


    // bimestre 4

    $query41 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 AND Bimestre = 4 ");
    $query42 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 AND Bimestre = 4 ");
    $query43 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 AND Bimestre = 4 ");

    $rowi41 = mysqli_fetch_array($query41);
    $rowi42 = mysqli_fetch_array($query42);
    $rowi43 = mysqli_fetch_array($query43);
    $query44 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi41[0]' AND IdEs='$lala' ");
    $query45 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi42[0]' AND IdEs='$lala' ");
    $query46 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi43[0]' AND IdEs='$lala' ");


    $rowi47 = mysqli_fetch_array($query44);
    $rowi48 = mysqli_fetch_array($query45);
    $rowi49 = mysqli_fetch_array($query46);

    $wawa = $rowi47[0];
    $wewe = $rowi48[0];
    $wiwi = $rowi49[0];
    $wowo = $wawa + $wewe + $wiwi;
    $porce4 = $wowo * 0.3;

    // $promf = ($rowi9 + $zozo + $qoqo + $wowo)/4;
    $promf = $porce1 + $porce2 + $porce3 + $porce4;


   ?>
    
    <tr>
      <td><?php echo utf8_encode($row['1']) ?></td> <!-- Materia -->
      <td style="font-weight: bold;"><?php echo $rowi9 ?></td> <!-- prom 1 -->
      <td><?php echo $porce1 ?></td> <!-- Porce 20% -->
      <td style="font-weight: bold;"><?php echo $zozo ?></td> <!-- prom 2 -->
      <td><?php echo $porce2 ?></td> <!-- Porce 30% -->
      <td style="font-weight: bold;"><?php echo $qoqo ?></td> <!-- prom 3 -->
      <td><?php echo $porce3 ?></td> <!-- Porce 20% -->
      <td style="font-weight: bold;"><?php echo $wowo ?></td> <!-- prom 4 -->
      <td><?php echo $porce4 ?></td> <!-- Porce 30% -->
      <td style="font-weight: bold;"><?php echo $promf ?></td> <!-- Prom final -->


    </tr> 
   

    <?php } ?>
  </tbody>
</table>
<div style="float: right; border: 2px solid #000; padding: 2px; border-radius: 3px;"> 
      <h5>Conducta: <?php echo $nunu ?></h5>
      </div>
	<br><br><br><br><br> 
  <p style="display: inline;">Firma&nbsp;</p><p style="display: inline;">_________________</p>
  <p style="display: inline; float: right">_________________</p><p style="display: inline; float: right">Firma&nbsp;</p>
  <div style="page-break-before: always;height:0; line-height:0;">

  </div>
</div>
 <?php } ?>
 </body>
 </html>
