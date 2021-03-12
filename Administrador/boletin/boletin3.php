<?php 
session_start();
require '../../conexion.php';
          if (isset($_GET['idb'])) {
            $bimestre = $_GET['idb'];
          }else{
            $sqlbi = mysqli_query($conexion,"SELECT * FROM bimestre");
            $rowb = mysqli_fetch_array($sqlbi);
            $bimestre = $rowb[0];
          }

  if ($bimestre=='1') {
  $columna="Bimestre 1";
  $semestre="Role='0' OR Role='1'";
}elseif ($bimestre=='2') {
  $semestre="Role='0' OR Role='1'";
  $columna="Bimestre 2";
}elseif ($bimestre=='3') {
  $columna="Bimestre 3";
   $semestre="Role='0' OR Role='2'";
}elseif ($bimestre=='4') {
  $columna="Bimestre 4";
   $semestre="Role='0' OR Role='2'";
}
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
        padding: 1px;
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


     $query50 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id' AND Role='0'");
     $query502 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG = '$id' AND (Role='1' OR Role='2')");
   ?>

   <?php 


         ?>




 
  <div class="w3-col s6" >
    <img style="float: left" height="100" src="img/logoo.png">
    <h2>&nbsp;Colegio Salesiano San Juan Bosco</h2>
  </div>

  <h1><b><font size =4>Concentrado Anual</font></b></h1>
  
  <div class="w3-col s6" >
  <table class="table" >
    <tr>
      <td><font size =2>Grado: <b><?php echo $ja ."-". $je; ?></b></font></td>
       <td><font size =2>Año lectivo: <b><?php echo $ani;?></b></font></td>
    </tr>
  </table>
  </div>

  <!-- NUEVA TABLITAA================================== -->
 <!--<div class="table-responsive">-->
  <table style="width:100%" class='w3-bordered'>
  <thead class="thead-light">
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col"><font size =2><b>Estudiante</b></font></th>
      <?php while ($rowi50 = mysqli_fetch_array($query50)) {
  $bum2 = $rowi50[0];
  // echo count($bum2);

   ?>

       
      <center><th scope="col"  align='center'><span style="font-size: 12px;">&nbsp;<?php echo $bum2 ?></span></th></center>
      <?php } ?>

      <?php while ($rowi50 = mysqli_fetch_array($query502)) {
  $bum2 = $rowi50[0];
  // echo count($bum2);

   ?>

       
      <center><th scope="col"><span style="font-size: 12px;"><?php echo $bum2 ?></span></th></center>
      <?php } ?>
      
      
      <th scope="col"><font size=2>Con</font></th>
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
      <td><span style="font-size: 10px; font-family: Arial;"><?php echo utf8_encode($row1[2])." ".utf8_encode($row1[1])?></span></td> <!-- Nombres y Apellidos -->
      
    <?php 
    // ====================================================BIMESTRE 1========================================

     $query500 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG ='$id' AND Role='0'");
    $promo=0;
     $putoelquelolea=0;
     while($tip = mysqli_fetch_array($query500)){

 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '1' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '1' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '1' ");

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

    $rowi91 = $haha + $hehe +$hihi;
    $sum1=$rowi91*0.20;

 // ====================================================BIMESTRE 2======================================== 


 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '2' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '2' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '2' ");

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

    $rowi92 = $haha + $hehe +$hihi;
    $sum2=$rowi92*0.30;

 // ====================================================BIMESTRE 3======================================== 


 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '3' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '3' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '3' ");

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

    $rowi93 = $haha + $hehe +$hihi;
    $sum3=$rowi93*0.20;

 // ====================================================BIMESTRE 4======================================== 



 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '4' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '4' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '4' ");

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

    $rowi94 = $haha + $hehe +$hihi;
    $sum4=$rowi94*0.30;

 // ====================================================BIMESTRES======================================== 

$sumatoriaa=$sum1+$sum2+$sum3+$sum4;
$promo=$promo+$sumatoriaa;
 
       ?>
   

      <center><td align=center><font style='font-size:12px;'><?php echo round($sumatoriaa)  ?></font></td></center>

       <?php 
       /*$prom=($promo+$co2)/$pud; */
       /*$prom=($promo+$co3)/$pud;*/ 
             /*$prom=($promo+$co4)/$pud;*/   
      
     
       }

   $query501 = mysqli_query($conexion, "SELECT * FROM materias WHERE idG ='$id' AND (Role='1' OR Role='2') ");
    
     $putoelquelolea=0;
     while($tip = mysqli_fetch_array($query501)){

 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '1' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '1' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '1' ");

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

    $rowi91 = $haha + $hehe +$hihi;
    $sum1=$rowi91*0.50;

 // ====================================================BIMESTRE 2======================================== 


 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '2' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '2' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '2' ");

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

    $rowi92 = $haha + $hehe +$hihi;
    $sum2=$rowi92*0.50;

 // ====================================================BIMESTRE 3======================================== 


 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '3' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '3' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '3' ");

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

    $rowi93 = $haha + $hehe +$hihi;
    $sum3=$rowi93*0.50;

 // ====================================================BIMESTRE 4======================================== 



 $query3 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 1 AND Bimestre = '4' ");
    $query5 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 2 AND Bimestre = '4' ");
    $query7 = mysqli_query($conexion, "SELECT * FROM actividades WHERE IdG = '$id' AND idMa = '$tip[0]' AND Role = 3 AND Bimestre = '4' ");

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

    $rowi94 = $haha + $hehe +$hihi;
    $sum4=$rowi94*0.50;

 // ====================================================BIMESTRES======================================== 

$sumatoriaa=$sum1+$sum2+$sum3+$sum4;

$promo=$promo+$sumatoriaa;

       ?>
   

       <center><td align=center><font size=1><?php echo round($sumatoriaa) ?></font></td><center>

       <?php 
       /*$prom=($promo+$co2)/$pud; */
       /*$prom=($promo+$co3)/$pud;*/ 
             /*$prom=($promo+$co4)/$pud;*/   
      
     
       }  
if ($bimestre=='1') {
  ?>

     <td align=center><font size=1><?php echo utf8_encode($row1[5])?></font></td> 


  <?php 
  $prom=($promo+$co1)/$pud;  
}
if ($bimestre=='2') {
  ?>

     <td align=center><font size=1><?php echo utf8_encode($row1[6])?></font></td> 

  
  <?php 
  $prom=($promo+$co2)/$pud;
}
if ($bimestre=='3') {
  ?>


     <td align=center><font size=1><?php echo utf8_encode($row1[7])?></font></td> 
  
  <?php 
  $prom=($promo+$co3)/$pud;
}

if ($bimestre=='4') {

  ?>


  <td align=center><font size=1><?php echo round($co1*0.20+$co2*0.30+$co3*0.20+$co4*0.30)?></font></td>

  
  <?php 
  $prom=($promo+$co4)/$pud;
   
  }
  if ($prom<=69) 
  {   
  $color="red" ;
  }else
  {
  $color="#27ae60";
  }



       ?>


 <td align=center style="font-weight: bold;color:<?php echo $color; ?>"><font size=1><?php echo money_format("%i",$prom); ?></font></td>


 
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


 </body>
 </html>

<?php 
    
       ?>
