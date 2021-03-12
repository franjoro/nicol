<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require_once("../../conexion.php");


  $usu = $_SESSION['username'];

  $query = mysqli_query($conexion,"SELECT Nombre, Apellido, Puesto FROM maestros WHERE idM = '$usu' ORDER BY Apellido ASC ");
  $row = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Menu de acciones</title>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  <meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Códigos</a>
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
        <h1>Códigos de ética y observaciones</h1>
        <p class="lead">Maestro: <?php echo utf8_encode($row['Nombre']." ".$row[1]) ?></p>

      </div>
    </header>

    <br><br>
  <div align="center" class="container">
    <h3>Listado de mis alumnos</h3>
		<div class="row">
		  <!-- <div class="col-md-6"></div> -->
      <div class="col-md-12 table-responsive">
        <table class="table  table-bordered" id="tabla">
        <thead>
          <tr>
            <th>Código</th>
        <th>Estudiante</th>
        <th>Grado</th>
        <th>Código</th>
        <th>Observación</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $id=$_GET['id'];
          $query=mysqli_query($conexion,"SELECT IdG FROM materias WHERE idMa='$id'");
          while($row1=mysqli_fetch_array($query)){

          $sql= mysqli_query($conexion,"SELECT * FROM estudiantes WHERE IdG='$row1[0]' ORDER BY Apellido");
          while ($row=mysqli_fetch_array($sql)) {
            ?>
        <tr>

          <td><?php echo $row[0] ?></td>
          <td><?php echo utf8_encode($row[2]) ?></td>
	  <td><?php echo utf8_encode($row[1]) ?></td>
          <td><?php echo $row[4] ?></td>
          <td style="width: 10px"><a href="aplicado.php?id=<?php echo $row[0] ?>&ma=<?php echo $id ?>"><i class="fa fa-eye "></i></a></td>
          <td style="width: 10px"><a href="observacion.php?id=<?php echo $row[0] ?>&ma=<?php echo $id ?>"><i class="fa fa-search "></i></a></td>
        </tr>
           <?php 
         }}?>

        </tbody>
     
      </table>  </div>
			</div>
		</div>

    <div class="clear" style="width: 100%; height: 200px;"></div>

         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="../js/datatables.min.css"/>
        <script type="text/javascript" src="../js/datatables.min.js"></script>
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
} );         </script>
</body>
</html>

<?php 
}else{
  header("location:../../sign/destruir.php");
}
 ?>
