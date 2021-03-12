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
        <title>Usuarios</title>
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
                        <a href="usuarios.php" class="selected">
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

                        <h4 class="toy">Usuarios</h4>
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
        <h4>Ingresar  nuevo usuario</h4>
      </div>
    </div>
      <div class="w3-quarter" onclick="document.getElementById('ver').style.display='block', document.getElementById('file').style.display='none'" style="cursor: pointer;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ver usuarios ingresados</h4>
      </div>
    </div>
          <div class="w3-quarter" onclick="document.getElementById('file').style.display='block',document.getElementById('ver').style.display='none' " style="cursor: pointer;">
      <div class="w3-container w3-indigo w3-padding-16">
        <div class="w3-left"><i class="fa fa-lock w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Cambiar acesso masivo</h4>
      </div>
    </div>


  </div>




<!-- BOTONES ============================================================================================= -->






                <p class="bum">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                
       <div class="w3-container" id="file" style="display: none">
  <h4 style="float: right;" onclick="document.getElementById('file').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>
   <center><h1>Cambiar acceso de usuarios masivamente</h1>
    <p>Por favor descargue el reporte de estudiantes.</p>
    <a href="fun/usuarios/reporte/index.php"><i class="fa fa-download" aria-hidden="true"></i> Descargar reporte</a>
    <br><br><br>
    <form action="fun/usuarios/archivos.php" method="POST" enctype="multipart/form-data">
      <input  type="file" onBlur='LimitAttach(this,1);' placeholder="Subir archivo" name="file" required=""> <br>
      <button class="w3-button w3-teal" type="submit">Aceptar</button>
    </form>
  </center>
 </div>       

 <div class="w3-container" id="ver" style="display: none">
        <h2>Usuarios ingresados</h2>
   <h4 style="float: right;" onclick="document.getElementById('ver').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>   
    <p>Tipos de usuario: </p>
      
      <ol>2:Administrativos</ol>
      <ol>3:Maestros</ol>
      <ol>4:Estudiantes</ol>

      <table class="w3-table w3-striped" id="tabla">
        <thead>
          <tr>
        <th>Usuarios</th>
        <th>Tipo de usuario</th>
        <th>Acceso</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $sql= mysqli_query($conexion,"SELECT * FROM users");
          while ($row= mysqli_fetch_array($sql)) { 
            if ($row[4]=='0') {
              $acceso="No";
            }else{
              $acceso="Si";
            }
              ?>
            
        <tr>
          <td><?php echo $row[1] ?></td>
          <td><?php echo $row[3] ?></td>
          <td><?php echo $acceso ?></td>
          <td><a href="fun/usuarios/contra.php?id=<?php echo $row[0] ?>"><i class="fa fa-edit "></i></a></td>
        </tr>
        <?php 
      }
         ?>
        </tbody>
     
      </table>
      
 </div>

<style type="text/css">
  a:hover{
    color:red;
  }
</style>
 
     </div>
   </div>



 <div id="modal_ingresos" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_ingresos').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Ingresar un nuevo usuario administrativo</h2>
      </header>
      <div class="w3-container">
       <form class="w3-container" method="POST" action="fun/usuarios/ingresar.php">
        <br>
 


  <div class="w3-row-padding">
  <br>
  <div class="w3-half">
    <label>Usuario</label>
    <input class="w3-input w3-border" type="text" name="user" onkeypress="javascript: return ValidarNumero(event,this)"  >
  </div>
  <div class="w3-half">
    <label>Contraseña</label>
    <input class="w3-input w3-border" type="text" name="contra" >
  </div>
 <br>
</div>
<br>
<button type="submit"  class="w3-button w3-green" style="float: right;">Ingresar</button>
<br>
</form> <br>
      </div>


   
    </div>
  </div>


        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="js/datatables.min.css"/>
        <script type="text/javascript" src="js/datatables.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>


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


<script type="text/javascript">
  function LimitAttach(tField,iType) { 
file=tField.value; 
if (iType==1) { 
extArray = new Array(".csv"); 
} 
if (iType==2) { 
extArray = new Array(".swf"); 
} 
if (iType==3) { 
extArray = new Array(".exe",".sit",".zip",".tar",".swf",".mov",".hqx",".ra",".wmf",".mp3",".qt",".med",".et"); 
} 
if (iType==4) { 
extArray = new Array(".mov",".ra",".wmf",".mp3",".qt",".med",".et",".wav"); 
} 
if (iType==5) { 
extArray = new Array(".php",".htm",".shtml"); 
} 
if (iType==6) { 
extArray = new Array(".doc",".xls",".ppt"); 
} 
allowSubmit = false; 
if (!file) return; 
while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1); 
ext = file.slice(file.indexOf(".")).toLowerCase(); 
for (var i = 0; i < extArray.length; i++) { 
if (extArray[i] == ext) { 
allowSubmit = true; 
break; 
} 
} 
if (allowSubmit) { 
} else { 
tField.value=""; 
alert("Sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\nPor favor seleccione un nuevo archivo"); 
} 
}  
</script>
<script type="text/javascript">
  function ValidarNumero(e, campo){
    key = e.keyCode ? e.keyCode : e.which;
    if (key == 32) {return false;}
} 
</script>
    </body>
</html>
<?php 
}else{
  header("location:../sign/destruir.php");
}
 ?>