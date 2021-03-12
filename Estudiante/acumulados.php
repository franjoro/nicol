<?php 
session_start();
require '../conexion.php';
    
    if(isset($_SESSION['username']) AND $_SESSION['sesion_tipoUsuario'] == '4'){
        // echo "Hello\n". $_SESSION['nombre'];

         echo "\n <a style='display: none;' href='../destruir.php'><strong>Logout</strong></a>";

      }else{
        header("Location: ../sign/destruir.php");
      }

$bimestre=$_GET['b'];
$usu = $_SESSION['username'];
$ac=mysqli_query($conexion,"SELECT acceso FROM users WHERE Username='$usu'");
$acc=mysqli_fetch_array($ac);
if ($acc[0]=='1') {
 ?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Tus acumulados</title>
<link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../Maestro/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../Maestro/css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>

  <header class="gg text-white">

      <div class="container text-center">
        <img align="center" height="90" src="img/1.png"><br><br>
         <a style="cursor: pointer;" href="notas.php"><button style="cursor: pointer;" class="btn">Volver a mis notas</button></a>
        <h1>Aquí puedes ver tus acumulados</h1>
        <p>Podras ver los acumulados de la materia</p>
      </div>
    </header>
    <?php 

    $idMa = $_GET['id'];
    $usu = $_SESSION['username'];

    $maaa=mysqli_query($conexion,"SELECT * FROM materias WHERE idMa='$idMa'");
    $rowmaa=mysqli_fetch_array($maaa);
     ?>

    <div style="margin-top: 30px;" class="container">
    	<h3 style="font-weight: bold; font-family: 'Lobster Two'" align="center">Materia: <?php echo utf8_encode($rowmaa['Nombre']) ?> </h3>
                   
                <br>
    		<p align="center"><b>Primer 30%</b></p>
    <?php
    $sql=mysqli_query($conexion,"SELECT * FROM actividades WHERE idMa='$idMa'AND Role='1' AND Bimestre='$bimestre'");
    $row=mysqli_fetch_array($sql);
     ?>
    		<!-- <p align="center">Titulo:<?php echo utf8_encode($row[1]) ?></p>  -->
           <br>
    	<div class="row">
    		<div class="col-md-12">
    			<table class="table">
  <thead>
    <tr>
      <th style="background: #ecf0f1; text-align: center;" scope="col">Porcentaje</th>
      <!-- <th scope="col">Titulo</th> -->
      <th style="background-color: #95a5a6; text-align: center; color: #2c3e50" scope="col">Descripción</th>
      <th style="background-color: #34495e; text-align: center; color: white;" scope="col">Nota</th>
      
      <?php 
      // funcion NOTAS=============================
  $notas=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='1'   ");
  $rownotas =mysqli_fetch_array($notas);

  $notas1=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='2'  ");
  $rownotas1 =mysqli_fetch_array($notas1);

  $notas2=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='3'  ");
  $rownotas2 =mysqli_fetch_array($notas2);

  $notas3=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='4'  ");
  $rownotas3 =mysqli_fetch_array($notas3);

  $notas4=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='5'  ");
  $rownotas4 =mysqli_fetch_array($notas4);

  // $notas5=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='0'  ");
  // $rownotas5 =mysqli_fetch_array($notas5);


// funcion NOTAS============================= ?>
    </tr>
  </thead>
  <tbody>
    
      <?php
      $num=$row[17]; 
      if ($num=='1') {
$down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas[0].'</td> </tr>
';
      }elseif ($num=="2") {
$down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[9].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[8].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas1[0].'</td> </tr>
';

      }elseif ($num=="3") {
$down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[9].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[8].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas1[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[11].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[10].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas2[0].'</td> </tr>
';

      }elseif ($num=="4") {
$down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[9].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[8].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas1[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[11].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[10].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas2[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[13].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[12].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas3[0].'</td> </tr>';

      }elseif ($num=="5") {
      $down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[9].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[8].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas1[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[11].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[10].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas2[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[13].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[12].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas3[0].'</td> </tr>



      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[15].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[14].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas4[0].'</td> </tr>';
      }
      echo $down;
       ?>
     
      
  </tbody>
</table>

                <br><br>
<p align="center"><b>Segundo 30%</b></p>
    <?php
    $sql=mysqli_query($conexion,"SELECT * FROM actividades WHERE idMa='$idMa' AND Role='2' AND Bimestre='$bimestre' ");
    $row=mysqli_fetch_array($sql);
    $num =mysqli_num_rows($sql);
     
     ?>
        <!--  <p align="center">Titulo:<?php echo $row[1] ?></p>  -->
        
       <br>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
  <thead>
    <tr>
      <th style="background: #ecf0f1; text-align: center;" scope="col">Porcentaje</th>
      <!-- <th scope="col">Titulo</th> -->
      <th style="background-color: #95a5a6; text-align: center; color: #2c3e50" scope="col">Descripción</th>
      <th style="background-color: #34495e; text-align: center; color: white;" scope="col">Nota</th>
      <div style="float: right">
    
      
   
</div>

      <?php 
      // funcion NOTAS=============================
  $notas=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='1'   ");
  $rownotass =mysqli_fetch_array($notas);

  $notas1=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='2'  ");
  $rownotass1 =mysqli_fetch_array($notas1);

  $notas2=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='3'  ");
  $rownotass2 =mysqli_fetch_array($notas2);

  $notas3=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='4'  ");
  $rownotass3 =mysqli_fetch_array($notas3);

  $notas4=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='5'  ");
  $rownotass4 =mysqli_fetch_array($notas4);

  // $notas5=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='0'  ");
  // $rownotas5 =mysqli_fetch_array($notas5);


// funcion NOTAS============================= ?>
    </tr>
  </thead>
  <tbody>
    
      <?php
      $num=$row[17]; 
      if ($num=='1') {
$down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass[0].'</td> </tr>
';
      }elseif ($num=="2") {
$down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[9].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[8].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass1[0].'</td> </tr>
';

      }elseif ($num=="3") {
$down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[9].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[8].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass1[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[11].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[10].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass2[0].'</td> </tr>
';

      }elseif ($num=="4") {
$down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[9].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[8].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass1[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[11].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[10].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass2[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[13].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[12].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass3[0].'</td> </tr>';

      }elseif ($num=="5") {
      $down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[6].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[9].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[8].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass1[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[11].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[10].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass2[0].'</td> </tr>


      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[13].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[12].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass3[0].'</td> </tr>



      <tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[15].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[14].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotass4[0].'</td> </tr>';

      }elseif ($num=='0') {
       $texto2="No ingresado";
       $down='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$texto2.'</td>
      <td style="text-align: justify; max-width: 300px;">'.$texto2.'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$texto2.'</td> </tr>';
     }
      echo $down;
       ?>
     
      
  </tbody>
</table>


<!-- <p align="center"><b>Examen</b></p>
    <?php  /*
    $sql=mysqli_query($conexion,"SELECT * FROM actividades WHERE idMa='$idMa' AND Role='3' AND Bimestre='$bimestre' ");
    $row=mysqli_fetch_array($sql);
     */  ?>
        <p align="center">Titulo:<?php echo $row[1] ?></p>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
  <thead>
    <tr>
      <th style="background: #ecf0f1; text-align: center;" scope="col">Porcentaje</th>
      <!-- <th scope="col">Titulo</th> 
      <th style="background-color: #95a5a6; text-align: center; color: #2c3e50" scope="col">Descripción</th>
      <th style="background-color: #34495e; text-align: center; color: white;" scope="col">Nota</th>
      <div style="float: right">
      
</div>  


      <?php 
      // funcion NOTAS=============================
  $notas=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='1'   ");
  $rownotas =mysqli_fetch_array($notas);

  $notas1=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='2'  ");
  $rownotas1 =mysqli_fetch_array($notas1);

  $notas2=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='3'  ");
  $rownotas2 =mysqli_fetch_array($notas2);

  $notas3=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='4'  ");
  $rownotas3 =mysqli_fetch_array($notas3);

  $notas4=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='5'  ");
  $rownotas4 =mysqli_fetch_array($notas4);

  $notas5=mysqli_query($conexion,"SELECT Nota FROM notas WHERE idAct='$row[0]' AND IdEs='$usu' AND Role='0'  ");
  $rownotas5 =mysqli_fetch_array($notas5);


// funcion NOTAS============================= ?>
    </tr>
  </thead>
  <tbody>
    
      <?php
      $num=$row[17]; 
      if ($num=='0') {
$up='<tr><td style="font-weight: bold; text-align: center; font-size: 15px; vertical-align: middle;" scope="row">'.$row[7].'</td>
      <td style="text-align: justify; max-width: 300px;">'.$row[2].'</td>
      <td style="font-weight: bold; font-size: 18px; vertical-align: middle;" align="center">'.$rownotas5[0].'</td> </tr>
';
     }
      echo $up;
       ?>   -->
     
      
  </tbody>
</table>

    		</div>
    	</div>
    </div>

</body>
</html>
<?php 
}else{
  echo "Sin acceso temporal a la plataforma, Por favor comunicarse con administración para solventar";
}
 ?>
