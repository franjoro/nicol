<?php 

session_start();

require '../../Conexion.php';


  $query = mysqli_query($conexion, "SELECT * FROM grados ORDER BY idG ASC");


 ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>grados Reportes</title>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../../Maestro/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../Maestro/css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Maestros por grados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="#about">Estudiantes</a>
            </li>
            <li class="nav-item">
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="#services">Materias</a>
            </li>
            <li class="nav-item">
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="#contact">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Aqu?? puede ver los grados</h1>
        <p class="lead">Seleccione el grado del cual quiere un reporte</p>
      </div>
    </header>

  <div class="container">
  <div class="row">
<div class="col-lg-12 col-md-6">
  <?php while ($rowi=mysqli_fetch_array($query)) { ?>
  <a href="../pdf/indexmag.php?id=<?php echo $rowi[0] ?>"><button class="bubbly-button"><?php echo $rowi[1] ?></button></a>
  <?php } ?>
  </div>
  </div>
  </div>
    <script  src="js/index.js"></script>




</body>

</html>
