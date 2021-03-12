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
    $query87 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$id' ORDER BY Apellido");
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

$sql1=mysqli_query($conexion,"SELECT * FROM aplicados WHERE IdEs='$id' AND bimestre='$bimestre'");
   
      ?>
<style type="text/css">
  span{
    font-size: 12px;
    font-family: Arial;
  }
</style>

  <div class="container">


  <div style="margin-top: 40px">
    <img style="float: left" width="300" height="80" src="img/logo2.png">
   
  </div>


  <div>
  <table class="table">
    <th><h4>Informe de Acumulados <?php echo $columna ?></h4></th>
    <th></th>
    <tr>
      <td><span>Carné: <?php echo $lala ?></span></td>
      <td><span>Alumno: <?php echo utf8_encode($lili).", ".utf8_encode($lele) ?></span></td>
    </tr>
    <tr>
      <td><span>Grado: <?php echo $ja ?></span></td>
      <td><span>Sección: <?php echo $je ?></span></td>
    </tr>
  </table>
  </div>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th>Codigo</th>
      <th>Descripcion</th>
      <th>Maestro</th>
      <th>Fecha</th>
      <th>Final</th>

    </tr>
  </thead>
  <tbody>
  <?php 

       while ($row= mysqli_fetch_array($sql1)) { 
            $sql2=mysqli_query($conexion,"SELECT Codigo,valor FROM codigo WHERE idCodigo='$row[1]'");
            $cod =mysqli_fetch_array($sql2);
              ?>
            
        <tr>
          <td><?php echo $cod[0] ?> <br><b>Valor:<?php echo $cod[1] ?></b></td>
          <td><?php echo $row[2] ?></td>
          <td><b>Fecha:</b><?php echo $row[6] ?> <br> <b>Maestro:</b><?php echo $row[4] ?></td>
        </tr>
        <?php 
      }
         ?>
   
   


    <?php } ?>
    
  </tbody>
</table>
	<br><br><br>
  <p style="display: inline; float: left ">Firma maestro&nbsp;</p><p style="display: inline;">_________________</p>
  <p style="display: inline; float: right">_________________</p><p style="display: inline; float: right">Firma Director&nbsp;</p>
  <div style="page-break-before: always;height:0; line-height:0;">

  </div>
</div>
 <?php } ?>
 </body>
 </html>
