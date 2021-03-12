<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require '../../conexion.php';

$id = $_GET['id'];

$query = mysqli_query($conexion, "SELECT * FROM materias WHERE idMa = '$id'");
$row25 = mysqli_fetch_array($query);
$grado =$row25[3];
$materia =$row25[0]

 ?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ver Estudiantes</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="../css/scrolling-nav.css" rel="stylesheet">
</head>
 <body id="page-top">


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


    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Ver acumulados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="../index.php"><i class="fas fa-home"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Aquí podra ver sus acumulados</h1>
      </div>
    </header>


<br>
   <div class="container">
      <div class="row">
    	  <div class="col-lg-10">
             <div class="table-responsive">
    		<table align="center" class="table">
  <thead >
    <tr align="left">
      <th scope="col">Nombre</th>
      <th scope="col">I 30%</th>
      <th scope="col">II 30%</th>
      <th scope="col">Exam</th>
    </tr>
  </thead>
  

  <tbody>
    <?php  
       $query50 = mysqli_query($conexion,"SELECT idEs, Nombre, Apellido FROM estudiantes WHERE IdG='$grado' ORDER BY Apellido"); 
       while($row50 =mysqli_fetch_array($query50)){
  

    ?>

    <tr>
      <td><?php echo utf8_encode($row50['2']." ".$row50['1']); ?></td>


 
      <th scope="col">II 30%</th>
      <th scope="col">II 30%</th>
      <th scope="col">Exam</th>


<?php } ?>

   





    </tr>
  </tbody>
  
</table>
              </div>
    	  </div>
    	
       </div>
   </div>


</body>
</html>
<?php 
}else{
  header("location:../../sign/destruir.php");
}
 ?>
