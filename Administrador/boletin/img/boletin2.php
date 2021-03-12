<?php 
session_start();
require '../../conexion.php';

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Boletin de Estudiantes</title>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="../../Maestro/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../Maestro/css/scrolling-nav.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
      .pip{
        padding: 10px;
        border: 3px solid black;
      }
    </style>
 </head>
 <body>

  <?php 
  $ani = date('Y');
  $id = $_GET['id'];
  $sqlp = mysqli_query($conexion,"SELECT COUNT(*) FROM materias WHERE idG = '$id'");
          	$sal = mysqli_fetch_array($sqlp);
          	$pud = $sal[0]+1;
    $query87 = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE IdG = '$id'");
   $rowoo = mysqli_fetch_array($query87);
  // while ($rowoo = mysqli_fetch_array($query87)){

    // $a=mysqli_num_rows($query87);
    // echo $a;
    $lala = $rowoo['IdEs'];
    $lele = $rowoo['Nombre'];
    $lili = $rowoo['Apellido'];
    $lolo = $rowoo['IdG'];
    
    $query2 = mysqli_query($conexion, "SELECT Nombre, Seccion FROM grados WHERE idG = '$lolo' ");

    $rowi = mysqli_fetch_array($query2);

    $ja = $rowi['Nombre'];
    $je = $rowi['Seccion'];

     $query50 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id'");
   ?>

   <?php 
          if (isset($_GET['idb'])) {
            $bimestre = $_GET['idb'];
          }else{
            $sqlbi = mysqli_query($conexion,"SELECT * FROM bimestre");
            $rowb = mysqli_fetch_array($sqlbi);
            $bimestre = $rowb[0];
          }

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


  <div class="container">
  <div style="margin-top: 20px">
    <img style="float: left" width="250" height="70" src="img/logo.png">
    <h4 class="pip" style="float: right"><?php echo $columna ?></h4>
  </div>
<br><br>
  <h1><b><font size =4>Concentrado por materias</font></b></h1>
  <div style="width: 480px">
  <table class="table">

      <td><font size =2>Grado: <b><?php echo $ja ."-". $je; ?></b></font></td>
      <td><font size =2>Año lectivo: <b><?php echo $ani;?></b></font></td>
    </tr>
  </table>
  </div>

  <!-- NUEVA TABLITAA================================== -->
  <div class="table-responsive">
  <table class="table table-hovered">
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col"><font size =2><b>Estudiante</b></font></th>
      <?php while ($rowi50 = mysqli_fetch_array($query50)) {
  $bum2 = $rowi50[0];
  // echo count($bum2);

   ?>

       
      <th scope="col"><font size =1><?php echo $bum2 ?></font></th>
      
      

      <?php } ?>
      
      <th scope="col"><font size =2>Con</font></th>
      <th scope="col"><font size=2>Prom.</font></th>
      
      

    </tr>
  </thead>
  <tbody>
     
  <?php 

    $query = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE idG = '$id' ORDER BY Apellido");
    while($row1 = mysqli_fetch_array($query)){
      $mama = $row1[0];
   ?>
   <tr>
      <td><font size=2><?php echo utf8_encode($row1[2])." ".utf8_encode($row1[1])?></font></td> <!-- Nombres y Apellidos -->
      
    <?php 
     $query500 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id'");
    $promo=0;
     $putoelquelolea=0;
     while($tip = mysqli_fetch_array($query500)){

 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '$bimestre' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '$bimestre' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '$bimestre' ");

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
    $co1 = $row1[5];  
    $co2 = $row1[6];
    $co3 = $row1[7];
    $co4 = $row1[8];      

    $rowi9 = $haha + $hehe +$hihi;
    // $porce1 = $rowi9
    $promo = $promo+$rowi9;
   
    
   // echo $promo;
    $ho = count($tip);
    // echo $promo;
   // $resulti = $hol->num_rows;
      // $count = $rowi9->num_rows;
       ?>
   

       <td align=center><font size=1><?php echo $rowi9;  ?></font></td>

       <?php $prom=($promo+$co1)/$pud;
	     /*$prom=($promo+$co2)/$pud; */
	     /*$prom=($promo+$co3)/$pud;*/ 
             /*$prom=($promo+$co4)/$pud;*/   
      
       if ($prom>$putoelquelolea) {
       	$putoelquelolea=$prom;
       	// echo "<h1>".$putoelquelolea."</h1>";
       	$color="#27ae60";
       }else{
       	$color="black" ;
       }
       }


       ?>

     <td align=center><font size=1><?php echo utf8_encode($row1[5])?></font></td> <!-- Conductas notas-->
     <!--<td align=center><font size=1><?php echo utf8_encode($row1[6])?></font></td> <!-- Conductas notas-->
    <!-- <td align=center><font size=1><?php echo utf8_encode($row1[7])?></font></td> <!-- Conductas notas-->
     <!--<td align=center><font size=1><?php echo utf8_encode($row1[8])?></font></td> <!-- Conductas notas-->

     <td align=center style="font-weight: bold;color:<?php echo $color; ?>"><font size=1><?php echo money_format("%i",$prom);  ?></font></td>
 
    <!-- $promo = $rowi9/$pud; -->
    </tr> 
 <?php }?>


   
   <?php // echo $pud ?>


    
  </tbody>
</table>
	<!-- <br><br><br><br> -->
  <!-- <p style="display: inline;">Firma&nbsp;</p><p style="display: inline;">_________________</p>
  <p style="display: inline; float: right">_________________</p><p style="display: inline; float: right">Firma&nbsp;</p>
  <div style="page-break-before: always;height:0; line-height:0;">

  </div> -->
</div>

 </body>
 </html>