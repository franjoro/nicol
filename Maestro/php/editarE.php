<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '3'){
require '../../conexion.php';
$id = $_GET['id'];
$bum = $_GET['act'];

$bi =mysqli_query($conexion,"SELECT * FROM  bimestre");
$rowbi =mysqli_fetch_array($bi);
 ?>


<!DOCTYPE html>
<html>
<head>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acumulados - Actividades</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

   

    <script>
      
$(document).on("click","#boton", function(){
        var ti = $("#titulo").val();
        var des= $("#des").val();
         $.ajax({
        url:"fun/editE.php?id=<?php echo $id ?>&act=3",
        method: "POST",
        data: {ti:ti,des:des},
        success:function(data){
            alert(data);
            location.href='menu.php?id=<?php echo $id ?>';
        }
      })


})

$(document).on("click","#eliminar", function(){

    var si = confirm("¿Eliminar examen permanentemente?, las notas ingresadas de este examen seran eliminadas")
    if (si) {
                 $.ajax({
        url:"fun/eliminar.php?id=<?php echo $id ?>&act=3",
        method: "POST",
        success:function(data){
            alert(data);
            location.href='menu.php?id=<?php echo $id ?>';
        }
      })
 
    }
})

    </script>

</head>
<body >

	 <body id="page-top" >

    <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Acumulados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
             <a style="color: snow;" class="nav-link js-scroll-trigger" href="../index.php"><i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a style="color: snow;" class="nav-link js-scroll-trigger" href="menu.php?id=<?php echo $id ?>"><i class="fas fa-arrow-left"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Aquí podra <b>editar</b> la información del examen</h1>
      </div>
    </header>
<?php 
$sql=mysqli_query($conexion,"SELECT Titulo,Descripcion FROM actividades WHERE idMa='$id' AND Role='3' AND Bimestre='$rowbi[0]' ");
$row=mysqli_fetch_array($sql);
 ?>	
    <br>
    <div class="container"><div class="row">
        <div class="col-lg-6"><h4>Indicadores</h4><textarea id="titulo" class="form-control one border border-dark"><?php echo $row[0] ?></textarea> </div>
        <div class="col-lg-6"><h4>Contenido</h4> <textarea id="des" class="form-control one border border-dark"><?php echo $row[1] ?></textarea></div>    
    </div>
    </div>
    <div class="container" ><br><br>
    <hr><br><br>
        <button type="button" id="eliminar" class="btn btn-danger" style="float: right;">Eliminar</button>
        <button type="button" id="boton" class="btn btn-success" style="float: right;">Actualizar</button><br><br>
  


<!-- 
<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">&copy; iCoding 2018</p>
      </div>
      <!-- /.container -->
    <!-- </footer> -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="../js/scrolling-nav.js"></script>

</body>
</html>
<?php 
}else{
  header("location:../../sign/destruir.php");
}
 ?>
