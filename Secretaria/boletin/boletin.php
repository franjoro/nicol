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
 	$id = "grado-20";
 		$query = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$id'");
		$row = mysqli_fetch_array($query);

		$lala = $row['IdEs'];
		$lele = $row['Nombre'];
		$lili = $row['Apellido'];
		$lolo = $row['IdG'];
		
		$query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

		$rowi = mysqli_fetch_array($query2);

		$ja = $rowi['Nombre'];
		$je = $rowi['Seccion'];

 	 ?>


 	<div class="container">
 	<div style="margin-top: 40px">
 		<img style="float: left" width="300" height="80" src="img/logo.png">
 		<h4 class="pip" style="float: right">Bimestre Uno</h4>
 	</div>
<br><br><br><br>
 	<h1>Boletin de notas</h1>
 	<div style="width: 480px">
 	<table width="450" class="table">
 		<tr>
 			<td>Carné: <?php echo $lala ?></td>
 			<td>Alumno: <?php echo $lili.",".$lele ?></td>
 		</tr>
 		<tr>
 			<td>Grado: <?php echo $ja ?></td>
 			<td>Sección: <?php echo $je ?></td>
 		</tr>
 	</table>
 	</div>

 	 	
 	<div class="table-responsive">
 		<table class="table">
  <thead class="thead-dark">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Materia</th>
      <th scope="col">Act1</th>
      <th scope="col">Act2</th>
      <th scope="col">Exam</th>
      <th scope="col">Prom</th>

    </tr>
  </thead>
 	<?php 

 		$query = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id'");
 		while ($row = mysqli_fetch_array($query))
	{
		$query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 1 ");
		$query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 2 ");
		$query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$row[0]' AND Role = 3 ");

		$rowi2 = mysqli_fetch_array($query3);
		$rowi5 = mysqli_fetch_array($query5);
		$rowi7 = mysqli_fetch_array($query7);
		$query4 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi2[0]'");
		$query6 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi5[0]'");
		$query8 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi7[0]'");


		$rowi3 = mysqli_fetch_array($query4);
		$rowi6 = mysqli_fetch_array($query6);
		$rowi8 = mysqli_fetch_array($query8);

		$haha = $rowi3[0];
		$hehe =	$rowi6[0];
		$hihi =	$rowi8[0];
		$rowi9 = $haha + $hehe +$hihi;

 	 ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['1'] ?></th>
      <td><?php echo $haha ?></td>
      <td><?php echo $hehe ?></td>
      <td><?php echo $hihi ?></td>
      <td><?php echo $rowi9 ?></td>

    </tr>
    
    <?php } ?>
  </tbody>
</table>
 	</div>
</div>
 
 </body>
 </html>