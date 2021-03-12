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

        <title>Materias</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  

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
                       <a href="materia.php" class="selected">
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

                        <h4 class="toy">Materias</h4>
                    </div>
                </nav>

<!-- BOTONES ============================================================================================= -->


                <div class="w3-row-padding w3-margin-bottom w3-animate-opacity" >
    <div class="w3-quarter" onclick="document.getElementById('modal_ingreso').style.display='block'" style="cursor: pointer;">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-plus w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ingresar materias</h4>
      </div>
    </div>
      <div class="w3-quarter" onclick="document.getElementById('ver').style.display='block'" style="cursor: pointer;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ver materias</h4>
      </div>
    </div>
    <!-- <a href="pdf/indexMa.php"> -->
    <div class="w3-quarter" onclick="document.getElementById('modal_reporte').style.display='block'" > 
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fas fa-poll-h w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="gastob"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Reportes</h4>
      </div>
    </div>
              <div class="w3-quarter" onclick="document.getElementById('edicion').style.display='block',document.getElementById('ver').style.display='none' " style="cursor: pointer;">
      <div class="w3-container w3-indigo w3-padding-16">
        <div class="w3-left"><i class="fa fa-check w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Permisos edición (P.E)</b></h4>
      </div>
    </div>
    </a>
  </div>




<!-- BOTONES ============================================================================================= -->


                <p class="bum">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

      <div class="w3-container" id="ver" style="display: none">
        <h2>Materias ingresadas</h2>
        <h4 style="float: right; margin-top:-40px ; " onclick="document.getElementById('ver').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>
  <table class="w3-table w3-striped" id="tabla">
    <thead>

    <tr>
      <th>Código</th>
      <th>Materia</th>
      <th>Grado</th>
      <th>Maestro</th>
      <th>Maestro 2</th>
      <th>P.E  Act.1</th>
      <th>P.E  Act.2</th>
      <th>P.E Examen</th>
      <th>Ver</th>
    </tr>
    </thead>
      <?php 
$sql = mysqli_query($conexion,"SELECT * FROM materias");
while ($row=mysqli_fetch_array($sql)) {

  
  if ($row[6]=='1') {
  $text ="Activo";
}elseif($row[6]=='0'){
  $text="Bloqueado";
}

  if ($row[7]=='1') {
  $text1 ="Activo";
}elseif($row[7]=='0'){
  $text1="Bloqueado";
}

  if ($row[8]=='1') {
  $text2 ="Activo";
}elseif($row[8]=='0'){
  $text2="Bloqueado";
}


 ?>
    <tr>
      <td><?php echo utf8_encode($row[0]) ?></td>
      <td><?php echo utf8_encode($row[1]) ?></td>
      <td><?php echo $row[3] ?></td>
      <td><?php echo $row[4] ?></td>
      <td><?php echo $row[5] ?></td>
      <td><?php echo $text ?></td>
      <td><?php echo $text1 ?></td>
      <td><?php echo $text2 ?></td>

    
    <td><a href="fun/materias/edit.php?id=<?php echo $row[0] ?>"><i class="fa fa-eye"></i></a></td>
    </tr>

 <?php 
}
       ?>
    
  </table>
      </div>


    <div class="w3-container" id="edicion" style="display: none">

      <div class="w3-half">
        <h3>Bloquear todas las materias</h3> 

        <p style="color:black">Esta acción limitara la edición de TODAS las actividades para todos los maestros y materias</p>
        <p>(Irreversible en panel de permisos)</p>
        <br>
        <button id="si" class="w3-button w3-red">Bloquear actividades</button>
        <button id="no" class="w3-button w3-green">Desbloquear actividades</button>
      </div>
      <div class="w3-half">
        <form method="POST" action="fun/materias/permiso0todo.php">
        <h3>Panel de permiso</h3>
        <p style="color: black">Seleccione solo las actividades que desea bloquear a TODAS las materias y a todos los maestros</p>
        <label>Primer 30%</label>
        <input type="checkbox" class="w3-check" value="1" name="1">
        <label>Segundo 30%</label>
        <input type="checkbox" class="w3-check" value="2" name="2">
        <label>Examen</label>
        <input type="checkbox" class="w3-check" value="3" name="3">
        <br><br>
        <button class="w3-button w3-green" type="submit">Editar permisos</button>
        </form>
      </div>
      </div>
            </div>
        </div>

<!-- MODAL =========================================================================================== -->
 <div id="modal_ingreso" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modal_ingreso').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Ingresar materia</h2>
      </header>
      <div class="w3-container">
       <form class="w3-container" method="POST" action="fun/materias/ingresar.php">
        <br>
 

  <div class="w3-row-padding">
  <label>Nombre de la materia</label>
  <input type="text" required="" name="name" class="w3-input w3-border">
