<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require '../../conexion.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Profesor Guia</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/scrolling-nav.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    
</head>
<body>
<body id="page-top">

    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Profesor Guía</a>
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
        <h1>Aquí podra ver sus estudiantes como profesor guía</h1>
        <p class="lead">y ver su resumen de conducta</p>
      </div>
    </header>

    <div class="container" id="ver">
    	<!-- <div class="w3-container" id="ver" style="display: none"> -->
        <h2>Estudiantes ingresados </h2>
  <!-- <h4 style="float: right;" onclick="document.getElementById('ver').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>     -->
  <div class="table-responsive">
      <table class="table" id="tabla">
        <thead>
          <tr>
            <th>Código</th>
        <th>Nombre</th>
        <th>Ver</th>
        </tr>
        </thead>
        <tbody>
          <?php 

          $usu = $_SESSION['username'];

          $query2 = mysqli_query($conexion, "SELECT IdG FROM maestros WHERE idM = '$usu' ");

          $rowi = mysqli_fetch_array($query2);

          $bum = $rowi['IdG'];


          $sql= mysqli_query($conexion,"SELECT * FROM estudiantes WHERE IdG = '$bum' ORDER BY Apellido ASC ");
          while ($row=mysqli_fetch_array($sql)) {
            ?>
        <tr>

          <td><?php echo $row[0] ?></td>
          <td><?php echo utf8_encode($row[2]).", ".utf8_encode($row[1]) ?></td>
          <td><a href="fun/mostrar.php?id=<?php echo $row[0] ?>"><i class="fa fa-eye "></i></a></td>
        </tr>
           <?php 
          }?>

        </tbody>
     
      </table>
      
 </div>

</div>

<link rel="stylesheet" type="text/css" href="js/datatables.min.css"/>
    <script type="text/javascript" src="js/datatables.min.js"></script>
	<script type="text/javascript">
           $(document).ready(function() {
    $('#tabla').DataTable( {
        "language": {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
    } );
} );         
</script>

</body>
</html>
<?php 
}else{
  header("location:../../sign/destruir.php");
}
 ?>