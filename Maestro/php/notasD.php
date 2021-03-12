<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require '../../conexion.php';

$id=$_GET['id'];
$act = $_GET['act'];

$query = mysqli_query($conexion, "SELECT * FROM materias WHERE idMa = '$id'");
$row = mysqli_fetch_array($query);
$grado =$row[3];

$query111 = mysqli_query($conexion, "SELECT * FROM bimestre");
$row111 = mysqli_fetch_array($query111);


$sql=mysqli_query($conexion,"SELECT * FROM actividades WHERE idMa='$id' AND Role='$act' AND Bimestre='$row111[0]' ");
$row1=mysqli_fetch_array($sql);
$num=$row1[17];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Notas</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/scrolling-nav.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Acumulados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="menu2.php?id=<?php echo $id ?>">Atrás</a>
            </li>
            <li class="nav-item">
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="../index.php">Inicio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Notas de la actividad </h1>
        <h3>Titulo: <b><?php echo $row1[1] ?></b></h3>
        <p class="lead">Sobre la actividad: <?php echo $row1[2] ?></p>
        
      </div>
    </header>
<?php 
  


     ?>
    <br>
    <?php $query = mysqli_query($conexion,"SELECT idEs, Nombre, Apellido FROM estudiantes WHERE IdG='$grado' "); ?>

     <div class="container">
      <div class="row">
    	 <div class="col-lg-12">
        <div class="table-responsive">
         <div id="div1"></div> 
        <!-- ============= TABLA CON JQUERY -->
        </div>
      </div>
      
    </div>
   </div>
   
   <script src="../vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
// obtener========================================
      function obtener(){
        $.ajax({
          url:"fun/mostrar1D.php?id=<?php echo $id ?>&act=<?php echo $act ?>",
          method: "POST", 
          success: function(data){
            $("#div1").html(data)

          }
        })
      }
      obtener();
});
</script>


</body>
</html>
<?php 
}else{
  header("location:../../sign/destruir.php");
}
 ?>
