<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require '../../conexion.php';

$id = $_GET['id'];

$query = mysqli_query($conexion, "SELECT * FROM materias WHERE idMa = '$id'");
$row = mysqli_fetch_array($query);
$grado =$row[3];

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

    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Ver estudiantes</a>
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
        <h1>Aquí podra ver el perfil de  sus estudiantes</h1>
      </div>
    </header>

<?php 
	
 $query = mysqli_query($conexion,"SELECT idEs, Nombre, Apellido FROM estudiantes WHERE IdG='$grado' ORDER BY Apellido"); 
	// $resultado = mysqli_fetch_array($query);

?>

<br>
   <div class="container">
    <div class="row">
    	<div class="col-lg-12">
        <div class="table-responsive">
    		<table align="center" class="table">
  <thead >
    <tr align="center">
      <th scope="col">Carné</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <?php  while($row =mysqli_fetch_array($query)){?>
  <tbody>
    <tr align="center">
      <!-- <th>1</th> -->
      <td scope="row"><?php echo $row['idEs']; ?></td>
      <td><?php echo utf8_encode($row['Apellido']." ".$row['Nombre']); ?></td>
      <td><a href="fun/mostrarEs.php?id=<?php echo $row[0]?>&g=<?php echo $id ?>"><i style="color:black" class="fa fa-eye "></i></a></td>
    </tr>
  </tbody>
  <?php } ?>
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
