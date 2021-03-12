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
<!--         <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <title>Maestros</title>
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
                        <a href="grados.php"">
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
                       <a href="maestros.php"  class="selected">
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

                        <h4 class="toy">Maestros</h4>
                    </div>
                </nav>

<!-- BOTONES ============================================================================================= -->


 <div class="w3-row-padding w3-margin-bottom w3-animate-opacity" >
    
    <!--  <div class="w3-quarter" onclick="document.getElementById('modalES').style.display='block'" style="cursor: pointer;">
    <div class="w3-container w3-green w3-padding-16">
      <div class="w3-left"><i class="fa fa-plus w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ingresar un maestro</h4>
      </div>
    </div>    -->


      <div class="w3-quarter" onclick="document.getElementById('ver').style.display='block', document.getElementById('file').style.display='none'" style="cursor: pointer;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Ver maestros</h4>
      </div>
    </div>


      <!-- <div class="w3-quarter" onclick="document.getElementById('file').style.display='block',document.getElementById('ver').style.display='none' " style="cursor: pointer;">
      <div class="w3-container w3-indigo w3-padding-16">
        <div class="w3-left"><i class="fa fa-file-excel-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="ingresos_b"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Subir por archivo Excel</h4>
      </div>
    </div>    -->


    <a href="pdf/indexM.php">
    <div class="w3-quarter"> 
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-file-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3 id="gastob"></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Reporte de maestros</h4>
      </div>
    </div>
    </a>
  </div>




<!-- BOTONES ============================================================================================= -->
<!-- MODAL =========================================================================================== -->
 <div id="modalES" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-opacity">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('modalES').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Ingresar un maestro</h2>
      </header>
      <div class="w3-container">
        
<form action="fun/maestros/ingresar.php" method="POST">
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Código</label>
    <input class="w3-input w3-border" type="text" name="codigo" required onkeypress="javascript: return ValidarNumero(event,this)" >
  </div>
  <div class="w3-half">
      <label>Correo electrónico</label>
    <input class="w3-input w3-border" type="email" name="correo" required >
  </div>
 <br>
</div>
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Apellido</label>
    <input class="w3-input w3-border" type="text" name="apellido" required>
  </div>
  <div class="w3-half">
    <label>Nombre</label>
    <input class="w3-input w3-border" type="text" name="nombre" required>
  </div>
 <br>

</div>
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Genero</label>
     <select class="w3-select w3-border" name="option1" required>
    <option value="" disabled selected></option>
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
  </select>
  </div>
  <div class="w3-half">
    <label>Puesto</label>
    <input class="w3-input w3-border" type="text" name="pu" required >
  </div>

</div>
<div class="w3-row-padding">
  <br>

  <div class="w3-half">
    <label>Grado Guía</label>
  <select class="w3-select w3-border" name="grado">
    <option value="" disabled selected>Seleccionar grado</option>
    <?php 
    $sql1=mysqli_query($conexion,"SELECT * FROM grados");

    while ($roww=mysqli_fetch_array($sql1)) {
     ?>
    <option value="<?php echo $roww[0] ?>"><?php echo $roww[1]." ".$roww[2] ?></option>
    <?php } ?>
  </select> 
  </div>

</div>

 <br>
 <button class="w3-button w3-right w3-teal">Ingresar nuevo maestro</button>
 <br>

</form>


      </div>
    </div>
  </div>






                <p class="bum">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                
       
     

 <div class="w3-container" id="ver" style="display: none">
        <h2>Maestros ingresados </h2>
  <h4 style="float: right;" onclick="document.getElementById('ver').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>    
      <table class="w3-table w3-striped" id="tabla">
        <thead>
          <tr>
            <th>Código</th>
        <th>Maestro</th>
        <th>Cargo</th>
        <th>Correo</th>
        <th>Guía</th>
        <th>Ver</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $sql= mysqli_query($conexion,"SELECT * FROM maestros");
          while ($row=mysqli_fetch_array($sql)) {
            ?>
        <tr>

          <td><?php echo $row[0] ?></td>
          <td><?php echo $row[2]." ".$row[1] ?></td>
          <td><?php echo $row[4] ?></td>
          <td><?php echo $row[5] ?></td>
          <td><?php echo $row[6] ?></td>
          <td><a href="fun/maestros/edit.php?id=<?php echo $row[0] ?>"><i class="fa fa-eye "></i></a></td>
        </tr>
           <?php 
          }?>

        </tbody>
     
      </table>
      
 </div>

<style type="text/css">
  a:hover{
    color:red;
  }
</style>
 <div class="w3-container" id="file" style="display: none">
  <h4 style="float: right;" onclick="document.getElementById('file').style.display='none'">Cerrar <i class="fa fa-times" aria-hidden="true"></i></h4>
   <center><h1>Ingresar maestros por archivo</h1>
    <p>Por favor siga las instrucciones del instructivo paso a paso.</p>
    <a href=""><i class="fa fa-download" aria-hidden="true"></i> Descargar instructivo</a>
    <br><br><br>
    <form action="fun/maestros/archivo.php" method="POST" enctype="multipart/form-data">
      <input id="archivo" required type="file" onBlur='LimitAttach(this,1);' placeholder="Subir archivo" name="file" > <br>
      <button class="w3-button w3-teal" type="submit">Aceptar</button>
    </form>
  </center>
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
   $(document).on("click","#archivo",function(){
    alert("Recuerda poner los datos en orden *Revisa el instructivo")
   })
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