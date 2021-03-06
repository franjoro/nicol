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
        <title>Notas</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
                           <i class="fas fa-user-graduate " aria-hidden="true"></i>
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
                        <a href="#" class="selected">
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
                        <a href="conducta.php" >
                           <i class="fa fa-check-circle" aria-hidden="true"></i>
                            Conducta
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="../sign/destruir.php">
                          <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Cerrar sesi??n
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

                        <h4 class="toy">Notas</h4>
                    </div>
                </nav>

<!-- BOTONES ============================================================================================= -->


  <div class="w3-row-padding w3-margin-bottom w3-animate-opacity" >
    <div class="w3-quarter" onclick="document.getElementById('modal_ingresos').style.display='block'" style="cursor: pointer;">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-plus w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Finalizar bimestre</h4>
      </div>
    </div>
    <a href="fun/notas/actxma.php">
      <div class="w3-quarter" style="cursor: pointer;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ver actividades y acumulados por <b>materia</b></h4>
      </div>
    </div>
    </a>
    <a href="fun/notas/notasxa.php">
          <div class="w3-quarter" style="cursor: pointer;">
      <div class="w3-container w3-indigo w3-padding-16">
        <div class="w3-left"><i class="fa fa-check w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ver notas por c??digo de <b>alumno</b></h4>
      </div>
    </a>
    </div>
    <!-- <a href="grados/bimestre.php"> -->
      <div class="w3-quarter" onclick="document.getElementById('modal_reporte').style.display='block'" style="cursor: pointer;"> 
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fas fa-poll-h w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="gastob"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Reporte de notas</h4>
      </div>
    </div>
    </a>

  </div>




<!-- BOTONES ============================================================================================= -->






                <p class="bum">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

  <div class="w3-container" id="file" style="display: none">
        <h2>Notas por c??digo de alumno</h2>
   <h4 style="float: right;" onclick="document.getElementById('file').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>   

   <!-- AQUIIIIIIII 2 -->
      
 </div>               
    

 <div class="w3-container" id="ver" style="display: none">
        <h2>Actividades por materia</h2>
   <h4 style="float: right;" onclick="document.getElementById('ver').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>   
    <!-- AQUUIIIIIIIIIIII 1--> 
      
 </div>

<style type="text/css">
  a:hover{
    color:red;
  }
</style>
 
     </div>
   </div>



 <div></div>
<div id="modal_ingresos" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_ingresos').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Finalizar bimestre</h2>
      </header>
      <div class="w3-container">
  <form class="w3-container" method="POST" action="fun/notas/bimestre.php">
        <br>
   <div class="w3-row-padding">
  <br>
  <h1><center>??Atenci??n!</h1>
  <p style="color:red">La siguiente acci??n tiene como consecuencia finalizar el bimestre escolar, lo que tiene repercusiones en toda la informaci??n plataforma, por favor verificar si tiene los permisos adecuados administrativos, el cambio no es reversible, informaci??n o ayuda comunicarse con el t??cnico.</p>
    </center>
 <br>
</div>
<br>
<button type="submit"  class="w3-button w3-green" style="float: right;">Finalizar bimestre</button>
<br>
</form> <br>
      </div>


    </div>
  </div>
 
   <div id="modal_reporte" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_reporte').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Reporte</h2>
      </header>
      <div class="w3-container">
  <center><h1>Seleccione formato:</h1> <br>
  <div class="3-row">
<a href="grados/bimestre.php"><button type="button" class="btn btn-success btn-lg"> <i class="fa fa-file" aria-hidden="true"></i>Grado</button></a>
<a href="grados/bimeS.php"><button class="btn btn-info btn-lg"><i class="fa fa-file" aria-hidden="true"></i>Consolidado Bimestral</button></a>
    <a href="grados/indexNF.php"><button class="btn btn-info btn-lg"><i class="fa fa-file" aria-hidden="true"></i>Final</button></a>
     <a href="grados/indexSaaa.php"><button class="btn btn-info btn-lg"><i class="fa fa-file" aria-hidden="true"></i>Consolidado Anual</button></a>
  </div>
  <br>
  </center>
      </div>
    </div>
  </div>
        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
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