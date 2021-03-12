<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '1'){
require("../conexion.php");
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Administrador</title>
       

<!-- Esto se cambia -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!-- // -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" type="text/css" href="css/w3.css">
         <link rel="icon" href="img/1.png">

    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav style="background: #34495e" id="sidebar">
                <div class="sidebar-header logo">
                    <!-- <h3>Administrador</h3> -->
                    <!-- <strong class="pop">CDB</strong> -->
                </div>

                 <ul class="list-unstyled yei">
                   
                    <li>
                        <a href="grados.php" >
                            <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                            Grados
                        </a>
                    </li>
                    <li>
                        <a href="estudiantes.php">
                           <i class="fas fa-user-graduate" aria-hidden="true"></i>
                            Estudiantes
                        </a>
                    </li>
                    <li>
                       <a href="maestros.php">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Maestros
                        </a>
                    </li>
                    <li>
                       <a href="materia.php">
                           <i class="fa fa-book" aria-hidden="true"></i>
                            Materias
                        </a>
                    </li>
                    <li>
                        <a href="notas.php">
                            <i class="fas fa-book-open" aria-hidden="true"></i>
                            Notas
                        </a>
                    </li>
                    <li>
                        <a href="usuarios.php">
                           <i class="fa fa-user" aria-hidden="true"></i>
                            Usuarios
                        </a>
                    </li>
                    <li>
                        <a href="conducta.php">
                           <i class="fa fa-check-circle" aria-hidden="true"></i>
                            Conducta
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="../sign/destruir.php">
                          <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Cerrar sesión
                        </a>
                    </li>
                </ul>

            </nav>


            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-success navbar-btn">
                              <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                        </div>

                        <h4 class="toy">Administrador</h4>
                    </div>
                </nav>

                <h2 align="center">Bienvenido Administrador</h2>
                <p class="bum">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

<?php 
$es = mysqli_query($conexion,"SELECT COUNT(IdEs) FROM estudiantes");
$row1= mysqli_fetch_array($es);

$ma = mysqli_query($conexion,"SELECT COUNT(idM) FROM maestros");
$row2= mysqli_fetch_array($ma);
 ?>




                 <div class="w3-row-padding w3-margin-bottom w3-animate-opacity" >
    <div class="w3-half" onclick="document.getElementById('modalES').style.display='block'" style="cursor: pointer;">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fas fa-user-graduate w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"><?php echo $row1[0] ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Estudiantes</h4>
      </div>
    </div>
      <div class="w3-half" onclick="document.getElementById('ver').style.display='block', document.getElementById('file').style.display='none'" style="cursor: pointer;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"><?php echo $row2[0] ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Maestros</h4>
      </div>
    </div>


  </div>

<?php 
$b=mysqli_query($conexion,"SELECT id FROM bimestre");
$bb=mysqli_fetch_array($b);

if ($bb[0]=='4') {
 ?>
      <a href="../Year/index.php">         
 <div class="w3-row-padding w3-margin-bottom w3-animate-opacity" >   
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-center"><i class="fas fa-graduation-cap w3-xxxlarge"></i></div>
        <div class="w3-right">

        </div>
        <div class="w3-clear"></div>
        <h4>Configuración año <?php $date = date('Y')+1; echo $date ?></h4>
        <p style="color:black">¡Alerta! Esta acción es irreversible y afectara el uso de la plataforma. Usar únicamente al finalizar el año escolar </p>
      </div>
  </div>
  </a>
<?php 
 }
 ?>


            </div>
        </div>








        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
<?php 
}else{
  header("location:../sign/destruir.php");
}
 ?>