<?php 
session_start();
if($_SESSION['sesion_tipoUsuario'] == '2'){
require("../conexion.php");
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Conducta</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/w3.css">
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
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            Grados
                        </a>
                    </li>
                    <li>
                        <a href="estudiantes.php">
                           <i class="fa fa-address-card " aria-hidden="true"></i>
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
                            <i class="fa fa-folder-open-o" aria-hidden="true"></i>
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
                        <a href="conducta.php" class="selected">
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

                        <h4 class="toy">Conducta</h4>
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
        <h4>Ingresar nuevo código</h4>
      </div>
    </div>
      <div class="w3-quarter" onclick="document.getElementById('ver').style.display='block', document.getElementById('file').style.display='none'" style="cursor: pointer;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ver códigos ingresados</h4>
      </div>
    </div>
          <div class="w3-quarter" onclick="document.getElementById('file').style.display='block',document.getElementById('ver').style.display='none' " style="cursor: pointer;">
      <div class="w3-container w3-indigo w3-padding-16">
        <div class="w3-left"><i class="fa fa-check w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ver códigos aplicados</h4>
      </div>
    </div>


  </div>




<!-- BOTONES ============================================================================================= -->






                <p class="bum">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

  <div class="w3-container" id="file" style="display: none">
        <h2>Códigos aplicados y observaciones ingresadas</h2>
   <h4 style="float: right;" onclick="document.getElementById('file').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>   

      <table class="w3-table w3-striped" id="tabla">
        <thead>
          <tr>
        <th>Código aplicados</th>
        <th>Descripción</th>
        <th>Estudiante</th>
        <th>Código del maestro</th>
        <th>Fecha</th>
        <th>Bimestre</th>
        <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $sql= mysqli_query($conexion,"SELECT * FROM aplicados");
          while ($row= mysqli_fetch_array($sql)) { 
            $sql2=mysqli_query($conexion,"SELECT Codigo FROM codigo WHERE idCodigo='$row[1]'");
            $cod =mysqli_fetch_array($sql2);
              ?>
            
        <tr>
          <td><?php echo $cod[0] ?></td>
          <td><?php echo $row[2] ?></td>
          <td><?php echo $row[3] ?>&nbsp<a href="fun/conducta/mostrar.php?id=<?php echo $row[3] ?>"><i style="color:red" class="fa fa-eye "></i></a></td>
          <td><?php echo $row[4] ?></td>
          <td><?php echo $row[6]; ?></td>
          <td><?php echo $row[7] ?></td>
          <td data-id="<?php echo $row[0] ?>" id="click2"><i class="fa fa-ban "></i></a></td>
        </tr>
        <?php 
      }
         ?>
        </tbody>
     
      </table>
      
 </div>               
    

 <div class="w3-container" id="ver" style="display: none">
        <h2>Códigos ingresados</h2>
   <h4 style="float: right;" onclick="document.getElementById('ver').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>   
      <table class="w3-table w3-striped" id="tabla1">
        <thead>
          <tr>
        <th>Código</th>
        <th>Valor</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $sql= mysqli_query($conexion,"SELECT * FROM codigo");
          while ($row= mysqli_fetch_array($sql)) { 
    ?>
        <tr>
          <td><?php echo $row[1] ?></td>
          <td><?php echo $row[2] ?></td>
          <td data-id="<?php echo $row[0] ?>" id="click"><i class="fa fa-ban "></i></a></td>
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
        <h2>Ingresar un nuevo código</h2>
      </header>
      <div class="w3-container">
       <form class="w3-container" method="POST" action="fun/conducta/ingresar.php">
        <br>
 


  <div class="w3-row-padding">
  <br>
  <div class="w3-half">
    <label>Código de ética</label>
    <textarea class="w3-input w3-border" name="cod" required style="max-width: 100%"></textarea>
  </div>
  <div class="w3-half">
    <label>Valor</label>
   <select class="w3-select w3-border" name="option" required="">
    <option value="" disabled selected>Seleccionar valor</option>
    <option value="-10">-10</option>
    <option value="-5">-5</option>
    <option value="10">10</option>
    <option value="5">5</option>
  </select>
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
           $(document).ready(function() {
    $('#tabla1').DataTable( {
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
       $(document).on("click","#click",function(){ 
      var id =$(this).data("id");
      var mensaje= confirm("¿Eliminar permanentemente?");

      if (mensaje) {
                $.ajax({
        url:"fun/conducta/delete.php",
        method: "POST",
        data: {id:id},
        success:function(data){
        alert(data);
        location.reload();
        }
      })      
      }

  
       })
  </script>

  <script type="text/javascript">
   $(document).on("click","#click2",function(){ 
        var id =$(this).data("id");
       var mensaje= confirm("¿Eliminar permanentemente?");

       if (mensaje) {
           $.ajax({
        url:"fun/conducta/delete1.php",
        method: "POST",
        data: {id:id},
        success:function(data){
        alert(data);
        location.reload();
        }
      })
       }else{
        
       }

    })


  </script>  
  </body>
</html>
<?php 
}else{
  header("location:../sign/destruir.php");
}
 ?>