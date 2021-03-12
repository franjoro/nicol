<?php 
session_start();
require '../../conexion.php';
      
  $idG=$_GET['id'];

            $sqlbi = mysqli_query($conexion,"SELECT * FROM bimestre");
            $rowb = mysqli_fetch_array($sqlbi);
            $bimestre = $rowb[0];
          

  if ($bimestre=='1') {
  $columna="Bimestre 1";


}elseif ($bimestre=='2') {
 

  $columna="Bimestre 2";
}elseif ($bimestre=='3') {
  $columna="Bimestre 3";
   

}elseif ($bimestre=='4') {
  $columna="Bimestre 4";
  

}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Boletin de Notas Maestro</title>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../../Maestro/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../Maestro/css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
      .pip{
        padding: 1px;
        border: 3px solid black;
      }
    </style>
 </head>
 <body>

  <?php 
  $ani = date('Y');
  $id = $_GET['id'];
  $sqlp = mysqli_query($conexion,"SELECT idG FROM materias WHERE idMa = '$idG'");
  $sal = mysqli_fetch_array($sqlp);


  
  $query87 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$sal[0]'");

         ?>


<div class="w3-row">
<a href="../index.php">
<button class="w3-button w3-red" style="float: left">Volver</button>
</a>
</div>
   <div class="container">
  <div class="w3-col s6" >
    <img style="float: left" height="100" src="img/logoo.png">
    <h2>&nbsp;Colegio Salesiano San Juan Bosco</h2>
  </div>

  <h1><b><font size =4>Reporte de maestros-<?php echo $columna ?></font></b></h1>
  
  <div class="w3-col s6" >
  <table class="table" >
  	<tr>
      <td><font size =2>Materia: <b><?php echo $idG ?></b></font></td>
      <td><font size =2>Grado: <b><?php echo $sal[0] ?></b></font></td>
      <td><font size =2>Año lectivo: <b><?php echo $ani;?></b></font></td>
    </tr>
  </table>
  </div>

  <!-- NUEVA TABLITAA================================== -->
 <!--<div class="table-responsive">-->
<center>
  <table class="table table-hovered, table-striped" style="width: 700px">
  <thead class="thead-light">
    <tr>
      <th>Estudiante</th>
      <th><center>Nota Bimestral</center></th>
    </tr>
  </thead>
  




<tbody>
     
  
<?php 

    $query = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$sal[0]' ORDER BY Apellido");
    while($row1 = mysqli_fetch_array($query)){
      $mama = $row1[0];
   ?>
   <tr>
      <td><span style="font-size: 12px; font-family: Arial;"><?php echo utf8_encode($row1[2])." ".utf8_encode($row1[1])?></span></td> <!-- Nombres y Apellidos -->
      
    <?php 
    // ============================================================================================

     $query500 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG ='$sal[0]'  ");
    $promo=0;
     $putoelquelolea=0;
     while($tip = mysqli_fetch_array($query500)){

 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 1 AND Bimestre = '$bimestre' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 2 AND Bimestre = '$bimestre' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 3 AND Bimestre = '$bimestre' ");

    $rowi2 = mysqli_fetch_array($query3);
    $rowi5 = mysqli_fetch_array($query5);
    $rowi7 = mysqli_fetch_array($query7);
    $query4 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi2[0]' AND IdEs='$mama' ");
    $query6 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi5[0]' AND IdEs='$mama' ");
    $query8 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi7[0]' AND IdEs='$mama' ");


    $rowi3 = mysqli_fetch_array($query4);
    $rowi6 = mysqli_fetch_array($query6);

    $rowi8 = mysqli_fetch_array($query8);

    $haha = $rowi3[0];
    $hehe = $rowi6[0];
    $hihi = $rowi8[0];

    $rowi9 = $haha + $hehe +$hihi;

   
   
       ?>
   


       <?php 
       }
       if ($rowi9<69) {
         $color="red";
       }
      
       else{
        $color="green";
       }

       ?>
<td style="color:<?php echo $color ?>"><center><?php echo $rowi9 ?></center></td>
    </tr> 
 <?php }?>

   
   <?php // echo $pud ?>

    
  </tbody>
</table>
</center>
</div>
	<!-- <br><br><br><br> -->
  <!-- <p style="display: inline;">Firma&nbsp;</p><p style="display: inline;">_________________</p>
  <p style="display: inline; float: right">_________________</p><p style="display: inline; float: right">Firma&nbsp;</p>
  <div style="page-break-before: always;height:0; line-height:0;">

  </div> -->


 </body>
 </html>

<?php 
    
       ?>
