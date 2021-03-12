  <?php 
require("../../../conexion.php");

   ?>
 <link rel="stylesheet" type="text/css" href="../../css/w3.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="w3-row">
  <a href="../../notas.php"><button class="w3-red w3-button">Regresar</button></a>
</div>
<br>
  <table class="w3-table w3-striped" id="tabla1">
        <thead>
          <tr>
        <th>Materia</th>
        <th>Id de la actividad</th>
        <th>N° Acumulados </th>
        <th>Tipo de actividad</th>
        <th>Bimestre</th>
        <th>Ver</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          $sql= mysqli_query($conexion,"SELECT * FROM actividades ");
          while ($row= mysqli_fetch_array($sql)) { 
    ?>
        <tr>
          <td><?php echo $row[3] ?></td>
          <td><?php echo $row[0] ?></td>
          <td><?php echo $row[17] ?></td>
          <td><?php echo $row[4] ?></td>
          <td><?php echo $row[5] ?></td>

          <td data-id="<?php echo $row[0] ?>" id="click"><i class="fa fa-ban "></i></a></td>
        </tr>
        <?php 
      }
         ?>
        </tbody>
     
      </table>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../js/datatables.min.css"/>
  <script type="text/javascript" src="../../js/datatables.min.js"></script>

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

       var mensaje= confirm("¿Eliminar permanentemente?, las notas de esta actividad sera eliminadas");

       if (mensaje) {
           $.ajax({
        url:"delete.php",
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