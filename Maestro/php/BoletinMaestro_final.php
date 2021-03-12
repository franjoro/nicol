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

  <h1><b><font size =4>Reporte de maestros</font></b></h1>
  
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
      <th><center>Nota final</center></th>
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

 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 1 AND Bimestre = 1");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 2 AND Bimestre = 1");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 3 AND Bimestre = 1");

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
    $porce1 = $rowi9 * 0.2;



    // Bimestre 2

    $query21 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 1 AND Bimestre = 2");
    $query22 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 2 AND Bimestre = 2 ");
    $query23 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 3 AND Bimestre = 2 ");

    $rowi21 = mysqli_fetch_array($query21);
    $rowi22 = mysqli_fetch_array($query22);
    $rowi23 = mysqli_fetch_array($query23);
    $query24 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi21[0]' AND IdEs='$mama' ");
    $query25 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi22[0]' AND IdEs='$mama' ");
    $query26 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi23[0]' AND IdEs='$mama' ");


    $rowi27 = mysqli_fetch_array($query24);
    $rowi28 = mysqli_fetch_array($query25);
    $rowi29 = mysqli_fetch_array($query26);

    $zaza = $rowi27[0];
    $zeze = $rowi28[0];
    $zizi = $rowi29[0];
    $zozo = $zaza + $zeze + $zizi;


    $porce2 = $zozo * 0.3;


 // Bimestre 3

    $query31 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 1 AND Bimestre = 3 ");
    $query32 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 2 AND Bimestre = 3 ");
    $query33 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 3 AND Bimestre = 3 ");

    $rowi31 = mysqli_fetch_array($query31);
    $rowi32 = mysqli_fetch_array($query32);
    $rowi33 = mysqli_fetch_array($query33);
    $query34 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi31[0]' AND IdEs='$mama' ");
    $query35 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi32[0]' AND IdEs='$mama' ");
    $query36 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi33[0]' AND IdEs='$mama' ");


    $rowi37 = mysqli_fetch_array($query34);
    $rowi38 = mysqli_fetch_array($query35);
    $rowi39 = mysqli_fetch_array($query36);

    $qaqa = $rowi37[0];
    $qeqe = $rowi38[0];
    $qiqi = $rowi39[0];
    $qoqo = $qaqa + $qeqe + $qiqi;
    $porce3 = $qoqo * 0.2;


 // bimestre 4

    $query41 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 1 AND Bimestre = 4 ");
    $query42 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 2 AND Bimestre = 4 ");
    $query43 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$sal[0]' AND idMa = '$idG' AND Role = 3 AND Bimestre = 4 ");

    $rowi41 = mysqli_fetch_array($query41);
    $rowi42 = mysqli_fetch_array($query42);
    $rowi43 = mysqli_fetch_array($query43);
    $query44 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi41[0]' AND IdEs='$mama' ");
    $query45 = mysqli_query($conexion, "SELECT SUM(Nota) FROM notas WHERE idAct = '$rowi42[0]' AND IdEs='$mama' ");
    $query46 = mysqli_query($conexion, "SELECT Nota FROM notas WHERE idAct = '$rowi43[0]' AND IdEs='$mama' ");


    $rowi47 = mysqli_fetch_array($query44);
    $rowi48 = mysqli_fetch_array($query45);
    $rowi49 = mysqli_fetch_array($query46);

    $wawa = $rowi47[0];
    $wewe = $rowi48[0];
    $wiwi = $rowi49[0];
    $wowo = $wawa + $wewe + $wiwi;
    $porce4 = $wowo * 0.3;

    // $promf = ($rowi9 + $zozo + $qoqo + $wowo)/4;
    $promf = $porce1 + $porce2 + $porce3 + $porce4;

   
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
<td style="color:<?php echo $color?>"><center><?php echo round($promf) ?></center></td>
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