</div>
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Código</label>
    <input required="" class="w3-input w3-border" type="text" name="cod" onkeypress="javascript: return ValidarNumero(event,this)" >
  </div>
  <div class="w3-half">
    <label>Grado</label>
  <select required="" class="w3-select w3-border" name="option">
    <option value="" disabled selected>Seleccionar grado</option>
    <?php 
    $sql1=mysqli_query($conexion,"SELECT * FROM grados");

    while ($roww=mysqli_fetch_array($sql1)) {
     ?>
    <option value="<?php echo $roww[0] ?>"><?php echo $roww[1]." ".$roww[2] ?></option>
    <?php } ?>
  </select>    
  </div>
 <br>

</div>

<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Maestro</label>
    <select required="" class="w3-select w3-border" name="maestro">
    <option value="" disabled selected>Seleccionar maestro</option>
    <?php 
    $sql1=mysqli_query($conexion,"SELECT * FROM maestros");

    while ($roww=mysqli_fetch_array($sql1)) {
     ?>
    <option value="<?php echo $roww[0] ?>"><?php echo utf8_encode($roww[1]." ".$roww[2]) ?></option>
    <?php } ?>
  </select>   
  </div>
  <div class="w3-half" id="segundo" >
    <label>Maestro 2</label>
      <select class="w3-select w3-border" name="maestro1">
    <option value="" disabled selected>Seleccionar maestro</option>
    <?php 
    $sql1=mysqli_query($conexion,"SELECT * FROM maestros ORDER BY Apellido ASC");

    while ($roww=mysqli_fetch_array($sql1)) {
     ?>
    <option value="<?php echo $roww[0] ?>"><?php echo utf8_encode($roww[1]." ".$roww[2]) ?></option>
    <?php } ?>
  </select>   
  </div>
 
 
</div>
<br>

<div class="w3-row-padding" id="bimestre">
    <label>Seleccione Semestre</label>
      <select class="w3-select w3-border" name="BimestreRole">
       	  <option value="" disabled selected>Seleccionar semestre</option>
 		  <option value="1">Semestre 1</option>
 		  <option value="2">Semestre 2</option>
  		</select>   
  
</div>
<label>¿Cuenta con más de un maestro?</label>
<input class="w3-check" type="checkbox" id="check" name="opcion">
<label>Si</label>
<br>
<label>Materia Bimestral</label>
<input class="w3-check" type="checkbox" id="check1" name="opcion">



<br>
<button type="submit" class="w3-button w3-green" style="float: right;">Ingresar</button>
<br>
</form> <br>
      </div>
    </div>
  </div>



</div>

<!-- MODAL =========================================================================================== -->
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
<a href="grados/indexMa.php"><button type="button" class="btn btn-success btn-lg"> <i class="fa fa-file" aria-hidden="true"></i>Grado</button></a>
<a href="pdf/indexMa.php"><button class="btn btn-info btn-lg"><i class="fa fa-file" aria-hidden="true"></i>Global</button></a>
  </div>
  <br>
  </center>
      </div>
    </div>
  </div>



        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
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
           $(document).ready(function() {
    $('#edit').DataTable( {
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
       var $loading = $('#segundo').hide();
       var num =0;
   $(document).on("click","#check",function(){
    var $loading = $('#segundo');

     if (num==0) {
      $loading.show();
      num=1;
     }else{

       if (num==1) {
      $loading.hide();
      num=0;
     }
   }
   })


       var $loading1 = $('#bimestre').hide();
       var num1 =0;
   $(document).on("click","#check1",function(){
    var $loading = $('#bimestre');

     if (num1==0) {
      $loading1.show();
      num1=1;
     }else{

       if (num1==1) {
      $loading1.hide();
      num1=0;
     }
   }
   })
</script>



<script type="text/javascript">
  function ValidarNumero(e, campo){
    key = e.keyCode ? e.keyCode : e.which;
    if (key == 32) {return false;}
} 
</script>
<script type="text/javascript">
  $("#si").click(function(){
    var pre=confirm("La siguiente acción bloqueara la edicion para todas las materias ¿Deseá continuar?");
    if (pre) {
      location.href="fun/materias/permiso0.php"
    }
});
    $("#no").click(function(){
     var pre=confirm("La siguiente acción desbloqueara la edicion para todas las materias ¿Deseá continuar?");
    if (pre) {
      location.href="fun/materias/permiso1.php"
    }
});
</script>

    </body>
</html>
<?php 
}else{
  header("location:../sign/destruir.php");
}
 ?>